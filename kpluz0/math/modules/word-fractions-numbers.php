<?php
// math/modules/word-fractions-numbers.php
// MULTIPLE CHOICE (4 choices). Word problems: fractions of numbers.
// Uses ?ansclick=X + custom 2x2 grid (matches shape-area/perimeter/volume layout).
//
// Distractor logic (multiplication &#8594; area-style):
//   All answers are integers (num is always a multiple of denom, so num/denom
//   is exact). Distractors share the correct answer's last digit (for larger
//   values), tightened magnitudes — cannot be eliminated by units-digit
//   reasoning or by size alone.
//
// Levels: Easy = legacy Easy, Hard = legacy Medium (§E).
// Preserves all 9 question types + block model for denom &#8804; 16.
// Theme: wquiz-10-* is 75/655/70 (matches §C) &#8594; keep own theme? No, wquiz-10
//        was verified earlier as fitting; using paper-69-* per §C default.
//
// DB row required: modules.url = 'word-fractions-numbers.php'

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

$moduleTitle = "Fractions of Numbers Word Problems";
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(3, (int)($_SESSION['grade'] ?? 3)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function fmt_int($v) {
    return (string)(int)round($v);
}

// Distractor builder for integer answers — last-digit preserved.
function make_wfn_distractors($correct, $n = 3) {
    $correctCanon = fmt_int($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    // Small ints: unit-digit trick loses value; use tight integer offsets
    if ($correct < 10) {
        foreach ([1, 2, 3, 4, 5] as $d) {
            foreach ([+$d, -$d] as $signed) {
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cc = fmt_int($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) return $out;
            }
        }
        // Last resort
        $d = 1;
        while (count($out) < $n) {
            $cc = fmt_int($correct + $d);
            if (!isset($seen[$cc])) { $seen[$cc] = true; $out[] = $cc; }
            $d++;
        }
        return $out;
    }

    // Integer answers &#8805; 10: step 10 preserves last digit
    $step = 10;
    $pcts = [0.05, 0.10, 0.15, 0.20, 0.25, 0.30];
    $deltas = [];
    foreach ($pcts as $pct) {
        $off = (int)(round($correct * $pct / $step) * $step);
        if ($off < $step) $off = $step;
        $deltas[] = $off;
    }
    $deltas = array_values(array_unique($deltas));
    shuffle($deltas);

    foreach ($deltas as $delta) {
        if (count($out) >= $n) break;
        foreach ([$correct + $delta, $correct - $delta] as $cv) {
            if ($cv <= 0) continue;
            $cc = fmt_int($cv);
            if (isset($seen[$cc])) continue;
            $seen[$cc] = true;
            $out[] = $cc;
            if (count($out) >= $n) break 2;
        }
    }

    // Fallback
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$correct + $d, $correct - $d] as $cv) {
            if ($cv <= 0) continue;
            $cc = fmt_int($cv);
            if (isset($seen[$cc])) continue;
            $seen[$cc] = true;
            $out[] = $cc;
            if (count($out) >= $n) break 2;
        }
        $d++;
    }

    return $out;
}

// ============================================================
// HANDLE ANSWER CLICK  (GET ?ansclick=X)
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['ans_str'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $clicked,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Config: [numLimit1, numLimit2, numerLim1, numerLim2, denomLim1, denomLim2]
    $configs = [
        3 => [
            'Easy' => [1,  6, 1, 3, 2,  4],
            'Hard' => [3, 12, 1, 5, 2,  6],
        ],
        4 => [
            'Easy' => [3, 12, 1, 7, 2,  9],
            'Hard' => [5, 21, 1, 11, 7, 13],
        ],
        5 => [
            'Easy' => [5, 18, 1, 10, 5, 12],
            'Hard' => [11, 24, 1, 13, 7, 15],
        ],
        6 => [
            'Easy' => [11, 24, 1, 13, 7, 15],
            'Hard' => [18, 45, 1, 17, 9, 19],
        ],
    ];
    [$numlimit1, $numlimit2, $numerlim1, $numerlim2, $denomlim1, $denomlim2] = $configs[$grd][$lvl];

    // Generate fraction and number
    if ($grd <= 3) {
        // Legacy path: ensure ans1 and ans2 are not 1
        $safety = 0;
        do {
            $numer = rand($numerlim1, $numerlim2);
            do {
                $denom = rand($denomlim1, $denomlim2);
                $safety++;
            } while ($numer >= $denom && $safety < 30);
            if ($denom > 9) {
                if (($denom - $numer) == 1) $numer -= 2;
                else if ($numer == 1) $numer = 3;
            }
            // Reduce
            $numer1 = $numer; $denom1 = $denom;
            $primes = [2,3,5,7,11,13,17,19,23,29,31];
            foreach ($primes as $pf) {
                while ($numer1 % $pf == 0 && $denom1 % $pf == 0) {
                    $numer1 /= $pf; $denom1 /= $pf;
                }
            }
            if ($numer != $numer1) { $numer = $numer1; $denom = $denom1; }
            $num = rand($numlimit1, $numlimit2) * $denom;
            $safety++;
        } while (($num * $numer / $denom == 1 || $num * ($denom - $numer) / $denom == 1) && $safety < 60);
    } else {
        $safety = 0;
        do {
            $numer = rand($numerlim1, $numerlim2);
            $denom = rand($denomlim1, $denomlim2);
            $safety++;
        } while ($numer >= $denom && $safety < 30);
        $num = rand($numlimit1, $numlimit2) * $denom;
    }

    // Vocabulary pools (legacy)
    $objects = ['rare coins','toys','crayons','marbles','candies','pencils','books','flowers','pens','cookies','cards'];
    $object1 = $objects[array_rand($objects)];
    $s = 0;
    do { $object2 = $objects[array_rand($objects)]; $s++; } while ($object2 === $object1 && $s < 20);

    $objects2 = ['dolls','toy cars','comic books','bubble gums','balls','balloons'];
    $object3 = $objects2[array_rand($objects2)];

    $places = ['garden','yard','farm','field','barn','playground','market'];
    $place1 = $places[array_rand($places)];
    $s = 0;
    do { $place2 = $places[array_rand($places)]; $s++; } while ($place2 === $place1 && $s < 20);

    $colors = [1=>'red',2=>'orange',3=>'yellow',4=>'green',5=>'blue',6=>'violet',7=>'white'];
    $j = rand(1,7); $color = $colors[$j];
    $s = 0;
    do { $color2 = $colors[rand(1,7)]; $s++; } while ($color2 === $color && $s < 20);

    // Name with gender
    if (rand(1,2) == 1) {
        $posspron = 'his'; $perspron = 'he';
        $names = ['Michael','Carlo','Pablo','Terry','Peter','Barney','Kirby','Dwayne','Benedict','William','Steven','George','Calvin','Nick','Roberto','Patrick','Edgar','Joseph'];
    } else {
        $posspron = 'her'; $perspron = 'she';
        $names = ['Joanna','Dorothy','Jill','Emily','Glenda','Britney','Penelope','Angelina','Kathy','Nicole','Roberta','Joy','Vangie','Cynthia','Helen','Ivy','Mary'];
    }
    $name1 = $names[array_rand($names)];
    $s = 0;
    do { $name2 = $names[array_rand($names)]; $s++; } while ($name2 === $name1 && $s < 20);

    // Pick question type (1-9) with 4-deep repeat prevention
    $last4 = $_SESSION[$sessionKey]['last4'] ?? [];
    $safety = 0;
    do { $randques = rand(1, 9); $safety++; }
    while (in_array($randques, $last4, true) && $safety < 60);   // §I
    $last4[] = $randques;
    if (count($last4) > 4) $last4 = array_slice($last4, -4);
    $_SESSION[$sessionKey]['last4'] = $last4;

    // Default qmode 1: ask for remainder. qmode 2: ask for the fraction portion.
    if ($randques < 11) $ans = $num - ($num * ($numer / $denom));
    $qmode = 1;
    $question = ''; $resp = ''; $Lans = '';

    // ---- Build question (preserving legacy variety) ----
    if ($randques == 1) {
        $cs = ['bag','box','tin can','cup','bowl','bottle','tray','drawer','piggy bank','container'];
        $c = $cs[array_rand($cs)];
        $coins = ['5-centavo','10-centavo','25-centavo','50-centavo','1-peso','5-peso','10-peso'];
        $coin1 = $coins[array_rand($coins)];
        $s = 0;
        do { $coin2 = $coins[array_rand($coins)]; $s++; } while ($coin2 === $coin1 && $s < 20);
        if (rand(1,2) == 1) {
            $ans = $num - ($num * $numer / $denom);
            $question = "A $c has <b style='color:#CC0066;'>$num</b> coins. If <b style='color:#CC0066;'>$numer/$denom</b> of these are $coin1 coins and the rest are $coin2 coins, how many $coin2 coins are there?";
            $resp = "There are <b style='color:#CC0066;'>" . (int)$ans . "</b> $coin2 coins in the $c.";
            $Lans = "# of $coin2 coins";
            $qmode = 1;
        } else {
            $ans = $num * $numer / $denom;
            $question = "A $c has <b style='color:#CC0066;'>$num</b> coins. If <b style='color:#CC0066;'>$numer/$denom</b> of these are $coin1 coins and the rest are $coin2 coins, how many $coin1 coins are there?";
            $resp = "There are <b style='color:#CC0066;'>" . (int)$ans . "</b> $coin1 coins in the $c.";
            $Lans = "# of $coin1 coins";
            $qmode = 2;
        }
    } elseif ($randques == 2) {
        $places2 = ['a toy store','a grocery store','the mall','a street vendor','a hobby shop'];
        $place3 = $places2[array_rand($places2)];
        $ans = $num - ($num * $numer / $denom);
        $question = "$name1 bought <b style='color:#CC0066;'>$num</b> $object3 from $place3. If $name1 sends <b style='color:#CC0066;'>$numer/$denom</b> of them to $name2, how many $object3 will $name1 have left?";
        $resp = "$name1 will have <b style='color:#CC0066;'>" . (int)$ans . "</b> $object3 left.";
        $Lans = "# of $object3 left";
        $qmode = 1;
    } elseif ($randques == 3 && $grd <= 3) {
        $obj3 = ['glasses','cups','plates','saucers','mugs','figurines','bottles'];
        $obj = $obj3[array_rand($obj3)];
        $containers = ['plastic bag','sack','paper bag','basket','box'];
        $container = $containers[array_rand($containers)];
        $ans = $num - ($num * $numer / $denom);
        $question = "$name1 was carrying a $container containing <b style='color:#CC0066;'>$num</b> $obj when the $container slipped off $name1's hand. If <b style='color:#CC0066;'>$numer/$denom</b> of the $obj broke, how many $obj were left?";
        $resp = "<b style='color:#CC0066;'>" . (int)$ans . "</b> $obj were left.";
        $Lans = "# of $obj left";
        $qmode = 1;
    } elseif ($randques == 3 && $grd >= 4) {
        $obj3 = ['glasses','cups','plates','saucers','mugs','figurines','bottles','statues'];
        $obj = $obj3[array_rand($obj3)];
        $containers = ['plastic crate','wooden crate','big box','tub','large bin','package','metal container','giant sack'];
        $container = $containers[array_rand($containers)];
        $vehicles = ['pick-up truck','tricycle','jeepney','dune buggy','utility vehicle'];
        $vehicle = $vehicles[array_rand($vehicles)];
        $ans = $num - ($num * $numer / $denom);
        $question = "$name1 was driving a $vehicle carrying a $container with <b style='color:#CC0066;'>$num</b> $obj when the $container slipped off the $vehicle. If <b style='color:#CC0066;'>$numer/$denom</b> of the $obj broke, how many $obj were left?";
        $resp = "<b style='color:#CC0066;'>" . (int)$ans . "</b> $obj were left.";
        $Lans = "# of $obj left";
        $qmode = 1;
    } elseif ($randques == 4) {
        $farm = ['dogs','cats','horses','hens','ducks','goats','cows','donkeys','pigs'];
        $animal = $farm[array_rand($farm)];
        if (rand(1,2) == 1) {
            $ans = $num - ($num * $numer / $denom);
            $question = "There are <b style='color:#CC0066;'>$num</b> $animal in the $place1. If <b style='color:#CC0066;'>$numer/$denom</b> of them ran away, how many $animal will be left in the $place1?";
            $resp = "<b style='color:#CC0066;'>" . (int)$ans . "</b> $animal will be left in the $place1.";
            $Lans = "# of $animal left";
            $qmode = 1;
        } else {
            $ans = $num * $numer / $denom;
            $question = "There are <b style='color:#CC0066;'>$num</b> $animal in the $place1. If <b style='color:#CC0066;'>$numer/$denom</b> of them ran away, how many $animal will no longer be in the $place1?";
            $resp = "<b style='color:#CC0066;'>" . (int)$ans . "</b> $animal will no longer be in the $place1.";
            $Lans = "# of $animal that ran away";
            $qmode = 2;
        }
    } elseif ($randques == 5 && $grd <= 3) {
        if (rand(1,2) == 1) {
            $ans = $num - ($num * $numer / $denom);
            $question = "$name1 has <b style='color:#CC0066;'>$num</b> $object1. If $name1 loses <b style='color:#CC0066;'>$numer/$denom</b> of them in the $place1, how many $object1 will $name1 still have?";
            $resp = "$name1 will still have <b style='color:#CC0066;'>" . (int)$ans . "</b> $object1.";
            $Lans = "# of $object1 left";
            $qmode = 1;
        } else {
            $ans = $num * $numer / $denom;
            $question = "$name1 has <b style='color:#CC0066;'>$num</b> $object1. If $name1 loses <b style='color:#CC0066;'>$numer/$denom</b> of them in the $place1, how many of the $object1 will $name1 no longer have?";
            $resp = "$name1 will no longer have <b style='color:#CC0066;'>" . (int)$ans . "</b> of the $object1.";
            $Lans = "# of $object1 lost";
            $qmode = 2;
        }
    } elseif ($randques == 5 && $grd >= 4) {
        $places4 = ['market','mall','park','beach','theme park','party','farm','sporting event','fun run','fund-raising activity'];
        $place4 = $places4[array_rand($places4)];
        if (rand(1,2) == 1) {
            $ans = $num - ($num * $numer / $denom);
            $question = "$name1 has <b style='color:#CC0066;'>$num</b> $object1 in $posspron collection. If $name1 accidentally loses <b style='color:#CC0066;'>$numer/$denom</b> of them when $perspron went to a $place4, how many $object1 will $name1 still have?";
            $resp = "$name1 will still have <b style='color:#CC0066;'>" . (int)$ans . "</b> $object1.";
            $Lans = "# of $object1 left";
            $qmode = 1;
        } else {
            $ans = $num * $numer / $denom;
            $question = "$name1 has <b style='color:#CC0066;'>$num</b> $object1 in $posspron collection. If $name1 accidentally loses <b style='color:#CC0066;'>$numer/$denom</b> of them when $perspron went to a $place4, how many of the $object1 will $name1 no longer have?";
            $resp = "$name1 will no longer have <b style='color:#CC0066;'>" . (int)$ans . "</b> of the $object1.";
            $Lans = "# of $object1 lost";
            $qmode = 2;
        }
    } elseif ($randques == 6) {
        $farm = ['dogs','cats','horses','hens','ducks','goats','cows','donkeys','pigs'];
        $animal = $farm[array_rand($farm)];
        $ans = $num - ($num * $numer / $denom);
        $question = "$name1 owns <b style='color:#CC0066;'>$num</b> $animal. If $name1 gives <b style='color:#CC0066;'>$numer/$denom</b> of them to $name2, how many $animal will $name1 have left?";
        $resp = "$name1 will have <b style='color:#CC0066;'>" . (int)$ans . "</b> $animal left.";
        $Lans = "$animal left with $name1";
        $qmode = 1;
    } else {  // randques 7, 8, 9
        $adjecnum = rand(1, 3);
        if ($adjecnum == 1) {
            $where = ['in my bag','in my drawer','under my bed','on my table'][rand(0,3)];
            $objects5 = ['crayons','marbles','candies','pencils','balls','pens','plastic toys','paper flowers','toy cars','erasers'];
            $obj = $objects5[array_rand($objects5)];
            $adjec = $color; $adjec2 = $color2;
        } elseif ($adjecnum == 2) {
            $where = ['in the garage','in our basement','in my cabinet','in our yard'][rand(0,3)];
            $objects5 = ['statues','figurines','sculptures','decorations','ornaments'];
            $obj = $objects5[array_rand($objects5)];
            $adjecs = ['plastic','wooden','iron','ceramic','brass','bronze','copper','aluminum','fiberglass','concrete'];
            $adjec = $adjecs[array_rand($adjecs)];
            $s = 0;
            do { $adjec2 = $adjecs[array_rand($adjecs)]; $s++; } while ($adjec2 === $adjec && $s < 20);
        } else {
            $where = ['in our store','in the warehouse','in the delivery van','in my storage room'][rand(0,3)];
            $objects5 = ['pillows','mats','rugs','mirrors','frames','carpets','paintings','posters','trays'];
            $obj = $objects5[array_rand($objects5)];
            $adjecs = ['round','square','rectangular','triangular','oval','diamond-shaped'];
            $adjec = $adjecs[array_rand($adjecs)];
            $s = 0;
            do { $adjec2 = $adjecs[array_rand($adjecs)]; $s++; } while ($adjec2 === $adjec && $s < 20);
        }

        if (rand(1,2) == 1) {
            $ans = $num - ($num * $numer / $denom);
            $question = "There are <b style='color:#CC0066;'>$num</b> $obj $where that are either $adjec or $adjec2. If <b style='color:#CC0066;'>$numer/$denom</b> of them are $adjec, how many $adjec2 $obj are $where?";
            $resp = "There are <b style='color:#CC0066;'>" . (int)$ans . "</b> $adjec2 $obj $where.";
            $Lans = "# of $adjec2 $obj";
            $qmode = 1;
        } else {
            $ans = $num * $numer / $denom;
            $question = "There are <b style='color:#CC0066;'>$num</b> $obj $where that are either $adjec or $adjec2. If <b style='color:#CC0066;'>$numer/$denom</b> of them are $adjec, how many $adjec $obj are $where?";
            $resp = "There are <b style='color:#CC0066;'>" . (int)$ans . "</b> $adjec $obj $where.";
            $Lans = "# of $adjec $obj";
            $qmode = 2;
        }
    }

    $ansStr = fmt_int($ans);
    $distractors = make_wfn_distractors((int)$ans, 3);
    $choices = array_merge([$ansStr], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'num'        => $num,
        'numer'      => $numer,
        'denom'      => $denom,
        'ans'        => (int)$ans,
        'ans_str'    => $ansStr,
        'qmode'      => $qmode,
        'question'   => $question,
        'resp'       => $resp,
        'Lans'       => $Lans,
        'choices'    => $choices,
        'lvl'        => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/wquiz-10-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-10-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-10-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-10-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-10-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-10-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, "'Fractions of Numbers'<br/>Word Problems - " . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php
    $cur = $result['cur'];
    $num = $cur['num']; $numer = $cur['numer']; $denom = $cur['denom'];
    $ans = $cur['ans']; $qmode = $cur['qmode']; $ansDisp = $cur['ans_str'];
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:14pt; color:#800080; margin-top:15px;">
        <?php echo $cur['resp']; ?>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#007700; margin-top:20px;">Traditional Solution:</p>
    <div style="font-size:13pt; color:#800080; line-height:1.7; margin-top:10px;">
        <?php
        if ($qmode == 1) {
            echo "Fraction portion = ($numer/$denom) x $num = " . (int)($num * $numer / $denom) . "<br>";
            echo "$cur[Lans] = $num - " . (int)($num * $numer / $denom) . " = <strong style='color:#0000CC;'>$ansDisp</strong>";
        } else {
            echo "$cur[Lans] = ($numer/$denom) x $num = <strong style='color:#0000CC;'>$ansDisp</strong>";
        }
        ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:30px;">
        <?php echo $q['question']; ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444444;">
        <br/>Click on your answer.<br/>
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:400px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div style="margin-top:20px;">
        <br/><input type="submit" name="Submit2" value="New Question">
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