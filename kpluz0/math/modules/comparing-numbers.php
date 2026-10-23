<?php
// math/modules/comparing-numbers.php
//
// COMPUTED-ANSWER module — student TYPES the comparison symbol (> < =).
// Uses container.php + scorer.php only.
//
// TWO MODES:
//   Grades 0-2 &#8594; compare two numbers directly (icon display when &#8804; 20)
//   Grades 3+  &#8594; compare two arithmetic expressions (4 operator combinations)
//
// LEVEL MERGE: Hard = legacy Medium.
//
// ANSWER INPUT: single-character text input, inline between the two sides.
// Neutral white box, no focus highlight. Accepts '>', '<', '=' only.

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

$moduleTitle = 'Comparing Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

$ranges = [
    0 => ['Easy' => [2, 16],    'Hard' => [8, 24]],
    1 => ['Easy' => [5, 24],    'Hard' => [11, 99]],
    2 => ['Easy' => [49, 499],  'Hard' => [149, 1999]],
    3 => ['Easy' => [29, 129],  'Hard' => [79, 499]],
];
$gradeKey = min(3, max(0, $grd));
[$nMin, $nMax] = $ranges[$gradeKey][$lvl];

$useExpressions = ($grd > 2);
$objects = ['balls','trucks','apples','dogs','cars','dolls','robots','bikes'];

// ============================================================
// HANDLE ANSWER (Submit1 — typed symbol)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = trim((string)($_POST['answer'] ?? ''));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($raw, $cur['answer'], $cur['lvl']);

    $result = [
        'correct'   => $correct,
        'userInput' => $raw,
        'num1'      => $cur['num1'],
        'num2'      => $cur['num2'],
        'exp1'      => $cur['exp1'],
        'exp2'      => $cur['exp2'],
        'answer'    => $cur['answer'],
        'mode'      => $cur['mode'],
        'image'     => $cur['image'] ?? null,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($useExpressions) {
        $type = rand(1, 4);
        switch ($type) {
            case 1:
                $a = rand($nMin, $nMax); $b = rand($nMin, $nMax);
                $c = rand($nMin, $nMax); $d = rand($nMin, $nMax);
                $exp1 = "$a + $b"; $exp2 = "$c + $d";
                $num1 = $a + $b;   $num2 = $c + $d;
                break;
            case 2:
                do { $a = rand($nMin, $nMax); $b = rand($nMin, $nMax); } while ($a <= $b);
                do { $c = rand($nMin, $nMax); $d = rand($nMin, $nMax); } while ($c <= $d);
                $exp1 = "$a - $b"; $exp2 = "$c - $d";
                $num1 = $a - $b;   $num2 = $c - $d;
                break;
            case 3:
                $a = rand($nMin, $nMax); $b = rand($nMin, $nMax);
                do { $c = rand($nMin, $nMax); $d = rand($nMin, $nMax); } while ($c <= $d);
                $exp1 = "$a + $b"; $exp2 = "$c - $d";
                $num1 = $a + $b;   $num2 = $c - $d;
                break;
            default:
                do { $a = rand($nMin, $nMax); $b = rand($nMin, $nMax); } while ($a <= $b);
                $c = rand($nMin, $nMax); $d = rand($nMin, $nMax);
                $exp1 = "$a - $b"; $exp2 = "$c + $d";
                $num1 = $a - $b;   $num2 = $c + $d;
        }
        $mode  = 'expressions';
        $image = null;
    } else {
        $num1 = rand($nMin, $nMax);
        $num2 = rand($nMin, $nMax);

        $showIcons = (max($num1, $num2) <= 20);
        $mode  = $showIcons ? 'icons' : 'numbers';
        $image = $showIcons
            ? $base . '/math/images/objects/3' . $objects[array_rand($objects)] . '.jpg'
            : null;

        $exp1 = null;
        $exp2 = null;
    }

    if ($num1 > $num2)      $answer = '>';
    elseif ($num1 < $num2)  $answer = '<';
    else                    $answer = '=';

    $_SESSION[$sessionKey]['current'] = [
        'num1'   => $num1,
        'num2'   => $num2,
        'exp1'   => $exp1,
        'exp2'   => $exp2,
        'answer' => $answer,
        'mode'   => $mode,
        'image'  => $image,
        'lvl'    => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render the two sides with an input (question) or correct symbol (result)
 * in the middle.
 */
function renderComparison($num1, $num2, $exp1, $exp2, $mode, $image, $showInput, $correctAnswer = null) {
    $out = '<div style="display:inline-flex; justify-content:center; align-items:center;'
         . ' gap:25px; flex-wrap:wrap; margin:20px auto; padding:20px;'
         . ' background:#fafaff; border:2px solid #d0d0e8; border-radius:16px;'
         . ' max-width:100%;">';

    // &#9472;&#9472; Left side &#9472;&#9472;
    $out .= '<div style="display:flex; justify-content:center; align-items:center;'
          . ' min-width:80px; min-height:80px;">';
    if ($mode === 'icons') {
        $out .= '<div style="text-align:center;">';
        for ($i = 0; $i < $num1; $i++) {
            $out .= '<img src="' . htmlspecialchars($image) . '" alt=""'
                 . ' style="display:inline-block; margin:2px; max-width:40px; max-height:40px;">';
            if (($i + 1) % 4 === 0 && $i < $num1 - 1) $out .= '<br>';
        }
        $out .= '</div>';
    } elseif ($mode === 'numbers') {
        $maxDigits = max(strlen((string)$num1), strlen((string)$num2));
        $fontPt = 36;
        if ($maxDigits >= 4) $fontPt = 28;
        if ($maxDigits >= 5) $fontPt = 22;
        $out .= '<div style="font-family:\'Comic Sans MS\',sans-serif;'
             . ' font-size:' . $fontPt . 'pt; font-weight:700; color:#800080;">'
             . $num1 . '</div>';
    } else {
        $maxLen = max(strlen($exp1), strlen($exp2));
        $fontPt = 28;
        if ($maxLen >= 12) $fontPt = 22;
        $out .= '<div style="font-family:\'Comic Sans MS\',sans-serif;'
             . ' font-size:' . $fontPt . 'pt; font-weight:700; color:#800080;'
             . ' white-space:nowrap;">'
             . htmlspecialchars($exp1) . '</div>';
    }
    $out .= '</div>';

    // &#9472;&#9472; Middle: input (question) or correct symbol (result) &#9472;&#9472;
    // Neutral box — no focus glow, no accent border. Matches letter-box
    // styling used elsewhere. outline:none kills the browser's default
    // focus outline that would otherwise paint black lines over the border.
    if ($showInput) {
        $out .= '<input type="text" name="answer" maxlength="1"'
             . ' autocomplete="off" autofocus'
             . ' style="width:60px; height:60px; text-align:center;'
             . ' font-family:\'Comic Sans MS\',sans-serif; font-size:30pt;'
             . ' font-weight:700; color:#0000CC; background:#ffffff;'
             . ' border:3px solid #b0b0d8; border-radius:10px;'
             . ' box-sizing:border-box; padding:0; outline:none;"'
             . ' oninput="this.value=this.value.replace(/[^&lt;&gt;=]/g,\'\')">';
    } else {
        $out .= '<div style="width:60px; height:60px; display:inline-flex;'
             . ' align-items:center; justify-content:center; background:#f4fbf4;'
             . ' border:3px solid #4caf50; border-radius:10px;'
             . ' font-family:\'Comic Sans MS\',sans-serif;'
             . ' font-size:30pt; font-weight:700; color:#4caf50;'
             . ' box-sizing:border-box;">'
             . htmlspecialchars($correctAnswer)
             . '</div>';
    }

    // &#9472;&#9472; Right side &#9472;&#9472;
    $out .= '<div style="display:flex; justify-content:center; align-items:center;'
          . ' min-width:80px; min-height:80px;">';
    if ($mode === 'icons') {
        $out .= '<div style="text-align:center;">';
        for ($i = 0; $i < $num2; $i++) {
            $out .= '<img src="' . htmlspecialchars($image) . '" alt=""'
                 . ' style="display:inline-block; margin:2px; max-width:40px; max-height:40px;">';
            if (($i + 1) % 4 === 0 && $i < $num2 - 1) $out .= '<br>';
        }
        $out .= '</div>';
    } elseif ($mode === 'numbers') {
        $maxDigits = max(strlen((string)$num1), strlen((string)$num2));
        $fontPt = 36;
        if ($maxDigits >= 4) $fontPt = 28;
        if ($maxDigits >= 5) $fontPt = 22;
        $out .= '<div style="font-family:\'Comic Sans MS\',sans-serif;'
             . ' font-size:' . $fontPt . 'pt; font-weight:700; color:#800080;">'
             . $num2 . '</div>';
    } else {
        $maxLen = max(strlen($exp1), strlen($exp2));
        $fontPt = 28;
        if ($maxLen >= 12) $fontPt = 22;
        $out .= '<div style="font-family:\'Comic Sans MS\',sans-serif;'
             . ' font-size:' . $fontPt . 'pt; font-weight:700; color:#800080;'
             . ' white-space:nowrap;">'
             . htmlspecialchars($exp2) . '</div>';
    }
    $out .= '</div>';

    $out .= '</div>';
    return $out;
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
            <strong style="color:#0000CC; font-size:18pt;">'<?php echo htmlspecialchars($result['userInput']); ?>'</strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>

        <?php echo renderComparison(
            $result['num1'], $result['num2'],
            $result['exp1'], $result['exp2'],
            $result['mode'], $result['image'],
            false,
            $result['answer']
        ); ?>

        <?php if ($result['mode'] === 'expressions'): ?>
            <p style="font-size:13pt; color:#666; margin-top:10px;">
                <?php echo htmlspecialchars($result['exp1']); ?> = <?php echo $result['num1']; ?>,
                <?php echo htmlspecialchars($result['exp2']); ?> = <?php echo $result['num2']; ?>,
                so <?php echo $result['num1']; ?> <?php echo $result['answer']; ?> <?php echo $result['num2']; ?>.
            </p>
        <?php endif; ?>

    <?php else: ?>
        <br>
        <?php echo renderComparison(
            $q['num1'], $q['num2'],
            $q['exp1'], $q['exp2'],
            $q['mode'], $q['image'],
            true
        ); ?>

        <p style="font-size:14pt; font-weight:700; color:#333; margin:20px 0 15px;">
            Type <span style="color:#CC0066; font-size:18pt;">&gt;</span>,
            <span style="color:#CC0066; font-size:18pt;">&lt;</span>, or
            <span style="color:#CC0066; font-size:18pt;">=</span>
            in the box above.
        </p>
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