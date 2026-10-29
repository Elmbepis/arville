<?php
// english/modules/pic-exp-gest-2.php
// STATIC image-choice bank. Bypass QEngine per §D.
// Shows an image of a facial expression or gesture; click the word/phrase
// that names it. 4 choices.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" and had no level radios.
//   Collapsed to single level with $lvl='Easy' as local. No selector rendered.
//
// Bank format: "answer1d1+2d2+3d3" — delimiters are literal digits 1,2,3.
// Two answers need display-name transformation:
//   head-shake &#8594; "head shake" (image stays as head-shake.jpg)
//   not-okay   &#8594; "not okay"   (image stays as not-okay.jpg)
// Store both `answer` (display) and `imageSlug` (file) per question.
//
// Image: english/images/others/{imageSlug}.jpg (validated via file_exists).
// Theme: ex-23-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'pic-exp-gest-2.php'

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

$moduleTitle = 'Words for Facial Expressions and Gestures';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single level (§5)

$bank = [
    "afraid1happy2sad3sleepy",
    "angry1happy2afraid3sad",
    "bored1happy2angry3excited",
    "cheerful1sad2afraid3sleepy",
    "clap1kiss2nod3wave",
    "come1go away2stop3no",
    "confused1angry2joyful3excited",
    "disgusted1sad2afraid3happy",
    "embarrassed1sad2excited3sleepy",
    "excited1sad2afraid3bored",
    "finger-wag1clap2poke3okay",
    "frightened1sad2sleepy3happy",
    "happy1sad2afraid3surprised",
    "handshake1clap2shush3wave",
    "head-shake1handshake2clap3point",
    "kiss1clap2wave3nod",
    "mad1happy2afraid3surprised",
    "nervous1happy2sad3sleepy",
    "nod1wave2poke3point",
    "not-okay1okay2wow3yes",
    "okay1wave2clap3point",
    "point1wave2clap3okay",
    "poke1wave2clap3okay",
    "sad1mad2happy3surprised",
    "shush1clap2wave3nod",
    "sleepy1sad2happy3surprised",
    "stop1go2okay3point",
    "surprised1sad2happy3angry",
    "thumbs-down1point2wave3thumbs-up",
    "wave1nod2kiss3head shake",
];

$imgDirFs = __DIR__ . '/../../english/images/others/';

function parse_peg($entry) {
    $p1 = strpos($entry, '1');
    $p2 = strpos($entry, '2');
    $p3 = strpos($entry, '3');
    if ($p1 === false || $p2 === false || $p3 === false) return null;
    $rawSlug = substr($entry, 0, $p1);
    if ($rawSlug === '') return null;
    $display = $rawSlug;
    if ($rawSlug === 'head-shake') $display = 'head shake';
    if ($rawSlug === 'not-okay')   $display = 'not okay';
    return [
        'imageSlug' => $rawSlug,
        'answer'    => $display,
        'd1'        => substr($entry, $p1 + 1, $p2 - $p1 - 1),
        'd2'        => substr($entry, $p2 + 1, $p3 - $p2 - 1),
        'd3'        => substr($entry, $p3 + 1),
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
// THEME (hoisted for "Temporarily unavailable" path)
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
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $total = count($bank);

    $avail = [];
    for ($i = 0; $i < $total; $i++) {
        if (in_array($i, $used, true)) continue;
        $parsed = parse_peg($bank[$i]);
        if ($parsed === null) continue;
        if (!file_exists($imgDirFs . $parsed['imageSlug'] . '.jpg')) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        // Reset — re-scan without the $used filter
        $used = [];
        for ($i = 0; $i < $total; $i++) {
            $parsed = parse_peg($bank[$i]);
            if ($parsed === null) continue;
            if (!file_exists($imgDirFs . $parsed['imageSlug'] . '.jpg')) continue;
            $avail[] = $i;
        }
    }
    if (empty($avail)) {
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<p style="text-align:center; font-size:16pt; margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = parse_peg($bank[$idx]);
    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'image'   => $base . '/english/images/others/' . $parsed['imageSlug'] . '.jpg',
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
  .peg-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
    max-width: 620px;
  }
  .peg-grid-1col {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .peg-row {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    gap: 16px;
    margin: 20px auto;
  }
  @media (max-width: 820px) {
    .peg-grid-2x2 { gap: 10px 14px; }
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#800080; margin-top:15px;">
        <?php
            $isPhrase = strpos($cur['answer'], ' ') !== false;
            echo $isPhrase ? 'This is a picture for the phrase' : 'This is a picture for the word';
        ?>
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="<?php echo htmlspecialchars($cur['answer']); ?>"
         style="display:block; max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px auto 40px;"
         onerror="this.style.display='none';">
    <input type="submit" name="Submit2" value="New Question" style="margin:0 0 30px;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="<?php echo htmlspecialchars($q['answer']); ?>"
         style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
         onerror="this.style.display='none';">
    <?php
        $isPhrase = strpos($q['answer'], ' ') !== false;
    ?>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">
        <?php echo $isPhrase ? 'Click on the word or phrase for this picture.' : 'Click on the word for this picture.'; ?>
    </p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        if ($maxLen > 20)      $wrapClass = 'peg-grid-1col';
        elseif ($maxLen >= 5)  $wrapClass = 'peg-grid-2x2';
        else                   $wrapClass = 'peg-row';
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        if ($wrapClass === 'peg-row') $choiceWidthEm = max($choiceWidthEm, 6);
    ?>
    <div class="<?php echo $wrapClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width: <?php echo $choiceWidthEm; ?>em;">
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