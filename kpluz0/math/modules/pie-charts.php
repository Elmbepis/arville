<?php
// math/modules/pie-charts.php
// STATIC question bank + choice. Bypass QEngine per §D (fixed bank).
// Uses ?ansclick + render_choices helper (§A).
//
// Level: SINGLE-LEVEL (legacy hardcoded $_SESSION['level']="Easy").
// Bank: 27 questions across 7 pie charts (graph21-27).
//
// Layout: maxLen >= 5 &#8594; 2×2 grid; else 1 row.
//   Percentages (50%, 25%) &#8594; 1 row.
//   Comma-heavy strings (dogs, cats: 170) &#8594; 2×2.
//
// Theme: test67-* (110/582/108) &#8594; paper-69-* per §C fit test.
// Score box: score-*-2 (test67 frame matches line-graphs).
// DB row required: modules.url = 'pie-charts.php'

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

$moduleTitle = 'Interpreting Pie Charts';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

// ============================================================
// QUESTION BANK — format "prompt**image.jpg=answer[wrong1+wrong2]wrong3"
// ============================================================
$rawQuestions = [
    "Which two pets are the highest in number in our village and how many of them are there if the total number of pets in our village is 200?**graph21.jpg=dogs, cats: 170[dogs, cats: 160+dogs, cats: 150]dogs, fishes: 170",
    "Which two pets are the least in number in our village and how many of them are there if the total number of pets in our village is 300?**graph21.jpg=birds, rodents: 27[birds, rodents: 25+fishes, rodents: 27]birds, fishes: 25",
    "If there are 200 pets in our village and 10 of the dogs were replaced by their owners with cats, how many percent of the pets in our village would then be dogs?**graph21.jpg=50%[54%+52%]48%",
    "If there are 300 pets in our village and 15 of the cats were replaced by their owners with dogs, how many percent of the pets in our village would then be cats?**graph21.jpg=25%[26%+24%]23%",
    "Which two zoo animals are the most popular and how many votes did they get if the total number of votes is 250?**graph22.jpg=lion, tiger: 150[lion, tiger: 120+lion, elephant: 140]lion, hippo: 130",
    "Which two zoo animals are the least popular and how many votes did they get if the total number of votes is 320?**graph22.jpg=giraffe, elephant: 80[giraffe, elephant: 82+giraffe, hippo: 84]giraffe, hippo: 78",
    "If the total number of votes is 200 and 14 people who voted for lions changed their votes, how many percent of the votes would be for lions in the new survey results?**graph22.jpg=25%[24%+23%]22%",
    "If the total number of votes is 1000 and 10 people who initially didn't vote for giraffes changed their votes in favor of giraffes, how many percent of the votes would be for giraffes in the new survey results?**graph22.jpg=12%[13%+14%]15%",
    "If 280 people voted in this survey, how many votes did the zoo carnivores get?**graph22.jpg=168[170+172]174",
    "If 340 people voted in this survey, how many votes did the zoo herbivores?**graph22.jpg=136[138+132]134",
    "Which two components cost the most in the construction of a house and how many pesos would they cost if the total construction cost is 500,000?**graph23.jpg=labor, cement: 225,000[labor, cement: 215,000+labor, steel: 205,000]labor, steel: 235,000",
    "If the total construction cost of a house is 400,000 pesos, how much would timber, steel, and bricks cost in pesos?**graph23.jpg=160,000[170,000+180,000]190,000",
    "If the total construction cost of a house is 700,000 pesos, how much would you spend for labor and supervision in pesos?**graph23.jpg=280,000[170,000+180,000]190,000",
    "A house was constructed for 600,000 pesos. In pesos, how much of this was spent on cement and bricks?**graph23.jpg=210,000[205,000+200,000]195,000",
    "According to this pie chart, which two activities consume exactly 50% of a student's time?**graph24.jpg=sleep and homework[school and homework+homework and play]sleep and play",
    "If a student decides to sleep during half of his allotted for homework, how many percent of the day would he spend on sleep?**graph24.jpg=37.5%[35.5%+33.5%]39.5%",
    "If you follow the recommended diet shown for a 300-gram meal, how many grams of protein would you consume?**graph25.jpg=69[67+65]63",
    "If you follow the recommended diet shown for a 200-gram meal, how many grams of fruits and vegetables would you consume?**graph25.jpg=96[98+100]102",
    "If you follow the recommended diet shown for a 200-gram meal, how many grams of grains and dairy would you consume?**graph25.jpg=48[46+50]52",
    "Software upgrades constitute how many percent of the total computer lab expenditures?**graph26.jpg=25%[27%+23%]21%",
    "Approximately how many percent of the total computer lab expenditures is related to hardware?**graph26.jpg=35%[32%+29%]26%",
    "How many percent of his budget should a computer lab manager allocate for paper expenditures?**graph26.jpg=40%[36%+44%]48%",
    "How many percent of his budget should a computer lab manager allocate for software and hardware expenditures?**graph26.jpg=60%[63%+66%]69%",
    "If the total number of votes in this survey is 600, how many votes did the two MOST popular superheroes get?**graph27.jpg=408[420+432]444",
    "If the total number of votes in this survey is 450, how many votes did the two LEAST popular superheroes get?**graph27.jpg=144[140+136]132",
    "If the total number of votes in this survey is 700, how many votes did the Marvel superheroes get?**graph27.jpg=322[312+332]342",
    "If the total number of votes is 1000 and 20 people who initially didn't vote for Superman changed their votes in his favor, how many percent of the votes would be for Superman in the new survey results?**graph27.jpg=15%[14%+16%]17%",
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

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE — pick a random unused question from the bank
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
<style>
  .choice-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .choice-grid-2x2 > div { display: contents; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <br>
    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="Pie chart"
         style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <p style="font-size:14pt; color:#666; margin-top:15px;">
        Your answer: <strong style="color:#0000CC;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.5;">
        <?php echo htmlspecialchars($cur['prompt']); ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <br>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="Pie chart"
         style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:20px auto; line-height:1.5;">
        <?php echo htmlspecialchars($q['prompt']); ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer.</p>
    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
        $use2x2 = ($maxLen >= 5 && $maxLen <= 20);
    ?>
    <?php if ($use2x2): ?>
        <div class="choice-grid-2x2">
            <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
        </div>
    <?php else: ?>
        <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    <?php endif; ?>
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