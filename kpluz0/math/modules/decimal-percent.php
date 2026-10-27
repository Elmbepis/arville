<?php
// math/modules/decimal-percent.php
// MULTIPLE CHOICE (4 choices). Convert decimal to percent.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: decimal-point-move misconception.
//   Wrong answers scale the answer by ×10, ÷10, ×100 — i.e., "moved decimal
//   the wrong number of places." Filters out exact-value collisions with the
//   correct answer and any duplicate values.
//
// Levels: Easy = legacy Easy; Hard = legacy Medium (§E).
// Theme: test15-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'decimal-percent.php'

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

$moduleTitle = 'Decimal to Percent Conversion';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Format a scaled integer as decimal string with $places decimal places
// (trailing zeros trimmed). E.g., scaled=4500, places=4 &#8594; "0.45".
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

function canon_decimal($s) {
    $s = trim((string)$s);
    $s = preg_replace('/[^0-9.]/', '', $s);
    if ($s === '' || $s === '.') return '0';
    $parts = explode('.', $s, 2);
    $ip = ltrim($parts[0], '0');
    if ($ip === '') $ip = '0';
    $fp = rtrim($parts[1] ?? '', '0');
    return $fp === '' ? $ip : $ip . '.' . $fp;
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
    $isCorrect = $scorer->processAnswer(canon_decimal($clicked), $cur['ans_canon'], $cur['lvl']);

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
    // [numLimit1, numLimit2, placeLimit1, placeLimit2]
    $configs = [
        4 => [
            'Easy' => [1,  49,  1, 3],
            'Hard' => [11, 99,  2, 3],   // legacy Medium
        ],
        5 => [
            'Easy' => [1,  99,  1, 3],
            'Hard' => [11, 999, 2, 4],   // legacy Medium
        ],
        6 => [
            'Easy' => [1,  999, 1, 4],
            'Hard' => [11, 9999, 2, 6],  // legacy Medium
        ],
    ];
    [$numLimit1, $numLimit2, $placeLimit1, $placeLimit2] = $configs[$grd][$lvl];

    $places = rand($placeLimit1, $placeLimit2);
    $num1   = rand($numLimit1, $numLimit2);

    // Ensure value is positive and not an exact integer
    $decimalStr = scaled_to_str($num1, $places);

    // Answer = decimal × 100. Formatted via integer math to avoid float noise.
    // answerPercentScaled / 10^places = (num1 * 100) / 10^places
    $ansScaled = $num1 * 100;
    $ansStr    = scaled_to_str($ansScaled, $places);
    $ansCanon  = canon_decimal($ansStr);

    // Distractor candidates: wrong decimal moves
    $cands = [
        scaled_to_str($num1 * 1000,  $places),   // ×10
        scaled_to_str($num1 * 10,    $places),   // ÷10
        scaled_to_str($num1 * 10000, $places),   // ×100
        scaled_to_str($num1,         $places),   // ÷100 (forgot conversion)
    ];

    // Filter, dedupe
    $seen = [$ansCanon => true];
    $distractors = [];
    shuffle($cands);
    foreach ($cands as $c) {
        $cc = canon_decimal($c);
        if (isset($seen[$cc])) continue;
        $seen[$cc] = true;
        $distractors[] = $c;
        if (count($distractors) >= 3) break;
    }

    // Fallback if not enough distinct
    $mult = 100000;
    while (count($distractors) < 3) {
        foreach ([$num1 * $mult, intdiv($num1, 1) * 1] as $k) {
            $c = scaled_to_str($k, $places);
            $cc = canon_decimal($c);
            if (!isset($seen[$cc])) {
                $seen[$cc] = true;
                $distractors[] = $c;
                break;
            }
        }
        $mult *= 10;
        if ($mult > 10000000000) break;
    }

    $choices = array_merge([$ansStr], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'decimalStr' => $decimalStr,
        'ans'        => $ansStr,
        'ans_canon'  => $ansCanon,
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
        Your answer: <strong style="color:#CC0066; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>%'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:20px;">
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['decimalStr']); ?></strong>
        =
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['ans']); ?>%</strong>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:30px;">
        Convert the decimal to a percent:
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
                <?php echo htmlspecialchars($c); ?>%
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