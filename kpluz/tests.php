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
$stmt = $conn->prepare("SELECT name, role, school, electives FROM users WHERE id = ?");
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
$user_school = trim($user['school'] ?? '');
$electives_json = $user['electives'];

// Debug mode (only visible to admins/teachers when ?debug=1 is added)
$debug_output = '';
if (($user_role === 'admin' || $user_role === 'teacher') && isset($_GET['debug'])) {
    $debug_school = $user_school;
    $debug_query = $conn->prepare("
        SELECT COUNT(DISTINCT t.id) as cnt
        FROM tests t
        INNER JOIN users u ON LOWER(TRIM(t.teacher)) = LOWER(TRIM(u.name))
        WHERE t.teacher != 'KPluz'
          AND u.role = 'teacher'
          AND LOWER(TRIM(u.school)) = LOWER(TRIM(?))
    ");
    $debug_query->bind_param("s", $debug_school);
    $debug_query->execute();
    $debug_count = $debug_query->get_result()->fetch_assoc()['cnt'];
    $debug_output = "<div style='background:#e0f0ff; padding:12px; margin-bottom:20px; border:1px solid #0066cc;'>
        <strong>&#128269; Debug (visible only to you)</strong><br>
        Student school: '<code>" . htmlspecialchars($debug_school) . "</code>'<br>
        Non&#8209;KPluz tests that would be shown: <strong>$debug_count</strong><br>
        (If zero, check that the student's school in `users` matches the teacher's school exactly, no extra spaces.)
        </div>";
}

// ----- New code: define elective list and filter subjects -----
$elective_list = [
    "Introduction to Organization and Management",
    "Business 1 - Basic Accounting",
    "Social Sciences",
    "Creative Composition 1",
    "Chemistry 1",
    "Biology 1",
    ".Net Technology"
];

// We'll fetch all tests first, then filter and sort later.
$all_tests = [];
$total_all_tests = 0;

if ($user_role === 'student') {
    // 1. KPluz tests (always visible)
    $kpluz_tests = $conn->query("
        SELECT id, subject, lesson, topic, teacher 
        FROM tests 
        WHERE teacher = 'KPluz'
        ORDER BY subject, lesson
    ");
    if ($kpluz_tests) {
        while ($row = $kpluz_tests->fetch_assoc()) {
            $all_tests[] = $row;
            $total_all_tests++;
        }
    }

    // 2. Non&#8209;KPluz tests – only from teachers whose school matches the student's school
    if (!empty($user_school)) {
        $school_tests = $conn->prepare("
            SELECT DISTINCT t.id, t.subject, t.lesson, t.topic, t.teacher
            FROM tests t
            INNER JOIN users u ON LOWER(TRIM(t.teacher)) = LOWER(TRIM(u.name))
            WHERE t.teacher != 'KPluz'
              AND u.role = 'teacher'
              AND LOWER(TRIM(u.school)) = LOWER(TRIM(?))
            ORDER BY t.subject, t.lesson
        ");
        $school_tests->bind_param("s", $user_school);
        $school_tests->execute();
        $school_data = $school_tests->get_result();

        while ($row = $school_data->fetch_assoc()) {
            // Avoid duplicates (should not happen)
            $exists = false;
            foreach ($all_tests as $existing) {
                if ($existing['id'] == $row['id']) {
                    $exists = true;
                    break;
                }
            }
            if (!$exists) {
                $all_tests[] = $row;
                $total_all_tests++;
            }
        }
        $school_tests->close();
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
                $subject = $test['subject'];
                if (in_array($subject, $allowed_subjects)) {
                    $filtered_tests[] = $test;
                }
            }
        } else {
            // electives is non-empty but not a valid array – show all
            $filtered_tests = $all_tests;
        }
    } else {
        // No electives set – show all tests (for students without electives, maybe they should see all?)
        $filtered_tests = $all_tests;
    }

    // ----- Group filtered tests by subject and sort -----
    $tests_by_subject = [];
    foreach ($filtered_tests as $test) {
        $subject = $test['subject'];
        if (!isset($tests_by_subject[$subject])) {
            $tests_by_subject[$subject] = [];
        }
        $tests_by_subject[$subject][] = $test;
    }

    // ----- Sort subjects: core first, then electives in the order defined in $elective_list -----
    // Get all subjects present in filtered tests
    $present_subjects = array_keys($tests_by_subject);
    // Core subjects present
    $core_present = array_intersect($present_subjects, $core_subjects ?? []);
    // Elective subjects present (those that are in the elective list)
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
    // For non&#8209;students, show all tests (no filtering)
    $tests_by_subject = [];
    $all_tests = [];
    if ($user_role === 'admin' || $user_role === 'teacher') {
        // Fetch all tests (you might want to keep the existing logic for teachers/admin)
        // For simplicity, we'll just fetch everything.
        $all_tests_result = $conn->query("SELECT id, subject, lesson, topic, teacher FROM tests ORDER BY subject, lesson");
        while ($row = $all_tests_result->fetch_assoc()) {
            $subject = $row['subject'];
            if (!isset($tests_by_subject[$subject])) {
                $tests_by_subject[$subject] = [];
            }
            $tests_by_subject[$subject][] = $row;
            $total_tests++;
        }
    }
    // Use the same sorting for teachers/admins as well (core first)
    if (!empty($tests_by_subject)) {
        $present_subjects = array_keys($tests_by_subject);
        $core_present = array_intersect($present_subjects, $elective_list);
        $elective_present = array_intersect($present_subjects, $elective_list);
        $sorted_electives = array_intersect($elective_list, $elective_present);
        $sorted_subjects = array_merge($core_present, $sorted_electives);
        $other_subjects = array_diff($present_subjects, $core_present, $elective_present);
        $sorted_subjects = array_merge($sorted_subjects, $other_subjects);
    } else {
        $sorted_subjects = [];
    }
}

// Completed tests based on test_id (only for students)
$completed_test_ids = [];
if ($user_role === 'student') {
    $stmt = $conn->prepare("SELECT DISTINCT test_id FROM test_results WHERE user_id = ? AND answers IS NOT NULL AND answers != ''");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $completed_test_ids[] = $row['test_id'];
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Tests</title>
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
    
    .test-count {
        background: #28a745;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: normal;
    }
    
    /* Tests Section */
    .tests-section {
        margin-bottom: 50px;
    }
    
    .subject-tests {
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
    .tests-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 15px;
    }
    
    .test-card {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        min-height: 180px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .test-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .test-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
        color: #003366;
    }
    
    .test-lesson {
        font-size: 1em;
        color: #0066cc;
        margin-bottom: 8px;
        font-weight: bold;
    }
    
    .test-topic {
        font-size: 0.85em;
        color: #555;
        line-height: 1.4;
        margin-bottom: 15px;
        flex-grow: 1;
    }
    
    /* Button styles */
    .take-test-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #003366;
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
    
    .take-test-btn:hover {
        background: #0055aa;
        color: white;
    }
    
    .report-card-btn {
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
    
    .report-card-btn:hover {
        background: #218838;
        color: white;
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
        .tests-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 900px) {
        .tests-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .dashboard-content {
            padding: 20px;
        }
    }
    
    @media (max-width: 600px) {
        .tests-grid {
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
            KPluz SHS - Tests
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <?php if ($user_role === 'student'): ?>
            <?= $debug_output ?>
            <div class="tests-section">
                <h2 class="section-title">
                    Available Tests
                    <span class="test-count">Total: <?= $total_tests ?> Test(s)</span>
                </h2>
                
                <?php if (!empty($tests_by_subject)): ?>
                    <?php foreach ($sorted_subjects as $subject): ?>
                        <?php $tests = $tests_by_subject[$subject]; ?>
                        <div class="subject-tests">
                            <div class="subject-title">
                                <?= htmlspecialchars($subject) ?>
                            </div>
                            <div class="tests-grid">
                                <?php foreach ($tests as $test): 
                                    $is_completed = in_array($test['id'], $completed_test_ids);
                                ?>
                                    <div class="test-card">
                                        <div class="test-icon">&#128203;</div>
                                        <div class="test-lesson"><?= htmlspecialchars($test['lesson']) ?></div>
                                        <div class="test-topic"><?= htmlspecialchars($test['topic']) ?></div>
                                        
                                        <?php if ($test['teacher'] === 'KPluz'): ?>
                                            <?php if ($is_completed): ?>
                                                <a href="test-results.php?subject=<?= urlencode($test['subject']) ?>&lesson=<?= urlencode($test['lesson']) ?>" class="report-card-btn">See Report Card</a>
                                            <?php else: ?>
                                                <a href="taketest.php?subject=<?= urlencode($test['subject']) ?>&lesson=<?= urlencode($test['lesson']) ?>" class="take-test-btn">Take Test</a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if ($is_completed): ?>
                                                <a href="test-results.php?subject=<?= urlencode($test['subject']) ?>&lesson=<?= urlencode($test['lesson']) ?>&topic=<?= urlencode($test['topic']) ?>" class="report-card-btn">See Report Card</a>
                                            <?php else: ?>
                                                <a href="taketest.php?subject=<?= urlencode($test['subject']) ?>&lesson=<?= urlencode($test['lesson']) ?>&topic=<?= urlencode($test['topic']) ?>" class="take-test-btn">Take Test</a>
                                            <?php endif; ?>
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
                                No tests available at the moment.
                            <?php endif; ?>
                        </p>
                        <?php if (empty($user_school)): ?>
                            <p><small>Note: Your school is not set. Please contact your administrator.</small></p>
                        <?php elseif (!empty($electives_json) && $total_tests == 0): ?>
                            <p><small>Check that your electives are correctly set.</small></p>
                        <?php endif; ?>
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