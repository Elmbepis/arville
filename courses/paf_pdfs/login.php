<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "courses");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
$success = '';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Check if user exists
    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password (assuming passwords are hashed)
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['logged_in'] = true;
            
            // Redirect to dashboard or previous page
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    $name = trim($_POST['reg_name']);
    $email = trim($_POST['reg_email']);
    $password = $_POST['reg_password'];
    $confirm_password = $_POST['reg_confirm_password'];
    $role = 'trainee'; // Default role for all new registrations
    
    // Validation
    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long.";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error = "Email already registered.";
        } else {
            // Insert new user with default 'trainee' role
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);
            
            if ($stmt->execute()) {
                $success = "Registration successful! Please login.";
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PAF Training Platform - Login</title>
  <style>
    * {
        box-sizing: border-box;
    }
    body { 
        font-family: 'Arial', sans-serif; 
        text-align: center; 
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        margin: 0;
        padding: 20px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    /* Header background strip */
    .header {
        width: 100%;
        max-width: 800px;
        height: 200px;
        background: url('header-bg.jpg') repeat-x top center;
        background-size: auto 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
        border-radius: 10px 10px 0 0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .header-logo {
        max-height: 120px;
    }
    
    .login-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        overflow: hidden;
        max-width: 800px;
        width: 100%;
    }
    
    .form-tabs {
        display: flex;
        background: #003366;
    }
    
    .tab-button {
        flex: 1;
        padding: 15px;
        background: none;
        border: none;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }
    
    .tab-button.active {
        background: #0055aa;
    }
    
    .tab-button:hover {
        background: #004488;
    }
    
    .tab-content {
        display: none;
        padding: 40px;
    }
    
    .tab-content.active {
        display: block;
    }
    
    h2 {
        color: #003366;
        margin-bottom: 30px;
        font-size: 24px;
    }
    
    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }
    
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #003366;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="password"] { 
        width: 100%; 
        padding: 12px 15px;
        border: 2px solid #e1e5e9;
        border-radius: 6px;
        font-size: 16px;
        transition: border-color 0.3s;
    }
    
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #003366;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }
    
    .submit-btn {
        width: 100%;
        padding: 14px;
        border: none;
        background: #003366;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background 0.3s;
        margin-top: 10px;
    }
    
    .submit-btn:hover { 
        background: #0055aa; 
    }
    
    .message {
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }
    
    .error {
        background: #ffe6e6;
        color: #d63031;
        border: 1px solid #ff7675;
    }
    
    .success {
        background: #e6fffa;
        color: #00b894;
        border: 1px solid #55efc4;
    }
    
    .form-footer {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #e1e5e9;
        text-align: center;
        color: #666;
    }
    
    .switch-text {
        color: #003366;
        cursor: pointer;
        text-decoration: underline;
    }
    
    .switch-text:hover {
        color: #0055aa;
    }
    
    .role-notice {
        background: #e6f7ff;
        border: 1px solid #91d5ff;
        border-radius: 6px;
        padding: 12px;
        margin-bottom: 20px;
        text-align: center;
        color: #003366;
        font-size: 0.9em;
    }
  </style>
  <script>
    function showTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active');
        });
        
        // Show selected tab
        document.getElementById(tabName + '-tab').classList.add('active');
        document.querySelector(`[onclick="showTab('${tabName}')"]`).classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
        showTab('login'); // Default to login tab
    });
  </script>
</head>
<body>
  <div class="login-container">
    <!-- Header with tiled background and logo -->
    <div class="header">
        <img src="paf-logo.png" alt="PAF Logo" class="header-logo">
    </div>

    <div class="form-tabs">
        <button class="tab-button active" onclick="showTab('login')">Login</button>
        <button class="tab-button" onclick="showTab('register')">Register</button>
    </div>

    <!-- Login Tab -->
    <div id="login-tab" class="tab-content active">
        <h2>Welcome Back</h2>
        
        <?php if ($error && isset($_POST['login'])): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="message success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            
            <button type="submit" name="login" class="submit-btn">Login</button>
        </form>
        
        <div class="form-footer">
            Don't have an account? <span class="switch-text" onclick="showTab('register')">Register here</span>
        </div>
    </div>

    <!-- Register Tab -->
    <div id="register-tab" class="tab-content">
        <h2>Create Account</h2>
        
        <div class="role-notice">
            <strong>Note:</strong> All new accounts are created as <strong>Trainee</strong> by default.<br>
            Contact an administrator for instructor or admin access.
        </div>
        
        <?php if ($error && isset($_POST['register'])): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="reg_name">Full Name</label>
                <input type="text" id="reg_name" name="reg_name" required placeholder="Enter your full name">
            </div>
            
            <div class="form-group">
                <label for="reg_email">Email Address</label>
                <input type="email" id="reg_email" name="reg_email" required placeholder="Enter your email">
            </div>
            
            <div class="form-group">
                <label for="reg_password">Password</label>
                <input type="password" id="reg_password" name="reg_password" required placeholder="At least 6 characters">
            </div>
            
            <div class="form-group">
                <label for="reg_confirm_password">Confirm Password</label>
                <input type="password" id="reg_confirm_password" name="reg_confirm_password" required placeholder="Re-enter your password">
            </div>
            
            <button type="submit" name="register" class="submit-btn">Create Account</button>
        </form>
        
        <div class="form-footer">
            Already have an account? <span class="switch-text" onclick="showTab('login')">Login here</span>
        </div>
    </div>
  </div>
</body>
</html>