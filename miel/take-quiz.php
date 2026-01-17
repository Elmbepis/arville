<?php
// take-quiz.php
session_start();

// Check if user is logged in (student or teacher can take quizzes)
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Check if quiz_id is provided
if (!isset($_GET['quiz_id'])) {
    header('Location: student-dashboard.php');
    exit();
}

$quiz_id = intval($_GET['quiz_id']);
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];

// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username = 'root';
$password = 'AcadeV25!';

$showResults = false;
$score = 0;
$totalQuestions = 0;
$correctAnswers = 0;
$studentAnswers = [];
$questionDetails = [];
$quiz = null;
$questions = [];
$hasTakenQuiz = false;
$existingScore = null;
$noQuestions = false;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get quiz details
    $quizStmt = $pdo->prepare("
        SELECT q.*, u.full_name as teacher_name 
        FROM quizzes q 
        JOIN users u ON q.teacher_id = u.id
        WHERE q.id = ?
    ");
    $quizStmt->execute([$quiz_id]);
    $quiz = $quizStmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$quiz) {
        die("Quiz not found!");
    }
    
    // Get questions for this quiz - FIXED QUERY
    $questionsStmt = $pdo->prepare("
        SELECT id, quiz_id, qtype, question_text, options, correct_answer
        FROM questions 
        WHERE quiz_id = ? 
        ORDER BY id ASC
    ");
    $questionsStmt->execute([$quiz_id]);
    $questions = $questionsStmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($questions)) {
        $noQuestions = true;
    }
    
    // Check if student has already taken this quiz
    $checkScoreStmt = $pdo->prepare("
        SELECT * FROM scores 
        WHERE quiz_id = ? AND student_id = ?
    ");
    $checkScoreStmt->execute([$quiz_id, $user_id]);
    $existingScore = $checkScoreStmt->fetch(PDO::FETCH_ASSOC);
    
    $hasTakenQuiz = ($existingScore !== false);
    
    // If student has already taken the quiz, get their answers and calculate results
    if ($hasTakenQuiz && $existingScore) {
        $score = $existingScore['score'];
        $totalQuestions = count($questions);
        $correctAnswers = 0;
        $savedAnswers = json_decode($existingScore['answers'], true);
        $savedAnswers = is_array($savedAnswers) ? $savedAnswers : [];
        
        // Reconstruct question details for display
        foreach ($questions as $question) {
            $questionId = $question['id'];
            $studentAnswer = $savedAnswers[$questionId] ?? '';
            $correctAnswerKey = $question['correct_answer'];
            $options = json_decode($question['options'], true);
            $questionType = $question['qtype'] ?? 'MC';
            
            // Get correct answer text for display
            $correctAnswerText = '';
            $isCorrect = false;
            
            switch ($questionType) {
                case 'MC':
                    // Multiple Choice: compare selected letter (A, B, C, D)
                    $correctAnswerText = $options[$correctAnswerKey] ?? '';
                    if (strtoupper(trim($studentAnswer)) === strtoupper(trim($correctAnswerKey))) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                case 'TF':
                    // True/False: compare True/False (case-insensitive)
                    $correctAnswerText = ($correctAnswerKey == 'A') ? 'True' : 'False';
                    if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                case 'FB':
                    // Fill in the Blank: compare text (case-insensitive)
                    $correctAnswerText = $options['A'] ?? '';
                    if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                default:
                    // Default to multiple choice logic
                    $correctAnswerText = $options[$correctAnswerKey] ?? '';
                    if (strtoupper(trim($studentAnswer)) === strtoupper(trim($correctAnswerKey))) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
            }
            
            // Store question details for results display
            $questionDetails[] = [
                'question_id' => $questionId,
                'question_text' => $question['question_text'],
                'question_type' => $questionType,
                'student_answer' => $studentAnswer,
                'correct_answer' => $correctAnswerText,
                'is_correct' => $isCorrect,
                'options' => $options,
                'correct_answer_key' => $correctAnswerKey
            ];
        }
        
        // Set showResults to true so it displays the detailed review
        $showResults = true;
    }
    
    // Handle quiz submission (new attempt)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_quiz']) && !$hasTakenQuiz) {
        $totalQuestions = count($questions);
        $correctAnswers = 0;
        $studentAnswers = [];
        $questionDetails = [];
        
        foreach ($questions as $question) {
            $questionId = $question['id'];
            $studentAnswer = $_POST['question_' . $questionId] ?? '';
            $correctAnswerKey = $question['correct_answer'];
            $options = json_decode($question['options'], true);
            $questionType = $question['qtype'] ?? 'MC';
            
            // Store student answer
            $studentAnswers[$questionId] = $studentAnswer;
            
            // Get correct answer text for display
            $correctAnswerText = '';
            $isCorrect = false;
            
            switch ($questionType) {
                case 'MC':
                    // Multiple Choice: compare selected letter (A, B, C, D)
                    $correctAnswerText = $options[$correctAnswerKey] ?? '';
                    if (strtoupper(trim($studentAnswer)) === strtoupper(trim($correctAnswerKey))) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                case 'TF':
                    // True/False: compare True/False (case-insensitive)
                    $correctAnswerText = ($correctAnswerKey == 'A') ? 'True' : 'False';
                    if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                case 'FB':
                    // Fill in the Blank: compare text (case-insensitive)
                    $correctAnswerText = $options['A'] ?? '';
                    if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                default:
                    // Default to multiple choice logic
                    $correctAnswerText = $options[$correctAnswerKey] ?? '';
                    if (strtoupper(trim($studentAnswer)) === strtoupper(trim($correctAnswerKey))) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
            }
            
            // Store question details for results display
            $questionDetails[] = [
                'question_id' => $questionId,
                'question_text' => $question['question_text'],
                'question_type' => $questionType,
                'student_answer' => $studentAnswer,
                'correct_answer' => $correctAnswerText,
                'is_correct' => $isCorrect,
                'options' => $options,
                'correct_answer_key' => $correctAnswerKey
            ];
        }
        
        $score = ($totalQuestions > 0) ? round(($correctAnswers / $totalQuestions) * 100) : 0;
        
        // Save score and answers to database
        $saveScoreStmt = $pdo->prepare("
            INSERT INTO scores (student_id, quiz_id, score, answers, completed_at) 
            VALUES (?, ?, ?, ?, NOW())
        ");
        $saveScoreStmt->execute([
            $user_id, 
            $quiz_id, 
            $score, 
            json_encode($studentAnswers)
        ]);
        
        // Set flag to show results
        $showResults = true;
        $hasTakenQuiz = true; // Update flag since we just submitted
    }
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Helper functions
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $showResults ? 'Quiz Results' : 'Take Quiz'; ?> | MIEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --correct-color: #50C878;
            --incorrect-color: #FF6B6B;
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
            color: var(--text-dark);
            background: linear-gradient(135deg, #E3F2FD 0%, #F3E5F5 100%);
            min-height: 100vh;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-image: url('background-tile.jpg');
            background-repeat: repeat;
            background-size: 1980px 1080px;
            opacity: 0.9;
            z-index: -1;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(248, 249, 255, 0.3);
            z-index: -3;
        }
        
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        
        /* Navbar adjustments */
        .navbar {
            font-family: 'Arial', sans-serif !important;
            font-weight: 300 !important;
            margin-bottom: -50px;
            margin-top: -20px
        }

        .navbar-nav .nav-link {
            font-size: 1.0rem !important;
            color: #333 !important;
            transition: color 0.3s ease !important;
            margin-top: 20px
        }

        .navbar-nav .nav-link:hover {
            color: #4A90E2 !important;
        }
        
        .navbar-brand {
            margin-bottom: -20px !important;
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
        
        /* MIEL Banner */
        .miel-banner-container {
            text-align: center;
            margin-top: 80px !important;
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .miel-banner {
            width: 100%;
            height: auto;
            display: block;
        }
        
        /* Dashboard Header */
        .dashboard-header {
            text-align: center;
            margin-bottom: 25px;
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        h1 { color: var(--primary-blue); font-size: 2.2rem; margin-bottom: 10px; }
        .subtitle { color: var(--secondary-green); font-size: 1.2rem; }
        
        /* Main Card */
        .main-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
        }
        
        /* Quiz Info */
        .quiz-info-section {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            border: 3px solid #E0E0E0;
        }
        
        .quiz-info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 15px;
        }
        
        @media (max-width: 768px) {
            .quiz-info-grid { grid-template-columns: 1fr; }
        }
        
        .quiz-info-item {
            background: white;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            border: 2px solid #E0E0E0;
            transition: all 0.3s;
        }
        
        .quiz-info-item:hover {
            transform: translateY(-3px);
            border-color: var(--primary-blue);
        }
        
        /* Question Items */
        .questions-container { margin-bottom: 30px; }
        
        .question-item {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            border: 3px solid #E0E0E0;
            position: relative;
            transition: all 0.3s;
        }
        
        .question-item:hover { border-color: var(--primary-blue); }
        
        /* Show check/X marks in results mode */
        .question-item.correct {
            border-color: var(--correct-color);
            background: #F1F8E9;
        }
        
        .question-item.incorrect {
            border-color: var(--incorrect-color);
            background: #FFEBEE;
        }
        
        .status-indicator {
            position: absolute;
            top: -15px;
            right: -15px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: var(--shadow);
        }
        
        .status-correct {
            background: var(--correct-color);
            color: white;
        }
        
        .status-incorrect {
            background: var(--incorrect-color);
            color: white;
        }
        
        .question-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #F0F0F0;
        }
        
        .question-number {
            width: 40px;
            height: 40px;
            background: var(--primary-blue);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        
        .question-text {
            font-size: 1.2rem;
            color: var(--text-dark);
            flex: 1;
            line-height: 1.5;
        }
        
        /* Options Grid */
        .options-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
            margin-top: 15px;
        }
        
        .option-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            background: #F8F9FF;
            border-radius: 10px;
            border: 2px solid #E0E0E0;
            transition: all 0.2s;
            cursor: pointer;
        }
        
        .option-row:hover {
            background: #F0F8FF;
            border-color: var(--primary-blue);
        }
        
        /* In results mode, show correct/incorrect option highlighting */
        .option-row.correct-option {
            background: #E8F5E9 !important;
            border-color: var(--correct-color) !important;
        }
        
        .option-row.incorrect-selected {
            background: #FFEBEE !important;
            border-color: var(--incorrect-color) !important;
        }
        
        .option-row.selected {
            background: #E3F2FD;
            border-color: var(--primary-blue);
        }
        
        .option-input {
            width: 20px;
            height: 20px;
            cursor: pointer;
            flex-shrink: 0;
        }
        
        .option-content {
            font-size: 1.1rem;
            color: var(--text-dark);
            flex: 1;
        }
        
        /* Fill in blank */
        .fill-blank-input {
            width: 100%;
            padding: 15px;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            font-size: 1.1rem;
            font-family: inherit;
            transition: all 0.3s;
        }
        
        .fill-blank-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        
        /* Results mode answer display */
        .answer-display {
            margin-top: 15px;
            padding: 15px;
            border-radius: 10px;
            border-left: 5px solid;
        }
        
        .student-answer-display {
            background: #FFF3E0;
            border-left-color: #FFB74D;
        }
        
        .correct-answer-display {
            background: #E8F5E9;
            border-left-color: var(--correct-color);
        }
        
        .answer-label {
            font-weight: bold;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        /* Submit Section */
        .submit-section {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            border: 3px solid #E0E0E0;
            margin-top: 30px;
        }
        
        /* Results Section */
        .results-section {
            text-align: center;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 15px;
            background: linear-gradient(135deg, #E8F5E9, #E3F2FD);
            border: 3px solid var(--secondary-green);
        }
        
        .score-display {
            font-size: 3.5rem;
            font-weight: bold;
            margin: 20px 0;
            color: var(--primary-blue);
        }
        
        /* Buttons */
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
        
        .btn-success {
            background: var(--secondary-green);
            color: white;
        }
        
        .btn-success:hover {
            background: #3DAF5E;
            transform: translateY(-3px);
        }
        
        .btn-primary {
            background: var(--primary-blue);
            color: white;
        }
        
        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-3px);
        }
        
        /* Bottom Buttons */
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
        
        @media (max-width: 768px) {
            .container { padding: 10px; }
            .bottom-buttons-container { flex-direction: column; gap: 10px; }
            .btn { width: 100%; }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in { animation: fadeIn 0.5s ease; }
        
        @keyframes celebrate {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .celebrate { animation: celebrate 0.5s ease; }
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
        <!-- HEADER -->
        <header class="dashboard-header fade-in">
            <div>
                <?php if ($hasTakenQuiz): ?>
                    <img src="images/my-quiz-score.jpg" alt="My Quiz Score" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                <?php else: ?>
                    <img src="images/take-quiz.jpg" alt="Take Quiz" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                <?php endif; ?>
                <p class="subtitle">
                    <?php if ($showResults): ?>
                        See how you did in this quiz:<br/><span style="color: #3628C3; font-weight: bold; font-size: 1.1em;"><?php echo htmlspecialchars($quiz['title']); ?></span>
                    <?php elseif ($hasTakenQuiz): ?>
                        View your score for this quiz:<br/><span style="color: #3628C3; font-weight: bold; font-size: 1.1em;"><?php echo htmlspecialchars($quiz['title']); ?></span>
                    <?php else: ?>
                        Take this quiz:<br/><span style="color: #3628C3; font-weight: bold; font-size: 1.1em;"><?php echo htmlspecialchars($quiz['title']); ?></span>
                    <?php endif; ?>
                </p>
            </div>
        </header>

        <!-- MAIN CARD -->
        <div class="main-card">
            <!-- QUIZ INFO -->
            <div class="quiz-info-section fade-in">
                <h3 style="color: var(--primary-blue); margin-bottom: 15px;">
                    <i class="fas fa-info-circle"></i> Quiz Information
                </h3>
                
                <div class="quiz-info-grid">
                    <div class="quiz-info-item">
                        <i class="fas fa-brain quiz-info-icon"></i>
                        <div class="quiz-info-label">Intelligence Type</div>
                        <div class="quiz-info-value"><?php echo getIntelligenceName($quiz['intelligence_type']); ?></div>
                    </div>
                    
                    <div class="quiz-info-item">
                        <i class="fas fa-globe-americas quiz-info-icon"></i>
                        <div class="quiz-info-label">Virtual World</div>
                        <div class="quiz-info-value"><?php echo getWorldName($quiz['virtual_world']); ?></div>
                    </div>
                    
                    <div class="quiz-info-item">
                        <i class="fas fa-user-tie quiz-info-icon"></i>
                        <div class="quiz-info-label">Teacher</div>
                        <div class="quiz-info-value"><?php echo htmlspecialchars($quiz['teacher_name']); ?></div>
                    </div>
                    
                    <div class="quiz-info-item">
                        <i class="fas fa-question quiz-info-icon"></i>
                        <div class="quiz-info-label">Questions</div>
                        <div class="quiz-info-value"><?php echo count($questions); ?></div>
                    </div>
                    
                    <div class="quiz-info-item">
                        <i class="fas fa-calendar-alt quiz-info-icon"></i>
                        <div class="quiz-info-label"><?php echo $showResults ? 'Completed' : 'Created'; ?> On</div>
                        <div class="quiz-info-value">
                            <?php if ($showResults): ?>
                                <?php echo date('M j, Y g:i A'); ?>
                            <?php else: ?>
                                <?php echo date('M j, Y', strtotime($quiz['created_at'])); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if ($showResults): ?>
                    <div class="quiz-info-item">
                        <i class="fas fa-chart-line quiz-info-icon"></i>
                        <div class="quiz-info-label">Your Score</div>
                        <div class="quiz-info-value" style="color: var(--primary-blue); font-size: 1.3rem;">
                            <?php echo $score; ?>%
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($noQuestions): ?>
                <!-- NO QUESTIONS -->
                <div class="results-section fade-in" style="background: linear-gradient(135deg, #FFEBEE, #FFF3E0); border-color: #FF6B6B;">
                    <div style="color: #FF6B6B; font-size: 4rem; margin-bottom: 20px;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h2 style="color: #FF6B6B; margin-bottom: 15px;">No Questions Available</h2>
                    <p style="color: #666; margin-bottom: 20px;">
                        This quiz doesn't have any questions yet.
                    </p>
                    <div style="display: flex; gap: 15px; justify-content: center;">
                        <a href="student-dashboard.php" class="btn btn-primary">
                            <i class="fas fa-tachometer-alt"></i> Back to Dashboard
                        </a>
                    </div>
                </div>
                
            <?php elseif ($showResults): ?>
                <!-- RESULTS WITH CHECK/X MARKS -->
                <div class="results-section fade-in">
                    <?php if ($score >= 80): ?>
                        <div style="color: var(--secondary-green); font-size: 4rem; margin-bottom: 20px;">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h2 style="color: var(--secondary-green); margin-bottom: 15px;">Excellent Work!</h2>
                    <?php elseif ($score >= 60): ?>
                        <div style="color: var(--primary-blue); font-size: 4rem; margin-bottom: 20px;">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <h2 style="color: var(--primary-blue); margin-bottom: 15px;">Good Job!</h2>
                    <?php else: ?>
                        <div style="color: #FF6B6B; font-size: 4rem; margin-bottom: 20px;">
                            <i class="fas fa-redo"></i>
                        </div>
                        <h2 style="color: #FF6B6B; margin-bottom: 15px;">Keep Practicing!</h2>
                    <?php endif; ?>
                    
                    <div class="score-display celebrate"><?php echo $score; ?>%</div>
                    
                    <div style="color: #666; margin-top: 15px;">
                        <p><i class="fas fa-check-circle" style="color: var(--secondary-green);"></i> 
                           <strong><?php echo $correctAnswers; ?></strong> out of <strong><?php echo $totalQuestions; ?></strong> questions correct</p>
                        <?php if ($existingScore): ?>
                        <p><i class="fas fa-calendar-alt" style="color: #666;"></i> 
                           Completed on: <?php echo date('M j, Y g:i A', strtotime($existingScore['completed_at'])); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- QUESTIONS WITH CHECK/X MARKS -->
                <div class="questions-container">
                    <?php foreach ($questionDetails as $index => $detail): ?>
                    <div class="question-item fade-in <?php echo $detail['is_correct'] ? 'correct' : 'incorrect'; ?>">
                        <!-- Check/X mark indicator -->
                        <div class="status-indicator <?php echo $detail['is_correct'] ? 'status-correct' : 'status-incorrect'; ?>">
                            <i class="fas fa-<?php echo $detail['is_correct'] ? 'check' : 'times'; ?>"></i>
                        </div>
                        
                        <div class="question-header">
                            <div class="question-number"><?php echo $index + 1; ?></div>
                            <div class="question-text"><?php echo nl2br(htmlspecialchars($detail['question_text'])); ?></div>
                        </div>
                        
                        <?php if ($detail['question_type'] === 'MC'): ?>
                            <!-- Multiple Choice Results -->
                            <div class="options-grid">
                                <?php 
                                $options = $detail['options'];
                                // Get only answer options (A, B, C, D)
                                $answerOptions = [];
                                foreach (['A', 'B', 'C', 'D'] as $letter) {
                                    if (isset($options[$letter]) && $options[$letter] !== '') {
                                        $answerOptions[$letter] = $options[$letter];
                                    }
                                }
                                
                                foreach ($answerOptions as $letter => $optionText):
                                    $isCorrectOption = ($letter === $detail['correct_answer_key']);
                                    $isSelected = ($detail['student_answer'] === $letter);
                                    $optionClass = '';
                                    
                                    if ($isCorrectOption) {
                                        $optionClass = 'correct-option';
                                    } elseif ($isSelected && !$isCorrectOption) {
                                        $optionClass = 'incorrect-selected';
                                    } elseif ($isSelected) {
                                        $optionClass = 'selected';
                                    }
                                ?>
                                <div class="option-row <?php echo $optionClass; ?>">
                                    <div class="option-input">
                                        <?php if ($isSelected): ?>
                                            <i class="fas fa-dot-circle" style="color: <?php echo $isCorrectOption ? 'var(--correct-color)' : 'var(--incorrect-color)'; ?>;"></i>
                                        <?php else: ?>
                                            <i class="far fa-circle" style="color: <?php echo $isCorrectOption ? 'var(--correct-color)' : '#666'; ?>;"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="option-content">
                                        <?php echo htmlspecialchars($optionText); ?>
                                        <?php if ($isCorrectOption): ?>
                                            <span style="color: var(--correct-color); margin-left: 10px;">
                                                <i class="fas fa-check"></i> Correct Answer
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            
                        <?php elseif ($detail['question_type'] === 'TF'): ?>
                            <!-- True/False Results -->
                            <div class="options-grid">
                                <?php 
                                $trueFalseOptions = ['True', 'False'];
                                foreach ($trueFalseOptions as $option):
                                    $isCorrectOption = ($option === $detail['correct_answer']);
                                    $isSelected = ($detail['student_answer'] === $option);
                                    $optionClass = '';
                                    
                                    if ($isCorrectOption) {
                                        $optionClass = 'correct-option';
                                    } elseif ($isSelected && !$isCorrectOption) {
                                        $optionClass = 'incorrect-selected';
                                    } elseif ($isSelected) {
                                        $optionClass = 'selected';
                                    }
                                ?>
                                <div class="option-row <?php echo $optionClass; ?>">
                                    <div class="option-input">
                                        <?php if ($isSelected): ?>
                                            <i class="fas fa-dot-circle" style="color: <?php echo $isCorrectOption ? 'var(--correct-color)' : 'var(--incorrect-color)'; ?>;"></i>
                                        <?php else: ?>
                                            <i class="far fa-circle" style="color: <?php echo $isCorrectOption ? 'var(--correct-color)' : '#666'; ?>;"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="option-content">
                                        <?php echo $option; ?>
                                        <?php if ($isCorrectOption): ?>
                                            <span style="color: var(--correct-color); margin-left: 10px;">
                                                <i class="fas fa-check"></i> Correct Answer
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            
                        <?php elseif ($detail['question_type'] === 'FB'): ?>
                            <!-- Fill in Blank Results -->
                            <div class="answer-display student-answer-display">
                                <div class="answer-label">
                                    <i class="fas fa-user"></i> Your Answer:
                                </div>
                                <div style="font-size: 1.2rem; color: #E65100;">
                                    <?php echo htmlspecialchars($detail['student_answer'] ?: 'Not answered'); ?>
                                </div>
                            </div>
                            
                            <div class="answer-display correct-answer-display" style="margin-top: 10px;">
                                <div class="answer-label">
                                    <i class="fas fa-check-circle" style="color: var(--correct-color);"></i> Correct Answer:
                                </div>
                                <div style="font-size: 1.2rem; color: #2E7D32;">
                                    <?php echo htmlspecialchars($detail['correct_answer']); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>

            <?php else: ?>
                <!-- QUIZ FORM (TAKING THE QUIZ) -->
                <form method="POST" action="take-quiz.php?quiz_id=<?php echo $quiz_id; ?>" id="quizForm">
                    <div class="questions-container">
                        <?php foreach ($questions as $index => $question): 
                            $questionId = $question['id'];
                            $questionText = $question['question_text'];
                            $questionType = $question['qtype'] ?? 'MC';
                            $options = json_decode($question['options'], true);
                            $options = is_array($options) ? $options : [];
                        ?>
                            <div class="question-item fade-in">
                                <div class="question-header">
                                    <div class="question-number"><?php echo $index + 1; ?></div>
                                    <div class="question-text"><?php echo nl2br(htmlspecialchars($questionText)); ?></div>
                                </div>
                                
                                <?php if ($questionType === 'MC'): ?>
                                    <!-- Multiple Choice Options -->
                                    <div class="options-grid">
                                        <?php 
                                        // Get answer options
                                        $answerOptions = [];
                                        foreach (['A', 'B', 'C', 'D'] as $letter) {
                                            if (isset($options[$letter]) && $options[$letter] !== '') {
                                                $answerOptions[$letter] = $options[$letter];
                                            }
                                        }
                                        
                                        // Shuffle options
                                        $shuffledOptions = $answerOptions;
                                        uksort($shuffledOptions, function() { return rand() - rand(); });
                                        ?>
                                        
                                        <?php foreach ($shuffledOptions as $letter => $optionText): ?>
                                            <div class="option-row">
                                                <input type="radio" 
                                                       class="option-input"
                                                       name="question_<?php echo $questionId; ?>" 
                                                       value="<?php echo $letter; ?>"
                                                       id="q<?php echo $questionId; ?>_<?php echo $letter; ?>">
                                                <label for="q<?php echo $questionId; ?>_<?php echo $letter; ?>" class="option-content">
                                                    <?php echo htmlspecialchars($optionText); ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    
                                <?php elseif ($questionType === 'TF'): ?>
                                    <!-- True/False Options -->
                                    <div class="options-grid">
                                        <?php 
                                        $trueFalseOptions = ['True', 'False'];
                                        ?>
                                        
                                        <?php foreach ($trueFalseOptions as $option): ?>
                                            <div class="option-row">
                                                <input type="radio" 
                                                       class="option-input"
                                                       name="question_<?php echo $questionId; ?>" 
                                                       value="<?php echo $option; ?>"
                                                       id="q<?php echo $questionId; ?>_<?php echo strtolower($option); ?>">
                                                <label for="q<?php echo $questionId; ?>_<?php echo strtolower($option); ?>" class="option-content">
                                                    <?php echo $option; ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    
                                <?php elseif ($questionType === 'FB'): ?>
                                    <!-- Fill in the Blank -->
                                    <input type="text" 
                                           name="question_<?php echo $questionId; ?>" 
                                           class="fill-blank-input"
                                           placeholder="Type your answer here..."
                                           required>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- SUBMIT SECTION -->
                    <div class="submit-section fade-in">
                        <button type="submit" name="submit_quiz" class="btn btn-success" style="font-size: 1.3rem; padding: 18px 40px;">
                            <i class="fas fa-paper-plane"></i> Submit Quiz Answers
                        </button>
                        <p style="color: #666; margin-top: 15px; font-size: 0.95rem;">
                            <i class="fas fa-info-circle"></i> You cannot change your answers after submitting
                        </p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        <!-- BOTTOM BUTTONS -->
        <div class="bottom-buttons-container fade-in">
            <a href="student-dashboard.php" class="btn btn-primary" style="background: #50C878;">
                <i class="fas fa-tachometer-alt"></i> Back to Dashboard
            </a>
            
            <form method="POST" action="logout.php" style="display: inline;">
                <button type="submit" name="logout" class="btn btn-primary" style="background: #FF6B6B;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        <?php if (!$showResults && !$hasTakenQuiz && !$noQuestions): ?>
        // Quiz taking functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add visual feedback for selected options
            document.querySelectorAll('.option-input').forEach(input => {
                input.addEventListener('change', function() {
                    // Remove selected style from all options in this question
                    const questionName = this.name;
                    document.querySelectorAll(`input[name="${questionName}"]`).forEach(otherInput => {
                        const optionRow = otherInput.closest('.option-row');
                        if (optionRow) {
                            optionRow.classList.remove('selected');
                        }
                    });
                    
                    // Add selected style to current option
                    const currentRow = this.closest('.option-row');
                    if (currentRow) {
                        currentRow.classList.add('selected');
                    }
                    
                    // Save to localStorage
                    saveAnswersToLocalStorage();
                });
            });
            
            // For text inputs
            document.querySelectorAll('.fill-blank-input').forEach(input => {
                input.addEventListener('input', function() {
                    saveAnswersToLocalStorage();
                });
            });
            
            // Load saved answers from localStorage
            loadAnswersFromLocalStorage();
            
            // Form validation
            document.getElementById('quizForm')?.addEventListener('submit', function(e) {
                let allAnswered = true;
                const unanswered = [];
                
                // Check each question
                document.querySelectorAll('.question-item').forEach((questionItem, index) => {
                    let answered = false;
                    
                    // Check for radio buttons
                    const radioChecked = questionItem.querySelector('input[type="radio"]:checked');
                    if (radioChecked) {
                        answered = true;
                    }
                    
                    // Check for text input (fill in blank)
                    const textInput = questionItem.querySelector('input[type="text"]');
                    if (textInput && textInput.value.trim() !== '') {
                        answered = true;
                    }
                    
                    if (!answered) {
                        allAnswered = false;
                        unanswered.push(index + 1);
                    }
                });
                
                if (!allAnswered) {
                    e.preventDefault();
                    const confirmSubmit = confirm(`You have ${unanswered.length} unanswered question(s): ${unanswered.join(', ')}\n\nSubmit anyway?`);
                    if (!confirmSubmit) {
                        // Scroll to first unanswered question
                        const firstUnanswered = unanswered[0] - 1;
                        const questionItems = document.querySelectorAll('.question-item');
                        if (questionItems[firstUnanswered]) {
                            questionItems[firstUnanswered].scrollIntoView({ 
                                behavior: 'smooth', 
                                block: 'center' 
                            });
                            
                            // Highlight the unanswered question
                            questionItems[firstUnanswered].style.boxShadow = '0 0 0 3px rgba(255, 107, 107, 0.3)';
                            setTimeout(() => {
                                questionItems[firstUnanswered].style.boxShadow = '';
                            }, 2000);
                        }
                        return false;
                    }
                }
                
                // Clear localStorage on successful submit
                localStorage.removeItem('quiz_answers_<?php echo $quiz_id; ?>');
                return true;
            });
        });
        
        function saveAnswersToLocalStorage() {
            const answers = {};
            document.querySelectorAll('.question-item').forEach(questionItem => {
                const inputs = questionItem.querySelectorAll('input');
                inputs.forEach(input => {
                    if (input.type === 'radio' && input.checked) {
                        answers[input.name] = input.value;
                    } else if (input.type === 'text') {
                        answers[input.name] = input.value;
                    }
                });
            });
            localStorage.setItem('quiz_answers_<?php echo $quiz_id; ?>', JSON.stringify(answers));
        }
        
        function loadAnswersFromLocalStorage() {
            const savedAnswers = localStorage.getItem('quiz_answers_<?php echo $quiz_id; ?>');
            if (savedAnswers) {
                const answers = JSON.parse(savedAnswers);
                Object.keys(answers).forEach(questionName => {
                    const answer = answers[questionName];
                    if (answer) {
                        // Find the radio button with matching value
                        const input = document.querySelector(`input[name="${questionName}"][value="${answer}"]`);
                        if (input) {
                            input.checked = true;
                            input.dispatchEvent(new Event('change'));
                        } else {
                            // For text inputs
                            const textInput = document.querySelector(`input[name="${questionName}"]`);
                            if (textInput && textInput.type === 'text') {
                                textInput.value = answer;
                            }
                        }
                    }
                });
            }
        }
        <?php endif; ?>
        
        // Make banner interactive
        document.querySelector('.miel-banner')?.addEventListener('click', function() {
            alert('MIEL - Test your knowledge and have fun learning!');
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>