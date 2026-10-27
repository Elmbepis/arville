<?php
// math/modules/negative.php
// PROCEDURAL integer arithmetic with negatives. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels merged per §E:
//   Easy = q1 (a-b) and q2 (a+b) — basic +/- with negatives
//   Hard = q3-q8 (multiplication, division, parentheses)
//          grd 5 Hard: q3, q4 (mul, div)
//          grd 6+ Hard: q3-q8 (adds two-level parentheses per legacy)
//
// §H bug fixes:
//   • $grd was referenced everywhere but never assigned &#8594; all numlimits
//     undefined &#8594; rand() fails silently. Fixed: $_SESSION['grade'] ?? 5,
//     clamped to 5-6 (legacy only supports 5 & 6).
//   • Division symbol was an <img src='images/division-symbol.jpg'>. Replaced
//     with &divide; entity per user encoding preference.
//
// Feedback: no solution display (per user request). $soln is still computed
// and stored in session — re-add the solution <div> in the feedback block
// to re-enable it.
//
// Theme: test09-* (136/547/117) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1 default (test09-score.jpg is embedded in the legacy
//            frame, not a standard 114×85 / 114×60 pair).
// DB row required: modules.url = 'negative.php'

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

$moduleTitle = 'Positive and Negative Integers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(5, (int)($_SESSION['grade'] ?? 5)));  // §H fix

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

// Format an operand with parens when negative (cleaner display)
function disp($n) {
    $n = (int)$n;
    return ($n < 0) ? '(-' . abs($n) . ')' : (string)$n;
}

function make_neg_distractors($ans, $extra, $n = 3) {
    $seen = [(string)(int)$ans => true];
    $out  = [];
    $base = [
        $ans + 1, $ans - 1, $ans + 2, $ans - 2, $ans + 10, $ans - 10,
        -$ans, 0,
    ];
    shuffle($extra);
    foreach (array_merge($extra, $base) as $c) {
        $c = (int)$c;
        if (!isset($seen[(string)$c]) && count($out) < $n) {
            $seen[(string)$c] = true;
            $out[] = $c;
        }
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
    // Number ranges per grade (legacy supports grades 5 & 6)
    if ($grd == 5) {
        $numlimit1 = 19; $numlimit2 = 149; $numlimit3 = 6; $numlimit4 = 29;
    } else { // grd == 6 (clamped)
        $numlimit1 = 499; $numlimit2 = 4999; $numlimit3 = 8; $numlimit4 = 39;
    }
    if ($lvl === 'Easy') {
        if ($grd == 5) { $numlimit1 = 5;   $numlimit2 = 49;   $numlimit3 = 2; $numlimit4 = 12; }
        else           { $numlimit1 = 99;  $numlimit2 = 1199; $numlimit3 = 2; $numlimit4 = 15; }
    }

    // Generate the two large signed integers — at least one must be negative
    $guard = 0;
    do {
        $sign1 = pow(-1, rand(1, 2));
        $sign2 = pow(-1, rand(1, 2));
        $num1 = $sign1 * rand($numlimit1, $numlimit2);
        $num2 = $sign2 * rand($numlimit1, $numlimit2);
        $guard++;
    } while ($num1 > 0 && $num2 > 0 && $guard < 30);

    // The three small integers — distinct, and not all positive
    $sign5 = pow(-1, rand(1, 2));
    $num5 = $sign5 * rand($numlimit3, $numlimit4);
    $guard = 0;
    do {
        $sign3 = pow(-1, rand(1, 2));
        $sign4 = pow(-1, rand(1, 2));
        $num3 = $sign3 * rand($numlimit3, $numlimit4);
        $num4 = $sign4 * rand($numlimit3, $numlimit4);
        $guard++;
    } while ((($num3 > 0 && $num4 > 0) || $num3 == $num4 || $num3 == $num5 || $num4 == $num5) && $guard < 40);

    // Q-type selection per merged Easy/Hard
    if ($lvl === 'Easy') {
        $q = rand(1, 2);
    } else {
        if ($grd == 5)      $q = rand(3, 4);
        else                $q = rand(3, 8);
    }

    $extra = [];
    if ($q == 1) {
        // num1 - num2
        $prompt = hl(disp($num1)) . ' &minus; ' . hl(disp($num2)) . ' = ?';
        $ans    = $num1 - $num2;
        $extra  = [$num1 + $num2, -$ans, $num2 - $num1, $ans + 1];
        $soln   = disp($num1) . ' &minus; ' . disp($num2) . ' = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 2) {
        // num1 + num2
        $prompt = hl(disp($num1)) . ' + ' . hl(disp($num2)) . ' = ?';
        $ans    = $num1 + $num2;
        $extra  = [$num1 - $num2, -$ans, $num2 - $num1, $ans + 1];
        $soln   = disp($num1) . ' + ' . disp($num2) . ' = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 3) {
        // num3 × num4
        $prompt = hl(disp($num3)) . ' &times; ' . hl(disp($num4)) . ' = ?';
        $ans    = $num3 * $num4;
        $extra  = [$num3 + $num4, -$ans, $ans + $num3, $ans + $num4];
        $soln   = disp($num3) . ' &times; ' . disp($num4) . ' = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 4) {
        // (num3 × num4) ÷ num4 = num3
        $prod = $num3 * $num4;
        $prompt = hl(disp($prod)) . ' &divide; ' . hl(disp($num4)) . ' = ?';
        $ans    = $num3;
        $extra  = [$prod, $num4, $num3 + $num4, $num3 - $num4];
        $soln   = disp($prod) . ' &divide; ' . disp($num4) . ' = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 5) {
        // num3 + (num4 - num5)
        $prompt = hl(disp($num3)) . ' + (' . hl(disp($num4)) . ' &minus; ' . hl(disp($num5)) . ') = ?';
        $ans    = $num3 + ($num4 - $num5);
        $extra  = [$num3 + $num4 + $num5, $num3 - ($num4 - $num5), $num3 - $num4 + $num5, $ans + 1];
        $soln   = disp($num3) . ' + (' . disp($num4) . ' &minus; ' . disp($num5) . ')<br>';
        $soln  .= '= ' . disp($num3) . ' + ' . ($num4 - $num5) . ' = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 6) {
        // num3 × (num4 - num5)
        $prompt = hl(disp($num3)) . ' &times; (' . hl(disp($num4)) . ' &minus; ' . hl(disp($num5)) . ') = ?';
        $ans    = $num3 * ($num4 - $num5);
        $extra  = [$num3 * $num4 - $num5, $num3 * ($num4 + $num5), $num3 * $num4, $ans + 1];
        $soln   = disp($num3) . ' &times; (' . disp($num4) . ' &minus; ' . disp($num5) . ')<br>';
        $soln  .= '= ' . disp($num3) . ' &times; ' . ($num4 - $num5) . ' = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 7) {
        // num3 - (num4 - num5)
        $prompt = hl(disp($num3)) . ' &minus; (' . hl(disp($num4)) . ' &minus; ' . hl(disp($num5)) . ') = ?';
        $ans    = $num3 - ($num4 - $num5);
        $extra  = [$num3 - $num4 - $num5, $num3 + $num4 - $num5, $num3 - $num4, $ans + 1];
        $soln   = disp($num3) . ' &minus; (' . disp($num4) . ' &minus; ' . disp($num5) . ')<br>';
        $soln  .= '= ' . disp($num3) . ' &minus; ' . ($num4 - $num5) . ' = <strong>' . $ans . '</strong>';
    }
    else { // q == 8
        // (num3 × (num4 + num5)) ÷ (num4 + num5) = num3
        $sum  = $num4 + $num5;
        $prod = $num3 * $sum;
        $prompt = hl(disp($prod)) . ' &divide; (' . hl(disp($num4)) . ' + ' . hl(disp($num5)) . ') = ?';
        $ans    = $num3;
        $extra  = [$prod, $sum, $num3 + $num4 + $num5, $num3 * $num4];
        $soln   = disp($prod) . ' &divide; (' . disp($num4) . ' + ' . disp($num5) . ')<br>';
        $soln  .= '= ' . disp($prod) . ' &divide; ' . disp($sum) . ' = <strong>' . $ans . '</strong>';
    }

    $answerStr = (string)(int)$ans;
    $distractors = make_neg_distractors($ans, $extra, 3);
    $allChoices = array_map(function($c) { return (string)(int)$c; }, array_merge([$ans], $distractors));
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4) {
        foreach ([$ans + $d, $ans - $d, -$ans + $d] as $c) {
            $c = (int)$c;
            if (!in_array((string)$c, $allChoices, true)) {
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
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
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
    <p style="font-size:22pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.5;">
        <?php echo $cur['prompt']; ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:22pt; font-weight:700; color:#800080; margin-top:40px; letter-spacing:1px;">
        <?php echo $q['prompt']; ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:20px;">Click on your answer.</p>
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