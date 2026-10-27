<?php
// math/modules/bar-graphs.php
// STATIC question bank + choice. Bypass QEngine per §D (fixed bank, not procedural).
// Uses ?ansclick + render_choices helper (§A).
//
// Level: Easy (single — legacy hardcoded $_SESSION['level']="Easy").
// Bank: grade &#8804; 3 &#8594; easy (graphs 1-5); grade > 3 &#8594; hard (graphs 1-7).
// $grd bug fix (§H): legacy used $grd without ever assigning it, so the easy
//                    bank was ALWAYS used regardless of grade. Now reads
//                    $_SESSION['grade'] ?? 0.
//
// Layout rule (§A refinement): 4 text choices are length-driven.
//   maxLen &#8804; 7    &#8594; one row (plain flex)
//   8 &#8804; maxLen &#8804; 20 &#8594; 2×2 grid (avoids the 3+1 wrap)
//   maxLen > 20   &#8594; one per row (plain flex already does this)
//
// Feedback restates the question inline with the answer — see restate_question().
//
// Theme: test67-* (110/582/108) &#8594; paper-69-* (75/655/70).
// Score box: score-*-2 (module's own, preserved per §C).
// DB row required: modules.url = 'bar-graphs.php'

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

$moduleTitle = 'Interpreting Bar Graphs';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy'];
$grd         = (int)($_SESSION['grade'] ?? 0);  // §H bug fix — was never set in legacy

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// QUESTION BANK — format "prompt**image.jpg=answer[wrong1+wrong2]wrong3"
// ============================================================
if ($grd <= 3) {
    $rawQuestions = [
        "Which animal got the highest number of votes as the students' favorite pet and how many votes did it get?**graph1.jpg=dog, 10[bird, 8+dog, 11]bird, 9",
        "Which animal got the lowest number of votes as the students' favorite pet and how many votes did it get?**graph1.jpg=turtle, 3[fish, 3+turtle, 4]turtle, 2",
        "All in all, how many students voted for the three MOST favorite pets in the graph?**graph1.jpg=25[26+24]23",
        "All in all, how many students voted for the three LEAST favorite pets in the graph?**graph1.jpg=16[17+18]19",
        "If two of the students who voted for dogs voted for turtles instead, what would be the difference between the votes for dogs and the votes for turtles?**graph1.jpg=3[4+5]2",
        "If one of the students who voted for birds voted for turtles instead, what would be the difference in number between the votes for the two most popular animals and the votes for the two least popular animals?**graph1.jpg=0[1+2]3",
        "Which subject got the highest number of votes as the students' favorite and how many votes did it get?**graph2.jpg=science, 10[English, 9+math, 9]science, 11",
        "Which subject got the lowest number of votes as the students' favorite and how many votes did it get?**graph2.jpg=AP, 5[AP, 4+Filipino, 5]AP, 3",
        "All in all, how many students voted for the three MOST favorite subjects in the graph?**graph2.jpg=27[26+28]29",
        "All in all, how many students voted for the three LEAST favorite subjects in the graph?**graph2.jpg=19[16+17]18",
        "If two of the students who voted for science voted for AP instead, what would be the difference between the votes for science and the votes for AP?**graph2.jpg=1[2+3]4",
        "If one of the students who voted for science voted for Filipino instead, what would be the difference in number between the votes for the two most popular subjects and the votes for the two least popular subjects?**graph2.jpg=6[5+4]7",
        "Who collected the highest number of coins and how many coins did he collect?**graph3.jpg=Ringo, 100[Ringo, 90+Ringo, 80]John, 110",
        "Who collected the lowest number of coins and how many coins did he collect?**graph3.jpg=Pete, 60[George, 30+Pete, 40]Pete, 50",
        "How many coins did the top two collectors collect?**graph3.jpg=190[170+180]200",
        "How many coins did the bottom two collectors collect?**graph3.jpg=130[140+120]110",
        "If Ringo gave 10 of his coins to Pete, the difference in number between John's coins and Pete's coins would now be what?**graph3.jpg=20[10+30]40",
        "If John gave 10 of his coins to Pete, the difference between the sum of Ringo and Pete's coins and the sum of John and Paul's coins would now be what?**graph3.jpg=10[0+20]30",
        "Our village has the most number of which type of vehicle and how many of such type are there?**graph4.jpg=tricycles, 80[jeepneys, 90+tricycles, 75]tricycles, 85",
        "Our village has the least number of which type of vehicle and how many of such type are there?**graph4.jpg=vans, 25[vans, 30+cars, 20]vans, 20",
        "How many cars and jeepneys are there in our village?**graph4.jpg=90[75+80]85",
        "How many vehicles are there in our village all in all?**graph4.jpg=195[200+205]210",
        "If our village wants to have twice as many tricycles as jeepneys, how many tricycles should we add?**graph4.jpg=30[35+25]40",
        "If our village exchanged 30 of our tricycles with 5 vans from another village, the difference in number between outr tricycles and our vans would now be what?**graph4.jpg=20[10+0]30",
        "Which type of toy do I have the most number of in my room and how many of such type do I have?**graph5.jpg=animals, 35[animals, 31+animals, 33]guns, 37",
        "Which type of toy do I have the least number of in my room and how many of such type do I have?**graph5.jpg=cars, 20[robots, 18+cars, 22]cars, 24",
        "How many toy cars and toy guns are in my room?**graph5.jpg=50[60+70]80",
        "How many toys do I have in my room all in all?**graph5.jpg=110[105+100]115",
        "If I want to have twice as many toy animals as toy cars, how many toy animals should I buy?**graph5.jpg=5[10+0]15",
        "If I gave away 5 toy animals and bought 5 new toy cars, the difference in number between my toy animals and my toy cars would now be what?**graph5.jpg=5[10+0]15",
    ];
} else {
    $rawQuestions = [
        "All in all, how many students voted for the three MOST favorite pets in the graph?**graph1.jpg=25[26+24]23",
        "All in all, how many students voted for the three LEAST favorite pets in the graph?**graph1.jpg=16[17+18]19",
        "If two of the students who voted for dogs voted for turtles instead, what would be the difference between the votes for dogs and the votes for turtles?**graph1.jpg=3[4+5]2",
        "If one of the students who voted for birds voted for turtles instead, what would be the difference in number between the votes for the two most popular animals and the votes for the two least popular animals?**graph1.jpg=0[1+2]3",
        "All in all, how many students voted for the three MOST favorite subjects in the graph?**graph2.jpg=27[26+28]29",
        "All in all, how many students voted for the three LEAST favorite subjects in the graph?**graph2.jpg=19[16+17]18",
        "If two of the students who voted for science voted for AP instead, what would be the difference between the votes for science and the votes for AP?**graph2.jpg=1[2+3]4",
        "If one of the students who voted for science voted for Filipino instead, what would be the difference in number between the votes for the two most popular subjects and the votes for the two least popular subjects?**graph2.jpg=6[5+4]7",
        "How many coins did the top two collectors collect?**graph3.jpg=190[170+180]200",
        "How many coins did the bottom two collectors collect?**graph3.jpg=130[140+120]110",
        "If Ringo gave 10 of his coins to Pete, the difference in number between John's coins and Pete's coins would now be what?**graph3.jpg=20[10+30]40",
        "If John gave 10 of his coins to Pete, the difference between the sum of Ringo and Pete's coins and the sum of John and Paul's coins would now be what?**graph3.jpg=10[0+20]30",
        "How many cars and jeepneys are there in our village?**graph4.jpg=90[75+80]85",
        "How many vehicles are there in our village all in all?**graph4.jpg=195[200+205]210",
        "If our village wants to have twice as many tricycles as jeepneys, how many tricycles should we add?**graph4.jpg=30[35+25]40",
        "If our village exchanged 30 of our tricycles with 5 vans from another village, the difference in number between outr tricycles and our vans would now be what?**graph4.jpg=20[10+0]30",
        "How many toy cars and toy guns are in my room?**graph5.jpg=50[60+70]80",
        "How many toys do I have in my room all in all?**graph5.jpg=110[105+100]115",
        "If I want to have twice as many toy animals as toy cars, how many toy animals should I buy?**graph5.jpg=5[10+0]15",
        "If I gave away 5 toy animals and bought 5 new toy cars, the difference in number between my toy animals and my toy cars would now be what?**graph5.jpg=5[10+0]15",
        "During which quarter did I get my highest grade in math when I was in Grade 3 and what grade did I get that time?**graph6.jpg=4th, 96%[4th, 98%+2nd, 98%]2nd, 96%",
        "During which quarter did I get my lowest grade in math when I was in Grade 3 and what grade did I get that time?**graph6.jpg=1st, 88%[1st, 86%+3rd, 90%]3rd, 86%",
        "During which quarter did I get my highest grade in math when I was in Grade 4 and what grade did I get that time?**graph6.jpg=2nd, 96%[2nd, 98%+4th, 98%]4th, 96%",
        "During which quarter did I get my lowest grade in math when I was in Grade 4 and what grade did I get that time?**graph6.jpg=3rd, 90%[1st, 86%+1st, 88%]3rd, 88%",
        "If we want to have a 4-year average sales in food of 8 million per year from 2018 to 2021, how many pesos worth of food should we sell in 2021?**graph7.jpg=12 million[14 million+8 million]10 million",
        "During which year did we have our highest sales in food and how many pesos worth of food did we sell that time?**graph7.jpg=2020, 12 million[2020, 13 million+2019, 10 million]2019, 11 million",
        "During which year did we have our lowest sales in food and how many pesos worth of food did we sell that time?**graph7.jpg=2019, 2 million[2019, 1 million+2018, 4 million]2018, 3 million",
        "During which year did we have our highest sales in clothing and how many pesos worth of clothing did we sell that time?**graph7.jpg=2019, 10 million[2020, 12 million+2020, 10 million]2019, 11 million",
        "During which year did we have our lowest sales in clothing and how many pesos worth of clothing did we sell that time?**graph7.jpg=2018, 4 million[2019, 1 million+2019, 2 million]2018, 3 million",
        "If we want to have a 4-year average sales in food of 8 million per year from 2018 to 2021, how many pesos worth of food should we sell in 2021?**graph7.jpg=12 million[14 million+8 million]10 million",
        "If we want to have a 3-year average sales in food of 10 million per year from 2019 to 2021, how many pesos worth of food should we sell in 2021?**graph7.jpg=16 million[14 million+12 million]18 million",
    ];
}

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
// RESTATE_QUESTION — convert "…how many…?" prompts into statements
// with the answer woven in. Falls back to "<prompt>. The answer is X."
// ============================================================
function restate_question($prompt, $answer) {
    $p = rtrim($prompt, ' ?');

    if (preg_match('/^All in all, how many (.+)$/', $p, $m)) {
        return "All in all, {$answer} {$m[1]}.";
    }
    if (preg_match('/^How many (.+) are there in (.+)$/', $p, $m)) {
        return "There are {$answer} {$m[1]} in {$m[2]}.";
    }
    if (preg_match('/^How many (.+) are in (.+)$/', $p, $m)) {
        return "There are {$answer} {$m[1]} in {$m[2]}.";
    }
    if (preg_match('/^How many (.+) do I have in (.+) all in all$/', $p, $m)) {
        return "All in all, you have {$answer} {$m[1]} in {$m[2]}.";
    }
    if (preg_match('/^How many (.+) did (.+?) collect$/', $p, $m)) {
        return ucfirst($m[2]) . " collected {$answer} {$m[1]}.";
    }
    if (preg_match('/what would be the difference/i', $p)) {
        return "The difference would be {$answer}.";
    }
    if (preg_match('/would now be what$/i', $p)) {
        return "The difference would be {$answer}.";
    }
    if (preg_match('/how many (.+?) should (?:I|we) (.+)$/i', $p, $m)) {
        return "You should {$m[2]} {$answer} {$m[1]}.";
    }
    if (preg_match('/^Which (.+?) got the (.+?) (.+?) and how many (.+?) did it get$/', $p, $m)
        && preg_match('/^(.+?), (\d+)$/', $answer, $am)) {
        return "The {$m[1]} with the {$m[2]} {$m[3]} is {$am[1]} ({$am[2]} {$m[4]}).";
    }
    if (preg_match('/^Who (.+?) and how many (.+?) did he collect$/', $p, $m)
        && preg_match('/^(.+?), (\d+)$/', $answer, $am)) {
        return "{$am[1]} {$m[1]}, with {$am[2]} {$m[2]}.";
    }
    return $p . ". The answer is {$answer}.";
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
<style>
  /* Length-driven 2×2 grid — only applied when render block sets the class.
     auto auto sizes columns to button --choice-width; justify-content
     centres the grid. display:contents on the inner flex wrapper makes its
     children participate directly in the grid. */
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
         alt="Bar graph"
         style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <p style="font-size:14pt; color:#666; margin-top:15px;">
        Your answer: <strong style="color:#0000CC;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#800080; margin-top:15px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.45;">
        <?php echo htmlspecialchars(restate_question($cur['prompt'], $cur['answer'])); ?>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <?php
        // §A length-driven layout: narrow choices &#8594; one row; medium &#8594; 2×2;
        // wide &#8594; plain flex already falls to 1-per-row.
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
        $use2x2 = ($maxLen >= 8 && $maxLen <= 20);
    ?>
    <br>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="Bar graph"
         style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:600px; margin:20px auto; line-height:1.35;">
        <?php echo htmlspecialchars($q['prompt']); ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer.</p>
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