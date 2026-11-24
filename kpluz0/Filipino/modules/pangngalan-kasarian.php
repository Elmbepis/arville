<?php
// filipino/modules/pangngalan-kasarian.php
// Seven grade-dependent noun gender banks.

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
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId . ':banks-v2');
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$moduleTitle = 'Kasarian ng Pangngalan';
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pk_tier(string $lvl, int $grd): int {
    $tier = $grd === 0 ? 0 : ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4)));
    return min(6, $tier + ($lvl === 'Hard' ? 2 : 0));
}
function pk_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        ["ama", "hari", "iho", "itay", "kuya", "lolo", "pari", "santo", "tatay", "tiyo"],
        ["ale", "ate", "iha", "ina", "inay", "lola", "nanay", "reyna", "santa", "tiya"],
        ["bahay", "balde", "barko", "baso", "bato", "bote", "dagat", "kahon", "kama", "kumot", "ilog", "lata", "lapis", "silya", "tasa", "tubig", "yelo"],
    ],
    1 => [
        ["ama", "ginoo", "hari", "iho", "itay", "kuya", "lolo", "ninong", "pari", "santo", "tatay", "tiyo"],
        ["ale", "ate", "ginang", "iha", "ina", "inay", "lola", "madre", "nanay", "ninang", "reyna", "santa", "tiya"],
        ["bahay", "balde", "barko", "baso", "bato", "bote", "dagat", "kahon", "kama", "kumot", "ilog", "lata", "lapis", "silya", "tasa", "tubig", "yelo"],
    ],
    2 => [
        ["ama", "binata", "ginoo", "hari", "iho", "itay", "kuya", "lolo", "manong", "ninong", "pari", "santo", "tatay", "tiyo"],
        ["ale", "ate", "dalaga", "diyosa", "ginang", "iha", "ina", "inay", "ineng", "lola", "madre", "manang", "nanay", "ninang", "reyna", "santa", "tiya"],
        ["aklat", "bituin", "bundok", "bulkan", "gusali", "hardin", "kalye", "kariton", "kawali", "kotse", "medyas", "nayon", "sapatos", "sipilyo", "tabla", "tulay"],
        ["amo", "anghel", "apo", "asawa", "bata", "bayani", "biyenan", "bunso", "artista", "hayop", "kaklase", "kapatid", "kasapi", "nars", "pinsan", "pinuno", "pulis", "pulubi", "sanggol", "tao"],
    ],
    3 => [
        ["aktor", "amain", "bayaw", "binata", "biyahero", "biyudo", "don", "duke", "ginoo", "hardinero", "labandero", "kumpare", "kusinero", "manong", "maestro", "ninong", "nobyo", "pastor", "prinsipe", "sastre", "senyor", "tandang", "tindero", "tiyuhin"],
        ["aktres", "binibini", "biyahera", "biyuda", "dalaga", "dilag", "diyosa", "donya", "dukesa", "ginang", "guwapa", "hipag", "inahin", "kumare", "kusinera", "labandera", "lelang", "madre", "maestra", "manang", "modista", "mutya", "nobya", "pastora", "prinsesa", "senadora", "senyora", "tindera", "tiyahin"],
        ["bagyo", "balabal", "balita", "bisikleta", "bulalakaw", "gitara", "gusali", "himala", "kampana", "kutsara", "kutsilyo", "kuwintas", "lungsod", "paaralan", "pagkain", "palayok", "palengke", "posporo", "pulo", "sapatos", "simbahan", "tinidor"],
        ["alalay", "anghel", "artista", "apo", "asawa", "bayani", "biyenan", "bunso", "hayop", "inakay", "kasapi", "kapatid", "karibal", "mag-aaral", "mamamayan", "nars", "pamangkin", "panganay", "pangulo", "pasyente", "payaso", "pinsan", "pinuno", "pulis", "pulubi", "sundalo"],
    ],
    4 => [
        ["abugado", "bayaw", "binatilyo", "biyahero", "diko (kapatid)", "gobernador", "ingkong", "kapitan", "karpintero", "komikero", "konde", "kumpadre", "kunduktor", "kusinero", "konsehal", "maestro", "obispo", "probinsiyano", "sastre", "senyor", "senyorito", "tiyuhin", "tsismoso"],
        ["abugada", "binibini", "biyahera", "dalagita", "dilag", "dukesa", "dumalaga", "gobernadora", "hipag", "impo", "kahera", "kapitana", "karpintera", "komikera", "kondesa", "konsehala", "kumadre", "kunduktora", "kusinera", "lelang", "maestra", "modista", "tiyahin", "probinsiyana", "propesora", "senyora", "senyorita", "tsismosa"],
        ["alkansya", "babuyan", "balarila", "bisikleta", "kabuhayan", "kahulugan", "kakayahan", "kapuluan", "karagatan", "kasayahan", "kompyuter", "komunidad", "kumpanya", "kawayanan", "lagusan", "palaisdaan", "paligsahan", "paliparan", "pamahalaan", "pilapil", "suliranin", "tanggapan", "talampas"],
        ["balikbayan", "bilanggo", "biyenan", "kamag-aral", "kapitbahay", "kinakapatid", "inaanak", "mag-aaral", "mamamayan", "manugang", "miyembro", "pamangkin", "panauhin", "panganay", "pangulo", "pasyente", "payaso", "punong-guro", "sinta"],
    ],
    5 => [
        ["abugado", "arsobispo", "binatilyo", "empleyado", "engkantado", "gobernador", "kapitan", "karpintero", "konde", "konsehal", "kunduktor", "inhinyero", "lakandula", "probinsiyano", "salamangkero", "sangko", "sastre", "siko (kapatid)", "senyorito", "tsismoso"],
        ["abugada", "ditse (kapatid)", "dukesa", "dumalaga", "engkantada", "empleyada", "gobernadora", "kapitana", "karpintera", "kondesa", "konsehala", "kunduktora", "inhinyera", "inso", "lakambini", "probinsiyana", "propesora", "salamangkera", "sanse (kapatid)", "senyorita", "sitse (kapatid)", "tsismosa"],
        ["bilangguan", "dalampasigan", "institusyon", "kababalaghan", "kabalintunaan", "kakahuyan", "katapatan", "katapangan", "katarungan", "kaugnayan", "katatawanan", "pagkonsumo", "palaisipan", "pananampalataya", "paninilbihan", "paninindigan", "takipsilim", "temperatura", "unibersidad"],
        ["balikbayan", "bilanggo", "dentista", "kapitbahay", "kasambahay", "kinakapatid", "mamamayan", "manananggol", "manggagamot", "manugang", "miyembro", "pamangkin", "panauhin", "punong-guro"],
    ],
    6 => [
        ["abugado", "arsobispo", "binatilyo", "empleyado", "engkantado", "gobernador", "kapitan", "karpintero", "konde", "konsehal", "kunduktor", "inhinyero", "lakandula", "probinsiyano", "salamangkero", "sangko", "sastre", "siko (kapatid)", "senyorito", "tsismoso"],
        ["abugada", "ditse (kapatid)", "dukesa", "dumalaga", "engkantada", "empleyada", "gobernadora", "kapitana", "karpintera", "kondesa", "konsehala", "kunduktora", "inhinyera", "inso", "lakambini", "probinsiyana", "propesora", "salamangkera", "sanse (kapatid)", "senyorita", "sitse (kapatid)", "tsismosa"],
        ["bilangguan", "dalampasigan", "institusyon", "kababalaghan", "kabalintunaan", "kakahuyan", "katapatan", "katapangan", "katarungan", "kaugnayan", "katatawanan", "pagkonsumo", "palaisipan", "pananampalataya", "paninilbihan", "paninindigan", "takipsilim", "temperatura", "unibersidad"],
        ["balikbayan", "bilanggo", "dentista", "kapitbahay", "kasambahay", "kinakapatid", "mamamayan", "manananggol", "manggagamot", "manugang", "miyembro", "pamangkin", "panauhin", "punong-guro"],
    ],
];
$tier = pk_tier($lvl, $grd);
$labels = $tier <= 1 ? ['panlalaki', 'pambabae'] : ['panlalaki', 'pambabae', 'walang kasarian', 'di-tiyak'];
$pool = [];
foreach ($banks[$tier] as $category => $words) {
    if (!isset($labels[$category])) continue;
    foreach (array_unique($words) as $word) $pool[] = ['word'=>$word, 'category'=>$category];
}
function pk_question(array $entry, int $tier, string $lvl, int $grd, array $labels): array {
    return ['word'=>$entry['word'], 'correct'=>$labels[$entry['category']], 'choices'=>$labels, 'tier'=>$tier, 'lvl'=>$lvl, 'grade'=>$grd, 'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['grade'] ?? -1) === $grd
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl || ($_SESSION[$sessionKey]['current']['grade'] ?? -1) !== $grd)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($pool), $used));
    if (!$available) { $used = []; $available = array_keys($pool); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pk_question($pool[$i], $tier, $lvl, $grd, $labels);
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
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang pangngalang '<?php echo pk_h($cur['word']); ?>' ay <?php echo $cur['correct'] === 'walang kasarian' ? '' : 'may kasariang '; ?><strong style="color:#CC0066;"><?php echo pk_h($cur['correct']); ?></strong>.</p>
    <div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;overflow-wrap:anywhere;"><?php echo pk_h($cur['word']); ?></span></div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;overflow-wrap:anywhere;"><?php echo pk_h($cur['word']); ?></span></div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang kasarian ng pangngalan sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pk_h($choice); ?>
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
