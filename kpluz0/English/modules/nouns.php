<?php
// english/modules/nouns.php
// Identifying Nouns — click the noun among four words (4 choices).
// 2 levels (Easy, Hard); tier index = grade-aware word bank (0–10).
// grade from $_SESSION['user_grade'] (0–10).

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
$moduleTitle = 'Identifying Nouns';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade resolution ------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ---- Level resolution ------------------------------------------------------
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard'; // migrate legacy Medium -> Hard
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- (level, grade) -> tier index ------------------------------------------
// Legacy:
//   Easy:   $arrnum = $grd;         if ($grd>=8) $arrnum = 8;
//   Medium: $arrnum = $grd + 1;     if ($grd>=8) $arrnum = 9;
//   Hard:   $arrnum = $grd + 2;     if ($grd>=8) $arrnum = 10;
// Modern Hard uses legacy Hard (the harder of Medium/Hard).
// Arrays are 0-indexed, so grade 0 is a valid tier.
function resolve_nouns_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        return ($grd >= 8) ? 8 : $grd;
    }
    return ($grd >= 8) ? 10 : $grd + 2;
}

// ---- Word banks (indexed by tier = grade level) ----------------------------
$nounsByTier = [
    0 => [
        "Ana", "Ben", "Beth", "Bob", "Carl", "Dan", "Edna", "Eric", "Gina", "Jack", "Jill", "John", "Leo", "Lucy", "Mary", "Paul", "Sam", "Tom", "Tony", "apple", "arm", "aunt",
        "ball", "barn", "bat", "bear", "bed", "bee", "bell", "bird", "boat", "bone", "book", "boy", "bun", "bus", "cake", "calf", "can", "cap", "car", "cat", "corn", "cow", "cub",
        "cup", "dad", "deer", "desk", "dish", "dog", "doll", "door", "drum", "ears", "eyes", "fan", "feet", "fox", "frog", "girl", "hat", "head", "hen", "jar", "jug", "key", "king",
        "kite", "lamp", "lion", "man", "map", "mat", "men", "mom", "nose", "owl", "pail", "pen", "pet", "pie", "pig", "pot", "rat", "shoe", "son", "sun", "toad", "toe", "toy",
        "tree", "tub", "van", "vase", "wig",
    ],
    1 => [
        "Alex", "Ana", "Ben", "Betty", "Carol", "Cebu", "Danny", "Davao", "David", "Ellen", "Emily", "Gina", "Henry", "Hilda", "Japan", "Jeff", "Jenny", "John", "Laguna", "Leo",
        "Linda", "Lucy", "Luzon", "Makati", "Manila", "Maria", "Noynoy", "Pasay", "Pasig", "Paul", "Peter", "Randy", "Rizal", "Sam", "Simon", "Tom", "Tony", "Willy",
        "actor", "apple", "arm", "arms", "aunt", "baker", "ball", "banana", "barn", "bat", "bead", "bean", "bear", "bed", "bee", "bell", "berry", "bike", "bird", "boat", "bone", "book",
        "boots", "boss", "boxer", "boy", "bread", "brick", "brother", "bun", "bus", "bush", "calf", "candy", "car", "card", "cat", "cave", "chair", "chef", "chick", "chin", "clam", "corn",
        "crayon", "crib", "crow", "crown", "cup", "dancer", "deer", "desk", "dirt", "dish", "doctor", "dog", "door", "dove", "dress", "drum", "ears", "eyes", "farmer", "father",
        "feet", "flag", "flower", "fog", "fox", "friend", "frog", "fruit", "girl", "hats", "head", "hen", "hero", "hill", "horn", "hose", "house", "jar", "jug", "juice", "keys", "king",
        "kite", "lady", "lake", "lamp", "lion", "maid", "man", "mask", "mat", "meal", "meat", "mice", "milk", "moon", "mother", "nest", "nose", "owl", "pail", "paper", "pear", "pen", "pencil",
        "pig", "pillow", "puppy", "rabbit", "road", "rock", "roof", "room", "rose", "seed", "shoe", "shoes", "singer", "sister", "snail", "snake", "sofa", "star", "stove", "straw",
        "street", "table", "teacher", "tent", "tiger", "toad", "town", "toy", "tray", "tree", "truck", "uncle", "vase", "wheel", "wife", "wig", "wolf", "woman", "wood",
    ],
    2 => [
        "Alex", "Andrea", "Andrew", "Ann", "Barry", "Bernie", "Beth", "Betty", "Bohol", "Boracay", "Brian", "Bulacan", "Carol", "Cavite", "Cebu", "China", "Danny", "Davao", "David",
        "Diana", "Dominic", "Ellen", "Emily", "George", "Gina", "Henry", "Hilda", "Japan", "Jeffrey", "Jenny", "John", "Laguna", "Leo", "Linda", "Louie", "Lucy", "Luneta", "Luzon", "Malabon",
        "Manila", "Margie", "Maria", "Mr. Cruz", "Mr. Luna", "Noynoy", "Palawan", "Paul", "Peter", "Randy", "Sam", "Simon", "Tom", "Tony", "Willy", "actor", "airport", "animal", "apple", "arms",
        "aunt", "baker", "ball", "balloon", "battery", "beach", "bead", "bean", "bear", "beard", "bed", "bedroom", "beetle", "beggar", "bell", "berry", "bird", "boat", "book", "boots", "boss",
        "bottle", "boxer", "boy", "brain", "bread", "brick", "brother", "bucket", "bunny", "bus", "bush", "calf", "camera", "candy", "car", "card", "castle", "cat", "cave", "chair", "cheeks",
        "chef", "cherry", "chick", "chicken", "child", "children", "city", "coffee", "coin", "corn", "country", "cracker", "crib", "crook", "cup", "daisy", "dancer", "deer", "dentist", "desk",
        "diaper", "diary", "dishes", "diver", "doctor", "dog", "donkey", "door", "dove", "downtown", "driver", "drum", "dust", "ears", "eraser", "eye", "eyes", "fairy", "family", "farmer", "father",
        "faucet", "feather", "feet", "food", "fox", "friend", "frog", "fruit", "ghost", "girl", "glass", "glove", "goldfish", "goose", "grape", "grass", "hat", "head", "hen", "hero", "hoop",
        "horse", "ice", "jar", "jug", "keys", "king", "kite", "kitten", "knife", "lady", "ladybug", "lamp", "lawyer", "lily", "lion", "lizard", "loaf", "mailman", "mallet", "marble", "mat",
        "meat", "mitten", "money", "napkin", "needle", "nose", "notebook", "owl", "pail", "painter", "paper", "parent", "peach", "pear", "pen", "pencil", "people", "pig", "pillow", "potato",
        "prince", "princess", "printer", "puppy", "queen", "rabbit", "rake", "ranch", "robin", "robins", "roof", "sack", "sailboat", "saucer", "sea", "seaman", "shark", "shoes", "singer", "sister",
        "slipper", "snake", "soap", "sofa", "soldier", "song", "spoon", "stork", "stove", "street", "summer", "sun", "teacher", "thief", "throne", "thumb", "tiger", "toad", "tomato", "tooth",
        "toy", "tractor", "trail", "tray", "trick", "truck", "trunk", "twig", "umbrella", "uncle", "vase", "waiter", "wallet", "week", "welder", "whale", "wheel", "wife", "winter",
        "wolf", "woman", "wood", "wool", "yard", "zebra",
    ],
    3 => [
        "Alex", "Andrew", "Ann", "Barry", "Bernie", "Beth", "Betty", "Bruce", "Carol", "Dana", "Danny", "David", "Dinah", "Donald", "Dustin", "Ellen", "Emily", "George", "Gina", "Henry",
        "Hilda", "Jeffrey", "John", "Leo", "Linda", "Louie", "Marge", "Maria", "Mr. Lee", "Mr. Wong", "Paul", "Peter", "Randy", "Sam", "Sandy", "Simon", "Tom", "Tony", "Waldo", "actor",
        "airplane", "airport", "animal", "army", "barber", "baseball", "battery", "beach", "beard", "beast", "bedroom", "beef", "beetle", "beggar", "berry", "bicycle", "birthday", "bottle",
        "brain", "bread", "brick", "brook", "brother", "bucket", "bunny", "bushes", "butter", "cabbage", "calendar", "camera", "canary", "candy", "cannon", "castle", "cattle", "cave",
        "caveman", "cemetery", "cent", "cereal", "chairman", "cheeks", "cherries", "chicken", "child", "city", "class", "cobweb", "coffee", "country", "county", "cracker", "crate", "creature",
        "crutch", "cutter", "daisy", "daughter", "diaper", "diary", "dinner", "doctor", "donkey", "eatery", "eggnog", "elbow", "elephant", "enemy", "eyelash", "fairy", "family", "faucet",
        "feather", "firefly", "fireman", "freezer", "fruit", "gate", "geese", "ghost", "glove", "godchild", "goldfish", "goose", "grain", "grape", "ground", "haircut", "handbag", "hobbies",
        "holiday", "horse", "housefly", "icicle", "island", "juggler", "kitten", "knife", "laborer", "ladybug", "lawyer", "library", "lizards", "locket", "louse", "lumber", "lunch", "lungs",
        "machine", "mailbox", "mailman", "mallet", "marble", "mitten", "money", "mountain", "music", "napkin", "nation", "needle", "notebook", "nursery", "oatmeal", "ocean", "pail", "pancake",
        "pantry", "parent", "pastry", "peach", "pear", "penny", "people", "pest", "pickles", "pillow", "pleasure", "poem", "popcorn", "potato", "prince", "princess", "printer", "queen", "quilt", "rabbit",
        "railway", "ranch", "rifle", "roach", "robins", "rosary", "sailboat", "salary", "saucer", "scarf", "scissors", "sea", "seaman", "sheet", "shoes", "shrubs", "sidewalk", "sister",
        "skill", "slipper", "snack", "sofa", "soldier", "song", "space", "speech", "spiders", "sponge", "spoon", "squirrel", "stork", "stove", "stranger", "stream", "street", "stuntman",
        "sugar", "suitcase", "sweater", "teacher", "thief", "throne", "thumb", "tomato", "tooth", "tractor", "trial", "trousers", "trunk", "turkey", "twig", "umbrella", "uncle", "veil",
        "visitor", "volcano", "waiter", "wallet", "wheel", "whisker", "wood", "wrench", "zebra",
    ],
    4 => [
        "airplane", "anger", "appliance", "arithmetic", "badge", "basketball", "beast", "beetle", "beggar", "bicycle", "birthday", "brain", "breakfast", "bubble",
        "bubblegum", "bucket", "buildings", "butterfly", "cabbage", "cable", "cactus", "calculator", "calendar", "canary", "cannon", "carpenter", "cattle", "celery", "cellar", "cemetery",
        "century", "chairman", "coast", "colony", "company", "corps", "crate", "cream", "creator", "creature", "daughter", "discovery", "donkey", "earthquake", "eatery", "elephant",
        "eyeglasses", "eyelash", "faucet", "feather", "finger", "firefly", "fireman", "fisherman", "frame", "freezer", "furniture", "ghost", "giraffe", "godchild", "governor", "grandchild",
        "handbag", "hobbies", "holiday", "honey", "housefly", "hydrant", "icicle", "income", "instrument", "island", "jeans", "jellyfish", "juggler", "kingdom", "laborer", "lawyer", "legend",
        "lettuce", "library", "lizards", "locket", "lumber", "machine", "marble", "martyr", "memory", "minister", "money", "month", "mountain", "mystery", "nation", "needle", "nursery",
        "oatmeal", "ocean", "pancake", "passenger", "patrolman", "photograph", "pickles", "picture", "playground", "pleasure", "policeman", "princess", "quicksand", "railway", "rainstorm",
        "recess", "restaurant", "riddle", "rifle", "rosary", "salary", "saucer", "scarecrow", "scissors", "seashore", "secretary", "shrubs", "sidewalk", "slave", "sleet", "spiders", "sponge",
        "squirrel", "station", "stepchild", "stranger", "strawberry", "stuntman", "suitcase", "sunglasses", "superhero", "sweater", "tales", "telephone", "television", "territory", "throat",
        "throne", "title", "tomatoes", "toothbrush", "toothpaste", "treatment", "triangle", "trousers", "turkey", "underwear", "vacation", "vegetable", "vein", "visitor", "volcano",
        "volleyball", "voyage", "weather", "whisker", "wilderness", "wrench", "wrist", "year",
    ],
    5 => [
        "action", "activity", "afternoon", "apparel", "appliance", "artifacts", "basketball", "beginner", "beliefs", "birthday", "border", "boundary", "breakfast",
        "bubblegum", "buildings", "butterfly", "cable", "calculator", "calendar", "caption", "carpenter", "cemetery", "century", "chairman", "circle", "clearance", "company",
        "contents", "creator", "creatures", "daughter", "delivery", "denial", "destiny", "discovery", "earthquake", "education", "elephant", "evidence", "eyeglasses", "eyelashes",
        "fireflies", "fisherman", "friction", "furniture", "galley", "giraffe", "godchild", "governor", "grandchild", "health", "hobbies", "holidays", "houseflies", "hydrant", "idea",
        "instrument", "jellyfish", "kingdom", "knowledge", "laborer", "language", "lawyer", "lettuce", "library", "linen", "locket", "lumber", "machine", "magic", "martyr", "memory",
        "minister", "mountain", "music", "mystery", "nursery", "oatmeal", "ornament", "pancake", "partner", "passenger", "patrolman", "pickles", "plantation", "playground", "pleasure",
        "policewoman", "pollution", "princess", "quicksand", "railway", "recess", "restaurant", "route", "scarecrow", "scene", "scent", "seashore", "secretary", "sidewalk", "squirrel",
        "station", "stepchild", "stranger", "strawberry", "stuntman", "suitcase", "sunglasses", "superhero", "sweater", "telephone", "television", "territory", "textures", "thoughts",
        "tomatoes", "toothbrush", "toothpaste", "treatment", "triangle", "trousers", "underwear", "vacation", "vegetable", "vein", "visitor", "volcano", "volleyball", "wealth", "weather",
        "whisker", "wilderness", "wren", "wrist", "writer",
    ],
    6 => [
        "accountant", "achievement", "acquisition", "activities", "aftermath", "afternoons", "afterthought", "apparel", "appliance", "artifacts", "aviaries", "beginner", "beliefs",
        "boundary", "breakfast", "calculator", "calendar", "caption", "carpenter", "cemeteries", "century", "chairman", "company", "condensation", "connection", "cooperation",
        "creatures", "delivery", "denial", "destiny", "discovery", "distress", "earthquake", "education", "electricity", "enclosure", "evaporation", "evidence", "friction", "furniture",
        "governor", "grandchild", "grandfather", "grandmother", "hobbies", "holidays", "houseflies", "hydrant", "hubris", "instrument", "language", "library", "minister", "mountain",
        "mystery", "nuisance", "nursery", "omen", "passenger", "patrolman", "photographs", "plantation", "playground", "pleasure", "policewomen", "pollution", "precipitation",
        "presentation", "quicksand", "railway", "refrigerator", "refusal", "relief", "restaurant", "scarecrow", "seashore", "secretary", "sidewalk", "stepchild", "stranger", "strawberry",
        "stuntman", "suitcase", "sunglasses", "superhero", "sweater", "telephone", "television", "territory", "textures", "tomatoes", "toothbrush", "toothpaste", "treatment", "trousers",
        "underwear", "vacation", "vanity", "vegetable", "visitor", "volcano", "volleyball", "weasel", "weather", "wilderness",
    ],
    7 => [
        "abolition", "accountants", "achievement", "acquisition", "acquittal", "activities", "acumen", "aftermath", "afterthought", "allotment", "amendment", "amusement", "appearance",
        "appendix", "assembly", "assessment", "assignment", "attendant", "bewilderment", "bribery", "caprice", "cemeteries", "commitment", "compensation", "conceit", "condensation",
        "connection", "consideration", "consistency", "credence", "czar", "deacon", "deceiver", "deception", "defendant", "deflection", "demise", "demolition", "deportation", "description",
        "destiny", "detachment", "digestion", "dilemma", "discovery", "dismissal", "distemper", "distillery", "distress", "ecstasy", "elasticity", "elopement", "embodiment", "enclosure",
        "endorsement", "enforcement", "enigma", "establishment", "evaporation", "exponent", "freshener", "godchildren", "governor", "hibernation", "hubris", "ignition", "impeachment",
        "inhabitant", "inscription", "instrument", "lingerie", "mysteries", "naivete", "nostalgia", "nuance", "nuisance", "parliament", "perusal", "philosophy", "photography", "pollution",
        "postponement", "precipitation", "prescription", "presentation", "prevention", "profession", "reflection", "refreshment", "refrigerator", "reliever", "replenishment", "reputation",
        "requiem", "resentment", "retrieval", "scaffold", "sweetener", "transcript", "treason", "treaties", "vanity",
    ],
    8 => [
        "absorption", "abstinence", "accountancy", "achievement", "acoustics", "acquisition", "acquittal", "acumen", "aftermath", "afterthought", "allotment", "amendment", "amusement",
        "appearance", "appendix", "appliance", "archaeology", "artifacts", "assembly", "assessment", "assignment", "attendant", "bewilderment", "bribery", "caprice", "chauvinism",
        "commitment", "compensation", "conceit", "condensation", "connection", "consideration", "consistency", "contingency", "credence", "deceiver", "deception", "defendant", "deflection",
        "demarcation", "demise", "demolition", "deportation", "deprivation", "description", "destiny", "detachment", "digestion", "dilemma", "discoveries", "dismissal", "distemper",
        "distillery", "divinity", "ecstasy", "education", "elasticity", "elopement", "embodiment", "enclosure", "enigma", "entrepreneur", "establishment", "evaporation", "exponent",
        "hubris", "ignition", "impeachment", "inhabitant", "instrument", "legitimacy", "leprechaun", "lingerie", "maelstrom", "mausoleum", "meringue", "millennium", "mystique", "naivete",
        "nostalgia", "nuance", "nuisance", "paranoia", "paraphernalia", "parliament", "philosophy", "plagiarism", "pneumonia", "postponement", "precipitation", "prescription", "prerogative",
        "presentation", "prevention", "profession", "pseudonym", "quandary", "receptacle", "reconnaissance", "recurrence", "refraction", "reflection", "refreshment", "refrigeration",
        "repertoire", "replenishment", "reputation", "requiem", "resentment", "retrieval", "seismology", "subpoena", "subterfuge", "surveillance", "sovereignity", "transcript", "treason",
        "troubadour", "verification", "vaudeville", "vengeance", "verbiage", "vinaigrette",
    ],
    9 => [
        "abstinence", "abstraction", "achievements", "acoustics", "acquisition", "acquittal", "allegation", "alienation", "altercation", "amortization", "amendment", "annexation",
        "apparition", "appendices", "approximation", "archaeology", "assassination", "assemblies", "authentication", "authorization", "calibration", "canonization", "chauvinism",
        "commitment", "compensation", "computerization", "concealment", "condensation", "configuration", "connotation", "consignment", "contingency", "contamination", "contradiction",
        "demarcation", "denomination", "denouement", "depiction", "deposition", "depreciation", "deprivation", "derivation", "deterioration", "deviation", "disappearance", "discernment",
        "distillery", "divestment", "divinities", "elasticity", "embodiment", "entourage", "entrepreneur", "exaggeration", "exploitation", "facilitation", "germination", "hemorrhage",
        "legitimacy", "leprechaun", "maelstrom", "malversation", "mausoleum", "millennium", "mystique", "nostalgia", "nuisance", "paranoia", "paraphernalia", "perseverance", "petulance",
        "plagiarism", "pneumonia", "prerogative", "pseudonym", "quandary", "receptacle", "reconnaissance", "recurrence", "refraction", "reflection", "refrigeration", "renaissance",
        "repertoire", "replenishment", "reputation", "resentment", "resemblance", "retrieval", "seismology", "significance", "subpoena", "subterfuge", "surveillance", "sovereignity",
        "troubadour", "vassalage", "vaudeville", "vengeance", "verbiage", "verification", "vigilance", "vinaigrette",
    ],
    10 => [
        "abandonment", "abomination", "accomplishment", "abrogation", "acclimatization", "accreditation", "acquisition", "advertisement", "admonition", "adjudication", "affirmation",
        "alleviation", "alliteration", "amalgamation", "amelioration", "annunciation", "appropriation", "archaeologists", "ascendance", "ascertainment", "attenuation", "augmentation",
        "befuddlement", "bifurcation", "biodegradation", "calcification", "cannibalization", "capacitance", "categorization", "cauterization", "cavitation", "chlorination", "clairvoyance",
        "coagulation", "collaboration", "commercialization", "concubinage", "contingencies", "crystallization", "culmination", "curtailment", "decimation", "dehumanization", "delamination",
        "delineation", "demarcation", "demilitarization", "democratization", "denouement", "denouncement", "deportation", "deprivation", "destabilization", "differentiation", "diffraction",
        "disambiguation", "discombobulation", "discontinuities", "disembarkation", "disgruntlement", "dissonance", "distilleries", "dissemination", "diversification", "dysfunction",
        "emancipation", "embellishment", "embezzlement", "emulsification", "encumbrance", "entrenchment", "evangelization", "exacerbation", "exponentiation", "extrapolation", "fermentation",
        "flagellation", "glorification", "hallucination", "humidification", "hyperinflation", "hyphenation", "inconsistencies", "indemnification", "insinuations", "insubordination",
        "legitimacy", "maelstrom", "malfeasance", "obeisance", "obfuscation", "obliteration", "omniscience", "onomatopoeia", "oscillation", "paraphernalia", "petrification", "pontification",
        "postponement", "precipitation", "prescription", "prerogative", "protuberance", "reassessment", "recognizance", "reconnaissance", "recurrence", "refrigerants", "replenishment",
        "seismology", "subterfuge", "surveillance", "sovereignity", "transmittance", "verification", "vinaigrette", "visualization",
    ],
];

$adjectivesByTier = [
    0 => [
        "bad", "best", "big", "black", "brown", "blue", "cold", "cool", "cute", "dark", "deep", "dry", "dirty", "dull", "easy", "far", "fast", "fat", "few", "four", "fine",
        "five", "flat", "full", "good", "gray", "high", "hot", "huge", "happy", "hard", "heavy", "old", "last", "late", "lazy", "loud", "low", "mad", "many", "near", "neat",
        "new", "nice", "nine", "old", "pink", "poor", "quick", "quiet", "ripe", "red", "sad", "safe", "same", "salty", "scary", "shy", "sick", "six", "slim", "small", "soft",
        "sore", "sour", "sweet", "tall", "ten", "thin", "tidy", "tiny", "true", "two", "ugly", "weak", "wet", "wide", "wild", "wise", "yellow",
    ],
    1 => [
        "bad", "best", "big", "black", "brave", "brown", "blue", "busy", "calm", "cold", "cool", "cute", "damp", "dark", "dead", "deep", "dirty", "dry", "dull", "dizzy", "easy",
        "far", "fast", "fat", "few", "fine", "five", "four", "flat", "full", "good", "gray", "half", "happy", "hard", "heavy", "high", "hot", "huge", "ill", "odd", "old", "lame",
        "last", "late", "lazy", "loud", "low", "mad", "many", "near", "neat", "needy", "new", "nice", "nine", "odd", "old", "oval", "pale", "past", "pink", "poor", "quick", "quiet",
        "ripe", "rude", "real", "red", "rude", "sad", "safe", "same", "slim", "salty", "scary", "shy", "sick", "six", "slim", "small", "soft", "sore", "sour", "sweet", "tall", "ten",
        "thin", "tidy", "tiny", "true", "two", "ugly", "vast", "weak", "weird", "wet", "wide", "wild", "wise", "yellow",
    ],
    2 => [
        "afraid", "ahead", "alike", "alive", "angry", "awake", "aware", "awful", "bashful", "beautiful", "bitter", "black", "brave", "broad", "brown", "bumpy", "busy", "cheap",
        "chilly", "chubby", "clever", "cloudy", "crazy", "creepy", "cruel", "curly", "damp", "daily", "dirty", "dizzy", "dusty", "eager", "early", "eight", "false", "famous", "female",
        "fierce", "first", "foolish", "fresh", "funny", "furry", "gentle", "great", "half", "handy", "harsh", "healthy", "helpful", "heavy", "itchy", "jolly", "juicy", "jumpy", "keen",
        "known", "lame", "large", "lively", "lonely", "loose", "lowly", "lucky", "lush", "meaty", "meek", "messy", "milky", "minor", "misty", "moldy", "nasty", "needy", "nervous", "next",
        "noisy", "normal", "nosy", "nutty", "odd", "pale", "past", "polite", "proud", "quiet", "rainy", "rare", "real", "roomy", "rough", "rude", "salty", "scary", "shaky", "shiny",
        "sickly", "silly", "skinny", "small", "smart", "spicy", "stale", "steep", "super", "tasty", "thick", "tight", "tired", "tough", "vast", "wealthy", "weary", "weird", "white",
        "wicked", "windy",
    ],
    3 => [
        "afraid", "agile", "ahead", "alike", "aloof", "ample", "ancient", "awake", "aware", "awful", "awesome", "bashful", "beautiful", "bitter", "bouncy", "brainy", "breezy", "brief",
        "bright", "burly", "cheap", "careful", "careless", "cautious", "cheerful", "chilly", "chubby", "chunky", "classy", "cloudy", "clumsy", "colorful", "creepy", "cuddly", "curious",
        "daily", "drab", "faithful", "famous", "faulty", "fearful", "fearless", "feeble", "female", "fierce", "filthy", "first", "frail", "foamy", "foolish", "forgetful", "friendly",
        "fuzzy", "gentle", "grateful", "gusty", "healthy", "helpful", "helpless", "husky", "icy", "jealous", "lively", "lonely", "lumpy", "massive", "modern", "murky", "naive", "nappy",
        "nasty", "naughty", "nervous", "numerous", "obedient", "obese", "pleasant", "polite", "powerful", "precious", "rapid", "rigid", "scary", "savory", "selfish", "shaky", "shallow",
        "shinier", "silky", "sincere", "smelly", "skinny", "spiky", "stale", "spotless", "straight", "strange", "sulky", "terrible", "thankful", "thirsty", "truthful", "untidy", "unusual",
        "vague", "valuable", "wary", "wasteful", "wealthy", "wicked", "wonderful", "weird", "youthful",
    ],
    4 => [
        "agile", "aloof", "anxious", "ashamed", "attractive", "awesome", "brainy", "brash", "brawny", "breezy", "cautious", "ceaseless", "cheerful", "chunky", "classy", "clumsy",
        "colorful", "comfortable", "confident", "courageous", "crabby", "crooked", "cuddly", "curious", "dangerous", "deafening", "delicious", "different", "distinct", "doubtful", "dreary",
        "elegant", "enormous", "envious", "excellent", "expensive", "faithful", "familiar", "faulty", "fearless", "feeble", "fierce", "filthy", "flaky", "flawless", "flimsy", "forgetful",
        "fragile", "friendly", "giddy", "gigantic", "glorious", "godly", "grateful", "gruesome", "hardworking", "heady", "healthy", "heavenly", "helpless", "homeless", "horrible",
        "hospitable", "ignorant", "imaginary", "immense", "impolite", "important", "impossible", "incredible", "innocent", "intelligent", "jovial", "kindhearted", "legal", "likeable",
        "majestic", "marvelous", "merciful", "modern", "motionless", "mushy", "mysterious", "nasty", "naughty", "necessary", "needless", "nervous", "nutritious", "obedient", "obese",
        "opposite", "ordinary", "peaceful", "periodic", "petite", "pleasant", "pointless", "powerful", "precious", "previous", "puffy", "puny", "pushy", "rabid", "raspy", "rightful",
        "ritzy", "romantic", "rural", "ruthless", "selfish", "shallow", "sincere", "skillful", "slimy", "slippery", "soggy", "spotless", "stale", "straight", "strange", "successful",
        "tacit", "tacky", "talented", "tangy", "terrible", "terrific", "testy", "thankful", "thinkable", "thoughtful", "thoughtless", "tiresome", "truthful", "untidy", "untiring", "unusual",
        "valuable", "wasteful", "well-groomed", "wiry", "wonderful", "worthless", "wry", "youthful",
    ],
    5 => [
        "abnormal", "absurd", "abundant", "acceptable", "accurate", "adorable", "adventurous", "agreeable", "ambitious", "anxious", "arrogant", "attractive", "automatic", "available",
        "bizarre", "blue-eyed", "boundless", "breakable", "comfortable", "confident", "conscious", "courageous", "dangerous", "dapper", "deafening", "decisive", "defective", "delicate",
        "delicious", "delightful", "difficult", "diligent", "distinct", "doubtful", "dramatic", "earthy", "elegant", "energetic", "enormous", "envious", "excellent", "exclusive", "expensive",
        "fabulous", "fantastic", "fortunate", "fragile", "frantic", "gaudy", "gigantic", "glamorous", "glorious", "gorgeous", "graceful", "grateful", "grotesque", "gullible", "habitual",
        "harmonious", "heavenly", "hesitant", "hilarious", "honorable", "horrible", "humorous", "immense", "imperfect", "impolite", "important", "impossible", "incredible", "industrious",
        "inexpensive", "innocent", "intelligent", "irate", "jittery", "laughable", "likeable", "magnificent", "marvelous", "melodic", "motionless", "mysterious", "neighborly", "noiseless",
        "nutritious", "observant", "outstanding", "overt", "panicky", "parallel", "pastoral", "pathetic", "peculiar", "periodic", "perpetual", "political", "probable", "prudent", "pungent",
        "quarrelsome", "remarkable", "respectable", "responsible", "righteous", "rightful", "robust", "romantic", "ruthless", "scrawny", "shrewd", "sincere", "skillful", "slippery",
        "spectacular", "splendid", "successful", "talented", "tangible", "tasteless", "temporary", "terrible", "terrific", "testy", "thoughtful", "thoughtless", "trite", "unsightly",
        "untiring", "uptight", "vigorous", "voiceless", "wide-eyed", "workable", "wrathful", "wretched",
    ],
    6 => [
        "abundant", "accidental", "accurate", "acrid", "adventurous", "aggressive", "agreeable", "ambiguous", "ambitious", "appreciative", "ardent", "arrogant", "beneficial", "bewildered",
        "bizarre", "changeable", "colossal", "combative", "cumbersome", "debonair", "decisive", "defiant", "delightful", "descriptive", "devilish", "difficult", "diligent", "disastrous",
        "discreet", "efficient", "elfin", "energetic", "enthusiastic", "exclusive", "expensive", "exquisite", "extravagant", "exuberant", "fabulous", "fanatical", "fantastic", "finicky",
        "fortunate", "frantic", "functional", "futuristic", "generic", "glamorous", "gorgeous", "grandiose", "grotesque", "gullible", "harmonious", "hesitant", "high-pitched", "hilarious",
        "historical", "humorous", "hypnotic", "hysterical", "impossible", "incompetent", "incredible", "industrious", "inexpensive", "innocent", "intelligent", "internal", "jittery",
        "knowledgeable", "magnificent", "melodic", "mountainous", "obnoxious", "obsolete", "obtainable", "old-fashioned", "outrageous", "outstanding", "overt", "panicky", "panoramic",
        "parallel", "peculiar", "productive", "profound", "protective", "profound", "prudent", "pungent", "rational", "receptive", "redundant", "remarkable", "repulsive", "respectable",
        "responsible", "scandalous", "scientific", "scrawny", "secretive", "selective", "shrewd", "simplistic", "snobbish", "sophisticated", "spectacular", "spiritual", "splendid", "spurious",
        "squeamish", "steadfast", "stupendous", "successful", "succinct", "superficial", "synonymous", "tangible", "tightfisted", "tranquil", "undesirable", "universal", "unsightly",
        "unsuitable", "unwieldy", "unwritten", "uptight", "valuable", "vengeful", "venomous", "victorious", "vigorous", "voiceless", "zealous",
    ],
    7 => [
        "acrid", "adamant", "aggressive", "ardent", "aromatic", "benevolent", "bewildered", "blithe", "buoyant", "captious", "chivalrous", "colossal", "combative", "conscientious",
        "contagious", "convenient", "copious", "corpulent", "cynical", "decisive", "defiant", "delinquent", "diligent", "dispensable", "eccentric", "ecological", "efficient", "eloquent",
        "enthusiastic", "extravagant", "exuberant", "fanatical", "ferocious", "fictitious", "flagrant", "flippant", "generic", "geological", "grammatical", "herbivorous", "horrendous",
        "illustrious", "imminent", "impartial", "impractical", "independent", "inquisitive", "insidious", "instinctive", "knowledgeable", "lamentable", "languid", "magnificent", "malicious",
        "maniacal", "mischievous", "obnoxious", "oratorical", "outrageous", "overt", "panoramic", "permissible", "plausible", "pertinent", "pervasive", "pragmatic", "prevalent", "profound",
        "profuse", "psychedelic", "psychotic", "quizzical", "reflective", "reminiscent", "replete", "repulsive", "resonant", "rhetorical", "rigorous", "spectacular", "spiteful", "subsequent",
        "substantial", "symptomatic", "taciturn", "tenacious", "turbulent", "translucent", "ubiquitous", "uninteresting", "unorthodox", "vehement", "victorious", "vivacious", "whimsical",
        "zealous",
    ],
    8 => [
        "aboriginal", "abortive", "adamant", "advantageous", "ambidextrous", "ambivalent", "analytical", "apathetic", "apprehensive", "aromatic", "autonomous", "biological", "blithe",
        "botanical", "chivalrous", "combative", "conscientious", "delirious", "deviant", "dispensable", "divergent", "eccentric", "efficient", "enthusiastic", "extravagant", "exuberant",
        "fallacious", "fanatical", "flagrant", "flippant", "humongous", "incompetent", "inconsistent", "indifferent", "indolent", "infectious", "inquisitive", "insidious", "instinctive",
        "insufficient", "invincible", "irreverent", "judicious", "lamentable", "languid", "lethargic", "libelous", "lopsided", "ludicrous", "luxuriant", "maniacal", "momentous", "monogamous",
        "nostalgic", "obnoxious", "penitent", "pervasive", "petulant", "piquant", "pragmatic", "prevalent", "quizzical", "reminiscent", "replete", "repetitious", "repulsive", "resolute",
        "resonant", "recurrent", "resurgent", "sarcastic", "seditious", "simultaneous", "spiteful", "spontaneous", "statuesque", "substantial", "taciturn", "tenacious", "transient",
        "virulent", "universal", "unorthodox", "vehement", "volatile", "voluminous", "vivacious", "whimsical",
    ],
    9 => [
        "aberrant", "abhorrent", "aboriginal", "acerbic", "adamant", "ambidextrous", "amphibious", "analogous", "antagonistic", "apathetic", "apprehensive", "assiduous", "astronomical",
        "auspicious", "axiomatic", "barbarous", "belligerent", "calamitous", "cantankerous", "capricious", "chivalrous", "choleric", "chronological", "circuitous", "circumspect",
        "coherent", "congruent", "conscientious", "convergent", "conspicuous", "cosmological", "cylindrical", "decorous", "delectable", "delirious", "disingenuous", "divergent", "draconian",
        "dysfunctional", "effervescent", "efficacious", "egotistical", "elliptical", "ethereal", "exultant", "expeditious", "fallacious", "farcical", "fastidious", "fluorescent", "gregarious",
        "guttural", "homogeneous", "impertinent", "inadvertent", "incredulous", "instantaneous", "intravenous", "indefatigable", "invincible", "irascible", "judicious", "lackadaisical",
        "lamentable", "languorous", "lethargic", "liturgical", "lopsided", "ludicrous", "luxuriant", "maleficent", "malevolent", "meticulous", "miscreant", "momentous", "nebulous",
        "nonchalant", "nondescript", "nostalgic", "obnoxious", "obsequious", "obstinate", "omnipresent", "omniscient", "penitent", "pervasive", "petulant", "philosophical", "piquant",
        "precarious", "precocious", "prevalent", "quixotic", "rambunctious", "reminiscent", "resilient", "sagacious", "sarcastic", "scrupulous", "sociological", "statuesque", "symmetrical",
        "tenacious", "therapeutic", "truculent", "ubiquitous", "unorthodox", "voracious",
    ],
    10 => [
        "aberrant", "abhorrent", "acerbic", "acquiescent", "acrimonious", "allegorical", "alphanumerical", "ambrosial", "amorphous", "antagonistic", "archaeological", "assiduous",
        "asymmetrical", "asynchronous", "auspicious", "avaricious", "axiomatic", "belligerent", "biomechanical", "cantankerous", "capricious", "chivalrous", "choleric", "circumspect",
        "concurrent", "contemporaneous", "delectable", "deleterious", "didactic", "dissentious", "draconian", "duplicitous", "dysfunctional", "effervescent", "efficacious", "ethereal",
        "evanescent", "exultant", "extemporaneous", "extraneous", "facetious", "fastidious", "felicitous", "fortuitous", "garrulous", "gelatinous", "ignominious", "impervious",
        "incandescent", "incoherent", "indefatigable", "intermittent", "iridescent", "irascible", "lackadaisical", "lamentable", "languorous", "lethargic", "loquacious", "luminescent",
        "meticulous", "miscreant", "nebulous", "neurological", "nonchalant", "nondescript", "obeisant", "obsequious", "obstinate", "omnipresent", "omniscient", "ossified", "parsimonious",
        "pertinacious", "physiological", "picayune", "precipitous", "punctilious", "querulous", "quiescent", "quixotic", "rambunctious", "rapacious", "recondite", "redolent", "resplendent",
        "sacrilegious", "sagacious", "sanctimonious", "scrumptious", "subservient", "surreptitious", "therapeutic", "truculent", "ubiquitous", "unorthodox", "voluptuous", "voracious",
    ],
];

$verbsByTier = [
    0 => [
        "add", "ask", "come", "beg", "chew", "do", "earn", "eat", "get", "give", "go", "grow", "hang", "heal", "hear", "join", "jog", "know", "let", "learn",
        "live", "lose", "obey", "owe", "pour", "pray", "read", "see", "sell", "send", "sew", "sing", "tell",
    ],
    1 => [
        "acted", "add", "admit", "agree", "allow", "allow", "ask", "be", "come", "beg", "bury", "bathe", "begin", "bless", "bring", "carry", "chew", "choose", "come", "do",
        "earn", "eat", "enjoy", "enter", "flee", "greet", "get", "give", "go", "grow", "hang", "heal", "hear", "join", "know", "lend", "let", "learn", "listen", "live",
        "lose", "obey", "owe", "pour", "pray", "quit", "read", "relax", "serve", "see", "seek", "sell", "send", "sew", "sing", "solve", "speak", "scold", "teach",
        "tell", "thank", "think", "warn", "write",
    ],
    2 => [
        "acted", "add", "admit", "agree", "allow", "argue", "arrange", "ask", "avoid", "bathe", "become", "beg", "begin", "behave", "bless", "bring", "bury", "carry", "chew",
        "choose", "create", "dancing", "do", "earn", "enjoy", "enter", "fasten", "flee", "follow", "forget", "forgive", "gather", "go", "greet", "grow", "hang", "happen", "heal",
        "hear", "ignore", "imagine", "include", "join", "jumped", "kissed", "know", "learn", "lend", "let", "listen", "lived", "lose", "obey", "owe", "pour", "pray", "quit", "raining",
        "relax", "remain", "remind", "remove", "replace", "running", "saved", "scold", "see", "seek", "sell", "send", "settle", "sew", "shared", "shouted", "sing", "smiled", "solve",
        "speak", "suffer", "teach", "tease", "tell", "thank", "think", "warn", "wasting", "watching", "write",
    ],
    3 => [
        "accept", "ached", "admire", "adopt", "afford", "amuse", "annoy", "appear", "apply", "arise", "arrange", "arrive", "attach", "attend", "become", "behave", "belong",
        "borrow", "breathe", "bury", "choose", "collect", "compare", "compete", "complain", "compose", "compute", "confess", "confuse", "connect", "continue", "create",
        "decide", "deliver", "describe", "deserve", "destroy", "elect", "excite", "exist", "explain", "frighten", "ignore", "inject", "inspect", "inspire", "invent",
        "laughed", "locate", "manage", "meddle", "memorize", "mourn", "multiply", "observe", "obtain", "offend", "operate", "perform", "possess", "prepare", "pretend",
        "prevent", "protect", "provide", "punish", "receive", "reduce", "rejoice", "remember", "rescued", "subtract", "understand", "unite", "unlock", "unpack", "watching",
    ],
    4 => [
        "abide", "achieve", "acquire", "adapt", "adopt", "afford", "align", "alter", "amuse", "analyze", "announce", "annoy", "appear", "appoint", "approve", "arrange", "arrive",
        "attend", "become", "behave", "belong", "borrow", "breathe", "clarify", "classify", "collect", "compare", "compete", "compile", "complain", "compose", "compute", "conclude",
        "confess", "confront", "confuse", "connect", "continue", "create", "deceive", "decide", "decorate", "defer", "define", "deliver", "describe", "deserve", "destroy", "detect",
        "determine", "develop", "diagnose", "disagree", "disappear", "educate", "elect", "embarrass", "employ", "encourage", "endure", "entertain", "enumerate", "examine", "exceed",
        "expand", "expect", "explain", "explode", "extend", "finalize", "forbid", "foresee", "foretell", "frighten", "govern", "hover", "identify", "ignore", "illustrate", "impair",
        "impress", "inject", "inspect", "inspire", "install", "instruct", "insure", "invent", "maintain", "manage", "meddle", "memorize", "merge", "mislead", "modify", "mourn", "multiply",
        "nominate", "observe", "obtain", "offend", "operate", "organize", "overcome", "overhear", "perform", "possess", "predict", "prefer", "prepare", "pretend", "prevent", "promote",
        "propose", "protect", "provide", "punish", "qualify", "realize", "relate", "remember", "respond", "restore", "satisfy", "subtract", "succeed", "suggest", "suppose", "suspend",
        "terrify", "undergo", "understand", "undertake", "unite", "vanish", "wander", "withdraw",
    ],
    5 => [
        "achieve", "acquire", "activate", "administer", "advertise", "alter", "amend", "analyze", "announce", "anticipate", "appoint", "appraise", "approve", "arrange", "assemble",
        "authorize", "avert", "calculate", "clarify", "classify", "compile", "conceive", "conclude", "confront", "conserve", "consider", "construct", "contract", "contribute",
        "convince", "cooperate", "correspond", "criticize", "cultivate", "deceive", "decorate", "dedicate", "defer", "define", "detect", "determine", "develop", "diagnose", "disagree",
        "disappear", "discover", "distribute", "educate", "eliminate", "embarrass", "employ", "encourage", "endure", "enforce", "enhance", "enlist", "ensure", "entertain", "enumerate",
        "establish", "examine", "exceed", "expand", "expect", "explode", "extend", "finalize", "forbid", "forego", "foresee", "foretell", "generate", "govern", "hover", "identify",
        "illustrate", "impair", "impress", "initiate", "inject", "inspect", "inspire", "install", "instruct", "insure", "interpret", "introduce", "invest", "maintain", "manage", "meddle",
        "memorize", "minimize", "mislead", "modify", "motivate", "mourn", "multiply", "navigate", "negotiate", "nominate", "observe", "organize", "originate", "overcome", "perceive",
        "persuade", "predict", "prefer", "prescribe", "promote", "propose", "purify", "qualify", "quantify", "recognize", "recommend", "recreate", "regulate", "represent", "restore",
        "restrict", "retrieve", "satisfy", "simplify", "straighten", "strengthen", "subtract", "succeed", "summarize", "supervise", "suppose", "suspend", "symbolize", "tabulate", "terrify",
        "translate", "transmit", "undergo", "understand", "undertake", "utilize", "vanish", "verify", "wander", "withdraw",
    ],
    6 => [
        "accomplish", "accumulate", "activate", "administer", "advertise", "allocate", "anticipate", "appraise", "assemble", "authorize", "automate", "calculate", "categorize",
        "commence", "conceive", "conclude", "condense", "conserve", "consider", "construct", "contract", "contribute", "convince", "cooperate", "coordinate", "correlate", "correspond",
        "criticize", "cultivate", "customize", "dedicate", "discharge", "disclose", "discover", "distribute", "elevate", "eliminate", "emphasize", "enforce", "enhance", "enlighten",
        "enlist", "ensure", "establish", "evaluate", "expedite", "fabricate", "generate", "impersonate", "improvise", "initiate", "innovate", "integrate", "interact", "interpret",
        "intervene", "introduce", "invest", "irritate", "maximize", "minimize", "mobilize", "modernize", "moisturize", "motivate", "navigate", "negotiate", "officiate", "originate",
        "perceive", "personalize", "persuade", "possess", "predict", "prescribe", "prioritize", "publicize", "purify", "quantify", "radiate", "recognize", "recommend", "reconcile",
        "recreate", "regulate", "reinforce", "remember", "reorganize", "represent", "restrict", "retrieve", "scrutinize", "simplify", "simulate", "socialize", "specialize", "stimulate",
        "straighten", "strategize", "streamline", "strengthen", "summarize", "supervise", "suspend", "symbolize", "tabulate", "terminate", "theorize", "transcribe", "translate",
        "transmit", "utilize", "vandalize", "visualize", "vitalize",
    ],
    7 => [
        "accommodate", "accomplish", "accumulate", "agitate", "alienate", "allocate", "arbitrate", "ascertain", "automate", "captivate", "categorize", "collaborate", "collate", "commence",
        "communicate", "conceptualize", "confiscate", "coordinate", "correlate", "customize", "demonstrate", "differentiate", "discharge", "disclose", "discriminate", "disseminate",
        "distinguish", "diversify", "elongate", "emanate", "emphasize", "emulate", "exaggerate", "enlighten", "evaluate", "expedite", "extrapolate", "fabricate", "facilitate", "familiarize",
        "fluctuate", "formulate", "improvise", "incorporate", "individualize", "initialize", "innovate", "integrate", "interact", "intervene", "investigate", "irrigate", "levitate",
        "liquidate", "litigate", "localize", "lubricate", "manipulate", "maximize", "mobilize", "modernize", "mutilate", "officiate", "operate", "participate", "pelletize", "prioritize",
        "propagate", "publicize", "radiate", "reconcile", "reinforce", "reorganize", "revitalize", "scrutinize", "segregate", "simulate", "specialize", "standardize", "sterilize", "stimulate",
        "strategize", "streamline", "terminate", "theorize", "transcribe", "troubleshoot", "ventilate", "visualize", "vitalize",
    ],
    8 => [
        "abbreviate", "accommodate", "aggravate", "alleviate", "amputate", "annihilate", "annotate", "anticipate", "arbitrate", "ascertain", "brutalize", "calibrate", "capitalize",
        "categorize", "characterize", "collaborate", "commemorate", "commercialize", "communicate", "conceptualize", "conflate", "consolidate", "contaminate", "contemplate", "decapitate",
        "dehydrate", "demonstrate", "depreciate", "deteriorate", "discriminate", "disseminate", "dissipate", "distinguish", "diversify", "eradicate", "extrapolate", "facilitate",
        "familiarize", "formalize", "formulate", "galvanize", "granulate", "herniate", "hypnotize", "incorporate", "individualize", "inoculate", "instigate", "litigate", "liquidate",
        "localize", "marginalize", "mechanize", "methodize", "miniaturize", "naturalize", "necessitate", "neutralize", "participate", "pasteurize", "rehabilitate", "rationalize",
        "reorganize", "revitalize", "standardize", "substantiate", "synthesize", "systematize", "troubleshoot", "westernize",
    ],
    9 => [
        "abbreviate", "annihilate", "annualize", "anticipate", "burglarize", "cannibalize", "capitulate", "castigate", "cauterize", "centralize", "coagulate", "collaborate",
        "commemorate", "commercialize", "conceptualize", "congregate", "conjugate", "consolidate", "demodulate", "demonetize", "deoxygenate", "desalinate", "excommunicate", "exterminate",
        "hybridize", "instantiate", "internalize", "intoxicate", "intimidate", "invalidate", "irradiate", "jeopardize", "lacerate", "legislate", "legitimize", "linearize",
        "macerate", "machinate", "masticate", "matriculate", "mechanize", "methodize", "oscillate", "paginate", "palpitate", "pasteurize", "perforate", "perpetrate", "politicize",
        "proliferate", "promulgate", "rationalize", "rehabilitate", "renegotiate", "repudiate", "substantiate", "synthesize", "systematize", "titillate",
    ],
    10 => [
        "abdicate", "accentuate", "accessorize", "acclimatize", "adjudicate", "aggrandize", "alliterate", "altercate", "ameliorate", "annunciate", "antagonize", "anthologize",
        "approbate", "arbitrate", "assimilate", "attenuate", "authenticate", "bifurcate", "bureaucratize", "chlorinate", "circumnavigate", "compartmentalize", "concatenate",
        "contextualize", "conveyorize", "corroborate", "decriminalize", "desensitize", "dichotomize", "disambiguate", "dissociate", "elucidate", "emaciate", "emancipate", "encapsulate",
        "epitomize", "extrapolate", "eviscerate", "exacerbate", "exfoliate", "exhilarate", "fibrillate", "gesticulate", "hydrogenate", "hyperbolize", "incarcerate", "incentivize",
        "indoctrinate", "institutionalize", "interpellate", "linearize", "lobotomize", "metabolize", "metastasize", "obfuscate", "politicize", "polymerize", "professionalize",
        "revolutionize", "romanticize", "spiritualize", "tranquilize", "trivialize", "vacillate",
    ],
];

// ---- Helpers ---------------------------------------------------------------
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function nouns_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $tier      = resolve_nouns_tier($lvl, $grd);
    $nounPool  = $nounsByTier[$tier];
    $adjPool   = $adjectivesByTier[$tier];
    $verbPool  = $verbsByTier[$tier];

    // No-repeat selection (reset only this tier's keys on exhaustion)
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($nounPool as $i => $n) {
        if (!in_array("t$tier:$i", $used, true)) $available[$i] = $n;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        $available = $nounPool;
    }
    $idx = array_rand($available);
    $ans = $available[$idx];
    $used[] = "t$tier:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    // Build 3 distinct distractors: mix of adjectives and verbs (50/50)
    $wrong = [];
    $safety = 0;
    while (count($wrong) < 3 && $safety++ < 500) {
        $d = (rand(1, 2) === 1)
            ? $adjPool[array_rand($adjPool)]
            : $verbPool[array_rand($verbPool)];
        if ($d === $ans) continue;
        if (in_array($d, $wrong, true)) continue;
        $wrong[] = $d;
    }
    // Fallback (defensive): fill from noun pool
    $safety = 0;
    while (count($wrong) < 3 && $safety++ < 500) {
        $d = $nounPool[array_rand($nounPool)];
        if ($d === $ans) continue;
        if (in_array($d, $wrong, true)) continue;
        $wrong[] = $d;
    }

    $choices = array_merge($wrong, [$ans]);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question' => 'Click on the noun among the following words.',
        'correct'  => $ans,
        'choices'  => $choices,
        'lvl'      => $lvl,
        'grd'      => $grd,
        'tier'     => $tier,
    ];
}

// ---- Render ----------------------------------------------------------------
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
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php
    $c = $cur['choices'];
    $ansH = htmlspecialchars($cur['correct']);
    $fbHtml = "The word <strong style=\"color:#CC0066;\">'" . $ansH . "'</strong> is the noun among the words '"
            . htmlspecialchars($c[0]) . "', '"
            . htmlspecialchars($c[1]) . "', '"
            . htmlspecialchars($c[2]) . "', and '"
            . htmlspecialchars($c[3]) . "'.";
    // Last-two-words orphan guard applied to the trailing plain-text tokens.
    $fbHtml = preg_replace_callback('/\s+(\S+(?:\s+\S+){1})$/u', function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $fbHtml, 1);
    nouns_box('<div style="width:100%;font-size:15pt;color:#333;line-height:1.55;text-wrap:balance;">' . $fbHtml . '</div>');
  ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;text-wrap:balance;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else: $q = $_SESSION[$sessionKey]['current'];
    $qText = htmlspecialchars($q['question']);
    $qText = preg_replace_callback('/\s+(\S+(?:\s+\S+){1})$/u', function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $qText, 1);
    // Highlight the target part-of-speech word in pink.
    $qHtml = str_replace('noun', '<strong style="color:#CC0066;">noun</strong>', $qText);
?>
  <?php nouns_box('<div style="width:100%;font-size:17pt;font-weight:700;color:#800080;line-height:1.55;text-wrap:balance;">' . $qHtml . '</div>', 130); ?>
  <div style="font-family:Arial,sans-serif;font-size:14pt;font-weight:500;color:#777777;margin-bottom:16px;">Click on your answer.</div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;min-width:180px;min-height:64px;max-width:260px;padding:12px 20px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;text-align:center;word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>
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