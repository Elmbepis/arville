<?php
// q-display.php — shim that redirects old menu links to the new engine
// Works from either <subject>/q-display.php or <subject>/modules/q-display.php

$scriptName = $_SERVER['SCRIPT_NAME'];
$parts = explode('/', trim($scriptName, '/'));
$rootIdx = array_search('kpluz0', $parts);

if ($rootIdx === false) {
    die("Cannot locate app root in path: $scriptName");
}

$subject = $parts[$rootIdx + 1] ?? 'gmrc';
$base    = '/' . implode('/', array_slice($parts, 0, $rootIdx + 1));

session_name('KPLUZ_SESSION');
session_start();

$mfile = $_GET['mfile'] ?? ($_SESSION['mfile'] ?? '');
if ($mfile === '') {
    die("No module specified.");
}
$_SESSION['mfile'] = $mfile;

// Strip path and .php from the module reference
$moduleName = preg_replace('/\.php$/i', '', basename($mfile));

$params = ['m' => $subject . '/modules/' . $moduleName];
if (isset($_GET['ansclick'])) $params['ansclick'] = $_GET['ansclick'];
if (isset($_GET['debug']))    $params['debug']    = $_GET['debug'];

$target = $base . '/q-display-legacy.php?' . http_build_query($params);
header("Location: $target", true, 302);
exit;