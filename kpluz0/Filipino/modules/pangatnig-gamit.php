<?php
// filipino/modules/pangatnig-gamit.php
// Five grade-dependent sentence-template banks.

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
$moduleTitle = 'Paggamit ng Tamang Pangatnig';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$baseTier = $grd <= 4 ? 1 : ($grd <= 7 ? 2 : 3);
$tiers = $lvl === 'Easy' ? [$baseTier] : ($grd <= 1 ? [2] : [$baseTier+1, $baseTier+2]);
$tier = implode('-', $tiers);
function pg_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    'at>Dati ay mahaba ____ kulot ang kanyang buhok.+o*dahil',
    'at>Naghahabulan sa bakuran ang aso ____ pusa ni Hannah.+o*nang',
    'at>Mahusay gumuhit ____ magpinta si $name1.+o*dahil',
    'at>Maputi ang kanyang kutis ____ singkit ang kanyang mga mata.+o*dahil',
    'bago>Magdasal muna tayo ____ tayo kumain ng hapunan.+kaya*dahil',
    'dahil>Magbaon ka ng payong ____ baka umulan mamayang hapon.+kapag*pero',
    'habang>Mahilig siyang sumayaw ____ kumakanta.+pero*dahil',
    'habang>Si $name1 ay kumakanta ____ si $name2 ay sumasayaw.+upang*para',
    'kaya>Mabigat ang trapiko ____ nahuli ako sa klase.+para*dahil',
    'kaya>Basa ang sahig ng pasilyo ____ nadulas ang bata.+para*ngunit',
    'kapag>Maaari tayong tumawid ____ berde na ang ilaw.+hanggang*upang',
    'kasi>Inaantok ka pa ____ hatinggabi ka na natulog kagabi.+habang*bago',
    'kung>Pupunta lang ako sa party ____ sasama ka sa akin.+at*o',
    'nang>Nagising si $name1 ____ tumilaok ang manok.+upang*ngunit',
    'ngunit>Pagod na si $name1 ____ hindi siya makatulog.+habang*para',
    'ngunit>Maganda nga ang dalaga ____ masungit naman siya.+sapagkat*dahil',
    'pero>Gusto ko nang umuwi ____ hindi pa dumarating ang sundo ko.+dahil*kaya',
    'o>Magbabasa ba ako ng aklat ____ manonood ng telebisyon?+upang*para',
    'o>Alin ang gustong inumin ni $name1, mainit na kape ____ tsaa?+at*habang',
    'o>Aling kamiseta ang isusuot mo, ang puti ____ ang asul?+at*nang',
    'o>Kakain ka pa ba ng tsampurado ____ busog ka na?+at*ngunit',
    'o>Ano ang kulay ng sasakyan ninyo, pula ____ puti?+at*pero',
    'o>Maliligo ka na ba ____ magsisipilyo ka muna?+at*kung',
],
2 => [
    'at>Dadalhin ko ang itim na maleta ____ ang pulang bag sa eroplano.+pero*habang',
    'at>Magaling umawit si $name1 ____ mahusay tumugtog ng gitara si Dean.+upang*para',
    'at>Mahilig siya magbasa ng aklat ____ magsulat ng maiikling kuwento.+ngunit*sapagkat',
    'dahil>Tayo nang bumisita kay $name1 ____ kaarawan niya ngayon.+pero*subalit',
    'dahil>Umiiyak ang bata ____ tinutukso siya ng mga kalaro niya.+ngunit*bagamat',
    'habang>Naglilinis siya ng silid ____ nakikinig siya sa radyo.+hanggang*palibhasa',
    'habang>Si $name1 ang titingin sa mapa ____ nagmamaneho si $name2.+pero*bagamat',
    'habang>Kumakanta ang babae ____ pinapaliguan niya ang kanyang sanggol.+upang*pero',
    'habang>Nagluluto ng adobong baboy si $name1 ____ nagsasaing si nanay.+upang*para',
    'hanggang>Naglaro kami ng basketbol sa labas ____ tinawag kami ni Tatay.+dahil*para',
    'kahit>Gusto pa rin nilang maglaro ng basketbol ____ gumagabi na.+dahil*para',
    'kapag>Hindi kumikibo si $name1 ____ malapit si $name2 sa kanya.+upang*subalit',
    'kapag>Tumatahol ang mga aso ____ may taong kumakatok sa pinto.+ngunit*hanggang',
    'kaya>Napakalakas ng tunog ng kulog ____ napasigaw ang magkakapatid.+pero*subalit',
    'kung>Sasama ako sa inyong mamasyal ____ maaga tayong makakauwi.+habang*ngunit',
    'kung>Sasama ako sa inyo manood ng sine ____ papayagan ako ni Nanay.+ngunit*habang',
    'kung>Matutuloy ang camping natin ____ hindi masama ang panahon bukas.+subalit*at',
    'nang>Tumigil ang pag-iyak ng bata ____ bumalik ang kanyang ina.+bagamat*subalit',
    'ngunit>Magluluto sana ako ng pansit ____ kulang ang aking sahog.+kaya*dahil',
    'ngunit>Mamamasyal sana si $name1 ngayon ____ bigla siyang nagkasakit.+kaya*dahil',
    'Sapagkat>____ mahiyain siya, hindi siya sumagot sa tanong ng guro.+Ngunit*Upang',
    'sapagkat>Huwag mo siyang tularan ____ masama ang ginagawa niya.+subalit*hanggang',
    'subalit>Bibili sana ako ng makakain ____ kulang ang aking pera.+kaya*dahil',
    'subalit>Sasabay sana ako kay $name1 pauwi ____ nakaalis na pala siya.+para*dahil',
    'o>Alin ang mas gusto mong gawin, manood ng sine ____ kumain sa labas?+habang*kung',
    'o>Si Tatay ____ si $name1 ang susundo sa inyo sa paaralan mamayang hapon.+pero*dahil',
    'para>Nag-iipon si $name1 ng pera ____ makabili siya ng $item.+dahil*ngunit',
    'para>Marami ang kakainin ko ____ hindi ako magutom sa mahabang biyahe.+habang*pero',
    'para>Tatawag muli si $name1 ____ makausap ka tungkol sa proyekto ninyo.+kasi*bago',
    'subalit>Salamat sa regalo mo ____ sa Disyembre pa ang kaarawan ko.+sapagkat*dahil',
    'upang>Tumigil ang mga sasakyan ____ makatawid ang mga tao sa lansangan.+dahil*pero',
    'upang>Dinala namin si $name1 sa klinika ____ agad siyang masuri ng doktor.+ngunit*at',
],
3 => [
    'at>Lapis, pambura, ____ pantasa lang ang kailangan kong dalhin sa pagsusulit.+habang*pero',
    'at>Si $name1 ay bumili ng sariwang gulay ____ mga hinog na mangga sa palengke.+ngunit*pero',
    'bagamat>Hindi niya makuha ang tamang sagot ____ nakinig siya sa sinabi ng guro.+para*habang',
    'dahil>Wala akong tiwala kay $name1 ____ madalas siyang magsinungaling sa akin.+pero*bagamat',
    'dahil>Maraming kaibigan si $name1 ____ lagi mong maaasahan ang tulong niya.+ngunit*subalit',
    'dahil>Hindi pumasok sa paaralan si $name1 ____ sumakit ang kanyang ngipin.+hanggang*upang',
    'dahil>Hindi ako nakatulog kagabi ____ masyadong maingay ang aking kapitbahay.+ngunit*para',
    'habang>Naglalaro ang anak niya sa labas ____ may kinakausap siya sa telepono.+pero*para',
    'hanggang>Naghintay si Nanay sa sala ____ dumating si Tatay mula sa opisina.+upang*kaya',
    'kahit>Pinagalitan ang mga mag-aaral ____ hindi sila ang nagsimula ng away.+dahil*hanggang',
    'kung>Tawagan mo ako sa opisina ____ may dumating na sulat mula kay $name1.+pero*kaya',
    'kung>Sasama ako sa inyo manood ng sine ____ papayagan ako ng aking mga magulang.+pero*kaya',
    'ngunit>Magtitimpla ako ng kape para kay Tatay ____ walang mainit na tubig.+dahil*upang',
    'o>Si Tita Mia ____ si Ate Lisa ang sasama sa aming klase sa lakbay-aral.+habang*sapagkat',
    'o>Alin dito ang dadalhin mo bukas, ang itim na pantalon ____ ang bagong maong?+at*pero',
    'para>Gigising ako nang maaga bukas ____ maumpisahan ko na ang labada.+dahil*sapagkat',
    'para>Magsasanay ako tuwing hapon ____ gumaling ako sa pagtugtog ng piyano.+pero*dahil',
    'para>Mag-iipon ako ng pera ____ makabili ako ng mga bagong aklat sa pasukan.+dahil*ngunit',
    'para>Uuwi ako nang maaga ____ matulungan ko si Nanay sa mga gawaing bahay.+dahil*subalit',
    'subalit>Magaling siya maglaro ng basketbol ____ mas gusto niya ang taekwondo.+dahil*para',
    'upang>Tumigil munang magtrabaho si $name1 ____ siya ay makapagpahinga.+habang*ngunit',
    'upang>Mag-aaral ako nang mabuti ____ mataas ang makuha kong marka sa pagsusulit.+dahil*pero',
    'subalit>Maganda ang bestidang suot mo ____ hindi ito bagay sa sapatos na iyan.+dahil*sapagkat',
],
4 => [
    'Bago>____ natulog ang mga anak niya, nagbasa siya ng kuwento para sa kanila.+Samantalang*Habang',
    'at>Lalabhan ko ang damit ni $name1 ____ paplantsahin ko ang uniporme ni $name2.+upang*hanggang',
    'hanggang>Tumakbo nang tumakbo ang usa ____ nakarating ito sa gitna ng gubat.+habang*samantalang',
    'kahit>Sumali sa paligsahan si $name1 ____ sinabi nila na wala siyang pag-asang manalo.+para*dahil',
    'dahil>Itinaas ni $name1 ang kanyang kamay ____ alam niya ang sagot sa tanong ng guro.+pero*subalit',
    'at>Sa panahon ng krisis, tumataas ang presyo ng mga bilihin ____ ang bayad sa kuryente.+nang*dahil',
    'dahil>Si $name1 ang kakanta ____ siya ang pinakamagaling na mang-aawit sa klase natin.+ngunit*pero',
    'dahil>Maghanda na tayo ng mga kandila at baterya para sa plaslayt ____ malapit na ang bagyo.+upang*pero',
    'Dahil>____ hindi ka kumain ng almusal, wala kang enerhiya para maglaro ngayong umaga.+Subalit*Kaya',
    'kaya>Mataas ang lagnat ni $name1 ____ tinawagan ni Bb. Garcia ang kaniyang mga magulang.+sapagkat*ngunit',
    'kaya>Nais niyang makakuha ng mataas na marka sa pagsusulit ____ nag-aaral siya gabi-gabi.+ngunit*sapagkat',
    'kung>Mas mainam na tumawag ka ulit mamayang alas-otso ____ nais mo siyang makausap.+hanggang*ngunit',
    'habang>Kumakanta sila ng \'Lupang Hinirang\' ____ itinataas ang watawat ng Pilipinas.+hanggang*ngunit',
    'ngunit>Tumawag ako sa bahay nina $name1 ____ hindi pa raw siya umuuwi galing sa paaralan.+kapag*upang',
    'ngunit>Gusto ko sanang sabihin sa kanya ang katotohanan ____ ayaw kong magalit siya sa akin.+upang*hanggang',
    'ngunit>Nagmadaling pumunta si $name1 sa istasyon ____ hindi niya naabutan ang tren.+hanggang*upang',
    'ngunit>Kumukulo na ang tiyan ko sa gutom ____ hindi pa luto ang paborito kong ulam.+upang*hanggang',
    'ngunit>Uminom na ako ng gamot kaninang umaga ____ masakit pa rin ang ulo ko hanggang ngayon.+sapagkat*dahil',
    'ngunit>Nais sanang manisid ni $name1 ng mga tulya ____ bigla siyang natakot sa malalakas na alon.+kaya*dahil',
    'o>Manonood ka ba ng balita sa telebisyon ____ pakikinggan mo na lang ang balita sa radyo?+dahil*upang',
    'pero>Gusto nilang maglaro sa palaruan ____ pinagbawalan silang lumabas ng bahay.+hanggang*sapagkat',
    'samantalang>Wala kang ginagawa diyan ____ kanina pa abalang-abala sa pagluluto ang nanay mo.+upang*dahil',
    'subalit>Matalinong bata si $name1 ____ hindi mataas ang marka niya sa nakaraang pagsusulit.+dahil*kaya',
    'subalit>Nais kong sumama sa inyo sa mall ____ kailangan kong tapusin ang proyekto ko.+upang*sapagkat',
    'subalit>Gusto ni $name1 sumamang lumangoy ____ natatakot siya sa malalakas na alon ng dagat.+dahil*upang',
    'upang>Magsipilyo nang tatlong beses sa isang araw ____ maiwasang masira ang mga ngipin.+ngunit*dahil',
    'nang>Ang malaking isda ay pilit na nagpumiglas ____ dakmain ito ng isang dambuhalang agila.+para*kung',
],
5 => [
    'pero>Natuto na akong magluto ng pinakbet dati ____ limot ko na ngayon ang mga sangkap na ginagamit dito.+dahil*sapagkat',
    'Dahil>____ nais niyang mag-aral sa kolehiyo, naghanap siya ng trabaho upang makatulong sa pamilya.+Subalit*Bagamat',
    'kahit>Mahimbing pa rin ang tulog ni $name1 ____ napakalakas ng tilaok ng mga manok sa kanyang bakuran.+sapagkat*dahil',
    'dahil>Bibisitahin natin si lola sa Sabado ____ ipagdiriwang natin ang kanyang ikasiyamnapung kaarawan.+para*subalit',
    'subalit>Matatapos na sana ni $name1 ang kanyang kurso ____ nagamit niya ang perang pambayad sa matrikula.+kaya*dahil',
    'habang>Naghuhugas ng mga bote at tsupon si $name1 ____ natutulog nang mahimbing ang kanyang sanggol.+ngunit*bagamat',
    'para>Ipakikita ko kina tatay at nanay ang marka ko sa pagsusulit ____ makita nila na nagsisikap ako sa pag-aaral.+ngunit*sapagkat',
    'samantalang>Naghihirap magtrabaho ang mga magulang mo ____ inaaksaya mo lang ang perang bigay nila sa iyo.+kasi*hanggang',
    'upang>Inialay ng mga sundalong Pilipino ang kanilang buhay ____ ipagtanggol ang Pilipinas sa mga mananakop.+ngunit*sapagkat',
    'upang>Si $name1 ay nag-aaral nang mabuti ____ siya ang maging unang miyembro ng kanyang pamilya na tapos ng kolehiyo.+ngunit*bagamat',
    'sapagkat>Hindi matutuloy ang lakbay-aral natin sa Biyernes ____ may parating na malakas na bagyo sa ating lalawigan.+bagamat*habang',
    'sapagkat>Si $name1 ang nahirang na maging kalahok sa paligsahan ____ siya ang pinakamagaling na manunulat sa ating klase.+upang*subalit',
    'sapagkat>Nais niyang makapasok sa isang \'aviation college\' ____ matagal na niyang pinapangarap ang maging isang magaling na piloto.+upang*subalit',
    'Kung>____ hindi niya maisasakatuparan nang maayos ang kanyang tungkulin, maaaring bumagsak ang kanilang kumpanya.+Ngunit*Upang',
    'dahil>Nag-eensayo araw-araw ang mga estudyanteng magtatanghal ____ ayaw nilang mapahiya sa mga magulang.+para*subalit',
    'Upang>____ maging mas mabilis ang pag-unlad ng ating bansa, kailangan nating maglaan ng mas malaking pondo para sa edukasyon.+Habang*Kaya',
    'Para>____ maiwasan ang pagkalat ng iba\'t ibang sakit, nagpadala ang mga opisyal ng mga manggagamot sa mga binahang lugar.+Ngunit*Habang',
    'Nang>____ matapos ang napakalakas na lindol, nasaksihan ni $name1 ang pighating dulot nito sa mga mamamayan ng lalawigan.+Para*Kung',
    'ngunit>Matagal na pagsasaliksik ang ginawa ni $name1 ____ hindi pa rin niya nabigyan ng solusyon ang problema.+sapagkat*upang',
    'at>Si Propesor Santos ang nagsimula ng proyekto ____ ang kanyang mga paboritong estudyante ang nagtuloy nito.+nang*dahil',
    'ngunit>Malaking halaga na ang nagastos ng pamahalaan sa paglilinis ng mga estero ____ hanggang ngayo\'y bumabaha pa rin sa aming lugar.+kaya*upang',
    'ngunit>Alam ni $name1 ang kahalagahan ng edukasyon ____ malaking sagabal sa kanyang pag-aaral ang kanyang sakit.+para*upang',
    'subalit>Nag-aral si $name1 nang tatlong araw para sa kanyang pagsusulit ____ mababa pa rin ang nakuha niyang marka rito.+kaya*dahil',
    'kaya>Binuksan na ang bagong paaralan sa kanilang barangay ____ hindi na nila kailangang maglakad nang malayo tuwing umaga.+kung*dahil',
    'dahil>Hindi na nakita pang muli ni $name1 ang kanyang kaibigang matalik ____ dinala na siya ng kapalaran sa kabilang panig ng mundo.+bagamat*subalit',
    'Bagamat>____ matagal na siyang hindi nagagawi sa kanyang kinalakhang lungsod, kabisado pa rin niya hanggang ngayon ang mga pasikot-sikot dito.+Kaya*Subalit',
    'para>Si $name1 ay bumili ng kamera at nag-aral manguha ng mga larawan ____ makapaghanapbuhay bilang isang litratista.+dahil*kaya',
    'kaya>Nasaksihan ni $name1 ang nangyaring krimen at ipinagbigay-alam niya ito sa mga pulis ____ agad na nadakip ang salarin.+dahil*upang',
],
];
$banks = [$tier => []];
foreach ($tiers as $t) foreach ($sourceBanks[$t] as $entry) $banks[$tier][] = [$entry, $t];
function pg_question($entry, $tier, $lvl) {
$arrnum = $entry[1];
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

	
$animals0[1]=array(
"aso","baka","ibon","isda","itik","kabayo","manok","pagong","pusa","tuta",
);
$animals0[2]=array(
"alakdan","bayawak","bubuli","buwaya","gagamba",
);

if ($arrnum<=3){$animals=$animals0[1];}
else{$animals=$animals0[2];}
$count=count($animals)-1;
$animal=$animals[(rand(0,$count))]; 

$items0[1]=array(
"aklat","baso","lapis","tasa"
);
$items0[2]=array(
"kaldero","kawali","kulambo","martilyo","palanggana","pamaypay","payong","platito"
);
if ($arrnum<=3){$items=$items0[1];}
else{$items=$items0[2];}
$count=count($items)-1;
$item=$items[(rand(0,$count))];
$itemb=$item." na"; 
if (substr($item,-1)=="a" or substr($item,-1)=="e" or substr($item,-1)=="i" or substr($item,-1)=="o" or substr($item,-1)=="u"){$itemb=$item."ng";}
if (substr($item,-1)=="n"){$itemb=$item."g";}

$places=array("barangay","baryo","bayan","komunidad","palengke","probinsya","rehiyon","siyudad");
$count=count($places)-1;
$place=$places[(rand(0,$count))]; 
$placeb=$place." na";
if (substr($place,-1)=="a" or substr($place,-1)=="e" or substr($place,-1)=="i" or substr($place,-1)=="o" or substr($place,-1)=="u"){$placeb=$place."ng";}
if (substr($place,-1)=="n"){$placeb=$place."g";}

$araws=array("Lunes","Martes","Miyerkules","Huwebes","Biyernes","Sabado","Linggo");
$araw=$araws[(rand(0,(count($araws)-1)))]; 
 
 

$raw = strtr($entry[0], ['$name1'=>$name1, '$name2'=>$name2, '$item'=>$item]);
[$correct, $rest] = explode('>', $raw, 2);
[$sentence, $wrong] = explode('+', $rest, 2);
$choices = array_merge([$correct], explode('*', $wrong));
shuffle($choices);
$filled = str_replace('____', '<strong style="color:#CC0066;">'.pg_h($correct).'</strong>', pg_h($sentence));
return ['word'=>pg_h($sentence), 'filled'=>$filled, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pg_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo $cur['filled']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo pg_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang tamang pangatnig para mabuo ang pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 3;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pg_h($choice); ?>
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
