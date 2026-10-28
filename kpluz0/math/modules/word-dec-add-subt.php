<?php
// math/modules/word-dec-add-subt.php
// PROCEDURAL decimal ± word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcoded $_SESSION['level']="Easy" and had no
// level radios. All 3 question types are level-independent.
//
// Answer formatting:
//   Types 1, 3 (money) &#8594; fmt_dec (2 decimals)
//   Type 2 (distance)  &#8594; fmt_raw (strip trailing zeros)
//
// Distractors: tight 15% band around answer (see make_subt_distractors).
// Fixes outlier case where raw operands ($num1, $num2, $num3) appeared as
// choices — those can be 50%+ off the answer for money problems where the
// answer is a combination of three large operands. Meaningful wrong-operation
// candidates are included so the pool has natural mistakes when in-band.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-dec-add-subt.php'

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

$moduleTitle = 'Word Problems on Decimal Number<br/>Addition and Subtraction';
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
// Raw operands ($num1, $num2, $num3) are passed through the candidate list
// but the band filter drops any that fall outside ±15% — fixing the outlier
// case where e.g. $num1=$15000 appears as a choice when answer is $8000.
// Meaningful "wrong-operation" variants (added all, subtracted both, etc.)
// are included so in-band candidates feel natural, not just ±N deltas.
// ============================================================
function make_subt_distractors($ansVal, $candidates, $formatter, $n = 3) {
    $ansStr = $formatter($ansVal);
    $seen = [$ansStr => true];
    $out = [];

    $band = max(0.5, abs($ansVal) * 0.15);

    $absUnit = (abs($ansVal) > 0)
        ? pow(10, floor(log10(abs($ansVal))) - 1)
        : 0.1;
    $absUnit = max(0.01, $absUnit);

    $cands = [];
    foreach ([1, 2, 3, 5, 10, 15, 25, 50] as $m) {
        $cands[] = $ansVal + $m * $absUnit;
        $cands[] = $ansVal - $m * $absUnit;
    }
    foreach ([0.03, 0.05, 0.08, 0.10, 0.12] as $pct) {
        $cands[] = $ansVal * (1 + $pct);
        $cands[] = $ansVal * (1 - $pct);
    }
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
    $boys  = ["Al","Ben","Carlo","Daniel","Diego","Gabriel","Isaac","Jaime","Jose","Juan","Jonathan","Lito","Mario","Roberto","Samuel","Tommy"];
    $girls = ["Annie","Betty","Caring","Elisa","Emma","Eva","Evelyn","Grace","Josie","Julie","Katring","Laura","Lydia","Maring","Olive","Tina","Toyang"];
    $boy   = $boys[array_rand($boys)];
    $girl  = $girls[array_rand($girls)];
    if (rand(1, 2) == 1) { $name = $girl; $p1 = 'she'; $p2 = 'her'; }
    else                 { $name = $boy;  $p1 = 'he';  $p2 = 'his'; }

    $qopt = rand(1, 3);
    $extraCandidates = [];
    $formatter = 'fmt_dec';

    if ($qopt == 1) {
        do {
            $num1 = number_format((rand(2999, 19999) * 0.05), 2, '.', '');
            $num2 = number_format((rand(4000, 10000) * 0.05), 2, '.', '');
            $num3 = number_format((rand(1999, 12999) * 0.05), 2, '.', '');
            $ans  = number_format($num1 - $num2 + $num3, 2, '.', '');
        } while ($ans < 20);
        $item = (rand(1, 2) == 1) ? ['book','dress','pen','wallet','bag'] : ['ball','shirt','backpack','jacket','cap'];
        $chosenItem = $item[array_rand($item)];
        $prompt = "$name initially had P$num1. " . ucfirst($p1) . " bought a $chosenItem for P$num2. " . ($p1 === 'she' ? 'Her mother' : 'His father') . " then gave $p2 P$num3. How much money does $name now have?";
        $soln  = "$name's money = P$num1 - P$num2 + P$num3<br>";
        $soln .= "<strong>= P" . fmt_dec($num1 - $num2 + $num3) . "</strong>";
        $formatter = 'fmt_dec';
        $answerVal = (float)$num1 - (float)$num2 + (float)$num3;
        // Meaningful wrong-operation candidates
        $extraCandidates = [
            (float)$num1 + (float)$num2 + (float)$num3,   // added all
            (float)$num1 - (float)$num2 - (float)$num3,   // subtracted both
            (float)$num1 + (float)$num2 - (float)$num3,   // wrong sign on num2
            (float)$num3 - (float)$num1 + (float)$num2,   // mixed
            (float)$num1, (float)$num2, (float)$num3,
        ];
        $unit = 'pesos';
    }
    elseif ($qopt == 2) {
        do {
            $num1 = rand(1011, 2999) * 0.001;
            $num2 = rand(1011, 2999) * 0.001;
            $num3 = rand(1011, 1999) * 0.001;
            $ans  = $num1 + $num2 - $num3;
        } while ($ans < 0.2);
        if (rand(1, 2) == 1) {
            $prompt = "$name walked for " . fmt_raw($num1) . " kilometers and ran for " . fmt_raw($num2) . " kilometers along a straight path. " . ucfirst($p1) . " then turned around and walked back " . fmt_raw($num3) . " kilometers, tracing exactly the same path in reverse. How far would $name be from $p2 starting point?";
        } else {
            $prompt = "A bird walked for " . fmt_raw($num1) . " kilometers and flew for " . fmt_raw($num2) . " kilometers along a straight path. It then turned around and flew back " . fmt_raw($num3) . " kilometers, tracing exactly the same path in reverse. How far would the bird be from its starting point?";
        }
        $soln = "Distance = " . fmt_raw($num1) . " + " . fmt_raw($num2) . " - " . fmt_raw($num3) . " = <strong>" . fmt_raw($ans) . " km</strong>";
        $formatter = 'fmt_raw';
        $answerVal = $ans;
        // Forgot to turn back, went forward more, mixed signs
        $extraCandidates = [
            $num1 + $num2,                 // forgot to turn back
            $num1 + $num2 + $num3,         // went forward instead of back
            $num1 - $num2 - $num3,         // wrong signs
            $num1, $num2, $num3,
        ];
        $unit = 'kilometers';
    }
    else {
        do {
            $num1 = number_format((rand(2999, 19999) * 0.05), 2, '.', '');
            $num2 = number_format((rand(2999, 19999) * 0.05), 2, '.', '');
            $num3 = number_format((rand(4000, 10000) * 0.05), 2, '.', '');
            $ans  = number_format($num1 + $num2 - $num3, 2, '.', '');
        } while ($ans < 20);
        $foods = ["a box of pizza", "a large burger", "a box of doughnuts", "some pasta", "a bag of snacks"];
        $food  = $foods[array_rand($foods)];
        $prompt = "$name had P$num1 in $p2 wallet and P$num2 in $p2 coin purse. If $p1 bought $food for P$num3, how much money would $name have left?";
        $soln  = "$name's money = P$num1 + P$num2 - P$num3<br>";
        $soln .= "<strong>= P" . fmt_dec($num1 + $num2 - $num3) . "</strong>";
        $formatter = 'fmt_dec';
        $answerVal = (float)$num1 + (float)$num2 - (float)$num3;
        // Forgot to subtract, added all, subtracted both
        $extraCandidates = [
            (float)$num1 + (float)$num2,                  // forgot to subtract
            (float)$num1 + (float)$num2 + (float)$num3,   // added all
            (float)$num1 - (float)$num2 - (float)$num3,   // subtracted both
            (float)$num3 - (float)$num1 - (float)$num2,   // wrong signs
            (float)$num1, (float)$num2, (float)$num3,
        ];
        $unit = 'pesos';
    }

    $answerStr = $formatter($answerVal);
    $distractors = make_subt_distractors($answerVal, $extraCandidates, $formatter, 3);

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