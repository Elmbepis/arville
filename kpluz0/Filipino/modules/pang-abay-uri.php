<?php
// filipino/modules/pang-abay-uri.php
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
$moduleTitle = 'Mga Uri ng Pang-abay';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
// Single difficulty; each legacy bank maps directly to its grade range.
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
$tier = (string)($grd <= 4 ? 1 : ($grd <= 6 ? 2 : ($grd <= 8 ? 3 : 4)));
function abay_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Dadalaw sa $place si $name1 *mamaya+.', 'pamanahon', 1],
    ['Siya ay pumunta *kagabi+ sa $place.', 'pamanahon', 1],
    ['*Sa $araw+ magkikita sina $name1 at $name2.', 'pamanahon', 1],
    ['Tutulungan ako ni $name1 *mamayang gabi+.', 'pamanahon', 1],
    ['Manonood kami ng sine *sa darating na Linggo+.', 'pamanahon', 1],
    ['*Araw-araw+ siyang nakikinig sa radyo.', 'pamanahon', 1],
    ['Aalis *mamaya+ ang bus na papuntang Bikol.', 'pamanahon', 1],
    ['Namalengke kami ni $name1 *kanina+.', 'pamanahon', 1],
    ['Hiniram ni $name1 ang diyaryo natin *kahapon+.', 'pamanahon', 1],
    ['*Sa Lunes+ gaganapin ang pulong ng mga guro.', 'pamanahon', 1],
    ['*Oras-oras+ niya akong tinatawagan sa opisina.', 'pamanahon', 1],
    ['*Kani-kanina+ lang ay hinahanap ka ni G. Ramos.', 'pamanahon', 1],
    ['*Madalas+ magtago ang batang iyan.', 'pamanahon', 1],
    ['Magtatrabaho ba si tatay sa opisina *ngayon+?', 'pamanahon', 1],
    ['*Madalas+ ko silang nasasalubong sa parke.', 'pamanahon', 1],
    ['Kaming lahat ay maagang natulog *kagabi+.', 'pamanahon', 1],
    ['Nakamit ni $name1 ang unang gantimpala *ngayon+.', 'pamanahon', 1],
    ['Nagbibisikleta ang mag-asawa *tuwing tag-init+.', 'pamanahon', 1],
    ['Sasama ako sa kanila sa Baguio *sa Abril+.', 'pamanahon', 1],
    ['Ang presyo ng langis ay tumataas *linggu-linggo+.', 'pamanahon', 1],
    ['Naglalaba ng mga damit si $name1 *araw-araw+.', 'pamanahon', 1],
    ['Nagkaroon kami ng maikling pagsusulit *kanina+.', 'pamanahon', 1],
    ['Nagsisimba ang aming pamilya *tuwing Linggo+.', 'pamanahon', 1],
    ['Umuuwi kami sa probinsiya *tuwing Sabado+.', 'pamanahon', 1],
    ['Masayang namasyal ang mag-ama *kahapon+.', 'pamanahon', 1],
    ['Hintayin mo lang at darating na siya *mamaya+.', 'pamanahon', 1],
    ['May dadaluhan kaming kasal *sa makalawa+.', 'pamanahon', 1],
    ['Nakasalubong namin si $name1 sa daan *kagabi+.', 'pamanahon', 1],
    ['Lumangoy si $name1 *sa malaking lawa+.', 'panlunan', 1],
    ['Nasalubong ko *sa labas+ ang magkakapatid.', 'panlunan', 1],
    ['Nagpapahinga *sa beranda+ sina lolo at lola.', 'panlunan', 1],
    ['Dahan-dahan kaming tumawid *sa lumang tulay+.', 'panlunan', 1],
    ['*Sa harap ng simbahan+ tayo magkita sa Linggo.', 'panlunan', 1],
    ['Susunduin ko si $name1 *sa istasyon ng bus+.', 'panlunan', 1],
    ['Umupo tayo *sa ilalim ng punong mangga+.', 'panlunan', 1],
    ['Halina at pumunta tayo *sa Manila Zoo+.', 'panlunan', 1],
    ['Ang magsasaka ay nakatira *sa kabukiran+.', 'panlunan', 1],
    ['Ang kotse ay nakaparada *sa loob ng garahe+.', 'panlunan', 1],
    ['Nanonood ng telebisyon *sa sala+ ang mga bata.', 'panlunan', 1],
    ['Nagluluto ng meryenda si nanay *sa kusina+.', 'panlunan', 1],
    ['*Sa ilalim ng kama+ natutulog ang pusa.', 'panlunan', 1],
    ['Bumili ka ng pansit na bihon *sa tindahan+.', 'panlunan', 1],
    ['Maraming tumatakbo *sa kalsada+ tuwing umaga.', 'panlunan', 1],
    ['Hanapin mo *sa globo+ ang bansang Tsina.', 'panlunan', 1],
    ['Nag-aani ang mga magsasaka *sa palayan+.', 'panlunan', 1],
    ['Nakita namin ang eroplano *sa himpapawid+.', 'panlunan', 1],
    ['May nabubuhay kaya *sa ibang planeta+?', 'panlunan', 1],
    ['Ang munting prinsesa ay *mahinhin+ kumilos.', 'pamaraan', 1],
    ['Ang bagong mag-aaral ay *malumanay+ magsalita.', 'pamaraan', 1],
    ['Ang operasyon ay *matagumpay+ na isinagawa.', 'pamaraan', 1],
    ['Ang sanggol ay *malambing+ na yumakap sa ina.', 'pamaraan', 1],
    ['*Dali-dali+ niyang kinain ang kanyang almusal.', 'pamaraan', 1],
    ['Gumagalaw *nang pataas+ ang elevator.', 'pamaraan', 1],
    ['Humihilik *nang malakas+ si $name1 sa gabi.', 'pamaraan', 1],
    ['Lumakad si $name1 *nang paliku-liko+.', 'pamaraan', 1],
    ['*Masarap+ magluto ng sinigang si $name1.', 'pamaraan', 1],
    ['*Masipag+ na nag-aaral ang mga kapatid ko.', 'pamaraan', 1],
    ['*Mahusay+ tumugtog ng biyulin si $name1.', 'pamaraan', 1],
    ['*Magalang+ niyang tinanggap ang mga panauhin.', 'pamaraan', 1],
    ['*Matiyagang+ naghintay ng tubig ang mga tao.', 'pamaraan', 1],
    ['Nalinisan *nang maigi+ ang sasakyan na ito.', 'pamaraan', 1],
    ['Naunawaan mo bang *mabuti+ ang aralin?', 'pamaraan', 1],
    ['Nagulat kami dahil *biglang+ bumukas ang pinto.', 'pamaraan', 1],
    ['Naglakad *nang nakayuko+ ang malungkot na binata.', 'pamaraan', 1],
    ['Nagmamaneho *nang maingat+ ang bagong drayber.', 'pamaraan', 1],
    ['*Pahiyaw+ niyang tinawag ang pangalan ng lalaki.', 'pamaraan', 1],
    ['Si $name1 ay *mahusay+ magdrowing ng mga tao.', 'pamaraan', 1],
    ['Si $name1 ay *masayang+ namamasyal sa bukid.', 'pamaraan', 1],
    ['Sinuot niya *nang baliktad+ ang kanyang damit.', 'pamaraan', 1],
    ['Sumagot *nang pasigaw+ ang tsuper ng dyip.', 'pamaraan', 1],
    ['*Tahimik+ na lumapit si $name1 kay $name2.', 'pamaraan', 1],
    ['*Taimtim+ na nanalangin ang mga tao sa kapilya.', 'pamaraan', 1],
    ['*Tiklop-tuhod+ siyang humingi ng tawad.', 'pamaraan', 1],
    ['Tumalon *nang mataas+ ang magkapatid.', 'pamaraan', 1],
    ['*Unti-unting+ lumalakas ang liwanag ng araw.', 'pamaraan', 1],
],
2 => [
    ['Nagkausap kami ni Nanay Fe sa telepono *kamakalawa+.', 'pamanahon', 2],
    ['Darating na *mamaya+ ang mga bata mula sa paaralan.', 'pamanahon', 2],
    ['Sabay kaming kumakain ng almusal *paminsan-minsan+.', 'pamanahon', 2],
    ['Nakita ko ang aking mga kaibigan sa paligsahan *kanina+.', 'pamanahon', 2],
    ['Dumating kami sa bahay nila *nang alas-otso ng gabi+.', 'pamanahon', 2],
    ['Tatawagan ko sila *sa Biyernes+ kung matutuloy kami.', 'pamanahon', 2],
    ['*Mamaya+ ay babatiin ko sila sa kanilang tahanan.', 'pamanahon', 2],
    ['Gaganapin na *bukas+ ang aming pagsusulit sa paaralan.', 'pamanahon', 2],
    ['Binabasa ni $name1 ang mga bagong aralin *gabi-gabi+.', 'pamanahon', 2],
    ['Si $name1 ay darating mula sa Cavite *sa makalawa+.', 'pamanahon', 2],
    ['Nakikita ko *paminsan-minsan+ ang mga dati kong kaklase.', 'pamanahon', 2],
    ['*Laging+ nakaabang sa pintuan ang alagang aso ni $name1.', 'pamanahon', 2],
    ['Ipinanganak si $name1 *noong ika-15 ng Setyembre+.', 'pamanahon', 2],
    ['Si $name1 ay nagtapos sa kolehiyo *kamakailan lamang+.', 'pamanahon', 2],
    ['Sina $name1 at $name2 ay nag-eehersisyo *araw-araw+.', 'pamanahon', 2],
    ['*Taun-taon+ ay sumasali kami sa paligsahan sa pagtakbo.', 'pamanahon', 2],
    ['Magsisimula na *bukas+ ang pagpapalista sa paligsahan.', 'pamanahon', 2],
    ['*Tuwing alas-singko ng umaga+ gumigising si $name1.', 'pamanahon', 2],
    ['Kailangan daw nating pumunta agad *sa $place+.', 'panlunan', 2],
    ['Hintayin mo *rito+ ang sundo mo mamayang hapon.', 'panlunan', 2],
    ['Sumisid *sa dagat+ ang mga anak ng mangingisda.', 'panlunan', 2],
    ['Nagbakasyon kami *sa Tagaytay+ noong Disyembre.', 'panlunan', 2],
    ['Dinala *sa ospital+ si Lolo dahil may sakit siya.', 'panlunan', 2],
    ['*Sa palengke+ ka makabibili ng mga sariwang gulay.', 'panlunan', 2],
    ['Nagdidilig ng mga halaman *sa hardin+ si $name1.', 'panlunan', 2],
    ['*Sa palasyong iyon+ tumitira ang pangulo ng Pilipinas.', 'panlunan', 2],
    ['Binili ni $name1 ang blusang ito *sa Divisoria+.', 'panlunan', 2],
    ['*Sa silid-aklatan+ ko sila nakitang nagsasaliksik.', 'panlunan', 2],
    ['Natutulog ang aso *sa ilalim ng kotseng nakaparada+.', 'panlunan', 2],
    ['Isinampay *sa bakuran+ ang mga damit na bagong laba.', 'panlunan', 2],
    ['Marahang tumawid ang matandang babae *sa kalsada+.', 'panlunan', 2],
    ['Huwag mong ilagay ang salamin *sa ibabaw ng aparador+.', 'panlunan', 2],
    ['*Sa istasyon ng pulis+ dinala ang dalawang magnanakaw.', 'panlunan', 2],
    ['Pupunta si Tatay *sa bangko+ para magdeposito ng pera.', 'panlunan', 2],
    ['Iniwan ko *sa ibabaw ng mesa+ ang mga aklat mo.', 'panlunan', 2],
    ['Maraming tao ang naghahanap ng trabaho *sa pabrika+.', 'panlunan', 2],
    ['Ang mga bata ay masayang naglalaro *sa palaruan+.', 'panlunan', 2],
    ['Unti-unting nauubos ang mga punongkahoy *sa bundok+.', 'panlunan', 2],
    ['Mas simple at tahimik ang buhay *sa probinsiya+.', 'panlunan', 2],
    ['Si $name1 ay naghahanda ng almusal *sa kusina+.', 'panlunan', 2],
    ['Tumungo *sa hapag-kainan+ ang buong mag-anak.', 'panlunan', 2],
    ['Nakita ni $name1 ang meryenda *sa ibabaw ng mesa+.', 'panlunan', 2],
    ['Si $name1 ay nagbabasa ng libro *sa ilalim ng puno+.', 'panlunan', 2],
    ['Ang hangin ay umihip *nang malakas+ sa karagatan.', 'pamaraan', 2],
    ['Ang mga kasangkapan ay *mabilis+ na pinunasan ni $name1.', 'pamaraan', 2],
    ['Ang mag-anak ko ay *tahimik+ na namumuhay sa probinsiya.', 'pamaraan', 2],
    ['Ang mga damit ay tiniklop ni $name1 *nang maayos+.', 'pamaraan', 2],
    ['Ang mga liham na iyan ay binasa niya *nang palihim+.', 'pamaraan', 2],
    ['Ang mga monghe ay *mapayapang+ naninirahan sa bundok.', 'pamaraan', 2],
    ['Ang diyanitor ay *nagmamadaling+ umakyat ng hagdan.', 'pamaraan', 2],
    ['Ang sanggol sa kuna ay natutulog *nang mahimbing+.', 'pamaraan', 2],
    ['Dahil sa galit, umakyat *nang padabog+ ang bata.', 'pamaraan', 2],
    ['*Dali-daling+ bumalik si $name1 sa kanyang tahanan.', 'pamaraan', 2],
    ['Hindi kita marinig dahil *mahina+ kang magsalita.', 'pamaraan', 2],
    ['Inialay niya *nang buong loob+ ang kanyang talino.', 'pamaraan', 2],
    ['*Isa-isa+ silang nag-alay ng bulaklak sa imahen.', 'pamaraan', 2],
    ['Kalayaan ang *taimtim+ na hinahangad ng mga tao.', 'pamaraan', 2],
    ['Kinausap niya *nang mahinahon+ ang makulit na bata.', 'pamaraan', 2],
    ['*Maingat+ niyang ibinalik ang alahas sa lalagyan nito.', 'pamaraan', 2],
    ['*Mabilisan+ nilang ibinaba ang mga kahon mula sa trak.', 'pamaraan', 2],
    ['*Matiyagang+ hinihintay ng mga bata ang kanilang ama.', 'pamaraan', 2],
    ['*Madali+ nilang nahanap ang lumang simbahan sa mapa.', 'pamaraan', 2],
    ['Niyakap ni $name1 *nang mahigpit+ ang kanyang kapatid.', 'pamaraan', 2],
    ['Nag-isip siya *nang malalim+ bago siya sumagot.', 'pamaraan', 2],
    ['*Pabulong+ magsalita ang bata dahil siya ay mahiyain.', 'pamaraan', 2],
    ['Si $name1 ay *padalus-dalos+ maglinis ng kanyang sapatos.', 'pamaraan', 2],
    ['Tinahi ni $name1 *nang mahusay+ ang mga bestida.', 'pamaraan', 2],
    ['Bumigat ako *nang limang libra+ noong isang buwan.', 'panggaano', 2],
    ['Nataasan ni $name1 *nang limang sentimetro+ si $name2.', 'panggaano', 2],
    ['Lumabis *nang tatlumpung minuto+ ang pagtatanghal nila.', 'panggaano', 2],
    ['Nagbakasyon kami *nang isang buwan+ sa Cebu.', 'panggaano', 2],
    ['Umapaw ang tubig sa tangke *nang limang balde+.', 'panggaano', 2],
],
3 => [
    ['Si $name1 ay nakatanggap ng imbitasyon mula kay $name2 *kahapon+.', 'pamanahon', 3],
    ['Ang pagtitipon na inaabangan ni $name1 ay magaganap *bukas+.', 'pamanahon', 3],
    ['Nagkita kami ni $name1 *noong kaarawan ni $name2+ sa Jollibee.', 'pamanahon', 3],
    ['Binibisita nila ang kanilang lolo at lola *buwan-buwan+.', 'pamanahon', 3],
    ['Nangako ang mga bata na tatawag sila sa telepono *bukas+.', 'pamanahon', 3],
    ['Ipinalabas *kagabi+ sa telebisyon ang pelikulang \'Superman\'.', 'pamanahon', 3],
    ['*Tuwing madaling-araw+ tumitilaok ang mga tandang ni Lolo.', 'pamanahon', 3],
    ['*Tuwing Sabado+ ay nagluluto si $name1 ng espesyal na meryenda.', 'pamanahon', 3],
    ['Ang mga senador ay nagpupulong sa gusaling iyan *sa kasalukuyan+.', 'pamanahon', 3],
    ['*Kailanma\'y+ hindi tayo pababayaan ng ating mga magulang.', 'pamanahon', 3],
    ['Ang paligsahan ay mag-uumpisa *nang alas-singko ng umaga+.', 'pamanahon', 3],
    ['Naliligo *araw-araw+ ang mga bata kaya lagi silang malinis.', 'pamanahon', 3],
    ['Pinulot ng mga bata ang mga prutas *sa ilalim ng puno+.', 'panlunan', 3],
    ['Nakita ko siyang bumili ng sabong panlaba *sa tindahan+.', 'panlunan', 3],
    ['*Sa karagatan+ makikita ang mga pawikan, dolpin, at balyena.', 'panlunan', 3],
    ['Ilagay natin ang mga plastik na bote *sa tamang basurahan+.', 'panlunan', 3],
    ['Si $name1 ay mabibigyan ng parangal *sa ating paaralan+.', 'panlunan', 3],
    ['Inilagay ko *sa loob ng kabinet+ ang mga pagkaing de-lata.', 'panlunan', 3],
    ['Sumasayaw ng tinikling *sa entablado+ ang pangkat ni $name1.', 'panlunan', 3],
    ['Bumili si $name1 ng gamot *sa botika+ para sa kanyang anak.', 'panlunan', 3],
    ['Tuwing hapon ay nagtitipon ang mga kalaro namin *sa palaruan+.', 'panlunan', 3],
    ['*Sa tabi ng aming paaralan+ kami naglalaro ng football.', 'panlunan', 3],
    ['Libangan ng kuya ko ang umakyat *sa bundok+ tuwing bakasyon.', 'panlunan', 3],
    ['Ang saranggola ni $name1 ay bumagsak *sa kabilang bakod+.', 'panlunan', 3],
    ['Nagtungo ang pamilya Reyes *sa Baguio+ upang magbakasyon.', 'panlunan', 3],
    ['*Sa gilid ng simbahan+ nila ipinarada ang kanilang dyip.', 'panlunan', 3],
    ['Ang mga mangingisda ay nagpapahinga *sa tabi ng dagat+.', 'panlunan', 3],
    ['Oo, *mahusay+ na ginagampanan ni $name1 ang kanyang tungkulin.', 'pamaraan', 3],
    ['*Dalus-dalos+ nilang ibinaba ang mga kahon mula sa trak.', 'pamaraan', 3],
    ['Ipinagtanggol nila *nang buong tapang+ ang ating kalayaan.', 'pamaraan', 3],
    ['Sinabi ni $name1 sa akin *nang pabulong+ ang sikreto niya.', 'pamaraan', 3],
    ['Ang hangin sa tabing-dagat ay umihip *nang napakalakas+.', 'pamaraan', 3],
    ['*Masayang+ nakipagkuwentuhan si Lolo Pedring sa kanyang mga apo.', 'pamaraan', 3],
    ['*Maingat+ na ibinalik niya ang mamahaling relo sa lalagyan nito.', 'pamaraan', 3],
    ['Sumigaw ang bata *nang malakas+ upang mapansin siya ng nanay niya.', 'pamaraan', 3],
    ['*Mahigpit+ na ipinagbabawal ang kumain sa loob ng silid-aklatan.', 'pamaraan', 3],
    ['Siya ang karterong *biglang+ hinabol ng aming mabangis na aso kanina.', 'pamaraan', 3],
    ['*Nakapilang+ lumabas sa silid na iyon ang mga mag-aaral.', 'pamaraan', 3],
    ['Humaba *nang apat na pulgada+ ang biniling tubo ni Tatay.', 'panggaano', 3],
    ['Nauna ako *nang isang oras+ sa tagpuan naming makakaibigan.', 'panggaano', 3],
    ['Nabawasan *nang sampung piso+ ang pambili ng kendi ni $name1.', 'panggaano', 3],
    ['Tumakbo *nang tatlong kilometro+ si $name1 mula sa simbahan.', 'panggaano', 3],
],
4 => [
    ['Nagtitipun-tipon ang buong mag-anak sa bahay nina Lolo at Lola *tuwing Noche Buena+.', 'pamanahon', 4],
    ['Hindi ka kasi nakikinig sa mga magulang mo kaya *parati+ kang sinasabihan.', 'pamanahon', 4],
    ['Ang mga bumbero ay darating sa lugar ng sunog *sa lalong madaling panahon+.', 'pamanahon', 4],
    ['*Tuwing bisperas ng Bagong Taon+, marami ang napipinsala ng mga paputok.', 'pamanahon', 4],
    ['Si $name1 ay isa sa mga unang natapos sa paligsahan *noong isang taon+.', 'pamanahon', 4],
    ['Nagbiyahe papuntang Australia ang kaibigan ko *noong nakaraang buwan+.', 'pamanahon', 4],
    ['*Noong unang panahon+, may alpabetong nilikha ang ating mga ninuno.', 'pamanahon', 4],
    ['*Laging+ binibigyan ng tinapay ni Aling Cely ang mga bata sa kalye.', 'pamanahon', 4],
    ['Ang kuya ko ang susundo sa akin at maghihintay daw siya *sa labas ng gate+.', 'panlunan', 4],
    ['Si $name1 ay pumunta *sa Canada+ para bisitahin ang kanyang mga kamag-anak.', 'panlunan', 4],
    ['Ang Pista ng Pahiyas ay ipinagdiriwang tuwing Mayo *sa bayan ng Lucban, Quezon+.', 'panlunan', 4],
    ['Si $name1 ay nagtatrabaho bilang nars *sa isang pampublikong ospital+.', 'panlunan', 4],
    ['Ang paninigarilyo ay mahigpit na ipinagbabawal *sa loob ng gusaling ito+.', 'panlunan', 4],
    ['Nag-aaral *sa Unibersidad ng Santo Tomas+ ang panganay na anak ni $name1.', 'panlunan', 4],
    ['Inihatid namin *sa Philippine General Hospital+ si $name1 kahapon.', 'panlunan', 4],
    ['Sa isang linggo ay pupunta kami *sa Cebu+ upang bisitahin ang mga lolo at lola ko.', 'panlunan', 4],
    ['Tuwing hapon ay nagtutungo kami *sa ilalim ng puno+ para maglaro ng taguan.', 'panlunan', 4],
    ['Dinala namin *sa klinika ng beterinaryo+ ang aso naming may sakit.', 'panlunan', 4],
    ['Uuwi na si Tatay mula sa Singapore at susunduin namin siya *sa paliparan+.', 'panlunan', 4],
    ['Pumunta muna si $name1 *sa bahay ni $name2+ dahil may hinihiram siyang aklat.', 'panlunan', 4],
    ['Nakatira ang lolo at lola nila *sa isang subdibisyon sa barangay ng San Martin+.', 'panlunan', 4],
    ['Ang mga apo ni $name1 ay *magalang+ na nakikipag-usap sa mga panauhin.', 'pamaraan', 4],
    ['*Tuwang-tuwang+ ipinakita ni $name1 sa kanyang mga kaibigan ang mga larawan ng kanyang anak.', 'pamaraan', 4],
    ['Ang pulubi ay *dagliang+ nagpasalamat sa babaeng nagbigay sa kanya ng limos.', 'pamaraan', 4],
    ['*Malinaw+ na ipinaliwanag ng punong-guro ang mga patakaran sa paaralan.', 'pamaraan', 4],
    ['Ikinuwento niya sa korte ang buong pangyayari *nang walang alinlangan+.', 'pamaraan', 4],
    ['*Matiyagang+ pinapaputi niya ang mga uniporme ng kanyang mga anak.', 'pamaraan', 4],
    ['*Masigasig+ nilang ibinalot ang mga pagkain para sa mga nasalanta.', 'pamaraan', 4],
    ['*Mabilis+ na nailabas ni $name1 ang mga gamit sa nasusunog na bahay.', 'pamaraan', 4],
    ['Ang sinasakyan kong dyip ay *biglang+ pinara ng pulis dahil hindi ito huminto sa tamang lugar.', 'pamaraan', 4],
    ['*Pabulong+ na sinabi ni $name1 sa kanyang ina na nagugutom na siya.', 'pamaraan', 4],
    ['Tiniyak ni $name1 na *agarang+ lilinisin ng diyanitor ang maruming silid.', 'pamaraan', 4],
    ['*Matiyagang+ isinaulo ni $name1 ang mahabang tula para sa paligsahan ng pagbigkas.', 'pamaraan', 4],
    ['Marami siyang nakain mula kahapon kaya bumigat siya *nang tatlong libra+.', 'panggaano', 4],
    ['Tumubo si Aling Mumay *nang limampung piso+ sa tinda niyang tinapay.', 'panggaano', 4],
    ['Gumaan si $name1 *nang walong libra+ mula nang siya ay mag-ehersisyo.', 'panggaano', 4],
    ['Naglakad kami *nang isang kilometro+ mula sa bahay patungong sakayan.', 'panggaano', 4],
    ['Nagkamping *nang dalawang araw+ ang magkakaklase sa Maria Makiling.', 'panggaano', 4],
],
];
$banks = $sourceBanks;
function abay_question(array $entry, string $tier, string $lvl): array {
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
$places = ['aplaya','bahay','bukid','hardin','palengke','simbahan','tabing-ilog'];
$araws = ['Lunes','Martes','Miyerkules','Huwebes','Biyernes','Sabado','Linggo'];
$sentence = strtr($entry[0], ['$name1'=>$name1, '$name2'=>$name2, '$place'=>$places[array_rand($places)], '$araw'=>$araws[array_rand($araws)]]);
if (!preg_match('/^(.*?)\*(.*?)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
$choices = ['pamanahon','panlunan','pamaraan','panggaano'];
shuffle($choices);
$explanations = ['pamanahon'=>'nagsasaad ng panahon o dalas ng kilos','panlunan'=>'nagsasaad ng lugar na pinangyarihan o patutunguhan ng kilos','pamaraan'=>'nagsasaad ng paraan ng pagsasagawa ng kilos','panggaano'=>'nagsasaad ng sukat, dami o tagal ng kilos'];
return ['word'=>abay_h($m[1].$m[2].$m[3]), 'highlight'=>abay_h($m[1]).'<strong style="color:#CC0066;">'.abay_h($m[2]).'</strong>'.abay_h($m[3]), 'target'=>$m[2], 'exp'=>$explanations[$entry[1]], 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    foreach ($available as $idx) $byCategory[$banks[$tier][$idx][1]][] = $idx;
    $category = array_rand($byCategory);
    $i = $byCategory[$category][array_rand($byCategory[$category])];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = abay_question($banks[$tier][$i], $tier, $lvl);
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
        <strong>Uri ng Pang-abay: <span style="color:#CC0066;"><?php echo abay_h(ucfirst($cur['correct'])); ?></span></strong>
        <p style="font-weight:400;"><br/>Ang <?php echo strpos($cur['target'], ' ') !== false ? 'pariralang' : 'salitang'; ?> <strong style="color:#CC0066;"><?php echo abay_h($cur['target']); ?></strong> ay pang-abay na <?php echo abay_h($cur['correct']); ?> dahil ito ay <?php echo abay_h($cur['exp']); ?>.</p>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['highlight']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Piliin ang uri ng pang-abay na kulay pula sa pangungusap.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo abay_h(ucfirst($choice)); ?>
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
