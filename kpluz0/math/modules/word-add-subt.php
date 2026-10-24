<?php
// math/modules/word-add-subt.php
// Computed free-text, single input. Word problems — student enters the answer.
// Question type: addition or subtraction, decided by the generated pool.
// Feedback shows the arithmetic solution AND a proportional bar model.
//
// Level calibration: Easy = legacy Easy; Hard = legacy Hard. Medium dropped.
// Question pools preserve the legacy grade &#8804;1 vs grade >1 split.

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

$moduleTitle = 'Addition & Subtraction Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));
$isEarly = ($grdKey <= 1);

// ---- Text color markers (kept for inline HTML in question text) ----
$red     = '<span style="color:#CC0066;font-weight:700;">';
$vio     = '<span style="color:#800080;font-weight:700;">';
$end     = '</span>';

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
        'Ladd1'   => $cur['Ladd1'],
        'Ladd2'   => $cur['Ladd2'],
        'Lmin1'   => $cur['Lmin1'],
        'Lmin2'   => $cur['Lmin2'],
        'Lans'    => $cur['Lans'],
        'Lans2'   => $cur['Lans2'],
        'resp'    => $cur['resp'],
        'question'=> $cur['question'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Range config per grade × level (Medium dropped; Hard = legacy Hard)
    if ($grdKey <= 1) {
        if ($lvl === 'Easy') { [$numlimit1,$numlimit2,$highest,$gap] = [4,12,12,2]; }
        else                 { [$numlimit1,$numlimit2,$highest,$gap] = [15,35,60,11]; }
    } elseif ($grdKey === 2) {
        if ($lvl === 'Easy') { [$numlimit1,$numlimit2,$gap] = [6,19,2]; }
        else                 { [$numlimit1,$numlimit2,$gap] = [65,149,15]; }
    } else {
        if ($lvl === 'Easy') { [$numlimit1,$numlimit2,$gap] = [17,45,5]; }
        else                 { [$numlimit1,$numlimit2,$gap] = [85,249,18]; }
    }

    // Generate operands + pick addition or subtraction
    $offset = 0;
    if ($isEarly) {
        // Old-pool behavior: 50/50 chance of addition (offset 0) or subtraction (offset 20)
        if (rand(1, 2) === 2) {
            $offset = 0;
            do {
                $num1 = rand($numlimit1, $numlimit2);
                $num2 = rand($numlimit1, $numlimit2);
            } while (($num1 + $num2) > $highest);
        } else {
            $offset = 20;
            do {
                $ans  = rand($numlimit1, $numlimit2);
                $num2 = rand($numlimit1, $numlimit2);
                $num1 = $num2 + $ans + $gap;
            } while ($num1 > $highest);
        }
    } else {
        // Modern-pool: independent operands; 50/50 subtraction, else addition
        $num1 = rand($numlimit1, $numlimit2);
        $num2 = rand($numlimit1, $numlimit2);
        if (rand(1, 2) === 2) {
            $offset = 20;
            $tries = 0;
            while (($num1 - $num2) < $gap && $tries < 100) {
                $num1 = rand($numlimit1, $numlimit2);
                $num2 = rand($numlimit1, $numlimit2);
                $tries++;
            }
        }
    }

    // Word banks
    $objects1  = ['coins','toys','crayons','marbles','candies','pencils','books','flowers','pens','cookies'];
    $objects2  = ['dolls','toy cars','comic books','bubble gums','balls','balloons'];
    $tops      = ['desk','table','shelf','couch','bench','bed'];
    $places    = ['garden','yard','farm','field','barn','playground','market'];
    $places2   = ['a toy store','a grocery store','the mall','a street vendor','a hobby shop'];
    $farmA     = ['dogs','cats','horses','hens','ducks','goats','cows','donkeys','pigs','lambs','carabaos'];
    $names     = ['Joanna','Michael','Carlo','Pablo','Dorothy','Terry','Peter','Jill','Barney','Emily','Glenda','Kirby','Britney','Dwayne','Benedict','Penelope','William','Steven','George','Angelina','Kathy','Calvin','Nicole','Roberta'];
    $animals   = $isEarly
        ? ['cats','dogs','birds','frogs','kittens','puppies','chicks','hens','ducks','fishes']
        : ['cats','lovebirds','sparrows','finches','pigeons','snakes','frogs','chameleons','butterflies','beetles','kittens'];
    $days      = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    $grps      = ['patrol','flock','band','team','pack','herd','pride','band','clan','troop','pod','school','pod','cluster','covey'];
    $grpObjs   = $isEarly
        ? ['scouts','birds','gorillas','players','dogs','antelopes','lions','coyotes','hyenas','monkeys','pelicans','porpoises','whales','spiders','quails']
        : ['boy scouts','birds','students','players','dogs','antelopes','lions','coyotes','hyenas','monkeys','pelicans','porpoises','whales','spiders','quails'];
    $containers= ['plastic bag','sack','paper bag','basket','box'];

    $obj1 = $objects1[array_rand($objects1)];
    do { $obj2 = $objects1[array_rand($objects1)]; } while ($obj2 === $obj1);
    $obj3 = $objects2[array_rand($objects2)];
    do { $obj4 = $objects2[array_rand($objects2)]; } while ($obj4 === $obj3);
    $top1 = $tops[array_rand($tops)];
    $pl1  = $places[array_rand($places)];
    do { $pl2 = $places[array_rand($places)]; } while ($pl2 === $pl1);
    $pl3  = $places2[array_rand($places2)];
    do { $pl4 = $places2[array_rand($places2)]; } while ($pl4 === $pl3);
    $fa1  = $farmA[array_rand($farmA)];
    do { $fa2 = $farmA[array_rand($farmA)]; } while ($fa2 === $fa1);
    $nm1  = $names[array_rand($names)];
    do { $nm2 = $names[array_rand($names)]; } while ($nm2 === $nm1);
    $an1  = $animals[array_rand($animals)];
    do { $an2 = $animals[array_rand($animals)]; } while ($an2 === $an1);
    $d1   = $days[array_rand($days)];
    do { $d2 = $days[array_rand($days)]; } while ($d2 === $d1);
    $grp  = $grps[array_rand($grps)];
    $gObj = $grpObjs[array_rand($grpObjs)];
    $cont = $containers[array_rand($containers)];

    // Question pool — grade &#8804;1 uses qrand 1-6 (add), 21-26 (sub);
    // grade >1 uses qrand 1-7 (add), 21-27 (sub)
    $rqlim     = $isEarly ? 6 : 7;
    $randques  = rand(1, $rqlim) + $offset;
    $safety    = 0;
    if (!isset($_SESSION[$sessionKey]['last'])) $_SESSION[$sessionKey]['last'] = [];
    $last = $_SESSION[$sessionKey]['last'];
    while (in_array($randques, $last, true) && $safety < 30) {
        $randques = rand(1, $rqlim) + $offset;
        $safety++;
    }
    $last[] = $randques;
    if (count($last) > 4) $last = array_slice($last, -4);
    $_SESSION[$sessionKey]['last'] = $last;

    $ans = ($randques <= 20) ? ($num1 + $num2) : ($num1 - $num2);

    $Ladd1 = $Ladd2 = $Lmin1 = $Lmin2 = '';
    $Lans = $Lans2 = '';
    $qmode = 1;
    $newquestion = '';

    if ($isEarly) {
        // ---- Grade &#8804;1 pool ----
        if ($randques === 1) {
            $newquestion = "There are {$red}{$num1}{$end} $obj1 on my $top1. If I put {$red}{$num2}{$end} more $obj1 on it, how many $obj1 will be on my $top1?";
            $resp1 = "If there are $num1 $obj1 on my $top1 and I put $num2 more on it, there will be ";
            $resp2 = "$ans $obj1 on my $top1.";
            $Ladd1 = "$obj1 on $top1 at first"; $Ladd2 = "$obj1 added on $top1";
            $Lans = "total $obj1"; $Lans2 = "total $obj1 on my $top1";
        } elseif ($randques === 2) {
            $newquestion = "$nm1 gave me {$red}{$num1}{$end} $obj1 and {$red}{$num2}{$end} $obj2. How many items did $nm1 give me?";
            $resp1 = "If $nm1 gave me $num1 $obj1 and $num2 $obj2, $nm1 gave me ";
            $resp2 = "$ans items.";
            $Ladd1 = "$obj1 $nm1 gave me"; $Ladd2 = "$obj2 $nm1 gave me";
            $Lans = "total items $nm1 gave me"; $Lans2 = $Lans;
        } elseif ($randques === 3) {
            $newquestion = "$nm1 counted {$red}{$num1}{$end} $fa1 and {$red}{$num2}{$end} $fa2 in the $pl1. How many animals did $nm1 count in all?";
            $resp1 = "If $nm1 counted $num1 $fa1 and $num2 $fa2 in the $pl1, $nm1 counted ";
            $resp2 = "$ans animals in all.";
            $Ladd1 = "$fa1 counted"; $Ladd2 = "$fa2 counted";
            $Lans = "total animals counted"; $Lans2 = $Lans;
        } elseif ($randques === 4) {
            $newquestion = "I bought {$red}{$num1}{$end} $obj3 from $pl3 and {$red}{$num2}{$end} $obj4 from $pl4. How many items did I buy in all?";
            $resp1 = "If I bought $num1 $obj3 from $pl3 and $num2 $obj4 from $pl4, I bought ";
            $resp2 = "$ans items in all.";
            $Ladd1 = "$obj3 I bought from $pl3"; $Ladd2 = "$obj4 I bought from $pl4";
            $Lans = "total objects I bought"; $Lans2 = $Lans;
        } elseif ($randques === 5) {
            $tries = 0;
            while (($num1 + $num2) > 110 && $tries < 100) {
                $num1 = rand($numlimit1, $numlimit2);
                $num2 = rand($numlimit1, $numlimit2);
                $tries++;
            }
            $ans = $num1 + $num2;
            $newquestion = "$nm1 is {$red}{$num1}{$end} years old. If $nm2 is older than $nm1 by {$red}{$num2}{$end} years, how old is $nm2?";
            $resp1 = "If $nm1 is $num1 years old and $nm2 is older than $nm1 by $num2 years, $nm2 is ";
            $resp2 = "$ans years old.";
            $Ladd1 = "age of $nm1"; $Ladd2 = "years $nm2 is older than $nm1";
            $Lans = "age of $nm2"; $Lans2 = $Lans;
        } elseif ($randques === 6) {
            $newquestion = "$nm1 saw {$red}{$num1}{$end} $an1. If $nm1 saw {$red}{$num2}{$end} more $an1 next day, how many $an1 did $nm1 see in all?";
            $resp1 = "If $nm1 saw $num1 $an1 at first and $num2 more next day, $nm1 saw ";
            $resp2 = "$ans $an1 in all.";
            $Ladd1 = "$an1 $nm1 saw at first"; $Ladd2 = "$an1 $nm1 saw next day";
            $Lans = "total $an1 $nm1 saw"; $Lans2 = $Lans;
        } elseif ($randques === 21) {
            $newquestion = "$nm1 owns {$red}{$num1}{$end} $fa1. If $nm1 gives {$red}{$num2}{$end} of them to $nm2, how many $fa1 will $nm1 have left?";
            $resp1 = "If $nm1 owns $num1 $fa1 but gives $num2 of them to $nm2, $nm1 will have $ans $fa1 left.";
            $resp2 = "";
            $Lmin1 = "$fa1 owned by $nm1 at first"; $Lmin2 = "$fa1 given to $nm2";
            $Lans = "$fa1 left with $nm1"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 22) {
            $newquestion = "There are {$red}{$num1}{$end} $fa1 in the $pl1. If {$red}{$num2}{$end} of them ran away, how many $fa1 will be left in the $pl1?";
            $resp1 = "If there are $num1 $fa1 in the $pl1 and $num2 ran away, $ans $fa1 will be left in the $pl1.";
            $resp2 = "";
            $Lmin1 = "$fa1 in the $pl1 at first"; $Lmin2 = "$fa1 that ran away";
            $Lans = "$fa1 left in the $pl1"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 23) {
            $newquestion = "$nm1 has {$red}{$num1}{$end} $obj1. If $nm1 loses {$red}{$num2}{$end} of them in the $pl1, how many $obj1 will $nm1 still have?";
            $resp1 = "If $nm1 had $num1 $obj1 but lost $num2 in the $pl1, $nm1 will still have ";
            $resp2 = "$ans $obj1.";
            $Lmin1 = "$obj1 owned by $nm1 at first"; $Lmin2 = "$obj1 lost by $nm1";
            $Lans = "$obj1 left with $nm1"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 24) {
            $newquestion = "$nm1 bought {$red}{$num1}{$end} $obj3 from $pl3. If $nm1 gave {$red}{$num2}{$end} of them to $nm2, how many $obj3 would $nm1 have left?";
            $resp1 = "If $nm1 bought $num1 $obj3 from $pl3 and gave $num2 to $nm2, $nm1 would have ";
            $resp2 = "$ans $obj3 left.";
            $Lmin1 = "$obj3 bought by $nm1"; $Lmin2 = "$obj3 given to $nm2";
            $Lans = "$obj3 left with $nm1"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 25) {
            $newquestion = "$nm1 is {$red}{$num1}{$end} years old. If $nm1 is older than $nm2 by {$red}{$num2}{$end} years, how old is $nm2?";
            $resp1 = "If $nm1 is $num1 years old and older than $nm2 by $num2 years, $nm2 is ";
            $resp2 = "$ans years old.";
            $Lmin1 = "age of $nm1"; $Lmin2 = "years $nm1 is older than $nm2";
            $Lans = "age of $nm2"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 26) {
            $carryObj = ['glasses','cups','plates','saucers','mugs','bottles'][array_rand(['glasses','cups','plates','saucers','mugs','bottles'])];
            $newquestion = "$nm1 was carrying {$red}{$num1}{$end} $carryObj when {$red}{$num2}{$end} of the $carryObj broke. How many $carryObj were left?";
            $resp1 = "If $nm1 was carrying $num1 $carryObj and $num2 broke, ";
            $resp2 = "$ans $carryObj were left.";
            $Lmin1 = "$carryObj $nm1 was carrying"; $Lmin2 = "$carryObj that broke";
            $Lans = "total $carryObj left"; $Lans2 = $Lans;
            $qmode = 2;
        }
    } else {
        // ---- Grade >1 pool ----
        if ($randques === 1) {
            $newquestion = "There are {$red}{$num1}{$end} $obj1 on my $top1. If I put {$red}{$num2}{$end} more $obj1 on it, how many $obj1 will be on my $top1?";
            $resp1 = "If there are $num1 $obj1 on my $top1 and I put $num2 more on it, there will be ";
            $resp2 = "$ans $obj1 on my $top1.";
            $Ladd1 = "$obj1 on $top1 at first"; $Ladd2 = "$obj1 added on $top1";
            $Lans = "total $obj1"; $Lans2 = "total $obj1 on $top1 after adding them together";
        } elseif ($randques === 2) {
            $newquestion = "$nm1 gave me {$red}{$num1}{$end} $obj1 and {$red}{$num2}{$end} $obj2. How many items did I receive from $nm1?";
            $resp1 = "If $nm1 gave me $num1 $obj1 and $num2 $obj2, I received ";
            $resp2 = "$ans items from $nm1.";
            $Ladd1 = "$obj1 I got from $nm1"; $Ladd2 = "$obj2 I got from $nm1";
            $Lans = "total items I got from $nm1"; $Lans2 = $Lans;
        } elseif ($randques === 3) {
            $newquestion = "$nm1 counted {$red}{$num1}{$end} $fa1 in the $pl1 while $nm2 counted {$red}{$num2}{$end} $fa2 in the $pl2. How many animals did they count in all?";
            $resp1 = "If $nm1 counted $num1 $fa1 and $nm2 counted $num2 $fa2, they counted ";
            $resp2 = "$ans animals in all.";
            $Ladd1 = "$fa1 counted by $nm1"; $Ladd2 = "$fa2 counted by $nm2";
            $Lans = "total animals counted"; $Lans2 = "total animals counted by $nm1 and $nm2";
        } elseif ($randques === 4) {
            $newquestion = "I bought {$red}{$num1}{$end} $obj3 from $pl3 and {$red}{$num2}{$end} $obj4 from $pl4. How many items did I buy in all?";
            $resp1 = "If I bought $num1 $obj3 from $pl3 and $num2 $obj4 from $pl4, I bought ";
            $resp2 = "$ans items in all.";
            $Ladd1 = "$obj3 I bought from $pl3"; $Ladd2 = "$obj4 I bought from $pl4";
            $Lans = "total objects I bought"; $Lans2 = $Lans;
        } elseif ($randques === 5) {
            $tries = 0;
            do {
                $num1 = rand(17, 95);
                $num2 = rand(17, 95);
                $tries++;
            } while (($num1 + $num2) > 110 && $tries < 100);
            $ans = $num1 + $num2;
            $newquestion = "$nm1 is {$red}{$num1}{$end} years old. If $nm2 is older than $nm1 by {$red}{$num2}{$end} years, how old is $nm2?";
            $resp1 = "If $nm1 is $num1 years old and $nm2 is older by $num2 years, $nm2 is ";
            $resp2 = "$ans years old.";
            $Ladd1 = "age of $nm1"; $Ladd2 = "years $nm2 is older than $nm1";
            $Lans = "age of $nm2"; $Lans2 = $Lans;
        } elseif ($randques === 6) {
            $newquestion = "Last $d1, $nm1 saw {$red}{$num1}{$end} $an1 on a tree. If $nm1 saw {$red}{$num2}{$end} more $an1 on another tree the following day, how many $an1 did $nm1 see altogether?";
            $resp1 = "If last $d1 $nm1 saw $num1 $an1 and $num2 more the following day, $nm1 saw ";
            $resp2 = "$ans $an1 in all.";
            $Ladd1 = "$an1 $nm1 saw last $d1"; $Ladd2 = "$an1 $nm1 saw the following day";
            $Lans = "total $an1 $nm1 saw"; $Lans2 = $Lans;
        } elseif ($randques === 7) {
            $num3 = rand($num2 + 1, $num2 + 4);
            $newquestion = "One $grp of $gObj has {$red}{$num3}{$end} $gObj while a second $grp has {$red}{$num1}{$end} $gObj. If {$red}{$num2}{$end} of the $gObj in the first $grp transferred to the second $grp, how many $gObj will the second $grp now have?";
            $resp1 = "If one $grp has $num3 $gObj while a second $grp has $num1 $gObj, and if $num2 from the first $grp transferred to the second, there will be ";
            $resp2 = "$ans $gObj in the second $grp.";
            $Ladd1 = "initial number of $gObj in the second $grp";
            $Ladd2 = "$gObj that transferred from the first to the second $grp";
            $Lans = "final number of $gObj in the second $grp"; $Lans2 = $Lans;
            $ans = $num1 + $num2;
        } elseif ($randques === 21) {
            $newquestion = "$nm1 owns {$red}{$num1}{$end} $fa1. If $nm1 gives {$red}{$num2}{$end} of them to $nm2, how many $fa1 will $nm1 have left?";
            $resp1 = "If $nm1 owns $num1 $fa1 but gives $num2 of them to $nm2, $nm1 will have $ans $fa1 left.";
            $resp2 = "";
            $Lmin1 = "$fa1 owned by $nm1 at first"; $Lmin2 = "$fa1 given to $nm2";
            $Lans = "$fa1 left with $nm1"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 22) {
            $newquestion = "There are {$red}{$num1}{$end} $fa1 in the $pl1. If {$red}{$num2}{$end} of them ran away, how many $fa1 will be left in the $pl1?";
            $resp1 = "If there are $num1 $fa1 in the $pl1 and $num2 of them ran away, $ans $fa1 will be left in the $pl1.";
            $resp2 = "";
            $Lmin1 = "$fa1 in the $pl1 at first"; $Lmin2 = "$fa1 that ran away from the $pl1";
            $Lans = "$fa1 left in the $pl1"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 23) {
            $newquestion = "$nm1 has {$red}{$num1}{$end} $obj1. If $nm1 loses {$red}{$num2}{$end} of them in the $pl1, how many $obj1 will $nm1 still have?";
            $resp1 = "If $nm1 had $num1 $obj1 but lost $num2 in the $pl1, $nm1 will still have ";
            $resp2 = "$ans $obj1.";
            $Lmin1 = "$obj1 owned by $nm1 at first"; $Lmin2 = "$obj1 lost by $nm1 in the $pl1";
            $Lans = "$obj1 left with $nm1"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 24) {
            $newquestion = "$nm1 bought {$red}{$num1}{$end} $obj3 from $pl3. If $nm1 gives {$red}{$num2}{$end} of them to $nm2, how many $obj3 will $nm1 have left?";
            $resp1 = "If $nm1 bought $num1 $obj3 from $pl3 and gave $num2 to $nm2, $nm1 will have ";
            $resp2 = "$ans $obj3 left.";
            $Lmin1 = "$obj3 bought by $nm1 from $pl3"; $Lmin2 = "$obj3 given to $nm2";
            $Lans = "$obj3 left with $nm1"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 25) {
            $tries = 0;
            do {
                $num1 = rand(13, 95);
                $num2 = rand(13, 95);
                $tries++;
            } while (($num1 - $num2) < 13 && $tries < 100);
            $ans = $num1 - $num2;
            $newquestion = "$nm1 is {$red}{$num1}{$end} years old. If $nm1 is older than $nm2 by {$red}{$num2}{$end} years, how old is $nm2?";
            $resp1 = "If $nm1 is $num1 years old and older than $nm2 by $num2 years, $nm2 is ";
            $resp2 = "$ans years old.";
            $Lmin1 = "age of $nm1"; $Lmin2 = "years $nm1 is older than $nm2";
            $Lans = "age of $nm2"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 26) {
            $carryObj = ['glasses','cups','plates','saucers','mugs','figurines','bottles'][array_rand(['glasses','cups','plates','saucers','mugs','figurines','bottles'])];
            $newquestion = "$nm1 was carrying a $cont containing {$red}{$num1}{$end} $carryObj when the $cont slipped off $nm1's hand. If {$red}{$num2}{$end} of the $carryObj broke, how many $carryObj were left?";
            $resp1 = "If $nm1 was carrying a $cont containing $num1 $carryObj and if $num2 broke when the $cont slipped, ";
            $resp2 = "$ans $carryObj were left.";
            $Lmin1 = "$carryObj $nm1 was carrying"; $Lmin2 = "$carryObj that broke";
            $Lans = "total $carryObj left"; $Lans2 = $Lans;
            $qmode = 2;
        } elseif ($randques === 27) {
            $num3 = rand($numlimit1, $numlimit2);
            $tries = 0;
            while ($num3 === $num1 && $tries < 50) {
                $num3 = rand($numlimit1, $numlimit2);
                $tries++;
            }
            $newquestion = "One $grp of $gObj has {$red}{$num1}{$end} $gObj while a second $grp has {$red}{$num3}{$end} $gObj. If {$red}{$num2}{$end} of the $gObj in the first $grp transferred to the second $grp, how many $gObj will be left in the first $grp?";
            $resp1 = "If one $grp has $num1 $gObj while a second $grp has $num3 $gObj, and if $num2 from the first transferred to the second, there will be ";
            $resp2 = "$ans $gObj left in the first $grp.";
            $Lmin1 = "initial number of $gObj in the first $grp";
            $Lmin2 = "$gObj that transferred to the second $grp";
            $Lans = "$gObj left in the first $grp"; $Lans2 = $Lans;
            $qmode = 2;
        }
    }

    $resp = ($resp1 ?? '') . ($resp2 ?? '');

    $_SESSION[$sessionKey]['current'] = [
        'num1' => $num1, 'num2' => $num2, 'ans' => $ans,
        'qmode' => $qmode,
        'Ladd1' => $Ladd1 ?? '', 'Ladd2' => $Ladd2 ?? '',
        'Lmin1' => $Lmin1 ?? '', 'Lmin2' => $Lmin2 ?? '',
        'Lans' => $Lans ?? '', 'Lans2' => $Lans2 ?? '',
        'resp' => $resp,
        'question' => $newquestion,
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

// Render proportional bars for feedback (CSS-based, not images)
$renderBarModel = function ($num1, $num2, $ans, $qmode, $Ladd1, $Ladd2, $Lmin1, $Lmin2, $Lans2) {
    $total  = ($qmode === 1) ? ($num1 + $num2) : $num1;
    $wBar   = 460;

    if ($qmode === 1) {
        $w1 = (int)round(($num1 / $total) * $wBar);
        $w2 = $wBar - $w1;
        ?>
        <div style="max-width:560px; margin:20px auto; text-align:center;">
            <div style="display:grid; grid-template-columns:<?php echo $w1; ?>fr <?php echo $w2; ?>fr; gap:4px; margin-bottom:6px; font-size:10pt; color:#666;">
                <div><?php echo htmlspecialchars($Ladd1); ?></div>
                <div><?php echo htmlspecialchars($Ladd2); ?></div>
            </div>
            <div style="display:grid; grid-template-columns:<?php echo $w1; ?>fr <?php echo $w2; ?>fr; gap:4px;">
                <div style="background:#f9b8c8; border:2px solid #d88ba0; border-radius:6px; height:52px; display:flex; align-items:center; justify-content:center; color:#800080; font-size:22pt; font-weight:700;"><?php echo $num1; ?></div>
                <div style="background:#b8d4f9; border:2px solid #7fa5d8; border-radius:6px; height:52px; display:flex; align-items:center; justify-content:center; color:#800080; font-size:22pt; font-weight:700;"><?php echo $num2; ?></div>
            </div>
            <div style="margin-top:8px; background:#c8e6c8; border:2px solid #88b888; border-radius:6px; height:52px; display:flex; align-items:center; justify-content:center; color:#800080; font-size:22pt; font-weight:700;">?</div>
            <div style="margin-top:6px; font-size:10pt; color:#666;"><?php echo htmlspecialchars($Lans2); ?></div>
        </div>
        <?php
    } else {
        $w2    = (int)round(($num2 / $num1) * $wBar);
        $wRes  = (int)round(($ans  / $num1) * $wBar);
        ?>
        <div style="max-width:560px; margin:20px auto; text-align:center;">
            <div style="font-size:10pt; color:#666; margin-bottom:6px;"><?php echo htmlspecialchars($Lmin1); ?></div>
            <div style="background:#f9b8c8; border:2px solid #d88ba0; border-radius:6px; height:52px; display:flex; align-items:center; justify-content:center; color:#800080; font-size:22pt; font-weight:700; margin-bottom:12px;"><?php echo $num1; ?></div>
            <div style="display:grid; grid-template-columns:<?php echo $w2; ?>fr <?php echo $wRes; ?>fr; gap:4px;">
                <div style="background:#b8d4f9; border:2px solid #7fa5d8; border-radius:6px; height:52px; display:flex; align-items:center; justify-content:center; color:#800080; font-size:22pt; font-weight:700;"><?php echo $num2; ?></div>
                <div style="background:#c8e6c8; border:2px solid #88b888; border-radius:6px; height:52px; display:flex; align-items:center; justify-content:center; color:#800080; font-size:22pt; font-weight:700;">?</div>
            </div>
            <div style="display:grid; grid-template-columns:<?php echo $w2; ?>fr <?php echo $wRes; ?>fr; gap:4px; margin-top:6px; font-size:10pt; color:#666;">
                <div><?php echo htmlspecialchars($Lmin2); ?></div>
                <div><?php echo htmlspecialchars($Lans2); ?></div>
            </div>
        </div>
        <?php
    }
};
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

    <p style="font-size:14pt; font-weight:700; color:#007700; text-align:center; margin-top:24px;">
        Solution:
    </p>
    <div style="max-width:480px; margin:10px auto; text-align:center; font-size:14pt; color:#333;">
        <?php if ($result['qmode'] === 1): ?>
            <div><?php echo htmlspecialchars($result['Ladd1']); ?> = <strong style="color:#CC0066;"><?php echo $result['num1']; ?></strong></div>
            <div><?php echo htmlspecialchars($result['Ladd2']); ?> = <strong style="color:#CC0066;"><?php echo $result['num2']; ?></strong></div>
            <div style="margin-top:12px; color:#0000CC; font-weight:700;">
                <?php echo htmlspecialchars($result['Lans']); ?> = <?php echo htmlspecialchars($result['Ladd1']); ?>
                <span style="color:#CC0066;">plus</span>
                <?php echo htmlspecialchars($result['Ladd2']); ?>
            </div>
            <div style="margin-top:8px; font-size:16pt; color:#0000CC; font-weight:700;">
                <?php echo htmlspecialchars($result['Lans']); ?> = <?php echo $result['num1']; ?> + <?php echo $result['num2']; ?> = <strong style="color:#0000CC;"><?php echo $result['ans']; ?></strong>
            </div>
        <?php else: ?>
            <div><?php echo htmlspecialchars($result['Lmin1']); ?> = <strong style="color:#CC0066;"><?php echo $result['num1']; ?></strong></div>
            <div><?php echo htmlspecialchars($result['Lmin2']); ?> = <strong style="color:#CC0066;"><?php echo $result['num2']; ?></strong></div>
            <div style="margin-top:12px; color:#0000CC; font-weight:700;">
                <?php echo htmlspecialchars($result['Lans']); ?> = <?php echo htmlspecialchars($result['Lmin1']); ?>
                <span style="color:#CC0066;">minus</span>
                <?php echo htmlspecialchars($result['Lmin2']); ?>
            </div>
            <div style="margin-top:8px; font-size:16pt; color:#0000CC; font-weight:700;">
                <?php echo htmlspecialchars($result['Lans']); ?> = <?php echo $result['num1']; ?> - <?php echo $result['num2']; ?> = <strong style="color:#0000CC;"><?php echo $result['ans']; ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <p style="font-size:14pt; font-weight:700; color:#007700; text-align:center; margin-top:24px;">
        Block Model:
    </p>
    <?php $renderBarModel(
        $result['num1'], $result['num2'], $result['ans'], $result['qmode'],
        $result['Ladd1'], $result['Ladd2'], $result['Lmin1'], $result['Lmin2'], $result['Lans2']
    ); ?>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;">
        <?php echo $q_curr['question']; ?>
    </p>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin:20px 0;">
        Answer:
        <input type="text" name="answer" size="2" maxlength="4"
               style="width:100px; height:48px; font-size:26px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700;"
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