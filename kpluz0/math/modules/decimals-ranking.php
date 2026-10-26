<?php
// math/modules/decimals-ranking.php
// Multi-input free-text. Student ranks N decimal numbers by entering
// the rank (1..N) under each. Compound scoring via joined string.
//
// Bypass §D category 2. Levels: Easy = legacy Easy, Hard = legacy Medium (§E).
//
// FIX #1: legacy uniqueness check ran on pre-scale value — e.g. num=5.5
//         became 0.55 on display and could collide with another 0.55.
//         Now checks on the final display string.
// FIX #2: legacy $boxnum = grd + level offset, but Easy was NOT clamped
//         before Medium/Hard. Recomputed per grade+level in the configs table.
// Theme: bg01-* is the accepted colors.php exception and doesn't fit §C
//        layout reliably &#8594; paper-69-*.
//
// DB row required: modules.url = 'decimals-ranking.php'

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

$moduleTitle = 'Ranking Decimal Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(3, (int)($_SESSION['grade'] ?? 3)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// HANDLE SUBMIT1  (multi-input compound scoring)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $boxnum = $cur['boxnum'];

    $studentRanks = [];
    for ($i = 1; $i <= $boxnum; $i++) {
        $studentRanks[] = (int)($_POST['answer' . $i] ?? 0);
    }
    $studentCombined = implode('|', $studentRanks);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($studentCombined, $cur['correctCombined'], $cur['lvl']);

    $result = [
        'correct'      => $isCorrect,
        'studentRanks' => $studentRanks,
        'cur'          => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $configs = [
        3 => [
            'Easy' => ['boxnum'=>3, 'intMin'=>11, 'intMax'=>99,  'placesMin'=>1, 'placesMax'=>2],
            'Hard' => ['boxnum'=>4, 'intMin'=>11, 'intMax'=>99,  'placesMin'=>1, 'placesMax'=>3],
        ],
        4 => [
            'Easy' => ['boxnum'=>4, 'intMin'=>111,'intMax'=>999, 'placesMin'=>1, 'placesMax'=>3],
            'Hard' => ['boxnum'=>5, 'intMin'=>111,'intMax'=>999, 'placesMin'=>1, 'placesMax'=>4],
        ],
        5 => [
            'Easy' => ['boxnum'=>5, 'intMin'=>111,'intMax'=>999, 'placesMin'=>1, 'placesMax'=>4],
            'Hard' => ['boxnum'=>6, 'intMin'=>111,'intMax'=>9999,'placesMin'=>1, 'placesMax'=>4],
        ],
        6 => [
            'Easy' => ['boxnum'=>6, 'intMin'=>11, 'intMax'=>999, 'placesMin'=>1, 'placesMax'=>4],
            'Hard' => ['boxnum'=>6, 'intMin'=>11, 'intMax'=>9999,'placesMin'=>2, 'placesMax'=>5],
        ],
    ];
    $cfg    = $configs[$grd][$lvl];
    $boxnum = $cfg['boxnum'];

    // Generate $boxnum unique decimals, all in (0, 1).
    // Uniqueness key = final display string (trailing zeros trimmed).
    $usedStrs = [];
    $nums = [];

    for ($i = 1; $i <= $boxnum; $i++) {
        $tries = 0;
        do {
            $places = rand($cfg['placesMin'], $cfg['placesMax']);
            $min    = (int)pow(10, $places - 1);
            $max    = (int)pow(10, $places) - 1;
            $digits = rand($min, $max);
            $raw    = '0.' . str_pad((string)$digits, $places, '0', STR_PAD_LEFT);
            $disp   = rtrim(rtrim($raw, '0'), '.');
            if ($disp === '0') $disp = '0.1';
            $tries++;
        } while (in_array($disp, $usedStrs, true) && $tries < 60);   // §I

        $usedStrs[] = $disp;
        $nums[$i]   = ['display' => $disp, 'value' => (float)$disp];
    }

    // Compute ranks: highest gets 1, next gets 2, ..., lowest gets $boxnum.
    $sortedIdx = array_keys($nums);
    usort($sortedIdx, function($a, $b) use ($nums) {
        return $nums[$b]['value'] <=> $nums[$a]['value'];
    });

    $correctRanks = [];
    foreach ($sortedIdx as $rankMinus1 => $idx) {
        $correctRanks[$idx] = $rankMinus1 + 1;
    }

    // Order the correct ranks per position 1..N.
    $correctCombinedArr = [];
    for ($i = 1; $i <= $boxnum; $i++) {
        $correctCombinedArr[] = $correctRanks[$i];
    }
    $correctCombined = implode('|', $correctCombinedArr);

    // Correct answer display string (highest to lowest).
    $sortedDisplay = [];
    foreach ($sortedIdx as $idx) {
        $sortedDisplay[] = $nums[$idx]['display'];
    }

    $_SESSION[$sessionKey]['current'] = [
        'nums'            => $nums,
        'boxnum'          => $boxnum,
        'correctCombined' => $correctCombined,
        'sortedDisplay'   => $sortedDisplay,
        'lvl'             => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' : Level ' . $grd . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        You arranged the numbers in this order:
        <strong style="color:#0000CC; font-size:16pt;">
            <?php
            $studentOrder = [];
            foreach ($result['studentRanks'] as $posMinus1 => $rank) {
                $pos = $posMinus1 + 1;
                $studentOrder[$rank] = $result['cur']['nums'][$pos]['display'] ?? '?';
            }
            ksort($studentOrder);
            echo implode(' &nbsp; ', $studentOrder);
            ?>
        </strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        The decimal numbers, arranged from highest to lowest, are:<br>
        <strong style="color:#0000CC; font-size:16pt;">
            <?php echo implode(' &nbsp; ', $result['cur']['sortedDisplay']); ?>
        </strong>
    </p>
<?php else: ?>
    <p style="font-size:15pt; font-weight:600; color:#0000CC; margin-top:20px;">
        Rank the following decimal numbers.
    </p>
    <p style="font-size:13pt; color:#333;">
        <?php if ($q['boxnum'] <= 3): ?>
            Put '1' under the highest, '2' under the next highest, and '3' under the lowest.
        <?php else: ?>
            Put '1' under the highest, '2' under the next highest, and so on.
        <?php endif; ?>
    </p>

    <div style="display:flex; flex-wrap:wrap; gap:30px; justify-content:center; margin:30px auto; max-width:720px;">
    <?php for ($i = 1; $i <= $q['boxnum']; $i++): ?>
        <div style="display:flex; flex-direction:column; align-items:center; gap:10px; min-width:90px;">
            <div style="font-size:22pt; font-weight:700; color:#0000CC; font-family:'Comic Sans MS',cursive;">
                <?php echo htmlspecialchars($q['nums'][$i]['display']); ?>
            </div>
            <input type="text" name="answer<?php echo $i; ?>"
                   class="frac-input" maxlength="1" autocomplete="off"
                   style="width:70px; height:50px; font-size:24px;">
        </div>
    <?php endfor; ?>
</div>

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
            <font face="Verdana" style="font-size:10pt;" color="#000080">Select difficulty level for next question:</font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo $l; ?></b>
                    </font></font>
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