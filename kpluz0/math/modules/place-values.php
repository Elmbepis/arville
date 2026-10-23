<?php
// math/modules/place-values.php
//
// COMPUTED-ANSWER module — two variants:
//   opt=1: "Which digit in N has a place value of X?"  &#8594; answer = single digit
//   opt=2: "What is the value of the digit D in N?"    &#8594; answer = digit × 10^k
//
// LEVEL: Hard = legacy Medium (standard calibration).
// Grade &#8594; digit count by level:
//   0/1:  Easy &#8594; 2-digit,  Hard &#8594; 3-digit
//   2:    Easy &#8594; 3-digit,  Hard &#8594; 4-digit
//   3:    Easy &#8594; 5-digit,  Hard &#8594; 6-digit
//   4:    Easy &#8594; 5-digit,  Hard &#8594; 7-digit
//   5:    Easy &#8594; 6-digit,  Hard &#8594; 8-digit
//   6:    Easy &#8594; 7-digit,  Hard &#8594; 8-digit
//
// Place index selection:
//   grd<3   &#8594; place &#8712; [1, placelimit]
//   grd==3  &#8594; place &#8712; [2, placelimit]
//   grd>3   &#8594; place &#8712; [3, placelimit]
//   (preserves legacy rule that higher grades never test the ones place)
//
// Digit uniqueness: dig3..digN are distinct nonzero. For grade > 5, dig1=dig2=0
// (trailing zeros) so uniqueness applies only from dig3 up — matches legacy.
//
// LEGACY BUGS FIXED:
//   - `$num=($dig9*100000000)+$num=(...)` — nested assignment, opaque. Rewritten
//     as a clean iterative build.
//   - `$dig10` referenced for grade 6 placelimit=10 before assignment. Clamped.
//   - `$placedig` was set inside the (opt==2) branch of answer computation, but
//     read in the question-text block on next request — worked only because
//     options were fixed per question. Now derived deterministically.

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

$moduleTitle = 'Place Values';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

// Digit count by grade × level (Hard = legacy Medium)
$digitCounts = [
    0 => ['Easy' => 2, 'Hard' => 3],
    1 => ['Easy' => 2, 'Hard' => 3],
    2 => ['Easy' => 3, 'Hard' => 4],
    3 => ['Easy' => 5, 'Hard' => 6],
    4 => ['Easy' => 5, 'Hard' => 7],
    5 => ['Easy' => 6, 'Hard' => 8],
    6 => ['Easy' => 7, 'Hard' => 8],
];
$numDigits = $digitCounts[$grdKey][$lvl];

// Place index
$placeLimit = $numDigits;
if ($grdKey < 3)      $place = rand(1, $placeLimit);
elseif ($grdKey === 3) $place = rand(2, $placeLimit);
else                    $place = rand(3, $placeLimit);

// Place metadata (place index = 1 for ones, up to 10 for billions)
$placeMeta = [
    1  => ['name' => 'ones',              'value' => 1],
    2  => ['name' => 'tens',              'value' => 10],
    3  => ['name' => 'hundreds',          'value' => 100],
    4  => ['name' => 'thousands',         'value' => 1000],
    5  => ['name' => 'ten thousands',     'value' => 10000],
    6  => ['name' => 'hundred thousands', 'value' => 100000],
    7  => ['name' => 'millions',          'value' => 1000000],
    8  => ['name' => 'ten millions',      'value' => 10000000],
    9  => ['name' => 'hundred millions',  'value' => 100000000],
    10 => ['name' => 'billions',          'value' => 1000000000],
];
$placename = $placeMeta[$place]['name'];
$pvalue    = $placeMeta[$place]['value'];

// ============================================================
// HANDLE ANSWER (Submit1)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userInput, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct'   => $correct,
        'userInput' => $userInput,
        'num'       => $cur['num'],
        'ans'       => $cur['ans'],
        'placename' => $cur['placename'],
        'placedig'  => $cur['placedig'],
        'opt'       => $cur['opt'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Build unique-nonzero digits: dig[1] is highest place; dig[numDigits] is ones
    // For grade > 5, ones and tens are forced to 0 (trailing zeros)
    $forceTrailingZeros = ($grdKey > 5);

    $digits = [];
    $used = [];
    for ($i = 1; $i <= $numDigits; $i++) {
        if ($forceTrailingZeros && $i > $numDigits - 2) {
            // Last two positions are tens and ones &#8594; set to 0
            $digits[$i] = 0;
        } else {
            $tries = 0;
            do {
                $d = rand(1, 9);
                $tries++;
            } while (in_array($d, $used, true) && $tries < 100);
            $digits[$i] = $d;
            $used[] = $d;
        }
    }

    // Build number iteratively (highest first) — clean build
    $num = 0;
    for ($i = 1; $i <= $numDigits; $i++) {
        $num = $num * 10 + $digits[$i];
    }

    // Extract digit at place (place=1 &#8594; ones = last char)
    $numStr  = (string)$num;
    $placeIx = strlen($numStr) - $place;
    $placedig = (int)substr($numStr, $placeIx, 1);

    // Variant: opt=1 &#8594; answer = digit; opt=2 &#8594; answer = digit × place value
    $opt = rand(1, 2);
    $ans = ($opt === 1) ? $placedig : ($placedig * $pvalue);

    $_SESSION[$sessionKey]['current'] = [
        'num'       => $num,
        'ans'       => $ans,
        'place'     => $place,
        'placename' => $placename,
        'pvalue'    => $pvalue,
        'placedig'  => $placedig,
        'opt'       => $opt,
        'lvl'       => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <?php if ($result !== null): ?>
        <br>
        <p style="font-size:14pt; color:#666;">
            Your answer: <strong style="color:#0000CC; font-size:18pt;"><?php echo htmlspecialchars($result['userInput']); ?></strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <?php if ($result['opt'] === 1): ?>
            <p style="font-family:'Comic Sans MS',sans-serif; font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
                The digit that occupies the
                <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['placename']); ?>'</strong>
                place<br/>of the number
                <strong style="color:#CC0066;"><?php echo $result['num']; ?></strong>
                is <strong style="color:#CC0066;"><?php echo $result['ans']; ?></strong>.
            </p>
        <?php else: ?>
            <p style="font-family:'Comic Sans MS',sans-serif; font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
                The value of the digit
                <strong style="color:#CC0066;">'<?php echo $result['placedig']; ?>'</strong>
                in<br/>the number
                <strong style="color:#CC0066;"><?php echo $result['num']; ?></strong>
                is <strong style="color:#CC0066;"><?php echo $result['ans']; ?></strong>.
            </p>
        <?php endif; ?>

    <?php else: ?>
        <br>
        <?php if ($q['opt'] === 1): ?>
            <p style="font-family:'Comic Sans MS',sans-serif; font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
                Which digit in the number
                <strong style="color:#CC0066; font-size:20pt;"><?php echo $q['num']; ?></strong><br>
                has a place value of
                <strong style="color:#CC0066;">'<?php echo htmlspecialchars($q['placename']); ?>'</strong>?
            </p>
        <?php else: ?>
            <p style="font-family:'Comic Sans MS',sans-serif; font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
                What is the value of the<br>
                digit <strong style="color:#CC0066;"><?php echo $q['placedig']; ?></strong>
                in the number
                <strong style="color:#CC0066; font-size:20pt;"><?php echo $q['num']; ?></strong>?
            </p>
        <?php endif; ?>
        <p style="font-family:'Comic Sans MS',sans-serif; font-size:15pt; font-weight:700; color:#0000AA; margin:15px 0;">
            Answer:
<?php
$ansLen  = strlen((string)$q['ans']);
$inputPx = max(100, ($ansLen + 1) * 22 + 4);
?>
<input type="text" name="answer" class="answer-input"
       style="width:<?php echo $inputPx; ?>px; height:48px; font-size:26px; text-align:center;"
       maxlength="<?php echo $ansLen + 1; ?>"
       autocomplete="off" autofocus>        </p>
    <?php endif; ?>

    <div>
        <?php if ($result === null): ?>
            <input type="submit" name="Submit1" value="Submit">
            <span style="display:inline-block; width:20px;"></span>
        <?php endif; ?>
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>

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