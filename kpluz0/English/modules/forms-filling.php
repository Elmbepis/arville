<?php
// english/modules/forms-filling.php
// IMAGE-CHOICE. Bypass QEngine per §D.
// Shows a form image with one field highlighted; student clicks the value
// that correctly fills the highlighted blank.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// 32 form-filling questions preserved verbatim. Each entry references a form
// image in english/images/forms/ via '**<file>.jpg'. Parser extracts the
// filename, then the remaining "=answer[d1+d2]d3" body is parsed. The image
// IS the question — the prompt is fixed:
//   "Which of the following may be used to fill in the highlighted blank of
//    the form shown?"
//
// §21 image validation: file_exists() at pick-time — any question whose form
// image is missing is skipped. If every remaining entry is invalid, module
// shows "Temporarily unavailable."
//
// Data notes (preserved verbatim, not fixed):
//   • Legacy bank has commented-out entries for f21 (Tick questions) and
//     f27 (Melita Hermano). Skipped here — 32 active questions preserved.
//   • f28 is absent from the legacy source; jump f27&#8594;f29 preserved.
//   • Q17 distractor "2020-E1725" (with E) vs Q26 answer "2020-1725"
//     (no E) is a legacy inconsistency — preserved verbatim.
//
// Font sizing matches journalistic-writing.php reference:
//   prompt 1.35rem · feedback text 1.25rem · hint 1.2rem
//   choice buttons 1.25rem
//   "Your answer is" 14pt · verdict 16pt (inline, unchanged)
//
// Choice layout (§14): maxLen &#8804; 17 &#8594; 2×2 grid; else 1-col hug.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
// (Not used for content selection — single-pool module.)
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'forms-filling.php'

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

$moduleTitle = 'Filling Out Forms';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Question bank: "**<file>.jpg=answer[d1+d2]d3"
// ============================================================
$bank = [
    "**Eng5-f1.jpg=334-806-8263[3244 Quarry Drive+4/21/1958]Female",
    "**Eng5-f2.jpg=mdelacruz@toto.com[Montgomery+Maria J. Dela Cruz]334-806-8263",
    "**Eng5-f3.jpg=12/6/2010[2076 Tanso Road+Monday]Male",
    "**Eng5-f4.jpg=Female[334-806-8263+2198 Comfort Street]Jena A. Rivera",
    "**Eng5-f5.jpg=Gabriel Dela Cruz Reyes[2076 Nickel Road+4/25/2010]2578 Berry Street",
    "**Eng5-f6.jpg=Albert T. Taruc[5/25/1972+719-651-4901]Prieto, D.",
    "**Eng5-f7.jpg=80904[Susan H. Galleros+1580 Neville Street]7/29/1979",
    "**Eng5-f8.jpg=Suite[Pasay City+Kiera Pangan]2/21/2020",
    "**Eng5-f9.jpg=2/21/2020[Suite+Pasay City]Kiera Pangan",
    "**Eng5-f10.jpg=2490[4150 Marshall Street+5/17/1995]Aria J. Paloma",
    "**Eng5-f11.jpg=7/29/2010[Alyssa K. Barrameda+Female]Filipino",
    "**Eng5-f12.jpg=5[Jair K. Verano+3/15/2011]2732 Makahiya Street",
    "**Eng5-f13.jpg=Marikina[4827 Public Works Drive+72419]Philippines",
    "**Eng5-f14.jpg=Mother[423-275-5925+Helen R. Pangilinan]1/18/1989",
    "**Eng5-f15.jpg=Seafood Allergy[Grade 5+4431 Daffodil Lane]179 centimeters",
    "**Eng5-f16.jpg=Male[Marikina+4827 Public Works Drive]72419",
    "**Eng5-f17.jpg=s.sarmiento@yahoo.com[Pasay City+2020-E1725]2/21/2020",
    "**Eng5-f18.jpg=J.[45030+7/29/1979]Cayetano",
    "**Eng5-f19.jpg=Alyssa Hermano[Female+English]7/29/2010",
    "**Eng5-f20.jpg=Pasig[812-637-2407+1580 Maginhawa Street]Philippines",
    "**Eng5-f22.jpg=d_cayetano@hotmail.com[Filipino+7/29/2010]Terrence Costales",
    "**Eng5-f23.jpg=Mercado[Jeffrey Guinto+Makati City]870-586-9577",
    "**Eng5-f24.jpg=07/13/2020[4082 Barrington Court+501-405-9085]cpangilinan@gmail.com",
    "**Eng5-f25.jpg=Gloria Abella[4082 Magallanes St.+501-405-9085]cpangilinan@gmail.com",
    "**Eng5-f26.jpg=2020-1725[Caloocan City+3/15/2010]Filipino",
    "**Eng5-f29.jpg=Merlita Hermano[Grade 5+346 Passaic Street]Science",
    "**Eng5-f30.jpg=MAPEH 5[5/25/2010+346 Lagunday Street]Melita Hermano",
    "**Eng5-f31.jpg=Manila Science High School[Magic Show Act+8/2/2010]Gabriella H. Manalili",
    "**Eng5-f32.jpg=Single Act[Mother+Helen R. Pangilinan]1/18/1989",
    "**Eng5-f33.jpg=5[Pasay City+Kiera Pangan]10 meters",
    "**Eng5-f34.jpg=3702-0018-03[Juan C. Santos+P 5000.00]August 24, 2020",
    "**Eng5-f35.jpg=Juan C. Santos[3702-0018-03+P 7000.00]July 18, 2020",
];

// ============================================================
// Parse helper
// ============================================================
function ff_parse($entry) {
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

    $answer = trim(substr($entry, $p0 + 1, $p1 - $p0 - 1));
    $d1     = trim(substr($entry, $p1 + 1, $p2 - $p1 - 1));
    $d2     = trim(substr($entry, $p2 + 1, $p3 - $p2 - 1));
    $d3     = trim(substr($entry, $p3 + 1));

    if ($answer === '') return null;

    return [
        'answer' => $answer,
        'd1'     => $d1,
        'd2'     => $d2,
        'd3'     => $d3,
        'image'  => $imgFile,
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
    $imgDirFs = __DIR__ . '/../../english/images/forms/';

    $avail = [];
    foreach ($bank as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        $parsed = ff_parse($entry);
        if ($parsed === null) continue;
        // §21 image validation — skip if the form image is missing
        if ($parsed['image'] === null) continue;
        if (!file_exists($imgDirFs . $parsed['image'])) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            $parsed = ff_parse($entry);
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

    $parsed = ff_parse($bank[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    $choices = array_values(array_unique($choices));
    shuffle($choices);

    $imgUrl = $base . '/english/images/forms/' . $parsed['image'];

    $_SESSION[$sessionKey]['current'] = [
        'answer'  => $parsed['answer'],
        'choices' => $choices,
        'image'   => $imgUrl,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .ff-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .ff-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .ff-image {
    display: block;
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 20px auto 0;
  }
  .ff-feedback-text {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
    text-align: center;
    margin: 20px auto 4px;
    line-height: 1.5;
  }
  .ff-feedback-text strong { color: #CC0066; }
  .ff-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .ff-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 100%;
    margin: 14px auto;
  }
  .ff-choice {
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
  .ff-choice:hover { background: #eef; border-color: #8080ff; }
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

    <p class="ff-feedback-text">
        You can fill in the highlighted blank of the form shown with this information:
        <br>
        <strong><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>

    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="Form showing the highlighted blank"
         class="ff-image"
         onerror="this.style.display='none';">

    <input type="submit" name="Submit2" value=" New Question " style="margin:50px 0;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="Form showing the highlighted blank"
         class="ff-image"
         onerror="this.style.display='none';">

    <p class="ff-prompt">
        Which of the following may be used to fill in the highlighted blank of the form shown?
    </p>

    <p class="ff-hint">Click on your answer.</p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 17);
        $containerClass = $use2x2 ? 'ff-grid-2x2' : 'ff-grid-1col';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="ff-choice">
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