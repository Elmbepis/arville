<?php
// math/modules/word-quantities.php
// MULTIPLE CHOICE (4 choices). Word problems on length, mass, volume — with
// unit conversions. Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: adaptive step (1/10/100/1000 by magnitude) preserves
// last digit for ints >= 100 so units-digit reasoning can't eliminate.
// Decimal answers use small decimal deltas scaled by magnitude.
//
// FIX #1: legacy had rand(4,4) — only qopt 4 ever reached for grd>=3.
// FIX #2: tolerance-based compare &#8594; canonical 2dp string compare.
// FIX #3: division signs use ASCII '/' instead of ÷ (U+00F7).
// FIX #4: every conversion solution now shows units on the conversion factor
//         (e.g. "756 inches / 12 inches/foot = 63 feet") so students can
//         follow the dimensional reasoning.
// Theme: wquiz-15-* — uses paper-69-* per §C default.
// DB row required: modules.url = 'word-quantities.php'

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

$moduleTitle = 'Word Problems Involving Length,<br/>Mass, and Volume';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$grd         = min(6, max(0, (int)($_SESSION['grade'] ?? 0)));
$lvl         = 'Easy';

function canon_qty($v) {
    $r = round((float)$v, 2);
    return ($r == (int)$r) ? (string)(int)$r : (string)$r;
}

// Singular form of a unit name for rate display (e.g. "feet" &#8594; "foot").
function singular_unit($u) {
    $special = [
        'feet'    => 'foot',
        'inches'  => 'inch',
    ];
    if (isset($special[$u])) return $special[$u];
    return rtrim($u, 's');
}

// Distractor builder for word-quantities.
function make_qty_distractors($correct, $n = 3) {
    $correctCanon = canon_qty($correct);
    $seen = [$correctCanon => true];
    $out  = [];

    $isInt = (abs($correct - round($correct)) < 0.0001);

    if ($isInt) {
        $ic = (int)round($correct);
        if ($ic < 10)        $step = 1;
        elseif ($ic < 100)   $step = 1;
        elseif ($ic < 1000)  $step = 10;
        elseif ($ic < 10000) $step = 100;
        else                 $step = 1000;

        $mults = [1, 2, 3, 4, 5, 6, 8, 10];
        shuffle($mults);

        foreach ($mults as $m) {
            if (count($out) >= $n) break;
            $delta = $m * $step;
            foreach ([+$delta, -$delta] as $signed) {
                $cv = $ic + $signed;
                if ($cv <= 0) continue;
                $cc = canon_qty($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }

        $d = 1;
        while (count($out) < $n && $d <= 100) {
            foreach ([$ic + $d, $ic - $d] as $cv) {
                if ($cv <= 0) continue;
                $cc = canon_qty($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
            $d++;
        }
    } else {
        if (abs($correct) < 0.5)    $ddeltas = [0.01, 0.02, 0.03, 0.05, 0.1];
        elseif (abs($correct) < 5)  $ddeltas = [0.1, 0.2, 0.3, 0.5, 1.0];
        elseif (abs($correct) < 50) $ddeltas = [0.1, 0.5, 1.0, 2.0, 5.0];
        else                        $ddeltas = [1.0, 2.0, 5.0, 10.0, 20.0];

        shuffle($ddeltas);

        foreach ($ddeltas as $delta) {
            if (count($out) >= $n) break;
            foreach ([+$delta, -$delta] as $signed) {
                $cv = $correct + $signed;
                if ($cv <= 0) continue;
                $cc = canon_qty($cv);
                if (isset($seen[$cc])) continue;
                $seen[$cc] = true;
                $out[] = $cc;
                if (count($out) >= $n) break 2;
            }
        }
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
    $isCorrect = $scorer->processAnswer($clicked, $cur['ans_canon'], $cur['lvl']);

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
    $boys  = ['Alfred','Ben','Carlo','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lito','Mario','Roberto','Samuel','Tommy'];
    $girls = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];

    $boy  = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];
    $s = 0; do { $boy2 = $boys[array_rand($boys)]; $s++; } while ($boy2 === $boy && $s < 20);
    $s = 0; do { $girl2 = $girls[array_rand($girls)]; $s++; } while ($girl2 === $girl && $s < 20);

    $useGirl = (rand(1,2) === 1);
    $name = $useGirl ? $girl : $boy;
    $p1   = $useGirl ? 'she' : 'he';
    $p2   = $useGirl ? 'her' : 'his';

    if ($grd < 3) {
        $qopt = rand(1, 2);
    } elseif ($grd == 3) {
        $qopt = rand(3, 5);
    } else {
        $qopt = rand(3, 4);
    }

    $question = ''; $soln = ''; $ans = 0; $unit = '';

    if ($qopt === 1) {
        $qnum = rand(1, 4);
        if ($qnum === 1) {
            $num1 = rand(150, 500); $num2 = rand(150, 500);
            $unit = (rand(1,2) === 1) ? 'inches' : 'centimeters';
            $question = "$boy purchased $num1 $unit of rope while $girl purchased $num2 $unit of rope. What is the total length of rope that they purchased?";
            $ans  = $num1 + $num2;
            $soln = "total length = $num1 $unit + $num2 $unit<br>= $ans $unit";
        } elseif ($qnum === 2) {
            $num1 = rand(350, 600); $num2 = rand(101, 325);
            $unit = (rand(1,2) === 1) ? 'inches' : 'centimeters';
            $question = "$boy and $girl found $num1 $unit of string. $boy cut and took $num2 $unit from the string and gave the rest to $girl. What is the length of the string that $girl got?";
            $ans  = $num1 - $num2;
            $soln = "length that $girl got = $num1 $unit - $num2 $unit<br>= $ans $unit";
        } elseif ($qnum === 3) {
            $num1 = rand(3, 9); $num2 = rand(12, 30);
            $unit = (rand(1,2) === 1) ? 'feet' : 'meters';
            $question = "$girl purchased $num1 ribbons, each of which measures $num2 $unit. What is the total length of ribbon that $girl purchased?";
            $ans  = $num1 * $num2;
            $soln = "total length = $num1 x $num2 $unit<br>= $ans $unit";
        } else {
            $num1 = rand(3, 9); $ans = rand(6, 12); $num2 = $num1 * $ans;
            $unit = (rand(1,2) === 1) ? 'feet' : 'meters';
            $question = "$boy purchased a wire that is $num2 $unit long. He then cut the wire into $num1 pieces of equal length. What is the length of each cut piece?";
            $soln = "length of each cut piece = $num2 $unit / $num1 pieces<br>= $ans $unit";
        }

    } elseif ($qopt === 2) {
        $qnum = rand(1, 4);
        if ($qnum === 1) {
            $num1 = rand(70, 120); $num2 = rand(51, 199);
            if (rand(1,2) === 1) { $unit='pounds'; $num1*=2; $num2*=2; } else { $unit='kilograms'; }
            $animals = ['camel','giraffe','whale','bear','dolphin'];
            $animal = $animals[array_rand($animals)];
            $question = "A young $animal at a zoo was $num1 $unit when it was last weighed. It has grown and gained $num2 $unit since then. How much does it weigh now?";
            $ans  = $num1 + $num2;
            $soln = "present weight = $num1 $unit + $num2 $unit<br>= $ans $unit";
        } elseif ($qnum === 2) {
            $num1 = rand(70, 120); $ans = rand(70, 120); $num2 = $num1 + $ans;
            if (rand(1,2) === 1) { $unit='pounds'; $num1*=2; $num2*=2; } else { $unit='kilograms'; }
            $question = "A truck delivered a total of $num2 $unit of vegetables to two grocery stores. If it delivered $num1 $unit to the first store, how many $unit did it deliver to the second store?";
            $ans  = $num2 - $num1;
            $soln = "delivery to second store = $num2 $unit - $num1 $unit<br>= $ans $unit";
        } elseif ($qnum === 3) {
            $num1 = rand(3, 9); $num2 = rand(10, 50);
            if (rand(1,2) === 1) { $unit='pounds'; $num1*=2; $num2*=2; } else { $unit='kilograms'; }
            $items = ['sugar','salt','milk','coffee','tea'];
            $item = $items[array_rand($items)];
            $question = "$name purchased $num1 bags of $item, each of which weighs $num2 $unit. What is the total weight of $item that $name purchased?";
            $ans  = $num1 * $num2;
            $soln = "total weight = $num1 x $num2 $unit<br>= $ans $unit";
        } else {
            $ans = rand(3, 9); $num2 = rand(10, 50); $num1 = $ans * $num2;
            if (rand(1,2) === 1) { $unit='pounds'; $num1*=2; $num2*=2; } else { $unit='kilograms'; }
            $items = ['sugar','salt','milk','coffee','tea'];
            $item = $items[array_rand($items)];
            $question = ucfirst($p1) . " purchased $num1 $unit of $item, then divided the $item equally into bags that each weighed $num2 $unit. How many bags did $p1 end up with?";
            $ans  = $num1 / $num2;
            $soln = "number of bags = $num1 $unit / $num2 $unit/bag<br>= $ans bags";
            $unit = 'bags';
        }

    } elseif ($qopt === 3) {
        $qnum = rand(1, 4);
        if ($qnum === 1) {
            if (rand(1,2) === 1) { $unit='inches'; $num1=rand(13,42)*12; $num2=rand(13,42)*12; $unit2='feet';    $fac=12; }
            else                { $unit='centimeters'; $num1=rand(30,90)*100; $num2=rand(30,90)*100; $unit2='meters'; $fac=100; }
            $question = "$boy purchased $num1 $unit of rope while $girl purchased $num2 $unit of rope. What is the total length of rope that they purchased in $unit2?";
            $ans  = ($num1 + $num2) / $fac;
            $soln = "total length = $num1 $unit + $num2 $unit<br>= " . ($num1+$num2) . " $unit / $fac $unit/" . singular_unit($unit2) . "<br>= $ans $unit2";
            $unit = $unit2;
        } elseif ($qnum === 2) {
            if (rand(1,2) === 1) { $unit='inches'; $num1=rand(29,50)*12; $num2=rand(11,25)*12; $unit2='feet';    $fac=12; }
            else                { $unit='centimeters'; $num1=rand(21,39)*100; $num2=rand(8,18)*100; $unit2='meters'; $fac=100; }
            $question = "$boy and $girl found $num1 $unit of string. $boy cut and took $num2 $unit and gave the rest to $girl. What is the length of the string that $girl got in $unit2?";
            $ans  = ($num1 - $num2) / $fac;
            $soln = "length that $girl got = $num1 $unit - $num2 $unit<br>= " . ($num1-$num2) . " $unit / $fac $unit/" . singular_unit($unit2) . "<br>= $ans $unit2";
            $unit = $unit2;
        } elseif ($qnum === 3) {
            if (rand(1,2) === 1) { $unit='feet';    $num1=rand(29,50); $num2=rand(11,25); $unit2='inches';      $fac=12; }
            else                { $unit='meters';  $num1=rand(21,39); $num2=rand(8,18);  $unit2='centimeters'; $fac=100; }
            $question = "$girl purchased $num1 ribbons, each of which measures $num2 $unit. What is the total length of ribbon that $girl purchased in $unit2?";
            $ans  = ($num1 * $num2) * $fac;
            $soln = "total length = $num1 x $num2 $unit<br>= " . ($num1*$num2) . " $unit x $fac $unit2/" . singular_unit($unit) . "<br>= $ans $unit2";
            $unit = $unit2;
        } else {
            if (rand(1,2) === 1) { $unit='feet';   $num1=rand(4,15); $num2=$num1*($ans=rand(14,39)); $unit2='inches';      $fac=12; }
            else                { $unit='meters'; $num1=rand(4,15); $num2=$num1*($ans=rand(14,39)); $unit2='centimeters'; $fac=100; }
            $question = "$boy purchased a wire that is $num2 $unit long. He then cut the wire into $num1 pieces of equal length. What is the length of each cut piece in $unit2?";
            $soln = "length of each cut piece = $num2 $unit / $num1 pieces<br>= " . ($num2/$num1) . " $unit x $fac $unit2/" . singular_unit($unit) . "<br>= " . ($ans*$fac) . " $unit2";
            $ans  = $ans * $fac;
            $unit = $unit2;
        }

    } elseif ($qopt === 4) {
        $qnum = rand(1, 4);
        if ($qnum === 1) {
            $unit='pounds'; $num1=rand(30,54)*2.2; $num2=rand(23,90)*2.2; $unit2='kilograms'; $fac=2.2;
            $animals = ['camel','giraffe','whale','bear','dolphin'];
            $animal = $animals[array_rand($animals)];
            $ans = ($num1 + $num2) / $fac;
            $question = "A young $animal at a zoo was " . round($num1,2) . " $unit when it was last weighed. It has grown and gained " . round($num2,2) . " $unit since then. How much does it weigh now in $unit2?";
            $soln = "present weight = " . round($num1,2) . " $unit + " . round($num2,2) . " $unit<br>= " . round($num1+$num2,2) . " $unit / $fac $unit/" . singular_unit($unit2) . "<br>= $ans $unit2";
            $unit = $unit2;
        } elseif ($qnum === 2) {
            $num1=rand(32,54)*2.2; $ans0=rand(32,54)*2.2; $num2=$num1+$ans0;
            $unit2='kilograms'; $fac=2.2;
            if (rand(1,2) === 1) { $unit='pounds'; } else { $unit='kilograms'; $fac=1; }
            $ans = ($num2 - $num1) / $fac;
            $question = "A truck delivered a total of " . round($num2,2) . " $unit of vegetables to two grocery stores. If it delivered " . round($num1,2) . " $unit to the first store, how many $unit2 did it deliver to the second store?";
            if ($fac == 1) {
                $soln = "delivery to second store = " . round($num2,2) . " $unit - " . round($num1,2) . " $unit<br>= $ans $unit2";
            } else {
                $soln = "delivery to second store = " . round($num2,2) . " $unit - " . round($num1,2) . " $unit<br>= " . round($num2-$num1, 2) . " $unit / $fac $unit/" . singular_unit($unit2) . "<br>= $ans $unit2";
            }
            $unit = $unit2;
        } elseif ($qnum === 3) {
            $unit='kilograms'; $unit2='pounds'; $fac=2.2;
            $num1=rand(3,9); $num2=rand(10,50);
            $items = ['sugar','salt','milk','coffee','tea'];
            $item = $items[array_rand($items)];
            $ans = $num1 * $num2 * $fac;
            $question = "$name purchased $num1 bags of $item, each weighing $num2 $unit. What is the total weight of $item in $unit2?";
            $soln = "total weight = $num1 x $num2 $unit<br>= " . ($num1*$num2) . " $unit x $fac $unit2/" . singular_unit($unit) . "<br>= $ans $unit2";
            $unit = $unit2;
        } else {
            if (rand(1,2) === 1) { $unit='kilograms'; $unit2='pounds'; $fac=2.2; $num2=rand(15,50); }
            else                { $unit='pounds';   $unit2='kilograms'; $fac=1/2.2; $num2=rand(11,40)*2.2; }
            $ans = rand(5, 19);
            $num1 = $ans * $num2;
            $items = ['sugar','salt','milk','coffee','tea'];
            $item = $items[array_rand($items)];
            $question = ucfirst($p1) . " purchased " . round($num1,2) . " $unit of $item, then divided the $item equally into bags that each weighed " . round($fac*$num2,2) . " $unit2. How many bags did $p1 end up with?";
            $soln = "number of bags = " . round($num1,2) . " $unit x " . round($fac,4) . " $unit2/" . singular_unit($unit) . "<br>= " . round($fac*$num1,2) . " $unit2 / " . round($fac*$num2,2) . " $unit2/bag<br>= $ans bags";
            $unit = 'bags';
        }

    } else {
        $qnum = rand(1, 4);
        if ($qnum === 1) {
            $num1=rand(15,99)*100; $num2=rand(15,99)*100;
            $items = ['milk','orange juice','mineral water','vinegar','cooking oil','soy sauce','fish sauce'];
            $item = $items[array_rand($items)];
            $question = "$boy purchased $num1 milliliters of $item while $girl purchased $num2 milliliters of $item. What is the total volume of $item that they purchased in liters?";
            $ans  = ($num1 + $num2) / 1000;
            $soln = "total volume = $num1 milliliters + $num2 milliliters<br>= " . ($num1+$num2) . " milliliters / 1000 milliliters/" . singular_unit('liters') . "<br>= $ans liters";
            $unit = 'liters';
        } elseif ($qnum === 2) {
            $num1=rand(15,99)*100; $num2=rand(15,99)*100;
            $items = ['milk','orange juice','mineral water','vinegar','cooking oil','soy sauce','fish sauce'];
            $item = $items[array_rand($items)];
            $question = "$boy and $girl bought " . ($num1+$num2) . " milliliters of $item. $boy took $num2 milliliters and gave the rest to $girl. What is the volume of $item that $girl got in liters?";
            $ans  = $num1 / 1000;
            $soln = "volume that $girl got = " . ($num1+$num2) . " milliliters - $num2 milliliters<br>= $num1 milliliters / 1000 milliliters/" . singular_unit('liters') . "<br>= $ans liters";
            $unit = 'liters';
        } elseif ($qnum === 3) {
            $num1 = rand(11, 25); $num2 = rand(11, 25) / 10;
            $items = ['milk','orange juice','mineral water','vinegar','cooking oil','soy sauce','fish sauce'];
            $item = $items[array_rand($items)];
            $question = "$name purchased $num1 bottles that each contain $num2 liters of $item. What is the total volume of $item in milliliters?";
            $ans  = $num1 * $num2 * 1000;
            $soln = "total volume = $num1 x $num2 liters<br>= " . ($num1*$num2) . " liters x 1000 milliliters/" . singular_unit('liters') . "<br>= $ans milliliters";
            $unit = 'milliliters';
        } else {
            $ans = rand(3, 9); $num2 = rand(11, 25) / 10; $num1 = $ans * $num2;
            $items = ['milk','orange juice','mineral water','vinegar','cooking oil','soy sauce','fish sauce'];
            $item = $items[array_rand($items)];
            $question = ucfirst($p1) . " purchased $num1 liters of $item, then divided the $item equally into bottles that each contained $num2 liters. How many bottles did $name end up with?";
            $soln = "number of bottles = $num1 liters / $num2 liters/bottle<br>= $ans bottles";
            $unit = 'bottles';
        }
    }

    $ansCanon    = canon_qty($ans);
    $distractors = make_qty_distractors($ans, 3);
    $choices     = array_merge([$ansCanon], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'ans'       => $ans,
        'ans_canon' => $ansCanon,
        'question'  => $question,
        'soln'      => $soln,
        'unit'      => $unit,
        'choices'   => $choices,
        'lvl'       => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/wquiz-15-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-15-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-15-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-15-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-15-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-15-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php
    $cur = $result['cur'];
    $ansDisp = $cur['ans_canon'];
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Let's review the problem:</p>
    <p class="statement" style="font-size:14pt; color:#800080;"><?php echo $cur['question']; ?></p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.6;"><?php echo $cur['soln']; ?></div>

    <p style="font-size:15pt; font-weight:700; color:#800080; margin-top:20px;">
        Answer: <span style="color:#CC0066;"><?php echo $ansDisp . ' ' . htmlspecialchars($cur['unit']); ?></span>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;"><?php echo $q['question']; ?></p>

    <p style="font-size:13pt; font-weight:500; color:#444444; margin-top:15px;">
        Click on your answer (in <?php echo htmlspecialchars($q['unit']); ?>).
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
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();