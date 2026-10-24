<?php
// math/modules/missing-terms2.php
// Computed free-text, single input with inline blank.
// Missing term in multiplication/division equation.
// Easy = legacy Easy; Hard = legacy Medium (§E calibration).

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

$moduleTitle = 'Missing Terms (Multiplication/Division)';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

// Level &#8594; number range (Hard = legacy Medium per §E)
if ($grdKey < 3) {
    if ($lvl === 'Easy') { $numlimit1 = 2; $numlimit2 = 4; }
    else                 { $numlimit1 = 5; $numlimit2 = 8; }
} elseif ($grdKey == 3) {
    if ($lvl === 'Easy') { $numlimit1 = 2;  $numlimit2 = 9; }
    else                 { $numlimit1 = 10; $numlimit2 = 17; }
} else {
    if ($lvl === 'Easy') { $numlimit1 = 4;  $numlimit2 = 15; }
    else                 { $numlimit1 = 15; $numlimit2 = 29; }
}

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $studentAns = (int)trim((string)($_POST['answer'] ?? ''));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer((string)$studentAns, (string)$cur['ans'], $lvl);

    $result = [
        'correct' => $isCorrect,
        'student' => $studentAns,
        'ans'     => $cur['ans'],
        'opt'     => $cur['opt'],
        'opt2'    => $cur['opt2'],
        'num1'    => $cur['num1'],
        'num2'    => $cur['num2'],
        'num3'    => $cur['num3'],
        'num4'    => $cur['num4'],
        'result'  => $cur['result'],
        'exp'     => $cur['exp'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Proportion sub-form availability — legacy: grade > 4 OR (grade == 3 AND level == Hard)
    $allowOpt3 = ($grdKey > 4) || ($grdKey == 3 && $lvl === 'Hard');
    $opt = $allowOpt3 ? rand(1, 3) : rand(1, 2);

    $isMult  = (rand(1, 2) == 1);
    $num1    = rand($numlimit1, $numlimit2);
    $num2    = rand($numlimit1, $numlimit2);
    $result_ = $num1 * $num2;
    $opt2    = 0;
    $num3    = 0;
    $num4    = 0;
    $exp     = '';
    $ans     = 0;

    if (!$isMult) {
        $num1   = $num1 * $num2;   // dividend
        $result_ = $num1 / $num2;  // = original num1
    }

    if ($opt == 1)      { $ans = $num2; }
    elseif ($opt == 2)  { $ans = $num1; }

    $signSym = $isMult ? '&times;' : '&divide;';

    if ($opt == 3) {
        // Overwrite for proportion case
        $fac  = rand(2, 4);
        $num2 = rand($numlimit1, $numlimit2);
        $num1 = $num2 * $fac;
        $num3 = rand($numlimit1, $numlimit2);
        $num4 = $num1 * $num3 / $num2;

        $opt2 = rand(1, 5);
        if ($opt2 == 1)      { $ans = $num1; }
        elseif ($opt2 == 2)  { $ans = $num3; }
        elseif ($opt2 == 3)  { $ans = $num2; }
        elseif ($opt2 == 4)  { $ans = $num2; }
        else                 { $ans = $num3; }
    }

    // Build the "filled-in" equation for feedback
    if ($opt == 1) {
        $exp = "$num1 $signSym $num2 = $result_";
    } elseif ($opt == 2) {
        $exp = "$num1 $signSym $num2 = $result_";
    } else {
        switch ($opt2) {
            case 1: $exp = "$num1 &times; $num3 = $num2 &times; $num4"; break;
            case 2: $exp = "$num1 &times; $num3 = $num2 &times; $num4"; break;
            case 3: $exp = "$num1 &times; $num3 = $num2 &times; $num4"; break;
            case 4: $exp = ($num1 * $num3 * $num3) . " &divide; $num3 = $num2 &times; $num4"; break;
            case 5: $exp = ($num1 * $num3 * $num3) . " &divide; $num3 = $num2 &times; $num4"; break;
        }
    }

    $_SESSION[$sessionKey]['current'] = [
        'ans'    => $ans,
        'opt'    => $opt,
        'opt2'   => $opt2,
        'num1'   => $num1,
        'num2'   => $num2,
        'num3'   => $num3,
        'num4'   => $num4,
        'result' => $result_,
        'isMult' => $isMult,
        'exp'    => $exp,
        'lvl'    => $lvl,
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

$inputStyle = 'width:100px; height:52px; font-size:28px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC; background:#fff; vertical-align:middle;';
$equationStyle = 'font-size:26pt; font-weight:700; color:#800080; display:flex; align-items:center; justify-content:center; gap:12px; flex-wrap:wrap; margin:20px 0;';
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answer:
        <strong style="color:#0000CC; font-size:16pt;"><?php echo $result['student']; ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">The answer is <strong style="color:#CC0066;"><?php echo $result['ans']; ?></strong> because <?php echo $result['exp']; ?>.</p>
        
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:20px;">
        What&#39;s the missing term?
    </p>

    <div class="equation-card" style="display:inline-block;">
        <?php if ($q_curr['opt'] == 1): ?>
            <div style="<?php echo $equationStyle; ?>">
                <span style="color:#CC0066;"><?php echo $q_curr['num1']; ?></span>
                <span style="color:#800080;"><?php echo $q_curr['isMult'] ? '&times;' : '&divide;'; ?></span>
                <input type="text" name="answer" style="<?php echo $inputStyle; ?>" autocomplete="off" autofocus>
                <span>=</span>
                <span style="color:#CC0066;"><?php echo $q_curr['result']; ?></span>
            </div>
        <?php elseif ($q_curr['opt'] == 2): ?>
            <div style="<?php echo $equationStyle; ?>">
                <input type="text" name="answer" style="<?php echo $inputStyle; ?>" autocomplete="off" autofocus>
                <span style="color:#800080;"><?php echo $q_curr['isMult'] ? '&times;' : '&divide;'; ?></span>
                <span style="color:#CC0066;"><?php echo $q_curr['num2']; ?></span>
                <span>=</span>
                <span style="color:#CC0066;"><?php echo $q_curr['result']; ?></span>
            </div>
        <?php else: ?>
            <?php
            $n1 = $q_curr['num1']; $n2 = $q_curr['num2'];
            $n3 = $q_curr['num3']; $n4 = $q_curr['num4'];
            $o2 = $q_curr['opt2'];
            ?>
            <div style="<?php echo $equationStyle; ?> flex-direction:column;">
                <div>
                    <?php if ($o2 == 1): ?>
                        <input type="text" name="answer" style="<?php echo $inputStyle; ?>" autocomplete="off" autofocus>
                        <span>&times;</span>
                        <span style="color:#CC0066;"><?php echo $n3; ?></span>
                    <?php elseif ($o2 == 2): ?>
                        <span style="color:#CC0066;"><?php echo $n1; ?></span>
                        <span>&times;</span>
                        <input type="text" name="answer" style="<?php echo $inputStyle; ?>" autocomplete="off" autofocus>
                    <?php elseif ($o2 == 3): ?>
                        <span style="color:#CC0066;"><?php echo $n1; ?></span>
                        <span>&times;</span>
                        <span style="color:#CC0066;"><?php echo $n3; ?></span>
                    <?php elseif ($o2 == 4): ?>
                        <span style="color:#CC0066;"><?php echo ($n1*$n3*$n3); ?></span>
                        <span>&divide;</span>
                        <span style="color:#CC0066;"><?php echo $n3; ?></span>
                    <?php else: ?>
                        <span style="color:#CC0066;"><?php echo ($n1*$n3*$n3); ?></span>
                        <span>&divide;</span>
                        <input type="text" name="answer" style="<?php echo $inputStyle; ?>" autocomplete="off" autofocus>
                    <?php endif; ?>
                </div>
                <div style="margin-top:14px;">
                    <span>=</span>
                    <?php if ($o2 == 3): ?>
                        <input type="text" name="answer" style="<?php echo $inputStyle; ?>" autocomplete="off" autofocus>
                        <span>&times;</span>
                        <span style="color:#CC0066;"><?php echo $n4; ?></span>
                    <?php elseif ($o2 == 4 || $o2 == 5): ?>
                        <span style="color:#CC0066;"><?php echo $n2; ?></span>
                        <span>&times;</span>
                        <span style="color:#CC0066;"><?php echo $n4; ?></span>
                    <?php else: ?>
                        <span style="color:#CC0066;"><?php echo $n2; ?></span>
                        <span>&times;</span>
                        <span style="color:#CC0066;"><?php echo $n4; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div style="margin-top:24px;">
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