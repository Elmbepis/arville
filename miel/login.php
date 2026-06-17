<?php
// login.php – MIEL login with grade&#8209;specific computed password support
session_name('MIEL_SESSION');
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username_db = 'root';
$password_db = 'AcadeV25!';

$error = '';
$success = '';

// --------------------------------------------------------------------
// COMPUTED PASSWORD FUNCTION (grades 0&#8209;10 + fallback to 11)
// --------------------------------------------------------------------
function computePassword($username, $grade = null) {
    // Ensure username has at least 8 characters
    $username = (string)$username;
    while (strlen($username) < 8) {
        $username .= ' ';
    }
    
    $ord0 = ord($username[0]);
    $ord1 = ord($username[1]);
    $ord2 = ord($username[2]);
    $ord3 = ord($username[3]);
    $ord4 = ord($username[4]);
    $ord5 = ord($username[5]);
    $ord6 = ord($username[6]);
    $ord7 = ord($username[7]);
    
    $sub4 = is_numeric($username[4]) ? intval($username[4]) : $ord4;
    $sub5 = is_numeric($username[5]) ? intval($username[5]) : $ord5;
    $sub6 = is_numeric($username[6]) ? intval($username[6]) : $ord6;
    $sub7 = is_numeric($username[7]) ? intval($username[7]) : $ord7;
    
    // Base calculation (without offset) – used for grades 0&#8209;10
    $kpluzbase = 9876 + 
                 $ord0 * $ord2 * 318 + 
                 $ord1 * $ord3 * 1113 + 
                 $sub4 * $sub5 * 825 + 
                 $sub6 * $sub7 * 115 + 
                 $ord0 * $sub6 * 712 + 
                 $sub7 * $sub7 * 16 * 1989;
    
    // If a valid grade (0–10) is given, return the corresponding computed password
    if ($grade !== null && is_numeric($grade) && $grade >= 0 && $grade <= 10) {
        $g = (int)$grade;
        switch ($g) {
            case 0:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 1234 + 234);
            case 1:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 1345 + 345);
            case 2:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 1456 + 456);
            case 3:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 1567 + 567);
            case 4:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 1678 + 678);
            case 5:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 1789 + 789);
            case 6:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 2123 + 987);
            case 7:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 2234 + 876);
            case 8:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 2345 + 765);
            case 9:
                return (string)($kpluzbase + $ord0 * ($sub4 + 1) * ($sub5 + 1) * 2456 + 654);
            case 10:
                // Grade 10 uses ord($sub4) instead of ($sub4+1)
                return (string)($kpluzbase + $ord0 * $ord4 * ($sub5 + 1) * 2567 + 543);
        }
    }
    
    // Fallback: original Grade&#8209;11 formula (with offset 1234)
    $offset = 1234;
    $kpluzbase_with_offset = $offset + 9876 + 
                 $ord0 * $ord2 * 318 + 
                 $ord1 * $ord3 * 1113 + 
                 $sub4 * $sub5 * 825 + 
                 $sub6 * $sub7 * 115 + 
                 $ord0 * $sub6 * 712 + 
                 $sub7 * $sub7 * 16 * 1989;
    $validpass11 = $kpluzbase_with_offset + $ord0 * $ord4 * ($sub5 + 1) * 1989 + 416;
    return (string)$validpass11;
}

// Helper function to redirect based on role (teachers AND admins go to teacher dashboard)
function redirectToDashboard($role) {
    if ($role === 'teacher' || $role === 'admin') {
        header('Location: teacher-dashboard.php');
    } else {
        header('Location: student-dashboard.php');
    }
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email_or_username = trim($_POST['email']);
    $password = $_POST['password'];
    
    if (empty($email_or_username) || empty($password)) {
        $error = 'Please enter both username/email and password.';
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username_db, $password_db);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Check if input is email (contains '@')
            if (strpos($email_or_username, '@') !== false) {
                // --- EMAIL LOGIN (hashed password) ---
                $email = $email_or_username;
                $stmt = $pdo->prepare("
                    SELECT id, email, full_name, role, grade_level, school, password_hash, username 
                    FROM users WHERE email = ?
                ");
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($user && password_verify($password, $user['password_hash'])) {
                    // Login successful
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_name'] = $user['full_name'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['grade_level'] = $user['grade_level'];
                    $_SESSION['school'] = $user['school'];
                    
                    redirectToDashboard($user['role']);
                } else {
                    $error = 'Invalid email or password.';
                }
            } else {
                // --- USERNAME LOGIN (computed password) ---
                $username = $email_or_username;
                
                // Check if user exists by username
                $stmt = $pdo->prepare("
                    SELECT id, email, full_name, role, grade_level, school, password_hash, username 
                    FROM users WHERE username = ?
                ");
                $stmt->execute([$username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($user) {
                    // User exists – try hashed password first, then computed with grade
                    $login_success = false;
                    if (!is_null($user['password_hash']) && password_verify($password, $user['password_hash'])) {
                        $login_success = true;
                    } elseif (is_null($user['password_hash']) && 
                              $password == computePassword($username, $user['grade_level'])) {
                        $login_success = true;
                    }
                    
                    if ($login_success) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_email'] = $user['email'];
                        $_SESSION['user_name'] = $user['full_name'];
                        $_SESSION['user_role'] = $user['role'];
                        $_SESSION['grade_level'] = $user['grade_level'];
                        $_SESSION['school'] = $user['school'];
                        
                        redirectToDashboard($user['role']);
                    } else {
                        $error = 'Invalid username or password.';
                    }
                } else {
                    // User does not exist – try computed password for auto-creation (default to grade 11)
                    $computed = computePassword($username, 11); // fallback to grade 11
                    if ($password == $computed) {
                        // Auto-create account (student by default)
                        $full_name = $username;
                        $email = $username . '@miel.edu.ph';
                        $role = 'student';
                        $grade_level = NULL; // We don't know grade – will be set later
                        $school = NULL;
                        $password_hash = NULL; // No hash, rely on computed password
                        
                        // Insert new user (no class_name)
                        $insert = $pdo->prepare("
                            INSERT INTO users (email, password_hash, full_name, role, grade_level, school, username, app)
                            VALUES (?, ?, ?, ?, ?, ?, ?, 'miel')
                        ");
                        $insert->execute([$email, $password_hash, $full_name, $role, $grade_level, $school, $username]);
                        $new_id = $pdo->lastInsertId();
                        
                        // Log in the new user
                        $_SESSION['user_id'] = $new_id;
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_name'] = $full_name;
                        $_SESSION['user_role'] = $role;
                        $_SESSION['grade_level'] = $grade_level;
                        $_SESSION['school'] = $school;
                        
                        redirectToDashboard($role);
                    } else {
                        $error = 'Invalid username or password.';
                    }
                }
            }
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
            error_log("MIEL Login DB Error: " . $e->getMessage());
        }
    }
}

// If already logged in, redirect to appropriate dashboard
if (isset($_SESSION['user_id'])) {
    redirectToDashboard($_SESSION['user_role']);
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
    <link rel="stylesheet" href="mobile.css" media="screen">
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
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
            color: var(--text-dark);
            padding: 0px;
            min-height: 100vh;
            position: relative;
            background: linear-gradient(135deg, #E3F2FD 0%, #F3E5F5 100%);
        }
        
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
        
        .container { max-width: 800px; margin: 0 auto; position: relative; z-index: 1; }
        .narrow-form-container { max-width: 600px; margin: 0 auto; position: relative; z-index: 1; }
        
        .navbar { margin-bottom: 30px; font-family: 'Arial', sans-serif !important; font-weight: 300 !important; }
        .navbar-nav .nav-link { font-size: 1.0rem !important; color: #333 !important; transition: color 0.3s ease !important; }
        .navbar-nav .nav-link:hover { color: #4A90E2 !important; }
        .navbar .container { width: 100%; max-width: 100%; padding-left: 300px; padding-right: 300px; display: flex; justify-content: space-between; align-items: center; }
        .navbar .navbar-collapse { flex-grow: 0; }
        
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
        
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-weight: bold; margin-bottom: 8px; font-size: 1rem; color: var(--primary-blue); }
        .input-with-icon { position: relative; display: flex; align-items: center; }
        .input-icon { position: absolute; left: 15px; color: var(--primary-blue); font-size: 1.1rem; }
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
        .btn-primary { background: var(--primary-blue); color: white; }
        .btn-primary:hover { background: #357ABD; transform: translateY(-3px); }
        .btn-login {
            padding: 10px 20px !important;
            width: 50% !important;
            max-width: 250px !important;
            margin: 0 auto !important;
            display: block !important;
        }
        
        .alert { padding: 15px; border-radius: 15px; margin-bottom: 20px; border-left: 5px solid transparent; }
        .alert-success { background: #D4EDDA; color: #155724; border-left-color: var(--secondary-green); }
        .alert-error { background: #F8D7DA; color: #721C24; border-left-color: #FF6B6B; }
        
        @media (max-width: 768px) {
            .container, .narrow-form-container { padding: 10px; }
            .main-card { padding: 20px; }
            .miel-banner-container { padding: 0; margin-bottom: 20px; }
            .miel-banner { border-width: 3px; }
            .btn { font-size: 1.1rem; padding: 12px 20px; }
            .btn-login { width: 70% !important; max-width: 200px !important; }
            .narrow-form-container { max-width: 100%; }
            input, select, textarea { font-size: 16px !important; }
        }
        @media (max-width: 480px) {
            .input-with-icon input { padding-left: 40px; font-size: 0.95rem; }
            .miel-banner-container { margin-bottom: 15px; }
            .btn-login { width: 100% !important; max-width: none !important; }
        }
    </style>
</head>
<body class="login-page">
    <!-- ARVILLE NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo.jpg" alt="ARville Network" width="200" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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

    <div class="miel-banner-container fade-in">
        <img src="miel-banner.png" alt="MIEL - Multiple Intelligence Experiential Learning System" class="miel-banner">
    </div>

    <div class="narrow-form-container">
        <div class="main-card">
            <?php if ($error): ?>
                <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>

            <h2 class="text-center mb-4" style="color: var(--primary-blue);">Welcome Back</h2>
            
            <form method="POST" action="login.php">
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-user"></i> Email or Username</label>
                    <div class="input-with-icon">
                        <i class="fas fa-at input-icon"></i>
                        <input type="text" name="email" placeholder="Enter your email or username" required
                               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                               autocapitalize="none" autocorrect="off" spellcheck="false">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-key input-icon"></i>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                
                <button type="submit" name="login" class="btn btn-primary btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>
            
            <div class="text-center mt-4" style="color: #888; font-size: 0.9rem;">
                Accounts are managed by the system administrator.
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>