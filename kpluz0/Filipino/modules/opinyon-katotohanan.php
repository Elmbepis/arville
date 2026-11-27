<?php
// filipino/modules/opinyon-katotohanan.php
// Five legacy statement banks.

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
$moduleTitle = 'Opinyon at Katotohanan';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$baseTier = $grd <= 5 ? 1 : ($grd <= 7 ? 2 : 3);
$tiers = $lvl === 'Easy' ? [$baseTier] : ($grd <= 1 ? [2] : [$baseTier+1, $baseTier+2]);
$tier = implode('-', $tiers);
function ok_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Ang dalag at hito ay mga uri ng isda.', 'katotohanan', 1],
    ['Ang <i>Grand Canyon</i> ay nasa Estados Unidos.', 'katotohanan', 1],
    ['Ang kabisera ng Pilipinas ay Maynila.', 'katotohanan', 1],
    ['Ang karaniwang tao ay may dalawang kamay.', 'katotohanan', 1],
    ['Galing lamang sa araw ang liwanag ng buwan.', 'katotohanan', 1],
    ['Hindi lahat ng halaman ay namumulaklak.', 'katotohanan', 1],
    ['Ipinanganak si Henry Ford noong taong 1863.', 'katotohanan', 1],
    ['Lahat ng ibon sa mundo ay may balahibo.', 'katotohanan', 1],
    ['Mas mahaba ang Ilog Cagayan kaysa Ilog Agno.', 'katotohanan', 1],
    ['Mas malaki ang elepante kaysa sa bubuyog.', 'katotohanan', 1],
    ['Mas malayo ang Cebu sa Maynila kaysa Cavite.', 'katotohanan', 1],
    ['Maraming sakit ang galing sa mga mikrobyo.', 'katotohanan', 1],
    ['Nasa timog ng Pilipinas ang Indonesia.', 'katotohanan', 1],
    ['Sa Asya matatagpuan ang bansang Pilipinas.', 'katotohanan', 1],
    ['Taong 1912 nang lumubog ang barkong Titanic.', 'katotohanan', 1],
    ['Walo ang planeta sa ating <i>solar system</i>.', 'katotohanan', 1],
    ['Ang paborito kong prutas ay saging.', 'opinyon', 1],
    ['Masakit makakita ng mga hayop na nakakulong.', 'opinyon', 1],
    ['Higit na matalino si Kulas kaysa kay Pedro.', 'opinyon', 1],
    ['Hindi masaya ang ating pagtitipon kagabi.', 'opinyon', 1],
    ['Lila ang pinakamagandang kulay sa lahat.', 'opinyon', 1],
    ['Mas gusto ko ang tag-araw kaysa sa tag-ulan.', 'opinyon', 1],
    ['Mas gusto kong makipaglaro sa pusa kaysa aso.', 'opinyon', 1],
    ['Mas madaling kumanta kaysa sumayaw.', 'opinyon', 1],
    ['Mas masarap ang lansones kaysa sa mangga.', 'opinyon', 1],
    ['Mas sulit bumili ng bibingka kaysa sa puto.', 'opinyon', 1],
    ['Masyadong matamis ang gulaman sa pitsel.', 'opinyon', 1],
    ['Nakakatakot mag-aral magpalipad ng eroplano.', 'opinyon', 1],
    ['Napakaanghang naman ng niluto mong ulam.', 'opinyon', 1],
    ['Pinakamasarap ang nilutong adobo ni Vangie.', 'opinyon', 1],
    ['Si Liza ang pinakamabait nating kamag-aral.', 'opinyon', 1],
    ['Si Rex ay mas mahusay mamuno kaysa kay Tom.', 'opinyon', 1],
],
2 => [
    ['Ang <i>Angel Falls</i> ang pinakamataas na talon sa buong mundo.', 'katotohanan', 2],
    ['Ang Asya ang pinakamalaking kontinente sa daigdig.', 'katotohanan', 2],
    ['Ang Lawa ng Laguna ang pinakamalaking lawa sa Pilipinas.', 'katotohanan', 2],
    ['Ang loro, kuwago, at kalapati ay mga uri ng ibon.', 'katotohanan', 2],
    ['Ang <i>Mona Lisa</i> ay ipininta ni Leonardo da Vinci.', 'katotohanan', 2],
    ['<i>Chanos chanos</i> ang siyentipikong pangalan ng bangus.', 'katotohanan', 2],
    ['Higit na sa 100 milyon ang populasyon ng Pilipinas.', 'katotohanan', 2],
    ['Higit sa 1,600 templo ang matatagpuan sa Kyoto sa bansang Hapon.', 'katotohanan', 2],
    ['Hunyo 19, 1861 ang araw ng kapanganakan ni Dr. Jose Rizal.', 'katotohanan', 2],
    ['Mas malaki ang asong doberman kaysa sa asong shih-tzu.', 'katotohanan', 2],
    ['Mas malapit sa araw ang Mercury kaysa sa Saturn.', 'katotohanan', 2],
    ['Mas mataas ang Bundok Apo kaysa sa Bulkang Taal.', 'katotohanan', 2],
    ['Nasa Asya ang mga bansang Hapon, Vietnam, at Tsina.', 'katotohanan', 2],
    ['Si Julian Felipe ang kompositor ng pambansang awit ng Pilipinas.', 'katotohanan', 2],
    ['Ang mga numerong 4 at 13 ay hindi masuwerte para sa akin.', 'opinyon', 2],
    ['Ang ahedres ang pinakamainam na laro para sa mga bata.', 'opinyon', 2],
    ['Ang araling panlipunan ang pinakaayaw kong paksa sa paaralan.', 'opinyon', 2],
    ['Ang Lawa ng Taal ang pinakamagandang lawa sa ating bansa.', 'opinyon', 2],
    ['Ang pag-aalaga ng mga langgam o gagamba ay hindi nakalilibang.', 'opinyon', 2],
    ['Bukod sa mura na ay masarap pa ang pamumuhay rito sa Pilipinas.', 'opinyon', 2],
    ['Dapat na nating palitan ang pangalan ng Pilipinas.', 'opinyon', 2],
    ['Hindi natin dapat ikinukulong sa hawla ang mga ibon.', 'opinyon', 2],
    ['Lahat ng sineng dinirekta ni Steven Spielberg ay maganda.', 'opinyon', 2],
    ['Likas sa mga Pilipino ang pagiging magaling kumanta.', 'opinyon', 2],
    ['Mas gusto kong gamitin ang selepono kaysa sa kompyuter.', 'opinyon', 2],
    ['Mas mainam manirahan sa Singapore kaysa sa Hapon.', 'opinyon', 2],
    ['Mas masarap na palaman sa pandesal ang keso kaysa sa mantikilya.', 'opinyon', 2],
    ['Si Spongebob ang pinakanakakatawang karakter sa telebisyon.', 'opinyon', 2],
],
3 => [
    ['Ang agilang Pilipino o haribon ay isa sa pinakamalalaking agila sa buong mundo.', 'katotohanan', 3],
    ['Ang agilang Pilipino (Pithecophaga jefferyi) ay kilala rin sa tawag na haribon.', 'katotohanan', 3],
    ['Ang malakas na pagsabog ng Bundok Pinatubo ay naganap noong Hunyo 15, 1991.', 'katotohanan', 3],
    ['Ang pag-ikot ng planetang Jupiter sa aksis nito ay tumatagal lamang nang 9.9 oras.', 'katotohanan', 3],
    ['Ang panahon ng <i>Renaissance</i> sa Europa ay naganap bandang mga taong 1300-1600 AD.', 'katotohanan', 3],
    ['Ang Pilipinas ay may kabuuang populasyon na higit na sa 100 milyong katao.', 'katotohanan', 3],
    ['Lahat ng ibon ay may pakpak, ngunit hindi lahat sa kanila ay nakalilipad.', 'katotohanan', 3],
    ['Si Pangulong Gloria Arroyo ang sinundang pangulo ni Pangulong Benigno Aquino III.', 'katotohanan', 3],
    ['Nagdeklara ang Alemanya ng digmaan laban sa Rusya noong Agosto 1, 1914.', 'katotohanan', 3],
    ['Pangalawang pinakamalaking planeta sa ating sistemang solar ang Saturn.', 'katotohanan', 3],
    ['Sinakop at pinamahalaan ng mga Espanyol ang Pilipinas sa loob ng 333 taon.', 'katotohanan', 3],
    ['Higit sa 330 bilyong dolyar ang <i>Gross Domestic Product</i> ng Pilipinas noong 2018.', 'katotohanan', 3],
    ['Ang Beatles ang pinakamagaling na banda sa buong kasaysayan ng musika.', 'opinyon', 3],
    ['Ang pag-aalaga ng aso o pusa ang pinakamainam na pantanggal ng pagod.', 'opinyon', 3],
    ['Ang Pilipinas ang dapat panirahan ng mga dayuhan matapos nilang magretiro.', 'opinyon', 3],
    ['Ang pinakamagandang dalampasigan sa buong mundo ay matatagpuan sa Pilipinas.', 'opinyon', 3],
    ['Bumili ka muna sana ng sarili mong bahay bago ka bumili ng ganyang kagarang kotse.', 'opinyon', 3],
    ['Hindi ka na dapat lumabas sa oras na ito dahil gumagala na ang mga aswang.', 'opinyon', 3],
    ['Hindi sapat ang ginagawa ng sangkatauhan upang pigilan ang pag-init ng daigdig.', 'opinyon', 3],
    ['Mahalagang matutunan at sundin ng mga Pilipino ang mga pamahiin ng ating lahi.', 'opinyon', 3],
    ['Mas dapat unahing paunlarin ng pamahalaan ang agrikultura kaysa sa industriya.', 'opinyon', 3],
    ['Mas madaling magbasa ng mga balita sa internet kaysa bumili pa ng pahayagan.', 'opinyon', 3],
    ['Mas madaling magnegosyo kaysa mamasukan sa isang kumpanya kung mayroon kang puhunan.', 'opinyon', 3],
    ['Napapanahon nang pahintulutang makaboto ang mga kabataang may edad 15 pataas.', 'opinyon', 3],
],
4 => [
    ['Ang bansang tinatawag natin ngayong Turkey ay nagmula sa Imperyo ng Ottoman at naisarepublika noong 1923.', 'katotohanan', 4],
    ['Ang Pilipinas ay ipinangalan sa karangalan ni Haring Felipe II ng Espanya noong ika-16 na siglo.', 'katotohanan', 4],
    ['Ang <i>Rafflesia arnoldii</i> na siyang pinakamalaking bulaklak sa buong mundo ay matatagpuan sa Indonesia.', 'katotohanan', 4],
    ['Ayon sa mga pag-aaral, ang Hapon ang may pinakamaraming naitatalang lindol sa buong mundo.', 'katotohanan', 4],
    ['Itinatag ang Unibersidad ng Santo Tomas noong 1611 kaya mas matanda ito sa Harvard na itinatag noong 1636.', 'katotohanan', 4],
    ['Katolisismo ang pananampalataya ng mahigit sa 86 porsyento ng kabuuang populasyon ng Pilipinas.', 'katotohanan', 4],
    ['Mamula-mulang kahel ang kulay ng planetang Mars dahil mayaman ang mga lupain nito sa kalawang.', 'katotohanan', 4],
    ['Nahalal si Pangulong Ferdinand Marcos noong 1965 at idineklara niya ang batas militar noong 1972.', 'katotohanan', 4],
    ['Sa bilang na pito laban sa lima, mas maraming bulkan sa lalawigang isla ng Camiguin kaysa sa mga bayan.', 'katotohanan', 4],
    ['Si Carlos P. Romulo na isang Pilipino ang kauna-unahang Asyanong naging pangulo ng Pangkalahatang Asembleya ng <i>United Nations</i>.', 'katotohanan', 4],
    ['Tinanggal ni Papa Gregory VII ang <i>lay investiture</i> bilang karapatan ng mga hari noong 1078 AD.', 'katotohanan', 4],
    ['Ang mga palabas sa tsanel na ito ay mas nakakaaliw kaysa sa mga palabas sa kabilang tsanel.', 'opinyon', 4],
    ['Ang <i>mimicry</i> o panggagaya ng mga hayop sa anyo ng ibang nilalang ay nakakaaliw pag-aralan.', 'opinyon', 4],
    ['Ang pakiwari ko ay malapit nang mahigitan ng basketbol ang putbol bilang pinakagigiliwang laro sa Asya.', 'opinyon', 4],
    ['Ang pananakop ng mga Espanyol sa Pilipinas gamit ang relihiyon at dahas ay dapat nating ibaon sa limot.', 'opinyon', 4],
    ['Hindi dapat pahintulutan ang mga kabataang magkaroon ng sariling selepono at koneksyon sa internet.', 'opinyon', 4],
    ['Kaming mga mag-aaral dito sa Amerika ay naniniwalang dapat ipagbawal ang pagbibigay ng takdang-aralin.', 'opinyon', 4],
    ['Maraming nagsasabing naimbento ang yoyo sa Pilipinas pero ang aking hinuha ay hindi ito totoo.', 'opinyon', 4],
    ['Mas mainam bumili ng mamahaling sapatos na matibay kaysa sa sapatos na mura nga pero madali namang masira.', 'opinyon', 4],
    ['Nakasasama sa mga kabataan ang paggamit ng <i>social media</i> tulad ng Facebook at Twitter.', 'opinyon', 4],
    ['Nararapat lamang na tuluyan nang ipagbawal ang pagsisigarilyo sa lahat ng sulok ng ating bansa.', 'opinyon', 4],
    ['Walang naidulot na mabuti sa kulturang Pilipino ang pagkakasailalim ng Pilipinas sa mga Amerikano.', 'opinyon', 4],
],
5 => [
    ['Ang antibiyotikong erythromycin ay natuklasan noong 1949 ni Dr. Abelardo Aguilar, isang Pilipinong siyentipiko.', 'katotohanan', 5],
    ['Ang Bulkang Taal ay isa sa mga binansagang <i>Decade Volcanoes</i>, o mga espesyal na bulkang pinili ng mga eksperto upang subaybayan at pag-aralan.', 'katotohanan', 5],
    ['Ang Dagat Caspian, na itinuturing din bilang isang lawa, ang pinakamalaking katawang tubig na nakapaloob sa kalupaan.', 'katotohanan', 5],
    ['Ang Pilipinas ang tanging bansang nagsasabit ng kanyang bandila nang pabaligtad kapag ito ay nasa isang digmaan.', 'katotohanan', 5],
    ['Ayon sa resulta ng isang pag-aaral, may kabuuang 2.3 milyong <i>OFW</i> ang nagtrabaho sa ibang bansa mula Abril hanggang Setyembre ng taong 2018.', 'katotohanan', 5],
    ['Binili ng Estados Unidos ang Pilipinas mula sa Espanya sa halagang 20 milyong dolyar alinsunod sa Tratado ng Paris noong 1898.', 'katotohanan', 5],
    ['Noong 2019, pumangatlo na lamang ang Pilipinas sa Estados Unidos at Indonesia sa larangan ng paggawa ng enerhiyang <i>geothermal</i>.', 'katotohanan', 5],
    ['Taong 476 AD nang ang huling emperador ng Kanlurang Imperyong Romano na si Romulus Augustus ay napabagsak ng barbarian na nagngangalang Flavius Odoacer.', 'katotohanan', 5],
    ['Si Michelangelo ang gumawa ng mga estatwang <i>David</i> at <i>Pieta</i> at nagpinta sa kisame ng Sistine Chapel.', 'katotohanan', 5],
    ['Ang Kasunduan sa Versailles na tumapos sa digmaan sa pagitan ng <i>Allied Powers</i> at Alemanya ay nilagdaan noong June 28, 1919.', 'katotohanan', 5],
    ['Ang pambobomba ng Hapon sa Pearl Harbor sa Hawaii na isang teritoryo ng Estados Unidos sa Dagat Pasipiko ay naganap noong Dis. 7, 1941.', 'katotohanan', 5],
    ['Ang pagpapahintulot ng mga bidyong laro ang pinakamainam na paraan upang panatilihin ang mga bata sa loob ng bahay.', 'opinyon', 5],
    ['Ang Pilipinas ay dapat balik-balikan ng mga Pilipinong naninirahan na sa ibang bansa kahit isang beses man lang kada tatlong taon.', 'opinyon', 5],
    ['Ang San Fernando, Pampanga, na kilala bilang <i>Lantern Capital</i> ng Pilipinas, ang dapat unahing puntahan ng mga dayuhang turista.', 'opinyon', 5],
    ['Malaki na ang iniunlad ng turismo sa ating bansa ayon sa mga ekonomista, ngunit hindi pa rin kalugod-lugod ang pag-unlad na ito.', 'opinyon', 5],
    ['Maraming eksperto ang nagsasabing nabawasan na ang mga kabataang hindi nag-aaral ngunit hindi ako naniniwala sa kanila.', 'opinyon', 5],
    ['Mas mahalaga ang pagkakaroon ng kalayaan sa pagsasalita kaysa sa pag-iwas sa kaguluhang maaaring idulot ng pribilehiyong ito.', 'opinyon', 5],
    ['Upang malutas ang suliranin sa trapiko, mas mainam mamuhunan sa mga tren na tatakbo sa ilalim ng lupa kaysa sa mga makabagong kalsada.', 'opinyon', 5],
    ['Ang tanyag na pagbabalik ni Heneral Douglas MacArthur sa Pilipinas noong Oktubre 20, 1944 ay dapat itampok sa isang palabas sa Netflix.', 'opinyon', 5],
    ['Ang labanan sa Normandy na simula ng pagpapalaya ng Kanlurang Europa mula sa mga Nazi ang pinakamagandang eksena sa paborito kong pelikula.', 'opinyon', 5],
    ['Ang teorya ng mga siyentipikong nanggaling ang lahat ng nabubuhay na nilalang mula sa isang uri ng mikrobyo ay hindi katanggap-tanggap.', 'opinyon', 5],
    ['Panahon na para baguhin ang batas upang panagutin ang mga kabataang 15 hanggang 18 taong gulang na gumagawa ng karumal-dumal na krimen.', 'opinyon', 5],
],
];
$banks = [$tier => []];
foreach ($tiers as $n) $banks[$tier] = array_merge($banks[$tier], $sourceBanks[$n]);
function ok_question(array $entry, string $tier, string $lvl): array {
    return ['word'=>strip_tags($entry[0], '<i>'), 'correct'=>$entry[1], 'choices'=>['opinyon','katotohanan'], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $byCategory = [];
    foreach ($available as $idx) $byCategory[$banks[$tier][$idx][1]][] = $idx;
    $category = array_rand($byCategory);
    $i = $byCategory[$category][array_rand($byCategory[$category])];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = ok_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        Ang pangungusap na ibinigay ay nagpapahayag ng <strong><span style="color:#CC0066;"><?php echo ok_h($cur['correct']); ?></span></strong>.
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.4;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Sabihin kung ang pangungusap sa itaas ay nagpapahayag ng opinyon o katotohanan.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo ok_h(ucfirst($choice)); ?>
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
