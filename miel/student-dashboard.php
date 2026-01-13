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
    
    // Get available quizzes for student's grade level
    $quizStmt = $pdo->prepare("
        SELECT q.*, u.full_name as teacher_name 
        FROM quizzes q 
        JOIN users u ON q.teacher_id = u.id 
        WHERE q.id IN (
            SELECT quiz_id FROM questions GROUP BY quiz_id HAVING COUNT(*) > 0
        )
        ORDER BY q.created_at DESC
    ");
    $quizStmt->execute();
    $availableQuizzes = $quizStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get student's quiz scores (renamed from My Scores to My Quiz Scores)
    $scoreStmt = $pdo->prepare("
        SELECT s.*, q.title as quiz_title, q.virtual_world, q.intelligence_type
        FROM scores s 
        JOIN quizzes q ON s.quiz_id = q.id 
        WHERE s.student_id = ? 
        ORDER BY s.completed_at DESC
    ");
    $scoreStmt->execute([$_SESSION['user_id']]);
    $studentQuizScores = $scoreStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get all quizzes for score comparison
    $allQuizzesStmt = $pdo->prepare("SELECT id, title FROM quizzes");
    $allQuizzesStmt->execute();
    $allQuizzes = $allQuizzesStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // ===== NEW: Get Available Activities =====
    // Simplified query - just get basic activity info
    $activitiesStmt = $pdo->prepare("
        SELECT a.*, u.full_name as teacher_name 
        FROM activities a 
        JOIN users u ON a.teacher_id = u.id 
        ORDER BY a.created_at DESC
    ");
    $activitiesStmt->execute();
    $availableActivities = $activitiesStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // ===== NEW: Get Student's Activity Grades =====
    // Check if activity_grades table exists, if not, return empty array
    $studentActivityGrades = [];
    try {
        // First check if the table exists
        $tableCheck = $pdo->query("SHOW TABLES LIKE 'activity_grades'");
        if ($tableCheck->rowCount() > 0) {
            $activityGradesStmt = $pdo->prepare("
                SELECT ag.*, a.title as activity_title, a.activity_type, a.virtual_world, a.intelligence_type
                FROM activity_grades ag 
                JOIN activities a ON ag.activity_id = a.id 
                WHERE ag.student_id = ? 
                ORDER BY ag.graded_at DESC
            ");
            $activityGradesStmt->execute([$_SESSION['user_id']]);
            $studentActivityGrades = $activityGradesStmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        // If table doesn't exist, just continue with empty array
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

// Get intelligence icon
function getIntelligenceIcon($type) {
    $icons = [
        'linguistic' => 'book',
        'logical' => 'calculator',
        'spatial' => 'palette',
        'kinesthetic' => 'running',
        'musical' => 'music',
        'interpersonal' => 'users',
        'intrapersonal' => 'user',
        'naturalist' => 'leaf'
    ];
    return $icons[$type] ?? 'question-circle';
}

// Get world name
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

// Get world icon
function getWorldIcon($world) {
    $icons = [
        'zoo' => 'paw',
        'museum' => 'landmark',
        'forest' => 'tree',
        'ocean' => 'water',
        'farm' => 'tractor',
        'space' => 'rocket',
        'city' => 'city',
        'arctic' => 'icicles'
    ];
    return $icons[$world] ?? 'globe';
}

// ===== NEW: Get activity type name =====
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

// ===== NEW: Get activity type icon =====
function getActivityTypeIcon($type) {
    $icons = [
        'essay' => 'file-alt',
        'project' => 'tasks',
        'presentation' => 'presentation',
        'experiment' => 'flask',
        'performance' => 'theater-masks',
        'portfolio' => 'briefcase'
    ];
    return $icons[$type] ?? 'file-alt';
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
    <style>
        /* ===== KID-FRIENDLY THEME (SAME AS teacher-dashboard.php) ===== */
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
            /* Fallback gradient background */
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
            opacity: 0.9; /* Full opacity for the image */
            z-index: -1; /* Lower z-index than the overlay */
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(248, 249, 255, 0.3); /* Reduced from 0.85 to 0.3 */
            z-index: -3; /* Higher z-index than the image */
        }
        
        .container {
            max-width: 800px; /* SAME WIDTH AS create-quiz.php */
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .navbar {
            margin-bottom: 30px;
        }
        
        .navbar {
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
        
        .bottom-buttons-container {
            margin-bottom: 30px !important; /* Adjust this value as needed */
        }

        /* ===== MIEL BANNER ===== */
        .miel-banner-container {
            text-align: center;
            margin-bottom: 30px;
            padding: 0;
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .miel-banner {
            width: 100%;
            height: auto;
            display: block;
        }
        
        /* ===== MIEL HEADER (KEPT FOR REFERENCE BUT NOT USED) ===== */
        .miel-header {
            text-align: center;
            margin-bottom: 30px;
            padding: 25px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 5px solid var(--primary-blue);
            position: relative;
            overflow: hidden;
        }
        
        .miel-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, 
                #4A90E2 0%, /* Blue */
                #50C878 25%, /* Green */
                #FFD166 50%, /* Yellow */
                #FF6B6B 75%, /* Red */
                #9C27B0 100% /* Purple */
            );
        }
        
        .miel-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .miel-logo-image {
            max-width: 200px;
            height: auto;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        
        .miel-logo-image:hover {
            transform: scale(1.05);
        }
        
        .miel-subtitle {
            font-size: 1.4rem;
            color: var(--secondary-green);
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .miel-tagline {
            color: #666;
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto 15px;
            line-height: 1.4;
        }
        
        .miel-intelligence-icons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
        }
        
        .intelligence-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #F8F9FF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary-blue);
            border: 2px solid #E0E0E0;
            transition: all 0.3s;
        }
        
        .intelligence-icon:hover {
            transform: scale(1.1);
            border-color: var(--primary-blue);
            background: white;
            box-shadow: var(--shadow);
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
        }
        
        .welcome-message {
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-top: 10px;
        }
        
        /* ===== HORIZONTAL SECTIONS ===== */
        .horizontal-sections {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        /* ===== CARD STYLES (SAME AS teacher-dashboard.php) ===== */
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
        
        .icon-main {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--primary-blue);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(74, 144, 226, 0.1);
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
        
        .icon-meta {
            font-size: 0.8rem;
            color: #666;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 2.4em;
            line-height: 1.2em;
        }
        
        .icon-score {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--secondary-green);
            margin-top: 5px;
        }
        
        /* ===== SCORES SECTION ===== */
        .scores-section {
            width: 100%;
        }
        
        /* ===== EMPTY STATES ===== */
        .empty-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 15px;
        }
        
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
        
        .badge-warning {
            background: var(--accent-yellow);
            color: var(--text-dark);
        }
        
        /* ===== STANDARDIZED BUTTON STYLES ===== */
        /* Blue functional buttons -> Yellow on hover */
        .action-btn {
            flex: 0 0 auto;
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
            background-color: #4A90E2 !important; /* BLUE for functional buttons */
        }
        
        .action-btn:hover {
            background-color: #FFD166 !important; /* YELLOW on hover */
            transform: translateY(-3px);
            color: #2C3E50 !important;
        }
        
        /* Override specific button colors to be blue */
        .action-btn-primary,
        .action-btn-success,
        .action-btn-warning {
            background-color: #4A90E2 !important; /* All functional buttons BLUE */
        }
        
        .action-btn-primary:hover,
        .action-btn-success:hover,
        .action-btn-warning:hover {
            background-color: #FFD166 !important; /* All functional buttons YELLOW on hover */
            color: #2C3E50 !important;
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
        
        /* Green button for "Back to Dashboard" */
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
        
        /* Red button for logout */
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
        
        /* Hide original logout section */
        .logout-section {
            display: none !important;
        }
        
        /* ===== MOBILE RESPONSIVE (SAME AS teacher-dashboard.php) ===== */
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
            .empty-grid {
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
            
            .action-buttons {
                flex-direction: column;
            }
            
            .action-btn {
                width: 100%;
            }
            
            /* Bottom buttons on mobile */
            .bottom-buttons-container {
                flex-direction: column;
                gap: 10px;
                padding: 20px;
            }
            
            .bottom-buttons-container button,
            .bottom-buttons-container a {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .quiz-grid,
            .empty-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(4, 1fr);
            }
        }
        
        /* ===== ANIMATIONS (SAME AS teacher-dashboard.php) ===== */
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
        
        @keyframes rainbow {
            0% { color: #4A90E2; }
            25% { color: #50C878; }
            50% { color: #FFD166; }
            75% { color: #FF6B6B; }
            100% { color: #9C27B0; }
        }
        
        .rainbow {
            animation: rainbow 3s ease infinite;
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="plans.php">Plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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
                <i class="fas fa-graduation-cap logo-icon bounce"></i>
                <div>
                    <h1>Student Dashboard</h1>
                    <p class="subtitle">Explore Quizzes & Track Your Progress</p>
                </div>
            </div>
            <div class="welcome-message">
                Hello, <strong><?php echo htmlspecialchars($student['full_name']); ?></strong>!
                <?php if ($student['class_name']): ?>
                <br><small>Class: <?php echo htmlspecialchars($student['class_name']); ?></small>
                <?php endif; ?>
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

            <!-- AVAILABLE QUIZZES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-gamepad"></i> Available Quizzes
                    <span class="badge badge-primary"><?php echo count($availableQuizzes); ?></span>
                </h2>
                
                <div class="quiz-grid-section">
                    <div class="quiz-grid">
                        <?php if (empty($availableQuizzes)): ?>
                            <!-- Show 8 empty placeholders -->
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Quiz <?php echo $i; ?></div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            // Show up to 8 quizzes
                            $displayQuizzes = array_slice($availableQuizzes, 0, 8);
                            $quizCount = 0;
                            ?>
                            <?php foreach ($displayQuizzes as $quiz): $quizCount++; ?>
                            <div class="quiz-icon" onclick="takeQuiz(<?php echo $quiz['id']; ?>)">
                                <div class="icon-badge"><?php echo $quizCount; ?></div>
                                <div class="icon-main">
                                    <i class="fas fa-<?php echo getWorldIcon($quiz['virtual_world']); ?>"></i>
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars(substr($quiz['title'], 0, 20)); ?>
                                    <?php if (strlen($quiz['title']) > 20): ?>...<?php endif; ?>
                                </div>
                                <div class="icon-meta">
                                    <i class="fas fa-<?php echo getIntelligenceIcon($quiz['intelligence_type']); ?>"></i>
                                    <?php echo getIntelligenceName($quiz['intelligence_type']); ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php // Fill remaining slots with placeholders ?>
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

            <!-- ===== NEW: AVAILABLE ACTIVITIES SECTION ===== -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-tasks"></i> Available Activities
                    <span class="badge badge-primary"><?php echo count($availableActivities); ?></span>
                </h2>
                
                <div class="scores-section">
                    <div class="quiz-grid">
                        <?php if (empty($availableActivities)): ?>
                            <!-- Show 8 empty placeholders -->
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Activity <?php echo $i; ?></div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            // Show up to 8 activities
                            $displayActivities = array_slice($availableActivities, 0, 8);
                            $activityCount = 0;
                            ?>
                            <?php foreach ($displayActivities as $activity): $activityCount++; ?>
                            <div class="quiz-icon" onclick="viewActivity(<?php echo $activity['id']; ?>)">
                                <div class="icon-badge"><?php echo $activityCount; ?></div>
                                <div class="icon-main">
                                    <i class="fas fa-<?php echo getActivityTypeIcon($activity['activity_type']); ?>"></i>
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars(substr($activity['title'], 0, 20)); ?>
                                    <?php if (strlen($activity['title']) > 20): ?>...<?php endif; ?>
                                </div>
                                <div class="icon-meta">
                                    <i class="fas fa-<?php echo getWorldIcon($activity['virtual_world']); ?>"></i>
                                    <?php echo getActivityTypeName($activity['activity_type']); ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php // Fill remaining slots with placeholders ?>
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

            <!-- ===== RENAMED: MY QUIZ SCORES SECTION ===== -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-chart-line"></i> My Quiz Scores
                    <span class="badge badge-primary"><?php echo count($studentQuizScores); ?></span>
                </h2>
                
                <div class="scores-section">
                    <div class="quiz-grid">
                        <?php if (empty($allQuizzes)): ?>
                            <!-- Show 8 empty placeholders -->
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-chart-bar"></i>
                                <div class="empty-text">Test <?php echo $i; ?></div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            // Create a map of quiz IDs to scores for easy lookup
                            $scoreMap = [];
                            foreach ($studentQuizScores as $score) {
                                $scoreMap[$score['quiz_id']] = $score;
                            }
                            
                            // Show up to 8 quizzes
                            $displayQuizzes = array_slice($allQuizzes, 0, 8);
                            $quizCount = 0;
                            ?>
                            
                            <?php foreach ($displayQuizzes as $quiz): $quizCount++; ?>
                                <?php 
                                $hasScore = isset($scoreMap[$quiz['id']]);
                                $score = $hasScore ? $scoreMap[$quiz['id']] : null;
                                ?>
                                <div class="quiz-icon <?php echo $hasScore ? '' : 'not-taken'; ?>" 
                                     onclick="<?php echo $hasScore ? 'reviewQuiz(' . $quiz['id'] . ')' : 'takeQuiz(' . $quiz['id'] . ')'; ?>">
                                    <div class="icon-badge <?php echo $hasScore ? '' : 'not-taken'; ?>">
                                        <?php echo $hasScore ? '&#10003;' : '?'; ?>
                                    </div>
                                    <div class="icon-main">
                                        <i class="fas fa-<?php echo $hasScore ? 'trophy' : 'clipboard'; ?>"></i>
                                    </div>
                                    <div class="icon-title">
                                        <?php echo htmlspecialchars(substr($quiz['title'], 0, 20)); ?>
                                        <?php if (strlen($quiz['title']) > 20): ?>...<?php endif; ?>
                                    </div>
                                    <?php if ($hasScore): ?>
                                    <div class="icon-score">
                                        <?php echo $score['score']; ?>%
                                    </div>
                                    <?php else: ?>
                                    <div class="icon-meta">
                                        <i class="fas fa-play-circle"></i> Not Taken
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            
                            <?php // Fill remaining slots with placeholders ?>
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

            <!-- ===== NEW: MY ACTIVITY GRADES SECTION ===== -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-star"></i> My Activity Grades
                    <span class="badge badge-primary"><?php echo count($studentActivityGrades); ?></span>
                </h2>
                
                <div class="scores-section">
                    <div class="quiz-grid">
                        <?php if (empty($studentActivityGrades)): ?>
                            <!-- Show 8 empty placeholders -->
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-star"></i>
                                <div class="empty-text">Activity <?php echo $i; ?></div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            // Show up to 8 activity grades
                            $displayActivityGrades = array_slice($studentActivityGrades, 0, 8);
                            $activityGradeCount = 0;
                            ?>
                            
                            <?php foreach ($displayActivityGrades as $grade): $activityGradeCount++; ?>
                                <div class="quiz-icon" onclick="reviewActivity(<?php echo $grade['activity_id']; ?>)">
                                    <div class="icon-badge"><?php echo $activityGradeCount; ?></div>
                                    <div class="icon-main">
                                        <i class="fas fa-<?php echo getActivityTypeIcon($grade['activity_type']); ?>"></i>
                                    </div>
                                    <div class="icon-title">
                                        <?php echo htmlspecialchars(substr($grade['activity_title'], 0, 20)); ?>
                                        <?php if (strlen($grade['activity_title']) > 20): ?>...<?php endif; ?>
                                    </div>
                                    <div class="icon-score">
                                        <?php echo $grade['points_earned']; ?>/<?php echo $grade['max_points']; ?>
                                    </div>
                                    <div class="icon-meta">
                                        <i class="fas fa-<?php echo getWorldIcon($grade['virtual_world']); ?>"></i>
                                        Grade: <?php echo number_format(($grade['points_earned'] / $grade['max_points']) * 100, 0); ?>%
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                            <?php // Fill remaining slots with placeholders ?>
                            <?php for ($i = $activityGradeCount + 1; $i <= 8; $i++): ?>
                            <div class="empty-icon">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Coming Soon</div>
                            </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>
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
    <script>
        // Quiz functions
        function takeQuiz(quizId) {
            window.location.href = `take-quiz.php?quiz_id=${quizId}`;
        }
        
        function reviewQuiz(quizId) {
            window.location.href = `review-quiz.php?quiz_id=${quizId}`;
        }
        
        // ===== NEW: Activity functions =====
        function viewActivity(activityId) {
            window.location.href = `do-activity.php?activity_id=${activityId}`;
        }
        
        function reviewActivity(activityId) {
            window.location.href = `review-activity.php?activity_id=${activityId}`;
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
                
                // Remove bounce class after animation completes
                setTimeout(() => {
                    this.classList.remove('bounce');
                }, 500);
            });
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>