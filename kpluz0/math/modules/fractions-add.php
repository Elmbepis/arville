<?php
// math/modules/fractions-add.php
// Computed free-text, mixed-number input (whole + fraction).
// Bypasses QEngine; uses Scorer with compound improper-fraction scoring.
//
// Level calibration: Easy = legacy Easy; Hard = legacy Hard (preserves whole-
// number practice — a distinct skill not present in legacy Medium).
// Grade &#8805; 3 requires the student's improper-fraction form to be in lowest terms.

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

$moduleTitle = 'Addition of Fractions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$op          = '+';

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

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

function fracGen($cfg, $op) {
    $maxTries = 200;
    for ($try = 0; $try < $maxTries; $try++) {
        $n1 = rand($cfg['numRange'][0], $cfg['numRange'][1]);
        do { $d1 = rand($cfg['denRange'][0], $cfg['denRange'][1]); } while ($d1 === $n1);
        $n2 = rand($cfg['numRange'][0], $cfg['numRange'][1]);
        do { $d2 = rand($cfg['denRange'][0], $cfg['denRange'][1]); } while ($d2 === $n2 || $d2 === $d1);

        if ($cfg['sameDenom'] ?? false) {
            $d2 = $d1;
        }

        if (isset($cfg['facndRange'])) {
            $facnd = rand($cfg['facndRange'][0], $cfg['facndRange'][1]);
            if (rand(1, 2) === 1) { $d2 = $d1 * $facnd; }
            else { $d1 = $d2 * $facnd; }
        }

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

        $v1 = $w1 + $n1 / $d1;
        $v2 = $w2 + $n2 / $d2;

        if ($op === '-') {
            if (abs($v1 - $v2) < 0.00001) continue;
            if ($v1 < $v2) {
                [$w1, $n1, $d1, $w2, $n2, $d2] = [$w2, $n2, $d2, $w1, $n1, $d1];
                [$v1, $v2] = [$v2, $v1];
            }
        }

        if ($cfg['answerLt1'] ?? false) {
            if ($op === '+') { if ($v1 + $v2 >= 1) continue; }
            else             { if ($v1 - $v2 >= 1) continue; }
        }

        return [$w1, $n1, $d1, $w2, $n2, $d2];
    }
    return [0, 1, 2, 0, 1, 2];
}

function fracCompute($w1, $n1, $d1, $w2, $n2, $d2, $op) {
    $t1 = $w1 * $d1 + $n1;
    $t2 = $w2 * $d2 + $n2;
    $cd = $d1 * $d2;
    $cn = ($op === '+') ? ($t1 * $d2 + $t2 * $d1) : ($t1 * $d2 - $t2 * $d1);

    $whole = 0;
    if ($cn >= $cd && $cd > 0) {
        $whole = intdiv($cn, $cd);
        $cn    = $cn % $cd;
    }
    if ($cn > 0) {
        [$cn, $cd] = fracReduce($cn, $cd);
    } else {
        $cn = 0; $cd = 1;
    }
    return [$whole, $cn, $cd];
}

// ============================================================
// GRADE × LEVEL CONFIG
// ============================================================
$configs = [
    0 => [
        'Easy' => ['numRange'=>[1,7],  'denRange'=>[3,9],   'sameDenom'=>true],
        'Hard' => ['numRange'=>[1,15], 'denRange'=>[5,20],  'sameDenom'=>true],
    ],
    1 => [
        'Easy' => ['numRange'=>[1,7],  'denRange'=>[3,9],   'sameDenom'=>true],
        'Hard' => ['numRange'=>[1,15], 'denRange'=>[5,20],  'sameDenom'=>true],
    ],
    2 => [
        'Easy' => ['numRange'=>[1,12], 'denRange'=>[5,20],  'sameDenom'=>true],
        'Hard' => ['numRange'=>[3,7],  'denRange'=>[6,12],  'facndRange'=>[1,3], 'answerLt1'=>true],
    ],
    3 => [
        'Easy' => ['numRange'=>[2,8],  'denRange'=>[5,10],  'facndRange'=>[1,3], 'answerLt1'=>true],
        'Hard' => ['numRange'=>[4,10], 'denRange'=>[2,5],   'facndRange'=>[3,5]],
    ],
    4 => [
        'Easy' => ['numRange'=>[2,9],  'denRange'=>[2,9],   'facndRange'=>[2,3]],
        'Hard' => ['numRange'=>[4,15], 'denRange'=>[2,9],   'wholeRange'=>[1,3], 'wholeChance'=>0.5],
    ],
    5 => [
        'Easy' => ['numRange'=>[2,9],  'denRange'=>[2,9],   'facndRange'=>[3,5]],
        'Hard' => ['numRange'=>[4,18], 'denRange'=>[2,12],  'wholeRange'=>[1,9], 'wholeChance'=>0.5],
    ],
    6 => [
        'Easy' => ['numRange'=>[2,10], 'denRange'=>[2,10],  'facndRange'=>[3,8]],
        'Hard' => ['numRange'=>[4,25], 'denRange'=>[2,16],  'wholeRange'=>[1,12], 'wholeChance'=>0.67],
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

    $studentWhole = $cur['showWhole'] ? (int)($_POST['whole'] ?? 0) : 0;
    $studentNumer = (int)($_POST['numer'] ?? 0);
    $studentDenom = (int)($_POST['denom'] ?? 0);

    // Compute reduced forms
    if ($studentDenom > 0) {
        $sT = $studentWhole * $studentDenom + $studentNumer;
        [$srn, $srd] = fracReduce($sT, $studentDenom);
    } else {
        $sT = -1; $srn = -1; $srd = -1;
    }
    $cT = $cur['ansW'] * $cur['ansD'] + $cur['ansN'];
    [$crn, $crd] = fracReduce($cT, $cur['ansD']);

    // Build combined for scorer
    if ($studentDenom <= 0) {
        $studentCombined = '-1|-1';                      // invalid &#8594; guaranteed wrong
    } elseif ($grdKey >= 3) {
        $studentCombined = $sT . '|' . $studentDenom;    // raw form: forces lowest terms
    } else {
        $studentCombined = $srn . '|' . $srd;            // reduced: value-only match
    }
    $correctCombined = $crn . '|' . $crd;

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($studentCombined, $correctCombined, $cur['lvl']);

    $result = [
        'correct'      => $isCorrect,
        'stuWhole'     => $studentWhole,
        'stuNumer'     => $studentNumer,
        'stuDenom'     => $studentDenom,
        'stuInvalid'   => ($studentDenom <= 0),
        'w1' => $cur['w1'], 'n1' => $cur['n1'], 'd1' => $cur['d1'],
        'w2' => $cur['w2'], 'n2' => $cur['n2'], 'd2' => $cur['d2'],
        'ansW' => $cur['ansW'], 'ansN' => $cur['ansN'], 'ansD' => $cur['ansD'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    [$w1, $n1, $d1, $w2, $n2, $d2] = fracGen($cfg, $op);
    [$ansW, $ansN, $ansD] = fracCompute($w1, $n1, $d1, $w2, $n2, $d2, $op);

    $showWhole = ($grdKey > 2 && ($ansW > 0 || $ansN / max(1, $ansD) >= 1));

    $_SESSION[$sessionKey]['current'] = [
        'w1' => $w1, 'n1' => $n1, 'd1' => $d1,
        'w2' => $w2, 'n2' => $n2, 'd2' => $d2,
        'ansW' => $ansW, 'ansN' => $ansN, 'ansD' => $ansD,
        'showWhole' => $showWhole,
        'lvl'       => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER HELPERS
// ============================================================
$renderFraction = function ($whole, $numer, $denom) {
    echo '<span style="display:inline-flex; align-items:center; gap:6px;">';
    if ($whole > 0) {
        echo '<span>' . $whole . '</span>';
    }
    echo '<span style="display:inline-block; text-align:center; vertical-align:middle; line-height:1.1;">';
    echo '<span style="display:block; padding:0 5px; border-bottom:3px solid currentColor;">' . $numer . '</span>';
    echo '<span style="display:block; padding:0 5px;">' . $denom . '</span>';
    echo '</span>';
    echo '</span>';
};

$renderInputs = function ($showWhole) {
    $border = '#888';
    $color  = '#0000CC';
    echo '<span style="display:inline-flex; align-items:center; gap:6px;">';
    if ($showWhole) {
        echo '<input type="text" name="whole" size="1" maxlength="2" style="width:62px; height:44px; font-size:26px; text-align:center; border:2px solid ' . $border . '; border-radius:6px; color:' . $color . '; font-weight:700;" autocomplete="off">';
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
    <?php if ($result['stuInvalid']): ?>
        <p style="font-size:14pt; font-weight:700; color:#CC0066; text-align:center; margin-top:20px;">
            &#10060; Your answer is invalid.
        </p>
    <?php else: ?>
        <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
            Your answer:
            <strong style="color:#CC0066; font-size:16pt;">
                <?php echo htmlspecialchars(fracFormat($result['stuWhole'], $result['stuNumer'], $result['stuDenom'])); ?>
            </strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <?php if (!$result['correct'] && $grdKey >= 3): ?>
            <p style="font-size:11pt; color:#888; text-align:center;">
                (Reminder: reduce your answer in lowest terms.)
            </p>
        <?php endif; ?>
    <?php endif; ?>

    <p class="statement" style="font-size:14pt; color:#800080;">
        The correct answer is <strong style="color:#CC0066;"><?php echo htmlspecialchars(fracFormat($result['ansW'], $result['ansN'], $result['ansD'])); ?></strong>.
    </p>

    <div class="equation-card">
        <div style="display:inline-flex; align-items:center; gap:14px; font-size:24pt; font-weight:700; font-family:'Comic Sans MS','Segoe UI',sans-serif; color:#800080; flex-wrap:wrap; justify-content:center;">
            <?php $renderFraction($result['w1'], $result['n1'], $result['d1']); ?>
            <span style="color:#CC0066;"><?php echo $op; ?></span>
            <?php $renderFraction($result['w2'], $result['n2'], $result['d2']); ?>
            <span>=</span>
            <span style="color:#CC0066;"><?php echo htmlspecialchars(fracFormat($result['ansW'], $result['ansN'], $result['ansD'])); ?></span>
        </div>
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
    <?php if ($grdKey >= 3): ?>
        <p style="font-size:11pt; color:#666; text-align:center;">
            (Reduce your answer in lowest terms.)
        </p>
    <?php endif; ?>
    <div style="margin-top:24px;">
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