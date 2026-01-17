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
        /* ===== KID-FRIENDLY THEME ===== */
        :root {
            --primary-blue: #4A90E2;
            --secondary-green: #50C878;
            --accent-yellow: #FFD166;
            --background-light: #F8F9FF;
            --text-dark: #2C3E50;
            --shadow: 0 4px 12px rgba(0,0,0,0.1);
            --border-radius: 20px;
            
            /* SIMPLE COLOR CONTROLS */
            --login-tab-bg: #4A90E2;
            --login-tab-text: white;
            --register-tab-bg: #9C27B0;
            --register-tab-text: white;
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
            border-radius: var(--border-radius);
            position: relative;
            overflow: hidden;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .miel-banner {
            width: 100%;
            height: auto;
            display: block;
            border-radius: var(--border-radius);
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
        
        /* ===== TOP LOGIN/REGISTER BUTTONS ===== */
        .top-buttons-container {
            display: flex;
            margin-bottom: 25px;
            border-radius: 15px;
            overflow: hidden;
            background: #F8F9FF;
            gap: 2px;
            border: 2px solid #E0E0E0;
        }
        
        .top-button {
            flex: 1;
            padding: 12px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            font-size: 1rem;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
        }
        
        .top-button:first-child {
            border-radius: 13px 0 0 13px;
        }
        
        .top-button:last-child {
            border-radius: 0 13px 13px 0;
        }
        
        /* Top Login Button - IDENTICAL TO BOTTOM LOGIN BUTTON */
        /* Non-hover/active state: Same as bottom login button (#4A90E2) */
        .top-button[data-form="login"],
        .top-button[data-form="login"].active {
            background: #4A90E2 !important; /* Same as .btn-primary */
            color: white !important; /* Same as .btn-primary */
            border: 2px solid #4A90E2 !important;
        }
        
        /* Hover state: Same as bottom login button hover (#357ABD) - MUST COME AFTER DEFAULT */
        .top-button[data-form="login"]:hover,
        .top-button[data-form="login"].active:hover {
            background: #357ABD !important; /* Same as .btn-primary:hover */
            color: white !important; /* Same as .btn-primary:hover */
            border-color: #357ABD !important;
            transform: translateY(-3px); /* Same as bottom button */
        }
        
        /* Top Register Button - Don't change (as requested) */
        .top-button[data-form="register"] {
            background: #F0F0F0; /* LIGHT GRAY */
            color: #666666; /* Dark gray text */
            border: 2px solid transparent;
        }
        
        .top-button[data-form="register"]:hover {
            background: #BEDAF4; /* Purple on hover */
            color: #666666; /* White text on hover */
            border-color: #7B1FA2;
            transform: translateY(-3px); /* Same as bottom button */
        }
        
        .top-button[data-form="register"].active {
            background: #D2E3F5; /* Purple when active */
            color: white;
            border-color: #7B1FA2;
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
        
        /* ===== BOTTOM SUBMIT BUTTONS ===== */
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
        
        /* Login Button */
        .btn-primary {
            background: var(--primary-blue);
            color: white;
        }
        
        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-3px);
        }
        
        /* Register Button */
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
        
        /* Login form submit button (centered) */
        .btn-login {
            padding: 10px 20px !important; /* Reduced height */
            width: 50% !important;
            max-width: 250px !important;
            margin: 0 auto !important;
            display: block !important;
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
        
        /* ===== MOBILE RESPONSIVE - VISUAL FIXES ONLY ===== */
        @media (max-width: 768px) {
            .container, .narrow-form-container {
                padding: 10px;
            }
            
            .main-card {
                padding: 20px;
            }
            
            .miel-banner-container {
                padding: 0;
                margin-bottom: 20px;
            }
            
            .miel-banner {
                border-width: 3px;
            }
            
            .role-selector {
                flex-direction: column;
            }
            
            .btn {
                font-size: 1.1rem;
                padding: 12px 20px;
            }
            
            .top-button {
                padding: 10px 15px;
                font-size: 0.95rem;
            }
            
            .btn-login {
                width: 70% !important;
                max-width: 200px !important;
            }
            
            .narrow-form-container {
                max-width: 100%;
            }
            
            /* MOBILE-ONLY: Prevent iOS zoom on form inputs */
            input, select, textarea {
                font-size: 16px !important;
            }
        }
        
        @media (max-width: 480px) {
            .input-with-icon input {
                padding-left: 40px;
                font-size: 0.95rem;
            }
            
            .miel-banner-container {
                margin-bottom: 15px;
            }
            
            .top-button {
                flex-direction: column;
                padding: 8px;
                gap: 5px;
                font-size: 0.9rem;
            }
            
            .btn-login {
                width: 100% !important;
                max-width: none !important;
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

    <!-- FORM SECTION (600px width) -->
    <div class="narrow-form-container">

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
            
            <!-- TOP LOGIN/REGISTER BUTTONS -->
            <div class="top-buttons-container">
                <button type="submit" name="login" form="loginForm" class="top-button <?php echo $isLogin ? 'active' : ''; ?>" data-form="login" id="loginTopButton">
                    <i class="fas fa-sign-in-alt"></i> <span>Login</span>
                </button>
                <div class="top-button <?php echo !$isLogin ? 'active' : ''; ?>" data-form="register" id="registerTopButton">
                    <i class="fas fa-user-plus"></i> <span>Register</span>
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
                
                <button type="submit" name="login" class="btn btn-primary btn-login">
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
        const topButtons = document.querySelectorAll('.top-button');
        const formContents = document.querySelectorAll('.form-content');
        const roleOptions = document.querySelectorAll('.role-option');
        const roleInput = document.getElementById('roleInput');
        const studentInfo = document.getElementById('studentInfo');
        
        // Form switcher - using top buttons
        topButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const formType = this.dataset.form;
                
                // Only prevent default for register button (div) not for login button (submit button)
                if (formType === 'register') {
                    e.preventDefault();
                }
                
                // Update active button
                topButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
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
            document.querySelector('.top-button[data-form="register"]').click();
        }
        
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
        
// ===== MOBILE-ONLY LOGIN FIX (Separate from desktop code) =====
// This only runs on mobile devices and won't affect desktop
(function() {
    // Check if we're on a mobile device
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    
    if (!isMobile) {
        console.log('Desktop device - mobile fixes disabled');
        return; // Exit - don't run mobile code on desktop
    }
    
    console.log('Mobile device detected - applying mobile login fixes');
    
    // Wait a moment for the page to fully load
    setTimeout(function() {
        // MOBILE FIX 1: Clean email input for mobile
        const loginForm = document.getElementById('loginForm');
        if (loginForm) {
            console.log('Mobile: Fixing login form');
            
            // Get email input
            const emailInput = loginForm.querySelector('input[name="email"]');
            const passwordInput = loginForm.querySelector('input[name="password"]');
            
            // Clean email on blur (when user leaves the field)
            if (emailInput) {
                emailInput.addEventListener('blur', function() {
                    let email = this.value.trim();
                    
                    // Remove any invisible characters (common on mobile)
                    email = email.replace(/[^\x20-\x7E]/g, '');
                    
                    // Fix common mobile email issues
                    email = email.toLowerCase(); // Force lowercase
                    email = email.replace(/\s+/g, ''); // Remove all whitespace
                    
                    // Remove any trailing/leading dots
                    email = email.replace(/^\.+|\.+$/g, '');
                    
                    console.log('Mobile: Cleaned email from', this.value, 'to', email);
                    this.value = email;
                });
                
                // Also clean on input (real-time)
                emailInput.addEventListener('input', function() {
                    this.value = this.value.toLowerCase();
                });
            }
            
            // Clean password input (remove invisible chars)
            if (passwordInput) {
                passwordInput.addEventListener('blur', function() {
                    let password = this.value;
                    
                    // Remove invisible characters but keep actual password
                    password = password.replace(/[^\x20-\x7E]/g, '');
                    
                    console.log('Mobile: Cleaned password (removed invisible chars)');
                    this.value = password;
                });
            }
            
            // MOBILE FIX 2: Fix form submission with cleaned values
            loginForm.addEventListener('submit', function(e) {
                console.log('Mobile: Form submit intercepted');
                
                // Clean values one more time before submission
                if (emailInput) {
                    let email = emailInput.value.trim();
                    email = email.toLowerCase();
                    email = email.replace(/\s+/g, '');
                    email = email.replace(/[^\x20-\x7E]/g, '');
                    emailInput.value = email;
                    console.log('Mobile: Final cleaned email:', email);
                }
                
                if (passwordInput) {
                    let password = passwordInput.value;
                    password = password.replace(/[^\x20-\x7E]/g, '');
                    passwordInput.value = password;
                    console.log('Mobile: Final cleaned password length:', password.length);
                }
                
                // Show what's being submitted (for debugging)
                console.log('Mobile: Submitting with email:', emailInput.value);
                console.log('Mobile: Submitting with password length:', passwordInput.value.length);
                
                // Check if form is valid
                if (!this.checkValidity()) {
                    console.log('Mobile: Form validation failed');
                    this.reportValidity();
                    e.preventDefault();
                    return false;
                }
                
                console.log('Mobile: Form is valid, proceeding...');
                
                // Show loading state
                const loginButton = this.querySelector('button[name="login"]');
                if (loginButton) {
                    loginButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';
                    loginButton.disabled = true;
                }
                
                return true;
            });
        }
        
        // MOBILE FIX 3: Make email field always show lowercase keyboard
        const emailFields = document.querySelectorAll('input[type="email"]');
        emailFields.forEach(field => {
            field.setAttribute('autocapitalize', 'none');
            field.setAttribute('autocorrect', 'off');
            field.setAttribute('spellcheck', 'false');
        });
        
        // MOBILE FIX 4: Debug - show what's being typed
        console.log('Mobile: Added email/password cleaning');
        
    }, 500);
})();
// ===== END MOBILE-ONLY FIX =====
        
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>