<?php
// teacher-dashboard.php
session_start();

// Redirect to login if not logged in or not a teacher
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'teacher') {
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
    
    // Get teacher profile
    $teacherStmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $teacherStmt->execute([$_SESSION['user_id']]);
    $teacher = $teacherStmt->fetch(PDO::FETCH_ASSOC);
    
    // Get quizzes created by this teacher
    $quizStmt = $pdo->prepare("
        SELECT q.*, 
               COUNT(DISTINCT qn.id) as question_count,
               COUNT(DISTINCT s.id) as attempt_count,
               COALESCE(AVG(s.score), 0) as avg_score
        FROM quizzes q 
        LEFT JOIN questions qn ON q.id = qn.quiz_id
        LEFT JOIN scores s ON q.id = s.quiz_id
        WHERE q.teacher_id = ?
        GROUP BY q.id
        ORDER BY q.created_at DESC
    ");
    $quizStmt->execute([$_SESSION['user_id']]);
    $teacherQuizzes = $quizStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get activities created by this teacher
    $activityStmt = $pdo->prepare("
        SELECT a.*
        FROM activities a 
        WHERE a.teacher_id = ?
        ORDER BY a.created_at DESC
    ");
    $activityStmt->execute([$_SESSION['user_id']]);
    $teacherActivities = $activityStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get student scores for teacher's quizzes
    $scoreStmt = $pdo->prepare("
        SELECT s.*, q.title as quiz_title, u.full_name as student_name, u.grade_level, u.class_name
        FROM scores s 
        JOIN quizzes q ON s.quiz_id = q.id 
        JOIN users u ON s.student_id = u.id
        WHERE q.teacher_id = ?
        ORDER BY s.completed_at DESC
        LIMIT 50
    ");
    $scoreStmt->execute([$_SESSION['user_id']]);
    $studentScores = $scoreStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get activities that need grading (with submission counts)
    $gradingStmt = $pdo->prepare("
        SELECT 
            a.*,
            COUNT(DISTINCT ag.student_id) as students_submitted,
            COUNT(DISTINCT CASE WHEN ag.points_earned IS NULL AND ag.submission_data IS NOT NULL THEN ag.student_id END) as students_to_grade,
            COUNT(DISTINCT CASE WHEN ag.points_earned IS NOT NULL THEN ag.student_id END) as students_graded,
            MAX(ag.created_at) as last_submission_date
        FROM activities a
        LEFT JOIN activity_grades ag ON a.id = ag.activity_id
        WHERE a.teacher_id = ?
        GROUP BY a.id
        ORDER BY last_submission_date DESC, a.created_at DESC
    ");
    $gradingStmt->execute([$_SESSION['user_id']]);
    $activitiesToGrade = $gradingStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get summary statistics
    $statsStmt = $pdo->prepare("
        SELECT 
            COUNT(DISTINCT q.id) as total_quizzes,
            COUNT(DISTINCT a.id) as total_activities,
            COUNT(DISTINCT s.student_id) as total_students,
            COUNT(DISTINCT s.id) as total_attempts,
            COALESCE(AVG(s.score), 0) as overall_avg_score
        FROM quizzes q 
        LEFT JOIN activities a ON q.teacher_id = a.teacher_id
        LEFT JOIN scores s ON q.id = s.quiz_id
        WHERE q.teacher_id = ?
    ");
    $statsStmt->execute([$_SESSION['user_id']]);
    $stats = $statsStmt->fetch(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
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

// Get virtual world icon (for combined display)
function getVirtualWorldIcon($world) {
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
    return $names[$world] ?? ucfirst($world);
}

// Get intelligence icon image for quizzes
function getQuizIntelligenceImage($type) {
    $imagePath = "images/mi-{$type}.png";
    if (!file_exists($imagePath)) {
        $imagePath = "images/default.jpg";
    }
    return $imagePath;
}

// Get intelligence icon image for activities
function getActivityIntelligenceImage($type) {
    $imagePath = "images/mi-{$type}.png";
    if (!file_exists($imagePath)) {
        $imagePath = "images/default.jpg";
    }
    return $imagePath;
}

// Get virtual world image path by reading virtual-world-selector.js
function getVirtualWorldImage($worldName) {
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

// Get activity type name
function getActivityTypeName($type) {
    $names = [
        'essay' => 'Essay',
        'drawing' => 'Drawing',
        'presentation' => 'Presentation',
        'project' => 'Project',
        'experiment' => 'Experiment',
        'performance' => 'Performance',
        'portfolio' => 'Portfolio'
    ];
    return $names[$type] ?? $type;
}

// Get activity type icon
function getActivityTypeIcon($type) {
    $icons = [
        'essay' => 'file-alt',
        'drawing' => 'paint-brush',
        'presentation' => 'presentation',
        'project' => 'tasks',
        'experiment' => 'flask',
        'performance' => 'theater-masks',
        'portfolio' => 'briefcase'
    ];
    return $icons[$type] ?? 'tasks';
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

// Format date
function formatDate($date) {
    return date('M j, Y', strtotime($date));
}

// Format date with time
function formatDateTime($date) {
    return date('M j, Y g:i A', strtotime($date));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | MIEL - Multiple Intelligence E-Learning</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="mobile.css" media="screen">
    <style>
        /* ===== KID-FRIENDLY THEME (SAME AS create-quiz.php) ===== */
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
            max-width: 800px;
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
		
	.bottom-buttons-container {
	    margin-bottom: 30px !important;
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
            margin-top: -5px;
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
        
        .stats-summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
            margin-top: 30px;
        }
        
        .stat-item {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            border: 3px solid #E0E0E0;
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #666;
        }
        
        .quiz-grid-section {
            width: 100%;
        }
        
        .quiz-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .quiz-icon {
            aspect-ratio: 0.85 / 1;
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
        
        /* Combined icon container - Virtual World with MI badge overlay */
        .combined-icon-container {
            position: relative;
            display: inline-block;
            width: 80px;
            height: 80px;
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
            width: 34px;
            height: 34px;
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
        
        .icon-stats {
            font-size: 0.8rem;
            color: #666;
            margin-top: 5px;
        }
        
        .icon-score {
            font-size: 1.1rem;
            font-weight: bold;
            color: var(--secondary-green);
            margin-top: 5px;
        }
        
        .activity-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .activity-icon {
            aspect-ratio: 0.85 / 1;
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
        }
        
        .activity-icon:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow);
        }
        
        .grading-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .grading-icon {
            aspect-ratio: 0.85 / 1;
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
        }
        
        .grading-icon:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow);
        }
        
        .grading-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #FF9800;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            font-weight: bold;
        }
        
        .grading-stats {
            font-size: 0.8rem;
            color: #666;
            margin-top: 5px;
        }
        
        .grading-urgent {
            color: #F44336;
            font-weight: bold;
        }
        
        .grading-ready {
            color: #4CAF50;
        }
        
        .scores-section {
            width: 100%;
        }
        
        .score-list {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 10px;
        }
        
        .score-item {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 10px;
            border: 3px solid #E0E0E0;
            transition: all 0.3s;
        }
        
        .score-item:hover {
            transform: translateY(-3px);
            border-color: var(--primary-blue);
        }
        
        .score-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .score-student {
            font-weight: bold;
            color: var(--text-dark);
            font-size: 1rem;
        }
        
        .score-quiz {
            color: #666;
            font-size: 0.9rem;
        }
        
        .score-value {
            background: var(--primary-blue);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 1rem;
        }
        
        .score-details {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            font-size: 0.9rem;
            color: #666;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            justify-content: flex-start;
            flex-wrap: wrap;
        }
        
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
            background-color: #4A90E2 !important;
        }
        
        .action-btn:hover {
            background-color: #FFD166 !important;
            transform: translateY(-3px);
            color: #2C3E50 !important;
        }
        
        .orange-btn {
            background-color: #FF9800 !important;
            color: white !important;
        }
        
        .orange-btn:hover {
            background-color: #F57C00 !important;
            transform: translateY(-3px);
        }
        
        .action-btn-primary,
        .action-btn-success,
        .action-btn-warning {
            background-color: #4A90E2 !important;
        }
        
        .action-btn-primary:hover,
        .action-btn-success:hover,
        .action-btn-warning:hover {
            background-color: #FFD166 !important;
            color: #2C3E50 !important;
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
        
        .logout-section {
            display: none !important;
        }
        
        .empty-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }
        
        .empty-icon {
            aspect-ratio: 0.85 / 1;
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
            cursor: pointer;
        }
        
        .empty-icon:hover {
            background: #E8F0FE;
            border-color: var(--primary-blue);
        }
        
        .empty-icon i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .empty-text {
            font-size: 0.9rem;
        }
        
        .empty-score {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }
        
        .empty-score i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #DDD;
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
        
        .badge-warning {
            background: var(--accent-yellow);
            color: var(--text-dark);
        }
        
        .badge-purple {
            background: #9C27B0;
            color: white;
        }
        
        .badge-orange {
            background: #FF9800;
            color: white;
        }
        
        .no-scores, .no-grades {
            font-size: 0.8rem;
            text-align: center;
            width: 100%;
            height: 1.2em;
            color: #999;
            font-style: italic;
        }
        
        .activity-grade {
            margin-top: 5px;
            font-size: 0.9rem;
            text-align: center;
            width: 100%;
            height: 1.2em;
            color: var(--secondary-green);
            font-weight: bold;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .miel-banner-container {
                padding: 10px;
                margin-bottom: 20px;
            }
            
            .main-card {
                padding: 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .quiz-grid,
            .activity-grid,
            .grading-grid,
            .empty-grid {
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
            
            .stats-summary {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .score-details {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .action-btn {
                width: 100%;
            }
            
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
            
            .combined-icon-container {
                width: 70px;
                height: 70px;
            }
            
            .mi-badge-overlay {
                width: 30px;
                height: 30px;
                bottom: -5px;
                right: -5px;
            }
        }
        
        @media (max-width: 480px) {
            .quiz-grid,
            .activity-grid,
            .grading-grid,
            .empty-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .stats-summary {
                grid-template-columns: 1fr;
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
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .pulse {
            animation: pulse 1s ease infinite;
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
        
        .score-list::-webkit-scrollbar {
            width: 8px;
        }
        
        .score-list::-webkit-scrollbar-track {
            background: #F0F0F0;
            border-radius: 10px;
        }
        
        .score-list::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 10px;
        }
        
        .section-divider {
            height: 20px;
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
                    <img src="images/teacher-dashboard.jpg" alt="Teacher Dashboard" style="max-width: 550px; height: auto;">
                    <p class="subtitle">Manage Your Quizzes, Activities & Track Student Progress</p>
                </div>
            </div>
            <div class="welcome-message">
                Welcome back, Teacher <strong><?php echo htmlspecialchars($teacher['full_name']); ?></strong>!
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
                        <?php echo strtoupper(substr($teacher['full_name'], 0, 1)); ?>
                    </div>
                    
                    <div class="profile-info-grid">
                        <div class="profile-info-item">
                            <div class="profile-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="profile-details">
                                <div class="profile-label">Email</div>
                                <div class="profile-value"><?php echo htmlspecialchars($teacher['email']); ?></div>
                            </div>
                        </div>
                        
                        <div class="profile-info-item">
                            <div class="profile-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <div class="profile-details">
                                <div class="profile-label">Role</div>
                                <div class="profile-value">Teacher</div>
                            </div>
                        </div>
                        
                        <div class="profile-info-item">
                            <div class="profile-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="profile-details">
                                <div class="profile-label">Member Since</div>
                                <div class="profile-value"><?php echo formatDate($teacher['created_at']); ?></div>
                            </div>
                        </div>
                        
                        <div class="profile-info-item">
                            <div class="profile-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="profile-details">
                                <div class="profile-label">Total Content</div>
                                <div class="profile-value"><?php echo ($stats['total_quizzes'] + $stats['total_activities']) ?? 0; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="stats-summary">
                    <div class="stat-item">
                        <div class="stat-value"><?php echo $stats['total_quizzes'] ?? 0; ?></div>
                        <div class="stat-label">Quizzes</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value"><?php echo $stats['total_activities'] ?? 0; ?></div>
                        <div class="stat-label">Activities</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value"><?php echo $stats['total_attempts'] ?? 0; ?></div>
                        <div class="stat-label">Total Attempts</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value"><?php echo number_format($stats['overall_avg_score'] ?? 0, 1); ?>%</div>
                        <div class="stat-label">Avg. Score</div>
                    </div>
                </div>
            </div>

            <!-- MY QUIZZES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-clipboard-list"></i> My Quizzes
                    <span class="badge badge-primary"><?php echo count($teacherQuizzes); ?></span>
                </h2>
                
                <div class="quiz-grid-section">
                    <div class="quiz-grid">
                        <?php if (empty($teacherQuizzes)): ?>
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-quiz.php'">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Create Quiz</div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            $displayQuizzes = array_slice($teacherQuizzes, 0, 8);
                            $quizCount = 0;
                            ?>
                            <?php foreach ($displayQuizzes as $quiz): $quizCount++; 
                                $intelligenceType = $quiz['intelligence_type'];
                                $virtualWorld = $quiz['virtual_world'] ?? 'zoo';
                                $worldImage = getVirtualWorldImage($virtualWorld);
                                $intelligenceImage = getQuizIntelligenceImage($intelligenceType);
                            ?>
                            <div class="quiz-icon" onclick="viewQuiz(<?php echo $quiz['id']; ?>)">
                                <div class="icon-badge"><?php echo $quizCount; ?></div>
                                <div class="combined-icon-container">
                                    <img src="<?php echo $worldImage; ?>" alt="<?php echo getVirtualWorldName($virtualWorld); ?>" class="virtual-world-icon">
                                    <div class="mi-badge-overlay">
                                        <img src="<?php echo $intelligenceImage; ?>" alt="<?php echo getIntelligenceName($intelligenceType); ?>">
                                    </div>
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars($quiz['title']); ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php for ($i = $quizCount + 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-quiz.php'">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Create Quiz</div>
                            </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="action-buttons">
                        <?php if (!empty($teacherQuizzes)): ?>
                        <a href="add-questions.php" class="action-btn">
                            <i class="fas fa-question-circle"></i> Add Questions
                        </a>
                        <?php else: ?>
                        <a href="create-quiz.php" class="action-btn">
                            <i class="fas fa-question-circle"></i> Add Questions
                        </a>
                        <?php endif; ?>
                        
                        <a href="create-quiz.php" class="action-btn">
                            <i class="fas fa-plus-circle"></i> Create New Quiz
                        </a>
                    </div>
                </div>
            </div>

            <!-- MY ACTIVITIES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-tasks"></i> My Activities
                    <span class="badge badge-purple"><?php echo count($teacherActivities); ?></span>
                </h2>
                
                <div class="quiz-grid-section">
                    <div class="activity-grid">
                        <?php if (empty($teacherActivities)): ?>
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-activity.php'">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Create Activity</div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            $displayActivities = array_slice($teacherActivities, 0, 8);
                            $activityCount = 0;
                            
                            $activityGrades = [];
                            foreach ($displayActivities as $activity) {
                                $gradeStmt = $pdo->prepare("
                                    SELECT AVG(ag.points_earned) as avg_grade, 
                                           COUNT(DISTINCT ag.student_id) as graded_count
                                    FROM activity_grades ag 
                                    WHERE ag.activity_id = ? AND ag.points_earned IS NOT NULL
                                ");
                                $gradeStmt->execute([$activity['id']]);
                                $gradeData = $gradeStmt->fetch(PDO::FETCH_ASSOC);
                                $activityGrades[$activity['id']] = $gradeData;
                            }
                            ?>
                            <?php foreach ($displayActivities as $activity): $activityCount++; 
                                $intelligenceType = $activity['intelligence_type'];
                                $virtualWorld = $activity['virtual_world'] ?? 'zoo';
                                $worldImage = getVirtualWorldImage($virtualWorld);
                                $intelligenceImage = getActivityIntelligenceImage($intelligenceType);
                                
                                $gradeData = $activityGrades[$activity['id']] ?? null;
                                $avgGrade = $gradeData['avg_grade'] ?? null;
                            ?>
                            <div class="activity-icon" onclick="viewActivity(<?php echo $activity['id']; ?>)">
                                <div class="icon-badge"><?php echo $activityCount; ?></div>
                                <div class="combined-icon-container">
                                    <img src="<?php echo $worldImage; ?>" alt="<?php echo getVirtualWorldName($virtualWorld); ?>" class="virtual-world-icon">
                                    <div class="mi-badge-overlay">
                                        <img src="<?php echo $intelligenceImage; ?>" alt="<?php echo getIntelligenceName($intelligenceType); ?>">
                                    </div>
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars($activity['title']); ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php for ($i = $activityCount + 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-activity.php'">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Create Activity</div>
                            </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="create-activity.php" class="action-btn">
                            <i class="fas fa-plus-circle"></i> Create New Activity
                        </a>
                    </div>
                </div>
            </div>

            <!-- STUDENT QUIZ SCORES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-chart-line"></i> Student Quiz Scores
                    <span class="badge badge-primary"><?php echo count($teacherQuizzes); ?> quizzes</span>
                </h2>
                
                <div class="quiz-grid-section">
                    <div class="quiz-grid">
                        <?php if (empty($teacherQuizzes)): ?>
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-quiz.php'">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Create Quiz</div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            $displayQuizScores = array_slice($teacherQuizzes, 0, 8);
                            $scoreQuizCount = 0;
                            ?>
                            <?php foreach ($displayQuizScores as $quiz): $scoreQuizCount++; 
                                $intelligenceType = $quiz['intelligence_type'];
                                $virtualWorld = $quiz['virtual_world'] ?? 'zoo';
                                $worldImage = getVirtualWorldImage($virtualWorld);
                                $intelligenceImage = getQuizIntelligenceImage($intelligenceType);
                            ?>
                            <div class="quiz-icon" onclick="window.location.href='quiz-scores.php?quiz_id=<?php echo $quiz['id']; ?>'">
                                <div class="icon-badge"><?php echo $scoreQuizCount; ?></div>
                                <div class="combined-icon-container">
                                    <img src="<?php echo $worldImage; ?>" alt="<?php echo getVirtualWorldName($virtualWorld); ?>" class="virtual-world-icon">
                                    <div class="mi-badge-overlay">
                                        <img src="<?php echo $intelligenceImage; ?>" alt="<?php echo getIntelligenceName($intelligenceType); ?>">
                                    </div>
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars($quiz['title']); ?>
                                </div>
                                <?php if ($quiz['attempt_count'] > 0): ?>
                                <div class="icon-score">
                                    <?php echo number_format($quiz['avg_score'], 1); ?>% Average
                                </div>
                                <?php else: ?>
                                <div class="no-scores">No Scores Yet</div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php for ($i = $scoreQuizCount + 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-quiz.php'">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Create Quiz</div>
                            </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="action-buttons">
                        <button class="action-btn" onclick="exportQuizScores()">
                            <i class="fas fa-download"></i> Export All Quiz Scores
                        </button>
                    </div>
                </div>
            </div>

            <!-- ACTIVITY GRADES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-check-double"></i> Activity Grades
                </h2>
                
                <div class="quiz-grid-section">
                    <div class="grading-grid">
                        <?php if (empty($activitiesToGrade)): ?>
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-activity.php'">
                                <i class="fas fa-check-circle"></i>
                                <div class="empty-text">No activities</div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            $displayGradingIcons = array_slice($activitiesToGrade, 0, 8);
                            $gradingCount = 0;
                            
                            $gradingGrades = [];
                            foreach ($displayGradingIcons as $activity) {
                                $gradeStmt = $pdo->prepare("
                                    SELECT AVG(ag.points_earned) as avg_grade, 
                                           COUNT(DISTINCT ag.student_id) as graded_count
                                    FROM activity_grades ag 
                                    WHERE ag.activity_id = ? AND ag.points_earned IS NOT NULL
                                ");
                                $gradeStmt->execute([$activity['id']]);
                                $gradeData = $gradeStmt->fetch(PDO::FETCH_ASSOC);
                                $gradingGrades[$activity['id']] = $gradeData;
                            }
                            ?>
                            <?php foreach ($displayGradingIcons as $activity): $gradingCount++; 
                                $intelligenceType = $activity['intelligence_type'];
                                $virtualWorld = $activity['virtual_world'] ?? 'zoo';
                                $worldImage = getVirtualWorldImage($virtualWorld);
                                $intelligenceImage = getActivityIntelligenceImage($intelligenceType);
                                
                                $gradeData = $gradingGrades[$activity['id']] ?? null;
                                $avgGrade = $gradeData['avg_grade'] ?? null;
                                $gradedCount = $gradeData['graded_count'] ?? 0;
                            ?>
                            <div class="grading-icon" onclick="window.location.href='grade-activity.php?activity_id=<?php echo $activity['id']; ?>'">
                                <?php if ($activity['students_to_grade'] > 0): ?>
                                <div class="grading-badge pulse"><?php echo $activity['students_to_grade']; ?></div>
                                <?php endif; ?>
                                <div class="combined-icon-container">
                                    <img src="<?php echo $worldImage; ?>" alt="<?php echo getVirtualWorldName($virtualWorld); ?>" class="virtual-world-icon">
                                    <div class="mi-badge-overlay">
                                        <img src="<?php echo $intelligenceImage; ?>" alt="<?php echo getIntelligenceName($intelligenceType); ?>">
                                    </div>
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars($activity['title']); ?>
                                </div>
                                <?php if ($gradedCount > 0 && $avgGrade !== null): ?>
                                <div class="activity-grade">
                                    <?php echo number_format($avgGrade, 1); ?>% Average
                                </div>
                                <?php else: ?>
                                <div class="no-grades">No Grades Yet</div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php for ($i = $gradingCount + 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-activity.php'">
                                <i class="fas fa-check-circle"></i>
                                <div class="empty-text">Create Activity</div>
                            </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="action-buttons">
                        <button class="action-btn" onclick="viewAllActivities()">
                            <i class="fas fa-list"></i> Export All Activity Grades
                        </button>
                    </div>
                </div>
            </div>

            <div class="bottom-buttons-container fade-in">
                <form method="POST" action="teacher-dashboard.php" style="display: inline;">
                    <button type="submit" name="logout" class="red-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function viewQuiz(quizId) {
            window.location.href = `add-questions.php?quiz_id=${quizId}`;
        }
        
        function viewActivity(activityId) {
            window.location.href = `create-activity.php?edit=${activityId}`;
        }
        
        function gradeActivity(activityId) {
            window.location.href = `grade-activity.php?activity_id=${activityId}`;
        }
        
        function viewAllActivities() {
            alert('Feature coming soon! This would show a full list of all activities with detailed grading status.');
        }
        
        function exportQuizScores() {
            alert('Exporting quiz scores - This would download a CSV file of all student quiz scores in the full version.');
        }
        
        setInterval(() => {
            console.log('Auto-refreshing teacher dashboard...');
        }, 30000);
        
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'n') {
                e.preventDefault();
                window.location.href = 'create-quiz.php';
            }
            
            if (e.ctrlKey && e.key === 'a') {
                e.preventDefault();
                window.location.href = 'create-activity.php';
            }
            
            if (e.ctrlKey && e.key === 'q') {
                e.preventDefault();
                window.location.href = 'add-questions.php';
            }
            
            if (e.ctrlKey && e.key === 'g') {
                e.preventDefault();
                const gradeBtn = document.querySelector('.orange-btn');
                if (gradeBtn) gradeBtn.click();
            }
            
            if (e.key === 'Escape') {
                if (confirm('Are you sure you want to logout?')) {
                    document.querySelector('button[name="logout"]').click();
                }
            }
        });
        
        document.querySelectorAll('.quiz-icon, .activity-icon, .grading-icon').forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        document.querySelectorAll('.profile-info-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        document.querySelectorAll('.score-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        document.querySelectorAll('.empty-icon').forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        function addQuestionsToQuiz() {
            window.location.href = 'add-questions.php';
        }
        
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
        
        document.querySelectorAll('.activity-icon, .grading-icon').forEach(icon => {
            icon.addEventListener('contextmenu', function(e) {
                e.preventDefault();
                const onclick = this.getAttribute('onclick');
                const activityId = onclick?.match(/\((.*?)\)/)?.[1];
                if (activityId) {
                    const action = prompt(`Quick Actions for Activity #${activityId}\n\nEnter:\n1 - View/Grade\n2 - View Details\n3 - Edit Activity`);
                    switch(action) {
                        case '1':
                            gradeActivity(activityId);
                            break;
                        case '2':
                            viewActivity(activityId);
                            break;
                        case '3':
                            alert(`Edit activity #${activityId} - Feature coming soon!`);
                            break;
                    }
                }
            });
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>