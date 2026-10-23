<?php
// math/modules/plus-minus.php
//
// COMPUTED-ANSWER module — student types '+' or '-' to complete the equation.
// Free-text single character, POST Submit1.
//
// TWO PRESENTATION VARIANTS:
//   qopt=1 &#8594; "A ? B = C" (right side is a plain number).
//            Used only for Easy grade<2.
//   qopt=2 &#8594; "A ? B = X op Y" (right side is another expression whose
//            value equals the left side's result under the correct operator).
//            Used for all other level/grade combinations.
//
// LEVEL MERGE: Hard = LEGACY HARD (not legacy Medium — Medium is narrower
// than Easy for grades 0-1, so using it would invert difficulty).
//   Grade 0: Easy 5-19,   Hard 10-25
//   Grade 1: Easy 11-49,  Hard 19-69
//   Grade 2: Easy 39-69,  Hard 129-179
//
// LEGACY FIX: clamped grade 3+ to grade-2 ranges (legacy only defined grd 0/1/2,
// leaving numlimits undefined for grade 3+).
//
// Repeat prevention: num1 > num2 guard forces non-trivial pairs.

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

$moduleTitle = 'Plus or Minus';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(2, max(0, $grd));  // clamp grade 3+ to grade 2 ranges

// Ranges: Hard = legacy Hard (Medium is narrower than Easy — see header)
$ranges = [
    0 => ['Easy' => [5, 10],   'Hard' => [10, 25]],
    1 => ['Easy' => [8, 35],  'Hard' => [10, 45]],
    2 => ['Easy' => [31, 69],  'Hard' => [129, 179]],
];
[$nMin, $nMax] = $ranges[$grdKey][$lvl];

// qopt: 1 for Easy grade<2 only; else 2
$qopt = ($grd < 2 && $lvl === 'Easy') ? 1 : 2;

// ============================================================
// HANDLE ANSWER (Submit1)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = trim((string)($_POST['answer'] ?? ''));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($raw, $cur['answer'], $cur['lvl']);

    $result = [
        'correct'     => $correct,
        'raw'         => $raw,
        'num1'        => $cur['num1'],
        'num2'        => $cur['num2'],
        'answer'      => $cur['answer'],
        'result'      => $cur['result'],
        'result_expr' => $cur['result_expr'],
        'num3'        => $cur['num3'],
        'num4'        => $cur['num4'],
        'result_op'   => $cur['result_op'],
        'qopt'        => $cur['qopt'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Generate num1, num2 with num1 > num2
    $tries = 0;
    do {
        $num1 = rand($nMin, $nMax);
        $num2 = rand($nMin, $nMax);
        $tries++;
    } while ($num2 >= $num1 && $tries < 20);
    // Safety: if range too tight, ensure num1 > num2
    if ($num1 <= $num2) { $num1 = $nMax; $num2 = $nMin; }

    $ans = (rand(1, 2) === 1) ? '+' : '-';

    if ($ans === '+') {
        $result_value = $num1 + $num2;
    } else {
        // For '-': bump num1 by num2, so displayed num1 - num2 = original num1
        $num1 = $num1 + $num2;
        $result_value = $num1 - $num2;
    }

    // qopt=2: build the result expression
    $result_expr = null;
    $num3 = null;
    $num4 = null;
    $result_op = null;

    if ($qopt === 2) {
        if (rand(1, 2) === 1) {
            // Sum form: num3 + num4 = result
            $num3 = 2;
            $tries = 0;
            do {
                $maxTry = max(3, $result_value - 2);
                $num3 = rand(2, $maxTry);
                $tries++;
            } while ($num3 === $num1 && $tries < 20);
            $num4 = $result_value - $num3;
            $result_op = '+';
        } else {
            // Difference form: num3 - num4 = result
            if ($grd < 2) { $add1 = 4; $add2 = 15; }
            else { $add1 = 29; $add2 = 79; }

            $num3 = $result_value + $add1;
            $tries = 0;
            do {
                $num3 = rand($result_value + $add1, $result_value + $add2);
                $tries++;
            } while ($num3 === $num1 && $tries < 20);
            $num4 = $num3 - $result_value;
            $result_op = '-';
        }
        $result_expr = $num3 . ' ' . $result_op . ' ' . $num4;
    }

    $_SESSION[$sessionKey]['current'] = [
        'num1'        => $num1,
        'num2'        => $num2,
        'answer'      => $ans,
        'result'      => $result_value,
        'result_expr' => $result_expr,
        'num3'        => $num3,
        'num4'        => $num4,
        'result_op'   => $result_op,
        'qopt'        => $qopt,
        'lvl'         => $lvl,
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
            Your answer:
            <strong style="color:#0000CC; font-size:18pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <p style="font-family:'Comic Sans MS',sans-serif; font-size:22pt;
                  font-weight:700; color:#800080; margin:15px 0;">
            <?php echo $result['num1']; ?>
            <span style="color:#CC0066;"><?php echo htmlspecialchars($result['answer']); ?></span>
            <?php echo $result['num2']; ?>
            <span style="color:#CC0066;">=</span>
            <?php if ($result['result_expr'] !== null): ?>
                <?php echo htmlspecialchars($result['result_expr']); ?>
                <span style="color:#CC0066;">=</span>
            <?php endif; ?>
            <?php echo $result['result']; ?>
        </p>

    <?php else: ?>
        <br>
        <p style="font-size:15pt; font-weight:700; color:#800080; margin:15px 0 20px;">
            Type
            <span style="color:#CC0066; font-size:20pt;">'+'</span> or
            <span style="color:#CC0066; font-size:20pt;">'&minus;'</span>
            in the box:
        </p>

        <div style="display:inline-flex; justify-content:center; align-items:center;
                    gap:12px; flex-wrap:wrap; margin:15px auto; padding:15px 25px;
                    background:#fafaff; border:2px solid #d0d0e8; border-radius:16px;
                    font-family:'Comic Sans MS',sans-serif; font-size:28pt;
                    font-weight:700; color:#800080;">
            <span><?php echo $q['num1']; ?></span>
            <input type="text" name="answer" maxlength="1"
                   autocomplete="off" autofocus
                   style="width:60px; height:60px; text-align:center;
                          font-family:'Comic Sans MS',sans-serif; font-size:30pt;
                          font-weight:700; color:#0000CC; background:#ffffff;
                          border:3px solid #b0b0d8; border-radius:10px;
                          box-sizing:border-box; padding:0; outline:none;"
                   oninput="this.value=this.value.replace(/[^+\-]/g,'')">
            <span><?php echo $q['num2']; ?></span>
            <span style="color:#CC0066;">=</span>
            <span>
                <?php if ($q['result_expr'] !== null): ?>
                    <?php echo htmlspecialchars($q['result_expr']); ?>
                <?php else: ?>
                    <?php echo $q['result']; ?>
                <?php endif; ?>
            </span>
        </div>
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