<?php
// math/modules/conv-metric.php
// MCQ. Metric unit conversions (milli/centi/deci/base/kilo).
// Bypass §D category 2. Uses ?ansclick=X + render_choices().
//
// Legacy has only Easy and Hard (Medium is forced to Easy).
// Distractor scheme preserved from legacy: ans ×10, ÷10, and ×100 or ÷100.
// This tests power-of-10 understanding — can't be eliminated by magnitude
// because all choices stay within ±2 orders of magnitude of the answer.
//
// Theme: test73b-* is 110/582/108 — does not fit §C &#8594; paper-69-*.
// DB row required: modules.url = 'conv-metric.php'

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

$moduleTitle = 'Conversion of Metric Units';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];   // no Medium — legacy forces Medium&#8594;Easy

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Canonical 6dp string. Strips trailing zeros, locale-safe.
function fmt_metric($v) {
    $r = round((float)$v, 6);
    if ($r == (int)$r) return (string)(int)$r;
    return rtrim(rtrim(number_format($r, 6, '.', ''), '0'), '.');
}

// ============================================================
// HANDLE ANSWER CLICK  (GET ?ansclick=X)
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer(fmt_metric($clicked), $cur['ans_str'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $clicked,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $paras = ['gram', 'meter', 'liter'];
    $par   = $paras[array_rand($paras)];

    $qopt = rand(1, 22);

    // Number ranges (legacy scheme)
    if ($qopt <= 11) {
        $num = ($lvl === 'Easy') ? rand(1, 99) : rand(11, 99) * 10;
    } else {
        $num = ($lvl === 'Easy') ? rand(100, 9900) : rand(11, 99) * 1000;
    }

    // ---- Question + answer per type (legacy mapping) ----
    if ($qopt == 1) {
        $q = "How many milli{$par}s are there in <span style='color:#CC0066;'>$num</span> {$par}s?";
        $ans = $num * 1000;
        $ansUnit = "milli{$par}s"; $numUnit = "{$par}s";
    } elseif ($qopt == 2 || $qopt == 3) {
        $q = "How many milli{$par}s are there in <span style='color:#CC0066;'>$num</span> centi{$par}s?";
        $ans = $num * 10;
        $ansUnit = "milli{$par}s"; $numUnit = "centi{$par}s";
    } elseif ($qopt == 4) {
        $q = "How many milli{$par}s are there in <span style='color:#CC0066;'>$num</span> kilo{$par}s?";
        $ans = $num * 1000000;
        $ansUnit = "milli{$par}s"; $numUnit = "kilo{$par}s";
    } elseif ($qopt == 5 || $qopt == 6) {
        $q = "How many centi{$par}s are there in <span style='color:#CC0066;'>$num</span> {$par}s?";
        $ans = $num * 100;
        $ansUnit = "centi{$par}s"; $numUnit = "{$par}s";
    } elseif ($qopt == 7) {
        $q = "How many centi{$par}s are there in <span style='color:#CC0066;'>$num</span> kilo{$par}s?";
        $ans = $num * 100000;
        $ansUnit = "centi{$par}s"; $numUnit = "kilo{$par}s";
    } elseif ($qopt == 8) {
        $q = "How many deci{$par}s are there in <span style='color:#CC0066;'>$num</span> {$par}s?";
        $ans = $num * 10;
        $ansUnit = "deci{$par}s"; $numUnit = "{$par}s";
    } elseif ($qopt == 9) {
        $q = "How many deci{$par}s are there in <span style='color:#CC0066;'>$num</span> kilo{$par}s?";
        $ans = $num * 10000;
        $ansUnit = "deci{$par}s"; $numUnit = "kilo{$par}s";
    } elseif ($qopt == 10 || $qopt == 11) {
        $q = "How many {$par}s are there in <span style='color:#CC0066;'>$num</span> kilo{$par}s?";
        $ans = $num * 1000;
        $ansUnit = "{$par}s"; $numUnit = "kilo{$par}s";
    } elseif ($qopt == 12) {
        $q = "How many {$par}s are there in <span style='color:#CC0066;'>$num</span> milli{$par}s?";
        $ans = $num / 1000;
        $ansUnit = "{$par}s"; $numUnit = "milli{$par}s";
    } elseif ($qopt == 13 || $qopt == 14) {
        $q = "How many centi{$par}s are there in <span style='color:#CC0066;'>$num</span> milli{$par}s?";
        $ans = $num / 10;
        $ansUnit = "centi{$par}s"; $numUnit = "milli{$par}s";
    } elseif ($qopt == 15) {
        $q = "How many kilo{$par}s are there in <span style='color:#CC0066;'>$num</span> milli{$par}s?";
        $ans = $num / 1000000;
        $ansUnit = "kilo{$par}s"; $numUnit = "milli{$par}s";
    } elseif ($qopt == 16 || $qopt == 17) {
        $q = "How many {$par}s are there in <span style='color:#CC0066;'>$num</span> centi{$par}s?";
        $ans = $num / 100;
        $ansUnit = "{$par}s"; $numUnit = "centi{$par}s";
    } elseif ($qopt == 18) {
        $q = "How many kilo{$par}s are there in <span style='color:#CC0066;'>$num</span> centi{$par}s?";
        $ans = $num / 100000;
        $ansUnit = "kilo{$par}s"; $numUnit = "centi{$par}s";
    } elseif ($qopt == 19) {
        $q = "How many {$par}s are there in <span style='color:#CC0066;'>$num</span> deci{$par}s?";
        $ans = $num / 10;
        $ansUnit = "{$par}s"; $numUnit = "deci{$par}s";
    } elseif ($qopt == 20) {
        $q = "How many kilo{$par}s are there in <span style='color:#CC0066;'>$num</span> deci{$par}s?";
        $ans = $num / 10000;
        $ansUnit = "kilo{$par}s"; $numUnit = "deci{$par}s";
    } else {  // 21, 22
        $q = "How many kilo{$par}s are there in <span style='color:#CC0066;'>$num</span> {$par}s?";
        $ans = $num / 1000;
        $ansUnit = "kilo{$par}s"; $numUnit = "{$par}s";
    }

    $ansStr = fmt_metric($ans);

    // Singular/plural for feedback (legacy)
    $s = 's'; $v = 'are';
    if ((float)$ans <= 1) { $s = ''; $v = 'is'; }
    $resp = "There $v <span style='color:#CC0066;'>$ansStr</span> $ansUnit in <span style='color:#CC0066;'>$num</span> $numUnit.";

    // ---- Distractors (legacy scheme: ×10, ÷10, ×100 or ÷100) ----
    $choices = [$ansStr];
    $choices[] = fmt_metric($ans * 10);
    $choices[] = fmt_metric($ans / 10);
    $choices[] = (rand(1,2) == 1) ? fmt_metric($ans * 100) : fmt_metric($ans / 100);
    $choices = array_values(array_unique($choices));

    // Fallback if dedupe removed too many
    $mult = 1000;
    while (count($choices) < 4 && $mult <= 100000000) {
        $try = fmt_metric($ans * $mult);
        if (!in_array($try, $choices)) $choices[] = $try;
        $try = fmt_metric($ans / $mult);
        if (!in_array($try, $choices)) $choices[] = $try;
        $mult *= 10;
    }

    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question' => $q,
        'resp'     => $resp,
        'ans_str'  => $ansStr,
        'choices'  => $choices,
        'lvl'      => $lvl,
    ];
    $qd = $_SESSION[$sessionKey]['current'];
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
    'score_top'     => $base . '/math/images/score-top-4.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-4.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        You answered: <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:20px;">
        <?php echo $result['cur']['resp']; ?>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:30px;">
        <?php echo $qd['question']; ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444444;">
        <br/>Click on your answer.<br/>
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:520px; margin:20px auto;">
        <?php foreach ($qd['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
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