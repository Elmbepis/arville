<?php
// math/modules/word-ratio.php
// PROCEDURAL RATIO PROBLEMS + choice. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels:
//   Easy = legacy Easy (2-ratio, randques 1-7 style) — grades 4-6 ranges
//   Hard = legacy Hard (3-ratio, randques 21-27 style) — grades 4-6 ranges
//   Legacy Medium dropped per §E (merged toward Easy; content preserved via Easy).
//
// $grd bug fix (§H): legacy referenced $grd without assignment &#8594; all range
// branches failed silently &#8594; rlim/nlim undefined. Now reads $_SESSION['grade'].
//
// Block model dropped: bar-{color}-1.jpg paths unverifiable. Traditional
// solution shown as text with formula.
// RecordHolders streak write dropped per §H (table not in modern schema).
//
// Theme: wquiz-06-* (75/655/70). Score box: score-*-1.
// DB row required: modules.url = 'word-ratio.php'

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

$moduleTitle = 'Ratio and Proportion Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));  // §H fix

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function make_ratio_distractors($ans, $candidates, $n = 3) {
    $seen = [(string)(int)$ans => true];
    $out = [];
    $clean = [];
    foreach ($candidates as $c) {
        $c = (int)round($c);
        if ($c > 0) $clean[] = $c;
    }
    $clean = array_values(array_unique($clean));
    shuffle($clean);
    foreach ($clean as $c) {
        if (!isset($seen[(string)$c]) && count($out) < $n) {
            $seen[(string)$c] = true;
            $out[] = $c;
        }
    }
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            if ($c > 0 && !isset($seen[(string)$c]) && count($out) < $n) {
                $seen[(string)$c] = true;
                $out[] = $c;
            }
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
    if ($grd == 4) {
        if ($lvl === 'Easy') { $rlim1 = 2; $rlim2 = 6;  $nlim1 = 3;  $nlim2 = 12; }
        else                 { $rlim1 = 2; $rlim2 = 8;  $nlim1 = 4;  $nlim2 = 21; }
    } elseif ($grd == 5) {
        if ($lvl === 'Easy') { $rlim1 = 2; $rlim2 = 8;  $nlim1 = 3;  $nlim2 = 12; }
        else                 { $rlim1 = 2; $rlim2 = 9;  $nlim1 = 7;  $nlim2 = 24; }
    } else {
        if ($lvl === 'Easy') { $rlim1 = 2; $rlim2 = 10; $nlim1 = 7;  $nlim2 = 20; }
        else                 { $rlim1 = 3; $rlim2 = 12; $nlim1 = 12; $nlim2 = 30; }
    }

    $r1 = rand($rlim1, $rlim2);
    $r2 = rand($rlim1, $rlim2);
    while ($r2 == $r1) $r2 = rand($rlim1, $rlim2);
    $num  = rand($nlim1, $nlim2);
    $num1 = $num * $r1;
    $num2 = $num * $r2;

    if ($lvl === 'Easy') {
        $ans = $num1;
        $candidates = [
            $num2,
            $num2 * $r2 / $r1,
            $num2 * $r1,
            $num1 + $num2,
            abs($num1 - $num2),
            $r1 + $r2,
            $r1 * $r2,
        ];

        $t = rand(1, 5);
        if ($t == 1) {
            $cs = ["bag", "box", "tin can", "cup", "bowl", "bottle", "tray", "drawer", "piggy bank", "container"];
            $coins = ["5-centavo", "10-centavo", "25-centavo", "50-centavo", "1-peso", "5-peso", "10-peso"];
            $c = $cs[array_rand($cs)];
            shuffle($coins);
            $coin1 = $coins[0]; $coin2 = $coins[1];
            $prompt = "A " . hl($c) . " has " . hl($num2) . " " . hl($coin2) . " coins and some " . hl($coin1) . " coins. If the ratio of " . hl($coin1) . " coins to " . hl($coin2) . " coins is " . hl($r1) . ":" . hl($r2) . ", how many " . hl($coin1) . " coins are there?";
            $L1 = "number of $coin2 coins"; $R = "ratio of $coin1 coins to $coin2 coins"; $Lans = "# of $coin1 coins";
        } elseif ($t == 2) {
            $pools = [
                ['objs' => ["lions","alligators","crocodiles","snakes","tigers","leopards"], 'places' => ["jungle","game reserve","zoo"]],
                ['objs' => ["pigeons","lovebirds","sparrows","crows","finches"], 'places' => ["aviary","bird cage","bird farm"]],
                ['objs' => ["goldfishes","carps","guppies","mollies"], 'places' => ["fish pond","aquarium","fish tank"]],
            ];
            $pool = $pools[array_rand($pools)];
            shuffle($pool['objs']);
            $o1 = $pool['objs'][0]; $o2 = $pool['objs'][1];
            $place = $pool['places'][array_rand($pool['places'])];
            $ph = rand(1, 2);
            if ($ph == 1) {
                $prompt = "A " . hl($place) . " has " . hl($num2) . " " . hl($o2) . " and some " . hl($o1) . ". If the ratio of " . hl($o1) . " to " . hl($o2) . " is " . hl($r1) . ":" . hl($r2) . ", how many " . hl($o1) . " are in the " . hl($place) . "?";
            } else {
                $prompt = "There are " . hl($num2) . " " . hl($o2) . " and some " . hl($o1) . " in a " . hl($place) . ". If the ratio of " . hl($o1) . " to " . hl($o2) . " is " . hl($r1) . ":" . hl($r2) . ", how many " . hl($o1) . " are in the " . hl($place) . "?";
            }
            $L1 = "number of $o2"; $R = "ratio of $o1 to $o2"; $Lans = "# of $o1";
        } elseif ($t == 3) {
            $pools = [
                ['objs' => ["lettuce heads","tomatoes","cucumbers","carrots","eggplants"], 'places' => ["market stall","vegetable store","crate"]],
                ['objs' => ["apples","bananas","pears","peaches","mangoes"], 'places' => ["fruit stand","fruit cart","crate"]],
                ['objs' => ["TV sets","laptops","cell phones","tablets"], 'places' => ["electronics store","appliance store","computer shop"]],
            ];
            $pool = $pools[array_rand($pools)];
            shuffle($pool['objs']);
            $o1 = $pool['objs'][0]; $o2 = $pool['objs'][1];
            $place = $pool['places'][array_rand($pool['places'])];
            $ph = rand(1, 2);
            if ($ph == 1) {
                $prompt = "A " . hl($place) . " has " . hl($num2) . " " . hl($o2) . " and some " . hl($o1) . ". If the ratio of " . hl($o1) . " to " . hl($o2) . " is " . hl($r1) . ":" . hl($r2) . ", how many " . hl($o1) . " are in the " . hl($place) . "?";
            } else {
                $prompt = "There are " . hl($num2) . " " . hl($o2) . " and some " . hl($o1) . " in a " . hl($place) . ". If the ratio of " . hl($o1) . " to " . hl($o2) . " is " . hl($r1) . ":" . hl($r2) . ", how many " . hl($o1) . " are in the " . hl($place) . "?";
            }
            $L1 = "number of $o2"; $R = "ratio of $o1 to $o2"; $Lans = "# of $o1";
        } elseif ($t == 4) {
            $objs = ["vases","cups","glasses","bottles","jars","plates"];
            $places = ["supermarket","grocery store","mall","department store","thrift shop","kiosk"];
            shuffle($objs); shuffle($places);
            $o1 = $objs[0]; $o2 = $objs[1];
            $p1 = $places[0]; $p2 = $places[1];
            $prompt = "If a " . hl($p1) . " sells " . hl($r2) . " " . hl($o1) . " for every " . hl($r1) . " " . hl($o2) . " sold by a " . hl($p2) . ", how many " . hl($o2) . " were sold by the " . hl($p2) . " if the " . hl($p1) . " has sold " . hl($num2) . " " . hl($o1) . "?";
            $L1 = "$o1 sold by the $p1"; $R = "ratio of $o2 to $o1"; $Lans = "$o2 sold by the $p2";
        } else {
            $animals = ["lizards","spiders","frogs","toads","salamanders","snakes"];
            $places  = ["garden","yard","farm","field","lawn","forest"];
            shuffle($animals);
            $a1 = $animals[0]; $a2 = $animals[1];
            $place = $places[array_rand($places)];
            $prompt = "If there are " . hl($r1) . " " . hl($a1) . " for every " . hl($r2) . " " . hl($a2) . " in the " . hl($place) . ", how many " . hl($a1) . " are there if there are " . hl($num2) . " " . hl($a2) . "?";
            $L1 = "$a2 in the $place"; $R = "ratio of $a1 to $a2"; $Lans = "$a1 in the $place";
        }

        $soln  = "$L1 = $num2<br>";
        $soln .= "$R = $r1:$r2<br><br>";
        $soln .= "<strong>$Lans = ($r1/$r2) x $num2 = $ans</strong>";
    } else {
        $r3 = rand($rlim1, $rlim2);
        while ($r3 == $r1 || $r3 == $r2) $r3 = rand($rlim1, $rlim2);
        $num3 = $num * $r3;

        $pick = rand(1, 2);
        $ans  = ($pick == 1) ? $num3 : $num2;
        $candidates = [
            ($pick == 1) ? $num2 : $num3,
            $num * ($r1 + $r2 + $r3),
            $num * ($r1 + $r2),
            $num * ($r2 + $r3),
            $num * 2,
        ];

        $t = rand(1, 3);
        if ($t == 1) {
            $cs = ["bag", "box", "tin can", "cup", "bowl", "bottle", "tray", "drawer", "piggy bank", "container"];
            $coins = ["5-centavo", "10-centavo", "25-centavo", "50-centavo", "1-peso", "5-peso", "10-peso"];
            $c = $cs[array_rand($cs)];
            shuffle($coins);
            $coin1 = $coins[0]; $coin2 = $coins[1]; $coin3 = $coins[2];
            $ask = ($pick == 1) ? $coin3 : $coin2;
            $prompt = "A " . hl($c) . " has " . hl($num1) . " " . hl($coin1) . " coins and some " . hl($coin2) . " and " . hl($coin3) . " coins. If they are in the ratio " . hl($r1) . ":" . hl($r2) . ":" . hl($r3) . ", how many " . hl($ask) . " coins are there?";
            $L1 = "number of $coin1 coins"; $L2 = "number of $coin2 coins"; $L3 = "number of $coin3 coins";
            $R = "ratio of $coin1, $coin2, $coin3"; $Lans = "# of $ask coins";
        } else {
            $pools = [
                ['objs' => ["apples","bananas","pears","peaches","mangoes","oranges"], 'places' => ["market stall","fruit stand","crate"]],
                ['objs' => ["lions","tigers","leopards","jaguars","cheetahs"], 'places' => ["jungle","game reserve","zoo"]],
                ['objs' => ["books","magazines","newspapers","cards"], 'places' => ["book store","newsstand","library"]],
            ];
            $pool = $pools[array_rand($pools)];
            shuffle($pool['objs']);
            $o1 = $pool['objs'][0]; $o2 = $pool['objs'][1]; $o3 = $pool['objs'][2];
            $place = $pool['places'][array_rand($pool['places'])];
            $ask = ($pick == 1) ? $o3 : $o2;
            $prompt = "There are " . hl($num1) . " " . hl($o1) . " and some " . hl($o2) . " and " . hl($o3) . " in a " . hl($place) . ". If they are in the ratio " . hl($r1) . ":" . hl($r2) . ":" . hl($r3) . ", how many " . hl($ask) . " are there?";
            $L1 = "number of $o1"; $L2 = "number of $o2"; $L3 = "number of $o3";
            $R = "ratio of $o1, $o2, $o3"; $Lans = "# of $ask";
        }

        $soln  = "$L1 = $num1<br>$L2 = $num2<br>$L3 = $num3<br>";
        $soln .= "$R = $r1:$r2:$r3<br><br>";
        $soln .= "<strong>$Lans = " . ($pick == 1 ? "($r3/$r1) x $num1 = $ans" : "($r2/$r1) x $num1 = $ans") . "</strong>";
    }

    $answerStr = (string)(int)$ans;
    $distractors = make_ratio_distractors($ans, $candidates, 3);
    $allChoices = array_map(function($c) { return (string)(int)$c; }, array_merge([$ans], $distractors));
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            $c = (int)$c;
            if ($c > 0 && !in_array((string)$c, $allChoices, true)) {
                $allChoices[] = (string)$c;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $prompt,
        'answer'   => $answerStr,
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
    'top_banner'    => $base . '/math/images/images/wquiz-06-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-06-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-06-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-06-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-06-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-06-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .hl-num { color:#CC0066; font-weight:700; }
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
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.5;">
        <?php echo $cur['prompt']; ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:500px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
        <strong style="color:#007700;">Solution:</strong><br>
        <?php echo $cur['solution']; ?>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.5;">
        <?php echo $q['prompt']; ?>
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