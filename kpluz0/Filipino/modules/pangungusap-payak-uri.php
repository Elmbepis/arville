<?php
// filipino/modules/pangungusap-payak-uri.php
// Five legacy sentence-template banks; four structural categories.

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
$moduleTitle = 'Kayarian ng Payak na Pangungusap';
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
function pay_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Si $name1 ay bumili ng $item1 noong $araw.', 0],
    ['Humiram si $name1 ng $item1 kay $name2.', 0],
    ['Kinain ng malaking agila ang ahas sa damo.', 0],
    ['Nagsusulat ng tula ang mga kamag-aral ko.', 0],
    ['Iniwan ni $name1 ang $item1 sa silid.', 0],
    ['Bumuhos na naman ang malakas na ulan.', 0],
    ['Sina $name1 at $name2 ay bumili ng $item1.', 1],
    ['Humiram sina $name1 at $name2 ng $item1 sa kanya.', 1],
    ['Nakipagkaibigan sa kanila sina $name1 at $name2.', 1],
    ['Sina $name1 at $name2 ay nagulat sa pangyayari.', 1],
    ['Natagpuan sa labas ang $item1 at $item2.', 1],
    ['Si $name1 ay kumain ng tinapay at uminom ng kape.', 2],
    ['Bumili ng $item1 at humiram ng $item2 si $name1.', 2],
    ['Namasyal at kumuha ng mga larawan si Ginoong $surname.', 2],
    ['Si Gng. $surname ay gumawa ng keyk at nagluto ng adobo.', 2],
    ['Si G. $surname ay naglinis at nagkumpuni ng mga gamit.', 2],
    ['Nagbisikleta at lumangoy sina $name1 at $name2.', 3],
    ['Nagpahinga at naglibang sina Mang $boy at Aling $girl.', 3],
    ['Sina Mang $boy at Aling $girl ay nagtipid at nagsikap.', 3],
    ['Si Gng. $surname at ang kanyang anak ay dumalaw at nagbantay.', 3],
],
2 => [
    ['Si Ate $girl ay naghahanap ng trabaho sa siyudad.', 0],
    ['Puno na ng barya ang alkansiyang gawa sa kawayan.', 0],
    ['Ang banal na aklat ng mga Muslim ay ang Koran.', 0],
    ['Pumunta si $name1 sa bahay nina $name2 kanina.', 0],
    ['Nagbisikleta patungo sa palaruan sina $name1 at $name2.', 1],
    ['Ang dyip at traysikel ay nakaparada sa tapat ng simbahan.', 1],
    ['Ang guro at ang mga mag-aaral ay nagpasalamat sa bisita.', 1],
    ['Bumili si $name1 at kanyang asawa ng gamot sa botika.', 1],
    ['Maghihilamos at magsisipilyo muna ang kuya ni $girl.', 2],
    ['Ang pamilya $surname ay kumain sa labas at nanood ng sine.', 2],
    ['Si $name1 ay nagising, bumangon, at dumungaw sa bintana.', 2],
    ['Ang kuya ni $name1 ay naglinis ng kotse at nagdilig sa hardin.', 2],
    ['Bumili ng $item1 at humiram ng $item2 sina $name1 at $name2.', 3],
    ['Si $name1 at ang pamilya $surname ay magsisimba at kakain sa labas.', 3],
    ['Nag-aral na sumayaw at nagsanay sa pag-awit sina $name1 at $name2.', 3],
    ['Nakinig sa radyo at nanood ng telebisyon sina Mang $boy at Aling $girl.', 3],
    ['Nagluto ng sinangag at nagtimpla ng kape sina $name1 at $name2.', 3],
],
3 => [
    ['Naawa si Nicole sa mga taong nasalanta ng dumaang bagyo.', 0],
    ['Dinarayo ng mga dayuhang turista ang mga magagandang tanawin.', 0],
    ['Ang mga bagong dating na turista ay nais magbakasyon sa Boracay.', 0],
    ['Itinago ng ate ni $name1 sa loob ng kabinet ang mga pagkaing de-lata.', 0],
    ['Masigasig nilang ibinalot ang mga pagkain para sa mga nasalanta.', 0],
    ['Sina Mang $boy at Aling $girl ay nangangailangan ng bagong kasambahay.', 1],
    ['Ang kare-kare, sinigang, at adobo ay inihanda para sa mga panauhin.', 1],
    ['Ang tito, tita, at mga pinsan ko ay magbabakasyon daw sa Boracay.', 1],
    ['Nanalo si $name1 at ang kanyang ate sa isang paligsahan noong $araw.', 1],
    ['Ang Bohol, Cebu, at Siquijor ay mga lalawigan sa Visayas.', 1],
    ['Si Lisa ay naglaba ng mga damit at nagplantsa ng mga uniporme.', 2],
    ['Ang mangingisda ay namangka at namingwit sa gitna ng malaking lawa.', 2],
    ['Dahan-dahang yumuko at humingi ng paumanhin ang batang nang-agaw ng laruan.', 2],
    ['Ako ay nagbaon ng malaking payong at nagsuot ng makapal na dyaket kagabi.', 2],
    ['Ang aso at pusa ay kumain ng mga tira at natulog nang matagal sa bakuran.', 3],
    ['Sa bukirin itinanim at namunga ang mga puno ng niyog at mga halamang-gamot.', 3],
    ['Sumayaw ng tinikling at umawit ng kundiman sina $name1 at $name2 noong $araw.', 3],
    ['Agaran nilang winalis at nilampaso ang maruming sala at magulong kusina.', 3],
],
4 => [
    ['May disiplina dapat ang sinumang nagmamaneho ng isang pampublikong sasakyan.', 0],
    ['Matiyagang pinaputi ni Aling $girl ang mga uniporme ng kanyang tatlong anak.', 0],
    ['Ang aming mga kamag-anak sa lalawigan ng Cavite ay dumalaw sa amin noong $buwan.', 0],
    ['Ang kaibigang tsuper ni $name1 ay maghahatid ng sampung mang-aawit sa Cavite bukas.', 0],
    ['Ang posporo at papel ay mga halimbawa ng mga bagay na nagmumula sa mga punongkahoy.', 1],
    ['Nakatira sa isang subdibisyong malapit lang dito sina Lolo $boy at Lola $girl.', 1],
    ['Si $name1 at ang kanyang pinsang si $name2 ay bumili ng sabong panlaba sa tindahan.', 1],
    ['Nag-agawan sa karneng itinapon ni $name1 ang asong itim at ang pusang puti.', 1],
    ['Si Ginoong $surname ay dumaan sa opisina at nakipag-usap sa kanyang mga empleyado.', 2],
    ['Nanalo sa paligsahan at tumanggap ng gantimpala ang pinakamahusay na mang-aawit.', 2],
    ['Kami ay lumibot sa Palawan at kumuha ng maraming larawan ng iba\'t ibang hayop.', 2],
    ['Laging nanonood ng telebisyon at nakikinig sa radyo ang mahal na kabiyak ni $name1.', 2],
    ['May magandang kalooban at laging mapagkakatiwalaan si $girl at ang kanyang kambal na si $boy.', 3],
    ['Sina $name1 at $name2 ay sumakay ng dyip at bumaba sa harap ng Simbahan ng Quiapo.', 3],
    ['Pumunta sa istasyon at sumakay ng tren si $name1 at ang kanyang kamag-aral.', 3],
    ['Naglako ng mga kakanin at nangalakal ng mga bote at papel si $name1 at ang kanyang kaibigan.', 3],
],
5 => [
    ['Malinaw na ipinaliwanag ng punong guro sa mga magulang ang mga bagong patakaran sa paaralan.', 0],
    ['Naglunsad ng isang proyektong mangangalaga sa kalikasan ang kanyang matalik na kaibigan.', 0],
    ['Nag-eensayo araw-araw ang mga estudyanteng magtatanghal sa darating na pagdiriwang.', 0],
    ['Talagang mahusay magpaliwanag ng mga konseptong may kinalaman sa teknolohiya si $name1.', 0],
    ['Pinag-usapan ng magpipinsan kagabi ang kanilang nakakatakot na karanasan sa sementeryo.', 0],
    ['Ang mang-aawit at ang kanyang gitarista ay nag-ensayo nang matagal para sa kanilang pagtatanghal.', 1],
    ['Itinuturing na kabilang sa mga pinakatanyag na lungsod sa buong mundo ang Tokyo at ang London.', 1],
    ['Nagkuwentuhan nang matagal sa hardin kaninang umaga ang guro at ang kanyang mga estudyante.', 1],
    ['Si $name1 at ang kanyang kalabang pinuno ay nagkasundong isantabi muna ang hidwaan sa pagitan ng kanilang mga pangkat.', 1],
    ['Ang ating mga ninuno ay sumamba sa kalikasan at naniwala sa isang diyos na tinawag nilang \'Bathala\'.', 2],
    ['Namasyal sa museo at kumain sa isang marangyang restawran ang mga kaibigan ni $name1 noong nakaraang $araw.', 2],
    ['Ang alagang kalabaw nina $name1 at $name2 ay dinala kanina sa palengke at ibinenta sa isang negosyante.', 2],
    ['Nakapagtapos ng pag-aaral at nakakuha ng magandang trabaho sa ibang bansa ang kaisa-isang anak ni $name1.', 2],
    ['Nailigtas mula sa sunog at muling napakinabangan ang mga damit at ilang kasangkapan ni Aling $girl.', 3],
    ['Si Ginang $surname at ang kanyang tatlong anak ay pumunta sa groto at nag-alay ng mga bulaklak sa imahen.', 3],
    ['Sina $name1 at $name2 ay nagbasa ng sari-saring pahayagan at nagsagawa ng malalim na pagsasaliksik.', 3],
    ['Si $name1 at ang pinsan niyang si $name2 ay namili ng mga sangkap sa palengke at nagluto ng masarap na adobo.', 3],
],
];
$banks = [$tier => []];
foreach ($tiers as $t) foreach ($sourceBanks[$t] as $sentence) $banks[$tier][] = $sentence;
function pay_question(array $entry, string $tier, string $lvl): array {
$names = array(
"Adam", "Adrian", "Alex", "Andrew", "Angelo", "Carlos", "Carson", "Chris", "Daniel", "David", "Diego", "Domeng", "Elijah", "Ethan", "Gabriel", "Hayden", 
"Ian", "Isaac", "Isaiah", "Jack", "Jacob", "James", "Jason", "Jose", "John", "Jonathan", "Joseph", "Joshua", "Juan", "Julian", "Justin", "Kevin", "Lucas", 
"Luis", "Luke", "Matthew", "Max", "Michael", "Nathan", "Noah", "Oliver", "Robert", "Ryan", "Samuel", "Tristan", "William",
"Alyssa", "Amelia", "Andrea", "Anna", "Bella", "Chloe", "Claire", "Eliza", "Emma", "Eva", "Evelyn", "Gabriela", "Grace", "Hannah", "Isabel", "Jasmine", 
"Jocelyn", "Jolina", "Julia", "Kylie", "Lauren", "Layla", "Leah", "Lillian", "Lydia", "Maria", "Melanie", "Mia", "Naomi", "Olivia", "Sarah", "Sophia", 
"Stella", "Tina", "Victoria"
);
$boys = array("Alex", "Ben", "Carlos", "Daniel", "Diego", "Gabriel", "Isaac", "Jaime", "Jose", "Juan", "Jonathan", "Lucas", "Luis", "Max", "Roberto", "Samuel", "Tomas",);
$girls = array("Annie", "Betty", "Caring", "Elisa", "Emma", "Eva", "Evelyn", "Grace", "Josie", "Julie", "Katring", "Laura", "Lydia", "Maring", "Olive", "Tina", "Toyang");
$surnames = array(
"Cruz","de Guzman","Gomez","Luciano","Miranda","Padua","Santos","Ramos","Reyes","Tolentino","Torres",
);
$items = array(
"aklat","baso","bola","kaldero","kama","kawali","kulambo","kumot","lapis","martilyo","medyas","palanggana","pamaypay","payong","platito","sando","tasa"
);
$araws = array("Lunes","Martes","Miyerkules","Huwebes","Biyernes","Sabado","Linggo");
$buwans = array("Enero","Pebrero","Marso","Abril","Mayo","Hunyo","Hulyo","Agosto","Setyembre","Oktubre","Nobyembre","Disyembre");
$name1 = $names[array_rand($names)];
do { $name2 = $names[array_rand($names)]; } while ($name1 === $name2);
$item1 = $items[array_rand($items)];
do { $item2 = $items[array_rand($items)]; } while ($item1 === $item2);
$sentence = strtr($entry[0], ['$name1'=>$name1,'$name2'=>$name2,'$item1'=>$item1,'$item2'=>$item2,'$boy'=>$boys[array_rand($boys)],'$girl'=>$girls[array_rand($girls)],'$surname'=>$surnames[array_rand($surnames)],'$araw'=>$araws[array_rand($araws)],'$buwan'=>$buwans[array_rand($buwans)]]);
$choices = ['payak na simuno at payak na panaguri', 'tambalang simuno at payak na panaguri', 'payak na simuno at tambalang panaguri', 'tambalang simuno at tambalang panaguri'];
return ['highlight'=>pay_h($sentence),'correct'=>$choices[$entry[1]],'choices'=>$choices,'tier'=>$tier,'lvl'=>$lvl,'qid'=>bin2hex(random_bytes(16))];
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
    $byCategory = [];
    foreach ($available as $index) $byCategory[$banks[$tier][$index][1]][] = $index;
    $group = $byCategory[array_rand($byCategory)];
    $i = $group[array_rand($group)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pay_question($banks[$tier][$i], $tier, $lvl);
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
        <strong>Kayarian: <span style="color:#CC0066;"><?php echo pay_h(ucfirst($cur['correct'])); ?></span></strong>
        <p style="font-weight:400;"><br/>Ang payak na pangungusap na ipinakita ay may <?php echo pay_h($cur['correct']); ?>.</p>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['highlight']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Piliin ang kayarian ng payak na pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:550px;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo str_replace(' at ', ',<br>', pay_h(ucfirst($choice))); ?>
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
