<?php
// english/modules/modal-verbs.php
// Modal Verbs — fill in the blank with the correct modal verb.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 3 M/C choices (1×3 grid).
//
// Data markers per sentence: *correct1wrong12wrong2+
//   • *            opens the marker
//   • "1"          separates correct from first distractor
//   • "2"          separates first distractor from second
//   • +            closes the marker
//   Example: "We *must1could2can+ love and respect our parents."
//     &#8594; correct "must", wrong ["could","can"]
//
// Legacy apostrophe handling (choices like "shouldn't", "won't"): the legacy
// stripped apostrophes for URLs and re-added them on the receiving side. Modern
// relies on urlencode()/urldecode() which handles apostrophes natively.
//
// LAYOUT RULE (mirrors determiners.php / objects.php / pronouns-subj-obj.php):
//   • Sentence box hugs its content (inline-flex wrapper) with ample padding.
//   • text-wrap:pretty (not balance) inside the box content.
//   • "Click on the correct answer below." sits immediately above buttons.

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
$moduleTitle = 'Modal Verbs';
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
function resolve_modal_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    // Hard — legacy Hard formula (harder of Medium/Hard)
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// ---- Name pools (§5.2) — verbatim from legacy ----
$boys = [
    'Adam','Adrian','Alex','Alexander','Andrew','Angelo','Austin','Benjamin','Brandon',
    'Caleb','Cameron','Carlo','Carson','Carter','Charlie','Christopher','Daniel','David',
    'Diego','Dominic','Dylan','Elijah','Ethan','Gabriel','Hayden','Ian','Isaac','Isaiah',
    'Jack','Jacob','Jaden','Jimmy','Jason','Jose','John','Jonathan','Joseph','Joshua',
    'Juan','Julian','Justin','Kevin','Logan','Luisito','Luke','Matthew','Max','Michael',
    'Nathan','Nick','Noah','Oliver','Owen','Parker','Robert','Ryan','Samuel','Sebastian',
    'Tom','Tristan','William',
];
$girls = [
    'Alexandra','Alyssa','Amelia','Andrea','Anna','Ariana','Arianna','Bella','Brooke',
    'Camille','Caroline','Chloe','Claire','Elizabeth','Emma','Eva','Evelyn','Gabriela',
    'Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Kylie',
    'Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie',
    'Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria',
];
$surnames = [
    'Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales','Martinez',
    'Mendez','Paredes','Revilla','Santos','Tolentino',
];

// ---- Data (§5) — verbatim from legacy, with placeholders for names ----
$rawByTier = [
    1 => [
        "We *must1could2can+ love and respect our parents.",
        "You *must1can2would+ not break that important law.",
        "You *must1can2should+ have a passport to leave the country.",
        "Children *must1can2would+ go to school and study well.",
        "You *must1should2can+ stop when the traffic lights turn red.",
        "You *should1must2will+ try this sandwich. It's good.",
        "You *should1must2will+ read this book. I enjoyed it.",
        "They *should1must2will+ try this brand. They'll like it.",
        "You *shouldn't1should2won't+ tease your sister all the time.",
        "You *shouldn't1should2can't+ talk with your mouth full.",
        "{name} *can1will2may+ write poetry very well.",
        "He is a genius. He *can1will2might+ solve any math problem.",
        "{girl1} is a linguist. She *can1will2might+ speak ten languages.",
        "{boy1} is a comedian. He *can1can't2must+ make anybody laugh.",
        "{boy1} is a policeman. He *can't1can2won't+ perform surgery.",
        "*Can1Shall2Must+ you help me transfer this table over there?",
        "The mouse inside *may1must2will+ be dead, but we are not sure.",
        "That puppy *may1can't2won't+ be hungry so let's feed it.",
        "The cake is gone. They *may1can2would+ have eaten it.",
        "*May1Can2Will+ I use your phone please? It's an emergency.",
        "*May1Can2Will+ I borrow this book please? I'll return it today.",
        "Don't play a prank on him. It *might1should2must+ make him mad.",
        "Don't call him a nerd. It *might1should2must+ hurt his feelings.",
        "If you don't wear a sweater, you *will1should2must+ be cold.",
        "This is bland. *Would1Should2Must+ you pass the salt please?",
    ],
    2 => [
        "You *must1can2could+ buy that medicine because you need to get well.",
        "You *must1could2will+ hurry if you really have to catch the train.",
        "If you need to use this car, you *must1could2will+ change its tires.",
        "We *must1could2can+ repair this old van's brakes before driving it.",
        "We *must1should2will+ put out this fire, or our house will burn down.",
        "{boy1} *should1must2can+ visit that country because he likes mountains.",
        "{boy1} *should1must2can+ get a sports car if he likes to drive fast.",
        "We *should1must2can+ stay in that resort because it has a better gym.",
        "You *should1must2will+ try that restaurant when you're in town.",
        "My friends *should1must2can+ go fishing in the lake. They'll enjoy it.",
        "{girl1} *should1must2won't+ throw a party to make their stay memorable.",
        "{boy1} *should1could2mustn't+ stay in that hotel because it's nearer.",
        "You *should1would2will+ check your posture when using the computer.",
        "{girl1} is a ballerina. She *can1can't2must+ show us some dance steps.",
        "That man is a coroner. He *can't1can2will+ give orders to a sergeant.",
        "Our clients *may1shall2will+ sue us for this but I hope they wouldn't.",
        "Yes, you *may1will2can+ take your things with you when you leave.",
        "The book is no longer here. Someone *might1shall2can+ have taken it.",
        "Don't eat that old bread. It *might1should2must+ upset your stomach.",
        "If you order online, the product *will1might2won't+ be delivered to you.",
        "If you love your pets, you *will1may2can+ take good care of them.",
        "I didn't hear you. *Could1Should2May+ you say that again more slowly?",
        "If you leave, this *could1can't2won't+ be the end of our friendship.",
    ],
    3 => [
        "The firemen *must1should2could+ extinguish this forest fire before going home.",
        "Our men *must1should2could+ prepare the life vests now. This is an emergency.",
        "We *must1should2can+ catch that rabid dog, or more children will be bitten.",
        "{girl1} has no other choice. She *must1should2will+ solve this problem at once.",
        "We *must1should2can+ stay away from those criminals to avoid being mugged.",
        "We *must1should2could+ repair our car before dark. This place doesn't look safe.",
        "The manager *must1should2can+ solve this problem soon or he'll lose his job.",
        "We *must1should2will+ repair the leak in our boat now, or we will all sink with it.",
        "They *should1must2can+ buy a house by the beach because they enjoy scuba diving.",
        "You *should1must2will+ build a swimming pool so you can go swimming every day.",
        "{boy1} *should1must2can+ go on a vacation since he wants to see the countryside.",
        "Mr. {surname} *should1must2can+ buy a smartphone so he can try these cool apps.",
        "I think {boy1} *should1can2could+ test that smartphone first before paying for it.",
        "You *should1must2will+ try spelunking as a recreational sport because it is fun.",
        "{boy1} is a herpetologist. He *can1can't2won't+ identify many species of reptiles.",
        "{girl1} is a paleontologist so she *can1can't2won't+ explain to us what fossils are.",
        "{boy1} is an archaeologist. He *can't1can2won't+ give a lecture on archaebacteria.",
        "Since you are already finished with the test, you *may1will2can+ now go home.",
        "The car is not here anymore. Someone *might1will2can+ have bought it already.",
        "Let's call them first before going there. They *might1will2can+ be busy right now.",
        "{boy1} gave up his old job so he *could1can2should+ work for our company last year.",
        "If I were you, I *would1should2could+ wear this jacket instead of that sweater.",
    ],
    4 => [
        "{girl1} *must1should2will+ call the police, or {boy1} and {boy2} will be in serious trouble.",
        "The rescuers *must1should2can+ bring the victims to the nearest hospital immediately.",
        "Those foreigners *must1should2will+ stay away from that street, or they'll get robbed.",
        "{boy1} *must1should2will+ report them to the cops, or they will continue to harass him.",
        "The zookeeper *must1should2can+ recapture that vicious animal before it hurts somebody.",
        "He's been working at the construction site all day long. He *must1can2would+ be very tired.",
        "{girl1} got a perfect score in that difficult test. She *must1can2would+ be very smart.",
        "You *should1will2can+ take a vacation with your family because you need some bonding time.",
        "They *should1must2can+ go on a cruise because that would be a wonderful experience for them.",
        "{boy1} *should1must2will+ try riding a horse like a cowboy if he wants to try something new.",
        "{boy1} *should1must2will+ go on a safari in Africa if he's looking for a unique experience.",
        "Psst, you *shouldn't1couldn't2won't+ tell jokes like that when the principal is around.",
        "{girl1} is a microbiologist so she *can1can't2won't+ explain to us what archaebacteria are.",
        "{girl1} *can1can't2won't+ educate us on various fish species because she's an ichthyologist.",
        "My brother {boy1} is ambidextrous so he *can1can't2won't+ use both of his hands equally well.",
        "{boy1} *can't1can2shall+ repair your smartphone's radio because he is a radiologist.",
        "We don't have any vinegar left. Our visitors *may1can2would+ have used it up for dinner.",
        "Our neighbors look busy right now. This *may1should2must+ not be a good time to visit them.",
        "After you finish repairing this machine, you *may1might2would+ take a break in the cafeteria.",
        "The controversy surrounding that contest *might1should2must+ worsen the rivalry between them.",
        "If I were you, I *would1should2could+ have a mechanic check that oil leak immediately.",
    ],
    5 => [
        "The volunteers *must1should2will+ deliver all these medicines now, or the sick people will perish.",
        "The citizens *must1should2will+ report this massive scam to the mayor, or more people will be victimized.",
        "Somebody *must1should2could+ call the fire station at once because the fire from that explosion is now out of control.",
        "The engineers *must1should2could+ strictly follow these instructions in order to assemble this complex machine.",
        "They *must1could2will+ repair that damaged portion of the boat, or they won't be able to leave the island.",
        "The veterinarian *must1should2could+ tranquilize the lion first before attempting to treat its infected wound.",
        "It is imperative for us to complete this task, so we *must1should2can+ follow the required procedures to the letter.",
        "Mr. {surname} *mustn't1wouldn't2couldn't+ travel to that continent because of the ebola outbreak there right now.",
        "Our neighbors *should1may2can+ thank the sheriff for arresting the crook who was extorting money from them.",
        "{girl1} *should1must2can+ consider buying these three cheaper shirts instead of that expensive blouse.",
        "We *should1must2can+ be ready to eat in another restaurant, just in case the one we're going to is full.",
        "The students *should1must2can+ be reminded that they may bring rice and canned goods for our ongoing food drive.",
        "{boy1} *should1must2can+ try skydiving with one of those fancy parachutes because that would be amazing!",
        "We *should1must2can+ start thinking about the opportunities available to us if we move to that city.",
        "Mr. {surname} is an entomologist so he *can't1can2may+ be considered an expert on the history of words.",
        "Mrs. {surname} is a cetologist so she *can1can't2shall+ identify many species of whales and dolphins.",
        "The destruction of that rainforest *may1should2must+ result in the extinction of that species in the wild.",
        "Downsizing the company while the economy isn't good *might1should2must+ demoralize all our employees.",
        "The vicious verbal exchanges between the two leaders, if unchecked, *might1should2must+ even lead to a war.",
        "As early as now, I can definitely say that this year *will1can2may+ be very profitable for all subsidiaries of this company.",
        "Based on available data, there is no more doubt that our latest product *will1can2may+ achieve higher sales than theirs.",
        "If I were you, I *would1should2could+ take the necessary steps to protect this compound from those intruders.",
    ],
];

// ---- Parser (§5.1) — run once at definition time ----
function modal_parse(string $raw): ?array {
    if (!preg_match('/\*([^+]+)\+/u', $raw, $m)) return null;
    $marker = $m[1];
    $parts = explode('1', $marker, 2);
    if (count($parts) !== 2) return null;
    $correct = $parts[0];
    $rest = explode('2', $parts[1], 2);
    if (count($rest) !== 2) return null;
    $wrong1 = $rest[0];
    $wrong2 = $rest[1];
    $sentence = preg_replace('/\*[^+]+\+/u', '____', $raw, 1);
    return [
        'sentence' => $sentence,
        'correct'  => $correct,
        'wrong'    => [$wrong1, $wrong2],
    ];
}

$dataByTier = [];
foreach ($rawByTier as $tier => $list) {
    $dataByTier[$tier] = [];
    foreach ($list as $raw) {
        $parsed = modal_parse($raw);
        if ($parsed !== null) $dataByTier[$tier][] = $parsed;
    }
}

// ---- Helpers (§8.4, §8.6) ----
// Hugging sentence box — outer text-align:center wrapper + inner inline-flex
// that shrink-wraps content (inline-flex avoids width:fit-content + flex
// conflict; vertical-align:middle prevents baseline gap).
function modal_box(string $html, int $minHeight = 100): void {
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

// Feedback sentence — replace the ____ blank with the answer in pink.
function modal_fill_blank(string $sentence, string $answer): string {
    $esc = htmlspecialchars($sentence);
    $ans = '<strong style="color:#CC0066;">' . htmlspecialchars($answer) . '</strong>';
    return str_replace('____', $ans, $esc);
}

// ---- Question generation (§6) ----
function build_modal_question(array $dataByTier, string $lvl, int $grd,
                              string $sessionKey, array $boys, array $girls,
                              array $surnames): ?array {
    $tier = resolve_modal_tier($lvl, $grd);
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

    // Roll names (§5.2): boy1 &#8800; boy2, girl1 &#8800; girl2, name = random boy or girl
    $boy1 = $boys[array_rand($boys)];
    do { $boy2 = $boys[array_rand($boys)]; } while ($boy2 === $boy1);
    $girl1 = $girls[array_rand($girls)];
    do { $girl2 = $girls[array_rand($girls)]; } while ($girl2 === $girl1);
    $name    = (rand(1, 2) === 1) ? $boy1 : $girl1;
    $surname = $surnames[array_rand($surnames)];

    $sentence = str_replace(
        ['{name}', '{boy1}', '{boy2}', '{girl1}', '{girl2}', '{surname}'],
        [$name, $boy1, $boy2, $girl1, $girl2, $surname],
        $item['sentence']
    );

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    return [
        'sentence' => $sentence,
        'correct'  => $item['correct'],
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
    $isCorrect = (strtolower($clicked) === strtolower($cur['correct']));
    $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) — with tier-1 fallback ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_modal_question($dataByTier, $lvl, $grd, $sessionKey, $boys, $girls, $surnames);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_modal_question($dataByTier, 'Easy', 0, $sessionKey, $boys, $girls, $surnames);
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
    $sentenceHtml = modal_fill_blank($cur['sentence'], $cur['correct']);
    $ansEsc       = '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['correct']) . '\'</strong>';
    $sentenceLen  = strlen(strip_tags($sentenceHtml));
    $sentenceFont = ($sentenceLen > 150) ? '14pt' : ($sentenceLen > 100 ? '15pt' : ($sentenceLen > 60 ? '16pt' : '17pt'));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php modal_box(
      '<div style="font-size:' . $sentenceFont . ';color:#333;line-height:1.6;text-wrap:pretty;">'
    . $sentenceHtml
    . '</div>', 100
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The correct modal verb is <?php echo $ansEsc; ?>.
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
    $sentenceEsc  = htmlspecialchars($q['sentence']);
    $sentenceLen  = strlen($sentenceEsc);
    $sentenceFont = ($sentenceLen > 150) ? '14pt' : ($sentenceLen > 100 ? '15pt' : ($sentenceLen > 60 ? '16pt' : '17pt'));
?>
  <div style="margin:35px auto 8px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Fill in the blank with the correct modal verb.
  </div>
  <?php modal_box(
      '<div style="font-size:' . $sentenceFont . ';color:#333;line-height:1.6;text-wrap:pretty;">'
    . $sentenceEsc
    . '</div>', 100
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:14pt;color:#666;max-width:480px;margin:0 auto 22px;">
    <br/>Click on the correct answer below.
  </div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 3) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:140px;max-width:190px;min-height:64px;padding:12px 16px;
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