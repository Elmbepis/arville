<?php
session_name('KPLUZ_SESSION');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Restrict access to admins only
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['user_role'] !== 'admin') {
    die("Access denied. Admins only.");
}

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
$message_type = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $plain_password = $_POST['password'];
    $role = $_POST['role'];
    
    // Validation
    if (empty($name) || empty($plain_password)) {
        $message = "Name and password are required.";
        $message_type = "error";
    } else {
        // Check if email already exists (if email is provided)
        if ($email) {
            $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $check_stmt->bind_param("s", $email);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            
            if ($check_result->num_rows > 0) {
                $message = "Email already exists. Please use a different email.";
                $message_type = "error";
            }
            $check_stmt->close();
        }
        
        // Check if username already exists (if provided)
        if ($username && empty($message)) {
            $check_user_stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
            $check_user_stmt->bind_param("s", $username);
            $check_user_stmt->execute();
            $check_user_result = $check_user_stmt->get_result();
            
            if ($check_user_result->num_rows > 0) {
                $message = "Username already exists. Please use a different username.";
                $message_type = "error";
            }
            $check_user_stmt->close();
        }
        
        if (empty($message)) {
            // Generate password hash
            $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
            
            // Insert new user (email can be NULL)
            $insert_stmt = $conn->prepare("INSERT INTO users (name, email, username, password, role, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
            $insert_stmt->bind_param("sssss", $name, $email, $username, $hashed_password, $role);
            
            if ($insert_stmt->execute()) {
                $message = "User created successfully!";
                $message_type = "success";
            } else {
                $message = "Error: " . $conn->error;
                $message_type = "error";
            }
            $insert_stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Add New User</title>
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
    
    .optional {
        font-weight: normal;
        font-size: 0.8em;
        color: #666;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        width: 100%; 
        padding: 12px 15px;
        border: 2px solid #e1e5e9;
        border-radius: 6px;
        font-size: 16px;
        transition: border-color 0.3s;
    }
    
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    select:focus {
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
    
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    
    .dashboard-btn {
        display: inline-block;
        padding: 12px 24px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: background 0.3s;
    }
    
    .dashboard-btn:hover {
        background: #218838;
    }
    
    .logout-btn {
        display: inline-block;
        padding: 12px 24px;
        background: #dc3545;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: background 0.3s;
    }
    
    .logout-btn:hover {
        background: #c82333;
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
        <h2>Add New User</h2>
        
        <?php if ($message): ?>
            <div class="message <?= $message_type ?>"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter full name">
            </div>
            
            <div class="form-group">
                <label for="email">Email Address <span class="optional">(optional)</span></label>
                <input type="email" id="email" name="email" placeholder="Leave blank if not needed">
            </div>
            
            <div class="form-group">
                <label for="username">Username <span class="optional">(optional)</span></label>
                <input type="text" id="username" name="username" placeholder="Leave blank for email login only">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter password">
            </div>
            
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            
            <button type="submit" class="submit-btn">Create User</button>
        </form>
        
        <div class="form-footer">
            <div class="action-buttons">
                <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>
    </div>
  </div>
</body>
</html>