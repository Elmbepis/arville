<?php
// math/modules/halves-fourths.php
// Image-choice. Single difficulty (Easy).
// Shows whole + fractioned image; student picks the fraction as text button.

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

$moduleTitle = 'Halves and Fourths';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

$grd = (int)($_SESSION['grade'] ?? 0);

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
        'correct'  => $isCorrect,
        'clicked'  => $click,
        'ans'      => $cur['ans'],
        'imgWhole' => $cur['imgWhole'],
        'imgFrac'  => $cur['imgFrac'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $obj = rand(1, 40);
    if ($obj > 26) $obj = rand(27, 31);

    $fcode = [12, 14, 34][rand(0, 2)];
    $fnum  = rand(1, 4);

    $imgWhole = $base . '/math/images/objects/fractions/halves-fourths-eighths/1/' . $obj . '.jpg';
    $imgFrac  = $base . '/math/images/objects/fractions/halves-fourths-eighths/'
              . $fcode . '/' . $obj . '-' . $fcode . $fnum . '.jpg';

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => (string)$fcode,
        'imgWhole' => $imgWhole,
        'imgFrac'  => $imgFrac,
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
    'score_top'     => $base . '/math/images/score-top-5.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-5.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);

$fracText = function ($code) {
    return substr($code, 0, 1) . '/' . substr($code, -1);
};
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center; margin-top:20px;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:16pt; color:#800080;">
        The fraction shown is
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($fracText($result['ans'])); ?>'</strong>.
    </p>
    <div style="display:flex; justify-content:center; align-items:flex-start; gap:24px; margin:25px 0; flex-wrap:wrap;">
        <div style="text-align:center;">
            <img src="<?php echo htmlspecialchars($result['imgWhole']); ?>"
                 style="border:1px solid #cccccc; border-radius:4px; max-width:100%;">
            <p style="font-size:14pt; font-weight:700; color:#000080; margin-top:8px; margin-bottom:0;">1 Whole</p>
        </div>
        <div style="text-align:center;">
            <img src="<?php echo htmlspecialchars($result['imgFrac']); ?>"
                 style="border:1px solid #cccccc; border-radius:4px; max-width:100%;">
            <p style="font-size:14pt; font-weight:700; color:#CC0066; margin-top:8px; margin-bottom:0;">
                <?php echo htmlspecialchars($fracText($result['ans'])); ?>
            </p>
        </div>
    </div>
<?php else: ?>
    <p class="statement" style="font-size:17pt; font-weight:600; color:#800080;">
        What fraction of the whole is shown<br/>by the image on the right?
    </p>
    <div style="display:flex; justify-content:center; align-items:flex-start; gap:24px; margin:25px 0; flex-wrap:wrap;">
        <div style="text-align:center;">
            <img src="<?php echo htmlspecialchars($q_curr['imgWhole']); ?>"
                 style="border:1px solid #cccccc; border-radius:4px; max-width:100%;">
            <p style="font-size:14pt; font-weight:700; color:#000080; margin-top:8px; margin-bottom:0;">1 Whole</p>
        </div>
        <div style="text-align:center;">
            <img src="<?php echo htmlspecialchars($q_curr['imgFrac']); ?>"
                 style="border:1px solid #cccccc; border-radius:4px; max-width:100%;">
            <p style="font-size:14pt; font-weight:700; color:#000080; margin-top:8px; margin-bottom:0;">?</p>
        </div>
    </div>
    <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:12px; max-width:380px; margin:25px auto;">
        <?php foreach ([['value'=>'14','label'=>'1/4'],['value'=>'12','label'=>'1/2'],['value'=>'34','label'=>'3/4']] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c['value']); ?>"
               style="display:block; background:#f0f0f0; border:2px solid #ccc; border-radius:12px; padding:14px 20px; font-size:1.3rem; font-weight:bold; color:#0000BB; text-decoration:none; text-align:center; box-sizing:border-box;">
                <?php echo htmlspecialchars($c['label']); ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <div style="margin-top:<?php echo $result === null ? '50px' : '20px'; ?>;">
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();