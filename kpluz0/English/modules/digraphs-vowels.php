<?php
// english/modules/digraphs-vowels.php
// STATIC word bank + choice. Bypass QEngine per §D.
// Shows a word (or sentence fill) with the vowel digraph blanked;
// click the correct 2-letter vowel digraph.
//
// Levels (§E — 2-level scheme): Easy / Hard
//   Easy = image questions. Pool by $grd:
//     grd<=1 &#8594; tier0 images (beads, sheep, spoon, …)  [legacy Easy]
//     grd>1  &#8594; tier1 images (beetle, cheese, wheat, …) [legacy Medium/Easy]
//   Hard = sentence questions. Pool by $grd:
//     grd<=1 &#8594; tier2 sentences (beach, clean, …)  [legacy Medium/Hard]
//     grd>1  &#8594; tier2 sentences (same as grd<=1)    [legacy Medium/Hard]
//
// Preserved legacy $grd tiering; collapsed 3 radio levels to 2 by making
// "Easy = image, Hard = sentence" the differentiation axis. Legacy grd>1
// Easy was pure sentence — now image. Documented as accepted behavior change.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Answer detection: first vowel digraph (ea, ee, oa, oe, oo, ou, ue, ui) in
// the word. Display blanks only that position (legacy blanked all — no pool
// word in this bank has two vowel digraphs).
//
// Choice layout: 4 digraph choices in ONE row (.letter-row). Manual anchors
// (§15 bypass).
//
// Image: english/images/phonics/{word}.jpg (validated via file_exists).
// Theme: ex-24-* &#8594; paper-69-* per §8 fit test.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'digraphs-vowels.php'

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

$moduleTitle = 'Vowel Digraphs';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = (int)($_SESSION['grade'] ?? 5);

// Image pools (tier 0 and tier 1)
$images_t0 = ["beads","beak","beans","bear","beef","boar","books","boot","bread","broom","cook","deer","feet","food","leaf","leap","meal","meat","moon","pear","peas","read","seal","seeds","sheep","shoe","sleep","soup","spoon","tree","trees","wood","wheel"];
$images_t1 = ["beet","beetle","beard","board","cheek","cheese","coop","fruits","glue","goose","groom","group","hoof","hook","hoop","leash","leaves","peach","roots","seam","sleep","wheat","wheel"];

// Sentence pools (word|sentence pairs, tier 2 — hard sentences)
$sentences_t2 = [
    "beach-We went to the ____ last Sunday.",
    "beams-Do you see the ____ of light over there?",
    "clean-Did you ____ your shoes this morning?",
    "feel-Their teacher does not ____ well today.",
    "keeps-Dennis ____ many toys in his room.",
    "looks-Tommy ____ tired today.",
    "means-Your gift ____ a lot to me.",
    "meek-Her friend is a very ____ and quiet person.",
    "meet-I really want to ____ your teacher.",
    "mood-Are you in the ____ to play this game?",
    "needs-My friend ____ some help with his studies.",
    "nook-Fred found his missing toy in that dark ____.",
    "read-We ____ a lot of good books in class.",
    "search-Let us ____ for the missing book.",
    "soon-We will finish this project ____.",
    "shook-The people got scared when the ground ____ yesterday.",
    "teach-Tommy wants to ____ his dogs some new tricks.",
    "team-Their ____ won another game this morning.",
    "tease-Please don't ____ her so much.",
    "tools-Do you have the ____ to repair this door?",
    "took-I know who ____ that picture.",
    "true-Is it ____ that you can sing very well?",
    "weak-I feel so ____ after working all day.",
    "week-I visit my cousin every ____.",
];

$vDigraphs = ["ea","ee","oa","oe","oo","ou","ue","ui"];

// §10 grade-keyed config
if ($lvl === 'Easy') {
    $pool     = ($grd <= 1) ? $images_t0 : $images_t1;
    $useImage = true;
} else {
    $pool     = $sentences_t2;
    $useImage = false;
}

$imgDirFs = __DIR__ . '/../../english/images/phonics/';

function pick_from_pool_v($pool, $sessionKey, $imgDirFs, $useImage) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = [];
    foreach ($pool as $entry) {
        $w = $useImage ? $entry : substr($entry, 0, strpos($entry, '-'));
        if (!in_array($w, $used, true) && (!$useImage || file_exists($imgDirFs . $w . '.jpg'))) {
            $avail[] = $entry;
        }
    }
    if (empty($avail)) {
        foreach ($pool as $entry) {
            $w = $useImage ? $entry : substr($entry, 0, strpos($entry, '-'));
            if (!$useImage || file_exists($imgDirFs . $w . '.jpg')) $avail[] = $entry;
        }
        $used = [];
    }
    if (empty($avail)) return null;
    $entry = $avail[array_rand($avail)];
    $w = $useImage ? $entry : substr($entry, 0, strpos($entry, '-'));
    $used[] = $w;
    if (count($used) > 100) $used = array_slice($used, -60);
    $_SESSION[$sessionKey]['used'] = $used;
    return $entry;
}

function find_first_vowel_digraph($word, $digraphs) {
    foreach ($digraphs as $dg) {
        $pos = strpos($word, $dg);
        if ($pos !== false) return ['pos' => $pos, 'dg' => $dg];
    }
    return ['pos' => 0, 'dg' => substr($word, 0, 2)];
}

function render_word_blank_vowel($word, $pos, $qmarkUrl) {
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    $i = 0;
    $n = strlen($word);
    while ($i < $n) {
        if ($i === $pos) {
            $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;">'
                   . '<img src="' . htmlspecialchars($qmarkUrl) . '" style="height:60px;" alt="?"></td>';
            $i += 2;
        } else {
            $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;font-family:Arial,sans-serif;font-size:44pt;font-weight:600;color:#BB0038;line-height:1;">'
                   . htmlspecialchars($word[$i]) . '</td>';
            $i++;
        }
    }
    return $html . '</tr></table>';
}

function render_word_complete_vowel($word, $pos, $digraphLen = 2) {
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    for ($i = 0; $i < strlen($word); $i++) {
        $color = ($i >= $pos && $i < $pos + $digraphLen) ? '#CC0066' : '#BB0038';
        $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;font-family:Arial,sans-serif;font-size:44pt;font-weight:600;color:' . $color . ';line-height:1;">'
               . htmlspecialchars($word[$i]) . '</td>';
    }
    return $html . '</tr></table>';
}

function render_sentence_card_v($sentence) {
    return '<div style="background:#fff; border:2px solid #d0d0e8; border-radius:16px; '
         . 'padding:22px 30px; max-width:520px; margin:20px auto; font-size:16pt; '
         . 'font-weight:600; color:#333; line-height:1.55;">'
         . htmlspecialchars($sentence) . '</div>';
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
// THEME (hoisted so the "Temporarily unavailable" path can use it)
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

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $entry = pick_from_pool_v($pool, $sessionKey, $imgDirFs, $useImage);
    if ($entry === null) {
        render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
        echo '<p style="text-align:center; font-size:16pt; margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    if ($useImage) {
        $word = $entry;
        $sentence = '';
    } else {
        $sep = strpos($entry, '-');
        $word = substr($entry, 0, $sep);
        $sentence = substr($entry, $sep + 1);
    }

    $found = find_first_vowel_digraph($word, $vDigraphs);
    $answer = $found['dg'];
    $ansPos = $found['pos'];

    // 3 distinct distractors from the vowel digraph pool
    $others = array_values(array_diff($vDigraphs, [$answer]));
    shuffle($others);
    $distractors = array_slice($others, 0, 3);

    $choices = array_merge([$answer], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'word'     => $word,
        'sentence' => $sentence,
        'ansPos'   => $ansPos,
        'useImage' => $useImage,
        'image'    => $base . '/english/images/phonics/' . $word . '.jpg',
        'qmark'    => $base . '/english/images/blank-qmark2.jpg',
        'answer'   => $answer,
        'choices'  => $choices,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
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
    min-width: 110px;
    height: 100px;
    padding: 0 22px;
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
  .letter-btn:hover { background: #f8f8ff; border-color: #8080ff; }
  @media (max-width: 820px) {
    .letter-row { gap: 10px; }
    .letter-btn { min-width: 68px; height: 68px; font-size: 1.4rem; padding: 0 12px; }
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
    <p style="font-size:15pt; color:#800080; margin-top:15px;">
        The word we're looking for is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['word']); ?>'</strong>
        <br/>so the correct digraph is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <?php if ($cur['useImage']): ?>
        <img src="<?php echo htmlspecialchars($cur['image']); ?>"
             alt="<?php echo htmlspecialchars($cur['word']); ?>"
             style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
             onerror="this.style.display='none';">
    <?php else: ?>
        <?php echo render_sentence_card_v($cur['sentence']); ?>
    <?php endif; ?>
    <p style="font-size:15pt; margin-top:10px;"><?php echo render_word_complete_vowel($cur['word'], $cur['ansPos']); ?></p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <?php if ($q['useImage']): ?>
        <img src="<?php echo htmlspecialchars($q['image']); ?>"
             alt="<?php echo htmlspecialchars($q['word']); ?>"
             style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
             onerror="this.style.display='none';">
    <?php else: ?>
        <?php echo render_sentence_card_v($q['sentence']); ?>
    <?php endif; ?>
    <p style="margin:10px 0;"><?php echo render_word_blank_vowel($q['word'], $q['ansPos'], $q['qmark']); ?></p>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">
        <?php if ($q['useImage']): ?>
            Click on the correct digraph for this word.
        <?php else: ?>
            Click on the correct digraph for the<br/>word that completes this sentence.
        <?php endif; ?>
    </p>

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