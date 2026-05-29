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

// Get available tests grouped by subject
$tests_by_subject = [];
$total_tests = 0;

if ($user_role === 'student') {
$test_result = $conn->query("
    SELECT id, subject, lesson, topic FROM tests 
    ORDER BY 
        CASE 
            WHEN subject IN ('General Science', 'General Mathematics', 'Effective Communication', 'Life and Career Skills', 'Mabisang Komunikasyon', 'Kasaysayan at Lipunang Pilipino') THEN 0 
            ELSE 1 
        END, 
        subject, 
        lesson
");    
    while ($row = $test_result->fetch_assoc()) {
        $subject = $row['subject'];
        if (!isset($tests_by_subject[$subject])) {
            $tests_by_subject[$subject] = [];
        }
        $tests_by_subject[$subject][] = $row;
        $total_tests++;
    }
}

// Get completed tests to check which tests have scores
$completed_tests = [];
if ($user_role === 'student') {
    $stmt = $conn->prepare("SELECT DISTINCT lesson FROM test_results WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $completed_tests[] = $row['lesson'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Tests</title>
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
    
    /* Button styles - exactly matching original */
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
            <!-- STUDENT TESTS VIEW -->
            <div class="tests-section">
                <h2 class="section-title">
                    Available Tests (Based on DepEd Lesson Exemplars)
                    <span class="test-count">Total: <?= $total_tests ?> Test(s)</span>
                </h2>
                
                <?php if (!empty($tests_by_subject)): ?>
                    <?php foreach ($tests_by_subject as $subject => $tests): ?>
                        <div class="subject-tests">
                            <div class="subject-title">
                                <?= htmlspecialchars($subject) ?>
                            </div>
                            <div class="tests-grid">
                                <?php foreach ($tests as $test): 
                                    $is_completed = in_array($test['lesson'], $completed_tests);
                                ?>
                                    <div class="test-card">
                                        <div class="test-icon">&#128203;</div>
                                        <div class="test-lesson"><?= htmlspecialchars($test['lesson']) ?></div>
                                        <div class="test-topic"><?= htmlspecialchars($test['topic']) ?></div>
                                        <?php if ($is_completed): ?>
                                            <a href="report-card.php?subject=<?= urlencode($test['subject']) ?>&lesson=<?= urlencode($test['lesson']) ?>" class="report-card-btn">See Report Card</a>
                                        <?php else: ?>
                                            <a href="taketest.php?subject=<?= urlencode($test['subject']) ?>&lesson=<?= urlencode($test['lesson']) ?>" class="take-test-btn">Take Test</a>
                                        <?php endif; ?>
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