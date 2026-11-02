<?php
// english/modules/vdigdiph-sentences.php
// Identifying Vowel Digraphs and Diphthongs in Sentences — click the word in a
// sentence that contains a vowel digraph or a vowel diphthong.
// Single level (Easy) — legacy hardcoded the level at the top of the file.
// 4 choices always (2×2 grid), 1 target word + 3 distractors.
// Grade displayed but does not affect tier (legacy had no grade gating).
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the question/sentence box.
//
// Each item carries a 'type' of 'digraph' or 'diphthong' (from the legacy 1/2
// prefix) so the prompt and feedback can name the target correctly.

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
$moduleTitle = 'Identifying Vowel Digraphs<br/>and Diphthongs in Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy, with 1 typo fix ("Have"&#8594;"Has") ----
// Format: "<typeDigit><sentence>=<correct>[<w1>+<w2>]<w3>"
// typeDigit: 1 = vowel digraph, 2 = vowel diphthong
$rawQuestions = [
    // digraphs
    "1Has your sister finished reading my magazine?=reading[like+cloud]child",
    "1You can't have some candy until you finish your meal.=meal[candy+have]until",
    "1Did you forget to bring your own spoon and fork?=spoon[fork+bring]forget",
    "1It isn't dark in the garden because there is a full moon tonight.=moon[full+dark]garden",
    "1Darryl noticed that there was a baby in the mammal's pouch.=pouch[noticed+baby]mother",
    "1My uncle spends a lot of time in his purple couch.=couch[uncle+spends]purple",
    "1The ground kept shaking for several seconds during that scary moment.=ground[shaking+several]seconds",
    "1Mickey's cat caught another mouse in the garage this morning.=mouse[another+garage]morning",
    "1The Santos family purchased a new house in their province.=house[purchased+province]family",
    "1An adult tiger can easily catch a deer in the forest.=deer[tiger+forest]adult",
    "1Setting up your own account in Facebook is quite quick and easy.=account[setting+quite]quick",
    "1I like putting a lot of tomato sauce in my pasta.=sauce[putting+tomato]pasta",
    "1The geese in our farm honk together every morning.=geese[honk+together]morning",
    "1They invited a priest to bless their new office.=priest[invited+bless]office",
    "1Michael used some glue to fix the broken mirror of his bicycle.=glue[broken+mirror]bicycle",
    // diphthongs
    "2That odd cloud looks like a running chicken.=cloud[running+chicken]odd",
    "2Their black puppy has a pair of large ears.=pair[puppy+large]black",
    "2The pitiful tiger is kept in chains by the wicked circus owner.=chains[pitiful+wicked]circus",
    "2The workers toiled for several months to erect that monument.=toiled[workers+months]erect",
    "2That vending machine no longer accepts old coins.=coins[vending+machine]accepts",
    "2The chef wrapped our order in aluminum foil.=foil[wrapped+order]aluminum",
    "2Their boxing bout last month was very boring.=bout[boxing+month]boring",
    "2That comedy film is about problems in the office.=about[comedy+problems]office",
    "2Lydia will deliver several pies to her customer this morning.=pies[deliver+several]customer",
    "2In any vehicle, I prefer a window seat to an aisle seat.=aisle[prefer+window]vehicle",
    "2We didn't catch the gigantic fish because it did not notice the bait we used.=bait[catch+gigantic]notice",
    "2That dragon is what the gallant swordsman feared the most.=feared[gallant+dragon]swordsman",
    "2It was their smartest inventor who came up with that superb idea.=idea[smartest+inventor]superb",
    "2Darius did not enroll this semester because he can't afford to.=because[enroll+semester]afford",
    "2This gadget will enhance your singing voice.=voice[gadget+enhance]singing",
];

// ---- Pre-parse (§5.1) ----
// Format per raw string: "<typeDigit><sentence>=<correct>[<w1>+<w2>]<w3>"
//   typeDigit "1" = vowel digraph, "2" = vowel diphthong
$items = [];
foreach ($rawQuestions as $raw) {
    $eq = strpos($raw, '=');
    $b1 = strpos($raw, '[');
    $pl = strpos($raw, '+');
    $b2 = strpos($raw, ']');
    if ($eq === false || $b1 === false || $pl === false || $b2 === false) continue;

    $typeDigit = substr($raw, 0, 1);
    if ($typeDigit === '1')      $type = 'digraph';
    elseif ($typeDigit === '2')  $type = 'diphthong';
    else                         continue;

    $sentence = trim(substr($raw, 1, $eq - 1));
    $correct  = trim(substr($raw, $eq + 1, $b1 - $eq - 1));
    $w1 = trim(substr($raw, $b1 + 1, $pl - $b1 - 1));
    $w2 = trim(substr($raw, $pl + 1, $b2 - $pl - 1));
    $w3 = trim(substr($raw, $b2 + 1));
    if ($sentence === '' || $correct === '') continue;
    $items[] = [
        'sentence' => $sentence,
        'correct'  => $correct,
        'wrong'    => [$w1, $w2, $w3],
        'type'     => $type,
    ];
}

// ---- Helpers (§8.4, §8.6) ----
function vd_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function vd_highlight(string $sentence, string $answer): string {
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
function pick_vd(array $pool, string $sessionKey): array {
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

function build_vd_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_vd($items, $sessionKey);
    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);
    return [
        'sentence' => $item['sentence'],
        'correct'  => $item['correct'],
        'choices'  => $choices,
        'type'     => $item['type'],
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
    $_SESSION[$sessionKey]['current'] = build_vd_question($items, $lvl, $sessionKey);
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
    $typeLabel = ($cur['type'] === 'digraph') ? 'vowel digraph' : 'vowel diphthong';
    $sentenceHi = vd_highlight($cur['sentence'], $cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php vd_box('<div style="width:100%;font-size:17pt;line-height:1.7;">' . $sentenceHi . '</div>', 100); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The word in the sentence that has a <?php echo $typeLabel; ?> is
    <strong style="color:#CC0066;font-size:15pt;">'<?php echo htmlspecialchars($cur['correct']); ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $promptLabel = ($q['type'] === 'digraph') ? 'vowel digraph' : 'vowel diphthong';
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Which word in the sentence has a <span style="color:#CC0066;"><?php echo $promptLabel; ?></span>?
  </div>
  <?php vd_box('<div style="width:100%;font-size:17pt;line-height:1.7;">' . htmlspecialchars($q['sentence']) . '</div>', 100); ?>
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