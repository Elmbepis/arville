<?php
// filipino/modules/binasa23.php
// Reading comprehension: five original passages.

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
function b23_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$stories = [
    ['Ang Mahiwagang Bulaklak ng Matandang Babae', 'mgahalimbawangmaiklingkwento.blogspot.com/2014/06/halimbawa-ng-maikling-kwentong-pambata.html', 'Noong unang panahon, may isang matandang babaeng may magandang hardin ng mga bulaklak. Malapit ang matandang babae sa mga mangingisdang naninirahan sa kalapit na baryo. Madalas bumisita ang mga mangingisda sa matandang babae upang ipagpalit ang kanilang isda sa mababangong bulaklak nito. <br/><br/> Naniniwala ang mga mangingisdang mayroong kapangyarihan ang matandang babae at ito ang dahilan kung bakit maganda ang kanyang hardin. Sinubukan nilang tanungin ang matanda ngunit sinabi ng matandang wala naman siyang kapangyarihan. <br/><br/> Isang araw ay may mag-asawang bumisita sa baryo at nakita nila ang magandang hardin. Pumasok sila at pumitas ng bulaklak nang walang pahintulot. Nakita sila ng matanda at pinakiusapan sila nitong umalis ngunit pinagtawanan lamang nila ito dahil sa pangit nitong anyo. <br/><br/> Dahil sa kalapastanganan ng dalawa, ginawa silang magandang kulisap ng matanda. Tunay nga palang makapangyarihan ang matanda! <br/><br/> Noon din ay nagbago ang anyo ng dalawa. Naging mga paru-paro sila at mula noo\'y palagi na silang nakikitang umaali-aligid sa mga bulaklak.', [
        ['Sino ang pangunahing tauhan sa kuwento?', 'matandang babae', 'mga mangingisda', 'mag-asawa', 'magandang babae'],
        ['Sino ang nagmamay-ari ng magandang hardin?', 'matandang babae', 'matandang lalaki', 'mag-asawa', 'magandang babae'],
        ['Sino ang madalas bumisita sa matandang babae?', 'mga mangingisda', 'mga magsasaka', 'mag-asawa', 'mga bata'],
        ['Sino ang pinarusahan ng matandang babae?', 'mag-asawa', 'magandang babae', 'isang bata', 'mga mangingisda'],
        ['Bakit madalas bumisita ang mga mangingisda sa matanda?', 'upang makipagpalitan', 'upang makipagkuwentuhan', 'upang makipagsalu-salo sa pagkain', 'upang makipagkumustahan'],
        ['Bakit pinarusahan ng matandang babae ang mag-asawa?', 'dahil lapastangan sila', 'dahil hindi sila nagbayad', 'dahil sinira nila ang bakod', 'dahil tinangay nila ang mga isda'],
        ['Ano ang nangyari sa mag-asawa?', 'naging paru-paro', 'naging tipaklong', 'naging bubuyog', 'naging langgam'],
    ]],
    ['Bakit Maluwag ang Balat ng Baka at Masikip ang Balat ng Kalabaw?', 'mgakwentongpambata.blogspot.com/2016/10/bakit-maluwag-ang-balat-ng-baka-at.html', 'Noong araw, may isang mayamang lalaking nag-aalaga ng isang baka at isang kalabaw. Katulong niya ang mga ito sa bukid, sa pagtatanim at mga ibang gawain. <br/><br/> Isang araw, naisipan ng baka at kalabaw na maligo sa ilog. Inalis nila ang kanilang mga baro at lumublob sila sa tubig. Masaya silang lumalangoy-langoy nang matanaw nilang dumarating ang mabagsik nilang amo na may dala-dalang malaking pamalo. <br/><br/> Sa pagmamadali nilang makapagbihis, naisuot ng kalabaw ang baro ng baka, at naisuot naman ng baka ang baro ng kalabaw. Tumakbo sila para huwag maabutan ng among galit na galit. <br/><br/> Mabilis na nakalayo ang baka dahil maluwag para sa kanya ang isinuot na baro. Ang kalabaw naman ay hindi nakatakbo dahil sa kasikipan ng suot. Inabutan siya ng amo at hinampas nang hinampas. <br/><br/> Mula noon, maluwag nang palagi ang damit ng baka. Masikip naman ang damit ng kalabaw at mas mabagal itong tumakbo.', [
        ['Sino ang nag-aalaga ng isang baka at isang kalabaw?', 'mayamang lalaki', 'mahirap na lalaki', 'mayamang babae', 'mahirap na babae'],
        ['Saan naisipang maligo ng baka at kalabaw?', 'sa ilog', 'sa dagat', 'sa batis', 'sa lawa'],
        ['Ano ang dala ng amo ng baka at kalabaw nang matanaw nila ito habang sila ay naliligo?', 'malaking pamalo', 'sariwang damo', 'bagong damit', 'mabigat na bato'],
        ['Bakit inabutan ng amo ang kalabaw?', 'Hindi ito makatakbo dahil masikip ang suot.', 'May pilay ito sa paa.', 'Madulas sa tabing-ilog.', 'Mabagal siya dahil siya ay mataba.'],
        ['Sino ang inabutan at pinaghahampas ng kanilang amo?', 'ang kalabaw', 'ang baka', 'ang kambing', 'ang aso'],
        ['Bakit naging maluwag ang damit ng baka?', 'Galing ito sa kalabaw at mas malaki ang kalabaw.', 'Galing ito sa kalabaw at mas maliit ang kalabaw.', 'Pumayat ang baka dahil walang makain.', 'Nabasa sa ilog ang damit kaya lumuwag ito.'],
        ['Bakit naging masikip ang damit ng kalabaw?', 'Galing ito sa baka at mas maliit ang baka.', 'Galing ito sa baka at mas malaki ang baka.', 'Tumaba ang kalabaw dahil kain ito nang kain.', 'Namamaga ang likod ng kalabaw dahil nahampas ito.'],
    ]],
    ['Ang Alamat ng Langaw', 'mgakwentongpambata.blogspot.com/2019/02/alamat-ng-langaw.html', 'Noong unang panahon, may isang mag-asawang labis na kinaiinisan. Pareho kasi silang tamad at ayaw magtrabaho. Umaasa lang sila sa mababait nilang mga kapitbahay para mabuhay. <br/><br/> May pangit pang ugali ang dalawa. Kapag may handaan ay dumadalo sila kahit hindi sila imbitado. Sila pa ang nauuna sa pagkuha ng pagkain kaysa sa mga inimbitahang panauhin. <br/><br/> Isang araw ay napansin ng mag-asawang nakabihis nang magara ang kanilang mga kapitbahay. Lahat ay tila nagmamadaling pumunta sa isang lugar. Naghinala silang sa isang malaking handaan patungo ang mga ito. <br/><br/> Palihim na sumunod ang dalawa sa mga kapitbahay. Gayon na lang ang kanilang tuwa nang makitang handaan nga ang kanilang pinuntahan. Gumawa ng paraan ang dalawa para makapasok sa bahay kahit hindi imbitado. <br/><br/> Napakaraming handang pagkain kaya nagpakasawa sila. <br/><br/> Nang inaakala nilang wala nang kakain at nakalingat ang may-ari ng handaan, nagtungo sila sa mesang kainan at nagsimulang magbalot ng mga pagkain para iuwi. Nagkataong napalingon ang may-ari ng handaan at nakita ang ginagawa ng dalawa. <br/><br/> Sa galit ng may-ari ay isinumpa ang mag-asawa. Sinabi nitong hindi na sila makapagdadala ng anumang pagkain kahit kailan at hindi sila pakakainin kahit nasa handaan pa sila. Binalewala lang iyon ng mag-asawa na napilitang umuwi. <br/><br/> Pagdating ng bahay ay bigla na lang nagbago ang anyo ng dalawa. Naging maliliit silang kulisap na may mga pakpak. <br/><br/> Hindi na nakita pa ng mga kapitbahay ang mag-asawa. Sa halip ay dalawang insektong dapo nang dapo sa mga pagkain ang lumitaw. Kahit bawalan at paalisin ay dadapo pa rin ang mga ito sa pagkain basta nakalingat ang nagbabantay. Nakilala ang mga insektong iyon sa tawag na \'langaw\'.', [
        ['Sino ang tamad at gahaman sa pagkain sa kuwento?', 'isang mag-asawa', 'isang matanda', 'mga magkakapatid', 'dalawang bata'],
        ['Ano ang mahilig hingin o kunin ng mga pangunahing tauhan sa kuwento?', 'pagkain', 'damit', 'pera', 'alahas'],
        ['Alin sa mga sumusunod ang pangit na gawain ng mag-asawa sa kuwento?', 'kumakain sa mga handaan nang walang imbitasyon', 'nanggugulo sa mga handaan', 'naghahanda ng mga panis na pagkain', 'nag-iingay sa mga handaan'],
        ['Bakit nagalit ang isang may-ari ng handaan sa mag-asawa?', 'Nagbalot sila ng mga pagkain nang walang paalam.', 'Nakabasag sila ng mga pinggan.', 'Inaway nila ang isang panauhin.', 'Nahuli silang nagnanakaw ng mga kubyertos.'],
        ['Ano ang ginawa ng nagalit na may-ari ng handaan sa mag-asawa?', 'Isinumpa silang hindi na makakakain pa sa mga handaan.', 'Siningil sila ng kabayaran.', 'Isinumpa sila upang maging ipis.', 'Ipinahuli sila sa pulis.'],
        ['Ano ang kinahinatnan ng mag-asawa?', 'Pareho silang naging langaw.', 'Pareho silang naging ipis.', 'Itinakwil na sila ng kanilang mga kakilala.', 'Nabilanggo sila nang mahabang panahon.'],
    ]],
    ['Ang Alamat ng Kuwago', 'mgakwentongpambata.blogspot.com/2018/07/alamat-ng-kuwago.html', 'Noong unang panahon, may isang binatang tunay na mapagmahal sa kalikasan. Ang pangalan niya ay Tiyago. Nakatira si Tiyago sa paanan ng isang malawak na bundok. <br/><br/> Gawain na ni Tiyago ang bantayan ang bundok at kagubatan nito. Tinitiyak niyang walang sinumang manghuhuli ng mga hayop o mamumutol ng mga puno. <br/><br/> Isang araw, napansin ni Tiyago ang kalapit na gubat. May itim na usok na nanggagaling sa isang bahagi nito. Makaraan ang ilang saglit, ito ay naging kulay pulang apoy. <br/><br/> "Nasusunog ang gubat!" bulalas niya na hindi malaman ang gagawin. <br/><br/> Dahil sa nangyari ay nangako si Tiyago sa sariling hinding-hindi niya pababayaan ang bundok na binabantayan. <br/><br/> Araw at gabi ay hindi na natulog si Tiyago, lalo pa at lumaganap ang balitang may isang pangkat ng mga bandidong nanununog talaga ng gubat. <br/><br/> May mga kakilala si Tiyagong nagboluntaryo ring magbantay sa kanilang bundok pero sa umaga lang sila maaaring magbantay dahil kailangan nilang umuwi sa gabi. <br/><br/> Kalauna\'y nakagawian ni Tiyago ang matulog sa umaga at manatiling gising sa magdamag. Kahit nang magkasakit ay hindi siya napigilang magbantay sa gabi. Nangangamba siyang sa gabi umatake ang mga bandido. <br/><br/> Nang mamatay si Tiyago ay may humalili sa kanya sa pagbabantay ng gubat. Ito ay isang ibong may malalaking mata at gising sa buong gabi. Bilang pag-aalala kay Tiyago ay tinawag itong \'kuwago\' ng mga tao.', [
        ['Sino ang pangunahing tauhan sa kuwento?', 'si Tiyago', 'isang kuwago', 'mga bandido', 'mga kaibigan ni Tiyago'],
        ['Ano ang karaniwang gawain ni Tiyago?', 'magbantay ng kanilang bundok', 'manghuli ng mga kuwago', 'lumaban sa mga bandido', 'pumatay ng mga apoy sa kagubatan'],
        ['Alin sa mga sumusunod ang HINDI kalaban ni Tiyago?', 'mga nagtatanim ng puno', 'mga nagpuputol ng puno', 'mga namamaril ng ibon', 'mga nanununog ng kagubatan'],
        ['Bakit mas tumindi ang pagbabantay ni Tiyago ng kalikasan?', 'May mga bandidong nanununog daw ng gubat.', 'Nagbabago na ang klima.', 'Nauubos na ang kanilang pagkain.', 'Lumalala na ang polusyon.'],
        ['Saan nagmula ang kuwagong humalili kay Tiyago sa pagbabantay?', 'hindi sinabi sa kuwento', 'sa isang sumpa kay Tiyago', 'sa kabilang bundok', 'sa isang diwata'],
        ['Ano ang kinahinatnan ni Tiyago sa kuwento?', 'Siya ay pumanaw.', 'Siya ay naging kuwago.', 'Siya ay lumipat ng tirahan.', 'Siya ay pinalayas sa bundok.'],
    ]],
    ['Si Mario at ang Isda', 'mgakwentongpambata.blogspot.com/2016/08/si-mario-at-ang-isda.html', 'Tuwang-tuwa ang mangingisdang si Mario nang may nabingwit siyang isang malaking isda. Nang ilalagay na niya ito sa buslo, bigla itong nagsalita, "Huwag!" Muntik nang mahulog sa bangka si Mario sa labis na pagkagulat. <br/><br/> "Ibalik mo ako sa tubig at bibigyan kita ng kayamanan," sabi ng isda, <br/><br/> Nang mahulasan si Mario, tinanong niya ang isda, "Ano ka ba, impakto?" <br/><br/> "Hindi, ako ay alagad ng mga sirenang nagbabantay dito. May kapangyarihan ako - mahika! Kaya ibalik mo lang ako sa tubig at ipagkakaloob ko sa iyo ang isang kahilingan." <br/><br/> Naalaala ni Mario ang dampang tinitirhan niya. Lagi itong inirereklamo ng asawa dahil sa kaliitan. "Nais ko ang malaking tirahan," sabi niya sa isda. <br/><br/> "Masusunod. Umuwi ka na at makikita mo ang iyong malaking tahanan," sabi ng isda na kaagad namang ibinalik ng lalaki sa tubig. <br/><br/> Hindi lang malaki ngunit tila palasyo ng hari sa gara ang nadatnan niya. "Sa palagay ko, hindi na ako aawayin ni Ana. Malaki na ang bahay namin." <br/><br/> Ngunit hindi pa pala nasisiyahan ang asawa. "Hulihin mo uli ang isda. Humingi ka ng mga kasangkapan. Dapat ay iyong magagandang mesa, silya, kama at mga dekorasyon sa bahay." <br/><br/> Palibhasa\'y takot sa babae, bumalik si Mario sa dagat at namingwit. "Sana\'y huwag ko na siyang mahuli para hindi na ako manghingi. Nakakahiya naman ang asawa ko," bulong niya sa sarili. <br/><br/> Nagkataong lumalangoy pala sa malapit ang malaking isda at nang makita si Mario, ito\'y lumukso sa kanyang bangka. "Ano, kaibigan, nagustuhan mo ba ang bahay mo?" <br/><br/> "Oo nga, maraming salamat. Ngunit nakikiusap ang asawa ko, kung maaari raw, mabibigyan mo ba raw kami ng mga kasangkapan?" nahihiyang tanong ng mangingisda. <br/><br/> "O, sige. Bumalik ka na sa inyo at naroon na ang mga hinihiling ng asawa mo." <br/><br/> Natitiyak ni Mario na matutuwa na ngayon si Ana. Malaking biyaya na talaga ang ibinigay sa kanila ng isda. Pagdating niya sa bahay, sinalubong siya ng asawa sa pintuan. <br/><br/> "Balikan mo uli ang isda. Humingi ka naman ngayon ng magagarang alahas at magagandang kasuotan. Nais kong makita ng lahat dito sa bayan natin na tayo ang pinakamayaman dito," utos ng babae sa asawa, na alam niyang hindi kayang sumuway sa bawat sabihin niya. <br/><br/> Hiyang-hiya si Mario na humarap uli sa isda, na madali niyang nakita sa pampang na pinaglalagian nito. "Nakakahiya sa iyo," halos hindi niya maibuka ang bibig, "ngunit may hinihingi na naman ang asawa ko." <br/><br/> Matagal na hindi sumagot ang isda, parang nag-iisip. Kapagkaraka ay nagsalita, "Nakikilala ko na kung ano ang pagkatao ng asawa mo. Isa siyang sakim na babae. Hindi siya marunong mahiya, at hindi rin siya mabait na asawa. Parurusahan ko siya. Kukunin ko uli lahat ng naibigay ko na sa kanya." Lumukso sa tubig ang isda at matuling lumangoy papunta sa laot. <br/><br/> Nang umuwi si Mario, nakita niya si Ana na nakaupong umiiyak sa hagdang kawayan, ng dati nilang dampa.', [
        ['Sino ang pangunahing tauhan sa kuwento?', 'si Mario', 'ang asawa ni Mario', 'ang isda', 'ang mga sirena'],
        ['Bakit nagulat si Mario nang una niyang mahuli ang malaking isda?', 'Ito ay nagsalita.', 'Ito ay umawit.', 'Ito ay tumula.', 'Ito ay nagsayaw.'],
        ['Ano ang pangako ng isda kay Mario kapag ibinalik ito ni Mario sa tubig?', 'katuparan ng isang kahilingan', 'maraming alahas', 'magandang kalusugan', 'maraming kaibigan'],
        ['Ano ang unang hiniling ni Mario sa isda?', 'isang malaking bahay', 'magagandang kasangkapan', 'mga alahas at damit', 'maraming pagkain'],
        ['Aling kahilingan ni Mario ang hindi na ipinagkaloob ng isda?', 'mga alahas at damit', 'magagandang kasangkapan', 'isang malaking bahay', 'isang bangka'],
        ['Ano ang naging pagkakakilala ng isda sa asawa ni Mario?', 'gahaman na babae', 'matalinong babae', 'mapagmataas', 'walang galang sa kalikasan'],
        ['Anong parusa ang ibinigay ng isda sa asawa ni Mario?', 'Binawi niya ang lahat ng mga naipagkaloob dito.', 'Ginawa niya rin itong isda.', 'Binigyan niya ito ng malubhang sakit.', 'Inilayo niya ito kay Mario.'],
    ]],
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
    $_SESSION[$sessionKey]['current'] = ['story'=>$si, 'word'=>b23_h($entry[0]), 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <strong style="color:#0000CC;">'<?php echo htmlspecialchars($result['clicked'], ENT_QUOTES, 'UTF-8'); ?>'</strong>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>

    <?php $passage = $stories[$cur['story']]; ?>
    <div style="max-width:500px;margin:20px auto;padding:20px;box-sizing:border-box;border:1px solid #AAA;border-radius:8px;background:white;">
        <div style="font-size:16pt;font-weight:700;color:#0000BB;"><?php echo b23_h($passage[0]); ?></div>
        <p style="font-size:10pt;overflow-wrap:anywhere;color:#555;">Pinagkunan: <?php echo b23_h($passage[1]); ?></p>
        <div style="text-align:justify;font-size:13pt;line-height:1.6;color:#800080;"><?php echo str_replace('&lt;br/&gt;', '<br/>', b23_h($passage[2])); ?></div>
    </div>

    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo b23_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <?php $passage = $stories[$cur['story']]; ?>
    <div style="max-width:500px;margin:20px auto;padding:20px;box-sizing:border-box;border:1px solid #AAA;border-radius:8px;background:white;">
        <div style="font-size:16pt;font-weight:700;color:#0000BB;"><?php echo b23_h($passage[0]); ?></div>
        <p style="font-size:10pt;overflow-wrap:anywhere;color:#555;">Pinagkunan: <?php echo b23_h($passage[1]); ?></p>
        <div style="text-align:justify;font-size:13pt;line-height:1.6;color:#800080;"><?php echo str_replace('&lt;br/&gt;', '<br/>', b23_h($passage[2])); ?></div>
    </div>

    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Pindutin ang iyong sagot sa ibaba.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;max-width:480px;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo b23_h($choice); ?>
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
