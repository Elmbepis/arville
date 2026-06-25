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

// Restrict to teachers and admins only (unchanged)
if ($user_role !== 'teacher' && $user_role !== 'admin') {
    die("Access restricted to teachers and administrators only.");
}

// ---- Custom subject ordering (core first, then electives) ----
$elective_list = [
    "Introduction to Organization and Management",
    "Business 1 - Basic Accounting",
    "Social Sciences",
    "Creative Composition 1",
    "Chemistry 1",
    "Biology 1"
];

// Get all distinct subjects
$subjects_only = [];
$subject_result = $conn->query("SELECT DISTINCT subject FROM tests ORDER BY subject");
while ($row = $subject_result->fetch_assoc()) {
    $subjects_only[] = $row['subject'];
}

// Get subjects that have at least one test result (for disabling buttons)
$subjects_with_results = [];
$results_query = $conn->query("
    SELECT DISTINCT t.subject 
    FROM tests t 
    INNER JOIN test_results tr ON t.id = tr.test_id
");
while ($row = $results_query->fetch_assoc()) {
    $subjects_with_results[] = $row['subject'];
}

// Determine core subjects (subjects not in elective list)
$core_subjects = array_diff($subjects_only, $elective_list);
// Determine elective subjects present
$elective_present = array_intersect($subjects_only, $elective_list);
// Sort electives according to the order in $elective_list
$sorted_electives = array_intersect($elective_list, $elective_present);
// Final ordered subjects: core first, then electives, then any leftovers
$ordered_subjects = array_merge($core_subjects, $sorted_electives);
$other_subjects = array_diff($subjects_only, $core_subjects, $elective_present);
$ordered_subjects = array_merge($ordered_subjects, $other_subjects);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Student Results (Teacher/Admin View)</title>
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
    
    .subject-count {
        background: #28a745;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: normal;
    }
    
    /* Subjects Section */
    .subjects-section {
        margin-bottom: 50px;
    }
    
    /* 4-Column Grid */
    .subjects-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 15px;
    }
    
    .subject-card {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 25px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .subject-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .subject-icon {
        font-size: 3em;
        margin-bottom: 15px;
        color: #003366;
    }
    
    .subject-name {
        font-size: 1.1em;
        color: #003366;
        margin-bottom: 20px;
        font-weight: bold;
        line-height: 1.3;
        flex-grow: 1;
    }
    
    .button-group {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-top: 10px;
    }
    
    .results-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #003366;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
        font-weight: bold;
        font-size: 0.85em;
        flex: 1;
        cursor: pointer;
    }
    
    .results-btn:hover {
        background: #0055aa;
        color: white;
    }
    
    .results-btn-students {
        background: #28a745;
    }
    
    .results-btn-students:hover {
        background: #218838;
    }
    
    .results-btn-topics {
        background: #17a2b8;
    }
    
    .results-btn-topics:hover {
        background: #138496;
    }
    
    /* Disabled button styles */
    .results-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
        pointer-events: none;
        background: #6c757d !important;
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
        .subjects-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 900px) {
        .subjects-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .dashboard-content {
            padding: 20px;
        }
    }
    
    @media (max-width: 600px) {
        .subjects-grid {
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
            KPluz SHS - Student Results (<?= ucfirst($user_role) ?> View)
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <div class="subjects-section">
            <h2 class="section-title">
                Student Results by Subject
                <span class="subject-count">Total: <?= count($ordered_subjects) ?> Subject(s)</span>
            </h2>
            
            <?php if (!empty($ordered_subjects)): ?>
                <div class="subjects-grid">
                    <?php foreach ($ordered_subjects as $subject): 
                        $has_results = in_array($subject, $subjects_with_results);
                    ?>
                        <div class="subject-card">
                            <div class="subject-icon">&#128214;</div>
                            <div class="subject-name"><?= htmlspecialchars($subject) ?></div>
                            <div class="button-group">
                                <?php if ($has_results): ?>
                                    <a href="results2.php?subject=<?= urlencode($subject) ?>&id=students" class="results-btn results-btn-students">By Students</a>
                                    <a href="results2.php?subject=<?= urlencode($subject) ?>&id=topics" class="results-btn results-btn-topics">By Topics</a>
                                <?php else: ?>
                                    <span class="results-btn results-btn-students disabled" title="No test results available for this subject">By Students</span>
                                    <span class="results-btn results-btn-topics disabled" title="No test results available for this subject">By Topics</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-results">
                    <p>No subjects available at the moment. Please check back later.</p>
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