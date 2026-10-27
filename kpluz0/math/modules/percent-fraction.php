<?php
// math/modules/percent-fraction.php
// MULTIPLE CHOICE (4 choices). Convert percent to fraction in lowest terms.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: same pedagogical set as decimal-fraction —
//   (1) didn't reduce (shows pre-reduced form)
//   (2) off-by-one whole / numerator / denominator
//   (3) swap numerator/denominator (only for proper fractions)
//
// Levels: Easy = legacy Easy; Hard = legacy Medium (§E).
// Theme: test18-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'percent-fraction.php'

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

$moduleTitle = 'Percent to Fraction Conversion';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function gcd_int($a, $b) {
    $a = abs((int)$a); $b = abs((int)$b);
    while ($b) { [$a, $b] = [$b, $a % $b]; }
    return $a ?: 1;
}

function fmt_frac($w, $n, $d) {
    if ($n == 0) return (string)$w;
    if ($w == 0) return "$n/$d";
    return "$w $n/$d";
}

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $sw = 0; $sn = 0; $sd = 1;
    if (preg_match('/^(\d+)\s+(\d+)\/(\d+)$/', $clicked, $m)) {
        $sw = (int)$m[1]; $sn = (int)$m[2]; $sd = (int)$m[3];
    } elseif (preg_match('/^(\d+)\/(\d+)$/', $clicked, $m)) {
        $sw = 0; $sn = (int)$m[1]; $sd = (int)$m[2];
    } elseif (preg_match('/^(\d+)$/', $clicked, $m)) {
        $sw = (int)$m[1]; $sn = 0; $sd = 1;
    }

    $sCombined = ($sn == 0) ? "$sw|0" : "$sw|$sn|$sd";
    $cCombined = ($cur['numer'] == 0)
        ? $cur['whole'] . '|0'
        : $cur['whole'] . '|' . $cur['numer'] . '|' . $cur['denom'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($sCombined, $cCombined, $cur['lvl']);

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
    // [numLimit1, numLimit2, facLimit1, facLimit2]
    $configs = [
        4 => [
            'Easy' => [1, 25, 1, 2],
            'Hard' => [4, 45, 2, 3],   // legacy Medium
        ],
        5 => [
            'Easy' => [1, 99, 1, 2],
            'Hard' => [4, 149, 2, 3],  // legacy Medium
        ],
        6 => [
            'Easy' => [1, 129, 1, 3],
            'Hard' => [11, 999, 1, 4], // legacy Medium
        ],
    ];
    [$numLimit1, $numLimit2, $facLimit1, $facLimit2] = $configs[$grd][$lvl];

    $safety = 0;
    do {
        $places = rand($facLimit1, $facLimit2);
        $scale  = (int)pow(10, $places);
        $num1   = rand($numLimit1, $numLimit2);
        $safety++;
    } while ($num1 % $scale == 0 && $safety < 60);   // reject whole-number percents

    $den1 = $scale;
    $perc = $num1 / $den1 * 100;

    // Display percent (may be fractional, e.g. 4.5%)
    $percStr = rtrim(rtrim(number_format($perc, 4, '.', ''), '0'), '.');

    // Original pre-reduced form
    $origWhole = intdiv($num1, $den1);
    $origFracN = $num1 % $den1;
    $origDen   = $den1;

    // Reduce
    $g     = gcd_int($origFracN, $origDen);
    $whole = $origWhole;
    $numer = intdiv($origFracN, $g);
    $denom = intdiv($origDen, $g);

    if ($denom == 1) {
        $whole += $numer;
        $numer = 0;
        $denom = 1;
    }

    $correctStr = fmt_frac($whole, $numer, $denom);

    // ---- Distractor candidates ----
    $cands = [];

    // (1) Non-reduced form
    $nonReduced = fmt_frac($origWhole, $origFracN, $origDen);
    if ($nonReduced !== $correctStr && $origFracN > 0) {
        $cands[] = $nonReduced;
    }

    // (2) Off-by-one whole
    if ($whole > 0 && $numer > 0) {
        $cands[] = fmt_frac($whole + 1, $numer, $denom);
        if ($whole > 1) $cands[] = fmt_frac($whole - 1, $numer, $denom);
        $cands[] = fmt_frac(0, $numer, $denom);   // forgot whole
    }

    // (3) Off-by-one numerator (kept proper)
    if ($numer > 1) $cands[] = fmt_frac($whole, $numer - 1, $denom);
    if ($numer > 0 && $numer + 1 < $denom) $cands[] = fmt_frac($whole, $numer + 1, $denom);

    // (4) Off-by-one denominator
    if ($numer > 0) $cands[] = fmt_frac($whole, $numer, $denom + 1);

    // (5) Swap (only for proper fractions — mixed swap is nonsensical)
    if ($whole == 0 && $numer > 0 && $numer != $denom) {
        $cands[] = fmt_frac(0, $denom, $numer);
    }

    // Dedupe + pick 3
    $seen = [$correctStr => true];
    $distractors = [];
    shuffle($cands);
    foreach ($cands as $c) {
        if (isset($seen[$c])) continue;
        $seen[$c] = true;
        $distractors[] = $c;
        if (count($distractors) >= 3) break;
    }

    // Fallback if not enough distinct
    $d = 1;
    while (count($distractors) < 3 && $d < 30) {
        foreach ([$numer + $d, $numer - $d] as $n) {
            if ($n > 0 && $n < $denom) {
                $c = fmt_frac($whole, $n, $denom);
                if (!isset($seen[$c])) { $seen[$c] = true; $distractors[] = $c; break; }
            }
        }
        $d++;
    }

    $choices = array_merge([$correctStr], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'percStr' => $percStr,
        'whole'   => $whole,
        'numer'   => $numer,
        'denom'   => $denom,
        'ans_str' => $correctStr,
        'choices' => $choices,
        'lvl'     => $lvl,
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
        <span style="color:#CC0066;"><?php echo htmlspecialchars($cur['percStr']); ?>%</span>
        <span style="color:#800080;">=</span>
        <?php $renderFraction($cur['whole'], $cur['numer'], $cur['denom'], '#CC0066'); ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:30px;">
        Convert the percent to a fraction in lowest terms:
    </p>

    <p style="font-size:30pt; font-weight:700; color:#CC0066; margin:20px 0;">
        <?php echo htmlspecialchars($q['percStr']); ?>% = ?
    </p>

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