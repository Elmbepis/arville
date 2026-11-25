<?php
// filipino/modules/pangungusap-bahagi.php
// Seven grade-dependent sentence-template banks.

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
$moduleTitle = 'Simuno at Panaguri ng Pangungusap';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pbah_tier(string $lvl, int $grd): int {
    return ($grd <= 1 ? 1 : ($grd <= 3 ? 2 : ($grd <= 5 ? 3 : ($grd <= 7 ? 4 : 5)))) + ($lvl === 'Hard' ? ($grd <= 1 ? 1 : 2) : 0);
}
function pbah_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
1 => [
    ['*Si $name1+ ay nasa $place.', 'simuno'],
    ['*Si $name1+ ay $adj1.', 'simuno'],
    ['Mabait na bata *si $name1+.', 'simuno'],
    ['*Si $name1+ ay maganda.', 'simuno'],
    ['*Ang aso+ ay mabagsik.', 'simuno'],
    ['*Ang bulaklak+ ay mabango.', 'simuno'],
    ['*Ang daan+ ay mabato.', 'simuno'],
    ['*Ang bata+ ay masipag.', 'simuno'],
    ['*Kami+ ay sasakay sa dyip.', 'simuno'],
    ['*Si $name1+ ay mahilig maglaro.', 'simuno'],
    ['*Ako+ ay mag-aaral mamaya.', 'simuno'],
    ['*Kami+ ay naglaro ng habulan.', 'simuno'],
    ['Kumain agad *ang mga bata+.', 'simuno'],
    ['Nagbasa *ako+ ng aklat.', 'simuno'],
    ['Ngumiti *siya+ sa akin.', 'simuno'],
    ['Si $name1 *ay nasa $place+.', 'panaguri'],
    ['Si $name1 *ay $adj1+.', 'panaguri'],
    ['Si $name1 *ay nagtago rito+.', 'panaguri'],
    ['*Magaling+ ang mang-aawit.', 'panaguri'],
    ['*Malakas+ ang boses ko.', 'panaguri'],
    ['Ang buhay dito *ay payapa+.', 'panaguri'],
    ['*Malayo+ ang lugar na iyon.', 'panaguri'],
    ['*Makapal+ ang kumot na ito.', 'panaguri'],
    ['*Mahusay gumuhit+ si $name1.', 'panaguri'],
    ['*Maganda+ ang kantang iyan.', 'panaguri'],
    ['Kami *ay may dalang ulam+.', 'panaguri'],
    ['Ako *ay nagbasa kanina+.', 'panaguri'],
    ['Siya *ay bibili ng $item+.', 'panaguri'],
    ['Sila *ay pupunta sa $place+.', 'panaguri'],
    ['*Kumain ng puto+ si $name1.', 'panaguri'],
    ['*Nabali+ ang lapis niya.', 'panaguri'],
    ['Ang bahay nila *ay malinis+.', 'panaguri'],
    ['Ang ibon *ay uminom doon+.', 'panaguri'],
],
2 => [
    ['*Si $name1+ ay madalas pumunta rito.', 'simuno'],
    ['Matatagpuan sa $place *si $name1+.', 'simuno'],
    ['*Sila+ ay nakinig sa manggagamot.', 'simuno'],
    ['*Ang anak niya+ ay napakatangkad.', 'simuno'],
    ['*Ang mga bata+ ay nasa labas ng bahay.', 'simuno'],
    ['Pumasok nang maaga *si $name1+.', 'simuno'],
    ['*Sila+ ay namasyal sa dalampasigan.', 'simuno'],
    ['Itim na itim *ang buhok ni $name1+.', 'simuno'],
    ['Kumuha *si $name1+ ng gamit sa bodega.', 'simuno'],
    ['Nakahiga *ang sanggol+ sa lumang kama.', 'simuno'],
    ['Natutulog sa ilalim ng silya *ang pusa+.', 'simuno'],
    ['Nahulog sa ilog *ang kanyang tsinelas+.', 'simuno'],
    ['*Si $name1+ ay pupunta sa $place mamaya.', 'simuno'],
    ['Piniritong manok *ang ulam ko kanina+.', 'simuno'],
    ['Si $boy *ay hindi ko nakita kagabi+.', 'panaguri'],
    ['*Sa $place matatagpuan+ si $name1.', 'panaguri'],
    ['*Dumalo sa pulong+ ang mga tao.', 'panaguri'],
    ['*Naghintay nang matagal+ ang mga bata.', 'panaguri'],
    ['*Masaya+ ang laro ng magkakapatid.', 'panaguri'],
    ['Ang lumang sapatos niya *ay matibay+.', 'panaguri'],
    ['Si $name1 *ay isang matiyagang bata+.', 'panaguri'],
    ['Ang nanay ko *ay palaging nasa hardin+.', 'panaguri'],
    ['Si Kuya $boy *ay masipag at matalino+.', 'panaguri'],
    ['*Sinigang+ ang paborito naming ulam.', 'panaguri'],
    ['*Pagbabasketbol+ ang kanyang libangan.', 'panaguri'],
    ['*Binigyan ng magandang damit+ si $girl.', 'panaguri'],
    ['Ang babae *ay mahusay maglala ng banig+.', 'panaguri'],
    ['*Namalengke at nagluto+ si Ate $girl.', 'panaguri'],
    ['*Mataas+ ang nilipad ng eroplanong iyon.', 'panaguri'],
    ['Si $name1 *ay pupunta sa $place mamaya+.', 'panaguri'],
],
3 => [
    ['Nagluluto ng tinolang manok *si Ate Mila+.', 'simuno'],
    ['*Si $name1+ ay binigyan ni $name2 ng $item kahapon.', 'simuno'],
    ['Bumili *si $name1+ ng $item kay $name2 kanina.', 'simuno'],
    ['Masayang sumalubong sa kanilang ama *ang mga bata+.', 'simuno'],
    ['Bantog sa pakikipagsapalaran *ang mga Pilipino+.', 'simuno'],
    ['*Ang mga balita+ ay sinipi nila sa pahayagan.', 'simuno'],
    ['*Si $name1+ ay kumakanta na sa entablado ngayon.', 'simuno'],
    ['*Si $name1+ ay nagpapagupit ng kanyang buhok.', 'simuno'],
    ['*Sila+ ay mamamasyal sa isang napakagandang parke.', 'simuno'],
    ['*Si Nanay+ ay pupunta sa palengke bukas ng umaga.', 'simuno'],
    ['*Ang itim na pusa+ ay natutulog sa ilalim ng mesa.', 'simuno'],
    ['*Sina $name1 at $name2+ ang mga bago kong kaibigan.', 'simuno'],
    ['*Si Dr. $girl Del Mundo+ ay mahusay na manggagamot.', 'simuno'],
    ['Magsasaing *ako+ sa kusina pagkatapos ko maglaba.', 'simuno'],
    ['Si $name1 *ay binigyan ni $name2+ ng $item kahapon.', 'panaguri'],
    ['*Humingi+ si $name1 *ng $item+ kay $name2 kanina.', 'panaguri'],
    ['Si $name1 *ay nangangarap na maging manggagamot+.', 'panaguri'],
    ['Kaming lahat *ay maglalakad papunta sa simbahan+.', 'panaguri'],
    ['Ang mga bata sa ampunan *ay umawit at sumayaw+.', 'panaguri'],
    ['Ang guro *ay matiyagang nagpaliwanag ng aralin+.', 'panaguri'],
    ['*Mabilis na tumawid ng kalye+ ang matabang lalaki.', 'panaguri'],
    ['Ang mga bata *ay masayang nagtampisaw sa baha+.', 'panaguri'],
    ['*Sumusunod sa mga alituntunin+ ang mga mag-aaral.', 'panaguri'],
    ['*Gumuhit ng sampung larawan+ ang kanyang pinsan.', 'panaguri'],
    ['*Nagsusulat ng mga kuwento+ ang kanyang pamangkin.', 'panaguri'],
    ['*Daragdagan ni Tatay ng piso+ ang baon ko bukas.', 'panaguri'],
],
4 => [
    ['*Si $name1+ ay nangakong magbibigay ng mga $item kay $name2.', 'simuno'],
    ['Nagpadala *si $name1+ ng mga $item kay $name2 para ibenta.', 'simuno'],
    ['Nahalal bilang pangulo ng aming organisasyon *si $name1+.', 'simuno'],
    ['Mahilig kumain ng sari-saring gulay at prutas *si $name1+.', 'simuno'],
    ['Sasali sa palatuntunan sa aming paaralan *ang aming pangkat+.', 'simuno'],
    ['*Sina $name1 at $name2+ ay naglalaro ng basketbol sa parke.', 'simuno'],
    ['*Ang mga prutas at gulay+ ay itinitinda niya sa palengke.', 'simuno'],
    ['Nakaparada sa harap ng tindahan *ang kotse ni Mang Tony+.', 'simuno'],
    ['Masipag mag-aral ng kanyang mga aralin gabi-gabi *si $name1+.', 'simuno'],
    ['Sa sala nagbabasa *si $name1+ ng kanyang paboritong pahayagan.', 'simuno'],
    ['*Ang paninigarilyo+ ay nakapagdudulot ng sakit sa puso at baga.', 'simuno'],
    ['Narinig ni $name1 *ang ingay ng mga sasakyan+ sa labas kanina.', 'simuno'],
    ['Si Itay *ang maghahatid kina $name1 at $name2+ sa paliparan.', 'panaguri'],
    ['*Nag-alay ng mga bulaklak sa altar+ sina $name1 at $name2.', 'panaguri'],
    ['Ang babaeng nakadilaw na damit ay *nagbebenta ng kutsinta+.', 'panaguri'],
    ['*Madaling napagod sa paglalaro+ ang mga bata sa plaza.', 'panaguri'],
    ['Ang lumang aklat *ay ipinakuha niya+ sa nakababatang kapatid.', 'panaguri'],
    ['Ang mga kalahok sa paligsahang iyon *ay naghahanda na+.', 'panaguri'],
    ['Ang pagkukumpuni ng sirang makina *ay madali para kay $name1+.', 'panaguri'],
    ['Ang mga tanong ng doktor *ay sinagot ng matamlay na pasyente+.', 'panaguri'],
    ['*Isang malaking responsibilidad+ ang pag-alaga ng anumang hayop.', 'panaguri'],
    ['Magiliw na *sinalubong ni $name1+ ang mga bisita nila kahapon.', 'panaguri'],
    ['Si $name1 ay naghahanda *ng masarap na almusal+ sa kusina.', 'panaguri'],
    ['Ang mga magsasaka *ay kanina pa nagtatanim ng palay+ sa bukid.', 'panaguri'],
    ['*Maaaring gumanda+ ang buhay ni $name1 kung siya ay mag-aaral.', 'panaguri'],
    ['*Ihahanda ko na mamaya+ ang mga kasangkapang gagamitin natin.', 'panaguri'],
],
5 => [
    ['*Ang koro ng simbahan+ ay mahusay umawit ng mga kantang katutubo.', 'simuno'],
    ['*Ang kanyang mga anak+ ay nagtutulong-tulong sa mga gawaing-bahay.', 'simuno'],
    ['Nagsaliksik nang maigi *si $name1+ tungkol sa buhay ni Jose Rizal.', 'simuno'],
    ['Mas makakaiwas sa mga nakakahawang sakit *ang mga sanggol na binakunahan+.', 'simuno'],
    ['Maagang nagising *si $name1+ dahil sa malakas na tilaok ng manok.', 'simuno'],
    ['Binuksan niya *ang pinto at mga bintana+ ng kanilang sala kanina.', 'simuno'],
    ['Ang *dalawang binatilyo+ ay nagpaalam sa kanilang mga magulang kagabi.', 'simuno'],
    ['Ang kanyang *bunsong kapatid+ ay tinulungan niyang magbuhat ng bayong.', 'simuno'],
    ['Isinulat ko sa papel kahapon *ang lahat ng mga+ dapat mong gawin.', 'simuno'],
    ['Binabasahan ni $name1 ng kuwento *ang kanyang anak+ tuwing gabi.', 'simuno'],
    ['Naglalaro ng basketbol *ang kanyang mga kasama+ habang sila\'y naghihintay.', 'simuno'],
    ['*Nilagdaan ko kaagad+ ang mga papeles na iniwan mo sa aking opisina.', 'panaguri'],
    ['*Nagpatingin kahapon+ ang aking lola sa isang kilalang manggagamot.', 'panaguri'],
    ['Si $name1 *ay binigyan ni $name2+ ng $item noong nakaraang $araw.', 'panaguri'],
    ['*Humiling+ si $name1 *ng $item+ mula kay $name2 noong nagkita sila.', 'panaguri'],
    ['Si $name1 *ay pinadalhan ni $name2+ ng $item noong nakaraang $araw.', 'panaguri'],
    ['*Bumili+ si $name1 *ng $item+ noong $araw upang ibigay kay $name2 bukas.', 'panaguri'],
    ['Ang bawat kasapi ng aming samahan *ay nag-ambag ng oras, pawis, at talino+.', 'panaguri'],
    ['*Hindi pa dalubhasa sa gawaing iyon+ ang kanyang katrabaho sa opisina.', 'panaguri'],
    ['*Iniwasan ng mga kaibigan ni $name1+ ang mapanuring imbestigador na iyon.', 'panaguri'],
    ['Si $name1 ay *mahilig makipagtalo+ sa kinaiinisan niyang kamag-aral.', 'panaguri'],
    ['*Matagal nang nagluluto+ si $name1 ng ulam para kay $name2 tuwing tanghali.', 'panaguri'],
    ['Si Ate $girl ay laging *nagtitinda ng iba\'t ibang kakanin+ sa $place.', 'panaguri'],
],
6 => [
    ['Mabilis at ligtas na nakalayo sa nasusunog na gusali *ang mga bata at matanda+.', 'simuno'],
    ['Tumulong *sila+ sa paglikas ng mga residente mula sa panganib na dala ng bagyo.', 'simuno'],
    ['Nagpasalamat nang labis-labis *ang pulubi+ sa babaeng nagbigay sa kanya ng limos.', 'simuno'],
    ['Hinabol kanina ng mabangis na aso ng ating kapitbahay *ang pinsan kong si $name1+.', 'simuno'],
    ['Nagdiwang nang husto *ang mga mamamayan+ matapos ang masaganang pag-aani ng palay.', 'simuno'],
    ['Nangangailangan ng malaking pondo at matinding pasensya *ang pagpapatayo ng bahay+.', 'simuno'],
    ['*Ang mga magulang ng mga mag-aaral+ ay inanyayahang dumalo sa gaganaping pagtatanghal.', 'simuno'],
    ['*Ang buong klase ni Bb. $girl Cruz+ ay magkakaroon ng lakbay-aral sa museo ng lungsod.', 'simuno'],
    ['Nararamdaman ko *ang malamig na simoy ng hangin+ na humahampas sa aking mukha.', 'simuno'],
    ['Ang mahiyaing *kuting ng kapitbahay+ ay nagtatago sa likod ng kanilang aparador.', 'simuno'],
    ['Nagtatawanan *ang mga magkakaibigan+ habang ginugunita nila ang kanilang kabataan.', 'simuno'],
    ['Ang bagong *eksperimento ni $name1+ ay gagawin na sa laboratoryo mamayang gabi.', 'simuno'],
    ['Sina $name1 at $name2 *ang bumili ng pagkain+ para sa aso natin noong isang linggo.', 'panaguri'],
    ['Ipakikita ko sa\'yo sa $araw *ang kotseng binili ko+ kay $name2 sa mababang halaga.', 'simuno'],
    ['Masayang nanood *ng kanilang paboritong palabas+ ang mga kapatid ni $name1.', 'panaguri'],
    ['*Masipag at matiyagang mag-aral+ ang pinakamatalinong mag-aaral sa klaseng iyon.', 'panaguri'],
    ['Sina $name1 at $name2 *ay nautusang magdala ng mga $item+ sa opisina bukas.', 'panaguri'],
    ['*Hinikayat nilang sumali+ ang mga dayuhang turista sa pagsasayaw sa parada ng pista.', 'panaguri'],
    ['*Nagpaalam na sa akin+ si $name1 dahil siya ay aalis na papuntang ibang bansa.', 'panaguri'],
    ['*Tiyak na matutuwa+ ang matalik na kaibigan mong si $name1 sa sorpresang iyan.', 'panaguri'],
    ['*Mapagmalasakit at mapagkawanggawa+ ang dayuhang kapitbahay nina $name1 at $name2.', 'panaguri'],
    ['Kami ay *nagmadaling umuwi+ dahil inakala naming may babagsak na malakas na ulan.', 'panaguri'],
    ['Ikinuwento *ni Aling $girl sa amin+ ang kanyang nakakatawang karanasan sa Amerika.', 'panaguri'],
    ['Ang mga alagang aso ni $name1 ay masayang *naghahabulan sa bakuran+ ngayon.', 'panaguri'],
    ['Ang mga pamangkin ni $name1 ay nanood ng *palabas na \'Star Wars\'+ sa telebisyon.', 'panaguri'],
    ['Nagbabasa *ng pahayagan+ si $name1 habang iniinom niya ang kanyang mainit na kape.', 'panaguri'],
    ['*Tuwang-tuwa+ si $name1 habang ipinagmamalaki niya ang mga larawan ng kanyang anak.', 'panaguri'],
    ['Kami ay magbebenta ng *maraming lumang gamit+ sa gaganaping \'garage sale\' bukas.', 'panaguri'],
    ['Dadalawin *nina $name1 at $name2+ ang kanilang mga lolo at lola sa Batangas.', 'panaguri'],
],
7 => [
    ['Itinuturing na isa sa mga pinakamalalaking lungsod sa buong mundo *ang lungsod ng Tokyo+.', 'simuno'],
    ['Biglang pinara ng pulis *ang sinasakyan kong bus+ dahil mayroon itong nalabag na batas.', 'simuno'],
    ['Kilala *ang bahay ng pamilya Santos+ sa pagkakaroon ng napakagagarang dekorasyon tuwing Pasko.', 'simuno'],
    ['Malinaw na ipinaliwanag ng punong-guro sa mga magulang *ang mga bagong patakaran sa paaralan+.', 'simuno'],
    ['Nakatira *ang aking tiya+ sa isang subdibisyong malapit sa aking pinapasukang unibersidad.', 'simuno'],
    ['Naglunsad ng isang proyektong mangangalaga sa kapaligiran *ang kanyang matalik na kaibigan+.', 'simuno'],
    ['Naniniwala *ang mga mamamayang bumoto sa kanya+ na tutuparin niya ang kanyang mga pangako.', 'simuno'],
    ['Isinantabi muna ng dalawang pinuno *ang hidwaang naganap+ sa pagitan ng kanilang mga pangkat.', 'simuno'],
    ['Napagtagumpayan ni $name1 *ang mga dumaang hamon+ sa kanyang buhay kaya siya nakaahon sa karukhaan.', 'simuno'],
    ['Nagmistulang halimaw *si $name1+ kanina nang magalit siya sa dayuhang nang-api sa kanyang kapatid.', 'simuno'],
    ['Sa kasalukuyan ay sumasang-ayon pa rin *ang mga mamamayan+ sa panukala ng kanilang gobernador.', 'simuno'],
    ['Nakita ni $name1 *ang kanyang mga kaibigan+ sa labas ng paaralan noong nakaraang $araw.', 'simuno'],
    ['Nagkuwentuhan muna *ang mga guro+ sa gilid ng pasilyo bago sila pumasok sa silid-aralan.', 'simuno'],
    ['*Magandang asal+ ang paggamit ng \'po\' at \'opo\' sa pakikipag-usap sa mga nakatatanda sa iyo.', 'panaguri'],
    ['Ang mga mag-aaral ay *maagang gumising upang maumpisahan+ kaagad ang kanilang mahalagang proyekto.', 'panaguri'],
    ['Talagang *mahusay magpaliwanag ng mga konseptong+ may kinalaman sa teknolohiya si $name1.', 'panaguri'],
    ['Pinagkakitaan *ni $name1 noong isang linggo+ ang kanyang mga inaning gulay at prutas sa kabukiran.', 'panaguri'],
    ['Pinagkuwentuhan *na ng magpipinsan kagabi+ ang kanilang mga nakakatakot na karanasan sa sementeryo.', 'panaguri'],
    ['Tahimik na *ipinagdarasal ngayon ni $name1+ ang kaligtasan ng kanyang mga kapatid na nasa lalawigan.', 'panaguri'],
    ['Lumaktaw ang mga manggagawa sa *mga kahong nakaharang+ sa pintuan ng mahiwagang silid na iyon.', 'panaguri'],
    ['Pasasalamatan *ko bukas+ ang lahat ng mga taong tumulong sa akin upang makamit ko ang karangalang ito.', 'panaguri'],
    ['Mukhang *makakamit na ni $name1+ ang kanyang pinakamimithing pagkilala mula sa kanilang samahan.', 'panaguri'],
    ['Makaliligtas pa kaya ang ating bida *sa nakaambang panganib+ na dala ng kanyang mga kalaban?', 'panaguri'],
    ['Nananalasa na sa *kanilang lalawigan+ ang malakas na bagyo kaya hindi sila makalabas ng tahanan.', 'panaguri'],
    ['*Narito na lahat+ ang mga sangkap na gagamitin namin mamayang gabi sa pagluluto ng apritada.', 'panaguri'],
],
];
$boys = ['Adam', 'Adrian', 'Alex', 'Alexander', 'Andrew', 'Angelo', 'Austin', 'Benjamin', 'Brandon', 'Caleb', 'Cameron', 'Carlos', 'Carson', 'Carter', 'Charles', 'Christopher', 'Daniel', 'David', 'Diego', 'Dominic', 'Dylan', 'Elijah', 'Ethan', 'Gabriel', 'Hayden', 'Ian', 'Isaac', 'Isaiah', 'Jack', 'Jacob', 'Jaden', 'James', 'Jason', 'Jose', 'John', 'Jonathan', 'Joseph', 'Joshua', 'Juan', 'Julian', 'Justin', 'Kevin', 'Logan', 'Lucas', 'Luis', 'Luke', 'Matthew', 'Max', 'Michael', 'Nathan', 'Nicholas', 'Noah', 'Oliver', 'Owen', 'Parker', 'Robert', 'Ryan', 'Samuel', 'Sebastian', 'Thomas', 'Tristan', 'William'];
$girls = ['Alexandra', 'Alyssa', 'Amelia', 'Andrea', 'Anna', 'Ariana', 'Arianna', 'Bella', 'Brooke', 'Camille', 'Caroline', 'Chloe', 'Claire', 'Elizabeth', 'Emma', 'Eva', 'Evelyn', 'Gabriela', 'Grace', 'Hannah', 'Isabella', 'Jasmine', 'Jocelyn', 'Jolina', 'Julia', 'Katherine', 'Kylie', 'Lauren', 'Layla', 'Leah', 'Lillian', 'Lydia', 'Madeline', 'Maria', 'Mariah', 'Melanie', 'Mia', 'Naomi', 'Natalie', 'Olivia', 'Samantha', 'Sarah', 'Sofia', 'Sophia', 'Sophie', 'Stella', 'Tina', 'Victoria'];
$items = ['aklat', 'basahan', 'baso', 'kaldero', 'kawali', 'kulambo', 'lapis', 'maleta', 'martilyo', 'palanggana', 'pamaypay', 'payong', 'platito', 'tasa'];
$places = ['aplaya', 'bahay', 'bukid', 'hardin', 'palengke', 'simbahan', 'palaruan', 'paaralan'];
$araws = ['Lunes', 'Martes', 'Miyerkules', 'Huwebes', 'Biyernes', 'Sabado', 'Linggo'];
$adjs = [1 => ["mabait","mahusay","masipag","matalino","matapang","matapat","matipid","mayaman","tahimik"], 2 => ["mabait","magalang","magaling","mahinahon","mahusay","mapagkaibigan","masayahin","masipag","masuwerte","matalino","matangkad","matapang","matapat","matulungin","mautak","mayaman","nakakatawa","tahimik"]];
$tier = pbah_tier($lvl, $grd);
function pbah_question(array $entry, int $tier, string $lvl, int $grd, array $boys, array $girls, array $items, array $places, array $araws, array $adjs): array {
    shuffle($boys);
    $a = $adjs[$tier <= 3 ? 1 : 2];
    shuffle($a);
    $sentence = strtr($entry[0], ['$name1'=>$boys[0], '$name2'=>$boys[1], '$boy'=>$boys[0], '$girl'=>$girls[array_rand($girls)], '$item'=>$items[array_rand($items)], '$place'=>$places[array_rand($places)], '$araw'=>$araws[array_rand($araws)], '$adj1'=>$a[0], '$adj2'=>$a[1]]);
    $html = str_replace(['*','+'], ['<strong style="color:#CC0066;">','</strong>'], pbah_h($sentence));
    return ['word'=>$html,'correct'=>$entry[1],'choices'=>['simuno','panaguri'],'tier'=>$tier,'lvl'=>$lvl,'grade'=>$grd,'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && ($_SESSION[$sessionKey]['current']['grade'] ?? null) === $grd
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl || ($_SESSION[$sessionKey]['current']['grade'] ?? null) !== $grd)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pbah_question($banks[$tier][$i], $tier, $lvl, $grd, $boys, $girls, $items, $places, $araws, $adjs);
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <span style="color:#800080;font-weight:normal;">'<?php echo htmlspecialchars($result['clicked'], ENT_QUOTES, 'UTF-8'); ?>'</span>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <div style="text-align:center;margin:20px auto;">
        <span class="pbah-hug" style="display:inline-block !important;width:480px !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;text-align:center;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:wrap;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?><br/>
<span style="display:inline-block;margin-top:12px;font-weight:normal;">Sagot: <strong style="color:#CC0066;"><?php echo pbah_h(ucfirst($cur['correct'])); ?></strong></span>
		</span></div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span class="pbah-hug" style="display:inline-block !important;width:480px !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;text-align:center;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:wrap;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin kung sa aling bahagi ng pangungusap makikita ang mga salitang kulay pula.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:100%;max-width:340px;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pbah_h(ucfirst($choice)); ?>
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
<script>
(function () {
    function hugBoxes() {
        document.querySelectorAll('.pbah-hug').forEach(box => {
            box.style.setProperty('width', '480px', 'important');
            const original = box.getBoundingClientRect().width;
            const originalHeight = box.getBoundingClientRect().height;
            const walker = document.createTreeWalker(box, NodeFilter.SHOW_TEXT);
            const lines = new Map();
            const range = document.createRange();
            while (walker.nextNode()) {
                range.selectNodeContents(walker.currentNode);
                for (const r of range.getClientRects()) {
                    if (r.width < 0.1) continue;
                    const y = Math.round(r.top);
                    const line = lines.get(y) || {left:r.left,right:r.right};
                    line.left = Math.min(line.left,r.left);
                    line.right = Math.max(line.right,r.right);
                    lines.set(y,line);
                }
            }
            if (!lines.size) return;
            const css = getComputedStyle(box);
            const extra = ['paddingLeft','paddingRight','borderLeftWidth','borderRightWidth']
                .reduce((sum,key) => sum + parseFloat(css[key]),0);
            const width = Math.min(original, Math.ceil(Math.max(...Array.from(lines.values(), l => l.right-l.left)) + extra + 2));
            box.style.setProperty('width', width + 'px', 'important');
            if (box.getBoundingClientRect().height > originalHeight + 1) {
                box.style.setProperty('width', '480px', 'important');
            }
        });
    }
    hugBoxes();
    if (document.fonts) document.fonts.ready.then(hugBoxes);
    window.addEventListener('resize', hugBoxes);
})();
</script>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
