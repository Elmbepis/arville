<?php
// english/modules/nouns-kinds.php
// Concrete, Abstract, Count, & Mass Nouns — identify a noun's category.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 2 M/C choices per question.
//
// Grade-awareness:
//   • Tier (word-list difficulty) scales by grade per legacy formula.
//   • Grade 1 (all levels) and grade 2 (Easy only) see only the count/mass
//     question pair — legacy gate preserved verbatim. Grades 0, 3+ see all
//     four question types. (Grade 0 not gated, matches legacy; extend to
//     $grd <= 1 if you want kindergartners treated like grade 1.)
//
// Question types (qopt):
//   1 = pick a count noun      &#8594; choices: count noun / mass noun
//   2 = pick a mass noun       &#8594; choices: count noun / mass noun
//   3 = pick an abstract noun  &#8594; choices: abstract noun / concrete noun
//   4 = pick a concrete noun   &#8594; choices: abstract noun / concrete noun
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the noun box.

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
$moduleTitle = 'Concrete, Abstract, Count, &amp; Mass Nouns';
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
function resolve_nk_tier(string $lvl, int $grd): int {
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

// ---- Data (§5) — verbatim from legacy ----
$dataByTier = [
    1 => [
        'count' => ['balloon','bead','bell','bottle','bush','camera','candy','card',
            'castle','cave','chair','coin','country','crib','carp','desk','dish','door',
            'drum','eraser','faucet','feather','friend','head','hoop','kite','knife',
            'lamp','mallet','mitten','month','notebook','peach','piece','pencil','pillow',
            'poem','rake','room','sack','shark','shoe','snake','song','spoon','stove',
            'thumb','tooth','tray','truck','twig','umbrella','vase','wallet','week',
            'wheel','year'],
        'mass' => ['air','art','butter','corn','cream','dew','dirt','dust','fire',
            'flour','flu','fog','food','fun','gas','grass','greed','hair','heat','honey',
            'juice','love','luck','meat','milk','mud','music','news','noise','oil','rain',
            'rice','salt','sand','sauce','smoke','snow','soap','soup','sugar','time',
            'truth','water','wheat','wind','wood','wool'],
        'abstract' => ['anger','beauty','calm','envy','evil','faith','fear','grace',
            'grief','hate','honor','hope','humor','hurt','idea','joy','law','life','loss',
            'love','luck','mercy','music','need','pain','peace','power','pride','sleep',
            'speed','trust','wit','worry'],
        'concrete' => ['ankle','apron','attic','boots','brain','brook','broom','brush',
            'bubble','butter','cabin','canal','canoe','castle','cellar','cello','chapel',
            'cheese','chest','chicken','church','clock','closet','clouds','coast',
            'coffee','cookie','cottage','creek','dagger','easel','elbow','flood','flute',
            'fruit','garage','garden','garlic','glove','grass','guitar','harbor','hedge',
            'hotel','mirror','mouth','muscle','ocean','onion','pancake','pencil','people',
            'pepper','petal','piano','porch','pouch','river','sandal','scarf','school',
            'shack','shawl','shoe','shrimp','singer','sleet','sock','spider','spine',
            'squash','steak','storm','swamp','teeth','temple','thumb','tower','visor',
            'waffle','wallet','walnut','watch','wrist','yacht'],
    ],
    2 => [
        'count' => ['airplane','airport','animal','badge','basket','battery','bedroom',
            'blade','bicycle','birthday','brick','bucket','building','calendar','cannon',
            'century','cradle','crate','crutch','decal','diary','drawer','finger','frame',
            'freezer','handbag','hobby','holiday','idea','island','library','machine',
            'mountain','napkin','nation','needle','notebook','pancake','playground',
            'prize','ranch','restaurant','riddle','rifle','rosary','rooster','sailboat',
            'saucer','scarecrow','scarf','secret','slipper','station','storm','suitcase',
            'sweater','telephone','television','throat','title','tooth','toothbrush',
            'tractor','trial','triangle','voyage','whale','whisker'],
        'mass' => ['bacon','beauty','beer','blood','bravery','cash','chess','clothing',
            'coal','coffee','cotton','darkness','garbage','gold','golf','grace','gravel',
            'gravity','grief','harm','hate','health','help','humor','ice cream','jewelry',
            'junk','laughter','leather','light','lumber','mail','makeup','money','mustard',
            'patience','plastic','poetry','polio','powder','power','pride','safety',
            'science','shampoo','silver','soccer','steam','steel','sunlight','sunshine',
            'tennis','thunder','timber','toothpaste','traffic','trash','travel','vinegar',
            'warmth','weather','wine'],
        'abstract' => ['awe','belief','bravery','chaos','childhood','coldness','comfort',
            'courage','crime','service','death','deceit','defeat','delight','despair',
            'ego','energy','failure','freedom','gesture','goodness','gossip','happiness',
            'hatred','hearsay','honesty','humility','jealousy','justice','kindness',
            'knowledge','laughter','liberty','logic','loyalty','luxury','memory',
            'mischief','movement','omen','patience','pleasure','poverty','reality',
            'reason','relief','romance','rumor','sadness','sanity','service','shock',
            'silliness','skill','sorrow','sparkle','strength','success','surprise',
            'talent','thrill','victory','wariness','warmth','weakness','wealth',
            'weariness','wisdom'],
        'concrete' => ['anklet','antler','armchair','backpack','bathroom','balcony',
            'bladder','blossom','bracelet','branch','bridge','brooch','buckle','cabbage',
            'chalet','chalice','cymbals','dolphin','dresser','dynamo','eggplant',
            'eyelid','factory','gland','goggles','hatchet','kiosk','kitchen','lantern',
            'lettuce','lobster','luggage','mansion','mosque','museum','oasis','orchard',
            'painting','pantry','peacock','pendant','popcorn','puddle','pumpkin','quill',
            'retina','saloon','senator','sepal','slippers','stadium','stomach','stream',
            'tavern','theater','throat','tornado','tunnel','typhoon','ukulele','venom',
            'villa','violin','vulture','waterfall','wharf','whisker'],
    ],
    3 => [
        'count' => ['afternoon','aviary','bakeshop','bartender','bookkeeper','boundary',
            'brochure','calculator','caption','cemetery','counselor','criminal',
            'delivery','denial','detective','device','draftsman','eclipse','enclosure',
            'festival','firefighter','fortress','freezer','hindrance','hydrant',
            'instrument','journey','kingdom','landslide','librarian','locksmith',
            'missile','mystery','nursery','opinion','photograph','plantation',
            'policewoman','presentation','prisoner','projector','proposal','refrigerator',
            'secretary','steeple','territory','treaty','tyrant','typhoon','vehicle',
            'wrench','zookeeper'],
        'mass' => ['advice','applause','baggage','biology','cancer','cardboard','chaos',
            'chemistry','clarity','commerce','confidence','content','courage','damage',
            'duration','education','electricity','enjoyment','equality','experience',
            'flattery','foliage','furniture','gasoline','grammar','gravity','guilt',
            'happiness','hardware','hatred','history','hockey','honesty','housework',
            'importance','intelligence','justice','knowledge','livestock','luggage',
            'malaria','marketing','mathematics','moonlight','motherhood','nonsense',
            'nutrition','obedience','oxygen','pollution','postage','progress','quartz',
            'racism','research','scenery','smoking','soccer','stamina','training',
            'underwear','welfare','wildlife'],
        'abstract' => ['aptness','adventure','anxiety','artistry','brutality','charity',
            'clarity','confidence','dedication','democracy','disbelief','discipline',
            'disquiet','diligence','disturbance','dominance','education','electricity',
            'elegance','excitement','expression','faithfulness','forgiveness',
            'friendship','helpfulness','imagination','impression','improvement',
            'insanity','intelligence','maturity','opinion','principle','refreshment',
            'relaxation','sacrifice','slavery','strictness','stupidity','submission',
            'sympathy','tardiness','tiredness'],
        'concrete' => ['accordion','apartment','architect','balcony','basement',
            'bassoon','blizzard','boomerang','bungalow','caboose','cauliflower',
            'cemetery','chalice','cockroach','composer','computer','conductor','cookies',
            'corridor','cottage','crackers','drawbridge','elevator','eyelashes',
            'figurine','furnace','galleon','gazebo','governor','hamburger','harpoon',
            'hurricane','jailhouse','jumpsuit','knuckles','monsoon','motorcycle',
            'muscles','musician','mustache','pocketbook','professor','pumpkin','pyramid',
            'sideburns','skyscraper','spaghetti','squeegee','stamen','submarine',
            'suitcase','supermarket','tambourine','trapdoor','trellis','trinket',
            'tsunami','turnstile','typewriter','veranda','waterspout','whirlpool',
            'whirlwind','xylophone'],
    ],
    4 => [
        'count' => ['appendix','artifact','ballerina','biologist','brigade','caveat',
            'choreographer','colonel','consultant','despot','description','destination',
            'dietitian','dilemma','domicile','enclosure','frigate','geologist',
            'hairstylist','historian','illustration','journalist','landscaper',
            'legislator','lieutenant','mathematician','millennium','neurologist',
            'nuisance','numerologist','nutritionist','operation','pediatrician',
            'photographer','physician','physiologist','playwright','presentation',
            'psychiatrist','psychologist','radiologist','recluse','screenwriter',
            'sociologist','statistician','suggestion','technician','variant',
            'veterinarian','vitamin','zoologist'],
        'mass' => ['aluminum','assistance','athletics','cholera','conceit','confidence',
            'conscience','corruption','cowardice','economics','electronics',
            'engineering','entertainment','equipment','evidence','excellence','genetics',
            'graffiti','gymnastics','hospitality','humidity','hydrogen','information',
            'insurance','literature','machinery','management','mayonnaise','methane',
            'literature','patriotism','photography','physics','porcelain','publicity',
            'nitrogen','smallpox','software','starvation','transportation',
            'understanding','vengeance','vocabulary'],
        'abstract' => ['adoration','amazement','arrogance','chastity','communication',
            'compassion','contentment','curiosity','depression','determination',
            'development','dexterity','dictatorship','disappointment','domination',
            'dependence','elocution','enhancement','enthusiasm','faithlessness',
            'fascination','favoritism','felicity','fragility','frailty','generosity',
            'graciousness','helplessness','heredity','homelessness','importation',
            'inflation','motivation','opportunity','opulence','perception','redemption',
            'recollection','restriction','restoration','revelation','satisfaction',
            'self-control','sensitivity','temerity','tolerance','uncertainty',
            'unemployment'],
        'concrete' => ['accessory','ammunition','apparatus','auditorium','barometer',
            'cartridge','castanets','catacomb','clarinet','contraption','conveyor',
            'earthquake','edifice','estuary','fortress','hippodrome','locomotive',
            'machinery','marsupial','frigate','gondola','mechanism','merchandise',
            'mezzanine','monastery','philosopher','physician','satellite','saxophone',
            'scaffolding','tabernacle','thermometer'],
    ],
    5 => [
        'count' => ['adversary','advertisement','apparition','aqueduct','battalion',
            'cardiologist','catastrophes','circumstances','conjectures','cryptographer',
            'demographer','dermatologist','epicenter','genealogist','geophysicist',
            'gynecologist','kinesiologist','lacerations','meteorologist',
            'microbiologist','neurologist','numerologist','numismatist','occurrence',
            'paleontologist','pathologist','pedologist','physiologist','poltergeist',
            'predicament','receptionist','regiment','sociologist','supremacist',
            'university'],
        'mass' => ['adolescence','advertising','anticipation','archaeology',
            'architecture','avionics','comprehension','consciousness','demotivation',
            'ergonomics','immortality','independence','infrastructure','intimidation',
            'linguistics','macroeconomics','microeconomics','microelectronics',
            'molybdenum','paleontology','plutonium','pneumonia','propaganda',
            'rationality','reengineering','significance','theology','turbulence',
            'vegetarianism','ventilation'],
        'abstract' => ['acrimony','abhorrence','affability','apprehension',
            'benevolence','camaraderie','congeniality','convalescence','conviviality',
            'despondence','dispiritedness','dissemination','functionality',
            'eccentricity','hallucination','hypersensitivity','idiosyncrasy','ignominy',
            'impartiality','impertinence','incapacity','indolence','infatuation',
            'insinuation','irrationality','languorousness','malevolence','mortification',
            'opportunism','peculiarity','perseverance','serendipity','solemnity',
            'sophistication','speculation','spontaneity'],
        'concrete' => ['accelerometer','accoutrement','amphitheater',
            'autotransformer','candelabra','capacitor','carburetor','cartographer',
            'compressor','cytoplasm','cyclotron','desiccator','evaporator','habiliment',
            'hallucinogen','heterotroph','inductor','lithographer','microorganism',
            'microprocessor','paraphernalia','projectile','protoplasm','protuberance',
            'ziggurat','zucchini'],
    ],
];

// Category definitions used on feedback page.
$categoryDefs = [
    'count noun'    => 'Count nouns are nouns that can be counted.',
    'mass noun'     => 'Mass nouns are nouns that cannot be counted under normal usage.',
    'abstract noun' => 'Abstract nouns are nouns that cannot be detected by our senses.',
    'concrete noun' => 'Concrete nouns are nouns that can be detected by any of our senses.',
];

// ---- Helpers (§8.4) ----
// Word box: hugs the noun (width:fit-content) with ample padding so short
// nouns like "air" or "dew" don't render as a skinny capsule.
function nk_word_box(string $html, int $minHeight = 100): void {
    echo '<div style="width:fit-content;max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:28px 52px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- Question generation (§6) ----
function build_nk_question(array $dataByTier, string $lvl, int $grd, string $sessionKey): array {
    $tier     = resolve_nk_tier($lvl, $grd);
    $tierData = $dataByTier[$tier];

    // Grade gate (legacy verbatim): grade 1 (all levels) and grade 2 (Easy only)
    // see only the count/mass question pair.
    $qoptMax = 4;
    if ($grd === 1)                        $qoptMax = 2;
    if ($grd === 2 && $lvl === 'Easy')     $qoptMax = 2;
    $qopt = rand(1, $qoptMax);

    switch ($qopt) {
        case 1: $list = $tierData['count'];    $correct = 'count noun';    $other = 'mass noun';     break;
        case 2: $list = $tierData['mass'];     $correct = 'mass noun';     $other = 'count noun';    break;
        case 3: $list = $tierData['abstract']; $correct = 'abstract noun'; $other = 'concrete noun'; break;
        default:$list = $tierData['concrete']; $correct = 'concrete noun'; $other = 'abstract noun'; break;
    }

    // No-repeat per (tier, qopt): key = "t$tier:q$qopt:$noun".
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($list as $word) {
        $key = "t$tier:q$qopt:$word";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'word' => $word];
    }
    if (empty($available)) {
        // Clear only current (tier, qopt) entries — preserve other tiers/qopts.
        $prefix = "t$tier:q$qopt:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($list as $word) $available[] = ['key' => "t$tier:q$qopt:$word", 'word' => $word];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $choices = [$correct, $other];
    shuffle($choices);

    return [
        'noun'    => $pick['word'],
        'correct' => $correct,
        'choices' => $choices,
        'lvl'     => $lvl,
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

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $_SESSION[$sessionKey]['current'] = build_nk_question($dataByTier, $lvl, $grd, $sessionKey);
}

// ---- Render (§8, §9, §10) ----
// Title is 40 chars (>35) so §3.3 exception applies — drop the - Grade - Level suffix.
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
render_header($moduleTitle, $moduleTitle, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $art = ($cur['correct'] === 'abstract noun') ? 'an' : 'a';
    $def = $categoryDefs[$cur['correct']] ?? '';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.6;text-wrap:balance;">
    This is <?php echo $art; ?> <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['correct']); ?></strong>.
    <?php echo htmlspecialchars($def); ?>
  </p>
  <?php nk_word_box('<span style="font-size:24pt;font-weight:700;color:#333;line-height:1.4;">' . htmlspecialchars($cur['noun']) . '</span>', 100); ?>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $isCountMass = in_array($q['correct'], ['count noun', 'mass noun'], true);
?>
  <div style="margin:35px auto 16px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    <?php if ($isCountMass): ?>
      Is this a <span style="color:#0000CC;">count noun</span> or a <span style="color:#0000CC;">mass noun</span>?
    <?php else: ?>
      Is this a <span style="color:#0000CC;">concrete noun</span> or an <span style="color:#0000CC;">abstract noun</span>?
    <?php endif; ?>
  </div>
  <?php nk_word_box('<span style="font-size:24pt;font-weight:700;color:#333;line-height:1.4;">' . htmlspecialchars($q['noun']) . '</span>', 100); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
    <tr>
    <?php foreach ($q['choices'] as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:200px;max-width:280px;min-height:64px;padding:12px 20px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>

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