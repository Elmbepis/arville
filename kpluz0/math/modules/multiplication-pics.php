<?php
// math/modules/multiplication-pics.php
//
// COMPUTED-ANSWER / PICTURE-GRID module — QEngine not used.
// Answer = num1 × num2, but the question is presented as a grid of images:
//   num2 rows × num1 columns of the same object.
// Uses container.php + scorer.php only.
//
// Theme test09b-* &#8594; paper-69-* (modern 800px container geometry).
//
// LEGACY BUG FIXED — grade 2+ was completely broken. Legacy only defined
// ranges for grade 0 and grade 1; grade 2+ left $numlimit1..4 undefined
// (PHP warning + broken questions). Modern adds explicit ranges for
// grades 2 and 3, and clamps grade 4+ to grade 3.
//
// Grade 0 and grade 1 ranges are preserved EXACTLY from legacy.
//
// Level merge: legacy Easy/Medium/Hard &#8594; Easy (Easy) / Hard (Hard).
// Legacy Hard kept (max ~60 images — already pedagogically reasonable
// for a visual format). Medium dropped.
//
// Image size prefix (legacy cascade preserved):
//   num1 < 6 AND num2 < 3   &#8594; prefix '1' (small icons)
//   num1 > 7 OR  num2 > 4   &#8594; prefix '3' (large icons, overrides)
//   else                    &#8594; prefix '2' (medium)
//
// Image assets: math/images/objects/{1,2,3}{balls,trucks,...,birds}.jpg

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

$moduleTitle = 'Multiplication with Pictures';
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

$objects = [
    1=>'balls', 2=>'trucks', 3=>'apples', 4=>'dogs', 5=>'cars', 6=>'dolls',
    7=>'robots', 8=>'bikes', 9=>'monkeys', 10=>'shoes', 11=>'monsters', 12=>'birds'
];

// Ranges: [num1Min, num1Max, num2Min, num2Max]
// Grade 0 and 1 preserve legacy exactly. Grades 2 and 3 are new —
// bounded so num1 × num2 stays <= ~120 images for layout sanity.
$ranges = [
    0 => [
        'Easy' => [1, 5,  1, 3],  // legacy
        'Hard' => [2, 10, 3, 6],  // legacy (Medium 3-8 × 2-5 dropped)
    ],
    1 => [
        'Easy' => [2, 8,  2, 5],  // legacy
        'Hard' => [5, 10, 4, 6],  // legacy (Medium 4-9 × 3-6 dropped)
    ],
    2 => [
        // NEW: legacy grade 2 was broken (undefined). Ranges chosen for
        // gentle progression — max 70 (Easy) / 96 (Hard) images.
        'Easy' => [3, 10, 3, 7],
        'Hard' => [4, 12, 4, 8],
    ],
    3 => [
        // NEW: legacy grade 3 was broken. Max 108 images.
        'Easy' => [4, 12, 4, 8],
        'Hard' => [5, 12, 5, 9],
    ],
];
$gradeKey = min(3, max(0, $grd));
$range    = $ranges[$gradeKey][$lvl];

// ============================================================
// HANDLE ANSWER (Submit1)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userInput, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct'  => $correct,
        'answer'   => $userInput,
        'num1'     => $cur['num1'],
        'num2'     => $cur['num2'],
        'ans'      => $cur['ans'],
        'image'    => $cur['image'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $num1 = rand($range[0], $range[1]);
    $num2 = rand($range[2], $range[3]);
    $ans  = $num1 * $num2;

    // Image size prefix — legacy cascade
    $prefix = '2';
    if ($num1 < 6 && $num2 < 3) $prefix = '1';
    if ($num1 > 7 || $num2 > 4) $prefix = '3';

    $obj   = $objects[rand(1, 12)];
    $image = $base . '/math/images/objects/' . $prefix . $obj . '.jpg';

    $_SESSION[$sessionKey]['current'] = [
        'num1'  => $num1,
        'num2'  => $num2,
        'ans'   => $ans,
        'image' => $image,
        'lvl'   => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render the multiplication grid: num2 rows × num1 columns of same image.
 * Uses container.php's render_image_grid — all cells are the same image,
 * so a flat array_fill works.
 */
function renderMultiplicationGrid($imagePath, $num1, $num2) {
    $fullPaths = array_fill(0, $num1 * $num2, $imagePath);
    render_image_grid($fullPaths, $num1);
}

/**
 * Compact equation card for pics module — the grid is the star; the
 * equation below reinforces the concept. Always inline (small numbers).
 */
function renderPicsEquation($num1, $num2, $ans, $showInput, $correct = null) {
    $cardClass = 'equation-card';
    if ($correct === true)  $cardClass .= ' correct';
    if ($correct === false) $cardClass .= ' wrong';

    $maxlen  = strlen((string)$ans) + 1;
    $inputPx = max(80, (strlen((string)$ans) + 1) * 22 + 20);

    echo '<div class="' . $cardClass . '" style="padding: 15px 30px; margin: 15px auto;">';
    echo '<div class="equation-inline" style="font-size: 24pt; gap: 10px;">';
    echo '<span>' . $num1 . '</span>';
    echo '<span class="op">&times;</span>';
    echo '<span>' . $num2 . '</span>';
    echo '<span class="op">=</span>';
    if ($showInput) {
        echo '<input type="text" name="answer" maxlength="' . $maxlen . '"'
           . ' style="width:' . $inputPx . 'px; height:48px; font-size:22pt;" autocomplete="off" autofocus>';
    } else {
        $ansColor = ($correct === true) ? '#4caf50' : '#e53935';
        echo '<span style="color:' . $ansColor . ';">' . $ans . '</span>';
    }
    echo '</div>';
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
        <?php renderPicsEquation($result['num1'], $result['num2'], $result['ans'], false, $result['correct']); ?>
        <?php renderMultiplicationGrid($result['image'], $result['num1'], $result['num2']); ?>
    <?php else: ?>
        <br>
        <?php renderMultiplicationGrid($q['image'], $q['num1'], $q['num2']); ?>
        <?php renderPicsEquation($q['num1'], $q['num2'], $q['ans'], true); ?>
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