<?php
// filipino/modules/pangngalan-kailanan.php
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
$moduleTitle = 'Kailanan ng Pangngalan';
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
function kail_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Bumili si *$name1+ ng $item kanina.', 'isahan', 1],
    ['Kay $name1 ba itong mabigat na *aklat+?', 'isahan', 1],
    ['Sasali sa paligsahan si *$name1+ bukas.', 'isahan', 1],
    ['Galing sa *bukid+ sina $name1 at $name2.', 'isahan', 1],
    ['Mabait si *$name1+ sa kanyang mga kaklase.', 'isahan', 1],
    ['Pinahinto niya ang itim na *sasakyan+ dito.', 'isahan', 1],
    ['Kinuha niya ang *laruan+ ng kanyang kapatid.', 'isahan', 1],
    ['Nakakuha ng medalya ang *kapatid+ ni $name1.', 'isahan', 1],
    ['Pinakain ni $name1 ang kanyang alagang *aso+.', 'isahan', 1],
    ['Si *Mang Jose+ ang naglinis ng silid-aralan.', 'isahan', 1],
    ['Ano ang *paksa+ ng kuwentong isinulat mo?', 'isahan', 1],
    ['Nakatira si *$name1+ sa kabilang nayon.', 'isahan', 1],
    ['Namasyal ang *magkasintahan+ sa parke.', 'dalawahan', 1],
    ['Sina *Mario at Lisa+ ay ikakasal na.', 'dalawahan', 1],
    ['Ang *magpinsan+ ay namasyal sa bukid.', 'dalawahan', 1],
    ['Ang *magkapitbahay+ ay nagtutulungan.', 'dalawahan', 1],
    ['Umalis agad kanina ang *ate at kuya+.', 'dalawahan', 1],
    ['Naghintay ang *magkapatid+ sa paaralan.', 'dalawahan', 1],
    ['Kambal ang naging anak ng *mag-asawa+.', 'dalawahan', 1],
    ['May *tatlong ibon+ sa ibabaw ng puno.', 'maramihan', 1],
    ['Ang *magkakapatid+ ay sabay-sabay pumasok.', 'maramihan', 1],
    ['Lahat ng *mga mag-aaral+ ay pinauwi nang maaga.', 'maramihan', 1],
    ['Sama-samang nag-aral ang *mga kamag-aral+ niya.', 'maramihan', 1],
    ['Daan-daang *tao+ ang bumati kay $name1.', 'maramihan', 1],
    ['Nakabenta sila kanina ng *sampung bisikleta+.', 'maramihan', 1],
    ['Ang *mga mag-aaral+ ay handa na sa pagsusulit.', 'maramihan', 1],
    ['Dito namili ang *tatlong kaibigan+ ni $name1.', 'maramihan', 1],
    ['Naligo sa dagat ang *magpipinsan+.', 'maramihan', 1],
    ['Nagsimba kahapon ang *mga pinsan+ ni $name1.', 'maramihan', 1],
],
2 => [
    ['Ang paborito kong laruan ay ang *tren+ na ito.', 'isahan', 2],
    ['Ang *susi+ ng tindahan ay iniwan ko kay $name1.', 'isahan', 2],
    ['Si $name1 ang panganay na *anak+ ni Gng. Cruz.', 'isahan', 2],
    ['Si *$name1+ ay nagsasaliksik sa silid-aklatan.', 'isahan', 2],
    ['Matagal nang nakatanim diyan ang *punong+ iyan.', 'isahan', 2],
    ['Mataas kong napalipad ang *saranggola+ kahapon.', 'isahan', 2],
    ['Naipahiram ba sa iyo ni $name1 ang kanyang *lapis+?', 'isahan', 2],
    ['Nasabi na ba sa iyo ni $name1 ang kanyang *lihim+?', 'isahan', 2],
    ['Nagtitinda ng puto sa palengke ang kanyang *tiya+.', 'isahan', 2],
    ['May butas pala ang unahang *gulong+ ng bisikleta mo.', 'isahan', 2],
    ['Malapit lang dito ang *pabrika+ ng tatay ko.', 'isahan', 2],
    ['Hinahabol ng asong kalye ang itim na *pusa+.', 'isahan', 2],
    ['Si Bruno Mars ang paborito kong *mang-aawit+.', 'isahan', 2],
    ['Nagkita ang *mag-asawa+ sa istasyon ng bus.', 'dalawahan', 2],
    ['Ang *magkaibigan+ ay nag-aayos ng mga mesa.', 'dalawahan', 2],
    ['Ang *mag-ama+ ay mamamasyal sa Luneta mamaya.', 'dalawahan', 2],
    ['Galing sa palengke sina *$name1 at $name2+.', 'dalawahan', 2],
    ['Sina *$name1 at $name2+ ang mga naiwang bata.', 'dalawahan', 2],
    ['Sina *$name1 at $name2+ ay mga kaibigan ni $name3.', 'dalawahan', 2],
    ['Kakausapin nina *$name1 at $name2+ si Gng. Santos.', 'dalawahan', 2],
    ['Nagtungo sa parke ang *mag-ama+ upang magpahangin.', 'dalawahan', 2],
    ['Talaga bang *magkakambal+ sina $name1 at $name2?', 'dalawahan', 2],
    ['Masayang namasyal sa dalampasigan ang *magkalaro+.', 'dalawahan', 2],
    ['Sina *$name1 at $name2+ ay dumalo sa kaarawan ni Lina.', 'dalawahan', 2],
    ['Ang *mag-asawa+ ay pansamantalang nakikitira sa amin.', 'dalawahan', 2],
    ['Sasamahan kong magpalista sa paaralan ang *magkaibigan+.', 'dalawahan', 2],
    ['Sa *magkapatid+ ba itong mga laruang nakakalat sa mesa?', 'dalawahan', 2],
    ['Galing pala sa palaisdaan kanina sina *$name1 at $name2+.', 'dalawahan', 2],
    ['Sina *$name1 at $name2+ ay nag-aaral para sa pagsusulit.', 'dalawahan', 2],
    ['Dala ng *magkakalaro+ ang kanilang mga bisikleta.', 'maramihan', 2],
    ['Ang *mga tao+ ay naghihintay ng pagtigil ng ulan.', 'maramihan', 2],
    ['Lumipad palayo ang *mga ibon+ nang lumapit kami.', 'maramihan', 2],
    ['Ang *mga mag-aaral+ ay nagpamalas ng mabuting asal.', 'maramihan', 2],
    ['Nangako ang alkalde na paglilingkuran ang *sambayanan+.', 'maramihan', 2],
    ['Tulong-tulong ang *magkakapatid+ sa paglilinis ng bakuran.', 'maramihan', 2],
    ['Ang *magkakaibigan+ ay masayang naglalaro ng basketball.', 'maramihan', 2],
    ['Ang *magkakaibigan+ ay muling nakilahok sa paligsahan.', 'maramihan', 2],
    ['Nakapila na ang *mga mamimili+ sa labas ng tindahan.', 'maramihan', 2],
    ['Namakyaw sa palengke ang *anim na kamag-aral+ ni $name1.', 'maramihan', 2],
],
3 => [
    ['Sina $name1 at $name2 ay mga pinsang buo ni *$name3+.', 'isahan', 3],
    ['Si *$name1+ ay bumili ng sari-saring gulay at prutas.', 'isahan', 3],
    ['Nakita mo ba ang *listahan+ ng mga bagong mag-aaral?', 'isahan', 3],
    ['Ang bagong *guro+ natin ay naghanda ng magandang aralin.', 'isahan', 3],
    ['Mabilis talagang sumagot si *$name1+ sa kanyang mga guro.', 'isahan', 3],
    ['Bukas daw kakausapin nina $name1 at $name2 si *$name3+.', 'isahan', 3],
    ['Ang *magkapatid+ na iyon ang nagwagi sa paligsahan kagabi.', 'dalawahan', 3],
    ['Isang bayong ng sari-saring paninda ang dala ng *mag-asawa+.', 'dalawahan', 3],
    ['Si *$name1 at ako+ ay magpapalista sa gaganaping timpalak.', 'dalawahan', 3],
    ['Sina *$name1 at $name2+ ay mga matalik na kaibigan ni $name3.', 'dalawahan', 3],
    ['Isang bayong ng iba\'t ibang prutas ang dala ng *magkaibigan+.', 'dalawahan', 3],
    ['Magpapatingin daw bukas sa manggagamot sina *$name1 at $name2+.', 'dalawahan', 3],
    ['Sina *$name1 at $name2+ ba ang nagdala nitong mga aklat sa mesa?', 'dalawahan', 3],
    ['Sina *$name1 at $name2+ ang mga kaibigang manggagamot ni $name3.', 'dalawahan', 3],
    ['Isa-isang nagpunta sa kusina ang *mga bata+ upang kumain.', 'maramihan', 3],
    ['Binilang ng bata ang *mga sasakyang+ nakaparada sa kalye.', 'maramihan', 3],
    ['Libu-libong *tao+ ang nasalanta ng bagyong \'Ondoy\' noon.', 'maramihan', 3],
    ['Sama-samang nagsimba kahapon ang *mga pinsang buo+ ni $name1.', 'maramihan', 3],
    ['Nagalit ang guro dahil maingay sina *$name1, $name2, at $name3+.', 'maramihan', 3],
    ['Ang *mga kamag-aral+ ko ay sang-ayon sa mga panukalang inilahad.', 'maramihan', 3],
    ['Inilipad ng malakas na hangin ang *mga tuyong dahon+ sa lupa.', 'maramihan', 3],
    ['Ang *mga batas trapiko+ ay dapat nating sundin sa lahat ng oras.', 'maramihan', 3],
    ['Naligaw ang mga *magkakaibigan+ nang sila ay dumalaw kay $name1.', 'maramihan', 3],
],
4 => [
    ['Nakita mo ba ang puting *blusa+ ng aking uniporme sa paaralan?', 'isahan', 4],
    ['Ang matabang *inahin+ ay laging sinusundan ng kanyang mga sisiw.', 'isahan', 4],
    ['Ang *pangarap+ ni $name1 ay makapagtayo ng sarili niyang talyer.', 'isahan', 4],
    ['Sama-samang nagpunta sa *palengke+ ang mga kamag-aral ni $name1.', 'isahan', 4],
    ['Si Mang Ramon ang may-ari at *tsuper+ ng pamasadang dyip na ito.', 'isahan', 4],
    ['Ikinuwento sa akin ni *$name1+ ang napanood niyang pelikula kanina.', 'isahan', 4],
    ['Nakunan ni $name1 ng larawan ang *buwitre+ habang ito ay kumakain.', 'isahan', 4],
    ['Kumain ang *magkakambal+ sa karinderya ni $name1 kaninang tanghali.', 'dalawahan', 4],
    ['Matiyagang nag-ensayo sa palaruan ang *magkalaro+ bilang paghahanda.', 'dalawahan', 4],
    ['Isang bayong ng iba\'t ibang prutas ang dala nina *$name1 at $name2+.', 'dalawahan', 4],
    ['Ang *magkapatid+ ay matiyagang nag-aaral para sa kanilang pagsusulit.', 'dalawahan', 4],
    ['Sina *$name1 at $name2+ ang mga napiling kinatawan ng ating paaralan.', 'dalawahan', 4],
    ['Malayo ang nilakbay ng *mag-ina+ upang madalaw ang kanilang kamag-anak.', 'dalawahan', 4],
    ['Galing pala kanina sa palaisdaan ng mga bangus sina *$name1 at $name2+.', 'dalawahan', 4],
    ['Naghahanap ang *magpinsan+ ng mga nakabaong kayamanan sa minahang iyon.', 'dalawahan', 4],
    ['Sina *$name1, $name2, at $name3+ ang nakakita sa nawawalang bata.', 'maramihan', 4],
    ['Isa-isang umalis ang *mga panauhin+ ni $name1 nang lumalim ang gabi.', 'maramihan', 4],
    ['Namili ng mga paninda sa palengke ang *apat na kusinero+ ni $name1.', 'maramihan', 4],
    ['Ang *mga batang+ nasa ikaapat na baitang ay maghahandog ng isang awit.', 'maramihan', 4],
    ['Ang *mga magulang+ ay inanyayahang dumalo sa gaganaping pagtatanghal.', 'maramihan', 4],
    ['Palitan na natin mamayang hapon ang *mga kurtina+ sa lahat ng mga silid.', 'maramihan', 4],
    ['Isa-isang ipinaliwanag ng punong guro ang *mga tuntunin+ ng paaralan.', 'maramihan', 4],
    ['Nakakatuwa ang *mga kuwento+ ni Lolo Tonio tungkol sa kanyang kabataan.', 'maramihan', 4],
    ['Nagtanim ng mga halaman sa hardin ang *tatlong hardinero+ ni $name1.', 'maramihan', 4],
],
5 => [
    ['Ang matandang *babae+ ay nagpasalamat sa binatang tumulong sa kanya.', 'isahan', 5],
    ['Si $name1 ang *mamumuhunan+ ng pabrika ng mga sapatos sa kabilang kalye.', 'isahan', 5],
    ['Nakita mo ba ang itim na *payong+ na hiniram sa akin ni $name1 kahapon?', 'isahan', 5],
    ['Ikinuwento sa akin ni $name1 ang napanood niyang magandang *pelikula+ kagabi.', 'isahan', 5],
    ['Kailangang malutas agad nina $name1 at $name2 ang kanilang *suliranin+.', 'isahan', 5],
    ['Malapit nang matupad ni $name1 ang kanyang *pangarap+ na maging senador.', 'isahan', 5],
    ['Ang *magkaibigan+ ay madalas pumunta sa silid-aklatan upang magsaliksik.', 'dalawahan', 5],
    ['Namingwit kaninang umaga sa palaisdaan ng mga hito sina *$name1 at $name2+.', 'dalawahan', 5],
    ['Itinaguyod ng *mag-ina+ ang kaisa-isang mataas na paaralan sa kanilang nayon.', 'dalawahan', 5],
    ['Masayang naligo sa ulan at nagtampisaw sa baha ang *magkalaro+ noong Sabado.', 'dalawahan', 5],
    ['Nag-ensayo sa pagpapasa ng bola sa isa\'t isa ang *dalawang magkasapi+ bilang pagsasanay.', 'dalawahan', 5],
    ['Isang kahon ng iba\'t ibang prutas at gulay ang inihatid nina *$name1 at $name2+.', 'dalawahan', 5],
    ['Sina *$name1 at $name2+ ang mga kaibigan kong tumulong sa aking makakuha ng trabaho.', 'dalawahan', 5],
    ['Naghahanapbuhay ang *mag-asawa+ sa isang maliit na karinderya sa palengke.', 'dalawahan', 5],
    ['Ang *mga batang+ nasa ikapitong baitang ay magtatanghal na sa entablado.', 'maramihan', 5],
    ['Isa-isang dumating ang *mga panauhin+ ni $name1 nang sumapit ang tanghali.', 'maramihan', 5],
    ['Inilipad ng malakas na hangin ang *mga papel+ sa ibabaw ng mesa ni $name1.', 'maramihan', 5],
    ['Ang *mga bagong empleyado+ ay magiliw na sinalubong ng alkalde sa munisipyo.', 'maramihan', 5],
    ['Sina *$name1, $name2, at $name3+ ay humingi ng paumanhin sa kanilang guro.', 'maramihan', 5],
    ['Tulung-tulong na nagwalis ng mga kalsada kanina ang mga *magkakapitbahay+.', 'maramihan', 5],
    ['Ang *mga kamag-aral+ ni $name1 ay nagsadya sa munisipyo upang magprotesta.', 'maramihan', 5],
    ['Nakakabigla ang *mga kuwento+ ng lola ni $name1 tungkol sa panahon ng Hapon.', 'maramihan', 5],
    ['*Adobo, sinigang, dinuguan, at tinola+ ang mga paboritong pagkain ni $name1.', 'maramihan', 5],
    ['Isa-isang inilahad ng kanilang tagapamahala ang *mga alituntunin+ ng pabrika.', 'maramihan', 5],
],
6 => [
    ['Anak pala ni $name1 ang *mag-aaral+ na nagpakita ng kabayanihan noong may bagyo.', 'isahan', 6],
    ['Ang matandang *pulubi+ ay nagpasalamat sa binatang nagbigay ng pagkain sa kanya.', 'isahan', 6],
    ['Sama-samang nagpunta sa *palaisdaan+ ang mga kamag-aral ni $name1 upang mamingwit.', 'isahan', 6],
    ['Ang mga magulang ay inanyayahang dumalo sa gaganaping *pagtatanghal+ ng mga mag-aaral.', 'isahan', 6],
    ['Humingi ng paumanhin ang kanyang *katrabaho+ dahil hindi ito nakadalo sa kanyang kaarawan.', 'isahan', 6],
    ['Mahigpit magpatakbo ng pabrika ang kanilang *tagapamahala+ kaya natatakot silang magkamali.', 'isahan', 6],
    ['Ang *magkaibigan+ ay pumupunta sa iba\'t ibang lalawigan upang pag-aralan ang kalikasan.', 'dalawahan', 6],
    ['Ubod ng galing sa basketbol ng *magkapatid+ kaya\'t palagi nilang naiuuwi ang kampeonato.', 'dalawahan', 6],
    ['Nagpalitan ng mga regalo ang *magkakambal+ noong ipagdiwang nila ang kanilang kaarawan.', 'dalawahan', 6],
    ['Palaging nagtutulungan ang *magpinsan+ sa pagtitinda kaya agad silang umasenso sa buhay.', 'dalawahan', 6],
    ['Magkasamang nagpuyat sa trabaho ang *dalawang magkaopisina+ upang matapos nila ang kanilang ulat.', 'dalawahan', 6],
    ['Matiyagang nag-ensayo ng boksing ang *magkalaro+ upang paghandaan ang kanilang mga laban.', 'dalawahan', 6],
    ['Ang *magkapatid+ ay nag-aaral sa umaga at nagtatrabaho sa gabi upang makapagtapos ng abogasya.', 'dalawahan', 6],
    ['Sina *$name1 at $name2+ ang mga napiling kinatawan ng ating organisasyon sa gaganaping pulong.', 'dalawahan', 6],
    ['Sinorpresa ng mga *magkakapatid+ ang kanilang mga magulang noong isang linggo.', 'maramihan', 6],
    ['Ang *mga turista+ ay hinikayat niyang sumali sa pagsasayaw sa parada ng pista.', 'maramihan', 6],
    ['Nagbigay ang gurong si Bb. Bautista ng mahirap na pagsasanay sa *mga estudyante+.', 'maramihan', 6],
    ['Hindi mo ba alam na dapat nating sundin ang *mga batas trapiko+ sa lahat ng oras?', 'maramihan', 6],
    ['May *mga kahulugan+ ang mga kulay sa ating watawat na asul, pula, dilaw, at puti.', 'maramihan', 6],
    ['Masipag at may disiplina ang kanyang *mga empleyado+ kaya umunlad ang kanyang negosyo.', 'maramihan', 6],
    ['Namasyal sa tabing-dagat ang *magkakamag-anak+ upang lalong mapalapit sa isa\'t isa.', 'maramihan', 6],
    ['Namahagi ang mga *magkakaibigan+ ng pagkain sa mga nasalantang kababayan ni $name1.', 'maramihan', 6],
    ['Sina *$name1, $name2, at $name3+ ay naghanda ng masarap na meryenda para sa mga panauhin.', 'maramihan', 6],
],
];
$banks = [$tier => []];
foreach ($tiers as $t) $banks[$tier] = array_merge($banks[$tier], $sourceBanks[$t]);
function kail_question(array $entry, string $tier, string $lvl): array {
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

if ($arrnum<3){$grp=0;} else{$grp=1;}
$namecount=count($names[$grp])-1;
$name1=$names[$grp][(rand(0,$namecount))]; 
do{$name2=$names[$grp][(rand(0,$namecount))];} while ($name1==$name2);
do{$name3=$names[$grp][(rand(0,$namecount))];} while ($name3==$name1 or $name3==$name2);

	
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

$araws=array("Lunes","Martes","Miyerkules","Huwebes","Biyernes","Sabado","Linggo");
$araw=$araws[(rand(0,(count($araws)-1)))];

$sentence = strtr($entry[0], ['$name1'=>$name1, '$name2'=>$name2, '$name3'=>$name3, '$item'=>$item, '$itemb'=>$itemb, '$araw'=>$araw]);
if (!preg_match('/^(.*?)\*(.*?)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
$choices = ['isahan', 'dalawahan', 'maramihan'];
return ['word'=>kail_h($m[1]).'<strong style="color:#CC0066;">'.kail_h($m[2]).'</strong>'.kail_h($m[3]), 'target'=>$m[2], 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = kail_question($banks[$tier][$i], $tier, $lvl);
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
        <strong>Kailanan: <span style="color:#CC0066;"><?php echo kail_h(ucfirst($cur['correct'])); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Piliin ang kailanan ng pangngalang nakapaloob sa kulay pulang bahagi ng pangungusap.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 3;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo kail_h(ucfirst($choice)); ?>
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
