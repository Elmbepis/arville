<?php
// math/modules/addition-pics.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used. Answer = num1+num2.
// Uses container.php + scorer.php only.
//
// Theme test11b-* &#8594; paper-69-* (matches modern 800px container geometry —
// same fix applied to counting.php).
//
// Level merge: Easy = legacy Easy, Hard = legacy Hard. Medium dropped.
//
// Grade-dependent ranges (from legacy):
//   grd <= 0:  Easy 1-6,  Hard 4-12
//   grd >= 1:  Easy 2-12, Hard 8-25
//
// Image assets:
//   math/images/objects/3{obj}.jpg (prefix '3' — medium size)
//   math/images/plus-sign.jpg
//   math/images/equals-sign.jpg

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

$moduleTitle = 'Addition with Pictures';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

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

$objects = ['balls', 'apples', 'dogs', 'dolls', 'robots', 'bikes', 'monkeys', 'shoes', 'birds'];

// Grade × level ranges (Medium dropped)
if ($grd <= 0) {
    $rangeMin = ($lvl === 'Easy') ? 1 : 4;
    $rangeMax = ($lvl === 'Easy') ? 6 : 12;
} else {
    $rangeMin = ($lvl === 'Easy') ? 2 : 8;
    $rangeMax = ($lvl === 'Easy') ? 12 : 25;
}

/**
 * Render one column of icons + (optional) label underneath.
 * Used twice per question — one per addend.
 */
function renderAdditionColumn($imgPath, $count, $label = null) {
    $out = '';
    for ($i = 1; $i <= $count; $i++) {
        $out .= '<img src="' . htmlspecialchars($imgPath) . '" alt="">';
        if ($i % 5 === 0 && $count > $i) $out .= '<br>';
    }
    if ($label !== null) {
        $out .= '<div style="font-family:\'Comic Sans MS\',sans-serif;'
              . ' font-size:22pt; font-weight:700; color:#800080; margin-top:8px;">'
              . $count . ' ' . htmlspecialchars($label) . '</div>';
    }
    return $out;
}

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    // Canonicalise input: "07" &#8594; "7", " 7abc" &#8594; "7", "" &#8594; "0"
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
        'objname'  => $cur['objname'],
        'objname1' => $cur['objname1'],
        'objname2' => $cur['objname2'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $num1 = rand($rangeMin, $rangeMax);
    $num2 = rand($rangeMin, $rangeMax);
    $ans  = $num1 + $num2;

    $objname = $objects[array_rand($objects)];
    $image   = $base . '/math/images/objects/3' . $objname . '.jpg';

    // Singular form: "balls" &#8594; "ball" when count == 1
    $objname1 = ($num1 == 1) ? substr($objname, 0, -1) : $objname;
    $objname2 = ($num2 == 1) ? substr($objname, 0, -1) : $objname;

    $_SESSION[$sessionKey]['current'] = [
        'num1'     => $num1,
        'num2'     => $num2,
        'ans'      => $ans,
        'image'    => $image,
        'objname'  => $objname,
        'objname1' => $objname1,
        'objname2' => $objname2,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

$plusImg   = $base . '/math/images/plus-sign.jpg';
$equalsImg = $base . '/math/images/equals-sign.jpg';

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
            <?php echo $result['num1']; ?> <?php echo htmlspecialchars($result['objname1']); ?>
            + <?php echo $result['num2']; ?> <?php echo htmlspecialchars($result['objname2']); ?>
            = <strong><?php echo $result['ans']; ?></strong> <?php echo htmlspecialchars($result['objname']); ?>.
        </p>
        <div style="display:flex; justify-content:center; align-items:flex-end; gap:20px; margin:20px 0; flex-wrap:wrap;">
            <div><?php echo renderAdditionColumn($result['image'], $result['num1']); ?></div>
            <div style="padding-bottom: 20px;"><img src="<?php echo htmlspecialchars($plusImg); ?>" alt="+"></div>
            <div><?php echo renderAdditionColumn($result['image'], $result['num2']); ?></div>
        </div>
    <?php else: ?>
        <br><br>
        <div style="display:flex; justify-content:center; align-items:flex-end; gap:20px; margin:20px 0; flex-wrap:wrap;">
            <div><?php echo renderAdditionColumn($q['image'], $q['num1'], $q['objname1']); ?></div>
            <div style="padding-bottom: 40px;"><img src="<?php echo htmlspecialchars($plusImg); ?>" alt="+"></div>
            <div><?php echo renderAdditionColumn($q['image'], $q['num2'], $q['objname2']); ?></div>
        </div>
        <div style="font-size:26pt; font-weight:700; color:#800080; margin:10px 0; display:flex; justify-content:center; align-items:center; gap:12px;">
            <img src="<?php echo htmlspecialchars($equalsImg); ?>" alt="=" style="vertical-align:middle;">
            <input type="text" name="answer" class="answer-input"
                   style="width:90px; height:46px; font-size:26px;" autocomplete="off" autofocus>
            <span><?php echo htmlspecialchars($q['objname']); ?></span>
        </div>
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