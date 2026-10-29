<?php
// math/modules/word-area-composite.php
// PROCEDURAL composite figure area word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels merged per §E:
//   Easy = legacy Easy (opt 1-3): rectangle + half-circle, square + 2 triangles, triangle + half-circle
//   Hard = legacy Medium + Hard (opt 4-6): triangle + rect + half-circle, square + triangle + 2 half-circles, complex composite
//
// 6 figure types preserved. Images at math/images/geom-elem/word-composite1..6.jpg.
//
// Distractors: structural mistakes per figure (forgot half, forgot component,
// used diameter as radius, etc.) filtered to 15% band. 4-choice guarantee §13.7.
//
// Encoding: uses ASCII 'x' for multiplication, never '×' (U+00D7).
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-area-composite.php'

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

$moduleTitle = 'Word Problems on Areas of<br/>Composite Figures';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($v) {
    return '<span style="color:#CC0066; font-weight:700;">' . htmlspecialchars((string)$v) . '</span>';
}

function fmt_area($v) {
    $v = round((float)$v, 2);
    if (abs($v - round($v)) < 0.005) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 2, '.', ''), '0'), '.');
}

// Structural distractors filtered by band. Guarantees >= 3 distractors.
function make_area_distractors($ans, $candidates, $n = 3) {
    $ans = round((float)$ans, 2);
    $band = max(5, abs($ans) * 0.15);
    $out  = [];
    $seen = [fmt_area($ans) => true];

    // Pass 1: structural candidates (in band)
    foreach ($candidates as $c) {
        $c = round((float)$c, 2);
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;
        $s = fmt_area($c);
        if (isset($seen[$s])) continue;
        $seen[$s] = true;
        $out[] = $s;
        if (count($out) >= $n) return $out;
    }

    // Pass 2: numeric padding in band
    $step = max(0.5, round($band / 5, 1));
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d * $step, $ans - $d * $step] as $c) {
            if ($c <= 0) continue;
            $s = fmt_area($c);
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
    $pi = 3.14;
    $opt = ($lvl === 'Easy') ? rand(1, 3) : rand(4, 6);

    if ($opt == 1) {
        // rectangle + half-circle overlapping on short side
        $picfile = 'word-composite1.jpg';
        $b = rand(11, 49);
        $a = floor($b * rand(70, 80) * .01 / 2) * 2;
        $r = $a / 2;
        $ans = $a * $b + ($pi * $r * $r / 2);
        $units = 'sq inches';
        $prompt = 'If the diameter of the green circle is also the short side of the purple rectangle, and the sides of the rectangle are ' . hl($a) . ' inches and ' . hl($b) . ' inches, what is the area of the composite figure formed by the overlapping rectangle and circle?';
        $soln  = 'Area = Rectangle Area + (Circle Area)/2<br>';
        $soln .= '= (' . $a . ' in x ' . $b . ' in) + 1/2(3.14 x (' . $r . ' in)<sup>2</sup>)<br>';
        $soln .= '= ' . ($a * $b) . ' sq in + ' . fmt_area($pi * $r * $r / 2) . ' sq in<br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_area($ans) . ' sq inches</strong>';
        $candidates = [
            $a * $b + $pi * $r * $r,
            $a * $b,
            $pi * $r * $r / 2,
            $a * $b - $pi * $r * $r / 2,
            $a * $b + $pi * $a * $a / 2,
            $a * $b * 2 + $pi * $r * $r / 2,
        ];
    } elseif ($opt == 2) {
        // square + 2 right triangles
        $picfile = 'word-composite2.jpg';
        $s = rand(11, 49);
        $ans = $s * $s * 2;
        $units = 'sq inches';
        $prompt = 'The composite figure shown consists of one square and two isosceles right triangles. If each side of the square is ' . hl($s) . ' inches, what is the area of the composite figure?';
        $soln  = 'Area = Square Area + 2 x (Triangle Area)<br>';
        $soln .= '= (' . $s . ' in)<sup>2</sup> + 2 x ((' . $s . ' in x ' . $s . ' in)/2)<br>';
        $soln .= '= ' . ($s * $s) . ' sq in + ' . ($s * $s) . ' sq in<br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_area($ans) . ' sq inches</strong>';
        $candidates = [
            $s * $s,
            $s * $s * 1.5,
            $s * $s * 3,
            $s * $s * 4,
            $s * 4,
        ];
    } elseif ($opt == 3) {
        // triangle + half-circle
        $picfile = 'word-composite3.jpg';
        $a = rand(6, 29) * 2;
        $r = $a / 2;
        $ans = $a * $a / 2 + $pi * $r * $r / 2;
        $units = 'sq inches';
        $prompt = 'The composite figure shown consists of an isosceles right triangle and a half-circle. If the diameter of the green circle is also the leg of the triangle, and each leg of the triangle is ' . hl($a) . ' inches, what is the area of the composite figure?';
        $soln  = 'Area = Triangle Area + (Circle Area)/2<br>';
        $soln .= '= (' . $a . ' in x ' . $a . ' in)/2 + 1/2(3.14 x (' . $r . ' in)<sup>2</sup>)<br>';
        $soln .= '= ' . ($a * $a / 2) . ' sq in + ' . fmt_area($pi * $r * $r / 2) . ' sq in<br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_area($ans) . ' sq inches</strong>';
        $candidates = [
            $a * $a / 2,
            $pi * $r * $r / 2,
            $a * $a,
            $a * $a / 2 + $pi * $r * $r,
            $a * $a / 2 + $pi * $a * $a / 2,
        ];
    } elseif ($opt == 4) {
        // triangle + rectangle + half-circle
        $picfile = 'word-composite4.jpg';
        $b = rand(11, 49);
        $a = floor($b * rand(70, 80) * .01 / 2) * 2;
        $r = $a / 2;
        $ans = $a * $a / 2 + $a * $b + ($pi * $r * $r / 2);
        $units = 'sq inches';
        $prompt = 'The composite figure shown consists of an isosceles right triangle, a rectangle, and a half-circle. The diameter of the circle and the leg of the triangle are equal to the short side of the rectangle. If the sides of the rectangle are ' . hl($a) . ' inches and ' . hl($b) . ' inches, what is the area of the composite figure?';
        $soln  = 'Area = Triangle + Rectangle + (Circle)/2<br>';
        $soln .= '= (' . $a . ' in x ' . $a . ' in)/2 + (' . $a . ' in x ' . $b . ' in) + 1/2(3.14 x (' . $r . ' in)<sup>2</sup>)<br>';
        $soln .= '= ' . ($a * $a / 2) . ' + ' . ($a * $b) . ' + ' . fmt_area($pi * $r * $r / 2) . ' sq in<br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_area($ans) . ' sq inches</strong>';
        $candidates = [
            $a * $a / 2 + $a * $b,
            $a * $b + $pi * $r * $r / 2,
            $a * $a / 2 + $pi * $r * $r / 2,
            $a * $a + $a * $b + $pi * $r * $r / 2,
            $a * $a / 2 + $a * $b + $pi * $r * $r,
            $a * $b,
        ];
    } elseif ($opt == 5) {
        // square + triangle + 2 half-circles (full circle)
        $picfile = 'word-composite5.jpg';
        $s = rand(6, 29) * 2;
        $r = $s / 2;
        $ans = $s * $s + $s * $s / 2 + $pi * $r * $r;
        $units = 'sq inches';
        $prompt = 'The composite figure shown consists of a square, an isosceles right triangle, and two half-circles. The diameter of the circle and the leg of the triangle are equal to each side of the square. If each side of the square is ' . hl($s) . ' inches, what is the area of the composite figure?';
        $soln  = 'Area = Square + Triangle + 2 x (Half-circle)<br>';
        $soln .= '= Square + Triangle + Circle<br>';
        $soln .= '= (' . $s . ' in x ' . $s . ' in) + (' . $s . ' in x ' . $s . ' in)/2 + (3.14 x (' . $r . ' in)<sup>2</sup>)<br>';
        $soln .= '= ' . ($s * $s) . ' + ' . ($s * $s / 2) . ' + ' . fmt_area($pi * $r * $r) . ' sq in<br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_area($ans) . ' sq inches</strong>';
        $candidates = [
            $s * $s + $s * $s / 2,
            $s * $s + $pi * $r * $r,
            $s * $s / 2 + $pi * $r * $r,
            $s * $s * 2 + $pi * $r * $r,
            $s * $s + $s * $s / 2 + $pi * $r * $r / 2,
        ];
    } else {
        // isosceles triangle + rectangle + 2 half-circles (full circle)
        $picfile = 'word-composite6.jpg';
        $b = rand(12, 49);
        $a = $b * 2;
        $r = $b / 2;
        $ans = $a * $b / 2 + $a * $b + $pi * $r * $r;
        $units = 'sq inches';
        $prompt = 'The composite figure shown consists of an isosceles triangle, a rectangle, and two half-circles. The diameter of the circle is half the long side of the rectangle. The long side of the rectangle is twice its short side. If the long side of the rectangle is ' . hl($a) . ' inches, what is the area of the composite figure?';
        $soln  = 'Area = Triangle + Rectangle + 2 x (Half-circle)<br>';
        $soln .= '= Triangle + Rectangle + Circle<br>';
        $soln .= '= (' . $a . ' in x ' . $b . ' in)/2 + (' . $a . ' in x ' . $b . ' in) + (3.14 x (' . $r . ' in)<sup>2</sup>)<br>';
        $soln .= '= ' . ($a * $b / 2) . ' + ' . ($a * $b) . ' + ' . fmt_area($pi * $r * $r) . ' sq in<br>';
        $soln .= '= <strong style="color:#CC0066;">' . fmt_area($ans) . ' sq inches</strong>';
        $candidates = [
            $a * $b / 2 + $a * $b,
            $a * $b + $pi * $r * $r,
            $a * $b / 2 + $pi * $r * $r,
            $a * $b + $pi * $r * $r,
            $a * $b / 2 + $a * $b + 2 * $pi * $r * $r,
        ];
    }

    $answerStr = fmt_area($ans);
    $distractors = make_area_distractors($ans, $candidates, 3);
    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4 && $d <= 100) {
        foreach ([fmt_area($ans + $d), fmt_area($ans - $d)] as $c) {
            if ((float)$c <= 0) continue;
            if (!in_array($c, $allChoices, true)) {
                $allChoices[] = $c;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($allChoices);

    $imageUrl = $base . '/math/images/geom-elem/' . $picfile;

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $prompt,
        'image'    => $imageUrl,
        'answer'   => $answerStr,
        'choices'  => $allChoices,
        'solution' => $soln,
        'unit'     => $units,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
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
    <br>
    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="Composite figure"
         style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;"
         onerror="this.style.display='none';">
    <p style="font-size:14pt; color:#666; margin-top:15px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
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
    <br>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="Composite figure"
         style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;"
         onerror="this.style.display='none';">
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:20px auto; line-height:1.55;">
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