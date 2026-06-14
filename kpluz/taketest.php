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

// Connect to MySQL
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

// Check if user is student
if ($user_role !== 'student') {
    die("Access restricted to students only.");
}

// Fetch test details (including teacher and topic)
$test_stmt = $conn->prepare("SELECT id, subject, lesson, topic, teacher FROM tests WHERE subject = ? AND lesson = ?");
$test_stmt->bind_param("ss", $subject_name, $lesson_name);
$test_stmt->execute();
$test_result = $test_stmt->get_result();
$test = $test_result->fetch_assoc();

if (!$test) {
    die("Test not found for subject: " . htmlspecialchars($subject_name) . " and lesson: " . htmlspecialchars($lesson_name));
}

$test_id = $test['id'];
$test_subject = $test['subject'];
$test_lesson = $test['lesson'];
$test_topic = $test['topic'];
$test_teacher = $test['teacher'];

// Check if student has already taken this test using test_id
$check_stmt = $conn->prepare("SELECT id FROM test_results WHERE user_id = ? AND test_id = ?");
$check_stmt->bind_param("ii", $user_id, $test_id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    // Student already took this test – show message (unchanged)
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='utf-8'>
        <title>Test Already Taken</title>
        <style>
            * { box-sizing: border-box; }
            body { font-family: Arial, sans-serif; text-align: center; background: #f0f0f0; margin: 0; padding: 20px; }
            .dashboard-container { background: white; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; max-width: 800px; margin: 0 auto; }
            .user-welcome { background: linear-gradient(135deg, #003366, #0055aa); color: white; padding: 30px; text-align: center; }
            .dashboard-content { padding: 40px; text-align: center; }
            .message-box { background: #f8f9fa; padding: 30px; border-radius: 8px; margin-bottom: 30px; }
            .warning-icon { font-size: 3em; margin-bottom: 20px; }
            .action-buttons { display: flex; justify-content: center; gap: 15px; margin-top: 20px; flex-wrap: wrap; }
            .dashboard-btn { padding: 12px 24px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; display: inline-block; }
            .logout-btn { padding: 12px 24px; background: #dc3545; color: white; text-decoration: none; border-radius: 4px; display: inline-block; }
        </style>
    </head>
    <body>
        <div class='dashboard-container'>
            <div class='user-welcome'>
                <div class='welcome-text'>Welcome, " . htmlspecialchars($user_name) . "!</div>
                <div class='user-info'>KPluz SHS - Take Test</div>
            </div>
            <div class='dashboard-content'>
                <div class='message-box'>
                    <div class='warning-icon'>&#9888;&#65039;</div>
                    <h2>Test Already Taken</h2>
                    <p>You have already completed the test for:<br/>
                    <strong>" . htmlspecialchars($test_subject) . " - " . htmlspecialchars($test_lesson) . "</strong><br/>
                    " . htmlspecialchars($test_topic) . "</p>
                    <p>Please view your report card instead.</p>
                </div>
                <div class='action-buttons'>
                    <a href='report_cards.php' class='dashboard-btn'>View Report Cards</a>
                    <a href='dashboard.php' class='dashboard-btn'>Back to Dashboard</a>
                    <a href='logout.php' class='logout-btn'>Logout</a>
                </div>
            </div>
        </div>
    </body>
    </html>";
    $conn->close();
    exit();
}

// &#9989; Correct question loading based on test owner
if ($test_teacher === 'KPluz') {
    // KPluz questions have topic = NULL
    $stmt = $conn->prepare("SELECT * FROM questions WHERE subject = ? AND lesson = ? AND topic IS NULL ORDER BY RAND()");
    $stmt->bind_param("ss", $subject_name, $lesson_name);
} else {
    // Non&#8209;KPluz questions have a specific topic
    $stmt = $conn->prepare("SELECT * FROM questions WHERE subject = ? AND lesson = ? AND topic = ? ORDER BY RAND()");
    $stmt->bind_param("sss", $subject_name, $lesson_name, $test_topic);
}
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}

// Store question details in session for grading
$_SESSION['current_test_subject'] = $subject_name;
$_SESSION['current_test_lesson'] = $lesson_name;
$_SESSION['current_test_id'] = $test_id;
$_SESSION['current_test_question_ids'] = array_column($questions, 'id');
$_SESSION['current_test_question_count'] = count($questions);
$_SESSION['current_test_questions_order'] = $questions;

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($test_topic) ?> - Take Test</title>  
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
    }
    
    .test-info {
        color: #666;
        margin-bottom: 20px;
        font-size: 16px;
    }
    
    .topic-line {
        font-size: 1.5em;
        color: #9b59b6;
        font-weight: bold;
        margin-bottom: 15px;
        margin-top: 10px;
    }
    
    .other-info {
        color: #666;
        font-size: 16px;
        margin-bottom: 10px;
    }
    
    .test-form {
        background: #f8f9fa;
        padding: 20px;
        margin: 0 auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        text-align: left;
    }
    
    .question {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #ddd;
    }
    
    .question:last-child {
        border-bottom: none;
    }
    
    .question-text {
        font-weight: bold;
        margin-bottom: 10px;
        color: #003366;
    }
    
    .choices {
        margin-left: 20px;
    }
    
    .choice {
        margin-bottom: 8px;
    }
    
    input[type="radio"], input[type="text"] {
        margin-right: 8px;
    }
    
    input[type="text"] {
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 250px;
    }
    
    .submit-btn {
        padding: 12px 24px;
        border: none;
        background: #003366;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        margin-top: 20px;
    }
    
    .test-for-text {
        font-size: 1em;
        color: #dc3545;
        font-weight: bold;
    }
    
    .submit-btn:hover { 
        background: #0055aa; 
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
            KPluz SHS - Take Test
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <h2><span class="test-for-text">Test for:</span><br/><?= htmlspecialchars($test_subject) ?> - <?= htmlspecialchars($test_lesson) ?></h2>
        
        <div class="topic-line">&#128214; Topic: <?= htmlspecialchars($test_topic) ?></div>
        
        <div class="other-info">
            <strong>Total Questions:</strong> <?= count($questions) ?>
        </div>
        <div class="other-info" style="margin-bottom: 20px;">
            Please answer all questions below. Once completed, click the Submit button at the bottom of the page.
        </div>

        <div class="test-form">
            <form action="gradetest.php" method="post">
                <input type="hidden" name="subject" value="<?= htmlspecialchars($subject_name) ?>">
                <input type="hidden" name="lesson" value="<?= htmlspecialchars($lesson_name) ?>">
                <input type="hidden" name="test_id" value="<?= $test_id ?>">
                <?php 
                // Reset array keys to ensure proper numbering after shuffle
                $questions = array_values($questions);
                foreach ($questions as $index => $q): 
                ?>
                    <div class="question">
                        <div class="question-text"><?= ($index+1) ?>. <?= htmlspecialchars($q['question']) ?></div>
                        <input type="hidden" name="question_ids[]" value="<?= $q['id'] ?>">
                        <input type="hidden" name="correct_answer_<?= $q['id'] ?>" value="<?= htmlspecialchars($q['correct']) ?>">

                        <?php if ($q['type'] == 'MC'): ?>
                            <?php
                                // Shuffle choices for each question
                                $choices = [
                                    $q['correct'],
                                    $q['wrong1'],
                                    $q['wrong2'],
                                    $q['wrong3']
                                ];
                                shuffle($choices);
                            ?>
                            <div class="choices">
                            <?php foreach ($choices as $choice): ?>
                                <div class="choice">
                                    <label>
                                        <input type="radio" name="answer_<?= $q['id'] ?>" value="<?= htmlspecialchars($choice) ?>" required>
                                        <?= htmlspecialchars($choice) ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                            </div>

                        <?php elseif ($q['type'] == 'TF'): ?>
                            <div class="choices">
                                <div class="choice">
                                    <label>
                                        <input type="radio" name="answer_<?= $q['id'] ?>" value="True" required> True
                                    </label>
                                </div>
                                <div class="choice">
                                    <label>
                                        <input type="radio" name="answer_<?= $q['id'] ?>" value="False" required> False
                                    </label>
                                </div>
                            </div>

                        <?php elseif ($q['type'] == 'FB'): ?>
                            <div class="choices">
                                <input type="text" name="answer_<?= $q['id'] ?>" placeholder="Type your answer here" required>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <div style="text-align: center;">
                    <input type="submit" value="Submit Test" class="submit-btn">
                </div>
            </form>
        </div>

        <div class="action-buttons">
            <a href="tests.php" class="dashboard-btn">Back to Tests</a>
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>