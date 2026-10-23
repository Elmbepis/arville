<?php
// math/modules/odd-even.php
//
// COMPUTED-ANSWER module — determine whether a number or an expression result
// is ODD or EVEN. Answer via GET ?ansclick=odd|even (render_choices).
//
// TWO FORMS:
//   form=1 &#8594; "Is the number N odd or even?"
//   form=2 &#8594; "Is the result of A op B odd or even?"
//   form=2 requires tier &#8805; 2 (needs third/fourth operands for A op B).
//
// TIER MAPPING (Hard = legacy Medium):
//   tier = min(4, grade + (Easy ? 0 : 1))
//   Grade 0: Easy tier 0, Hard tier 1
//   Grade 1: Easy tier 1, Hard tier 2
//   Grade 2: Easy tier 2, Hard tier 3
//   Grade 3: Easy tier 3, Hard tier 4
//   Grade 4+: clamped to tier 4
//
// RANGES (preserved from legacy):
//   Tier 0: [1, 30]
//   Tier 1: [11, 99]
//   Tier 2: [111, 9999]  + operands [11, 45]
//   Tier 3: [11111, 999999] + operands [11, 199]
//   Tier 4: [111111, 9999999] + operands [111, 999]
//
// FIXES vs LEGACY:
//   - form=2 with '-' had retry `while($number3<$number4)` with no cap &#8594; capped.
//   - Display `$number3.$op.$number4` had no spaces &#8594; formatted properly.
//   - Answer stored as 'Odd'/'Even' (was lowercase 'odd'/'even').

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

$moduleTitle = 'Odd and Even Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

$tier = min(4, max(0, $grd + ($lvl === 'Easy' ? 0 : 1)));

// Range table by tier
$tiers = [
    0 => ['min' => 1,      'max' => 30,      'opMin' => null, 'opMax' => null],
    1 => ['min' => 11,     'max' => 99,      'opMin' => null, 'opMax' => null],
    2 => ['min' => 111,    'max' => 9999,    'opMin' => 11,   'opMax' => 45],
    3 => ['min' => 11111,  'max' => 999999,  'opMin' => 11,   'opMax' => 199],
    4 => ['min' => 111111, 'max' => 9999999, 'opMin' => 111,  'opMax' => 999],
];
$cfg = $tiers[$tier];

// form: 1 for tier<2, else random 1/2
$form = ($tier < 2) ? 1 : rand(1, 2);

// ============================================================
// HANDLE ANSWER (via ?ansclick=odd|even)
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $selected = (string)$_GET['ansclick'];

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($selected, $cur['answer'], $cur['lvl']);

    $result = [
        'correct'  => $correct,
        'selected' => $selected,
        'answer'   => $cur['answer'],
        'form'     => $cur['form'],
        'number1'  => $cur['number1'],
        'number3'  => $cur['number3'] ?? null,
        'number4'  => $cur['number4'] ?? null,
        'op'       => $cur['op'] ?? null,
        'finalNum' => $cur['finalNum'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $number1 = rand($cfg['min'], $cfg['max']);
    $number3 = null;
    $number4 = null;
    $op      = null;
    $finalNum = $number1;

    if ($form === 2 && $cfg['opMin'] !== null) {
        $number3 = rand($cfg['opMin'], $cfg['opMax']);
        $tries = 0;
        do {
            $number4 = rand($cfg['opMin'], $cfg['opMax']);
            $tries++;
        } while ($number4 === $number3 && $tries < 20);

        // Random op, ensuring no negatives for subtraction
        $opChoice = rand(1, 2);
        if ($opChoice === 1) {
            $op = '+';
            $finalNum = $number3 + $number4;
        } else {
            $op = '-';
            $tries = 0;
            while ($number3 < $number4 && $tries < 20) {
                $number3 = rand($cfg['opMin'], $cfg['opMax']);
                $tries++;
            }
            if ($number3 < $number4) { $number3 = $number4 + rand(1, 10); }
            $finalNum = $number3 - $number4;
        }
    } else {
        // If form was set to 2 but tier can't support it, force form 1
        $form = 1;
    }

    $answer = ($finalNum % 2 === 0) ? 'Even' : 'Odd';

    $_SESSION[$sessionKey]['current'] = [
        'form'     => $form,
        'number1'  => $number1,
        'number3'  => $number3,
        'number4'  => $number4,
        'op'       => $op,
        'finalNum' => $finalNum,
        'answer'   => $answer,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle);
?>
<div style="padding: 0 10px; text-align: center;">

    <?php if ($result !== null): ?>
        <br>
        <p style="font-size:14pt; color:#666;">
            Your answer:
            <strong style="color:#0000CC; font-size:18pt;">'<?php echo htmlspecialchars($result['selected']); ?>'</strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <p style="font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
            <?php if ($result['form'] === 1): ?>
                The number
                <strong style="color:#CC0066;"><?php echo $result['number1']; ?></strong>
                is <strong style="color:#CC0066;"><?php echo strtolower($result['answer']); ?></strong>
                because<br/>it ends with a <?php echo ($result['answer'] === 'Even') ? '0, 2, 4, 6, or 8' : '1, 3, 5, 7, or 9'; ?>.
            <?php else: ?>
                <?php echo $result['number3'] . ' ' . $result['op'] . ' ' . $result['number4']; ?>
                = <strong style="color:#CC0066;"><?php echo $result['finalNum']; ?></strong>,
                which is <strong style="color:#CC0066;"><?php echo $result['answer']; ?></strong>.
            <?php endif; ?>
        </p>
    <?php else: ?>
        <br>
        <p style="font-size:15pt; font-weight:700; color:#800080; margin:15px 0;">
            <?php if ($q['form'] === 1): ?>
                Is the number
                <strong style="color:#CC0066;"><?php echo $q['number1']; ?></strong>
                ODD or EVEN?
            <?php else: ?>
                Is
                <strong style="color:#CC0066;">
                    <?php echo $q['number3'] . ' ' . $q['op'] . ' ' . $q['number4']; ?>
                </strong>
                ODD or EVEN?
            <?php endif; ?>
        </p>
        <?php render_choices(['Odd', 'Even'], 'ansclick', 'raw'); ?>
    <?php endif; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br>
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin: 30px 0;"<?php endif; ?>>

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