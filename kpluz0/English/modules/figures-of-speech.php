<?php
// english/modules/figures-of-speech.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a sentence; student identifies which figure of speech it uses.
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Legacy had 3 levels with distinct content pools. Modern:
//     Easy &#8594; legacy Easy config
//     Hard &#8594; 50/50 pick between legacy Medium config and legacy Hard config
//   This preserves every legacy tier's content pool AND answer range exactly
//   (Medium configuration &#8800; Hard configuration in choice-pool size).
//
// Grade-keyed config (§10) — four bands × three internal configs:
//   grd 0-4, 5-6, 7, 8-10. Each (band, internal) resolves to arrnum (content
//   difficulty 0-8) + ansopt_max (answer range 1-9) + choice pool.
//
// Content tiers derived from arrnum:
//   arrnum < 5     &#8594; 'beginner'
//   arrnum 5-6     &#8594; 'intermediate'
//   arrnum 7-8     &#8594; 'advanced'
//
// Figures: hyperbole, metaphor, simile, personification, onomatopoeia,
// oxymoron, alliteration, antithesis, euphemism.
//
// Placeholders rolled per question: XX (subject: name or pronoun), X2X
// (second name), X3X (third name), XFOOD, XTHING, XANIMAL, XPLACE, XSUBJECT.
// Legacy had $name1/$name2 inline in bank entries; converted to X3X/X2X to
// preserve per-question re-rolling.
//
// Data preservation: every entry from legacy's $qs arrays kept verbatim.
// Two dead branches in legacy (ansopt==10 anaphora, ansopt==11 understatement)
// never reached because ansopt caps at 9 in every code path — omitted.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
//
// Theme: ex-26-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'figures-of-speech.php'

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

$moduleTitle = 'Figures of Speech';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Resolve (level, grade) &#8594; internal config
// ============================================================
if ($lvl === 'Easy') {
    $internal = 'easy';
} else {
    $internal = (rand(1, 2) === 1) ? 'medium' : 'hard';
}

if ($grd <= 4) {
    if ($internal === 'easy') {
        $arrnum = min($grd, 8);  $ansoptMax = 4;
        $pool = ['metaphor','hyperbole','simile','personification'];
    } elseif ($internal === 'medium') {
        $arrnum = min($grd + 1, 8);  $ansoptMax = 4;
        $pool = ['metaphor','hyperbole','simile','personification'];
    } else {
        $arrnum = min($grd + 2, 8);  $ansoptMax = 5;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia'];
    }
} elseif ($grd <= 6) {
    if ($internal === 'easy') {
        $arrnum = $grd;  $ansoptMax = 4;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia'];
    } elseif ($internal === 'medium') {
        $arrnum = $grd + 1;  $ansoptMax = 5;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia','oxymoron'];
    } else {
        $arrnum = $grd + 2;  $ansoptMax = 7;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia','oxymoron','alliteration','antithesis'];
    }
} elseif ($grd === 7) {
    if ($internal === 'easy') {
        $arrnum = 7;  $ansoptMax = 5;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia','oxymoron'];
    } elseif ($internal === 'medium') {
        $arrnum = 8;  $ansoptMax = 7;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia','oxymoron','alliteration','antithesis'];
    } else {
        $arrnum = 8;  $ansoptMax = 8;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia','oxymoron','alliteration','antithesis','euphemism'];
    }
} else {   // grd 8-10
    if ($internal === 'easy') {
        $arrnum = 8;  $ansoptMax = 6;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia','oxymoron','alliteration'];
    } elseif ($internal === 'medium') {
        $arrnum = 8;  $ansoptMax = 8;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia','oxymoron','alliteration','antithesis','euphemism','pun'];
    } else {
        $arrnum = 8;  $ansoptMax = 9;
        $pool = ['metaphor','hyperbole','simile','personification','onomatopoeia','oxymoron','alliteration','antithesis','euphemism','pun','understatement'];
    }
}

// Content tier
if ($arrnum < 5)      $contentTier = 'beginner';
elseif ($arrnum <= 6) $contentTier = 'intermediate';
else                  $contentTier = 'advanced';

// ansopt &#8594; figure name mapping (matches legacy's if-chain)
$figureByAnsopt = [
    1 => 'hyperbole',
    2 => 'metaphor',
    3 => 'simile',
    4 => 'personification',
    5 => 'onomatopoeia',
    6 => 'oxymoron',
    7 => 'alliteration',
    8 => 'antithesis',
    9 => 'euphemism',
];

// ============================================================
// Content bank — figure => tier => items
// ============================================================
$euphemismItems = [
    "XX is sorry to hear that X2X has already passed away",
    "X2X and X3X silently prayed for their departed friend",
    "X2X and X3X are differently abled, yet they've already accomplished so much",
    "Because of that error, the manager had no choice but to let X2X go",
    "The XANIMAL was sick and suffering, so XX had it put to sleep",
    "XX believes that being big-boned is nothing to be ashamed of",
    "XX heard that X2X is currently in between jobs",
    "XX may be vertically challenged, but their team will likely win the game",
    "X2X had to find a special school for their son who is mentally challenged",
    "Buying a pre-loved car instead of a brand-new one is better for you",
    "Their company had to resort to downsizing to become profitable again",
    "XX kicked the bucket very peacefully",
];

$figureContent = [
    'hyperbole' => [
        'beginner' => [
            "XX is heavier than a whale",
            "Your XTHING weighs a ton!",
            "XX is older than Rizal",
            "XX is probably dying of shame",
            "XX has a million problems right now",
            "I've told you a million times",
            "I have a million things to do",
            "XX has a ton of homework to do",
            "This car is faster than light",
            "This car cost X3X a million dollars",
            "That joke is a million years old",
            "XX has saved tons of money in that piggy bank",
            "His brain is smaller than a pea",
            "His mouth is larger than my house",
            "XX is poorer than a mouse",
        ],
        'intermediate' => [
            "XX is probably dying of shame because of what happened",
            "XX has a billion ways to solve that problem",
            "I've reminded you about it a thousand times",
            "I've heard that joke a million times already",
            "XX had to walk a thousand miles to reach my place",
            "I'll die if I miss their upcoming concert",
            "XX has already saved tons of money by using this cheaper brand",
            "I ran a hundred miles per hour just to be on time",
            "There's a spider in our room that's larger than our dog",
            "XX was carrying a backpack that was heavier than a tank",
        ],
        'advanced' => [
            "XX is certainly dying of shame because of that scandalous incident",
            "XX will use a million tricks to convince X2X to invest in his company",
            "By buying this cheaper alternative instead, XX was able to save tons of money last year",
            "XX bought an electric car than runs faster than a speeding bullet",
            "Your joke is so old that there were still dinosaurs when I first heard it",
            "The tarantulas in his biology experiment are larger than my bulldog",
            "The lead physicist of that institute is older than a mesosaur fossil",
        ],
    ],
    'metaphor' => [
        'beginner' => [
            "Life is a roller coaster",
            "Life is a journey",
            "That classroom is a zoo",
            "XX is a walking encyclopedia",
            "XX is a walking dictionary",
            "She is the light of my life",
            "You are the apple of my eye",
            "The snow is a white blanket",
            "The world is a stage",
            "The pond near their house is a mirror",
            "The stars tonight are diamonds",
            "The sun is a golden ball",
            "That lawn is a green carpet",
        ],
        'intermediate' => [
            "She thinks that life is one big fashion show",
            "To many people, XX is just a rolling stone",
            "His bedroom is a disaster area",
            "To X2X, XX is an angel from heaven",
            "X2X and X3X are on a rollercoaster of emotions right now",
            "X2X said that their home is a prison",
            "XX is a shining star in that company",
            "His room is an oven during summer",
            "X2X mentioned that X3X is a night owl",
            "Her long hair was a flowing golden river",
            "XX is a walking calculator so he'll be really useful to us",
            "XX is the guiding light of those children",
            "They always say that laughter is the music of the soul",
            "To X3X, life is just a game of chess",
            "The wind last night was an angry witch",
            "The basketball coach of that school is an ogre",
        ],
        'advanced' => [
            "The promise that XX gave them is a delicate flower",
            "His plan to get into college is a house of cards on a crooked table",
            "The computer and cellphone that XX showed X2X are ancient dinosaurs",
            "XX is a snake for doing that to a good person like X2X",
            "The hunter panicked when he saw the alligator, which was showing teeth that are white daggers",
            "When I was still employed by their company, our boss was a fiery dragon",
            "The detective's face was wood as he interrogated X3X",
            "To that biologist, this vast savanna is a wonderful playground",
            "The lovely ballerina was a swan gliding across that stage",
            "To X2X, the president's insulting words were missiles",
            "Her cold rejection of his request was a dagger through his heart",
        ],
    ],
    'simile' => [
        'beginner' => [
            "Our soldiers are as brave as lions",
            "Her lips are red like a rose",
            "XX is as cunning as a fox",
            "XX eats like a bird",
            "XX is as cute as a kitten",
            "Your XTHING is as light as a feather",
            "XX is as sweet as sugar",
            "XX is as tall as a giraffe",
            "XX is as skinny as a stick",
            "XX is as blind as a bat",
            "Life is like a box of chocolates",
            "This bag is as tough as nails",
        ],
        'intermediate' => [
            "XX is worried because X2X is already as thin as a toothpick",
            "XX saw them fight like cats and dogs that day",
            "X2X can't believe that XX is as strong as an ox",
            "Your explanation to X3X is as clear as mud",
            "XX said that X2X is as nutty as a fruitcake",
            "XX slept like a log last night",
            "XX was as cold as ice during the game",
            "X2X and XX are as different as night and day",
            "I found out that X2X is as agile as a monkey",
            "XX was as happy as a clam at high tide",
            "That elegant dress fits her like a glove",
            "My love for you is as deep as the ocean",
            "XX was as bold as brass during their meeting",
        ],
        'advanced' => [
            "When it comes to eating utensils, XX is as clean as a whistle",
            "Watching that show was like watching grass grow",
            "XX turned white as a ghost when it finally happened",
            "The opinions of X2X and XX are as divergent as east and west",
            "Watching that movie was like watching paint dry",
            "XX was just sitting there like a bump on a log",
            "XX was as cool as a cucumber during that business presentation",
            "This hilarious jacket makes me stand out like a sore thumb",
            "His throat during that hot day in the desert was as dry as a bone",
        ],
    ],
    'personification' => [
        'beginner' => [
            "The fire swallowed their school",
            "The flowers danced with the wind",
            "The wind sang through the meadow",
            "My alarm clock yells at me every morning",
            "My house is a friend who keeps me safe",
            "The car's headlights winked at me",
            "The camera loves that actress",
            "My flowers were begging for water",
            "The sun stared down at me from the sky",
            "The car was suffering and needed a rest",
            "The ocean danced in the moonlight",
            "The bread jumped up out of the toaster",
            "The thunder clapped angrily",
            "The tree branch moaned as I sat on it",
        ],
        'intermediate' => [
            "The stars danced playfully in the moonlit sky",
            "The bees played hide and seek with the flowers",
            "The flowers waltzed in the gentle breeze",
            "The winds were howling during the storm",
            "The avalanche devoured anything standing in its way",
            "The door protested as it opened slowly",
            "The stairs groaned as we walked on them",
            "Our vacuum cleaner hums a happy tune while working",
            "Time flies and waits for no one",
            "The vine wrapped its fingers around the fence",
            "The hailstorm pounded our house last night",
            "The ocean waves lashed out at the boat",
            "My computer throws a fit every time I try to use it",
            "The moon winked at me through the clouds above",
        ],
        'advanced' => [
            "The first rays of the morning sun tiptoed through the meadow",
            "XX failed to realize that opportunity was already knocking at the door",
            "His last chance to redeem himself walked out the door that day",
            "The wildfire ran through the forest at a spectacular speed",
            "When I didn't make the team, my dream of becoming a professional athlete died",
            "The river swallowed the road as the water continued to rise higher and higher",
            "Time flew and before they knew it, it was time for X3X to go home",
            "The words leaped off of the paper as she read the article",
        ],
    ],
    'onomatopoeia' => [
        'beginner' => [
            "The sheep went, 'Baaa-baaa'",
            "The dog said, 'Bow-wow'",
        ],
        'intermediate' => [
            "The bee was buzzing when it flew away",
            "XX hit the water with a splash",
            "The sheep went, 'Baaa-baaa'",
            "XX banged on the drum for an hour",
            "The dog said, 'Bow-wow'",
            "XX loves hearing the 'ca-ching' of the cash register",
            "Don't let your cellphone beep during the movie",
            "XX can burp the alphabet",
            "The clanging pots and pans awoke everybody",
            "Clap your hands right now!",
        ],
        'advanced' => [
            "Rapidly clicking your pen will certainly annoy X3X during your XSUBJECT quiz",
            "The huge rock fell into the lake with a splash",
            "The heavy book fell on the desk with a loud thud",
            "His heart started thumping hard when he saw her",
            "The dilapidated bridge collapsed, creating a tremendous boom",
            "The bride and groom were not surprised to hear the familiar sound of clinking glasses",
            "Opening this cabinet forcefully will produce a distinctly annoying creak",
            "The swamp frogs croaked for many hours after the heavy rains last night",
        ],
    ],
    'oxymoron' => [
        'beginner' => [
            "It was a bitter sweet victory for X3X",
        ],
        'intermediate' => [
            "It was a bitter sweet victory for X3X",
            "They found themselves alone together",
            "To X3X, that's nothing but old news",
            "Let's not talk about that open secret",
            "XX has always been a wise fool",
            "Please don't be an old baby",
            "It looked pretty ugly to X3X",
            "XX gave X2X the password through a loud whisper",
            "XX reacted by giving X2X a sad smile",
            "All that XX could do was let out a silent scream",
            "XX is terribly good at what he does",
        ],
        'advanced' => [
            "Be careful because it seems that X2X is just being deceptively honest",
            "The country that XX visited had another quarter of negative growth",
            "XX was required to submit an original copy of that document",
            "XX had so much to do that he had to have a working vacation at the beach",
            "What you don't want to have is a negative income",
            "XX now has a live recording of his song",
        ],
    ],
    'alliteration' => [
        'beginner' => [
            "A better butter makes a batter better",
        ],
        'intermediate' => [
            "A better butter makes a batter better",
        ],
        'advanced' => [
            "A better butter makes a batter better",
            "A big bully beats a baby boy",
            "Billy's beagle bit the big bully",
            "Carol cooked cupcakes for Cathy's cat",
            "Dan's dog dove deep in the dam",
            "Kiko's kids kept kiting",
            "Nick's nephew needs new notebooks now",
            "Bobby bought a book by the brook bridge",
            "The good girl grabbed the golden goose",
            "The lazy lion licked its lips",
            "The thief took two of Toto's toys",
        ],
    ],
    'antithesis' => [
        'beginner' => [
            "Give every man thy ear, but few thy voice",
        ],
        'intermediate' => [
            "Give every man thy ear, but few thy voice",
        ],
        'advanced' => [
            "Love is an ideal thing, marriage a real thing",
            "Speech is silver, but silence is gold",
            "You are easy on the eyes, but hard on the heart",
            "It was the best of times, it was the worst of times",
            "That's one small step for man, one giant leap for mankind",
            "It's never too soon, It's never too late",
            "Ask not what your country can do for you - ask what you can do for your country",
            "Many are called, but few are chosen",
        ],
    ],
    'euphemism' => [
        'beginner'     => $euphemismItems,
        'intermediate' => $euphemismItems,
        'advanced'     => $euphemismItems,
    ],
];

$explanations = [
    'hyperbole'      => 'A hyperbole is a figure of speech in which exaggeration is used for emphasis or effect.',
    'metaphor'       => 'A metaphor is a word or phrase for one thing that is used to refer to another thing in order to show or suggest that they are similar.',
    'simile'         => "A simile is a figure of speech in which two unlike things are explicitly compared using words such as 'like' and 'as'.",
    'personification'=> 'Personification is a figure of speech in which human qualities are given to an object, an idea, a plant, or an animal.',
    'onomatopoeia'   => 'Onomatopoeia is a figure of speech that refers to the creation of words that imitate the sounds of the objects or actions they refer to.',
    'oxymoron'       => 'An oxymoron is a figure of speech in which seemingly contradictory terms appear side by side.',
    'alliteration'   => 'Alliteration refers to the repetition of the same sound or letter at the beginning of most or all of the words of a sentence.',
    'antithesis'     => 'An antithesis is a figure of speech in which two opposite or contrasting ideas are put together in a sentence in a balanced grammatical structure.',
    'euphemism'      => 'A euphemism is a mild or indirect word or expression substituted for one considered to be too harsh or blunt.',
];

// ============================================================
// Token pools + helpers
// ============================================================
$namePool = [
    "John","Peter","Paul","George","Waldo","Maria","Andrew","Gina","Betty","Linda","Jeffrey","Dinah","Simon","Randy","Ellen","Leo","Tom",
    "Beth","David","Sam","Dana","Barry","Danny","Sandy","Hilda","Henry","Alex","Carol","Emily","Ann","Bernie","Dustin","Donald","Tony","Bruce","Marge","Lois",
    "Mr. Smith","Mr. Goldman","Mrs. Brown","Mrs. Taylor","Mr. Jones","Mrs. Williams","Mr. Davis","Mrs. Moore","Mr. Jackson","Mrs. Clark","Mr. Lewis","Mrs. Hall","Mr. Walker",
    "Mr. Lee","Mrs. Cruz","Mr. Santos","Mrs. Torres","Mr. Simpson","Mr. Wong","Mrs. Perez","Mr. Mendoza","Mrs. Martin",
];
$subjPool    = ["my grandmother","your grandfather","my uncle","your aunt","his teacher","her friend","their classmate","our neighbor"];
$foodPool    = ["baked tuna","fried chicken","steak","grilled fish","grilled pork","roast beef","beef stew"];
$thingPool   = ["suitcase","handbag","wallet","computer","phone"];
$animalPool  = ["dog","cat","parrot","goat","rooster","chicken","duck","goose"];
$subjectPool = ["algebra","trigonometry","calculus","biology","chemistry","physics"];
$placePool   = ["apartment","hotel room","conference room","dining area","auditorium"];

function fos_roll_tokens($namePool, $subjPool, $foodPool, $thingPool, $animalPool, $subjectPool, $placePool) {
    $name1 = $namePool[array_rand($namePool)];
    $safety = 0;
    do {
        $name2 = $namePool[array_rand($namePool)];
        $safety++;
    } while ($name2 === $name1 && $safety < 40);

    $subjPick = rand(1, 5);
    if ($subjPick <= 2)      $ssubj = $name1;
    elseif ($subjPick === 3) $ssubj = (rand(1, 2) === 1) ? 'he' : 'she';
    else                     $ssubj = $subjPool[array_rand($subjPool)];

    return [
        'XX'       => $ssubj,
        'X2X'      => $name2,
        'X3X'      => $name1,
        'XFOOD'    => $foodPool[array_rand($foodPool)],
        'XTHING'   => $thingPool[array_rand($thingPool)],
        'XANIMAL'  => $animalPool[array_rand($animalPool)],
        'XPLACE'   => $placePool[array_rand($placePool)],
        'XSUBJECT' => $subjectPool[array_rand($subjectPool)],
    ];
}

function fos_apply_tokens($sentence, $tokens) {
    $sentence = str_replace('XX',       $tokens['XX'],       $sentence);
    $sentence = str_replace('X2X',      $tokens['X2X'],      $sentence);
    $sentence = str_replace('X3X',      $tokens['X3X'],      $sentence);
    $sentence = str_replace('XFOOD',    $tokens['XFOOD'],    $sentence);
    $sentence = str_replace('XTHING',   $tokens['XTHING'],   $sentence);
    $sentence = str_replace('XANIMAL',  $tokens['XANIMAL'],  $sentence);
    $sentence = str_replace('XPLACE',   $tokens['XPLACE'],   $sentence);
    $sentence = str_replace('XSUBJECT', $tokens['XSUBJECT'], $sentence);
    $sentence = ucfirst($sentence);
    if (substr($sentence, -1) !== '!' && substr($sentence, -1) !== '.') {
        $sentence .= '.';
    }
    return $sentence;
}

function fos_article($figure) {
    if ($figure === 'onomatopoeia' || $figure === 'alliteration') return '';
    if ($figure === 'euphemism') return 'a ';
    $first = strtolower(substr($figure, 0, 1));
    return in_array($first, ['a','e','i','o','u']) ? 'an ' : 'a ';
}

// ============================================================
// Answer scoring
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// Theme
// ============================================================
$theme = [
    'top_banner'    => $base . '/english/images/ex-26-top.jpg',
    'title_bg'      => $base . '/english/images/ex-26-top2.jpg',
    'left_side'     => $base . '/english/images/ex-26-left.jpg',
    'right_side'    => $base . '/english/images/ex-26-right.jpg',
    'content_bg'    => $base . '/english/images/ex-26-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-26-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// Generate
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Pick answer figure (respecting ansoptMax for this config)
    $ansopt = rand(1, $ansoptMax);
    $figure = $figureByAnsopt[$ansopt];

    // Defense: if the drawn figure isn't in the current pool, fall back
    if (!in_array($figure, $pool, true)) {
        $figure = $pool[0];
    }

    // Pick sentence from figureContent[figure][contentTier]
    $figPool = $figureContent[$figure][$contentTier]
        ?? $figureContent[$figure]['intermediate']
        ?? $figureContent[$figure]['beginner'];

    $usedKey = "used_{$figure}_{$contentTier}";
    $used    = $_SESSION[$sessionKey][$usedKey] ?? [];

    $avail = [];
    foreach ($figPool as $i => $_) {
        if (!in_array($i, $used, true)) $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($figPool as $i => $_) $avail[] = $i;
    }
    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $rawSentence = $figPool[$idx];
    $tokens      = fos_roll_tokens($namePool, $subjPool, $foodPool, $thingPool, $animalPool, $subjectPool, $placePool);
    $sentence    = fos_apply_tokens($rawSentence, $tokens);

    // Build choices
    if (count($pool) === 4) {
        // Legacy hardcoded 4-figure case for grd<=4 Easy/Medium
        $choices = ['metaphor', 'simile', 'hyperbole', 'personification'];
        shuffle($choices);
    } else {
        $distractorCandidates = array_values(array_diff($pool, [$figure]));
        shuffle($distractorCandidates);
        $distractors = array_slice($distractorCandidates, 0, 3);
        $choices     = array_merge([$figure], $distractors);
        shuffle($choices);
    }

    $explanation = $explanations[$figure];

    $_SESSION[$sessionKey]['current'] = [
        'sentence'    => $sentence,
        'answer'      => $figure,
        'explanation' => $explanation,
        'choices'     => $choices,
        'lvl'         => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .fos-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 20px 26px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
    box-sizing: border-box;
  }
  
  .fos-card.fos-feedback { font-size: 1.1rem; }
  .fos-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .fos-prompt strong { color: #CC0066; }
  .fos-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.1rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .fos-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .fos-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 60px;
    padding: 12px 16px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .fos-choice:hover { background: #eef; border-color: #8080ff; }
  .fos-explanation {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1rem;
    color: #444;
    text-align: center;
    max-width: 100%;
    margin: 20px auto 0;
    line-height: 1.6;
  }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p class="fos-prompt">
        This sentence used
        <strong><?php echo fos_article($cur['answer']) . htmlspecialchars($cur['answer']); ?></strong>.
    </p>
    <div class="fos-card fos-feedback"><?php echo htmlspecialchars($cur['sentence']); ?></div>
    <p class="fos-explanation"><?php echo htmlspecialchars($cur['explanation']); ?></p>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="fos-prompt">What figure of speech is used in this sentence?</p>
    <div class="fos-card"><?php echo htmlspecialchars($q['sentence']); ?></div>

    <p class="fos-hint">Click on your answer.</p>

    <div class="fos-grid-2x2">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="fos-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
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