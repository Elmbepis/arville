<?php
// math/modules/shape-perimeter.php
// MULTIPLE CHOICE (4 choices). Perimeter / circumference, 13 shape types.
// Uses ?ansclick=X pattern + render_choices().
//
// Distractor logic (v2): perimeter is addition, so the last digit of the
// answer is a reliable mental check (sum of units digits mod 10). To make
// that check diagnostic, all four choices carry DISTINCT last digits —
// student who sums units correctly can eliminate three of them. Meanwhile
// values stay tightly clustered (2-15% spread) so magnitude alone cannot
// eliminate choices.
//
// Non-integer answers (circles with non-integer circumference) use small
// decimal deltas instead, since "last digit" is not meaningful there.
//
// Levels: Easy = legacy Easy, Hard = legacy Medium (§E).
// Theme: test14b-* is 136/547/136 — does not fit §C &#8594; paper-69-*.
//
// DB row required: modules.url = 'shape-perimeter.php'

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

$moduleTitle = 'Perimeter and Circumference';
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

// Distractor builder v2 — unique last digits + tight magnitudes.
//   - Integer answers: pick 3 distractors with distinct last digits
//     (different from correct and each other). Deltas scaled by magnitude
//     (2-15%) for close clustering.
//   - Non-integer answers: small decimal deltas, no last-digit constraint.
function make_perimeter_distractors($correct, $n = 3) {
    $correctCanon = canon2dp($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    $isInt = (abs($correct - round($correct)) < 0.0001);

    if (!$isInt) {
        // Non-integer: small decimal deltas
        $deltas = [0.1, 0.2, 0.3, 0.5, 0.8, 1.0, 1.5, 2.0, 3.0];
        shuffle($deltas);
        foreach ($deltas as $d) {
            foreach ([+$d, -$d] as $signed) {
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cc = canon2dp($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) return $out;
            }
        }
        return $out;
    }

    // Integer case — unique last digits + magnitude-scaled deltas
    $correctLastDigit = ((int)round($correct)) % 10;
    $usedLastDigits = [$correctLastDigit => true];

    if ($correct < 30) {
        $deltaPcts = [0.05, 0.10, 0.15, 0.20, 0.25];
    } elseif ($correct < 100) {
        $deltaPcts = [0.03, 0.05, 0.08, 0.10, 0.12];
    } elseif ($correct < 500) {
        $deltaPcts = [0.02, 0.03, 0.05, 0.07, 0.09];
    } else {
        $deltaPcts = [0.01, 0.02, 0.03, 0.05, 0.07];
    }

    $deltas = [];
    foreach ($deltaPcts as $pct) {
        $deltas[] = max(1, (int)round($correct * $pct));
    }
    $deltas = array_values(array_unique($deltas));
    shuffle($deltas);

    foreach ($deltas as $targetDelta) {
        if (count($out) >= $n) break;
        // Try target delta, then widen by ±1..5 to land on a unique last digit
        for ($adj = 0; $adj <= 5; $adj++) {
            $signedOptions = ($adj == 0)
                ? [+$targetDelta, -$targetDelta]
                : [+($targetDelta + $adj), -($targetDelta + $adj),
                   +($targetDelta - $adj), -($targetDelta - $adj)];
            shuffle($signedOptions);
            $found = false;
            foreach ($signedOptions as $signed) {
                if ($signed == 0) continue;
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cd = ((int)round($cv)) % 10;
                if (isset($usedLastDigits[$cd])) continue;
                $cc = canon2dp($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $usedLastDigits[$cd] = true;
                $out[] = $cc;
                $found = true;
                break;
            }
            if ($found) break;
        }
    }

    // Fallback — expanding deltas from 1 upward
    $d = 1;
    while (count($out) < $n && $d <= $correct) {
        foreach ([+$d, -$d] as $signed) {
            $cv = $correct + $signed;
            if ($cv <= 0) continue;
            $cd = ((int)round($cv)) % 10;
            if (isset($usedLastDigits[$cd])) continue;
            $cc = canon2dp($cv);
            if (isset($seen[$cc])) continue;
            $seen[$cc] = true;
            $usedLastDigits[$cd] = true;
            $out[] = $cc;
            if (count($out) >= $n) break 2;
        }
        $d++;
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
    // Config: [numLimit1, numLimit2, numLimit3, numLimit4, shlim]
    $configs = [
        3 => [
            'Easy' => [3, 16, 1, 10, 3],
            'Hard' => [6, 35, 1, 10, 8],
        ],
        4 => [
            'Easy' => [5, 25, 3, 20, 3],
            'Hard' => [11, 59, 3, 25, 8],
        ],
        5 => [
            'Easy' => [7, 49, 5, 25, 8],
            'Hard' => [15, 99, 9, 39, 10],
        ],
        6 => [
            'Easy' => [21, 199, 10, 50, 10],
            'Hard' => [29, 149, 25, 75, 13],
        ],
    ];
    [$numlimit1, $numlimit2, $numlimit3, $numlimit4, $shlim] = $configs[$grd][$lvl];

    $sh = rand(1, $shlim);

    $faca = 0; $facb = 0; $facc = 0; $facf = 0; $facg = 0; $facr = 0;
    if (($grd == 4 && $lvl == 'Hard') || ($grd > 4 && $lvl == 'Hard')) {
        $faca = pow(10, -rand(1, 2)) * rand(1, 99);
        $facb = pow(10, -rand(1, 2)) * rand(1, 99);
        $facc = pow(10, -rand(1, 2)) * rand(1, 99);
        $facf = pow(10, -rand(1, 2)) * rand(1, 99);
        $facg = pow(10, -rand(1, 2)) * rand(1, 99);
        $facr = 0.1 * rand(0, 9);
    }

    $a = rand($numlimit1, $numlimit2) + $faca;
    $safety = 0;
    do {
        $b = rand($numlimit1, $numlimit2) + $facb;
        $safety++;
    } while ($a == $b && $safety < 30);   // §I
    $c = rand($numlimit1, $numlimit2) + $facc;
    $r = rand($numlimit3, $numlimit4) + $facr;

    $f = 0; $g = 0;
    if ($sh == 13) {
        $safety = 0;
        if ($a < $b) {
            do {
                $f = rand($numlimit1 - 15, max($numlimit1 - 15, $a - 8)) + $facf;
                $g = rand($numlimit1 - 15, max($numlimit1 - 15, $a - 8)) + $facg;
                $safety++;
            } while (($a + $f + $g) <= $b && $safety < 50);   // §I
        } else {
            do {
                $f = rand($numlimit1 - 15, max($numlimit1 - 15, $b - 8)) + $facf;
                $g = rand($numlimit1 - 15, max($numlimit1 - 15, $b - 8)) + $facg;
                $safety++;
            } while (($b + $f + $g) <= $a && $safety < 50);   // §I
        }
    }

    if ($sh == 3) {
        $safety = 0;
        do {
            $a = rand($numlimit1, $numlimit2) + $faca;
            $b = rand($numlimit1, $numlimit2) + $facb;
            $c = rand($numlimit1, $numlimit2) + $facc;
            $safety++;
        } while (($c >= $a + $b || $a >= $b + $c || $b >= $a + $c) && $safety < 100);   // §I
    }

    // Compute answer
    $ans = 0;
    if ($sh == 1)      $ans = $a * 4;
    elseif ($sh == 2)  $ans = $a + $a + $b + $b;
    elseif ($sh == 3)  $ans = $a + $b + $c;
    elseif ($sh == 4)  $ans = 3.14 * 2 * $r;
    elseif ($sh == 5)  $ans = $a * 5;
    elseif ($sh == 6)  $ans = $a * 6;
    elseif ($sh == 7)  $ans = $a * 7;
    elseif ($sh == 8)  $ans = $a * 8;
    elseif ($sh == 9)  $ans = $a * 9;
    elseif ($sh == 10) $ans = $a * 10;
    elseif ($sh == 11) $ans = $a * 11;
    elseif ($sh == 12) $ans = $a * 12;
    elseif ($sh == 13) $ans = $a + $b + $f + $g;

    $ansCanon    = canon2dp($ans);
    $distractors = make_perimeter_distractors($ans, 3);

    $choices = array_merge([$ansCanon], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'sh'        => $sh,
        'a'         => $a,
        'b'         => $b,
        'c'         => $c,
        'f'         => $f,
        'g'         => $g,
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
    $sh = $cur['sh']; $a = $cur['a']; $b = $cur['b']; $c = $cur['c']; $r = $cur['r'];
    $f = $cur['f']; $g = $cur['g'];
    $ansDisp = $cur['ans_canon'];
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?> cm</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        <?php
        if ($sh == 1)      echo "The perimeter of a square with a side<br/> of $a cm is ";
        elseif ($sh == 2)  echo "The perimeter of a rectangle with a side<br/> of $a cm and a side of $b cm is ";
        elseif ($sh == 3)  echo "The perimeter of a triangle with sides<br/> of $a cm, $b cm, and $c cm is ";
        elseif ($sh == 4)  echo "The circumference of a circle with<br/> a radius of $r cm is ";
        elseif ($sh == 5)  echo "The perimeter of a pentagon with each<br/>of its 5 sides equal to $a cm is ";
        elseif ($sh == 6)  echo "The perimeter of a hexagon with each<br/>of its 6 sides equal to $a cm is ";
        elseif ($sh == 7)  echo "The perimeter of a heptagon with each<br/>of its 7 sides equal to $a cm is ";
        elseif ($sh == 8)  echo "The perimeter of an octagon with each<br/>of its 8 sides equal to $a cm is ";
        elseif ($sh == 9)  echo "The perimeter of a nonagon with each<br/>of its 9 sides equal to $a cm is ";
        elseif ($sh == 10) echo "The perimeter of a decagon with each<br/>of its 10 sides equal to $a cm is ";
        elseif ($sh == 11) echo "The perimeter of a hendecagon with each<br/>of its 11 sides equal to $a cm is ";
        elseif ($sh == 12) echo "The perimeter of a dodecagon with each<br/>of its 12 sides equal to $a cm is ";
        elseif ($sh == 13) echo "The perimeter of a trapezoid whose sides<br/> have lengths $a cm, $b cm, $f cm, and $g cm is ";
        ?>
        <strong style="color:#CC0066; font-size:16pt;"><?php echo $ansDisp; ?> cm</strong>.
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <?php
    $sh = $q['sh']; $a = $q['a']; $b = $q['b']; $c = $q['c']; $r = $q['r'];
    $f = $q['f']; $g = $q['g'];
    ?>
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:30px;">
        <?php
        if ($sh == 1) {
            echo "What is the perimeter of a <strong>square</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 2) {
            echo "What is the perimeter of a <strong>rectangle</strong> if<br/>one side is <span style='color:#CC0066;'>$a cm</span> and the other side is <span style='color:#CC0066;'>$b cm</span>?";
        } elseif ($sh == 3) {
            echo "What is the perimeter of a <strong>triangle</strong> if<br/>its sides are <span style='color:#CC0066;'>$a cm, $b cm, and $c cm</span>?";
        } elseif ($sh == 4) {
            echo "What is the <strong>circumference of a circle</strong> if<br/>its radius is <span style='color:#CC0066;'>$r cm</span>? (Use pi = 3.14.)";
        } elseif ($sh == 5) {
            echo "What is the perimeter of a <strong>pentagon</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 6) {
            echo "What is the perimeter of a <strong>hexagon</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 7) {
            echo "What is the perimeter of a <strong>heptagon</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 8) {
            echo "What is the perimeter of an <strong>octagon</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 9) {
            echo "What is the perimeter of a <strong>nonagon</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 10) {
            echo "What is the perimeter of a <strong>decagon</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 11) {
            echo "What is the perimeter of a <strong>hendecagon</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 12) {
            echo "What is the perimeter of a <strong>dodecagon</strong> if<br/>each of its sides is <span style='color:#CC0066;'>$a cm</span>?";
        } elseif ($sh == 13) {
            echo "What is the perimeter of a <strong>trapezoid</strong> if<br/>the lengths of its sides are <span style='color:#CC0066;'>$a cm, $b cm, $f cm, and $g cm</span>?";
        }
        ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444444;">
        <br/>Click on your answer (in cm).<br/>
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