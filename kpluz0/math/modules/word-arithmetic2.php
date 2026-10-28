<?php
// math/modules/word-arithmetic2.php
// PROCEDURAL arithmetic word problems (× ÷ variants). Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels merged per §E:
//   Easy = legacy Easy: types 1-8, Easy ranges
//   Hard = legacy Medium: types 1-8, Medium ranges (calibration per §E)
//   Legacy Hard (types 21-23) dropped — legacy Hard calibrated too high
//   and used its own internal ranges that broke grade progression.
//
// §H bug fix: $grd referenced but never assigned &#8594; all range branches failed
// silently. Fixed: $_SESSION['grade'] ?? 5.
//
// Type-5 (remainder) special case: answer is a small remainder (2..numlimit3-1).
// Standard distractor generator would produce huge candidates (e.g. 360) that
// make the question trivial by elimination. Custom narrow distractors below
// use {ans±1, ans±2, quotient} — the natural mistakes for a remainder problem.
//
// Theme: wquiz-05-* (75/655/70) — fits §C. Score box: score-*-1 default.
// DB row required: modules.url = 'word-arithmetic2.php'

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

$moduleTitle = 'Arithmetic Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 5)));  // §H fix

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function make_word_distractors($ans, $inputs, $n = 3) {
    $candidates = [$ans + 1, $ans - 1, $ans + 2, $ans - 2, $ans + 10, $ans - 10];
    foreach ($inputs as $v) {
        if ($v > 0 && $v != $ans) {
            $candidates[] = $v;
            $candidates[] = $ans + $v;
            if ($v < $ans) $candidates[] = $ans - $v;
        }
    }
    for ($i = 0; $i < count($inputs); $i++) {
        for ($j = $i + 1; $j < count($inputs); $j++) {
            $candidates[] = abs($inputs[$i] - $inputs[$j]);
            $candidates[] = $inputs[$i] + $inputs[$j];
        }
    }
    $out = [];
    $seen = [(string)(int)$ans => true];
    shuffle($candidates);
    foreach ($candidates as $c) {
        $c = (int)$c;
        if ($c > 0 && !isset($seen[(string)$c]) && count($out) < $n) {
            $seen[(string)$c] = true;
            $out[] = $c;
        }
    }
    $d = 3;
    while (count($out) < $n && $d <= 200) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            if ($c > 0 && !isset($seen[(string)$c]) && count($out) < $n) {
                $seen[(string)$c] = true;
                $out[] = $c;
            }
        }
        $d++;
    }
    return $out;
}

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Per-grade, per-level number ranges (Easy=legacy Easy, Hard=legacy Medium)
    if ($grd <= 5) {
        if ($lvl === 'Easy')   { $nlim1 = 31;  $nlim2 = 149;  $nlim3 = 12; $nlim4 = 24; }
        else                   { $nlim1 = 101; $nlim2 = 199;  $nlim3 = 16; $nlim4 = 39; }
    } else { // grd == 6
        if ($lvl === 'Easy')   { $nlim1 = 101; $nlim2 = 199;  $nlim3 = 16; $nlim4 = 39; }
        else                   { $nlim1 = 179; $nlim2 = 279;  $nlim3 = 21; $nlim4 = 44; }
    }

    // Names
    $names = ['Jeremy','Mario','Charlie','Pamela','Dinna','Tony','Philip','Jenny','Betty',
              'Eleonor','Gina','Kyle','Bernie','Dwight','Bart','Homer','Margie','Fred',
              'Gary','Eliza','Alice','Jason','Gregory','Douglas'];
    $j1 = array_rand($names); $k1 = array_rand($names);
    while ($k1 == $j1) $k1 = array_rand($names);
    $name1 = $names[$j1]; $name2 = $names[$k1];

    // Repeat prevention for question type (last4 pattern per §J)
    $last4 = $_SESSION[$sessionKey]['last4'] ?? ['***','***','***','***'];
    $tries = 0;
    do {
        $randnum = rand(1, 8);
        $tries++;
    } while (in_array($randnum, $last4, true) && $tries < 30);
    $last4 = array_slice(array_merge($last4, [$randnum]), -4);
    $_SESSION[$sessionKey]['last4'] = $last4;

    $num1 = $num2 = $num3 = 0;
    $ans = 0;
    $inputs = [];
    $narrowPool = null;

    // Objects/places setup blocks
    $object = $place = $animal3 = $animal4 = '';
    if ($randnum == 2 || $randnum == 3 || $randnum == 6) {
        $opt = rand(1, 2);
        if ($opt == 1) {
            $animal3Pool = ["lions", "leopards", "hyenas", "cheetahs", "crocodiles", "snakes", "wild dogs"];
            $animal4Pool = ["antelopes", "impalas", "gazelles", "kudus", "wildebeests", "warthogs", "waterbucks"];
            $placePool   = ["jungle", "forest", "grassland", "plain", "valley", "savannah"];
        } else {
            $animal3Pool = ["crocodiles", "alligators", "anacondas", "arowanas", "turtles", "gars"];
            $animal4Pool = ["trouts", "carps", "tilapias", "gouramis", "tetras", "barbs", "cichlids"];
            $placePool   = ["river", "lake", "lagoon", "marsh", "swamp"];
        }
        $animal3 = $animal3Pool[array_rand($animal3Pool)];
        $animal4 = $animal4Pool[array_rand($animal4Pool)];
        $place   = $placePool[array_rand($placePool)];
    }

    if ($randnum == 5 || $randnum == 7 || $randnum == 8) {
        $objPool = ["rubber bands","candies","bubble gums","pencils","plastic toys","pens","crayons","sports cards","erasers","notebooks"];
        $placePool = ["supermarket","retail store","mall","department store","market","grocery store"];
        $object = $objPool[array_rand($objPool)];
        $place  = $placePool[array_rand($placePool)];
    }

    // Pre-calculate some numbers shared across types
    if ($randnum >= 1 && $randnum <= 4) {
        $num1 = rand($nlim1, $nlim2);
        $num2 = rand($nlim3, $nlim4);
    }
    if ($randnum >= 5 && $randnum <= 8) {
        $num3 = rand($nlim1, $nlim2);
        $num2 = rand($nlim3, $nlim4);
        $num1 = $num3 * $num2;
    }

    // ============================================================
    // DISPATCH
    // ============================================================
    if ($randnum == 1) {
        $objPool = ["vases","cups","glasses","bottles","jars","figurines","coffee mugs","plates","saucers"];
        $object = $objPool[array_rand($objPool)];
        $ans = $num1 * $num2 - $num1;
        $prompt = $name1 . ' has collected ' . hl($num1) . ' ' . $object . '. If ' . $name2 . ' has collected ' . hl($num2) . ' times as many ' . $object . ' as that, how many more ' . $object . ' has ' . $name2 . ' collected than ' . $name1 . '?';
        $soln  = "$object collected by $name1 = $num1<br>";
        $soln .= "$object collected by $name2 = $num2 x $num1 = " . ($num1 * $num2) . "<br>";
        $soln .= "<strong>Difference = " . ($num2 * $num1) . " - $num1 = $ans</strong>";
        $inputs = [$num1, $num2];
    }
    elseif ($randnum == 2) {
        $ans = $num1 * $num2 - $num1;
        $opt = rand(1, 2);
        if ($opt == 1) {
            $prompt = 'There are ' . hl($num1) . ' ' . $animal3 . ' in a ' . $place . '. If there are ' . hl($num2) . ' times as many ' . $animal4 . ' in that ' . $place . ' as ' . $animal3 . ', how many more ' . $animal4 . ' are there than ' . $animal3 . '?';
            $soln = "$animal3 in the $place = $num1<br>$animal4 in the $place = $num2 x $num1 = " . ($num1 * $num2) . "<br>";
            $soln .= "<strong>More $animal4 than $animal3 = " . ($num2 * $num1) . " - $num1 = $ans</strong>";
        } else {
            $prompt = 'In a ' . $place . ', there are ' . hl($num2) . ' times as many ' . $animal4 . ' as ' . $animal3 . '. If there are ' . hl($num1) . ' ' . $animal3 . ' in the ' . $place . ', how many less ' . $animal3 . ' are there than ' . $animal4 . '?';
            $soln = "$animal3 in the $place = $num1<br>$animal4 in the $place = $num2 x $num1 = " . ($num1 * $num2) . "<br>";
            $soln .= "<strong>Less $animal3 than $animal4 = " . ($num2 * $num1) . " - $num1 = $ans</strong>";
        }
        $inputs = [$num1, $num2];
    }
    elseif ($randnum == 3) {
        $ans = $num1 * $num2;
        $prompt = 'There are ' . hl($num1) . ' ' . $animal3 . ' in a ' . $place . '. If each of them has eaten an average of ' . hl($num2) . ' ' . $animal4 . ' last year, how many ' . $animal4 . ' have been eaten by the ' . $animal3 . ' last year?';
        $soln  = "$animal3 in the $place = $num1<br>";
        $soln .= "Average $animal4 eaten by each = $num2<br>";
        $soln .= "<strong>Total $animal4 eaten = $num2 x $num1 = $ans</strong>";
        $inputs = [$num1, $num2];
    }
    elseif ($randnum == 4) {
        $ans = $num1 * $num2 - $num1;
        $objPool = ["vases","cups","glasses","bottles","jars","figurines","coffee mugs","plates","saucers","shirts","jackets","picture frames"];
        $object = $objPool[array_rand($objPool)];
        $placePool = ["TV shopping channel","factory outlet","mall","department store","warehouse","wholesaler"];
        $place3 = $placePool[array_rand($placePool)];
        $place4 = $placePool[array_rand($placePool)];
        while ($place4 == $place3) $place4 = $placePool[array_rand($placePool)];
        if (rand(1, 2) == 1) {
            $prompt = 'If a ' . $place3 . ' has sold ' . hl($num2) . ' times as many ' . $object . ' as a ' . $place4 . ', what is the difference between the number of ' . $object . ' sold by the ' . $place3 . ' and the number sold by the ' . $place4 . ' if the ' . $place4 . ' sold ' . hl($num1) . ' ' . $object . '?';
        } else {
            $prompt = 'A ' . $place3 . ' has sold ' . hl($num2) . ' times as many ' . $object . ' as a ' . $place4 . '. How many more ' . $object . ' did the ' . $place3 . ' sell than the ' . $place4 . ' if the ' . $place4 . ' sold ' . hl($num1) . ' ' . $object . '?';
        }
        $soln  = "$object sold by the $place4 = $num1<br>";
        $soln .= "$object sold by the $place3 = $num2 x $num1 = " . ($num1 * $num2) . "<br>";
        $soln .= "<strong>Difference = " . ($num2 * $num1) . " - $num1 = $ans</strong>";
        $inputs = [$num1, $num2];
    }
    elseif ($randnum == 5) {
        // Remainder — special narrow distractors
        $ans = rand(2, $nlim3 - 1);
        $totalBought = $num1 + $ans;
        $prompt = $name1 . ' bought ' . hl($totalBought) . ' ' . $object . ' from a ' . $place . '. If ' . $name1 . ' distributed them equally among ' . hl($num3) . ' kids, how many excess ' . $object . ' did ' . $name1 . ' have left?';
        $soln  = "$object bought = $totalBought<br>";
        $soln .= "Number of kids = $num3<br>";
        $soln .= "$object per kid = $num2 remainder $ans<br>";
        $soln .= "<strong>Excess $object = $ans</strong>";
        // Build narrow pool: nearest + quotient confusion
        $narrowPool = [];
        for ($d = 1; $d <= 6; $d++) {
            $narrowPool[] = $ans + $d;
            $narrowPool[] = $ans - $d;
        }
        $narrowPool[] = $num2;
        $narrowPool[] = $num3;
        $inputs = [];
    }
    elseif ($randnum == 6) {
        $ans = $num2;
        $prompt = 'In a ' . $place . ', ' . hl($num1) . ' ' . $animal4 . ' were eaten by ' . hl($num3) . ' ' . $animal3 . ' within a given period. What was the average number of ' . $animal4 . ' eaten by each of the ' . $animal3 . ' during that period?';
        $soln  = "Number of $animal3 = $num3<br>";
        $soln .= "Number of $animal4 eaten = $num1<br>";
        $soln .= "<strong>Average per $animal3 = $num1 / $num3 = $ans</strong>";
        $inputs = [$num1, $num3];
    }
    elseif ($randnum == 7) {
        $ans = $num2;
        $prompt = 'A group of children received a total of ' . hl($num1) . ' ' . $object . ' from the mayor. If each child got ' . hl($num2) . ' ' . $object . ', how many children were there?';
        $soln  = "Total $object = $num1<br>";
        $soln .= "$object per child = $num2<br>";
        $soln .= "<strong>Number of children = $num1 / $num2 = $ans</strong>";
        $inputs = [$num1, $num2];
    }
    else { // randnum == 8
        $objPool = ["books","magazines","newspapers","DVD's","calendars","scrapbooks","paperweights","pen holders","photo albums","magic kits","decks of cards"];
        $object = $objPool[array_rand($objPool)];
        $placePool = ["book store","novelty shop","music store","hobby shop","newsstand","school supply store"];
        $place = $placePool[array_rand($placePool)];
        $ans = $num1 / $num2;
        $prompt = 'If a ' . $place . ' sold ' . hl($num1) . ' ' . $object . ' to a number of customers, and each customer bought an average of ' . hl($num2) . ' ' . $object . ', how many customers were there?';
        $soln  = "$object sold = $num1<br>";
        $soln .= "Average per customer = $num2<br>";
        $soln .= "<strong>Customers = $num1 / $num2 = " . (int)$ans . "</strong>";
        $ans = (int)$ans;
        $inputs = [$num1, $num2];
    }

    // Distractors
    if ($narrowPool !== null) {
        // Type 5 special: narrow pool
        $pool = [];
        $seen = [(string)$ans => true];
        foreach ($narrowPool as $c) {
            $c = (int)$c;
            if ($c > 0 && !isset($seen[(string)$c])) {
                $seen[(string)$c] = true;
                $pool[] = $c;
            }
        }
        shuffle($pool);
        $distractors = array_slice($pool, 0, 3);
    } else {
        $distractors = make_word_distractors($ans, $inputs, 3);
    }

    $answerStr = (string)(int)$ans;
    $allChoices = array_map(function($c) { return (string)(int)$c; }, array_merge([$ans], $distractors));
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            $c = (int)$c;
            if ($c > 0 && !in_array((string)$c, $allChoices, true)) {
                $allChoices[] = (string)$c;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $prompt,
        'answer'   => $answerStr,
        'choices'  => $allChoices,
        'solution' => $soln,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/wquiz-05-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-05-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-05-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-05-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-05-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-05-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .hl-num { color:#CC0066; font-weight:700; }
  .choice-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .choice-grid-2x2 > div { display: contents; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.5;">
        <?php echo $cur['prompt']; ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:500px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
        <strong style="color:#007700;">Solution:</strong><br>
        <?php echo $cur['solution']; ?>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.5;">
        <?php echo $q['prompt']; ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer.</p>
    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
        $use2x2 = ($maxLen >= 5 && $maxLen <= 20);
    ?>
    <?php if ($use2x2): ?>
        <div class="choice-grid-2x2">
            <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
        </div>
    <?php else: ?>
        <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    <?php endif; ?>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">Select difficulty level for next question:</font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo $l; ?></b>
                    </font></font>
                </td>
            <?php endforeach; ?>
        </tr></table>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();