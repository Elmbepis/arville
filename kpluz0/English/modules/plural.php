<?php
// english/modules/plural.php
// Singular and Plural Nouns — static word bank + MC choices; bypass QEngine.
// Legacy Easy/Medium/Hard tiers are collapsed to Easy/Hard: Easy uses the grade tier;
// Hard uses grade tier + 2, clamped to available tiers. Medium is intentionally omitted.
// Rule families and irregular pairs are based on the legacy plural.php banks.

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
$moduleTitle = 'Singular and Plural Nouns';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 5);
$legacyTier = ($grd <= 1) ? 1 : (($grd <= 3) ? 2 : (($grd <= 5) ? 3 : (($grd <= 7) ? 4 : 5)));
if ($lvl === 'Hard') $legacyTier += 2;
$tier = min(6, max(0, $legacyTier - 1));

$regular = [0 => ['s' => ['ant', 'apple', 'arm', 'ball', 'barn', 'bat', 'bead', 'bean', 'bed', 'bell', 'bird', 'bone', 'boat', 'boy', 'book', 'boot', 'bun', 'camp', 'car', 'card', 'cat', 'chair', 'chick', 'coin', 'corn', 'crib', 'cup', 'desk', 'dog', 'doll', 'door', 'drum', 'ear', 'eye', 'fan', 'farm', 'frog', 'fruit', 'girl', 'gum', 'hat', 'head', 'hen', 'horse', 'jar', 'joke', 'jug', 'key', 'king', 'kite', 'lamp', 'lion', 'meal', 'mat', 'mother', 'nail', 'nest', 'nose', 'owl', 'pail', 'pear', 'pen', 'pig', 'poem', 'rake', 'roof', 'sea', 'snake', 'spoon', 'song', 'shoe', 'sun', 'table', 'tiger', 'toad', 'town', 'toy', 'tray', 'tree', 'truck', 'twig', 'vase', 'wall', 'week', 'wheel', 'yard', 'zoo'],
'es' => ['ash', 'ax', 'bash', 'boss', 'box', 'brush', 'bunch', 'bus', 'bush', 'church', 'class', 'coach', 'cross', 'fix', 'fox', 'glass', 'grass', 'kiss', 'loss', 'lunch', 'march', 'match', 'tax', 'touch', 'wax', 'wish'],
'y' => ['army', 'baby', 'belly', 'berry', 'body', 'buddy', 'bunny', 'candy', 'cherry', 'city', 'copy', 'cry', 'daddy', 'daisy', 'diary', 'duty', 'fairy', 'fly', 'hobby', 'jelly', 'lady', 'lily', 'lobby', 'mommy', 'mummy', 'nanny', 'party', 'penny', 'pony', 'puppy', 'rally', 'reply', 'ruby', 'sky', 'story', 'study']],
1 => ['s' => ['actor', 'animal', 'barber', 'basket', 'beast', 'bedroom', 'beetle', 'bottle', 'brook', 'brother', 'bucket', 'camera', 'castle', 'chicken', 'cliff', 'cobweb', 'crane', 'crate', 'crime', 'curve', 'dancer', 'dinner', 'diver', 'driver', 'doctor', 'elbow', 'eraser', 'farmer', 'faucet', 'feather', 'flea', 'finger', 'ghost', 'glove', 'grain', 'grape', 'ground', 'handbag', 'island', 'juggler', 'kingdom', 'kitten', 'lizard', 'locket', 'lung', 'mallet', 'marble', 'mitten', 'month', 'napkin', 'needle', 'notebook', 'ocean', 'parent', 'pearl', 'pencil', 'pillow', 'prince', 'queen', 'rabbit', 'robin', 'saucer', 'sheet', 'singer', 'sister', 'snack', 'soldier', 'stove', 'street', 'teacher', 'thumb', 'tractor', 'trunk', 'turkey', 'umbrella', 'waiter', 'wrist', 'writer', 'zebra'],
'es' => ['anus', 'arch', 'atlas', 'batch', 'beach', 'belch', 'bench', 'bonus', 'branch', 'campus', 'carwash', 'catch', 'circus', 'clash', 'crunch', 'hero', 'mailbox', 'mesh', 'patch', 'peach', 'potato', 'punch', 'ranch', 'splash', 'stitch', 'tomato', 'toothbrush'],
'y' => ['agony', 'bakery', 'bravery', 'canary', 'celery', 'century', 'charity', 'comedy', 'company', 'country', 'county', 'cruelty', 'dolly', 'eatery', 'enemy', 'energy', 'entry', 'envy', 'family', 'ferry', 'firefly', 'folly', 'glory', 'grocery', 'holly', 'ivory', 'jewelry', 'melody', 'memory', 'navy', 'nursery', 'pantry', 'pastry', 'putty', 'trophy', 'victory', 'worry']],
2 => ['s' => ['afternoon', 'airplane', 'airport', 'baseball', 'battle', 'beginner', 'belief', 'believer', 'bicycle', 'breakfast', 'building', 'calendar', 'carpenter', 'cereal', 'channel', 'computer', 'concert', 'cousin', 'cracker', 'creator', 'creature', 'daughter', 'elephant', 'fighter', 'freezer', 'gardener', 'giraffe', 'lawyer', 'machine', 'mountain', 'nation', 'pancake', 'partner', 'pickle', 'printer', 'problem', 'quilt', 'reward', 'riddle', 'rifle', 'roommate', 'sailboat', 'seashore', 'shrub', 'skill', 'slipper', 'space', 'spider', 'sponge', 'squirrel', 'station', 'stranger', 'stream', 'suitcase', 'sweater', 'throat', 'throne', 'triangle', 'vacation', 'vegetable', 'vehicle', 'visitor', 'whisker'],
'es' => ['actress', 'address', 'airbus', 'alias', 'bias', 'birch', 'bleach', 'blush', 'boombox', 'chorus', 'clutch', 'compass', 'complex', 'crutch', 'ditch', 'hoax', 'latch', 'notch', 'princess', 'recess', 'roach', 'scratch', 'sketch', 'speech', 'switch', 'volcano'],
'y' => ['agency', 'ally', 'apology', 'balcony', 'battery', 'belfry', 'bounty', 'butterfly', 'calamity', 'canopy', 'cavity', 'cemetery', 'ceremony', 'clergy', 'deity', 'derby', 'factory', 'faculty', 'fantasy', 'fishery', 'foundry', 'fury', 'galaxy', 'gallery', 'gravity', 'greenery', 'gypsy', 'harmony', 'history', 'honesty', 'injury', 'irony', 'laundry', 'library', 'lullaby', 'luxury', 'majesty', 'misery', 'mystery', 'novelty', 'policy', 'pottery', 'poverty', 'property', 'prophecy', 'proxy', 'quarry', 'query', 'reality', 'remedy', 'robbery', 'royalty', 'scenery', 'society', 'strawberry', 'summary', 'theory', 'tragedy', 'vacancy', 'vanity', 'variety', 'winery']],
3 => ['s' => ['adviser', 'apartment', 'appliance', 'artifact', 'assistant', 'automobile', 'attendant', 'background', 'caption', 'colleague', 'contract', 'connection', 'continent', 'crystal', 'denial', 'disciple', 'eclipse', 'generator', 'governor', 'groundwork', 'gymnast', 'handiwork', 'homecoming', 'hydrant', 'icicle', 'income', 'instrument', 'judgment', 'laborer', 'language', 'minister', 'mouthpiece', 'network', 'opinion', 'passenger', 'photograph', 'playground', 'pleasure', 'poison', 'position', 'practice', 'principal', 'procedure', 'protest', 'rainstorm', 'recital', 'relation', 'scientist', 'seasoning', 'sidewalk', 'sponsor', 'statement', 'struggle', 'supervisor', 'surgeon', 'telephone', 'texture', 'treatment', 'voyage'],
'es' => ['affix', 'airbrush', 'ambush', 'annex', 'approach', 'backlash', 'backwash', 'bliss', 'blotch', 'blowtorch', 'botch', 'breach', 'broach', 'brooch', 'caress', 'census', 'citrus', 'cockroach', 'virus', 'wrench'],
'y' => ['activity', 'agility', 'allergy', 'amity', 'anatomy', 'anchovy', 'anomaly', 'antibody', 'anxiety', 'apathy', 'archery', 'armory', 'artery', 'artistry', 'assembly', 'autonomy', 'autopsy', 'aviary', 'boundary', 'brewery', 'bribery', 'burglary', 'butchery', 'capacity', 'casualty', 'category', 'cavalry', 'chastity', 'chivalry', 'civility', 'clarity', 'courtesy', 'cutlery', 'delivery', 'density', 'destiny', 'dignity', 'discovery', 'divinity', 'duality', 'ecology', 'economy', 'ecstasy', 'entity', 'equality', 'equity', 'facility', 'fallacy', 'fatality', 'felony', 'flattery', 'fluency', 'forgery', 'humidity', 'humility', 'identity', 'ideology', 'imagery', 'industry', 'infancy', 'inquiry', 'jealousy', 'legacy', 'liberty', 'lottery', 'loyalty', 'malady', 'masonry', 'mastery', 'maturity', 'ministry', 'minority', 'modesty', 'mutiny', 'nobility', 'parody', 'penalty', 'pharmacy', 'piracy', 'primary', 'priority', 'privacy', 'quantity', 'recovery', 'scarcity', 'secrecy', 'security', 'serenity', 'severity', 'sorcery', 'strategy', 'surgery', 'sympathy', 'symphony', 'tendency', 'therapy', 'treasury', 'urgency', 'validity', 'velocity', 'vitality', 'warranty', 'wizardry']],
4 => ['s' => ['admission', 'affection', 'announcement', 'appearance', 'compatriot', 'conclusion', 'constraint', 'deceiver', 'deception', 'deduction', 'description', 'devotion', 'disbelief', 'dismissal', 'educator', 'election', 'employment', 'enclave', 'enclosure', 'enterprise', 'examination', 'exemption', 'exercise', 'exertion', 'expectation', 'explanation', 'exponent', 'exposure', 'fiction', 'figurine', 'foundation', 'government', 'guidance', 'guideline', 'illusion', 'illustration', 'ignition', 'implement', 'importance', 'impression', 'infection', 'inspection', 'inspiration', 'instruction', 'instructor', 'lecturer', 'mechanism', 'narrative', 'nuisance', 'observation', 'occurrence', 'participation', 'performance', 'physician', 'portrayal', 'pollutant', 'pollution', 'practitioner', 'prediction', 'presentation', 'principle', 'privilege', 'proceeding', 'professor', 'pseudonym', 'recitation', 'refreshment', 'relaxation', 'residence', 'restraint', 'sensation', 'specialist', 'superstition', 'treason', 'undertaking', 'utterance', 'vengeance'],
'es' => ['abyss', 'access', 'albatross', 'anguish', 'antihero', 'antivirus', 'asparagus', 'backflush', 'backslash', 'bandpass', 'biofix', 'biogas', 'biomass', 'blemish', 'blitz', 'buttress', 'bypass', 'carcass', 'caucus', 'cinch', 'climax', 'compress', 'distress', 'wilderness'],
'y' => ['acidity', 'actuary', 'adequacy', 'adultery', 'advisory', 'advocacy', 'amnesty', 'analogy', 'anarchy', 'ancestry', 'annuity', 'audacity', 'authority', 'biopsy', 'brevity', 'brutality', 'buoyancy', 'candidacy', 'celebrity', 'celibacy', 'clemency', 'creativity', 'curiosity', 'currency', 'custody', 'decency', 'delicacy', 'dormancy', 'efficacy', 'elegy', 'embassy', 'emergency', 'empathy', 'entirety', 'epilepsy', 'eternity', 'eulogy', 'familiarity', 'ferocity', 'fidelity', 'finality', 'formality', 'fraternity', 'frequency', 'gluttony', 'heresy', 'hilarity', 'impurity', 'insanity', 'intimacy', 'legality', 'literacy', 'locality', 'mobility', 'monarchy', 'monopoly', 'monotony', 'morality', 'naivety', 'nativity', 'obesity', 'opportunity', 'polarity', 'potency', 'progeny', 'puberty', 'quackery', 'registry', 'revelry', 'scrutiny', 'synergy', 'topology', 'toxicity', 'vagrancy']],
5 => ['s' => ['acumen', 'affidavit', 'affirmation', 'allegation', 'allegiance', 'amusement', 'application', 'appreciation', 'assertion', 'assumption', 'assurance', 'attachment', 'authorization', 'commotion', 'confidence', 'conjecture', 'contention', 'contraption', 'conveyance', 'conviction', 'credence', 'distraction', 'diversion', 'domicile', 'dominance', 'domination', 'embodiment', 'enchantment', 'engagement', 'exploitation', 'fascination', 'habitation', 'inclination', 'infatuation', 'intuition', 'involvement', 'manipulation', 'marionette', 'obligation', 'originator', 'perpetrator', 'persuasion', 'proclamation', 'profession', 'progression', 'recurrence', 'reliance', 'sentiment', 'transaction', 'ventilation', 'verbalization', 'vocalization'],
'es' => ['abscess', 'adulteress', 'anabranch', 'autopatch', 'bullfinch', 'burgess', 'chrysalis'],
'y' => ['accountancy', 'actuality', 'adversity', 'affinity', 'alimony', 'allegory', 'amenity', 'anonymity', 'antiquity', 'aristocracy', 'atrocity', 'austerity', 'availability', 'bankruptcy', 'bigotry', 'blasphemy', 'causality', 'certainty', 'commodity', 'complexity', 'conformity', 'consistency', 'conspiracy', 'continuity', 'controversy', 'credibility', 'criminality', 'democracy', 'dexterity', 'discrepancy', 'disparity', 'durability', 'efficiency', 'elasticity', 'entropy', 'expectancy', 'extremity', 'fertility', 'festivity', 'flexibility', 'fluidity', 'generosity', 'hospitality', 'hypocrisy', 'illiteracy', 'immaturity', 'inequality', 'ingenuity', 'insecurity', 'integrity', 'intensity', 'liability', 'liquidity', 'masculinity', 'obituary', 'obscurity', 'opacity', 'probability', 'redundancy', 'resiliency', 'salinity', 'sobriety', 'solvency', 'tranquility', 'ubiquity', 'veracity', 'volatility', 'vulgarity']],
6 => ['s' => ['authorization', 'bailiwick', 'confidence', 'contention', 'conveyance', 'conviction', 'credence', 'domicile', 'dominance', 'embodiment', 'engagement', 'exploitation', 'fascination', 'habitation', 'hallucination', 'incantation', 'involvement', 'obligation', 'originator', 'perpetrator', 'prerogative', 'presumption', 'proclamation', 'profession', 'progression', 'recurrence', 'reliance', 'transference', 'vehemence', 'ventilation', 'verbalization', 'vocalization'],
'es' => ['abbotess', 'arbitress', 'arbovirus', 'archeress', 'auditress', 'avertress', 'aviatress', 'breweress'],
'y' => ['absurdity', 'adaptability', 'additivity', 'adjacency', 'admiralty', 'advisability', 'alkalinity', 'ambiguity', 'amiability', 'amorality', 'angularity', 'animosity', 'authenticity', 'autocracy', 'barbarity', 'biodiversity', 'bureaucracy', 'cardinality', 'centrality', 'chemotherapy', 'circularity', 'complacency', 'complicity', 'concurrency', 'conductivity', 'confederacy', 'constituency', 'contingency', 'culpability', 'degeneracy', 'delinquency', 'dependency', 'depravity', 'despondency', 'dichotomy', 'duplicity', 'eccentricity', 'electability', 'electricity', 'eligibility', 'equanimity', 'equivalency', 'eventuality', 'exclusivity', 'expediency', 'fallibility', 'feasibility', 'frivolity', 'frugality', 'gastronomy', 'homogeneity', 'illegality', 'illegitimacy', 'immobility', 'impartiality', 'impropriety', 'incongruity', 'incredulity', 'indemnity', 'infirmity', 'insolvency', 'intricacy', 'malleability', 'miscibility', 'monstrosity', 'obstinacy', 'peculiarity', 'permeability', 'perplexity', 'philanthropy', 'plausibility', 'poignancy', 'propensity', 'reciprocity', 'sagacity', 'serendipity', 'singularity', 'sovereignty', 'spontaneity', 'universality', 'virtuosity', 'volubility']]];
$irregular = [0 => [['child', 'children'], ['deer', 'deer'], ['foot', 'feet'], ['goose', 'geese'], ['man', 'men'], ['mouse', 'mice'], ['sheep', 'sheep'], ['tooth', 'teeth'], ['woman', 'women'], ['leaf', 'leaves'], ['knife', 'knives'], ['wolf', 'wolves'], ['life', 'lives'], ['calf', 'calves']],
1 => [['axis', 'axes'], ['basis', 'bases'], ['cactus', 'cacti'], ['child', 'children'], ['deer', 'deer'], ['foot', 'feet'], ['goose', 'geese'], ['mouse', 'mice'], ['ox', 'oxen'], ['sheep', 'sheep'], ['tooth', 'teeth'], ['woman', 'women'], ['knife', 'knives'], ['leaf', 'leaves']],
2 => [['beau', 'beaux'], ['crisis', 'crises'], ['datum', 'data'], ['diagnosis', 'diagnoses'], ['focus', 'foci'], ['fungus', 'fungi'], ['index', 'indices'], ['medium', 'media'], ['nucleus', 'nuclei'], ['oasis', 'oases'], ['series', 'series'], ['species', 'species'], ['thief', 'thieves'], ['wolf', 'wolves']],
3 => [['analysis', 'analyses'], ['antenna', 'antennae'], ['appendix', 'appendices'], ['bacterium', 'bacteria'], ['criterion', 'criteria'], ['curriculum', 'curricula'], ['datum', 'data'], ['diagnosis', 'diagnoses'], ['formula', 'formulae'], ['genus', 'genera'], ['hypothesis', 'hypotheses'], ['memorandum', 'memoranda'], ['phenomenon', 'phenomena'], ['radius', 'radii'], ['stimulus', 'stimuli'], ['thesis', 'theses']],
4 => [['analysis', 'analyses'], ['appendix', 'appendices'], ['bacterium', 'bacteria'], ['corpus', 'corpora'], ['crisis', 'crises'], ['criterion', 'criteria'], ['curriculum', 'curricula'], ['dilemma', 'dilemmata'], ['ellipsis', 'ellipses'], ['enigma', 'enigmata'], ['matrix', 'matrices'], ['mausoleum', 'mausolea'], ['nebula', 'nebulae'], ['phenomenon', 'phenomena'], ['stimulus', 'stimuli'], ['tableau', 'tableaux']],
5 => [['analysis', 'analyses'], ['antenna', 'antennae'], ['appendix', 'appendices'], ['bacterium', 'bacteria'], ['corpus', 'corpora'], ['crisis', 'crises'], ['criterion', 'criteria'], ['curriculum', 'curricula'], ['dilemma', 'dilemmata'], ['ellipsis', 'ellipses'], ['hypothesis', 'hypotheses'], ['matrix', 'matrices'], ['memorandum', 'memoranda'], ['phenomenon', 'phenomena'], ['synopsis', 'synopses'], ['thesis', 'theses']],
6 => [['analysis', 'analyses'], ['antenna', 'antennae'], ['appendix', 'appendices'], ['bacterium', 'bacteria'], ['corpus', 'corpora'], ['crisis', 'crises'], ['criterion', 'criteria'], ['curriculum', 'curricula'], ['dilemma', 'dilemmata'], ['ellipsis', 'ellipses'], ['hypothesis', 'hypotheses'], ['matrix', 'matrices'], ['memorandum', 'memoranda'], ['phenomenon', 'phenomena'], ['synopsis', 'synopses'], ['vertebra', 'vertebrae']]];

function plural_form($word, $rule) {
    if ($rule === 'es') return $word . 'es';
    if ($rule === 'y') return substr($word, 0, -1) . 'ies';
    return $word . 's';
}
function make_options($answer, $sourceWords, $rule, $irregularPairs, $form) {
    $wrong = [];
    // Keep all options in the requested grammatical form.
    $candidates = [];
    foreach ($sourceWords as $w) {
        if ($form === 'singular') {
            $candidates[] = $w;
        } else {
            $candidates[] = (substr($w, -1) === 'y') ? substr($w, 0, -1) . 'ies' : ((in_array(substr($w, -1), ['s','x','z']) || in_array(substr($w, -2), ['sh','ch'])) ? $w . 'es' : $w . 's');
        }
    }
    foreach ($irregularPairs as $pair) $candidates[] = $form === 'singular' ? $pair[0] : $pair[1];
    if ($form === 'singular') { $candidates[] = substr($answer, 0, -1); }
    else { $candidates[] = $answer . 's'; $candidates[] = $answer . 'es'; }
    $candidates = array_values(array_unique(array_filter($candidates, function($v) use ($answer) {
        return $v !== $answer && $v !== '';
    })));
    shuffle($candidates);
    $wrong = array_slice($candidates, 0, 3);
    $choices = array_merge($wrong, [$answer]);
    shuffle($choices);
    return $choices;
}
function pick_plural_item($regular, $irregular, $tier, $sessionKey) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $items = [];
    foreach (['s','es','y'] as $rule) {
        foreach (($regular[$tier][$rule] ?? []) as $word) $items[] = ['singular'=>$word, 'plural'=>plural_form($word, $rule), 'rule'=>$rule, 'irregular'=>false];
    }
    foreach (($irregular[$tier] ?? []) as $pair) $items[] = ['singular'=>$pair[0], 'plural'=>$pair[1], 'rule'=>'irregular', 'irregular'=>true];
    $available = [];
    foreach ($items as $i => $item) if (!in_array($i, $used, true)) $available[$i] = $item;
    if (!$available) { $used = []; $available = $items; }
    if (!$available) return null;
    $keys = array_keys($available); $index = $keys[array_rand($keys)];
    $used[] = $index; if (count($used) > 150) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;
    return $available[$index];
}

$result = null; $scorer = null;
if (isset($_POST['answer_submit'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $typed = trim((string)($_POST['user_answer'] ?? ''));
    $scorer = new Scorer($conn, $moduleId);
    // Case-insensitive, whitespace-trimmed comparison
    $isCorrect = $scorer->processAnswer(strtolower($typed), strtolower($cur['answer']), $cur['lvl']);
    $result = ['correct'=>$isCorrect, 'clicked'=>$typed, 'cur'=>$cur];
    unset($_SESSION[$sessionKey]['current']);
}
if ($result === null || isset($_POST['Submit2'])) {
    $item = pick_plural_item($regular, $irregular, $tier, $sessionKey);
    if ($item === null) { $item = ['singular'=>'child','plural'=>'children','rule'=>'irregular','irregular'=>true]; }
    $form = (mt_rand(0,1) === 0) ? 'plural' : 'singular';
    $answer = ($form === 'plural') ? $item['plural'] : $item['singular'];
    $promptWord = ($form === 'plural') ? $item['singular'] : $item['plural'];
    $_SESSION[$sessionKey]['current'] = ['item'=>$item, 'form'=>$form, 'promptWord'=>$promptWord, 'answer'=>$answer, 'lvl'=>$lvl];
    $q = $_SESSION[$sessionKey]['current'];
}
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
render_header($moduleTitle.' - '.$lvl, $moduleTitle.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-size:14pt;color:#666;margin-top:20px;">You typed: <strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong></p>
  <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-size:16pt;color:#800080;">The <?php echo htmlspecialchars($cur['form']); ?> form of <strong><?php echo htmlspecialchars($cur['promptWord']); ?></strong> is <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>.</p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
  <div style="margin:45px auto 25px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#800080;">
    What is the <?php echo htmlspecialchars($q['form']); ?> form of <strong style="color:#CC0066;"><?php echo htmlspecialchars($q['promptWord']); ?></strong>?
  </div>
  <div style="margin:20px auto;">
    <input type="text" name="user_answer" autocomplete="off" autocapitalize="none"
           spellcheck="false" 
           style="font-size:18pt;padding:10px 16px;border:2px solid #888888;border-radius:8px;
                  width:180px;text-align:center;color:#0000CC;">
  </div>
  <input type="submit" name="answer_submit" value=" Submit "
         style="margin:30px 0;">&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="Submit2" value=" New Question " formnovalidate style="margin:30px 0;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Verdana,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Verdana,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>