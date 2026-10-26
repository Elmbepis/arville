<?php
// math/modules/shape-area.php
// MULTIPLE CHOICE (4 choices). Areas of square/rectangle/triangle/circle.
// Uses ?ansclick=X pattern (colors.php style) + render_choices().
//
// Distractor logic (v2): all distractors (a) share the same last digit as
// the correct answer, and (b) are within ~5-40% of correct — cannot be
// eliminated by magnitude. Exceptions for small integer answers (< 20)
// where the last-digit constraint would force unrealistic jumps.
//
// Levels: Easy = legacy Easy, Hard = legacy Medium (§E).
// Theme: test14a-* is 136/547/136 — does not fit §C &#8594; paper-69-*.
//
// DB row required: modules.url = 'shape-area.php'

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

$moduleTitle = 'Areas of Shapes';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(3, (int)($_SESSION['grade'] ?? 3)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Canonical 2dp string (number_format handles float noise reliably)
function canon2dp($v) {
    $r = round((float)$v, 2);
    if ($r == (int)$r) return (string)(int)$r;
    return rtrim(rtrim(number_format($r, 2, '.', ''), '0'), '.');
}

// Distractor builder v2.
//   - Distractors share the correct answer's last digit (integer multiples of
//     $step preserve it: step=10 for ints, step=1 for half-int / 2dp values).
//   - Range: 5%-40% of correct on either side, so magnitudes are similar.
//   - Small-int exception: correct < 20 drops the last-digit rule; step=1.
function make_area_distractors($sh, $a, $b, $r, $correct, $n = 3) {
    $correctCanon = canon2dp($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    // Choose step that preserves last digit(s)
    $isInt = ($correct == (int)$correct);
    if ($isInt && $correct < 20) {
        $step = 1;              // small-int: relax (last-digit trick loses value)
    } elseif ($isInt) {
        $step = 10;             // preserve last digit
    } else {
        $step = 1;              // half-int (.5) or 2dp — integer offset preserves
    }

    // Percentage-based candidates &#8594; rounds to nearest step
    $pcts = [0.05, 0.10, 0.15, 0.20, 0.25, 0.30, 0.35, 0.40];
    $candidates = [];
    foreach ($pcts as $pct) {
        $off = (int)(round($correct * $pct / $step) * $step);
        if ($off < $step) $off = $step;
        $candidates[] = $correct + $off;
        $candidates[] = $correct - $off;
    }
    shuffle($candidates);

    foreach ($candidates as $c) {
        if ($c <= 0) continue;
        // Reject if too far (hard cap at ±60% — the percentage loop stays under)
        if ($c > $correct * 1.6 || $c < $correct * 0.4) continue;
        $cc = canon2dp($c);
        if (isset($seen[$cc])) continue;
        $seen[$cc] = true;
        $out[] = $cc;
        if (count($out) >= $n) break;
    }

    // Fallback: additional ±step increments (bounded)
    $extra = 2;
    while (count($out) < $n && $extra <= 20) {
        foreach ([$correct + $extra * $step, $correct - $extra * $step] as $c) {
            if ($c <= 0) continue;
            if ($c > $correct * 1.6 || $c < $correct * 0.4) continue;
            $cc = canon2dp($c);
            if (isset($seen[$cc])) continue;
            $seen[$cc] = true;
            $out[] = $cc;
            if (count($out) >= $n) break 2;
        }
        $extra++;
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
    $isCorrect = $scorer->processAnswer($clicked, $cur['ans_canon'], $cur['lvl']);

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
    // shlim caps shape: 1=square, 2=rectangle, 3=triangle, 4=circle
    $configs = [
        3 => [
            'Easy' => [2,  24, 2,  16, 2],
            'Hard' => [5,  30, 2,  16, 3],
        ],
        4 => [
            'Easy' => [6,  30, 2,  16, 3],
            'Hard' => [9,  40, 3,  16, 4],
        ],
        5 => [
            'Easy' => [5,  29, 3,  20, 4],
            'Hard' => [12, 45, 7,  30, 4],
        ],
        6 => [
            'Easy' => [12, 39, 10, 40, 4],
            'Hard' => [19, 59, 15, 50, 4],
        ],
    ];
    [$numlimit1, $numlimit2, $numlimit3, $numlimit4, $shlim] = $configs[$grd][$lvl];

    $facb = 0; $facr = 0;
    if ($lvl == 'Hard' && $grd > 3) {
        $facb = pow(10, -rand(1, 2)) * rand(1, 99);
        $facr = 0.1 * rand(0, 9);
    }

    // Pick shape (avoid immediate repeat)
    $lastSh = $_SESSION[$sessionKey]['last_sh'] ?? 0;
    $safety = 0;
    do {
        $sh = rand(1, $shlim);
        $safety++;
    } while ($sh == $lastSh && $safety < 30);   // §I
    $_SESSION[$sessionKey]['last_sh'] = $sh;

    // Pick 'a' (avoid last two values)
    $lasta  = $_SESSION[$sessionKey]['last_a']  ?? 0;
    $lasta2 = $_SESSION[$sessionKey]['last_a2'] ?? 0;
    $safety = 0;
    do {
        $a = rand($numlimit1, $numlimit2);
        $safety++;
    } while (($a == $lasta || $a == $lasta2) && $safety < 30);   // §I
    $_SESSION[$sessionKey]['last_a2'] = $lasta;
    $_SESSION[$sessionKey]['last_a']  = $a;

    // Pick 'b' (must differ from 'a')
    $safety = 0;
    do {
        $b = rand($numlimit1, $numlimit2) + $facb;
        $safety++;
    } while ($b == $a && $safety < 30);   // §I

    $r = rand($numlimit3, $numlimit4) + $facr;

    // Compute area
    if ($sh == 1)      $ans = $a * $a;
    elseif ($sh == 2)  $ans = $a * $b;
    elseif ($sh == 3)  $ans = ($a * $b) / 2;
    elseif ($sh == 4)  $ans = 3.14 * pow($r, 2);

    $ansCanon    = canon2dp($ans);
    $distractors = make_area_distractors($sh, $a, $b, $r, $ans, 3);

    $choices = array_merge([$ansCanon], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'sh'        => $sh,
        'a'         => $a,
        'b'         => $b,
        'r'         => $r,
        'ans'       => $ans,
        'ans_canon' => $ansCanon,
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
    $sh = $cur['sh']; $a = $cur['a']; $b = $cur['b']; $r = $cur['r'];
    $ansDisp = $cur['ans_canon'];
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer:
        <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?> sq.cm.</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php
    $areaDesc = '';
    if ($sh == 1)      $areaDesc = "square with a side<br/>of $a cm";
    elseif ($sh == 2)  $areaDesc = "rectangle with a side of $a cm and<br/>a side of $b cm";
    elseif ($sh == 3)  $areaDesc = "triangle with a base of $a cm and<br/>a height of $b cm";
    elseif ($sh == 4)  $areaDesc = "circle with a radius<br/>of $r cm";
    ?>
    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        <?php echo "The area of a $areaDesc is <strong style='color:#CC0066; font-size:16pt;'>$ansDisp sq.cm.</strong>"; ?>
    </p>
    <p style="font-size:13pt; color:#800080; margin-top:15px; line-height:1.6;">
        <?php
        if ($sh == 1) {
            echo "Area of a Square = side x side<br>= $a cm x $a cm = $ansDisp sq.cm.";
        } elseif ($sh == 2) {
            $length = max($a, $b); $width = min($a, $b);
            echo "Area of a Rectangle = length x width<br>= $length cm x $width cm = $ansDisp sq.cm.";
        } elseif ($sh == 3) {
            echo "Area of a Triangle = (base x height)/2<br>= ($a cm)($b cm)/2 = $ansDisp sq.cm.";
        } elseif ($sh == 4) {
            $rsq = canon2dp(pow($r, 2));
            echo "Area of a Circle = (pi)(r²)<br>= (3.14)($r cm)² = (3.14)($rsq) = $ansDisp sq.cm.";
        }
        ?>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <?php
    $sh = $q['sh']; $a = $q['a']; $b = $q['b']; $r = $q['r'];
    ?>
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:30px;">
        <?php
        if ($sh == 1) {
            echo "What is the area of a <strong>square</strong> if each of<br/>its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 2) {
            echo "What is the area of a <strong>rectangle</strong> if one side is<br/><span style='color:#CC0066;'>$a cm</span> and the other side is <span style='color:#CC0066;'>$b cm</span>?";
        } elseif ($sh == 3) {
            echo "What is the area of a <strong>triangle</strong> if its base is<br/><span style='color:#CC0066;'>$a cm</span> and its height is <span style='color:#CC0066;'>$b cm</span>?";
        } elseif ($sh == 4) {
            echo "What is the area of a <strong>circle</strong> if its<br/>radius is <span style='color:#CC0066;'>$r cm</span>? (Use pi = 3.14.)";
        }
        ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444444;">
        <br/>Click on your answer (in sq.cm.).<br/>
    </p>

    <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>

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