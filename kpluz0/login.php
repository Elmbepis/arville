<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_name('KPLUZ_SESSION');
session_start();

require 'offset.php';      // may define $offset, but we override it next
$offset = 0;               // FORCE OFFSET TO 0 for grades 0-10

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
$success = '';

/**
 * Compute all valid passwords for grades 0-10 for a given username.
 * Uses the global $offset (now forced to 0).
 * Returns an associative array [grade => password].
 */
function computeAllPasswords($username) {
    global $offset;
    
    // Ensure username is a string and at least 8 characters; pad with spaces if needed.
    $username = (string)$username;
    while (strlen($username) < 8) {
        $username .= ' ';
    }
    
    // Extract characters
    $c0 = $username[0];
    $c1 = $username[1];
    $c2 = $username[2];
    $c3 = $username[3];
    $c4 = $username[4];
    $c5 = $username[5];
    $c6 = $username[6];
    $c7 = $username[7];
    
    // Ord values for positions 0-3 (always needed)
    $ord0 = ord($c0);
    $ord1 = ord($c1);
    $ord2 = ord($c2);
    $ord3 = ord($c3);
    
    // For positions 4-7: if they are numeric, use the number; otherwise use ord()
    $val4 = is_numeric($c4) ? intval($c4) : ord($c4);
    $val5 = is_numeric($c5) ? intval($c5) : ord($c5);
    $val6 = is_numeric($c6) ? intval($c6) : ord($c6);
    $val7 = is_numeric($c7) ? intval($c7) : ord($c7);
    
    // Base calculation (exactly as in the old code)
    $kpluzbase = $offset + 9876 +
                 $ord0 * $ord2 * 318 +
                 $ord1 * $ord3 * 1113 +
                 $val4 * $val5 * 825 +
                 $val6 * $val7 * 115 +
                 $ord0 * $val6 * 712 +
                 $val7 * $val7 * 16 * 1989;
    
    // Compute passwords for grades 0-10
    $passwords = [];
    $passwords[0] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 1234 + 234;
    $passwords[1] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 1345 + 345;
    $passwords[2] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 1456 + 456;
    $passwords[3] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 1567 + 567;
    $passwords[4] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 1678 + 678;
    $passwords[5] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 1789 + 789;
    $passwords[6] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 2123 + 987;
    $passwords[7] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 2234 + 876;
    $passwords[8] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 2345 + 765;
    $passwords[9] = $kpluzbase + $ord0 * ($val4 + 1) * ($val5 + 1) * 2456 + 654;
    // Grade 10 uses ord($c4) instead of $val4 (matching old code exactly)
    $passwords[10] = $kpluzbase + $ord0 * ord($c4) * ($val5 + 1) * 2567 + 543;
    
    return $passwords;
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
                
                header("Location: app/menu.php");
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
        $stmt = $conn->prepare("SELECT id, name, password, role, grade, school, first_login, expiration FROM users WHERE username = ?");
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
                $matched_grade = null;
                
                // Try hashed password first (for accounts created via add-user.php)
                if (!is_null($user['password']) && password_verify($password, $user['password'])) {
                    $login_success = true;
                }
                
                // If password is NULL in DB, try computed passwords for grades 0-10
                if (!$login_success && is_null($user['password'])) {
                    $computed = computeAllPasswords($username);
                    foreach ($computed as $grade => $validPass) {
                        if ($password == $validPass) {
                            $login_success = true;
                            $matched_grade = $grade;
                            break;
                        }
                    }
                }
                
                if ($login_success) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['logged_in'] = true;
                    if (!is_null($matched_grade)) {
                        $_SESSION['user_grade'] = $matched_grade;
                        // Update the user's grade in DB if it's not set
                        if (is_null($user['grade'])) {
                            $update_grade = $conn->prepare("UPDATE users SET grade = ? WHERE id = ?");
                            $update_grade->bind_param("si", $matched_grade, $user['id']);
                            $update_grade->execute();
                        }
                    }
                    
                    // Set first login if null
                    if (is_null($user['first_login'])) {
                        $now = date('Y-m-d H:i:s');
                        $update_stmt = $conn->prepare("UPDATE users SET first_login = ?, expiration = DATE_ADD(?, INTERVAL 1 YEAR) WHERE id = ?");
                        $update_stmt->bind_param("ssi", $now, $now, $user['id']);
                        $update_stmt->execute();
                    }
                    
                    header("Location: app/menu.php");
                    exit();
                } else {
                    $error = "Invalid username or password.";
                }
            }
        } else {
            // User doesn't exist - check if any computed password matches for auto-creation
            $computed = computeAllPasswords($username);
            $matched_grade = null;
            foreach ($computed as $grade => $validPass) {
                if ($password == $validPass) {
                    $matched_grade = $grade;
                    break;
                }
            }
            
            if (!is_null($matched_grade)) {
                // Auto-create account
                $name = $username;                     // name = username
                $email = NULL;                         // email left blank
                $role = 'student';
                $grade = (string)$matched_grade;       // 0-10 as string
                $school = NULL;                        // school unknown
                $now = date('Y-m-d H:i:s');
                $expiration = date('Y-m-d', strtotime('+1 year'));
                
                $insert_stmt = $conn->prepare("INSERT INTO users (name, email, username, password, role, grade, school, first_login, expiration, created_at) VALUES (?, ?, ?, NULL, ?, ?, ?, ?, ?, NOW())");
                $insert_stmt->bind_param("ssssssss", $name, $email, $username, $role, $grade, $school, $now, $expiration);
                
                if ($insert_stmt->execute()) {
                    $new_id = $conn->insert_id;
                    $_SESSION['user_id'] = $new_id;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_role'] = $role;
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_grade'] = $matched_grade;
                    
                    header("Location: app/menu.php");
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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="icon" href="./images/1x/favicon.png" type="image/png" sizes="16x16">
    <title>KPluz - Online Academic Excellence System</title>
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Montserrat:100,400,700" rel="stylesheet">
    <link rel="stylesheet" href="./app/css/style.css">    
</head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P76JCJB');</script>
<!-- End Google Tag Manager -->

<body>    
    <header class="padding-50">
        <div class="header-container">
            <img class="logo" src="images/svg/kpluz_logo.svg" alt="KPluz Logo">
            <span class="description">KPluz is the most comprehensive online academic excellence system in the country today for pre-school, elementary, and high school students.</span>
            
            <div class="navigation">
                <div class="login">
                    <span class="title text-center text-montserrat text-thin">Sign in</span>
                    
                    <?php if ($error): ?>
                        <div class="message error"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="message success"><?= htmlspecialchars($success) ?></div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <fieldset>
                            <label for="email">Email or Username</label>
                            <input name="email" type="text" maxlength="100" required placeholder="Enter your email or username">
                        </fieldset>
                        <fieldset>
                            <label for="password">Password</label>
                            <input type="password" name="password" maxlength="50" required placeholder="Enter your password">
                        </fieldset>
                        <input class="cta" value="Login" name="login" type="submit">
                    </form>
                </div>
                <ul class="menu text-right">
                    <li><a href="/what-is-kpluz.php">What is KPluz?</a></li>
                    <li><a href="/subscribe-to-kpluz.php">Join Us</a></li>
                    <li><a href="/contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <div class="page" id="content">
        <section name="subjects">
            <div class="subjects">
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">English</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/english.png" alt="English">
                </div>
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">Math</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/math.png" alt="Math">
                </div>
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">Science</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/science.png" alt="Science">
                </div>
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">Araling Panlipunan</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/ap.png" alt="AP">
                </div>
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">Filipino</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/filipino.png" alt="Filipino">
                </div>
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">MAPEH</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/mapeh.png" alt="MAPEH">
                </div>
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">TLE</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/tle.png" alt="TLE">
                </div>
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">GMRC</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/gmrc.png" alt="GMRC">
                </div>
                <div class="subject-card animated fadeInUp">
                    <span class="title text-center">Mandarin</span>
                    <img class="svg-icon" src="./images/subjects/png/1x/mandarin.png" alt="Mandarin">
                </div>
            </div>
        </section>
    </div>
    <!-- END OF MAIN CONTENT -->

    <footer class="padding-50 text-center">
        <div class="menu-container">
            <ul class="menu">
                <li><a href="/what-is-kpluz.php">What is KPluz?</a></li>
                <li><a href="/subscribe-to-kpluz.php">Join Us</a></li>
                <li><a href="/contact.php">Contact Us</a></li>
                <li><a href="/school-access.php">School Access</a></li>
            </ul>
        </div>
        <span class="copyright-text">Copyright &copy; 2018 KPluz.com. All Rights Reserved.</span>
    </footer>

</body>
</html>