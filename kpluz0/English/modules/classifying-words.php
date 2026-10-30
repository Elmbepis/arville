<?php
// english/modules/classifying-words.php
// STATIC category bank + 4-choice. Bypass QEngine per §3.
// Single-level — §5 collapse (legacy hardcoded $_SESSION['level']="Easy").
//
// Question: show 3 words drawn from a category pool; user clicks which
// category (of 4) they belong to. E.g. "cow, deer, hyena" &#8594; "animals".
//
// Data format: "category[dist1+dist2]dist3" per question. 19 questions.
// Distractors are other categories — one from each of the 3 other slots.
// Word selection from category pool of &#8805; 5 (all pools qualified):
//   pick 3 distinct entries &#8594; display as "word1, word2, and word3".
//
// Data-fix flagged (§19): legacy word-picking loop used `for ($i==1; ...)`
//   (== not =) which ran 4 iterations and produced 4-word lists with broken
//   separators. Modern picks exactly 3 distinct words. All category pools
//   have &#8805; 5 entries, so 3-distinct is always satisfiable.
//
// Choice layout (§14): categories like "hand tools" span 10+ chars &#8594; 2×2 grid.
//
// $grd not used (single-level).
// Theme: ex-*-24 (75/655/70) &#8594; fits §8 &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'classifying-words.php'

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

$moduleTitle = 'Classifying Words into Categories';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level (§5)

// ============================================================
// BANK
// ============================================================
$chss = [
    "animals[plants+people]machines", "plants[animals+people]machines", "people[plants+animals]machines", "machines[plants+people]animals",
    "vehicles[furniture+hand tools]appliances", "hand tools[furniture+vehicles]appliances", "furniture[hand tools+vehicles]appliances", "appliances[hand tools+vehicles]furniture",
    "mammals[birds+reptiles]insects", "birds[mammals+reptiles]insects", "reptiles[birds+mammals]insects", "insects[birds+reptiles]mammals",
    "colors[shapes+materials]food", "shapes[colors+materials]food", "materials[colors+shapes]food", "food[colors+shapes]places",
    "places[vegetables+fruits]shapes", "vegetables[places+fruits]colors", "fruits[places+vegetables]shapes",
];

$categ = [];
$categ["animals"]    = ["butterfly", "cheetah", "cow", "crow", "deer", "eagle", "elephant", "giraffe", "hyena", "jaguar", "leopard", "lion", "lizard", "owl", "rat", "snake", "spider", "tiger", "whale", "worm", "zebra"];
$categ["plants"]     = ["acacia", "banana", "cactus", "corn", "daisy", "grass", "mango", "narra", "onion", "rose", "tomato", "water lily"];
$categ["people"]     = ["aunt", "baker", "coach", "cousin", "doctor", "friend", "godfather", "lawyer", "mayor", "nurse", "priest", "sister", "student", "teacher", "uncle"];
$categ["machines"]   = ["blender", "car", "crane", "chainsaw", "drill", "tractor"];
$categ["vehicles"]   = ["car", "boat", "bus", "jeep", "plane", "ship", "train", "truck", "van"];
$categ["furniture"]  = ["bed", "chair", "desk", "dining table", "sofa", "cabinet"];
$categ["appliances"] = ["blender", "flat iron", "gas range", "oven", "radio", "stove", "TV", "washing machine"];
$categ["hand tools"] = ["chisel", "file", "hammer", "mallet", "saw", "screw driver", "wrench"];
$categ["mammals"]    = ["bat", "cheetah", "cow", "deer", "elephant", "giraffe", "hyena", "jaguar", "leopard", "lion", "rat", "tiger", "whale", "zebra"];
$categ["birds"]      = ["crow", "dove", "eagle", "falcon", "finch", "hawk", "macaw", "owl", "ostrich", "penguin", "pigeon"];
$categ["insects"]    = ["ant", "bee", "beetle", "butterfly", "cricket", "dragonfly", "firefly", "grasshopper", "housefly", "mantis", "wasp"];
$categ["reptiles"]   = ["alligator", "chameleon", "crocodile", "gecko", "iguana", "lizard", "skink", "snake", "turtle", "tortoise"];
$categ["colors"]     = ["blue", "green", "orange", "pink", "purple", "red", "violet", "yellow"];
$categ["shapes"]     = ["circle", "oval", "rectangle", "square", "star", "triangle"];
$categ["materials"]  = ["cloth", "concrete", "plastic", "rubber", "steel", "wood"];
$categ["food"]       = ["beef", "bread", "cake", "chicken", "pie", "pork", "rice", "salad", "sandwich", "spaghetti"];
$categ["places"]     = ["bank", "church", "hospital", "mall", "market", "park", "school", "zoo"];
$categ["fruits"]     = ["apple", "banana", "duhat", "lemon", "orange", "peach", "pear", "starapple", "watermelon"];
$categ["vegetables"] = ["cabbage", "celery", "beans", "broccoli", "carrot", "eggplant", "lettuce", "okra", "pechay", "spinach"];

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $qCount = count($chss);

    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $safety = 0;
    do {
        $opt = rand(0, $qCount - 1);
        $safety++;
    } while (in_array($opt, $used, true) && $safety < 100);

    $used[] = $opt;
    if (count($used) > $qCount * 2) $used = array_slice($used, -$qCount);
    $_SESSION[$sessionKey]['used'] = $used;

    $chs  = $chss[$opt];
    $pos1 = strpos($chs, "[");
    $pos2 = strpos($chs, "+");
    $pos3 = strpos($chs, "]");

    $ans = substr($chs, 0, $pos1);
    $choices = [
        $ans,
        substr($chs, $pos1 + 1, $pos2 - $pos1 - 1),
        substr($chs, $pos2 + 1, $pos3 - $pos2 - 1),
        substr($chs, $pos3 + 1),
    ];
    shuffle($choices);

    // Pick 3 distinct words from the category pool
    $pool = $categ[$ans];
    $poolCount = count($pool);
    $pickedIdxs = [];
    $picksSafety = 0;
    while (count($pickedIdxs) < 3 && $picksSafety < 60) {
        $idx = rand(0, $poolCount - 1);
        if (!in_array($idx, $pickedIdxs, true)) $pickedIdxs[] = $idx;
        $picksSafety++;
    }
    $pickedWords = [];
    foreach ($pickedIdxs as $idx) $pickedWords[] = $pool[$idx];

    $_SESSION[$sessionKey]['current'] = [
        'answer'  => $ans,
        'words'   => $pickedWords,
        'choices' => $choices,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-3.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-3.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .clw-word-card {
    display: inline-block;
    background: #fefbde;
    border: 2px solid #9f2601;
    border-radius: 10px;
    padding: 18px 30px;
    margin: 20px auto;
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #222;
    text-align: center;
    max-width: 560px;
    line-height: 1.5;
  }
  .clw-grid-2x2 {
    --choice-width: 11em;
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
  }
  .clw-grid-1col {
    --choice-width: 16em;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .clw-choice {
    width: var(--choice-width);
    max-width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 10px;
    padding: 12px 16px;
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.3rem;
    font-weight: 700;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .clw-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .clw-instruction {
    display: block;
    color: #800080;
    font-size: 1.3rem;
    font-weight: 700;
    line-height: 1.5;
    margin: 18px auto 6px;
  }
  .clw-click-prompt {
    display: block;
    color: #666;
    font-size: 1.15rem;
    font-weight: 500;
    margin-bottom: 12px;
  }
  @media (max-width: 600px) {
    .clw-grid-2x2 { grid-template-columns: 1fr 1fr; gap: 10px 14px; }
    .clw-grid-2x2 .clw-choice { width: 100%; }
    .clw-choice { font-size: 0.95rem; padding: 10px 12px; }
    .clw-word-card { font-size: 1.15rem; padding: 14px 20px; }
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#800080; margin-top:20px; line-height:1.7;">
    The words
    <?php $w = $cur['words']; ?>
    <strong style="color:#CC0066;">'<?php echo htmlspecialchars($w[0]); ?>'</strong>,
    <strong style="color:#CC0066;">'<?php echo htmlspecialchars($w[1]); ?>'</strong>,&nbsp;and
    <strong style="color:#CC0066;">'<?php echo htmlspecialchars($w[2]); ?>'</strong>
    would be<br/>best classified under the category
    <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
</p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="clw-word-card">
        <?php echo htmlspecialchars(implode(', ', $q['words'])); ?>
    </div>

    <span class="clw-instruction">
        Click on the category under which the<br>words above would be best classified.
    </span>
    <span class="clw-click-prompt">Click on your answer.</span>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        if ($maxLen > 20)      $containerClass = 'clw-grid-1col';
        else                   $containerClass = 'clw-grid-2x2';
    ?>
    <div class="<?php echo $containerClass; ?>" style="--choice-width: <?php echo $choiceWidthEm; ?>em;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="clw-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();