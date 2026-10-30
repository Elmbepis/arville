<?php
// english/modules/antonyms.php
// STATIC antonym bank + choice. Bypass QEngine per §D.
// Shows a base word; click its antonym from 4 choices.
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
// Bank structure: $bank[tier][groupIdx][1] = synonym list (contains question
// word), [2] = antonym list (contains answer). Answer = random entry from
// [2] of the same group. Distractors = 3 random entries from distinct other
// groups (either list). Preserves legacy semantics.
//
// Choice layout (§14): uniform width via --choice-width CSS var.
//   maxLen &#8804; 4 &#8594; 1-row (4-across); 5–20 &#8594; 2×2; > 20 &#8594; 1-col.
//   Never 3+1 wrap.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Theme: ex-*-009 (136/556/117) &#8594; not in §8 fit list &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'antonyms.php'

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

$moduleTitle = 'Antonyms';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 5)));

$bank = [];
$bank[1] = [
    1 => [1 => ["pretty", "lovely"], 2 => ["ugly", "bad-looking"]],
    2 => [1 => ["bright", "clever", "smart", "wise"], 2 => ["foolish", "silly", "dumb"]],
    3 => [1 => ["big", "large", "huge"], 2 => ["small", "tiny", "little"]],
    4 => [1 => ["happy", "joyful", "glad"], 2 => ["sad", "unhappy", "lonely"]],
    5 => [1 => ["rich", "wealthy", "well-off"], 2 => ["poor", "moneyless", "needy"]],
    6 => [1 => ["fast", "quick"], 2 => ["slow"]],
    7 => [1 => ["honest", "truthful"], 2 => ["dishonest", "lying"]],
    8 => [1 => ["old", "aged"], 2 => ["young", "new"]],
    9 => [1 => ["true"], 2 => ["false", "untrue"]],
];
$bank[2] = [
    1 => [1 => ["pretty", "lovely", "beautiful", "good-looking"], 2 => ["ugly", "hideous", "gruesome", "bad-looking"]],
    2 => [1 => ["brainy", "bright", "clever", "smart", "wise"], 2 => ["stupid", "foolish", "dumb", "silly", "unwise"]],
    3 => [1 => ["big", "large", "huge", "jumbo", "giant"], 2 => ["small", "tiny", "little", "mini"]],
    4 => [1 => ["happy", "joyful", "glad", "jolly", "merry"], 2 => ["sad", "unhappy", "gloomy", "lonely", "glum"]],
    5 => [1 => ["rich", "wealthy", "moneyed", "well-off"], 2 => ["poor", "moneyless", "needy", "penniless"]],
    6 => [1 => ["fast", "speedy", "quick", "swift", "rapid"], 2 => ["slow", "snail-like"]],
    7 => [1 => ["honest", "truthful", "frank"], 2 => ["dishonest", "fake", "untruthful"]],
    8 => [1 => ["old", "aged", "elderly"], 2 => ["young", "new", "youthful"]],
];
$bank[3] = [
    1 => [1 => ["beautiful", "lovely", "good-looking", "attractive"], 2 => ["gruesome", "hideous", "beastly", "ghastly", "grisly", "horrid"]],
    2 => [1 => ["brainy", "canny", "brilliant", "intelligent", "genius", "sharp"], 2 => ["stupid", "brainless", "witless", "unwise"]],
    3 => [1 => ["hefty", "bulky", "mammoth", "oversized"], 2 => ["minute", "tiny", "mini", "undersized"]],
    4 => [1 => ["joyful", "cheerful", "delighted", "merry"], 2 => ["gloomy", "glum", "somber", "sullen"]],
    5 => [1 => ["wealthy", "moneyed", "well-off", "well-to-do"], 2 => ["moneyless", "needy", "penniless", "bankrupt"]],
    6 => [1 => ["speedy", "brisk", "hasty", "hurried", "rapid", "swift"], 2 => ["sluggish", "slow-moving", "snail-like"]],
    7 => [1 => ["frank", "genuine", "sincere", "trustworthy"], 2 => ["dishonest", "insincere", "untruthful"]],
    8 => [1 => ["mature", "elderly", "ancient"], 2 => ["youthful", "juvenile"]],
];
$bank[4] = [
    1 => [1 => ["attractive", "gorgeous", "stunning", "dazzling", "angelic"], 2 => ["beastly", "gruesome", "ghastly", "horrid", "monstrous", "frightful"]],
    2 => [1 => ["intelligent", "knowledgeable", "well-informed", "astute", "shrewd"], 2 => ["brainless", "gullible", "feeble-minded", "idiotic", "dim-witted", "ignorant"]],
    3 => [1 => ["enormous", "gigantic", "immense", "tremendous"], 2 => ["minute", "dwarfish", "midget"]],
    4 => [1 => ["jocund", "gleeful", "joyous", "mirthful", "blithe"], 2 => ["low-spirited", "downcast", "sorrowful", "cheerless", "morose", "mournful", "doleful"]],
    5 => [1 => ["affluent", "prosperous", "moneyed", "well-heeled", "well-to-do"], 2 => ["beggarly", "bankrupt", "moneyless", "penniless", "poverty-stricken"]],
    6 => [1 => ["brisk", "agile", "fleet-footed"], 2 => ["sluggish", "unhurried", "leisurely"]],
    7 => [1 => ["sincere", "trustworthy", "credible"], 2 => ["insincere", "deceitful", "hypocritical"]],
    8 => [1 => ["ancient", "seasoned", "veteran"], 2 => ["fledgling", "juvenile", "immature"]],
];
$bank[5] = [
    1 => [1 => ["gorgeous", "alluring", "appealing", "beauteous", "bewitching"], 2 => ["appalling", "disfigured", "grotesque", "loathsome", "misshapen"]],
    2 => [1 => ["astute", "comprehending", "knowledgeable", "quick-witted", "shrewd"], 2 => ["gullible", "idiotic", "moronic", "simple-minded", "thick-headed", "ignorant"]],
    3 => [1 => ["enormous", "gigantic", "immense", "tremendous", "gargantuan"], 2 => ["miniature", "minuscule", "undersized"]],
    4 => [1 => ["ecstatic", "elated", "exultant", "jubilant", "overjoyed"], 2 => ["depressed", "bereaved", "despairing", "distressed", "grief-stricken", "low-spirited", "heavy-hearted", "forlorn", "miserable"]],
    5 => [1 => ["affluent", "opulent", "prosperous", "well-heeled"], 2 => ["impoverished", "pauperized", "indigent", "cash-strapped"]],
    6 => [1 => ["breakneck", "high-speed", "expeditive"], 2 => ["gradual", "sluggish", "dilatory", "lethargic"]],
    7 => [1 => ["above-board", "ethical", "reputable", "scrupulous"], 2 => ["unprincipled", "dishonorable", "underhanded", "immoral"]],
    8 => [1 => ["antiquated", "archaic", "outmoded", "obsolete"], 2 => ["up-to-date", "contemporary", "modern"]],
];
$bank[6] = [
    1 => [1 => ["alluring", "beauteous", "bewitching", "exquisite", "ravishing"], 2 => ["abominable", "grotesque", "loathsome", "repugnant", "repulsive", "revolting"]],
    2 => [1 => ["brilliant", "comprehending", "enlightened", "ingenious", "perceptive"], 2 => ["imbecilic", "inane", "moronic", "nonsensical", "fatuous"]],
    3 => [1 => ["colossal", "behemothic", "gargantuan", "humongous"], 2 => ["diminutive", "miniature", "minuscule"]],
    4 => [1 => ["ecstatic", "elated", "exultant", "exhilarated", "jubilant"], 2 => ["depressed", "bereaved", "dejected", "despairing", "despondent", "disconsolate", "distressed", "melancholy"]],
    5 => [1 => ["affluent", "opulent", "pecunious"], 2 => ["destitute", "indigent", "impoverished", "necessitous"]],
    6 => [1 => ["breakneck", "expeditious", "posthaste"], 2 => ["dilatory", "torpid", "languid", "lethargic"]],
    7 => [1 => ["reputable", "scrupulous", "undisguised", "veracious"], 2 => ["devious", "deceptive", "duplicitous"]],
    8 => [1 => ["antiquated", "archaic", "obsolescent"], 2 => ["contemporary", "cutting-edge", "state-of-the-art"]],
];
$bank[7] = [
    1 => [1 => ["alluring", "entrancing", "beauteous", "bewitching", "exquisite", "ravishing"], 2 => ["abominable", "repugnant", "repulsive", "abhorrent"]],
    2 => [1 => ["sagacious", "erudite", "ingenious", "perceptive", "perspicacious"], 2 => ["imbecilic", "inane", "asinine", "fatuous"]],
    3 => [1 => ["behemothic", "capacious", "colossal", "commodious", "prodigious", "humongous"], 2 => ["diminutive", "picayune", "minuscule", "infinitesimal"]],
    4 => [1 => ["exuberant", "exultant", "euphoric", "enraptured", "exhilarated"], 2 => ["dejected", "despondent", "disconsolate", "lugubrious", "melancholic"]],
    5 => [1 => ["affluent", "opulent", "pecunious", "propertied"], 2 => ["destitute", "impecunious", "necessitous", "penurious"]],
    6 => [1 => ["accelerated", "expeditious", "velocious", "alacritous"], 2 => ["languorous", "lethargic", "lackadaisical"]],
    7 => [1 => ["unassailable", "indisputable", "indubitable"], 2 => ["debatable", "controvertible", "ambiguous"]],
    8 => [1 => ["senescent", "obsolescent"], 2 => ["neoteric", "cutting-edge", "state-of-the-art"]],
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
    $groupIds = array_keys($groups);
    $groupCount = count($groupIds);

    $usedKey = 'used_' . $arrnum;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    $safety = 0;
    do {
        $gIdx = $groupIds[rand(0, $groupCount - 1)];
        $synList = $groups[$gIdx][1];
        $wIdx = rand(0, count($synList) - 1);
        $wKey = $gIdx . '-' . $wIdx;
        $safety++;
    } while (in_array($wKey, $used, true) && $safety < 60);
    $used[] = $wKey;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $word = $groups[$gIdx][1][$wIdx];

    $antList = $groups[$gIdx][2];
    $answer  = $antList[array_rand($antList)];

    $otherGroups = array_values(array_filter($groupIds, fn($k) => $k !== $gIdx));
    shuffle($otherGroups);
    $distractors = [];
    foreach ($otherGroups as $oIdx) {
        if (count($distractors) >= 3) break;
        $opt = rand(1, 2);
        $list = $groups[$oIdx][$opt];
        $distractors[] = $list[array_rand($list)];
    }
    while (count($distractors) < 3) {
        $randG = $groupIds[array_rand($groupIds)];
        if ($randG === $gIdx) continue;
        $opt = rand(1, 2);
        $list = $groups[$randG][$opt];
        $distractors[] = $list[array_rand($list)];
        if (count($distractors) > 20) break;
    }
    $distractors = array_values(array_unique($distractors));
    while (count($distractors) < 3) $distractors[] = 'antonym' . count($distractors);

    $choices = array_merge([$answer], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'qword'   => $word,
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
  .ant-row {
    --choice-width: 12em;
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: stretch;
    gap: 25px;
    margin: 20px auto;
  }
  .ant-grid-2x2 {
    --choice-width: 12em;
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
    max-width: 655px;
  }
  .ant-grid-1col {
    --choice-width: 12em;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .ant-choice {
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
  .ant-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .ant-word-card {
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #CC0066;
    text-align: center;
    margin: 20px auto;
  }
  @media (max-width: 600px) {
    .ant-row { flex-wrap: wrap; gap: 10px; }
    .ant-row .ant-choice { width: calc(50% - 12px); }
    .ant-grid-2x2 { grid-template-columns: 1fr 1fr; gap: 10px 14px; }
    .ant-grid-2x2 .ant-choice { width: 100%; }
    .ant-choice { font-size: 1rem; padding: 10px 12px; }
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
    <p style="font-size:15pt; color:#800080; margin-top:20px; line-height:1.7;">Among the words <?php echo htmlspecialchars(implode(', ', $cur['choices'])); ?>, the most suitable antonym for the word <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['qword']); ?>'</strong> is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.</p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="ant-word-card">
        <?php if ($grd > 0): ?>
            Click on the <strong style="color:#800080;">antonym</strong> of<br>
            the word '<strong><?php echo htmlspecialchars($q['qword']); ?></strong>'.<br/>
        <?php else: ?>
            Click on the word that is<br>
            the opposite of '<strong><?php echo htmlspecialchars($q['qword']); ?></strong>'.<br/>
        <?php endif; ?>
    </div>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        if ($maxLen > 20)      $containerClass = 'ant-grid-1col';
        elseif ($maxLen >= 5)  $containerClass = 'ant-grid-2x2';
        else                   $containerClass = 'ant-row';
    ?>
    <div class="<?php echo $containerClass; ?>" style="--choice-width: <?php echo $choiceWidthEm; ?>em;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="ant-choice">
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