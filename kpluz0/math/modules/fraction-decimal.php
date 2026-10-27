<?php
// math/modules/fraction-decimal.php
// MULTIPLE CHOICE (4 choices). Convert fraction (possibly mixed) to decimal.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: classic mistakes —
//   (1) inverted fraction: computed den/num instead
//   (2) forgot whole number
//   (3) ×10 or ÷10 of the correct value
// Answer rounded to 4 decimal places (matches legacy).
//
// Levels: Easy = proper fraction, no whole.
//         Hard = legacy Medium ranges + optional whole part (mixed).
// Theme: test13b-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'fraction-decimal.php'

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

$moduleTitle = 'Fraction to Decimal Conversion';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function canon_dec($v, $precision = 4) {
    $v = (float)preg_replace('/[^0-9.\-]/', '', (string)$v);
    $r = round($v, $precision);
    if (abs($r - round($r)) < 0.0000001) return (string)(int)round($r);
    return rtrim(rtrim(number_format($r, $precision, '.', ''), '0'), '.');
}

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer(canon_dec($clicked), $cur['ans_canon'], $cur['lvl']);

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
    // [numLimit1, numLimit2, allowWhole, wholeMax]
    $configs = [
        4 => [
            'Easy' => [1,  6, false, 0],
            'Hard' => [1,  12, true, 9],   // legacy Medium
        ],
        5 => [
            'Easy' => [1,  15, false, 0],
            'Hard' => [4,  25, true, 9],   // legacy Medium
        ],
        6 => [
            'Easy' => [11, 99, false, 0],
            'Hard' => [1,  399, true, 9],   // legacy Medium
        ],
    ];
    [$numLimit1, $numLimit2, $allowWhole, $wholeMax] = $configs[$grd][$lvl];

    // Proper fraction
    $safety = 0;
    do {
        $num = rand($numLimit1, $numLimit2);
        $den = rand($numLimit1, $numLimit2);
        $safety++;
    } while ($num >= $den && $safety < 60);

    $whole = 0;
    if ($allowWhole && rand(1, 2) === 1) {
        $whole = rand(1, $wholeMax);
    }

    $decimalValue = $whole + $num / $den;
    $ansCanon     = canon_dec($decimalValue, 4);
    $ansStr       = $ansCanon;

    // Distractors
    $cands = [];

    // Inverted fraction
    if ($num > 0) {
        $cands[] = canon_dec($whole + $den / $num, 4);
    }

    // Forgot whole number
    if ($whole > 0) {
        $cands[] = canon_dec($num / $den, 4);
        $cands[] = (string)$whole;   // just the whole part
    }

    // ×10 / ÷10
    $cands[] = canon_dec($decimalValue * 10, 4);
    $cands[] = canon_dec($decimalValue / 10, 4);

    // Small slip
    $cands[] = canon_dec($decimalValue + 0.01, 4);
    $cands[] = canon_dec($decimalValue * 2, 4);

    $seen = [$ansCanon => true];
    $distractors = [];
    shuffle($cands);
    foreach ($cands as $c) {
        if (isset($seen[$c])) continue;
        $seen[$c] = true;
        $distractors[] = $c;
        if (count($distractors) >= 3) break;
    }

    // Fallback
    $d = 1;
    while (count($distractors) < 3) {
        foreach ([canon_dec($decimalValue + $d * 0.01, 4), canon_dec($decimalValue - $d * 0.01, 4)] as $cv) {
            if ((float)$cv > 0 && !isset($seen[$cv])) {
                $seen[$cv] = true;
                $distractors[] = $cv;
                if (count($distractors) >= 3) break 2;
            }
        }
        $d++;
        if ($d > 100) break;
    }

    $choices = array_merge([$ansStr], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'whole'      => $whole,
        'numer'      => $num,
        'denom'      => $den,
        'ans_str'    => $ansStr,
        'ans_canon'  => $ansCanon,
        'choices'    => $choices,
        'lvl'        => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER HELPERS
// ============================================================
$renderFraction = function ($whole, $numer, $denom, $color = '#800080') {
    if ($numer == 0 && $whole == 0) {
        echo '<span style="color:' . $color . ';">0</span>';
        return;
    }
    echo '<span style="display:inline-flex; align-items:center; gap:8px; font-family:\'Comic Sans MS\',sans-serif; color:' . $color . ';">';
    if ($whole > 0) {
        echo '<span>' . $whole . '</span>';
    }
    if ($numer > 0) {
        echo '<span style="display:inline-block; text-align:center; vertical-align:middle; line-height:1.15;">';
        echo '<span style="display:block; padding:0 8px; border-bottom:3px solid currentColor;">' . $numer . '</span>';
        echo '<span style="display:block; padding:0 8px;">' . $denom . '</span>';
        echo '</span>';
    }
    echo '</span>';
};

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
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#CC0066; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <div style="display:inline-flex; align-items:center; gap:20px; font-size:26pt; font-weight:700; margin:20px 0; flex-wrap:wrap; justify-content:center;">
        <?php $renderFraction($cur['whole'], $cur['numer'], $cur['denom']); ?>
        <span style="color:#800080;">=</span>
        <span style="color:#CC0066;"><?php echo htmlspecialchars($cur['ans_str']); ?></span>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:30px;">
        Convert the fraction to a decimal:
    </p>

    <div style="display:inline-flex; align-items:center; gap:20px; font-size:28pt; font-weight:700; margin:20px 0; flex-wrap:wrap; justify-content:center;">
        <?php $renderFraction($q['whole'], $q['numer'], $q['denom']); ?>
        <span style="color:#800080;">=</span>
        <span style="color:#CC0066;">?</span>
    </div>

    <p style="font-size:13pt; font-weight:500; color:#444; margin-top:15px;">
        Click on your answer.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:440px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:nowrap; padding:15px 20px; box-sizing:border-box; font-size:1.4rem;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <p style="font-size:11pt; color:#888;">
        (Round off to 4 decimal places.)
    </p>

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