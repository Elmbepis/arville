<?php
// ask.php — Production version calling arville server Laya

$result = null;
$question = '';
$error = '';

// Config — change these when deploying
$LAYA_URL = 'http://127.0.0.1:8080/v1/systemone';
$LAYA_KEY = 'laya_3Quj2gNZj9y1uvKycEuButBFxgjbBol5z-0jAQEs5l4';  // paste your key locally, never commit

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['question'])) {
    $question = trim($_POST['question']);

    $payload = [
        'state' => $question,
        'questions' => [
            'topic' => [
                'type' => 'choice',
                'instructions' => 'Which science topic does this student question relate to?',
                'criteria' => [
                    'photosynthesis' => 'how plants make food from sunlight, produce glucose, use chlorophyll',
                    'water_cycle' => 'evaporation, condensation, precipitation, how water moves through nature',
                    'respiration' => 'how organisms breathe, how cells release energy from food, gas exchange',
                    'vertebrates' => 'animals with backbones, mammals, birds, fish, reptiles, amphibians',
                    'cell_biology' => 'cell structure, organelles, how cells work, cell division',
                ],
            ],
        ],
    ];

    $ch = curl_init($LAYA_URL);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $LAYA_KEY,
            'Content-Type: application/json',
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_TIMEOUT => 120,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false) {
        $error = 'Could not reach Laya server.';
    } elseif ($httpCode !== 200) {
        $error = "Laya returned HTTP $httpCode: " . substr($response, 0, 200);
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
        .result { background: #f4f4f4; padding: 24px; border-radius: 8px; margin-top: 24px; }
        .topic { font-size: 28px; font-weight: bold; color: #2a7; margin-bottom: 8px; }
        .conf { color: #666; margin-bottom: 16px; }
        .error { background: #fee; padding: 16px; border-radius: 8px; color: #a00; margin-top: 16px; }
        ul { margin: 8px 0; padding-left: 20px; }
        li { margin: 4px 0; color: #444; }
    </style>
</head>
<body>
    <h1>Ask a Science Question</h1>
    <form method="POST">
        <input type="text" name="question" value="<?= htmlspecialchars($question) ?>" placeholder="e.g., How do plants make food?" autofocus>
        <button type="submit">Ask</button>
    </form>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($result && isset($result['answers']['topic'])): 
        $a = $result['answers']['topic'];
        $topic = htmlspecialchars($a['choice']);
        $conf = number_format($a['confidence'] * 100, 1);
    ?>
        <div class="result">
            <div class="topic"><?= $topic ?></div>
            <div class="conf">Confidence: <?= $conf ?>%</div>
            <h3>All probabilities:</h3>
            <ul>
                <?php foreach ($a['probabilities'] as $label => $prob): ?>
                    <li><?= htmlspecialchars($label) ?>: <?= number_format($prob * 100, 2) ?>%</li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</body>
</html>