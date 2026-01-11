<?php
// login.php
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username = 'root';
$password = 'AcadeV25!';

// Initialize variables
$error = '';
$success = '';
$isLogin = true; // Default to login form

// Check which form to show
if (isset($_GET['action']) && $_GET['action'] === 'register') {
    $isLogin = false;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // REGISTRATION
        if (isset($_POST['register'])) {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $full_name = trim($_POST['full_name']);
            $role = $_POST['role'];
            $grade_level = $_POST['grade_level'];
            $class_name = trim($_POST['class_name'] ?? '');
            
            // Validate
            if (empty($email) || empty($password) || empty($full_name) || empty($role)) {
                $error = 'Please fill in all required fields.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Please enter a valid email address.';
            } elseif ($password !== $confirm_password) {
                $error = 'Passwords do not match.';
            } elseif (strlen($password) < 6) {
                $error = 'Password must be at least 6 characters long.';
            } else {
                // Check if email already exists
                $checkStmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $checkStmt->execute([$email]);
                
                if ($checkStmt->fetch()) {
                    $error = 'Email already registered. Please login or use a different email.';
                } else {
                    // Hash password
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    
                    // Insert user
                    $stmt = $pdo->prepare("INSERT INTO users (email, password_hash, full_name, role, grade_level, class_name) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$email, $password_hash, $full_name, $role, $grade_level, $class_name]);
                    
                    $success = 'Registration successful! You can now login.';
                    $isLogin = true; // Switch to login form
                }
            }
        }
        
        // LOGIN
        elseif (isset($_POST['login'])) {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            
            if (empty($email) || empty($password)) {
                $error = 'Please enter email and password.';
            } else {
                // Get user from database
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($user && password_verify($password, $user['password_hash'])) {
                    // Set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_name'] = $user['full_name'];
                    $_SESSION['user_role'] = $user['role'];
                    
                    // Redirect based on role
                    if ($user['role'] === 'teacher') {
                        header('Location: teacher-dashboard.php');
                    } else {
                        header('Location: student-dashboard.php');
                    }
                    exit();
                } else {
                    $error = 'Invalid email or password.';
                }
            }
        }
        
    } catch(PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    }
}

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_role'] === 'teacher') {
        header('Location: teacher-dashboard.php');
    } else {
        header('Location: student-dashboard.php');
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MIEL - Multiple Intelligence E-Learning</title>
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
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        /* NARROW FORM CONTAINER */
        .narrow-form-container {
            max-width: 600px;
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
        
        .btn-login {
    	padding: 10px 20px !important; /* Reduced height */
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
        
        /* ===== LOGIN/REGISTER HEADER ===== */
        .form-header {
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
        
        /* ===== FORM SWITCHER ===== */
        .form-switcher {
            display: flex;
            margin-bottom: 25px;
            border-radius: 15px;
            overflow: hidden;
            background: #F8F9FF;
        }
        
        .form-tab {
            flex: 1;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            font-size: 1.1rem;
        }
        
        .form-tab.active {
            background: var(--primary-blue);
            color: white;
        }
        
        .form-tab:hover:not(.active) {
            background: #E3F2FD;
        }
        
        /* ===== FORM ELEMENTS ===== */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 1rem;
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
            font-size: 1.1rem;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 12px 12px 12px 45px;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
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
            width: 100%;
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
            background: #9C27B0 !important; /* Purple color */
            color: white !important;
            border: none !important;
        }
        
        .btn-success:hover {
            background: #7B1FA2 !important; /* Darker purple on hover */
            color: white !important;
            transform: translateY(-3px);
        }
        
        /* ===== MESSAGES ===== */
        .alert {
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 20px;
            border-left: 5px solid transparent;
        }
        
        .alert-success {
            background: #D4EDDA;
            color: #155724;
            border-left-color: var(--secondary-green);
        }
        
        .alert-error {
            background: #F8D7DA;
            color: #721C24;
            border-left-color: #FF6B6B;
        }
        
        /* ===== ROLE SELECTOR ===== */
        .role-selector {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        .role-option {
            flex: 1;
            text-align: center;
            padding: 15px;
            background: #F8F9FF;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
        }
        
        .role-option:hover {
            transform: translateY(-3px);
            border-color: var(--primary-blue);
        }
        
        .role-option.selected {
            border-color: var(--secondary-green);
            background: #E8F5E9;
        }
        
        .teacher-option {
            color: var(--primary-blue);
        }
        
        .student-option {
            color: var(--secondary-green);
        }
        
        /* ===== STUDENT INFO ===== */
        .student-info {
            background: #F8F9FF;
            padding: 15px;
            border-radius: 15px;
            margin-top: 10px;
            display: none;
        }
        
        .student-info.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        /* ===== ANIMATIONS ===== */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .bounce {
            animation: bounce 0.5s ease infinite;
        }
        
        .form-content {
            display: none;
        }
        
        .form-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .container, .narrow-form-container {
                padding: 10px;
            }
            
            .main-card {
                padding: 20px;
            }
            
            h1 {
                font-size: 1.8rem;
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
            
            .role-selector {
                flex-direction: column;
            }
            
            .btn {
                font-size: 1.1rem;
                padding: 12px 20px;
            }
            
            .form-header {
                padding: 20px;
            }
            
            /* Adjust narrow container for mobile */
            .narrow-form-container {
                max-width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .input-with-icon input {
                padding-left: 40px;
                font-size: 0.95rem;
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
        <!-- MIEL HEADER (800px width) -->
        <header class="miel-header fade-in">
            <div class="miel-logo">
                <img src="miel-logo.jpg" alt="MIEL Logo" class="miel-logo-image fade-in">                
                <p class="miel-subtitle">Multiple Intelligence Experiential Learning System</p>
                <p class="miel-tagline">Empowering every student through personalized learning adventures based on their unique intelligence strengths</p>
            </div>
            
        </header>
    </div>

    <!-- FORM SECTION (600px width) -->
    <div class="narrow-form-container">
        <!-- FORM HEADER -->
        <header class="form-header fade-in">
            <div class="logo">
                <i class="fas fa-graduation-cap logo-icon bounce"></i>
                <div>
                    <h1>MIEL Learning Portal</h1>
                    <p class="subtitle">Login or Register to Start Learning!</p>
                </div>
            </div>
        </header>

        <!-- MAIN CARD -->
        <div class="main-card">
            <!-- MESSAGES -->
            <?php if ($error): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
            </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success); ?>
            </div>
            <?php endif; ?>
            
            <!-- FORM SWITCHER -->
            <div class="form-switcher">
                <div class="form-tab <?php echo $isLogin ? 'active' : ''; ?>" data-form="login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </div>
                <div class="form-tab <?php echo !$isLogin ? 'active' : ''; ?>" data-form="register">
                    <i class="fas fa-user-plus"></i> Register
                </div>
            </div>
            
            <!-- LOGIN FORM -->
            <form method="POST" action="login.php" class="form-content <?php echo $isLogin ? 'active' : ''; ?>" id="loginForm">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-at input-icon"></i>
                        <input type="email" name="email" placeholder="Enter your email" required
                               value="<?php echo isset($_POST['email']) && isset($_POST['login']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-key input-icon"></i>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                
<button type="submit" name="login" class="btn btn-primary btn-login" style="width: 50% !important; max-width: 250px !important; margin: 0 auto !important; display: block !important;">
    <i class="fas fa-sign-in-alt"></i> Login
</button>

            </form>
            
            <!-- REGISTRATION FORM -->
            <form method="POST" action="login.php" class="form-content <?php echo !$isLogin ? 'active' : ''; ?>" id="registerForm">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-at input-icon"></i>
                        <input type="email" name="email" placeholder="Enter your email" required
                               value="<?php echo isset($_POST['email']) && isset($_POST['register']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user"></i> Full Name
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="full_name" placeholder="Enter your full name" required
                               value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user-tag"></i> I am a:
                    </label>
                    <div class="role-selector">
                        <div class="role-option teacher-option <?php echo (isset($_POST['role']) && $_POST['role'] === 'teacher') || !isset($_POST['role']) ? 'selected' : ''; ?>" 
                             data-role="teacher">
                            <i class="fas fa-chalkboard-teacher"></i> Teacher
                        </div>
                        <div class="role-option student-option <?php echo isset($_POST['role']) && $_POST['role'] === 'student' ? 'selected' : ''; ?>" 
                             data-role="student">
                            <i class="fas fa-user-graduate"></i> Student
                        </div>
                    </div>
                    <input type="hidden" name="role" id="roleInput" value="<?php echo isset($_POST['role']) ? $_POST['role'] : 'teacher'; ?>">
                </div>
                
                <!-- STUDENT INFO (Only shows for students) -->
                <div class="student-info <?php echo (isset($_POST['role']) && $_POST['role'] === 'student') || (!isset($_POST['role']) && isset($_POST['register'])) ? 'show' : ''; ?>" id="studentInfo">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-graduation-cap"></i> Grade Level
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-sort-numeric-up input-icon"></i>
                            <input type="number" name="grade_level" min="1" max="12" placeholder="Grade (1-12)" 
                                   value="<?php echo isset($_POST['grade_level']) ? htmlspecialchars($_POST['grade_level']) : ''; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-users"></i> Class Name (Optional)
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-door-open input-icon"></i>
                            <input type="text" name="class_name" placeholder="e.g., Grade 5-A, Science Class" 
                                   value="<?php echo isset($_POST['class_name']) ? htmlspecialchars($_POST['class_name']) : ''; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-key input-icon"></i>
                        <input type="password" name="password" placeholder="Create a password (min 6 characters)" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Confirm Password
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-key input-icon"></i>
                        <input type="password" name="confirm_password" placeholder="Confirm your password" required>
                    </div>
                </div>
                
                <button type="submit" name="register" class="btn btn-success">
                    <i class="fas fa-user-plus"></i> Register
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        // DOM Elements
        const formTabs = document.querySelectorAll('.form-tab');
        const formContents = document.querySelectorAll('.form-content');
        const roleOptions = document.querySelectorAll('.role-option');
        const roleInput = document.getElementById('roleInput');
        const studentInfo = document.getElementById('studentInfo');
        
        // Form switcher
        formTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const formType = tab.dataset.form;
                
                // Update active tab
                formTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // Show corresponding form
                formContents.forEach(form => form.classList.remove('active'));
                document.getElementById(`${formType}Form`).classList.add('active');
                
                // Update URL
                const url = new URL(window.location);
                url.searchParams.set('action', formType);
                window.history.pushState({}, '', url);
            });
        });
        
        // Role selector
        roleOptions.forEach(option => {
            option.addEventListener('click', () => {
                roleOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                roleInput.value = option.dataset.role;
                
                // Show/hide student info
                if (option.dataset.role === 'student') {
                    studentInfo.classList.add('show');
                } else {
                    studentInfo.classList.remove('show');
                }
            });
        });
        
        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = this.querySelector('input[name="password"]').value;
            const confirmPassword = this.querySelector('input[name="confirm_password"]').value;
            const role = roleInput.value;
            const gradeLevel = this.querySelector('input[name="grade_level"]');
            
            // Password validation
            if (password.length < 6) {
                e.preventDefault();
                alert('Password must be at least 6 characters long.');
                return false;
            }
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match.');
                return false;
            }
            
            // Student validation
            if (role === 'student') {
                const grade = parseInt(gradeLevel.value);
                if (isNaN(grade) || grade < 1 || grade > 12) {
                    e.preventDefault();
                    alert('Please enter a valid grade level (1-12).');
                    return false;
                }
            }
            
            return true;
        });
        
        // Auto-switch to registration form if coming from login
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('action') === 'register') {
            document.querySelector('.form-tab[data-form="register"]').click();
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