<?php
// math/modules/number-patterns.php
// PROCEDURAL nth-term-formula identification. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Level: SINGLE-LEVEL MODULE (per legacy — no difficulty selector).
//
// Prompt rendering:
//   • Question state: 17pt bold gray label + 20pt bold blue series
//                     (matches legacy's big question-page font).
//   • Feedback state: 14pt gray label + 16pt blue series
//                     (matches "Your answer:" font pattern).
//   Prompt is stored in session as {label, series} so each branch styles
//   them independently without duplicating the string.
//
// Solution display (matches legacy):
//   Legacy showed the series restated, then "nth term formula: X".
//   Applied identically here.
//
// §H bug fix: legacy guarded generation behind `if ($grd==5 or $grd==6)`
// but $grd was never assigned &#8594; no question ever generated. Fixed.
//
// Theme: test67-* (110/582/108) &#8594; paper-69-* per §C fit test.
// Score box: score-*-2 (matches bar-graphs / simple-experiments / line-graphs).
// DB row required: modules.url = 'number-patterns.php'

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

$moduleTitle = 'Finding nth Term Formulas<br/>of Number Patterns';
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
    $pat = rand(1, 3);

    if ($pat == 1) {
        // a_n = coeff*n + const
        $coeff = rand(3, 12);
        $const = rand(1, 15);
        $formula = $coeff . 'n+' . $const;
        $series  = [$coeff + $const, 2 * $coeff + $const, 3 * $coeff + $const, 4 * $coeff + $const, 5 * $coeff + $const];
        $extra = [
            $coeff . 'n+' . ($const + 1),
            $coeff . 'n+' . ($const - 1),
            $coeff . 'n+' . ($const + 2),
            $coeff . 'n+' . ($const - 2),
            ($coeff + 1) . 'n+' . $const,
            ($coeff - 1) . 'n+' . $const,
            ($coeff + 2) . 'n+' . $const,
            ($coeff - 2) . 'n+' . $const,
        ];
    } elseif ($pat == 2) {
        // a_n = coeff*n - const
        $coeff = rand(3, 12);
        $const = rand(1, 15);
        $formula = $coeff . 'n-' . $const;
        $series  = [$coeff - $const, 2 * $coeff - $const, 3 * $coeff - $const, 4 * $coeff - $const, 5 * $coeff - $const];
        $extra = [
            $coeff . 'n-' . ($const + 1),
            $coeff . 'n-' . ($const - 1),
            $coeff . 'n-' . ($const + 2),
            $coeff . 'n-' . ($const - 2),
            ($coeff + 1) . 'n-' . $const,
            ($coeff - 1) . 'n-' . $const,
            ($coeff + 2) . 'n-' . $const,
            ($coeff - 2) . 'n-' . $const,
        ];
    } else {
        // a_n = coeff*n (no constant)
        $coeff = rand(3, 12);
        $formula = $coeff . 'n';
        $series  = [$coeff, 2 * $coeff, 3 * $coeff, 4 * $coeff, 5 * $coeff];
        $extra = [
            $coeff . 'n+' . rand(1, 5),
            $coeff . 'n-' . rand(1, 5),
            ($coeff + 1) . 'n',
            ($coeff - 1) . 'n',
            ($coeff + 2) . 'n',
            ($coeff - 2) . 'n',
            ($coeff + 3) . 'n',
            ($coeff - 3) . 'n',
        ];
    }

    $label     = 'Find the nth term formula for this series:';
    $seriesStr = implode(', ', $series) . ', ...';

    // Build 3 distractors, then append correct answer — never dropped
    $extra = array_values(array_unique($extra));
    $extra = array_values(array_diff($extra, [$formula]));
    shuffle($extra);
    $distractors = array_slice($extra, 0, 3);

    $pad = 4;
    while (count($distractors) < 3 && $pad <= 20) {
        $c = ($coeff + $pad) . 'n';
        if ($c !== $formula && !in_array($c, $distractors, true)) {
            $distractors[] = $c;
        }
        $pad++;
    }

    $allChoices = array_merge([$formula], $distractors);
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'label'   => $label,
        'series'  => $seriesStr,
        'answer'  => $formula,
        'choices' => $allChoices,
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
    'score_top'     => $base . '/math/images/score-top-2.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-2.jpg',
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

    <!-- Feedback-state prompt: matches "Your answer:" font pattern -->
    <p style="font-size:14pt; color:#666; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        <?php echo htmlspecialchars($cur['label'])."<br/>"; ?>
        <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($cur['series']); ?></strong>
    </p>

    <p style="font-size:14pt; color:#666; margin-top:24px;">
        nth term formula: <strong style="color:#CC0066; font-size:16pt;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <!-- Question-state prompt: big legacy-style font -->
    <p style="font-size:17pt; font-weight:700; color:#333333; margin-top:40px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        <?php echo htmlspecialchars($q['label']); ?><br>
        <span style="font-size:20pt; color:#0000CC;"><?php echo htmlspecialchars($q['series']); ?></span>
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

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();