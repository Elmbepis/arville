<?php
// math/modules/line-graphs.php
// STATIC question bank + choice. Bypass QEngine per §D (fixed bank, not procedural).
// Uses ?ansclick + render_choices helper (§A).
//
// Level: Easy (single — legacy hardcoded $_SESSION['level']="Easy").
//
// Feedback: shows the original question verbatim (preserving original punctuation),
// a vertical gap, then "Answer: <correct>". No regex restating — avoids the
// punctuation bugs that appear when trying to rewrite complex question stems.
//
// Theme: test67-* (110/582/108) &#8594; paper-69-* (75/655/70).
// Score box: score-*-2 (module's own, preserved per §C).
// DB row required: modules.url = 'line-graphs.php'

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

$moduleTitle = 'Interpreting Line Graphs';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// QUESTION BANK — format "prompt**image.jpg=answer[wrong1+wrong2]wrong3"
// ============================================================
$rawQuestions = [
    "How many books did I buy from January 1 to December 31?**graph11.jpg=37[39+36]38",
    "During which months did I lose interest in comic book collecting?**graph11.jpg=April to May[June to July+August to September]October to December",
    "During which month did I acquire the most comic books and how many comic books did I acquire that month?**graph11.jpg=July, 12[July, 10+July, 14]February, 16",
    "During which two months did I acquire the MOST comic books and what is the total number of comic books that I acquired during these months?**graph11.jpg=February and July, 22[June and July, 14+July and August, 14]January and February, 24",
    "During which two months did I acquire the LEAST comic books and what is the total number of comic books that I acquired during these months?**graph11.jpg=April and May, 0[March and April, 0+May and June, 0]April and June, 2",
    "If I wanted to have an average collecting rate of 4 comic books per month from January to December, how many comic books should I have acquired from April to May?**graph11.jpg=11[12+9]10",
    "If I wanted to have an average collecting rate of 3 comic books per month from January to December, how many comic books should I have acquired in December instead?**graph11.jpg=0[1+2]3",
    "On the average, how many comic books did I collect PER month from January to June?**graph11.jpg=3[4+2]5",
    "During which month did the company have the highest sales in food and how much food was sold that month in pesos?**graph12.jpg=December, 38 million[December, 32 million+March, 35 million]March, 38 million",
    "During which month did the company have the lowest sales in food and how much food was sold that month in pesos?**graph12.jpg=June, 6 million[June, 5 million+October, 3 million]October, 4 million",
    "During which month did the company have the highest total sales and how much was its total sales that month in pesos?**graph12.jpg=December, 72 million[December, 70 million+December, 74 million]March, 76 million",
    "During which month did the company have the lowest total sales and how much was its total sales that month in pesos?**graph12.jpg=October, 28 million[September, 30 million+June, 28 million]April, 34 million",
    "During which month did the food and clothing sales have the largest difference (absolute value) and how much was this difference in pesos?**graph12.jpg=June, 26 million[March, 20 million+October, 20 million]June, 28 million",
    "Which season is best for the company in terms of total sales?**graph12.jpg=Christmas season[summer+school opening]rainy seaon",
    "Which two months have the largest difference in food sales and how much was this difference in pesos?**graph12.jpg=December-June, 32 million[December-June, 30 million+December-October, 30 million]December-October, 32 million",
    "Which two months have the largest difference in clothing sales and how much was this difference in pesos?**graph12.jpg=December-October, 30 million[December-June, 30 million+December-June, 32 million]December-October, 32 million",
    "In the mid-1960's, one dollar is equivalent to how many pesos?**graph13.jpg=3.70[5.10+2.50]2.25",
    "In 1983, Ninoy Aquino was assassinated. From 1983 to 1987, the peso value dropped from ____ pesos per dollar to ____ pesos per dollar.**graph13.jpg=8, 21[21, 8+15, 25]25, 15",
    "Due to coup attempts and the Asian financial crisis, the peso value during the 1990's dropped from ____ pesos per dollar to ____ pesos per dollar.**graph13.jpg=23, 39[39, 23+30, 50]50, 30",
    "The lowest value that our peso has ever reached in our entire history is about ____ pesos to a dollar.**graph13.jpg=56[54+52]59",
    "During which year was the overall smoking rate in our city at its highest level and what was the overall smoking rate that year?**graph14.jpg=1980, 80%[1970, 75%+1975, 82%]1985, 87%",
    "During which year was the overall smoking rate in our city at its lowest level and what was the overall smoking rate that year?**graph14.jpg=2000, 54%[2000, 48%+1995, 48%]1995, 54%",
    "During which year was the difference between men and women smoking rates in our city at its greatest and how many percentage points was this difference?**graph14.jpg=1965, 52%[1965, 48%+1965, 56%]1975, 58%",
    "During which year was the difference between men and women smoking rates in our city at its lowest and how many percentage points was this difference?**graph14.jpg=2000, 7%[2000, 3%+2000, 10%]1995, 2%",
    "Based on the graph, what can you conclude about the smoking trend in our city from 1965 to 1985?**graph14.jpg=More women and less men smoked.[More women and more men smoked.+More men and less women smoked.]Less women and less men smoked.",
    "Based on the graph, what can you conclude about the smoking trend in our city after 1985?**graph14.jpg=Less women and less men smoked.[More women and more men smoked.+More men and less women smoked.]More women and less men smoked.",
    "Which of the following would you NOT infer from the graph?**graph14.jpg=Everyone has become less and less health-conscious since 1965.[Women have become more health-conscious after 1985.+Men have been health-conscious since 1965.]Women were less health-conscious from 1965 to 1985.",
];

$rawQuestions = array_values(array_unique($rawQuestions));

$questionBank = [];
foreach ($rawQuestions as $qstr) {
    $picPos1 = strpos($qstr, '**');
    $picPos2 = strpos($qstr, '.jpg');
    $imageName = substr($qstr, $picPos1 + 2, $picPos2 - $picPos1 - 2);
    $imageUrl  = $base . '/math/images/graphs/' . $imageName . '.jpg';

    $imageMarker = substr($qstr, $picPos1, $picPos2 - $picPos1 + 4);
    $rest = str_replace($imageMarker, '', $qstr);

    $posEq      = strpos($rest, '=');
    $prompt     = substr($rest, 0, $posEq);
    $choicesRaw = substr($rest, $posEq + 1);

    $posBr      = strpos($choicesRaw, '[');
    $posPlus    = strpos($choicesRaw, '+');
    $posBrClose = strpos($choicesRaw, ']');

    $answer = substr($choicesRaw, 0, $posBr);
    $wrong1 = substr($choicesRaw, $posBr + 1, $posPlus - $posBr - 1);
    $wrong2 = substr($choicesRaw, $posPlus + 1, $posBrClose - $posPlus - 1);
    $wrong3 = substr($choicesRaw, $posBrClose + 1);

    $questionBank[] = [
        'prompt'  => $prompt,
        'image'   => $imageUrl,
        'answer'  => $answer,
        'choices' => [$answer, $wrong1, $wrong2, $wrong3],
    ];
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

    $result = [
        'correct' => $isCorrect,
        'clicked' => $clicked,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    if (count($used) >= count($questionBank)) $used = [];
    $available = [];
    for ($i = 0; $i < count($questionBank); $i++) {
        if (!in_array($i, $used, true)) $available[] = $i;
    }
    $picked = $available[array_rand($available)];
    $used[] = $picked;
    $_SESSION[$sessionKey]['used'] = $used;

    $entry    = $questionBank[$picked];
    $shuffled = $entry['choices'];
    shuffle($shuffled);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'  => $entry['prompt'],
        'image'   => $entry['image'],
        'answer'  => $entry['answer'],
        'choices' => $shuffled,
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
    'score_top'     => $base . '/math/images/score-top-2.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-2.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <br>
    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="Line graph"
         style="max-width:480px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <p style="font-size:14pt; color:#666; margin-top:15px;">
        Your answer: <strong style="color:#0000CC;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <!-- Original question, verbatim, with the punctuation it was authored with -->
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.45;">
        <?php echo htmlspecialchars($cur['prompt']); ?>
    </p>

    <!-- Vertical gap then the answer -->
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>

    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <br>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="Line graph"
         style="max-width:480px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:640px; margin:20px auto; line-height:1.35;">
        <?php echo htmlspecialchars($q['prompt']); ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer.</p>
    <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();