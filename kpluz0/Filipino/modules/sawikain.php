<?php
// filipino/modules/sawikain.php
// Idioms with dynamically generated choices.

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
$moduleTitle = 'Mga Sawikain';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
$tier = "all";
function pua_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, "UTF-8"); }
$groups = [
    // Group 1
    [
        ["agaw-buhay", "naghihingalo"],
        ["anak-pawis", "magsasaka o manggagawa"],
        ["anak-dalita", "mahirap"],
        ["alilang-kanin", "utusang pagkain lamang ang kabayaran"],
        ["balat-sibuyas", "masyadong maramdamin"],
        ["balat-kalabaw", "hindi maramdamin"],
        ["buto't balat", "payat na payat"],
        ["balik-harap", "mabuti sa harap, taksil sa likod"],
        ["bantay-salakay", "taong nagsasamantala sa kanyang binabantayan"],
        ["dalawa ang bibig", "mabunganga o madaldal"],
        ["mahapdi ang bituka", "nagugutom"],
        ["maanghang ang dila", "bastos magsalita"],
        ["may sinasabi", "mayaman o likas na matalino"],
        ["halang ang bituka", "hindi nangingiming pumatay"],
        ["tatlo ang mata", "mapaghanap ng mali"],
        ["matigas ang katawan", "tamad"],
        ["itaga sa bato", "tandaan"],
        ["isulat sa tubig", "kalimutan"],
    ],
    // Group 2
    [
        ["balitang kutsero", "hindi totoong balita"],
        ["bungang-tulog", "panaginip"],
        ["hampas-lupa", "lagalag o busabos"],
        ["kabiyak ng dibdib", "asawa"],
        ["kusang palo", "sariling sipag"],
        ["pag-iisang dibdib", "pagpapakasal"],
        ["maitim ang budhi", "masamang tao"],
        ["matigas ang leeg", "mapagmataas o di namamansin"],
        ["nagbibilang ng poste", "walang trabaho"],
        ["namamangka sa dalawang ilog", "salawahan"],
        ["nagmumurang kamatis", "matandang nag-aayos na parang binata o dalaga"],
        ["naniningalang-pugad", "nanliligaw"],
        ["nakahiga sa pera", "mayaman"],
        ["madilim ang mukha", "nakasimangot o problemado"],
    ],
    // Group 3
    [
        ["bukal sa loob", "taos-puso o tapat"],
        ["kidlat sa bilis", "napakabilis"],
        ["may daga sa dibdib", "natatakot"],
        ["di mahulugan ng karayom", "lugar na may maraming tao"],
        ["tulak ng bibig", "sa salita lamang"],
        ["magdilang anghel", "magkatotoo sana"],
        ["kumukulo ang dugo", "naiinis o nasusuklam"],
        ["magaan ang dugo", "madaling makapalagayan ng loob"],
        ["maitim ang dugo", "salbahe o tampalasan"],
        ["makalaglag-matsing", "nakaaakit"],
        ["makapal ang palad", "masipag"],
        ["makuskos-balungos", "mareklamo o mahirap pasayahin"],
        ["namuti ang mata", "nainip sa kahihintay"],
        ["mababaw ang luha", "madaling maiyak"],
        ["makapal ang mukha", "di marunong mahiya"],
        ["manipis ang mukha", "mahiyain"],
        ["maaliwalas ang mukha", "masayahin"],
        ["ningas-kugon", "siglang panandalian lamang"],
        ["sanga-sangang dila", "sinungaling"],
    ],
    // Group 4
    [
        ["butas ang bulsa", "walang pera"],
        ["di makabasag-pinggan", "mahinhin"],
        ["makapal ang bulsa", "maraming pera"],
        ["matigas ang buto", "malakas"],
        ["mabigat ang kamay", "tamad o ayaw magtrabaho"],
        ["magaan ang kamay", "madaling manuntok o manakit"],
        ["malikot ang kamay", "kumukuha ng hindi kanya"],
        ["makati ang dila", "madaldal"],
        ["matalas ang dila", "masakit magsalita"],
        ["matamis ang dila", "mahusay mangusap, bolero"],
        ["nagbabatak ng buto", "nagtatrabaho nang labis-labis"],
        ["sukat ang bulsa", "marunong gumamit ng pera"],
        ["makitid ang isip", "mahinang umunawa"],
        ["malawak ang isip", "madaling umunawa"],
        ["malakas ang loob", "matapang"],
        ["mahina ang loob", "duwag"],
        ["mababa ang loob", "mapagpakumbaba"],
        ["masama ang loob", "nagdaramdam"],
    ],
    // Group 5
    [
        ["basag-ulo", "gulo o away"],
        ["panis ang laway", "taong di-palakibo"],
        ["patay-gutom", "labis-labis kung kumain"],
        ["makati ang paa", "mahilig sa gala o lakad"],
        ["maputi ang tainga", "kuripot"],
        ["matalas ang tainga", "madaling makarinig"],
        ["matalas ang ulo", "matalino"],
        ["matigas ang ulo", "ayaw makinig sa pangaral"],
        ["sampid-bakod", "nakikikain o nakikitira"],
        ["sampay-bakod", "taong nagpapanggap"],
        ["takaw-tulog", "mahilig matulog"],
        ["taingang kawali", "nagbibingi-bingihan"],
        ["tawang-aso", "nagmamayabang o nangmamaliit"],
    ],
    // Group 6
    [
        ["mabigat ang loob", "may sama ng loob o pag-aatubili"],
        ["bulaklak ng dila", "pagpapalabis sa katotohanan"],
        ["pantay ang mga paa", "patay na"],
        ["saling-pusa", "pansamantalang kasali sa laro"],
        ["mahangin ang ulo", "mayabang"],
        ["utang na loob", "malaking pasasalamat sa kabutihang natanggap"],
        ["malamig ang ulo", "mahinahon"],
        ["mainit ang ulo", "madaling magalit"],
        ["lumaki ang ulo", "yumabang"],
        ["utak-biya", "mahina ang ulo"],
    ],
 ];
$banks = [$tier => []];
foreach ($groups as $g => $entries) {
    foreach ($entries as $entry) $banks[$tier][] = [$entry[0], $entry[1], $g];
}
function pua_question(array $entry, string $tier, string $lvl): array {
    global $groups;
    [$word, $correct, $g] = $entry;
    $wrong = [];
    foreach ($groups[$g] as [$other, $meaning]) {
        if ($other === $word || $meaning === $correct) continue;
        if (in_array($word, ['mahangin ang ulo','lumaki ang ulo'], true) && in_array($other, ['mahangin ang ulo','lumaki ang ulo'], true)) continue;
        $wrong[] = $meaning;
    }
    $wrong = array_values(array_unique($wrong));
    shuffle($wrong);
    $choices = array_merge([$correct], array_slice($wrong, 0, 3));
    shuffle($choices);
    return ['word'=>pua_h($word), 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    foreach ($available as $idx) $byCategory[$banks[$tier][$idx][2]][] = $idx;
    $category = array_rand($byCategory);
    $i = $byCategory[$category][array_rand($byCategory[$category])];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pua_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Kahulugan: <span style="color:#CC0066;"><?php echo pua_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:40px auto;max-width:450px;">Piliin ang ibig sabihin ng sawikain sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pua_h($choice); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php endif; ?>

</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
