<?php
// math/modules/elapsed-time.php
// COMPUTED + choice. Bypass QEngine per §D (answer is arithmetic/formatting,
// distractors are mutated hour/min/sec — QEngine can't express this).
//
// Levels: Easy = no hours in answer (legacy Easy)
//         Hard = 3-23 hours in answer (legacy Hard; legacy Medium merged to Easy)
//
// Preserved quirks:
//   • 24-hour clock display randomly applied per-time for grade &#8805; 5 (§N).
//   • Legacy $end0 = $start0 reference bug — fixed here with `clone $start0`
//     (the legacy accidentally worked because $start strings were captured
//      before the reference assignment, but `clone` is correct and safe).
//   • Exact distractor construction preserved (wrong min, wrong sec, or
//     wrong hour with correct min+sec).
//   • $grd bug fix (§H): was used but never set &#8594; now reads $_SESSION['grade'].
//
// Theme: test73b-* (110/582/108) &#8594; paper-69-* (75/655/70).
// DB row required: modules.url = 'elapsed-time.php'

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

$moduleTitle = 'Calculating Elapsed Time';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = (int)($_SESSION['grade'] ?? 0);  // §H bug fix — was never set in legacy

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

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
    // Start time — random 1-23h, 1-58m, 1-59s into a base day
    $start0 = new DateTime('2000-01-01');
    $addh   = rand(1, 23);
    $addm   = rand(1, 58);
    $adds   = rand(1, 59);
    $start0->add(new DateInterval("PT{$addh}H{$addm}M{$adds}S"));
    $start  = date_format($start0, 'g:i:s a, l');
    $start2 = date_format($start0, 'H:i:s, l');

    // Elapsed interval — Easy: no hours; Hard: 3-23 hours
    $addh2 = rand(3, 23);
    if ($lvl === 'Easy') $addh2 = 0;
    $addm2 = rand(6, 58);
    $adds2 = rand(6, 59);

    // End time — clone avoids legacy reference-copy bug
    $end0 = clone $start0;
    $end0->add(new DateInterval("PT{$addh2}H{$addm2}M{$adds2}S"));
    $end  = date_format($end0, 'g:i:s a, l');
    $end2 = date_format($end0, 'H:i:s, l');

    // Correct answer
    $ans = "{$addm2} m, {$adds2} s";
    if ($addh2 > 0) $ans = "{$addh2} h, {$ans}";

    // Distractors — preserve exact legacy construction
    $wh = 0;
    if ($addh2 > 0) {
        $wh = $addh2 + 1;
        if (rand(1, 2) === 1) $wh = $addh2 - 1;
    }
    $wm = $addm2 + 1;
    if (rand(1, 2) === 1) $wm = $addm2 - 1;
    $ws = $adds2 + 1;
    if (rand(1, 2) === 1) $ws = $adds2 - 1;

    $ch    = [];
    $ch[0] = $ans;

    $ch[1] = "{$wm} m, {$adds2} s";
    if ($addh2 > 0) {
        if (rand(1, 2) === 1) $ch[1] = "{$addh2} h, {$ch[1]}";
        else                  $ch[1] = "{$wh} h, {$ch[1]}";
    }

    $ch[2] = "{$addm2} m, {$ws} s";
    if ($addh2 > 0) {
        if (rand(1, 2) === 1) $ch[2] = "{$addh2} h, {$ch[2]}";
        else                  $ch[2] = "{$wh} h, {$ch[2]}";
    }

    $ch[3] = "{$wm} m, {$ws} s";
    if ($addh2 > 0) {
        if (rand(1, 2) === 1) $ch[3] = "{$addh2} h, {$ch[3]}";
        else                  $ch[3] = "{$wh} h, {$addm2} m, {$adds2} s";
    }

    // 24-hour clock option for grade >= 5 (per-time random, preserved)
    if ($grd >= 5) {
        if (rand(1, 2) === 1) $start = $start2;
        if (rand(1, 2) === 1) $end   = $end2;
    }

    shuffle($ch);

    $_SESSION[$sessionKey]['current'] = [
        'start'   => $start,
        'end'     => $end,
        'answer'  => $ans,
        'choices' => $ch,
        'lvl'     => $lvl,
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
    'score_top'     => $base . '/math/images/score-top-4.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-4.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; font-weight:700; color:#800080; margin-top:20px; max-width:640px; margin-left:auto; margin-right:auto;">
        The elapsed time from
<span style="color:#CC0066;"><?php echo htmlspecialchars($cur['start']); ?></span>
to<br/>
<span style="color:#CC0066;"><?php echo htmlspecialchars($cur['end']); ?></span>
        is
        <span style="color:#0000BB;"><?php echo htmlspecialchars($cur['answer']); ?></span>.
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div style="font-size:16pt; font-weight:600; color:#800080; max-width:600px; margin:30px auto; line-height:1.5;">
        <strong>Start:</strong> <?php echo htmlspecialchars($q['start']); ?><br>
        <strong>End:</strong> <?php echo htmlspecialchars($q['end']); ?><br>
        <span style="font-size:17pt; font-weight:700;">What is the elapsed time?</span>
    </div>
    <p style="font-size:13pt; color:#444; margin-top:20px;">Click on your answer.</p>
    <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
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