<?php
/**
 * lib/content.php — Lesson content loader + text-to-HTML renderer
 *
 * Supports:
 *   - lessons/<topic>/lesson.txt (markdown-ish)
 *   - lessons/<topic>/grade<N>.txt (optional grade override)
 *   - lessons/<topic>/lesson.html (legacy)
 *   - [[topic_key|Label]] inline links between topics
 */

function get_lesson(string $topic, int $grade, string $baseDir): ?array
{
    $topic = preg_replace('/[^a-z0-9_]/', '', strtolower($topic));
    if ($topic === '') return null;

    $topicDir = rtrim($baseDir, '/') . '/' . $topic;
    if (!is_dir($topicDir)) return null;

    $gradeTxt = $topicDir . '/grade' . $grade . '.txt';
    if (is_file($gradeTxt)) {
        return lesson_from_txt($topic, file_get_contents($gradeTxt), 'grade' . $grade . '.txt');
    }

    $universalTxt = $topicDir . '/lesson.txt';
    if (is_file($universalTxt)) {
        return lesson_from_txt($topic, file_get_contents($universalTxt), 'lesson.txt');
    }

    $gradeHtml = $topicDir . '/grade' . $grade . '.html';
    if (is_file($gradeHtml)) {
        return lesson_from_html($topic, file_get_contents($gradeHtml), 'grade' . $grade . '.html');
    }

    $universalHtml = $topicDir . '/lesson.html';
    if (is_file($universalHtml)) {
        return lesson_from_html($topic, file_get_contents($universalHtml), 'lesson.html');
    }

    return null;
}

function lesson_from_txt(string $topic, string $raw, string $source): array
{
    return [
        'ok'     => true,
        'topic'  => $topic,
        'text'   => $raw,
        'plain'  => lesson_plain_text($raw),
        'html'   => render_lesson_html($raw),
        'source' => $source,
    ];
}

function lesson_from_html(string $topic, string $html, string $source): array
{
    return [
        'ok'     => true,
        'topic'  => $topic,
        'text'   => $html,
        'plain'  => trim(preg_replace('/\s+/', ' ', strip_tags($html))),
        'html'   => convert_topic_links($html),
        'source' => $source,
    ];
}

function render_lesson_html(string $txt): string
{
    $html = '';
    $inList = false;
    $listType = '';

    foreach (explode("\n", $txt) as $line) {
        $line = rtrim($line);

        if (trim($line) === '') {
            if ($inList) { $html .= "</$listType>\n"; $inList = false; }
            continue;
        }

        if (preg_match('/^###\s+(.+)$/', $line, $m)) {
            close_list($html, $inList, $listType);
            $html .= '<h3>' . inline_format($m[1]) . "</h3>\n";
        } elseif (preg_match('/^##\s+(.+)$/', $line, $m)) {
            close_list($html, $inList, $listType);
            $html .= '<h2>' . inline_format($m[1]) . "</h2>\n";
        } elseif (preg_match('/^#\s+(.+)$/', $line, $m)) {
            close_list($html, $inList, $listType);
            $html .= '<h1>' . inline_format($m[1]) . "</h1>\n";
        } elseif (preg_match('/^[-*]\s+(.+)$/', $line, $m)) {
            if (!$inList || $listType !== 'ul') {
                if ($inList) $html .= "</$listType>\n";
                $html .= "<ul>\n";
                $inList = true;
                $listType = 'ul';
            }
            $html .= '  <li>' . inline_format($m[1]) . "</li>\n";
        } elseif (preg_match('/^\d+\.\s+(.+)$/', $line, $m)) {
            if (!$inList || $listType !== 'ol') {
                if ($inList) $html .= "</$listType>\n";
                $html .= "<ol>\n";
                $inList = true;
                $listType = 'ol';
            }
            $html .= '  <li>' . inline_format($m[1]) . "</li>\n";
        } else {
            if ($inList) { $html .= "</$listType>\n"; $inList = false; }
            $html .= '<p>' . inline_format($line) . "</p>\n";
        }
    }

    if ($inList) $html .= "</$listType>\n";
    return convert_topic_links($html);
}

function close_list(string &$html, bool &$inList, string $listType): void
{
    if ($inList) {
        $html .= "</$listType>\n";
        $inList = false;
    }
}

function inline_format(string $text): string
{
    // Escape HTML first (except our link markers which we handle after)
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    // Restore our link markers (escaped as [[topic|label]])
    $text = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text);
    return $text;
}

function convert_topic_links(string $html): string
{
    return preg_replace_callback(
        '/\[\[([a-z0-9_]+)\|([^\]]+)\]\]/i',
        function ($m) {
            $topic = htmlspecialchars($m[1], ENT_QUOTES, 'UTF-8');
            $label = $m[2]; // already HTML-escaped by inline_format
            return '<a href="?topic=' . $topic . '" class="topic-link">' . $label . '</a>';
        },
        $html
    );
}

function lesson_plain_text(string $raw): string
{
    $lines = [];
    foreach (explode("\n", $raw) as $line) {
        $line = trim($line);
        if ($line === '') continue;
        $line = preg_replace('/^#+\s*/', '', $line);
        $line = preg_replace('/^[-*]\s+/', '', $line);
        $line = preg_replace('/^\d+\.\s+/', '', $line);
        $line = str_replace('**', '', $line);
        // Strip [[topic|label]] &#8594; label
        $line = preg_replace('/\[\[[a-z0-9_]+\|([^\]]+)\]\]/i', '$1', $line);
        $lines[] = $line;
    }
    return implode("\n", $lines);
}