<?php
// ask.php — Direct cURL call to local Laya server

$result = null;
$question = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['question'])) {
    $question = trim($_POST['question']);

    // Build the request payload
    $payload = [
        'model' => 'auto',
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
                    'cell_biology' => 'cell structure, organelles, how cells work, cell division'
                ]
            ]
        ]
    ];

    $ch = curl_init('http://localhost:8000/v1/systemone');
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_TIMEOUT => 30
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false) {
        $error = 'Could not connect to Laya server. Is use-laya.bat running?';
    } elseif ($httpCode !== 200) {
        $error = "Laya server returned HTTP $httpCode: $response";
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
        input[type=text] { width: 480px; padding: 8px; font-size: 16px; }
        button { padding: 8px 20px; font-size: 16px; }
        .result { background: #f4f4f4; padding: 20px; border-radius: 8px; margin-top: 20px; }
        .topic { font-size: 24px; font-weight: bold; color: #2a7; }
        .conf { color: #666; }
        .error { background: #fee; padding: 15px; border-radius: 8px; color: #a00; margin-top: 20px; }
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

    <?php if ($result): ?>
        <div class="result">
            <?php
                $answer = $result['answers']['topic'] ?? null;
                if ($answer) {
                    $topic = htmlspecialchars($answer['choice']);
                    $conf = number_format($answer['confidence'] * 100, 1);
                    echo "<div class='topic'>$topic</div>";
                    echo "<div class='conf'>Confidence: $conf%</div>";
                    echo "<h3>All probabilities:</h3><ul>";
                    foreach ($answer['probabilities'] as $label => $prob) {
                        printf("<li>%s: %.1f%%</li>", htmlspecialchars($label), $prob * 100);
                    }
                    echo "</ul>";
                } else {
                    echo "<pre>" . htmlspecialchars(print_r($result, true)) . "</pre>";
                }
            ?>
        </div>
    <?php endif; ?>
</body>
</html>