<?php
// math/modules/word-elec-consumption.php
// PROCEDURAL electrical energy consumption. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// SINGLE-LEVEL MODULE. Legacy hardcodes $_SESSION['level']="Easy" with no
// level radios. Collapsed to single-level — $_SESSION['level'] not touched.
//
// Question: two 4-digit dial readings (previous + current) rendered as a
// sequence of dial images from math/images/others/dials/{1,2}-{digit}.jpg.
// Alternating 1-/2- series mirrors legacy style (pointer angles alternate).
// Student computes EC = current - previous, then cost = EC × rate/kWh.
//
// Answer is a monetary value (2 decimals). Distractors: structural errors
// (used current or previous as EC, off-by-factor-10, ±10%) filtered to
// 5% band. 4-choice guarantee §13.7.
//
// Encoding (§16): 'P' for peso, no '×'/'÷' glyphs.
//
// Theme: wquiz-15-* (75/655/70) — fits §C. Score box: score-*-1.
// DB row required: modules.url = 'word-elec-consumption.php'

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

$moduleTitle = 'Word Problems on Electrical<br/>Energy Consumption';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

function fmt_elec($v) {
    return number_format(round((float)$v, 2), 2, '.', '');
}

function dial_html($reading, $base) {
    $str = (string)(int)$reading;
    while (strlen($str) < 4) $str = '0' . $str;
    $html = '';
    for ($i = 0; $i < 4; $i++) {
        $series = ($i % 2 == 0) ? 1 : 2;
        $digit  = $str[$i];
        $html  .= '<img src="' . $base . '/math/images/others/dials/' . $series . '-' . $digit
                . '.jpg" style="width:56px; height:56px; margin:0 2px;" alt="dial">';
    }
    return $html;
}

function make_elec_distractors($ans, $candidates, $n = 3) {
    $ans = round((float)$ans, 2);
    $band = max(5, $ans * 0.05);
    $step = max(1, round($band / 5, 2));
    $out  = [];
    $seen = [fmt_elec($ans) => true];

    foreach ($candidates as $c) {
        $c = round((float)$c, 2);
        if ($c <= 0) continue;
        if (abs($c - $ans) > $band) continue;
        $s = fmt_elec($c);
        if (isset($seen[$s])) continue;
        $seen[$s] = true;
        $out[] = $s;
        if (count($out) >= $n) return $out;
    }

    $d = 1;
    while (count($out) < $n && $d <= 50) {
        foreach ([$ans + $d * $step, $ans - $d * $step] as $c) {
            if ($c <= 0) continue;
            $s = fmt_elec($c);
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
    $prev = rand(1101, 8999);
    $ec   = rand(101, 275);
    $cost = number_format(rand(795, 1250) * 0.01, 2, '.', '');
    $cur  = $prev + $ec;

    $ans = $ec * (float)$cost;
    $ansStr = fmt_elec($ans);

    $prompt = 'How much does your electrical energy consumption (EC) cost if each kWh costs P' . $cost . '?';

    $soln = "Previous reading: $prev kWh<br>";
    $soln .= "Current reading: $cur kWh<br>";
    $soln .= "EC = $cur - $prev = $ec kWh<br>";
    $soln .= "Cost = $ec kWh x P$cost/kWh<br>";
    $soln .= "= <strong style='color:#CC0066;'>P" . $ansStr . "</strong>";
    $soln .= "<br>Thus, your electrical energy consumption is <strong>$ec kWh</strong> "
           . "and it costs <strong>P" . $ansStr . "</strong>.";

    $candidates = [
        $cur * (float)$cost,              // used current as EC
        $prev * (float)$cost,             // used previous as EC
        $ec * (float)$cost * 10,
        $ec * (float)$cost / 10,
        $ec + (float)$cost,               // added instead of multiplied
        $ec * (float)$cost * 1.10,
        $ec * (float)$cost * 0.90,
        $ec * 1.05 * (float)$cost,
    ];

    $distractors = make_elec_distractors($ans, $candidates, 3);
    $allChoices = array_merge([$ansStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4 && $d <= 100) {
        foreach ([fmt_elec($ans + $d), fmt_elec($ans - $d)] as $c) {
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
        'prev'     => $prev,
        'cur'      => $cur,
        'ec'       => $ec,
        'cost'     => $cost,
        'prompt'   => $prompt,
        'answer'   => $ansStr,
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
  .meter-box {
    background: #FFFFF0;
    border: 2px solid #FEDB9A;
    border-radius: 8px;
    padding: 20px 30px;
    max-width: 560px;
    margin: 15px auto;
    text-align: center;
    line-height: 1.9;
  }
  .meter-label { font-size: 14pt; font-weight: 700; color: #CC0066; }
  .meter-dials { margin: 6px 0 14px 0; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <div class="meter-box">
        <div class="meter-label">Previous Reading:</div>
        <div class="meter-dials"><?php echo dial_html($cur['prev'], $base); ?></div>
        <div class="meter-label">Current Reading:</div>
        <div class="meter-dials"><?php echo dial_html($cur['cur'], $base); ?></div>
        <p style="font-size:15pt; font-weight:700; color:#800080; margin-top:12px;">
            How much does your electrical energy consumption (EC) cost if each kWh costs
            <strong style="color:#CC0066;">P<?php echo htmlspecialchars($cur['cost']); ?></strong>?
        </p>
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
    <div class="meter-box">
        <div class="meter-label">Previous Reading:</div>
        <div class="meter-dials"><?php echo dial_html($q['prev'], $base); ?></div>
        <div class="meter-label">Current Reading:</div>
        <div class="meter-dials"><?php echo dial_html($q['cur'], $base); ?></div>
        <p style="font-size:15pt; font-weight:700; color:#800080; margin-top:12px;">
            How much does your electrical energy consumption (EC) cost if each kWh costs
            <strong style="color:#CC0066;">P<?php echo htmlspecialchars($q['cost']); ?></strong>?
        </p>
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