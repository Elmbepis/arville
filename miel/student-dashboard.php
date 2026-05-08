<?php
// student-dashboard.php - WITH EXTENSIVE DEBUGGING
session_name('MIEL_SESSION');
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

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create debug log array
$debugLog = [];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get student profile
    $studentStmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $studentStmt->execute([$_SESSION['user_id']]);
    $student = $studentStmt->fetch(PDO::FETCH_ASSOC);
    
    $studentGrade = $student['grade_level'];
    
    // Get available quizzes
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
    
    // Get Available Activities
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

// ==================== COMMON FUNCTIONS ====================
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

// Get intelligence icon image (for activities)
function getIntelligenceImage($type) {
    $imagePath = "images/mi-{$type}.png";
    if (!file_exists($imagePath)) {
        $imagePath = "images/mi-{$type}.png";
    }
    if (!file_exists($imagePath)) {
        $imagePath = "images/default.jpg";
    }
    return $imagePath;
}

// Get virtual world image path by reading virtual-world-selector.js
function getVirtualWorldImage($worldName, &$debug = null) {
    $debugInfo = [];
    $debugInfo['input_world_name'] = $worldName;
    
    // Read the virtual-world-selector.js file
    $jsFile = 'virtual-world-selector.js';
    $debugInfo['js_file_path'] = $jsFile;
    $debugInfo['js_file_exists'] = file_exists($jsFile);
    
    if (!file_exists($jsFile)) {
        if ($debug !== null) $debug['error'] = "JS file not found";
        return "images/default-world.jpg";
    }
    
    $jsContent = file_get_contents($jsFile);
    $debugInfo['js_file_size'] = strlen($jsContent) . " bytes";
    
    // Extract world data: 'key': { name: 'World Name', image: 'filename.jpg',
    preg_match_all("/'([^']+)'\s*:\s*\{\s*name:\s*'([^']+)',\s*image:\s*'([^']+)',/", $jsContent, $matches, PREG_SET_ORDER);
    
    $debugInfo['worlds_found'] = count($matches);
    $debugInfo['matches_checked'] = [];
    
    // Loop through to find matching world name
    $foundKey = null;
    $foundImage = null;
    
    foreach ($matches as $index => $match) {
        $key = $match[1];
        $name = $match[2];
        $image = $match[3];
        
        $debugInfo['matches_checked'][] = [
            'key' => $key,
            'name_in_js' => $name,
            'image' => $image,
            'matches' => ($name === $worldName) ? 'YES' : 'NO'
        ];
        
        if ($name === $worldName) {
            $foundKey = $key;
            $foundImage = $image;
            break;
        }
    }
    
    $debugInfo['found_key'] = $foundKey;
    $debugInfo['found_image'] = $foundImage;
    
    if ($foundImage) {
        $imagePath = "images/" . $foundImage;
        $debugInfo['final_path'] = $imagePath;
        $debugInfo['file_exists'] = file_exists($imagePath);
        
        if ($debug !== null) {
            $debug = $debugInfo;
        }
        
        if (file_exists($imagePath)) {
            return $imagePath;
        }
    }
    
    // Fallback
    $fallbackPath = "images/default-world.jpg";
    $debugInfo['fallback_used'] = true;
    $debugInfo['fallback_path'] = $fallbackPath;
    
    if ($debug !== null) {
        $debug = $debugInfo;
    }
    
    return $fallbackPath;
}

// Get virtual world display name
function getVirtualWorldName($world) {
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
    return $names[strtolower($world)] ?? ucfirst($world);
}

// ==================== QUIZ-SPECIFIC FUNCTIONS ====================
function getQuizIntelligenceImage($type) {
    $imagePath = "images/mi-{$type}.png";
    if (!file_exists($imagePath)) {
        $imagePath = "images/default.jpg";
    }
    return $imagePath;
}

function getQuizWorldImage($worldName, &$debug = null) {
    $jsFile = 'virtual-world-selector.js';
    if (!file_exists($jsFile)) {
        return "images/default-world.jpg";
    }
    
    $jsContent = file_get_contents($jsFile);
    preg_match_all("/'([^']+)'\s*:\s*\{\s*name:\s*'([^']+)',\s*image:\s*'([^']+)',/", $jsContent, $matches, PREG_SET_ORDER);
    
    foreach ($matches as $match) {
        $name = $match[2];
        $image = $match[3];
        
        if ($name === $worldName) {
            $imagePath = "images/" . $image;
            if (file_exists($imagePath)) {
                return $imagePath;
            }
        }
    }
    
    return "images/default-world.jpg";
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
            max-width: 1000px;
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
        
        .horizontal-sections {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 30px;
        }
        
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
        
        .quiz-grid-section {
            width: 100%;
        }
        
        .quiz-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .quiz-icon {
            aspect-ratio: 0.75 / 1;
            background: #F8F9FF;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 15px 12px;
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
        
        /* Combined icon container - Virtual World with MI badge overlay (for activities) */
        .combined-icon-container {
            position: relative;
            display: inline-block;
            width: 100px;
            height: 100px;
            margin-bottom: 8px;
        }
        
        .virtual-world-icon {
            width: 100%;
            height: 100%;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            border: 2px solid white;
        }
        
        .mi-badge-overlay {
            position: absolute;
            bottom: -6px;
            right: -6px;
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            border: 2px solid white;
            overflow: hidden;
        }
        
        .mi-badge-overlay img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        
        /* Quiz combined icon container */
        .quiz-combined-icon-container {
            position: relative;
            display: inline-block;
            width: 100px;
            height: 100px;
            margin-bottom: 8px;
        }
        
        .quiz-virtual-world-icon {
            width: 100%;
            height: 100%;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            border: 2px solid white;
        }
        
        .quiz-mi-badge-overlay {
            position: absolute;
            bottom: -6px;
            right: -6px;
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            border: 2px solid white;
            overflow: hidden;
        }
        
        .quiz-mi-badge-overlay img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .icon-title {
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: var(--text-dark);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 3.6em;
            line-height: 1.2em;
            width: 100%;
            margin-top: 5px;
        }
        
        .icon-third-line {
            font-size: 0.8rem;
            color: #666;
            min-height: 1.2em;
            margin-top: 5px;
            font-style: italic;
        }
        
        .icon-score {
            font-size: 0.9rem;
            font-weight: bold;
            color: var(--secondary-green);
            margin-top: 5px;
            min-height: 1.2em;
        }
        
        .empty-icon {
            aspect-ratio: 0.75 / 1;
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
        
        .world-selector {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
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
            
            .combined-icon-container,
            .quiz-combined-icon-container {
                width: 70px;
                height: 70px;
            }
            
            .mi-badge-overlay,
            .quiz-mi-badge-overlay {
                width: 30px;
                height: 30px;
                bottom: -5px;
                right: -5px;
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

    <div class="miel-banner-container fade-in">
        <img src="miel-banner.png" alt="MIEL - Multiple Intelligence Experiential Learning System" class="miel-banner">
    </div>

    <div class="container">
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

            <!-- ==================== MY QUIZZES SECTION ==================== -->
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
                            $displayQuizzes = $availableQuizzes;
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
                                $virtualWorldName = $quiz['virtual_world'];
                                
                                $worldImage = getQuizWorldImage($virtualWorldName);
                                $intelligenceImage = getQuizIntelligenceImage($intelligenceType);
                                
                                $quizFile = ($quiz['type'] == 'inworld') ? 'take-quiz2.php' : 'take-quiz.php';
                            ?>
                            <div class="quiz-icon <?php echo !$quizTaken ? 'not-taken' : ''; ?>" 
                                 onclick="<?php echo $quizTaken ? 'reviewQuiz(\'' . $quizFile . '\', ' . $quiz['id'] . ')' : 'takeQuiz(\'' . $quizFile . '\', ' . $quiz['id'] . ')'; ?>">
                                <div class="icon-badge <?php echo !$quizTaken ? 'not-taken' : ''; ?>"><?php echo $quizCount; ?></div>
                                
                                <div class="quiz-combined-icon-container">
                                    <img src="<?php echo $worldImage; ?>" alt="<?php echo htmlspecialchars($virtualWorldName); ?>" class="quiz-virtual-world-icon" onerror="this.onerror=null; this.src='images/default-world.jpg'; console.error('Quiz image failed: <?php echo $worldImage; ?>');">
                                    <div class="quiz-mi-badge-overlay">
                                        <img src="<?php echo $intelligenceImage; ?>" alt="<?php echo getIntelligenceName($intelligenceType); ?>" onerror="this.onerror=null; this.src='images/default.jpg';">
                                    </div>
                                </div>
                                
                                <div class="icon-title">
                                    <?php echo htmlspecialchars($quiz['title']); ?>
                                </div>
                                <?php if ($quizTaken && $quizScore !== null): ?>
                                <div class="icon-score" style="color: <?php echo $quizScore >= 80 ? '#50C878' : ($quizScore >= 60 ? '#FF9800' : '#FF6B6B'); ?>;">
                                    <?php echo number_format($quizScore, 1); ?>%
                                </div>
                                <?php else: ?>
                                <div class="icon-third-line">Not Yet Taken</div>
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

            <!-- ==================== MY ACTIVITIES SECTION ==================== -->
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
                                $virtualWorld = $activity['virtual_world'];
                                
                                // DEBUG: Log each activity's virtual world value
                                $debugInfo = [];
                                $worldImage = getVirtualWorldImage($virtualWorld, $debugInfo);
                                $intelligenceImage = getIntelligenceImage($intelligenceType);
                                
                                // Store debug info for this activity
                                $activityDebug[$activity['id']] = $debugInfo;
                            ?>
                            <div class="quiz-icon" onclick="viewActivity(<?php echo $activity['id']; ?>)"
                                 data-activity-id="<?php echo $activity['id']; ?>"
                                 data-virtual-world="<?php echo htmlspecialchars($virtualWorld); ?>"
                                 data-world-image="<?php echo $worldImage; ?>">
                                <div class="icon-badge"><?php echo $activityCount; ?></div>
                                
                                <div class="combined-icon-container">
                                    <img src="<?php echo $worldImage; ?>" alt="<?php echo htmlspecialchars($virtualWorld); ?>" class="virtual-world-icon" onerror="this.onerror=null; this.src='images/default-world.jpg'; console.error('Activity image failed for world: <?php echo htmlspecialchars($virtualWorld); ?> -> <?php echo $worldImage; ?>');">
                                    <div class="mi-badge-overlay">
                                        <img src="<?php echo $intelligenceImage; ?>" alt="<?php echo getIntelligenceName($intelligenceType); ?>" onerror="this.onerror=null; this.src='images/default.jpg';">
                                    </div>
                                </div>
                                
                                <div class="icon-title">
                                    <?php echo htmlspecialchars($activity['title']); ?>
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
                                <div class="icon-third-line">Not Yet Submitted</div>
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

            <!-- EXPLORE ARVILLE WORLDS SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-globe-americas"></i> Explore ARville Worlds
                    <span class="badge badge-success">16</span>
                </h2>
                
                <div id="virtual-world-selector-container"></div>
            </div>
        </div>

        <div class="bottom-buttons-container fade-in">
            <form method="POST" action="student-dashboard.php" style="display: inline;">
                <button type="submit" name="logout" class="red-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <script src="virtual-world-selector.js"></script>
    <script>
        let worldSelectorInstance = null;

        document.addEventListener('DOMContentLoaded', function() {
            console.log('%c========================================', 'color: #4ec9b0; font-size: 16px;');
            console.log('%c&#128269; STUDENT DASHBOARD DEBUG CONSOLE', 'color: #4ec9b0; font-size: 16px; font-weight: bold;');
            console.log('%c========================================', 'color: #4ec9b0; font-size: 16px;');
            
            // Log all activity elements
            const activityElements = document.querySelectorAll('.quiz-icon[data-activity-id]');
            console.log(`%c&#128202; Found ${activityElements.length} activities on the page`, 'color: #9cdcfe;');
            
            activityElements.forEach((activity, index) => {
                const activityId = activity.getAttribute('data-activity-id');
                const virtualWorld = activity.getAttribute('data-virtual-world');
                const worldImage = activity.getAttribute('data-world-image');
                
                console.log(`%cActivity ${index + 1}: ID=${activityId}`, 'color: #dcdcaa;');
                console.log(`%c  &#8594; DB Virtual World: '${virtualWorld}'`, 'color: #9cdcfe;');
                console.log(`%c  &#8594; Computed Image Path: ${worldImage}`, 'color: #6a9955;');
            });
            
            try {
                worldSelectorInstance = new VirtualWorldSelector({
                    containerId: 'virtual-world-selector-container',
                    displayOnly: false,
                    onWorldChange: function(worldKey, worldData) {
                        if (worldData && worldData.link) {
                            window.open(worldData.link, '_blank');
                        } else {
                            alert('This world link is not available yet.');
                        }
                    }
                });
                
                window.openWorldByName = function(worldName) {
                    if (!worldSelectorInstance || !worldSelectorInstance.worlds) return false;
                    for (const [key, worldData] of Object.entries(worldSelectorInstance.worlds)) {
                        if (worldData.name === worldName) {
                            if (worldData.link) {
                                window.open(worldData.link, '_blank');
                                return true;
                            }
                        }
                    }
                    return false;
                };
            } catch (error) {
                console.error('Error initializing Virtual World Selector:', error);
            }
        });

        function takeQuiz(quizFile, quizId) {
            window.location.href = `${quizFile}?quiz_id=${quizId}`;
        }
        
        function reviewQuiz(quizFile, quizId) {
            window.location.href = `${quizFile}?quiz_id=${quizId}`;
        }
        
        function viewActivity(activityId) {
            window.location.href = `do-activity.php?activity_id=${activityId}`;
        }
        
        document.querySelectorAll('.quiz-icon').forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        const mielBanner = document.querySelector('.miel-banner');
        if (mielBanner) {
            mielBanner.addEventListener('click', function() {
                this.classList.toggle('bounce');
                alert('MIEL - Multiple Intelligence Experiential Learning\nPersonalized learning for every student!');
                setTimeout(() => this.classList.remove('bounce'), 500);
            });
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>