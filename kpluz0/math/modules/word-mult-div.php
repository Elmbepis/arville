<?php
// math/modules/word-mult-div.php
// Computed free-text, single input. Mult/Div word problems.
// Easy = multiplication only; Hard = mixed mult + div.

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

$moduleTitle = 'Multiplication & Division Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));
$isEarly = ($grdKey <= 1);

// Color span helpers
$red = '<span style="color:#CC0066;font-weight:700;">';
$vio = '<span style="color:#800080;font-weight:700;">';
$end = '</span>';

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $studentAns = (int)trim((string)($_POST['answer'] ?? ''));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer((string)$studentAns, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'student' => $studentAns,
        'num1'    => $cur['num1'],
        'num2'    => $cur['num2'],
        'ans'     => $cur['ans'],
        'qmode'   => $cur['qmode'],
        'L1'      => $cur['L1'],
        'L2'      => $cur['L2'],
        'Lans'    => $cur['Lans'],
        'resp'    => $cur['resp'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Number limits
    if ($grdKey <= 1) {
        if ($lvl === 'Easy') { $n1lo = 2; $n1hi = 7; $n2lo = 2; $n2hi = 5; }
        else                 { $n1lo = 6; $n1hi = 12; $n2lo = 5; $n2hi = 9; }
    } elseif ($grdKey === 2) {
        if ($lvl === 'Easy') { $n1lo = 4; $n1hi = 10; $n2lo = 3; $n2hi = 7; }
        else                 { $n1lo = 19; $n1hi = 49; $n2lo = 6; $n2hi = 14; }
    } else {
        if ($lvl === 'Easy') { $n1lo = 5; $n1hi = 15; $n2lo = 3; $n2hi = 8; }
        else                 { $n1lo = 29; $n1hi = 99; $n2lo = 6; $n2hi = 16; }
    }

    $num1 = rand($n1lo, $n1hi);
    $num2 = rand($n2lo, $n2hi);

    // Word banks
    $objectsArr = ['rubber bands','greeting cards','book markers','marbles','action figures','candles','key chains','sports cards','ribbons','erasers'];
    $obj1 = $objectsArr[array_rand($objectsArr)];
    do { $obj2 = $objectsArr[array_rand($objectsArr)]; } while ($obj2 === $obj1);

    $objArr = $isEarly
        ? ['vases','cups','glasses','bottles','jars','coffee mugs','plates','saucers']
        : ['vases','cups','glasses','bottles','jars','figurines','coffee mugs','plates','saucers'];
    $obj3 = $objArr[array_rand($objArr)];
    do { $obj4 = $objArr[array_rand($objArr)]; } while ($obj4 === $obj3);

    $animalArr = $isEarly
        ? ['goats','cows','mice','puppies','kittens','chickens','ducks','geese']
        : ['goats','cows','dogs','cats','puppies','kittens','chickens','ducks','geese'];
    $animal3 = $animalArr[array_rand($animalArr)];
    do { $animal4 = $animalArr[array_rand($animalArr)]; } while ($animal4 === $animal3);

    $placesArr = $isEarly
        ? ['pasture','yard','farm','field','meadow','ranch']
        : ['pasture','yard','farm','field','meadow','ranch','plantation','orchard','vineyard'];
    $place1 = $placesArr[array_rand($placesArr)];

    $places2Arr = $isEarly
        ? ['supermarket','grocery store','mall','department store','trader']
        : ['supermarket','grocery store','mall','department store','thrift shop','kiosk'];
    $place3 = $places2Arr[array_rand($places2Arr)];
    do { $place4 = $places2Arr[array_rand($places2Arr)]; } while ($place4 === $place3);

    $namesArr = $isEarly
        ? ['Joanna','Michael','Carlo','Pablo','Dorothy','Terry','Peter','Jill','Barney','Emily','Glenda','Kirby','Jeff','Dwayne','Ben','Paul','William','Steve','George','Angel','Kathy','Calvin','Nicole','Roberta']
        : ['Joanna','Michael','Carlo','Pablo','Dorothy','Terry','Peter','Jill','Barney','Emily','Glenda','Kirby','Britney','Dwayne','Benedict','Penelope','William','Steven','George','Angelina','Kathy','Calvin','Nicole','Roberta'];
    $name1 = $namesArr[array_rand($namesArr)];
    do { $name2 = $namesArr[array_rand($namesArr)]; } while ($name2 === $name1);

    $randques = ($lvl === 'Easy') ? rand(1, 4) : rand(1, 7);

    if (!isset($_SESSION[$sessionKey]['last'])) $_SESSION[$sessionKey]['last'] = [];
    $last = $_SESSION[$sessionKey]['last'];
    $safety = 0;
    while (in_array($randques, $last, true) && $safety < 20) {
        $randques = ($lvl === 'Easy') ? rand(1, 4) : rand(1, 7);
        $safety++;
    }
    $last[] = $randques;
    if (count($last) > 3) $last = array_slice($last, -3);
    $_SESSION[$sessionKey]['last'] = $last;

    $qmode = 1;
    $newquestion = $resp1 = $resp2 = '';
    $L1 = $L2 = $Lans = '';

    if ($randques <= 4) {
        $ans = $num1 * $num2;
        if ($randques === 1) {
            $verbs0 = $isEarly ? ['pack','clean','buy','wash','bring','display','dry'] : ['collect','clean','buy','wash','bring','display','import','export','inspect'];
            $verbs  = $isEarly ? ['packed','cleaned','bought','washed','brought','displayed','dried'] : ['collected','cleaned','bought','washed','brought','displayed','imported','exported','inspected'];
            $vi = array_rand($verbs);
            $newquestion = $name1.' '.$verbs[$vi].' '.$red.$num1.$vio.' '.$obj3.'. If '.$name2.' '.$verbs[$vi].' '.$red.$num2.$vio.' times as many '.$obj4.' as that number, how many '.$obj4.' did '.$name2.' '.$verbs0[$vi].'?'.$end;
            $resp1 = "If $name1 ".$verbs[$vi]." $num1 $obj3 and $name2 ".$verbs[$vi]." $num2 times as many $obj4, ";
            $resp2 = "$ans $obj4.";
            $L1 = "$obj3 ".$verbs[$vi]." by $name1";
            $L2 = "$obj4 ".$verbs[$vi]." by $name2";
            $Lans = "total $obj4";
        } elseif ($randques === 2) {
            $newquestion = 'There are '.$red.$num1.$vio.' '.$animal3.' in the '.$place1.'. If there are '.$red.$num2.$vio.' times as many '.$animal4.' as '.$animal3.', how many '.$animal4.' are there?'.$end;
            $resp1 = "If there are $num1 $animal3 in the $place1 and $num2 times as many $animal4, ";
            $resp2 = "$ans $animal4.";
            $L1 = "$animal3 in the $place1";
            $L2 = "$animal4 (times $animal3)";
            $Lans = "total $animal4";
        } elseif ($randques === 3) {
            $newquestion = 'If a '.$place3.' sold '.$red.$num2.$vio.' times as many '.$obj3.' as a '.$place4.', how many '.$obj3.' did the '.$place3.' sell if the '.$place4.' sold '.$red.$num1.$vio.' '.$obj3.'?'.$end;
            $resp1 = "If a $place3 sold $num2 times as many $obj3 as a $place4, and $place4 sold $num1 $obj3, ";
            $resp2 = "the $place3 sold $ans $obj3.";
            $L1 = "$obj3 sold by $place4";
            $L2 = "$obj3 sold by $place3";
            $Lans = "total $obj3 sold by $place3";
        } else {
            $transpos = $isEarly ? ['boat','raft','barge','sailboat','plane','rowboat'] : ['boat','yacht','barge','sailboat','plane'];
            $peoples  = $isEarly ? ['men','women','people','teachers','pupils','children','parents'] : ['tourists','men','women','senior citizens','people','politicians','teachers','students','businessmen','athletes'];
            $places   = $isEarly ? ['city','resort','beach','village','park','town'] : ['tourist spot','city','resort','beach','village','leisure park','theme park','water park','historical spot'];
            $transpo = $transpos[array_rand($transpos)];
            $people  = $peoples[array_rand($peoples)];
            $place   = $places[array_rand($places)];
            $newquestion = $red.$num2.$vio.' '.$transpo.'s carried '.$red.$num1.$vio.' '.$people.' each to a '.$place.'. How many '.$people.' went to the '.$place.'?'.$end;
            $resp1 = "If $num2 ".$transpo."s carried $num1 $people each to a $place, ";
            $resp2 = "$ans $people went to the $place.";
            $L1 = "$people per $transpo";
            $L2 = "number of ".$transpo."s";
            $Lans = "total $people";
            $qmode = 3;
        }
    } else {
        $ans = $num1;
        $num1 = $ans * $num2;
        if ($randques === 5) {
            $newquestion = $name1.' bought '.$red.$num1.$vio.' '.$obj1.' from a '.$place3.'. If '.$name1.' gives them equally to '.$red.$num2.$vio.' kids, how many '.$obj1.' will each kid receive?'.$end;
            $resp1 = "If $name1 bought $num1 $obj1 and gives them equally to $num2 kids, ";
            $resp2 = "each kid will receive $ans $obj1.";
            $L1 = "$obj1";
            $L2 = "kids";
            $Lans = "$obj1 per kid";
        } elseif ($randques === 6) {
            $newquestion = 'If a '.$place3.' sold '.$red.$num1.$vio.' '.$obj1.' to '.$red.$num2.$vio.' customers equally, how many '.$obj1.' did each customer buy?'.$end;
            $resp1 = "If a $place3 sold $num1 $obj1 to $num2 customers equally, ";
            $resp2 = "each customer bought $ans $obj1.";
            $L1 = "$obj1";
            $L2 = "customers";
            $Lans = "$obj1 per customer";
        } else {
            $transpos = $isEarly ? ['boat','raft','barge','sailboat','plane','rowboat'] : ['boat','yacht','barge','sailboat','plane'];
            $peoples  = $isEarly ? ['men','women','people','teachers','pupils','children','parents'] : ['tourists','men','women','senior citizens','people','politicians','teachers','students','businessmen','athletes'];
            $places   = $isEarly ? ['city','resort','beach','village','park','town'] : ['tourist spot','city','resort','beach','village','leisure park','theme park','water park','historical spot'];
            $transpo = $transpos[array_rand($transpos)];
            $people  = $peoples[array_rand($peoples)];
            $place   = $places[array_rand($places)];
            $newquestion = $red.$num1.$vio.' '.$people.' went to a '.$place.' using '.$red.$num2.$vio.' '.$transpo.'s equally. How many '.$people.' rode in each '.$transpo.'?'.$end;
            $resp1 = "If $num1 $people went to a $place using $num2 ".$transpo."s equally, ";
            $resp2 = "$ans $people rode in each $transpo.";
            $L1 = "$people";
            $L2 = "number of ".$transpo."s";
            $Lans = "$people per $transpo";
        }
        $qmode = 2;
    }

    $_SESSION[$sessionKey]['current'] = [
        'num1'   => $num1, 'num2' => $num2, 'ans' => $ans,
        'qmode'  => $qmode,
        'L1'     => $L1, 'L2' => $L2, 'Lans' => $Lans,
        'resp'   => $resp1 . $resp2,
        'question' => $newquestion,
        'lvl'    => $lvl,
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
        <strong style="color:#CC0066; font-size:16pt;"><?php echo $result['student']; ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php echo $result['resp']; ?>
    </p>

    <p style="font-size:14pt; font-weight:700; color:#007700; text-align:center; margin-top:20px;">
        Traditional Solution:
    </p>
    <div style="max-width:480px; margin:10px auto; text-align:center; font-size:14pt; color:#333;">
        <?php if ($result['qmode'] === 2): ?>
            <div><?php echo htmlspecialchars($result['L1']); ?> = <strong style="color:#CC0066;"><?php echo $result['num1']; ?></strong></div>
            <div><?php echo htmlspecialchars($result['L2']); ?> = <strong style="color:#CC0066;"><?php echo $result['num2']; ?></strong></div>
            <div style="margin-top:10px; font-weight:700; color:#0000CC;">
                <?php echo htmlspecialchars($result['Lans']); ?> = <?php echo $result['num1']; ?> &divide; <?php echo $result['num2']; ?> = <strong><?php echo $result['ans']; ?></strong>
            </div>
        <?php else: ?>
            <div><?php echo htmlspecialchars($result['L1']); ?> = <strong style="color:#CC0066;"><?php echo $result['num1']; ?></strong></div>
            <div><?php echo htmlspecialchars($result['L2']); ?> = <strong style="color:#CC0066;"><?php echo $result['num2']; ?></strong></div>
            <div style="margin-top:10px; font-weight:700; color:#0000CC;">
                <?php echo htmlspecialchars($result['Lans']); ?> = <?php echo $result['num2']; ?> x <?php echo $result['num1']; ?> = <strong><?php echo $result['ans']; ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <p style="font-size:14pt; font-weight:700; color:#007700; text-align:center; margin-top:20px;">
        Block Model Solution:
    </p>
    <div style="max-width:560px; margin:15px auto; padding:15px; background:#fafafa; border:1px solid #cccccc; border-radius:6px; text-align:center;">
        <?php if ($result['qmode'] === 1 || $result['qmode'] === 3): ?>
            <div style="font-size:10pt; color:#555; margin-bottom:8px;"><?php echo htmlspecialchars($result['L1']); ?></div>
            <?php for ($r = 0; $r < $result['num2']; $r++): ?>
                <div style="margin-bottom:4px;">
                    <?php for ($c = 0; $c < $result['num1']; $c++): ?>
                        <span style="display:inline-block; width:24px; height:24px; background:#f9b8c8; border:1px solid #d88ba0; margin:2px; color:#555; font-size:8pt; line-height:24px;"><?php echo $result['num1']; ?></span>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        <?php else: ?>
            <div style="font-size:10pt; color:#555; margin-bottom:8px;"><?php echo htmlspecialchars($result['L1']); ?></div>
            <?php for ($i = 0; $i < $result['num1']; $i++):
                $isLast = ($i % $result['num2'] === $result['num2'] - 1);
                $bg = $isLast ? '#c8e6c8' : '#b8d4f9';
                $bd = $isLast ? '#88b888' : '#7fa5d8';
            ?>
                <span style="display:inline-block; width:24px; height:24px; background:<?php echo $bg; ?>; border:1px solid <?php echo $bd; ?>; margin:2px;"></span>
            <?php endfor; ?>
            <div style="font-size:10pt; color:#555; margin-top:8px;"><?php echo htmlspecialchars($result['L2']); ?> = <?php echo $result['num2']; ?> groups</div>
        <?php endif; ?>
        <div style="margin-top:12px; font-size:12pt; color:#0000CC; font-weight:700;">
            <?php if ($result['qmode'] === 2): ?>
                <?php echo htmlspecialchars($result['Lans']); ?> = <?php echo $result['num1']; ?> &divide; <?php echo $result['num2']; ?> = <strong><?php echo $result['ans']; ?></strong>
            <?php else: ?>
                <?php echo htmlspecialchars($result['Lans']); ?> = <?php echo $result['num2']; ?> x <?php echo $result['num1']; ?> = <strong><?php echo $result['ans']; ?></strong>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;">
        <?php echo $q_curr['question']; ?>
    </p>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin:20px 0;">
        Answer:
        <input type="text" name="answer" size="1" maxlength="<?php echo strlen((string)$q_curr['ans']) + 1; ?>"
               style="width:110px; height:48px; font-size:26px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
               autocomplete="off" autofocus>
    </p>
    <div style="margin-top:24px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php endif; ?>

    <?php if ($result !== null): ?>
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