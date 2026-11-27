<?php
// filipino/modules/kono-denotasyon.php
// Static contextual meaning questions; custom highlighted expressions.

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
$moduleTitle = 'Konotasyon at Denotasyon';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$lvl = $_POST['level'] ?? ($_SESSION['level'] ?? 'Easy');
if (!in_array($lvl, ['Easy','Hard'], true)) $lvl = 'Easy';
$_SESSION['level'] = $lvl;
$tier = $lvl;
function kay_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
'Easy' => [
    ['*Agaw-dilim+ na nang makabalik si Ben sa bahay na kanyang inuupahan.', 'k', 'malapit nang gumabi', 'pasikat na ang araw', 'tanghaling tapat', 'maulap o bumabagyo'],
    ['Ang pamilya Arzon ang tanging *gintong kutsara+ sa ating barangay.', 'k', 'mayamang angkan', 'makintab na kubyertos', 'mamahaling bagay', 'maliit sa paningin'],
    ['Ang *papel+ niya sa dula-dulaan ay nakaaliw nang husto sa mga manonood.', 'k', 'katauhang ginampanan', 'pangingialam', 'bagay na sinusulatan', 'manipis na bagay'],
    ['*Binobola+ na naman ni Alex ang tindera sa palengke kanina.', 'k', 'niloloko o inuuto', 'iniinis', 'tinuturuan ng kasamaan', 'nilalait'],
    ['*Busilak ang puso+ ng aming matandang kapitbahay.', 'k', 'mabait sa kapwa', 'mapagkunwari', 'mapang-api sa kapwa', 'hambog o mayabang'],
    ['Dahil sa isang *ahas+ na kasapi, nasira ang malalim na pagkakaibigan ng mga magbabarkada.', 'k', 'taksil na tao', 'reptilyang mahaba', 'mabangis na hayop', 'taong payat at matangkad'],
    ['Halos *buto\'t balat+ na ang batang nawawala nang matagpuan ito ng mga otoridad.', 'k', 'labis ang kapayatan', 'matigas ang mga buto', 'may sakit sa balat', 'kulang sa tangkad'],
    ['Hindi siya kinikibo ng kanyang mga kasama sa koponan dahil *buwaya+ siya sa bola.', 'k', 'sakim o hindi nagpapasa ng bola', 'tamad at walang gana', 'hindi mahusay maglaro', 'sinungaling'],
    ['Huwag kang sumali sa usapan namin dahil may *gatas ka pa sa labi+.', 'k', 'bata pa at walang muwang', 'hindi nakatapos ng pag-aaral', 'kaiinom pa lang ng gatas', 'hindi mapagkakatiwalaan'],
    ['Huwag mo sanang ituloy ang iyong *maitim na balak+ dahil maaari mo itong ikapahamak.', 'k', 'masamang plano', 'matayog na pangarap', 'pagtatago sa dilim', 'pagsusuot ng itim'],
    ['Ipapasyal kita sa Amerika at Europa *kapag pumuti na ang uwak+.', 'k', 'imposibleng mangyari', 'pambihirang uri ng ibon', 'matayog na pangarap', 'madaling kamtan'],
    ['Itinuring silang *hampas-lupa+ ng mga mapagmalabis nilang amo noon.', 'k', 'salat at walang silbi', 'nag-aararo sa bukid', 'masama ang budhi', 'matapobre'],
    ['Mahilig sa *basag-ulo+ si Mang Paquito kaya madalas siyang ireklamo.', 'k', 'pakikipag-away', 'masamang bisyo', 'mapanganib na gawain', 'paggawa ng krimen'],
    ['Palaging *amoy pinipig+ ang kaibigan nilang si Julie.', 'k', 'mabango', 'mabaho', 'may dalang pinipig', 'mahilig sa pinipig'],
    ['*Sisiw+ lang para kay Vien ang pagsusulit nila sa agham kahapon.', 'k', 'madaling gawin', 'mahirap tapusin', 'kailangan ng tiyaga', 'bagong pisang anak ng manok'],
    ['Marami silang biniling *sisiw+ para sa sisimulan nilang manukan.', 'd', 'bagong pisang anak ng manok', 'madaling gawin', 'mahirap o nakalilito', 'kailangan ng tiyaga'],
    ['Muntik nang masakmal ng *buwaya+ ang baguhang tagapag-alaga nito.', 'd', 'reptilyang may malaking bibig', 'gahaman sa pera', 'hindi mapagkakatiwalaan', 'tamad at walang silbi'],
    ['Huwag kang lalapit sa *ahas+ na iyan upang hindi ka matuklaw.', 'd', 'reptilyang mahaba', 'taksil na tao', 'taong payat', 'mapanganib na tao'],
    ['Bibigyan ka namin ng *papel+ at lapis upang mailista mo ang mga panauhin.', 'd', 'bagay na sinusulatan', 'katauhang ginagampanan', 'mahalagang katungkulan', 'hanapbuhay'],
    ['Iwasan mo ang *kamay na bakal+ ni Mang Inggo.', 'k', 'pagkamahigpit', 'pagkakuripot', 'pagkamapagbigay', 'pagkamaunawain'],
    ['Di makasunod sa tugtugin si Amboy dahil parehong *kaliwa ang kanyang mga paa+.', 'k', 'hindi marunong sumayaw', 'mabilis tumakbo', 'may kapansanan sa paa', 'hindi makalakad'],
    ['Nagkaroon si Aling Maring ng *pusong bato+ mula nang mabigo siya sa larangan ng pag-ibig.', 'k', 'walang habag', 'sakit sa puso', 'malalang karamdaman', 'galit sa kalalakihan'],
    ['Hindi porke\'t mahirap lang si Roque ay *asal-hayop+ na siya.', 'k', 'masama ang ugali', 'mapagkumbaba', 'mabangis', 'walang ambisyon'],
    ['Ang aking aso ay *sumakabilang-buhay+ kanina kaya malungkot ako.', 'k', 'pumanaw na', 'nagkasakit', 'napilayan', 'nawala'],
    ['*Perlas+ ang kanyang balat na nakakaakit.', 'k', 'makinis', 'magaspang', 'maitim', 'malambot'],
    ['Ang bunso kong kapatid ay *nagsusunog ng kilay+ sa mga oras na ito.', 'k', 'nag-aaral nang mabuti', 'nagpapahinga', 'nagpapaganda', 'nanonood ng TV'],
],
'Hard' => [
    ['Huwag kang maniwala sa kanila dahil *kuwentong kutsero+ lamang ang lahat ng narinig mo.', 'k', 'tsismis na hindi totoo', 'mainit na balita', 'malalim na paniniwala', 'labis na paninira'],
    ['May *pangangatawang kawayan+ si Annie kaya hindi siya maaaring gumanap bilang \'Dabiana\' sa dulang iyon.', 'k', 'payat o balingkinitan', 'punong maganit ang kahoy', 'matangkad o matayog', 'masasakitin'],
    ['Marami ang naghihinalang *bilang na ang araw+ ni Aling Linda batay sa lagay ng kanyang kalusugan.', 'k', 'malapit nang pumanaw', 'paalis na sa lugar', 'malapit nang gumaling', 'malapit na ang kaarawan'],
    ['*Butas ang bulsa+ ni Mang Cesar kaya hindi siya agad nakabayad ng kuryente at tubig.', 'k', 'walang pera', 'kuripot', 'may punit ang bulsa', 'tumatakas sa responsibilidad'],
    ['Nakailang ulit na siya sa kanyang pagbasa; parang *sirang plaka+ na ang ating kasama ngayon.', 'k', 'paulit-ulit', 'hindi maintindihan', 'nalilito', 'maingay'],
    ['Nagmistulang *basang sisiw+ si George nang mawalay sa kanyang mga magulang.', 'k', 'kawawa', 'maysakit', 'nanghihina', 'matatakutin'],
    ['Naglipana ang mga *buwaya+ sa ahensiyang iyon kaya mag-iingat ka roon.', 'k', 'tiwaling opisyal', 'malupit na tao', 'pangit na nilalang', 'mabangis na reptilya'],
    ['Wala akong magagawa sa kanilang desisyon dahil ako\'y *anak-pawis+ lamang.', 'k', 'mababang manggagawa', 'masipag', 'walang kapangyarihan', 'mahina ang pag-iisip'],
    ['Madalas malinlang si Avril dahil siya ay *pusong-mamon+.', 'k', 'mahabagin', 'magastos', 'mapagmataas', 'walang pakialam'],
    ['Huwag si Gaston ang kunin mong tindero dahil *bantay-salakay+ raw ang taong iyan.', 'k', 'traydor', 'mapangahas', 'magagalitin', 'mahilig sa basag-ulo'],
    ['Naiinis si Aling Puring sa kanyang dalagitang anak dahil madalas itong *magtaingang-kawali+ sa kanya.', 'k', 'magbingi-bingihan', 'mang-inis', 'magtago', 'magpalusot'],
    ['Mabuti naman at *bukas ang isip+ ni Abel tungkol sa usaping iyan.', 'k', 'tanggap ang opinyon ng iba', 'hindi nakikinig', 'malalim magpaliwanag', 'maraming alam'],
    ['Hindi ka maaaring maging pulitiko kung ikaw ay *balat-sibuyas+.', 'k', 'madamdamin', 'masayahin', 'walang pakialam', 'masakitin'],
    ['Ayon sa balita, *nagpantay na ang mga paa+ ng pusakal na kriminal kaninang madaling araw.', 'k', 'pumanaw', 'nagkasakit', 'nakatakas', 'nahuli'],
    ['*Nagpantay na ang mga paa+ ni Rudy matapos siyang operahan.', 'd', 'naging magkasukat ang mga paa', 'pumanaw', 'bumilis tumakbo', 'nagkasakit'],
    ['Hindi ako makapaniwalang *di-makabasag-pinggan+ ang dalagang anak ni Mang Miling.', 'k', 'mahinhin kumilos', 'labis ang pagkamaingat', 'masipag sa kusina', 'sobrang tamad'],
    ['Natagpuan ko sa Facebook ang *kahiramang-suklay+ ko noong nasa ikatlong baitang pa lamang ako.', 'k', 'kaibigan', 'kamag-anak', 'kakilala', 'kapitbahay'],
    ['Nagtrabaho bilang *alilang-kanin+ si Andoy sa Palawan nang higit sa dalawang taon.', 'k', 'walang bayad ngunit pakain', 'may mabigat na responsibilidad', 'di makakain sa sobrang abala', 'kusinero'],
    ['*Bungang-tulog+ lamang pala ang mga karangyaang aking naranasan kani-kanina lamang.', 'k', 'panaginip', 'malik-mata', 'mithiin', 'imahinasyon'],
    ['*Basa na ang papel+ ng senador na iyon matapos mapatunayang kinurakot niya ang kanyang \'pork barrel\'.', 'k', 'sira na ang reputasyon', 'mabibilanggo', 'papatawan ng parusa', 'nagsisisi na'],
    ['*Basa na ang papel+ na ito nang madatnan ko sa harap ng ating bahay.', 'd', 'papel na nabasa ng tubig', 'sira na ang reputasyon', 'papatawan ng parusa', 'papel na napunit'],
    ['*Bukal sa kalooban+ ni Ginoong Martin ang pagtulong sa mga dukha kaya palagi siyang pinagpapala.', 'k', 'taos sa puso', 'malaki ang ginagastos', 'walang tigil', 'paulit-ulit'],
    ['Tuwing nakikita ng binata si Chloe ay *dinadaga+ ito.', 'k', 'kinakabahan', 'nalilito', 'nalulungkot', 'binabagabag'],
],
 ];
function kay_question(array $entry, string $tier, string $lvl): array {
    preg_match('/\*([^+]+)\+/', $entry[0], $m);
    $highlight = preg_replace('/\*([^+]+)\+/', '<span style="color:#CC0066;">$1</span>', kay_h($entry[0]));
    $choices = array_slice($entry, 2);
    shuffle($choices);
    return ['highlight'=>$highlight,'target'=>$m[1],'kind'=>$entry[1]==='k'?'konotasyon':'denotasyon','correct'=>$entry[2],'choices'=>$choices,'tier'=>$tier,'lvl'=>$lvl,'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = kay_question($banks[$tier][$i], $tier, $lvl);
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
<strong><?php echo kay_h(ucfirst($cur['kind'])); ?>: <span style="color:#CC0066;"><?php echo kay_h(ucfirst($cur['correct'])); ?></span></strong>
<p style="font-weight:400;margin:30px auto 0;">Ang <?php echo kay_h($cur['kind']); ?> ng katagang <strong style="color:#CC0066;"><?php echo kay_h($cur['target']); ?></strong> sa pangungusap ay <?php echo kay_h($cur['correct']); ?>.</p>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.4;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['highlight']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Piliin ang <span style="color:#CC0066;"><?php echo kay_h($cur['kind']); ?></span> ng katagang kulay pula sa pangungusap batay sa kontekstong kinapapalooban nito.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:450px;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo kay_h(ucfirst($choice)); ?>
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
