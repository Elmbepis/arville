<?php
// english/modules/complements-subject.php
// FIB (free-text entry). Bypass QEngine per §D.
// Student types the complete phrase that serves as the subject complement
// in the given sentence.
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Grade-keyed tier assignment (bank has 5 tiers):
//     grd 0-5 &#8594; Easy: 1; Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 6-7 &#8594; Easy: 2; Hard: rand(3,4)   [Medium=3, Hard=4]
//     grd 8+  &#8594; Easy: 3; Hard: rand(4,5)   [Medium=4, Hard=5]
//   Rationale: modern Hard takes the union of legacy Medium + legacy Hard.
//
// Names ($name1..$name4): boys/girls arrays — freshly picked on each
// generate, matching legacy behavior. Half the sentences reference them.
//
// Sentence bank: each entry has "*answer+" markers. Question displays the
// plain sentence; feedback displays the sentence with the answer highlighted
// in red (matching legacy UX).
//
// FIB canonicalization: lowercase + strip whitespace/punctuation
// (periods, commas, apostrophes, quotes) — matches legacy behavior
// (legacy stripped . ' , and spaces, but did NOT lowercase; modern
// lowercases both for more forgiving matching).
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Theme: ex-24-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'complements-subject.php'

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

$moduleTitle = 'Subject Complements';
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
function cs_build_bank($n1, $n2, $n3, $n4) {
    $bank = [];

    $bank[1] = [
        "$n1 is *a gifted athlete+.",
        "Her mother was *my science teacher+.",
        "$n1 and $n3 are *my best friends+.",
        "$n1 is *my father's name+.",
        "This corridor is *too narrow+.",
        "Your shoes smell *awful+.",
        "$n1 and $n2 went *upstairs+.",
        "You should be *more careful+.",
        "My car is *a Honda Civic+.",
        "The lake is *very tranquil+.",
        "$n3 became *a famous writer+.",
        "That apple pie looks *delicious+.",
        "The ham tastes *very salty+.",
        "$n3 is *my neighbor+.",
        "My uncle was *his boxing coach+.",
        "Our old computer is *broken+.",
        "It tastes *like salty butter+.",
        "$n1 is *our class president+.",
        "The new teacher is *she+.",
        "Our former mayor is *he+.",
        "$n3 now seems *frustrated+.",
        "My aunt is *a social worker+.",
        "Your uncle appears *friendly+.",
    ];

    $bank[2] = [
        "Yes, $n1 has always been *a policeman+.",
        "The baby rabbit feels *soft and cuddly+.",
        "The light in the chapel was *warm and soft+.",
        "My chemistry teacher was *exceptionally kind+.",
        "A university is *a community of scholars+.",
        "$n1 and I will become *neighbors+ soon.",
        "Hey, that's *my officemate+ over there!",
        "These potatoes taste *a bit too sweet+.",
        "The receptionist seemed *very tired and sleepy+.",
        "The new tenant seemed *friendly and cheerful+.",
        "That check is *for our car's maintenance+.",
        "Your father seems *tired+ after his long drive.",
        "We became *sad+ when our friends left the party.",
        "Nikola Tesla was *an important inventor+.",
        "All the pupils in this school are *studious+.",
        "She felt *exhausted+ after working all day.",
        "It is *I+, the master of the universe.",
        "His brother will be *a doctor+ someday.",
        "$n3 went *downstairs+ to get a hammer.",
        "$n1 has grown *so tall+ since last summer.",
    ];

    $bank[3] = [
        "The sugar cube will become *smaller+ under the drizzle.",
        "Those mahogany trees will be *very tall+ ten years from now.",
        "$n1 will become *a professional tennis player+ someday.",
        "$n1 will remain *our vice president+ until next month.",
        "That dark and cavernous cave has eventually become *their new home+.",
        "That lawyer seemed *so sincere+ when he volunteered to help us.",
        "The astronomer went *upstairs+ to investigate this new phenomenon.",
        "The soldiers felt *betrayed+ when their allies abandoned them.",
        "That unknown organic substance smells *like burnt plastic+.",
        "It certainly tastes *awful+ for something sold as a dessert.",
        "I will be *across the street+ just in case you'll need me.",
        "The general manager looked *visibly upset+ after the meeting.",
        "Mosquitoes are *everywhere+ so we need to use the repellant now.",
        "It is *I+, your one true king, who will save you from them.",
        "All our software engineers are *conscientious workers+.",
        "The truck driver felt *disheartened+ when he saw the traffic jam.",
        "This check with many zeroes is *for all your troubles+.",
    ];

    $bank[4] = [
        "Her husband took all the credit, but it was *she+ who actually did all the work.",
        "The horse has been *a powerful symbol+ in nearly every culture around the world.",
        "That seven-foot teenager will become *a basketball sensation+ within this year.",
        "You're *the resident veterinarian+ now, so expect to be very busy all year round.",
        "$n1 didn't seem *concerned+ when $n3 had refused to go along with his plan.",
        "You'll be *the center of attention+ there if you'll insist on wearing that shirt.",
        "The glass sculptor felt *very disappointed+ when his art exhibit was cancelled.",
        "The volleyball players went *outside+ to prepare for their game on Tuesday.",
        "It was *they+ who assured us that the courier will deliver the items today.",
        "The carabaos are *in the barn+ so the rogue crocodile won't find them.",
        "This humongous aquarium will be *our primary attraction+ once it is completed.",
        "The lead researcher felt *indignant+ when her supervisor accused her of dishonesty.",
        "The stranger seemed *amiable and chirpy+ at first, but he soon showed his true colors.",
        "With his speed and power, he can become *our youngest boxing champion+ ever.",
        "The young entrepreneur is *full of passion+, but he lacks the capital to scale up.",
    ];

    $bank[5] = [
        "The postponement of our annual math olympiad could be *a blessing in disguise+, if you ask me.",
        "Restoring muscle cars had become *a hobby of his+ not long after he joined that organization.",
        "Her tasks had suddenly become *difficult and perplexing+, which made it difficult for her to adjust.",
        "The ability to learn things online has become *absolutely necessary+ these past few years.",
        "All those ideas seemed *very logical+, until $n1 demolished every single one of them.",
        "The fairies' houses seemed *made of clear glass+ as they sparkled so brightly under the sun.",
        "The president immediately went *ballistic+ when he heard reports of corruption in his cabinet.",
        "Some of these spoiled celebrities become *crabby and irritable+ if you ask them for an interview.",
        "The paleontologist felt *infuriated+ when she saw the careless driver run over the valuable fossil.",
        "$n1 will be *their laughing stock+ once they see him carrying that bulky laptop on his back.",
        "Automation has become *so prevalent+ that companies are now retraining many of their workers for new jobs.",
        "The impending stock market bubble will be *their biggest headache+ if they fail to keep it in check.",
        "Online scammers and identity thieves are *everywhere+, so learn how to use the internet safely.",
        "Your concoction tastes *atrocious+, so we can not invest in your bar and restaurant at this time.",
        "The results of our experiment are *very promising+, but we must not make any conclusions yet.",
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
// HANDLE SUBMIT1 (SCORE FIB)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = (string)($_POST['answer'] ?? '');
    // Canonicalize: lowercase + strip whitespace + common punctuation
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
    'top_banner'    => $base . '/english/images/ex-24-top.jpg',
    'title_bg'      => $base . '/english/images/ex-24-top2.jpg',
    'left_side'     => $base . '/english/images/ex-24-left.jpg',
    'right_side'    => $base . '/english/images/ex-24-right.jpg',
    'content_bg'    => $base . '/english/images/ex-24-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-24-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Fresh names per question
    $bc = count($boys) - 1;
    $n1 = $boys[rand(0, $bc)];
    do { $n2 = $boys[rand(0, $bc)]; } while ($n2 === $n1);

    $gc = count($girls) - 1;
    $n3 = $girls[rand(0, $gc)];
    do { $n4 = $girls[rand(0, $gc)]; } while ($n4 === $n3);

    $bank = cs_build_bank($n1, $n2, $n3, $n4);
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

    // Extract answer between '*' and '+'
    $p1 = strpos($qsentence, '*');
    $p2 = strpos($qsentence, '+');
    if ($p1 === false || $p2 === false) {
        // Fallback — skip the question
        $qsentence = $pool[0];
        $p1 = strpos($qsentence, '*');
        $p2 = strpos($qsentence, '+');
    }
    $answer = substr($qsentence, $p1 + 1, $p2 - $p1 - 1);

    // Plain version (no markers) for question
    $sentence_plain = str_replace(['*', '+'], '', $qsentence);

    // Highlighted version (answer wrapped in strong) for feedback
    $sentence_html = str_replace('*', '<strong style="color:#CC0066;">', $qsentence);
    $sentence_html = str_replace('+', '</strong>', $sentence_html);

    $_SESSION[$sessionKey]['current'] = [
        'sentence'      => $sentence_plain,
        'sentence_html' => $sentence_html,
        'answer'        => $answer,
        'lvl'           => $lvl,
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
        The complete phrase serving as the subject complement<br/>in this sentence is
        <strong style="color:#CC0066; font-size:1.15rem;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <div class="cs-card cs-feedback"><?php echo $cur['sentence_html']; ?></div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="cs-prompt">
        Write the complete phrase serving as<br>
        subject complement in this sentence.
    </p>
    <div class="cs-card"><?php echo htmlspecialchars($q['sentence']); ?></div>

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

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080"><br/>Select difficulty level for next question:</font>
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