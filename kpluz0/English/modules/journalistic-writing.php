<?php
// english/modules/journalistic-writing.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a question about journalistic writing; student clicks the correct
// term. Several questions reference a shared diagram image
// (news-report-parts.jpg) showing labelled parts A–G of a news report.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// 33 questions preserved verbatim. Image entries (Q19-Q24) reference the
// diagram via a '**<file>.jpg' marker embedded in the bank string; the
// parser extracts the filename, strips the marker from the displayed
// question, and validates the image via file_exists (§21) at pick-time —
// image-bearing questions are skipped if the image is missing rather than
// served broken.
//
// Data fix: Q25 answer "exagerrated" corrected to "exaggerated"
// (spelling; semantics unchanged — the wrong characteristic of a headline).
//
// Choice layout (§14):
//   maxLen &#8804; 17 &#8594; 2×2 grid (equal halves)
//   maxLen > 17 &#8594; 1-col hug (auto column = widest choice, all same width)
//
// Font sizing: question card, choices, and hint enlarged; "Your answer is"
// and verdict lines retain their inline 14pt/16pt size.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
// (Not used for content selection — single-pool module.)
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'journalistic-writing.php'

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

$moduleTitle = 'Journalistic Writing';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

// ============================================================
// Question bank: "question=answer[d1+d2]d3"
// Image-bearing questions embed '**<file>.jpg' before the '='.
// ============================================================
$bank = [
    "All of the following are characteristics of journalistic writing except ____.=fictional[factual+about recent or current events]aims to inform",
    "Information about recent or current events is called what?=news[editorial+feature]essay",
    "In today's modern world, we usually get news from any of the following except ____.=telegrams[newspapers+websites]radio and TV",
    "All of the following are topics commonly covered by journalistic writing except ____.=history[politics+business]entertainment",
    "Which of these refers to the rule in journalistic writing to present the most important details first and the least important ones last?=inverted pyramid[upright pyramid+lateral pyramid]nonstandard pyramid",
    "Which of these is not considered to be one of the main parts of a news report?=plot[headline+byline]lead",
    "Which of these is not considered to be one of the main parts of a news report?=denouement[byline+placeline]body",
    "Which of these serves as the title of a news report that aims to attract readers' attention?=headline[byline+placeline]lead",
    "Which of these refers to a line of text above the news article that gives the name of the news writer?=byline[headline+placeline]lead",
    "Which of these refers to a word or phrase that gives the name of the place where a news story originated?=placeline[headline+byline]lead",
    "Which of these serves as the opening paragraph of a news report?=lead[headline+byline]placeline",
    "A good lead for a news report follows which rule in journalistic writing?=5 W's and H rule[4 W's and H rule+2 W's and H rule]3 W's and H rule",
    "All of the following are included in the 5 W's of journalistic writing except ____.=which[who+what]when",
    "All of the following are included in the 5 W's and H rule of journalistic writing except ____.=whose[why+where]how",
    "The lead paragraph of a news report should consist of ____ concise sentences.=only one or two[not less than two+three or more]at least four",
    "The lead paragraph of a news report should have ____ words.=30 or less[at least 50+100 or more]less than 10",
    "Which of these adds more facts and details to what the lead has already provided in a news report?=body[headline+footnote]quote",
    "Which of these refers to a person or document that provides information about the news?=source[reviewer+analyst]editor",
    "Which of these refers to the part of a news report that's labelled as 'A' in the picture shown?**news-report-parts.jpg=headline[byline+placeline]lead",
    "Which of these refers to the part of a news report that's labelled as 'B' in the picture shown?**news-report-parts.jpg=byline[headline+placeline]lead",
    "Which of these refers to the part of a news report that's labelled as 'C' in the picture shown?**news-report-parts.jpg=placeline[headline+byline]lead",
    "Which of these refers to the part of a news report that's labelled as 'D' in the picture shown?**news-report-parts.jpg=lead[headline+byline]placeline",
    "Which of these refers to the part of a news report that's labelled as 'E' and 'G' in the picture shown?**news-report-parts.jpg=body[lead+quotation]headline",
    "Which of these refers to the part of a news report that's labelled as 'F' in the picture shown?**news-report-parts.jpg=quotation[lead+source]headline",
    "All of the following are characteristics of a good headline except ____.=exaggerated[interesting+accurate]not misleading",
    "A news report is written using which point of view?=third person[first person+second person]any",
    "A feature article is written using which point of view?=any, as appropriate[first person+second person]third person",
    "Which of the following aims to inform the reader about the writer's own views, beliefs, or feelings about a certain topic?=opinion article[news report+feature article]sports article",
    "Matters pertaining to the local basketball scene would be best tackled using which type of journalistic article?=sports article[news report+feature article]opinion article",
    "All of the following are characteristics of a feature article except ____.=concise and direct to the point[in-depth and full of details+entertaining]of human interest",
    "Which of the following aims to give information that's of human interest and attempts to involve the reader emotionally?=feature article[news report+opinion article]sports article",
    "Which of the following would you write if you want to take an in-depth look at the life of a person who has done something of interest to many people?=feature article[news report+opinion article]sports article",
];

// ============================================================
// Parse helper
// ============================================================
function jw_parse($entry) {
    $imgFile = null;
    if (preg_match('/\*\*([A-Za-z0-9_\-\.]+\.jpg)/', $entry, $m)) {
        $imgFile = $m[1];
        $entry = str_replace($m[0], '', $entry);
    }

    $p0 = strpos($entry, '=');
    if ($p0 === false) return null;
    $p1 = strpos($entry, '[', $p0);
    $p2 = strpos($entry, '+', $p1 === false ? 0 : $p1);
    $p3 = strpos($entry, ']', $p2 === false ? 0 : $p2);
    if ($p1 === false || $p2 === false || $p3 === false) return null;

    $question = trim(substr($entry, 0, $p0));
    $answer   = trim(substr($entry, $p0 + 1, $p1 - $p0 - 1));
    $d1       = trim(substr($entry, $p1 + 1, $p2 - $p1 - 1));
    $d2       = trim(substr($entry, $p2 + 1, $p3 - $p2 - 1));
    $d3       = trim(substr($entry, $p3 + 1));

    if ($question === '' || $answer === '') return null;

    return [
        'question' => $question,
        'answer'   => $answer,
        'd1'       => $d1,
        'd2'       => $d2,
        'd3'       => $d3,
        'image'    => $imgFile,
    ];
}

// ============================================================
// Handle answer click
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
// Theme
// ============================================================
$theme = [
    'top_banner'    => $base . '/english/images/ex-27-top.jpg',
    'title_bg'      => $base . '/english/images/ex-27-top2.jpg',
    'left_side'     => $base . '/english/images/ex-27-left.jpg',
    'right_side'    => $base . '/english/images/ex-27-right.jpg',
    'content_bg'    => $base . '/english/images/ex-27-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-27-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// Generate
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $imgDirFs = __DIR__ . '/../../english/images/others/';

    $avail = [];
    foreach ($bank as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        $parsed = jw_parse($entry);
        if ($parsed === null) continue;
        if ($parsed['image'] !== null && !file_exists($imgDirFs . $parsed['image'])) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            $parsed = jw_parse($entry);
            if ($parsed === null) continue;
            if ($parsed['image'] !== null && !file_exists($imgDirFs . $parsed['image'])) continue;
            $avail[] = $i;
        }
    }
    if (empty($avail)) {
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<p style="text-align:center;font-size:16pt;margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = jw_parse($bank[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    shuffle($choices);

    $imgUrl = ($parsed['image'] !== null)
        ? $base . '/english/images/others/' . $parsed['image']
        : null;

    $_SESSION[$sessionKey]['current'] = [
        'question' => $parsed['question'],
        'answer'   => $parsed['answer'],
        'choices'  => $choices,
        'image'    => $imgUrl,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .jw-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 22px 28px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
    line-height: 1.45;
    text-align: center;
    box-sizing: border-box;
  }
  .jw-card.jw-feedback { font-size: 1.25rem; }
  .jw-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .jw-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .jw-image {
    display: block;
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 20px auto 0;
  }
  .jw-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .jw-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 100%;
    margin: 14px auto;
  }
  .jw-choice {
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
  .jw-choice:hover { background: #eef; border-color: #8080ff; }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <?php if ($cur['image'] !== null): ?>
        <img src="<?php echo htmlspecialchars($cur['image']); ?>"
             alt="Parts of a news report"
             class="jw-image"
             onerror="this.style.display='none';">
    <?php endif; ?>

    <div class="jw-card jw-feedback">
        <?php echo htmlspecialchars($cur['question']); ?>
        <br><br>
        <span style="color:#800080; font-weight:700;">Answer:</span>
        <strong style="color:#CC0066; font-weight:700;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <?php if ($q['image'] !== null): ?>
        <img src="<?php echo htmlspecialchars($q['image']); ?>"
             alt="Parts of a news report"
             class="jw-image"
             onerror="this.style.display='none';">
    <?php endif; ?>

    <div class="jw-card"><?php echo htmlspecialchars($q['question']); ?></div>

    <p class="jw-hint">Click on your answer.</p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 17);
        $containerClass = $use2x2 ? 'jw-grid-2x2' : 'jw-grid-1col';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="jw-choice">
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