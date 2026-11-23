<?php
// filipino/modules/pic-voc-verbs.php
// Pag-uugnay ng Pandiwa sa Larawan — identify the verb represented by a picture.
// 2 levels via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// All 30 original verbs retained; both difficulty settings use the single legacy bank.

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
$moduleTitle = 'Pag-uugnay ng Pandiwa sa Larawan';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
// Single difficulty level for this module.
$lvl = 'Easy';

function pvv_tiers(string $lvl, int $grd): array {
    // Legacy verbs module had one bank and forced Easy. Both levels use it.
    return [1];
}

// Original verb vocabulary and distractors preserved from the legacy file.
$rawByTier = [
    1 => [
        'lumalangoy1umiinom2tumatakbo3nagpipinta',
        'nagagalit1natutuwa2natutulog3naglalaro',
        'nagbabasa1nagsasayaw2nagsusulat3umaawit',
        'nagbubuhat1naglalaro2nagluluto3nagbubuhos',
        'nagbubuhos1nananahi2nagtuturo3nagdarasal',
        'nagdarasal1naglalakad2nagpipinta3nagsusulat',
        'nagdidilig1umiinom2naglalaba3nagpupunas',
        'nag-iisip1kumakanta2nagluluto3nagpipinta',
        'naglalaba1nagwawalis2nagluluto3naglalakad',
        'naglalakad1nagluluto2nagpipinta3tumatalon',
        'nagluluto1kumakain2naglalaba3naglilinis',
        'nagpapasalamat1natutulog2nagagalit3sumisigaw',
        'nagpipinta1nagsasayaw2nagdarasal3nananahi',
        'nagpupunas1naglalaba2nagwawalis3nagsasampay',
        'nagsasampay1nagluluto2nagwawalis3nananahi',
        'nagsusulat1naglalaro2nagluluto3nagwawalis',
        'nagtuturo1nagwawalis2naglalaro3nagpupunas',
        'nagwawalis1naglalaba2nagluluto3nagpupunas',
        'nakikinig1nagluluto2naglalaro3nagbabasa',
        'namamalimos1nagwawalis2nagtuturo3nagbabasa',
        'nananahi1nagpipinta2nagluluto3nagpupunas',
        'nanonood1nagbabasa2natutulog3kumakanta',
        'nanunukso1lumalangoy2sumasayaw3umiinom',
        'natutulog1kumakain2naglilinis3tumatawa',
        'sumisigaw1tumatawa2nagdarasal3nagsusulat',
        'sumisipa1kumakain2naglalaba3nagwawalis',
        'tumatakbo1lumalangoy2nagbabasa3kumakain',
        'umaawit1kumakain2umiinom3natutulog',
        'umiinom1nagdarasal2naglalakad3umaawit',
        'umiiyak1tumatawa2nanunukso3nagsusulat',
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

function pvv_image(string $word): string {
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
    foreach (pvv_tiers($lvl, $grd) as $tier) {
        foreach ($dataByTier[$tier] as $i => $item) {
            $candidates[] = ['key' => "t$tier:$i", 'tier' => $tier, 'item' => $item];
        }
    }
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($candidates, static fn($c) => !in_array($c['key'], $used, true)));
    if (!$available) {
        $active = pvv_tiers($lvl, $grd);
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
        'image' => pvv_image($pick['item']['correct']),
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
        <p style="font-size:15pt;color:#800080;line-height:1.5;text-wrap:balance;margin:5px auto 16px;">Ang pandiwang tumutukoy sa larawan ay <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?>'</strong>.</p>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:100%;max-height:250px;width:auto;height:auto;border:1px solid #888;object-fit:contain;">
        <p style="font-size:22pt;color:#CC0066;font-weight:700;margin:0px 0 0;"><?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php echo ob_get_clean(); ?>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current'];
    ob_start(); ?>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Larawan para sa tanong" style="max-width:100%;max-height:250px;width:auto;height:auto;border:1px solid #888;object-fit:contain;margin:0 auto 16px;">
        <br/><br/><p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:0;">Piliin ang pandiwang tumutukoy sa larawan.</p><br/>
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
