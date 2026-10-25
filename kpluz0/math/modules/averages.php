<?php
// math/modules/averages.php
// Computed free-text, single input. Average of 2-4 numbers.
// Easy = legacy Easy; Hard = legacy Medium (§E calibration).
// All operands chosen so average is always an integer.

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

$moduleTitle = 'Averaging Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(3, $grd));  // clamp: <3&#8594;3, >6&#8594;6

// Config: [numLimit1, numLimit2, numLimit3, numLimit4, mindiff]
$configs = [
    3 => [
        'Easy' => [21, 99, 2, 2, 12],
        'Hard' => [45, 149, 2, 3, 15],
    ],
    4 => [
        'Easy' => [21, 99, 2, 2, 15],
        'Hard' => [35, 149, 3, 3, 21],
    ],
    5 => [
        'Easy' => [40, 129, 3, 3, 21],
        'Hard' => [149, 299, 3, 4, 30],
    ],
    6 => [
        'Easy' => [101, 249, 3, 3, 21],
        'Hard' => [249, 499, 3, 4, 35],
    ],
];
[$n1lo, $n1hi, $nnLo, $nnHi, $mindiff] = $configs[$grdKey][$lvl];

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $studentAns = (int)trim((string)($_POST['answer'] ?? '0'));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer((string)$studentAns, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'student' => $studentAns,
        'ans'     => $cur['ans'],
        'nums'    => $cur['nums'],
        'sum'     => $cur['sum'],
        'count'   => $cur['count'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $numnum = rand($nnLo, $nnHi);
    $nums = [];

    if ($numnum == 2) {
        $tries = 0;
        do {
            $nums[0] = rand($n1lo, $n1hi);
            $nums[1] = rand($n1lo, $n1hi);
            $tries++;
        } while ((($nums[0] + $nums[1]) % 2 !== 0 || abs($nums[0] - $nums[1]) < $mindiff) && $tries < 200);
        $ans = intdiv($nums[0] + $nums[1], 2);
    } elseif ($numnum == 3) {
        $ave = intdiv($n1lo + $n1hi, 2);
        $ans = rand($ave - $mindiff, $ave + $mindiff);
        $tries = 0;
        do {
            $nums[0] = rand($n1lo, $n1hi);
            do {
                $nums[1] = rand($n1lo, $n1hi);
                $tries++;
            } while (abs($nums[0] - $nums[1]) < $mindiff && $tries < 200);
            $nums[2] = $ans * 3 - ($nums[0] + $nums[1]);
            $tries++;
        } while ($nums[2] < $mindiff && $tries < 200);
    } else {  // numnum == 4
        $ave = intdiv($n1lo + $n1hi, 2);
        $ans = rand($ave - $mindiff, $ave + $mindiff);
        $tries = 0;
        do {
            $nums[0] = rand($n1lo, $n1hi);
            do {
                $nums[1] = rand($n1lo, $n1hi);
                $tries++;
            } while (abs($nums[0] - $nums[1]) < $mindiff && $tries < 200);
            $nums[2] = rand($n1lo, $n1hi);
            $nums[3] = $ans * 4 - ($nums[0] + $nums[1] + $nums[2]);
            $tries++;
        } while ($nums[3] < $mindiff && $tries < 200);
    }

    $sum = array_sum($nums);

    $_SESSION[$sessionKey]['current'] = [
        'nums'  => $nums,
        'sum'   => $sum,
        'count' => $numnum,
        'ans'   => $ans,
        'lvl'   => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
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
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answer: <strong style="color:#0000BB; font-size:16pt;"><?php echo $result['student']; ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
        <p class="statement" style="font-size:14pt; color:#800080;">The average of <?php echo implode(', ', $result['nums']); ?> is <strong style="color:#CC0066;"><?php echo $result['ans']; ?></strong> <br/>because (<?php echo implode(' + ', $result['nums']); ?>) &divide; <?php echo $result['count']; ?> = <?php echo $result['sum']; ?> &divide; <?php echo $result['count']; ?> = <?php echo $result['ans']; ?>.</p>
        
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;">
        Find the average of these numbers:
    </p>
    <p style="font-size:22pt; font-weight:700; color:#0000BB; margin:15px 0;">
        <?php echo implode('&nbsp;&nbsp;', $q_curr['nums']); ?>
    </p>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin:20px 0;">
        Answer:
        <input type="text" name="answer" size="1" maxlength="6"
               style="width:120px; height:44px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
               autocomplete="off" autofocus>
    </p>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php endif; ?>

    <?php if ($result !== null): ?>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
    <?php endif; ?>

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