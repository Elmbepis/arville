<?php
// math/modules/word-perimeter.php
// MULTIPLE CHOICE (4 choices). Word problems: perimeters of polygons.
// Single-level (Easy). Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic (perimeter = addition &#8594; distinct-last-digit strategy):
//   All 4 choices carry DIFFERENT last digits, so a student who sums units
//   digits mod 10 can verify — but only after computing the full perimeter.
//   Tight magnitudes prevent "obviously too big/small" elimination.
//
// FIX #1: legacy tolerance compare &#8594; canonical 2dp string compare.
// FIX #2: division/multiplication symbols &#8594; ASCII / and x.
// Theme: wquiz-15-* (frame matches word-quantities).
// DB row required: modules.url = 'word-perimeter.php'

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

$moduleTitle = 'Word Problems Involving<br/>Perimeters of Polygons';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

function canon_perim($v) {
    $r = round((float)$v, 2);
    return ($r == (int)$r) ? (string)(int)$r : (string)$r;
}

// Perimeter distractors: distinct last digits + tight magnitudes.
function make_perim_distractors($correct, $n = 3) {
    $correctCanon = canon_perim($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    $isInt = (abs($correct - round($correct)) < 0.0001);
    $usedLastDigits = [];

    if ($isInt) {
        $correctLastDigit = ((int)round($correct)) % 10;
        $usedLastDigits[$correctLastDigit] = true;

        if ($correct < 30)        $pcts = [0.05, 0.10, 0.15, 0.20, 0.25];
        elseif ($correct < 100)   $pcts = [0.03, 0.05, 0.08, 0.10, 0.12];
        elseif ($correct < 500)   $pcts = [0.02, 0.03, 0.05, 0.07, 0.09];
        else                      $pcts = [0.01, 0.02, 0.03, 0.05, 0.07];

        $deltas = [];
        foreach ($pcts as $pct) {
            $deltas[] = max(1, (int)round($correct * $pct));
        }
        $deltas = array_values(array_unique($deltas));
        shuffle($deltas);

        foreach ($deltas as $targetDelta) {
            if (count($out) >= $n) break;
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
                    $cc = canon_perim($cv);
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

        $d = 1;
        while (count($out) < $n && $d <= $correct) {
            foreach ([+$d, -$d] as $signed) {
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cd = ((int)round($cv)) % 10;
                if (isset($usedLastDigits[$cd])) continue;
                $cc = canon_perim($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $usedLastDigits[$cd] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $d++;
        }
    } else {
        // Decimal answer: small decimal deltas
        $ddeltas = [0.1, 0.2, 0.3, 0.5, 0.8, 1.0, 1.5, 2.0];
        shuffle($ddeltas);
        foreach ($ddeltas as $d) {
            foreach ([+$d, -$d] as $signed) {
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cc = canon_perim($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) return $out;
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
    $isCorrect = $scorer->processAnswer(canon_perim($clicked), $cur['ans_canon'], $lvl);

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

    $qopt = rand(1, 4);
    $question = ''; $soln = ''; $ans = 0; $unit = '';

    if ($qopt === 1) {
        $qnum = rand(1, 2);
        $shape = (rand(1,2) === 1) ? 'square' : 'rhombus';
        if ($qnum === 1) {
            $s = rand(25, 50);
            $n = rand(2, 9);
            $question = "$name ran around their school's playground $n times. If the playground was a $shape and each of its sides was $s meters long, how many meters did $name run?";
            $ans  = $n * 4 * $s;
            $soln = "perimeter of $shape = 4 x length of each side<br/>"
                  . "perimeter of playground = 4 x $s m = " . (4*$s) . " meters<br/>"
                  . "distance run = $n x " . (4*$s) . " meters<br/>"
                  . "distance run = $ans meters";
        } else {
            $s = rand(11, 49);
            $n = rand(2, 9);
            $question = "$name built a fence around $p2 lot, which was shaped like a $shape. The fence consisted of $n levels of barbed wire and wooden posts. If $p2 lot was $s meters long on each side, how many meters of barbed wire did $name use?";
            $ans  = $n * 4 * $s;
            $soln = "perimeter of $shape = 4 x length of each side<br/>"
                  . "perimeter of lot = 4 x $s m = " . (4*$s) . " meters<br/>"
                  . "barbed wire used = $n x " . (4*$s) . " meters<br/>"
                  . "barbed wire used = $ans meters";
        }
        $unit = 'meters';

    } elseif ($qopt === 2) {
        $qnum = rand(1, 3);
        $safety = 0;
        do { $l = rand(15, 32); $w = rand(11, 29); $safety++; } while ($w >= $l - 2 && $safety < 30);
        $n = rand(2, 9);
        if ($qnum === 1) {
            $question = "$name built a fence around $p2 rectangular lot. The fence consisted of $n levels of barbed wire and steel posts. If $p2 lot was $l meters long and $w meters wide, how many meters of barbed wire did $name use?";
            $ans  = $n * 2 * ($l + $w);
            $soln = "perimeter of rectangle = 2 x length + 2 x width<br/>"
                  . "perimeter of lot = 2 x $l m + 2 x $w m = " . (2*($l+$w)) . " meters<br/>"
                  . "barbed wire used = $n x " . (2*($l+$w)) . " meters<br/>"
                  . "barbed wire used = $ans meters";
            $unit = 'meters';
        } elseif ($qnum === 2) {
            $question = "$name built a rectangular fish pond that was $l meters long and $w meters wide. $name also placed rocks around $p2 pond. If $p1 used $n rocks for each meter of the pond's perimeter, how many rocks did $name use?";
            $ans  = $n * 2 * ($l + $w);
            $soln = "perimeter of rectangle = 2 x length + 2 x width<br/>"
                  . "perimeter of fish pond = 2 x $l m + 2 x $w m = " . (2*($l+$w)) . " meters<br/>"
                  . "rocks used = $n pieces/meter x " . (2*($l+$w)) . " meters<br/>"
                  . "rocks used = $ans pieces";
            $unit = 'pieces';
        } else {
            $question = "$name owned a lot that was shaped like a parallelogram. Its long side was $l meters while its short side was $w meters. $name lined the perimeter of $p2 lot with plants. If each meter of the lot's perimeter needed $n plants, how many plants did $name plant?";
            $ans  = $n * 2 * ($l + $w);
            $soln = "perimeter of parallelogram = 2 x length + 2 x width<br/>"
                  . "perimeter of lot = 2 x $l m + 2 x $w m = " . (2*($l+$w)) . " meters<br/>"
                  . "plants planted = $n plants/meter x " . (2*($l+$w)) . " meters<br/>"
                  . "plants planted = $ans plants";
            $unit = 'plants';
        }

    } elseif ($qopt === 3) {
        $qnum = rand(1, 2);
        if ($qnum === 1) {
            $b = rand(8, 19);
            $n = rand(3, 6) * 0.5;   // 1.5, 2, 2.5, or 3
            $question = "The wooden frame of a billboard, which is shaped like an isosceles triangle, has a base that is $b feet long. Each of its legs is $n times as long as this base. How many feet of wood was used to build the triangular frame?";
            $ans  = $b + 2 * ($n * $b);
            $soln = "perimeter of isosceles triangle = B + L + L<br/>"
                  . "length of base = $b feet<br/>"
                  . "length of each leg = $n x $b feet = " . ($n*$b) . " feet<br/>"
                  . "perimeter of frame = $b ft + " . ($n*$b) . " ft + " . ($n*$b) . " ft = $ans feet";
            $unit = 'feet';
        } else {
            $safety = 0;
            do {
                $a = rand(500, 1200);
                $b = rand(500, 1200);
                $c = rand(200, 1200);
                $safety++;
            } while (($c >= $a || $c >= $b || $b > $a || $a > $b + $c - 50) && $safety < 100);
            $question = "$name went hiking on a triangular path by going $a meters northeast, $b meters southwest, and $c meters back to $p2 starting point. Find the perimeter of this triangular path.";
            $ans  = $a + $b + $c;
            $soln = "perimeter of a triangle = sum of its sides<br/>"
                  . "perimeter of triangular path = $a m + $b m + $c m<br/>"
                  . "perimeter of triangular path = $ans meters";
            $unit = 'meters';
        }

    } else {  // qopt 4: trapezoid
        $safety = 0;
        do {
            $a = rand(25, 49);
            $b = $a + rand(2, 9);
            $c = rand(11, 21);
            $d = $c + rand(2, 7);
            $safety++;
        } while (($a + $c + $d < $b + 5) && $safety < 50);
        $question = "$name owned a lot that was shaped like a trapezoid. The measurements of its sides were $a meters, $b meters, $c meters, and $d meters. $name fenced $p2 lot with chicken wire supported by wooden poles. How many meters of chicken wire did $name use?";
        $ans  = $a + $b + $c + $d;
        $soln = "perimeter of trapezoid = sum of its sides<br/>"
              . "perimeter of lot = $a m + $b m + $c m + $d m = $ans meters<br/>"
              . "chicken wire used = $ans meters";
        $unit = 'meters';
    }

    $ansCanon    = canon_perim($ans);
    $distractors = make_perim_distractors($ans, 3);
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