<?php
// english/modules/compound-words.php
// FIB + image choice. Bypass QEngine per §D.
// Shows two pictures; student types the compound word they form (no hyphen).
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Easy = legacy Easy (tier 1, simpler compounds).
//   Hard = union of legacy Medium (tier 2) + legacy Hard (tier 3) — rand pick.
//
// Answer canonicalization: lowercase, all whitespace and hyphens stripped.
// So "angel-fish", "Angel Fish", "angelfish", "AngelFish" all score the same.
//
// Image validation (§21): BOTH src images must exist; 30-attempt loop;
// "Temporarily unavailable" fallback if none resolve.
//
// $grd not used by this module (legacy was purely level-driven).
//
// Theme: ex-*-012 &#8594; not in §8 fit list &#8594; paper-69-*.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'compound-words.php'

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

$moduleTitle = 'Compound Words';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$bank = [];
$bank[1] = [
    "angel-fish","arm-chair","back-yard","bath-robe","bath-room","bath-tub","box-car","blue-bell","blue-bird","bull-dog","bull-frog","butter-cup",
    "butter-fly","cat-fish","cow-boy","cow-girl","cup-cake","dog-fish","dog-house","door-bell","door-man","door-mat","eye-ball","fire-fly","fire-man",
    "fire-wood","fish-bowl","foot-ball","frog-man","gold-fish","gun-fire","hand-bag","hand-book","horse-back","horse-man","horse-fly","horse-shoe",
    "house-fly","jaw-bone","mail-box","mail-man","man-hole","oil-can","pen-knife","pin-wheel","pan-cake","pea-nut","pig-pen","pig-tail","red-head",
    "red-wood","sea-horse","sea-shell","sea-weed","snow-ball","tea-cup","tea-pot","toe-nail","tree-top","watch-dog","water-bed","white-fish",
    "yard-stick",
];
$bank[2] = [
    "apple-sauce","back-hand","back-hoe","back-log","back-pack","back-space","barn-yard","basket-ball","bed-post","bed-rock","bed-time","bell-flower",
    "black-berry","black-bird","black-board","blue-berry","book-mark","book-worm","butter-fingers","butter-milk","chair-man","cross-road","door-step",
    "door-stop","door-way","drum-stick","ear-drum","ear-phone","ear-ring","egg-plant","egg-shell","finger-nail","fire-arm","fire-boat","fish-hook",
    "flag-pole","flower-bed","flower-pot","foot-note","foot-rest","foot-step","foot-wear","green-house","hair-brush","hand-ball","head-phone",
    "hog-wash","horn-bill","horse-play","horse-radish","house-boat","key-hole","knee-cap","lady-bird","lady-bug","peanut-butter","pot-hole","ring-worm",
    "sail-boat","sail-fish","sand-bag","sand-box","sand-man","sand-paper","sheep-dog","shell-fish","shoe-horn","shoe-lace","stop-watch","sun-flower",
    "tea-spoon","toad-stool","tooth-brush","tooth-paste","water-fall","work-bench","work-book","work-man","work-room","work-table",
];
$bank[3] = [
    "arrow-head","back-ground","barn-storm","bench-mark","bill-board","brain-storm","brain-wash","button-hole","candle-stick","card-board","cart-wheel",
    "chair-woman","chest-nut","chick-pea","clock-work","cork-screw","corn-flower","cotton-mouth","crab-grass","cross-bow","cross-walk","desk-top",
    "dragon-fly","earth-worm","eye-glasses","eye-lid","foot-stool","fox-hole","frame-work","grape-vine","grass-roots","hair-line","head-board",
    "head-dress","head-hunter","head-stone","inch-worm","key-board","key-stone","log-book","lung-fish","nut-shell","paper-back","pepper-corn","pick-pocket",
    "pigeon-hole","pipe-fish","pin-point","pipe-line","pocket-book","pocket-knife","pole-cat","pole-star","post-card","quarter-back","rattle-snake",
    "road-runner","screw-driver","straw-berry","stream-line","street-car","sun-fish","sun-glasses","sword-fish","table-spoon","tape-worm","thigh-bone",
    "thumb-nail","time-table","tooth-pick","turtle-neck","waist-coat","waist-line","watch-dog","wheel-chair","wrist-watch","water-fowl","water-melon",
];

// Level &#8594; tier: Easy = 1; Hard = rand(2, 3)  (union of Medium + Hard)
if ($lvl === 'Easy') $arrnum = 1;
else                 $arrnum = rand(2, 3);

$imgDirFs = __DIR__ . '/../../english/images/compound-word-pics/';
$imgDir   = $base . '/english/images/compound-word-pics/';

// ------------------------------------------------------------------
// Score handler (FIB canonicalization)
// ------------------------------------------------------------------
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = (string)($_POST['answer'] ?? '');
    // Canonical: lowercase + strip all whitespace + strip hyphens
    $userCanon = strtolower(preg_replace('/[\s\-]+/', '', $raw));
    $corCanon  = strtolower(preg_replace('/[\s\-]+/', '', $cur['answer']));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($userCanon, $corCanon, $cur['lvl']);

    $result = ['correct' => $isCorrect, 'userInput' => $raw, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ------------------------------------------------------------------
// Theme
// ------------------------------------------------------------------
$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];

// ------------------------------------------------------------------
// Generate
// ------------------------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $pool = $bank[$arrnum];
    $usedKey = 'used_' . $arrnum;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    $chosen = null;
    $safety = 0;
    $attempts = 0;
    while ($chosen === null && $attempts < 30) {
        $attempts++;
        $idx = rand(0, count($pool) - 1);
        if (in_array($idx, $used, true) && $safety < 40) { $safety++; continue; }
        $entry = $pool[$idx];
        $p = strpos($entry, '-');
        if ($p === false) continue;
        $w1 = substr($entry, 0, $p);
        $w2 = substr($entry, $p + 1);
        if (!file_exists($imgDirFs . $w1 . '.jpg')) continue;
        if (!file_exists($imgDirFs . $w2 . '.jpg')) continue;
        $chosen = ['idx' => $idx, 'w1' => $w1, 'w2' => $w2];
    }

    if ($chosen === null) {
        // Fallback: ignore $used, re-scan without repeat filter
        for ($i = 0; $i < count($pool); $i++) {
            $entry = $pool[$i];
            $p = strpos($entry, '-');
            if ($p === false) continue;
            $w1 = substr($entry, 0, $p);
            $w2 = substr($entry, $p + 1);
            if (!file_exists($imgDirFs . $w1 . '.jpg')) continue;
            if (!file_exists($imgDirFs . $w2 . '.jpg')) continue;
            $chosen = ['idx' => $i, 'w1' => $w1, 'w2' => $w2];
            break;
        }
    }

    if ($chosen === null) {
        render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
        echo '<p style="text-align:center; font-size:16pt; margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $used[] = $chosen['idx'];
    if (count($used) > 100) $used = array_slice($used, -60);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $answer = $chosen['w1'] . $chosen['w2'];

    $_SESSION[$sessionKey]['current'] = [
        'word1'  => $chosen['w1'],
        'word2'  => $chosen['w2'],
        'answer' => $answer,
        'lvl'    => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ------------------------------------------------------------------
// Render
// ------------------------------------------------------------------
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .cw-images-row {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin: 20px auto;
    flex-wrap: wrap;
  }
  .cw-images-row img {
    border: 1px solid #ccc;
    border-radius: 8px;
    max-width: 220px;
    height: auto;
  }
  .cw-plus {
    font-family: 'Arial', Arial, sans-serif;
    font-size: 2.4rem;
    font-weight: 700;
    color: #AA0077;
    line-height: 1;
  }
  .cw-input-row {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin: 30px auto;
    flex-wrap: wrap;
  }
  .cw-equals {
    font-family: 'Arial', Arial, sans-serif;
    font-size: 2.4rem;
    font-weight: 700;
    color: #AA0077;
    line-height: 1;
  }
  .cw-input {
    text-align: center;
    height: 50px;
    font-family: 'Arial', Arial, sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #0000BB;
    border: 2px solid #b0b0d8;
    border-radius: 10px;
    background: #fff;
    padding: 0 16px;
    box-sizing: border-box;
    text-transform: lowercase;
  }
  .cw-input:focus { outline: none; border-color: #8080ff; background: #f8f8ff; }
  .cw-feedback {
    max-width: 600px;
    margin: 20px auto;
    font-family: 'Arial', 'Segoe UI', sans-serif;
    font-size: 1.1rem;
    line-height: 1.65;
    text-align: center;
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['userInput']); ?>'</strong>.</p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>

    <div class="cw-images-row">
        <img src="<?php echo htmlspecialchars($imgDir . $cur['word1'] . '.jpg'); ?>" alt="<?php echo htmlspecialchars($cur['word1']); ?>" onerror="this.style.display='none';">
        <span class="cw-plus">+</span>
        <img src="<?php echo htmlspecialchars($imgDir . $cur['word2'] . '.jpg'); ?>" alt="<?php echo htmlspecialchars($cur['word2']); ?>" onerror="this.style.display='none';">
    </div>

    <div class="cw-feedback">
        <p>The first picture stands for <strong style="color:#0000CC;">'<?php echo htmlspecialchars($cur['word1']); ?>'</strong>.</p>
        <p>The second picture stands for <strong style="color:#0000CC;">'<?php echo htmlspecialchars($cur['word2']); ?>'</strong>.</p>
        <p>The compound word is therefore <strong style="color:#CC0066; font-size:1.2rem;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.</p>
    </div>

    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="cw-images-row">
        <img src="<?php echo htmlspecialchars($imgDir . $q['word1'] . '.jpg'); ?>" alt="" onerror="this.style.display='none';">
        <span class="cw-plus">+</span>
        <img src="<?php echo htmlspecialchars($imgDir . $q['word2'] . '.jpg'); ?>" alt="" onerror="this.style.display='none';">
    </div>

    <div class="cw-input-row">
        <span class="cw-equals">=</span>
        <?php $inputWidth = max(200, (strlen($q['answer']) + 4) * 20); ?>
        <input type="text" name="answer" class="cw-input"
               style="width: <?php echo $inputWidth; ?>px;"
               maxlength="<?php echo strlen($q['answer']) + 4; ?>"
               autocomplete="off" autofocus>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit1" value="Submit" style="margin:0 10px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:0 10px;">
    </div>
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