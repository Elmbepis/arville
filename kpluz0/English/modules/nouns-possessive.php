<?php
// english/modules/nouns-possessive.php
// Possessive Nouns — text-input exercise, rewritten sentence.
// Converted from legacy nouns-possessive.php to the container.php / scorer.php pattern.

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
$moduleTitle = 'Possessive Nouns';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard'; // migrate legacy Medium -> Hard
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Name and item pools — randomized per question, as in the legacy version.
$boys = ["Adam","Alex","Andrew","Angelo","Benny","Brandon","Carlo","Charlie","Clark","Daniel","David","Diego","Dominic","Gabriel","Ian","Isaac","Jack","Jacob","Jason","Jose","John","Jonathan","Joseph","Joshua","Juan","Kevin","Leo","Luke","Matthew","Max","Michael","Nathan","Nick","Noah","Oliver","Robert","Romeo","Ryan","Samuel","Tommy","William"];
$girls = ["Alyssa","Amelia","Andrea","Anna","Ariana","Bella","Betty","Camille","Caroline","Claire","Elizabeth","Emma","Eva","Evelyn","Gina","Hannah","Isabella","Jasmine","Jocelyn","Jolina","Julia","Katherine","Lauren","Layla","Leah","Lillian","Lydia","Madeline","Maria","Mariah","Melanie","Mia","Naomi","Natalie","Olivia","Samantha","Sarah","Sophia","Stella","Tina","Victoria"];
$itemsSing = ["apple","bag","books","car","chair","clock","clothes","elbow","pencil","puppy","shoulder","shoes","table","watch"];
$itemsPlur = ["books","bags","boots","chairs","cars","clocks","clothes","pencils","puppies","shoes","tables","watches"];

/**
 * Substitute markers:
 *   * -> 's  (singular possessive)
 *   + -> '   (plural possessive)
 */
function possessive_strip($s)   { return str_replace(['*', '+'], '', $s); }
function possessive_answer($s)  { return str_replace(['*', '+'], ["'s", "'"], $s); }

function possessive_html($s) {
    $h = htmlspecialchars($s);
    $h = str_replace('*', '<strong style="color:#CC0066;">\'s</strong>', $h);
    $h = str_replace('+', '<strong style="color:#CC0066;">\'</strong>', $h);
    return $h;
}

$result = null; $scorer = null;
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $userAns = (string)($_POST['answer'] ?? '');
    $normUser    = str_replace(' ', '', trim($userAns));
    $normCorrect = str_replace(' ', '', trim($cur['ans']));
    $isCorrect = ($normUser === $normCorrect);
    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer($isCorrect ? $cur['ans'] : $userAns, $cur['ans'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'user' => $userAns, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}
if ($result === null || isset($_POST['Submit2'])) {
    // Randomize names and items for this question
    $name1 = $boys[array_rand($boys)];
    do { $name2 = $boys[array_rand($boys)]; } while ($name2 === $name1);
    $name3 = $girls[array_rand($girls)];
    do { $name4 = $girls[array_rand($girls)]; } while ($name4 === $name3);
    $item  = $itemsSing[array_rand($itemsSing)];
    $item2 = $itemsPlur[array_rand($itemsPlur)];

    if ($lvl === 'Easy') {
        $pool = [
            "$name1* $item", "$name2* $item", "$name3* $item", "$name4* $item",
            "children* toys", "my aunt* $item", "my brother* $item", "my cousin* $item",
            "my father* $item", "my feet* toes", "my friend* $item", "my mother* $item",
            "my sister* $item", "my teacher* $item", "my uncle* $item", "our dog* paws",
            "the bird* beak", "the child* toy", "the man* $item", "the plant* leaves",
            "the sun* rays", "the turtle* shell",
            "my sisters+ $item2", "my brothers+ $item2", "my cousins+ $item2",
            "my aunts+ $item2", "my uncles+ $item2", "my friends+ $item2",
            "my shoes+ soles", "my teachers+ $item2", "the apples+ taste",
            "the horses+ hooves", "the books+ pages", "the cars+ tires",
            "the kittens+ food", "the ladies+ $item2", "the fishes+ fins",
            "the owls+ eyes", "the puppies+ mother", "the rats+ whiskers",
            "the roosters+ feathers",
        ];
    } else {
        // Legacy tier 2 + tier 3 merged into "Hard".
        $tier2 = [
            "$name1* shoes smell awful.", "$name1* new toy is broken.",
            "$name1 is $name2* father.", "$name1* cat is under the chair.",
            "$name1 wore his friend* cap", "$name3 is $name4* friend.",
            "$name3* book is very heavy.", "$name3* uncle looks friendly.",
            "$name3 is $name1* neighbor.", "$name3 loves to eat fish* eggs.",
            "He showed me his dog* puppies.", "I painted my dog* new house.",
            "She is $name1* math teacher.", "The cake* icing is very sweet.",
            "Their house* floor is dusty.",
            "$name1 took the hens+ eggs.", "$name3 wrote the boxes+ labels.",
            "Do not disturb the bees+ hive.", "He counted the cows+ calves.",
            "His shoes+ soles are very muddy.", "I checked the books+ titles.",
            "I wrapped the girls+ presents.", "She cleaned the boys+ beds.",
            "She got her sisters+ letters.", "Sharks+ teeth are very sharp.",
            "The cats ate the rabbits+ food.", "The trucks+ drivers had left.",
            "The bears+ cubs are playing.", "These ants+ jaws are scary.",
            "They hid the students+ bags.", "We washed our cars+ tires.",
        ];
        $tier3 = [
            "$name1* old computer is no longer working.",
            "$name1* father became a famous writer.",
            "$name3* brother should be more careful next time.",
            "$name3* aunt is now a social worker there.",
            "$name3 went downstairs to get $name1* hammer.",
            "All the teacher* pupils listened to her lecture.",
            "I will become $name1* neighbor soon.",
            "My mother is $name3* math and science teacher.",
            "My piano teacher borrowed $name3* book.",
            "Our school* new principal has a loud voice.",
            "Our classmate* father fell asleep after helping us.",
            "Our uncle used to be $name1* boxing coach.",
            "Our town* former mayor visited them.",
            "The baby rabbit* fur feels soft and warm.",
            "The bush* leaves turned brown before it died.",
            "$name1 cleaned the five police cars+ muddy tires.",
            "$name1 polished the bicycles+ shiny parts.",
            "$name1 tripped over the trees+ roots and fell.",
            "His brother went to the senators+ lounge.",
            "He thinks that frogs+ legs taste like chicken.",
            "I enjoy looking at these magazines+ covers.",
            "Our neighbors+ driver helped repair our car.",
            "She could not afford those lawyers+ fees.",
            "The audience could not hear the singers+ voices.",
            "The butterflies+ wings are very attractive.",
            "The kids excitedly sat on the barbers+ chairs.",
            "The judges tasted each of the cooks+ broths.",
            "The cards+ color faded under the heat of the sun.",
            "The clowns+ car made a very funny sound.",
            "The tigresses+ playful cubs looked very healthy.",
            "These are my classmates+ pencils and crayons.",
            "Those buildings+ corridors are too narrow.",
        ];
        $pool = array_merge($tier2, $tier3);
    }

    // No-repeat selection (tracks per level; resets only this level on exhaustion)
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $s) {
        if (!in_array("$lvl:$i", $used, true)) $available[$i] = $s;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "$lvl:") !== 0));
        $available = $pool;
    }
    $idx = array_rand($available);
    $sentence = $available[$idx];
    $used[] = "$lvl:$idx";
    if (count($used) > 300) $used = array_slice($used, -200);
    $_SESSION[$sessionKey]['used'] = $used;

    $_SESSION[$sessionKey]['current'] = [
        'q'       => possessive_strip($sentence),
        'ans'     => possessive_answer($sentence),
        'ansHtml' => possessive_html($sentence),
        'lvl'     => $lvl,
        'idx'     => $idx,
    ];
}

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
render_header($moduleTitle.' - '.$lvl, $moduleTitle.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:18px;">Your answer: "<strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['user']); ?></strong>"</p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <div style="margin:20px auto 30px;font-family:Arial,sans-serif;font-size:15pt;color:#333333;line-height:1.9;">
    <div><strong style="color:#800080;">original:</strong> <?php echo htmlspecialchars($cur['q']); ?></div>
    <div><strong style="color:#800080;">corrected:</strong> <?php echo $cur['ansHtml']; ?></div>
  </div>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current'];
    $q = $cur['q'];
    $ansLen = strlen($cur['ans']);
    $endsSentence = (substr($q, -1) === '.') || (substr($q, -1) === '?');
    $instruction = $endsSentence
        ? 'Rewrite the sentence below to show the<br/>proper use of possessive nouns.'
        : 'Rewrite the phrase below to show the<br/>proper use of possessive nouns.';
?>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:600;color:#800080;margin:20px 0 15px;"><?php echo $instruction; ?></p>
<div style="margin:0 auto 25px;display:inline-block;width:100%;max-width:480px;padding:20px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:22pt;font-weight:700;color:#333333;"><?php echo htmlspecialchars($q); ?></div>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#444;margin:0 0 15px;">(Do not make the singular nouns plural<br/>or the plural nouns singular.)</p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:600;color:#CC0066;margin:15px 0 5px;">Answer:</p>
  <div style="margin:40px 0;">
    <?php if ($ansLen <= 36): ?>
      <input type="text" name="answer" value="<?php echo htmlspecialchars($q, ENT_QUOTES); ?>" size="<?php echo $ansLen; ?>" maxlength="<?php echo $ansLen + 3; ?>" style="text-align:center;height:44px;font-family:Arial,sans-serif;font-size:22px;font-weight:700;border:2px solid #888888;border-radius:8px;padding:4px 12px;">
    <?php elseif ($ansLen <= 56): ?>
      <input type="text" name="answer" value="<?php echo htmlspecialchars($q, ENT_QUOTES); ?>" size="<?php echo $ansLen; ?>" maxlength="<?php echo $ansLen + 3; ?>" style="text-align:center;height:42px;font-family:Arial,sans-serif;font-size:20px;font-weight:700;border:2px solid #888888;border-radius:8px;padding:4px 12px;">
    <?php elseif ($ansLen <= 75): ?>
      <textarea name="answer" rows="2" cols="35" style="width:450px;height:70px;text-align:center;font-family:Arial,sans-serif;font-size:19px;font-weight:700;border:2px solid #888888;border-radius:8px;padding:6px;"><?php echo htmlspecialchars($q); ?></textarea>
    <?php else: ?>
      <textarea name="answer" rows="3" cols="38" style="width:450px;height:100px;text-align:center;font-family:Arial,sans-serif;font-size:19px;font-weight:700;border:2px solid #888888;border-radius:8px;padding:6px;"><?php echo htmlspecialchars($q); ?></textarea>
    <?php endif; ?>
  </div>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit1" value="Submit" style="margin-right:12px;font-family:Arial,sans-serif;">
    <input type="submit" name="Submit2" value="New Question" style="margin-left:12px;font-family:Arial,sans-serif;">
  </div>
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