<?php
// math/modules/tessellation.php
// Image-choice. Student clicks the tessellating pattern among 4 choices.
// Single difficulty (Easy) — legacy forced this.
// Theme: paper-69 fallback. Score: score-top-1 / score-bottom-1.
// Layout: 2×2 image grid.

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

$moduleTitle = 'Understanding Tessellation';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, $cur['ans'], $lvl);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $click,
        'ans'     => $cur['ans'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $tessels    = ['2','3','5','7','11','13','17','19','23','29','31','37','41','43','47','51','53','59','61','67','71','73','79','83','89','97','101'];
    $ntessels   = ['4','6','8','9','10','12','14','16','18','20','21','22'];

    if (!isset($_SESSION[$sessionKey]['used'])) $_SESSION[$sessionKey]['used'] = [];
    $used = $_SESSION[$sessionKey]['used'];

    $safety = 0;
    do {
        $ans = $tessels[rand(0, count($tessels) - 1)];
        $safety++;
    } while (in_array($ans, $used, true) && $safety < 50);
    $used[] = $ans;
    if (count($used) > 20) $used = array_slice($used, -20);
    $_SESSION[$sessionKey]['used'] = $used;

    $choices = [$ans];
    while (count($choices) < 4) {
        $c = $ntessels[rand(0, count($ntessels) - 1)];
        if (!in_array($c, $choices, true)) $choices[] = $c;
    }
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'ans'     => $ans,
        'choices' => $choices,
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
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        You clicked on this image:
    </p>
    <div style="margin:10px 0;">
        <img src="<?php echo $base . '/math/images/tessellation/' . htmlspecialchars($result['clicked']) . '.jpg'; ?>"
             style="border:1px solid #333333; max-width:150px;">
    </div>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php if ($result['correct']): ?>
        <p class="statement" style="font-size:14pt; color:#800080;">
            This is a tessellation! Its shapes fit perfectly in a repeating pattern.
        </p>
    <?php else: ?>
        <p class="statement" style="font-size:14pt; color:#800080;">
            The shapes of a tessellation fit perfectly in a repeating pattern. This is the tessellation:
        </p>
        <div style="margin:15px 0;">
            <img src="<?php echo $base . '/math/images/tessellation/' . $result['ans'] . '.jpg'; ?>"
                 style="border:1px solid #333333; max-width:200px;">
        </div>
    <?php endif; ?>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#CC0066; margin-top:20px;">
        Click on the tessellation.
    </p>
    <div style="display:grid; grid-template-columns:repeat(2, auto); gap:15px; justify-content:center; justify-items:center; margin:20px 0;">
        <?php foreach ($q_curr['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>">
                <img src="<?php echo $base . '/math/images/tessellation/' . htmlspecialchars($c) . '.jpg'; ?>"
                     style="border:1px solid #333333; max-width:100%; display:block;">
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <div style="margin-top:20px;">
        <br/><input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();