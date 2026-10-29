<?php
// english/modules/blend-start.php
// STATIC word bank + choice. Bypass QEngine per §D.
// Shows a noun image with the first two-letter consonant blend blanked;
// click the correct blend.
//
// Levels (§E — 2-level scheme): Easy / Hard
//   Legacy mapped its 3 radio levels to $grd / $grd+1 / $grd+2. Collapsed to
//   2 levels (no Medium rule) preserving the $grd-driven tiering:
//     Easy = arrnum from $grd        (legacy Easy)
//     Hard = arrnum from $grd + 2    (legacy Hard)
//   The legacy Medium ($grd+1) tier is dropped per §5.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Choice layout: 4 blend choices in ONE row (.letter-row). Manual anchors
// (§15 bypass) — render_choices' sizing is inadequate for these large tiles.
//
// Image: english/images/phonics/{word}.jpg (validated via file_exists).
// Theme: ex-29-* (110/582/108) &#8594; paper-69-* per §8 fit test.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'blend-start.php'

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

$moduleTitle = "Words with a 'Blend' Beginning";
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = (int)($_SESSION['grade'] ?? 5);

$pools = [
    0 => ["bread","clam","clap","clay","clip","clock","clown","crab","crib","crow","cry","dress","drum","flag","fly","frog","glass","glue","grass","pray","sled","sleep","snail","snake","snow","spoon","star","stone","stick","train","tray","truck"],
    1 => ["brain","bread","brick","broom","clam","clap","cloak","clock","cloud","clown","crab","crib","crow","crown","dress","drum","flag","flame","flood","frame","fries","frog","fruits","glass","glove","glue","grape","grass","pray","scarf","smile","snack","snail","snake","snow","spoon","stairs","stamp","stick","stone","stove","train","truck","twig"],
    2 => ["braid","brick","bridge","brook","broom","claws","cloak","closet","clothes","cloud","crayons","crane","crown","drake","dress","flame","flea","flock","flood","flower","flute","frame","fries","fruits","glove","grape","grave","prince","princess","scalp","scarf","skunk","smile","snack","spear","spider","spring","stairs","stall","stamp","steel","stone","stork","storm","stove","tractor","trail","twig"],
    3 => ["bridge","brook","cliff","clones","cradle","crate","crayfish","crevice","cricket","crochet","crocodile","crown","crutch","driver","flame","flashlight","flamingo","flock","flower","flute","grave","ground","prince","princess","prunes","scalp","scooter","scorpion","skunk","sleep","sleet","slipper","sloth","snake","spear","spider","spoon","spread","spring","stairs","steam","steed","steel","stork","stalk","storm","stove","stump","swamp","tractor","trail","trident"],
];

// §10 grade-keyed config: Easy = $grd, Hard = $grd + 2 (clamped 0-3)
$offset = ($lvl === 'Hard') ? 2 : 0;
$arrnum = min(3, max(0, $grd + $offset));

$words = $pools[$arrnum];
$imgDirFs = __DIR__ . '/../../english/images/phonics/';

function pick_word_blend($words, $sessionKey, $imgDirFs) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = [];
    foreach ($words as $w) {
        if (!in_array($w, $used, true) && file_exists($imgDirFs . $w . '.jpg')) {
            $avail[] = $w;
        }
    }
    if (empty($avail)) {
        foreach ($words as $w) {
            if (file_exists($imgDirFs . $w . '.jpg')) $avail[] = $w;
        }
        $used = [];
    }
    if (empty($avail)) return null;
    $w = $avail[array_rand($avail)];
    $used[] = $w;
    if (count($used) > 100) $used = array_slice($used, -60);
    $_SESSION[$sessionKey]['used'] = $used;
    return $w;
}

function render_word_blank_start($word, $qmarkUrl) {
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;">'
           . '<img src="' . htmlspecialchars($qmarkUrl) . '" style="height:60px;" alt="?"></td>';
    for ($i = 2; $i < strlen($word); $i++) {
        $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;font-family:Arial,sans-serif;font-size:44pt;font-weight:600;color:#BB0038;line-height:1;">'
               . htmlspecialchars($word[$i]) . '</td>';
    }
    return $html . '</tr></table>';
}

function render_word_complete_start($word, $blendLen = 2) {
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    for ($i = 0; $i < strlen($word); $i++) {
        $color = ($i < $blendLen) ? '#CC0066' : '#BB0038';
        $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;font-family:Arial,sans-serif;font-size:44pt;font-weight:600;color:' . $color . ';line-height:1;">'
               . htmlspecialchars($word[$i]) . '</td>';
    }
    return $html . '</tr></table>';
}

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
    $word = pick_word_blend($words, $sessionKey, $imgDirFs);
    if ($word === null) $word = $words[0];

    $answer = substr($word, 0, 2);

    // 3 distinct blend distractors from the pool
    $blends = ["bl","br","cl","cr","dr","fl","fr","gl","gr","pl","pr","sc","sn","sp","st","tr"];
    $availBlends = array_values(array_diff($blends, [$answer]));
    shuffle($availBlends);
    $distractors = array_slice($availBlends, 0, 3);

    $choices = array_merge([$answer], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'word'    => $word,
        'image'   => $base . '/english/images/phonics/' . $word . '.jpg',
        'qmark'   => $base . '/english/images/blank-qmark2.jpg',
        'answer'  => $answer,
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
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .letter-row {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    gap: 24px;
    margin: 20px auto;
  }
  .letter-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 120px;
    height: 100px;
    padding: 0 24px;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, sans-serif;
    font-size: 2.2rem;
    font-weight: 600;
    color: #BB0038;
    text-decoration: none;
    line-height: 1;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .letter-btn:hover {
    background: #f8f8ff;
    border-color: #8080ff;
  }
  @media (max-width: 820px) {
    .letter-row { gap: 10px; }
    .letter-btn { min-width: 72px; height: 72px; font-size: 1.4rem; padding: 0 14px; }
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="<?php echo htmlspecialchars($cur['word']); ?>"
         style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
         onerror="this.style.display='none';">
    <p style="font-size:15pt; color:#800080; margin-top:10px;">
        The word is <?php echo render_word_complete_start($cur['word'], 2); ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">
        The blend is <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="<?php echo htmlspecialchars($q['word']); ?>"
         style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
         onerror="this.style.display='none';">
    <p style="margin:10px 0;"><?php echo render_word_blank_start($q['word'], $q['qmark']); ?></p>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">Click on the letter blend that begins this word.</p>

    <div class="letter-row">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="letter-btn">
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