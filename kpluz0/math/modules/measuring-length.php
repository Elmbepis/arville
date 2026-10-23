<?php
// math/modules/measuring-length.php
// Computed text-choice. Reference image = ruler + object; student measures length.
// Easy = short objects (set 1); Hard = set 1 offset by spacer images (legacy Hard).
// Set 2 (Medium objects, longer rulers) dropped — flagged for review.

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

$moduleTitle = 'Measuring Length';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $click,
        'ans'     => $cur['ans'],
        'sobj'    => $cur['sobj'],
        'unit'    => $cur['unit'],
        'qimg'    => $cur['qimg'],
        'ruler'   => $cur['ruler'],
        'spaces'  => $cur['spaces'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $path      = $base . '/math/images/objects/measurement/';
    $isUnits   = ($grdKey <= 1);
    $unit      = $isUnits ? 'units' : 'centimeters';
    $ruler     = $path . ($isUnits ? '12units.jpg' : '12cm.jpg');

    // Object set 1 (Easy and legacy-Hard both use this set)
    $objs = ['airplane-6','aquarium-4','arrow-6','boat-5','crayon-6','envelope-4',
             'eraser-4','fish-7','fork-7','guitar-6','hammer-6','key-5',
             'pencil-5','rectangle-7','screw-4','shoe-7','slipper-5','tractor-5'];

    $spaces = ($lvl === 'Hard') ? rand(1, 5) : 0;

    // Repeat prevention
    if (!isset($_SESSION[$sessionKey]['used'])) $_SESSION[$sessionKey]['used'] = [];
    $used = $_SESSION[$sessionKey]['used'];

    $safety = 0;
    do {
        $obj = $objs[array_rand($objs)];
        $safety++;
    } while (in_array($obj, $used, true) && $safety < 50);

    $used[] = $obj;
    if (count($used) > 30) $used = array_slice($used, -30);
    $_SESSION[$sessionKey]['used'] = $used;

    $parts  = explode('-', $obj);
    $sobj   = $parts[0];
    $ans    = (int)$parts[1];
    $qimg   = $path . $obj . '.jpg';

    // 4 choices: ans + 3 distractors from [1, ans+3] excluding ans
    $ch = [$ans];
    $deltas = [1, 2, 3, -1, -2, -3];
    shuffle($deltas);
    $i = 0;
    while (count($ch) < 4 && $i < count($deltas)) {
        $c = $ans + $deltas[$i];
        if ($c >= 1 && !in_array($c, $ch, true)) $ch[] = $c;
        $i++;
    }
    shuffle($ch);

    $question = "How many $unit long is the $sobj shown?";

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'choices'  => $ch,
        'question' => $question,
        'sobj'     => $sobj,
        'unit'     => $unit,
        'qimg'     => $qimg,
        'ruler'    => $ruler,
        'spaces'   => $spaces,
        'lvl'      => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
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

$renderDiagram = function ($qimg, $ruler, $spaces, $base) {
    echo '<div style="display:inline-block; border:1px solid #cccccc; background:#ffffff; padding:18px; text-align:left; max-width:100%;">';
    echo '<div style="line-height:0; margin-bottom:8px; white-space:nowrap;">';
    for ($i = 0; $i < $spaces; $i++) {
        echo '<img src="' . $base . '/math/images/objects/measurement/spacer.jpg" width="43" style="vertical-align:top;">';
    }
    echo '<img src="' . $qimg . '" style="vertical-align:top;">';
    echo '</div>';
    echo '<div style="line-height:0;"><img src="' . $ruler . '" style="max-width:100%;"></div>';
    echo '</div>';
};
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        You clicked on
        <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin:15px 0;">
        The <?php echo htmlspecialchars($result['sobj']); ?> shown is about
        <strong style="color:#CC0066; font-size:16pt;"><?php echo $result['ans']; ?></strong>
        <?php echo htmlspecialchars($result['unit']); ?> long.
    </p>
    <div style="margin:15px 0;">
        <?php $renderDiagram($result['qimg'], $result['ruler'], $result['spaces'], $base); ?>
    </div>
<?php else: ?>
    <p style="font-size:17pt; font-weight:600; color:#800080; margin:20px 0 10px;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <div style="margin:15px 0;">
        <?php $renderDiagram($q_curr['qimg'], $q_curr['ruler'], $q_curr['spaces'], $base); ?>
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