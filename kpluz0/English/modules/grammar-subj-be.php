<?php
// english/modules/grammar-subj-be.php
// Grammar: 'To Be' Verbs in Sentences — click the correct be-verb (am/is/are/was/were/will/will be).
// 16 sentence pools mapped from (level × grade). Legacy had Easy + Medium; modern
// folds legacy Medium into Hard per handover §3.2.
// 4 choices always in a 2×2 grid; correct answer guaranteed to appear.

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
$moduleTitle = "Grammar: 'To Be' Verbs in Sentences";
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

// ---- Tier mapping (§4) ----
// Legacy $arrnum determines the verbosity of the value pools (adj, time expressions).
// Legacy:
//   Easy:   grd<=2&#8594;1, 3-4&#8594;2, 5-6&#8594;3, >=7&#8594;4
//   Medium: grd<=2&#8594;2, 3-4&#8594;3, 5-6&#8594;4, >=7&#8594;5
// Modern uses Easy for Easy, Medium for Hard.
function resolve_gsb_arrnum(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 2) return 1;
        if ($grd <= 4) return 2;
        if ($grd <= 6) return 3;
        return 4;
    }
    if ($grd <= 2) return 2;
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// Legacy sentence-pool selection: 16 distinct pools based on (level, grade).
function resolve_gsb_pool(string $lvl, int $grd): int {
    if ($grd < 0) $grd = 0;
    if ($grd > 10) $grd = 10;
    if ($lvl === 'Easy') {
        if ($grd <= 1) return 1;
        if ($grd == 2) return 3;
        if ($grd == 3) return 5;
        if ($grd == 4) return 7;
        if ($grd == 5) return 9;
        if ($grd == 6 || $grd == 8) return 11;
        if ($grd == 7 || $grd == 9) return 13;
        return 15; // grade 10
    }
    // Hard = legacy Medium
    if ($grd <= 1) return 2;
    if ($grd == 2) return 4;
    if ($grd == 3) return 6;
    if ($grd == 4) return 8;
    if ($grd == 5) return 10;
    if ($grd == 6 || $grd == 8) return 12;
    if ($grd == 7 || $grd == 9) return 14;
    return 16; // grade 10
}

// ---- Value pools (§5) ----
$namePool = ['Adam','Adrian','Alex','Andrew','Angelo','Carlos','Carson','Chris','Daniel','David','Diego','Domeng','Elijah','Ethan','Gabriel','Hayden',
    'Ian','Isaac','Isaiah','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan','Julian','Justin','Kevin','Lucas',
    'Luis','Luke','Matthew','Max','Michael','Nathan','Noah','Oliver','Robert','Ryan','Samuel','Tristan','William',
    'Alyssa','Amelia','Andrea','Anna','Bella','Chloe','Claire','Eliza','Emma','Eva','Evelyn','Gabriela','Grace','Hannah','Isabel','Jasmine',
    'Jocelyn','Jolina','Julia','Kylie','Lauren','Layla','Leah','Lillian','Lydia','Maria','Melanie','Mia','Naomi','Olivia','Sarah','Sophia',
    'Stella','Tina','Victoria'];
$boyPool = ['Alex','Ben','Carlos','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lucas','Luis','Max','Roberto','Samuel','Tomas'];
$girlPool = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];
$surnamePool = ['Cruz','de Guzman','Gomez','Padua','Santos','Reyes','Tolentino','Torres'];
$foodPool = ['vegetables','shrimps','lobsters','pork chops','chicken wings','fish balls','spaghetti','noodles','seafood','burgers','french fries','hotdogs',
    'pasta','squid balls','onion rings','tacos'];
$placePool = ['Batangas','Bohol','Bulacan','Cavite','Cebu','China','Davao','Japan','Laguna','Manila','Malaysia','Palawan','Thailand'];
$vnumPool = ['two','three','four','five','six','several'];
$dayPool = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
$monthPool = ['January','February','March','April','May','June','July','August','September','October','November','December'];

$subjs1a = ['He','She','That man','That woman','He','She','That boy','That girl','He','She'];
$subjs1b = ['uncle','aunt','brother','sister','neighbor','new friend','classmate','schoolmate','cousin','nephew','niece'];
$subjs2a = ['They','Those men','Those women','Those ladies','Their neighbors'];
$subjs2b = ['uncle','aunt','brother','sister','neighbor','friend','classmate','schoolmate','cousin','nephew','niece'];
$possPool = ['My','Your','Our','His','Her','Their'];

$itemPoolEasy = [
    2 => ['bag','book','cart','coin','clock','desk','toy','book','pen'],
    3 => ['marble figurine','wooden table','new bicycle','lawn decor','metal stool','weird painting','large fish tank','toy cabinet','bedroom lamp'],
    4 => ['glass sculpture','rocking chair','shiny desk','wooden dresser','digital clock','ceramic vase','gas stove','tool cabinet','kitchen lamp'],
    5 => ['clay statue','computer table','red scooter','garden decor','metal chair','wood carving','lighting fixture','reptile cage','skateboard','surfboard','filing cabinet'],
];
$itemPoolMedium = [
    2 => ['bucket','hammer','pencil','shirt','shovel','statue'],
    6 => ['rubber pallet','wooden cart','metal tank','ceramic cup','plastic chair','electric drill'],
    7 => ['rubber tire','wooden bucket','metal clamp','ceramic vase','plastic drum','electric bulb'],
    8 => ['rubber mat','wooden crate','metal tub','ceramic figurine','plastic basket','electric stove'],
    9 => ['rubber mallet','wooden barrel','welding machine','ceramic pot','plastic table','electric oven'],
    10 => ['rubber container','wooden planter','metal pipe','ceramic tile','plastic jar','electric fan'],
];

// ---- Sentence pools — verbatim from legacy, using {placeholder} markers ----
$sentencePools = [
    // Pool 1: grd<=1 Easy
    1 => [
        'am>I ___ fond of puppies.',
        'am>I ___ eight years old.',
        'am>I ___ a good singer.',
        'am>I ___ not mad at you.',
        'am>___ I your best friend?',
        'am>___ I funny?',
        'is>{name1} ___ {adj2} person.',
        'is>{name1} ___ here {present}.',
        'is>___ {name1} here {present}?',
        'is>That dog ___ very fat.',
        'is>This ___ my new bag.',
        'is>My sister ___ at home now.',
        'is>It ___ sunny today.',
        'is>Here ___ my kitten.',
        'was>I ___ mad at you last week.',
        'was>I ___ tired last night.',
        'was>{name1} ___ here yesterday.',
        'was>He ___ with me last Monday.',
        'was>She ___ with me last Monday.',
        'was>It ___ raining yesterday.',
        'are>___ you fond of games?',
        'are>___ you there now?',
        'are>___ you my cousin?',
        'are>You ___ my friend.',
        'are>You ___ nice to me.',
        'are>They ___ my brothers.',
        'are>They ___ here now.',
        'are>Here ___ my toys.',
        'were>___ you here yesterday?',
        'were>___ they there last Monday?',
        'were>They ___ away last week.',
        'were>We ___ in Cebu last month.',
        'will>___ you be here tonight?',
        'will>I ___ be there tomorrow.',
        'will>He ___ be happy to help.',
        'will>They ___ be away next week.',
    ],
    // Pool 2: grd<=1 Medium (&#8594; Hard)
    2 => [
        'am>I ___ already in the second grade.',
        'am>___ I tall enough to ride that pony?',
        'am>I ___ old enough to learn karate.',
        'am>___ I old enough to watch that movie?',
        'am>I ___ fond of cute kittens.',
        'is>I think {name1} ___ {adj2} person.',
        'is>It ___ great to see you again.',
        'is>___ there someone there now?',
        'was>{name1} ___ here {past}.',
        'was>___ {name1} there {past}?',
        'was>___ {name1} with you {past}?',
        'was>He ___ very sad last {day}.',
        'are>{name1} says you ___ {adj2} kid.',
        'are>Right now, you ___ not yet ready.',
        'are>{name1} and {name2} ___ my cousins.',
        'are>___ {name1} and {name2} your classmates?',
        'are>These candies ___ for you.',
        'are>All my cousins ___ nice to me.',
        'were>Our neighbors ___ there {past}.',
        'were>They ___ at that place {past}.',
        'were>We ___ very happy last summer.',
        'were>___ my friends here {past}?',
        'will be>I ___ more careful next time.',
        'will be>I ___ with {name1} {future}.',
        'will be>She ___ in {place} {future}.',
        'will be>I ___ home early tonight.',
    ],
    // Pool 3: grd=2 Easy
    3 => [
        'am>{ssubj} said that I ___ {adj2} person.',
        'am>{psubj} say I ___ {adj2} person.',
        'am>I ___ already in the second grade.',
        'am>___ I easy to get along with?',
        'am>___ I a good friend to you?',
        'is>{name1} knows that {name2} ___ {adj2} person.',
        'is>{name1} thinks {name2} ___ {adj2} person.',
        'is>{ssubj} believes {name1} ___ {adj2} person.',
        'is>{psubj} think {name1} ___ {adj2} person.',
        'is>___ there someone in my room now?',
        'is>There ___ now a {item} in that box.',
        'is>___ there a {item} in your bag this time?',
        'was>{name1} ___ here {past} to visit {name2}.',
        'was>{name1} ___ there {past} to buy a {item}.',
        'was>It ___ not my fault that he tripped and fell.',
        'was>This {item} ___ sent to us by {name1}.',
        'was>{name1} ___ here {past} to talk to {name2}.',
        'was>It ___ not my fault that he lost his toy.',
        'are>{ssubj} thinks that you ___ a good dancer.',
        'are>{name1} and {name2} ___ not really my cousins.',
        'are>{name1} and {name2} ___ already in the garden.',
        'are>___ you here to go swimming with us?',
        'are>___ there enough tickets for all of us?',
        'are>{ssubj} thinks that you ___ not ready today.',
        'are>{name1} and {name2} ___ also my classmates.',
        'are>___ you here to play football with us?',
        'are>___ there enough cookies for all the kids?',
        'were>We ___ in Davao with {name1} {past}.',
        'were>Those {itemp} ___ not yet here {past}.',
        'will be>I ___ at the party tonight.',
        'will be>I ___ home very soon.',
        'will be>They ___ in Manila tomorrow.',
        'will be>I ___ at their house very soon.',
        'will be>She ___ here later to play with us.',
    ],
    // Pool 4: grd=2 Medium (&#8594; Hard)
    4 => [
        'am>___ I tall enough to ride that spotted pony?',
        'am>___ I old enough to watch that scary movie?',
        'am>I think I ___ too tall for that little seat.',
        'is>___ there someone in the playground right now?',
        'is>The students think that {name1} ___ a good teacher.',
        'is>His job for now ___ to deliver these {itemp}.',
        'is>Eating candies ___ not good for your health.',
        'is>Most of that apple pie ___ just crust.',
        'is>___ it true that the sun is also a star?',
        'is>Half of this wooden box ___ empty.',
        'is>Don\'t touch that because it ___ hot.',
        'was>___ your dog with you when you saw the snake?',
        'was>{name1} ___ in our store {past} to buy a {item}.',
        'was>She ___ under this tree when the dog chased her.',
        'was>Our adventure last night ___ really exciting.',
        'are>___ you really sure that we\'re in a safe place?',
        'are>I think you ___ not good at this new game.',
        'are>Why ___ you here with your friends?',
        'are>We think that {name1} and {name2} ___ talented artists.',
        'are>{name1} and {name2} ___ my favorite relatives.',
        'were>___ you here {past} to help these flood victims?',
        'were>___ you here {past} to watch their concert?',
        'were>All my cousins ___ happy to see me last Christmas.',
        'were>{name1} and {name2} ___ here when the lights went out.',
        'will be>I ___ more honest with you next time.',
        'will be>We ___ at the Halloween parade next week.',
        'will be>They ___ in our province next Friday.',
        'will be>Your friends ___ glad to see you tonight.',
    ],
    // Pool 5: grd=3 Easy
    5 => [
        'am>I think I ___ too tall for that acting role.',
        'am>I ___ happy to see you working here again!',
        'am>___ I not too old already for that movie?',
        'am>I ___ honored to be invited to this event.',
        'is>The students think that {name1} ___ a great principal.',
        'is>Eating junk food ___ not good for one\'s health.',
        'is>About half of that pie ___ just crust.',
        'is>There ___ a typhoon in Visayas right now.',
        'is>Here ___ the book that you want to borrow.',
        'was>Sitting on a flagpole ___ a fad in the 1920\'s.',
        'was>{girl} ___ not in the mood to go swimming yesterday.',
        'was>{name1} ___ in our store {past} to buy a {item}.',
        'was>It ___ not them who let the goats loose last night.',
        'are>The {itemp} that you ordered ___ already here with me.',
        'are>Is it true that stars ___ just balls of burning gases?',
        'are>Why ___ you here instead of playing with your friends?',
        'are>Please tell the coach that his players ___ already here.',
        'are>Most of my science books ___ inside that wooden cabinet.',
        'were>If {boy} ___ here, he\'d be very happy to see you.',
        'were>If I ___ you, I\'d be hiding under that bed.',
        'were>If I ___ rich, I would buy my parents a house.',
        'were>I wish it ___ Saturday again today.',
        'were>I wish I ___ taller and smarter than {name1}.',
        'will be>It ___ very hard to beat their team tomorrow.',
        'will be>{name1} told me that they ___ in Cavite next week.',
        'will be>I ___ there to cheer for your team this Friday.',
        'will be>The bus ___ here anytime now.',
        'will be>I ___ more careful crossing the street next time.',
    ],
    // Pool 6: grd=3 Medium (&#8594; Hard)
    6 => [
        'am>Who ___ I to say that {name1} is not a worthy opponent?',
        'am>I ___ glad that we have finally solved our difficult problem.',
        'am>I ___ sure that your parents only want what\'s best for you.',
        'am>I ___ no longer in the mood to play games after that argument.',
        'is>I heard that there ___ a severe blizzard in Boston right now.',
        'is>Yes, {name1} ___ now a member of our volleyball team.',
        'is>Why ___ half of the bread in your hand wet and soggy?',
        'is>Half of my jacket ___ red while the other half ___ blue.',
        'was>{boy} ___ not listening when his name was picked last night.',
        'was>I ___ not well enough to go to our meeting yesterday.',
        'was>It ___ raining cats and dogs at the park yesterday.',
        'was>{name1} said that he ___ a really popular actor many years ago.',
        'was>{name1} ___ there when the firemen rescued the trapped dog.',
        'are>About half of the horses in our ranch ___ brown in color.',
        'are>More than half of my classmates ___ older than me.',
        'are>There ___ several reasons why going there is not a good idea.',
        'are>Most of my friends ___ better than me at basketball.',
        'are>Half of those plates ___ now broken because of the earthquake.',
        'were>{name1} and {name2} ___ not yet home when she called last night.',
        'were>{name1} and {name2} ___ at the mall last {day} to watch a movie.',
        'were>{psubj} ___ worried about losing their home two years ago.',
        'were>Horror movies ___ quite popular among teenagers a couple of decades ago.',
        'were>{name1} and {name2} ___ here when those bright lights went out.',
        'will be>I ___ more careful handling those chemicals next time.',
        'will be>I ___ forthright with my best friend next time.',
        'will be>I ___ at the mall next week to attend a toy convention.',
        'will be>Do you know that your favorite band ___ in Manila next month?',
    ],
    // Pool 7: grd=4 Easy
    7 => [
        'am>I think I ___ too heavy for that small pony.',
        'am>I ___ excited to play with you on the same team!',
        'am>___ I not too frail to wrestle with those men?',
        'is>My friends think that {name1} ___ not fit to be our coach.',
        'is>It ___ his responsibility to sell all of these {itemp}.',
        'is>Eating nothing but pastries ___ not good for one\'s health.',
        'is>More than half of that large container ___ empty.',
        'is>His main duty for now ___ to deliver these {itemp}.',
        'was>{boy} ___ not paying attention to the teacher a while ago.',
        'was>{girl} ___ not in the mood to buy a new dress yesterday.',
        'was>{name1} ___ at the library {past} to borrow some books.',
        'was>It ___ not us who ruined that {item} in your mansion.',
        'are>The {itemp} that we ordered online ___ already at the port.',
        'are>Is it true that stars ___ made up of very hot gases?',
        'are>Why ___ you no longer in the mood to play games with us?',
        'are>Please tell the chef that his assistants ___ already here.',
        'were>If {boy} ___ here, he\'d be very delighted to see us.',
        'were>If I ___ you, I\'d apologize to {girl} for saying that.',
        'were>If I ___ rich, I would buy a farm with lots of horses.',
        'were>I wish it ___ Christmas already so we can exchange gifts.',
        'were>Those {itemp} ___ on sale at the mall just last week.',
        'will be>It ___ very difficult to win that contest tomorrow.',
        'will be>{name1} told me that they ___ at their office tonight.',
        'will be>I ___ there this Monday to convince {name1} to stay.',
        'will be>Their driver ___ here anytime now to pick us up.',
    ],
    // Pool 8: grd=4 Medium (&#8594; Hard)
    8 => [
        'am>Who ___ I to say that {name1} is not good enough for our team?',
        'am>I ___ pleased to know that you agree with my point of view.',
        'am>___ I not someone you can trust to help you right now?',
        'is>I\'ve read that there ___ a serious heatwave in Japan right now.',
        'is>Yes, {boy} ___ now the coach of our school\'s basketball team.',
        'is>Do you know why half of your right shoe ___ covered with mud?',
        'was>Playing with dolls ___ her favorite pastime when she was little.',
        'was>I ___ not able to go hiking yesterday because of my swollen foot.',
        'was>I remember that there ___ a thunderstorm when {name1} got lost.',
        'are>About half of the chickens in our farm ___ white in color.',
        'are>More than half of my cousins in the province ___ good swimmers.',
        'are>There ___ several reasons why you shouldn\'t buy that toy.',
        'are>Most of our neighbors ___ workers in that canning factory.',
        'are>Why ___ there a lot more goldfish than angelfish in this aquarium?',
        'were>{name1} and {name2} ___ still at the mall when she called last night.',
        'were>If I ___ in your shoes, I\'d try to befriend everybody here.',
        'were>{boy} and his friends ___ here last month to plant some trees.',
        'were>Why ___ you at the beach last night instead of doing your homework?',
        'will be>I ___ more careful next time feeding these nasty crocodiles.',
        'will be>From now on, I ___ more supportive to people closest to me.',
        'will be>Yes, I ___ at the beach next week for my surfing lessons.',
    ],
    // Pool 9: grd=5 Easy
    9 => [
        'am>Who ___ I to say that {name1} does not deserve that award?',
        'am>I ___ not the kind of person who\'d leave a friend in need.',
        'am>___ I wrong to assume that you\'d rather work by yourself?',
        'is>For {name1}, three kilometers ___ simply too far to walk.',
        'is>The students believe that {name1} ___ a very knowledgeable speaker.',
        'is>His job for now ___ to paint all the {itemp} in our garage.',
        'is>Bullying someone online ___ unacceptable and should not be tolerated.',
        'is>About a third of that overcrowded city ___ below the poverty line.',
        'was>Wearing a hilarious shirt like that ___ a fad in the 1970\'s.',
        'was>{boy} ___ not paying attention when the winner was announced yesterday.',
        'was>{girl} ___ not in the mood to go shopping at the mall last night.',
        'was>{name1} ___ in that factory outlet {past} to look at some {itemp}.',
        'was>It ___ not his intention to cause an accident when he fell asleep.',
        'was>{boy} worked as a waiter when he ___ still a student in Manila.',
        'are>The {itemp} that you ordered online ___ already in our warehouse.',
        'are>About half of the people living in that country ___ unemployed.',
        'are>One third of the children in our class ___ younger than me.',
        'were>{name1} and {name2} ___ at the party last night when the fire broke out.',
        'were>{name1} and {name2} ___ at the mall last {day} to buy {vnum} {itemp}.',
        'were>If {name1} ___ here, you\'d be really sorry you said that.',
        'were>I wish it ___ already Friday afternoon right now.',
        'were>I really wish that I ___ a teenager all over again.',
        'were>If money ___ no object, I\'d go to Europe at least twice a year.',
        'were>___ you here {past} to ensure the completion of our project?',
        'will be>I ___ more cautious in buying a new computer next time.',
        'will be>The package you\'re waiting for ___ here anytime now.',
        'will be>You ___ the laughing stock of the world if you wear that hat.',
    ],
    // Pool 10: grd=5 Medium (&#8594; Hard)
    10 => [
        'am>I ___ pleased to inform you that your housing loan has been approved.',
        'am>___ I not someone you can rely on to help you get out of this mess?',
        'am>Do you know that I ___ still angry at you for not telling me the truth?',
        'am>I am exhausted so I ___ no longer in the mood to stroll around the mall.',
        'is>I think that climate change ___ now affecting every country in the world.',
        'is>I\'ve heard that {girl} ___ now a famous stage actress in London.',
        'is>Do you know that half of my salary ___ not even enough to pay for our rent?',
        'is>Do you know that {name1} ___ now an official member of our computer club?',
        'is>It ___ not safe for us to remain here with all those rowdy people nearby.',
        'is>Do you know that climbing over your neighbor\'s fence ___ against the law?',
        'was>Keeping exotic pets ___ my favorite pastime when I was a teenager.',
        'was>I ___ not able to play in our game last night because of my ankle sprain.',
        'was>I remember that there ___ a power outage when {boy} lost his watch.',
        'was>It ___ I who reported the motorcycle accident to the authorities last night.',
        'are>About half of the children in the playground ___ in red shirts.',
        'are>More than a third of my high school classmates ___ now abroad.',
        'are>There ___ several reasons why you should wear a jacket in this weather.',
        'are>Most of the fishes in my freshwater aquarium ___ mollies or cichlids.',
        'are>Why ___ there a lot more lawyers than doctors in our neighborhood?',
        'are>More than half of these apples ___ rotten and no longer safe to eat.',
        'were>{name1} and {name2} ___ still at the office when they heard the good news.',
        'were>If I ___ in your shoes, I\'d be a professional basketball player.',
        'were>I wish I ___ a millionaire so I can buy a beautiful house and a new car.',
        'were>{boy} and his boss ___ there last December to open a new branch.',
        'were>Why ___ your parents not informed of the PTA meeting yesterday?',
        'will be>I ___ more careful next time in choosing my business partners.',
        'will be>From now on, I ___ more generous to people who have less in life.',
        'will be>Yes, I ___ at a convention next month to promote our products.',
    ],
    // Pool 11: grd=6/8 Easy
    11 => [
        'am>{name1} told me that I ___ fit to be the captain of our basketball team.',
        'am>I ___ really disappointed that only a few people showed up here today.',
        'am>Do you know that I ___ still mad at you for what you did last night?',
        'am>I ___ no longer in the mood to work on our project now that {name1} has left.',
        'am>{name1} told me that I ___ good enough to be the new leader of our soccer team.',
        'is>Do you know that this ___ one of the best {itemp} in the market today?',
        'is>Here ___ the new {item} that I bought from {name1} last {day}.',
        'is>Neither your dogs nor his cat ___ allowed to enter this room right now.',
        'is>Our new governor, as well as some newsmen, ___ expected to arrive shortly.',
        'is>The president, along with some senators, ___ on his way to this press conference.',
        'is>About half of that lake ___ now gone due to the simmering heat of summer.',
        'is>About a third of our apple pie ___ missing and nobody knows what happened.',
        'is>One fourth of that car ___ made up of parts that were designed by Filipinos.',
        'is>Were you informed that {name1} ___ now a member of our computer club?',
        'is>It\'s already dark so it ___ not safe for us to still be in this abandoned shack.',
        'is>Do you know that dumping your garbage on the sidewalk ___ against the law?',
        'was>{girl} was easily frightened by loud sirens when she ___ still in elementary school.',
        'was>The primary suspect, as well as his accomplices, ___ at the crime scene {past}.',
        'was>The chemistry professor, as well as his students, ___ at the awarding ceremony {past}.',
        'was>{boy} invented this phenomenal machine while he ___ an engineer in Silicon Valley.',
        'was>The gadget that you asked me to look for ___ not available at the store yesterday.',
        'was>We were not able to go to the beach yesterday because it ___ raining very hard.',
        'was>I ___ there when the mascot of my favorite basketball team started dancing foolishly.',
        'are>These ___ the {itemp} that I\'ll deliver to our new client this {day}.',
        'are>Neither that suspicious stranger nor these rowdy teenagers ___ welcome here.',
        'are>About half of the students in that school ___ from the city of Makati.',
        'are>A third of the politicians in that city ___ part of a political dynasty.',
        'are>The brave soldiers, as well as their commander, ___ now on the battlefield.',
        'are>There ___ things that I need to do first before going outside to play.',
        'are>All you are giving me right now ___ just excuses for you to go home early.',
        'are>There ___ things that I can not do for you so you need to do them on your own.',
        'were>The automobiles manufactured by their company in the 1960\'s ___ popular back then.',
        'were>His workers ___ worried back then about losing their jobs to younger people.',
        'were>If that huge reward ___ given to me, I\'d spend it all on a sports car.',
        'were>He always wished that he ___ young, handsome, and wealthy like {boy}.',
        'were>If money ___ no object, I\'d start a technology company in Manila.',
        'were>We ___ already there hours before the arena opened its gates to the public.',
        'will be>They ___ our foremost allies the next time we face our archnemeses.',
        'will be>{name1} and {name2} ___ in another city tomorrow to promote their goods.',
    ],
    // Pool 12: grd=6/8 Medium (&#8594; Hard)
    12 => [
        'am>I ___ delighted to inform you that you have passed our entrance test with flying colors.',
        'am>Do you know that I ___ willing to spend a lot of my time to help him finish his research?',
        'am>I ___ really disheartened that our company did not meet its sales quota for this month.',
        'am>I am so tired and sleepy right now so I ___ not inclined to participate in that race.',
        'is>Dr. {name1} {surname}, who is one of our greatest scientists, ___ now here to deliver a speech.',
        'is>Given his physical condition right now, five kilograms ___ way too much for him to carry upstairs.',
        'is>{name1} was informed by his lawyer that ten years ___ the maximum sentence for his crime.',
        'is>The brilliant mathematician, as well as his loyal students, ___ now in that conference room.',
        'is>About a quarter of that enormous wedding cake ___ either inedible or unfit for human consumption.',
        'was>The famous chef, as well as his apprentices, ___ at their new restaurant {vnum} days ago.',
        'was>Neither the directors nor the board chairman ___ worried back then about the future of the company.',
        'was>The principal, along with her teachers, ___ at the auditorium yesterday to check some equipment.',
        'are>Neither General {surname} nor these gallant soldiers ___ capable of addressing this military problem.',
        'are>About a third of the participants in that fund-raising activity ___ either unemployed or underemployed.',
        'are>About a fifth of the recipients of that prestigious award ___ alumni of our university.',
        'are>All the players, as well as their coach, ___ now in the gym for their afternoon practice.',
        'are>I heard that {itemp} such as this ___ still on sale at the mall but stocks are limited.',
        'are>Does it ever bother you that there ___ so many stray animals living in our community?',
        'were>I really wish that it ___ Christmas every day, so that everyone will always be happy.',
        'were>The four lion cubs, as well as the baby elephant, ___ in that safari enclosure last week.',
        'were>We ___ already there hours before the store allowed the excited customers to get in.',
        'will be>I\'m sure that {boy} ___ the talk of the town if he becomes an international boxing champion.',
        'will be>{name1} and {name2} ___ in another town tomorrow to continue advertising their products.',
        'will be>{name1} and {name2} ___ abroad next week to close some international business deals.',
    ],
    // Pool 13: grd=7/9 Easy
    13 => [
        'is>I\'ve read that this ___ one of the best {itemp} being sold today.',
        'is>Here ___ the brand-new {item} that was delivered to me last {day}.',
        'is>Neither those goats nor this cow ___ already big enough to be sold.',
        'is>My cousin, as well as his children, ___ expected to arrive within an hour.',
        'is>The mayor, along with some councilors, ___ already on his way to this meeting.',
        'is>Nearly half of that river ___ now dead because of severe pollution.',
        'is>About three fourths of that wall ___ covered with expensive paintings.',
        'is>Thirty percent of that bus ___ made up of parts that were manufactured locally.',
        'is>It ___ not safe for the children to remain here because of the mosquitoes.',
        'is>Do you know that spreading libelous rumors online ___ now against the law?',
        'was>{girl} was easily startled by barking dogs when she ___ still a little girl.',
        'was>The inventor, as well as his assistants, ___ in that new building {past}.',
        'was>Our science teacher, as well as some of my classmates, ___ at that museum {past}.',
        'was>{boy} invented this vending machine when he ___ still a college student.',
        'was>Choosing to go with them yesterday instead of you ___ a difficult decision for me.',
        'was>We were not able to go to the exhibit last week because there ___ a jeepney strike.',
        'was>Choosing to study engineering instead of music ___ a difficult decision for me.',
        'was>{name1} said that it ___ typhoon Ondoy that wiped out their assets and livelihood.',
        'was>It ___ {boy} and his friends who initiated the melee at the restaurant last night.',
        'are>These ___ the {itemp} that I\'ll ship to our province this {day}.',
        'are>Neither that convicted scammer nor his boisterous accomplices ___ welcome here.',
        'are>About a third of the educators in that university ___ from our barangay.',
        'are>One fifth of the government officials in that city ___ new to politics.',
        'are>The circus performers, as well as their manager, ___ now inside that large tent.',
        'are>About three fourths of the cars in this parking lot ___ more than five years old.',
        'are>There ___ decisions that I can not make for you so you need to make them yourself.',
        'were>The bicycles manufactured by that factory ___ sought-after just a decade ago.',
        'were>In the 1980\'s, even our own employees ___ afraid to use computers.',
        'were>If I ___ the recipient of that huge amount of cash, I\'d buy a big townhouse.',
        'were>{boy} said that he\'d try to be a famous actor if he ___ still young and handsome.',
        'were>If money ___ no object, I\'d buy and operate a resort in Laguna.',
        'were>We ___ already there hours before the store allowed the excited customers to get in.',
        'were>Where ___ you when you heard the awesome news that you finally passed the bar?',
        'will be>They ___ your problem someday if you don\'t train them well.',
        'will be>There ___ a big concert next month so let\'s start saving for it.',
    ],
    // Pool 14: grd=7/9 Medium (&#8594; Hard)
    14 => [
        'is>Mr. {name1} {surname}, who is an excellent aquaculturist, ___ now here to give us some training.',
        'is>Given her new illness, even three kilograms ___ way too much for her to carry around.',
        'is>Four years of college education ___ not even affordable to most parents in our country.',
        'is>The police chief, as well as his senior officers, ___ now in that press conference.',
        'is>It\'s disgusting that about a quarter of that dog\'s fur ___ covered with ticks and fleas.',
        'is>Do you know that {name1} ___ now the new president of our international trading company?',
        'was>The corrupt politician, as well as his underlings, ___ at that infamous hearing {vnum} days ago.',
        'was>Neither the lion cubs nor the lioness ___ scared of the buffaloes when the attack started.',
        'was>The astute software engineer, along with his codevelopers, ___ not able to fix the bug.',
        'are>Neither Dr. {surname} nor the nurses assisting him ___ aware of the impending problem.',
        'are>About a third of the participants in the ongoing badminton tournament ___ in white jogging pants.',
        'are>About a fifth of the exotic birds in that colossal aviary ___ classified as large parrots.',
        'are>All the volunteers, as well as Dr. {surname}, ___ now in that clinic for their medical mission today.',
        'are>This flyer says that {itemp} such as this ___ currently on sale at that home improvement store.',
        'were>Neither the entrepreneur nor his trusted employees ___ surprised when their sales dropped.',
        'were>Neither the beluga whale nor the dolphins ___ in their respective paddocks when I arrived.',
        'were>If it ___ Christmas every day, everyone would soon run out of money for gift giving.',
        'were>We ___ already in the last phase of our science experiment when the chemical explosion happened.',
        'were>If today ___ my birthday, we\'d be eating in a fancy sushi restaurant with unlimited drinks.',
        'were>Three Picasso paintings, as well as a Michaelangelo sculpture, ___ on display there last week.',
    ],
    // Pool 15: grd=10 Easy
    15 => [
        'am>I ___ indeed very disappointed right now that only a handful of people attended our conference today.',
        'is>Dr. {name1} {surname}, one of the pillars of our great company, ___ now here to address all of our employees.',
        'is>Dr. {name1} {surname}, who is one of our greatest neurosurgeons, ___ now here to receive an excellence award.',
        'is>Given the size of the {surname} family, ten kilograms of rice ___ not enough for them to live on for two weeks.',
        'is>Did you notice that about a quarter of that 20-inch pizza pie ___ bereft of vegetable and meat toppings?',
        'is>According to Professor {surname}, about a quarter of that lake ___ already under threat from invasive species.',
        'was>Their enormous English mastiff, as well as her playful puppies, ___ on their neighbor\'s lawn just {vnum} hours ago.',
        'was>The investigator confirmed that the crime boss, as well as his underlings, ___ at their hideout in Laguna {vnum} days ago.',
        'was>A year ago, neither the department managers nor their general manager ___ optimistic about the future of their company.',
        'was>The head coach, along with his players, ___ in the corporate gym yesterday to come up with a winning game plan.',
        'was>Neither the mayors nor the governor ___ concerned at that time about the ramifications of their hasty decision.',
        'are>More than eighty percent of the people lining up for these food stamps ___ either homeless or living alone.',
        'are>All the dancers, as well as their choreographer, ___ now in our dance studio for another round of rehearsals.',
        'are>Five cubic meters of sand and twenty bags of cement ___ already enough for the construction project you\'re planning.',
        'are>The ten sacks of rice that we\'ve allocated for charity ___ now on the pickup truck and ready for delivery.',
        'are>Two teaspoons of milk and a spoon of sugar ___ enough to make this chocolate beverage of mine enjoyable to drink.',
        'are>All of our school\'s stage play actors, as well as their director, ___ now in that theater for their dress rehearsal.',
        'were>I really wish that it ___ still summer, so that I can go scuba diving or snorkeling in warm waters every weekend.',
        'were>Neither the lone volcanologist nor the geologists with her ___ prepared when the volcano suddenly erupted yesterday.',
        'were>Neither the physicist nor his trusted research assistants ___ aware back then of that mathematical error.',
        'were>If {name1} ___ one of the new Nobel prize awardees, {girl} would be the proudest wife in the world right now.',
        'will be>There ___ many changes in how things are conducted around here once the new governor sits in office.',
    ],
    // Pool 16: grd=10 Medium (&#8594; Hard)
    16 => [
        'is>The convicted felon was disheartened to find out that ten years ___ the minimum sentence for the crime he committed.',
        'is>The brilliant physicist, along with his hardworking assistants, ___ now in the laboratory to finish their experiment.',
        'is>Including the helpers, there are ten people living here, so twenty kilograms of rice per month ___ not enough for us to live on.',
        'is>Even just two years of prison time ___ already unthinkable for {name1} who has never had a brush with the law before.',
        'is>The contractor, along with his construction workers, ___ now at the site to start laying down the building\'s foundation.',
        'was>The investigation showed that the notorious criminal, as well as his accomplices, ___ in an abandoned building in Cavite {vnum} days ago.',
        'was>Only a year ago, neither the store clerks nor their store manager ___ mindful of the pandemic that would later eliminate their jobs.',
        'was>The medical director, as well as his doctors, ___ in the parking lot yesterday to check the makeshift hospital for COVID patients.',
        'was>Neither the mayors nor the governor of our province ___ aware at that time that their decision would result in joblessness.',
        'are>More than seventy percent of the unemployed people lining up for those jobs ___ either too old or too unhealthy to work.',
        'are>Neither Mrs. {surname} nor her sales supervisors ___ satisfied with the trend being shown by their running sales data.',
        'are>Based on his assessment, only twenty percent of the engineering students in that university ___ capable of obtaining a scholarship.',
        'are>Neither Mr. {surname} nor his employees ___ confident of being able to settle their differences on the negotiating table.',
        'are>A little less than half of the African lovebirds in their aviary ___ very expensive because they exhibit rare mutations.',
        'were>It would be fun for us if the Philippines ___ a polar country, because then we\'d have lots of ice and snow all year round.',
        'were>If you ___ in her shoes, you\'d also feel obligated to sell your car just to be able to pay your mother\'s hospital bills.',
        'were>Neither the professor nor his researchers ___ aware back then that their project was terminated due to political reasons.',
    ],
];

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function gsb_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 220): int {
    $charPx          = 11;  // Arial 17pt &#8776; 11px/char
    $horizontalSpace = 40;
    $plain           = trim(strip_tags($html));
    if ($plain === '') return $minWidthPx;

    $charsPerLine = max(1, (int)floor(($maxWidthPx - $horizontalSpace) / $charPx));
    $words   = preg_split('/\s+/', $plain);
    $lines   = [];
    $current = '';
    foreach ($words as $w) {
        $candidate = $current === '' ? $w : "$current $w";
        if (strlen($candidate) > $charsPerLine && $current !== '') {
            $lines[] = $current;
            $current = $w;
        } else {
            $current = $candidate;
        }
    }
    if ($current !== '') $lines[] = $current;
    $longest = max(array_map('strlen', $lines));
    return max($minWidthPx, min($maxWidthPx, $longest * $charPx + $horizontalSpace));
}

function gsb_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
    $sizing = ($widthPx > 0)
        ? 'width:' . $widthPx . 'px;max-width:100%;'
        : 'max-width:480px;';
    echo '<div style="' . $sizing
       . 'min-height:' . $minHeight . 'px;margin:16px auto 10px;padding:12px 20px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function gsb_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function gsb_roll_values(int $arrnum, int $grd): array {
    global $namePool, $boyPool, $girlPool, $surnamePool, $foodPool, $placePool,
           $vnumPool, $dayPool, $monthPool, $subjs1a, $subjs1b, $subjs2a, $subjs2b,
           $possPool, $itemPoolEasy, $itemPoolMedium;

    // Names
    $name1 = $namePool[array_rand($namePool)];
    $name2 = $name1;
    $guard = 0;
    while ($name2 === $name1 && $guard++ < 20) $name2 = $namePool[array_rand($namePool)];

    // Boy / girl / surname
    $boy     = $boyPool[array_rand($boyPool)];
    $girl    = $girlPool[array_rand($girlPool)];
    $surname = $surnamePool[array_rand($surnamePool)];

    // Subjects — singular
    if (rand(0,1) === 1) {
        $ssubj = $subjs1a[array_rand($subjs1a)];
    } else {
        $ssubj = $possPool[array_rand($possPool)] . ' ' . $subjs1b[array_rand($subjs1b)];
    }
    // Subjects — plural
    if (rand(0,1) === 1) {
        $psubj = $subjs2a[array_rand($subjs2a)];
    } else {
        $psubj = $possPool[array_rand($possPool)] . ' ' . $subjs2b[array_rand($subjs2b)] . 's';
    }

    // Adjective (arrnum-scaled)
    if ($arrnum <= 2) {
        $adjs = ['brave','clever','famous','funny','gentle','great','good','goofy','happy','lucky','jolly','nice','polite','shy','smart','sweet'];
    } elseif ($arrnum == 3) {
        $adjs = ['adorable','cheerful','forgetful','friendly','hardworking','helpful','honest','likeable','wealthy'];
    } else {
        $adjs = ['admirable','adventurous','ambitious','attractive','confident','courageous','delightful','energetic','incredible',
            'industrious','intelligent','marvelous','mysterious','remarkable','respectable','terrific','thoughtful','wonderful'];
    }
    $adj1 = $adjs[array_rand($adjs)];
    $article = in_array(substr($adj1, 0, 1), ['a','e','i','o','u'], true) ? 'an' : 'a';
    $adj2 = $article . ' ' . $adj1;

    // Present / past / future time expressions
    $presents = ($arrnum <= 3) ? ['right now','now'] : ['right now','at this moment','right this minute','now','this very minute'];
    $present = $presents[array_rand($presents)];

    $vnum = $vnumPool[array_rand($vnumPool)];

    $pasts = ($arrnum <= 3)
        ? ['yesterday','last night','last week','last month','last year']
        : ['yesterday','last night','last week','last month','last year',
           "$vnum hours ago","$vnum days ago","$vnum weeks ago","$vnum months ago",
           'a few weeks ago','several months ago'];
    $past = $pasts[array_rand($pasts)];

    $futures = ($arrnum < 3)
        ? ['tonight','tomorrow','this evening','later']
        : ['tonight','tomorrow','this evening','the day after tomorrow','two days from now','a week from now',
           'in a few days','within the next three days','a few days from now','several hours from now',
           'hours from now','within the next few hours','within days','within weeks','later'];
    $future = $futures[array_rand($futures)];

    // Item
    if ($grd == 2 && $arrnum <= 1)        $itemSource = $itemPoolEasy[2];
    elseif ($grd == 3 && $arrnum <= 2)    $itemSource = $itemPoolEasy[3];
    elseif ($grd == 4 && $arrnum <= 3)    $itemSource = $itemPoolEasy[4];
    elseif ($grd == 5 && $arrnum <= 4)    $itemSource = $itemPoolEasy[5];
    elseif (isset($itemPoolMedium[$grd])) $itemSource = $itemPoolMedium[$grd];
    else                                  $itemSource = ['object','item','thing'];
    $item  = $itemSource[array_rand($itemSource)];
    $itemp = $item . 's';

    return [
        'name1'   => $name1,
        'name2'   => $name2,
        'boy'     => $boy,
        'girl'    => $girl,
        'surname' => $surname,
        'ssubj'   => $ssubj,
        'psubj'   => $psubj,
        'adj2'    => $adj2,
        'present' => $present,
        'past'    => $past,
        'future'  => $future,
        'item'    => $item,
        'itemp'   => $itemp,
        'vnum'    => $vnum,
        'day'     => $dayPool[array_rand($dayPool)],
        'month'   => $monthPool[array_rand($monthPool)],
        'food'    => $foodPool[array_rand($foodPool)],
        'place'   => $placePool[array_rand($placePool)],
    ];
}

function gsb_parse(string $raw): array {
    $pos = strpos($raw, '>');
    return [
        'answer'   => substr($raw, 0, $pos),
        'sentence' => substr($raw, $pos + 1),
    ];
}

function gsb_pick_question(array $pool, string $sessionKey, int $poolId, int $arrnum, int $grd): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $raw) {
        if (!in_array("p$poolId:$i", $used, true)) $available[$i] = $raw;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "p$poolId:") !== 0));
        foreach ($pool as $i => $raw) $available[$i] = $raw;
    }
    $idx  = array_rand($available);
    $raw  = $available[$idx];
    $used[] = "p$poolId:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = gsb_parse($raw);
    $values = gsb_roll_values($arrnum, $grd);
    $sentence = gsb_apply_placeholders($parsed['sentence'], $values);
    return ['answer' => $parsed['answer'], 'sentence' => $sentence];
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $poolId = resolve_gsb_pool($lvl, $grd);
    $arrnum = resolve_gsb_arrnum($lvl, $grd);
    $pool   = $sentencePools[$poolId] ?? $sentencePools[1];

    $pick = gsb_pick_question($pool, $sessionKey, $poolId, $arrnum, $grd);
    $answer   = $pick['answer'];
    $sentence = $pick['sentence'];

    // Build 4 choices: correct answer + 3 distractors from all be-verbs
    $allBeVerbs = ['am', 'is', 'are', 'was', 'were', 'will', 'will be'];
    $distractors = array_values(array_filter($allBeVerbs, fn($v) => $v !== $answer));
    shuffle($distractors);
    $choices = array_merge([$answer], array_slice($distractors, 0, 3));
    shuffle($choices);

    // Capitalize all choices + answer if blank at sentence start
    if (substr($sentence, 0, 2) === '__') {
        $choices = array_map('ucfirst', $choices);
        $answer  = ucfirst($answer);
    }

    $_SESSION[$sessionKey]['current'] = [
        'sentence' => $sentence,
        'answer'   => $answer,
        'choices'  => $choices,
        'lvl'      => $lvl,
        'pool'     => $poolId,
    ];
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $answerEsc = htmlspecialchars($cur['answer']);
    // Replace the ___ blank with the highlighted answer
    $filledEsc = str_replace(
        '___',
        '<strong style="color:#CC0066;">' . $answerEsc . '</strong>',
        htmlspecialchars($cur['sentence'])
    );
    $boxW = gsb_compute_width($filledEsc);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php gsb_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $filledEsc
    . '</div>'
  , 80, $boxW); ?>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
    $boxW = gsb_compute_width($sentenceEsc);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the correct <span style="color:#CC0066;">'to be'</span> verb below.
  </div>
  <?php gsb_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $sentenceEsc
    . '</div>'
  , 80, $boxW); ?>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:20px auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:150px;max-width:220px;min-height:60px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="display:block;margin:25px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0" style="margin:0 auto;"><tr>
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