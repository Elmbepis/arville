<?php
// math/modules/word-temperature.php
// PROCEDURAL temperature word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcoded $_SESSION['level']="Easy" with no
// level radios. Collapsed to single-level — $_SESSION['level'] not touched.
//
// 3 question types preserved:
//   Type 1: heating (final = t0 + rate × time)
//   Type 2: cooling by ice (final = t0 - rate × volume)
//   Type 3: temp change + C&#8596;F conversion (qnum 1-2 are C&#8594;F, qnum 3 is F&#8594;C
//           but internally uses a different 2-way branch)
//
// Distractors: tight band (±max(2, 15% of answer)) — temperature answers
// are typically 10-200 degrees, so absolute slack of 2 degrees minimum
// gives realistic ±1..±15 distractors. Structurally-wrong answers (wrong
// direction of arithmetic, wrong conversion factor) stay in-band when they
// produce reasonable values; extreme outliers filtered.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-temperature.php'

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

$moduleTitle = 'Word Problems Involving Temperature';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

function fmt_temp($v) {
    $v = round((float)$v, 2);
    if (abs($v - round($v)) < 0.005) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 2, '.', ''), '0'), '.');
}

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

// ============================================================
// Distractor builder — tight band around answer.
// Band = max(2, 15% of answer). For temps around 40-90°C, that's 6-14
// degrees of slack; for F-conversions around 100-200°F, that's 15-30.
// ============================================================
function make_temp_distractors($ans, $candidates, $n = 3) {
    $ans = round((float)$ans, 2);
    $ansStr = fmt_temp($ans);
    $seen = [$ansStr => true];
    $out = [];

    $band = max(2, abs($ans) * 0.15);

    $cands = [];
    // Absolute slips — degrees are typically integers or 1-decimal
    foreach ([1, 2, 3, 4, 5, 6, 8, 10, 12, 15, 20] as $m) {
        $cands[] = $ans + $m;
        $cands[] = $ans - $m;
    }
    // Percent shifts
    foreach ([0.03, 0.05, 0.08, 0.10, 0.12] as $pct) {
        $cands[] = $ans * (1 + $pct);
        $cands[] = $ans * (1 - $pct);
    }
    // Pass-through candidates (filtered by band below)
    foreach ($candidates as $c) $cands[] = $c;

    shuffle($cands);
    foreach ($cands as $c) {
        $c = (float)$c;
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;
        $cs = fmt_temp($c);
        if (isset($seen[$cs])) continue;
        $seen[$cs] = true;
        $out[] = $cs;
        if (count($out) >= $n) break;
    }
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            if ($c <= 0) continue;
            $cs = fmt_temp($c);
            if (isset($seen[$cs])) continue;
            $seen[$cs] = true;
            $out[] = $cs;
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
    $qopt = rand(1, 3);
    $extra = [];

    if ($qopt == 1) {
        // Heating
        $t0 = rand(221, 321) * 0.1;
        $rate = rand(65, 99) * 0.1;
        do {
            $time = rand(21, 99) * 0.1;
            $ans = $t0 + $rate * $time;
        } while ($ans >= 100);
        $qnum = rand(1, 4);
        if ($qnum == 1)     $scene = "A stove is heating a kettle of water";
        elseif ($qnum == 2) $scene = "A pail of water is being heated by an electric heater";
        elseif ($qnum == 3) $scene = "A glass of water is being heated by a microwave oven";
        else                $scene = "A microwave oven is heating a cup of coffee";
        $prompt = $scene . " at a rate of " . hl(fmt_temp($rate)) . " degrees Celsius per minute. If the water's initial temperature is " . hl(fmt_temp($t0)) . " degrees Celsius, what would be its temperature after " . hl(fmt_temp($time)) . " minutes of being heated?";
        $soln  = "final temp = initial + (rate x time)<br>";
        $soln .= "= " . fmt_temp($t0) . " + (" . fmt_temp($rate) . " x " . fmt_temp($time) . ")<br>";
        $soln .= "= " . fmt_temp($t0) . " + " . fmt_temp($rate * $time) . "<br>";
        $soln .= "= <strong>" . fmt_temp($ans) . " degrees C</strong>";
        $extra = [
            $t0 - $rate * $time,
            $rate * $time,
            $t0 + $rate + $time,
            $t0 * $rate,
            $rate * $time * 1.1,
            $ans * 1.08,
            $ans * 0.92,
        ];
        $unit = 'degrees C';
    } elseif ($qopt == 2) {
        // Cooling by ice
        $t0 = rand(659, 995) * 0.1;
        $rate = rand(65, 99) * 0.1;
        do {
            $vol = rand(21, 129) * 0.1;
            $ans = $t0 - $rate * $vol;
        } while ($ans < 10);
        $qnum = rand(1, 3);
        if ($qnum == 1)     $scene = "A vat contains some hot water. Every liter of ice added to the water decreases its temperature by " . hl(fmt_temp($rate)) . " degrees Celsius.";
        elseif ($qnum == 2) $scene = "Every liter of ice added to the hot water in a tub decreases the water's temperature by " . hl(fmt_temp($rate)) . " degrees Celsius.";
        else                $scene = "Adding one liter of ice to a large basin containing some hot water would decrease the water's temperature by " . hl(fmt_temp($rate)) . " degrees Celsius.";
        $prompt = $scene . " If the water's initial temperature is " . hl(fmt_temp($t0)) . " degrees Celsius, what would be its final temperature if " . hl(fmt_temp($vol)) . " liters of ice is added to it?";
        $soln  = "final temp = initial - (temp decrease x volume)<br>";
        $soln .= "= " . fmt_temp($t0) . " - (" . fmt_temp($rate) . " x " . fmt_temp($vol) . ")<br>";
        $soln .= "= " . fmt_temp($t0) . " - " . fmt_temp($rate * $vol) . "<br>";
        $soln .= "= <strong>" . fmt_temp($ans) . " degrees C</strong>";
        $extra = [
            $t0 + $rate * $vol,
            $rate * $vol,
            $t0 - $rate - $vol,
            $t0 / $vol,
            $rate * $vol * 1.1,
            $ans * 1.08,
            $ans * 0.92,
        ];
        $unit = 'degrees C';
    } else {
        // Temperature change + C&#8596;F conversion
        if (rand(1, 2) == 1) {
            $t0 = rand(221, 321) * 0.1;
            $qnum = rand(1, 3);
            if ($qnum == 1)     { $add = rand(55, 199); $scene = "A metal rod was heated in a furnace, increasing its temperature by " . hl($add) . " degrees Celsius."; $thing = "metal rod"; }
            elseif ($qnum == 2) { $add = rand(25, 60);  $scene = "A glass of water was heated using a microwave oven, increasing its temperature by " . hl($add) . " degrees Celsius."; $thing = "water"; }
            else                { $add = rand(10, 50);  $scene = "The temperature of the hood of a car left under the sun increased by " . hl($add) . " degrees Celsius."; $thing = "hood of the car"; }
            $prompt = $scene . " If the initial temperature of the " . $thing . " was " . hl(fmt_temp($t0)) . " degrees Celsius, what is its final temperature in degrees Fahrenheit?";
            $cFinal = $t0 + $add;
            $ans = 9 / 5 * $cFinal + 32;
            $soln  = "final C = " . fmt_temp($t0) . " + " . $add . " = " . fmt_temp($cFinal) . " C<br>";
            $soln .= "final F = (9/5 x " . fmt_temp($cFinal) . ") + 32<br>";
            $soln .= "= <strong>" . fmt_temp($ans) . " degrees F</strong>";
            // Wrong-operation candidates: wrong conversion factor, forgot 32
            $extra = [
                9 / 5 * $cFinal,
                $cFinal + 32,
                5 / 9 * $cFinal + 32,
                $t0 + $add + 32,
                $ans * 1.05,
                $ans * 0.95,
            ];
            $unit = 'degrees F';
        } else {
            $qnum = rand(1, 3);
            if ($qnum == 1)     { $t0 = rand(250, 450); $dec = rand(150, 210); $scene = "Cold water was poured on a hot metal rod, decreasing its temperature by " . hl($dec) . " degrees Fahrenheit."; $thing = "metal rod"; }
            elseif ($qnum == 2) { $t0 = rand(167, 210); $dec = rand(90, 140);  $scene = "A glass of hot water was placed inside a refrigerator for several minutes, decreasing its temperature by " . hl($dec) . " degrees Fahrenheit."; $thing = "water"; }
            else                { $t0 = rand(149, 180); $dec = rand(70, 110);  $scene = "The temperature of the warm hood of a car decreased by " . hl($dec) . " degrees Fahrenheit after the car was transferred to a shaded area."; $thing = "hood of the car"; }
            $prompt = $scene . " If the initial temperature of the " . $thing . " was " . hl($t0) . " degrees Fahrenheit, what is its final temperature in degrees Celsius?";
            $fFinal = $t0 - $dec;
            $ans = round(($fFinal - 32) * 5 / 9, 2);
            $soln  = "final F = $t0 - $dec = " . fmt_temp($fFinal) . " F<br>";
            $soln .= "final C = (" . fmt_temp($fFinal) . " - 32) x 5/9<br>";
            $soln .= "= <strong>" . fmt_temp($ans) . " degrees C</strong>";
            $extra = [
                round(($fFinal + 32) * 5 / 9, 2),
                round(($fFinal - 32) * 9 / 5, 2),
                round($fFinal * 5 / 9, 2),
                round($fFinal - 32, 2),
                $ans * 1.05,
                $ans * 0.95,
            ];
            $unit = 'degrees C';
        }
    }

    $answerStr = fmt_temp($ans);
    $distractors = make_temp_distractors($ans, $extra, 3);

    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 100) {
        foreach ([$ans + $pad, $ans - $pad] as $c) {
            if ($c <= 0) continue;
            $cs = fmt_temp($c);
            if (!in_array($cs, $allChoices, true)) {
                $allChoices[] = $cs;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $pad++;
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
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.5;">
        <?php echo $cur['prompt']; ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
        <span style="color:#666; font-size:12pt;"><?php echo htmlspecialchars($cur['unit']); ?></span>
    </p>
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:500px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
        <strong style="color:#007700;">Solution:</strong><br>
        <?php echo $cur['solution']; ?>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.5;">
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