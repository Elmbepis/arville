<?php
// math/modules/rounding-numbers.php
//
// COMPUTED-ANSWER module — round a number to a given place.
// Free-text integer answer, POST Submit1.
//
// TWO INDEPENDENT AXES:
//   $lvl        = 'Easy' | 'Hard'         &#8594; number length + max rounding depth
//   $convention = 'Traditional' | 'Statistical' &#8594; tie-breaking rule
//
// Convention (preserved from legacy):
//   Traditional &#8594; round half up
//   Statistical &#8594; banker's rounding (half to even)
// The tie case only fires when the difference to the low multiple is exactly
// half the rounding step (e.g., ...5 with nothing following).
//
// LEVEL: Hard = legacy Medium (standard calibration).
//   Grade 0/1: Easy [10,99] pl=1,    Hard [101,999] pl=2
//   Grade 2:   Easy [101,999] pl=2,  Hard [1001,9999] pl=3
//   Grade 3:   Easy [10001,99999] pl=4, Hard [100001,999999] pl=5
//   Grade 4:   Easy [100001,999999] pl=5, Hard [1000001,9999999] pl=6
//   Grade 5+:  Easy [1000001,9999999] pl=6, Hard [10000001,99999999] pl=7

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

$moduleTitle = 'Rounding Off Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$conventions = ['Traditional', 'Statistical'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

if (isset($_POST['convention'])) $_SESSION['convention'] = $_POST['convention'];
if (!isset($_SESSION['convention']) || !in_array($_SESSION['convention'], $conventions)) {
    $_SESSION['convention'] = 'Traditional';
}
$conv = $_SESSION['convention'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(5, max(0, $grd));

// Range + max rounding places by grade, Easy/Hard
$configs = [
    0 => ['Easy' => [10,     99,       1], 'Hard' => [101,    999,      2]],
    1 => ['Easy' => [10,     99,       1], 'Hard' => [101,    999,      2]],
    2 => ['Easy' => [101,    999,      2], 'Hard' => [1001,   9999,     3]],
    3 => ['Easy' => [10001,  99999,    4], 'Hard' => [100001, 999999,   5]],
    4 => ['Easy' => [100001, 999999,   5], 'Hard' => [1000001, 9999999, 6]],
    5 => ['Easy' => [1000001, 9999999, 6], 'Hard' => [10000001, 99999999, 7]],
];
[$nMin, $nMax, $placeLimit] = $configs[$grdKey][$lvl];

// Place names 1..8 (place1 = number of digits dropped)
$placeNames = [
    1 => 'ten',
    2 => 'hundred',
    3 => 'thousand',
    4 => 'ten thousand',
    5 => 'hundred thousand',
    6 => 'million',
    7 => 'ten million',
    8 => 'hundred million',
];

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
        'place'     => $cur['place'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $num       = rand($nMin, $nMax);
    $numLen    = strlen((string)$num);
    $place     = rand(1, $placeLimit);
    $placename = $placeNames[$place] ?? 'ten';

    // Compute rounding
    $step      = (int)pow(10, $place);
    $num2      = (int)substr((string)$num, 0, $numLen - $place); // leading digits
    $roundLow  = $num2 * $step;
    $roundHigh = $roundLow + $step;

    // Default (Traditional): round half up
    if (($num - $roundLow) < ($roundHigh - $num)) {
        $ans = $roundLow;
    } else {
        $ans = $roundHigh;
    }

    // Statistical: banker's rounding on exact ties
    if ($conv === 'Statistical') {
        $isTie = (($num - $roundLow) === ($roundHigh - $num));
        if ($isTie) {
            $ans = ($num2 % 2 > 0) ? $roundHigh : $roundLow;
        }
    }

    $_SESSION[$sessionKey]['current'] = [
        'num'       => $num,
        'ans'       => $ans,
        'place'     => $place,
        'placename' => $placename,
        'lvl'       => $lvl,
        'conv'      => $conv,
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
        <p style="font-family:'Comic Sans MS',sans-serif; font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
            The number <strong style="color:#CC0066;"><?php echo $result['num']; ?></strong>,
            when rounded off to<br/>the nearest
            <strong style="color:#CC0066;"><?php echo htmlspecialchars($result['placename']); ?></strong>,
            is <strong style="color:#CC0066;"><?php echo $result['ans']; ?></strong>.
        </p>
    <?php else: ?>
        <br>
        <p style="font-family:'Comic Sans MS',sans-serif; font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
            Round off the number
            <strong style="color:#CC0066; font-size:20pt;"><?php echo $q['num']; ?></strong>
            <br/>to the nearest
            <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['placename']); ?></strong>.
        </p>
        <p style="font-family:'Comic Sans MS',sans-serif; font-size:15pt; font-weight:700; color:#0000AA; margin:15px 0;">
            Answer:
            <input type="text" name="answer" class="answer-input"
                   style="width:150px; height:48px; font-size:26px; text-align:center;"
                   maxlength="<?php echo strlen((string)$q['ans']) + 1; ?>"
                   autocomplete="off" autofocus>
        </p>
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

    <div align="center" style="margin-top:15px;">
        <p style="margin:0 0 6px 0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">
                Convention for rounding when the first digit dropped is 5 and nothing follows it:
            </font>
        </p>
        <table border="0" width="500" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td align="center" width="250">
                    <font face="Verdana" style="font-size:9pt;" color="#800080">
                        <input type="radio" name="convention" value="Traditional"
                            <?php echo $conv === 'Traditional' ? 'checked' : ''; ?>>
                        <b>Traditional</b>
                    </font>
                    <font face="Verdana" style="font-size:9pt;" color="#333333"> - always round up</font>
                </td>
                <td align="center" width="250">
                    <font face="Verdana" style="font-size:9pt;" color="#800080">
                        <input type="radio" name="convention" value="Statistical"
                            <?php echo $conv === 'Statistical' ? 'checked' : ''; ?>>
                        <b>Statistical</b>
                    </font>
                    <font face="Verdana" style="font-size:9pt;" color="#333333"> - round to even</font>
                </td>
            </tr>
        </table>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();