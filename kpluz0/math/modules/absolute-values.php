<?php
// math/modules/absolute-values.php
// PROCEDURAL absolute-value arithmetic. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels merged per §E:
//   Easy = q1, q2, q3 (simple abs; matches legacy Easy content)
//   Hard = q4, q5 (grd < 7) or q6, q7 (grd >= 7) — complex abs with negatives
//   Legacy Medium folds into Easy/Hard per question-type availability.
//
// §H bug fixes:
//   • $grd was referenced everywhere but never assigned &#8594; all branches failed
//     silently. Fixed: $_SESSION['grade'] ?? 6.
//   • Title check used $grd==7 (missed grade 8+). Now $grd>=7.
//   • Hard grd>=7 had no numlimit &#8594; fell to defaults 15-149 (too small).
//     Now uses 119-499.
//
// Feedback: no solution display (per user request). $soln is still computed
// and stored in session — re-add the solution <div> in the feedback block
// to re-enable it.
//
// Theme: test23b-* (136/547/117) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1 default (test23b-score.jpg is embedded in the legacy
//            frame, not a standard 114×85 / 114×60 pair).
// DB row required: modules.url = 'absolute-values.php'

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

$grd = (int)($_SESSION['grade'] ?? 6);  // §H fix — was never assigned
$titleBase = ($grd >= 7) ? 'Negative Numbers & Absolute Values' : 'Absolute Values';
$moduleId  = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels     = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$moduleTitle = $titleBase;

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function make_abs_distractors($ans, $extra, $n = 3) {
    $seen = [(string)(int)$ans => true];
    $out  = [];
    $base = [
        $ans + 1, $ans - 1, $ans + 2, $ans - 2, $ans + 10, $ans - 10,
        -$ans, abs($ans),
    ];
    shuffle($extra);
    foreach (array_merge($extra, $base) as $c) {
        $c = (int)$c;
        if (!isset($seen[(string)$c]) && count($out) < $n) {
            $seen[(string)$c] = true;
            $out[] = $c;
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
    // Number-range limits per level/grade — §H fix (was undefined for many grades)
    $numlimit1 = 15; $numlimit2 = 149;
    if ($lvl === 'Easy' && $grd >= 7) { $numlimit1 = 79; $numlimit2 = 149; }
    if ($lvl === 'Hard')              { $numlimit1 = 119; $numlimit2 = 499; }

    $num1 = rand($numlimit1, $numlimit2);
    $num2 = rand($numlimit1, $numlimit2);
    $sign3 = pow(-1, rand(1, 2));
    $sign4 = pow(-1, rand(1, 2));
    $num3 = $sign3 * rand($numlimit1, $numlimit2);
    $num4 = $sign4 * rand($numlimit1, $numlimit2);
    // Ensure at least one of num3/num4 is negative (legacy constraint)
    $guard = 0;
    while ($num3 > 0 && $num4 > 0 && $guard < 30) {
        $sign3 = pow(-1, rand(1, 2));
        $sign4 = pow(-1, rand(1, 2));
        $num3 = $sign3 * rand($numlimit1, $numlimit2);
        $num4 = $sign4 * rand($numlimit1, $numlimit2);
        $guard++;
    }

    // Q-type selection per merged Easy/Hard
    if ($lvl === 'Easy') {
        $q = rand(1, 3);
    } else {
        $q = ($grd >= 7) ? rand(6, 7) : rand(4, 5);
    }

    $extra = [];
    if ($q == 1) {
        // |num3| ± num1
        if (rand(1, 2) == 1) {
            $prompt = '|' . hl($num3) . '| + ' . hl($num1) . ' = ?';
            $ans    = abs($num3) + $num1;
            $extra  = [$num3, -$num3, abs($num3), abs($num3) - $num1, abs($num3) + $num1 + 1];
        } else {
            $prompt = '|' . hl($num3) . '| - ' . hl($num1) . ' = ?';
            $ans    = abs($num3) - $num1;
            $extra  = [$num3, -$num3, abs($num3), abs($num3) + $num1, abs($num3) - $num1 + 1];
        }
        $soln = '|' . $num3 . '| = ' . abs($num3) . '<br>';
        $soln .= 'Answer = ' . $ans;
    }
    elseif ($q == 2) {
        $prompt = '|' . hl($num2) . ' - ' . hl($num1) . '| = ?';
        $ans    = abs($num2 - $num1);
        $extra  = [$num2 - $num1, $num1 - $num2, $num2 + $num1, -$ans];
        $soln   = '|' . $num2 . ' - ' . $num1 . '| = |' . ($num2 - $num1) . '| = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 3) {
        $prompt = '|' . hl($num2) . ' - (' . hl(-$num1) . ')| = ?';
        $ans    = abs($num2 - (-$num1));
        $extra  = [$num2 - $num1, abs($num2 - $num1), -$ans, $num2 + $num1 + 1];
        $soln   = '|' . $num2 . ' - (' . (-$num1) . ')| = |' . ($num2 + $num1) . '| = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 4) {
        $prompt = '|' . hl(-$num2) . ' - ' . hl($num1) . '| = ?';
        $ans    = abs(-$num2 - $num1);
        $extra  = [$num2 - $num1, abs($num2 - $num1), -$ans, $num2 + $num1 + 1];
        $soln   = '|' . (-$num2) . ' - ' . $num1 . '| = |' . (-$num2 - $num1) . '| = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 5) {
        $prompt = '|' . hl(-$num2) . ' - (' . hl(-$num1) . ')| = ?';
        $ans    = abs(-$num2 - (-$num1));
        $extra  = [$num1 + $num2, abs($num1 - $num2), -$ans, $ans + 1];
        $soln   = '|' . (-$num2) . ' - (' . (-$num1) . ')| = |' . ($num1 - $num2) . '| = <strong>' . $ans . '</strong>';
    }
    elseif ($q == 6) {
        // Complex: |a - (-b)| ± |c - d|
        $num1 = rand(49, 499);
        $num2 = rand(49, 499);
        $num3 = rand(49, 499);
        $num4 = rand(49, 499);
        if (rand(1, 2) == 1) {
            $expr1 = abs(-$num2 - (-$num1));
            $expr2 = abs($num4 - $num3);
            $prompt = '|' . hl(-$num2) . ' - (' . hl(-$num1) . ')| - |' . hl($num4) . ' - ' . hl($num3) . '| = ?';
            $ans    = $expr1 - $expr2;
            $extra  = [$expr1 + $expr2, $expr2 - $expr1, -$ans, abs($expr1 - $expr2)];
            $soln   = '|' . (-$num2) . ' - (' . (-$num1) . ')| - |' . $num4 . ' - ' . $num3 . '|<br>';
            $soln  .= '= |' . ($num1 - $num2) . '| - |' . ($num4 - $num3) . '|<br>';
            $soln  .= '= ' . $expr1 . ' - ' . $expr2 . ' = <strong>' . $ans . '</strong>';
        } else {
            $expr1 = abs(-$num2 - $num1);
            $expr2 = abs($num4 - $num3);
            $prompt = '|' . hl(-$num2) . ' + (' . hl(-$num1) . ')| - |' . hl($num4) . ' - ' . hl($num3) . '| = ?';
            $ans    = $expr1 - $expr2;
            $extra  = [$expr1 + $expr2, $expr2 - $expr1, -$ans, abs($expr1 - $expr2)];
            $soln   = '|' . (-$num2) . ' + (' . (-$num1) . ')| - |' . $num4 . ' - ' . $num3 . '|<br>';
            $soln  .= '= |' . (-$num2 - $num1) . '| - |' . ($num4 - $num3) . '|<br>';
            $soln  .= '= ' . $expr1 . ' - ' . $expr2 . ' = <strong>' . $ans . '</strong>';
        }
    }
    else {
        // q == 7: |a - (-b)| + |c ± (-d)|
        $num1 = rand(49, 499);
        $num2 = rand(49, 499);
        $num3 = rand(49, 499);
        $num4 = rand(49, 499);
        if (rand(1, 2) == 1) {
            $expr1 = abs(-$num2 - (-$num1));
            $expr2 = abs(-$num4 - $num3);
            $prompt = '|' . hl(-$num2) . ' - (' . hl(-$num1) . ')| + |' . hl(-$num4) . ' + (' . hl(-$num3) . ')| = ?';
            $ans    = $expr1 + $expr2;
            $extra  = [$expr1 - $expr2, $expr2 - $expr1, -$ans, $ans + 1];
            $soln   = '|' . (-$num2) . ' - (' . (-$num1) . ')| + |' . (-$num4) . ' + (' . (-$num3) . ')|<br>';
            $soln  .= '= |' . ($num1 - $num2) . '| + |' . (-$num4 - $num3) . '|<br>';
            $soln  .= '= ' . $expr1 . ' + ' . $expr2 . ' = <strong>' . $ans . '</strong>';
        } else {
            $expr1 = abs(-$num2 - (-$num1));
            $expr2 = abs($num4 - $num3);
            $prompt = '|' . hl(-$num2) . ' - (' . hl(-$num1) . ')| + |' . hl($num4) . ' + (' . hl(-$num3) . ')| = ?';
            $ans    = $expr1 + $expr2;
            $extra  = [$expr1 - $expr2, $expr2 - $expr1, -$ans, $ans + 1];
            $soln   = '|' . (-$num2) . ' - (' . (-$num1) . ')| + |' . $num4 . ' + (' . (-$num3) . ')|<br>';
            $soln  .= '= |' . ($num1 - $num2) . '| + |' . ($num4 - $num3) . '|<br>';
            $soln  .= '= ' . $expr1 . ' + ' . $expr2 . ' = <strong>' . $ans . '</strong>';
        }
    }

    $answerStr = (string)(int)$ans;
    $distractors = make_abs_distractors($ans, $extra, 3);
    $allChoices = array_map(function($c) { return (string)(int)$c; }, array_merge([$ans], $distractors));
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            $c = (int)$c;
            if (!in_array((string)$c, $allChoices, true)) {
                $allChoices[] = (string)$c;
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
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .hl-num { color:#CC0066; font-weight:700; }
  .choice-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .choice-grid-2x2 > div { display: contents; }
</style>
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
    <p style="font-size:18pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.5;">
        <?php echo $cur['prompt']; ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:22pt; font-weight:700; color:#800080; margin-top:40px; letter-spacing:1px;">
        <?php echo $q['prompt']; ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:20px;">Click on your answer.</p>
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