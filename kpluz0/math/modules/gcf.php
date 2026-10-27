<?php
// math/modules/gcf.php
// MULTIPLE CHOICE (4 choices). Greatest Common Factor of two numbers.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor strategy (factorization):
//   - 1 from smaller COMMON factors (tests "greatest" reasoning)
//   - 1 from non-common divisors of only one of the two numbers
//     (tests "must divide both" check)
//   - 1 more from the remaining closest candidates
//   Ensures no "pick biggest" or "pick smallest" heuristic works.
//
// Legacy: grades 4-5 only. New: clamped [4,5], 2 levels
//         (Easy = legacy Easy, Hard = legacy Medium, per §E).
// Theme: test06-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'gcf.php'

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

$moduleTitle = 'Greatest Common Factor';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(5, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function factorize($n) {
    $f = [];
    for ($i = 2; $i * $i <= $n; $i++) {
        while ($n % $i === 0) { $f[] = $i; $n = intdiv($n, $i); }
    }
    if ($n > 1) $f[] = $n;
    return $f;
}

function divisors_of($n) {
    $d = [];
    for ($i = 1; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            $d[] = $i;
            if ($i !== intdiv($n, $i)) $d[] = intdiv($n, $i);
        }
    }
    sort($d);
    return $d;
}

function make_gcf_distractors($n1, $n2, $gcf, $n = 3) {
    $div1 = divisors_of($n1);
    $div2 = divisors_of($n2);
    $common = array_values(array_intersect($div1, $div2));
    $only1 = array_values(array_diff($div1, $common));
    $only2 = array_values(array_diff($div2, $common));
    $nonCommon = array_values(array_unique(array_merge($only1, $only2)));

    $smallerCommon = array_values(array_filter($common, fn($d) => $d < $gcf));
    usort($smallerCommon, fn($a, $b) => ($gcf - $a) <=> ($gcf - $b));

    usort($nonCommon, fn($a, $b) => abs($a - $gcf) <=> abs($b - $gcf));

    $out = [];
    $used = [$gcf => true];

    // 1. One smaller common factor (tests "greatest")
    foreach ($smallerCommon as $d) {
        if ($d < 1) continue;
        if (isset($used[$d])) continue;
        $used[$d] = true;
        $out[] = $d;
        break;
    }

    // 2. One non-common divisor (tests "divides both")
    foreach ($nonCommon as $d) {
        if (isset($used[$d])) continue;
        $used[$d] = true;
        $out[] = $d;
        break;
    }

    // 3. Fill with closest remaining
    $remaining = array_merge($smallerCommon, $nonCommon);
    $remaining = array_values(array_unique($remaining));
    usort($remaining, fn($a, $b) => abs($a - $gcf) <=> abs($b - $gcf));
    foreach ($remaining as $d) {
        if (count($out) >= $n) break;
        if (isset($used[$d])) continue;
        $used[$d] = true;
        $out[] = $d;
    }

    // Fallback
    $d = 1;
    while (count($out) < $n && $d < 200) {
        foreach ([$gcf + $d, $gcf - $d] as $cv) {
            if ($cv > 0 && !isset($used[$cv])) {
                $used[$cv] = true;
                $out[] = $cv;
                if (count($out) >= $n) break 2;
            }
        }
        $d++;
    }

    return array_map(fn($x) => (string)(int)$x, $out);
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
    $isCorrect = $scorer->processAnswer($clicked, $cur['ans_str'], $cur['lvl']);

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
    // [numlimit1, numlimit2, rnumlim]
    $configs = [
        4 => [
            'Easy' => [3,  24, 4],
            'Hard' => [18, 45, 5],
        ],
        5 => [
            'Easy' => [6,  36, 4],
            'Hard' => [32, 72, 5],
        ],
    ];
    [$numlimit1, $numlimit2, $rnumlim] = $configs[$grd][$lvl];

    $primes = [2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,
               97,101,103,107,109,113,127,131,137,139,149,151,157,163,167,173,
               179,181,191,193,197,199];

    // Pick two distinct numbers from range
    $num3 = rand($numlimit1, $numlimit2);
    $safety = 0;
    do { $num2 = rand($numlimit1, $numlimit2); $safety++; } while ($num2 == $num3 && $safety < 30);

    if ($num3 < $num2) { $num1 = $num2; $num2 = $num3; }
    else               { $num1 = $num3; }

    // 75% chance: multiply both by a shared prime &#8594; interesting GCF > 1
    $rnum = rand(1, 4);
    if ($rnum > 1) {
        $rfac = rand(1, $rnumlim);
        $shared = $primes[$rfac - 1];
        $num1 *= $shared;
        $num2 *= $shared;
    }

    // Factor both
    $factors1 = factorize($num1);
    $factors2 = factorize($num2);

    // Common prime factors (with multiplicity)
    $t1 = array_count_values($factors1);
    $t2 = array_count_values($factors2);
    $cf = [];
    foreach ($t1 as $p => $c) {
        $minC = min($c, $t2[$p] ?? 0);
        for ($i = 0; $i < $minC; $i++) $cf[] = $p;
    }

    $gcf = 1;
    foreach ($cf as $p) $gcf *= $p;

    $ansStr = (string)(int)$gcf;

    // Build feedback explanation (single HTML string)
    $f1Display = '1 ' . implode(' ', $factors1);
    $f2Display = '1 ' . implode(' ', $factors2);

    if (empty($cf)) {
        $soln = "The prime factors of $num1 are: [ $f1Display ]<br>"
              . "The prime factors of $num2 are: [ $f2Display ]<br>"
              . "Since their only common prime factor is 1,<br>"
              . "their greatest common factor is also <strong style='color:#CC0066;'>1</strong>.";
    } else {
        $cfDisplay = '1 ' . implode(' ', $cf);
        $multCalc  = '1';
        foreach ($cf as $p) $multCalc .= ' x ' . $p;
        $soln = "The prime factors of $num1 are: [ $f1Display ]<br>"
              . "The prime factors of $num2 are: [ $f2Display ]<br>"
              . "Their common prime factors are: [ $cfDisplay ]<br>"
              . "So their greatest common factor is<br>"
              . "$multCalc = <strong style='color:#CC0066;'>$gcf</strong>.";
    }

    $distractors = make_gcf_distractors($num1, $num2, $gcf, 3);
    $choices = array_merge([$ansStr], $distractors);
    $choices = array_values(array_unique($choices));
    // Safety: if dedupe reduced below 4, pad with nearby
    $d = 1;
    while (count($choices) < 4) {
        foreach ([$gcf + $d, $gcf - $d] as $cv) {
            if ($cv > 0 && !in_array((string)$cv, $choices)) {
                $choices[] = (string)$cv;
                if (count($choices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'num1'    => $num1,
        'num2'    => $num2,
        'gcf'     => $gcf,
        'ans_str' => $ansStr,
        'soln'    => $soln,
        'choices' => $choices,
        'lvl'     => $lvl,
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
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.6; text-align:center; max-width:520px;">
        <?php echo $cur['soln']; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:18pt; font-weight:700; color:#800080; margin-top:15px; line-height:1.2;">
        The greatest common factor of
    </p>
    <p style="font-size:20pt; font-weight:700; margin:6px 0 0 0; line-height:1.2;">
        <span style="color:#CC0066;"><?php echo $q['num1']; ?></span>
        <span style="color:#800080;">and</span>
        <span style="color:#CC0066;"><?php echo $q['num2']; ?></span>
        <span style="color:#800080;">is:</span>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444; margin-top:20px;">
        Click on your answer.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:360px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:18px 20px; box-sizing:border-box; font-size:1.5rem;">
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