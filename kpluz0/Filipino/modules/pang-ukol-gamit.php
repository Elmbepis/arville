<?php
// filipino/modules/pang-ukol-gamit.php
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
$moduleTitle = 'Paggamit ng Tamang Pang-ukol';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pug_tier(string $lvl, int $grd): int { return ($grd <= 3 ? 1 : ($grd <= 5 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? 2 : 0); }
function pug_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
1 => ['ni>Ang lapis ____ $name1 ay bago.+ng*sa', 'ni>Ang sapatos ____ $name1 ay luma.+ng*sa', 'ni>Ang aklat ____ $name1 ay napunit.+ng*sa', 'ni>Ang ulam ____ $name1 ay masarap.+ng*sa', 'ni>Ang tuta ____ $name1 ay mataba.+ng*sa', 'ni>Kulang ang pera ____ $name1.+ng*sa', 'ni>Nabasag ang baso ____ $name1.+ng*sa', 'ni>Nabasa ang damit ____ $name1.+ng*sa', 'ni>Kumain ang pusa ____ $name1.+ng*sa', 'ni>Nabali ang lapis ____ $name1.+ng*sa', 'ni>Ang palayaw ____ Jose Rizal ay Pepe.+ng*sa', 'ng>Ang kulay ____ pusa niya ay puti.+ni*sa', 'ng>Ang hugis ____ buwan ay bilog.+ni*sa', 'ng>Ang pinto ____ kuwarto ay kahoy.+ni*kay', 'ng>Ang gulong ____ kotse ay bilog.+ni*kay', 'ng>Ang paa ____ silya ay nabali.+ni*kay', 'ng>Nasira ang hawakan ____ balde.+ni*kay', 'ng>Napunit ang sobre ____ sulat.+ni*kay', 'ng>Nawala ang takip ____ bote.+ni*kay', 'ng>Tumilaok ang tandang ____ kapitbahay.+ni*kay', 'ng>Nahulog ang laman ____ pitaka.+ni*kay', 'ng>Pahihiramin ako ni $name1 ____ $item.+sa*nang', 'kay>Ibigay mo ____ $name1 ang kape.+ni*sa', 'kay>Lumapit ka na ba ____ $name1?+ni*sa', 'kay>Ako na lang ang kakausap ____ $name1.+ni*sa', 'sa>Si $name1 ay nagsulat ____ pisara.+kay*ni', 'sa>Si $name1 ay may binili ____ tindahan.+kay*ni', 'sa>Si $name1 ay namasyal ____ palaruan.+kay*ni', 'sa>Si $name1 ay naligo ____ ilog.+kay*ni', 'sa>Ang barya ay nahulog ____ sahig.+kay*ni', 'sa>Naniniwala si $name1 ____ multo.+kay*ni', 'sa>Nagpunta sila ____ bukid.+kay*ni', 'sa>Kumanta si $name1 ____ programa.+kay*ni', 'sa>Sumayaw si $name1 ____ entablado.+kay*ni', 'sa>Lumipat ____ Maynila si $name1.+kay*ni'],
2 => ['ayon kay>____ $name1, si $name2 ay nakakatawa.+hinggil kay*tungkol kay', 'ayon sa>____ kanya, malapit nang dumating ang tag-ulan.+hinggil sa*tungkol sa', 'labag sa>____ batas ang pagtatapon ng basura sa ilog.+para sa*tungkol sa', 'kay>Humingi na tayo ng tulong ____ $girl mamayang hapon.+ng*sa', 'kay>Sasabihin ko agad ____ $girl ang iyong kahilingan.+ni*sa', 'kina>Dapat mong ipaliwanag ang iyong panig ____ $name1 at $name2.+kay*sa', 'labag sa>Ang pag-alis mo nang walang paalam ay ____ utos niya.+para sa*ayon sa', 'labag sa>____ utos namin ang paglalaro ninyo sa baha.+para sa*ayon sa', 'hinggil sa>____ mga bagong alituntunin ang ating pag-uusapan.+ayon sa*mula sa', 'mula kay>Nakabili si $name1 ng $item ____ $name2 kanina.+mula sa*tungkol kay', 'mula kay>____ $name1 ang mamahaling regalong ito.+ayon kay*tungkol kay', 'mula sa>Ang mga natanggap mong bayabas ay ____ kanya.+ayon sa*mula kay', 'ng>Bibili si $name1 ____ $item mula kay $name2 sa $araw.+sa*nang', 'ng>Si Jose Rizal ang pambansang bayani ____ Pilipinas.+nina*ni', 'ng>Ipaghanda mo ____ makakain ang ating mga panauhin.+sa*para', 'ni>Pinabantayan ____ $name1 kay $name2 ang kanyang bisikleta.+ng*sa', 'ni>Sinamahan ____ $name1 si $name2 sa palengke nang bumili ito ng ulam.+ng*kay', 'ni>Inalagaang mabuti ____ $name1 ang mga sisiw na iniregalo sa kanya.+ng*kay', 'nina>Mas mabuti na sundin ko ang payo ____ Tatay at Nanay.+kina*ni', 'nina>Pinahiram ako ng payong  ____ $name1 at $name2 nang umulan kanina.+kina*ni', 'para sa>Ang pagsisikap ni $name1 ay ____ kanyang anak.+ayon sa*tungkol sa', 'para sa>May mga baterya ba tayo ____ radyong ito?+ayon sa*tungkol sa', 'para kay>Nagtira ako ng ulam at kanin ____ $name1.+para sa*ukol kay', 'sa>Mamasyal tayo ____ palaisdaan para malibang tayo.+kay*ng', 'sa>Ililipat pala ____ kabilang barangay ang ating palengke.+kay*ng', 'tungkol sa>____ mga halaman ang aklat na ito.+mula sa*ayon sa', 'tungkol sa>____ paglikas nila ang balitang ito.+mula sa*ayon sa'],
3 => ['alinsunod sa>Ang ating pagtulong doon ay ____ tagubilin ng ating pastor.+mula sa*ayon kina', 'ayon kay>____ $name1, magdadala si $name2 ng mga $item sa $araw.+hinggil kay*tungkol kay', 'ayon kay>____ $name1, hindi pa umuuwi mula sa paaralan si $name2.+ukol kay*hinggil kay', 'ayon kay>Napulot lang daw ni $name1 ang $item na yan ____ $name2.+hinggil kay*tungkol kay', 'ayon sa>____ Pangulo, agad na ipatutupad ang bagong batas.+labag sa*tungkol sa', 'ayon sa>Baka \'supertyphoon\' daw ito, ____ kapitbahay natin.+tungkol sa*para sa', 'ayon sa>____ balita, isang tren ng MRT ang tumirik na naman.+laban sa*tungkol sa', 'hinggil sa>Ang pulong na ito ay ____ mga suliranin ng ating barangay.+ayon sa*mula sa', 'kay>Dahil sa ginawa mong iyon, dapat ka talagang mahiyang magpakita ____ $girl.+ni*sa', 'kina>Matutulog sina $name1 at $name2 ____ Lolo at Lola mamayang gabi.+nina*kay', 'laban sa>Ang protestang ito ay ____ pagtataas ng mga buwis.+ayon sa*alinsunod sa', 'mula kay>Ang mga mansanas na natanggap mo kagabi ay ____ $name1.+ayon kay*mula sa', 'mula sa>Malayo ang luma nating simbahan ____ bahay ni $name1.+ayon sa*ukol sa', 'nina>Saan natin itatago ang proyekto ____ $name1 at $name2?+para sa*ayon kay', 'para sa>Ang mga tuntunin ng paaralan ay ____ ikabubuti ng mga mag-aaral.+laban sa*mula sa', 'para sa>____ mga mangingisda ang babalang narinig natin.+tungkol sa*ayon sa', 'para kay>Ang mga sariwang prutas ay ____ lola Nadya.+ayon kay*labag kay', 'para kina>Ang mga kapote at payong ay ____ $name1 at $name2.+para sa*ayon kina', 'para sa>Handa na ba ang mga gamit ninyo ____ camping bukas?+ayon sa*para kina', 'sa>Si Jose Rizal ay ipinanganak ____ Calamba, Laguna noong Hunyo 19, 1861.+ni*ng', 'tungkol sa>____ pagbabago ng klima ang pinag-usapan nila.+mula sa*ayon sa', 'tungkol sa>May balita ka ba ____ parating na bagyo?+ayon sa*para sa', 'tungkol kay>Ang aralin natin ngayon ay ____ Jose Rizal.+para kay*ayon kay', 'tungkol kay>____ $name1 ba ang pinag-uusapan ninyo kanina?+ayon kay*laban sa', 'tungkol sa>May balita na ba ____ pagtaas ng presyo ng gasolina?+ayon sa*sa mga'],
4 => ['alinsunod sa>Ang pamamahagi ng tulong sa mga nasalanta ay ____ mga turo ng ating simbahan.+labag sa*hinggil sa', 'ayon kay>____ Tatay, mas mabuting hintayin muna nating lumipas ang bagyo.+tungkol kay*hinggil kay', 'ayon kay>____ $name1, pinag-aaralan nila ngayon ang pagbabago ng klima ng mundo.+tungkol kay*para kay', 'ayon sa>____ ulat na ito, nakataas na ang babala bilang 3 sa Rehiyong Bicol.+para sa*tungkol sa', 'ayon sa>____ pahayagang ito, hindi pa napipili ang bagong Santo Papa ng Vatican.+ukol sa*hinggil sa', 'batay sa>____ ulat ng PAGASA, dadaan ang mata ng bagyo rito sa atin mamayang tanghali.+ukol sa*dahil sa', 'batay sa>____ babala ng mga pulis, dapat nating iwasan ang lansangang ito.+ukol sa*para sa', 'hinggil sa>____ panukalang maglagay ng mga poste ng ilaw sa mga kalye ang pag-uusapan mamaya.+ayon sa*mula sa', 'kay>Ang pagtatanggol mo ____ $girl kanina sa palengke ay tatanawin niyang utang na loob.+ni*sa', 'kina>Nakarating na pala ____ $name1 at $girl ang balitang lumindol sa kanilang lalawigan.+ni*sa', 'labag sa>____ ordinansa ng lungsod ang manigarilyo sa mga lugar na pampubliko.+alinsunod sa*hinggil sa', 'laban sa>Nagsampa na ba ng kaso ang biktima ____ mga nahuling magnanakaw kahapon?+ayon sa*tungkol sa', 'mula kay>Nagtataka ka pa rin ba kung bakit nakatanggap ka ng mga kendi ____ $name1?+ayon kay*mula sa', 'mula sa>____ kanilang bukirin sa Guimaras ang mga natanggap nating matatamis na mangga kanina.+ayon sa*tungkol sa', 'ni>Agad na ibinunyag ____ $name1 ang kanyang natuklasang lihim ukol sa samahang itinatag ni $name2.+ng*kay', 'nina>Siya ang pampitong anak ____ Francisco Mercado Rizal at Teodora Alonzo y Quintos.+kina*sa mga', 'nina>Lubhang ikinabahala ____ $name1 at $name2 ang nabalitaan nilang nakawan sa kanilang lugar.+kina*sa mga', 'para kay>Ang puting kartolina ay binili ko ____ $name1 dahil may proyekto siya.+ayon kay*tungkol kay', 'para sa>Ang ating mga bayani ay nagbuwis ng buhay ____ kalayaan ng ating bayan.+tungkol sa*mula sa', 'para sa mga>Ang mga aklat na ito ay ilalaan natin ____ mag-aaral ni Bb. Salvador.+para kina*tungkol sa mga', 'sa>Ang Intramuros ay isang makasaysayang pook na matatagpuan ____ lungsod ng Maynila.+ng*ni', 'sa akala mo>Ano ____ ang nangyari sa nawawalang aso nina Aling Rosa?+hinggil sa iyo*laban sa iyo', 'tungkol kay>Ang pangunahing balita sa radyo at telebisyon ngayon ay ____ $name1.+tungkol sa*para kay', 'tungkol sa>May mahalaga akong sasabihin sa iyo ____ mga hakbang na gagawin ni $name1 bukas.+ayon sa*labag sa', 'tungo sa>Ang pagsisikap ni $name1 sa pag-aaral ay ____ ikagiginhawa ng buhay nila.+laban sa*mula sa', 'ukol sa>Ang aralin natin sa araw na ito ay ____ mga karapatan ng batang Pilipino.+mula sa*para sa'],
5 => ['alinsunod sa>____ kasunduang pangkapayapaan ng pamahalaan at mga rebelde, sisimulan na ang tigil-putukan.+labag sa*tungkol sa', 'ayon sa>____ mga alagad ng batas, malapit na nilang matunton ang pinagtataguang kuta ng mga salarin.+ukol sa*hinggil sa', 'kay>Ang dahilan ng mapagmalabis na pakikitungo ng ating amo ____ $girl ay hindi ko pa rin talaga maunawaan.+ni*sa', 'kay>Kung hindi ka tututol, ako na lamang ang magbabanggit ____ $name1 na mayroon siyang utang na dapat bayaran sa atin.+ni*sa', 'kina>Hindi mo ba napagtantong ____ $name1 at $name2 ko lamang nakuha ang ideyang isanla muna ang ating lupain sa bangko?+kay*sa', 'labag sa>Ang pagtatapon ng basura sa ilog ay ____ patakarang pangkapaligiran ng ating pamayanan.+alinsunod sa*ayon sa', 'labag sa>____ kagustuhan ng mahal na hari ang pakikipagkaibigan mo sa kanyang mga mahigpit na kaaway.+alinsunod sa*hinggil sa', 'laban sa, ng>Ang programang ito ay bahagi ng kampanya ____ pagdadala ____ bawal na armas.+para sa, nang*mula sa, ng', 'mula sa>____ dayuhang manliligaw ni Karla ang natanggap niyang kahon ng iba\'t ibang tsokolate kagabi.+ayon sa*tungkol sa', 'mula kina>Ang mga pagbating natanggap ng mga manlalarong nagkampeon sa basketbol ay ____ $name1 at $name2.+mula kay*mula sa', 'ni, nina>Dahil sa isang personal na kadahilanan, hindi pinaunlakan ____ $girl ang kahilingan ____ $name1 at $name2.+ni, kina*kay, nina', 'para sa>Nabili na ba ni $name1 ang mga sangkap na gagamitin ____ pagluluto natin ng kare-kare mamayang gabi?+ukol sa*mula sa', 'para sa>Ang nakalap na halaga ng aming pangkat ay ____ pagpapagamot ng di-pangkaraniwang karamdaman ni $name1.+ukol sa*ayon sa', 'sang-ayon sa>Ikaw ba ay ____ panukalang batas na itaas ang babayaran nating buwis kada taon?+para sa*tungkol sa', 'sang-ayon sa>Alam mo, hindi ako ____ plano nina Mr. Lopez na magtayo ng restoran sa parkeng ito.+hinggil sa*tungkol sa', 'tungkol kina>____ $name1 at $name2 ba ang mainitang pagtatalo ninyo sa iyong opisina kaninang tanghali?+ukol kay*ayon kina', 'tungo sa>Kailangan nating magtulungan upang maisulong natin ang mga hakbang ____ ikauunlad ng ating bansa.+laban sa*mula sa', 'ukol sa>Ang talakayang ginanap sa telebisyon kanina ay ____ hidwaang teritoryal sa pagitan ng Pilipinas at Tsina.+mula sa*para sa'],
6 => ['alinsunod sa>Ang paghihiwalay ng nabubulok at hindi nabubulok na basura ay ____ utos ng kapitan ng ating barangay.+tungkol sa*para sa', 'alinsunod sa>Ang unti-unting pagbabawas ng mga sasakyang tumatakbo sa gasolina ay ____ kasunduang pandaigdig para labanan ang pagbabago ng klima.+tungkol sa*hinggil sa', 'ayon sa>____ mga siyentipiko, malaking bahagdan na ang nawala sa yelong matatagpuan sa magkabilang polo ng Daigdig nang dahil sa pag-init ng mundo.+ukol sa*hinggil sa', 'ayon kay>____ $name1, nalugi siya ng malaking halaga nang umapaw ang kanyang palaisdaan dahil sa malakas na bagyong humagupit sa kanilang lalawigan.+ukol kay*hinggil kay', 'hinggil sa>____ pagtaas ng lebel ng tubig ng karagatan na dulot ng \'global warming\' ang tatalakayin ng ating tagapagsalita bukas.+alinsunod sa*mula sa', 'hinggil sa>Maaari ba tayong makagawa agad ng masusing pag-aaral ____ pagkasira ng biyodibersidad sa ating lalawigan?+alinsunod sa*para sa', 'kay, para sa>Huwag kang magdaramdam kung malalaman mong ____ $name1 nagmula ang planong ipatigil na ang iyong proyektong ____ pangangalaga ng ating ilog.+sa, para sa*kay, labag sa', 'laban sa, sa>Ang pagpapatupad ng sari-saring batas ____ ipinagbabawal na gamot ay may malaking epekto ____ pag-unlad ng ating bansa.+laban sa, ng*ayon sa, sa', 'ni, labag sa>Ang biglaang pangingibang-bansa ____ $girl upang humanap ng magandang kapalaran ay ____ kalooban ng kanyang mapagmahal na ama.+ni, mula sa*ng, labag sa', 'ni, nina>Agad na ipinaalam ____ $girl sa mga kinauukulan ang kinalaman ____ $name1 at $name2 sa malagim na pangyayari noong nakaraang linggo.+ni, kina*kay, nina', 'para sa, kay>Ang mungkahing magtayo ng isang sentrong pangkalusugan ____ mga mahihirap sa ating nayon ay nanggaling ____ $name1.+para sa, sa*hinggil sa, kay', 'para sa, ayon kay>Magkakaroon ngayong linggo ng libreng bakuna ____ mga sanggol ng barangay, ____ $name1.+para sa, hinggil kay*tungkol sa, ayon kay', 'Ayon sa, para sa>____ mga dalubhasa, kailangang maging handa ang lahat ____ posibleng pagdating ng isang malaking lindol anumang araw.+Hinggil sa, para sa*Ukol sa, mula sa', 'Ayon kay, mula sa>____ $name1, ang kanyang paghingi ng paumanhin at pang-unawa kay $girl ay ____ kaibuturan ng kanyang puso.+Ayon kay, para sa*Hinggil kay, mula sa', 'ukol sa>____ mga bagong sakit na naglipana sa mundo ngayon ang sinasaliksik ng pangkat nina $name1 habang sila ay nasa Amerika.+alinsunod sa*ayon sa', 'ukol sa, para sa>Ang mga pag-aaral na ginagawa ng mga siyentipiko ____ pagbabago ng klima ng mundo ay ____ kinabukasan ng mga susunod na henerasyon.+ukol sa, mula sa*para sa, ayon sa'],
];
$names = ['Adam', 'Adrian', 'Alex', 'Andrew', 'Angelo', 'Carlos', 'Carson', 'Chris', 'Daniel', 'David', 'Diego', 'Domeng', 'Elijah', 'Ethan', 'Gabriel', 'Hayden', 'Ian', 'Isaac', 'Isaiah', 'Jack', 'Jacob', 'James', 'Jason', 'Jose', 'John', 'Jonathan', 'Joseph', 'Joshua', 'Juan', 'Julian', 'Justin', 'Kevin', 'Lucas', 'Luis', 'Luke', 'Matthew', 'Max', 'Michael', 'Nathan', 'Noah', 'Oliver', 'Robert', 'Ryan', 'Samuel', 'Tristan', 'William', 'Alyssa', 'Amelia', 'Andrea', 'Anna', 'Bella', 'Chloe', 'Claire', 'Eliza', 'Emma', 'Eva', 'Evelyn', 'Gabriela', 'Grace', 'Hannah', 'Isabel', 'Jasmine', 'Jocelyn', 'Jolina', 'Julia', 'Kylie', 'Lauren', 'Layla', 'Leah', 'Lillian', 'Lydia', 'Maria', 'Melanie', 'Mia', 'Naomi', 'Olivia', 'Sarah', 'Sophia', 'Stella', 'Tina', 'Victoria'];
$girls = ['Annie', 'Betty', 'Caring', 'Elisa', 'Emma', 'Eva', 'Evelyn', 'Grace', 'Josie', 'Julie', 'Katring', 'Laura', 'Lydia', 'Maring', 'Olive', 'Tina', 'Toyang'];
$araws = ['Lunes', 'Martes', 'Miyerkules', 'Huwebes', 'Biyernes', 'Sabado', 'Linggo'];
$items0[1] = ['aklat', 'baso', 'lapis', 'tasa'];
$items0[2] = ['kaldero', 'kawali', 'kulambo', 'martilyo', 'palanggana', 'pamaypay', 'payong', 'platito'];
$tier = pug_tier($lvl, $grd);
function pug_question(string $raw, int $tier, string $lvl, array $names, array $items0, array $girls, array $araws): array {
    [$correct, $word, $a, $b] = preg_split('/[>+*]/', $raw);
    $ns = array_values(array_unique($names)); shuffle($ns);
    $items = $items0[$tier <= 3 ? 1 : 2];
    $word = strtr($word, ['$name1'=>$ns[0], '$name2'=>$ns[1], '$name3'=>$ns[2], '$item'=>$items[array_rand($items)], '$girl'=>$girls[array_rand($girls)], '$araw'=>$araws[array_rand($araws)]]);
    $wrong = [$a, $b]; shuffle($wrong);
    $choices = array_merge([$correct], $wrong); shuffle($choices);
    return ['word'=>$word, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
function pug_completed(array $cur): string {
    $parts = explode('____', $cur['word']);
    $answers = array_map('trim', explode(',', $cur['correct']));
    $out = pug_h($parts[0]);
    foreach ($answers as $i => $answer) {
        if ($i === 0 && $parts[0] === '') $answer = ucfirst($answer);
        $out .= '<strong style="color:#CC0066;">'.pug_h($answer).'</strong>'.pug_h($parts[$i+1]);
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
    $_SESSION[$sessionKey]['current'] = pug_question($banks[$tier][$i], $tier, $lvl, $names, $items0, $girls, $araws);
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
            <?php echo pug_completed($cur); ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo pug_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo pug_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang <?php echo strpos($cur['correct'], ",") !== false ? "mga " : ""; ?>tamang pang-ukol para mabuo ang pangungusap sa itaas.</p>
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
