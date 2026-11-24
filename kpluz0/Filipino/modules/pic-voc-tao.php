<?php
// filipino/modules/pic-voc-tao.php
// Mga Tao sa Ating Komunidad — identify the person represented by a picture.
// Difficulty-based banks; legacy intended audience: Grades 2–3.
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
$moduleTitle = 'Mga Tao sa Ating Komunidad';
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

function pvt_tiers(string $lvl, int $grd): array {
    // The original module selected vocabulary by difficulty, not grade.
    return $lvl === 'Easy' ? [1] : [2, 3];
}

// Original data, unchanged. Each string is correct1wrong2wrong3wrong.
$rawByTier = [
    1 => [
        'barbero1bumbero2pulis3piloto',
        'bumbero1nars2pulis3pintor',
        'dentista1pulis2nars3guro',
        'duktor1dentista2nars3guro',
        'guro1duktor2dentista3hukom',
        'hukom1duktor2piloto3pintor',
        'madre1pari2guro3nars',
        'nars1duktor2dentista3guro',
        'pari1duktor2pulis3madre',
        'piloto1pintor2hukom3pari',
        'pintor1dentista2nars3pulis',
        'pulis1bumbero2drayber3piloto',
        'sastre1pulis2guro3piloto',
        'sundalo1barbero2piloto3pari',
        'tindera1guro2nars3madre',
        'weyter1pulis2guro3pari',
    ],
    2 => [
        'basurero1pulis2piloto3sundalo',
        'drayber1duktor2guro3pulis',
        'dyanitor1pulis2bumbero3pintor',
        'guwardiya1duktor2weyter3piloto',
        'kusinero1pulis2weyter3pari',
        'minero1drayber2piloto3pintor',
        'modista1guro2nars3madre',
        'musikero1weyter2pintor3hukom',
        'sirkero1modista2mang-aawit3payaso',
        'tubero1nars2bumbero3pintor',
    ],
    3 => [
        'abogado1magsasaka2karpintero3kaminero',
        'beterinaryo1manunulat2manananggol3manghihilot',
        'boksingero1manunulat2arkitekto3inhinyero',
        'karpintero1tindero2piloto3abogado',
        'magsasaka1kaminero2manunulat3mangingisda',
        'mangingisda1magsasaka2mangangaso3karpintero',
        'mangangaso1manananggol2kaminero3magsasaka',
        'modista1abogada2manunulat3tindera',
        'panadero1kusinero2kaminero3abogado',
        'sapatero1barbero2karpintero3tubero',
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

function pvt_bind(string $value): string {
    $escaped = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    return preg_replace('/\s+(\S+\s+\S+)$/u', '&nbsp;$1', $escaped, 1);
}
function pvt_image(string $word): string {
    // Legacy URL: ../images/bokabularyo/<word>.jpg from the module directory.
    return '../images/bokabularyo/' . rawurlencode($word) . '.jpg';
}

$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null || isset($_POST['Submit2'])) {
    $candidates = [];
    foreach (pvt_tiers($lvl, $grd) as $tier) {
        foreach ($dataByTier[$tier] as $i => $item) {
            $candidates[] = ['key' => "t$tier:$i", 'tier' => $tier, 'item' => $item];
        }
    }
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($candidates, static fn($c) => !in_array($c['key'], $used, true)));
    if (!$available) {
        $active = pvt_tiers($lvl, $grd);
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
        'qid' => bin2hex(random_bytes(16)),
        'correct' => $pick['item']['correct'],
        'choices' => $choices,
        'image' => pvt_image($pick['item']['correct']),
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
                <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:150px;min-height:64px;max-width:260px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;word-break:break-word;box-sizing:border-box;line-height:1.3;">
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
