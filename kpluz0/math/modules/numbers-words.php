<?php
// math/modules/numbers-words.php
//
// TWO-MODE module — word&#8596;number conversion. Free-text answer, POST Submit1.
//
//   Easy grade<3 &#8594; form=1: word shown, student types NUMBER
//   All other    &#8594; form=2: number shown, student types WORD
//
// Word case: grade<3 &#8594; UPPERCASE ("TWENTY-ONE"); grade&#8805;3 &#8594; lowercase
// ("one hundred twenty-three"). Matches legacy display.
//
// Scoring canonicalizes both sides:
//   form=1 &#8594; integer comparison ("021" == "21")
//   form=2 &#8594; normalize case + collapse spaces + hyphen&#8594;space
//            ("twenty one" == "TWENTY-ONE" == "twenty-one")
//
// Level merge: Easy = legacy Easy, Hard = legacy Medium.
//
// LEGACY FIX: extended grade 3+ ranges (legacy left them undefined for the
// tier-3 branch, causing PHP warnings and broken questions on that branch).
//
// Repeat prevention: skip the previous question's number.

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

$moduleTitle = 'Numbers in Words';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

// Range table — Easy / Hard (= legacy Medium)
$ranges = [
    0 => ['Easy' => [1, 30],     'Hard' => [1, 30]],
    1 => ['Easy' => [11, 50],    'Hard' => [11, 60]],
    2 => ['Easy' => [11, 50],    'Hard' => [31, 70]],
    3 => ['Easy' => [101, 999],  'Hard' => [1001, 9999]],
];
$gradeKey = min(3, max(0, $grd));
[$nMin, $nMax] = $ranges[$gradeKey][$lvl];

// Form: Easy grade<3 &#8594; word&#8594;number (form 1); all else &#8594; number&#8594;word (form 2)
$form = ($lvl === 'Easy' && $grd < 3) ? 1 : 2;

/** 1 &#8594; "ONE", 21 &#8594; "TWENTY-ONE", 1234 &#8594; "ONE THOUSAND TWO HUNDRED THIRTY-FOUR" */
function numberToWord($n) {
    $n = (int)$n;
    if ($n === 0) return 'ZERO';

    $ones = ['', 'ONE', 'TWO', 'THREE', 'FOUR', 'FIVE', 'SIX', 'SEVEN', 'EIGHT', 'NINE',
             'TEN', 'ELEVEN', 'TWELVE', 'THIRTEEN', 'FOURTEEN', 'FIFTEEN', 'SIXTEEN',
             'SEVENTEEN', 'EIGHTEEN', 'NINETEEN'];
    $tens = ['', '', 'TWENTY', 'THIRTY', 'FORTY', 'FIFTY', 'SIXTY', 'SEVENTY', 'EIGHTY', 'NINETY'];

    $word = '';

    if ($n >= 1000) {
        $t = intdiv($n, 1000);
        $n = $n % 1000;
        if ($t >= 20) {
            $word .= $tens[intdiv($t, 10)];
            if ($t % 10 > 0) $word .= '-' . $ones[$t % 10];
        } else {
            $word .= $ones[$t];
        }
        $word .= ' THOUSAND';
        if ($n > 0) $word .= ' ';
    }

    if ($n >= 100) {
        $word .= $ones[intdiv($n, 100)] . ' HUNDRED';
        $n = $n % 100;
        if ($n > 0) $word .= ' ';
    }

    if ($n >= 20) {
        $word .= $tens[intdiv($n, 10)];
        if ($n % 10 > 0) $word .= '-' . $ones[$n % 10];
    } elseif ($n > 0) {
        $word .= $ones[$n];
    }

    return $word;
}

/** Normalize a word for comparison: uppercase, collapse spaces, hyphen&#8594;space */
function canonicalWord($w) {
    $w = strtoupper(trim((string)$w));
    $w = str_replace('-', ' ', $w);
    $w = preg_replace('/\s+/', ' ', $w);
    return $w;
}

// ============================================================
// HANDLE ANSWER (Submit1)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = (string)($_POST['answer'] ?? '');

    if ($cur['form'] === 1) {
        $studentAnswer = (string)(int)trim($raw);
        $correctAnswer = (string)(int)$cur['number'];
    } else {
        $studentAnswer = canonicalWord($raw);
        $correctAnswer = canonicalWord($cur['word']);
    }

    $scorer = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($studentAnswer, $correctAnswer, $cur['lvl']);

    $result = [
        'correct' => $correct,
        'raw'     => $raw,
        'form'    => $cur['form'],
        'number'  => $cur['number'],
        'word'    => $cur['word'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $lastNumber = $_SESSION[$sessionKey]['last_number'] ?? -1;
    $num = $nMin;
    $tries = 0;
    do {
        $num = rand($nMin, $nMax);
        $tries++;
    } while ($num === $lastNumber && $tries < 20);

    $word = numberToWord($num);
    $wordDisplay = ($grd < 3) ? $word : strtolower($word);

    $_SESSION[$sessionKey]['current'] = [
        'form'   => $form,
        'number' => $num,
        'word'   => $wordDisplay,
        'lvl'    => $lvl,
    ];
    $_SESSION[$sessionKey]['last_number'] = $num;
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
            <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <?php if ($result['form'] === 1): ?>
            <p style="font-size:15pt; font-weight:700; color:#800080;">
                The word
                <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['word']); ?>'</strong>
                is <strong style="color:#CC0066;"><?php echo $result['number']; ?></strong>.
            </p>
        <?php else: ?>
            <p style="font-size:15pt; font-weight:700; color:#800080;">
                The number
                <strong style="color:#CC0066;"><?php echo $result['number']; ?></strong>
                is written
                <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['word']); ?>'</strong>.
            </p>
        <?php endif; ?>

    <?php else: ?>
        <br>
        <?php if ($q['form'] === 1): ?>
            <p style="font-size:15pt; font-weight:700; color:#800080;">
                Type the number for:
            </p>
            <p style="font-family:'Comic Sans MS',sans-serif;
                      font-size:32pt; font-weight:700; color:#CC0066;
                      margin:25px 0; word-wrap:break-word;">
                <?php echo htmlspecialchars($q['word']); ?>
            </p>
            <p>
                <input type="text" name="answer" class="answer-input"
                       style="width:160px; height:52px; font-size:28px; text-align:center;"
                       maxlength="<?php echo strlen((string)$q['number']) + 1; ?>"
                       autocomplete="off" autofocus>
            </p>
        <?php else: ?>
            <p style="font-size:15pt; font-weight:700; color:#800080;">
                Type the word for:
            </p>
            <p style="font-family:'Comic Sans MS',sans-serif;
                      font-size:52pt; font-weight:700; color:#CC0066;
                      margin:25px 0;">
                <?php echo $q['number']; ?>
            </p>
            <p>
                <input type="text" name="answer" class="answer-input"
                       style="width:90%; max-width:520px; height:52px; font-size:22px;
                              padding:8px 15px; text-align:center;<?php
                              echo ($grd < 3) ? ' text-transform:uppercase;' : ''; ?>"
                       maxlength="<?php echo strlen($q['word']) + 8; ?>"
                       autocomplete="off" autofocus>
            </p>
        <?php endif; ?>
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