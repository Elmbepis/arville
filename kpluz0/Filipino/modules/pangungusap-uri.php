<?php
// filipino/modules/pangungusap-uri.php
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
$moduleTitle = 'Mga Uri ng Pangungusap';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function puri_tier(string $lvl, int $grd): int {
    return ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? ($grd <= 1 ? 1 : 2) : 0);
}
function puri_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
1 => [
    ['Sasakay kami ng eroplano.', 'pasalaysay'],
    ['Dito tayo sasakay ng dyip.', 'pasalaysay'],
    ['Si $name1 ay naglalaro.', 'pasalaysay'],
    ['Mag-aaral ako mamaya.', 'pasalaysay'],
    ['Maganda ang kantang iyan.', 'pasalaysay'],
    ['Nagtago ang puting kuting.', 'pasalaysay'],
    ['Namasyal doon ang mga bata.', 'pasalaysay'],
    ['Magaling gumuhit si $name1.', 'pasalaysay'],
    ['Kinagat yata ako ng langgam.', 'pasalaysay'],
    ['Magdadala ako ng laruan.', 'pasalaysay'],
    ['Sila ay bibili ng mais.', 'pasalaysay'],
    ['Kami ang kumain ng puto.', 'pasalaysay'],
    ['May nakita akong ibon.', 'pasalaysay'],
    ['Umakyat siya sa puno.', 'pasalaysay'],
    ['Kumain ka na ba?', 'patanong'],
    ['Ano ang pangalan mo?', 'patanong'],
    ['Saan ka nakatira?', 'patanong'],
    ['Saan ba sila pumunta?', 'patanong'],
    ['Gusto ba ninyong maglaro?', 'patanong'],
    ['Anong laro ang gusto ninyo?', 'patanong'],
    ['Kakain ka na ba?', 'patanong'],
    ['Bakit ayaw mo kumain?', 'patanong'],
    ['Malamig ba ang tubig?', 'patanong'],
    ['Kilala mo ba siya?', 'patanong'],
    ['Umaambon na po ba?', 'patanong'],
    ['Ano ang paborito mong kulay?', 'patanong'],
    ['Bakit ka umiyak kanina?', 'patanong'],
    ['Paano ka nakarating dito?', 'patanong'],
    ['Kailan ang iyong kaarawan?', 'patanong'],
    ['Ilan ang kapatid mo?', 'patanong'],
    ['Aray, napaso ako!', 'padamdam'],
    ['Nabasag ang tasa!', 'padamdam'],
    ['Nadulas si $name1!', 'padamdam'],
    ['Ang sakit ng tiyan ko!', 'padamdam'],
    ['Ay! May sumabog!', 'padamdam'],
    ['Hahabulin ka ng taya!', 'padamdam'],
    ['Naku, natapon ang sabaw!', 'padamdam'],
    ['Sunog! Sunog!', 'padamdam'],
    ['Saklolo, mga kapitbahay!', 'padamdam'],
    ['Naku, mahuhulog ka riyan!', 'padamdam'],
    ['Ay, panis na itong pansit!', 'padamdam'],
    ['Uy, nahulog ang pera mo!', 'padamdam'],
    ['Uminom ka ng gatas.', 'pautos'],
    ['Maglaro tayong dalawa.', 'pautos'],
    ['Itago mo na iyan.', 'pautos'],
    ['Huwag kang umiyak.', 'pautos'],
    ['Huwag kang magkakalat.', 'pautos'],
    ['Bumili ka ng asukal.', 'pautos'],
    ['Magwalis ka sa sala.', 'pautos'],
    ['Maligo ka na.', 'pautos'],
    ['Magbasa ka ng aklat.', 'pautos'],
    ['Huwag kang lalabas.', 'pautos'],
    ['Magluto ka ng ulam.', 'pautos'],
    ['Matulog na kayo.', 'pautos'],
],
2 => [
    ['Si $name1 ay bumili ng $item.', 'pasalaysay'],
    ['Nakatira sila sa lungsod ng Cebu.', 'pasalaysay'],
    ['Mahaba pala ang pila tuwing umaga.', 'pasalaysay'],
    ['Naglakbay siya patungong Amerika.', 'pasalaysay'],
    ['Madalas ang ulan sa aming lugar.', 'pasalaysay'],
    ['Ang aming mga guro ay mababait.', 'pasalaysay'],
    ['Pupunta na kami sa Laguna bukas.', 'pasalaysay'],
    ['Si $name1 ay papasok na sa paaralan.', 'pasalaysay'],
    ['Pumunta ako sa bahay ng kaibigan ko.', 'pasalaysay'],
    ['Habulan ang paborito kong laro.', 'pasalaysay'],
    ['Ako ang maghahatid sa kanila.', 'pasalaysay'],
    ['Hinabol ng aso namin ang pusa nila.', 'pasalaysay'],
    ['Marami akong aklat sa aking silid.', 'pasalaysay'],
    ['Umiinom ako ng gatas bago matulog.', 'pasalaysay'],
    ['May bakanteng upuan pa ba rito?', 'patanong'],
    ['Nakita mo ba ang $item ko?', 'patanong'],
    ['Saan mo inilagay ang aking $item?', 'patanong'],
    ['Kay $name1 ka ba humiram ng $item?', 'patanong'],
    ['Bago ba ang $itemb ito?', 'patanong'],
    ['Bakit hindi pa siya umuuwi?', 'patanong'],
    ['Malinis ba ang iyong kamay?', 'patanong'],
    ['Kailan kaya sila pupunta rito?', 'patanong'],
    ['Matatagpuan ba sa Luzon ang Cebu?', 'patanong'],
    ['Dadaan po ba kayo sa palengke?', 'patanong'],
    ['Sinu-sino ang maghahabulan?', 'patanong'],
    ['Anong oras magsisimula ang klase?', 'patanong'],
    ['Tutulong ba siya sa gawaing-bahay?', 'patanong'],
    ['Kailan tayo mamimili sa palengke?', 'patanong'],
    ['Sino ang kasama mo sa pamamasyal?', 'patanong'],
    ['Paano kayo makararating sa Visayas?', 'patanong'],
    ['Sino ang iyong matalik na kaibigan?', 'patanong'],
    ['Sino ang gumawa ng proyektong ito?', 'patanong'],
    ['Aray, nakagat ako ng aso mo!', 'padamdam'],
    ['Yehey, bakasyon na naman!', 'padamdam'],
    ['Naku! May sakit ang aso ko!', 'padamdam'],
    ['Aray! Nasaktan ang tuhod ko!', 'padamdam'],
    ['Ay, wala pala sa Luzon ang Leyte!', 'padamdam'],
    ['Hoy, bawal sumingit sa pila!', 'padamdam'],
    ['Naku, ayaw kong maging taya!', 'padamdam'],
    ['Ay, tama pala ang sagot ko!', 'padamdam'],
    ['Yehey, wala na namang pasok!', 'padamdam'],
    ['Magsitakbo kayo, may sunog!', 'padamdam'],
    ['Astig! May \'laptop\' ka na!', 'padamdam'],
    ['Pakitago mo na ang $item.', 'pautos'],
    ['Bumili po kayo ng $item.', 'pautos'],
    ['Maglaro tayo ng taguan mamaya.', 'pautos'],
    ['Huwag kang tumayo riyan.', 'pautos'],
    ['Huwag kang lalabas ng bahay.', 'pautos'],
    ['Huwag mong saktan ang kuting.', 'pautos'],
    ['Hanapin mo ang mga nars.', 'pautos'],
    ['Magtrabaho ka nang maayos.', 'pautos'],
    ['Ipagluto mo si $name1 ng adobo.', 'pautos'],
    ['Magkita ulit tayo rito bukas.', 'pautos'],
    ['Dalhin mo ang gamot sa ospital.', 'pautos'],
    ['Pakibantayan muna ang bag ko.', 'pautos'],
    ['Magdilig kayo ng halaman.', 'pautos'],
],
3 => [
    ['May hinahanap po akong pugad ng ibon.', 'pasalaysay'],
    ['Mabuti sa katawan ang pag-eehersisyo.', 'pasalaysay'],
    ['Humiram si $name1 ng $item kay $name2.', 'pasalaysay'],
    ['Masarap magluto ang mga taga-Pampanga.', 'pasalaysay'],
    ['May nakita po akong sisiw sa ilalim ng puno.', 'pasalaysay'],
    ['Hindi ko pa alam kung saan kami magbabakasyon.', 'pasalaysay'],
    ['Matatagpuan sa Visayas ang lungsod ng Cebu.', 'pasalaysay'],
    ['Nais maglibang sa palaruan ng mga magkakapatid.', 'pasalaysay'],
    ['Isang malaking handaan ang magaganap bukas.', 'pasalaysay'],
    ['Si $name1 ay isang matagumpay na arkitekto.', 'pasalaysay'],
    ['Kami ay namamasyal sa plaza tuwing Sabado.', 'pasalaysay'],
    ['Mukhang hindi pa marunong lumipad ang inakay.', 'pasalaysay'],
    ['Mahuhuhusay ang mga karakter ng Moro-moro.', 'pasalaysay'],
    ['Ano kaya ang nilutong ulam ni Nanay?', 'patanong'],
    ['Kailan ka maglilinis ng iyong silid?', 'patanong'],
    ['Dapat bang magpakilala ako sa mga bisita?', 'patanong'],
    ['Kanino ba makukuha ang mga sahog ng pagkain?', 'patanong'],
    ['Sasama na ba ang mga bata sa pamamasyal doon?', 'patanong'],
    ['Sino ang maghahatid ng sulat na ito?', 'patanong'],
    ['Paano mo nasabing galit kanina ang guro mo?', 'patanong'],
    ['Saan mo binili ang bago mong sapatos?', 'patanong'],
    ['Kailan mo ipapasa ang iyong proyekto?', 'patanong'],
    ['Bakit tabingi ang tahi ng iyong blusa?', 'patanong'],
    ['Kanino kayo lumapit upang humingi ng tulong?', 'patanong'],
    ['Anong bansa ang iyong pangarap na marating?', 'patanong'],
    ['Kanino mo namana ang iyong maputing kutis?', 'patanong'],
    ['Naku, nahulog yung $item sa ilog!', 'padamdam'],
    ['Aray, nakagat ako ng aso mo!', 'padamdam'],
    ['Aba, ang dami n\'yo palang $animal!', 'padamdam'],
    ['Ay, mababasa ang mga sampay ko!', 'padamdam'],
    ['Bilis, pumasok na tayo sa loob!', 'padamdam'],
    ['Kay ganda ng bansang Pilipinas!', 'padamdam'],
    ['Oo nga, siguradong matutuwa sila!', 'padamdam'],
    ['Yehey! Nanalo kami sa paligsahan!', 'padamdam'],
    ['Sa wakas! Nakuha ko rin ang tamang sagot!', 'padamdam'],
    ['Naku, nakalimutan ko ang aking aklat!', 'padamdam'],
    ['Wow, ang ganda naman ng damit mo!', 'padamdam'],
    ['Yehey! Panalo tayo sa basketbol!', 'padamdam'],
    ['Pakisauli mo naman ang aking $item.', 'pautos'],
    ['Umuwi kayo bago lumubog ang araw.', 'pautos'],
    ['Puntahan mo kaagad ang punong-guro.', 'pautos'],
    ['Bumili ka ng bigas kina Aling Neneng.', 'pautos'],
    ['Sagutin mo agad ang liham ni $name1.', 'pautos'],
    ['Pakiabot sa akin ang mapa ng Pilipinas.', 'pautos'],
    ['Pakitulungan ang matanda sa pagsakay.', 'pautos'],
    ['Pakibigay mo naman ito sa iyong guro.', 'pautos'],
    ['Pakikuha nga ang gamot sa loob ng bahay.', 'pautos'],
    ['Pakikuha ang mga pinamili sa sasakyan.', 'pautos'],
    ['Ihawin ninyo ang mga isdang binili natin.', 'pautos'],
    ['Magluto ka ng gulay para sa tanghalian.', 'pautos'],
],
4 => [
    ['Maraming tanim na prutas at gulay ang aking lolo.', 'pasalaysay'],
    ['Nanalo siya sa paligsahan ng mga manlalaro sa lungsod.', 'pasalaysay'],
    ['Magkikita-kita ang aming pamilya pagdating ni $name1.', 'pasalaysay'],
    ['Si Jose Rizal ay kinikilalang bayani ng ating lahi.', 'pasalaysay'],
    ['Ang aking mga magulang ay mula sa lalawigan ng Masbate.', 'pasalaysay'],
    ['Malaki ang lupang sakahan ng aking mga magulang.', 'pasalaysay'],
    ['Higit na mas mahaba ang buhok ni $name1 kay $name2.', 'pasalaysay'],
    ['Higit sampung beses na akong nakarating ng Bicol.', 'pasalaysay'],
    ['Maputi ang kanyang kutis at singkit ang kanyang mga mata.', 'pasalaysay'],
    ['Nagdarasal muna kami bago kami kumain ng hapunan.', 'pasalaysay'],
    ['Nagbaon ako ng payong dahil baka umulan mamayang hapon.', 'pasalaysay'],
    ['Mabigat ang trapiko kaya nahuli ako sa klase ngayong umaga.', 'pasalaysay'],
    ['May balak ba kayong puntahan ngayong bakasyon?', 'patanong'],
    ['Gumawa ka na ba ng takdang-aralin sa sining?', 'patanong'],
    ['Bakit ka ba nakatayo sa ilalim ng puno ng mangga?', 'patanong'],
    ['Sinu-sino ang pumunta sa piging na iyong dinaluhan?', 'patanong'],
    ['Saang probinsya ipinanganak ang iyong mga magulang?', 'patanong'],
    ['Sino ang nagbigay sa inyo ng pondo para sa proyektong ito?', 'patanong'],
    ['Ano ba ang kulay ng sasakyan ninyo, pula o puti?', 'patanong'],
    ['Mahilig ba sa maanghang na pagkain ang mga Bicolano?', 'patanong'],
    ['Alin ang gustong inumin ni $name1, mainit na kape o tsaa?', 'patanong'],
    ['Aling kamiseta ang isusuot mo, ang puti o ang asul?', 'patanong'],
    ['Maliligo ka na ba ngayon o magpapahinga ka muna?', 'patanong'],
    ['Wow, gusto ko ring makapunta ng Mindanao!', 'padamdam'],
    ['Yehey! Nakapasa ako sa ating pagsusulit!', 'padamdam'],
    ['Napakasarap naman ng niluto mong pagkain!', 'padamdam'],
    ['Lagot, nabasag mo pala ang mamahaling plorera!', 'padamdam'],
    ['Aba, kailangang maibalik natin ito sa inahin!', 'padamdam'],
    ['Yehey! Nakapuntos na naman si $name1 mula sa malayo!', 'padamdam'],
    ['Naku, nahulog ang mamahaling relo ni $name1 sa ilog!', 'padamdam'],
    ['Yippie, magaling nang magbasa ang aking kapatid!', 'padamdam'],
    ['Maglinis ka ngang mabuti rito sa opisina.', 'pautos'],
    ['Ipasok mo muna ang mga sisiw sa loob ng bahay.', 'pautos'],
    ['Ipakita mo sa akin sa globo kung nasaan ang bansang Turkey.', 'pautos'],
    ['Bisitahin ninyo ang lolo at lola ninyo sa probinsya.', 'pautos'],
    ['Pakikuha mo nga yung mga papeles para sa ating kliyente.', 'pautos'],
    ['Pakisabi po kay Nanay na nasa palaruan po kami.', 'pautos'],
    ['Pakisabi po sa akin kung may nakita kayong tuta.', 'pautos'],
],
5 => [
    ['Nagpasalamat nang paulit-ulit ang pulubi sa babaeng nagbigay ng limos sa kanya.', 'pasalaysay'],
    ['Ang mahiyaing kuting ng kapitbahay ay nagtatago sa likod ng kanilang aparador.', 'pasalaysay'],
    ['Isang napakalawak na bukirin ang ipinamana ng ama sa kanyang mga anak.', 'pasalaysay'],
    ['Masayang nanood ng kanilang paboritong palabas ang mga kapatid ni $name1.', 'pasalaysay'],
    ['Mahimbing pa rin ang tulog ni $name1 kahit napakalakas ng tilaok ng mga manok.', 'pasalaysay'],
    ['Nagmadaling pumunta si $name1 sa istasyon ngunit hindi niya naabutan ang tren.', 'pasalaysay'],
    ['Saan-saan matatagpuan ang magagandang tanawin ng Pilipinas?', 'patanong'],
    ['Kailan ang huling pagsusulit para sa kasalukuyang semester?', 'patanong'],
    ['Gusto ba nilang maglaro sa palaruan kanina kaya sila lumabas ng bahay?', 'patanong'],
    ['Ano ba ang maaari mong maitulong habang abala sa pagluluto ang nanay mo?', 'patanong'],
    ['Makagigising ka ba nang maaga bukas para maumpisahan na natin ang labada?', 'patanong'],
    ['Alin dito ang dadalhin mo bukas, ang itim na pantalon o ang bagong maong?', 'patanong'],
    ['Alin ang mas gusto mong gawin, manood ng sine o maglaro ng basketbol?', 'patanong'],
    ['Magaling, nasagot mo ang mga pinakamahihirap na tanong sa pagsusulit!', 'padamdam'],
    ['Naku, naghahabulan na naman sa bakuran ang aso at pusa ni $name1!', 'padamdam'],
    ['Astig, ang galing naman ng porma nyong magkakaibigan ngayong araw!', 'padamdam'],
    ['Huwag kang pupunta riyan! Baka matuklaw ka ng mga ahas sa talahiban!', 'padamdam'],
    ['Lagot, nabasag ko ang antigong iskulturang iniingatan ng nanay ko!', 'padamdam'],
    ['Kunin mo ang mga halaman sa hardin at dalhin mo sa ating silid-aralan.', 'pautos'],
    ['Bilhan mo ng regalo si Lola dahil ipagdiriwang niya ang kanyang kaarawan.', 'pautos'],
    ['Tumawag ka ulit mamayang alas-otso dahil gusto ka niyang makausap.', 'pautos'],
    ['Maghugas ka na ng mga pinagkainan habang natutulog si $name1.', 'pautos'],
    ['Sabihin mo na sa kanya ang katotohanan para hindi siya magalit sa atin.', 'pautos'],
    ['Uminom ka na ng gamot ngayong umaga para mawala ang sakit ng ulo mo.', 'pautos'],
],
6 => [
    ['Dahil hindi ka kumain ng almusal, wala kang enerhiya para maglaro ngayong umaga.', 'pasalaysay'],
    ['Kung nais niyang mabago ang kanyang buhay, kailangan niyang maghanap ng trabaho.', 'pasalaysay'],
    ['Si $name1 ang kakanta dahil siya ang pinakamagaling na mang-aawit sa klase natin.', 'pasalaysay'],
    ['Sa panahon ng krisis, tumataas ang presyo ng mga bilihin at ang bayad sa kuryente.', 'pasalaysay'],
    ['Nais niyang makakuha ng mataas na marka sa pagsusulit kaya nag-aaral siya gabi-gabi.', 'pasalaysay'],
    ['Tumawag ako sa bahay nina $name1 ngunit hindi pa raw siya umuuwi galing sa paaralan.', 'pasalaysay'],
    ['Tuwang-tuwa si $name1 habang ipinagmamalaki niya ang mga larawan ng kanyang anak.', 'pasalaysay'],
    ['Mamimingwit ba sana si $name1 ng isda kung hindi siya natakot sa malalakas na alon?', 'patanong'],
    ['Manonood ka ba ng balita sa telebisyon o pakikinggan mo na lang ang balita sa radyo?', 'patanong'],
    ['Paano kaya ako makapag-iipon ng pera para makabili ako ng mga bagong aklat sa pasukan?', 'patanong'],
    ['Kung gusto kong gumaling sa pagtugtog ng piyano, may maitutulong ba ang pagsasanay tuwing hapon?', 'patanong'],
    ['Si Itay ba ang magdadala kina $name1 at $name2 sa sentrong pangkalusugan bukas ng umaga?', 'patanong'],
    ['Lagot! Nabasag natin ang lahat ng mga bote ng suka sa likod ng sasakyan!', 'padamdam'],
    ['Naku, napasobra ang pait ng niluluto kong pinakbet para sa kanilang hapunan!', 'padamdam'],
    ['Ay, nanghahabol na naman ng mga kawawang manok ang dambuhalang aso ng kapitbahay!', 'padamdam'],
    ['Aba, saksakan pala ng laki ang nabingwit mong tilapya sa lawa kagabi!', 'padamdam'],
    ['Ipakita mo kina Tatay at Nanay ang marka mo sa pagsusulit para matuwa sila.', 'pautos'],
    ['Tawagan mo ang mga magulang ni $name1 upang madala agad siya sa manggagamot.', 'pautos'],
    ['Maghanda ka na ng mga kandila at baterya para sa plaslayt dahil malapit na ang bagyo.', 'pautos'],
    ['Paghaluhaluin mo ang mga sangkap na iyan sa isang kaldero at isalang mo ito sa apoy.', 'pautos'],
    ['Huwag mong ipahalatang kinakabahan ka at lakasan mo ang boses mo kapag kausap mo na sila.', 'pautos'],
],
];
$names[0] = ['Adam', 'Alex', 'Angel', 'Ben', 'Carlo', 'Chris', 'Dan', 'David', 'Isaac', 'Jack', 'Jason', 'Jose', 'Jimmy', 'Juan', 'Jose', 'Kevin', 'Lucas', 'Luis', 'Max', 'Nick', 'Robert', 'Sam', 'Tomas', 'Amy', 'Anna', 'Bona', 'Carol', 'Emma', 'Eva', 'Joy', 'Julia', 'Kathy', 'Leah', 'Lina', 'Maria', 'Mely', 'Mia', 'Naty', 'Sara', 'Tina', 'Vicky'];
$names[1] = ['Adam', 'Adrian', 'Alex', 'Alexander', 'Andrew', 'Angelo', 'Benjamin', 'Brandon', 'Caleb', 'Cameron', 'Carlos', 'Carson', 'Carter', 'Charles', 'Christopher', 'Daniel', 'David', 'Diego', 'Dominic', 'Dylan', 'Elijah', 'Ethan', 'Gabriel', 'Hayden', 'Ian', 'Isaac', 'Isaiah', 'Jack', 'Jacob', 'Jaden', 'James', 'Jason', 'Jose', 'John', 'Jonathan', 'Joseph', 'Joshua', 'Juan', 'Julian', 'Justin', 'Kevin', 'Logan', 'Lucas', 'Luis', 'Luke', 'Matthew', 'Max', 'Michael', 'Nathan', 'Nicholas', 'Noah', 'Oliver', 'Owen', 'Parker', 'Robert', 'Ryan', 'Samuel', 'Sebastian', 'Thomas', 'Tristan', 'William', 'Alexandra', 'Alyssa', 'Amelia', 'Andrea', 'Anna', 'Ariana', 'Arianna', 'Bella', 'Brooke', 'Camille', 'Caroline', 'Chloe', 'Claire', 'Elizabeth', 'Emma', 'Eva', 'Evelyn', 'Gabriela', 'Grace', 'Hannah', 'Isabella', 'Jasmine', 'Jocelyn', 'Jolina', 'Julia', 'Katherine', 'Kylie', 'Lauren', 'Layla', 'Leah', 'Lillian', 'Lydia', 'Madeline', 'Maria', 'Mariah', 'Melanie', 'Mia', 'Naomi', 'Natalie', 'Olivia', 'Samantha', 'Sarah', 'Sofia', 'Stella', 'Tina', 'Victoria'];
$animals0[1] = ['aso', 'baka', 'ibon', 'isda', 'itik', 'kabayo', 'manok', 'pagong', 'pusa', 'tuta'];
$animals0[2] = ['alakdan', 'bayawak', 'bubuli', 'buwaya', 'gagamba'];
$items0[1] = ['aklat', 'baso', 'bola', 'kama', 'kumot', 'lapis', 'medyas', 'sando', 'tasa'];
$items0[2] = ['kaldero', 'kawali', 'kulambo', 'martilyo', 'palanggana', 'pamaypay', 'payong', 'platito'];
$tier = puri_tier($lvl, $grd);
function puri_question(array $entry, int $tier, string $lvl, int $grd, array $names, array $animals0, array $items0): array {
    $n = array_values(array_unique($names[$tier < 3 ? 0 : 1]));
    shuffle($n);
    $animals = $animals0[$tier < 3 ? 1 : 2];
    $items = $items0[$tier < 3 ? 1 : 2];
    $item = $items[array_rand($items)];
    $last = substr($item, -1);
    $itemb = $item . (strpos('aeiou', $last) !== false ? 'ng' : ($last === 'n' ? 'g' : ' na'));
    $sentence = strtr($entry[0], ['$name1'=>$n[0], '$name2'=>$n[1], '$animal'=>$animals[array_rand($animals)], '$item'=>$item, '$itemb'=>$itemb]);
    return ['word'=>puri_h($sentence),'correct'=>$entry[1],'choices'=>['pasalaysay','patanong','padamdam','pautos'],'tier'=>$tier,'lvl'=>$lvl,'grade'=>$grd,'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = puri_question($banks[$tier][$i], $tier, $lvl, $grd, $names, $animals0, $items0);
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
        <span class="puri-hug" style="display:inline-block !important;width:480px !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;text-align:center;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:wrap;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?><br/>
<span style="display:inline-block;margin-top:12px;font-weight:normal;">Sagot: <strong style="color:#CC0066;"><?php echo puri_h(ucfirst($cur['correct'])); ?></strong></span>
		</span></div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span class="puri-hug" style="display:inline-block !important;width:480px !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;text-align:center;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:wrap;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang uri ng pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:100%;max-width:400px;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo puri_h(ucfirst($choice)); ?>
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
        document.querySelectorAll('.puri-hug').forEach(box => {
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
