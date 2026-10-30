<?php
// english/modules/homonyms.php
// FIB (free-text entry). Bypass QEngine per §D.
// Shows a word + definition of the target homonym. Student types the answer.
// Canonicalization: lowercase + strip spaces (matches legacy, not §F.1 numeric rule).
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Grade-keyed tier assignment (bank has 6 tiers):
//     grd 0-2  &#8594; Easy: 1;  Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 3-4  &#8594; Easy: 2;  Hard: rand(3,4)   [Medium=3, Hard=4]
//     grd 5-6  &#8594; Easy: 3;  Hard: rand(4,5)   [Medium=4, Hard=5]
//     grd 7+   &#8594; Easy: 4;  Hard: rand(5,6)   [Medium=5, Hard=6]
//   Rationale: modern Hard takes the union of legacy Medium + legacy Hard;
//   per-grade range preserves both difficulty tiers as a random pick.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Theme: ex-*-010 (136/556/117) &#8594; not in §8 fit list &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'homonyms.php'

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

$moduleTitle = 'Homonyms';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 5)));

$bank = [];
$bank[1] = [
    "ant:is a small insect-aunt:is your parent's sister",
    "ate:is the past tense of 'eat'-eight:equals seven plus one",
    "bald:is a man with no hair-bold:means 'brave'",
    "bare:means 'having no cover'-bear:is a wild animal",
    "be:means 'to become'-bee:is a buzzing insect",
    "beat:means 'to pound'-beet:is a type of plant you can eat",
    "berry:is a small fruit-bury:means 'to put under the ground'",
    "blew:is the past tense of 'blow'-blue:is a color",
    "boar:is a male pig-bore:means 'to make a hole'",
    "buy:means 'to pay for a thing to get it'-by:means 'at your side'",
    "cent:is also called a 'penny'-sent:is the past tense of 'send'",
    "dear:means 'loved'-deer:is an animal",
    "eye:is what you use to see-I:means 'me'",
    "fit:means 'to put into place'-feet:means 'more than one foot'",
    "flea:is a small biting insect-flee:means 'to run'",
    "flew:is the past tense of 'fly'-flu:is an illness",
    "heal:means 'to get well'-heel:is the back of the foot",
    "hi:means 'hello'-high:means 'being up there'",
    "knew:is the past tense of 'know'-new:means 'not old'",
    "marry:means 'to wed'-merry:means 'happy'",
    "sea:is a large body of water-see:is what your eyes do",
    "toe:is a part of the foot-tow:means 'to pull along'",
    "two:equals one plus one-too:means 'also'",
    "we:means 'us'-wee:means 'tiny'",
    "weak:means 'not strong'-week:has seven days",
];
$bank[2] = [
    "acts:refers to things that are done-ax:refers to a chopping tool",
    "aid:means 'to assist'-aide:refers to an assistant",
    "air:refers to the stuff that we breath-heir:refers to someone who will inherit something",
    "aisle:refers to a walkway-isle:is a small island",
    "ant:is a small crawling insect-aunt:is your father or mother's sister",
    "arc:is a curve-ark:is a large boat",
    "ate:is the simple past tense of the verb 'eat'-eight:refers to the number before nine",
    "bald:is a person with little or no hair on the head-bawled:means 'cried aloud'",
    "band:refers to a group-banned:means 'forbidden'",
    "bare:means 'uncovered'-bear:refers to a wild mammal",
    "be:means 'to exist or live'-bee:refers to a flying insect that can sting",
    "beach:is a sandy shore-beech:is a type of tree",
    "beat:means 'to defeat someone in a game'-beet:refers to a type of edible plant",
    "berry:refers to a fruit from a bush-bury:means 'to put or hide underground'",
    "berth:is a space on a ship-birth:means 'being born'",
    "blew:means 'made currents of air using your mouth'-blue:refers to a mood that means 'sad'",
    "boar:refers to the male of some mammals-bore:means 'to be not interesting'",
    "bough:refers to a tree branch-bow:means 'to bend or curtsy'",
    "brake:means 'to stop a car'-break:means 'to smash'",
    "bread:is something a baker makes-bred:is the past tense of 'breed'",
    "buoy:refers to a floater-boy:refers to a young man",
    "brows:refers to the ridges above the eyes-browse:means 'to look around'",
    "buy:means to purchase something-by:is used to identify who or what performs an action",
    "cent:is equal to a hundredth of a dollar-scent:refers to a distinctive and often pleasant odor",
    "dear:is a synonym of 'expensive'-deer:refers to a hoofed animal with antlers and four legs",
    "dew:refers to morning mist-do:means 'to perform an action'",
    "eye:refers to the organ of sight-I:is a singular pronoun",
    "hair:is what covers your head-hare:is an animal that looks like a rabbit",
    "hour:equals sixty minutes-our:is used to show something belonging to us",
    "site:refers to a location-sight:refers to the sense through which a person or animal sees",
    "days:refers to more than one day-daze:means 'to confuse'",
    "die:means 'to stop living'-dye:refers to a coloring substance",
    "doe:refers to a female deer-dough:is what you bake into bread",
    "fair:means 'equal or just'-fare:is money that you pay for a ride",
    "feat:refers to an act that is not easy to do-feet:is the plural form of foot",
    "hay:is what horses eat-hey:is sometimes used to call someone",
    "fir:is a type of tree-fear:is what you feel when you're afraid",
    "halve:means 'to cut in two parts'-have:means 'to possess'",
    "know:means 'be aware of something'-no:is the opposite of 'yes'",
    "made:is the past tense of 'make'-maid:means 'a lady who is not yet married'",
    "mail:means 'letters sent through the post office'-male:is the opposite of 'female'",
    "none:is a synonym of 'nothing'-nun:is a woman who serves God",
    "pain:refers to what you feel when hurt-pane:refers to a window glass",
    "peak:refers to the highest point of something-peek:means 'to look or glance quickly'",
    "rain:refers to water falling from the sky-rein:is a long, narrow strap for guiding a horse",
    "right:is a synonym of 'correct'-write:is what you do on paper using a pen",
    "tail:is the hindmost part of an animal-tale:is a kind of story",
    "waist:is a part of your body-waste:is something that you throw away",
    "wait:means 'to kill time'-weight:is a force caused by gravity",
];
$bank[3] = [
    "accept:means 'to receive'-except:is a word that excludes",
    "affect:means 'to influence'-effect:is a synonym of the word 'result'",
    "aisle:is a path where you can walk-isle:refers to a small piece of land surrounded by water",
    "allowed:means 'permitted'-aloud:refers to something you can hear",
    "ant:refers to an insect that lives in a large colony-aunt:refers to the wife of one's uncle or the sister of one's parent",
    "arc:refers to something shaped like a curve or arch-ark:refers to the ship built by Noah",
    "bald:is a person without any hair-bawled:is what you did after crying aloud",
    "band:is a group of musicians-banned:is something that is not allowed",
    "base:refers to a bottom part-bass:means 'deep or low'",
    "beach:refers to a pebbly or sandy shore-beech:refers to a large tree with gray bark and glossy leaves",
    "berth:refers to a sleeping space on a ship-birth:means 'the process of being born'",
    "bite:is related to the word 'nibble'-byte:means 8 bits of data",
    "bore:means 'to make someone feel weary and uninterested'-boar:refers to an uncastrated male swine",
    "brake:means 'to stop using a pedal'-break:means 'to cause to separate into pieces'",
    "cell:refers to a small room in which a prisoner is locked up-sell:means 'to give or hand over something in exchange for money'",
    "cereal:refers to a breakfast food-serial:means 'sequential' or 'one event at a time'",
    "chili:refers to a bean stew-chilly:means 'uncomfortably cold or cool'",
    "cite:means 'to refer to a passage, book, or author'-site:means 'an area or location on which something is'",
    "chord:is a group of musical notes-cord:is something you use to tie something",
    "crews:refers to a group of people who work closely together-cruise:refers to a voyage on a ship that's taken for pleasure",
    "doe:refers to the female of the deer, hare, rabbit, and other animals-dough:refers to a thick mixture of flour and liquid",
    "feat:refers to an achievement that needs courage, strength, or skill-feet:is the plural form of the part at the end of the leg",
    "fairy:is an imaginary elflike creature with wings-ferry:is a boat that carries people and goods across a river",
    "groan:is a deep, long sound showing great pain or unhappiness-grown:is the past participle of 'grow'",
    "meat:is a source of animal protein-meet:means 'to come together in order to talk'",
    "rose:is a flower with a prickly stem-rows:refers to things placed next to each other to form lines",
    "sail:means 'to move by wind power'-sale:refers to the act of selling",
    "steal:means 'to get something that does not belong to you'-still:means 'not moving nor making a sound'",
    "your:is a possessive pronoun-you're:is the contraction of 'you are'",
];
$bank[4] = [
    "accept:means to consent to receive a thing offered-except:means 'not including' or 'other than'",
    "affect:means 'to have an influence on someone or something'-effect:refers to a change that results when something is done or happens",
    "aisle:refers to a passage between rows of seats in a building-isle:refers to a small version of the landforms that make up an archipelago",
    "arc:refers to a part of the circumference of a circle-ark:refers to the chest containing the Ten Commandments",
    "bald:means having little or no hair on the scalp-bold:refers to someone fearless or daring",
    "bold:means 'not hesitating to break the rules of propriety'-bawled:means 'shouted in a very loud voice'",
    "beach:is a verb that means 'to become stranded out of the water'-beech:refers to a tree with hard, pale timber",
    "berth:is a verb that means 'to moor a ship in its allotted place'-birth:means 'the start of life as a separate being'",
    "broach:means 'to bring up for discussion'-brooch:refers to an ornament fastened to clothing",
    "cell:refers to the smallest structural and functional unit of an organism-sell:may mean 'to persuade someone of the merits of an idea'",
    "chili:refers to a small pepper with a very hot flavor-chilly:is what you would call an unfriendly or uncaring person",
    "chord:is a group of two or more notes sounded together-cord:refers to a long, thin, and flexible string or rope",
    "creak:means 'to make a harsh sound when being moved'-creek:refers to a minor tributary of a river or a narrow, sheltered waterway",
    "dual:means 'consisting of two parts, elements, or aspects'-duel:refers to a contest with deadly weapons arranged between two people",
    "forth:means 'onward or outward in place or space'-fourth:is the ordinal form of the number '4'",
    "hoarse:means 'rough or harsh in sound'-horse:refers to a herbivorous domesticated mammal",
    "knead:means 'to massage or squeeze with the hands'-need:is a verb that means 'to require something'",
    "slight:means 'inconsiderable or small in degree'-sleight:refers to a clever or skillful trick or deception",
    "weather:refers to the state of the atmosphere at a given place and time-whether:is a word that introduces a single alternative",
];
$bank[5] = [
    "accept:means to come to recognize that an opinion or idea is valid or correct-except:is used to specify something as being not included in a group",
    "affect:means 'to have an effect on or make a difference to'-effect:refers to a change that is a result or consequence of a cause or action",
    "conk:means to fail or stop functioning-conch:refers to a tropical marine mollusk with a spiral shell",
    "whether:is a word that expresses a doubt or choice between two alternatives-wether:refers to a castrated male sheep",
    "chord:refers to a line segment connecting two points on a curve-cord:may refer to an insulated flexible electric wire fitted with a plug",
    "cite:means 'to quote a person of authority as proof for a theory'-sight:refers to a device on a gun or an optical instrument",
    "cession:refers to the formal giving up of rights, property, or territory, especially by a state-session:is a meeting of a deliberative or judicial body to conduct its business",
    "council:refers to a body of people elected to manage the affairs of a city-counsel:means 'a lawyer engaged in the trial or management of a case in court'",
    "gilt:refers to gold paint applied in a thin layer to a surface-guilt:refers to the state of having done something wrong",
    "overdo:means 'exhaust oneself by overwork or overexertion'-overdue:means 'not done or happening when expected or when needed'",
    "peace:refers to a period of freedom from public disturbance or war-piece:refers to a portion of an object produced by cutting, tearing, or breaking",
    "sachet:refers to a small plastic or paper package containing a small amount of liquid or powder-sashay:means 'to strut or move about in an ostentatious or conspicuous manner'",
    "surf:refers to the mass or line of foam formed by waves breaking on a seashore or reef-serf:is an agricultural laborer bound under the feudal system to work on his lord's estate",
    "shear:refers to a strain in a structure produced by unaligned forces-sheer:is used to emphasize how important or powerful a quality or feeling is",
    "slight:is an insult caused by a failure to show someone proper respect or attention-sleight:is the use of dexterity or cunning to deceive",
    "spade:is a tool for digging with an iron blade adapted for pressing into the ground-spayed:is the past tense of the verb that means 'to sterilize a female animal by removing its ovaries'",
    "tighten:is a verb that means 'to make or become tight or tighter'-titan:is an adjective that means 'gigantic in size or power'",
    "toxins:refers to poisonous substances produced by living cells or organisms-tocsins:refers to alarm signals that are sounded on a bell or bells",
];
$bank[6] = [
    "allusion:refers to an indirect or passing reference-illusion:refers to a deceptive appearance or impression",
    "weather:refers to the atmospheric condition at a particular location and time-wether:refers to a male sheep castrated before sexual maturity",
    "capital:refers to a city that serves as a center of government-capitol:refers to a building in which a legislature meets",
    "coddling:means 'treating someone or something in an indulgent or overprotective way'-codling:may refer to either an immature cod or a greenish apple used for cooking",
    "colonel:refers to an army officer below a brigadier general-kernel:is a word that's used to refer to the central or most important part of something",
    "complacence:means 'a secure or smug satisfaction with oneself'-complaisance:means 'willingness to please other people or oblige to their wishes'",
    "complacent:means 'showing smug or uncritical satisfaction with oneself'-complaisant:describes someone who wants or tries to please other people",
    "complement:refers to something that completes something else or makes it better-compliment:is a polite expression of praise or admiration",
    "cosine:is the ratio of the adjacent side to the hypotenuse of a right triangle-cosign:refers to the act of signing for another person's debt",
    "council:refers to an advisory, deliberative, or legislative body of people-counsel:means 'an advice, opinion, or instruction given to direct the judgment or conduct of another'",
    "climactic:means 'acting as a culmination or resolution to a series of events'-climatic:is related to weather patterns in a place",
    "elicit:means 'to evoke or draw out a response or reply from someone'-illicit:refers to something not permitted or disapproved of for moral or ethical reasons",
    "emigrate:means 'to leave one country in order to settle permanently in another'-immigrate:means 'to come to or enter a foreign country in order to live there permanently'",
    "gorilla:refers to a powerfully built great ape with a large head and short neck-guerrilla:refers to a member of a small independent group taking part in irregular fighting",
    "principal:refers to the original amount of money lent, not including profits and interest-principle:refers to a fundamental truth or proposition",
    "shears:refers to a cutting instrument in which two blades move past each other-sheers:is a verb that means 'swerves or turns abruptly'",
    "sheave:is a pulley with a grooved wheel that retains a belt or rope-shiv:is a knife, razor, or sharp implement used as a weapon",
    "stationary:means 'not moving or not intended to be moved'-stationery:is a mass noun referring to commercially manufactured writing materials",
];

$grdKey = ($grd <= 2) ? 0 : (($grd <= 4) ? 1 : (($grd <= 6) ? 2 : 3));
$configs = [
    0 => ['Easy' => [1, 1], 'Hard' => [2, 3]],
    1 => ['Easy' => [2, 2], 'Hard' => [3, 4]],
    2 => ['Easy' => [3, 3], 'Hard' => [4, 5]],
    3 => ['Easy' => [4, 4], 'Hard' => [5, 6]],
];
$range  = $configs[$grdKey][$lvl];
$arrnum = rand($range[0], $range[1]);

// ============================================================
// HANDLE SUBMIT1 (SCORE FIB)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = (string)($_POST['answer'] ?? '');
    // Canonicalize: lowercase, strip spaces (matches legacy exact comparison)
    $canon    = strtolower(str_replace(' ', '', trim($raw)));
    $corCanon = strtolower(str_replace(' ', '', $cur['answer']));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($canon, $corCanon, $cur['lvl']);

    $result = ['correct' => $isCorrect, 'userInput' => $raw, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $pool = $bank[$arrnum];
    $usedKey = 'used_' . $arrnum;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    $avail = [];
    foreach ($pool as $i => $_) {
        foreach ([1, 2] as $opt) {
            if (!in_array($i . '-' . $opt, $used, true)) $avail[] = ['i' => $i, 'opt' => $opt];
        }
    }
    if (empty($avail)) {
        $used = [];
        foreach ($pool as $i => $_) {
            foreach ([1, 2] as $opt) $avail[] = ['i' => $i, 'opt' => $opt];
        }
    }
    $pick = $avail[array_rand($avail)];
    $used[] = $pick['i'] . '-' . $pick['opt'];
    $_SESSION[$sessionKey][$usedKey] = $used;

    $entry = $pool[$pick['i']];
    $pC1 = strpos($entry, ':');
    $pD  = strpos($entry, '-');
    $pC2 = strpos($entry, ':', $pD + 1);
    $w1  = substr($entry, 0, $pC1);
    $d1  = substr($entry, $pC1 + 1, $pD - $pC1 - 1);
    $w2  = substr($entry, $pD + 1, $pC2 - $pD - 1);
    $d2  = substr($entry, $pC2 + 1);

    if ($pick['opt'] == 1) {
        $qword = $w1; $answer = $w2; $targetDef = $d2; $qDef = $d1;
    } else {
        $qword = $w2; $answer = $w1; $targetDef = $d1; $qDef = $d2;
    }

    $_SESSION[$sessionKey]['current'] = [
        'qword'     => $qword,
        'answer'    => $answer,
        'targetDef' => $targetDef,
        'qDef'      => $qDef,
        'lvl'       => $lvl,
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
    'score_top'     => $base . '/math/images/score-top-3.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-3.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .qnote-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 22px 30px;
    max-width: 450px;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
  }
  .qnote-card.qnote-question {
    font-size: 1.35rem;
    line-height: 1.6;
  }
  .homonym-input {
    display: block;
    margin: 24px auto 0;
    text-align: center;
    height: 44px;
    font-size: 1.4rem;
    font-weight: 700;
    color: #0000BB;
    border: 2px solid #b0b0d8;
    border-radius: 10px;
    background: #fff;
    padding: 0 12px;
    box-sizing: border-box;
  }
  .homonym-input:focus { outline: none; border-color: #8080ff; background: #f8f8ff; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['userInput']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>    <div class="qnote-card" style="margin-top:30px;">Our first word is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['qword']); ?>'</strong>, which <?php echo htmlspecialchars($cur['qDef']); ?>. The homonym we're looking for, which <?php echo htmlspecialchars($cur['targetDef']); ?>, is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.</div>
    
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="qnote-card qnote-question" style="margin-top:30px;">Which homonym of the word <strong style="color:#CC0066;">'<?php echo htmlspecialchars($q['qword']); ?>'</strong><br><?php echo htmlspecialchars($q['targetDef']); ?>?</div>
    <?php $inputWidth = max(180, (strlen($q['answer']) + 4) * 16); ?>
    <input type="text" name="answer" class="homonym-input"
           style="width: <?php echo $inputWidth; ?>px;"
           maxlength="<?php echo strlen($q['answer']) + 4; ?>"
           autocomplete="off" autofocus>

    <div style="margin-top:30px;">
        <input type="submit" name="Submit1" value="Submit" style="margin:0 10px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:0 10px;">
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