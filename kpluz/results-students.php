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

// Get subject and lesson from URL
if (!isset($_GET['subject']) || !isset($_GET['lesson'])) {
    die("Subject and lesson required");
}

$subject_name = $_GET['subject'];
$lesson_name = $_GET['lesson'];

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user details (including school)
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, role, school FROM users WHERE id = ?");
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

// Restrict to teachers and admins only
if ($user_role !== 'teacher' && $user_role !== 'admin') {
    die("Access restricted to teachers and administrators only.");
}

// Get test details and test_id
$test_stmt = $conn->prepare("SELECT id, subject, lesson, topic FROM tests WHERE subject = ? AND lesson = ?");
$test_stmt->bind_param("ss", $subject_name, $lesson_name);
$test_stmt->execute();
$test_result = $test_stmt->get_result();
$test = $test_result->fetch_assoc();

if (!$test) {
    die("Test not found");
}

$test_id = $test['id'];

// Build the query for students who took this test
$sql = "
    SELECT u.id, u.name, tr.score, tr.total_questions, tr.percentage, tr.completed_at
    FROM users u
    INNER JOIN test_results tr ON u.id = tr.user_id
    WHERE u.role = 'student' AND tr.test_id = ?
";

// If the logged&#8209;in user is a teacher, only show students from the same school
if ($user_role === 'teacher' && !empty($user_school)) {
    $sql .= " AND u.school = ?";
}
$sql .= " ORDER BY tr.percentage DESC, u.name ASC";

// Prepare and execute
$students_stmt = $conn->prepare($sql);
if ($user_role === 'teacher' && !empty($user_school)) {
    $students_stmt->bind_param("is", $test_id, $user_school);
} else {
    $students_stmt->bind_param("i", $test_id);
}
$students_stmt->execute();
$students_results = $students_stmt->get_result();

// Calculate class statistics (only for the filtered students)
$total_students = 0;
$scores_sum = 0;
$highest_score = 0;
$lowest_score = 100;
$passed_count = 0;

$student_scores = [];
while ($student = $students_results->fetch_assoc()) {
    $total_students++;
    $scores_sum += $student['percentage'];
    $highest_score = max($highest_score, $student['percentage']);
    $lowest_score = min($lowest_score, $student['percentage']);
    if ($student['percentage'] >= 75) {
        $passed_count++;
    }
    $student_scores[] = $student;
}

$average_score = $total_students > 0 ? round($scores_sum / $total_students, 1) : 0;
$passing_rate = $total_students > 0 ? round(($passed_count / $total_students) * 100, 1) : 0;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Students - <?= htmlspecialchars($lesson_name) ?> | KPluz SHS</title>
  <style>
    * {
        box-sizing: border-box;
    }
    body { 
        font-family: 'Arial', sans-serif; 
        background: #f0f0f0; 
        margin: 0;
        padding: 20px;
    }
    
    .dashboard-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        max-width: 1200px;
        margin: 0 auto;
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
    }
    
    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        color: #003366;
        text-decoration: none;
        font-weight: bold;
    }
    
    .back-link:hover {
        text-decoration: underline;
    }
    
    .test-info {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        border-left: 4px solid #003366;
    }
    
    .test-title {
        font-size: 1.5em;
        color: #003366;
        margin-bottom: 5px;
    }
    
    .test-topic {
        color: #9b59b6;
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    /* Statistics Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 15px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        border-top: 3px solid #003366;
    }
    
    .stat-value {
        font-size: 1.8em;
        font-weight: bold;
        color: #003366;
    }
    
    .stat-label {
        font-size: 0.85em;
        color: #666;
        margin-top: 5px;
    }
    
    /* Students Table */
    .students-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .students-table th {
        background: #003366;
        color: white;
        padding: 12px;
        text-align: left;
        font-weight: bold;
    }
    
    .students-table td {
        padding: 12px;
        border-bottom: 1px solid #e1e5e9;
    }
    
    .students-table tr:hover {
        background: #f8f9fa;
    }
    
    .score-passed {
        color: #28a745;
        font-weight: bold;
    }
    
    .score-failed {
        color: #dc3545;
        font-weight: bold;
    }
    
    .view-student-btn {
        padding: 5px 12px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 0.85em;
        transition: background 0.3s;
    }
    
    .view-student-btn:hover {
        background: #218838;
    }
    
    .no-results {
        text-align: center;
        color: #666;
        font-style: italic;
        padding: 40px;
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
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background 0.3s;
        display: inline-block;
    }
    
    .dashboard-btn:hover { 
        background: #218838; 
    }
    
    .logout-btn {
        padding: 12px 24px;
        background: #dc3545;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background 0.3s;
        display: inline-block;
    }
    
    .logout-btn:hover { 
        background: #c82333; 
    }

    @media (max-width: 900px) {
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }
        .dashboard-content {
            padding: 20px;
        }
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <div class="user-welcome">
        <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
        <div class="user-info">
            Student Results - <?= htmlspecialchars($lesson_name) ?>
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <a href="results.php" class="back-link">&larr; Back to All Tests</a>
        
        <div class="test-info">
            <div class="test-title"><?= htmlspecialchars($subject_name) ?></div>
            <div class="test-topic">Topic: <?= htmlspecialchars($test['topic']) ?></div>
            <div>Lesson: <?= htmlspecialchars($lesson_name) ?></div>
        </div>
        
        <!-- Statistics -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-value"><?= $total_students ?></div>
                <div class="stat-label">Students Who Took Test</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?= $average_score ?>%</div>
                <div class="stat-label">Class Average</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?= $highest_score ?>%</div>
                <div class="stat-label">Highest Score</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?= $lowest_score ?>%</div>
                <div class="stat-label">Lowest Score</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?= $passing_rate ?>%</div>
                <div class="stat-label">Passing Rate</div>
            </div>
        </div>
        
        <h3 style="margin-bottom: 15px; color: #003366;">Student Scores</h3>
        
        <?php if (!empty($student_scores)): ?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Score</th>
                        <th>Percentage</th>
                        <th>Status</th>
                        <th>Date Completed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach ($student_scores as $student): ?>
                        <tr>
                            <td><?= $counter++ ?></td>
                            <td><?= htmlspecialchars($student['name']) ?></td>
                            <td><?= $student['score'] ?>/<?= $student['total_questions'] ?></td>
                            <td class="<?= $student['percentage'] >= 75 ? 'score-passed' : 'score-failed' ?>">
                                <?= number_format($student['percentage'], 1) ?>%
                            </td>
                            <td>
                                <?php if ($student['percentage'] >= 75): ?>
                                    <span style="color: #28a745;">&#10003; Passed</span>
                                <?php else: ?>
                                    <span style="color: #dc3545;">&#10007; Failed</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('M d, Y', strtotime($student['completed_at'])) ?></td>
                            <td>
                                <a href="test-results.php?test_id=<?= $test_id ?>&student_id=<?= $student['id'] ?>" class="view-student-btn">View Student Report</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-results">
                <p>No students from your school have taken this test yet.</p>
            </div>
        <?php endif; ?>
        
        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="results.php" class="dashboard-btn">Back to Results</a>
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>