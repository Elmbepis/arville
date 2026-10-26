<?php
// math/modules/decimals-add.php
// Decimal addition. Single free-text answer, equation card display.
// Bypass §D category 2. Levels: Easy = legacy Easy, Hard = legacy Medium (§E).
//
// FIX #1: legacy scored via abs($ans - $input) < 1e-6 &#8594; canonical strings.
// FIX #2: legacy grade clamp — 0-2 / 7-8 left $numlimit undefined.
// FIX #3: uniform 22pt equation / 20pt input, no wrap. Sized to fit the
//         worst-case grade 6 Hard (2 × 9-char operands + 10-char answer).
// Theme: test07-* is 136/547/136 — does not fit §C &#8594; paper-69-*.
//
// DB row required: modules.url = 'decimals-add.php'

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

$moduleTitle = 'Decimal Number Addition';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(3, (int)($_SESSION['grade'] ?? 3)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

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

function make_operand($cfg) {
    return [
        'int'    => rand($cfg['intMin'], $cfg['intMax']),
        'dec'    => rand($cfg['decMin'], $cfg['decMax']),
        'places' => rand($cfg['placesMin'], $cfg['placesMax']),
    ];
}

function format_operand($op) {
    $scale = (int)pow(10, $op['places']);
    $total = $op['int'] * $scale + $op['dec'];
    $whole = intdiv($total, $scale);
    $frac  = $total % $scale;
    if ($frac === 0) return (string)$whole;
    $fracStr = rtrim(str_pad((string)$frac, $op['places'], '0', STR_PAD_LEFT), '0');
    return $whole . '.' . $fracStr;
}

function scaled_at($op, $commonPlaces) {
    $pow = (int)pow(10, $commonPlaces - $op['places']);
    return $op['int'] * (int)pow(10, $commonPlaces) + $op['dec'] * $pow;
}

function format_scaled($scaled, $places) {
    $scale = (int)pow(10, $places);
    $whole = intdiv($scaled, $scale);
    $frac  = $scaled % $scale;
    if ($frac === 0) return (string)$whole;
    $fracStr = rtrim(str_pad((string)$frac, $places, '0', STR_PAD_LEFT), '0');
    return $whole . '.' . $fracStr;
}

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $userCanon = canon_decimal($_POST['answer'] ?? '');

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($userCanon, $cur['ans_canon'], $cur['lvl']);

    $result = [
        'correct'   => $isCorrect,
        'userInput' => trim((string)($_POST['answer'] ?? '')),
        'cur'       => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $configs = [
        3 => [
            'Easy' => ['intMin'=>0, 'intMax'=>0, 'placesMin'=>1, 'placesMax'=>1, 'decMin'=>1, 'decMax'=>9],
            'Hard' => ['intMin'=>0, 'intMax'=>9, 'placesMin'=>1, 'placesMax'=>1, 'decMin'=>1, 'decMax'=>9],
        ],
        4 => [
            'Easy' => ['intMin'=>1, 'intMax'=>9,  'placesMin'=>1, 'placesMax'=>1, 'decMin'=>1,  'decMax'=>9],
            'Hard' => ['intMin'=>1, 'intMax'=>99, 'placesMin'=>2, 'placesMax'=>2, 'decMin'=>11, 'decMax'=>99],
        ],
        5 => [
            'Easy' => ['intMin'=>1, 'intMax'=>99,  'placesMin'=>2, 'placesMax'=>3, 'decMin'=>7, 'decMax'=>999],
            'Hard' => ['intMin'=>1, 'intMax'=>299, 'placesMin'=>2, 'placesMax'=>4, 'decMin'=>7, 'decMax'=>999],
        ],
        6 => [
            'Easy' => ['intMin'=>1, 'intMax'=>299, 'placesMin'=>3, 'placesMax'=>4, 'decMin'=>7,  'decMax'=>999],
            'Hard' => ['intMin'=>1, 'intMax'=>999, 'placesMin'=>4, 'placesMax'=>5, 'decMin'=>99, 'decMax'=>9999],
        ],
    ];
    $cfg = $configs[$grd][$lvl];

    $op1 = make_operand($cfg);
    $op2 = make_operand($cfg);
    $num1Str = format_operand($op1);
    $num2Str = format_operand($op2);

    $commonPlaces = max($op1['places'], $op2['places']);
    $sumScaled = scaled_at($op1, $commonPlaces) + scaled_at($op2, $commonPlaces);
    $ansStr   = format_scaled($sumScaled, $commonPlaces);
    $ansCanon = canon_decimal($ansStr);

    $_SESSION[$sessionKey]['current'] = [
        'num1Str'   => $num1Str,
        'num2Str'   => $num2Str,
        'ansStr'    => $ansStr,
        'ans_canon' => $ansCanon,
        'lvl'       => $lvl,
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
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['userInput']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <div class="equation-card" style="margin-top:20px; padding:20px 25px;">
        <div class="equation-inline" style="font-size:22pt; flex-wrap:nowrap;">
            <span><?php echo htmlspecialchars($result['cur']['num1Str']); ?></span>
            <span class="op">+</span>
            <span><?php echo htmlspecialchars($result['cur']['num2Str']); ?></span>
            <span class="op">=</span>
            <span style="color:#CC0066;"><?php echo htmlspecialchars($result['cur']['ansStr']); ?></span>
        </div>
    </div>
<?php else: ?>
    <?php
    $ansLen  = strlen($q['ansStr']);
    $inputPx = max(130, ($ansLen + 2) * 18);
    ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:30px;">
        Add the decimal numbers.
    </p>
    <div class="equation-card" style="margin-top:20px; padding:20px 25px;">
        <div class="equation-inline" style="font-size:22pt; flex-wrap:nowrap;">
            <span><?php echo htmlspecialchars($q['num1Str']); ?></span>
            <span class="op">+</span>
            <span><?php echo htmlspecialchars($q['num2Str']); ?></span>
            <span class="op">=</span>
            <input type="text" name="answer" autocomplete="off" autofocus
                   maxlength="<?php echo $ansLen + 2; ?>"
                   style="width:<?php echo $inputPx; ?>px; font-size:20pt; height:50px;">
        </div>
    </div>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php endif; ?>

<?php if ($result !== null): ?>
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