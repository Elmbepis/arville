<?php
// math/modules/word-arithmetic1.php
// PROCEDURAL WORD PROBLEMS + choice. Bypass QEngine per §D (computed answer).
// Converted from FIB to MCQ per user instruction.
//
// Levels merged per §E:
//   Easy = legacy Easy templates 1-9
//   Hard = legacy Medium templates 11-17 (legacy Hard 21-27 dropped: calibrated too high)
//
// Layout: numeric choices with maxLen >= 5 wrap as 3+1 in default flex, so they
// are forced into a 2×2 grid (§A per-module threshold — numeric-only content).
//
// Encoding: × and ÷ glyphs don't render reliably in the client charset, so
// solution text uses ASCII 'x' for multiplication and &divide; for division.
//
// Legacy $tnum="*48", mysql_*, session_*, points — all deprecated per §P. Removed.
//
// Theme: wquiz-05-* (75/655/70) — fits §C. Score box: score-*-1 (default).
// DB row required: modules.url = 'word-arithmetic1.php'

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

$moduleTitle = 'Arithmetic Word Problems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function make_word_distractors($ans, $inputs, $n = 3) {
    $candidates = [$ans + 1, $ans - 1, $ans + 10, $ans - 10, $ans + 100];
    foreach ($inputs as $v) {
        if ($v > 0) {
            $candidates[] = $v;
            $candidates[] = $ans + $v;
            if ($v < $ans) $candidates[] = $ans - $v;
        }
    }
    for ($i = 0; $i < count($inputs); $i++) {
        for ($j = $i + 1; $j < count($inputs); $j++) {
            $candidates[] = $inputs[$i] + $inputs[$j];
            $candidates[] = abs($inputs[$i] - $inputs[$j]);
            $candidates[] = $inputs[$i] * $inputs[$j];
        }
    }
    $out = [];
    $seen = [(string)(int)$ans => true];
    shuffle($candidates);
    foreach ($candidates as $c) {
        $c = (int)$c;
        if ($c > 0 && !isset($seen[(string)$c]) && count($out) < $n) {
            $seen[(string)$c] = true;
            $out[] = $c;
        }
    }
    $d = 2;
    while (count($out) < $n && $d <= 200) {
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
    $randnum = ($lvl === 'Easy') ? rand(1, 9) : rand(11, 17);

    $names = ['Jeremy','Mario','Charlie','Pamela','Dinna','Tony','Philip','Jenny','Betty',
              'Eleonor','Gina','Kyle','Bernie','Dwight','Bart','Homer','Margie','Fred',
              'Gary','Eliza','Alice','Jason','Gregory','Douglas'];
    $name1 = $names[array_rand($names)];

    $soln = '';
    $d_inputs = [];

    $objects = $objects2 = $places = $preds = $acts1 = $acts2 = $actobjs = [];
    $inat = 'in';
    $objkind = 'items';

    if ($randnum <= 2 || $randnum == 11) {
        $opt = rand(1, 6);
        if ($opt == 1) {
            $objects  = ["cockroaches", "crickets", "grasshoppers", "dragonflies", "moths", "butterflies"];
            $objects2 = ["ants", "termites", "fruitflies", "houseflies", "mosquitos", "bees", "fireflies"];
            $places   = ["garden", "yard", "farm", "rice field", "playground", "fruit orchard", "vineyard"];
            $objkind  = "insects";
        } elseif ($opt == 2) {
            $objects  = ["musicians", "TV personalities", "scientists", "inventors", "journalists", "writers"];
            $objects2 = ["lawyers", "teachers", "policemen", "firemen", "accountants", "doctors", "nurses"];
            $places   = ["conference", "town meeting", "convention", "fund raising activity", "concert", "charity event"];
            $inat     = "at";
            $objkind  = "people";
        } elseif ($opt == 3) {
            $objects  = ["lions", "leopards", "hyenas", "cheetahs", "crocodiles", "snakes", "wild dogs"];
            $objects2 = ["antelopes", "impalas", "gazelles", "kudus", "wildebeests", "warthogs", "waterbucks"];
            $places   = ["jungle", "forest", "grassland", "plain", "valley", "savannah"];
            $objkind  = "animals";
        } elseif ($opt == 4) {
            $objects  = ["crocodiles", "alligators", "anacondas", "arowanas", "turtles", "gars", "giant catfishes"];
            $objects2 = ["trouts", "carps", "tilapias", "gouramis", "tetras", "barbs", "cichlids"];
            $places   = ["river", "lake", "lagoon", "marsh", "swamp"];
            $objkind  = "animals";
        } elseif ($opt == 5) {
            $objects  = ["pens", "pencils", "crayons", "erasers", "markers"];
            $objects2 = ["rubber bands", "paper clips", "coins", "sports cards", "index cards"];
            $places   = ["bag", "sack", "crate", "cabinet", "box", "drawer"];
            $objkind  = "objects";
        } else {
            $objects  = ["goats", "cows", "pigs", "carabaos", "geese", "turkeys", "horses"];
            $objects2 = ["chickens", "ducks", "birds", "rabbits", "mice"];
            $places   = ["farm", "field", "piece of land", "ranch", "meadow"];
            $objkind  = "animals";
        }
    }

    if ($randnum == 3 || $randnum == 4) {
        $opt = rand(1, 6);
        if ($opt == 1 || $opt == 2 || $opt == 3) {
            $acts1 = ["saw", "photographed", "observed", "watched", "counted"];
            $acts2 = ["see", "photograph", "observe", "watch", "count"];
        }
        if ($opt == 1) {
            $objects = ["swallows", "sparrows", "lovebirds", "pigeons", "finches", "parrots"];
            $preds   = ["flying by", "hiding among the trees", "roaming the school grounds", "caged in the city zoo"];
            $objkind = "birds";
        } elseif ($opt == 2) {
            $objects = ["goldfishes", "angelfishes", "neon tetras", "zebra danios", "swordtails", "guppies"];
            $preds   = ["in a large pond", "in a giant aquarium", "at a fish breeding farm", "at a pet shop"];
            $objkind = "fishes";
        } elseif ($opt == 3) {
            $objects = ["marathon runners", "basketball players", "tennis players", "archers", "swimmers"];
            $preds   = ["at a sporting event", "at a sports complex", "in the city's new coliseum", "while jogging"];
            $objkind = "athletes";
        } elseif ($opt == 4) {
            $acts1   = ["made", "prepared", "baked", "produced", "packed"];
            $acts2   = ["make", "prepare", "bake", "produce", "pack"];
            $objects = ["muffins", "cupcakes", "tarts", "doughnuts", "brownies", "cookies"];
            $preds   = ["to deliver to buyers", "to sell in their outlets", "to sell online", "to sell at an auction"];
            $objkind = "baked goods";
        } elseif ($opt == 5) {
            $acts1   = ["cleaned", "polished", "sterilized", "wiped", "dried", "disinfected"];
            $acts2   = ["clean", "polish", "sterilize", "wipe", "dry", "disinfect"];
            $objects = ["plates", "cups", "saucers", "bowls", "glasses", "spoons", "forks"];
            $preds   = ["for use in a party", "for use in a new restaurant", "before storing them", "to donate to an orphanage"];
            $objkind = "tableware items";
        } else {
            if (rand(1, 2) == 1) {
                $acts1 = ["bought", "purchased", "ordered", "procured", "acquired"];
                $acts2 = ["buy", "purchase", "order", "procure", "acquire"];
                $preds = ["from a mall", "from a wholesaler", "online", "at an auction", "from a retailer"];
            } else {
                $acts1 = ["gave away", "delivered", "shipped", "sent"];
                $acts2 = ["give away", "deliver", "ship", "send"];
                $preds = ["to a friend", "to a pastor", "to a store owner", "to an organization"];
            }
            $objects = ["comic books", "action figures", "toy cars", "rare coins", "rare stamps", "sports cards"];
            $objkind = "novelty items";
        }
    }

    if ($randnum == 5 || $randnum == 12) {
        $opt = rand(1, 3);
        if ($opt == 1) {
            $objects  = ["lions", "leopards", "hyenas", "cheetahs", "crocodiles", "snakes"];
            $objects2 = ["antelopes", "impalas", "gazelles", "kudus", "wildebeests", "zebras"];
            $places   = ["jungle", "forest", "grassland", "plain", "valley", "savannah"];
        } elseif ($opt == 2) {
            $objects  = ["crocodiles", "alligators", "anacondas", "arowanas", "turtles"];
            $objects2 = ["trouts", "carps", "tilapias", "gouramis", "tetras"];
            $places   = ["river", "lake", "lagoon", "marsh", "swamp"];
        } else {
            $objects  = ["paintings", "ancient ornaments", "rare gems", "rare coins", "rare stamps"];
            $objects2 = ["old photographs", "stuffed animals", "old books", "prehistoric tools"];
            $places   = ["city museum", "large pawn shop", "prestigious university", "famous auction house"];
        }
    }

    if ($randnum == 6 || $randnum == 13) {
        $opt = rand(1, 2);
        if ($opt == 1) {
            $objects   = ["coins", "marbles", "pencils", "pens", "markers", "batteries", "crayons"];
            $objects2  = ["box", "crate", "cart", "cabinet", "bin", "chest", "container"];
            $objects2s = ["boxes", "crates", "carts", "cabinets", "bins", "chests", "containers"];
            $acts1 = ["contains", "carries", "keeps", "has"];
            $acts2 = ["contained", "carried", "kept", "kept"];
            $places = ["warehouse", "garage", "yard", "basement", "factory"];
            $x = "in";
        } else {
            $objects   = ["books", "magazines", "newspapers", "posters", "cards", "brochures"];
            $objects2  = ["shelf", "rack", "counter"];
            $objects2s = ["shelves", "racks", "counters"];
            $acts1 = ["carries", "holds", "has"];
            $acts2 = ["carried", "held", "held"];
            $places = ["big office", "school building", "library", "store", "storage room"];
            $x = "on";
        }
    }

    if (in_array($randnum, [7, 8, 14, 15, 16], true)) {
        $objects = ["rubber bands", "candies", "bubble gums", "pencils", "plastic toys", "pens", "crayons"];
        $places  = ["supermarket", "retail store", "mall", "department store", "market", "grocery store"];
    }

    if ($randnum == 8 || $randnum == 15) {
        $opt = rand(1, 3);
        if ($opt == 1) {
            $objects = ["books", "magazines", "newspapers", "DVD's", "calendars", "magic kits"];
            $places  = ["book store", "novelty shop", "music store", "hobby shop", "newsstand"];
        } elseif ($opt == 2) {
            $objects = ["muffins", "cupcakes", "tarts", "doughnuts", "brownies", "cookies"];
            $places  = ["bakery", "bakeshop", "cake shop", "bread store"];
        } else {
            $objects = ["basketballs", "tennis balls", "golf balls", "volleyballs", "soccer balls"];
            $places  = ["sports shop", "sporting goods store", "sporting goods chain"];
        }
    }

    if ($randnum == 9 || $randnum == 17) {
        $acts    = ["serve","wash","sell","shine","wax","repair","mix","inspect","display","write","wrap","check"];
        $acts2   = ["serves","washes","sells","shines","waxes","repairs","mixes","inspects","displays","writes","wraps","checks"];
        $actobjs = ["burgers","shirts","books","pairs of shoes","cars","watches","drinks","trucks","statues","letters","gifts","test papers"];
        $j = array_rand($acts);
        $act = $acts[$j]; $act2 = $acts2[$j]; $actobj = $actobjs[$j];
    }

    if ($randnum == 1) {
        if ($opt != 2) {
            $num1 = rand(199, 799); $num2 = rand(499, 1299);
        } else {
            $num1 = rand(49, 299);  $num2 = rand(499, 999);
        }
        $ans = $num1 + $num2;
        $object  = $objects[array_rand($objects)];
        $object2 = $objects2[array_rand($objects2)];
        $place   = $places[array_rand($places)];
        $objcomb = "$object and $object2";
        $qopt = rand(1, 4);
        if ($qopt == 1) $newquestion = "There are " . hl($num1) . " $object and " . hl($num2) . " $object2 $inat a $place. How many $objkind $inat the $place are either $object or $object2?";
        elseif ($qopt == 2) $newquestion = ucfirst($inat) . " a $place, there are " . hl($num1) . " $object and " . hl($num2) . " $object2. Of the $objkind $inat that $place, how many are either $object or $object2?";
        elseif ($qopt == 3) $newquestion = "How many $objkind $inat a $place are either $object or $object2 if there are " . hl($num1) . " $object and " . hl($num2) . " $object2 $inat that $place?";
        else $newquestion = "The number of $object2 $inat a $place is " . hl($num2) . ". If there are also " . hl($num1) . " $object there, how many $objkind $inat that $place are either $object or $object2?";
        $soln = "$object = $num1<br>$object2 = $num2<br><strong>total = $num1 + $num2 = $ans</strong>";
        $d_inputs = [$num1, $num2];
    }
    elseif ($randnum == 2) {
        if ($opt != 2) {
            $num1 = rand(199, 799); $num2 = rand(499, 1299);
        } else {
            $num1 = rand(49, 299);  $num2 = rand(499, 999);
        }
        if ($num2 < $num1) { $t = $num2; $num2 = $num1; $num1 = $t; }
        if (($num2 - $num1) < 25) { $num2 = $num1 + rand(37, 59); }
        $ans = $num2 - $num1;
        $object  = $objects[array_rand($objects)];
        $object2 = $objects2[array_rand($objects2)];
        $place   = $places[array_rand($places)];
        $qopt = rand(1, 4);
        if ($qopt == 1) $newquestion = "There are " . hl($num1) . " $object and " . hl($num2) . " $object2 $inat a $place. How many more $object2 are there $inat the $place than $object?";
        elseif ($qopt == 2) $newquestion = "If there are " . hl($num1) . " $object and " . hl($num2) . " $object2 $inat a $place, how many less $object are there $inat the $place than $object2?";
        elseif ($qopt == 3) $newquestion = ucfirst($inat) . " a $place, there are " . hl($num1) . " $object and " . hl($num2) . " $object2. What's the difference between the number of $object2 and the number of $object $inat that $place?";
        else $newquestion = "How many more $object2 are there $inat a $place than $object if there are " . hl($num1) . " $object and " . hl($num2) . " $object2 $inat that $place?";
        $soln = "$object = $num1<br>$object2 = $num2<br><strong>difference = $num2 - $num1 = $ans</strong>";
        $d_inputs = [$num1, $num2];
    }
    elseif ($randnum == 11) {
        $num1 = rand(49, 149); $num2 = rand(5, 12);
        $ans = $num1 + $num2 * $num1;
        $object  = $objects[array_rand($objects)];
        $object2 = $objects2[array_rand($objects2)];
        $place   = $places[array_rand($places)];
        $qopt = rand(1, 4);
        if ($qopt == 1) $newquestion = "There are " . hl($num2) . " times as many $object2 as $object $inat a $place. If there are " . hl($num1) . " $object there, how many $objkind that are either $object2 or $object are $inat the $place?";
        elseif ($qopt == 2) $newquestion = ucfirst($inat) . " a $place, there are " . hl($num1) . " $object and some $object2. If the $object2 are " . hl($num2) . " times as many as the $object, how many $object and $object2 are there $inat the $place?";
        elseif ($qopt == 3) $newquestion = "The number of $object2 $inat a $place is " . hl($num2) . " times the number of $object. If there are " . hl($num1) . " $object $inat that $place, how many $objkind $inat that $place are either $object or $object2?";
        else $newquestion = "The $object2 $inat a $place outnumber the $object " . hl($num2) . " to " . hl(1) . ". If there are " . hl($num1) . " $object $inat that $place, how many $objkind $inat that $place are either $object or $object2?";
        $soln = "$object = $num1<br>$object2 = $num2 x $num1 = " . ($num2 * $num1) . "<br><strong>total = $num1 + " . ($num2 * $num1) . " = $ans</strong>";
        $d_inputs = [$num1, $num2];
    }
    elseif ($randnum == 3) {
        $num1 = rand(79, 199); $num2 = rand(79, 199);
        $ans = $num1 + $num2;
        $object  = $objects[array_rand($objects)];
        $object2 = $objects[array_rand($objects)];
        while ($object == $object2) { $object2 = $objects[array_rand($objects)]; }
        $pred  = $preds[array_rand($preds)];
        $pred2 = $preds[array_rand($preds)];
        while ($pred == $pred2) { $pred2 = $preds[array_rand($preds)]; }
        $acted = $acts1[array_rand($acts1)]; $act = $acts2[array_rand($acts2)];
        $qopt = rand(1, 3);
        if ($qopt == 1) $newquestion = "$name1 $acted " . hl($num1) . " $object $pred. The following day, $name1 $acted " . hl($num2) . " $object2 $pred2. How many $objkind did $name1 $act in all?";
        elseif ($qopt == 2) $newquestion = "If $name1 $acted " . hl($num1) . " $object $pred and " . hl($num2) . " $object2 $pred2, how many $objkind did $name1 $act altogether?";
        else $newquestion = "Yesterday, $name1 $acted " . hl($num1) . " $object $pred. The week before, $name1 $acted " . hl($num2) . " $object2 $pred2. What's the total number of $objkind that $name1 $act?";
        $soln = "$object = $num1<br>$object2 = $num2<br><strong>total = $num1 + $num2 = $ans</strong>";
        $d_inputs = [$num1, $num2];
    }
    elseif ($randnum == 4) {
        $num1 = rand(79, 199); $num2 = rand(79, 199);
        if ($num2 < $num1) { $t = $num2; $num2 = $num1; $num1 = $t; }
        if (($num2 - $num1) < 25) { $num2 = $num1 + rand(37, 59); }
        $ans = $num2 - $num1;
        $object  = $objects[array_rand($objects)];
        $object2 = $objects[array_rand($objects)];
        while ($object == $object2) { $object2 = $objects[array_rand($objects)]; }
        $pred  = $preds[array_rand($preds)];
        $pred2 = $preds[array_rand($preds)];
        while ($pred == $pred2) { $pred2 = $preds[array_rand($preds)]; }
        $acted = $acts1[array_rand($acts1)]; $act = $acts2[array_rand($acts2)];
        $qopt = rand(1, 3);
        if ($qopt == 1) $newquestion = "$name1 $acted " . hl($num1) . " $object $pred. The following day, $name1 $acted " . hl($num2) . " $object2 $pred2. How many more $object2 than $object did $name1 $act?";
        elseif ($qopt == 2) $newquestion = "$name1 $acted " . hl($num1) . " $object $pred. The following day, $name1 $acted " . hl($num2) . " $object2 $pred2. How many less $object than $object2 did $name1 $act?";
        else $newquestion = "If $name1 $acted " . hl($num1) . " $object $pred and " . hl($num2) . " $object2 $pred2, what's the difference between the number of $object2 and the number of $object that $name1 $acted?";
        $soln = "$object = $num1<br>$object2 = $num2<br><strong>difference = $num2 - $num1 = $ans</strong>";
        $d_inputs = [$num1, $num2];
    }
    elseif ($randnum == 5 || $randnum == 12) {
        if ($lvl === 'Easy') { $num1 = rand(35, 99); $num2 = rand(8, 19); }
        else                  { $num1 = rand(101, 499); $num2 = rand(21, 99); }
        $ans = $num1 * $num2;
        $object  = $objects[array_rand($objects)];
        $object2 = $objects2[array_rand($objects2)];
        $place   = $places[array_rand($places)];
        $qopt = rand(1, 4);
        if ($qopt == 1) $newquestion = "There are " . hl($num1) . " $object in a $place. If there are " . hl($num2) . " times as many $object2 as $object in that $place, how many $object2 are in the $place?";
        elseif ($qopt == 2) $newquestion = "In a $place, there are " . hl($num1) . " $object and " . hl($num2) . " times as many $object2. How many $object2 are in the $place?";
        elseif ($qopt == 3) $newquestion = "The number of $object2 in a $place is " . hl($num2) . " times the number of $object in that $place. How many $object2 are there if there are " . hl($num1) . " $object in the $place?";
        else $newquestion = "If there are " . hl($num1) . " $object in a $place, and there are " . hl($num2) . " times as many $object2 as $object in that $place, how many $object2 are in the $place?";
        $soln = "$object = $num1<br>$object2 = $num2 x $num1<br><strong>= $ans</strong>";
        $d_inputs = [$num1, $num2];
    }
    elseif ($randnum == 6 || $randnum == 13) {
        if ($lvl === 'Easy') { $num1 = rand(35, 99); $num2 = rand(8, 21); }
        else                  { $num1 = rand(101, 399); $num2 = rand(21, 69); }
        $ans = $num1 * $num2;
        $object   = $objects[array_rand($objects)];
        $j        = array_rand($objects2);
        $object2  = $objects2[$j];
        $object2s = $objects2s[$j];
        $j        = array_rand($acts1);
        $act      = $acts1[$j];
        $acted    = $acts2[$j];
        $place    = $places[array_rand($places)];
        $qopt = rand(1, 3);
        if ($qopt == 1) $newquestion = "Every $object2 in a $place $act " . hl($num1) . " $object. If there are " . hl($num2) . " $object2s in the $place, how many $object are $x $object2s in the $place?";
        elseif ($qopt == 2) $newquestion = "There are " . hl($num2) . " $object2s in a $place. If every $object2 in the $place $act " . hl($num1) . " $object, how many $object are $x $object2s in the $place?";
        else $newquestion = "How many $object are $x $object2s in a $place if there are " . hl($num2) . " $object2s in the $place and each of these $object2s $act " . hl($num1) . " $object?";
        $soln = "items per $object2 = $num1<br>$object2s = $num2<br><strong>total = $num1 x $num2 = $ans</strong>";
        $d_inputs = [$num1, $num2];
    }
    elseif ($randnum == 7 || $randnum == 14) {
        if ($lvl === 'Easy') { $num3 = rand(11, 49); $num2 = rand(6, 12); }
        else                  { $num3 = rand(34, 99); $num2 = rand(11, 24); }
        $num1 = $num3 * $num2;
        $ans  = $num3;
        $object = $objects[array_rand($objects)];
        $officials = ["mayor", "governor", "congressman", "senator", "millionaire businessman"];
        $official  = $officials[array_rand($officials)];
        if (rand(1, 2) == 1) {
            $newquestion = "A group of children received a total of " . hl($num1) . " $object from a $official. If each child got " . hl($num2) . " $object, how many children were there?";
        } else {
            $newquestion = "A $official distributed " . hl($num1) . " $object to a group of children. If each child got " . hl($num2) . " $object, how many children were there?";
        }
        $soln = "total items = $num1<br>per child = $num2<br><strong>children = $num1 &divide; $num2 = $ans</strong>";
        $d_inputs = [$num1, $num2, $num3];
    }
    elseif ($randnum == 8 || $randnum == 15) {
        if ($lvl === 'Easy') { $num3 = rand(11, 49); $num2 = rand(6, 12); }
        else                  { $num3 = rand(34, 99); $num2 = rand(11, 24); }
        $num1 = $num3 * $num2;
        $ans  = $num3;
        $object = $objects[array_rand($objects)];
        $place  = $places[array_rand($places)];
        $newquestion = "If a $place sold " . hl($num1) . " $object to a number of customers, and each customer bought an average of " . hl($num2) . " $object, how many customers were there?";
        $soln = "total items sold = $num1<br>avg per customer = $num2<br><strong>customers = $num1 &divide; $num2 = $ans</strong>";
        $d_inputs = [$num1, $num2, $num3];
    }
    elseif ($randnum == 16) {
        $num3 = rand(34, 99); $num2 = rand(11, 25);
        $num1 = $num3 * $num2;
        $ans  = rand(2, $num2 - 1);
        $object = $objects[array_rand($objects)];
        $place  = $places[array_rand($places)];
        $totalBought = $num1 + $ans;
        if (rand(1, 2) == 1) {
            $newquestion = "$name1 bought " . hl($totalBought) . " $object from a $place. If $name1 distributed them equally among " . hl($num3) . " kids, how many excess $object did $name1 have left?";
        } else {
            $newquestion = "If $name1 gave away " . hl($totalBought) . " $object to " . hl($num3) . " children and each child got the same number of $object, how many excess $object did $name1 have left?";
        }
        $soln = "$object bought = $totalBought<br>children = $num3<br>$object per child = " . floor($totalBought / $num3) . " remainder $ans<br><strong>excess = $ans</strong>";
        $d_inputs = [$num1, $num2, $num3];
    }
    elseif ($randnum == 9 || $randnum == 17) {
        if ($lvl === 'Easy') { $num1 = rand(35, 99); $num2 = rand(8, 24); }
        else                  { $num1 = rand(101, 399); $num2 = rand(24, 79); }
        $ans = $num1 * $num2;
        $qopt = rand(1, 3);
        if ($qopt == 1) $newquestion = "$name1 $act2 an average of " . hl($num2) . " $actobj a day. How many $actobj will $name1 be able to $act in " . hl($num1) . " days?";
        elseif ($qopt == 2) $newquestion = "How many $actobj will $name1 be able to $act in " . hl($num1) . " days if $name1 $act2 an average of " . hl($num2) . " $actobj a day?";
        else $newquestion = "If $name1 $act2 an average of " . hl($num2) . " $actobj a day, how many $actobj will $name1 be able to $act in " . hl($num1) . " days?";
        $soln = "per day = $num2<br>days = $num1<br><strong>total = $num2 x $num1 = $ans</strong>";
        $d_inputs = [$num1, $num2];
    }

    $answerStr = (string)(int)$ans;
    $distractors = make_word_distractors($ans, $d_inputs, 3);
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
        'prompt'   => $newquestion,
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
    'top_banner'    => $base . '/math/images/images/wquiz-05-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-05-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-05-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-05-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-05-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-05-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .hl-num { color:#CC0066; font-weight:700; }
  /* §A per-module 2×2 grid — numeric-only content wraps 3+1 at maxLen >= 5. */
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
        // §A per-module threshold — pure-numeric choices wrap at 5+ chars.
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