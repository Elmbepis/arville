<?php
/**
 * bot-chat/api.php — JSON API for the chat face.
 *
 * No Laya. No AI. Just:
 *   1. Pattern router (responses/<topic>/questions.txt)
 *   2. ELIZA-style fallback (lib/eliza.php)
 *   3. Unknown deflect (responses/unknown/)
 *
 * Flow:
 *   text &#8594; keyword_route() &#8594; if match, use that topic
 *                          &#8594; else eliza_response() &#8594; if match, return it
 *                          &#8594; else fall back to 'unknown' topic
 */

require __DIR__ . '/lib/router.php';
require __DIR__ . '/lib/content.php';
require __DIR__ . '/lib/eliza.php';

header('Content-Type: application/json');

$text = trim($_POST['text'] ?? $_GET['text'] ?? '');
$name = trim($_POST['name'] ?? $_GET['name'] ?? '');

if ($text === '') {
    echo json_encode(['ok' => false, 'error' => 'No text provided']);
    exit;
}

$responsesDir = __DIR__ . '/responses';

// ---------- Tier 1: Pattern router ----------
$topic = keyword_route($text, $responsesDir);

// ---------- Tier 2: ELIZA fallback ----------
$elizaText = null;
if ($topic === null) {
    $elizaText = eliza_response($text);
}

// ---------- Tier 3: Unknown deflect ----------
if ($topic === null && $elizaText === null) {
    $topic = 'unknown';
}

// ---------- Build response ----------
if ($elizaText !== null) {
    $responseText = $elizaText;
    $topicLabel   = 'eliza';
    $responseId   = 'eliza_' . md5($responseText);
} else {
    $response = get_response($topic, $responsesDir);
    if (!$response) {
        echo json_encode(['ok' => false, 'error' => 'No response found']);
        exit;
    }
    $responseText = $response['response'];
    $topicLabel   = $response['topic'];
    $responseId   = $topicLabel . '_' . md5($responseText);
}

// ---------- {name} substitution ----------
if ($name !== '') {
    $responseText = str_replace('{name}', $name, $responseText);
} else {
    $responseText = preg_replace('/,?\s*\{name\}/', '', $responseText);
    $responseText = preg_replace('/\s+/', ' ', trim($responseText));
}

echo json_encode([
    'ok'          => true,
    'via'         => ($topicLabel === 'eliza') ? 'eliza' : 'pattern',
    'topic'       => $topicLabel,
    'response'    => $responseText,
    'response_id' => $responseId,
]);