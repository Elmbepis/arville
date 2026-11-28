<?php
// mapeh/modules/sound-sources.php
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
$moduleTitle = 'Sounds and their Sources';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
function src_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$questions = [
    ['Which animal makes this sound?', 'cow', 'qsounds/cow.mp3', ['cow', 'goat', 'horse', 'dog']],
    ['Which animal makes this sound?', 'rooster', 'qsounds/rooster.mp3', ['rooster', 'duck', 'turkey', 'goose']],
    ['Which animal makes this sound?', 'pig', 'qsounds/pig.mp3', ['pig', 'goat', 'goose', 'cat']],
    ['Which animal makes this sound?', 'bird', 'qsounds/bird.mp3', ['bird', 'bat', 'rooster', 'mouse']],
    ['Which animal makes this sound?', 'horse', 'qsounds/horse.mp3', ['horse', 'goat', 'cow', 'pig']],
    ['Which animal makes this sound?', 'chicken', 'qsounds/chicken.mp3', ['chicken', 'goat', 'duck', 'goose']],
    ['Which animal makes this sound?', 'duck', 'qsounds/duck.mp3', ['duck', 'goat', 'chicken', 'horse']],
    ['Which animal makes this sound?', 'monkey', 'qsounds/monkey.mp3', ['monkey', 'zebra', 'elephant', 'giraffe']],
    ['Which animal makes this sound?', 'elephant', 'qsounds/elephant.mp3', ['elephant', 'zebra', 'monkey', 'giraffe']],
    ['Which animal makes this sound?', 'frog', 'qsounds/frog.mp3', ['frog', 'chicken', 'mouse', 'horse']],
    ['Which animal makes this sound?', 'bee', 'qsounds/bee.mp3', ['bee', 'bat', 'bird', 'butterfly']],
    ['Which animal makes this sound?', 'cat', 'qsounds/cat.mp3', ['cat', 'dog', 'bird', 'chicken']],
    ['Which of the following makes this sound?', 'rain', 'qsounds/rain.mp3', ['rain', 'wind', 'leaves', 'people']],
    ['Which of the following makes this sound?', 'siren', 'qsounds/siren.mp3', ['siren', 'thunder', 'airplane', 'violin']],
    ['Which of the following makes this sound?', 'airplane', 'qsounds/airplane.mp3', ['airplane', 'thunder', 'bus', 'trumpet']],
    ['Which of the following makes this sound?', 'crying baby', 'qsounds/crying baby.mp3', ['crying baby', 'laughing baby', 'purring kitten', 'barking puppy']],
    ['This sound is made by ____.', 'barking dogs', 'qsounds/barking dogs.mp3', ['barking dogs', 'crowing roosters', 'meowing cats', 'laughing boy']],
    ['This sound is made by ____.', 'sea waves', 'qsounds/sea waves.mp3', ['sea waves', 'rain', 'thunder', 'fire']],
    ['Which of the following makes this sound?', 'clapping', 'qsounds/clapping.mp3', ['clapping', 'running', 'talking', 'jumping']],
    ['Which of the following makes this sound?', 'wind', 'qsounds/wind.mp3', ['wind', 'rain', 'thunder', 'sea waves']],
    ['Which of the following makes this sound?', 'clock', 'qsounds/clock.mp3', ['clock', 'car', 'rain', 'clap']],
    ['Which of the following makes this sound?', 'telephone', 'qsounds/telephone.mp3', ['telephone', 'faucet', 'car horn', 'airplane']],
    ['Which of the following makes this sound?', 'doorbell', 'qsounds/doorbell.mp3', ['doorbell', 'whistle', 'car horn', 'piano']],
    ['Which of the following makes this sound?', 'train', 'qsounds/train.mp3', ['train', 'airplane', 'car', 'bus']],
    ['Which of the following makes this sound?', 'running', 'qsounds/running.mp3', ['running', 'clapping', 'sliding', 'rolling']],
    ['Which of the following makes this sound?', 'coughing', 'qsounds/coughing.mp3', ['coughing', 'laughing', 'clapping', 'jumping']],
    ['Which of the following makes this sound?', 'car', 'qsounds/car.mp3', ['car', 'airplane', 'train', 'bicycle']],
    ['Which of the following makes this sound?', 'guitar', 'qsounds/guitar.mp3', ['guitar', 'piano', 'trumpet', 'whistle']],
    ['Which of the following makes this sound?', 'piano', 'qsounds/piano.mp3', ['piano', 'guitar', 'trumpet', 'whistle']],
    ['Which of the following makes this sound?', 'whistle', 'qsounds/whistle.mp3', ['whistle', 'guitar', 'trumpet', 'piano']],
];
$tier = 'all';
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current'])
    && !isset($_POST['Submit2']) && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && in_array($_GET['ansclick'], ($_SESSION[$sessionKey]['current']['choices'] ?? []), true)) {
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
    [$question, $correct, $audio, $choices] = $questions[$i];
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = ['question'=>$question, 'correct'=>$correct, 'audio'=>$audio, 'choices'=>$choices, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$cur = $result !== null ? $result['cur'] : $_SESSION[$sessionKey]['current'];
$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo src_h($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): ?>
<p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:450px;">Your answer is <strong style="color:#0000CC;">'<?php echo src_h($result['clicked']); ?>'</strong>.</p>
<p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
<?php echo $result['correct'] ? '&#9989; That is correct!' : '&#10060; That is incorrect.'; ?></p>
<?php endif; ?>
<div style="margin:30px auto 20px;max-width:450px;">
<audio controls preload="auto" style="width:100%;max-width:320px;">
<source src="<?php echo src_h(str_replace(' ', '%20', $cur['audio'])); ?>" type="audio/mpeg">
Your browser does not support audio playback.
</audio>
</div>
<?php if ($result === null): ?>
<p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Play the audio, then click on your answer below.</p>
<?php endif; ?>
<div style="text-align:center;margin:20px auto;">
<span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
<?php echo src_h($cur['question']); ?>
</span></div>
<?php if ($result !== null): ?>
<div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;"><strong>Answer: <span style="color:#CC0066;"><?php echo src_h($cur['correct']); ?></span></strong></div>
<?php else: ?>
<div style="display:grid;grid-template-columns:repeat(<?php echo max(array_map('strlen', $cur['choices'])) <= 10 ? 2 : 1; ?>,minmax(0,1fr));gap:16px;width:max-content;max-width:100%;margin:40px auto 0;">
<?php foreach ($cur['choices'] as $choice): ?>
<a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo src_h($cur['qid']); ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;"><?php echo src_h($choice); ?></a>
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
