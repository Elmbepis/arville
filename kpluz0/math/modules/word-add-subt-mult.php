<?php
// math/modules/word-add-subt-mult.php
// Computed free-text, single input (bypass pattern, §D category 2).
// Word problems combining multiplication with addition/subtraction.
//
// CURRENCY NOTE: uses the literal &#8369; (U+20B1) instead of &#8369;.
// The result-state render passes $result['question'] through
// htmlspecialchars(), which would double-escape &#8369; into &amp;#8369;
// and display as literal text. Requires container.php to serve UTF-8.

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

$moduleTitle = 'Word Problems Involving Multiplication<br/>with Addition or Subtraction';
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
    $isCorrect = $scorer->processAnswer((string)$userInput, (string)$cur['ans'], $cur['lvl']);  // §F.3

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

    $boy = $boys[array_rand($boys)];
    $safety = 0;
    do { $boy2 = $boys[array_rand($boys)]; $safety++; } while ($boy2 === $boy && $safety < 20);   // §I

    $girl = $girls[array_rand($girls)];
    $safety = 0;
    do { $girl2 = $girls[array_rand($girls)]; $safety++; } while ($girl2 === $girl && $safety < 20);   // §I

    $useGirl = (rand(1, 2) === 1);
    $name = $useGirl ? $girl : $boy;
    $pron = $useGirl ? 'she' : 'he';
    $poss = $useGirl ? 'her' : 'his';

    $qopt = rand(1, 4);
    $question = ''; $soln = ''; $ans = 0; $unit = 'pesos';

    if ($qopt === 1) {
        // Money: had X + Y, spent Z
        $tries = 0;
        do {
            if ($lvl === 'Easy') {
                $num1 = rand(25, 99);
                $num2 = rand(25, 99);
                $num3 = rand(19, 79);
            } else {
                $num1 = rand(175, 499);
                $num2 = rand(175, 499);
                $num3 = rand(149, 299);
            }
            $ans  = $num1 + $num2 - $num3;
            $tries++;
        } while ($ans < 20 && $tries < 20);

        $foods = ['a box of pizza', 'a large burger', 'a box of doughnuts', 'some pasta', 'a bag of snacks'];
        $food  = $foods[array_rand($foods)];
        $question = "$name had &#8369;$num1 in $poss wallet and &#8369;$num2 in $poss coin purse. If $pron bought $food for &#8369;$num3, how much money would $name have left?";
        $soln = "$name's money = &#8369;$num1 + &#8369;$num2 - &#8369;$num3<br>= <strong>&#8369;$ans</strong>";
    } elseif ($qopt === 2) {
        // Two multiplications (small in both levels — legacy)
        $num1 = rand(2, 9); $num2 = rand(3, 9);
        $num3 = rand(2, 9); $num4 = rand(3, 9);
        $ans  = $num1 * $num2 + $num3 * $num4;
        $items = ['pencils', 'pens', 'toys', 'notebooks', 'coloring books'];
        $item1 = $items[array_rand($items)];
        $safety = 0;
        do { $item2 = $items[array_rand($items)]; $safety++; } while ($item1 === $item2 && $safety < 20);   // §I
        $question = "$name bought $num1 $item1 for &#8369;$num2 each and $num3 $item2 for &#8369;$num4 each. How much money did $name spend?";
        $soln = "Money spent by $name = $num1 &times; &#8369;$num2 + $num3 &times; &#8369;$num4<br>= &#8369;" . ($num1*$num2) . " + &#8369;" . ($num3*$num4) . "<br>= <strong>&#8369;$ans</strong>";
    } elseif ($qopt === 3) {
        // Change from 200 (small in both levels — legacy)
        $num1 = rand(4, 10);
        $num2 = rand(6, 10);
        $ans  = 200 - $num1 * $num2;
        $items = ['pencils', 'pens', 'toys', 'notebooks', 'coloring books'];
        $item1 = $items[array_rand($items)];
        $question = "$name bought $num1 $item1 for &#8369;$num2 each. How much change did $name get if $pron handed &#8369;200 to the storekeeper?";
        $soln = "Money spent by $name = $num1 &times; &#8369;$num2 = &#8369;" . ($num1*$num2) . "<br>$name's change = 200 - money spent<br>= &#8369;200 - &#8369;" . ($num1*$num2) . "<br>= <strong>&#8369;$ans</strong>";
    } else {
        // Money leftover after two purchases — Easy uses smaller starting money
        // and smaller operand ranges so answer stays positive
        if ($lvl === 'Easy') {
            $num0 = rand(70, 149);
            $num1 = rand(2, 5); $num2 = rand(3, 6);
            $num3 = rand(2, 5); $num4 = rand(3, 6);
        } else {
            $num0 = rand(190, 250);
            $num1 = rand(2, 9); $num2 = rand(3, 9);
            $num3 = rand(2, 9); $num4 = rand(3, 9);
        }
        $ans  = $num0 - ($num1*$num2 + $num3*$num4);
        $items = ['pencils', 'pens', 'toys', 'notebooks', 'coloring books'];
        $item1 = $items[array_rand($items)];
        $safety = 0;
        do { $item2 = $items[array_rand($items)]; $safety++; } while ($item1 === $item2 && $safety < 20);   // §I
        $question = "$name initially had &#8369;$num0. If $name bought $num1 $item1 for &#8369;$num2 each and $num3 $item2 for &#8369;$num4 each, how much money would $name have left?";
        $soln = "Money spent by $name = $num1 &times; &#8369;$num2 + $num3 &times; &#8369;$num4<br>= &#8369;" . ($num1*$num2) . " + &#8369;" . ($num3*$num4) . " = &#8369;" . ($num1*$num2 + $num3*$num4) . "<br>Money left = &#8369;$num0 - money spent<br>= &#8369;$num0 - &#8369;" . ($num1*$num2 + $num3*$num4) . "<br>= <strong>&#8369;$ans</strong>";
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
        <?php echo $result['question']; ?>
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
    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">   <?php /* §B */ ?>
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