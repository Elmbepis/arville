<?php
// filipino/modules/sugnay-uri.php
// Four grade-dependent sentence-template banks.

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
$moduleTitle = 'Makapag-iisa at Di-makapag-iisang Sugnay';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = $_POST['level'] ?? ($_SESSION['level'] ?? 'Easy');
if (!in_array($lvl, ['Easy','Hard'], true)) $lvl = 'Easy';
$_SESSION['level'] = $lvl;
$baseTier = $grd <= 4 ? 1 : ($grd <= 7 ? 2 : 3);
$tiers = $lvl === 'Easy' ? [$baseTier] : [$baseTier+1,$baseTier+2];
$tier = implode('-', $tiers);
function sug_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    '[Dahil mahusay siyang pintor], *humahanga ako sa kanya+.',
    '*Nilapitan ko siya+ [nang siya ay kumaway].',
    '*Sandali lang kami roon+ [dahil nagmamadali kami].',
    '*Nakita ko si $name1+ [nang namasyal ako roon].',
    '*Napuyat kami kagabi+ [dahil nanood kami ng pelikula].',
    '[Dahil malapit na ang Pasko], *nag-iipon na ako+.',
    '[Dahil ang aso niya ay mataba], *mabagal ito maglakad+.',
    '[Dahil lumubog na ang araw], *umuwi na kami+.',
    '*Nanonood kami ng sine+ [nang biglang lumindol].',
    '*Inabutan siya ng lapis+ [para mayroon siyang panulat].',
    '*Bumili kami ng tinapay+ [dahil gutom na kami].',
    '[Dahil pasukan na namin bukas], *matutulog na ako+.',
    '*Humingi si $name1 ng pera+ [upang bumili ng sabon].',
    '[Dahil nadapa na naman siya], *may sugat siya sa tuhod+.',
    '*Naglalaro ang mga daga+ [dahil wala rito ang pusa].',
    '[Dahil kulang ang tulog ko], *ako inaantok+.',
    '[Dahil nahulog ang kendi ng bata], *siya umiiyak+.',
    '[Dahil matalino si $name1], *nasagot niya ang tanong+.',
    '[Dahil umalis siya agad], *hindi sila nagkita+.',
    '[Kapag bumili ka ng kendi], *bibili rin ako+.',
    '[Kapag wala ang guro], *madaldal si $name1+.',
    '[Kapag kasama mo si $name1], *walang mang-aapi sa iyo+.',
    '[Kapag tinulungan mo siya], *tutulungan ka rin niya+.',
    '[Nang pumunta ako sa bukid], *nakakita ako ng kalabaw+.',
    '[Nang nadulas si $name1], *naputikan ang damit niya+.',
    '[Nang tumanda si $name1], *hindi na siya nakapaglalayag+.',
    '[Nang makita niya ako], *agad siyang nagtago+.',
    '[Nang kumulog kagabi], *nag-iyakan ang mga bata+.',
    '[Sapagkat mabait ka sa kanya], *mabait din siya sa iyo+.',
    '[Sapagkat masikip ang daan], *nahirapan kami maglakad+.',
    '[Habang umaawit ako], *tumutugtog siya ng gitara+.',
    '[Habang nandito ako], *wala kang aalalahanin+.',
],
2 => [
    '[Dahil lumabag si $name1 sa batas], *binigyan siya ng parusa+.',
    '*Kamukha ni $name1 si $name2+ [dahil sila ay magkapatid].',
    '[Dahil mas malaki ang silid ni $name1], *ito ang pinili namin+.',
    '*Nakinig si $name1 ng radyo+ [nang papalapit na ang bagyo].',
    '[Dahil si $name1 ay aking kaibigan], *lagi kaming magkasama+.',
    '[Dahil pumasa si $name1 sa pagsusulit], *magkakatrabaho na siya+.',
    '[Dahil hatinggabi na ako nakatulog], *hindi agad ako nagising+.',
    '*Kausapin mo siya nang madalas+ [para mabawasan ang lungkot niya].',
    '*Sabihan mo lang ako+ [kung may maitutulong ako sa inyo].',
    '*Hindi pumasok si $name1+ [dahil masama ang pakiramdam niya].',
    '*Nabangga ko siya+ [nang bigla siyang dumaan sa harap ko].',
    '[Dahil kambal sina $name1 at $name2], *magkasinggulang sila+.',
    '*Tulungan natin sila+ [dahil mayroon silang inaalagaang bata].',
    '*Umiyak ang bata+ [nang agawin sa kanya ang kanyang laruan].',
    '*Naglalaba ako roon+ [samantalang nakahiga ka lamang diyan].',
    '*Nag-eensayo ako ng pag-awit+ [nang dumating silang lahat].',
    '[Dahil wala nang pagkain sa bahay], *sa labas ako kumain+.',
    '*Kamukha ni $name1 ang nanay niya+ [noong bata pa ito].',
    '[Dahil kanina pa siya naghihintay], *inip na inip na siya+.',
    '[Dahil nagutom siya sa biyahe], *napabili siya ng mais+.',
    '[Dahil madilim sa dakong iyon], *walang pumupunta roon+.',
    '[Kung aalis ka na], *makikisakay ako hanggang palengke+.',
    '[Habang naglalaro si $name1], *umiinom ako ng tsokolate+.',
    '[Kung handa na kayong magtanghal], *tatawagin ko na kayo+.',
    '[Sapagkat napakagaling mo], *natuwa ang mga manonood+.',
    '[Sapagkat madali siyang magalit], *iniiwasan namin siya+.',
    '[Nang umawit na si $name1], *tumahimik ang mga manonood+.',
    '[Kapag sumasakit ang ulo niya], *umiinom siya ng gamot+.',
    '[Kung hindi ka magsisikap], *hindi aasenso ang buhay mo+.',
    '[Para lubos mo siyang makilala], *kaibiganin mo siya+.',
    '[Para makaipon ka], *huwag ka nang bumili ng mga laruan+.',
    '[Dahil takot siya kay $name1], *pinagtataguan niya ito+.',
    '[Kapag nakatapos si $name1], *gaganda na ang buhay niya+.',
    '[Kung mag-aaral ka sa Maynila], *malalayo ka sa amin+.',
    '[Kung papansinin mo siya], *lalo siyang mag-iingay+.',
    '[Habang lumalalim ang gabi], *dumarami ang mga lamok+.',
],
3 => [
    '*Para kay $name1 ang awit na ito+ [dahil siya ang paborito naming artista].',
    '*Huwag mong pansinin si $name1+ [dahil nang-iinis lamang siya].',
    '*Mahalaga ang tulong ni $name1+ [dahil kulang na ang ating pondo].',
    '[Dahil ako ay nagbibiro lamang kanina], *huwag ka nang magalit sa akin+.',
    '[Dahil tila walang tao sa bahay ni $name1], *umalis na lamang sila+.',
    '*Labis ang tuwa ng mga mamamayan+ [nang manalo si Pacquiao sa boksing].',
    '[Dahil kanina pa naghihintay si $name1], *harapin mo na siya ngayon+.',
    '*Kapansin-pansin ang takot ng mga bata+ [nang pumasok ang malaking aso].',
    '*Nanginginig ang kanyang boses+ [habang kausap siya ng mga pulis].',
    '[Dahil para kay $name1 ang pagdiriwang na ito], *sana\'y makasama natin siya+.',
    '*Nagpahinga si $name1 sa sala+ [nang mapagod ito sa maghapong paglalaba].',
    '*Nakatayo nang tuwid ang mga bata+ [habang nakikinig sila sa kanilang guro].',
    '*Ang tagumpay ay hindi natin makakamtan+ [kung tayo ay hindi magsisikap].',
    '*Walang naglalaro sa palaruan ngayon+ [dahil malakas ang buhos ng ulan].',
    '*Mas maliwanag sa silid ni $name1+ [dahil mayroon itong limang bumbilya].',
    '[Kung mananalo si $name1 ngayon], *malaki ang maiuuwi niyang gantimpala+.',
    '[Kung hindi siya mag-eensayo], *matatalo siyang tiyak kay $name1+.',
    '[Dahil mabigat ang kanilang suliranin], *humingi sila ng payo sa akin+.',
    '[Kung handa na kayong umalis], *ipatatawag ko na ang maghahatid sa inyo+.',
    '[Para wala na kayong pagkaabalahan pa], *ako na ang magdadala ng pagkain+.',
    '[Upang dumalo ang kaibigan ni $name1], *personal ko siyang inanyayahan+.',
    '[Dahil kulang ang dala kong pera], *hindi ako nakabili ng ating hapunan+.',
    '[Dahil matindi ang init ng araw], *naglabas ng payong ang mag-asawa+.',
    '[Kung may pupuntahan si $name1 mamaya], *ako na lang ang maglalaba+.',
    '[Nang malaman niya ang katotohanan], *agad niyang tinawagan si $name1+.',
    '[Sapagkat tinulungan mo ako kanina], *bibilhan kita ngayon ng meryenda+.',
    '[Dahil mataas ang baha sa labas], *nagsuot si $name1 ng gomang bota+.',
    '[Habang natutulog ang sanggol], *nagluluto ang kanyang ina sa kusina+.',
    '[Kung naiintindihan mo ang tanong], *madali mo itong masasagot+.',
],
4 => [
    '*Huwag nating kalimutang magpasalamat+ [dahil naging masagana ang ani natin ngayong taon].',
    '[Dahil halatang kinakabahan ang mang-aawit], *pinatatawa muna siya ng kanyang kasama+.',
    '*Sumama nang husto ang loob ni $name1+ [nang malaman niya ang katotohanan kahapon].',
    '*Hindi nila alam kung ano ang gagawin sa klase+ [dahil hindi malinaw ang paliwanag ng guro].',
    '*Dapat mong pabakunahan ang alaga mong aso+ [upang hindi ito magkaroon ng \'rabies\'].',
    '*Nagpasalamat ang matanda sa binatang tumulong sa kanya+ [nang sila ay muling magkita].',
    '*Inilihim ni $name1 ang pangyayari sa opisina+ [sapagkat natatakot siyang mawalan ng trabaho].',
    '*Kailangang maibaba ang paglaki ng populasyon+ [kung hindi maitataas ang produksiyon ng pagkain].',
    '[Dahil parang mabigat ang problemang dinadala ni $name1], *ipinasyal namin siya sa malayong lugar+.',
    '*Ibinabalot nila ang mga pagkain at damit+ [upang maiparating agad ang mga ito sa mga nasalanta].',
    '[Dahil pupunta kami sa Cebu sa isang linggo upang magbakasyon], *hindi muna ako makapagtatrabaho+.',
    '[Dahil inilabas na ang resulta ng kanilang imbestigasyon], *hinuli na kanina ang mga dapat managot+.',
    '*Kapansin-pansin ang kagalakan ng mga tao+ [nang dumating na ang inaabangan nilang artista].',
    '[Kung makikinig ka sa sasabihin ko sa iyo], *madali mong magagawa ang proyektong iyan+.',
    '[Para makatulong sa pag-eehersisyo ni $name1], *binilhan siya ni $name2 ng isang bisikleta+.',
    '[Bago matapos ang huling klase nina $name1], *pumutok ang isang ilaw sa kanilang silid-aralan+.',
    '[Dahil hindi ko maalala ang kanyang pangalan], *hindi ako nagkaroon ng lakas ng loob na batiin siya+.',
    '[Dahil hindi nakinig sa guro si $name1], *hindi niya nagawa nang maayos ang kanilang takdang-aralin+.',
    '[Sapagkat bigla siyang lumabas], *marami ang nag-isip na nasaktan siya sa kanyang narining+.',
    '[Nang matapos ang sayaw ng kanilang pangkat], *agad na tumayo at nagpalakpakan ang mga manonood+.',
    '[Upang makaiwas sila sa mabigat na trapiko], *maagang umaalis ng bahay ang mag-asawa+.',
    '[Nang sila ay nagtungo sa palengke], *agarang nilinis ng diyanitor ang marumi nilang silid+.',
    '[Pagkatapos magluto ni $name1 ng hapunan], *nilabhan niya ang mga uniporme ng kanyang mga anak+.',
    '[Sapagkat mahirap ang trabahong ito], *umaabot sa limang buwan ang pagsasanay para rito+.',
    '[Nang dumating ang mga bisita ni $name1], *agad silang binigyan ng inuming pampalamig+.',
    '[Dahil kinulang ang dala kong pera], *hindi ko kayo nabilhan ng anumang pasalubong doon+.',
    '[Nang may dumating na hamon sa buhay ni $name1], *dinamayan siya ng kanyang matalik na kaibigan+.',
],
5 => [
    '*Ipinagbawal na ang pag-akyat sa bulkan mula kahapon+ [dahil maraming kabataan na ang napapahamak dito].',
    '[Dahil laging nagtatawagan ang mga magkakaibigan sa gabi], *hindi nila natatapos ang kanilang mga takdang-aralin+.',
    '[Dahil tuwing Linggo lang kinukuha ang basura sa subdibisyon], *napipilitan ang maraming magsiga sa bakuran+.',
    '*Pumunta siya sa Vietnam para bisitahin ang kanyang kapatid+ [sapagkat tinamaan ito ng malubhang sakit].',
    '*Nag-eensayo araw-araw ang mga estudyanteng magtatanghal+ [dahil ayaw nilang mapahiya sa mga magulang].',
    '*Natuklasan ang katotohanan tungkol sa naganap na kaguluhan+ [matapos umamin ang isa sa mga pinagbibintangang salarin].',
    '[Dahil nananalasa sa mga sandaling ito ang malakas na bagyo sa kanilang lalawigan], *hindi sila makalabas ng tahanan+.',
    '*Nagmistulang halimaw si $name1 kanina+ [nang magalit siya sa dayuhang nang-api sa kanyang kapatid].',
    '[Dahil may nagbanggaan palang dalawang kariton sa kanto], *nagkalat doon ngayon ang sari-saring prutas+.',
    '[Nang malaman niyang natalo siya sa paligsahan], *agad niyang nilapitan at binati ang kalabang nagkampeon+.',
    '[Para makausap mo siya bukas], *kailangan mong pumunta sa kanyang opisina bago mag-alas-siyete ng umaga+.',
    '[Dahil mapanganib ang daang tatahakin nina $name1], *nagpasya ang alkaldeng pasamahin sa kanila ang isang pulis+.',
    '[Upang maiwasan ang pagkalat ng iba\'t ibang sakit], *nagpadala ang mga opisyal ng mga manggagamot sa mga lugar na nakalubog sa baha+.',
    '[Upang maging mas mabilis ang pag-unlad ng ating bansa], *kailangan nating maglaan ng mas malaking pondo para sa edukasyon+.',
    '[Kung walang makikipag-usap sa kapatid ni $name1], *hindi siya magkakaroon ng pagkakataong ipaliwanang ang lahat+.',
    '[Para wala nang pag-awayan pa sina $name1 at $name2], *nagpasya silang ibigay na lamang sa simbahan ang napulot nilang pera+.',
    '[Tuwing may libre silang oras], *dinadalaw nina $name1 at $name2 ang kanilang mga lolo at lola sa Batangas+.',
    '[Bago pumasok sa silid-aralan ang mga magkakaibigan], *nagkuwentuhan muna sila sa gilid ng pasilyo+.',
],
];
$banks = [$tier => []];
foreach ($tiers as $t) foreach ($sourceBanks[$t] as $sentence) $banks[$tier][] = $sentence;
function sug_question(string $entry, string $tier, string $lvl): array {
$names = array(
"Adam", "Adrian", "Alex", "Alexander", "Andrew", "Angelo", "Benjamin", "Brandon", "Caleb", "Cameron", "Carlos", "Carson", "Carter", "Charles", "Christopher", "Daniel", 
"David", "Diego", "Dominic", "Dylan", "Elijah", "Ethan", "Gabriel", "Hayden", "Ian", "Isaac", "Isaiah", "Jack", "Jacob", "Jaden", "James", "Jason", "Jose", "John", "Jonathan", 
"Joseph", "Joshua", "Juan", "Julian", "Justin", "Kevin", "Logan", "Lucas", "Luis", "Luke", "Matthew", "Max", "Michael", "Nathan", "Nicholas", "Noah", "Oliver", "Owen", "Parker", 
"Robert", "Ryan", "Samuel", "Sebastian", "Thomas", "Tristan", "William",
"Alexandra", "Alyssa", "Amelia", "Andrea", "Anna", "Ariana", "Arianna", "Bella", "Brooke", "Camille", "Caroline", "Chloe", "Claire", "Elizabeth", "Emma", "Eva", "Evelyn", 
"Gabriela", "Grace", "Hannah", "Isabella", "Jasmine", "Jocelyn", "Jolina", "Julia", "Katherine", "Kylie", "Lauren", "Layla", "Leah", "Lillian", "Lydia", "Madeline", "Maria", 
"Mariah", "Melanie", "Mia", "Naomi", "Natalie", "Olivia", "Samantha", "Sarah", "Sofia", "Stella", "Tina", "Victoria"
);
$name1 = $names[array_rand($names)];
do { $name2 = $names[array_rand($names)]; } while ($name1 === $name2);
$sentence = strtr($entry, ['$name1'=>$name1,'$name2'=>$name2]);
$correct = random_int(0,1) ? 'makapag-iisa' : 'di-makapag-iisa';
$target = '';
$highlight = '';
$parts = preg_split('/(\*[^+]+\+|\[[^\]]+\])/', $sentence, -1, PREG_SPLIT_DELIM_CAPTURE);
foreach ($parts as $part) {
    $kind = substr($part,0,1) === '*' ? 'makapag-iisa' : (substr($part,0,1) === '[' ? 'di-makapag-iisa' : '');
    if ($kind !== '') $part = substr($part,1,-1);
    if ($kind === $correct) { $target = $part; $highlight .= '<strong style="color:#CC0066;">'.sug_h($part).'</strong>'; }
    else $highlight .= sug_h($part);
}
return ['highlight'=>$highlight,'target'=>$target,'correct'=>$correct,'choices'=>['makapag-iisa','di-makapag-iisa'],'exp'=>$correct === 'makapag-iisa' ? 'buo ang diwa nito kahit mag-isa' : 'hindi buo ang diwa nito kung mag-isa','tier'=>$tier,'lvl'=>$lvl,'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && ($_SESSION[$sessionKey]['current']['lvl'] ?? null) === $lvl
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
    $_SESSION[$sessionKey]['current'] = sug_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo $cur['highlight']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Uri ng Sugnay: <span style="color:#CC0066;"><?php echo sug_h(ucfirst($cur['correct'])); ?></span></strong>
        <p style="font-weight:400;"><br/>Ang sugnay na <strong style="color:#CC0066;"><?php echo sug_h($cur['target']); ?></strong> ay <?php echo sug_h($cur['correct']); ?> dahil <?php echo sug_h($cur['exp']); ?>.</p>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.4;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['highlight']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Sabihin kung ang pulang sugnay sa itaas ay makapag-iisa o di-makapag-iisa.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo sug_h(ucfirst($choice)); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php endif; ?>
<p style="font-size:11pt;color:#800080;margin:10px auto;">Gaano kahirap ang gusto mong susunod na tanong?</p>
<label><input type="radio" name="level" value="Easy" <?php echo $lvl === 'Easy' ? 'checked' : ''; ?>> Madali</label>
<label style="margin-left:60px;"><input type="radio" name="level" value="Hard" <?php echo $lvl === 'Hard' ? 'checked' : ''; ?>> Mahirap</label>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
