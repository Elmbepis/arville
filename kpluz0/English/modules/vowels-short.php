<?php
// english/modules/vowels-short.php
// STATIC word bank + image choice. Bypass QEngine per §D.
// Shows a noun image with the FIRST vowel blanked; click the correct vowel.
//
// Levels (§E — 2-level scheme): Easy / Hard
//   Easy = legacy Easy pool (short CVC words)
//   Hard = legacy Medium + legacy Hard merged (mixed-complexity words)
//   Rationale: Medium and Hard are phonetically similar; merging preserves
//   all legacy vocabulary while honouring the no-Medium rule.
//
// Choice count: 5 vowel images (a/e/i/o/u). Natural complete set — the 5
// vowels ARE the answer space. Explicit exception to §13.7 4-choice guarantee:
// dropping one vowel would leave a valid answer unclickable. Documented here.
//
// Image: english/images/nouns/{word}.jpg (validated via file_exists).
// Vowel tiles: english/images/vowel-{a,e,i,o,u}a.jpg.
// Theme: ex-24-* (110/582/108) &#8594; paper-69-* per §C fit test.
// Score box: score-*-3.
// DB row required: modules.url = 'vowels-short.php'

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

$moduleTitle = 'Finding the Short Vowel';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Word pools — Medium + Hard merged into Hard (§E)
$easyWords = ["bag","bat","bed","boy","bud","bug","bun","bus","cab","cap","car","cat","cop","cot","cup","dog","elf","fan","fat","fin","fox","gem","gum","ham","hat","hen","hip","hog","hug","hut","jam","jar","jet","jug","keg","kid","leg","let","lid","log","man","map","mat","men","mop","mug","net","nun","nut","pad","pan","peg","pen","pet","pig","pin","pot","pug","rag","ram","rat","rim","rug","sun","ten","tin","top","tot","toy","van","vat","web","yam"];
$mediumWords = ["band","barn","bell","bump","card","cart","crab","crib","desk","dish","doll","drum","duck","farm","flag","frog","hand","head","hill","hump","king","lamp","land","lips","lock","lump","mask","nest","pest","pond","pump","rest","rock","rust","sled","sock","tank","tent","twig","well","yard","yarn"];
$hardWords = ["block","bread","brick","brush","cactus","clock","dress","flock","glass","grass","prince","scarf","shelf","shrub","skink","skunk","snack","splash","spread","spring","stamp","stump","thread","thumb","trash","truck","watch","wrench","wrist"];

$wordsByLevel = [
    'Easy' => $easyWords,
    'Hard' => array_merge($mediumWords, $hardWords),
];
$words  = array_values(array_unique($wordsByLevel[$lvl]));
$vowels = ['a', 'e', 'i', 'o', 'u'];
$imgDirFs = __DIR__ . '/../../english/images/nouns/';

function pick_word_vowels($words, $sessionKey, $imgDirFs, $vowels) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = [];
    foreach ($words as $w) {
        if (in_array($w, $used, true)) continue;
        if (!file_exists($imgDirFs . $w . '.jpg')) continue;
        $hasVowel = false;
        for ($i = 0; $i < strlen($w); $i++) {
            if (in_array(strtolower($w[$i]), $vowels)) { $hasVowel = true; break; }
        }
        if ($hasVowel) $avail[] = $w;
    }
    if (empty($avail)) {
        foreach ($words as $w) {
            if (!file_exists($imgDirFs . $w . '.jpg')) continue;
            $hasVowel = false;
            for ($i = 0; $i < strlen($w); $i++) {
                if (in_array(strtolower($w[$i]), $vowels)) { $hasVowel = true; break; }
            }
            if ($hasVowel) $avail[] = $w;
        }
        $used = [];
    }
    if (empty($avail)) return null;
    $w = $avail[array_rand($avail)];
    $used[] = $w;
    if (count($used) > 100) $used = array_slice($used, -50);
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
    $word = pick_word_vowels($words, $sessionKey, $imgDirFs, $vowels);
    if ($word === null) $word = $words[0];

    // Find FIRST vowel (legacy blanks the first vowel)
    $blankPos = -1;
    $answer   = '';
    for ($i = 0; $i < strlen($word); $i++) {
        if (in_array(strtolower($word[$i]), $vowels)) {
            $blankPos = $i;
            $answer   = $word[$i];
            break;
        }
    }

    // All 5 vowel image buttons (natural answer space, §13.7 exception)
    $choiceItems = [];
    foreach ($vowels as $v) {
        $choiceItems[] = [
            'value' => $v,
            'image' => $base . '/english/images/vowel-' . $v . 'a.jpg',
            'alt'   => $v,
        ];
    }

    $_SESSION[$sessionKey]['current'] = [
        'word'        => $word,
        'blankPos'    => $blankPos,
        'image'       => $base . '/english/images/nouns/' . $word . '.jpg',
        'qmark'       => $base . '/english/images/blank-qmark.jpg',
        'answer'      => $answer,
        'choiceItems' => $choiceItems,
        'lvl'         => $lvl,
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
    <p style="font-size:16pt; color:#800080; margin-top:15px;">Give the missing vowel for this word.</p>
    <?php render_image_choices($q['choiceItems'], 'ansclick'); ?>
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