<?php
/**
 * bot-chat/api.php — JSON API for the chat face.
 * Takes ?text=... and returns { ok, via, topic, response, response_id }.
 */

require __DIR__ . '/lib/laya.php';
require __DIR__ . '/lib/content.php';

header('Content-Type: application/json');

$taxonomyFile = __DIR__ . '/config/taxonomy.json';
if (!is_readable($taxonomyFile)) {
    echo json_encode(['ok' => false, 'error' => 'Taxonomy missing']);
    exit;
}
$taxonomy = json_decode(file_get_contents($taxonomyFile), true);

$text = trim($_POST['text'] ?? $_GET['text'] ?? '');
if ($text === '') {
    echo json_encode(['ok' => false, 'error' => 'No text provided']);
    exit;
}

$result = laya_classify($text, $taxonomy);
if (!$result['ok']) {
    echo json_encode(['ok' => false, 'error' => $result['error']]);
    exit;
}

$response = get_response($result['topic'], __DIR__ . '/responses');
if (!$response) {
    echo json_encode(['ok' => false, 'error' => 'No response found']);
    exit;
}

echo json_encode([
    'ok'          => true,
    'via'         => $result['via'] ?? 'laya',
    'topic'       => $response['topic'],
    'response'    => $response['response'],
    'response_id' => $response['topic'] . '_' . md5($response['response']),
]);