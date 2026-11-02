<?php
// english/modules/adjectives-kinds.php
// Kinds of Adjectives — identify the type of a highlighted adjective in a sentence.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 6 content tiers via (level × grade); 4 M/C choices (2×2 grid).
//
// Grade-awareness:
//   • Tier (sentence-list difficulty) scales by grade per legacy formula.
//   • Grade 1 (all levels) and grade 2 (Easy only) see only count/mass — gate
//     preserved from nouns-kinds.php does NOT apply here; this module has no
//     such gate. Full 6 adjective types available per tier.
//
// Data markers:
//   * … +   surrounds the target adjective inside each sentence; rendered as
//           pink highlight (#CC0066) in both question and feedback boxes.
//   {name1} {name2} {name3} {name4}
//           placeholders substituted per-question with random boy/girl names.
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
$moduleTitle = 'Kinds of Adjectives';
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
function resolve_ak_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 3) return 1;
        if ($grd <= 5) return 2;
        if ($grd <= 7) return 3;
        return 4;
    }
    // Hard — legacy Hard formula (harder of Medium/Hard)
    if ($grd <= 3) return 3;
    if ($grd <= 5) return 4;
    if ($grd <= 7) return 5;
    return 6;
}

// ---- Name pools (§5.2) — verbatim from legacy ----
$boys = [
    'Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles',
    'Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac','Jack',
    'Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan',
    'Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas',
    'Noah','Oliver','Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William',
];
$girls = [
    'Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline',
    'Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah','Isabella','Jasmine',
    'Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia',
    'Madeline','Maria','Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha',
    'Sarah','Sophia','Stella','Tina','Victoria',
];

// ---- Data (§5) — verbatim from legacy, with name placeholders ----
// Format: "<sentence with *target+ markers and {nameX} placeholders>=<category>"
$rawByTier = [
    1 => [
        "{name1} likes to watch *funny+ movies.=descriptive",
        "The *old+ computer is broken.=descriptive",
        "The *cute+ puppy followed us home.=descriptive",
        "{name1} gave the *colorful+ toy to {name3}.=descriptive",
        "*These+ coats will look good on them.=demonstrative",
        "*This+ fish tank is very relaxing.=demonstrative",
        "*That+ bird looks really strange.=demonstrative",
        "*That+ toy is his favorite.=demonstrative",
        "*Those+ houses are very old.=demonstrative",
        "{name1} and {name3} are *our+ friends.=possessive",
        "I know where *her+ kittens are hiding.=possessive",
        "{name3} always listens to *his+ songs.=possessive",
        "*Their+ children play in the park often.=possessive",
        "Can you please help me with *my+ homework?=possessive",
        "*His+ dinner will be special tonight.=possessive",
        "*Her+ hut is on that hill.=possessive",
        "*Your+ shirts are in the white cabinet.=possessive",
        "*My+ painting used to be in this room.=possessive",
        "*Our+ van can't go very fast.=possessive",
        "*Which+ school are you enrolled in?=interrogative",
        "*Which+ couple won in the dance contest?=interrogative",
        "*Which+ pet will you take home?=interrogative",
        "*Whose+ mother was here this morning?=interrogative",
        "*Whose+ project won the contest?=interrogative",
        "*Whose+ book is he reading?=interrogative",
        "*What+ name did you give your puppy?=interrogative",
        "*What+ animals did you see in the zoo?=interrogative",
        "{name1} bought *three+ pencils.=numeral",
        "{name3} gave me *five+ candies.=numeral",
        "{name3} is their *first+ daughter.=numeral",
    ],
    2 => [
        "The *beautiful+ girl looked at herself in the mirror.=descriptive",
        "He is a *famous+ musician from our province.=descriptive",
        "{name3} and I will stay in *this+ house.=demonstrative",
        "{name1} keeps his shoes under *that+ bed.=demonstrative",
        "Please return *those+ pencils to the box on the table.=demonstrative",
        "*Those+ trees will have no leaves left by October.=demonstrative",
        "{name3} bought *these+ tickets from {name1}.=demonstrative",
        "*These+ flowers will look very pretty in that vase.=demonstrative",
        "{name1} and {name3} are famous doctors in *our+ town.=possessive",
        "It's *her+ birthday today, so I bought a present for her.=possessive",
        "*His+ cousin graduated from high school yesterday.=possessive",
        "Did *your+ classmate really invent this gadget?=possessive",
        "*Their+ chickens lay eggs every day.=possessive",
        "*What+ program are you watching right now?=interrogative",
        "*Which+ book on gardening do you recommend?=interrogative",
        "*Which+ assignment did you finish a while ago?=interrogative",
        "*Which+ team won in today's basketball game?=interrogative",
        "He should serve *some+ ice cream to his guests.=quantitative",
        "We have *enough+ rice for everybody so don't worry.=quantitative",
        "They prepared *some+ soup for our dinner.=quantitative",
        "{name3} has *little+ wine left for cooking.=quantitative",
        "You put *too much+ water in the fish pond.=quantitative",
        "{name3} sang *three+ songs before going home.=numeral",
        "We watched *two+ movies here last night.=numeral",
        "Please perform *one+ dance number for us.=numeral",
        "This is my *fourth+ cup of ice cream today.=numeral",
    ],
    3 => [
        "The lady beside {name1} is the *youngest+ teacher in their school.=descriptive",
        "{name1} bought that *yellow+ shirt yesterday for his father.=descriptive",
        "The contestant with the *largest+ pumpkin gets the prize money.=descriptive",
        "{name3} suddenly found herself in a *dangerous+ part of that town.=descriptive",
        "{name1} lived all by himself in *that+ house for a long time.=demonstrative",
        "It's getting cold so we must find *those+ blankets soon.=demonstrative",
        "{name1} is the publisher of *this+ book on global warming.=demonstrative",
        "{name3} did not include *these+ statues in their exhibit yesterday.=demonstrative",
        "{name3} thought that *these+ inventions will make them very wealthy.=demonstrative",
        "I really want to get them a unique gift for *their+ silver wedding anniversary.=possessive",
        "{name1} kicked the orange ball so hard that *his+ shoe came off.=possessive",
        "*Their+ decision to purchase this machine is very timely indeed.=possessive",
        "As you can see, *our+ diet consists mainly of fish and vegetables.=possessive",
        "*Her+ tourism campaign cost the government a lot of money.=possessive",
        "*Whose+ truck is being repaired in our garage right now?=interrogative",
        "*What+ material makes this container so strong and yet so light?=interrogative",
        "*Which+ vehicle will we use to parade the statue this afternoon?=interrogative",
        "I will cook *some+ spaghetti for {name3} and {name4} tonight.=quantitative",
        "{name1} put a *little+ wine in the soup before stirring it.=quantitative",
        "{name3} has *enough+ rice to sell in the market tomorrow.=quantitative",
        "Putting *too much+ vinegar in your salad will ruin its flavor.=quantitative",
        "{name3} was disappointed when she found *no+ milk in the jug.=quantitative",
        "Can you check if we have *any+ orange juice left in the pitcher?=quantitative",
        "He can't go to the mall because he only has *twenty+ pesos.=numeral",
        "We're all glad that *many+ people attended our seminar today.=numeral",
    ],
    4 => [
        "The *careless+ driver whose car rammed the barricade was penalized with a hefty fine.=descriptive",
        "Their math professor, whom I greatly respect, recently received a *prestigious+ award.=descriptive",
        "I'm eager to meet *that+ philanthropist for a variety of good reasons.=demonstrative",
        "Be aware that the bats have aggregated in very large numbers in *those+ caves.=demonstrative",
        "I hope I can show *these+ inventions of mine to their chief engineer tonight.=demonstrative",
        "{name3} retrieved the old coins from *her+ purse and handed them to {name1}.=possessive",
        "The pediatrician reluctantly gave the prescription to *his+ patient.=possessive",
        "This is a great opportunity to show the people *our+ dedication and capability.=possessive",
        "In your opinion, *which+ title will make his composition most endearing to his fans?=interrogative",
        "*What+ book ignited her interest in professional landscaping and interior design?=interrogative",
        "{name1} might not be able to build your fence because he has *very little+ knowledge in carpentry.=quantitative",
        "I have *little+ interest in mobile apps because I don't have a smartphone nor a tablet.=quantitative",
        "Don't worry because we still have *enough+ time to practice this dance routine.=quantitative",
        "{name3} was not able to buy *any+ soy sauce so she won't be able to follow your recipe.=quantitative",
        "Your ideas make *no+ sense at all, so I'd like to move to our next topic.=quantitative",
        "We also have *some+ sugar in the cupboard if what you have is not enough.=quantitative",
        "Can somebody check if there's still *any+ oil left in the car's engine?=quantitative",
        "For the *hundredth+ time, I don't want to go on an expedition with your group.=numeral",
        "His idea generated more than *two million+ tweets so it must be worth considering.=numeral",
        "It just took a *few+ engineers with proper training to solve this challenging problem.=numeral",
        "If you're planning to buy *many+ apples, they are on sale at the grocery store today.=numeral",
    ],
    5 => [
        "{name1} promised to repair the truck's *damaged+ fender but we ended up fixing it ourselves.=descriptive",
        "The astronomer bought an *expensive+ telescope in order to pursue his new research project.=descriptive",
        "She is a *remarkable+ meteorologist whose dedication has helped a lot of people cope with typhoons.=descriptive",
        "You'll need more accomplishments like *this+ fundraiser to catch the mayor's attention.=demonstrative",
        "According to *that+ judge, there is no existing law penalizing this kind of mischief.=demonstrative",
        "*Your+ enormous fruit orchard will give your province a steady supply of mangoes and bananas.=possessive",
        "They will share *their+ expertise with us so we can help them address their technical problems.=possessive",
        "*Their+ house burnt in that fire so they were given an accommodation at that hotel.=possessive",
        "You can not use any of these design features in your product because they are all patented under *my+ name.=possessive",
        "{name3} is afraid that there will soon be *insufficient+ food for everybody if the war drags on.=quantitative",
        "Setting up an automated farming system will provide them with *abundant+ food all year round.=quantitative",
        "Due to the poor condition of your baseball card, I think that it no longer has *any+ value at all.=quantitative",
        "Raising *sufficient+ capital is one of the primary responsibilities of any entrepreneur.=quantitative",
        "I contacted *several+ candidates for the job but none of them showed any interest in my offer.=numeral",
        "I invited *several+ friends of ours to our technology conference this Saturday.=numeral",
        "If you want to master this skill, you need to look at *many+ examples first before trying it yourself.=numeral",
    ],
    6 => [
        "{name1} wondered if this beautiful and *compassionate+ wife of his, whom he loved so dearly, was really capable of such a deed.=descriptive",
        "We find ourselves confronted with climate change issues that, in some *susceptible+ areas, already appear unstoppable.=descriptive",
        "{name1} and {name2} are the owners of *this+ company so the decision whether to downsize or not is theirs to make.=demonstrative",
        "Incorporating *these+ features into the chips will make them efficient enough for use in battery-powered mobile devices.=demonstrative",
        "{name1} will release three different versions of *his+ mobile app, one of which will be sold for under a dollar per download.=possessive",
        "Although the methods used in *our+ study were different from theirs, both studies came to the same conclusion.=possessive",
        "{name1} had nothing to carry by the end of the journey while his tired comrades were groaning under *their+ loads.=possessive",
        "{name3} realizes that there is still *much+ work to be done to restore the church but he remains undaunted.=quantitative",
        "His doctors said that he needs to gain *sufficient+ weight before they approve his release from the hospital.=quantitative",
        "We need to ask for a *little+ understanding from our creditors in order to keep our business viable.=quantitative",
        "Due to rapid advancements in mobile technology, we now have instant access to *abundant+ knowledge.=quantitative",
        "I was just informed that *several+ engineers from our rival company have decided to accept our job offers.=numeral",
        "I already sent my manpower request to {name1} and {name3}, both of whom decided to wait for a *few+ days before acting on it.=numeral",
        "{name1} presented his team's findings to the board members, and *each+ one of them looked grim at the end of his presentation.=numeral",
        "After the financial crisis, *many+ analysts in our company became convinced that all equities are simply too risky.=numeral",
    ],
];

// ---- Pre-parse (§5.1) ----
$dataByTier = [];
foreach ($rawByTier as $tier => $rawList) {
    $dataByTier[$tier] = [];
    foreach ($rawList as $raw) {
        $eq = strpos($raw, '=');
        if ($eq === false) continue;
        $dataByTier[$tier][] = [
            'sentence' => substr($raw, 0, $eq),
            'answer'   => substr($raw, $eq + 1),
        ];
    }
}

// ---- Helpers (§8.4, §8.6) ----
function ak_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function ak_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// Escape, bind last words, then wrap the first *…+. pair in pink (#CC0066).
function ak_render_sentence(string $raw): string {
    $esc = ak_bind_last_words($raw);
    $starPos = strpos($esc, '*');
    $plusPos = $starPos === false ? false : strpos($esc, '+', $starPos + 1);
    if ($starPos === false || $plusPos === false) return $esc;
    return substr($esc, 0, $starPos)
        . '<strong style="color:#CC0066;">'
        . substr($esc, $starPos + 1, $plusPos - $starPos - 1)
        . '</strong>'
        . substr($esc, $plusPos + 1);
}

// ---- Question generation (§6) ----
function build_ak_question(array $dataByTier, string $lvl, int $grd, string $sessionKey, array $boys, array $girls): ?array {
    $tier = resolve_ak_tier($lvl, $grd);
    $pool = $dataByTier[$tier] ?? [];
    if (empty($pool)) return null;

    // No-repeat: key = "t$tier:$idx".
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        $key = "t$tier:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        foreach ($pool as $i => $item) $available[] = ['key' => "t$tier:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $item = $pool[$pick['idx']];

    // Roll names once per question (§5.2).
    $name1 = $boys[array_rand($boys)];
    do { $name2 = $boys[array_rand($boys)]; } while ($name2 === $name1);
    $name3 = $girls[array_rand($girls)];
    do { $name4 = $girls[array_rand($girls)]; } while ($name4 === $name3);

    $sentence = str_replace(
        ['{name1}', '{name2}', '{name3}', '{name4}'],
        [$name1, $name2, $name3, $name4],
        $item['sentence']
    );

    // Distractor pool per tier — preserve legacy: tiers 1–3 use 5-item pool
    // (no "quantitative"); tiers 4–6 use all 6. When the correct answer is
    // "quantitative" in tier 2/3, it is included directly as $choices[0] but
    // is not pulled from the distractor pool — matches legacy behaviour.
    $distractorPool = ($tier <= 3)
        ? ['descriptive', 'possessive', 'interrogative', 'demonstrative', 'numeral']
        : ['descriptive', 'possessive', 'interrogative', 'demonstrative', 'numeral', 'quantitative'];
    shuffle($distractorPool);
    $wrong = [];
    foreach ($distractorPool as $d) {
        if ($d !== $item['answer'] && count($wrong) < 3) $wrong[] = $d;
    }
    $choices = array_merge([$item['answer']], $wrong);
    shuffle($choices);

    return [
        'sentence' => $sentence,
        'answer'   => $item['answer'],
        'choices'  => $choices,
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

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_ak_question($dataByTier, $lvl, $grd, $sessionKey, $boys, $girls);
    if ($newQ !== null) $_SESSION[$sessionKey]['current'] = $newQ;
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $sentenceHtml = ak_render_sentence($cur['sentence']);
    $firstChar = strtolower(substr($cur['answer'], 0, 1));
    $art = in_array($firstChar, ['a','e','i','o','u'], true) ? 'an' : 'a';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php ak_box('<div style="width:100%;font-size:16pt;color:#333;line-height:1.65;text-wrap:balance;">' . $sentenceHtml . '</div>', 120); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The highlighted word/phrase is <?php echo $art; ?>
    <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    adjective.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null) {
        echo '<p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto;">No question could be generated. Please try again.</p>';
    } else {
        $questionSentenceHtml = ak_render_sentence($q['sentence']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    What kind of adjective is the <span style="color:#CC0066;">highlighted</span> word?
  </div>
  <?php ak_box('<div style="width:100%;font-size:16pt;color:#333;line-height:1.65;text-wrap:balance;">' . $questionSentenceHtml . '</div>', 120); ?>
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
                  min-width:170px;max-width:240px;min-height:64px;padding:12px 18px;
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
<?php
    }
endif;
?>

<!-- Difficulty radios (§10.4 — Easy / Hard only) -->
<div align="center" style="margin-top:20px;">
  <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
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