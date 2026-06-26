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
        $subject = 'english';
    } else {
        $subject = 'math';      // default fallback
    }
} else {
    // Ensure subject is lowercase for consistent mapping
    $subject = strtolower($subject);
}

// Ensure grade is within 0-10
if ($grade < 0 || $grade > 10) {
    $grade = 0;
}

// Mapping of subject to new unified menu file (relative to $basePath)
$menuMap = [
    'english'   => '/English/modules/english-menu.php',
    'math'      => '/math/modules/math-menu.php',
    'science'   => '/science/modules/science-menu.php',
    'ap'        => '/AP/modules/ap-menu.php',
    'filipino'  => '/Filipino/modules/filipino-menu.php',
    'mapeh'     => '/mapeh/modules/mapeh-menu.php',
    'tle'       => '/tle/modules/tle-menu.php',
    'gmrc'      => '/gmrc/modules/gmrc-menu.php',
    // Mandarin has been removed – no longer offered in KPluz
];

// Build target URL
if (array_key_exists($subject, $menuMap)) {
    // Use the new unified menu if available
    $target = $basePath . $menuMap[$subject];
} else {
    // Fallback: old grade-specific page (subject folder + /modules/grdX.php)
    // Note: For subjects like "MAPEH", ucfirst would give "Mapeh" – but fallback is only used if not in mapping.
    $folder = ucfirst($subject);
    $target = $basePath . '/' . $folder . '/modules/grd' . $grade . '.php';
}

// Redirect
header("Location: $target");
exit();
?>