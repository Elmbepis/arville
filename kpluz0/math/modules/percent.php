<?php
// math/modules/percent.php
// MULTIPLE CHOICE (4 choices). Percentage, Base, and Rate.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic:
//   Form 1 & 3 (Percentage / Base): magnitude-scaled deltas around the
//     correct answer (5-20%). Forces correct computation, no size-elimination.
//   Form 2 (Rate): rate is always integer &#8594; integer deltas ±1, ±2, ±5, ±10,
//     ±15, ±20 (tight band). No "guess the biggest" shortcut.
//
// Legacy: grades 4-6, 3 levels. New: 2 levels
//         (Easy = legacy Easy, Hard = legacy Medium, per §E).
// Theme: test6-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'percent.php'

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

$moduleTitle = 'Percentage, Base, and Rate';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Canonical 4dp string (percent answers can have decimals)
function canon_pct($v) {
    $r = round((float)$v, 4);
    if (abs($r - round($r)) < 0.0001) return (string)(int)round($r);
    return rtrim(rtrim(number_format($r, 4, '.', ''), '0'), '.');
}

// Distractors for percentage or base answers — magnitude-scaled deltas.
function make_pct_distractors($correct, $n = 3) {
    $correctCanon = canon_pct($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    $isInt = (abs($correct - round($correct)) < 0.0001);

    if ($isInt) {
        $ic = (int)round($correct);
        if ($ic < 10)        $step = 1;
        elseif ($ic < 100)   $step = 1;
        elseif ($ic < 1000)  $step = 5;
        elseif ($ic < 10000) $step = 10;
        else                 $step = 100;

        $mults = [1, 2, 3, 4, 5, 6, 8, 10];
        shuffle($mults);

        foreach ($mults as $m) {
            if (count($out) >= $n) break;
            $delta = $m * $step;
            foreach ([+$delta, -$delta] as $signed) {
                $cv = $ic + $signed;
                if ($cv <= 0) continue;
                $cc = canon_pct($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }
    } else {
        // Percentage-based deltas for decimal answers
        $dPcts = [0.05, 0.10, 0.15, 0.20];
        $deltas = [];
        foreach ($dPcts as $p) {
            $d = max(0.01, round($correct * $p, 2));
            $deltas[] = $d;
        }
        $deltas = array_values(array_unique($deltas));
        shuffle($deltas);

        foreach ($deltas as $d) {
            if (count($out) >= $n) break;
            foreach ([+$d, -$d] as $signed) {
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cc = canon_pct($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }
    }

    // Fallback
    $d = 1;
    while (count($out) < $n) {
        foreach ([$correct + $d, $correct - $d] as $cv) {
            if ($cv > 0) {
                $cc = canon_pct($cv);
                if (!isset($seen[$cc])) { $seen[$cc] = true; $out[] = $cc; if (count($out) >= $n) break 2; }
            }
        }
        $d++;
    }

    return $out;
}

// Rate distractors — integer deltas (rate is always integer in this module).
function make_rate_distractors($rate, $n = 3) {
    $seen = [(string)$rate => true];
    $out  = [];
    $deltas = [1, 2, 3, 5, 8, 10, 15, 20];
    shuffle($deltas);

    foreach ($deltas as $d) {
        if (count($out) >= $n) break;
        foreach ([+$d, -$d] as $signed) {
            $cv = $rate + $signed;
            if ($cv <= 0) continue;
            if (isset($seen[(string)$cv])) continue;
            $seen[(string)$cv] = true;
            $out[] = (string)$cv;
            if (count($out) >= $n) break 2;
        }
    }

    // Fallback
    $d = 1;
    while (count($out) < $n) {
        foreach ([$rate + $d, $rate - $d] as $cv) {
            if ($cv > 0 && !isset($seen[(string)$cv])) {
                $seen[(string)$cv] = true; $out[] = (string)$cv;
                if (count($out) >= $n) break 2;
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
    $isCorrect = $scorer->processAnswer(canon_pct($clicked), $cur['ans_canon'], $cur['lvl']);

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
    // [numfac, numlimit1, numlimit2, percentmult1, percentmult2, percentfac]
    $configs = [
        4 => [
            'Easy' => [20, 1, 10, 1, 20, 5],
            'Hard' => [20, 5, 30, 1, 99, 1],
        ],
        5 => [
            'Easy' => [10, 1, 20, 1, 20, 5],
            'Hard' => [10, 5, 30, 1, 99, 1],
        ],
        6 => [
            'Easy' => [1, 11, 499, 11, 99, 1],
            'Hard' => [1, 249, 1199, 49, 249, 1],
        ],
    ];
    [$numfac, $numlimit1, $numlimit2, $percentmult1, $percentmult2, $percentfac] = $configs[$grd][$lvl];

    $bs = rand($numlimit1, $numlimit2) * $numfac;
    $rate = $percentfac * rand($percentmult1, $percentmult2);
    $perc = $bs * $rate * 0.01;

    // Form (1 = find percentage, 2 = find rate, 3 = find base)
    $form = rand(1, 3);

    if ($form == 1) {
        $question  = "$rate% of $bs = ?";
        $ans       = $perc;
        $ansUnit   = '';
        $solnHead  = "Percentage = Base x Rate";
        $solnCalc  = "$bs x $rate% = $bs x " . ($rate/100) . " = " . canon_pct($ans);
    } elseif ($form == 2) {
        $question  = "?% of $bs = " . canon_pct($perc);
        $ans       = $rate;
        $ansUnit   = '%';
        $solnHead  = "Rate = Percentage / Base";
        $solnCalc  = canon_pct($perc) . " / $bs = " . ($rate/100) . " = $rate%";
    } else {
        $question  = "$rate% of ? = " . canon_pct($perc);
        $ans       = $bs;
        $ansUnit   = '';
        $solnHead  = "Base = Percentage / Rate";
        $solnCalc  = canon_pct($perc) . " / $rate% = " . canon_pct($perc) . " / " . ($rate/100) . " = " . canon_pct($ans);
    }

    $ansCanon = canon_pct($ans);

    if ($form == 2) {
        $distractors = make_rate_distractors((int)round($ans), 3);
    } else {
        $distractors = make_pct_distractors($ans, 3);
    }
    $choices = array_merge([$ansCanon], $distractors);
    $choices = array_values(array_unique($choices));
    $d = 1;
    while (count($choices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $cv) {
            $cs = canon_pct($cv);
            if ($cv > 0 && !in_array($cs, $choices)) {
                $choices[] = $cs;
                if (count($choices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($choices);

    $soln = "$solnHead<br>= $solnCalc";

    $_SESSION[$sessionKey]['current'] = [
        'question'  => $question,
        'ans'       => $ans,
        'ans_canon' => $ansCanon,
        'ans_unit'  => $ansUnit,
        'soln'      => $soln,
        'form'      => $form,
        'choices'   => $choices,
        'lvl'       => $lvl,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' : Level ' . $grd . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked'] . $cur['ans_unit']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.6; text-align:center; max-width:520px;">
        <?php echo $cur['soln']; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:20pt; font-weight:700; color:#800080; margin-top:30px; line-height:1.3;">
        <?php echo $q['question']; ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444; margin-top:20px;">
        Click on your answer<?php echo $q['ans_unit'] ? ' (with % included)' : ''; ?>.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:400px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box;">
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