<?php
// math/modules/volume.php
// MULTIPLE CHOICE (4 choices). Volumes of cube/box/cylinder/sphere.
// Uses ?ansclick=X pattern + custom 2x2 grid (matches shape-area/perimeter layout).
//
// Distractor logic (multiplication &#8594; area-style):
//   - Integer answers (cube, box, most cylinder/sphere values):
//     distractors share the correct answer's last digit so the units-digit
//     trick doesn't help eliminate. Tight magnitude (1-9% spread for large,
//     5-30% for small values).
//   - Non-integer answers (some cylinder/sphere): small decimal deltas,
//     rounded to 3dp, no last-digit constraint (not meaningful).
//
// Levels: Easy = legacy Easy, Hard = legacy Medium (§E).
// Hard retains the legacy decimal-dimension feature (0.1 to 1 dp per side).
// Theme: test45b-* is 136/547/136 — does not fit §C &#8594; paper-69-*.
//
// DB row required: modules.url = 'volume.php'

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

$moduleTitle = 'Volumes of Common Solids';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(3, (int)($_SESSION['grade'] ?? 3)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Canonical 3dp string (sphere rounds to 3dp; other shapes &#8804;3dp naturally)
function fmt_vol($v) {
    $r = round((float)$v, 3);
    if (abs($r - (int)$r) < 0.0001) return (string)(int)$r;
    return rtrim(rtrim(number_format($r, 3, '.', ''), '0'), '.');
}

// Distractor builder — multiplication strategy (area-style).
function make_volume_distractors($correct, $n = 3) {
    $correctCanon = fmt_vol($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    $isInt = (abs($correct - round($correct)) < 0.0001);

    if ($isInt) {
        // Integer: step = 10 preserves last digit for larger values
        $step = ($correct >= 100) ? 10 : 1;

        // Percentage deltas tuned by magnitude
        if ($correct < 50)       $pcts = [0.05, 0.10, 0.15, 0.20, 0.25, 0.30];
        elseif ($correct < 200)  $pcts = [0.03, 0.05, 0.08, 0.10, 0.12, 0.15];
        elseif ($correct < 1000) $pcts = [0.02, 0.03, 0.05, 0.07, 0.09, 0.11];
        else                     $pcts = [0.01, 0.02, 0.03, 0.05, 0.07, 0.09];

        $deltas = [];
        foreach ($pcts as $pct) {
            $off = (int)(round($correct * $pct / $step) * $step);
            if ($off < $step) $off = $step;
            $deltas[] = $off;
        }
        $deltas = array_values(array_unique($deltas));
        shuffle($deltas);

        foreach ($deltas as $delta) {
            if (count($out) >= $n) break;
            $opts = [$correct + $delta, $correct - $delta];
            shuffle($opts);
            foreach ($opts as $cv) {
                if ($cv <= 0) continue;
                $cc = fmt_vol($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }

        // Fallback: extra step increments
        $extra = 2;
        while (count($out) < $n && $extra <= 50) {
            foreach ([$correct + $extra * $step, $correct - $extra * $step] as $cv) {
                if ($cv <= 0) continue;
                $cc = fmt_vol($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $extra++;
        }

        // Last resort: ±1, ±2, ±3, ...
        $d = 1;
        while (count($out) < $n && $d <= 100) {
            foreach ([$correct + $d, $correct - $d] as $cv) {
                if ($cv <= 0) continue;
                $cc = fmt_vol($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $d++;
        }
    } else {
        // Non-integer (cylinder/sphere): percentage-based decimal deltas
        $pcts = [0.005, 0.01, 0.02, 0.03, 0.05, 0.08, 0.12];
        $deltas = [];
        foreach ($pcts as $pct) {
            $deltas[] = max(0.001, round($correct * $pct, 3));
        }
        $deltas = array_values(array_unique($deltas));
        shuffle($deltas);

        foreach ($deltas as $delta) {
            if (count($out) >= $n) break;
            $opts = [$correct + $delta, $correct - $delta];
            shuffle($opts);
            foreach ($opts as $cv) {
                if ($cv <= 0) continue;
                $cc = fmt_vol($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }

        // Fallback
        $d = 0.001;
        while (count($out) < $n && $d <= 1) {
            foreach ([$correct + $d, $correct - $d] as $cv) {
                if ($cv <= 0) continue;
                $cc = fmt_vol($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $d += 0.001;
        }
    }

    return $out;
}

// ============================================================
// HANDLE ANSWER CLICK  (GET ?ansclick=X)
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer(fmt_vol($clicked), $cur['ans_canon'], $cur['lvl']);

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
    // Config: [numLimit1, numLimit2, numLimit3, numLimit4, shlim]
    // shlim: 2 = cube/box only; 4 = all shapes
    $configs = [
        3 => [
            'Easy' => [2, 15, 2, 10, 2],
            'Hard' => [4, 20, 2, 10, 2],
        ],
        4 => [
            'Easy' => [4, 19, 2, 12, 2],
            'Hard' => [8, 25, 6, 22, 2],
        ],
        5 => [
            'Easy' => [6, 19, 2, 12, 2],
            'Hard' => [9, 30, 6, 18, 4],
        ],
        6 => [
            'Easy' => [9, 25, 3, 12, 4],
            'Hard' => [15, 35, 7, 21, 4],
        ],
    ];
    [$numlimit1, $numlimit2, $numlimit3, $numlimit4, $shlim] = $configs[$grd][$lvl];

    // Hard: decimal dimensions (legacy Hard feature preserved)
    $faca = 0; $facb = 0; $fach = 0;
    if ($lvl == 'Hard') {
        if (rand(1,2) == 1) $faca = rand(1,9) * 0.1;
        if (rand(1,2) == 1) $facb = rand(1,9) * 0.1;
        if ($faca == 0 && $facb == 0) $fach = rand(1,9) * 0.1;
    }

    // Pick shape (avoid immediate repeat)
    $lastSh = $_SESSION[$sessionKey]['last_sh'] ?? 0;
    $safety = 0;
    do {
        $sh = rand(1, $shlim);
        $safety++;
    } while ($sh == $lastSh && $safety < 30);   // §I
    $_SESSION[$sessionKey]['last_sh'] = $sh;

    // Pick a (avoid last two values)
    $lasta  = $_SESSION[$sessionKey]['last_a']  ?? 0;
    $lasta2 = $_SESSION[$sessionKey]['last_a2'] ?? 0;
    $safety = 0;
    do {
        $a = rand($numlimit1, $numlimit2) + $faca;
        $safety++;
    } while (($a == $lasta || $a == $lasta2) && $safety < 30);   // §I
    $_SESSION[$sessionKey]['last_a2'] = $lasta;
    $_SESSION[$sessionKey]['last_a']  = $a;

    // Pick b < a
    $safety = 0;
    do {
        $b = rand($numlimit1, $numlimit2) + $facb;
        $safety++;
        if ($b >= $a && $safety < 30) {
            $a = rand($numlimit1, $numlimit2) + $faca;
            $b = rand($numlimit1, $numlimit2) + $facb;
        }
    } while ($b >= $a && $safety < 30);

    $h = rand($numlimit1, $numlimit2) + $fach;
    $r = rand($numlimit3, $numlimit4);

    // Compute answer + explanation
    if ($sh == 1) {
        $ans = $a * $a * $a;
        $exp = "Volume of a Cube = s<sup>3</sup><br/>= ($a cm)<sup>3</sup>= " . fmt_vol($ans) . " cu cm";
    } elseif ($sh == 2) {
        $ans = $a * $b * $h;
        $exp = "Volume of a Box = length x width x height<br/>= $a cm x $b cm x $h cm = " . fmt_vol($ans) . " cu cm";
    } elseif ($sh == 3) {
        $ans = 3.14 * pow($r, 2) * $h;
        $exp = "Volume of a Cylinder = (pi)(r<sup>2</sup>)(h)<br/>= (3.14)($r cm)<sup>2</sup>($h cm) = 3.14(" . pow($r,2) . " sq cm)($h cm) = " . fmt_vol($ans) . " cu cm";
    } else {
        $ans = 4.187 * pow($r, 3);
        $exp = "Volume of a Sphere = (4/3)(pi)(r<sup>3</sup>)<br/>= (4/3)(3.14)($r cm)<sup>3</sup>&#8776; 4.187(" . pow($r,3) . " cu cm) = " . fmt_vol($ans) . " cu cm";
    }

    $ansCanon    = fmt_vol($ans);
    $distractors = make_volume_distractors($ans, 3);

    $choices = array_merge([$ansCanon], $distractors);
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
    <?php
    $cur = $result['cur'];
    $sh = $cur['sh']; $a = $cur['a']; $b = $cur['b']; $h = $cur['h']; $r = $cur['r'];
    $ansDisp = $cur['ans_canon'];

    // Single-echo feedback sentence (avoids JS line-break insertion)
    if ($sh == 1)      $desc = "cube with<br/>a side of $a cm";
    elseif ($sh == 2)  $desc = "rectangular box with<br/>a length of $a cm, a width of $b cm, and<br/>a height of $h cm";
    elseif ($sh == 3)  $desc = "cylinder with a<br/>radius of $r cm and a height of<br/>$h cm";
    else               $desc = "sphere with<br/>a radius of $r cm";
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?> cu cm</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        <?php echo "The volume of a $desc is <strong style='color:#CC0066; font-size:16pt;'>$ansDisp cu cm</strong>."; ?>
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
            echo "What is the volume of a <strong>cube</strong><br/>if each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 2) {
            echo "What is the volume of a <strong>box</strong> or<br/><strong>rectangular solid</strong> if its length is <span style='color:#CC0066;'>$a cm</span>, its<br/>width is <span style='color:#CC0066;'>$b cm</span>, and its height is <span style='color:#CC0066;'>$h cm</span>?";
        } elseif ($sh == 3) {
            echo "What is the volume of a <strong>cylinder</strong> if<br/>its radius is <span style='color:#CC0066;'>$r cm</span> and its height is <span style='color:#CC0066;'>$h cm</span>?";
        } else {
            echo "What is the volume of a <strong>sphere</strong> if its radius is <span style='color:#CC0066;'>$r cm</span>?";
        }
        ?>
    </p>
    <?php if ($sh == 3): ?>
        <p style="font-size:12pt; color:#494949;">(Use pi = 3.14.)</p>
    <?php elseif ($sh == 4): ?>
        <p style="font-size:12pt; color:#494949;">(Use 4.187 for the value of 4/3 pi. Round off to 3 decimal places.)</p>
    <?php endif; ?>

    <p style="font-size:13pt; font-weight:500; color:#444444;">
        <br/>Click on your answer (in cu cm).<br/>
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:520px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div style="margin-top:20px;">
        <br/><input type="submit" name="Submit2" value="New Question">
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