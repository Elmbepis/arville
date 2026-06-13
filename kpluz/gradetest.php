<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

if (!isset($_POST['question_ids']) || !is_array($_POST['question_ids'])) {
    die("No questions submitted.");
}

// ADDED: Use stored question order from session if available
if (isset($_SESSION['current_test_questions_order']) && !empty($_SESSION['current_test_questions_order'])) {
    $questions_in_order = $_SESSION['current_test_questions_order'];
    $question_ids = array_column($questions_in_order, 'id');
} else {
    $question_ids = $_POST['question_ids'];
}
// END ADDED

$total = count($question_ids);
$score = 0;

// Get subject, lesson, and test_id from POST
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$lesson = isset($_POST['lesson']) ? $_POST['lesson'] : '';
$test_id = isset($_POST['test_id']) ? intval($_POST['test_id']) : 0;

// Connect to DB - Changed to kpluz database
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user details
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$user_name = $user['name'];
$user_role = $user['role'];

$results = [];

// Normalization function for comparisons
function normalize_answer($answer) {
    // Handle null or empty values
    if ($answer === null || $answer === '') {
        return '';
    }
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
    
    // Skip if question not found
    if (!$q) {
        continue;
    }

    // Get user's submitted answer
    $user_answer_raw = isset($_POST["answer_$id"]) ? $_POST["answer_$id"] : '';
    // Handle null or empty values for htmlspecialchars later
    $user_answer = ($user_answer_raw !== null && $user_answer_raw !== '') ? trim($user_answer_raw) : '(no answer)';
    
    // Get correct answer with null check
    $correct_answer = isset($q['correct']) ? $q['correct'] : '';
    
    // Get solution if present
    $solution = isset($q['solution']) && $q['solution'] !== '' && $q['solution'] !== null ? $q['solution'] : '';

    // Normalize both user and correct answers (skip if empty)
    $user_norm = ($user_answer !== '(no answer)') ? normalize_answer($user_answer) : '';
    $correct_norm = ($correct_answer !== '') ? normalize_answer($correct_answer) : '';

    $is_correct = ($user_norm !== '' && $correct_norm !== '' && $user_norm === $correct_norm);

    if ($is_correct) {
        $score++;
    }

    $results[] = [
        'question' => isset($q['question']) ? $q['question'] : 'Question not found',
        'type' => isset($q['type']) ? $q['type'] : 'MC',
        'user_answer' => $user_answer,
        'correct_answer' => $correct_answer,
        'is_correct' => $is_correct,
        'solution' => $solution
    ];
}

// ADDED: Build answers data in the order shown to student
$answers_data = [];
foreach ($question_ids as $position => $qid) {
    // Find the corresponding result for this question
    $user_answer_for_q = '';
    $is_correct_for_q = false;
    foreach ($results as $result_item) {
        // Need to match by question text or store question id in results
        // For now, we'll re-fetch the user answer from POST
        $user_answer_raw = isset($_POST["answer_$qid"]) ? $_POST["answer_$qid"] : '';
        $user_answer_val = ($user_answer_raw !== null && $user_answer_raw !== '') ? trim($user_answer_raw) : '(no answer)';
        
        // Get correct answer to determine correctness
        $q_stmt = $conn->prepare("SELECT correct FROM questions WHERE id = ?");
        $q_stmt->bind_param("i", $qid);
        $q_stmt->execute();
        $q_res = $q_stmt->get_result();
        $q_data = $q_res->fetch_assoc();
        $correct_val = $q_data['correct'] ?? '';
        
        $user_norm = normalize_answer($user_answer_val);
        $correct_norm = normalize_answer($correct_val);
        $is_correct_val = ($user_norm !== '' && $correct_norm !== '' && $user_norm === $correct_norm);
        
        $answers_data[] = [
            'question_id' => $qid,
            'user_answer' => $user_answer_val,
            'is_correct' => $is_correct_val
        ];
        break; // Process one question at a time
    }
}
$answers_json = json_encode($answers_data);
// END ADDED

// Save test result to database - Check if record already exists
$existing_id = null;
$action_taken = "insert"; // Track what action was taken

if ($subject !== '' && $lesson !== '') {
    $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
    
    // Check if a record already exists for this user, subject, and lesson
    $check_stmt = $conn->prepare("SELECT id, score, total_questions, percentage FROM test_results WHERE user_id = ? AND subject = ? AND lesson = ?");
    $check_stmt->bind_param("iss", $user_id, $subject, $lesson);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    
    if ($check_result->num_rows > 0) {
        // Record exists - update it instead of inserting
        $existing_record = $check_result->fetch_assoc();
        $existing_id = $existing_record['id'];
        
        // MODIFIED: Include answers in update
        $update_stmt = $conn->prepare("UPDATE test_results SET score = ?, total_questions = ?, percentage = ?, answers = ? WHERE id = ?");
        $update_stmt->bind_param("iiidsi", $score, $total, $percentage, $answers_json, $existing_id);
        
        if ($update_stmt->execute()) {
            $action_taken = "updated";
        } else {
            // Log error but continue
            error_log("Failed to update test result: " . $conn->error);
        }
        $update_stmt->close();
    } else {
        // No existing record - insert new one with test_id
        $insert_stmt = $conn->prepare("INSERT INTO test_results (user_id, subject, lesson, test_id, score, total_questions, percentage, answers) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_stmt->bind_param("issiiids", $user_id, $subject, $lesson, $test_id, $score, $total, $percentage, $answers_json);
        
        if ($insert_stmt->execute()) {
            $action_taken = "inserted";
        } else {
            // Log error but continue
            error_log("Failed to insert test result: " . $conn->error);
        }
        $insert_stmt->close();
    }
    $check_stmt->close();
} else {
    $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
}

// ADDED: Clear session data after saving
unset($_SESSION['current_test_questions_order']);
// END ADDED

$conn->close();

// Calculate percentage for display
$percentage = $total > 0 ? round(($score / $total) * 100) : 0;
$passed = $percentage >= 75;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Test Results</title>
  <style>
    * {
        box-sizing: border-box;
    }
    body { 
        font-family: 'Arial', sans-serif; 
        text-align: center; 
        background: #f0f0f0; 
        margin: 0;
        padding: 20px;
    }

    .dashboard-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0;
    }
    
    .user-welcome {
        background: linear-gradient(135deg, #003366, #0055aa);
        color: white;
        padding: 30px;
        text-align: center;
    }
    
    .welcome-text {
        font-size: 2em;
        margin-bottom: 10px;
        font-weight: bold;
    }
    
    .user-info {
        font-size: 1.2em;
        opacity: 0.9;
    }
    
    .role-badge {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9em;
        margin-left: 10px;
        text-transform: uppercase;
    }
    
    .dashboard-content {
        padding: 40px;
        text-align: left;
    }
    
    h2 {
        color: #003366;
        margin-bottom: 10px;
        text-align: center;
    }
    
    .results-container {
        background: #f8f9fa;
        padding: 30px;
        margin: 0 auto;
        border-radius: 8px;
        text-align: left;
    }
    
    .score-summary {
        background: white;
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
    
    .passed {
        color: #28a745;
        font-weight: bold;
    }
    
    .failed {
        color: #dc3545;
        font-weight: bold;
    }
    
    .question-result {
        margin-bottom: 25px;
        padding: 20px;
        border-radius: 6px;
        border-left: 4px solid #ccc;
        background: white;
    }
    
    .correct {
        border-left-color: #28a745;
        background: #f0fff0;
    }
    
    .incorrect {
        border-left-color: #dc3545;
        background: #fff0f0;
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
        background: #f8f9fa;
        border-radius: 4px;
    }
    
    .solution-section {
        margin-top: 12px;
        padding: 12px;
        background: #e7f3ff;
        border-radius: 4px;
        border-left: 3px solid #003366;
    }
    
    .solution-title {
        font-weight: bold;
        color: #003366;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .solution-content {
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
        color: #333;
        line-height: 1.6;
        white-space: pre-line;
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
    
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }
    
    .dashboard-btn {
        padding: 12px 24px;
        border: none;
        background: #28a745;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .dashboard-btn:hover { 
        background: #218838; 
        color: white;
    }
    
    .logout-btn {
        padding: 12px 24px;
        border: none;
        background: #dc3545;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .logout-btn:hover { 
        background: #c82333; 
        color: white;
    }


  </style>
</head>
<body>
  <div class="dashboard-container">
    <div class="header">
        <img src="images/kpluz_logo.png" alt="KPluz Logo" class="header-logo">
    </div>
    
    <div class="user-welcome">
        <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name ?? 'Student') ?>!</div>
        <div class="user-info">
            KPluz SHS - Test Results
            <span class="role-badge"><?= ucfirst($user_role ?? 'student') ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <h2>Test Results</h2>
        
        <div class="results-container">
            
            <div class="score-summary">
                <h3>Your Test Score</h3>
                <div class="score-number"><?= $score ?>/<?= $total ?></div>
                <div class="score-percentage"><?= $percentage ?>%</div>
                <div class="<?= $passed ? 'passed' : 'failed' ?>">
                    <?= $passed ? '&#10003; PASSED' : '&#10007; FAILED' ?>
                </div>
                <p>Questions Answered: <?= $total ?></p>
            </div>

            <?php foreach ($results as $index => $r): ?>
                <div class="question-result <?= $r['is_correct'] ? 'correct' : 'incorrect' ?>">
                    <div class="question-text">
                        <?= ($index+1) ?>. <?= htmlspecialchars($r['question'] ?? '') ?>
                    </div>
                    
                    <div class="answer-section">
                        <strong>Your Answer:</strong> 
                        <span class="user-answer"><?= htmlspecialchars($r['user_answer'] ?? '') ?></span>
                    </div>
                    
                    <div class="<?= $r['is_correct'] ? 'status-correct' : 'status-incorrect' ?>">
                        <span class="status-icon"><?= $r['is_correct'] ? '&#10003;' : '&#10007;' ?></span>
                        <?= $r['is_correct'] ? 'Correct' : 'Incorrect' ?>
                    </div>
                    
                    <?php if (!$r['is_correct']): ?>
                        <div class="answer-section">
                            <strong>Correct Answer:</strong> 
                            <span class="correct-answer"><?= htmlspecialchars($r['correct_answer'] ?? '') ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($r['solution'])): ?>
                        <div class="solution-section">
                            <div class="solution-title">
                                <span>&#128161;</span> Solution:
                            </div>
                            <div class="solution-content">
                                <?= nl2br(htmlspecialchars($r['solution'])) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <div class="action-buttons">
                <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>
    </div>
  </div>
</body>
</html>