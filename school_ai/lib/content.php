<?php
/**
 * lib/content.php — Lesson content lookup + text-to-HTML renderer
 *
 * Content structure:
 *   lessons/<topic>/lesson.txt          &#8592; primary format (text, TTS-friendly)
 *   lessons/<topic>/grade<N>.txt        &#8592; optional grade-specific override
 *   lessons/<topic>/lesson.html         &#8592; legacy HTML (still supported)
 *
 * Returns:
 *   [
 *     'ok'     => true,
 *     'topic'  => 'photosynthesis',
 *     'text'   => '...raw text with markup...',   // for TTS, search, etc.
 *     'plain'  => '...markup stripped...',         // for TTS specifically
 *     'html'   => '<h1>...</h1>...',               // for display
 *     'source' => 'lesson.txt',
 *   ]
 */

function get_lesson(string $topic, int $grade, string $baseDir): ?array
{
    $topic = preg_replace('/[^a-z0-9_]/', '', strtolower($topic));
    if ($topic === '') return null;

    $topicDir = rtrim($baseDir, '/') . '/' . $topic;
    if (!is_dir($topicDir)) return null;

    // Priority 1: grade-specific .txt
    $gradeTxt = $topicDir . '/grade' . $grade . '.txt';
    if (is_file($gradeTxt)) {
        return lesson_from_txt($topic, file_get_contents($gradeTxt), 'grade' . $grade . '.txt');
    }

    // Priority 2: universal .txt
    $universalTxt = $topicDir . '/lesson.txt';
    if (is_file($universalTxt)) {
        return lesson_from_txt($topic, file_get_contents($universalTxt), 'lesson.txt');
    }

    // Priority 3: grade-specific .html (legacy)
    $gradeHtml = $topicDir . '/grade' . $grade . '.html';
    if (is_file($gradeHtml)) {
        return lesson_from_html($topic, file_get_contents($gradeHtml), 'grade' . $grade . '.html');
    }

    // Priority 4: universal .html (legacy)
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
        'html'   => $html,
        'source' => $source,
    ];
}

/**
 * Convert lesson text (with #, ##, -, 1., **bold**) into HTML.
 */
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

        // Headings
        if (preg_match('/^###\s+(.+)$/', $line, $m)) {
            close_list($html, $inList, $listType);
            $html .= '<h3>' . inline_format($m[1]) . "</h3>\n";
        } elseif (preg_match('/^##\s+(.+)$/', $line, $m)) {
            close_list($html, $inList, $listType);
            $html .= '<h2>' . inline_format($m[1]) . "</h2>\n";
        } elseif (preg_match('/^#\s+(.+)$/', $line, $m)) {
            close_list($html, $inList, $listType);
            $html .= '<h1>' . inline_format($m[1]) . "</h1>\n";
        }
        // Bullet list
        elseif (preg_match('/^[-*]\s+(.+)$/', $line, $m)) {
            if (!$inList || $listType !== 'ul') {
                if ($inList) $html .= "</$listType>\n";
                $html .= "<ul>\n";
                $inList = true;
                $listType = 'ul';
            }
            $html .= '  <li>' . inline_format($m[1]) . "</li>\n";
        }
        // Numbered list
        elseif (preg_match('/^\d+\.\s+(.+)$/', $line, $m)) {
            if (!$inList || $listType !== 'ol') {
                if ($inList) $html .= "</$listType>\n";
                $html .= "<ol>\n";
                $inList = true;
                $listType = 'ol';
            }
            $html .= '  <li>' . inline_format($m[1]) . "</li>\n";
        }
        // Paragraph
        else {
            if ($inList) { $html .= "</$listType>\n"; $inList = false; }
            $html .= '<p>' . inline_format($line) . "</p>\n";
        }
    }

    if ($inList) $html .= "</$listType>\n";
    return $html;
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
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    // **bold** &#8594; <strong>
    $text = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text);
    return $text;
}

/**
 * Strip markup to produce clean plain text for TTS or search indexing.
 */
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
        $lines[] = $line;
    }
    return implode("\n", $lines);
}