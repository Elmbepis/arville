<?php
// english/modules/cdigraphs-sentences.php
// Identifying Consonant Digraphs in Sentences — click the word in a sentence
// that contains a consonant digraph.
// Single level (Easy) — legacy hardcoded the level at the top of the file.
// 4 choices always (2×2 grid), 1 consonant-digraph word + 3 distractors.
// Grade displayed but does not affect tier (legacy had no grade gating).
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the question/sentence box.
//
// NOTE: several legacy items contain distractor words that also include a
// consonant digraph (e.g. "child" alongside the correct "chicken"). Kept
// verbatim per §5 except for obvious typos — see conversion notes.

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
$moduleTitle = 'Identifying Consonant Digraphs<br/>in Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy, with 4 typos fixed ----
// Fixes:
//   * item 1 "child" left as-is (content-ambiguity note above)
//   * item 13 wrote&#8594;tied  (matched sentence: "wrapped the gift and then tied a ribbon")
//   * item 22 dirty&#8594;dirty (kept) ; "near that dirty dog" is grammatical
//   * item 26 cheery&#8594;chilly (matched sentence: "The night is chilly")
//   * item 27 wrote&#8594;wrong (matched sentence: "You are using the wrong fertilizer")
$rawQuestions = [
    "That cloud looks like a running chicken.=chicken[like+cloud]child",
    "Lyka bought some grapes when she went to the mall.=she[grapes+went]should",
    "My sister used some coupons to get these shirts for free.=shirts[sister+free]coupons",
    "My chum warned me about the hole in the floor.=chum[floor+warned]hole",
    "My coach always sleeps late at night because he worries a lot.=coach[sleeps+always]because",
    "Our karate team has been practicing since last month.=month[karate+practicing]last",
    "We can't believe they hired a clown for the Christmas party.=they[party+believe]clown",
    "Laurie can't make up her mind which club to join.=which[mind+join]club",
    "Did you see the old man being chased by a black dog at the park?=chased[old+park]black",
    "Tomas was gladly chosen by the club to be their president.=chosen[president+gladly]club",
    "The girl ran away when her friend showed a frog to her.=showed[frog+friend]girl",
    "Did you bring a shawl and a sweater to the park?=shawl[sweater+bring]park",
    "My aunt wrapped the gift and then tied a ribbon around it.=wrapped[gift+tied]around",
    "Martha hurt her knee when she tripped over a rock.=knee[knock+rock]hurt",
    "The governor welcomed the tourists at the beach today.=beach[governor+welcomed]tourists",
    "Perla is selling fish and crabs for half the price.=fish[friend+crabs]price",
    "My sisters shared a costly lobster dinner this afternoon.=shared[costly+steak]afternoon",
    "I can't solve math problems mentally so I need to do the operations on paper first.=math[problems+solve]first",
    "Do you know that many scientists believe in the existence of extraterrestrial beings?=know[believe+existence]many",
    "I wish to be a paleontologist someday so I can dig up skeletons of different dinosaur species.=wish[skeletons+species]shall",
    "The chirping of the bird with a colorful body is unpleasant to the ears.=chirping[bird+colorful]unpleasant",
    "Please stop those children from going near that dirty dog.=children[stop+from]dirty",
    "The glazed ham looks delicious but I'd still choose the steak with fries.=choose[glazed+steak]fries",
    "Jerry is now in trouble because he was the one behind the wheel when the car hit a tree.=wheel[trouble+behind]tree",
    "Why don't you share your good fortune by donating your old blankets to the fire victims?=share[fortune+blankets]victims",
    "The night is chilly but there are no clouds in the sky.=chilly[cheery+clouds]sky",
    "You are using the wrong fertilizer, which is why your plants are not growing.=wrong[grow+plants]wrote",
    "Let's order some clam chowder to go with the main dish.=dish[order+clam]fish",
    "Did you see the dead cockroach floating in the pond outside?=cockroach[floating+pond]outside",
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
function cd_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function cd_highlight(string $sentence, string $answer): string {
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
function pick_cd(array $pool, string $sessionKey): array {
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

function build_cd_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_cd($items, $sessionKey);
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
    $_SESSION[$sessionKey]['current'] = build_cd_question($items, $lvl, $sessionKey);
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
    $sentenceHi = cd_highlight($cur['sentence'], $cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php cd_box('<div style="width:100%;font-size:17pt;line-height:1.7;">' . $sentenceHi . '</div>', 100); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The word in the sentence that has a consonant digraph is
    <strong style="color:#CC0066;font-size:15pt;">'<?php echo htmlspecialchars($cur['correct']); ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Which word in the sentence has a <span style="color:#CC0066;">consonant digraph</span>?
  </div>
  <?php cd_box('<div style="width:100%;font-size:17pt;line-height:1.7;">' . htmlspecialchars($q['sentence']) . '</div>', 100); ?>
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