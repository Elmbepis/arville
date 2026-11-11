<?php
// english/modules/passive-active.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a question about active/passive voice; student clicks the matching
// sentence from 4 choices.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Medium" with no level radios in
//   the HTML — a single-level module. Content bank is identical regardless
//   of level. Collapsed to $lvl='Hard' (single-level Medium&#8594;Hard mapping
//   preserves the legacy 2-point value). No selector rendered.
//
// Question types preserved:
//   - "Which of the following sentences is in the active/passive voice?"
//   - "What is the active/passive voice equivalent of the sentence '...'?"
//   Feedback display matches legacy verbatim (Active Voice:/Passive Voice:
//   for classification questions; Answer: for equivalent-transformation
//   questions).
//
// Choice layout: single-column grid with `grid-template-columns: auto` and
// `justify-content: center`. Each choice button stretches to fill the auto
// column, whose width = max-content of the widest choice. Result: all
// four boxes hug the longest choice and share identical widths.
// Text wraps naturally if a choice exceeds the 480px page max-width.
//
// Legacy picfile dead-code removed: no bank entry ever contained "**.jpg"
// markers — image display was never triggered. Omitted entirely.
//
// DB row required: modules.url = 'passive-active.php'
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).

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

$moduleTitle = 'Passive and Active Voices';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Hard';   // single-level collapse (§5) — legacy was Medium/2pts

// ============================================================
// Question bank: "question=answer[d1+d2]d3"
// ============================================================
$bank = [
    "Which of the following sentences is in the active voice?=Hazel obeys all rules and regulations.[The cake was eaten by my brother.+The book was found under the tree.]The plants were not watered yesterday.",
    "Which of the following sentences is in the active voice?=Many students participated in the river clean-up.[The river clean-up was conducted yesterday.+Trash along the riverside was removed.]Garbage trucks were hired to collect the trash.",
    "Which of the following sentences is in the active voice?=We joined the climate change conference yesterday.[The conference was organized by our school.+Free books were distributed at the conference.]Speakers were invited to share their insights.",
    "Which of the following sentences is in the active voice?=Shaina cleaned her room this morning.[The toys were put in the toy box.+The books were put on the shelves.]The floor was swept and polished.",
    "Which of the following sentences is in the active voice?=We will pray for your safety.[The excursion was organized by the teachers.+The buses were checked before the trip.]The food was prepared by parents.",
    "Which of the following sentences is in the active voice?=Mitch did not answer her question.[Her question was ignored by Mitch.+The visitor was stopped by the guard.]Ten videos were uploaded by us today.",
    "Which of the following sentences is in the active voice?=Sonia has submitted her project.[I was told to be here at 10 AM.+The project was submitted on time.]Amazing stories are written every day.",
    "Which of the following sentences is in the active voice?=The vicious dogs caught the intruder.[He was given an hour to write the essay.+The cash prize has been awarded already.]That movie was directed by my uncle.",
    "Which of the following sentences is in the active voice?=Melody wrote the article carefully.[The article was written on bond paper.+The reward was claimed yesterday.]The story I wrote has been published.",
    "Which of the following sentences is in the active voice?=The performance of the children thrilled the audience.[We were mesmerized by their performance+The performance was streamed live online.]The tickets were all sold out before the show.",
    "Which of the following sentences is in the passive voice?=The letter was written by me.[The cat chased the mouse.+The fish ate the algae flakes.]The bee flew from one flower to the next.",
    "Which of the following sentences is in the passive voice?=The whale was pursued relentlessly by Captain Ahab.[The whale swam as fast as it could.+The crew ate a hearty breakfast.]The captain failed to catch the whale.",
    "Which of the following sentences is in the passive voice?=Johnny was asked to give a speech.[Their editor did not finish the video.+Youtube does not allow offensive videos.]Henry wrote his speech.",
    "Which of the following sentences is in the passive voice?=The thieves have been arrested by the police.[You missed your deadline once again.+The singer forgot the lyrics.]The mayor distributed some relief goods.",
    "Which of the following sentences is in the passive voice?=Their store was robbed yesterday.[The students received the phone calls.+The recession killed many jobs.]Many families lost their homes.",
    "Which of the following sentences is in the passive voice?=Dinna was born in 2008.[Her mother gave birth to twins.+The doctor smiled at the baby.]The boy has already read his new book.",
    "What is the passive voice equivalent of the sentence \"The cat chased the mouse.\"?=The mouse was chased by the cat.[The mouse will be chased by the cat.+The cat was chased by the mouse.]The mouse is being chased by the cat.",
    "What is the passive voice equivalent of the sentence \"Our neighbor caught the crocodile.\"?=The crocodile was caught by our neighbor.[The crocodile will be caught by our neighbor.+Our neighbor was caught by the crocodile.]The crocodile is being caught by our neighbor.",
    "What is the passive voice equivalent of the sentence \"The parrot is eating a banana.\"?=A banana is being eaten by the parrot.[A banana was eaten by the parrot.+A banana will be eaten by the parrot.]The parrot is being eaten by a banana.",
    "What is the passive voice equivalent of the sentence \"Carlo has already sold my motorcycle.\"?=My motorcycle has already been sold by Carlo.[My motorcycle was already sold by Carlo.+My motorcycle is already being sold by Carlo.]My motorcycle would have already been sold by Carlo.",
    "What is the active voice equivalent of the sentence \"The toy was hidden by Timmy under his bed.\"?=Timmy hid the toy under his bed.[Timmy is hiding the toy under his bed.+Timmy will hide the toy under his bed.]The toy hid Timmy under his bed.",
    "What is the active voice equivalent of the sentence \"The watch was lost by Glenda yesterday.\"?=Glenda lost the watch yesterday.[Glenda was losing the watch yesterday.+Glenda would lose the watch yesterday.]The watch lost Glenda yesterday.",
    "What is the active voice equivalent of the sentence \"The seeds are being eaten by the rodents.\"?=The rodents are eating the seeds.[The rodents ate the seeds.+The rodents will eat the seeds.]The rodents have eaten the seeds.",
    "What is the active voice equivalent of the sentence \"The packages had been delivered by the mailman.\"?=The mailman had delivered the packages.[The mailman delivered the packages.+The mailman has delivered the packages.]The mailman had been delivering the packages.",
];

// ============================================================
// Parse helper
// ============================================================
function pa_parse($entry) {
    $p0 = strpos($entry, '=');
    $p1 = strpos($entry, '[');
    $p2 = strpos($entry, '+');
    $p3 = strpos($entry, ']');
    if ($p0 === false || $p1 === false || $p2 === false || $p3 === false) return null;
    return [
        'question' => substr($entry, 0, $p0),
        'answer'   => substr($entry, $p0 + 1, $p1 - $p0 - 1),
        'd1'       => substr($entry, $p1 + 1, $p2 - $p1 - 1),
        'd2'       => substr($entry, $p2 + 1, $p3 - $p2 - 1),
        'd3'       => substr($entry, $p3 + 1),
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
// THEME
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
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $avail = [];
    foreach ($bank as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        if (pa_parse($entry) === null) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            if (pa_parse($entry) !== null) $avail[] = $i;
        }
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = pa_parse($bank[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question' => $parsed['question'],
        'answer'   => $parsed['answer'],
        'choices'  => $choices,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .pa-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .pa-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 20px 26px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
    box-sizing: border-box;
  }
  .pa-card.pa-feedback {
    font-size: 1.2rem;
  }
  .pa-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1rem;
    color: #800080;
    text-align: center;
    margin: 12px auto 0;
  }
  /* Single-column auto grid — column = max-content of the widest choice.
     justify-content: center keeps it centered; justify-items: stretch
     (default) makes every row item share that width. */
  .pa-choices {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    margin: 20px auto;
    max-width: 100%;
  }
  .pa-choice {
    display: flex;
    align-items: center;
    padding: 16px 24px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    font-weight: 500;
    color: #0000BB;
    text-decoration: none;
    text-align: left;
    line-height: 1.5;
    box-sizing: border-box;
    max-width: 100%;
    overflow-wrap: break-word;
    word-break: break-word;
    transition: background 0.15s, border-color 0.15s;
  }
  .pa-choice:hover { background: #eef; border-color: #8080ff; }
  .pa-choice .pa-label {
    display: inline-block;
    min-width: 32px;
    font-weight: 700;
    color: #CC0066;
    margin-right: 10px;
    flex-shrink: 0;
  }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong><br/>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <?php
        $isEquivalent = strpos($cur['question'], 'equivalent') !== false;
        $isActive     = strpos($cur['question'], 'active') !== false;
    ?>
    <?php if ($isEquivalent): ?>
        <div class="pa-card pa-feedback">
            <?php echo htmlspecialchars($cur['question']); ?><br><br>
            <span style="color:#CC0066;">Answer:</span>
            <span style="color:#800080;"><?php echo htmlspecialchars($cur['answer']); ?></span>
        </div>
    <?php else: ?>
        <div class="pa-card pa-feedback">
            <span style="color:#CC0066;"><?php echo $isActive ? 'Active Voice:' : 'Passive Voice:'; ?></span><br>
            <span style="color:#800080;"><?php echo htmlspecialchars($cur['answer']); ?></span>
        </div>
    <?php endif; ?>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="pa-prompt"><?php echo htmlspecialchars($q['question']); ?></p>

    <p class="pa-hint">Click on your answer.</p>

    <?php $labels = ['A', 'B', 'C', 'D']; ?>
    <div class="pa-choices">
        <?php foreach ($q['choices'] as $i => $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="pa-choice">
                <span class="pa-label"><?php echo $labels[$i]; ?>.</span>
                <span><?php echo htmlspecialchars($c); ?></span>
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