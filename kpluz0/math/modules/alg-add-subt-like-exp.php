<?php
// math/modules/alg-add-subt-like-exp.php
// PROCEDURAL adding/subtracting like terms. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// 3 levels (Easy/Medium/Hard) via number of variable-term groups:
//   Easy   = 1 variable group + 1 constant  &#8594; 2-term answer
//   Hard   = 3 variable groups + 1 constant &#8594; 4-term answer
//
// 2 copies of each variable term, plus 2 constants, are shuffled to form
// the expression. The simplified answer combines like terms.
//
// Rendering: choices contain <sup> tags &#8594; manual rendering (like alg-exp).
// strip_leading_1() removes "1" prefixes on coefficients so answers display
// as `a^2 + 12` not `1a^2 + 12` (matches standard math notation, differs
// from legacy but is pedagogically correct).
//
// Distractors: mutate_alg_exp changes one number per candidate (coefficient,
// constant, or exponent). All structurally similar to the answer.
//
// Theme: test51-* (136/566/117) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1.
// DB row required: modules.url = 'alg-add-subt-like-exp.php'

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

$moduleTitle = 'Adding and Subtracting Like Terms';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function strip_leading_1($expr) {
    return preg_replace('/(^|[+\-]\s*)1(?=[a-z])/', '$1', $expr);
}

function mutate_alg_exp($aexp1, $n = 3) {
    $out  = [];
    $seen = [$aexp1 => true];
    $positions = [];
    if (preg_match_all('/\d+/', $aexp1, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $m) {
            $positions[] = ['val' => $m[0], 'pos' => $m[1]];
        }
    }
    shuffle($positions);
    foreach ($positions as $p) {
        if (count($out) >= $n) break;
        $delta = rand(1, 3) * (rand(1, 2) == 1 ? 1 : -1);
        $newVal = (int)$p['val'] + $delta;
        if ($newVal < 1) $newVal = (int)$p['val'] + abs($delta);
        if ($newVal < 1) continue;
        $mutant = substr($aexp1, 0, $p['pos']) . $newVal . substr($aexp1, $p['pos'] + strlen($p['val']));
        if (isset($seen[$mutant])) continue;
        if (strpos($mutant, '<sup>1</sup>') !== false) continue;
        $seen[$mutant] = true;
        $out[] = $mutant;
    }
    if (count($out) < $n && strpos($aexp1, '+') !== false) {
        $pos = strpos($aexp1, '+');
        $mutant = substr($aexp1, 0, $pos) . '-' . substr($aexp1, $pos + 1);
        if (!isset($seen[$mutant])) { $seen[$mutant] = true; $out[] = $mutant; }
    }
    $d = 1;
    while (count($out) < $n && $d <= 20) {
        $mutant = $aexp1 . " + " . $d;
        if (!isset($seen[$mutant])) {
            $seen[$mutant] = true;
            $out[] = $mutant;
            if (count($out) >= $n) return $out;
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
    // 6 distinct variable letters, excluding l, o
    $vars = [];
    $banned = [108, 111];
    while (count($vars) < 6) {
        $c = rand(97, 122);
        if (in_array($c, $banned)) continue;
        $ch = chr($c);
        if (!in_array($ch, $vars)) $vars[] = $ch;
    }

    if ($lvl === 'Easy') $numGroups = 1;
    else                 $numGroups = 3;

    // Build term strings for each variable group (with optional exponents)
    $termStrs = [];
    $inpvStrs = [];
    for ($i = 0; $i < $numGroups; $i++) {
        $term = $vars[$i];
        $inpv = $vars[$i];
        if (rand(1, 2) == 1) {
            $exp = rand(2, 9);
            $term .= "<sup>$exp</sup>";
            $inpv .= "^$exp";
        }
        if ($lvl !== 'Easy') {
            if (rand(1, 2) == 1) {
                $exp = rand(2, 9);
                $term .= $vars[4] . "<sup>$exp</sup>";
                $inpv .= $vars[4] . "^$exp";
            } else if (rand(1, 3) == 1) {
                $exp = rand(2, 9);
                $term = $vars[4] . "<sup>$exp</sup>" . $term;
                $inpv = $vars[4] . "^$exp" . $inpv;
            }
        }
        if ($lvl === 'Hard' && rand(1, 3) == 1) {
            $exp = rand(2, 9);
            $term .= $vars[5] . "<sup>$exp</sup>";
            $inpv .= $vars[5] . "^$exp";
        }
        $termStrs[] = $term;
        $inpvStrs[] = $inpv;
    }

    // Two copies of each group with random coefficients
    $allTerms = [];
    $inptList = [];
    $ansTerms = [];
    for ($i = 0; $i < $numGroups; $i++) {
        $cf1 = rand(2, 15);
        $cf2 = rand(2, 15);
        while (abs($cf1 - $cf2) < 2) $cf2 = rand(2, 15);
        if (rand(1, 2) == 1) $cf1 = -$cf1;
        if (rand(1, 2) == 1) $cf2 = -$cf2;
        $allTerms[] = $cf1 . $termStrs[$i];
        $allTerms[] = $cf2 . $termStrs[$i];
        $inptList[] = ($cf1 + $cf2) . $inpvStrs[$i];
        $ansTerms[] = ($cf1 + $cf2) . $termStrs[$i];
    }

    // Two constants
    $c1 = rand(2, 15);
    $c2 = rand(2, 15);
    while (abs($c1 - $c2) < 2) $c2 = rand(2, 15);
    $allTerms[] = $c1;
    $allTerms[] = $c2;
    $inptList[] = (string)($c1 + $c2);
    $ansTerms[] = (string)($c1 + $c2);

    shuffle($allTerms);

    // Build expression (original)
    $aexp = $allTerms[0];
    for ($i = 1; $i < count($allTerms); $i++) {
        $t = $allTerms[$i];
        if (substr($t, 0, 1) === '-') $aexp .= " - " . substr($t, 1);
        else $aexp .= " + " . $t;
    }

    // Build answer (combined)
    $ansexp = $ansTerms[0];
    for ($i = 1; $i < count($ansTerms); $i++) {
        $t = $ansTerms[$i];
        if (substr($t, 0, 1) === '-') $ansexp .= " - " . substr($t, 1);
        else $ansexp .= " + " . $t;
    }

    // Internal answer has 1-coefficients; strip for display
    $cleanAnswer = strip_leading_1($ansexp);

    // Generate distractors from internal answer, then strip 1s
    $rawDistractors = mutate_alg_exp($ansexp, 3);
    $cleanDistractors = array_map('strip_leading_1', $rawDistractors);

    $allChoices = array_merge([$cleanAnswer], $cleanDistractors);
    $allChoices = array_values(array_unique($allChoices));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 20) {
        $candidate = strip_leading_1($ansexp . " + " . $pad);
        if (!in_array($candidate, $allChoices, true)) {
            $allChoices[] = $candidate;
            if (count($allChoices) >= 4) break;
        }
        $pad++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'expr'    => $aexp,
        'answer'  => $cleanAnswer,
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
  .alg-choice {
    display: inline-block;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 12px;
    padding: 14px 18px;
    font-size: 1.15rem;
    font-weight: bold;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    transition: background 0.15s, border-color 0.15s;
    box-sizing: border-box;
    white-space: nowrap;
  }
  .alg-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .alg-flex {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    gap: 18px;
    margin: 20px auto;
    max-width: 655px;
  }
  .alg-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
    max-width: 655px;
  }
  .alg-grid-1col {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  sup { font-size: 0.7em; vertical-align: super; line-height: 0; }
  .expr-display {
    font-size: 17pt;
    font-weight: 700;
    color: #CC0066;
    max-width: 640px;
    margin: 20px auto;
    line-height: 1.55;
    word-wrap: break-word;
    overflow-wrap: break-word;
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
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.65;">
        <?php echo $cur['expr']; ?><br>
        = <strong style="color:#CC0066; font-size:17pt;"><?php echo $cur['answer']; ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:15pt; color:#444; margin-top:30px;">
        Add/subtract the like terms<br>in this algebraic expression:
    </p>
    <div class="expr-display">
        <?php echo $q['expr']; ?>
    </div>
    <p style="font-size:13pt; color:#444; margin-top:20px;">Click on your answer.</p>
    <?php
        $plainLens = [];
        foreach ($q['choices'] as $c) {
            $plainLens[] = strlen(strip_tags($c));
        }
        $maxLen = max($plainLens);
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);

        $use1col = ($maxLen > 20);
        $use2x2  = (!$use1col && $maxLen >= 5);
        $containerClass = $use1col ? 'alg-grid-1col' : ($use2x2 ? 'alg-grid-2x2' : 'alg-flex');
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