<?php
session_name('KPLUZ_SESSION');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Get subject and lesson from URL parameters
if (!isset($_GET['subject']) || !isset($_GET['lesson'])) {
    die("Subject and lesson required in URL, e.g., ?subject=Effective%20Communication&lesson=Q1%20Lesson%201");
}
$subject_name = $_GET['subject'];
$lesson_name = $_GET['lesson'];

// Determine which student to view (for teachers) or default to logged in user
$view_student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : $_SESSION['user_id'];

// Connect to MySQL
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get current logged in user details
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

// Get the student's name (the one whose results we're viewing)
$student_stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
$student_stmt->bind_param("i", $view_student_id);
$student_stmt->execute();
$student_result = $student_stmt->get_result();
$student_data = $student_result->fetch_assoc();

if (!$student_data) {
    die("Student not found.");
}

$student_name = $student_data['name'];

// For teachers: verify they are viewing a student (not themselves or another teacher)
$is_teacher_viewing = ($user_role === 'teacher' && $view_student_id != $user_id);

// Get test results from database
$result_stmt = $conn->prepare("SELECT * FROM test_results WHERE user_id = ? AND subject = ? AND lesson = ?");
$result_stmt->bind_param("iss", $view_student_id, $subject_name, $lesson_name);
$result_stmt->execute();
$test_result = $result_stmt->get_result()->fetch_assoc();

if (!$test_result) {
    die("No test results found for student: " . htmlspecialchars($student_name) . " - Subject: " . htmlspecialchars($subject_name) . " and Lesson: " . htmlspecialchars($lesson_name));
}

// Check if answers field exists and is not null
if (!isset($test_result['answers']) || empty($test_result['answers'])) {
    die("No answer data found for this test. The answers field is empty.");
}

// Decode the answers JSON (preserves the exact order shown to student)
$answers = json_decode($test_result['answers'], true);

if (!$answers || empty($answers)) {
    die("Unable to decode answer data. JSON format may be invalid.");
}

// Get all question IDs from the answers (in the order they were shown)
$question_ids = array_column($answers, 'question_id');

// Fetch all questions from database
$placeholders = implode(',', array_fill(0, count($question_ids), '?'));
$q_stmt = $conn->prepare("SELECT * FROM questions WHERE id IN ($placeholders)");
$q_stmt->bind_param(str_repeat('i', count($question_ids)), ...$question_ids);
$q_stmt->execute();
$questions_result = $q_stmt->get_result();

// Map questions by ID for easy lookup
$questions_map = [];
while ($q = $questions_result->fetch_assoc()) {
    $questions_map[$q['id']] = $q;
}

// Build results array in the exact order from answers
$results = [];
foreach ($answers as $answer) {
    $qid = $answer['question_id'];
    if (isset($questions_map[$qid])) {
        $q = $questions_map[$qid];
        $results[] = [
            'question' => $q['question'],
            'type' => $q['type'],
            'user_answer' => $answer['user_answer'],
            'correct_answer' => $q['correct'],
            'is_correct' => $answer['is_correct'],
            'solution' => $q['solution'] ?? '',
            'wrong1' => $q['wrong1'] ?? '',
            'wrong2' => $q['wrong2'] ?? '',
            'wrong3' => $q['wrong3'] ?? ''
        ];
    }
}

$score = $test_result['score'];
$total = $test_result['total_questions'];
$percentage = $test_result['percentage'];
$passed = $percentage >= 75;

$conn->close();
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
    
    .student-info {
        color: #666;
        margin-bottom: 10px;
        font-size: 0.9em;
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
        <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
        <div class="user-info">
            KPluz SHS - Test Results
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <h2>Test Results</h2>
        
        <div class="results-container">
            
            <div class="score-summary">
                <?php if ($is_teacher_viewing): ?>
                    <div class="student-info">Student: <?= htmlspecialchars($student_name) ?></div>
                <?php endif; ?>
                <h3><?= htmlspecialchars($subject_name) ?> - <?= htmlspecialchars($lesson_name) ?></h3>
                <div class="score-number"><?= $score ?>/<?= $total ?></div>
                <div class="score-percentage"><?= number_format($percentage, 1) ?>%</div>
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
                    
                    <?php if ($r['type'] == 'MC'): ?>
                        <div class="answer-section" style="margin-top: 10px; margin-left: 20px;">
                            <strong>Options:</strong><br>
                            A. <?= htmlspecialchars($r['correct_answer']) ?><br>
                            B. <?= htmlspecialchars($r['wrong1']) ?><br>
                            C. <?= htmlspecialchars($r['wrong2']) ?><br>
                            D. <?= htmlspecialchars($r['wrong3']) ?>
                        </div>
                    <?php endif; ?>
                    
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
                <?php if ($is_teacher_viewing): ?>
                    <a href="results-students.php?subject=<?= urlencode($subject_name) ?>&lesson=<?= urlencode($lesson_name) ?>" class="dashboard-btn">Back to Student List</a>
                <?php else: ?>
                    <a href="report_cards.php" class="dashboard-btn">Back to Report Cards</a>
                <?php endif; ?>
                <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>
    </div>
  </div>
</body>
</html>