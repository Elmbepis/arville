<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_POST['question_ids']) || !is_array($_POST['question_ids'])) {
    die("No questions submitted.");
}

$question_ids = $_POST['question_ids'];
$total = count($question_ids);
$score = 0;

// Connect to DB
$conn = new mysqli("localhost", "root", "AcadeV25!", "courses");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$results = [];

// Normalization function for comparisons
function normalize_answer($answer) {
    $a = strtolower(trim($answer));
    if ($a === 'true') return 't';
    if ($a === 'false') return 'f';
    return $a;
}

foreach ($question_ids as $id) {
    $stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $q = $res->fetch_assoc();

    // Get user's submitted answer
    $user_answer_raw = isset($_POST["answer_$id"]) ? $_POST["answer_$id"] : '';
    $user_answer = trim($user_answer_raw);

    // Normalize both user and correct answers
    $user_norm = normalize_answer($user_answer);
    $correct_norm = normalize_answer($q['correct']);

    $correct = $user_norm === $correct_norm;

    if ($correct) {
        $score++;
    }

    $results[] = [
        'question' => $q['question'],
        'type' => $q['type'],
        'user_answer' => $user_answer,
        'correct_answer' => $q['correct'],
        'is_correct' => $correct
    ];
}

$conn->close();

// Calculate percentage
$percentage = $total > 0 ? round(($score / $total) * 100) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Test Results</title>
  <style>
    * {
        box-sizing: border-box;
    }
    body { 
        font-family: Arial, sans-serif; 
        text-align: center; 
        background: #f0f0f0; 
        margin: 0;
        padding: 20px;
    }

    /* Header background strip */
    .header {
        width: 100%;
        height: 264px;
        background: url('header-bg.jpg') repeat-x top center;
        background-size: auto 264px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .header-logo {
        max-height: 200px;
    }
    
    h2 {
        color: #003366;
        margin-bottom: 10px;
    }
    
    .results-container {
        background: white;
        padding: 30px;
        margin: 0 auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        max-width: 800px;
        text-align: left;
    }
    
    .score-summary {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 30px;
        border-left: 4px solid #003366;
    }
    
    .score-number {
        font-size: 2.5em;
        font-weight: bold;
        color: #003366;
        margin: 10px 0;
    }
    
    .score-percentage {
        font-size: 1.2em;
        color: #666;
        margin-bottom: 10px;
    }
    
    .question-result {
        margin-bottom: 25px;
        padding: 20px;
        border-radius: 6px;
        border-left: 4px solid #ccc;
    }
    
    .correct {
        background: #f0fff0;
        border-left-color: #28a745;
    }
    
    .incorrect {
        background: #fff0f0;
        border-left-color: #dc3545;
    }
    
    .question-text {
        font-weight: bold;
        margin-bottom: 15px;
        color: #003366;
        font-size: 1.1em;
    }
    
    .answer-section {
        margin-bottom: 10px;
        padding: 8px;
        background: white;
        border-radius: 4px;
    }
    
    .user-answer {
        color: #333;
    }
    
    .correct-answer {
        color: #28a745;
        font-weight: bold;
    }
    
    .status-icon {
        font-size: 1.2em;
        margin-right: 8px;
    }
    
    .status-correct {
        color: #28a745;
        font-weight: bold;
    }
    
    .status-incorrect {
        color: #dc3545;
        font-weight: bold;
    }
    
    .back-button {
        display: inline-block;
        padding: 12px 24px;
        background: #003366;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 20px;
        transition: background 0.3s;
    }
    
    .back-button:hover {
        background: #0055aa;
        color: white;
    }
  </style>
</head>
<body>
  <!-- Header with tiled background and logo -->
  <div class="header">
    <img src="paf-logo.png" alt="PAF Logo" class="header-logo">
  </div>

  <h2>Test Results</h2>
  
  <div class="results-container">
    <div class="score-summary">
      <h3>Your Test Score</h3>
      <div class="score-number"><?= $score ?>/<?= $total ?></div>
      <div class="score-percentage"><?= $percentage ?>%</div>
      <p>Questions Answered: <?= $total ?></p>
    </div>

    <?php foreach ($results as $index => $r): ?>
        <div class="question-result <?= $r['is_correct'] ? 'correct' : 'incorrect' ?>">
            <div class="question-text">
                <?= ($index+1) ?>. <?= htmlspecialchars($r['question']) ?>
            </div>
            
            <div class="answer-section">
                <strong>Your Answer:</strong> 
                <span class="user-answer"><?= htmlspecialchars($r['user_answer']) ?></span>
            </div>
            
            <div class="status <?= $r['is_correct'] ? 'status-correct' : 'status-incorrect' ?>">
                <span class="status-icon"><?= $r['is_correct'] ? '&#9989;' : '&#10060;' ?></span>
                <?= $r['is_correct'] ? 'Correct' : 'Incorrect' ?>
            </div>
            
            <?php if (!$r['is_correct']): ?>
                <div class="answer-section">
                    <strong>Correct Answer:</strong> 
                    <span class="correct-answer"><?= htmlspecialchars($r['correct_answer']) ?></span>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <div style="text-align: center; margin-top: 30px;">
        <a href="javascript:history.back()" class="back-button">Take Another Test</a>
    </div>
  </div>
</body>
</html>