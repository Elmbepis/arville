<?php
// math/modules/word-surface-area.php
// PROCEDURAL surface area word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcodes $_SESSION['level']="Easy" with no
// level radios. All 5 solid shapes are level-independent. Collapsed to
// single-level — $_SESSION['level'] not touched.
//
// 5 solid types (5 sub-forms each):
//   qopt 1: sphere (beach ball, meteorite, gum bubble) — 4 &#960; r²
//   qopt 2: cube (box, stool) — 6 s²
//   qopt 3: rectangular prism (package, crate+paint) — 2(LW+LH+WH)
//   qopt 4: cylinder (tank, cardboard container) — 2&#960;rh + 2&#960;r²
//   qopt 5: square pyramid (archaeological pyramid) — b² + 2bh
//
// Distractors: structural mistakes per shape (forgot ×2, forgot a component,
// wrong formula, used diameter as radius, etc.), band-filtered to 15%.
// 4-choice guarantee §13.7.
//
// Encoding: uses ASCII 'x' for multiplication, never '×' (U+00D7).
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-surface-area.php'

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

$moduleTitle = 'Word Problems on Surface<br/>Areas of Solid Figures';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

function hl($v) {
    return '<span style="color:#CC0066; font-weight:700;">' . htmlspecialchars((string)$v) . '</span>';
}

function fmt_sa($v) {
    $v = round((float)$v, 4);
    if (abs($v - round($v)) < 0.0005) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 4, '.', ''), '0'), '.');
}

function make_sa_distractors($ans, $candidates, $n = 3) {
    $ans = round((float)$ans, 4);
    $band = max(10, abs($ans) * 0.15);
    $out  = [];
    $seen = [fmt_sa($ans) => true];

    foreach ($candidates as $c) {
        $c = round((float)$c, 4);
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;
        $s = fmt_sa($c);
        if (isset($seen[$s])) continue;
        $seen[$s] = true;
        $out[] = $s;
        if (count($out) >= $n) return $out;
    }

    $step = max(0.5, round($band / 5, 2));
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d * $step, $ans - $d * $step] as $c) {
            if ($c <= 0) continue;
            $s = fmt_sa($c);
            if (isset($seen[$s])) continue;
            $seen[$s] = true;
            $out[] = $s;
            if (count($out) >= $n) break 2;
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
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $boys  = ["Alfred","Ben","Carlo","Daniel","Diego","Gabriel","Isaac","Jaime","Jose","Juan","Jonathan","Lito","Mario","Roberto","Samuel","Tommy"];
    $girls = ["Annie","Betty","Caring","Elisa","Emma","Eva","Evelyn","Grace","Josie","Julie","Katring","Laura","Lydia","Maring","Olive","Tina","Toyang"];
    $boy  = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];
    if (rand(1, 2) == 1) { $name = $girl; $p1 = 'she'; $p2 = 'her'; }
    else                 { $name = $boy;  $p1 = 'he';  $p2 = 'his'; }

    $surnames = ["Cruz", "Chua", "Gomez", "Lopez", "Santos", "Torres"];
    $surname  = $surnames[array_rand($surnames)];

    $qopt = rand(1, 5);

    if ($qopt == 1) {
        // Sphere: SA = 4 &#960; r²
        $qnum = rand(1, 3);
        $r = rand(90, 200) * 0.1;
        if ($qnum == 1) {
            $obj = 'beach ball';
            $prompt = "$name bought a beach ball with a diameter of " . hl(fmt_sa(2 * $r)) . " inches. What is the surface area of the beach ball?";
        } elseif ($qnum == 2) {
            $obj = 'meteorite';
            $prompt = "An archaeologist discovered a rare, perfectly spherical meteorite with a radius of " . hl(fmt_sa($r)) . " inches. What is the surface area of the meteorite?";
        } else {
            $r = rand(60, 120) * 0.1;
            $obj = 'gum bubble';
            $prompt = "$name chewed on $p2 gum for 5 minutes and then blew a spherical bubble that was " . hl(fmt_sa(2 * $r)) . " inches across. What was the surface area of the gum bubble?";
        }
        $ans = 4 * 3.14 * $r * $r;
        $unit = 'sq inches';
        $soln  = 'surface area of sphere = 4 x 3.14 x r<sup>2</sup><br>';
        $soln .= '= 4 x 3.14 x (' . fmt_sa($r) . ' in)<sup>2</sup><br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_sa($ans) . ' sq inches</strong>';
        $candidates = [
            4 * 3.14 * (2 * $r) * (2 * $r),
            4 * 3.14 * $r,
            (4 / 3) * 3.14 * $r * $r * $r,
            2 * 3.14 * $r * $r,
            3.14 * $r * $r,
            4 * 3.14 * $r * $r * 2,
        ];
    } elseif ($qopt == 2) {
        // Cube: SA = 6 s²
        $qnum = rand(1, 2);
        $s = rand(90, 300) * 0.1;
        if ($qnum == 1) {
            $obj = 'box';
            $prompt = "$name bought a cubic box that is " . hl(fmt_sa($s)) . " centimeters on each side. What is the surface area of the box?";
        } else {
            $s = rand(250, 450) * 0.1;
            $obj = 'stool';
            $prompt = "Mr. $surname built a small stool that has 6 congruent square faces. If each of its sides is " . hl(fmt_sa($s)) . " centimeters, what is the surface area of the stool?";
        }
        $ans = 6 * $s * $s;
        $unit = 'sq centimeters';
        $soln  = 'surface area of cube = 6 x s<sup>2</sup><br>';
        $soln .= '= 6 x (' . fmt_sa($s) . ' cm)<sup>2</sup><br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_sa($ans) . ' sq cm</strong>';
        $candidates = [
            $s * $s,
            3 * $s * $s,
            12 * $s * $s,
            $s * $s * $s,
            6 * $s,
        ];
    } elseif ($qopt == 3) {
        // Rectangular prism: SA = 2(LW + LH + WH)
        $qnum = rand(1, 2);
        do {
            $a = rand(300, 500) * 0.1;
            $b = rand(200, 400) * 0.1;
            $c = rand(100, 300) * 0.1;
        } while ($a < $b + 10 || $b < $c + 10);

        if ($qnum == 1) {
            $obj = 'package';
            $prompt = "$name received a rectangular package that measures " . hl(fmt_sa($a)) . " cm by " . hl(fmt_sa($b)) . " cm by " . hl(fmt_sa($c)) . " cm. What is the surface area of the package?";
            $sa = $a * $b * 2 + $a * $c * 2 + $b * $c * 2;
            $ans = $sa;
            $unit = 'sq centimeters';
            $soln  = 'surface area = L x W x 2 + L x H x 2 + W x H x 2<br>';
            $soln .= '= ' . fmt_sa($a) . ' x ' . fmt_sa($b) . ' x 2 + ' . fmt_sa($a) . ' x ' . fmt_sa($c) . ' x 2 + ' . fmt_sa($b) . ' x ' . fmt_sa($c) . ' x 2<br>';
            $soln .= '= <strong style="color:#CC0066;">' . fmt_sa($ans) . ' sq cm</strong>';
            $candidates = [
                $a * $b + $a * $c + $b * $c,
                $a * $b * 2 + $a * $c * 2,
                $a * $b * 2,
                $a * $b,
                $sa * 2,
                $sa / 2,
            ];
        } else {
            $d = rand(4, 8) * 0.5;
            $a = $a * $d; $b = $b * $d; $c = $c * $d;
            $obj = 'crate';
            $prompt = "A rectangular crate that measures " . hl(fmt_sa($a)) . " cm by " . hl(fmt_sa($b)) . " cm by " . hl(fmt_sa($c)) . " cm needs to be painted. If one liter of paint can cover " . hl(fmt_sa($d)) . " sq m, how many liters of paint are needed to paint the crate?";
            $sa = $a * $b * 2 + $a * $c * 2 + $b * $c * 2;
            $ans = round($sa * 0.0001 / $d, 4);
            $unit = 'liter(s)';
            $soln  = 'surface area = ' . fmt_sa($sa) . ' sq cm = ' . fmt_sa($sa * 0.0001) . ' sq m<br>';
            $soln .= 'paint = ' . fmt_sa($sa * 0.0001) . ' sq m / ' . fmt_sa($d) . ' sq m/L<br>';
            $soln .= '= <strong style="color:#CC0066;">' . fmt_sa($ans) . ' L</strong>';
            $candidates = [
                $sa * 0.0001 / ($d * 2),
                $sa * 0.0001 / ($d / 2),
                $sa * 0.0001,
                $sa / ($d * 10000),
            ];
        }
    } elseif ($qopt == 4) {
        // Cylinder: SA = 2&#960;rh + 2&#960;r²
        $qnum = rand(1, 2);
        if ($qnum == 1) {
            $h = rand(48, 84);
            $r = rand(12, 21);
            $obj = 'tank';
            $prompt = "$name bought a cylindrical tank with a height of " . hl(fmt_sa($h)) . " inches and a diameter of " . hl(fmt_sa(2 * $r)) . " inches. What is the surface area of the tank?";
        } else {
            $h = rand(20, 36);
            $r = rand(2, 8);
            $obj = 'container';
            $prompt = "$name assembled a cylindrical container made of cardboard. If the container has a height of " . hl(fmt_sa($h)) . " inches and a diameter of " . hl(fmt_sa(2 * $r)) . " inches, how many square inches of cardboard did $name use?";
        }
        $ans = 3.14 * (2 * $r) * $h + 2 * 3.14 * $r * $r;
        $unit = 'sq inches';
        $soln  = 'surface area of cylinder = 6.28 x r x h + 2 x 3.14 x r<sup>2</sup><br>';
        $soln .= '= 6.28 x ' . fmt_sa($r) . ' x ' . fmt_sa($h) . ' + 2 x 3.14 x (' . fmt_sa($r) . ')<sup>2</sup><br>';
        $soln .= '= ' . fmt_sa(6.28 * $r * $h) . ' sq in + ' . fmt_sa(2 * 3.14 * $r * $r) . ' sq in<br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_sa($ans) . ' sq inches</strong>';
        $candidates = [
            3.14 * (2 * $r) * $h + 3.14 * $r * $r,
            3.14 * (2 * $r) * $h,
            2 * 3.14 * $r * $r,
            3.14 * (2 * $r) * $h + 2 * 3.14 * (2 * $r) * (2 * $r),
            3.14 * $r * $r * $h,
        ];
    } else {
        // Square pyramid: SA = b² + 2bh
        do {
            $b = rand(12, 21);
            $h = rand(8, 18);
        } while ($h < $b - 6);
        $ans = $b * $b + 2 * $b * $h;
        $unit = 'sq meters';
        $prompt = "A group of archaeologists discovered an ancient square pyramid. Each side of its base is " . hl($b) . " meters while its slant height is " . hl($h) . " meters. What is the surface area of the pyramid?";
        $soln  = 'surface area of square pyramid = b<sup>2</sup> + 2 x b x h<br>';
        $soln .= '= (' . $b . ' m)<sup>2</sup> + 2 x ' . $b . ' m x ' . $h . ' m<br>';
        $soln .= '= ' . ($b * $b) . ' sq m + ' . (2 * $b * $h) . ' sq m<br>';
        $soln .= '= <strong style="color:#CC0066;">' . $ans . ' sq meters</strong>';
        $candidates = [
            $b * $b + $b * $h,
            $b * $b,
            2 * $b * $h,
            $b * $b + 4 * $b * $h,
            $b * $h,
            $b * $b * 2 + 2 * $b * $h,
        ];
    }

    $answerStr = fmt_sa($ans);
    $distractors = make_sa_distractors($ans, $candidates, 3);
    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4 && $d <= 100) {
        foreach ([fmt_sa($ans + $d * 5), fmt_sa($ans - $d * 5)] as $c) {
            if ((float)$c <= 0) continue;
            if (!in_array($c, $allChoices, true)) {
                $allChoices[] = $c;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $prompt,
        'answer'   => $answerStr,
        'choices'  => $allChoices,
        'solution' => $soln,
        'unit'     => $unit,
        'lvl'      => $lvl,
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
<style>
  .choice-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .choice-grid-2x2 > div { display: contents; }
  sup { font-size: 0.7em; vertical-align: super; line-height: 0; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
        <span style="color:#666; font-size:12pt;"><?php echo htmlspecialchars($cur['unit']); ?></span>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        <?php echo $cur['prompt']; ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
        <span style="color:#666; font-size:12pt;"><?php echo htmlspecialchars($cur['unit']); ?></span>
    </p>
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:520px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
        <strong style="color:#007700;">Solution:</strong><br>
        <?php echo $cur['solution']; ?>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.55;">
        <?php echo $q['prompt']; ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer <em>(in <?php echo htmlspecialchars($q['unit']); ?>)</em>.</p>
    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
        $use2x2 = ($maxLen >= 5 && $maxLen <= 20);
    ?>
    <?php if ($use2x2): ?>
        <div class="choice-grid-2x2">
            <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
        </div>
    <?php else: ?>
        <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    <?php endif; ?>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();