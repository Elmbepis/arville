<?php
// english/modules/print-nonprint-elements.php
// Elements of Print and Non-print Materials — image-choice; identify elements,
// purposes, and types of print/non-print media from pictures.
//
// Single-level (§5 collapse): legacy hardcoded $_SESSION['level']="Easy" with
// no level radios in the HTML. Collapsed to $lvl='Easy'. No selector rendered;
// no grade/level suffix in the header (matches values-vis-media.php).
//
// 30 image-choice questions preserved verbatim. Each entry references an image
// in English/images/others/ via '**<file>.jpg'. Parsed at definition time into
// structured ['img','q','correct','wrong'] arrays.
//
// §21 image validation: file_exists() at pick-time — any question whose image
// is missing is skipped. If every remaining entry is invalid, module shows
// "Temporarily unavailable."
//
// Choice layout (§14): maxLen &#8804; 17 &#8594; 2×2 grid; else 1-col hug. Many print/
// non-print answers are short single words or short phrases; longer
// "to <verb> ..." answers fall to 1-col.
//
// $grd defensive default (§11): $_SESSION['user_grade'], clamped 0–10.
// Not used for content selection (single-pool module).
//
// Theme: ex-27-* (matches legacy). Score box: score-*-1.
// DB row required: modules.url = 'print-nonprint-elements.php'

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

$base       = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$imageBase  = $base . '/English/images/others/';
$imageDirFs = __DIR__ . '/../../English/images/others/';

$moduleTitle = 'Elements of Print and Non-print Materials';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5) — legacy hardcoded Easy

$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ============================================================
// Question bank — parsed at definition time
// ============================================================
$allQuestions = [
    0  => ['img' => 'imgpnp01.jpg', 'q' => 'What is the purpose of putting illustrations in storybooks?', 'correct' => 'to engage readers', 'wrong' => ['to enhance the plot', 'to give information', 'to make readers focus']],
    1  => ['img' => 'imgpnp02.jpg', 'q' => 'The text in the postcard that the red arrow is pointing to provides which information?', 'correct' => 'the recipient', 'wrong' => ['the sender', 'the courier', 'the route']],
    2  => ['img' => 'imgpnp03.jpg', 'q' => 'What type of newspaper article is shown in the picture?', 'correct' => 'news report', 'wrong' => ['infographic', 'editorial piece', 'feature article']],
    3  => ['img' => 'imgpnp04.jpg', 'q' => 'The text on the container that the red arrow is pointing to provides which information?', 'correct' => 'key ingredients', 'wrong' => ['directions for use', 'total weight', 'side effects']],
    4  => ['img' => 'imgpnp05.jpg', 'q' => 'The text shown in the picture constitutes which of these?', 'correct' => 'an invitation', 'wrong' => ['a job posting', 'an announcement', 'a notice of billing']],
    5  => ['img' => 'imgpnp06.jpg', 'q' => 'The printed material shown in the picture is used to get which type of information?', 'correct' => 'word meanings', 'wrong' => ['contact details', 'announcements', 'product details']],
    6  => ['img' => 'imgpnp07.jpg', 'q' => 'Why is the text that the red arrow is pointing to in the electricity bill shown printed in bold and bigger font?', 'correct' => 'to make the total bill easy to see', 'wrong' => ['to alarm the customer', 'to make the payment deadline easy to see', 'to emphasize where to pay']],
    7  => ['img' => 'imgpnp08.jpg', 'q' => 'Which of the following is not seen in the laundry detergent label in the picture?', 'correct' => 'product ingredients', 'wrong' => ['product description', 'product amount', 'product use warnings']],
    8  => ['img' => 'imgpnp09.jpg', 'q' => 'This magazine page has a big picture beside the article\'s title. Why?', 'correct' => 'to entice readers to read the article', 'wrong' => ['to give due credit to the author', 'to give a summary of the topic', 'to give additional facts on the topic']],
    9  => ['img' => 'imgpnp10.jpg', 'q' => 'What value or emotion is being suggested by the picture shown?', 'correct' => 'patriotism', 'wrong' => ['hope', 'cheerfulness', 'optimism']],
    10 => ['img' => 'imgpnp11.jpg', 'q' => 'Which element of a printed material is shown in the picture?', 'correct' => 'table of contents', 'wrong' => ['glossary', 'title page', 'preface']],
    11 => ['img' => 'imgpnp12.jpg', 'q' => 'The material shown in the picture provides which type of information?', 'correct' => 'locations of places', 'wrong' => ['contact information', 'demographics', 'flora and fauna']],
    12 => ['img' => 'imgpnp13.jpg', 'q' => 'Which audience is targeted by the illustrated e-book in the picture?', 'correct' => 'children', 'wrong' => ['teenagers', 'working adults', 'elderly']],
    13 => ['img' => 'imgpnp14.jpg', 'q' => 'The material shown in the picture provides information that\'s related to which of these?', 'correct' => 'an education institution', 'wrong' => ['the stock market', 'a government agency', 'a religious organization']],
    14 => ['img' => 'imgpnp15.jpg', 'q' => 'Why do television news reports also include the information that the arrow is pointing to in their broadcasts?', 'correct' => 'to show where the event is happening', 'wrong' => ['to invite the viewers to come', 'to show when the event is happening', 'to promote the place of event']],
    15 => ['img' => 'imgpnp16.jpg', 'q' => 'The red arrow is pointing to which element of a newspaper?', 'correct' => 'byline', 'wrong' => ['lead', 'jumpline', 'masthead']],
    16 => ['img' => 'imgpnp17.jpg', 'q' => 'What is the message of the song lyrics shown in the picture?', 'correct' => 'pursue your dreams', 'wrong' => ['help others', 'fight for justice', 'be faithful']],
    17 => ['img' => 'imgpnp18.jpg', 'q' => 'What type of content is shown in this screenshot of an e-book?', 'correct' => 'factual information', 'wrong' => ['advertisement', 'opinion', 'tabulated data']],
    18 => ['img' => 'imgpnp19.jpg', 'q' => 'What type of information is shown in the picture?', 'correct' => 'news', 'wrong' => ['opinion', 'product review', 'advertisement']],
    19 => ['img' => 'imgpnp20.jpg', 'q' => 'What type of content is being provided in the TV broadcast shown in the picture?', 'correct' => 'weather report', 'wrong' => ['feature story', 'health warning', 'entertainment']],
    20 => ['img' => 'imgpnp21.jpg', 'q' => 'Which text type is used by the magazine article shown in the picture?', 'correct' => 'instructional', 'wrong' => ['narrative', 'expository', 'argumentative']],
    21 => ['img' => 'imgpnp22.jpg', 'q' => 'The text shown is part of which of these?', 'correct' => 'a novel', 'wrong' => ['textbook', 'cookbook', 'poetry']],
    22 => ['img' => 'imgpnp23.jpg', 'q' => 'Which type of news report is shown in the picture?', 'correct' => 'local news', 'wrong' => ['sports news', 'national news', 'entertainment news']],
    23 => ['img' => 'imgpnp24.jpg', 'q' => 'Based on the book cover shown in the picture, what does the book offer?', 'correct' => 'stories', 'wrong' => ['news', 'opinion', 'science articles']],
    24 => ['img' => 'imgpnp25.jpg', 'q' => 'What is the magazine article shown about?', 'correct' => 'a social issue', 'wrong' => ['a disease', 'a new product', 'a technology trend']],
    25 => ['img' => 'imgpnp26.jpg', 'q' => 'What is the purpose of the text that the red arrow is pointing to?', 'correct' => 'to give credit to the source of the image', 'wrong' => ['to give credit to the author', 'to provide a link to an online article', 'to add more facts on the topic']],
    26 => ['img' => 'imgpnp27.jpg', 'q' => 'What type of e-book is shown in the picture?', 'correct' => 'cookbook', 'wrong' => ['novel', 'textbook', 'almanac']],
    27 => ['img' => 'imgpnp28.jpg', 'q' => 'The website screenshot shown in the picture is providing an update on which of these?', 'correct' => 'the state of the atmosphere', 'wrong' => ['a social issue', 'the stock market', 'a government project']],
    28 => ['img' => 'imgpnp29.jpg', 'q' => 'What do listeners primarily get from the guests or experts invited to talk on radio programs?', 'correct' => 'a better understanding of the topic', 'wrong' => ['better listening skills', 'better speaking skills', 'affinity for the guest']],
    29 => ['img' => 'imgpnp30.jpg', 'q' => 'What is the aim of the printed material shown in the picture?', 'correct' => 'to recognize a person', 'wrong' => ['to invite people', 'to announce an event', 'to provide a warning']],
];

// ============================================================
// Theme
// ============================================================
$theme = [
    'top_banner'    => $base . '/English/images/ex-27-top.jpg',
    'title_bg'      => $base . '/English/images/ex-27-top2.jpg',
    'left_side'     => $base . '/English/images/ex-27-left.jpg',
    'right_side'    => $base . '/English/images/ex-27-right.jpg',
    'content_bg'    => $base . '/English/images/ex-27-content.jpg',
    'bottom_banner' => $base . '/English/images/ex-27-bottom.jpg',
    'score_top'     => $base . '/English/images/score-top-1.jpg',
    'score_bottom'  => $base . '/English/images/score-bottom-1.jpg',
];

// ============================================================
// Answer processing
// ============================================================
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    // Anti-tamper: only accept clicks that match a rendered choice
    if (!in_array($clicked, $cur['choices'], true)) {
        $clicked = $cur['choices'][0];
    }

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result    = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// Generate (single pool — all 30 questions)
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $avail = [];
    foreach ($allQuestions as $i => $item) {
        if (in_array($i, $used, true)) continue;
        if (!file_exists($imageDirFs . $item['img'])) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($allQuestions as $i => $item) {
            if (!file_exists($imageDirFs . $item['img'])) continue;
            $avail[] = $i;
        }
    }
    if (empty($avail)) {
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<p style="text-align:center;font-family:Arial,sans-serif;font-size:16pt;margin:40px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        $conn->close();
        exit;
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey]['used'] = $used;

    $item    = $allQuestions[$idx];
    $choices = array_values(array_unique(array_merge($item['wrong'], [$item['correct']])));
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'q'       => $item['q'],
        'img'     => $item['img'],
        'correct' => $item['correct'],
        'choices' => $choices,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .pnp-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 22px 28px;
    width: fit-content;
    max-width: 100%;
    margin: 40px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #333;
    line-height: 1.45;
    text-align: center;
    box-sizing: border-box;
  }
  .pnp-card.pnp-feedback { font-size: 1.25rem; }
  .pnp-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #800080;
    text-align: center;
    margin: 40px auto 40px;
  }
  .pnp-image {
    display: block;
    max-width: 100%;
    max-height: 300px;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 20px auto 0;
  }
  .pnp-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .pnp-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 100%;
    margin: 14px auto;
  }
  .pnp-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 64px;
    padding: 14px 20px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    max-width: 100%;
    transition: background 0.15s, border-color 0.15s;
  }
  .pnp-choice:hover { background: #eef; border-color: #8080ff; }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?><br/><br/>
    </p>

    <img src="<?php echo htmlspecialchars($imageBase . $cur['img']); ?>"
         alt="Picture"
         class="pnp-image"
         onerror="this.style.display='none';">

    <div class="pnp-card pnp-feedback">
        <?php echo htmlspecialchars($cur['q']); ?>
        <br><br>
        <span style="color:#CC0066; font-weight:700;">Answer:</span>
        <strong style="color:#800080; font-weight:700;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($imageBase . $q['img']); ?>"
         alt="Picture"
         class="pnp-image"
         onerror="this.style.display='none';">

    <div class="pnp-card"><?php echo htmlspecialchars($q['q']); ?></div>

    <p class="pnp-hint">Click on your answer.</p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 17);
        $containerClass = $use2x2 ? 'pnp-grid-2x2' : 'pnp-grid-1col';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="pnp-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>