<?php
// english/modules/synonyms.php
// STATIC synonym bank + choice. Bypass QEngine per §D.
// Shows a base word; click its synonym from 4 choices.
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Grade-keyed tier assignment (bank has 7 tiers):
//     grd 0-1 &#8594; Easy: 1; Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 2-3 &#8594; Easy: 2; Hard: rand(3,4)   [Medium=3, Hard=4]
//     grd 4-5 &#8594; Easy: 3; Hard: rand(4,5)   [Medium=4, Hard=5]
//     grd 6-7 &#8594; Easy: 4; Hard: rand(5,6)   [Medium=5, Hard=6]
//     grd 8+  &#8594; Easy: 5; Hard: rand(6,7)   [Medium=6, Hard=7]
//   Rationale: modern Hard takes the union of legacy Medium + legacy Hard;
//   per-grade range preserves both difficulty tiers as a random pick.
//
// Bank structure: $bank[tier][groupIdx] = [word1, word2, ...] — all entries
// in a group are synonyms of each other. Question = one entry; answer = a
// different entry from the same group. Distractors = 1 entry each from 3
// distinct other groups. Preserves legacy semantics.
//
// Choice layout (§14): uniform width via --choice-width CSS var.
//   maxLen &#8804; 4 &#8594; 1-row (4-across); 5–20 &#8594; 2×2; > 20 &#8594; 1-col.
//   Never 3+1 wrap.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Theme: ex-*-008 (136/556/117) &#8594; not in §8 fit list &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'synonyms.php'

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

$moduleTitle = 'Synonyms';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 5)));

$bank = [];
$bank[1] = [
    ["pretty", "lovely"],
    ["bright", "clever", "smart", "wise"],
    ["big", "large", "huge"],
    ["small", "tiny", "little"],
    ["happy", "joyful", "glad"],
    ["sad", "unhappy", "lonely"],
    ["foolish", "silly", "dumb"],
    ["fast", "speedy", "quick"],
    ["true", "correct", "right"],
    ["false", "fake", "untrue"],
    ["kind", "good", "loving", "caring"],
    ["rich", "wealthy", "well-off"],
    ["poor", "moneyless", "needy"],
    ["strong", "mighty", "sturdy", "tough"],
    ["ugly", "bad-looking"],
    ["weak", "feeble", "frail"],
    ["afraid", "scared"],
    ["shy", "bashful"],
];
$bank[2] = [
    ["pretty", "lovely", "beautiful", "good-looking"],
    ["brainy", "bright", "clever", "smart", "wise"],
    ["big", "large", "huge", "jumbo", "giant"],
    ["small", "tiny", "little", "mini"],
    ["happy", "joyful", "glad", "jolly", "merry"],
    ["sad", "unhappy", "gloomy", "lonely", "glum"],
    ["foolish", "dull", "silly", "unwise"],
    ["fast", "speedy", "quick", "swift", "rapid"],
    ["true", "correct", "right", "truthful"],
    ["false", "fake", "unreal", "untrue"],
    ["friendly", "caring", "loving"],
    ["rich", "wealthy", "moneyed", "well-off"],
    ["poor", "moneyless", "needy", "penniless"],
    ["strong", "hardy", "mighty", "sturdy", "tough"],
    ["ugly", "hideous", "gruesome", "bad-looking"],
    ["feeble", "flimsy", "frail", "puny"],
    ["afraid", "scared", "fearful", "spooked"],
    ["shy", "bashful", "coy", "timid"],
    ["unlucky", "jinxed"],
];
$bank[3] = [
    ["beautiful", "lovely", "good-looking", "attractive"],
    ["brainy", "canny", "brilliant", "intelligent", "genius", "sharp"],
    ["hefty", "bulky", "mammoth", "massive"],
    ["small", "tiny", "little", "mini"],
    ["joyful", "cheerful", "delighted", "merry"],
    ["gloomy", "glum", "somber", "sullen"],
    ["foolish", "dull", "silly", "unwise"],
    ["speedy", "brisk", "hasty", "hurried", "rapid", "swift"],
    ["factual", "truthful", "exact", "unmistaken"],
    ["incorrect", "mistaken", "untruthful"],
    ["friendly", "amiable", "sociable", "gracious", "cordial"],
    ["wealthy", "moneyed", "well-off", "well-to-do"],
    ["moneyless", "needy", "penniless", "bankrupt"],
    ["forceful", "powerful", "mighty"],
    ["gruesome", "hideous", "beastly", "ghastly", "grisly", "horrid"],
    ["feeble", "flimsy", "fragile", "frail", "puny"],
    ["frightened", "fearful", "spooked"],
    ["bashful", "coy", "sheepish", "timid"],
    ["hardworking", "industrious"],
    ["unlucky", "jinxed", "luckless"],
];
$bank[4] = [
    ["attractive", "gorgeous", "stunning", "dazzling", "angelic"],
    ["intelligent", "knowledgeable", "well-informed", "astute", "shrewd"],
    ["enormous", "gigantic", "immense", "oversized", "tremendous"],
    ["minute", "dwarfish", "midget"],
    ["jocund", "gleeful", "joyous", "mirthful", "blithe"],
    ["low-spirited", "downcast", "sorrowful", "cheerless", "morose", "mournful", "doleful"],
    ["brainless", "gullible", "feeble-minded", "idiotic", "dim-witted", "ignorant"],
    ["brisk", "agile", "fleet-footed"],
    ["exact", "factual", "unerring", "unmistaken"],
    ["faulty", "incorrect", "inexact", "mistaken", "untruthful"],
    ["amiable", "affable", "sociable", "agreeable", "personable"],
    ["affluent", "prosperous", "moneyed", "well-heeled", "well-to-do"],
    ["beggarly", "bankrupt", "moneyless", "penniless", "poverty-stricken"],
    ["durable", "enduring", "well-built", "long-lasting"],
    ["beastly", "gruesome", "ghastly", "horrid", "monstrous", "frightful"],
    ["fragile", "infirm", "unsound", "tenuous", "rickety"],
    ["frightened", "alarmed", "terrified"],
    ["aloof", "reserved", "withdrawn"],
    ["hardworking", "diligent", "industrious", "persevering"],
    ["jinxed", "luckless", "unfavored", "hapless"],
];
$bank[5] = [
    ["gorgeous", "alluring", "appealing", "beauteous", "bewitching"],
    ["astute", "comprehending", "knowledgeable", "quick-witted", "shrewd"],
    ["enormous", "gigantic", "immense", "tremendous", "gargantuan"],
    ["miniature", "minuscule", "undersized"],
    ["ecstatic", "elated", "exultant", "jubilant", "overjoyed"],
    ["depressed", "bereaved", "despairing", "distressed", "grief-stricken", "low-spirited", "heavy-hearted", "forlorn", "miserable"],
    ["gullible", "idiotic", "moronic", "simple-minded", "thick-headed", "ignorant"],
    ["breakneck", "high-speed", "expeditive"],
    ["precise", "clear-cut", "explicit", "specific"],
    ["imprecise", "distorted", "erroneous", "inaccurate"],
    ["affectionate", "benevolent", "charitable", "considerate", "compassionate", "generous"],
    ["affluent", "opulent", "prosperous", "well-heeled"],
    ["impoverished", "pauperized", "indigent", "cash-strapped"],
    ["durable", "diuturnal", "long-lasting"],
    ["appalling", "disfigured", "grotesque", "loathsome", "misshapen"],
    ["deteriorated", "dilapidated", "decrepit"],
    ["horrified", "terrified", "aghast"],
    ["unsociable", "reserved", "withdrawn", "standoffish"],
    ["diligent", "determined", "persistent", "persevering"],
    ["cursed", "hapless", "ill-fated", "unfavored", "unfortunate"],
];
$bank[6] = [
    ["alluring", "beauteous", "bewitching", "exquisite", "ravishing"],
    ["brilliant", "comprehending", "enlightened", "ingenious", "perceptive"],
    ["colossal", "behemothic", "gargantuan", "humongous"],
    ["diminutive", "miniature", "minuscule"],
    ["ecstatic", "elated", "exultant", "exhilarated", "jubilant"],
    ["depressed", "bereaved", "dejected", "despairing", "despondent", "disconsolate", "distressed", "melancholy"],
    ["imbecilic", "inane", "moronic", "nonsensical", "fatuous"],
    ["breakneck", "expeditious", "posthaste"],
    ["accurate", "veracious", "undeceptive"],
    ["deceptive", "deceitful", "fraudulent", "duplicitous"],
    ["altruistic", "philanthropic", "beneficent", "humanitarian", "indulgent"],
    ["affluent", "opulent", "pecunious"],
    ["destitute", "indigent", "impoverished", "necessitous"],
    ["impervious", "impenetrable", "impregnable", "invulnerable"],
    ["abominable", "grotesque", "loathsome", "repugnant", "repulsive", "revolting"],
    ["decrepit", "deteriorated", "dilapidated", "ramshackle"],
    ["horrified", "appalled", "aghast"],
    ["unassertive", "taciturn", "inhibited", "reticent"],
    ["conscientious", "punctilious", "meticulous"],
    ["ill-omened", "star-crossed", "unfortunate"],
];
$bank[7] = [
    ["alluring", "entrancing", "beauteous", "bewitching", "exquisite", "ravishing"],
    ["sagacious", "erudite", "ingenious", "perceptive", "perspicacious"],
    ["behemothic", "capacious", "colossal", "commodious", "prodigious", "humongous"],
    ["diminutive", "picayune", "minuscule", "infinitesimal"],
    ["exuberant", "exultant", "euphoric", "enraptured", "exhilarated"],
    ["dejected", "despondent", "disconsolate", "lugubrious", "melancholic"],
    ["imbecilic", "inane", "asinine", "fatuous"],
    ["accelerated", "expeditious", "posthaste", "velocious", "alacritous"],
    ["categorical", "unambiguous", "unequivocal", "indisputable", "incontrovertible", "indubitable"],
    ["fraudulent", "deceptive", "duplicitous", "disingenuous", "mendacious"],
    ["altruistic", "philanthropic", "beneficent", "magnanimous"],
    ["affluent", "opulent", "pecunious", "propertied"],
    ["destitute", "impecunious", "necessitous", "penurious"],
    ["perdurable", "imperishable", "ineradicable"],
    ["abominable", "repugnant", "repulsive", "abhorrent"],
    ["debilitated", "incapacitated", "devitalized"],
    ["petrified", "appalled"],
    ["introverted", "reclusive", "diffident", "taciturn"],
    ["sedulous", "assiduous"],
];

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

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $groups = $bank[$arrnum];
    $groupCount = count($groups);

    $usedKey = 'used_' . $arrnum;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    $safety = 0;
    do {
        $gIdx = rand(0, $groupCount - 1);
        $wIdx = rand(0, count($groups[$gIdx]) - 1);
        $wKey = $gIdx . '-' . $wIdx;
        $safety++;
    } while (in_array($wKey, $used, true) && $safety < 60);
    $used[] = $wKey;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $word = $groups[$gIdx][$wIdx];

    $sameGroup = $groups[$gIdx];
    if (count($sameGroup) < 2) {
        $answer = $sameGroup[0];
    } else {
        $otherIdxs = [];
        foreach ($sameGroup as $i => $v) if ($v !== $word) $otherIdxs[] = $i;
        $answer = $sameGroup[$otherIdxs[array_rand($otherIdxs)]];
    }

    $otherGroups = [];
    for ($i = 0; $i < $groupCount; $i++) {
        if ($i !== $gIdx) $otherGroups[] = $i;
    }
    shuffle($otherGroups);
    $distractors = [];
    foreach ($otherGroups as $oIdx) {
        if (count($distractors) >= 3) break;
        $grp = $groups[$oIdx];
        $distractors[] = $grp[array_rand($grp)];
    }
    while (count($distractors) < 3) {
        $d = $groups[array_rand($groups)];
        $distractors[] = $d[array_rand($d)];
    }

    $choices = array_merge([$answer], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'word'    => $word,
        'answer'  => $answer,
        'choices' => $choices,
        'lvl'     => $lvl,
        'arrnum'  => $arrnum,
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
  .syn-row {
    --choice-width: 12em;
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: stretch;
    gap: 25px;
    margin: 20px auto;
  }
  .syn-grid-2x2 {
    --choice-width: 12em;
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
    max-width: 655px;
  }
  .syn-grid-1col {
    --choice-width: 12em;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .syn-choice {
    width: var(--choice-width);
    max-width: 100%;
    flex: 0 1 auto;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 12px;
    padding: 14px 18px;
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.25rem;
    font-weight: 700;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .syn-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .syn-word-card {
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #CC0066;
    text-align: center;
    margin: 20px auto;
  }
  @media (max-width: 600px) {
    .syn-row { flex-wrap: wrap; gap: 10px; }
    .syn-row .syn-choice { width: calc(50% - 12px); }
    .syn-grid-2x2 { grid-template-columns: 1fr 1fr; gap: 10px 14px; }
    .syn-grid-2x2 .syn-choice { width: 100%; }
    .syn-choice { font-size: 1rem; padding: 10px 12px; }
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
    <p style="font-size:15pt; color:#800080; margin-top:20px; line-height:1.7;">Between the words <?php echo htmlspecialchars(implode(', ', $cur['choices'])); ?>, the most suitable synonym for the word <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['word']); ?>'</strong> is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.</p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="syn-word-card">
        <?php if ($grd > 0): ?>
            Click on the word that is a <strong style="color:#800080;">synonym</strong><br>
            of the word '<strong><?php echo htmlspecialchars($q['word']); ?></strong>'.<br/>
        <?php else: ?>
            Click on the word that means<br>
            the same as '<strong><?php echo htmlspecialchars($q['word']); ?></strong>'.<br/>
        <?php endif; ?>
    </div>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        if ($maxLen > 20)      $containerClass = 'syn-grid-1col';
        elseif ($maxLen >= 5)  $containerClass = 'syn-grid-2x2';
        else                   $containerClass = 'syn-row';
    ?>
    <div class="<?php echo $containerClass; ?>" style="--choice-width: <?php echo $choiceWidthEm; ?>em;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="syn-choice">
                <?php echo htmlspecialchars($c); ?>
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