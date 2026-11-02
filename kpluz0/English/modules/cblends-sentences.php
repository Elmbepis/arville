<?php
// english/modules/cblends-sentences.php
// Identifying Consonant Blends in Sentences — click the word in a sentence
// that contains a consonant blend.
// Single level (Easy) — legacy hardcoded the level at the top of the file.
// 4 choices always (2×2 grid), 1 consonant-blend word + 3 distractors.
// Grade displayed but does not affect tier (legacy had no grade gating).
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the question/sentence box.

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
$moduleTitle = 'Identifying Consonant Blends<br/>in Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy, with 3 data fixes ----
$rawQuestions = [
    "That cloud looks like a white bunny.=cloud[sky+white]bunny",
    "My sister bought some grapes when she went to the market.=grapes[she+sister]market",
    "Ronnie used the coupons he cut from a magazine to get shirts for free.=free[coupons+shirts]magazine",
    "Someone got hurt because of the slippery pavement.=slippery[someone+hurt]because",
    "My teacher always sleeps late at night because she worries a lot.=sleeps[teacher+she]because",
    "Our soccer team has been practicing since last week.=practicing[soccer+week]team",
    "I can't believe they hired a clown for the Christmas party.=clown[hired+believe]they",
    "There are so many clubs that Jena can't decide which one to join.=clubs[decide+which]there",
    "We saw a blind man walking with his dog a while ago.=blind[walking+while]with",
    "Alfred was elected class president but he quit a week later.=class[later+quit]week",
    "Angela ran away when someone showed a frog to her.=frog[showed+someone]when",
    "I forgot to bring my favorite blanket today.=blanket[favorite+today]shawl",
    "My cousin has been wearing glasses since she was a small child.=glasses[wearing+cousin]child",
    "The theme color of their event was pink, but many of their guests wore blue.=blue[theme+their]pink",
    "The mayor led the city hall's flag ceremony today.=flag[ceremony+mayor]hall",
    "My friend is selling lobsters and crabs for half the original price.=crabs[half+original]selling",
    "We shared a cheap but yummy steak dinner at the mall last night.=steak[cheap+shared]dinner",
    "We were not allowed to use scratch paper during our last math quiz.=scratch[paper+math]quiz",
    "Apollo 11, the space mission that first landed humans on the moon, was launched on July 16, 1969.=space[mission+humans]moon",
    "Some fossil hunters from America discovered several skeletons of a primitive fish species here.=skeletons[several+fish]fossil",
    "Louie got his brown hair from his mother while his brother Kyle got their father's black hair.=brown[mother+father]while",
    "Please tell those kids to stop playing in the street because it's not safe.=playing[tell+because]safe",
    "I would choose the glazed ham over the grilled chicken in this menu.=glazed[would+choose]menu",
    "You should bring a valid ID if you want to claim the money sent to you.=claim[should+valid]money",
    "She's selling her old clothes in a garage sale to buy new ones.=clothes[selling+garage]sale",
    "The shiny jewels glittered under the bright moon.=glittered[shiny+glistened]jewels",
    "Our neighbor started collecting plants during the COVID-19 pandemic.=plants[neighbor+during]plain",
    "Many food lovers consider Boston's clam chowder to be the finest in the United States.=clam[claim+consider]clan",
    "Always buy floating fish pellets to prevent your aquarium water from getting murky.=floating[flowing+fish]aquarium",
    "The talented lass showed a wide range of skills.=skills[lass+showed]skip",
    "This weather is perfect for trekking to the hill.=trekking[weather+hill]trail",
    "I'm really glad that she won first prize at the chess tournament.=prize[she+chess]pride",
];

// ---- Pre-parse (§5.1) ----
$items = [];
foreach ($rawQuestions as $raw) {
    $eq = strpos($raw, '=');
    $b1 = strpos($raw, '[');
    $pl = strpos($raw, '+');
    $b2 = strpos($raw, ']');
    if ($eq === false || $b1 === false || $pl === false || $b2 === false) continue;
    $sentence = trim(substr($raw, 0, $eq));
    $correct  = trim(substr($raw, $eq + 1, $b1 - $eq - 1));
    $w1 = trim(substr($raw, $b1 + 1, $pl - $b1 - 1));
    $w2 = trim(substr($raw, $pl + 1, $b2 - $pl - 1));
    $w3 = trim(substr($raw, $b2 + 1));
    if ($sentence === '' || $correct === '') continue;
    $items[] = [
        'sentence' => $sentence,
        'correct'  => $correct,
        'wrong'    => [$w1, $w2, $w3],
    ];
}

// ---- Helpers (§8.4, §8.6) ----
function cblend_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function cblend_highlight(string $sentence, string $answer): string {
    $esc    = htmlspecialchars($sentence);
    $ansEsc = preg_quote(htmlspecialchars($answer), '/');
    return preg_replace(
        '/\b' . $ansEsc . '\b/iu',
        '<strong style="color:#CC0066;">$0</strong>',
        $esc,
        1
    );
}

// ---- No-repeat picker (§6) ----
function pick_cblend(array $pool, string $sessionKey): array {
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

function build_cblend_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_cblend($items, $sessionKey);
    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);
    return [
        'sentence' => $item['sentence'],
        'correct'  => $item['correct'],
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
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $_SESSION[$sessionKey]['current'] = build_cblend_question($items, $lvl, $sessionKey);
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
    $cur = $result['cur'];
    $sentenceHi = cblend_highlight($cur['sentence'], $cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php cblend_box('<div style="width:100%;font-size:17pt;line-height:1.7;">' . $sentenceHi . '</div>', 100); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The word in the sentence that has a consonant blend is
    <strong style="color:#CC0066;font-size:15pt;">'<?php echo htmlspecialchars($cur['correct']); ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Which word in the sentence has a <span style="color:#CC0066;">consonant blend</span>?
  </div>
  <?php cblend_box('<div style="width:100%;font-size:17pt;line-height:1.7;">' . htmlspecialchars($q['sentence']) . '</div>', 100); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:240px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
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