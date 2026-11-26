<?php
// filipino/modules/salitang-ugat.php
// Typed root-word answers; legacy grade mapping preserved.

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
$moduleTitle = 'Pagkilala sa Salitang Ugat';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
function pg_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function ug_bank(int $n): int { return $n <= 4 ? 1 : ($n <= 6 ? 2 : 3); }
$legacy = [
    1 => [
        "araw>umaraw",
        "awit>inawit",
        "balita>balitaan",
        "bago>nagbago",
        "balik>bumalik",
        "balot>binalot",
        "bansa>pambansa",
        "bawas>binawasan",
        "bilang>bilangin",
        "bilis>bumilis",
        "bisita>binisita",
        "bulong>pabulong",
        "daan>dumaan",
        "dugo>dumugo",
        "galaw>gumalaw",
        "ganda>gandahan",
        "gaya>gayahin",
        "gusto>gustuhin",
        "haba>mahaba",
        "handa>handaan",
        "harap>humarap",
        "harang>humarang",
        "hiram>humiram",
        "hugas>paghuhugas",
        "imbita>imbitahin",
        "inom>uminom",
        "hiya>mahiyain",
        "huli>hinuli",
        "isip>isipin",
        "kaba>kabahan",
        "kurot>kinurot",
        "linaw>luminaw",
        "lindol>lumindol",
        "linis>malinis",
        "liwanag>nagliwanag",
        "lungkot>malungkot",
        "mano>magmano",
        "paksiw>pinaksiw",
        "patong>ipinatong",
        "sakay>isinakay",
        "sakit>maysakit",
        "sampal>sinampal",
        "sayaw>sayawan",
        "simba>simbahan",
        "sindi>sindihan",
        "sikat>sumikat",
        "subok>subukan",
        "sunod>sinunod",
        "sobra>sumobra",
        "talsik>tumalsik",
        "tapon>itapon",
        "tikim>tumikim",
        "tulak>itulak",
        "tulong>tumulong",
        "tumba>natumba",
        "tungo>nagtungo",
        "yaman>mayaman",
        "upo>upuan",
    ],
    2 => [
        "alam>pakialamero",
        "aral>paaralan",
        "araw>naaarawan",
        "balita>binalita",
        "bago>baguhan",
        "balik>binalikan",
        "balot>binalutan",
        "baon>ibinaon",
        "bawas>pinababawasan",
        "bigkas>binigkasan",
        "bilang>binilang",
        "bilanggo>bilangguan",
        "bilis>binilisan",
        "bulong>ibinulong",
        "bundok>kabundukan",
        "daan>dinaanan",
        "dilaw>nanilaw",
        "dugo>dinuguan",
        "galaw>ginagalawan",
        "ganda>ginandahan",
        "gutom>gugutumin",
        "haba>hinahabaan",
        "hanga>hinangaan",
        "harang>hinarangan",
        "hiram>hiniraman",
        "hiya>ikinahihiya",
        "huli>nahulihan",
        "hugas>hinugasan",
        "inom>inumin",
        "isip>iniisipan",
        "itim>nangitim",
        "iwas>iniiwasan",
        "kuwento>kuwentuhan",
        "laro>palaruan",
        "linis>maglilinis",
        "liwanag>ipinaliwanag",
        "lungkot>malungkutin",
        "nakaw>pinagnakawan",
        "patong>pinatungan",
        "pula>namula",
        "sakay>sinakyan",
        "sakit>nasaktan",
        "salubong>sumalubong",
        "sampal>sumampal",
        "sariwa>sinasariwa",
        "sikat>sinikatan",
        "simangot>sumimangot",
        "simba>sinimbahan",
        "sindi>sinindihan",
        "talsik>patalsikin",
        "tanggap>tinanggapan",
        "tapon>itinapon",
        "tarong>katarungan",
        "tulak>itinulak",
        "tulong>tinulungan",
        "tumbas>katumbas",
        "tuto>natutuhan",
        "tungo>tutunguhin",
        "ugali>kaugalian",
        "upo>inuupuan",
        "wasto>iwinasto",
        "yaman>yumaman",
    ],
    3 => [
        "abono>abunado",
        "alam>pinakikialaman",
        "babae>kababaihan",
        "baligtad>kabaligtaran",
        "balita>binabalitaan",
        "balot>pinagbalutan",
        "bigkas>palabigkasan",
        "bihasa>kabihasnan",
        "bilang>kinabibilangan",
        "bilanggo>pinagbilangguan",
        "bili>pinamimilhan",
        "bilis>pinakabinilisan",
        "bulong>pabubulungin",
        "bukas>kinabukasan",
        "buktot>kabuktutan",
        "daan>pararaanin",
        "dasal>pinagdarasalan",
        "digma>mandirigma",
        "ganda>pinakaginandahan",
        "gaya>pinanggagayahan",
        "gusto>kagustuhan",
        "giliw>kinagigiliwan",
        "haba>pinaghahabaan",
        "halaga>pinahahalagahan",
        "hiram>hinihiraman",
        "isip>palaisipan",
        "intindi>pagkakaintindihan",
        "laro>kakalaruin",
        "linis>pinalilinisan",
        "liwanag>pagpapaliwanagin",
        "lungkot>pinakamalungkutin",
        "patid>kapatiran",
        "patong>pinapatungan",
        "sakay>pinasasakyan",
        "sikat>pinakasinikatan",
        "silab>pinagsisilaban",
        "silid>pinagsisiliran",
        "sundo>pinagkasunduan",
        "sunod>pinakamasunurin",
        "talsik>tinalsikan",
        "tapon>pinagtatapunan",
        "tarong>pinakamakatarungan",
        "tulad>matutularan",
        "tulog>tinutulugan",
        "tulong>pinakamatulungin",
        "tumbas>tinutumbasan",
        "tungo>patutunguhan",
        "tupad>naisakatuparan",
        "tuwid>pangangatwiran",
        "yaman>pinakayumaman",
    ],
 ];
$grd = max(0, $grd);
$ids = [ug_bank($grd)];
$tier = $lvl . ':' . implode('-', $ids);
$pool = [];
foreach ($ids as $id) foreach ($legacy[$id] as $entry) {
    [$root, $word] = explode('>', $entry, 2);
    $pool[$word] = $root;
}
$banks = [$tier => array_map(static function($word, $root) { return [$word, $root]; }, array_keys($pool), array_values($pool))];
function pg_question(array $entry, string $tier, string $lvl): array {
    return ['word'=>pg_h($entry[0]), 'filled'=>pg_h($entry[0]), 'correct'=>$entry[1], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
function ug_normalize(string $s): string { return strtolower(preg_replace('/\s+/u', '', trim($s)) ?? ''); }
$result = null;
$scorer = null;
if (isset($_POST['Submit1'], $_POST['answer'], $_POST['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_POST['answer']) && is_string($_POST['qid'])
    && $_POST['qid'] === $_SESSION[$sessionKey]['current']['qid']
    && $_SESSION[$sessionKey]['current']['tier'] === $tier
    && $_SESSION[$sessionKey]['current']['lvl'] === $lvl) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = ug_normalize($_POST['answer']);
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, ug_normalize($cur['correct']), $cur['lvl']);
    $result = ['correct'=>$isCorrect, 'clicked'=>$clicked, 'cur'=>$cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $i = $available[array_rand($available)];
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
        <strong>Salitang Ugat: <span style="color:#CC0066;"><?php echo pg_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Isulat ang salitang ugat ng salitang nakasulat sa itaas.</p>
    <input type="hidden" name="qid" value="<?php echo pg_h($cur['qid']); ?>">
    <input type="text" name="answer" autocomplete="off" autofocus maxlength="80" aria-label="Salitang ugat" style="width:240px;max-width:90%;height:48px;text-align:center;font-size:24pt;color:#0000CC;box-sizing:border-box;">
    <div style="display:flex;justify-content:center;align-items:center;gap:15px;margin:20px 0;">
    <br/><br/><input type="submit" name="Submit1" value=" Submit " style="margin:0;font-family:Arial,sans-serif;">
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:0;font-family:Arial,sans-serif;">
</div>
<?php endif; ?>


</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
