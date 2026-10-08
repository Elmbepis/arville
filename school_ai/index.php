<?php
/**
 * school_ai/index.php — Ask a question, get a lesson
 */

require __DIR__ . '/lib/laya.php';
require __DIR__ . '/lib/content.php';

// ---------- Load taxonomy ----------
$taxonomyFile = __DIR__ . '/config/taxonomy.json';
if (!is_readable($taxonomyFile)) {
    die('Taxonomy file missing.');
}
$taxonomy = json_decode(file_get_contents($taxonomyFile), true);
if (!is_array($taxonomy) || empty($taxonomy['domains'])) {
    die('Taxonomy file is empty or malformed.');
}

// ---------- Handle submission ----------
$question = '';
$result   = null;
$error    = null;
$lesson   = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = trim($_POST['question'] ?? '');

    if ($question !== '') {
        if (mb_strlen($question) > 500) {
            $error = 'Question is too long. Please keep it under 500 characters.';
        } else {
            $result = laya_classify($question, $taxonomy);
            if (!$result['ok']) {
                $error = $result['error'];
            } else {
                // Grade 5 is a reasonable middle for the 3–6 range
                $lesson = get_lesson($result['topic'], 5, __DIR__ . '/lessons');
            }
        }
    }
}

// ---------- Mode badge ----------
$host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
$hostname = preg_replace('/:\d+$/', '', $host);
$isLocal  = in_array($hostname, ['localhost', '127.0.0.1', '::1'], true)
    || preg_match('/^192\.168\./', $hostname)
    || preg_match('/^10\./', $hostname);
$mode = $isLocal ? 'local' : 'online';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>School AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        :root {
            --green: #2a7;
            --green-dark: #1e8a5a;
            --gray: #666;
            --bg: #f4f4f4;
            --red-bg: #fee;
            --red: #a00;
        }
        * { box-sizing: border-box; }
        body {
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
            max-width: 780px;
            margin: 40px auto;
            padding: 0 20px;
            color: #222;
            line-height: 1.65;
        }
        .mode-badge {
            display: inline-block;
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 12px;
            background: #eee;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        .mode-local  { background: #ffe9c4; color: #8a5a00; }
        .mode-online { background: #d6f5e0; color: #1f7a4a; }

        h1 { margin: 0 0 4px; font-size: 28px; }
        .tagline { color: var(--gray); margin: 0 0 24px; }

        form.ask {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 8px;
        }
        input[type=text] {
            flex: 1;
            min-width: 240px;
            padding: 12px 14px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }
        input[type=text]:focus { border-color: var(--green); }
        button {
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            background: var(--green);
            color: white;
            border: none;
            border-radius: 8px;
            transition: background 0.15s;
        }
        button:hover { background: var(--green-dark); }

        .topic-badge {
            display: inline-block;
            background: #e8f7ee;
            color: var(--green-dark);
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
            margin-top: 24px;
        }

        .lesson {
            background: #fff;
            border: 1px solid #e4e4e4;
            border-radius: 10px;
            padding: 28px;
            margin-top: 12px;
        }
        .lesson h1 { font-size: 26px; margin-top: 0; color: #111; }
        .lesson h2 { font-size: 19px; margin-top: 28px; color: #111; }
        .lesson h3 { font-size: 17px; margin-top: 22px; color: #111; }
        .lesson p  { margin: 8px 0; }
        .lesson ul, .lesson ol { padding-left: 22px; }
        .lesson li { margin-bottom: 6px; }
        .lesson strong { color: #111; }

        .no-lesson {
            background: var(--bg);
            border-radius: 10px;
            padding: 24px;
            margin-top: 24px;
            color: var(--gray);
        }
        .no-lesson strong { color: #333; }

        .error {
            background: var(--red-bg);
            padding: 14px 18px;
            border-radius: 8px;
            color: var(--red);
            margin-top: 20px;
            font-family: ui-monospace, monospace;
            font-size: 13px;
            word-break: break-word;
        }
    </style>
</head>
<body>

    <span class="mode-badge mode-<?= $mode ?>"><?= $mode ?> mode</span>
    <h1>School AI</h1>
    <p class="tagline">Ask a science question. Get a lesson.</p>

    <form method="POST" class="ask">
        <input type="text" name="question"
               value="<?= htmlspecialchars($question) ?>"
               placeholder="e.g., How do plants make food?"
               maxlength="500"
               autofocus>
        <button type="submit">Ask</button>
    </form>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($lesson): ?>
        <div class="topic-badge"><?= htmlspecialchars($result['topic']) ?></div>
        <div class="lesson">
            <?= $lesson['html'] ?>
        </div>
    <?php elseif ($result && $result['ok']): ?>
        <div class="no-lesson">
            <p>We classified this question as <strong><?= htmlspecialchars($result['topic']) ?></strong>,
               but the lesson content isn't ready yet.</p>
            <p>Check back soon — this topic is coming.</p>
        </div>
    <?php endif; ?>

</body>
</html>