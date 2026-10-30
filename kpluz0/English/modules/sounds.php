<?php
// english/modules/sounds.php
// AUDIO &#8594; CHOICE — user hears a sound effect, clicks the source object.
// Static bank of 35 items. Bypass QEngine per §3.
// Single-level — §5 collapse (legacy hardcoded $_SESSION['level']="Easy").
//
// Bank format: "source1dist2_2dist3_3dist4" per item (e.g. "airplane1elephant2bird3piano").
//   Correct source first; "1","2","3" delimit the three distractors.
//
// Audio: $base . '/english/modules/sounds/effects/<ans>.mp3' — preserved from legacy.
//
// Feedback grammar: "You heard the sound of a <X>" / "an <X>" — picked by first letter.
//
// Choice layout (§14): 4-9 char choices &#8594; 2×2 grid.
//
// $grd not used (single-level).
// Theme: ex-*-25 (75/655/70) &#8594; fits §8 &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'sounds.php'

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

$moduleTitle = 'Sounds of Animals and Things';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level (§5)

// ============================================================
// BANK
// ============================================================
$bank = [
    "airplane1elephant2bird3piano",
    "bear1rooster2chick3duck",
    "bird1dog2cat3car",
    "burp1thunder2cough3clap",
    "bus1clock2tiger3laughter",
    "camera1bus2lion3thunder",
    "car1guitar2horse3whistle",
    "cat1dog2bird3goat",
    "clock1ship2pig3piano",
    "cow1horse2elephant3goat",
    "doorbell1jeepney2ship3whistle",
    "drum1guitar2violin3flute",
    "duck1rooster2goat3horse",
    "elephant1tiger2bear3snake",
    "flute1clap2airplane3bird",
    "goat1chicken2horse3turkey",
    "guitar1piano2violin3xylophone",
    "harp1tiger2rain3bus",
    "horse1goat2elephant3turkey",
    "lion1snake2monkey3elephant",
    "piano1drums2clap3sneeze",
    "pig1sheep2rooster3cat",
    "rooster1duck2goat3turkey",
    "sheep1rooster2horse3cow",
    "ship1elephant2whistle3goat",
    "sneeze1burp2clap3snore",
    "thunder1rain2lightning3flood",
    "trumpet1guitar2whistle3piano",
    "tuba1guitar2whistle3piano",
    "turkey1horse2lion3elephant",
    "ukulele1violin2drums3tuba",
    "violin1piano2whistle3xylophone",
    "whistle1sneeze2clock3guitar",
    "xylophone1drums2violin3whistle",
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
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $listCount = count($bank);

    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $safety = 0;
    do {
        $rnum = rand(0, $listCount - 1);
        $safety++;
    } while (in_array($rnum, $used, true) && $safety < 100);

    $used[] = $rnum;
    if (count($used) > $listCount * 2) $used = array_slice($used, -$listCount);
    $_SESSION[$sessionKey]['used'] = $used;

    $wordstr = $bank[$rnum];
    $pos1 = strpos($wordstr, "1");
    $pos2 = strpos($wordstr, "2");
    $pos3 = strpos($wordstr, "3");

    $qword   = strtolower(substr($wordstr, 0, $pos1));
    $choices = [
        strtolower(substr($wordstr, $pos1 + 1, $pos2 - $pos1 - 1)),
        strtolower(substr($wordstr, $pos2 + 1, $pos3 - $pos2 - 1)),
        strtolower(substr($wordstr, $pos3 + 1)),
        $qword,
    ];
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'answer'  => $qword,
        'choices' => $choices,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// HELPER
// ============================================================
function snd_article($word)
{
    $c = strtolower(substr($word, 0, 1));
    return in_array($c, ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a';
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
    'score_top'     => $base . '/math/images/score-top-3.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-3.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .snd-audio-box { text-align: center; margin: 24px auto 10px; }
  .snd-grid-2x2 {
    --choice-width: 10em;
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
  }
  .snd-grid-1col {
    --choice-width: 15em;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .snd-choice {
    width: var(--choice-width);
    max-width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 10px;
    padding: 12px 16px;
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .snd-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .snd-instruction {
    display: block;
    color: #800080;
    font-size: 1.35rem;
    font-weight: 700;
    line-height: 1.5;
    margin: 18px auto 4px;
  }
  .snd-click-prompt {
    display: block;
    color: #666;
    font-size: 1.15rem;
    font-weight: 500;
    margin-bottom: 12px;
  }
  @media (max-width: 600px) {
    .snd-grid-2x2 { grid-template-columns: 1fr 1fr; gap: 10px 14px; }
    .snd-grid-2x2 .snd-choice { width: 100%; }
    .snd-choice { font-size: 1rem; padding: 10px 12px; }
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#800080; margin-top:20px; line-height:1.7;">
        You heard the sound of
        <?php echo snd_article($cur['answer']); ?>
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>.
    </p>
    <div class="snd-audio-box">
        <audio controls preload="auto" controlslist="nodownload">
            <source src="<?php echo htmlspecialchars($base . '/english/modules/sounds/effects/' . $cur['answer'] . '.mp3'); ?>" type="audio/mpeg">
        </audio>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="snd-audio-box">
        <audio controls preload="auto" controlslist="nodownload" autoplay>
            <source src="<?php echo htmlspecialchars($base . '/english/modules/sounds/effects/' . $q['answer'] . '.mp3'); ?>" type="audio/mpeg">
        </audio>
    </div>

    <span class="snd-instruction">
        Listen to the audio clip above<br>and click on the source of the sound below.
    </span>
    <span class="snd-click-prompt">Click on your answer.</span>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        if ($maxLen > 20)      $containerClass = 'snd-grid-1col';
        else                   $containerClass = 'snd-grid-2x2';
    ?>
    <div class="<?php echo $containerClass; ?>" style="--choice-width: <?php echo $choiceWidthEm; ?>em;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="snd-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

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