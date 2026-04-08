<?php
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
$conn = new mysqli("localhost", "root", "AcadeV25!", "courses");
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

// Get available tests with topics for trainees
$tests = [];
if ($user_role === 'trainee') {
    $test_result = $conn->query("SELECT test, topic FROM tests");
    while ($row = $test_result->fetch_assoc()) {
        $tests[] = $row;
    }
}

// Get completed tests to check which tests have scores
$completed_tests = [];
if ($user_role === 'trainee') {
    $stmt = $conn->prepare("SELECT DISTINCT test_name FROM test_results WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $completed_tests[] = $row['test_name'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PAF Training Platform - Tests</title>
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

    /* Header background strip */
    .header {
        width: 100%;
        height: 200px;
        background: url('header-bg.jpg') repeat-x top center;
        background-size: auto 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .header-logo {
        max-height: 120px;
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
    }
    
    /* Available Tests Section - 4 CARDS PER ROW */
    .test-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
        margin-top: 20px;
    }
    
    .test-card {
        background: #f8f9fa;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 25px;
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
    
    .test-name {
        font-size: 1.1em;
        color: #003366;
        margin-bottom: 10px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
	.test-topic {
	    font-size: 1.1em;
	    color: #555;
	    line-height: 1.4;
	    margin-bottom: 15px;
	    flex-grow: 1;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-weight: normal;
	}
    
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
    
    /* Action Buttons - Exact same as manual.php */
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 50px;
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
        .test-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 900px) {
        .test-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 600px) {
        .test-grid {
            grid-template-columns: 1fr;
        }
        
        .dashboard-content {
            padding: 20px;
        }
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <!-- Header with tiled background and logo -->
    <div class="header">
        <img src="paf-logo.png" alt="PAF Logo" class="header-logo">
    </div>

    <div class="user-welcome">
        <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
        <div class="user-info">
            PAF Training Platform - Tests
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <?php if ($user_role === 'trainee'): ?>
            <!-- Available Tests Section - 4 PER ROW -->
            <h2 class="section-title">Available Tests</h2>
            <?php if (!empty($tests)): ?>
                <div class="test-grid">
                    <?php foreach ($tests as $test): 
                        $is_completed = in_array($test['test'], $completed_tests);
                    ?>
                        <div class="test-card">
                            <div class="test-topic"><?= htmlspecialchars($test['topic']) ?></div>
                            <?php if ($is_completed): ?>
                                <a href="report-card.php?test=<?= urlencode($test['test']) ?>" class="report-card-btn">See Report Card</a>
                            <?php else: ?>
                                <a href="taketest.php?test=<?= urlencode($test['test']) ?>" class="take-test-btn">Take Test</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-results">
                    <p>No tests available at the moment. Please check back later.</p>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <!-- For non-trainee users -->
            <div style="text-align: center; padding: 50px;">
                <h2>Access Restricted</h2>
                <p>This page is only available for trainees.</p>
                <div class="action-buttons">
                    <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Action Buttons - Exact same format and position as manual.php -->
        <div class="action-buttons">
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>