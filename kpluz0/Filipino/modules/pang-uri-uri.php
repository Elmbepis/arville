<?php
// Stand-alone procedural module: Filipino/modules/pang-uri-uri.php
session_name('KPLUZ_SESSION');
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
if (empty($_SESSION['logged_in'])) { header("Location: $base/login.php"); exit; }
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';
$grd = (int)($_SESSION['user_grade'] ?? 0);
$_SESSION['level'] = 'Easy';
$_SESSION['last_subject'] = 'filipino';
$_SESSION['title'] = 'Mga Uri ng Pang-uri';
$moduleId = 'pang-uri-uri.php';
$moduleTitle = 'Mga Uri ng Pang-uri';
$conn = new mysqli('localhost', 'root', 'AcadeV25!', 'kpluz0');
if ($conn->connect_error) die('Database connection failed.');
$key = 'pang_uri_uri_state';
$scorer = new Scorer($conn, $moduleId);
$state = $_SESSION[$key] ?? [];
if (($state['grade'] ?? null) !== $grd || ($_SESSION['procedural_active_module'] ?? '') !== $moduleId || ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['resume']))) {
    $state = ['grade' => $grd, 'past' => []];
    $scorer->resetScore();
}
$_SESSION['procedural_active_module'] = $moduleId;
function pu_generate($grd, &$past) {
//for people
$adjs[0][1]=array("mabait","mahusay","masipag","matalino","matapang","matipid","mayaman","tahimik",
	);
$adjs[1][1]=array("mabait","magalang","magaling","mahusay","mapagkaibigan","masayahin","masipag",
"masuwerte","matalino","matangkad","matapang","matipid","matulungin","mautak","mayaman","nakakatawa","tahimik",
	);
	
//for objects	
$adjs[0][2]=array("madulas","mahaba","mainit","makinis","malaki","malambot","malamig","maliit","matigas","matulis"
	);
$adjs[1][2]=array("mababaw","madulas","mahaba","mainit","magaspang","malabo","malaki","malalim","malambot","malamig","maliit","malinaw","makinis",
"makintab","mataas","matigas","matingkad"
	);

if ($grd<=3){$adj1s0=$adjs[0][1]; $adj2s0=$adjs[0][2];}
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

if ($grd<6){$grp=0;} else{$grp=1;}
$namecount=count($names[$grp])-1;
$name1=$names[$grp][(rand(0,$namecount))]; 
do{$name2=$names[$grp][(rand(0,$namecount))];} while ($name1==$name2);


 
if ($grd<=3){
//panlarawan
$qsentences0[0]=array(
"Ibigay mo ang *makapal+ na aklat kay $name1.",
"Huwag kayong pumunta sa lugar na *mapanganib+.",
"Ang bahay nina $name1 ay *malayo+ sa simbahan.",
"*Malamig+ na tubig ba ang gusto mong inumin?",
"Ang mga alagang hayop ni $name1 ay *malulusog+.",
"May kilala ka bang *mahusay+ na mananahi?",
"Ang sasakyan ni $name1 ay *napakabilis+.",
"Si $name1 ay *mas mabait+ kaysa kay $name2.",
"*Higit na malubak+ ang daan dito kaysa roon.",
"*Kasingtangkad+ na pala ni $name1 si $name2.",
"*Mas matamis+ ang biko kaysa tinapay.",
"Sa inyong lahat, si $name1 ang *pinaka$adj1+.",
"Si $name1 na nga ang *pinaka$adj1+ sa kanila.",
"*Napakasarap+ ng amoy mula sa kusina ni $name1.",
"*Gulat na gulat+ si $name1 sa balita ni $name2.",
"Ang lolo ni $name1 ang *pinakamatanda+ sa lahat.",
"*Napakahirap+ ng pagsusulit natin sa Filipino.",
);
//pamilang
$qsentences0[1]=array(
"Ako ay *ikalima+ sa aming hanay.",
"Si $name1 ay *nag-iisang+ anak lamang.",
"Humingi ka ng *kalahating+ tinapay.",
"Ako ay *pangalawa+ sa aming magkakapatid.",
"*Kalahating+ papel lang ang dinala ko sa klase.",
"Si $name1 ang *ikalimang+ batang dumaan dito.",
"*Sasampung+ piso lamang ang natira sa pera ni $name1.",
"*Mamera+ lang dito ang mga bayabas.",
"*Tigpipiso+ ang saging na binili ko.",
"*Iisa+ na lamang ang natitira nating manok.",
"Ang taas ng baha ay *tatlong+ dangkal.",
"Kumain si $name1 ng *kalahating+ pinggang pansit.",
"*Lilima+ na lamang ang mga itik sa bakuran.",
"Bukas na ang *ikapitong+ kaarawan ni $name1.",
);
//pantangi
$qsentences0[2]=array(
"Paborito ni $name1 ang pansit *Malabon+.",
"Napakatamis ng mga manggang *Guimaras+.",
"May dugong *Tsino+ ang mag-anak na Tan.",
"Biyaheng *Cebu+ ang malaking barkong iyon.",
"Si $name1 ay marunong ng wikang *Ingles+.",
"Bumili tayo ng mga produktong *Pilipino+.",
"Isang paring *Katoliko+ ang dumalaw sa amin.",
"Mahal mo ba ang wikang *Filipino+?",
"Kumain si $name1 ng longganisang *Lucban+ kagabi.",
"Nagsuot si Tatay ng barong *Tagalog+.",
"Nakikinig siya ng mga awiting *Kristiyano+.", 
"Dalawa ang kaibigang *Hapon+ ni $name1.", 
);
}

 
if ($grd==4 or $grd==5){
//panlarawan
$qsentences0[0]=array(
"Si $name1 ay *singkupad+ ng pagong magtrabaho.",
"*Bukod-tangi+ ang ipinakitang talento ni $name1.",
"*Magaganda+ ang mga parol sa tindahang iyon.",
"*Malakas+ ang ihip ng hangin doon sa dalampasigan.",
"*Magsintanda+ ang lolo ni $name1 at lolo ni $name2.",
"*Kay bait-bait+ ng mga kasambahay ni Gng. Santos!",
"Ang mga daan sa lugar ng mga katutubo ay *matarik+.",
"Aba, *$adj1+ pala ang bagong kaibigan ni $name1.",
"Ang larawan na gawa nina $name1 at $name2 ay *makulay+.",
"Si $name1 ang piliin mo dahil *malakas+ ang boses niya.",
"Sa kanilang magkakaklase, si $name1 ang *pinaka$adj1+.",
"*Ang galing-galing+ ng mga mananayaw na napanood namin!",
"Ang Ilog Nile ba ang *pinakamahabang+ ilog sa buong mundo?",
"Iyan ang *pinakamataas+ na gusali sa Lungsod ng Makati.",
"Ang kotse ni $name1 ay *mas mahal+ sa kotse ni $name2.",
"*Magsintanda+ ang magkaibigan na sina $name1 at $name2.",
"Si $name1 na yata ang *pinaka$adj1b+ tao sa nayong iyon.",
"Ang sabi nila ay *masigla+ ang pagdiriwang ninyo kagabi.",
"*Mas matangkad+ sa iyo ang kuya mo nang tatlong pulgada.",
"*Mapayapa+ ang buhay ng mag-anak sa bago nilang tirahan.",
"*Mahigpit+ ang pagpapasunod sa mga tuntunin ng paaralan.",
"Si $name1 ang *pinakamatangkad+ na anak ni Gng. Rosario.",
"*Higit na mabalahibo+ ang asong Shih-tzu kaysa Doberman.",
"Si $name1 ang *pinakamagulong+ mag-aaral sa buong klase.",
"Alin sa dalawang sasakyang ito ang *mas matulin+?",
"Ang bunsong anak ko ay *kasimbata+ ng panganay mo.",
"Ang boses ni $name1 ay *mas malakas+ sa boses ko.",
"Doon ka magbasa sa sala kung saan *mas maliwanag+.",
"Ang mga ito na ang *pinakamagagarang+ damit ni $name1.",
"Sa lahat ng manlalaro, *pinakamatangkad+ si $name1.",
"Sino ang nakakuha ng *pinakamaraming+ tamang sagot?",
"*Napakasaya+ talaga ng mga pagdiriwang tuwing Pasko.",
"Si $name1 ang *pinakamagaling+ na kamag-aral natin.",
);
//pamilang
$qsentences0[1]=array(
"*Kalahating+ papel lamang ang dala ko sa klase kanina.",
"*Sasampung+ sentimo lamang ang natira sa pera ni $name1.",
"Si $name1 ang *nag-iisang+ anak ng paborito kong pinsan.",
"Si $name1 na ang *ikatlong+ batang bumili ng mais dito.",
"*Mamera+ lang dito ang mga prutas na tulad ng bayabas.",
"*Tigpipiso+ lang ang saging na saba sa tindahan nila.",
"Alam mo bang *iisa+ na lamang ang natitira nating baka?",
"Ang taas ng bakod ni $name1 ay *dalawang+ metro.",
"Kumain si $name1 ng *isa't kalahating+ pinggang pansit.",
"*Wawalo+ na lamang ang mga gansa sa kanilang bakuran.",
"Bukas na ba ang *ikasampung+ kaarawan ni $name1?",
"Si $name1 ay *ikalima+ sa aming hanay sa klase.",
"*Isang+ kabang bigas ang kanyang iniuwi kagabi.",
"*Tig-aanim+ na hiyas ang ikinabit sa mga korona.",
"*Pitong+ pamilya raw ang nasunugan ng bahay sa Cebu.",
"*Sampung+ mag-aaral lamang ang pumasa sa pagsusulit.",
"*Isang daang libong+ piso ang puhunan ko rito.",
"Ang sasakyang ito ay may upuang *dalawahan+ lamang.",
"*Kalahating+ buwang sahod ang ibinigay ko sa kanya.",
"Marami kami sa bahay kaya *apatan+ ang bawat silid.",
"*Tigsasampung piso+ na pala ang halo-halo sa kanto.",
);
//pantangi
$qsentences0[2]=array(
"Paboritong meryenda ni $name1 ang pansit *Malabon+.",
"Si $name1 ay mahusay magsalita sa wikang *Ingles+.",
"Tangkilikin natin ang mga produktong *Pilipino+.",
"Isang paring *Katoliko+ ang namuno sa misa sa EDSA.",
"Mayaman sa kultura ang mga katutubong *Filipino+.",
"Nagpadala ako ng mga longganisang *Lucban+ kay $name1.",
"Isinuot ni Ginoong Martin ang bagong barong *Tagalog+.",
"Sila ay mga kasapi ng isang samahang *Kristiyano+.", 
"Alam mo bang matatamis ang mga manggang *Guimaras+?",
"Walang dudang may dugong *Tsino+ ang mag-anak na Tan.",
"Biyaheng *Davao+ ang barkong aalis mamayang tanghali.",
"Si $name1 ay bihasang magsalita ng wikang *Koreano+.",
"Isang madreng *Katoliko+ ang dumalaw sa mga bata kanina.",
"Maraming dayuhan na ang nag-aaral ng wikang *Filipino+.",
"Bumili at nagluto si $name1 ng longganisang *Vigan+ kagabi.",
"Alam mo bang nagsusulat siya ng mga awiting *Kristiyano+?", 
"Dalawa nga pala ang kaibigang *Hapon+ ni $name1.", 
);
}

if ($grd==6 or $grd==7){
//panlarawan
$qsentences0[0]=array(
"Dagdagan mo ng asukal ang kape mo dahil ito ay *matabang+.",
"Ikaw pala ang nagsabing *mas $adj1+ si $name1 kaysa kay $name2.",
"Ang ani natin ngayon ay *masagana+ kaya magpasalamat tayo.",
"Si $name1 ay *kasinghusay+ ni $name2 sa paglalaro ng basketbol.",
"*Higit na malayo+ ang bayan ng San Andres kaysa sa Sto. Tomas.",
"Ang pila sa pelikulang iyon ay *mas mahaba+ kaysa sa pilang ito.",
"Si $name1 ang *pinakamatalinong+ mag-aaral sa klase nina $name2.",
"Ang kalahok na mananalo sa paligsahang ito ay *napakasuwerte+.",
"Si $name1 ang *pinakaabala+ sa amin tuwing malapit na ang Pasko.",
"Ang hardin ni Gng. Marquez ay *mas malawak+ pa sa hardin ng plaza.",
"Ang sasabihin ko ay nakakatawa ngunit *di-gaanong mahalaga+.",
"Pinipili ni $name1 ang *pinakasariwang+ manok sa buong palengke.",
"Ang pakiramdam niya ay siya ang *pinakamayamang+ tao sa mundo.",
"Ang pagkain pala sa karinderyang ito ay *di-gaanong masarap+.",
"Ayon sa PAGASA, *malakas+ ang bagyong tatama sa ating nayon bukas.",
"Lumipas ang *napakahabang+ panahon bago ako lumapit sa kanya.",
"Naniniwala ka bang *mas $adj1+ si $name1 kaysa kay $name2?",
"*Tamad na tamad+ ang lalaking istambay diyan sa tindahan.",
"*Malinaw na malinaw+ ang leksiyon ni Gng. Soriano kahapon.",
"Ang bulkang Mayon ba ang *pinakaaktibong+ bulkan sa Pilipinas?",
);
//pamilang
$qsentences0[1]=array(
"Kumain si $name1 ng daing at *isa't kalahating+ pinggang sinangag.",
"Ang mga alahas ni $name1 ay katumbas ng *isang daang libong+ piso.",
"Ako ang *ikatlong+ mag-aaral na napiling lumahok sa paligsahan.",
"Ito ang *pangalawang+ pagkakataong ibibigay ng hukom kay $name1.",
"Gawin mo ang pagsasanay sa *ikalimampung+ pahina ng aklat.",
"*Tiglilimampiso+ ang bili ko sa mga lumang aklat na ito.",
"Si $name1 ang *ikalawang+ batang humingi ng tulong kay $name2.",
"Naging *dalawahan+ ang pila ng mga bumibili ng gamot sa botika kanina.",
"Nakamit ni $name1 ang *unang+ gantimpala sa paligsahan sa pagguhit.",
"Gumawa ako ng *tig-aanim+ na pangungusap sa bawat uri ng panghalip.",
"Si Rodrigo Duterte ang *ikalabing-anim+ na pangulo ng Pilipinas.",
"*Sanlibong+ punongkahoy ang itinanim ng mga magsasaka sa dakong iyon.",
"*Sasampung+ sentimo na lamang pala ang natira sa pera ni $name1.",
"*Tigpipiso+ lang daw ang saging na saba sa tindahan ni $name1.",
"Alam mo bang *tatatlo+ na lamang ang natitira nating kalabaw?",
"*Sangkapat+ na taon na pala ang nakalilipas mula noong magkita tayo.",
"Hindi ba't *wawalo+ na lamang ang mga itik sa kanilang bakuran?",
"Nakatanggap ng *tig-aapat+ na mansanas ang mga batang dumalo kanina.",
"Ang bawat upuan ng lumang dyip ni $name1 ay *panlimahan+ lamang.",
"Katumbas ng *dalawa't kalahating+ buwang sahod na ang aking naiipon.",
"Marami sila sa inuupahang bahay kaya *apatan+ ang bawat kuwarto.",
);
//pantangi
$qsentences0[2]=array(
"Mahilig si $name1 sa 'pizza' at iba pang pagkaing *Italyano+.",
"Isa sa kanyang mga paboritong pagkain ang empanadang *Ilocos+.",
"Maraming alam na lutuing *Pilipino+ ang tiya ni $name1 sa Maynila.",
"Nagsaliksik kami tungkol sa mga katangian ng kulturang *Espanyol+.",
"Ang pasalubong ni Tatay sa atin ay masarap na longganisang *Lucban+.",
"Malakas ang impluwensiya ng kulturang *Amerikano+ sa ating mga kabataan.",
"Madalas bumili si $name1 ng pansit *Malabon+ dahil paborito niya ito.",
"Si $name1 ay nagpakadalubhasa sa pagsasalita ng wikang *Ingles+.",
"Tangkilikin natin ang mga produktong *Pilipino+ upang tayo ay umunlad.",
"Isang paring *Katoliko+ ang kanilang inanyayahan sa kanilang tahanan.",
"Pahalagahan natin ang mayamang kultura ng mga katutubong *Filipino+.",
"Nagpabili kami kay $name1 ng longganisang *Vigan+ noong Linggo.",
"Isinukat ni $name1 ang barong *Tagalog+ ngunit hindi ito kasya sa kanya.",
"Silang magkakaibigan ay sumapi sa isang samahang *Kristiyano+.", 
"Nakatikim na ba ang mga dayuhan mong panauhin ng manggang *Guimaras+?",
"Biyaheng *Davao+ ang barkong sinakyan ng mga kaibigan mong siyentipiko.",
);
}

if ($grd>=8){
//panlarawan
$qsentences0[0]=array(
"Ang ani natin ngayon ay *mas masagana+ kaysa sa ani noong nakaraang taon.",
"Dagdagan mo pa ng asukal ang kapeng tinimpla mo dahil ito ay *matabang+.",
"Hindi pa tayo maaaring magsimula dahil hindi pa *buo+ ang ating pangkat.",
"Ayon sa PAGASA, *malakas+ ang bagyong tatama sa hilagang bahagi ng Luzon.",
"Hindi ka pa rin ba naniniwalang *$adj1+ ang dayuhang kapitbahay nina $name1?",
"Ang balita namin ay hindi makapaniwala si $name1 na talagang *$adj1+ si $name2.",
"Ang mga gulay at prutas sa tindahan ko ay *mas sariwa+ kaysa sa palengke.",
"Ang pangkat ni $name1 ay *mas mabilis+ magtrabaho kaysa sa pangkat ni $name2.",
"Ayon sa mga guro, si $name1 ang *pinaka$adj1b+ estudyante sa paaralang iyon.",
"Walang gustong makipagkaibigan sa kanya dahil *ubod ng sama+ ang kanyang ugali.",
"Lumipas muna ang *napakatagal+ na panahon bago sumang-ayon sa plano ang pinuno.",
"*Napakaganda+ ng mga palamuti sa mga bahay sa aming nayon tuwing Pista ng Pahiyas.",
"Si $name1 nga ba ang *pinakamahusay+ na manunulat sa buong unibersidad?",
);
//pamilang
$qsentences0[1]=array(
"Nag-almusal si $name1 ng tapa, itlog, at *isa't kalahating+ pinggang sinangag.",
"Ang mga alahas na ipinakita ni $name1 ay katumbas ng *isang daang libong+ piso.",
"Ako ang *ikatlong+ mag-aaral na napiling lumahok sa paligsahan bukas.",
"Ang negosyong ito ay nangangailangan ng *isang daang libong+ pisong puhunan.",
"Nasayang lamang ang *pangalawang+ pagkakataong ibinigay ng hukom kay $name1.",
"Ipinagawa ng guro sa mga mag-aaral ang pagsasanay sa *ikalimampung+ pahina ng aklat.",
"Si $name1 ang *ikalawang+ batang humingi ng saklolo sa pangkat nina $name2.",
"Sa dami ng tao, naging *dalawahan+ ang bawat pila ng mga bumibili ng pagkain sa karinderya kanina.",
"Nakamit ni $name1 ang *unang+ gantimpala sa paligsahan sa pagguhit kaninang umaga.",
"Bilang pagsasanay, gumawa ako ng *tig-aanim+ na pangungusap sa bawat uri ng panghalip.",
"*Sanlibong+ punongkahoy ang itinanim ng mga magsasaka sa burol na malapit sa kanilang palayan.",
"*Sasampung+ sentimo na lamang pala ang natira sa dalang pera ni $name1 kahapon.",
"*Tigpipiso+ lang daw ang bawat tali ng gulay sa tindahan ni $name1 sa palengke.",
"Alam mo bang *tatatlo+ na lamang ang natitira nating kalabaw na maaaring gamitin sa pagsasaka?",
"*Sangkapat+ na taon na pala ang nakalilipas mula noong huli tayong magkita sa paligsahan.",
"Dahil naipagbili na ang iba, *wawalo+ na lamang ang mga itik sa kanilang bakuran.",
"Nakatanggap ng *tig-aapat+ na mansanas ang mga batang dumalo sa palakasan kanina.",
"Ang luma at kinakalawang na bangka ni $name1 ay may upuang *pantatluhan+ lamang.",
"Katumbas ng *tatlo't kalahating+ buwang sahod na ang aking naihuhulog kay $name1.",
"Marami sila sa pinauupahang bahay ni $name1 kaya naging *apatan+ ang bawat silid.",
);
//pantangi
$qsentences0[2]=array(
"Magaling magluto si $name1 ng 'spaghetti' at iba pang pagkaing *Italyano+.",
"Hindi maikakailang isa sa mga paboritong pagkain ni $name1 ang empanadang *Ilocos+.",
"Ayon kay $name1, maraming alam na lutuing *Pilipino+ ang tiya ni $name2 sa Maynila.",
"Sinasaliksik namin ngayon ang iba’t ibang katangian ng kulturang *Espanyol+.",
"Ang balak ipasalubong sa atin ni Tatay sa Sabado ay masarap na longganisang *Lucban+.",
"Malakas ang impluwensiya ng kulturang *Amerikano+ sa ating mga kabataan.",
"Madalas bumili si $name1 ng pansit *Malabon+ sa kanto dahil paborito niya ito.",
"Nagpakadalubhasa si $name1 sa pagsasalita ng wikang *Pranses+ noong nag-aral siya sa Pransiya.",
"Tangkilikin natin ang mga produktong *Pilipino+ upang umunlad ang ating ekonomiya.",
"Isang paring *Katoliko+ ang kanilang inanyayahan upang basbasan ang kanilang tahanan.",
"Marapat lamang na pahalagahan natin ang mayamang kultura ng mga katutubong *Filipino+.",
"Sinubukang isuot ni $name1 ang barong *Tagalog+ na ito ngunit hindi ito nagkasya sa kanya.",
"Sigurado ka bang nakatikim na ang mga dayuhan mong panauhin ng manggang *Guimaras+?",
"Biyaheng *Davao+ ang barkong sinakyan kagabi ng mga kaibigan mong siyentipiko.",
);
}


    $labels = ['Panlarawan', 'Pamilang', 'Pantangi'];
    $available = [];
    foreach ($qsentences0 as $category => $sentences) {
        foreach ($sentences as $i => $sentence) {
            $id = "$category-$i";
            if (!in_array($id, $past, true)) $available[$category][] = $i;
        }
    }
    if (!$available) { $past = []; foreach ($qsentences0 as $category => $sentences) $available[$category] = array_keys($sentences); }
    $category = array_rand($available);
    $i = $available[$category][array_rand($available[$category])];
    $past[] = "$category-$i";
    $sentence = $qsentences0[$category][$i];
    $choices = $labels; shuffle($choices);
    return ['sentence' => $sentence, 'answer' => $labels[$category], 'choices' => $choices, 'token' => bin2hex(random_bytes(16))];
}
function pu_h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function pu_highlight($s) { return preg_replace('/\*([^+]+)\+/', '<strong style="color:#CC0066">$1</strong>', pu_h($s)); }
if (isset($_POST['Submit2']) || empty($state['current'])) {
    $state['current'] = pu_generate($grd, $state['past']);
    unset($state['result']);
} elseif (isset($_GET['ansclick'], $_GET['qid']) && is_string($_GET['ansclick']) && is_string($_GET['qid']) && !isset($state['result'])) {
    $q = $state['current'];
    if (hash_equals($q['token'], $_GET['qid']) && in_array($_GET['ansclick'], $q['choices'], true)) {
        $state['result'] = ['selected' => $_GET['ansclick'], 'correct' => $scorer->processAnswer($_GET['ansclick'], $q['answer'], 'Easy')];
    }
}
$_SESSION[$key] = $state;
$q = $state['current']; $result = $state['result'] ?? null;
$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = ['word'=>pu_highlight($q['sentence']), 'correct'=>$q['answer']]; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <strong style="color:#0000CC;">'<?php echo htmlspecialchars($result['selected'], ENT_QUOTES, 'UTF-8'); ?>'</strong>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo pu_h(ucfirst($cur['correct'])); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = ['word'=>pu_highlight($q['sentence']), 'choices'=>$q['choices'], 'qid'=>$q['token'], 'correct'=>$q['answer']]; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang uri ng pang-uring kulay pula sa pangungusap.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 3;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?resume=1&amp;ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pu_h(ucfirst($choice)); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php endif; ?>

</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($result !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
