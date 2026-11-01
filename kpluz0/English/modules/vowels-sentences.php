<?php
// english/modules/vowels-sentences.php
// Short and Long Vowels in Sentences — read the sentence, identify the vowel
// class (short/long a, e, i, o, u, or pairs) of the highlighted vowel.
// Pool is grade-gated per handover §4.4 (breadth grows with grade).
// 4 choices always (correct class + 3 distractors) in a 2×2 grid.
//
// Question view: target vowel rendered as plain text (student must find it
//   from the prompt — matching legacy behaviour of hiding the underline).
// Feedback view: target vowel highlighted in pink (#CC0066) so the student
//   can see exactly which letter(s) were being asked about.

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
$moduleTitle = 'Short and Long Vowels in Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Pool selection (§4.4 — grade gates breadth, not depth) ----
function resolve_vowels_pool(string $lvl, int $grd): array {
    if ($lvl === 'Easy') {
        if ($grd <= 2) return range(0, 14);  // 15 simplest single-vowel
        return range(0, 24);                  // all 25 single-vowel
    }
    if ($grd <= 2) return range(0, 19);       // first 20
    return range(0, 29);                       // all 30 incl. multi-vowel
}

// ---- Data (§5) — pre-parsed per handover §5.1 ----
// Marker {v}...{/v} wraps the target vowel in the sentence.
$items = [
    // 0
    ['sentence' => 'The big, r{v}e{/v}d apple on the white table was eaten by Jean.',
     'prompt'   => 'What is the vowel of the word for the color of the fruit in the sentence?',
     'correct'  => 'short e',
     'wrong'    => ['long e', 'short i', 'long i']],
    // 1
    ['sentence' => 'Peter slept under the tr{v}ee{/v} because he was so tired.',
     'prompt'   => 'What is the vowel of the word for the thing under which Peter slept?',
     'correct'  => 'long e',
     'wrong'    => ['short e', 'short a', 'long i']],
    // 2
    ['sentence' => 'Laura bought a c{v}a{/v}ke for her mother\'s birthday.',
     'prompt'   => 'Which of these is a vowel in the word for Laura\'s gift for her mother?',
     'correct'  => 'long a',
     'wrong'    => ['short a', 'short o', 'short i']],
    // 3
    ['sentence' => 'The c{v}u{/v}p broke into pieces when it fell to the floor.',
     'prompt'   => 'What is the vowel of the word for the object that fell to the floor?',
     'correct'  => 'short u',
     'wrong'    => ['long u', 'short i', 'long i']],
    // 4
    ['sentence' => 'The c{v}u{/v}te puppy didn\'t want to come out of its black cage.',
     'prompt'   => 'Which of these is a vowel in the word that describes what the puppy looks like?',
     'correct'  => 'long u',
     'wrong'    => ['short u', 'short a', 'long a']],
    // 5
    ['sentence' => 'J{v}e{/v}an baked a cake to give to John.',
     'prompt'   => 'Which of these is a vowel in the name of the person who baked a cake?',
     'correct'  => 'long e',
     'wrong'    => ['short e', 'long o', 'short o']],
    // 6
    ['sentence' => 'The huge, bl{v}a{/v}ck dog chased the little kitten up the tree.',
     'prompt'   => 'What is the vowel of the word that describes the larger animal?',
     'correct'  => 'short a',
     'wrong'    => ['long a', 'short i', 'short e']],
    // 7
    ['sentence' => 'The fat p{v}i{/v}g buried itself under the mud.',
     'prompt'   => 'What is the vowel in the word for the living thing in the sentence?',
     'correct'  => 'short i',
     'wrong'    => ['long i', 'short a', 'short u']],
    // 8
    ['sentence' => 'Ricky rode his b{v}i{/v}ke to catch up with his friends.',
     'prompt'   => 'What is the vowel of the word for what Ricky used to travel fast?',
     'correct'  => 'long i',
     'wrong'    => ['short i', 'short e', 'long e']],
    // 9
    ['sentence' => 'Please use a m{v}o{/v}p to wipe the floor dry.',
     'prompt'   => 'What is the vowel of the word for what\'s used to dry the floor?',
     'correct'  => 'short o',
     'wrong'    => ['long o', 'short i', 'long i']],
    // 10
    ['sentence' => 'Please l{v}i{/v}ght a candle so we can see what\'s in here.',
     'prompt'   => 'What is the vowel of the word for the action needed to make the place brighter?',
     'correct'  => 'long i',
     'wrong'    => ['short i', 'short a', 'long e']],
    // 11
    ['sentence' => 'J{v}a{/v}mes told Dean to stay away from him.',
     'prompt'   => 'Which of these is a vowel in the name of the person who wanted to be alone?',
     'correct'  => 'long a',
     'wrong'    => ['short a', 'long e', 'short e']],
    // 12
    ['sentence' => 'The driver couldn\'t see the road because of the f{v}o{/v}g.',
     'prompt'   => 'What is the vowel of the word for the thing that makes it hard to see?',
     'correct'  => 'short o',
     'wrong'    => ['long o', 'short i', 'long i']],
    // 13
    ['sentence' => 'Hilda doesn\'t want to go camping because she hates b{v}u{/v}gs.',
     'prompt'   => 'What is the vowel of the word for the things that Hilda hates?',
     'correct'  => 'short u',
     'wrong'    => ['long u', 'short a', 'long a']],
    // 14
    ['sentence' => 'You should cl{v}e{/v}an your wound before it gets infected.',
     'prompt'   => 'Which of these is a vowel in the word for what must be done to treat a wound?',
     'correct'  => 'long e',
     'wrong'    => ['short e', 'long o', 'short o']],
    // 15
    ['sentence' => 'Have you seen the long sn{v}a{/v}ke at the city zoo?',
     'prompt'   => 'Which of these is a vowel in the word for the creature at the zoo?',
     'correct'  => 'long a',
     'wrong'    => ['short a', 'long e', 'short e']],
    // 16
    ['sentence' => 'Let us p{v}a{/v}int the fence to make it look better.',
     'prompt'   => 'Which of these is a vowel in the word for what will be done to the fence?',
     'correct'  => 'long a',
     'wrong'    => ['short a', 'long i', 'short i']],
    // 17
    ['sentence' => 'The farmer sold his g{v}o{/v}ats to earn some money.',
     'prompt'   => 'Which of these is a vowel in the word for what the farmer sold?',
     'correct'  => 'long o',
     'wrong'    => ['short o', 'long a', 'short a']],
    // 18
    ['sentence' => 'Dennis really wanted to learn how to scuba d{v}i{/v}ve.',
     'prompt'   => 'Which of these is a vowel in the word for what Dennis wanted to learn to do?',
     'correct'  => 'long i',
     'wrong'    => ['short i', 'long e', 'short e']],
    // 19
    ['sentence' => 'The man decided to h{v}i{/v}de his bag behind the door.',
     'prompt'   => 'Which of these is a vowel in the word for what the man decided to do?',
     'correct'  => 'long i',
     'wrong'    => ['short i', 'long e', 'short e']],
    // 20
    ['sentence' => 'The black m{v}u{/v}le patiently pulled the loaded cart.',
     'prompt'   => 'Which of these is a vowel in the word for the working animal?',
     'correct'  => 'long u',
     'wrong'    => ['short u', 'long e', 'short e']],
    // 21
    ['sentence' => 'Our teacher sent Jerome home because he has l{v}i{/v}ce on his head.',
     'prompt'   => 'Which of these is a vowel in the word for why Jerome was sent home?',
     'correct'  => 'long i',
     'wrong'    => ['short i', 'long e', 'short e']],
    // 22
    ['sentence' => 'Our c{v}o{/v}ach got mad when we did not play as a team.',
     'prompt'   => 'Which of these is a vowel in the word for the person who guides our team?',
     'correct'  => 'long o',
     'wrong'    => ['short o', 'long a', 'short a']],
    // 23
    ['sentence' => 'Edwin brought a b{v}a{/v}g, a f{v}a{/v}n, a cup, and a h{v}a{/v}t to our outing.',
     'prompt'   => 'Which vowel is found in MOST of the words for what Edwin brought to the outing?',
     'correct'  => 'short a',
     'wrong'    => ['long a', 'long u', 'short u']],
    // 24
    ['sentence' => 'Harry only used a small n{v}e{/v}t to catch that giant catfish.',
     'prompt'   => 'What is the vowel of the word for what Harry used to catch a catfish?',
     'correct'  => 'short e',
     'wrong'    => ['long e', 'short a', 'short i']],
    // 25 — multi-vowel starts here
    ['sentence' => '{v}A{/v}im{v}ee{/v} donated some of her money to their church.',
     'prompt'   => 'Which of these are the vowels in the name of the person who did something good?',
     'correct'  => 'long a and long e',
     'wrong'    => ['long a and long i', 'short a and short e', 'long a and short e']],
    // 26
    ['sentence' => 'Gerry bought a fl{v}u{/v}te and a c{v}o{/v}at at the mall.',
     'prompt'   => 'Which of these are the vowels in the words for what Gerry bought?',
     'correct'  => 'long u and long o',
     'wrong'    => ['long u and short o', 'short u and short o', 'short u and long o']],
    // 27
    ['sentence' => 'Paula put a nice red r{v}i{/v}bb{v}o{/v}n on her gift for Paula.',
     'prompt'   => 'Which of these are the vowels in the word for what Paula put on the gift?',
     'correct'  => 'short i and short o',
     'wrong'    => ['long i and short o', 'short i and long o', 'long i and long o']],
    // 28
    ['sentence' => 'Nestor has a record collection because he loves m{v}u{/v}s{v}i{/v}c.',
     'prompt'   => 'Which of these are the vowels in the word for what Nestor loves?',
     'correct'  => 'long u and short i',
     'wrong'    => ['short u and long i', 'long u and long i', 'short u and short i']],
    // 29
    ['sentence' => 'My cousin washes his clothes in that b{v}a{/v}s{v}i{/v}n.',
     'prompt'   => 'Which of these are the vowels in the word for where my cousin washes his clothes?',
     'correct'  => 'long a and short i',
     'wrong'    => ['short a and long i', 'long a and long i', 'short a and short i']],
];

// ---- Helpers (§8.4, §8.6) ----
function vowels_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:520px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}
function vowels_render_sentence(string $sentence, bool $highlight = false): string {
    // Legacy markers {v}...{/v} mark the target vowel for the answer key.
    // Question view:  $highlight = false &#8594; markers stripped, plain text
    //                 (student must locate the vowel from the prompt).
    // Feedback view:  $highlight = true  &#8594; markers become a pink <strong>
    //                 (shows the student exactly what was being asked).
    if (!$highlight) {
        return htmlspecialchars(str_replace(['{v}', '{/v}'], '', $sentence));
    }
    $out = '';
    $pos = 0;
    while (($start = strpos($sentence, '{v}', $pos)) !== false) {
        $out .= htmlspecialchars(substr($sentence, $pos, $start - $pos));
        $end = strpos($sentence, '{/v}', $start + 3);
        if ($end === false) {
            $out .= htmlspecialchars(substr($sentence, $start));
            return $out;
        }
        $letter = substr($sentence, $start + 3, $end - $start - 3);
        $out .= '<strong style="color:#CC0066;">' . htmlspecialchars($letter) . '</strong>';
        $pos = $end + 4;
    }
    $out .= htmlspecialchars(substr($sentence, $pos));
    return $out;
}

// ---- No-repeat picker (§6.2) ----
function pick_vowels_item(array $allItems, array $poolIdxs, string $sessionKey): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($poolIdxs as $idx) {
        if (!in_array($idx, $used, true)) $available[] = $idx;
    }
    if (empty($available)) {
        // Pool exhausted — clear only this pool's keys, preserving other history
        $used = array_values(array_filter($used, fn($k) => !in_array($k, $poolIdxs, true)));
        $available = $poolIdxs;
    }
    $idx = $available[array_rand($available)];
    $used[] = $idx;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return $allItems[$idx];
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $poolIdxs = resolve_vowels_pool($lvl, $grd);
    $item     = pick_vowels_item($items, $poolIdxs, $sessionKey);

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'sentence' => $item['sentence'],
        'prompt'   => $item['prompt'],
        'choices'  => $choices,
        'correct'  => $item['correct'],
        'lvl'      => $lvl,
        'grd'      => $grd,
    ];
}

// ---- Render (§8, §9, §10) ----
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $sentenceHtml = vowels_render_sentence($cur['sentence'], true); // &#8592; feedback: highlight target in red
    $promptHtml   = bind_last_words($cur['prompt']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:520px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:520px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php vowels_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;">'
    . $sentenceHtml
    . '<br/><br/>'
    . '<span style="color:#800080;">' . $promptHtml . '</span>'
    . '</div>'
  , 160); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:520px;margin:10px auto;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceHtml = vowels_render_sentence($q['sentence']); // &#8592; question: no highlight
    $promptHtml   = bind_last_words($q['prompt']);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:520px;text-wrap:balance;">
    Read the sentence, then click the correct vowel class.
  </div>
  <?php vowels_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;">'
    . $sentenceHtml
    . '<br/><br/>'
    . '<span style="color:#800080;">' . $promptHtml . '</span>'
    . '</div>'
  , 160); ?>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:170px;max-width:250px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:16pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0" style="margin:0 auto;"><tr>
    <?php foreach ($levels as $l): ?>
      <td align="center">
        <label style="font:9pt Arial,sans-serif;color:#800080;">
          <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b>
        </label>
      </td>
    <?php endforeach; ?>
    </tr></table>
  </div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>