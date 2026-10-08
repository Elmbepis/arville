<?php
/**
 * lib/laya.php — Laya HTTP client + question-pattern router
 *
 * Flow:
 *   1. Pattern router — reads questions.txt files under responses/
 *   2. Laya two-stage classification — for novel questions not covered by patterns
 *
 * Endpoint auto-detection:
 *   - Local:  http://127.0.0.1:8000 (no auth)
 *   - Online: http://127.0.0.1:8080 (Bearer auth from /etc/arville/config.php)
 */

require_once __DIR__ . '/router.php';

function laya_classify(string $question, array $taxonomy, int $timeout = 120): array
{
    // ---------- Endpoint detection ----------
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $hostname = preg_replace('/:\d+$/', '', $host);
    $isLocal = in_array($hostname, ['localhost', '127.0.0.1', '::1'], true)
        || preg_match('/^192\.168\./', $hostname)
        || preg_match('/^10\./', $hostname)
        || preg_match('/^172\.(1[6-9]|2\d|3[01])\./', $hostname)
        || preg_match('/\.local$/', $hostname);

    if ($isLocal) {
        $url  = 'http://127.0.0.1:8000/v1/systemone';
        $key  = null;
        $mode = 'local';
    } else {
        $cfgFile = '/etc/arville/config.php';
        if (is_readable($cfgFile)) {
            $cfg = require $cfgFile;
            $url = $cfg['laya_url'] ?? 'http://127.0.0.1:8080/v1/systemone';
            $key = $cfg['laya_key'] ?? null;
        } else {
            $url = 'http://127.0.0.1:8080/v1/systemone';
            $key = null;
        }
        $mode = 'online';
    }

    if (empty($taxonomy['domains']) || !is_array($taxonomy['domains'])) {
        return ['ok' => false, 'mode' => $mode, 'error' => 'Taxonomy has no domains'];
    }

    // ---------- Tier 1+2: pattern router ----------
    // The router reads responses/<topic>/questions.txt directly.
    $responsesDir = __DIR__ . '/../responses';
    $shortcut = keyword_route($question, $responsesDir);
    if ($shortcut !== null) {
        return [
            'ok'                => true,
            'mode'              => $mode,
            'via'               => 'pattern',
            'domain'            => null,
            'domain_label'      => null,
            'domain_confidence' => 1.0,
            'topic'             => $shortcut,
            'confidence'        => 1.0,
            'probabilities'     => [],
        ];
    }

    // ---------- Tier 3: Laya fallback ----------
    $call = function (string $q, string $qid, string $instructions, array $criteria)
             use ($url, $key, $timeout) {

        $payload = [
            'model' => 'english',
            'state' => $q,
            'questions' => [
                $qid => [
                    'type'         => 'choice',
                    'instructions' => $instructions,
                    'criteria'     => $criteria,
                ],
            ],
        ];

        $headers = ['Content-Type: application/json'];
        if (!empty($key)) $headers[] = 'Authorization: Bearer ' . $key;

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_TIMEOUT        => $timeout,
        ]);

        $resp  = curl_exec($ch);
        $code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $errno = curl_errno($ch);
        $err   = curl_error($ch);
        curl_close($ch);

        if ($resp === false) {
            return ['ok' => false, 'error' => "Laya unreachable at $url [$errno: $err]"];
        }
        if ($code !== 200) {
            return ['ok' => false, 'error' => "Laya HTTP $code: " . substr($resp, 0, 200)];
        }

        $raw = json_decode($resp, true);
        $a   = $raw['answers'][$qid] ?? null;
        if (!$a || empty($a['choice'])) {
            return ['ok' => false, 'error' => 'Unexpected Laya response shape'];
        }

        return [
            'ok'            => true,
            'choice'        => $a['choice'],
            'confidence'    => (float)($a['confidence'] ?? 0),
            'probabilities' => $a['probabilities'] ?? [],
        ];
    };

    // Stage 1: which domain?
    $domainCriteria = [];
    foreach ($taxonomy['domains'] as $dk => $d) {
        $domainCriteria[$dk] = $d['description'] ?? ($d['label'] ?? $dk);
    }

    $r1 = $call($question, 'domain', 'Which broad area is this question about?', $domainCriteria);
    if (!$r1['ok']) {
        return ['ok' => false, 'mode' => $mode, 'via' => 'laya',
                'error' => 'Stage 1: ' . $r1['error']];
    }

    $domainKey = $r1['choice'];
    if (!isset($taxonomy['domains'][$domainKey])) {
        return ['ok' => false, 'mode' => $mode, 'via' => 'laya',
                'error' => "Stage 1 returned unknown domain: $domainKey"];
    }

    // Stage 2: which topic?
    $domainData    = $taxonomy['domains'][$domainKey];
    $topicCriteria = $domainData['topics'] ?? [];

    if (empty($topicCriteria)) {
        return ['ok' => false, 'mode' => $mode, 'via' => 'laya',
                'error' => "Domain '$domainKey' has no topics"];
    }

    $r2 = $call($question, 'topic', "Which specific topic within {$domainData['label']}?", $topicCriteria);
    if (!$r2['ok']) {
        return ['ok' => false, 'mode' => $mode, 'via' => 'laya',
                'error' => 'Stage 2: ' . $r2['error']];
    }

    return [
        'ok'                => true,
        'mode'              => $mode,
        'via'               => 'laya',
        'domain'            => $domainKey,
        'domain_label'      => $domainData['label'] ?? $domainKey,
        'domain_confidence' => $r1['confidence'],
        'topic'             => $r2['choice'],
        'confidence'        => $r2['confidence'],
        'probabilities'     => $r2['probabilities'],
    ];
}