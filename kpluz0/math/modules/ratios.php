<?php
// math/modules/ratios.php
// MULTIPLE CHOICE (4 choices). Ratio and Proportion.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: choices are the OTHER THREE VISIBLE TERMS from the
// proportion itself. A student who picks the wrong term from the equation
// (common error mode) will select a distractor; only the correctly
// cross-multiplied term yields the answer. Fall back to numeric
// perturbations only if the visible terms aren't distinct enough.
//
// Legacy: grades 4-6, 3 levels. New: 2 levels
//         (Easy = legacy Easy, Hard = legacy Medium, per §E).
// Legacy Hard (with negatives) dropped — pedagogically inconsistent
// for grade 6.
// Theme: test2-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'ratios.php'

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

$moduleTitle = 'Ratio and Proportion';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function canon_ratio($v) {
    $r = round((float)$v, 4);
    if (abs($r - round($r)) < 0.0001) return (string)(int)round($r);
    return rtrim(rtrim(number_format($r, 4, '.', ''), '0'), '.');
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
    $isCorrect = $scorer->processAnswer(canon_ratio($clicked), $cur['ans_canon'], $cur['lvl']);

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
    // [numlimit1, numlimit2, faclimit1, faclimit2, dec]
    $configs = [
        4 => [
            'Easy' => [1,  10, 2, 9,  0],
            'Hard' => [7,  19, 4, 12, 0],
        ],
        5 => [
            'Easy' => [1,  10, 2, 9,  0],
            'Hard' => [7,  19, 4, 12, 0],
        ],
        6 => [
            'Easy' => [15, 35, 5, 13, 1],
            'Hard' => [18, 49, 7, 18, 2],
        ],
    ];
    [$numlimit1, $numlimit2, $faclimit1, $faclimit2, $dec] = $configs[$grd][$lvl];

    // Generate the two base terms
    $n1 = rand($numlimit1, $numlimit2);
    $safety = 0;
    do {
        $n2 = rand($numlimit1, $numlimit2);
        $safety++;
    } while ($n1 == $n2 && $safety < 30);

    // Multiplicative factor
    if ($dec != 0) {
        $decPow = pow(10, rand(0, $dec - 1));
        $safety = 0;
        do {
            $factor = rand($faclimit1, $faclimit2) / $decPow;
            $safety++;
        } while ($factor == 10 && $safety < 20);
    } else {
        $safety = 0;
        do {
            $factor = rand($faclimit1, $faclimit2);
            $safety++;
        } while ($factor == 10 && $safety < 20);
    }

    $n3 = $n1 * $factor;
    $n4 = $n2 * $factor;

    // Pick form (which term is missing)
    $form = rand(1, 4);
    // 1: n1 : n2 = ? : n4   &#8594; ans = n3
    // 2: n1 : n2 = n3 : ?   &#8594; ans = n4
    // 3: ? : n2 = n3 : n4   &#8594; ans = n1
    // 4: n1 : ? = n3 : n4   &#8594; ans = n2

    if ($form == 1) {
        $question  = "$n1 : $n2 = ? : $n4";
        $ans       = $n3;
        $visible   = [$n1, $n2, $n4];
        $crossCalc = "($n1 x $n4) / $n2";
    } elseif ($form == 2) {
        $question  = "$n1 : $n2 = $n3 : ?";
        $ans       = $n4;
        $visible   = [$n1, $n2, $n3];
        $crossCalc = "($n2 x $n3) / $n1";
    } elseif ($form == 3) {
        $question  = "? : $n2 = $n3 : $n4";
        $ans       = $n1;
        $visible   = [$n2, $n3, $n4];
        $crossCalc = "($n2 x $n3) / $n4";
    } else {
        $question  = "$n1 : ? = $n3 : $n4";
        $ans       = $n2;
        $visible   = [$n1, $n3, $n4];
        $crossCalc = "($n1 x $n4) / $n3";
    }

    $ansCanon = canon_ratio($ans);

    // Distractors: other visible terms first
    $seen = [$ansCanon => true];
    $out  = [];
    foreach ($visible as $v) {
        $vs = canon_ratio($v);
        if (isset($seen[$vs])) continue;
        $seen[$vs] = true;
        $out[] = $vs;
        if (count($out) >= 3) break;
    }

    // Fallback: numeric perturbations
    $d = 1;
    while (count($out) < 3) {
        foreach ([$ans + $d, $ans - $d] as $cv) {
            if ($cv > 0) {
                $cs = canon_ratio($cv);
                if (!isset($seen[$cs])) {
                    $seen[$cs] = true;
                    $out[] = $cs;
                    if (count($out) >= 3) break 2;
                }
            }
        }
        $d++;
    }

    $choices = array_merge([$ansCanon], $out);
    shuffle($choices);

    $soln = "Use cross-multiplication.<br>"
          . "Missing term = $crossCalc = " . canon_ratio($ans);

    $_SESSION[$sessionKey]['current'] = [
        'question'  => $question,
        'ans'       => $ans,
        'ans_canon' => $ansCanon,
        'soln'      => $soln,
        'form'      => $form,
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
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:14pt; font-weight:700; color:#800080; margin-top:15px;">
        Completed proportion: <span style="color:#CC0066;"><?php
            echo str_replace('?', $cur['ans_canon'], $cur['question']);
        ?></span>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.6; text-align:center; max-width:520px;">
        <?php echo $cur['soln']; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:14pt; font-weight:600; color:#800080; margin-top:20px;">
        Find the missing term:
    </p>
    <p style="font-size:24pt; font-weight:700; color:#CC0066; margin:15px 0;">
        <?php echo $q['question']; ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444; margin-top:20px;">
        Click on your answer.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:400px; margin:20px auto;">
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