<?php
// english/modules/images-real-unreal.php
// IMAGE-CHOICE. Bypass QEngine per §D.
// Shows 4 pictures in a 2×2 grid; student clicks the one matching the target
// category ("real" or "imaginary").
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// Bank: 21 real images (r01-r21) + 17 imaginary images (mb01-mb17), all
// stored in english/images/others/. Image validation via file_exists()
// (§21) filters out any missing files at pick-time — if any required image
// is missing, the module shows "Temporarily unavailable" rather than serve
// broken thumbnails.
//
// Per question:
//   imgtype      = 'real' or 'imaginary' (50/50)
//   answer       = random image from the matching pool
//   3 distractors = random unique images from the OTHER pool
//   All 4 shuffled for presentation.
//
// Repeat prevention: per-pool used list (used_real / used_imaginary);
// reset at exhaustion.
//
// Data fixes: none needed — legacy bank had no malformed entries.
//
// Font sizing matches journalistic-writing.php reference:
//   prompt 1.35rem · feedback body 1.25rem
//   "Your answer:" 14pt · verdict 16pt (inline)
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
// (Not used for content selection — single-pool module.)
//
// Theme: ex-28-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'images-real-unreal.php'

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

$moduleTitle = 'Identifying Real and Imaginary Images';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Image pools
// ============================================================
$reals   = ['r01','r02','r03','r04','r05','r06','r07','r08','r09','r10','r11','r12','r13','r14','r15','r16','r17','r18','r19','r20','r21'];
$unreals = ['mb01','mb02','mb03','mb04','mb05','mb06','mb07','mb08','mb09','mb10','mb11','mb12','mb13','mb14','mb15','mb16','mb17'];

$imgDirFs  = __DIR__ . '/../../english/images/others/';
$imgDirUrl = $base . '/english/images/others/';

function iru_filter_valid($slugs, $dirFs) {
    $valid = [];
    foreach ($slugs as $slug) {
        if (file_exists($dirFs . $slug . '.jpg')) $valid[] = $slug;
    }
    return $valid;
}

// ============================================================
// Handle answer click
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    // Trust only if clicked slug appears in current choices (anti-tamper)
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
    'top_banner'    => $base . '/english/images/ex-28-top.jpg',
    'title_bg'      => $base . '/english/images/ex-28-top2.jpg',
    'left_side'     => $base . '/english/images/ex-28-left.jpg',
    'right_side'    => $base . '/english/images/ex-28-right.jpg',
    'content_bg'    => $base . '/english/images/ex-28-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-28-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// Generate
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $validReals   = iru_filter_valid($reals, $imgDirFs);
    $validUnreals = iru_filter_valid($unreals, $imgDirFs);

    if (count($validReals) < 1 || count($validUnreals) < 3) {
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<p style="text-align:center;font-size:16pt;margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $imgtype = (rand(1, 2) === 1) ? 'real' : 'imaginary';
    $answerPool     = ($imgtype === 'real') ? $validReals   : $validUnreals;
    $distractorPool = ($imgtype === 'real') ? $validUnreals : $validReals;

    // Repeat prevention per pool
    $usedKey = 'used_' . $imgtype;
    $used    = $_SESSION[$sessionKey][$usedKey] ?? [];
    $avail   = array_values(array_diff($answerPool, $used));
    if (empty($avail)) {
        $used  = [];
        $avail = $answerPool;
    }
    $answer = $avail[array_rand($avail)];
    $used[] = $answer;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey][$usedKey] = $used;

    // 3 unique distractors from the other pool
    shuffle($distractorPool);
    $distractors = array_slice($distractorPool, 0, 3);

    $choices = array_merge([$answer], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'answer'  => $answer,
        'imgtype' => $imgtype,
        'choices' => $choices,
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
  .iru-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .iru-prompt strong { color: #CC0066; }
  .iru-image-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    max-width: 100%;
    margin: 16px auto;
  }
  .iru-image-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    aspect-ratio: 1 / 1;
    background: #fff;
    border: 2px solid #ccc;
    border-radius: 12px;
    overflow: hidden;
    padding: 8px;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .iru-image-choice:hover {
    border-color: #8080ff;
    background: #eef;
  }
  .iru-image-choice img {
    display: block;
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
  }
  .iru-feedback-image {
    display: block;
    max-width: 260px;
    height: auto;
    border: 2px solid #ccc;
    border-radius: 12px;
    margin: 16px auto;
    box-sizing: border-box;
  }
  .iru-feedback-label {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
    text-align: center;
    margin: 12px auto 4px;
    line-height: 1.5;
  }
  .iru-feedback-label strong { color: #CC0066; }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer:
    </p>
    <img src="<?php echo htmlspecialchars($imgDirUrl . $result['clicked'] . '.jpg'); ?>"
         alt="Your choice"
         class="iru-feedback-image"
         onerror="this.style.display='none';">

    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <?php if ($result['correct']): ?>
        <p class="iru-feedback-label">
            That's the picture that's <strong><?php echo htmlspecialchars($cur['imgtype']); ?></strong>.
        </p>
    <?php else: ?>
        <p class="iru-feedback-label">
            The picture that's <strong><?php echo htmlspecialchars($cur['imgtype']); ?></strong> is this:
        </p>
        <img src="<?php echo htmlspecialchars($imgDirUrl . $cur['answer'] . '.jpg'); ?>"
             alt="Correct picture"
             class="iru-feedback-image"
             onerror="this.style.display='none';">
    <?php endif; ?>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="iru-prompt">
        Click on the picture that's <strong><?php echo htmlspecialchars($q['imgtype']); ?></strong>.
    </p>

    <div class="iru-image-grid">
        <?php foreach ($q['choices'] as $slug): ?>
            <a href="?ansclick=<?php echo urlencode($slug); ?>" class="iru-image-choice">
                <img src="<?php echo htmlspecialchars($imgDirUrl . $slug . '.jpg'); ?>"
                     alt=""
                     onerror="this.style.display='none';">
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