<?php
// english/modules/idioms.php
// Meanings of Idioms — click the correct definition of an idiomatic expression.
// Single-level module: 4 choices always. No level selector.
// All definitions are stored/displayed with a lowercase first letter.
// Single flat idiom pool (~78 entries). No grade tiering (legacy had none).

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
$moduleTitle = 'Meanings of Idioms';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector. Scorer still wants a level string.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (with 3 typo fixes) ----
$idioms = [
    "A blessing in disguise:Something good that's not seen as good at first",
    "A chip on your shoulder:Being upset for something that happened in the past",
    "A dime a dozen:Very common and easy to get",
    "A drop in the bucket:A very small part of something",
    "A piece of cake:A task that is very easy to do",
    "A slap on the wrist:A very mild punishment",
    "Add fuel to the fire:Do something to make a bad situation even worse",
    "Against the clock:Rushed and short on time",
    "Against the odds:Despite many difficulties",
    "Apple of my eye:Someone who is cherished above all others",
    "Give an arm and a leg:Pay a large amount of money",
    "Back to square one:Having to start all over again",
    "Back to the drawing board:Try a new idea after the one before it has failed",
    "Baker's dozen:Thirteen",
    "Bark up the wrong tree:Blame someone or something that's not the cause",
    "Bend over backwards:Be willing to do anything",
    "Bite off more than you can chew:Start a task that is too big for you",
    "Bite your tongue:Avoid talking",
    "Blood is thicker than water:Your family is more important than other people",
    "Blue moon:A rare event or occurrence",
    "Break a leg:Good luck to you",
    "Crack someone up:Make someone laugh",
    "Let's cross our fingers:Let's hope that things happen our way",
    "Cry wolf:Raise a false alarm or warning",
    "Curiosity killed the cat:Being too curious can put you in danger",
    "Cut to the chase:Say directly what you want to say",
    "Dark horse:One who was previously unknown but is now prominent",
    "Dead ringer:Someone who looks identical to another person",
    "Drink like a fish:Drink very heavily",
    "Drive someone up the wall:Irritate someone very much",
    "Find your feet:Become more comfortable with what you're doing",
    "Fixed in your ways:Not willing or wanting to change",
    "Foam at the mouth:Be very angry and show it",
    "From rags to riches:From being poor to being wealthy",
    "Get over it:Stop being affected by what's bothering you",
    "Got up on the wrong side of the bed:Displaying a bad mood",
    "Go the extra mile:Exerting your best effort to do a task",
    "Good Samaritan:Someone who unselfishly helps others",
    "Have an axe to grind:Have a dispute with someone",
    "Lose your head:Become angry and overcome by emotions",
    "Head over heels:Being deeply in love",
    "Hit the books:Study, especially for a test or exam",
    "Hit the nail on the head:Do or say something exactly right",
    "Hit the sack:Go to bed or go to sleep",
    "Hold your horses:Stop and be patient",
    "In the bag:Being sure of something",
    "Keep an eye on him:Watch him carefully",
    "Keep your chin up:Remain confident in a tough situation",
    "Knock on wood:Wish that something bad will not happen",
    "Know the ropes:Understand something well",
    "Lend me your ears:Give me your full attention",
    "Let bygones be bygones:Forget about a past disagreement",
    "Let the cat out of the bag:Share a secret",
    "Mum's the word:Say nothing or keep quiet",
    "Nest egg:Savings set aside for future use",
    "New kid on the block:Someone new to the group or area",
    "No room to swing a cat:An unusually small or confined space",
    "Off the hook:No longer in trouble",
    "Sitting on the fence:Not decided on something",
    "On the same page:Agreeing on the same thing",
    "Out of the blue:Something that suddenly and unexpectedly occurs",
    "Over my dead body:I can not allow that to happen",
    "Over the top:Very excessive",
    "Pass the buck:Avoid responsibility by giving it to someone else",
    "Pull the plug:Stop something",
    "Pull his leg:Play a joke or trick on him",
    "Put a sock in it:Be quiet",
    "Raining cats and dogs:A very loud and noisy (or strong) rain storm",
    "Rise and shine:Get out of bed and be ready for the day ahead",
    "Run out of steam:Run out of energy",
    "Saved by the bell:Saved at the last possible moment",
    "Smell something fishy:Detect something that isn't right",
    "Spitting image:An exact likeness",
    "Start from scratch:Do something all over again from the beginning",
    "The ball is in your court:It's your turn to make a decision",
    "The whole nine yards:Everything or all of something",
    "Tie the knot:Get married",
    "Till the cows come home:A long time",
    "Under the weather:Feeling ill or sick",
    "Water under the bridge:A past event that doesn't matter anymore",
    "When pigs fly:Something that will never ever happen",
];

// ---- Pre-parse (§5.1) — force lowercase-first definitions ----
$items = [];
foreach ($idioms as $raw) {
    $pos = strpos($raw, ':');
    if ($pos === false) continue;
    $q   = trim(substr($raw, 0, $pos));
    $def = lcfirst(trim(substr($raw, $pos + 1)));
    if ($q === '' || $def === '') continue;
    $items[] = ['q' => $q, 'def' => $def];
}

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function idioms_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
    $sizing = ($widthPx > 0)
        ? 'width:' . $widthPx . 'px;max-width:100%;'
        : 'max-width:480px;';
    echo '<div style="' . $sizing
       . 'min-height:' . $minHeight . 'px;margin:16px auto 10px;padding:14px 20px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function idioms_compute_width(string $text, int $charPx = 9, int $maxWidthPx = 480, int $minWidthPx = 240): int {
    $plain = trim($text);
    if ($plain === '') return $minWidthPx;
    $horizontalSpace = 46;
    $longest = strlen($plain);
    return max($minWidthPx, min($maxWidthPx, $longest * $charPx + $horizontalSpace));
}

function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
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
    $numChoices = 4;

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($items as $i => $item) {
        if (!in_array($i, $used, true)) $available[] = $i;
    }
    if (empty($available)) {
        $used = [];
        $available = array_keys($items);
    }
    $correctIdx = $available[array_rand($available)];
    $correct    = $items[$correctIdx];
    $used[]     = $correctIdx;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $poolIdx = array_keys($items);
    shuffle($poolIdx);
    $distractorDefs = [];
    foreach ($poolIdx as $di) {
        if ($di === $correctIdx) continue;
        $distractorDefs[] = $items[$di]['def'];
        if (count($distractorDefs) >= $numChoices - 1) break;
    }

    $choices = array_merge([$correct['def']], $distractorDefs);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'idiom'   => $correct['q'],
        'answer'  => $correct['def'],
        'choices' => $choices,
        'lvl'     => $lvl,
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
render_header($moduleTitle.' - Grade '.$grd, $moduleTitle.' - Grade '.$grd, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $meaningLine = "The meaning of the idiomatic expression '{$cur['idiom']}' is '{$cur['answer']}'.";
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:520px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:520px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#800080;max-width:520px;margin:20px auto;line-height:1.55;">
    <?php echo bind_last_words($meaningLine); ?>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:45px auto 25px;font-family:Arial,sans-serif;font-size:10pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $idiomEsc = htmlspecialchars($q['idiom']);
    $idiomW   = idioms_compute_width($q['idiom'], 11, 460, 240);

    // All choice boxes share the widest choice's width (capped at 560)
    $maxLen = 0;
    foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
    $choiceBoxW = max(260, min(560, $maxLen * 9 + 50));
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:14pt;font-weight:700;color:#800080;max-width:520px;text-wrap:balance;">
    Click on the correct meaning of this idiom:
  </div>
  <?php idioms_box(
      '<div style="font-size:18pt;font-weight:700;color:#0000AA;line-height:1.3;">'
    . $idiomEsc
    . '</div>'
  , 80, $idiomW); ?>
  <div style="display:flex;flex-direction:column;align-items:center;gap:10px;width:fit-content;margin:20px auto;padding:0 8px;box-sizing:border-box;">
  <?php foreach ($q['choices'] as $c): ?>
    <a href="?ansclick=<?php echo urlencode($c); ?>"
       style="display:flex;align-items:center;justify-content:center;
              width:<?php echo $choiceBoxW; ?>px;min-height:56px;padding:12px 18px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
              font-size:14pt;font-weight:700;text-align:center;
              word-break:break-word;box-sizing:border-box;line-height:1.4;">
      <?php echo htmlspecialchars($c); ?>
    </a>
  <?php endforeach; ?>
  </div>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:55px auto 30px;font-family:Arial,sans-serif;font-size:10pt;">
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>