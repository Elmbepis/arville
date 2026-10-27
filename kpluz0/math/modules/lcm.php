<?php
// math/modules/lcm.php
// MULTIPLE CHOICE (4 choices). Least Common Multiple of two numbers.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor strategy (multiples &#8594; close magnitudes, some above / some below):
//   Perturbations of the correct answer (LCM ± gcd, ± n1, ± n2, ×2, ÷2),
//   filtered to a tight band [0.4×LCM, 2.5×LCM]. Includes at least one
//   distractor above and one below so "pick biggest/smallest" fails.
//
// Legacy: grades 4-5 only. New: clamped [4,5], 2 levels
//         (Easy = legacy Easy, Hard = legacy Medium, per §E).
// Theme: test7-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'lcm.php'

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

$moduleTitle = 'Least Common Multiple';
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

function make_lcm_distractors($n1, $n2, $lcm, $gcf, $n = 3) {
    $cands = [];
    if ($gcf > 0) {
        $cands[] = $lcm + $gcf;
        $cands[] = $lcm - $gcf;
    }
    $cands[] = $lcm + $n1;
    $cands[] = $lcm - $n1;
    $cands[] = $lcm + $n2;
    $cands[] = $lcm - $n2;
    $cands[] = 2 * $lcm;
    if ($lcm % 2 === 0)            $cands[] = intdiv($lcm, 2);
    if (($lcm * 3) % 2 === 0)      $cands[] = intdiv($lcm * 3, 2);
    if (($lcm * 2) % 3 === 0)      $cands[] = intdiv($lcm * 2, 3);
    $cands[] = $n1 * $n2;

    $min = 0.4 * $lcm;
    $max = 2.5 * $lcm;

    $pool = [];
    foreach ($cands as $c) {
        if ($c <= 0) continue;
        if ($c < $min || $c > $max) continue;
        if ((int)$c != $c) continue;
        $ci = (int)$c;
        if ($ci === $lcm) continue;
        $pool[$ci] = true;
    }
    $pool = array_keys($pool);
    usort($pool, fn($a, $b) => abs($a - $lcm) <=> abs($b - $lcm));

    $out = array_slice($pool, 0, $n);

    // Ensure at least one above and one below
    $hasAbove = false; $hasBelow = false;
    foreach ($out as $x) {
        if ($x > $lcm) $hasAbove = true;
        if ($x < $lcm) $hasBelow = true;
    }
    if (count($out) >= $n && (!$hasAbove || !$hasBelow)) {
        // Swap in the missing direction from remaining pool
        $targetDir = $hasAbove ? 'below' : 'above';
        foreach ($pool as $x) {
            if (in_array($x, $out)) continue;
            if ($targetDir === 'above' && $x > $lcm) { $out[$n-1] = $x; break; }
            if ($targetDir === 'below' && $x < $lcm) { $out[$n-1] = $x; break; }
        }
    }

    // Fallback
    $d = 1;
    while (count($out) < $n) {
        foreach ([$lcm + $d, $lcm - $d] as $cv) {
            if ($cv > 0 && $cv != $lcm && !in_array($cv, $out)) {
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
    $configs = [
        4 => [
            'Easy' => [2,  16],
            'Hard' => [10, 30],
        ],
        5 => [
            'Easy' => [4,  28],
            'Hard' => [24, 48],
        ],
    ];
    [$numlimit1, $numlimit2] = $configs[$grd][$lvl];

    $safety = 0;
    do {
        $num1 = rand($numlimit1, $numlimit2);
        $num2 = rand($numlimit1, $numlimit2);
        $safety++;
    } while ($num1 == $num2 && $safety < 30);

    $factors1 = factorize($num1);
    $factors2 = factorize($num2);

    // LCM prime factorization: union with max multiplicity
    $t1 = array_count_values($factors1);
    $t2 = array_count_values($factors2);
    $pf = [];
    $allPrimes = array_unique(array_merge(array_keys($t1), array_keys($t2)));
    sort($allPrimes);
    foreach ($allPrimes as $p) {
        $maxC = max($t1[$p] ?? 0, $t2[$p] ?? 0);
        for ($i = 0; $i < $maxC; $i++) $pf[] = $p;
    }

    $lcm = 1;
    foreach ($pf as $p) $lcm *= $p;

    // Compute GCF (for use in distractor perturbations)
    $cf = [];
    foreach ($t1 as $p => $c) {
        $minC = min($c, $t2[$p] ?? 0);
        for ($i = 0; $i < $minC; $i++) $cf[] = $p;
    }
    $gcf = 1;
    foreach ($cf as $p) $gcf *= $p;

    $ansStr = (string)(int)$lcm;

    // Build feedback explanation
    $f1Display = '1 ' . implode(' ', $factors1);
    $f2Display = '1 ' . implode(' ', $factors2);
    $multCalc  = '1';
    foreach ($pf as $p) $multCalc .= ' x ' . $p;

    $soln = "The prime factors of $num1 are: [ $f1Display ]<br>"
          . "The prime factors of $num2 are: [ $f2Display ]<br>"
          . "So their least common multiple is<br>"
          . "$multCalc = <strong style='color:#CC0066;'>$lcm</strong>.";

    $distractors = make_lcm_distractors($num1, $num2, $lcm, $gcf, 3);
    $choices = array_merge([$ansStr], $distractors);
    $choices = array_values(array_unique($choices));
    $d = 1;
    while (count($choices) < 4) {
        foreach ([$lcm + $d, $lcm - $d] as $cv) {
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
        'lcm'     => $lcm,
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
        The least common multiple of
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