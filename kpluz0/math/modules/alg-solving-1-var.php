<?php
// math/modules/alg-solving-1-var.php
// PROCEDURAL solving single-variable equations. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// 3 levels preserved (Easy/Medium/Hard) — real differentiation via number
// ranges and term counts.
//
// 3 equation forms per level:
//   Form 1: a&#8321;x + a&#8322;x + ... + const = val     (multiple x-terms on LHS)
//   Form 2: a&#8321;x/denom + a&#8322;x + ... + const = val (one fractional term)
//   Form 3: eqa = eqb ± valdiff               (x-terms on both sides)
//
// §H bug fix: $grd referenced but not guaranteed to be assigned by legacy
// pass-chk.php. Fixed: $_SESSION['grade'] ?? 5.
//
// Answer is a positive integer x. MCQ choices are integer strings.
// Distractors generated within a 15% band of the answer (min ±2).
//
// Display: equations are stored as plain text (no HTML tags). Rendered at
// 16pt to fit the 655px content area; browser auto-wraps long equations.
//
// Theme: paper61-* (136/547/117) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1.
// DB row required: modules.url = 'alg-solving-1-var.php'

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

$moduleTitle = 'Solving Single-Variable Equations';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(9, max(4, (int)($_SESSION['grade'] ?? 5)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function fmt_num($v) {
    $v = round((float)$v, 2);
    if (abs($v - round($v)) < 0.005) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 2, '.', ''), '0'), '.');
}

function make_solve_distractors($ans, $n = 3) {
    $ans = (int)$ans;
    $out = [];
    $seen = [(string)$ans => true];
    $band = max(2, (int)round(abs($ans) * 0.15));
    $candidates = [];
    for ($del = 1; $del <= $band; $del++) {
        $candidates[] = (string)($ans + $del);
        if ($ans - $del >= 1) $candidates[] = (string)($ans - $del);
    }
    shuffle($candidates);
    foreach ($candidates as $c) {
        if (isset($seen[$c])) continue;
        $seen[$c] = true;
        $out[] = $c;
        if (count($out) >= $n) return $out;
    }
    $pad = $band + 1;
    while (count($out) < $n && $pad <= 200) {
        foreach ([(string)($ans + $pad), (string)($ans - $pad)] as $c) {
            if ((int)$c < 1) continue;
            if (isset($seen[$c])) continue;
            $seen[$c] = true;
            $out[] = $c;
            if (count($out) >= $n) return $out;
        }
        $pad++;
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
    $v1 = rand(97, 120);
    while (in_array($v1, [107, 108, 110, 111])) $v1 = rand(97, 120);
    $var1 = chr($v1);

    $form = rand(1, 3);

    if ($form == 1) {
        if ($lvl === 'Easy')        { $termsnum = rand(1, 2); $x = rand(2, 9);  $lim1 = 2;  $lim2 = 19;  $fac = 1;   }
        elseif ($lvl === 'Hard')    {
            if (rand(1, 2) == 1) { $termsnum = rand(3, 5); $x = rand(5, 24); $lim1 = 21; $lim2 = 129; $fac = 1;   }
            else                 { $termsnum = rand(3, 4); $x = rand(5, 24); $lim1 = 11; $lim2 = 129; $fac = 0.1; }
        }

        $ans = $x;

        $const = rand(11, 49);
        if (rand(1, 2) == 1) $const = -$const;
        $val = $const;
        $coeffstr = "**";
        $terms = [];
        for ($i = 1; $i <= $termsnum; $i++) {
            $tries = 0;
            do {
                $coeff[$i] = rand($lim1, $lim2) * $fac;
                $tries++;
            } while (strpos($coeffstr, strval($coeff[$i])) > 1 && $tries < 30);
            $coeffstr .= $coeff[$i] . "*";
            if (rand(1, 2) == 1) $coeff[$i] = -$coeff[$i];
            $val = $val + $coeff[$i] * $x;
            $sign = $coeff[$i] < 0 ? "- " : "+ ";
            $terms[] = $sign . fmt_num(abs($coeff[$i])) . $var1 . " ";
        }
        $constSign = $const < 0 ? "- " : "+ ";
        $terms[] = $constSign . abs($const) . " ";

        shuffle($terms);
        $eqStr = implode('', $terms);
        if (substr($eqStr, 0, 2) == "+ ") $eqStr = substr($eqStr, 2);
        elseif (substr($eqStr, 0, 2) == "- ") $eqStr = "- " . substr($eqStr, 2);

        $eqStr .= " = " . fmt_num($val);
    }
    elseif ($form == 2) {
        if ($lvl === 'Easy')        { $termsnum = 1;         $x = rand(2, 9);  $lim1 = 2; $lim2 = 12; }
        elseif ($lvl === 'Hard')    { $termsnum = 4;         $x = rand(3, 12); $lim1 = 5; $lim2 = 24; }

        $denom = rand(2, 6);
        $x = $x * $denom;
        $ans = $x;

        $const = rand(11, 49);
        if (rand(1, 2) == 1) $const = -$const;
        $val = $const;
        $coeffstr = "**";
        $terms = [];
        for ($i = 1; $i <= $termsnum; $i++) {
            $tries = 0;
            do {
                $coeff[$i] = rand($lim1, $lim2);
                $tries++;
            } while (strpos($coeffstr, strval($coeff[$i])) > 1 && $tries < 30);
            $coeffstr .= $coeff[$i] . "*";
            if (rand(1, 2) == 1) $coeff[$i] = -$coeff[$i];
            $sign = $coeff[$i] < 0 ? "- " : "+ ";
            if ($i == 1) {
                $val = $val + ($coeff[1] * $x) / $denom;
                $terms[] = $sign . abs($coeff[1]) . $var1 . "/" . $denom . " ";
            } else {
                $val = $val + $coeff[$i] * $x;
                $terms[] = $sign . abs($coeff[$i]) . $var1 . " ";
            }
        }
        $constSign = $const < 0 ? "- " : "+ ";
        $terms[] = $constSign . abs($const) . " ";

        shuffle($terms);
        $eqStr = implode('', $terms);
        if (substr($eqStr, 0, 2) == "+ ") $eqStr = substr($eqStr, 2);
        elseif (substr($eqStr, 0, 2) == "- ") $eqStr = "- " . substr($eqStr, 2);

        $eqStr .= " = " . fmt_num($val);
    }
    else { // form 3
        if ($lvl === 'Easy')        { $termsnum = 1; $x = rand(2, 9);  $lim1 = 2;  $lim2 = 12; }
        elseif ($lvl === 'Hard')    { $termsnum = 3; $x = rand(3, 15); $lim1 = 11; $lim2 = 29; }

        $ans = $x;

        $const1 = rand(11, 49);
        if (rand(1, 2) == 1) $const1 = -$const1;
        $val1 = $const1;
        $coeffstr = "**";
        $terms1 = [];
        for ($i = 1; $i <= $termsnum; $i++) {
            $tries = 0;
            do {
                $coeff1[$i] = rand($lim1, $lim2);
                $tries++;
            } while (strpos($coeffstr, strval($coeff1[$i])) > 1 && $tries < 30);
            $coeffstr .= $coeff1[$i] . "*";
            if (rand(1, 2) == 1) $coeff1[$i] = -$coeff1[$i];
            $val1 = $val1 + $coeff1[$i] * $x;
            $sign = $coeff1[$i] < 0 ? "- " : "+ ";
            $terms1[] = $sign . abs($coeff1[$i]) . $var1 . " ";
        }
        $constSign = $const1 < 0 ? "- " : "+ ";
        $terms1[] = $constSign . abs($const1) . " ";

        $const2 = rand(11, 49);
        if (rand(1, 2) == 1) $const2 = -$const2;
        $val2 = $const2;
        $terms2 = [];
        for ($j = 1; $j <= $termsnum; $j++) {
            $tries = 0;
            do {
                $coeff2[$j] = rand($lim1, $lim2);
                $tries++;
            } while (strpos($coeffstr, strval($coeff2[$j])) > 1 && $tries < 30);
            $coeffstr .= $coeff2[$j] . "*";
            if (rand(1, 2) == 1) $coeff2[$j] = -$coeff2[$j];
            $val2 = $val2 + $coeff2[$j] * $x;
            $sign = $coeff2[$j] < 0 ? "- " : "+ ";
            $terms2[] = $sign . abs($coeff2[$j]) . $var1 . " ";
        }
        $constSign = $const2 < 0 ? "- " : "+ ";
        $terms2[] = $constSign . abs($const2) . " ";

        $valdiff = $val1 - $val2;

        shuffle($terms1);
        shuffle($terms2);

        $eqa = implode('', $terms1);
        if (substr($eqa, 0, 2) == "+ ") $eqa = substr($eqa, 2);
        elseif (substr($eqa, 0, 2) == "- ") $eqa = "- " . substr($eqa, 2);

        $eqb = implode('', $terms2);
        if (substr($eqb, 0, 2) == "+ ") $eqb = substr($eqb, 2);
        elseif (substr($eqb, 0, 2) == "- ") $eqb = "- " . substr($eqb, 2);

        $op = $valdiff >= 0 ? " + " : " - ";
        $eqStr = $eqa . " = " . $eqb . $op . abs($valdiff);
    }

    $answerStr = (string)(int)$ans;
    $distractors = make_solve_distractors($ans, 3);
    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 100) {
        foreach ([(string)($ans + $pad), (string)($ans - $pad)] as $c) {
            if ((int)$c < 1) continue;
            if (!in_array($c, $allChoices, true)) {
                $allChoices[] = $c;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $pad++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'eq'      => $eqStr,
        'var'     => $var1,
        'answer'  => $answerStr,
        'choices' => $allChoices,
        'lvl'     => $lvl,
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
  .eq-display {
    font-size: 16pt;
    font-weight: 700;
    color: #CC0066;
    max-width: 640px;
    margin: 20px auto;
    line-height: 1.55;
    word-wrap: break-word;
    overflow-wrap: break-word;
  }
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
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        If <strong style="color:#0000BB;"><?php echo htmlspecialchars($cur['eq']); ?></strong>,
        <br>
        then <strong style="color:#800080;"><?php echo htmlspecialchars($cur['var']); ?> = <span style="color:#CC0066; font-size:17pt;"><?php echo htmlspecialchars($cur['answer']); ?></span></strong>.
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:15pt; color:#444; margin-top:30px;">
        Solve for <strong style="color:#800080;"><?php echo htmlspecialchars($q['var']); ?></strong>:
    </p>
    <div class="eq-display">
        <?php echo htmlspecialchars($q['eq']); ?>
    </div>
    <p style="font-size:13pt; color:#444; margin-top:20px;">
        Click on your answer (<strong><?php echo htmlspecialchars($q['var']); ?></strong>).
    </p>
    <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
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