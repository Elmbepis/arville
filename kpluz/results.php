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

// Restrict to teachers only
if ($user_role !== 'teacher') {
    die("Access restricted to teachers only.");
}

// Define custom subject order
$subject_order = [
    'Academic Track - Accountancy, Business and Management (ABM)',
    'Academic Track - Humanities and Social Sciences (HUMSS)',
    'Academic Track - Science, Technology, Engineering and Mathematics (STEM)',
    'Technical-Vocational-Livelihood (TVL) Track - Home Economics (HE)',
    'Technical-Vocational-Livelihood (TVL) Track - Information and Communications Technology (ICT)',
    'Technical-Vocational-Livelihood (TVL) Track - Agri-Fishery Arts (AFA)',
    'Technical-Vocational-Livelihood (TVL) Track - Industrial Arts (IA)',
    'Sports Track',
    'Arts and Design Track'
];

// Get all tests grouped by subject
$tests_by_subject = [];
$total_tests = 0;

$test_result = $conn->query("
    SELECT id, subject, lesson, topic FROM tests 
    ORDER BY subject, lesson
");
while ($row = $test_result->fetch_assoc()) {
    $subject = $row['subject'];
    if (!isset($tests_by_subject[$subject])) {
        $tests_by_subject[$subject] = [];
    }
    $tests_by_subject[$subject][] = $row;
    $total_tests++;
}

// Reorder subjects according to custom order
$ordered_tests_by_subject = [];
foreach ($subject_order as $ordered_subject) {
    if (isset($tests_by_subject[$ordered_subject])) {
        $ordered_tests_by_subject[$ordered_subject] = $tests_by_subject[$ordered_subject];
        unset($tests_by_subject[$ordered_subject]);
    }
}
// Add any remaining subjects not in the custom order at the end
foreach ($tests_by_subject as $subject => $tests) {
    $ordered_tests_by_subject[$subject] = $tests;
}

// Get all students
$students = [];
$student_stmt = $conn->prepare("SELECT id, name FROM users WHERE role = 'student' ORDER BY name");
$student_stmt->execute();
$student_result = $student_stmt->get_result();
while ($student = $student_result->fetch_assoc()) {
    $students[$student['id']] = $student['name'];
}

// Get all test results for all students
$test_results = [];
$results_stmt = $conn->prepare("
    SELECT user_id, subject, lesson, score, total_questions, percentage 
    FROM test_results 
    ORDER BY user_id, subject, lesson
");
$results_stmt->execute();
$results_data = $results_stmt->get_result();

while ($row = $results_data->fetch_assoc()) {
    $key = $row['subject'] . '|' . $row['lesson'];
    if (!isset($test_results[$key])) {
        $test_results[$key] = [];
    }
    $test_results[$key][$row['user_id']] = [
        'score' => $row['score'],
        'total_questions' => $row['total_questions'],
        'percentage' => $row['percentage']
    ];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Student Results (Teacher View)</title>
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
        cursor: pointer;
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
    
    .view-results-btn {
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
        max-width: 80%;
        margin: 0 auto;
    }
    
    .view-results-btn:hover {
        background: #0055aa;
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

    /* Responsive design */
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
            KPluz SHS - Student Results (Teacher View)
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <div class="tests-section">
            <h2 class="section-title">
                Student Test Results by Subject
                <span class="test-count">Total: <?= $total_tests ?> Test(s)</span>
            </h2>
            
            <?php if (!empty($ordered_tests_by_subject)): ?>
                <?php foreach ($ordered_tests_by_subject as $subject => $tests): ?>
                    <div class="subject-tests">
                        <div class="subject-title">
                            <?= htmlspecialchars($subject) ?>
                        </div>
                        <div class="tests-grid">
                            <?php foreach ($tests as $test): ?>
                                <div class="test-card">
                                    <div class="test-icon">&#128202;</div>
                                    <div class="test-lesson"><?= htmlspecialchars($test['lesson']) ?></div>
                                    <div class="test-topic"><?= htmlspecialchars($test['topic']) ?></div>
                                    <a href="results-students.php?subject=<?= urlencode($test['subject']) ?>&lesson=<?= urlencode($test['lesson']) ?>" class="view-results-btn">View Student Results</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-results">
                    <p>No tests available at the moment. Please check back later.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>