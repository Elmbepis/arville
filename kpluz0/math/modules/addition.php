<?php
// math/modules/addition.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used. Answer = num1+num2.
// Uses container.php + scorer.php only.
//
// GRADE PROGRESSION PRESERVED — tier = min(8, grade + levelOffset)
//   Easy: offset 0   Hard: offset 1  (legacy Medium ranges)
// Hard uses the legacy "Medium" tier offset — legacy "Hard" (offset 2)
// proved too difficult for grade 1. See $tiers table below for ranges.
//
// Two display layouts, chosen by operand magnitude:
//   max(num1, num2) <= 20  &#8594; inline
//   max(num1, num2) >  20  &#8594; vertical (right-aligned, divider rule)

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

$moduleId   = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels     = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

$grdLabel    = ($grd == 0) ? 'Prep' : "Grade $grd";
$moduleTitle = "Addition of Numbers: $grdLabel";

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

$tiers = [
    0 => ['min' => 2,      'max' => 9],
    1 => ['min' => 3,      'max' => 15],
    2 => ['min' => 11,     'max' => 49],
    3 => ['min' => 50,     'max' => 499],
    4 => ['min' => 500,    'max' => 1999],
    5 => ['min' => 2000,   'max' => 19999],
    6 => ['min' => 20000,  'max' => 99999],
    7 => ['min' => 100001, 'max' => 499999],
    8 => ['min' => 500001, 'max' => 999999],
];

// Hard = legacy Medium offset (+1). Legacy Hard (+2) was too hard for grade 1.
$offset = ($lvl === 'Easy') ? 0 : 1;
$arrnum = min(8, $grd + $offset);
$tier   = $tiers[$arrnum];

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
    $num1 = rand($tier['min'], $tier['max']);
    $num2 = rand($tier['min'], $tier['max']);
    $ans  = $num1 + $num2;
    $inline = (max($num1, $num2) <= 20);

    $_SESSION[$sessionKey]['current'] = [
        'num1'   => $num1,
        'num2'   => $num2,
        'ans'    => $ans,
        'inline' => $inline,
        'lvl'    => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

function renderEquationCard($num1, $num2, $ans, $inline, $showInput, $correct = null, $userAnswer = null) {
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
        echo '<span class="op">+</span>';
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
        echo '<tr><td class="op">+</td><td class="num">' . $num2 . '</td></tr>';
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
            $result['inline'], false, $result['correct'], $result['answer']
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