<?php
// create-quiz.php
// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username = 'root';
$password = 'AcadeV25!';

// Handle form submission
$statusMessage = '';
$statusType = '';
$savedQuizId = null;
$formSubmitted = false;

// Start session
session_start();

// Check if user is logged in and is a teacher
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'teacher') {
    header('Location: login.php');
    exit();
}

// Get the actual teacher ID from session
$teacher_id = $_SESSION['user_id'];

// Check if form was just submitted
if (isset($_SESSION['quiz_created'])) {
    $formSubmitted = true;
    $savedQuizId = $_SESSION['quiz_created'];
    $statusMessage = "Quiz created successfully! Quiz ID: $savedQuizId";
    $statusType = 'success';
}

// Handle AJAX title check
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $input = json_decode(file_get_contents('php://input'), true);
        $title = $input['title'] ?? '';
        
        $sql = "SELECT COUNT(*) as count FROM quizzes WHERE title = :title";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':title' => $title]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode(['exists' => $result['count'] > 0]);
        exit;
        
    } catch(Exception $e) {
        echo json_encode(['exists' => false, 'error' => $e->getMessage()]);
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$formSubmitted) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Check for duplicate title
        $checkSql = "SELECT COUNT(*) as count FROM quizzes WHERE title = :title";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->execute([':title' => $_POST['quiz_title']]);
        $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result['count'] > 0) {
            $statusMessage = "Error: A quiz with this title already exists. Please choose a different title.";
            $statusType = 'error';
        } else {
            // Insert into quizzes table with grade range
            $quizSql = "INSERT INTO quizzes (teacher_id, grade_start, grade_end, title, description, intelligence_type, virtual_world, created_at) 
                        VALUES (:teacher_id, :grade_start, :grade_end, :title, :description, :intelligence_type, :virtual_world, NOW())";
            
            $quizStmt = $pdo->prepare($quizSql);
            $quizStmt->execute([
                ':teacher_id' => $teacher_id,
                ':grade_start' => $_POST['grade_start'],
                ':grade_end' => $_POST['grade_end'],
                ':title' => $_POST['quiz_title'],
                ':description' => $_POST['quiz_description'],
                ':intelligence_type' => $_POST['intelligence_type'],
                ':virtual_world' => $_POST['virtual_world']
            ]);
            
            $savedQuizId = $pdo->lastInsertId();
            
            // Prevent duplicate submission on refresh
            $_SESSION['quiz_created'] = $savedQuizId;
            
            // Redirect to prevent form resubmission
            header("Location: create-quiz.php?created=$savedQuizId");
            exit();
        }
        
    } catch(Exception $e) {
        $statusMessage = 'Failed to create quiz: ' . $e->getMessage();
        $statusType = 'error';
    }
}

// Check if redirected after successful creation
if (isset($_GET['created'])) {
    $savedQuizId = $_GET['created'];
    $statusMessage = "Quiz created successfully! Quiz ID: $savedQuizId";
    $statusType = 'success';
    $formSubmitted = true;
}

// Clear session on page load (except when redirected after success)
if (!isset($_GET['created'])) {
    unset($_SESSION['quiz_created']);
}

// Set selected world from POST or default
$selectedWorld = isset($_POST['virtual_world']) && !$formSubmitted ? $_POST['virtual_world'] : 'zoo';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz | MIEL - Multiple Intelligence E-Learning</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="mobile.css" media="screen">
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
            margin-bottom: 15px;
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
            margin-bottom: 0px;
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
        
        input, select, textarea {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            font-size: 1.1rem;
            font-family: inherit;
            transition: all 0.3s;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        /* ===== GRADE RANGE SELECTOR STYLES ===== */
        .grade-range-container {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-top: 10px;
        }

        .grade-range-container select {
            width: 100%;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            font-size: 1.1rem;
            font-family: inherit;
            transition: all 0.3s;
            background-color: white;
            cursor: pointer;
            appearance: none;
            background-image: url(data:image/svg+xml;charset=UTF-8,%3csvg\ xmlns=\'http://www.w3.org/2000/svg\'\ viewBox=\'0\ 0\ 24\ 24\'\ fill=\'none\'\ stroke=\'%234A90E2\'\ stroke-width=\'2\'\ stroke-linecap=\'round\'\ stroke-linejoin=\'round\'%3e%3cpolyline\ points=\'6\ 9\ 12\ 15\ 18\ 9\'%3e%3c/polyline%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position:  right 15px;
            background-size: 15px; padding-left:45px; padding-right:15px; padding-top:15px; padding-bottom:15px
        }

        .grade-range-container select:hover {
            border-color: var(--primary-blue);
        }

        .grade-range-container select:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }

        .grade-range-container span {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-blue);
            background: rgba(74, 144, 226, 0.1);
            padding: 10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .grade-range-container {
                flex-direction: column;
                gap: 10px;
            }
            
            .grade-range-container select {
                padding: 12px 12px 12px 40px;
                font-size: 1rem;
            }
            
            .grade-range-container span {
                transform: rotate(90deg);
                margin: 5px 0;
            }
        }
        
        /* ===== INTELLIGENCE TYPE SELECTOR ===== */
        .intelligence-selector {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 15px;
            margin-top: 10px;
        }
        
        .intelligence-option {
            background: #F8F9FF;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 120px;
        }
        
        .intelligence-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
        }
        
        .intelligence-option.selected {
            border-color: var(--secondary-green);
            background: #E8F5E9;
        }
        
        .intelligence-icon-small {
            font-size: 2rem;
            margin-bottom: 8px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(74, 144, 226, 0.1);
        }
        
        .intelligence-info {
            text-align: center;
        }
        
        .intelligence-info h4 {
            font-size: 1rem;
            margin-bottom: 3px;
            color: var(--text-dark);
        }
        
        .intelligence-info p {
            font-size: 0.8rem;
            color: #666;
        }
        
        /* Intelligence-specific colors */
        .linguistic-icon { color: #4CAF50; background: rgba(76, 175, 80, 0.1); }
        .logical-icon { color: #2196F3; background: rgba(33, 150, 243, 0.1); }
        .spatial-icon { color: #9C27B0; background: rgba(156, 39, 176, 0.1); }
        .kinesthetic-icon { color: #FF9800; background: rgba(255, 152, 0, 0.1); }
        .musical-icon { color: #F44336; background: rgba(244, 67, 54, 0.1); }
        .interpersonal-icon { color: #00BCD4; background: rgba(0, 188, 212, 0.1); }
        .intrapersonal-icon { color: #795548; background: rgba(121, 85, 72, 0.1); }
        .naturalist-icon { color: #8BC34A; background: rgba(139, 195, 74, 0.1); }
        
        /* ===== VIRTUAL WORLD SELECTOR ===== */
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
            padding: 10px 8px !important;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 170px !important;
            height: 100%;
        }

        .world-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
        }

        .world-option.selected {
            border-color: var(--secondary-green);
            background: #E8F5E9;
        }

        .world-thumbnail {
            width: 100%;
            height: 120px !important;
            margin-bottom: 5px !important;
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
            padding: 0 !important;
            margin: 0 !important;
            justify-content: space-between;
            height: calc(100% - 90px);
        }

        .world-info h3 {
            font-size: 0.9rem !important;
            margin: 5px 0 !important;
            color: var(--text-dark);
            line-height: 1.1 !important;
            min-height: 1.8em !important;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            padding: 0 !important;
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
            padding: 3px 8px !important;
            border-radius: 6px;
            font-size: 0.7rem !important;
            font-weight: bold;
            transition: all 0.3s;
            margin-top: 4px !important;
            width: 100%;
            max-width: 100px;
            margin-left: auto;
            margin-right: auto;
            height: 30px !important;
            flex-shrink: 0;
        }

        .see-world-link:hover {
            background-color: #FA7C1F;
            transform: translateY(-2px);
            color: white !important;
            text-decoration: none;
        }

        .see-world-link i {
            font-size: 0.6rem !important;
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
        }
        
        .btn-secondary {
            background: var(--accent-yellow);
            color: var(--text-dark);
        }
        
        .btn-secondary:hover {
            background: #E6B800;
        }
        
        .btn-warning {
            background: #FFA726;
            color: white;
        }
        
        .btn-warning:hover {
            background: #FF9800;
            transform: translateY(-3px);
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        /* ===== STANDARDIZED BUTTON STYLES ===== */
        .btn-success, .btn-secondary {
            background-color: #4A90E2 !important;
            color: white !important;
        }
        
        .btn-success:hover, .btn-secondary:hover {
            background-color: #FFD166 !important;
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
        
        /* ===== MOBILE RESPONSIVE ===== */
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
            
            .intelligence-selector,
            .world-selector {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(4, 1fr);
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .btn {
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
            
            .world-option {
                min-height: 200px;
            }
            
            .world-thumbnail {
                height: 100px;
            }
            
            .world-info h3 {
                font-size: 0.95rem;
            }
            
            .see-world-link {
                padding: 5px 10px;
                font-size: 0.75rem;
                max-width: 110px;
            }
        }
        
        @media (max-width: 480px) {
            .intelligence-selector,
            .world-selector {
                grid-template-columns: 1fr;
            }
            
            .intelligence-selector {
                grid-template-rows: repeat(8, 1fr);
            }
            
            .world-selector {
                grid-template-rows: repeat(8, 1fr);
            }
            
            .input-with-icon input {
                padding-left: 45px;
                font-size: 1rem;
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
        
        .quiz-id-display {
            background: #E3F2FD;
            padding: 15px;
            border-radius: 15px;
            margin: 20px 0;
            text-align: center;
            font-size: 1.1rem;
        }
        
        .quiz-id-display strong {
            color: var(--primary-blue);
            font-size: 1.3rem;
        }
        
        .form-disabled {
            opacity: 0.6;
            pointer-events: none;
        }
        
        .error-message {
            color: #FF6B6B;
            margin-top: 5px;
            font-size: 0.9rem;
            display: none;
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
                    <img src="images/create-quiz.jpg" alt="Create Quiz for Arville Metaverse" style="max-width: 450px; height: auto; margin-bottom: 10px;">
                    <p class="subtitle">Design a fun quiz for your students based on ARville worlds!</p>
                </div>
            </div>
        </header>

        <!-- MAIN CARD -->
        <div class="main-card">
            <!-- STATUS MESSAGE -->
            <?php if ($statusMessage): ?>
            <div class="status-message status-<?php echo $statusType; ?>">
                <?php echo htmlspecialchars($statusMessage); ?>
            </div>
            <?php endif; ?>
            
            <?php if ($savedQuizId): ?>
            <div class="quiz-id-display">
                <p>Your quiz has been created with ID: <strong><?php echo $savedQuizId; ?></strong></p>
                <div class="button-group" style="margin-top: 15px;">
                    <a href="add-questions.php?quiz_id=<?php echo $savedQuizId; ?>" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Add Questions
                    </a>
                    <a href="create-quiz.php" class="btn btn-success">
                        <i class="fas fa-plus"></i> Create Another Quiz
                    </a>
                </div>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="create-quiz.php" id="quizForm" class="<?php echo $formSubmitted ? 'form-disabled' : ''; ?>">
                <!-- QUIZ TITLE SECTION -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-heading"></i> Quiz Title
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-pencil-alt input-icon"></i>
                        <input type="text" name="quiz_title" id="quizTitle" placeholder="Enter a fun quiz title..." maxlength="200" required
                               value="<?php echo isset($_POST['quiz_title']) && !$formSubmitted ? htmlspecialchars($_POST['quiz_title']) : ''; ?>">
                    </div>
                    <div id="titleError" class="error-message"></div>
                </div>

                <!-- GRADE LEVEL RANGE SELECTOR -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-graduation-cap"></i> Grade Level Range
                    </label>
                    <div class="grade-range-container">
                        <div style="flex: 1; position: relative;">
                            <i class="fas fa-sort-numeric-up" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--primary-blue); z-index: 1;"></i>
                            <select name="grade_start" id="gradeStart" required style="padding-left: 45px;">
                                <option value="" disabled <?php echo !isset($_POST['grade_start']) ? 'selected' : ''; ?>>From Grade</option>
                                <?php for($i = 1; $i <= 12; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php echo (isset($_POST['grade_start']) && $_POST['grade_start'] == $i) ? 'selected' : ''; ?>>
                                    Grade <?php echo $i; ?>
                                </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        
                        <span>to</span>
                        
                        <div style="flex: 1; position: relative;">
                            <i class="fas fa-sort-numeric-down" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--primary-blue); z-index: 1;"></i>
                            <select name="grade_end" id="gradeEnd" required style="padding-left: 45px;">
                                <option value="" disabled <?php echo !isset($_POST['grade_end']) ? 'selected' : ''; ?>>To Grade</option>
                                <?php for($i = 1; $i <= 12; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php echo (isset($_POST['grade_end']) && $_POST['grade_end'] == $i) ? 'selected' : ''; ?>>
                                    Grade <?php echo $i; ?>
                                </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div id="gradeError" class="error-message" style="color: #FF6B6B; margin-top: 5px; font-size: 0.9rem; display: none;"></div>
                </div>

                <!-- INTELLIGENCE TYPE SELECTOR -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-brain"></i> Intelligence Type
                    </label>
                    <div class="intelligence-selector">
                        <?php
                        $intelligenceTypes = [
                            'linguistic' => ['icon' => 'book', 'name' => 'Linguistic', 'desc' => 'Word Smart'],
                            'logical' => ['icon' => 'calculator', 'name' => 'Logical', 'desc' => 'Number Smart'],
                            'spatial' => ['icon' => 'palette', 'name' => 'Spatial', 'desc' => 'Picture Smart'],
                            'kinesthetic' => ['icon' => 'running', 'name' => 'Kinesthetic', 'desc' => 'Body Smart'],
                            'musical' => ['icon' => 'music', 'name' => 'Musical', 'desc' => 'Music Smart'],
                            'interpersonal' => ['icon' => 'users', 'name' => 'Interpersonal', 'desc' => 'People Smart'],
                            'intrapersonal' => ['icon' => 'user', 'name' => 'Intrapersonal', 'desc' => 'Self Smart'],
                            'naturalist' => ['icon' => 'leaf', 'name' => 'Naturalist', 'desc' => 'Nature Smart']
                        ];
                        
                        $selectedIntelligence = isset($_POST['intelligence_type']) && !$formSubmitted ? $_POST['intelligence_type'] : 'linguistic';
                        
                        foreach ($intelligenceTypes as $key => $type):
                            $isSelected = $selectedIntelligence === $key;
                        ?>
                        <div class="intelligence-option <?php echo $isSelected ? 'selected' : ''; ?>" 
                             data-intelligence="<?php echo $key; ?>">
                            <div class="intelligence-icon-small <?php echo $key; ?>-icon">
                                <i class="fas fa-<?php echo $type['icon']; ?>"></i>
                            </div>
                            <div class="intelligence-info">
                                <h4><?php echo $type['name']; ?></h4>
                                <p><?php echo $type['desc']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="intelligence_type" id="intelligenceType" value="<?php echo $selectedIntelligence; ?>">
                </div>

                <!-- DESCRIPTION -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-book-open"></i> Description
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-align-left input-icon"></i>
                        <textarea name="quiz_description" id="quizDescription" placeholder="Describe what students will learn..."><?php echo isset($_POST['quiz_description']) && !$formSubmitted ? htmlspecialchars($_POST['quiz_description']) : ''; ?></textarea>
                    </div>
                </div>

                <!-- VIRTUAL WORLD SELECTOR -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-globe-americas"></i> Choose Virtual World
                    </label>
                    <div id="virtual-world-selector-container"></div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="button-group" style="margin-top: 30px;">
                    <?php if (!$formSubmitted): ?>
                    <button type="submit" class="btn btn-success" id="submitBtn">
                        <i class="fas fa-plus-circle"></i> Create Quiz
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Reset Form
                    </button>
                    <?php else: ?>
                    <a href="create-quiz.php" class="btn btn-success">
                        <i class="fas fa-plus"></i> Create Another Quiz
                    </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- BOTTOM BUTTONS CONTAINER -->
        <div class="bottom-buttons-container fade-in">
            <a href="teacher-dashboard.php" class="green-btn">
                <i class="fas fa-tachometer-alt"></i> Back to Dashboard
            </a>
            
            <form method="POST" action="logout.php" style="display: inline;">
                <button type="submit" name="logout" class="red-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="virtual-world-selector.js"></script>
    <script>
        // DOM Elements
        const intelligenceOptions = document.querySelectorAll('.intelligence-option');
        const intelligenceInput = document.getElementById('intelligenceType');
        const quizForm = document.getElementById('quizForm');
        const titleInput = document.getElementById('quizTitle');
        const titleError = document.getElementById('titleError');
        const submitBtn = document.getElementById('submitBtn');
        const gradeStart = document.getElementById('gradeStart');
        const gradeEnd = document.getElementById('gradeEnd');
        const gradeError = document.getElementById('gradeError');

        // Initialize Virtual World Selector
        const worldSelector = new VirtualWorldSelector({
            containerId: 'virtual-world-selector-container',
            selectedWorld: '<?php echo $selectedWorld; ?>',
            onWorldChange: function(worldKey, worldData) {
                console.log('World changed to:', worldKey, worldData.name);
                // You can add additional logic here if needed
            }
        });

        // Intelligence Type Selector
        intelligenceOptions.forEach(option => {
            option.addEventListener('click', () => {
                intelligenceOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                intelligenceInput.value = option.dataset.intelligence;
            });
        });

        // Grade range validation
        function validateGradeRange() {
            if (gradeStart.value && gradeEnd.value) {
                const start = parseInt(gradeStart.value);
                const end = parseInt(gradeEnd.value);
                
                if (end < start) {
                    gradeError.textContent = 'End grade cannot be less than start grade!';
                    gradeError.style.display = 'block';
                    return false;
                } else {
                    gradeError.textContent = '';
                    gradeError.style.display = 'none';
                    return true;
                }
            }
            return true;
        }

        gradeStart.addEventListener('change', validateGradeRange);
        gradeEnd.addEventListener('change', validateGradeRange);

        // Check for duplicate title (AJAX call to self)
        async function checkDuplicateTitle(title) {
            if (!title.trim()) return false;
            
            try {
                const response = await fetch('create-quiz.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ title: title })
                });
                
                const result = await response.json();
                return result.exists;
            } catch (error) {
                console.error('Error checking title:', error);
                return false;
            }
        }

        // Form validation
        quizForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const title = titleInput.value.trim();
            if (!title) {
                titleError.textContent = 'Please enter a quiz title!';
                titleError.style.display = 'block';
                titleInput.focus();
                return false;
            }
            
            // Validate grade range
            if (!validateGradeRange()) {
                return false;
            }
            
            // Check for duplicate title
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Checking...';
                submitBtn.disabled = true;
            }
            
            const isDuplicate = await checkDuplicateTitle(title);
            
            if (isDuplicate) {
                titleError.textContent = 'A quiz with this title already exists. Please choose a different title.';
                titleError.style.display = 'block';
                titleInput.focus();
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-plus-circle"></i> Create Quiz';
                    submitBtn.disabled = false;
                }
                return false;
            }
            
            // If no duplicate, submit the form
            titleError.style.display = 'none';
            this.submit();
        });

        // Real-time title validation (optional)
        titleInput.addEventListener('input', function() {
            titleError.style.display = 'none';
        });

        // Add keyboard shortcut: Ctrl+Enter to submit
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'Enter' && !<?php echo $formSubmitted ? 'true' : 'false'; ?>) {
                quizForm.submit();
            }
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