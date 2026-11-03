<?php
// english/modules/pronouns-subj-obj.php
// Subject and Object Pronouns — given a sentence, type the subject pronoun or
// the object pronoun it asks for.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 6 content tiers via (level × grade); text-input answer.
//
// Data markers per sentence:
//   *subject+     &#8594; the subject pronoun
//   [object]      &#8594; the object pronoun (optional)
//
// Question mechanics (preserved from legacy):
//   • Default target = subject pronoun.
//   • If the sentence has an object pronoun, 50/50 the target switches to
//     object pronoun.
//   • Comparison is case-insensitive EXCEPT for "I", which must stay
//     capitalized (English rule). Legacy enforced the same.
//   • A trailing period on the user's input is stripped before comparison.
//
// Data fixes (§5.4) — see inline comments at the fixed entries in $rawByTier.
//
// LAYOUT RULE (mirrors objects.php): question box hugs its content with ample
// padding (inline-flex wrapper), answer input hugs answer length, 24px
// vertical spacing around the answer input.
//
// text-wrap:pretty (not balance) inside the box — balance fights shrink-to-fit
// and forces the box to max-width when the sentence wraps to 2+ lines.

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
$moduleTitle = 'Subject and Object Pronouns';
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
function resolve_pso_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 3) return 1;
        if ($grd <= 5) return 2;
        if ($grd <= 7) return 3;
        return 4;
    }
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

// ---- Data (§5) — verbatim from legacy, with placeholders + typo fixes ----
$rawByTier = [
    1 => [
        "*You+ should get [her] a steady job.",
        "*You+ must never tell [them] this lie.",
        "*She+ likes sitting next to [him].",
        "*We+ really enjoy being with [her].",
        "*You+ can tell [me] your problems.",
        "*We+ gave [them] a ball to play with.",
        "*He+ begged [her] to sing another song.",
        "*They+ asked [her] to buy a birthday cake.",
        "*I+ showed [her] my drawing yesterday.",
        "*She+ baked two carrot cakes for [us].",
        "*I+ will tell [you] another story.",
        "Did *you+ give [her] my new pencil?",
        "Did *we+ give [him] a birthday present?",
        "Have *you+ seen anything like [it]?",
        "*They+ are the ones who bullied [me].",
        "*She+ is going to ride with [us] today.",
        "*I+ have many good memories with [them].",
        "*He+ wants to go with [them] to the zoo.",
        "*I+ will pour [him] another cup of coffee.",
        "The pencil broke when *she+ used [it].",
        "The kitten was hungry so *she+ fed [it].",
        "Did *you+ show [them] your new painting?",
        "Can *you+ bring [him] some lunch?",
        "Will *you+ please hand this bag to [her]?",
        "Will *you+ please bring [me] my notebook?",
        "*She+ wants [me] to be her friend.",
        "*I+ want to be a pilot like [him].",
        "*They+ want [us] to solve that problem.",
        "Did *you+ give [her] the red roses?",
        "{name1} didn't tell [us] why *you+ are here.",
        "{name3} told [me] that *he+ is sick.",
        "The ball hit [him] so *he+ got mad.",
        "*He+ owes [her] a lot of money.",
        "*They+ visited [her] in the hospital today.",
        "*They+ make fun of [him] every single day.",
        "*They+ gathered [us] in the assembly hall.",
    ],
    2 => [
        "*She+ planted the seeds then watered [them].",
        "*We+ inspected our plane before boarding [it].",
        "The dog stole her ice cream before *it+ ran away.",
        "*You+ need pass that test in order to please her.",
        "{name3} told [him] a joke when *he+ asked for one.",
        "*We+ brought {name1} a cake to cheer [him] up.",
        "*He+ always makes excuses just to see [her].",
        "*I+ really enjoy watching movies with [you].",
        "When {name1} left, *they+ all missed [him].",
        "Tell [them] that *they+ must arrive on time.",
        "Do *you+ know if the other kids like [him]?",
        "*He+ loves to cook for [her] every morning.",
        "*He+ threw a rock at the tree but missed [it].",
        "{name3} cooked an egg but *she+ didn't eat [it].",
        "*She+ likes having a cup of coffee with [him].",
        "*She+ mentored [me] during our high school days.",
        "A car bumped Superman but *it+ didn't hurt [him].",
        "{name1} chased the hen but *he+ didn't catch [it].",
        "*He+ licked the stamps again to make [them] stick.",
        "*We+ invited [them] to attend Mass every Sunday.",
        "*He+ promised to take [them] to the city tomorrow.",
        "*She+ bought a rattle and gave [it] to her baby.",
        "Can *you+ draw another picture to amuse [her]?",
        "{name1} will give [her] a call when *they+ arrive.",
        "Catch this ball when *I+ throw [it] that way.",
        "{name1} said that *he+ will show [us] his pet mice.",
        "{name3} gave [us] apples when *she+ passed by.",
        "{name1} sang a song for [her] before *he+ left.",
        "*He+ bought [his] first car two years ago.",
        "*He+ threw the ball that hit [her] on the head.",
        "Serve [them] lunch as soon as *they+ arrive.",
    ],
    3 => [
        "{name3} wanted to go to the party but *he+ wouldn't let [her].",
        "*We+ will clean this chair and give [it] a coat of paint.",
        "{name3} broke her arm when *she+ fell from the roof.",
        "{name1} joins [us] for dinner whenever *he+ is here.",
        "The teacher stopped the fight as soon as *she+ saw [it].",
        "{name1} will show [us] the fancy sports car that *he+ bought.",
        "{name1} lent [me] the book that *he+ just finished reading.",
        "If {name3} won't eat her sandwich, *I+ will give it to [him].",
        "{name3} called [them] when *she+ heard about the storm.",
        "The books that *I+ bought from [you] are very useful.",
        "A more positive attitude is what *he+ promised [me].",
        "{name3} will smile at [him] if *she+ is in a good mood.",
        "{name1} choked on the apple when *he+ swallowed [it].",
        "When his pen got lost, *I+ was the one who found [it].",
        "*I+ saw [them] at around five o'clock in the afternoon.",
        "*They+ want [us] to participate in the school program.",
        "My friends want [me] to join the club that *they+ put up.",
        "*She+ never mentions that their group used to hate [him].",
        "{name1} always smiles at [her] every time *they+ cross paths.",
        "*I+ am his number one fan because his songs make me happy.",
        "*She+ bought a knife and used [it] for chopping vegetables.",
        "Your jokes aren't funny but *I+ will miss [them] anyway.",
        "{name1} bought an old car and now *he+ regrets buying [it].",
        "The singer sang a song for {name3} but *she+ didn't like [it].",
        "The cat tried to steal their food so *they+ chased [it] away.",
        "The box that *we+ handed [him] yesterday belongs to {name3}.",
        "The sniper fired a bullet at the enemy but *he+ missed [him].",
        "{name1} overtook [them] because *he+ was riding a bicycle.",
        "{name3} will lend [them] her bicycle if *they+ are good to her.",
        "Our aunt gave [him] that cello so *he+ can practice at home.",
        "The marching band entertained [them] until *he+ arrived.",
        "*They+ have been looking for [him] since last Tuesday.",
        "*They+ have no other choice but to leave [him] behind.",
    ],
    4 => [
        "{name1} gave his little sister a toy when *he+ found [her] crying.",
        "Their mother baked [them] some cookies because *they+ were helpful.",
        "The mailman handed {name3} a bunch of letters when *he+ saw [her].",
        "The waitress served [us] some soup before *she+ brought the sandwiches.",
        "Our teacher had read that book twice because *she+ liked [it] so much.",
        "The new music teacher taught [us] a song as soon as *she+ arrived.",
        "{name3} handed [him] an umbrella when *it+ started to rain.",
        "Can *you+ tell my best friend your outlandish story to amuse [him]?",
        "{name1} should pay for that jar because *he+ was the one who broke [it].",
        "Quick, throw [her] the ball while *she+ is looking the other way!",
        "The employees worked hard for {name1} so *he+ gave [them] all a bonus.",
        "The actor smiled at {name3} but *she+ didn't smile back at [him].",
        "{name3} gave {name1} a hammer but *he+ couldn't find [it] anymore.",
        "{name3} used acrylic paint when *she+ created a mural for [them].",
        "Her classmates bought an egg pie but *they+ forgot to bring [it] here.",
        "{name1} sang a beautiful song to [her] when *they+ finally met.",
        "Your coffee is getting cold so *you+ should drink [it] already.",
        "When {name1} tripped over a toy, *he+ fell on the bed in front of [him].",
        "{name1} gave {name3} his apology the moment *she+ asked for [it].",
        "Our boss thinks that *we+ should give [him] a better explanation.",
        "My cousin said that *I+ should sell [him] my red bicycle instead.",
        "Is it already time to serve [them] dinner or am *I+ just excited to eat?",
        "{name3} gave {name1} an invitation to her show so *he+ thanked [her].",
        "*I+ neatly stacked the newspapers here but the winds scattered [them].",
        "Please show [them] our new pavilion before *we+ start the presentation.",
        "{name3} should buy [him] a new phone before *he+ finds out what happened.",
        "{name3} and {name4} were cautious because *he+ had lied to [them] before.",
        "{name1} gave his poodle the sandwich that *he+ bought from [us] a while ago.",
    ],
    5 => [
        "Before our dinner, *I+ will pour [you] a glass of extraordinary vintage wine.",
        "When the paleontologist found the dinosaur bones, *he+ dug [them] out very carefully.",
        "{name3} emphasized the importance of individuality when *she+ gave [them] a speech.",
        "{name3} assigned the class ten math problems because *she+ wanted to challenge [them].",
        "Those basketball players became our friends not long after *they+ played against [us].",
        "If {name1} had mopped this old floor more vigorously, *he+ could have made [it] shinier.",
        "Computers consume electrical energy even if *you+ leave [them] in hibernation mode.",
        "{name1} bought his children a new puppy, knowing that *they+ will take good care of [it].",
        "{name3} bakes a large chocolate cake for [them] every time *he+ visits the orphanage.",
        "The college professor showed [them] his new tablet before *he+ started his lecture.",
        "These nurses deserve a higher pay because *they+ are serving [us] really well.",
        "Our doctors treated the homeless man for free because *they+ wanted to give [him] hope.",
        "Is it true that *he+ sold [her] his mansion for less than one million pesos?",
        "The tree remained standing in front of [them] after *it+ was struck by lightning.",
        "These doctors deserve a higher pay because *they+ are really serving [us] well.",
        "The volunteers gave {name1} a thick towel before *they+ handed [him] some food.",
        "{name3} lent her brother some money after being told that *he+ needed [it] badly.",
        "{name3} sells most of her wood carvings to [him] because *he+ is a good customer.",
        "{name1} and *I+ promised [them] a theme park adventure when the wet season is over.",
        "{name3} bought costumes for [them] so *they+ will have something to use for the play.",
        "If the conference wouldn't be held in August, *they+ wouldn't be able to attend [it].",
        "{name3} always makes time for [him] even though *she+ has a very busy schedule.",
        "*We+ were so happy when {name1} told [us] that {name3} would be at our dinner party.",
        "{name3} has many exciting ideas for the summer event that *she+ is planning with [them].",
        "*They+ upgraded their computer laboratory to keep [it] current with industry standards.",
        "The librarian asked [us] to immediately return the books that *we+ borrowed last week.",
        "{name3} requested a special program for [her] birthday so *they+ came up with one.",
    ],
    6 => [
        "{name3} taught her students some safety rules before *she+ let [them] start the experiment.",
        "{name1} revealed a tightly guarded secret to [him] when *they+ were in the conference room.",
        "{name3} sold {name1} a cup of coffee but *he+ didn't drink [it] because of his sore throat.",
        "Kindly tour [her] around our new computer laboratory before *we+ start the orientation.",
        "The president's inspiring words to the soldiers when *he+ went to their camp will make [them] even more loyal.",
        "The gigantic asteroid agitated great amounts of dust when *it+ hit, leading to the mass extinctions.",
        "Those social workers must bring more food with [them] so *they+ can feed the flood victims better.",
        "The training department lent [me] this powerful projector so *I+ can give a great presentation.",
        "The emergency operation eliminated the source of the bleeding but *they+ still confined [him] to the hospital.",
        "The director assigned the actor a difficult role but *he+ still amazed [her] with his awesome performance.",
        "That innovation will expedite our product development process so *we+ consider [it] an important achievement.",
        "That gift that {name1} gave {name3} has a symbolic meaning, which is why *she+ appreciated [it] very much.",
        "The statisticians rechecked the experiment's results after *they+ perceived [them] to be skewed.",
        "The mechanics checked the diesel engine after *they+ found [it] to be unstable and lacking in power.",
        "Those high-end drones are capable of delivering products to [them] even if *they+ are twenty kilometers away.",
        "When will the professor teach [them] the concepts of thermodynamics if *he+ is going abroad next week?",
        "The zookeeper brought the lionesses and their cubs a huge heap of meat so *he+ could observe [them] eat.",
        "The dedicated social worker helped [them] escape to a safer place despite the fact that *he+ was already very exhausted.",
        "Why would our manager give [us] a higher sales target if *we+ couldn't even hit the previous one?",
        "That old judge will give {name1} and his cohorts a harsh punishment if *he+ finds [them] guilty.",
        "A more effective solution to the problem is what *she+ needs to present to [them] during the next meeting.",
        "The editor will teach her writers modern writing techniques because *she+ wants [them] to attract the millenials.",
        "The entrepreneur bought [us] five tickets to the trade fair that *we+ were planning to go to.",
    ],
];

// ---- Parser (§5.1) ----
function pso_parse(string $raw): ?array {
    $subjp = null; $objp = null;
    if (preg_match('/\*([^+]+)\+/u', $raw, $m)) {
        $subjp = $m[1];
        $raw = preg_replace('/\*[^+]+\+/u', '{SUBJ}', $raw, 1);
    }
    if (preg_match('/\[([^\]]+)\]/u', $raw, $m)) {
        $objp = $m[1];
        $raw = preg_replace('/\[[^\]]+\]/u', '{OBJ}', $raw, 1);
    }
    if ($subjp === null) return null;
    return [
        'template' => $raw,
        'subjp'    => $subjp,
        'objp'     => $objp,
    ];
}

// ---- Render helpers (§8.2 target #CC0066) ----
function pso_render(array $p, string $highlight = ''): string {
    $subjEsc = htmlspecialchars($p['subjp']);
    $objEsc  = $p['objp'] !== null ? htmlspecialchars($p['objp']) : '';

    if ($highlight === 'subjp') {
        $subjEsc = '<strong style="color:#CC0066;">' . $subjEsc . '</strong>';
    } elseif ($highlight === 'objp' && $p['objp'] !== null) {
        $objEsc = '<strong style="color:#CC0066;">' . $objEsc . '</strong>';
    }

    $html = htmlspecialchars($p['template']);
    $html = str_replace('{SUBJ}', $subjEsc, $html);
    if ($p['objp'] !== null) {
        $html = str_replace('{OBJ}', $objEsc, $html);
    }
    return $html;
}

// Hugging box — outer text-align:center wrapper + inner inline-flex that
// shrink-wraps content. inline-flex avoids the width:fit-content + flex
// sizing conflict; vertical-align:middle prevents baseline gap.
function pso_box(string $html, int $minHeight = 100): void {
    echo '<div style="text-align:center;">'
       . '<div style="display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'vertical-align:middle;'
       . 'min-height:' . $minHeight . 'px;max-width:480px;'
       . 'margin:20px 0;padding:28px 40px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html
       . '</div>'
       . '</div>';
}

// ---- Question generation (§6) ----
function build_pso_question(array $rawByTier, string $lvl, int $grd,
                            string $sessionKey, array $boys, array $girls): ?array {
    $tier = resolve_pso_tier($lvl, $grd);
    $pool = $rawByTier[$tier] ?? [];
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

    $name1 = $boys[array_rand($boys)];
    do { $name2 = $boys[array_rand($boys)]; } while ($name2 === $name1);
    $name3 = $girls[array_rand($girls)];
    do { $name4 = $girls[array_rand($girls)]; } while ($name4 === $name3);

    $raw = str_replace(
        ['{name1}', '{name2}', '{name3}', '{name4}'],
        [$name1, $name2, $name3, $name4],
        $pool[$pick['idx']]
    );

    $parsed = pso_parse($raw);
    if ($parsed === null) return null;

    $asked  = 'subject pronoun';
    $answer = $parsed['subjp'];
    if ($parsed['objp'] !== null && rand(1, 2) === 1) {
        $asked  = 'object pronoun';
        $answer = $parsed['objp'];
    }

    return [
        'parsed' => $parsed,
        'asked'  => $asked,
        'answer' => $answer,
        'lvl'    => $lvl,
    ];
}

// ---- Answer processing (§7 — text input, with legacy "I" capitalization rule) ----
$result = null; $scorer = null;
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $userRaw = rtrim(trim((string)($_POST['answer'] ?? '')), '.');

    $userNorm    = ($userRaw === 'I') ? 'I' : strtolower($userRaw);
    $correctNorm = ($cur['answer'] === 'I') ? 'I' : strtolower($cur['answer']);
    $userNorm    = str_replace(' ', '', $userNorm);
    $correctNorm = str_replace(' ', '', $correctNorm);
    $isCorrect   = ($userNorm === $correctNorm);

    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer(
        $isCorrect ? $cur['answer'] : $userRaw,
        $cur['answer'],
        $cur['lvl']
    );

    $result = ['correct' => $isCorrect, 'clicked' => $userRaw, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) — with tier-1 fallback ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_pso_question($rawByTier, $lvl, $grd, $sessionKey, $boys, $girls);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_pso_question($rawByTier, 'Easy', 0, $sessionKey, $boys, $girls);
        if ($fallback !== null) $_SESSION[$sessionKey]['current'] = $fallback;
    }
}

// ---- Render (§8, §10) ----
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
    $cur    = $result['cur'];
    $p      = $cur['parsed'];
    $target = ($cur['asked'] === 'subject pronoun') ? 'subjp' : 'objp';
    $sentenceHtml = pso_render($p, $target);

    $pronounKind = ($cur['asked'] === 'subject pronoun') ? 'subject pronoun' : 'object pronoun';
    $ansEsc      = '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['answer']) . '\'</strong>';

    $explain = 'The <strong style="color:#CC0066;">' . $pronounKind . '</strong> '
             . 'in this sentence is ' . $ansEsc . '.';

    $sentenceLen  = strlen(strip_tags($sentenceHtml));
    $sentenceFont = ($sentenceLen > 150) ? '14pt' : ($sentenceLen > 100 ? '15pt' : ($sentenceLen > 60 ? '16pt' : '17pt'));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php pso_box(
      '<div style="font-size:' . $sentenceFont . ';color:#333;line-height:1.6;text-wrap:pretty;">'
    . $sentenceHtml
    . '</div>', 100
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
    $p            = $q['parsed'];
    $sentenceHtml = pso_render($p, '');
    $sentenceLen  = strlen(strip_tags($sentenceHtml));
    $sentenceFont = ($sentenceLen > 150) ? '14pt' : ($sentenceLen > 100 ? '15pt' : ($sentenceLen > 60 ? '16pt' : '17pt'));
    $askedLabel   = ($q['asked'] === 'subject pronoun')
        ? '<span style="color:#CC0066;">subject pronoun</span>'
        : '<span style="color:#CC0066;">object pronoun</span>';

    $anslen    = strlen($q['answer']);
    $inputSize = max(10, min(20, $anslen + 5));
    $inputMax  = max(20, $anslen + 10);
    $inputFont = '24px';
?>
  <div style="margin:35px auto 8px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    What's the <?php echo $askedLabel; ?> in this sentence?
  </div>
  <div style="font-family:Arial,sans-serif;font-size:12pt;color:#666;max-width:480px;margin:0 auto 14px;line-height:1.4;">
    Type only the pronoun (e.g., <em>"she"</em> or <em>"her"</em>).
  </div>
  <?php pso_box(
      '<div style="font-size:' . $sentenceFont . ';color:#333;line-height:1.6;text-wrap:pretty;">'
    . $sentenceHtml
    . '</div>', 100
  ); ?>
  <div style="margin:24px auto;font-family:Arial,sans-serif;">
    <label style="font-size:14pt;color:#800080;font-weight:700;">Answer:
      <input type="text" name="answer"
             size="<?php echo $inputSize; ?>" maxlength="<?php echo $inputMax; ?>"
             autocomplete="off"
             style="font-family:Arial,sans-serif;font-size:<?php echo $inputFont; ?>;font-weight:700;
                    color:#0000CC;text-align:center;padding:8px 12px;
                    border:2px solid #888888;border-radius:8px;background:#fff;
                    box-sizing:border-box;max-width:100%;">
    </label>
  </div>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit1" value=" Submit " style="margin-right:12px;font-family:Arial,sans-serif;font-size:11pt;">
    <input type="submit" name="Submit2" value=" New Question " style="margin-left:12px;font-family:Arial,sans-serif;font-size:11pt;">
  </div>
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