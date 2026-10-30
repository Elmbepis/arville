<?php
// english/modules/listening.php
// AUDIO &#8594; CHOICE — user hears a spoken word, clicks the matching word text.
// Static bank of 6 tiers (grades 0-5). Bypass QEngine per §3.
//
// Levels (§5 — 2-level scheme, Medium+Hard merged):
//   Grade-keyed tier assignment:
//     grd 0 &#8594; Easy: 0; Hard: rand(1,2)   [Medium=1, Hard=2]
//     grd 1-2 &#8594; Easy: 1; Hard: rand(2,3) [Medium=2, Hard=3]
//     grd 3-4 &#8594; Easy: 2; Hard: rand(3,4) [Medium=3, Hard=4]
//     grd 5+ &#8594; Easy: 3; Hard: rand(4,5)  [Medium=4, Hard=5]
//   Hard keeps Medium+Hard union per §10 — preserves real tier differentiation.
//
// Bank format: "correct1dist2_2dist3_3dist4" per item (e.g. "back1bake2beak3bike").
//   Correct word first; "1","2","3" delimit the three distractors.
//   Shuffled at render time.
//
// Audio: $base . '/english/modules/sounds/<ans>.wav' — preserved from legacy.
//
// Choice layout (§14): maxLen rule.
//   &#8804; 4 &#8594; 1 row (4-across); 5-20 &#8594; 2×2; > 20 &#8594; 1-col.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 2.
// Theme: ex-*-25 (75/655/70) &#8594; fits §8 &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'listening.php'

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

$moduleTitle = 'Listening to Spoken Words';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 2)));

// ============================================================
// BANK — tier &#8594; list of "correct1dist1_2dist2_3dist3"
// ============================================================
$bank = [];

$bank[0] = [
    "back1bake2beak3bike", "bird1boat2book3card", "boat1box2bone3goat", "book1boat2beak3hook", "box1boy2big3bat",
    "boy1box2bat3toy", "cart1cat2cars3care", "cat1car2cup3sat", "cow1cat2claw3how", "cub1cup2cut3can", "day1bay2may3ray",
    "deer1deep2dare3dire", "duck1buck2deck3luck", "fair1fear2fire3four", "far1bar2car3war", "foot1feet2food3fool",
    "girl1goat2bird3curl", "glad1glum2glow3grab", "goat1boat2goes3coat", "hare1hear2hire3hour", "hot1mat2dot3cut",
    "jail1mail2pail3tail", "junk1bunk2dunk3jump", "king1sing2ring3kind", "lake1make2late3lame", "luck1buck2duck3tuck",
    "lion1mine2loin3lane", "man1mat2can3nun", "mean1main2mine3moon", "neck1deck2nest3net", "nose1rose2pose3note",
    "oven1oxen2over3oval", "pail1mail2tail3pair", "pear1bear2pour3fear", "rags1tags2bags3rats", "rock1sock2rat3rake",
    "sad1lad2mad3bad", "seal1sell2seem3seek", "seed1seal2seat3seek", "star1scar2spar3stir", "tray1pray2tree3try",
    "tree1free2glee3tray", "truck1trick2rock3tuck", "vase1ways2lays3vise", "wave1save2cave3wait", "yarn1barn2warn3yawn",
];

$bank[1] = [
    "baker1taker2barker3biker", "blows1blown2flows3glows", "brain1train2braid3brake", "bread1dread2break3beard",
    "candy1dandy2handy3sandy", "chair1chain2cheer3share", "claws1clothes2clawed3crows", "clown1blown2flown3cloud",
    "happy1heavy2hurry3honey", "heavy1having2hobby3hurry", "horse1house2hours3hears", "house1mouse2horse3hours",
    "might1night2mined3right", "music1magic2basic3mosaic", "night1might2ninth3fight", "plane1flake2plate3place",
    "plate1flake2place3played", "right1light2fight3sight", "river1cover2zipper3beaver", "school1scoop2spool3stool",
    "shirt1share2short3sharp", "shows1shoes2shown3sows", "smoke1smooth2smack3smirk", "stick1slick2stock3stiff",
    "street1treat2steer3strip", "tiger1timer2tuber3timber", "times1dimes2tires3tiles", "train1trait2brain3trail",
    "whale1while2wheel3wailed", "water1waiter2later3wetter", "white1while2wide3with", "windy1wind2winding3winds",
];

$bank[2] = [
    "awake1await2aware3awoke", "bottle1rattle2cattle3butter", "brooks1brooms2broods3crooks", "chicken1children2thicken3chicks",
    "church1chairs2chores3charts", "clocks1blocks2cracks3cloaks", "crowd1cloud2crown3clown", "driver1drives2diver3driven",
    "flower1shower2flipper3power", "freeze1please2fries3fleas", "frown1crown2brown3flown", "garden1gander2ginger3garlic",
    "grapes1drapes2grains3grades", "handle1candle2bundle3handed", "health1hearth2healed3held", "mallet1wallet2gullet3millet",
    "meadow1shadow2mother3borrow", "monkey1money2donkey3munchy", "needle1middle2riddle3fiddle", "pencil1penny2fancy3fencing",
    "people1purple2pupil3paper", "proud1plowed2pride3prayed", "rattle1settle2cattle3bottle", "reward1rewear2rewind3rewarm",
    "rocket1socket2rocker3pocket", "scared1stared2spared3snared", "sprays1strays2spies3sprains", "stare1scare2stale3stairs",
    "turkey1perky2turtle3tardy", "turtle1purple2title3hurtle", "yellow1fellow2mellow3pillow",
];

$bank[3] = [
    "active1acting2achieve3arctic", "adorn1adore2acorn3adjoin", "airport1airpot2escort3report",
    "battery1lottery2pottery3boundary", "branches1crunches2ranches3brushes", "certain1curtain2captain3curtail",
    "cheerily1cheerier2cheekily3cheesily", "collect1correct2collate3connect", "comfort1conform2confront3confer",
    "contact1contract2conduct3compact", "excited1recited2exited3excised", "familiar1familial2families3family",
    "flatter1flitter2floater3fatter", "harsher1harshest2harasser3harshness", "mountain1fountain2maintain3mounting",
    "muscles1measles2missiles3masters", "percent1precinct2pertain3persist", "pottery1battery2poverty3powdery",
    "pounded1rounded2sounded3pointed", "present1percent2presence3pretend", "prevent1pretend2present3fervent",
    "slipper1slither2slicker3slicer", "sounded1pounded2rounded3hounded", "speaker1sticker2spiker3spinner",
    "special1species2spacious3speckle", "recited1recital2recipe3recycled", "teachers1preachers2searchers3teasers",
];

$bank[4] = [
    "affect1afflict2effect3affix", "affix1apex2affects3afflicts", "apex1affix2affects3effects",
    "artery1archery2artistry3eatery", "attained1attend2atoned3abstained", "brimming1bringing2breeding3dreaming",
    "boundary1battery2burgundy3banditry", "campaign1contain2complain3captain", "condone1condole2condemn3cordone",
    "council1conceal2counsel3cancel", "decide1defied2beside3describe", "deform1reform2perform3conform",
    "demote1devote2denote3remote", "jolliest1joltiest2jollier3holiest", "mortally1morally2mortuary3mortality",
    "perform1deform2reform3conform", "persist1percent2persuade3perceive", "persuade1persist2perceive3preside",
    "pertain1protein2retain3pretend", "purpose1purpled2purport3perplex", "reliever1believer2revealer3deliver",
    "slaughter1slither2splatter3splitter", "slither1slipper2slicker3slaughter", "trembled1trampled2trebled3tumbled",
    "trenches1crunches2wrenches3threshes",
];

$bank[5] = [
    "absorb1absolve2absurd3adsorb", "affirm1affair2affix3unfirm", "afflict1affect2affix3uplift",
    "assess1abscess2access3assets", "concede1conceal2conceive3conceit", "confer1confirm2compare3conform",
    "conform1confirm2confront3confer", "confront1conform2confer3compress", "declining1designing2declaiming3disclaiming",
    "forbidding1forboding2forbearing3foregoing", "indicate1vindicate2syndicate3intimate", "indict1invite2incite3insight",
    "ingest1inject2infest3invest", "insulate1insulin2incubate3insulant", "intend1intent2intense3instead",
    "invest1infest2invent3ingest", "perceive1proceed2persist3precede", "pervaded1pervader2persuaded3pervading",
    "populace1populate2popular3populist", "proceed1perceive2recede3preside", "preside1reside2precede3perceive",
    "protein1pertain2proton3preterm", "recede1perceive2receipt3precede", "revelry1reverie2rivalry3reveler",
    "reverie1revelry2revering3reviewee", "scrambled1scribbled2squabbled3stumbled", "topical1typical2tropical3toxical",
    "verbifies1verbalize2verifies3versifies",
];

// ============================================================
// TIER SELECTION
// ============================================================
$grdKey = ($grd < 1) ? 0 : (($grd <= 2) ? 1 : (($grd <= 4) ? 2 : 3));
$configs = [
    0 => ['Easy' => [0, 0], 'Hard' => [1, 2]],
    1 => ['Easy' => [1, 1], 'Hard' => [2, 3]],
    2 => ['Easy' => [2, 2], 'Hard' => [3, 4]],
    3 => ['Easy' => [3, 3], 'Hard' => [4, 5]],
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
    $list = $bank[$arrnum];
    $listCount = count($list);

    $usedKey = 'used_' . $arrnum;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    $safety = 0;
    do {
        $rnum = rand(0, $listCount - 1);
        $safety++;
    } while (in_array($rnum, $used, true) && $safety < 100);

    $used[] = $rnum;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $wordstr = $list[$rnum];
    $pos1 = strpos($wordstr, "1");
    $pos2 = strpos($wordstr, "2");
    $pos3 = strpos($wordstr, "3");

    $qword   = strtolower(substr($wordstr, 0, $pos1));
    $choices = [
        strtolower(substr($wordstr, $pos1 + 1, $pos2 - $pos1 - 1)),
        strtolower(substr($wordstr, $pos2 + 1, $pos3 - $pos2 - 1)),
        strtolower(substr($wordstr, $pos3 + 1)),
        $qword,
    ];
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'answer'  => $qword,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .lsw-audio-box { text-align: center; margin: 24px auto 10px; }
  .lsw-row {
    --choice-width: 9em;
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: stretch;
    gap: 18px;
    margin: 18px auto;
  }
  .lsw-grid-2x2 {
    --choice-width: 9em;
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
  }
  .lsw-grid-1col {
    --choice-width: 14em;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .lsw-choice {
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
  .lsw-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .lsw-instruction {
    display: block;
    color: #800080;
    font-size: 1.35rem;
    font-weight: 700;
    line-height: 1.5;
    margin: 18px auto 4px;
  }
  .lsw-click-prompt {
    display: block;
    color: #666;
    font-size: 1.15rem;
    font-weight: 500;
    margin-bottom: 12px;
  }
  @media (max-width: 600px) {
    .lsw-row { flex-wrap: wrap; gap: 12px; }
    .lsw-row .lsw-choice { width: calc(50% - 12px); }
    .lsw-grid-2x2 { grid-template-columns: 1fr 1fr; gap: 10px 14px; }
    .lsw-grid-2x2 .lsw-choice { width: 100%; }
    .lsw-choice { font-size: 0.95rem; padding: 9px 12px; }
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
        The spoken word is
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <div class="lsw-audio-box">
        <audio controls preload="auto" controlslist="nodownload">
            <source src="<?php echo htmlspecialchars($base . '/english/modules/sounds/' . $cur['answer'] . '.wav'); ?>" type="audio/wav">
        </audio>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="lsw-audio-box">
        <audio controls preload="auto" controlslist="nodownload" autoplay>
            <source src="<?php echo htmlspecialchars($base . '/english/modules/sounds/' . $q['answer'] . '.wav'); ?>" type="audio/wav">
        </audio>
    </div>

    <span class="lsw-instruction">
        Listen to the audio clip above,<br>then click on the spoken word below.
    </span>
    <span class="lsw-click-prompt">Click on your answer.</span>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        if ($maxLen > 20)      $containerClass = 'lsw-grid-1col';
        elseif ($maxLen >= 5)  $containerClass = 'lsw-grid-2x2';
        else                   $containerClass = 'lsw-row';
    ?>
    <div class="<?php echo $containerClass; ?>" style="--choice-width: <?php echo $choiceWidthEm; ?>em;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="lsw-choice">
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