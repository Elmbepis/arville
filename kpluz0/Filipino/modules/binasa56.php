<?php
// filipino/modules/binasa56.php
// Reading comprehension: three original legacy passages.

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
$moduleTitle = 'Pag-unawa sa Binasa';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
function b56_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$stories = [
    ['Ang Pinakamabangis na Hayop sa Gubat', 'wikakids.com/filipino/maikling-kwento/', 'Noong bata pa ang panahon at di pa dumaraong sa ating dalampasigan ang mga Kastila, may isang makapangyarihang sultang namuno sa pinakamalaking kaharian sa Lu-sung. Siya ay kinatatakutan ng kanyang mga sakop dahil sa kanyang kalupitan at kaimbihan sa kanyang mga kawal. Siya si Raha Sibasib.<br/><br/>Kung gaano kabuhong ang raha ay gayon naman ang ganda ng anak nitong prinsesa. Bukod sa gandang panlabas ay maganda rin ang ugali. Siya ay si Prinsesa Liwayway. Maraming mga prinsipe, datu, at sultan mula sa iba\'t ibang kaharian ang nagsasadya sa kanyang ama upang hingin ang kanyang kamay.<br/><br/>Noon, si Prinsesa Liwayway ay hindi na malaya sapagka\'t ang kanyang puso ay nakatali na sa pangangalaga ng isang mangangaso, si Matapang. Siya ay dalita. Ang kanyang tirahan ay isang maliit na dampa sa paanan ng bundok. Siya ay dalubhasa sa paggamit ng pana at busog. Kahit ibong lumilipad sa pawiwirin ay kanyang napatatamaan ng pana sa isang binit lamang.<br/><br/>Sapagka\'t si Matapang ay isa lamang alipin, hindi siya makatuntong sa loob ng palasyo. Ang magkasintahan ay panakaw na nagtatagpo sa mga liblib na pook. Oras na malaman ng Sultan ang kanilang pag-iibigan, iya\'y nangangahulugan ng pagtagpas sa ulo ng binata.<br/><br/>Ang napili ng Sultan upang pakasalan ni Prinsesa Liwayway ay anak ni Sultan Mataas na ang kaharian ay karatig ng kay Sibasib. Hindi nakursunadahan ni Liwayway ang lalaki pagka\'t lagpas na sa gulang at pangit. Hindi napagbago ang pagtatangi ni Liwayway kay Matapang bagaman ang binata\'y kinasusuklaman ng ama.<br/><br/>Nang ang magkasintahan ay nagtagpo sa pugad ng aliw, sila\'y namataan ng tagasubaybay ng Sultan. Isinumbong nito sa Sultan ang nakita upang siya\'y mapuri sa kanyang paglilingkod. Nang malaman ito ni Sultan Sibasib ay ipinatawag niya ang Prinsesa.<br/><br/>"Tunay nga bang kinakatagpo mo si Matapang, ang dukhang mangangaso ng kabundukan?" tanong ng ama.<br/><br/>"Opo, amang Sultan," sagot ni Liwayway. "Kami po\'y nag-iibigan."<br/><br/>Walang pagsidlan ng galit ang Sultan. "Wala kang turing!" ang sigaw. "Ikaw ay Prinsesa, isang dugong mahal at anak ng pinakamakapangyarihang Sultan. Ipagkakaloob mo ba ang iyong pagmamahal sa isang alipin? Hindi ba sinabi ko sa iyo na ikaw ay akin nang naipagkasundo sa anak ni Raha Mataas? Ikaw ay ipakakasal ko sa kanya sa darating na kabilugan ng buwan!"<br/><br/>"Subalit Ama ko," ang daing ng Prinsesa. "Ang anak ni Raha Mataas ay napakatanda para sa akin. Siya\'y para ko nang ama! Siya\'y hindi ko iniibig!"<br/><br/>"Magtigil ka, Liwayway. Hindi mo na muli pang makikita ang lalaking iyan," at dagling ipinatawag ng Sultan si Atungal, ang pinakamabangis na kawal na tribo.<br/><br/>"Atungal," ang sigaw na pautos, "dalhin mo sa dampa ni Matapang ang iyong mga kawal. Iligpit mo ang binatang iyon. Patayin mo na parang aso! Ipakita mo sa akin ang kanyang ulo. Kayo\'y aking gagantimpalaan. Kung hindi madala rito ang kanyang ulo ang inyong mga ulo ang kapalit!"<br/><br/>Dumating sa kaalaman ni Liwayway ang kautusan. Palihim na pinuntahan ng Prinsesa si Matapang upang sagipin siya sa panganib.<br/><br/>Nang dumating doon ang Prinsesa si Matapang ay naghuhukay ng mga lamang-ugat sa tabi ng batis. May luhang isinalaysay ng dalaga sa binata ang napipintong panganib. Batid nilang dalawa kung ano ang kahahantungan ng babala.<br/><br/>"Mabuting ikaw ay umalis. Lisanin mo ang lugar na ito!" ang pakiusap ni Liwayway. "Magtago ka sa gubat. Maya maya\'y narito na si Atungal at ang kanyang mga kawal. Magmadali hangga\'t may panahon!" Subali\'t si Matapang ay ayaw umalis kahit anong gawing pag-ulok ng Prinsesa.<br/><br/>Samantalang hinihintay ang pagdating ni Atungal, ang ginawa ni Matapang ay dinukot ang singsing sa kanyang bulsa. Ang singsing na ito\'y ibinigay sa kanya ng isang matandang babaeng kanyang iniligtas sa makamandag na ahas sa kagubatan. Nang ipagkaloob ang singsing kay Matapang ang matanda ay nagtagubilin ng ganito:<br/><br/>"Para sa iyong pusong ginto at pagkamatulungin, ibinibigay ko ang singsing na ito. Iya\'y makatutulong sa iyo sa mga sandali ng pangangailangan. Ang Diyos ay mabuti sa mga taong may mabuting kalooban. Humingi ka ng anumang kagustuhan at iya\'y masusunod."<br/><br/>Nabatid ng binata na ang singsing ay mahiwaga. Ang liwanag na nagmumula rito ay kumikislap.<br/><br/>Tiningnan mabuti ni Matapang ang singsing. Naalala niya ang tagubilin ng matanda, "Humingi ka ng kahilingan at iya\'y ipagkakaloob."<br/><br/>Siya\'y napangiti at ang pag-aagam-agam niya\'y naparam. Siya\'y nagpalingalinga upang tiyakin ang pagdating ng mga kawal ng Sultan.<br/><br/>Dumating si Atungal kasama ang kanyang mga tauhan. Akiba\'t nila\'y mga busog at palaso. Namataan nila si Matapang na nangungubli sa likod ng puno.<br/><br/>"Iyon! Ang ulo ng traidor ay madaling tagpasin. Pihong tayo\'y nakasisisguro sa pabuya ni Sultan Sibasib!" sigaw ni Atungal. "Umabanti kayo, mga kawal!"<br/><br/>Nang Makita ni Matapang ang kanilang pagsulong, kanyang itinaas ang singsing at nanalangin, "O dakilang Bathala, ako po\'y iligtas mo. Ang hiling ko\'y si Atungal at ang kanyang mga kawal ay gawin mong pinakapangit na hayop sa gubat. Sana\'y ang kanilang mga sibat ay matanim sa kanilang mga bibig. Sila sana ay tugisin ng mga mangangaso katulad ng pagtugis nila sa akin sa mga sandaling ito."<br/><br/>Halos hindi pa natatapos ang panalangin ni Matapang, isang kata-takang pangyayari ang naganap. Niyanig ang lupa. Nalumbungan ang bundok ng maitim na ulap. Lumakas ang ihip ng hangin. Kumidlat nang matalim. Si Atungal at ang mga kawal ay sinakmal ng bagyo. Si Matapang ay hindi naano sa lilim ng punong pinangungublihan.<br/><br/>Nang tumigil ang bagyo, nakita ni Matapang sa lugar na kinlalagyan ni Atungal at ng kanyang mga kawal ang mababangis na hayop na may matalas na pangil!<br/><br/>Mula noon ang mga hayop na naglipana sa pusod ng gubat ay tinawag na baboy-ramo. Sila\'y tinutugis ng mga mangangaso. Sila\'y hinuhuli bilang aliwan at ang kanilang mga karne ay kinakain pagka\'t malinamnam.', [
        ['Ano ang paksa ng kuwento?', 'ang pinagmulan ng baboy-ramo', 'ang makapangyarihang singsing ni Matapang', 'ang pag-iibigan nina Liwayway at Matapang', 'ang pagkamalupit ni Sultan Sibasib'],
        ['Alin sa mga sumusunod ang maaaring ipalit na pamagat ng kuwento?', 'Ang Alamat ng Baboy-ramo', 'Ang Alamat ng mga Hayop sa Gubat', 'Ang Alamat ng Makapangyarihang Singsing', 'Ang Alamat ni Matapang'],
        ['Sino ang kinatatakutan ng kanyang mga sakop dahil sa kanyang kalupitan sa mga kawal?', 'si Raha Sibasib', 'si Raha Mataas', 'si Atungal', 'si Raha Matapang'],
        ['Paano inilarawan si Prinsesa Liwayway sa simula ng kuwento?', 'maganda ang anyo at kalooban', 'suwail na anak', 'mahaba ang buhok at masipag', 'tapat sa pag-ibig'],
        ['Bakit tutol magpakasal si Prinsesa Liwayway sa napiling lalaki ng kanyang ama?', 'matanda na ito', 'malupit ito', 'pangit ito', 'maralita ito'],
        ['Sino ang nagmamay-ari ng puso ni Prinsesa Liwayway?', 'si Matapang', 'si Sultan Sibasib', 'ang anak ni Sultan Mataas', 'si Atungal'],
        ['Ano ang kaantasan ni Matapang sa lipunan?', 'alipin', 'datu', 'sultan', 'kawal'],
        ['Sino ang napili ni Sultan Sibasib para ipakasal kay Prinsesa Liwayway?', 'ang anak ni Sultan Mataas', 'si Sultan Mataas', 'si Atungal', 'si Matapang'],
        ['Sino ang inatasan ni Raha Sibasib na pumatay kay Matapang at magdala ng ulo nito sa kanya?', 'si Atungal', 'si Sultan Mataas', 'mga kawal', 'ang anak ni Sultan Mataas'],
        ['Ano ang ginagawa ni Matapang nang datnan siya ni Prinsesa Liwayway sa kanyang pinagtataguan?', 'naghuhukay ng mga lamang-ugat', 'nagsisibak ng kahoy', 'nag-iigib ng tubig', 'namimitag ng usa'],
        ['Ano ang parusang ipapataw kay Matapang kung ito\'y mahuhuli ni Atungal?', 'tiyak na kamatayan', 'habambuhay na pagkakabilanggo', 'pagpapalayas sa kaharian', 'mabigat na pagmumulta'],
        ['Bakit biglang napawi ang pangangamba ni Matapang kahit parating na si Atungal at ang kanyang mga kawal?', 'naalala niya ang makapangyarihang singsing', 'naalala niyang mahusay siya sa paggamit ng pana', 'naramdaman niya ang wagas na pag-ibig ni Prinsesa Liwayway', 'nakaramdam siya ng kakaibang lakas'],
        ['Bakit binigyan si Matapang ng singsing ng isang matanda?', 'dahil sa kanyang pagkamatulungin', 'dahil sa kanyang kakisigan', 'dahil sa kanyang tapat na pag-ibig', 'dahil sa kanyang katapangan'],
        ['Ano ang kinahinatnan ni Atungal at ng kanyang mga kawal sa pagtatapos ng kuwento?', 'naging mga baboy-ramo sila sa gubat', 'naging mga puno sila sa bundok', 'nilunok silang lahat ng lupa', 'kinain sila ng mababangis na hayop'],
        ['Ano ang naranasan ni Matapang na hiniling niyang maranasan din ni Atungal at ng kanyang mga kawal?', 'ang tugisin ng ibang tao', 'ang makatagpo ng pag-ibig', 'ang maging mapagpatawad', 'ang maging dukha'],
    ], 'Wikakids'],
    ['Ang Aral ng Damo', 'wikakids.com/filipino/maikling-kwento/', 'Isang anghel na galing sa langit ang bumisita upang tiyakin kung tunay ngang ang lahat ng nilalang sa kagubatan ay nasisiyahan.<br/><br/>"G. Punongkahoy, ikaw ba\'y maligaya?" tanong ng anghel.<br/><br/>"Hindi," ang sagot sa tinig na walang sigla, "sapagkat ako\'y walang bulaklak."<br/><br/>Ang anghel ay nagpunta sa bulaklak upang magsiyasat. "Bb. Bulaklak, ikaw ba\'y maligaya sa iyong paligid?"<br/><br/>"Hindi ako maligaya sapagkat wala akong halimuyak. Masdan mo ang gardenia sa banda roon. Siya\'y umuugoy sa amihan. Ang kanyang bango na taboy ng hangin ay kahali-halina!"<br/><br/>Ang anghel ay nagpunta sa gardenia upang mabatid ang damdamin nito. "Ano ang masasabi mo sa iyong halimuyak?"<br/><br/>"Ako\'y hindi nasisiyahan. Wala akong bunga. Naiinggit ako sa saging! Iyon, siya\'y natatanaw ko. Ang kanyang mga piling ay hinog na!"<br/><br/>Ang anghel ay lumapit sa saging, nag magandang-araw at nagtanong, "G. Saging, kumusta? Ikaw ba\'y nasisiyahan sa iyong sarili?"<br/><br/>"Hindi. Ang aking katawan ay mahina, hindi matibay na tulad ng sa narra! Pag malakas ang hangin lalo\'t may bagyo, ako\'y nababali! Nais ko sanang matulad sa narra!"<br/><br/>Nagpunta ang anghel sa narra at nagtanong, "Anong palagay mo sa iyong matibay na puno?"<br/><br/>"Sa ganang akin, gusto ko pa ang isang damo! Ang kanyang mga dahon ay matutulis. Ang mga ito\'y nagsisilbing proteksiyon!" pakli ng narra.<br/><br/>Ang anghel ay nagpunta sa damo. "Kumusta ka ? Ano ang nanaisin mo para sa iyong sarili?"<br/><br/>"Masaya ako!" sagot ng damo. "Ayaw kong mamumulaklak o mamunga. Ayaw ko rin ng matibay na puno. Gusto ko\'y maging ako lamang ... hindi nananaghili kaninuman pagkat maligaya!"', [
        ['Ano ang paksa ng kuwento?', 'ang pagiging maligaya', 'ang kabutihan ng isang anghel', 'ang hiwaga sa kagubatan', 'pag-aaway ng mga nilalang'],
        ['Sino ang bumisita sa kagubatan upang tiyakin ang kasiyahan sa kagubatan?', 'isang anghel', 'isang diwata', 'isang matanda', 'isang diyosa'],
        ['Ano ang nais malaman ng anghel sa kanyang pagtatanong sa mga tauhan sa kuwento?', 'kung sila ay maligaya', 'kung sila ay magkakaaway', 'kung napangangalagaan nila ang kagubatan', 'kung sino ang pinakanaiinggit'],
        ['Sino sa mga tauhan sa kuwento ang nakapagkamit na ng tunay na kaligayahan?', 'ang damo', 'ang punongkahoy', 'ang gardenia', 'ang saging'],
        ['Ano ang karaniwang hinahangad ng isang tauhang hindi maligaya sa kuwento?', 'pisikal na katangiang wala sa kanya', 'talino o kasanayan', 'mga mamahaling ari-arian', 'kapangyarihan'],
        ['Ano ang aral na nais iparating ng kuwento?', 'huwag maiinggit upang lumigaya', 'magsumikap upang gumanda ang buhay', 'hangarin kung ano ang mayroon sa kapwa', 'maging ambisyoso sa buhay'],
        ['Aling katangian ang binibigyang-halaga ng kuwento?', 'pagiging kuntento', 'pagkakaroon ng matayog na pangarap', 'pagsisikap pagandahin ang buhay', 'pagpapahalaga sa anyong pisikal'],
        ['Ano ang napatunayan ng anghel sa kanyang pagbisita sa kagubatan?', 'karamihan doon ay hindi maligaya', 'mas maraming maligaya roon kaysa hindi', 'ang mga tagaroon ay hindi nagnanais lumigaya', 'mahirap ngunit maligaya ang mga tagaroon'],
    ], 'Wikakids'],
    ['Ang Mga Nawawalang Sapatos ni Kulas', 'philnews.ph/2018/11/26/maikling-kwento-nawawalang-sapatos-kulas/', 'Nasa katamtamang estado ng pamumuhay ang pamilya ng batang si Nicholas Cruz. Mas kilala siya sa Kalye Sampaguita bilang si Kulas, sampung taong gulang na anak nina Julio at Vina Cruz.<br/><br/>Nagtatrabaho sa isang pagawaan ng mga kasangkapan sa bahay ang ama ni Kulas samantalang kahera naman sa isang tindahan ang kanyang ina.<br/><br/>Isang araw, habang tinatali ni Vina ang sintas ng sapatos ng anak ay nagtaka ito.<br/><br/>"Nak, ba\'t ang lumang rubber shoes mo ang suot mo? Di ba binilhan ka namin ng papa mo ng bago?" tanong ng ina sa bata.<br/><br/>Hindi sumagot si Kulas at nagkataon naman na bumusina na ang sasakyan na maghahatid sa kanya sa paaralan. Humalik ito sa mama niya at dali-daling tumakbo palabas ng bahay.<br/><br/>"Leon, bilisan mo, nariyan na iyong school bus," sabi ni Kulas sa nakababatang kapatid habang tumatakbo siya palabas.<br/><br/>Natapos ang kalahating-araw ng klase at hinatid na pauwi sa kanilang bahay sina Kulas at Leon. Pagdating nila sa sala, nagulat ang panganay na may karton na naglalaman ng bagong sapatos.<br/><br/>"Ma, kanino po ‘tong rubber shoes?" tanong ni Kulas sa ina niya.<br/><br/>Ngumiti ang ina at sinabihan siyang sa kanya iyon. Bagong rubber shoes at mukhang mamahalin yung binili ng mama niya para sa kanya. Kinabukasan, sinuot niya ito papuntang paaralan dahil sakto naman na P.E. nila.<br/><br/>Pagkalipas ng isang linggo, nagulat si Vina noong sinumbatan sya ni Julio habang nag-aayos siya sa harap ng salamin at ang asawa naman ay nagbabasa ng dyaryo sa higaan nila.<br/><br/>"Akala ko ba binilhan mo ng bagong sapatos si Kulas kaya naubos ang sweldo mo. Bakit mukhang luma yata yung nabili mo," sabi ni Julio.<br/><br/>Nagulat si Vina sa sinabi ng asawa. Idiniin niya bumili talaga siya ng bago at mahal iyon kaya humiram pa siya ng pera sa may-ari ng tindahan.<br/><br/>Pagdating ng tanghalian, nakarating na ang mga bata. Tama si Julio at luma na ang sapatos na suot ni Kulas. Nagulat ang ina at tinanong ang anak.<br/><br/>"Nak, binilhan kita ng bagong sapatos, e, bakit luma pa rin iyang sinusuot mo?" tanong ni Vina sa anak.<br/><br/>Nagdahilan si Kulas na nakalimutan niya raw na may bago na pala siyang sapatos. Inutusan siya ng ina na kunin iyon at dalhin ito sa kanya. Ilang minuto na naghintay si Vina pero hindi bumalik si Kulas.<br/><br/>Pinuntahan niya ito sa kwarto at nadatnan niya palakad-lakad si Kulas at balisa. Tinanong ulit ni Vina ang anak tungkol sa sapatos niya. Pang-apat na pares ng sapatos na iyon na binili para sa kanya ngayong taon.<br/><br/>"Mama, patawad po. Binigay ko po sa kaibigan ko sa labas ng paaralan ang bagong sapatos na bili niyo para sa akin," pagtatapat ng bata.<br/><br/>"Ano? Binilhan ka ng bago tapos ipamimigay mo lang pala? Walang mali sa pagbibigay anak pero sana, inisip mo rin na binili namin ng papa mo iyon para sa iyo. Nagsinungaling ka pa," sabi ni Vina sa anak.<br/><br/>Pinuri ng ina ang bata sa pagiging mapagbigay nito pero pinaalalahanan rin niya na mali ang magsinungaling kahit ano pa ang dahilan. Inihayag niya rin kay Kulas na sana ay pahalagahan nito ang mga binibigay nila ng ama niya dahil pinaghihirapan nila ito.<br/><br/>Humingi ng patawad si Kulas at nangako sa ina na pahahalagahan na niya ang susunod na mga sapatos at mga gamit na ibibigay sa kanya ng mama at papa niya. Nangako rin siyang hindi na siya magsisinungaling.', [
        ['Ano ang paksa ng kuwento?', 'kung bakit nawawala ang mga sapatos ni Kulas', 'kung bakit nagsusumikap ang ina ni Kulas', 'kung bakit mahalaga ang pumasok sa paaralan', 'ang pagiging mahilig ni Kulas sa sapatos'],
        ['Sinu-sino ang mga pangunahing tauhan sa kuwento?', 'si Kulas at ang kanyang ina', 'ang mga kamag-aral ni Kulas', 'ang mga magulang ni Kulas', 'si Leon'],
        ['Alin sa mga sumusunod ang isa sa mga aral na nais iparating ng kuwento?', 'huwag magsisinungaling', 'huwag magtitipid', 'huwag magbibigay sa kapwa', 'huwag bibili ng mamahaling sapatos'],
        ['Alin sa mga sumusunod ang isa sa mga aral na nais ibahagi ng kuwento?', 'pahalagahan ang pinaghihirapan ng magulang', 'pahalagahan ang mga materyal na bagay', 'huwag mang-aaway ng kamag-aral', 'huwag bibili ng mga mamahaling bagay'],
        ['Bakit palaging nawawala ang mga bagong sapatos ni Kulas?', 'dahil sa kanyang pagiging labis na mapagbigay', 'dahil sa kanyang pagkabulagsak', 'dahil sa kanyang labis na pagmamataas', 'dahil balewala sa kanya ang mga sapatos'],
        ['Ang lahat ng mga ito ay mga ebidensiya sa kuwento ng pagmamahal ng ina ni Kulas sa kanya maliban sa alin?', 'lagi niyang ipinagluluto si Kulas', 'ayaw niyang magsuot si Kulas ng luma', 'siya pa ang nagtatali ng sintas ni Kulas', 'inunawa niya ang pagsisinungaling ni Kulas'],
    ], 'Sandy Ghaz'],
];
$banks = [];
foreach ($stories as $si => $story) foreach ($story[3] as $qi => $entry) $banks[] = [$si, $qi];
$tier = 'all';
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
    $available = array_values(array_diff(array_keys($banks), $used));
    if (!$available) { $used = []; $available = array_keys($banks); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    [$si, $qi] = $banks[$i];
    $entry = $stories[$si][3][$qi];
    $choices = array_slice($entry, 1);
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = ['story'=>$si, 'word'=>b56_h($entry[0]), 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    <?php $passage = $stories[$cur['story']]; ?>
    <div style="max-width:500px;margin:20px auto;padding:20px;box-sizing:border-box;border:1px solid #AAA;border-radius:8px;background:white;">
        <div style="font-size:16pt;font-weight:700;color:#0000BB;"><?php echo b56_h($passage[0]); ?></div>
        <div style="font-size:12pt;color:#555;">May-akda: <?php echo b56_h($passage[4]); ?></div>
        <?php if ($passage[1] !== ''): ?><p style="font-size:10pt;overflow-wrap:anywhere;color:#555;">Pinagkunan: <?php echo b56_h($passage[1]); ?></p><?php endif; ?>
        <div style="padding-top:20px;text-align:justify;font-size:13pt;line-height:1.6;color:#800080;white-space:normal !important;"><?php echo str_replace('&lt;br/&gt;', '<br/>', b56_h($passage[2])); ?></div>
    </div>
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot:</strong> <span style="color:#CC0066;"><?php echo b56_h($cur['correct']); ?></span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <?php $passage = $stories[$cur['story']]; ?>
    <div style="max-width:500px;margin:20px auto;padding:20px;box-sizing:border-box;border:1px solid #AAA;border-radius:8px;background:white;">
        <div style="font-size:16pt;font-weight:700;color:#0000BB;"><?php echo b56_h($passage[0]); ?></div>
        <div style="font-size:12pt;color:#555;">May-akda: <?php echo b56_h($passage[4]); ?></div>
        <?php if ($passage[1] !== ''): ?><p style="font-size:10pt;overflow-wrap:anywhere;color:#555;">Pinagkunan: <?php echo b56_h($passage[1]); ?></p><?php endif; ?>
        <div style="padding-top:20px;text-align:justify;font-size:13pt;line-height:1.6;color:#800080;white-space:normal !important;"><?php echo str_replace('&lt;br/&gt;', '<br/>', b56_h($passage[2])); ?></div>
    </div>

    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Pindutin ang iyong sagot sa ibaba.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;max-width:480px;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo b56_h($choice); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php endif; ?>

</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
