<?php
// math/modules/tens-plus-ones.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used.
// Answer = imgcount1 * 10 + imgcount2. Uses container.php + scorer.php only.
//
// SINGLE-LEVEL module. The legacy had Easy/Medium/Hard radios, but the
// generation code IGNORED $_SESSION['level'] — the actual difficulty was
// driven by $_SESSION['score'] and grade. The radios only controlled
// which DB column got the +1 write. Modern equivalent: single level; the
// adaptive tier is driven by a per-module progress counter in session.
// (If per-column DB routing for returning "Hard" students matters,
// flip $levels to ['Easy','Hard'] and $lvl to $engine->getLevel() — but
// generation is identical in both columns regardless.)
//
// Theme test25-* &#8594; paper-69-* (modern 800px container geometry).
//
// Adaptive tiers (tier &#8594; range for imgcount1 / imgcount2):
//   Tier 0: 1 = 0,   2 = 2..9           (single digits only)
//   Tier 1: 1 = 0..1, 2 = 2..9           (up to 19)
//   Tier 2: 1 = 1..2, 2 = 0..9           (up to 29)
//   Tier 3: 1 = 1..4, 2 = 0..9           (up to 49)
//   Tier 4: 1 = 2..6, 2 = 0..9           (up to 69)
//   Tier 5: 1 = 3..8, 2 = 0..9           (up to 89)
//   Tier 6: 1 = 4..9, 2 = 0..9 or 0..6   (up to 96)
//
// Progress &#8594; tier mapping matches legacy cascade:
//   grd=0 : 0-1&#8594;0, 2-3&#8594;1, 4-6&#8594;2, 7-8&#8594;3, 9-11&#8594;4, 12-14&#8594;5, 15+&#8594;6
//   grd>0 : 0-2&#8594;3, 3-4&#8594;4, 5-6&#8594;5, 7+&#8594;6
//
// Progress persists across visits in $_SESSION[$sessionKey]['progress'].
// Not auto-reset — if a teacher wants a student to restart at tier 0,
// they can close the browser (session ends) or add ?reset=1 handling.
//
// Image assets: math/images/objects/sticks.jpg (bundle), stick.jpg (single).

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

$moduleTitle = 'Tens Plus Ones';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy'];  // single-level — see header comment
$lvl         = 'Easy';
$grd         = (int)($_SESSION['grade'] ?? 0);

// Theme — paper-69 series
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

$bundleImg = $base . '/math/images/objects/sticks.jpg';
$singleImg = $base . '/math/images/objects/stick.jpg';

/** Map progress &#8594; tier using legacy cascade, grade-conditioned. */
function progressToTier($progress, $grd) {
    if ($grd > 0) {
        if ($progress >= 7) return 6;
        if ($progress >= 5) return 5;
        if ($progress >= 3) return 4;
        return 3;
    }
    if ($progress >= 15) return 6;
    if ($progress >= 12) return 5;
    if ($progress >= 9)  return 4;
    if ($progress >= 7)  return 3;
    if ($progress >= 4)  return 2;
    if ($progress >= 2)  return 1;
    return 0;
}

/** Pick (imgcount1, imgcount2) from tier ranges; avoid last 2 imgcount2. */
function pickTierCounts($tier, $last2) {
    switch ($tier) {
        case 0: $c1 = 0;       $c2lo = 2; $c2hi = 9; break;
        case 1: $c1 = rand(0,1);$c2lo = 2; $c2hi = 9; break;
        case 2: $c1 = rand(1,2);$c2lo = 0; $c2hi = 9; break;
        case 3: $c1 = rand(1,4);$c2lo = 0; $c2hi = 9; break;
        case 4: $c1 = rand(2,6);$c2lo = 0; $c2hi = 9; break;
        case 5: $c1 = rand(3,8);$c2lo = 0; $c2hi = 9; break;
        default: $c1 = rand(4,9);$c2lo = 0; $c2hi = 9; break;
    }
    // Last tier: if c1 == 9, cap c2 at 6 (matches legacy)
    if ($tier == 6 && $c1 == 9) $c2hi = 6;

    // Retry to avoid last 2 imgcount2 (only meaningful when pool is small)
    $c2 = rand($c2lo, $c2hi);
    $tries = 0;
    while (in_array($c2, $last2, true) && $tries < 20) {
        $c2 = rand($c2lo, $c2hi);
        $tries++;
    }
    return [$c1, $c2];
}

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userInput, (string)$cur['ans'], $lvl);

    // Progress advances on correct only
    if ($correct) {
        $_SESSION[$sessionKey]['progress'] = (int)($_SESSION[$sessionKey]['progress'] ?? 0) + 1;
    }

    $result = [
        'correct'  => $correct,
        'answer'   => $userInput,
        'c1'       => $cur['c1'],
        'c2'       => $cur['c2'],
        'ans'      => $cur['ans'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $progress = (int)($_SESSION[$sessionKey]['progress'] ?? 0);
    $tier     = progressToTier($progress, $grd);

    // Repeat prevention uses last 2 imgcount2 values
    $last2 = $_SESSION[$sessionKey]['last2'] ?? [];
    [$c1, $c2] = pickTierCounts($tier, $last2);

    $ans = $c1 * 10 + $c2;

    // Update last2 (keep at most 2)
    $last2[] = $c2;
    if (count($last2) > 2) $last2 = array_slice($last2, -2);
    $_SESSION[$sessionKey]['last2'] = $last2;

    $_SESSION[$sessionKey]['current'] = [
        'c1'  => $c1,
        'c2'  => $c2,
        'ans' => $ans,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/** Render a horizontal row of icons (bundles + singles). */
function renderSticksRow($bundleImg, $singleImg, $c1, $c2) {
    $out = '';
    for ($i = 0; $i < $c1; $i++) {
        $out .= '<img src="' . htmlspecialchars($bundleImg) . '" alt="bundle" style="margin:2px;">';
    }
    if ($c1 > 0 && $c2 > 0) $out .= '<span style="display:inline-block; width:20px;"></span>';
    for ($i = 0; $i < $c2; $i++) {
        $out .= '<img src="' . htmlspecialchars($singleImg) . '" alt="stick" style="margin:2px;">';
    }
    return '<div style="text-align:center; margin:20px 0; line-height:1.1;">' . $out . '</div>';
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <?php if ($result !== null): ?>
        <br><br>
        <p style="font-size:15pt; color:#800080;">
            Your answer is <strong><?php echo htmlspecialchars($result['answer']); ?></strong>.
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <p style="font-size:16pt; font-weight:700; color:#800080;">
            There are <strong><?php echo $result['ans']; ?></strong> sticks.
        </p>
        <?php echo renderSticksRow($bundleImg, $singleImg, $result['c1'], $result['c2']); ?>
    <?php else: ?>
        <br><br>
        <?php echo renderSticksRow($bundleImg, $singleImg, $q['c1'], $q['c2']); ?>
        <br>
        <p style="font-size:16pt; font-weight:600; color:#800080;">
            <?php if ($q['c1'] > 0): ?>
                If each bundle has <strong style="color:#CC0066;">10</strong> sticks,<br>
                how many sticks are there?
            <?php else: ?>
                How many sticks are there?
            <?php endif; ?>
        </p>
        <p style="font-size:16pt; font-weight:600; color:#CC0066; margin-top:15px;">
            Answer:
            <input type="text" name="answer" class="answer-input"
                   style="width:80px; height:38px; font-size:24px;" maxlength="2"
                   autocomplete="off" autofocus>
        </p>
    <?php endif; ?>

    <?php if ($result === null): ?>
        <br>
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width: 20px;"></span>
    <?php endif; ?>
    <input type="submit" name="Submit2" value="New Question">
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();