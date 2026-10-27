<?php
// math/modules/word-fractions-mult-div.php
// PROCEDURAL fraction word problems + choice. Bypass QEngine per §D (computed answer).
// Converted from FIB (numerator/denominator inputs) to MCQ per user instruction.
//
// Levels merged per §E:
//   Easy = legacy Easy ranges
//   Hard = legacy Medium ranges (legacy Hard dropped: calibrated too high)
//
// $grd bug fix per §H: legacy referenced $grd but never assigned it &#8594; always
// fell through every branch, leaving $denomlim1..4 undefined. Now reads
// $_SESSION['grade'] ?? 4, clamped to 4-6.
//
// Layout: fraction choices with maxLen >= 5 (e.g. "13/225") wrap 3+1 in the
// default flex, so they're forced into a 2×2 grid (§A per-module threshold).
// Short fractions like "1/2", "3/8" (maxLen <= 4) stay one row.
//
// Encoding: × and ÷ glyphs don't reliably render in some client environments,
// so solution text uses ASCII 'x' for multiplication. No ÷ in this module
// (fractions use '/' as the bar, not the ÷ operator).
//
// Theme: wquiz-14-* (75/655/70) — fits §C. Score box: score-*-1 (default).
// DB row required: modules.url = 'word-fractions-mult-div.php'

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

$moduleTitle = 'Fraction Multiplication/Division Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function gcd($a, $b) { return $b == 0 ? abs($a) : gcd($b, $a % $b); }
function reduce_frac($n, $d) {
    if ($d == 0) return [0, 1];
    $g = gcd($n, $d);
    return [(int)($n / $g), (int)($d / $g)];
}

function make_frac_distractors($ansnumer, $ansdenom, $numer1, $denom1, $numer2, $denom2, $n = 3) {
    $correctRed = reduce_frac($ansnumer, $ansdenom);
    $candidates = [
        [$ansnumer + 1, $ansdenom],
        [$ansnumer, $ansdenom + 1],
        [$numer1 + $numer2, $denom1 + $denom2],
        [$ansnumer + 2, $ansdenom],
        [$ansnumer, $ansdenom + 2],
        [$ansdenom, $ansnumer],
        [$numer1 * $numer2, $denom1 + $denom2],
        [$numer1 + $numer2, $denom1 * $denom2],
        [$numer1 * $denom2, $denom1 * $numer2],
    ];
    $out  = [];
    $seen = [$correctRed[0] . '/' . $correctRed[1] => true];
    foreach ($candidates as $c) {
        if ($c[0] <= 0 || $c[1] <= 0) continue;
        $r = reduce_frac($c[0], $c[1]);
        $key = $r[0] . '/' . $r[1];
        if (isset($seen[$key])) continue;
        if (count($out) >= $n) break;
        $seen[$key] = true;
        $out[] = $r;
    }
    $d = 1;
    while (count($out) < $n && $d <= 50) {
        foreach ([[$ansnumer + $d, $ansdenom], [$ansnumer, $ansdenom + $d]] as $c) {
            $r = reduce_frac($c[0], $c[1]);
            $key = $r[0] . '/' . $r[1];
            if (isset($seen[$key])) continue;
            $seen[$key] = true;
            $out[] = $r;
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

    $result = [
        'correct' => $isCorrect,
        'clicked' => $clicked,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($grd == 4) {
        if ($lvl === 'Easy') { $dlim1 = 2; $dlim2 = 8; $dlim3 = 2; $dlim4 = 4; }
        else                 { $dlim1 = 2; $dlim2 = 5; $dlim3 = 3; $dlim4 = 6; }
    } elseif ($grd == 5) {
        if ($lvl === 'Easy') {
            if (rand(1, 2) == 1) { $dlim1 = 2; $dlim2 = 8; $dlim3 = 2; $dlim4 = 4; }
            else                 { $dlim1 = 2; $dlim2 = 5; $dlim3 = 3; $dlim4 = 6; }
        } else { $dlim1 = 3; $dlim2 = 9; $dlim3 = 4; $dlim4 = 9; }
    } else {
        if ($lvl === 'Easy') {
            if (rand(1, 2) == 1) { $dlim1 = 2; $dlim2 = 8; $dlim3 = 2; $dlim4 = 4; }
            else                 { $dlim1 = 2; $dlim2 = 5; $dlim3 = 3; $dlim4 = 6; }
        } else { $dlim1 = 5; $dlim2 = 15; $dlim3 = 5; $dlim4 = 15; }
    }

    if ($grd == 4) {
        $denom1 = rand($dlim1, $dlim2);
        $safety = 0;
        do { $denom2 = rand($dlim3, $dlim4); $safety++; } while (($denom1 * $denom2) > 36 && $safety < 30);
        $numer1 = rand(1, $denom1 - 1);
        $numer2 = ($lvl === 'Easy') ? 1 : rand(2, $denom2 - 1);
    } else {
        $denom1 = rand($dlim1, $dlim2);
        $denom2 = rand($dlim3, $dlim4);
        $numer1 = rand(1, $denom1 - 1);
        $numer2 = rand(1, $denom2 - 1);
    }

    $ansnumer = $numer1 * $numer2;
    $ansdenom = $denom1 * $denom2;

    $trends = $_SESSION[$sessionKey]['trends'] ?? [];
    $last3  = array_slice($trends, -3);
    $q = rand(1, 5);
    $tries = 0;
    while (in_array($q, $last3, true) && $tries < 20) { $q = rand(1, 5); $tries++; }
    $trends[] = $q;
    if (count($trends) > 3) $trends = array_slice($trends, -3);
    $_SESSION[$sessionKey]['trends'] = $trends;

    $names = ['Joanna','Michael','Carlo','Pablo','Dorothy','Terry','Peter','Jill','Barney',
              'Emily','Glenda','Kirby','Britney','Dwayne','Benedict','Penelope','William','Steven',
              'George','Angelina','Kathy','Calvin','Nicole','Roberta'];
    $j1 = array_rand($names); $k1 = array_rand($names); while ($k1 == $j1) { $k1 = array_rand($names); }
    $name1 = $names[$j1]; $name2 = $names[$k1];

    $frac1 = hl($numer1 . '/' . $denom1);
    $frac2 = hl($numer2 . '/' . $denom2);

    $qmode = 1;
    $L1 = $L2 = $Lans = '';
    $unit = '';

    if ($q == 1) {
        $places = ["supermarket", "school", "farm", "playground", "grocery store", "church", "park", "zoo", "museum"];
        $place  = $places[array_rand($places)];
        $unit   = "kilometer";
        $newquestion = "$name1 and $name2 need to walk from their house to a $place that's $frac1 kilometer away. If they have already walked $frac2 of this distance, how far are they already from their house?";
        $L1 = "distance to $place"; $L2 = "fraction walked"; $Lans = "actual distance walked";
    } elseif ($q == 2) {
        $objects = ["rope", "string", "tube", "wire", "cord", "cable", "ribbon"];
        $object  = $objects[array_rand($objects)];
        $unit    = "meter";
        if ($numer2 == 1) {
            $newquestion = "$name1 has a piece of $object that's $frac1 meter long. If $name1 cuts it into " . hl($denom2) . " pieces, how long will each cut piece be?";
        } else {
            $newquestion = "$name1 has a piece of $object that's $frac1 meter long. If $name1 cuts it into " . hl($denom2) . " pieces, how long will " . hl($numer2) . " of the cut pieces be if placed end to end?";
        }
        $L1 = "initial length of the $object"; $L2 = "# of pieces the $object is cut"; $Lans = "length of cut pieces";
    } elseif ($q == 3) {
        $cs = ["glass", "cup", "jug", "pitcher", "bottle", "flask"];
        $c  = $cs[array_rand($cs)];
        $drinks = ["water", "orange juice", "mango juice", "iced tea", "soft drink", "milk", "apple juice"];
        $drink  = $drinks[array_rand($drinks)];
        $verbs  = ["was given a", "was handed a", "received a", "got a"];
        $verb   = $verbs[array_rand($verbs)];
        $unit   = "of a $c";
        $newquestion = "$name1 $verb $c of $drink that's $frac1 full. If $name1 drank $frac2 of the contents of the $c, what fraction of a full $c of $drink did $name1 drink?";
        $L1 = "initial fraction of $drink"; $L2 = "fraction drunk"; $Lans = "fraction of full $c drunk";
    } elseif ($q == 4) {
        $cs = ["bowl", "plate", "saucer", "serving", "platter", "dish"];
        $c  = $cs[array_rand($cs)];
        $foods = ["spaghetti", "noodles", "pasta", "salad", "mixed vegetables", "fruit slices", "nachos"];
        $food  = $foods[array_rand($foods)];
        $verbs = ["ordered a", "bought a", "received a", "got a", "was given a"];
        $verb  = $verbs[array_rand($verbs)];
        $unit  = "of a $c";
        $newquestion = "$name1 $verb whole $c of $food and gave $frac1 of it to $name2. If $name2 only ate $frac2 of this amount, what fraction of a full $c of $food did $name2 eat?";
        $L1 = "amount $name2 got"; $L2 = "fraction eaten"; $Lans = "fraction of full $c eaten";
    } else {
        $cs = ["report", "wall", "house", "car", "roof", "garden", "floor"];
        $c  = $cs[array_rand($cs)];
        $verbs  = ["edit", "paint", "clean", "wax", "repaint", "landscape", "dig", "sweep"];
        $pverbs = ["edited", "painted", "cleaned", "waxed", "repainted", "landscaped", "dug", "swept"];
        $j = array_rand($verbs);
        $verb = $verbs[$j]; $pverb = $pverbs[$j];
        $unit = "of the $c";
        $newquestion = "$name1 needs to $verb a $c but has no time to do it alone. $name2 agreed to $verb $frac1 of the $c. If $name2 has already $pverb $frac2 of this, what fraction of the entire $c has $name2 already $pverb?";
        $L1 = "fraction $name2 promised to $verb"; $L2 = "fraction $name2 finished"; $Lans = "fraction of entire $c $pverb";
    }

    list($ansN, $ansD) = reduce_frac($ansnumer, $ansdenom);
    $answerStr = $ansN . '/' . $ansD;

    // Solution text — x replaces × per encoding fix
    $soln  = "<strong>$L1</strong> = $numer1/$denom1 $unit<br>";
    $soln .= "<strong>$L2</strong> = $numer2/$denom2<br>";
    $soln .= "<strong>$Lans</strong> = $numer1/$denom1 x $numer2/$denom2<br>";
    $soln .= "= ($numer1 x $numer2) / ($denom1 x $denom2) = $ansnumer/$ansdenom";
    if ($ansN != $ansnumer || $ansD != $ansdenom) {
        $soln .= "<br>In lowest terms: <strong style='color:#CC0066;'>$ansN/$ansD</strong> $unit";
    }

    $distractors = make_frac_distractors($ansnumer, $ansdenom, $numer1, $denom1, $numer2, $denom2, 3);
    $allChoices = [$answerStr];
    foreach ($distractors as $d) $allChoices[] = $d[0] . '/' . $d[1];
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4 && $d <= 30) {
        foreach ([[$ansnumer + $d, $ansdenom], [$ansnumer, $ansdenom + $d]] as $c) {
            $r = reduce_frac($c[0], $c[1]);
            $s = $r[0] . '/' . $r[1];
            if (!in_array($s, $allChoices, true)) {
                $allChoices[] = $s;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $newquestion,
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
    'top_banner'    => $base . '/math/images/images/wquiz-14-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-14-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-14-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-14-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-14-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-14-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .hl-num { color:#CC0066; font-weight:700; }
  /* §A per-module 2×2 grid — long fractions (13/225) wrap 3+1 at maxLen >= 5. */
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