<?php
// filipino/modules/pandiwa-aspekto-kilala.php
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
$moduleTitle = 'Paggamit ng Tamang Aspekto ng Pandiwa';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pag_tier(string $lvl, int $grd): int {
    return ($grd <= 3 ? 1 : ($grd <= 5 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? 2 : 0);
}
function pag_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
1 => ['*Naligo2Naliligo3Maliligo+ sila sa dagat kahapon.', '*Pumunta2Pumupunta3Pupunta+ si $name1 sa amin kagabi.', '*Nagluto2Nagluluto3Magluluto+ si $name1 ng ulam kanina.', '*Narinig2Naririnig3Maririnig+ mo ba ako kanina?', '*Kinain2Kinakain3Kakainin+ ko kanina ang puto sa plato.', 'Malakas ang ulan na *bumuhos2bumubuhos3bubuhos+ kahapon.', '*Nagkita2Nagkikita3Magkikita+ kami ni $name1 noong $araw.', '*Bumili2Bumibili3Bibili+ si $name1 ng laruan noong $araw.', 'Laging *nagluluto2nagluto3magluluto+ ng adobo si $name1.', 'Hanggang ngayon ay *kumakain2kumain3kakain+ siya ng hapunan.', '*Nag-aaral2Nag-aral3Mag-aaral+ si $name1 $now.', '*Nagbabasa2Nagbasa3Magbabasa+ si $name1 ngayon.', 'Ang sanggol sa kuna ay *umiiyak2umiyak3iiyak+ ngayon.', 'Ang bata ay masayang *naglalaro2naglaro3maglalaro+ ngayon.', 'Sino kaya ang *kumakatok2kumatok3kakatok+ sa pinto ngayon?', '*Bibilhan2Binilhan3Binibilhan+ kita ng $item bukas.', '*Mag-aaral2Nag-aral3Nag-aaral+ akong magluto bukas.', '*Magdadala2Nagdala3Nagdadala+ si $name1 ng aklat mamaya.', 'Si $name1 ay *sasabay2sumabay3sumasabay+ sa kanila mamaya.', 'Si Ate ay *aalis2umalis3umaalis+ na pala bukas.', 'Sino ang *sasama2sumama3sumasama+ kay Lola sa $araw?', '*Aalis2Umalis3Umaalis+ na pala si $name1 sa $araw.', '*Bibigyan2Binigyan3Binibigyan+ mo ba ng regalo si $name1 bukas?'],
2 => ['Si $name1 ay *bumili2bumibili3bibili+ ng $item $past.', '*Humiram2Humihiram3Hihiram+ si $name1 ng $item $past.', 'Sabay-sabay *kumain2kumakain3kakain+ ang buong mag-anak kagabi.', 'Sinu-sino ang *dumalo2dumadalo3dadalo+ sa handaan kagabi?', 'Si $name1 ang *gumawa2gumagawa3gagawa+ ng keyk na ito kahapon.', 'Si Nanay ay *nagkanaw2nagkakanaw3magkakanaw+ ng kape kanina.', '*Nadapa2Nadadapa3Madadapa+ ang bata kaya naputikan ang damit niya.', 'Si $name1 ay *nag-aalmusal2nag-almusal3mag-aalmusal+ dito araw-araw.', 'Mula noon, palaging sa umaga *naliligo2naligo3maliligo+ si $name1.', 'Palaging *nagluluto2nagluto3magluluto+ ng isda si $name1.', 'Tahimik na *nagbabasa2nagbasa3magbabasa+ ang mga mag-aaral ngayon.', 'Masakit ang ngipin niya kaya *umiiyak2umiyak3iiyak+ siya ngayon.', 'Si $name1 ay *nag-aalmusal2nag-almusal3mag-aalmusal+ sa karinderya araw-araw.', '*Naglalaro2Naglaro3Maglalaro+ kami ng patintero sa labas tuwing umaga.', '*Dadalhin2Dinala3Dinadala+ ko $future ang $itemb hinihiram mo.', '*Bibilhan2Binilhan3Binibilhan+ kita ng bagong $item $future.', 'Si $name1 ang *magwawalis2nagwalis3nagwawalis+ ng sahig bukas.', '*Maglalaro2Naglaro3Naglalaro+ kami ng chess mamayang hapon.', '*Iinom2Umiinom3Uminom+ ako ng gamot mamaya para gumaling ako.', '*Hihiramin2Hiniram3Hinihiram+ ko ang laruan ni $name1 bukas.', '*Ibabalot2Ibinalot3Ibinabalot+ ko ito sa dahon ng saging mamaya.'],
3 => ['Mahigpit silang *niyakap2niyayakap3yayakapin+ ng kanilang ina kanina.', 'Ang pulubi ay *nahimatay2nahihimatay3mahihimatay+ sa gutom kanina.', 'Ano ang *natutuhan2natututuhan3matututuhan+ mo sa paaralan kahapon?', '*Hiniram2Hinihiram3Hihiramin+ ni $name1 ang aklat ko noong isang linggo.', 'Si $name1 ang *naglinis2naglilinis3maglilinis+ ng kusina noong isang araw.', 'Sino ang *sumagot2sumasagot3sasagot+ sa telepono kaninang umaga?', 'Noon ko pa nakikitang *nag-aalmusal2nag-almusal3mag-aalmusal+ si $name1 sa karinderya.', 'Si Itay ay *umiinom2uminom3iinom+ ng mainit na kape sa beranda ngayon.', '*Hinahanap2hahanapin3hinanap+ ng bata ang kanyang ina sa mga oras na ito.', 'Ang mga dyip ay *humihinto2huminto3hihinto+ sa estasyon bawat oras.', 'Kasalukuyang *tinitiklop2tiniklop3titiklupin+ ni Ate $girl ang mga damit natin.', '*Naghuhugas2Naghugas3Maghuhugas+ ng mga pinggan at kubyertos $now si Kuya $boy.', 'Ang sanggol ay *binabantayan2binantayan3babantayan+ ni Ate $girl sa sala ngayon.', 'Noon pa ma\'y *nagsisimba2nagsimba3magsisimba+ na si $name1 tuwing $araw.', '*Ipapakita2Ipinakita3Ipinapakita+ ko sa\'yo $future ang $itemb hiniram ko kay $name2.', 'Hayaan mo\'t *bibilhan2binilhan3binibilhan+ din kita ng bagong $item $future.', 'Sa loob ng banyo *magsisipilyo2nagsipilyo3nagsisipilyo+ si $name1 mamaya.', 'Si Gng. $girl Rivas ang *magtuturo2nagturo3nagtuturo+ ng Filipino mamayang hapon.', '*Yayakapin2Niyayakap3Niyakap+ ko nang mahigpit si Nanay kapag nakita ko siya bukas.', '*Magluluto2Nagluto3Nagluluto+ si Nanay ng pansit para sa meryenda mamaya.'],
4 => ['Maagang *nagising2nagigising3magigising+ si $name1 dahil sa malakas na tilaok ng manok.', '*Binuksan2Binubuksan3Bubuksan+ niya ang pinto at mga bintana ng kanilang sala kanina.', '*Narinig2Naririnig3Maririnig+ ni $name1 ang ingay ng mga sasakyan sa labas $past.', '*Tinulungan2Tinutulungan3Tutulungan+ ni $name1 ang kanyang bunsong kapatid kanina.', 'Ang dalawang bata ay *nagpaalam2nagpapaalam3magpapaalam+ sa kanilang magulang kagabi.', 'Magiliw na *sinalubong2sinasalubong3sasalubungin+ ni $name1 ang mga bisita kahapon.', 'Si $name1 ang *bumili2bumibili3bibili+ ng pagkain para sa aso natin noong isang linggo.', '*Isinulat2Isinusulat3Isusulat+ ko sa papel noong isang buwan ang mga dapat mong gawin.', 'Mula pa noong $araw *nagtitinda2nagtinda3magtitinda+ si $name1 ng iba\'t ibang kakanin sa $place.', 'Matagal nang *nagluluto2nagluto3magluluto+ si $name1 ng ulam para kay $name2 tuwing tanghali.', 'Si Ate $girl ay laging *nagtitinda2nagtinda3magtitinda+ ng iba\'t ibang kakanin sa $place.', 'Tuwing gabi ay *binabasahan2binasahan3babasahan+ ni $name1 ng kuwento ang kanyang anak.', '*Nagkakasiyahan2Nagkasiyahan3Magkakasiyahan+ $now ang kanilang grupo sa $place.', 'Si $name1 ay *naghahanda2naghanda3maghahanda+ ng masarap na almusal sa kusina ngayon.', 'Ang mga magsasaka ay kasalukuyang *nagtatanim2nagtanim3magtatanim+ ng palay sa bukid.', 'Si Itay ba ang *maghahatid2naghatid3naghahatid+ kina $name1 at $name2 sa paaralan bukas ng umaga?', '*Ipakikita2Ipinakita3Ipinakikita+ ko sa\'yo sa $araw ang kotseng binili ko kay $name2 sa mababang halaga.', 'Pagkatapos kong manood ng teleseryeng ito, *magsasaing2nagsaing3nagsasaing+ na ako sa kusina.', 'Kung magtitiyaga si $name1, *makaaahon2nakaahon3nakaaahon+ siya sa kahirapan balang araw.', '*Ihahanda2Inihanda3Inihahanda+ ko mamaya ang lahat ng mga kasangkapang gagamitin natin sa pagtatanim.', '*Daragdagan2Dinagdagan3Dinaragdagan+ ni Tatay bukas ang badyet para sa ating pamamasyal sa $araw.', '*Patutunayan2Pinatunayan3Pinatutunayan+ ko balang araw na kaya kong pangasiwaan ang proyektong ito.'],
5 => ['*Nakita2Nakikita3Makikita+ ni $name1 ang kanyang mga kaibigan sa labas ng paaralan noong nakaraang $araw.', '*Nagkuwentuhan2Nagkukuwentuhan3Magkukuwentuhan+ muna ang magkakaibigan sa gilid ng pasilyo bago pumasok sa silid-aralan.', 'Nabalitaan kong *nakipagdebate2nakikipagdebate3makikipagdebate+ ka na naman sa kaibigan mo kanina.', '*Nagmadali2Nagmamadali3Magmamadali+ kaming umuwi dahil inakala naming uulan nang malakas.', 'Si Lola $girl ay *nagpatingin2nagpapatingin3magpapatingin+ kahapon sa isang manggagamot na dalubhasa sa mga sakit sa puso.', 'Kahapon pa lamang ay *pinirmahan2pinipirmahan3pipirmahan+ ko na ang mga papeles na iniwan mo sa mesa ko.', '*Ikinuwento2Ikinukuwento3Ikukuwento+ ni Aling $girl sa amin kagabi ang kanyang nakakatawang karanasan sa Amerika.', 'Ang mga alagang aso ni $name1 ay masayang *naghahabulan2naghabulan3maghahabulan+ sa bakuran nina $name2 ngayon.', 'Ang mahiyaing kuting ng kapitbahay ay *nagtatago2nagtago3magtatago+ sa likod ng aparador sa mga oras na ito.', 'Ang mga pamangkin ni $name1 ay *nanonood2nanood3manonood+ ng palabas na \'Star Wars\' sa telebisyon sa mga oras na ito.', 'Ang mga magkakaibigan ay *nagtatawanan2nagtawanan3magtatawanan+ habang ginugunita nila ang kanilang kabataan.', 'Tuwang-tuwa si $name1 habang *ipinakikita2ipinakita3ipakikita+ niya kay $name2 ang mga larawan ng kanyang anak.', 'Nagbabasa ng pahayagan si $name1 habang *iniinom2ininom3iinumin+ niya ang kanyang mainit na kape sa sala.', 'Ang bagong eksperimento ng ating unibersidad ay *gagawin2ginawa3ginagawa+ na sa laboratoryo sa susunod na $araw.', 'Marami kaming lumang gamit na *ibebenta2ibinenta3ibinibenta+ sa gaganaping \'garage sale\' sa darating na $buwan.', '*Dadalawin2Dinalaw3Dinadalaw+ nina $name1 at $name2 ang kanilang mga lolo at lola sa Batangas sa darating na $araw.', 'Ito lahat ang mga sangkap na *gagamitin2ginamit3ginagamit+ namin mamayang gabi sa pagluluto ng apritada.'],
6 => ['*Pinagkakitaan2Pinagkakakitaan3Pagkakakitaan+ ni $name1 noong isang linggo ang kanyang mga inaning gulay at prutas sa kabukiran.', '*Pinagkuwentuhan2Pinagkukuwentuhan3Pagkukuwentuhan+ na ng magpipinsan kagabi ang kanilang mga nakakatakot na karanasan sa sementeryo.', 'May *nagbanggaan2nagbabanggaan3magbabanggaan+ palang dalawang kariton sa kanto kaya nagkalat doon ngayon ang sari-saring prutas.', 'Nakain na ba natin ang lahat ng pagkaing *ikinubli2ikinukubli3ikukubli+ mo kahapon sa iyong \'backpack\' para sa ating paglalakbay?', 'Tunay palang *napagtagumpayan2napagtatagumpayan3mapagtatagumpayan+ ni $name1 ang mga dumaang hamon sa kanyang buhay kaya siya nakaahon sa karukhaan.', '*Nagmistulang2Nagmimistulang3Magmimistulang+ halimaw si $name1 kanina nang magalit siya sa dayuhang nang-api sa kanyang kapatid.', 'Tahimik na *ipinagdarasal2ipinagdasal3ipagdarasal+ ngayon ni $name1 ang kaligtasan ng kanyang mga kapatid sa kanilang paglalakbay.', 'Palaging *pinagsasabihan2pinagsabihan3pagsasabihan+ ni $name1 ang mga kabataan sa kanilang lugar na dapat nilang layuan ang mga masasamang bisyo.', 'Sa kasalukuyan ay *sumasang-ayon2sumang-ayon3sasang-ayon+ pa rin ang mga mamamayan sa panukalang pangkalusugan ng kanilang gobernador.', '*Nananalasa2Nanalasa3Mananalasa+ sa mga sandaling ito ang malakas na bagyo sa kanilang lalawigan kaya hindi sila makalabas ng tahanan.', '*Nararamdaman2Naramdaman3Mararamdaman+ mo ba ang malamig na simoy ng hangin na kasalukuyang humahampas sa ating mga mukha?', 'Kung ikaw ang tatanungin, *palalampasin2pinalalampas3pinalampas+ mo ba ang anumang kasalanang gagawin sa iyo ng iyong alagad?', '*Pasasalamatan2Pinasalamatan3Pinasasalamatan+ ko bukas ang lahat ng mga taong tumulong sa akin upang makamit ko ang karangalang ito.', '*Makakamit2Nakakamit3Nakamit+ na kaya ni $name1 sa mga darating na araw ang kanyang pinakamimithing pagkilala mula sa kanilang samahan?', '*Makaliligtas2Nakaliligtas3Nakaligtas+ pa kaya ang ating bida sa nakaambang panganib o tuluyan na siyang magagapi ng kanyang mga kalaban?', 'Huwag mong pakawalan ang mga alaga mong isda sa lawang ito dahil *mamiminsala2namiminsala3naminsala+ ang mga iyan sa mga katutubong isda nito.']
];
$names = ['Adam', 'Adrian', 'Alex', 'Andrew', 'Angelo', 'Carlos', 'Carson', 'Chris', 'Daniel', 'David', 'Diego', 'Domeng', 'Elijah', 'Ethan', 'Gabriel', 'Hayden', 'Ian', 'Isaac', 'Isaiah', 'Jack', 'Jacob', 'James', 'Jason', 'Jose', 'John', 'Jonathan', 'Joseph', 'Joshua', 'Juan', 'Julian', 'Justin', 'Kevin', 'Lucas', 'Luis', 'Luke', 'Matthew', 'Max', 'Michael', 'Nathan', 'Noah', 'Oliver', 'Robert', 'Ryan', 'Samuel', 'Tristan', 'William', 'Alyssa', 'Amelia', 'Andrea', 'Anna', 'Bella', 'Chloe', 'Claire', 'Eliza', 'Emma', 'Eva', 'Evelyn', 'Gabriela', 'Grace', 'Hannah', 'Isabel', 'Jasmine', 'Jocelyn', 'Jolina', 'Julia', 'Kylie', 'Lauren', 'Layla', 'Leah', 'Lillian', 'Lydia', 'Maria', 'Melanie', 'Mia', 'Naomi', 'Olivia', 'Sarah', 'Sophia', 'Stella', 'Tina', 'Victoria'];
$boys = ['Alex', 'Ben', 'Carlos', 'Daniel', 'Diego', 'Gabriel', 'Isaac', 'Jaime', 'Jose', 'Juan', 'Jonathan', 'Lucas', 'Luis', 'Max', 'Roberto', 'Samuel', 'Tomas'];
$girls = ['Annie', 'Betty', 'Caring', 'Elisa', 'Emma', 'Eva', 'Evelyn', 'Grace', 'Josie', 'Julie', 'Katring', 'Laura', 'Lydia', 'Maring', 'Olive', 'Tina', 'Toyang'];
$items0[1] = ['aklat', 'baso', 'bola', 'kama', 'kumot', 'lapis', 'medyas', 'sando', 'tasa'];
$items0[2] = ['kaldero', 'kawali', 'kulambo', 'martilyo', 'palanggana', 'pamaypay', 'payong', 'platito'];
$places = ['aplaya', 'bukid', 'hardin', 'palengke', 'simbahan', 'tabing-ilog'];
$araws = ['Lunes', 'Martes', 'Miyerkules', 'Huwebes', 'Biyernes', 'Sabado', 'Linggo'];
$buwans = ['Enero', 'Pebrero', 'Marso', 'Abril', 'Mayo', 'Hunyo', 'Hulyo', 'Agosto', 'Setyembre', 'Oktubre', 'Nobyembre', 'Disyembre'];
$pasts = ['kanina', 'kahapon', 'kagabi', 'noong isang linggo', 'noong nakaraang buwan', 'noong isang taon'];
$nows = ['ngayon', 'sa mga oras na ito', 'sa sandaling ito'];
$futures = ['bukas', 'mamaya', 'mamayang gabi', 'sa susunod na linggo', 'sa susunod na buwan', 'sa darating na linggo', 'sa darating na buwan'];
$tier = pag_tier($lvl, $grd);
function pag_link(string $word): string {
    $last = substr($word, -1);
    return $word . (strpos('aeiou', $last) !== false ? 'ng' : ($last === 'n' ? 'g' : ' na'));
}
function pag_question(string $entry, int $tier, string $lvl, int $grd, array $names, array $items0, array $places, array $pasts, array $nows, array $futures, array $boys, array $girls, array $araws, array $buwans): array {
    $ns = array_values(array_unique($names));
    shuffle($ns);
    $items = $items0[$tier <= 3 ? 1 : 2];
    $item = $items[array_rand($items)];
    $sentence = strtr($entry, ['$name1'=>$ns[0], '$name2'=>$ns[1], '$item'=>$item, '$itemb'=>pag_link($item), '$place'=>$places[array_rand($places)], '$past'=>$pasts[array_rand($pasts)], '$now'=>$nows[array_rand($nows)], '$future'=>$futures[array_rand($futures)], '$boy'=>$boys[array_rand($boys)], '$girl'=>$girls[array_rand($girls)], '$araw'=>$araws[array_rand($araws)], '$buwan'=>$buwans[array_rand($buwans)]]);
    if (!preg_match('/^(.*?)\*([^+2]+)2([^+3]+)3([^+]+)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
    $choices = [$m[2], $m[3], $m[4]];
    shuffle($choices);
    return ['word'=>pag_h($m[1]).'____'.pag_h($m[5]), 'completed'=>pag_h($m[1]).'<strong style="color:#CC0066;">'.pag_h($m[2]).'</strong>'.pag_h($m[5]), 'correct'=>$m[2], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'grade'=>$grd, 'qid'=>bin2hex(random_bytes(16))];
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

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl || ($_SESSION[$sessionKey]['current']['grade'] ?? null) !== $grd)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pag_question($banks[$tier][$i], $tier, $lvl, $grd, $names, $items0, $places, $pasts, $nows, $futures, $boys, $girls, $araws, $buwans);
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
            <?php echo $cur['completed']; ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo pag_h($cur['correct']); ?></strong>
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
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang tamang aspekto ng pandiwa upang mabuo ang pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pag_h($choice); ?>
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
