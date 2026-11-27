<?php
// filipino/modules/pamilang-uri.php
// Four grade-dependent sentence-template banks.

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
$moduleTitle = 'Mga Uri ng Pang-uring Pamilang';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$baseTier = $grd <= 6 ? 1 : 2;
$tiers = $lvl === 'Easy' ? [$baseTier] : [$baseTier+1, $baseTier+2];
$tier = implode('-', $tiers);
function pam_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Ang pamilya Reyes ay may *anim na+ anak.', 'patakaran', 1],
    ['Ang bahay nila ay may *apat na+ kuwarto.', 'patakaran', 1],
    ['Sina Ramon at Nancy ay may *pitong+ anak.', 'patakaran', 1],
    ['Bumili ako ng *limang+ itlog sa tindahan.', 'patakaran', 1],
    ['May *isang+ lalaking kumakatok sa pinto.', 'patakaran', 1],
    ['Nakaabang sa pinto ang *tatlong+ aso ni Rommel.', 'patakaran', 1],
    ['Mayroon silang *dalawang+ sasakyan sa garahe.', 'patakaran', 1],
    ['Ang watawat ng Pilipinas ay may *apat na+ kulay.', 'patakaran', 1],
    ['May *tatlumpu\'t isang+ araw sa buwan ng Enero.', 'patakaran', 1],
    ['May *walong+ planeta sa ating sistemang solar.', 'patakaran', 1],
    ['*Pangatlong+ bahay na nila ito.', 'panunuran', 1],
    ['Si Jessica ang *pangalawang+ kalahok na kakanta.', 'panunuran', 1],
    ['Ito ang *unang+ pagsusulit namin sa paaralan.', 'panunuran', 1],
    ['Si Bugoy ang *pangalawang+ aso ng pamilya.', 'panunuran', 1],
    ['Si $name1 naman ay nasa *ikalimang+ baitang na.', 'panunuran', 1],
    ['Ito ang *unang+ asong nakita nila sa tindahan.', 'panunuran', 1],
    ['Ang Hunyo ang *ikaanim na+ buwan ng taon.', 'panunuran', 1],
    ['Nakapila na ang mga mag-aaral sa *ikaanim na+ baitang.', 'panunuran', 1],
    ['Si $name1 ang *ikaapat na+ anak ni Ginoong Santos.', 'panunuran', 1],
    ['Ang Daigdig ang *ikatlong+ planeta mula sa araw.', 'panunuran', 1],
    ['*Tiglilimang+ kendi ang ibibigay sa mga bata.', 'pamahagi', 1],
    ['Ang mga mag-aaral ay kumuha ng *tigalawang+ lapis.', 'pamahagi', 1],
    ['*Kalahating+ pinggang kanin lamang ang kinain ni $name1.', 'pamahagi', 1],
    ['Gumamit si $name1 ng *sangkapat na+ tasa ng mantika kanina.', 'pamahagi', 1],
    ['May natira pang *tatlong-kapat+ na keyk sa mesa.', 'pamahagi', 1],
    ['Mahigit *kalahating+ oras na kaming naghihintay dito.', 'pamahagi', 1],
    ['*Dalawahan+ ang mga upuan sa bus na ito.', 'palansak', 1],
    ['*Dala-dalawang+ bata ang naisasakay niya sa bisikleta.', 'palansak', 1],
    ['Binigyan ako ni Tatay ng *limampung piso+.', 'pahalaga', 1],
    ['Nakatanggap ako ng *sandaang pisong+ \'load\' kahapon.', 'pahalaga', 1],
    ['Bibilhin mo ba itong *limampung libong pisong+ alahas?', 'pahalaga', 1],
    ['*Dadalawang+ isda lamang ang nahuli ni $name1 kahapon.', 'patakda', 1],
],
2 => [
    ['*Sampung+ tao ang makauupo sa hapag-kainan nila.', 'patakaran', 2],
    ['Ang pamilya Santos ay may *tatlong+ kompyuter sa bahay.', 'patakaran', 2],
    ['Higit sa *apat na libong+ tao ang nasa \'evacuation center\' ngayon.', 'patakaran', 2],
    ['Ako ay may *dalawampung+ daliri sa aking mga kamay at paa.', 'patakaran', 2],
    ['Ang Pilipinas ay may *tatlong+ malalaking pangkat ng mga pulo.', 'patakaran', 2],
    ['Ang Pilipinas ay binubuo ng higit sa *pitong libong+ pulo.', 'patakaran', 2],
    ['Ang alpabetong Filipino ay binubuo ng *dalawampu\'t walong+ titik.', 'patakaran', 2],
    ['Ako ang *ikatlong+ mag-aaral na napiling lumahok sa paligsahan.', 'panunuran', 2],
    ['Nakamit ni Jason ang *unang+ gantimpala sa paligsahan sa pagguhit.', 'panunuran', 2],
    ['Ito ang *pangalawang+ pagkakataong ibibigay sa iyo ng punong guro.', 'panunuran', 2],
    ['Si Rodrigo Duterte ang *ikalabing-anim+ na pangulo ng Pilipinas.', 'panunuran', 2],
    ['Gawin mo ang pagsasanay sa *ikalimampung+ pahina ng aklat.', 'panunuran', 2],
    ['Bukas ang *ikadalawampung+ anibersaryo ng mga magulang ni $name1.', 'panunuran', 2],
    ['*Lima at dalawang-katlong+ sako ng bigas ang natira sa bodega.', 'pamahagi', 2],
    ['Kailangan ko ng *kalahating+ kilong manok para sa lulutuin kong tinola.', 'pamahagi', 2],
    ['Upang maipasa ang panukala, kailangan ang boto ng *dalawang-katlong+ mayorya.', 'pamahagi', 2],
    ['Maliit para kay Ginoong Luna ang *limang porsiyentong+ tubo.', 'pamahagi', 2],
    ['*Sampu-sampu+ ang mga taong lumilikas sa mas ligtas na lugar.', 'palansak', 2],
    ['*Dala-dalawang+ pakete ng kape ang ibinebenta sa tindahan.', 'palansak', 2],
    ['*Animan+ ang mga estudyante sa bawat kuwarto ng dormitoryo.', 'palansak', 2],
    ['Ibinigay ng batang pulubi ang *pisong+ kendi sa kanyang kapatid.', 'pahalaga', 2],
    ['Naibenta na ang *tatlong milyong pisong+ bahay at lupa sa Mandaluyong.', 'pahalaga', 2],
    ['*Sasampung+ miyembro pa lamang ang nagbabayad ng kanilang kontribusyon.', 'patakda', 2],
    ['*Lilimang+ mag-aaral lamang ang pinayagang pumunta sa lakbay-aral.', 'patakda', 2],
],
3 => [
    ['May *dalawampu\'t isang+ lalaki ang nag-awdisyon kahapon para sa papel ni Rizal.', 'patakaran', 3],
    ['Sa dami ng mga dumalo upang manood, kulang pa ng *labing-apat na+ upuan sa silid.', 'patakaran', 3],
    ['*Sanlibong+ punongkahoy ang dapat nating itanim sa bahaging ito ng kagubatan.', 'patakaran', 3],
    ['Mabuti naman at sila ang mga *unang+ taong nasaklolohan ng ating pamahalaan.', 'panunuran', 3],
    ['Ito na ang *ikaapat na+ pagtutunggali nina $name1 at $name2 sa larong ahedres.', 'panunuran', 3],
    ['Si $name1 pala ang *panghuling+ taong nabigyan ng lisensiya sa umagang ito.', 'panunuran', 3],
    ['Ito na ang *pangatlong+ bagyong nanalasa sa Mindanao sa loob ng buwang ito.', 'panunuran', 3],
    ['Hindi ka ba nagulat na *pampitong+ puwesto lamang ang naiuwi ng ating mga manlalaro?', 'panunuran', 3],
    ['Halos *kalahati+ pa lamang ng mga linya ng komunikasyon ang gumagana sa Rehiyon II.', 'pamahagi', 3],
    ['Halos *animnapu\'t walong porsiyento+ ng mga bahay sa Visayas ang nawasak ng bagyo.', 'pamahagi', 3],
    ['*Isa at sangkatlong+ supot ng pataba ang dapat mong ihalo sa ganyang karaming lupa.', 'pamahagi', 3],
    ['Sa bawat tawid ng bangka sa ilog, *apat-apat+ ang mga taong naililikas.', 'palansak', 3],
    ['*Libu-libong+ tao ang dumayo sa Lungsod ng Naga para sa Pista ng Peñafrancia.', 'palansak', 3],
    ['Tinatayang aabot sa *limang milyong pisong+ alahas ang natangay ng magnanakaw kanina.', 'pahalaga', 3],
    ['Hindi kasya ang dala kong pera para makabili ako ng *sandaang pisong+ pansit.', 'pahalaga', 3],
    ['Kung pauutangin mo ako, mabibili ko itong *limandaang pisong+ pares ng sapatos.', 'pahalaga', 3],
    ['Noong unang panahon ay makabibili ka ng *sampung sentimong+ inumin sa palengke.', 'pahalaga', 3],
    ['*Iisa+ lamang ang pangarap ni $name1 at ito ay ang maging tanyag na mang-aawit.', 'patakda', 3],
    ['*Lilimang+ balot na lamang ng pansit ang natitira ngunit marami pang darating na bisita.', 'patakda', 3],
],
4 => [
    ['Mabuti na lamang at nagkasya ang ating handa kahit umabot sa *animnapung+ bisita ang dumalo sa piging.', 'patakaran', 4],
    ['May *limang daang+ bata ang nabigyan ng bakuna sa sentrong pangkalusugan ng barangay kahapon.', 'patakaran', 4],
    ['Batay sa kanyang ulat, humigit sa *isang daan at walumpu\'t anim na libong+ tahanan ang napinsala ng nakaraang bagyo.', 'patakaran', 4],
    ['Nagsasanay nang mabuti si $name1 dahil hindi raw siya papayag na *ikalawang+ puwesto lamang ang makakamit niya.', 'panunuran', 4],
    ['*Panlimang+ bagyo pa lamang ang nararanasan ng bansa sa taong ito ngunit malaki na ang nagagastos ng pamahalaan para sa pagtulong sa mga nasalanta.', 'panunuran', 4],
    ['Inaasahan niyang magkakaroon ng *dalawampung porsiyentong+ bawas sa mga presyo sa Linggo.', 'pamahagi', 4],
    ['May *siyamnapung porsiyentong+ posibilidad ng pag-ulan sa rehiyon ng Bicol mamayang hapon.', 'pamahagi', 4],
    ['Ang mga pamilyang humingi ng tulong ay binigyan ng *tigagalawang+ bag na may lamang pagkain at bigas.', 'pamahagi', 4],
    ['Nagpahatid si $name1 ng *dose-dosenang+ bulaklak para sa kaarawan ng anak niyang babae.', 'palansak', 4],
    ['*Lima-limang+ kahon ng iba\'t ibang tsokolate ang ipinadadala ni $name1 sa kanyang mga anak bawat buwan.', 'palansak', 4],
    ['*Tatlo-tatlong+ singsing ang isinusuot ni $name1 tuwing siya ay nakikilahok sa pagtitipong iyon.', 'palansak', 4],
    ['*Pandalawahan+ lamang ang ginagamit na bangka ng mag-asawa sa kanilang paghahanapbuhay.', 'palansak', 4],
    ['*Dalawampung pisong+ kutsinta lamang ang nabili ko sa naglalako dahil naubusan na raw siya nito.', 'pahalaga', 4],
    ['Gusto ko pa ring kunin ang aking *limampung sentimong+ sukli sa kahera kahit halos wala na itong kayang bilhin.', 'pahalaga', 4],
    ['Humigit sa *sampung bilyong pisong+ pananim ang napinsala sa Pilipinas dulot ng mga bagyo ngayong taon.', 'pahalaga', 4],
    ['*Tatatlong+ pamilya na lamang ang hindi pa nakababalik sa kanilang mga tahanan matapos ang delubyo.', 'patakda', 4],
    ['Naniniwala ka bang *sasampung+ pakete ng produkto na lamang ang hindi pa natin naibebenta ngayong araw?', 'patakda', 4],
],
];
$banks = [$tier => []];
foreach ($tiers as $t) $banks[$tier] = array_merge($banks[$tier], $sourceBanks[$t]);
function pam_question(array $entry, string $tier, string $lvl): array {
$boys=array(
"Adam", "Adrian", "Alex", "Alexander", "Andrew", "Angelo", "Austin", "Benjamin", "Brandon", "Caleb", "Cameron", "Carlos", "Carson", "Carter", "Charles", "Christopher", "Daniel", 
"David", "Diego", "Dominic", "Dylan", "Elijah", "Ethan", "Gabriel", "Hayden", "Ian", "Isaac", "Isaiah", "Jack", "Jacob", "Jaden", "James", "Jason", "Jose", "John", "Jonathan", 
"Joseph", "Joshua", "Juan", "Julian", "Justin", "Kevin", "Logan", "Lucas", "Luis", "Luke", "Matthew", "Max", "Michael", "Nathan", "Nicholas", "Noah", "Oliver", "Owen", "Parker", 
"Robert", "Ryan", "Samuel", "Sebastian", "Thomas", "Tristan", "William"
);
$girls=array(
"Alexandra", "Alyssa", "Amelia", "Andrea", "Anna", "Ariana", "Arianna", "Bella", "Brooke", "Camille", "Caroline", "Chloe", "Claire", "Elizabeth", "Emma", "Eva", "Evelyn", 
"Gabriela", "Grace", "Hannah", "Isabella", "Jasmine", "Jocelyn", "Jolina", "Julia", "Katherine", "Kylie", "Lauren", "Layla", "Leah", "Lillian", "Lydia", "Madeline", "Maria", 
"Mariah", "Melanie", "Mia", "Naomi", "Natalie", "Olivia", "Samantha", "Sarah", "Sofia", "Sophia", "Sophie", "Stella", "Tina", "Victoria"
);

$namecount=count($boys)-1;
$name1=$boys[(rand(0,$namecount))]; 
$boy=$name1;
$name2=$boys[(rand(0,$namecount))];
while ($name1==$name2){$name2=$boys[(rand(0,$namecount))];}


if (rand(1,2)==1){
	$namecount=count($girls)-1;
	$name1=$girls[(rand(0,$namecount))];
	$girl=$name1;
	}
if (rand(1,2)==1){
	$namecount=count($girls)-1;
	do {$name2=$girls[(rand(0,$namecount))];}while ($name1==$name2);
	}
$sentence = strtr($entry[0], ['$name1'=>$name1, '$name2'=>$name2]);
if (!preg_match('/^(.*?)\*(.*?)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
$choices = array_values(array_diff(['patakaran','panunuran','pamahagi','palansak','pahalaga','patakda'], [$entry[1]]));
shuffle($choices);
$choices = array_slice($choices, 0, 3);
$choices[] = $entry[1];
shuffle($choices);
$explanations = ['patakaran'=>'dahil ginamit ito sa karaniwang paraan ng pagbilang','panunuran'=>'dahil ito ay nagsasaad ng puwesto ng isang pangngalan o panghalip sa pagkakasunud-sunod na bilang','pamahagi'=>'dahil ito ay nagsasaad ng bahagi ng isang kabuuan o bilang na inilaan sa bawat isa','palansak'=>'dahil ito ay nagsasaad ng pangkatan, minsanan, o maramihan ng pangngalan','pahalaga'=>'dahil ito ay nagsasaad ng halaga ng isang bagay na binili, binibili, o bibilhin','patakda'=>'dahil ginamit ito sa madiing paghahayag ng tiyak o hustong bilang'];
return ['word'=>pam_h($m[1].$m[2].$m[3]), 'highlight'=>pam_h($m[1]).'<strong style="color:#CC0066;">'.pam_h($m[2]).'</strong>'.pam_h($m[3]), 'target'=>$m[2], 'exp'=>$explanations[$entry[1]], 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    foreach ($available as $idx) $byCategory[$banks[$tier][$idx][1]][] = $idx;
    $category = array_rand($byCategory);
    $i = $byCategory[$category][array_rand($byCategory[$category])];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pam_question($banks[$tier][$i], $tier, $lvl);
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
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['highlight']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo pam_h(ucfirst($cur['correct'])); ?></span></strong>
        <p style="font-weight:400;">Ang <?php echo strpos($cur['target'], ' ') !== false ? 'pariralang' : 'salitang'; ?> <strong style="color:#CC0066;"><?php echo pam_h($cur['target']); ?></strong> ay pang-uring pamilang na <?php echo pam_h($cur['correct']); ?> <?php echo pam_h($cur['exp']); ?>.</p>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Hanapin ang pang-uring pamilang sa itaas at piliin sa ibaba ang uri nito.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pam_h(ucfirst($choice)); ?>
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
