<?php
// english/modules/irreg-verbs-using.php
// Using Irregular Verbs in Sentences — fill in the blank with the correct
// irregular verb form. 4 choices always (2×2 grid): 1 correct form + 3
// plausible wrong forms.
// Single level (Easy) — legacy hardcoded $_SESSION['level']="Easy" at the top
// and content never varied by grade or level (one big flat pool of 35 items).
// Grade displayed but does not affect tier.
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
$moduleTitle = 'Using Irregular Verbs<br/>in Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (35 items) ----
// Format: "<sentence with ____ >=<correct>[<w1>+<w2>]<w3>"
$rawQuestions = [
    "Have you ____ your hotdog sandwich already?=eaten[ate+eating]eated",
    "We ____ there when the mishap happened.=were[are+was]is",
    "The play ____ already so we need to sneak into the theater very quietly.=has begun[has began+have begun]have began",
    "The scouts immediately ____ pitching up their tents when they reached the campsite.=began[begun+have begun]have began",
    "Superman was able to escape even though he ____ with chains and shackles.=was bound[was binded+is bound]is binded",
    "The poor creature was hit by a stray bullet and almost ____ to death.=bled[bleeded+bleeds]bleeding",
    "Myra's umbrella was ____ away by the strong winds.=blown[blew+blowed]blowing",
    "The wolf ____ as hard as it could but the house remained standing.=blew[blown+blowed]blowing",
    "One of their windows was ____ by a wayward baseball.=broken[broke+break&#8203;ed]breaking",
    "My best friend ____ our school's basketball scoring record.=broke[broken+breaked]breaking",
    "The new trainees ____ their own laptops to the seminar.=brought[bringed+brang]brung",
    "The old king ____ a new castle on a hill after the war.=built[builded+building]builds",
    "Our dog was ____ by a snake so we called a veterinarian.=bitten[bited+biten]bit",
    "The nervous puppy ____ the old woman's leg.=bit[bited+bites]bitten",
    "The new employee was ____ from among hundreds of applicants.=chosen[chosed+chose]choosed",
    "A hunter finally ____ the large crocodile terrorizing the village.=caught[catched+catches]catching",
    "The tailor ____ the cloth this morning using a large pair of scissors.=cut[cutted+cutting]cuts",
    "Have you ____ a large hole on the ground before?=dug[dugged+digged]diggen",
    "The artist ____ another portrait of Rizal just now.=has drawn[has drawed+has drew]drawn",
    "This old car has already been ____ for more than 100,000 kilometers.=driven[drove+drived]droven",
    "Kulas got sick because he ____ a glass of dirty water yesterday.=drank[drinked+drunk]had drank",
    "Paula is now very thirsty because she hasn't ____ water since last night.=drunk[drinked+drank]drinking",
    "The lions ____ over the carcass because it wasn't enough for all of them.=fought[fighted+fighting]foughted",
    "Put on your seatbelt because I haven't ____ an airplane before.=flown[flew+flied]flyed",
    "The bird ____ away when the cat passed by.=flew[flown+flied]flyed",
    "Have you ____ a replacement for our broken printer?=found[finded+finding]founded",
    "The coffee beans were ____ by Laura using a manual grinder.=ground[grinded+grinding]grounded",
    "The pirates found the ____ treasure inside a dark cave.=hidden[hided+hiden]hid",
    "The little girl ____ the chick loosely in her hands.=held[holded+holden]holding",
    "The lucky contestant ____ a total of 50,000 pesos in cash.=won[winned+had win]winning",
    "I heard that the controversial book was ____ by an old lunatic.=written[wrote+writed]writen",
    "Have you ____ all of your paintings already?=sold[selled+solden]sellen",
    "I have ____ ghosts before but this one is definitely the scariest.=seen[saw+sawed]sawn",
    "The stranger immediately ____ when my friends arrived.=left[leaved+leaving]lefted",
    "Be careful because I think he really ____ what he said to you.=meant[meaned+meanted]meaning",
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
function ivu_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function ivu_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// Highlight the correct answer by replacing the ____ placeholder with the
// answer in pink (#CC0066). Applied only on the feedback page.
function ivu_highlight_blank(string $sentence, string $answer): string {
    $esc  = htmlspecialchars($sentence);
    $ans  = '<strong style="color:#CC0066;">' . htmlspecialchars($answer) . '</strong>';
    $out  = str_replace('____', $ans, $esc);
    // If for any reason the placeholder isn't present, fall back to plain text.
    if (strpos($out, $ans) === false) $out = $esc;
    return $out;
}

// ---- No-repeat picker (§6) ----
function pick_ivu(array $pool, string $sessionKey): array {
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

function build_ivu_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_ivu($items, $sessionKey);
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
    $_SESSION[$sessionKey]['current'] = build_ivu_question($items, $lvl, $sessionKey);
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
    $sentenceHi = ivu_highlight_blank($cur['sentence'], $cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php ivu_box('<div style="width:100%;font-size:17pt;color:#333;line-height:1.6;text-wrap:balance;">' . $sentenceHi . '</div>', 110); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The correct form is <strong style="color:#CC0066;font-size:15pt;">'<?php echo htmlspecialchars($cur['correct']); ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceQ = ivu_bind_last_words($q['sentence']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Which is the correct <span style="color:#CC0066;">irregular verb form</span>?
  </div>
  <?php ivu_box('<div style="width:100%;font-size:17pt;color:#333;line-height:1.6;text-wrap:balance;">' . $sentenceQ . '</div>', 110); ?>
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
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>