<?php
// filipino/modules/pang-uri-antas.php
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
$moduleTitle = 'Kaantasan ng Pang-uri';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pua_tier(string $lvl, int $grd): int {
    return ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? 2 : 0);
}
function pua_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [1 => [['Si $name1 ay isang *$adj1b+ tao.', 'lantay'], ['Ito ay isang *$adj2b+ bagay.', 'lantay'], ['Kailangan ko ng *makapal+ na kumot.', 'lantay'], ['*Matao+ sa bahay namin kanina.', 'lantay'], ['Totoo palang *$adj1+ si $name1.', 'lantay'], ['Oo, dati nang *$adj1+ si $name1.', 'lantay'], ['Ang aking bagong damit ay *maganda+.', 'lantay'], ['Si $name1 ay isang *malusog+ na bata.', 'lantay'], ['*Matibay+ ang nabili niyang sapatos.', 'lantay'], ['*Masikip+ na ang kanyang pantalon.', 'lantay'], ['Sa iyo ba itong *puting+ tasa?', 'lantay'], ['Siya ang *mas $adj1+.', 'pahambing'], ['Iyan ang *mas $adj2+.', 'pahambing'], ['Si $name1 ang *mas $adj1+.', 'pahambing'], ['Ito ang *mas $adj2+.', 'pahambing'], ['Si $name1 ang *mas bata+ sa akin.', 'pahambing'], ['Ang kabayo ay *mas mabilis+ sa tao.', 'pahambing'], ['Si $name1 ay *mas tahimik+ kay $name2.', 'pahambing'], ['*Mas malaki+ ang elepanteng iyon.', 'pahambing'], ['*Mas maliit+ ang nahuli kong isda.', 'pahambing'], ['Hawak niya ang *mas magandang+ aklat.', 'pahambing'], ['*Higit na masarap+ ang ulam na ito.', 'pahambing'], ['Siya ang *pinaka$adj1+ sa amin.', 'pasukdol'], ['Iyan na nga ang *pinaka$adj2+.', 'pasukdol'], ['Si $name1 ang *pinaka$adj1+ dito.', 'pasukdol'], ['Ito ang *pinaka$adj2b+ bagay.', 'pasukdol'], ['*Kay haba+ naman ng pila sa bangko.', 'pasukdol'], ['*Napakasikip+ sa labas tuwing uwian.', 'pasukdol'], ['*Ubod ng laki+ ng bahay nina $name1!', 'pasukdol'], ['*Napakataas+ pala ng bundok na iyan.', 'pasukdol']],
2 => [['*Mataas+ ang antas ng talento ni Juan Luna.', 'lantay'], ['Ang buhay sa aming lalawigan ay *payapa+.', 'lantay'], ['*Malayo+ ang lugar na pupuntahan natin.', 'lantay'], ['Nakahiga ang sanggol sa *malaking+ kama.', 'lantay'], ['Ang simoy ng hangin sa gabi ay *malamig+.', 'lantay'], ['Ang sabi ni $name1 ay *$adj1+ si $name2.', 'lantay'], ['Ibigay mo ang *makapal+ na aklat kay $name1.', 'lantay'], ['*Malamig+ na tubig ba ang gusto mong inumin?', 'lantay'], ['May kilala ka bang *mahusay+ na mananahi?', 'lantay'], ['Si $name1 ay bumili ng isang *magarang+ kotse.', 'lantay'], ['Huwag kang lalapit sa *mabangis+ na asong iyan.', 'lantay'], ['Si $name1 ay *mas $adj1+ kaysa kay $name2.', 'pahambing'], ['Si $name1 ay *singkupad+ ng pagong.', 'pahambing'], ['Ang dalawang sanggol ay *magkatimbang+.', 'pahambing'], ['Sina $name1 at $name2 ay *magkasinggulang+.', 'pahambing'], ['Ang sasakyan ni $name1 ay *simbilis+ ng tren.', 'pahambing'], ['Si $name1 ay *higit na mabait+ kaysa kay $name2.', 'pahambing'], ['*Higit na malubak+ ang daan dito kaysa roon.', 'pahambing'], ['*Magkapangalan+ sina $name1 at ang kaibigan ni $name2.', 'pahambing'], ['*Mas matamis+ ang leche flan kaysa keyk.', 'pahambing'], ['*Higit na mabaho+ ang lugar na ito kaysa roon.', 'pahambing'], ['Siya ang nakakuha ng *mas maraming+ tamang sagot.', 'pahambing'], ['Sa inyong lahat, si $name1 ang *pinaka$adj1+.', 'pasukdol'], ['Si $name1 na nga ang *pinaka$adj1+ sa kanila.', 'pasukdol'], ['*Napakasarap+ ng amoy mula sa kusina ni $name1.', 'pasukdol'], ['*Gulat na gulat+ si $name1 sa balita ni $name2.', 'pasukdol'], ['*Kay guwapo+ pala ng panganay ni Gng. Lopez!', 'pasukdol'], ['*Ang ganda-ganda+ ng mga parol sa tindahang iyon!', 'pasukdol'], ['Si Lola Trining ang *pinakamatanda+ sa lahat.', 'pasukdol'], ['*Napakahirap+ ng pagsusulit natin sa Filipino.', 'pasukdol'], ['Ang karanasan ni $name1 ay *lubhang nakalulungkot+.', 'pasukdol'], ['*Kay bait-bait+ ng mga kasambahay ni Gng. Raymundo!', 'pasukdol'], ['Siya nga ang *pinakamatalino+ naming kamag-aral.', 'pasukdol']],
3 => [['Ang tahanan nina $name1 ay *malayo+ sa simbahan.', 'lantay'], ['Ang presyon ng dugo ni Ginoong Marquez ay *mababa+.', 'lantay'], ['Huwag kayong pupunta sa mga lugar na *mapanganib+.', 'lantay'], ['Ang mga alagang kabayo ni $name1 ay *malulusog+.', 'lantay'], ['Ang mga kalye sa tinitirhan ni $name1 ay *makipot+.', 'lantay'], ['*Malakas+ ang ihip ng hangin doon sa dalampasigan.', 'lantay'], ['Aba, *$adj1+ pala ang bagong kaibigan ni $name1.', 'lantay'], ['Ipinaalala sa akin ni $name1 na *$adj1+ si $name2.', 'lantay'], ['Ang larawan na gawa ni Kuya $name1 ay *makulay+.', 'lantay'], ['Hindi ba natin lilinisin ang *marumi+ nating silid?', 'lantay'], ['Lumipas ang *mahabang+ panahon bago sila nagkita.', 'lantay'], ['Si $name1 ang *mas $adj1b+ bata kaysa kay $name2.', 'pahambing'], ['*Magsintanda+ ang lolo ni $name1 at lolo ni $name2.', 'pahambing'], ['*Mas matangkad+ sa iyo ang kuya mo nang tatlong pulgada.', 'pahambing'], ['Ang kotse ni $name1 ay *mas mahal+ sa kotse ni $name2.', 'pahambing'], ['*Higit na mabalahibo+ ang asong Shih-tzu kaysa Doberman.', 'pahambing'], ['*Magsintanda+ ang mga kaibigan na sina $name1 at $name2.', 'pahambing'], ['Alin sa dalawang sasakyang ito ang *mas matulin+?', 'pahambing'], ['Ang bunsong anak ko ay *kasimbata+ ng panganay mo.', 'pahambing'], ['Ang boses ni $name1 ay *mas malakas+ sa boses ko.', 'pahambing'], ['Doon ka magbasa sa sala kung saan *mas maliwanag+.', 'pahambing'], ['Ang dalawa kong kompyuter ay *magsimbilis+ lamang.', 'pahambing'], ['Si $name1 na ata ang *pinaka$adj1b+ tao sa $placeb iyon.', 'pasukdol'], ['Sa kanilang magkakaklase, si $name1 ang *pinaka$adj1+.', 'pasukdol'], ['*Ang galing-galing+ ng mga mananayaw na napanood namin!', 'pasukdol'], ['Si $name1 ang *pinakamatangkad+ na anak ni Gng. Rosario.', 'pasukdol'], ['Ang mga ito na ang *pinakamagagarang+ damit ni $name1.', 'pasukdol'], ['Sa lahat ng manlalaro, *pinakamatangkad+ si $name1.', 'pasukdol'], ['Sino ang nakakuha ng *pinakamaraming+ tamang sagot?', 'pasukdol'], ['*Napakasaya+ talaga ng mga pagdiriwang tuwing Pasko.', 'pasukdol'], ['Iyan ang *pinakamataas+ na gusali sa Lungsod ng Makati.', 'pasukdol'], ['*Tamad na tamad+ ang lalaking istambay diyan sa tindahan.', 'pasukdol'], ['*Malinaw na malinaw+ ang leksiyon ni Gng. Soriano kahapon.', 'pasukdol'], ['Ang bulkang Mayon ang *pinakaaktibong+ bulkan sa Pilipinas.', 'pasukdol'], ['Si $name1 ang *pinakamagulong+ mag-aaral sa buong klase.', 'pasukdol'], ['Si $name1 ang *pinakamagaling+ na kamag-aral natin.', 'pasukdol']],
4 => [['Si $name1 ang piliin natin dahil *malakas+ ang boses niya.', 'lantay'], ['*Mapayapa+ na ang buhay ng mag-anak sa bago nilang tahanan.', 'lantay'], ['*Mahigpit+ ang pagpapasunod sa mga alituntunin ng paaralan.', 'lantay'], ['Ang sabi nila ay *masigla+ ang pagdiriwang ninyo kagabi.', 'lantay'], ['Dagdagan mo pa ng asukal ang kape mo dahil ito ay *matabang+.', 'lantay'], ['Ngayon ko napatunayang *$adj1+ nga ang bagong kalihim nina $name1.', 'lantay'], ['Mahilig ka ba talagang manood ng mga *nakakatawang+ pelikula?', 'lantay'], ['Bakit *baluktot+ ang ginagamit mong panungkit ng mga santol?', 'lantay'], ['*Bihasa+ sa pagkakaliskis ng bangus ang pamangkin kong si $name1.', 'lantay'], ['Naniniwala ka bang *mas $adj1+ si $name1 kaysa kay $name2?', 'pahambing'], ['Ikaw pala ang nagsabing *mas $adj1+ si $name1 kaysa kay $name2.', 'pahambing'], ['Si $name1 ay *kasinghusay+ ni $name2 sa paglalaro ng basketbol.', 'pahambing'], ['*Higit na malayo+ ang bayan ng San Andres kaysa Sto. Tomas.', 'pahambing'], ['Pareho tayong ipinanganak noong 2003 kaya tayo ay *magkasinggulang+.', 'pahambing'], ['Ang hardin ni Gng. Marquez ay *mas malawak+ pa sa hardin ng plaza.', 'pahambing'], ['*Mas mabilis+ kumilos sa kanilang kusina si $name1 kaysa kay $name2.', 'pahambing'], ['Ang pila sa pelikulang iyon ay *mas mahaba+ kaysa sa pilang ito.', 'pahambing'], ['Alam mo ba kung ang kabayo ay *kasimbilis+ ng isang sebra?', 'pahambing'], ['*Ubod ng hirap+ ng trabaho ng mga manggagawa sa pabrikang ito.', 'pasukdol'], ['Si $name1 ang *pinakamatalinong+ mag-aaral sa klase nina $name2.', 'pasukdol'], ['Ang kalahok na mananalo sa paligsahang ito ay *napakasuwerte+.', 'pasukdol'], ['Si $name1 ang *pinakaabala+ sa amin tuwing malapit na ang Pasko.', 'pasukdol'], ['Pinipili ni $name1 ang *pinakasariwang+ manok sa buong palengke.', 'pasukdol'], ['Ang pakiramdam niya ay siya ang *pinakamayamang+ tao sa mundo.', 'pasukdol'], ['*Masakit na masakit+ na raw ang tiyan ni $name1 kaya siya napaiyak.', 'pasukdol'], ['Si G. Romulo ang *pinakamahusay+ na manunulat sa buong unibersidad.', 'pasukdol'], ['*Napakaganda+ ng mga palamuti sa mga bahay tuwing Pista ng Pahiyas.', 'pasukdol'], ['Ang Ilog Nile ba ang *pinakamahabang+ anyong tubig sa buong mundo?', 'pasukdol']],
5 => [['Hindi pa tayo maaaring magsimula dahil hindi pa *buo+ ang ating pangkat.', 'lantay'], ['Huwag kang magugulat kung sasabihin sa iyo ni $name1 na *$adj1+ si $name2.', 'lantay'], ['Ayon sa PAGASA, *malakas+ ang bagyong tatama sa kanlurang bahagi ng Luzon.', 'lantay'], ['Hindi ka pa rin ba naniniwalang *$adj1+ ang dayuhang kapitbahay nina $name1?', 'lantay'], ['Ang balita namin ay hindi makapaniwala si $name1 na talagang *$adj1+ si $name2.', 'lantay'], ['*Magandang+ asal ang paggamit ng \'po\' at \'opo\' sa pakikipag-usap sa mga matatanda.', 'lantay'], ['Mabuti at *palangiti+ naman pala ang nakatatandang kapatid ng ating amo.', 'lantay'], ['Bumili si Tatay ng kompyuter na *mas makabago+ kaysa sa kompyuter nating ito.', 'pahambing'], ['Talagang hindi ako makapaniwalang *mas $adj1+ si $name1 kaysa kay $name2.', 'pahambing'], ['Ang pangkat ni $name1 ay *mas maayos+ magtrabaho kaysa sa pangkat ni $name2.', 'pahambing'], ['*Magsinlaki+ sina $name1 at $name2 kaya kasya kay $name1 ang mga damit ni $name2.', 'pahambing'], ['Naniniwala ka bang *magsimbilis+ lamang sa pagtakbo sina $name1 at $name2?', 'pahambing'], ['Hindi ba\'t *mas kahanga-hanga+ ang kanyang ginawa kaysa sa kanilang proyekto?', 'pahambing'], ['Bumili si $name1 ng produktong iyon upang magkaroon ng *mas makinis+ na kutis.', 'pahambing'], ['Ang bahay ni $name1 ay *higit na malayo+ kaysa sa pinuntahan mong kapilya.', 'pahambing'], ['*Napakarami+ na ng mga mamimili sa Divisoria dahil palapit na ang Pasko.', 'pasukdol'], ['Sige na nga, si $name1 na ang *pinaka$adj1b+ mag-aaral sa inyong pamantasan.', 'pasukdol'], ['Walang gustong makipagkaibigan sa kanya dahil *ubod ng sama+ ang kanyang ugali.', 'pasukdol'], ['Ang Bundok Everest sa Nepal ba ang *pinakamataas+ na anyong lupa sa buong mundo?', 'pasukdol'], ['Lumipas muna ang *napakatagal+ na panahon bago sumang-ayon sa plano ang pinuno.', 'pasukdol'], ['Ayon sa mga guro, si $name1 ang *pinaka$adj1b+ estudyante sa $placeb iyon.', 'pasukdol'], ['Para sa akin, *malinaw na malinaw+ kung sino ang dapat na nanalo sa boksing kagabi.', 'pasukdol'], ['*Napakasuwerte+ naman niya kung siya ulit ang mananalo sa laro mamayang hapon.', 'pasukdol'], ['Si $name1 ay *saksakan ng galing+ sa agham kaya siya ang pipiliin kong kakampi.', 'pasukdol']],
6 => [['Hindi ako papayag na isuot ang *sinaunang+ barong Tagalog na iyan dahil hindi iyan bagay sa akin.', 'lantay'], ['Iniwasan ng mga katrabaho ni $name1 ang *mapanuring+ imbestigador na dumalaw sa opisina nila kanina.', 'lantay'], ['Dahil si $name1 ay isang *masigasig+ na manggagawa, unti-unti na niyang napapahanga ang kanyang mga kaopisina.', 'lantay'], ['Napapansin kong *malikhain+ si $name1 kaya nais ko siyang isali sa gaganaping patimpalak sa pagpinta.', 'lantay'], ['Lumikas na sa isang *ligtas+ na lugar ang mga pamilyang maaaring mapinsala ng parating na bagyo.', 'lantay'], ['Si $name1 ay *pihikan+ pagdating sa pagkain kaya hindi namin siya napilit tumikim ng alupihang dagat.', 'lantay'], ['Ang pagiging *suwail+ na anak ni $name1 ay masama at hindi dapat tularan ng mga kabataan dito.', 'lantay'], ['Ang mga gulay at prutas sa tindahan ko ay *mas sariwa+ kaysa sa mga tinda sa palengke.', 'pahambing'], ['Ang pagdiriwang natin ngayong taon ay *higit na masigla+ kaysa sa pagdiriwang natin noong nakaraang taon.', 'pahambing'], ['Maaari mo bang ipaliwanag kung paano mo nasabing *mas $adj1+ si $name1 kaysa kay $name2?', 'pahambing'], ['Hanggang ngayon ba naman ay nagtatalo pa kayo kung sino kina $name1 at $name2 ang *mas $adj1+?', 'pahambing'], ['Matatanggap kaya ni $name1 kung maririnig niyang *mas $adj1+ si $name2 kaysa sa kanya?', 'pahambing'], ['*Higit na maningning+ ang mga dekorasyon ng bahay ni $name1 kaysa sa mga dekorasyong inilagay namin.', 'pahambing'], ['Dalawang beses kada taon nagagaganap ang pangyayari kung saan nagiging *magsinghaba+ ang araw at gabi.', 'pahambing'], ['Sa tingin ko ay *higit na malayo+ ang mararating ni $name1 kaysa kay $name2 sa larangan ng sining.', 'pahambing'], ['Nakita ng mga taumbayan kung bakit si $name1 ang itinuturing na *pinaka$adj1b+ mamamayan sa $placeb iyon.', 'pasukdol'], ['Napaiyak ako sa pelikulang pinanood namin kagabi dahil *napakalungkot+ ng huling eksena nito.', 'pasukdol'], ['Ang lungsod ng Tokyo ay itinuturing na isa sa mga *pinakamalalaking+ lungsod sa buong mundo.', 'pasukdol'], ['Ang bahay ni Gng. Reyes ang may *pinakamagarang+ dekorasyon sa buong subdibisyon tuwing Pasko.', 'pasukdol'], ['Ang nakaraang kabanata ng pinanonood kong palabas sa telebisyon ay *ubod ng ganda+ kaya pinag-uusapan ito ngayon.', 'pasukdol'], ['Sa paaralang iyon mo matatagpuan ang mga *pinakamagagalang+ na mag-aaral ng lungsod kaya doon natin ilunsad ang ating programa.', 'pasukdol'], ['Si $name1 ay *saksakan ng duwag+ kaya lagi namin siyang tinatakot tuwing mapapadaan kami sa sementeryo.', 'pasukdol']]];
$people = [['mabait', 'mahusay', 'masipag', 'matalino', 'matapang', 'matipid', 'mayaman', 'tahimik'], ['mabait', 'magalang', 'magaling', 'mahusay', 'mapagkaibigan', 'masayahin', 'masipag', 'masuwerte', 'matalino', 'matangkad', 'matapang', 'matipid', 'matulungin', 'mautak', 'mayaman', 'nakakatawa', 'tahimik']];
$objects = [['madulas', 'mahaba', 'mainit', 'makinis', 'malaki', 'malambot', 'malamig', 'maliit', 'matigas', 'matulis'], ['mababaw', 'madulas', 'mahaba', 'mainit', 'magaspang', 'malabo', 'malaki', 'malalim', 'malambot', 'malamig', 'maliit', 'malinaw', 'makinis', 'makintab', 'mataas', 'matigas', 'matingkad']];
$names = [['Adam', 'Alex', 'Angel', 'Ben', 'Carlos', 'Chris', 'Danilo', 'David', 'Diego', 'Ian', 'Isaac', 'Jack', 'Jason', 'Jose', 'Jimmy', 'Juan', 'Jose', 'Kevin', 'Lucas', 'Luis', 'Max', 'Nick', 'Robert', 'Sam', 'Tomas', 'Willie', 'Alice', 'Amy', 'Anna', 'Bella', 'Beth', 'Carol', 'Elisa', 'Emma', 'Eva', 'Grace', 'Joy', 'Julia', 'Kathy', 'Leah', 'Lina', 'Lydia', 'Maria', 'Mely', 'Mia', 'Naty', 'Sarah', 'Sofia', 'Tina', 'Vicky'], ['Adam', 'Adrian', 'Alex', 'Alexander', 'Andrew', 'Angelo', 'Benjamin', 'Brandon', 'Caleb', 'Cameron', 'Carlos', 'Carson', 'Carter', 'Charles', 'Christopher', 'Daniel', 'David', 'Diego', 'Dominic', 'Dylan', 'Elijah', 'Ethan', 'Gabriel', 'Hayden', 'Ian', 'Isaac', 'Isaiah', 'Jack', 'Jacob', 'Jaden', 'James', 'Jason', 'Jose', 'John', 'Jonathan', 'Joseph', 'Joshua', 'Juan', 'Julian', 'Justin', 'Kevin', 'Logan', 'Lucas', 'Luis', 'Luke', 'Matthew', 'Max', 'Michael', 'Nathan', 'Nicholas', 'Noah', 'Oliver', 'Owen', 'Parker', 'Robert', 'Ryan', 'Samuel', 'Sebastian', 'Thomas', 'Tristan', 'William', 'Alexandra', 'Alyssa', 'Amelia', 'Andrea', 'Anna', 'Ariana', 'Arianna', 'Bella', 'Brooke', 'Camille', 'Caroline', 'Chloe', 'Claire', 'Elizabeth', 'Emma', 'Eva', 'Evelyn', 'Gabriela', 'Grace', 'Hannah', 'Isabella', 'Jasmine', 'Jocelyn', 'Jolina', 'Julia', 'Katherine', 'Kylie', 'Lauren', 'Layla', 'Leah', 'Lillian', 'Lydia', 'Madeline', 'Maria', 'Mariah', 'Melanie', 'Mia', 'Naomi', 'Natalie', 'Olivia', 'Samantha', 'Sarah', 'Sofia', 'Stella', 'Tina', 'Victoria']];
$places = ['barangay', 'baryo', 'bayan', 'komunidad', 'palengke', 'probinsya', 'rehiyon', 'siyudad'];
$tier = pua_tier($lvl, $grd);
function pua_link(string $word): string {
    $last = substr($word, -1);
    return $word . (strpos('aeiou', $last) !== false ? 'ng' : ($last === 'n' ? 'g' : ' na'));
}
function pua_question(array $entry, int $tier, string $lvl, array $people, array $objects, array $names, array $places): array {
    $group = $tier <= 3 ? 0 : 1;
    $a = $people[$group][array_rand($people[$group])];
    $b = $objects[$group][array_rand($objects[$group])];
    $ns = array_values(array_unique($names[$tier === 6 ? 1 : 0]));
    shuffle($ns);
    $place = $places[array_rand($places)];
    $sentence = strtr($entry[0], ['$name1'=>$ns[0], '$name2'=>$ns[1], '$adj1b'=>pua_link($a), '$adj2b'=>pua_link($b), '$adj1'=>$a, '$adj2'=>$b, '$placeb'=>pua_link($place)]);
    if (!preg_match('/^(.*?)\*(.*?)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
    $choices = ['lantay', 'pahambing', 'pasukdol'];
    return ['word'=>pua_h($m[1]).'<strong style="color:#CC0066;">'.pua_h($m[2]).'</strong>'.pua_h($m[3]), 'target'=>preg_replace('/ na$/', '', strtolower($m[2])), 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = pua_question($banks[$tier][$i], $tier, $lvl, $people, $objects, $names, $places);
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
            <?php echo $cur['word']; ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo pua_h(ucfirst($cur['correct'])); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang kaantasan ng pang-uring kulay pula sa pangungusap.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 3;
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
