<?php
// Modernized subject home page – single entry for all subjects
session_name('KPLUZ_SESSION');
session_start();

// Check login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}

$username = $_SESSION['user_name'] ?? '';
$grade    = (int)($_SESSION['user_grade'] ?? 0);
$basePath = '/arville/kpluz0';

// 1. Get subject from GET parameter (used by menu cards)
// 2. Fallback to username prefix (legacy)
$subject = $_GET['subject'] ?? '';
if (empty($subject)) {
    if (substr($username, 0, 4) == 'kpzm') {
        $subject = 'math';
    } elseif (substr($username, 0, 4) == 'kpzs') {
        $subject = 'science';
    } elseif (substr($username, 0, 4) == 'kpze') {
        $subject = 'English';   // Capital 'E' matches folder name
    } else {
        $subject = 'math';      // default fallback
    }
}

// Ensure grade is within 0-10
if ($grade < 0 || $grade > 10) {
    $grade = 0;
}

// Build target URL
$target = '';

// If subject is English, use the new unified menu (works for all grades)
if (strtolower($subject) == 'english' || $subject == 'English') {
    $target = $basePath . '/English/modules/english-menu.php';
} else {
    // For other subjects, use the old grade-specific page (will be modernized later)
    $target = $basePath . '/' . ucfirst($subject) . '/modules/grd' . $grade . '.php';
}

// Redirect
header("Location: $target");
exit();
?>