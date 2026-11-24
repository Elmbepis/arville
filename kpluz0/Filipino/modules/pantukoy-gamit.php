<?php
// filipino/modules/pantukoy-gamit.php
// Six grade-dependent sentence banks.

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
$moduleTitle = 'Paggamit ng Tamang Pantukoy';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function ptg_tier(string $lvl, int $grd): int { return ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? 2 : 0); }
function ptg_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
1 => ['ang>Nakita ni $name1 ____ elepante roon.+si*ni', 'ang>Maganda ____ proyekto ni $name1.+si*ni', 'ang>Kinuha ni Raul ____ $item.+si*ni', 'ang>Si $name1 ____ batang nasa larawan.+si*ang mga', 'ang mga>Sila ____ batang nakita ko.+ang*si', 'ang mga>Lima lahat ____ tuta namin.+ang*ni', 'ang mga>Mababait ____ taong dumaan kanina.+ang*si', 'ang mga>Mahahaba ____ lubid na nasa silid.+ang*si', 'ang mga>____ guro ay sama-samang kumain.+ang*si', 'kay>Ako na lang ang tatawag ____ $name1.+ni*si', 'kay>Ang bolang ito ay ____ $name1.+ni*si', 'kay>Ako ay nagpaturo ____ $name1.+ni*si', 'kay>Ibinigay ko ____ $name1 ang $item.+si*ni', 'kay>Nagtanong si $name1 ____ $name2.+si*ni', 'kina>Iaabot ko ito ____ $name1 at $name2.+si*ni', 'kina>Ang keyk na ito ay ____ $name1 at $name2.+sina*nina', 'ni>Ang basura ay itinapon ____ $name1.+sa*kay', 'ni>Kinuha ____ $name1 ang $item.+si*ang', 'ni>Pinakain ____ $name1 ang mga bibe.+si*ang', 'ni>Hinabol ____ $name1 ang pusa.+si*ang', 'ni>Matalino ang pinsan ____ $name1.+si*ang', 'ni>Mahaba ang buhok ____ $name1.+si*kay', 'ni>Kulay asul ang mga mata ____ $name1.+si*kay', 'nina>Kapatid ka ba ____ $name1 at $name2?+sina*ni', 'nina>Sinundo ka ba ____ $name1 at $name2?+sina*ni', 'si>Bumili ____ $name1 ng $item.+ni*sina', 'si>Kumain ____ $name1 ng pandesal.+ni*kay', 'si>Nagbasa ____ $name1 ng aklat.+ni*ang', 'si>Nagluto ____ $name1 ng ulam.+ni*ang', 'Si>____ $name1 ay nakinig sa radyo.+Ni*Ang', 'Si>____ $name1 ay sumakay sa dyip.+Ni*Ang', 'sina>Kaibigan ko ____ $name1 at $name2.+si*sila', 'sina>Kasama ko ngayon ____ $name1 at $name2.+si*sila'],
2 => ['ang>Iisa lamang ____ dumaang kotse kanina.+si*ang mga', 'ang>Kulas ____ pangalan ng aso ni $name1.+si*ang mga', 'ang>Bukas na pala ____ kaarawan ni $name1.+si*ang mga', 'ang>Huwag mong kalimutang isuot ____ ID mo.+ang mga*sa', 'ang>Ano ____ paksa ng kuwentong isinulat mo?+ang mga*kay', 'ang>Malapit lang dito ____ opisina ng tatay ko.+ang mga*sa', 'ang>Hinahabol ng asong kalye ____ itim na pusa.+ang mga*sa', 'ang mga>Dala-dalawang nagpunta sa kusina ____ bata.+ang*si', 'ang mga>Sama-samang nag-aral ____ kamag-aral niya.+ang*sina', 'ang mga>Daan-daan ____ taong bumati kay $name1.+ang*sina', 'ang mga>Sina $name1 at $name2 ____ naiwang bata.+ang*sina', 'Kay>____ $name1 ba itong bagong pantalon?+Sa*Kina', 'kay>____ Lani ba itong bagong itim na pantalon?+kina*si', 'kay>Pakibigay itong liham ____ G. Del Rosario.+kina*sa', 'kay>Ang susi ng tindahan ay iniwan ko ____ $name1.+kina*sa', 'kay>Ang bolang nasa ilalim ng kotse ay ____ $name1.+si*sa', 'Kina>____ $name1 at $name2 ang mga manok na iyon.+Sina*Kay', 'kina>Ang mga damit na ito ay ____ $name1 at $name2.+nina*sina', 'ni>Pinakain ____ Raul ang kanyang mga alagang aso.+si*kay', 'ni>Malaki na ang alagang kambing ____ $name1.+si*kay', 'ni>Si $name1 ang panganay na anak ____ Gng. Cruz.+nina*nila', 'ni>Nasabi na ba sa iyo ____ $name1 ang lihim niya?+kay*nina', 'nina>Ipinagluto ako ____ $name1 at $name2 kahapon.+sina*ni', 'nina>Isinama ka ba ____ $name1 at $name2 kagabi?+sina*ni', 'si>Bumili ____ $name1 ng $item kanina.+ni*sina', 'si>____ $name1 ang unang batang dumating kanina.+ni*sina', 'sina>Magpapatingin sa doktor ____ $name1 at $name2.+sila*si', 'sina>Galing sa palengke ____ $name1 at $name2.+si*sila', 'sina>Magpapatingin sa doktor ____ $name1 at $name2.+si*sila', 'sina>____ $name1 at $name2 ay mga pinsan ni $name1.+si*sila'],
3 => ['Ang>____ pamilya ni $name1 ay magbabakasyon sa Palawan.+Ang mga*Kay', 'Ang>____ paborito kong mang-aawit ay si Bruno Mars.+Ang mga*Si', 'ang>Nakita mo ba ____ puting blusa ng aking uniporme?+ang mga*kay', 'ang>Si Mang Ramon ____ may-ari at tsuper ng dyip na ito.+ang mga*si', 'ang>May butas pala ____ unahang gulong ng bisikleta mo.+ang mga*si', 'ang>Nakita mo ba ____ listahan ng mga bagong nars?+ang mga*sa', 'ang>Narinig mo ba ____ ingay ng trak ng mga bumbero?+ang mga*sa', 'ang mga>Nakapila na ____ mamimili sa labas ng tindahan.+ang*sa', 'ang mga>Palitan na natin ____ punda sa lahat ng mga silid.+ang*kina', 'ang mga>Itinago mo na ba ____ aklat at kuwaderno mo sa bag?+ang*kay', 'ang mga>Libu-libo ____ taong nasalanta ng bagyong \'Ondoy\'.+ang*sina', 'ang mga>Binilang ng bata ____ sasakyang nakaparada sa bukid.+ang*sa', 'kay>Ang asul na tsinelas sa harap ng pinto ay ____ $name1.+kina*sa', 'kay>Nagsumbong ____ $name1 ang nakababata niyang kapatid.+kina*sa', 'Kay>____ Nanay ka magpaalam kung nais mong lumabas sa Sabado.+Sa*Si', 'Kina>____ Wilma at Michelle ba itong mga gamit sa mesa?+Kay*Sina', 'Kina>____ $name1 at $name2 ba itong mga aklat sa mesa?+Sila*Kay', 'ni>Pinakain ____ $name1 ang kanyang mga alagang aso.+nina*nila', 'ni>Ang mga aklat na ito ay isasauli ____ $name1 sa akin.+nila*kay', 'ni>Naipahiram ba sa iyo ____ $name1 ang kanyang lapis?+nina*nila', 'nina>Bibigyan ako ____ $name1 at $name2 ng isang bagong relo.+sina*ni', 'nina>Ibinili kami ____ $name1 at $name2 ng mga gamot sa botika.+sina*ni', 'Si>____ Gng. Marquez ang magiging guro natin sa agham.+Sila*Sina', 'Si>____ $name1 ay isang mahusay na manlalaro ng basketbol.+Sina*Sila', 'Si>____ G. Marquez ang magiging guro natin sa agham.+Sina*Sila', 'si>Tutulungan ko ____ $name1 sa pagdidilig sa bakuran.+kay*sila', 'si>Kasama kong kumain ng tanghalian sa kantina ____ $name1.+sila*ni', 'sina>Nakasabay mo ba sa traysikel ____ $name1 at $name2?+si*sila', 'sina>Nagbisikleta, tumakbo, at lumangoy ____ $name1 at $name2.+si*sila', 'sina>Namangka ____ $name1 at $name2 patungo sa pulong iyon.+si*sila'],
4 => ['Ang>____ inahin ay laging sinusundan ng kanyang mga sisiw.+Ang mga*Si', 'Ang>____ pangulo ng Pilipinas ay inihahalal ng mga mamamayang Pilipino.+Ang mga*Si', 'Ang>____ \'Lupang Hinirang\' ay sabay-sabay na inaawit ng mga estudyante.+Ang mga*Sa', 'ang>Kakain ____ pamilya $surname sa labas pagkatapos nilang magsimba.+sina*si', 'ang>Kapag tayo ay nagtutulungan, ____ mahirap na gawain ay gumagaan.+kay*si', 'Ang mga>Sina $name1, $name2, at $name3 ____ anak nina G. at Gng. Villamor.+Ang*Si', 'Ang mga>____ batas trapiko at babala sa lansangan ay dapat natin sundin.+Ang*Kay', 'Ang mga>____ kulay sa ating watawat ay asul, pula, dilaw, at puti.+Kay*Ang', 'ang mga>Daan-daan ____ taong sumali sa paligsahang ginanap kahapon.+ang*sina', 'ang mga>Isa-isang ipinaliwanag ng punong guro ____ tuntunin ng paaralan.+ang*kay', 'ang mga>Inilipad ng malakas na hangin ____ tuyong dahon sa lupa.+kina*kay', 'ang mga, ang>Pumasok ____ bata nang tumunog na ____ kampana.+ang mga, si*sina, ang', 'kina>Ibibilin ko ____ $name1 at $name2 na bantayan muna ang mga bata.+kay*sina', 'kina>May sasabihin ka ba ____ $name1 at $name2 kapag pumunta sila rito mamaya?+kay*sina', 'ni>Ang mga aklat na ito ay isasauli ____ Bb. Sanchez sa silid-aklatan.+nina*si', 'ni>Ikinuwento sa akin ____ $name1 ang napanood niyang pelikula kanina.+nina*nila', 'ni>Inaabangan daw ____ $name1 ang kanyang mga anak sa harap ng paaralan.+nina*nila', 'ni>Ipinangako ____ $name1 na titigil na siya sa paninigarilyo.+nina*si', 'ni>Sama-samang nagpunta sa palengke ang mga kamag-aral ____ $name1.+si*kay', 'nina>Gustong-gusto ____ lolo at lola ang niluto mo para sa kanila.+ni*nila', 'nina>Ikinuwento sa akin ____ $name1 at $name2 ang napanood nilang pelikula.+ni*sina', 'nina>Iginuhit ____ $name1, $name2, at $name3 itong napakagandang larawan.+ni*nila', 'nina>Kinulang ang inilutong pagkain ____ $name1 at $name2 kanina.+ni*sina', 'Si, kay>____ $name1 ang nang-api ____ $name2 noong mga bata pa sila.+Si, ni*Sina, kay', 'si>Kanina ko pa hinihintay umuwi ____ $name1 mula sa paaralan.+ni*sila', 'si>Isa-isang umalis ang mga manlalaro nang dumating ____ $name1.+ang*ni', 'si>Nakakatuwang nagkuwento ____ Lolo Tonio tungkol sa kanyang kabataan.+ang*ni', 'si>Mamimili ____ $name1 ng mga damit sa Divisoria at ititinda niya ang mga ito.+ang*ni', 'sina>Tinuruan ko ____ $name1 at $name2 kung paano gumamit ng martilyo.+si*nina', 'sina>Aabot ____ $name1 at $name2 sa pagdiriwang kung aalis na sila ngayon.+si*nina', 'sina>Umalis ____ $name1 at $name2 nang maaga ngunit wala silang nasakyang dyip.+si*nina', 'sina>Hinanap ko ____ $name1 at $name2 ngunit hindi ko sila nakita.+si*nina'],
5 => ['Ang>____ bagong tuta niya ay isang pitbull at pinangalanan niya itong \'Bangis\'.+Ang mga*Si', 'Ang mga>____ Muslim nating kababayan ay nagdiwang ng Eid al-Fitr noong nakaraang linggo.+Sina*Kay', 'ang>Gusto sana nilang magbisikleta subalit masama ____ lagay ng panahon ngayon.+ang mga*si', 'ang mga>Ibibigay ni $name1 ____ lumang damit at kumot sa mga napinsala ng bagyo.+ang*si', 'ang mga>Nanlaki ____ mata ng mga tagapanood nang ipakita ang multo sa pelikula.+ang*sa', 'ang mga, si>Naubos na ____ puno kaya wala nang magamit na kahoy ____ $name1.+ang, kay*ang mga, ni', 'ang mga, sina>Iligpit na ninyo ____ kalat bago dumating ____ Tatay at Nanay.+ang mga, si*si, sina', 'ang, si>Dahil inihatid pa niya ____ kanyang kapatid, nahuli sa klase ____ $name1.+ang, kay*si, si', 'kina>Sumama ka ____ $name1 at $name2 dahil alam nila ang daan patungong simbahan.+kay*sa', 'ni, si>Binigyan ____ $name1 ng dyaket ____ $name2 ngunit hindi ito kasya sa kanya.+si, si*ni, ni', 'nina>Ang silid-aralan ____ Marco at Manny ay nasa ikalawang palapag ng gusali.+ni*nila', 'nina>Ang silid-aralan ____ $name1 at $name2 ay nasa ikalawang palapag ng gusali.+kina*sina', 'si>Nag-aral nang mabuti ____ $name1 ngunit hindi siya nakakuha ng mataas na marka.+ni*kay', 'si>Maaaring matanggal ____ $name1 sa trabaho kung magpapatuloy siya sa pagpapabaya.+ni*kay', 'Si, kina>____ $name1 ang bumili ng mga laruan para ____ $name2 at $name3.+Si, kay*Sila, kina', 'si, kay>Nakabili ____ $name1 ng $item ____ $name2 nang magkita silang dalawa.+sina, kay*si, kina', 'si, ang>Magaling tumugtog ng piyano ____ $name1 at mahusay kumanta ____ ate niya.+ni, ang*si, ni', 'si, ang>Dahil masipag ____ $name1, napalaki niya ____ maliit niyang negosyo.+ni, ang*si, ni', 'si, si>Kumakain ng almusal ____ $name1 habang nag-eehersisyo ____ $name2 sa labas.+ni, si*si, ni', 'sina>Tinuruan ko ____ $name1 at $name2 kung paano magtahi gamit ang \'sewing machine\'.+si*sila', 'sina, ang>Biglang bumangon ____ $name1 at $name2 nang lumakas na ____ bagyo.+si, ang*sina, kay', 'kina>Pakisabi ____ Inay at Ate na magsisimula na ang programang inaabangan nila sa telebisyon.+kay*sa', 'ang mga>Inaanyayahan ng punong guro ____ magulang ng mga mag-aaral na dumalo sa pagdiriwang.+ang*sa'],
6 => ['ang>Uminom na ako ng gamot kaninang umaga subali\'t sumasakit pa rin ____ tiyan ko hanggang ngayon.+si*kay', 'ang>Nagpasalamat ____ matanda sa binatang nagligtas ng kanyang buhay nang muli silang magkita kagabi.+si*kay', 'ang>Bibisitahin namin ____ aming lola sa Sabado upang makasama namin siya sa kanyang kaarawan.+si*kay', 'ang>Nakapasa siya sa gusto niyang kolehiyo pero hindi kayang bayaran ng kanyang mga magulang ____ matrikula para rito.+ng*ni', 'ang mga>Para madali mong matapos ang proyektong iyan, pakinggan mo ____ sasabihin ko sa\'yo ngayon.+kina*sina', 'ang mga>Nag-eensayo araw-araw ____ estudyanteng magtatanghal dahil ayaw nilang mapahiya sa mga magulang.+kina*ang', 'ang, kay>Kung hindi ko mapapapalitan ____ $item na ito sa tindahan, ibibigay ko na lang ito ____ $name1.+ang, si*si, kay', 'ang, ni>Lalabhan at paplantsahin ko ____ pantalon ____ $name1 mamaya para mayroon siyang magamit bukas.+ang, si*si, ni', 'ang, si>Maaaring manganib ____ buhay ng mga hayop kung maglalagay ____ $name1 ng ulingan sa kagubatan.+ang, ni*kay, si', 'kina>May sorpresa kaming inihanda para ____ Tatay at Nanay sa okasyon ng kanilang anibersaryo.+sa*sina', 'ni, ang>Nang may dumating na hamon sa buhay ____ $name1, ____ matalik niyang kaibigan ang unang dumamay sa kanya.+si, ang*ni, kay', 'ni, ang>Ibinili ____ $name1 ng kendi ____ kanyang batang kapatid subali\'t hindi pa rin niya napangiti ito.+si, ang*ni, si', 'si, ang>Nag-ehersisyo ____ $name1 sa Luneta tuwing umaga hanggang lumakas ____ kanyang pangangatawan.+ang, ang*si, kay', 'si, ang>Simula nang maging alkalde ____ Ginang $surname, marami na ____ nagbago sa lungsod.+si, ni*ang, ang', 'si, si>Tumanggap ng gantimpala sa pag-awit ____ $name1 habang nanalo naman sa paligsahan sa pagsayaw ____ $name2.+si, ni*ni, si', 'sina>Ang susunod na mag-uulat tungkol sa mga epekto ng pagbabago ng klima ay ____ $name1 at $name2.+sila*si', 'sina>Mahilig sa pagsasaya ____ $name1 at $name2 ngunit may panahon din sila sa kanilang mga hanapbuhay.+si*sila', 'sina, ang>Dahil maawain ____ $name1 at $name2, pinagtulungan nilang pag-aralin sa kolehiyo ____ batang ulila.+si, ang*sina, si', 'sina, ang>Sumakay ng dyip patungong paaralan ____ $boy at $girl upang sunduin ____ kanilang anak.+si, ang*sina, si'],
];
$names[0] = ['Adam', 'Alex', 'Angel', 'Ben', 'Carlos', 'Chris', 'Danilo', 'David', 'Diego', 'Ian', 'Isaac', 'Jack', 'Jason', 'Jose', 'Jimmy', 'Juan', 'Jose', 'Kevin', 'Lucas', 'Luis', 'Max', 'Nick', 'Robert', 'Sam', 'Tomas', 'Willie', 'Alice', 'Amy', 'Anna', 'Bella', 'Beth', 'Carol', 'Elisa', 'Emma', 'Eva', 'Grace', 'Joy', 'Julia', 'Kathy', 'Leah', 'Lina', 'Lydia', 'Maria', 'Mely', 'Mia', 'Naty', 'Sarah', 'Sofia', 'Tina', 'Vicky'];
$names[1] = ['Adam', 'Adrian', 'Alex', 'Alexander', 'Andrew', 'Angelo', 'Benjamin', 'Brandon', 'Caleb', 'Cameron', 'Carlos', 'Carson', 'Carter', 'Charles', 'Christopher', 'Daniel', 'David', 'Diego', 'Dominic', 'Dylan', 'Elijah', 'Ethan', 'Gabriel', 'Hayden', 'Ian', 'Isaac', 'Isaiah', 'Jack', 'Jacob', 'Jaden', 'James', 'Jason', 'Jose', 'John', 'Jonathan', 'Joseph', 'Joshua', 'Juan', 'Julian', 'Justin', 'Kevin', 'Logan', 'Lucas', 'Luis', 'Luke', 'Matthew', 'Max', 'Michael', 'Nathan', 'Nicholas', 'Noah', 'Oliver', 'Owen', 'Parker', 'Robert', 'Ryan', 'Samuel', 'Sebastian', 'Thomas', 'Tristan', 'William', 'Alexandra', 'Alyssa', 'Amelia', 'Andrea', 'Anna', 'Ariana', 'Arianna', 'Bella', 'Brooke', 'Camille', 'Caroline', 'Chloe', 'Claire', 'Elizabeth', 'Emma', 'Eva', 'Evelyn', 'Gabriela', 'Grace', 'Hannah', 'Isabella', 'Jasmine', 'Jocelyn', 'Jolina', 'Julia', 'Katherine', 'Kylie', 'Lauren', 'Layla', 'Leah', 'Lillian', 'Lydia', 'Madeline', 'Maria', 'Mariah', 'Melanie', 'Mia', 'Naomi', 'Natalie', 'Olivia', 'Samantha', 'Sarah', 'Sofia', 'Stella', 'Tina', 'Victoria'];
$items0[1] = ['aklat', 'baso', 'lapis', 'tasa'];
$items0[2] = ['kaldero', 'kawali', 'kulambo', 'martilyo', 'palanggana', 'pamaypay', 'payong', 'platito'];
$boys = ['Alex', 'Ben', 'Carlos', 'Daniel', 'Diego', 'Gabriel', 'Isaac', 'Jaime', 'Jose', 'Juan', 'Jonathan', 'Lucas', 'Luis', 'Max', 'Roberto', 'Samuel', 'Tomas'];
$girls = ['Annie', 'Betty', 'Caring', 'Elisa', 'Emma', 'Eva', 'Evelyn', 'Grace', 'Josie', 'Julie', 'Katring', 'Laura', 'Lydia', 'Maring', 'Olive', 'Tina', 'Toyang'];
$surnames = ['Cruz', 'de Guzman', 'Gomez', 'Padua', 'Santos', 'Reyes', 'Tolentino', 'Torres'];
$tier = ptg_tier($lvl, $grd);
function ptg_question(string $raw, int $tier, string $lvl, array $names, array $items0, array $boys, array $girls, array $surnames): array {
    [$correct, $word, $a, $b] = preg_split('/[>+*]/', $raw);
    $ns = array_values(array_unique($names[$tier < 3 ? 0 : 1])); shuffle($ns);
    $items = $items0[$tier <= 3 ? 1 : 2];
    $word = strtr($word, ['$name1'=>$ns[0], '$name2'=>$ns[1], '$name3'=>$ns[2], '$item'=>$items[array_rand($items)], '$boy'=>$boys[array_rand($boys)], '$girl'=>$girls[array_rand($girls)], '$surname'=>$surnames[array_rand($surnames)]]);
    $wrong = [$a, $b]; shuffle($wrong);
    $choices = array_merge([$correct], array_slice($wrong, 0, $tier === 1 ? 1 : 2)); shuffle($choices);
    return ['word'=>$word, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
function ptg_completed(array $cur): string {
    $parts = explode('____', $cur['word']);
    $answers = array_map('trim', explode(',', $cur['correct']));
    $out = ptg_h($parts[0]);
    foreach ($answers as $i => $answer) {
        if ($i === 0 && $parts[0] === '') $answer = ucfirst($answer);
        $out .= '<strong style="color:#CC0066;">'.ptg_h($answer).'</strong>'.ptg_h($parts[$i+1]);
    }
    return $out;
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
    $available = array_values(array_diff(array_keys(array_unique($banks[$tier])), $used));
    if (!$available) { $used = []; $available = array_keys(array_unique($banks[$tier])); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = ptg_question($banks[$tier][$i], $tier, $lvl, $names, $items0, $boys, $girls, $surnames);
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
            <?php echo ptg_completed($cur); ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo ptg_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo ptg_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang <?php echo strpos($cur['correct'], ",") !== false ? "mga " : ""; ?>tamang pantukoy para mabuo ang pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? count($cur['choices']) : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?>
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
