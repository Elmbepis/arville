<?php
// english/modules/rhyming-words.php
// STATIC rhyme-group bank + 4-choice. Bypass QEngine per §3.
// Two forms (preserved from legacy):
//   Form 1 (rhyme) — 75%: show word; click which of 4 choices rhymes with it.
//   Form 2 (doesn't rhyme) — 25% (only when grd &#8805; 1): show word; click which
//     of 4 choices does NOT rhyme with it.
//
// Levels (§5 — 2-level scheme, Medium+Hard merged):
//   Grade-keyed tier assignment (bank has 6 tiers, indices 0-5):
//     grd 0 &#8594; Easy: 0; Hard: rand(1,2)   [Medium=1, Hard=2]
//     grd 1 &#8594; Easy: 1; Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 2 &#8594; Easy: 2; Hard: rand(3,4)   [Medium=3, Hard=4]
//     grd 3+ &#8594; Easy: 3; Hard: rand(4,5)  [Medium=4, Hard=5]
//
// Data-fix flagged (§19/§29): legacy form-2 generation required a 5-word
//   rhyme group (word + 4 choices). Only group ["cub","dub","rub","tub"] in
//   tier 0 has 4 words — the legacy while-loop would have infinite-looped.
//   Form-2 generation here filters to groups with &#8805;5 words, excluding that
//   single group from form-2 only (form-1 unaffected).
//
// Choice layout (§14): 4 short words &#8594; 2×2 grid, uniform width per maxLen.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 2.
// Theme: ex-*-24 (75/655/70) &#8594; fits §8 &#8594; paper-69-* per English convention.
// Score box: score-*-3 (English default, matching synonyms.php/syn-ant-hom.php).
// DB row required: modules.url = 'rhyming-words.php'

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

$moduleTitle = 'Rhyming Words';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(5, max(0, (int)($_SESSION['grade'] ?? 2)));

// ============================================================
// BANK — tier &#8594; list of rhyme groups (all words in a group rhyme)
// ============================================================
$rhyms = [];

$rhyms[0] = [
    ["at", "bat", "cat", "fat", "hat", "mat", "pat", "rat", "sat", "vat"],
    ["cap", "gap", "map", "nap", "tap", "rap", "zap"],
    ["an", "can", "fan", "man", "pan", "ran", "tan", "van"],
    ["cub", "dub", "rub", "tub"],
    ["bar", "car", "far", "gar", "jar", "mar", "par", "tar"],
    ["cam", "dam", "ham", "jam", "ram"],
    ["bin", "fin", "in", "kin", "pin", "sin", "tin"],
    ["bit", "fit", "hit", "it", "kit", "lit", "pit", "sit"],
    ["bet", "get", "jet", "let", "met", "net", "pet", "set", "wet"],
    ["bad", "fad", "had", "lad", "mad", "pad", "sad"],
];

$rhyms[1] = [
    ["flat", "spat", "squat", "swat", "that", "vat", "what"],
    ["cap", "gap", "map", "nap", "tap", "zap", "chap", "clap", "flap", "slap", "snap", "strap", "trap", "wrap"],
    ["and", "band", "hand", "land", "sand", "stand", "wand"],
    ["bran", "clan", "flan", "plan", "scan", "span"],
    ["are", "bar", "car", "far", "jar", "tar", "star", "scar"],
    ["clam", "cram", "gram", "tram", "slam", "pram"],
    ["bite", "kite", "mite", "site", "white", "write"],
    ["king", "ring", "sing", "wing", "bring", "thing"],
    ["bard", "card", "lard", "hard", "yard", "guard"],
    ["ball", "call", "mall", "hall", "tall", "wall", "small", "stall"],
    ["bake", "fake", "lake", "make", "rake", "take"],
    ["been", "chin", "shin", "spin", "thin", "twin"],
    ["art", "cart", "dart", "mart", "part", "tart", "wart"],
    ["end", "bend", "fend", "lend", "mend", "send", "tend"],
    ["bold", "fold", "gold", "hold", "mold", "sold"],
];

$rhyms[2] = [
    ["brand", "bland", "gland", "grand", "hand", "stand"],
    ["fail", "hail", "mail", "male", "nail", "pail", "rail", "sail", "scale", "snail", "tale", "trail", "whale"],
    ["bran", "clan", "flan", "plan", "scan", "span", "began", "sedan"],
    ["born", "corn", "horn", "mourn", "thorn", "worn"],
    ["bring", "thing", "cling", "sting", "swing", "spring", "string"],
    ["boar", "door", "floor", "shore", "snore", "wore", "your"],
    ["bite", "cite", "kite", "mite", "site", "fight", "night", "might", "right", "tight", "white", "write"],
    ["held", "meld", "weld", "yelled", "smelled", "spelled"],
    ["chap", "clap", "flap", "slap", "snap", "strap", "trap", "wrap"],
    ["brake", "break", "flake", "quake", "snake", "steak", "awake", "mistake"],
    ["end", "bend", "fend", "lend", "mend", "send", "tend"],
];

$rhyms[3] = [
    ["banned", "manned", "scanned", "command", "demand", "expand", "strand", "unhand"],
    ["stale", "scale", "snail", "whale", "detail", "email"],
    ["cupcake", "mistake", "pancake", "intake", "remake", "snowflake"],
    ["bazaar", "crowbar", "sandbar", "guitar", "jaguar", "sitar"],
    ["bring", "cling", "fling", "sling", "sting", "spring", "string", "swing", "thing"],
    ["bright", "fight", "fright", "knight", "night", "might", "right", "tight", "white", "write", "delight", "tonight"],
    ["attend", "blend", "extend", "offend", "penned", "spend", "trend"],
    ["blade", "braid", "clade", "grade", "played", "prayed", "spade", "stayed"],
    ["admit", "armpit", "cockpit", "misfit", "outfit", "submit", "tidbit"],
    ["chill", "drill", "grill", "krill", "skill", "spill", "still", "thrill"],
    ["board", "bored", "chord", "floored", "horde", "scored", "stored", "sword"],
];

$rhyms[4] = [
    ["command", "demand", "disband", "expand", "farmland", "quicksand", "understand"],
    ["backache", "daybreak", "earthquake", "headache", "keepsake", "handshake", "heartbreak", "snowflake"],
    ["bright", "daylight", "delight", "eyesight", "fright", "knight", "tonight"],
    ["appall", "install", "nightfall", "football", "rainfall", "recall"],
    ["airmail", "curtail", "detail", "female", "handrail", "inhale", "toenail"],
    ["anthill", "distill", "downhill", "fulfill", "landfill", "refill", "sawmill"],
    ["abode", "boatload", "download", "episode", "explode", "erode", "payload"],
    ["attend", "contend", "defend", "descend", "extend", "intend", "offend"],
    ["arcade", "brigade", "cascade", "decade", "delayed", "displayed", "invade", "prepaid"],
    ["airplane", "attain", "contain", "insane", "obtain", "sprain", "unchain"],
];

$rhyms[5] = [
    ["ampersand", "contraband", "grandstand", "hinterland", "newsstand", "wasteland", "withstand"],
    ["bellyache", "earthquake", "keepsake", "heartbreak", "namesake", "outbreak", "partake", "sweepstake"],
    ["appetite", "copyright", "dynamite", "gigabyte", "oversight", "reunite", "satellite"],
    ["aerosol", "alcohol", "butterball", "coverall", "stonewall", "volleyball", "waterfall"],
    ["dovetail", "fingernail", "large-scale", "monorail", "thumbnail", "wholesale"],
    ["anthill", "distill", "daffodil", "goodwill", "standstill", "treadmill", "windmill"],
    ["borrowed", "corrode", "episode", "explode", "shipload", "workload", "railroad"],
    ["apprehend", "comprehend", "dividend", "descend", "extend", "suspend", "transcend"],
    ["motorcade", "barricade", "centigrade", "serenade", "lemonade", "marinade", "masquerade", "unafraid"],
    ["annoyed", "asteroid", "destroyed", "employed", "humanoid", "celluloid", "paranoid"],
    ["abstain", "campaign", "complain", "entertain", "hurricane", "membrane", "sugarcane"],
];

// ============================================================
// TIER SELECTION (2-level scheme)
// ============================================================
$grdKey = min(3, $grd);
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
    $groups = $rhyms[$arrnum];
    $groupCount = count($groups);

    $usedKey = 'used_' . $arrnum;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    // Form distribution: 75% rhyme, 25% doesn't-rhyme (only when grd &#8805; 1)
    $form = 1;
    if ($grd >= 1 && rand(1, 4) === 1) $form = 2;

    $word = ''; $answer = ''; $choices = [];
    $attempts = 0;
    do {
        if ($form === 1) {
            $gIdx = rand(0, $groupCount - 1);
            $g    = $groups[$gIdx];
            if (count($g) < 2) { $attempts++; continue; }
            $i1 = array_rand($g);
            $tries = 0;
            do { $i2 = array_rand($g); $tries++; } while ($i2 === $i1 && $tries < 20);
            $word   = $g[$i1];
            $answer = $g[$i2];

            // 3 distractors from 3 distinct other groups
            $otherIdxs = [];
            for ($i = 0; $i < $groupCount; $i++) if ($i !== $gIdx) $otherIdxs[] = $i;
            shuffle($otherIdxs);
            $distractors = [];
            foreach ($otherIdxs as $oi) {
                if (count($distractors) >= 3) break;
                $distractors[] = $groups[$oi][array_rand($groups[$oi])];
            }
            if (count($distractors) < 3) { $attempts++; continue; }
            $choices = array_merge([$answer], $distractors);
            $qKey = "rh-{$arrnum}-{$gIdx}-" . min($i1, $i2) . "-" . max($i1, $i2);
        } else {
            // form 2: need a group with &#8805; 5 words (word + 4 distinct choices from same group)
            $candidates = [];
            foreach ($groups as $g => $ws) if (count($ws) >= 5) $candidates[] = $g;
            if (empty($candidates)) { $form = 1; $attempts++; continue; }
            $gIdx = $candidates[array_rand($candidates)];
            $g    = $groups[$gIdx];

            // word + 3 rhyme choices from same group
            $picks = [];
            $gTries = 0;
            while (count($picks) < 4 && $gTries < 50) {
                $w = $g[array_rand($g)];
                if (!in_array($w, $picks, true)) $picks[] = $w;
                $gTries++;
            }
            if (count($picks) < 4) { $form = 1; $attempts++; continue; }
            $word = $picks[0];
            $rhymeChoices = [$picks[1], $picks[2], $picks[3]];

            // 1 non-rhymer from a different group (the correct answer)
            $otherIdxs = [];
            for ($i = 0; $i < $groupCount; $i++) if ($i !== $gIdx) $otherIdxs[] = $i;
            if (empty($otherIdxs)) { $form = 1; $attempts++; continue; }
            $oi = $otherIdxs[array_rand($otherIdxs)];
            $answer = $groups[$oi][array_rand($groups[$oi])];

            $choices = array_merge($rhymeChoices, [$answer]);
            $qKey = "nr-{$arrnum}-{$gIdx}-" . md5($word . '|' . $answer);
        }
        $attempts++;
    } while (in_array($qKey, $used, true) && $attempts < 100);

    $used[] = $qKey;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey][$usedKey] = $used;

    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'word'    => $word,
        'answer'  => $answer,
        'choices' => $choices,
        'lvl'     => $lvl,
        'form'    => $form,
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
  .rhw-row {
    --choice-width: 9em;
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: stretch;
    gap: 18px;
    margin: 18px auto;
  }
  .rhw-grid-2x2 {
    --choice-width: 9em;
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
  }
  .rhw-grid-1col {
    --choice-width: 14em;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .rhw-choice {
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
    font-size: 1.3rem;
    font-weight: 700;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .rhw-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .rhw-word-card {
    font-family: 'ArialMS', Arial, sans-serif;
    text-align: center;
    margin: 20px auto;
  }
  .rhw-word {
    display: inline-block;
    background: #fefbde;
    border: 2px solid #9f2601;
    border-radius: 10px;
    padding: 15px 40px;
    font-size: 2rem;
    font-weight: 700;
    color: #0000BB;
  }
  .rhw-instruction {
    display: block;
    color: #800080;
    font-size: 1.35rem;
    font-weight: 700;
    line-height: 1.5;
    margin-top: 20px;
  }
  .rhw-click-prompt {
    display: block;
    color: #666;
    font-size: 1.15rem;
    font-weight: 500;
    margin-top: 8px;
  }
  @media (max-width: 600px) {
    .rhw-grid-2x2 { grid-template-columns: 1fr 1fr; gap: 10px 14px; }
    .rhw-grid-2x2 .rhw-choice { width: 100%; }
    .rhw-choice { font-size: 0.95rem; padding: 9px 12px; }
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
        <?php if ($cur['form'] === 1): ?>
            The word <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>
            is the word that<br/>rhymes with the word
            <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['word']); ?>'</strong>.
        <?php else: ?>
            The word <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>
            is the word that<br/>doesn't rhyme with the word
            <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['word']); ?>'</strong>.
        <?php endif; ?>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="rhw-word-card">
        <span class="rhw-word">'<?php echo htmlspecialchars($q['word']); ?>'</span>
        <span class="rhw-instruction">
            <?php if ($q['form'] === 1): ?>
                Click on the word that rhymes<br>with the word above.
            <?php else: ?>
                Click on the word that does NOT<br>rhyme with the word above.
            <?php endif; ?>
        </span>
        <span class="rhw-click-prompt">Click on your answer.</span>
    </div>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        if ($maxLen > 20)      $containerClass = 'rhw-grid-1col';
        elseif ($maxLen >= 5)  $containerClass = 'rhw-grid-2x2';
        else                   $containerClass = 'rhw-row';
    ?>
    <div class="<?php echo $containerClass; ?>" style="--choice-width: <?php echo $choiceWidthEm; ?>em;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="rhw-choice">
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