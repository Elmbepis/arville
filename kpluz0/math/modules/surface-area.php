<?php
// math/modules/surface-area.php
// MULTIPLE CHOICE (4 choices). Surface area of cube/box/pyramid/cylinder/sphere.
// Uses ?ansclick + 2x2 grid.
//
// Distractor logic (multiplication &#8594; same-last-digit for ints):
//   - Integer answers: last digit preserved (step=10 for ints >= 100, step=1 otherwise)
//   - Decimal answers (cylinder/sphere): small decimal deltas
//   Range: 5-40% of correct on either side.
//
// Levels: Easy = legacy Easy, Hard = legacy Medium (§E).
// Theme: testq28-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'surface-area.php'

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

$moduleTitle = 'Surface Areas of Solids';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function canon_sa($v) {
    $r = round((float)$v, 2);
    if ($r == (int)$r) return (string)(int)$r;
    return rtrim(rtrim(number_format($r, 2, '.', ''), '0'), '.');
}

// Distractor builder — same-last-digit strategy for ints (multiplication)
function make_sa_distractors($correct, $n = 3) {
    $correctCanon = canon_sa($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    $isInt = (abs($correct - round($correct)) < 0.0001);

    if ($isInt) {
        $ic = (int)round($correct);
        if ($ic < 10)        $step = 1;
        elseif ($ic < 100)   $step = 1;
        elseif ($ic < 1000)  $step = 10;
        elseif ($ic < 10000) $step = 100;
        else                 $step = 1000;

        if ($ic < 50)        $pcts = [0.05, 0.10, 0.15, 0.20, 0.25, 0.30];
        elseif ($ic < 200)   $pcts = [0.03, 0.05, 0.08, 0.10, 0.12, 0.15];
        elseif ($ic < 1000)  $pcts = [0.02, 0.03, 0.05, 0.07, 0.09, 0.11];
        else                 $pcts = [0.01, 0.02, 0.03, 0.05, 0.07, 0.09];

        $deltas = [];
        foreach ($pcts as $pct) {
            $off = (int)(round($ic * $pct / $step) * $step);
            if ($off < $step) $off = $step;
            $deltas[] = $off;
        }
        $deltas = array_values(array_unique($deltas));
        shuffle($deltas);

        foreach ($deltas as $delta) {
            if (count($out) >= $n) break;
            foreach ([$ic + $delta, $ic - $delta] as $cv) {
                if ($cv <= 0) continue;
                $cc = canon_sa($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }

        $extra = 2;
        while (count($out) < $n && $extra <= 50) {
            foreach ([$ic + $extra * $step, $ic - $extra * $step] as $cv) {
                if ($cv <= 0) continue;
                $cc = canon_sa($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $extra++;
        }
    } else {
        // Decimal — percentage-based deltas
        $pcts = [0.005, 0.01, 0.02, 0.03, 0.05, 0.08];
        $deltas = [];
        foreach ($pcts as $pct) {
            $deltas[] = max(0.01, round($correct * $pct, 2));
        }
        $deltas = array_values(array_unique($deltas));
        shuffle($deltas);

        foreach ($deltas as $delta) {
            if (count($out) >= $n) break;
            foreach ([$correct + $delta, $correct - $delta] as $cv) {
                if ($cv <= 0) continue;
                $cc = canon_sa($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }
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
    $isCorrect = $scorer->processAnswer(canon_sa($clicked), $cur['ans_canon'], $cur['lvl']);

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
    // [numLimit1, numLimit2, numLimit3, numLimit4, shlim]
    $configs = [
        4 => [
            'Easy' => [3,  20, 2,  20, 2],
            'Hard' => [7,  26, 2,  20, 3],   // legacy Medium
        ],
        5 => [
            'Easy' => [8,  25, 5,  20, 2],
            'Hard' => [12, 29, 5,  20, 5],   // legacy Medium
        ],
        6 => [
            'Easy' => [12, 39, 8,  24, 5],
            'Hard' => [19, 59, 12, 45, 5],   // legacy Medium
        ],
    ];
    [$numlimit1, $numlimit2, $numlimit3, $numlimit4, $shlim] = $configs[$grd][$lvl];

    $sh = rand(1, $shlim);
    $lastSh = $_SESSION[$sessionKey]['last_sh'] ?? 0;
    $safety = 0;
    do {
        $sh = rand(1, $shlim);
        $safety++;
    } while ($sh == $lastSh && $safety < 30);
    $_SESSION[$sessionKey]['last_sh'] = $sh;

    if ($sh == 1) {
        $a = rand($numlimit1, $numlimit2) + (rand(1,9) * 0.1);
    } else {
        $a = rand($numlimit1, $numlimit2);
    }

    $lasta  = $_SESSION[$sessionKey]['last_a']  ?? 0;
    $lasta2 = $_SESSION[$sessionKey]['last_a2'] ?? 0;
    $safety = 0;
    do {
        $a = ($sh == 1) ? rand($numlimit1, $numlimit2) + (rand(1,9) * 0.1) : rand($numlimit1, $numlimit2);
        $safety++;
    } while (($a == $lasta || $a == $lasta2) && $safety < 30);
    $_SESSION[$sessionKey]['last_a2'] = $lasta;
    $_SESSION[$sessionKey]['last_a']  = $a;

    $b = rand($numlimit1, $numlimit2);
    $h = rand($numlimit1, $numlimit2);
    $r = rand($numlimit3, $numlimit4);

    // Compute answer + explanation
    if ($sh == 1) {
        $ans = 6 * $a * $a;
        $exp = "Surface Area of a Cube = 6s<sup>2</sup><br>= 6($a cm)<sup>2</sup> = 6(" . canon_sa(pow($a,2)) . " sqcm) = " . canon_sa($ans) . " sqcm";
    } elseif ($sh == 2) {
        $ans = 2 * ($a*$b + $a*$h + $b*$h);
        $exp = "Surface Area of a Box = 2(ab + bc + ac)<br>= 2(" . ($a*$b) . " sqcm + " . ($b*$h) . " sqcm + " . ($a*$h) . " sqcm) = " . canon_sa($ans) . " sqcm";
    } elseif ($sh == 3) {
        $ans = ($a*$a) + (2*$a*$h);
        $exp = "Surface Area of a Square Pyramid = a<sup>2</sup> + 2ah<br>= ($a cm)<sup>2</sup> + 2($a cm)($h cm) = " . canon_sa(pow($a,2)) . " sqcm + " . canon_sa(2*$a*$h) . " sqcm = " . canon_sa($ans) . " sqcm";
    } elseif ($sh == 4) {
        $ans = (2*3.14*pow($r,2)) + (2*3.14*$r*$h);
        $exp = "Surface Area of a Cylinder = 2(pi)(r<sup>2</sup> + rh)<br>= 2(3.14)(($r cm)<sup>2</sup> + ($r cm)($h cm)) = 6.28(" . canon_sa(pow($r,2)) . " sqcm + " . canon_sa($r*$h) . " sqcm) = " . canon_sa($ans) . " sqcm";
    } else {
        $ans = 4*3.14*pow($r,2);
        $exp = "Surface Area of a Sphere = 4(pi)(r<sup>2</sup>)<br>= 4(3.14)($r cm)<sup>2</sup> = 12.56(" . canon_sa(pow($r,2)) . " sqcm) = " . canon_sa($ans) . " sqcm";
    }

    $ansCanon    = canon_sa($ans);
    $distractors = make_sa_distractors($ans, 3);
    $choices     = array_merge([$ansCanon], $distractors);
    $choices     = array_values(array_unique($choices));
    $d = 1;
    while (count($choices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $cv) {
            $cs = canon_sa($cv);
            if ($cv > 0 && !in_array($cs, $choices)) {
                $choices[] = $cs;
                if (count($choices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'sh'        => $sh,
        'a'         => $a,
        'b'         => $b,
        'h'         => $h,
        'r'         => $r,
        'ans'       => $ans,
        'ans_canon' => $ansCanon,
        'exp'       => $exp,
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
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?> sq.cm.</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php
    $sh = $cur['sh']; $a = $cur['a']; $b = $cur['b']; $h = $cur['h']; $r = $cur['r'];
    if ($sh == 1)      $desc = "cube with a side of $a cm";
    elseif ($sh == 2)  $desc = "rectangular box with a length of $a cm, a width of $b cm, and a height of $h cm";
    elseif ($sh == 3)  $desc = "square pyramid with a base side of $a cm and a slant height of $h cm";
    elseif ($sh == 4)  $desc = "cylinder with a radius of $r cm and a height of $h cm";
    else               $desc = "sphere with a radius of $r cm";
    ?>
    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        The surface area of a <?php echo $desc; ?> is <strong style="color:#CC0066; font-size:16pt;"><?php echo $cur['ans_canon']; ?> sq.cm.</strong>
    </p>
    <p style="font-size:13pt; color:#800080; margin-top:15px; line-height:1.6;">
        <?php echo $cur['exp']; ?>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <?php
    $sh = $q['sh']; $a = $q['a']; $b = $q['b']; $h = $q['h']; $r = $q['r'];
    ?>
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:30px;">
        <?php
        if ($sh == 1) {
            echo "What is the surface area of a <strong>cube</strong><br/>if each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 2) {
            echo "What is the surface area of a <strong>box</strong> or<br/><strong>rectangular solid</strong> if its length is <span style='color:#CC0066;'>$a cm</span>, its<br/>width is <span style='color:#CC0066;'>$b cm</span>, and its height is <span style='color:#CC0066;'>$h cm</span>?";
        } elseif ($sh == 3) {
            echo "What is the surface area of a <strong>square pyramid</strong><br/>if each side of its base is <span style='color:#CC0066;'>$a cm</span><br/>and its slant height is <span style='color:#CC0066;'>$h cm</span>?";
        } elseif ($sh == 4) {
            echo "What is the surface area of a <strong>cylinder</strong> if<br/>its radius is <span style='color:#CC0066;'>$r cm</span> and its height is <span style='color:#CC0066;'>$h cm</span>?<br/>(Use pi = 3.14.)";
        } else {
            echo "What is the surface area of a <strong>sphere</strong> if its<br/>radius is <span style='color:#CC0066;'>$r cm</span>? (Use pi = 3.14.)";
        }
        ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444444; margin-top:15px;">
        Click on your answer (in sq.cm.).
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:480px; margin:20px auto;">
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