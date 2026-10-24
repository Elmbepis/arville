<?php
// math/modules/comparing-fractions.php
// Image-choice. Compares two fractions with >, <, or = image buttons.
// Easy = single-digit fractions; Hard = double-digit (§E calibration).
// Grade < 3 forces equal numerator OR equal denominator for a fair comparison.
// Answer determined by cross-multiplication (exact integer comparison).

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

$moduleTitle = 'Comparing Fractions';
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
    $isCorrect = $scorer->processAnswer($click, $cur['ans'], $cur['lvl']);

    $result = [
        'correct'  => $isCorrect,
        'clicked'  => $click,
        'ans'      => $cur['ans'],
        'numer1'   => $cur['numer1'],
        'denom1'   => $cur['denom1'],
        'numer2'   => $cur['numer2'],
        'denom2'   => $cur['denom2'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($lvl === 'Easy') { $numlimit1 = 2; $numlimit2 = 9; }
    else                 { $numlimit1 = 11; $numlimit2 = 99; }

    $numer1 = rand($numlimit1, $numlimit2);
    $denom1 = rand($numlimit1, $numlimit2);
    $numer2 = rand($numlimit1, $numlimit2);
    $denom2 = rand($numlimit1, $numlimit2);

    // Grade < 3: force a fair comparison (equal numerator or equal denominator)
    if ($grdKey < 3) {
        if (rand(1, 2) === 1) {
            $numer2 = $numer1;
        } else {
            $denom2 = $denom1;
        }
    }

    // Cross-multiplication for exact comparison (avoids float precision issues)
    $lhs = $numer1 * $denom2;
    $rhs = $numer2 * $denom1;
    if ($lhs > $rhs)      $ans = '>';
    elseif ($lhs < $rhs)  $ans = '<';
    else                  $ans = '=';

    $_SESSION[$sessionKey]['current'] = [
        'numer1' => $numer1, 'denom1' => $denom1,
        'numer2' => $numer2, 'denom2' => $denom2,
        'ans'    => $ans,
        'lvl'    => $lvl,
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
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">Your answer: <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong></p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080;"><?php echo $result['numer1']; ?>/<?php echo $result['denom1']; ?> <span style="color:#CC0066;"><?php echo htmlspecialchars($result['ans']); ?></span> <?php echo $result['numer2']; ?>/<?php echo $result['denom2']; ?>.</p>
    
<?php else: ?>
    <p class="statement" style="font-size:14pt; font-weight:500; color:#333; margin-top:20px;">Click on the correct symbol:</p>

    <div style="display:flex; justify-content:center; align-items:center; gap:16px; margin:25px 0; font-size:24pt; font-weight:700; color:#800080; flex-wrap:wrap;">
        <span><?php echo $q_curr['numer1']; ?>/<?php echo $q_curr['denom1']; ?></span>
        <span style="display:inline-block; min-width:60px; height:60px; line-height:60px; background:#f8f8ff; border:2px dashed #b8b8d8; border-radius:8px; color:#CC0066; font-size:28pt;">?</span>
        <span><?php echo $q_curr['numer2']; ?>/<?php echo $q_curr['denom2']; ?></span>
    </div>

    <?php
    $choiceItems = [
        ['value' => '>', 'image' => $base . '/math/images/comp-gta.jpg', 'alt' => 'greater than'],
        ['value' => '<', 'image' => $base . '/math/images/comp-lta.jpg', 'alt' => 'less than'],
        ['value' => '=', 'image' => $base . '/math/images/comp-eqa.jpg', 'alt' => 'equal to'],
    ];
    render_image_choices($choiceItems, 'ansclick');
    ?>
<?php endif; ?>

    <div style="margin-top:20px;">
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