<?php
// math/modules/comparing-quantities.php
//
// COMPUTED-ANSWER / IMAGE-CHOICE module. Uses container.php + scorer.php.
// SINGLE-LEVEL module (Easy only).
//
// IMAGE VALIDATION — before finalizing a question, checks that the
// required image files exist on disk. Retries with a fresh selection
// (up to 30 attempts). Falls back to a friendly error if no valid
// combination exists.
//
// Group 8 (empty/full): both images independently random within their tier.
// Group 9 (less/more):  both images share the same base number, different tier.

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

$moduleTitle = 'Learning to Compare Quantities';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy'; // single-level module

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

// URL path for <img src>; filesystem path for file_exists checks.
$imgDir   = $base . '/math/images/objects/comparing';
$imgDirFs = __DIR__ . '/../../math/images/objects/comparing';
$arrowImg = $imgDir . '/arrow.jpg';

$adjGroups = [
    8 => ['empty', 'full'],
    9 => ['less', 'more'],
];

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $selected = (string)$_GET['ansclick'];

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($selected, (string)$cur['answer'], $lvl);

    $result = [
        'correct'  => $correct,
        'selected' => $selected,
        'answer'   => $cur['answer'],
        'adj'      => $cur['adj'],
        'items'    => $cur['items'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION — with image existence validation
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $maxAttempts = 30;
    $chosen = null;

    for ($attempt = 0; $attempt < $maxAttempts && $chosen === null; $attempt++) {
        $adjs = array_rand($adjGroups); // 8 or 9
        $lim  = ($adjs == 8) ? 20 : 21;

        // Scan valid base numbers per tier
        $validT1 = [];  // bases for tier 1 (10..lim)
        $validT2 = [];  // bases for tier 2 (10..lim)
        for ($n = 10; $n <= $lim; $n++) {
            if (file_exists($imgDirFs . '/' . $adjs . '/' . $n . '.jpg')) {
                $validT1[] = $n;
            }
            if (file_exists($imgDirFs . '/' . $adjs . '/' . (30 + $n) . '.jpg')) {
                $validT2[] = $n;
            }
        }
        if (empty($validT1) || empty($validT2)) continue;

        if ($adjs == 8) {
            // Independent bases per tier
            $base1 = $validT1[array_rand($validT1)];
            $base2 = $validT2[array_rand($validT2)];
        } else {
            // Same base — both tiers must have that base
            $common = array_values(array_intersect($validT1, $validT2));
            if (empty($common)) continue;
            $base1 = $base2 = $common[array_rand($common)];
        }

        $chosen = [
            'adjs'  => $adjs,
            'base1' => $base1,
            'base2' => $base2,
        ];
    }

    if ($chosen === null) {
        // No valid image combination found — show error page
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<div style="padding: 40px 20px; text-align: center;">';
        echo '<p style="font-size: 15pt; color: #CC0000; font-weight: 700;">This exercise is temporarily unavailable.</p>';
        echo '<p style="font-size: 12pt; color: #666; margin-top: 15px;">The image files for this module are missing from the server. Please contact your teacher.</p>';
        echo '</div>';
        render_score_box();
        if ($scorer !== null) $scorer->outputConsoleDebug();
        $conn->close();
        render_footer();
        exit;
    }

    // ========================================================
    // Build the question from $chosen
    // ========================================================
    $adjs = $chosen['adjs'];

    // Rank 1 = tier 1 (empty/less), rank 2 = tier 2 (full/more)
    $rank1 = rand(1, 2);
    $rank2 = 3 - $rank1;

    // Build per-tier image paths
    $imgTier1 = $imgDir . '/' . $adjs . '/' . $chosen['base1'] . '.jpg';
    $imgTier2 = $imgDir . '/' . $adjs . '/' . (30 + $chosen['base2']) . '.jpg';

    // Assign images to positions by their assigned rank
    $items = [
        [
            'value' => (string)$rank1,
            'image' => ($rank1 == 1) ? $imgTier1 : $imgTier2,
            'alt'   => 'Option 1',
        ],
        [
            'value' => (string)$rank2,
            'image' => ($rank2 == 1) ? $imgTier1 : $imgTier2,
            'alt'   => 'Option 2',
        ],
    ];

    $adjIndex  = rand(1, 2);
    $targetAdj = $adjGroups[$adjs][$adjIndex - 1];

    $_SESSION[$sessionKey]['current'] = [
        'answer' => (string)$adjIndex,
        'adj'    => $targetAdj,
        'items'  => $items,
        'lvl'    => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">

    <?php if ($result !== null): ?>
        <br><br>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <p style="font-size:14pt; color:#444;">
            Here are the pictures again, with an arrow<br>
            pointing to the picture that shows '<strong><?php echo htmlspecialchars($result['adj']); ?></strong>'.
        </p>
        <br>
        <?php render_image_feedback($result['items'], $arrowImg, $result['answer']); ?>
    <?php else: ?>
        <br><br>
        <?php render_image_choices($q['items']); ?>
        <br>
        <p style="font-size:18pt; font-weight:700; color:#800080;">
            Which picture shows '<?php echo htmlspecialchars($q['adj']); ?>'?
        </p>
        <p style="font-size:14pt; color:#444;">Click on your answer.</p>
    <?php endif; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br><br>
        <p align="center"><input type="submit" name="Submit2" value="New Question"></p><br>
    </form>
    <br>
    <?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();