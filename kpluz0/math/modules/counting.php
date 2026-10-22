<?php
// math/modules/counting.php
//
// Converts legacy counting.php to the modern layout/scorer flow.
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used. QEngine generates
// choice lists; this module takes a typed number. Same category as
// comparing-qualities.php. Uses container.php + scorer.php only.
//
// Legacy had TWO modes in one file:
//   - counting.php              &#8594; Counting to 100 (legacy $tnum = "*02")
//   - counting.php?level=upto20 &#8594; Counting to 20  (legacy $tnum = "*01")
// Modern module_identifier = basename(__FILE__) = counting.php, so BOTH modes
// share one score record. If your menu has separate entries, split into
// counting-20.php / counting-100.php and re-run the DB row setup.
//
// Level merge: legacy had Easy/Medium/Hard. Modern Easy = legacy Easy,
// Hard = legacy Hard. Legacy Medium (36-64 / 3-10) is DROPPED.
//
// Theme: paper-69-* series — matches the modern 800px container geometry
// (same as visual-patterns.php / shapes.php). Legacy test38-* theme was
// sized for an older table layout and rendered at the wrong width here.
//
// Image display rules (preserved from legacy):
//   num <= 20  : 1{obj}.jpg, 5 per row  (small icons)
//   21-64      : 2{obj}.jpg, 8 per row
//   65-72      : 2{obj}.jpg, 9 per row
//   num > 72   : 3{obj}.jpg, 10 per row (large icons)
//
// Score comparison: legacy used numeric subtraction ($ans - $_POST['answer']).
// Modern canonicalises input to integer string first, then passes to Scorer
// (so "07" &#8594; "7", "7abc" &#8594; "7", "" &#8594; "0").

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

$moduleId   = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels     = ['Easy', 'Hard'];

// Preserve legacy ?level=upto20 URL parameter (used by menu link for
// "Counting to 20"). Any other ?level= value is ignored (falls to 100 mode).
$upto20 = (isset($_GET['level']) && $_GET['level'] === 'upto20');
$moduleTitle = $upto20 ? 'Counting to 20' : 'Counting to 100';

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

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

$objectNames = [
    1=>'balls', 2=>'trucks', 3=>'apples', 4=>'dogs', 5=>'cars', 6=>'dolls',
    7=>'robots', 8=>'bikes', 9=>'monkeys', 10=>'shoes', 11=>'monsters', 12=>'birds'
];

// Number range by level (Medium dropped — see header comment)
if ($upto20) {
    $rangeMin = ($lvl === 'Easy') ? 1 : 7;
    $rangeMax = ($lvl === 'Easy') ? 5 : 20;
} else {
    $rangeMin = ($lvl === 'Easy') ? 10 : 65;
    $rangeMax = ($lvl === 'Easy') ? 35 : 100;
}

$formAction = $_SERVER['PHP_SELF'] . ($upto20 ? '?level=upto20' : '');

// ============================================================
// HANDLE ANSWER (Submit1)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    // Canonicalise user input: "07" &#8594; "7", " 7abc" &#8594; "7", "" &#8594; "0"
    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userInput, (string)$cur['num'], $cur['lvl']);

    $result = [
        'correct'  => $correct,
        'answer'   => $userInput,
        'num'      => $cur['num'],
        'showcase' => $cur['showcase'],
        'k'        => $cur['k'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION (fresh load OR Submit2)
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $num = rand($rangeMin, $rangeMax);

    // Image size prefix + per-row wrap (matches legacy)
    if ($num <= 20)     { $prefix = '1'; $k = 5; }
    elseif ($num <= 64) { $prefix = '2'; $k = 8; }
    elseif ($num <= 72) { $prefix = '2'; $k = 9; }
    else                { $prefix = '3'; $k = 10; }

    // Build showcase — each item is a random object of the given size prefix
    $showcase = [];
    for ($i = 0; $i < $num; $i++) {
        $objIdx = rand(1, 12);
        $showcase[] = $prefix . $objectNames[$objIdx] . '.jpg';
    }

    $_SESSION[$sessionKey]['current'] = [
        'num'      => $num,
        'showcase' => $showcase,
        'k'        => $k,
        'lvl'      => $lvl,
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
        <p style="font-size:15pt; color:#800080;">
            Your answer is <strong><?php echo htmlspecialchars($result['answer']); ?></strong>.
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <p style="font-size:14pt; color:#800080;">
            <?php if ($result['num'] == 1): ?>
                There is only one thing shown.
            <?php else: ?>
                There are <strong><?php echo $result['num']; ?></strong> things shown.
            <?php endif; ?>
        </p>
        <?php
        $fullPaths = array_map(fn($f) => $base . '/math/images/objects/' . $f, $result['showcase']);
        render_image_grid($fullPaths, $result['k']);
        ?>
    <?php else: ?>
        <br><br>
        <?php
        $fullPaths = array_map(fn($f) => $base . '/math/images/objects/' . $f, $q['showcase']);
        render_image_grid($fullPaths, $q['k']);
        ?>
        <br>
        <p style="font-size:18pt; font-weight:700; color:#800080;">
            How many things are there?
        </p>
    <?php endif; ?>

    <form method="post" action="<?php echo $formAction; ?>">
        <?php if ($result === null): ?>
            <br><br>
            <input type="text" name="answer" class="answer-input" size="3" maxlength="3" autocomplete="off" autofocus>
            <br><br>
            <input type="submit" name="Submit1" value="Submit">
            <span style="display:inline-block; width: 20px;"></span>
        <?php endif; ?>
        <input type="submit" name="Submit2" value="New Question">

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