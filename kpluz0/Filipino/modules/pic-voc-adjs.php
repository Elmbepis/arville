<?php
// filipino/modules/pic-voc-adjs.php
// Pag-uugnay ng Pang-uri sa Larawan — identify the verb represented by a picture.
// Single scoring level (Easy); original grade condition determines vocabulary.
// Grades 0–2: 17 questions; Grades 3–10: 20 questions.

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /arville/kpluz0/login.php');
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli('localhost', 'root', 'AcadeV25!', 'kpluz0');
if ($conn->connect_error) die('Connection failed: ' . $conn->connect_error);
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleTitle = 'Pag-uugnay ng Pang-uri sa Larawan';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
// Legacy module has one difficulty setting, but TWO grade-specific banks.
// Do not change the shared $_SESSION['level'] used by other modules.
$lvl = 'Easy';
function pva_tiers(string $lvl, int $grd): array {
    return $grd <= 2 ? [1] : [2];
}

// Exact original grade-specific adjective banks and distractors.
$rawByTier = [
    1 => [
        'baluktot1tuwid2bago3malaki',
        'maaliwalas1makipot2marumi3madilim',
        'mabangis1mabait2makulay3makintab',
        'mabigat1magaan2mabait3masarap',
        'magaspang1makinis2masarap3matalino',
        'magaan1mabigat2malaki3mamahalin',
        'makulay1maitim2madilim3makipot',
        'malaki1maliit2magaan3makulay',
        'malambot1matigas2matakaw3mahaba',
        'maliit1malaki2masarap3masaya',
        'mapait1malikot2matalino3mabait',
        'marupok1matibay2maganda3mamahalin',
        'masikip1malambot2malikot3malawak',
        'matalim1malambot2maliwanag3magaspang',
        'matanda1mabilis2malakas3malikot',
        'matibay1malambot2marupok3magaan',
        'matigas1malambot2masarap3makintab',
    ],
    2 => [
        'baluktot1tuwid2bago3malaki',
        'kaaya-aya1nakasusuya2kaawa-awa3masinsin',
        'maaliwalas1makipot2marumi3madilim',
        'mabangis1mabait2makulay3makintab',
        'mabigat1magaan2mabait3masarap',
        'mabuhangin1maputik2makulimlim3matikas',
        'magaspang1makinis2masarap3matalino',
        'magaan1mabigat2malaki3mamahalin',
        'makulay1maitim2madilim3makipot',
        'malambot1matigas2matakaw3mahaba',
        'malaki1maliit2magaan3makulay',
        'maliit1malaki2masarap3masaya',
        'mapait1maalat2maanghang3mapanganib',
        'marupok1matibay2marubdob3mamahalin',
        'masikip1malambot2malikot3malawak',
        'matalim1maselan2maliwanag3magaspang',
        'matanda1mabilis2malakas3malikot',
        'matibay1malambot2marupok3magaan',
        'matigas1malambot2masarap3makintab',
        'matiwasay1masangsang2maligalig3mapanganib',
    ],
];

// Decode the legacy format once, before question generation.
$dataByTier = [];
foreach ($rawByTier as $tier => $rawItems) {
    foreach ($rawItems as $item) {
        $parts = preg_split('/[123]/', $item);
        if (count($parts) !== 4) continue;
        $dataByTier[$tier][] = ['correct' => $parts[0], 'wrong' => array_slice($parts, 1)];
    }
}
unset($rawByTier);

function pva_image(string $word): string {
    // Legacy URL: ../images/bokabularyo/<word>.jpg from the module directory.
    return '../images/bokabularyo/' . rawurlencode($word) . '.jpg';
}

$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null || isset($_POST['Submit2'])) {
    $candidates = [];
    foreach (pva_tiers($lvl, $grd) as $tier) {
        foreach ($dataByTier[$tier] as $i => $item) {
            $candidates[] = ['key' => "t$tier:$i", 'tier' => $tier, 'item' => $item];
        }
    }
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($candidates, static fn($c) => !in_array($c['key'], $used, true)));
    if (!$available) {
        $active = pva_tiers($lvl, $grd);
        $used = array_values(array_filter($used, static function($key) use ($active) {
            foreach ($active as $tier) if (strpos($key, "t$tier:") === 0) return false;
            return true;
        }));
        $available = $candidates;
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    $choices = array_merge([$pick['item']['correct']], $pick['item']['wrong']);
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'correct' => $pick['item']['correct'],
        'choices' => $choices,
        'image' => pva_image($pick['item']['correct']),
        'lvl' => $lvl,
        'tier' => $pick['tier'],
    ];
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <strong style="color:#0000CC;">'<?php echo htmlspecialchars($result['clicked'], ENT_QUOTES, 'UTF-8'); ?>'</strong>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <?php ob_start(); ?>
        <p style="font-size:15pt;color:#800080;line-height:1.5;text-wrap:balance;margin:5px auto 16px;">Ang pang-uring naglalarawan sa larawan ay <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?>'</strong>.</p>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:100%;max-height:250px;width:auto;height:auto;border:1px solid #888;object-fit:contain;">
        <p style="font-size:22pt;color:#CC0066;font-weight:700;margin:0px 0 0;"><?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php echo ob_get_clean(); ?>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current'];
    ob_start(); ?>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Larawan para sa tanong" style="max-width:100%;max-height:250px;width:auto;height:auto;border:1px solid #888;object-fit:contain;margin:0 auto 16px;">
        <br/><br/><p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:0;">Piliin ang pang-uring naglalarawan sa larawan.</p><br/>
    <?php echo ob_get_clean(); ?>
    <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;max-width:100%;">
        <?php foreach (array_chunk($cur['choices'], 2) as $row): ?>
        <tr>
            <?php foreach ($row as $choice): ?>
            <td align="center" valign="middle">
                <a href="?ansclick=<?php echo urlencode($choice); ?>" style="display:flex;align-items:center;justify-content:center;min-width:150px;min-height:64px;max-width:260px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;word-break:break-word;box-sizing:border-box;line-height:1.3;">
                    <?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
