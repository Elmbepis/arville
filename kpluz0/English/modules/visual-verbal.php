<?php
// english/modules/visual-verbal.php
// IMAGE-CHOICE. Bypass QEngine per §D.
// Shows a question about a visual/graphic organizer (chart, diagram, etc.);
// student clicks the correct term or interpretation.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Medium" with no level radios in the
//   HTML. Collapsed to $lvl='Hard' (preserves legacy 2-point value). No
//   selector rendered.
//
// Grade-keyed content (§10):
//   grd 0-6   &#8594; 18 questions (easier graphic organizers)
//   grd 7-10  &#8594; 23 questions (all, includes Pareto/business/evolution content)
//   Both pools preserved verbatim from legacy's two $questions arrays.
//
// Image handling (§21): entries embed '**<file>.jpg' before '='. Parser
// extracts filename, strips marker from displayed question, and validates
// via file_exists() at pick-time — image-bearing questions with missing
// files are skipped rather than served broken. Two questions have no image
// at all (Venn Diagrams / Pareto Chart conceptual); those work fine.
//
// Data fix: Q19 answer question "contructing" corrected to "constructing"
// (typo; semantics unchanged — the wrong-characteristic question).
//
// Font sizing matches journalistic-writing.php reference:
//   prompt 1.35rem · question card 1.35rem · feedback card 1.25rem
//   hint 1.2rem · choice buttons 1.25rem
//   Inline "Your answer is" 14pt · verdict 16pt (unchanged)
//
// Choice layout (§14): maxLen &#8804; 17 &#8594; 2×2 grid; else 1-col hug.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'visual-verbal.php'

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

$moduleTitle = 'Visual-Verbal Relationships';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Hard';   // single-level collapse (§5) — legacy was Medium/2pts

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Bank: Advanced pool (23 questions) — grd 7-10
// ============================================================
$bankAdvanced = [
    "What is this graphic organizer about?**txtaid01.jpg=ammonium nitrate[dangerous chemicals+explosions]uses of ammonium nitrate",
    "According to this graphic organizer, ammonium nitrate is primarily used in ____.**txtaid01.jpg=agriculture[mining+explosives]construction",
    "The image shown is called what?**txtaid03.jpg=Venn Diagram[Cause and Effect Diagram+Flow Diagram]Concept Map",
    "The image shown is called what?**txtaid06.jpg=flowchart[tree diagram+Pareto chart]control chart",
    "____ visually represent the similarities and differences between two concepts.=Venn Diagrams[Cause and Effect Diagrams+Flow Diagrams]Pareto Charts",
    "A ____ is a vertical bar graph that's used to analyze which problems need attention first.=Pareto Chart[Cause and Effect Diagram+Flow Diagrams]Tree Diagram",
    "According to this diagram, whales and fishes have ____.**txtaid03.jpg=three things in common[nothing in common+six things in common]no differences",
    "According to this Pareto Chart, 80% of all customer complaints are due to ____.**txtaid04.jpg=4 causes[5 causes+6 causes]7 causes",
    "According to this Pareto Chart, which of these is the biggest contributor to customer complaints?**txtaid04.jpg=lack of parking space[poor sales rep attitude+poor lighting]confusing lay-out",
    "What is this graphic organizer about?**txtaid07.jpg=health care for people with disabilities[needs of people with disabilities+how to help people with disabilities]kinds of disabilities in people",
    "According to this graphic organizer, what percentage of people with disabilities can't afford health care?**txtaid07.jpg=50%[25%+30%]75%",
    "According to this graphic organizer, which of these assistive devices is needed by most people?**txtaid07.jpg=eyeglasses[wheel chair+hearing aid]artificial legs",
    "All of these are flu prevention tips given by the graphic organizer shown except ____.**txtaid08.jpg=getting vaccinated[drinking water+eating fruits and vegetables]washing your hands",
    "According to this graphic organizer, the month with the highest number of influenza infections in the U.S. is ____.**txtaid08.jpg=February[March+April]January",
    "According to this graphic organizer, all of the following happen each year due to influenza except ____.**txtaid08.jpg=Millions of people die.[Millions of people become sick.+More than 100K people are hospitalized.]Flu illnesses peak from January to April.",
    "According to this graphic organizer, lack of access to safe drinking water makes many people in developing countries sick and exhibit which symptom?**txtaid09.jpg=diarrhea[nausea+vertigo]muscle spasms",
    "According to this graphic organizer, investing a thousand pesos in safe water systems and sanitation would result in an economic return of how much?**txtaid09.jpg=8000 pesos[80000 pesos+8000 dollars]800 pesos",
    "According to this pie chart, which two activities consume exactly one half of a student's time?**txtaid10.jpg=sleep and homework[school and homework+homework and play]sleep and play",
    "According to this pie chart, all of the following are true when constructing a house except ____.**txtaid11.jpg=Cement costs less than bricks.[The cost of manpower is 40%.+The cost of steel and cement is 35%.]Timber contributes the least cost.",
    "According to this bar graph, the highest revenue in any single quarter was achieved by ____.**txtaid12.jpg=Kent in Q4[Kent in Q3+Lincoln in Q1]Lincoln in Q4",
    "According to this bar graph, the only person who never experienced a dip in revenue from one quarter to the next is ____.**txtaid12.jpg=Kent[York+Lincoln]Mersey",
    "What is this idea web graphic organizer about?**txtaid13.jpg=differences/similarities between desert and water biomes[animals found in desert and water biomes+plants found in desert and water biomes]what biomes are and why they're important",
    "According to this graphic organizer, one similarity that a desert biome may share with a water biome is ____.**txtaid13.jpg=having sand and dirt[being very hot and dry+being wet or very moist]having abundant plants and animals",
];

// ============================================================
// Bank: Beginner pool (18 questions) — grd 0-6
// ============================================================
$bankBeginner = [
    "According to this diagram, whales and fishes have ____.**txtaid03.jpg=three things in common[nothing in common+six things in common]no differences",
    "What is this graphic organizer about?**txtaid07.jpg=health care for people with disabilities[needs of people with disabilities+how to help people with disabilities]kinds of disabilities in people",
    "All of these are flu prevention tips given by the graphic organizer shown except ____.**txtaid08.jpg=getting vaccinated[drinking water+eating fruits and vegetables]washing your hands",
    "According to this graphic organizer, the month with the highest number of influenza infections in the U.S. is ____.**txtaid08.jpg=February[March+April]January",
    "According to this graphic organizer, all of the following happen each year due to influenza except ____.**txtaid08.jpg=Millions of people die.[Millions of people become sick.+More than 100K people are hospitalized.]Flu illnesses peak from January to April.",
    "What is this graphic organizer about?**txtaid09.jpg=lack of access to clean water[waterborne diseases+women and child labor]lack of rainfall",
    "According to this pie chart, which two activities consume exactly one half of a student's time?**txtaid10.jpg=sleep and homework[school and homework+homework and play]sleep and play",
    "What is this idea web graphic organizer about?**txtaid13.jpg=differences/similarities between desert and water biomes[animals found in desert and water biomes+plants found in desert and water biomes]what biomes are and why they're important",
    "According to this graphic organizer, one similarity that a desert biome may share with a water biome is ____.**txtaid13.jpg=having sand and dirt[being very hot and dry+being wet or very moist]having abundant plants and animals",
    "What is this graphic organizer about?**txtaid14.jpg=causes and effects of air pollution[causes of air pollution+effects of air pollution]how to prevent air pollution",
    "What does the graphic organizer shown do?**txtaid15.jpg=classifies animals[gives scientific names of animals+identifies habitats of animals]shows the importance of animals",
    "What does this graphic organizer show about the words 'fish' and 'sheep'?**txtaid16.jpg=they can either be singular or plural[they are both names of animals+they are both plural]they are both singular",
    "According to this Venn diagram, both freelancers and corporate employees have all of these in common except ____.**txtaid17.jpg=health benefits[working overtime+having a boss]meeting deadlines",
    "The graphic organizer shown is often used for what?**txtaid18.jpg=analyzing the parts of a whole[analyzing how something works+analyzing where something may be found]analyzing why something is important",
    "The graphic organizer shown is used to show the ____ of doing something.**txtaid19.jpg=advantages and disadvantages[total cost+underlying risks]importance",
    "The graphic organizer shown presents ____.**txtaid20.jpg=how humans evolved the past 4 M years[how humans evolved the past 3 M years+how mammals evolved the past 4 M years]how mammals evolved the past 3 M years",
    "A storyboard such as the one shown above is used to ____.**txtaid21.jpg=visualize a story[put a story in writing+narrate a story]find a title for a story",
    "What does the graphic organizer shown do?**txtaid22.jpg=classifies quadrilaterals[shows why quadrilaterals are important+measures quadrilaterals]defines all types of polygons",
];

// ============================================================
// Parse helper
// ============================================================
function vv_parse($entry) {
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
    $useAdvanced = ($grd >= 7);
    $pool        = $useAdvanced ? $bankAdvanced : $bankBeginner;
    $poolKey     = $useAdvanced ? 'used_advanced' : 'used_beginner';

    $used     = $_SESSION[$sessionKey][$poolKey] ?? [];
    $imgDirFs = __DIR__ . '/../../english/images/others/';

    $avail = [];
    foreach ($pool as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        $parsed = vv_parse($entry);
        if ($parsed === null) continue;
        if ($parsed['image'] !== null && !file_exists($imgDirFs . $parsed['image'])) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($pool as $i => $entry) {
            $parsed = vv_parse($entry);
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
    $_SESSION[$sessionKey][$poolKey] = $used;

    $parsed = vv_parse($pool[$idx]);

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
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .vv-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 22px 28px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #333;
    line-height: 1.45;
    text-align: center;
    box-sizing: border-box;
  }
  .vv-card.vv-feedback { font-size: 1.25rem; }
  .vv-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .vv-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .vv-image {
    display: block;
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 20px auto 0;
  }
  .vv-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .vv-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 100%;
    margin: 14px auto;
  }
  .vv-choice {
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
    font-weight: 500;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    max-width: 100%;
    transition: background 0.15s, border-color 0.15s;
  }
  .vv-choice:hover { background: #eef; border-color: #8080ff; }
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
             alt="Graphic organizer"
             class="vv-image"
             onerror="this.style.display='none';">
    <?php endif; ?>

    <div class="vv-card vv-feedback">
        <?php echo htmlspecialchars($cur['question']); ?>
        <br><br>
        <span style="color:#800080; font-weight:700;">Answer:</span>
        <strong style="color:#CC0066; font-weight:700;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <?php if ($q['image'] !== null): ?>
        <img src="<?php echo htmlspecialchars($q['image']); ?>"
             alt="Graphic organizer"
             class="vv-image"
             onerror="this.style.display='none';">
    <?php endif; ?>

    <div class="vv-card"><?php echo htmlspecialchars($q['question']); ?></div>

    <p class="vv-hint">Click on your answer.</p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 17);
        $containerClass = $use2x2 ? 'vv-grid-2x2' : 'vv-grid-1col';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="vv-choice">
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