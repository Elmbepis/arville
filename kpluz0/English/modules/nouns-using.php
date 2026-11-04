<?php
// english/modules/nouns-using.php
// Using Nouns in Sentences — click the correct noun form to complete each
// sentence.
// Single level (Easy) — legacy hardcoded $_SESSION['level']="Easy" at the top
// and never varied content by grade or level. Grade displayed but does not
// affect tier (matches cblends/cdigraphs/maps-simple/pictographs/analogy).
// 4 M/C choices always (2×2 grid); text-based, no images.
//
// Data format: '<question with ____ >=<answer>[<w1>+<w2>]<w3>'
// Distractors test capitalization, pluralization, or noun-type consistency.
//
// LAYOUT (mirrors analogy.php):
//   [Hugging box with question, vertically centered]
//   [Click on the correct answer below. — gray]
//   [Choices 2×2]
//
// Feedback: replicates the question-page presentation — same yellow box,
// same ____ blank (not filled in). Below the box: "The correct answer is 'X'."

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
$moduleTitle = 'Using Nouns in Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (30 items) ----
$rawData = [
    "She bought a new ____ for her photography class.=camera[Camera+cameras]Cameras",
    "You can ask Ana for ____ since she works as a manager in that agency.=assistance[assistances+Assistance]Assistances",
    "There will be a huge ____ of YouTubers at the mall tomorrow.=crowd[Crowd+crowds]Crowds",
    "You should ask your mother for ____ regarding your problem.=advice[Advice+advices]Advices",
    "Have you been to ____ recently?=Manila[manila+the manila]the Manila",
    "The emotional sermon given by ____ last Sunday made me cry.=Pastor Eddie[pastor Eddie+pastor eddie]Pastor eddie",
    "Jerry has a ____ of coins from different countries.=collection[collections+collecting]collected",
    "Some parents, like their children, are afraid of ____ too.=the dark[dark+a dark]darks",
    "He was able to double his ____ from his online business in just a month.=earnings[earning+earns]Earnings",
    "My brother bought another phone from ____.=Lazada[lazada+the Lazada]the lazada",
    "We chose the ____ because it is easy to maintain.=Toyota Corolla[toyota corolla+Toyota corolla]toyota Corolla",
    "The new ordinance will pass if ____ of the councilors approve it.=a majority[majorities+a majorities]a Majority",
    "Only one-third of ____ passed the long test.=the students[the student+a student]a students",
    "All the ____ in the database is current.=information[informations+Information]Informations",
    "The business owners filled the gym with exercise ____.=equipment[equipments+Equipments]Equipment",
    "The farmer already has hundreds of ____ in his land.=cattle[cattles+Cattle]Cattles",
    "The captain's lack of ____ led to their defeat in the battlefield.=diligence[diligences+diligent]diligents",
    "None of the students understood the lecture delivered by ____ yesterday.=Professor Castro[professor Castro+Professor castro]professor castro",
    "Please don't put too much ____ in my coffee.=sugar[sugars+Sugar]Sugars",
    "Use a strainer to separate the pebbles from the ____.=sand[sands+Sand]Sands",
    "We must show ____ to your parents at all times.=respect[respects+respecting]respectful",
    "I am really glad that our ____ have crossed again.=paths[path+Paths]Path",
    "Do you know what Santa feeds his ____?=reindeer[reindeers+Reindeers]Reindeer",
    "All of Mr. Leoncio's ____ are grazing in the pasture right now.=sheep[sheeps+Sheep]Sheeps",
    "Their family sells different pieces of ____ in their store.=furniture[furnitures+Furnitures]Furniture",
    "My only cousin studied at ____.=Harvard University[Harvard university+a harvard university]a Harvard University",
    "There's still ____ that we'll find their resort before sunset.=hope[hopes+hoped]hoping",
    "More than 20% of our school's ____ are broken.=computers[computer+Computers]Computer",
    "The ____ went to Paris last summer.=Diazes[Diaz+diazes]diaz",
    "Did you bring enough ____ for everyone?=peanut butter[peanut butters+peanuts butter]peanuts butters",
];

// ---- Parser (§5.1) — run once at definition time ----
function nu_parse(string $raw): ?array {
    $eq = strpos($raw, '=');
    if ($eq === false) return null;
    $question = trim(substr($raw, 0, $eq));
    $rest = substr($raw, $eq + 1);

    $b1 = strpos($rest, '[');
    if ($b1 === false) return null;
    $answer = trim(substr($rest, 0, $b1));
    $rest = substr($rest, $b1 + 1);

    $pl = strpos($rest, '+');
    if ($pl === false) return null;
    $w1 = trim(substr($rest, 0, $pl));
    $rest = substr($rest, $pl + 1);

    $b2 = strpos($rest, ']');
    if ($b2 === false) return null;
    $w2 = trim(substr($rest, 0, $b2));
    $w3 = trim(substr($rest, $b2 + 1));

    if ($question === '' || $answer === '') return null;
    return [
        'question' => $question,
        'answer'   => $answer,
        'wrong'    => [$w1, $w2, $w3],
    ];
}

$items = [];
foreach ($rawData as $raw) {
    $parsed = nu_parse($raw);
    if ($parsed !== null) $items[] = $parsed;
}

// ---- Helpers (§8.4, §8.6) ----
// Hugging box — display:flex (block-level) with vertical centering.
function nu_box(string $html, int $minHeight = 100): void {
    echo '<div style="display:flex;flex-direction:column;justify-content:center;'
       . 'width:fit-content;max-width:480px;'
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto;padding:20px 32px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- No-repeat picker (§6) ----
function pick_nu(array $pool, string $sessionKey): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        if (!in_array($i, $used, true)) $available[] = $i;
    }
    if (empty($available)) {
        $used = [];
        $available = array_keys($pool);
    }
    $idx    = $available[array_rand($available)];
    $item   = $pool[$idx];
    $used[] = $idx;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return $item;
}

function build_nu_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_nu($items, $sessionKey);
    $choices = array_merge([$item['answer']], $item['wrong']);
    shuffle($choices);
    return [
        'question' => $item['question'],
        'answer'   => $item['answer'],
        'choices'  => $choices,
        'lvl'      => $lvl,
    ];
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $_SESSION[$sessionKey]['current'] = build_nu_question($items, $lvl, $sessionKey);
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
render_header($moduleTitle.' - Grade '.$grd, $moduleTitle.' - Grade '.$grd, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur      = $result['cur'];
    $question = htmlspecialchars($cur['question']);
    $ansEsc   = '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['answer']) . '\'</strong>';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php nu_box(
      '<div style="font-size:16pt;color:#333;line-height:1.55;text-align:center;">'
    . $question
    . '</div>', 100
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The correct answer is
    <?php echo $ansEsc; ?>.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q        = $_SESSION[$sessionKey]['current'];
    $question = htmlspecialchars($q['question']);
?>
  <?php nu_box(
      '<div style="font-size:16pt;color:#333;line-height:1.55;text-align:center;">'
    . $question
    . '</div>', 100
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:280px;min-height:64px;padding:12px 18px;
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
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>