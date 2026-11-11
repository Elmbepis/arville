<?php
// english/modules/general-specific.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a statement; student clicks whether it's "general" or "specific".
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// Legacy quirk (fixed): the entire $gens/$specs banks were wrapped in
// `if ($grd >= 4) { ... }` — grades 0–3 triggered count() on undefined
// variables and the module broke. Modern clamps grades < 4 up to 4,
// matching the legacy module's intended lower bound.
//
// Legacy quirk (preserved): $gens and $specs are topically paired by index
// but the legacy generator picks each independently (`rand` on each array
// separately), so pairing is effectively random. Preserved as-is — each
// statement is independently classifiable, so correctness is unaffected.
//
// Placeholder: {girl} used in one specific entry ("My Aunt {girl}…").
//
// Choice layout (§14): 2 choices always on one row, equal-width boxes.
//   Both labels ("general" / "specific") are short; 1fr 1fr grid gives
//   uniform halves without any wasted space.
//
// Theme: ex-24-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'general-specific.php'

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

$moduleTitle = 'General and Specific Statements';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));
if ($grd < 4) $grd = 4;   // legacy had no bank for grades < 4

// ============================================================
// Statement bank
// ============================================================
$girls = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];

$gens = [
    "Unlike insects, all arachnids have eight legs and two body segments.",
    "Do you know that all birds have feathers?",
    "Planets are massive enough to be rounded by its own gravity, but not massive enough to become a star.",
    "Southeast Asian nations have become very progressive these past three decades.",
    "Filipinos remain cheerful and optimistic despite the many challenges they face in life.",
    "Mammals are warm-blooded vertebrates that possess hair and mammary glands.",
    "Elapids are venomous snakes with hollow fangs at the front of the upper jaw.",
    "Mobile technologies have revolutionized education around the world.",
    "Many Filipinos are now selling health and beauty products online.",
    "The best birds at imitating human speech are parrots.",
    "Beatle songs are challenging to musicians, either melodically or harmonically.",
    "Invertebrates are animals without a spine or backbone.",
    "Invasive species kill, crowd out, and devastate native species and their ecosystems.",
    "Italian Renaissance artists are regarded as important by most art historians.",
    "Angiosperms are plants that produce flowers and bear their seeds in fruits.",
];
$specs = [
    "A tarantula is an arachnid, which is why it has 8 legs.",
    "An owl's body is covered with feathers so it is a bird.",
    "Jupiter is a gas giant with a mass 1/1000 that of the Sun but 2.5 times that of the other 7 planets.",
    "The Philippines achieved a GDP of 331 billion dollars in 2018.",
    "Mang Kardo, who lost his home due to a recent typhoon, has started to work again.",
    "Amazon River dolphins keep their whiskers or sensory hairs into adulthood.",
    "The king cobra is the world's longest elapid with a maximum length of almost meters.",
    "'5G', the fifth generation wireless technology, will connect people to machines and objects.",
    "My Aunt {girl} sells make-up kits using her Facebook account.",
    "Alex, an African gray parrot, knew more than 100 English words.",
    "'Penny Lane' is an example of a Beatle song that's difficult to play on guitar.",
    "The flamboyant cuttlefish has a dark brown base color, white and yellow patterns, and purple-pink arms.",
    "As an invasive species, the cane toad eats just about anything, reducing prey for native insectivores.",
    "Leonardo da Vinci, an Italian polymath, is widely considered one of the greatest painters of all time.",
    "The rose is probably the most popular flower in the world.",
];

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
    // Legacy: independent random pick from $gens and $specs, then 50/50
    // choose which to present. Preserved.
    $isGeneral = (rand(1, 2) === 1);

    if ($isGeneral) {
        $poolKey  = 'used_gens';
        $pool     = $gens;
        $answer   = 'general';
    } else {
        $poolKey  = 'used_specs';
        $pool     = $specs;
        $answer   = 'specific';
    }

    $used = $_SESSION[$sessionKey][$poolKey] ?? [];
    $avail = [];
    foreach ($pool as $i => $_) {
        if (!in_array($i, $used, true)) $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($pool as $i => $_) $avail[] = $i;
    }
    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey][$poolKey] = $used;

    // Substitute {girl} placeholder if present
    $statement = str_replace(
        '{girl}',
        $girls[array_rand($girls)],
        $pool[$idx]
    );

    $_SESSION[$sessionKey]['current'] = [
        'statement' => $statement,
        'answer'    => $answer,
        'lvl'       => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .gs-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 22px 28px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
    box-sizing: border-box;
  }
  .gs-card.gs-feedback {
    font-size: 1.2rem;
  }
  .gs-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .gs-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.05rem;
    color: #800080;
    text-align: center;
    margin: 30px auto 6px;
  }
  /* Two choices on one row, equal halves */
  .gs-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    max-width: 360px;
    margin: 14px auto 0;
  }
  .gs-choice {
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
    font-weight: 700;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .gs-choice:hover { background: #eef; border-color: #8080ff; }
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

    <p class="gs-prompt">
        This is a <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong> statement.
    </p>
    <div class="gs-card gs-feedback"><?php echo htmlspecialchars($cur['statement']); ?></div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="gs-prompt">Is this a general or a specific statement?</p>
    <div class="gs-card"><?php echo htmlspecialchars($q['statement']); ?></div>

    <p class="gs-hint">Click on your answer.</p>

    <div class="gs-row">
        <a href="?ansclick=general" class="gs-choice">general</a>
        <a href="?ansclick=specific" class="gs-choice">specific</a>
    </div>

    <br/><input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();