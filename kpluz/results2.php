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

// Restrict to teachers and admins only
if ($user_role !== 'teacher' && $user_role !== 'admin') {
    die("Access restricted to teachers and administrators only.");
}

// Get parameters
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';
$view_type = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($subject)) {
    die("Subject parameter required.");
}

if ($view_type === 'students') {
    // STUDENTS VIEW - Show all students with their overall performance for this subject
    
    // Get all students
    $student_stmt = $conn->prepare("SELECT id, name, grade, school FROM users WHERE role = 'student' ORDER BY name");
    $student_stmt->execute();
    $students = $student_stmt->get_result();
    
    // Get all tests for this subject
    $tests_stmt = $conn->prepare("SELECT id, lesson, topic FROM tests WHERE subject = ? ORDER BY lesson");
    $tests_stmt->bind_param("s", $subject);
    $tests_stmt->execute();
    $tests = $tests_stmt->get_result();
    $test_list = [];
    while ($test = $tests->fetch_assoc()) {
        $test_list[] = $test;
    }
    
    // Get all test results for this subject
    $results_data = [];
    $student_performance = [];
    
    foreach ($students as $student) {
        $student_id = $student['id'];
        $total_score = 0;
        $total_questions = 0;
        $modules_passed = 0;
        $modules_taken = 0;
        $module_results = [];
        
        foreach ($test_list as $test) {
            $lesson = $test['lesson'];
            $result_stmt = $conn->prepare("SELECT score, total_questions, percentage FROM test_results WHERE user_id = ? AND subject = ? AND lesson = ?");
            $result_stmt->bind_param("iss", $student_id, $subject, $lesson);
            $result_stmt->execute();
            $result_data = $result_stmt->get_result()->fetch_assoc();
            
            if ($result_data) {
                $modules_taken++;
                $total_score += $result_data['score'];
                $total_questions += $result_data['total_questions'];
                if ($result_data['percentage'] >= 75) {
                    $modules_passed++;
                }
                $module_results[$lesson] = [
                    'score' => $result_data['score'],
                    'total' => $result_data['total_questions'],
                    'percentage' => $result_data['percentage'],
                    'passed' => $result_data['percentage'] >= 75
                ];
            } else {
                $module_results[$lesson] = null;
            }
        }
        
        $average_percentage = $total_questions > 0 ? ($total_score / $total_questions) * 100 : 0;
        $student_performance[$student_id] = [
            'name' => $student['name'],
            'grade' => $student['grade'],
            'school' => $student['school'],
            'aggregated_raw_score' => $total_questions > 0 ? "$total_score/$total_questions" : "0/0",
            'aggregated_score' => $total_score,
            'aggregated_total' => $total_questions,
            'average_percentage' => $average_percentage,
            'modules_passed' => $modules_passed,
            'modules_taken' => $modules_taken,
            'modules_ratio' => $modules_taken > 0 ? "$modules_passed/$modules_taken" : "0/0",
            'module_results' => $module_results
        ];
    }
    
    $conn->close();
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Student Performance - <?= htmlspecialchars($subject) ?> | KPluz SHS</title>
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
                max-width: 1400px;
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
            
            .subject-header {
                background: #f8f9fa;
                padding: 20px;
                border-radius: 8px;
                margin-bottom: 30px;
                border-left: 4px solid #003366;
            }
            
            .subject-title {
                font-size: 1.5em;
                color: #003366;
                margin-bottom: 5px;
            }
            
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
            
            /* Column width adjustments */
            .students-table th:nth-child(1), .students-table td:nth-child(1) { width: 50px; }   /* # column */
            .students-table th:nth-child(2), .students-table td:nth-child(2) { width: 200px; }  /* Student Name */
            .students-table th:nth-child(3), .students-table td:nth-child(3) { width: 150px; }  /* Aggregated Raw Score */
            .students-table th:nth-child(4), .students-table td:nth-child(4) { width: 150px; }  /* Average Percentage Score */
            .students-table th:nth-child(5), .students-table td:nth-child(5) { width: 150px; }  /* Modules Passed / Taken */
            .students-table th:nth-child(6), .students-table td:nth-child(6) { width: 120px; }  /* Action */
            
            .percentage-passed {
                color: #28a745;
                font-weight: bold;
            }
            
            .percentage-failed {
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
                .dashboard-content {
                    padding: 20px;
                }
                .students-table {
                    font-size: 0.85em;
                }
            }
        </style>
    </head>
    <body>
        <div class="dashboard-container">
            <div class="user-welcome">
                <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
                <div class="user-info">
                    Student Performance - <?= htmlspecialchars($subject) ?>
                    <span class="role-badge"><?= ucfirst($user_role) ?></span>
                </div>
            </div>
            
            <div class="dashboard-content">
                <a href="results.php" class="back-link">&larr; Back to Subjects</a>
                
                <div class="subject-header">
                    <div class="subject-title"><?= htmlspecialchars($subject) ?></div>
                    <div>Student Performance Summary</div>
                </div>
                
                <h3 style="margin-bottom: 15px; color: #003366;">All Students</h3>
                
                <table class="students-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Aggregated Raw Score</th>
                            <th>Average Percentage Score</th>
                            <th>Modules Passed / Taken</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($student_performance as $student_id => $data): ?>
                            <tr>
                                <td><?= $counter++ ?></td>
                                <td><?= htmlspecialchars($data['name']) ?></td>
                                <td><?= $data['aggregated_raw_score'] ?></td>
                                <td class="<?= $data['average_percentage'] >= 75 ? 'percentage-passed' : 'percentage-failed' ?>">
                                    <?= number_format($data['average_percentage'], 1) ?>%
                                </td>
                                <td>
                                    <?= $data['modules_ratio'] ?>
                                </td>
                                <td>
                                    <a href="test-results.php?subject=<?= urlencode($subject) ?>&student_id=<?= $student_id ?>" class="view-student-btn">View Test Results</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <div class="action-buttons">
                    <a href="results.php" class="dashboard-btn">Back to Subjects</a>
                    <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    
<?php
} elseif ($view_type === 'topics') {
    // TOPICS VIEW - Show results organized by topics/lessons for this subject
    
    // Get all tests (lessons/topics) for this subject
    $tests_stmt = $conn->prepare("SELECT id, lesson, topic FROM tests WHERE subject = ? ORDER BY lesson");
    $tests_stmt->bind_param("s", $subject);
    $tests_stmt->execute();
    $tests = $tests_stmt->get_result();
    $test_list = [];
    while ($test = $tests->fetch_assoc()) {
        $test_list[] = $test;
    }
    
    // Get all students
    $student_stmt = $conn->prepare("SELECT id, name FROM users WHERE role = 'student' ORDER BY name");
    $student_stmt->execute();
    $students = $student_stmt->get_result();
    $student_list = [];
    while ($student = $students->fetch_assoc()) {
        $student_list[$student['id']] = $student['name'];
    }
    
    // Get all test results for this subject
    $results_data = [];
    $results_stmt = $conn->prepare("
        SELECT user_id, lesson, score, total_questions, percentage 
        FROM test_results 
        WHERE subject = ?
        ORDER BY user_id, lesson
    ");
    $results_stmt->bind_param("s", $subject);
    $results_stmt->execute();
    $results = $results_stmt->get_result();
    
    while ($row = $results->fetch_assoc()) {
        $lesson = $row['lesson'];
        $user_id = $row['user_id'];
        if (!isset($results_data[$lesson])) {
            $results_data[$lesson] = [];
        }
        $results_data[$lesson][$user_id] = [
            'score' => $row['score'],
            'total_questions' => $row['total_questions'],
            'percentage' => $row['percentage']
        ];
    }
    
    // Calculate statistics per lesson
    $lesson_stats = [];
    foreach ($test_list as $test) {
        $lesson = $test['lesson'];
        $topic = $test['topic'];
        $scores = [];
        $total_score_sum = 0;
        $total_questions_sum = 0;
        $students_taken = 0;
        $students_passed = 0;
        
        if (isset($results_data[$lesson])) {
            foreach ($results_data[$lesson] as $student_id => $result) {
                $students_taken++;
                $total_score_sum += $result['score'];
                $total_questions_sum += $result['total_questions'];
                if ($result['percentage'] >= 75) {
                    $students_passed++;
                }
            }
        }
        
        $average_percentage = $total_questions_sum > 0 ? ($total_score_sum / $total_questions_sum) * 100 : 0;
        
        $lesson_stats[] = [
            'lesson' => $lesson,
            'topic' => $topic,
            'students_taken' => $students_taken,
            'total_students' => count($student_list),
            'average_percentage' => $average_percentage,
            'students_passed' => $students_passed,
            'passing_rate' => $students_taken > 0 ? ($students_passed / $students_taken) * 100 : 0
        ];
    }
    
    $conn->close();
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Topics Performance - <?= htmlspecialchars($subject) ?> | KPluz SHS</title>
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
                max-width: 1400px;
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
            
            .subject-header {
                background: #f8f9fa;
                padding: 20px;
                border-radius: 8px;
                margin-bottom: 30px;
                border-left: 4px solid #003366;
            }
            
            .subject-title {
                font-size: 1.5em;
                color: #003366;
                margin-bottom: 5px;
            }
            
            /* 4-Column Grid for Topics */
            .topics-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
                margin-top: 15px;
            }
            
            .topic-card {
                background: white;
                border: 1px solid #e1e5e9;
                border-radius: 8px;
                padding: 20px;
                text-align: center;
                transition: transform 0.3s, box-shadow 0.3s;
            }
            
            .topic-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            }
            
            .topic-icon {
                font-size: 2em;
                margin-bottom: 10px;
                color: #003366;
            }
            
            .topic-lesson {
                font-size: 1em;
                color: #0066cc;
                margin-bottom: 5px;
                font-weight: bold;
            }
            
            .topic-topic {
                font-size: 0.85em;
                color: #555;
                margin-bottom: 15px;
                line-height: 1.4;
            }
            
            .topic-stats {
                margin-top: 10px;
                padding-top: 10px;
                border-top: 1px solid #e1e5e9;
            }
            
            .stat-value {
                font-size: 1.2em;
                font-weight: bold;
                margin: 5px 0;
            }
            
            .stat-label {
                font-size: 0.7em;
                color: #666;
            }
            
            .percentage-passed {
                color: #28a745;
            }
            
            .percentage-failed {
                color: #dc3545;
            }
            
            .view-topic-btn {
                display: inline-block;
                padding: 8px 16px;
                background: #003366;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background 0.3s;
                font-weight: bold;
                font-size: 0.85em;
                margin-top: 15px;
            }
            
            .view-topic-btn:hover {
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
            
            @media (max-width: 1200px) {
                .topics-grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }
            
            @media (max-width: 900px) {
                .topics-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
                .dashboard-content {
                    padding: 20px;
                }
            }
            
            @media (max-width: 600px) {
                .topics-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="dashboard-container">
            <div class="user-welcome">
                <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
                <div class="user-info">
                    Topics Performance - <?= htmlspecialchars($subject) ?>
                    <span class="role-badge"><?= ucfirst($user_role) ?></span>
                </div>
            </div>
            
            <div class="dashboard-content">
                <a href="results.php" class="back-link">&larr; Back to Subjects</a>
                
                <div class="subject-header">
                    <div class="subject-title"><?= htmlspecialchars($subject) ?></div>
                    <div>Performance by Topic/Lesson</div>
                </div>
                
                <h3 style="margin-bottom: 15px; color: #003366;">Topics Overview</h3>
                
                <div class="topics-grid">
                    <?php foreach ($lesson_stats as $stat): ?>
                        <div class="topic-card">
                            <div class="topic-icon">&#128202;</div>
                            <div class="topic-lesson"><?= htmlspecialchars($stat['lesson']) ?></div>
                            <div class="topic-topic"><?= htmlspecialchars($stat['topic']) ?></div>
                            <div class="topic-stats">
                                <div class="stat-value <?= $stat['average_percentage'] >= 75 ? 'percentage-passed' : 'percentage-failed' ?>">
                                    <?= number_format($stat['average_percentage'], 1) ?>%
                                </div>
                                <div class="stat-label">Average Score</div>
                                <div class="stat-value">
                                    <?= $stat['students_passed'] ?> / <?= $stat['students_taken'] ?>
                                </div>
                                <div class="stat-label">Students Passed / Taken</div>
                                <div class="stat-value">
                                    <?= number_format($stat['passing_rate'], 1) ?>%
                                </div>
                                <div class="stat-label">Passing Rate</div>
                            </div>
                            <a href="results-students.php?subject=<?= urlencode($subject) ?>&lesson=<?= urlencode($stat['lesson']) ?>" class="view-topic-btn">View Students</a>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="action-buttons">
                    <a href="results.php" class="dashboard-btn">Back to Subjects</a>
                    <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    
<?php
} else {
    die("Invalid view type. Use 'students' or 'topics'.");
}
?>