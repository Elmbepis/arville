<?php
// english/modules/sentences-kinds.php
// Kinds of Sentences — 4 choices in a 2x2 grid.
// Easy level uses Telling/Asking/Commanding/Exclaiming.
// Hard level uses Declarative/Interrogative/Imperative/Exclamatory.

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
$moduleTitle = 'Kinds of Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 5);

$legacyTier = ($grd <= 1) ? 1 : (($grd <= 3) ? 2 : (($grd <= 5) ? 3 : (($grd <= 7) ? 4 : 5)));
if ($lvl === 'Hard') $legacyTier += 2;
$tier = min(7, max(1, $legacyTier));

// Vocabulary driven by level
$kindWords = ($lvl === 'Hard')
    ? [1 => 'declarative', 2 => 'interrogative', 3 => 'imperative', 4 => 'exclamatory']
    : [1 => 'telling',     2 => 'asking',        3 => 'commanding', 4 => 'exclaiming'];

// Name pools (same split the original used: grd<=2 vs grd>2)
$boysEasy  = ['Adam','Ben','Bert','Carlo','Chris','Danny','David','Dino','Isaac','Jack','Jacob','James','Jason','Jose','John','Juan','Kevin','Lucas','Luis','Luke','Max','Mike','Nick','Noah','Robert','Ryan','Samuel','Tom','Willie'];
$girlsEasy = ['Amy','Anna','Bella','Beth','Carol','Emma','Eva','Grace','Isabel','Jenny','Jill','Julia','Kathy','Laura','Leila','Leah','Lisa','Mary','Marie','Mina','Nena','Nina','Rita','Sarah','Tina','Vicky'];
$boysHard  = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girlsHard = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];

$tier1 = [
    '1{name1} is here now.',
    '1It is Mary\'s book.',
    '1I will give it to {name1}.',
    '1{name1} will call the boys.',
    '1My brother went to school.',
    '1{name1} drove his new car.',
    '1My father has many shoes.',
    '1It is a cold night.',
    '1I will send her a letter.',
    '1{name3} wears a nice dress.',
    '2Is it a sunny day?',
    '2Who gave my kite away?',
    '2Whose book is this?',
    '2When will {name1} come home?',
    '2Do you want to go fishing?',
    '2Where are the boys sleeping?',
    '2Are we really going there?',
    '2Is he your brother?',
    '2Is she a good student?',
    '2Why can\'t you look at her?',
    '2Will you play with him?',
    '2Does music make you happy?',
    '2What is your sister doing?',
    '2Will you pass me the ball?',
    '2Am I your favorite uncle?',
    '3Go play with your sister.',
    '3Walk to the park with me.',
    '3Send her some flowers.',
    '3Drink your apple juice.',
    '3Sing one more song.',
    '3Please be good to him.',
    '3Please dance with me.',
    '3Give {name1} a cookie.',
    '3Don\'t make me sad.',
    '3Please wash the clothes.',
    '3Don\'t wear those shoes.',
    '4Ouch, a bee just stung me!',
    '4Wow, that car is very fast!',
    '4Yikes, the dog is chasing us!',
    '4Oh, no! The car hit the barn!',
    '4Grrr, that man took our money!',
    '4Yipee, we\'re going to the zoo!',
    '4Yuck, this tastes really bad!',
    '4Yay, you won first prize!',
    '4Run for your lives!',
];

$tier2 = [
    '1{name1} likes to watch funny movies with me.',
    '1We will go there today to thank them.',
    '1I\'m sorry but {name3} can\'t go with you.',
    '1{name1} and I go to the same school.',
    '1{name3} always listens to her favorite song.',
    '1My friend and I went to the market today.',
    '1{name1} and {name3} dance well together.',
    '1The puppy followed us home and never left.',
    '1He knows the title of her favorite movie.',
    '2Do you know where the cats are hiding?',
    '2Why did you buy a car that doesn\'t run?',
    '2Did you hear us singing inside that room?',
    '2If he\'s from Manila, where are you from?',
    '2How did you know that {name3} is my neighbor?',
    '2Is that old computer broken again?',
    '2Since when has {name3} become taller than you?',
    '2Who would like to go to the library with us?',
    '2Don\'t you get tired playing soccer each day?',
    '2Can you please help me with my homework?',
    '2Did {name3} buy these concert tickets for us?',
    '2Are they going to build a new fence?',
    '3Just stay in this house and wait for us.',
    '3Please call {name1} and {name3} now.',
    '3Kindly deliver this package to {name1}.',
    '3Go to the garden and look for your uncle.',
    '3Please recite another poem for us.',
    '3Replace the battery of your camera now.',
    '3Transfer the metal cabinet to his room.',
    '3Please work on the assignment at once.',
    '3Inspect the oven first before buying it.',
    '4Yipee, {name1} brought us lots of ice cream!',
    '4Ouch, your rowdy monkey pulled my hair!',
    '4Wow, your dog can walk on its front legs!',
    '4Hurray, we won the championship this year!',
    '4Yikes, the grumpy old man has found us!',
    '4Oh, no! That wooden bed is on fire!',
    '4Yay, I passed the test without studying!',
    '4My, that dog is even smaller than a mouse!',
    '4Awesome, I earned a lot of cash today!',
];

$tier3 = [
    '1The attractive girl looked at herself in the mirror.',
    '1Yes, {name1} and {name3} are famous doctors in our town.',
    '1{name3} watches two basketball games on television every day.',
    '1It\'s her birthday today, so I bought a present for her.',
    '1Their favorite basketball players have a game tonight.',
    '1The mysterious girl asked for some candy before she left.',
    '1{name1} likes to watch scary vampire movies at night.',
    '1The repairmen are going to inspect the lighting system.',
    '1They are going to donate these clothes to the orphanage.',
    '2Are you sure that my old phone is better than this new one?',
    '2Aren\'t those children begging in the streets every day?',
    '2Did you and {name1} really invent this new gadget?',
    '2Do you know that {name1} and {name2} love playing basketball?',
    '2Why did you and my brother hide my toy under the bed?',
    '2Who was with {name3} at the birthday party last Saturday?',
    '2{name1} isn\'t a postman, so why does he always carry a mailbag?',
    '2When did our cousin {name1} graduate from that school?',
    '2Since when have you started learning to play the violin?',
    '2Would you like to have some popcorn while waiting for him?',
    '2Why do you say that the house on the hill is haunted?',
    '3Go visit {name1} and {name2} this summer to cheer them up.',
    '3If you want to use this website, just register and log in.',
    '3Be a good son and make dinner for your parents tonight.',
    '3Kindly return the pens and pencils to that box on his table.',
    '3Tell your brother that I saw him at the concert last night.',
    '3Have some mango ice cream after you finish your dinner.',
    '3Please perform another dance number for our guests tonight.',
    '3Start preparing the seafood fried rice for our dinner.',
    '3Stay hydrated by drinking water from time to time.',
    '3Don\'t put that smelly leather jacket on my chair.',
    '4Ouch, your naughty poodle just bit my index finger!',
    '4Yikes, that tree is about to fall on the parked car!',
    '4Grrr, our neighbor\'s noisy truck is driving me crazy!',
    '4Golly, he kicked the ball so hard that even his sock came off!',
    '4Amazing, I sold a hundred boxes of cookies today!',
    '4Fantastic, you finished the project in just two hours!',
    '4Wow, our group sold all the tickets in only one day!',
    '4Incredible, you discovered a new species of fish!',
    '4Hurrah, our own sales team closed the deal of the year!',
];

$tier4 = [
    '1The stern judge ruled her out of order, so she immediately calmed down.',
    '1You will drive me insane if you spend one more centavo on that old car.',
    '1It\'s unfortunate that his failed business has left him feeling defeated.',
    '1Their intensive training made {name1} and his colleagues more competent.',
    '1They have finally proven themselves to be worthy of our trust.',
    '1The entrepreneur bought each of his researchers a new computer.',
    '1{name1} took all his brothers and sisters to that new museum today.',
    '1I really want to get {name1} a unique gift for his fifteenth birthday.',
    '1Our mayor, whom we truly respect, visited the poor after the storm.',
    '1My friend {name1} was congratulated by the governor when they met.',
    '2Do some foreign tourists already consider this town their second home?',
    '2How can {name3} make the mistake of cutting these sleeves too short?',
    '2Does everyone consider him to be an excellent choice for that position?',
    '2Since we are going to that place too, why don\'t you just ride with us?',
    '2Do you know that the lady in the red dress is a math teacher here?',
    '2Why would {name1} buy that funny-looking purple shirt for himself?',
    '2If what you say is true, then where were {name1} and {name3} yesterday?',
    '2Now that you\'ve published your suspense novel, what will you do next?',
    '2If this big house is yours, then whose house is that over there?',
    '2Would you believe that his motorcycle was used in that movie?',
    '3Find the first aid kits as soon as possible and return them to me.',
    '3Kindly order some Chinese food for {name1} and {name2} this afternoon.',
    '3To improve their grades, teach these boys math and science every day.',
    '3Just choose the fastest pick-up truck tomorrow and drive it the ranch.',
    '3If you really want to get that shiny trophy, win the contest tomorrow.',
    '4Oh, no! My friend just tripped on the stairs and really hurt himself!',
    '4Wow, your car looks fantastic with those mind-blowing accessories!',
    '4Crikey, I just saw a long snake slither under that pile of logs!',
    '4Hurray, the board of judges declared our team the champion instead!',
    '4Terrific, our company sold a million books in just one month!',
];

$tier5 = [
    '1Their children enjoyed watching the playful lion cubs at the zoo last week.',
    '1The careless carpenter who lost the toolbox was scolded by his foreman.',
    '1If you want some ripe mangoes, they are on sale at the grocery store today.',
    '1Their principal, whom I greatly respect, recently received a prestigious award.',
    '1{name3} retrieved the old letters from her bag and handed them to {name1}.',
    '1{name3} bought ten crystal bowls, two of which got broken during transit.',
    '1The dog sitting beside you looks more menacing than the lion in the cage.',
    '2Shouldn\'t the waiters serve the chocolate cake to the guests already?',
    '2Don\'t you know that only you yourself can make your dreams come true?',
    '2Whose car is this if ours is parked on the other side of the street?',
    '2Are you familiar with the name of the biologist who\'ll be here next week?',
    '2Have you contacted any of our old friends to invite them to join our project?',
    '2Who told you that there\'s a cougar living in that rickety house on the hill?',
    '2Why didn\'t you accept their offer to name you the new research director?',
    '2Do you also think that this movie script needs to be revised in a major way?',
    '2Have you heard that the city\'s biggest mall will close its doors soon?',
    '3Kindly submit the technical report to the manager this afternoon.',
    '3Please stop wearing these expensive sneakers to that muddy barn.',
    '3Bring a powerful chainsaw tomorrow then cut down that dying mango tree.',
    '3Start with a chord progression then compose the melody of your song from there.',
    '3Download and run the program installation file then follow the instructions.',
    '3Bring the lionesses and their cubs a huge heap of meat to feast on.',
    '4Oh, no! The ferocious stray dogs are attacking our chickens again!',
    '4Wow, I\'ve never seen such an incredible skateboard stunt before!',
    '4Yikes, a fox has broken into the chicken coop and is now chasing the hens!',
    '4Yuck, this smelly chicken broth is the worst soup I\'ve ever tasted!',
    '4Whoopee, this amazing mobile app of ours will make us millionaires!',
];

$tier6 = [
    '1The tired and weary social workers distributed food and medical supplies to the typhoon victims.',
    '1Their high-end drones can now deliver any of their products to their customers more efficiently.',
    '1He was able to win most of the races he joined because of his extensive knowledge in racing.',
    '1Doubting himself, the hunter approached the grizzly bear with extreme caution.',
    '1{name1} wants to join this association so he\'s doing his best to prove his worth.',
    '1{name3} confirmed that {name1} had been living all by himself in that haunted mansion.',
    '1The family whose house burnt in the fire is now under the care of those social workers.',
    '1{name1} promised to repair the van\'s broken headlamp but we ended up fixing it ourselves.',
    '1The literary editor will teach her staff modern writing techniques this afternoon.',
    '2If our manager deems our project outdated and unprofitable, why hasn\'t he cancelled it yet?',
    '2Have you noticed that even young children can now teach themselves new programming languages?',
    '2When will the professor teach his engineering students the concepts of thermodynamics?',
    '2Do you know why the opportunity to talk to our investors didn\'t present itself to us yesterday?',
    '2Is it really true that one who laughs at himself will not be laughed at by others?',
    '2Have the owners of that garment factory already reached a decision on whether to downsize or not?',
    '2After the investigator presented his findings to the fund managers, did any of them offer to resign?',
    '2If {name3} found herself in a dangerous part of this town, would she know what to do to be safe?',
    '2Alas, am I really doomed to be alone on this desolate island for the rest of my life?',
    '2As the new mayor of this city, shouldn\'t you visit the needy and ask them what you can do for them?',
    '3Assemble an engineering team and find a more effective solution to this problem as soon as possible.',
    '3Do not use any of these design features in your product because they are all patented under my name.',
    '3Please contact at least ten candidates and entice the best one to accept our job offer.',
    '3Once you find the flower garden, pick a dozen roses then arrange them into a lovely bouquet.',
    '3Sterilize the laboratory glassware before preparing any of the samples for our experiment.',
    '3Combine the pork belly, soy sauce, and garlic then marinate them for at least one hour.',
    '3Add a few drops of vanilla extract then stir the mixture until it becomes light and fluffy.',
    '3Submit a report confirming that the contaminant in this batch of products is mercury.',
    '4Wow! It\'s my first time to ride a car that drives itself and it just blew me away!',
    '4Oh my, {name1} is seated between two very rich and famous celebrities and he doesn\'t know it!',
    '4Wonderful, we\'ve just acquired a beachfront property for an incredibly low price!',
    '4Crikey, I just saw a hairy tarantula conceal itself inside the pocket of your jacket!',
    '4Grrr, I really want to punch that mean bully every time he treats us like that!',
    '4Wow, I\'ve never seen an old lady lift a barbell as heavy as that before!',
    '4Amazing, it was definitely the most awe-inspiring performance I\'ve ever seen in my life!',
    '4This is absolutely the most mouthwatering serving of pork chops I\'ve had, ever!',
    '4Oh my, the destructive power of this tsunami has left us with nothing in just a matter of minutes!',
];

$tier7 = [
    '1The general deemed the formidable fortress impregnable, so he ordered an air assault instead.',
    '1After a long debate, all the senators have finally agreed to consider the existing laws sufficient.',
    '1If matter and antimatter had originally existed in equal quantities, they would have annihilated each other completely by now.',
    '1The ornithologist followed the rare birds for quite some time before losing sight of them by the river.',
    '1We have just been informed that several members of that criminal syndicate have already gone into hiding to elude arrest.',
    '1I\'ve already sent my proposal to their managing director, so all I can do at this point is wait for a positive response.',
    '1Students in diverse classrooms benefit from collaboration and teamwork with those whose family backgrounds are different from theirs.',
    '1The ability of children to have a positive view of themselves is impacted by the way they are treated by their parents.',
    '2Now that climate change is making weather patterns more erratic and unpredictable, are we prepared for what\'s to come?',
    '2Before the radiant alien craft sped away and disappeared, did anybody see it silently approach our military base?',
    '2The company is well-funded, but why should we build another research laboratory for the new engineers?',
    '2If the arrows that streaked across the sky and implanted themselves in the savage dragon\'s chest weren\'t yours, whose were they?',
    '2Was this beautiful and compassionate wife of his, whom he loved so dearly, really capable of such a deed?',
    '2Now that our university has bought a more sophisticated scanning electron microscope, who will use the old one?',
    '2Since we are now confronted with climate change issues that already appear unstoppable, is it still worth it to pursue this project?',
    '2Given the fact that the methods used in their study were different from ours, did it surprise you that both studies had the same conclusion?',
    '3Produce ten batches of products using this assembly line to prove that it is indeed working.',
    '3Before you start the experiment, explain to the subjects why they are being asked to wear this head-mounted apparatus.',
    '3By the end of this week, release your mobile app in the App Store and make it available for less than a dollar per download.',
    '3Given the ongoing financial crisis, find a way to convince {name1} that all equities are simply too risky.',
    '3Incorporate this feature into the chips to make them efficient enough for use in battery-powered mobile devices.',
    '3Improve the software driving the motors of the new drone to make it more stable, powerful, and efficient.',
    '3Submit a technical report on the reliability of our products so we can make a decision on how to handle the recent field failures.',
    '4Golly, I can\'t believe that the president of the most powerful country in the world regards climate change as a hoax!',
    '4Yikes, the enormous anaconda escaped from the terrarium at the end of the room and is now headed in our direction!',
    '4Wow, never in my life have I yet seen such a huge and heavy acrobat pedalling a unicycle across a wire!',
    '4Oh my, their dog fell off the boat and is now struggling to swim away from the jaws of that menacing shark!',
    '4Grrr, I can\'t stand seeing these corrupt politicians take advantage of poor families in that despicable manner!',
    '4Hurray, the coordinated efforts of medical experts have finally eradicated malaria in our country once and for all!',
];

$banks = [1 => $tier1, 2 => $tier2, 3 => $tier3, 4 => $tier4, 5 => $tier5, 6 => $tier6, 7 => $tier7];

/* ---------- helpers ---------- */

function apply_kind_names($tpl, $boys, $girls) {
    $name1 = $boys[array_rand($boys)];
    $name2 = $name1;
    $guard = 0;
    while ($name2 === $name1 && $guard++ < 20) $name2 = $boys[array_rand($boys)];
    $name3 = $girls[array_rand($girls)];
    return str_replace(['{name1}', '{name2}', '{name3}'], [$name1, $name2, $name3], $tpl);
}

function pick_kind_item($pool, $sessionKey) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $tpl) if (!in_array($i, $used, true)) $available[$i] = $tpl;
    if (!$available) { $used = []; $available = $pool; }
    if (!$available) return null;
    $keys  = array_keys($available);
    $index = $keys[array_rand($keys)];
    $used[] = $index;
    if (count($used) > 300) $used = array_slice($used, -150);
    $_SESSION[$sessionKey]['used'] = $used;
    return $available[$index];
}

/* ---------- flow ---------- */

$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result  = ['correct'=>$isCorrect, 'clicked'=>$clicked, 'cur'=>$cur];
    unset($_SESSION[$sessionKey]['current']);
}
if ($result === null || isset($_POST['Submit2'])) {
    $pool = $banks[$tier] ?? $banks[1];
    $tpl  = pick_kind_item($pool, $sessionKey);
    if ($tpl === null) $tpl = $pool[0];

    $boys  = ($lvl === 'Hard') ? $boysHard  : $boysEasy;
    $girls = ($lvl === 'Hard') ? $girlsHard : $girlsEasy;
    $tpl   = apply_kind_names($tpl, $boys, $girls);

    $kindIdx = (int)substr($tpl, 0, 1);
    $sentence = substr($tpl, 1);

    $_SESSION[$sessionKey]['current'] = [
        'sentence' => $sentence,
        'kind'     => $kindIdx,
        'answer'   => $kindWords[$kindIdx],
        'tier'     => $tier,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// Sentence for display (question view strips punctuation when tier >= 4)
$q_show = '';
$q_show_punct_omitted = false;
if (isset($q) && is_array($q)) {
    $q_show = $q['sentence'];
    if ($q['tier'] >= 4) $q_show = rtrim($q_show, '.!?');
    $q_show_punct_omitted = ($q['tier'] >= 4);
}

// Same width for all four choice boxes, sized to the longest label
$max_label_len = max(array_map('strlen', array_values($kindWords)));
$choice_w = $max_label_len * 12 + 80;   // 12px/char + 80px breathing room

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

$article = fn($w) => (strpos('aeiou', $w[0]) !== false) ? 'an' : 'a';
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $cur_art = $article($cur['answer']);
?>
  <p style="font-size:14pt;color:#666;margin-top:20px;">Your answer: <strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong></p>
  <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <div style="margin:20px auto;width:450px;max-width:100%;box-sizing:border-box;padding:18px 26px;
              background:#FFFDF3;border:2px solid #C8B070;border-radius:10px;
              font-family:Arial,sans-serif;font-size:17pt;color:#333;">
    <?php echo htmlspecialchars($cur['sentence']); ?>
  </div>
  <p style="font-size:16pt;color:#800080;">This is <?php echo $cur_art; ?> <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong> sentence.</p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
  <div style="margin:45px auto 15px;font-family:Arial,sans-serif;font-size:17pt;font-weight:600;color:#800080;">
    What kind of sentence is this?
  </div>
  <?php if ($q_show_punct_omitted): ?>
    <div style="font-size:13pt;color:#555;margin-bottom:12px;">(The punctuation mark was intentionally omitted.)</div>
  <?php endif; ?>
  <div style="margin:20px auto;width:450px;max-width:100%;box-sizing:border-box;padding:22px 30px;
              background:#FFFDF3;border:2px solid #C8B070;border-radius:10px;
              font-family:Arial,sans-serif;font-size:19pt;font-weight:700;color:#333;">
    <?php echo htmlspecialchars($q_show); ?>
  </div>
  <div style="font-size:13pt;color:#555;margin-bottom:14px;">Click on your answer.</div>
  <table border="0" cellspacing="10" cellpadding="0"
         style="margin:0 auto;table-layout:fixed;
                width:<?php echo 2 * $choice_w + 30; ?>px;">
    <tr>
      <td style="width:<?php echo $choice_w; ?>px;padding:4px 0;">
        <a href="?ansclick=<?php echo urlencode($kindWords[1]); ?>"
           style="display:block;width:100%;box-sizing:border-box;padding:14px 0;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-size:18pt;font-weight:700;
                  text-align:center;">
          <?php echo ucfirst($kindWords[1]); ?>
        </a>
      </td>
      <td style="width:<?php echo $choice_w; ?>px;padding:4px 0;">
        <a href="?ansclick=<?php echo urlencode($kindWords[2]); ?>"
           style="display:block;width:100%;box-sizing:border-box;padding:14px 0;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-size:18pt;font-weight:700;
                  text-align:center;">
          <?php echo ucfirst($kindWords[2]); ?>
        </a>
      </td>
    </tr>
    <tr>
      <td style="width:<?php echo $choice_w; ?>px;padding:4px 0;">
        <a href="?ansclick=<?php echo urlencode($kindWords[3]); ?>"
           style="display:block;width:100%;box-sizing:border-box;padding:14px 0;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-size:18pt;font-weight:700;
                  text-align:center;">
          <?php echo ucfirst($kindWords[3]); ?>
        </a>
      </td>
      <td style="width:<?php echo $choice_w; ?>px;padding:4px 0;">
        <a href="?ansclick=<?php echo urlencode($kindWords[4]); ?>"
           style="display:block;width:100%;box-sizing:border-box;padding:14px 0;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-size:18pt;font-weight:700;
                  text-align:center;">
          <?php echo ucfirst($kindWords[4]); ?>
        </a>
      </td>
    </tr>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Verdana,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Verdana,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>