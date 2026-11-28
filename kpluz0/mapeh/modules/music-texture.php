<?php
// mapeh/modules/music-texture.php
// Audio-based listening comprehension.

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /arville/kpluz0/login.php');
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli('localhost', 'root', 'AcadeV25!', 'kpluz0');
if ($conn->connect_error) die('Connection failed: ' . $conn->connect_error);
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleTitle = 'Music Texture';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
function mt_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$questions = [
    ['This song has more than one musical line.', 'true', 'qsounds/slowmodfast3.mp3'],
    ['This song has only one musical line.', 'true', 'qsounds/texture1.mp3'],
    ['This song has more than one musical line.', 'true', 'qsounds/texture2.mp3'],
    ['This is an example of solo singing.', 'true', 'qsounds/slofast10.mp3'],
    ['This is an example of solo singing.', 'true', 'qsounds/slofast8.mp3'],
    ['This song has only one musical line.', 'true', 'qsounds/texture3.mp3'],
    ['This song has only one musical line.', 'true', 'qsounds/texture4.mp3'],
    ['This song has only one musical line.', 'true', 'qsounds/texture6.mp3'],
    ['This song has more than one musical line.', 'true', 'qsounds/texture8.mp3'],
    ['This is NOT an example of solo singing.', 'true', 'qsounds/texture9.mp3'],
    ['This song has only one musical line.', 'false', 'qsounds/slowmodfast1.mp3'],
    ['This song has only one musical line.', 'false', 'qsounds/slofast4.mp3'],
    ['This song has only one musical line.', 'false', 'qsounds/slofast9.mp3'],
    ['This song has only one musical line.', 'false', 'qsounds/slowmodfast6.mp3'],
    ['This is an example of solo singing.', 'false', 'qsounds/bbbs.mp3'],
    ['This is an example of solo singing.', 'false', 'qsounds/texture7.mp3'],
    ['This song has more than one musical line.', 'false', 'qsounds/texture5.mp3'],
    ['This is an example of solo singing.', 'false', 'qsounds/texture10.mp3'],
    ['This song has only one musical line.', 'false', 'qsounds/texture11.mp3'],
    ['This song has only one musical line.', 'false', 'qsounds/slowmodfast12.mp3'],
];
$tier = 'all';
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current'])
    && !isset($_POST['Submit2']) && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && in_array($_GET['ansclick'], ['true', 'false'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = $_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}
if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']))) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($questions), $used));
    if (!$available) { $used = []; $available = array_keys($questions); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    [$question, $correct, $audio] = $questions[$i];
    $_SESSION[$sessionKey]['current'] = ['question'=>$question, 'correct'=>$correct, 'audio'=>$audio, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$cur = $result !== null ? $result['cur'] : $_SESSION[$sessionKey]['current'];
$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo mt_h($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): ?>
<p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:450px;">Your answer is <strong style="color:#0000CC;">'<?php echo mt_h(ucfirst($result['clicked'])); ?>'</strong>.</p>
<p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
<?php echo $result['correct'] ? '&#9989; That is correct!' : '&#10060; That is incorrect.'; ?></p>
<?php endif; ?>
<div style="margin:30px auto 20px;max-width:450px;">
<audio controls preload="auto" style="width:100%;max-width:320px;">
<source src="<?php echo mt_h($cur['audio']); ?>" type="audio/mpeg">
Your browser does not support audio playback.
</audio>
</div>
<?php if ($result === null): ?>
<p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Play the audio, then say whether the sentence below is true or false.</p>
<?php endif; ?>
<div style="text-align:center;margin:20px auto;">
<span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
<?php echo mt_h($cur['question']); ?>
</span></div>
<?php if ($result !== null): ?>
<div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;"><strong>Answer: <span style="color:#CC0066;"><?php echo mt_h(ucfirst($cur['correct'])); ?></span></strong></div>
<?php else: ?>
<div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px;width:max-content;max-width:100%;margin:40px auto 0;">
<?php foreach (['true','false'] as $choice): ?>
<a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo mt_h($cur['qid']); ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;"><?php echo ucfirst($choice); ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>
<input type="submit" name="Submit2" value=" New Question " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
