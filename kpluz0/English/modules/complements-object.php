<?php
// english/modules/complements-object.php
// FIB (free-text entry). Bypass QEngine per §D.
// Student types the complete phrase that serves as the object complement
// in the given sentence.
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
// Sentence bank: each entry has "*answer+" markers. Question displays the
// plain sentence; feedback displays the sentence with the answer highlighted
// in red (matching legacy UX).
//
// FIB canonicalization: lowercase + strip whitespace/punctuation
// (periods, commas, apostrophes, quotes).
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Theme: ex-26-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'complements-object.php'

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

$moduleTitle = 'Object Complements';
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
function co_build_bank($n1, $n2, $n3, $n4) {
    $bank = [];

    $bank[1] = [
        "$n3 made the cases *bigger+.",
        "She will paint our bed *white+.",
        "We saw our teacher *reading+.",
        "They found the puppy *sleeping+.",
        "$n1 will make this pen *larger+.",
        "Please don't make me *mad+.",
        "$n1 likes his coffee *black+.",
        "We both like our tea *hot+.",
        "You are making him *nervous+.",
        "The couple named their son *$n1+.",
        "We will name our daughter *$n3+.",
        "$n3 dyed the fabric *red+.",
        "The noise is driving him *mad+.",
        "That case made the lawyer *famous+.",
        "He painted the wall *pink+.",
        "We found the house *empty+.",
        "I consider the plan to be *unwise+.",
        "I see you as *a nice person+.",
        "Can you make the pole *taller+?",
        "Let's name the bird *Chirpy+.",
        "$n3 made the song *livelier+.",
        "Did you find the news *amusing+?",
        "Your voice drives me *insane+.",
        "Why did you serve the soup *cold+?",
        "The lawsuit left them *penniless+.",
        "I see them as *our savior+.",
    ];

    $bank[2] = [
        "$n3 named $n1 as *her successor+.",
        "$n3 regarded his payment as *a blessing+.",
        "His classmates regard $n1 as *a genius+.",
        "Our workers will paint these chairs *brown+.",
        "$n1 likes to paint his toy cars *blue+.",
        "$n1 will try to make his classmates *laugh+.",
        "The mayor declared the town hall *open+.",
        "Your thick blanket kept our baby *warm+.",
        "There's a way to make this situation *better+.",
        "Please don't make this situation *worse+.",
        "His corny jokes drive his friends *crazy+.",
        "$n1 named $n2 *the new product manager+.",
        "$n1 printed the page *in large letters+.",
        "We consider this matter to be *very important+.",
        "$n3 knew $n1 to be *conscientious+.",
        "$n1 saw a group of senators *campaigning+.",
        "They elected $n3 *their president+.",
        "If I call you *a fool+, you will be mad.",
        "If he calls me *lazy+, I will be offended.",
        "If they make me *their leader+, I'll be honored.",
        "They see their professor as *their role model+.",
        "The experts deem your opinion *acceptable+.",
        "$n3 considered the informant *credible+.",
        "That is the song that made that singer *popular+.",
        "If you call me *handsome+, I'll lend you the money.",
    ];

    $bank[3] = [
        "Painting every picture *rosy+, $n3 is truly an optimist.",
        "The villagers decided to call the lost boy *$n1+.",
        "They have proven themselves to be *worthy of our trust+.",
        "Everyone considers him to be *an excellent choice+.",
        "The army officer called his soldier *soft and weak+.",
        "I think you didn't make these sleeves *equal in length+.",
        "The rescuers immediately found him *lying on the floor+.",
        "His failed business left $n1 *feeling defeated+.",
        "Your unreasonable actions will only make matters *worse+.",
        "Their intensive training made $n1 *more competent+.",
        "If $n1 paints that crib *orange+, $n3 will be mad.",
        "If $n1 calls $n2 *a liar+, there will be a fight.",
        "If $n3 really considers me *a hero+, then I am elated.",
        "Some people consider their music to be *distracting+.",
        "The metal contaminant was later identified as *mercury+.",
        "The authorities believed him to be *a foreign spy+.",
        "$n3 found that new music album *a bit too long+.",
        "Fans consider the album *uncreative+, but sales are up anyway.",
        "Their rival company threatens to drive them *out of business+.",
        "I'll call you *a genius+ if you can solve this math problem.",
        "The authorities considered the rebels' ideas *dangerous+.",
    ];

    $bank[4] = [
        "You will drive me *insane+ if you spend one more centavo on that old car.",
        "Many foreign tourists now consider the Philippines *their second home+.",
        "The stern judge ruled her *out of order+, so she immediately calmed down.",
        "It simply isn't right to portray this corrupt politician to be *innocent+.",
        "The last financial crisis left the old businessman *depressed and bankrupt+.",
        "During their fiery confrontation, $n1 angrily called $n2 *a liar+.",
        "Your fancy attire does not make you *a king+, so please stop barking orders.",
        "His colleagues now consider him *untrustworthy+ because of his recent disloyal acts.",
        "Everybody relies on $n1 yet he is too modest to deem himself *their leader+.",
        "We found those contractors *not worthy of our confidence+, so we didn't hire them.",
        "The industrial engineer designed our office area to be *elegant yet functional+.",
        "Our manager deemed our project *outdated and unprofitable+ so he simply cancelled it.",
        "Wealth alone does not make one *worthy of emulation+. Character is important as well.",
        "Most of the investors considered their scheme *strategically advantageous+.",
        "Buyers now consider their products *affordable+, so their sales have increased.",
    ];

    $bank[5] = [
        "Their robot built the framework *strong and sturdy+, proving that they can finally automate their process.",
        "Their advisers deemed those bonds *low-risk+, so their investment company bought them.",
        "If some teachers consider that destination *hazardous+, then they should cancel the field trip.",
        "Their professors generally considered that plan *too optimistic and probably unattainable+.",
        "$n1 refused to have another meeting, stating that he now considers the matter *settled+.",
        "Unfortunately, many of the mayor's constituents regarded him as *corrupt and ineffectual+.",
        "The senior engineers consider that apparatus to be *unreliable+, so they had it scrapped.",
        "After the people elected $n1 *governor+, various projects to protect the environment have been initiated.",
        "$n1 and $n3 often see their lonely neighbor *weeping+, so they visited her this morning.",
        "Clouds of expelled algae turned the water *brown and turbid+ in places where the process became intense.",
        "Unforeseen circumstances have made the brothers *enemies+, so they don't see eye to eye anymore.",
        "Climate change is making weather patterns *more erratic and unpredictable+, as we are experiencing lately.",
        "The general deemed the formidable fortress *impregnable+, so he ordered an air assault instead.",
        "After a long debate, all the senators have finally agreed to consider the existing laws *sufficient+.",
        "The uninitiated president of that rich country regards climate change as *a hoax+, yet the Paris Accord remains standing.",
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
    'top_banner'    => $base . '/english/images/ex-26-top.jpg',
    'title_bg'      => $base . '/english/images/ex-26-top2.jpg',
    'left_side'     => $base . '/english/images/ex-26-left.jpg',
    'right_side'    => $base . '/english/images/ex-26-right.jpg',
    'content_bg'    => $base . '/english/images/ex-26-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-26-bottom.jpg',
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

    $bank = co_build_bank($n1, $n2, $n3, $n4);
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
        // Fallback — skip to first valid entry
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
        The complete phrase serving as the object complement<br/>in this sentence is
        <strong style="color:#CC0066; font-size:1.15rem;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <div class="cs-card cs-feedback"><?php echo $cur['sentence_html']; ?></div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="cs-prompt">
        Write the complete phrase serving as<br>
        object complement in this sentence.<br/>
    </p>
    <div class="cs-card"><?php echo htmlspecialchars($q['sentence']); ?></div>

    <?php $inputWidth = max(220, (strlen($q['answer']) + 4) * 16); ?>
    <div class="cs-answer-row">
        <br/><label>Answer:</label>
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