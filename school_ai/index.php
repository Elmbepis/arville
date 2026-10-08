<?php
/**
 * school_ai/index.php — School AI homepage
 * Student types a question, gets the classified topic.
 */

require __DIR__ . '/lib/laya.php';

// ---------- Load taxonomy ----------
$taxonomyFile = __DIR__ . '/config/taxonomy.json';
if (!is_readable($taxonomyFile)) {
    die('Taxonomy file missing: ' . htmlspecialchars($taxonomyFile));
}
$taxonomy = json_decode(file_get_contents($taxonomyFile), true);
if (!is_array($taxonomy) || empty($taxonomy['domains'])) {
    die('Taxonomy file is empty or malformed.');
}

// ---------- Handle submission ----------
$question = '';
$result   = null;
$error    = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['question'])) {
    $question = trim($_POST['question']);

    if (mb_strlen($question) > 500) {
        $error = 'Question is too long. Please keep it under 500 characters.';
    } else {
        $result = laya_classify($question, $taxonomy);
        if (!$result['ok']) {
            $error = $result['error'];
        }
    }
}

// ---------- Mode for the badge ----------
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
    <title>School AI — Ask a Science Question</title>
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
            max-width: 720px;
            margin: 40px auto;
            padding: 0 20px;
            color: #222;
            line-height: 1.5;
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

        form { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 8px; }
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

        .result {
            background: var(--bg);
            padding: 24px;
            border-radius: 10px;
            margin-top: 24px;
        }
        .topic {
            font-size: 26px;
            font-weight: 600;
            color: var(--green);
            margin-bottom: 6px;
            text-transform: capitalize;
        }
        .conf { color: var(--gray); margin-bottom: 18px; }

        .prob-list { list-style: none; padding: 0; margin: 0; }
        .prob-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 0;
            font-size: 14px;
        }
        .prob-label { flex: 0 0 160px; color: #333; }
        .prob-bar {
            flex: 1;
            height: 8px;
            background: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }
        .prob-fill {
            height: 100%;
            background: var(--green);
            border-radius: 4px;
        }
        .prob-value { flex: 0 0 60px; text-align: right; color: var(--gray); }

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
    <p class="tagline">Ask a science question and get the right topic.</p>

    <form method="POST">
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

    <?php if ($result && $result['ok']):
        $topic = $result['topic'] ?? 'unknown';
        $conf  = $result['confidence'] * 100;
        $probs = $result['probabilities'] ?? [];
        arsort($probs);
    ?>
        <div class="result">
            <div class="topic"><?= htmlspecialchars($topic) ?></div>
            <div class="conf">Confidence: <?= number_format($conf, 1) ?>%</div>

            <?php if (!empty($probs)): ?>
                <ul class="prob-list">
                    <?php foreach ($probs as $label => $prob):
                        $pct = $prob * 100;
                    ?>
                        <li class="prob-item">
                            <span class="prob-label"><?= htmlspecialchars($label) ?></span>
                            <span class="prob-bar">
                                <span class="prob-fill" style="width: <?= number_format($pct, 2) ?>%"></span>
                            </span>
                            <span class="prob-value"><?= number_format($pct, 1) ?>%</span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</body>
</html>