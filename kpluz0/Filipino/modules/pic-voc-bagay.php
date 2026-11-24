<?php
// filipino/modules/pic-voc-bagay.php
// Mga Bagay sa Ating Paligid — identify the object represented by a picture.
// Single scoring level (Easy); original grade condition determines vocabulary.
// Grade 0: 43 questions; Grades 1–10: 36 questions.

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
$moduleTitle = 'Mga Bagay sa Ating Paligid';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
// Legacy module has one difficulty setting, but TWO grade-specific banks.
// Do not change the shared $_SESSION['level'] used by other modules.
$lvl = 'Easy';
function pvb_tiers(string $lvl, int $grd): array {
    return $grd < 1 ? [1] : [2];
}

// Exact original grade-specific object banks and distractors.
$rawByTier = [
    1 => [
        'apa1tasa2baso3tabo',
        'bahay1bato2barko3bakod',
        'bakod1bato2bahay3kalye',
        'balde1baso2tabo3paso',
        'bangka1bakod2bahay3bulsa',
        'baro1baso2laso3hikaw',
        'baso1balde2tasa3paso',
        'belo1baso2bota3bimpo',
        'bimpo1damit2supot3papel',
        'bola1bota2baso3belo',
        'bota1bote2belo3bola',
        'bote1tasa2baso3tabo',
        'bulsa1bulak2panyo3medyas',
        'hikaw1suklay2pera3relo',
        'ilaw1araw2init3hikaw',
        'kalan1hapag2plato3kahon',
        'kama1silya2kahon3mesa',
        'kapa1kape2kama3kawa',
        'kawa1kapa2kama3kalan',
        'kubo1bangka2kama3bakod',
        'kumot1unan2kama3damit',
        'kuna1unan2kumot3kahon',
        'lapis1papel2aklat3susi',
        'laso1lata2baso3tasa',
        'lata1bote2baso3tasa',
        'maso1pako2laso3mesa',
        'mesa1maso2silya3kuna',
        'pako1susi2lapis3lata',
        'pala1maso2itak3piko',
        'paso1balde2tasa3baso',
        'piko1biko2pala3maso',
        'pito1piko2pala3piso',
        'punda1palda2kumot3panyo',
        'relo1hikaw2susi3yelo',
        'sako1siko2pako3susi',
        'sipit1susi2silya3sako',
        'susi1pako2lapis3lata',
        'sulo1sulat2supot3susi',
        'tabo1timba2tasa3bote',
        'tali1tabo2tasa3lata',
        'tasa1balde2paso3baso',
        'tulay1talon2tulya3tulak',
        'unan1kumot2bimpo3kama',
    ],
    2 => [
        'bahay1bundok2barko3bakod',
        'bakod1bapor2bahay3kalye',
        'balde1kaldero2tabo3paso',
        'bangka1bapor2bahay3balsa',
        'bloke1barya2barko3bakod',
        'blusa1bloke2bulsa3belo',
        'bulsa1bulak2panyo3medyas',
        'globo1gripo2gusali3orasan',
        'gripo1globo2gulong3gusali',
        'gusali1globo2bloke3tulay',
        'hikaw1suklay2singsing3relo',
        'kadena1kalesa2kahon3kabinet',
        'kalan1kaldero2pinggan3kahon',
        'kaldero1timba2pinggan3kalan',
        'kama1silya2kabinet3mesa',
        'kamera1kahon2kabinet3kadena',
        'kawali1kamera2kalan3kadena',
        'kotse1bangka2gulong3kamera',
        'kumot1kuna2kama3medyas',
        'kutsara1tinidor2plato3kutsilyo',
        'kutsilyo1tinidor2plato3kutsara',
        'lababo1kaldero2kawali3kabinet',
        'maleta1kahon2medyas3kabinet',
        'mangkok1plato2pitsel3tasa',
        'orasan1aklat2salamin3gunting',
        'payong1plato2palda3panyo',
        'pitsel1plato2baso3bote',
        'plantsa1pitsel2kalan3panyo',
        'punda1palda2kumot3panyo',
        'saklay1suklay2sako3sukli',
        'sipit1suklay2sobre3supot',
        'sobre1aklat2lapis3sako',
        'suklay1saklay2sako3sukli',
        'supot1suklay2sipit3kumot',
        'tolda1bahay2kubo3tulay',
        'tulay1talon2tulya3tulak',
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

function pvb_image(string $word): string {
    // Legacy URL: ../images/bokabularyo/<word>.jpg from the module directory.
    return '../images/bokabularyo/' . rawurlencode($word) . '.jpg';
}

$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2']) && in_array($_SESSION[$sessionKey]['current']['tier'], pvb_tiers($lvl, $grd), true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = is_string($_GET['ansclick']) ? $_GET['ansclick'] : '';
    if (!in_array($clicked, $cur['choices'], true)) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null || isset($_POST['Submit2'])) {
    $candidates = [];
    foreach (pvb_tiers($lvl, $grd) as $tier) {
        foreach ($dataByTier[$tier] as $i => $item) {
            $candidates[] = ['key' => "t$tier:$i", 'tier' => $tier, 'item' => $item];
        }
    }
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($candidates, static fn($c) => !in_array($c['key'], $used, true)));
    if (!$available) {
        $active = pvb_tiers($lvl, $grd);
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
        'image' => pvb_image($pick['item']['correct']),
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
        <p style="font-size:15pt;color:#800080;line-height:1.5;text-wrap:balance;margin:5px auto 16px;">Ang salitang tumutukoy sa larawan ay <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?>'</strong>.</p>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:100%;max-height:250px;width:auto;height:auto;border:1px solid #888;object-fit:contain;">
        <p style="font-size:22pt;color:#CC0066;font-weight:700;margin:0px 0 0;"><?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php echo ob_get_clean(); ?>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current'];
    ob_start(); ?>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Larawan para sa tanong" style="max-width:100%;max-height:250px;width:auto;height:auto;border:1px solid #888;object-fit:contain;margin:0 auto 16px;">
        <br/><br/><p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:0;">Piliin ang salitang tumutukoy sa larawan.</p><br/>
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
