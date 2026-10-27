<?php
// math/modules/sci-notation.php
// PROCEDURAL scientific-notation conversions. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Two question forms alternate randomly (as in legacy):
//   Form 1: "Express [decimal] in scientific notation." &#8594; answer "a x 10^e"
//   Form 2: "The scientific notation a x 10^e equals what number?" &#8594; decimal
//
// Levels merged per §E:
//   Easy = legacy Easy ranges (2-decimal significand, narrow exponent pool)
//   Hard = legacy Medium + Hard merged (3–5 decimal significand, wider pool)
//
// Layout rule:
//   • maxLen <= 4      &#8594; 1 row (4 narrow boxes fit comfortably)
//   5 <= maxLen <= 20 &#8594; 2×2 grid (prevents 3+1 wrap)
//   maxLen > 20       &#8594; 1 per row (2 columns still overflow)
//   Threshold matches other numeric modules.
//
// Rendering exceptions:
//   • Exponents use <sup>…</sup> tags in prompts, choices, and answers.
//   • render_choices is bypassed for this module only — its width calc uses
//     strlen() on the choice string, which would count <sup> / </sup> as
//     characters and mis-size the buttons. Manual rendering below uses
//     strip_tags() for width math and preserves raw HTML for display.
//   • Prompt uses the same 14pt gray + 16pt bold-blue pattern as "Your answer:".
//
// §H bug fix: $grd was referenced but never assigned &#8594; all grade-dependent
// branches failed silently. Fixed: $_SESSION['grade'] ?? 5.
//
// Choice-builder bug fix: previous version did
//     shuffle($allChoices); array_slice($allChoices, 0, 4);
// which randomly dropped the correct answer ~50% of the time whenever
// $extra contained more than 3 candidates. Now the correct answer is
// appended AFTER the 3 distractors are selected, then the final 4 are
// shuffled once — the correct answer is guaranteed to survive.
//
// Theme: test56-* (121/547/117) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1 default.
// DB row required: modules.url = 'sci-notation.php'

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

$moduleTitle = 'Scientific Notation of Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = (int)($_SESSION['grade'] ?? 5);  // §H fix — was never assigned

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Format a decimal cleanly: strip trailing zeros, no floating-point noise
function fmt_dec($v) {
    if (abs($v - round($v)) < 1e-10) return (string)(int)round($v);
    $s = sprintf('%.10f', $v);
    $s = rtrim($s, '0');
    $s = rtrim($s, '.');
    return $s;
}

// Format scientific notation with <sup> exponent tag
function fmt_sci($sig, $exp) {
    $exp = (int)$exp;
    $expStr = ($exp < 0) ? '-' . abs($exp) : (string)$exp;
    return fmt_dec($sig) . ' x 10<sup>' . $expStr . '</sup>';
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

    // Safe display: prefer the stored (trusted HTML) choice if the click matches
    $clickedDisplay = htmlspecialchars($clicked);
    foreach ($cur['choices'] as $c) {
        if ($c === $clicked) { $clickedDisplay = $c; break; }
    }

    $result = [
        'correct'        => $isCorrect,
        'clicked'        => $clicked,
        'clickedDisplay' => $clickedDisplay,
        'cur'            => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $form = rand(1, 2);

    if ($lvl === 'Easy') {
        $sigDecimals = 2;
        $expPool = [-2, -1, 2, 3];               // excludes 0 and 1 per legacy
    } else {
        $sigDecimals = rand(3, 5);
        $expPool = [-6, -5, -4, -3, 4, 5, 6, 7, 8];
    }

    $sigInt  = rand(1, 9);
    $sigFrac = rand(1, (int)pow(10, $sigDecimals) - 1);
    $sigVal  = $sigInt + $sigFrac / pow(10, $sigDecimals);
    $sigStr  = sprintf('%.' . $sigDecimals . 'f', $sigVal);
    $sigVal  = (float)$sigStr;

    $exp     = $expPool[array_rand($expPool)];
    $decimal = $sigVal * pow(10, $exp);

    $extra = [];

    if ($form == 1) {
        // Express [decimal] in scientific notation
        $decimalDisplay = fmt_dec($decimal);
        $prompt = 'Express <strong style="color:#0000CC; font-size:16pt;">'
                . htmlspecialchars($decimalDisplay)
                . '</strong> in scientific notation.';
        $ans = fmt_sci($sigVal, $exp);

        foreach ([$exp + 1, $exp - 1, $exp + 2, $exp - 2, -$exp] as $e) {
            if ($e != $exp) $extra[] = fmt_sci($sigVal, $e);
        }
        foreach ([$sigVal + 0.1, $sigVal - 0.1, $sigVal + 0.01] as $b) {
            if (abs($b - $sigVal) > 1e-10 && $b >= 1 && $b < 10) {
                $extra[] = fmt_sci($b, $exp);
            }
        }
    } else {
        // The scientific notation [a x 10^e] equals what number?
        $sciDisplay = fmt_sci($sigVal, $exp);
        $prompt = 'The scientific notation <strong style="color:#0000CC; font-size:16pt;">'
                . $sciDisplay
                . '</strong> equals what number?';
        $ans = fmt_dec($decimal);

        foreach ([$exp + 1, $exp - 1, $exp + 2, $exp - 2] as $e) {
            $v = $sigVal * pow(10, $e);
            if (abs($v - $decimal) > 1e-10) $extra[] = fmt_dec($v);
        }
    }

    // ============================================================
    // Build 3 distractors FIRST, then append the correct answer.
    // This guarantees the correct answer survives into the final 4.
    // (Previous version did shuffle &#8594; slice, which dropped the correct
    // answer whenever $extra contained more than 3 candidates.)
    // ============================================================
    $extra = array_values(array_unique($extra));
    $extra = array_values(array_diff($extra, [$ans]));   // safety: never duplicate correct
    shuffle($extra);

    $distractors = array_slice($extra, 0, 3);

    // Pad if we somehow have fewer than 3 unique distractors
    $pad = 3;
    while (count($distractors) < 3 && $pad <= 20) {
        if ($form == 1) {
            $c = fmt_sci($sigVal, $exp + $pad);
        } else {
            $c = fmt_dec($sigVal * pow(10, $exp + $pad));
        }
        if ($c !== $ans && !in_array($c, $distractors, true)) {
            $distractors[] = $c;
        }
        $pad++;
    }

    // Correct answer appended last, then a single shuffle
    $allChoices = array_merge([$ans], $distractors);
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'  => $prompt,
        'answer'  => $ans,
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
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .sci-choice {
    display: inline-block;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 12px;
    padding: 14px 18px;
    font-size: 1.2rem;
    font-weight: bold;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    transition: background 0.15s, border-color 0.15s;
    box-sizing: border-box;
    white-space: nowrap;
  }
  .sci-choice:hover {
    background: #f8f8ff;
    border-color: #8080ff;
  }
  .sci-flex {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    gap: 18px;
    margin: 20px auto;
    max-width: 655px;
  }
  .sci-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
    max-width: 655px;
  }
  sup {
    font-size: 0.7em;
    vertical-align: super;
    line-height: 0;
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo $result['clickedDisplay']; ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#666; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        <?php echo $cur['prompt']; ?>
    </p>
    <p style="font-size:14pt; color:#666; margin-top:28px;">
        Answer: <strong style="color:#CC0066; font-size:16pt;"><?php echo $cur['answer']; ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:14pt; color:#666; margin-top:40px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.6;">
        <?php echo $q['prompt']; ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:20px;">Click on your answer.</p>

    <?php
        $plainLens = [];
        foreach ($q['choices'] as $c) {
            $plainLens[] = strlen(strip_tags($c));
        }
        $maxLen = max($plainLens);
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);

        $use2x2 = ($maxLen >= 5 && $maxLen <= 20);
        $containerClass = $use2x2 ? 'sci-grid-2x2' : 'sci-flex';
    ?>

    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="sci-choice"
               style="width:<?php echo $choiceWidthEm; ?>em;">
                <?php echo $c; ?>
            </a>
        <?php endforeach; ?>
    </div>

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