<?php
// math/modules/conv-volume.php
// MULTIPLE CHOICE (4 choices). Volume unit conversion.
// Uses ?ansclick + 2x2 grid.
//
// Levels: Easy = legacy Easy (Metric in-system)
//         Hard = legacy Medium (English in-system)
// Legacy Hard (Mixed) dropped per §E.
//
// Distractor strategy:
//   METRIC: four choices at CONSECUTIVE powers of ten, same significand.
//   ENGLISH: ans × {2, 3, 4, 0.5, 0.25} — wrong-factor distractors.
//
// Theme: testb-* (117/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'conv-volume.php'

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

$moduleTitle = 'Volume Unit Conversion';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(7, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function canon_conv($v) {
    $r = round((float)$v, 6);
    if (abs($r - round($r)) < 0.0000001) return (string)(int)round($r);
    return rtrim(rtrim(number_format($r, 6, '.', ''), '0'), '.');
}

function singular_unit($u) {
    return substr($u, 0, -1);
}

// ------------------------------------------------------------
// METRIC distractor helpers — consecutive powers of ten
// ------------------------------------------------------------
function split_sig_exp($v) {
    $s = canon_conv($v);
    if (strpos($s, '.') !== false) {
        list($intPart, $fracPart) = explode('.', $s, 2);
    } else {
        $intPart  = $s;
        $fracPart = '';
    }
    $digits     = $intPart . $fracPart;
    $decimalPos = strlen($intPart);

    $leading = 0;
    while ($leading < strlen($digits) && $digits[$leading] === '0') $leading++;
    if ($leading === strlen($digits)) return ['0', 0];
    $digits = substr($digits, $leading);
    $decimalPos -= $leading;

    $trailing = 0;
    while (strlen($digits) - $trailing > 1 && substr($digits, -1 - $trailing, 1) === '0') $trailing++;
    if ($trailing > 0) $digits = substr($digits, 0, strlen($digits) - $trailing);

    return [$digits, $decimalPos - strlen($digits)];
}

function make_metric_distractors($correct, $n = 3) {
    if ($correct <= 0) return [];
    list($sig, $p) = split_sig_exp($correct);
    if ($sig === '0') return [];
    $sigVal = (float)$sig;

    $offset   = rand(0, $n);
    $startExp = $p - $offset;

    $allChoices = [];
    for ($i = 0; $i <= $n; $i++) {
        $exp = $startExp + $i;
        if ($exp > 100 || $exp < -100) {
            return make_metric_distractors_legacy($correct, $n);
        }
        $cv = canon_conv($sigVal * pow(10, $exp));
        if ($cv === '0' || $cv === '') {
            return make_metric_distractors_legacy($correct, $n);
        }
        $allChoices[$i] = $cv;
    }

    $distractors = [];
    foreach ($allChoices as $i => $c) {
        if ($i !== $offset) $distractors[] = $c;
    }
    return $distractors;
}

function make_metric_distractors_legacy($correct, $n = 3) {
    $correctCanon = canon_conv($correct);
    $seen = [$correctCanon => true];
    $out  = [];
    $mults = [10, 100, 1000, 10000, 0.1, 0.01, 0.001, 0.0001];
    shuffle($mults);
    foreach ($mults as $m) {
        if (count($out) >= $n) break;
        $cv = $correct * $m;
        if ($cv <= 0) continue;
        $cc = canon_conv($cv);
        if ($cc === '0' || $cc === '') continue;
        if (isset($seen[$cc])) continue;
        $seen[$cc] = true;
        $out[] = $cc;
    }
    $d = 1;
    while (count($out) < $n && $d <= 50) {
        foreach ([$correct + $d, $correct - $d] as $cv) {
            if ($cv > 0) {
                $cc = canon_conv($cv);
                if ($cc !== '0' && !isset($seen[$cc])) {
                    $seen[$cc] = true;
                    $out[] = $cc;
                    if (count($out) >= $n) break 2;
                }
            }
        }
        $d++;
    }
    return $out;
}

// ------------------------------------------------------------
// ENGLISH distractor generator — wrong-factor misconception
// ------------------------------------------------------------
function make_english_distractors($correct, $n = 3) {
    $correctCanon = canon_conv($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    $mults = [2, 3, 4, 0.5, 0.25];
    shuffle($mults);

    foreach ($mults as $m) {
        if (count($out) >= $n) break;
        $cv = $correct * $m;
        if ($cv <= 0) continue;
        $cc = canon_conv($cv);
        if ($cc === '0' || $cc === '') continue;
        if (isset($seen[$cc])) continue;
        $seen[$cc] = true;
        $out[] = $cc;
    }

    $d = 1;
    while (count($out) < $n && $d <= 50) {
        foreach ([$correct + $d, $correct - $d] as $cv) {
            if ($cv > 0) {
                $cc = canon_conv($cv);
                if ($cc !== '0' && !isset($seen[$cc])) {
                    $seen[$cc] = true;
                    $out[] = $cc;
                    if (count($out) >= $n) break 2;
                }
            }
        }
        $d++;
    }
    return $out;
}

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer(canon_conv($clicked), $cur['ans_canon'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $clicked,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $type = ($lvl === 'Easy') ? 'Metric' : 'English';

    if ($grd >= 6) {
        $numlimit1 = 2; $numlimit2 = ($type === 'Metric') ? 199 : 49;
        $gapMin = 1;    $gapMax = 2;
    } else {
        $numlimit1 = 2; $numlimit2 = ($type === 'Metric') ? 99  : 35;
        $gapMin = 1;    $gapMax = 1;
    }

    if ($type === 'Metric') {
        $unitPool = [
            1 => ['name' => 'milliliters', 'measure' => 0.004224],
            2 => ['name' => 'centiliters', 'measure' => 0.04224],
            3 => ['name' => 'liters',      'measure' => 4.224],
            4 => ['name' => 'kiloliters',  'measure' => 4224],
        ];
    } else {
        $unitPool = [
            1 => ['name' => 'cups',    'measure' => 1],
            2 => ['name' => 'pints',   'measure' => 2],
            3 => ['name' => 'quarts',  'measure' => 4],
            4 => ['name' => 'gallons', 'measure' => 16],
        ];
    }

    $num1 = rand($numlimit1, $numlimit2);

    $q1 = rand(1, 4);
    $safety = 0;
    do {
        $q2 = rand(1, 4);
        $safety++;
        $gap = abs($q2 - $q1);
    } while ((($gap < $gapMin) || ($gap > $gapMax) || ($q2 === $q1)) && $safety < 60);

    $unit1Name = $unitPool[$q1]['name'];
    $measure1  = $unitPool[$q1]['measure'];
    $unit2Name = $unitPool[$q2]['name'];
    $measure2  = $unitPool[$q2]['measure'];

    $num2 = $num1 * $measure1 / $measure2;

    $k = rand(1, 2);

    if ($k === 1) {
        if ($num2 <= 1) $unit2Name = singular_unit($unit2Name);
        $askUnit   = $unit1Name;
        $givenNum  = $num2;
        $givenUnit = $unit2Name;
        $ans       = $num1;
    } else {
        if ($num1 <= 1) $unit1Name = singular_unit($unit1Name);
        $askUnit   = $unit2Name;
        $givenNum  = $num1;
        $givenUnit = $unit1Name;
        $ans       = $num2;
    }

    $ukunit = $askUnit;
    if ($ans <= 1) $ukunit = singular_unit($ukunit);

    $ansCanon    = canon_conv($ans);
    $distractors = ($type === 'Metric')
        ? make_metric_distractors($ans, 3)
        : make_english_distractors($ans, 3);

    $choices = array_merge([$ansCanon], $distractors);
    $choices = array_values(array_unique($choices));
    $d = 1;
    while (count($choices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $cv) {
            if ($cv > 0) {
                $cs = canon_conv($cv);
                if (!in_array($cs, $choices)) {
                    $choices[] = $cs;
                    if (count($choices) >= 4) break 2;
                }
            }
        }
        $d++;
    }
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'type'       => $type,
        'askUnit'    => $askUnit,
        'givenNum'   => $givenNum,
        'givenUnit'  => $givenUnit,
        'ans'        => $ans,
        'ans_canon'  => $ansCanon,
        'ukunit'     => $ukunit,
        'choices'    => $choices,
        'lvl'        => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; font-weight:700; color:#800080; margin-top:20px;">
        <?php
        $verb = ($cur['ans'] <= 1) ? 'There is' : 'There are';
        echo "$verb <strong style='color:#CC0066;'>" . canon_conv($cur['ans']) . " " . $cur['ukunit'] . "</strong>"
           . " in <strong style='color:#CC0066;'>" . canon_conv($cur['givenNum']) . " " . $cur['givenUnit'] . "</strong>.";
        ?>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:30px;">
        How many <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['askUnit']); ?></strong> are in<br>
        <strong style="color:#CC0066;"><?php echo htmlspecialchars(canon_conv($q['givenNum'])); ?> <?php echo htmlspecialchars($q['givenUnit']); ?></strong>?
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444; margin-top:20px;">
        Click on your answer.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:460px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:nowrap; padding:15px 20px; box-sizing:border-box; font-size:1.3rem;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">Select difficulty level for next question:</font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo $l; ?></b>
                    </font></font>
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