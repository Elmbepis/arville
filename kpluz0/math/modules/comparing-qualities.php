<?php
// math/modules/comparing-qualities.php
//
// COMPUTED-ANSWER / IMAGE-CHOICE module. Uses container.php + scorer.php.
//
// IMAGE VALIDATION — before finalizing a question, checks that the
// required image files exist on disk. If any are missing, retries with a
// fresh random selection (up to 30 attempts). Falls back to a friendly
// error message if no valid combination can be found (rare — only when
// many files are missing).
//
// Legacy fixes: adjective group 5 (thin/fat) was unreachable; fixed so
// all 5 groups (1,2,3,5,7) are used.

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

$moduleTitle = 'Learning to Compare Qualities';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$theme = [
    'top_banner'    => $base . '/math/modules/images/bg01-top.jpg',
    'title_bg'      => $base . '/math/modules/images/bg01-top2.jpg',
    'left_side'     => $base . '/math/modules/images/bg01-left.jpg',
    'right_side'    => $base . '/math/modules/images/bg01-right.jpg',
    'content_bg'    => $base . '/math/modules/images/bg01-content.jpg',
    'bottom_banner' => $base . '/math/modules/images/bg01-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];

// URL path used in <img src>; filesystem path used for existence checks.
$imgDir   = $base . '/math/images/objects/comparing';
$imgDirFs = __DIR__ . '/../../math/images/objects/comparing';
$arrowImg = $imgDir . '/arrow.jpg';

$adjGroups = [
    1 => ['Easy' => ['smaller', 'bigger'],   'Hard' => ['smallest', 'medium', 'biggest']],
    2 => ['Easy' => ['shorter', 'taller'],   'Hard' => ['shortest', 'medium', 'tallest']],
    3 => ['Easy' => ['lighter', 'heavier'],  'Hard' => ['lightest', 'medium', 'heaviest']],
    5 => ['Easy' => ['thinner', 'fatter'],   'Hard' => ['thinnest', 'medium', 'fattest']],
    7 => ['Easy' => ['shorter', 'longer'],   'Hard' => ['shortest', 'medium', 'longest']],
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
    $correct = $scorer->processAnswer($selected, (string)$cur['answer'], $cur['lvl']);

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
        $adjs = array_rand($adjGroups);
        $lim  = ($adjs == 7) ? 12 : 15;

        if ($lvl === 'Easy') {
            $tierPool = [1, 2, 3];
            shuffle($tierPool);
            $tiers = [$tierPool[0], $tierPool[1]];
        } else {
            $tiers = [1, 2, 3];
        }

        // Validate that at least one image exists for each needed tier
        $validNums = [];
        $allValid = true;
        foreach ($tiers as $tier) {
            $offset = ($tier - 1) * 30;
            $nums = [];
            for ($n = 10; $n <= $lim; $n++) {
                $num = $offset + $n;
                if (file_exists($imgDirFs . '/' . $adjs . '/' . $num . '.jpg')) {
                    $nums[] = $num;
                }
            }
            if (empty($nums)) { $allValid = false; break; }
            $validNums[$tier] = $nums;
        }
        if (!$allValid) continue;

        // Pick a random valid image per tier
        $numsByTier = [];
        foreach ($tiers as $tier) {
            $numsByTier[$tier] = $validNums[$tier][array_rand($validNums[$tier])];
        }

        $chosen = [
            'adjs'       => $adjs,
            'tiers'      => $tiers,
            'numsByTier' => $numsByTier,
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
    $adjs       = $chosen['adjs'];
    $tiers      = $chosen['tiers'];
    $numsByTier = $chosen['numsByTier'];

    if ($lvl === 'Easy') {
        // 2 distinct tiers, answerPos random
        $answerPos  = rand(1, 2);
        $answerTier = $tiers[$answerPos - 1];
        $otherTier  = ($answerPos == 1) ? $tiers[1] : $tiers[0];
        $easyAdjs   = $adjGroups[$adjs]['Easy'];
        $targetAdj  = ($answerTier < $otherTier) ? $easyAdjs[0] : $easyAdjs[1];
    } else {
        // 3 tiers, shuffle display order, weighted answer position (2/5, 1/5, 2/5)
        shuffle($tiers);
        $roll = rand(1, 5);
        if ($roll <= 2)      $answerPos = 1;
        elseif ($roll == 3)  $answerPos = 2;
        else                 $answerPos = 3;

        $answerTier = $tiers[$answerPos - 1];
        $hardAdjs   = $adjGroups[$adjs]['Hard'];
        $targetAdj  = $hardAdjs[$answerTier - 1];
    }

    // Build items — each position shows its assigned tier's image
    $items = [];
    foreach ($tiers as $pos => $tier) {
        $num = $numsByTier[$tier];
        $items[] = [
            'value' => (string)($pos + 1),
            'image' => $imgDir . '/' . $adjs . '/' . $num . '.jpg',
            'alt'   => 'Option ' . ($pos + 1),
        ];
    }

    $_SESSION[$sessionKey]['current'] = [
        'answer' => (string)$answerPos,
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
            Here are the choices again, with an arrow<br>
            pointing to the <strong><?php echo htmlspecialchars($result['adj']); ?></strong> one.
        </p>
        <br>
        <?php render_image_feedback($result['items'], $arrowImg, $result['answer']); ?>
    <?php else: ?>
        <br><br>
        <?php render_image_choices($q['items']); ?>
        <br>
        <p style="font-size:18pt; font-weight:700; color:#800080;">
            <?php if ($lvl === 'Easy'): ?>
                Which one is <?php echo htmlspecialchars($q['adj']); ?>?
            <?php else: ?>
                Which is the <?php echo htmlspecialchars($q['adj']); ?> one?
            <?php endif; ?>
        </p>
        <p style="font-size:14pt; color:#444;">Click on your answer.</p>
    <?php endif; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br><br>
        <p align="center"><input type="submit" name="Submit2" value="New Question"></p><br>
        <div align="center">
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