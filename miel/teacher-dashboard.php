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
    
    // Get summary statistics
    $statsStmt = $pdo->prepare("
        SELECT 
            COUNT(DISTINCT q.id) as total_quizzes,
            COUNT(DISTINCT s.student_id) as total_students,
            COUNT(DISTINCT s.id) as total_attempts,
            COALESCE(AVG(s.score), 0) as overall_avg_score
        FROM quizzes q 
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

// Format date
function formatDate($date) {
    return date('M j, Y', strtotime($date));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | Arville Metaverse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            background: linear-gradient(135deg, #E3F2FD 0%, #F3E5F5 100%);
            min-height: 100vh;
            color: var(--text-dark);
            padding: 20px;
        }
        
        .container {
            max-width: 800px; /* SAME WIDTH AS create-quiz.php */
            margin: 0 auto;
        }
        
        /* ===== HEADER (SAME STYLE) ===== */
        .header {
            text-align: center;
            margin-bottom: 30px;
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
        
        /* ===== CARD STYLES (SAME AS create-quiz.php) ===== */
        .card {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            width: 100%;
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
        
        /* ===== STATS SUMMARY ===== */
        .stats-summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
            margin-top: 30px; /* ADDED: Vertical space */
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
        
        /* ===== QUIZZES CREATED GRID ===== */
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
        
        /* ===== SCORES SECTION ===== */
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
        
        /* ===== ACTION BUTTONS CONTAINER ===== */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            justify-content: flex-start;
            flex-wrap: wrap;
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
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
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
        
        /* ===== MOBILE RESPONSIVE (SAME AS create-quiz.php) ===== */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .main-card {
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
            
            .stats-summary {
                grid-template-columns: 1fr;
            }
        }
        
        /* ===== ANIMATIONS (SAME AS create-quiz.php) ===== */
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
        
        /* ===== SCROLLBAR ===== */
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
    </style>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <header class="header fade-in">
            <div class="logo">
                <i class="fas fa-chalkboard-teacher logo-icon bounce"></i>
                <div>
                    <h1>Teacher Dashboard</h1>
                    <p class="subtitle">Manage Your Quizzes & Track Student Progress</p>
                </div>
            </div>
            <div class="welcome-message">
                Welcome back, <strong><?php echo htmlspecialchars($teacher['full_name']); ?></strong>!
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
                                <div class="profile-label">Active Quizzes</div>
                                <div class="profile-value"><?php echo $stats['total_quizzes'] ?? 0; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- STATS SUMMARY -->
                <div class="stats-summary">
                    <div class="stat-item">
                        <div class="stat-value"><?php echo $stats['total_quizzes'] ?? 0; ?></div>
                        <div class="stat-label">Quizzes Created</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value"><?php echo $stats['total_students'] ?? 0; ?></div>
                        <div class="stat-label">Students</div>
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

            <!-- QUIZZES CREATED SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-clipboard-list"></i> My Quizzes
                    <span class="badge badge-primary"><?php echo count($teacherQuizzes); ?></span>
                </h2>
                
                <div class="quiz-grid-section">
                    <div class="quiz-grid">
                        <?php if (empty($teacherQuizzes)): ?>
                            <!-- Show 8 empty placeholders -->
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-quiz.php'">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Create Quiz <?php echo $i; ?></div>
                            </div>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php 
                            // Show up to 8 quizzes
                            $displayQuizzes = array_slice($teacherQuizzes, 0, 8);
                            $quizCount = 0;
                            ?>
                            <?php foreach ($displayQuizzes as $quiz): $quizCount++; ?>
                            <div class="quiz-icon" onclick="viewQuiz(<?php echo $quiz['id']; ?>)">
                                <div class="icon-badge"><?php echo $quizCount; ?></div>
                                <div class="icon-main">
                                    <i class="fas fa-<?php echo getWorldIcon($quiz['virtual_world']); ?>"></i>
                                </div>
                                <div class="icon-title">
                                    <?php echo htmlspecialchars(substr($quiz['title'], 0, 20)); ?>
                                    <?php if (strlen($quiz['title']) > 20): ?>...<?php endif; ?>
                                </div>
                                <div class="icon-stats">
                                    <div><i class="fas fa-question"></i> <?php echo $quiz['question_count']; ?> Qs</div>
                                    <div><i class="fas fa-users"></i> <?php echo $quiz['attempt_count']; ?> attempts</div>
                                </div>
                                <?php if ($quiz['attempt_count'] > 0): ?>
                                <div class="icon-score">
                                    <?php echo number_format($quiz['avg_score'], 1); ?>%
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php // Fill remaining slots with placeholders ?>
                            <?php for ($i = $quizCount + 1; $i <= 8; $i++): ?>
                            <div class="empty-icon" onclick="window.location.href='create-quiz.php'">
                                <i class="fas fa-plus-circle"></i>
                                <div class="empty-text">Create New Quiz</div>
                            </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="action-buttons">
                        <!-- ADDED: Add Questions button beside Create New Quiz -->
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
                        <!-- REMOVED: View All Quizzes button -->
                    </div>
                </div>
            </div>

            <!-- STUDENT SCORES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-chart-line"></i> Student Scores
                    <span class="badge badge-primary"><?php echo count($studentScores); ?></span>
                </h2>
                
                <div class="scores-section">
                    <?php if (empty($studentScores)): ?>
                        <div class="empty-score">
                            <i class="fas fa-chart-bar"></i>
                            <p>No student scores yet. Share your quizzes with students!</p>
                        </div>
                    <?php else: ?>
                        <div class="score-list">
                            <?php foreach ($studentScores as $score): ?>
                            <div class="score-item">
                                <div class="score-header">
                                    <div>
                                        <div class="score-student">
                                            <?php echo htmlspecialchars($score['student_name']); ?>
                                            <?php if ($score['grade_level']): ?>
                                            <span style="color: #666; font-size: 0.9rem;">(Grade <?php echo $score['grade_level']; ?>)</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="score-quiz">
                                            <?php echo htmlspecialchars($score['quiz_title']); ?>
                                            <?php if ($score['class_name']): ?>
                                            • <?php echo htmlspecialchars($score['class_name']); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="score-value">
                                        <?php echo $score['score']; ?>%
                                    </div>
                                </div>
                                <div class="score-details">
                                    <div>
                                        <i class="fas fa-calendar" style="color: #9C27B0;"></i>
                                        <?php echo formatDate($score['completed_at']); ?>
                                    </div>
                                    <div>
                                        <i class="fas fa-clock" style="color: #FF9800;"></i>
                                        Completed
                                    </div>
                                    <div>
                                        <i class="fas fa-id-card" style="color: var(--secondary-green);"></i>
                                        Student ID: <?php echo $score['student_id']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="action-buttons">
                        <button class="action-btn" onclick="exportScores()">
                            <i class="fas fa-download"></i> Export Scores
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOTTOM BUTTONS -->
        <div class="bottom-buttons-container fade-in">
            <form method="POST" action="teacher-dashboard.php" style="display: inline;">
                <button type="submit" name="logout" class="red-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        // Quiz functions
        function viewQuiz(quizId) {
            // Directly go to add questions page with the selected quiz
            window.location.href = `add-questions.php?quiz_id=${quizId}`;
        }
        
        function viewAllScores() {
            alert('Viewing all scores - This would show detailed score analytics in the full version.');
        }
        
        function exportScores() {
            alert('Exporting scores - This would download a CSV file of all student scores in the full version.');
        }
        
        // Auto-refresh every 30 seconds
        setInterval(() => {
            console.log('Auto-refreshing teacher dashboard...');
        }, 30000);
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'n') {
                e.preventDefault();
                window.location.href = 'create-quiz.php';
            }
            
            if (e.ctrlKey && e.key === 'q') {
                e.preventDefault();
                // Go to add questions page
                window.location.href = 'add-questions.php';
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
        
        // Score item hover effect
        document.querySelectorAll('.score-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Function to go directly to add questions
        function addQuestionsToQuiz() {
            window.location.href = 'add-questions.php';
        }
        
        // Add context menu to quiz icons for quick actions
        document.querySelectorAll('.quiz-icon').forEach(icon => {
            icon.addEventListener('contextmenu', function(e) {
                e.preventDefault();
                const quizId = this.getAttribute('onclick')?.match(/\d+/)?.[0];
                if (quizId) {
                    const action = prompt(`Quick Actions for Quiz #${quizId}\n\nEnter:\n1 - Add Questions\n2 - View Details\n3 - Edit Quiz`);
                    
                    switch(action) {
                        case '1':
                            viewQuiz(quizId);
                            break;
                        case '2':
                            alert(`Viewing quiz #${quizId} details - Feature coming soon!`);
                            break;
                        case '3':
                            alert(`Edit quiz #${quizId} - Feature coming soon!`);
                            break;
                        default:
                            // Do nothing
                    }
                }
            });
        });
    </script>
</body>
</html>