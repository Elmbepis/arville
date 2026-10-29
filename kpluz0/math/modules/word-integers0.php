<?php
// math/modules/word-integers0.php
// PROCEDURAL integer word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcodes $_SESSION['level']="Easy" with no
// level radios. All 4 question types are level-independent. Collapsed to
// single-level — $_SESSION['level'] not touched.
//
// 4 question types:
//   1. Mountain dive altitude difference (positive answer)
//   2. Chemical heating/cooling (signed answer)
//   3. Helicopter ascents/descents (signed answer)
//   4. Company revenue (signed answer)
//
// Answers can be negative. Distractors: 10% band, integer steps, 4-choice
// guarantee §13.7. Zero excluded as a choice (looks like "no answer").
// Legacy &#8369; (peso) replaced with 'P' per §16.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-integers0.php'

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

$moduleTitle = 'Word Problems Involving Integers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

function fmt_int($v) {
    return (string)(int)round((float)$v);
}

function make_int_distractors($ans, $n = 3) {
    $ans = (int)round((float)$ans);
    $band = max(5, (int)round(abs($ans) * 0.10));
    $step = max(1, (int)round($band / 5));

    $out  = [];
    $seen = [fmt_int($ans) => true];
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d * $step, $ans - $d * $step] as $c) {
            $c = (int)$c;
            if ($c == 0) continue;   // exclude 0 (looks like "no answer")
            $s = fmt_int($c);
            if (isset($seen[$s])) continue;
            $seen[$s] = true;
            $out[] = $s;
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
    if (rand(1, 2) == 1) { $name = $girl; $p1 = 'she'; $p2 = 'her'; }
    else                 { $name = $boy;  $p1 = 'he';  $p2 = 'his'; }

    $qopt = rand(1, 4);
    $soln = '';

    if ($qopt == 1) {
        // Mountain dive altitude difference
        do {
            $num1 = rand(3499, 9999);
            $num2 = rand(249, 999);
            $ans = $num1 + $num2;
        } while ($ans < 20);

        $prompt = "$name went mountain climbing and scuba diving. At the peak of one mountain, $p1 was $num1 feet above sea level. When $p1 dove in a nearby sea, $p1 reached a depth of $num2 feet below sea level. How many feet is the difference in altitude between these two points?";
        $soln = "Mountain peak = +$num1 feet<br>"
              . "Dive depth = -$num2 feet<br>"
              . "Difference = $num1 - (-$num2) = " . ($num1 + $num2) . " feet<br>"
              . "= <strong style='color:#CC0066;'>$ans feet</strong>";
        $unit = 'feet';
    } elseif ($qopt == 2) {
        // Chemical heating/cooling
        do {
            $num1 = rand(12, 95);
            $num2 = rand(49, 499);
            $num3 = rand(49, 499);
            $ans = $num2 - $num1 - $num3;
        } while ($ans < -200);

        $prompt = "A chemical substance was initially at -$num1 deg C when taken out of a freezer. It was then heated, raising its temperature by $num2 deg C. It was then cooled down, lowering its temperature by $num3 deg C. What was its final temperature?";
        $soln = "Final = -$num1 + $num2 - $num3 = <strong style='color:#CC0066;'>$ans deg C</strong>";
        $unit = 'deg C';
    } elseif ($qopt == 3) {
        // Helicopter ascents/descents
        do {
            $num1 = rand(499, 999);
            $num2 = rand(149, 499);
            $num3 = rand(149, 499);
            $num4 = rand(29, 99);
            $ans = $num3 - $num2 - $num4;
        } while ($ans < -200);

        $prompt = "A helicopter took off from point A, which is $num1 feet above sea level. It descended by $num2 feet, ascended by $num3 feet, and then descended again by $num4 feet. Using point A's altitude as the reference or 'zero' point, what is its final altitude?";
        $soln = "Final = -$num2 + $num3 - $num4 = <strong style='color:#CC0066;'>$ans feet</strong> using point A as the 'zero' point";
        $unit = 'feet';
    } else {
        // Company revenue
        do {
            $num1 = rand(149, 499);
            $num2 = rand(149, 499);
            $num3 = rand(349, 799);
            $ans = $num1 + $num2 - $num3;
        } while ($ans < -200);

        $prompt = "For a certain year, a large company earned P{$num1} million and P{$num2} million from its food and retail businesses, respectively. Unfortunately, its technology business lost P{$num3} million that same year. What was its net revenue in millions for that year?";
        $soln = "Net revenue = P{$num1}M + P{$num2}M - P{$num3}M = <strong style='color:#CC0066;'>P$ans million</strong>";
        $unit = 'million pesos';
    }

    $answerStr = fmt_int($ans);
    $distractors = make_int_distractors($ans, 3);
    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4 && $d <= 100) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            $c = (int)$c;
            if ($c == 0) continue;
            $cs = (string)$c;
            if (!in_array($cs, $allChoices, true)) {
                $allChoices[] = $cs;
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
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:520px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
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