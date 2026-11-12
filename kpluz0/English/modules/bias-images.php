<?php
// english/modules/bias-images.php
// IMAGE-CHOICE. Bypass QEngine per §D.
// Shows a persuasive image; student clicks the bias technique it uses
// (bandwagon, name-calling, stereotyping, testimonial, fear).
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// 37 image-bearing questions preserved verbatim. Each entry references a
// bias image in english/images/others/ via '**<file>.jpg'. Parser extracts
// the filename, strips the marker, then parses "=answer[d1+d2]d3".
//
// §21 image validation: file_exists() at pick-time — any question whose
// bias image is missing is skipped. If every remaining entry is invalid,
// module shows "Temporarily unavailable."
//
// Bias technique per question preserved exactly:
//   imgbias01–07  &#8594; bandwagon
//   imgbias08–14  &#8594; name-calling
//   imgbias15–21  &#8594; stereotyping
//   imgbias22–28  &#8594; testimonial
//   imgbias29–37  &#8594; fear
//
// Font sizing matches journalistic-writing.php reference:
//   prompt 1.35rem · feedback text 1.25rem · hint 1.2rem
//   choice buttons 1.25rem
//   "Your answer is" 14pt · verdict 16pt (inline, unchanged)
//
// Choice layout: all bias technique names are short (max 12 chars =
// "stereotyping"/"name-calling") &#8594; 2×2 grid always.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
// (Not used for content selection — single-pool module.)
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'bias-images.php'

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

$moduleTitle = 'Identifying Bias Techniques in Images';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Question bank: "**<file>.jpg=answer[d1+d2]d3"
// ============================================================
$bank = [
    "**imgbias01.jpg=bandwagon[testimonial+fear]name-calling",
    "**imgbias02.jpg=bandwagon[testimonial+fear]name-calling",
    "**imgbias03.jpg=bandwagon[testimonial+fear]name-calling",
    "**imgbias04.jpg=bandwagon[testimonial+fear]name-calling",
    "**imgbias05.jpg=bandwagon[testimonial+fear]name-calling",
    "**imgbias06.jpg=bandwagon[testimonial+fear]name-calling",
    "**imgbias07.jpg=bandwagon[testimonial+fear]name-calling",
    "**imgbias08.jpg=name-calling[testimonial+stereotyping]bandwagon",
    "**imgbias09.jpg=name-calling[testimonial+stereotyping]bandwagon",
    "**imgbias10.jpg=name-calling[testimonial+stereotyping]bandwagon",
    "**imgbias11.jpg=name-calling[testimonial+stereotyping]bandwagon",
    "**imgbias12.jpg=name-calling[testimonial+stereotyping]bandwagon",
    "**imgbias13.jpg=name-calling[testimonial+stereotyping]bandwagon",
    "**imgbias14.jpg=name-calling[testimonial+stereotyping]bandwagon",
    "**imgbias15.jpg=stereotyping[testimonial+name-calling]bandwagon",
    "**imgbias16.jpg=stereotyping[testimonial+name-calling]bandwagon",
    "**imgbias17.jpg=stereotyping[testimonial+name-calling]bandwagon",
    "**imgbias18.jpg=stereotyping[testimonial+name-calling]bandwagon",
    "**imgbias19.jpg=stereotyping[testimonial+name-calling]bandwagon",
    "**imgbias20.jpg=stereotyping[testimonial+name-calling]bandwagon",
    "**imgbias21.jpg=stereotyping[testimonial+name-calling]bandwagon",
    "**imgbias22.jpg=testimonial[stereotyping+name-calling]bandwagon",
    "**imgbias23.jpg=testimonial[stereotyping+name-calling]bandwagon",
    "**imgbias24.jpg=testimonial[stereotyping+name-calling]bandwagon",
    "**imgbias25.jpg=testimonial[stereotyping+name-calling]bandwagon",
    "**imgbias26.jpg=testimonial[stereotyping+name-calling]bandwagon",
    "**imgbias27.jpg=testimonial[stereotyping+name-calling]bandwagon",
    "**imgbias28.jpg=testimonial[stereotyping+name-calling]bandwagon",
    "**imgbias29.jpg=fear[testimonial+bandwagon]name-calling",
    "**imgbias30.jpg=fear[testimonial+bandwagon]name-calling",
    "**imgbias31.jpg=fear[testimonial+bandwagon]name-calling",
    "**imgbias32.jpg=fear[testimonial+bandwagon]name-calling",
    "**imgbias33.jpg=fear[testimonial+bandwagon]name-calling",
    "**imgbias34.jpg=fear[testimonial+bandwagon]name-calling",
    "**imgbias35.jpg=fear[testimonial+bandwagon]name-calling",
    "**imgbias36.jpg=fear[testimonial+bandwagon]name-calling",
    "**imgbias37.jpg=fear[testimonial+bandwagon]name-calling",
];

// ============================================================
// Parse helper
// ============================================================
function bi_parse($entry) {
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
    $imgDirFs = __DIR__ . '/../../english/images/others/';

    $avail = [];
    foreach ($bank as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        $parsed = bi_parse($entry);
        if ($parsed === null) continue;
        if ($parsed['image'] === null) continue;
        if (!file_exists($imgDirFs . $parsed['image'])) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            $parsed = bi_parse($entry);
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

    $parsed = bi_parse($bank[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    $choices = array_values(array_unique($choices));
    shuffle($choices);

    $imgUrl = $base . '/english/images/others/' . $parsed['image'];

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
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .bi-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 40px auto 12px;
    line-height: 1.3;
  }
  .bi-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .bi-image {
    display: block;
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 30px auto 0;
  }
  .bi-feedback-text {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
    text-align: center;
    margin: 20px auto 4px;
    line-height: 1.5;
  }
  .bi-feedback-text strong { color: #CC0066; }
  .bi-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .bi-choice {
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
  .bi-choice:hover { background: #eef; border-color: #8080ff; }
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

    <p class="bi-feedback-text">
        The bias technique used in the image is
        <strong><?php echo htmlspecialchars($cur['answer']); ?></strong>.
    </p>

    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="Bias image"
         class="bi-image"
         onerror="this.style.display='none';">

    <input type="submit" name="Submit2" value=" New Question " style="margin:50px 0;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="Bias image"
         class="bi-image"
         onerror="this.style.display='none';">

    <p class="bi-prompt">Click on the bias technique<br/>used in the image shown.</p><br/>

    <div class="bi-grid-2x2">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="bi-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:50px 0;">
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();