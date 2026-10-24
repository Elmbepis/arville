<?php
// math/modules/time-conversion.php
// Computed free-text (single or dual input). Time unit conversions.
// Feedback shows direct conversion (e.g., "1 minute = 60 seconds") — no × / ÷ symbols, no period.
// Grade &#8804;2: Easy = 1-digit multiplier (q1-4), Hard = 2-digit multiplier (q5-8).
// Grade &#8805;3: mixed mode (single for q1-4, q9-11; dual for q5-8).
// Singularization: any "1 <unit>" renders as "1 <singular>".

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

$moduleTitle = 'Time Conversion';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = max(2, min(4, $grd));  // clamp: <2&#8594;2, >4&#8594;4

// Singularize a unit label based on a number.
function unitDisplay($n, $unit) {
    if ((int)$n !== 1) return $unit;
    $singularMap = [
        'minutes' => 'minute',  'mins' => 'min',
        'seconds' => 'second',  'secs' => 'sec',
        'hours'   => 'hour',    'hrs'  => 'hr',
        'days'    => 'day',
        'weeks'   => 'week',    'wks'  => 'wk',
    ];
    return $singularMap[$unit] ?? $unit;
}

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $scorer = new Scorer($conn, $moduleId);

    if ($cur['dual']) {
        $s1 = (int)trim((string)($_POST['answer1'] ?? ''));
        $s2 = (int)trim((string)($_POST['answer2'] ?? ''));
        $studentCombined = "$s1|$s2";
    } else {
        $s1 = (int)trim((string)($_POST['answer'] ?? ''));
        $s2 = 0;
        $studentCombined = (string)$s1;
    }

    $isCorrect = $scorer->processAnswer($studentCombined, $cur['correctAnswer'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'dual'    => $cur['dual'],
        's1'      => $s1,
        's2'      => $s2,
        'ans1'    => $cur['ans1'],
        'ans2'    => $cur['ans2'],
        'qunit1'  => $cur['qunit1'],
        'qunit2'  => $cur['qunit2'],
        'exp'     => $cur['exp'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($grdKey <= 2) {
        // Simple single-input mode.
        if ($lvl === 'Easy') {
            $num1 = rand(1, 9);
            $q    = rand(1, 4);
        } else {
            $num1 = rand(10, 18);
            $q    = rand(5, 8);
        }
        $mode = 'simple';
    } else {
        // Mixed mode (multi-part display, dual for q5-8)
        if ($lvl === 'Easy') { $num1 = rand(2, 10); $q = rand(1, 4); }
        else                 { $num1 = rand(3, 12); $q = rand(5, 11); }
        $num2sm = rand(2, 59);
        $num2h  = rand(2, 23);
        $num2d  = rand(2, 6);
        $mode   = 'advanced';
    }

    $dual  = false;
    $ans1  = 0; $ans2 = 0;
    $qunit1 = ''; $qunit2 = '';
    $qDisplay = '';
    $correctAnswer = '';
    $exp = '';

    if ($mode === 'simple') {
        // Grade &#8804;2 single-input conversions — direct format: "5 minutes = 300 seconds"
        switch ($q) {
            case 1:
                $qDisplay = "$num1 " . unitDisplay($num1, 'minutes');
                $qunit2   = 'seconds';
                $ans1     = $num1 * 60;
                $exp      = "$num1 " . unitDisplay($num1, 'minutes') . " = $ans1 " . unitDisplay($ans1, 'seconds');
                break;
            case 2:
                $qDisplay = "$num1 " . unitDisplay($num1, 'hours');
                $qunit2   = 'minutes';
                $ans1     = $num1 * 60;
                $exp      = "$num1 " . unitDisplay($num1, 'hours') . " = $ans1 " . unitDisplay($ans1, 'minutes');
                break;
            case 3:
                $qDisplay = "$num1 " . unitDisplay($num1, 'days');
                $qunit2   = 'hours';
                $ans1     = $num1 * 24;
                $exp      = "$num1 " . unitDisplay($num1, 'days') . " = $ans1 " . unitDisplay($ans1, 'hours');
                break;
            case 4:
                $qDisplay = "$num1 " . unitDisplay($num1, 'weeks');
                $qunit2   = 'days';
                $ans1     = $num1 * 7;
                $exp      = "$num1 " . unitDisplay($num1, 'weeks') . " = $ans1 " . unitDisplay($ans1, 'days');
                break;
            case 5:
                $qDisplay = ($num1 * 60) . " " . unitDisplay($num1 * 60, 'seconds');
                $qunit2   = 'minutes';
                $ans1     = $num1;
                $exp      = ($num1 * 60) . " " . unitDisplay($num1 * 60, 'seconds') . " = $ans1 " . unitDisplay($ans1, 'minutes');
                break;
            case 6:
                $qDisplay = ($num1 * 60) . " " . unitDisplay($num1 * 60, 'minutes');
                $qunit2   = 'hours';
                $ans1     = $num1;
                $exp      = ($num1 * 60) . " " . unitDisplay($num1 * 60, 'minutes') . " = $ans1 " . unitDisplay($ans1, 'hours');
                break;
            case 7:
                $qDisplay = ($num1 * 24) . " " . unitDisplay($num1 * 24, 'hours');
                $qunit2   = 'days';
                $ans1     = $num1;
                $exp      = ($num1 * 24) . " " . unitDisplay($num1 * 24, 'hours') . " = $ans1 " . unitDisplay($ans1, 'days');
                break;
            case 8:
                $qDisplay = ($num1 * 7) . " " . unitDisplay($num1 * 7, 'days');
                $qunit2   = 'weeks';
                $ans1     = $num1;
                $exp      = ($num1 * 7) . " " . unitDisplay($num1 * 7, 'days') . " = $ans1 " . unitDisplay($ans1, 'weeks');
                break;
        }
        $correctAnswer = (string)$ans1;
    } else {
        // Grade &#8805;3 advanced mode — direct format
        if ($q == 1) {
            $qDisplay = "$num1 mins $num2sm secs";
            $qunit2 = 'seconds';
            $ans1 = $num1 * 60 + $num2sm;
            $exp = "$num1 mins $num2sm secs = $ans1 " . unitDisplay($ans1, 'seconds');
        } elseif ($q == 2) {
            $qDisplay = "$num1 hrs $num2sm mins";
            $qunit2 = 'minutes';
            $ans1 = $num1 * 60 + $num2sm;
            $exp = "$num1 hrs $num2sm mins = $ans1 " . unitDisplay($ans1, 'minutes');
        } elseif ($q == 3) {
            $qDisplay = "$num1 days $num2h hrs";
            $qunit2 = 'hours';
            $ans1 = $num1 * 24 + $num2h;
            $exp = "$num1 days $num2h hrs = $ans1 " . unitDisplay($ans1, 'hours');
        } elseif ($q == 4) {
            $qDisplay = "$num1 wks $num2d days";
            $qunit2 = 'days';
            $ans1 = $num1 * 7 + $num2d;
            $exp = "$num1 wks $num2d days = $ans1 " . unitDisplay($ans1, 'days');
        } elseif ($q == 5) {
            $qDisplay = ($num1 * 60 + $num2sm) . " seconds";
            $qunit1 = 'mins'; $qunit2 = 'secs';
            $ans1 = $num1; $ans2 = $num2sm;
            $exp = ($num1 * 60 + $num2sm) . " seconds = $ans1 " . unitDisplay($ans1, 'mins') . " $ans2 " . unitDisplay($ans2, 'secs');
            $dual = true;
        } elseif ($q == 6) {
            $qDisplay = ($num1 * 60 + $num2sm) . " minutes";
            $qunit1 = 'hrs'; $qunit2 = 'mins';
            $ans1 = $num1; $ans2 = $num2sm;
            $exp = ($num1 * 60 + $num2sm) . " minutes = $ans1 " . unitDisplay($ans1, 'hrs') . " $ans2 " . unitDisplay($ans2, 'mins');
            $dual = true;
        } elseif ($q == 7) {
            $qDisplay = ($num1 * 24 + $num2h) . " hours";
            $qunit1 = 'days'; $qunit2 = 'hrs';
            $ans1 = $num1; $ans2 = $num2h;
            $exp = ($num1 * 24 + $num2h) . " hours = $ans1 " . unitDisplay($ans1, 'days') . " $ans2 " . unitDisplay($ans2, 'hrs');
            $dual = true;
        } elseif ($q == 8) {
            $qDisplay = ($num1 * 7 + $num2d) . " days";
            $qunit1 = 'wks'; $qunit2 = 'days';
            $ans1 = $num1; $ans2 = $num2d;
            $exp = ($num1 * 7 + $num2d) . " days = $ans1 " . unitDisplay($ans1, 'wks') . " $ans2 " . unitDisplay($ans2, 'days');
            $dual = true;
        } elseif ($q == 9) {
            $qDisplay = ($num1 * 3600) . " seconds";
            $qunit2 = 'hours';
            $ans1 = $num1;
            $exp = ($num1 * 3600) . " seconds = $ans1 " . unitDisplay($ans1, 'hours');
        } elseif ($q == 10) {
            $qDisplay = ($num1 * 1440) . " minutes";
            $qunit2 = 'days';
            $ans1 = $num1;
            $exp = ($num1 * 1440) . " minutes = $ans1 " . unitDisplay($ans1, 'days');
        } else {
            $qDisplay = ($num1 * 168) . " hours";
            $qunit2 = 'weeks';
            $ans1 = $num1;
            $exp = ($num1 * 168) . " hours = $ans1 " . unitDisplay($ans1, 'weeks');
        }
        $correctAnswer = $dual ? "{$ans1}|{$ans2}" : (string)$ans1;
    }

    $_SESSION[$sessionKey]['current'] = [
        'dual'          => $dual,
        'ans1'          => $ans1,
        'ans2'          => $ans2,
        'qunit1'        => $qunit1,
        'qunit2'        => $qunit2,
        'qDisplay'      => $qDisplay,
        'correctAnswer' => $correctAnswer,
        'exp'           => $exp,
        'lvl'           => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
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
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answer:
        <strong style="color:#0000CC; font-size:16pt;">
            <?php
            if ($result['dual']) {
                echo $result['s1'] . ' ' . htmlspecialchars(unitDisplay($result['s1'], $result['qunit1'])) . ' '
                   . $result['s2'] . ' ' . htmlspecialchars(unitDisplay($result['s2'], $result['qunit2']));
            } else {
                echo $result['s1'] . ' ' . htmlspecialchars(unitDisplay($result['s1'], $result['qunit2']));
            }
            ?>
        </strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php echo $result['exp']; ?>
    </p>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;">Convert the following:</p>

    <div style="display:inline-block; margin:20px 0; background:#fafafa; border:1px solid #cccccc; border-radius:8px; padding:15px 30px;">
        <div style="font-size:22pt; font-weight:700; color:#CC0066; margin-bottom:10px;">
            <?php echo htmlspecialchars($q_curr['qDisplay']); ?>
        </div>
        <div style="font-size:20pt; font-weight:700; color:#800080; margin:8px 0;">=</div>
        <div style="font-size:18pt; font-weight:700; color:#800080;">
            <?php if ($q_curr['dual']): ?>
                <input type="text" name="answer1" size="1" maxlength="4"
                       style="width:90px; height:44px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
                       autocomplete="off" autofocus>
                <span style="font-size:13pt; color:#800080;"><?php echo htmlspecialchars($q_curr['qunit1']); ?></span>
                &nbsp;&nbsp;
                <input type="text" name="answer2" size="1" maxlength="4"
                       style="width:90px; height:44px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
                       autocomplete="off">
                <span style="font-size:13pt; color:#800080;"><?php echo htmlspecialchars($q_curr['qunit2']); ?></span>
            <?php else: ?>
                <input type="text" name="answer" size="1" maxlength="6"
                       style="width:110px; height:44px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
                       autocomplete="off" autofocus>
                <span style="font-size:13pt; color:#800080;"><?php echo htmlspecialchars($q_curr['qunit2']); ?></span>
            <?php endif; ?>
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
            <font face="Verdana" style="font-size:10pt;" color="#000080">
                Select difficulty level for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;">
                        <font color="#800080">
                            <input type="radio" name="level" value="<?php echo $l; ?>"
                                <?php echo $lvl === $l ? 'checked' : ''; ?>>
                            <b>&nbsp;<?php echo $l; ?></b>
                        </font>
                    </font>
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