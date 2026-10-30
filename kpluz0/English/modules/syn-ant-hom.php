<?php
// english/modules/syn-ant-hom.php
// STATIC synonyms / antonyms / homonyms bank + 3-choice. Bypass QEngine per §3.
// Prompt: shows two words; user classifies as synonyms, antonyms, or homonyms.
//
// Question-type weighting (preserved from legacy): 50% syn, 40% ant, 10% hom
//   (legacy: $opt0 = rand(1,11); &#8804;5&#8594;syn, 6-10&#8594;ant, 11&#8594;hom).
//
// Levels (§5 — 2-level scheme, Medium+Hard merged):
//   Grade-keyed tier assignment (bank has 7 tiers):
//     grd 0-1 &#8594; Easy: 1; Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 2-3 &#8594; Easy: 2; Hard: rand(3,4)   [Medium=3, Hard=4]
//     grd 4-5 &#8594; Easy: 3; Hard: rand(4,5)   [Medium=4, Hard=5]
//     grd 6-7 &#8594; Easy: 4; Hard: rand(5,6)   [Medium=5, Hard=6]
//     grd 8+  &#8594; Easy: 5; Hard: rand(6,7)   [Medium=6, Hard=7]
//
// Bank structure: $bank[tier]['syn'] = flat list of synonym groups where
//   even-index &#8596; odd-index form antonym pairs (e.g. [0] pretty-grp, [1] ugly-grp).
//   For synonyms Q: pick two words from same group (need &#8805;2 words in group).
//   For antonyms Q: pick one word from even group, one from next odd group.
//   $bank[tier]['hom'] = flat list of "w1-w2" homonym pair strings.
//
// Data-fix flagged (§13.3/§29): legacy $homonympairs[4] contained
//   "creak-pitched sound when being moved'-creek" — hyphen inside the description
//   breaks the split-on-'-' parser. Interpreted as intended pair "creak-creek".
//   Also enriched legacy single-word groups ['slow'] and ['true'] to ['slow','gradual']
//   and ['true','correct'] — legacy while-loop would have infinite-looped on synonym Q.
//
// Choice layout (§14): 3 fixed short labels &#8594; single row, uniform 9em.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
// Theme: ex-*-007 (136/556/117) &#8594; not in §8 fit list &#8594; paper-69-*.
// Score box: score-*-3 (English default, matching synonyms.php sample).
// DB row required: modules.url = 'syn-ant-hom.php'

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

$moduleTitle = 'Synonyms, Antonyms, Homonyms';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 5)));

// ============================================================
// BANK — tier &#8594; { 'syn' => [groups...], 'hom' => [pairs...] }
// ============================================================
$bank = [];

$bank[1] = [
    'syn' => [
        ['pretty', 'lovely'],
        ['ugly', 'bad-looking'],
        ['bright', 'clever', 'smart', 'wise'],
        ['foolish', 'silly', 'dumb'],
        ['big', 'large', 'huge'],
        ['small', 'tiny', 'little'],
        ['happy', 'joyful', 'glad'],
        ['sad', 'unhappy', 'lonely'],
        ['rich', 'wealthy', 'well-off'],
        ['poor', 'moneyless', 'needy'],
        ['fast', 'quick', 'speedy'],
        ['slow', 'gradual'],
        ['honest', 'truthful'],
        ['dishonest', 'lying'],
        ['old', 'aged'],
        ['young', 'new'],
        ['true', 'correct'],
        ['false', 'untrue'],
    ],
    'hom' => [
        "ant-aunt", "bald-bold", "bare-bear", "be-bee", "beat-beet",
        "berry-bury", "blew-blue", "boar-bore", "buy-by", "cent-sent",
        "dear-deer", "eye-I", "fit-feet", "flea-flee", "flew-flu",
        "heal-heel", "hi-high", "knew-new", "marry-merry", "sea-see",
        "toe-tow", "two-too", "we-wee", "weak-week",
    ],
];

$bank[2] = [
    'syn' => [
        ['pretty', 'lovely', 'beautiful', 'good-looking'],
        ['ugly', 'hideous', 'gruesome', 'bad-looking'],
        ['brainy', 'bright', 'clever', 'smart', 'wise'],
        ['stupid', 'foolish', 'dumb', 'silly', 'unwise'],
        ['big', 'large', 'huge', 'jumbo', 'giant'],
        ['small', 'tiny', 'little', 'mini'],
        ['happy', 'joyful', 'glad', 'jolly', 'merry'],
        ['sad', 'unhappy', 'gloomy', 'lonely', 'glum'],
        ['rich', 'wealthy', 'moneyed', 'well-off'],
        ['poor', 'moneyless', 'needy', 'penniless'],
        ['fast', 'speedy', 'quick', 'swift', 'rapid'],
        ['slow', 'snail-like'],
        ['honest', 'truthful', 'frank'],
        ['dishonest', 'fake', 'untruthful'],
        ['old', 'aged', 'elderly'],
        ['young', 'new', 'youthful'],
    ],
    'hom' => [
        "acts-ax", "aid-aide", "air-heir", "aisle-isle", "ant-aunt",
        "arc-ark", "ate-eight", "bald-bawled", "band-banned", "bare-bear",
        "be-bee", "beach-beech", "beat-beet", "berry-bury", "berth-birth",
        "blew-blue", "boar-bore", "bough-bow", "brake-break", "bread-bred",
        "buoy-boy", "brows-browse", "buy-by", "cent-scent", "dear-deer",
        "dew-do", "eye-I", "hair-hare", "hour-our", "site-sight",
        "days-daze", "die-dye", "doe-dough", "fair-fare", "feat-feet",
        "hay-hey", "fir-fear", "halve-have", "know-no", "made-maid",
        "mail-male", "none-nun", "pain-pane", "peak-peek", "rain-rein",
        "right-write", "tail-tale", "waist-waste", "wait-weight",
    ],
];

$bank[3] = [
    'syn' => [
        ['beautiful', 'lovely', 'good-looking', 'attractive'],
        ['gruesome', 'hideous', 'beastly', 'ghastly', 'grisly', 'horrid'],
        ['brainy', 'canny', 'brilliant', 'intelligent', 'genius', 'sharp'],
        ['stupid', 'brainless', 'witless', 'unwise'],
        ['hefty', 'bulky', 'mammoth', 'oversized'],
        ['minute', 'tiny', 'mini', 'undersized'],
        ['joyful', 'cheerful', 'delighted', 'merry'],
        ['gloomy', 'glum', 'somber', 'sullen'],
        ['wealthy', 'moneyed', 'well-off', 'well-to-do'],
        ['moneyless', 'needy', 'penniless', 'bankrupt'],
        ['speedy', 'brisk', 'hasty', 'hurried', 'rapid', 'swift'],
        ['sluggish', 'slow-moving', 'snail-like'],
        ['frank', 'genuine', 'sincere', 'trustworthy'],
        ['dishonest', 'insincere', 'untruthful'],
        ['mature', 'elderly', 'ancient'],
        ['youthful', 'juvenile'],
    ],
    'hom' => [
        "accept-except", "affect-effect", "aisle-isle", "allowed-aloud", "ant-aunt",
        "arc-ark", "bald-bawled", "band-banned", "base-bass", "beach-beech",
        "berth-birth", "bite-byte", "bore-boar", "brake-break", "cell-sell",
        "cereal-serial", "chili-chilly", "cite-site", "chord-cord", "crews-cruise",
        "doe-dough", "feat-feet", "fairy-ferry", "groan-grown", "meat-meet",
        "rose-rows", "sail-sale", "steal-still", "your-you're",
    ],
];

$bank[4] = [
    'syn' => [
        ['attractive', 'gorgeous', 'stunning', 'dazzling', 'angelic'],
        ['beastly', 'gruesome', 'ghastly', 'horrid', 'monstrous', 'frightful'],
        ['intelligent', 'knowledgeable', 'well-informed', 'astute', 'shrewd'],
        ['brainless', 'gullible', 'feeble-minded', 'idiotic', 'dim-witted', 'ignorant'],
        ['enormous', 'gigantic', 'immense', 'tremendous'],
        ['minute', 'dwarfish', 'midget'],
        ['jocund', 'gleeful', 'joyous', 'mirthful', 'blithe'],
        ['low-spirited', 'downcast', 'sorrowful', 'cheerless', 'morose', 'mournful', 'doleful'],
        ['affluent', 'prosperous', 'moneyed', 'well-heeled', 'well-to-do'],
        ['beggarly', 'bankrupt', 'moneyless', 'penniless', 'poverty-stricken'],
        ['brisk', 'agile', 'fleet-footed'],
        ['sluggish', 'unhurried', 'leisurely'],
        ['sincere', 'trustworthy', 'credible'],
        ['insincere', 'deceitful', 'hypocritical'],
        ['ancient', 'seasoned', 'veteran'],
        ['fledgling', 'juvenile', 'immature'],
    ],
    'hom' => [
        "accept-except", "affect-effect", "aisle-isle", "arc-ark", "bald-bold",
        "bold-bawled", "beach-beech", "berth-birth", "broach-brooch", "cell-sell",
        "chili-chilly", "chord-cord", "creak-creek", "dual-duel", "forth-fourth",
        "hoarse-horse", "knead-need", "slight-sleight", "weather-whether",
    ],
];

$bank[5] = [
    'syn' => [
        ['gorgeous', 'alluring', 'appealing', 'beauteous', 'bewitching'],
        ['appalling', 'disfigured', 'grotesque', 'loathsome', 'misshapen'],
        ['astute', 'comprehending', 'knowledgeable', 'quick-witted', 'shrewd'],
        ['gullible', 'idiotic', 'moronic', 'simple-minded', 'thick-headed', 'ignorant'],
        ['enormous', 'gigantic', 'immense', 'tremendous', 'gargantuan'],
        ['miniature', 'minuscule', 'undersized'],
        ['ecstatic', 'elated', 'exultant', 'jubilant', 'overjoyed'],
        ['depressed', 'bereaved', 'despairing', 'distressed', 'grief-stricken', 'low-spirited', 'heavy-hearted', 'forlorn', 'miserable'],
        ['affluent', 'opulent', 'prosperous', 'well-heeled'],
        ['impoverished', 'pauperized', 'indigent', 'cash-strapped'],
        ['breakneck', 'high-speed', 'expeditive'],
        ['gradual', 'sluggish', 'dilatory', 'lethargic'],
        ['above-board', 'ethical', 'reputable', 'scrupulous'],
        ['unprincipled', 'dishonorable', 'underhanded', 'immoral'],
        ['antiquated', 'archaic', 'outmoded', 'obsolete'],
        ['up-to-date', 'contemporary', 'modern'],
    ],
    'hom' => [
        "accept-except", "affect-effect", "conk-conch", "whether-wether", "chord-cord",
        "cite-sight", "cession-session", "council-counsel", "gilt-guilt", "overdo-overdue",
        "peace-piece", "sachet-sashay", "surf-serf", "shear-sheer", "slight-sleight",
        "spade-spayed", "tighten-titan",
    ],
];

$bank[6] = [
    'syn' => [
        ['alluring', 'beauteous', 'bewitching', 'exquisite', 'ravishing'],
        ['abominable', 'grotesque', 'loathsome', 'repugnant', 'repulsive', 'revolting'],
        ['brilliant', 'comprehending', 'enlightened', 'ingenious', 'perceptive'],
        ['imbecilic', 'inane', 'moronic', 'nonsensical', 'fatuous'],
        ['colossal', 'behemothic', 'gargantuan', 'humongous'],
        ['diminutive', 'miniature', 'minuscule'],
        ['ecstatic', 'elated', 'exultant', 'exhilarated', 'jubilant'],
        ['depressed', 'bereaved', 'dejected', 'despairing', 'despondent', 'disconsolate', 'distressed', 'melancholy'],
        ['affluent', 'opulent', 'pecunious'],
        ['destitute', 'indigent', 'impoverished', 'necessitous'],
        ['breakneck', 'expeditious', 'posthaste'],
        ['dilatory', 'torpid', 'languid', 'lethargic'],
        ['reputable', 'scrupulous', 'undisguised', 'veracious'],
        ['devious', 'deceptive', 'duplicitous'],
        ['antiquated', 'archaic', 'obsolescent'],
        ['contemporary', 'cutting-edge', 'state-of-the-art'],
    ],
    'hom' => [
        "allusion-illusion", "capital-capitol", "coddling-codling", "colonel-kernel",
        "cosine-cosign", "council-counsel", "elicit-illicit", "emigrate-immigrate", "gorilla-guerrilla",
        "principal-principle", "sachet-sashay", "shears-sheers", "sheave-shiv", "stationary-stationery",
        "toxins-tocsins", "weather-wether",
    ],
];

$bank[7] = [
    'syn' => [
        ['alluring', 'entrancing', 'beauteous', 'bewitching', 'exquisite', 'ravishing'],
        ['abominable', 'repugnant', 'repulsive', 'abhorrent'],
        ['sagacious', 'erudite', 'ingenious', 'perceptive', 'perspicacious'],
        ['imbecilic', 'inane', 'asinine', 'fatuous'],
        ['behemothic', 'capacious', 'colossal', 'commodious', 'prodigious', 'humongous'],
        ['diminutive', 'picayune', 'minuscule', 'infinitesimal'],
        ['exuberant', 'exultant', 'euphoric', 'enraptured', 'exhilarated'],
        ['dejected', 'despondent', 'disconsolate', 'lugubrious', 'melancholic'],
        ['affluent', 'opulent', 'pecunious', 'propertied'],
        ['destitute', 'impecunious', 'necessitous', 'penurious'],
        ['accelerated', 'expeditious', 'velocious', 'alacritous'],
        ['languorous', 'lethargic', 'lackadaisical'],
        ['unassailable', 'indisputable', 'indubitable'],
        ['debatable', 'controvertible', 'ambiguous'],
        ['senescent', 'obsolescent'],
        ['neoteric', 'cutting-edge', 'state-of-the-art'],
    ],
    'hom' => [
        "allusion-illusion", "weather-wether", "capital-capitol", "coddling-codling", "colonel-kernel",
        "complacence-complaisance", "complacent-complaisant", "complement-compliment", "cosine-cosign",
        "council-counsel", "climactic-climatic", "elicit-illicit", "emigrate-immigrate", "gorilla-guerrilla",
        "principal-principle", "shears-sheers", "sheave-shiv", "stationary-stationery",
    ],
];

// ============================================================
// TIER SELECTION (2-level scheme)
// ============================================================
$grdKey = ($grd <= 1) ? 0 : (($grd <= 3) ? 1 : (($grd <= 5) ? 2 : (($grd <= 7) ? 3 : 4)));
$configs = [
    0 => ['Easy' => [1, 1], 'Hard' => [2, 3]],
    1 => ['Easy' => [2, 2], 'Hard' => [3, 4]],
    2 => ['Easy' => [3, 3], 'Hard' => [4, 5]],
    3 => ['Easy' => [4, 4], 'Hard' => [5, 6]],
    4 => ['Easy' => [5, 5], 'Hard' => [6, 7]],
];
$range  = $configs[$grdKey][$lvl];
$arrnum = rand($range[0], $range[1]);

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    if (!in_array($clicked, ['synonyms', 'antonyms', 'homonyms'], true)) {
        $clicked = '';
    }

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $synGroups = $bank[$arrnum]['syn'];
    $homPairs  = $bank[$arrnum]['hom'];

    $usedKey = 'used_' . $arrnum;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    $word1 = ''; $word2 = ''; $answer = ''; $qKey = '';
    $attempts = 0;
    do {
        $opt0 = rand(1, 11);
        if ($opt0 <= 5)      $opt = 1;  // synonyms
        elseif ($opt0 <= 10) $opt = 2;  // antonyms
        else                 $opt = 3;  // homonyms

        if ($opt === 1) {
            $candidates = [];
            foreach ($synGroups as $g => $words) {
                if (count($words) >= 2) $candidates[] = $g;
            }
            if (empty($candidates)) { $attempts++; continue; }
            $gIdx = $candidates[array_rand($candidates)];
            $words = $synGroups[$gIdx];
            $i1 = array_rand($words);
            $tries = 0;
            do { $i2 = array_rand($words); $tries++; } while ($i2 === $i1 && $tries < 20);
            $word1 = $words[$i1];
            $word2 = $words[$i2];
            $answer = 'synonyms';
            $lo = min($i1, $i2); $hi = max($i1, $i2);
            $qKey = "syn-{$arrnum}-{$gIdx}-{$lo}-{$hi}";
        } elseif ($opt === 2) {
            $pairCount = (int)floor(count($synGroups) / 2);
            if ($pairCount < 1) { $attempts++; continue; }
            $pIdx = rand(0, $pairCount - 1);
            $gA = $pIdx * 2;
            $gB = $gA + 1;
            $wordA = $synGroups[$gA][array_rand($synGroups[$gA])];
            $wordB = $synGroups[$gB][array_rand($synGroups[$gB])];
            $word1 = $wordA;
            $word2 = $wordB;
            $answer = 'antonyms';
            $qKey = "ant-{$arrnum}-{$pIdx}-{$wordA}-{$wordB}";
        } else {
            if (empty($homPairs)) { $attempts++; continue; }
            $pIdx = array_rand($homPairs);
            $pair = $homPairs[$pIdx];
            $pos1 = strpos($pair, '-');
            if ($pos1 === false) { $attempts++; continue; }
            $word1 = substr($pair, 0, $pos1);
            $word2 = substr($pair, $pos1 + 1);
            if (rand(1, 2) === 1) { $tmp = $word1; $word1 = $word2; $word2 = $tmp; }
            $answer = 'homonyms';
            $qKey = "hom-{$arrnum}-{$pIdx}";
        }
        $attempts++;
    } while (in_array($qKey, $used, true) && $attempts < 100);

    $used[] = $qKey;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $_SESSION[$sessionKey]['current'] = [
        'word1'  => $word1,
        'word2'  => $word2,
        'answer' => $answer,
        'lvl'    => $lvl,
        'arrnum' => $arrnum,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .sah-row {
    --choice-width: 9em;
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: stretch;
    gap: 18px;
    margin: 18px auto;
  }
  .sah-choice {
    width: var(--choice-width);
    max-width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 10px;
    padding: 10px 14px;
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .sah-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .sah-word-card {
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #CC0066;
    text-align: center;
    margin: 20px auto;
  }
  .sah-instruction {
    color: #0000BB;
    font-size: 1.4rem;
    font-weight: 700;
    line-height: 1.45;
    display: block;
  }
  .sah-click-prompt {
    color: #666;
    font-size: 1.2rem;
    font-weight: 500;
    display: block;
  }
  @media (max-width: 600px) {
    .sah-row { flex-wrap: wrap; gap: 10px; }
    .sah-row .sah-choice { width: 100%; }
    .sah-choice { font-size: 0.95rem; padding: 9px 12px; }
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
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['word1']); ?>'</strong>
        and
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['word2']); ?>'</strong>
        are
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="sah-word-card">
        <span class="sah-instruction">Are these words synonyms,<br>antonyms, or homonyms?</span>
        <br>
        <span style="font-size:1.6rem;">'<?php echo htmlspecialchars($q['word1']); ?>'</span>
        and
        <span style="font-size:1.6rem;">'<?php echo htmlspecialchars($q['word2']); ?>'</span>
        <br><br>
        <span class="sah-click-prompt">Click on your answer.</span>
    </div>

    <div class="sah-row">
        <?php foreach (['synonyms', 'antonyms', 'homonyms'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="sah-choice">
                <?php echo ucfirst(htmlspecialchars($c)); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">Select difficulty level for next question:</font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo $l; ?></b>
                    </font></font>
                </td>
            <?php endforeach; ?>
        </tr></table>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();