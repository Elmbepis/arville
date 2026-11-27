<?php
// filipino/modules/pangungusap-kayarian.php
// Five legacy sentence-template banks; four structural categories.

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
$moduleTitle = 'Kayarian ng Iba\'t Ibang Pangungusap';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = $_POST['level'] ?? ($_SESSION['level'] ?? 'Easy');
if (!in_array($lvl, ['Easy','Hard'], true)) $lvl = 'Easy';
$_SESSION['level'] = $lvl;
$baseTier = $grd <= 4 ? 1 : ($grd <= 7 ? 2 : 3);
$tiers = $lvl === 'Easy' ? [$baseTier] : [$baseTier+1,$baseTier+2];
$tier = implode('-', $tiers);
function kay_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Nagbisikleta, tumakbo, at lumangoy sina $name1 at $name2.', 0, 1],
    ['Namangka sina $name1 at $name2 patungo sa pulong iyon.', 0, 1],
    ['Ang guro at ang mga mag-aaral ay nagpasalamat sa bisita.', 0, 1],
    ['Bumili si $name1 at ang kanyang asawa ng gamot sa botika.', 0, 1],
    ['Si $name1 ay nagising, bumangon, at dumungaw sa bintana.', 0, 1],
    ['Si Mang $boy ay nagpainit ng tinapay at nagkanaw ng kape.', 0, 1],
    ['Si Aling $girl ay naglalako ng kakanin at nagtitinda ng ulam.', 0, 1],
    ['Ang blusa ay maganda ngunit hindi ito kasya sa akin.', 1, 1],
    ['Bumili ako ng bibingka kanina ngunit hindi ko ito nakain.', 1, 1],
    ['Ibibili ko ng regalo si $name1 o ililibre ko siya sa sine.', 1, 1],
    ['Si $name1 ang bibili ng mga sahog at si $name2 ang magluluto.', 1, 1],
    ['Kumain na ng hapunan si $name1 ngunit siya ay muling nagugutom.', 1, 1],
    ['Aawit kami ng kundiman o sasayaw sila ng tinikling.', 1, 1],
    ['Nagkasakit si Lola $girl dahil nabasa siya ng ulan.', 2, 1],
    ['Ako mismo ang susundo sa iyo kapag uuwi ka na rito.', 2, 1],
    ['Namamasyal kami sa aplaya habang namamangka silang dalawa.', 2, 1],
    ['Kung hindi mo ako mahihintay, maaari ka nang maunang umuwi.', 2, 1],
    ['Upang makatulog si $name1, pinaypayan siya ni $name2.', 2, 1],
    ['Hindi tayo makakaalis habang malakas pa ang buhos ng ulan.', 2, 1],
    ['Dahil masama ang pakiramdam ni $name1, hindi siya nakasama.', 2, 1],
],
2 => [
    ['Ang pangulo ay umakyat sa entablado at nagbigay ng talumpati.', 0, 2],
    ['Bumili ng $item1 at humiram ng $item2 sina $name1 at $name2.', 0, 2],
    ['Si Lisa ay naglaba ng mga damit at nagplantsa ng mga uniporme.', 0, 2],
    ['Ang pamilya $surname ay namasyal sa \'mall\' at nanood ng sine.', 0, 2],
    ['Ang dyip at traysikel ay nakaparada sa tapat ng simbahan.', 0, 2],
    ['Nagpahiram sina $name1 at $name2 ng $item1 sa kanilang kuya.', 0, 2],
    ['Nilibot ng mga magkakaklase ang minumultong bahay ni $name1.', 0, 2],
    ['Isasauli ko ang $item1 sa tindahan o itatago ko na lang ito.', 1, 2],
    ['Paliliguan namin ang aso o didiligan namin ang mga halaman.', 1, 2],
    ['Ang sapatos niya ay makintab ngunit pudpod na ang ilalim nito.', 1, 2],
    ['Malaki ang elepante sa \'zoo\' at mabangis din ang tigre roon.', 1, 2],
    ['Tinawagan siya ni $name1 ngunit hindi niya sinagot ang tawag.', 1, 2],
    ['Umalis ako sa bahay nang maaga ngunit wala akong masakyang dyip.', 1, 2],
    ['Hinanap ko ang kaibigan ni $name1 ngunit hindi ko siya nakita.', 1, 2],
    ['Mamimili ako ng mga damit sa Divisoria at ititinda ko ang mga ito.', 1, 2],
    ['Kung wala akong kasama, hindi ako papayagang umalis ng bahay.', 2, 2],
    ['Kakain ang pamilya $surname sa labas pagkatapos nilang magsimba.', 2, 2],
    ['Ang mahirap na gawain ay gumagaan kapag tayo ay nagtutulungan.', 2, 2],
    ['Pumasok ang mga bata nang marinig nila ang tunog ng kampanilya.', 2, 2],
    ['Dahil kulang na ang pera ko, sa ibang araw ko na lang ito bibilhin.', 2, 2],
    ['Maaari pa rin tayong umabot doon kung bibilisan natin ang paglalakbay.', 2, 2],
],
3 => [
    ['Ang aso at pusa ay kumain ng mga tira at natulog nang matagal sa bakuran.', 0, 3],
    ['Sa bukirin itinanim at namunga ang mga puno ng niyog at mga halamang-gamot.', 0, 3],
    ['Sumayaw ng tinikling at umawit ng kundiman sina $name1 at $name2 noong $araw.', 0, 3],
    ['Agaran nilang winalis at nilampaso ang maruming sala at magulong kusina.', 0, 3],
    ['Dahan-dahang yumuko at humingi ng paumanhin ang batang nang-agaw ng laruan.', 0, 3],
    ['Ako ay nagbaon ng malaking payong at nagsuot ng makapal na dyaket kagabi.', 0, 3],
    ['Ang mangingisda ay namangka sa gitna ng malaking lawa at namingwit ng isda.', 0, 3],
    ['Si $name1 at ang pamilya $surname ay magsisimba at kakain sa labas.', 0, 3],
    ['Ang bagong tuta niya ay isang pitbull at pinangalanan niya itong \'Bangis\'.', 1, 3],
    ['Gusto nilang magbisikleta subalit masama ang lagay ng panahon ngayon.', 1, 3],
    ['Mananaliksik tayo sa silid-aklatan o makikipanayam tayo sa mga dalubhasa.', 1, 3],
    ['Unti-unting nauubos ang mga puno at nawawalan ng mga tirahan ang mga hayop.', 1, 3],
    ['Magaling tumugtog ng piyano si $name1 at mahusay kumanta ang ate niya.', 1, 3],
    ['Kumakain ng almusal si $name1 at nag-eehersisyo si $name2 sa labas.', 1, 3],
    ['Binigyan ni $name1 ng dyaket si $name2 ngunit hindi ito kasya sa kanya.', 1, 3],
    ['Nag-aral nang mabuti si $name1 ngunit hindi siya nakakuha ng mataas na marka.', 1, 3],
    ['Papapalitan ko ang $item1 sa tindahan o ibibigay ko na lang ito kay $name1.', 1, 3],
    ['Maaaring matanggal siya sa trabaho kung magpapatuloy siya sa pagpapabaya.', 2, 3],
    ['Mag-ehersisyo ka sa parke tuwing umaga hanggang lumakas ang iyong pangangatawan.', 2, 3],
    ['Dahil masipag at pursigido siya, nakapagtayo siya ng sarili niyang negosyo.', 2, 3],
    ['Nahuli sa klase si $name1 dahil inihatid pa niya ang kanyang kapatid.', 2, 3],
    ['Iligpit na ninyo ang mga laruan sa sala bago dumating sina Tatay at Nanay.', 2, 3],
    ['Ipaalam mo sa amin kung may balita sa telebisyon tungkol sa halalan.', 2, 3],
    ['Simula nang maging alkalde si Ginang $surname, marami na ang nagbago sa lungsod.', 2, 3],
    ['Dahil malapit sina $name1 at $name2 sa isa\'t isa, hindi sila nagkakatampuhan.', 2, 3],
    ['Bigla siyang bumangon dahil may narinig siyang malakas na dagundong.', 2, 3],
    ['Magsuot ka ng kapote at dalhin mo ang payong dahil lumalakas na ang buhos ng ulan.', 3, 3],
    ['Sumasakay ka ba ng bus o sinusundo ka ba ng kuya mo kapag may klase ka sa kolehiyo?', 3, 3],
    ['Tumawag ka kay $name1 at alamin mo ang kalagayan ni Tatay nang hindi ka nag-aalala.', 3, 3],
    ['Bumili ka ng gamot sa botika at inumin mo agad ito upang mawala ang sakit ng ulo mo.', 3, 3],
    ['Bago umalis si Nanay, kinausap niya kami at saka ibinilin niya sa amin ang mga gawaing-bahay.', 3, 3],
    ['Humingi ka ng tawad kay $name1 at mangako kang hindi mo na siya gagalitin upang magkabati na kayo.', 3, 3],
    ['Naghahanda ng hapunan si $name1 at natutulog si $name2 nang biglang dumating ang mga bisita.', 3, 3],
],
4 => [
    ['May magandang kalooban at laging mapagkakatiwalaan si $girl at ang kanyang kambal na si $boy.', 0, 4],
    ['Nagmadaling pumunta sa istasyon at mabilis na sumakay ng tren si $name1 at ang kanyang kamag-aral.', 0, 4],
    ['Si Ginoong $surname ay dumaan sa opisina kaninang tanghali at nakipag-usap sa kanyang mga empleyado.', 0, 4],
    ['Ang ating mga ninuno ay sumamba sa kalikasan at naniwala sa isang diyos na tinawag nilang \'Bathala\'.', 0, 4],
    ['Ang posporo, tabla, at papel ay mga halimbawa ng mga produktong nagmumula sa mga punongkahoy.', 0, 4],
    ['Ang kaibigang tsuper ni $name1 ay maghahatid ng sampung mang-aawit sa Bulacan mamayang hapon.', 0, 4],
    ['Ang kawawang kunehong nagkukubli sa likod ng batong iyon ay dinagit ng isang dambuhalang agila.', 0, 4],
    ['Nakapasa siya sa gusto niyang kolehiyo pero walang pambayad ng matrikula ang kanyang mga magulang.', 1, 4],
    ['Mahilig sa pagsasaya sina $name1 at $name2 ngunit may panahon din sila sa kanilang mga hanapbuhay.', 1, 4],
    ['Tumanggap ng gantimpala sa pag-awit si $name1 at nanalo sa paligsahan sa pagsayaw si $name2.', 1, 4],
    ['Ibinili ni $name1 ng kendi ang kanyang batang kapatid subalit hindi pa rin niya napangiti ito.', 1, 4],
    ['Lalabhan ko ang mga damit ni $name1 mamaya at paplantsahin ko ang mga uniporme ni $name2 bukas.', 1, 4],
    ['Manonood kami ng mga palabas sa telebisyon o makikinig na lang kami ng mga programa sa radyo.', 1, 4],
    ['Uminom na ako ng gamot kaninang umaga subalit sumasakit pa rin ang tiyan ko hanggang ngayon.', 1, 4],
    ['Maaaring manganib ang buhay ng mga hayop kung hindi natin pangangalagaan nang mabuti ang kagubatan.', 2, 4],
    ['Sina $boy at $girl ay sumakay ng dyip patungong paaralan upang sunduin ang kanilang anak na si $name1.', 2, 4],
    ['Nagpasalamat ang matanda sa binatang nagligtas ng kanyang buhay nang muli silang magkita kagabi.', 2, 4],
    ['Kung makikinig ka sa mga sasabihin ko sa iyo ngayon, madali mong matatapos ang proyektong iyan.', 2, 4],
    ['Nang may dumating na hamon sa buhay ni $name1, dinamayan siya ng kanyang matalik na kaibigan.', 2, 4],
    ['Nag-eensayo araw-araw ang mga estudyanteng magtatanghal dahil ayaw nilang mapahiya sa mga magulang.', 2, 4],
    ['Bibisitahin namin ang aming lola sa Sabado upang makasama namin siya sa kanyang ikasiyamnapung kaarawan.', 2, 4],
    ['Maligo kang mabuti at magbihis ka ng magarang damit dahil ililibre kita mamaya sa isang mamahaling restoran.', 3, 4],
    ['Dahil gumawa ng maling desisyon sa buhay si $name1, naghirap ang kanilang pamilya at nahirapan silang makabangong muli.', 3, 4],
    ['Dahil nagmamadaling umalis si $name1, hindi siya nakapagpaalam kay Inay at nakalimutan niyang dalhin ang kanyang baon.', 3, 4],
    ['Si $name1 ay bumili ng isang kamera at nag-aral siya kung paano kumuha ng mga larawan para makapaghanapbuhay siya bilang isang litratista.', 3, 4],
    ['Ang mga isda ay lumangoy nang papalayo at ang iba ay naglundagan pa nang bigla silang habulin ng isang buwaya.', 3, 4],
    ['Nasaksihan ni $name1 ang nangyaring krimen at ipinagbigay-alam niya ito sa mga pulis upang agad na madakip ang salarin.', 3, 4],
],
5 => [
    ['Nailigtas mula sa sunog at muling napakinabangan ang mga damit at iba pang kasangkapan ni Aling $girl.', 0, 5],
    ['Si Ginang $surname at ang kanyang tatlong anak ay pumunta sa groto at nag-alay ng mga bulaklak sa imahen.', 0, 5],
    ['Sina $name1 at $name2 ay nagbasa ng sari-saring pahayagan at nagsagawa ng malalim na pagsasaliksik.', 0, 5],
    ['Si $name1 at ang pinsan niyang si $name2 ay namili ng mga sangkap sa palengke at nagluto ng masarap na adobo.', 0, 5],
    ['Nakapagtapos ng pag-aaral at nakakuha ng magandang trabaho sa ibang bansa ang kaisa-isang anak ni $name1.', 0, 5],
    ['Ang alagang kalabaw nina $name1 at $name2 ay dinala kanina sa palengke at ibinenta sa isang negosyante.', 0, 5],
    ['Matagal na pagsasaliksik ang ginawa ni $name1 ngunit hindi pa rin niya nabigyan ng solusyon ang problema.', 1, 5],
    ['Si Propesor $boy $surname ang nagsimula ng proyekto at ang kanyang mga paboritong estudyante ang nagtuloy nito.', 1, 5],
    ['Malaking halaga na ang nagastos ng pamahalaan sa paglilinis ng mga estero ngunit hanggang ngayo\'y bumabaha pa rin sa aming lugar.', 1, 5],
    ['Alam ni $name1 ang kahalagahan ng edukasyon ngunit malaking sagabal sa kanyang pag-aaral ang kanyang sakit.', 1, 5],
    ['Nag-aral si $name1 nang tatlong araw para sa kanyang pagsusulit subalit mababa pa rin ang nakuha niyang marka rito.', 1, 5],
    ['Ang kanilang pangkat ang mamimingwit ng mga hito at dalag at kami naman ang mangunguha ng mga sangkap na gagamitin sa pagluluto ng mga ito.', 1, 5],
    ['Kung hindi niya maisasakatuparan nang maayos ang kanyang tungkulin, maaaring bumagsak ang kanilang kompanya.', 2, 5],
    ['Nais niyang makapasok sa isang \'aviation college\' sapagkat matagal na niyang pinapangarap ang maging isang magaling na piloto.', 2, 5],
    ['Nang matapos ang napakalakas na lindol, nasaksihan ni $name1 ang pighating dulot nito sa mga mamamayan ng lalawigan.', 2, 5],
    ['Upang maging mas mabilis ang pag-unlad ng ating bansa, kailangan nating maglaan ng mas malaking pondo para sa edukasyon.', 2, 5],
    ['Para maiwasan ang pagkalat ng iba\'t ibang sakit, nagpadala ang mga opisyal ng mga manggagamot sa mga binahang lugar.', 2, 5],
    ['Dahil binuksan na ang bagong paaralan sa kanilang barangay, hindi na nila kailangang maglakad nang malayo tuwing umaga.', 2, 5],
    ['Hindi na nakita pang muli ni $name1 ang kanyang kaibigang matalik dahil dinala na siya ng kapalaran sa kabilang panig ng mundo.', 2, 5],
    ['Bagaman matagal na siyang hindi nagagawi sa kanyang kinalakhang lungsod, kabisado pa rin niya hanggang ngayon ang mga pasikot-sikot dito.', 2, 5],
    ['Magtatayo si Mang $boy ng isang barberya at magsisimula si Aling $girl ng isang karinderya kung makakautang agad sila sa bangko.', 3, 5],
    ['Dahil mahilig mag-\'videoke\' si $name1, bumili siya ng malaking telebisyon at nagpaturo siya ng tamang pag-awit kay Gng. $surname.', 3, 5],
    ['Magluto ka na ng hapunan at ihanda mo na ang mga silid dahil parating na ang mga kamag-anak nating magbabakasyon muna rito.', 3, 5],
    ['Bumalik ako sa pag-aaral at tinapos ko ang aking kurso nang matapos kong pag-aralin ang aking apat na nakababatang kapatid.', 3, 5],
    ['Nagtinda ako ng mga bulaklak at naglako ako ng iba\'t ibang kakanin upang makaipon ako ng sapat na pera para sa aking pag-aaral.', 3, 5],
    ['Hindi ako nakagawa ng aking mga takdang-aralin at hindi siya nakatulog nang mahimbing dahil nawalan ng kuryente sa pook namin kagabi.', 3, 5],
    ['Pangarap niyang maging isang manggagamot at nais niya ring maging huwaran sa kapwa habang nagsusumikap siya sa kanyang pag-aaral.', 3, 5],
    ['Si $name1 ay lumibot sa buong Palawan at kinunan niya ito ng maraming larawan upang maipakita niya ang ganda ng lalawigan sa kanyang mga kaibigan.', 3, 5],
],
];
$banks = [$tier => []];
foreach ($tiers as $t) foreach ($sourceBanks[$t] as $sentence) $banks[$tier][] = $sentence;
function kay_question(array $entry, string $tier, string $lvl): array {
$names = array(
"Adam", "Adrian", "Alex", "Andrew", "Angelo", "Carlos", "Carson", "Chris", "Daniel", "David", "Diego", "Domeng", "Elijah", "Ethan", "Gabriel", "Hayden", 
"Ian", "Isaac", "Isaiah", "Jack", "Jacob", "James", "Jason", "Jose", "John", "Jonathan", "Joseph", "Joshua", "Juan", "Julian", "Justin", "Kevin", "Lucas", 
"Luis", "Luke", "Matthew", "Max", "Michael", "Nathan", "Noah", "Oliver", "Robert", "Ryan", "Samuel", "Tristan", "William",
"Alyssa", "Amelia", "Andrea", "Anna", "Bella", "Chloe", "Claire", "Eliza", "Emma", "Eva", "Evelyn", "Gabriela", "Grace", "Hannah", "Isabel", "Jasmine", 
"Jocelyn", "Jolina", "Julia", "Kylie", "Lauren", "Layla", "Leah", "Lillian", "Lydia", "Maria", "Melanie", "Mia", "Naomi", "Olivia", "Sarah", "Sophia", 
"Stella", "Tina", "Victoria"
);
$boys = array("Alex", "Ben", "Carlos", "Daniel", "Diego", "Gabriel", "Isaac", "Jaime", "Jose", "Juan", "Jonathan", "Lucas", "Luis", "Max", "Roberto", "Samuel", "Tomas",);
$girls = array("Annie", "Betty", "Caring", "Elisa", "Emma", "Eva", "Evelyn", "Grace", "Josie", "Julie", "Katring", "Laura", "Lydia", "Maring", "Olive", "Tina", "Toyang");
$surnames = array(
"Cruz","de Guzman","Gomez","Padua","Santos","Reyes","Tolentino","Torres",
);
$items = array(
"aklat","baso","bola","kaldero","kama","kawali","kulambo","kumot","lapis","martilyo","medyas","palanggana","pamaypay","payong","platito","sando","tasa"
);
$araws = array("Lunes","Martes","Miyerkules","Huwebes","Biyernes","Sabado","Linggo");
$buwans = array("Enero","Pebrero","Marso","Abril","Mayo","Hunyo","Hulyo","Agosto","Setyembre","Oktubre","Nobyembre","Disyembre");
$name1 = $names[array_rand($names)];
do { $name2 = $names[array_rand($names)]; } while ($name1 === $name2);
$item1 = $items[array_rand($items)];
do { $item2 = $items[array_rand($items)]; } while ($item1 === $item2);
$boy = $boys[array_rand($boys)];
$girl = $girls[array_rand($girls)];
if (strpos($entry[0], 'kanilang anak na si $name1') !== false) { while ($name1 === $boy || $name1 === $girl) $name1 = $names[array_rand($names)]; }
$sentence = strtr($entry[0], ['$name1'=>$name1,'$name2'=>$name2,'$item1'=>$item1,'$item2'=>$item2,'$boy'=>$boy,'$girl'=>$girl,'$surname'=>$surnames[array_rand($surnames)],'$araw'=>$araws[array_rand($araws)],'$buwan'=>$buwans[array_rand($buwans)]]);
$choices = ['payak', 'tambalan', 'hugnayan', 'langkapan'];
if ($entry[2] < 3) $choices = array_slice($choices, 0, 3);
return ['highlight'=>kay_h($sentence),'correct'=>$choices[$entry[1]],'choices'=>$choices,'tier'=>$tier,'lvl'=>$lvl,'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && ($_SESSION[$sessionKey]['current']['lvl'] ?? null) === $lvl
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
    $_SESSION[$sessionKey]['current'] = kay_question($banks[$tier][$i], $tier, $lvl);
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
        <strong>Kayarian: <span style="color:#CC0066;"><?php echo kay_h(ucfirst($cur['correct'])); ?></span></strong>
        <p style="font-weight:400;"><br/>Ang kayarian ng pangungusap na ipinakita ay <?php echo kay_h($cur['correct']); ?>.</p>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['highlight']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Piliin ang kayarian ng pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="<?php echo count($cur['choices']) === 3 && $choice === 'hugnayan' ? 'grid-column:1 / -1;justify-self:center;' : ''; ?>display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo kay_h(ucfirst($choice)); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php endif; ?>
<p style="font-size:11pt;color:#800080;margin:10px auto;">Gaano kahirap ang gusto mong susunod na tanong?</p>
<label><input type="radio" name="level" value="Easy" <?php echo $lvl === 'Easy' ? 'checked' : ''; ?>> Madali</label>
<label style="margin-left:60px;"><input type="radio" name="level" value="Hard" <?php echo $lvl === 'Hard' ? 'checked' : ''; ?>> Mahirap</label>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
