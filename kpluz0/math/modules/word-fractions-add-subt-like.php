<?php
// math/modules/word-fractions-add-subt-like.php
// Computed free-text, dual-input (fraction). Like-fraction word problems.
// Easy = addition; Hard = subtraction + neither logic (mixed).

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

$moduleTitle = 'Like Fractions Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

// ---- Color span helpers (trusted internal templates) ----
$red  = '<span style="color:#CC0066;font-weight:700;">';
$vio  = '<span style="color:#800080;font-weight:700;">';
$end  = '</span>';

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $sN = (int)($_POST['postnumer'] ?? 0);
    $sD = (int)($_POST['postdenom'] ?? 0);
    $invalid = ($sD === 0);

    // Reduce both sides for comparison
    $a = abs($sN); $b = abs($sD);
    while ($b) { [$a, $b] = [$b, $a % $b]; }
    $g1 = $a ?: 1;
    $srn = $invalid ? -1 : intdiv($sN, $g1);
    $srd = $invalid ? -1 : intdiv($sD, $g1);

    $a = abs($cur['ansnumer']); $b = abs($cur['ansdenom']);
    while ($b) { [$a, $b] = [$b, $a % $b]; }
    $g2 = $a ?: 1;
    $crn = intdiv($cur['ansnumer'], $g2);
    $crd = intdiv($cur['ansdenom'], $g2);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer("$srn|$srd", "$crn|$crd", $cur['lvl']);

    $result = [
        'correct'   => $isCorrect,
        'invalid'   => $invalid,
        'sN'        => $sN,
        'sD'        => $sD,
        'numer1'    => $cur['numer1'],
        'numer2'    => $cur['numer2'],
        'denom'     => $cur['denom'],
        'ansnumer'  => $cur['ansnumer'],
        'ansdenom'  => $cur['ansdenom'],
        'lowN'      => $crn,
        'lowD'      => $crd,
        'qmode'     => $cur['qmode'],
        'resp'      => $cur['resp'],
        'Lobj'      => $cur['Lobj'],
        'L1'        => $cur['L1'],
        'L2'        => $cur['L2'],
        'Lans'      => $cur['Lans'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($lvl === 'Easy') {
        $forms = [1, 2, 3, 4, 5];                  // addition only
        $nlo = 1; $nhi = 7; $dlo = 7; $dhi = 9;
    } else {
        $forms = [11, 12, 13, 21, 22, 23, 24];     // subtraction + neither
        $nlo = 2; $nhi = 9; $dlo = 10; $dhi = 12;
    }

    if (!isset($_SESSION[$sessionKey]['last'])) $_SESSION[$sessionKey]['last'] = [];
    $last = $_SESSION[$sessionKey]['last'];
    $form = $forms[array_rand($forms)];
    $safety = 0;
    while (in_array($form, $last, true) && $safety < 20) {
        $form = $forms[array_rand($forms)];
        $safety++;
    }
    $last[] = $form;
    if (count($last) > 2) $last = array_slice($last, -2);
    $_SESSION[$sessionKey]['last'] = $last;

    $denom  = rand($dlo, $dhi);
    $numer1 = rand($nlo, $nhi);
    $numer2 = rand($nlo, $nhi);

    // Ensure sum < denom (all forms need this)
    $safety = 0;
    while (($numer1 + $numer2) >= $denom && $safety < 100) {
        $numer1 = rand($nlo, $nhi);
        $numer2 = rand($nlo, $nhi);
        $safety++;
    }

    // Word banks
    $objects  = ['balls','toys','bags','caps','candies','pencils','towels','kites','pens','crayons','markers','balloons','candles','ribbons'];
    $colors   = ['red','orange','yellow','green','blue','violet','white','magenta','pink','gray'];
    $names    = ['Angel','Angelina','Benedict','Ben','Bill','Bitoy','Britney','Joanna','Michael','Carlo','Pablo','Dorothy','Terry','Peter','Pedro','Jill','Barney','Emily','Glenda','Kirby','Girlie','Kiko','Joey','Victor','Carmen','Louie','Wally','Dwayne','Penelope','William','Steven','Pyke','George','Kathy','Calvin','Domeng','Jolina','Pia','Nicole','Nick','Leila','Marian','Raiza','Helen','Edwin','Roberta'];
    $animals  = ['dogs','cats','horses','hens','ducks','goats','cows','donkeys','pigs'];
    $places   = ['garden','schoolyard','farm','football field','fruit orchard','playground','market','park','zoo'];
    $foods    = ['ice cream','pudding','pizza','noodles','fish','salad','chicken','pasta','sushi'];
    $subjects = ['children','teachers','employees','athletes','students','visitors','contestants'];
    $acts     = [' during breaktime',' in the cafeteria',' at the party',' at a gathering',' for lunch',' before going home'];
    $conts    = ['bag','box','tin can','cup','bowl','bottle','tray','drawer','piggy bank','container'];
    $coins    = ['5-centavo','10-centavo','25-centavo','50-centavo','1-peso','5-peso','10-peso'];

    $obj1 = $objects[array_rand($objects)];
    $color1 = $colors[array_rand($colors)];
    do { $color2 = $colors[array_rand($colors)]; } while ($color2 === $color1);
    $name1 = $names[array_rand($names)];
    do { $name2 = $names[array_rand($names)]; } while ($name2 === $name1);
    $animal1 = $animals[array_rand($animals)];
    do { $animal2 = $animals[array_rand($animals)]; } while ($animal2 === $animal1);
    $place1 = $places[array_rand($places)];
    $food1  = $foods[array_rand($foods)];
    do { $food2 = $foods[array_rand($foods)]; } while ($food2 === $food1);
    $subject = $subjects[array_rand($subjects)];
    $act     = $acts[array_rand($acts)];
    $cont    = $conts[array_rand($conts)];
    $coin1   = $coins[array_rand($coins)];
    do { $coin2 = $coins[array_rand($coins)]; } while ($coin2 === $coin1);
    $unit    = (rand(1, 2) === 1) ? 'mile' : 'kilometer';

    $qmode = 1;
    $ansnumer = 0; $ansdenom = 0;
    $newquestion = $resp1 = $resp2 = '';
    $L1 = $L2 = $Lobj = $Lans = '';

    if ($form === 1) {
        $newquestion = $red.$numer1.'/'.$denom.$vio.' of the coins in a '.$cont.' are '.$coin1.' coins while '.$red.$numer2.'/'.$denom.$vio.' are '.$coin2.' coins. What fraction of the coins are either '.$coin1.' or '.$coin2.' coins?'.$end;
        $resp1 = "If $numer1/$denom of the coins in a $cont are $coin1 coins while $numer2/$denom are $coin2 coins, ";
        $ansnumer = $numer1 + $numer2; $ansdenom = $denom;
        $resp2 = "$ansnumer/$ansdenom of the coins are either $coin1 or $coin2 coins.";
        $L1 = "fraction of $coin1 coins"; $L2 = "fraction of $coin2 coins";
        $Lans = "fraction of coins that are either $coin1 or $coin2";
        $Lobj = "all the coins in the $cont";
    } elseif ($form === 2) {
        $newquestion = $name1.' has some '.$obj1.'. If '.$red.$numer1.'/'.$denom.$vio.' of these '.$obj1.' are '.$color1.' and '.$red.$numer2.'/'.$denom.$vio.' are '.$color2.', what fraction of the '.$obj1.' are either '.$color1.' or '.$color2.'?'.$end;
        $resp1 = "If $numer1/$denom of $name1's $obj1 are $color1 and $numer2/$denom are $color2, ";
        $ansnumer = $numer1 + $numer2; $ansdenom = $denom;
        $resp2 = "$ansnumer/$ansdenom of the $obj1 are either $color1 or $color2.";
        $L1 = "fraction of $color1 $obj1"; $L2 = "fraction of $color2 $obj1";
        $Lans = "fraction of $obj1 that are either $color1 or $color2";
        $Lobj = $obj1;
    } elseif ($form === 3) {
        $newquestion = 'If '.$red.$numer1.'/'.$denom.$vio.' of the '.$subject.' ate '.$food1.$act.' and '.$red.$numer2.'/'.$denom.$vio.' ate '.$food2.', what fraction of all the '.$subject.' ate either '.$food1.' or '.$food2.'?'.$end;
        $resp1 = "If $numer1/$denom of the $subject ate $food1$act and $numer2/$denom ate $food2, ";
        $ansnumer = $numer1 + $numer2; $ansdenom = $denom;
        $resp2 = "$ansnumer/$ansdenom of the $subject ate either $food1 or $food2.";
        $L1 = "fraction who ate $food1"; $L2 = "fraction who ate $food2";
        $Lans = "fraction of $subject who ate either $food1 or $food2";
        $Lobj = "all the $subject";
    } elseif ($form === 4) {
        $newquestion = 'If '.$red.$numer1.'/'.$denom.$vio.' of the farm animals owned by '.$name1.' are '.$animal1.' while '.$red.$numer2.'/'.$denom.$vio.' are '.$animal2.', what fraction of all the farm animals owned by '.$name1.' are either '.$animal1.' or '.$animal2.'?'.$end;
        $resp1 = "If $numer1/$denom of $name1's farm animals are $animal1 while $numer2/$denom are $animal2, ";
        $ansnumer = $numer1 + $numer2; $ansdenom = $denom;
        $resp2 = "$ansnumer/$ansdenom of the farm animals are either $animal1 or $animal2.";
        $L1 = "fraction that are $animal1"; $L2 = "fraction that are $animal2";
        $Lans = "fraction of animals that are either $animal1 or $animal2";
        $Lobj = "all the farm animals";
    } elseif ($form === 5) {
        $newquestion = 'At a '.$place1.', '.$name1.' walked '.$red.$numer1.'/'.$denom.$vio.' '.$unit.', rested, and then walked another '.$red.$numer2.'/'.$denom.$vio.' '.$unit.'. How far did '.$name1.' walk?'.$end;
        $resp1 = "If $name1 walked $numer1/$denom $unit, then walked another $numer2/$denom $unit, ";
        $ansnumer = $numer1 + $numer2; $ansdenom = $denom;
        $resp2 = "$name1 walked a total of $ansnumer/$ansdenom $unit.";
        $L1 = "first walk"; $L2 = "second walk";
        $Lans = "fraction of a $unit walked";
        $Lobj = "1 $unit";
    } elseif ($form === 11) {
        if ($numer1 < $numer2) { [$numer1, $numer2] = [$numer2, $numer1]; }
        $newquestion = 'If '.$red.$numer1.'/'.$denom.$vio.' of '.$name1.'\'s farm animals are '.$animal1.' while '.$red.$numer2.'/'.$denom.$vio.' are '.$animal2.', by what fraction are the '.$animal1.' more than the '.$animal2.'?'.$end;
        $resp1 = "If $numer1/$denom of $name1's farm animals are $animal1 while $numer2/$denom are $animal2, ";
        $ansnumer = $numer1 - $numer2; $ansdenom = $denom;
        $resp2 = "the $animal1 are $ansnumer/$ansdenom of the animals more than $animal2.";
        $L1 = "fraction that are $animal1"; $L2 = "fraction that are $animal2";
        $Lans = "fraction that the $animal1 are more than the $animal2";
        $Lobj = "all the farm animals";
        $qmode = 2;
    } elseif ($form === 12) {
        if ($numer1 < $numer2) { [$numer1, $numer2] = [$numer2, $numer1]; }
        $newquestion = $name1.' has some '.$obj1.'. If '.$red.$numer1.'/'.$denom.$vio.' of these '.$obj1.' are '.$color1.' and '.$red.$numer2.'/'.$denom.$vio.' are '.$color2.', by what fraction are the '.$color1.' '.$obj1.' more than the '.$color2.' '.$obj1.'?'.$end;
        $resp1 = "If $numer1/$denom of $name1's $obj1 are $color1 and $numer2/$denom are $color2, ";
        $ansnumer = $numer1 - $numer2; $ansdenom = $denom;
        $resp2 = "the $color1 $obj1 are $ansnumer/$ansdenom of the $obj1 more than the $color2 $obj1.";
        $L1 = "fraction of $color1 $obj1"; $L2 = "fraction of $color2 $obj1";
        $Lans = "fraction that $color1 are more than $color2";
        $Lobj = "all the $obj1";
        $qmode = 2;
    } elseif ($form === 13) {
        if ($numer1 < $numer2) { [$numer1, $numer2] = [$numer2, $numer1]; }
        $newquestion = 'At a '.$place1.', '.$name1.' walked '.$red.$numer1.'/'.$denom.$vio.' '.$unit.' while '.$name2.' walked '.$red.$numer2.'/'.$denom.$vio.' '.$unit.'. How much farther did '.$name1.' walk than '.$name2.'?'.$end;
        $resp1 = "If $name1 walked $numer1/$denom $unit while $name2 walked $numer2/$denom $unit, ";
        $ansnumer = $numer1 - $numer2; $ansdenom = $denom;
        $resp2 = "$name1 walked $ansnumer/$ansdenom of a $unit more than $name2.";
        $L1 = "$name1's walk"; $L2 = "$name2's walk";
        $Lans = "difference in walk length";
        $Lobj = "1 $unit";
        $qmode = 2;
    } elseif ($form === 21) {
        $newquestion = $red.$numer1.'/'.$denom.$vio.' of the coins in a '.$cont.' are '.$coin1.' coins while '.$red.$numer2.'/'.$denom.$vio.' are '.$coin2.' coins. What fraction are neither '.$coin1.' nor '.$coin2.' coins?'.$end;
        $resp1 = "If $numer1/$denom of the coins are $coin1 and $numer2/$denom are $coin2, ";
        $ansnumer = $denom - ($numer1 + $numer2); $ansdenom = $denom;
        $resp2 = "$ansnumer/$ansdenom of the coins are neither $coin1 nor $coin2.";
        $L1 = "fraction of $coin1 coins"; $L2 = "fraction of $coin2 coins";
        $Lans = "fraction that are neither $coin1 nor $coin2";
        $Lobj = "all the coins in the $cont";
        $qmode = 3;
    } elseif ($form === 22) {
        $newquestion = $name1.' has some '.$obj1.'. If '.$red.$numer1.'/'.$denom.$vio.' are '.$color1.' and '.$red.$numer2.'/'.$denom.$vio.' are '.$color2.', what fraction are neither '.$color1.' nor '.$color2.'?'.$end;
        $resp1 = "If $numer1/$denom of $name1's $obj1 are $color1 and $numer2/$denom are $color2, ";
        $ansnumer = $denom - ($numer1 + $numer2); $ansdenom = $denom;
        $resp2 = "$ansnumer/$ansdenom of the $obj1 are neither $color1 nor $color2.";
        $L1 = "fraction of $color1 $obj1"; $L2 = "fraction of $color2 $obj1";
        $Lans = "fraction that are neither $color1 nor $color2";
        $Lobj = "all the $obj1";
        $qmode = 3;
    } elseif ($form === 23) {
        $newquestion = 'If '.$red.$numer1.'/'.$denom.$vio.' of the '.$subject.' ate '.$food1.$act.' and '.$red.$numer2.'/'.$denom.$vio.' ate '.$food2.', what fraction ate neither '.$food1.' nor '.$food2.'?'.$end;
        $resp1 = "If $numer1/$denom of the $subject ate $food1$act and $numer2/$denom ate $food2, ";
        $ansnumer = $denom - ($numer1 + $numer2); $ansdenom = $denom;
        $resp2 = "$ansnumer/$ansdenom of the $subject ate neither $food1 nor $food2.";
        $L1 = "fraction who ate $food1"; $L2 = "fraction who ate $food2";
        $Lans = "fraction that ate neither $food1 nor $food2";
        $Lobj = "all the $subject";
        $qmode = 3;
    } elseif ($form === 24) {
        $newquestion = 'If '.$red.$numer1.'/'.$denom.$vio.' of '.$name1.'\'s farm animals are '.$animal1.' while '.$red.$numer2.'/'.$denom.$vio.' are '.$animal2.', what fraction are neither '.$animal1.' nor '.$animal2.'?'.$end;
        $resp1 = "If $numer1/$denom of $name1's farm animals are $animal1 while $numer2/$denom are $animal2, ";
        $ansnumer = $denom - ($numer1 + $numer2); $ansdenom = $denom;
        $resp2 = "$ansnumer/$ansdenom of the farm animals are neither $animal1 nor $animal2.";
        $L1 = "fraction that are $animal1"; $L2 = "fraction that are $animal2";
        $Lans = "fraction that are neither $animal1 nor $animal2";
        $Lobj = "all the farm animals";
        $qmode = 3;
    }

    $_SESSION[$sessionKey]['current'] = [
        'numer1' => $numer1, 'numer2' => $numer2, 'denom' => $denom,
        'ansnumer' => $ansnumer, 'ansdenom' => $ansdenom,
        'qmode' => $qmode,
        'resp'  => $resp1 . $resp2,
        'question' => $newquestion,
        'Lobj' => $Lobj, 'L1' => $L1, 'L2' => $L2, 'Lans' => $Lans,
        'lvl' => $lvl,
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
    <?php if ($result['invalid']): ?>
        <p style="font-size:14pt; font-weight:700; color:#CC0066; text-align:center; margin-top:20px;">
            &#10060; Your answer is invalid.
        </p>
    <?php else: ?>
        <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
            Your answer:
            <strong style="color:#CC0066; font-size:16pt;"><?php echo $result['sN']; ?>/<?php echo $result['sD']; ?></strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
    <?php endif; ?>

    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php echo $result['resp']; ?>
        <?php if ($result['ansnumer'] !== $result['lowN'] || $result['ansdenom'] !== $result['lowD']): ?>
            <br><span style="color:#888; font-size:12pt;">This is
                <strong style="color:#CC0066;"><?php echo $result['lowN']; ?>/<?php echo $result['lowD']; ?></strong>
                in lowest terms.
            </span>
        <?php endif; ?>
    </p>

    <div style="text-align:center; font-size:16pt; font-weight:700; color:#333; margin:15px 0;">
        <?php if ($result['qmode'] === 1): ?>
            <span style="color:#CC0066;"><?php echo $result['numer1']; ?>/<?php echo $result['denom']; ?></span>
            <span style="color:#800080;"> + </span>
            <span style="color:#CC0066;"><?php echo $result['numer2']; ?>/<?php echo $result['denom']; ?></span>
            <span style="color:#800080;"> = </span>
            <span style="color:#0000CC;"><?php echo $result['ansnumer']; ?>/<?php echo $result['ansdenom']; ?></span>
        <?php elseif ($result['qmode'] === 2): ?>
            <span style="color:#CC0066;"><?php echo $result['numer1']; ?>/<?php echo $result['denom']; ?></span>
            <span style="color:#800080;"> - </span>
            <span style="color:#CC0066;"><?php echo $result['numer2']; ?>/<?php echo $result['denom']; ?></span>
            <span style="color:#800080;"> = </span>
            <span style="color:#0000CC;"><?php echo $result['ansnumer']; ?>/<?php echo $result['ansdenom']; ?></span>
        <?php else: ?>
            <span style="color:#0000CC;"><?php echo $result['denom']; ?>/<?php echo $result['denom']; ?></span>
            <span style="color:#800080;"> - </span>
            <span style="color:#CC0066;"><?php echo ($result['numer1'] + $result['numer2']); ?>/<?php echo $result['denom']; ?></span>
            <span style="color:#800080;"> = </span>
            <span style="color:#0000CC;"><?php echo $result['ansnumer']; ?>/<?php echo $result['ansdenom']; ?></span>
        <?php endif; ?>
    </div>

    <p style="font-size:14pt; font-weight:700; color:#007700; text-align:center; margin-top:20px;">
        Block Model Solution:
    </p>
    <div style="max-width:560px; margin:15px auto; padding:15px; background:#fafafa; border:1px solid #cccccc; border-radius:6px; text-align:center;">
        <div style="font-size:10pt; color:#555; margin-bottom:10px;"><?php echo htmlspecialchars($result['Lobj']); ?></div>
        <?php
        $cells = [];
        $c1 = $result['qmode'] === 3 ? ($result['denom'] - $result['numer1'] - $result['numer2']) : $result['numer1'];
        for ($i = 0; $i < $result['numer1']; $i++) {
            echo '<span style="display:inline-block; width:26px; height:26px; background:#f9b8c8; border:1px solid #d88ba0; margin:2px;"></span>';
        }
        for ($i = 0; $i < $result['numer2']; $i++) {
            echo '<span style="display:inline-block; width:26px; height:26px; background:#b8d4f9; border:1px solid #7fa5d8; margin:2px;"></span>';
        }
        $remaining = $result['denom'] - $result['numer1'] - $result['numer2'];
        if ($result['qmode'] === 3) {
            for ($i = 0; $i < $remaining; $i++) {
                echo '<span style="display:inline-block; width:26px; height:26px; background:#c8e6c8; border:1px solid #88b888; margin:2px;"></span>';
            }
        } else {
            for ($i = 0; $i < $remaining; $i++) {
                echo '<span style="display:inline-block; width:26px; height:26px; background:#e8e8e8; border:1px solid #cccccc; margin:2px;"></span>';
            }
        }
        ?>
        <div style="margin-top:12px; font-size:12pt; color:#0000CC; font-weight:700;">
            <?php echo htmlspecialchars($result['L1']); ?> + <?php echo htmlspecialchars($result['L2']); ?> = <strong><?php echo $result['ansnumer']; ?>/<?php echo $result['ansdenom']; ?></strong>
        </div>
    </div>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;">
        <?php echo $q_curr['question']; ?>
    </p>
    <div style="display:inline-block; text-align:center; margin:20px 0;">
        <div><input type="text" name="postnumer" size="1" maxlength="3"
                    style="width:80px; height:44px; font-size:24px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
                    autocomplete="off" autofocus></div>
        <div style="width:80px; height:3px; background:#333; margin:4px auto;"></div>
        <div><input type="text" name="postdenom" size="1" maxlength="3"
                    style="width:80px; height:44px; font-size:24px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
                    autocomplete="off"></div>
    </div>
    <div style="margin-top:20px;">
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