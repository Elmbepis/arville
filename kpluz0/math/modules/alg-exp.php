<?php
// math/modules/alg-exp.php
// PROCEDURAL forming algebraic expressions from verbal descriptions.
// Bypass QEngine per §D. Converted from FIB to MCQ.
//
// 2 levels, content varies by grade:
//   Grade &#8804;6  Easy: vform 1-8  (simple + - × ^)
//             Hard: vform 9-12 (powers with const)
//   Grade &#8805;7  Easy: vform 21-30 (grade-7 equivalents of 1-8)
//             Hard: vform 31-34 (grade-7 harder including 2-variable)
//
// §H bug fix: $grd referenced but legacy relied on pass-chk.php assigning it.
// Fixed: $_SESSION['grade'] ?? 6.
//
// Rendering: choices contain <sup> tags &#8594; manual rendering (like alg-exp-eq).
// Answer string stored with <sup> tags; urlencode round-trips correctly.
//
// Distractors: mutate the correct answer (change coefficient, constant,
// operator, or exponent). No outliers — all distractors are structurally
// similar to the correct answer.
//
// Feedback reformat: uses "as the variable" (definite article) rather than
// "as your variable", and &nbsp; locks "variable," and "the" onto the same
// line so the sentence never breaks at that specific comma.
//
// Theme: test55-* (136/547/117) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1 (test55-score.jpg embedded, non-standard).
// DB row required: modules.url = 'alg-exp.php'

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

$moduleTitle = 'Forming Algebraic Expressions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(9, max(4, (int)($_SESSION['grade'] ?? 6)));  // §H fix

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function mutate_alg_exp($aexp1, $n = 3) {
    $out  = [];
    $seen = [$aexp1 => true];

    $positions = [];
    if (preg_match_all('/\d+/', $aexp1, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $m) {
            $positions[] = ['val' => $m[0], 'pos' => $m[1]];
        }
    }
    shuffle($positions);

    foreach ($positions as $p) {
        if (count($out) >= $n) break;
        $delta  = rand(1, 3) * (rand(1, 2) == 1 ? 1 : -1);
        $newVal = (int)$p['val'] + $delta;
        if ($newVal < 1) $newVal = (int)$p['val'] + abs($delta);
        if ($newVal < 1) continue;
        $mutant = substr($aexp1, 0, $p['pos']) . $newVal . substr($aexp1, $p['pos'] + strlen($p['val']));
        if (isset($seen[$mutant])) continue;
        if (strpos($mutant, '<sup>1</sup>') !== false) continue;
        $seen[$mutant] = true;
        $out[] = $mutant;
    }

    if (count($out) < $n && strpos($aexp1, '+') !== false) {
        $pos = strpos($aexp1, '+');
        $mutant = substr($aexp1, 0, $pos) . '-' . substr($aexp1, $pos + 1);
        if (!isset($seen[$mutant])) {
            $seen[$mutant] = true;
            $out[] = $mutant;
        }
    }
    if (count($out) < $n && strpos($aexp1, '-') !== false) {
        $pos = strpos($aexp1, '-');
        $mutant = substr($aexp1, 0, $pos) . '+' . substr($aexp1, $pos + 1);
        if (!isset($seen[$mutant])) {
            $seen[$mutant] = true;
            $out[] = $mutant;
        }
    }

    $d = 1;
    while (count($out) < $n && $d <= 20) {
        foreach (['+' . $d, '-' . $d] as $suffix) {
            $mutant = $aexp1 . $suffix;
            if (!isset($seen[$mutant])) {
                $seen[$mutant] = true;
                $out[] = $mutant;
                if (count($out) >= $n) return $out;
            }
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

    $clickedDisplay = htmlspecialchars($clicked);
    foreach ($cur['choices'] as $c) {
        if ($c === $clicked) { $clickedDisplay = $c; break; }
    }

    $result = [
        'correct'        => $isCorrect,
        'clicked'        => $clicked,
        'clickedDisplay' => $clickedDisplay,
        'cur'            => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $addexp  = (rand(1, 2) == 1) ? 'plus' : 'increased by';
    $subtexp = ['minus', 'reduced by', 'decreased by', 'less'][rand(0, 3)];
    $multexp = (rand(1, 2) == 1) ? 'times' : 'multiplied by';

    if ($grd <= 6) {
        $vform = ($lvl === 'Easy') ? rand(1, 8) : rand(9, 12);
    } else {
        $vform = ($lvl === 'Easy') ? rand(21, 30) : rand(31, 34);
    }

    $coeffn1 = rand(2, 999);
    $coeffn2 = rand(1, 9);
    $coeffn3 = rand(11, 99);
    $coeffn4 = rand(11, 99);
    $expn1   = rand(2, 9);
    $expn2   = rand(2, 9);
    $const1  = rand(11, 99);
    $const2  = rand(11, 99);

    $coeff1 = $coeffn1 . ' times';
    if ($coeffn1 == 2) $coeff1 = 'twice';
    if ($coeffn1 == 3) $coeff1 = 'thrice';

    $exp1 = "raised to the power of $expn1";
    if ($expn1 == 2) $exp1 = (rand(1, 2) == 1) ? 'squared' : 'raised to the second power';
    if ($expn1 == 3) $exp1 = (rand(1, 2) == 1) ? 'cubed' : 'raised to the third power';
    $exp2 = "raised to the power of $expn2";
    if ($expn2 == 2) $exp2 = (rand(1, 2) == 1) ? 'squared' : 'raised to the second power';
    if ($expn2 == 3) $exp2 = (rand(1, 2) == 1) ? 'cubed' : 'raised to the third power';

    $banned = [108, 111];  // l, o
    do { $v1 = rand(97, 122); } while (in_array($v1, $banned));
    do { $v2 = rand(97, 122); } while (in_array($v2, $banned) || $v2 === $v1);
    $var1 = chr($v1);
    $var2 = chr($v2);

    $twoVars = false;

    if ($vform == 1 || $vform == 21) {
        $n = rand(2, 999);
        $vexp  = "$n times a number";
        $aexp1 = $n . $var1;
    }
    elseif ($vform == 2 || $vform == 22) {
        $vexp  = "a number $addexp $const1";
        $aexp1 = $var1 . "+$const1";
    }
    elseif ($vform == 3 || $vform == 23) {
        $vexp  = "a number $subtexp $const1";
        $aexp1 = $var1 . "-$const1";
    }
    elseif ($vform == 4 || $vform == 24) {
        $vexp  = "a number $exp1";
        $aexp1 = $var1 . "<sup>$expn1</sup>";
    }
    elseif ($vform == 5 || $vform == 25) {
        $vexp  = "$coeff1 a number $addexp $const1";
        $aexp1 = $coeffn1 . $var1 . "+$const1";
    }
    elseif ($vform == 6 || $vform == 26) {
        $vexp  = "$coeff1 a number $subtexp $const1";
        $aexp1 = $coeffn1 . $var1 . "-$const1";
    }
    elseif ($vform == 7 || $vform == 29) {
        $vexp  = "$const1 $addexp $coeff1 a number";
        $aexp1 = "$const1+" . $coeffn1 . $var1;
    }
    elseif ($vform == 8 || $vform == 30) {
        $vexp  = "$const1 $subtexp $coeff1 a number";
        $aexp1 = "$const1-" . $coeffn1 . $var1;
    }
    elseif ($vform == 9 || $vform == 27) {
        $vexp  = "a number $exp1 $addexp $const1";
        $aexp1 = $var1 . "<sup>$expn1</sup>+$const1";
    }
    elseif ($vform == 10 || $vform == 28) {
        $vexp  = "a number $exp1 $subtexp $const1";
        $aexp1 = $var1 . "<sup>$expn1</sup>-$const1";
    }
    elseif ($vform == 11 || $vform == 31) {
        $vexp  = "$coeff1 a number $exp1 $addexp $const1";
        $aexp1 = $coeffn1 . $var1 . "<sup>$expn1</sup>+$const1";
    }
    elseif ($vform == 12 || $vform == 32) {
        $vexp  = "$const1 $subtexp a number $exp1";
        $aexp1 = "$const1-" . $var1 . "<sup>$expn1</sup>";
    }
    elseif ($vform == 33) {
        $vexp  = "$const1 $subtexp the sum of $coeff1 a number and $const2";
        $aexp1 = "$const1-(" . $coeffn1 . $var1 . "+$const2)";
    }
    elseif ($vform == 34) {
        $twoVars = true;
        $vexp    = "a number $exp1 $multexp another number $exp2";
        $aexp1   = $var1 . "<sup>$expn1</sup>" . $var2 . "<sup>$expn2</sup>";
    }
    else {
        $vexp  = "a number $addexp $const1";
        $aexp1 = $var1 . "+$const1";
    }

    $distractors = mutate_alg_exp($aexp1, 3);
    $allChoices  = array_merge([$aexp1], $distractors);
    $allChoices  = array_values(array_unique($allChoices));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 30) {
        $candidate = $aexp1 . '+' . $pad;
        if (!in_array($candidate, $allChoices, true)) {
            $allChoices[] = $candidate;
            if (count($allChoices) >= 4) break;
        }
        $pad++;
    }
    shuffle($allChoices);

    // Wording changed: "as the variable" / "as the first/second variable"
    $givenVarStr = $twoVars
        ? "'$var1' as the first variable and '$var2' as the second variable"
        : "'$var1' as the variable";

    $_SESSION[$sessionKey]['current'] = [
        'vexp'     => $vexp,
        'givenVar' => $givenVarStr,
        'answer'   => $aexp1,
        'choices'  => $allChoices,
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
  .alg-choice {
    display: inline-block;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 12px;
    padding: 14px 18px;
    font-size: 1.15rem;
    font-weight: bold;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    transition: background 0.15s, border-color 0.15s;
    box-sizing: border-box;
    white-space: nowrap;
  }
  .alg-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .alg-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
    max-width: 660px;
  }
  .alg-flex {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    gap: 18px;
    margin: 20px auto;
    max-width: 660px;
  }
  sup { font-size: 0.7em; vertical-align: super; line-height: 0; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo $result['clickedDisplay']; ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        Using <?php echo htmlspecialchars($cur['givenVar']); ?>,&nbsp;the algebraic expression for<br/> <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['vexp']); ?></strong> is <strong style="color:#0000BB; font-size:16pt;">'<?php echo $cur['answer']; ?>'</strong>.
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:14pt; color:#444; margin-top:30px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        Using <strong style="color:#800080;"><?php echo htmlspecialchars($q['givenVar']); ?></strong>,
        form an algebraic expression for:
    </p>
    <p style="font-size:18pt; font-weight:700; color:#CC0066; margin-top:14px;">
        <?php echo htmlspecialchars($q['vexp']); ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:20px;">Click on your answer.</p>

    <?php
        $plainLens = [];
        foreach ($q['choices'] as $c) {
            $plainLens[] = strlen(strip_tags($c));
        }
        $maxLen = max($plainLens);
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        $use2x2 = ($maxLen >= 5 && $maxLen <= 20);
        $containerClass = $use2x2 ? 'alg-grid-2x2' : 'alg-flex';
    ?>

    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="alg-choice"
               style="width:<?php echo $choiceWidthEm; ?>em;">
                <?php echo $c; ?>
            </a>
        <?php endforeach; ?>
    </div>

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