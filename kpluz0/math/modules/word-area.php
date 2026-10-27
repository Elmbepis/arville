<?php
// math/modules/word-area.php
// MULTIPLE CHOICE (4 choices). Word problems: areas of polygons.
// Single-level (Easy). Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic (area = multiplication &#8594; same-last-digit strategy):
//   All distractors preserve the answer's last digit (for ints), so students
//   must actually multiply rather than eliminate by units-digit reasoning.
//   Tight magnitudes prevent "obviously too big/small" elimination.
//
// FIX #1: legacy tolerance compare &#8594; canonical 2dp string compare.
// FIX #2: division/multiplication symbols &#8594; ASCII / and x.
// FIX #3: qopt 3 solution "ml/sq" typo &#8594; proper dimensional reasoning.
// Theme: wquiz-15-* (frame matches word-quantities).
// DB row required: modules.url = 'word-area.php'

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

$moduleTitle = 'Word Problems Involving<br/>Areas of Polygons';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';
$grd         = min(6, max(0, (int)($_SESSION['grade'] ?? 0)));

function canon_area($v) {
    $r = round((float)$v, 2);
    return ($r == (int)$r) ? (string)(int)$r : (string)$r;
}

// Area distractors: same last digit (multiplication), tight magnitudes.
function make_area_distractors($correct, $n = 3) {
    $correctCanon = canon_area($correct);
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
                $cc = canon_area($cv);
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
                $cc = canon_area($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $extra++;
        }

        $d = 1;
        while (count($out) < $n && $d <= 100) {
            foreach ([$ic + $d, $ic - $d] as $cv) {
                if ($cv <= 0) continue;
                $cc = canon_area($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $d++;
        }
    } else {
        // Decimal answer: percentage-scaled decimal deltas
        $pcts = [0.005, 0.01, 0.02, 0.03, 0.05, 0.08, 0.12];
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
                $cc = canon_area($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }

        $d = 0.01;
        while (count($out) < $n && $d <= 1) {
            foreach ([$correct + $d, $correct - $d] as $cv) {
                if ($cv <= 0) continue;
                $cc = canon_area($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $d += 0.01;
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
    $isCorrect = $scorer->processAnswer(canon_area($clicked), $cur['ans_canon'], $lvl);

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
    $boys  = ['Alfred','Ben','Carlo','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lito','Mario','Roberto','Samuel','Tommy'];
    $girls = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];

    $boy  = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];
    $s = 0; do { $boy2 = $boys[array_rand($boys)]; $s++; } while ($boy2 === $boy && $s < 20);
    $s = 0; do { $girl2 = $girls[array_rand($girls)]; $s++; } while ($girl2 === $girl && $s < 20);

    $useGirl = (rand(1,2) === 1);
    $name = $useGirl ? $girl : $boy;
    $p1   = $useGirl ? 'she' : 'he';
    $p2   = $useGirl ? 'her' : 'his';

    // Grade 3: qopt 1-2 only. Grade 4+: all 4.
    if ($grd <= 3) {
        $qopt = rand(1, 2);
    } else {
        $qopt = rand(1, 4);
    }

    $question = ''; $soln = ''; $ans = 0; $unit = '';

    if ($qopt === 1) {
        // Square
        $s = rand(25, 50);
        $qnum = rand(1, 2);
        if ($qnum === 1) {
            $objs = ['playground', 'garden', 'quadrangle', 'baseball field'];
            $obj = $objs[array_rand($objs)];
            $question = "The $obj in $name's school is square in shape. If each of its sides is $s meters long, what is its total area?";
            $ans  = $s * $s;
            $soln = "area of a square = product of its sides<br/>"
                  . "area of $obj = $s m x $s m = $ans sq meters";
            $unit = 'sq meters';
        } else {
            $num = rand(2, 4);
            $question = "$boy has a square farm that measures $s meters long on each side. He was able to plant an average of $num plants per sq meter of the farm. How many plants did he plant in his farm all in all?";
            $ans  = $s * $s * $num;
            $soln = "area of a square = product of its sides<br/>"
                  . "area of farm = $s m x $s m = " . ($s*$s) . " sq meters<br/>"
                  . "# of plants = " . ($s*$s) . " sq m x $num plants/sq m = $ans plants";
            $unit = 'plants';
        }

    } elseif ($qopt === 2) {
        // Rectangle
        $qnum = rand(1, 2);
        if ($qnum === 1) {
            $l = rand(48, 84);
            $safety = 0;
            do { $w = rand(36, 60); $safety++; } while ($w >= $l && $safety < 30);
            $objs = ['sign', 'billboard', 'gate'];
            $obj = $objs[array_rand($objs)];
            $question = "$boy constructed a rectangular $obj. If the $obj's length is $l inches and its width is $w inches, what is its total area?";
            $ans  = $l * $w;
            $soln = "area of a rectangle = product of its sides<br/>"
                  . "area of $obj = $l in x $w in = $ans sq inches";
            $unit = 'sq inches';
        } else {
            $l = rand(25, 50);
            $safety = 0;
            do { $w = rand(15, 40); $safety++; } while ($w >= $l && $safety < 30);
            $num = rand(10, 30);
            $question = "$name owns a rectangular fish pen that measures $l meters by $w meters. If $p1 put an average of $num fingerlings per sq meter of surface area into $p2 fish pen, how many fingerlings did $p1 put in $p2 fish pen all in all?";
            $ans  = $l * $w * $num;
            $soln = "area of a rectangle = product of its sides<br/>"
                  . "area of fish pen = $l m x $w m = " . ($l*$w) . " sq meters<br/>"
                  . "# of fingerlings = " . ($l*$w) . " sq m x $num fingerlings/sq m = $ans fingerlings";
            $unit = 'fingerlings';
        }

    } elseif ($qopt === 3) {
        // Triangle
        $b = rand(48, 84);
        $safety = 0;
        do { $h = rand(36, 60); $safety++; } while ($h >= $b && $safety < 30);
        $num = rand(50, 100);
        $objs = ['sign', 'billboard', 'board'];
        $obj = $objs[array_rand($objs)];
        $question = "$name painted a triangular $obj that has a base of $b feet and a height of $h feet. If $name used $num ml of paint per sq foot of the $obj, how many liters of paint did $p1 use all in all?";
        $ans  = round($b * $h / 2 * $num / 1000, 2);
        $soln = "area of a triangle = 1/2 x base x height<br/>"
              . "area of $obj = 1/2 x $b ft x $h ft = " . ($b*$h/2) . " sq ft<br/>"
              . "liters of paint used = " . ($b*$h/2) . " sq ft x $num ml/sq ft / 1000 ml/L<br/>"
              . "= " . ($b*$h/2) . " sq ft x " . ($num/1000) . " liters/sq ft = $ans liters";
        $unit = 'liters';

    } else {
        // Trapezoid
        $b1 = rand(21, 29);
        $safety = 0;
        do { $b2 = rand(14, 24); $safety++; } while ($b2 >= $b1 && $safety < 30);
        $h = rand(11, 19);
        $question = "$name bought a trapezoidal lot. The lengths of its parallel sides are $b1 meters and $b2 meters. The perpendicular distance between these parallel sides is $h meters. What is the area of the lot?";
        $ans  = round(($b1 + $b2) / 2 * $h, 2);
        $soln = "area of a trapezoid = (base1 + base2)/2 x height<br/>"
              . "= ($b1 m + $b2 m)/2 x $h m<br/>"
              . "= " . (($b1+$b2)/2) . " m x $h m = $ans sq meters";
        $unit = 'sq meters';
    }

    $ansCanon    = canon_area($ans);
    $distractors = make_area_distractors($ans, 3);
    $choices     = array_merge([$ansCanon], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'ans'       => $ans,
        'ans_canon' => $ansCanon,
        'question'  => $question,
        'soln'      => $soln,
        'unit'      => $unit,
        'choices'   => $choices,
        'lvl'       => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/wquiz-15-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-15-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-15-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-15-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-15-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-15-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);
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

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Let's review the problem:</p>
    <p class="statement" style="font-size:14pt; color:#800080;"><?php echo $cur['question']; ?></p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.6;"><?php echo $cur['soln']; ?></div>

    <p style="font-size:15pt; font-weight:700; color:#800080; margin-top:20px;">
        Answer: <span style="color:#CC0066;"><?php echo $cur['ans_canon'] . ' ' . htmlspecialchars($cur['unit']); ?></span>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;"><?php echo $q['question']; ?></p>

    <p style="font-size:13pt; font-weight:500; color:#444444; margin-top:15px;">
        Click on your answer (in <?php echo htmlspecialchars($q['unit']); ?>).
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

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();