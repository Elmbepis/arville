<?php
// grade-activity.php
session_start();

// Redirect to login if not logged in as teacher
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'teacher') {
    header('Location: login.php');
    exit();
}

// Check if activity_id is provided
if (!isset($_GET['activity_id']) || !is_numeric($_GET['activity_id'])) {
    header('Location: teacher-dashboard.php');
    exit();
}

$activity_id = intval($_GET['activity_id']);
$teacher_id = $_SESSION['user_id'];

// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username = 'root';
$password = 'AcadeV25!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get teacher profile
    $teacherStmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $teacherStmt->execute([$teacher_id]);
    $teacher = $teacherStmt->fetch(PDO::FETCH_ASSOC);
    
    // Get activity details
    $activityStmt = $pdo->prepare("
        SELECT a.*, u.full_name as teacher_name 
        FROM activities a 
        JOIN users u ON a.teacher_id = u.id 
        WHERE a.id = ? AND a.teacher_id = ?
    ");
    $activityStmt->execute([$activity_id, $teacher_id]);
    $activity = $activityStmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$activity) {
        // Activity not found or teacher doesn't own this activity
        header('Location: teacher-dashboard.php');
        exit();
    }
    
    // Get all students enrolled in this teacher's class (or all students if needed)
    $studentsStmt = $pdo->prepare("
        SELECT u.id, u.full_name, u.grade_level, u.class_name,
               ag.points_earned, ag.feedback, ag.submission_data, ag.created_at as submission_date
        FROM users u
        LEFT JOIN activity_grades ag ON u.id = ag.student_id AND ag.activity_id = ?
        WHERE u.role = 'student' 
        ORDER BY u.full_name
    ");
    $studentsStmt->execute([$activity_id]);
    $students = $studentsStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Handle student selection
    $selected_student_id = null;
    $selected_student = null;
    $selected_submission = null;
    
    if (isset($_GET['student_id']) && is_numeric($_GET['student_id'])) {
        $selected_student_id = intval($_GET['student_id']);
        
        // Find the selected student
        foreach ($students as $student) {
            if ($student['id'] == $selected_student_id) {
                $selected_student = $student;
                break;
            }
        }
        
        // Get submission data if available
        if ($selected_student && !empty($selected_student['submission_data'])) {
            $selected_submission = json_decode($selected_student['submission_data'], true);
        }
    }
    
    // Handle grading submission
    if (isset($_POST['save_grade']) && $selected_student_id) {
        $points_earned = isset($_POST['points_earned']) ? intval($_POST['points_earned']) : 0;
        $feedback = isset($_POST['feedback']) ? trim($_POST['feedback']) : '';
        
        // Validate points
        if ($points_earned < 0) {
            $points_earned = 0;
        }
        if ($points_earned > $activity['max_points']) {
            $points_earned = $activity['max_points'];
        }
        
        try {
            // Check if grade record exists
            $checkGradeStmt = $pdo->prepare("
                SELECT id FROM activity_grades 
                WHERE activity_id = ? AND student_id = ?
            ");
            $checkGradeStmt->execute([$activity_id, $selected_student_id]);
            $existing_grade = $checkGradeStmt->fetch(PDO::FETCH_ASSOC);
            
            if ($existing_grade) {
                // Update existing grade
                $updateStmt = $pdo->prepare("
                    UPDATE activity_grades 
                    SET points_earned = ?, feedback = ?, created_at = CURRENT_TIMESTAMP
                    WHERE activity_id = ? AND student_id = ?
                ");
                $updateStmt->execute([$points_earned, $feedback, $activity_id, $selected_student_id]);
                $success = "Grade updated successfully!";
            } else {
                // Insert new grade (but check if submission exists first)
                $checkSubmissionStmt = $pdo->prepare("
                    SELECT submission_data FROM activity_grades 
                    WHERE activity_id = ? AND student_id = ?
                ");
                $checkSubmissionStmt->execute([$activity_id, $selected_student_id]);
                $submission = $checkSubmissionStmt->fetch(PDO::FETCH_ASSOC);
                
                if ($submission && !empty($submission['submission_data'])) {
                    // Insert with submission data
                    $insertStmt = $pdo->prepare("
                        INSERT INTO activity_grades 
                        (activity_id, student_id, points_earned, feedback, submission_data) 
                        VALUES (?, ?, ?, ?, ?)
                    ");
                    $insertStmt->execute([$activity_id, $selected_student_id, $points_earned, $feedback, $submission['submission_data']]);
                } else {
                    // Insert without submission data
                    $insertStmt = $pdo->prepare("
                        INSERT INTO activity_grades 
                        (activity_id, student_id, points_earned, feedback) 
                        VALUES (?, ?, ?, ?)
                    ");
                    $insertStmt->execute([$activity_id, $selected_student_id, $points_earned, $feedback]);
                }
                $success = "Grade saved successfully!";
            }
            
            // Refresh student data
            $studentsStmt->execute([$activity_id]);
            $students = $studentsStmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Update selected student info
            foreach ($students as $student) {
                if ($student['id'] == $selected_student_id) {
                    $selected_student = $student;
                    if (!empty($selected_student['submission_data'])) {
                        $selected_submission = json_decode($selected_student['submission_data'], true);
                    }
                    break;
                }
            }
            
        } catch(PDOException $e) {
            $error = "Error saving grade: " . $e->getMessage();
        }
    }
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Helper functions
function formatDate($date) {
    return date('M j, Y g:i A', strtotime($date));
}

function formatFileSize($bytes) {
    if ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}

function getFileIcon($filename) {
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
    $textExtensions = ['txt', 'doc', 'docx', 'pdf', 'rtf'];
    
    if (in_array($extension, $imageExtensions)) {
        return 'file-image';
    } elseif (in_array($extension, $textExtensions)) {
        if ($extension === 'pdf') return 'file-pdf';
        if ($extension === 'doc' || $extension === 'docx') return 'file-word';
        return 'file-alt';
    }
    return 'file';
}

function getWebsiteIcon($type) {
    $icons = [
        'youtube' => 'fab fa-youtube',
        'vimeo' => 'fab fa-vimeo',
        'soundcloud' => 'fab fa-soundcloud',
        'spotify' => 'fab fa-spotify',
        'google_drive' => 'fab fa-google-drive',
        'dropbox' => 'fab fa-dropbox',
        'other' => 'fas fa-link'
    ];
    return $icons[$type] ?? 'fas fa-link';
}

function getActivityTypeName($type) {
    $names = [
        'essay' => 'Essay',
        'project' => 'Project',
        'presentation' => 'Presentation',
        'experiment' => 'Experiment',
        'performance' => 'Performance',
        'portfolio' => 'Portfolio'
    ];
    return $names[$type] ?? ucfirst($type);
}

function getIntelligenceName($type) {
    $names = [
        'linguistic' => 'Linguistic',
        'logical' => 'Logical',
        'spatial' => 'Spatial',
        'kinesthetic' => 'Kinesthetic',
        'musical' => 'Musical',
        'interpersonal' => 'Interpersonal',
        'intrapersonal' => 'Intrapersonal',
        'naturalist' => 'Naturalist'
    ];
    return $names[$type] ?? $type;
}

function getWorldName($world) {
    $names = [
        'zoo' => 'Zoo',
        'museum' => 'Museum',
        'forest' => 'Forest',
        'ocean' => 'Ocean',
        'farm' => 'Farm',
        'space' => 'Space',
        'city' => 'City',
        'arctic' => 'Arctic'
    ];
    return $names[$world] ?? $world;
}

function getGradeColor($points, $max_points) {
    if ($max_points == 0) return 'text-secondary';
    $percentage = ($points / $max_points) * 100;
    
    if ($percentage >= 90) return 'text-success';
    if ($percentage >= 80) return 'text-primary';
    if ($percentage >= 70) return 'text-warning';
    return 'text-danger';
}

function getGradeBadge($points, $max_points) {
    if ($max_points == 0) return '<span class="badge bg-secondary">Not Graded</span>';
    $percentage = ($points / $max_points) * 100;
    
    if ($percentage >= 90) return '<span class="badge bg-success">A</span>';
    if ($percentage >= 80) return '<span class="badge bg-primary">B</span>';
    if ($percentage >= 70) return '<span class="badge bg-warning">C</span>';
    if ($percentage >= 60) return '<span class="badge bg-danger">D</span>';
    return '<span class="badge bg-dark">F</span>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Grades | MIEL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Reuse the same styles from view-activity.php with teacher-specific adjustments */
        :root {
            --primary-blue: #4A90E2;
            --secondary-green: #50C878;
            --accent-yellow: #FFD166;
            --background-light: #F8F9FF;
            --text-dark: #2C3E50;
            --shadow: 0 4px 12px rgba(0,0,0,0.1);
            --border-radius: 20px;
        }
        
        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
            background: linear-gradient(135deg, #E3F2FD 0%, #F3E5F5 100%);
            min-height: 100vh;
            padding: 0px;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('background-tile.jpg');
            background-repeat: repeat;
            background-size: 1980px 1080px;
            opacity: 0.9;
            z-index: -1;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(248, 249, 255, 0.3);
            z-index: -3;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .navbar {
            margin-bottom: 30px;
        }
		
		.navbar .container {
		    width: 100%;
    		max-width: 100%;
   		    padding-left: 300px;
  		    padding-right: 300px;
    		display: flex;
    		justify-content: space-between;
    		align-items: center;
		}

		.navbar .navbar-collapse {
		    flex-grow: 0; /* Prevents it from taking up extra space */
		}        
		
        .miel-banner-container {
            text-align: center;
            margin-bottom: 30px;
            padding: 0;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .miel-banner {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 25px;
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .logo-icon {
            font-size: 2.5rem;
            color: var(--primary-blue);
        }
        
        h1 {
            color: var(--primary-blue);
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: var(--secondary-green);
            font-size: 1.2rem;
            margin-bottom: -5px;
        }
        
        .welcome-message {
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-top: 10px;
        }
        
        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            width: 100%;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
        }
        
        .card-title {
            color: var(--primary-blue);
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #F0F0F0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .activity-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .info-item {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 3px solid #E0E0E0;
            transition: all 0.3s;
        }
        
        .info-item:hover {
            transform: translateY(-3px);
            border-color: var(--primary-blue);
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary-blue);
        }
        
        .student-list-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 15px;
        }
        
        .student-list-table thead th {
            background: var(--primary-blue);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
            border: none;
        }
        
        .student-list-table thead th:first-child {
            border-top-left-radius: 15px;
        }
        
        .student-list-table thead th:last-child {
            border-top-right-radius: 15px;
        }
        
        .student-list-table tbody tr {
            background: white;
            transition: all 0.3s;
        }
        
        .student-list-table tbody tr:hover {
            background: #F8F9FF;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.1);
        }
        
        .student-list-table tbody tr.selected {
            background: #F0FFF4;
            border-left: 5px solid var(--secondary-green);
        }
        
        .student-list-table tbody td {
            padding: 15px;
            border-bottom: 3px solid #F0F0F0;
        }
        
        .student-list-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .student-name-cell {
            font-weight: bold;
            color: var(--text-dark);
        }
        
        .student-info-cell {
            color: #666;
        }
        
        .grade-cell {
            font-weight: bold;
            text-align: center;
        }
        
        .grade-cell.graded {
            color: var(--secondary-green);
        }
        
        .grade-cell.not-submitted {
            color: #FF9800;
        }
        
        .grade-cell.not-graded {
            color: #666;
        }
        
        .action-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
        }
        
        .action-link:hover {
            color: #3a7bc8;
            text-decoration: underline;
        }
        
        .submission-content {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 20px;
            border: 3px solid #E0E0E0;
            margin-bottom: 20px;
        }
        
        .file-display {
            background: white;
            border-radius: 12px;
            padding: 15px;
            border: 2px solid #E0E0E0;
            margin-bottom: 10px;
        }
        
        .file-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }
        
        .file-icon {
            font-size: 2rem;
            color: var(--primary-blue);
        }
        
        .file-info {
            flex: 1;
        }
        
        .file-name {
            font-weight: bold;
            color: var(--text-dark);
        }
        
        .file-size {
            font-size: 0.9rem;
            color: #666;
        }
        
        .file-preview {
            max-width: 100%;
            max-height: 400px;
            border-radius: 10px;
            border: 2px solid #E0E0E0;
            margin-top: 10px;
        }
        
        .file-text-content {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            border: 2px dashed #E0E0E0;
            max-height: 300px;
            overflow-y: auto;
            font-family: monospace;
            white-space: pre-wrap;
            margin-top: 10px;
        }
        
        .link-display {
            background: white;
            border-radius: 12px;
            padding: 15px;
            border: 2px solid #90CAF9;
            margin-bottom: 10px;
        }
        
        .grade-form {
            background: #E3F2FD;
            border-radius: 15px;
            padding: 25px;
            border: 3px solid #90CAF9;
        }
        
        .points-input {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            max-width: 150px;
            margin: 0 auto 20px;
        }
        
        .max-points {
            font-size: 1.2rem;
            color: #666;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .feedback-textarea {
            min-height: 150px;
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
            font-size: 1rem;
        }
        
        .alert {
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            border: 3px solid transparent;
        }
        
        .alert-success {
            background-color: #E8F5E9;
            border-color: #A5D6A7;
            color: #2E7D32;
        }
        
        .alert-danger {
            background-color: #FFEBEE;
            border-color: #EF9A9A;
            color: #C62828;
        }
        
        .action-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 1.2rem;
            text-decoration: none;
            color: white;
            background-color: #4A90E2 !important;
        }
        
        .action-btn:hover {
            background-color: #FFD166 !important;
            transform: translateY(-3px);
            color: #2C3E50 !important;
        }
        
        .green-btn {
            background-color: #50C878 !important;
            color: white !important;
            border: none !important;
            padding: 15px 30px !important;
            border-radius: 15px !important;
            font-size: 1.2rem !important;
            font-weight: bold !important;
            cursor: pointer !important;
            transition: all 0.3s !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 10px !important;
            text-decoration: none !important;
        }
        
        .green-btn:hover {
            background-color: #3DAF5E !important;
            transform: translateY(-3px) !important;
        }
        
        .yellow-btn {
            background-color: #FFD166 !important;
            color: #2C3E50 !important;
            border: none !important;
            padding: 8px 16px !important;
            border-radius: 10px !important;
            font-size: 0.9rem !important;
            font-weight: bold !important;
            cursor: pointer !important;
            transition: all 0.3s !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 5px !important;
            text-decoration: none !important;
        }
        
        .yellow-btn:hover {
            background-color: #FFC233 !important;
            transform: translateY(-2px) !important;
        }
        
        .bottom-buttons-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .card {
                padding: 20px;
            }
            
            .activity-info-grid {
                grid-template-columns: 1fr;
            }
            
            .student-list-table {
                display: block;
                overflow-x: auto;
            }
            
            .student-list-table thead th,
            .student-list-table tbody td {
                padding: 10px;
            }
            
            .bottom-buttons-container {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- ARVILLE NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo.jpg" alt="ARville Network" width="200" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="miel-about.php">About Miel</a></li>
                    <li class="nav-item"><a class="nav-link" href="miel-join.php">Join Miel</a></li>
                    <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MIEL BANNER -->
    <div class="miel-banner-container fade-in">
        <img src="miel-banner.png" alt="MIEL" class="miel-banner">
    </div>

    <div class="container">
        <!-- HEADER -->
        <header class="dashboard-header fade-in">
            <div class="logo">
 
                <div>
<img src="images/activity-grades.jpg" alt="Create Quiz for Arville Metaverse" style="max-width: 500px; height: auto; margin-bottom: 10px;">
                    <p class="subtitle">Review or Grade Student Submissions for this Activity:<br/><span style="color: #3628C3; font-weight: bold; font-size: 1.1em;"><?php echo htmlspecialchars($activity['title']); ?></span></p>
                </div>
            </div>
        </header>

        <!-- MESSAGES -->
        <?php if (isset($success)): ?>
            <div class="alert alert-success fade-in">
                <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger fade-in">
                <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- ACTIVITY INFO -->
        <div class="card fade-in">
            <h2 class="card-title">
                <i class="fas fa-info-circle"></i> Activity: <?php echo htmlspecialchars($activity['title']); ?>
            </h2>
            
            <div class="activity-info-grid">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div>
                        <div class="info-label">Maximum Points</div>
                        <div class="info-value"><?php echo $activity['max_points']; ?> points</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <div class="info-label">Students</div>
                        <div class="info-value"><?php echo count($students); ?> enrolled</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div>
                        <div class="info-label">Submissions</div>
                        <?php 
                        $submitted_count = 0;
                        $graded_count = 0;
                        foreach ($students as $student) {
                            if (!empty($student['submission_data'])) $submitted_count++;
                            if (!empty($student['points_earned'])) $graded_count++;
                        }
                        ?>
                        <div class="info-value"><?php echo $submitted_count; ?> submitted, <?php echo $graded_count; ?> graded</div>
                    </div>
                </div>
                
                <?php if ($activity['due_date']): ?>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div>
                        <div class="info-label">Due Date</div>
                        <div class="info-value"><?php echo formatDate($activity['due_date']); ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <?php if ($activity['description']): ?>
            <div style="background: #F8F9FF; border-radius: 15px; padding: 20px; margin-top: 20px; border: 3px solid #E0E0E0;">
                <div style="color: var(--primary-blue); font-size: 1.1rem; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-align-left"></i> Description
                </div>
                <div><?php echo nl2br(htmlspecialchars($activity['description'])); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if ($activity['instructions']): ?>
            <div style="background: #FFF9E6; border-radius: 15px; padding: 20px; margin-top: 15px; border: 3px solid #FFE082;">
                <div style="color: #FF9800; font-size: 1.1rem; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-list-check"></i> Instructions
                </div>
                <div><?php echo nl2br(htmlspecialchars($activity['instructions'])); ?></div>
            </div>
            <?php endif; ?>
        </div>

        <!-- STUDENT GRADES TABLE -->
        <div class="card fade-in">
            <h2 class="card-title">
                <i class="fas fa-user-graduate"></i> Student Grades
            </h2>
            
            <div style="overflow-x: auto;">
                <table class="student-list-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Grade Level</th>
                            <th>Class</th>
                            <th>Status</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <?php
                            $has_submission = !empty($student['submission_data']);
                            $is_graded = !empty($student['points_earned']);
                            $is_selected = $selected_student_id == $student['id'];
                            
// Determine grade display
if ($is_graded) {
    $grade_display = $student['points_earned'] . '/' . $activity['max_points'];
    $grade_class = 'graded';
    $status_text = 'Graded';
} elseif ($has_submission) {
    $grade_display = 'N/A';
    $grade_class = 'not-graded';
    $status_text = 'Submitted';
} else {
    $grade_display = 'N/A';
    $grade_class = 'not-submitted';
    $status_text = 'Not Submitted';
}
                            ?>
                            
                            <tr class="<?php echo $is_selected ? 'selected' : ''; ?>">
                                <td class="student-name-cell">
                                    <?php echo htmlspecialchars($student['full_name']); ?>
                                </td>
                                <td class="student-info-cell">
                                    <?php echo $student['grade_level']; ?>
                                </td>
                                <td class="student-info-cell">
                                    <?php echo htmlspecialchars($student['class_name'] ?: 'N/A'); ?>
                                </td>
                                <td class="student-info-cell">
                                    <?php echo $status_text; ?>
                                    <?php if ($student['submission_date'] && $has_submission): ?>
                                    <br><small style="color: #888;"><?php echo formatDate($student['submission_date']); ?></small>
                                    <?php endif; ?>
                                </td>
                                <td class="grade-cell <?php echo $grade_class; ?>">
                                    <?php echo $grade_display; ?>
                                </td>
                                <td>
                                    <a href="?activity_id=<?php echo $activity_id; ?>&student_id=<?php echo $student['id']; ?>" 
                                       class="action-link">
                                        <i class="fas fa-edit"></i> <?php echo $has_submission ? 'Grade' : 'View'; ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- STUDENT SUBMISSION & GRADING -->
        <?php if ($selected_student): ?>
        <div class="card fade-in">
            <h2 class="card-title">
                <i class="fas fa-user-check"></i> 
                <?php echo htmlspecialchars($selected_student['full_name']); ?>
                <?php if (!empty($selected_student['points_earned'])): ?>
                    <span style="font-size: 1.2rem; margin-left: 10px; <?php echo getGradeColor($selected_student['points_earned'], $activity['max_points']); ?>">
                        (<?php echo $selected_student['points_earned']; ?>/<?php echo $activity['max_points']; ?>)
                    </span>
                    <?php echo getGradeBadge($selected_student['points_earned'], $activity['max_points']); ?>
                <?php endif; ?>
            </h2>
            
            <!-- SUBMISSION DISPLAY -->
            <div class="submission-content">
                <?php if ($selected_submission): ?>
                    <h4 style="color: var(--primary-blue); margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-folder-open"></i> Submitted Work
                        <span style="font-size: 0.9rem; color: #666; margin-left: auto;">
                            Submitted: <?php echo formatDate($selected_submission['submitted_at']); ?>
                        </span>
                    </h4>
                    
                    <?php if (isset($selected_submission['files']) && !empty($selected_submission['files'])): ?>
                        <h5 style="color: #666; margin-top: 20px; margin-bottom: 15px;">
                            <i class="fas fa-file-upload"></i> Uploaded Files 
                            (<?php echo $selected_submission['text_count'] + $selected_submission['image_count']; ?>)
                        </h5>
                        
                        <?php foreach ($selected_submission['files'] as $file): ?>
                            <div class="file-display">
                                <div class="file-header">
                                    <div class="file-icon">
                                        <i class="fas fa-<?php echo getFileIcon($file['our_name']); ?>"></i>
                                    </div>
                                    <div class="file-info">
                                        <div class="file-name"><?php echo htmlspecialchars($file['our_name']); ?></div>
                                        <div class="file-size">
                                            Original: <?php echo htmlspecialchars($file['original_name']); ?> • 
                                            Size: <?php echo formatFileSize($file['size']); ?> • 
                                            Type: <?php echo ucfirst($file['type']); ?>
                                        </div>
                                    </div>
                                    <a href="<?php echo htmlspecialchars($file['path']); ?>" target="_blank" class="yellow-btn">
                                        <i class="fas fa-<?php echo ($file['type'] === 'image') ? 'eye' : 'download'; ?>"></i> 
                                        <?php echo ($file['type'] === 'image') ? 'View' : 'Download'; ?>
                                    </a>
                                </div>
                                
                                <!-- FILE PREVIEW -->
                                <?php 
                                $file_extension = strtolower(pathinfo($file['our_name'], PATHINFO_EXTENSION));
                                if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp']) && file_exists($file['path'])): ?>
                                    <img src="<?php echo htmlspecialchars($file['path']); ?>" 
                                         alt="<?php echo htmlspecialchars($file['original_name']); ?>"
                                         class="file-preview">
                                <?php elseif ($file_extension === 'txt' && file_exists($file['path'])): ?>
                                    <div class="file-text-content">
                                        <?php 
                                        $content = file_get_contents($file['path']);
                                        echo htmlspecialchars(substr($content, 0, 5000));
                                        if (strlen($content) > 5000) echo '... (truncated)';
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <?php if (isset($selected_submission['website_links']) && !empty($selected_submission['website_links'])): ?>
                        <h5 style="color: #1976D2; margin-top: 20px; margin-bottom: 15px;">
                            <i class="fas fa-video"></i> Streaming Links 
                            (<?php echo count($selected_submission['website_links']); ?>)
                        </h5>
                        
                        <?php foreach ($selected_submission['website_links'] as $link): ?>
                            <div class="link-display">
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    <div style="font-size: 2rem; color: #1976D2;">
                                        <i class="<?php echo getWebsiteIcon($link['type']); ?>"></i>
                                    </div>
                                    <div style="flex: 1;">
                                        <div style="font-weight: bold; color: #333;">
                                            <?php echo ucfirst(str_replace('_', ' ', $link['type'])); ?> Link
                                        </div>
                                        <div style="color: #666; font-size: 0.9rem; word-break: break-all;">
                                            <?php echo htmlspecialchars($link['url']); ?>
                                        </div>
                                        <div style="color: #888; font-size: 0.85rem; margin-top: 5px;">
                                            Added: <?php echo formatDate($link['added']); ?>
                                        </div>
                                    </div>
                                    <a href="<?php echo htmlspecialchars($link['url']); ?>" target="_blank" class="yellow-btn">
                                        <i class="fas fa-external-link-alt"></i> Open
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <div style="margin-top: 20px; padding: 15px; background: #E8F5E9; border-radius: 10px; border: 2px solid #A5D6A7;">
                        <div style="color: #2E7D32; font-weight: bold; margin-bottom: 5px;">
                            <i class="fas fa-clipboard-check"></i> Submission Summary
                        </div>
                        <div style="color: #555;">
                            Total Items: <?php echo $selected_submission['total_items']; ?> • 
                            Text Files: <?php echo $selected_submission['text_count']; ?> • 
                            Images: <?php echo $selected_submission['image_count']; ?> • 
                            Links: <?php echo $selected_submission['link_count']; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div style="text-align: center; padding: 40px; color: #666;">
                        <i class="fas fa-inbox" style="font-size: 4rem; color: #FFD166; margin-bottom: 20px;"></i>
                        <h4 style="color: #FF9800;">No Submission Yet</h4>
                        <p>This student hasn't submitted any work for this activity.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- GRADING FORM -->
            <div class="grade-form">
                <h4 style="color: var(--primary-blue); margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-star"></i> Grade & Feedback
                </h4>
                
                <form method="POST" action="">
                    <input type="hidden" name="student_id" value="<?php echo $selected_student_id; ?>">
                    
                    <div class="max-points">
                        Maximum Points: <?php echo $activity['max_points']; ?>
                    </div>
                    
                    <div class="text-center mb-4">
                        <label for="points_earned" style="display: block; margin-bottom: 10px; font-weight: bold; color: var(--text-dark);">
                            Points Earned:
                        </label>
                        <input type="number" 
                               id="points_earned" 
                               name="points_earned" 
                               value="<?php echo !empty($selected_student['points_earned']) ? $selected_student['points_earned'] : 0; ?>"
                               min="0" 
                               max="<?php echo $activity['max_points']; ?>"
                               class="points-input form-control"
                               style="display: inline-block;">
                        <span style="font-size: 1.5rem; margin-left: 10px;">/ <?php echo $activity['max_points']; ?></span>
                    </div>
                    
                    <div class="mb-3">
                        <label for="feedback" style="font-weight: bold; color: var(--text-dark); margin-bottom: 10px; display: block;">
                            <i class="fas fa-comment"></i> Teacher Feedback:
                        </label>
                        <textarea id="feedback" 
                                  name="feedback" 
                                  class="form-control feedback-textarea"
                                  placeholder="Provide constructive feedback for the student..."><?php echo !empty($selected_student['feedback']) ? htmlspecialchars($selected_student['feedback']) : ''; ?></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" name="save_grade" class="action-btn">
                            <i class="fas fa-save"></i> Save Grade
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>

        <!-- BOTTOM BUTTONS -->
        <div class="bottom-buttons-container fade-in">
            <a href="teacher-dashboard.php" class="green-btn">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
            
            <form method="POST" action="teacher-dashboard.php" style="display: inline;">
                <button type="submit" name="logout" class="action-btn" style="background-color: #FF6B6B !important;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-refresh page every 60 seconds to check for new submissions
        setInterval(() => {
            if (!document.hidden) {
                console.log('Auto-refreshing grade page...');
                window.location.reload();
            }
        }, 60000);
        
        // Add keyboard shortcuts for grading
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 's') {
                e.preventDefault();
                const saveBtn = document.querySelector('button[name="save_grade"]');
                if (saveBtn) saveBtn.click();
            }
        });
        
        // Points input validation
        const pointsInput = document.getElementById('points_earned');
        if (pointsInput) {
            pointsInput.addEventListener('change', function() {
                const max = parseInt(this.max);
                const value = parseInt(this.value) || 0;
                
                if (value < 0) this.value = 0;
                if (value > max) this.value = max;
            });
        }
        
        // Auto-resize textarea
        const textarea = document.querySelector('.feedback-textarea');
        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
            
            // Trigger initial resize
            setTimeout(() => {
                textarea.style.height = 'auto';
                textarea.style.height = (textarea.scrollHeight) + 'px';
            }, 100);
        }
    </script>
</body>
</html>