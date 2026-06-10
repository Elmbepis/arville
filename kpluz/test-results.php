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

// Get parameters
$subject_name = isset($_GET['subject']) ? $_GET['subject'] : '';
$lesson_name = isset($_GET['lesson']) ? $_GET['lesson'] : '';
$student_id_param = isset($_GET['student_id']) ? intval($_GET['student_id']) : null;

if (empty($subject_name)) {
    die("Subject required in URL, e.g., ?subject=Biology+1&student_id=9");
}

// Determine which student to view
if ($student_id_param) {
    $view_student_id = $student_id_param;
} else {
    $view_student_id = $_SESSION['user_id'];
}

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

// Get the student's name
$student_stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
$student_stmt->bind_param("i", $view_student_id);
$student_stmt->execute();
$student_result = $student_stmt->get_result();
$student_data = $student_result->fetch_assoc();

if (!$student_data) {
    die("Student not found.");
}

$student_name = $student_data['name'];

// Check if viewing as teacher/admin
$is_admin_view = ($user_role === 'teacher' || $user_role === 'admin') && $view_student_id != $user_id;

// CASE 1: Lesson is provided - Show specific test with detailed answers
if (!empty($lesson_name)) {
    // Get specific test results
    $result_stmt = $conn->prepare("SELECT * FROM test_results WHERE user_id = ? AND subject = ? AND lesson = ?");
    $result_stmt->bind_param("iss", $view_student_id, $subject_name, $lesson_name);
    $result_stmt->execute();
    $test_result = $result_stmt->get_result()->fetch_assoc();
    
    if (!$test_result) {
        die("No test results found for student: " . htmlspecialchars($student_name) . " - Subject: " . htmlspecialchars($subject_name) . " and Lesson: " . htmlspecialchars($lesson_name));
    }
    
    // Check if answers field exists
    if (!isset($test_result['answers']) || empty($test_result['answers'])) {
        die("No answer data found for this test.");
    }
    
    // Decode answers JSON
    $answers = json_decode($test_result['answers'], true);
    
    if (!$answers || empty($answers)) {
        die("Unable to decode answer data.");
    }
    
    // Get question IDs in order
    $question_ids = array_column($answers, 'question_id');
    
    // Fetch all questions
    $placeholders = implode(',', array_fill(0, count($question_ids), '?'));
    $q_stmt = $conn->prepare("SELECT * FROM questions WHERE id IN ($placeholders)");
    $q_stmt->bind_param(str_repeat('i', count($question_ids)), ...$question_ids);
    $q_stmt->execute();
    $questions_result = $q_stmt->get_result();
    
    $questions_map = [];
    while ($q = $questions_result->fetch_assoc()) {
        $questions_map[$q['id']] = $q;
    }
    
    // Build results array
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
    
    // Display single test results
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Test Results - <?= htmlspecialchars($lesson_name) ?> | KPluz SHS</title>
        <style>
            * { box-sizing: border-box; }
            body { font-family: 'Arial', sans-serif; background: #f0f0f0; margin: 0; padding: 20px; }
            .dashboard-container { background: white; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; max-width: 1000px; margin: 0 auto; }
            .user-welcome { background: linear-gradient(135deg, #003366, #0055aa); color: white; padding: 30px; text-align: center; }
            .welcome-text { font-size: 2em; margin-bottom: 10px; font-weight: bold; }
            .user-info { font-size: 1.2em; opacity: 0.9; }
            .role-badge { display: inline-block; background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 20px; font-size: 0.9em; margin-left: 10px; text-transform: uppercase; }
            .dashboard-content { padding: 40px; text-align: left; }
            .results-container { background: #f8f9fa; padding: 30px; border-radius: 8px; }
            .score-summary { background: white; padding: 20px; border-radius: 8px; text-align: center; margin-bottom: 30px; border-left: 4px solid #003366; }
            .student-info { color: #666; margin-bottom: 10px; font-size: 0.9em; }
            .score-number { font-size: 2.5em; font-weight: bold; color: #003366; margin: 10px 0; }
            .score-percentage { font-size: 1.2em; color: #666; margin-bottom: 10px; }
            .passed { color: #28a745; font-weight: bold; }
            .failed { color: #dc3545; font-weight: bold; }
            .question-result { margin-bottom: 25px; padding: 20px; border-radius: 6px; border-left: 4px solid #ccc; background: white; }
            .correct { border-left-color: #28a745; background: #f0fff0; }
            .incorrect { border-left-color: #dc3545; background: #fff0f0; }
            .question-text { font-weight: bold; margin-bottom: 15px; color: #003366; font-size: 1.1em; }
            .answer-section { margin-bottom: 10px; padding: 8px; background: #f8f9fa; border-radius: 4px; }
            .solution-section { margin-top: 12px; padding: 12px; background: #e7f3ff; border-radius: 4px; border-left: 3px solid #003366; }
            .solution-title { font-weight: bold; color: #003366; margin-bottom: 8px; }
            .user-answer { color: #333; }
            .correct-answer { color: #28a745; font-weight: bold; }
            .status-icon { font-size: 1.2em; margin-right: 8px; }
            .status-correct { color: #28a745; font-weight: bold; }
            .status-incorrect { color: #dc3545; font-weight: bold; }
            .action-buttons { display: flex; justify-content: center; gap: 15px; margin-top: 30px; flex-wrap: wrap; }
            .dashboard-btn { padding: 12px 24px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; display: inline-block; }
            .dashboard-btn:hover { background: #218838; }
            .logout-btn { padding: 12px 24px; background: #dc3545; color: white; text-decoration: none; border-radius: 4px; display: inline-block; }
            .logout-btn:hover { background: #c82333; }
            .back-link { display: inline-block; margin-bottom: 20px; color: #003366; text-decoration: none; font-weight: bold; }
            .back-link:hover { text-decoration: underline; }
        </style>
    </head>
    <body>
        <div class="dashboard-container">
            <div class="user-welcome">
                <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
                <div class="user-info">KPluz SHS - Test Results<span class="role-badge"><?= ucfirst($user_role) ?></span></div>
            </div>
            <div class="dashboard-content">
                <?php if ($is_admin_view): ?>
                    <a href="test-results.php?subject=<?= urlencode($subject_name) ?>&student_id=<?= $view_student_id ?>" class="back-link">&larr; Back to Student Tests</a>
                <?php endif; ?>
                
                <div class="results-container">
                    <div class="score-summary">
                        <?php if ($is_admin_view): ?>
                            <div class="student-info">Student: <?= htmlspecialchars($student_name) ?></div>
                        <?php endif; ?>
                        <h3><?= htmlspecialchars($subject_name) ?> - <?= htmlspecialchars($lesson_name) ?></h3>
                        <div class="score-number"><?= $score ?>/<?= $total ?></div>
                        <div class="score-percentage"><?= number_format($percentage, 1) ?>%</div>
                        <div class="<?= $passed ? 'passed' : 'failed' ?>"><?= $passed ? '&#10003; PASSED' : '&#10007; FAILED' ?></div>
                    </div>
                    
                    <?php foreach ($results as $index => $r): ?>
                        <div class="question-result <?= $r['is_correct'] ? 'correct' : 'incorrect' ?>">
                            <div class="question-text"><?= ($index+1) ?>. <?= htmlspecialchars($r['question'] ?? '') ?></div>
                            <div class="answer-section"><strong>Your Answer:</strong> <span class="user-answer"><?= htmlspecialchars($r['user_answer'] ?? '') ?></span></div>
                            <div class="<?= $r['is_correct'] ? 'status-correct' : 'status-incorrect' ?>"><span class="status-icon"><?= $r['is_correct'] ? '&#10003;' : '&#10007;' ?></span> <?= $r['is_correct'] ? 'Correct' : 'Incorrect' ?></div>
                            <?php if (!$r['is_correct']): ?>
                                <div class="answer-section"><strong>Correct Answer:</strong> <span class="correct-answer"><?= htmlspecialchars($r['correct_answer'] ?? '') ?></span></div>
                            <?php endif; ?>
                            <?php if (!empty($r['solution'])): ?>
                                <div class="solution-section"><div class="solution-title">&#128161; Solution:</div><div><?= nl2br(htmlspecialchars($r['solution'])) ?></div></div>
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
    <?php
    
} else {
    // CASE 2: No lesson provided - Show ALL tests for this subject (including not taken)
    
    // Get ALL tests for this subject from tests table
    $all_tests_stmt = $conn->prepare("SELECT id, lesson, topic FROM tests WHERE subject = ? ORDER BY lesson");
    $all_tests_stmt->bind_param("s", $subject_name);
    $all_tests_stmt->execute();
    $all_tests_result = $all_tests_stmt->get_result();
    
    $all_tests_list = [];
    while ($test = $all_tests_result->fetch_assoc()) {
        $all_tests_list[$test['lesson']] = [
            'lesson' => $test['lesson'],
            'topic' => $test['topic'],
            'taken' => false,
            'score' => null,
            'total_questions' => null,
            'percentage' => null,
            'completed_at' => null
        ];
    }
    
    // Get taken tests for this student
    $taken_tests_stmt = $conn->prepare("SELECT * FROM test_results WHERE user_id = ? AND subject = ? ORDER BY lesson");
    $taken_tests_stmt->bind_param("is", $view_student_id, $subject_name);
    $taken_tests_stmt->execute();
    $taken_tests_result = $taken_tests_stmt->get_result();
    
    while ($taken = $taken_tests_result->fetch_assoc()) {
        if (isset($all_tests_list[$taken['lesson']])) {
            $all_tests_list[$taken['lesson']]['taken'] = true;
            $all_tests_list[$taken['lesson']]['score'] = $taken['score'];
            $all_tests_list[$taken['lesson']]['total_questions'] = $taken['total_questions'];
            $all_tests_list[$taken['lesson']]['percentage'] = $taken['percentage'];
            $all_tests_list[$taken['lesson']]['completed_at'] = $taken['completed_at'];
        }
    }
    
    $conn->close();
    
    // Calculate overall statistics (only for taken tests)
    $total_score = 0;
    $total_questions = 0;
    $modules_taken = 0;
    $modules_passed = 0;
    
    foreach ($all_tests_list as $test) {
        if ($test['taken']) {
            $modules_taken++;
            $total_score += $test['score'];
            $total_questions += $test['total_questions'];
            if ($test['percentage'] >= 75) {
                $modules_passed++;
            }
        }
    }
    
    $overall_percentage = $total_questions > 0 ? ($total_score / $total_questions) * 100 : 0;
    $overall_passed = $overall_percentage >= 75;
    $total_modules = count($all_tests_list);
    
    // Display all tests for this student in this subject
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= htmlspecialchars($subject_name) ?> - Student Results | KPluz SHS</title>
        <style>
            * { box-sizing: border-box; }
            body { font-family: 'Arial', sans-serif; background: #f0f0f0; margin: 0; padding: 20px; }
            .dashboard-container { background: white; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; max-width: 1200px; margin: 0 auto; }
            .user-welcome { background: linear-gradient(135deg, #003366, #0055aa); color: white; padding: 30px; text-align: center; }
            .welcome-text { font-size: 2em; margin-bottom: 10px; font-weight: bold; }
            .user-info { font-size: 1.2em; opacity: 0.9; }
            .role-badge { display: inline-block; background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 20px; font-size: 0.9em; margin-left: 10px; text-transform: uppercase; }
            .dashboard-content { padding: 40px; }
            .back-link { display: inline-block; margin-bottom: 20px; color: #003366; text-decoration: none; font-weight: bold; }
            .back-link:hover { text-decoration: underline; }
            .subject-header { background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px; border-left: 4px solid #003366; }
            .subject-title { font-size: 1.5em; color: #003366; margin-bottom: 5px; }
            .student-name { font-size: 1.1em; color: #666; margin-top: 5px; }
            .overall-summary { background: linear-gradient(135deg, #e8f4f8, #d1ecf1); padding: 20px; border-radius: 8px; margin-bottom: 30px; text-align: center; border: 1px solid #bee5eb; }
            .overall-score { font-size: 2em; font-weight: bold; color: #003366; }
            .overall-passed { color: #28a745; font-weight: bold; }
            .overall-failed { color: #dc3545; font-weight: bold; }
            .modules-ratio { font-size: 1.1em; margin-top: 10px; }
            .tests-table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            .tests-table th { background: #003366; color: white; padding: 12px; text-align: left; font-weight: bold; }
            .tests-table td { padding: 12px; border-bottom: 1px solid #e1e5e9; }
            .tests-table tr:hover { background: #f8f9fa; }
            
            /* Column width adjustments */
            .tests-table th:nth-child(1), .tests-table td:nth-child(1) { width: 40px; }      /* # */
            .tests-table th:nth-child(2), .tests-table td:nth-child(2) { width: 150px; }     /* Lesson - made wider */
            .tests-table th:nth-child(3), .tests-table td:nth-child(3) { width: auto; }      /* Topic - auto width */
            .tests-table th:nth-child(4), .tests-table td:nth-child(4) { width: 80px; }      /* Score */
            .tests-table th:nth-child(5), .tests-table td:nth-child(5) { width: 80px; }      /* Percentage */
            .tests-table th:nth-child(6), .tests-table td:nth-child(6) { width: 100px; }     /* Status */
            .tests-table th:nth-child(7), .tests-table td:nth-child(7) { width: 110px; }     /* Date Completed */
            .tests-table th:nth-child(8), .tests-table td:nth-child(8) { width: 105px; }     /* Action */
            
            /* Wrap long topic text */
            .tests-table td:nth-child(3) {
                word-wrap: break-word;
                word-break: break-word;
            }
            
            .score-passed { color: #28a745; font-weight: bold; }
            .score-failed { color: #dc3545; font-weight: bold; }
            .not-taken { color: #999; font-style: italic; }
            .not-taken-badge { background: #f0f0f0; color: #999; padding: 2px 8px; border-radius: 4px; font-size: 0.8em; }
            .view-test-btn { padding: 5px 12px; background: #003366; color: white; text-decoration: none; border-radius: 4px; font-size: 0.85em; }
            .view-test-btn:hover { background: #0055aa; }
            .disabled-btn { padding: 5px 12px; background: #ccc; color: #666; border-radius: 4px; font-size: 0.85em; cursor: not-allowed; }
            .action-buttons { display: flex; justify-content: center; gap: 15px; margin-top: 30px; flex-wrap: wrap; }
            .dashboard-btn { padding: 12px 24px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; display: inline-block; }
            .dashboard-btn:hover { background: #218838; }
            .logout-btn { padding: 12px 24px; background: #dc3545; color: white; text-decoration: none; border-radius: 4px; display: inline-block; }
            .logout-btn:hover { background: #c82333; }
            .no-results { text-align: center; color: #666; font-style: italic; padding: 40px; background: #f8f9fa; border-radius: 8px; }
            .topic-text { font-size: 0.85em; color: #9b59b6; margin-top: 3px; }
            .na-text { color: #999; }
        </style>
    </head>
    <body>
        <div class="dashboard-container">
            <div class="user-welcome">
                <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
                <div class="user-info">KPluz SHS - Subject Results<span class="role-badge"><?= ucfirst($user_role) ?></span></div>
            </div>
            <div class="dashboard-content">
                <a href="results2.php?subject=<?= urlencode($subject_name) ?>&id=students" class="back-link">&larr; Back to Students</a>
                
                <div class="subject-header">
                    <div class="subject-title"><?= htmlspecialchars($subject_name) ?></div>
                    <div class="student-name">Student: <?= htmlspecialchars($student_name) ?></div>
                </div>
                
                <div class="overall-summary">
                    <strong>Overall Performance in <?= htmlspecialchars($subject_name) ?>:</strong><br>
                    <span class="overall-score"><?= number_format($overall_percentage, 1) ?>%</span><br>
                    <span class="<?= $overall_passed ? 'overall-passed' : 'overall-failed' ?>"><?= $overall_passed ? '&#10003; PASSING' : '&#10007; NEEDS IMPROVEMENT' ?></span>
                    <div class="modules-ratio">Modules Passed: <?= $modules_passed ?>/<?= $total_modules ?> (<?= $modules_taken ?> taken)</div>
                </div>
                
                <h3 style="margin-bottom: 15px; color: #003366;">All Topics / Lessons</h3>
                
                <?php if (!empty($all_tests_list)): ?>
                    <table class="tests-table">
                        <thead>
                            <tr><th>#</th><th>Lesson</th><th>Topic</th><th>Score</th><th>Percentage</th><th>Status</th><th>Date Completed</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            <?php foreach ($all_tests_list as $test): ?>
                                <?php $passed = $test['taken'] && $test['percentage'] >= 75; ?>
                                <tr>
                                    <td><?= $counter++ ?></td>
                                    <td><?= htmlspecialchars($test['lesson']) ?></td>
                                    <td><div class="topic-text"><?= htmlspecialchars($test['topic']) ?></div></td>
                                    <?php if ($test['taken']): ?>
                                        <td><?= $test['score'] ?>/<?= $test['total_questions'] ?></td>
                                        <td class="<?= $passed ? 'score-passed' : 'score-failed' ?>"><?= number_format($test['percentage'], 1) ?>%</td>
                                        <td><?= $passed ? '<span style="color:#28a745;">&#10003; Passed</span>' : '<span style="color:#dc3545;">&#10007; Failed</span>' ?></td>
                                        <td><?= date('M d, Y', strtotime($test['completed_at'])) ?></td>
                                        <td><a href="test-results.php?subject=<?= urlencode($subject_name) ?>&lesson=<?= urlencode($test['lesson']) ?>&student_id=<?= $view_student_id ?>" class="view-test-btn">View Details</a></td>
                                    <?php else: ?>
                                        <td class="na-text">N/A</td>
                                        <td class="na-text">N/A</td>
                                        <td class="not-taken"><span class="not-taken-badge">Not Yet Taken</span></td>
                                        <td class="na-text">N/A</td>
                                        <td><span class="disabled-btn">Not Available</span></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="no-results"><p>No tests found for <?= htmlspecialchars($subject_name) ?>.</p></div>
                <?php endif; ?>
                
                <div class="action-buttons">
                    <a href="results2.php?subject=<?= urlencode($subject_name) ?>&id=students" class="dashboard-btn">Back to Students</a>
                    <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>