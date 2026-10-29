<?php
// math/modules/word-water-consumption.php
// PROCEDURAL water consumption with tiered pricing. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcodes $_SESSION['level']="Easy" with no
// level radios. Collapsed to single-level — $_SESSION['level'] not touched.
//
// Tiered pricing (legacy, preserved verbatim):
//   First 10 cu m:  P160 flat
//   Next 10 cu m:   P20/cu m  (so +P200 for 10-20 range)
//   Next 20 cu m:   P40/cu m  (for 20+ range)
//
// Water consumption range is 30.001-39.999 cu m per legacy. Answer is
// cost = 360 + (wc - 20)*40. Displayed to 2 decimals.
//
// Distractors: structural errors (wrong tier multipliers, wrong subtotal,
// arithmetic slips) filtered to 5% band. 4-choice guarantee §13.7.
//
// Encoding (§16): 'P' for peso, no '×'/'÷' glyphs.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-water-consumption.php'

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

$moduleTitle = 'Word Problems on Water Consumption';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

function fmt_water($v) {
    return number_format(round((float)$v, 2), 2, '.', '');
}

function make_water_distractors($ans, $candidates, $n = 3) {
    $ans = round((float)$ans, 2);
    $band = max(10, $ans * 0.05);
    $step = max(2, round($band / 5, 2));
    $out  = [];
    $seen = [fmt_water($ans) => true];

    foreach ($candidates as $c) {
        $c = round((float)$c, 2);
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;
        $s = fmt_water($c);
        if (isset($seen[$s])) continue;
        $seen[$s] = true;
        $out[] = $s;
        if (count($out) >= $n) return $out;
    }

    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d * $step, $ans - $d * $step] as $c) {
            if ($c <= 0) continue;
            $s = fmt_water($c);
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
    $prev1 = rand(5001, 9599);
    $prev2 = rand(111, 999);
    $wc    = rand(30001, 39999) / 1000;
    $curReading = $prev1 + $prev2 / 1000 + $wc;

    // Tiered cost
    $ans = 360 + ($wc - 20) * 40;
    $ansStr = fmt_water($ans);

    $prompt = 'How much does your water consumption (WC) cost?';
    $prevDisplay = $prev1 . '.' . str_pad($prev2, 3, '0', STR_PAD_LEFT);
    $curInt  = (int)floor($curReading);
    $curFrac = (int)round(($curReading - $curInt) * 1000);
    $curDisplay = $curInt . '.' . str_pad($curFrac, 3, '0', STR_PAD_LEFT);

    $soln  = "Previous reading: $prevDisplay cu m<br>";
    $soln .= "Current reading: $curDisplay cu m<br>";
    $soln .= "WC = $curDisplay - $prevDisplay = " . number_format($wc, 3, '.', '') . " cu m<br>";
    $soln .= "Cost breakdown:<br>";
    $soln .= "&nbsp;&nbsp;First 10 cu m: P160.00 (flat)<br>";
    $soln .= "&nbsp;&nbsp;Next 10 cu m: 10 x P20 = P200.00<br>";
    $soln .= "&nbsp;&nbsp;Remaining: " . number_format($wc - 20, 3, '.', '') . " x P40 = P"
           . fmt_water(($wc - 20) * 40) . "<br>";
    $soln .= "Total = P360.00 + P" . fmt_water(($wc - 20) * 40)
           . " = <strong style='color:#CC0066;'>P$ansStr</strong>";

    $candidates = [
        360 + ($wc - 20) * 20,             // used P20 for last tier
        360 + ($wc - 20) * 30,
        160 + ($wc - 10) * 20,             // wrong tier combination
        160 + ($wc) * 40,
        $wc * 40,                          // ignored tiers entirely
        $ans + 40,
        $ans - 40,
    ];

    $distractors = make_water_distractors($ans, $candidates, 3);
    $allChoices = array_merge([$ansStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4 && $d <= 100) {
        foreach ([fmt_water($ans + $d * 10), fmt_water($ans - $d * 10)] as $c) {
            if ((float)$c <= 0) continue;
            if (!in_array($c, $allChoices, true)) {
                $allChoices[] = $c;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prevDisplay' => $prevDisplay,
        'curDisplay'  => $curDisplay,
        'wc'          => $wc,
        'prompt'      => $prompt,
        'answer'      => $ansStr,
        'choices'     => $allChoices,
        'solution'    => $soln,
        'lvl'         => $lvl,
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
  .choice-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .choice-grid-2x2 > div { display: contents; }
  .water-box {
    background: #FFFFF0;
    border: 2px solid #FEDB9A;
    border-radius: 8px;
    padding: 20px 30px;
    max-width: 560px;
    margin: 15px auto;
    text-align: center;
    line-height: 1.9;
  }
  .water-row { font-size: 15pt; font-weight: 700; color: #800080; }
  .water-tier { font-size: 13pt; color: #333; text-align: left; display: inline-block; margin-top: 10px; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <div class="water-box">
        <div class="water-row">Previous Reading: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['prevDisplay']); ?></strong></div>
        <div class="water-row">Current Reading: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['curDisplay']); ?></strong></div>
        <div class="water-tier">
            <strong>Cost of Consumed Water:</strong><br>
            First 10 cu m: P160.00 (flat rate)<br>
            Next 10 cu m: P20.00/cu m<br>
            Next 20 cu m: P40.00/cu m
        </div>
        <div class="water-row" style="margin-top:14px;">How much does your water consumption (WC) cost?</div>
    </div>
    <p style="font-size:14pt; color:#666; margin-top:15px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:20px;">
        Answer: <strong style="color:#CC0066;">P<?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:520px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
        <strong style="color:#007700;">Solution:</strong><br>
        <?php echo $cur['solution']; ?>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="water-box">
        <div class="water-row">Previous Reading: <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['prevDisplay']); ?></strong></div>
        <div class="water-row">Current Reading: <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['curDisplay']); ?></strong></div>
        <div class="water-tier">
            <strong>Cost of Consumed Water:</strong><br>
            First 10 cu m: P160.00 (flat rate)<br>
            Next 10 cu m: P20.00/cu m<br>
            Next 20 cu m: P40.00/cu m
        </div>
        <div class="water-row" style="margin-top:14px;">How much does your water consumption (WC) cost?</div>
    </div>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer <em>(in pesos)</em>.</p>
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