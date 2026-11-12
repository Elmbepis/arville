<?php
// english/modules/living-non-living.php
// Living and Non-living Things — image-choice; student clicks "living" or
// "non-living" for the pictured thing, with a brief explanation on feedback.
// 2 levels (Easy, Hard) via distinct word pools; grade from $_SESSION['user_grade'] (0–10).
//
// Item images : science/images/living-non-living/<thing>.jpg
// Theme frame : auto-detected (English/english/science + images/images/squiz-20-*.jpg)
// Score box   : science/images/score-*-5.jpg
// Choices     : standard 2-column text boxes (§9.1) with greenish hover
// Visit ?debug=1 for a diagnostic dump.

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

// ============================================================
// Paths
// ============================================================
$rootFs = __DIR__ . '/../../';
$base   = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

// ---- Item images: science/images/living-non-living/ ----
$itemRel    = 'science/images/living-non-living/';
$imageDirFs = $rootFs . $itemRel;
$imageBase  = $base   . '/' . $itemRel;

// ---- Theme frame: auto-detect (holds squiz-20-*.jpg) ----
$themeCandidates = [
    'science/images/images/',
    'English/images/images/',
    'english/images/images/',
    'science/images/',
    'English/images/',
    'english/images/',
];
$themeRel = $themeCandidates[0];
foreach ($themeCandidates as $c) {
    if (file_exists($rootFs . $c . 'squiz-20-top.jpg')) { $themeRel = $c; break; }
}
$themeFs  = $rootFs . $themeRel;
$themeUrl = $base . '/' . $themeRel;

// ---- Score box: science/images/ ----
$scoreFs  = $rootFs . 'science/images/';
$scoreUrl = $base   . '/science/images/';

// ---- Debug dump (?debug=1) ----
if (isset($_GET['debug'])) {
    echo '<pre style="background:#fff;padding:14px;font-size:12pt;text-align:left;margin:10px auto;max-width:900px;border:1px solid #ccc;">';
    echo "Item images\n";
    echo '  imageDirFs    : ' . htmlspecialchars($imageDirFs) . ' (' . (is_dir($imageDirFs) ? 'exists' : 'MISSING') . ")\n";
    echo '  imageBase URL : ' . htmlspecialchars($imageBase) . "\n";
    if (is_dir($imageDirFs)) {
        $files = array_values(array_filter(glob($imageDirFs . '*'), 'is_file'));
        echo '  file count    : ' . count($files) . "\n";
        echo "  first 20 files:\n";
        foreach (array_slice($files, 0, 20) as $f) echo '    ' . basename($f) . "\n";
    }

    echo "\nTheme frame (auto-detected)\n";
    echo '  themeRel      : ' . htmlspecialchars($themeRel) . "\n";
    echo '  themeUrl      : ' . htmlspecialchars($themeUrl) . "\n";
    foreach (['squiz-20-top.jpg','squiz-20-top2.jpg','squiz-20-left.jpg','squiz-20-right.jpg','squiz-20-content.jpg','squiz-20-bottom.jpg'] as $f) {
        echo '    ' . str_pad($f, 26) . ': ' . (file_exists($themeFs . $f) ? 'exists' : 'MISSING') . "\n";
    }

    echo "\nScore box (science/images/)\n";
    echo '  scoreFs       : ' . htmlspecialchars($scoreFs) . ' (' . (is_dir($scoreFs) ? 'exists' : 'MISSING') . ")\n";
    echo '  scoreUrl      : ' . htmlspecialchars($scoreUrl) . "\n";
    foreach (['score-top-5.jpg','score-bottom-5.jpg'] as $f) {
        echo '    ' . str_pad($f, 26) . ': ' . (file_exists($scoreFs . $f) ? 'exists' : 'MISSING') . "\n";
    }

    echo "\nSample pool-item checks (imageDirFs)\n";
    foreach (['bear','bamboo tree','Superman toy','toy dragon','banana peeling','star apple','zebra','watermelon'] as $t) {
        $found = lnl_find_image($imageDirFs, $t);
        echo '  ' . str_pad($t, 22) . ': ' . ($found ?? '—') . "\n";
    }
    echo '</pre>';
    $conn->close();
    exit;
}

// ============================================================
// Identifiers, grade, level
// ============================================================
$moduleTitle = 'Living and Non-living Things';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);

$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// Pools (verbatim from legacy)
// ============================================================
$easyLiving = [
    'bear','bee','butterfly','catfish','clownfish','crab','crocodile','dragonfly','duck','falcon',
    'frog','goldfish','grasshopper','housefly','mite','penguin','pigeon','piranha','ray','rooster',
    'salamander','sea turtle','snake','scorpion','shark','shrimp','slug','snail','spider','squid',
    'stork','tick','turtle','zebra',
    'bamboo tree','banana tree','cactus','calamansi plant','gumamela plant','makahiya plant',
    'mango tree','rose plant','sunflower plant','water lily',
];
$easyNonLiving = [
    'banana peeling','bicycle','broom','car','feather duster','glass of milk','house','leg ham',
    'mango slice','nest','planet','rock','salad','shoe','stuffed toy','Superman toy','tire',
    'toy dragon','toy monster',
];
$hardLiving = [
    'bean seedling','blue starfish','clam','coral','jellyfish','ladybug','lionfish','louse',
    'mango seed','mongo sprout','mushroom','mussel','sea anemone','sea cucumber','seahorse',
    'sea urchin','starfish','sunflower seed',
];
$hardNonLiving = [
    'banana','clamshell','cooked crab','cooked fish','cooked lobster','dinosaur statue',
    'dinosaur skeleton','feather','grilled corn cob','guava fruit','leaf','melon','papaya fruit',
    'pear','pumpkin','raisin','shark tooth','star apple','watermelon',
];

// ============================================================
// Helpers
// ============================================================
function lnl_find_image(string $dir, string $thing): ?string {
    foreach (['.jpg', '.png', '.jpeg', '.JPG', '.PNG', '.JPEG'] as $ext) {
        if (file_exists($dir . $thing . $ext)) return $thing . $ext;
    }
    return null;
}

function lnl_get_available(array $pool, string $dir): array {
    $avail = [];
    foreach ($pool as $item) {
        if (lnl_find_image($dir, $item) !== null) $avail[] = $item;
    }
    return $avail;
}

function lnl_explanation(string $thing, string $answer): string {
    if (strpos($thing, 'seed') !== false && strpos($thing, 'seedling') === false) {
        return 'because it can grow into a new plant';
    }
    if ($answer === 'living') {
        return 'because it can grow and reproduce';
    }
    $exp = 'because it can not grow and reproduce';
    if (strpos($thing, 'ooked ') === 1) {
        return $exp . '. It used to be a living thing but it is no longer alive';
    }
    if (strpos('**pumpkinpapaya fruitwatermelonguava fruitpearwatermelonstar apple', $thing) > 1) {
        return $exp . '. But keep in mind that the seeds inside it are living things because they can grow into new plants';
    }
    return $exp;
}

function lnl_asset(string $fsBase, string $urlBase, string $rel): string {
    $rel = ltrim($rel, '/');
    if (file_exists($fsBase . $rel)) return $urlBase . '/' . $rel;
    return $urlBase . '/' . $rel;
}

// ============================================================
// Theme
// ============================================================
$theme = [
    'top_banner'    => lnl_asset($themeFs, $themeUrl, 'squiz-20-top.jpg'),
    'title_bg'      => lnl_asset($themeFs, $themeUrl, 'squiz-20-top2.jpg'),
    'left_side'     => lnl_asset($themeFs, $themeUrl, 'squiz-20-left.jpg'),
    'right_side'    => lnl_asset($themeFs, $themeUrl, 'squiz-20-right.jpg'),
    'content_bg'    => lnl_asset($themeFs, $themeUrl, 'squiz-20-content.jpg'),
    'bottom_banner' => lnl_asset($themeFs, $themeUrl, 'squiz-20-bottom.jpg'),
    'score_top'     => lnl_asset($scoreFs, $scoreUrl, 'score-top-5.jpg'),
    'score_bottom'  => lnl_asset($scoreFs, $scoreUrl, 'score-bottom-5.jpg'),
];

// ============================================================
// Answer processing
// ============================================================
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    if (!in_array($clicked, ['living', 'non-living'], true)) {
        $clicked = 'living';
    }
    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result    = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// Question generation
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $isLiving = (rand(1, 2) === 1);

    if ($lvl === 'Hard') {
        $primaryPool  = $isLiving ? $hardLiving : $hardNonLiving;
        $fallbackPool = $isLiving ? $hardNonLiving : $hardLiving;
    } else {
        $primaryPool  = $isLiving ? $easyLiving : $easyNonLiving;
        $fallbackPool = $isLiving ? $easyNonLiving : $easyLiving;
    }
    $answer     = $isLiving ? 'living' : 'non-living';
    $sourcePool = $primaryPool;

    $available = lnl_get_available($primaryPool, $imageDirFs);

    if (empty($available)) {
        $available  = lnl_get_available($fallbackPool, $imageDirFs);
        $sourcePool = $fallbackPool;
        $answer     = $isLiving ? 'non-living' : 'living';
    }

    if (empty($available)) {
        foreach ([
            [$easyLiving,    'living'],
            [$easyNonLiving, 'non-living'],
            [$hardLiving,    'living'],
            [$hardNonLiving, 'non-living'],
        ] as [$pool, $ans]) {
            $a = lnl_get_available($pool, $imageDirFs);
            if (!empty($a)) { $available = $a; $answer = $ans; $sourcePool = $pool; break; }
        }
    }

    if (empty($available)) {
        render_header($moduleTitle . ' - Grade ' . $grd . ' - ' . $lvl,
                      $moduleTitle . ' - Grade ' . $grd . ' - ' . $lvl, $theme);
        echo '<div style="max-width:600px;margin:30px auto;padding:20px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;font-family:Arial,sans-serif;text-align:center;">';
        echo '<p style="font-size:16pt;color:#CC0066;font-weight:700;margin:0 0 12px;">No images found.</p>';
        echo '<p style="font-size:12pt;color:#333;line-height:1.6;margin:0;">';
        echo 'Searched: <code>' . htmlspecialchars($imageDirFs) . '</code><br>';
        echo 'Open <a href="?debug=1" style="color:#0000CC;">?debug=1</a> for a full diagnostic.';
        echo '</p></div>';
        render_score_box();
        render_footer();
        $conn->close();
        exit;
    }

    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $fresh = array_values(array_filter($available, fn($t) => !in_array($t, $used, true)));
    if (empty($fresh)) {
        $used  = array_values(array_filter($used, fn($t) => !in_array($t, $sourcePool, true)));
        $fresh = $available;
    }
    $thing  = $fresh[array_rand($fresh)];
    $used[] = $thing;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;

    $realName    = lnl_find_image($imageDirFs, $thing);
    $explanation = lnl_explanation($thing, $answer);

    $_SESSION[$sessionKey]['current'] = [
        'thing'       => $thing,
        'answer'      => $answer,
        'explanation' => $explanation,
        'img'         => $imageBase . $realName,
        'lvl'         => $lvl,
        'choices'     => ['living', 'non-living'],
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle . '<br/>Grade ' . $grd . ' - ' . $lvl,
              $moduleTitle . '<br/>Grade ' . $grd . ' - ' . $lvl,
              $theme);
?>
<style>
  .lnl-card {
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
  .lnl-card.lnl-feedback { font-size: 1.25rem; }
  .lnl-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #555555;
    text-align: center;
    margin: 40px auto 10px;
  }
  .lnl-image {
    display: block;
    max-width: 100%;
    max-height: 300px;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 30px auto 0;
  }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <img src="<?php echo htmlspecialchars($cur['img']); ?>"
         alt="<?php echo htmlspecialchars($cur['thing']); ?>"
         class="lnl-image"
         onerror="this.style.display='none';">

    <div class="lnl-card lnl-feedback">
        This is a <?php echo htmlspecialchars($cur['thing']); ?>.
        It is a <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
        thing <?php echo htmlspecialchars($cur['explanation']); ?>.
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <div class="lnl-card">
        Is this a <strong style="color:#CC0066;">living</strong>
        or a <strong style="color:#CC0066;">non-living</strong> thing?
    </div>

    <img src="<?php echo htmlspecialchars($q['img']); ?>"
         alt="Living or non-living thing"
         class="lnl-image"
         onerror="this.style.display='none';">

    <p class="lnl-hint">Click on your answer.</p>

    <table border="0" cellspacing="24" cellpadding="0" style="margin:0 auto;">
      <tr>
      <?php foreach ($q['choices'] as $c): ?>
        <td align="center" valign="middle">
          <a href="?ansclick=<?php echo urlencode($c); ?>"
             style="display:flex;align-items:center;justify-content:center;min-width:160px;min-height:64px;max-width:300px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#f8fff8;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;text-align:center;word-break:break-word;box-sizing:border-box;line-height:1.3;transition:0.2s;"
             >
            <?php echo htmlspecialchars($c); ?>
          </a>
        </td>
      <?php endforeach; ?>
      </tr>
    </table>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php endif; ?>

  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:12pt Arial,sans-serif;">Select difficulty level for next question:</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
    <?php foreach ($levels as $l): ?>
      <td align="center">
        <label style="font:9pt Arial,sans-serif;color:#800080;">
          <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b>
        </label>
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
?>