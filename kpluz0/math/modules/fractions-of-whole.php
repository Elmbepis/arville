<?php
// math/modules/fractions-of-whole.php
// Single-input computed free-text. "numer/denom of base = ?"
// Bypass pattern §D category 2.
//
// Legacy: grades 3-6, 3 levels (Easy/Medium/Hard).
// New: grades 3-6, 2 levels — Hard = legacy Medium (§E calibration).
// Theme: legacy test24b-* is 136/547/136 — does not fit §C standard &#8594; paper-69-*.

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

$moduleTitle = 'Fractions of Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(3, (int)($_SESSION['grade'] ?? 3)));   // clamp — module is grades 3-6

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userInput = (int)trim((string)($_POST['answer'] ?? '0'));   // §F.1

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
    if ($grd == 3) {
        if ($lvl == 'Easy') { $numerlim1=1; $numerlim2=6;  $denomlim1=1; $denomlim2=9;  $numfac1=4;  $numfac2=10; }
        else                { $numerlim1=1; $numerlim2=9;  $denomlim1=3; $denomlim2=9;  $numfac1=8;  $numfac2=18; }
    } elseif ($grd == 4) {
        if ($lvl == 'Easy') { $numerlim1=1; $numerlim2=10; $denomlim1=4; $denomlim2=10; $numfac1=14; $numfac2=35; }
        else                { $numerlim1=2; $numerlim2=14; $denomlim1=5; $denomlim2=14; $numfac1=19; $numfac2=80; }
    } elseif ($grd == 5) {
        if ($lvl == 'Easy') { $numerlim1=1; $numerlim2=12; $denomlim1=4; $denomlim2=12; $numfac1=14; $numfac2=39; }
        else                { $numerlim1=2; $numerlim2=16; $denomlim1=7; $denomlim2=19; $numfac1=29; $numfac2=80; }
    } else {  // grd 6
        if ($lvl == 'Easy') { $numerlim1=1; $numerlim2=15; $denomlim1=4; $denomlim2=15; $numfac1=14; $numfac2=39; }
        else                { $numerlim1=2; $numerlim2=20; $denomlim1=7; $denomlim2=22; $numfac1=29; $numfac2=80; }
    }

    // ---- Pick numer, denom ----
    $safety = 0;
    if ($lvl == 'Easy') {
        // Easy: proper fraction (denom > numer)
        do {
            $numer = rand($numerlim1, $numerlim2);
            $denom = rand($denomlim1, $denomlim2);
            $safety++;
        } while ($denom <= $numer && $safety < 100);   // §I
    } else {
        // Hard: denom != numer (allow improper)
        do {
            $numer = rand($numerlim1, $numerlim2);
            $denom = rand($denomlim1, $denomlim2);
            $safety++;
        } while ($denom == $numer && $safety < 100);
    }

    // ---- Compute base and answer (integer math, exact) ----
    $factor = rand($numfac1, $numfac2);
    $baseNum = $factor * $denom;   // base is always a multiple of denom
    $ans     = $factor * $numer;   // always integer

    $_SESSION[$sessionKey]['current'] = [
        'numer' => $numer,
        'denom' => $denom,
        'base'  => $baseNum,
        'ans'   => $ans,
        'lvl'   => $lvl,
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
        <?php echo $result['cur']['numer'] . '/' . $result['cur']['denom']; ?>
        of <?php echo $result['cur']['base']; ?> =
        <strong style="color:#CC0066; font-size:16pt;"><?php echo $result['cur']['ans']; ?></strong>.
    </p>
<?php else: ?>
    <div style="display:inline-flex; align-items:center; justify-content:center; gap:24px; margin:40px auto; flex-wrap:wrap;">
        <div style="display:inline-flex; flex-direction:column; align-items:center; font-size:32pt; font-weight:700; color:#800080; font-family:'Comic Sans MS', cursive; line-height:1;">
            <span><?php echo $q['numer']; ?></span>
            <div style="border-top:4px solid #800080; width:100%; min-width:80px;"></div>
            <span><?php echo $q['denom']; ?></span>
        </div>
        <div style="font-size:22pt; font-weight:700; color:#444;">of</div>
        <div style="font-size:32pt; font-weight:700; color:#CC0066;"><?php echo $q['base']; ?></div>
        <div style="font-size:32pt; font-weight:700; color:#444;">=</div>
        <input type="text" name="answer" maxlength="<?php echo strlen((string)$q['ans']) + 2; ?>"
               style="width:<?php echo max(100, (strlen((string)$q['ans']) + 2) * 32); ?>px; height:50px; font-size:26px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
               autocomplete="off" autofocus>
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