<?php
// home-subj.php — routes to the active subject's menu
// Reads $_SESSION['last_subject'] set by q-display-legacy.php
// No auth check — you can only reach here if already logged in
//
// Add ?debug=1 to print the trace and halt before redirect.

// ============================================================
// DEBUG (fires only with ?debug=1)
// ============================================================
$__debug = isset($_GET['debug']) && $_GET['debug'] === '1';
$__log = [];

function __dbg($msg) {
    global $__log;
    $__log[] = $msg;
}

function __flush_debug($stage) {
    global $__log, $__debug;
    if (!$__debug) return;
    header('Content-Type: text/plain; charset=UTF-8');
    echo "=== HOME-SUBJ DEBUG ===\n";
    echo "Stage: $stage\n\n";
    foreach ($__log as $line) echo $line . "\n";
    echo "\n=== END ===\n";
    exit;
}

// ============================================================
// SESSION
// ============================================================
session_name('KPLUZ_SESSION');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

__dbg("SCRIPT_NAME  = " . ($_SERVER['SCRIPT_NAME'] ?? ''));
__dbg("base         = [$base]");
__dbg("session_id   = " . session_id());
__dbg("last_subject = " . var_export($_SESSION['last_subject'] ?? 'UNSET', true));
__dbg("user_id      = " . var_export($_SESSION['user_id'] ?? 'UNSET', true));

// ============================================================
// SUBJECT DETECTION
// Priority: ?subj= &#8594; session last_subject &#8594; default 'gmrc'
// ============================================================
$subject = $_GET['subj'] ?? null;
__dbg("subject from GET = " . var_export($subject, true));

if ($subject === null && !empty($_SESSION['last_subject'])) {
    $subject = $_SESSION['last_subject'];
    __dbg("subject from session = [$subject]");
}

$subjectMap = [
    'gmrc'               => 'gmrc',
    'math'               => 'math',
    'science'            => 'science',
    'english'            => 'english',
    'filipino'           => 'filipino',
    'mapeh'              => 'mapeh',
    'tle'                => 'tle',
    'araling-panlipunan' => 'araling-panlipunan',
    'aralingpanlipunan'  => 'araling-panlipunan',
    'ap'                 => 'araling-panlipunan',
];

if ($subject === null || !isset($subjectMap[$subject])) {
    $subject = 'gmrc';
    __dbg("subject fallback &#8594; gmrc");
} else {
    $subject = $subjectMap[$subject];
    __dbg("subject mapped &#8594; [$subject]");
}

// ============================================================
// BUILD TARGET
// ============================================================
$target = $base . '/' . $subject . '/modules/' . $subject . '-menu.php';
__dbg("target = [$target]");

$targetFile = __DIR__ . '/' . $subject . '/modules/' . $subject . '-menu.php';
$exists = file_exists($targetFile);
__dbg("target file exists? " . var_export($exists, true));

if (!$exists) {
    // Fallback: default to gmrc menu
    __dbg("target missing — falling back to gmrc-menu.php");
    $subject = 'gmrc';
    $target = $base . '/gmrc/modules/gmrc-menu.php';
    $targetFile = __DIR__ . '/gmrc/modules/gmrc-menu.php';
    __dbg("fallback exists? " . var_export(file_exists($targetFile), true));
}

__flush_debug("about to redirect to $target");

header("Location: $target", true, 302);
exit;