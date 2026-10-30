<?php
// english/modules/greetings-polite-exps.php
// Greetings and Polite Expressions — static question bank + 4 MC choices (vertical).
// Modernised to the container.php / scorer.php pattern used by plural.php.

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleTitle = 'Greetings and Polite Expressions';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$questionsByLevel = [
    'Easy' => [
        ['q' => 'if you<br/>meet someone in the morning',   'correct' => 'Good morning.',   'wrong' => ['Good afternoon.', 'Good evening.', 'Excuse me.']],
        ['q' => 'if you<br/>meet someone in the afternoon', 'correct' => 'Good afternoon.', 'wrong' => ['Good morning.', 'Good evening.', 'I am sorry.']],
        ['q' => 'if you<br/>meet someone in the evening',   'correct' => 'Good evening.',   'wrong' => ['Good morning.', 'Good night.', 'Thank you!']],
        ['q' => 'if you<br/>meet a friend at any time of the day', 'correct' => 'Hello!', 'wrong' => ['I am sorry.', 'Good night.', 'Thank you!']],
        ['q' => 'if you<br/>meet someone at a party',       'correct' => 'Hello!',          'wrong' => ['I am sorry.', 'Goodbye.', 'Thank you!']],
        ['q' => 'when you<br/>are about to go to bed at night', 'correct' => 'Good night.', 'wrong' => ['Good morning.', 'I am sorry.', 'Thank you!']],
        ['q' => 'when you<br/>want to leave',               'correct' => 'Goodbye.',        'wrong' => ['How are you?', 'Hello!', 'Thank you!']],
        ['q' => '<br/>if someone gives you a gift',          'correct' => 'Thank you!',      'wrong' => ['Good morning.', 'Good evening.', 'I am sorry.']],
        ['q' => '<br/>if someone thanks you',                'correct' => 'You are welcome!','wrong' => ['Excuse me.', 'Good evening.', 'I am sorry.']],
        ['q' => 'if your seatmate<br/>gives you a piece of candy', 'correct' => 'Thank you!', 'wrong' => ['Good morning.', 'Good evening.', 'I am sorry.']],
        ['q' => "if you<br/>broke your friend's toy",       'correct' => 'I am sorry.',     'wrong' => ['Good morning.', 'Thank you.', 'Good night.']],
        ['q' => "if you<br/>broke your mother's vase",      'correct' => 'I am sorry.',     'wrong' => ['Good morning.', 'Thank you.', 'Good night.']],
    ],
    'Hard' => [
        ['q' => "if you<br/>want to borrow someone's pencil", 'correct' => 'May I borrow your pencil?', 'wrong' => ['Can you borrow my pencil?', 'May you borrow me your pencil?', 'May I lend you my pencil?']],
        ['q' => "if you<br/>want to borrow someone's book",   'correct' => 'May I borrow your book?',   'wrong' => ['Can you borrow my book?', 'May you borrow me your book?', 'May I lend you my book?']],
        ['q' => "if you<br/>want to enter someone's property",'correct' => 'May I please enter?',       'wrong' => ['I will enter now.', 'I want to enter.', 'Let me enter now.']],
        ['q' => "if you<br/>want to use somebody's phone",    'correct' => 'May I please use your phone?', 'wrong' => ['Give me your phone.', 'I want to use your phone.', 'Lend me that phone.']],
        ['q' => 'if you<br/>want to ask for more water',      'correct' => 'May I please have more water?', 'wrong' => ['Give me more water.', 'I am thirsty.', 'I want more water.']],
        ['q' => 'if you<br/>want to ask for some sauce',      'correct' => 'May I please have some sauce?', 'wrong' => ['Give me some sauce.', 'Bring me some sauce.', 'I want some sauce.']],
        ['q' => 'if you<br/>see somebody looking for someone or something', 'correct' => 'May I help you?', 'wrong' => ['Go away!', 'Goodbye.', 'Thank you!']],
        ['q' => 'if you<br/>see somebody trip and fall down', 'correct' => 'Are you alright?',  'wrong' => ['Get up!', 'Goodbye.', 'Thank you!']],
        ['q' => 'if you<br/>want to pass someone',            'correct' => 'Excuse me.',        'wrong' => ['You are welcome.', 'Thank you.', 'Good night.']],
        ['q' => "if you<br/>want to get someone's attention", 'correct' => 'Excuse me.',        'wrong' => ['Goodbye!', 'Thank you.', 'You are welcome.']],
        ['q' => 'if you<br/>need to go out of the classroom', 'correct' => 'May I go out?',     'wrong' => ['Goodbye!', 'I will go out.', 'I need to go out.']],
        ['q' => 'if you<br/>need to go to the clinic',        'correct' => 'May I go to the clinic?', 'wrong' => ['Goodbye!', 'I will go to the clinic.', 'Take me to the clinic.']],
        ['q' => 'if you<br/>need some help',                  'correct' => 'Could you help me, please?', 'wrong' => ['I am sorry.', 'Thank you!', 'Hello.']],
        ['q' => 'if you<br/>want to play outside',            'correct' => 'Mommy, may I play outside?', 'wrong' => ['Goodbye!', 'I need to play outside.', 'I will be outside.']],
        ['q' => 'if you<br/>want someone to return your book','correct' => 'May I have my book back, please?', 'wrong' => ['Give my book back.', 'Return my book.', 'I want my book now.']],
        ['q' => 'if you<br/>want to ask for some peanuts',    'correct' => 'May I have some peanuts, please?', 'wrong' => ['Give me peanuts.', 'Put peanuts in my hand.', 'I want peanuts.']],
        ['q' => 'if you<br/>meet someone for the first time', 'correct' => 'It is nice to meet you!', 'wrong' => ['Goodbye.', 'Thank you!', 'Excuse me.']],
        ['q' => 'if you<br/>meet someone on his birthday',    'correct' => 'Happy birthday!',   'wrong' => ['Happy New Year!', 'Thank you!', 'Where is your party?']],
    ],
];

function pick_greeting_item($pool, $sessionKey) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) if (!in_array($i, $used, true)) $available[$i] = $item;
    if (!$available) { $used = []; $available = $pool; }
    if (!$available) return null;
    $keys = array_keys($available);
    $index = $keys[array_rand($keys)];
    $used[] = $index;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;
    return $available[$index];
}

$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result = ['correct'=>$isCorrect, 'clicked'=>$clicked, 'cur'=>$cur];
    unset($_SESSION[$sessionKey]['current']);
}
if ($result === null || isset($_POST['Submit2'])) {
    $pool = $questionsByLevel[$lvl] ?? $questionsByLevel['Easy'];
    $item = pick_greeting_item($pool, $sessionKey);
    if ($item === null) $item = $pool[0];
    $choices = array_merge($item['wrong'], [$item['correct']]);
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'question' => $item['q'],
        'answer'   => $item['correct'],
        'choices'  => $choices,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

$theme = [
    'top_banner'=>$base.'/math/images/images/paper-69-top.jpg',
    'title_bg'=>$base.'/math/images/images/paper-69-top2.jpg',
    'left_side'=>$base.'/math/images/images/paper-69-left.jpg',
    'right_side'=>$base.'/math/images/images/paper-69-right.jpg',
    'content_bg'=>$base.'/math/images/images/paper-69-content.jpg',
    'bottom_banner'=>$base.'/math/images/images/paper-69-bottom.jpg',
    'score_top'=>$base.'/math/images/score-top-1.jpg',
    'score_bottom'=>$base.'/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle.' - '.$lvl, $moduleTitle.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-size:14pt;color:#666;margin-top:20px;">Your answer: <strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong></p>
  <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-size:16pt;color:#800080;"><br/>What would you say <?php echo htmlspecialchars($cur['question']); ?>?</p>
  <p style="font-size:16pt;color:#800080;">Correct answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong></p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
  <div style="margin:45px auto 25px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#800080;">
    What would you say <?php echo htmlspecialchars($q['question']); ?>?
  </div>
  <div style="font-size:13pt;color:#555;margin-bottom:18px;">Click on your answer.</div>
  <table border="0" cellspacing="10" cellpadding="0" style="margin:0 auto;">
  <?php foreach ($q['choices'] as $choice): ?>
    <tr><td align="center">
      <a href="?ansclick=<?php echo urlencode($choice); ?>"
         style="display:block;min-width:340px;padding:10px 18px;
                border:2px solid #888888;border-radius:8px;background:#fff;
                text-decoration:none;color:#0000CC;font-size:16pt;font-weight:600;">
        <?php echo htmlspecialchars($choice); ?>
      </a>
    </td></tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Verdana,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Verdana,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>