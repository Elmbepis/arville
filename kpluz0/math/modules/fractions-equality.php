<?php
// math/modules/fractions-equality.php
// MULTIPLE CHOICE (4 choices). Equivalent fractions — find the missing term.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: pedagogical — targets common scale-factor mistakes.
//   - wrong factor (k±1 instead of k)
//   - add-instead-of-multiply confusion
//   - swap numerator/denominator
//   - cross-multiplication error
// Then falls back to ±1/±2 arithmetic slips.
//
// Legacy: grades 4-6, 3 levels. New: 2 levels
//         (Easy = legacy Easy, Hard = legacy Medium, per §E).
// Theme: test2-* (136/547/136) &#8594; paper-69-*.
// DB row required: modules.url = 'fractions-equality.php'

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

$moduleTitle = 'Equality of Fractions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function make_eq_distractors($form, $num1, $num2, $num3, $num4, $factor, $n = 3) {
    if ($form == 1)      $correct = $num1;
    elseif ($form == 2)  $correct = $num2;
    elseif ($form == 3)  $correct = $num3;
    else                 $correct = $num4;

    $cands = [];

    if ($form == 3 || $form == 4) {
        // Missing on new side: multiply was needed
        $base = ($form == 3) ? $num1 : $num2;
        $cands[] = $base * ($factor + 1);            // wrong factor up
        if ($factor > 1) $cands[] = $base * ($factor - 1);  // wrong factor down
        $cands[] = $base + $factor;                  // added instead of multiplied
        $cands[] = $base * 2;                        // used factor 2
        $cands[] = ($form == 3) ? $num2 : $num1;     // swapped N/D
        $cands[] = ($form == 3) ? $num4 : $num3;     // used other denominator
    } else {
        // Missing on original side: divide was needed
        $big = ($form == 1) ? $num3 : $num4;
        if (($factor + 1) > 0 && $big % ($factor + 1) === 0) $cands[] = intdiv($big, $factor + 1);
        if ($factor > 1 && $big % ($factor - 1) === 0)       $cands[] = intdiv($big, $factor - 1);
        $cands[] = $big - $factor;
        if ($big % 2 === 0) $cands[] = intdiv($big, 2);
        $cands[] = ($form == 1) ? $num4 : $num3;
        $cands[] = ($form == 1) ? $num2 : $num1;
    }

    // Arithmetic slips
    $cands[] = $correct + 1;
    $cands[] = $correct - 1;
    $cands[] = $correct + 2;
    $cands[] = $correct - 2;
    $cands[] = $correct * 2;

    $correctStr = (string)$correct;
    $seen = [$correctStr => true];
    $out  = [];
    shuffle($cands);
    foreach ($cands as $c) {
        $c = (int)$c;
        if ($c <= 0) continue;
        $cs = (string)$c;
        if (isset($seen[$cs])) continue;
        $seen[$cs] = true;
        $out[] = $cs;
        if (count($out) >= $n) break;
    }
    $d = 1;
    while (count($out) < $n) {
        foreach ([$correct + $d, $correct - $d] as $cv) {
            if ($cv > 0) {
                $cs = (string)$cv;
                if (!isset($seen[$cs])) {
                    $seen[$cs] = true;
                    $out[] = $cs;
                    if (count($out) >= $n) break 2;
                }
            }
        }
        $d++;
    }

    return $out;
}

function render_single_fraction($top, $bottom) {
    $topIsQ    = ($top === '?');
    $bottomIsQ = ($bottom === '?');
    $topStyle    = $topIsQ    ? 'color:#CC0066;' : 'color:#800080;';
    $bottomStyle = $bottomIsQ ? 'color:#CC0066;' : 'color:#800080;';
    return '<div class="frac-display" style="font-size:28pt;">'
         . '<span style="' . $topStyle . '">' . $top . '</span>'
         . '<div class="frac-bar"></div>'
         . '<span style="' . $bottomStyle . '">' . $bottom . '</span>'
         . '</div>';
}

function render_eq_display($num1, $num2, $num3, $num4, $form) {
    $parts = [$num1, $num2, $num3, $num4];
    if ($form == 1) $parts[0] = '?';
    if ($form == 2) $parts[1] = '?';
    if ($form == 3) $parts[2] = '?';
    if ($form == 4) $parts[3] = '?';

    return '<div style="display:inline-flex; align-items:center; gap:24px; flex-wrap:wrap; justify-content:center;">'
         . render_single_fraction($parts[0], $parts[1])
         . '<span style="font-size:28pt; color:#800080; font-weight:700; line-height:1; align-self:center;">=</span>'
         . render_single_fraction($parts[2], $parts[3])
         . '</div>';
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
    // [numlimit1, numlimit2, faclimit1, faclimit2]
    $configs = [
        4 => [
            'Easy' => [1,  10, 2, 8],
            'Hard' => [7,  15, 4, 11],   // legacy Medium
        ],
        5 => [
            'Easy' => [7,  15, 4, 11],
            'Hard' => [11, 19, 7, 16],   // legacy Medium
        ],
        6 => [
            'Easy' => [11, 19, 9, 17],
            'Hard' => [19, 35, 11, 22],  // legacy Medium
        ],
    ];
    [$numlimit1, $numlimit2, $faclimit1, $faclimit2] = $configs[$grd][$lvl];

    $num1 = rand($numlimit1, $numlimit2);
    $safety = 0;
    do {
        $num2 = rand($numlimit1, $numlimit2);
        $safety++;
    } while ($num1 == $num2 && $safety < 30);

    $safety = 0;
    do {
        $factor = rand($faclimit1, $faclimit2);
        $safety++;
    } while ($factor == 10 && $safety < 20);

    $num3 = $num1 * $factor;
    $num4 = $num2 * $factor;

    $form = rand(1, 4);

    if ($form == 1)      { $ans = $num1; $crossCalc = "({$num2} x {$num3}) / {$num4}"; }
    elseif ($form == 2)  { $ans = $num2; $crossCalc = "({$num1} x {$num4}) / {$num3}"; }
    elseif ($form == 3)  { $ans = $num3; $crossCalc = "({$num1} x {$num4}) / {$num2}"; }
    else                 { $ans = $num4; $crossCalc = "({$num2} x {$num3}) / {$num1}"; }

    $ansStr = (string)(int)$ans;

    $soln = "Cross-multiply:<br>"
          . "Missing term = $crossCalc = <strong style='color:#CC0066;'>$ansStr</strong>.<br>"
          . "Check: {$num1}/{$num2} = {$num3}/{$num4} (scale factor {$factor}).";

    $distractors = make_eq_distractors($form, $num1, $num2, $num3, $num4, $factor, 3);
    $choices = array_merge([$ansStr], $distractors);
    $choices = array_values(array_unique($choices));
    $d = 1;
    while (count($choices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $cv) {
            $cs = (string)(int)$cv;
            if ($cv > 0 && !in_array($cs, $choices)) {
                $choices[] = $cs;
                if (count($choices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'num1'    => $num1,
        'num2'    => $num2,
        'num3'    => $num3,
        'num4'    => $num4,
        'factor'  => $factor,
        'form'    => $form,
        'ans'     => $ans,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
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

    <div style="margin:20px 0;">
    <?php echo render_eq_display($cur['num1'], $cur['num2'], $cur['num3'], $cur['num4'], 0); ?>
</div>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.7; text-align:center; max-width:520px;">
        <?php echo $cur['soln']; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:13pt; font-weight:600; color:#800080; margin-top:20px;">
        Find the missing value that makes the fractions equal.
    </p>

    <div style="margin:25px 0;">
        <?php echo render_eq_display($q['num1'], $q['num2'], $q['num3'], $q['num4'], $q['form']); ?>
    </div>

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