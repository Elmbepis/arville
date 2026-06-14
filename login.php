<?php
/**
 * SUPERUNIVERSAL LOGIN for ARville Network
 * - Uses miel.users table (with 'app' column, default 'miel')
 * - For MIEL users: starts MIEL_SESSION and redirects to teacher/student dashboard
 * - For other apps: starts ARVILLE_SESSION and redirects to index.php
 */
$host = 'localhost';
$dbname = 'miel';
$db_user = 'root';
$db_pass = 'AcadeV25!';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password.';
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_hash'])) {
                $app = $user['app'] ?? 'miel'; // default to 'miel' for existing users

                if ($app === 'miel') {
                    // Use the exact session name that MIEL expects
                    session_name('MIEL_SESSION');
                    session_start();

                    // Set all session variables exactly as MIEL's own login does
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_name'] = $user['full_name'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['grade_level'] = $user['grade_level'];
                    $_SESSION['class_name'] = $user['class_name'];

                    // Redirect to the correct MIEL dashboard
                    if ($user['role'] === 'teacher') {
                        header('Location: miel/teacher-dashboard.php');
                    } else {
                        header('Location: miel/student-dashboard.php');
                    }
                    exit;
                } else {
                    // For future non-MIEL apps
                    session_name('ARVILLE_SESSION');
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_name'] = $user['full_name'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['app'] = $app;
                    $_SESSION['logged_in'] = true;
                    header('Location: index.php');
                    exit;
                }
            } else {
                $error = 'Invalid email or password.';
            }
        } catch (PDOException $e) {
            $error = 'System error. Please try again later.';
            error_log("Login error: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARville - Universal Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #c2ddfc; min-height: 100vh; display: flex; flex-direction: column; }
        .login-card { background: white; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); padding: 2rem; max-width: 450px; width: 100%; margin: 2rem auto; }
        .btn-primary { background: #0d6efd; border: none; transition: all 0.3s; }
        .btn-primary:hover { background: #0b5ed7; transform: translateY(-2px); }
        footer a { text-decoration: none; }
        footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<!-- ARville Navbar (identical to index.php) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.jpg" alt="ARville Network" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="plans.php">Plans</a></li>
                <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Login Form -->
<div class="container d-flex align-items-center justify-content-center" style="flex:1;">
    <div class="login-card">
        <h2 class="text-center">Welcome to ARville</h2>
        <p class="text-center text-muted">One account. All metaverse experiences.</p>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Sign In</button>
        </form>

        <div class="text-center mt-4">
            <a href="register.php" class="text-decoration-none">Create an account</a>
        </div>
    </div>
</div>

<!-- ARville Footer (identical to index.php) -->
<footer class="footer py-4 bg-dark text-white text-center">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> ARville. All rights reserved.</p>
        <div class="footer-links">
            <a href="login.php" class="text-white">Login</a> |
            <a href="plans.php" class="text-white">Subscription Plans</a> |
            <a href="about-us.php" class="text-white">About Us</a> |
            <a href="contact.php" class="text-white">Contact</a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>