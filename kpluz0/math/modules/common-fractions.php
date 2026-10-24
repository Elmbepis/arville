<?php
// math/modules/common-fractions.php
// Image-choice. Single difficulty (Easy).
// Shows a target fraction prompt; student picks the picture whose shaded region
// matches. Grade controls denominator max/min.
//
// Each fraction image is enclosed in its own small box whose background is
// test37-content.jpg — matching the texture the fraction artwork was designed
// against. Content-area background stays the auto-picked paper-69.
//
// Feedback shows ONLY the correct fraction image — no arrow, no distractor row.
// Image pool is scanned from disk — only fractions with existing .jpg files
// are used, so missing assets never break a question.

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

$moduleTitle = 'Identifying Common Fractions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

$grd = (int)($_SESSION['grade'] ?? 0);

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, $cur['ans'], $lvl);

    $result = [
        'correct'     => $isCorrect,
        'clicked'     => $click,
        'ans'         => $cur['ans'],
        'choiceItems' => $cur['choiceItems'],
        'targetFrac'  => $cur['targetFrac'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $denomax  = ($grd < 1) ? 6 : ($grd === 1 ? 8 : 10);
    $denomMin = ($grd < 3) ? 2 : 4;

    $fractionDir        = __DIR__ . '/../../math/images/objects/fractions/';
    $availableFractions = [];

    if (is_dir($fractionDir) && $dh = opendir($fractionDir)) {
        while (($file = readdir($dh)) !== false) {
            if (!preg_match('/^([1-9aA])([1-9aA])-([1-9])\.jpg$/', $file, $m)) continue;
            $n = ($m[1] === 'a' || $m[1] === 'A') ? 10 : (int)$m[1];
            $d = ($m[2] === 'a' || $m[2] === 'A') ? 10 : (int)$m[2];
            if ($d < $denomMin || $d > $denomax) continue;
            if ($n < 1 || $n > $d) continue;
            $fracKey = "$n/$d";
            $availableFractions[$fracKey][] = $base . '/math/images/objects/fractions/' . $file;
        }
        closedir($dh);
    }

    if (count($availableFractions) < 3) {
        $theme = [
            'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
            'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
            'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
            'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
            'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
            'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
            'score_top'     => $base . '/math/images/score-top-1.jpg',
            'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
        ];
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<div style="text-align:center; padding:40px 20px; font-size:14pt; color:#800080;">';
        echo 'This exercise is temporarily unavailable — not enough fraction images found for your grade level.';
        echo '</div>';
        render_score_box();
        render_footer();
        $conn->close();
        exit;
    }

    $keys = array_keys($availableFractions);
    shuffle($keys);

    $targetKey  = $keys[0];
    $chosenKeys = [$targetKey];
    for ($i = 1; $i < count($keys) && count($chosenKeys) < 3; $i++) {
        if ($keys[$i] !== $targetKey) $chosenKeys[] = $keys[$i];
    }
    shuffle($chosenKeys);

    $choiceItems = [];
    foreach ($chosenKeys as $k) {
        $imgs = $availableFractions[$k];
        $choiceItems[] = [
            'value' => $k,
            'image' => $imgs[array_rand($imgs)],
            'alt'   => $k,
        ];
    }

    $_SESSION[$sessionKey]['current'] = [
        'ans'         => $targetKey,
        'choiceItems' => $choiceItems,
        'targetFrac'  => $targetKey,
        'lvl'         => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
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
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);

$boxStyle = 'display:inline-block; padding:5px;'
          . ' background:url(\'' . $base . '/math/images/images/test37-content.jpg\') repeat top left;'
          . ' border:1px solid #b8b8b8; border-radius:4px;';
$rowStyle = 'display:flex; justify-content:center; align-items:center; gap:16px; flex-wrap:wrap; margin:20px 0;';
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php
    $correctImg = null;
    foreach ($result['choiceItems'] as $item) {
        if ($item['value'] === $result['ans']) { $correctImg = $item['image']; break; }
    }
    ?>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center; margin-top:20px;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:15pt; color:#444444;">
        The image below is the one that corresponds to '<?php echo htmlspecialchars($result['targetFrac']); ?>'.
    </p>
    <?php if ($correctImg): ?>
    <div style="<?php echo $rowStyle; ?>">
        <div style="<?php echo $boxStyle; ?>">
            <img src="<?php echo htmlspecialchars($correctImg); ?>"
                 alt="<?php echo htmlspecialchars($result['ans']); ?>"
                 style="display:block;">
        </div>
    </div>
    <?php endif; ?>
<?php else: ?>
    <p class="statement" style="font-size:17pt; font-weight:600; color:#800080;">
        Which picture has a<br/>shaded area that shows <strong style="color:#CC0066;">'<?php echo htmlspecialchars($q_curr['targetFrac']); ?>'</strong>?
    </p>
    <div style="<?php echo $rowStyle; ?>">
        <?php foreach ($q_curr['choiceItems'] as $item): ?>
            <a href="?ansclick=<?php echo urlencode($item['value']); ?>"
               style="<?php echo $boxStyle; ?> text-decoration:none;">
                <img src="<?php echo htmlspecialchars($item['image']); ?>"
                     alt="<?php echo htmlspecialchars($item['alt']); ?>"
                     style="display:block;">
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <div style="margin-top:<?php echo $result === null ? '50px' : '20px'; ?>;">
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();