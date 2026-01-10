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
    <title>Create Quiz for Arville Metaverse | MIEL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ===== KID-FRIENDLY THEME ===== */
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
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* ===== HEADER ===== */
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
        
        /* ===== MAIN CARD ===== */
        .main-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
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
        
        .intelligence-icon {
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
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 200px;
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
            height: 120px;
            margin-bottom: 10px;
            border-radius: 10px;
            overflow: hidden;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
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
        
        .world-info {
            text-align: center;
            margin-top: 5px;
        }
        
        .world-info h3 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--text-dark);
        }
        
        .world-info p {
            font-size: 0.9rem;
            color: #666;
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
        
        /* ===== MOBILE RESPONSIVE ===== */
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
            
            .intelligence-selector {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(4, 1fr);
            }
            
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
        }
        
        /* ===== ANIMATIONS ===== */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .bounce {
            animation: bounce 0.5s ease infinite;
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
    <div class="container">
        <!-- HEADER -->
        <header class="header">
            <div class="logo">
                <i class="fas fa-graduation-cap logo-icon bounce"></i>
                <div>
                    <h1>Create Quiz for Arville Metaverse</h1>
                    <p class="subtitle">Design fun quizzes for your students!</p>
                </div>
            </div>
            <p>Make learning fun with interactive virtual world quizzes</p>
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
                            <div class="intelligence-icon <?php echo $key; ?>-icon">
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
                            'zoo' => ['icon' => 'paw', 'name' => 'Virtual Zoo', 'desc' => 'Animals & Habitats'],
                            'museum' => ['icon' => 'landmark', 'name' => 'Museum', 'desc' => 'History & Art'],
                            'forest' => ['icon' => 'tree', 'name' => 'Forest', 'desc' => 'Ecosystems'],
                            'ocean' => ['icon' => 'water', 'name' => 'Ocean', 'desc' => 'Marine Life'],
                            'farm' => ['icon' => 'tractor', 'name' => 'Farm', 'desc' => 'Agriculture'],
                            'space' => ['icon' => 'rocket', 'name' => 'Space Station', 'desc' => 'Astronomy'],
                            'city' => ['icon' => 'city', 'name' => 'City', 'desc' => 'Urban Life'],
                            'arctic' => ['icon' => 'icicles', 'name' => 'Arctic', 'desc' => 'Polar Regions']
                        ];
                        
                        $selectedWorld = isset($_POST['virtual_world']) && !$formSubmitted ? $_POST['virtual_world'] : 'zoo';
                        
                        foreach ($worlds as $key => $world):
                            $isSelected = $selectedWorld === $key;
                        ?>
                        <div class="world-option <?php echo $isSelected ? 'selected' : ''; ?>" data-world="<?php echo $key; ?>">
                            <div class="world-thumbnail">
                                <div class="thumbnail-placeholder">
                                    <i class="fas fa-<?php echo $world['icon']; ?>"></i>
                                    <span><?php echo $key; ?>.jpg</span>
                                </div>
                            </div>
                            <div class="world-info">
                                <h3><?php echo $world['name']; ?></h3>
                                <p><?php echo $world['desc']; ?></p>
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
        <div class="bottom-buttons-container">
            <a href="teacher-dashboard.php" class="green-btn">
                <i class="fas fa-tachometer-alt"></i> Back to Dashboard
            </a>
            
            <form method="POST" action="create-quiz.php" style="display: inline;">
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

        // World Selector
        worldOptions.forEach(option => {
            option.addEventListener('click', () => {
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
    </script>
</body>
</html>