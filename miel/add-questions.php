<?php
// add-questions.php
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

$quiz_id = isset($_POST['selected_quiz_id']) ? intval($_POST['selected_quiz_id']) : 
           (isset($_GET['quiz_id']) ? intval($_GET['quiz_id']) : 0);

$quiz_info = null;
$questions = [];
$statusMessage = '';
$statusType = '';
$teacherQuizzes = [];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get all quizzes created by this teacher for the dropdown
    $quizzesStmt = $pdo->prepare("
        SELECT q.*, 
               COUNT(qn.id) as question_count
        FROM quizzes q 
        LEFT JOIN questions qn ON q.id = qn.quiz_id
        WHERE q.teacher_id = ?
        GROUP BY q.id
        ORDER BY q.created_at DESC
    ");
    $quizzesStmt->execute([$_SESSION['user_id']]);
    $teacherQuizzes = $quizzesStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // If no quizzes exist, show message
    if (empty($teacherQuizzes)) {
        $statusMessage = "You haven't created any quizzes yet. Please create a quiz first!";
        $statusType = 'error';
    }
    
    // Get selected quiz information if a quiz is selected
    if ($quiz_id > 0) {
        $quizStmt = $pdo->prepare("
            SELECT q.*, 
                   COUNT(qn.id) as question_count,
                   u.full_name as teacher_name
            FROM quizzes q 
            LEFT JOIN questions qn ON q.id = qn.quiz_id
            LEFT JOIN users u ON q.teacher_id = u.id
            WHERE q.id = ? AND q.teacher_id = ?
            GROUP BY q.id
        ");
        $quizStmt->execute([$quiz_id, $_SESSION['user_id']]);
        $quiz_info = $quizStmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$quiz_info) {
            $statusMessage = "Quiz not found or you don't have permission to access it.";
            $statusType = 'error';
        } else {
            // Get existing questions for this quiz
            $questionStmt = $pdo->prepare("SELECT * FROM questions WHERE quiz_id = ? ORDER BY id");
            $questionStmt->execute([$quiz_id]);
            $questions = $questionStmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
} catch(PDOException $e) {
    $statusMessage = "Database error: " . $e->getMessage();
    $statusType = 'error';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    try {
        if ($_POST['action'] === 'add_question') {
            $question_type = $_POST['question_type'] ?? 'multiple_choice';
            
            // Validate required fields based on question type
            if (empty($_POST['question_text'])) {
                $statusMessage = "Please enter the question text!";
                $statusType = 'error';
            } else {
                // Prepare options array based on question type
                if ($question_type === 'multiple_choice') {
                    // Validate MC options
                    if (empty($_POST['option_a']) || empty($_POST['option_b']) || 
                        empty($_POST['option_c']) || empty($_POST['option_d'])) {
                        $statusMessage = "Please fill in all multiple choice options!";
                        $statusType = 'error';
                    } else {
                        // For MC: First option is correct, others are distractors
                        $options = [
                            'A' => $_POST['option_a'] ?? '',
                            'B' => $_POST['option_b'] ?? '',
                            'C' => $_POST['option_c'] ?? '',
                            'D' => $_POST['option_d'] ?? ''
                        ];
                        $correct_answer = 'A'; // First option is always correct
                        
                        // Store question type in options array
                        $options['question_type'] = $question_type;
                        
                        $insertStmt = $pdo->prepare("
                            INSERT INTO questions (quiz_id, question_text, options, correct_answer) 
                            VALUES (?, ?, ?, ?)
                        ");
                        
                        $insertStmt->execute([
                            $quiz_id,
                            $_POST['question_text'],
                            json_encode($options),
                            $correct_answer
                        ]);
                        
                        $statusMessage = "Multiple choice question added successfully!";
                        $statusType = 'success';
                    }
                } elseif ($question_type === 'true_false') {
                    // For T/F: True is correct, False is distractor
                    $options = [
                        'A' => 'True',
                        'B' => 'False'
                    ];
                    $correct_answer = 'A'; // True is always correct (first option)
                    
                    // Store question type in options array
                    $options['question_type'] = $question_type;
                    
                    $insertStmt = $pdo->prepare("
                        INSERT INTO questions (quiz_id, question_text, options, correct_answer) 
                        VALUES (?, ?, ?, ?)
                    ");
                    
                    $insertStmt->execute([
                        $quiz_id,
                        $_POST['question_text'],
                        json_encode($options),
                        $correct_answer
                    ]);
                    
                    $statusMessage = "True/False question added successfully!";
                    $statusType = 'success';
                    
                } elseif ($question_type === 'fill_blank') {
                    // Validate fill in the blank answer
                    if (empty($_POST['fill_answer'])) {
                        $statusMessage = "Please enter the correct answer for fill in the blank!";
                        $statusType = 'error';
                    } else {
                        // For Fill in the blank: Store correct answer in option A
                        $options = [
                            'A' => $_POST['fill_answer'] ?? ''
                        ];
                        $correct_answer = 'A'; // Only one option for fill in the blank
                        
                        // Store question type in options array
                        $options['question_type'] = $question_type;
                        
                        $insertStmt = $pdo->prepare("
                            INSERT INTO questions (quiz_id, question_text, options, correct_answer) 
                            VALUES (?, ?, ?, ?)
                        ");
                        
                        $insertStmt->execute([
                            $quiz_id,
                            $_POST['question_text'],
                            json_encode($options),
                            $correct_answer
                        ]);
                        
                        $statusMessage = "Fill in the blank question added successfully!";
                        $statusType = 'success';
                    }
                }
                
                if ($statusType === 'success') {
                    // Clear form (keep quiz_id)
                    $_POST['question_text'] = '';
                    $_POST['option_a'] = '';
                    $_POST['option_b'] = '';
                    $_POST['option_c'] = '';
                    $_POST['option_d'] = '';
                    $_POST['fill_answer'] = '';
                    $_POST['question_type'] = 'multiple_choice';
                    
                    // Refresh questions list
                    $questionStmt = $pdo->prepare("SELECT * FROM questions WHERE quiz_id = ? ORDER BY id");
                    $questionStmt->execute([$quiz_id]);
                    $questions = $questionStmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    // Update quiz info question count
                    $quiz_info['question_count'] = count($questions);
                }
            }
            
        } elseif ($_POST['action'] === 'delete_question' && isset($_POST['question_id'])) {
            $deleteStmt = $pdo->prepare("DELETE FROM questions WHERE id = ? AND quiz_id = ?");
            $deleteStmt->execute([$_POST['question_id'], $quiz_id]);
            
            $statusMessage = "Question deleted successfully!";
            $statusType = 'success';
            
            // Refresh questions list
            $questionStmt = $pdo->prepare("SELECT * FROM questions WHERE quiz_id = ? ORDER BY id");
            $questionStmt->execute([$quiz_id]);
            $questions = $questionStmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Update quiz info question count
            $quiz_info['question_count'] = count($questions);
            
        } elseif ($_POST['action'] === 'select_quiz') {
            // Just update the selected quiz
            $quiz_id = intval($_POST['selected_quiz_id']);
            // Refresh page with selected quiz
            header("Location: add-questions.php?quiz_id=$quiz_id");
            exit();
        }
        
    } catch(PDOException $e) {
        $statusMessage = "Error: " . $e->getMessage();
        $statusType = 'error';
    }
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

// Get question type display name
function getQuestionTypeName($type) {
    $names = [
        'multiple_choice' => 'Multiple Choice',
        'true_false' => 'True/False',
        'fill_blank' => 'Fill in the Blank'
    ];
    return $names[$type] ?? $type;
}

// Get question type icon
function getQuestionTypeIcon($type) {
    $icons = [
        'multiple_choice' => 'list-ol',
        'true_false' => 'check-circle',
        'fill_blank' => 'pen'
    ];
    return $icons[$type] ?? 'question-circle';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Questions | MIEL - Multiple Intelligence E-Learning</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            max-width: 800px; /* SAME WIDTH AS teacher-dashboard.php */
            margin: 0 auto;
            position: relative;
            z-index: 1;
            padding-bottom: 50px;
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
    	margin-bottom: -70px !important;
		}

		.navbar-nav .nav-link:hover {
	    color: #4A90E2 !important;
		}
		
		.navbar-brand {
    	margin-bottom: -50px !important;
		}
        
        /* ===== MIEL HEADER ===== */
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
        
        /* ===== MAIN CARD ===== */
        .main-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            width: 100%;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
        }
        
        /* ===== QUIZ SELECTOR ===== */
        .quiz-selector {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            border: 3px solid #E0E0E0;
        }
        
        .selector-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .selector-header i {
            color: var(--primary-blue);
            font-size: 1.5rem;
        }
        
        .selector-header h3 {
            color: var(--primary-blue);
            font-size: 1.3rem;
        }
        
        .quiz-dropdown {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        select {
            flex: 1;
            padding: 15px;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            font-size: 1.1rem;
            font-family: inherit;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        select:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        
        /* ===== QUIZ INFO CARD ===== */
        .quiz-info-card {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            border: 3px solid #E0E0E0;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .quiz-icon-large {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }
        
        .quiz-details {
            flex: 1;
        }
        
        .quiz-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 5px;
        }
        
        .quiz-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
        }
        
        /* ===== FORM ELEMENTS ===== */
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: var(--primary-blue);
        }
        
        .input-with-icon {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            color: var(--primary-blue);
            font-size: 1.2rem;
        }
        
        input, textarea {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            font-size: 1.1rem;
            font-family: inherit;
            transition: all 0.3s;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        /* ===== QUESTION TYPE SELECTOR ===== */
        .question-type-selector {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 10px;
        }
        
        .question-type-option {
            background: #F8F9FF;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 120px;
        }
        
        .question-type-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
        }
        
        .question-type-option.selected {
            border-color: var(--secondary-green);
            background: #E8F5E9;
        }
        
        .question-type-icon-small {
            font-size: 2rem;
            margin-bottom: 10px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(74, 144, 226, 0.1);
        }
        
        .question-type-info {
            text-align: center;
        }
        
        .question-type-info h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--text-dark);
        }
        
        .question-type-info p {
            font-size: 0.8rem;
            color: #666;
        }
        
        /* Question type specific colors */
        .multiple-choice-icon { color: #4CAF50; background: rgba(76, 175, 80, 0.1); }
        .true-false-icon { color: #2196F3; background: rgba(33, 150, 243, 0.1); }
        .fill-blank-icon { color: #9C27B0; background: rgba(156, 39, 176, 0.1); }
        
        /* ===== OPTIONS GRID ===== */
        .options-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .option-item {
            background: #F8F9FF;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            padding: 15px;
            transition: all 0.3s;
        }
        
        .option-item:hover {
            border-color: var(--primary-blue);
        }
        
        .option-item.correct {
            border-color: var(--secondary-green);
            background: #E8F5E9;
        }
        
        .option-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        
        .option-label {
            width: 35px;
            height: 35px;
            background: var(--primary-blue);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
        }
        
        .option-label.correct {
            background: var(--secondary-green);
        }
        
        .option-note {
            font-size: 0.9rem;
            color: #666;
            margin-top: 5px;
            font-style: italic;
        }
        
        /* ===== QUESTIONS LIST ===== */
        .questions-list {
            margin-top: 30px;
        }
        
        .questions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #F0F0F0;
        }
        
        .question-item {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            border: 3px solid #E0E0E0;
            position: relative;
            transition: all 0.3s;
        }
        
        .question-item:hover {
            border-color: var(--primary-blue);
        }
        
        .question-number {
            position: absolute;
            top: -15px;
            left: -15px;
            background: var(--primary-blue);
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .question-text {
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 1.1rem;
            padding-right: 40px;
        }
        
        .question-type-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            margin-left: 10px;
            background: var(--accent-yellow);
            color: var(--text-dark);
        }
        
        .question-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        
        .question-option {
            background: white;
            border-radius: 10px;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .question-option.correct {
            border-left: 4px solid var(--secondary-green);
            background: #E8F5E9;
        }
        
        .option-letter-small {
            width: 30px;
            height: 30px;
            background: #E0E0E0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .question-option.correct .option-letter-small {
            background: var(--secondary-green);
            color: white;
        }
        
        .question-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 10px;
        }
        
        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .delete-btn {
            background: #FF6B6B;
            color: white;
        }
        
        .delete-btn:hover {
            background: #FF4757;
            transform: scale(1.1);
        }
        
        /* ===== BUTTONS ===== */
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
            margin-top: 30px;
        }
        
        /* ===== STANDARDIZED BUTTON STYLES ===== */
        /* Blue functional buttons -> Yellow on hover */
        .btn-success, .btn-secondary {
            background-color: #4A90E2 !important; /* BLUE for functional buttons */
            color: white !important;
        }
        
        .btn-success:hover, .btn-secondary:hover {
            background-color: #FFD166 !important; /* YELLOW on hover */
            transform: translateY(-3px);
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
        
        /* ===== STATUS MESSAGES ===== */
        .status-message {
            padding: 15px;
            border-radius: 15px;
            margin: 20px 0;
        }
        
        .status-success {
            background: #D4EDDA;
            color: #155724;
            border-left: 5px solid var(--secondary-green);
        }
        
        .status-error {
            background: #F8D7DA;
            color: #721C24;
            border-left: 5px solid #FF6B6B;
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
        
        /* ===== MOBILE RESPONSIVE (SAME AS teacher-dashboard.php) ===== */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .miel-header {
                padding: 20px;
            }
            
            .miel-logo-image {
                max-width: 150px;
            }
            
            .miel-subtitle {
                font-size: 1.1rem;
            }
            
            .intelligence-icons {
                gap: 10px;
            }
            
            .intelligence-icon {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }
            
            .main-card {
                padding: 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .question-type-selector {
                grid-template-columns: 1fr;
            }
            
            .options-grid,
            .question-options {
                grid-template-columns: 1fr;
            }
            
            .quiz-info-card {
                flex-direction: column;
                text-align: center;
            }
            
            .quiz-dropdown {
                flex-direction: column;
                align-items: stretch;
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
            .quiz-meta {
                flex-direction: column;
                gap: 5px;
            }
            
            .question-actions {
                position: static;
                margin-top: 15px;
                justify-content: flex-end;
            }
            
            .miel-logo-image {
                max-width: 120px;
            }
            
            .miel-subtitle {
                font-size: 1rem;
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

    <div class="container">
        <!-- MIEL HEADER -->
        <header class="miel-header fade-in">
            <div class="miel-logo">
                <img src="miel-logo.jpg" alt="MIEL Logo" class="miel-logo-image fade-in">                
                <p class="miel-subtitle">Multiple Intelligence Experiential Learning System</p>
                <p class="miel-tagline">Empowering every student through personalized learning adventures based on their unique intelligence strengths</p>
            </div>
            
        </header>

        <!-- DASHBOARD HEADER -->
        <header class="dashboard-header fade-in">
            <div class="logo">
                <i class="fas fa-question-circle logo-icon bounce"></i>
                <div>
                    <h1>Add Questions to Quiz</h1>
                    <p class="subtitle">Create different types of questions for your students!</p>
                </div>
            </div>
        </header>

        <!-- MAIN CARD -->
        <div class="main-card fade-in">
            <?php if ($statusMessage): ?>
            <div class="status-message status-<?php echo $statusType; ?>">
                <?php echo htmlspecialchars($statusMessage); ?>
            </div>
            <?php endif; ?>
            
            <!-- QUIZ SELECTOR DROPDOWN -->
            <div class="quiz-selector">
                <div class="selector-header">
                    <i class="fas fa-clipboard-list"></i>
                    <h3>Select a Quiz to Add Questions</h3>
                </div>
                
                <form method="POST" action="add-questions.php" class="quiz-dropdown">
                    <input type="hidden" name="action" value="select_quiz">
                    <select name="selected_quiz_id" id="quizSelector" onchange="this.form.submit()" <?php echo empty($teacherQuizzes) ? 'disabled' : ''; ?>>
                        <option value="">-- Choose a Quiz --</option>
                        <?php foreach ($teacherQuizzes as $quiz): ?>
                        <option value="<?php echo $quiz['id']; ?>" 
                                <?php echo ($quiz_id == $quiz['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($quiz['title']); ?> 
                            (<?php echo getIntelligenceName($quiz['intelligence_type']); ?> - <?php echo getWorldName($quiz['virtual_world']); ?>)
                            - <?php echo $quiz['question_count']; ?> questions
                        </option>
                        <?php endforeach; ?>
                    </select>
                    
                    <?php if (empty($teacherQuizzes)): ?>
                    <a href="create-quiz.php" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create Your First Quiz
                    </a>
                    <?php else: ?>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i> Select Quiz
                    </button>
                    <?php endif; ?>
                </form>
            </div>
            
            <?php if ($quiz_info): ?>
            <!-- QUIZ INFO -->
            <div class="quiz-info-card">
                <div class="quiz-icon-large">
                    <i class="fas fa-<?php echo getWorldIcon($quiz_info['virtual_world']); ?>"></i>
                </div>
                <div class="quiz-details">
                    <div class="quiz-title"><?php echo htmlspecialchars($quiz_info['title']); ?></div>
                    <div><?php echo htmlspecialchars($quiz_info['description']); ?></div>
                    <div class="quiz-meta">
                        <div class="meta-item">
                            <i class="fas fa-<?php echo getIntelligenceIcon($quiz_info['intelligence_type']); ?>"></i>
                            <?php echo getIntelligenceName($quiz_info['intelligence_type']); ?>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-globe"></i>
                            <?php echo getWorldName($quiz_info['virtual_world']); ?>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <?php echo htmlspecialchars($quiz_info['teacher_name']); ?>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-question"></i>
                            <?php echo $quiz_info['question_count']; ?> Questions
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ADD QUESTION FORM -->
            <form method="POST" action="add-questions.php?quiz_id=<?php echo $quiz_id; ?>" id="questionForm">
                <input type="hidden" name="action" value="add_question">
                <input type="hidden" name="selected_quiz_id" value="<?php echo $quiz_id; ?>">
                
                <!-- QUESTION TYPE SELECTOR -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-question-circle"></i> Question Type
                    </label>
                    <div class="question-type-selector">
                        <?php
                        $questionTypes = [
                            'multiple_choice' => ['icon' => 'list-ol', 'name' => 'Multiple Choice', 'desc' => '4 options, first is correct'],
                            'true_false' => ['icon' => 'check-circle', 'name' => 'True/False', 'desc' => 'True is correct answer'],
                            'fill_blank' => ['icon' => 'pen', 'name' => 'Fill in Blank', 'desc' => 'Student types answer']
                        ];
                        
                        $selectedType = isset($_POST['question_type']) ? $_POST['question_type'] : 'multiple_choice';
                        
                        foreach ($questionTypes as $key => $type):
                            $isSelected = $selectedType === $key;
                        ?>
                        <div class="question-type-option <?php echo $isSelected ? 'selected' : ''; ?>" 
                             data-question-type="<?php echo $key; ?>">
                            <div class="question-type-icon-small <?php echo str_replace('_', '-', $key); ?>-icon">
                                <i class="fas fa-<?php echo $type['icon']; ?>"></i>
                            </div>
                            <div class="question-type-info">
                                <h4><?php echo $type['name']; ?></h4>
                                <p><?php echo $type['desc']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="question_type" id="questionType" value="<?php echo $selectedType; ?>">
                </div>
                
                <!-- QUESTION TEXT -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-question"></i> Question Text
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-pencil-alt input-icon"></i>
                        <textarea name="question_text" id="questionText" 
                                  placeholder="Enter your question here..." required><?php echo isset($_POST['question_text']) ? htmlspecialchars($_POST['question_text']) : ''; ?></textarea>
                    </div>
                </div>
                
                <!-- DYNAMIC OPTIONS BASED ON QUESTION TYPE -->
                <div id="optionsContainer">
                    <?php if ($selectedType === 'multiple_choice'): ?>
                    <!-- MULTIPLE CHOICE OPTIONS -->
                    <div class="form-group" id="multipleChoiceOptions">
                        <label class="form-label">
                            <i class="fas fa-list-ol"></i> Multiple Choice Options
                            <span style="font-size: 0.9rem; color: var(--secondary-green); margin-left: 10px;">
                                <i class="fas fa-info-circle"></i> First option is correct answer
                            </span>
                        </label>
                        <div class="options-grid">
                            <?php $option_letters = ['A', 'B', 'C', 'D']; ?>
                            <?php foreach ($option_letters as $index => $letter): ?>
                            <div class="option-item">
                                <div class="option-header">
                                    <div class="option-label <?php echo $index === 0 ? 'correct' : ''; ?>">
                                        <?php echo $letter; ?>
                                        <?php if ($index === 0): ?>
                                        <i class="fas fa-check" style="font-size: 0.7rem; margin-left: 2px;"></i>
                                        <?php endif; ?>
                                    </div>
                                    <span>
                                        <?php echo $index === 0 ? 'Correct Answer' : 'Option ' . $letter; ?>
                                    </span>
                                </div>
                                <div class="input-with-icon">
                                    <i class="fas fa-arrow-right input-icon"></i>
                                    <input type="text" name="option_<?php echo strtolower($letter); ?>" 
                                           placeholder="<?php echo $index === 0 ? 'Enter correct answer...' : 'Enter distractor ' . $letter . '...'; ?>" 
                                           required
                                           value="<?php echo isset($_POST['option_' . strtolower($letter)]) ? htmlspecialchars($_POST['option_' . strtolower($letter)]) : ''; ?>">
                                </div>
                                <?php if ($index === 0): ?>
                                <div class="option-note">
                                    <i class="fas fa-lightbulb" style="color: var(--secondary-green);"></i>
                                    This will be randomized with other options in the quiz
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <?php elseif ($selectedType === 'true_false'): ?>
                    <!-- TRUE/FALSE OPTIONS -->
                    <div class="form-group" id="trueFalseOptions">
                        <label class="form-label">
                            <i class="fas fa-check-circle"></i> True/False Options
                            <span style="font-size: 0.9rem; color: var(--secondary-green); margin-left: 10px;">
                                <i class="fas fa-info-circle"></i> "True" is always correct answer
                            </span>
                        </label>
                        <div class="options-grid">
                            <div class="option-item">
                                <div class="option-header">
                                    <div class="option-label correct">A<i class="fas fa-check" style="font-size: 0.7rem; margin-left: 2px;"></i></div>
                                    <span>Correct Answer</span>
                                </div>
                                <div style="padding: 15px; background: #E8F5E9; border-radius: 10px; text-align: center;">
                                    <strong style="color: var(--secondary-green); font-size: 1.2rem;">True</strong>
                                    <div class="option-note">
                                        <i class="fas fa-lightbulb" style="color: var(--secondary-green);"></i>
                                        This will be randomized with "False" in the quiz
                                    </div>
                                </div>
                            </div>
                            <div class="option-item">
                                <div class="option-header">
                                    <div class="option-label">B</div>
                                    <span>Distractor</span>
                                </div>
                                <div style="padding: 15px; background: #F8F9FF; border-radius: 10px; text-align: center;">
                                    <strong style="color: #666; font-size: 1.2rem;">False</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php elseif ($selectedType === 'fill_blank'): ?>
                    <!-- FILL IN THE BLANK OPTION -->
                    <div class="form-group" id="fillBlankOptions">
                        <label class="form-label">
                            <i class="fas fa-pen"></i> Correct Answer
                            <span style="font-size: 0.9rem; color: var(--secondary-green); margin-left: 10px;">
                                <i class="fas fa-info-circle"></i> Student will type the answer
                            </span>
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-check input-icon" style="color: var(--secondary-green);"></i>
                            <input type="text" name="fill_answer" 
                                   placeholder="Enter the correct answer for fill in the blank..." 
                                   required
                                   value="<?php echo isset($_POST['fill_answer']) ? htmlspecialchars($_POST['fill_answer']) : ''; ?>">
                        </div>
                        <div style="margin-top: 10px; padding: 10px; background: #E8F5E9; border-radius: 10px; font-size: 0.9rem;">
                            <i class="fas fa-lightbulb" style="color: var(--secondary-green); margin-right: 5px;"></i>
                            Students will see: "________________" and need to type the correct answer
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- BUTTONS (UPDATED - REMOVED CREATE NEW QUIZ) -->
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Add Question
                    </button>
                    <button type="reset" class="btn btn-primary">
                        <i class="fas fa-redo"></i> Clear Form
                    </button>
                </div>
            </form>
            
            <!-- EXISTING QUESTIONS LIST -->
            <?php if (!empty($questions)): ?>
            <div class="questions-list">
                <div class="questions-header">
                    <h3 style="color: var(--primary-blue);">
                        <i class="fas fa-list"></i> Existing Questions (<?php echo count($questions); ?>)
                    </h3>
                    <div style="color: #666; font-size: 0.9rem;">
                        Click <i class="fas fa-trash-alt" style="color: #FF6B6B;"></i> to delete
                    </div>
                </div>
                
                <?php foreach ($questions as $index => $question): 
                    $options = json_decode($question['options'], true);
                    if (!is_array($options)) $options = [];
                    $question_type = $options['question_type'] ?? 'multiple_choice';
                ?>
                <div class="question-item fade-in" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                    <div class="question-number"><?php echo $index + 1; ?></div>
                    <div class="question-text">
                        <?php echo htmlspecialchars($question['question_text']); ?>
                        <span class="question-type-badge">
                            <i class="fas fa-<?php echo getQuestionTypeIcon($question_type); ?>"></i>
                            <?php echo getQuestionTypeName($question_type); ?>
                        </span>
                    </div>
                    
                    <?php if ($question_type === 'multiple_choice'): ?>
                    <div class="question-options">
                        <?php foreach (['A', 'B', 'C', 'D'] as $letter): ?>
                        <?php if (isset($options[$letter])): ?>
                        <div class="question-option <?php echo $letter === $question['correct_answer'] ? 'correct' : ''; ?>">
                            <div class="option-letter-small"><?php echo $letter; ?></div>
                            <div><?php echo htmlspecialchars($options[$letter]); ?></div>
                            <?php if ($letter === $question['correct_answer']): ?>
                            <div style="margin-left: auto; color: var(--secondary-green);">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    
                    <?php elseif ($question_type === 'true_false'): ?>
                    <div class="question-options">
                        <div class="question-option correct">
                            <div class="option-letter-small">A</div>
                            <div>True</div>
                            <div style="margin-left: auto; color: var(--secondary-green);">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="question-option">
                            <div class="option-letter-small">B</div>
                            <div>False</div>
                        </div>
                    </div>
                    
                    <?php elseif ($question_type === 'fill_blank'): ?>
                    <div class="question-options">
                        <div class="question-option correct" style="grid-column: span 2;">
                            <div class="option-letter-small">A</div>
                            <div><strong>Correct Answer:</strong> <?php echo htmlspecialchars($options['A'] ?? ''); ?></div>
                            <div style="margin-left: auto; color: var(--secondary-green);">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="question-actions">
                        <form method="POST" action="add-questions.php?quiz_id=<?php echo $quiz_id; ?>" 
                              style="display: inline;" onsubmit="return confirm('Delete this question?');">
                            <input type="hidden" name="action" value="delete_question">
                            <input type="hidden" name="selected_quiz_id" value="<?php echo $quiz_id; ?>">
                            <input type="hidden" name="question_id" value="<?php echo $question['id']; ?>">
                            <button type="submit" class="action-btn delete-btn" title="Delete Question">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <div class="button-group">
                    <a href="quiz-preview.php?quiz_id=<?php echo $quiz_id; ?>" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Preview Quiz
                    </a>
                    <a href="teacher-dashboard.php" class="btn btn-secondary">
                        <i class="fas fa-check-circle"></i> Finish & Return
                    </a>
                </div>
            </div>
            <?php else: ?>
            <div class="status-message" style="background: #FFF3CD; color: #856404; border-left: 5px solid #FFC107;">
                <i class="fas fa-exclamation-triangle" style="font-size: 2rem; margin-bottom: 10px;"></i>
                <p>No questions added yet. Start by adding your first question above!</p>
                <p style="font-size: 0.9rem; margin-top: 10px; color: #856404;">
                    A quiz needs at least 1 question. Recommended: 5-10 questions per quiz.
                </p>
            </div>
            <?php endif; ?>
            
            <?php elseif (!empty($teacherQuizzes)): ?>
            <!-- Show message when no quiz is selected but quizzes exist -->
            <div class="status-message" style="background: #E3F2FD; color: var(--primary-blue); border-left: 5px solid var(--primary-blue); text-align: center;">
                <i class="fas fa-hand-point-up" style="font-size: 3rem; margin-bottom: 15px;"></i>
                <h3>Select a Quiz from the Dropdown Above</h3>
                <p>Choose one of your quizzes to start adding questions!</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- BOTTOM BUTTONS CONTAINER -->
        <div class="bottom-buttons-container">
            <a href="teacher-dashboard.php" class="green-btn">
                <i class="fas fa-tachometer-alt"></i> Back to Dashboard
            </a>
            
            <a href="logout.php" class="red-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        // DOM Elements
        const questionTypeOptions = document.querySelectorAll('.question-type-option');
        const questionTypeInput = document.getElementById('questionType');
        const questionForm = document.getElementById('questionForm');
        const optionsContainer = document.getElementById('optionsContainer');
        
        // Question Type Selector
        questionTypeOptions.forEach(option => {
            option.addEventListener('click', () => {
                questionTypeOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                questionTypeInput.value = option.dataset.questionType;
                
                // Update form options based on selected type
                updateQuestionForm(option.dataset.questionType);
            });
        });
        
        // Function to update form based on question type
        function updateQuestionForm(questionType) {
            // Clear current options
            optionsContainer.innerHTML = '';
            
            if (questionType === 'multiple_choice') {
                optionsContainer.innerHTML = `
                    <div class="form-group" id="multipleChoiceOptions">
                        <label class="form-label">
                            <i class="fas fa-list-ol"></i> Multiple Choice Options
                            <span style="font-size: 0.9rem; color: var(--secondary-green); margin-left: 10px;">
                                <i class="fas fa-info-circle"></i> First option is correct answer
                            </span>
                        </label>
                        <div class="options-grid">
                            ${['A', 'B', 'C', 'D'].map((letter, index) => `
                                <div class="option-item">
                                    <div class="option-header">
                                        <div class="option-label ${index === 0 ? 'correct' : ''}">
                                            ${letter}
                                            ${index === 0 ? '<i class="fas fa-check" style="font-size: 0.7rem; margin-left: 2px;"></i>' : ''}
                                        </div>
                                        <span>
                                            ${index === 0 ? 'Correct Answer' : 'Option ' + letter}
                                        </span>
                                    </div>
                                    <div class="input-with-icon">
                                        <i class="fas fa-arrow-right input-icon"></i>
                                        <input type="text" name="option_${letter.toLowerCase()}" 
                                               placeholder="${index === 0 ? 'Enter correct answer...' : 'Enter distractor ' + letter + '...'}" 
                                               required>
                                    </div>
                                    ${index === 0 ? `
                                    <div class="option-note">
                                        <i class="fas fa-lightbulb" style="color: var(--secondary-green);"></i>
                                        This will be randomized with other options in the quiz
                                    </div>
                                    ` : ''}
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;
            } else if (questionType === 'true_false') {
                optionsContainer.innerHTML = `
                    <div class="form-group" id="trueFalseOptions">
                        <label class="form-label">
                            <i class="fas fa-check-circle"></i> True/False Options
                            <span style="font-size: 0.9rem; color: var(--secondary-green); margin-left: 10px;">
                                <i class="fas fa-info-circle"></i> "True" is always correct answer
                            </span>
                        </label>
                        <div class="options-grid">
                            <div class="option-item">
                                <div class="option-header">
                                    <div class="option-label correct">A<i class="fas fa-check" style="font-size: 0.7rem; margin-left: 2px;"></i></div>
                                    <span>Correct Answer</span>
                                </div>
                                <div style="padding: 15px; background: #E8F5E9; border-radius: 10px; text-align: center;">
                                    <strong style="color: var(--secondary-green); font-size: 1.2rem;">True</strong>
                                    <div class="option-note">
                                        <i class="fas fa-lightbulb" style="color: var(--secondary-green);"></i>
                                        This will be randomized with "False" in the quiz
                                    </div>
                                </div>
                            </div>
                            <div class="option-item">
                                <div class="option-header">
                                    <div class="option-label">B</div>
                                    <span>Distractor</span>
                                </div>
                                <div style="padding: 15px; background: #F8F9FF; border-radius: 10px; text-align: center;">
                                    <strong style="color: #666; font-size: 1.2rem;">False</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            } else if (questionType === 'fill_blank') {
                optionsContainer.innerHTML = `
                    <div class="form-group" id="fillBlankOptions">
                        <label class="form-label">
                            <i class="fas fa-pen"></i> Correct Answer
                            <span style="font-size: 0.9rem; color: var(--secondary-green); margin-left: 10px;">
                                <i class="fas fa-info-circle"></i> Student will type the answer
                            </span>
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-check input-icon" style="color: var(--secondary-green);"></i>
                            <input type="text" name="fill_answer" 
                                   placeholder="Enter the correct answer for fill in the blank..." 
                                   required>
                        </div>
                        <div style="margin-top: 10px; padding: 10px; background: #E8F5E9; border-radius: 10px; font-size: 0.9rem;">
                            <i class="fas fa-lightbulb" style="color: var(--secondary-green); margin-right: 5px;"></i>
                            Students will see: "________________" and need to type the correct answer
                        </div>
                    </div>
                `;
            }
        }
        
        // Form validation
        if (questionForm) {
            questionForm.addEventListener('submit', function(e) {
                const questionText = document.getElementById('questionText').value.trim();
                if (!questionText) {
                    e.preventDefault();
                    alert('Please enter the question text!');
                    document.getElementById('questionText').focus();
                    return false;
                }
                
                // Additional validation based on question type
                const questionType = questionTypeInput.value;
                
                if (questionType === 'multiple_choice') {
                    const optionInputs = document.querySelectorAll('input[name^="option_"]');
                    for (let input of optionInputs) {
                        if (!input.value.trim()) {
                            e.preventDefault();
                            alert('Please fill in all multiple choice options!');
                            input.focus();
                            return false;
                        }
                    }
                } else if (questionType === 'fill_blank') {
                    const fillAnswer = document.querySelector('input[name="fill_answer"]');
                    if (!fillAnswer.value.trim()) {
                        e.preventDefault();
                        alert('Please enter the correct answer for fill in the blank!');
                        fillAnswer.focus();
                        return false;
                    }
                }
                
                return true;
            });
        }
        
        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Ctrl+Enter to submit form
            if (e.ctrlKey && e.key === 'Enter' && questionForm) {
                questionForm.submit();
            }
        });
        
        // Auto-focus question text on page load
        window.addEventListener('load', function() {
            const questionText = document.getElementById('questionText');
            if (questionText) questionText.focus();
        });
        
        // Auto-submit quiz selector when changed
        const quizSelector = document.getElementById('quizSelector');
        if (quizSelector) {
            quizSelector.addEventListener('change', function() {
                if (this.value) {
                    this.form.submit();
                }
            });
        }
        
        // Make MIEL logo image interactive
        const mielLogo = document.querySelector('.miel-logo-image');
        if (mielLogo) {
            mielLogo.addEventListener('click', function() {
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