<?php
// math/modules/word-circle.php
// PROCEDURAL circle word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcoded $_SESSION['level']="Easy" with no
// level radios. Collapsed to single-level — $_SESSION['level'] not touched.
//
// 3 question types × 3 sub-variants each, preserved from legacy:
//   Type 1: circumference from diameter (qnum 3 adds +2 to diameter for cover)
//   Type 2: diameter from circumference (qnum 3 asks for radius)
//   Type 3: area from radius (qnum 3 gives radius directly)
//
// Distractors: tight 15% band (see make_circle_distractors). Fixes outlier
// case where structurally-wrong answers (area instead of circumference,
// radius instead of diameter) appeared as choices when they happened to be
// numerically far. Meaningful wrong-operation candidates stay in-band.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-circle.php'

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

$moduleTitle = 'Word Problems Involving Circles';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

function fmt_circle($v) {
    $v = round((float)$v, 2);
    if (abs($v - round($v)) < 0.005) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 2, '.', ''), '0'), '.');
}

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

// ============================================================
// Distractor builder — tight 15% band around answer.
// ============================================================
function make_circle_distractors($ans, $candidates, $n = 3) {
    $ans = round((float)$ans, 2);
    $ansStr = fmt_circle($ans);
    $seen = [$ansStr => true];
    $out = [];

    $band = max(1, abs($ans) * 0.15);
    $absUnit = max(0.1, pow(10, floor(log10(max(0.1, abs($ans)))) - 1));

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
        $cs = fmt_circle($c);
        if (isset($seen[$cs])) continue;
        $seen[$cs] = true;
        $out[] = $cs;
        if (count($out) >= $n) break;
    }
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d * $absUnit, $ans - $d * $absUnit] as $c) {
            if ($c <= 0) continue;
            $cs = fmt_circle($c);
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
    $boy   = $boys[array_rand($boys)];
    $girl  = $girls[array_rand($girls)];
    if (rand(1, 2) == 1) { $name = $girl; $p1 = 'she'; $p2 = 'her'; }
    else                 { $name = $boy;  $p1 = 'he';  $p2 = 'his'; }

    $qopt = rand(1, 3);
    $extra = [];

    if ($qopt == 1) {
        // Circumference from diameter
        $d = rand(61, 180) * 0.1;
        $ans = 3.14 * $d;
        $qnum = rand(1, 3);
        $unit = 'inches';
        if ($qnum == 1) {
            $prompt = hl($name) . ' baked a ' . hl($d) . '-inch pizza pie. What was the circumference of the pie?';
            $soln  = "diameter = $d inches<br>";
            $soln .= "circumference = pi x diameter = 3.14 x $d = <strong>" . fmt_circle($ans) . " inches</strong>";
            $extra = [3.14 * ($d + 1), 3.14 * ($d - 1), 3.14 * ($d + 2), 3.14 * ($d - 2), 3.14 * $d * 1.05, 3.14 * $d * 0.95];
        } elseif ($qnum == 2) {
            $prompt = hl($name) . ' had a piece of string. If the biggest circle ' . $p1 . ' could form with it had a diameter of ' . hl($d) . ' inches, how long was the string?';
            $soln  = "diameter = $d inches<br>";
            $soln .= "string length = circle's circumference = pi x d = <strong>" . fmt_circle($ans) . " inches</strong>";
            $extra = [3.14 * ($d + 1), 3.14 * ($d - 1), 3.14 * $d * 1.05, 3.14 * $d * 0.95, $d * 2];
        } else {
            $ans = 3.14 * ($d + 2);
            $prompt = hl($name) . ' wanted to cover a hole that had a diameter of ' . hl($d) . ' inches. If the cover should go beyond the edge of the hole anywhere by at least one inch, what should the circumference of the cover be?';
            $soln  = "diameter of cover = $d + 2 = " . ($d + 2) . " inches<br>";
            $soln .= "circumference = 3.14 x " . ($d + 2) . " = <strong>" . fmt_circle($ans) . " inches</strong>";
            $extra = [3.14 * ($d + 1), 3.14 * ($d + 3), 3.14 * ($d + 4), 3.14 * $d, $ans * 1.05, $ans * 0.95];
        }
    } elseif ($qopt == 2) {
        // Diameter (or radius) from circumference
        $c = rand(61, 180) * 0.1;
        $d = $c / 3.14;
        $ans = $d;
        $qnum = rand(1, 3);
        $unit = 'inches';
        if ($qnum == 1) {
            $prompt = hl($name) . ' baked a pizza pie that measures ' . hl(fmt_circle($c)) . ' inches all around its edge. What was the diameter of the pie?';
            $soln  = "circumference = $c inches<br>";
            $soln .= "diameter = circumference / pi = $c / 3.14 = <strong>" . fmt_circle($ans) . " inches</strong>";
            $extra = [$c / 3.14 * 1.05, $c / 3.14 * 0.95, $c / 3.14 + 1, $c / 3.14 - 1, $c / (2 * 3.14)];
        } elseif ($qnum == 2) {
            $prompt = hl($name) . ' had a piece of wire that is ' . hl(fmt_circle($c)) . ' inches long. What would be the diameter of the biggest circle ' . $p1 . ' could form with it?';
            $soln  = "circumference = $c inches<br>";
            $soln .= "diameter = $c / 3.14 = <strong>" . fmt_circle($ans) . " inches</strong>";
            $extra = [$c / 3.14 * 1.05, $c / 3.14 * 0.95, $c / 3.14 + 1, $c / 3.14 - 1, $c / (2 * 3.14)];
        } else {
            $unit = 'feet';
            $ans = $d / 2;
            $prompt = 'A dog is tied to a post with a leash. If the largest circular path that the dog can have is ' . hl(fmt_circle($c)) . ' feet long, how long is the leash?';
            $soln  = "circumference = $c feet<br>";
            $soln .= "diameter = $c / 3.14 = " . fmt_circle($d) . " feet<br>";
            $soln .= "radius (leash) = diameter / 2 = <strong>" . fmt_circle($ans) . " feet</strong>";
            $extra = [$d / 2 * 1.05, $d / 2 * 0.95, $d / 2 + 1, $d / 2 - 1, $d];
        }
    } else {
        // Area from radius
        $r = rand(20, 100) * 0.1;
        $d = $r * 2;
        $ans = 3.14 * $r * $r;
        $qnum = rand(1, 3);
        $unit = 'sq meters';
        if ($qnum == 1) {
            $prompt = 'A meteorite created a circular crater that was ' . hl($d) . ' meters across upon hitting the surface of Earth. What was the area of the crater?';
            $soln  = "diameter = $d meters, radius = $d / 2 = $r meters<br>";
            $soln .= "area = pi x r x r = 3.14 x $r x $r = <strong>" . fmt_circle($ans) . " sq meters</strong>";
            $extra = [3.14 * $r, 3.14 * $d, 3.14 * $d * $d, 2 * 3.14 * $r, $ans * 1.05, $ans * 0.95];
        } elseif ($qnum == 2) {
            $prompt = hl($name) . ' built a circular fish pond that was ' . hl($d) . ' meters across. What would the area of its water surface be?';
            $soln  = "diameter = $d meters, radius = $r meters<br>";
            $soln .= "area = 3.14 x $r x $r = <strong>" . fmt_circle($ans) . " sq meters</strong>";
            $extra = [3.14 * $r, 3.14 * $d, 3.14 * $d * $d, 2 * 3.14 * $r, $ans * 1.05, $ans * 0.95];
        } else {
            $unit = 'sq feet';
            $prompt = 'A dog was tied to a post with a leash that was ' . hl($r) . ' feet long. How big was the area that the dog could wander in?';
            $soln  = "radius = $r feet<br>";
            $soln .= "area = 3.14 x $r x $r = <strong>" . fmt_circle($ans) . " sq feet</strong>";
            $extra = [3.14 * $r, 3.14 * $d, 3.14 * $d * $d, 2 * 3.14 * $r, $ans * 1.05, $ans * 0.95];
        }
    }

    $answerStr = fmt_circle($ans);
    $distractors = make_circle_distractors($ans, $extra, 3);

    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $absUnitPad = max(0.1, pow(10, floor(log10(max(0.1, abs($ans)))) - 1));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 100) {
        foreach ([$ans + $pad * $absUnitPad, $ans - $pad * $absUnitPad] as $c) {
            if ($c <= 0) continue;
            $cs = fmt_circle($c);
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