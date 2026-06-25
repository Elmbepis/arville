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

require 'offset.php';

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to compute password from username
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

// List of valid electives
$valid_electives = [
    "Introduction to Organization and Management",
    "Business 1 - Basic Accounting",
    "Social Sciences",
    "Creative Composition 1",
    "Chemistry 1",
    "Biology 1"
];

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

    // --- Electives (only for students) ---
    $electives = null;
    if ($role === 'student') {
        $elective1 = isset($_POST['elective_1']) ? trim($_POST['elective_1']) : '';
        $elective2 = isset($_POST['elective_2']) ? trim($_POST['elective_2']) : '';

        if (empty($elective1) || empty($elective2)) {
            $message = "Both electives are required for students.";
            $message_type = "error";
        } elseif ($elective1 === $elective2) {
            $message = "Elective 1 and Elective 2 must be different.";
            $message_type = "error";
        } elseif (!in_array($elective1, $valid_electives) || !in_array($elective2, $valid_electives)) {
            $message = "Invalid elective selected.";
            $message_type = "error";
        } else {
            $electives = json_encode([$elective1, $elective2]);
        }
    }

    // --- School is required for students AND teachers ---
    if (($role === 'student' || $role === 'teacher') && empty($school)) {
        $message = "School is required for students and teachers.";
        $message_type = "error";
    }

    // --- Existing validation (unchanged) ---
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

    if (empty($message)) {
        // Determine password: if blank, compute from username; otherwise hash the provided password
        if (empty($plain_password) && !empty($username)) {
            // Generate computed password
            $hashed_password = null; // NULL for computed password accounts
            $computed_password = computePassword($username);
            $password_note = " (Computed password: " . $computed_password . ")";
        } elseif (!empty($plain_password)) {
            // Hash the provided password
            $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
            $password_note = "";
        } else {
            // No username and no password - error
            $message = "Either password or username is required to generate credentials.";
            $message_type = "error";
        }
        
        if (empty($message)) {
            // Insert new user with grade, school, and electives fields
            $insert_stmt = $conn->prepare("INSERT INTO users (name, email, username, password, role, grade, school, electives, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            $insert_stmt->bind_param("ssssssss", $name, $email, $username, $hashed_password, $role, $grade, $school, $electives);
            
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
    
    .form-row {
        display: flex;
        gap: 15px;
        margin-bottom: 0;
    }
    
    .form-row .form-group {
        flex: 1;
    }

    /* Electives container – hidden by default, shown when role=student */
    .electives-group {
        background: #f0f7ff;
        padding: 15px;
        border-radius: 6px;
        border-left: 4px solid #003366;
        margin-top: 15px;
        margin-bottom: 15px;
        display: none;
    }
    .electives-group.visible {
        display: block;
    }
    .electives-group .form-group {
        margin-bottom: 15px;
    }
    .electives-group .form-group:last-child {
        margin-bottom: 0;
    }
    .electives-group label .required {
        color: #dc3545;
        font-size: 1.2em;
        margin-left: 3px;
    }

    /* School required indicator – shown for student and teacher */
    .school-required {
        display: none;
    }
    .school-required.visible {
        display: inline;
        color: #dc3545;
        font-weight: bold;
        margin-left: 3px;
    }
  </style>
  <script>
    function toggleStudentFields() {
        var role = document.getElementById('role').value;
        var container = document.getElementById('electives_container');
        var schoolInput = document.getElementById('school');
        var schoolRequired = document.getElementById('school_required_indicator');

        // Electives only for students
        if (role === 'student') {
            container.classList.add('visible');
            document.getElementById('elective_1').required = true;
            document.getElementById('elective_2').required = true;
        } else {
            container.classList.remove('visible');
            document.getElementById('elective_1').required = false;
            document.getElementById('elective_2').required = false;
        }

        // School required for students and teachers
        if (role === 'student' || role === 'teacher') {
            schoolInput.required = true;
            schoolRequired.classList.add('visible');
        } else {
            schoolInput.required = false;
            schoolRequired.classList.remove('visible');
        }
    }
    window.addEventListener('DOMContentLoaded', function() {
        toggleStudentFields();
        document.getElementById('role').addEventListener('change', toggleStudentFields);
    });
  </script>
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
                <div class="note">If password is left blank, a computed password will be generated from this username.</div>
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

            <!-- Electives section – shown only when role = student -->
            <div id="electives_container" class="electives-group">
                <div class="form-group">
                    <label for="elective_1">Elective 1 <span class="required">*</span></label>
                    <select id="elective_1" name="elective_1">
                        <option value="">-- Select an elective --</option>
                        <?php foreach ($valid_electives as $elective): ?>
                            <option value="<?= htmlspecialchars($elective) ?>"><?= htmlspecialchars($elective) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="elective_2">Elective 2 <span class="required">*</span></label>
                    <select id="elective_2" name="elective_2">
                        <option value="">-- Select an elective --</option>
                        <?php foreach ($valid_electives as $elective): ?>
                            <option value="<?= htmlspecialchars($elective) ?>"><?= htmlspecialchars($elective) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="note">Please select two different electives.</div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="grade">Grade Level <span class="optional">(optional)</span></label>
                    <select id="grade" name="grade">
                        <option value="">-- Select grade --</option>
                        <option value="11">Grade 11</option>
                        <option value="12">Grade 12</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="school">School <span id="school_required_indicator" class="school-required">*</span></label>
                    <input type="text" id="school" name="school" placeholder="Enter school name">
                    <div class="note">Required for students and teachers.</div>
                </div>
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