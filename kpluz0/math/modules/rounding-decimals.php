<?php
// math/modules/rounding-decimals.php
// FILL-IN-THE-BLANKS. Round a decimal to a named place.
// Adaptive input box sized to expected answer length.
//
// Levels: Easy = legacy Easy; Hard = legacy Medium (§E).
// Legacy Hard's extreme ranges dropped for playability.
//
// Comparison: canonical decimal string (trailing zeros stripped).
// Display: exact requested precision via number_format.
// Theme: test20b-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'rounding-decimals.php'

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

$moduleTitle = 'Rounding Off Decimals';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function canon_decimal($v) {
    $r = round((float)$v, 10);
    if (abs($r - round($r)) < 0.0000000001) return (string)(int)round($r);
    return rtrim(rtrim(number_format($r, 10, '.', ''), '0'), '.');
}

$placeNames = [
    1 => 'tenth',
    2 => 'hundredth',
    3 => 'thousandth',
    4 => 'ten thousandth',
    5 => 'hundred thousandth',
    6 => 'millionth',
    7 => 'ten millionth',
];

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $userRaw = trim((string)($_POST['answer'] ?? ''));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer(canon_decimal($userRaw), $cur['ans_canon'], $cur['lvl']);

    $result = [
        'correct'    => $isCorrect,
        'userAnswer' => $userRaw,
        'cur'        => $cur,
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
            'Easy' => [11,     999,     1, 2],
            'Hard' => [101,    9999,    1, 3],   // legacy Medium
        ],
        5 => [
            'Easy' => [101,    9999,    1, 3],
            'Hard' => [1001,   99999,   1, 4],   // legacy Medium
        ],
        6 => [
            'Easy' => [10001,  999999,  1, 5],
            'Hard' => [100001, 9999999, 3, 6],   // legacy Medium
        ],
    ];
    [$numLimit1, $numLimit2, $placeLimit1, $placeLimit2] = $configs[$grd][$lvl];

    // Generate raw number, avoiding trailing zero
    $safety = 0;
    do {
        $num = rand($numLimit1, $numLimit2);
        $safety++;
    } while (substr((string)$num, -1) === '0' && $safety < 50);

    $place1 = rand($placeLimit1, $placeLimit2);
    $num2   = $num / pow(10, $placeLimit2 + 1);
    $ans    = round($num2, $place1);

    $placename = $placeNames[$place1];

    $num2Disp = canon_decimal($num2);
    $ansCanon = canon_decimal($ans);
    $ansDisp  = number_format($ans, $place1, '.', '');

    // Adaptive box width based on expected answer length
    $ansLen = strlen($ansDisp);
    if ($ansLen < 5)       { $boxWidth = 130; }
    elseif ($ansLen < 8)   { $boxWidth = 190; }
    elseif ($ansLen < 11)  { $boxWidth = 240; }
    else                   { $boxWidth = 300; }

    $_SESSION[$sessionKey]['current'] = [
        'num'         => $num2Disp,
        'placename'   => $placename,
        'place1'      => $place1,
        'ans'         => $ans,
        'ans_canon'   => $ansCanon,
        'ans_disp'    => $ansDisp,
        'boxWidth'    => $boxWidth,
        'lvl'         => $lvl,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' : Level ' . $grd . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#CC0066; font-size:16pt;">'<?php echo htmlspecialchars($result['userAnswer']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        The number <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['num']); ?></strong>,
        when rounded to the nearest <strong><?php echo htmlspecialchars($cur['placename']); ?></strong>,
        is <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['ans_disp']); ?></strong>.
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:25px;">
        Round off the number
    </p>
    <p style="font-size:22pt; font-weight:700; color:#CC0066; margin:10px 0;">
        <?php echo htmlspecialchars($q['num']); ?>
    </p>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-bottom:20px;">
        to the nearest <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['placename']); ?></strong>.
    </p>

    <p>
        <input type="text" name="answer"
               maxlength="<?php echo strlen($q['ans_disp']) + 5; ?>"
               style="width:<?php echo $q['boxWidth']; ?>px; height:52px; font-size:26px; text-align:center; border:2px solid #888; border-radius:8px; color:#0000CC; font-weight:700; padding:0 8px; box-sizing:border-box;"
               spellcheck="false" autocomplete="off" autofocus>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
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