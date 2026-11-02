<?php
// english/modules/sentences-simple-compound.php
// Simple and Compound Sentences — decide whether a sentence is simple
// (one independent clause) or compound (two independent clauses joined by
// a coordinating conjunction).
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 6 content tiers via (level × grade); 2 M/C choices (1×2 grid).
//
// Data placeholders ({boy}, {girl}, {name}, {surname}) are substituted at
// build time with the same name rolls as legacy — {name} is a random boy OR
// girl, matching legacy's `if (rand(1,2)==1){$name=$boy;} else{$name=$girl;}`.
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
$moduleTitle = 'Simple and Compound Sentences';
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
function resolve_ssc_tier(string $lvl, int $grd): int {
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

// ---- Name pools (§5.2) — verbatim from legacy ----
$boys = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos',
    'Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian',
    'Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph',
    'Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael',
    'Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel',
    'Sebastian','Thomas','William'];
$girls = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille',
    'Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah',
    'Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla',
    'Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi',
    'Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];
$surnames = ['Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales',
    'Martinez','Mendez','Paredes','Revilla','Santos','Tolentino'];

// ---- Data (§5) — verbatim from legacy (6 tiers), templated with placeholders ----
$dataByTier = [
    1 => [
        'simple' => [
            "{boy} and {girl} are going to the mall.",
            "{boy} ate eggs and drank coffee.",
            "Most children like cookies and milk.",
            "She likes apples, pears, and bananas.",
            "My aunt and uncle live in California.",
            "They like Batman and Superman.",
            "She is neither rich nor poor.",
            "I can neither whistle nor sing.",
            "I want either a puppy or a fish tank.",
            "Let's order pasta or some noodles.",
            "My friend and I will attend the meeting.",
            "Both the shoes and the dress were on sale.",
            "You and I will ride together in that bus.",
            "You can take the toys and the books.",
            "The music is too loud for my ears.",
            "{boy} can not run as fast as {girl}.",
            "The little boy wanted to go to school.",
            "{name} wants to learn how to drive a car.",
            "{boy} and {girl} left on that bus.",
            "{boy} didn't want to play with {girl}.",
            "{name} got the highest grade in our quiz.",
            "He did not smile nor say a single word.",
        ],
        'compound' => [
            "I like cakes, for they taste good.",
            "I washed the shirt, for it was dirty.",
            "He was tired, and he had a headache.",
            "I want to eat, but there's no food.",
            "He is small but he is very strong.",
            "The sun is warm, yet the air is cool.",
            "I want to be smart, so I read a lot.",
            "I was hungry, so I ate the bread.",
            "He fell asleep at once, for he's very tired.",
            "We cleaned the house for it was quite messy.",
            "{boy} is an actor and {girl} is a teacher.",
            "My cousin {boy} can not dance, nor can he act.",
            "I like him, but I don't like his friends.",
            "I took a taxi, and she drove home.",
            "The job is difficult, but the pay is low.",
            "The quiz was hard, but I got a high grade.",
            "{boy} wants to win, so he practices daily.",
            "I like peanut butter, and you like jelly.",
            "He went to the party, but she stayed home.",
            "{boy} brought the food, so {girl} set the table.",
            "{girl} went shopping, so {boy} played tennis.",
        ],
    ],
    2 => [
        'simple' => [
            "I want to go to her party and have some fun.",
            "{name} saw the storm coming and ran to the basement.",
            "{name} can design websites and write computer programs.",
            "We have tickets for the symphony and the opera.",
            "You must exercise daily and eat a balanced diet.",
            "His sister can neither play the piano nor the drums.",
            "The restless kids went hiking and swimming.",
            "The beef stew smells good and looks delicious.",
            "{name} will neither play the harp nor the trumpet.",
            "He wasn't able to make the electronic circuit work.",
            "Hyenas and wild dogs love to hunt in packs.",
            "You can make a big poster or a little clay statue.",
            "She can cook dinner or go out to a restaurant.",
            "Their large dog was very hungry and thirsty.",
            "{boy} can't play the guitar nor the accordion.",
            "Those young men speak neither Filipino nor English.",
            "Leopards usually hunt in the jungle alone.",
            "He pacified the people and earned their respect.",
            "The engineer can now buy the parts for his project.",
            "{boy} followed the given instructions step by step.",
            "She made a lot of candies and sold them all.",
            "I have neither seen them nor heard from them.",
            "He can just assemble the study table himself.",
            "She performed dismally in her test and cried.",
            "Not a single person in the room congratulated him.",
        ],
        'compound' => [
            "{boy} ran for two hours, yet he didn't get tired.",
            "It was cold outside, so she put on her leather jacket.",
            "The small puppy drank some water, for it was thirsty.",
            "Fans love to watch Karen, for she's a great actress.",
            "History will be kind to me, for I intend to write it.",
            "{boy} can now buy a new car, for he had won the lottery.",
            "{boy} works as a teacher and {girl} works as a nurse.",
            "It may be an old car, but it's still very useful.",
            "{boy} studied hard, but he didn't pass the test.",
            "I wanted to ride my bike, but the tire was flat.",
            "I want to go to the mall, but my sister has my car.",
            "My brother is young but he knows a lot of things.",
            "You can give him a fish or you can teach him to fish.",
            "He is very bright, yet he failed that short quiz.",
            "I smell the skunk, yet I can't see where it is.",
            "I love chocolate, yet I do not eat chocolate cake.",
            "{boy} was very tired, so he did not go diving with them.",
            "{girl} stubbed her toe, so she was limping for two days.",
            "She studies every day so she'll get high grades.",
            "He has a broken leg, so he couldn't run that fast.",
            "It was raining, so they brought umbrellas with them.",
            "The kids wanted to play, but it was raining hard.",
            "{girl} hid under the bed, and {boy} hid behind the tree.",
        ],
    ],
    3 => [
        'simple' => [
            "Everyone is interested to join our school's basketball team.",
            "Both my grandfather and my father worked in that steel plant.",
            "What you say and what you do are two different things.",
            "She can draw cartoon characters and make abstract paintings.",
            "My sister cleaned our rooms and washed the dishes yesterday.",
            "No one but Bert remembered to bring a notebook to class.",
            "They hid the gold either at the beach or by the riverbank.",
            "They didn't go to that island nor stay in this hotel.",
            "His colleagues strongly opposed his suggestion last week.",
            "{boy} and {girl} arrived at the bus station before noon.",
            "They were practically penniless but had determination.",
            "{boy} shouldn't go near that river without a companion.",
            "That clunky machine makes a lot of annoying noise at night.",
            "{boy} put on his yellow life vest and left on that small boat.",
            "You should eat three nutritious meals every day to get well.",
            "{boy} quickly cleaned his room and finished his assignments.",
            "You can either watch a movie or go shopping for clothes.",
            "{girl} asked for his autograph and was surprised to get it.",
            "His mother drove the big bus safely over that narrow bridge.",
            "{name} likes carrot cake but could never drink carrot juice.",
            "Their best player got injured but continued playing.",
            "{girl} is expected to perform a song number with {boy} tonight.",
            "The men were tired and hungry but did not stop working.",
            "{boy} has an unusual illness but still lives a happy life.",
        ],
        'compound' => [
            "My dog doesn't like vegetables, yet I see her eating grass.",
            "{name} put on a sweater, for it was cold inside the theater.",
            "I will be late to the party, for I am working until 7 p.m.",
            "{boy} prepared some hot soup for {girl}, for she is feeling cold.",
            "{boy} brought his rubber shoes, for he has plans to run tonight.",
            "He does not help around the house, nor does he look for a job.",
            "This is a useful rule, but it's quite difficult to remember.",
            "{boy} seemed lazy, but he finished his task on time.",
            "{boy} has a great jump shot but he isn't quick on his feet.",
            "It's definitely not spacious, but it is a practical kitchen.",
            "You can give her some money or you can buy her some food.",
            "You need to finish that project or you'll get a failing grade.",
            "{girl} can buy the book, or she can borrow it from the library.",
            "You can eat dinner early, or you can eat with us at midnight.",
            "She is a great singer, yet nobody has ever asked her to sing.",
            "They have tried to sing like her, yet none of them could.",
            "{girl} didn't eat any breakfast, yet she doesn't look hungry.",
            "{girl} forgot her shoes, so she wasn't able to hike with them.",
            "{girl} wanted to succeed so she studied very hard in college.",
            "{boy} ate all the peanuts, so {girl} just ate the cookies.",
            "I wanted to get a nice seat, so I ordered my tickets early.",
            "I wasn't able to study hard, but I still got a high score.",
            "I was tired from working late, but I had to go to class.",
            "They asked him how he got wounded, but he refused to answer.",
            "I wanted to buy a cute puppy, so I started to save my money.",
            "{girl} did not like to read, for she was not very good at it.",
            "The little boy did not like to go to school, yet he went anyway.",
            "Let's go to the swimming pool, for it's hot inside the house.",
            "Rabbits make good pets, for they don't make too much noise.",
        ],
    ],
    4 => [
        'simple' => [
            "Their food cart business has become successful but challenging.",
            "{name} heard the weather report and became worried about the coming storm.",
            "{boy} drove to the golf course and played nine holes with his friend.",
            "The authorities apprehended the criminal and put him behind bars.",
            "{girl} sent in her application and waited by the phone for a response.",
            "They should either change their strategy or just forfeit the game.",
            "His son enjoys watching fantasy movies and writing science fiction novels.",
            "You can paint the wooden fence outside or just repair this broken table.",
            "My brother just graduated from high school and can now attend college.",
            "The new employee worked very hard to impress his demanding boss.",
            "My uncle convinced his friends to lend him some money for his business.",
            "The policemen finally found and caught the dreaded criminal.",
            "Mr. {surname} tutored his daughter on algebra and chemistry for many hours.",
            "He is not answering my email messages nor accepting my calls.",
            "His friends and relatives are not comfortable with what he's been doing.",
            "Superman is just using a pair of eyeglasses to conceal his identity.",
            "I tried to get in touch with the congressman for an interview.",
            "{boy} and {girl} bought some concert tickets and gave them to us.",
            "The professor didn't teach in that university nor worked in this company.",
            "My uncle raised the required capital and started his own business.",
            "{boy} topped all the evaluation tests and proved his detractors wrong.",
            "{boy} stayed with {girl} under the tree and kept her safe and calm.",
            "He completed the application form and submitted it to the manager.",
            "{boy} swims in the lake and runs in the field every day.",
            "{boy} drank that cleaning solution by accident and felt sick immediately.",
            "{boy} and {girl} had an intense argument and decided to part ways.",
            "{name} was much older than the other runners but won the race anyway.",
            "Their science teacher plans to give them a quiz every week.",
            "The lottery winner continued to live in his small and dilapidated house.",
            "Their company should pay the licensing fees or face their rival in court.",
            "The mechanic could refurbish the engine or replace it with a new one.",
            "We might be able to solve this predicament using our limited resources.",
        ],
        'compound' => [
            "{girl} does not like mountain climbing, nor does she like scuba diving.",
            "{boy} wanted to show his painting to them, but he didn't finish it.",
            "He is putting his health at risk, for he has been smoking for years.",
            "We couldn't see the lunar eclipse, for the clouds blocked the moon.",
            "He takes care of her very much, for she means everything to him.",
            "{boy} didn't do his math exercises last night, nor did he read his book.",
            "They were not wearing raincoats, nor were they carrying umbrellas.",
            "I don't like animated movies, nor am I a fan of movies about World War II.",
            "Our cat doesn't like dry cat food, nor does it like a saucer of clam stew.",
            "{girl} doesn't care for the beach, but she enjoys camping in the mountains.",
            "{boy} had thick, curly hair years ago, but he is getting bald now.",
            "It's hard to believe that Clark Kent is Superman, but they say he really is.",
            "I would love to try the green mangoes, but they might upset my stomach.",
            "The timid employee wanted to impress his boss, but he didn't know what to do.",
            "The people were hysterical and unrestrained, but he managed to pacify them.",
            "We can grill some chicken tonight, or we can just eat leftovers.",
            "{girl} can fill an audience with joy, or she can make them cry a river.",
            "I like music very much, yet I don't want to spend any money for that concert.",
            "{girl} is my smartest classmate, yet she got a low score in the test.",
            "{boy} is very shy, so he always avoids being caught on camera.",
            "My son barely touched his meal, so I took a spoon and finished it.",
            "The dog chased the mailman, so the mailman ran as fast as he could.",
            "{girl} arrived late in the office, so her boss made her stay after five.",
            "{girl} wants to become famous, so she auditions for a part every day.",
            "The food in this place is horrible so I will never eat here again.",
            "I enjoy taking photographs of animals, so I go to the zoo frequently.",
            "Please stop blowing that horn because it is really annoying.",
            "{girl} is a good daughter because she always obeys her parents.",
            "The lion greedily gorged on the antelope, for it hadn't eaten in months.",
            "My dog likes to play fetch, and my cat likes to roll on the grass.",
        ],
    ],
    5 => [
        'simple' => [
            "Manila is a highly populated city and suffers from many symptoms of urban blight.",
            "All he needed for his impromptu concert was an electric guitar and an amplifier.",
            "The physicist could neither defend his theory nor show experimental results that prove it.",
            "I could buy an expensive coat or just buy several other things that are cheaper.",
            "The hardworking policemen apprehended and interrogated the famous fugitive.",
            "He and his colleagues have managed to pacify the angry leaders and their people.",
            "I tried to correspond with the politician and convince him to support our scholars.",
            "{boy} and {girl} arrived at the train station and immediately bought some tickets.",
            "The efficient employee completed the business plan and submitted it in just three days.",
            "The young student bought all the materials he needed and assembled his science project.",
            "Superman simply puts on a pair of eyeglasses and hunches his back to conceal his identity.",
            "The students neither read the articles nor consulted the experts for their research.",
            "The concert artists performed magnificently but failed to entertain the audience.",
            "These athletes played their best game so far in the championship series but still lost.",
            "His uncle was able to restore that antique car without spending too much money.",
            "Our dance instructor arrived early and helped me choreograph the dance number.",
            "{boy} should apply this medicated cream to his face every night for one whole month.",
            "The cheerleaders should practice regularly and try to perfect their routine.",
            "The famous singer performed magnificently but failed to amaze the audience.",
            "The doctors couldn't find a cure for the illness nor have a clue about its cause.",
            "I want to have my own trading company and pay all my employees a lot of money.",
            "My friends have just moved into the old suburban home that they inherited from an aunt.",
            "The majestic horses with flowing manes walked slowly over the rickety bridge.",
            "The man and his son went inside the department store and bought some clothes.",
        ],
        'compound' => [
            "Lions are ferocious carnivores, but they can be very caring towards their young.",
            "Our labrador puppy loves having its head scratched, but it hates getting its claws trimmed.",
            "This is a good school to study in, for the teachers here are all competent.",
            "That is one of the best schools around, for they have an excellent facility.",
            "I go to the park every weekend, for I enjoy watching the ducks on the lake.",
            "{girl} provides scholarships to many children, for she is a genuinely good person.",
            "The biologist handled the snake very carefully, for he didn't want to be bitten.",
            "The old professor admires his top student, for he is very studious and intelligent.",
            "{boy} designed the computer hardware and {girl} developed the corresponding software.",
            "I will be responsible for security, and you will take care of the entertainment.",
            "We don't have the resources to correct this problem, nor is it practical to do so.",
            "I am not capable of modifying this machine, nor do I have the permission to do so.",
            "We can no longer distribute the brochures, nor can we give the product presentation.",
            "I always bring these magazines with me, but I never get the chance to read them.",
            "Her technique is not yet well-developed, but she exudes unwavering self-confidence.",
            "They were practically penniless from the start, but their business still succeeded.",
            "The mathematician couldn't solve the equation at first, but he did not get discouraged.",
            "{boy} lost a fortune in the stock market, but he still seems to be living in comfort.",
            "{boy} intended to go to the ball game, but his wife made him go to the opera instead.",
            "The policemen interrogated the captured fugitive, but he refused to say a single word.",
            "I tried to correspond with the politician, but he is not receiving my email messages.",
            "I could buy an expensive coat, or I could buy several other things that are cheaper.",
            "Our engineer can rehabilitate this old machine, or we can just buy a new one.",
            "The student can buy the hardware for his project, or he can just assemble it himself.",
            "Mr. {surname} must hire better lawyers immediately, or he'll lose the case and go to jail.",
            "The ballerina was nursing a sore foot, yet she still executed her number flawlessly.",
            "The typhoon uprooted all the trees in that village, yet their house remained standing.",
            "The tourists complained loudly about the heat, yet they continued to play golf every day.",
            "The citizens demanded drastic changes in government, so the president took swift actions.",
            "My uncle was able to raise the required capital, so he can now start his trading business.",
            "{girl} didn't learn to play the guitar but she became good at playing the piano.",
            "The little girl wanted to eat more pizza, but she no longer has any money left.",
            "{boy} and {girl} left on the bus before noon, so I did not see them at the bus station.",
            "I don't want to practice playing the piano, yet I don't want to disobey my mother.",
            "They waited for hours to see the eclipse, but they didn't see it because of the clouds.",
            "Mr. {surname} wrote a fairy tale for his daughter, but it was too long for her to read.",
            "{boy} did his best to follow the instructions, yet he wasn't able to assemble the cabinet.",
        ],
    ],
    6 => [
        'simple' => [
            "{boy} and {girl} arrived at the bus station before noon and had lunch before leaving for Batangas.",
            "Manufacturing companies must be allowed to develop new products and market them their own way.",
            "Mr. {surname} patiently tutored his daughter and her classmate on calculus and physics for many hours.",
            "{boy} and {girl} followed the given instructions step by step and successfully put the cabinet together.",
            "The mayor can either distribute scholarships to deserving students or set up livelihood programs for their parents.",
            "The problem of climate change is now upon us and will continue to wreak havoc year after year.",
            "You can never convince the old millionaire to buy a new car nor spend for a well-deserved vacation.",
            "The store already received a copy of our proof of purchase but still refuses to honor the warranty.",
            "He delivered the electronic gadgets to their distributors and assured them of the products' high quality and reliability.",
            "Their department wants to make a good first impression on the buyer and is expediting the production of the ordered goods.",
            "The company knew practically nothing about the engineer but decided to hire him nonetheless.",
            "The boys took off their shoes and did their best to avoid scratching the newly varnished floors.",
            "America's greatest actors, actresses, directors, and screenwriters will appear on the awards show tonight.",
            "{boy} seasoned and roasted the turkey with the skill, flair, and passion of a true master chef.",
            "Lying exposed without its blanket of snow, the ice on the river melts quickly under the warm March sun.",
            "{girl} and her friends went to the national library and spent many hours working on their technical research.",
            "{boy} went back to his hometown and donated his truck to the orphanage that took care of his friend.",
            "The board chairman gave the order to proceed with the construction of the building and the hiring of more employees.",
            "The biologist tranquilized the agitated rhinoceros and undertook precautions to prevent it from hurting itself.",
            "The innkeeper saw the armed strangers who were trying to enter his compound and immediately called the police.",
            "Mr. {surname} and his business partners are having some financial problems that threaten the viability of their company.",
        ],
        'compound' => [
            "{girl} wrote the script for that documentary video and {boy} was the one who narrated it.",
            "The governor wanted to impress his constituents, so he spent a lot of money on infrastructure.",
            "I have studied Spanish for many years, so my Spanish-speaking friends can chat easily with me.",
            "We will make a huge fortune soon, for this is the coolest product to ever come out of our factory.",
            "{boy} thought he had a good chance to get the job, for his father was on the company's board of trustees.",
            "You shouldn't waste a single drop of that bird's nest soup, for it is expensive and time-consuming to prepare.",
            "{boy} was picked as a prime candidate for the next batch of astronauts, for he was physically and mentally fit for the job.",
            "You should not tolerate their incessant complaining, nor should you extend their lease on this facility.",
            "The activists were not allowed to stage a demonstration, nor were they given a chance to talk to the mayor.",
            "The institution doesn't have the financial capability to pursue this project, nor does it have the political will to do so.",
            "{boy} is the best player on our team but you scored twelve points more than him in that championship game.",
            "They had the mental toughness to finish the adventure, but they were too exhausted to go on.",
            "We were able to secure the loan to buy the property, but someone else had bought it already.",
            "The physicist tried to finish his experiment this week, but he ran out of time and resources.",
            "Mr. {surname} tutored his daughter on algebra for many hours, but she still performed dismally in her test.",
            "The company can just buy the software, or it can hire a team of programmers to develop a similar one.",
            "The laws in that country are very strict, yet there are many crime syndicates thriving there.",
            "Mankind's technology has advanced tremendously over the years, yet world peace is as elusive as ever.",
            "{boy} followed the given instructions step by step, yet he wasn't able to make the mechanism work.",
            "The organization did its best to serve the community, yet the mayor and the city council did not appreciate their efforts.",
            "That pharmaceutical company registered record-breaking profits, so its investors are all ecstatic.",
            "The mountainside has been completely denuded, so various organizations launched a reforestation project.",
            "Captain America couldn't handle the dire situation by himself, so he called in the rest of the Avengers.",
            "The radio reported that a thunderstorm was coming, so {name} prepared enough food and water for five days.",
            "The students have started studying diligently, for they will soon have their periodical tests.",
            "You must not invest your money in that business, for people say that it's not legitimate.",
            "Eliza's lawyer filed for a restraining order, for her stalker intruded into their home.",
            "Our manager wants you to spearhead this campaign, for you have an impressive track record.",
            "The share price of their company immediately plummeted, for news of their declining sales broke out.",
            "{girl} won the spelling championship last year, but she was not able to defend her crown this year.",
        ],
    ],
];

// ---- Helpers (§8.4) ----
function ssc_box(string $html, int $minHeight = 120): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function ssc_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// ---- Question generation (§6) ----
function build_ssc_question(array $dataByTier, string $lvl, int $grd,
                            string $sessionKey, array $boys, array $girls,
                            array $surnames): ?array {
    $tier = resolve_ssc_tier($lvl, $grd);
    $tierData = $dataByTier[$tier] ?? null;
    if (!$tierData) return null;

    // 50/50: simple or compound (matches legacy $skind = rand(1,2)).
    $skind = rand(1, 2) === 1 ? 'simple' : 'compound';
    $pool = $tierData[$skind] ?? [];
    if (empty($pool)) return null;

    // No-repeat keyed per (tier, kind, index).
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        $key = "t$tier:s$skind:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:s$skind:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($pool as $i => $item) $available[] = ['key' => "t$tier:s$skind:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    // Roll names once per question (§5.2).
    $boy  = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];
    $name = (rand(1, 2) === 1) ? $boy : $girl;
    $surname = $surnames[array_rand($surnames)];

    $sentence = str_replace(
        ['{boy}', '{girl}', '{name}', '{surname}'],
        [$boy, $girl, $name, $surname],
        $pool[$pick['idx']]
    );

    return [
        'sentence' => $sentence,
        'correct'  => $skind,
        'choices'  => ['simple', 'compound'],   // fixed order: Simple | Compound
        'lvl'      => $lvl,
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
    $newQ = build_ssc_question($dataByTier, $lvl, $grd, $sessionKey, $boys, $girls, $surnames);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_ssc_question($dataByTier, 'Easy', 0, $sessionKey, $boys, $girls, $surnames);
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
    $labelClicked = ucfirst($result['clicked']);
    if ($cur['correct'] === 'compound') {
        $explain = 'This is a <strong style="color:#CC0066;">compound</strong> sentence because '
                 . 'it has two independent clauses that are connected by a coordinating '
                 . 'conjunction. The coordinating conjunctions are \'for\', \'and\', \'nor\', '
                 . '\'but\', \'or\', \'yet\', and \'so\' (FANBOYS).';
    } else {
        $explain = 'This is a <strong style="color:#CC0066;">simple</strong> sentence because '
                 . 'it has only one independent clause, has no dependent clauses, and '
                 . 'expresses a complete thought.';
    }
    $len  = strlen($cur['sentence']);
    $font = ($len > 150) ? '14pt' : ($len > 100 ? '15pt' : ($len > 60 ? '16pt' : '17pt'));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($labelClicked); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php ssc_box(
      '<div style="width:100%;font-size:' . $font . ';color:#333;line-height:1.6;text-wrap:balance;">'
    . htmlspecialchars($cur['sentence'])
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
    $len  = strlen($q['sentence']);
    $font = ($len > 150) ? '14pt' : ($len > 100 ? '15pt' : ($len > 60 ? '16pt' : '17pt'));
    $sentenceHtml = ssc_bind_last_words($q['sentence']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    What kind of sentence is this?
  </div>
  <?php ssc_box(
      '<div style="width:100%;font-size:' . $font . ';color:#333;line-height:1.6;text-wrap:balance;">'
    . $sentenceHtml
    . '</div>', 120
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
    <tr>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode('simple'); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:180px;max-width:240px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          Simple
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode('compound'); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:180px;max-width:240px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          Compound
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