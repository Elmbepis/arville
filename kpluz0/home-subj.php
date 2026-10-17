<?php
// home-subj.php — routes to the active subject's menu
// Reads $_SESSION['last_subject'] (lowercase) set by q-display-legacy.php
// Maps back to real folder case (AP, English, Filipino) for the redirect target.

session_name('KPLUZ_SESSION');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

// Map lowercase session keys &#8594; real folder names
$folderCase = [
    'ap'       => 'AP',
    'english'  => 'English',
    'filipino' => 'Filipino',
    // All other subjects are lowercase already — no entry needed
];

// ============================================================
// SUBJECT DETECTION
// ============================================================
$subject = $_GET['subj'] ?? null;

if ($subject === null && !empty($_SESSION['last_subject'])) {
    $subject = $_SESSION['last_subject'];
}

if ($subject === null || $subject === '') {
    $subject = 'gmrc';
}

$subject = strtolower($subject);

// ============================================================
// BUILD TARGET
// ============================================================
$folder   = $folderCase[$subject] ?? $subject;
$menuFile = $subject . '-menu.php';        // lowercase filename inside the folder

$target     = $base . '/' . $folder . '/modules/' . $menuFile;
$targetFile = __DIR__ . '/' . $folder . '/modules/' . $menuFile;

if (!file_exists($targetFile)) {
    // Fallback to gmrc if the menu file isn't found
    $folder   = 'gmrc';
    $menuFile = 'gmrc-menu.php';
    $target   = $base . '/gmrc/modules/gmrc-menu.php';
}

header("Location: $target", true, 302);
exit;