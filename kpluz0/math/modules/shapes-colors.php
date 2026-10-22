<?php
// math/modules/shapes-colors.php
//
// COMPUTED-ANSWER / COUNTING module — QEngine not used. Answer is a count of
// items matching a target in a randomly generated 40-50 image grid. Uses
// container.php + scorer.php only.
//
// Theme test32-* &#8594; paper-69-* (modern 800px container geometry).
//
// Level semantics — labels reflect the exercise, not raw "Easy/Hard":
//   Easy  &#8594; "Colors"  (target = one color; count matching that color)
//   Hard  &#8594; "Mixed"   (target = color + shape; count matching both)
// Legacy Medium ("Shapes only") dropped.
//
// Hard mode preserves legacy's restricted ranges:
//   colors drawn from [2..5] (blue/red/yellow/green)
//   shapes drawn from [1..4] (rectangle/square/circle/triangle)
// This concentrates difficulty — if you want full color/shape variety,
// widen the rand() calls in the generate block.
//
// Grid: always 10 per row.
// Image assets: math/images/objects/{color}-{shape}.jpg
//   e.g. brown-rectangle.jpg, blue-circle.jpg

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

$moduleTitle = 'Counting Colors and Shapes';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$levelLabels = ['Easy' => 'Colors', 'Hard' => 'Mixed'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Theme — paper-69 series (matches visual-patterns / shapes / counting)
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

$colors = [1=>'brown', 2=>'blue', 3=>'red', 4=>'yellow', 5=>'green', 6=>'violet', 7=>'orange', 8=>'pink'];
$shapes = [1=>'rectangle', 2=>'square', 3=>'circle', 4=>'triangle', 5=>'oval', 6=>'diamond'];

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    // Canonicalise input
    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userInput, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct'  => $correct,
        'answer'   => $userInput,
        'ans'      => $cur['ans'],
        'total'    => $cur['total'],
        'pictures' => $cur['pictures'],
        'objname'  => $cur['objname'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($lvl === 'Easy') {
        // Colors only
        $targetColor = $colors[rand(1, 8)];
        $targetShape = null;
        $total       = 40;
        $objname     = $targetColor . ' shape';
    } else {
        // Mixed — both ranges restricted (matches legacy)
        $targetShape = $shapes[rand(1, 4)];
        $targetColor = $colors[rand(2, 5)];
        $total       = 50;
        $objname     = $targetColor . ' ' . $targetShape;
    }

    $ans = 0;
    $pictures = [];
    for ($i = 0; $i < $total; $i++) {
        if ($lvl === 'Easy') {
            $color = $colors[rand(1, 8)];
            $shape = $shapes[rand(1, 6)];
            if ($color === $targetColor) $ans++;
        } else {
            $color = $colors[rand(2, 5)];
            $shape = $shapes[rand(1, 4)];
            if ($color === $targetColor && $shape === $targetShape) $ans++;
        }
        $pictures[] = $base . '/math/images/objects/' . $color . '-' . $shape . '.jpg';
    }

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'total'    => $total,
        'pictures' => $pictures,
        'objname'  => $objname,
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
        <p style="font-size:14pt; color:#800080;">
            <?php if ($result['ans'] == 1): ?>
                There is only 1 <?php echo htmlspecialchars($result['objname']); ?> shown.
            <?php else: ?>
                There are <?php echo $result['ans']; ?> <?php echo htmlspecialchars($result['objname']); ?>s shown.
            <?php endif; ?>
        </p>
        <?php render_image_grid($result['pictures'], 10); ?>
    <?php else: ?>
        <br><br>
        <?php render_image_grid($q['pictures'], 10); ?>
        <br>
        <p style="font-size:17pt; font-weight:700; color:#800080;">
            How many <?php echo htmlspecialchars($q['objname']); ?>s are there?
            <input type="text" name="answer" class="answer-input"
                   style="width:60px; height:36px; font-size:24px;" maxlength="2"
                   autocomplete="off" autofocus>
        </p>
    <?php endif; ?>

    <?php if ($result === null): ?>
        <br>
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width: 20px;"></span>
    <?php endif; ?>
    <input type="submit" name="Submit2" value="New Question">

    <div align="center" style="margin-top: 20px;">
        <p style="margin-top: 5px; margin-bottom: 0">
            <font face="Verdana" style="font-size: 10pt;" color="#000080">
                Select category for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size: 9pt;">
                        <font color="#800080">
                            <input type="radio" name="level" value="<?php echo $l; ?>"
                                <?php echo $lvl === $l ? 'checked' : ''; ?>>
                            <b>&nbsp;<?php echo $levelLabels[$l]; ?></b>
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