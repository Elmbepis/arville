<?php
// english/modules/last-letters.php
// STATIC word bank + choice. Bypass QEngine per §D.
// Shows a noun image with the last letter blanked; click the correct last letter.
//
// Levels (§E — 2-level scheme): Easy / Hard
//   Easy = legacy Easy pool (short CVC words)
//   Hard = legacy Medium + legacy Hard merged (mixed-complexity words)
//   Rationale: Medium and Hard are phonetically similar (both CCVCC / mixed blends);
//   merging preserves all legacy vocabulary while honouring the no-Medium rule.
//
// Choice layout: single-letter choices render 4-across in ONE row (.letter-row).
// 2×2 (.letter-grid-2x2) only activates when a choice string is long enough
// that 4-across would not fit (maxLen &#8805; 5). Never produces 3-on-top + 1-below.
// `render_choices` is bypassed (§15) because its --choice-width sizing is too
// small for these visually-large letter tiles.
//
// Image: english/images/nouns/{word}.jpg (validated via file_exists).
// Theme: ex-29-* (110/582/108) &#8594; paper-69-* per §C fit test.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'last-letters.php'

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

$moduleTitle = "What's the Last Letter?";
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Word pools — Medium + Hard merged into Hard (§E)
$easyWords = ["bag","bat","bed","bee","boy","bug","bun","bus","cake","cap","car","cat","cup","doe","dog","ear","fan","fox","gum","ham","hat","hen","hog","hug","hut","jam","jar","leg","man","mop","mug","net","nut","pan","pen","pie","pig","pot","rag","rat","sun","ten","tin","top","toy"];
$mediumWords = ["apple","bag","bat","bee","bell","bike","boat","bone","bug","bun","bus","cake","coat","cone","cop","cot","deer","doe","doll","duck","ear","eat","eel","elf","fan","fat","feet","fish","five","fox","goat","gem","gum","ham","hip","hoe","hog","hug","hut","ice","jam","jar","jeep","jet","jug","keg","kite","lamb","leg","log","mail","map","mat","meat","mop","mug","nail","net","nun","nut","pail","pan","peas","pen","pet","pie","pin","pot","rag","ram","read","rice","rose","rug","sea","seal","seed","sock","star","tail","ten","tie","tin","toad","toes","top","van","web"];
$hardWords = ["apple","bake","banana","band","barn","beads","beak","beans","bell","bike","bird","boat","bone","bowl","cake","card","cart","coat","cone","cube","date","deer","desk","dike","dish","duck","farm","feet","five","flag","fork","frog","gate","goat","hand","hear","heel","hill","hump","jail","jeep","king","kite","kitten","lamb","lamp","lips","lock","mail","mask","meal","meat","nail","nest","orange","pail","peas","pencil","pond","puppy","quail","queen","read","rice","road","rock","rose","sail","seal","seed","sleep","snail","snake","sock","spoon","star","table","tail","tank","tiger","toad","toes","train","tree","well","whale","wheel"];

$wordsByLevel = [
    'Easy' => $easyWords,
    'Hard' => array_merge($mediumWords, $hardWords),
];
$words = array_values(array_unique($wordsByLevel[$lvl]));
$imgDirFs = __DIR__ . '/../../english/images/nouns/';

function pick_word_last($words, $sessionKey, $imgDirFs) {
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

function render_word_blank($word, $blankPos, $qmarkUrl) {
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

function render_word_complete($word, $highlightPos) {
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
    $word = pick_word_last($words, $sessionKey, $imgDirFs);
    if ($word === null) $word = $words[0];

    $blankPos = strlen($word) - 1;
    $answer   = $word[$blankPos];

    // 3 distinct random letters (4-choice guarantee §13.7)
    $distractors = [];
    $safety = 0;
    while (count($distractors) < 3 && $safety < 100) {
        $letter = chr(rand(97, 122));
        $safety++;
        if ($letter === $answer) continue;
        if (in_array($letter, $distractors, true)) continue;
        $distractors[] = $letter;
    }
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
  /* Single-row layout — default for short choices (single letters).
     flex-wrap: nowrap guarantees 4-across; the mobile media query below
     shrinks the tiles so 4×64 + 3×12 = 292px fits even on ~300px viewports. */
  .letter-row {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    gap: 24px;
    margin: 20px auto;
  }
  /* 2×2 grid — fallback ONLY when a choice is long enough that 4-across
     would not fit (maxLen &#8805; 5). Never produces 3-on-top + 1-below. */
  .letter-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 16px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .letter-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: 100px;
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
    .letter-btn { width: 64px; height: 64px; font-size: 1.6rem; }
    .letter-grid-2x2 { gap: 12px 16px; }
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
        The word is <?php echo render_word_complete($cur['word'], $cur['blankPos']); ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="<?php echo htmlspecialchars($q['word']); ?>"
         style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
         onerror="this.style.display='none';">
    <p style="margin:10px 0;"><?php echo render_word_blank($q['word'], $q['blankPos'], $q['qmark']); ?></p>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">Click on the last letter of this word.</p>

    <?php
        // §14 layout rule: maxLen &#8804; 4 &#8594; 1-row (4-across); maxLen &#8805; 5 &#8594; 2×2.
        // Single-letter choices (this module) always hit the 1-row branch.
        $plainLens = [];
        foreach ($q['choices'] as $c) $plainLens[] = strlen(strip_tags((string)$c));
        $maxLen  = max($plainLens);
        $use2x2  = ($maxLen >= 5);
        $containerClass = $use2x2 ? 'letter-grid-2x2' : 'letter-row';
    ?>

    <div class="<?php echo $containerClass; ?>">
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