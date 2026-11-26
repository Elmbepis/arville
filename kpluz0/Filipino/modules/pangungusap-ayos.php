<?php
// filipino/modules/pangungusap-ayos.php
// Six grade-dependent sentence-template banks.

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
$moduleTitle = 'Ayos ng Pangungusap';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$baseTier = $grd <= 3 ? 1 : ($grd <= 5 ? 2 : ($grd <= 7 ? 3 : 4));
$tiers = $lvl === 'Easy' ? [$baseTier] : ($grd <= 1 ? [2] : [$baseTier+1, $baseTier+2]);
$tier = implode('-', $tiers);
function ayos_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Ang aso ni $name1 ay mataba.', 'di-karaniwan', 1],
    ['Si $name1 ay may $animal1.', 'di-karaniwan', 1],
    ['Ang araw ay sumisikat na.', 'di-karaniwan', 1],
    ['Sila ay tahimik na nagbabasa.', 'di-karaniwan', 1],
    ['Siya ay kapatid ni $name1.', 'di-karaniwan', 1],
    ['Si $name1 ay pumunta sa bukid.', 'di-karaniwan', 1],
    ['Kami ay nakikinig sa radyo.', 'di-karaniwan', 1],
    ['Si $name1 ay kaibigan ko.', 'di-karaniwan', 1],
    ['Kami ay manonood ng sine bukas.', 'di-karaniwan', 1],
    ['Ako ay tatawag kay $name1.', 'di-karaniwan', 1],
    ['Si $name1 ay bumili ng $fruit.', 'di-karaniwan', 1],
    ['Si Nanay ay nag-uwi ng $fruit.', 'di-karaniwan', 1],
    ['Ako ay mag-aaral nang mabuti.', 'di-karaniwan', 1],
    ['Kami ay nagdarasal palagi.', 'di-karaniwan', 1],
    ['Ang kahon ay puno ng laruan.', 'di-karaniwan', 1],
    ['Dadalaw sa akin si $name1.', 'karaniwan', 1],
    ['Magkikita kami ni $name1.', 'karaniwan', 1],
    ['Mataba ang aso ni $name1.', 'karaniwan', 1],
    ['Lima ang $animal1 nila.', 'karaniwan', 1],
    ['Masarap ang ulam namin.', 'karaniwan', 1],
    ['Malambot ang tinapay na ito.', 'karaniwan', 1],
    ['Malamig ang tubig dito.', 'karaniwan', 1],
    ['Mainit pala itong kape ko.', 'karaniwan', 1],
    ['Mabait si $name1 sa amin.', 'karaniwan', 1],
    ['Kakain ako ng $fruit.', 'karaniwan', 1],
    ['Umiiyak na naman ang sanggol.', 'karaniwan', 1],
    ['Tahimik magbasa si $name1.', 'karaniwan', 1],
    ['Mabait ang bagong guro natin.', 'karaniwan', 1],
    ['Mangingisda sila sa dagat.', 'karaniwan', 1],
    ['Malayang nakalipad ang ibon.', 'karaniwan', 1],
    ['Kay $name1 ang bolang ito.', 'karaniwan', 1],
    ['Masipag na guro si $name1.', 'karaniwan', 1],
    ['Papasok kami sa paaralan bukas.', 'karaniwan', 1],
    ['Akin ang pulang dyaket.', 'karaniwan', 1],
    ['Manonood ako ng sine.', 'karaniwan', 1],
    ['Sasali sila sa laro ninyo.', 'karaniwan', 1],
],
2 => [
    ['Siya ay isang mahusay na pintor.', 'di-karaniwan', 2],
    ['Si $name1 ay isang $adj1b tao.', 'di-karaniwan', 2],
    ['Si $name1 ay nagluluto ng almusal.', 'di-karaniwan', 2],
    ['Si $name1 ay may alagang $animal1.', 'di-karaniwan', 2],
    ['Ang paborito kong prutas ay $fruit.', 'di-karaniwan', 2],
    ['Ang programa ay magsisimula na.', 'di-karaniwan', 2],
    ['Ang anak ko ay nagdarasal gabi-gabi.', 'di-karaniwan', 2],
    ['Ang \'backpack\' na kulay dilaw ay akin.', 'di-karaniwan', 2],
    ['Si $name1 ay masunuring anak.', 'di-karaniwan', 2],
    ['Si Inay ay nagluluto ng almusal.', 'di-karaniwan', 2],
    ['Ang mga mag-aaral ay nakapila na.', 'di-karaniwan', 2],
    ['Ang basura ay itinapon ni $name1.', 'di-karaniwan', 2],
    ['Si $name1 ay naghahanap ng trabaho.', 'di-karaniwan', 2],
    ['Ang sanggol ay umiiyak nang malakas.', 'di-karaniwan', 2],
    ['Kami ay nagulat sa malakas na ingay.', 'di-karaniwan', 2],
    ['Siya ay marunong tumugtog ng biyulin.', 'di-karaniwan', 2],
    ['Sina lolo at lola ay magsisimba mamaya.', 'di-karaniwan', 2],
    ['Ang magnanakaw ay nahuli ng mga pulis.', 'di-karaniwan', 2],
    ['Ang bus na sinasakyan nila ay aalis na.', 'di-karaniwan', 2],
    ['Bumili si $name1 ng $item kanina.', 'karaniwan', 2],
    ['Mahusay magpinta si $name1.', 'karaniwan', 2],
    ['Unti-unting dumidilim ang paligid.', 'karaniwan', 2],
    ['Malaki na ang alagang $animal1 ni $name1.', 'karaniwan', 2],
    ['Nagulat ako sa nakita kong $animal2.', 'karaniwan', 2],
    ['Hiniram ni $name1 ang diyaryo natin.', 'karaniwan', 2],
    ['Namalengke kami ni $name1 kanina.', 'karaniwan', 2],
    ['Sa Lunes gaganapin ang paligsahan.', 'karaniwan', 2],
    ['Madali lang ang pagsusulit natin.', 'karaniwan', 2],
    ['Nagulat kami sa malakas na ingay.', 'karaniwan', 2],
    ['Mamamalengke sina $name1 at $name2.', 'karaniwan', 2],
    ['Marunong siyang tumugtog ng gitara.', 'karaniwan', 2],
    ['Maghahanap ng trabaho si $name1 bukas.', 'karaniwan', 2],
    ['Magsisimba mamaya sina $name1 at $name2.', 'karaniwan', 2],
    ['Nagtutulungan kami sa bahay at sa bukid.', 'karaniwan', 2],
    ['Naglalaro sa bakuran ang magkakapatid.', 'karaniwan', 2],
    ['Bumangon mula sa kanyang kama si $name1.', 'karaniwan', 2],
    ['Mahaba at malambot ang buhok ni $name1.', 'karaniwan', 2],
    ['Humingi ng pagkain ang matandang pulubi.', 'karaniwan', 2],
    ['Hindi nagbago ang presyo ng mga bilihin.', 'karaniwan', 2],
    ['Magsusulat ng tatlong liham si $name1.', 'karaniwan', 2],
    ['Lumang-luma na ang mga damit na ito.', 'karaniwan', 2],
    ['Bababang muli ang presyo ng gasolina.', 'karaniwan', 2],
    ['Magluluto siya ng masarap na pansit.', 'karaniwan', 2],
    ['Nakapatong sa mesa ang mga aklat.', 'karaniwan', 2],
    ['Masama sa katawan ang pagpupuyat.', 'karaniwan', 2],
],
3 => [
    ['Ang alagang kabayo ni $name1 ay talagang matulin tumakbo.', 'di-karaniwan', 3],
    ['Ang pamilya ni $name1 ay maraming alagang $animal1.', 'di-karaniwan', 3],
    ['Ang maging isang piloto ay matagal na niyang pangarap.', 'di-karaniwan', 3],
    ['Sina $name1 at $name2 ay talagang mahilig umawit.', 'di-karaniwan', 3],
    ['Ang dating sirang kalsada roon ay inaspalto na.', 'di-karaniwan', 3],
    ['Ang mga tandang ay tumitilaok nang malakas sa umaga.', 'di-karaniwan', 3],
    ['Ang mag-anak ay sabay-sabay kumain ng almusal.', 'di-karaniwan', 3],
    ['Ang mga aning ito ay ibebenta nila sa palengke.', 'di-karaniwan', 3],
    ['Ang presyo ng mga bilihing isda ay hindi nagbago.', 'di-karaniwan', 3],
    ['Ang ginawang proyekto ni $name1 ay may kabuluhan.', 'di-karaniwan', 3],
    ['Ang matandang pulubi ay humingi ng pagkain sa amin.', 'di-karaniwan', 3],
    ['Kami ay pupunta sa opisina ni $name1 mamayang hapon.', 'di-karaniwan', 3],
    ['Si $name1 ay darating mula sa Cavite samakalawa.', 'di-karaniwan', 3],
    ['Si $name1 ay nagtapos sa kolehiyo kamakailan lamang.', 'di-karaniwan', 3],
    ['Sina $name1 at $name2 ay nag-eehersisyo araw-araw.', 'di-karaniwan', 3],
    ['Si $name1 ay nagpapagupit ng kanyang buhok.', 'di-karaniwan', 3],
    ['Sila ay mamamasyal sa isang napakagandang parke.', 'di-karaniwan', 3],
    ['Si Nanay ay pupunta sa palengke bukas nang umaga.', 'di-karaniwan', 3],
    ['Ang itim na pusa ay natutulog sa ilalim ng mesa.', 'di-karaniwan', 3],
    ['Si $name1 ay nangangarap na maging manggagamot.', 'di-karaniwan', 3],
    ['Kaming lahat ay maglalakad papunta sa simbahan.', 'di-karaniwan', 3],
    ['Ang mga bata sa ampunan ay umawit at sumayaw.', 'di-karaniwan', 3],
    ['Ang mga bata ay masayang nagtampisaw sa baha.', 'di-karaniwan', 3],
    ['Talagang matulin tumakbo ang alagang kabayo ni $name1.', 'karaniwan', 3],
    ['Nagtimpla kanina ng kape si $name1 para kay $name2.', 'karaniwan', 3],
    ['Masayang umuwi sina $name1 at $name2 mula sa palengke.', 'karaniwan', 3],
    ['Nakikita ko paminsan-minsan ang mga dati kong kaklase.', 'karaniwan', 3],
    ['Laging nakaabang sa pintuan ang alagang aso ni $name1.', 'karaniwan', 3],
    ['Ipinanganak si $name1 noong ika-15 ng Setyembre.', 'karaniwan', 3],
    ['Oras-oras niya akong tinatawagan sa opisina namin.', 'karaniwan', 3],
    ['Anim na oras ang biyahe papuntang Baguio mula rito.', 'karaniwan', 3],
    ['Itatayo sa lupaing ito ang bago nating paaralan.', 'karaniwan', 3],
    ['Umuwi na sa probinsiya sina $name1 at $name2.', 'karaniwan', 3],
    ['Malambot pala ang dulo ng mga daliri ng tarsier.', 'karaniwan', 3],
    ['Bumili ng sariwang isda at manok si Inay kanina.', 'karaniwan', 3],
    ['Malaki ang kanilang kinita mula sa pagtitinda ng ani.', 'karaniwan', 3],
    ['Nakabihis na at handa nang umalis ang mga anak natin.', 'karaniwan', 3],
    ['Tumulong sa paglilinis ng bakuran sina $name1 at $name2.', 'karaniwan', 3],
    ['Madalas kumain ng kendi at tsokolate si $name1.', 'karaniwan', 3],
    ['Tumagal nang higit sa dalawang oras ang programa.', 'karaniwan', 3],
    ['Dadalo kami sa pagdiriwang ng kaarawan ni $name1.', 'karaniwan', 3],
    ['May mga alagang $animal1 ang pinsan ko sa probinsiya.', 'karaniwan', 3],
    ['Masyadong maasim ang manggang ibinigay mo sa akin.', 'karaniwan', 3],
    ['Gaganapin sa bahay ni $name1 ang munting salusalo.', 'karaniwan', 3],
    ['Nakatira ang kaibigan ko sa kabilang subdibisyon.', 'karaniwan', 3],
    ['Magluluto ang nanay ni $name1 ng masarap na kare-kare.', 'karaniwan', 3],
    ['May pabilog na ulo at malalaking mata ang tarsier.', 'karaniwan', 3],
    ['Matiyagang nagpaliwanag ng aralin ang kanilang guro.', 'karaniwan', 3],
],
4 => [
    ['Si $name1 ay muling humiram ng $item kay $name2 noong $araw.', 'di-karaniwan', 4],
    ['Ang $itemb nabili ni $name1 kay $name2 ay walang dudang maganda.', 'di-karaniwan', 4],
    ['Sina $name1 at $name2 ay mag-aani ng mga gulay at prutas.', 'di-karaniwan', 4],
    ['Ang barkada ni $name1 ay magmemeryenda sa bahay namin bukas.', 'di-karaniwan', 4],
    ['Sila ay sasama sa atin papunta sa isang museong pambata.', 'di-karaniwan', 4],
    ['Ang bagong guro natin ay naghanda ng magandang leksiyon.', 'di-karaniwan', 4],
    ['Ang Bulkang Mayon ay matatagpuan sa lalawigan ng Albay.', 'di-karaniwan', 4],
    ['Ang mga batong ibinuga ng bulkan ay napakainit at nakakapaso.', 'di-karaniwan', 4],
    ['Ang aming mga magulang ay nagsisikap para sa aming mag-anak.', 'di-karaniwan', 4],
    ['Tayo ay magbabakasyon sa isang magandang resort sa Batangas.', 'di-karaniwan', 4],
    ['Si $name1 ay mabibigyan ng parangal sa ating paaralan.', 'di-karaniwan', 4],
    ['Ang saranggola ni $name1 ay bumagsak sa kabilang bakod.', 'di-karaniwan', 4],
    ['Ang mga mangingisda ay nagpapahinga na sa tabi ng dagat.', 'di-karaniwan', 4],
    ['Ang mga konsehal ay nagpupulong sa gusaling iyan sa kasalukuyan.', 'di-karaniwan', 4],
    ['Ang paligsahan ay mag-uumpisa nang alas-sais ng umaga bukas.', 'di-karaniwan', 4],
    ['Ang pagtitipon na inaabangan ni $name1 ay magaganap sa Sabado.', 'di-karaniwan', 4],
    ['Si $name1 ay nakatanggap ng imbitasyon mula kay $name2 kahapon.', 'di-karaniwan', 4],
    ['Muling humiram ng $item si $name1 kay $name2 noong $araw.', 'karaniwan', 4],
    ['Binubuo ng malalaki at maliliit na pulo ang bansang Pilipinas.', 'karaniwan', 4],
    ['Nais magbakasyon sa Boracay ang mga bagong dating na turista.', 'karaniwan', 4],
    ['Pinagtitiwalaan ang taong laging matapat sa kanyang kapwa.', 'karaniwan', 4],
    ['Humingi ng paumanhin ang batang nang-agaw ng laruan ni $name1.', 'karaniwan', 4],
    ['Matatalino at masisipag ang mga bagong empleyado ng opisina.', 'karaniwan', 4],
    ['Pinulot ng mga bata ang mga prutas sa ilalim ng puno.', 'karaniwan', 4],
    ['Nakita ko siyang bumili ng sabong panlaba sa tindahan.', 'karaniwan', 4],
    ['Ilalagay namin ang mga plastik na bote sa tamang basurahan.', 'karaniwan', 4],
    ['Itinago ko sa loob ng kabinet ang mga pagkaing de-lata.', 'karaniwan', 4],
    ['Sumasayaw ng tinikling sa entablado ang pangkat ni $name1.', 'karaniwan', 4],
    ['Bumili si $name1 ng gamot sa botika para sa kanyang anak.', 'karaniwan', 4],
    ['Libangan ng kuya ko ang umakyat sa bundok tuwing bakasyon.', 'karaniwan', 4],
    ['Nagtungo ang pamilya Reyes sa Cebu upang magbakasyon.', 'karaniwan', 4],
    ['Ipinarada nila ang kanilang dyip sa gilid ng simbahan.', 'karaniwan', 4],
    ['Nagpaalam na sa akin si $name1 dahil aalis na siya.', 'karaniwan', 4],
],
5 => [
    ['Si $name1 ay mahusay magpaliwanag ng mga kababalaghan sa mga bata.', 'di-karaniwan', 5],
    ['Sina $name1 at $name2 ay naghahanap ng mga pambihirang karanasan.', 'di-karaniwan', 5],
    ['Si Ate Shiela ay gumigising nang maaga para magluto ng almusal.', 'di-karaniwan', 5],
    ['Ang mga lumang damit at sapatos ay ibibigay ko sa bunso namin.', 'di-karaniwan', 5],
    ['Ang pangarap ni Mang Tony ay makatayo ng sarili niyang talyer.', 'di-karaniwan', 5],
    ['Ang magkapatid ay matiyagang nag-aaral para sa kanilang pagsusulit.', 'di-karaniwan', 5],
    ['Ang matandang babae ay nagpasalamat sa binatang tumulong sa kanya.', 'di-karaniwan', 5],
    ['Ang mga sundalong sumagip sa mga sugatan ay gumamit ng mga helikopter.', 'di-karaniwan', 5],
    ['Ang opisyal ng embahada ng Thailand ay nagpasalamat sa mga sundalo.', 'di-karaniwan', 5],
    ['Ang pagbabawal sa pag-akyat ng bulkan ay maaaring gawing permanente.', 'di-karaniwan', 5],
    ['Si $name1 ay nagtatrabaho bilang nars sa isang pampublikong ospital.', 'di-karaniwan', 5],
    ['Ang mga kumot ay donasyon ng mga mag-aaral para sa mga bata sa ampunan.', 'di-karaniwan', 5],
    ['Ang kagandahan ng isang tao ay nakikita sa kanyang mga salita at kilos.', 'di-karaniwan', 5],
    ['Sina $name1 at $name2 ay napiling maging mga kinatawan ng ating paaralan.', 'di-karaniwan', 5],
    ['Si $name1 ay pumunta sa Canada para bisitahin ang kanyang mga kamag-anak.', 'di-karaniwan', 5],
    ['Si $name1 ay nakaipon na ng sapat na pera para sa kanyang bagong negosyo.', 'di-karaniwan', 5],
    ['May disiplina dapat ang mga nagmamaneho ng mga pampublikong sasakyan.', 'karaniwan', 5],
    ['Nag-eensayo araw-araw ang mga estudyanteng magtatanghal sa programa.', 'karaniwan', 5],
    ['Agad na natuklasan ang katotohanan tungkol sa naganap na kaguluhan.', 'karaniwan', 5],
    ['Tuwing Miyerkules at Linggo lang kinukuha ang basura sa subdibisyon.', 'karaniwan', 5],
    ['Matiyagang pinapuputi ni $name1 ang mga uniporme ng kanyang mga anak.', 'karaniwan', 5],
    ['Masigasig nilang ibinalot ang mga pagkain para sa mga nasalanta.', 'karaniwan', 5],
    ['Mabilis na nailabas ni $name1 ang mga gamit sa nasusunog na bahay.', 'karaniwan', 5],
    ['Pabulong na sinabi ni $name1 sa kanyang ina na nagugutom na siya.', 'karaniwan', 5],
    ['Tiniyak ni $name1 na agarang lilinisin ng diyanitor ang maruming silid.', 'karaniwan', 5],
    ['Uuwi na si Tatay mula sa Singapore at susunduin namin siya sa paliparan.', 'karaniwan', 5],
    ['Pumunta muna si $name1 sa bahay nina $name2 upang manghiram ng aklat.', 'karaniwan', 5],
    ['Nakatira ang lolo at lola nila sa isang subdibisyong malapit lang dito.', 'karaniwan', 5],
    ['Inilihim sa atin ni $name1 ang mahiwagang pangyayari sa simbahan.', 'karaniwan', 5],
    ['Dinala namin kagabi sa isang beterinaryo ang aso naming may sakit.', 'karaniwan', 5],
],
6 => [
    ['Ang Pista ng Pahiyas ay ipinagdiriwang tuwing Mayo sa bayan ng Lucban, Quezon.', 'di-karaniwan', 6],
    ['Ang sinasakyan kong dyip ay pinara ng pulis dahil hindi ito huminto sa tamang lugar.', 'di-karaniwan', 6],
    ['Ang mga magulang ng mga mag-aaral ay inanyayahang dumalo sa gaganaping pagtatanghal.', 'di-karaniwan', 6],
    ['Ang buong klase ni Bb. $girl Cruz ay magkakaroon ng lakbay-aral sa museo ng lungsod.', 'di-karaniwan', 6],
    ['Ang mahiyaing kuting ng kapitbahay ay nagtatago sa likod ng kanilang aparador.', 'di-karaniwan', 6],
    ['Ang bagong eksperimento ni $name1 ay gagawin na sa laboratoryo mamayang gabi.', 'di-karaniwan', 6],
    ['Sina $name1 at $name2 ay nautusang magdala ng mga $item sa opisina bukas.', 'di-karaniwan', 6],
    ['Kami ay nagmadaling umuwi dahil inakala naming may babagsak na malakas na ulan.', 'di-karaniwan', 6],
    ['Ang mga alagang aso ni $name1 ay masayang naghahabulan sa bakuran ngayon.', 'di-karaniwan', 6],
    ['Ang mga pamangkin ni $name1 ay nanood ng palabas na \'Star Wars\' sa telebisyon.', 'di-karaniwan', 6],
    ['Kami ay magbebenta ng maraming lumang gamit sa gaganaping \'garage sale\' bukas.', 'di-karaniwan', 6],
    ['Ang mga kapatid ni $name1 ay masayang nanood ng kanilang paboritong palabas.', 'di-karaniwan', 6],
    ['Ang pinakamatalinong mag-aaral sa klaseng iyon ay masipag at matiyagang mag-aral.', 'di-karaniwan', 6],
    ['Ang mga dayuhang turista ay hinikayat nilang sumali sa pagsasayaw sa parada.', 'di-karaniwan', 6],
    ['Ang matalik mong kaibigang si $name1 ay tiyak na matutuwa sa sorpresang iyan.', 'di-karaniwan', 6],
    ['Ang malamig na simoy ng hangin na humahampas sa aking mukha ay nakakakiliti.', 'di-karaniwan', 6],
    ['Pupunta kami sa Cebu sa isang linggo upang bisitahin ang mga lolo at lola ko.', 'karaniwan', 6],
    ['Mabilis at ligtas na nakalayo sa nasusunog na gusali ang mga bata at matanda.', 'karaniwan', 6],
    ['Tumulong sila sa paglikas ng mga residente mula sa panganib na dala ng bagyo.', 'karaniwan', 6],
    ['Nagpasalamat nang labis-labis ang pulubi sa babaeng nagbigay sa kanya ng limos.', 'karaniwan', 6],
    ['Hinabol kanina ng mabangis na aso ng ating kapitbahay ang pinsan kong si $name1.', 'karaniwan', 6],
    ['Nagdiwang nang husto ang mga mamamayan matapos ang masaganang pag-aani ng palay.', 'karaniwan', 6],
    ['Nangangailangan ng malaking pondo at matinding pasensya ang pagpapatayo ng bahay.', 'karaniwan', 6],
    ['Nagtatawanan ang mga magkakaibigan habang ginugunita nila ang kanilang kabataan.', 'karaniwan', 6],
    ['Sina $name1 at $name2 ang bumili ng pagkain para sa aso natin noong isang linggo.', 'karaniwan', 6],
    ['Ipakikita ko sa iyo sa $araw ang kotseng binili ko kay $name2 sa mababang halaga.', 'karaniwan', 6],
    ['Mapagmalasakit at mapagkawanggawa ang dayuhang kapitbahay nina $name1 at $name2.', 'karaniwan', 6],
    ['Ikinuwento ni Aling $girl sa amin ang kanyang nakakatawang karanasan sa Amerika.', 'karaniwan', 6],
    ['Nagbabasa ng pahayagan si $name1 habang iniinom niya ang kanyang mainit na kape.', 'karaniwan', 6],
    ['Tuwang-tuwa si $name1 habang ipinagmamalaki niya ang mga larawan ng kanyang anak.', 'karaniwan', 6],
    ['Dadalawin nina $name1 at $name2 ang kanilang mga lolo at lola sa Batangas.', 'karaniwan', 6],
],
];
$banks = [$tier => []];
foreach ($tiers as $t) $banks[$tier] = array_merge($banks[$tier], $sourceBanks[$t]);
function ayos_question(array $entry, string $tier, string $lvl): array {
$arrnum = $entry[2];
//for people
$adjs[0][1]=array("mabait","mahusay","masipag","matalino","matapang","matipid","mayaman","tahimik",
	);
$adjs[1][1]=array("mabait","magalang","magaling","mahusay","mapagkaibigan","masayahin","masipag",
"masuwerte","matalino","matangkad","matapang","matipid","matulungin","mautak","mayaman","nakakatawa","tahimik",
	);
//for objects	
$adjs[0][2]=array("mababaw","madulas","mahaba","mainit","makinis","malabo","malaki","malalim","malambot","malamig","maliit","malinaw","mataas","matigas",
	);
$adjs[1][2]=array("mababaw","madulas","mahaba","mainit","magaspang","malabo","malaki","malalim","malambot","malamig","maliit","malinaw","makinis",
"makintab","mataas","matigas","matingkad"
	);

if ($arrnum<=3){$adj1s0=$adjs[0][1]; $adj2s0=$adjs[0][2];}
else{$adj1s0=$adjs[1][1];$adj2s0=$adjs[1][2];}

$count=count($adj1s0)-1;
$adj1=$adj1s0[(rand(0,$count))];
$count=count($adj2s0)-1;
do{$adj2=$adj2s0[(rand(0,$count))];} while($adj1==$adj2);
$adj1z=substr($adj1,-1); $adj2z=substr($adj2,-1);
$adj1b=$adj1." na";
$adj2b=$adj2." na";
if ($adj1z=="a" or $adj1z=="e" or $adj1z=="i" or $adj1z=="o" or $adj1z=="u"){$adj1b=$adj1."ng";}
if ($adj1z=="n"){$adj1b=$adj1."g";}
if ($adj2z=="a" or $adj2z=="e" or $adj2z=="i" or $adj2z=="o" or $adj2z=="u"){$adj2b=$adj2."ng";}
if ($adj2z=="n"){$adj2b=$adj2."g";} 


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

if ($arrnum<6){$grp=0;} else{$grp=1;}
$namecount=count($names[$grp])-1;
$name1=$names[$grp][(rand(0,$namecount))]; 
do{$name2=$names[$grp][(rand(0,$namecount))];} while ($name1==$name2);

	
$animals1=array(
"aso","baka","ibon","isda","itik","kabayo","manok","pusa","tuta",
);
$animals2=array(
"alakdan","bayawak","bubuli","buwaya","gagamba",
);
$count=count($animals1)-1;
$animal1=$animals1[(rand(0,$count))]; 
$count=count($animals2)-1;
$animal2=$animals2[(rand(0,$count))]; 

if ($arrnum<3){$items=array("aklat","baso","lapis","payong","tasa");}
else{$items=array("aklat","basahan","baso","kaldero","kawali","kulambo","lapis","martilyo","palanggana","pamaypay","payong","platito","tasa");}
$item=$items[(rand(0,(count($items)-1)))]; 
$itemb=$item." na"; 
if (substr($item,-1)=="a" or substr($item,-1)=="e" or substr($item,-1)=="i" or substr($item,-1)=="o" or substr($item,-1)=="u"){$itemb=$item."ng";}
if (substr($item,-1)=="n"){$itemb=$item."g";}

$araws=array("Lunes","Martes","Miyerkules","Huwebes","Biyernes","Sabado","Linggo");
$araw=$araws[(rand(0,(count($araws)-1)))]; 

$fruits=array("atis","bayabas","duhat","langka","lansones","mangga","papaya","saging","santol",);
$fruit=$fruits[(rand(0,(count($fruits)-1)))]; 

 
 
$girls = ['Anna','Maria','Julia','Sofia','Elisa','Grace'];
$girl = $girls[array_rand($girls)];
$sentence = strtr($entry[0], ['$name1'=>$name1, '$name2'=>$name2, '$adj1b'=>$adj1b, '$adj2b'=>$adj2b, '$animal1'=>$animal1, '$animal2'=>$animal2, '$itemb'=>$itemb, '$item'=>$item, '$araw'=>$araw, '$fruit'=>$fruit, '$girl'=>$girl]);
return ['word'=>ayos_h($sentence), 'correct'=>$entry[1], 'choices'=>['karaniwan','di-karaniwan'], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = ayos_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Ayos ng Pangungusap: <span style="color:#CC0066;"><?php echo ayos_h(ucfirst($cur['correct'])); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:40px auto;max-width:450px;">Sabihin kung ang ayos ng pangungusap sa itaas ay karaniwan o di-karaniwan.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo ayos_h(ucfirst($choice)); ?>
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
