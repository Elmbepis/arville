<?php
// math/modules/subtraction-several.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used.
// Answer = num1 - subtrahend[0] - subtrahend[1] [- subtrahend[2]].
// Uses container.php + scorer.php only.
//
// Theme test29-* &#8594; paper-69-* (modern 800px container geometry).
// Score box uses the module's OWN score-*-2 images — drop-in compatible
// with the container's 114×85 / 114×60 widget dimensions.
//
// DIFFICULTY — grade-keyed table (matching addition-several).
// Hard = legacy Medium ranges (recent calibration pattern).
//
// Legacy bugs fixed:
//   - `if ($arrnum>8){$arrnum==8;}` (assignment) &#8594; grade-keyed table
//     (grade 9+ clamps to grade 8).
//   - `$bar` dash-string rendering &#8594; CSS border rule in `.equation-vertical`.
//
// Format per cell: array of options, each [subtractionCount, min, max].
// For each option: pick that many subtrahends + 1 answer from [min,max],
// num1 = sum of all. Question: num1 - sub[0] - sub[1] ... = ?
//
// To tune any grade/level, edit its pool in $configs.

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

$moduleTitle = 'Subtracting Several Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    // Module's own score-box images — drop-in compatible
    'score_top'     => $base . '/math/images/score-top-2.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-2.jpg',
];

// Each option: [subtractionCount, min, max].
$configs = [
    0 => [
        'Easy' => [[2, 0, 3]],
        'Hard' => [[2, 2, 9], [3, 1, 5]],
    ],
    1 => [
        'Easy' => [[2, 0, 5]],
        'Hard' => [[2, 1, 8], [2, 2, 10]],
    ],
    2 => [
        'Easy' => [[2, 8, 30],  [3, 5, 15]],
        'Hard' => [[2, 15, 50], [3, 8, 25]],
    ],
    3 => [
        'Easy' => [[2, 20, 75],  [3, 10, 40]],
        'Hard' => [[2, 30, 150], [3, 15, 60]],
    ],
    4 => [
        'Easy' => [[2, 50, 250],   [3, 25, 100]],
        'Hard' => [[2, 100, 500],  [3, 50, 200]],
    ],
    5 => [
        'Easy' => [[2, 200, 1000], [3, 100, 400]],
        'Hard' => [[2, 500, 2000], [3, 200, 800]],
    ],
    6 => [
        'Easy' => [[2, 1000, 5000],  [3, 500, 2000]],
        'Hard' => [[2, 2000, 10000], [3, 1000, 4000]],
    ],
    7 => [
        'Easy' => [[2, 5000, 20000],  [3, 2000, 8000]],
        'Hard' => [[2, 10000, 50000], [3, 5000, 20000]],
    ],
    8 => [
        'Easy' => [[2, 20000, 100000],  [3, 10000, 40000]],
        'Hard' => [[2, 50000, 250000],  [3, 20000, 100000]],
    ],
];

$gradeKey = min(8, max(0, $grd));
$options  = $configs[$gradeKey][$lvl];

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userInput, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct'      => $correct,
        'answer'       => $userInput,
        'num1'         => $cur['num1'],
        'subtrahends'  => $cur['subtrahends'],
        'ans'          => $cur['ans'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    [$subCount, $min, $max] = $options[array_rand($options)];

    $subtrahends = [];
    $sum = 0;
    for ($i = 0; $i < $subCount; $i++) {
        $n = rand($min, $max);
        $subtrahends[] = $n;
        $sum += $n;
    }
    $ans  = rand($min, $max);
    $num1 = $sum + $ans;

    $_SESSION[$sessionKey]['current'] = [
        'num1'        => $num1,
        'subtrahends' => $subtrahends,
        'ans'         => $ans,
        'lvl'         => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render the vertical subtraction card with stacked subtrahends.
 * Answer row gets 14px padding-top matching the rule-to-input gap.
 */
function renderSubCard($num1, $subtrahends, $ans, $showInput, $correct = null) {
    $cardClass = 'equation-card';
    if ($correct === true)  $cardClass .= ' correct';
    if ($correct === false) $cardClass .= ' wrong';

    $digitCount = strlen((string)$ans);
    foreach ($subtrahends as $n) {
        $digitCount = max($digitCount, strlen((string)$n));
    }
    $digitCount = max($digitCount, strlen((string)$num1));
    $inputPx = max(100, ($digitCount + 1) * 32 + 24);
    $maxlen  = strlen((string)$ans) + 1;

    echo '<div class="' . $cardClass . '">';
    echo '<table class="equation-vertical">';
    echo '<tr><td></td><td class="num">' . $num1 . '</td></tr>';
    foreach ($subtrahends as $sub) {
        echo '<tr><td class="op">&minus;</td><td class="num">' . $sub . '</td></tr>';
    }
    echo '<tr><td colspan="2" class="rule"></td></tr>';
    echo '<tr><td></td><td style="padding-top: 14px;">';
    if ($showInput) {
        echo '<input type="text" name="answer" maxlength="' . $maxlen . '"'
           . ' style="width:' . $inputPx . 'px;" autocomplete="off" autofocus>';
    } else {
        $ansColor = ($correct === true) ? '#4caf50' : '#e53935';
        echo '<span class="num" style="color:' . $ansColor . '; display:inline-block; width:' . $inputPx . 'px;">' . $ans . '</span>';
    }
    echo '</td></tr>';
    echo '</table>';
    echo '</div>';
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <?php if ($result !== null): ?>
        <br>
        <p style="font-size:14pt; color:#666;">
            Your answer: <strong><?php echo htmlspecialchars($result['answer']); ?></strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <?php renderSubCard($result['num1'], $result['subtrahends'], $result['ans'], false, $result['correct']); ?>
    <?php else: ?>
        <br>
        <?php renderSubCard($q['num1'], $q['subtrahends'], $q['ans'], true); ?>
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