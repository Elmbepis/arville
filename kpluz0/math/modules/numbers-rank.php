<?php
// math/modules/numbers-rank.php
//
// MULTI-INPUT FREE-TEXT module — QEngine not used.
// Student assigns ranks (1=highest, 2=middle, 3=lowest) to 3 numbers.
// Uses container.php + scorer.php only.
//
// THEME — test41-* has 138/547/117 sides, too wide &#8594; paper-69-*.
//
// LEVEL — Hard = legacy Medium. Numbers grow with grade.
//   3 numbers, all distinct.
//
// SCORING — user's 3 ranks combined as "r1|r2|r3" (e.g. "231"),
// compared to the correct rank string.
//
// FEEDBACK — shows:
//   1. Student's raw rank entries (e.g. "2, 3, 1")
//   2. Student's derived arrangement (e.g. "80, 50, 20") —
//      maps each rank they gave to the number they gave it to, then
//      orders 1&#8594;2&#8594;3 &#8594; lets them see what they actually answered
//   3. Correct answer (highest&#8594;lowest)
//
// VALIDATION — ranks must be unique values in {1, 2, 3}.
// Legacy only recognized the 6 permutations of "123", so duplicates
// (e.g. "1, 1, 3") are treated as invalid input.

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

$moduleTitle = 'Ranking Numbers';
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

// Range table: [min, max] per grade, per level. Hard = legacy Medium.
$ranges = [
    0 => ['Easy' => [1, 10],    'Hard' => [2, 50]],
    1 => ['Easy' => [19, 99],   'Hard' => [101, 999]],
];
$gradeKey = min(1, max(0, $grd));
[$nMin, $nMax] = $ranges[$gradeKey][$lvl];

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    // Collect 3 rank inputs; validate range AND uniqueness
    $userParts  = [];
    $seenRanks  = [];
    $validInput = true;
    for ($i = 1; $i <= 3; $i++) {
        $raw = trim((string)($_POST['answer' . $i] ?? ''));
        $v   = (int)$raw;
        if ($v < 1 || $v > 3)                $validInput = false;
        if (in_array($v, $seenRanks, true))  $validInput = false; // duplicate
        $seenRanks[] = $v;
        $userParts[] = $v;
    }
    $userCombined    = implode('|', $userParts);
    $correctCombined = $cur['correctRanks']; // e.g. "231"

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userCombined, $correctCombined, $cur['lvl']);

    // If invalid input, force score false — cannot compare garbage
    if (!$validInput) $correct = false;

    // Derive student's arrangement from their ranks (only if valid)
    $studentOrdered = [];
    if ($validInput) {
        $byRank = [];
        foreach ($cur['nums'] as $i => $n) {
            $byRank[$userParts[$i]] = $n;
        }
        ksort($byRank); // 1, 2, 3
        $studentOrdered = array_values($byRank);
    }

    $result = [
        'correct'      => $correct,
        'validInput'   => $validInput,
        'nums'         => $cur['nums'],
        'correctRanks' => explode('|', $cur['correctRanks']),
        'sortedStr'    => $cur['sortedStr'], // "highest, middle, lowest"
        'userRanks'    => $userParts,
        'studentOrdered' => $studentOrdered, // [rank1num, rank2num, rank3num]
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Generate 3 distinct numbers
    $nums = [];
    $tries = 0;
    while (count($nums) < 3 && $tries < 100) {
        $n = rand($nMin, $nMax);
        if (!in_array($n, $nums, true)) $nums[] = $n;
        $tries++;
    }
    while (count($nums) < 3) $nums[] = rand($nMin, $nMax);

    // Compute rank of each number: 1 = highest, 3 = lowest
    $sorted = $nums;
    rsort($sorted);
    $ranks = [];
    foreach ($nums as $n) {
        $ranks[] = (string)(array_search($n, $sorted) + 1); // 1-indexed
    }
    $correctRanks = implode('|', $ranks);

    // Display string for feedback
    $sortedStr = implode(', ', $sorted);

    $_SESSION[$sessionKey]['current'] = [
        'nums'         => $nums,
        'correctRanks' => $correctRanks,
        'sortedStr'    => $sortedStr,
        'lvl'          => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render 3 numbers in display boxes above 3 rank input boxes below each.
 */
function renderRankTable($nums, $filled = []) {
    $maxDigits = 1;
    foreach ($nums as $n) {
        $maxDigits = max($maxDigits, strlen((string)$n));
    }
    $fontPt = 28;
    if ($maxDigits >= 4) $fontPt = 24;

    echo '<div style="display:flex; justify-content:center; gap:20px;'
       . ' flex-wrap:wrap; margin:20px 0;">';
    for ($i = 0; $i < 3; $i++) {
        echo '<div style="display:flex; flex-direction:column; gap:8px;'
           . ' align-items:center;">';
        // Number box
        echo '<div style="min-width:120px; min-height:90px; display:inline-flex;'
           . ' align-items:center; justify-content:center;'
           . ' background:#f8f8ff; border:3px solid #b0b0d8;'
           . ' border-radius:16px; padding:10px 15px; box-sizing:border-box;'
           . ' font-family:\'Comic Sans MS\',sans-serif;'
           . ' font-size:' . $fontPt . 'pt; font-weight:700; color:#CC0066;">'
           . htmlspecialchars((string)$nums[$i])
           . '</div>';
        // Rank input below
        $val = htmlspecialchars((string)($filled[$i] ?? ''));
        echo '<input type="text" name="answer' . ($i + 1) . '" maxlength="1"'
           . ' style="width:90px; height:60px; text-align:center;'
           . ' font-family:\'Comic Sans MS\',sans-serif; font-size:24px;'
           . ' font-weight:700; color:#0000CC; background:#fff;'
           . ' border:3px solid #b0b0d8; border-radius:12px; box-sizing:border-box;"'
           . ' value="' . $val . '" autocomplete="off"'
           . ($i === 0 ? ' autofocus' : '') . '>';
        echo '</div>';
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
        <?php if ($result['validInput']): ?>
            <p style="font-size:14pt; color:#666;">
                Your ranks: <strong><?php echo implode(', ', $result['userRanks']); ?></strong>
            </p>
            <?php if (!empty($result['studentOrdered'])): ?>
                <p style="font-size:14pt; color:#666;">
                    Your arrangement (highest to lowest):
                    <strong style="color:#0000CC;">
                        <?php echo htmlspecialchars(implode(', ', $result['studentOrdered'])); ?>
                    </strong>
                </p>
            <?php endif; ?>
        <?php else: ?>
            <p style="font-size:14pt; color:#CC6600; font-weight:700;">
                &#9888; Oops! At least one of your inputs was invalid (use 1, 2, or 3 — each exactly once).
            </p>
            <p style="font-size:12pt; color:#666;">
                Your entries: <strong><?php echo implode(', ', $result['userRanks']); ?></strong>
            </p>
        <?php endif; ?>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <p style="font-size:15pt; font-weight:700; color:#800080; margin-top:15px;">
            The correct arrangement (highest to lowest):
        </p>
        <p style="font-size:20pt; font-weight:700; color:#0000CC;">
            <?php echo htmlspecialchars($result['sortedStr']); ?>
        </p>
    <?php else: ?>
        <br>
        <p style="font-size:15pt; font-weight:700; color:#0000CC;">
            Rank the following numbers.
        </p>
        <p style="font-size:13pt; color:#333; margin:8px 0 15px;">
            Put <strong>1</strong> under the <strong>highest</strong>,
            <strong>2</strong> under the <strong>next highest</strong>,
            and <strong>3</strong> under the <strong>lowest</strong>.
        </p>
        <?php renderRankTable($q['nums']); ?>
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