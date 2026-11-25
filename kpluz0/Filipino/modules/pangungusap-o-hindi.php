<?php
// filipino/modules/pangungusap-o-hindi.php
// Seven grade-dependent sentence classification banks.

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
$moduleTitle = 'Pangungusap at Hindi Pangungusap';
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function poh_tier(string $lvl, int $grd): int {
    $tier = $grd <= 1 ? $grd : ($grd <= 3 ? 2 : ($grd <= 6 ? 3 : 4));

    return $tier + ($lvl === 'Hard' ? ($grd <= 1 ? 1 : 2) : 0);
}
function poh_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        ['Tulog ang pusa.', 'Mainit ang tubig.', 'Bakit ka umalis?', 'Aalis ka ba?', 'Tapos na ako.', 'Ito ay mahal.', 'Kailan ka uuwi?', 'Kakain na kami.', 'Maingat siya.', 'Masaya ako.', 'Ako ay natakot.', 'Ako ay pagod.', 'Siya ay tamad.', 'Siya ay nagulat.', 'Siya ay sumali.', 'Kayo ay mabait.', 'Kumain kami.', 'Sumigaw siya.', 'Naligo na ako.', 'Kami ay nag-aral.', 'Sila ay nagsayaw.', 'Nagulat siya.', 'Nawala ang aso.', 'Nagtago ang bata.', 'Sumikat ang araw.'],
        ['Itim na ibon.', 'Batong matigas.', 'Maraming pera.', 'Tatlong tao.', 'Malaking bahay.', 'Isang halaman.', 'Maraming ibon.', 'Ang aso namin.', 'Ay walang dumi.', 'Ay may dala.', 'Ngunit kahit.', 'Sila ay.', 'Ang mga isda.', 'Laging masaya.', 'Ang papel.', 'Lupa sa hardin.', 'Sa bahay ko.', 'Isang medyas.', 'Tulad niya.', 'Toyo at suka.', 'Sa simbahan.', 'Kaya umalis.', 'Naiwan doon.', 'Tulog sa kama.', 'Ay bumili.', 'Ay kumanta.', 'Ay sumayaw.', 'Ay umiiyak.', 'Gutom na gutom.', 'Sa loob nito.'],
    ],
    1 => [
        ['Sino ka?', 'Akin ito.', 'Lunes bukas.', 'Umaga na.', 'Ito ay kanila.', 'Itago mo iyan.', 'Ang pusa ay tulog.', 'Ang init pala ng kape!', 'Ano ang pangalan mo?', 'Bakit ayaw mong sumama?', 'Huwag kang umalis.', 'Itago mo iyan doon.', 'Ito pala ay $adj2.', 'Kailan ang kaarawan mo?', 'Kakain kami rito.', 'Lunes pala bukas.', 'Luto na ang kanin.', 'Maganda ang aklat niya.', 'Maglaro tayo ng habulan.', 'Maghintay ka lang dito.', 'Mag-ingat kayo.', 'Magpahinga na tayo.', 'Malakas ang boses niya.', 'Malamig ang tubig.', 'Maginaw pala rito.', 'Nabasag ang tasa!', 'Nadulas si $name1!', 'Nag-aral ako kahapon.', 'Siya ay nagulat.', 'Nasira ang laruan.', 'Panoorin mo sila.', 'Saan kayo pupunta?', 'Sarado ang tindahan.', 'Sasakay kami ng dyip.', 'Si $name1 ay $adj1.', 'Tapos na ako.', 'Tutulungan ka namin.', 'Umaga na pala.', 'Wala siyang sinabi.', 'Tapos na ang palabas.'],
        ['At $adj1 din.', 'Isang $adj2b bagay.', 'Ang $item ni $name1.', 'At mahusay magpinta.', 'Ang $adj1b tao.', 'Matamis na ngiti.', 'Sa labas ng bahay.', 'Ang asong maliit.', 'Ay walang pagkain.', 'May dalang $item.', 'Ngunit kung mayroong.', 'Sina $name1 at $name2.', 'Ang mga sasakyan.', 'Laging nakatawa.', 'Ang nawawalang lapis.', 'Bulaklak sa plorera.', 'Sa bayan namin.', 'Medyas at sapatos.', 'Tulad ng mga alon.', 'Mantika, toyo, at suka.', 'Sa lumang simbahan.', 'Kaya natulog agad.', 'Naiwan sa labas.', 'Tulog buong araw.', 'Nakaabang sa labas.', 'Ang mga halaman doon.', 'Gutom na gutom.', 'Walang dalang $item.', 'Ang ihip ng hangin.', 'Mga balita sa radyo.', 'Lumubog sa tubig baha.', 'Sina $name1 at $name2.'],
    ],
    2 => [
        ['Siya ay isang mahusay na pintor.', 'Siya ay isang $adj1b tao.', 'Bumili si $name1 ng $item kanina.', 'Dito ka sasakay ng eroplano.', 'Ang aso ni $name1 ay nakakatakot.', 'Masayang kumain ang mga bata.', 'Magaling palang sumayaw si $name1.', 'Kumain kami ng mangga kanina.', 'Nasugatan si $name1 sa tuhod.', 'Totoo pala ang sinasabi mo.', 'Binuksan na niya ang payong.', 'Bilog ang buwan ngayong gabi.', 'Lumilindol nga yata.', 'Makinig tayong mabuti kay $name1.', 'Takot na takot ang mga bata.', 'Bumalik sa paaralan si $name1.', 'May sakit nga ang kanyang lola.', 'Napakaraming tao ang dumalo.', 'Dala ko na ang mga gagamitin ko.', 'Babasahan tayo ni $name1 ng kuwento.', 'Saan ka ba talaga galing?', 'Mabigat na naman ang trapiko.', 'Walang pasok sa mga paaralan.', 'Natapos agad ang kanilang usapan.', 'Nakahandang kumilos ang mga pulis.', 'Darating kami riyan bukas.', 'Mainit ang panahon ngayon.', 'May bagyong palapit dito.', 'Bantayan mo sana itong mabuti.', 'Sabihin mo sa akin ang totoo.', 'Napakalakas ng buhos ng ulan!', 'Maraming bunga ang puno ng mangga.', 'Si $name1 ay naglilinis ng bakuran.', 'Huwag mong itapon ang basura riyan.', 'Ang mga gulay na ito ay sariwa.', 'Bibigyan ko sila ng inumin.', 'Kami ay maghahanda ng meryenda.'],
        ['Tunay na kakaibang $item.', 'Ngunit $adj1 naman.', 'Ang mabilis na kabayo.', 'Ang mga masasarap na pagkain.', 'Bunsong kapatid ni $name1.', 'Ay magdiriwang ng kaarawan.', 'Harapan ng mataas na gusali.', 'Upang matapos agad ang gawain.', 'Mga tuntunin sa ating paaralan.', 'Paliwanag ng guro namin.', 'Kumakanta habang sumasayaw.', 'Iba\'t ibang hayop at halaman.', 'Halos dalawang oras nanood.', 'Mga pangarap sa buhay.', 'Laging handang tumulong.', 'Pinalakpakan nang matagal.', 'Pag-iwas sa sakit at sakuna.', 'Nakasulat sa puting papel.', 'Malaking bahay sa kanto.', 'Ang mga magulang ni $name1.', 'Sa bakuran daw naglalaro.', 'Ang sinabi niya sa amin.', 'Nakinig na namang mabuti.', 'Tuwing Sabado dumarating.', 'Mula Lunes hanggang Biyernes.', 'Ang malaking payong na ito.', 'Maruming tubig sa kalsada.', 'Ang malaking puno sa bakod.', 'Tutulong sa pagtatanim.', 'Sa harap ng puting bahay.', 'Kapag dumating ang mga bisita.'],
    ],
    3 => [
        ['Marunong mag-araro ang alagang kalabaw ni $name1.', 'Hindi ba\'t maganda itong bagong $item ni $name1?', 'Pakiabot naman po sa drayber ang bayad ko.', 'Sana ay hindi bumaha sa ating subdibisyon.', 'Mabagal na naman ang daloy ng trapiko rito.', 'May nakita po kaming bayawak sa tabi ng ilog.', 'Hindi ko pa alam kung saan kami bibili ng pagkain.', 'Isang malaking handaan ang magaganap doon bukas.', 'Si $name1 ay isang matagumpay na manananggol.', 'Dapat bang ipakilala kita sa aking mga bisita?', 'Saan ba makabibili ng mga sahog para sa lutuing ito?', 'Natakot ka ba sa nakita mong multo kanina?', 'Pakidala mo naman itong pahayagan sa iyong guro.', 'Ihawin ninyong mabuti ang mga hitong binili natin.', 'Anong bansa ang pangarap mong marating balang araw?', 'Maayos ang pila ng mga bata sa palaruan.'],
        ['Ang magandang $itemb nabili ni $name1.', 'Isa na namang $itemb galing kay $name1.', 'Ang pagbibigay ni $name1 kay $name2 ng pag-asa.', 'Si $name1 at ang kanyang pamilyang nakatira rito.', 'Para sa pag-aaral ng mga anak ni $name1.', 'Paborito kong kaining almusal tuwing umaga.', 'Maaaring makapagdudulot ng iba\'t ibang sakit.', 'Mga pulis at sundalong tumutulong sa kanila.', 'Walang kapantay na pagmamahal ng isang ina.', 'Muling nauwi sa pagtatalo noong $araw.', 'Ang palaging pagiging maramdamin ni $name1.', 'Nang madagdagan ng toyo ang kanyang lugaw.', 'Mahigpit na pagpapasunod ng mga tuntunin.', 'Dahil sa pamamasyal sa plaza tuwing Sabado.', 'Madaliang paglilinis ng kanilang silid.', 'Mga bagong kamisetang binili ko kahapon.', 'Ang pinakamagarang damit at sapatos ni $name1.', 'Dahil marami ang kanyang tamang sagot.', 'Mga masasayang pagtitipon tuwing Pasko.'],
    ],
    4 => [
        ['Ang tirahan ng mga katutubo sa kagubatan ay mapayapa.', 'Muling tatagal ang pagtalakay sa opisina ng isyung ito.', 'Ang balita ko ay masaya ang pagdiriwang ninyo kagabi.', 'Talagang tumaas ang presyon ng dugo ni $name1 kahapon.', 'Si $name1 ang piliin mo dahil mahusay siyang magpaliwanag.', 'Si $name1 ba ang pinakamatangkad sa kanilang magkakaklase?', 'Kanino mo namana ang iyong maputing kutis at kulot na buhok?', 'Dagdagan mo ng patis itong sabaw dahil masyado itong matabang.', 'Palagi kaming kumakain ng keyk at pansit sa kantinang iyon.', 'Madaling nakumpuni ng magkapatid ang kanilang butas na bubong.', 'Tumangkad pala si $name1 nang isang pulgada noong isang buwan.', 'Napilitang maglako sa kalye araw-araw sina $name1 at $name2.', 'Ang pagmamahal niya sa kanyang inang-bayan ay walang kapantay.', 'Pakiabot mo naman kay $name1 itong bagong ulat na pang-agham.', 'Muling humiram ng $item si $name1 kay $name2 noong $araw.', 'Alam mo ba kung magkano yung $adj2b $itemb hawak ni $name1?'],
        ['Dahil kinakabahan ako sa tuwing pagdating ng araw ng $araw.', 'Ang malamig at sariwang simoy ng hangin nitong huling $araw.', 'Ang napakabagal na pagtalakay ng isyung ito sa senado.', 'Malugod na pasasalamat ng mga magulang ng nasagip na bata.', 'Ang malalapitan kung kailangan mong humingi ng agarang tulong.', 'Dahil talagang matulin tumakbo at mataas tumalon ang kabayo.', 'Mga mag-aaral na umaawit sa harap ng tagdan ng bandila.', 'Ang pagsama ng mga mag-aaral sa pamamasyal sa lugar na iyon.', 'Kahusayan ng mga artista sa pelikulang pinanood natin kahapon.', 'Dahil sa paglalaro ng mga magkakapatid sa palaisdaan kagabi.', 'Ang agad na paghahatid ng sulat sa kanyang tanggapan.', 'Mapayapang buhay ng mag-anak sa kanilang bagong tahanan.', 'Ang mga mananayaw na napanood namin sa pista kanina.', 'Ang siyang tinaguriang pinakamahabang ilog sa buong mundo.'],
    ],
    5 => [
        ['Lumabis na naman nang sampung minuto ang kanilang pagtatanghal.', 'Ang $itemb nabili ni $name1 kay $name2 ay walang dudang maganda.', 'Mahigpit ang naging yakap ng naluluhang ina sa kanyang mga anak.', 'Maraming manggagawa ang naghahanap ng mapapasukang trabaho sa lungsod.', 'Ang larawang ipininta nina $name1 at $name2 ay masyadong makulay.', 'Ang mga atleta ay mag-eensayo sa modernong himnasyong iyon bukas.', 'Si $name1 ay mahusay magpaliwanag ng mga kababalaghan sa mga bata.', 'Mahigpit ba ang pagpapasunod ng mga tuntunin sa inyong paaralan?', 'Pakisauli mo na sa susunod na linggo ang hiniram mong $item sa akin.', 'Ang sinasakyan kong bus ay biglang tumirik sa gitna ng tulay kahapon.', 'Uuwi na si $name1 mula sa Tsina at susunduin namin siya sa paliparan.', 'Marami siyang nakain mula kahapon kaya bumigat siya nang isang kilo.', 'Pumunta muna si $name1 sa bahay nina $name2 upang manghiram ng kompyuter.', 'Mamimingwit sana si $name1 ng mga dalag kung hindi umapaw ang ilog doon.'],
        ['Naging epekto ng malakas na ihip ng hangin doon sa dalampasigan.', 'Ang $itemb nabili ni $name1 kay $name2 noong nakaraang $araw.', 'Ang paghiram ng $item ni $name1 mula kay $name2 noong $araw.', 'Mapayapang pananahan ng mga katutubo sa masukal na kagubatan.', 'Ang nakapanghihilakbot na pangyayaring inilihim sa atin ni $name1.', 'Pagpapasalamat ng pulubi sa babaeng nagbigay sa kanya ng biskwit.', 'Maramdaming pagkakakuwento ni $name1 sa korte ng buong pangyayari.', 'Walong librang nabawas sa timbang ni $name1 mula noong isang linggo.', 'Pagpunta sa mga tanyag at magagandang pook-pasyalan sa Pilipinas.', 'Paghahanda para sa huling pagsusulit namin sa kasalukuyang semester.', 'Ang pagkakapaliwanag ni $name1 ng mga kababalaghan sa mga bata kanina.', 'Kagustuhang maglaro ng ahedres kanina kung hindi nawalan ng kuryente.', 'Ang manood ng sine bukas o ang maglaro ng basketbol mamayang gabi.'],
    ],
    6 => [
        ['Siya ba ang kawawang lalaking hinabol kanina ng mabangis na aso ng ating kapitbahay?', 'Malinaw na ipinaliwanag ng punong-guro sa mga magulang ang mga bagong patakaran sa paaralan.', 'Nakatira ang aking tiya sa isang subdibisyong malapit sa aking pinapasukang unibersidad.', 'Gumising dapat tayo nang maaga bukas para maumpisahan na natin ang ating mahalagang proyekto.', 'Si $name1 ay talagang mahusay magpaliwanag ng mga konseptong may kinalaman sa teknolohiya.', 'Naniniwala ang mga mamamayang bumoto sa kanya na tutuparin niya ang kanyang mga pangako.', 'Huwag kang gagawa ng anumang hakbang na makahahadlang sa mga layunin ng ating samahan.', 'Isinantabi muna ng dalawang pinuno ang hidwaang naganap sa pagitan ng kanilang mga pangkat.', 'Naglunsad ng isang proyektong mangangalaga sa kapaligiran ang kanyang matalik na kaibigan.'],
        ['Dahil sa muling pagpapaalala sa akin ni $name1 ng maaaring mangyari sa paligsahan.', 'Dahil dinala ang mga itim na pantalon at mga pulang dyaket sa ating suking mananahi kanina.', 'Kung paano makapag-iipon ng pera para makabili ng mga bagong aklat at gamit sa pag-aaral.', 'Masayang pagpapakita ni $name1 ng mga larawan ng kanyang anak sa kanyang mga kaibigan.', 'Kalahating kilometrong paglalakad mula sa bahay nila patungo sa sakayan ng dyip.', 'Mga taong nanonood ng mga pinakahuling balita sa telebisyon tuwing may dumarating na bagyo.', 'Matiyaga niyang pananaliksik ukol sa mga mabubuting epekto ng luyang dilaw sa ating kalusugan.', 'Karimarimarim na katotohanang bumalot sa kasaysayan ng bansang sinakop ng mga dayuhan.', 'Marapat na pag-uusig sa mga taong nagsamantala sa kahinaan ng mga batas sa ating bansa.'],
    ],
];
$adjs[0][1]=array("mabait","mahusay","masipag","matalino","matapang","matipid","mayaman","tahimik",
	);
$adjs[1][1]=array("mabait","magalang","magaling","mahusay","mapagkaibigan","masayahin","masipag",
"masuwerte","matalino","matangkad","matapang","matipid","matulungin","mautak","mayaman","nakakatawa","tahimik",
	);
$adjs[0][2]=array("madulas","mahaba","mainit","makinis","malabo","malaki","malalim","malambot","malamig","maliit","malinaw","mataas","matigas",
	);
$adjs[1][2]=array("madulas","mahaba","mainit","magaspang","malabo","malaki","malalim","malambot","malamig","maliit","malinaw","makinis",
"makintab","mataas","matigas","matingkad"
	);
$names[0]=array(
"Adam", "Alex","Angel","Ben","Carlos","Chris","Danilo","David","Diego","Ian","Isaac","Jack","Jason","Jose","Jimmy","Juan","Jose","Kevin","Lucas","Luis","Max", 
"Nick","Robert","Sam","Tomas","Willie",
"Alice", "Amy","Anna","Bella","Beth","Carol","Elisa","Emma","Eva","Grace","Joy","Julia","Kathy","Leah", "Lina","Lydia","Maria","Mely","Mia","Naty","Sarah","Sofia",
"Tina", "Vicky"
);
$names[1]=array(
"Adam", "Adrian", "Alex", "Alexander", "Andrew", "Angelo", "Benjamin", "Brandon", "Caleb", "Cameron", "Carlos", "Carson", "Carter", "Charles", "Christopher", "Daniel", 
"David", "Diego", "Dominic", "Dylan", "Elijah", "Ethan", "Gabriel", "Hayden", "Ian", "Isaac", "Isaiah", "Jack", "Jacob", "Jaden", "James", "Jason", "Jose", "John", "Jonathan", 
"Joseph", "Joshua", "Juan", "Julian", "Justin", "Kevin", "Logan", "Lucas", "Luis", "Luke", "Matthew", "Max", "Michael", "Nathan", "Nicholas", "Noah", "Oliver", "Owen", "Parker", 
"Robert", "Ryan", "Samuel", "Sebastian", "Thomas", "Tristan", "William",
"Alexandra", "Alyssa", "Amelia", "Andrea", "Anna", "Ariana", "Arianna", "Bella", "Brooke", "Camille", "Caroline", "Chloe", "Claire", "Elizabeth", "Emma", "Eva", "Evelyn", 
"Gabriela", "Grace", "Hannah", "Isabella", "Jasmine", "Jocelyn", "Jolina", "Julia", "Katherine", "Kylie", "Lauren", "Layla", "Leah", "Lillian", "Lydia", "Madeline", "Maria", 
"Mariah", "Melanie", "Mia", "Naomi", "Natalie", "Olivia", "Samantha", "Sarah", "Sofia", "Stella", "Tina", "Victoria"
);
$tier = poh_tier($lvl, $grd);
$labels = ['pangungusap', 'hindi pangungusap'];
$pool = [];
foreach ($banks[$tier] as $category => $words) {
    foreach (array_unique($words) as $word) $pool[] = ['word'=>$word, 'category'=>$category];
}
function poh_link(string $w): string {
    return preg_match('/[aeiou]$/i', $w) ? $w.'ng' : (substr($w,-1)==='n' ? $w.'g' : $w.' na');
}
function poh_question(array $entry, int $tier, string $lvl, int $grd, array $labels, array $adjs, array $names): array {
    $a = $adjs[$tier <= 3 ? 0 : 1];
    $adj1 = $a[1][array_rand($a[1])]; $adj2 = $a[2][array_rand($a[2])];
    $ns = array_values(array_unique($names[$tier < 6 ? 0 : 1])); shuffle($ns);
    $items = $tier < 3 ? ['aklat','baso','lapis','payong','tasa'] : ['aklat','basahan','baso','kaldero','kawali','kulambo','lapis','martilyo','palanggana','pamaypay','payong','platito','tasa'];
    $item = $items[array_rand($items)];
    $days = ['Lunes','Martes','Miyerkules','Huwebes','Biyernes','Sabado','Linggo'];
    $word = strtr($entry['word'], ['$name1'=>$ns[0], '$name2'=>$ns[1], '$adj1'=>$adj1, '$adj2'=>$adj2, '$adj1b'=>poh_link($adj1), '$adj2b'=>poh_link($adj2), '$item'=>$item, '$itemb'=>poh_link($item), '$araw'=>$days[array_rand($days)]]);
    return ['word'=>$word,'correct'=>$labels[$entry['category']], 'choices'=>$labels,'tier'=>$tier,'lvl'=>$lvl,'grade'=>$grd,'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = poh_question($pool[$i], $tier, $lvl, $grd, $labels, $adjs, $names);
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <span style="color:#800080;font-weight:normal;">'<?php echo poh_h($result['clicked']); ?>'</span>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang nakasulat sa ibaba ay <strong style="color:#CC0066;"><?php echo poh_h($cur['correct'] === 'pangungusap' ? 'isang pangungusap' : 'hindi pangungusap'); ?></strong>.</p>
    <div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:min(480px,100%);padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;line-height:1.5;font-weight:700;color:#800080;overflow-wrap:anywhere;"><?php echo poh_h($cur['word']); ?></span></div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:min(480px,100%);padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;line-height:1.5;font-weight:700;color:#800080;overflow-wrap:anywhere;"><?php echo poh_h($cur['word']); ?></span></div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Sabihin kung ang nakasulat sa itaas ay pangungusap o hindi.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo poh_h(ucfirst($choice)); ?>
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
