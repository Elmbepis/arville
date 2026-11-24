<?php
// filipino/modules/pang-abay.php
// Six grade-dependent phrase banks.

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
$moduleTitle = 'Pagkilala sa Pang-abay';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pab_tier(string $lvl, int $grd): int {
    return ($grd <= 3 ? 1 : ($grd <= 5 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? 2 : 0);
}
function pab_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$meron = [
    1 => ['lumakad nang malayo', 'mabagal lumangoy', 'mabilis tumakbo', 'magaling kumanta', 'maganang kumain', 'mahusay sumayaw', 'maingat gumawa', 'maingay maglaro', 'masarap magluto', 'masipag mag-aral', 'mataas tumalon', 'talagang mabait', 'sadyang makipot', 'madalas pumunta', 'masyadong maganda', 'mahinang sumigaw', 'masakit mangagat', 'matagal maligo', 'malalim matulog', 'magandang ngumiti', 'mahilig manood', 'madaling matakot'],
    2 => ['agad na kumain', 'biglang umalis', 'bumili sa tindahan', 'bukas babalik', 'dahan-dahang lumakad', 'mabagal magsulat', 'mabilis magtrabaho', 'lumalangoy sa ilog', 'magaling sumayaw', 'maganang kumain', 'mahirap magtahi', 'mahusay kumanta', 'pumasok nang maaga', 'sadyang matigas', 'talagang kuripot', 'huling lumagda', 'sumilong sa kubo', 'naglako sa palengke', 'tumigil sa pampang', 'naghintay sa labas', 'madaling tinatamad', 'mariing pinindot', 'niluto nang matagal', 'maliligo sa dagat'],
    3 => ['at mahusay magdrowing si', 'masyadong maanghang na ulam', 'dahil kumain sa kusina si', 'kamuntik silang magkabungguan', 'maayos niyang ibinalik', 'madali siyang mainis', 'masama nga siyang magalit', 'matiyaga siyang magturo', 'matulin itong lumipad', 'namasyal sila sa bukid', 'tahimik niyang binasa', 'nagsalita nang malumanay', 'talagang magugulatin si', 'tumangkad nang limang pulgada', 'nanirahan sa kabundukan', 'daglian siyang nagpaalam', 'malalim siyang sumisid', 'mataimtim na nagdarasal', 'mautak maglaro ng ahedres', 'masipag akong magsaliksik', 'pinakuluan niyang mabuti', 'sumumpa siya sa hukuman'],
    4 => ['kaya bumigat nang tatlong libra', 'dahil nga masama siyang magalit', 'ipinagbabawal sa loob ng klinika', 'maaga nang pumapasok doon si', 'madali kang mainis sa akin', 'sapagkat maganang kumain kanina', 'nalinisan nang maigi ang kanilang', 'nang napakataas lumipad at', 'nagtuturo na naman tuwing Linggo', 'paika-ikang naglakad doon', 'parati ka nilang pinagsasabihan', 'pistang ipinagdiriwang tuwing Mayo', 'at susunduin namin sa paliparan', 'talagang masarap ang pagkain dito', 'matiyagang inunawa ang paliwanag', 'matagal nilang kinilatis ang dayuhan'],
    5 => ['nagtitipun-tipon tuwing Noche Buena', 'na napipinsala tuwing bisperas ng bagong taon', 'unang natapos sa paligsahan noong isang taon', 'kaibigan kong nagbiyahe noong nakaraang buwan', 'dahil maghihintay raw siya sa labas ng bakuran', 'nagtatrabaho sa isang pampublikong ospital', 'pupunta kami sa Cebu upang bisitahin ang', 'magtutungo kami sa ilalim ng puno para', 'dinala sa klinika ng beterinaryo ang aso', 'magalang na nakikipag-usap sa mga panauhin', 'tuwang-tuwang ipinakita ang mga larawan ng', 'dagliang nagpasalamat sa babaeng nagbigay', 'na agarang lilinisin ng janitor ang', 'mahabang tulang matiyagang isinaulo para', 'naglakad nang isang kilometro mula sa', 'dahil nagmaneho siya nang napakatagal'],
    6 => ['nagdiriwang tuwing kaarawan ng mahal na kaibigan', 'ay iminumungkahi tuwing panahon ng masidhing digmaan', 'huling nagpaabot ng pagbati sa mga nagwagi sa patimpalak', 'kakilala naming naglingkod sa kanila noong nakaraang taon', 'dahil nakatulog siya sa gilid ng kalye habang nag-aabang', 'natagpuan sa isang ilang na pabrika ng mga sinulid', 'magsasaliksik sa kabundukan ng mga kakaibang panggamot', 'makikipagsapalaran siya sa magulong lungsod na iyon', 'walang pakundangang nanghihimasok sa mga usapan', 'malumanay na nagsumamo sa mga nakatatandang kapatid', 'kaya agaran siyang lumisan sa di kalayuan', 'nagtampisaw sa binahang bahagi ng bukid', 'nang maluwalhating nakarating ang mag-anak', 'at mapagkumbabang humingi ng kapatawaran', 'talagang napakarupok na nitong nabulok na haligi'],
];
$wala = [
    1 => ['aso at pusa', 'kanyang kamag-aral', 'mainit na baso', 'manok ni Jose', 'batang mataba', 'limang lapis', 'mabilis na kabayo', 'walong kahon', 'makinis na kotse', 'nayong payapa', 'matibay na tsinelas', 'bagong sapatos', 'malamig na tubig', 'malaking kama', 'malayong lugar', 'mabangong bulaklak', 'masarap na pagkain', 'aklat at lapis', 'dalawang kalaro', 'kagat ng lamok', 'maraming asukal', 'maalat na tinapay', 'butas na medyas', 'mga dyip at bus', 'ilog at lawa', 'ang pag-aaral', 'kanyang talino', 'malinis na batis', 'maliit at magaan'],
    2 => ['ang maliit na bagay', 'ang mamahaling relo', 'ang mga taong masigla', 'ang napakahabang pila', 'at mataong lugar', 'isang maingat na tsuper', 'mahusay na manggagamot', 'makulay na bahaghari', 'matapat na kaibigan', 'malawak na paliparan', 'modernong bulwagan', 'napakahusay na manlalaro', 'napakataas na bundok', 'napakasikip na daanan', 'pinakabatang kamag-aral', 'pinakamahabang ilog', 'tulay na napakatibay', 'mga itim na langgam', 'mga tutang nakakatuwa', 'makabagong pananaw', 'marupok na upuan', 'pagtitinda ng mga lutuin', 'pagbili ng sasakyan'],
    3 => ['malakas na ihip ng hangin', 'malamig at matabang na kape', 'mahigpit na yakap ng ina', 'mahabang pila ng mga deboto', 'mapayapang buhay ng mag-anak', 'ang matimtim na pasasalamat', 'kabuhayang maipagmamalaki', 'napakaruming tubig-dagat', 'nagsaliksik at nag-aral', 'mapagmalasakit na pari', 'ang mabilis niyang pagtakbo', 'madilim at maruming sulok', 'isang napakahusay na aktres', 'mainit na makina ng dyip', 'gurong masinop at matipid', 'matalim niyang pag-iisip', 'na matalinong siyentipiko', 'napakatangkad na manlalaro', 'pinaghalong tubig at langis'],
    4 => ['ang agarang pagkahilo ni', 'ang bagong kalihim nina Danilo', 'ang galing-galing ng mga mananayaw', 'ang mahabang pagdiriwang nila', 'ang mataas na paggalang kay', 'ang napakahusay na manunulat', 'ang pagkukumpuni ng sirang bubong', 'ay isang napakalayong simbahan', 'kanyang matiyagang paglalakbay', 'liblib na tirahan ng mga katutubo', 'mabilis na pagtakbo at pagtalon', 'matagal na pagtalakay sa isyung ito', 'napakagagandang mga palamuti', 'napakasaya ng mga pagdiriwang', 'pagmamahal sa kanyang inang-bayan', 'pagbangon ng matamlay na pasyente', 'tinanggihan nila ang mungkahi ko', 'upang makamit ang katarungan', 'ng napakahabang pananaliksik'],
    5 => ['ang mapanuri at matandang imbestigador', 'ang pinakamataong bahagi ng Hilagang Luzon', 'ang pinakamagaling nating kamag-aral na si', 'ang pag-abot nila ng kalayaan laban sa', 'ang paglipas ng napakahabang panahon', 'ang palaging paggamit ng \'po\' at \'opo\'', 'at kanyang mga bagong katibayan ukol', 'mahigpit na pagpapasunod ng mga alituntunin', 'maingat na pagpili ng susunod na pinuno', 'mapagmalasakit ang dayuhang kapitbahay nina', 'masidhing paghahanap ng katotohanan upang', 'isa sa mga pinakamalalaking lungsod ng', 'isang tahimik at taimtim na pagdarasal', 'paghihimagsik laban sa mga dayuhang mananakop', 'pinakamatandang bantayog sa buong bansa', 'pinakamahal at pinakamagarang dekorasyon', 'pagpapaliwanag ng mga konseptong pang-agham', 'at pumaimbulog ang higanteng saranggola'],
    6 => ['ang matulunging propesor ng pamantasan', 'ang pinakamalalim na bahagi ng Karagatang Pasipiko', 'ang pinakamatingkad na tala ng Galaksiyang Andromeda', 'kaya lumundag ang mailap na magnanakaw', 'sa pagpupunyagi ng kanyang kahanga-hangang kamag-aral', 'ang madalas na pagtulong at pagkakawanggawa', 'marahas na pagpapatupad ng mga bagong alituntunin', 'matalinong pangangasiwa ng mga likas na yaman', 'mapagmalasakit ang dalubhasang manggagamot', 'masidhing pangungulila sa mga mapag-arugang magulang', 'pinaigting na paghahanap sa nakabaong kayamanan', 'malalim na pang-unawa sa mga konseptong makabago', 'mga mapait na karanasan ng kanyang matalik na kaibigan', 'mga kinagigiliwang kuwento ng kanyang paboritong manunulat', 'sa pagpapaliwanag ng mga tunay na kadahilanan'],
];
$tier = pab_tier($lvl, $grd);
$banks = array_map('array_unique', $meron);
function pab_question(string $correct, array $wrong, int $tier, string $lvl): array {
    $wrong = array_values(array_diff(array_unique($wrong), [$correct]));
    shuffle($wrong);
    $choices = array_merge([$correct], array_slice($wrong, 0, $tier === 1 ? 1 : 3));
    shuffle($choices);
    return ['correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pab_question($banks[$tier][$i], $wala[$tier], $tier, $lvl);
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
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang pariralang <strong style="color:#CC0066;">'<?php echo pab_h($cur['correct']); ?>'</strong> ang pariralang may pang-abay.</p>
    <?php $wrong = array_values(array_diff($cur['choices'], [$cur['correct']])); ?>
    <p style="font-size:14pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Wala namang pang-abay sa <?php echo count($wrong) === 1 ? 'pariralang' : 'mga pariralang'; ?> <?php echo pab_h(count($wrong) === 1 ? "'".$wrong[0]."'" : "'".implode("', '", array_slice($wrong, 0, -1))."', at '".end($wrong)."'"); ?>.</p>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Alin sa mga ito ang pariralang may <strong style="color:#CC0066;">pang-abay</strong>?</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?>
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
