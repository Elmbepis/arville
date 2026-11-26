<?php
// filipino/modules/panghalip-uri.php
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
$moduleTitle = 'Mga Uri ng Panghalip';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
// Preserve the three legacy grade bands. Hard combines legacy Medium and Hard.
$baseTier = $grd <= 3 ? 1 : ($grd <= 6 ? 2 : 3);
$tiers = $lvl === 'Easy' ? [$baseTier] : ($grd <= 1 ? [2] : [$baseTier+1, $baseTier+2]);
$tier = implode('-', $tiers);
function pua_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$legacyBanks = [
1 => [['*Siya+ ay isang $adj1b $job1.', 'panao', 1], ['*Sila+ ay nasa $placeA.', 'panao', 1], ['*Siya+ ay mabuting kaibigan.', 'panao', 1], ['Manonood *ako+ ng cartoons.', 'panao', 1], ['Magbibisikleta *kami+ sa parke.', 'panao', 1], ['Handa na ba *kayo+?', 'panao', 1], ['*Ako+ ay anim na taong gulang.', 'panao', 1], ['*Ako+ ay nasa ikatlong baitang.', 'panao', 1], ['*Sila+ ang aking mga kamag-aral.', 'panao', 1], ['*Siya+ ang kuya ko.', 'panao', 1], ['Malamig pala *rito+.', 'pamatlig', 1], ['*Sila+ ay ating mga kamag-aral.', 'panao', 1], ['*Doon+ ko nakita si $name1.', 'pamatlig', 1], ['Papunta na *diyan+ si $name1.', 'pamatlig', 1], ['*Diyan+ ko nakita ang $itemB.', 'pamatlig', 1], ['*Diyan+ tayo pupunta sa Sabado.', 'pamatlig', 1], ['*Ito+ ang dadalhin ko sa biyahe.', 'pamatlig', 1], ['*Iyon+ ba ang sasakyan natin?', 'pamatlig', 1], ['Bagong ayos ang makina *nito+.', 'pamatlig', 1], ['Parating na kami *riyan+.', 'pamatlig', 1], ['Magkita na lang daw tayo *roon+.', 'pamatlig', 1], ['Iwan mo *rito+ ang bag mo.', 'pamatlig', 1], ['Kilala ko ang may-ari *niyon+.', 'pamatlig', 1], ['Binisita nila ako *rito+.', 'pamatlig', 1], ['Ginagamit ko *ito+.', 'pamatlig', 1], ['*Lahat+ sila ay masaya.', 'panaklaw', 1], ['Si $name1 ay bumati sa *lahat+.', 'panaklaw', 1], ['Ito ay para sa ating *lahat+.', 'panaklaw', 1], ['*Ganito+ rin ang $itemB ko.', 'patulad', 1], ['*Ganyan+ ang gusto kong $itemB.', 'patulad', 1], ['Bibili ako ng *ganoon+.', 'patulad', 1], ['*Kanino+ ang $itemB$sufb ito?', 'pananong', 1], ['*Sino+ ang nasa $placeA?', 'pananong', 1], ['*Ano+ ang dala ni $name1?', 'pananong', 1], ['*Alin+ ba ang iyong $itemB?', 'pananong', 1]],
2 => [['*Siya+ ay may kakilalang $adj1b $job1.', 'panao', 2], ['*Siya+ ay pumunta kagabi sa $placeA.', 'panao', 2], ['*Ikaw+ ang uutusan niya na pumunta sa tindahan.', 'panao', 2], ['Sasabay *sila+ sa iyo papunta sa $placeA.', 'panao', 2], ['Pupunta *kami+ sa simbahan ng Peñafrancia.', 'panao', 2], ['Bigyan mo *sila+ ng malamig na inumin.', 'panao', 2], ['*Ikaw+ ba ang bagong kaklase namin?', 'panao', 2], ['*Sila+ ang nag-aalaga at nagpapaaral sa akin.', 'panao', 2], ['Inaasahan kong saulo na *ninyo+ ang buong tula.', 'panao', 2], ['Ang malaking tropeo na ito ay sa *kanila+.', 'panao', 2], ['*Siya+ ang ating guro sa science at math.', 'panao', 2], ['*Siya+ ang mag-aayos ng mga mesa at upuan.', 'panao', 2], ['*Sila+ ang susundo sa ibang mga panauhin.', 'panao', 2], ['Pakihatid naman *sila+ sa kusina namin.', 'panao', 2], ['*Sila+ ay nagkasama-sama kanina sa $placeA.', 'panao', 2], ['*Tayo+ ay mga mag-aaral ni Bnb. Katrina Garcia.', 'panao', 2], ['*Doon+ daw natin matatagpuan si $name1.', 'pamatlig', 2], ['Pupunta raw *riyan+ si $name1 mamaya.', 'pamatlig', 2], ['*Diyan+ iniwan ni $name1 ang $itemB.', 'pamatlig', 2], ['*Dito+ ka umupo sa tabi ko para magkausap tayo.', 'pamatlig', 2], ['*Iyon+ ang pinakamaliit na bulkan sa Pilipinas.', 'pamatlig', 2], ['*Dito+ namin binili ang mga pasalubong.', 'pamatlig', 2], ['Ano nga ba ang mga sangkap *niyon+?', 'pamatlig', 2], ['*Dito+ ko iniwan ang diksiyonaryo.', 'pamatlig', 2], ['Bawal po mag-ingay *rito+.', 'pamatlig', 2], ['Malinis at maayos na *ito+.', 'pamatlig', 2], ['Kasama niya si $name1 at $name2 *dito+.', 'pamatlig', 2], ['*Ito+ ay regalo sa akin ng aking lola.', 'pamatlig', 2], ['Tungkulin ng mabuting mamamayan *ito+.', 'pamatlig', 2], ['Sino ang magmamaneho *nito+?', 'pamatlig', 2], ['Magkano ang isang kilo *niyan+?', 'pamatlig', 2], ['Alagaan mong mabuti ang mga bata *riyan+.', 'pamatlig', 2], ['*Iyan+ ang ginamit ko kanina.', 'pamatlig', 2], ['Nakalagay *diyan+ ang mga $itemB.', 'pamatlig', 2], ['Naglinis *diyan+ si Ate Marian.', 'pamatlig', 2], ['Kailangan daw pumunta ng *lahat+ sa $placeA.', 'panaklaw', 2], ['Nagpadala si $name1 ng keyk para sa *lahat+.', 'panaklaw', 2], ['Humingi si $name1 ng tulong sa *madla+.', 'panaklaw', 2], ['Ang *iba+ ay hindi natuwa sa sinabi niya.', 'panaklaw', 2], ['*Ganito+ ang tamang pagtatabi ng $itemB.', 'patulad', 2], ['*Ganito+ ang $itemB$sufb nakita ni $name1 kanina.', 'patulad', 2], ['Parang *ganyan+ ang dalang $itemB ni $name1 kagabi.', 'patulad', 2], ['*Ganoon+ ang itinda mo rito sa bangketa.', 'patulad', 2], ['Hindi *ganoon+ ang tamang pagluluto ng adobo.', 'patulad', 2], ['Pahihiramin kita ng *ganyan+ ding $itemB bukas.', 'patulad', 2], ['*Kanino+ ba ibibigay ang $itemB$sufb ito?', 'pananong', 2], ['*Sino+ ang dadalo sa pagtitipon sa $placeA?', 'pananong', 2], ['*Sino+ ang may-ari ng $itemB$sufb ito?', 'pananong', 2], ['*Alin+ ang dadalhin mong maleta sa iyong pag-uwi?', 'pananong', 2], ['*Kanino+ ba galing ang liham na natanggap mo?', 'pananong', 2]],
3 => [['Siya ang may-ari ng bakeshop na pinuntahan *natin+.', 'panao', 3], ['Matutuwa *kayo+ sa mga mang-aawit na darating mamaya.', 'panao', 3], ['Tutulong *kami+ sa paglilinis ng kanilang bahay at bakuran.', 'panao', 3], ['Umupo muna kayo habang hinihintay *ninyo+ si $name1.', 'panao', 3], ['Ako ang magwawalis at *ikaw+ naman ang magbubura ng pisara.', 'panao', 3], ['*Siya+ ay may nakaibigang $adj1b $job1 sa $placeA.', 'panao', 3], ['Marami pa akong ginagawa kaya mamaya na lang *tayo+ mag-usap.', 'panao', 3], ['Ang makintab na pares ng sapatos ay ibinigay ko sa *kanya+.', 'panao', 3], ['Nagtutulungan *kami+ sa pangangasiwa ng aming negosyo.', 'panao', 3], ['Bukas na ang lakbay-aral *natin+ sa Manila Zoo.', 'panao', 3], ['Alamin *mo+ ang iyong mga karapatan bilang manggagawa.', 'panao', 3], ['Si $name1 ang nagbigay ng tubig at pagkain sa *kanila+.', 'panao', 3], ['*Doon+ madalas uminom ng kape sina $name1 at $name2.', 'pamatlig', 3], ['Manananghalian daw *riyan+ si $name1 bukas.', 'pamatlig', 3], ['*Diyan+ ko napansing iniwan ni $name1 ang $itemB.', 'pamatlig', 3], ['Mayroon bang kasaba keyk na ibinebenta *riyan+?', 'pamatlig', 3], ['Ang ibang sangkap *niyan+ ay mula sa ibang lalawigan.', 'pamatlig', 3], ['Aanyayahan ni $name1 ang *lahat+ upang dumalo sa salu-salo.', 'panaklaw', 3], ['Bumili si $name1 ng $itemA upang ipamahagi sa *lahat+.', 'panaklaw', 3], ['Nabalitaan kong nagalit ang *madla+ kay $name1 kahapon.', 'panaklaw', 3], ['Ang ginagawa ni $name1 ay para sa ikabubuti ng *balana+.', 'panaklaw', 3], ['Hindi pala naaliw ang *iba+ sa ginawa nilang pagtatanghal.', 'panaklaw', 3], ['*Ganito+ ang tamang pagsisilid ng $itemB sa kahon.', 'patulad', 3], ['*Ganoon+ ang $itemB$sufb nakita ni $name1 sa tindahan.', 'patulad', 3], ['Sigurado akong *ganyan+ ang dalang $itemB ni $name1 kahapon.', 'patulad', 3], ['Ikaw ang isasama niya sa pagbili ng mga damit na *ganito+.', 'patulad', 3], ['*Ganoon+ na nga ang mangyayari sa $placeA pag nagkataon.', 'patulad', 3], ['*Sino+ ang maghahatid kay $name1 sa $placeA bukas?', 'pananong', 3], ['*Saan+ ko ba makikita ang may-ari ng $itemB$sufb ito?', 'pananong', 3], ['*Sinu-sino+ ba ang mga maaaring dumalo sa pagtitipon bukas?', 'pananong', 3], ['*Anu-ano+ ang mga gamit na dadalhin natin sa Mindoro?', 'pananong', 3], ['*Alin+ ang mas mabigat, ang supot na ito o ang sakong iyon?', 'pananong', 3]],
4 => [['*Siya+ ang $adj1b $job1 na nakilala ni $name1 sa $placeA kahapon.', 'panao', 4], ['*Sila+ ang sinamahan kong pumunta sa $placeA kaninang madaling-araw.', 'panao', 4], ['Nariyan na ang sundo mo, naghihintay *siya+ sa labas ng silid-aralan natin.', 'panao', 4], ['Ibigay mo sa *kanya+ itong mga biskwit pag-uwi niya galing eskuwelahan.', 'panao', 4], ['Tuwing tanghalian, pumupunta *kami+ sa kantina para kumain nang sabay-sabay.', 'panao', 4], ['*Sila+ ang napiling maging mga kinatawan natin sa gaganapin na timpalak.', 'panao', 4], ['*Tayo+ ay maghahanda ng mga palamuti na magpapaganda sa okasyon.', 'panao', 4], ['Narinig niyang *doon+ pinag-usapan nina $name1 at $name2 ang mga plano.', 'pamatlig', 4], ['Ipagdiriwang daw *riyan+ ni $name1 ang kaarawan niya sa susunod na linggo.', 'pamatlig', 4], ['*Diyan+ ko napansing ipinatong ni $name1 ang kanyang $itemB.', 'pamatlig', 4], ['Mabuti na lamang at napahinahon ni $name1 ang *lahat+ kanina.', 'panaklaw', 4], ['Dahil sa ginawa niya, tuluyan nang nagalit kay $name1 ang *madla+.', 'panaklaw', 4], ['Dapat suportahan ng *bawat isa+ ang proyektong sinimulan ni $name1.', 'panaklaw', 4], ['Ang proyektong inilunsad kagabi ay para sa ikagiginhawa ng *balana+.', 'panaklaw', 4], ['Pahihiramin ka ni $name1 ng *ganyan+ ding $itemB pag nagkita kayo.', 'patulad', 4], ['Ayon kay $name1, *ganito+ ang tamang paraan ng pagtatago ng $itemB sa lalagyan.', 'patulad', 4], ['*Ganito+ ang $itemB$sufb binili ni $name1 mula kay $name2 kagabi.', 'patulad', 4], ['Hindi siya nakatitiyak kung *ganyan+ nga ang dalang $itemB ni $name1 kanina.', 'patulad', 4], ['*Ganoon+ na nga ang maaaring mangyari pag nagkagulo sa $placeA mamaya.', 'patulad', 4], ['*Sino+ ba ang naatasang maghatid kay $name1 sa $placeA sa susunod na linggo?', 'pananong', 4], ['*Sinu-sino+ ang mga artistang mapapanood sa pelikulang ipalalabas dito bukas?', 'pananong', 4], ['*Kanino+ ka magpapatahi ng gagamitin mong kasuotan para sa ating maikling dula?', 'pananong', 4], ['*Alin+ ang mas gusto mong kainin mamaya, litsong manok o litsong baboy?', 'pananong', 4]],
5 => [['Ang akala ko ay *siya+ ang $adj1b $job1 na nakausap ni $name1 sa $placeA kahapon.', 'panao', 5], ['Sigurado akong sila ang sinamahan *kong+ pumunta sa $placeA noong nakaraang Linggo.', 'panao', 5], ['Dahil tapos ko na ang aking mga gawain, tutulungan *kita+ sa paggawa ng iyong takdang-aralin sa math.', 'panao', 5], ['Ang kaisa-isang anak ng mag-asawa ay naghahanda ng maganda at malaking pagdiriwang para sa *kanila+.', 'panao', 5], ['Alam mo bang *doon+ magtatagpo sina $name1 at $name2 upang makapag-usap nang palihim?', 'pamatlig', 5], ['Ipinadala na raw *riyan+ ni $name1 kahapon ang mga aklat ng kaibigan niyang manunulat.', 'pamatlig', 5], ['Sigurado ba talaga kayong *diyan+ ninyo itinago ang $itemB$sufb nawawala?', 'pamatlig', 5], ['Ang *lahat+ ay puwedeng sumali sa patimpalak kung saan maaaring manalo ng sanlibong piso.', 'panaklaw', 5], ['Hindi sumang-ayon ang *iba+ sa panukalang batas ng butihing senador ng Mindanao.', 'panaklaw', 5], ['Ang proyektong sisimulan nina $name1 at $name2 ay dapat suportahan ng *bawat isa+.', 'panaklaw', 5], ['Matulungin at may malasakit sa *balana+ ang kanyang tiyong naglilingkod bilang konsehal.', 'panaklaw', 5], ['Ayon kay $name1, *ganito+ ang tamang paraan ng pagkukumpuni ng makinang ito.', 'patulad', 5], ['*Ganoon+ ang $itemB$sufb binili ni $name1 mula kay $name2 nang magkita sila kagabi.', 'patulad', 5], ['Hindi siya nakatitiyak kung *ganyan+ nga ang dalang $itemB ni $name1 kanina.', 'patulad', 5], ['*Ganire+ ang tamang pagpipinta ng dingding upang maging pantay ang pagkakakulay nito.', 'patulad', 5], ['*Sinu-sino+ ba ang naatasang maghatid ng balita sa mga kapitan ng barangay bukas ng umaga?', 'pananong', 5], ['*Alin+ ba sa mga tindahan sa palengkeng ito ang nagbebenta ng $itemB$sufb tulad nito?', 'pananong', 5], ['*Kani-kanino+ kaya ang mga kamiseta at pantalong nakakalat dito sa harap ng ating sasakyan?', 'pananong', 5], ['*Sino+ ang naatasan ng gobernador na maghatid ng mga gamot sa sentrong pangkalusugan bukas?', 'pananong', 5], ['*Ano+ ang plano mong gawin upang mapigilan ang lumalaking suliranin ng kahirapan sa ating nayon?', 'pananong', 5]]
];
$banks = [$tier => []];
foreach ($tiers as $t) $banks[$tier] = array_merge($banks[$tier], $legacyBanks[$t]);
function pua_question(array $entry, string $tier, string $lvl): array {
$arrnum = $entry[2];
$jobs[1]=array("abogado","barbero","bumbero","guro","kusinero","panadero","pulis"
	);
$jobs[2]=array("abogado","barbero","bumbero","guro","kusinero","panadero","pulis","mananayaw"
	);
if ($arrnum<=3){$jobs0=$jobs[1];}
else{$jobs0=$jobs[2];}
$count=count($jobs0)-1;
$job1=$jobs0[(rand(0,$count))];
do{$job2=$jobs0[(rand(0,$count))];} while($job1==$job2);

$adjs[1]=array("mabait","mahusay","masipag","matalino","matapang","matapat","matipid","mayaman","tahimik",
	);
$adjs[2]=array("mabait","magalang","magaling","mahinahon","mahusay","mapagkaibigan","masakitin","masayahin","masipag",
"masuwerte","matalino","matangkad","matapang","matapat","matulungin","mautak","mayaman","nakakatawa","tahimik",
	);
if ($arrnum<=3){$adjs0=$adjs[1];}
else{$adjs0=$adjs[2];}
$count=count($adjs0)-1;
$adj1=$adjs0[(rand(0,$count))];
do{$adj2=$adjs0[(rand(0,$count))];} while($adj1==$adj2);
$adj1z=substr($adj1,-1); $adj2z=substr($adj2,-1);
$adj1b=$adj1." na";
$adj2b=$adj2." na";
if ($adj1z=="a" or $adj1z=="e" or $adj1z=="i" or $adj1z=="o" or $adj1z=="u"){$adj1b=$adj1."ng";}
if ($adj1z=="n"){$adj1b=$adj1."g";}
if ($adj2z=="a" or $adj2z=="e" or $adj2z=="i" or $adj2z=="o" or $adj2z=="u"){$adj2b=$adj2."ng";}
if ($adj2z=="n"){$adj2b=$adj2."g";} 

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

$items0A[1]=array(
"bigas","kanin","kape","sopas","tubig","ulam"
);
$items0A[2]=array(
"maiinom","makakain","pagkain","pansit","prutas","tinapay"
);
if ($arrnum<=3){$itemsA=$items0A[1];}
else{$itemsA=$items0A[2];}
$count=count($itemsA)-1;
$itemA=$itemsA[(rand(0,$count))]; 

$items0B[1]=array(
"aklat","baso","lapis","tasa"
);
$items0B[2]=array(
"basahan","kaldero","kawali","kulambo","martilyo","palanggana","pamaypay","payong","platito"
);
if ($arrnum<=3){$itemsB=$items0B[1];}
else{$itemsB=$items0B[2];}
$count=count($itemsB)-1;
$itemB=$itemsB[(rand(0,$count))];
$sufb=" na"; 
if (substr($itemB,-1)=="a" or substr($itemB,-1)=="e" or substr($itemB,-1)=="i" or substr($itemB,-1)=="o" or substr($itemB,-1)=="u"){$sufb="ng";}
if (substr($itemB,-1)=="n"){$sufb="g";}

$places0A[1]=array(
"bahay","bukid","hardin"
);
$places0A[2]=array(
"aplaya","palengke","simbahan","tabing-ilog"
);
if ($arrnum<=3){$placesA=$places0A[1];}
else{$placesA=$places0A[2];}
$count=count($placesA)-1;
$placeA=$placesA[(rand(0,$count))];
$sentence = strtr($entry[0], ['$name1'=>$name1,'$name2'=>$name2,'$adj1b'=>$adj1b,'$adj2b'=>$adj2b,'$job1'=>$job1,'$placeA'=>$placeA,'$itemA'=>$itemA,'$itemB'=>$itemB,'$sufb'=>$sufb]);
if (!preg_match('/^(.*?)\*(.*?)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
$choices = array_values(array_diff(['panao','pamatlig','panaklaw','patulad','pananong'], [$entry[1]]));
shuffle($choices); $choices = array_slice($choices,0,3); $choices[] = $entry[1]; shuffle($choices);
return ['word'=>pua_h($m[1]).'<strong style="color:#CC0066;">'.pua_h($m[2]).'</strong>'.pua_h($m[3]), 'target'=>$m[2], 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$explanations = ['panao'=>'dahil ito ay ipinapalit sa ngalan ng taong nagsasalita, kausap, o pinag-uusapan','pamatlig'=>'dahil ito ay tumutukoy sa tao, bagay, o lugar na itinuturo','panaklaw'=>'dahil ito ay sumasaklaw sa kaisahan, dami, o kalahatan ng kinatawang pangngalan','patulad'=>'dahil ito ay inihahalili sa isang itinutulad na bagay','pananong'=>'dahil ito ay inihahalili sa pangngalan kung nagtatanong'];
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
        <br/>
        <span style="font-size:16pt;font-weight:normal;">
            <?php echo pua_h($explanations[$cur['correct']]); ?>.
        </span>
    </div>    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang uri ng panghalip na kulay pula sa pangungusap.</p>
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
