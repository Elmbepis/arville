<?php
// math/modules/word-dec-mult-div.php
// PROCEDURAL decimal × ÷ word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcoded $_SESSION['level']="Easy" and had no
// level radios in the HTML. All 8 question types are level-independent.
// Collapsed to single-level — $_SESSION['level'] is not touched.
//
// Answer formatting:
//   Types 1, 3, 6 &#8594; fmt_raw (strip trailing zeros, e.g. "3.5", "12.6")
//   Types 2, 4, 5, 7, 8 &#8594; fmt_dec (2 decimals, e.g. "109.45", "135.70")
//
// Distractors: tight 15% band around answer (see make_dec_distractors).
// Fixes outlier case where raw operands ($num1, $num2) appeared as choices.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-dec-mult-div.php'

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

$moduleTitle = 'Word Problems on Decimal Number<br/>Multiplication and Division';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

function fmt_raw($v) {
    $v = round((float)$v, 6);
    if (abs($v - round($v)) < 1e-9) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 6, '.', ''), '0'), '.');
}

function fmt_dec($v) {
    return number_format(round((float)$v, 2), 2, '.', '');
}

// ============================================================
// Distractor builder — all choices within ~15% of the answer.
// Fixes outlier case: raw operands ($num1, $num2) were previously included
// as choices and could be 3-10x the correct answer, defeating MCQ purpose.
// Band floor of 0.5 handles small km-scale answers (~0.5-3 km).
// ============================================================
function make_dec_distractors($ansVal, $candidates, $formatter, $n = 3) {
    $ansStr = $formatter($ansVal);
    $seen = [$ansStr => true];
    $out = [];

    $band = max(0.5, abs($ansVal) * 0.15);

    // Scale-appropriate absolute slip unit
    $absUnit = (abs($ansVal) > 0)
        ? pow(10, floor(log10(abs($ansVal))) - 1)
        : 0.1;
    $absUnit = max(0.01, $absUnit);

    $cands = [];
    // Absolute slips scaled to answer magnitude
    foreach ([1, 2, 3, 5, 10, 15, 25, 50] as $m) {
        $cands[] = $ansVal + $m * $absUnit;
        $cands[] = $ansVal - $m * $absUnit;
    }
    // Percentage shifts
    foreach ([0.03, 0.05, 0.08, 0.10, 0.12] as $pct) {
        $cands[] = $ansVal * (1 + $pct);
        $cands[] = $ansVal * (1 - $pct);
    }
    // Pass-through candidates (filtered by band)
    foreach ($candidates as $c) $cands[] = $c;

    shuffle($cands);
    foreach ($cands as $c) {
        $c = (float)$c;
        if ($c <= 0) continue;
        if (abs($c - $ansVal) > $band) continue;
        $cs = $formatter($c);
        if (isset($seen[$cs])) continue;
        $seen[$cs] = true;
        $out[] = $cs;
        if (count($out) >= $n) break;
    }
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ansVal + $d * $absUnit, $ansVal - $d * $absUnit] as $c) {
            if ($c <= 0) continue;
            $cs = $formatter($c);
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
    $boys  = ["Arthur","Ben","Carlo","Daniel","Diego","Gabriel","Isaac","Jaime","Jose","Juan","Jonathan","Lito","Mario","Roberto","Samuel","Tommy"];
    $girls = ["Annie","Betty","Caring","Elisa","Emma","Eva","Evelyn","Grace","Josie","Julie","Katring","Laura","Lydia","Maring","Olive","Tina","Toyang"];
    $boy   = $boys[array_rand($boys)];
    $girl  = $girls[array_rand($girls)];
    if (rand(1, 2) == 1) { $name = $girl; $p1 = 'she'; $p2 = 'her'; }
    else                 { $name = $boy;  $p1 = 'he';  $p2 = 'his'; }

    $qopt = rand(1, 8);
    $formatter = 'fmt_raw';
    $extraCandidates = [];
    $unit = '';

    if ($qopt == 1) {
        do {
            $ans   = rand(55, 199) * 0.1;
            $num2  = rand(101, 299) * 0.1;
            $num1  = $ans * $num2;
        } while ($ans <= 1);
        $qnum = rand(1, 2);
        if ($qnum == 1) {
            $unit = "kilometers/day";
            $prompt = "$name ran " . fmt_raw($num1) . " kilometers in " . fmt_raw($num2) . " days. On the average, how many kilometers did $p1 run per day?";
            $soln = "Average per day = " . fmt_raw($num1) . " km / " . fmt_raw($num2) . " days = <strong>" . fmt_raw($ans) . " km/day</strong>";
        } else {
            $unit = "kilos of corn/day";
            $prompt = "$name sold " . fmt_raw($num1) . " kilos of corn in " . fmt_raw($num2) . " days. On the average, how many kilos of corn did $p1 sell per day?";
            $soln = "Average per day = " . fmt_raw($num1) . " kg / " . fmt_raw($num2) . " days = <strong>" . fmt_raw($ans) . " kg/day</strong>";
        }
        $formatter = 'fmt_raw';
        $extraCandidates = [$num1 + $num2, $num1 - $num2, $num2 * 2, $ans + 1, $ans - 1];
    }
    elseif ($qopt == 2) {
        do {
            $num1 = rand(500, 1000) * 0.1;
            $num2 = number_format((rand(4800, 8000) * 0.1), 2, '.', '');
            $ans  = $num1 * $num2;
        } while ($ans <= 1);
        if (rand(1, 2) == 1) { $fluid = 'alcohol'; $unit2 = 'liter'; }
        else                 { $fluid = 'gasoline'; $unit2 = 'gallon'; }
        $unit = 'pesos';
        $prompt = "A tank can contain " . fmt_raw($num1) . " {$unit2}s of liquid. If each $unit2 of $fluid costs P" . $num2 . ", how much would it cost to fill the tank with $fluid?";
        $soln = "Cost = P" . $num2 . "/$unit2 x " . fmt_raw($num1) . " {$unit2}s = <strong>P" . fmt_dec($num1 * $num2) . "</strong>";
        $formatter = 'fmt_dec';
        $extraCandidates = [$num1 + $num2, $num1 - $num2, $num1 * 2, $ans * 0.9, $ans * 1.1];
    }
    elseif ($qopt == 3) {
        do {
            $num1 = rand(250, 480) * 0.1;
            $num2 = rand(40, 90) * 0.01;
            $ans  = $num1 * $num2;
        } while ($ans <= 1);
        $unit = 'kilometers';
        $prompt = "In a marathon, $boy ran " . fmt_raw($num1) . " kilometers while $girl only ran " . fmt_raw($num2) . " of this distance. How many kilometers did $girl run?";
        $soln = "Distance = " . fmt_raw($num1) . " km x " . fmt_raw($num2) . " = <strong>" . fmt_raw($ans) . " km</strong>";
        $formatter = 'fmt_raw';
        $extraCandidates = [$num1 + $num2, $num1 - $num2, $num1 * 0.1, $ans * 2, $ans / 2];
    }
    elseif ($qopt == 4) {
        do {
            $num1 = number_format((rand(1200, 1700) * 0.1), 2, '.', '');
            $num2 = rand(15, 99) * 0.1;
            $ans  = $num1 * $num2;
        } while ($ans <= 1);
        $items = ["tilapia", "catfish", "milkfish", "mudfish", "squid"];
        $item  = $items[array_rand($items)];
        $unit  = 'pesos';
        $prompt = "A kilo of $item costs P$num1. How much would " . fmt_raw($num2) . " kilos of $item cost?";
        $soln = "Cost = P$num1/kilo x " . fmt_raw($num2) . " kilos = <strong>P" . fmt_dec($num1 * $num2) . "</strong>";
        $formatter = 'fmt_dec';
        $extraCandidates = [$num1 + $num2, $num1 - $num2, $num1 * 2, $ans * 0.9, $ans * 1.1];
    }
    elseif ($qopt == 5) {
        do {
            $ans  = number_format((rand(1200, 1700) * 0.1), 2, '.', '');
            $num2 = rand(15, 99) * 0.1;
            $num1 = $ans * $num2;
        } while ($ans <= 1);
        $items = ["pork", "chicken", "catfish", "squid", "celery", "ampalaya", "broccoli"];
        $item  = $items[array_rand($items)];
        $unit  = 'pesos per kilo';
        $prompt = "$girl paid P" . fmt_dec($num1) . " for " . fmt_raw($num2) . " kilos of $item. How much did each kilo of $item cost?";
        $soln = "Cost per kilo = P" . fmt_dec($num1) . " / " . fmt_raw($num2) . " kilos = <strong>P" . fmt_dec($num1 / $num2) . "/kilo</strong>";
        $formatter = 'fmt_dec';
        $extraCandidates = [$num1, $num2 * 2, (float)$ans * 0.9, (float)$ans * 1.1];
    }
    elseif ($qopt == 6) {
        do {
            $ans  = rand(50, 100) * 0.5;
            $num2 = rand(15, 99) * 0.1;
            $num1 = $ans * $num2;
        } while ($ans <= 1);
        $items = ["rice", "corn", "dried fish", "potatoes", "onions", "garlic"];
        $item  = $items[array_rand($items)];
        $unit  = 'kilos per sack';
        $prompt = "$name bought " . fmt_raw($num2) . " sacks of $item. If this is " . fmt_raw($num1) . " kilos in weight, how many kilos of $item did one full sack contain?";
        $soln = "Weight per sack = " . fmt_raw($num1) . " kg / " . fmt_raw($num2) . " sacks = <strong>" . fmt_raw($ans) . " kg/sack</strong>";
        $formatter = 'fmt_raw';
        $extraCandidates = [$num1, $num2, $ans + 1, $ans - 1, $ans * 2];
    }
    elseif ($qopt == 7) {
        do {
            $ans  = rand(20000, 90000) * 0.5;
            $num2 = rand(25, 65) * 0.1;
            $num1 = number_format($ans * $num2, 2, '.', '');
        } while ($ans <= 1);
        $unit = 'pesos per month';
        $prompt = "$name earned a total of P" . fmt_dec($num1) . " in " . fmt_raw($num2) . " months. On the average, how much did $p1 earn per month?";
        $soln = "Average = P" . fmt_dec($num1) . " / " . fmt_raw($num2) . " months = <strong>P" . fmt_dec($ans) . "/month</strong>";
        $formatter = 'fmt_dec';
        $extraCandidates = [(float)$ans * 0.9, (float)$ans * 1.1, (float)$ans + 100, (float)$ans - 100, (float)$ans * 1.2];
    }
    else {
        do {
            $num1 = rand(50000, 100000) * 0.5;
            $num2 = rand(13, 18) * 0.05;
            $ans  = $num1 * $num2;
        } while ($ans <= 1);
        $unit = 'pesos per month';
        $prompt = "$girl earns P" . fmt_dec($num1) . " per month. If $boy only earns " . fmt_raw($num2) . " of what $girl earns, how much does $boy earn per month?";
        $soln = "$boy's earnings = P" . fmt_dec($num1) . " x " . fmt_raw($num2) . " = <strong>P" . fmt_dec($ans) . "/month</strong>";
        $formatter = 'fmt_dec';
        $extraCandidates = [$num1, $ans * 0.9, $ans * 1.1, $ans * 2, $ans / 2];
    }

    $answerVal = $ans;
    $answerStr = $formatter($answerVal);
    $distractors = make_dec_distractors($answerVal, $extraCandidates, $formatter, 3);

    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $pad = 1;
    $absUnitPad = max(0.01, pow(10, floor(log10(max(0.01, abs($answerVal)))) - 1));
    while (count($allChoices) < 4 && $pad <= 100) {
        foreach ([$answerVal + $pad * $absUnitPad, $answerVal - $pad * $absUnitPad] as $c) {
            if ($c <= 0) continue;
            $cs = $formatter($c);
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