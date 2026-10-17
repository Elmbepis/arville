<?php
// q-display.php — shim; redirects old menu links to q-display-legacy.php
// Deploy as <subject>/modules/q-display.php AND <subject>/q-display.php
// Preserves the folder's real case (AP, English, Filipino) in the redirect URL,
// so image paths resolve on case-sensitive filesystems (Linux).

$scriptName = $_SERVER['SCRIPT_NAME'];
$parts      = explode('/', trim($scriptName, '/'));
$rootIdx    = array_search('kpluz0', $parts);

if ($rootIdx === false) {
    die("Cannot locate app root in path: $scriptName");
}

// Preserve original folder case — 'AP' stays 'AP', 'English' stays 'English'
$subjectFolder = $parts[$rootIdx + 1] ?? 'gmrc';
$base          = '/' . implode('/', array_slice($parts, 0, $rootIdx + 1));

session_name('KPLUZ_SESSION');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$mfile = $_GET['mfile'] ?? ($_SESSION['mfile'] ?? '');
if ($mfile === '') {
    die("No module specified.");
}
$_SESSION['mfile'] = $mfile;

$moduleName = preg_replace('/\.php$/i', '', basename($mfile));

$params = ['m' => $subjectFolder . '/modules/' . $moduleName];
if (isset($_GET['ansclick'])) $params['ansclick'] = $_GET['ansclick'];

$target = $base . '/q-display-legacy.php?' . http_build_query($params);
header("Location: $target", true, 302);
exit;