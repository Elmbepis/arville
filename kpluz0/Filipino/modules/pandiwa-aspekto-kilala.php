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
$moduleTitle = 'Pagkilala sa Aspekto ng Pandiwa';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pak_tier(string $lvl, int $grd): int {
    return ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? 2 : 0);
}
function pak_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
1 => [['Ako ay *kumain+ na.', 0], ['*Pumunta+ si $name1 sa amin.', 0], ['*Nagluto+ si $name1 ng ulam.', 0], ['*Nagising+ na si $name1.', 0], ['Si Nanay ay *nagtimpla+ ng kape.', 0], ['Ako ang *nagluto+ ng adobo.', 0], ['*Narinig+ mo ba ang kulog?', 0], ['*Nadapa+ ang batang nakaputi.', 0], ['*Kinain+ ko ang puto sa plato.', 0], ['*Bumuhos+ ang malakas na ulan.', 0], ['*Nagkita+ kami ni $name1 kahapon.', 0], ['Kanina pa *umalis+ si $name1.', 0], ['*Nabali+ ang sanga ng papaya.', 0], ['*Binasa+ mo ba ang kuwento?', 0], ['*Pumasok+ nang maaga si $name1.', 0], ['*Iniwasan+ niya ang mga kaklase.', 0], ['Si $name1 ay *kumakain+.', 1], ['*Nag-aaral+ si $name1.', 1], ['*Nagbabasa+ si $name1.', 1], ['*Humihingi+ sila ng inumin.', 1], ['Ito ang aklat na *binabasa+ ko.', 1], ['*Nakikinig+ ako sa guro namin.', 1], ['Ang sanggol sa kuna ay *umiiyak+.', 1], ['Si Nanay ay *nagluluto+ ng hapunan.', 1], ['Si $name2 ay *kumukuha+ ng silya.', 1], ['Ang bata ay masayang *naglalaro+.', 1], ['*Nagtatanim+ si $name1 sa bakuran.', 1], ['*Umaawit+ siya tuwing naliligo.', 1], ['*Mag-aaral+ akong magluto.', 2], ['*Magdadala+ si $name1 ng aklat.', 2], ['*Bibili+ kami ng pagkain.', 2], ['Si $name1 ang *kakatok+ sa pinto.', 2], ['Si $name1 ay *sasabay+ sa kanila.', 2], ['Ang iyong ate ay *aalis+ bukas.', 2], ['Sino ang *sasama+ kay Lola?', 2]],
2 => [['Si $name1 ay *bumili+ ng $item $past.', 0], ['*Humiram+ si $name1 ng $item $past.', 0], ['*Sumayaw+ sa entablado ang magkakapatid.', 0], ['Sila ay muling *namasyal+ sa dalampasigan.', 0], ['Si $name1 ay *nanalo+ sa paligsahan.', 0], ['*Nagsipilyo+ ng ngipin si $name1 sa banyo.', 0], ['*Binigyan+ sila ni Nanay ng perang pambaon.', 0], ['Si $name1 ang *nagsulat+ ng liham na ito.', 0], ['*Uminom+ siya ng gamot para sa lagnat.', 0], ['Nagbihis at *nagsuklay+ ng buhok si $name1.', 0], ['Si $name1 ay *nagbiyahe+ patungong Cavite.', 0], ['*Humingi+ ng saklolo ang babaeng ninakawan.', 0], ['Ang mga mag-aaral ay *pumasok+ nang maaga.', 0], ['*Ginamit+ ni $name1 ang mga lapis ko.', 0], ['*Dinalaw+ namin ang aming lolo kahapon.', 0], ['Si $name1 ay *umupo+ sa tabi ni $name2.', 0], ['Ang pusa ay *humiga+ sa ilalim ng mesa.', 0], ['*Kinuha+ ni $name1 ang payong sa sala.', 0], ['*Nawili+ sila sa panonood ng programa.', 0], ['Si $name1 ay *nagkasakit+ ng malarya.', 0], ['*Nagdiriwang+ $now ang kanilang grupo.', 1], ['Si $name1 ay *nagtitinda+ ng kakanin.', 1], ['*Tumatahol+ ang aso ng kapitbahay.', 1], ['*Naghuhugas+ ng mga pinggan si Nanay.', 1], ['*Kumakain+ ng almusal ang ating guro.', 1], ['Si Tatay ay *umiinom+ ng mainit na kape.', 1], ['*Tumatawid+ ako sa tamang tawiran.', 1], ['*Binabasa+ ni Tatay ang pahayagan.', 1], ['Si $name1 ay *nag-aaral+ sa kanyang silid.', 1], ['*Naglalaro+ ang mga bata sa bakuran.', 1], ['Sina $name1 at $name2 ay *naglalaro+.', 1], ['Buksan mo ang pinto dahil may *kumakatok+.', 1], ['Si $name1 ay *kumakain+ ng pansit.', 1], ['Ang masipag na estudyante ay *nagbabasa+.', 1], ['Kanina mo pa ba kami *hinihintay+?', 1], ['Ang bata ay *tumutugtog+ ng gitara.', 1], ['*Bibilhan+ kita ng bagong $item $future.', 2], ['*Bubuksan+ ko na ang mga bintana.', 2], ['*Hihiramin+ ko ang laruan ni $name1.', 2], ['*Tatawid+ tayo kapag berde na ang ilaw.', 2], ['*Dadalhin+ ko bukas ang mga aklat.', 2], ['Ano ang *gagawin+ natin sa klase mamaya?', 2], ['*Magsisimba+ sina Lolo at Lola sa Linggo.', 2], ['Si $name1 ay *maglalaba+ mamayang hapon.', 2]],
3 => [['Si $name1 ay *bumili+ ng $item kay $name2 $past.', 0], ['*Humiram+ si $name1 ng $item kay $name2 $past.', 0], ['*Inilihim+ niya sa akin ang tunay niyang layunin.', 0], ['*Ipinadala+ na namin kahapon ang ulat sa tanggapan.', 0], ['*Pinakain+ ni $name1 ang mga manok sa bakuran.', 0], ['Si $name1 ang *bumili+ ng pagkain para sa aso.', 0], ['*Isinuot+ ni $name1 ang kanyang bagong sapatos.', 0], ['Sina Lolo, Lola, at $name1 ay *sumakay+ sa taksi.', 0], ['*Nag-usap+ na ang mga guro at mga magulang kanina.', 0], ['*Sinundo+ na ni Kuya sina $name1 at $name2.', 0], ['*Nagdulot+ ng malaking baha ang magdamag na ulan.', 0], ['Ang mga kabahayan ay mabilis na *nalubog+ sa baha.', 0], ['*Lumutang+ sa baha ang sari-saring basura.', 0], ['Si $name1 ay *naglilinis+ ngayon sa kuwarto.', 1], ['Si $name1 ay *nag-aalmusal+ $now.', 1], ['*Nagluluto+ ng tanghalian si $name1 $now.', 1], ['Siya ay *nagpapagamot+ sa ospital ng Maynila.', 1], ['*Nakikita+ mo ba ang mga eroplanong iyon?', 1], ['*Tinitiklop+ ni Ate Beth ang mga damit natin.', 1], ['Ang batang pilyo ay *sumisigaw+ nang napakalakas.', 1], ['Nakikinig ka ba sa *sinasabi+ ng iyong guro?', 1], ['*Nagsusulat+ ng isang nobela ang aking tiyo.', 1], ['Ang mga matatanda ay *naglilinis+ sa paligid.', 1], ['Si Ate Martha ay *nagpaplantsa+ ng damit niya.', 1], ['Ang mga bata ay *kumakaway+ habang paalis ang bus.', 1], ['Siya ang suspek na *hinahanap+ ngayon ng mga pulis.', 1], ['Ang sanggol ay *binabantayan+ ni Ate Lucy sa sala.', 1], ['*Dadalhin+ ko $future ang $itemb hinihiram mo.', 2], ['*Babayaran+ ni $name1 si Mang Bert mamaya.', 2], ['*Ipakikilala+ kita sa aking mga kaibigan bukas.', 2], ['*Aakyat+ na ako upang patulugin ang sanggol.', 2], ['*Babantayan+ ko ang mga bata habang wala kayo.', 2], ['Si $name1 ang *magwawalis+ sa sala at mga kuwarto.', 2], ['Sino sa inyo ang *sasayaw+ sa programa?', 2], ['Si $name1 ang *bibili+ ng meryenda sa tindahan.', 2], ['Sa sunod na Linggo pa kami *uuwi+ sa probinsya.', 2], ['Si $name1 ay *pupunta+ sa bahay ni $name2 mamaya.', 2], ['Si $name1 ay *maglalaro+ ng basketbol bukas.', 2], ['Tayo ay *magtatanim+ ng mga gulay sa bakuran.', 2]],
4 => [['Kay $name1 mo ba *hiniram+ ang aklat na binabasa mo?', 0], ['Ang uhaw na atleta ay *uminom+ ng malamig na tubig.', 0], ['Si $name1 ay *nakapasa+ sa pagsusulit ng pagiging nars.', 0], ['*Binanggit+ ba ni $name1 sa iyo kahapon ang plano niya?', 0], ['Ang lalaki ay *sumaklolo+ sa matandang babaeng hinimatay.', 0], ['*Bumili+ ng pandesal si $name1 mula sa tindahan sa kanto.', 0], ['*Ibinahagi+ niya sa amin ang kanyang kaalaman sa pagtatanim.', 0], ['*Naghuhugas+ ng mga pinggan at kubyertos si $name1.', 1], ['*Nagkakasiyahan+ $now ang kanilang grupo sa $place.', 1], ['Si $name1 ay *nag-aalmusal+ $now sa karinderya.', 1], ['Lalong *sumasaya+ ang mga bata kapag kalaro namin sila.', 1], ['Gabi-gabi kaming *nananalangin+ nang mataimtim.', 1], ['Anong gamot ang *iniinom+ mo kapag masakit ang iyong ulo?', 1], ['Laging *ginagabayan+ ng mga magulang ang kanilang mga anak.', 1], ['*Natutuwa+ ako dahil sa wakas ay magkakasama na tayo!', 1], ['Sina $name1 at $name2 ay *nagbibihis+ sa kanilang silid.', 1], ['Pagkatapos kong manood ng teleseryeng ito ay *magsasaing+ na ako.', 2], ['*Ihahanda+ ko na ang lahat ng kasangkapan para sa pagtatanim.', 2], ['*Daragdagan+ ni Tatay ang perang binabaon natin araw-araw.', 2], ['*Patutunayan+ ko na kaya kong pangasiwaan ang proyektong ito.', 2], ['Hayaan mo\'t *bibilhan+ din kita ng bagong $item $future.', 2], ['Si Mang Tonio ang *magbubuhat+ ng mabigat na sako ng bigas.', 2], ['Si $name1 ang *magsasampay+ ng mga damit na nilabhan ko kanina.', 2]],
5 => [['Si $name1 ang *nagtagumpay+ sa paligsahan sa pagsusulat ng tula.', 0], ['Sina $name1 at $name2 ay agad na *nagpaalam+ sa kanilang mga magulang.', 0], ['Nabalitaan kong *nakipagdebate+ ka na naman sa kaibigan mo kanina.', 0], ['Si Lola Isabel ay *nagpatingin+ sa isang dalubhasa sa puso kahapon.', 0], ['*Nilagdaan+ ko na kanina ang mga papeles na iniwan mo sa mesa ko.', 0], ['*Ikinuwento+ ni Aling Nena ang kanyang karanasan bilang nars sa Amerika.', 0], ['Si $name1 ay biglang *hinabol+ ng malikot na aso ng ating kapitbahay.', 0], ['*Nagmadali+ kaming umuwi dahil akala namin ay babagsak ang malakas na ulan.', 0], ['Ang pabrikang pinapasukan ko ay *naghahanap+ ng mga bagong empleyado.', 1], ['Si $name1 ay matiyagang *nagtitinda+ ng iba\'t ibang kakanin sa $place.', 1], ['Ang mga programa ng DOH ay *ipinatutupad+ ng mga lokal na pamahalaan.', 1], ['Alam mo ba kung *nagluluto+ na sina $name1 at $name2 ng tanghalian natin?', 1], ['Araw-araw akong *bumibili+ ng mga sariwang prutas at gulay sa palengke.', 1], ['Bakit hanggang ngayon ay *umaasa+ ka pa rin sa iyong mga magulang?', 1], ['*Pinaglalaruan+ pala ngayon ng mga bata ang kanilang bagong manika.', 1], ['Uuwi na si Tatay mula sa Italy at *susunduin+ namin siya sa paliparan.', 2], ['*Ipapakita+ ko sa\'yo $future ang $itemb hinihiram ko kay $name2.', 2], ['Sino ang *mag-aalaga+ sa mga bata habang nagtatrabaho ka sa Dubai?', 2], ['Kaarawan ni Lola sa Sabado kaya *dadalawin+ natin siya sa Cavite.', 2]],
6 => [['Malinaw na *ipinaliwanag+ ni Gng. Santos ang mga bagong patakaran sa opisina.', 0], ['*Nagalit+ si $name1 sa iyo dahil kinuha mo ang selepono niya nang hindi nagpapaalam.', 0], ['*Ibinenta+ ni $name1 noong isang linggo ang kanyang mga inaning gulay at prutas sa kabukiran.', 0], ['*Pinagkuwentuhan+ na ng magpipinsan kagabi ang kanilang mga nakakatakot na karanasan sa sementeryo.', 0], ['May *nagbanggaan+ palang dalawang kariton sa kanto kaya nagkalat doon ngayon ang sari-saring paninda.', 0], ['*Napagtagumpayan+ ni $name1 ang pinagdaanang kahirapan kaya mariwasa na ngayon ang kanyang buhay.', 0], ['Sina $name1 at $name2 ay kasalukuyang *nag-aaral+ sa Jose Abad Santos Memorial School.', 1], ['Ang matalik na magkaibigan ay *nagtatawanan+ habang ginugunita nila ang kanilang kabataan.', 1], ['Tuwang-tuwa si $name1 habang *ipinakikita+ niya kay $name2 ang mga larawan ng kanyang anak.', 1], ['*Sinusubukan+ kong paganahin ang lumang sasakyan ni $name1 nguni\'t hindi ko ito mapaandar.', 1], ['Natutuwa ako kay $name1 dahil ngayon pa lang ay *nagpapamalas+ na siya ng husay sa pagnenegosyo.', 1], ['Tahimik na *ipinagdarasal+ ngayon ni $name1 ang kaligtasan ng kanyang mga kapatid sa kanilang paglalakbay.', 1], ['Alam mo bang *sumasang-ayon+ pa rin ang mga mamamayan sa panukalang pangkalusugan ng kanilang gobernador?', 1], ['Ito ang mga sangkap na *gagamitin+ ko mamayang gabi sa pagluluto ng kakaibang apritada.', 2], ['*Dadalawin+ nina $name1 at $name2 ang kanilang mga lolo at lola sa Batangas sa darating na Linggo.', 2], ['*Pasasalamatan+ ko ang mga taong tumulong sa akin upang makamit ko ang aking pangarap.', 2], ['*Sasamantalahin+ ko ang magandang pagkakataong ito upang mapapayag ko silang bumili ng ating produkto.', 2], ['Kay $name1 ko *ibibigay+ ang mahalagang katungkulang ito dahil siya lamang ang may sapat na kakayahan.', 2], ['*Pasasalamatan+ ko bukas ang lahat ng mga taong tumulong sa akin upang makamit ko ang karangalang ito.', 2]]];
$names = [0 => ['Adam', 'Alex', 'Angel', 'Ben', 'Carlo', 'Chris', 'Dan', 'David', 'Isaac', 'Jack', 'Jason', 'Jose', 'Jimmy', 'Juan', 'Jose', 'Kevin', 'Lucas', 'Luis', 'Max', 'Nick', 'Robert', 'Sam', 'Tomas', 'Amy', 'Anna', 'Bona', 'Carol', 'Emma', 'Eva', 'Joy', 'Julia', 'Kathy', 'Leah', 'Lina', 'Maria', 'Mely', 'Mia', 'Naty', 'Sara', 'Tina', 'Vicky'], 1 => ['Adam', 'Adrian', 'Alex', 'Alexander', 'Andrew', 'Angelo', 'Benjamin', 'Brandon', 'Caleb', 'Cameron', 'Carlos', 'Carson', 'Carter', 'Charles', 'Christopher', 'Daniel', 'David', 'Diego', 'Dominic', 'Dylan', 'Elijah', 'Ethan', 'Gabriel', 'Hayden', 'Ian', 'Isaac', 'Isaiah', 'Jack', 'Jacob', 'Jaden', 'James', 'Jason', 'Jose', 'John', 'Jonathan', 'Joseph', 'Joshua', 'Juan', 'Julian', 'Justin', 'Kevin', 'Logan', 'Lucas', 'Luis', 'Luke', 'Matthew', 'Max', 'Michael', 'Nathan', 'Nicholas', 'Noah', 'Oliver', 'Owen', 'Parker', 'Robert', 'Ryan', 'Samuel', 'Sebastian', 'Thomas', 'Tristan', 'William', 'Alexandra', 'Alyssa', 'Amelia', 'Andrea', 'Anna', 'Ariana', 'Arianna', 'Bella', 'Brooke', 'Camille', 'Caroline', 'Chloe', 'Claire', 'Elizabeth', 'Emma', 'Eva', 'Evelyn', 'Gabriela', 'Grace', 'Hannah', 'Isabella', 'Jasmine', 'Jocelyn', 'Jolina', 'Julia', 'Katherine', 'Kylie', 'Lauren', 'Layla', 'Leah', 'Lillian', 'Lydia', 'Madeline', 'Maria', 'Mariah', 'Melanie', 'Mia', 'Naomi', 'Natalie', 'Olivia', 'Samantha', 'Sarah', 'Sofia', 'Stella', 'Tina', 'Victoria']];
$items0 = [1 => ['aklat', 'baso', 'bola', 'kama', 'kumot', 'lapis', 'medyas', 'sando', 'tasa'], 2 => ['kaldero', 'kawali', 'kulambo', 'martilyo', 'palanggana', 'pamaypay', 'payong', 'platito']];
$places = ['aplaya', 'bukid', 'hardin', 'palengke', 'simbahan', 'tabing-ilog'];
$pasts = ['kanina', 'kahapon', 'kagabi', 'noong isang linggo', 'noong nakaraang buwan', 'noong isang taon'];
$nows = ['ngayon', 'sa mga oras na ito'];
$futures = ['bukas', 'mamaya', 'mamayang gabi', 'sa susunod na linggo', 'sa susunod na buwan', 'sa darating na linggo', 'sa darating na buwan'];
$tier = pak_tier($lvl, $grd);
function pak_link(string $word): string {
    $last = substr($word, -1);
    return $word . (strpos('aeiou', $last) !== false ? 'ng' : ($last === 'n' ? 'g' : ' na'));
}
function pak_question(array $entry, int $tier, string $lvl, int $grd, array $names, array $items0, array $places, array $pasts, array $nows, array $futures): array {
    $ns = array_values(array_unique($names[$tier === 6 ? 1 : 0]));
    shuffle($ns);
    $items = $items0[$tier <= 3 ? 1 : 2];
    $item = $items[array_rand($items)];
    $sentence = strtr($entry[0], ['$name1'=>$ns[0], '$name2'=>$ns[1], '$item'=>$item, '$itemb'=>pak_link($item), '$place'=>$places[array_rand($places)], '$past'=>$pasts[array_rand($pasts)], '$now'=>$nows[array_rand($nows)], '$future'=>$futures[array_rand($futures)]]);
    if (!preg_match('/^(.*?)\*(.*?)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
    $choices = $grd <= 1 ? ['nagdaan', 'kasalukuyan', 'hinaharap'] : ['pangnagdaan', 'pangkasalukuyan', 'panghinaharap'];
    return ['word'=>pak_h($m[1]).'<strong style="color:#CC0066;">'.pak_h($m[2]).'</strong>'.pak_h($m[3]), 'correct'=>$choices[$entry[1]], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'grade'=>$grd, 'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = pak_question($banks[$tier][$i], $tier, $lvl, $grd, $names, $items0, $places, $pasts, $nows, $futures);
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
            <?php echo $cur['word']; ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo pak_h(ucfirst($cur['correct'])); ?></strong>
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
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang aspekto ng pandiwang kulay pula sa pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pak_h(ucfirst($choice)); ?>
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
