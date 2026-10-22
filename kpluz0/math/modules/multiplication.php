<?php
// math/modules/multiplication.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used.
// Answer = num1 × num2. Uses container.php + scorer.php only.
//
// Theme test4-* &#8594; paper-69-* (modern 800px container geometry).
//
// RANGES — one row per grade, Easy/Hard side by side. Each grade's Hard
// is roughly the next grade's Easy, so progression is smooth with no gaps.
// Grade 9+ clamps to grade 8.
//
// Format: [num1Min, num1Max, num2Min, num2Max]
//
// Layout threshold: both operands <= 12 &#8594; inline. Otherwise vertical
// (column method). Keeps times-table questions inline; larger products
// use the column format.
//
// To tune any grade, edit the numbers in $ranges — nothing else needs
// to change.

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

$moduleTitle = 'Multiplication of Numbers';
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
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];

// Format: [num1Min, num1Max, num2Min, num2Max]
// Progression: grade N Hard &#8776; grade N+1 Easy.
$ranges = [
    0 => ['Easy' => [1,   3,   1,  3],  'Hard' => [1,   5,   1,  5]],
    1 => ['Easy' => [0,   5,   0,  5],  'Hard' => [2,   10,  2,  10]],
    2 => ['Easy' => [0,   10,  0,  10], 'Hard' => [2,   12,  2,  12]],
    3 => ['Easy' => [2,   12,  2,  12], 'Hard' => [10,  20,  2,  9]],
    4 => ['Easy' => [10,  20,  2,  9],  'Hard' => [10,  30,  10, 20]],
    5 => ['Easy' => [10,  30,  10, 20], 'Hard' => [10,  99,  10, 20]],
    6 => ['Easy' => [10,  99,  10, 20], 'Hard' => [100, 999, 2,  9]],
    7 => ['Easy' => [100, 999, 2,  9],  'Hard' => [100, 999, 10, 30]],
    8 => ['Easy' => [100, 999, 10, 30], 'Hard' => [100, 999, 10, 50]],
];

$gradeKey = min(8, max(0, $grd));
$range    = $ranges[$gradeKey][$lvl];

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
        'correct' => $correct,
        'answer'  => $userInput,
        'num1'    => $cur['num1'],
        'num2'    => $cur['num2'],
        'ans'     => $cur['ans'],
        'inline'  => $cur['inline'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $num1 = rand($range[0], $range[1]);
    $num2 = rand($range[2], $range[3]);
    $ans  = $num1 * $num2;

    // Inline for times-table-ish problems; vertical for larger products.
    $inline = (max($num1, $num2) <= 12);

    $_SESSION[$sessionKey]['current'] = [
        'num1'   => $num1,
        'num2'   => $num2,
        'ans'    => $ans,
        'inline' => $inline,
        'lvl'    => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

function renderEquationCard($num1, $num2, $ans, $inline, $showInput, $correct = null) {
    $cardClass = 'equation-card';
    if ($correct === true)  $cardClass .= ' correct';
    if ($correct === false) $cardClass .= ' wrong';

    $digitCount = max(strlen((string)$num1), strlen((string)$num2), strlen((string)$ans));
    $inputPx    = max(100, ($digitCount + 1) * 32 + 24);
    $maxlen     = strlen((string)$ans) + 1;

    echo '<div class="' . $cardClass . '">';
    if ($inline) {
        echo '<div class="equation-inline">';
        echo '<span>' . $num1 . '</span>';
        echo '<span class="op">&times;</span>';
        echo '<span>' . $num2 . '</span>';
        echo '<span class="op">=</span>';
        if ($showInput) {
            echo '<input type="text" name="answer" maxlength="' . $maxlen . '"'
               . ' style="width:' . $inputPx . 'px;" autocomplete="off" autofocus>';
        } else {
            $ansColor = ($correct === true) ? '#4caf50' : '#e53935';
            echo '<span style="color:' . $ansColor . ';">' . $ans . '</span>';
        }
        echo '</div>';
    } else {
        echo '<table class="equation-vertical">';
        echo '<tr><td></td><td class="num">' . $num1 . '</td></tr>';
        echo '<tr><td class="op">&times;</td><td class="num">' . $num2 . '</td></tr>';
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
    }
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
        <?php renderEquationCard(
            $result['num1'], $result['num2'], $result['ans'],
            $result['inline'], false, $result['correct']
        ); ?>
    <?php else: ?>
        <br>
        <?php renderEquationCard(
            $q['num1'], $q['num2'], $q['ans'],
            $q['inline'], true
        ); ?>
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