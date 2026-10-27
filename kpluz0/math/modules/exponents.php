<?php
// math/modules/exponents.php
// MULTIPLE CHOICE (4 choices). Evaluating powers n^e.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: pedagogically-targeted traps —
//   1. n^(e-1)  — off-by-one exponent (common mistake)
//   2. n*e      — confused exponent with multiplication
//   3. arithmetic slip: correct ± small step
// All filtered to a wide band so magnitudes stay plausible. For grade 6
// Hard (= legacy Medium), bases become decimals (per legacy), and
// distractors fall back to decimal-scaled perturbations.
//
// Legacy: grades 4-6, 3 levels. New: 2 levels
//         (Easy = legacy Easy, Hard = legacy Medium, per §E).
// Theme: test23-* &#8594; paper-69-*.
// DB row required: modules.url = 'exponents.php'

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

$moduleTitle = 'Exponents';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function canon_exp($v) {
    $r = round((float)$v, 6);
    if (abs($r - round($r)) < 0.000001) return (string)(int)round($r);
    return rtrim(rtrim(number_format($r, 6, '.', ''), '0'), '.');
}

function make_exp_distractors($num, $exp, $correct, $n = 3) {
    $correctCanon = canon_exp($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    // Pedagogical candidates
    $cands = [];

    // 1. off-by-one exponent (n^(e-1))
    if ($exp > 1) {
        $cands[] = pow($num, $exp - 1);
    }
    // 2. confused with multiplication (n * e)
    $cands[] = $num * $exp;
    // 3. off-by-one exponent (n^(e+1)) — filtered by band
    if ($exp < 10) {
        $cands[] = pow($num, $exp + 1);
    }

    // Band: allow wide range so these stay candidates
    $min = $correct * 0.005;
    $max = $correct * 200;
    if ($correct < 0) { $min = $correct * 200; $max = $correct * 0.005; }

    foreach ($cands as $cv) {
        if ($cv <= 0) continue;
        if ($cv < $min || $cv > $max) continue;
        $cc = canon_exp($cv);
        if (isset($seen[$cc])) continue;
        $seen[$cc] = true;
        $out[] = $cc;
        if (count($out) >= $n) break;
    }

    // Arithmetic slips: adaptive step
    $isInt = (abs($correct - round($correct)) < 0.000001);
    if ($isInt) {
        $abs = abs((int)round($correct));
        if ($abs < 100)       $step = 1;
        elseif ($abs < 1000)  $step = 5;
        elseif ($abs < 10000) $step = 10;
        else                  $step = 100;

        $mults = [1, 2, 3, 5, 8];
        shuffle($mults);

        foreach ($mults as $m) {
            if (count($out) >= $n) break;
            $delta = $m * $step;
            foreach ([+$delta, -$delta] as $signed) {
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cc = canon_exp($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }
    } else {
        // Decimal base (grd 6 Hard)
        $dPcts = [0.05, 0.10, 0.20, 0.30];
        foreach ($dPcts as $p) {
            if (count($out) >= $n) break;
            $d = max(0.01, round($correct * $p, 4));
            foreach ([+$d, -$d] as $signed) {
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cc = canon_exp($cv);
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
                $cc = canon_exp($cv);
                if (!isset($seen[$cc])) {
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
    $isCorrect = $scorer->processAnswer(canon_exp($clicked), $cur['ans_canon'], $cur['lvl']);

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
    // [numlimit1, numlimit2, explimit1, explimit2, anslimit1, anslimit2]
    $configs = [
        4 => [
            'Easy' => [2,  20, 2, 5, 25,    9999],
            'Hard' => [3,  30, 2, 6, 700,   29999],   // legacy Medium
        ],
        5 => [
            'Easy' => [3,  30, 2, 5, 200,   9999],
            'Hard' => [4,  45, 3, 7, 2000,  99999],   // legacy Medium
        ],
        6 => [
            'Easy' => [4,  40, 3, 6, 1000,  49999],
            'Hard' => [5,  65, 3, 8, 5000,  499999],  // legacy Medium
        ],
    ];
    [$numlimit1, $numlimit2, $explimit1, $explimit2, $anslimit1, $anslimit2] = $configs[$grd][$lvl];

    // Repeat-prevention tracking
    if (!isset($_SESSION[$sessionKey]['used'])) $_SESSION[$sessionKey]['used'] = '';
    $safety = 0;
    do {
        $num = rand($numlimit1, $numlimit2);
        $exp = rand($explimit1, $explimit2);
        $ans = pow($num, $exp);

        $snum = $num < 10 ? "0$num" : (string)$num;
        $key  = "*{$snum}-{$exp}";
        $dup  = strpos($_SESSION[$sessionKey]['used'], $key) !== false;
        $safety++;
    } while (($dup || $ans < $anslimit1 || $ans > $anslimit2) && $safety < 100);

    $_SESSION[$sessionKey]['used'] = $_SESSION[$sessionKey]['used'] . $key;
    if (strlen($_SESSION[$sessionKey]['used']) > 50) {
        $_SESSION[$sessionKey]['used'] = substr($_SESSION[$sessionKey]['used'], -50);
    }

    // Grade 6 Hard (= legacy Medium grd 6): decimal base
    if ($lvl == 'Hard' && $grd == 6) {
        $safety = 0;
        do {
            $num = $num * 0.1;
            $safety++;
        } while (($num - floor($num)) == 0 && $safety < 20);
        $ans = pow($num, $exp);
    }

    $numDisp = (($num - floor($num)) != 0) ? "($num)" : $num;
    $question = "{$numDisp}^$exp = ?";

    // Build solution with explicit multiplication chain
    $chain = (string)$num;
    for ($i = 1; $i < $exp; $i++) $chain .= " x $num";
    $soln = "{$numDisp}^$exp<br>= $chain<br>= <strong>" . canon_exp($ans) . "</strong>";

    $ansCanon    = canon_exp($ans);
    $distractors = make_exp_distractors($num, $exp, $ans, 3);
    $choices     = array_merge([$ansCanon], $distractors);
    $choices     = array_values(array_unique($choices));
    $d = 1;
    while (count($choices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $cv) {
            $cs = canon_exp($cv);
            if ($cv > 0 && !in_array($cs, $choices)) {
                $choices[] = $cs;
                if (count($choices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'num'       => $num,
        'exp'       => $exp,
        'question'  => $question,
        'ans'       => $ans,
        'ans_canon' => $ansCanon,
        'soln'      => $soln,
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
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.7; text-align:center; max-width:520px;">
        <?php echo $cur['soln']; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <?php $numDisp = (($q['num'] - floor($q['num'])) != 0) ? "({$q['num']})" : $q['num']; ?>
    <p style="font-size:20pt; font-weight:700; color:#CC0066; margin:20px 0;">
        <?php echo $numDisp; ?><sup><?php echo $q['exp']; ?></sup> = ?
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444; margin-top:20px;">
        Click on your answer.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:400px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box; font-size:1.4rem;">
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