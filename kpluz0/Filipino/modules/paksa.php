<?php
// filipino/modules/paksa.php
// Two original topic-identification banks, including restored questions; single difficulty.

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
$moduleTitle = 'Pagtukoy sa Paksa ng Binasa';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
if (isset($_SESSION[$sessionKey]['current']) && !isset($_SESSION[$sessionKey]['current']['qid'])) {
    unset($_SESSION[$sessionKey]);
}
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
// Original grade groupings.
function pak_tier(string $lvl, int $grd): int { return $grd <= 3 ? 1 : 2; }
function pak_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    1 => [
        ['Ang batang si Ambo<br/>Araw-araw naliligo<br/>Ngipin sinisipilyo<br/>Upang hininga di bumaho', '', 'pagiging malinis ni Ambo', 'paglalaro ni Ambo', 'pag-aaral ni Ambo', 'pagkain ni Ambo'],
        ['Ang bayan kong Pilipinas<br/>Lupain ng ginto\'t bulaklak<br/>Pag-ibig na sa kanyang palad<br/>Nag-alay ng ganda\'t dilag.', '', 'Pilipinas', 'bulaklak', 'pag-ibig', 'dilag'],
        ['Kilala mo ako,<br/>ako\'y isang aklat.<br/>Sa bawat pahina,<br/>ay may nakasulat.', '', 'libro', 'lapis', 'pahina', 'kamag-aral'],
        ['Ang \'po\' at \'opo\'<br/>Lagi nating gamitin<br/>Sa pakikipag-usap<br/>Sa nakatatanda sa atin.', '', 'paggalang sa matatanda', 'paggalang sa mga bata', 'pagsunod sa guro', 'pagsunod sa magulang'],
        ['"Bakit ka malungkot?"<br/>Ang tanong kay Edwin<br/>ng batang kalaro<br/>sa tabi ng hardin.<br/><br/>"Ibon kong alaga<br/>ito\'y nakalipad",<br/>ang sagot ni Edwin<br/>na tila iiyak.', '', 'kung bakit malungkot si Edwin', 'ang kalaro ni Edwin', 'pag-aalaga ng ibon', 'kung bakit nakalipad ang ibon'],
        ['Ang guro ko ay mabait.<br/>Siya ay kaaya-aya.<br/>Mahaba ang pasensya.<br/>Kami ay inaaruga niya.', '', 'ang aking guro', 'ang aking magulang', 'ang aking kamag-aral', 'ang aking paaralan'],
        ['Ang aming mag-anak<br/>ay laging masaya,<br/>Maligaya kami<br/>nina ate at kuya.<br/>Mahal kaming lahat<br/>nina ama\'t ina.<br/>Hanga ako<br/>sa kanilang dalawa.', '', 'ang aming pamilya', 'ang aming magulang', 'kaming magkakapatid', 'ang pagiging masaya'],
        ['Kilala si Rizal,<br/>ng bata\'t matanda.<br/>Bayaning matapat,<br/>Bayaning dakila.<br/>Namatay si Rizal,<br/>nang dahil sa bayan.<br/>Hindi natatakot,<br/>ipaglaban ang bayan.', '', 'si Rizal', 'mga bayani', 'Pilipinas', 'mga Pilipino'],
        ['Ako ay may kaibigan<br/>Kasama ko araw-araw<br/>kung kami ay naglalaro<br/>Di ko sinasaktan<br/><br/>Sa anumang gawaing<br/>Kami\'y nagtutulungan<br/>Kay saya-saya namin<br/>Dito sa paaralan.', '', 'aking kaibigan sa paaralan', 'aking kaibigan sa palaruan', 'aking pinsan', 'aking paaralan'],
        ['Tayo na sa paaralan.<br/>Mag-aral at matuto.<br/>Magbasa at magsulat.<br/>Maglaro at magtuklas.<br/>Mga bagong kaalaman,<br/>Maging aral sa buhay.<br/>Maging gabay sa bukas<br/>tungo sa pinapangarap.', '', 'pag-aaral sa paaralan', 'paglalaro sa palaruan', 'pamamasyal sa parke', 'paglilinis ng bahay'],
        ['Tayo na\'t magligpit<br/>Masaya\'t umawit<br/>Mga Kagamitan<br/>Ay ating hugasan.<br/><br/>Laging iingatan<br/>Ang anumang bagay<br/>Huwag sanang mabasag<br/>Nang di masugatan.', '', 'pag-iingat sa mga bagay', 'paghuhugas ng pinggan', 'paghuhugas ng kamay', 'pag-iingat sa katawan'],
        ['Karapatan ko<br/>bilang bata<br/>Magkaroon ng<br/>pamilyang mag-aalaga<br/>Si Nanay, Si Tatay<br/>mga mahal kong tunay<br/>Si Ate, si Kuya<br/>sa akin nagmamahal.', '', 'karapatang magkaroon ng pamilya', 'karapatang magkaroon ng tahanan', 'karapatang makapag-aral', 'karapatang magkaroon ng pagkain'],
        ['Ating pag-ingatan<br/>Ang suot na damit<br/>Nang di marumihan<br/>At hindi mapunit<br/>Sa ganitong paraan<br/>Makapagtitipid<br/>Sa pagod ng nanay<br/>Sa pera at tubig.', '', 'pag-iingat sa suot na damit', 'pagtitipid', 'pagiging malinis', 'pagkapagod ng nanay'],
        ['Sa ating pagsulat,<br/>Kamay ay gamitin<br/>At ang paa naman<br/>Sa paglakad natin.<br/><br/>Ang dalawang mata<br/>Sa ating pagtingin<br/>Gamit sa pagkain<br/>Ating mga ngipin.', '', 'mga gamit ng mga bahagi ng katawan', 'mga gamit ng mga bahagi ng makina', 'kalusugan ng katawan', 'pag-aalaga sa katawan'],
        ['Mahalaga ako<br/>sa inyong kalusugan.<br/>Sa babae at lalaki,<br/>bata at matanda man.<br/>Ako ay pampalakas<br/>ng katawan.<br/>Kaya\'t magtanim ng gulay<br/>at inyong alagaan.', '', 'gulay', 'prutas', 'isda', 'itlog'],
        ['Ako\'y isang lapis,<br/>Dulo ko ay matulis.<br/>Naiguguhit ko, <br/>Kahit ano ang maisip.', '', 'lapis', 'bolpen', 'pagsulat', 'pagguhit'],
        ['May bibi si Boboy<br/>Na ubod ng likot.<br/>Umakyat sa bangko<br/>At biglang nahulog.', '', 'ang bibi ni Boboy', 'ang baboy ni Boboy', 'ang bangko', 'si Boboy'],
        ['Kapirasong tela,<br/>Sadyang maliit. <br/>Ngunit anong hirap <br/>Kung ito\'y mawala.<br/>Pantakip sa usok,<br/>Pamunas sa luha.<br/>Maliit kong panyo <br/>Binigay na may puso.', '', 'panyo', 'damit', 'basahan', 'puso'],
        ['Tapat na kaibigan ng tao<br/>Ngunit sunod-sunuran sa amo<br/>Masaya na sa ibatong buto<br/>Handang lumaban para sa iyo', '', 'aso', 'pusa', 'manok', 'baboy'],
        ['Ako ay batang masunurin <br/>Utos ni nanay ay susundin<br/>Utos ni Tatay gayon din<br/>Iyan ay di lilimutin.', '', 'pagiging masunurin ko', 'pagiging matalino ko', 'utos ni Tatay', 'utos ni Nanay'],
        ['Pag-upo ay ayusin,<br/>Makinig sa aralin <br/>Guro ay sundin natin,<br/>Maging batang masunurin.', '', 'wastong asal sa silid-aralan', 'wastong pag-upo', 'pagsunod sa guro', 'pakikinig sa aralin'],
        ['Si Ana ay may alagang aso. Atong ang tawag sa kaniya. Ito ay mataba. Tsokolate ang kulay niya. Itong si Atong ay kahalihalina. Ito ay laging pinaliliguan ni Ana kaya ito ay malinis sa tuwina. Mahal ni Ana ang alaga niya kaya sila ay laging masaya.', '', 'ang aso ni Ana', 'ang aso ni Atong', 'ang asong si Ana', 'ang pusang si Atong'],
        ['Si Dingdong ay may alagang pagong. Ito ay si Pong Pagong. Si Pong Pagong ay laging nasa silong ng barong-barong ni Dingdong. Mahilig kumain si Pong ng kangkong at talong.', '', 'si Pong Pagong', 'si Dingdong', 'pag-aalaga ng mga pagong', 'pagkain ng mga pagong'],
        ['Ang manika ni Mika ay luma na. Bigay ito ng kanyang Mama Mina noong ikaanim na kaarawan ni Mika. Paborito niya itong laruin kahit luma na ito. Maitim at mahaba ang kulot na buhok ng manika. Ang pangalan ng manika ay Mila. Lagi niya itong dala kahit saan siya magpunta.', '', 'ang manikang si Mila', 'ang manikang si Mika', 'ang manika ni Mila', 'si Mika'],
        ['Ang batang malusog<br/>ay batang masaya;<br/>Katawan ay malakas<br/>at laging masigla.<br/>Malinis lagi<br/>ang buong katawan,<br/>Malayo sa mikrobyo,<br/>malusog kailanman.', '', 'batang malusog', 'batang mabait', 'batang matalino', 'batang masunurin'],
    ],
    2 => [
        ['Si Fernando Cueto Amorsolo ay isa sa mga pinakamahahalagang artista ng sining sa Pilipinas. Si Amorsolo ay isang pintor ng mga larawan ng mga tao at tanawing pambaryo ng Pilipinas.<br/><br/>Namulat ang mga mata ni Amorsolo sa mga dayuhang pamamaraan ng pagguhit at pagpinta, at naging adhikain niya ang makalikha ng mga larawang makabayan at puno ng kasaysayan.', '', 'si Amorsolo bilang pintor', 'si Amorsolo bilang bayani', 'mga tanyag na Filipinong pintor', 'mga tanyag na likha ni Amorsolo'],
        ['Ipinahayag ng pamahalaan ng Pilipinas na nangyari ang Sigaw ng Balintawak noong Agosto 23, 1896 sa Pugad Lawin, Lungsod ng Quezon. Ito ang naging tanda ng mga katipunero bilang simula ng himagsikang Pilipino laban sa Imperyong Kastila upang makamit ang kasarinlan.', '', 'ang Sigaw sa Pugad Lawin', 'mga kalabisan ng mga Kastila', 'kahalagahan ng Katipunan', 'kasaysayan ng Lungsod ng Quezon'],
        ['Ang mga agham pangkalikasan ay ang pag-aaral sa pisikal at mga iba pang aspetong tungkol sa daigdig at ng sansinukob na paligid. Sa pangkalahatan, sinusubok nitong ipaliwanag ang mga gawa ng mundo sa pamamagitan ng mga natural na proseso sa halip na prosesong pang-Diyos. Binubuo nito ang basehan para sa mga nilapat na agham.', '', 'depinisyon ng agham pangkalikasan', 'kahalagahan ng agham pangkalikasan', 'mga natural na proseso', 'kaugnayan ng agham sa Diyos'],
        ['Ang pag-aaral ng anatomiya ng mga selula at mga lamuymoy ng mga halaman at hayop sa pamamagitan ng mikroskopyo ay tinatawag na histolohiya. Ang histolohiya ay may kakayahang ipakita ang mga pagkakaiba sa mga mikroskopikong estruktura.', '', 'kahulugan ng histolohiya', 'mga proseso sa ilalim ng histolohiya', 'kasaysayan ng histolohiya', 'kahalagahan ng histolohiya sa lipunan'],
        ['Mga \'arthropod\' na nakahihinga sa hangin ang mga gagamba. Mayroon silang walong mga binti. Ang mga \'chelicerae\' sa kanilang bibig ay may mga pangil na tumuturok ng kamandag. Ang mga gagamba ang pinakamalaking uri ng araknida. Karaniwang mga kulisap ang nahuhuling pagkain ng mga gagamba, sa pamamagitan ng kanilang mga hinabing sapot na kung tawagin ay bahay-anlalawa.', '', 'mga katangian ng gagamba', 'kahalagahan ng mga gagamba', 'mga uri ng araknida', 'mga uri ng gagamba'],
        ['Ang lungsod na ito ay nasa baybayin ng Look ng Maynila na nasa kanlurang bahagi ng pambansang punong rehiyon na nasa kanlurang bahagi ng Luzon. Isa ito sa mga sentro ng negosyo ng umuunlad na Kalakhang Maynila na tinitirhan ng humigit na 19 na milyong katao.', '', 'Lungsod ng Maynila', 'kanlurang bahagi ng Luzon', 'Look ng Maynila', 'Kalakhang Maynila'],
        ['Ang ikalawang pangulo ng Pilipinas ay si Manuel L. Quezon. Makikita siya sa dalawampung-pisong papel na isyu ng Bangko Sentral ng Pilipinas. Ipinangalan sa kanya ang Lungsod ng Quezon sa Kalakhang Maynila at ang lalawigang Quezon. Siya rin ay kilala natin bilang \'Ama ng Wikang Pambansa\'.', '', 'si Manuel L. Quezon', 'mga pangulo ng Pilipinas', 'mga pook na pinangalanang Quezon', 'pamamahala ni Manuel Quezon'],
        ['Ang himig ng pambansang awit ng Pilipinas na pinamagatang \'Lupang Hinirang\' ay nilikha ni Julian Felipe noong 1898. Ang mga titik naman nito ay inangkat mula sa tulang \'Filipinas\' na isinulat ni Jose Palma sa wikang Kastila noong 1899.', '', 'ang pambansang awit ng Pilipinas', 'si Julian Felipe', 'si Jose Palma', 'ang musika ng Pilipinas'],
        ['Ang Venus ang ikalawang planeta mula sa araw. Ipinangalan ito mula sa diyosa ng pag-ibig at kagandahan ng mga Romano. Ito ang pang-anim na pinakamalaking planeta sa sistemang solar. Ang Venus ay umiikot ng isang rebolusyon kada 224.7 mundong araw. Dahil ang haba ng isang araw sa Venus ay 243 mundong araw, ang Venus ang planetang may pinakamabagal na pag-ikot sa sariling aksis.', '', 'ang planetang Venus', 'ang paggalaw ng planetang Venus', 'ang sistemang solar', 'ang mga planeta ng sistemang solar'],
        ['Ang heograpiya ang larangan ng agham kung saan pinag-aaralan ang mga lupain at mga katangian nito. May dalawang sangay ang heograpiya: ang heograpiyang pantao at heograpiyang pisikal. Ang heograpiyang pantao ay tumutukoy sa pag-aaral ng mga tao at ng kanilang pamumuhay. Ang heograpiyang pisikal naman ay may kinalaman sa pag-aaral ng mga kaanyuan at prosesong matatagpuan sa kalikasan.', '', 'kung ano ang heograpiya', 'ang heograpiyang pantao', 'ang heograpiyang pisikal', 'mga larangan ng agham'],
        ['Ang laboratoryo ay isang pasilidad na nagbibigay ng kontroladong kondisyon kung saan ang mga siyentipikong pananaliksik, mga eksperimento, at mga pagsusukat ay maaaring gawin. Ito ay may iba\'t ibang uri dahil sa mga pagkakaiba sa mga pangangailangan ng mga espesyalista sa iba\'t ibang larangan ng agham at inhinyerya. Makikita ito sa mga institusyong pang-edukasyon at pang-industriya, at maging sa mga pasilidad ng pamahalaan.', '', 'depinisyon ng laboratoryo', 'mga pasilidad na pang-agham', 'mga gamit sa pagsasaliksik', 'mga paraan ng pag-e-eksperimento'],
        ['Ang ugat ay isang mahalagang bahagi ng isang halaman. Ito ang parte ng halaman na responsable sa pagkuha o pagsipsip ng tubig mula sa ilalim ng lupa. Hindi ito karaniwang nakikita dahil ito ay nakabaon sa ilalim ng lupa.', '', 'ang ugat ng halaman', 'mga bahagi ng halaman', 'mga uri ng ugat ng halaman', 'depinisyon ng halaman'],
        ['Ang mga sinaunang watawat ay ginamit upang maging gabay pansandatahan sa mga labanan. Nagsilbi rin ang mga ito noon bilang pangkalahatang pansenyales at pantukoy.<br/><br/>Isang mabisang makabayang sagisag naman ang mga pambansang watawat, na may iba\'t ibang anyo at kahulugan. Kadalasang may matinding pansandatahang kaugnayan ang pambansang watawat dahil na rin sa orihinal at patuloy na pansandatahang silbi nito. Ginagamit din ang mga watawat upang maghatid ng mensahe o patalastas, o bilang pampalamuti.', '', 'sari-saring silbi ng mga watawat', 'ang pambansang watawat ng Pilipinas', 'mga bagay na pansenyales o pantukoy', 'mga simbolo at sagisag'],
        ['Ang mga bahaghari, bahagsubay, o balangaw ay mga pulutong ng kulay na nasa anyo ng kalahati o buong bilog. Makikita ang penomeno o likas na kaganapang ito pagkatapos ng pag-ulan, mula sa singaw ng pandilig na may pangwisik, o mula sa singaw-ulap ng isang umaagos na talon. Nabubuo ang bahaghari mula sa sinag ng araw at mga mahalumigmig na ambon sa hangin.', '', 'kung ano ang bahaghari', 'mga uri ng likas na penomeno', 'saan nanggaling ang mga kulay', 'mga penomeno pagkatapos ng ulan'],
        ['Ang ulan ay isang uri ng presipitasyon. Ito ay binubuo ng mga patak ng tubig na nahuhulog mula sa ulap. Ang ulap naman ay produkto ng kondensasyon ng tubig na lumutang sa atmospera mula sa lupa.<br/><br/>Hindi lahat ng ulan ay nakakaabot sa lupa. Ang iba ay sumisingaw habang dumadaan sa hangin. Kapag walang nakakaabot sa lupa, ito ay tinatawag na \'virga\', isang pangyayaring kadalasang nagaganap sa mga maiinit at tuyong lupain, tulad ng mga disyerto.', '', 'kung ano ang ulan', 'kung ano ang ulap', 'mga uri ng panahon', 'bakit umuulan sa lupa'],
        ['Ang sikat na epikong \'Florante at Laura\' ang pinakatanyag na obra maestra ni Francisco Baltazar. Mas kilala bilang Balagtas, si Baltazar ay isang tanyag na Pilipinong makata at malawakang itinuturing na isa sa mga pinakadakilang Pilipinong \'laureate\' dahil sa kanyang mga naiambag sa panitikang Filipino.', '', 'si Francisco Baltazar', 'ang Florante at Laura', 'mga Pilipinong makata', 'mga tanyag na epiko ng Pilipinas'],
        ['Noong ika-16 na siglo, upang mabilis na maunawaan ng mga Pilipino ang relihiyong dala ng mga Kastila sa ating bansa, nag-aral ng ating wika ang kanilang mga misyonaryo. Ang mga unang nakaunawa ng wikang Filipino ang siya ring kauna-unahang bumuo ng mga aklat para sa bokabularyo at balarila, at nagsalin ng mga aklat sa dasal at panrelihiyon sa wikang Filipino. Ang mga ito ay inilathala upang magamit ng mga iba pang misyonaryo\'t pari sa kanilang banal na gawain. Ang pagpapalaganap ng Kristiyanismo sa Pilipinas ay itinuturing na isa sa mga pinakamahalagang pamana sa atin ng mga Kastila.', '', 'Kasaysayan ng Kristiyanismo sa Pilipinas', 'mga misyonaryong Kastila sa Pilipinas', 'pagdating ng mga Kastila sa Pilipinas', 'mga pamana ng Kastila sa Pilipinas'],
        ['Ang abaka ay isang klase ng sinulid, seda, o himaymay na gawa sa saha ng punong saging. Ito ang tinatawag nating \'Musa Textilis\' sa wikang Latin. Ang uri ng punong saging na nagbibigay ng ganitong klase ng produkto ay katutubo sa Pilipinas. Sa abaka rin gawa ang tanyag na papel na kung tawagin natin ay \'Manila paper\'.', '', 'ang abaka', 'mga uri ng himaymay', 'mga produkto ng saha ng saging', 'ang papel de Manila'],
        ['Huwag nating hayaang lumaganap ang COVID-19. Kailangan nating magsuot ng pantakip sa mukha kung tayo ay lalabas sa panahong ito ng pandemya. Ang mga medikal na uri ng pantakip sa mukha ay medyo kinakapos kaya ilaan na lamang natin ang mga ito para sa mga manggagawa sa pangangalagang pangkalusugan at mga iba pang unang tagatugon. Maaari tayong gumawa ng telang pantakip ng mukha gamit ang isang bandana. Umiwas tayo sa matataong lugar o manatili na lamang tayo sa bahay kung maaari.', '', 'kung paano maiiwasan ang COVID-19', 'mga uri ng pantakip sa mukha', 'ang virus ng COVID-19', 'kung ano ang COVID-19'],
        ['Nagsimula ang kasaysayan ng Pilipinas nang dumating ang mga sinaunang tao sa Pilipinas sa pamamagitan ng mga tulay na lupa 67,000 taon na ang nakalilipas. Ang unang tala na pagbisita mula sa kanluran ay ang pagdating ni Ferdinand Magellan sa pulo ng Homonhon, sa timog-silangan ng Samar noong ika-16 Marso 1521. Nagtayo ng mga permanenteng paninirahan sa Cebu kasabay ng ekspedisyon ni Miguel Lopez de Legazpi noong 1565, at marami pang mga paninirahan ang itinatag pa-hilaga hanggang sa maabot ng mga kolonyalista ang Look ng Maynila sa pulo ng Luzon. Nagtatag ng isang lungsod sa Maynila at dito nagsimula ang panahon ng kolonisasyon ng Espanya na nagtagal ng mahigit tatlong siglo.', '', 'ang unang yugto ng kasaysayan ng Pilipinas', 'pagtatala ng kasaysayan ng Pilipinas', 'ang kasaysayan ng Maynila', 'ang pananakop ng mga Kastila'],
    ],
];
$tier = pak_tier($lvl, $grd);
function pak_question(array $raw, int $tier, string $lvl, int $grd): array {
    [$word, $source, $correct, $a, $b, $c] = $raw;
    $wrong = [$a, $b, $c];
    shuffle($wrong);
    $choices = array_merge([$correct], $wrong);
    shuffle($choices);
    return ['word'=>$word, 'source'=>$source, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'grade'=>$grd, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && ($_SESSION[$sessionKey]['current']['grade'] ?? null) === $grd
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || ($_SESSION[$sessionKey]['current']['grade'] ?? null) !== $grd || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pak_question($banks[$tier][$i], $tier, $lvl, $grd);
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <span style="color:#800080;font-weight:normal;">'<?php echo htmlspecialchars($result['clicked'], ENT_QUOTES, 'UTF-8'); ?>'</span>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:fit-content !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:wrap;overflow-wrap:anywhere;text-align:<?php echo $tier === 1 ? 'center' : 'left'; ?>;">
            <?php echo str_replace('&lt;br/&gt;', '<br/>', pak_h($cur['word'])); ?><?php if ($cur['source'] !== ''): ?><span style="display:block;margin-top:16px;font-size:11pt;font-weight:normal;color:#666;">Pinagkunan:<br/><?php echo str_replace('&lt;br/&gt;', '<br/>', pak_h($cur['source'])); ?></span><?php endif; ?>
    	</span>
    </div>
    <p style="font-size:16pt;color:#800080;font-weight:normal;text-align:center;margin:10px auto;">
        Paksa: <strong style="color:#CC0066;"><?php echo pak_h($cur['correct']); ?></strong>
    </p>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:fit-content !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:wrap;overflow-wrap:anywhere;text-align:<?php echo $tier === 1 ? 'center' : 'left'; ?>;">
        <?php echo str_replace('&lt;br/&gt;', '<br/>', pak_h($cur['word'])); ?><?php if ($cur['source'] !== ''): ?><span style="display:block;margin-top:16px;font-size:11pt;font-weight:normal;color:#666;">Pinagkunan:<br/><?php echo str_replace('&lt;br/&gt;', '<br/>', pak_h($cur['source'])); ?></span><?php endif; ?>
    </span>
</div>
    <p style="max-width:450px;margin:20px auto 28px;font-size:16pt;color:#444;">Piliin sa ibaba ang paksang<br/>tinatalakay sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:min(480px,100%);margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?>
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
