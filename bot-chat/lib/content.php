<?php
/**
 * lib/content.php — Random response picker for bot-chat
 *
 * Structure: responses/<topic>/responses.txt
 * Each paragraph (separated by blank lines, or one per line) is a response.
 * One is picked at random.
 */

function get_response(string $topic, string $baseDir): ?array
{
    $topic = preg_replace('/[^a-z0-9_]/', '', strtolower($topic));
    if ($topic === '') return null;

    $file = rtrim($baseDir, '/') . '/' . $topic . '/responses.txt';
    if (!is_file($file)) {
        // Fall back to unknown
        $file = rtrim($baseDir, '/') . '/unknown/responses.txt';
        if (!is_file($file)) return null;
        $topic = 'unknown';
    }

    $raw = file_get_contents($file);
    $lines = array_filter(array_map('trim', preg_split('/\n\s*\n|\n/', $raw)));
    $lines = array_values($lines);
    if (empty($lines)) return null;

    $chosen = $lines[array_rand($lines)];

    return [
        'ok'       => true,
        'topic'    => $topic,
        'response' => $chosen,
    ];
}