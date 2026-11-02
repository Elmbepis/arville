<?php
// english/modules/adverbs-kinds.php
// Kinds of Adverbs — identify the type (manner/place/time/frequency/degree) of
// a highlighted adverb in a sentence.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 4 M/C choices (2×2 grid).
//
// Data prefix convention (preserved from legacy):
//   M = manner, P = place, T = time, F = frequency, D = degree
//   e.g. "MThe boy *slowly+ unwrapped his gift." &#8594; type=manner
//
// Data fixes (§5.4):
//   * tier 1 "took our photographs *cheerfully+ ." — extra space before period
//   * tier 5 "beverages *at least thrice a week." — missing closing '+' marker
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
$moduleTitle = 'Kinds of Adverbs';
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
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// ---- Data (§5) — verbatim from legacy, templated for placeholders ----
// Type prefix char (M/P/T/F/D) is stripped at definition time.
$rawDataByTier = [
    1 => [
        'MThey worked on their task *carefully+.',
        'M{name} ate the chocolate cake *greedily+.',
        'M{name} took our photographs *cheerfully+.',
        'MThe teacher scolded {name} *loudly+.',
        'MThe boy *slowly+ unwrapped his gift.',
        'M{boy} and his friends went home *sadly+.',
        'M{boy} waited *patiently+ for his father.',
        'MThe rain fell *hard+ during the storm.',
        'MThe teenagers left the house *quietly+.',
        'TThe pack of lions hunted *yesterday+.',
        'TMy teacher scolded us *this morning+.',
        'TI saw that action movie *last year+.',
        'TWe will go fishing *tomorrow+.',
        'TI will finish my homework *tonight+.',
        'T{name} might visit you *soon+.',
        'TWe submitted our project *yesterday+.',
        "TLet's watch the concert *tonight+.",
        'TI had cereals *this morning+.',
        'TThey played football *today+.',
        'PThe old mechanic went *inside+.',
        'PThe object was found lying *here+.',
        'PThe children are playing *there+.',
        'PThe puppy took the bone *outside+.',
        'PThe school bus stopped *here+.',
        'PIt could be hiding *anywhere+.',
        'PYou can take it *everywhere+.',
        'PI will just sleep *upstairs+.',
        'PI bring my new toys *everywhere+.',
        'PYour white dog is sleeping *there+.',
        'PHis only dream is to work *abroad+.',
        'PThose athletes practice *indoors+.',
        'PThe students are playing *outdoors+.',
        'PThe commotion started *there+.',
        'FI read her column *every day+.',
        'FShe *always+ sends them a letter.',
        'FHe buys rare coins *every other day+.',
        'FThe animals are counted *every day+.',
        'FThose trees are trimmed *every year+.',
        'FMy friends visit these orphans *daily+.',
        'FThat band has a concert *once a year+.',
        'FHe cleans his fish pond *every month+.',
        'FHer uncle buys a magazine *every day+.',
        'DThe ocean water is *very+ cold.',
        'DThey think *highly+ of you.',
        'DWe are a *little+ eager to win.',
        'DYour drawings are *much+ better.',
        'DYour friend is *quite+ nervous.',
        'DThis bag is *really+ expensive.',
        'DThat man is *simply+ adorable.',
        'DTheir service here is *so+ slow.',
        'DI am *too+ tired and sleepy.',
        'DYou are *just+ being childish.',
    ],
    2 => [
        'MThe students did their homework *quickly+.',
        'MTheir group handled that assignment *well+.',
        'MThe musician played his guitar *flawlessly+.',
        'MThe doctor woke the sleeping patient *gently+.',
        'MPlaying music *loudly+ can damage your hearing.',
        'MThe ducklings followed their mother *closely+.',
        'M{name} *easily+ answered these math problems.',
        'M{name} *eagerly+ told them the good news.',
        'MOur teacher explained the new lesson *clearly+.',
        'TWe can conduct our research *tomorrow+.',
        'TOur paths might cross again *someday+.',
        'TWe will go shopping for clothes *on Monday+.',
        'TI have been on this special diet *since 2009+.',
        'TWe would love to visit our relatives *one day+.',
        'TThe competition will start *in a few minutes+.',
        'TThe tree planting activity was held *last week+.',
        'TThe student leaders gave their speeches *today+.',
        'TThe pupils studied their lessons *today+.',
        'THer friends will go the museum *next week+.',
        'TOur family will buy a new car *next year+.',
        'TThat new movie will be shown *next month+.',
        'PThat hilarious cat is walking *backwards+.',
        'PYou should let that restless cat go *outside+.',
        'PThis hardy weed will survive *anywhere+.',
        'PThese small gadgets will fit *in here+.',
        'PTheir new shoe factory was built *overseas+.',
        'PThese water plants can thrive *indoors+.',
        'PYou should read that joke book *inside+.',
        'PYour utility vehicle is parked *over there+.',
        'PThe toddler has learned to walk *forward+.',
        'PHang the clock *up there+ so we can see it.',
        'PThis machine can only be operated *indoors+.',
        'PThe dangerous fugitives may be hiding *inside+.',
        'PWe must construct the building *elsewhere+.',
        'FThey inspect these tools *each morning+.',
        'FWe stage a painting exhibit *regularly+.',
        'FHis family eats in that restaurant *sometimes+.',
        'FTheir cook serves that dish *every two days+.',
        'FThat company sends out flyers *every week+.',
        'FMy mother buys a lotto ticket *occasionally+.',
        'FOur math teacher gives us a quiz *every day+.',
        'FMy friends and I watch a movie *every month+.',
        'DWe are *deeply+ sorry for your tragic loss.',
        'DThat was a *fairly+ easy decision to make.',
        'DThat pretty girl *hardly+ knows {boy}.',
        'DWhy are you the *least+ worried of them all?',
        'D{boy} and {girl} are *most+ welcome to visit us.',
        'DThe old archer *nearly+ missed the target.',
        'DThis red shirt is *rather+ small for me.',
        'DThis math question is *very+ difficult.',
        'DHe is *completely+ hooked on that new game.',
        'DHis testimony is *purely+ speculative.',
        'DThe team *barely+ made it to the finals.',
    ],
    3 => [
        'MThe two male lions *fiercely+ fought each other.',
        'MThe nervous crook left the noisy restaurant *hastily+.',
        'M{name} performed *dismally+ in her chemistry test.',
        'M{boy} followed the enumerated instructions *attentively+.',
        'MMr. {surname} *reluctantly+ paid the licensing fees.',
        'TYou have to study for that periodical test *soon+.',
        'TThe zookeeper fed all the carnivores *this morning+.',
        'TThe governor visited the flood victims *a while ago+.',
        'TOur class will have an educational field trip *next week+.',
        "TThe physicist's experiment achieved a breakthrough *today+.",
        'TA powerful earthquake devastated their village *last week+.',
        "TI'm sure they'll unravel that mystery *next week+.",
        'PI think our neighbors hide their keys *under here+.',
        'PIf you want to find it, you must look *everywhere+.',
        'PYour responsibility is to keep this vehicle *nearby+.',
        'PThe mischievous boy hid her expensive doll *somewhere+.',
        'PMore and more professionals are finding good jobs *here+.',
        'FThat writer publishes a short story *every year+.',
        'FA burglar breaks into that pawnshop *every year+.',
        'FDoctors check his medical condition *twice a month+.',
        'FOur company releases a financial report *every quarter+.',
        'FI attend that photography convention *once in a while+.',
        'FOur relatives abroad correspond with us *frequently+.',
        'FThat famous doctor *occasionally+ conducts a medical mission.',
        'FMy professor produces a short documentary movie *annually+.',
        'FThe labor secretary organizes a job fair *every month+.',
        'DTheir beach resort in Batangas is *absolutely+ wonderful.',
        'DHis cousin {girl} is *indeed+ attractive and intelligent.',
        'DOur engineering project is *almost+ ready for submission.',
        'DThis old laboratory is safe *enough+ for our use.',
        'DThis new book is *highly+ recommended for teenagers.',
        'DIt could have been an *entirely+ different story.',
        "DThe group's *incredibly+ meticulous research paid off.",
        'DI hope you can *fully+ understand the situation.',
    ],
    4 => [
        'MThe naive lady *foolishly+ handed the deceitful stranger some money.',
        'MThe old sheriff interrogated each of the suspects *impatiently+.',
        'MThe creepy painting *mysteriously+ disappeared from the haunted mansion.',
        'MThe clunky vehicle stopped *abruptly+ when it hit a concrete fence.',
        'MThe veterinarian *adroitly+ tranquilized the agitated rhinoceros.',
        'TThere has never been a discovery of such importance *since 2010+.',
        'TThe engineering team will find a viable solution *very soon+.',
        'THis ambition and passion will make him successful *someday+.',
        'TBreakthroughs in cancer treatment may happen *next decade+.',
        'PIf you press that button, the robotic arm will move *forward+.',
        'PThe amazing magician can perform that stupendous trick *anywhere+.',
        'PThe graceful ballerina mesmerized each and every person *inside+.',
        'PThe satellite was drifting *westwards+ when the accident happened.',
        'PDo you know who positioned the surveillance camera *backwards+?',
        'PThe range of the covert operations was expanded *northwards+.',
        'FThat congressman gives jobs to unemployed people *every now and then+.',
        'FOur organization sponsors a charity event *every other month+.',
        'FHis neighbor, who is a musician, composes a song *regularly+.',
        'FThese sophisticated machines are calibrated *every other month+.',
        'FThese technicians upgrade the software system *every other year+.',
        'FHis vintage automobile gets a special tune-up *every now and then+.',
        'FOur university participates in an academic competition *periodically+.',
        'DTheir three witnesses can *certainly+ identify the fugitive.',
        'DIn my opinion, that expensive contraption is *quite+ worthless.',
        "DTheir company's mining and logging operations are *totally+ illegal.",
        "DThe microbiologist's discovery is *extremely+ important to them.",
        "DThe community is *well+ aware of the judgment's implications.",
        'DTheir hero was *greatly+ affected by that life-changing event.',
        "DThe toy she's looking for is *scarcely+ available in this city.",
        'DTheir concrete fortress is *virtually+ impenetrable by any army.',
        'DThe president of that developing country is *extremely+ powerful.',
    ],
    5 => [
        'MThe young employee *enthusiastically+ explained the promising results of his project.',
        'MThose inexperienced industrial engineers summarized the technical reports *ineffectively+.',
        "MThe restaurant's master chef concocted an alternative recipe *effortlessly+.",
        'MHis uncle *buoyantly+ mentioned to us that he used to have a collection of cool rubber sneakers.',
        'MThe mayor would talk to the activists if they would stage their demonstration *peacefully+.',
        'MThey say that our company has the financial capability to pursue that project *vigorously+.',
        'MThe company registered record-breaking profits, so its investors are celebrating *ecstatically+.',
        'TThe international mathematics olympiad has already commenced *this morning+.',
        'TTheir latest expedition unearthed some amazing archaeological treasures *last week+.',
        "TThey've been harboring serious doubts about his competence *since last month+.",
        'TAn entrepreneur I know intends to buy some agricultural land *this August+.',
        "PThe astrophysicist's controversial hypothesis has already been confirmed *everywhere+.",
        "PI can't believe that the phenomenal student had made his astounding discovery *in here+.",
        'PYou were chosen to spearhead this campaign *over there+ because of your impressive track record.',
        'PThat group of environmentalists is planning to launch another reforestation project *somewhere+.',
        'FThat eccentric engineer submits a new patent application *every thirty days+.',
        'FTo make a living, Mr. {surname} peddles snacks and beverages *at least thrice a week+.',
        'FAre you going to ignore the fact that they are *incessantly+ complaining about your incompetence?',
        'FMy cousin {boy} had *consistently+ won those spelling championships until he graduated.',
        'DThe chief executive officer is *heavily+ involved with that scientific experiment.',
        "DThe school principal was *somewhat+ offended by his parents' tactless remarks.",
        'DThis food supplement is *strongly+ recommended for your medical condition.',
        'DThese local vegetables must be *thoroughly+ washed before consumption.',
        'DThe oldest engineer in their department has a *far+ better solution to offer.',
        'DThe conservative lady was *utterly+ flabbergasted by his offensive behavior.',
    ],
];

// Pre-parse: strip type prefix, map to canonical type name.
$typeMap = ['M' => 'manner', 'P' => 'place', 'T' => 'time', 'F' => 'frequency', 'D' => 'degree'];
$dataByTier = [];
foreach ($rawDataByTier as $tier => $list) {
    $dataByTier[$tier] = [];
    foreach ($list as $raw) {
        $typeChar = substr($raw, 0, 1);
        $sentence = substr($raw, 1);
        if (!isset($typeMap[$typeChar])) continue;
        $dataByTier[$tier][] = [
            'type'     => $typeMap[$typeChar],
            'sentence' => $sentence,
        ];
    }
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
$surnames = [
    'Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales','Martinez',
    'Mendez','Paredes','Revilla','Santos','Tolentino',
];

// ---- Render helpers (§8.2 target #CC0066) ----
function ak_render_sentence(string $raw): string {
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

function ak_extract_adverb(string $raw): string {
    $star = strpos($raw, '*');
    if ($star === false) return '';
    $plus = strpos($raw, '+', $star + 1);
    if ($plus === false) return '';
    return substr($raw, $star + 1, $plus - $star - 1);
}

function ak_box(string $html, int $minHeight = 120): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function ak_article(string $word): string {
    $f = strtolower(substr($word, 0, 1));
    return in_array($f, ['a','e','i','o','u'], true) ? 'an' : 'a';
}

// Title-case label for the choice buttons (canonical answer stays lowercase).
function ak_display_label(string $c): string {
    return ucfirst($c);
}

// ---- Question generation (§6) ----
function build_ak_question(array $dataByTier, string $lvl, int $grd,
                           string $sessionKey, array $boys, array $girls,
                           array $surnames): ?array {
    $tier = resolve_ak_tier($lvl, $grd);
    $pool = $dataByTier[$tier] ?? [];
    if (empty($pool)) return null;

    // No-repeat keyed per (tier, index).
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

    // Roll names once per question.
    $boy  = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];
    $name = (rand(1, 2) === 1) ? $boy : $girl;
    $surname = $surnames[array_rand($surnames)];

    $sentence = str_replace(
        ['{name}', '{boy}', '{girl}', '{surname}'],
        [$name, $boy, $girl, $surname],
        $item['sentence']
    );

    $adverb = ak_extract_adverb($sentence);

    // Choices: correct + 3 wrong from the 5-type pool.
    $choicePool = ['manner','place','time','frequency','degree'];
    shuffle($choicePool);
    $wrong = [];
    foreach ($choicePool as $c) {
        if ($c !== $item['type'] && count($wrong) < 3) $wrong[] = $c;
    }
    $choices = array_merge([$item['type']], $wrong);
    shuffle($choices);

    return [
        'sentence' => $sentence,
        'adverb'   => $adverb,
        'correct'  => $item['type'],
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
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) — with tier-1 fallback ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_ak_question($dataByTier, $lvl, $grd, $sessionKey, $boys, $girls, $surnames);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_ak_question($dataByTier, 'Easy', 0, $sessionKey, $boys, $girls, $surnames);
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
    $cur     = $result['cur'];
    $sentenceHtml = ak_render_sentence($cur['sentence']);
    $article = ak_article($cur['correct']);
    $adverbLabel = '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['adverb']) . '\'</strong>';
    $typeLabel   = '<strong style="color:#CC0066;">' . htmlspecialchars($cur['correct']) . '</strong>';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars(ak_display_label($result['clicked'])); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php ak_box('<div style="width:100%;font-size:17pt;color:#333;line-height:1.65;text-wrap:balance;">' . $sentenceHtml . '</div>', 120); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The adverb in the sentence is <?php echo $adverbLabel; ?> and it is an adverb of <?php echo $typeLabel; ?>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null):
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto 20px;max-width:480px;">
    No question could be generated. Please try again.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $sentenceHtml = ak_render_sentence($q['sentence']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    The sentence below uses an adverb of <span style="color:#CC0066;">what</span>?
  </div>
  <?php ak_box('<div style="width:100%;font-size:17pt;color:#333;line-height:1.65;text-wrap:balance;">' . $sentenceHtml . '</div>', 120); ?>
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
                  min-width:160px;max-width:240px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars(ak_display_label($c)); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
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