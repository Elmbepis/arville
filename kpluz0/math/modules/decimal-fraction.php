<?php
// math/modules/decimal-fraction.php
// MULTIPLE CHOICE (4 choices). Convert decimal to a fraction in lowest terms.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: targets the two failure modes —
//   (1) didn't reduce: shows the pre-reduced fractional form
//   (2) arithmetic slips: off-by-one whole / numerator / denominator, or swapped
// All distractors filtered so they don't collide with the correct display.
//
// Levels: Easy = legacy Easy; Hard = legacy Medium (§E).
// Theme: test17b-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'decimal-fraction.php'

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

$moduleTitle = 'Decimal to Fraction Conversion';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(7, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function gcd_int($a, $b) {
    $a = abs((int)$a); $b = abs((int)$b);
    while ($b) { [$a, $b] = [$b, $a % $b]; }
    return $a ?: 1;
}

function scaled_to_str($num, $places) {
    $num = (int)$num;
    if ($num == 0) return '0';
    $scale = (int)pow(10, $places);
    $whole = intdiv($num, $scale);
    $frac  = $num % $scale;
    if ($frac == 0) return (string)$whole;
    $s = $whole . '.' . str_pad((string)$frac, $places, '0', STR_PAD_LEFT);
    return rtrim(rtrim($s, '0'), '.');
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

    // Parse "w n/d" | "n/d" | "w"
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
            'Easy' => [1,  29,  1, 2],
            'Hard' => [11, 99,  1, 3],   // legacy Medium
        ],
        5 => [
            'Easy' => [1,  49,  1, 2],
            'Hard' => [11, 199, 1, 3],   // legacy Medium
        ],
        6 => [
            'Easy' => [1,  249, 1, 2],
            'Hard' => [11, 499, 1, 3],   // legacy Medium
        ],
        7 => [
            'Easy' => [1,  249, 1, 2],
            'Hard' => [11, 499, 1, 3],   // legacy Medium (grd 7 clamps to 6)
        ],
    ];
    [$numLimit1, $numLimit2, $facLimit1, $facLimit2] = $configs[$grd][$lvl];

    $safety = 0;
    do {
        $places = rand($facLimit1, $facLimit2);
        $scale  = (int)pow(10, $places);
        $num1   = rand($numLimit1, $numLimit2);
        $safety++;
    } while ($num1 % $scale == 0 && $safety < 60);   // reject integer decimals

    $decimalStr = scaled_to_str($num1, $places);

    // Original (pre-reduced) form for the "didn't reduce" distractor
    $origWhole  = intdiv($num1, $scale);
    $origFracN  = $num1 % $scale;
    $origDen    = $scale;

    // Reduce
    $g      = gcd_int($origFracN, $origDen);
    $whole  = $origWhole;
    $numer  = intdiv($origFracN, $g);
    $denom  = intdiv($origDen, $g);

    $correctStr = fmt_frac($whole, $numer, $denom);

    // Build distractor candidates
    $cands = [];

    // (1) Non-reduced form — only if actually different from correct
    $nonReduced = fmt_frac($origWhole, $origFracN, $origDen);
    if ($nonReduced !== $correctStr) {
        $cands[] = $nonReduced;
    }

    // (2) Off-by-one whole
    if ($whole > 0) {
        $cands[] = fmt_frac($whole + 1, $numer, $denom);
        if ($whole > 1) $cands[] = fmt_frac($whole - 1, $numer, $denom);
        $cands[] = fmt_frac(0, $numer, $denom);   // forgot whole
    }

    // (3) Off-by-one numerator (kept proper: numer+1 < denom)
    if ($numer > 1) $cands[] = fmt_frac($whole, $numer - 1, $denom);
    if ($numer + 1 < $denom) $cands[] = fmt_frac($whole, $numer + 1, $denom);

    // (4) Off-by-one denominator
    $cands[] = fmt_frac($whole, $numer, $denom + 1);

    // (5) Swapped numerator/denominator
    if ($numer != $denom) $cands[] = fmt_frac($whole, $denom, $numer);

    // Dedupe + filter correct + pick 3
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
    while (count($distractors) < 3) {
        foreach ([$numer + $d, $numer - $d] as $n) {
            if ($n > 0 && $n < $denom) {
                $c = fmt_frac($whole, $n, $denom);
                if (!isset($seen[$c])) { $seen[$c] = true; $distractors[] = $c; break; }
            }
        }
        $d++;
        if ($d > 20) break;
    }

    $choices = array_merge([$correctStr], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'decimalStr' => $decimalStr,
        'whole'      => $whole,
        'numer'      => $numer,
        'denom'      => $denom,
        'ans_str'    => $correctStr,
        'choices'    => $choices,
        'lvl'        => $lvl,
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
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:20px;">
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['decimalStr']); ?></strong>
        =
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['ans_str']); ?></strong>
        <span style="font-size:11pt; color:#888;">(in lowest terms)</span>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:30px;">
        Convert to a fraction in lowest terms:
    </p>
    <p style="font-size:28pt; font-weight:700; color:#CC0066; margin:20px 0;">
        <?php echo htmlspecialchars($q['decimalStr']); ?> = ?
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