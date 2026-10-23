<?php
// math/modules/missing-terms.php
//
// COMPUTED-ANSWER module — find the missing term in an addition/subtraction
// equation. Free-text numeric answer, POST Submit1.
//
// FOUR VARIANTS (50% basic, 50% sum-equivalence):
//   opt=1: num1 {op} [?] = result   — missing second operand
//   opt=2: [?] {op} num2 = result   — missing first operand
//   opt=3: num1 = [?] + num3        — missing addend (uses sum ranges)
//   opt=4: two-expression equivalence, 5 sub-variants (uses sum ranges)
//
// RANGES (Hard = legacy Medium):
//   Base range (opt 1,2) by grade/level.
//   Sum range (opt 3,4) smaller — because sums of two randoms are bigger.
//
// FIXES vs LEGACY:
//   - numfac unused &#8594; removed.
//   - opt=4 retry loop `while ($num4<2)` had no attempt cap &#8594; capped.
//   - No `if ($arrnum > 8)` type bugs here (this module used a different
//     dispatch pattern) — preserved as-is.

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

$moduleTitle = 'Missing Terms (Addition/Subtraction)';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(4, max(0, $grd));

// Base range (opt 1,2) — Hard = legacy Medium
$baseRanges = [
    0 => ['Easy' => [1, 9],     'Hard' => [3, 12]],
    1 => ['Easy' => [4, 15],     'Hard' => [8, 29]],
    2 => ['Easy' => [19, 59],    'Hard' => [59, 249]],
    3 => ['Easy' => [59, 249],   'Hard' => [249, 999]],
    4 => ['Easy' => [149, 699],  'Hard' => [1001, 9999]],
];

// Sum range (opt 3,4) — smaller than base, because sums get large
$sumRanges = [
    0 => ['Easy' => [3, 12],    'Hard' => [11, 29]],
    1 => ['Easy' => [3, 12],    'Hard' => [11, 29]],
    2 => ['Easy' => [3, 12],    'Hard' => [11, 29]],
    3 => ['Easy' => [12, 39],   'Hard' => [39, 299]],
    4 => ['Easy' => [51, 499],  'Hard' => [1001, 9999]],
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
        'correct'  => $correct,
        'userInput'=> $userInput,
        'eq'       => $cur['eq'],
        'ans'      => $cur['ans'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $opt = rand(1, 4);

    $eq = '';
    $ans = 0;

    if ($opt === 1 || $opt === 2) {
        // Basic — pick operands from base range
        [$L1, $L2] = $baseRanges[$grdKey][$lvl];
        $num1 = rand($L1, $L2);
        $tries = 0;
        do {
            $num2 = rand($L1, $L2);
            $tries++;
        } while ($num2 === $num1 && $tries < 20);

        $sign = (rand(1, 2) === 1) ? '+' : '-';
        if ($sign === '+') {
            $result_val = $num1 + $num2;
        } else {
            $num1 = $num1 + $num2;
            $result_val = $num1 - $num2;
        }

        if ($opt === 1) {
            // num1 {sign} [?] = result
            $eq  = $num1 . ' ' . $sign . ' {BLANK} = ' . $result_val;
            $ans = $num2;
        } else {
            // [?] {sign} num2 = result
            $eq  = '{BLANK} ' . $sign . ' ' . $num2 . ' = ' . $result_val;
            $ans = $num1;
        }
    } elseif ($opt === 3) {
        // num1 = [?] + num3
        [$L1, $L2] = $sumRanges[$grdKey][$lvl];
        $num2 = rand($L1, $L2);
        $num3 = rand($L1, $L2);
        $num1 = $num2 + $num3;
        $ans  = $num2;

        $eq = $num1 . ' = {BLANK} + ' . $num3;
    } else {
        // opt === 4 — two-expression equivalence (5 sub-variants)
        [$L1, $L2] = $sumRanges[$grdKey][$lvl];

        $num4 = 1;
        $tries = 0;
        do {
            $num1 = rand($L1, $L2);
            $num2 = rand($L1, $L2);
            $num3 = rand($L1, $L2);
            $num4 = $num1 + $num2 - $num3;
            $tries++;
        } while ($num4 < 2 && $tries < 30);

        // If range too tight to satisfy, bump num4
        if ($num4 < 2) { $num4 = 2; $num3 = $num1 + $num2 - $num4; }

        $sub = rand(1, 5);
        $shownVal = $num1 + 2 * $num2;  // for sub-variants 4,5

        if ($sub === 1) {
            $eq  = '{BLANK} + ' . $num2 . ' = ' . $num3 . ' + ' . $num4;
            $ans = $num1;
        } elseif ($sub === 2) {
            $eq  = $num1 . ' + {BLANK} = ' . $num3 . ' + ' . $num4;
            $ans = $num2;
        } elseif ($sub === 3) {
            $eq  = $num1 . ' + ' . $num2 . ' = {BLANK} + ' . $num4;
            $ans = $num3;
        } elseif ($sub === 4) {
            $eq  = $shownVal . ' &minus; ' . $num2 . ' = {BLANK} + ' . $num4;
            $ans = $num3;
        } else {
            $eq  = $shownVal . ' &minus; {BLANK} = ' . $num3 . ' + ' . $num4;
            $ans = $num2;
        }
    }

    $_SESSION[$sessionKey]['current'] = [
        'eq'  => $eq,
        'ans' => $ans,
        'opt' => $opt,
        'lvl' => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render the equation with either an input (question) or the correct answer
 * (result state) in place of {BLANK}.
 */
function renderMissingTermsEq($eq, $showInput, $correctAnswer = null) {
    if ($showInput) {
        $blank = '<input type="text" name="answer" maxlength="7"'
               . ' autocomplete="off" autofocus'
               . ' style="width:100px; height:60px; text-align:center;'
               . ' font-family:\'Comic Sans MS\',sans-serif; font-size:28pt;'
               . ' font-weight:700; color:#0000CC; background:#ffffff;'
               . ' border:3px solid #b0b0d8; border-radius:10px;'
               . ' box-sizing:border-box; padding:0; outline:none;'
               . ' vertical-align:middle;">';
    } else {
        $blank = '<span style="display:inline-block; min-width:100px; padding:4px 15px;'
               . ' background:#f4fbf4; border:3px solid #4caf50; border-radius:10px;'
               . ' color:#4caf50; text-align:center; box-sizing:border-box;">'
               . htmlspecialchars($correctAnswer)
               . '</span>';
    }

    echo '<div style="display:inline-flex; align-items:center; justify-content:center;'
       . ' gap:12px; flex-wrap:wrap; font-family:\'Comic Sans MS\',sans-serif;'
       . ' font-size:28pt; font-weight:700; color:#800080;'
       . ' margin:20px auto; padding:20px 30px;'
       . ' background:#fafaff; border:2px solid #d0d0e8; border-radius:16px;'
       . ' max-width:100%;">'
       . str_replace('{BLANK}', $blank, $eq)
       . '</div>';
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
            Your answer:
            <strong style="color:#0000CC; font-size:18pt;"><?php echo htmlspecialchars($result['userInput']); ?></strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>

        <p style="font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
            The missing term is
            <strong style="color:#CC0066;"><?php echo $result['ans']; ?></strong>.
        </p>
        <?php renderMissingTermsEq($result['eq'], false, $result['ans']); ?>

    <?php else: ?>
        <br>
        <p style="font-size:15pt; font-weight:700; color:#CC0066;">
            Find the missing term:
        </p>
        <?php renderMissingTermsEq($q['eq'], true); ?>
    <?php endif; ?>

    <div>
        <?php if ($result === null): ?>
            <input type="submit" name="Submit1" value="Submit">
            <span style="display:inline-block; width: 20px;"></span>
        <?php endif; ?>
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin: 30px 0;"<?php endif; ?>>
    </div>

    <div align="center" style="margin-top: 20px;">
        <p style="margin-top: 5px; margin-bottom: 0">
            <font face="Verdana" style="font-size: 10pt;" color="#000080">
                Select difficulty level for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size: 9pt;">
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