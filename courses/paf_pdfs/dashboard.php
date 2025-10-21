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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PAF Training Platform - Dashboard</title>
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
        max-width: 1200px;
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
    
    /* Main Navigation Grid */
    .nav-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-top: 20px;
    }
    
    .nav-card {
        background: #f8f9fa;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 40px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .nav-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .nav-icon {
        font-size: 3em;
        margin-bottom: 20px;
        color: #003366;
    }
    
    .nav-title {
        font-size: 1.5em;
        color: #003366;
        margin-bottom: 15px;
        font-weight: bold;
    }
    
    .nav-description {
        color: #666;
        font-size: 1em;
        margin-bottom: 20px;
        line-height: 1.4;
    }
    
    .nav-btn {
        display: inline-block;
        padding: 12px 24px;
        background: #003366;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
        font-weight: bold;
        font-size: 1em;
    }
    
    .nav-btn:hover {
        background: #0055aa;
        color: white;
    }
    
    /* Action Buttons */
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

    /* Responsive design */
    @media (max-width: 900px) {
        .nav-grid {
            grid-template-columns: 1fr;
        }
        
        .dashboard-content {
            padding: 20px;
        }
        
        .nav-card {
            padding: 30px;
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
            PAF Training Platform
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <?php if ($user_role === 'trainee'): ?>
            <!-- TRAINEE DASHBOARD - SIMPLIFIED NAVIGATION -->
            <h2 class="section-title">Training Portal</h2>
            
            <div class="nav-grid">
                <!-- Training Manuals -->
                <div class="nav-card">
                    <div class="nav-icon">&#128214;</div>
                    <div class="nav-title">Training Manuals</div>
                    <div class="nav-description">
                        Access all available training materials and course manuals to study and prepare for your tests.
                    </div>
                    <a href="amac-manuals.php" class="nav-btn">View Manuals</a>
                </div>
                
                <!-- Available Tests -->
                <div class="nav-card">
                    <div class="nav-icon">&#128221;</div>
                    <div class="nav-title">Available Tests</div>
                    <div class="nav-description">
                        Take assessments to evaluate your knowledge and understanding of the training materials.
                    </div>
                    <a href="tests.php" class="nav-btn">Take Tests</a>
                </div>
                
                <!-- Report Cards -->
                <div class="nav-card">
                    <div class="nav-icon">&#128202;</div>
                    <div class="nav-title">Report Cards</div>
                    <div class="nav-description">
                        View your test results, scores, and performance history across all completed assessments.
                    </div>
                    <a href="report-cards.php" class="nav-btn">View Reports</a>
                </div>
            </div>

        <?php elseif ($user_role === 'admin' || $user_role === 'instructor'): ?>
            <!-- ADMIN/INSTRUCTOR DASHBOARD -->
            <h2 class="section-title">Administration Portal</h2>
            
            <div class="nav-grid">
                <div class="nav-card">
                    <div class="nav-icon">&#128221;</div>
                    <div class="nav-title">Manage Questions</div>
                    <div class="nav-description">
                        Add, edit, or remove test questions from the question bank.
                    </div>
                    <a href="qsubmit.php" class="nav-btn">Go to Questions</a>
                </div>
                
                <div class="nav-card">
                    <div class="nav-icon">&#128101;</div>
                    <div class="nav-title">User Management</div>
                    <div class="nav-description">
                        View and manage user accounts, roles, and access permissions.
                    </div>
                    <a href="users.php" class="nav-btn">Manage Users</a>
                </div>
                
                <div class="nav-card">
                    <div class="nav-icon">&#128202;</div>
                    <div class="nav-title">View Results</div>
                    <div class="nav-description">
                        Check test results and track trainee progress across all assessments.
                    </div>
                    <a href="results.php" class="nav-btn">View Results</a>
                </div>
                
                <?php if ($user_role === 'admin'): ?>
                <div class="nav-card">
                    <div class="nav-icon">&#9881;&#65039;</div>
                    <div class="nav-title">System Settings</div>
                    <div class="nav-description">
                        Configure platform settings, manage courses, and system preferences.
                    </div>
                    <a href="settings.php" class="nav-btn">Settings</a>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>