<?php
// ask.php — Auto-detects local vs online, calls the appropriate Laya endpoint.
//
// Local mode  : http://localhost:8000/v1/systemone   (no auth)
// Online mode : http://127.0.0.1:8080/v1/systemone   (Bearer auth from /etc/arville/config.php)

// ---------- Environment detection ----------
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$hostname = preg_replace('/:\d+$/', '', $host);   // strip :port

$isLocal = in_array($hostname, ['localhost', '127.0.0.1', '::1'], true)
    || preg_match('/^192\.168\./', $hostname)
    || preg_match('/^10\./', $hostname)
    || preg_match('/^172\.(1[6-9]|2\d|3[01])\./', $hostname)
    || preg_match('/\.local$/', $hostname)
    || preg_match('/\.test$/', $hostname);

// ---------- Endpoint config ----------
if ($isLocal) {
    $LAYA_URL = 'http://localhost:8000/v1/systemone';
    $LAYA_KEY = null;
    $MODE     = 'local';
} else {
    $configFile = '/etc/arville/config.php';
    if (is_readable($configFile)) {
        $config   = require $configFile;
        $LAYA_URL = $config['laya_url'] ?? 'http://127.0.0.1:8080/v1/systemone';
        $LAYA_KEY = $config['laya_key'] ?? null;
    } else {
        $LAYA_URL = 'http://127.0.0.1:8080/v1/systemone';
        $LAYA_KEY = null;
    }
    $MODE = 'online';
}

// ---------- Handle submission ----------
$result   = null;
$question = '';
$error    = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['question'])) {
    $question = trim($_POST['question']);

    $payload = [
        'model' => 'auto',
        'state' => $question,
        'questions' => [
            'topic' => [
                'type' => 'choice',
                'instructions' => 'Which science topic does this student question relate to?',
                'criteria' => [
                    'photosynthesis' => 'how plants make food from sunlight, produce glucose, use chlorophyll',
                    'water_cycle'    => 'evaporation, condensation, precipitation, how water moves through nature',
                    'respiration'    => 'how organisms breathe, how cells release energy from food, gas exchange',
                    'vertebrates'    => 'animals with backbones, mammals, birds, fish, reptiles, amphibians',
                    'cell_biology'   => 'cell structure, organelles, how cells work, cell division',
                ],
            ],
        ],
    ];

    $headers = ['Content-Type: application/json'];
    if (!empty($LAYA_KEY)) {
        $headers[] = 'Authorization: Bearer ' . $LAYA_KEY;
    }

    $ch = curl_init($LAYA_URL);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => $headers,
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_TIMEOUT        => 120,
    ]);

    $response  = curl_exec($ch);
    $httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlErrno = curl_errno($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false) {
        $error = "Could not reach Laya at $LAYA_URL [$curlErrno: $curlError] ($MODE mode)";
    } elseif ($httpCode !== 200) {
        $error = "Laya returned HTTP $httpCode ($MODE mode): " . substr($response, 0, 200);
    } else {
        $result = json_decode($response, true);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ask a Science Question</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
        input[type=text] { width: 480px; padding: 10px; font-size: 16px; }
        button { padding: 10px 24px; font-size: 16px; cursor: pointer; }
        .mode-badge { display: inline-block; font-size: 11px; padding: 2px 8px; border-radius: 10px;
                      background: #eee; color: #666; margin-bottom: 8px; text-transform: uppercase;
                      letter-spacing: 0.5px; }
        .mode-local  { background: #ffe9c4; color: #8a5a00; }
        .mode-online { background: #d6f5e0; color: #1f7a4a; }
        .result { background: #f4f4f4; padding: 24px; border-radius: 8px; margin-top: 24px; }
        .topic  { font-size: 28px; font-weight: bold; color: #2a7; margin-bottom: 8px; }
        .conf   { color: #666; margin-bottom: 16px; }
        .error  { background: #fee; padding: 16px; border-radius: 8px; color: #a00; margin-top: 16px;
                  font-family: monospace; font-size: 13px; word-break: break-all; }
        ul { margin: 8px 0; padding-left: 20px; }
        li { margin: 4px 0; color: #444; }
    </style>
</head>
<body>
    <div class="mode-badge mode-<?= $MODE ?>">Running in <?= $MODE ?> mode</div>
    <h1>Ask a Science Question</h1>
    <form method="POST">
        <input type="text" name="question" value="<?= htmlspecialchars($question) ?>"
               placeholder="e.g., How do plants make food?" autofocus>
        <button type="submit">Ask</button>
    </form>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($result): 
        $answer = $result['answers']['topic'] ?? null;
    ?>
        <div class="result">
            <?php if ($answer): 
                $topic = htmlspecialchars($answer['choice']);
                $conf  = number_format(($answer['confidence'] ?? 0) * 100, 1);
            ?>
                <div class="topic"><?= $topic ?></div>
                <div class="conf">Confidence: <?= $conf ?>%</div>
                <?php if (!empty($answer['probabilities'])): ?>
                    <h3>All probabilities:</h3>
                    <ul>
                        <?php foreach ($answer['probabilities'] as $label => $prob): ?>
                            <li><?= htmlspecialchars($label) ?>: <?= number_format($prob * 100, 2) ?>%</li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <?php else: ?>
                <pre><?= htmlspecialchars(print_r($result, true)) ?></pre>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>
</html>