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
    
    // Get student's scores
    $scoreStmt = $pdo->prepare("
        SELECT s.*, q.title as quiz_title, q.virtual_world, q.intelligence_type
        FROM scores s 
        JOIN quizzes q ON s.quiz_id = q.id 
        WHERE s.student_id = ? 
        ORDER BY s.completed_at DESC
    ");
    $scoreStmt->execute([$_SESSION['user_id']]);
    $studentScores = $scoreStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get all quizzes for score comparison
    $allQuizzesStmt = $pdo->prepare("SELECT id, title FROM quizzes");
    $allQuizzesStmt->execute();
    $allQuizzes = $allQuizzesStmt->fetchAll(PDO::FETCH_ASSOC);
    
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | Arville Metaverse</title>
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
            width: 120px; /* SAME SIZE AS create-quiz.php INTELLIGENCE ICONS */
            height: 120px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
            border-radius: 15px; /* SAME BORDER RADIUS */
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
        
        /* ===== QUIZ ICONS GRID (SAME SIZE AS create-quiz.php WORLD SELECTOR) ===== */
        .quiz-grid-section {
            width: 100%;
        }
        
        .quiz-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 15px; /* SAME GAP AS create-quiz.php */
            margin-bottom: 20px;
        }
        
        .quiz-icon {
            aspect-ratio: 1/1;
            background: #F8F9FF;
            border-radius: 15px; /* SAME BORDER RADIUS */
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
            min-height: 0; /* Allow flexible sizing */
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
            font-size: 2rem; /* SAME SIZE AS create-quiz.php INTELLIGENCE ICONS */
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
        
        /* ===== STANDARDIZED BUTTONS ===== */
        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }
        
        .btn-primary {
            background: var(--primary-blue);
            color: white;
        }
        
        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-3px);
        }
        
        .btn-success {
            background: var(--secondary-green);
            color: white;
        }
        
        .btn-success:hover {
            background: #3DAF5E;
            transform: translateY(-3px);
        }
        
        .btn-secondary {
            background: var(--accent-yellow);
            color: var(--text-dark);
        }
        
        .btn-secondary:hover {
            background: #E6B800;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
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
        
        /* ===== MOBILE RESPONSIVE (SAME AS create-quiz.php) ===== */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
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
            
            .button-group {
                flex-direction: column;
            }
            
            .btn {
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
            
            .btn {
                width: 100%;
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
    </style>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <header class="header fade-in">
            <div class="logo">
                <i class="fas fa-graduation-cap logo-icon bounce"></i>
                <div>
                    <h1>Student Dashboard</h1>
                    <p class="subtitle">Welcome to Arville Metaverse!</p>
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
                                <div class="profile-value"><?php echo date('F j, Y', strtotime($student['created_at'])); ?></div>
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

            <!-- MY SCORES SECTION -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-chart-line"></i> My Scores
                    <span class="badge badge-primary"><?php echo count($studentScores); ?></span>
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
                            foreach ($studentScores as $score) {
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
        </div>

        <!-- BOTTOM BUTTONS CONTAINER -->
        <div class="bottom-buttons-container">            
            <a href="logout.php" class="red-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        // Quiz functions
        function takeQuiz(quizId) {
            alert(`Starting quiz #${quizId}\n\nThis will redirect to the quiz taking page in the full version.`);
            // window.location.href = `take-quiz.php?quiz_id=${quizId}`;
        }
        
        function reviewQuiz(quizId) {
            alert(`Reviewing quiz #${quizId}\n\nThis will show your answers and results in the full version.`);
            // window.location.href = `review-quiz.php?quiz_id=${quizId}`;
        }
        
        // Auto-refresh every 30 seconds
        setInterval(() => {
            console.log('Auto-refreshing dashboard...');
        }, 30000);
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'r') {
                e.preventDefault();
                window.location.reload();
            }
            
            if (e.key === 'Escape') {
                if (confirm('Are you sure you want to logout?')) {
                    window.location.href = 'logout.php';
                }
            }
        });
        
        // Add hover effects (same as create-quiz.php)
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
    </script>
</body>
</html>