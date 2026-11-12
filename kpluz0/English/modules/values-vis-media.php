<?php
// english/modules/values-vis-media.php
// IMAGE-CHOICE. Bypass QEngine per §D.
// Shows a picture (or a photo of a symbolic object/scene); student clicks
// the value most suggested by it — or, for "except for" questions, the value
// that is NOT suggested.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Medium" with no level radios in
//   the HTML. Collapsed to $lvl='Hard' (preserves legacy 2-point value). No
//   selector rendered.
//
// 25 image-choice questions preserved verbatim. Each entry references an
// image in english/images/others/ via '**<file>.jpg'. Parser extracts the
// filename, strips the marker, then parses "=answer[d1+d2]d3".
//
// Two question phrasings preserved verbatim from bank text:
//   Q1-Q10: "Which of the following is the value most suggested by the
//           picture shown?"
//   Q11-Q25: "All of the following are values suggested by the picture
//           shown except for ____."
// Both render with the same prompt styling; the "except for" wording is
// carried inside the question text itself.
//
// §21 image validation: file_exists() at pick-time — any question whose
// image is missing is skipped. If every remaining entry is invalid, module
// shows "Temporarily unavailable."
//
// Font sizing matches journalistic-writing.php reference:
//   prompt 1.35rem · feedback text 1.25rem · hint 1.2rem
//   choice buttons 1.25rem
//   "Your answer is" 14pt · verdict 16pt (inline, unchanged)
//
// Choice layout (§14): maxLen &#8804; 17 &#8594; 2×2 grid; else 1-col hug.
// Value names are mostly short single words — 2×2 handles the vast
// majority. Longer values like "self-reliance" (13) still fit 2×2.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
// (Not used for content selection — single-pool module.)
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'values-vis-media.php'

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

$moduleTitle = 'Values Suggested in Visual Media';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Hard';   // single-level collapse (§5) — legacy was Medium/2pts

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Question bank: "question**<file>.jpg=answer[d1+d2]d3"
// ============================================================
$bank = [
    "Which of the following is the value most suggested by the picture shown?**courage.jpg=courage[humility+compassion]truth",
    "Which of the following is the value most suggested by the picture shown?**humor.jpg=humor[maturity+power]seriousness",
    "Which of the following is the value most suggested by the picture shown?**respect.jpg=respect[toughness+power]efficiency",
    "Which of the following is the value most suggested by the picture shown?**serenity.jpg=serenity[intensity+productivity]toughness",
    "Which of the following is the value most suggested by the picture shown?**charity.jpg=charity[humor+productivity]silence",
    "Which of the following is the value most suggested by the picture shown?**gratitude.jpg=gratitude[wealth+humor]silence",
    "Which of the following is the value most suggested by the picture shown?**self-reliance.jpg=self-reliance[unity+teamwork]cooperation",
    "Which of the following is the value most suggested by the picture shown?**unity.jpg=unity[self-reliance+originality]comfort",
    "Which of the following is the value most suggested by the picture shown?**endurance2.jpg=endurance[honesty+leadership]cleanliness",
    "Which of the following is the value most suggested by the picture shown?**leadership.jpg=leadership[honesty+originality]cleanliness",
    "All of the following are values suggested by the picture shown except for ____.**justice.jpg=humor[justice+truth]fairness",
    "All of the following are values suggested by the picture shown except for ____.**brilliance.jpg=orderliness[brilliance+success]maturity",
    "All of the following are values suggested by the picture shown except for ____.**vigor.jpg=peace[health+energy]vigor",
    "All of the following are values suggested by the picture shown except for ____.**trump.jpg=humility[wealth+power]success",
    "All of the following are values suggested by the picture shown except for ____.**courtesy.jpg=bravery[courtesy+respect]kindness",
    "All of the following are values suggested by the picture shown except for ____.**cooperation.jpg=self-reliance[unity+teamwork]cooperation",
    "All of the following are values suggested by the picture shown except for ____.**endurance.jpg=charity[endurance+energy]success",
    "All of the following are values suggested by the picture shown except for ____.**charity2.jpg=self-reliance[charity+sharing]hope",
    "All of the following are values suggested by the picture shown except for ____.**productivity.jpg=courage[productivity+efficiency]hard work",
    "All of the following are values suggested by the picture shown except for ____.**love.jpg=self-reliance[love+faithfulness]devotion",
    "All of the following are values suggested by the picture shown except for ____.**patriotism.jpg=humor[loyalty+patriotism]courage",
    "All of the following are values suggested by the picture shown except for ____.**service.jpg=originality[service+dedication]hard work",
    "All of the following are values suggested by the picture shown except for ____.**liberty.jpg=endurance[liberty+freedom]patriotism",
    "All of the following are values suggested by the picture shown except for ____.**cleanliness.jpg=gratitude[health+cleanliness]safety",
    "All of the following are values suggested by the picture shown except for ____.**focus.jpg=audacity[concentration+focus]dedication",
];

// ============================================================
// Parse helper
// ============================================================
function vvm_parse($entry) {
    $imgFile = null;
    if (preg_match('/\*\*([A-Za-z0-9_\-\.]+\.jpg)/', $entry, $m)) {
        $imgFile = $m[1];
        $entry = str_replace($m[0], '', $entry);
    }

    $p0 = strpos($entry, '=');
    if ($p0 === false) return null;
    $p1 = strpos($entry, '[', $p0);
    $p2 = strpos($entry, '+', $p1 === false ? 0 : $p1);
    $p3 = strpos($entry, ']', $p2 === false ? 0 : $p2);
    if ($p1 === false || $p2 === false || $p3 === false) return null;

    $question = trim(substr($entry, 0, $p0));
    $answer   = trim(substr($entry, $p0 + 1, $p1 - $p0 - 1));
    $d1       = trim(substr($entry, $p1 + 1, $p2 - $p1 - 1));
    $d2       = trim(substr($entry, $p2 + 1, $p3 - $p2 - 1));
    $d3       = trim(substr($entry, $p3 + 1));

    if ($question === '' || $answer === '') return null;

    return [
        'question' => $question,
        'answer'   => $answer,
        'd1'       => $d1,
        'd2'       => $d2,
        'd3'       => $d3,
        'image'    => $imgFile,
    ];
}

// ============================================================
// Handle answer click
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    // Anti-tamper: only accept clicks that match a rendered choice
    if (!in_array($clicked, $cur['choices'], true)) {
        $clicked = $cur['choices'][0];
    }

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// Theme
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
// Generate
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used     = $_SESSION[$sessionKey]['used'] ?? [];
    $imgDirFs = __DIR__ . '/../../english/images/others/';

    $avail = [];
    foreach ($bank as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        $parsed = vvm_parse($entry);
        if ($parsed === null) continue;
        if ($parsed['image'] === null) continue;
        if (!file_exists($imgDirFs . $parsed['image'])) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            $parsed = vvm_parse($entry);
            if ($parsed === null) continue;
            if ($parsed['image'] === null) continue;
            if (!file_exists($imgDirFs . $parsed['image'])) continue;
            $avail[] = $i;
        }
    }
    if (empty($avail)) {
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<p style="text-align:center;font-size:16pt;margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = vvm_parse($bank[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    $choices = array_values(array_unique($choices));
    shuffle($choices);

    $imgUrl = $base . '/english/images/others/' . $parsed['image'];

    $_SESSION[$sessionKey]['current'] = [
        'question' => $parsed['question'],
        'answer'   => $parsed['answer'],
        'choices'  => $choices,
        'image'    => $imgUrl,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .vvm-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 22px 28px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #333;
    line-height: 1.45;
    text-align: center;
    box-sizing: border-box;
  }
  .vvm-card.vvm-feedback { font-size: 1.25rem; }
  .vvm-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .vvm-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #555555;
    text-align: center;
    margin: 40px auto 40px;
  }
  .vvm-image {
    display: block;
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 20px auto 0;
  }
  .vvm-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .vvm-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 100%;
    margin: 14px auto;
  }
  .vvm-choice {
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
  .vvm-choice:hover { background: #eef; border-color: #8080ff; }
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

    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="Picture"
         class="vvm-image"
         onerror="this.style.display='none';">

    <div class="vvm-card vvm-feedback">
        <?php echo htmlspecialchars($cur['question']); ?>
        <br><br>
        <span style="color:#CC0066; font-weight:700;">Answer:</span>
        <strong style="color:#800080; font-weight:700;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="Picture"
         class="vvm-image"
         onerror="this.style.display='none';">

    <div class="vvm-card"><?php echo htmlspecialchars($q['question']); ?></div>

    <p class="vvm-hint">Click on your answer.</p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 17);
        $containerClass = $use2x2 ? 'vvm-grid-2x2' : 'vvm-grid-1col';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="vvm-choice">
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