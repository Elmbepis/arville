<?php
// math/modules/percent-decimal.php
// MULTIPLE CHOICE (4 choices). Convert percent to decimal.
// Uses ?ansclick=X + 2x2 grid.
//
// FIX: $percentValue now derived from $decimalValue * 100, not $num1.
// Previously the displayed percent was $num1, but the true percent is
// $decimalValue * 100 — so a module that stored answer 2.4 displayed "24%"
// instead of "240%", causing students to enter 0.24 and be marked wrong.
//
// Distractor logic: decimal-point-move misconception —
//   ×10 / ÷10 / ×100 / ÷100 of the correct value. Filters duplicates.
//
// Levels: Easy = legacy Easy; Hard = legacy Medium (§E).
// Theme: test16-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'percent-decimal.php'

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

$moduleTitle = 'Percent to Decimal Conversion';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function canon_dec($v) {
    $v = (float)preg_replace('/[^0-9.\-]/', '', (string)$v);
    $r = round($v, 10);
    if (abs($r - round($r)) < 0.0000001) return (string)(int)round($r);
    return rtrim(rtrim(number_format($r, 10, '.', ''), '0'), '.');
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
    // [numLimit1, numLimit2, placeLimit1, placeLimit2]
    $configs = [
        4 => [
            'Easy' => [1,  49,  1, 2],
            'Hard' => [11, 99,  1, 3],   // legacy Medium
        ],
        5 => [
            'Easy' => [1,  99,  1, 2],
            'Hard' => [11, 999, 1, 4],   // legacy Medium
        ],
        6 => [
            'Easy' => [1,  999,  1, 3],
            'Hard' => [11, 99999, 1, 5], // legacy Medium
        ],
    ];
    [$numLimit1, $numLimit2, $placeLimit1, $placeLimit2] = $configs[$grd][$lvl];

    $places = rand($placeLimit1, $placeLimit2);
    $scale  = (int)pow(10, $places);
    $num1   = rand($numLimit1, $numLimit2);

    // FIXED: $decimalValue is the answer; $percentValue is what's displayed
    // before the % sign. Percent = decimal * 100 always.
    $decimalValue = $num1 / $scale;
    $percentValue = $decimalValue * 100;
    $percentStr   = rtrim(rtrim(number_format($percentValue, 6, '.', ''), '0'), '.');

    $ansCanon = canon_dec($decimalValue);
    $ansStr   = $ansCanon;

    // Distractor candidates: wrong decimal-point moves
    $cands = [
        canon_dec($decimalValue * 10),   // ×10
        canon_dec($decimalValue / 10),   // ÷10
        canon_dec($percentValue),        // forgot ÷100 (numeric percent value)
        canon_dec($decimalValue / 100),  // ÷100
    ];

    // Dedupe + filter correct + pick 3
    $seen = [$ansCanon => true];
    $distractors = [];
    shuffle($cands);
    foreach ($cands as $c) {
        if (isset($seen[$c])) continue;
        $seen[$c] = true;
        $distractors[] = $c;
        if (count($distractors) >= 3) break;
    }

    // Fallback if not enough distinct
    $mult = 1000;
    while (count($distractors) < 3 && $mult < 1000000000) {
        foreach ([$decimalValue * $mult, $decimalValue / $mult] as $cv) {
            $c = canon_dec($cv);
            if (!isset($seen[$c])) {
                $seen[$c] = true;
                $distractors[] = $c;
                break;
            }
        }
        $mult *= 10;
    }

    $choices = array_merge([$ansStr], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'percentStr' => $percentStr,
        'ans_str'    => $ansStr,
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
        Your answer: <strong style="color:#CC0066; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:20pt; font-weight:700; color:#800080; margin-top:20px;">
        <span style="color:#CC0066;"><?php echo htmlspecialchars($cur['percentStr']); ?>%</span>
        =
        <span style="color:#CC0066;"><?php echo htmlspecialchars($cur['ans_str']); ?></span>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:30px;">
        Convert the percent to a decimal:
    </p>

    <p style="font-size:30pt; font-weight:700; color:#CC0066; margin:20px 0;">
        <?php echo htmlspecialchars($q['percentStr']); ?>% = ?
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