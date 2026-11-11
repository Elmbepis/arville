<?php
// english/modules/timexp-present.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a sentence with a blank; student clicks the correct present-tense
// time expression from 4 choices.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML — a single-level module. Content bank is identical regardless of
//   level. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// Choice layout (§14): 2×2 grid when all choices fit comfortably on one
// line per cell (maxLen &#8804; 17 chars at 1.15rem font &#8776; 22 chars fit per
// 231px cell); otherwise stacked 1-col for cleaner presentation of long
// time expressions like "at a time like this" or "three times a week".
//
// DB row required: modules.url = 'timexp-present.php'
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

$moduleTitle = 'Time Expressions for the Present Tense';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

// ============================================================
// Question bank: "prompt=answer[d1+d2]d3"
// ============================================================
$bank = [
    "Are you reading a nice story ____?=right now[tomorrow+yesterday]tonight",
    "He likes to jog ____ to lose weight.=every morning[last week+soon]yesterday",
    "Our manager is interviewing an applicant ____.=at the moment[last week+yesterday]right now",
    "He ____ goes to the park during his free time.=usually[yesterday+a while ago]tomorrow",
    "____, she goes to the market to buy fruits.=Every week[Last month+Tonight]Soon",
    "I ____ think about our family's future.=always[eventually+recently]soon",
    "According to his doctor, Mr. Chan needs to get a check-up ____.=twice a week[yesterday+last night]recently",
    "I visit my cousin in the hospital ____.=every other day[eventually+a year ago]someday",
    "My head is aching ____ because of the noise outside.=at this moment[soon+an hour ago]tomorrow",
    "Doing research at home is very easy ____ because of the internet.=nowadays[a long time ago+an hour ago]recently",
    "I am at my yoga class ____ so please stop calling me.=right now[yesterday+recently]frequently",
    "I heard that it is Billy's birthday ____.=today[yesterday+last week]two days ago",
    "We ____ have long online meetings because of the pandemic.=often[recently+a week ago]in the past",
    "We follow the prescribed safety guidelines ____ to be safe from the pandemic.=all the time[soon+yesterday]tomorrow",
    "My mother teaches us how to cook or bake something ____.=every other week[soon+next week]right now",
    "He is in an online meeting ____ to answer all of our client's questions.=this minute[next Friday+tonight]an hour ago",
    "I ____ carry cash because I'm scared of being robbed.=rarely[this minute+last week]yesterday",
    "Nothing but good things are happening in my life ____.=right now[tomorrow+last week]yesterday",
    "Almost everyone owns a cellphone ____.=these days[an hour ago+eventually]in the future",
    "Leila goes to church ____.=every now and then[today+right now]recently",
    "It is ____ an exciting experience to meet celebrities.=always[today+recently]soon",
    "Some moral support is what I need from you ____.=at a time like this[last week+next time]a while ago",
    "She conducts a profitable online selling session ____.=once a week[soon+tomorrow]last Monday",
    "I am asking myself ____ why I am in this awkward position.=now[yesterday+recently]next week",
    "Andrew goes to the barber ____.=every other week[soon+recently]yesterday",
    "Paolo is ____ studying with his friends so we can't disturb him.=currently[yesterday+recently]never",
    "My father ____ lets me use his car so I have to buy my own.=never[always+recently]next week",
    "We harvest 100 kilos of catfish ____.=every week[soon+recently]next week",
    "I work as a part-time cashier at a bakeshop ____.=three times a week[yesterday+last week]in the future",
    "I check my tires ____ to be safe on the road.=frequently[never+yesterday]shortly",
    "I am ____ enrolled as a biology student at that university.=presently[frequently+last year]soon",
    "It ____ gets very cold inside this office.=sometimes[someday+recently]tomorrow",
    "Belinda obeys her doctor and takes her pills ____.=daily[someday+soon]tomorrow",
    "Why doesn't Gerald eat meat ____?=on Fridays[yesterday+last week]tomorrow",
    "Our car broke down so we are using my brother's old car ____.=for the time being[two days ago+never]every week",
    "____, we are living in my grandparents' house.=At present[Tomorrow+Soon]A year from now",
    "She has been living in that mansion ____.=since 2012[last year+in 2012]next year",
    "Nadine has known Daniel ____.=for years[last month+frequently]next year",
    "My groupmates have finally submitted our project ____.=just minutes ago[an hour from now+someday]frequently",
    "I have been doing a lot of soul-searching ____.=this week[next month+in the future]soon",
];

// ============================================================
// Parse helper
// ============================================================
function timexp_parse($entry) {
    $p0 = strpos($entry, '=');
    $p1 = strpos($entry, '[');
    $p2 = strpos($entry, '+');
    $p3 = strpos($entry, ']');
    if ($p0 === false || $p1 === false || $p2 === false || $p3 === false) return null;
    return [
        'prompt' => substr($entry, 0, $p0),
        'answer' => substr($entry, $p0 + 1, $p1 - $p0 - 1),
        'd1'     => substr($entry, $p1 + 1, $p2 - $p1 - 1),
        'd2'     => substr($entry, $p2 + 1, $p3 - $p2 - 1),
        'd3'     => substr($entry, $p3 + 1),
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
        if (timexp_parse($entry) === null) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            if (timexp_parse($entry) !== null) $avail[] = $i;
        }
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = timexp_parse($bank[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'  => $parsed['prompt'],
        'answer'  => $parsed['answer'],
        'choices' => $choices,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .tp-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .tp-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 20px 26px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
    box-sizing: border-box;
  }
  .tp-card.tp-feedback {
    font-size: 1.2rem;
  }
  .tp-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1rem;
    color: #800080;
    text-align: center;
    margin: 12px auto 0;
  }

  /* 2×2 grid — used when all 4 choices fit comfortably per cell */
  .tp-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px 18px;
    max-width: 480px;
    margin: 20px auto;
  }
  /* 1-col stack — used when choices are too long for 2-across */
  .tp-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 480px;
    margin: 20px auto;
  }
  .tp-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 60px;
    padding: 14px 18px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    max-width: 100%;
    transition: background 0.15s, border-color 0.15s;
  }
  .tp-choice:hover { background: #eef; border-color: #8080ff; }
  .tp-choice .tp-label {
    display: inline-block;
    min-width: 26px;
    font-weight: 700;
    color: #CC0066;
    margin-right: 8px;
    flex-shrink: 0;
  }
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

    <div class="tp-card tp-feedback">
        <?php echo htmlspecialchars($cur['prompt']); ?><br><br>
        <span style="color:#CC0066;">Answer:</span>
        <span style="color:#800080; font-weight:700;"><?php echo htmlspecialchars($cur['answer']); ?></span>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="tp-prompt"><?php echo htmlspecialchars($q['prompt']); ?></p>

    <p class="tp-hint">Click on your answer.</p>

    <?php
        // Choice layout: 2×2 when all choices fit comfortably per cell;
        // 1-col stack otherwise. Threshold 17 chars &#8776; 22 chars fit per
        // 231px cell at 1.15rem font, so 17 leaves safe breathing room.
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 17);
        $containerClass = $use2x2 ? 'tp-grid-2x2' : 'tp-grid-1col';
        $labels = ['A', 'B', 'C', 'D'];
    ?>    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="tp-choice">
                <?php echo htmlspecialchars($c); ?>
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