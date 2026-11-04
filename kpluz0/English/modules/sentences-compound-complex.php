<?php
// english/modules/sentences-compound-complex.php
// Compound, Complex, and Compound-Complex Sentences — identify the sentence
// type of each passage.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 3 M/C choices (1×3 grid).
//
// Legacy had Easy/Medium/Hard. Modern folds legacy Medium into Hard per §3.2.
//
// Data markers: {boy} {girl} {name} {surname} — rolled once per question.
// {name} is a random boy OR girl (matches legacy's rand(1,2) roll).
//
// LAYOUT (mirrors analogy.php / nouns-using.php):
//   [Hugging box with sentence, vertically centered, adaptive font]
//   [Click on the correct answer below. — gray]
//   [Choices: Compound | Complex | Compound-Complex in 1×3 grid]
//
// Feedback: replicates the question-page presentation — same yellow box,
// sentence shown as-is. Below the box: "The correct answer is 'Compound'."

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
$moduleTitle = 'Compound, Complex, and Compound-<br/>Complex Sentences';
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
function resolve_cc_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 5) return 1;
        if ($grd <= 7) return 2;
        return 3;
    }
    // Hard — legacy Hard formula
    if ($grd <= 5) return 3;
    if ($grd <= 7) return 4;
    return 5;
}

// ---- Name pools (§5.2) — verbatim from legacy ----
$boyPool = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos',
    'Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian',
    'Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph',
    'Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael',
    'Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel',
    'Sebastian','Thomas','William'];
$girlPool = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille',
    'Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah',
    'Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla',
    'Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi',
    'Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];
$surnamePool = ['Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales',
    'Martinez','Mendez','Paredes','Revilla','Santos','Tolentino'];

// ---- Data (§5) — verbatim from legacy (184 items across 5 tiers × 3 types) ----
$dataByTier = [
    1 => [
        'compound' => [
            "{boy} prepared some hot soup for {girl}, for she is feeling cold.",
            "He does not help around the house, nor does he look for a job.",
            "This is a useful rule, but it's quite difficult to remember.",
            "It's definitely not spacious, but it is a practical kitchen.",
            "You can give her some money or you can buy her some food.",
            "{girl} can buy the book, or she can borrow it from the library.",
            "She is a great singer, yet nobody has ever asked her to sing.",
            "{girl} didn't eat any breakfast, yet she doesn't look hungry.",
            "{girl} forgot her shoes, so she wasn't able to hike with them.",
            "I wanted to get a nice seat, so I ordered my tickets early.",
            "I wasn't able to study hard, but I still got a high score.",
            "They asked him how he got wounded, but he refused to answer.",
            "I wanted to buy a cute puppy, so I started to save my money.",
            "{girl} did not like to read, for she was not very good at it.",
            "Let's go to the swimming pool, for it's hot inside the house.",
            "Rabbits make good pets, for they don't make too much noise.",
        ],
        'complex' => [
            "{name} was filled with sorrow when that terrible incident took place.",
            "{boy} is very happy because he was able to track his lost luggage.",
            "{name} didn't recognize me when we bumped into each other yesterday.",
            "{girl} was extremely shy when she was still in elementary school.",
            "Because my coffee was too cold, I heated it in the microwave.",
            "{girl} returned the computer after she noticed it was damaged.",
            "{girl} got promoted quickly because she was bright and ambitious.",
            "The movie was still enjoyable, even though it was very long.",
            "The museum was very interesting, as I and my friends expected.",
            "Because he is rich and powerful, people tolerate his idiosyncrasies.",
            "After the tornado hit the town, there was little left standing.",
            "Let's go back to the restaurant where we had our first date.",
            "Although my cousin invited me, I chose not to go to the reunion.",
            "I really didn't like the play although the acting was very good.",
            "Everyone laughed when he got a cream pie smashed in his face.",
            "It's not advisable to eat a heavy or spicy meal before you go to bed.",
            "{boy} repainted his bicycle because he wanted to make it look new.",
            "{name} did not bring an umbrella even though it was raining hard.",
            "The men continued to work even though they were tired and hungry.",
            "The woman drove the car to the mall even though it had a flat tire.",
            "I can just watch a movie while you're shopping for new clothes.",
            "You can only watch a movie after you finish all your assignments.",
            "{boy} put on his life vest before he left on that small rubber boat.",
            "{boy} didn't stop eating until there's nothing left on his plate.",
            "The machine didn't stop making noise until they turned it off.",
            "{boy} shouldn't go near that murky river unless he's a good swimmer.",
            "{girl} is a good daughter because she always obeys her parents.",
            "Please stop blowing that horn because it is really annoying.",
            "Please don't call me at the office unless there's a real emergency.",
        ],
        'compound-complex' => [
            "{girl} likes cakes because they're sweet, so she buys one every week.",
            "Spiders scare me because they look ugly, so I avoid them all the time.",
            "I ate a lot of seafood when I was there, so I'd have a steak today.",
            "We watched a movie while we were waiting, so we didn't get bored.",
            "He drank some water before he ran the race, so he didn't get thirsty.",
            "They forgot the food when they left, so they bought some canned goods.",
            "{boy} got hurt when he went hiking, so he had to go to the hospital.",
            "I jog every day while the sun sets, but it rained hard this afternoon.",
            "I enjoy dancing while {girl} is singing, but my legs hurt right now.",
            "I like drinking coffee while I'm watching TV, but I can't find my cup.",
            "The dog barked when the stranger appeared, but they didn't hear it.",
            "{boy} loves his car, but he will sell it if the price is right.",
            "She often wakes up at eleven, but she can get up early if she has work.",
            "I hate vegetables, but I'll eat my carrots if my mother asks me to.",
            "{boy} likes cartoons, but he can't watch them if it is not Saturday.",
            "He wants ice cream, but he can't find some because it's midnight.",
            "{boy} was almost home, but he lost his way because it was very foggy.",
            "{girl} studied hard, but she got a low grade because she came in late.",
            "{boy} found a toy, but he threw it away because its face was scary.",
            "They bought a cake, but they didn't eat it because it was stale.",
        ],
    ],
    2 => [
        'compound' => [
            "{girl} can fill an audience with joy, or she can make them cry a river.",
            "I would love to try the green mangoes, but they might upset my stomach.",
            "{girl} arrived late in the office, so her boss made her stay after five.",
            "I don't like animated movies, nor am I a fan of movies about World War II.",
            "Our cat doesn't like dry cat food, nor does it like a saucer of clam stew.",
            "The timid employee wanted to impress his boss, but he didn't know what to do.",
            "The people were hysterical and unrestrained, but he managed to pacify them.",
            "I like music very much, yet I don't want to spend any money for that concert.",
            "Our engineer can rehabilitate this old machine, or we can just buy a new one.",
            "The zookeeper handled the snake very carefully, for he didn't want to be bitten.",
            "{boy} designed the computer hardware, and {girl} developed the needed software.",
            "The students couldn't see the lunar eclipse, for the clouds blocked the moon.",
        ],
        'complex' => [
            "{name} was very competitive when they joined that math olympiad long ago.",
            "Mr. {surname} can make abstract paintings as well as he can write movie scripts.",
            "{name} was very popular when we were still students in the same university.",
            "I have to save this coupon because I don't have time to shop right now.",
            "Evergreen trees are a symbol of fertility because they do not die in the winter.",
            "The famous singer performed magnificently while his audience watched him in awe.",
            "Please help me choreograph this dance number until our dance instructor arrives.",
            "Mr. {surname} lives in a small and old house even though he is a millionaire.",
            "We can still solve this predicament even though we lack the necessary resources.",
            "{boy} will donate his books to the library even though he is very attached to them.",
            "{boy} and {girl} had an intense argument before they finally decided to part ways.",
            "We can go on vacation after we complete and submit all these business proposals.",
            "{boy} felt sick immediately after he drank that cleaning solution by accident.",
            "You can't submit the application form unless all the blanks are filled in.",
            "{girl} didn't learn to play the guitar until she reached the age of fifteen.",
        ],
        'compound-complex' => [
            "{girl} doesn't like cartoons because they are loud, so she doesn't watch them.",
            "I enjoyed 'Star Wars' because I love science fiction, but my sister hates it.",
            "Since it's his birthday, his mom went to the store and she bought him a present.",
            "He already wants to move, but he has to live in that apartment until he graduates.",
            "They sang songs as they washed the dishes, so they enjoyed doing their chore.",
            "The teacher got mad because the pupils were very noisy, so she gave them a quiz.",
            "{girl} gave {boy} a shirt, but he didn't wear it because he didn't like the color.",
            "{boy} caught a fish, but he threw it back in the lake because it wasn't big enough.",
            "I learned a lot when I went through that training, so I'm a better employee now.",
            "{boy} hates algebra, but he can solve difficult word problems if he wants to do so.",
            "{boy} wants a bicycle, but he can't buy one because he hasn't saved enough money.",
            "{boy} made a new friend, but he couldn't remember his name because it was too long.",
        ],
    ],
    3 => [
        'compound' => [
            "{girl} wrote the script for that documentary video and {boy} was the one who narrated it.",
            "I have studied Spanish for many years, so my Spanish-speaking friends can chat easily with me.",
            "They had the mental toughness to finish the adventure, but they were too exhausted to go on.",
            "We were able to secure the loan to buy the property, but someone else had bought it already.",
            "The physicist tried to finish his experiment this week, but he ran out of time and resources.",
            "The laws in that country are very strict, yet there are many crime syndicates thriving there.",
            "The students have started studying diligently, for they will soon have their periodical tests.",
            "You must not invest your money in that business, for people say that it's not legitimate.",
            "Our manager wants you to spearhead this campaign, for you have an impressive track record.",
        ],
        'complex' => [
            "{girl} can compose romantic ballads as well as she can solve difficult algebra problems.",
            "{boy} couldn't write a computer program since he never got the opportunity to learn how.",
            "{boy} drank more than a liter of iced tea after he ran for two hours in that marathon.",
            "Their negotiation ended on a stalemate because neither side is willing to compromise.",
            "The company decided to hire the engineer even though they knew very little about him.",
            "The boys took off their shoes because they didn't want to scratch the shiny wooden floors.",
            "{boy} consistently won those spelling championships until {girl} wrested the title from him.",
            "Our manager wants you to spearhead this campaign because you have an impressive track record.",
            "You will represent our school in that contest because you topped all the evaluation tests.",
            "You must not invest your money in that business unless you have proof that it's legitimate.",
            "The cheerleaders should continue practicing in this gym until they perfect their routine.",
        ],
        'compound-complex' => [
            "{girl} forgot her friend's birthday, so she sent her a card when she finally remembered.",
            "When we won the championship, the players hugged each other and the fans cheered wildly.",
            "Even though she was tired, {girl} knew she had to finish the race so she exerted more effort.",
            "We ate snacks while we were working on our science project, so we didn't get hungry.",
            "The professor got angry when the students ruined the experiment, so he left the room.",
            "My cousin practiced for many days before she joined the competition, yet she was eliminated.",
            "{girl} worked hard on her painting, but she hadn't finished it yet because she got sick.",
            "My friend loves to watch tiger cubs play, but he can't go to the zoo if it's not his day-off.",
            "They prepared well before their enemies attacked, so they were able to defend their village.",
            "Each of us prepared hard for weeks before the contest was held, yet our team lost to them.",
        ],
    ],
    4 => [
        'compound' => [
            "We will make a huge fortune soon, for this is the coolest product to ever come out of our factory.",
            "The company can just buy the software, or it can hire a team of programmers to develop a similar one.",
            "Mankind's technology has advanced tremendously over the years, yet world peace is as elusive as ever.",
            "{boy} followed the given instructions step by step, yet he wasn't able to make the mechanism work.",
            "That pharmaceutical company registered record-breaking profits, so its investors are all ecstatic.",
            "The share price of their company immediately plummeted, for news of their declining sales broke out.",
            "{girl} won the spelling championship last year, but she was not able to defend her crown this year.",
            "The governor wanted to impress his constituents, so he spent a lot of money on infrastructure.",
        ],
        'complex' => [
            "{name} should continue applying this medicated cream on his skin until all the symptoms are gone.",
            "The surgeons won't perform any operation on {boy} unless his relatives agree to sign that waiver.",
            "His mother asked him to eat his breakfast first before she allowed him to go out with his friends.",
            "They must refrain from using this tranquilizer gun on that animal unless their lives are in danger.",
            "The share price of their company immediately plummeted after news of their declining sales broke out.",
            "You should have your car's air conditioning unit fixed first before you embark on that long drive.",
            "The students have started studying diligently because they will soon have their periodical tests.",
            "The crocodile greedily gorged on the antelope even though it had just eaten a gazelle the day before.",
            "The mechanic just refurbished the engine because it is more expensive to replace it with a new one.",
        ],
        'compound-complex' => [
            "{boy} couldn't speak Chinese since he didn't find it important enough to learn, nor could he speak Japanese.",
            "Though {girl} loves romantic films, she watched the latest spy thriller, and she enjoyed it very much.",
            "Although I like to go camping, I haven't had the time to go lately, and I haven't found anyone to go with.",
            "His uncle had become rich after he opened a restaurant, but he still drives an old truck today.",
            "{boy} wants to own a business, but he can't start one because he doesn't have enough capital yet.",
            "The project was almost complete, but it got shelved because the manager's priorities had changed.",
            "They rented a van for a week, but they were not able to use it because their trip was cancelled.",
            "They didn't go to expensive restaurants when they were in Europe, so they didn't run out of money.",
            "{girl} felt abandoned because her best friend moved to Japan, yet she seemed to have enjoyed that party.",
        ],
    ],
    5 => [
        'compound' => [
            "The leasing manager should not tolerate their incessant complaining, nor should he extend their lease on this facility.",
            "The mountainside has been completely denuded by illegal loggers, so various organizations launched a reforestation project.",
            "The radio reported that a powerful thunderstorm was coming, so {name} prepared enough food and water for seven days.",
            "Mr. {surname} tutored his daughter on algebra for many hours, but she still performed dismally in her periodical test.",
            "The activists were not allowed to stage a demonstration, nor were they given a chance to express their demands to the mayor.",
            "You shouldn't waste a single drop of that exotic oriental broth, for it is very expensive and time-consuming to prepare.",
            "{boy} was picked as a prime candidate for the next batch of astronauts, for he was physically and mentally fit for the job.",
            "The institution doesn't have the financial capability to pursue this project, nor does it have the political will to do so.",
            "The private organization did its best to serve the community, yet the mayor and the city council did not appreciate their efforts.",
        ],
        'complex' => [
            "The biologist tranquilized the agitated rhinoceros so that they could perform the necessary surgery on its injured leg.",
            "Mr. {surname} promised to pay for his nephews' tuition fees even though he was having some financial problems of his own.",
            "They were able to complete the project on time even though they encountered so many technical obstacles along the way.",
            "The customer service manager doesn't want to honor the warranty until she receives the original proof of purchase from us.",
            "They proceeded with the construction of the building even though some of their investors have already backed out.",
            "You must not distribute these electronic gadgets unless you have documents proving that they are safe for public use.",
            "Their department is expediting the production of the ordered goods because they want to make a good first impression on the buyer.",
            "Although all her friends went to Bruno Mars' concert, {girl} decided to just stay home and study for her chemistry test.",
        ],
        'compound-complex' => [
            "{girl} didn't learn to play chess since nobody in her family taught her the game, nor did she learn to speak any foreign language.",
            "Artificial intelligence will help us solve real problems, but many experts fear it because it could take over the world someday.",
            "The colonel was exhausted because their military exercises were very strenuous, so he did not go sky diving with us anymore.",
            "Mrs. {surname} can cook adobo as well as she can draw cartoon characters, and she is very good at playing the piano too.",
            "The singer practiced for months, but she failed to deliver a captivating performance because her voice was hoarse that night.",
            "The entrepreneur invested his capital wisely when he started his business, so his company became profitable in less than a year.",
            "{girl} was sorrowful because they lost their business, yet she appeared to be unperturbed throughout the celebration yesterday.",
        ],
    ],
];

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function cc_box(string $html, int $minHeight = 100): void {
    echo '<div style="display:flex;flex-direction:column;justify-content:center;'
       . 'width:fit-content;max-width:480px;'
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto;padding:20px 32px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function cc_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function cc_roll_values(): array {
    global $boyPool, $girlPool, $surnamePool;
    $boy  = $boyPool[array_rand($boyPool)];
    $girl = $girlPool[array_rand($girlPool)];
    $name = (rand(1, 2) === 1) ? $boy : $girl;
    return [
        'boy'     => $boy,
        'girl'    => $girl,
        'name'    => $name,
        'surname' => $surnamePool[array_rand($surnamePool)],
    ];
}

function cc_display_choice(string $c): string {
    $map = [
        'compound'         => 'Compound',
        'complex'          => 'Complex',
        'compound-complex' => 'Compound-Complex',
    ];
    return $map[$c] ?? ucfirst($c);
}

// ---- Question generation (§6) ----
function build_cc_question(array $dataByTier, string $lvl, int $grd, string $sessionKey): ?array {
    $tier = resolve_cc_tier($lvl, $grd);
    $tierData = $dataByTier[$tier] ?? null;
    if (!$tierData) return null;

    // Roll sentence type: compound, complex, or compound-complex (equal chance).
    $types = ['compound', 'complex', 'compound-complex'];
    $type  = $types[array_rand($types)];
    $pool  = $tierData[$type] ?? [];
    if (empty($pool)) return null;

    // No-repeat keyed per (tier, type, index).
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        $key = "t$tier:$type:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:$type:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($pool as $i => $item) $available[] = ['key' => "t$tier:$type:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $values   = cc_roll_values();
    $sentence = cc_apply_placeholders($pool[$pick['idx']], $values);

    return [
        'sentence' => $sentence,
        'answer'   => $type,
        'choices'  => ['compound', 'complex', 'compound-complex'],
        'lvl'      => $lvl,
    ];
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

// ---- Question generation (§6) — with tier-1 fallback if generation fails ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_cc_question($dataByTier, $lvl, $grd, $sessionKey);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_cc_question($dataByTier, 'Easy', 0, $sessionKey);
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
    $question = htmlspecialchars($cur['sentence']);
    $len      = strlen($question);
    $font     = ($len > 120) ? '14pt' : ($len > 80 ? '15pt' : '16pt');
    $ansEsc   = '<strong style="color:#CC0066;">\'' . htmlspecialchars(cc_display_choice($cur['answer'])) . '\'</strong>';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars(cc_display_choice($result['clicked'])); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php cc_box(
      '<div style="font-size:' . $font . ';color:#333;line-height:1.55;text-align:center;">'
    . $question
    . '</div>', 100
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The correct answer is
    <?php echo $ansEsc; ?>.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q        = $_SESSION[$sessionKey]['current'];
    $question = htmlspecialchars($q['sentence']);
    $len      = strlen($question);
    $font     = ($len > 120) ? '14pt' : ($len > 80 ? '15pt' : '16pt');
?>
  <?php cc_box(
      '<div style="font-size:' . $font . ';color:#333;line-height:1.55;text-align:center;">'
    . $question
    . '</div>', 100
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="12" cellpadding="0" style="margin:0 auto;">
    <tr>
    <?php foreach ($q['choices'] as $c): ?>
      <td align="center" valign="middle" style="vertical-align:middle;">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  width:170px;height:70px;padding:10px 12px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:14pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.25;">
          <?php echo htmlspecialchars(cc_display_choice($c)); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  </table>
  
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>

<!-- Difficulty radios (§10.4 — Easy / Hard only, 12pt label) -->
<div align="center" style="margin-top:20px;">
  <p style="margin-bottom:0;color:#000080;font:12pt Arial,sans-serif;">Select difficulty level for next question:</p>
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