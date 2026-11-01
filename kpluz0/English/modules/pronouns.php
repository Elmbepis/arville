<?php
// english/modules/pronouns.php
// Substituting Pronouns — fill in the blank with the correct pronoun.
// 7 tiers via (level × grade); tier 1 yields 2 choices, tiers 2–7 yield 4.
// grade from $_SESSION['user_grade'] (0–10).

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
$moduleTitle = 'Substituting Pronouns';
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

// ---- (level, grade) -> tier (1..7) -----------------------------------------
// Legacy:
//   Easy:   grd<=1->1, grd 2-3->2, grd 4-5->3, grd 6-7->4, grd>=8->5
//   Medium: grd<=1->2, grd 2-3->3, grd 4-5->4, grd 6-7->5, grd>=8->6
//   Hard:   grd<=1->3, grd 2-3->4, grd 4-5->5, grd 6-7->6, grd>=8->7
// Modern Hard uses legacy Hard (the harder of Medium/Hard).
function resolve_pronouns_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 1) return 1;
        if ($grd <= 3) return 2;
        if ($grd <= 5) return 3;
        if ($grd <= 7) return 4;
        return 5;
    }
    if ($grd <= 1) return 3;
    if ($grd <= 3) return 4;
    if ($grd <= 5) return 5;
    if ($grd <= 7) return 6;
    return 7;
}

// ---- Name pools ------------------------------------------------------------
$boysEasy = ['Adam','Ben','Bert','Carlo','Chris','Danny','David','Dino','Isaac','Jack','Jacob','James','Jason','Jose','John','Juan','Kevin','Lucas','Luis','Luke','Max','Mike','Nick','Noah','Robert','Ryan','Samuel','Tom','Willie'];
$girlsEasy = ['Amy','Anna','Bella','Beth','Carol','Emma','Eva','Grace','Isabel','Jenny','Jill','Julia','Kathy','Laura','Leila','Leah','Lisa','Mary','Marie','Mina','Nena','Nina','Rita','Sarah','Tina','Vicky'];
$boysHard = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girlsHard = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];

// ---- Sentence banks (raw format: "...=correct7wrong1[8wrong2[9wrong3]]") ---
// Markers: *target+ marks the phrase to substitute; pre-placed ____ marks a
// direct blank. {N1}..{N4} are name placeholders (2 boys, 2 girls per question).
$sentencesByTier = [
    1 => [
        "*{N1}+ is here now.=He7She8",
        "It is *Mary's+ book.=her7his8",
        "I will give it to *{N1}+.=him7her8",
        "{N1} will call *the boys+.=them7him8",
        "{N1} gave *the kite+ away.=it7him8",
        "When will *{N1}+ come home?=he7she8",
        "*{N3}+ went to school.=She7He8",
        "*{N1}+ drove his new car.=He7She8",
        "*{N3}+ walked to the park.=She7He8",
        "*My brother+ went fishing.=He7She8",
        "*My sister+ plays with dolls.=She7He8",
        "*My father+ has many pens.=He7She8",
        "*The chair+ is very dirty.=It7He8",
        "*The children+ are sleeping.=They7We8",
        "*{N3}+ likes flowers.=She7He8",
        "Drink *your apple juice+.=it7them8",
        "I can't look at *{N3}+.=her7she8",
        "____ is raining again.=It7He8",
        "____ is a sunny day.=It7He8",
        "____ is a cold night.=It7He8",
        "____ can sing a song.=I7me8",
        "____ want to go there.=I7me8",
        "____ will read this book.=I7me8",
        "____ will wear these shoes.=I7me8",
        "Please dance with ____.=me7I8",
        "Please give ____ a cookie.=me7I8",
        "Music makes ____ happy.=me7I8",
        "Don't make ____ sad.=me7I8",
        "____ is a good boy.=He7Him8",
        "____ is our brother.=He7Him8",
        "____ wears a nice dress.=She7Her8",
        "____ is my elder sister.=She7Her8",
        "I will play with ____.=him7he8",
        "I will give ____ a ball.=him7he8",
        "I will pray for ____.=her7she8",
        "I will send ____ a letter.=her7she8",
        "This puppy makes ____ happy.=her7she8",
    ],
    2 => [
        "*{N1}+ likes to watch funny movies.=He7She8They9Him",
        "Can you hear *{N1} and me+ talking?=us7them8they9we",
        "*{N3} and I+ love dancing.=We7They8Us9Them",
        "*{N1} and I+ must go there today.=We7They8Us9Them",
        "*{N3} and I+ will stay in this house.=We7They8Us9Them",
        "*{N1} and I+ are from Manila.=We7They8Us9Them",
        "*{N1} and {N3}+ are my friends.=They7We8Us9Them",
        "{N3} can't go with *you and me+.=us7them8we9they",
        "Please call *{N1} and {N3}+ now.=them7they8us9we",
        "*The old computer+ is broken.=It7You8He9She",
        "*{N1} and I+ go to the same school.=We7They8Us9I",
        "Please give it to *{N1} and {N3}+.=them7they8him9her",
        "I know where *the cats+ are hiding.=they7it8you9us",
        "*{N3}+ always listens to my problems.=She7He8It9You",
        "*My friend and I+ went to the market.=We7He8She9They",
        "*{N3}+ swims faster than {N1}.=She7He8You9It",
        "*{N1}+ went to the library today.=He7She8You9It",
        "*My aunt and uncle+ went to the party.=They7We8He9She",
        "*{N1} and {N3}+ dance well together.=They7He8She9We",
        "*My brother and I+ play soccer each day.=We7They8You9He",
        "{N3} played tag with *{N1} and {N2}+.=them7him8her9us",
        "*My mother and father+ like baseball.=They7We8She9He",
        "*The children+ play in the park every day.=They7We8You9Them",
        "Can you please help ____ with my homework?=me7I8you9he",
        "Where have you been? I couldn't find ____.=you7him8her9it",
        "{N1} can't stand. Please help ____ get up.=him7her8them9us",
        "The puppy followed *{N1} and me+.=us7we8them9him",
        "{N3} is sitting next to *{N1}+.=him7her8he9them",
        "{N1} gave the hammer to ____.=me7I8mine9my",
        "{N3} bought these concert tickets for ____.=us7we8ours9our",
        "Please recite another poem for ____.=me7I8mine9my",
        "That pen is *owned by my sister Linda+.=hers7his8her9mine",
        "The red book is *owned by Mr. Gomez+.=his7hers8ours9yours",
        "This cart is *owned by you and me+.=ours7yours8mine9theirs",
        "We should borrow *Manuel's+ umbrella.=his7her8our9their",
        "I really enjoyed watching *Delilah's+ video.=her7his8your9their",
        "Let's go to *Jack and Jill's+ house.=their7his8her9theirs",
        "We paid for that table so it is ____.=ours7our8theirs9hers",
        "She gave this watch to me so it is ____.=mine7yours8hers9his",
        "John brought that hammer so it is ____.=his7hers8yours9mine",
        "I already gave you that toy so it is ____.=yours7hers8his9mine",
        "____ is the color of your new bag?=What7Who8Where9When",
        "____ drew this beautiful picture?=Who7Why8Where9When",
        "____ in Manila will you stay?=Where7What8Who9When",
        "____ is the best time to visit her?=When7Why8Who9Where",
        "____ is the name of your puppy?=What7Who8Where9When",
        "____ spoke to her father?=Who7Why8Where9When",
        "____ in America do your cousins live?=Where7What8Who9When",
        "____ is the best time for our picnic?=When7Why8Who9Where",
    ],
    3 => [
        "The pretty girl looked at ____ in the mirror.=herself7himself8itself9myself",
        "*{N1} and {N2}+ love playing basketball.=They7We8I9Them",
        "Did *you and {N1}+ really invent this new gadget?=you7they8we9yours",
        "*{N1} and {N3}+ are famous doctors in our town.=They7You8We9Us",
        "*My brother and I+ hid the toy under the bed.=We7Us8I9He",
        "*You and I+ must visit {N1} this summer.=We7They8Us9You",
        "*{N1}+ bought two new computers today.=He7She8They9We",
        "*{N3}+ watches two basketball games every day.=She7He8It9Her",
        "*{N1} and his brother+ went on a long vacation.=They7We8He9You",
        "{N1} went to the birthday party with *{N3}+.=her7him8it9she",
        "*{N3}+ made dinner for the whole family.=She7He8It9Her",
        "{N1} is a postman. ____ always carries a large mailbag.=He7She8It9Him",
        "He ____ is his worst critic.=himself7herself8itself9yourself",
        "We are going to that place too. Would you like to go with ____?=us7them8they9we",
        "It's her birthday today, so I bought a present for ____.=her7him8us9them",
        "*His old grandmother+ walks very slowly with a cane.=She7He8It9They",
        "Please return *the pens and pencils+ to that box on his table.=them7they8us9it",
        "*Our cousin {N1}+ just graduated from high school.=He7She8They9It",
        "*Your parents and I+ met at the party last night.=We7They8You9Us",
        "*Their favorite hockey players+ have a game tonight.=They7Theirs8Them9It",
        "This tree will lose all of ____ leaves by October.=its7their8his9her",
        "*Our neighbor's car+ has a very noisy engine.=It7He8She9They",
        "You can have ice cream after you finish ____ dinner.=your7whose8yours9its",
        "The girl asked for some candy before ____ left.=she7he8it9they",
        "{N1} likes to watch *scary movies+ on television.=them7it8they9her",
        "____ kicked the ball so hard that his shoe came off.=He7She8They9It",
        "The car ____ we bought does not run well.=that7whom8who9it",
        "{N1} and ____ go to church together every Sunday.=I7me8us9him",
        "Please perform another number for ____.=us7we8they9I",
        "My mother gave this shirt to me so it is ____.=mine7ours8my9yours",
        "This package has Dave's name on it, so it must be ____.=his7yours8mine9hers",
        "These cute puppies are *owned by Jake and his brother+.=theirs7yours8ours9his",
        "Did you really think that you can get away with ____ misdeeds?=your7yours8her9his",
        "I still couldn't make up ____ mind on which jacket to buy.=my7your8mine9their",
        "That beautiful chess trophy is ____. I won it last year.=mine7ours8my9yours",
        "These lunchboxes are *owned by my brother and me+.=ours7our8my9mine",
    ],
    4 => [
        "*The lady in the red dress+ is the youngest teacher in their school.=She7He8They9It",
        "I want to be mentored by you, so please mentor ____.=me7him8her9it",
        "*You and I+ must find the blankets as soon as possible.=We7They8Us9You",
        "I must order some recipe books for *{N3} and {N4}+ today.=them7us8her9they",
        "Yes, {N1} bought that red shirt yesterday for ____.=himself7herself8yourself9itself",
        "Those people could have just been *{N1} and {N3}+.=them7her8him9us",
        "*The boys+ have improved a lot in math and science.=They7We8You9He",
        "{N1} took *all his brothers and sisters+ to that new ocean park.=them7they8us9their",
        "My friend really hurt ____ when he tripped on the stairs.=himself7herself8yourself9itself",
        "{N3} sent a gift to {N1}. It's ____ way of showing gratitude.=her7his8its9your",
        "I really want to get them a unique gift for ____ silver wedding anniversary.=their7his8her9our",
        "Your new bicycle looks very elegant with all ____ accessories.=its7her8their9his",
        "Our mayor, ____ we admire, visited the poor after the storm.=whom7who8whose9that",
        "*My friend {N3}+ was honored by the principal at the assembly.=She7He8It9Her",
        "*{N1} and {N2}+ just published a book about climate change.=They7Their8Them9He",
        "*{N1} and {N3}+ chose to ride on the fastest vehicle yesterday.=They7Them8We9You",
        "{N3} and {N4} wore *rain coats+ to school yesterday.=them7they8it9her",
        "The person ____ gets the highest score gets the shiny trophy.=who7whom8whose9he",
        "She suddenly found ____ in a dangerous part of that town.=herself7himself8oneself9itself",
        "This is my house, and ____ is his house over there.=that7those8these9this",
        "Here's my bag, so *the bag over there+ is not mine.=that7those8these9this",
        "That car is his, while *the car I'm driving+ is hers.=this7those8these9that",
        "These are guppies. *The fishes over there+ are tetras.=Those7These8That9This",
        "We can not take this bicycle from Luke and Paul because it is ____.=theirs7ours8their9his",
        "Do you know that their car is now ____? I bought it yesterday.=mine7yours8theirs9hers",
        "Joy and Mildred own that factory so the responsibility of running it is ____.=theirs7yours8ours9hers",
        "Since we both used our own money to pay for this car, then it is ____.=ours7yours8mine9theirs",
        "I saw Claire carrying this backpack yesterday, so it must be ____.=hers7yours8mine9his",
        "I will start saving money for that bicycle because I want it to be ____.=mine7yours8hers9his",
        "If you've already given them a down payment, then that property is now ____.=yours7your8theirs9ours",
    ],
    5 => [
        "The careless driver ____ ignored the stop light was penalized with a hefty fine.=who7he8which9whom",
        "{N1} wants to be remembered by {N3}, so I hope {N3} will remember ____.=him7her8them9he",
        "Yes, I think that he ____ should serve this pumpkin pie to his guests.=himself7herself8yourself9itself",
        "Don't you know that only you ____ can make your dreams come true?=yourself7himself8herself9itself",
        "It was he ____ who submitted the technical report to the manager yesterday.=himself7herself8yourself9itself",
        "If you want some sweet strawberries, ____ are on sale at the grocery store today.=they7it8their9them",
        "Their professor, ____ I greatly respect, recently received an award.=whom7who8whose9that",
        "You all know that you boys aren't old enough to go to the mall by ____, don't you?=yourselves7yourself8ourselves9themselves",
        "{N3} confirmed that {N1} had been living all by ____ in that abandoned house.=himself7herself8itself9oneself",
        "That car is definitely ours because ____ is parked in another area of the car park.=theirs7their8your9they",
        "I'm interested to meet this scientist ____ name will be familiar to you.=whose7whom8which9his",
        "{N3} retrieved the old coins from her purse and handed ____ to {N1}.=them7it8her9they",
        "{N3} bought ten ceramic mugs, three of ____ got broken during transit.=which7who8whose9whom",
        "I contacted some old friends, one of ____ seemed interested in my project.=whom7who8whose9which",
        "The dog in that pen looks healthier than *the dog sitting beside me+.=this7those8these9that",
        "These are resistors. *The electronic components on that table+ are capacitors.=Those7These8That9This",
        "Some of these shoes smell because {N3} wears ____ to the barn.=them7it8her9they",
        "The gardeners bought a chainsaw, with ____ they cut up all the logs.=which7whom8whose9what",
        "If you want your employees to be responsible, then you should show ____ confidence in them.=your7my8yours9their",
    ],
    6 => [
        "He was able to win most of the races he joined because of ____ extensive knowledge in racing.=his7him8its9whose",
        "Doubting ____, the man approached the wild beast with extreme caution.=himself7him8herself9yourself",
        "Due to advancements in technology, people will finally be able to buy cars that drive ___.=themselves7itself8myself9yourself",
        "The family ____ house burnt in the fire was immediately given an accommodation at that hotel.=whose7who8whom9that",
        "The opportunity to talk to each other privately didn't offer ____ to them that day.=itself7themselves8yourself9ourselves",
        "Three hundred years ago in Boston, there lived a little boy ____ name was Benjamin Franklin.=whose7whom8who9which",
        "The hunter followed the creatures for quite a distance before losing sight of ____ on the hillside.=them7it8they9that",
        "I was told that one who laughs at ____ will not be laughed at by others.=oneself7himself8herself9itself",
        "{N1} promised to repair the truck's broken fender but we ended up fixing it ____.=ourselves7itself8himself9themselves",
        "You can not use any of these design features in your product because all of these are patented under ____ name.=my7mine8your9its",
        "I contacted a number of candidates, none of ____ showed any interest in my offer.=whom7who8whose9which",
        "They are seated with three other lawyers, none of ____ are particularly interesting.=whom7who8whose9which",
        "{N3} bought five antique magazines, all of ____ were published no later than 1930.=which7who8whose9whom",
        "The astronomers bought an expensive telescope, with ____ they intend to make more discoveries.=which7whom8whose9what",
        "Though ____ was a professional relationship, they nonetheless became as close as siblings.=theirs7their8ours9they",
        "While my story may have already ended, it's very possible that ____ could just be beginning.=yours7your8yourself9you",
    ],
    7 => [
        "{N1} and {N2} are the owners of the company so the decision whether to downsize or not is ____ to make.=theirs7them8their9they",
        "When facts fell into place and past events began making sense, a picture arranged ____ in his mind.=itself7himself8oneself9myself",
        "The radiant alien craft above him suddenly lowered ____ as close to the rocky terrain as it could.=itself7himself8oneself9myself",
        "The first three arrows streaked across the sky and implanted ____ in the monster's chest.=themselves7itself8ourselves9them",
        "We were informed that several members of their group had already availed ____ of alias names to go underground.=themselves7itself8ourselves9theirs",
        "{N1} wondered if this beautiful and compassionate wife of his, ____ he loved so dearly, was really capable of such a deed.=whom7who8whose9which",
        "I sent my recommendation to {N1} and {N3}, both of ____ decided to wait for a few more days before acting on it.=whom7who8whose9which",
        "{N1} presented his team's findings to the board members, none of ____ looked happy at the end of his presentation.=whom7who8whose9which",
        "In their experiment, the subjects were given two options, only one of ____ would produce a reward.=which7who8whose9whom",
        "{N1} will release seven different versions of his mobile app, three of ____ will be sold for under a dollar per download.=which7who8whose9whom",
        "Students in diverse classrooms benefit from collaboration and teamwork with those whose family circumstances are different from ____.=theirs7them8they9their",
        "After the financial crisis, many investors have convinced ____ that all equities are simply too risky.=themselves7itself8ourselves9yourselves",
        "We find ____ confronted with climate change issues that, in some susceptible areas, already appear unstoppable.=ourselves7myself8themselves9yourselves",
        "Incorporating this feature into the chips will make ____ efficient enough for use in battery-powered mobile devices.=them7it8which9they",
        "Although the methods used in their study were different from ____, both studies came to the same conclusion.=ours7theirs8them9our",
        "The ability of children to have a positive view of ____ is impacted by the way they are treated by their parents.=themselves7itself8yourselves9theirs",
    ],
];

// ---- Helpers ---------------------------------------------------------------
function pick_pronoun_item(array $pool, string $sessionKey, int $tier) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = [];
    foreach ($pool as $i => $tpl) if (!in_array($i, $used, true)) $available[$i] = $tpl;
    if (!$available) { $used = []; $available = $pool; }
    if (!$available) return null;
    $keys  = array_keys($available);
    $index = $keys[array_rand($keys)];
    $used[] = $index;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    return $available[$index];
}

function parse_pronoun_choices(string $ansPart, int $numChoices): array {
    $pos7 = strpos($ansPart, '7');
    $ans  = substr($ansPart, 0, $pos7);
    $wrongs = [];
    if ($numChoices >= 4) {
        $pos8 = strpos($ansPart, '8');
        $pos9 = strpos($ansPart, '9');
        if ($pos8 !== false && $pos9 !== false) {
            $wrongs[] = substr($ansPart, $pos7 + 1, $pos8 - $pos7 - 1);
            $wrongs[] = substr($ansPart, $pos8 + 1, $pos9 - $pos8 - 1);
            $wrongs[] = substr($ansPart, $pos9 + 1);
        }
    } else {
        $pos8 = strpos($ansPart, '8');
        $wrongs[] = ($pos8 !== false)
            ? substr($ansPart, $pos7 + 1, $pos8 - $pos7 - 1)
            : substr($ansPart, $pos7 + 1);
    }
    return [$ans, $wrongs];
}

function build_pronoun_question(string $raw, array $boys, array $girls, int $numChoices): array {
    $name1 = $boys[array_rand($boys)];
    $name2 = $name1; $guard = 0;
    while ($name2 === $name1 && $guard++ < 20) $name2 = $boys[array_rand($boys)];
    $name3 = $girls[array_rand($girls)];
    $name4 = $name3; $guard = 0;
    while ($name4 === $name3 && $guard++ < 20) $name4 = $girls[array_rand($girls)];

    $raw = str_replace(['{N1}', '{N2}', '{N3}', '{N4}'], [$name1, $name2, $name3, $name4], $raw);

    $eq      = strpos($raw, '=');
    $sent    = substr($raw, 0, $eq);
    $ansPart = substr($raw, $eq + 1);

    [$ans, $wrongs] = parse_pronoun_choices($ansPart, $numChoices);

    $choices = array_merge([$ans], $wrongs);
    shuffle($choices);

    if (preg_match('/_{2,}/', $sent)) {
        // Pre-placed blank in the template
        $display     = preg_replace('/_{2,}/', '_____', $sent);
        $filled      = preg_replace('/_{2,}/', $ans, $sent);
        $contextHtml = null;
    } else {
        // Marked phrase: *...+
        $display     = preg_replace('/\*.+?\+/', '_____', $sent);
        $filled      = preg_replace('/\*.+?\+/', $ans, $sent);
        $escaped     = htmlspecialchars($sent);
        $contextHtml = preg_replace('/\*(.+?)\+/', '<u><b>$1</b></u>', $escaped);
    }

    return [
        'display' => $display,
        'filled'  => $filled,
        'answer'  => $ans,
        'choices' => $choices,
        'context' => $contextHtml,
    ];
}

/* ---------- flow ---------- */

$tier = resolve_pronouns_tier($lvl, $grd);
$numChoices = ($tier === 1) ? 2 : 4;

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
    $bank = $sentencesByTier[$tier] ?? $sentencesByTier[1];
    $tpl  = pick_pronoun_item($bank, $sessionKey, $tier);
    if ($tpl === null) $tpl = $bank[0];

    $boys  = ($lvl === 'Hard') ? $boysHard  : $boysEasy;
    $girls = ($lvl === 'Hard') ? $girlsHard : $girlsEasy;

    $q = build_pronoun_question($tpl, $boys, $girls, $numChoices);
    $q['lvl']  = $lvl;
    $q['tier'] = $tier;
    $_SESSION[$sessionKey]['current'] = $q;
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
<?php if ($result !== null):
    $cur = $result['cur'];
?>
  <p style="font-size:14pt;color:#666;margin-top:20px;">You chose: <strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong></p>
  <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <div style="margin:20px auto;width:460px;max-width:100%;box-sizing:border-box;padding:18px 26px;
              background:#FFFDF3;border:2px solid #C8B070;border-radius:10px;
              font-family:Arial,sans-serif;font-size:16pt;color:#333;">
    <?php echo htmlspecialchars($cur['filled']); ?>
  </div>
  <?php if (!$result['correct']): ?>
  <p style="font-size:16pt;color:#800080;">
    The correct pronoun is <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>.
  </p>
  <?php endif; ?>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <div style="margin:45px auto 15px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#800080;">
    Fill in the blank with the correct pronoun.
  </div>
  <?php if (!empty($q['context'])): ?>
  <div style="margin:10px auto 0;width:520px;max-width:100%;font-family:Arial,sans-serif;font-size:16pt;color:#cc0066;">
    <?php echo $q['context']; ?>
  </div>
  <?php endif; ?>
  <div style="margin:20px auto;width:460px;max-width:100%;box-sizing:border-box;padding:22px 30px;
              background:#FFFDF3;border:2px solid #C8B070;border-radius:10px;
              font-family:Arial,sans-serif;font-size:19pt;font-weight:700;color:#333;">
    <?php echo htmlspecialchars($q['display']); ?>
  </div>
  <div style="font-size:13pt;color:#555;margin-bottom:12px;">Click on your answer.</div>
  <div style="margin:25px auto;text-align:center;">
<?php
$n        = count($q['choices']);
$maxLen   = max(array_map('strlen', $q['choices']));
$sumLen   = array_sum(array_map('strlen', $q['choices']));
$use2x2   = ($n === 4) && ($maxLen > 7 || $sumLen > 24);

// Per-box width in px — fixed, so every box is identical width
if ($n === 2)      $boxW = 120;   // two narrow boxes, centred
elseif ($use2x2)   $boxW = 200;   // 2x2, roomy
else               $boxW = 110;   // four short choices on one row
?>
<div style="display:flex;flex-wrap:wrap;justify-content:center;
            gap:12px;margin:25px auto;padding:0 8px;
            max-width:520px;box-sizing:border-box;">
  <?php foreach ($q['choices'] as $choice): ?>
    <a href="?ansclick=<?php echo urlencode($choice); ?>"
       style="display:flex;align-items:center;justify-content:center;
              width:<?php echo $boxW; ?>px;min-height:70px;padding:8px 6px;
              box-sizing:border-box;
              border:2px solid #888888;border-radius:8px;background:#fff;
              color:#0000CC;font-size:20pt;font-weight:700;text-align:center;
              text-decoration:none;line-height:1.2;word-break:break-word;">
      <?php echo htmlspecialchars($choice); ?>
    </a>
  <?php endforeach; ?>
</div>  </div>
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