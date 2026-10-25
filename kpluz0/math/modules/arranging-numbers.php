<?php
// math/modules/arranging-numbers.php
//
// MULTI-INPUT FREE-TEXT module — QEngine not used.
// Student arranges N numbers from greatest&#8594;least or least&#8594;greatest.
// Uses container.php + scorer.php only.
//
// LAYOUT — For 5-6 numbers, forces 3 per row (grid) so long numbers don't
// produce awkward 4+1 / 4+2 wraps. 3-4 numbers stay on a single row.
//
// BOX SIZING — Display boxes and input boxes share identical dimensions
// and font size, both derived from the digit count of the widest number.

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

$moduleTitle = 'Arranging Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

$theme = [
    'top_banner'    => $base . '/math/modules/images/bg01-top.jpg',
    'title_bg'      => $base . '/math/modules/images/bg01-top2.jpg',
    'left_side'     => $base . '/math/modules/images/bg01-left.jpg',
    'right_side'    => $base . '/math/modules/images/bg01-right.jpg',
    'content_bg'    => $base . '/math/modules/images/bg01-content.jpg',
    'bottom_banner' => $base . '/math/modules/images/bg01-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];

$ranges = [
    0 => ['Easy' => [1, 10],     'Hard' => [1, 20]],
    1 => ['Easy' => [5, 29],     'Hard' => [5, 49]],
    2 => ['Easy' => [21, 99],    'Hard' => [101, 499]],
    3 => ['Easy' => [111, 999],  'Hard' => [1110, 2999]],
];
$gradeKey = min(3, max(0, $grd));
[$nMin, $nMax] = $ranges[$gradeKey][$lvl];

$boxnum = min(6, 3 + $gradeKey + ($lvl === 'Hard' ? 1 : 0));

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userParts = [];
    for ($i = 1; $i <= $cur['boxnum']; $i++) {
        $v = (int)trim((string)($_POST['answer' . $i] ?? '0'));
        $userParts[] = $v;
    }
    $userCombined    = implode('|', $userParts);
    $correctCombined = implode('|', $cur['sorted']);

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userCombined, $correctCombined, $cur['lvl']);

    $result = [
        'correct'   => $correct,
        'nums'      => $cur['nums'],
        'sorted'    => $cur['sorted'],
        'userParts' => $userParts,
        'boxnum'    => $cur['boxnum'],
        'direction' => $cur['direction'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $nums = [];
    $tries = 0;
    while (count($nums) < $boxnum && $tries < 100) {
        $n = rand($nMin, $nMax);
        if (!in_array($n, $nums, true)) $nums[] = $n;
        $tries++;
    }
    while (count($nums) < $boxnum) $nums[] = rand($nMin, $nMax);

    $direction = (rand(1, 2) === 1) ? 'desc' : 'asc';
    $sorted = $nums;
    if ($direction === 'desc') {
        rsort($sorted);
    } else {
        sort($sorted);
    }

    $_SESSION[$sessionKey]['current'] = [
        'nums'      => $nums,
        'sorted'    => $sorted,
        'boxnum'    => $boxnum,
        'direction' => $direction,
        'lvl'       => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Container CSS for a set of N boxes. 3-4 items &#8594; single flex row; 5-6 &#8594; 3-col grid.
 */
function arrangingContainerStyle($boxnum) {
    if ($boxnum <= 4) {
        return 'display:flex; justify-content:center; align-items:center;'
             . ' gap:15px; flex-wrap:wrap; margin:15px 0;';
    }
    return 'display:grid; grid-template-columns:repeat(3, auto);'
         . ' justify-content:center; justify-items:center; align-items:center;'
         . ' gap:15px; margin:15px 0;';
}

/**
 * Box metrics derived from the widest number.
 * Returns [widthPx, fontPt] such that both display and input boxes
 * look identical and comfortably fit the longest number.
 */
function boxMetrics($nums) {
    $maxDigits = 1;
    foreach ($nums as $n) {
        $maxDigits = max($maxDigits, strlen((string)$n));
    }
    $fontPt = 32;
    if ($maxDigits >= 4) $fontPt = 28;
    if ($maxDigits >= 5) $fontPt = 24;

    // Approximate: each digit &#8776; 0.6× font size in px, plus 40px of chrome
    $charW = $fontPt * 0.6;
    $boxW  = (int)max(90, ceil($maxDigits * $charW + 60));

    return ['w' => $boxW, 'font' => $fontPt];
}

/**
 * Render a row of numbers as display boxes.
 */
function renderArrangingNumbers($nums) {
    $m = boxMetrics($nums);
    $boxnum = count($nums);
    echo '<div style="' . arrangingContainerStyle($boxnum) . '">';
    foreach ($nums as $n) {
        echo '<div style="width:' . $m['w'] . 'px; height:90px;'
           . ' display:inline-flex; align-items:center; justify-content:center;'
           . ' background:#f8f8ff; border:3px solid #b0b0d8;'
           . ' border-radius:16px; box-sizing:border-box; padding:0;'
           . ' font-family:\'Comic Sans MS\',sans-serif;'
           . ' font-size:' . $m['font'] . 'pt; font-weight:700; color:#800080;">'
           . htmlspecialchars((string)$n)
           . '</div>';
    }
    echo '</div>';
}

/**
 * Render N input boxes sized identically to the display boxes.
 * $nums is used to derive the same metrics; if empty, boxMetrics([1]) is used.
 */
function renderArrangingInputs($boxnum, $nums = [], $filled = []) {
    $m = boxMetrics($nums ?: [1]);
    echo '<div style="' . arrangingContainerStyle($boxnum) . '">';
    for ($i = 1; $i <= $boxnum; $i++) {
        $val = htmlspecialchars((string)($filled[$i - 1] ?? ''));
        echo '<input type="text" name="answer' . $i . '" maxlength="6"'
           . ' style="width:' . $m['w'] . 'px; height:90px; text-align:center;'
           . ' font-family:\'Comic Sans MS\',sans-serif;'
           . ' font-size:' . $m['font'] . 'pt; font-weight:700; color:#0000CC;'
           . ' background:#fff; border:3px solid #b0b0d8;'
           . ' border-radius:16px; box-sizing:border-box; padding:0;"'
           . ' value="' . $val . '" autocomplete="off"'
           . ($i === 1 ? ' autofocus' : '') . '>';
    }
    echo '</div>';
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <?php if ($result !== null): ?>
        <br>
        <p style="font-size:14pt; color:#666;">
            Your arrangement:
            <strong><?php echo htmlspecialchars(implode('  ', $result['userParts'])); ?></strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <p style="font-size:15pt; font-weight:700; color:#800080; margin-top:15px;">
            Here are the numbers, arranged<br/>from
            <strong><?php echo ($result['direction'] === 'desc' ? 'GREATEST to LEAST' : 'LEAST to GREATEST'); ?></strong>:
        </p>
        <?php renderArrangingNumbers($result['sorted']); ?>
    <?php else: ?>
        <br>
        <p style="font-size:16pt; font-weight:700; color:#800080;">
            Arrange the following numbers<br/>from
            <strong style="color:#CC0066;">
                <?php echo ($q['direction'] === 'desc' ? 'GREATEST to LEAST' : 'LEAST to GREATEST'); ?>
            </strong>:
        </p>
        <?php renderArrangingNumbers($q['nums']); ?>
        <?php renderArrangingInputs($q['boxnum'], $q['nums']); ?>
    <?php endif; ?>

    <div>
        <?php if ($result === null): ?>
            <input type="submit" name="Submit1" value="Submit">
            <span style="display:inline-block; width: 20px;"></span>
        <?php endif; ?>
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin: 30px 0;"<?php endif; ?>>
    </div>

    <div align="center" style="margin-top: 20px;">
        <p style="margin-top: 5px; margin-bottom: 0">
            <font face="Verdana" style="font-size: 10pt;" color="#000080">
                Select difficulty level for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size: 9pt;">
                        <font color="#800080">
                            <input type="radio" name="level" value="<?php echo $l; ?>"
                                <?php echo $lvl === $l ? 'checked' : ''; ?>>
                            <b>&nbsp;<?php echo $l; ?></b>
                        </font>
                    </font>
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