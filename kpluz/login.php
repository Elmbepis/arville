<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_name('KPLUZ_SESSION');
session_start();

require 'offset.php';

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
$success = '';

// Function to compute password from username (Grade 11)
function computePassword($username) {
    global $offset;
    
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
    
    $kpluzbase = $offset + 9876 + 
                 $ord0 * $ord2 * 318 + 
                 $ord1 * $ord3 * 1113 + 
                 $sub4 * $sub5 * 825 + 
                 $sub6 * $sub7 * 115 + 
                 $ord0 * $sub6 * 712 + 
                 $sub7 * $sub7 * 16 * 1989;
    
    $validpass11 = $kpluzbase + $ord0 * $ord4 * ($sub5 + 1) * 1989 + 416;
    
    return (string)$validpass11;
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email_or_username = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Check if input is email (contains @) or username
    if (strpos($email_or_username, '@') !== false) {
        // EMAIL LOGIN - only check hashed password
        $email = $email_or_username;
        
        $stmt = $conn->prepare("SELECT id, name, password, role, first_login, expiration FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Check expiration
            if ($user['expiration'] && strtotime($user['expiration']) < time()) {
                $error = "Your account has expired. Please contact the administrator.";
            } elseif (!is_null($user['password']) && password_verify($password, $user['password'])) {
                // Successful login
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['logged_in'] = true;
                
                // Set first login if null
                if (is_null($user['first_login'])) {
                    $now = date('Y-m-d H:i:s');
                    $update_stmt = $conn->prepare("UPDATE users SET first_login = ?, expiration = DATE_ADD(?, INTERVAL 1 YEAR) WHERE id = ?");
                    $update_stmt->bind_param("ssi", $now, $now, $user['id']);
                    $update_stmt->execute();
                }
                
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        // USERNAME LOGIN
        $username = $email_or_username;
        
        // Check if user exists in database
        $stmt = $conn->prepare("SELECT id, name, password, role, first_login, expiration FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Check expiration
            if ($user['expiration'] && strtotime($user['expiration']) < time()) {
                $error = "Your account has expired. Please contact the administrator.";
            } else {
                $login_success = false;
                
                // Try hashed password first (for accounts created via add-user.php)
                if (!is_null($user['password']) && password_verify($password, $user['password'])) {
                    $login_success = true;
                }
                
                // Only try computed password if password is NULL in database
                if (!$login_success && is_null($user['password'])) {
                    $computed = computePassword($username);
                    if ($password == $computed) {
                        $login_success = true;
                    }
                }
                
                if ($login_success) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['logged_in'] = true;
                    
                    // Set first login if null
                    if (is_null($user['first_login'])) {
                        $now = date('Y-m-d H:i:s');
                        $update_stmt = $conn->prepare("UPDATE users SET first_login = ?, expiration = DATE_ADD(?, INTERVAL 1 YEAR) WHERE id = ?");
                        $update_stmt->bind_param("ssi", $now, $now, $user['id']);
                        $update_stmt->execute();
                    }
                    
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error = "Invalid username or password.";
                }
            }
        } else {
            // User doesn't exist - check if computed password matches for auto-creation
            $computed = computePassword($username);
            if ($password == $computed) {
                // Auto-create account
                $name = $username;
                $email = $username . '@kpluz.edu.ph';
                $role = 'student';
                $now = date('Y-m-d H:i:s');
                $expiration = date('Y-m-d', strtotime('+1 year'));
                
                $insert_stmt = $conn->prepare("INSERT INTO users (name, email, username, password, role, first_login, expiration, created_at) VALUES (?, ?, ?, NULL, ?, ?, ?, NOW())");
                $insert_stmt->bind_param("ssssss", $name, $email, $username, $role, $now, $expiration);
                
                if ($insert_stmt->execute()) {
                    $new_id = $conn->insert_id;
                    $_SESSION['user_id'] = $new_id;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_role'] = $role;
                    $_SESSION['logged_in'] = true;
                    
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error = "Invalid username or password.";
                }
            } else {
                $error = "Invalid username or password.";
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
  <title>KPluz SHS - Login</title>
  <style>
    * {
        box-sizing: border-box;
    }
    body { 
        font-family: 'Arial', sans-serif; 
        text-align: center; 
        background: #f0f0f0;
        margin: 0;
        padding: 20px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
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
        height: 12px;
    }
    
    .light-blue-bar {
        background: #0055aa;
        height: 8px;
        width: 100%;
    }
    
    .tab-content {
        padding: 40px;
    }
    
    h2 {
        color: #003366;
        margin-bottom: 30px;
        font-size: 24px;
        text-align: center;
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
  </style>
</head>
<body>
  <div class="login-container">
    <div class="header">
        <img src="images/kpluz_logo.png" alt="KPluz Logo" class="header-logo">
    </div>

    <div class="form-tabs"></div>
    <div class="light-blue-bar"></div>

    <div class="tab-content">
        <h2>Welcome Back</h2>
        
        <?php if ($error): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="message success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="email">Email or Username</label>
                <input type="text" id="email" name="email" required placeholder="Enter your email or username">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            
            <button type="submit" name="login" class="submit-btn">Login</button>
        </form>
        
        <div class="form-footer">
            Accounts are provided by the system administrator.
        </div>
    </div>
  </div>
</body>
</html>