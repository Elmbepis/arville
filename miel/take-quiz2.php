<?php
// take-quiz2.php
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

// Initialize variables
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
$quizComplete = false;

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
    
    // Verify this is an in-world quiz
    if ($quiz['type'] !== 'inworld') {
        header('Location: take-quiz.php?quiz_id=' . $quiz_id);
        exit();
    }
    
    // Get questions for this quiz
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
    
    // If student has already taken the quiz, show results
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
                    $correctAnswerText = $options[$correctAnswerKey] ?? '';
                    if (strtoupper(trim($studentAnswer)) === strtoupper(trim($correctAnswerKey))) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                case 'TF':
                    $correctAnswerText = ($correctAnswerKey == 'A') ? 'True' : 'False';
                    if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                case 'FB':
                    $correctAnswerText = $options['A'] ?? '';
                    if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                case 'CK':
                    $correctAnswerText = $options['A'] ?? ''; // Model name
                    if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                        $isCorrect = true;
                        $correctAnswers++;
                    }
                    break;
                    
                default:
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
        
        $showResults = true;
        $quizComplete = true;
    }
    
    // Handle AJAX submission from the 3D world
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        
        $input = json_decode(file_get_contents('php://input'), true);
        $action = $input['action'] ?? '';
        
        if ($action === 'submit_answer') {
            $questionIndex = intval($input['question_index']);
            $answer = $input['answer'] ?? '';
            
            // Store in session for now
            if (!isset($_SESSION['inworld_quiz_answers'])) {
                $_SESSION['inworld_quiz_answers'] = [];
            }
            $_SESSION['inworld_quiz_answers'][$questionIndex] = $answer;
            
            echo json_encode(['success' => true, 'next' => $questionIndex + 1 < count($questions)]);
            exit();
            
        } elseif ($action === 'complete_quiz') {
            // Calculate and save score
            $answers = $_SESSION['inworld_quiz_answers'] ?? [];
            $totalQuestions = count($questions);
            $correctAnswers = 0;
            $studentAnswers = [];
            $questionDetails = [];
            
            foreach ($questions as $index => $question) {
                $questionId = $question['id'];
                $studentAnswer = $answers[$index] ?? '';
                $correctAnswerKey = $question['correct_answer'];
                $options = json_decode($question['options'], true);
                $questionType = $question['qtype'] ?? 'MC';
                
                $studentAnswers[$questionId] = $studentAnswer;
                
                // Get correct answer text and check if correct
                $correctAnswerText = '';
                $isCorrect = false;
                
                switch ($questionType) {
                    case 'MC':
                        $correctAnswerText = $options[$correctAnswerKey] ?? '';
                        if (strtoupper(trim($studentAnswer)) === strtoupper(trim($correctAnswerKey))) {
                            $isCorrect = true;
                            $correctAnswers++;
                        }
                        break;
                        
                    case 'TF':
                        $correctAnswerText = ($correctAnswerKey == 'A') ? 'True' : 'False';
                        if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                            $isCorrect = true;
                            $correctAnswers++;
                        }
                        break;
                        
                    case 'FB':
                        $correctAnswerText = $options['A'] ?? '';
                        if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                            $isCorrect = true;
                            $correctAnswers++;
                        }
                        break;
                        
                    case 'CK':
                        $correctAnswerText = $options['A'] ?? ''; // Model name
                        if (strcasecmp(trim($studentAnswer), trim($correctAnswerText)) === 0) {
                            $isCorrect = true;
                            $correctAnswers++;
                        }
                        break;
                        
                    default:
                        $correctAnswerText = $options[$correctAnswerKey] ?? '';
                        if (strtoupper(trim($studentAnswer)) === strtoupper(trim($correctAnswerKey))) {
                            $isCorrect = true;
                            $correctAnswers++;
                        }
                }
                
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
            
            // Save to database
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
            
            // Clear session
            unset($_SESSION['inworld_quiz_answers']);
            
            // Return results
            echo json_encode([
                'success' => true,
                'score' => $score,
                'correct' => $correctAnswers,
                'total' => $totalQuestions,
                'details' => $questionDetails
            ]);
            exit();
        }
    }
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Helper functions (same as take-quiz.php)
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

function getQuestionTypeName($qtype) {
    $names = [
        'MC' => 'Multiple Choice',
        'TF' => 'True/False',
        'FB' => 'Fill in Blank',
        'CK' => 'Click On'
    ];
    return $names[$qtype] ?? $qtype;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $showResults ? 'Quiz Results' : 'In-World Quiz'; ?> | MIEL</title>
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
            overflow: hidden; /* Prevent scrolling when iframe is fullscreen */
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
        
        /* Fullscreen container for 3D world */
        .world-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        
        .world-iframe {
            width: 100%;
            height: 100%;
            border: none;
            pointer-events: auto; /* Always allow interaction */
        }
        
        /* Question overlay - bottom left corner */
        .question-overlay {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 400px;
            max-width: 90vw;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            padding: 20px;
            box-shadow: var(--shadow);
            border: 2px solid var(--primary-blue);
            z-index: 10;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            max-height: 70vh;
            overflow-y: auto;
        }
        
        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #E0E0E0;
        }
        
        .question-number-badge {
            background: var(--primary-blue);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
        }
        
        .question-type-badge {
            background: #E0E0E0;
            color: var(--text-dark);
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: bold;
        }
        
        .question-text {
            font-weight: bold;
            margin-bottom: 15px;
            line-height: 1.5;
            font-size: 1rem;
            color: var(--primary-blue);
        }
        
        /* Options for MC/TF questions */
        .options-container {
            margin: 15px 0;
        }
        
        .option-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            margin-bottom: 8px;
            background: #F8F9FF;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .option-row:hover {
            border-color: var(--primary-blue);
            background: #F0F8FF;
        }
        
        .option-row.selected {
            background: #E3F2FD;
            border-color: var(--primary-blue);
        }
        
        .option-letter {
            width: 30px;
            height: 30px;
            background: var(--primary-blue);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            flex-shrink: 0;
        }
        
        .option-content {
            flex: 1;
            font-size: 0.95rem;
        }
        
        /* Fill in blank input */
        .fill-blank-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            margin: 10px 0;
        }
        
        .fill-blank-input:focus {
            outline: none;
            border-color: var(--primary-blue);
        }
        
        /* Click-on specific styles */
        .click-instruction {
            background: #FFF3E0;
            border-left: 4px solid #FF9800;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            font-size: 0.9rem;
        }
        
        .click-instruction i {
            color: #FF9800;
            margin-right: 8px;
        }
        
        /* Navigation buttons */
        .nav-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px solid #E0E0E0;
        }
        
        .nav-btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .next-btn {
            background: var(--secondary-green);
            color: white;
        }
        
        .next-btn:hover {
            background: #3DAF5E;
            transform: translateY(-2px);
        }
        
        .next-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }
        
        /* Progress bar */
        .progress-bar-container {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 250px;
            background: rgba(255,255,255,0.95);
            border-radius: 10px;
            padding: 10px 15px;
            z-index: 10;
            border: 2px solid var(--primary-blue);
            font-size: 0.85rem;
        }
        
        .progress-text {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-weight: bold;
        }
        
        .progress-fill {
            height: 8px;
            background: var(--secondary-green);
            border-radius: 4px;
            width: 0%;
            transition: width 0.3s ease;
        }
        
        /* Message area */
        .message-area {
            margin-top: 10px;
            padding: 8px;
            border-radius: 8px;
            font-size: 0.9rem;
            text-align: center;
            min-height: 40px;
        }
        
        /* Results page styles */
        .results-container {
            position: relative;
            z-index: 20;
            background: rgba(255, 255, 255, 0.98);
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .results-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .score-circle {
            width: 150px;
            height: 150px;
            margin: 20px auto;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
            color: white;
        }
        
        /* Bottom buttons */
        .bottom-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        
        .btn-green {
            background: var(--secondary-green);
            color: white;
        }
        
        .btn-green:hover {
            background: #3DAF5E;
            transform: translateY(-2px);
        }
        
        .btn-red {
            background: #FF6B6B;
            color: white;
        }
        
        .btn-red:hover {
            background: #FF4757;
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .question-overlay {
                left: 10px;
                right: 10px;
                width: auto;
                bottom: 10px;
            }
            .progress-bar-container {
                top: 10px;
                right: 10px;
                width: 180px;
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in { animation: fadeIn 0.5s ease; }
    </style>
</head>
<body>
    <?php if ($showResults || $noQuestions || $hasTakenQuiz): ?>
        <!-- RESULTS PAGE -->
        <div class="world-container">
            <iframe src="<?php echo $worldUrl; ?>" class="world-iframe"></iframe>
        </div>
        
        <div class="results-container fade-in">
            <div class="results-header">
                <img src="images/my-quiz-score.jpg" alt="Quiz Results" style="max-width: 300px; margin-bottom: 20px;">
                <h2 style="color: var(--primary-blue);"><?php echo htmlspecialchars($quiz['title']); ?></h2>
            </div>
            
            <?php if ($noQuestions): ?>
                <div style="text-align: center; padding: 40px;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 4rem; color: #FF6B6B; margin-bottom: 20px;"></i>
                    <h3 style="color: #FF6B6B;">No Questions Available</h3>
                    <p>This quiz doesn't have any questions yet.</p>
                </div>
                
            <?php else: ?>
                <div style="text-align: center; margin-bottom: 30px;">
                    <div class="score-circle">
                        <?php echo $score; ?>%
                    </div>
                    <h3 style="color: <?php echo $score >= 80 ? 'var(--secondary-green)' : ($score >= 60 ? 'var(--primary-blue)' : '#FF6B6B'); ?>;">
                        <?php 
                        if ($score >= 80) echo "Excellent Work! &#127942;";
                        elseif ($score >= 60) echo "Good Job! &#128077;";
                        else echo "Keep Practicing! &#128170;";
                        ?>
                    </h3>
                    <p><strong><?php echo $correctAnswers; ?></strong> out of <strong><?php echo $totalQuestions; ?></strong> correct</p>
                </div>

                <div style="margin-top: 30px;">
                    <?php foreach ($questionDetails as $index => $detail): ?>
                    <div style="background: <?php echo $detail['is_correct'] ? '#F1F8E9' : '#FFEBEE'; ?>; border-radius: 10px; padding: 15px; margin-bottom: 15px; border-left: 5px solid <?php echo $detail['is_correct'] ? 'var(--secondary-green)' : 'var(--incorrect-color)'; ?>;">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <span style="background: var(--primary-blue); color: white; width: 25px; height: 25px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem;"><?php echo $index + 1; ?></span>
                            <span style="font-weight: bold;"><?php echo htmlspecialchars($detail['question_text']); ?></span>
                        </div>
                        
                        <?php if ($detail['question_type'] === 'CK'): ?>
                            <div style="display: flex; gap: 20px; margin-top: 10px;">
                                <div><span style="color: #666;">You clicked:</span> <strong><?php echo htmlspecialchars($detail['student_answer'] ?: 'Nothing'); ?></strong></div>
                                <div><span style="color: #666;">Correct:</span> <strong style="color: var(--secondary-green);"><?php echo htmlspecialchars($detail['correct_answer']); ?></strong></div>
                            </div>
                        <?php else: ?>
                            <div style="display: flex; gap: 20px; margin-top: 10px;">
                                <div><span style="color: #666;">Your answer:</span> <strong><?php echo htmlspecialchars($detail['student_answer'] ?: 'Not answered'); ?></strong></div>
                                <div><span style="color: #666;">Correct:</span> <strong style="color: var(--secondary-green);"><?php echo htmlspecialchars($detail['correct_answer']); ?></strong></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <div class="bottom-buttons">
                <a href="student-dashboard.php" class="btn btn-green">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="logout.php" class="btn btn-red">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

    <?php elseif (!$hasTakenQuiz && !$showResults): ?>
        <!-- IN-WORLD QUIZ INTERFACE -->
        <?php
        // Get the world URL from virtual-world-selector.js logic
        $worldKey = $quiz['virtual_world'];
        $worlds = [
            'zoo' => '../zoo1.htm',
            'museum' => '../museum.htm?id=1',
            'robot city' => '../village.htm?id=4',
            'ocean' => '../nature.htm?id=1',
            'coral reef' => '../nature.htm?id=3',
            'farm' => '../village2.htm?id=1',
            'raptor island' => '../nature.htm?id=2',
            'toy world' => '../village.htm?id=3',
            'savanna' => '../nature.htm?id=5',
            'medieval square' => '../village2.htm?id=2',
            'cave' => '../nature.htm?id=4',
            'mars' => '../village2.htm?id=8',
            'playground' => '../village2.htm?id=6',
            'cetacean' => '../nature.htm?id=6',
            'taiga' => '../nature.htm?id=7',
            'castle' => '../village2.htm?id=5',
        ];
        $worldUrl = $worlds[$worldKey] ?? '../zoo1.htm';
        
        // Encode questions for JavaScript with full options
        $questionsJson = json_encode(array_map(function($q) {
            $options = json_decode($q['options'], true);
            // Format options properly for display
            $formattedOptions = [];
            if ($q['qtype'] === 'MC') {
                foreach (['A', 'B', 'C', 'D'] as $letter) {
                    if (isset($options[$letter]) && $options[$letter] !== '') {
                        $formattedOptions[$letter] = $options[$letter];
                    }
                }
            } elseif ($q['qtype'] === 'TF') {
                $formattedOptions = [
                    'A' => 'True',
                    'B' => 'False'
                ];
            }
            
            return [
                'id' => $q['id'],
                'text' => $q['question_text'],
                'type' => $q['qtype'],
                'correct' => $q['correct_answer'],
                'options' => $formattedOptions,
                'modelName' => ($q['qtype'] === 'CK') ? ($options['A'] ?? '') : null
            ];
        }, $questions));
        ?>
        
        <!-- 3D World Container - Always interactive -->
        <div class="world-container">
            <iframe src="<?php echo $worldUrl; ?>" class="world-iframe" id="worldFrame"></iframe>
        </div>
        
        <!-- Progress Bar -->
        <div class="progress-bar-container">
            <div class="progress-text">
                <span>Question <span id="currentQuestion">1</span>/<span id="totalQuestions"><?php echo count($questions); ?></span></span>
                <span id="progressPercentage">0%</span>
            </div>
            <div class="progress-fill" id="progressFill" style="width: 0%;"></div>
        </div>
        
        <!-- Question Overlay (bottom left) -->
        <div class="question-overlay" id="questionOverlay">
            <!-- Content will be dynamically populated -->
        </div>
        
        <script>
        // Quiz data
        const questions = <?php echo $questionsJson; ?>;
        const quizId = <?php echo $quiz_id; ?>;
        let currentIndex = 0;
        let answers = [];
        let currentAnswer = null;
        
        // Initialize quiz
        function initQuiz() {
            loadQuestion(0);
            
            // Listen for messages from the iframe (for click-on questions)
            window.addEventListener('message', function(event) {
                const data = event.data;
                
                if (data && data.type === 'objectClicked') {
                    // Only handle if current question is click-on type
                    if (questions[currentIndex] && questions[currentIndex].type === 'CK') {
                        const modelName = data.modelName;
                        handleClickOnAnswer(modelName);
                    }
                }
            });
        }
        
        // Load a question
        function loadQuestion(index) {
            if (index >= questions.length) {
                completeQuiz();
                return;
            }
            
            const question = questions[index];
            currentIndex = index;
            currentAnswer = null;
            
            // Update progress
            updateProgress(index);
            
            // Render question based on type
            renderQuestion(question, index);
        }
        
        // Update progress bar
        function updateProgress(index) {
            const progress = (index / questions.length) * 100;
            document.getElementById('progressFill').style.width = progress + '%';
            document.getElementById('progressPercentage').textContent = Math.round(progress) + '%';
            document.getElementById('currentQuestion').textContent = index + 1;
            document.getElementById('totalQuestions').textContent = questions.length;
        }
        
        // Render question based on type
        function renderQuestion(question, index) {
            const overlay = document.getElementById('questionOverlay');
            let html = `
                <div class="question-header">
                    <span class="question-number-badge">Question ${index + 1}</span>
                    <span class="question-type-badge">${getQuestionTypeName(question.type)}</span>
                </div>
                <div class="question-text">${question.text}</div>
            `;
            
            if (question.type === 'CK') {
                // Click-on question
                html += `
                    <div class="click-instruction">
                        <i class="fas fa-mouse-pointer"></i>
                        Explore the 3D world and click on the correct object
                    </div>
                    <div class="message-area" id="messageArea">
                        <span style="color: #FF9800;">Waiting for you to click on something...</span>
                    </div>
                `;
                
                // Add navigation buttons (next will be enabled after click)
                html += `
                    <div class="nav-buttons">
                        <button class="nav-btn next-btn" id="nextBtn" disabled>
                            <i class="fas fa-arrow-right"></i> Next Question
                        </button>
                    </div>
                `;
                
            } else if (question.type === 'MC') {
                // Multiple Choice - show all options
                let optionsHtml = '<div class="options-container">';
                
                // Shuffle options for display
                const entries = Object.entries(question.options);
                const shuffled = entries.sort(() => Math.random() - 0.5);
                
                for (const [letter, text] of shuffled) {
                    optionsHtml += `
                        <div class="option-row" onclick="selectOption('${letter}')">
                            <div class="option-letter">${letter}</div>
                            <div class="option-content">${text}</div>
                        </div>
                    `;
                }
                
                optionsHtml += '</div>';
                html += optionsHtml;
                
                // Add navigation buttons
                html += `
                    <div class="nav-buttons">
                        <button class="nav-btn next-btn" id="nextBtn" disabled>
                            <i class="fas fa-arrow-right"></i> Next Question
                        </button>
                    </div>
                `;
                
            } else if (question.type === 'TF') {
                // True/False - show both options
                html += `
                    <div class="options-container">
                        <div class="option-row" onclick="selectOption('A')">
                            <div class="option-letter">A</div>
                            <div class="option-content">True</div>
                        </div>
                        <div class="option-row" onclick="selectOption('B')">
                            <div class="option-letter">B</div>
                            <div class="option-content">False</div>
                        </div>
                    </div>
                    <div class="nav-buttons">
                        <button class="nav-btn next-btn" id="nextBtn" disabled>
                            <i class="fas fa-arrow-right"></i> Next Question
                        </button>
                    </div>
                `;
                
            } else if (question.type === 'FB') {
                // Fill in Blank
                html += `
                    <div class="options-container">
                        <input type="text" class="fill-blank-input" id="fillBlankInput" 
                               placeholder="Type your answer here..." 
                               onkeyup="checkFillBlank()">
                    </div>
                    <div class="nav-buttons">
                        <button class="nav-btn next-btn" id="nextBtn" disabled>
                            <i class="fas fa-arrow-right"></i> Next Question
                        </button>
                    </div>
                `;
            }
            
            overlay.innerHTML = html;
        }
        
        // Select option for MC/TF questions
        function selectOption(letter) {
            // Remove selected class from all options
            document.querySelectorAll('.option-row').forEach(row => {
                row.classList.remove('selected');
            });
            
            // Add selected class to clicked option
            event.currentTarget.classList.add('selected');
            
            // Store answer
            currentAnswer = letter;
            
            // Enable next button
            document.getElementById('nextBtn').disabled = false;
            
            // Show message
            const messageArea = document.getElementById('messageArea');
            if (messageArea) {
                messageArea.innerHTML = '<span style="color: var(--secondary-green);">Answer selected. Click Next to continue.</span>';
            }
        }
        
        // Check fill in blank input
        function checkFillBlank() {
            const input = document.getElementById('fillBlankInput');
            if (input && input.value.trim() !== '') {
                currentAnswer = input.value.trim();
                document.getElementById('nextBtn').disabled = false;
            } else {
                document.getElementById('nextBtn').disabled = true;
            }
        }
        
        // Handle click-on answer
        function handleClickOnAnswer(modelName) {
            if (questions[currentIndex].type !== 'CK') return;
            
            const question = questions[currentIndex];
            const isCorrect = (modelName === question.modelName);
            
            // Store answer
            currentAnswer = modelName;
            
            // Show feedback
            const messageArea = document.getElementById('messageArea');
            if (messageArea) {
                messageArea.innerHTML = isCorrect ? 
                    '<span style="color: var(--secondary-green);"><i class="fas fa-check-circle"></i> Correct! Good job!</span>' :
                    '<span style="color: #FF6B6B;"><i class="fas fa-times-circle"></i> That\'s not correct. Try again?</span>';
            }
            
            // Enable next button (for in-world quizzes, we allow moving on even if wrong)
            document.getElementById('nextBtn').disabled = false;
        }
        
        // Move to next question
        function nextQuestion() {
            if (!currentAnswer && questions[currentIndex].type !== 'CK') {
                alert('Please select an answer first!');
                return;
            }
            
            // Save answer
            const question = questions[currentIndex];
            answers[currentIndex] = currentAnswer || '';
            
            // Send to server
            fetch('take-quiz2.php?quiz_id=' + quizId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    action: 'submit_answer',
                    question_index: currentIndex,
                    answer: currentAnswer || ''
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.next) {
                    // Load next question
                    loadQuestion(currentIndex + 1);
                } else {
                    // This was the last question
                    completeQuiz();
                }
            });
        }
        
        // Complete the quiz
        function completeQuiz() {
            // Show completion message
            document.getElementById('questionOverlay').innerHTML = `
                <div style="text-align: center; padding: 20px;">
                    <i class="fas fa-check-circle" style="color: var(--secondary-green); font-size: 3rem; margin-bottom: 15px;"></i>
                    <h3>Quiz Complete!</h3>
                    <p>Calculating your score...</p>
                </div>
            `;
            
            // Send completion to server
            fetch('take-quiz2.php?quiz_id=' + quizId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    action: 'complete_quiz'
                })
            })
            .then(response => response.json())
            .then(data => {
                // Show score briefly then reload
                document.getElementById('questionOverlay').innerHTML = `
                    <div style="text-align: center; padding: 20px;">
                        <div style="font-size: 2.5rem; color: var(--primary-blue);">${data.score}%</div>
                        <p>${data.correct} out of ${data.total} correct</p>
                        <p style="font-size: 0.8rem;">Loading results...</p>
                    </div>
                `;
                
                setTimeout(() => {
                    window.location.href = 'take-quiz2.php?quiz_id=' + quizId;
                }, 1500);
            });
        }
        
        // Helper function to get question type name
        function getQuestionTypeName(type) {
            const names = {
                'MC': 'Multiple Choice',
                'TF': 'True/False',
                'FB': 'Fill in Blank',
                'CK': 'Click in World'
            };
            return names[type] || type;
        }
        
        // Make nextQuestion globally available
        window.nextQuestion = nextQuestion;
        window.selectOption = selectOption;
        window.checkFillBlank = checkFillBlank;
        
        // Start quiz
        window.addEventListener('load', initQuiz);
        </script>
    <?php endif; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>