<?php
// math/modules/word-percentage-business.php
// PROCEDURAL business percentage word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels (question-type pools differ by level):
//   Easy   = q1-6   (single-step: commission, tax, discount, interest,
//                    rate-finding, sales-finding)
//   Hard   = q11-14 (Medium: base+rate, tax-inclusive, discount-inclusive,
//                    simple interest over years) + q21-22 (Hard: quota-
//                    adjusted commission, discount+tax combined)
//
// Distractors: tight band around answer (see make_bp_distractors).
// Fixes outlier case where raw $sales / $cost / $ans*2 appeared as choices.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-percentage-business.php'

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

$moduleTitle = 'Word Problems on Percentage<br/>Application in Business';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function fmt_bp($v) {
    $v = round((float)$v, 2);
    if (abs($v - round($v)) < 0.005) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 2, '.', ''), '0'), '.');
}

// ============================================================
// Distractor builder — all choices within ~20% of the answer.
// Wider than word-percentage (business problems have more legitimate
// mistake patterns: forgetting to add tax, forgetting quota, etc., which
// can be 10-15% off the answer). Anything outside the band is an outlier
// and gets dropped.
// ============================================================
function make_bp_distractors($ans, $candidates, $n = 3) {
    $ans = round((float)$ans, 2);
    $seen = [(string)$ans => true];
    $out = [];

    $band = max(5, $ans * 0.20);

    $cands = [];
    // ±% shifts — always scale-appropriate
    foreach ([0.03, 0.05, 0.08, 0.10, 0.12, 0.15, 0.18, 0.20] as $pct) {
        $cands[] = $ans * (1 + $pct);
        $cands[] = $ans * (1 - $pct);
    }
    // Scaled absolute slips (10^(order-of-magnitude - 3))
    $absUnit = max(1, pow(10, max(0, floor(log10(max(1, $ans))) - 3)));
    foreach ([1, 2, 5, 10, 20, 50] as $mult) {
        $cands[] = $ans + $mult * $absUnit;
        $cands[] = $ans - $mult * $absUnit;
    }

    // Pass-through natural candidates (filtered by band below)
    foreach ($candidates as $c) $cands[] = $c;

    shuffle($cands);
    foreach ($cands as $c) {
        $c = round((float)$c, 2);
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;
        $key = (string)$c;
        if (isset($seen[$key])) continue;
        $seen[$key] = true;
        $out[] = $c;
        if (count($out) >= $n) break;
    }

    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d * $absUnit, $ans - $d * $absUnit] as $c) {
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
    $products = ["cabinets", "cars", "desks", "motorcycles"];
    $product  = $products[array_rand($products)];

    $boys  = ["Alex","Ben","Carlos","Daniel","Diego","Gabriel","Isaac","Jaime","Jose","Juan","Jonathan","Lucas","Luis","Max","Roberto","Samuel","Tomas"];
    $girls = ["Annie","Betty","Caring","Elisa","Emma","Eva","Evelyn","Grace","Josie","Julie","Katring","Laura","Lydia","Maring","Olive","Tina","Toyang"];
    $boy   = $boys[array_rand($boys)];
    $girl  = $girls[array_rand($girls)];
    if (rand(1, 2) == 1) { $name = $boy;  $pronoun = 'he';  $ppronoun = 'his'; }
    else                 { $name = $girl; $pronoun = 'she'; $ppronoun = 'her'; }

    if ($lvl === 'Easy') {
        $randques = rand(1, 6);
    } else {
        $pool = [11, 12, 13, 14, 21, 22];
        $randques = $pool[array_rand($pool)];
    }

    $unit = 'pesos';
    $extra = [];

    if ($randques == 1) {
        $commrate = rand(3, 25);
        $sales    = rand(100, 500) * 1000;
        $ans      = $commrate * 0.01 * $sales;
        $prompt   = hl($name) . ' sells ' . $product . ' and earns a commission of ' . hl($commrate . '%') . ' of ' . hl($ppronoun) . ' total sales every month. If ' . $pronoun . ' sold ' . hl($sales) . ' pesos worth of ' . $product . ' this month, how much will ' . $ppronoun . ' commission be this month?';
        $soln     = "Commission = $commrate% x $sales = <strong>" . fmt_bp($ans) . "</strong>";
        $extra    = [$sales, $commrate, $sales + $ans, $sales - $ans, $ans * 2];
    }
    elseif ($randques == 2) {
        $taxrate = rand(3, 15);
        $cost    = rand(100, 500) * 1000;
        $ans     = $taxrate * 0.01 * $cost;
        $prompt  = hl($name) . ' bought some ' . $product . ' for ' . hl($cost) . ' pesos. If the sales tax is ' . hl($taxrate . '%') . ' of the cost, how much sales tax will ' . $pronoun . ' pay?';
        $soln    = "Tax = $taxrate% x $cost = <strong>" . fmt_bp($ans) . "</strong>";
        $extra   = [$cost, $taxrate, $cost + $ans, $cost - $ans, $ans * 2];
    }
    elseif ($randques == 3) {
        $disc = rand(5, 40);
        $cost = rand(100, 500) * 1000;
        $ans  = $disc * 0.01 * $cost;
        $prompt = hl($name) . ' bought some ' . $product . ' for ' . hl($cost) . ' pesos. If ' . $pronoun . ' was given a discount of ' . hl($disc . '%') . ', how much money did ' . $pronoun . ' save?';
        $soln   = "Savings = $disc% x $cost = <strong>" . fmt_bp($ans) . "</strong>";
        $extra  = [$cost, $disc, $cost - $ans, $cost + $ans, $ans * 2];
    }
    elseif ($randques == 4) {
        $int   = rand(3, 16);
        $princ = rand(10, 250) * 1000;
        $ans   = $int * 0.01 * $princ;
        $prompt = hl($name) . ' borrowed ' . hl($princ) . ' pesos from a bank. If the bank charges an annual interest rate of ' . hl($int . '%') . ' for loans, how much interest will ' . hl($name) . ' pay in one year?';
        $soln   = "Interest = $int% x $princ x 1 = <strong>" . fmt_bp($ans) . "</strong>";
        $extra  = [$princ, $int, $princ + $ans, $princ - $ans, $ans * 2];
    }
    elseif ($randques == 5) {
        $ans   = rand(3, 25);
        $sales = rand(100, 500) * 1000;
        $earn  = $ans * 0.01 * $sales;
        $prompt = hl($name) . ' sells ' . $product . ' and earns a commission that is a certain percentage of ' . hl($ppronoun) . ' sales every month. If ' . $pronoun . ' earned ' . hl($earn) . ' pesos in commissions this month after selling ' . hl($sales) . ' pesos worth of ' . $product . ', what was ' . $ppronoun . ' commission rate?';
        $soln   = "Rate = $earn / $sales = <strong>" . fmt_bp($ans) . "%</strong>";
        $unit   = '%';
        $extra  = [$earn, $sales];
    }
    elseif ($randques == 6) {
        $commrate = rand(3, 25);
        $ans      = rand(100, 500) * 1000;
        $earn     = $ans * 0.01 * $commrate;
        $prompt = hl($name) . ' sells ' . $product . ' and earns a commission of ' . hl($commrate . '%') . ' of ' . hl($ppronoun) . ' sales every month. If ' . $pronoun . ' earned ' . hl($earn) . ' pesos in commissions this month, how many pesos worth of ' . $product . ' did ' . $pronoun . ' sell?';
        $soln   = "Sales = $earn / ($commrate%) = <strong>" . fmt_bp($ans) . " pesos</strong>";
        $extra  = [$earn, $commrate];
    }
    elseif ($randques == 11) {
        $salary = rand(10, 50) * 1000;
        $comm   = rand(6, 50) * 0.5;
        $sales  = rand(100, 500) * 1000;
        $ans    = $salary + $comm * 0.01 * $sales;
        $prompt = hl($name) . ' earns a fixed salary of ' . hl($salary) . ' a month plus a commission of ' . hl(fmt_bp($comm) . '%') . ' of ' . hl($ppronoun) . ' total sales for the month. If ' . hl($ppronoun) . ' total sales this month is ' . hl($sales) . ' pesos, how much will ' . $pronoun . ' earn this month?';
        $soln   = "Earnings = $salary + ($comm% x $sales) = <strong>" . fmt_bp($ans) . "</strong>";
        $extra  = [$salary, $salary + $comm * 0.01 * $sales, $comm * 0.01 * $sales];
    }
    elseif ($randques == 12) {
        $tax  = rand(6, 20) * 0.5;
        $cost = rand(100, 500) * 1000;
        $ans  = $cost + $tax * 0.01 * $cost;
        $prompt = hl($name) . ' bought some ' . $product . ' for ' . hl($cost) . ' pesos. If the sales tax is ' . hl(fmt_bp($tax) . '%') . ' of the cost, how much will ' . $pronoun . ' pay including the tax?';
        $soln   = "Total = $cost + ($tax% x $cost) = <strong>" . fmt_bp($ans) . "</strong>";
        $extra  = [$cost, $tax * 0.01 * $cost, $cost - $tax * 0.01 * $cost];
    }
    elseif ($randques == 13) {
        $disc = rand(5, 40);
        $cost = rand(100, 500) * 1000;
        $ans  = $cost - $disc * 0.01 * $cost;
        $prompt = hl($name) . ' bought some ' . $product . ' worth ' . hl($cost) . ' pesos. If ' . $pronoun . ' was given a discount of ' . hl($disc . '%') . ', how much did ' . $pronoun . ' pay for the ' . $product . '?';
        $soln   = "Paid = $cost - ($disc% x $cost) = <strong>" . fmt_bp($ans) . "</strong>";
        $extra  = [$cost, $disc * 0.01 * $cost, $cost + $disc * 0.01 * $cost];
    }
    elseif ($randques == 14) {
        $int   = rand(3, 16);
        $princ = rand(10, 250) * 1000;
        $years = rand(11, 99) * 0.1;
        $ans   = $princ + $int * 0.01 * $princ * $years;
        $prompt = hl($name) . ' borrowed ' . hl($princ) . ' pesos from a bank. If the bank charges a simple interest rate of ' . hl($int . '%') . ' per annum, how much will ' . hl($name) . ' end up paying the bank if ' . $pronoun . ' pays off ' . hl($ppronoun) . ' loan in ' . hl(fmt_bp($years)) . ' years?';
        $soln   = "Total = Principal + Interest<br>= $princ + ($int% x $princ x " . fmt_bp($years) . ")<br>= <strong>" . fmt_bp($ans) . "</strong>";
        $extra  = [$princ, $princ * $int * 0.01 * $years, $princ + $princ * 0.1];
    }
    elseif ($randques == 21) {
        $salary = rand(10, 50) * 1000;
        $comm   = rand(6, 50) * 0.5;
        $sales  = rand(100, 500) * 1000;
        $quota  = rand(40, 100) * 500;
        $ans    = $salary + $comm * 0.01 * ($sales - $quota);
        $prompt = hl($name) . ' has a base salary of ' . hl($salary) . ' a month and earns a commission of ' . hl(fmt_bp($comm) . '%') . ' of ' . hl($ppronoun) . ' total sales beyond ' . hl($ppronoun) . ' monthly sales quota of ' . hl($quota) . ' pesos. If ' . hl($ppronoun) . ' total sales this month is ' . hl($sales) . ' pesos, how much will ' . $pronoun . ' earn this month?';
        $soln   = "Earnings = $salary + ($comm% x ($sales - $quota))<br>= $salary + ($comm% x " . ($sales - $quota) . ")<br>= <strong>" . fmt_bp($ans) . "</strong>";
        $extra  = [$salary, $salary + $comm * 0.01 * $sales, $comm * 0.01 * $sales];
    }
    else {
        $tax   = rand(30, 100) * 0.1;
        $disc  = rand(10, 60) * 0.5;
        $cost  = rand(100, 500) * 1000;
        $dcost = $cost - $cost * $disc * 0.01;
        $ans   = $dcost + $tax * 0.01 * $dcost;
        $prompt = hl($name) . ' bought some ' . $product . ' worth ' . hl($cost) . ' pesos. If ' . $pronoun . ' was given a ' . hl(fmt_bp($disc) . '%') . ' discount and the sales tax is ' . hl(fmt_bp($tax) . '%') . ' of the discounted price, how much will ' . $pronoun . ' pay including the tax?';
        $soln   = "Discounted Price = $cost - ($disc% x $cost)<br>= $cost - " . fmt_bp($cost * $disc * 0.01) . " = " . fmt_bp($dcost) . "<br>";
        $soln  .= "Total = Discounted Price + Tax<br>= " . fmt_bp($dcost) . " + (" . fmt_bp($tax) . "% x " . fmt_bp($dcost) . ")<br>= " . fmt_bp($dcost) . " + " . fmt_bp($dcost * $tax * 0.01) . "<br>= <strong>" . fmt_bp($ans) . "</strong>";
        $extra = [$cost, $dcost, $cost + $cost * $tax * 0.01];
    }

    $answerStr = fmt_bp($ans);
    $distractors = make_bp_distractors($ans, $extra, 3);
    $allChoices = array_merge([$answerStr], array_map('fmt_bp', $distractors));
    $allChoices = array_values(array_unique($allChoices));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 1000) {
        foreach ([$ans + $pad * 100, $ans - $pad * 100] as $c) {
            if ($c <= 0) continue;
            $cs = fmt_bp($c);
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
        <span style="color:#666; font-size:12pt;"><?php echo htmlspecialchars($cur['unit']); ?></span>
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