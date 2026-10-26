<?php
// math/modules/dec-place-values.php
// Single-digit free-text. Given a decimal, identify the digit at a named place.
// Bypass pattern §D category 2.
//
// Legacy: grades 3-6, 3 levels. New: grades 3-6, 2 levels, Hard = legacy Medium (§E).
//   Easy: grade 3&#8594;2 places, 4&#8594;3, 5&#8594;4, 6&#8594;6
//   Hard: grade 3&#8594;3 places, 4&#8594;4, 5&#8594;5, 6&#8594;7
//
// FIX #1: legacy placedig = substr() on a float. At 7-8 places that risks
//         precision loss. Rebuilt with string arithmetic — no float in play.
// FIX #2: legacy leaves $placelimit undefined for grades outside [3,6].
//         Clamped below.
// Theme: test12-* is 136/566/136 — does not fit §C &#8594; paper-69-*.
//
// DB row required: modules.url = 'dec-place-values.php'

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

$moduleTitle = 'Decimal Place Values';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(3, (int)($_SESSION['grade'] ?? 3)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$placenames = [
    1 => 'tenths',
    2 => 'hundredths',
    3 => 'thousandths',
    4 => 'ten thousandths',
    5 => 'hundred thousandths',
    6 => 'millionths',
    7 => 'ten millionths',
    8 => 'hundred millionths',
];

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $userInput = (int)trim((string)($_POST['answer'] ?? '0'));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer((string)$userInput, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct'   => $isCorrect,
        'userInput' => $userInput,
        'cur'       => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Config: number of decimal places per grade+level (Hard = legacy Medium, §E)
    $configs = [
        3 => ['Easy' => 2, 'Hard' => 3],
        4 => ['Easy' => 3, 'Hard' => 4],
        5 => ['Easy' => 4, 'Hard' => 5],
        6 => ['Easy' => 6, 'Hard' => 7],
    ];
    $placelimit = $configs[$grd][$lvl];

    // Generate unique digits.
    //   dig0 = integer part, 0-9
    //   dig1 = tenths, 0-9 (&#8800; dig0)
    //   dig2..digN = rand(1,9), unique, non-zero
    $digits = [];
    $digits[0] = rand(0, 9);

    $safety = 0;
    do { $digits[1] = rand(0, 9); $safety++; }
    while ($digits[1] == $digits[0] && $safety < 100);   // §I

    for ($i = 2; $i <= $placelimit; $i++) {
        $safety = 0;
        do {
            $d = rand(1, 9);
            $safety++;
        } while (in_array($d, $digits, true) && $safety < 100);
        $digits[$i] = $d;
    }

    // Build the number as a string (no float precision issues)
    $numStr = (string)$digits[0] . '.';
    for ($i = 1; $i <= $placelimit; $i++) {
        $numStr .= $digits[$i];
    }

    $place     = rand(1, $placelimit);
    $placename = $placenames[$place];
    $placedig  = (int)$digits[$place];   // place=1 &#8594; dig1, etc.

    $_SESSION[$sessionKey]['current'] = [
        'num'       => $numStr,
        'place'     => $place,
        'placename' => $placename,
        'ans'       => $placedig,
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
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo $result['userInput']; ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        The digit that occupies the
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['cur']['placename']); ?>'</strong>
        place<br/>of the number
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($result['cur']['num']); ?></strong>
        is <strong style="color:#CC0066; font-size:16pt;"><?php echo $result['cur']['ans']; ?></strong>.
    </p>
<?php else: ?>
    <p style="font-size:15pt; font-weight:600; color:#800080; margin-top:30px;">
        Which of the digits of the number
        <strong style="color:#CC0066; font-size:18pt;"><?php echo htmlspecialchars($q['num']); ?></strong>
        <br/>has a place value of
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($q['placename']); ?>'</strong>?
    </p>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin:20px 0;">
        Answer:
<input type="text" name="answer" class="frac-input frac-single" autocomplete="off" autofocus
       maxlength="1" style="width:75px; min-width:75px; padding:0 4px;">
              
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