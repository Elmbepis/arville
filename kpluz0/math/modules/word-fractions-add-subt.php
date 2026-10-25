<?php
// math/modules/word-fractions-add-subt.php
// Computed free-text, DUAL input (fraction numerator/denominator),
// bypass pattern §D category 2 + §F.2 compound scoring.
// Fraction addition/subtraction word problems.
//
// FIXES vs. previous version:
//   * Answer-numerator formula restored to the exact legacy two-branch
//     structure. The earlier "compute subtraction, then negate for
//     addition" shortcut produced wrong sums (e.g. 1/4+5/8 -> 3/8).
//
// Preserved from legacy as-is:
//   * qmode=2 swap of numerator/denominator pairs when fraction2 > fraction1
//   * Naming-label mismatch after that swap (see comment inside; not fixed
//     unless asked — user asked to preserve legacy behavior)
//   * Grade &#8804; 3 block model, grade &#8805; 4 traditional + optional block model
//   * All vocabulary pools, question-type distribution (q=1..6)

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

$moduleTitle = 'Fraction Addition & Subtraction<br/>Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(0, (int)($_SESSION['grade'] ?? 0)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function frac_gcd($a, $b) {
    $a = abs((int)$a); $b = abs((int)$b);
    while ($b) { $t = $b; $b = $a % $b; $a = $t; }
    return $a ?: 1;
}

// ============================================================
// HANDLE SUBMIT1  (dual input, §F.2 compound scoring)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $sNum = (int)($_POST['postnumer'] ?? 0);
    $sDen = (int)($_POST['postdenom'] ?? 0);

    if ($sDen === 0) {
        $sCombined = 'invalid';
    } else {
        if ($sDen < 0) { $sNum = -$sNum; $sDen = -$sDen; }
        $g = frac_gcd($sNum, $sDen);
        $sCombined = ($sNum / $g) . '/' . ($sDen / $g);
    }

    $g2 = frac_gcd($cur['ansnumer'], $cur['ansdenom']);
    $cCombined = ($cur['ansnumer'] / $g2) . '/' . ($cur['ansdenom'] / $g2);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($sCombined, $cCombined, $cur['lvl']);

    $result = [
        'correct'  => $isCorrect,
        'userNum'  => $sNum,
        'userDen'  => $sDen,
        'cur'      => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // ---- Grade/level parameters (Hard = legacy Medium, §E) ----
    if ($grd <= 3) {
        $qmode = (rand(1, 2) === 1) ? 1 : 2;
        if ($lvl === 'Easy') {
            $numerlim1=1; $numerlim2=5; $denomlim1=2; $denomlim2=6; $dfaclim=3; $highest=12;
        } else {
            if ($qmode==1) { $numerlim1=1; $numerlim2=6; } else { $numerlim1=2; $numerlim2=7; }
            $denomlim1=4; $denomlim2=10; $dfaclim=4; $highest=20;
        }
    } elseif ($grd == 4) {
        if ($lvl === 'Easy') { $numerlowest=1; $lowest=1;  $highest=15; }
        else                 { $numerlowest=1; $lowest=10; $highest=21; }
        $denom1s = [2,2,2,2,2,2,2,2,  3,3,3,3,3,3,  4,4,4,5,5];
        $denom2s = [3,5,7,9,11,13,15,17,  4,5,7,8,10,11,  5,7,9,6,7];
    } elseif ($grd == 5) {
        if ($lvl === 'Easy') { $numerlowest=1; $lowest=6;  $highest=28; }
        else                 { $numerlowest=1; $lowest=10; $highest=48; }
        $denom1s = [2,2,2,2,2,2,  3,3,3,3,3,  4,4,4,4,  5,5,5,5,  6];
        $denom2s = [7,9,11,13,15,17,  5,7,8,10,11,  5,7,9,11,  6,7,8,9,  7];
    } else {
        if ($lvl === 'Easy') { $numerlowest=1; $lowest=10; $highest=36; }
        else                 { $numerlowest=1; $lowest=10; $highest=60; }
        $denom1s = [2,2,2,2,2,2,  3,3,3,3,3,  4,4,4,4,4,4,  5,5,5,5,5,5,  6,7];
        $denom2s = [7,9,11,13,15,17,  5,7,8,10,11,  5,7,9,11,13,15,  6,7,8,9,11,12,  7,8];
    }

    // ---- Denominators ----
    $safety = 0;
    if ($grd <= 3) {
        $denomfac = rand(2, $dfaclim);
        do {
            $denom1 = rand($denomlim1, $denomlim2);
            $denom2 = $denom1 * $denomfac;
            $safety++;
        } while ($denom2 > $highest && $safety < 100);
        $denom = $denom2;
        if (rand(1,2) === 1) { $t=$denom2; $denom2=$denom1; $denom1=$t; }
    } else {
        $count = count($denom1s) - 1;
        $safety = 0;
        do {
            $j = rand(0, $count);
            $denom1 = $denom1s[$j];
            $denom2 = $denom2s[$j];
            $denom = $denom1 * $denom2;
            $safety++;
        } while (($denom > $highest || $denom < $lowest || $denom1 == $denom2) && $safety < 200);
        if (rand(1,2) === 1) { $t=$denom2; $denom2=$denom1; $denom1=$t; }
        $qmode = rand(1, 2);
    }
    $ansdenom = $denom;

    // ---- Numerators ----
    $safety = 0;
    do {
        $numer1 = rand($numerlowest ?? $numerlim1, $denom1 - 1);
        $numer2 = rand($numerlowest ?? $numerlim1, $denom2 - 1);
        $safety++;
        $sum = $numer1/$denom1 + $numer2/$denom2;
        $eq  = ($qmode == 2) && (abs($numer1/$denom1 - $numer2/$denom2) < 1e-9);
    } while (($sum >= 1 || $eq) && $safety < 200);

    // qmode=2 only: ensure numer1/denom1 >= numer2/denom2 (legacy)
    if ($qmode == 2 && $numer2/$denom2 > $numer1/$denom1) {
        $t=$numer1; $numer1=$numer2; $numer2=$t;
        $t=$denom1; $denom1=$denom2; $denom2=$t;
    }

    // ============================================================
    // FIX: Answer numerator — exact legacy branches
    // (previous version reused subtraction formula + sign flip, wrong)
    // ============================================================
    if ($grd <= 3) {
        if ($qmode == 1) {          // addition
            if ($denom == $denom1) $ansnumer = $numer1 + $denomfac * $numer2;
            else                   $ansnumer = $denomfac * $numer1 + $numer2;
        } else {                    // subtraction
            if ($denom == $denom1) $ansnumer = $numer1 - $denomfac * $numer2;
            else                   $ansnumer = $denomfac * $numer1 - $numer2;
        }
    } else {
        if ($qmode == 1) $ansnumer = $numer1 * $denom2 + $numer2 * $denom1;
        else             $ansnumer = $numer1 * $denom2 - $numer2 * $denom1;
    }

    // ---- Vocabulary pools ----
    $treats  = ['mint candies','bubble gums','chocolate bars','ice cream cones','lollipops','gummy drops','cookies','jelly cups','marshmallows'];
    $places  = ['garden','yard','farm','field','barn','playground','market'];
    $names   = ['Joanna','Michael','Carlo','Pablo','Dorothy','Terry','Peter','Jill','Barney','Emily','Glenda','Kirby','Britney','Dwayne','Benedict','Penelope','William','Steven','George','Angelina','Kathy','Calvin','Nicole','Roberta'];

    // ---- Pick question type (q=1..6), 4-deep repeat prevention ----
    $last4 = $_SESSION[$sessionKey]['last4'] ?? [];
    $safety = 0;
    do { $q = rand(1, 6); $safety++; }
    while (in_array($q, $last4, true) && $safety < 50);
    $last4[] = $q;
    if (count($last4) > 4) $last4 = array_slice($last4, -4);
    $_SESSION[$sessionKey]['last4'] = $last4;

    $name1 = $names[array_rand($names)];
    $s = 0;
    do { $name2 = $names[array_rand($names)]; $s++; } while ($name2 === $name1 && $s < 20);

    // ---- Question text ----
    $question = ''; $resp = ''; $L1 = ''; $L2 = ''; $Lobj = ''; $Lans = '';

    if ($q == 1) {
        $cs = ['bag','box','tin can','cup','bowl','bottle','tray','drawer','piggy bank','container'];
        $c = $cs[array_rand($cs)];
        $coins = ['5-centavo','10-centavo','25-centavo','50-centavo','1-peso','5-peso','10-peso'];
        $coin1 = $coins[array_rand($coins)];
        $s = 0;
        do { $coin2 = $coins[array_rand($coins)]; $s++; } while ($coin2 === $coin1 && $s < 20);
        $question = "$numer1/$denom1 of all the coins in a $c are $coin1 coins while $numer2/$denom2 are $coin2 coins. ";
        if ($qmode == 1) {
            $question .= "What fraction of all the coins in the $c are either $coin1 or $coin2 coins?";
            $resp = "$ansnumer/$ansdenom of the coins are either $coin1 or $coin2 coins.";
            $Lans = "fraction of coins that are either $coin1 or $coin2 coins";
        } else {
            $question .= "The difference between the number of $coin1 coins and the number of $coin2 coins is what fraction of all the coins?";
            $resp = "The difference between the number of $coin1 coins and the number of $coin2 coins is $ansnumer/$ansdenom of all the coins.";
            $Lans = "fraction of coins that is the difference between $coin1 and $coin2 coins";
        }
        $L1 = "fraction of $coin1 coins";
        $L2 = "fraction of $coin2 coins";
        $Lobj = "coins in the $c";

    } elseif ($q == 2) {
        $objects = ['balls','plastic toys','school bags','caps','handkerchiefs','pencils','towels','slippers','pens','crayons','markers','candles','socks','shirts'];
        $object1 = $objects[array_rand($objects)];
        $verbs = ['bought','owns','keeps','sold','found','paid for','received','got','gave away','donated'];
        $verb = $verbs[array_rand($verbs)];
        $qs = ['a lot of','several','a number of','hundreds of'];
        $quant = $qs[array_rand($qs)];
        $colors = ['red','orange','yellow','green','blue','violet','white','magenta','pink','gray'];
        $color1 = $colors[array_rand($colors)];
        $s = 0;
        do { $color2 = $colors[array_rand($colors)]; $s++; } while ($color2 === $color1 && $s < 20);
        $question = "$name1 $verb $quant $object1. If $numer1/$denom1 of these $object1 are $color1 and $numer2/$denom2 are $color2, ";
        if ($qmode == 1) {
            $question .= "what fraction of $name1's $object1 are either $color1 or $color2?";
            $resp = "$ansnumer/$ansdenom of the $object1 are either $color1 or $color2.";
            $Lans = "fraction of $object1 that are either $color1 or $color2";
        } else {
            $question .= "the difference between the number of $color1 $object1 and the number of $color2 $object1 is what fraction of all the $object1?";
            $resp = "The difference between the number of $color1 $object1 and the number of $color2 $object1 is $ansnumer/$ansdenom of all the $object1.";
            $Lans = "fraction that is the difference between $color1 and $color2 $object1";
        }
        $L1 = "fraction of $color1 $object1";
        $L2 = "fraction of $color2 $object1";
        $Lobj = $object1;

    } else {
        $opt = rand(1, 4);
        if ($q == 3 || $q == 4) {
            if ($opt == 1) {
                $animals = ['lions','alligators','crocodiles','snakes','tigers','leopards','jaguars','hyenas','cheetahs','wild dogs'];
                $ps = ['part of a jungle','part of a forest','game reserve','zoo','wildlife rescue center'];
                $atype = (rand(1,2) === 1) ? 'predators' : 'carnivores';
            } elseif ($opt == 2) {
                $animals = ['king cobras','spitting cobras','pit vipers','horned vipers','water mocassins','puff adders','rattlesnakes','anacondas','reticulated pythons','sea snakes','corn snakes','milk snakes','king snakes','black mambas','twig snakes','garter snakes','ball pythons','burmese pythons'];
                $ps = ['snake pit','zoo','wildlife rescue center','reptile cage','snake cage','snake enclosure','large terrarium','reptile research center','snake research center','snake farm'];
                $atype = (rand(1,2) === 1) ? 'snakes' : 'reptiles';
            } elseif ($opt == 3) {
                $animals = ['pigeons','lovebirds','budgerigars','finches','falcons','hawks','eagles','cockatoos','macaws','sparrows','crows','vultures','hornbills','cockatiels'];
                $ps = ['part of a jungle','part of a forest','game reserve','zoo','wildlife rescue center','city aviary','large bird cage','bird breeding facility','bird farm','pet store','pet shop'];
                $atype = (rand(1,2) === 1) ? 'birds' : 'flying animals';
            } else {
                $animals = ['goldfishes','carps','angelfishes','mollies','guppies','gouramis','catfishes','tetras','barbs','swordtails','fighting fishes','algae eaters','flowerhorns','arowanas'];
                $ps = ['fish pond','large aquarium','city aquarium','man-made lake','garden pond','fish tank','fish farm','fish breeding facility','pet shop','pet store','fish store'];
                $atype = (rand(1,2) === 1) ? 'fishes' : 'aquatic animals';
            }
            $animal1 = $animals[array_rand($animals)];
            $s = 0;
            do { $animal2 = $animals[array_rand($animals)]; $s++; } while ($animal2 === $animal1 && $s < 20);
            $p = $ps[array_rand($ps)];

            if (rand(1,2) === 1) {
                $question = "In a $p, $numer1/$denom1 of the $atype are $animal1 while $numer2/$denom2 are $animal2. ";
            } else {
                $question = "$numer1/$denom1 of the $atype in a $p are $animal1 while $numer2/$denom2 are $animal2. ";
            }
            if ($qmode == 1) {
                $question .= "What fraction of all the $atype in that $p consist of $animal1 and $animal2?";
                $resp = "$animal1 and $animal2 comprise $ansnumer/$ansdenom of all the $atype.";
                $Lans = "fraction of $atype that are either $animal1 or $animal2";
            } else {
                $question .= "By what fraction of the $atype in that $p do the fraction of $animal1 exceed the fraction of $animal2?";
                $resp = "$animal1 are greater in number than $animal2 by $ansnumer/$ansdenom of all the $atype.";
                $Lans = "fraction of $atype by which $animal1 exceed $animal2 in number";
            }
            $L1 = "fraction of $animal1";
            $L2 = "fraction of $animal2";
            $Lobj = $atype;
        } else {
            if ($opt == 1) {
                $objects = ['baseball','basketball','chess','soccer','badminton','lawn tennis','cricket','ice hockey','polo','table tennis','bowling'];
                $ps = ['sporting event',"school's sports activity",'sports club event','sports competition','company sportsfest','mini-olympics','sports festival','recent inter-school competition'];
                $verbs = ['played','were in','competed in','participated in'];
                $subjs = ['players','participants','competitors','attendees','athletes','contestants'];
            } elseif ($opt == 2) {
                $objects = ['lettuce','tomatoes','potatoes','corn','rice','cabbages','carrots','peppers','beans','eggplants'];
                $ps = ['farm','plantation'];
                $verbs = ['planted','cultivated','grew','harvested'];
                $subjs = ['farmers','vegetable gardeners','food growers'];
            } elseif ($opt == 3) {
                $objects = ['pastries','sweets and candies','handicrafts','clothing','home decors','garden accents','footwear','artworks','souvenir items','books','toys'];
                $ps = ['trade fair','midnight market','trade expo','product expo','trade exhibit','product festival','yard sale','garage sale'];
                $verbs = ['bought','purchased'];
                $subjs = ['visitors','buyers','customers','patrons','shoppers'];
            } else {
                $objects = ['machineries','DVD players','computer tablets','desktop computers','laptops','automobile parts','airplane parts','cellular phones','lighting fixtures','airconditioning units','MP3 players','television sets','electric fans','security systems','microchips','medical equipment'];
                $ps = ['company','corporation','manufacturing plant','production plant','factory'];
                $verbs = ['assemble','build','manufacture','test','produce','inspect'];
                $subjs = ['employees','workers','laborers','operators','staff members'];
            }
            $object1 = $objects[array_rand($objects)];
            $s = 0;
            do { $object2 = $objects[array_rand($objects)]; $s++; } while ($object2 === $object1 && $s < 20);
            $p = $ps[array_rand($ps)];
            $verb = $verbs[array_rand($verbs)];
            $subj = $subjs[array_rand($subjs)];

            if (rand(1,2) === 1) {
                $question = "In a $p, $numer1/$denom1 of the $subj $verb $object1 while $numer2/$denom2 $verb $object2. ";
            } else {
                $question = "$numer1/$denom1 of the $subj in a $p $verb $object1 while $numer2/$denom2 $verb $object2. ";
            }
            if ($qmode == 1) {
                $question .= "What fraction of all the $subj in that $p $verb either $object1 or $object2?";
                $resp = "$ansnumer/$ansdenom of the $subj $verb either $object1 or $object2.";
                $Lans = "fraction of $subj who $verb either $object1 or $object2";
            } else {
                $question .= "By what fraction of all the $subj do the $subj who $verb $object1 exceed those who $verb $object2?";
                $resp = "The $subj who $verb $object1 are greater in number than those who $verb $object2 by $ansnumer/$ansdenom of all the $subj.";
                $Lans = "fraction of $subj that is the difference between those who $verb $object1 and those who $verb $object2";
            }
            $L1 = "fraction of $subj who $verb $object1";
            $L2 = "fraction of $subj who $verb $object2";
            $Lobj = "$subj in the $p";
        }
    }

    $_SESSION[$sessionKey]['current'] = [
        'numer1'   => $numer1,
        'numer2'   => $numer2,
        'denom1'   => $denom1,
        'denom2'   => $denom2,
        'denom'    => $denom,
        'ansnumer' => $ansnumer,
        'ansdenom' => $ansdenom,
        'qmode'    => $qmode,
        'L1'       => $L1,
        'L2'       => $L2,
        'Lobj'     => $Lobj,
        'Lans'     => $Lans,
        'question' => $question,
        'resp'     => $resp,
        'grd'      => $grd,
        'lvl'      => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ---- Block-model / solution renderer ----
function render_fraction_solution($cur) {
    $n1 = $cur['numer1']; $n2 = $cur['numer2'];
    $d1 = $cur['denom1']; $d2 = $cur['denom2'];
    $d  = $cur['denom'];
    $an = $cur['ansnumer']; $ad = $cur['ansdenom'];
    $qm = $cur['qmode'];
    $gr = $cur['grd'];

    $g  = frac_gcd($an, $ad);
    $ln = $an / $g; $ld = $ad / $g;
    $lowest = ($g > 1) ? "This is $ln/$ld in lowest terms." : '';

    $n1b = $n1 * ($d / $d1);
    $n2b = $n2 * ($d / $d2);

    $c1 = '#f7a8ce';
    $c2 = '#8fb8e8';
    $cg = '#e8e8e8';

    ob_start();

    echo '<div style="text-align:center;color:#800080;font-size:14pt;line-height:1.6;margin:20px 0;">';
    echo htmlspecialchars($cur['resp']) . ($lowest ? ' ' . $lowest : '');
    echo '</div>';

    if ($gr >= 4) {
        echo '<p style="color:#007700;font-size:13pt;font-weight:700;margin-top:20px;">Traditional Solution:</p>';
        echo '<div style="color:#800080;font-size:14pt;line-height:1.8;">';
        echo htmlspecialchars($cur['L1']) . " = $n1/$d1 = " . ($n1*$d2) . "/$d<br>";
        echo htmlspecialchars($cur['L2']) . " = $n2/$d2 = " . ($n2*$d1) . "/$d<br><br>";
        if ($qm == 1) {
            echo htmlspecialchars($cur['Lans']) . " = $n1/$d1 + $n2/$d2 = " . ($n1*$d2) . "/$d + " . ($n2*$d1) . "/$d = <strong>$an/$ad</strong>";
        } else {
            echo htmlspecialchars($cur['Lans']) . " = $n1/$d1 - $n2/$d2 = " . ($n1*$d2) . "/$d - " . ($n2*$d1) . "/$d = <strong>$an/$ad</strong>";
        }
        if ($lowest) echo "<br>$lowest";
        echo '</div>';
    }

    $showBlock = ($gr <= 3) || ($d <= 36);
    if ($showBlock) {
        echo '<p style="color:#007700;font-size:13pt;font-weight:700;margin-top:20px;">Block Model:</p>';
        echo '<p style="color:#800080;font-size:13pt;">The least common denominator of ' . $d1 . ' and ' . $d2 . ' is ' . $d . ' so let ' . $d . ' blocks represent all the ' . htmlspecialchars($cur['Lobj']) . '.</p>';

        $bar = function($segments) {
            $h = '<div style="display:flex;height:40px;border:2px solid #333;border-radius:8px;overflow:hidden;max-width:600px;margin:8px auto;">';
            foreach ($segments as $seg) {
                $h .= '<div style="flex:1;background:' . $seg['color'] . ';border-right:1px solid #999;display:flex;align-items:center;justify-content:center;font-size:11pt;font-weight:700;color:#555;">' . ($seg['label'] ?? '') . '</div>';
            }
            return $h . '</div>';
        };

        $segs = [];
        for ($i = 1; $i <= $d; $i++) {
            $segs[] = ['color' => '#f0f0f0', 'label' => ($d < 10 ? "1/$d" : '')];
        }
        echo '<p style="color:#555;font-size:12pt;">all the ' . htmlspecialchars($cur['Lobj']) . ' (' . $d . ' blocks)</p>';
        echo $bar($segs);

        $segs2 = [];
        if ($qm == 1) {
            for ($i = 1; $i <= $n1b; $i++) $segs2[] = ['color' => $c1];
            for ($i = 1; $i <= $n2b; $i++) $segs2[] = ['color' => $c2];
            for ($i = 1; $i <= ($d - $n1b - $n2b); $i++) $segs2[] = ['color' => $cg];
            echo '<p style="color:#800080;font-size:12pt;margin-top:10px;">' . $n1b . ' blocks (fraction 1) + ' . $n2b . ' blocks (fraction 2) = ' . ($n1b+$n2b) . ' blocks</p>';
            echo $bar($segs2);
            echo '<p style="color:#800080;font-size:13pt;">' . $n1b . '/' . $d . ' + ' . $n2b . '/' . $d . ' = <strong>' . ($n1b+$n2b) . '/' . $d . '</strong> = ' . $an . '/' . $ad . '</p>';
        } else {
            $nn = $n1b - $n2b;
            $dn = $d - $n1b;
            for ($i = 1; $i <= $n1b; $i++) $segs2[] = ['color' => $c1];
            for ($i = 1; $i <= $dn; $i++) $segs2[] = ['color' => $cg];
            echo '<p style="color:#800080;font-size:12pt;margin-top:10px;">fraction 1 = ' . $n1b . ' blocks:</p>';
            echo $bar($segs2);

            $segs3 = [];
            for ($i = 1; $i <= $n2b; $i++) $segs3[] = ['color' => $c2];
            for ($i = 1; $i <= $nn; $i++) $segs3[] = ['color' => '#ffe08a', 'label' => '?'];
            for ($i = 1; $i <= $dn; $i++) $segs3[] = ['color' => $cg];
            echo '<p style="color:#800080;font-size:12pt;">fraction 2 = ' . $n2b . ' blocks; difference = ' . $nn . ' blocks:</p>';
            echo $bar($segs3);
            echo '<p style="color:#800080;font-size:13pt;">' . $n1b . '/' . $d . ' - ' . $n2b . '/' . $d . ' = <strong>' . $nn . '/' . $d . '</strong> = ' . $an . '/' . $ad . '</p>';
        }
    }

    return ob_get_clean();
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/wquiz-12-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-12-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-12-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-12-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-12-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-12-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle, $moduleTitle . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answer:
        <strong style="color:#0000CC; font-size:16pt;"><?php echo $result['userNum'] . '/' . ($result['userDen'] ?: '?'); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:13pt; font-weight:700; color:#800080; text-align:center; margin-top:20px;">Let's review the problem:</p>
    <p class="statement" style="font-size:14pt; color:#800080;"><?php echo $result['cur']['question']; ?></p>
    <?php echo render_fraction_solution($result['cur']); ?>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;"><?php echo $q_curr['question']; ?></p>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin:20px 0;">
        Answer:
        <div style="display:inline-block; text-align:center; vertical-align:middle;">
            <input type="text" name="postnumer" size="4" maxlength="3"
                   style="width:80px; height:40px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
                   autocomplete="off" autofocus>
            <div style="border-top:3px solid #333; height:0; margin:4px 0; width:100%;"></div>
            <input type="text" name="postdenom" size="4" maxlength="3"
                   style="width:80px; height:40px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
                   autocomplete="off">
        </div>
    </p>
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