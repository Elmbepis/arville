<?php
// math/modules/word-speedist.php
// PROCEDURAL speed/time/distance word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcodes $_SESSION['level']="Easy" and has no
// real level radios in the HTML. All 3 question types are level-independent
// (formula d = s x t). Collapsed to single-level — $_SESSION['level'] untouched.
//
// 3 question types:
//   qopt 1: find average speed (s = d / t)
//   qopt 2: find distance      (d = s x t)
//   qopt 3: find time          (t = d / s)
// Each with 2 sub-variants (person running vs vehicle travelling).
//
// Encoding: uses ASCII 'x' for multiplication. Never '×' (U+00D7), never '÷'
// (U+00F7) — both can render as '?' under windows-1252. Division written as
// ASCII '/' where mathematical.
//
// Distractors: 15% band around answer (min ±0.5). Scale-adaptive step keeps
// distractors in-band. Choice builder ALWAYS returns exactly 4 choices.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-speedist.php'

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

$moduleTitle = 'Word Problems on Speed, Time, and Distance';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

function fmt_spd($v) {
    $v = round((float)$v, 3);
    if (abs($v - round($v)) < 0.0005) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 3, '.', ''), '0'), '.');
}

function make_spd_distractors($ans, $n = 3) {
    $ans = round((float)$ans, 3);
    $band = max(0.5, abs($ans) * 0.15);
    $step = max(0.1, round($band / 5, 2));

    $cands = [];
    for ($i = 1; $i <= 8; $i++) {
        $cands[] = $ans + $i * $step;
        $cands[] = $ans - $i * $step;
    }
    foreach ([0.05, 0.10, 0.12] as $pct) {
        $cands[] = $ans * (1 + $pct);
        $cands[] = $ans * (1 - $pct);
    }

    $out  = [];
    $seen = [fmt_spd($ans) => true];
    shuffle($cands);
    foreach ($cands as $c) {
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;
        $s = fmt_spd($c);
        if (isset($seen[$s])) continue;
        $seen[$s] = true;
        $out[] = $s;
        if (count($out) >= $n) return $out;
    }
    $d = 1;
    while (count($out) < $n && $d <= 50) {
        foreach ([$ans + $d * $step, $ans - $d * $step] as $c) {
            if ($c <= 0) continue;
            $s = fmt_spd($c);
            if (isset($seen[$s])) continue;
            $seen[$s] = true;
            $out[] = $s;
            if (count($out) >= $n) return $out;
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

    $vehicles = ["car", "van", "jeepney", "bus", "truck", "motorcycle"];
    $vehicle  = $vehicles[array_rand($vehicles)];

    $qopt = rand(1, 3);

    if ($qopt == 1) {
        // Find average speed
        $qnum = rand(1, 2);
        $d = rand(180, 300) * 0.1;
        if ($qnum == 2) $d = rand(1200, 2000) * 0.1;
        $t = rand(21, 60) * 0.1;
        $s = round($d / $t, 3);
        $ans = $s;

        if ($qnum == 1) {
            $prompt = "$name ran a total of " . fmt_spd($d) . " kilometers over a period of " . fmt_spd($t) . " hours. What was $p2 average speed during this run?";
        } else {
            $prompt = "A $vehicle travelled a total of " . fmt_spd($d) . " kilometers over a duration of " . fmt_spd($t) . " hours. What was its average speed during this trip?";
        }
        $soln = "distance = " . fmt_spd($d) . " km<br>"
              . "time = " . fmt_spd($t) . " h<br>"
              . "average speed = distance / time<br>"
              . "= " . fmt_spd($d) . " / " . fmt_spd($t) . " = <strong>" . fmt_spd($ans) . " km/h</strong>";
        $unit = 'km/h';
    } elseif ($qopt == 2) {
        // Find distance — was using '×' (U+00D7) which does not render; now 'x'
        $qnum = rand(1, 2);
        $d = rand(180, 300) * 0.1;
        if ($qnum == 2) $d = rand(1200, 2000) * 0.1;
        $t = rand(21, 60) * 0.1;
        $s = round($d / $t, 3);
        $ans = $d;

        if ($qnum == 1) {
            $prompt = "$name ran for " . fmt_spd($t) . " hours at an average speed of " . fmt_spd($s) . " km/h. What was the total distance run by $name?";
        } else {
            $prompt = "A $vehicle travelled for " . fmt_spd($t) . " hours at an average speed of " . fmt_spd($s) . " km/h. How far did the $vehicle travel?";
        }
        $soln = "average speed = " . fmt_spd($s) . " km/h<br>"
              . "time = " . fmt_spd($t) . " h<br>"
              . "distance = average speed x time<br>"
              . "= " . fmt_spd($s) . " x " . fmt_spd($t) . " = <strong>" . fmt_spd($ans) . " km</strong>";
        $unit = 'kilometers';
    } else {
        // Find time
        $qnum = rand(1, 2);
        $d = rand(180, 300) * 0.1;
        if ($qnum == 2) $d = rand(1200, 2000) * 0.1;
        $t = rand(21, 60) * 0.1;
        $s = round($d / $t, 3);
        $ans = $t;

        if ($qnum == 1) {
            $prompt = "$name ran at an average speed of " . fmt_spd($s) . " km/h and covered a distance of " . fmt_spd($d) . " kilometers. How many hours did $p1 run?";
        } else {
            $prompt = "A $vehicle travelled at an average speed of " . fmt_spd($s) . " km/h. If the distance it travelled was " . fmt_spd($d) . " kilometers, how many hours did the $vehicle travel?";
        }
        $soln = "average speed = " . fmt_spd($s) . " km/h<br>"
              . "distance = " . fmt_spd($d) . " km<br>"
              . "time = distance / speed<br>"
              . "= " . fmt_spd($d) . " / " . fmt_spd($s) . " = <strong>" . fmt_spd($ans) . " hours</strong>";
        $unit = 'hours';
    }

    $answerStr = fmt_spd($ans);
    $distractors = make_spd_distractors($ans, 3);
    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4 && $d <= 100) {
        foreach ([fmt_spd($ans + $d * 0.1), fmt_spd($ans - $d * 0.1)] as $c) {
            if ((float)$c <= 0) continue;
            if (!in_array($c, $allChoices, true)) {
                $allChoices[] = $c;
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
        <span style="color:#666; font-size:12pt;"><?php echo htmlspecialchars($cur['unit']); ?></span>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        <?php echo htmlspecialchars($cur['prompt']); ?>
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
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.55;">
        <?php echo htmlspecialchars($q['prompt']); ?>
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