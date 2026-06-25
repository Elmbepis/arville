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

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user details including electives
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, role, electives FROM users WHERE id = ?");
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
$electives_json = $user['electives'];

// ----- Define elective list (same as in rmats.php and tests.php) -----
$elective_list = [
    "Introduction to Organization and Management",
    "Business 1 - Basic Accounting",
    "Social Sciences",
    "Creative Composition 1",
    "Chemistry 1",
    "Biology 1"
];

// ----- Fetch all tests (for students, we will filter later) -----
$all_tests = [];
$total_tests = 0;

if ($user_role === 'student') {
    // Get all tests (no ORDER BY yet, we'll sort in PHP)
    $test_result = $conn->query("SELECT id, subject, lesson, topic FROM tests");
    while ($row = $test_result->fetch_assoc()) {
        $all_tests[] = $row;
    }

    // ----- Filter tests based on electives -----
    $filtered_tests = [];
    if (!empty($electives_json)) {
        $student_electives = json_decode($electives_json, true);
        if (is_array($student_electives) && count($student_electives) > 0) {
            // Get all distinct subjects from tests
            $all_subjects = array_unique(array_column($all_tests, 'subject'));
            // Core subjects = all subjects not in elective list
            $core_subjects = array_diff($all_subjects, $elective_list);
            // Allowed subjects = core + student's electives
            $allowed_subjects = array_merge($core_subjects, $student_electives);
            $allowed_subjects = array_unique($allowed_subjects);
            // Filter tests
            foreach ($all_tests as $test) {
                if (in_array($test['subject'], $allowed_subjects)) {
                    $filtered_tests[] = $test;
                }
            }
        } else {
            // Electives is non-empty but not a valid array – show all
            $filtered_tests = $all_tests;
        }
    } else {
        // No electives set – show all tests (or maybe show only core? We'll show all for safety)
        $filtered_tests = $all_tests;
    }

    // ----- Group filtered tests by subject -----
    $tests_by_subject = [];
    foreach ($filtered_tests as $test) {
        $subject = $test['subject'];
        if (!isset($tests_by_subject[$subject])) {
            $tests_by_subject[$subject] = [];
        }
        $tests_by_subject[$subject][] = $test;
    }

    // ----- Sort subjects: core first, then electives in the defined order -----
    $present_subjects = array_keys($tests_by_subject);
    // Core subjects present
    $core_present = array_intersect($present_subjects, $core_subjects ?? []);
    // Elective subjects present
    $elective_present = array_intersect($present_subjects, $elective_list);
    // Sort electives according to the order in $elective_list
    $sorted_electives = array_intersect($elective_list, $elective_present);
    // Final sorted order
    $sorted_subjects = array_merge($core_present, $sorted_electives);
    // Add any remaining subjects not in core or electives (should not happen)
    $other_subjects = array_diff($present_subjects, $core_present, $elective_present);
    $sorted_subjects = array_merge($sorted_subjects, $other_subjects);

    $total_tests = count($filtered_tests);
} else {
    // For non-students, show all tests (no filtering)
    $test_result = $conn->query("SELECT id, subject, lesson, topic FROM tests ORDER BY subject, lesson");
    $tests_by_subject = [];
    while ($row = $test_result->fetch_assoc()) {
        $subject = $row['subject'];
        if (!isset($tests_by_subject[$subject])) {
            $tests_by_subject[$subject] = [];
        }
        $tests_by_subject[$subject][] = $row;
        $total_tests++;
    }
    // For non-students, also sort subjects: core first, then electives (for consistency)
    if (!empty($tests_by_subject)) {
        $present_subjects = array_keys($tests_by_subject);
        $core_subjects = array_diff($present_subjects, $elective_list);
        $elective_present = array_intersect($present_subjects, $elective_list);
        $sorted_electives = array_intersect($elective_list, $elective_present);
        $sorted_subjects = array_merge($core_subjects, $sorted_electives);
        $other_subjects = array_diff($present_subjects, $core_subjects, $elective_present);
        $sorted_subjects = array_merge($sorted_subjects, $other_subjects);
    } else {
        $sorted_subjects = [];
    }
}

// ----- Get completed test scores (using test_id) -----
$completed_scores = [];
if ($user_role === 'student') {
    $stmt = $conn->prepare("SELECT test_id, score, total_questions, percentage FROM test_results WHERE user_id = ? AND answers IS NOT NULL AND answers != ''");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $completed_scores[$row['test_id']] = [
            'score' => $row['score'],
            'total_questions' => $row['total_questions'],
            'percentage' => $row['percentage']
        ];
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Report Cards</title>
  <style>
    /* Your existing CSS – unchanged */
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
        max-width: 1400px;
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
    
    .section-title {
        color: #003366;
        border-bottom: 2px solid #003366;
        padding-bottom: 10px;
        margin-bottom: 30px;
        font-size: 1.5em;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .report-count {
        background: #28a745;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: normal;
    }
    
    /* Report Cards Section */
    .reports-section {
        margin-bottom: 50px;
    }
    
    .subject-reports {
        margin-bottom: 40px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #003366;
    }
    
    .subject-title {
        font-size: 1.3em;
        color: #003366;
        margin-bottom: 20px;
        font-weight: bold;
    }
    
    /* 4-Column Grid */
    .reports-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 15px;
    }
    
    .report-card {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .report-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .report-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
        color: #003366;
    }
    
    .report-lesson {
        font-size: 1em;
        color: #0066cc;
        margin-bottom: 8px;
        font-weight: bold;
    }
    
    .report-topic {
        font-size: 0.85em;
        color: #555;
        line-height: 1.4;
        margin-bottom: 10px;
        flex-grow: 1;
    }
    
    .score-display {
        font-size: 1.1em;
        font-weight: bold;
        margin-bottom: 10px;
        padding: 5px;
        border-radius: 5px;
    }
    
    .score-passed {
        color: #28a745;
    }
    
    .score-failed {
        color: #dc3545;
    }
    
    .not-taken {
        color: #999;
        font-style: italic;
        font-size: 0.85em;
        margin-bottom: 10px;
        padding: 5px;
    }
    
    /* Button styles */
    .view-report-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
        font-weight: bold;
        font-size: 0.9em;
        width: auto;
        max-width: 70%;
        margin: 0 auto;
    }
    
    .view-report-btn:hover {
        background: #218838;
        color: white;
    }
    
    .disabled-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #6c757d;
        color: white;
        border-radius: 5px;
        font-weight: bold;
        font-size: 0.9em;
        width: auto;
        max-width: 70%;
        margin: 0 auto;
        cursor: not-allowed;
        opacity: 0.6;
    }
    
    .no-results {
        text-align: center;
        color: #666;
        font-style: italic;
        padding: 40px;
        background: #f8f9fa;
        border-radius: 8px;
    }
    
    /* Action Buttons */
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

    /* Responsive design for smaller screens */
    @media (max-width: 1200px) {
        .reports-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 900px) {
        .reports-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .dashboard-content {
            padding: 20px;
        }
    }
    
    @media (max-width: 600px) {
        .reports-grid {
            grid-template-columns: 1fr;
        }
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
            KPluz SHS - Report Card
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <?php if ($user_role === 'student'): ?>
            <div class="reports-section">
                <h2 class="section-title">
                    My Report Card
                    <span class="report-count">Total: <?= $total_tests ?> Test(s)</span>
                </h2>
                
                <?php if (!empty($tests_by_subject)): ?>
                    <?php foreach ($sorted_subjects as $subject): ?>
                        <?php $tests = $tests_by_subject[$subject]; ?>
                        <div class="subject-reports">
                            <div class="subject-title">
                                <?= htmlspecialchars($subject) ?>
                            </div>
                            <div class="reports-grid">
                                <?php foreach ($tests as $test): 
                                    $test_id = $test['id'];
                                    $is_completed = isset($completed_scores[$test_id]);
                                    $score = $is_completed ? $completed_scores[$test_id]['score'] : null;
                                    $total_qs = $is_completed ? $completed_scores[$test_id]['total_questions'] : null;
                                    $percentage = $is_completed ? $completed_scores[$test_id]['percentage'] : null;
                                    $passed = $is_completed && $percentage >= 75;
                                ?>
                                    <div class="report-card">
                                        <div class="report-icon">&#128202;</div>
                                        <div class="report-lesson"><?= htmlspecialchars($test['lesson']) ?></div>
                                        <div class="report-topic"><?= htmlspecialchars($test['topic']) ?></div>
                                        
                                        <?php if ($is_completed): ?>
                                            <div class="score-display <?= $passed ? 'score-passed' : 'score-failed' ?>">
                                                Score: <?= $score ?>/<?= $total_qs ?> (<?= number_format($percentage, 1) ?>%)
                                            </div>
                                            <a href="test-results.php?test_id=<?= $test_id ?>" class="view-report-btn">View Test Results</a>
                                        <?php else: ?>
                                            <div class="not-taken">
                                                &#9888;&#65039; Test Not Taken Yet
                                            </div>
                                            <div class="disabled-btn">No Test Results Available</div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-results">
                        <p>
                            <?php if (!empty($electives_json) && $total_tests == 0): ?>
                                No tests available for your chosen electives.
                            <?php else: ?>
                                No tests available at the moment. Please check back later.
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <!-- For non-student users (admin or teacher) -->
            <div style="text-align: center; padding: 50px;">
                <h2>Access Restricted</h2>
                <p>This page is only available for students.</p>
            </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>