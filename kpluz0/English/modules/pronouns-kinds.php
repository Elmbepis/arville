<?php
// english/modules/pronouns-kinds.php
// Kinds of Pronouns — identify the type of a highlighted pronoun in a
// sentence or phrase.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 4 M/C choices (2×2 grid).
//
// Form availability per tier (legacy §):
//   tier 1–2 &#8594; personal, possessive, interrogative, demonstrative
//   tier 3   &#8594; + indefinite
//   tier 4–5 &#8594; + reflexive, intensive
// Distractor pools grow at the same boundaries, so at tiers 1–2 "indefinite"
// shows up only as a distractor, and at tier 3 "reflexive"/"intensive" show up
// only as distractors. Preserved verbatim.
//
// Data markers:
//   *...+              surround the pronoun to highlight (rendered #CC0066 pink)
//   {p} / {p_lower}    pronoun placeholders (form 1–2 only)
//   {name1} {name2}    random boy-or-girl names (form 1 tier 5, form 4, form 5)
//   {boy} / {girl}     gender-specific name placeholders (forms 6–7 only)
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
$moduleTitle = 'Kinds of Pronouns';
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
function resolve_pk_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// ---- Data (§5) — verbatim from legacy, templated for placeholders ----
$dataByTier = [
    1 => [
        'personal' => [
            'pronouns' => ['He', 'She', 'They', 'We', 'You'],
            'sentences' => [
                '*{p}+ jumped when the tiger growled.',
                '*{p}+ will guard that house tonight.',
                '*{p}+ prepared a great meal for us.',
                '*{p}+ steamed some fish for lunch.',
                '*{p}+ can swim across that river.',
                'Did *{p_lower}+ make all those baskets?',
                "Shouldn't *{p_lower}+ go to the market today?",
                'Did *{p_lower}+ harvest these vegetables?',
            ],
        ],
        'possessive' => [
            'pronouns' => ['mine', 'ours', 'theirs', 'his', 'hers'],
            'sentences' => [
                'Those white shirts are *{p}+.',
                'The hut on the hill is *{p}+.',
                'The sandals in the box are *{p}+.',
                "These pens can't be *{p}+.",
                'This marine aquarium is *{p}+.',
                'That obese beagle puppy is *{p}+.',
                "This cool gadget can't be *yours+.",
                'These toy cars are *{p}+.',
                'This shiny van is *{p}+.',
                'The photos in that box are *{p}+.',
                'The pens in this bag are *{p}+.',
                'Some of those books are *{p}+.',
                'That old statue is *{p}+.',
                'Those broken crayons are *{p}+.',
            ],
        ],
        'interrogative' => [
            'sentences' => [
                '*Who+ will clean the house?',
                '*Who+ waxed the car?',
                '*Who+ will teach these lessons?',
                '*Who+ will call my mother?',
                '*Who+ will play with me?',
                '*Who+ will read those books?',
                '*Who+ will write the letter?',
                '*Who+ baked this cake?',
                '*Who+ reported the news?',
                '*What+ is in that bag?',
                "*What+ is your dog's name?",
                '*What+ is your favorite food?',
                '*What+ makes you happy?',
                '*What+ is this bag made of?',
                '*What+ did you put in this drink?',
                '*What+ made you do that?',
                '*What+ scares you the most?',
                '*Which+ of these will you buy today?',
                '*Which+ did you ride in yesterday?',
                '*Which+ looks best on me?',
                '*Which+ will you watch first?',
                '*Which+ can you take care of?',
            ],
        ],
        'demonstrative' => [
            'sentences' => [
                '*This+ is what we all need.',
                '*This+ will bring hope to everyone.',
                '*This+ is the best way to do it.',
                '*That+ will make things better.',
                '*That+ looks wonderful on you.',
                '*That+ is a great start for her.',
                'I gave *that+ to him yesterday.',
                'My, *this+ smells really awful!',
                '*These+ look and smell very tasty.',
                '*These+ are enough for all of us.',
                '*These+ will make us feel better.',
                '*These+ might make him happier.',
            ],
        ],
    ],
    2 => [
        'personal' => [
            'pronouns' => ['He', 'She', 'They', 'We', 'You'],
            'sentences' => [
                '*{p}+ baked some pastries this morning.',
                "*{p}+ made a promise that couldn't be broken.",
                '*{p}+ lost an important package yesterday.',
                '*I+ found a treasure chest in that field.',
                '*I+ will attend our grand reunion tonight.',
                '*{p}+ frightened the kids with that trick.',
                "*{p}+ couldn't stop laughing when it happened.",
                '*{p}+ donated some cash to that orphanage.',
                'Where should *{p_lower}+ put all these old shoes?',
                'Did *{p_lower}+ water those plants yesterday?',
            ],
        ],
        'possessive' => [
            'pronouns' => ['mine', 'ours', 'theirs', 'his', 'hers'],
            'sentences' => [
                'The towels in that cabinet are *{p}+.',
                'The magazines on that counter are *{p}+.',
                'The brochures on that rack are *{p}+.',
                'Those fingerprints are definitely *{p}+.',
                "This chemistry project can't be *{p}+.",
                'The large tent in that area is *{p}+.',
                'That great painting used to be *{p}+.',
                'Is that vintage motorbike really *yours+?',
            ],
        ],
        'interrogative' => [
            'sentences' => [
                '*Who+ will submit the business report?',
                '*Who+ knows how to cultivate these plants?',
                '*Who+ can design a similar system?',
                '*Who+ concocted this wonderful dish?',
                '*Who+ will choreograph this dance number?',
                '*Who+ among you is a good basketball player?',
                '*Who+ broke the armchair in the living room?',
                '*Who+ will negotiate with the mayor?',
                '*Who+ instigated the melee this afternoon?',
                '*What+ is the best method to produce these?',
                '*What+ makes this drink very refreshing?',
                '*What+ will make the audience laugh?',
                '*Which+ will give this pasta more flavor?',
                '*Which+ is our best option right now?',
                '*Which+ did you choose for your house?',
                '*Which+ of these is easier to understand?',
                '*Which+ will make our room more lively?',
                '*Which+ will solve this problem for good?',
            ],
        ],
        'demonstrative' => [
            'sentences' => [
                '*This+ is our favorite kind of pasta.',
                '*This+ is my favorite brand of shoes.',
                '*This+ is a great toy for a boy like him.',
                "*This+ is the solution they're looking for.",
                '*That+ is my only wish for him this year.',
                '*That+ can give them more problems tonight.',
                '{name1} thought that *this+ was your idea.',
                'I gave *that+ to that boy this morning.',
                'The truck almost bumped *that+ a while ago.',
                '{name1} sent *that+ to them last night.',
                'The van carried *that+ for four days.',
                '*These+ will serve our needs for now.',
                '*These+ are great gifts for the kids.',
                '*Those+ might all be gone tomorrow.',
            ],
        ],
    ],
    3 => [
        'personal' => [
            'pronouns' => ['He', 'She', 'They', 'We', 'You'],
            'sentences' => [
                '*{p}+ finally understood what they were discussing.',
                '*{p}+ invented a unique gadget for storing solar energy.',
                '*{p}+ established a good rapport with those investors.',
                '*{p}+ will participate in the charity event next week.',
                '*{p}+ will be involved in that reforestation project.',
                'I think that *I+ can build a nipa hut in just one week.',
                'Do you know that *{p_lower}+ painted that mural?',
                'I doubt that *{p_lower}+ can wax all these cars before noon.',
            ],
        ],
        'possessive' => [
            'pronouns' => ['mine', 'ours', 'theirs', 'his', 'hers'],
            'sentences' => [
                'Is that elegant mansion by the river really *yours+?',
                'This enormous fruit orchard will soon be *{p}+.',
                'The decision to purchase this machine is *{p}+.',
                'The letters that the mailman delivered today are *{p}+.',
                'Wow, these vintage cars of *{p}+ are all fantastic!',
            ],
        ],
        'interrogative' => [
            'sentences' => [
                '*Who+ invented this laser-guided robotic system?',
                '*Who+ can demonstrate how this equipment works?',
                '*Whom+ were your friends arguing with last night?',
                '*What+ ignited her interest in fashion design?',
                '*What+ can we do to make this event memorable?',
                '*What+ is our best solution to address this problem?',
                '*Which+ can exterminate the pests more quickly?',
                '*Which+ will generate more income for this company?',
                '*Which+ will exacerbate this tense situation more?',
                '*Which+ will attract more customers to this branch?',
                '*Which+ will provide the most health benefits?',
                '*Which+ will make this activity more enjoyable?',
            ],
        ],
        'demonstrative' => [
            'sentences' => [
                '{name1} sent *that+ to their group last week.',
                '*That+ might give you rashes if you touch it.',
                'Deeds like *those+ will make him even more unpopular.',
                '*These+ are things that we must be thankful for.',
                'We have delivered *those+ to our newest client already.',
                '{name1} was wondering if *this+ was your plan all along.',
                'More projects like *those+ are what our town needs.',
            ],
        ],
        'indefinite' => [
            'sentences' => [
                "I'm sure that *someone+ will help me with this.",
                '*Nobody+ will be here tonight because of the storm.',
                '*Somebody+ sent me this lovely present anonymously.',
                '*Everybody+ came to the meeting with an open mind.',
                'Is *anyone+ available to babysit for me on Saturday?',
                '*Nobody+ wanted to speak to {name1} during the party.',
                '*Many+ will be participating in the event tonight.',
                '*Nobody+ wanted to make a comment about what happened.',
                '*Everyone+ enjoyed listening to her funny song.',
                '*Everybody+ confirmed having received our invitation.',
                "This is *something+ that I've always wanted to do.",
            ],
        ],
    ],
    4 => [
        'personal' => [
            'pronouns' => ['He', 'She', 'They', 'We', 'You'],
            'sentences' => [
                '*{p}+ went on a hiking expedition to that volcano last month.',
                "*{p}+ couldn't suppress your laughter when that scene unfolded.",
                "*{p}+ initiated that fight by provoking the rival gang's leader.",
                '*{p}+ concocted a sumptuous dinner for the esteemed guests.',
                '*{p}+ will teach the children new piano lessons tomorrow.',
                "I can't believe that *{p_lower}+ hiked to that mountaintop last week.",
                '*I+ really want to be involved in that prestigious program.',
            ],
        ],
        'possessive' => [
            'pronouns' => ['mine', 'ours', 'theirs', 'his', 'hers'],
            'sentences' => [
                'All the cars there are dirty, but *{p}+ is the dirtiest.',
                'This manufacturing company of *{p}+ is not performing well.',
                'That bike is already corroded while *{p}+ still looks new.',
                'Those shoes are all worn out while *{p}+ are still pristine.',
                'That mobile device is no longer working, but *{p}+ still does.',
                'That pigeon was never found again but *{p}+ made it back home.',
            ],
        ],
        'interrogative' => [
            'sentences' => [
                '*Who+ upgraded the operating system of our desktop computer?',
                '*Whom+ did the elderly professor give the highest rating to?',
                '*Whose+ are those dirty motorcycles blocking our driveway?',
                '*Whose+ are the five cars parked in front of our house?',
                '*What+ will convince you to pursue a different career path?',
                '*What+ is the operating system of your new mobile device?',
                '*What+ diminished his keen interest in molecular biology?',
                '*Which+ of our experiments have we completed already?',
            ],
        ],
        'demonstrative' => [
            'sentences' => [
                '*That+ is definitely our favorite restaurant in this city.',
                '*This+ matters much to most of the people in this village.',
                '{name1} donated *those+ to their association just recently.',
                'Innovations like *those+ will help our country move forward.',
                'Their freight company transported *those+ to Europe yesterday.',
                'Yes, I recommended *that+ to their association just a few days ago.',
                'You need more accomplishments like *this+ to catch their attention.',
            ],
        ],
        'indefinite' => [
            'sentences' => [
                '*Some+ will do anything to gain the attention of others.',
                "*Everybody+ enjoyed the celebrity's hilarious performance.",
                '*Everybody+ in the room donated money for their worthy cause.',
                '*All+ joined the contest after the grand prize was announced.',
                '*Some+ of them promised to support our reforestation program.',
                '*Somebody+ will come to our aid soon so try not to be too nervous.',
                "I don't think *anybody+ can find the hidden cave in this weather.",
                'The jail guards brought the hungry prisoners *something+ to eat.',
                '*Few+ will be inclined to support their unpopular movement.',
                'Sometimes I really wonder why *anyone+ still shops at this store.',
            ],
        ],
        'reflexive' => [
            'sentences' => [
                '{boy} blames nobody but *himself+ for failing three easy tests.',
                '{boy} gifted *himself+ with a new mountain bike after winning the match.',
                'Do you know that {boy} bought *himself+ a new pair of rubber shoes today?',
                '{girl} said that she wants to give *herself+ enough time to contemplate.',
                "{girl} confirmed that she's giving *herself+ another chance to be happy.",
                "{boy} has always advertised *himself+ as 'a lawyer for the poor'.",
                '{boy} accidentally hurt *himself+ during their badminton match.',
                '{boy} and {girl} designed those fancy clothes for *themselves+.',
                '{boy} had given *himself+ two more years to finish college.',
                '{girl} made *herself+ a hearty breakfast before leaving for work.',
            ],
        ],
        'intensive' => [
            'sentences' => [
                'We confirmed that {girl} *herself+ signed the papers today.',
                'Yes, it was {boy} *himself+ who wrote these technical reports.',
                'We *ourselves+ are the ones shaping our destiny in life.',
                'The children *themselves+ delivered the message to their father.',
                '{girl} and her friends composed that song all by *themselves+.',
                'Santa Claus *himself+ distributed the candies to the children.',
                "{boy} is an inventor *himself+ so he knows what he's talking about.",
                'Those college students invented that innovative product *themselves+.',
                "She is a marvelous athlete *herself+ so don't underestimate her.",
                'It was {girl} *herself+ who developed that unique business idea.',
            ],
        ],
    ],
    5 => [
        'personal' => [
            'pronouns' => ['He', 'She', 'They', 'We', 'You'],
            'sentences' => [
                'According to these archived documents, *{p_lower}+ recorded that song two years ago.',
                "I'm sure that *{p_lower}+ packed and delivered those goods as early as a week ago.",
                'I am quite certain that *{p_lower}+ bought these old magazines in Australia two years ago.',
                'The director is asking if *{p_lower}+ could write a new script for the movie.',
                'It would be good if *{p_lower}+ could complete the details of the project plan today.',
                'Would *{p_lower}+ spend a lot of money to construct a badminton court on this lot?',
                '{name1} wanted to confirm if *{p_lower}+ would be willing to pay for the damage.',
                'Do you believe that *{p_lower}+ could renovate that building in just one month?',
            ],
        ],
        'possessive' => [
            'pronouns' => ['mine', 'ours', 'theirs', 'his', 'hers'],
            'sentences' => [
                'Those spectacular accomplishments are *{p}+ as shown in these records.',
                'These artifacts from the sunken ship will undoubtedly be *{p}+ sometime soon.',
                'All the essays submitted are good but *{p}+ would probably win the grand prize.',
                'The offices here are all fantastic, but *{p}+ is the most luxurious.',
                'The chosen sculpture looked very intriguing, but *{p}+ conveyed a more profound meaning.',
            ],
        ],
        'interrogative' => [
            'sentences' => [
                '*Who+ authorized the entry of that boisterous group into our compound?',
                '*What+ will determine the final outcome of this unusual experiment?',
                '*What+ are the primary ingredients of this expensive food supplement?',
                '*Which+ will you present to the executives at the board meeting?',
                '*Which+ of these solutions will preclude the recurrence of this problem?',
                '*Which+ of these technical reports is the chief engineer asking for?',
            ],
        ],
        'demonstrative' => [
            'sentences' => [
                '{name1} delivered *that+ to their multinational software corporation already.',
                'According to the judge, there is no existing law penalizing *that+ in the Philippines.',
                'We really think that incidents like *this+ will not do our city any good.',
                'Corrupt practices like *those+ will not endear that politician to the masses.',
                'Achievements like *those+ will always make any father proud of his son.',
            ],
        ],
        'indefinite' => [
            'sentences' => [
                'We must allow *everyone+ to help so we can finish this important task on time.',
                'There are mango seedlings in the flower garden, so *somebody+ must have planted them.',
                "*Few+ came to the wedding after the bride had alienated the groom's family and friends.",
                "We are sure that *nobody+ can influence our president's decision tonight.",
                'This is a democratic society so *everyone+ will be given an opportunity to be heard.',
                '*Nobody+ wants to have a technical discourse with that arrogant professor.',
                '{name1} promised to do *something+ to help our organization fulfill this obligation.',
                'I was told not to worry because *everything+ would be taken care of in due time.',
                'Do you believe that *anything+ is possible as long as you put your mind to it?',
                'Did you notice that *everyone+ brought canned goods to the charity drive?',
                '*Anybody+ who came along would know that something wonderful has happened here.',
            ],
        ],
        'reflexive' => [
            'sentences' => [
                '{girl} will just make *herself+ even more miserable with that terrible decision.',
                'He read all the magazines quietly to *himself+ while waiting for his friends to arrive.',
                '{girl} went to the mall this morning and purchased a lot of clothes for *herself+.',
                "{boy} finally convinced *himself+ that there's a need to change for the better.",
                'We treated *ourselves+ to a sumptuous dinner at that luxurious restaurant yesterday.',
                "Let {boy} make a decision for *himself+ this time because that's the only way he'll learn.",
                '{boy} must be crazy because he does nothing but sing love songs to *himself+ all day long.',
                'They bought some cool gadgets for *themselves+ after winning the singing contest.',
                '{boy} and {girl} spent a lot of money trying to educate *themselves+ on entrepreneurship.',
                '{girl} gave *herself+ one month to lose enough weight to fit in her expensive dress.',
            ],
        ],
        'intensive' => [
            'sentences' => [
                '{boy} and {girl} submitted their robotics project to the committee head *himself+.',
                '{girl} is a great historian *herself+ so you can probably take her word for it.',
                '{boy} wondered aloud whether he *himself+ was the only one seeing what was happening.',
                '{girl} knew that she *herself+ could make a positive impact on the world, if only she put her mind to it.',
                'With proper diet and plenty of exercise, you *yourself+ can easily transform your body.',
                "It was {boy} *himself+ who applied the finishing touches to the team's project.",
                'It was the department head *himself+ who gave me permission to use this facility.',
                'His scientific experiment was so important that it was approved by the technical director *himself+.',
                "The senator's political campaign was funded by the wealthy businesswoman *herself+.",
                "The dentist disinfected the tools *herself+ to accede to her patient's request.",
                "To ensure the show's success, the stage director *himself+ choreographed the performance.",
            ],
        ],
    ],
];

// ---- Name pools (§5.2) — verbatim from legacy ----
$boys = [
    'Adam','Adrian','Alex','Alexander','Andrew','Angelo','Austin','Benjamin','Brandon',
    'Caleb','Cameron','Carlos','Carson','Carter','Charles','Christopher','Daniel','David',
    'Diego','Dominic','Dylan','Elijah','Ethan','Gabriel','Hayden','Ian','Isaac','Isaiah',
    'Jack','Jacob','Jaden','James','Jason','Jose','John','Jonathan','Joseph','Joshua',
    'Juan','Julian','Justin','Kevin','Logan','Lucas','Luis','Luke','Matthew','Max',
    'Michael','Nathan','Nicholas','Noah','Oliver','Owen','Parker','Robert','Ryan','Samuel',
    'Sebastian','Thomas','Tristan','William',
];
$girls = [
    'Alexandra','Alyssa','Amelia','Andrea','Anna','Ariana','Arianna','Bella','Brooke',
    'Camille','Caroline','Chloe','Claire','Elizabeth','Emma','Eva','Evelyn','Gabriela',
    'Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Kylie',
    'Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie',
    'Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sofia','Sophia','Sophie',
    'Stella','Tina','Victoria',
];
$allNames = array_merge($boys, $girls);

// ---- Form availability per tier ----
function pk_available_forms(int $tier): array {
    if ($tier <= 2) return ['personal','possessive','interrogative','demonstrative'];
    if ($tier === 3) return ['personal','possessive','interrogative','demonstrative','indefinite'];
    return ['personal','possessive','interrogative','demonstrative','indefinite','reflexive','intensive'];
}

function pk_choice_pool(int $tier): array {
    if ($tier <= 2) return ['personal','possessive','interrogative','demonstrative','indefinite'];
    return ['personal','possessive','interrogative','demonstrative','indefinite','reflexive','intensive'];
}

// ---- Render helpers (§8.2 target #CC0066) ----
// Convert *... + markers in a raw sentence to pink-highlighted text.
function pk_render_sentence(string $raw): string {
    $out = '';
    $pos = 0;
    $len = strlen($raw);
    while ($pos < $len) {
        $star = strpos($raw, '*', $pos);
        if ($star === false) {
            $out .= htmlspecialchars(substr($raw, $pos));
            break;
        }
        $plus = strpos($raw, '+', $star + 1);
        if ($plus === false) {
            $out .= htmlspecialchars(substr($raw, $pos));
            break;
        }
        $out .= htmlspecialchars(substr($raw, $pos, $star - $pos));
        $out .= '<strong style="color:#CC0066;">'
              . htmlspecialchars(substr($raw, $star + 1, $plus - $star - 1))
              . '</strong>';
        $pos = $plus + 1;
    }
    return $out;
}

// Extract the first *... + content (for feedback text).
function pk_extract_highlight(string $raw): string {
    $star = strpos($raw, '*');
    if ($star === false) return '';
    $plus = strpos($raw, '+', $star + 1);
    if ($plus === false) return '';
    return substr($raw, $star + 1, $plus - $star - 1);
}

function pk_box(string $html, int $minHeight = 120): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function pk_article(string $word): string {
    $f = strtolower(substr($word, 0, 1));
    return in_array($f, ['a','e','i','o','u'], true) ? 'an' : 'a';
}

// ---- Question generation (§6) ----
function build_pk_question(array $dataByTier, string $lvl, int $grd,
                           string $sessionKey, array $allNames,
                           array $boys, array $girls): ?array {
    $tier = resolve_pk_tier($lvl, $grd);
    $tierData = $dataByTier[$tier] ?? null;
    if (!$tierData) return null;

    $forms = pk_available_forms($tier);
    $form  = $forms[array_rand($forms)];
    $formData = $tierData[$form] ?? null;
    if (!$formData || empty($formData['sentences'])) return null;

    // No-repeat keyed per (tier, form, index).
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($formData['sentences'] as $i => $tmpl) {
        $key = "t$tier:$form:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:$form:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($formData['sentences'] as $i => $tmpl) $available[] = ['key' => "t$tier:$form:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $template = $formData['sentences'][$pick['idx']];

    // Roll pronoun (if the form has one) and substitute {p} / {p_lower}.
    $pronoun = '';
    if (isset($formData['pronouns'])) {
        $pronoun = $formData['pronouns'][array_rand($formData['pronouns'])];
        $template = str_replace('{p}', $pronoun, $template);
        $template = str_replace('{p_lower}', lcfirst($pronoun), $template);
    }

    // Roll names once per question and substitute.
    $name1 = $allNames[array_rand($allNames)];
    do { $name2 = $allNames[array_rand($allNames)]; } while ($name2 === $name1);
    $boy  = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];
    $template = str_replace(
        ['{name1}', '{name2}', '{boy}', '{girl}'],
        [$name1, $name2, $boy, $girl],
        $template
    );

    // Build choices: correct + 3 distinct distractors from the tier pool.
    $pool = pk_choice_pool($tier);
    shuffle($pool);
    $wrong = [];
    foreach ($pool as $p) {
        if ($p !== $form && count($wrong) < 3) $wrong[] = $p;
    }
    $choices = array_merge([$form], $wrong);
    shuffle($choices);

    return [
        'sentence'    => $template,
        'highlighted' => pk_extract_highlight($template),
        'correct'     => $form,
        'choices'     => $choices,
        'tier'        => $tier,
        'lvl'         => $lvl,
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

// ---- Question generation (§6) — with tier-1 fallback if generation fails ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_pk_question($dataByTier, $lvl, $grd, $sessionKey, $allNames, $boys, $girls);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_pk_question($dataByTier, 'Easy', 0, $sessionKey, $allNames, $boys, $girls);
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl,
              $moduleTitle.' - Grade '.$grd.' - '.$lvl,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur      = $result['cur'];
    $sentenceHtml = pk_render_sentence($cur['sentence']);
    $article  = pk_article($cur['correct']);
    $highlighted = $cur['highlighted'] !== ''
        ? '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['highlighted']) . '\'</strong>'
        : '<strong style="color:#CC0066;">the highlighted word</strong>';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php pk_box('<div style="width:100%;font-size:17pt;color:#333;line-height:1.65;text-wrap:balance;">' . $sentenceHtml . '</div>', 120); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The word <?php echo $highlighted; ?> is <?php echo $article; ?>
    <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['correct']); ?></strong> pronoun.
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
    $sentenceHtml = pk_render_sentence($q['sentence']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    What type of pronoun is the <span style="color:#CC0066;">highlighted</span> word?
  </div>
  <?php pk_box('<div style="width:100%;font-size:17pt;color:#333;line-height:1.65;text-wrap:balance;">' . $sentenceHtml . '</div>', 120); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:180px;max-width:240px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:16pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif;
endif;
?>

<!-- Difficulty radios (§10.4 — Easy / Hard only) -->
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