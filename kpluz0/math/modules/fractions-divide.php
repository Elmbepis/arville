<?php
// math/modules/fractions-divide.php
// FILL-IN-THE-BLANKS. Dividing fractions (possibly mixed numbers).
// Compact inline-styled inputs (80×48px) with visible 3px bar — matches
// fractions-add.php layout.
//
// Compound scoring: whole|numer|denom (or whole|0 for integers).
// Grade &#8805; 3 enforces lowest terms via literal string match.
//
// Levels: Easy = legacy Easy (fractions only).
//         Hard = legacy Medium + whole-number feature (mixed-number practice).
// Division operator displayed as ÷ (HTML entity). Solution text uses '/' and 'x'.
// Theme: paper-69-*.
// DB row required: modules.url = 'fractions-divide.php'

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

$moduleTitle = 'Division of Fractions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$op          = '&divide;';

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(4, $grd));

// ============================================================
// FRACTION HELPERS
// ============================================================
function fracGcd($a, $b) {
    $a = abs((int)$a); $b = abs((int)$b);
    while ($b) { [$a, $b] = [$b, $a % $b]; }
    return $a ?: 1;
}

function fracReduce($num, $den) {
    $num = (int)$num; $den = (int)$den;
    if ($den === 0) return [0, 1];
    $g = fracGcd($num, $den);
    return [intdiv($num, $g), intdiv($den, $g)];
}

function fracFormat($w, $n, $d) {
    if ($d === 0) return '?';
    if ($n === 0 && $w === 0) return '0';
    if ($n === 0) return (string)$w;
    if ($w === 0) return "$n/$d";
    return "$w $n/$d";
}

function canon_frac($whole, $numer, $denom) {
    $whole = (int)$whole; $numer = (int)$numer; $denom = (int)$denom;
    if ($numer == 0) return $whole . '|0';
    if ($denom == 0) return 'invalid';
    return $whole . '|' . $numer . '|' . $denom;
}

function fracGen($cfg) {
    for ($try = 0; $try < 100; $try++) {
        $n1 = rand($cfg['numRange'][0], $cfg['numRange'][1]);
        do { $d1 = rand($cfg['denRange'][0], $cfg['denRange'][1]); } while ($d1 === $n1);
        $n2 = rand($cfg['numRange'][0], $cfg['numRange'][1]);
        do { $d2 = rand($cfg['denRange'][0], $cfg['denRange'][1]); } while ($d2 === $n2);

        $w1 = 0; $w2 = 0;
        if (isset($cfg['wholeRange'])) {
            $chance = $cfg['wholeChance'] ?? 0.5;
            if ($n1 < $d1 && (rand(1, 100) / 100) <= $chance) {
                $w1 = rand($cfg['wholeRange'][0], $cfg['wholeRange'][1]);
            }
            if ($n2 < $d2 && (rand(1, 100) / 100) <= $chance) {
                $w2 = rand($cfg['wholeRange'][0], $cfg['wholeRange'][1]);
            }
        }
        return [$w1, $n1, $d1, $w2, $n2, $d2];
    }
    return [0, 1, 2, 0, 1, 2];
}

function fracComputeDiv($w1, $n1, $d1, $w2, $n2, $d2) {
    $t1 = $w1 * $d1 + $n1;
    $t2 = $w2 * $d2 + $n2;
    $rawNum = $t1 * $d2;
    $rawDen = $d1 * $t2;
    $whole = 0;
    if ($rawNum >= $rawDen && $rawDen > 0) {
        $whole = intdiv($rawNum, $rawDen);
        $rawNum = $rawNum % $rawDen;
    }
    if ($rawNum > 0) {
        [$rawNum, $rawDen] = fracReduce($rawNum, $rawDen);
    } else {
        $rawNum = 0; $rawDen = 1;
    }
    return [$whole, $rawNum, $rawDen];
}

// ============================================================
// GRADE × LEVEL CONFIG
// ============================================================
$configs = [
    4 => [
        'Easy' => ['numRange'=>[1,9],  'denRange'=>[2,9]],
        'Hard' => ['numRange'=>[4,12], 'denRange'=>[4,10], 'wholeRange'=>[1,3], 'wholeChance'=>0.5],
    ],
    5 => [
        'Easy' => ['numRange'=>[1,10], 'denRange'=>[2,10]],
        'Hard' => ['numRange'=>[4,15], 'denRange'=>[4,12], 'wholeRange'=>[1,4], 'wholeChance'=>0.5],
    ],
    6 => [
        'Easy' => ['numRange'=>[2,12], 'denRange'=>[3,12]],
        'Hard' => ['numRange'=>[4,18], 'denRange'=>[4,14], 'wholeRange'=>[1,5], 'wholeChance'=>0.6],
    ],
];
$cfg = $configs[$grdKey][$lvl];

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $sWhole = $cur['showWhole'] ? (int)($_POST['whole'] ?? 0) : 0;
    $sNumer = (int)($_POST['numer'] ?? 0);
    $sDenom = (int)($_POST['denom'] ?? 0);

    $sCombined = canon_frac($sWhole, $sNumer, $sDenom);
    $cCombined = canon_frac($cur['ansW'], $cur['ansN'], $cur['ansD']);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($sCombined, $cCombined, $cur['lvl']);

    $result = [
        'correct'  => $isCorrect,
        'sWhole'   => $sWhole,
        'sNumer'   => $sNumer,
        'sDenom'   => $sDenom,
        'cur'      => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    [$w1, $n1, $d1, $w2, $n2, $d2] = fracGen($cfg);
    [$ansW, $ansN, $ansD] = fracComputeDiv($w1, $n1, $d1, $w2, $n2, $d2);

    $showWhole = ($ansW > 0 || $ansN / max(1, $ansD) >= 1);

    // Build solution text
    $imp1 = $w1 * $d1 + $n1;
    $imp2 = $w2 * $d2 + $n2;
    $rawNum = $imp1 * $d2;
    $rawDen = $d1 * $imp2;
    $finalFrac = fracFormat($ansW, $ansN, $ansD);
    $rawFrac = "$rawNum/$rawDen";

    $soln = '';
    if ($w1 > 0) $soln .= "Convert $w1 $n1/$d1 to improper: $imp1/$d1<br>";
    if ($w2 > 0) $soln .= "Convert $w2 $n2/$d2 to improper: $imp2/$d2<br>";
    if ($w1 > 0 || $w2 > 0) $soln .= "<br>";
    $soln .= "Flip the divisor and multiply:<br>";
    $soln .= "($imp1/$d1) / ($imp2/$d2) = ($imp1/$d1) x ($d2/$imp2)<br>";
    $soln .= "= ($imp1 x $d2) / ($d1 x $imp2)<br>";
    $soln .= "= $rawFrac<br>";
    if ($rawFrac === $finalFrac) {
        $soln .= "= <strong style='color:#CC0066;'>$finalFrac</strong>";
    } else {
        $soln .= "= <strong style='color:#CC0066;'>$finalFrac</strong> (lowest terms)";
    }

    $_SESSION[$sessionKey]['current'] = [
        'w1' => $w1, 'n1' => $n1, 'd1' => $d1,
        'w2' => $w2, 'n2' => $n2, 'd2' => $d2,
        'ansW' => $ansW, 'ansN' => $ansN, 'ansD' => $ansD,
        'showWhole' => $showWhole,
        'soln' => $soln,
        'lvl' => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER HELPERS
// ============================================================
$renderFraction = function ($whole, $numer, $denom) {
    if ($numer == 0 && $whole == 0) { echo '<span>0</span>'; return; }
    echo '<span style="display:inline-flex; align-items:center; gap:6px;">';
    if ($whole > 0) {
        echo '<span>' . $whole . '</span>';
    }
    if ($numer > 0) {
        echo '<span style="display:inline-block; text-align:center; vertical-align:middle; line-height:1.1;">';
        echo '<span style="display:block; padding:0 5px; border-bottom:3px solid currentColor;">' . $numer . '</span>';
        echo '<span style="display:block; padding:0 5px;">' . $denom . '</span>';
        echo '</span>';
    }
    echo '</span>';
};

$renderInputs = function ($showWhole) {
    $border = '#888';
    $color  = '#0000CC';
    echo '<span style="display:inline-flex; align-items:center; gap:6px;">';
    if ($showWhole) {
        echo '<input type="text" name="whole" size="1" maxlength="2" style="width:62px; height:44px; font-size:26px; text-align:center; border:2px solid ' . $border . '; border-radius:6px; color:' . $color . '; font-weight:700;" autocomplete="off" autofocus>';
    }
    echo '<span style="display:inline-flex; flex-direction:column; align-items:center;">';
    echo '<input type="text" name="numer" size="1" maxlength="3" style="width:80px; height:48px; font-size:30px; text-align:center; border:2px solid ' . $border . '; border-radius:6px 6px 2px 2px; color:' . $color . '; font-weight:700;" autocomplete="off"' . ($showWhole ? '' : ' autofocus') . '>';
    echo '<span style="display:block; width:80px; height:3px; background:#333; margin:5px 0;"></span>';
    echo '<input type="text" name="denom" size="1" maxlength="3" style="width:80px; height:48px; font-size:30px; text-align:center; border:2px solid ' . $border . '; border-radius:2px 2px 6px 6px; color:' . $color . '; font-weight:700;" autocomplete="off">';
    echo '</span>';
    echo '</span>';
};

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
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answer:
        <strong style="color:#CC0066; font-size:16pt;">
            <?php echo htmlspecialchars(fracFormat($result['sWhole'], $result['sNumer'], $result['sDenom'])); ?>
        </strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p class="statement" style="font-size:14pt; color:#800080;">
        The correct answer is <strong style="color:#CC0066;"><?php echo htmlspecialchars(fracFormat($cur['ansW'], $cur['ansN'], $cur['ansD'])); ?></strong>.
    </p>

    <div class="equation-card">
        <div style="display:inline-flex; align-items:center; gap:14px; font-size:24pt; font-weight:700; font-family:'Comic Sans MS','Segoe UI',sans-serif; color:#800080; flex-wrap:wrap; justify-content:center;">
            <?php $renderFraction($cur['w1'], $cur['n1'], $cur['d1']); ?>
            <span style="color:#CC0066;"><?php echo $op; ?></span>
            <?php $renderFraction($cur['w2'], $cur['n2'], $cur['d2']); ?>
            <span>=</span>
            <?php $renderFraction($cur['ansW'], $cur['ansN'], $cur['ansD']); ?>
        </div>
    </div>

    <div class="statement" style="font-size:13pt; color:#800080; line-height:1.7; text-align:center; margin-top:15px;">
        <?php echo $cur['soln']; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <div class="equation-card">
        <div style="display:inline-flex; align-items:center; gap:14px; font-size:26pt; font-weight:700; font-family:'Comic Sans MS','Segoe UI',sans-serif; color:#800080; flex-wrap:wrap; justify-content:center;">
            <?php $renderFraction($q_curr['w1'], $q_curr['n1'], $q_curr['d1']); ?>
            <span style="color:#CC0066;"><?php echo $op; ?></span>
            <?php $renderFraction($q_curr['w2'], $q_curr['n2'], $q_curr['d2']); ?>
            <span>=</span>
            <?php $renderInputs($q_curr['showWhole']); ?>
        </div>
    </div>
    <p style="font-size:11pt; color:#666; text-align:center;">
        (Reduce your answer in lowest terms.)
    </p>
    <div style="margin-top:24px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
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