<?php
// english/modules/vowels-long.php
// STATIC word bank + choice. Bypass QEngine per §D.
// Shows a noun image with the FIRST (long) vowel blanked; click the correct vowel.
//
// Levels (§E — 2-level scheme): Easy / Hard
//   Easy = legacy Easy pool (words0)
//   Hard = legacy Medium + legacy Hard merged (words1 + words2)
//   Rationale: preserves all vocabulary while honouring the no-Medium rule.
//
// Choice layout: 4 single-letter vowel choices in ONE row (.letter-row).
// Manual anchors (§15 bypass) — render_choices' --choice-width sizing is too
// small for these visually-large letter tiles.
//
// Image: english/images/nouns/{word}.jpg (validated via file_exists).
// Theme: ex-26-* (75/655/70) but not in §8 "known to fit" list &#8594; paper-69-*.
// Score box: score-*-3 (matches legacy).
// DB row required: modules.url = 'vowels-long.php'

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

$moduleTitle = 'Finding the Long Vowel';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$easyWords = ["beak","bee","bike","bite","boar","boat","bone","bowl","cage","cake","coat","cone","deer","doe","ear","eat","eel","feet","five","gate","goat","hoe","jail","jeep","kite","mail","meal","meat","moat","nail","pail","peas","pie","play","pray","rake","read","rice","ride","road","rose","sail","sea","seal","seat","seed","suit","tail","tie","toad","toe","tube","weed"];
$medWords  = ["bait","bake","beads","beam","beans","beet","brain","chain","cheek","clean","cloak","coach","coal","crate","cream","creek","crow","cube","date","dike","drain","feast","feed","flea","foam","glove","grain","green","greet","heap","hear","heel","hike","leak","leap","leek","maid","peak","peel","pike","quail","queen","rail","reed","reel","roach","safe","seam","sheep","sheet","sleep","snail","stove","sweep","team","tear","toast","trail","train","whale","wheat","wheel"];
$hardWords = ["beast","braid","crane","fleet","foal","flute","fruits","gear","goal","grave","knight","plain","prunes","roast","screen","shave","sleet","spear","steel","stain","stairs","steam","steed","steer","stream","street","throat","throne","yeast"];

$wordsByLevel = [
    'Easy' => $easyWords,
    'Hard' => array_merge($medWords, $hardWords),
];
$words = array_values(array_unique($wordsByLevel[$lvl]));
$imgDirFs = __DIR__ . '/../../english/images/nouns/';

function pick_word_long($words, $sessionKey, $imgDirFs) {
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
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;
    return $w;
}

function find_first_vowel_pos($word) {
    for ($i = 0; $i < strlen($word); $i++) {
        if (in_array($word[$i], ['a','e','i','o','u'], true)) return $i;
    }
    return 0;
}

function render_word_blank_vowel($word, $blankPos, $qmarkUrl) {
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    for ($i = 0; $i < strlen($word); $i++) {
        if ($i === $blankPos) {
            $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;">'
                   . '<img src="' . htmlspecialchars($qmarkUrl) . '" style="height:60px;" alt="?"></td>';
        } else {
            $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;font-family:Arial,sans-serif;font-size:44pt;font-weight:600;color:#0000BB;line-height:1;">'
                   . htmlspecialchars($word[$i]) . '</td>';
        }
    }
    return $html . '</tr></table>';
}

function render_word_complete_vowel($word, $highlightPos) {
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    for ($i = 0; $i < strlen($word); $i++) {
        $color = ($i === $highlightPos) ? '#CC0066' : '#0000BB';
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
    $word = pick_word_long($words, $sessionKey, $imgDirFs);
    if ($word === null) $word = $words[0];

    $blankPos = find_first_vowel_pos($word);
    $answer   = $word[$blankPos];

    // 3 distinct vowel distractors from the other 4 vowels
    $others = array_values(array_diff(['a','e','i','o','u'], [$answer]));
    shuffle($others);
    $distractors = array_slice($others, 0, 3);

    $choices = array_merge([$answer], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'word'     => $word,
        'blankPos' => $blankPos,
        'image'    => $base . '/english/images/nouns/' . $word . '.jpg',
        'qmark'    => $base . '/english/images/blank-qmark.jpg',
        'answer'   => $answer,
        'choices'  => $choices,
        'lvl'      => $lvl,
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
    min-width: 100px;
    height: 100px;
    padding: 0 20px;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, sans-serif;
    font-size: 2.5rem;
    font-weight: 600;
    color: #0000BB;
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
    .letter-row { gap: 12px; }
    .letter-btn { min-width: 64px; height: 64px; font-size: 1.6rem; padding: 0 12px; }
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
        The word is <?php echo render_word_complete_vowel($cur['word'], $cur['blankPos']); ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">
        The long vowel is <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="<?php echo htmlspecialchars($q['word']); ?>"
         style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
         onerror="this.style.display='none';">
    <p style="margin:10px 0;"><?php echo render_word_blank_vowel($q['word'], $q['blankPos'], $q['qmark']); ?></p>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">Click on the missing long vowel.</p>

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