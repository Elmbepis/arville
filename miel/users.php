<?php
// add-user.php – MIEL Admin/Teacher add user (teacher allowed only if email = acadev@gmail.com)
session_name('MIEL_SESSION');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ============================================================
// PERMISSION CHECK: Admins OR teacher with email acadev@gmail.com
// ============================================================
$allowed = false;
$error_msg = '';

// Database configuration (MIEL)
$host = 'localhost';
$dbname = 'miel';
$username_db = 'root';
$password_db = 'AcadeV25!';

$conn = new mysqli($host, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = (int)$_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT role, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $role = $row['role'];
        $email = $row['email'];
        if ($role === 'admin') {
            $allowed = true;
        } elseif ($role === 'teacher' && $email === 'acadev@gmail.com') {
            $allowed = true;
        } else {
            $error_msg = "Access denied. Only admins and the designated teacher (acadev@gmail.com) can add users.";
        }
    } else {
        $error_msg = "User not found.";
    }
    $stmt->close();
} else {
    $error_msg = "You must be logged in to access this page.";
}
$conn->close();

if (!$allowed) {
    die($error_msg);
}

// ============================================================
// CONTINUE WITH THE ADD USER LOGIC (MIEL version)
// ============================================================

// Re-establish connection for the rest of the script
$conn = new mysqli($host, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/**
 * Compute password based on username and grade level.
 * For grades 0–10, uses the corresponding formula from KPluz.
 * For grades 11+ or if grade is not provided, falls back to the original Grade&#8209;11 formula.
 */
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
    
    // Base calculation (without offset, as per KPluz formulas for grades 0–10)
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
                return (string)($kpluzbase + $ord0 * $ord4 * ($sub5 + 1) * 2567 + 543);
        }
    }
    
    // Fallback: original Grade&#8209;11 formula (with offset)
    $offset = 1234; // Same as used in login.php
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

$message = '';
$message_type = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $plain_password = $_POST['password'];
    $role = $_POST['role'];
    $grade = !empty($_POST['grade']) ? trim($_POST['grade']) : null;
    $school = !empty($_POST['school']) ? trim($_POST['school']) : null;

    // --- School is required for students and teachers ---
    if (($role === 'student' || $role === 'teacher') && empty($school)) {
        $message = "School is required for students and teachers.";
        $message_type = "error";
    }

    // --- Validate input ---
    if (empty($message)) {
        if (empty($name)) {
            $message = "Name is required.";
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
        }
    }

    // --- Create user ---
    if (empty($message)) {
        $hashed_password = null;
        $computed_password = null;
        if (empty($plain_password) && !empty($username)) {
            // Compute password using the grade level (if provided)
            $computed_password = computePassword($username, $grade);
            $hashed_password = null;
            $password_note = " (Computed password: " . $computed_password . ")";
        } elseif (!empty($plain_password)) {
            $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
            $password_note = "";
        } else {
            $message = "Either password or username is required to generate credentials.";
            $message_type = "error";
        }
        
        if (empty($message)) {
            // Insert user (no class_name, no electives)
            $insert_stmt = $conn->prepare("
                INSERT INTO users (full_name, email, username, password_hash, role, grade_level, school, app, created_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, 'miel', NOW())
            ");
            $insert_stmt->bind_param("sssssss", $name, $email, $username, $hashed_password, $role, $grade, $school);
            if ($insert_stmt->execute()) {
                $display_password = isset($computed_password) ? $computed_password : $plain_password;
                $message = "User created successfully!" . ($password_note ?? "") . "\nPassword: " . $display_password;
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
    <title>MIEL - Add New User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* (All CSS unchanged – same as before) */
        * {
            box-sizing: border-box;
        }
        body { 
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
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
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }
        
        .form-tabs {
            display: flex;
            background: #4A90E2;
            height: 12px;
        }
        
        .light-blue-bar {
            background: #50C878;
            height: 8px;
            width: 100%;
        }
        
        .tab-content {
            padding: 40px;
        }
        
        h2 {
            color: #4A90E2;
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
            color: #4A90E2;
        }
        
        .optional {
            font-weight: normal;
            font-size: 0.8em;
            color: #666;
        }
        
        .note {
            font-size: 0.8em;
            color: #666;
            margin-top: 5px;
            font-style: italic;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%; 
            padding: 12px 15px;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            font-size: 16px;
            font-family: inherit;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #4A90E2;
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        
        .submit-btn {
            width: 100%;
            padding: 14px;
            border: none;
            background: #4A90E2;
            color: white;
            border-radius: 15px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s;
            margin-top: 10px;
        }
        
        .submit-btn:hover { 
            background: #357ABD; 
            transform: translateY(-3px);
        }
        
        .message {
            padding: 12px;
            border-radius: 15px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            white-space: pre-line;
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
            background: #50C878;
            color: white;
            text-decoration: none;
            border-radius: 15px;
            font-weight: bold;
            transition: background 0.3s;
        }
        
        .dashboard-btn:hover {
            background: #3DAE60;
        }
        
        .logout-btn {
            display: inline-block;
            padding: 12px 24px;
            background: #FF6B6B;
            color: white;
            text-decoration: none;
            border-radius: 15px;
            font-weight: bold;
            transition: background 0.3s;
        }
        
        .logout-btn:hover {
            background: #FF4757;
        }
        
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 0;
        }
        
        .form-row .form-group {
            flex: 1;
        }

        .school-required {
            display: none;
        }
        .school-required.visible {
            display: inline;
            color: #dc3545;
            font-weight: bold;
            margin-left: 3px;
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            .login-container {
                margin: 10px;
            }
        }
    </style>
    <script>
        function toggleSchoolRequired() {
            var role = document.getElementById('role').value;
            var schoolInput = document.getElementById('school');
            var schoolRequired = document.getElementById('school_required_indicator');
            if (role === 'student' || role === 'teacher') {
                schoolInput.required = true;
                schoolRequired.classList.add('visible');
            } else {
                schoolInput.required = false;
                schoolRequired.classList.remove('visible');
            }
        }
        window.addEventListener('DOMContentLoaded', function() {
            toggleSchoolRequired();
            document.getElementById('role').addEventListener('change', toggleSchoolRequired);
        });
    </script>
</head>
<body>
    <div class="login-container">
        <div class="header">
            <img src="miel-banner.png" alt="MIEL Logo" style="max-width: 300px; width: 100%; height: auto; margin: 20px 0 0 0;">
        </div>

        <div class="form-tabs"></div>
        <div class="light-blue-bar"></div>

        <div class="tab-content">
            <h2><i class="fas fa-user-plus"></i> Add New User</h2>
            
            <?php if ($message): ?>
                <div class="message <?= $message_type ?>"><?= nl2br(htmlspecialchars($message)) ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" required placeholder="Enter full name">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address <span class="optional">(optional)</span></label>
                    <input type="email" id="email" name="email" placeholder="Leave blank if not needed">
                </div>
                
                <div class="form-group">
                    <label for="username">Username <span class="optional">(required for computed password)</span></label>
                    <input type="text" id="username" name="username" placeholder="Enter username">
                    <div class="note">If password is left blank, a computed password will be generated from this username based on grade level.</div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password <span class="optional">(leave blank for computed password)</span></label>
                    <input type="password" id="password" name="password" placeholder="Enter password or leave blank for computed">
                </div>
                
                <div class="form-group">
                    <label for="role">Role *</label>
                    <select id="role" name="role" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="grade">Grade Level <span class="optional">(required for students with computed password)</span></label>
                        <select id="grade" name="grade">
                            <option value="">-- Select grade --</option>
                            <?php for ($g = 1; $g <= 12; $g++): ?>
                                <option value="<?= $g ?>">Grade <?= $g ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="school">School <span id="school_required_indicator" class="school-required">*</span></label>
                        <input type="text" id="school" name="school" placeholder="Enter school name">
                        <div class="note">Required for students and teachers.</div>
                    </div>
                </div>
                
                <button type="submit" class="submit-btn"><i class="fas fa-save"></i> Create User</button>
            </form>
            
            <div class="form-footer">
                <div class="action-buttons">
                    <a href="dashboard.php" class="dashboard-btn"><i class="fas fa-tachometer-alt"></i> Back to Dashboard</a>
                    <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>