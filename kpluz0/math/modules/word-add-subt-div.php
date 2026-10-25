<?php
// math/modules/word-add-subt-div.php
// Computed free-text, single input (bypass pattern, §D category 2).
// Word problems combining division with addition/subtraction.
//
// FIXES vs. previous version:
//   1. Feedback question rendered raw — htmlspecialchars was double-escaping
//      &#8369; / &divide; into literal text (same class as word-add-subt-mult).
//   2. Extra "New Question" button after endif is now wrapped in
//      if ($result !== null) — was rendering a duplicate button on the
//      question page.
//   3. Safety counters added to all three do…while pickers (§I).
//   4. qopt 4 pronoun: "His biggest hen" -> "$possCap biggest hen" so female
//      names read correctly.

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

$moduleTitle = 'Word Problems Involving Division with Addition or Subtraction';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// HANDLE SUBMIT1  (§S — unset current at answer time)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userInput = (int)trim((string)($_POST['answer'] ?? '0'));   // §F.1

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer((string)$userInput, (string)$cur['ans'], $cur['lvl']);   // §F.3

    $result = [
        'correct'  => $isCorrect,
        'userInput'=> $userInput,
        'ans'      => $cur['ans'],
        'question' => $cur['question'],
        'soln'     => $cur['soln'],
        'unit'     => $cur['unit'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE  (§S — || is load-bearing)
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $boys  = ['Alfred','Ben','Carlo','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lito','Mario','Roberto','Samuel','Tommy'];
    $girls = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];
    $surnames = ['Cruz', 'Chua', 'Gomez', 'Lopez', 'Santos', 'Torres'];

    $boy = $boys[array_rand($boys)];
    $safety = 0;
    do { $boy2 = $boys[array_rand($boys)]; $safety++; } while ($boy2 === $boy && $safety < 20);   // §I

    $girl = $girls[array_rand($girls)];
    $safety = 0;
    do { $girl2 = $girls[array_rand($girls)]; $safety++; } while ($girl2 === $girl && $safety < 20);   // §I

    $surname = $surnames[array_rand($surnames)];
    $safety = 0;
    do { $surname2 = $surnames[array_rand($surnames)]; $safety++; } while ($surname2 === $surname && $safety < 20);   // §I

    $useGirl = (rand(1, 2) === 1);
    $name    = $useGirl ? $girl : $boy;
    $pron    = $useGirl ? 'she' : 'he';
    $poss    = $useGirl ? 'her' : 'his';
    $possCap = $useGirl ? 'Her' : 'His';   // fix #4

    $qopt = rand(1, 4);
    $question = ''; $soln = ''; $ans = 0; $unit = 'pesos';

    if ($qopt === 1) {
        // Money distributed equally among N people
        $ans   = rand(12, 39);
        $num3  = rand(3, 9);
        $total = $ans * $num3;
        $num1  = (int)floor($total * rand(30, 80) * 0.01);
        $num2  = $total - $num1;
        $question = "$name has &#8369;$num1 in $poss wallet and &#8369;$num2 in $poss coin purse. If $pron distributes all of $poss money equally among $num3 people, how much would each person get?";
        $soln = "$name's money = &#8369;$num1 + &#8369;$num2 = <strong>&#8369;$total</strong><br>Money per person = &#8369;$total &divide; $num3 = <strong>&#8369;$ans</strong>";
    } elseif ($qopt === 2) {
        // Divided X among N children; bought item worth Y
        $num1  = rand(21, 39);
        $num2  = rand(3, 9);
        $total = $num1 * $num2;
        $num3  = rand(15, $num1 - 2);
        $ans   = $num1 - $num3;
        $items = ['pencil', 'pen', 'toy', 'notebook', 'coloring book'];
        $item  = $items[array_rand($items)];
        $question = "Mr. $surname divided &#8369;$total equally among $num2 children that included $name. If $name bought a $item worth &#8369;$num3, how much money would $pron have left?";
        $soln = "Money that $name got = &#8369;$total &divide; $num2 = <strong>&#8369;$num1</strong><br>Money that $name has left = &#8369;$num1 - &#8369;$num3 = <strong>&#8369;$ans</strong>";
    } elseif ($qopt === 3) {
        // Two divisions summed
        $num1   = rand(21, 39); $num2 = rand(3, 9);
        $total1 = $num1 * $num2;
        $num3   = rand(21, 39); $num4 = rand(3, 9);
        $total2 = $num3 * $num4;
        $ans    = $num1 + $num3;
        $question = "When Mrs. $surname divided &#8369;$total1 equally among $num2 children, $name was one of the recipients. $name also got money from Mr. $surname2 when he divided &#8369;$total2 equally among $num4 children. How much money did $name receive in total?";
        $soln = "Money that $name got from Mrs. $surname = &#8369;$total1 &divide; $num2 = <strong>&#8369;$num1</strong><br>Money that $name got from Mr. $surname2 = &#8369;$total2 &divide; $num4 = <strong>&#8369;$num3</strong><br>Total money that $name got = &#8369;$num1 + &#8369;$num3 = <strong>&#8369;$ans</strong>";
    } else {
        // Chicken feed (fix #4 — use $possCap for the pronoun at sentence start)
        $ans   = rand(20, 35);
        $num2  = rand(5, 9);
        $total = $ans * $num2;
        $num3  = rand($ans + 2, $ans + rand(3, 15));
        $num1  = $total + $num3;
        $question = "$name bought $num1 grams of chicken feed. $possCap biggest hen ate $num3 grams while the rest was eaten by $num2 smaller chickens. On average, how many grams of chicken feed did each of the smaller chickens eat?";
        $soln = "Total food eaten by smaller chickens = {$num1} g - {$num3} g = <strong>{$total} g</strong><br>Food eaten by each smaller chicken = {$total} g &divide; $num2 = <strong>{$ans} g</strong>";
        $unit = 'grams';
    }

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'question' => $question,
        'soln'     => $soln,
        'unit'     => $unit,
        'lvl'      => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
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
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answer:
        <strong style="color:#0000CC; font-size:16pt;"><?php echo $result['userInput']; ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; text-align:center; margin-top:20px;">
        Let's review the problem:
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php echo $result['question']; /* fix #1: was htmlspecialchars */ ?>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; text-align:center; margin-top:20px;">
        Solution:
    </p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.6;">
        <?php echo $result['soln']; ?>
    </div>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;">
        <?php echo $q_curr['question']; ?>
    </p>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin:20px 0;">
        Answer:
        <?php
        $ansLen  = strlen((string)$q_curr['ans']);
        $inputPx = max(100, ($ansLen + 1) * 32 + 24);   // §F.4
        ?>
        <input type="text" name="answer" size="1" maxlength="<?php echo $ansLen + 1; ?>"   <?php /* §F.5 */ ?>
               style="width:<?php echo $inputPx; ?>px; height:48px; font-size:24px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
               autocomplete="off" autofocus>
        <span style="color:#800080;"><?php echo $q_curr['unit']; ?></span>
    </p>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php endif; ?>

<?php if ($result !== null): ?>
    <?php /* fix #2: only show the extra Submit2 on result state, not during play */ ?>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">
                Select difficulty level for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;">
                        <font color="#800080">
                            <input type="radio" name="level" value="<?php echo $l; ?>"
                                <?php echo $lvl === $l ? 'checked' : ''; ?>>
                            <b>&nbsp;<?php echo $l; ?></b>
                        </font>
                    </font>
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