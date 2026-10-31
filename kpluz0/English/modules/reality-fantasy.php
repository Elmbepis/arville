<?php
// english/modules/reality-fantasy.php
// Reality and Fantasy — static question bank + 2 MC choices (reality/fantasy).
// 6 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).

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
$moduleTitle = 'Reality and Fantasy';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade resolution ------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ---- Level resolution ------------------------------------------------------
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard'; // migrate legacy Medium -> Hard
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- (level, grade) -> tier mapping ----------------------------------------
// Legacy formulas:
//   Easy:   $arrnum = $grd          (clamp 4+)
//   Medium: $arrnum = $grd + 1      (clamp 5+)
//   Hard:   $arrnum = $grd + 2      (clamp 6+)
// Modern uses Easy (legacy Easy) and Hard (merged Medium + Hard -> harder = Hard).
function resolve_rf_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        return min(4, max(1, $grd));        // grade 0,1 -> 1 ; grade 2 -> 2 ; grade 3 -> 3 ; grade 4+ -> 4
    }
    return min(6, max(1, $grd + 2));        // grade 0 -> 2 ; grade 1 -> 3 ; grade 2 -> 4 ; grade 3 -> 5 ; grade 4+ -> 6
}

// ---- Random pools ----------------------------------------------------------
$boys     = ["Alex","Ben","Carlos","Daniel","Diego","Gabriel","Isaac","Jaime","Jose","Juan","Jonathan","Lucas","Luis","Max","Roberto","Samuel","Tomas"];
$girls    = ["Annie","Betty","Caring","Elisa","Emma","Eva","Evelyn","Grace","Josie","Julie","Katring","Laura","Lydia","Maring","Olive","Tina","Toyang"];
$surnames = ["Cruz","de Guzman","Gomez","Padua","Santos","Reyes","Tolentino","Torres"];
$animals  = ["cat","cow","dog","duck","goat","goose","horse","rooster","turkey"];

/**
 * Build a tier's realities/fantasies arrays with the given random substitutions.
 * Preserves the exact legacy content for each tier.
 */
function build_reality_fantasy_pool($tier, $name, $boy, $girl, $animal, $mcreature, $surname) {
    switch ($tier) {
        case 1:
            $realities = [
                "The bird flew away", "$name fed the $animal", "$name went to school early",
                "$name lives in a big house", "The cat meowed loudly", "The dog barked at $name",
                "$name washed the dishes last night", "The baby boy smiled at the puppy",
                "The duck crossed the street", "$boy climbed up the tall tree",
                "The stool broke when I sat on it", "The ball rolled under the table",
                "$name heard some footsteps", "The rooster crowed many times",
            ];
            $fantasies = [
                "The $animal spoke to $name", "The $animal wrote a poem", "$name saw a $mcreature today",
                "The book sang a song to $name", "The pencil danced on the table",
                "Their goose laid a golden egg", "My bag went up the stairs by itself",
                "Our dog turned into a cat yesterday", "The spoon laughed at the fork",
                "The whale played the violin", "The elf talked to the fairy",
                "The $animal drove away in a red car",
            ];
            break;
        case 2:
            $realities = [
                "The farmer showed $name the new $animal", "$girl finished her homework quickly",
                "$boy has a calendar in his wallet", "$boy taught $girl how to count her money",
                "$boy scored thirty points in the game", "$girl danced when the music began",
                "$name loves to drink cow's milk", "$name wrote a story about a lonely $mcreature",
                "The dog chased the cat up the tree", "The student read a book about dragons",
                "$name learned a new song about mermaids",
            ];
            $fantasies = [
                "The $animal reads a storybook each night", "$name met a $mcreature in the garden",
                "A scary goblin visits $girl every night", "The toys played with each other",
                "Her goldfish finished her math homework", "The wolf blew the pig's house down",
                "The baby elephant flew up in the sky", "The apple argued with the orange",
                "The giraffe asked for a cup of coffee", "The ostrich cooked some breakfast",
                "The tree sang while the flowers danced", "The rubber duck turned into a real duck",
            ];
            break;
        case 3:
            $realities = [
                "The hungry cubs patiently waited for the lioness",
                "$name repaired the car when it broke down",
                "$name drove the truck down the winding road",
                "$girl bought a gallon of ice cream from $boy",
                "The storm ruined the sand castle that $girl built",
                "The children clapped at the end of the concert",
                "$girl and her classmates went to the zoo for a field trip",
                "The science teacher gave $girl a high grade in the test",
                "The caterpillar changed into a beautiful butterfly",
                "The puppy you gave me is now a large dog",
                "Many people believe that ghosts really exist",
            ];
            $fantasies = [
                "The $animal laughed when the $mcreature disappeared",
                "The seven dwarves quickly hid inside the shoebox",
                "A $mcreature befriended $name a week ago",
                "The cup jumped up and down on the saucer",
                "The $animal told $name to eat vegetables more often",
                "The twenty-foot giant picked up their old truck",
                "The black serpent spoke to $name in Spanish",
                "The baby dragon burned the noisy soldier's finger",
                "The invisible kitten played with a ball of yarn",
                "The mermaid swam away when they waved at her",
            ];
            break;
        case 4:
            $realities = [
                "The cobbler secretly repaired my old leather shoes last night",
                "$boy is a genius because he knows the capital of every country I name",
                "The violent eruption of that volcano destroyed their small village last year",
                "$girl reminded $boy not to go out in the street at night",
                "The scientists discovered a new kind of insect in the forest",
                "The warriors engaged in battles for years before the war ended",
                "$boy and $girl are fond of books on mythical creatures",
                "The car disappeared from their view when it entered the dark tunnel",
                "The angry buffalo turned around and charged at the startled lions",
            ];
            $fantasies = [
                "The toys played with each other when $name left the room",
                "The orange juice in his glass froze and turned into gold",
                "Everything that $name touches turns into either wood or stone",
                "The $animal turned into a $mcreature right before his eyes",
                "Mrs. $surname can break wooden windows just by sneezing",
                "The heavy book politely asked me to put her down on the table",
                "The carabao plowed the field and then asked for some snacks and water",
                "Harry disappeared from their view when he used his invisibility cloak",
            ];
            break;
        case 5:
            $realities = [
                "Advances in technology in the field of medicine save many lives each day",
                "We can use smartphones to send pictures to our relatives on the other side of the globe",
                "Climate change is a phenomenon that humans have to adapt to in one way or another",
                "Some scientists are now concerned that robots will soon become intelligent enough to threaten humans",
                "Tsunamis and storm surges can decimate entire villages within a short period of time",
                "Scientists and engineers have built robots that swim like a real fish",
                "Experts can identify the gun where a bullet came from by examining the bullet",
                "The professor explained why he believes life could exist in other planets",
                "Solar energy is now cheaper than coal-based energy in many countries",
            ];
            $fantasies = [
                "There is now sufficient technology to transport people to other galaxies",
                "All objects have spirits that, if disturbed, can bring bad luck to people",
                "Aliens are now preparing to attack Earth sometime soon to search for food",
                "Amulets can protect you from harm or even make you invulnerable",
                "The witch concocted a potion that turned $name into an amphibian",
                "To show its gratitude, the extraterrestrial granted $name three wishes",
                "The young lass transformed into a superhero as soon as she swallowed the stone",
                "The leprechaun will reveal where the treasure is buried to whoever catches him",
            ];
            break;
        case 6:
            $realities = [
                "The weakening hurricane regained some strength as it passed through the open ocean",
                "Driverless cars will be seen in the streets of many countries around the world",
                "The solar plane has successfully circumnavigated the world without using any fossil fuel",
                "Virtual reality is now being used in online games that feature vicious dragons",
                "Some people are utilizing electronic gadgets to prove that ghosts actually exist",
                "Artificial intelligence is a technology that could take away jobs from millions of people someday",
                "Gigantic carnivorous reptiles had roamed the Earth hundreds of millions of years ago",
                "The rising popularity of online stores is affecting the businesses of brick-and-mortar stores",
            ];
            $fantasies = [
                "Fortune tellers and astrologers can exactly predict what will happen to you ten years from now",
                "The enormous building was teleported from Asia to Africa in less than five seconds",
                "The scientists' new invention shrank $name to the size of a 6-inch action figure",
                "$name became totally invisible after drinking the mysterious liquid from the fountain",
                "The velociraptor started to attack people immediately after escaping from its underground cage",
                "Paleontologists in East Asia have recently unearthed fossilized remains of prehistoric dragons",
                "Flying objects of extraterrestrial origin monitored the military base for days before the war erupted",
                "His uncle is said to have acquired his immense wealth from a genie that he released from a bottle",
                "By just closing his eyes and making a wish, the sickly little boy turned into a powerful warrior",
            ];
            break;
        default:
            return ['realities' => [], 'fantasies' => []];
    }
    return ['realities' => $realities, 'fantasies' => $fantasies];
}

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $boy     = $boys[array_rand($boys)];
    $girl    = $girls[array_rand($girls)];
    $name    = (rand(1, 2) === 1) ? $boy : $girl;
    $surname = $surnames[array_rand($surnames)];
    $animal  = $animals[array_rand($animals)];

    $tier   = resolve_rf_tier($lvl, $grd);
    $mcList = ($tier < 3)
        ? ["dragon", "fairy", "mermaid", "unicorn"]
        : ["centaur", "dragon", "fairy", "hippogriff", "leprechaun", "mermaid", "unicorn", "werewolf"];
    $mc       = $mcList[array_rand($mcList)];
    $tierPool = build_reality_fantasy_pool($tier, $name, $boy, $girl, $animal, $mc, $surname);

    $candidates = [];
    foreach ($tierPool['realities'] as $i => $r) $candidates[] = ['type' => 'reality', 'text' => $r, 'key' => "t$tier-r$i"];
    foreach ($tierPool['fantasies'] as $i => $f) $candidates[] = ['type' => 'fantasy', 'text' => $f, 'key' => "t$tier-f$i"];

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($candidates, fn($c) => !in_array($c['key'], $used, true)));
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier-") !== 0));
        $available = $candidates;
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $_SESSION[$sessionKey]['current'] = [
        'question' => $pick['text'] . '.',
        'answer'   => $pick['type'],
        'lvl'      => $lvl,
        'tier'     => $tier,
        'grd'      => $grd,
    ];
}

// ---- Render ----------------------------------------------------------------
$theme = [
    'top_banner'=>$base.'/math/images/images/paper-69-top.jpg',
    'title_bg'=>$base.'/math/images/images/paper-69-top2.jpg',
    'left_side'=>$base.'/math/images/images/paper-69-left.jpg',
    'right_side'=>$base.'/math/images/images/paper-69-right.jpg',
    'content_bg'=>$base.'/math/images/images/paper-69-content.jpg',
    'bottom_banner'=>$base.'/math/images/images/paper-69-bottom.jpg',
    'score_top'=>$base.'/math/images/score-top-1.jpg',
    'score_bottom'=>$base.'/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;">You clicked on <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.</p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;"><?php echo $cur['answer'] === 'fantasy' ? '<br/>This is just fantasy.' : '<br/>This is reality.'; ?></p>
  <div style="margin:30px auto;display:inline-block;padding:25px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#333333;max-width:480px;"><?php echo htmlspecialchars($cur['question']); ?></div>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else: $q = $_SESSION[$sessionKey]['current']; ?>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:600;color:#800080;margin:30px 0 20px;">Is this reality or fantasy?</p>
  <div style="margin:0 auto 30px;display:inline-block;max-width:480px;padding:25px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#333333;"><?php echo htmlspecialchars($q['question']); ?></div>
  <div style="font-family:Arial,sans-serif;font-size:14pt;font-weight:600;color:#800080;margin-bottom:20px;">Click on your answer.</div>
  <table border="0" cellspacing="20" cellpadding="0" style="margin:0 auto;"><tr>
    <td align="center"><a href="?ansclick=reality" style="display:block;min-width:160px;padding:16px 32px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;">reality</a></td>
    <td align="center"><a href="?ansclick=fantasy" style="display:block;min-width:160px;padding:16px 32px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;">fantasy</a></td>
  </tr></table>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>