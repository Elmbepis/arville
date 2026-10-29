<?php
// math/modules/word-probability.php
// PROCEDURAL probability word problems. Bypass QEngine per §D.
// Converted from FIB (numerator/denominator) to MCQ of fractions.
//
// 2 levels with REAL differentiation (§E preserved):
//   Easy = legacy form 1: single-event probability
//   Hard = legacy form 11: compound-event probability
//
// Choice builder ALWAYS returns exactly 4 unique non-equivalent fractions.
// Previous version used `[$correctStr] + $out` (array union) which shadowed
// key 0 of $out and silently dropped the first distractor &#8594; 3 choices.
// Now uses array_merge + guaranteed padding loop.
//
// Theme: test64b-* (110/582/108) &#8594; paper-69-* per §C fit test.
// Score box: score-*-3 (legacy variant 3, preserved).
// DB row required: modules.url = 'word-probability.php'

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

$moduleTitle = 'Probability Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Fraction helpers ----
function gcd_frac($a, $b) { return $b == 0 ? abs($a) : gcd_frac($b, $a % $b); }
function reduce_frac($n, $d) {
    if ($d == 0 || $n == 0) return [0, 1];
    $sign = 1;
    if ($n < 0) { $n = -$n; $sign = -$sign; }
    if ($d < 0) { $d = -$d; $sign = -$sign; }
    $g = gcd_frac($n, $d);
    return [$sign * (int)($n / $g), (int)($d / $g)];
}
function frac_str($n, $d) {
    [$rn, $rd] = reduce_frac($n, $d);
    return $rn . '/' . $rd;
}

// ---- Choice builder — ALWAYS returns exactly 4 fractions (1 correct + 3 distractors) ----
function build_prob_choices($ansnumer, $ansdenom, $candidates, $n = 3) {
    [$ansN, $ansD] = reduce_frac($ansnumer, $ansdenom);
    $correctStr = $ansN . '/' . $ansD;
    $out  = [];
    $seen = [$correctStr => true];

    // Pass 1: prefer case-specific structural distractors
    foreach ($candidates as $pair) {
        if (count($out) >= $n) break;
        [$cN, $cD] = $pair;
        if ($cN <= 0 || $cD <= 0) continue;
        [$rN, $rD] = reduce_frac($cN, $cD);
        if ($rN <= 0 || $rD <= 0) continue;
        if ($rN == $ansN && $rD == $ansD) continue;
        $s = $rN . '/' . $rD;
        if (isset($seen[$s])) continue;
        $seen[$s] = true;
        $out[] = $s;
    }

    // Pass 2: numeric mutations around correct (numerator±, denominator±)
    $pad = 1;
    while (count($out) < $n && $pad <= 50) {
        $tries = [
            [$ansN + $pad, $ansD],
            [$ansN, $ansD + $pad],
            [$ansN + $pad, $ansD + $pad],
        ];
        if ($ansN - $pad > 0) $tries[] = [$ansN - $pad, $ansD];
        if ($ansD - $pad > 0) $tries[] = [$ansN, $ansD - $pad];
        foreach ($tries as $pair) {
            [$cN, $cD] = $pair;
            if ($cN <= 0 || $cD <= 0) continue;
            [$rN, $rD] = reduce_frac($cN, $cD);
            if ($rN == $ansN && $rD == $ansD) continue;
            $s = $rN . '/' . $rD;
            if (isset($seen[$s])) continue;
            $seen[$s] = true;
            $out[] = $s;
            if (count($out) >= $n) break 2;
        }
        $pad++;
    }

    // Final safety — guarantee 3 distractors exist
    $extra = 1;
    while (count($out) < $n && $extra <= 100) {
        $s = $ansN . '/' . ($ansD + $extra);
        if (!isset($seen[$s])) {
            $seen[$s] = true;
            $out[] = $s;
        }
        $extra++;
    }

    return array_merge([$correctStr], $out);
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
    $form = ($lvl === 'Easy') ? 1 : 11;

    if ($form == 1) {
        $opt = rand(1, 4);

        if ($opt == 1 || $opt == 2) {
            $cards = ["ace", "2", "3", "4", "5", "6", "7", "8", "9", "jack", "queen", "king"];
            $card  = $cards[array_rand($cards)];
            $aan   = ($card == 'ace' || $card == '8') ? 'an' : 'a';

            if ($opt == 1) {
                $prob      = "drawing $aan '$card' from a standard deck of 52 playing cards";
                $ansnumer  = 1;  $ansdenom = 13;
                $explain   = "There are 4 '$card' cards in a 52-card deck. "
                           . "So the probability is 4/52, which reduces to 1/13.";
                $candidates = [[1, 52], [4, 13], [13, 4], [12, 13], [1, 4], [48, 52], [12, 52]];
            } else {
                $prob      = "drawing a card that is NOT $aan '$card' from a standard deck of 52 playing cards";
                $ansnumer  = 12; $ansdenom = 13;
                $explain   = "There are 4 '$card' cards. The probability of drawing one is 1/13. "
                           . "So the probability of NOT drawing one is 1 - 1/13 = 12/13.";
                $candidates = [[4, 52], [1, 13], [1, 52], [12, 4], [13, 12], [1, 4]];
            }
        } else {
            $num1 = rand(7, 49);  $num2 = rand(7, 49);
            $colors = ["red", "blue", "green", "yellow", "orange", "violet", "white", "pink"];
            $color1 = $colors[array_rand($colors)];
            $color2 = $colors[array_rand($colors)];
            while ($color2 == $color1) $color2 = $colors[array_rand($colors)];
            $aan = ($color1 == 'orange') ? 'an' : 'a';
            $containers = ["jar", "box", "tub", "bag", "sack"];
            $container  = $containers[array_rand($containers)];
            $objects    = ["marble", "paper clip", "marker", "crayon", "jelly bean", "rubber band", "ribbon"];
            $object     = $objects[array_rand($objects)];

            if ($opt == 3) {
                if (rand(1, 2) == 1) {
                    $prob = "picking $aan '$color1' $object from a $container that contains $num1 $color1 {$object}s and $num2 $color2 {$object}s";
                } else {
                    $prob = "picking $aan '$color1' $object from a $container that contains $num2 $color2 {$object}s and $num1 $color1 {$object}s";
                }
                $ansnumer = $num1;
                $ansdenom = $num1 + $num2;
                $explain  = "There are $num1 $color1 {$object}s in the $container, and "
                          . "$num1 + $num2 = " . ($num1 + $num2) . " total {$object}s. "
                          . "So the probability is $num1/" . ($num1 + $num2) . ".";
                $candidates = [
                    [$num2, $num1 + $num2],
                    [$num1, $num2],
                    [$num2, $num1],
                    [1, 2],
                    [$num1, $num1 + $num2 + 1],
                ];
            } else {
                if (rand(1, 2) == 1) {
                    $prob = "NOT picking $aan '$color1' $object from a $container that contains $num1 $color1 {$object}s and $num2 $color2 {$object}s";
                } else {
                    $prob = "NOT picking $aan '$color1' $object from a $container that contains $num2 $color2 {$object}s and $num1 $color1 {$object}s";
                }
                $ansnumer = $num2;
                $ansdenom = $num1 + $num2;
                $explain  = "There are $num2 $color2 {$object}s (not $color1) out of "
                          . "($num1 + $num2) = " . ($num1 + $num2) . " total {$object}s. "
                          . "So the probability is $num2/" . ($num1 + $num2) . ".";
                $candidates = [
                    [$num1, $num1 + $num2],
                    [$num1, $num2],
                    [$num2, $num1],
                    [1, 2],
                    [$num2, $num1 + $num2 + 1],
                ];
            }
        }
    } else {
        $opt = rand(1, 4);

        if ($opt == 1 || $opt == 2) {
            $cards = ["ace", "2", "3", "4", "5", "6", "7", "8", "9", "jack", "queen", "king"];
            $card1 = $cards[array_rand($cards)];
            $card2 = $cards[array_rand($cards)];
            while ($card2 == $card1) $card2 = $cards[array_rand($cards)];
            $aan1 = ($card1 == 'ace' || $card1 == '8') ? 'an' : 'a';
            $aan2 = ($card2 == 'ace' || $card2 == '8') ? 'an' : 'a';

            if ($opt == 1) {
                $prob      = "drawing either $aan1 '$card1' or $aan2 '$card2' from a standard deck of 52 playing cards";
                $ansnumer  = 2;  $ansdenom = 13;
                $explain   = "There are 4 '$card1' cards and 4 '$card2' cards, so 8 favorable outcomes out of 52. "
                           . "8/52 reduces to 2/13.";
                $candidates = [[4, 52], [1, 13], [8, 13], [2, 8], [13, 2], [12, 13], [44, 52]];
            } else {
                $prob      = "drawing a card that is NEITHER $aan1 '$card1' NOR $aan2 '$card2' from a standard deck of 52 playing cards";
                $ansnumer  = 11; $ansdenom = 13;
                $explain   = "There are 4 '$card1' and 4 '$card2' cards, so 8 favorable cards for the opposite case. "
                           . "The probability of either is 8/52 = 2/13, so NEITHER = 1 - 2/13 = 11/13.";
                $candidates = [[8, 52], [2, 13], [1, 13], [11, 44], [13, 11], [4, 52]];
            }
        } else {
            $num1 = rand(7, 49);  $num2 = rand(7, 49);  $num3 = rand(7, 49);
            $colors = ["red", "blue", "green", "yellow", "orange", "violet", "white", "pink"];
            $color1 = $colors[array_rand($colors)];
            $color2 = $colors[array_rand($colors)];
            while ($color2 == $color1) $color2 = $colors[array_rand($colors)];
            $color3 = $colors[array_rand($colors)];
            while ($color3 == $color1 || $color3 == $color2) $color3 = $colors[array_rand($colors)];
            $aan1 = ($color1 == 'orange') ? 'an' : 'a';
            $aan2 = ($color2 == 'orange') ? 'an' : 'a';
            $containers = ["jar", "box", "tub", "bag", "sack"];
            $container  = $containers[array_rand($containers)];
            $objects    = ["marble", "paper clip", "marker", "crayon", "jelly bean", "rubber band", "ribbon"];
            $object     = $objects[array_rand($objects)];
            $total      = $num1 + $num2 + $num3;

            if ($opt == 3) {
                if (rand(1, 2) == 1) {
                    $prob = "picking either $aan1 '$color1' or $aan2 '$color2' $object from a $container that contains $num3 $color3 {$object}s, $num2 $color2 {$object}s, and $num1 $color1 {$object}s";
                } else {
                    $prob = "picking either $aan1 '$color1' or $aan2 '$color2' $object from a $container that contains $num2 $color2 {$object}s, $num3 $color3 {$object}s, and $num1 $color1 {$object}s";
                }
                $ansnumer = $num1 + $num2;
                $ansdenom = $total;
                $explain  = "There are $num1 $color1 and $num2 $color2 {$object}s, "
                          . "totaling $num1 + $num2 = " . ($num1 + $num2) . " favorable outcomes "
                          . "out of $total {$object}s.";
                $candidates = [
                    [$num1, $total],
                    [$num2, $total],
                    [$num3, $total],
                    [$num1 + $num2, $num3],
                    [$num1, $num1 + $num2],
                ];
            } else {
                if (rand(1, 2) == 1) {
                    $prob = "picking NEITHER $aan1 '$color1' NOR $aan2 '$color2' $object from a $container that contains $num3 $color3 {$object}s, $num2 $color2 {$object}s, and $num1 $color1 {$object}s";
                } else {
                    $prob = "picking NEITHER $aan1 '$color1' NOR $aan2 '$color2' $object from a $container that contains $num2 $color2 {$object}s, $num3 $color3 {$object}s, and $num1 $color1 {$object}s";
                }
                $ansnumer = $num3;
                $ansdenom = $total;
                $explain  = "There are $num3 $color3 {$object}s that are NEITHER $color1 NOR $color2, "
                          . "out of $total total {$object}s.";
                $candidates = [
                    [$num1 + $num2, $total],
                    [$num3, $num1 + $num2],
                    [$num1, $total],
                    [$num2, $total],
                    [$num3, $total + 1],
                ];
            }
        }
    }

    $allChoices = build_prob_choices($ansnumer, $ansdenom, $candidates, 3);
    shuffle($allChoices);

    $answerStr = frac_str($ansnumer, $ansdenom);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $prob,
        'answer'   => $answerStr,
        'choices'  => $allChoices,
        'solution' => $explain,
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
    'score_top'     => $base . '/math/images/score-top-3.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-3.jpg',
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
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        What is the probability of <?php echo htmlspecialchars($cur['prompt']); ?>?
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066; font-size:18pt;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:560px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
        <strong style="color:#007700;">Explanation:</strong><br>
        <?php echo htmlspecialchars($cur['solution']); ?>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.55;">
        What is the probability of <?php echo htmlspecialchars($q['prompt']); ?>?
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer.</p>
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