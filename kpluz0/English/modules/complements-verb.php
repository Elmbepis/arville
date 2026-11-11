<?php
// english/modules/complements-verb.php
// FIB (free-text entry). Bypass QEngine per §D.
// Student types the complete phrase that serves as the verb complement
// in the given sentence. For tiers 2-5, the target verb is highlighted
// in blue; for tier 1, the verb is plain (student identifies it).
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Grade-keyed tier assignment (bank has 5 tiers):
//     grd 0-5 &#8594; Easy: 1; Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 6-7 &#8594; Easy: 2; Hard: rand(3,4)   [Medium=3, Hard=4]
//     grd 8+  &#8594; Easy: 3; Hard: rand(4,5)   [Medium=4, Hard=5]
//   Rationale: modern Hard takes the union of legacy Medium + legacy Hard.
//
// Names ($n1..$n4): boys/girls arrays — freshly picked on each generate.
// Several sentences reference them.
//
// Sentence bank: each entry has "*answer+" markers for the complement and
// "(verb)" markers for the target verb. Question displays the answer
// markers stripped, and shows "(verb)" either stripped (tier 1) or
// highlighted blue (tiers 2+). Feedback shows both — answer red, verb blue.
//
// Legacy bug fixed: the feedback note formerly used `$grd==4 && level=="Easy"`
// to choose "main verb" vs "blue verb" — that mis-labeled every other
// tier-1 grade combo. Modern: base on tier (`$arrnum === 1`) for both the
// question prompt and the feedback note — consistent with legacy's own
// question-prompt logic.
//
// FIB canonicalization: lowercase + strip whitespace/punctuation
// (periods, commas, apostrophes, quotes).
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Theme: ex-23-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'complements-verb.php'

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

$moduleTitle = 'Verb Complements';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 5)));

// Level + grade &#8594; tier (§10)
$grdKey = ($grd <= 5) ? 0 : (($grd <= 7) ? 1 : 2);
$configs = [
    0 => ['Easy' => [1, 1], 'Hard' => [2, 3]],
    1 => ['Easy' => [2, 2], 'Hard' => [3, 4]],
    2 => ['Easy' => [3, 3], 'Hard' => [4, 5]],
];
$range  = $configs[$grdKey][$lvl];
$arrnum = rand($range[0], $range[1]);

// ============================================================
// Sentence bank builder
// ============================================================
function cv_build_bank($n1, $n2, $n3, $n4) {
    $bank = [];

    $bank[1] = [
        "He (demanded) *to know the truth+.",
        "$n3 (deserves) *to get a medal+.",
        "$n1 (failed) *to get her attention+.",
        "I will (attempt) *to reason with him+.",
        "They all (claim) *to be smart+.",
        "$n3 (needs) *to get some help+.",
        "$n1 (likes) *to receive praises+.",
        "$n1 (hates) *to hear criticisms+.",
        "Fans (enjoy) *watching the game+.",
        "We don't (mind) *being outside+.",
        "Do you (swear) *to tell the truth+?",
        "I (promise) *to pay for your food+.",
        "He can't (avoid) *teasing $n3+.",
        "The boy (denied) *stealing the toy+.",
        "They (keep) *trusting their instincts+.",
        "$n3 (finished) *reading her book+.",
        "Let's (practice) *playing the piano+.",
        "She (recalls) *being a cheerleader+.",
        "He (admitted) *taking her candies+.",
        "You will (miss) *being with her+.",
        "They (wanted) *to see $n1 sing+.",
        "I (used) *to go to that school+.",
        "The guard (remembered) *to lock the gate+.",
        "I finally (learned) *to speak Mandarin+.",
        "$n1 and I (chose) *to live here+.",
        "My players (intend) *to win this game+.",
        "$n1 (prefers) *sitting on a stool+.",
        "$n3 (agreed) *that this is not safe+.",
    ];

    $bank[2] = [
        "Our supervisor (consented) *to interview them+.",
        "$n1 (sought) *to find peace+ and found it.",
        "Your new friend (begged) *$n1 to call+, so he did.",
        "Her sisters (urged) *her to be there+ but she didn't come.",
        "They (need) *to buy some food+ but they have no money.",
        "$n3 (asked) *him to go home+ but he refused.",
        "$n3 (requested) *the guest to sing+ and he obliged.",
        "They (thought) *he would fail+, but he proved them all wrong.",
        "$n1 didn't even (hesitate) *to join the math contest+.",
        "She (neglected) *her duty+ and paid dearly for it.",
        "My mind (tends) *to drift+ whenever I'm in that meeting.",
        "Don't (pretend) *to like her+ because you really don't.",
        "The company won't even (consider) *hiring my friend+.",
        "He once (tried) *eating the head+ but didn't like it.",
        "Did you (mention) *having seven dogs+ when we last met?",
        "$n1 and I (used) *to play tennis+ when we were young.",
        "Those criminals (deserve) *to rot in jail+, don't they?",
        "He (exclaimed) *that he had won in the lottery+ then cried.",
        "$n1 (insisted) *that we try it+ and we were glad we did.",
    ];

    $bank[3] = [
        "The experienced pilot (enjoyed) *landing the enormous airplane+.",
        "$n1 (vowed) *to search for the lost relic+ so I felt relieved.",
        "$n1 (likes) *interacting with them+ but he feels dizzy right now.",
        "The professor (tried) *to challenge+ his students, but to no avail.",
        "She (forgot) *to pick up the children+ until $n1 reminded her.",
        "$n3 couldn't (afford) *to buy a car+ until she won the lottery.",
        "I am (planning) *to go to Europe+, but only if we hit our target.",
        "The policeman (volunteered) *to protect our home+ until we get back.",
        "The businessman (offered) *to pay for the equipment+ but I refused.",
        "$n1 must (start) *preparing for the match+ if he really wants to win.",
        "We (expected) *$n1 to win+ but he lost in the second round.",
        "I (regret) *becoming a mayor+ now that I see how politics works.",
        "He (struggled) *to explain his absence+ when they met yesterday.",
        "$n3 (wishes) *to work as a writer+ so I'll try to help her.",
        "Try not to (mention) *owning these guns+ during your job interview.",
        "He (forgot) *that we have met before+ and asked what my name is.",
        "$n3 (verified) *that she had received the check+ then thanked them.",
    ];

    $bank[4] = [
        "Our teacher doesn't (tolerate) *cheating+, which is why we all value honesty.",
        "$n3 was able to (convince) *everyone to help+, which led to the project's success.",
        "The students asked the university to (help) *them raise the money+, but to no avail.",
        "$n3 (forgot) *to bring a lot of cash+ and was forced to drop out of the auction.",
        "He couldn't (afford) *to go abroad+, so he just travelled around the country.",
        "I'm sure they'll (refuse) *to work with us+ but let's try asking them just the same.",
        "The governor (admitted) *harassing the teachers+ while they were guarding the ballots.",
        "$n1 (pretended) *being very ill+ just to get his girlfriend's attention and sympathy.",
        "She (recalls) *taking that photograph+ when they went snorkeling in Batangas.",
        "Did you (remember) *to activate the security system+ before you left the premises?",
        "Let's (begin) *buying those foreclosed properties+ before somebody else beats us to it.",
        "$n1 (attempted) *to catch the giant shark+ as the TV crew filmed him.",
        "$n3 (coaxed) *$n1 to take voice lessons+ so he enrolled in our studio.",
        "$n1 (announced) *that he would resign+, surprising many of his officemates.",
        "The burglar (confessed) *that he stole the laptop+ then asked for forgiveness.",
        "The law (dictates) *that everyone must pay taxes+ and that includes you.",
    ];

    $bank[5] = [
        "Those boys on skateboards (struggled) *to maintain their balance+ but they couldn't keep going.",
        "The brilliant mathematician (managed) *to organize the conference+ despite his limited funding.",
        "Our team (prefers) *renegotiating a new deal+ but the other side wants to keep the original one.",
        "The guest speaker (recalls) *peddling rice cakes+ just to earn enough money for her own education.",
        "The manager doesn't (tolerate) *horseplaying+ since this can result in injuries and property damage.",
        "The law enforcers (intend) *to apprehend the mastermind+ so they can use him to flush out his cohorts.",
        "The fans (demanded) *to see their favorite celebrity+, only to find out that she had left the hotel already.",
        "$n3 (requested) *the investor to be her mentor+ and was pleasantly surprised when he acceded.",
        "The entrepreneur (persuaded) *the bank to give him a loan+, which allowed him to expand his business.",
        "The salesman (convinced) *us to buy this car+ by enumerating features that we thought we'd need.",
        "I alone will (decide) *when to leave my job+ even though my decision will affect many other people.",
        "The investigator (concluded) *that $n1 is the culprit+ and requested his immediate arrest.",
        "$n1 (regretted) *not being able to afford a car+ until he saw people who couldn't afford to eat.",
        "Her uncle (responded) *that he would be glad to participate+ when asked to volunteer for an experiment.",
        "$n1 (realized) *that he had committed a crime+ when the policemen came knocking on his door.",
        "The scientist (insisted) *that there was a flaw in the analysis+ so they all agreed to analyze the data again.",
    ];

    return $bank;
}

// Boys / girls pools for name injection
$boys = [
    "Adam","Alexander","Andrew","Angelo","Benjamin","Brandon","Carlos","Charles","Christopher","Daniel",
    "David","Diego","Dominic","Gabriel","Ian","Isaac","Jack","Jacob","James","Jason","Jose","John","Jonathan",
    "Joseph","Joshua","Juan","Kevin","Lucas","Luis","Luke","Matthew","Max","Michael","Nathan","Nicholas","Noah","Oliver",
    "Robert","Romeo","Ryan","Samuel","Sebastian","Thomas","William",
];
$girls = [
    "Alyssa","Amelia","Andrea","Anna","Ariana","Bella","Betty","Camille","Caroline","Claire","Elizabeth","Emma","Eva","Evelyn",
    "Grace","Hannah","Isabella","Jasmine","Jocelyn","Jolina","Julia","Katherine","Lauren","Layla","Leah","Lillian","Lydia","Madeline","Maria",
    "Mariah","Melanie","Mia","Naomi","Natalie","Olivia","Samantha","Sarah","Sophia","Stella","Tina","Victoria",
];

// ============================================================
// FIB canonicalization + scoring
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = (string)($_POST['answer'] ?? '');
    $canon    = strtolower(preg_replace('/[\s\.,\'"?!]+/', '', $raw));
    $corCanon = strtolower(preg_replace('/[\s\.,\'"?!]+/', '', $cur['answer']));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($canon, $corCanon, $cur['lvl']);

    $result = ['correct' => $isCorrect, 'userInput' => $raw, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// THEME
// ============================================================
$theme = [
    'top_banner'    => $base . '/english/images/ex-23-top.jpg',
    'title_bg'      => $base . '/english/images/ex-23-top2.jpg',
    'left_side'     => $base . '/english/images/ex-23-left.jpg',
    'right_side'    => $base . '/english/images/ex-23-right.jpg',
    'content_bg'    => $base . '/english/images/ex-23-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-23-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// Render helpers
// ============================================================
function cv_render_question($sentence, $arrnum) {
    $s = str_replace(['*', '+'], '', $sentence);
    if ($arrnum === 1) {
        return str_replace(['(', ')'], '', $s);
    }
    $s = str_replace('(', '<strong style="color:#0000CC;">', $s);
    return str_replace(')', '</strong>', $s);
}

function cv_render_feedback($sentence, $arrnum) {
    $s = str_replace('*', '<strong style="color:#CC0066;">', $sentence);
    $s = str_replace('+', '</strong>', $s);
    if ($arrnum === 1) {
        return str_replace(['(', ')'], '', $s);
    }
    $s = str_replace('(', '<strong style="color:#0000CC;">', $s);
    return str_replace(')', '</strong>', $s);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $bc = count($boys) - 1;
    $n1 = $boys[rand(0, $bc)];
    do { $n2 = $boys[rand(0, $bc)]; } while ($n2 === $n1);

    $gc = count($girls) - 1;
    $n3 = $girls[rand(0, $gc)];
    do { $n4 = $girls[rand(0, $gc)]; } while ($n4 === $n3);

    $bank = cv_build_bank($n1, $n2, $n3, $n4);
    $pool = $bank[$arrnum];

    $usedKey = 'used_' . $arrnum;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    $safety = 0;
    do {
        $idx = rand(0, count($pool) - 1);
        $safety++;
    } while (in_array($idx, $used, true) && $safety < 60);
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $qsentence = $pool[$idx];

    $p1 = strpos($qsentence, '*');
    $p2 = strpos($qsentence, '+');
    if ($p1 === false || $p2 === false) {
        $qsentence = $pool[0];
        $p1 = strpos($qsentence, '*');
        $p2 = strpos($qsentence, '+');
    }
    $answer = substr($qsentence, $p1 + 1, $p2 - $p1 - 1);

    $_SESSION[$sessionKey]['current'] = [
        'sentence_q'  => cv_render_question($qsentence, $arrnum),
        'sentence_fb' => cv_render_feedback($qsentence, $arrnum),
        'answer'      => $answer,
        'arrnum'      => $arrnum,
        'lvl'         => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .cs-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 16px;
    line-height: 1.4;
  }
  .cs-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 24px 32px;
    width: fit-content;
    max-width: 480px;
    margin: 50px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.4rem;
    font-weight: 600;
    color: #333;
    line-height: 1.4;
    text-align: center;
    box-sizing: border-box;
  }
  .cs-card.cs-feedback {
    font-size: 1.1rem;
  }
  .cs-answer-row {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin: 24px auto;
    flex-wrap: wrap;
  }
  .cs-answer-row label {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.05rem;
    font-weight: 600;
    color: #800080;
  }
  .cs-input {
    text-align: center;
    height: 46px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: #0000BB;
    border: 2px solid #b0b0d8;
    border-radius: 10px;
    background: #fff;
    padding: 0 14px;
    box-sizing: border-box;
  }
  .cs-input:focus { outline: none; border-color: #8080ff; background: #f8f8ff; }
  .cs-fb-note {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.05rem;
    color: #800080;
    text-align: center;
    margin: 20px auto 8px;
    line-height: 1.6;
  }
  .cs-xref {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 0.9rem;
    color: #454545;
    text-align: center;
    margin: 20px auto;
    max-width: 520px;
    line-height: 1.5;
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['userInput']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p class="cs-fb-note">
        <?php if ($cur['arrnum'] === 1): ?>
            The complete complement of the main verb<br/>in this sentence is
        <?php else: ?>
            The complete complement of the blue verb<br/>in this sentence is
        <?php endif; ?>
        <strong style="color:#CC0066; font-size:1.15rem;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <div class="cs-card cs-feedback"><?php echo $cur['sentence_fb']; ?></div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="cs-prompt">
        <?php if ($q['arrnum'] === 1): ?>
            Write the complete complement<br>of the main verb in this sentence.
        <?php else: ?>
            Write the complete complement<br>of the blue verb in this sentence.
        <?php endif; ?>
    </p>
    <div class="cs-card"><?php echo $q['sentence_q']; ?></div>

    <?php $inputWidth = max(220, (strlen($q['answer']) + 4) * 16); ?>
    <div class="cs-answer-row">
        <label>Answer:</label>
        <input type="text" name="answer" class="cs-input"
               style="width: <?php echo $inputWidth; ?>px;"
               maxlength="<?php echo strlen($q['answer']) + 6; ?>"
               autocomplete="off" autofocus>
    </div>

    <div style="margin-top:20px;">
        <br/><input type="submit" name="Submit1" value=" Submit " style="margin:0 10px;">
        <input type="submit" name="Submit2" value=" New Question " style="margin:0 10px;">
    </div>
<?php endif; ?>

    <!-- LEVEL RADIOS — INSIDE the form so they submit with Submit1 or Submit2 -->
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

<p class="cs-xref">
    Direct and indirect objects are also verb complements.
    Ask your teacher for the companion module on verb objects.
</p>

<div style="margin-top:10px;">
    <?php render_score_box(); ?>
</div>

</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();