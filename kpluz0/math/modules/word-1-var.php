<?php
// math/modules/word-1-var.php
// PROCEDURAL single-variable linear word problems. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels preserved (§E):
//   Easy = 16 forms (consecutive numbers, ages, money, work-rate, coin, tickets, parts, heights, weights, future/past ages)
//   Hard = 6 forms (complex age comparisons, 3-coin problems, chemical mixture, price mixture, larger ticket)
//
// 22 distinct forms preserved. All produce numeric answers, some decimal.
// Legacy '×'/'÷' glyphs not present — no encoding fix needed for math symbols.
// Legacy &#8369; (peso) replaced with 'P' per §16.
// Legacy <font> and <img> tags stripped from solution (keeps <br>) per §16.
//
// Distractors: 10% band, scale-adaptive step (int vs decimal). 4-choice
// guarantee §13.7 via pad loop. Repeat prevention uses last10 for Easy,
// last3 for Hard per §20.
//
// Theme: test65-* (110/582/108) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1 (score-top1.jpg legacy, preserved variant).
// DB row required: modules.url = 'word-1-var.php'

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

$moduleTitle = 'Single-Variable Linear<br/>Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function fmt_lv($v) {
    $v = round((float)$v, 4);
    if (abs($v - round($v)) < 0.0001) return (string)(int)round($v);
    return rtrim(rtrim(number_format($v, 4, '.', ''), '0'), '.');
}

function make_lv_distractors($ans, $n = 3) {
    $ans = (float)$ans;
    $band = max(2, abs($ans) * 0.10);
    $isInt = abs($ans - round($ans)) < 0.001;
    $step = $isInt ? max(1, (int)round($band / 5)) : max(0.001, round($band / 5, 4));

    $out  = [];
    $seen = [fmt_lv($ans) => true];
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d * $step, $ans - $d * $step] as $c) {
            if ((float)$c == $ans) continue;
            $s = fmt_lv($c);
            if (isset($seen[$s])) continue;
            $seen[$s] = true;
            $out[] = $s;
            if (count($out) >= $n) break 2;
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
    $names = ["Joan","Mike","Carlo","Pablo","Dory","Terry","Pedro","Jill","Barney","Emily","Girlie","Kiko","Joey","Victor","Bitoy","Carmen","Luis","Wally","Benny","Dwayne","Ben","Pyke","Bill","Steve","George","Angel","Kathy","Calvin","Nick","Leila","Marian","Raiza","Helen","Edwin","Domeng","Jolina","Pia"];
    $j1 = array_rand($names);
    do { $j2 = array_rand($names); } while ($j2 == $j1);
    $name1 = $names[$j1];
    $name2 = $names[$j2];

    $objects = ["balls","toys","crayons","marbles","candies","pencils","books","fishes","pens","cards"];
    $object  = $objects[array_rand($objects)];

    // Repeat prevention
    if ($lvl === 'Easy') {
        $lastKey = 'last10_easy';
        $last = $_SESSION[$sessionKey][$lastKey] ?? [];
        $tries = 0;
        do {
            $form = rand(1, 16);
            $tries++;
        } while (in_array($form, $last, true) && $tries < 50);
        $last[] = $form;
        if (count($last) > 10) $last = array_slice($last, -10);
        $_SESSION[$sessionKey][$lastKey] = $last;
    } else {
        $lastKey = 'last3_hard';
        $last = $_SESSION[$sessionKey][$lastKey] ?? [];
        $tries = 0;
        do {
            $form = rand(31, 36);
            $tries++;
        } while (in_array($form, $last, true) && $tries < 30);
        $last[] = $form;
        if (count($last) > 3) $last = array_slice($last, -3);
        $_SESSION[$sessionKey][$lastKey] = $last;
    }

    $red = ''; $vio = ''; $blue = '';   // strip legacy colors
    $peso = 'P';                        // §16

    $q = ''; $exp = ''; $soln1 = ''; $ans = 0;

    // ============================================================
    // FORM 1 — two consecutive numbers
    // ============================================================
    if ($form == 1) {
        $opt = rand(1, 2);
        $pnum = rand(1, 5);
        if ($pnum == 1) $prob1 = "If the sum of two consecutive numbers is equal to ";
        elseif ($pnum == 2) $prob1 = "$name1 added two consecutive numbers. If the result is ";
        elseif ($pnum == 3) $prob1 = "$name1 was given two consecutive numbers to add. If the answer equals ";
        elseif ($pnum == 4) $prob1 = "I added two consecutive numbers. If the total that I got is ";
        else $prob1 = "If the sum that $name1 got after adding two consecutive numbers is ";

        $x = rand(12, 299);
        $y = $x + 1;
        $prob2 = ($x + $y) . ", ";
        if ($opt == 1) {
            $prob3 = "what is the smaller number?";
            $ans = $x;
            $soln1 = "Let 'x' be the smaller number and 'x+1' be the larger number.<br>";
            $soln1 .= "x + (x+1) = " . ($x + $y) . "<br>";
            $soln1 .= "2x + 1 = " . ($x + $y) . "<br>";
            $soln1 .= "2x = " . ($x + $y - 1) . "<br>";
            $soln1 .= "x = $ans";
        } else {
            $prob3 = "what is the larger number?";
            $ans = $y;
            $soln1 = "Let 'x' be the smaller number and 'x+1' be the larger number.<br>";
            $soln1 .= "x + (x+1) = " . ($x + $y) . "<br>";
            $soln1 .= "2x + 1 = " . ($x + $y) . "<br>";
            $soln1 .= "2x = " . ($x + $y - 1) . "<br>";
            $soln1 .= "x = " . (($x + $y - 1) / 2) . "  so  x+1 = $ans";
        }
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORM 2 — two consecutive even/odd numbers
    elseif ($form == 2) {
        $opt = rand(1, 2);
        $rnum = rand(1, 2);
        if ($rnum == 1) { $x = rand(7, 149) * 2; $oddeven = "even"; }
        else            { $x = rand(7, 149) * 2 + 1; $oddeven = "odd"; }
        $y = $x + 2;
        $prob2 = ($x + $y) . ", ";
        if ($opt == 1) {
            $prob3 = "what is the smaller number?";
            $ans = $x;
        } else {
            $prob3 = "what is the larger number?";
            $ans = $y;
        }
        $pnum = rand(1, 5);
        if ($pnum == 1) $prob1 = "If the sum of two consecutive $oddeven numbers is equal to ";
        elseif ($pnum == 2) $prob1 = "$name1 added two consecutive $oddeven numbers. If the result is ";
        elseif ($pnum == 3) $prob1 = "$name1 was given two consecutive $oddeven numbers to add. If the answer equals ";
        elseif ($pnum == 4) $prob1 = "I added two consecutive $oddeven numbers. If the sum that I got is ";
        else $prob1 = "$name1 added two consecutive $oddeven numbers. If the total that $name1 got is ";

        $soln1  = "Let 'x' be the smaller number and 'x+2' be the larger number.<br>";
        $soln1 .= "x + (x+2) = " . ($x + $y) . "<br>";
        $soln1 .= "2x + 2 = " . ($x + $y) . "<br>";
        $soln1 .= "2x = " . ($x + $y - 2) . "<br>";
        $soln1 .= "x = " . (($x + $y - 2) / 2);
        if ($opt == 2) $soln1 .= "  so  x+2 = $ans";
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORM 3 — age × factor
    elseif ($form == 3) {
        $x = rand(3, 50);
        $fac = rand(2, 4);
        $y = $x * $fac;
        while ($y > 110) { $fac = rand(2, 4); $y = $x * $fac; }

        if (rand(1, 2) == 1) {
            $prob1 = (rand(1, 2) == 1) ? "If $name1 is $fac times as old as $name2 " : "If $name1's age is $fac times that of $name2 ";
            $prob2 = "and the sum of their ages is " . ($x + $y) . ", ";
        } else {
            $prob1 = (rand(1, 2) == 1) ? "$name1 is $fac times as old as $name2. " : "$name1's age is $fac times that of $name2. ";
            $prob2 = "If the sum of their ages is " . ($x + $y) . ", ";
        }
        $rnum = rand(1, 2);
        if ($rnum == 1) { $prob3 = "how old is $name1?"; $ans = $y; }
        else            { $prob3 = "how old is $name2?"; $ans = $x; }

        $soln1  = "Let 'x' be $name2's age.<br>";
        $soln1 .= "Let '{$fac}x' be $name1's age.<br>";
        $soln1 .= "x + {$fac}x = " . ($x + $y) . "<br>";
        $soln1 .= ($fac + 1) . "x = " . ($x + $y) . "<br>";
        $soln1 .= "x = " . ($x + $y) / ($fac + 1);
        if ($rnum == 1) $soln1 .= "  so  {$fac}x = $ans";
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORM 4 — money addition (const + x = fac * x)
    elseif ($form == 4) {
        $x = rand(3, 50);
        $fac = rand(3, 7);
        $const = $x * ($fac - 1);
        $y = $x;
        if (rand(1, 2) == 1) {
            $prob1 = "If $name1's {$peso}{$const}.00 is added to $name2's money";
            $prob2 = " and the total is {$fac} times $name2's money, ";
        } else {
            $prob1 = "$name1 has {$peso}{$const}.00. If this amount is added to $name2's money";
            $prob2 = " and the total equals {$fac} times $name2's money, ";
        }
        $prob3 = "how many pesos does $name2 have?";
        $ans = $y;
        $soln1  = "Let 'x' be $name2's money.<br>";
        $soln1 .= "$const + x = {$fac}x<br>";
        $soln1 .= ($fac - 1) . "x = $const<br>";
        $soln1 .= "x = " . ($const / ($fac - 1));
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORMS 5, 6, 7, 8, 9 — work-rate problems
    elseif ($form >= 5 && $form <= 9) {
        if ($form == 5) {
            $time = "hour";
            $objs = ["cookies","biscuits","muffins","cupcakes","cakes","eclairs","tarts","cream puffs","sweet rolls","bread sticks"];
            $obj = $objs[array_rand($objs)];
            $verbs = ["bake","make","prepare","sell","pack"];
            $verb = $verbs[array_rand($verbs)];
        } elseif ($form == 6) {
            $time = "hour";
            $objs = ["vases","cups","glasses","bottles","jars","crystal figurines","plates","saucers","coffee mugs"];
            $obj = $objs[array_rand($objs)];
            $verbs = ["clean","wash","inspect","wipe","polish","repair","rinse","dry"];
            $verb = $verbs[array_rand($verbs)];
        } elseif ($form == 7) {
            $time = "day";
            $objs = ["pesos","shirts","caps","cars","puppies","dogs","clients","engines","machines","patients","wild birds"];
            $verbs = ["earn","dye","embroider","wax","groom","walk","call","check","test","examine","photograph"];
            $i = array_rand($objs);
            $obj = $objs[$i];
            $verb = $verbs[$i];
        } elseif ($form == 8) {
            $time = "week";
            $objs = ["mirror frames","pen holders","birdhouses","wooden trays","wall decors","garden accents","lighting fixtures","table lamps","mailboxes","bicycles","tie racks","chairs"];
            $obj = $objs[array_rand($objs)];
            $verbs = ["produce","make","paint","assemble","construct","finish","deliver"];
            $verb = $verbs[array_rand($verbs)];
        } else {
            $time = "month";
            $objs = ["short stories","book reports","movie reviews","scientific articles","news articles","TV scripts","technical papers","product reviews"];
            $obj = $objs[array_rand($objs)];
            $verbs = ["write","edit","publish","translate","proofread","evaluate","analyze","submit"];
            $verb = $verbs[array_rand($verbs)];
        }

        $x = rand(3, 25);
        $coeffn1 = rand(2, 12);
        $fac = rand(2, 5);
        $const = $x * ($coeffn1 + $fac * $coeffn1);
        $num = rand(1, 4);
        if ($num == 1) {
            $prob1 = "If $name1 and $name2 can $verb $const $obj";
            $prob2 = " in {$coeffn1} {$time}s and if $name1 can $verb $obj $fac times as fast as $name2, ";
        } elseif ($num == 2) {
            $prob1 = "Together, $name1 and $name2 can $verb $const $obj";
            $prob2 = " in {$coeffn1} {$time}s. If $name1 can $verb $obj $fac times as fast as $name2, ";
        } elseif ($num == 3) {
            $prob1 = "$name1 and $name2 can $verb $const $obj";
            $prob2 = " in {$coeffn1} {$time}s if they work together. If $name1 can $verb $obj $fac times as fast as $name2, ";
        } else {
            $prob1 = "Given {$coeffn1} {$time}s, $name1 and $name2 can $verb $const $obj";
            $prob2 = " if they work together. If $name1 can $verb $obj $fac times as fast as $name2, ";
        }

        $soln1  = "Let 'x' be the number of $obj that $name2 can $verb per $time, and '{$fac}x' be that of $name1.<br>";
        $soln1 .= "{$coeffn1}({$fac}x+x) = $const<br>";
        $soln1 .= "{$coeffn1}(" . ($fac + 1) . "x) = " . ($coeffn1 * ($fac + 1)) . "x = $const<br>";
        $soln1 .= "x = $const/" . ($coeffn1 * ($fac + 1)) . "<br>";
        $soln1 .= "x = " . ($const / ($coeffn1 * ($fac + 1)));

        $opt = rand(1, 2);
        if ($opt == 1) {
            $prob3 = "how many $obj can $name1 $verb per $time?";
            $ans = $fac * $x;
            $soln1 .= "  so  {$fac}x = $ans";
        } else {
            $prob3 = "how many $obj can $name2 $verb per $time?";
            $ans = $x;
        }
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORM 10 — coin problem (25c & 10c)
    elseif ($form == 10) {
        $qu = rand(29, 99);
        $difac = rand(2, 9);
        $di = $qu * $difac;
        $total = number_format((.25 * $qu) + (.1 * $di), 2);

        $zpool = ["piggy bank","coin pouch","wishing well","money bag","vending machine","donation box","glass bowl"];
        $z = $zpool[array_rand($zpool)];

        if (rand(1, 2) == 1) {
            $prob1 = "$name1's $z contains 25-centavo and 10-centavo coins that add up to {$peso}{$total}. If it has $difac times as many 10-centavo coins as 25-centavo coins, ";
        } else {
            $prob1 = "There are {$peso}{$total} in a $z, which only contains 10-centavo and 25-centavo coins. If it has $difac times as many 10-centavo coins as 25-centavo coins, ";
        }
        $rnum = rand(1, 2);
        if ($rnum == 1) { $prob3 = "how many 25-centavo coins does the $z have?"; $ans = $qu; }
        else            { $prob3 = "how many 10-centavo coins does the $z have?"; $ans = $di; }

        $soln1  = "Let 'x' be the number of 25-centavo coins and '{$difac}x' be the number of 10-centavo coins in the $z.<br>";
        $soln1 .= "(0.25)(x) + (0.10)(" . $difac . "x) = $total<br>";
        $soln1 .= "0.25 x + " . (0.10 * $difac) . " x = $total<br>";
        $soln1 .= (0.25 + 0.1 * $difac) . "x = $total<br>";
        $soln1 .= "x = " . ($total / (0.25 + 0.1 * $difac)) . "<br>";
        $soln1 .= "{$difac}x = " . ($difac * $qu) . "<br>";
        $soln1 .= "Thus, the $z has $qu 25-centavo coins and $di 10-centavo coins.";
        $q = $prob1 . $prob3;
    }
    // FORMS 11 & 36 — ticket pricing
    elseif ($form == 11 || $form == 36) {
        if ($form == 11) {
            $num1 = rand(5, 25) * 10; $num2 = rand(10, 30) * 10;
            while (abs($num1 - $num2) < 30) $num2 = rand(10, 30) * 10;
            $x = rand(11, 49); $y = rand(11, 49);
        } else {
            $num1 = rand(50, 150) * 5; $num2 = rand(75, 175) * 5;
            while (abs($num1 - $num2) < 100) $num2 = rand(75, 175) * 5;
            $x = rand(51, 149); $y = rand(51, 149);
        }
        $qty = $x + $y;
        $total = $num1 * $x + $num2 * $y;

        if (rand(1, 2) == 1) {
            $names = ["A production company","A group of students","A distributor","A ticket booth","A ticketing office"];
            $name1 = $names[array_rand($names)];
        }
        $events = ["concert","basketball","theater","tour","festival"];
        $event = $events[array_rand($events)];

        $prob1 = "$name1 sold $qty $event tickets for {$peso}$total. If some of these tickets cost {$peso}$num1 each while the rest cost {$peso}$num2, ";

        $soln1  = "Let 'x' be the number of {$num1}-peso tickets.<br>";
        $soln1 .= "Let '{$qty}-x' be the number of {$num2}-peso tickets.<br>";
        $soln1 .= "{$num1}x + {$num2}({$qty}-x) = $total<br>";
        $soln1 .= ($num1 - $num2) . "x + " . ($num2 * $qty) . " = $total<br>";
        $soln1 .= ($num1 - $num2) . "x = " . ($total - $num2 * $qty) . "<br>";
        $soln1 .= "x = " . (($total - $num2 * $qty) / ($num1 - $num2));

        if (rand(1, 2) == 1) {
            $prob3 = "how many of the tickets that cost {$peso}$num1 each were sold?";
            $ans = $x;
        } else {
            $prob3 = "how many of the tickets that cost {$peso}$num2 each were sold?";
            $ans = $y;
            $soln1 .= "<br>{$qty}-x = {$qty}-{$x} = $y";
        }
        $q = $prob1 . $prob3;
    }
    // FORM 12 — more than × times
    elseif ($form == 12) {
        $y = rand(15, 99);
        $fac = rand(2, 6);
        $diff = rand(10, 99);
        $x = ($y * $fac) + $diff;

        $prob1 = "If I have $diff more $object than $fac times ";
        $prob2 = "$name2's $object and together we have " . ($x + $y) . " $object, ";

        $rnum = rand(1, 2);
        if ($rnum == 1) { $prob3 = "how many $object do I have?"; $ans = $x; }
        else            { $prob3 = "how many $object does $name2 have?"; $ans = $y; }

        $soln1  = "Let 'x' be $name2's $object and '{$fac}x+{$diff}' be mine.<br>";
        $soln1 .= "x + {$fac}x + {$diff} = " . ($x + $y) . "<br>";
        $soln1 .= ($fac + 1) . "x = " . ($x + $y) . "-$diff = " . ($x + $y - $diff) . "<br>";
        $soln1 .= "x = " . ($x + $y - $diff) / ($fac + 1);
        if ($rnum == 1) $soln1 .= "  so  {$fac}x+{$diff} = $ans";
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORM 13 — heights
    elseif ($form == 13) {
        $x = rand(20, 40); $add = rand(2, 30); $num = rand(2, 5);
        $sum = $num * (2 * $x + $add);
        $objs = ["tree","tower","building","concrete post","lighthouse","billboard","steel post","ferris wheel","giant robot","dinosaur replica","giant slide"];
        $obj1 = $objs[array_rand($objs)];
        do { $obj2 = $objs[array_rand($objs)]; } while ($obj2 == $obj1);

        $qopt = rand(1, 4);
        if ($qopt == 1) $q = "A $obj1 is taller than a $obj2 by $add feet. If $num times the sum of their heights is $sum, ";
        elseif ($qopt == 2) $q = "A $obj2 is shorter than a $obj1 by $add feet. If $num times the sum of their heights is $sum, ";
        elseif ($qopt == 3) $q = "If $num times the sum of the heights of a $obj1 and a $obj2 is $sum, and the $obj1 is taller than the $obj2 by $add feet, ";
        else $q = "If $num times the sum of the heights of a $obj1 and a $obj2 is $sum, and the $obj2 is shorter than the $obj1 by $add feet, ";

        $qopt1 = rand(1, 2);
        if ($qopt1 == 1) { $q .= "how many feet tall is the $obj1?"; $ans = $x + $add; }
        else             { $q .= "how many feet tall is the $obj2?"; $ans = $x; }

        $exp  = "Let 'x' be the height of the $obj2.<br>";
        $exp .= "Let 'x+$add' be the height of the $obj1.<br>";
        $exp .= "{$num}(x+(x+$add)) = $sum<br>";
        $exp .= "{$num}(2x+$add) = $sum<br>";
        $exp .= ($num * 2) . "x+" . ($num * $add) . " = $sum<br>";
        $exp .= ($num * 2) . "x = $sum-" . ($num * $add) . " = " . ($sum - $num * $add) . "<br>";
        $exp .= "x = " . ($sum - $num * $add) . "/" . ($num * 2) . "<br>";
        $exp .= "x = $x";
        if ($qopt1 == 1) $exp .= "<br>x+$add = $ans";
    }
    // FORM 14 — weights
    elseif ($form == 14) {
        $x = rand(20, 40); $add = rand(2, 30); $num1 = rand(2, 6); $num2 = rand(2, 6);
        $sum = $num2 * $x + $num1 * ($x + $add);
        $objs = ["pig","calf","pony","goat","dog","colt","filly","donkey"];
        $obj1 = $objs[array_rand($objs)];
        do { $obj2 = $objs[array_rand($objs)]; } while ($obj2 == $obj1);

        $qopt = rand(1, 4);
        if ($qopt == 1) $q = "A $obj1 is heavier than a $obj2 by $add kilograms. If the sum of $num2 times the weight of the $obj2 and $num1 times the weight of the $obj1 is $sum, ";
        elseif ($qopt == 2) $q = "A $obj2 is lighter than a $obj1 by $add kilograms. If the sum of $num2 times the weight of the $obj2 and $num1 times the weight of the $obj1 is $sum, ";
        elseif ($qopt == 3) $q = "If the sum of $num2 times the weight of a $obj2 and $num1 times the weight of a $obj1 is $sum, and the $obj1 is heavier than the $obj2 by $add kilograms, ";
        else $q = "If the sum of $num2 times the weight of a $obj2 and $num1 times the weight of a $obj1 is $sum, and the $obj2 is lighter than the $obj1 by $add kilograms, ";

        $qopt1 = rand(1, 2);
        if ($qopt1 == 1) { $q .= "how many kilograms is the $obj1?"; $ans = $x + $add; }
        else             { $q .= "how many kilograms is the $obj2?"; $ans = $x; }

        $exp  = "Let 'x' be the weight of the $obj2.<br>";
        $exp .= "Let 'x+$add' be the weight of the $obj1.<br>";
        $exp .= "{$num2}x + {$num1}(x + $add) = $sum<br>";
        $exp .= "{$num2}x + {$num1}x + " . ($num1 * $add) . " = $sum<br>";
        $exp .= ($num1 + $num2) . "x = $sum - " . ($add * $num1) . " = " . ($sum - $add * $num1) . "<br>";
        $exp .= "x = " . ($sum - $add * $num1) . "/" . ($num1 + $num2) . "<br>";
        $exp .= "x = $x";
        if ($qopt1 == 1) $exp .= "<br>x+$add = $ans";
    }
    // FORM 15 — future age
    elseif ($form == 15) {
        $x = rand(2, 12); $add2 = rand(2, 15); $num = rand(2, 4);
        $add1 = $num * ($x + $add2) - $x;

        $qopt = rand(1, 2);
        if ($qopt == 1) $q = "$name2's age $add1 years from now will be $num times $name1's age today. If $name1 is older than $name2 by $add2 years, ";
        else $q = "If $name1 is older than $name2 by $add2 years, and $name2's age $add1 years from now will be $num times $name1's age today, ";

        $qopt1 = rand(1, 2);
        if ($qopt1 == 1) { $q .= "how old is $name1?"; $ans = $x + $add2; }
        else             { $q .= "how old is $name2?"; $ans = $x; }

        $exp  = "Let 'x' be $name2's age.<br>";
        $exp .= "Let 'x+$add2' be $name1's age.<br>";
        $exp .= "x + $add1 = {$num}(x + $add2)<br>";
        $exp .= "{$num}x - x = $add1 - " . ($num * $add2) . "<br>";
        if ($num != 2) {
            $exp .= ($num - 1) . "x = " . ($add1 - $num * $add2) . "<br>";
            $exp .= "x = " . ($add1 - $num * $add2) . "/" . ($num - 1) . "<br>";
        }
        $exp .= "x = $x";
        if ($qopt1 == 1) $exp .= "<br>x+$add2 = $ans";
    }
    // FORM 16 — past age
    elseif ($form == 16) {
        $x = rand(17, 35); $add1 = rand(2, 15); $num = rand(2, 4);
        $add2 = $num * ($x - $add1) - $x;

        $q = "$name2's age $add1 years ago multiplied by $num equals $name1's age today. If $name1 is older than $name2 by $add2 years, ";
        $qopt1 = rand(1, 2);
        if ($qopt1 == 1) { $q .= "how old is $name1?"; $ans = $x + $add2; }
        else             { $q .= "how old is $name2?"; $ans = $x; }

        $exp  = "Let 'x' be $name2's age.<br>";
        $exp .= "Let 'x+$add2' be $name1's age.<br>";
        $exp .= "{$num}(x - $add1) = x + $add2<br>";
        $exp .= "{$num}x - " . ($num * $add1) . " = x + $add2<br>";
        $exp .= "{$num}x - x = " . ($num * $add1) . " + $add2<br>";
        if ($num != 2) {
            $exp .= ($num - 1) . "x = " . ($num * $add1 + $add2) . "<br>";
            $exp .= "x = " . ($num * $add1 + $add2) . "/" . ($num - 1) . "<br>";
        }
        $exp .= "x = $x";
        if ($qopt1 == 1) $exp .= "<br>x+$add2 = $ans";
    }
    // FORM 31 — complex ages (with multiplier)
    elseif ($form == 31) {
        $x = rand(14, 35);
        $b = rand(2, 3);
        $y = $b * $x;
        $c = rand(3, 12);
        $d1 = $x - $c;
        $d2 = $y - $c;

        $qopt = rand(1, 2);
        if ($qopt == 1) {
            $prob1 = "If $c years ago, $d1 times $name2's age was equal to $d2 times $name1's age, and ";
            $prob2 = "if $name2's age today is $b times that of $name1, ";
        } else {
            $prob1 = "$name2's age today is $b times that of $name1. ";
            $prob2 = "If $c years ago, $d1 times $name2's age was equal to $d2 times $name1's age, ";
        }
        $rnum = rand(1, 2);
        if ($rnum == 1) { $prob3 = "how old is $name1 today?"; $ans = $x; }
        else            { $prob3 = "how old is $name2 today?"; $ans = $y; }

        $soln1  = "Let 'x' be $name1's age and '{$b}x' be $name2's age.<br>";
        $soln1 .= "$d2(x - $c) = $d1({$b}x - $c)<br>";
        $soln1 .= "{$d2}x - " . ($c * $d2) . " = " . ($d1 * $b) . "x - " . ($c * $d1) . "<br>";
        $soln1 .= "{$d2}x - " . ($b * $d1) . "x = -" . ($d1 * $c) . " + " . ($c * $d2) . "<br>";
        $soln1 .= ($d2 - $b * $d1) . "x = " . (-1 * $d1 * $c + $c * $d2) . "<br>";
        $soln1 .= "x = $x<br>";
        $soln1 .= "{$b}x = $y<br>";
        $soln1 .= "Thus, $name1's age today is $x, and $name2's age is $y.";
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORM 32 — complex ages (with fraction)
    elseif ($form == 32) {
        $x = rand(42, 104);
        $y = rand(20, 36);
        $c = rand(4, 15);
        $b = rand(2, 3);
        $d = $x - $b * $y;
        while ($d <= 0) {
            $x = rand(42, 104); $y = rand(20, 36);
            $c = rand(4, 15); $b = rand(2, 3);
            $d = $x - $b * $y;
        }
        $a1 = $x - $c; $a2 = $y - $c;
        while ($a1 % 2 == 0 && $a2 % 2 == 0) { $a1 /= 2; $a2 /= 2; }
        while ($a1 % 3 == 0 && $a2 % 3 == 0) { $a1 /= 3; $a2 /= 3; }
        $a = $a1 . "/" . $a2;
        $yr = ($d == 1) ? " year" : " years";

        $qopt = rand(1, 2);
        if ($qopt == 1) {
            $prob1 = "If $name1 was $a times as old as $name2 $c years ago";
            $prob2 = ", and if $name1's age today is $d{$yr} more than $b times $name2's age, ";
        } else {
            $prob1 = "$name1's age today is $d{$yr} more than $b times $name2's age. ";
            $prob2 = "If $name1 was $a times as old as $name2 $c years ago, ";
        }
        $rnum = rand(1, 2);
        if ($rnum == 1) { $prob3 = "what is $name1's age today?"; $ans = $x; }
        else            { $prob3 = "what is $name2's age today?"; $ans = $y; }

        $soln1  = "Let 'x' and '{$b}x + $d' be the ages of $name2 and $name1 today, respectively.<br>";
        $soln1 .= "{$b}x + $d - $c = ($a)(x - $c)<br>";
        $soln1 .= "{$a2}({$b}x + " . ($d - $c) . ") = {$a1}(x - $c)<br>";
        $soln1 .= ($a2 * $b) . "x + " . ($a2 * $d - $a2 * $c) . " = {$a1}x - " . ($a1 * $c) . "<br>";
        $soln1 .= ($a2 * $b) . "x - {$a1}x = -" . ($a1 * $c) . " - " . ($a2 * $d - $a2 * $c) . "<br>";
        $soln1 .= "-" . ($a1 - $a2 * $b) . "x = -" . ($a1 * $c + $a2 * $d - $a2 * $c) . "<br>";
        $soln1 .= ($a1 - $a2 * $b) . "x = " . ($a1 * $c + $a2 * $d - $a2 * $c) . "<br>";
        $soln1 .= "x = " . ($a1 * $c + ($d - $c) * $a2) . "/" . (-1 * ($b * $a2 - $a1)) . " = $y<br>";
        $soln1 .= "{$b}x + $d = $x<br>";
        $soln1 .= "Thus, $name1's age today is $x, and $name2's age is $y.";
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORM 33 — three-coin problem
    elseif ($form == 33) {
        $qu = rand(29, 99);
        $difac = rand(2, 9);
        $nifac = rand(2, 9);
        $di = $qu * $difac;
        $ni = $di * $nifac;
        $total = number_format(.25 * $qu + .1 * $di + .05 * $ni, 2);

        $zpool = ["piggy bank","coin pouch","wishing well","money bag","vending machine","donation box","glass bowl"];
        $z = $zpool[array_rand($zpool)];

        $qopt = rand(1, 3);
        if ($qopt == 1) {
            $prob1 = "If $name1's $z contains {$peso}{$total}, and it has $difac times as many 10-centavo coins as 25-centavo coins, ";
            $prob2 = "and $nifac times as many 5-centavo coins as 10-centavo coins, ";
        } elseif ($qopt == 2) {
            $prob1 = "$name1 has a $z that contains three kinds of coins that amount to {$peso}{$total}. If there are $difac times as many 10-centavo coins as 25-centavo coins, ";
            $prob2 = "and $nifac times as many 5-centavo coins as 10-centavo coins, ";
        } else {
            $prob1 = "A $z contains a total of {$peso}{$total} in three different kinds of coins. If there are $difac times as many 10-centavo coins as 25-centavo coins, ";
            $prob2 = "and $nifac times as many 5-centavo coins as 10-centavo coins, ";
        }

        $rnum = rand(1, 3);
        if ($rnum == 1)      { $prob3 = "how many 25-centavo coins does the $z have?"; $ans = $qu; }
        elseif ($rnum == 2)  { $prob3 = "how many 10-centavo coins does the $z have?"; $ans = $di; }
        else                 { $prob3 = "how many 5-centavo coins does the $z have?"; $ans = $ni; }

        $soln1  = "Let 'x' be the number of 25-centavo coins, '{$difac}x' be the number of 10-centavo coins, and '" . ($nifac * $difac) . "x' be the number of 5-centavo coins in the $z.<br>";
        $soln1 .= "(0.25)(x) + (0.10)(" . $difac . "x) + (0.05)(" . ($nifac * $difac) . "x) = $total<br>";
        $soln1 .= "0.25 x + " . (0.10 * $difac) . " x + " . (0.05 * $nifac * $difac) . "x = $total<br>";
        $soln1 .= (0.25 + 0.1 * $difac + 0.05 * $nifac * $difac) . "x = $total<br>";
        $soln1 .= "x = " . ($total / (0.25 + 0.1 * $difac + 0.05 * $nifac * $difac)) . "<br>";
        $soln1 .= "{$difac}x = " . ($difac * $qu) . "<br>";
        $soln1 .= ($nifac * $difac) . "x = " . ($nifac * $difac * $qu) . "<br>";
        $soln1 .= "Thus, the $z has $qu 25-centavo coins, $di 10-centavo coins, and $ni 5-centavo coins.";
        $q = $prob1 . $prob2 . $prob3;
    }
    // FORM 34 — chemical solution percentage
    elseif ($form == 34) {
        $perc1 = rand(65, 95); $perc2 = rand(5, 45); $perc3 = rand(47, 63);
        $liters1 = rand(11, 299);
        $sols = ["saline","sugar","alcohol"];
        $sol = $sols[array_rand($sols)];
        $persons = ["chemist","student","scientist","science teacher","laboratory assistant"];
        $person = $persons[array_rand($persons)];

        $qopt = rand(1, 3);
        if ($qopt == 1) {
            $q = "How many liters of {$perc1}% $sol solution must be added to $liters1 liters of {$perc2}% $sol solution to produce a {$perc3}% $sol solution?";
        } elseif ($qopt == 2) {
            $q = "$name1 needs a {$perc3}% $sol solution but only has {$perc2}% and {$perc1}% $sol solutions. If $name1 has $liters1 liters of {$perc2}% $sol solution, how many liters of {$perc1}% $sol solution must be added to it to get the required solution?";
        } else {
            $q = "A $person was asked to come up with as much {$perc3}% $sol solution as possible from $liters1 liters of {$perc2}% $sol solution and any amount of {$perc1}% $sol solution. How many liters of {$perc1}% $sol solution must the $person consume to achieve this?";
        }

        $exp  = "Let 'x' be the number of liters of $perc1% $sol solution to be added.<br>";
        $exp .= "(" . ($perc2 / 100) . ")($liters1) + (" . ($perc1 / 100) . ")x = (" . ($perc3 / 100) . ")($liters1 + x)<br>";
        $exp .= "(" . ($perc1 / 100 - $perc3 / 100) . ")x = " . ($perc3 * $liters1 / 100) . " - " . ($perc2 * $liters1 / 100) . "<br>";
        $exp .= "(" . ($perc1 / 100 - $perc3 / 100) . ")x = " . ($perc3 * $liters1 / 100 - $perc2 * $liters1 / 100) . "<br>";
        $ans = round(($perc3 * $liters1 / 100 - $perc2 * $liters1 / 100) / ($perc1 / 100 - $perc3 / 100), 3);
        $exp .= "x = $ans";
    }
    // FORM 35 — mixture price
    elseif ($form == 35) {
        $price1 = rand(19, 30) * 5;
        $price2 = rand(8, 14) * 5;
        $price3 = rand($price2 + 1, $price1 - 1) * 5;
        $kilos1 = rand(1, 40) * 5;
        $products = ["coffee","cashew nuts","baby powder","peanuts","powdered milk","laundry detergent","goldfish pellets","fish food","growing mash"];
        $product = $products[array_rand($products)];
        $persons = ["grocer","businessman","vendor","peddler","stall owner","sari-sari store owner","distributor","farmer"];
        $person = $persons[array_rand($persons)];

        $qopt = rand(1, 3);
        if ($qopt == 1) {
            $q = "$name1 is selling two kinds of $product. One sells for $price1 pesos per kilogram while the other sells for $price2 pesos per kilogram. How many kilograms of the more expensive $product must be mixed with $kilos1 kilograms of the less expensive $product to get a mixture that costs $price3 pesos per kilogram?";
        } elseif ($qopt == 2) {
            $q = "A $person sells two kinds of $product. One is priced at $price1 pesos per kilogram while the other is priced at $price2 pesos per kilogram. How many kilograms of the more expensive $product must the $person mix with $kilos1 kilograms of the less expensive $product to get a mixture that costs $price3 pesos per kilogram?";
        } else {
            $q = "If one kind of $product sells for $price1 pesos per kilogram while another kind sells for $price2 pesos per kilogram, how many kilograms of the more expensive $product must be mixed with $kilos1 kilograms of the less expensive $product to produce a mixture that costs $price3 pesos per kilogram?";
        }

        $exp  = "Let 'x' be the number of kilograms of the expensive $product that needs to be added.<br>";
        $exp .= "($price2)($kilos1) + {$price1}x = ($price3)($kilos1 + x)<br>";
        $exp .= "(" . ($price1 - $price3) . ")x = " . ($price3 * $kilos1) . " - " . ($price2 * $kilos1) . "<br>";
        $exp .= ($price1 - $price3) . "x = " . ($price3 * $kilos1 - $price2 * $kilos1) . "<br>";
        $ans = round(($price3 * $kilos1 - $price2 * $kilos1) / ($price1 - $price3), 3);
        $exp .= "x = $ans";
    }

    // Final cleanup
    $q = str_replace('&#8369;', 'P', strip_tags($q));
    $solution = isset($exp) && $exp !== '' ? $exp : $soln1;
    $solution = str_replace('&#8369;', 'P', strip_tags($solution, '<br><br/>'));

    $answerStr = fmt_lv($ans);
    $distractors = make_lv_distractors($ans, 3);
    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4 && $d <= 100) {
        foreach ([fmt_lv($ans + $d), fmt_lv($ans - $d)] as $c) {
            if (!in_array($c, $allChoices, true)) {
                $allChoices[] = $c;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $q,
        'answer'   => $answerStr,
        'choices'  => $allChoices,
        'solution' => $solution,
        'lvl'      => $lvl,
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
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.55;">
        <?php echo htmlspecialchars($cur['prompt']); ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:560px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
        <strong style="color:#007700;">Solution:</strong><br>
        <?php echo $cur['solution']; ?>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.55;">
        <?php echo htmlspecialchars($q['prompt']); ?>
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