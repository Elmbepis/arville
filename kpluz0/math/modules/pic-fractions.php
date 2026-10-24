<?php
// math/modules/pic-fractions.php
// Computed free-text, dual-input (numerator + denominator).
// Shows a grid of colored squares; student enters the fraction represented.
// Answer compared by reduced form (6/8 &#8801; 3/4).
// Bypasses QEngine; uses Scorer with compound "num|den" scoring.

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

$moduleTitle = 'Picturing Fractions using Squares';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(1, $grd));

// Reduce a fraction to lowest terms
function reduceFraction($num, $den) {
    $num = (int)$num; $den = (int)$den;
    if ($den === 0) return [0, 1];
    $a = abs($num); $b = abs($den);
    while ($b) { $t = $b; $b = $a % $b; $a = $t; }
    $g = $a ?: 1;
    return [intdiv($num, $g), intdiv($den, $g)];
}

// ============================================================
// HANDLE SUBMIT1 (dual-input)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $studentN = (int)($_POST['numer'] ?? 0);
    $studentD = (int)($_POST['denom'] ?? 0);
    if ($studentD === 0) $studentD = 1;   // avoid div-by-zero display

    [$sn, $sd] = reduceFraction($studentN, $studentD);
    [$cn, $cd] = reduceFraction($cur['numer'], $cur['denom']);

    $studentCombined = "$sn|$sd";
    $correctCombined = "$cn|$cd";

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($studentCombined, $correctCombined, $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'stuN'    => $studentN,
        'stuD'    => $studentD,
        'numer'   => $cur['numer'],
        'denom'   => $cur['denom'],
        'rows'    => $cur['rows'],
        'cols'    => $cur['cols'],
        'frac'    => $cur['frac'],
        'img1'    => $cur['img1'],
        'img2'    => $cur['img2'],
        'color'   => $cur['color'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Grade × Level grid config: [rowsMin, rowsMax, colsMin, colsMax, fraclim, imgSet]
    // Hard = legacy Hard (wider grids + wider fraclim); Medium dropped.
    $configs = [
        1 => [
            'Easy' => [1, 3, 2, 5, 1, 1],
            'Hard' => [4, 5, 5, 7, 12, 1],
        ],
        2 => [
            'Easy' => [2, 3, 2, 4, 1, 1],
            'Hard' => [4, 6, 5, 8, 12, 2],
        ],
        3 => [
            'Easy' => [2, 4, 3, 6, 1, 1],
            'Hard' => [4, 6, 5, 10, 12, 2],
        ],
    ];
    // Grades 4-6 fall through to grade 3 Hard config (already advanced)
    $cfgKey = min(3, $grdKey);
    $cfg = $configs[$cfgKey][$lvl];
    [$rMin, $rMax, $cMin, $cMax, $fraclim, $imgSet] = $cfg;

    $rows = rand($rMin, $rMax);
    $cols = rand($cMin, $cMax);

    $total  = $rows * $cols;
    $frac   = rand($fraclim, max($fraclim, $total - 1));

    // Image set — grade 1 uses frac1/frac2; grade 2+ uses frac3/frac4
    if ($imgSet === 1) {
        $img1File = 'frac1.jpg';
        $img2File = 'frac2.jpg';
    } else {
        $img1File = 'frac3.jpg';
        $img2File = 'frac4.jpg';
    }
    $img1 = $base . '/math/images/' . $img1File;
    $img2 = $base . '/math/images/' . $img2File;

    // Color (which area the question is about)
    $color = (rand(1, 2) === 1) ? 'blue' : 'red';

    // $frac cells are image2; the rest are image1.
    // If color = red &#8594; ask about image2's count ($frac)
    // If color = blue &#8594; ask about image1's count ($total - $frac)
    if ($color === 'red') {
        $numer = $frac;
    } else {
        $numer = $total - $frac;
    }
    $denom = $total;

    $_SESSION[$sessionKey]['current'] = [
        'numer' => $numer,
        'denom' => $denom,
        'rows'  => $rows,
        'cols'  => $cols,
        'frac'  => $frac,
        'img1'  => $img1,
        'img2'  => $img2,
        'color' => $color,
        'lvl'   => $lvl,
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

$renderGrid = function ($rows, $cols, $frac, $img1, $img2) {
    $total = $rows * $cols;
    echo '<div style="display:inline-grid; grid-template-columns:repeat(' . (int)$cols . ', 30px); gap:0; margin:15px 0;">';
    $k = 0;
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $k++;
            $src = ($k <= ($total - $frac)) ? $img1 : $img2;
            echo '<div style="width:30px; height:30px; background:url(\'' . htmlspecialchars($src) . '\') no-repeat center; background-size:cover;"></div>';
        }
    }
    echo '</div>';
};

// Reduction display helper
$reducedText = function ($n, $d) {
    [$rn, $rd] = reduceFraction($n, $d);
    if ($rn === $n && $rd === $d) return "$n/$d";
    return "$n/$d or $rn/$rd";
};
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php if ($result['stuN'] === 0 || $result['stuD'] === 0): ?>
        <p style="font-size:14pt; font-weight:700; color:#CC0066; text-align:center; margin-top:20px;">
            &#10060; Your answer is invalid.
        </p>
    <?php else: ?>
        <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
            Your answer:
            <strong style="color:#0000BB; font-size:16pt;"><?php echo $result['stuN']; ?>/<?php echo $result['stuD']; ?></strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
    <?php endif; ?>
    <p class="statement" style="font-size:14pt; color:#800080;">
        The <?php echo htmlspecialchars($result['color']); ?> area is
        <strong style="color:#CC0066;"><?php echo $reducedText($result['numer'], $result['denom']); ?></strong>
        of the whole area.
    </p>
    <div><?php $renderGrid($result['rows'], $result['cols'], $result['frac'], $result['img1'], $result['img2']); ?></div>
<?php else: ?>
    <div style="margin:20px 0;">
        <?php $renderGrid($q_curr['rows'], $q_curr['cols'], $q_curr['frac'], $q_curr['img1'], $q_curr['img2']); ?>
    </div>
    <p class="statement" style="font-size:17pt; font-weight:600; color:#800080;">
        The <?php echo htmlspecialchars($q_curr['color']); ?> area is what fraction of the whole area?
    </p>
    <div style="display:flex; flex-direction:column; align-items:center; gap:4px; margin:20px 0;">
        <input type="text" name="numer" size="3" maxlength="4"
               style="width:90px; height:48px; font-size:24px; text-align:center; border:2px solid #888; border-radius:6px;"
               autocomplete="off" autofocus>
        <div style="width:90px; height:3px; background:#333; border-radius:2px;"></div>
        <input type="text" name="denom" size="3" maxlength="4"
               style="width:90px; height:48px; font-size:24px; text-align:center; border:2px solid #888; border-radius:6px;"
               autocomplete="off">
    </div>
    <div>
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php endif; ?>

    <?php if ($result !== null): ?>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
    <?php endif; ?>

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