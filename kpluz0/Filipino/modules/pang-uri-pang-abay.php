<?php
// filipino/modules/pang-uri-pang-abay.php
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
$moduleTitle = 'Pang-uri o Pang-abay?';
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
function pua_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Si $name1 ay *mabilis+.', 'pang-uri', 1],
    ['*Magaling+ pala ang mang-aawit.', 'pang-uri', 1],
    ['*Mataas+ ang lipad ng ibong iyon.', 'pang-uri', 1],
    ['*Malakas+ ang sigaw ng pulis.', 'pang-uri', 1],
    ['*Masaya+ ang laro ng magkakapatid.', 'pang-uri', 1],
    ['Si $name1 ay isang *matalinong+ tao.', 'pang-uri', 1],
    ['Ang buhay sa nayong ito ay *payapa+.', 'pang-uri', 1],
    ['Mayroon ka bang *makapal+ na kumot?', 'pang-uri', 1],
    ['Ang lumang sapatos niya ay *matibay+.', 'pang-uri', 1],
    ['*Malayo+ ang lugar na pupuntahan nila.', 'pang-uri', 1],
    ['Nakahiga ang sanggol sa *lumang+ kama.', 'pang-uri', 1],
    ['Si $name1 ay isang *malusog+ na bata.', 'pang-uri', 1],
    ['Siya ay *mabilis+ tumakbo.', 'pang-abay', 1],
    ['*Magaling+ siyang umawit.', 'pang-abay', 1],
    ['*Matabang+ siya magtimpla ng kape.', 'pang-abay', 1],
    ['Lumipad nang *mataas+ ang ibon.', 'pang-abay', 1],
    ['*Mahusay+ magtrabaho si $name1.', 'pang-abay', 1],
    ['Si $name1 ay *maingat+ magmaneho.', 'pang-abay', 1],
    ['Natulog nang *matagal+ ang sanggol.', 'pang-abay', 1],
    ['Sumigaw nang *malakas+ ang pulis.', 'pang-abay', 1],
    ['Magsipilyo ka *bago ka matulog+.', 'pang-abay', 1],
    ['*Mahimbing+ na natutulog si $name1.', 'pang-abay', 1],
    ['*Maganang+ kumain si $name1.', 'pang-abay', 1],
    ['Matao sa bahay namin *kanina+.', 'pang-abay', 1],
    ['Malamig ang simoy ng hangin *kagabi+.', 'pang-abay', 1],
],
2 => [
    ['Siya ay isang *mahusay+ na pintor.', 'pang-uri', 2],
    ['Ang kapeng tinimpla niya ay *matabang+.', 'pang-uri', 2],
    ['*Maingat+ si $name1 habang nagmamaneho.', 'pang-uri', 2],
    ['Ang paglangoy ay *madali+ para kay $name1.', 'pang-uri', 2],
    ['Ang tumatakbong kabayong itim ay *matulin+.', 'pang-uri', 2],
    ['*Masigla+ ang mga tao tuwing piyesta.', 'pang-uri', 2],
    ['Ibigay mo ang *makapal+ na aklat kay $name1.', 'pang-uri', 2],
    ['*Bukod-tangi+ ang talento ni Juan Luna.', 'pang-uri', 2],
    ['Huwag kayong pumunta sa lugar na *mapanganib+.', 'pang-uri', 2],
    ['Ang bahay nina $name1 ay *malayo+ sa paaralan.', 'pang-uri', 2],
    ['*Malamig+ na tubig ba ang gusto mong inumin?', 'pang-uri', 2],
    ['Ang mga alagang hayop ni $name1 ay *malulusog+.', 'pang-uri', 2],
    ['Ang karamdaman ngayon ni $name1 ay *maselan+.', 'pang-uri', 2],
    ['May kilala ka bang mananahing *mahusay+?', 'pang-uri', 2],
    ['Ang mga kalye sa dakong iyon ay *makipot+.', 'pang-uri', 2],
    ['Si $name1 ay talagang *mahusay+ magpinta.', 'pang-abay', 2],
    ['*Masayang+ naglalaro ang magkakapatid.', 'pang-abay', 2],
    ['*Matulin+ tumakbo ang kabayong puti.', 'pang-abay', 2],
    ['Tumakbo nang *mabilis+ ang itim na aso.', 'pang-abay', 2],
    ['Nahuli rin *sa wakas+ ang malaking buwaya!', 'pang-abay', 2],
    ['Tutulungan ako ni $name1 *mamayang gabi+.', 'pang-abay', 2],
    ['*Maagang+ dumarating ang sundo ni Sonny.', 'pang-abay', 2],
    ['Ang mangingisda ay sumisid nang *malalim+.', 'pang-abay', 2],
    ['*Masiglang+ sumasayaw ang mga tao sa piyesta.', 'pang-abay', 2],
    ['Nilinis kong *maigi+ ang sasakyan ninyo.', 'pang-abay', 2],
    ['Nagluluto ng hapunan si Nanay *sa kusina+.', 'pang-abay', 2],
    ['*Sa ibabaw ng silya+ natutulog ang pusa.', 'pang-abay', 2],
    ['Umuuwi kami sa Cavite *tuwing Biyernes+.', 'pang-abay', 2],
    ['Masayang namasyal si $name1 *kahapon+.', 'pang-abay', 2],
    ['Mahihintay mo ba ang pagdating niya *mamaya+?', 'pang-abay', 2],
],
3 => [
    ['Ang alagang kabayo ni $name1 ay talagang *matikas+.', 'pang-uri', 3],
    ['*Maayos+ ang pila ng mga deboto sa prusisyon.', 'pang-uri', 3],
    ['Ang tirahan ng mga katutubo sa kagubatan ay *mapayapa+.', 'pang-uri', 3],
    ['Ang pagmamahal niya sa kanyang inang-bayan ay *wagas+.', 'pang-uri', 3],
    ['*Mahigpit+ ang yakap ng ina sa kanyang mga anak.', 'pang-uri', 3],
    ['*Matagal+ ang pagtalakay ng isyung ito sa senado.', 'pang-uri', 3],
    ['Ang pasasalamat ng naulilang bata ay *mataimtim+.', 'pang-uri', 3],
    ['Ang sabi nila ay *masigla+ ang pagdiriwang ninyo kagabi.', 'pang-uri', 3],
    ['Talagang *mataas+ ang presyon ng dugo ni $name1 kahapon.', 'pang-uri', 3],
    ['*Malakas+ ang ihip ng hangin doon sa dalampasigan.', 'pang-uri', 3],
    ['Aba, *matalino+ pala ang bagong kaibigan ni $name1.', 'pang-uri', 3],
    ['Ipinaalala sa akin ni $name1 na *maramdamin+ si $name2.', 'pang-uri', 3],
    ['Dagdagan mo ng asukal ang kape mo dahil ito ay *matabang+.', 'pang-uri', 3],
    ['Ang larawang gawa nina $name1 at $name2 ay *makulay+.', 'pang-uri', 3],
    ['*Mapayapa+ ang buhay ng mag-anak sa bago nilang tahanan.', 'pang-uri', 3],
    ['Si $name1 ang piliin mo dahil *malakas+ ang boses niya.', 'pang-uri', 3],
    ['*Mahigpit+ ang pagpapasunod ng mga tuntunin sa paaralan.', 'pang-uri', 3],
    ['Sa kanilang magkakaklase, si $name1 ang *pinakamatangkad+.', 'pang-uri', 3],
    ['*Ang galing-galing+ ng mga mananayaw na napanood namin!', 'pang-uri', 3],
    ['Ang mga ito na ang *pinakamagagarang+ damit ni $name1.', 'pang-uri', 3],
    ['Sino ang nakakuha ng *pinakamaraming+ tamang sagot?', 'pang-uri', 3],
    ['*Napakasaya+ talaga ng mga pagdiriwang tuwing Pasko.', 'pang-uri', 3],
    ['Ang Ilog Nile ang *pinakamahabang+ ilog sa buong mundo.', 'pang-uri', 3],
    ['Ang magara niyang dyip ay nakaparada *sa tapat ng bahay ko+.', 'pang-abay', 3],
    ['Talagang *mataas+ tumalon ang alagang kabayo ni $name1.', 'pang-abay', 3],
    ['Si $name1 ay *mahusay+ magdrowing ng mga tao at hayop.', 'pang-abay', 3],
    ['Isinuot ni $name1 nang *baligtad+ ang kanyang damit.', 'pang-abay', 3],
    ['*Talagang+ nakakainis ang mga taong walang pakialam.', 'pang-abay', 3],
    ['Kumakain kami ng keyk at tsokolate *paminsan-minsan+.', 'pang-abay', 3],
    ['Ang mga mananayaw ay mag-eensayo *sa himnasyo+ mamaya.', 'pang-abay', 3],
    ['Makakauwi raw sina $name1 at $name2 *sa araw ng pista+.', 'pang-abay', 3],
    ['Alam mo bang tumawag siya sa telepono *kani-kanina lamang+?', 'pang-abay', 3],
    ['*Magaling+ magsulat ng mga kuwentong pambata si $name1.', 'pang-abay', 3],
    ['Naidaos namin nang *maayos+ ang prusisyon ng mga deboto.', 'pang-abay', 3],
    ['*Madaling+ nakumpuni ng magkapatid ang kanilang bubong.', 'pang-abay', 3],
    ['*Sama-sama+ silang naglakad patungong simbahan.', 'pang-abay', 3],
    ['Ang mga bata ay nanonood ng telebisyon *sa silid+.', 'pang-abay', 3],
    ['Bumigat si $name1 *nang pitong libra+ noong isang buwan.', 'pang-abay', 3],
    ['Nataasan na ni $name1 si $name2 *nang limang sentimetro+.', 'pang-abay', 3],
    ['Lumabis *nang sampung minuto+ ang kanilang pagtatanghal.', 'pang-abay', 3],
    ['Maraming tao ang naghahanap ng mapapasukan *sa pabrika+.', 'pang-abay', 3],
    ['Sina $name1 at $name2 ay masayang naglalaro *sa palaruan+.', 'pang-abay', 3],
    ['Unti-unti nang nauubos ang mga punongkahoy *sa bundok+.', 'pang-abay', 3],
    ['Sina $name1 at $name2 ay naglalako sa kalye *araw-araw+.', 'pang-abay', 3],
    ['*Taun-taon+ ay sumasali si $name1 sa paligsahan sa pagtakbo.', 'pang-abay', 3],
],
4 => [
    ['Ang kotseng nabili ni $name1 kay $name2 ay walang dudang *matulin+.', 'pang-uri', 4],
    ['Naalala ko ang *nakatutuwang+ bakasyon natin noong isang taon.', 'pang-uri', 4],
    ['Ang pagkukumpuni ng sirang bubong ay *madali+ para sa magkapatid.', 'pang-uri', 4],
    ['*Husto+ na ang pag-aaral ni $name1 para sa mahabang pagsusulit bukas.', 'pang-uri', 4],
    ['Ang mga tanong ng doktor ay sinagot ng *matamlay+ na pasyente.', 'pang-uri', 4],
    ['*Tahimik+ si $name1 habang nagbabasa sa loob ng kanyang silid.', 'pang-uri', 4],
    ['*Malungkot+ ako dahil tinanggihan nila ang iminumungkahi ko.', 'pang-uri', 4],
    ['Ngayon ko napatunayang *maasikaso+ nga ang bagong kalihim nina $name1.', 'pang-uri', 4],
    ['*Napakaganda+ ng mga palamuti sa mga bahay tuwing Pista ng Pahiyas.', 'pang-uri', 4],
    ['Si $name1 ang *pinakamatalinong+ mag-aaral sa klase ni Bb. Vargas.', 'pang-uri', 4],
    ['Ang kalahok na nanalo sa paligsahang iyon ay *napakasuwerte+.', 'pang-uri', 4],
    ['Si $name1 ang *pinakaabala+ sa amin tuwing malapit na ang Pasko.', 'pang-uri', 4],
    ['Ang Everest sa Nepal ba ang *pinakamataas+ na bundok sa buong mundo?', 'pang-uri', 4],
    ['Si $name1 ang *pinakamahusay+ na manunulat sa buong unibersidad.', 'pang-uri', 4],
    ['Pinipili ni $name1 ang *pinakasariwang+ manok sa buong palengke.', 'pang-uri', 4],
    ['Ang pakiramdam niya ay siya ang *pinakamayamang+ tao sa mundo.', 'pang-uri', 4],
    ['Ang guro namin ay *mahusay+ magpaliwanag ng mga kababalaghan.', 'pang-abay', 4],
    ['*Matiyagang+ naghahanapbuhay ang tatay ni $name1 sa Saudi Arabia.', 'pang-abay', 4],
    ['Ang mag-anak ni $name1 ay *maginhawang+ namumuhay sa probinsiya.', 'pang-abay', 4],
    ['Ang mga magulang ni $name1 ay napakabait at *bihirang+ magalit.', 'pang-abay', 4],
    ['*Parati+ siyang kumakain sa labas kaya naubos ang pera niya.', 'pang-abay', 4],
    ['Ipinanganak si Tito Gabriel *noong ika-15 ng Marso, 1970+.', 'pang-abay', 4],
    ['Ang paliwanag ni Ginang Alberto ay *madaling+ intindihin.', 'pang-abay', 4],
    ['*Pabulong+ magsalita si $name1 dahil may singaw siya sa labi.', 'pang-abay', 4],
    ['*Masayang+ nakipagkuwentuhan si $name1 sa kanyang mga kaibigan.', 'pang-abay', 4],
    ['*Maingat+ niyang ibinalik ang mamahaling relo sa lalagyan nito.', 'pang-abay', 4],
    ['*Nakapilang+ lumabas sa silid na iyon ang mga mag-aaral.', 'pang-abay', 4],
    ['Tuwing hapon ay nagtitipon ang mga kalaro namin *sa palaruan+.', 'pang-abay', 4],
    ['*Sa tabi ng aming paaralan+ kami naglalaro ng football.', 'pang-abay', 4],
    ['Libangan ng kuya ko ang umakyat sa bundok *tuwing bakasyon+.', 'pang-abay', 4],
    ['Ang saranggola ni $name1 ay bumagsak *sa kabilang bakod+.', 'pang-abay', 4],
    ['Nagtungo ang pamilya Reyes *sa Baguio+ upang magbakasyon.', 'pang-abay', 4],
    ['*Tuwing madaling-araw+ tumitilaok ang mga tandang ni Lolo.', 'pang-abay', 4],
    ['*Tuwing Sabado+ ay nagluluto si $name1 ng espesyal na meryenda.', 'pang-abay', 4],
    ['Ang mga senador ay nagpupulong sa gusaling iyan *sa kasalukuyan+.', 'pang-abay', 4],
    ['*Dahan-dahan+ kaming tumawid sa luma at marupok na tulay.', 'pang-abay', 4],
],
5 => [
    ['Ang ani natin ngayon ay *mas masagana+ kaysa sa ani noong nakaraang taon.', 'pang-uri', 5],
    ['Dagdagan mo pa ng asukal ang kapeng tinimpla mo dahil ito ay *matabang+.', 'pang-uri', 5],
    ['Hindi pa tayo maaaring magsimula dahil hindi pa *buo+ ang ating pangkat.', 'pang-uri', 5],
    ['Ang mga gulay at prutas sa tindahan ko ay *mas sariwa+ kaysa sa palengke.', 'pang-uri', 5],
    ['*Napakahirap+ naman pala ng trabaho ng isang manggagawa sa pabrikang ito.', 'pang-uri', 5],
    ['*Mahusay+ ang pagpapaliwanag ng aming guro tungkol sa mga kababalaghan.', 'pang-uri', 5],
    ['Ayon sa PAGASA, *matindi+ ang bagyong hahagupit sa hilagang bahagi ng Luzon.', 'pang-uri', 5],
    ['Hindi pa siya pwedeng manungkulan dahil hindi pa siya *dalubhasa+ sa gawaing ito.', 'pang-uri', 5],
    ['Sige na nga, si $name1 na ang *pinakamasipag+ na mag-aaral sa inyong pamantasan.', 'pang-uri', 5],
    ['Walang gustong makipagkaibigan sa kanya dahil *ubod ng sama+ ang kanyang ugali.', 'pang-uri', 5],
    ['Napahagulgol si $name1 dahil *masakit na masakit+ na raw ang tiyan niya.', 'pang-uri', 5],
    ['Hindi ka pa rin ba naniniwalang *mapagmalasakit+ ang dayuhang kapitbahay ni $name1?', 'pang-uri', 5],
    ['Ang luma at kinakalawang na bangka ni $name1 ay may upuang *pantatluhan+ lamang.', 'pang-uri', 5],
    ['Ang pamumuhay ng kanilang pamilya sa lalawigan ay *talagang+ maginhawa.', 'pang-abay', 5],
    ['Siya ang batang *biglang+ hinabol ng mabangis na asong iyon kaninang tanghali.', 'pang-abay', 5],
    ['Ang pulubi ay *dagliang+ nagpasalamat sa babaeng nagbigay sa kanya ng limos.', 'pang-abay', 5],
    ['*Malinaw+ na ipinaliwanag ng punong-guro ang mga bagong patakaran sa paaralan.', 'pang-abay', 5],
    ['Ikinuwento ni $name1 sa korte ang buong pangyayari *nang walang alinlangan+.', 'pang-abay', 5],
    ['Sa isang linggo ay pupunta kami *sa Cebu+ upang bisitahin ang mga lolo at lola ko.', 'pang-abay', 5],
    ['Tuwing hapon ay nagtutungo kami *sa ilalim ng puno+ para maglaro ng taguan.', 'pang-abay', 5],
    ['Dinala namin *sa klinika ng beterinaryo+ ang aso naming matamlay at hindi makakain.', 'pang-abay', 5],
    ['Uuwi na si Tatay mula sa Singapore at susunduin namin siya *sa paliparan+.', 'pang-abay', 5],
    ['Pumunta muna si $name1 *sa bahay nina $name2+ dahil may hinihiram siyang aklat.', 'pang-abay', 5],
    ['Nakatira ang lolo at lola nila *sa isang subdibisyon sa barangay ng San Martin+.', 'pang-abay', 5],
    ['Marami siyang nakain mula kahapon kaya bumigat siya *nang dalawang libra+.', 'pang-abay', 5],
    ['Gumaan si $name1 *nang walong libra+ mula nang siya ay mag-ehersisyo tuwing umaga.', 'pang-abay', 5],
    ['Walang dudang *matulin+ tumakbo ang pangarerang kotseng nabili ni $name1 kay $name2.', 'pang-abay', 5],
],
6 => [
    ['Lumipas ang *napakatagal+ na panahon bago sumang-ayon sa aming plano ang kanilang pinuno.', 'pang-uri', 6],
    ['*Magandang+ asal ang paggamit ng \'po\' at \'opo\' sa pakikipag-usap sa mga nakatatanda sa iyo.', 'pang-uri', 6],
    ['Ang lungsod ng Tokyo ay itinuturing na isa sa mga *pinakamalalaking+ lungsod sa buong mundo.', 'pang-uri', 6],
    ['Ang bahay nina $name1 ang may *pinakamagarang+ dekorasyon sa buong subdibisyon tuwing Pasko.', 'pang-uri', 6],
    ['Iniwasan ng mga katrabaho ni $name1 ang *mapanuring+ imbestigador na dumalaw sa opisina nila kanina.', 'pang-uri', 6],
    ['*Mahusay+ ang pagkakapaliwanag ni $name1 ng mga konseptong pang-agham sa kanyang mga estudyante kanina.', 'pang-uri', 6],
    ['Naubos ni $name1 ang inalmusal niyang tapa, itlog, at *isa\'t kalahating+ pinggang sinangag.', 'pang-uri', 6],
    ['Ang mga alahas na ipinakita ni $name1 sa akin ay katumbas daw ng *isang daang libong+ piso.', 'pang-uri', 6],
    ['Hindi ko alam na ako pala ang *ikatlong+ mag-aaral na napiling lumahok sa paligsahan bukas.', 'pang-uri', 6],
    ['Nasayang lamang ang *pangalawang+ pagkakataong ibinigay ng hukom kay $name1 para magbagong-buhay.', 'pang-uri', 6],
    ['*Tigpipiso+ na lang daw ngayon ang bawat tali ng gulay sa tindahan ni $name1 sa palengke.', 'pang-uri', 6],
    ['Ipinagawa ng guro sa mga mag-aaral ang pagsasanay sa *ikalimampung+ pahina ng kanilang aklat.', 'pang-uri', 6],
    ['Nakamit ni $name1 ang unang gantimpala sa paligsahan kaya siya nakatanggap ng *masigabong+ palakpakan.', 'pang-uri', 6],
    ['Bilang pagsasanay, gumawa ako ng *tig-aanim+ na pangungusap sa bawat uri ng panghalip.', 'pang-uri', 6],
    ['Nagpakadalubhasa si $name1 sa pagsasalita ng wikang *Pranses+ noong nag-aral siya sa Pransiya.', 'pang-uri', 6],
    ['Sigurado ka bang nakatikim na ang mga dayuhan mong panauhin ng manggang *Guimaras+?', 'pang-uri', 6],
    ['*Tuwang-tuwang+ ipinakita ni $name1 sa kanyang mga kaibigan ang mga larawan ng kanyang anak.', 'pang-abay', 6],
    ['Ang sinasakyan kong bus ay *biglang+ pinara ng pulis dahil mayroon itong nalabag na batas.', 'pang-abay', 6],
    ['Naglakad kami *nang kalahating kilometro+ mula sa bahay nila patungong sakayan ng dyip.', 'pang-abay', 6],
    ['Si $name1 ay *mahusay+ magpaliwanag ng mga konseptong pang-agham sa kanyang mga estudyante.', 'pang-abay', 6],
    ['Si $name1 ang batang *nagmamakaawang+ humingi ng saklolo sa pangkat nina $name2 noong may bagyo.', 'pang-abay', 6],
    ['*Mahusay+ mag-araro ang kalabaw ni $name1 kaya nakapanghihinayang itong ibenta sa mababang halaga.', 'pang-abay', 6],
    ['Samantalahin mo ang pagtatrabaho sa Dubai habang kaya mo pa dahil *mabilis+ lumipas ang panahon.', 'pang-abay', 6],
    ['Sanlibong punongkahoy ang *matiyagang+ itinanim ng mga magsasaka sa burol na malapit sa kanilang palayan.', 'pang-abay', 6],
    ['Dahil *mabilisan+ nilang ibinenta ang kanilang mga itik, wawalo na lamang sa mga ito ang natitira.', 'pang-abay', 6],
    ['Napilitan akong makipagsiksikan *nang dalawang oras+ sa tindahang iyon para makabili lamang ng hamon.', 'pang-abay', 6],
    ['*Tuwang-tuwang+ tinanggap ng mga batang naglalaro sa kalye ang iniabot kong supot ng tinapay.', 'pang-abay', 6],
    ['Itinago ng magkakapatid *sa loob ng kabinet+ ang mga bagong damit na ipinadala sa kanila ng kanilang ina.', 'pang-abay', 6],
    ['Ang pangkat ni $name1 ay pinasayaw ng mga guro ng tinikling *sa ibabaw ng entablado+ kanina.', 'pang-abay', 6],
    ['*Sa ilalim ng kotseng nakaparada+ natutulog ang galang asong humabol sa kapatid ni $name1 kahapon.', 'pang-abay', 6],
    ['Mula pa noong 2010 ay nagtatrabaho na si $name1 bilang guro *sa isang pampublikong paaralan+.', 'pang-abay', 6],
],
];
$banks = [$tier => []];
foreach ($tiers as $t) $banks[$tier] = array_merge($banks[$tier], $sourceBanks[$t]);
function pua_question(array $entry, string $tier, string $lvl): array {
$arrnum = $entry[2];
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

	
$sentence = strtr($entry[0], ['$name1'=>$name1, '$name2'=>$name2]);
if (!preg_match('/^(.*?)\*(.*?)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
$choices = ['pang-uri', 'pang-abay'];
return ['word'=>pua_h($m[1]).'<strong style="color:#CC0066;">'.pua_h($m[2]).'</strong>'.pua_h($m[3]), 'target'=>$m[2], 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo pua_h(ucfirst($cur['correct'])); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Sabihin kung ang salitang kulay pula sa pangungusap ay pang-uri o pang-abay.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pua_h(ucfirst($choice)); ?>
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
