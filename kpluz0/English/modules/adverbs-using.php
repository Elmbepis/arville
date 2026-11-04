<?php
// english/modules/adverbs-using.php
// Using Adverbs in Sentences — click the best adverb to complete each sentence.
// Single level (Easy) — legacy hardcoded $_SESSION['level']="Easy" at the top
// and never varied content by grade or level. Grade displayed but does not
// affect tier (matches cblends/cdigraphs/nouns-using/analogy).
// 4 M/C choices always (2×2 grid); text-based, no images.
//
// Data format: '<question with ____ >=<answer>[<w1>+<w2>]<w3>'
//
// LAYOUT (mirrors nouns-using.php / analogy.php):
//   [Hugging box with question, vertically centered]
//   [Click on the correct answer below. — gray]
//   [Choices 2×2]
//
// Feedback: replicates question-page presentation — same yellow box, same
// ____ blank (not filled in). Below the box: "The correct answer is 'X'."

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
$moduleTitle = 'Using Adverbs in Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (30 items) ----
$rawData = [
    "I will go to the market ____ to buy some rice.=tomorrow[a while ago+yesterday]last week",
    "Mr. Torres took his children ____ to see some jungle animals.=to the zoo[home+to the gym]to their farm",
    "Paula walked ____ on the wet floor which is why she slipped.=carelessly[carefully+cautiously]slowly",
    "The gullible man ____ handed the scammer his money.=foolishly[carefully+smartly]wisely",
    "Rene paced back and forth as he ____ waited for Gina to arrive.=impatiently[happily+strongly]wisely",
    "The creepy chair in the haunted mansion ____ moved to the attic by itself.=mysteriously[quietly+cautiously]naively",
    "Everyone shouted when the white car stopped ____, narrowly missing the tree.=abruptly[slowly+carefully]frequently",
    "Rodney ____ maneuvered his flying drone around the obstacles.=adroitly[needlessly+unwittingly]blindly",
    "There has never been a discovery of such importance ____.=since 2010[yesterday+every day]next year",
    "The rescuers are expected to find the missing mountaineers ____.=very soon[a while ago+every hour]since last week",
    "Gerardo's ambition and passion will make him successful ____.=someday[months ago+every year]since 2015",
    "Scientists think that breakthroughs in cancer treatment will happen ____.=within this decade[years ago+always]since 2017",
    "If you press that button, the robotic arm will move ____.=forward[nervously+to China]under the car",
    "He is such a famous star that people follow him ____.=everywhere[somewhere+here]there",
    "If you get a degree in engineering, you could apply for a job ____.=anywhere[frequently+since last year]right now",
    "It's already starting to rain so we all need to go ____.=inside[outside+forward]backward",
    "The delivery truck was travelling ____ then it reversed its direction and headed east.=westward[eastward+northward]southward",
    "The surveillance camera failed to capture the event because it was installed ____.=backward[correctly+carefully]nicely",
    "If we want to go to Baguio from Manila, we need to drive ____.=northward[southward+carelessly]for years",
    "Their charity foundation gets donations from politicians ____.=every now and then[last year+yesterday]in 2019",
    "Our organization sponsors a fund-raising event ____.=every other month[since yesterday+last week]in 2018",
    "Their computer technicians upgrade their software system ____.=yearly[two months ago+a while ago]every second",
    "A DNA test can ____ identify the father of this child.=certainly[regularly+extremely]somewhere",
    "The development of a viable COVID-19 vaccine is ____ important to ensure public safety.=extremely[scarcely+negligibly]never",
    "Judging by its sturdy looks, the tank's new armor is ____ impenetrable by any bullet.=virtually[dubiously+negligibly]rarely",
    "We've been looking for that toy for weeks but it is ____ available in this city.=scarcely[abundantly+certainly]frequently",
    "Myla and her friends go to Baclaran church ____.=every Wednesday[last week+this morning]in February",
    "Your fish is so weird because it is swimming ____.=upside down[normally+forward]right now",
    "Do you get email from your friends and family ____?=every week[last month+last Thursday]next week",
    "Your teeth and gums hurt because you don't visit your dentist ____.=regularly[last month+last Monday]next year",
];

// ---- Parser (§5.1) — run once at definition time ----
function au_parse(string $raw): ?array {
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
    $parsed = au_parse($raw);
    if ($parsed !== null) $items[] = $parsed;
}

// ---- Helpers (§8.4, §8.6) ----
// Hugging box — display:flex (block-level) with vertical centering.
function au_box(string $html, int $minHeight = 100): void {
    echo '<div style="display:flex;flex-direction:column;justify-content:center;'
       . 'width:fit-content;max-width:480px;'
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto;padding:20px 32px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- No-repeat picker (§6) ----
function pick_au(array $pool, string $sessionKey): array {
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

function build_au_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_au($items, $sessionKey);
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
    $_SESSION[$sessionKey]['current'] = build_au_question($items, $lvl, $sessionKey);
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
  <?php au_box(
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
  <?php au_box(
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