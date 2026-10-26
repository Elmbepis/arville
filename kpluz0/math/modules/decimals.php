<?php
// math/modules/decimals.php
// Single-input decimal free-text. num2/num1 where num1 is a power of 10.
// Three presentation styles (division, fraction, verbal).
// Bypass pattern §D category 2.
//
// Legacy: all grades, 3 levels. New: 2 levels, Hard = legacy Medium (§E).
//   Easy: num2 &#8712; [1,199],   num1 = 10^rand(1,2)
//   Hard: num2 &#8712; [1,1999],  num1 = 10^rand(1,3)
//
// FIX #1: legacy scored via float compare. Rebuilt with canonical decimal
//         strings — "0.25", "0.250", ".25" all compare equal.
// FIX #2: legacy rebuilt feedback from a pre-rendered $exp session string
//         (fragile across re-renders). Rebuilt fresh from stored data.
// Theme: test26b-* is 136/547/136 — does not fit §C &#8594; paper-69-*.
//
// DB row required: modules.url = 'decimals.php'

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

$moduleTitle = 'Understanding Decimals';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Helpers ----

// Canonicalise a decimal string: "0.25"/"0.250"/".25"/" 0.25 " all &#8594; "0.25"
function canon_decimal($s) {
    $s = trim((string)$s);
    $s = preg_replace('/[^0-9.]/', '', $s);
    if ($s === '' || $s === '.') return '0';
    $parts = explode('.', $s, 2);
    $ip = $parts[0];
    $fp = $parts[1] ?? '';
    $ip = $ip === '' ? '0' : ltrim($ip, '0');
    if ($ip === '') $ip = '0';
    $fp = rtrim($fp, '0');
    return $fp === '' ? $ip : $ip . '.' . $fp;
}

// Build exact decimal string for num2/num1 where num1 is a power of 10.
function dec_from_frac($num2, $num1) {
    $places = strlen((string)$num1) - 1;                 // 10&#8594;1, 100&#8594;2, ...
    $numStr = str_pad((string)$num2, $places, '0', STR_PAD_LEFT);
    $ip = substr($numStr, 0, -$places);
    $fp = substr($numStr, -$places);
    if ($ip === '') $ip = '0';
    $fp = rtrim($fp, '0');
    return $fp === '' ? $ip : $ip . '.' . $fp;
}

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $userRaw   = trim((string)($_POST['answer'] ?? ''));
    $userCanon = canon_decimal($userRaw);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($userCanon, $cur['ans_canon'], $cur['lvl']);

    $result = [
        'correct'   => $isCorrect,
        'userRaw'   => $userRaw,
        'cur'       => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Level-driven ranges (no grade differentiation in legacy)
    if ($lvl == 'Easy') {
        $numlim1 = 1; $numlim2 = 199;
        $faclim1 = 1; $faclim2 = 2;
    } else {  // Hard = legacy Medium, §E
        $numlim1 = 1; $numlim2 = 1999;
        $faclim1 = 1; $faclim2 = 3;
    }

    // Generate num2, num1 such that num2/num1 is NOT a whole number
    $safety = 0;
    do {
        $num2 = rand($numlim1, $numlim2);
        $num1 = (int)pow(10, rand($faclim1, $faclim2));
        $safety++;
    } while ($num2 % $num1 == 0 && $safety < 100);   // §I

    $ansStr   = dec_from_frac($num2, $num1);
    $ansCanon = canon_decimal($ansStr);

    // Presentation style
    $qnum = rand(1, 3);

    $placeNames = [
        10     => 'tenths',
        100    => 'hundredths',
        1000   => 'thousandths',
        10000  => 'ten-thousandths',
        100000 => 'hundred-thousandths',
    ];

    if ($qnum == 1) {
        $prompt = "$num2 divided by $num1";
    } elseif ($qnum == 2) {
        $prompt = "the fraction $num2/$num1";
    } else {
        $th = $placeNames[$num1] ?? 'tenths';
        $prompt = "$num2 $th";
    }

    $_SESSION[$sessionKey]['current'] = [
        'num1'      => $num1,
        'num2'      => $num2,
        'ans'       => $ansStr,
        'ans_canon' => $ansCanon,
        'prompt'    => $prompt,
        'qnum'      => $qnum,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['userRaw']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        <?php echo htmlspecialchars($result['cur']['prompt']); ?>
        is equal to
        <strong style="color:#CC0066; font-size:16pt;"><?php echo htmlspecialchars($result['cur']['ans']); ?></strong>.
    </p>
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:30px;">
        What decimal number represents<br>
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['prompt']); ?></strong> ?
    </p>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin:20px 0;">
<input type="text" name="answer" class="frac-input frac-single" autocomplete="off" autofocus
       maxlength="<?php echo strlen($q['ans']) + 2; ?>"
       style="width:<?php echo max(120, (strlen($q['ans']) + 2) * 22); ?>px;">
           </p>
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