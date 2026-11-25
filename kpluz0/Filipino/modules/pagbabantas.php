<?php
// filipino/modules/pagbabantas.php
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
$moduleTitle = 'Pagbabantas ng Pangungusap';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pbt_tier(string $lvl, int $grd): int {
    return ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? ($grd <= 1 ? 1 : 2) : 0);
}
function pbt_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
1 => [
    'Sasakay kami ng eroplano*.',
    'Dito tayo sasakay ng dyip*.',
    'Si $name1 ay naglalaro*.',
    'Mag-aaral ako mamaya*.',
    'Maganda ang kantang iyan*.',
    'Nagtago ang puting kuting*.',
    'Namasyal doon ang mga bata*.',
    'Magaling gumuhit si $name1*.',
    'Kinagat yata ako ng langgam*.',
    'Magdadala ako ng laruan*.',
    'Sila ay bibili ng mais*.',
    'Kami ang kumain ng puto*.',
    'May nakita akong ibon*.',
    'Umakyat siya sa puno*.',
    'Siya ang kapatid ni $name1*.',
    'Mabuting kaibigan si $name1*.',
    'Kumain ka na ba*?',
    'Ano ang pangalan mo*?',
    'Saan ka nakatira*?',
    'Saan ba sila pumunta*?',
    'Gusto ba ninyong maglaro*?',
    'Anong laro ang gusto ninyo*?',
    'Kakain ka na ba*?',
    'Bakit ayaw mo kumain*?',
    'Malamig ba ang tubig*?',
    'Kilala mo ba siya*?',
    'Umaambon na po ba*?',
    'Ano ang paborito mong kulay*?',
    'Bakit ka umiyak kanina*?',
    'Paano ka nakarating dito*?',
    'Kailan ang iyong kaarawan*?',
    'Ilan ang kapatid mo*?',
    'Aray, napaso ako*!',
    'Nabasag ang tasa*!',
    'Nadulas si $name1*!',
    'Ang sakit ng tiyan ko*!',
    'Ay*! May sumabog+!',
    'Hahabulin ka ng taya*!',
    'Naku, natapon ang sabaw*!',
    'Sunog*! Sunog+!',
    'Saklolo, mga kapitbahay*!',
    'Naku, mahuhulog ka riyan*!',
    'Ay, panis na itong pansit*!',
    'Uy, nahulog ang pera mo*!',
    'Uminom ka ng gatas*.',
    'Maglaro tayong dalawa*.',
    'Itago mo na iyan*.',
    'Huwag kang umiyak*.',
    'Huwag kang magkakalat*.',
    'Bumili ka ng asukal*.',
    'Magwalis ka sa sala*.',
    'Maligo ka na*.',
    'Magbasa ka ng aklat*.',
    'Huwag kang lalabas*.',
    'Magluto ka ng ulam*.',
    'Matulog na kayo*.',
],
2 => [
    'Si $name1 ay bumili ng $item*.',
    'Nakatira sila sa lungsod ng Cebu*.',
    'Mahaba pala ang pila tuwing umaga*.',
    'Naglakbay siya patungong Amerika*.',
    'Madalas ang ulan sa aming lugar*.',
    'Ang aming mga guro ay mababait*.',
    'Pupunta na kami sa Laguna bukas*.',
    'Si $name1 ay papasok na sa paaralan*.',
    'Pumunta ako sa bahay ng kaibigan ko*.',
    'Habulan ang paborito kong laro*.',
    'Ako ang maghahatid sa kanila*.',
    'Hinabol ng aso namin ang pusa nila*.',
    'Marami akong aklat sa aking silid*.',
    'Umiinom ako ng gatas bago matulog*.',
    'Opo*, nagsaing na po ako+.',
    'Oo*, bumili ako ng ulam kanina+.',
    'Masakit ang tiyan ni $name1*.',
    'Nakausap ko na si $name1 kagabi*.',
    'Si $name1 ang magiging guro nila*.',
    'Masama ang pakiramdam ni $name1*.',
    'Sa likod ng puno nagtago si $name1*.',
    'May bakanteng upuan pa ba rito*?',
    'Nakita mo ba ang $item ko*?',
    'Saan mo inilagay ang aking $item*?',
    'Kay $name1 ka ba humiram ng $item*?',
    'Bago ba ang gamit na ito*?',
    'Bakit hindi pa siya umuuwi*?',
    'Malinis ba ang iyong kamay*?',
    'Kailan kaya sila pupunta rito*?',
    'Matatagpuan ba sa Luzon ang Cebu*?',
    'Dadaan po ba kayo sa palengke*?',
    'Anong oras magsisimula ang klase*?',
    'Tutulong ba siya sa gawaing-bahay*?',
    'Kailan tayo mamimili sa palengke*?',
    'Sino ang kasama mo sa pamamasyal*?',
    'Paano kayo makararating sa Visayas*?',
    'Sino ang iyong matalik na kaibigan*?',
    'Ano po ba ang pag-uusapan natin*?',
    'May parating bang bagyo bukas*?',
    'Kailan kaya babalik ang kuryente*?',
    'Nasaktan ka ba sa laro kanina*?',
    'Bakit mukhang malungkot si $name1*?',
    'Aray*, nakagat ako ng aso mo+!',
    'Yehey*, bakasyon na naman+!',
    'Naku*! May sakit ang aso ko+!',
    'Aray*! Nasaktan ang tuhod ko+!',
    'Ay*, wala pala sa Luzon ang Leyte+!',
    'Hoy*, bawal sumingit sa pila+!',
    'Naku*, ayaw kong maging taya+!',
    'Ay*, tama pala ang sagot ko+!',
    'Yehey*, wala na namang pasok+!',
    'Astig*! May \'laptop\' ka na+!',
    'Naku*, natumba ang anak mo+!',
    'Saklolo*! May ahas sa harap ko+!',
    'Aray*, nakagat ako ng aso mo+!',
    'Pakitago mo na ang $item*.',
    'Bumili po kayo ng $item*.',
    'Maglaro tayo ng taguan mamaya*.',
    'Huwag kang tumayo riyan*.',
    'Huwag kang lalabas ng bahay*.',
    'Huwag mong saktan ang kuting*.',
    'Hanapin mo ang mga nars*.',
    'Magtrabaho ka nang maayos*.',
    'Ipagluto mo si $name1 ng adobo*.',
    'Magkita ulit tayo rito bukas*.',
    'Dalhin mo ang gamot sa ospital*.',
    'Pakibantayan muna ang bag ko*.',
    'Magdilig kayo ng halaman*.',
    'Sunduin na ninyo si $name1*.',
],
3 => [
    'May hinahanap po akong pugad ng ibon*.',
    'Mabuti sa katawan ang pag-eehersisyo*.',
    'Humiram si $name1 ng $item kay $name2*.',
    'Masarap magluto ang mga taga-Pampanga*.',
    'May nakita po akong sisiw sa ilalim ng puno*.',
    'Hindi ko pa alam kung saan kami magbabakasyon*.',
    'Matatagpuan sa Visayas ang lungsod ng Cebu*.',
    'Nais maglibang sa palaruan ng mga magkakapatid*.',
    'Isang malaking handaan ang magaganap bukas*.',
    'Si $name1 ay isang matagumpay na arkitekto*.',
    'Kami ay namamasyal sa plaza tuwing Sabado*.',
    'Mukhang hindi pa marunong lumipad ang inakay*.',
    'Mahuhuhusay ang mga karakter ng Moro-moro*.',
    'Si $name1 ang gumawa ng proyektong ito*.',
    'Maganda ang panahon noong Biyernes ng hapon*.',
    'Pumunta sa palaruan sina $name1 at $name2*.',
    'Sumali sa patintero ang iba pang mga bata*.',
    'May lakbay-aral kami sa museo sa Biyernes*.',
    'Ano kaya ang nilutong ulam ni Nanay*?',
    'Kailan ka maglilinis ng iyong silid*?',
    'Dapat bang magpakilala ako sa mga bisita*?',
    'Kanino ba makukuha ang mga sahog ng pagkain*?',
    'Sasama na ba ang mga bata sa pamamasyal doon*?',
    'Sino ang maghahatid ng sulat na ito*?',
    'Paano mo nasabing galit kanina ang guro mo*?',
    'Saan mo binili ang bago mong sapatos*?',
    'Kailan mo ipapasa ang iyong proyekto*?',
    'Bakit tabingi ang tahi ng iyong blusa*?',
    'Kanino kayo lumapit upang humingi ng tulong*?',
    'Anong bansa ang iyong pangarap na marating*?',
    'Kanino mo namana ang iyong maputing kutis*?',
    'Nakopya mo ba ang takdang-aralin sa pisara*?',
    'Paano kaya tayo makakatulong sa kanila*?',
    'Susunduin ba tayo nina $name1 mamayang gabi*?',
    'Ay*, saksakan ng dilim pala rito+!',
    'Aba*, may nakapasok na matsing sa pinto+!',
    'Wow*, napakasarap naman ng luto mo+!',
    'Hoy*, bawal magtapon ng basura riyan+!',
    'Ay*, nabasag ang antigong garapon+!',
    'Aba*, may malaking buwaya rito+!',
    'Mga kapitbahay*! Tulungan n\'yo kami+!',
    'Naku*, nahulog yung $item sa ilog+!',
    'Aba*, ang dami n\'yo palang kuting+!',
    'Ay*, mababasa ang mga sampay ko+!',
    'Bilis! Pumasok na tayo sa loob*!',
    'Yehey*, nanalo kami sa paligsahan+!',
    'Sa wakas*, nakuha ko rin ang tamang sagot+!',
    'Naku*, nakalimutan ko ang aking aklat+!',
    'Wow*, ang ganda naman ng damit mo+!',
    'Yehey*! Panalo tayo sa basketbol+!',
    'Pakisauli mo naman ang aking $item*.',
    'Umuwi kayo bago lumubog ang araw*.',
    'Puntahan mo kaagad ang punong-guro*.',
    'Bumili ka ng bigas kina Aling Neneng*.',
    'Sagutin mo agad ang liham ni $name1*.',
    'Pakiabot sa akin ang mapa ng Pilipinas*.',
    'Pakitulungan ang matanda sa pagsakay*.',
    'Pakibigay mo naman ito sa iyong guro*.',
    'Pakikuha nga ang gamot sa loob ng bahay*.',
    'Pakikuha ang mga pinamili sa sasakyan*.',
    'Ihawin ninyo ang mga isdang binili natin*.',
    'Magluto ka ng gulay para sa tanghalian*.',
],
4 => [
    'Opo*, Inay+. Kailangan ko na pong umalis ngayon=.',
    'Maraming tanim na prutas at gulay ang aking lolo*.',
    'Nanalo siya sa paligsahan ng mga manlalaro sa lungsod*.',
    'Magkikita-kita ang aming pamilya pagdating ni $name1*.',
    'Si Jose Rizal ay kinikilalang bayani ng ating lahi*.',
    'Ang aking mga magulang ay mula sa lalawigan ng Masbate*.',
    'Malaki ang lupang sakahan ng aking mga magulang*.',
    'Higit na mas mahaba ang buhok ni $name1 kay $name2*.',
    'Higit sampung beses na akong nakarating ng Bicol*.',
    'Maputi ang kanyang kutis at singkit ang kanyang mga mata*.',
    'Nagdarasal muna kami bago kami kumain ng hapunan*.',
    'Nagbaon ako ng payong dahil baka umulan mamayang hapon*.',
    'Mabigat ang trapiko kaya nahuli ako sa klase ngayong umaga*.',
    'Nawalan ng kuryente ang barangay nina $name1 kagabi*.',
    'Ginawa ko na ang takdang-aralin natin sa Filipino*.',
    'May natutunan ba kayo sa lakbay-aral natin ngayon*?',
    'May balak ba kayong puntahan ngayong bakasyon*?',
    'Gumawa ka na ba ng takdang-aralin sa sining*?',
    'Bakit ka ba nakatayo sa ilalim ng puno ng mangga*?',
    'Sinu-sino ang pumunta sa piging na iyong dinaluhan*?',
    'Saang probinsya ipinanganak ang iyong mga magulang*?',
    'Sino ang nagbigay sa inyo ng pondo para sa proyektong ito*?',
    'Ano ba ang kulay ng sasakyan ninyo, pula o puti*?',
    'Mahilig ba sa maanghang na pagkain ang mga Bicolano*?',
    'Alin ang gustong inumin ni $name1, mainit na kape o tsaa*?',
    'Aling kamiseta ang isusuot mo, ang puti o ang asul*?',
    'Maliligo ka na ba ngayon o magpapahinga ka muna*?',
    '$name1*, nanood ka ba ng balita sa telebisyon kagabi+?',
    '$name1*, handa na ba ang uniporme ko para bukas+?',
    '$name1*, gusto pa ba ninyong maglaro ng habulan+?',
    'Wow*, gusto ko ring makapunta ng Mindanao+!',
    'Yehey*, nakapasa ako sa ating pagsusulit+!',
    'Wow*! Napakasarap naman ng niluto mong pagkain+!',
    'Lagot*, nabasag mo pala ang mamahaling plorera+!',
    'Aba*, kailangang maibalik natin ito sa inahin+!',
    'Yehey*, nakapuntos na naman si $name1 mula sa malayo+!',
    'Naku*, nahulog ang mamahaling relo ni $name1 sa ilog+!',
    'Yippie*, magaling nang magbasa ang aking kapatid+!',
    'Naku*, nakalimutan kong kunin ang aking sukli+!',
    'Naku*, nakalimutan kong dalhin ang kamera ko+!',
    'Nay*! Tatamaan si $name1 ng natutumbang puno+!',
    '$name1*, umupo ka rito habang binabasa mo ito+.',
    'Manong*, pakiabot po ang bayad ko sa drayber+.',
    '$name1*, pakikuha ang mga posporo at kandila sa kusina+.',
    '$name1*, makinig kang mabuti sa mga magulang mo+.',
    '$name1*, pakibasa ang nakasulat sa ibaba ng larawan+.',
    '$name1*, tanungin mo sila kung gusto nilang sumali+.',
    'Maglinis ka ngang mabuti rito sa opisina*.',
    'Ipasok mo muna ang mga sisiw sa loob ng bahay*.',
    'Ipakita mo sa akin sa globo kung nasaan ang bansang Turkey*.',
    'Bisitahin ninyo ang lolo at lola ninyo sa probinsya*.',
    'Pakikuha mo nga yung mga papeles para sa ating kliyente*.',
    'Pakisabi po kay Nanay na nasa palaruan po kami*.',
    'Pakisabi po sa akin kung may nakita kayong tuta*.',
],
5 => [
    'Nagpasalamat nang paulit-ulit ang pulubi sa babaeng nagbigay ng limos sa kanya*.',
    'Ang mahiyaing kuting ng kapitbahay ay nagtatago sa likod ng kanilang aparador*.',
    'Isang napakalawak na bukirin ang ipinamana ng ama sa kanyang mga anak*.',
    'Masayang nanood ng kanilang paboritong palabas ang mga kapatid ni $name1*.',
    'Mahimbing pa rin ang tulog ni $name1 kahit napakalakas ng tilaok ng mga manok*.',
    'Nagmadaling pumunta si $name1 sa istasyon ngunit hindi niya naabutan ang tren*.',
    'Alin sa tingin mo ang pinakamagandang larawan sa mga kuha ni $name1*?',
    'Talaga bang ikaw lang ang gumawa ng proyektong pang-agham na ito*?',
    'May balita ka bang narinig sa radyo tungkol sa parating na bagyo*?',
    'Sumulat na ba kayo ng sanaysay tungkol sa ating lakbay-aral*?',
    '$name1*, maaari mo bang turuang maglaro ng ahedres ang mga bata+?',
    'Saan-saan matatagpuan ang magagandang tanawin ng Pilipinas*?',
    'Kailan ang huling pagsusulit para sa kasalukuyang semester*?',
    'Gusto ba nilang maglaro sa palaruan kanina kaya sila lumabas ng bahay*?',
    'Ano ba ang maaari mong maitulong habang abala sa pagluluto ang nanay mo*?',
    'Makagigising ka ba nang maaga bukas para maumpisahan na natin ang labada*?',
    'Alin dito ang dadalhin mo bukas, ang itim na pantalon o ang bagong maong*?',
    'Alin ang mas gusto mong gawin, manood ng sine o maglaro ng basketbol*?',
    'Magaling*, nasagot mo ang mga pinakamahihirap na tanong sa pagsusulit+!',
    'Naku*, naghahabulan na naman sa bakuran ang aso at pusa ni $name1+!',
    'Astig*, ang galing naman ng porma nyong magkakaibigan ngayong araw+!',
    'Lagot*, nabasag ko ang antigong iskulturang iniingatan ng nanay ko+!',
    '$name1*, diligan mong mabuti ang mga halaman sa ating hardin mamaya+.',
    '$name1*, tiyakin mong makararating ang paketeng ito kay $name2 mamayang gabi+.',
    'Kunin mo ang mga halaman sa hardin at dalhin mo sa ating silid-aralan*.',
    'Bilhan mo ng regalo si Lola dahil ipagdiriwang niya ang kanyang kaarawan*.',
    'Tumawag ka ulit mamayang alas-otso dahil gusto ka niyang makausap*.',
    'Maghugas ka na ng mga pinagkainan habang natutulog si $name1*.',
    'Sabihin mo na sa kanya ang katotohanan para hindi siya magalit sa atin*.',
    'Uminom ka na ng gamot ngayong umaga para mawala ang sakit ng ulo mo*.',
],
6 => [
    'Dahil hindi ka kumain ng almusal, wala kang enerhiya para maglaro ngayong umaga*.',
    'Kung nais niyang mabago ang kanyang buhay, kailangan niyang maghanap ng trabaho*.',
    'Si $name1 ang kakanta dahil siya ang pinakamagaling na mang-aawit sa klase natin*.',
    'Sa panahon ng krisis, tumataas ang presyo ng mga bilihin at ang bayad sa kuryente*.',
    'Nais niyang makakuha ng mataas na marka sa pagsusulit kaya nag-aaral siya gabi-gabi*.',
    'Tumawag ako sa bahay nina $name1 ngunit hindi pa raw siya umuuwi galing sa paaralan*.',
    'Tuwang-tuwa si $name1 habang ipinagmamalaki niya ang mga larawan ng kanyang anak*.',
    'Mamimingwit ba sana si $name1 ng isda kung hindi siya natakot sa malalakas na alon*?',
    'Manonood ka ba ng balita sa telebisyon o pakikinggan mo na lang ang balita sa radyo*?',
    'Paano kaya ako makapag-iipon ng pera para makabili ako ng mga bagong aklat sa pasukan*?',
    'Kung gusto kong gumaling sa pagtugtog ng piyano, may maitutulong ba ang pagsasanay tuwing hapon*?',
    'Si Itay ba ang magdadala kina $name1 at $name2 sa sentrong pangkalusugan bukas ng umaga*?',
    'Lagot*! Nabasag natin ang lahat ng mga bote ng suka sa likod ng sasakyan+!',
    'Naku*, napasobra ang pait ng niluluto kong pinakbet para sa kanilang hapunan+!',
    'Ay*, nanghahabol na naman ng mga kawawang manok ang dambuhalang aso ng kapitbahay+!',
    'Aba*, saksakan pala ng laki ang nabingwit mong tilapya sa lawa kagabi+!',
    'Tawagan mo ang mga magulang ni $name1 upang madala agad siya sa manggagamot*.',
    'Paghaluhaluin mo ang mga sangkap na iyan sa isang kaldero at isalang mo ito sa apoy*.',
    'Huwag mong ipahalatang kinakabahan ka at lakasan mo ang boses mo kapag kausap mo na sila*.',
    '$name1*, kunin mo ang mga halaman sa hardin at dalhin mo sa ating silid-aralan+.',
    '$name1*, bilhan mo ng regalo si Lolo dahil ipagdiriwang niya ang kanyang kaarawan+.',
    'Uminom ka na ng gamot ngayong umaga*, $name1+, para mawala ang sakit ng ulo mo=.',
    '$name1*, ipakita mo kina tatay at nanay ang marka mo sa pagsusulit para matuwa sila+.',
    'Maghanda ka na ng mga kandila at baterya*, $name1+. Malapit na raw dumating ang bagyo=.',
    '"Magandang umaga po sa inyo*," magalang na pagbati ni $name1 sa lahat+.',
    '"Ako po si $name1 Santos*," malumanay na pagpapakilala ni $name1 sa kanila+.',
    '"Hoy*! Bawal magtapon ng basura riyan+!" pasigaw na sinabi ng kapitan=.',
    '"Ako ba ang pinagbibintangan mo*? Hindi ako ang nagkalat diyan+!" pahiyaw na tanggi ni $name1=.',
    'Magaling*! Alam mo bang ikaw lang ang nakasagot sa mga mahihirap kong tanong+?',
],
];
$names=array(
"Adam", "Adrian", "Alex", "Alexander", "Andrew", "Angelo", "Benjamin", "Brandon", "Caleb", "Cameron", "Carlos", "Carson", "Carter", "Charles", "Christopher", "Daniel", 
"David", "Diego", "Dominic", "Dylan", "Elijah", "Ethan", "Gabriel", "Hayden", "Ian", "Isaac", "Isaiah", "Jack", "Jacob", "Jaden", "James", "Jason", "Jose", "John", "Jonathan", 
"Joseph", "Joshua", "Juan", "Julian", "Justin", "Kevin", "Logan", "Lucas", "Luis", "Luke", "Matthew", "Max", "Michael", "Nathan", "Nicholas", "Noah", "Oliver", "Owen", "Parker", 
"Robert", "Ryan", "Samuel", "Sebastian", "Thomas", "Tristan", "William",
"Alexandra", "Alyssa", "Amelia", "Andrea", "Anna", "Ariana", "Arianna", "Bella", "Brooke", "Camille", "Caroline", "Chloe", "Claire", "Elizabeth", "Emma", "Eva", "Evelyn", 
"Gabriela", "Grace", "Hannah", "Isabella", "Jasmine", "Jocelyn", "Jolina", "Julia", "Katherine", "Kylie", "Lauren", "Layla", "Leah", "Lillian", "Lydia", "Madeline", "Maria", 
"Mariah", "Melanie", "Mia", "Naomi", "Natalie", "Olivia", "Samantha", "Sarah", "Sofia", "Stella", "Tina", "Victoria"
);
$items=array(
"kaldero","kawali","kulambo","martilyo","palanggana","pamaypay","payong","platito"
);

function pbt_question(string $raw, int $tier, string $lvl, int $grd, array $names, array $items): array {
    shuffle($names);
    $raw = strtr($raw, ['$name1'=>$names[0], '$name2'=>$names[1], '$item'=>$items[array_rand($items)]]);
    $parts = preg_split('/[*+=<]([.,?!])/', $raw, -1, PREG_SPLIT_DELIM_CAPTURE);
    $segments = []; $correct = '';
    foreach ($parts as $i => $part) {
        if ($i % 2 === 0) $segments[] = $part;
        else $correct .= $part;
    }
    return ['segments'=>$segments,'correct'=>$correct,'tier'=>$tier,'lvl'=>$lvl,'grade'=>$grd,'qid'=>bin2hex(random_bytes(16))];
}
function pbt_render(array $cur, ?string $answer = null, bool $highlight = false): string {
    $html = '';
    foreach ($cur['segments'] as $i => $segment) {
        $html .= pbt_h($segment);
        if ($i >= strlen($cur['correct'])) continue;
        if ($answer === null) {
            $html .= '<input type="text" name="answer[]" maxlength="1" pattern="[.,?!]" required autocomplete="off" aria-label="Bantas '.($i+1).'" '.($i===0?'autofocus':'').' style="display:inline-block;width:30px;height:36px;padding:0;box-sizing:border-box;text-align:center;vertical-align:baseline;font:700 20pt Arial,sans-serif;color:#0000CC;background:white;border:2px solid #888;border-radius:5px;">';
        } else {
            $mark = pbt_h($answer[$i]);
            $html .= $highlight ? '<strong style="color:#CC0066;">'.$mark.'</strong>' : $mark;
        }
    }
    return $html;
}
$tier = pbt_tier($lvl,$grd);
$result = null; $scorer = null; $error = '';
$cur = $_SESSION[$sessionKey]['current'] ?? null;
if (isset($_POST['Submit1']) && !isset($_POST['Submit2']) && $cur && $cur['grade']===$grd && is_string($_POST['qid'] ?? null) && hash_equals($cur['qid'],$_POST['qid'])) {
    $answers = $_POST['answer'] ?? null;
    if (!is_array($answers) || count($answers)!==strlen($cur['correct'])) $error='Punan ang lahat ng kahon ng wastong bantas.';
    else {
        foreach ($answers as $a) if (!is_string($a) || !in_array($a,['.',',','?','!'],true)) $error='Punan ang lahat ng kahon ng wastong bantas.';
    }
    if ($error==='') {
        $answer=implode('', $answers);
        $scorer=new Scorer($conn,$moduleId);
        $result=['answer'=>$answer,'correct'=>$scorer->processAnswer($answer,$cur['correct'],$cur['lvl'])];
        unset($_SESSION[$sessionKey]['current']);
    }
}
if ($result===null && $error==='' && (isset($_POST['Submit2']) || !$cur || $cur['tier']!==$tier || $cur['lvl']!==$lvl || $cur['grade']!==$grd)) {
    $indices=array_keys(array_unique($banks[$tier]));
    $used=$_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available=array_values(array_diff($indices,$used));
    if (!$available) { $used=[]; $available=$indices; }
    $i=$available[array_rand($available)]; $used[]=$i;
    $_SESSION[$sessionKey]['used'][$tier]=$used;
    $cur=pbt_question($banks[$tier][$i],$tier,$lvl,$grd,$names,$items);
    $_SESSION[$sessionKey]['current']=$cur;
}
$theme=[]; render_header($moduleTitle,$moduleTitle,$theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo pbt_h($_SERVER['PHP_SELF']); ?>">
<?php if ($result!==null): ?>
<p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang pagbabantas na ginawa mo ay ganito:<br/><span style="color:#800080;font-weight:normal;"><?php echo pbt_render($cur,$result['answer']); ?></span></p>
<p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct']?'#006600':'#CC0000'; ?>;"><?php echo $result['correct']?'&#9989; Ito ay tumpak!':'&#10060; Ito ay hindi tumpak.'; ?></p>
<p style="font-size:14pt;color:#800080;">Ang tamang pagbabantas ay ganito:</p>
<div style="text-align:center;margin:20px auto;"><span class="pbt-hug" style="display:inline-block;width:480px;max-width:100%;padding:30px 40px;text-align:center;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font:700 16pt/1.5 Arial,sans-serif;color:#800080;text-wrap:wrap;overflow-wrap:anywhere;"><?php echo pbt_render($cur,$cur['correct'],true); ?></span></div>
<?php else: ?>
<input type="hidden" name="qid" value="<?php echo pbt_h($cur['qid']); ?>">
<div style="text-align:center;margin:20px auto;"><span class="pbt-hug" style="display:inline-block;width:480px;max-width:100%;padding:30px 40px;text-align:center;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font:700 17pt/1.8 Arial,sans-serif;color:#800080;text-wrap:wrap;overflow-wrap:anywhere;"><?php echo pbt_render($cur); ?></span></div>
<p style="font-size:16pt;color:#800080;font-weight:600;max-width:450px;margin:20px auto;">Bantasan ang (mga) pangungusap sa itaas.</p>
<?php if ($error!==''): ?><p style="color:#CC0000;"><?php echo pbt_h($error); ?></p><?php endif; ?>
<?php endif; ?>
<div style="display:flex;justify-content:center;align-items:center;gap:20px;margin:<?php echo $result===null?'20px 0 20px':'50px 0 50px'; ?>;">
<?php if ($result===null): ?><input type="submit" name="Submit1" value=" Submit " style="font-family:Arial,sans-serif;"><?php endif; ?>
<input type="submit" name="Submit2" value=" Bagong Tanong " formnovalidate style="font-family:Arial,sans-serif;">
</div>
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
        document.querySelectorAll('.pbt-hug').forEach(box => {
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
            for (const input of box.querySelectorAll('input')) {
                const r = input.getBoundingClientRect();
                const keys = Array.from(lines.keys()).filter(y => y >= r.top - 5 && y <= r.bottom);
                const y = keys.length ? keys[0] : Math.round(r.top);
                const line = lines.get(y) || {left:r.left,right:r.right};
                line.left=Math.min(line.left,r.left); line.right=Math.max(line.right,r.right); lines.set(y,line);
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
