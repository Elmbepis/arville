<?php
// math/modules/addition-several.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used.
// Answer = sum of 3, 4, or 5 addends. Uses container.php + scorer.php only.
//
// Theme test28-* &#8594; paper-69-* (modern 800px container geometry).
//
// GRADE PROGRESSION — $configs table indexed by grade. Each grade/level
// has a POOL of options [addendCount, min, max]. One picked at random
// per question — gives variety without duplicating legacy's branching.
//
// Legacy bugs fixed:
//   - `if ($arrnum>8){$arrnum==8;}` (assignment bug) — replaced with
//     explicit grade-keyed table (grade 9+ clamps to grade 8).
//   - `$bar` dash-string rendering — replaced with CSS border rule.
//
// Layout: always vertical column (multiple addends). Answer input sized
// from the widest addend or sum.
//
// To tune any grade/level, edit the pool in $configs — nothing else.

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

$moduleTitle = 'Adding Several Numbers';
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

// Each option: [addendCount, min, max]. One picked at random per question.
$configs = [
    0 => [
        'Easy' => [[3, 1, 6]],
        'Hard' => [[3, 2, 9]],
    ],
    1 => [
        'Easy' => [[3, 1, 6]],
        'Hard' => [[3, 3, 8],  [3, 4, 9]],
    ],
    2 => [
        'Easy' => [[3, 10, 30], [4, 5, 15]],
        'Hard' => [[3, 19, 49], [4, 8, 24], [5, 5, 15]],
    ],
    3 => [
        'Easy' => [[3, 25, 75], [4, 15, 40]],
        'Hard' => [[3, 49, 149], [4, 25, 79], [5, 15, 45]],
    ],
    4 => [
        'Easy' => [[3, 100, 500], [4, 50, 250], [5, 25, 100]],
        'Hard' => [[3, 300, 1000], [4, 150, 500], [5, 75, 250]],
    ],
    5 => [
        'Easy' => [[3, 500, 2000], [4, 250, 1000], [5, 100, 500]],
        'Hard' => [[3, 1000, 5000], [4, 500, 2500], [5, 200, 1000]],
    ],
    6 => [
        'Easy' => [[3, 2000, 8000], [4, 1000, 4000], [5, 500, 2000]],
        'Hard' => [[3, 5000, 15000], [4, 2500, 8000], [5, 1000, 4000]],
    ],
    7 => [
        'Easy' => [[3, 8000, 20000], [4, 5000, 15000], [5, 2000, 8000]],
        'Hard' => [[3, 15000, 40000], [4, 10000, 25000], [5, 5000, 15000]],
    ],
    8 => [
        'Easy' => [[3, 25000, 75000], [4, 15000, 50000], [5, 10000, 30000]],
        'Hard' => [[3, 50000, 150000], [4, 30000, 100000], [5, 20000, 75000]],
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
        'correct' => $correct,
        'answer'  => $userInput,
        'nums'    => $cur['nums'],
        'ans'     => $cur['ans'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    [$count, $min, $max] = $options[array_rand($options)];

    $nums = [];
    $ans  = 0;
    for ($i = 0; $i < $count; $i++) {
        $n = rand($min, $max);
        $nums[] = $n;
        $ans += $n;
    }

    $_SESSION[$sessionKey]['current'] = [
        'nums' => $nums,
        'ans'  => $ans,
        'lvl'  => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render the stacked addends card. Answer row gets 14px padding-top so
 * the gap between the horizontal rule and the input matches the gap above.
 */
function renderMultiAddendCard($nums, $ans, $showInput, $correct = null) {
    $cardClass = 'equation-card';
    if ($correct === true)  $cardClass .= ' correct';
    if ($correct === false) $cardClass .= ' wrong';

    $digitCount = strlen((string)$ans);
    foreach ($nums as $n) {
        $digitCount = max($digitCount, strlen((string)$n));
    }
    $inputPx = max(100, ($digitCount + 1) * 32 + 24);
    $maxlen  = strlen((string)$ans) + 1;

    echo '<div class="' . $cardClass . '">';
    echo '<table class="equation-vertical">';
    echo '<tr><td></td><td class="num">' . $nums[0] . '</td></tr>';
    for ($i = 1; $i < count($nums); $i++) {
        echo '<tr><td class="op">+</td><td class="num">' . $nums[$i] . '</td></tr>';
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
        <?php renderMultiAddendCard($result['nums'], $result['ans'], false, $result['correct']); ?>
    <?php else: ?>
        <br>
        <?php renderMultiAddendCard($q['nums'], $q['ans'], true); ?>
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