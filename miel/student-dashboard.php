<?php
// student-dashboard.php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
    header('Location: login.php');
    exit();
}

// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username = 'root';
$password = 'AcadeV25!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get student profile
    $studentStmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $studentStmt->execute([$_SESSION['user_id']]);
    $student = $studentStmt->fetch(PDO::FETCH_ASSOC);
    
    $studentGrade = $student['grade_level'];
    
    // Get available quizzes for student's grade level (where student's grade is within quiz grade range)
    $quizStmt = $pdo->prepare("
        SELECT q.*, u.full_name as teacher_name 
        FROM quizzes q 
        JOIN users u ON q.teacher_id = u.id 
        WHERE q.id IN (
            SELECT quiz_id FROM questions GROUP BY quiz_id HAVING COUNT(*) > 0
        )
        AND q.grade_start <= :student_grade 
        AND q.grade_end >= :student_grade
        ORDER BY q.created_at DESC
    ");
    $quizStmt->execute([':student_grade' => $studentGrade]);
    $availableQuizzes = $quizStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get student's quiz scores
    $scoreStmt = $pdo->prepare("
        SELECT s.*, q.title as quiz_title, q.virtual_world, q.intelligence_type
        FROM scores s 
        JOIN quizzes q ON s.quiz_id = q.id 
        WHERE s.student_id = ? 
        ORDER BY s.completed_at DESC
    ");
    $scoreStmt->execute([$_SESSION['user_id']]);
    $studentQuizScores = $scoreStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get Available Activities for student's grade level (where student's grade is within activity grade range)
    $activitiesStmt = $pdo->prepare("
        SELECT a.*, u.full_name as teacher_name 
        FROM activities a 
        JOIN users u ON a.teacher_id = u.id 
        WHERE a.grade_start <= :student_grade 
        AND a.grade_end >= :student_grade
        ORDER BY a.created_at DESC
    ");
    $activitiesStmt->execute([':student_grade' => $studentGrade]);
    $availableActivities = $activitiesStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get Student's Activity Grades
    $studentActivityGrades = [];
    try {
        $tableCheck = $pdo->query("SHOW TABLES LIKE 'activity_grades'");
        if ($tableCheck->rowCount() > 0) {
            $activityGradesStmt = $pdo->prepare("
                SELECT ag.*, a.title as activity_title, a.activity_type, a.virtual_world, a.intelligence_type, a.max_points
                FROM activity_grades ag 
                JOIN activities a ON ag.activity_id = a.id 
                WHERE ag.student_id = ? 
                ORDER BY ag.graded_at DESC
            ");
            $activityGradesStmt->execute([$_SESSION['user_id']]);
            $studentActivityGrades = $activityGradesStmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        $studentActivityGrades = [];
    }
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Format date
function formatDate($date) {
    return date('M j, Y', strtotime($date));
}

// Get intelligence type name
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

// Get activity type name
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | MIEL - Multiple Intelligence E-Learning</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="mobile.css" media="screen">
    <style>
        /* ===== KID-FRIENDLY THEME ===== */
        :root {
            --primary-blue: #4A90E2;
            --secondary-green: #50C878;
            --accent-yellow: #FFD166;
            --background-light: #F8F9FF;
            --text-dark: #2C3E50;
            --shadow: 0 4px 12px rgba(0,0,0,0.1);
            --border-radius: 20px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
            color: var(--text-dark);
            padding: 0px;
            min-height: 100vh;
            position: relative;
            background: linear-gradient(135deg, #E3F2FD 0%, #F3E5F5 100%);
        }
        
        /* Tiled semi-opaque image background */
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
            font-family: 'Arial', sans-serif !important;
            font-weight: 300 !important;
        }

        .navbar-nav .nav-link {
            font-size: 1.0rem !important;
            color: #333 !important;
            transition: color 0.3s ease !important;
        }

        .navbar-nav .nav-link:hover {
            color: #4A90E2 !important;
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
            flex-grow: 0;
        }        
        
        /* ===== MIEL BANNER ===== */
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
        
        /* ===== DASHBOARD HEADER ===== */
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
            margin-top: -5px;
        }
        
        /* Grade level badge */
        .grade-badge {
            display: inline-block;
            background: var(--accent-yellow);
            color: var(--text-dark);
            padding: 5px 15px;
            border-radius: 30px;
            font-weight: bold;
            margin-top: 10px;
            font-size: 0.9rem;
        }
        
        .grade-badge i {
            margin-right: 5px;
            color: var(--primary-blue);
        }
        
        /* ===== HORIZONTAL SECTIONS ===== */
        .horizontal-sections {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        /* ===== CARD STYLES ===== */
        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            width: 100%;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
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
        
        /* ===== PROFILE SECTION ===== */
        .profile-section {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 20px;
            align-items: center;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            box-shadow: var(--shadow);
        }
        
        .profile-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .profile-info-item {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 3px solid #E0E0E0;
            transition: all 0.3s;
        }
        
        .profile-info-item:hover {
            transform: translateY(-3px);
            border-color: var(--primary-blue);
        }
        
        .profile-icon {
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
        
        .profile-details {
            flex: 1;
        }
        
        .profile-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 3px;
        }
        
        .profile-value {
            font-weight: bold;
            color: var(--text-dark);
            font-size: 1rem;
        }
        
        /* ===== QUIZ ICONS GRID ===== */
        .quiz-grid-section {
            width: 100%;
        }
        
        .quiz-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .quiz-icon {
            aspect-ratio: 1/1;
            background: #F8F9FF;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            border: 3px solid #E0E0E0;
            position: relative;
            overflow: hidden;
            min-height: 0;
        }
        
        .quiz-icon:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow);
        }
        
        .quiz-icon.not-taken {
            opacity: 0.6;
            background: #F0F0F0;
        }
        
        .quiz-icon.not-taken:hover {
            opacity: 0.8;
        }
        
        .icon-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--secondary-green);
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .icon-badge.not-taken {
            background: var(--accent-yellow);
            color: var(--text-dark);
        }
        
        .thumbnail-container {
            width: 60px;
            height: 60px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .thumbnail-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .icon-title {
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 5px;
            color: var(--text-dark);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 2.4em;
            line-height: 1.2em;
        }
        
        .icon-third-line {
            font-size: 0.8rem;
            color: #666;
            height: 1.2em;
            margin-top: 3px;
            font-style: italic;
        }
        
        .icon-score {
            font-size: 0.9rem;
            font-weight: bold;
            color: var(--secondary-green);
            margin-top: 5px;
        }
        
        /* ===== EMPTY STATES ===== */
        .empty-icon {
            aspect-ratio: 1/1;
            background: #F0F0F0;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            text-align: center;
            border: 3px dashed #DDD;
            color: #999;
        }
        
        .empty-icon i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .empty-text {
            font-size: 0.9rem;
        }
        
        /* ===== BADGES ===== */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            margin-left: 10px;
        }
        
        .badge-primary {
            background: var(--primary-blue);
            color: white;
        }
        
        .badge-success {
            background: var(--secondary-green);
            color: white;
        }
        
        /* ===== VIRTUAL WORLD SELECTOR STYLES ===== */
        .world-selector {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 15px;
            margin-top: 10px;
        }

        .world-option {
            background: #F8F9FF;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            padding: 10px 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 170px;
            height: 100%;
        }

        .world-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
        }

        .world-thumbnail {
            width: 100%;
            height: 120px;
            margin-bottom: 5px;
            border-radius: 10px;
            overflow: hidden;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .world-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .world-info {
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            width: 100%;
            padding: 0;
            margin: 0;
            justify-content: space-between;
            height: calc(100% - 90px);
        }

        .world-info h3 {
            font-size: 0.9rem;
            margin: 5px 0;
            color: var(--text-dark);
            line-height: 1.1;
            min-height: 1.8em;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            padding: 0;
            font-weight: bold;
        }

        .see-world-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            background-color: #FDD473;
            color: #2C3E50 !important;
            text-decoration: none;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: bold;
            transition: all 0.3s;
            margin-top: 4px;
            width: 100%;
            max-width: 100px;
            margin-left: auto;
            margin-right: auto;
            height: 30px;
            flex-shrink: 0;
        }

        .see-world-link:hover {
            background-color: #FA7C1F;
            transform: translateY(-2px);
            color: white !important;
            text-decoration: none;
        }

        .see-world-link i {
            font-size: 0.6rem;
        }
        
        /* ===== BOTTOM BUTTONS CONTAINER ===== */
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
        
        .red-btn {
            background-color: #FF6B6B !important;
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
        
        .red-btn:hover {
            background-color: #FF4757 !important;
            transform: translateY(-3px) !important;
        }
        
        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .miel-banner-container {
                padding: 10px;
                margin-bottom: 20px;
            }
            
            .card {
                padding: 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .quiz-grid,
            .world-selector {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(4, 1fr);
            }
            
            .profile-section {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .profile-avatar {
                margin: 0 auto;
            }
            
            .profile-info-grid {
                grid-template-columns: 1fr;
            }
            
            .bottom-buttons-container {
                flex-direction: column;
                gap: 10px;
                padding: 20px;
            }
            
            .bottom-buttons-container button {
                width: 100%;
                justify-content: center;
            }
            
            .world-option {
                min-height: 200px;
            }
            
            .world-thumbnail {
                height: 100px;
            }
            
            .see-world-link {
                padding: 5px 10px;
                font-size: 0.75rem;
                max-width: 110px;
            }
        }
        
        @media (max-width: 480px) {
            .quiz-grid,
            .world-selector {
                grid-template-columns: 1fr;
            }
            
            .world-option {
                min-height: 180px;
            }
            
            .world-thumbnail {
                height: 90px;
            }
        }
        
        /* ===== ANIMATIONS ===== */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .bounce {
            animation: bounce 0.5s ease infinite;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease;
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

    <!-- MIEL BANNER IMAGE -->
    <div class="miel-banner-container fade-in">
        <img src="miel-banner.png" alt="MIEL - Multiple Intelligence Experiential Learning System" class="miel-banner">
    </div>

    <div class="container">
        <!-- DASHBOARD HEADER -->
        <header class="dashboard-header fade-in">
            <div class="logo">
                <div>
                    <img src="images/student-dashboard.jpg" alt="Student Dashboard" style="max-width: 550px; height: auto;">
                    <p class="subtitle">Work on Quizzes and Activities and Track Your Progress</p>
                </div>
            </div>
            <div class="welcome-message">
                Hello, <strong><?php echo htmlspecialchars($student['full_name']); ?></strong>!
                <?php if ($student['class_name']): ?>
                <br><small>Class: <?php echo htmlspecialchars($student['class_name']); ?></small>
                <?php endif; ?>
            </div>
            <div class="grade-badge">
                <i class="fas fa-graduation-cap"></i> Your Grade Level: <?php echo $student['grade_level']; ?>
            </div>
        </header>

        <!-- HORIZONTAL SECTIONS -->
        <div class="horizontal-sections">
            <!-- PROFILE SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-user-circle"></i> My Profile
                </h2>
                
                <div class="profile-section">
                    <div class="profile-avatar">
                        <?php echo strtoupper(substr($student['full_name'], 0, 1)); ?>
                    </div>
                    
                    <div class="profile-info-grid">
                        <div class="profile-info-item">
                            <div class="profile-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="profile-details">
                                <div class="profile-label">Email</div>
                                <div class="profile-value"><?php echo htmlspecialchars($student['email']); ?></div>
                            </div>
                        </div>
                        
                        <div class="profile-info-item">
                            <div class="profile-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div class="profile-details">
                                <div class="profile-label">Role</div>
                                <div class="profile-value">Student</div>
                            </div>
                        </div>
                        
                        <div class="profile-info-item">
                            <div class="profile-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="profile-details">
                                <div class="profile-label">Grade Level</div>
                                <div class="profile-value">Grade <?php echo htmlspecialchars($student['grade_level']); ?></div>
                            </div>
                        </div>
                        
                        <div class="profile-info-item">
                            <div class="profile-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="profile-details">
                                <div class="profile-label">Member Since</div>
                                <div class="profile-value"><?php echo formatDate($student['created_at']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MY QUIZZES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-gamepad"></i> My Quizzes (Grade <?php echo $student['grade_level']; ?>)
                    <span class="badge badge-primary"><?php echo count($availableQuizzes); ?></span>
                </h2>
                
                <div class="quiz-grid-section">
                    <div class="quiz-grid">
                        <?php if (empty($availableQuizzes)): ?>
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">No Quiz Yet</div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            $displayQuizzes = array_slice($availableQuizzes, 0, 8);
                            $quizCount = 0;
                            ?>
                            <?php foreach ($displayQuizzes as $quiz): $quizCount++; 
                                $quizTaken = false;
                                $quizScore = null;
                                foreach ($studentQuizScores as $score) {
                                    if ($score['quiz_id'] == $quiz['id']) {
                                        $quizTaken = true;
                                        $quizScore = $score['score'];
                                        break;
                                    }
                                }
                                
                                $intelligenceType = $quiz['intelligence_type'];
                                $iconImage = "images/quiz-{$intelligenceType}.png";
                                $defaultIcon = "images/default.jpg";
                                $quizIcon = file_exists($iconImage) ? $iconImage : $defaultIcon;
                                
                                // Determine which quiz file to use based on type
                                $quizFile = ($quiz['type'] == 'inworld') ? 'take-quiz2.php' : 'take-quiz.php';
                            ?>
                            <div class="quiz-icon <?php echo !$quizTaken ? 'not-taken' : ''; ?>" 
                                 onclick="<?php echo $quizTaken ? 'reviewQuiz(\'' . $quizFile . '\', ' . $quiz['id'] . ')' : 'takeQuiz(\'' . $quizFile . '\', ' . $quiz['id'] . ')'; ?>">
                                <div class="icon-badge <?php echo !$quizTaken ? 'not-taken' : ''; ?>"><?php echo $quizCount; ?></div>
                                <div class="thumbnail-container">
                                    <img src="<?php echo $quizIcon; ?>" alt="<?php echo getIntelligenceName($intelligenceType); ?>">
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars(substr($quiz['title'], 0, 20)); ?>
                                    <?php if (strlen($quiz['title']) > 20): ?>...<?php endif; ?>
                                </div>
                                <?php if ($quizTaken && $quizScore !== null): ?>
                                <div class="icon-score" style="color: <?php echo $quizScore >= 80 ? '#50C878' : ($quizScore >= 60 ? '#FF9800' : '#FF6B6B'); ?>;">
                                    <?php echo number_format($quizScore, 1); ?>%
                                </div>
                                <?php else: ?>
                                <div class="icon-third-line">Not Started</div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php for ($i = $quizCount + 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Coming Soon</div>
                            </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- MY ACTIVITIES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-tasks"></i> My Activities (Grade <?php echo $student['grade_level']; ?>)
                    <span class="badge badge-primary"><?php echo count($availableActivities); ?></span>
                </h2>
                
                <div class="quiz-grid-section">
                    <div class="quiz-grid">
                        <?php if (empty($availableActivities)): ?>
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">No Activity Yet</div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            $displayActivities = array_slice($availableActivities, 0, 8);
                            $activityCount = 0;
                            ?>
                            <?php foreach ($displayActivities as $activity): $activityCount++; 
                                $activityGraded = false;
                                $activityPoints = null;
                                $maxPoints = $activity['max_points'] ?? 100;
                                foreach ($studentActivityGrades as $grade) {
                                    if ($grade['activity_id'] == $activity['id']) {
                                        $activityGraded = true;
                                        $activityPoints = $grade['points_earned'];
                                        $maxPoints = $grade['max_points'] ?? $maxPoints;
                                        break;
                                    }
                                }
                                
                                $intelligenceType = $activity['intelligence_type'];
                                $iconImage = "images/activity-{$intelligenceType}.png";
                                $defaultIcon = "images/default.jpg";
                                $activityIcon = file_exists($iconImage) ? $iconImage : $defaultIcon;
                            ?>
                            <div class="quiz-icon" onclick="viewActivity(<?php echo $activity['id']; ?>)">
                                <div class="icon-badge"><?php echo $activityCount; ?></div>
                                <div class="thumbnail-container">
                                    <img src="<?php echo $activityIcon; ?>" alt="<?php echo getIntelligenceName($intelligenceType); ?>">
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars(substr($activity['title'], 0, 20)); ?>
                                    <?php if (strlen($activity['title']) > 20): ?>...<?php endif; ?>
                                </div>
                                <?php if ($activityGraded && $activityPoints !== null): ?>
                                <?php 
                                    $percentage = ($activityPoints / $maxPoints) * 100;
                                    $color = $percentage >= 80 ? '#50C878' : ($percentage >= 60 ? '#FF9800' : '#FF6B6B');
                                ?>
                                <div class="icon-score" style="color: <?php echo $color; ?>;">
                                    <?php echo $activityPoints; ?>/<?php echo $maxPoints; ?> pts
                                </div>
                                <?php else: ?>
                                <div class="icon-third-line">Not Started</div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php for ($i = $activityCount + 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Coming Soon</div>
                            </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- EXPLORE ARVILLE WORLDS SECTION - USING REUSABLE COMPONENT -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-globe-americas"></i> Explore ARville Worlds
                    <span class="badge badge-success">16</span>
                </h2>
                
                <div id="virtual-world-selector-container"></div>
            </div>
        </div>

        <!-- BOTTOM BUTTONS CONTAINER -->
        <div class="bottom-buttons-container fade-in">
            <form method="POST" action="student-dashboard.php" style="display: inline;">
                <button type="submit" name="logout" class="red-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="virtual-world-selector.js"></script>
    <script>
        // Global variable to store world data from the selector
        let worldSelectorInstance = null;

        // Initialize Virtual World Selector with click handling
        document.addEventListener('DOMContentLoaded', function() {
            try {
                worldSelectorInstance = new VirtualWorldSelector({
                    containerId: 'virtual-world-selector-container',
                    displayOnly: false, // Allow clicking
                    onWorldChange: function(worldKey, worldData) {
                        // This function is called when a world is selected/clicked
                        console.log('World clicked - Key:', worldKey, 'Name:', worldData.name, 'Link:', worldData.link);
                        
                        // Open the world in a new tab using the link from worldData
                        if (worldData && worldData.link) {
                            console.log('Opening URL:', worldData.link);
                            window.open(worldData.link, '_blank');
                        } else {
                            console.error('No link found for world:', worldData);
                            alert('This world link is not available yet.');
                        }
                    }
                });
                console.log('Virtual World Selector initialized with click handling');
                
                // Function to open a world by its name (useful for quiz links)
                window.openWorldByName = function(worldName) {
                    if (!worldSelectorInstance || !worldSelectorInstance.worlds) {
                        console.error('World selector not initialized');
                        return false;
                    }
                    
                    // Find the world by its name
                    for (const [key, worldData] of Object.entries(worldSelectorInstance.worlds)) {
                        if (worldData.name === worldName) {
                            console.log('Found world:', worldName, 'with URL:', worldData.link);
                            if (worldData.link) {
                                window.open(worldData.link, '_blank');
                                return true;
                            }
                        }
                    }
                    
                    console.error('World not found with name:', worldName);
                    return false;
                };
                
            } catch (error) {
                console.error('Error initializing Virtual World Selector:', error);
            }
        });

        // Quiz functions - updated to accept quiz file parameter
        function takeQuiz(quizFile, quizId) {
            window.location.href = `${quizFile}?quiz_id=${quizId}`;
        }
        
        function reviewQuiz(quizFile, quizId) {
            window.location.href = `${quizFile}?quiz_id=${quizId}`;
        }
        
        // Activity functions
        function viewActivity(activityId) {
            window.location.href = `do-activity.php?activity_id=${activityId}`;
        }
        
        // Auto-refresh every 30 seconds
        setInterval(() => {
            console.log('Auto-refreshing student dashboard...');
        }, 30000);
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'r') {
                e.preventDefault();
                window.location.reload();
            }
            
            if (e.key === 'Escape') {
                if (confirm('Are you sure you want to logout?')) {
                    document.querySelector('button[name="logout"]').click();
                }
            }
        });
        
        // Add hover effects
        document.querySelectorAll('.quiz-icon').forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Profile item hover effect
        document.querySelectorAll('.profile-info-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Make MIEL banner image interactive
        const mielBanner = document.querySelector('.miel-banner');
        if (mielBanner) {
            mielBanner.addEventListener('click', function() {
                this.classList.toggle('bounce');
                alert('MIEL - Multiple Intelligence Experiential Learning\nPersonalized learning for every student!');
                
                setTimeout(() => {
                    this.classList.remove('bounce');
                }, 500);
            });
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>