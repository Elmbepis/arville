<?php
// math/modules/word-percentage.php
// PROCEDURAL percentage word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels per §E (real differentiation preserved):
//   Easy   &#8594; legacy Easy + Medium (num=10..500 step 10 or 100..2500 step 100;
//            perc=10..90 step 10 or 5..95 step 5)
//   Hard   &#8594; legacy Hard (num=100..2900 step 100; perc=5..95 step 1)
//
// 5 question-type templates preserved. Types 1 and 4 randomly ask remaining
// vs consumed; both preserved.
//
// Block model solution dropped — bar-{color}-1.jpg image paths unverifiable.
//
// Distractors: tight band around the answer (see make_pct_distractors).
// Fixes "outlier" case: previous version could show the raw percentage (21)
// or num±perc (2879, 2921) as choices — trivially wrong, defeating the
// pedagogical purpose of MCQ.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-percentage.php'

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

$moduleTitle = 'Word Problems on Percentage<br/>of Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function fmt_pct($v) {
    $v = round((float)$v, 4);
    if (abs($v - round($v)) < 1e-6) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 4, '.', ''), '0'), '.');
}

// ============================================================
// Distractor builder — all choices within ~10% of the answer.
// Legacy "natural mistakes" (perc as a number, num ± perc, num itself)
// are trivially far and defeat the point of MCQ — they're filtered out.
// What stays:
//   • Used perc ± 1..5 instead of perc (e.g. 20% or 22% instead of 21%)
//   • Arithmetic slips (±1, ±2, ±5, ±10 ...)
//   • ±5% and ±10% shifts of the answer
// ============================================================
function make_pct_distractors($ans, $num, $perc, $candidates, $n = 3) {
    $ans = round((float)$ans, 4);
    $seen = [(string)$ans => true];
    $out = [];

    // Tight band — 10% of answer (min ±3 for very small answers)
    $band = max(3, $ans * 0.10);

    $cands = [];

    // Natural percentage mistakes: used perc ± N instead of perc
    foreach ([1, 2, 3, 4, 5] as $delta) {
        $alt = $perc + $delta;
        if ($alt <= 95)  $cands[] = $num * (100 - $alt) / 100;
        $alt = $perc - $delta;
        if ($alt >= 5)   $cands[] = $num * (100 - $alt) / 100;
    }
    // Small arithmetic slips
    foreach ([1, 2, 3, 5, 8, 10, 15, 20, 30, 50, 75, 100] as $delta) {
        $cands[] = $ans + $delta;
        $cands[] = $ans - $delta;
    }
    // ±5% and ±10% shifts
    $cands[] = $ans * 0.95;
    $cands[] = $ans * 1.05;
    $cands[] = $ans * 0.90;
    $cands[] = $ans * 1.10;

    // Pass-through candidates (filtered by band below)
    foreach ($candidates as $c) $cands[] = $c;

    shuffle($cands);
    foreach ($cands as $c) {
        $c = round((float)$c, 4);
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;          // outside band &#8594; outlier
        $key = (string)$c;
        if (isset($seen[$key])) continue;
        $seen[$key] = true;
        $out[] = $c;
        if (count($out) >= $n) break;
    }

    // Fallback: symmetric padding within band
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            if ($c <= 0) continue;
            $key = (string)$c;
            if (isset($seen[$key])) continue;
            $seen[$key] = true;
            $out[] = $c;
            if (count($out) >= $n) break 2;
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
    if ($lvl === 'Easy') {
        if (rand(1, 2) == 1) {
            $num  = rand(1, 50) * 10;      // legacy Easy
            $perc = rand(1, 9) * 10;
        } else {
            $num  = rand(1, 25) * 100;     // legacy Medium
            $perc = rand(1, 19) * 5;
        }
    } else {
        $num  = rand(1, 29) * 100;
        $perc = rand(5, 95);
    }

    $consumed  = $num * ($perc / 100);
    $remaining = $num - $consumed;

    $last3 = $_SESSION[$sessionKey]['last3'] ?? ['***','***','***'];
    $tries = 0;
    do {
        $randques = rand(1, 5);
        $tries++;
    } while (in_array($randques, $last3, true) && $tries < 30);
    $last3 = array_slice(array_merge($last3, [$randques]), -3);
    $_SESSION[$sessionKey]['last3'] = $last3;

    if ($randques == 1) {
        $cs = ["bag", "box", "tin can", "cup", "bowl", "bottle", "tray", "drawer", "piggy bank", "container"];
        $c  = $cs[array_rand($cs)];
        $coins = ["5-centavo", "10-centavo", "25-centavo", "50-centavo", "1-peso", "5-peso", "10-peso"];
        shuffle($coins);
        $coin1 = $coins[0]; $coin2 = $coins[1];
        if (rand(1, 2) == 1) {
            $ans = $remaining;
            $prompt = 'A ' . hl($c) . ' has ' . hl($num) . ' coins. If ' . hl($perc . '%') . ' of these are ' . hl($coin1) . ' coins and the rest are ' . hl($coin2) . ' coins, how many ' . hl($coin2) . ' coins are there?';
            $soln  = "Total coins = $num<br>";
            $soln .= "$coin1 coins = $perc% of $num = " . fmt_pct($consumed) . "<br>";
            $soln .= "<strong>$coin2 coins = $num - " . fmt_pct($consumed) . " = " . fmt_pct($ans) . "</strong>";
        } else {
            $ans = $consumed;
            $prompt = 'A ' . hl($c) . ' has ' . hl($num) . ' coins. If ' . hl($perc . '%') . ' of these are ' . hl($coin1) . ' coins and the rest are ' . hl($coin2) . ' coins, how many ' . hl($coin1) . ' coins are there?';
            $soln = "$coin1 coins = $perc% of $num = <strong>" . fmt_pct($ans) . "</strong>";
        }
    }
    elseif ($randques == 2) {
        $objects2 = ["dolls", "toy cars", "comic books", "bubble gums", "balls", "balloons"];
        shuffle($objects2);
        $obj = $objects2[0];
        $places2 = ["a department store", "a grocery store", "the mall", "a supermarket", "a bookstore", "a supplier"];
        $place   = $places2[array_rand($places2)];
        $names   = ["Joanna","Michael","Carlo","Pablo","Dorothy","Terry","Peter","Jill","Barney","Emily","Glenda","Kirby"];
        shuffle($names);
        $name1 = $names[0]; $name2 = $names[1];
        $ans = $remaining;
        $prompt = hl($name1) . ' bought ' . hl($num) . ' ' . $obj . ' from ' . hl($place) . '. If ' . hl($name1) . ' gives ' . hl($perc . '%') . ' of them to ' . hl($name2) . ', how many ' . $obj . ' will ' . hl($name1) . ' have left?';
        $soln  = "Bought = $num<br>";
        $soln .= "Gave away = $perc% of $num = " . fmt_pct($consumed) . "<br>";
        $soln .= "<strong>Left = $num - " . fmt_pct($consumed) . " = " . fmt_pct($ans) . "</strong>";
    }
    elseif ($randques == 3) {
        $objs = ["glasses","cups","plates","saucers","mugs","figurines","bottles"];
        $obj  = $objs[array_rand($objs)];
        $containers = ["crate","tub","wooden box","net","housing","case","carrier"];
        $container  = $containers[array_rand($containers)];
        $machines   = ["robotic cart","conveyor","crane","machine","payloader"];
        $machine    = $machines[array_rand($machines)];
        $ans = $remaining;
        $prompt = 'A ' . hl($machine) . ' was transporting a ' . $container . ' containing ' . hl($num) . ' ' . $obj . ' when the ' . $container . ' slipped off the ' . $machine . '. If ' . hl($perc . '%') . ' of the ' . $obj . ' broke, how many ' . $obj . ' were left?';
        $soln  = "Total $obj = $num<br>";
        $soln .= "Broke = $perc% of $num = " . fmt_pct($consumed) . "<br>";
        $soln .= "<strong>Left = $num - " . fmt_pct($consumed) . " = " . fmt_pct($ans) . "</strong>";
    }
    elseif ($randques == 4) {
        $opt = rand(1, 3);
        if ($opt == 1) {
            $places  = ["city garden","farm","field","plantation","compound","woods","meadow","pasture","vineyard","lawn"];
            $inat    = " in the ";
            $animals = ["butterflies","bees","bats","crickets","locusts","fireflies","crows","sparrows","birds","flying insects","pigeons"];
            $verb    = "flew away";
        } elseif ($opt == 2) {
            $places  = ["river","lake","pond","water reservoir","canal","rivulet","creek","brook","stream"];
            $inat    = " in a ";
            $animals = ["fishes","catfishes","cichlids","eels","carps","tilapias","shrimps"];
            $verb    = (rand(1, 2) == 1) ? "were caught by fishermen" : "were caught by fishing boats";
        } else {
            $places  = ["house","haunted mansion","shack","barn","farmhouse","building"];
            $inat    = " in a ";
            $animals = ["mice","rodents","rats","vermins","ants","termites","spiders","pests","killer bees"];
            $verb    = "were exterminated";
        }
        $animal1 = $animals[array_rand($animals)];
        $place1  = $places[array_rand($places)];
        if (rand(1, 2) == 1) {
            $ans = $remaining;
            $prompt = 'There are ' . hl($num) . $inat . $place1 . '. If ' . hl($perc . '%') . ' of them ' . $verb . ', how many ' . $animal1 . ' will be left in the ' . $place1 . '?';
            $soln  = "Total = $num<br>$verb = $perc% of $num = " . fmt_pct($consumed) . "<br>";
            $soln .= "<strong>Left = " . fmt_pct($ans) . "</strong>";
        } else {
            $ans = $consumed;
            $prompt = 'There are ' . hl($num) . $inat . $place1 . '. If ' . hl($perc . '%') . ' of them ' . $verb . ', how many ' . $animal1 . ' will no longer be in the ' . $place1 . '?';
            $soln = "Total = $num<br>$verb = $perc% of $num = <strong>" . fmt_pct($ans) . "</strong>";
        }
    }
    else {
        $opt = rand(1, 2);
        if ($opt == 1) {
            $places = ["city library","bookstore","warehouse","school library","publishing house"];
            $things = ["books","journals","magazines","maps","albums","atlases","storybooks","newspapers","almanacs","dictionaries"];
            $verbs  = ["were ruined by floods","burned during a fire","got damaged by rain","were given away","were sold to a collector","were transferred to another place"];
        } else {
            $places = ["bakery","bakeshop","food store","grocery store","pastry store"];
            $things = ["eclairs","croissants","treats","tarts","cookies","brownies","doughnuts","biscuits","cupcakes","cake slices","muffins"];
            $verbs  = ["were consumed by customers","were delivered outside the city","were shipped to online buyers","were sold","were given away as samples","were donated to charity"];
        }
        $thing1 = $things[array_rand($things)];
        $place1 = $places[array_rand($places)];
        $verb   = $verbs[array_rand($verbs)];
        if (rand(1, 2) == 1) {
            $ans = $remaining;
            $prompt = 'There are ' . hl($num) . ' ' . $thing1 . ' at a ' . $place1 . '. If ' . hl($perc . '%') . ' of them ' . $verb . ', how many ' . $thing1 . ' will be left in the ' . $place1 . '?';
            $soln  = "Total = $num<br>$verb = $perc% of $num = " . fmt_pct($consumed) . "<br>";
            $soln .= "<strong>Left = " . fmt_pct($ans) . "</strong>";
        } else {
            $ans = $consumed;
            $prompt = 'There are ' . hl($num) . ' ' . $thing1 . ' at a ' . $place1 . '. If ' . hl($perc . '%') . ' of them ' . $verb . ', how many ' . $thing1 . ' will no longer be in the ' . $place1 . '?';
            $soln = "Total = $num<br>$verb = $perc% of $num = <strong>" . fmt_pct($ans) . "</strong>";
        }
    }

    $answerStr = fmt_pct($ans);
    $distractors = make_pct_distractors($ans, $num, $perc, [$consumed, $remaining], 3);
    $allChoices = array_merge([$answerStr], array_map('fmt_pct', $distractors));
    $allChoices = array_values(array_unique($allChoices));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 500) {
        foreach ([$ans + $pad, $ans - $pad] as $c) {
            if ($c <= 0) continue;
            $cs = fmt_pct($c);
            if (!in_array($cs, $allChoices, true)) {
                $allChoices[] = $cs;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $pad++;
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
    'top_banner'    => $base . '/math/images/images/wquiz-15-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-15-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-15-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-15-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-15-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-15-bottom.jpg',
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