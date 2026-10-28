<?php
// math/modules/probability-expressions.php
// STATIC question bank + choice. Bypass QEngine per §D (fixed bank).
// Uses ?ansclick + render_choices helper (§A).
//
// Level: SINGLE-LEVEL (legacy hardcoded $_SESSION['level']="Easy").
// Bank: 28 questions. Some carry graph28.jpg (Manila district pie chart).
//
// Layout — 3 tiers per user request (prose-like choices get 4 rows):
//   maxLen < 5         &#8594; 1 row  (4 short odds fit, e.g. "3:20")
//   5 &#8804; maxLen &#8804; 15    &#8594; 2×2    (e.g. "one in ten", "one in twenty")
//   maxLen > 15        &#8594; 4 rows, 1 per row (prose like "22.1% chance of rain",
//                              "one in a thousand" — two-across reads cramped)
//
// Theme: test67-* (110/582/108) &#8594; paper-69-* per §C fit test.
// Score box: score-*-2.
// DB row required: modules.url = 'probability-expressions.php'

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

$moduleTitle = 'Probability Expressions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level module

// ============================================================
// QUESTION BANK — format "prompt**image.jpg=answer[wrong1+wrong2]wrong3"
// ============================================================
$rawQuestions = [
    "If there is a 100% chance that it will rain in a certain city, but only 20% of the area of the city would get the rain once it happens, which of the following predictions applies to the ENTIRE city?=20% chance of rain[100% chance of rain+80% chance of rain]40% chance of rain",
    "If there is a 50% chance that it will rain in a small town, but 100% of the town would experience rainfall if it happens, which of the following predictions applies to the ENTIRE town?=50% chance of rain[100% chance of rain+25% chance of rain]75% chance of rain",
    "If there is a 50% chance that it will rain in a small town, but only 80% of the town would experience rainfall if it happens, which of the following predictions applies to the ENTIRE town?=40% chance of rain[50% chance of rain+80% chance of rain]60% chance of rain",
    "If there is a 20% chance that it will rain in a certain province, but only 10% of the province would experience rainfall if it happens, which of the following predictions applies to the ENTIRE province?=2% chance of rain[20% chance of rain+10% chance of rain]5% chance of rain",
    "If there is a 40% chance that it will rain in a certain city, but only 50% of the city would experience rainfall if it happens, which of the following predictions applies to the ENTIRE city?=20% chance of rain[40% chance of rain+10% chance of rain]25% chance of rain",
    "If there is a 70% chance that it will rain in a certain city, but only 40% of the city would experience rainfall if it happens, which of the following predictions applies to the ENTIRE city?=28% chance of rain[40% chance of rain+70% chance of rain]30% chance of rain",
    "If there's a 50% chance that it will rain in District 5 of Manila but 0% chance that it will rain in the other districts, how would the weatherman state his prediction of rainfall for the entire city of Manila?**graph28.jpg=14.5% chance of rain[22.1% chance of rain+50% chance of rain]30.7% chance of rain",
    "If there's a 100% chance that it will rain in Districts 1 and 2 of Manila but 0% chance that it will rain in the other districts, how would the weatherman state his prediction of rainfall for the entire city of Manila?**graph28.jpg=22% chance of rain[28% chance of rain+26% chance of rain]25% chance of rain",
    "If there's a 60% chance that it will rain in District 4 of Manila but 0% chance that it will rain in the other districts, how would the weatherman state his prediction of rainfall for the entire city of Manila?**graph28.jpg=7.8% chance of rain[6.2% chance of rain+5.7% chance of rain]4.1% chance of rain",
    "If there's an 80% chance that it will rain in District 3 of Manila but 0% chance that it will rain in the other districts, how would the weatherman state his prediction of rainfall for the entire city of Manila?**graph28.jpg=12.8% chance of rain[14.1% chance of rain+9.3% chance of rain]7.6% chance of rain",
    "If there's a 25% chance that it will rain in District 6 of Manila but 0% chance that it will rain in the other districts, how would the weatherman state his prediction of rainfall for the entire city of Manila?**graph28.jpg=5% chance of rain[4% chance of rain+6 chance of rain]7% chance of rain",
    "Which of the following expressions is closest in meaning to the probability that John would get 20 tails in a row if he honestly flips an honest coin 20 times?=one in a million[one in a billion+one in twenty]one in a thousand",
    "Which of the following expressions is closest in meaning to the probability that Hilda would get 30 heads in a row if she honestly flips an honest coin 30 times?=one in a billion[one in a million+one in thirty]one in a thousand",
    "Which of the following expressions refers to the probability that Rene would win in a raffle that sold 10000 tickets if he bought 10 tickets and only one winner would be drawn?=one in a thousand[one in a million+one in ten]one in a hundred",
    "Which of the following expressions refers to the probability that Loisa would win in a raffle that sold 100000 tickets if she bought 100 tickets and only one winner would be drawn?=one in a thousand[one in a million+one in ten]one in a hundred",
    "If a team is expected to win only three of the twenty games in a tournament, which of these expresses the odds IN FAVOR of the team winning a game?=3:20[20:3+1:23]1:60",
    "If a team is expected to win only seven of the fifty games in a tournament, which of these expresses the odds AGAINST the team winning a game?=50:7[7:50+57:1]1:57",
    "If Nestor has 10 tickets in a raffle drum that contains 1000 tickets, which of these expresses the odds IN FAVOR of Nestor's name being drawn?=1:100[100:1+1:1000]1000:1",
    "If Kristy has 25 tickets in a raffle drum that contains 500 tickets, which of these expresses the odds AGAINST Kristy's name being drawn?=20:1[1:20+1:500]500:1",
    "Which of these expresses the odds IN FAVOR of drawing a King of Hearts from a normal deck of cards?=1:52[52:1+1:13]13:1",
    "Which of these expresses the odds AGAINST drawing a Queen from a normal deck of cards?=13:1[1:13+1:52]52:1",
    "Which of these expresses the odds IN FAVOR of drawing a black Jack from a normal deck of cards?=1:26[26:1+1:13]13:1",
    "Which of these expresses the odds AGAINST drawing two red Queens consecutively from a normal deck of cards, if the drawing is done with replacement?=676:1[1:676+1:26]26:1",
    "Which of these expresses the odds IN FAVOR of drawing two aces consecutively from a normal deck of cards, if the drawing is done without replacement?=1:221[221:1+1:169]169:1",
    "Which of the following expressions refers to the probability of drawing a red marble from a bag that contains 2 red marbles, 7 blue marbles, 6 green marbles, and 5 yellow marbles?=one in ten[one in twenty+two in ten]one in two",
    "Which of the following expressions refers to the probability of drawing a blue marble from a bag that contains 5 red marbles, 3 blue marbles, 4 green marbles, and 3 yellow marbles?=one in five[one in fifteen+three in ten]one in three",
    "Which of the following expressions refers to the probability of drawing a 5-peso coin from a jar that contains 50 1-peso coins, 20 5-peso coins, and 30 10-peso coins?=one in five[one in a hundred+one in ten]one in twenty",
    "Which of the following expressions refers to the probability of drawing a 1-peso coin from a jar that contains 100 1-peso coins, 500 5-peso coins, and 400 10-peso coins?=one in ten[one in a hundred+one in a thousand]one in five",
];

$rawQuestions = array_values(array_unique($rawQuestions));

$questionBank = [];
foreach ($rawQuestions as $qstr) {
    $imageUrl = null;

    if (strpos($qstr, '**') !== false && strpos($qstr, '.jpg') !== false) {
        $picPos1 = strpos($qstr, '**');
        $picPos2 = strpos($qstr, '.jpg');
        $imageName = substr($qstr, $picPos1 + 2, $picPos2 - $picPos1 - 2);
        $imageUrl  = $base . '/math/images/graphs/' . $imageName . '.jpg';
        $imageMarker = substr($qstr, $picPos1, $picPos2 - $picPos1 + 4);
        $rest = str_replace($imageMarker, '', $qstr);
    } else {
        $rest = $qstr;
    }

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
  /* 2×2 grid — for medium-length choices (5–15 chars) */
  .choice-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .choice-grid-2x2 > div { display: contents; }

  /* 1-col stack — for long prose choices (> 15 chars), 1 per row */
  .choice-grid-1col {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .choice-grid-1col > div { display: contents; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <?php if ($cur['image']): ?>
        <br>
        <img src="<?php echo htmlspecialchars($cur['image']); ?>"
             alt="Probability diagram"
             style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <?php endif; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
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
    <?php if ($q['image']): ?>
        <br>
        <img src="<?php echo htmlspecialchars($q['image']); ?>"
             alt="Probability diagram"
             style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <?php endif; ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:20px auto; line-height:1.5;">
        <?php echo htmlspecialchars($q['prompt']); ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer.</p>
    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));

        // 3-tier layout per user request:
        //   < 5          &#8594; 1 row   (short odds: "3:20")
        //   5 to 15      &#8594; 2×2     (medium: "one in ten")
        //   > 15         &#8594; 1 col   (prose: "22.1% chance of rain")
        $use1col = ($maxLen > 15);
        $use2x2  = (!$use1col && $maxLen >= 5);
    ?>
    <?php if ($use1col): ?>
        <div class="choice-grid-1col">
            <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
        </div>
    <?php elseif ($use2x2): ?>
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