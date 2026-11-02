<?php
// english/modules/sentence-not-sentence.php
// Sentences and Non-Sentences — decide whether a block of text is a complete
// sentence or a non-sentence (fragment).
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 6 content tiers via (level × grade); 2 M/C choices (1×2 grid).
//
// Grade-dependent name pools (preserved verbatim from legacy):
//   grades 0-2 &#8594; simple names (Adam, Ben, Amy, ...)
//   grades 3+  &#8594; standard names (Alexander, Benjamin, Amelia, ...)
//
// Display case: all displayed text is lowercased with trailing punctuation
// removed, matching the legacy note "Proper capitalizations and punctuations
// were intentionally omitted." The student must judge sentence-hood by
// structure, not by capitalization.
//
// Data markers: *... + surrounds the fragment / non-sentence portion of the
// template. The full sentence is the entire template minus markers, minus
// trailing punctuation. Each template yields TWO possible questions (full
// sentence OR fragment), chosen 50/50 at build time — matches legacy
// rand(1,8)<5.
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the sentence box.

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
$moduleTitle = 'Sentences and Non-Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Tier mapping (§4) — legacy Easy / legacy Hard; Medium folded into Hard ----
function resolve_sns_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 3) return 1;
        if ($grd <= 5) return 2;
        if ($grd <= 7) return 3;
        return 4;
    }
    // Hard — legacy Hard formula
    if ($grd <= 3) return 3;
    if ($grd <= 5) return 4;
    if ($grd <= 7) return 5;
    return 6;
}

// ---- Name pools — grade &#8804; 2 uses simple names; else standard ----
$simpleBoys = ['Adam','Ben','Bert','Carlo','Chris','Danny','David','Dino','Isaac',
    'Jack','Jacob','James','Jason','Jose','John','Juan','Kevin','Lucas','Luis','Luke',
    'Max','Mike','Nick','Noah','Robert','Ryan','Samuel','Tom','Willie'];
$simpleGirls = ['Amy','Anna','Bella','Beth','Carol','Emma','Eva','Grace','Isabel',
    'Jenny','Jill','Julia','Kathy','Laura','Leila','Leah','Lisa','Mary','Marie',
    'Mina','Nena','Nina','Rita','Sarah','Tina','Vicky'];
$standardBoys = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos',
    'Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac',
    'Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan',
    'Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas',
    'Noah','Oliver','Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$standardGirls = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty',
    'Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah',
    'Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla',
    'Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi',
    'Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];

// ---- Parser — extract {full, fragment} from a legacy *…+ template ----
function sns_parse(string $raw): ?array {
    $star = strpos($raw, '*');
    $plus = strpos($raw, '+');
    if ($star === false || $plus === false || $plus <= $star) return null;
    $fragment = trim(substr($raw, $star + 1, $plus - $star - 1));
    $fullWithMarkers = str_replace(['*', '+'], '', $raw);
    $full = rtrim($fullWithMarkers, " \t\n\r.,!?;:");
    return ['full' => $full, 'fragment' => $fragment];
}

// ---- Data (§5) — verbatim from legacy (6 tiers) ----
$rawByTier = [
    1 => [
        "{name1} *likes to watch funny movies with me+.",
        "We *will go there today to thank them+.",
        "*{name1} and I go to the+ same school.",
        "{name3} *always listens to her favorite song+.",
        "My friend *went to the market today to buy this+.",
        "*The puppy followed us home and never+ left.",
        "He *knows the title of her favorite movie+.",
        "Do you know *where our white cat is hiding+?",
        "Why did you buy *a car that doesn't run at all+?",
        "Did you try *listening to us sing inside that room+?",
        "*If he's from Manila, where are+ you from?",
        "How did you know *that {name3} is my neighbor+?",
        "Is *that old computer broken again+?",
        "*Since when has {name3} become taller than+ you?",
        "Who *would like to go to the library with us+?",
        "He said he *will help me with my homework+.",
        "{name3} *will buy ten concert tickets for us+.",
        "*Are they going to build a+ new fence?",
        "Just stay *in this house for ten minutes+.",
        "They *will deliver this package to {name1}+.",
        "She *went to the farm to look for your uncle+.",
        "Please recite *another lovely poem for us+.",
        "Replace *the battery of your camera now+.",
        "*Transfer the metal cabinet to+ his room.",
        "We *can work on the assignment together+.",
        "Yipee, {name1} *brought us lots of ice cream+!",
        "Your monkey *really likes playing with my toy+!",
        "Wow, your dog *can walk on its front legs+!",
        "Hurray, we *won the championship this year+!",
        "Yay, I *passed the test without studying+!",
        "My, that dog *is almost as big as a cow+!",
        "Awesome, I *earned a lot of cash today+!",
    ],
    2 => [
        "He *was able to win several marathon races this year+.",
        "The girl *quickly glanced at herself in the mirror+.",
        "You *should inspect the oven first before buying it+.",
        "{name3} *watches two basketball games on television every day+.",
        "*Her favorite basketball players, who are very tall+, will play.",
        "It was *her birthday when she went to the mall to see a movie+.",
        "The mysterious girl *asked for some candy before she left+.",
        "{name1} *likes watching scary vampire movies at night+.",
        "They *are going to donate these clothes to the orphanage+.",
        "*Are you sure that my old phone is better than+ this new one?",
        "Aren't *those children begging in the streets every day+?",
        "I heard that he *is planning to build his own car+.",
        "Do you know *that {name1} and {name2} love playing basketball+?",
        "Who *was with {name3} at the birthday party last Saturday+?",
        "{name1} *is not a policeman nor a fireman in that city+.",
        "I'm sure *that our cousin {name1} graduated from that school+.",
        "Since when have you *started learning to play the violin+?",
        "She *might like to have some popcorn while waiting for him+?",
        "Why do you say *that the house on the hill is haunted+?",
        "Visit {name1} and {name2} *this summer to cheer both of them up+.",
        "*If you want to use this website, just+ register and log in.",
        "You'll find *my pencils and crayons in that box on his table+.",
        "Tell your brother *that I saw him at the concert last night+.",
        "Have *some mango ice cream after you finish your dinner+.",
        "Please perform *another dance number for our guests tonight+.",
        "Start *preparing the roasted chicken for our family dinner+.",
        "Stay hydrated *by drinking a glass of water from time to time+.",
        "It's only *you yourself who can make your dreams come true+.",
        "The hunter *approached the grizzly bear with extreme caution+.",
        "You are *driving me insane with that foolish hobby of yours+.",
        "{name1} is *here to diagnose our broken air conditioner+.",
    ],
    3 => [
        "I just found out *that you were the one who hid my book under the desk+.",
        "The training *made {name1} and his officemates more competent than ever+.",
        "I'm afraid *that our cat has found another home and will never return+.",
        "The stern judge *ruled her out of order, so she immediately calmed down+.",
        "They *have finally proven themselves to be worthy of our trust indeed+.",
        "The entrepreneur *bought each of his researchers a new computer+.",
        "{name1} *took all his brothers and sisters to that new museum today+.",
        "I *really want to get {name3} a puppy for her eleventh birthday+.",
        "*Our hardworking mayor, whom we truly respect,+ visited the volunteers.",
        "My friend {name1} *was congratulated by the governor when they met+.",
        "{name3} *has made the mistake of cutting those curtains too short+.",
        "Does everyone consider *him to be an excellent choice for that position+?",
        "They elected *her to be the new president of their dressmaking club+.",
        "The officers want *{name1} to be in charge of the reforestation project+.",
        "Do you know *that the lady in white sneakers is a stage actress+?",
        "{name3} *even considered buying that odd-looking pink jacket for herself+.",
        "*Now that you've published your suspense novel+, what will you do next?",
        "Would you believe *that his motorcycle was used in that action movie+?",
        "I'd like *to order some pasta for {name1} and {name2} this afternoon+.",
        "She plans *to teach these girls ballet every other day until November+.",
        "Be *sure to choose the best doctor there is for this ailment+.",
        "*If you really want to be rich and famous someday+, start winning today.",
        "Those leather shoes *are really smelly so please don't bring them here+.",
        "Oh, no! My classmate *just tripped on that rock and really hurt himself+!",
        "Wow, your car *looks fantastic with those mind-blowing accessories+!",
        "Hurray, the judges *have declared our team as the champion instead+!",
        "His family *received a box of relief goods from the social workers+.",
        "Wow, I've *never seen such an incredible skateboard stunt before+!",
        "*The careless carpenter who lost the expensive toolbox+ was scolded.",
        "You *must download and run the app installer on your phone first+.",
        "Pick *a dozen red roses that you can arrange into a lovely bouquet+.",
        "You *will never see an old man dunk a basketball like that again+!",
    ],
    4 => [
        "Try *to find a first aid kit that we can use to treat these typhoon victims+.",
        "Some foreign tourists *already consider this sleepy town their second home+.",
        "Their children *enjoyed watching the playful lion cubs at the zoo last week+.",
        "*The television that we've always wanted to buy at the mall+ is on sale today.",
        "*Their brilliant principal, whom I've always respected+, has already retired.",
        "{name3} *retrieved the old photographs from her bag and handed them to {name1}+.",
        "{name3} *bought ten ceramic statues, two of which got broken during transit+.",
        "The dog *sitting beside you looks more menacing than the lion in the cage+.",
        "Is he *the waiter who was assigned to serve the chocolate cake to the guests+?",
        "Are you *familiar with the name of the entomologist who'll be here next week+?",
        "Have you *contacted any of our old friends to invite them to join our project+?",
        "Who told you *that there's an alligator living in that rickety house by the river+?",
        "He *refused to accept their offer to name him the new manager of that branch+.",
        "Do you also think *that this movie script needs to be revised in a major way+?",
        "I'll be sad *when the city's biggest mall finally closes its doors for good+?",
        "You *must submit the technical report to the engineering manager this afternoon+.",
        "She *should tell him to stop wearing these expensive slacks to that oily garage+.",
        "Bring *a chainsaw that's powerful enough to cut down that dying mango tree+.",
        "Pick *a chord progression that you can use to compose the melody of your song+.",
        "{name1} brought *the lionesses and their cubs a huge heap of meat to feast on+.",
        "Yikes, a wild dog *has broken into the aviary and is now chasing the herons+!",
        "I won't forget *his bitter broth, which is one of the worst soups I've ever tasted+!",
        "I hope *that this amazing mobile app of ours will make us millionaires soon+!",
        "{name1}, *who promised to repair these broken windows, didn't come back anymore+.",
        "Have you *seen a Burmese python or an anaconda pounce on a large mammal before+?",
        "This is *absolutely the most mouthwatering serving of pork chops I've ever had+!",
        "I shrieked *when I saw a black snake slither under that huge pile of garbage+.",
    ],
    5 => [
        "Our car, which is *parked on the other side of the street, is still in great condition+.",
        "The general, who *deemed the formidable fortress impregnable, ordered an air assault instead+.",
        "{name1}, after studying *the rare birds for a number of months, packed his bags and went home+.",
        "{name1} *wants to join this association so he's doing his best to prove his worth+.",
        "{name3} found out *that {name1} had been living all by himself in that deserted bungalow+.",
        "The professor, *who will teach us modern writing techniques this afternoon+, is now here.",
        "Our manager *deems our project outdated and unprofitable so he might cancel it soon+.",
        "Have you noticed *that even young children can now teach themselves new programming languages+?",
        "Do you know *why the opportunity to talk to our investors didn't present itself to us yesterday+?",
        "Is it *really true that one who laughs at himself will not be laughed at by others+?",
        "*The owners of that innovative software company, whom I've known for years+, were just here.",
        "*After the entrepreneurs presented their products to the wealthy capitalists+, they inked a deal.",
        "Alas, am I *really doomed to be alone on this desolate island for the rest of my life+?",
        "Assemble *an engineering team to find a more effective solution to this problem as soon as possible+.",
        "Please contact *at least ten candidates, from whom we'll choose our new programmer+.",
        "Sterilize *the laboratory glassware that we'll use to distill these organic chemicals+.",
        "*Add a few drops of vanilla extract to the mixture then stir it vigorously until+ it becomes fluffy.",
        "Submit *a report confirming that the contaminant in this batch of products is mercury+.",
        "Conduct *an experiment to immediately determine the actual source of these harmful impurities+.",
        "Wonderful, we've *just acquired an elegant hilltop property for an unbelievably low price+!",
        "{name1} confronted the bully *when the latter started shouting threats and invectives at us+.",
        "Our boss went ballistic *when he learned that we only sold a hundred books last month+.",
        "Amazing, it was *definitely the most awe-inspiring performance I've ever seen in my life+!",
        "This tsunami *has left them with nothing but the clothes on their back and a story to tell+.",
        "Explain *why the experiment's subjects are being asked to wear this head-mounted camera+.",
        "Never have I seen before *such a huge and heavy acrobat pedalling a unicycle across a wire+!",
    ],
    6 => [
        "It's unfortunate *that his recent traumatic experience has left him feeling confused and frightened+.",
        "The company *unveiled the high-end drones designed to deliver products to customers more efficiently+.",
        "We just hired *a seasoned professor to teach our new engineers the basic concepts of thermodynamics+.",
        "The social workers who *distributed food and medical supplies to the typhoon victims are now tired and weary+.",
        "All the senators who *have agreed to amend the existing laws to make them more effective are being praised+.",
        "We *have been informed that several members of that criminal syndicate have already gone into hiding to elude arrest+.",
        "Students in diverse classrooms *benefit from collaboration and teamwork with those whose family backgrounds are different from theirs+.",
        "Climate change, *which is making weather patterns more erratic and unpredictable, has already driven some species into extinction+.",
        "It's *not wise to build another computer laboratory for the software developers even if the company has the money for it+.",
        "*If the arrows that streaked across the sky and implanted themselves in the savage dragon's chest weren't yours+, whose were they?",
        "Oh my, {name1} *is seated between two very rich and famous technology magnates without even knowing it+!",
        "*Now that our university has bought a more sophisticated scanning electron microscope+, who will use the old one?",
        "*Now that we are confronted with climate change issues that already appear unstoppable+, we need to start working together.",
        "They think *that it is indeed possible to produce at least ten cases of products per hour using this assembly line+.",
        "Do you agree *that we should release your mobile app this week to make it available to the public before the holidays+?",
        "Let's be patient *given the ongoing financial crisis and the fact that investing in equities is quite risky+.",
        "This feature was *incorporated into the chips to make them efficient enough for use in battery-powered mobile devices+.",
        "*If we are able to improve our algorithm to make our drones more stable, powerful, and efficient+, our sales will go up.",
        "Show us the data *so that we can make an informed decision on how to handle the recent customer complaints+.",
        "I can't believe *that the president of the most powerful country in the world regards climate change as a hoax+!",
        "Grrr, I can't stand *seeing these corrupt politicians take advantage of poor families in that despicable manner+!",
    ],
];

// Pre-parse at definition time (§5.1).
$dataByTier = [];
foreach ($rawByTier as $tier => $list) {
    $dataByTier[$tier] = [];
    foreach ($list as $raw) {
        $parsed = sns_parse($raw);
        if ($parsed !== null) $dataByTier[$tier][] = $parsed;
    }
}

// ---- Helpers (§8.4) ----
function sns_box(string $html, int $minHeight = 110): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- Question generation (§6) ----
function build_sns_question(array $dataByTier, string $lvl, int $grd,
                            string $sessionKey, array $boys, array $girls): ?array {
    $tier = resolve_sns_tier($lvl, $grd);
    $pool = $dataByTier[$tier] ?? [];
    if (empty($pool)) return null;

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        $key = "t$tier:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($pool as $i => $item) $available[] = ['key' => "t$tier:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $item = $pool[$pick['idx']];

    $name1 = $boys[array_rand($boys)];
    do { $name2 = $boys[array_rand($boys)]; } while ($name2 === $name1);
    $name3 = $girls[array_rand($girls)];
    do { $name4 = $girls[array_rand($girls)]; } while ($name4 === $name3);

    $repl = ['{name1}', '{name2}', '{name3}', '{name4}'];
    $subs = [$name1, $name2, $name3, $name4];

    $sentence = strtolower(str_replace($repl, $subs, $item['full']));
    $fragment = strtolower(str_replace($repl, $subs, $item['fragment']));

    // 50/50: full sentence vs. fragment (matches legacy rand(1,8)<5).
    if (rand(0, 1) === 0) {
        $display = $sentence;
        $correct = 'sentence';
    } else {
        $display = $fragment;
        $correct = 'non-sentence';
    }

    return [
        'display' => $display,
        'correct' => $correct,
        'choices' => ['sentence', 'non-sentence'],
        'lvl'     => $lvl,
    ];
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) — grade-dependent name pool + tier-1 fallback ----
if ($result === null || isset($_POST['Submit2'])) {
    if ($grd <= 2) {
        $boyPool  = $simpleBoys;
        $girlPool = $simpleGirls;
    } else {
        $boyPool  = $standardBoys;
        $girlPool = $standardGirls;
    }
    $newQ = build_sns_question($dataByTier, $lvl, $grd, $sessionKey, $boyPool, $girlPool);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_sns_question($dataByTier, 'Easy', 0, $sessionKey,
                                       $simpleBoys, $simpleGirls);
        if ($fallback !== null) $_SESSION[$sessionKey]['current'] = $fallback;
    }
}

// ---- Render (§8, §9, §10) ----
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl,
              $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $labelClicked = ($result['clicked'] === 'sentence') ? 'Sentence' : 'Non-sentence';
    if ($cur['correct'] === 'sentence') {
        $explain = 'This is a <strong style="color:#CC0066;">sentence</strong> '
                 . 'because it expresses a complete thought with a subject '
                 . 'and a predicate.';
    } else {
        $explain = 'This is a <strong style="color:#CC0066;">non-sentence</strong> '
                 . 'because it does not express a complete thought - it is a '
                 . 'fragment, not a subject-predicate pair.';
    }
    $displayLen = strlen($cur['display']);
    $displayFont = ($displayLen > 120) ? '15pt' : ($displayLen > 80 ? '16pt' : '17pt');
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($labelClicked); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php sns_box(
      '<div style="width:100%;font-size:' . $displayFont . ';color:#333;line-height:1.6;text-wrap:balance;">'
    . htmlspecialchars($cur['display'])
    . '</div>', 120
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    <?php echo $explain; ?>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null):
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto 20px;max-width:480px;">
    No question could be generated. Please try again.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $displayLen = strlen($q['display']);
    $displayFont = ($displayLen > 120) ? '15pt' : ($displayLen > 80 ? '16pt' : '17pt');
?>
  <div style="margin:35px auto 8px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Is this a <span style="color:#0000CC;">sentence</span> or a <span style="color:#0000CC;">non-sentence</span>?
  </div>
  <div style="font-family:Arial,sans-serif;font-size:12pt;color:#666;max-width:480px;margin:0 auto 16px;line-height:1.4;">
    (Proper capitalization and punctuation were intentionally omitted.)
  </div>
  <?php sns_box(
      '<div style="width:100%;font-size:' . $displayFont . ';color:#333;line-height:1.6;text-wrap:balance;">'
    . htmlspecialchars($q['display'])
    . '</div>', 120
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
    <tr>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode('sentence'); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:180px;max-width:240px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          Sentence
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode('non-sentence'); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:180px;max-width:240px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          Non-sentence
        </a>
      </td>
    </tr>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif;
endif;
?>

<!-- Difficulty radios (§10.4 — Easy / Hard only, 12pt label) -->
<div align="center" style="margin-top:20px;">
  <p style="margin-bottom:0;color:#000080;font:12pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
  <?php foreach ($levels as $l): ?>
    <td align="center">
      <label style="font:9pt Arial,sans-serif;color:#800080;">
        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b>
      </label>
    </td>
  <?php endforeach; ?>
  </tr></table>
</div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>