<?php
// math/modules/alg-exp-eq.php
// PROCEDURAL expression-vs-equation identifier. Bypass QEngine per §D.
// Converted from legacy inline-MCQ to standard MCQ template.
//
// SINGLE-LEVEL MODULE. Legacy hardcoded $_SESSION['level']="Easy" with no
// level radios. Collapsed to single-level — $_SESSION['level'] not touched.
//
// Task: show 4 algebraic strings, ask "Click on the [expression|equation]".
// Answer is either an expression (no "=") or an equation (has "=").
//
// Feedback: explains the answer in terms of the defining property:
//   "Because it has an equal sign, the algebraic equation is 'X'."
//   "Because it has no equal sign, the algebraic expression is 'X'."
//
// Rendering exceptions:
//   • Choices may contain <sup> tags (e.g. x<sup>2</sup>).
//   • render_choices would htmlspecialchars those — the tags would show as
//     literal text. Manual rendering below preserves raw HTML for display
//     and uses strip_tags() for width calculation.
//
// URL encoding: uses urlencode() instead of legacy +&#8594;[ hack. Legacy
// replaced + with [ before appending to URL, then reversed on receipt —
// fragile. urlencode is standards-compliant and handles all characters.
//
// Theme: test67-* (110/582/108) &#8594; paper-69-* per §C fit test.
// Score box: score-*-2.
// DB row required: modules.url = 'alg-exp-eq.php'

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

$moduleTitle = 'Algebraic Expressions and Equations';
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

    // Safe display — clicked value is trusted only if it matches a stored choice
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
    // 3 distinct single-letter variables, excluding k,l,n,o (too confusable)
    $banned = [107, 108, 110, 111];   // k, l, n, o
    do { $v1 = rand(97, 120); } while (in_array($v1, $banned));
    do { $v2 = rand(97, 120); } while (in_array($v2, $banned) || $v2 === $v1);
    do { $v3 = rand(97, 120); } while (in_array($v3, $banned) || $v3 === $v2 || $v3 === $v1);
    $var1 = chr($v1); $var2 = chr($v2); $var3 = chr($v3);

    // 7 expression templates (all WITHOUT "=")
    $exp = [
        rand(2, 9) . $var1 . '+' . rand(2, 9) . $var2 . '+' . rand(2, 19),
        rand(2, 9) . $var1 . '+' . rand(2, 9) . $var2 . '-' . rand(2, 19),
        '(' . rand(2, 9) . $var1 . '+' . rand(2, 19) . ')(' . rand(2, 9) . $var2 . '+' . rand(2, 19) . ')',
        '(' . rand(2, 9) . $var1 . '+' . rand(2, 19) . ')-(' . rand(2, 9) . $var2 . '+' . rand(2, 19) . ')',
        '(' . rand(2, 9) . $var1 . '+' . rand(2, 19) . ')/' . rand(2, 9) . $var2,
        '(' . rand(2, 9) . $var1 . '+' . rand(2, 19) . ')<sup>2</sup>+' . rand(2, 19),
        rand(2, 9) . $var1 . '<sup>2</sup>+' . rand(2, 9) . $var2 . '<sup>2</sup>+' . rand(2, 19),
    ];

    // Right-hand sides for equations
    $eqend = [
        rand(11, 199),
        rand(2, 9) . $var3,
        $var1 . '+' . rand(2, 9),
        $var1 . '-' . rand(2, 9),
        $var3 . '<sup>' . rand(2, 9) . '</sup>',
    ];

    // Build 7 equations (each "= rhs")
    $eq = [];
    foreach ($exp as $e) {
        $eq[] = $e . '=' . $eqend[array_rand($eqend)];
    }

    shuffle($exp);
    shuffle($eq);

    $opt = rand(1, 2);
    if ($opt == 1) {
        // Ask for an EQUATION
        $term = 'equation';
        $answer = $eq[0];
        $pool = array_slice($exp, 0, 3);
    } else {
        // Ask for an EXPRESSION
        $term = 'expression';
        $answer = $exp[0];
        $pool = array_slice($eq, 0, 3);
    }

    $allChoices = array_merge([$answer], $pool);
    $allChoices = array_values(array_unique($allChoices));

    // Pad if dedupe collapsed something (rare but possible)
    $pad = 0;
    while (count($allChoices) < 4 && $pad < 10) {
        $candidate = ($opt == 1) ? $eq[count($allChoices)] : $exp[count($allChoices)];
        if (!in_array($candidate, $allChoices, true)) $allChoices[] = $candidate;
        $pad++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'term'    => $term,
        'answer'  => $answer,
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
  .alg-choice {
    display: inline-block;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 12px;
    padding: 16px 22px;
    font-size: 1.15rem;
    font-weight: bold;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    transition: background 0.15s, border-color 0.15s;
    box-sizing: border-box;
    white-space: nowrap;
  }
  .alg-choice:hover {
    background: #f8f8ff;
    border-color: #8080ff;
  }
  .alg-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
    max-width: 660px;
  }
  .alg-flex {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    gap: 18px;
    margin: 20px auto;
    max-width: 660px;
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
    <?php
        $cur = $result['cur'];
        // Explanation depends on which type was asked for
        if ($cur['term'] === 'equation') {
            $reason = 'Because it has an equal sign, the algebraic equation is:';
        } else {
            $reason = 'Because it has no equal sign, the algebraic expression is:';
        }
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo $result['clickedDisplay']; ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.6;">
        <?php echo htmlspecialchars($reason); ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:14px;">
        <strong style="color:#CC0066;">'<?php echo $cur['answer']; ?>'</strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; margin-top:40px;">
        Click on the <strong style="color:#CC0066;">algebraic <?php echo htmlspecialchars($q['term']); ?></strong>.
    </p>

    <?php
        // Compute box width from strip_tags length — <sup>/</sup> ignored.
        $plainLens = [];
        foreach ($q['choices'] as $c) {
            $plainLens[] = strlen(strip_tags($c));
        }
        $maxLen = max($plainLens);
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);

        // Layout rule (matches sci-notation):
        //   maxLen <= 4      &#8594; 1 row
        //   5 <= maxLen <= 20 &#8594; 2×2 (prevents 3+1 wrap)
        //   maxLen > 20       &#8594; 1 per row (flex-wrap would do this naturally)
        $use2x2 = ($maxLen >= 5 && $maxLen <= 20);
        $containerClass = $use2x2 ? 'alg-grid-2x2' : 'alg-flex';
    ?>

    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="alg-choice"
               style="width:<?php echo $choiceWidthEm; ?>em;">
                <?php echo $c; ?>
            </a>
        <?php endforeach; ?>
    </div>

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