<?php
// english/modules/intro-self.php
// Introducing Oneself — static question bank + 4 MC choices (vertical).
// Converted from legacy intro-self.php to the container.php / scorer.php pattern.

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
$moduleTitle = 'Introducing Oneself';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$questionsByLevel = [
    'Easy' => [
        ['q' => 'What is your name?',           'correct' => 'My name is ____.',           'wrong' => ['I live at ____.', 'I am ____ years old.', 'I am studying at ____.']],
        ['q' => 'How old are you?',             'correct' => 'I am ____ years old.',        'wrong' => ['I live at ____.', 'My name is ____.', 'I am studying at ____.']],
        ['q' => 'Which school do you go to?',   'correct' => 'I go to ____.',               'wrong' => ['I live at ____.', 'My name is ____.', 'I am ____ years old.']],
        ['q' => 'Where do you live?',           'correct' => 'I live at ____.',             'wrong' => ['I am studying at ____.', 'My name is ____.', 'I am ____ years old.']],
        ['q' => 'In what grade are you?',       'correct' => 'I am in grade ____.',         'wrong' => ['I live at ____.', 'My name is ____.', 'I am ____ years old.']],
        ['q' => 'In what city were you born?',  'correct' => 'I was born in ____ City.',    'wrong' => ['I was born in the Philippines.', 'I was born in the year ____.', 'I live at ____.']],
        ['q' => 'In what year were you born?',  'correct' => 'I was born in the year ____.', 'wrong' => ['I was born in the month of ____.', 'I am ____ years old.', 'I live at ____.']],
        ['q' => 'When were you born?',          'correct' => 'I was born on ____.',         'wrong' => ['I was born in the city of ____.', 'I am ____ years old.', 'I live at ____.']],
        ['q' => 'When is your birthday?',       'correct' => 'My birthday is on ____.',     'wrong' => ['I was born in the city of ____.', 'I am ____ years old.', 'I live at ____.']],
        ['q' => 'Who is your teacher?',         'correct' => 'My teacher is ____.',         'wrong' => ['My classmate is ____.', 'My father is ____.', 'My mother is ____.']],
        ['q' => 'Who is your father?',          'correct' => 'My father is ____.',          'wrong' => ['My mother is ____.', 'My brother is ____.', 'My sister is ____.']],
        ['q' => 'Who is your mother?',          'correct' => 'My mother is ____.',          'wrong' => ['My father is ____.', 'My brother is ____.', 'My sister is ____.']],
        ['q' => 'Who is your brother?',         'correct' => 'My brother is ____.',         'wrong' => ['My father is ____.', 'My mother is ____.', 'My sister is ____.']],
        ['q' => 'Who is your sister?',          'correct' => 'My sister is ____.',          'wrong' => ['My father is ____.', 'My mother is ____.', 'My brother is ____.']],
        ['q' => 'Who is your best friend?',     'correct' => 'My best friend is ____.',     'wrong' => ['My father is ____.', 'My mother is ____.', 'My brother is ____.']],
    ],
    'Hard' => [
        ['q' => 'Who is your favorite cousin?',      'correct' => 'My favorite cousin is ____.',      'wrong' => ['My favorite classmate is ____.', 'My favorite teacher is ____.', 'My best friend is ____.']],
        ['q' => 'How many brothers do you have?',    'correct' => 'I have ____ brothers.',            'wrong' => ['I have ____ sisters.', 'I have ____ cousins.', 'I have ____ classmates.']],
        ['q' => 'How many sisters do you have?',     'correct' => 'I have ____ sisters.',             'wrong' => ['I have ____ brothers.', 'I have ____ cousins.', 'I have ____ classmates.']],
        ['q' => 'How many siblings do you have?',    'correct' => 'I have ____ siblings.',            'wrong' => ['I have ____ teachers.', 'I have ____ cousins.', 'I have ____ classmates.']],
        ['q' => 'What is your favorite food?',       'correct' => 'My favorite food is ____.',        'wrong' => ['My favorite book is ____.', 'My favorite song is ____.', 'My favorite movie is ____.']],
        ['q' => 'What is your favorite movie?',      'correct' => 'My favorite movie is ____.',       'wrong' => ['My favorite book is ____.', 'My favorite song is ____.', 'My favorite food is ____.']],
        ['q' => 'What is your favorite song?',       'correct' => 'My favorite song is ____.',        'wrong' => ['My favorite book is ____.', 'My favorite movie is ____.', 'My favorite food is ____.']],
        ['q' => 'What is your favorite color?',      'correct' => 'My favorite color is ____.',       'wrong' => ['My favorite book is ____.', 'My favorite movie is ____.', 'My favorite food is ____.']],
        ['q' => 'What is your favorite toy?',        'correct' => 'My favorite toy is ____.',         'wrong' => ['My favorite book is ____.', 'My favorite movie is ____.', 'My favorite food is ____.']],
        ['q' => 'What is your favorite subject?',    'correct' => 'My favorite subject is ____.',     'wrong' => ['My favorite book is ____.', 'My favorite movie is ____.', 'My favorite teacher is ____.']],
        ['q' => 'What is your hobby?',               'correct' => 'My hobby is ____.',                'wrong' => ['My pets are ____.', 'My favorite movie is ____.', 'My favorite book is ____.']],
        ['q' => 'What is the name of your pet?',     'correct' => 'The name of my pet is ____.',      'wrong' => ['My favorite pet is a ____.', 'My pet is ____ years old.', 'I have ____ pets.']],
        ['q' => 'What is your favorite pet?',        'correct' => 'My favorite pet is a ____.',       'wrong' => ['The name of my pet is ____.', 'My pet is ____ years old.', 'I have ____ pets.']],
        ['q' => 'How many pets do you have?',        'correct' => 'I have ____ pets.',                'wrong' => ['The name of my pet is ____.', 'My pet is ____ years old.', 'My favorite pet is a ____.']],
        ['q' => 'What is your nationality?',         'correct' => 'I am a Filipino.',                 'wrong' => ['I am ____ years old.', 'My name is ____.', 'I live at ____.']],
    ],
];

function pick_intro_item($pool, $sessionKey) {
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
    $item = pick_intro_item($pool, $sessionKey);
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
  <p style="font-size:16pt;color:#800080;"><br/><?php echo htmlspecialchars($cur['question']); ?></p>
  <p style="font-size:16pt;color:#800080;"><br/>Correct sentence to use to answer it:<br/><strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong></p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
  <div style="margin:45px auto 25px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#800080;">
    <?php echo htmlspecialchars($q['question']); ?>
  </div>
  <div style="font-size:13pt;color:#555;margin-bottom:18px;">Click on the sentence you'll use to answer the question.</div>
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