<?php
// quiz-scores.php
session_start();

// Redirect to login if not logged in as teacher
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'teacher') {
    header('Location: login.php');
    exit();
}

// Check if quiz_id is provided
if (!isset($_GET['quiz_id']) || !is_numeric($_GET['quiz_id'])) {
    header('Location: teacher-dashboard.php');
    exit();
}

$quiz_id = intval($_GET['quiz_id']);
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
    
    // Get quiz details (simpler query without counts)
    $quizStmt = $pdo->prepare("
        SELECT q.*
        FROM quizzes q 
        WHERE q.id = ? AND q.teacher_id = ?
    ");
    $quizStmt->execute([$quiz_id, $teacher_id]);
    $quiz = $quizStmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$quiz) {
        // Quiz not found or teacher doesn't own this quiz
        header('Location: teacher-dashboard.php');
        exit();
    }
    
    // Get student scores for this specific quiz
    $scoresStmt = $pdo->prepare("
        SELECT s.*, u.full_name as student_name, u.grade_level, u.class_name
        FROM scores s 
        JOIN users u ON s.student_id = u.id
        WHERE s.quiz_id = ?
        ORDER BY s.score DESC, s.completed_at DESC
    ");
    $scoresStmt->execute([$quiz_id]);
    $studentScores = $scoresStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Calculate statistics
    $total_students = count($studentScores);
    $average_score = 0;
    $highest_score = 0;
    $lowest_score = 100;
    
    if ($total_students > 0) {
        $total_score = 0;
        foreach ($studentScores as $score) {
            $total_score += $score['score'];
            if ($score['score'] > $highest_score) $highest_score = $score['score'];
            if ($score['score'] < $lowest_score) $lowest_score = $score['score'];
        }
        $average_score = $total_score / $total_students;
    } else {
        $highest_score = 0;
        $lowest_score = 0;
    }
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Helper functions
function formatDate($date) {
    return date('M j, Y g:i A', strtotime($date));
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

function getGradeColor($score) {
    if ($score >= 90) return 'text-success';
    if ($score >= 80) return 'text-primary';
    if ($score >= 70) return 'text-warning';
    if ($score >= 60) return 'text-info';
    return 'text-danger';
}

function getGradeBadge($score) {
    if ($score >= 90) return '<span class="badge bg-success">A</span>';
    if ($score >= 80) return '<span class="badge bg-primary">B</span>';
    if ($score >= 70) return '<span class="badge bg-warning">C</span>';
    if ($score >= 60) return '<span class="badge bg-info">D</span>';
    return '<span class="badge bg-danger">F</span>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Scores | MIEL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
            max-width: 450px;
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
        
        .quiz-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
        
        .scores-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 15px;
        }
        
        .scores-table thead th {
            background: var(--primary-blue);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
            border: none;
        }
        
        .scores-table thead th:first-child {
            border-top-left-radius: 15px;
        }
        
        .scores-table thead th:last-child {
            border-top-right-radius: 15px;
        }
        
        .scores-table tbody tr {
            background: white;
            transition: all 0.3s;
        }
        
        .scores-table tbody tr:hover {
            background: #F8F9FF;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.1);
        }
        
        .scores-table tbody td {
            padding: 15px;
            border-bottom: 3px solid #F0F0F0;
        }
        
        .scores-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .student-name-cell {
            font-weight: bold;
            color: var(--text-dark);
        }
        
        .student-info-cell {
            color: #666;
        }
        
        .score-cell {
            font-weight: bold;
            text-align: center;
        }
        
        .score-percentage {
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .date-cell {
            color: #666;
            font-size: 0.9rem;
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
            
            .quiz-info-grid {
                grid-template-columns: 1fr;
            }
            
            .scores-table {
                display: block;
                overflow-x: auto;
            }
            
            .scores-table thead th,
            .scores-table tbody td {
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="plans.php">Plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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
                <i class="fas fa-chart-line logo-icon"></i>
                <div>
                    <h1>Quiz Scores</h1>
                    <p class="subtitle">View Student Performance for <?php echo htmlspecialchars($quiz['title']); ?></p>
                </div>
            </div>
            <div class="welcome-message">
                Hello, Teacher <strong><?php echo htmlspecialchars($teacher['full_name']); ?></strong>!
            </div>
        </header>

        <!-- QUIZ INFO -->
        <div class="card fade-in">
            <h2 class="card-title">
                <i class="fas fa-info-circle"></i> Quiz Information
            </h2>
            
            <!-- QUIZ TITLE -->
            <div style="margin-bottom: 20px;">
                <div style="color: var(--primary-blue); font-size: 1.3rem; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-clipboard-list"></i> Quiz Title
                </div>
                <div style="font-size: 1.6rem; font-weight: bold; color: var(--text-dark);">
                    <?php echo htmlspecialchars($quiz['title']); ?>
                </div>
            </div>
            
            <div class="quiz-info-grid">
                <!-- INTELLIGENCE TYPE -->
                <?php if ($quiz['intelligence_type']): ?>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-<?php echo getIntelligenceIcon($quiz['intelligence_type']); ?>"></i>
                    </div>
                    <div>
                        <div class="info-label">Intelligence Type</div>
                        <div class="info-value"><?php echo getIntelligenceName($quiz['intelligence_type']); ?></div>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- VIRTUAL WORLD -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-<?php echo getWorldIcon($quiz['virtual_world']); ?>"></i>
                    </div>
                    <div>
                        <div class="info-label">Virtual World</div>
                        <div class="info-value"><?php echo getWorldName($quiz['virtual_world']); ?></div>
                    </div>
                </div>
            </div>
            
            <!-- QUIZ DESCRIPTION -->
            <?php if ($quiz['description']): ?>
            <div style="background: #F8F9FF; border-radius: 15px; padding: 20px; margin-top: 20px; border: 3px solid #E0E0E0;">
                <div style="color: var(--primary-blue); font-size: 1.1rem; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-align-left"></i> Quiz Description
                </div>
                <div><?php echo nl2br(htmlspecialchars($quiz['description'])); ?></div>
            </div>
            <?php endif; ?>
        </div>

        <!-- STUDENT SCORES TABLE -->
        <div class="card fade-in">
            <h2 class="card-title">
                <i class="fas fa-user-graduate"></i> Student Scores
                <span class="badge" style="background: var(--primary-blue); color: white; margin-left: 10px;">
                    <?php echo $total_students; ?> students
                </span>
            </h2>
            
            <?php if ($total_students > 0): ?>
            <div style="overflow-x: auto;">
                <table class="scores-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Grade Level</th>
                            <th>Class</th>
                            <th>Score</th>
                            <th>Grade</th>
                            <th>Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($studentScores as $score): ?>
                            <tr>
                                <td class="student-name-cell">
                                    <?php echo htmlspecialchars($score['student_name']); ?>
                                </td>
                                <td class="student-info-cell">
                                    <?php echo $score['grade_level']; ?>
                                </td>
                                <td class="student-info-cell">
                                    <?php echo htmlspecialchars($score['class_name'] ?: 'N/A'); ?>
                                </td>
                                <td class="score-cell">
                                    <div class="score-percentage <?php echo getGradeColor($score['score']); ?>">
                                        <?php echo $score['score']; ?>%
                                    </div>
                                </td>
                                <td class="score-cell">
                                    <?php echo getGradeBadge($score['score']); ?>
                                </td>
                                <td class="date-cell">
                                    <?php echo formatDate($score['completed_at']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- STATS SUMMARY -->
            <div style="margin-top: 25px; padding: 20px; background: #F8F9FF; border-radius: 15px; border: 3px solid #E0E0E0;">
                <h4 style="color: var(--primary-blue); margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-chart-bar"></i> Score Statistics
                </h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                    <div style="text-align: center;">
                        <div style="font-size: 2rem; font-weight: bold; color: var(--primary-blue);">
                            <?php echo number_format($average_score, 1); ?>%
                        </div>
                        <div style="color: #666; font-size: 0.9rem;">Average Score</div>
                    </div>
                    
                    <div style="text-align: center;">
                        <div style="font-size: 2rem; font-weight: bold; color: var(--secondary-green);">
                            <?php echo $highest_score; ?>%
                        </div>
                        <div style="color: #666; font-size: 0.9rem;">Highest Score</div>
                    </div>
                    
                    <div style="text-align: center;">
                        <div style="font-size: 2rem; font-weight: bold; color: #FF6B6B;">
                            <?php echo $lowest_score; ?>%
                        </div>
                        <div style="color: #666; font-size: 0.9rem;">Lowest Score</div>
                    </div>
                    
                    <div style="text-align: center;">
                        <div style="font-size: 2rem; font-weight: bold; color: #9C27B0;">
                            <?php echo $total_students; ?>
                        </div>
                        <div style="color: #666; font-size: 0.9rem;">Total Students</div>
                    </div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="action-btn" onclick="exportQuizScores()">
                    <i class="fas fa-download"></i> Export Scores (CSV)
                </button>
                
                <button class="action-btn" onclick="printScores()">
                    <i class="fas fa-print"></i> Print Scores
                </button>
            </div>
            <?php else: ?>
            <div style="text-align: center; padding: 40px; color: #666;">
                <i class="fas fa-chart-bar" style="font-size: 4rem; color: #FFD166; margin-bottom: 20px;"></i>
                <h4 style="color: #FF9800;">No Students Have Taken This Quiz Yet</h4>
                <p>Share the quiz with your students to see their scores here.</p>
            </div>
            <?php endif; ?>
        </div>

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
        // Export scores function
        function exportQuizScores() {
            alert('Exporting quiz scores to CSV - This would download a CSV file in the full version.');
        }
        
        // Print scores function
        function printScores() {
            window.print();
        }
        
        // Auto-refresh every 60 seconds to check for new scores
        setInterval(() => {
            if (!document.hidden) {
                console.log('Auto-refreshing quiz scores page...');
                window.location.reload();
            }
        }, 60000);
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault();
                printScores();
            }
            
            if (e.ctrlKey && e.key === 'e') {
                e.preventDefault();
                exportQuizScores();
            }
            
            if (e.key === 'Escape') {
                window.location.href = 'teacher-dashboard.php';
            }
        });
        
        // Add hover effects to table rows
        document.querySelectorAll('.scores-table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Add hover effects to info items
        document.querySelectorAll('.info-item').forEach(item => {
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
</body>
</html>