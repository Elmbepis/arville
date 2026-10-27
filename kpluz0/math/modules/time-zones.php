<?php
// math/modules/time-zones.php
// PROCEDURAL time-zone conversion + choice. Bypass QEngine per §D.
// Converted from legacy inline-MCQ to standard MCQ template.
//
// SINGLE-LEVEL MODULE. §H bug fix:
//   Legacy had Easy/Hard radios that set $_SESSION['points'] to 1 vs 2, but
//   the generation logic was IDENTICAL for both — no actual difficulty
//   differentiation. Students could pick "Hard" for free double points
//   without answering harder questions. Collapsed to single-level: radios
//   removed, $_SESSION['level'] never written, $lvl fixed to 'Easy' locally.
//
// Question form (single):
//   "The standard time in [city] is UTC[offset]. If it's [PH time] in the
//    Philippines right now, what time is it in [city]?"
// Philippines is UTC+8.
//
// Feedback:
//   "If the standard time in [city] is UTC[offset], and if it's [PH time] in
//    the Philippines right now, it is [answer] in [city]."
//
// Theme: test73b-* (110/582/108) &#8594; paper-69-* per §C fit test (matches
// elapsed-time.php, same theme family).
// Score box: score-*-4 (legacy used variant 4, preserved per §C).
// DB row required: modules.url = 'time-zones.php'

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

$moduleTitle = 'Time Conversion Between Time Zones';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

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
    $cities = [
        "Alberta"     => -7,  "Arizona"      => -7,  "Athens"      => 2,
        "Berlin"      => 1,   "California"   => -8,  "Canberra"    => 11,
        "Chile"       => -3,  "Cuba"         => -5,  "Florida"     => -6,
        "Hawaii"      => -10, "Hong Kong"    => 8,   "Jakarta"     => 7,
        "Kuwait"      => 3,   "Laos"         => 7,   "London"      => 0,
        "Madrid"      => 1,   "Oklahoma"     => -6,  "Ontario"     => -6,
        "Pakistan"    => 5,   "Paris"        => 1,   "Peru"        => -5,
        "Sydney"      => 11,  "Syria"        => 2,   "Taipei"      => 8,
        "Tokyo"       => 9,   "Tonga"        => 13,  "Venezuela"   => -4,
    ];

    // Pick a city that yields a valid time (1-23 hours result range)
    $city = null;
    $offset = null;
    $phtimeh = null;
    $guard = 0;
    while ($guard < 50) {
        $c = array_rand($cities);
        $o = $cities[$c];
        // Try a random PH hour that results in 1-23
        $h = rand(1, 23);
        $resulting = $h + $o - 8;
        if ($resulting >= 1 && $resulting <= 23) {
            $city = $c;
            $offset = $o;
            $phtimeh = $h;
            break;
        }
        $guard++;
    }

    // Absolute fallback (should not fire — Hong Kong/Taipei always work)
    if ($city === null) { $city = 'Taipei'; $offset = 8; $phtimeh = rand(1, 23); }

    $min = rand(1, 59);
    $minStr = ($min < 10 ? '0' : '') . $min;
    $phtime = ($phtimeh < 10 ? '0' : '') . $phtimeh . ':' . $minStr;

    $ansTimeH = $phtimeh + $offset - 8;
    $ans = ($ansTimeH < 10 ? '0' : '') . $ansTimeH . ':' . $minStr;

    // Offset display: UTC+0 formatted as UTC+0 (legacy shows +0, not just 0)
    $offsetStr = ($offset >= 0 ? '+' : '') . $offset;

    // Distractors — same minute, ± hours
    $distractors = [];
    foreach ([$ansTimeH + 1, $ansTimeH - 1, $ansTimeH + 2] as $h) {
        if ($h >= 1 && $h <= 23) {
            $c = ($h < 10 ? '0' : '') . $h . ':' . $minStr;
            if ($c !== $ans && !in_array($c, $distractors, true)) $distractors[] = $c;
        }
    }
    // Pad if short
    $pad = 3;
    while (count($distractors) < 3 && $pad <= 30) {
        foreach ([$ansTimeH + $pad, $ansTimeH - $pad] as $h) {
            if ($h >= 1 && $h <= 23) {
                $c = ($h < 10 ? '0' : '') . $h . ':' . $minStr;
                if ($c !== $ans && !in_array($c, $distractors, true)) {
                    $distractors[] = $c;
                    if (count($distractors) >= 3) break 2;
                }
            }
        }
        $pad++;
    }

    $allChoices = array_merge([$ans], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'city'      => $city,
        'offsetStr' => $offsetStr,
        'phtime'    => $phtime,
        'answer'    => $ans,
        'choices'   => $allChoices,
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
    'score_top'     => $base . '/math/images/score-top-4.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-4.jpg',
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
    <p style="font-size:15pt; color:#800080; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        If the standard time in <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['city']); ?></strong>
        is <strong style="color:#CC0066;">UTC<?php echo htmlspecialchars($cur['offsetStr']); ?></strong>,
        and if it's <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['phtime']); ?></strong>
        in the Philippines right now,
        it is <strong style="color:#0000BB;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
        in <?php echo htmlspecialchars($cur['city']); ?>.
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div style="font-size:16pt; font-weight:600; color:#800080; max-width:600px; margin:30px auto; line-height:1.55;">
        The standard time in <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['city']); ?></strong>
        is <strong style="color:#CC0066;">UTC<?php echo htmlspecialchars($q['offsetStr']); ?></strong>.
        If it's <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['phtime']); ?></strong>
        in the Philippines right now,<br/>what time is it in <?php echo htmlspecialchars($q['city']); ?>?
    </div>
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

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();