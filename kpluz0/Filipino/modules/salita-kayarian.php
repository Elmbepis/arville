<?php
// filipino/modules/salita-kayarian.php
// Static word banks; legacy Medium and Hard combined.

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
$moduleTitle = 'Kayarian ng Salita';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$tier = $lvl;
function pg_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    'Easy' => [
        ["aklat", "Payak"],
        ["aral", "Payak"],
        ["awit", "Payak"],
        ["babae", "Payak"],
        ["bahay", "Payak"],
        ["bayani", "Payak"],
        ["bigat", "Payak"],
        ["bintana", "Payak"],
        ["bituin", "Payak"],
        ["dilim", "Payak"],
        ["ginhawa", "Payak"],
        ["halaga", "Payak"],
        ["lakas", "Payak"],
        ["langis", "Payak"],
        ["liksi", "Payak"],
        ["lipunan", "Maylapi"],
        ["lungsod", "Payak"],
        ["kusina", "Payak"],
        ["panahon", "Payak"],
        ["pinggan", "Payak"],
        ["pinto", "Payak"],
        ["presyo", "Payak"],
        ["prito", "Payak"],
        ["rehiyon", "Payak"],
        ["salapi", "Payak"],
        ["sahig", "Payak"],
        ["simba", "Payak"],
        ["talino", "Payak"],
        ["tinapay", "Payak"],
        ["tubig", "Payak"],
        ["watawat", "Payak"],
        ["yaman", "Payak"],
        ["binasa", "Maylapi"],
        ["humingi", "Maylapi"],
        ["inangkin", "Maylapi"],
        ["kaklase", "Maylapi"],
        ["kasabay", "Maylapi"],
        ["harapan", "Maylapi"],
        ["lumangoy", "Maylapi"],
        ["mabait", "Maylapi"],
        ["maganda", "Maylapi"],
        ["magtapon", "Maylapi"],
        ["mahusay", "Maylapi"],
        ["manghiram", "Maylapi"],
        ["matupad", "Maylapi"],
        ["maysakit", "Tambalan"],
        ["nakabili", "Maylapi"],
        ["nagtungo", "Maylapi"],
        ["ipamili", "Maylapi"],
        ["paaralan", "Maylapi"],
        ["pabulong", "Maylapi"],
        ["pakisabi", "Maylapi"],
        ["pambata", "Maylapi"],
        ["samahan", "Maylapi"],
        ["sinagot", "Maylapi"],
        ["tagapayo", "Maylapi"],
        ["tinalon", "Maylapi"],
        ["umalis", "Maylapi"],
        ["umandar", "Maylapi"],
        ["abot-kamay", "Tambalan"],
        ["abot-kaya", "Tambalan"],
        ["abot-tanaw", "Tambalan"],
        ["akyat-bahay", "Tambalan"],
        ["araw-gabi", "Tambalan"],
        ["asal-bata", "Tambalan"],
        ["bahay-bata", "Tambalan"],
        ["bahay-kubo", "Tambalan"],
        ["balikbayan", "Tambalan"],
        ["hanapbuhay", "Tambalan"],
        ["isip-bata", "Tambalan"],
        ["kapitbahay", "Tambalan"],
        ["labas-pasok", "Tambalan"],
        ["pikit-mata", "Tambalan"],
        ["sulat-kamay", "Tambalan"],
        ["tabing-dagat", "Tambalan"],
        ["taong-bahay", "Tambalan"],
        ["taong-gubat", "Tambalan"],
        ["takaw-mata", "Tambalan"],
        ["agad-agad", "Inuulit"],
        ["alun-alon", "Inuulit"],
        ["anting-anting", "Inuulit"],
        ["ano-ano", "Inuulit"],
        ["araw-araw", "Inuulit"],
        ["bagay-bagay", "Inuulit"],
        ["bahay-bahay", "Inuulit"],
        ["basta-basta", "Inuulit"],
        ["buhay-buhay", "Inuulit"],
        ["buwan-buwan", "Inuulit"],
        ["dala-dala", "Inuulit"],
        ["dali-dali", "Inuulit"],
        ["gabi-gabi", "Inuulit"],
        ["iba-iba", "Inuulit"],
        ["isa-isa", "Inuulit"],
        ["halo-halo", "Inuulit"],
        ["kiti-kiti", "Inuulit"],
        ["mali-mali", "Inuulit"],
        ["punit-punit", "Inuulit"],
        ["kabit-kabit", "Inuulit"],
        ["sabay-sabay", "Inuulit"],
        ["sabi-sabi", "Inuulit"],
        ["salit-salit", "Inuulit"],
        ["salu-salo", "Inuulit"],
        ["sama-sama", "Inuulit"],
        ["sapin-sapin", "Inuulit"],
        ["tira-tira", "Inuulit"],
        ["taon-taon", "Inuulit"],
        ["tuloy-tuloy", "Inuulit"],
        ["turo-turo", "Inuulit"],
        ["uli-uli", "Inuulit"],
    ],
    'Hard' => [
        ["bakasyon", "Payak"],
        ["bayani", "Payak"],
        ["bintana", "Payak"],
        ["bituin", "Payak"],
        ["bulaklak", "Payak"],
        ["dalandan", "Payak"],
        ["enerhiya", "Payak"],
        ["ginhawa", "Payak"],
        ["halaga", "Payak"],
        ["langis", "Payak"],
        ["lipunan", "Maylapi"],
        ["lungsod", "Payak"],
        ["mungkahi", "Payak"],
        ["panahon", "Payak"],
        ["pinggan", "Payak"],
        ["rehiyon", "Payak"],
        ["serbisyo", "Payak"],
        ["tinapay", "Payak"],
        ["watawat", "Payak"],
        ["basurahan", "Maylapi"],
        ["binaligtad", "Maylapi"],
        ["kagandahan", "Maylapi"],
        ["kalinisan", "Maylapi"],
        ["kasindami", "Maylapi"],
        ["katumbas", "Maylapi"],
        ["kayamanan", "Maylapi"],
        ["galugarin", "Maylapi"],
        ["gambalain", "Maylapi"],
        ["guntingin", "Maylapi"],
        ["magpakita", "Maylapi"],
        ["magpakilala", "Maylapi"],
        ["mandaraya", "Maylapi"],
        ["maparaan", "Maylapi"],
        ["nagmalabis", "Maylapi"],
        ["pagbiyahe", "Maylapi"],
        ["pagkabahala", "Maylapi"],
        ["pagkamusmos", "Maylapi"],
        ["paliwanag", "Maylapi"],
        ["pangingisda", "Maylapi"],
        ["pinahanga", "Maylapi"],
        ["pinakaluma", "Maylapi"],
        ["sumalubong", "Maylapi"],
        ["tumanggap", "Maylapi"],
        ["agaw-buhay", "Tambalan"],
        ["agaw-pansin", "Tambalan"],
        ["bagong-luto", "Tambalan"],
        ["balat-sibuyas", "Tambalan"],
        ["doble-kara", "Tambalan"],
        ["gawang-tao", "Tambalan"],
        ["bagong-buhay", "Tambalan"],
        ["bagong-gising", "Tambalan"],
        ["bagong-kasal", "Tambalan"],
        ["balang-araw", "Tambalan"],
        ["batong-baka", "Tambalan"],
        ["bukas-loob", "Tambalan"],
        ["bukas-puso", "Tambalan"],
        ["hugas-bigas", "Tambalan"],
        ["lakas-loob", "Tambalan"],
        ["lakbay-aral", "Tambalan"],
        ["lamandagat", "Tambalan"],
        ["lamang-loob", "Tambalan"],
        ["lamang-lupa", "Tambalan"],
        ["punong-guro", "Tambalan"],
        ["punong-kahoy", "Tambalan"],
        ["silid-aralan", "Tambalan"],
        ["silid-aklatan", "Tambalan"],
        ["silid-tulugan", "Tambalan"],
        ["simbang-gabi", "Tambalan"],
        ["takdang-aralin", "Tambalan"],
        ["taos-puso", "Tambalan"],
        ["tiklop-tuhod", "Tambalan"],
        ["ulilang-lubos", "Tambalan"],
        ["ama-amahan", "Inuulit"],
        ["anak-anakan", "Inuulit"],
        ["ari-arian", "Inuulit"],
        ["bahay-bahayan", "Inuulit"],
        ["durug-durog", "Inuulit"],
        ["handang-handa", "Inuulit"],
        ["hinay-hinay", "Inuulit"],
        ["hinding-hindi", "Inuulit"],
        ["hagdan-hagdan", "Inuulit"],
        ["kitang-kita", "Inuulit"],
        ["libo-libo", "Inuulit"],
        ["liko-liko", "Inuulit"],
        ["pantay-pantay", "Inuulit"],
        ["patung-patong", "Inuulit"],
        ["pulang-pula", "Inuulit"],
        ["punong-puno", "Inuulit"],
        ["pulu-pulo", "Inuulit"],
        ["putol-putol", "Inuulit"],
        ["tipon-tipon", "Inuulit"],
        ["unang-una", "Inuulit"],
        ["usap-usapan", "Inuulit"],
        ["watak-watak", "Inuulit"],
        ["yugtu-yugto", "Inuulit"],
        ["alpabeto", "Payak"],
        ["balangkas", "Payak"],
        ["barangay", "Payak"],
        ["diksiyonaryo", "Payak"],
        ["demokrasya", "Payak"],
        ["ekonomiya", "Payak"],
        ["impormasyon", "Payak"],
        ["kampanya", "Payak"],
        ["kumpanya", "Payak"],
        ["lokasyon", "Payak"],
        ["longganisa", "Payak"],
        ["populasyon", "Payak"],
        ["relihiyon", "Payak"],
        ["siyensiya", "Payak"],
        ["suliranin", "Maylapi"],
        ["teknolohiya", "Payak"],
        ["tradisyon", "Payak"],
        ["unibersidad", "Payak"],
        ["isinabuhay", "Maylapi"],
        ["isinaloob", "Maylapi"],
        ["pangangalikot", "Maylapi"],
        ["panghihilakbot", "Maylapi"],
        ["pumaimbulog", "Maylapi"],
        ["pumahimpapawid", "Maylapi"],
        ["bumalangkas", "Maylapi"],
        ["bumatikos", "Maylapi"],
        ["guminhawa", "Maylapi"],
        ["hinagupit", "Maylapi"],
        ["humalakhak", "Maylapi"],
        ["humantong", "Maylapi"],
        ["humatsing", "Maylapi"],
        ["humiwalay", "Maylapi"],
        ["kumalansing", "Maylapi"],
        ["lumiwanag", "Maylapi"],
        ["sinamantala", "Maylapi"],
        ["balasubasin", "Maylapi"],
        ["baligtarin", "Maylapi"],
        ["barikadahan", "Maylapi"],
        ["balangkasin", "Maylapi"],
        ["bilangguan", "Maylapi"],
        ["halungkatin", "Maylapi"],
        ["insultuhin", "Maylapi"],
        ["intindihin", "Maylapi"],
        ["samantalahin", "Maylapi"],
        ["tangkilikin", "Maylapi"],
        ["akdang-sining", "Tambalan"],
        ["atras-abante", "Tambalan"],
        ["bahaghari", "Tambalan"],
        ["bahay-ampunan", "Tambalan"],
        ["bahay-pukyutan", "Tambalan"],
        ["balatkayo", "Tambalan"],
        ["balikbayan", "Tambalan"],
        ["balik-eskwela", "Tambalan"],
        ["baybaying-dagat", "Tambalan"],
        ["biglang-yaman", "Tambalan"],
        ["bigyang-buhay", "Tambalan"],
        ["bukang-liwayway", "Tambalan"],
        ["bungangkahoy", "Tambalan"],
        ["buntong-hininga", "Tambalan"],
        ["habambuhay", "Tambalan"],
        ["halamang-ugat", "Tambalan"],
        ["kalapit-bayan", "Tambalan"],
        ["manhik-manaog", "Tambalan"],
        ["pakitang-gilas", "Tambalan"],
        ["panukalang-batas", "Tambalan"],
        ["pulot-pukyutan", "Tambalan"],
        ["punong-bayan", "Tambalan"],
        ["punong-tanggapan", "Tambalan"],
        ["salingwika", "Tambalan"],
        ["salinlahi", "Tambalan"],
        ["sawimpalad", "Tambalan"],
        ["takipsilim", "Tambalan"],
        ["bulong-bulungan", "Inuulit"],
        ["kalung-kalong", "Inuulit"],
        ["katakut-takot", "Inuulit"],
        ["kulang-kulang", "Inuulit"],
        ["kumpul-kumpol", "Inuulit"],
        ["linggo-linggo", "Inuulit"],
        ["litong-lito", "Inuulit"],
        ["mamasa-masa", "Inuulit"],
        ["mangiyak-ngiyak", "Inuulit"],
        ["masayang-masaya", "Inuulit"],
        ["nanay-nanayan", "Inuulit"],
        ["paminsan-minsan", "Inuulit"],
        ["papikit-pikit", "Inuulit"],
        ["patingin-tingin", "Inuulit"],
        ["paulit-ulit", "Inuulit"],
    ],
];
function pg_question(array $entry, string $tier, string $lvl): array {
    $word = pg_h($entry[0]);
    return ['word'=>$word, 'filled'=>$word, 'correct'=>$entry[1], 'choices'=>['Payak','Maylapi','Tambalan','Inuulit'], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $byCategory = [];
    foreach ($available as $index) $byCategory[$banks[$tier][$index][1]][] = $index;
    $group = $byCategory[array_rand($byCategory)];
    $i = $group[array_rand($group)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pg_question($banks[$tier][$i], $tier, $lvl);
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
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['filled']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo pg_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang kayarian ng salita sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pg_h($choice); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
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
