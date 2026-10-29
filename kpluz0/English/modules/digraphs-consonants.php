<?php
// english/modules/digraphs-consonants.php
// STATIC word bank + choice. Bypass QEngine per §D.
// Shows a word (or sentence fill) with the consonant digraph blanked;
// click the correct 2-letter consonant digraph.
//
// Levels (§E — 2-level scheme): Easy / Hard
//   Easy = image questions. Pool by $grd:
//     grd<=1 &#8594; tier0 images (chain, shark, sheep, …)  [legacy Easy]
//     grd>1  &#8594; tier1 images (cheek, cheese, knife, …) [legacy Medium/Easy]
//   Hard = sentence questions. Pool by $grd:
//     grd<=1 &#8594; tier2 sentences (chance, thank, …)     [legacy Hard]
//     grd>1  &#8594; tier2 sentences (same as grd<=1)        [legacy Medium/Hard]
//
// Preserved legacy $grd tiering; collapsed 3 radio levels to 2 by making
// "Easy = image, Hard = sentence" the differentiation axis (image
// recognition vs sentence comprehension). Legacy grd<=1 Hard had mixed
// image/sentence — now pure sentence. Legacy grd>1 Easy was sentence —
// now image. Documented as accepted behavior change.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Choice layout: 4 digraph choices in ONE row (.letter-row). Manual anchors
// (§15 bypass) — render_choices' sizing is inadequate for these large tiles.
//
// Image: english/images/phonics/{word}.jpg (validated via file_exists).
// Theme: ex-29-* (110/582/108) &#8594; paper-69-* per §8 fit test.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'digraphs-consonants.php'

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

$moduleTitle = 'Consonant Digraphs';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = (int)($_SESSION['grade'] ?? 5);

// Image pools (word starts / word ends), tier 0 and tier 1
$b_images_t0 = ["chain","chair","chef","chew","cheek","chick","chimp","child","chin","chop","knee","shark","sheep","shelf","shell","ship","shoe","shop","shore","shout","write","whale","wheel"];
$f_images_t0 = ["bass","bath","ball","bell","bill","buck","bush","clock","cock","cross","duck","dress","fall","fish","glass","grass","hill","lock","neck","mall","moth","path","ring","rock","sock","wing"];
$b_images_t1 = ["chain","chair","cheek","cheese","cheetah","chest","chicken","chimp","knife","knot","sheep","shadow","share","shark","shave","sheets","shelf","shin","shirt","shore","shout","thank","think","thorn","thumb","write","whale","wheat"];
$f_images_t1 = ["bench","block","brick","brush","chalk","church","cloth","coach","crack","deck","dock","flock","leash","lunch","peach","roach","snack","stall","stalk","stick","string","teeth","truck"];

// Sentence pools (word|sentence pairs), tier 2
$b_sentences_t2 = [
    "chance-This is your ____ to show them how good you are.",
    "changed-His father ____ the flat tire of their car.",
    "charming-Many people like her because she is a very ____ girl.",
    "choose-We must ____ a movie that's really fun to watch.",
    "choices-What are the ____ in the menu?",
    "choke-Be careful not to ____ on that meat.",
    "chores-You must do your ____ at home everyday.",
    "chunk-The moon is just a large ____ of rock.",
    "shade-It is so hot. Let's go under the ____ of that big tree.",
    "shallow-The kids must stay at the ____ end of the pool.",
    "shampoo-You may use this ____ to wash your hair.",
    "sharpen-Kindly ____ these new pencils for me.",
    "shawl-Henry bought a new ____ for his mother.",
    "shred-Use this machine to ____ these sheets of paper.",
    "shorten-His guests might ____ the time of their stay at his house.",
    "shovel-Peter used a large ____ to dig that deep hole.",
    "thanked-Mrs. Reyes ____ everyone who came to her party.",
    "thunder-Lisa is easily startled by ____.",
    "whistle-Can you ____ to the tune of that lovely song?",
    "wring-Don't forget to ____ the wet towels before hanging them.",
    "wrens-They say that ____ are wonderful birds to have around.",
    "wrench-You need to use a ____ to turn that nut.",
];
$f_sentences_t2 = [
    "bleach-She used some ____ to make that pillow look white again.",
    "bliss-There is ____ in that small and quiet village.",
    "block-Troy is so tall that he can easily ____ the shots of other players.",
    "blush-You will make her ____ if you tell her she's pretty.",
    "brass-The tall statue in the park is made of ____.",
    "crunch-Can your teeth ____ these hard candies?",
    "crutch-He broke his leg so he is using a ____ right now.",
    "launch-They will ____ the rocket next week.",
    "match-Did you watch the tennis ____ this afternoon?",
    "quench-Jimmy drank some water to ____ his thirst.",
    "scratch-Can you please ____ my back? It is so itchy.",
    "splash-Please don't ____ water on my things while using that hose.",
    "stretch-You need to ____ more to reach that jar on the top shelf.",
    "stroll-Our family will ____ in the park this evening.",
    "struck-This tree had been ____ twice by lightning already.",
    "wrench-The mechanic used only one ____ to repair that car.",
];

$bDigraphs = ["ch","gh","gn","kn","sh","th","wr"];
$fDigraphs = ["ch","ll","ng","ph","sh","ss","th","zz"];

// §10 grade-keyed config
// Easy: image. grd<=1 &#8594; tier0, grd>1 &#8594; tier1.
// Hard: sentence. grd<=1 &#8594; tier2, grd>1 &#8594; tier2.
if ($lvl === 'Easy') {
    $bPool = ($grd <= 1) ? $b_images_t0 : $b_images_t1;
    $fPool = ($grd <= 1) ? $f_images_t0 : $f_images_t1;
    $useImage = true;
} else {
    $bPool = $b_sentences_t2;
    $fPool = $f_sentences_t2;
    $useImage = false;
}

$imgDirFs = __DIR__ . '/../../english/images/phonics/';

function pick_from_pool($pool, $sessionKey, $imgDirFs, $useImage) {
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

function render_word_blank_start_cons($word, $qmarkUrl) {
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;">'
           . '<img src="' . htmlspecialchars($qmarkUrl) . '" style="height:60px;" alt="?"></td>';
    for ($i = 2; $i < strlen($word); $i++) {
        $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;font-family:Arial,sans-serif;font-size:44pt;font-weight:600;color:#BB0038;line-height:1;">'
               . htmlspecialchars($word[$i]) . '</td>';
    }
    return $html . '</tr></table>';
}

function render_word_blank_end_cons($word, $qmarkUrl) {
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    for ($i = 0; $i < strlen($word) - 2; $i++) {
        $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;font-family:Arial,sans-serif;font-size:44pt;font-weight:600;color:#BB0038;line-height:1;">'
               . htmlspecialchars($word[$i]) . '</td>';
    }
    $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;">'
           . '<img src="' . htmlspecialchars($qmarkUrl) . '" style="height:60px;" alt="?"></td>';
    return $html . '</tr></table>';
}

function render_word_complete_cons($word, $position) {
    $color = function($i) use ($position, $word) {
        if ($position === 'start') return ($i < 2) ? '#CC0066' : '#BB0038';
        return ($i >= strlen($word) - 2) ? '#CC0066' : '#BB0038';
    };
    $html = '<table style="display:inline-table;margin:10px auto;"><tr>';
    for ($i = 0; $i < strlen($word); $i++) {
        $html .= '<td style="text-align:center;padding:0 6px;vertical-align:bottom;font-family:Arial,sans-serif;font-size:44pt;font-weight:600;color:' . $color($i) . ';line-height:1;">'
               . htmlspecialchars($word[$i]) . '</td>';
    }
    return $html . '</tr></table>';
}

function render_sentence_card($sentence) {
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
    // Randomly choose start or end position
    $position = (rand(1, 2) === 1) ? 'start' : 'end';
    $rawPool  = ($position === 'start') ? $bPool : $fPool;
    $digraphs = ($position === 'start') ? $bDigraphs : $fDigraphs;

    $entry = pick_from_pool($rawPool, $sessionKey, $imgDirFs, $useImage);
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

    $answer = ($position === 'start') ? substr($word, 0, 2) : substr($word, -2);

    // 3 distinct distractors from the same digraph pool
    $others = array_values(array_diff($digraphs, [$answer]));
    shuffle($others);
    $distractors = array_slice($others, 0, 3);

    $choices = array_merge([$answer], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'word'     => $word,
        'sentence' => $sentence,
        'position' => $position,
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
        <?php echo render_sentence_card($cur['sentence']); ?>
    <?php endif; ?>
    <p style="font-size:15pt; margin-top:10px;"><?php echo render_word_complete_cons($cur['word'], $cur['position']); ?></p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <?php if ($q['useImage']): ?>
        <img src="<?php echo htmlspecialchars($q['image']); ?>"
             alt="<?php echo htmlspecialchars($q['word']); ?>"
             style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
             onerror="this.style.display='none';">
    <?php else: ?>
        <?php echo render_sentence_card($q['sentence']); ?>
    <?php endif; ?>
    <p style="margin:10px 0;">
        <?php
        if ($q['position'] === 'start') echo render_word_blank_start_cons($q['word'], $q['qmark']);
        else echo render_word_blank_end_cons($q['word'], $q['qmark']);
        ?>
    </p>
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