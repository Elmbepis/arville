<?php
// math/modules/word-time.php
// MULTIPLE CHOICE (4 choices). Time word problems.
// Single difficulty (Easy). Grade 1-2: direct answers. Grade 3+: converted.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: adaptive step (1/5/10 by magnitude) — small answers get
// unit offsets, larger ones get step-5 or step-10 (preserves last digit
// for step 10). Time values are natural multiples of 5/60 so this clusters
// choices realistically.
//
// Replaced &times; entities with x per rendering rule.
// Theme: paper-69-*.
// DB row required: modules.url = 'word-time.php'

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

$moduleTitle = 'Word Problems Involving Time';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(1, $grd));

$red = '<span style="color:#CC0066;font-weight:700;">';
$vio = '<span style="color:#800080;font-weight:700;">';
$end = '</span>';

function make_time_distractors($correct, $n = 3) {
    $ic = (int)round($correct);
    $seen = [$ic => true];
    $out  = [];

    if ($ic < 10)       $step = 1;
    elseif ($ic < 100)  $step = 5;
    elseif ($ic < 1000) $step = 10;
    else                $step = 30;

    $mults = [1, 2, 3, 4, 5, 6];
    shuffle($mults);

    foreach ($mults as $m) {
        if (count($out) >= $n) break;
        $delta = $m * $step;
        foreach ([+$delta, -$delta] as $signed) {
            $cv = $ic + $signed;
            if ($cv <= 0) continue;
            if (isset($seen[$cv])) continue;
            $seen[$cv] = true;
            $out[] = (string)$cv;
            if (count($out) >= $n) break 2;
        }
    }

    // Fallback: ±1, ±2, ...
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ic + $d, $ic - $d] as $cv) {
            if ($cv <= 0) continue;
            if (isset($seen[$cv])) continue;
            $seen[$cv] = true;
            $out[] = (string)$cv;
            if (count($out) >= $n) break 2;
        }
        $d++;
    }

    return $out;
}

// ============================================================
// HANDLE ANSWER CLICK  (GET ?ansclick=X)
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
    $boys  = ['Alfred','Ben','Carlo','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lito','Mario','Roberto','Samuel','Tommy'];
    $girls = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];
    $name  = (rand(1, 2) === 1) ? $boys[array_rand($boys)] : $girls[array_rand($girls)];

    $qopt = rand(1, 3);
    $question = ''; $soln = ''; $ans = 0; $unit = '';

    if ($qopt === 1) {
        do { $month = rand(1, 12); } while ($month === 2);
        $start0 = new DateTime('2020-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad(rand(5, 28), 2, '0', STR_PAD_LEFT));
        $start0->modify('+' . rand(1, 23) . ' hours');

        $startDay   = (int)$start0->format('j');
        $startMonth = $start0->format('F');
        $startDisp  = $start0->format('l, F j, Y');

        $daysDiff = ($grdKey === 1) ? rand(3, 12) : rand(11, 28);

        $end0 = clone $start0;
        $end0->modify("+{$daysDiff} days");
        $endDay   = (int)$end0->format('j');
        $endMonth = $end0->format('F');
        $endDisp  = $end0->format('l, F j, Y');

        $occasions = ['my birthday', "my brother's birthday", "my sister's birthday", "my mother's birthday", "my father's birthday", "$name's birthday", "$name's birthday", "$name's birthday"];
        $occasion  = $occasions[array_rand($occasions)];

        if ($grdKey >= 3) {
            $question = "Today is $red$startDisp$end. " . ucfirst($occasion) . " is on $red$endDisp$end. How many hours away is $occasion at this exact time?";
        } else {
            $question = "Today is $red$startDisp$end. " . ucfirst($occasion) . " is on $red$endDisp$end. How many days away is $occasion?";
        }

        if ($startMonth === $endMonth) {
            $soln = "Days away = $endDay - $startDay = $daysDiff days";
        } else {
            $md = in_array($startMonth, ['April','June','September','November'], true) ? 30 : 31;
            $soln  = "There are $md days in $startMonth.<br>";
            $soln .= "Days away = $md - $startDay + $endDay = $daysDiff days";
        }

        if ($grdKey >= 3) {
            $ans  = $daysDiff * 24;
            $unit = 'hours';
            $soln .= "<br>$daysDiff days x 24 hours/day = $ans hours";
        } else {
            $ans  = $daysDiff;
            $unit = 'days';
        }

    } elseif ($qopt === 2) {
        $start0 = new DateTime('2020-01-15');
        $start0->modify('+' . rand(1, 23) . ' hours');
        $start0->modify('+' . rand(1, 59) . ' minutes');

        $startH    = (int)$start0->format('H');
        $startDay  = $start0->format('l');
        $startDisp = $start0->format('g:i:s a, l');

        $hoursDiff = ($grdKey === 1) ? rand(3, 13) : rand(3, 23);

        $end0 = clone $start0;
        $end0->modify("+{$hoursDiff} hours");
        $endH    = (int)$end0->format('H');
        $endDay  = $end0->format('l');
        $endDisp = $end0->format('g:i:s a, l');

        if ($grdKey >= 3) {
            $question = "It is $red$startDisp$end.<br>How many minutes away is $red$endDisp$end?";
        } else {
            $question = "It is $red$startDisp$end.<br>How many hours away is $red$endDisp$end?";
        }

        if ($startDay === $endDay) {
            $soln  = "End time = " . $end0->format('H:i:s') . "<br>";
            $soln .= "Start time = " . $start0->format('H:i:s') . "<br>";
            $soln .= "Hours away = $endH - $startH = $hoursDiff hours";
        } else {
            $soln = "24 - $startH + $endH = $hoursDiff hours";
        }

        if ($grdKey >= 3) {
            $ans  = $hoursDiff * 60;
            $unit = 'minutes';
            $soln .= "<br>$hoursDiff hours x 60 minutes/hour = $ans minutes";
        } else {
            $ans  = $hoursDiff;
            $unit = 'hours';
        }

    } else {
        $start0 = new DateTime('2020-01-15');
        $start0->modify('+' . rand(1, 23) . ' hours');
        $start0->modify('+' . rand(1, 59) . ' minutes');

        $startH    = (int)$start0->format('H');
        $startM    = (int)$start0->format('i');
        $startDisp = $start0->format('g:i:s a, l');

        if ($grdKey === 1) {
            $minutesDiff = [15, 30, 45, 60][array_rand([15, 30, 45, 60])];
        } else {
            $minutesDiff = rand(5, 59);
        }

        $end0 = clone $start0;
        $end0->modify("+{$minutesDiff} minutes");
        $endH    = (int)$end0->format('H');
        $endM    = (int)$end0->format('i');
        $endDisp = $end0->format('g:i:s a, l');

        if ($grdKey >= 3) {
            $question = "It is $red$startDisp$end.<br>How many seconds away is $red$endDisp$end?";
        } else {
            $question = "It is $red$startDisp$end.<br>How many minutes away is $red$endDisp$end?";
        }

        if ($startH === $endH) {
            $soln  = "End minutes = $endM<br>";
            $soln .= "Start minutes = $startM<br>";
            $soln .= "Minutes away = $endM - $startM = $minutesDiff minutes";
        } else {
            $soln = "60 minutes - $startM minutes + $endM minutes = $minutesDiff minutes";
        }

        if ($grdKey >= 3) {
            $ans  = $minutesDiff * 60;
            $unit = 'seconds';
            $soln .= "<br>$minutesDiff minutes x 60 seconds/minute = $ans seconds";
        } else {
            $ans  = $minutesDiff;
            $unit = 'minutes';
        }
    }

    $soln .= "<br>The correct answer is therefore $ans $unit.";
    $ansStr = (string)(int)$ans;

    $distractors = make_time_distractors($ans, 3);
    $choices = array_merge([$ansStr], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'ans_str'  => $ansStr,
        'unit'     => $unit,
        'question' => $question,
        'soln'     => $soln,
        'choices'  => $choices,
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
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php
    $cur = $result['cur'];
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#CC0066; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Let's review the problem:</p>
    <p class="statement" style="font-size:15pt; color:#800080;"><?php echo $cur['question']; ?></p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.6;"><?php echo $cur['soln']; ?></div>

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