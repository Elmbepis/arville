<?php
// math/modules/word-volume.php
// PROCEDURAL VOLUME WORD PROBLEMS + choice. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Level: SINGLE-LEVEL MODULE. Legacy hardcodes $_SESSION['level']="Easy" with
//        no level radio buttons in the HTML. This module therefore:
//          - does NOT define a $levels array
//          - does NOT render a difficulty selector
//          - does NOT write $_SESSION['level'] (avoids polluting state for
//            multi-level modules the student may visit next)
//        $lvl is fixed to 'Easy' locally for scoring purposes.
//
// $grd bug fix (§H): legacy referenced $grd without assignment &#8594; all qopt
// branches failed silently &#8594; no question ever generated for any grade. Now
// reads $_SESSION['grade'] ?? 4.
//
// Distractors: tight 15% band (see make_vol_distractors). Fixes outlier case
// where structurally-wrong candidates (raw s×s×s value, or /1000 vs
// /1000000 unit-conversion mistakes) appeared as choices when they happened
// to be numerically far — e.g. answer 0.003 cu m next to raw 27000 cu cm.
// Only in-band candidates survive.
//
// Theme: wquiz-15-* (75/655/70). Score box: score-*-1.
// DB row required: modules.url = 'word-volume.php'

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

$moduleTitle = 'Word Problems Involving<br/>Volumes of Solids';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';
$grd         = min(8, max(1, (int)($_SESSION['grade'] ?? 4)));  // §H fix

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function fmt_num($v) {
    $v = (float)$v;
    if (abs($v - round($v)) < 0.0005) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 3, '.', ''), '0'), '.');
}

// ============================================================
// Distractor builder — tight 15% band around answer.
// Previously allowed raw s×s×s, /1000 vs /1000000 mistakes, etc. to appear
// when numerically far from the answer (e.g. answer 0.003 next to 27000).
// Band floor of 0.1 handles small cu-meter answers.
// ============================================================
function make_vol_distractors($ans, $candidates, $n = 3) {
    $ans = round((float)$ans, 6);
    $ansStr = fmt_num($ans);
    $seen = [$ansStr => true];
    $out = [];

    $band = max(0.1, abs($ans) * 0.15);
    $absUnit = (abs($ans) > 0) ? pow(10, floor(log10(abs($ans))) - 1) : 0.1;
    $absUnit = max(0.001, $absUnit);

    $cands = [];
    foreach ([1, 2, 3, 5, 8, 10, 15, 20, 30, 50] as $m) {
        $cands[] = $ans + $m * $absUnit;
        $cands[] = $ans - $m * $absUnit;
    }
    foreach ([0.03, 0.05, 0.08, 0.10, 0.12] as $pct) {
        $cands[] = $ans * (1 + $pct);
        $cands[] = $ans * (1 - $pct);
    }
    foreach ($candidates as $c) $cands[] = $c;

    shuffle($cands);
    foreach ($cands as $c) {
        $c = (float)$c;
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;
        $cs = fmt_num($c);
        if (isset($seen[$cs])) continue;
        $seen[$cs] = true;
        $out[] = $cs;
        if (count($out) >= $n) break;
    }
    $d = 1;
    while (count($out) < $n && $d <= 200) {
        foreach ([$ans + $d * $absUnit, $ans - $d * $absUnit] as $c) {
            if ($c <= 0) continue;
            $cs = fmt_num($c);
            if (isset($seen[$cs])) continue;
            $seen[$cs] = true;
            $out[] = $cs;
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
    $boys  = ["Alfred","Ben","Carlo","Daniel","Diego","Gabriel","Isaac","Jaime","Jose","Juan","Jonathan","Lito","Mario","Roberto","Samuel","Tommy"];
    $girls = ["Annie","Betty","Caring","Elisa","Emma","Eva","Evelyn","Grace","Josie","Julie","Katring","Laura","Lydia","Maring","Olive","Tina","Toyang"];
    $boy  = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];

    if ($grd <= 4)      $qopt = rand(1, 2);
    elseif ($grd == 5)  $qopt = rand(3, 4);
    else                $qopt = rand(3, 6);

    if (rand(1, 2) == 1) { $name = $girl; $p1 = 'she'; $p2 = 'her'; }
    else                 { $name = $boy;  $p1 = 'he';  $p2 = 'his'; }

    $unit = '';
    $soln = '';
    $candidates = [];
    $ans_raw = 0;

    if ($qopt == 1) {
        $qnum = rand(1, 2);
        if ($qnum == 1) {
            $s = rand(45, 95);
            $unit = 'cu meters';
            $objs = ["theater","library","sports arena","municipal hall","hospital"];
            $obj = $objs[array_rand($objs)];
            $prompt = "The " . hl($obj) . " in " . hl($name) . "'s neighborhood is cubic in shape. If each of its sides is " . hl($s) . " meters long, what is its total volume?";
            $ans_raw = $s * $s * $s;
            $soln = "volume of a cube = s x s x s<br>";
            $soln .= "volume of $obj = $s m x $s m x $s m = <strong>$ans_raw cu meters</strong>";
            $candidates = [$s * $s * $s * 1.05, $s * $s * $s * 0.95, $s * $s * $s + 100, $s * $s * $s - 100, $s * $s * $s * 1.1];
        } else {
            $s = rand(6, 12);
            $unit = 'coins';
            $num = rand(2, 8);
            $prompt = hl($boy) . " has a cubic box that measures " . hl($s) . " inches long on each side. He put in it an average of " . hl($num) . " coins per cu inch of the box. How many coins did he put in his box all in all?";
            $ans_raw = $s * $s * $s * $num;
            $soln = "volume of cube = s x s x s = $s x $s x $s = " . ($s * $s * $s) . " cu inches<br>";
            $soln .= "# of coins = " . ($s * $s * $s) . " cu in x $num coins/cu in = <strong>$ans_raw coins</strong>";
            $candidates = [$ans_raw * 1.05, $ans_raw * 0.95, $ans_raw + 10, $ans_raw - 10, $ans_raw * 1.1];
        }
    } elseif ($qopt == 2) {
        $qnum = rand(1, 2);
        if ($qnum == 1) {
            $l = rand(48, 84);
            do { $w = rand(36, 60); } while ($w >= $l);
            do { $h = rand(36, 60); } while ($h >= $l);
            $unit = 'cu inches';
            $objs = ["box","aquarium","tub"];
            $obj = $objs[array_rand($objs)];
            $prompt = hl($boy) . " constructed a rectangular $obj. If the $obj's length is " . hl($l) . " inches, its width is " . hl($w) . " inches, and its height is " . hl($h) . " inches, what is its total volume?";
            $ans_raw = $l * $w * $h;
            $soln = "volume of a rectangular prism = L x W x H<br>";
            $soln .= "volume of $obj = $l in x $w in x $h in = <strong>$ans_raw cu inches</strong>";
            $candidates = [$ans_raw * 1.05, $ans_raw * 0.95, $ans_raw + 100, $ans_raw - 100, $ans_raw * 1.1];
        } else {
            $l = rand(15, 40);
            do { $w = rand(11, 25); } while ($w >= $l);
            $h = rand(2, 4);
            $unit = 'fingerlings';
            $num = rand(50, 100);
            $prompt = hl($name) . " owns a rectangular fish pen that measures " . hl($l) . " m by " . hl($w) . " m by " . hl($h) . " m. If $p1 put an average of " . hl($num) . " fingerlings per cu meter into $p2 fish pen, how many fingerlings did $p1 put in $p2 fish pen all in all?";
            $ans_raw = $l * $w * $h * $num;
            $soln = "volume of a rectangular prism = L x W x H = $l x $w x $h = " . ($l * $w * $h) . " cu meters<br>";
            $soln .= "# of fingerlings = " . ($l * $w * $h) . " cu m x $num fingerlings/cu m = <strong>$ans_raw fingerlings</strong>";
            $candidates = [$ans_raw * 1.05, $ans_raw * 0.95, $ans_raw + 500, $ans_raw - 500, $ans_raw * 1.1];
        }
    } elseif ($qopt == 3) {
        $qnum = rand(1, 2);
        if ($qnum == 1) {
            $s = rand(101, 175);
            $unit = 'cu meters';
            $objs = ["box","tub","container","crate"];
            $obj = $objs[array_rand($objs)];
            $prompt = hl($name) . " bought a cubic $obj, each side of which is " . hl($s) . " centimeters long. What is its total volume in cu meters?";
            $ans_raw = $s * $s * $s / 1000000;
            $soln = "volume of a cube = s x s x s<br>";
            $soln .= "= $s cm x $s cm x $s cm = " . ($s * $s * $s) . " cu cm<br>";
            $soln .= "= " . ($s * $s * $s) . " cu cm x cu m / 1000000 cu cm = <strong>" . fmt_num($ans_raw) . " cu meters</strong>";
            $candidates = [$ans_raw * 1.05, $ans_raw * 0.95, $ans_raw * 2, $ans_raw / 2];
        } else {
            $s = rand(101, 175) * 0.01;
            $unit = 'cu centimeters';
            $objs = ["box","tub","container","crate"];
            $obj = $objs[array_rand($objs)];
            $prompt = hl($name) . " bought a cubic $obj, each side of which is " . hl($s) . " meters long. What is its total volume in cu centimeters?";
            $ans_raw = $s * $s * $s * 1000000;
            $soln = "volume of a cube = s x s x s<br>";
            $soln .= "= $s m x $s m x $s m = " . fmt_num($s * $s * $s) . " cu m<br>";
            $soln .= "= " . fmt_num($s * $s * $s) . " cu m x 1000000 cu cm/cu m = <strong>" . fmt_num($ans_raw) . " cu centimeters</strong>";
            $candidates = [$ans_raw * 1.05, $ans_raw * 0.95, $ans_raw * 2, $ans_raw / 2];
        }
    } elseif ($qopt == 4) {
        $qnum = rand(1, 2);
        if ($qnum == 1) {
            $l = rand(101, 175);
            do { $w = rand(75, 150); } while ($w >= $l);
            do { $h = rand(75, 150); } while ($h >= $l);
            $unit = 'liters';
            $objs = ["box","tub","container","crate"];
            $obj = $objs[array_rand($objs)];
            $prompt = hl($name) . " bought a rectangular $obj that measures " . hl($l) . " cm by " . hl($w) . " cm by " . hl($h) . " cm. What is its total volume in liters?";
            $ans_raw = $l * $w * $h / 1000;
            $soln = "volume = L x W x H<br>";
            $soln .= "= $l cm x $w cm x $h cm = " . ($l * $w * $h) . " cu cm<br>";
            $soln .= "= " . ($l * $w * $h) . " cu cm x liter / 1000 cu cm = <strong>" . fmt_num($ans_raw) . " liters</strong>";
            $candidates = [$ans_raw * 1.05, $ans_raw * 0.95, $ans_raw * 2, $ans_raw / 2];
        } else {
            $l = rand(101, 175) * 0.01;
            do { $w = rand(75, 150) * 0.01; } while ($w >= $l);
            do { $h = rand(75, 150) * 0.01; } while ($h >= $l);
            $unit = 'liters';
            $objs = ["box","tub","container","crate"];
            $obj = $objs[array_rand($objs)];
            $prompt = hl($name) . " bought a rectangular $obj that measures " . hl($l) . " m by " . hl($w) . " m by " . hl($h) . " m. What is its total volume in liters?";
            $ans_raw = $l * $w * $h * 1000;
            $soln = "volume = L x W x H<br>";
            $soln .= "= $l m x $w m x $h m = " . fmt_num($l * $w * $h) . " cu m<br>";
            $soln .= "= " . fmt_num($l * $w * $h) . " cu m x 1000 liters / cu m = <strong>" . fmt_num($ans_raw) . " liters</strong>";
            $candidates = [$ans_raw * 1.05, $ans_raw * 0.95, $ans_raw * 2, $ans_raw / 2];
        }
    } elseif ($qopt == 5) {
        $r = rand(100, 150);
        $d = $r * 2;
        $unit = 'liters';
        $prompt = hl($name) . " bought a spherical water tank that measures " . hl($d) . " cm across. How many liters of water can it contain?";
        $ans_raw = 4.0 / 3.0 * 3.14 * $r * $r * $r / 1000;
        $soln = "volume of a sphere = (4/3) x pi x r x r x r<br>";
        $soln .= "= (4/3) x 3.14 x " . ($d / 2) . "<sup>3</sup><br>";
        $soln .= "= 4.1867 x " . ($r * $r * $r) . " cu cm<br>";
        $soln .= "= " . fmt_num(4.1867 * $r * $r * $r) . " cu cm x liter / 1000 cu cm<br>";
        $soln .= "= <strong>" . fmt_num($ans_raw) . " liters</strong>";
        $candidates = [
            $ans_raw * 1.05, $ans_raw * 0.95,
            $ans_raw * 1.08, $ans_raw * 0.92,
            $ans_raw * 2,
        ];
    } else {
        $r = rand(65, 95);
        $h = rand(120, 180);
        $d = $r * 2;
        $unit = 'liters';
        $prompt = hl($name) . " bought a cylindrical water tank with a diameter of " . hl($d) . " cm and a height of " . hl($h) . " cm. How many liters of water can it contain?";
        $ans_raw = 3.14 * $r * $r * $h / 1000;
        $soln = "volume of a cylinder = pi x r x r x h<br>";
        $soln .= "= 3.14 x " . ($d / 2) . "<sup>2</sup> x $h cm<br>";
        $soln .= "= 3.14 x " . ($r * $r) . " sq cm x $h cm<br>";
        $soln .= "= " . fmt_num(3.14 * $r * $r * $h) . " cu cm x liter / 1000 cu cm<br>";
        $soln .= "= <strong>" . fmt_num($ans_raw) . " liters</strong>";
        $candidates = [
            $ans_raw * 1.05, $ans_raw * 0.95,
            $ans_raw * 1.08, $ans_raw * 0.92,
            $ans_raw * 2,
        ];
    }

    $ansStr = fmt_num($ans_raw);
    $distractors = make_vol_distractors($ans_raw, $candidates, 3);
    $allChoices = array_merge([$ansStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $absUnitPad = max(0.001, pow(10, floor(log10(max(0.001, abs($ans_raw)))) - 1));
    $d = 1;
    while (count($allChoices) < 4) {
        $c = fmt_num($ans_raw + $d * $absUnitPad);
        if (!in_array($c, $allChoices, true)) $allChoices[] = $c;
        $c = fmt_num($ans_raw - $d * $absUnitPad);
        if ((float)$c > 0 && !in_array($c, $allChoices, true)) $allChoices[] = $c;
        $d++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $prompt,
        'answer'   => $ansStr,
        'choices'  => $allChoices,
        'solution' => $soln,
        'unit'     => $unit,
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
render_header($moduleTitle, $moduleTitle, $theme);
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
        <span style="color:#666; font-size:12pt;"><?php echo htmlspecialchars($cur['unit']); ?></span>
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
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer <em>(in <?php echo htmlspecialchars($q['unit']); ?>)</em>.</p>
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

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();