<?php
// math/modules/sq-root.php
// PROCEDURAL square root problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// 3 levels with real differentiation (§E preserved):
//   Easy   &#8594; roots 1-15 (grd&#8804;6) or 11-79 (grd>6), perfect squares
//   Medium &#8594; roots 11-49 (grd&#8804;6) or 79-149 (grd>6), perfect squares
//   Hard   &#8594; roots 39-119 (grd&#8804;6) perfect squares
//            OR (grd>6) non-perfect integers 149-1299, roots to 1 decimal
//
// Answer format: "+/-N" (matches legacy "+/- [input]" display).
// For hard+grd>6, N is 1-decimal (e.g. "+/-14.1").
// Scorer string-compares, so click == answer string.
//
// Distractors: 15% band around the answer, ±1 or ±0.1 steps.
//
// Theme: test10-* &#8594; paper-69-* per §C fit test.
// Score box: score-*-1 (test10-score.jpg embedded, non-standard).
// DB row required: modules.url = 'sq-root.php'

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

$moduleTitle = 'Square Roots';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = (int)($_SESSION['grade'] ?? 5);   // §H defense

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function fmt_root($v) {
    $v = round((float)$v, 1);
    if (abs($v - round($v)) < 0.05) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 1, '.', ''), '0'), '.');
}

function make_sqrt_distractors($correct, $isDecimal, $n = 3) {
    $seen = [fmt_root($correct) => true];
    $out = [];
    $step = $isDecimal ? 0.1 : 1;

    $candidates = [];
    for ($d = 1; $d <= 20; $d++) {
        $candidates[] = $correct + $d * $step;
        $candidates[] = $correct - $d * $step;
    }
    shuffle($candidates);
    foreach ($candidates as $c) {
        $c = round($c, 1);
        if ($c <= 0) continue;
        $cs = fmt_root($c);
        if (isset($seen[$cs])) continue;
        $seen[$cs] = true;
        $out[] = '+/-' . $cs;
        if (count($out) >= $n) break;
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
    if ($lvl === 'Easy') {
        if ($grd <= 6) { $nlim1 = 1;  $nlim2 = 15;  }
        else           { $nlim1 = 11; $nlim2 = 79;  }
    } else { // Hard
        if ($grd <= 6) { $nlim1 = 39; $nlim2 = 119; }
        else           { $nlim1 = 149; $nlim2 = 1299; }
    }

    // Repeat prevention (avoid repeating last root)
    $lastNum = $_SESSION[$sessionKey]['lastNum'] ?? 0;
    $num = rand($nlim1, $nlim2);
    $tries = 0;
    while ($num == $lastNum && $tries < 20) {
        $num = rand($nlim1, $nlim2);
        $tries++;
    }
    $_SESSION[$sessionKey]['lastNum'] = $num;

    // Hard+grd>6: non-perfect square, decimal root
    $isDecimalCase = ($lvl === 'Hard' && $grd > 6);

    if ($isDecimalCase) {
        $qnum   = $num;                // e.g. 200
        $root   = sqrt($qnum);          // 14.142...
        $correct = round($root, 1);     // 14.1
        $prompt = 'Find the square roots of ' . $qnum . '. Round off your answer to one decimal place.';
        $soln   = "sqrt($qnum) = " . fmt_root($correct) . "<br>"
                . "Square roots = <strong>+/-" . fmt_root($correct) . "</strong>";
        $isDecimal = true;
    } else {
        $qnum   = $num * $num;          // perfect square, e.g. 49
        $correct = $num;
        $prompt = 'Find the square roots of ' . $qnum . '.';
        $soln   = "$num x $num = $qnum<br>"
                . "Square roots = <strong>+/-$num</strong>";
        $isDecimal = false;
    }

    $answerStr = '+/-' . fmt_root($correct);
    $distractors = make_sqrt_distractors($correct, $isDecimal, 3);

    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 50) {
        foreach (['+/-' . fmt_root($correct + $pad * ($isDecimal ? 0.1 : 1)),
                  '+/-' . fmt_root($correct - $pad * ($isDecimal ? 0.1 : 1))] as $c) {
            if (strpos($c, '-') === 1 && (float)substr($c, 3) <= 0) continue;  // avoid +/-0
            if (!in_array($c, $allChoices, true)) {
                $allChoices[] = $c;
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
        <?php echo htmlspecialchars($cur['prompt']); ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.5;">
        <?php echo htmlspecialchars($q['prompt']); ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer.</p>
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