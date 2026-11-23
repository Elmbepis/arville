<?php
// filipino/modules/pic-voc-nouns.php
// Pag-uugnay ng Pangngalan sa Larawan — identify the noun represented by a picture.
// 2 levels via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// Legacy banks 1, 2, 3 retained; Easy uses bank 1; Hard combines banks 2 and 3.

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
$moduleTitle = 'Pag-uugnay ng Pangngalan sa Larawan';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function pvn_tiers(string $lvl, int $grd): array {
    // The original module selected vocabulary by difficulty, not grade.
    return $lvl === 'Easy' ? [1] : [2, 3];
}

// Original data, unchanged. Each string is correct1wrong2wrong3wrong.
$rawByTier = [
    1 => [
        'agiw1ampaw2anahaw3ambon',
        'ampaw1agiw2anahaw3alapaap',
        'bangka1bapor2bahay3balsa',
        'bloke1barya2barko3bakod',
        'blusa1bloke2bulsa3belo',
        'globo1gripo2gusali3orasan',
        'graba1grasa2troso3bloke',
        'grasa1graba2troso3langis',
        'gripo1globo2gulong3gusali',
        'gusali1globo2bloke3tulay',
        'hikab1dighay2kindat3sinok',
        'kadena1kalesa2kahon3kabinet',
        'kaldero1timba2pinggan3kalan',
        'kamera1kahon2kabinet3kadena',
        'kawali1kamera2kalan3kadena',
        'kutsara1tinidor2plato3kutsilyo',
        'kutsilyo1tinidor2plato3kutsara',
        'lababo1kaldero2kawali3kabinet',
        'maleta1kahon2medyas3kabinet',
        'mangkok1plato2pitsel3tasa',
        'orasan1aklat2salamin3gunting',
        'payong1plato2palda3panyo',
        'pitsel1plato2baso3balde',
        'plantsa1pitsel2kalan3panyo',
        'punda1palda2kumot3panyo',
        'saklay1suklay2sako3sukli',
        'sipit1suklay2sobre3sapot',
        'sobre1aklat2lapis3sako',
        'suklay1saklay2sako3sukli',
        'sungay1kalansay2tangkay3sampay',
        'tabla1bloke2globo3tangkay',
        'tahong1talaba2tabla3taho',
        'talbos1tabla2tahong3taklob',
        'tangkay1kalansay2sungay3tangke',
        'tolda1bahay2kubo3tulay',
        'yungib1talampas2lambak3burol',
        'barbero1bumbero2minero3sastre',
        'bumbero1barbero2pulis3guwardiya',
        'dentista1dyanitor2nars3guro',
        'drayber1dentista2bumbero3pulis',
        'duktor1dentista2nars3sundalo',
        'hukom1duktor2bumbero3tubero',
        'madre1modista2guro3mang-aawit',
        'minero1dyanitor2weyter3pintor',
        'pari1hukom2abogado3sundalo',
        'piloto1magsasaka2kusinero3barbero',
        'pintor1manunulat2piloto3panadero',
        'pulis1bumbero2drayber3dyanitor',
        'sastre1piloto2barbero3pintor',
        'sundalo1barbero2piloto3bumbero',
        'tindera1dentista2nars3madre',
        'tubero1pintor2kusinero3drayber',
        'weyter1kusinero2panadero3drayber',
        'uwak1lawin2kuwago3kalapati',
    ],
    2 => [
        'balabal1bisagra2tapete3botelya',
        'buhawi1bulalakaw2kumunoy3talampas',
        'garapon1kaldero2hurno3puswelo',
        'kabute1kalabasa2labanos3saging',
        'katig1kalasag2hurno3ampibyo',
        'niyebe1buhawi2arktiko3alapaap',
        'prinsesa1hari2prinsipe3reyna',
        'prinsipe1prinsesa2hari3reyna',
        'sirena1prinsesa2prinsipe3hukom',
        'talaba1tahong2tulya3ulang',
        'tanglaw1batingaw2lagablab3bulalakaw',
        'basurero1bumbero2barbero3sundalo',
        'dyanitor1mang-aawit2bumbero3sundalo',
        'guwardiya1sundalo2piloto3bumbero',
        'karpintero1mang-aawit2sastre3kusinero',
        'kusinero1sundalo2bumbero3magsasaka',
        'magsasaka1sundalo2kusinero3weyter',
        'mangingisda1magsasaka2tubero3kusinero',
        'musikero1manunulat2dentista3piloto',
        'sirkero1modista2mang-aawit3payaso',
        'bubuyog1lamok2tipaklong3paruparo',
        'buwaya1alakdan2bubuli3ahas',
        'gorilya1unggoy2oso3mawmag',
        'kalapati1uwak2lawin3kuwago',
        'kuwago1kalapati2uwak3lawin',
        'paruparo1lamok2tipaklong3bubuyog',
        'paniki1kalapati2bubuyog3kuwago',
    ],
    3 => [
        'abaniko1amatista2ardilya3kumintang',
        'ambulansya1ospital2klinika3bumbero',
        'ampibyo1araknida2reptilya3insekto',
        'bahaghari1bulalakaw2buhawi3lagablab',
        'balkonahe1hagdanan2kisame3alulod',
        'batingaw1bisagra2balintataw3muog',
        'bisagra1liyabe2batingaw3turnilyo',
        'bulalakaw1buhawi2kometa3balintataw',
        'kalabasa1kabute2labanos3pakwan',
        'kasangkapan1kalasag2kwerdas3kubyertos',
        'kometa1buhawi2bulalakaw3balintataw',
        'labanos1kalabasa2kabute3pipino',
        'liyabe1bisagra2batingaw3tapete',
        'polusyon1alapaap2buhawi3niyebe',
        'reptilya1araknida2ampibyo3insekto',
        'abogado1magsasaka2karpintero3kaminero',
        'beterinaryo1manunulat2manananggol3manghihilot',
        'boksingero1manunulat2arkitekto3inhinyero',
        'mangangaso1manananggol2magsasaka3mangingisda',
        'modista1abogada2manunulat3tindera',
        'panadero1kusinero2kaminero3abogado',
        'sapatero1barbero2karpintero3tubero',
        'baboy-ramo1tigre2gorilya3buwaya',
        'kuliglig1bubuyog2paruparo3gagamba',
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

function pvn_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;margin:20px auto;padding:20px 26px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">' . $html . '</div>';
}
function pvn_bind(string $value): string {
    $escaped = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    return preg_replace('/\s+(\S+\s+\S+)$/u', '&nbsp;$1', $escaped, 1);
}
function pvn_image(string $word): string {
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
    foreach (pvn_tiers($lvl, $grd) as $tier) {
        foreach ($dataByTier[$tier] as $i => $item) {
            $candidates[] = ['key' => "t$tier:$i", 'tier' => $tier, 'item' => $item];
        }
    }
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($candidates, static fn($c) => !in_array($c['key'], $used, true)));
    if (!$available) {
        $active = pvn_tiers($lvl, $grd);
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
        'image' => pvn_image($pick['item']['correct']),
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
        <br/><br/><p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:0;">Piliin ang pangngalang tumutukoy sa larawan.</p><br/>
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
<div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Gaano kahirap ang gusto mong susunod na tanong?</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0" style="max-width:480px;"><tr>
        <?php foreach ($levels as $level): ?>
        <td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $level; ?>" <?php echo $lvl === $level ? 'checked' : ''; ?>> <b><?php echo $level === 'Easy' ? 'Madali' : 'Mahirap'; ?></b></label></td>
        <?php endforeach; ?>
    </tr></table>
</div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
