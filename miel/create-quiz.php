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
            // Insert into quizzes table with ACTUAL teacher ID from session
            $quizSql = "INSERT INTO quizzes (teacher_id, title, description, intelligence_type, virtual_world, created_at) 
                        VALUES (:teacher_id, :title, :description, :intelligence_type, :virtual_world, NOW())";
            
            $quizStmt = $pdo->prepare($quizSql);
            $quizStmt->execute([
                ':teacher_id' => $teacher_id, // Use actual teacher ID from session
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

/* COMPACT virtual world card - REDUCED SPACING */
.world-option {
    background: #F8F9FF;
    border: 3px solid #E0E0E0;
    border-radius: 15px;
    padding: 10px 8px !important; /* Reduced padding */
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 170px !important; /* SIGNIFICANTLY REDUCED height */
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
    height: 120px !important; /* SIGNIFICANTLY REDUCED height */
    margin-bottom: 5px !important; /* Reduced margin */
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

/* Placeholder styling */
.thumbnail-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #999;
    font-size: 0.9rem;
}

.thumbnail-placeholder i {
    font-size: 2.5rem;
    margin-bottom: 5px;
}

/* COMPACT WORLD INFO CONTAINER - MINIMAL SPACING */
.world-info {
    text-align: center;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    width: 100%;
    padding: 0 !important; /* Remove padding */
    margin: 0 !important; /* Remove margins */
    justify-content: space-between;
    height: calc(100% - 90px); /* Fill remaining space after thumbnail */
}

/* TIGHT TITLE STYLING */
.world-info h3 {
    font-size: 0.9rem !important;
    margin: 5px 0 !important; /* Minimal vertical margin */
    color: var(--text-dark);
    line-height: 1.1 !important; /* Very tight line height */
    min-height: 1.8em !important; /* Reduced minimum height */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    padding: 0 !important;
    font-weight: bold;
}

/* COMPACT "SEE WORLD" LINK - TIGHT TO TITLE */
.see-world-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    background-color: #FDD473;
    color: #2C3E50 !important;
    text-decoration: none;
    padding: 3px 8px !important; /* Minimal padding */
    border-radius: 6px;
    font-size: 0.7rem !important; /* Smaller font */
    font-weight: bold;
    transition: all 0.3s;
    margin-top: 4px !important; /* Very small top margin */
    width: 100%;
    max-width: 100px; /* Smaller width */
    margin-left: auto;
    margin-right: auto;
    height: 30px !important; /* Smaller height */
    flex-shrink: 0; /* Don't shrink */
}

.see-world-link:hover {
    background-color: #FA7C1F;
    transform: translateY(-2px);
    color: white !important;
    text-decoration: none;
}

.see-world-link i {
    font-size: 0.6rem !important; /* Smaller icon */
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
        
        /* ===== MOBILE RESPONSIVE (SAME AS teacher-dashboard.php) ===== */
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
            
            /* Mobile adjustments for world options */
            .world-option {
                min-height: 200px; /* Smaller on mobile */
            }
            
            .world-thumbnail {
                height: 100px;
            }
            
            .world-info h3 {
                font-size: 0.95rem;
            }
            
            .world-subtitle {
                font-size: 0.8rem;
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
<img src="images/create-quiz.jpg" alt="Create Quiz for Arville Metaverse" style="max-width: 450 px; height: auto; margin-bottom: 10px;">
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
                <!-- QUIZ INFO SECTION -->
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
                    <div class="world-selector">
                        <?php
                        $worlds = [
                            'zoo' => [
                                'name' => 'ARville Zoo', 
                                'desc' => 'Terrestrial Zoology', 
                                'image' => 'vw-zoo.jpg',
                                'link' => '../zoo1.htm'
                            ],
                            'museum' => [
                                'name' => 'ARVille Museum', 
                                'desc' => 'History & Art', 
                                'image' => 'vw-museum.jpg',
                                'link' => '../museum.htm?id=1'
                            ],
                            'ocean' => [
                                'name' => 'Shark Lair', 
                                'desc' => 'Marine Biology', 
                                'image' => 'vw-ocean.jpg',
                                'link' => '../nature.htm?id=1'
                            ],
        'forest park' => [
            'name' => 'Forest Park', 
            'desc' => 'Botany', 
            'image' => 'vw-forest-park.jpg',
            'link' => '../park1.htm'
        ],
        'coral reef' => [
            'name' => 'Rainbow Reef', 
            'desc' => 'Marine Biology', 
            'image' => 'vw-coral-reefs.jpg',
            'link' => '../nature.htm?id=3'
        ],
        'farm' => [
            'name' => 'Farm Village', 
            'desc' => 'Agriculture', 
            'image' => 'vw-farm.jpg',
            'link' => '../village2.htm?id=1'
        ],
        'raptor island' => [
             'name' => 'Raptor Island', 
             'desc' => 'Prehistoric Biology', 
             'image' => 'vw-raptor.jpg',
             'link' => '../nature.htm?id=2'
        ],
        'toy world' => [
            'name' => 'Toy World', 
            'desc' => 'Fantasy', 
            'image' => 'vw-toy-world.jpg',
            'link' => '../village.htm?id=3'
        ],
    ];
                        
                        $selectedWorld = isset($_POST['virtual_world']) && !$formSubmitted ? $_POST['virtual_world'] : 'zoo';
                        
                        foreach ($worlds as $key => $world):
                            $isSelected = $selectedWorld === $key;
                            $imagePath = "images/{$world['image']}";
                            // Check if image exists, fallback to default if not
                            $actualImage = file_exists($imagePath) ? $imagePath : "images/default-world.jpg";
                        ?>
                        <div class="world-option <?php echo $isSelected ? 'selected' : ''; ?>" data-world="<?php echo $key; ?>">
                            <div class="world-thumbnail">
                                <img src="<?php echo $actualImage; ?>" alt="<?php echo $world['name']; ?>">
                            </div>
                            <div class="world-info">
                                <h3><?php echo $world['name']; ?></h3>
                                <a href="<?php echo $world['link']; ?>" target="_blank" class="see-world-link" onclick="event.stopPropagation();">
                                    <i class="fas fa-external-link-alt"></i> See World
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="virtual_world" id="virtualWorld" value="<?php echo $selectedWorld; ?>">
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
    <script>
        // DOM Elements
        const intelligenceOptions = document.querySelectorAll('.intelligence-option');
        const worldOptions = document.querySelectorAll('.world-option');
        const intelligenceInput = document.getElementById('intelligenceType');
        const virtualWorldInput = document.getElementById('virtualWorld');
        const quizForm = document.getElementById('quizForm');
        const titleInput = document.getElementById('quizTitle');
        const titleError = document.getElementById('titleError');
        const submitBtn = document.getElementById('submitBtn');

        // Intelligence Type Selector
        intelligenceOptions.forEach(option => {
            option.addEventListener('click', () => {
                intelligenceOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                intelligenceInput.value = option.dataset.intelligence;
            });
        });

        // World Selector - updated to ignore clicks on the "See World" link
        worldOptions.forEach(option => {
            option.addEventListener('click', (e) => {
                // Don't trigger selection if clicking on the "See World" link
                if (e.target.closest('.see-world-link')) {
                    return;
                }
                
                worldOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                virtualWorldInput.value = option.dataset.world;
            });
        });

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