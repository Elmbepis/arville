<?php
// math/modules/multiples.php
// Computed free-text (single input).
// Student finds the missing term in an arithmetic series of 6 values.

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

$moduleTitle = 'Counting in Multiples';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = (int)($_SESSION['grade'] ?? 0);
// Legacy defined grd>=3 as one block &#8594; clamp 4-6 to grade 3
$grdKey = min(3, max(0, $grd));

// Grade &#8594; config. Hard = legacy Medium (calibration rule §E).
$configs = [
    0 => [
        'Easy' => ['skips'=>[1,10],                  'startMin'=>1, 'startMax'=>8],
        'Hard' => ['skips'=>[2,3,5,10],              'startMin'=>2, 'startMax'=>9],
    ],
    1 => [
        'Easy' => ['skips'=>[2,3,10],                'startMin'=>2, 'startMax'=>7],
        'Hard' => ['skips'=>[2,3,4,5],               'startMin'=>3, 'startMax'=>15],
    ],
    2 => [
        'Easy' => ['skips'=>[3,4,5,6,7,8,9,10,100],  'startMin'=>1, 'startMax'=>6],
        'Hard' => ['skips'=>[7,8,9,11,50],           'startMin'=>4, 'startMax'=>9],
    ],
    3 => [
        'Easy' => ['skips'=>[4,5,6,7,8,9,11,12],     'startMin'=>4, 'startMax'=>13],
        'Hard' => ['skips'=>[6,7,8,9,11,12,13,14,15],'startMin'=>7, 'startMax'=>16],
    ],
];
$cfg = $configs[$grdKey][$lvl];

// ---- Handle Submit1 ----
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($userInput, (string)$cur['answer'], $cur['lvl']);

    $result = [
        'correct'   => $isCorrect,
        'userInput' => $userInput,
        'boxes'     => $cur['boxes'],
        'blank'     => $cur['blank'],
        'answer'    => $cur['answer'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Generate new question ----
if ($result === null || isset($_POST['Submit2'])) {
    $skip     = $cfg['skips'][array_rand($cfg['skips'])];
    $start1   = rand($cfg['startMin'], $cfg['startMax']);
    $start    = $start1 * $skip;

    $boxes = [];
    for ($i = 0; $i < 6; $i++) {
        $boxes[$i] = $start + $i * $skip;
    }
    $blank  = rand(0, 5);
    $answer = $boxes[$blank];

    $_SESSION[$sessionKey]['current'] = [
        'boxes'  => $boxes,
        'blank'  => $blank,
        'answer' => $answer,
        'lvl'    => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ---- Render ----
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
render_header($moduleTitle, $moduleTitle, $theme);
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
    <p style="font-size:14pt; color:#800080; margin:20px 0;">
        The correct series is:
    </p>
    <div style="display:inline-block; background:#f8f8ff; border:2px solid #8080ff; border-radius:10px; padding:14px 24px;">
        <span style="font-size:16pt; font-weight:700; color:#0000CC;">
            [ <?php echo implode(' ', $result['boxes']); ?> ]
        </span>
    </div>
<?php else: ?>
    <br>
    <p style="font-size:15pt; font-weight:700; color:#0000AA; margin:15px 0;">
        What is the missing number in this series?
    </p>
    <?php $maxlen = strlen((string)$q['answer']) + 1; ?>
    <div style="display:grid; grid-template-columns:repeat(6, 1fr); gap:8px; max-width:620px; margin:25px auto;">
        <?php for ($i = 0; $i < 6; $i++): ?>
            <div style="background:#f8f8ff; border:2px solid #b8b8d8; border-radius:8px; height:64px; display:flex; align-items:center; justify-content:center; box-sizing:border-box; overflow:hidden;">
                <?php if ($i === $q['blank']): ?>
                    <input type="text" name="answer"
                           style="width:100%; height:100%; font-size:20pt; text-align:center; border:none; background:transparent; font-family:'Comic Sans MS', sans-serif; font-weight:700; color:#0000CC; padding:0; box-sizing:border-box;"
                           maxlength="<?php echo $maxlen; ?>"
                           autocomplete="off" autofocus>
                <?php else: ?>
                    <span style="font-size:20pt; font-weight:700; color:#000;">
                        <?php echo htmlspecialchars((string)$q['boxes'][$i]); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
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
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();