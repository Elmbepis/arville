<?php
// english/modules/a-an.php
// Using 'a' or 'an' in Sentences — static question bank + 2 MC choices (horizontal).
// Converted from legacy a-an.php to the container.php / scorer.php pattern.

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
$moduleTitle = "Using 'a' or 'an' in Sentences";
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$questionsByLevel = [
    'Easy' => [
        ['q' => "It's ____ sunny day.",                    'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Japan is ____ country.",                  'correct' => 'a',  'wrong' => ['an']],
        ['q' => "We live in ____ gray house.",             'correct' => 'a',  'wrong' => ['an']],
        ['q' => "I bought ____ jar of cookies.",           'correct' => 'a',  'wrong' => ['an']],
        ['q' => "They went to see ____ doctor.",           'correct' => 'a',  'wrong' => ['an']],
        ['q' => "That is ____ big mall.",                  'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Use ____ spoon for the soup.",            'correct' => 'a',  'wrong' => ['an']],
        ['q' => "She ate ____ tuna sandwich.",             'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Cathy has ____ new puppy.",               'correct' => 'a',  'wrong' => ['an']],
        ['q' => "My father is ____ fireman.",              'correct' => 'a',  'wrong' => ['an']],
        ['q' => "They have ____ tree house in their yard.",'correct' => 'a',  'wrong' => ['an']],
        ['q' => "My mother bought ____ thick book.",       'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Today is ____ rainy day.",                'correct' => 'a',  'wrong' => ['an']],
        ['q' => "I brought you ____ glass of juice.",      'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Let's watch ____ movie tonight.",         'correct' => 'a',  'wrong' => ['an']],
        ['q' => "We rode ____ raft to get there.",         'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Rico brought ____ bottle of water.",      'correct' => 'a',  'wrong' => ['an']],
        ['q' => "There's ____ eagle over there.",          'correct' => 'an', 'wrong' => ['a']],
        ['q' => "I use ____ umbrella when it rains.",      'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Henry wore ____ ugly shirt yesterday.",   'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Jerry bought ____ apple from her.",       'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Carol borrowed ____ icebox.",             'correct' => 'an', 'wrong' => ['a']],
        ['q' => "My friends sat on ____ orange bench.",    'correct' => 'an', 'wrong' => ['a']],
        ['q' => "We have ____ English test tomorrow.",     'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Tony's mom is such ____ awesome singer.", 'correct' => 'an', 'wrong' => ['a']],
        ['q' => "I saw ____ octopus at the beach.",        'correct' => 'an', 'wrong' => ['a']],
        ['q' => "There is ____ owl staring at us.",        'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Did you see ____ elephant at the circus?",'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Is that ____ edible fruit?",              'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Do you know that ____ ape is a mammal?",  'correct' => 'an', 'wrong' => ['a']],
        ['q' => "I found ____ Easter egg!",                'correct' => 'an', 'wrong' => ['a']],
        ['q' => "She cooked ____ ostrich egg.",            'correct' => 'an', 'wrong' => ['a']],
    ],
    'Hard' => [
        ['q' => "I am having ____ good day.",                                    'correct' => 'a',  'wrong' => ['an']],
        ['q' => "China is ____ large country.",                                  'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Our family stayed in ____ blue house during our trip.",         'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Kyle placed ____ flower vase on top of the counter.",           'correct' => 'a',  'wrong' => ['an']],
        ['q' => "They talked to ____ teacher about their schoolwork.",           'correct' => 'a',  'wrong' => ['an']],
        ['q' => "The mall is ____ mile away from our house.",                    'correct' => 'a',  'wrong' => ['an']],
        ['q' => "I eat pizza with ____ fork.",                                   'correct' => 'a',  'wrong' => ['an']],
        ['q' => "She wanted to eat ____ cob of corn.",                           'correct' => 'a',  'wrong' => ['an']],
        ['q' => "My friend Anne has ____ cute pet dog.",                         'correct' => 'a',  'wrong' => ['an']],
        ['q' => "My father is ____ good carpenter.",                             'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Dad is building ____ tree house for me in the yard.",           'correct' => 'a',  'wrong' => ['an']],
        ['q' => "My mother bought ____ red wagon for me.",                       'correct' => 'a',  'wrong' => ['an']],
        ['q' => "It was ____ cold, rainy day.",                                  'correct' => 'a',  'wrong' => ['an']],
        ['q' => "There is ____ glass of milk on the table for you.",             'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Please read me ____ scary story tonight.",                      'correct' => 'a',  'wrong' => ['an']],
        ['q' => "We rode ____ boat to get to the other side.",                   'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Miguel went to get ____ bottle of gravy.",                      'correct' => 'a',  'wrong' => ['an']],
        ['q' => "Yesterday, we saw ____ eagle flying over there.",               'correct' => 'an', 'wrong' => ['a']],
        ['q' => "I use ____ umbrella when it rains.",                            'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Jacob wore ____ ugly shirt at the party yesterday.",            'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Gem bought ____ apple on her way home.",                        'correct' => 'an', 'wrong' => ['a']],
        ['q' => "The house was built with the help of ____ architect.",          'correct' => 'an', 'wrong' => ['a']],
        ['q' => "James has ____ idea for our project.",                          'correct' => 'an', 'wrong' => ['a']],
        ['q' => "My friends flew ____ orange kite at the playground today.",     'correct' => 'an', 'wrong' => ['a']],
        ['q' => "I will draw a picture of ____ alligator.",                      'correct' => 'an', 'wrong' => ['a']],
        ['q' => "I am studying for ____ English test.",                          'correct' => 'an', 'wrong' => ['a']],
        ['q' => "That is such ____ adorable kitten!",                            'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Katie's mom is such ____ awesome cook.",                        'correct' => 'an', 'wrong' => ['a']],
        ['q' => "I saw ____ otter at the zoo today.",                            'correct' => 'an', 'wrong' => ['a']],
        ['q' => "There is ____ owl perched on the tallest branch of the tree.",  'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Did you see ____ elephant when you went to the circus yesterday?", 'correct' => 'an', 'wrong' => ['a']],
        ['q' => "Please don't put ____ ice cube in my drink.",                   'correct' => 'an', 'wrong' => ['a']],
    ],
];

function pick_a_an_item($pool, $sessionKey) {
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
    $item = pick_a_an_item($pool, $sessionKey);
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
<?php if ($result !== null):
    $cur = $result['cur'];
    $filled = str_replace(
        '____',
        '<strong style="color:#CC0066;">'.htmlspecialchars($cur['answer']).'</strong>',
        htmlspecialchars($cur['question'])
    );
?>
  <p style="font-size:14pt;color:#666;margin-top:20px;">You clicked on the word '<strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>'.</p>
  <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <div style="margin:30px auto;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#333333;line-height:1.7;">
    <?php echo $filled; ?>
  </div>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
  <div style="margin:45px auto 25px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#333333;line-height:1.7;">
    <?php echo htmlspecialchars($q['question']); ?>
  </div>
  <div style="font-size:13pt;color:#555;margin-bottom:18px;">Fill in the blank. Click on your answer.</div>
  <table border="0" cellspacing="20" cellpadding="0" style="margin:0 auto;">
    <tr>
    <?php foreach ($q['choices'] as $choice): ?>
      <td align="center">
        <a href="?ansclick=<?php echo urlencode($choice); ?>"
           style="display:block;min-width:120px;padding:14px 32px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-size:20pt;font-weight:700;">
          <?php echo htmlspecialchars($choice); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
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