<?php
// math/modules/measuring-mass.php
// Computed text-choice. Reference image = weight(s) on a scale.
// Easy = single weight (1-9 kg); Hard = two weights (5-9 each). Medium dropped.

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

$moduleTitle = 'Measuring Mass';
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
        'imgs'    => $cur['imgs'],
        'lvl2'    => $cur['lvl'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $path = $base . '/math/images/objects/measurement/';

    if ($lvl === 'Easy') {
        $mass = rand(1, 9);
        $imgs = [$path . 'weight' . $mass . '.jpg'];
        $ans  = $mass;
        $question = 'How much mass in kilograms is on the scale?';
    } else {
        $mass1 = rand(5, 9);
        $mass2 = rand(5, 9);
        $imgs  = [$path . 'weight' . $mass1 . '.jpg', $path . 'weight' . $mass2 . '.jpg'];
        $ans   = $mass1 + $mass2;
        $question = 'If we put these things on one scale,\nhow many kilograms will we read?';
    }

    // Repeat prevention (avoid same answer value back-to-back)
    if (!isset($_SESSION[$sessionKey]['last2'])) $_SESSION[$sessionKey]['last2'] = [];
    $last2 = $_SESSION[$sessionKey]['last2'];

    $safety = 0;
    while (in_array($ans, $last2, true) && $safety < 20) {
        if ($lvl === 'Easy') {
            $mass = rand(1, 9);
            $imgs = [$path . 'weight' . $mass . '.jpg'];
            $ans  = $mass;
        } else {
            $mass1 = rand(5, 9);
            $mass2 = rand(5, 9);
            $imgs  = [$path . 'weight' . $mass1 . '.jpg', $path . 'weight' . $mass2 . '.jpg'];
            $ans   = $mass1 + $mass2;
        }
        $safety++;
    }
    $last2[] = $ans;
    if (count($last2) > 2) $last2 = array_slice($last2, -2);
    $_SESSION[$sessionKey]['last2'] = $last2;

    // 4 choices: ans ± {1,2,3}, all &#8805; 1
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

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'choices'  => $ch,
        'question' => $question,
        'imgs'     => $imgs,
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

$renderDiagram = function ($imgs) {
    echo '<div style="display:inline-block; border:1px solid #cccccc; background:#ffffff; padding:20px;">';
    foreach ($imgs as $i => $img) {
        if ($i > 0) echo ' &nbsp; ';
        echo '<img src="' . $img . '" style="max-width:100%;">';
    }
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
        <?php if ($result['lvl2'] === 'Easy'): ?>
            The scale has <strong style="color:#CC0066; font-size:16pt;"><?php echo $result['ans']; ?></strong>
            kilogram<?php echo $result['ans'] > 1 ? 's' : ''; ?> on top of it.
        <?php else: ?>
            If we put these things on one scale,\nwe will read a total of
            <strong style="color:#CC0066; font-size:16pt;"><?php echo $result['ans']; ?></strong> kilograms.
        <?php endif; ?>
    </p>
    <div style="margin:15px 0;">
        <?php $renderDiagram($result['imgs']); ?>
    </div>
<?php else: ?>
    <p style="font-size:17pt; font-weight:600; color:#800080; margin:20px 0 10px;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <div style="margin:15px 0;">
        <?php $renderDiagram($q_curr['imgs']); ?>
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