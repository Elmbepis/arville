<?php
// math/modules/improper-mixed.php
// MULTIPLE CHOICE (4 choices). Improper &#8596; Mixed fractions.
// Uses ?ansclick=X + 2x2 grid (modernized from legacy 1-column layout).
// Single-level (Easy) — legacy forced Easy.
//
// Two question modes (rand 1-2):
//   opt=1: Improper &#8594; Mixed. Answer "W N/D".
//          Distractors: (W±1) N/D, W (N±1)/D, (W±1)(N±1)/D.
//   opt=2: Mixed &#8594; Improper. Answer "(D×W+N)/D".
//          Distractors: (X±1)/D, (X±2)/D, (X±3)/D.
// All distractors filtered for validity (positive, proper fraction part
// stays in [1, D-1], etc.) and deduplicated.
//
// Theme: test67-* (110/582/108) &#8594; paper-69-*.
// DB row required: modules.url = 'improper-mixed.php'

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

$moduleTitle = 'Improper and Mixed Fractions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

// Reduce fraction to lowest terms
function reduce_frac($n, $d) {
    $primes = [2,3,5,7,11,13,17,19,23];
    foreach ($primes as $p) {
        while ($n % $p == 0 && $d % $p == 0) {
            $n = intdiv($n, $p);
            $d = intdiv($d, $p);
        }
    }
    return [$n, $d];
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
    $isCorrect = $scorer->processAnswer($clicked, $cur['ans_str'], $lvl);

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
    $opt = rand(1, 2);
    $choices = [];
    $ansStr  = '';
    $qDisp   = '';
    $soln    = '';

    if ($opt == 1) {
        // Improper &#8594; Mixed
        $safety = 0;
        do {
            $numer = rand(3, 26);
            $denom = rand(5, 29);
            $whole = rand(2, 9);
            $safety++;
        } while ($numer >= $denom - 2 && $safety < 30);

        [$numer, $denom] = reduce_frac($numer, $denom);

        $improperNum = $denom * $whole + $numer;
        $qDisp = $improperNum . "/" . $denom;
        $ansStr = $whole . " " . $numer . "/" . $denom;

        // Distractors
        $cands = [];
        $cands[] = ($whole + 1) . " " . $numer . "/" . $denom;
        if ($whole > 1) $cands[] = ($whole - 1) . " " . $numer . "/" . $denom;
        if ($numer + 1 < $denom) $cands[] = $whole . " " . ($numer + 1) . "/" . $denom;
        if ($numer - 1 >= 1)     $cands[] = $whole . " " . ($numer - 1) . "/" . $denom;
        $bothNum = ($numer > 1) ? $numer - 1 : $numer + 1;
        $cands[] = ($whole + 1) . " " . $bothNum . "/" . $denom;

        // Dedupe
        $seen = [$ansStr => true];
        foreach ($cands as $c) {
            if (!isset($seen[$c])) {
                $seen[$c] = true;
                $choices[] = $c;
                if (count($choices) >= 3) break;
            }
        }

        $soln = "Improper to Mixed:<br>"
              . "numerator &divide; denominator = $improperNum &divide; $denom = $whole remainder $numer<br>"
              . "So $improperNum/$denom = <strong style='color:#CC0066;'>$whole $numer/$denom</strong>.";

    } else {
        // Mixed &#8594; Improper
        $safety = 0;
        do {
            $numer = rand(1, 26);
            $denom = rand(5, 29);
            $whole = rand(1, 9);
            $safety++;
        } while ($numer >= $denom && $safety < 30);

        [$numer, $denom] = reduce_frac($numer, $denom);

        $qDisp = $whole . " " . $numer . "/" . $denom;
        $improperNum = $denom * $whole + $numer;
        $ansStr = $improperNum . "/" . $denom;

        // Distractors: (±1, ±2, ±3)/denom
        $cands = [];
        foreach ([1, -1, 2, -2, 3, -3] as $off) {
            $x = $improperNum + $off;
            if ($x > 0) $cands[] = $x . "/" . $denom;
        }

        $seen = [$ansStr => true];
        foreach ($cands as $c) {
            if (!isset($seen[$c])) {
                $seen[$c] = true;
                $choices[] = $c;
                if (count($choices) >= 3) break;
            }
        }        $soln = "Mixed to Improper:<br>"
              . "new numerator = (denominator x whole) + numerator<br>"
              . "= ($denom x $whole) + $numer = " . ($denom*$whole) . " + $numer = <strong style='color:#CC0066;'>$improperNum</strong><br>"
              . "So $whole $numer/$denom = <strong style='color:#CC0066;'>$ansStr</strong>.";
    }

    // Ensure we have 4 distinct choices
    $allChoices = array_merge([$ansStr], $choices);
    $allChoices = array_values(array_unique($allChoices));
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'opt'      => $opt,
        'question' => $qDisp,
        'ans_str'  => $ansStr,
        'soln'     => $soln,
        'choices'  => $allChoices,
        'lvl'      => $lvl,
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
    'score_top'     => $base . '/math/images/score-top-2.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-2.jpg',
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

    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:20px;">
        <?php echo $cur['question']; ?> = <span style="color:#CC0066;"><?php echo $cur['ans_str']; ?></span>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.7; text-align:center; max-width:520px;">
        <?php echo $cur['soln']; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:20pt; font-weight:700; color:#CC0066; margin:20px 0;">
        <?php echo $q['question']; ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444; margin-top:15px;">
        <?php echo ($q['opt'] == 1)
            ? 'Convert the given improper fraction into a mixed number.'
            : 'Convert the given mixed number into an improper fraction.'; ?>
    </p>
    <p style="font-size:13pt; font-weight:500; color:#444;">
        Click on your answer.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:420px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box; font-size:1.4rem;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php endif; ?>

    <?php render_score_box(); ?>
</form>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();