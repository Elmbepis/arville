<?php
// math/modules/simple-experiments.php
// STATIC question bank + choice. Bypass QEngine per §D (fixed bank, not procedural).
// Uses ?ansclick + render_choices helper (§A).
//
// Level: Easy (single — legacy hardcoded $_SESSION['level']="Easy").
// Bank split per §H bug fix: legacy tested $grd > 4 but $grd was never assigned,
// so the hard bank (probability7, higher-scale) NEVER fired. Now reads
// $_SESSION['grade'] ?? 0 &#8594; grade 5+ correctly gets the hard bank.
//
// Feedback restates the question in probability form:
//   "If you spin this wheel 27 times, the probability you'll get a green or
//    yellow color is 14." — see restate_question() below.
//
// Theme: test67-* (110/582/108) &#8594; paper-69-* (75/655/70).
// Score box: score-*-2 (module's own, preserved per §C).
// DB row required: modules.url = 'simple-experiments.php'

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

$moduleTitle = 'Simple Experiments and<br/>Probabilities of Outcomes';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy'];
$grd         = (int)($_SESSION['grade'] ?? 0);  // §H bug fix — was never set in legacy

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// QUESTION BANK — format "prompt**image.jpg=answer[wrong1+wrong2]wrong3"
// Grade split per §H fix: legacy intended $grd > 4 &#8594; harder bank.
// ============================================================
if ($grd > 4) {
    $rawQuestions = [
        "If you flip a pair of dice 72 times, how many times would the sum of their outcomes be equal to 7?**probability3.jpg=12[24+18]30",
        "If you flip a pair of dice 144 times, how many times would the sum of their outcomes be equal to either 2 or 12?**probability3.jpg=8[16+4]32",
        "If you flip a pair of dice 72 times, how many times would the sum of their outcomes be equal to either 5 or 9?**probability3.jpg=16[8+12]20",
        "If you flip a pair of dice 72 times, how many times would the sum of their outcomes be equal to either 6 or 8?**probability3.jpg=20[16+12]8",
        "If you flip a pair of dice 72 times, how many times would the sum of their outcomes be GREATER than 9?**probability3.jpg=12[8+16]20",
        "If you flip a pair of dice 72 times, how many times would the sum of their outcomes be LESS than 5?**probability3.jpg=12[16+20]24",
        "If you spin this wheel 12 times, how many times would you get a 'C'?**probability1.jpg=4[6+8]2",
        "If you spin this wheel 12 times, how many times would you get a yellow color?**probability1.jpg=4[6+8]10",
        "If you spin this wheel 18 times, how many times would you get an 'A'?**probability1.jpg=6[9+3]12",
        "If you spin this wheel 24 times, how many times would you get a green color?**probability1.jpg=8[6+4]10",
        "If you spin this wheel 30 times, how many times would you get a 'D'?**probability1.jpg=5[3+4]6",
        "If you spin this wheel 33 times, how many times would you get a either a green or a yellow color?**probability1.jpg=22[20+18]16",
        "If you spin this wheel 14 times, how many times would you get a pink color?**probability2.jpg=6[4+8]10",
        "If you spin this wheel 14 times, how many times would you get a '3'?**probability2.jpg=6[7+8]9",
        "If you spin this wheel 28 times, how many times would you get a blue color?**probability2.jpg=8[7+6]9",
        "If you spin this wheel 21 times, how many times would you get either a '3' or a '4'?**probability2.jpg=15[13+11]9",
        "If you spin this wheel 21 times, how many times would you get either a green or a yellow color?**probability2.jpg=6[5+4]7",
        "If you spin this wheel 28 times, how many times would you get a color that's NOT pink?**probability2.jpg=16[15+14]13",
        "If you pick one marble from this jar 48 times, returning the marble to the jar after each pick, how many times would you get a red color?**probability4.jpg=20[22+24]26",
        "If you pick one marble from this jar 36 times, returning the marble to the jar after each pick, how many times would you get a blue color?**probability4.jpg=9[8+10]11",
        "If you pick one marble from this jar 36 times, returning the marble to the jar after each pick, how many times would you get either a green color or a yellow color?**probability4.jpg=12[10+11]13",
        "If you pick one marble from this jar 34 times, returning the marble to the jar after each pick, how many times would you get either a green color or a red color?**probability4.jpg=17[16+15]14",
        "If you pick one marble from this jar 24 times, returning the marble to the jar after each pick, how many times would you get a color that's NOT red?**probability4.jpg=14[15+16]17",
        "If you pick one marble from this jar 32 times, returning the marble to the jar after each pick, how many times would you get a color that's NOT blue?**probability4.jpg=24[23+25]26",
        "If you pick one card from a standard deck 76 times, returning the card to the deck after each pick, how many times would you get a red color?**probability5.jpg=38[37+36]39",
        "If you pick one card from a standard deck 104 times, returning the card to the deck after each pick, how many times would you get a red '5'?**probability5.jpg=4[8+16]2",
        "If you pick one card from a standard deck 104 times, returning the card to the deck after each pick, how many times would you get a king?**probability5.jpg=8[10+12]16",
        "If you pick one card from a standard deck 104 times, returning the card to the deck after each pick, how many times would you get a face card?**probability5.jpg=24[22+26]28",
        "If you pick one card from a standard deck 64 times, returning the card to the deck after each pick, how many times would you get a spade?**probability5.jpg=16[12+14]18",
        "If you pick one card from a standard deck 104 times, returning the card to the deck after each pick, how many times would you get either an ace or a number?**probability5.jpg=80[78+76]74",
        "If you pick a letter card from a set of 26 cards (A to Z) 104 times, returning the card to the set after each pick, how many times would you get a vowel?**probability6.jpg=20[22+24]26",
        "If you pick a letter card from a set of 26 cards (A to Z) 130 times, returning the card to the set after each pick, how many times would you get a consonant?**probability6.jpg=105[103+107]109",
        "If you pick a letter card from a set of 26 cards (A to Z) 156 times, returning the card to the set after each pick, how many times would you get an 'A', 'B', or 'C'?**probability6.jpg=18[14+16]20",
        "If you pick a number card from a set of 20 cards (1 to 20) 200 times, returning the card to the set after each pick, how many times would you get an even number below 16?**probability7.jpg=70[68+66]64",
        "If you pick a number card from a set of 20 cards (1 to 20) 200 times, returning the card to the set after each pick, how many times would you get an odd number greater than 7?**probability7.jpg=60[62+66]64",
        "If you pick a number card from a set of 20 cards (1 to 20) 100 times, returning the card to the set after each pick, how many times would you get a number that's greater than 7 AND less than 16?**probability7.jpg=40[38+42]44",
    ];
} else {
    $rawQuestions = [
        "If you flip a pair of dice 36 times, how many times would the sum of their outcomes be equal to 7?**probability3.jpg=6[12+9]15",
        "If you flip a pair of dice 72 times, how many times would the sum of their outcomes be equal to either 2 or 12?**probability3.jpg=4[8+2]16",
        "If you flip a pair of dice 36 times, how many times would the sum of their outcomes be equal to either 5 or 9?**probability3.jpg=8[4+6]10",
        "If you flip a pair of dice 36 times, how many times would the sum of their outcomes be equal to either 6 or 8?**probability3.jpg=10[8+6]4",
        "If you flip a pair of dice 72 times, how many times would the sum of their outcomes be GREATER than 9?**probability3.jpg=12[8+16]20",
        "If you flip a pair of dice 36 times, how many times would the sum of their outcomes be LESS than 5?**probability3.jpg=6[8+10]12",
        "If you spin this wheel 12 times, how many times would you get a 'C'?**probability1.jpg=4[6+8]2",
        "If you spin this wheel 12 times, how many times would you get a yellow color?**probability1.jpg=4[6+8]10",
        "If you spin this wheel 18 times, how many times would you get an 'A'?**probability1.jpg=6[9+3]12",
        "If you spin this wheel 24 times, how many times would you get a green color?**probability1.jpg=8[6+4]10",
        "If you spin this wheel 30 times, how many times would you get a 'D'?**probability1.jpg=5[3+4]6",
        "If you spin this wheel 33 times, how many times would you get a either a green or a yellow color?**probability1.jpg=22[20+18]16",
        "If you spin this wheel 14 times, how many times would you get a pink color?**probability2.jpg=6[4+8]10",
        "If you spin this wheel 14 times, how many times would you get a '3'?**probability2.jpg=6[7+8]9",
        "If you spin this wheel 28 times, how many times would you get a blue color?**probability2.jpg=8[7+6]9",
        "If you spin this wheel 21 times, how many times would you get either a '3' or a '4'?**probability2.jpg=15[13+11]9",
        "If you spin this wheel 21 times, how many times would you get either a green or a yellow color?**probability2.jpg=6[5+4]7",
        "If you spin this wheel 28 times, how many times would you get a color that's NOT pink?**probability2.jpg=16[15+14]13",
        "If you pick one marble from this jar 48 times, returning the marble to the jar after each pick, how many times would you get a red color?**probability4.jpg=20[22+24]26",
        "If you pick one marble from this jar 36 times, returning the marble to the jar after each pick, how many times would you get a blue color?**probability4.jpg=9[8+10]11",
        "If you pick one marble from this jar 36 times, returning the marble to the jar after each pick, how many times would you get either a green color or a yellow color?**probability4.jpg=12[10+11]13",
        "If you pick one marble from this jar 34 times, returning the marble to the jar after each pick, how many times would you get either a green color or a red color?**probability4.jpg=17[16+15]14",
        "If you pick one marble from this jar 24 times, returning the marble to the jar after each pick, how many times would you get a color that's NOT red?**probability4.jpg=14[15+16]17",
        "If you pick one marble from this jar 32 times, returning the marble to the jar after each pick, how many times would you get a color that's NOT blue?**probability4.jpg=24[23+25]26",
        "If you pick one card from a standard deck 76 times, returning the card to the deck after each pick, how many times would you get a red color?**probability5.jpg=38[37+36]39",
        "If you pick one card from a standard deck 104 times, returning the card to the deck after each pick, how many times would you get a red '5'?**probability5.jpg=4[8+16]2",
        "If you pick one card from a standard deck 104 times, returning the card to the deck after each pick, how many times would you get a king?**probability5.jpg=8[10+12]16",
        "If you pick one card from a standard deck 104 times, returning the card to the deck after each pick, how many times would you get a face card?**probability5.jpg=24[22+26]28",
        "If you pick one card from a standard deck 64 times, returning the card to the deck after each pick, how many times would you get a spade?**probability5.jpg=16[12+14]18",
        "If you pick one card from a standard deck 104 times, returning the card to the deck after each pick, how many times would you get either an ace or a number?**probability5.jpg=80[78+76]74",
        "If you pick a letter card from a set of 26 cards (A to Z) 52 times, returning the card to the set after each pick, how many times would you get a vowel?**probability6.jpg=10[11+12]13",
        "If you pick a letter card from a set of 26 cards (A to Z) 52 times, returning the card to the set after each pick, how many times would you get a consonant?**probability6.jpg=42[103+107]109",
    ];
}

// Dedupe — no duplicates expected, but safe
$rawQuestions = array_values(array_unique($rawQuestions));

// Parse each entry into structured form
$questionBank = [];
foreach ($rawQuestions as $qstr) {
    $picPos1 = strpos($qstr, '**');
    $picPos2 = strpos($qstr, '.jpg');
    $imageName = substr($qstr, $picPos1 + 2, $picPos2 - $picPos1 - 2);
    $imageUrl  = $base . '/math/images/others/' . $imageName . '.jpg';

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
// RESTATE_QUESTION — convert "how many times would …" phrasing
// into a probability statement for the feedback message.
//   "If you spin this wheel 27 times, how many times would you get a
//    green or yellow color?" + ans=14
// &#8594; "If you spin this wheel 27 times, the probability you'll get a
//    green or yellow color is 14."
//   "If you flip a pair of dice 72 times, how many times would the sum
//    of their outcomes be equal to 7?" + ans=12
// &#8594; "If you flip a pair of dice 72 times, the probability that the sum
//    of their outcomes will be equal to 7 is 12."
// Falls back to the original prompt + answer if no pattern matches.
// ============================================================
function restate_question($prompt, $answer) {
    $prompt = rtrim($prompt, ' ?');

    // Pattern 1: "…how many times would you get X"
    if (preg_match('/^(.*?), how many times would you get (.+)$/', $prompt, $m)) {
        return $m[1] . ", the probability<br/>you'll get " . $m[2] . " is " . $answer . ".";
    }

    // Pattern 2: "…how many times would SUBJ be COND"
    if (preg_match('/^(.*?), how many times would (.+?) be (.+)$/', $prompt, $m)) {
        return $m[1] . ", the probability<br/>that " . $m[2] . " will be " . $m[3] . " is " . $answer . ".";
    }

    // Fallback
    return $prompt . ". The correct answer is " . $answer . ".";
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
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <br>
    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="Probability diagram"
         style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <p style="font-size:14pt; color:#666; margin-top:15px;">
        Your answer: <strong style="color:#0000CC;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#800080; margin-top:15px; max-width:640px; margin-left:auto; margin-right:auto; line-height:1.45;">
        <?php echo htmlspecialchars(restate_question($cur['prompt'], $cur['answer'])); ?>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <br>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="Probability diagram"
         style="max-width:420px; border:1px solid #ccc; border-radius:6px; margin:10px 0;">
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:640px; margin:20px auto; line-height:1.35;">
        <?php echo htmlspecialchars($q['prompt']); ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on the best answer.</p>
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