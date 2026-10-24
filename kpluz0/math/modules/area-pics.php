<?php
// math/modules/area-pics.php
// Computed text-choice. Grid of colored squares — student counts them to find
// the area (or one color's region in Hard mode).
//
// Easy = single-color grid; Hard (grade 2+) = two-color grid, student counts one
// color's region. Grade 1 Hard still uses single-color with the smaller grid.
//
// Bypasses QEngine; uses explicit 2x2 choice grid.

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

$moduleTitle = 'Areas of Squares and Rectangles in Pictures';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));
$isGrd1 = ($grdKey === 1);

// ---- Available colors (file-existence gate) ----
$allColors     = ['red', 'yellow', 'green', 'blue', 'violet'];
$availableNorm = [];
$availableHard = [];
foreach ($allColors as $c) {
    if (is_file(__DIR__ . '/../../math/images/shapes/area-pics-' . $c . '.jpg')) {
        $availableNorm[] = $c;
    }
    if (is_file(__DIR__ . '/../../math/images/shapes/area-pics-' . $c . '2.jpg')) {
        $availableHard[] = $c;
    }
}
if (empty($availableNorm)) $availableNorm = $allColors;
if (empty($availableHard)) $availableHard = $allColors;

// ---- HANDLE ANSWER ----
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct'      => $isCorrect,
        'clicked'      => $click,
        'ans'          => $cur['ans'],
        'grid'         => $cur['grid'],
        'cols'         => $cur['cols'],
        'sqht'         => $cur['sqht'],
        'feedbackText' => $cur['feedbackText'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- GENERATE ----
if ($result === null || isset($_POST['Submit2'])) {
    $twoColorMode = ($lvl === 'Hard' && !$isGrd1);

    if (!isset($_SESSION[$sessionKey]['last2'])) $_SESSION[$sessionKey]['last2'] = [];
    $last2 = $_SESSION[$sessionKey]['last2'];

    $safety = 0;
    do {
        // Grid dims
        if ($lvl === 'Easy') {
            if ($isGrd1) {
                $rows = rand(1, 3);
                $cols = ($rows === 1) ? rand(5, 8) : rand(3, 7);
            } else {
                $rows = rand(3, 5);
                $cols = rand(5, 7);
            }
        } else { // Hard
            if ($isGrd1) {
                $rows = rand(4, 6);
                $cols = rand(5, 9);
            } else {
                $rows = rand(7, 10);
                $cols = rand(8, 12);
            }
        }
        $lim  = $rows * $cols;
        $sqht = $twoColorMode ? 30 : 40;

        // Colors
        if ($twoColorMode) {
            $c1 = $availableHard[array_rand($availableHard)];
            do {
                $c2 = $availableHard[array_rand($availableHard)];
            } while ($c2 === $c1);
            $img1 = $base . '/math/images/shapes/area-pics-' . $c1 . '2.jpg';
            $img2 = $base . '/math/images/shapes/area-pics-' . $c2 . '2.jpg';
        } else {
            $c1   = $availableNorm[array_rand($availableNorm)];
            $img1 = $base . '/math/images/shapes/area-pics-' . $c1 . '.jpg';
        }

        $gridCells = [];

        if ($twoColorMode) {
            // Two-color: all cells filled; ans1 = first color, ans2 = second
            $ans1 = rand(5, $lim - 5);
            $ans2 = $lim - $ans1;

            if (rand(1, 2) === 1) {
                $ans  = $ans1;
                $simg = $c1;
            } else {
                $ans  = $ans2;
                $simg = $c2;
            }

            for ($m = 1; $m <= $lim; $m++) {
                $gridCells[] = ($m <= $ans1) ? $img1 : $img2;
            }

            $question     = "How many square units is the $simg part of the area shown?";
            $feedbackText = "The $simg part of the area shown is $ans square units.";
        } else {
            // Single-color: first $ans cells filled
            $ans = $isGrd1 ? $lim : rand($lim - $cols + 1, $lim);

            for ($m = 1; $m <= $lim; $m++) {
                $gridCells[] = ($m <= $ans) ? $img1 : null;
            }

            // Shape naming (matches legacy)
            $shape = 'area';
            if ($ans === $lim) {
                $shape = 'rectangle';
                if ($rows === $cols) $shape = 'square';
            }

            if ($isGrd1) {
                $question     = "The $shape below is made up<br/>of how many small squares?";
                $feedbackText = "The $shape shown is made up of $ans small squares.";
            } else {
                $question     = "How many square units is the $shape shown?";
                $feedbackText = "The $shape shown has $ans square units.";
            }
        }

        $safety++;
    } while (in_array($ans, $last2, true) && $safety < 20);

    $last2[] = $ans;
    if (count($last2) > 2) $last2 = array_slice($last2, -2);
    $_SESSION[$sessionKey]['last2'] = $last2;

    // Distractors: ans ± {1,2,3}, guard &#8805; 1
    $ch     = [$ans];
    $deltas = [1, 2, 3, -1, -2, -3];
    shuffle($deltas);
    $i = 0;
    while (count($ch) < 4 && $i < count($deltas)) {
        $c = $ans + $deltas[$i];
        if ($c >= 1 && !in_array($c, $ch, true)) $ch[] = $c;
        $i++;
    }
    shuffle($ch);

    $_SESSION[$sessionKey]['current'] = [
        'ans'          => $ans,
        'choices'      => $ch,
        'question'     => $question,
        'feedbackText' => $feedbackText,
        'grid'         => $gridCells,
        'cols'         => $cols,
        'sqht'         => $sqht,
        'lvl'          => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ---- RENDER ----
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

$renderGrid = function ($cells, $cols, $sqht) {
    $style = 'display:inline-grid; grid-template-columns:repeat(' . (int)$cols . ', ' . (int)$sqht . 'px); gap:0;';
    echo '<div style="display:inline-block; border:1px solid #cccccc; background:#ffffff; padding:20px;">';
    echo '<div style="' . $style . '">';
    foreach ($cells as $c) {
        if ($c === null) {
            echo '<div style="width:' . (int)$sqht . 'px; height:' . (int)$sqht . 'px;"></div>';
        } else {
            $url = htmlspecialchars($c);
            echo '<div style="width:' . (int)$sqht . 'px; height:' . (int)$sqht . 'px;'
               . ' background: url(\'' . $url . '\') no-repeat center; background-size:cover;"></div>';
        }
    }
    echo '</div>';
    echo '</div>';
};
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; margin-top:20px; text-align:center;">
        You clicked on
        <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php echo htmlspecialchars($result['feedbackText']); ?>
    </p>
    <div style="margin:15px 0;">
        <?php $renderGrid($result['grid'], $result['cols'], $result['sqht']); ?>
    </div>
<?php else: ?>
    <p class="statement" style="font-size:17pt; font-weight:600; color:#800080;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <div style="margin:15px 0;">
        <?php $renderGrid($q_curr['grid'], $q_curr['cols'], $q_curr['sqht']); ?>
    </div>
    <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; max-width:440px; margin:20px auto;">
        <?php foreach ($q_curr['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode((string)$c); ?>"
               style="display:block; background:#f0f0f0; border:2px solid #ccc; border-radius:12px; padding:14px 20px; font-size:1.3rem; font-weight:bold; color:#0000BB; text-decoration:none; text-align:center; box-sizing:border-box;">
                <?php echo htmlspecialchars((string)$c); ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <div style="margin-top:<?php echo $result === null ? '50px' : '20px'; ?>;">
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