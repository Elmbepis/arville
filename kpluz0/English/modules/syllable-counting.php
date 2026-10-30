<?php
// english/modules/syllable-counting.php
// FREE-TEXT — user types the syllable count of the shown word. Bypass QEngine.
// FIB pattern per §12: Submit1 for answer, Submit2 for new question.
//
// Levels (§5 — 2-level scheme):
//   Legacy had four separate word-pools (tiers 1-4) with genuine difficulty
//   differentiation — NOT fake. Per §10, preserve real differentiation:
//     grd 0-1 &#8594; Easy: 1; Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 2+  &#8594; Easy: 2; Hard: rand(3,4)   [Medium=3, Hard=4]
//   Tiers:
//     1 — 1-3 syllables (basic CVC / common two-syllable)
//     2 — 1-3 syllables (harder, blends, three-syllable)
//     3 — 1-4 syllables (silent-e, harder blends, four-syllable)
//     4 — mixed 1-5 syllables (advanced, four- and five-syllable)
//
// Word format: "<syllCount><syllable-break>" e.g. "2an-gel".
//   $ans = first char (count). Display word = syll-break stripped of hyphens.
//   Feedback shows syllabified card.
//
// Answer handling (§12 F.1): canonicalise with (string)(int)trim().
// Input sizing (§12 F.4): max(100, (digitCount + 1) * 32 + 24) px.
// maxlength (§12 F.5): strlen((string)$ans) + 1.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 2.
// Theme: ex-*-23 (75/655/70) &#8594; fits §8 &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'syllable-counting.php'

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

$moduleTitle = 'Counting Syllables';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 2)));

// ============================================================
// BANK — tier &#8594; list of "<count><syllabified>" strings
// ============================================================
$sylldivs = [];

$sylldivs[1] = [
    "1bless", "1boats", "1chair", "1chick", "1clown", "1drink", "1ducks", "1girls", "1goats", "1green", "1hands", "1horse", "1house", "1jumps",
    "1kings", "1knock", "1lamps", "1month", "1night", "1pants", "1queen", "1rides", "1rocks", "1shirt", "1small", "1socks", "1stars", "1stick",
    "1tenth", "1thing", "1twins", "1wheel", "1wings", "1young",
    "2an-gel", "2ap-ple", "2ba-by", "2bak-er", "2bush-es", "2can-dy", "2drag-on", "2fa-ther", "2flow-er", "2gar-den", "2gi-ants", "2li-on",
    "2luck-y", "2ham-mer", "2hap-py", "2mag-ic", "2mon-ey", "2mu-sic", "2or-ange", "2pi-lot", "2pup-py", "2riv-er", "2rul-er", "2sto-ry", "2sug-ar",
    "2ti-ger", "2tow-er", "2wag-on", "2wa-ter", "2won-der", "2yel-low",
    "3an-i-mal", "3ba-nan-a", "3cam-er-a", "3ca-nar-y", "3e-ras-er", "3hol-i-day", "3po-ta-to", "3to-ma-to", "3ro-sa-ry", "3vi-o-let", "3vi-o-lin",
];

$sylldivs[2] = [
    "1chains", "1change", "1clocks", "1cooked", "1fright", "1kissed", "1lights", "1looked", "1plants", "1shakes", "1trains", "1trucks",
    "1scrubs", "1shrimps", "1speaks", "1straws", "1thirst", "1winked",
    "2an-swer", "2bal-loon", "2blan-ket", "2brit-tle", "2broth-er", "2but-ter", "2cave-man", "2cra-ter", "2den-tist", "2dol-phin",
    "2fin-ger", "2fol-lows", "2hun-gry", "2in-side", "2kick-ing", "2kitch-en", "2lad-ders", "2lit-tle", "2lov-ing", "2mar-ket", "2mon-key",
    "2mon-ster", "2morn-ing", "2na-ture", "2os-trich", "2peo-ple", "2pop-corn", "2pump-kins", "2pur-ple", "2rest-ing", "2shel-ter", "2sis-ter",
    "2snow-man", "2thun-der", "2trac-tor",
    "3an-i-mals", "3ba-nan-as", "3bur-i-al", "3ca-nar-ies", "3cap-i-tal", "3cin-e-ma", "3ed-i-ble", "3e-lev-en", "3ex-er-cise", "3eve-ry-one",
    "3for-ev-er", "3i-ci-cle", "3mag-a-zine", "3mu-si-cal", "3om-e-let", "3or-ang-es", "3or-i-gin", "3po-ta-toes", "3ro-sa-ries", "3stu-di-o",
    "3to-ma-toes", "3un-a-ble", "3va-ca-tion", "3vol-ca-no", "3war-ri-or",
];

$sylldivs[3] = [
    "1blinked", "1blocked", "1bloomed", "1broiled", "1brought", "1changed", "1claimed", "1croaked", "1dwarves", "1shocked", "1trained",
    "1spanked", "1spooked", "1sprained", "1springs", "1strange", "1stretched", "1scratched", "1strings", "1strikes", "1strokes",
    "1twelfth",
    "2be-tween", "2blind-fold", "2cap-tain", "2coun-try", "2cor-rect", "2cour-age", "2faith-ful", "2foot-ball", "2home-work", "2hun-dred",
    "2kind-ness", "2mis-take", "2paint-ed", "2pos-ture", "2re-main", "2sci-ence", "2scold-ed", "2self-ish", "2sen-tence", "2snow-storm",
    "2spe-cial", "2sweet-ness", "2thank-ful", "2tooth-brush",
    "3am-u-let", "3an-i-mate", "3ar-ri-val", "3cab-i-net", "3de-liv-er", "3de-ni-al", "3de-vel-op", "3di-a-mond", "3ed-i-tor", "3ex-am-ple",
    "3li-a-ble", "3in-sid-er", "3in-vad-ed", "3o-va-ry", "3re-lat-ed", "3re-li-gion", "3sim-i-lar", "3tal-ent-ed", "3to-mor-row", "3vid-e-o",
    "4a-nat-o-my", "4u-ku-le-le", "4di-o-ram-a", "4o-be-di-ent", "4re-al-i-ty", "4un-u-su-al",
];

$sylldivs[4] = [
    "1crunched", "1scrolled", "1strained", "1strengths", "1thoughts",
    "2de-cides", "2dis-count", "2dis-ease", "2dis-played", "2flash-back", "2non-sense", "2sup-plied", "2sup-posed", "2out-doors",
    "2preach-ing", "2pro-grammed", "2skill-ful", "2spot-less", "2strength-en", "2stretch-er", "2swift-ness",
    "3al-pha-bet", "3cav-i-ties", "3de-mand-ed", "3di-rec-tor", "3dis-as-ter", "3dis-cov-er", "3e-nor-mous", "3for-get-ful", "3in-clud-ed",
    "3in-sert-ed", "3mer-ci-ful", "3om-ni-vore", "3op-po-site", "3pos-si-ble", "3prop-er-ty", "3re-mem-ber", "3sep-a-rate", "3sud-den-ly",
    "3ter-ri-ble", "3to-geth-er", "3wan-der-er", "3var-i-ous", "3vi-o-lence",
    "4am-i-ca-ble", "4an-i-ma-tor", "4au-ton-o-my", "4ca-lam-i-ty", "4co-lo-ni-al", "4co-me-di-an", "4di-am-e-ter", "4ed-u-cat-ed",
    "4in-te-ri-or", "4me-mo-ri-al", "4pan-o-ram-a", "4op-er-a-tor", "4re-li-a-ble",
    "5caf-e-te-ri-a", "5id-i-o-mat-ic", "5ed-i-to-ri-al",
];

// ============================================================
// TIER SELECTION (2-level scheme)
// ============================================================
$grdKey = ($grd <= 1) ? 0 : 1;
$configs = [
    0 => ['Easy' => [1, 1], 'Hard' => [2, 3]],
    1 => ['Easy' => [2, 2], 'Hard' => [3, 4]],
];
$range  = $configs[$grdKey][$lvl];
$arrnum = rand($range[0], $range[1]);

// ============================================================
// HANDLE ANSWER SUBMIT (Submit1)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($userInput, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'input' => $userInput, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $list = $sylldivs[$arrnum];
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

    $entry = $list[$rnum];
    $ans      = substr($entry, 0, 1);      // syllable count
    $sylldiv0 = substr($entry, 1);         // "an-gel"
    $word     = str_replace("-", "", $sylldiv0);  // "angel"

    $_SESSION[$sessionKey]['current'] = [
        'word'    => $word,
        'sylldiv' => $sylldiv0,
        'answer'  => $ans,
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
  .syl-word-card {
    display: inline-block;
    background: #fefbde;
    border: 2px solid #9f2601;
    border-radius: 10px;
    padding: 20px 40px;
    margin: 20px auto;
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    text-align: center;
  }
  .syl-instruction {
    display: block;
    color: #800080;
    font-size: 1.35rem;
    font-weight: 700;
    line-height: 1.5;
    margin-top: 20px;
  }
  .syl-input {
    text-align: center;
    height: 42px;
    font-size: 32px;
    font-family: 'ArialMS', Arial, sans-serif;
    margin-top: 8px;
    border: 2px solid #ccc;
    border-radius: 8px;
  }
  .syl-input:focus {
    outline: none;
    border-color: #8080ff;
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['input']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#800080; margin-top:20px; line-height:1.7;">
        The word
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['word']); ?>'</strong>
        has
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
        syllable<?php echo $cur['answer'] !== '1' ? 's' : ''; ?>.
    </p>
    <div class="syl-word-card"><?php echo htmlspecialchars($cur['sylldiv']); ?></div>
    <br>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="syl-word-card"><?php echo htmlspecialchars($q['word']); ?></div>
    <div class="syl-instruction">
        How many syllables does<br>the word above have?
    </div>

    <?php
        $digitCount    = max(1, strlen((string)$q['answer']));
        $inputWidthPx  = max(100, ($digitCount + 1) * 32 + 24);
        $inputMaxLen   = strlen((string)$q['answer']) + 1;
    ?>
    <br>
    <input type="text" name="answer" class="syl-input"
           style="width: <?php echo $inputWidthPx; ?>px;"
           maxlength="<?php echo $inputMaxLen; ?>"
           autocomplete="off">

    <br>
    <input type="submit" name="Submit1" value=" Submit " style="margin:30px 0;">&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
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