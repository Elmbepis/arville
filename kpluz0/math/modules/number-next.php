<?php
// math/modules/number-next.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used.
// Uses container.php + scorer.php only.
//
// THEME — test26-* has 138px left / 117px right, too wide for the modern
// container. Falls back to paper-69-* frame. Score box uses score-*-1.
//
// PATTERN — 4 boxes show: n, n+fac, n+2*fac, ? — answer is n+3*fac.
// $fac can be POSITIVE (ascending) or NEGATIVE (descending).
//
// TREND CONSTRAINT — no more than 3 consecutive same-direction questions.
// Session tracks the last 3 trends; when all are 'up' the next question is
// forced 'down', and vice versa. Otherwise the direction is 50/50 random.
// This prevents the "why does it always go down?" feeling caused by chance
// streaks without removing randomness entirely.
//
// GRADE PROGRESSION — grade-keyed table. Hard &#8776; next grade's Easy.
// Grade 7+ clamps to grade 6.
//
// Repeat prevention — last 2 starting numbers tracked per session to
// avoid immediate repeats within the same level/grade.

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

$moduleTitle = "What's the Next Number?";
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

// Config: [facMin, facMax, nMin, nMax]. Progression: Hard &#8776; next grade Easy.
// fac (step) and n (starting number) both grow with grade.
$configs = [
    0 => ['Easy' => [1, 1,   5, 20],    'Hard' => [1, 2,   11, 50]],
    1 => ['Easy' => [1, 2,   15, 75],   'Hard' => [2, 3,   50, 150]],
    2 => ['Easy' => [2, 3,   50, 150],  'Hard' => [3, 5,   100, 300]],
    3 => ['Easy' => [3, 5,   100, 300], 'Hard' => [5, 8,   200, 500]],
    4 => ['Easy' => [5, 8,   200, 500], 'Hard' => [8, 12,  300, 800]],
    5 => ['Easy' => [8, 12,  300, 800], 'Hard' => [10, 15, 500, 1500]],
    6 => ['Easy' => [10, 15, 500, 1500],'Hard' => [15, 25, 1000, 3000]],
];
$gradeKey = min(6, max(0, $grd));
[$facMin, $facMax, $nMin, $nMax] = $configs[$gradeKey][$lvl];

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
        'ans'     => $cur['ans'],
        'nums'    => $cur['nums'],   // [n, n+fac, n+2*fac] (4th is ans)
        'fac'     => $cur['fac'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // &#9472;&#9472; 1. Decide direction — enforce no more than 3 consecutive same &#9472;&#9472;
    $trends = $_SESSION[$sessionKey]['trends'] ?? [];
    $last3  = array_slice($trends, -3);
    $allUp   = count($last3) === 3 && !array_diff($last3, ['up']);
    $allDown = count($last3) === 3 && !array_diff($last3, ['down']);

    if ($allUp) {
        $goUp = false;             // forced down
    } elseif ($allDown) {
        $goUp = true;              // forced up
    } else {
        $goUp = (rand(1, 2) === 1); // random 50/50
    }

    // &#9472;&#9472; 2. Safety: if forced down but config can't stay positive at nMax,
    //       override to up (never fires with current configs, but guards
    //       against future config edits producing an infinite loop). &#9472;&#9472;
    if (!$goUp && $nMax + 3 * (-$facMax) <= 0) {
        $goUp = true;
    }

    // &#9472;&#9472; 3. Build the step &#9472;&#9472;
    $fac = rand($facMin, $facMax);
    if (!$goUp) $fac = -$fac;

    // &#9472;&#9472; 4. Repeat prevention — avoid last 2 starting numbers &#9472;&#9472;
    $last2 = $_SESSION[$sessionKey]['last2'] ?? [];
    $tries = 0;
    do {
        $n = rand($nMin, $nMax);
        // For descending, ensure the last term stays positive
        if ($fac < 0 && $n + 3 * $fac <= 0) {
            $n = rand($nMin + 3 * abs($fac), $nMax);
        }
        $tries++;
    } while (in_array($n, $last2, true) && $tries < 20);

    $last2[] = $n;
    if (count($last2) > 2) $last2 = array_slice($last2, -2);
    $_SESSION[$sessionKey]['last2'] = $last2;

    // &#9472;&#9472; 5. Record trend (kept to last 3) &#9472;&#9472;
    $trends[] = $goUp ? 'up' : 'down';
    if (count($trends) > 3) $trends = array_slice($trends, -3);
    $_SESSION[$sessionKey]['trends'] = $trends;

    // &#9472;&#9472; 6. Build the sequence &#9472;&#9472;
    $nums = [$n, $n + $fac, $n + 2 * $fac];
    $ans  = $n + 3 * $fac;

    $_SESSION[$sessionKey]['current'] = [
        'nums' => $nums,
        'fac'  => $fac,
        'ans'  => $ans,
        'lvl'  => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render a row of 4 number boxes. Last one is "?" (question) or the
 * answer (result state), in accent color.
 */
function renderSequenceRow($nums, $ans, $showAnswer = false) {
    $display = array_merge($nums, [$showAnswer ? $ans : '?']);

    $maxDigits = 1;
    foreach ($display as $v) {
        if ($v !== '?') $maxDigits = max($maxDigits, strlen((string)$v));
    }
    $fontPt = 42;
    if ($maxDigits >= 4) $fontPt = 34;
    if ($maxDigits >= 5) $fontPt = 28;
    if ($maxDigits >= 6) $fontPt = 24;

    echo '<div style="display:flex; justify-content:center; gap:15px;'
       . ' flex-wrap:wrap; margin:20px 0;">';
    foreach ($display as $i => $v) {
        $isMissing = ($v === '?');
        $bg     = $isMissing ? '#fff3f8' : '#f8f8ff';
        $border = $isMissing ? '#CC0066' : '#b0b0d8';
        $color  = $isMissing ? '#CC0066' : '#800080';
        echo '<div style="min-width:110px; min-height:120px; display:inline-flex;'
           . ' align-items:center; justify-content:center;'
           . ' background:' . $bg . '; border:3px solid ' . $border . ';'
           . ' border-radius:16px; padding:15px; box-sizing:border-box;'
           . ' font-family:\'Comic Sans MS\',sans-serif;'
           . ' font-size:' . $fontPt . 'pt; font-weight:700; color:' . $color . ';">'
           . htmlspecialchars((string)$v)
           . '</div>';
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
        <p style="font-size:15pt; font-weight:700; color:#800080;">
            The pattern is
            <strong><?php echo ($result['fac'] > 0 ? 'adding ' : 'subtracting ') . abs($result['fac']); ?></strong>
            each time.
        </p>
        <?php renderSequenceRow($result['nums'], $result['ans'], true); ?>
    <?php else: ?>
        <br>
        <?php renderSequenceRow($q['nums'], $q['ans'], false); ?>

        <p style="font-size:15pt; font-weight:700; color:#0000AA; margin:20px 0;">
            Answer:
            <input type="text" name="answer" class="answer-input"
                   style="width:100px; height:44px; font-size:28px;" maxlength="7"
                   autocomplete="off" autofocus>
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