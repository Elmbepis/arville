<?php
/**
 * lib/laya.php — Laya HTTP client for School AI
 *
 * One function: laya_classify($question, $taxonomy)
 * Auto-detects local vs online endpoint, handles auth, parses response.
 */

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
        $url  = 'http://localhost:8000/v1/systemone';
        $key  = null;
        $mode = 'local';
    } else {
        $configFile = '/etc/arville/config.php';
        if (is_readable($configFile)) {
            $cfg = require $configFile;
            $url = $cfg['laya_url'] ?? 'http://127.0.0.1:8080/v1/systemone';
            $key = $cfg['laya_key'] ?? null;
        } else {
            $url = 'http://127.0.0.1:8080/v1/systemone';
            $key = null;
        }
        $mode = 'online';
    }

    // ---------- Flatten taxonomy into Laya criteria ----------
    $criteria = [];
    foreach ($taxonomy['subjects'] as $subject) {
        foreach ($subject['topics'] as $topic => $desc) {
            $criteria[$topic] = $desc;
        }
    }

    if (empty($criteria)) {
        return ['ok' => false, 'mode' => $mode, 'error' => 'Taxonomy is empty'];
    }

    $payload = [
        'model' => 'auto',
        'state' => $question,
        'questions' => [
            'topic' => [
                'type'         => 'choice',
                'instructions' => 'Which science topic does this student question relate to?',
                'criteria'     => $criteria,
            ],
        ],
    ];

    // ---------- Build headers ----------
    $headers = ['Content-Type: application/json'];
    if (!empty($key)) {
        $headers[] = 'Authorization: Bearer ' . $key;
    }

    // ---------- Send request ----------
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => $headers,
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_TIMEOUT        => $timeout,
    ]);

    $response  = curl_exec($ch);
    $httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlErrno = curl_errno($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    // ---------- Handle failures ----------
    if ($response === false) {
        return [
            'ok'    => false,
            'mode'  => $mode,
            'error' => "Could not reach Laya at $url [$curlErrno: $curlError]",
        ];
    }
    if ($httpCode !== 200) {
        return [
            'ok'    => false,
            'mode'  => $mode,
            'error' => "Laya returned HTTP $httpCode: " . substr($response, 0, 200),
        ];
    }

    // ---------- Parse success ----------
    $raw = json_decode($response, true);
    $a = $raw['answers']['topic'] ?? null;
    if (!$a) {
        return [
            'ok'    => false,
            'mode'  => $mode,
            'error' => 'Unexpected Laya response shape',
            'raw'   => $raw,
        ];
    }

    return [
        'ok'            => true,
        'mode'          => $mode,
        'topic'         => $a['choice'] ?? null,
        'confidence'    => (float)($a['confidence'] ?? 0),
        'probabilities' => $a['probabilities'] ?? [],
        'raw'           => $raw,
    ];
}