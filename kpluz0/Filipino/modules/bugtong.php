<?php
// filipino/modules/bugtong.php
// Legacy riddles; Medium and Hard combined.

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
$moduleTitle = 'Mga Bugtong';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$lvl = $_POST['level'] ?? ($_SESSION['level'] ?? 'Easy');
if (!in_array($lvl, ['Easy','Hard'], true)) $lvl = 'Easy';
$_SESSION['level'] = $lvl;
$tier = $lvl;
function kay_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    'Easy' => [
        ['Bahay ni Margarita,<br/>naliligid ng sandata.', 'pinya', 'santol', 'ubas', 'langka'],
        ['Baka ko sa Bataan,<br/>abot dito ang unga.', 'kulog', 'kidlat', 'alingawngaw', 'ulan'],
        ['Bibingka ng hari,<br/>hindi mo mahati.', 'tubig', 'kape', 'gatas', 'tsaa'],
        ['Buhay na di kumikibo,<br/>patay na di bumabaho.', 'bato', 'semento', 'uling', 'apoy'],
        ['Bulaklak muna ang dapat gawin,<br/>bago mo ito kaninin.', 'saging', 'gumamela', 'mansanas', 'rosas'],
        ['Bumili ako ng alipin,<br/>mataas pa sa akin.', 'sumbrero', 'damit', 'pantalon', 'salamin'],
        ['Buto\'t-balat,<br/>lumilipad.', 'saranggola', 'kalansay', 'eroplano', 'agila'],
        ['Dala mo, dala ka,<br/>dala ka pa ng iyong dala.', 'sapatos', 'bag', 'hikaw', 'pakaw'],
        ['Dumaan ang hari,<br/>nagkagatan ang mga pari.', 'siper', 'lagari', 'ngipin', 'labi'],
        ['Eto na si Kaka,<br/>bumubuka-bukaka.', 'gunting', 'lapis', 'pambura', 'papel'],
        ['Eto na si bayaw,<br/>dala-dala\'y ilaw.', 'alitaptap', 'tipaklong', 'langgam', 'langaw'],
        ['Habang aking hinihiwa,<br/>ako ay pinaluluha.', 'sibuyas', 'bawang', 'paminta', 'sili'],
        ['Hayan na hayan na,<br/>di mo pa makita.', 'hangin', 'ulan', 'tubig', 'lupa'],
        ['Hindi tao, hindi hayop,<br/>pumupulupot sa tiyan mo.', 'sinturon', 'pantalon', 'damit', 'butones'],
        ['Hindi tao, hindi hayop,<br/>kung uminom ay salup-salop.', 'batya', 'baso', 'dagat', 'sabaw'],
        ['Kaban ng aking liham,<br/>may tagpi ang ibabaw.', 'sobre', 'kahon', 'plastic', 'balde'],
        ['Kadena ay sinabit,<br/>sa batok nakakawit.', 'kwintas', 'hikaw', 'pakaw', 'ulo'],
        ['Kaisa-isang plato kita,<br/>sa buong mundo.', 'buwan', 'langit', 'lupa', 'pulo'],
        ['Kapag bumabaha sa paliguan,<br/>mga liyabi ay kanyang<br/>tangan-tangan.', 'tubero', 'bumbero', 'pari', 'duktor'],
        ['Kay liit pa ni Neneng,<br/>marunong nang kumendeng.', 'bibe', 'sisiw', 'manok', 'tandang'],
        ['Likidong itim,<br/>pangkulay sa lutuin.', 'toyo', 'patis', 'suka', 'sibuyas'],
        ['Limang magkakapatid,<br/>iisa ang dibdib.', 'kamay', 'paa', 'balikat', 'ulo'],
        ['Lupa, tubig, at kalawakan,<br/>tirahan ng sangkatauhan.', 'daigdig', 'kubo', 'bahay', 'kweba'],
        ['Malaking supot ni Mang Jacob,<br/>kung sisidlan ay pataob.', 'kulambo', 'unan', 'batya', 'kumot'],
        ['Manok kong pula,<br/>inutusan ko nang umaga,<br/>nang umuwi ay gabi na.', 'araw', 'gabi', 'hapon', 'tanghali'],
        ['Matanda na ang nuno,<br/>hindi pa naliligo.', 'pusa', 'aso', 'unggoy', 'kambing'],
        ['Nagbibigay na,<br/>sinasakal pa.', 'bote', 'baso', 'timba', 'pinggan'],
        ['Nang munti pa ay paruparo,<br/>nang lumaki ay latigo.', 'sitaw', 'bataw', 'upo', 'sayote'],
        ['Nang umalis ay lumilipad,<br/>nang dumating ay umuusad.', 'ulan', 'baha', 'kidlat', 'kulog'],
        ['Sa araw nahihimbing,<br/>sa gabi ay gising.', 'paniki', 'butiki', 'daga', 'paruparo'],
        ['Binatak ko ang isa,<br/>tatlo pa ang sumama.', 'panyo', 'damit', 'tela', 'tsinelas'],
        ['May apat na binti,<br/>ngunit hindi makalakad.', 'lamesa', 'silya', 'sasakyan', 'tricycle'],
        ['Isa ang pasukan,<br/>tatlo ang labasan.', 'kamiseta', 'pantalon', 'bracelet', 'kwintas'],
        ['Nakabuka kung hapon,<br/>kung umaga ay lulon.', 'banig', 'kama', 'bahay', 'sumbrero'],
    ],
    'Hard' => [
        ['Ako\'y aklat ng panahon,<br/>binabago taun-taon.', 'kalendaryo', 'orasan', 'picture frame', 'libro'],
        ['Anong mabuting litrato<br/>ang kuhang-kuha ng mukha mo.', 'salamin', 'mata', 'larawan', 'ngiti'],
        ['Aso ko sa Muralyon,<br/>lumukso ng pitong balon.', 'sungkaan', 'hagdan', 'kalsada', 'duyan'],
        ['Bahay ko sa Pandacan,<br/>malapad ang harapan.', 'pantalan', 'dagat', 'ilog', 'sapa'],
        ['Banga ng pari,<br/>pauli-uli.', 'duyan', 'lambat', 'simbahan', 'hagdan'],
        ['Butasi butasi,<br/>butas din ang tinagpi.', 'lambat', 'bangka', 'sagwan', 'basket'],
        ['Dalawa kong kahon,<br/>kung buksan ay walang ugong.', 'mata', 'bibig', 'kamay', 'tenga'],
        ['Isang malaking suman,<br/>sandalan at himlayan.', 'unan', 'banig', 'upuan', 'lamesa'],
        ['Isang biyas na kawayan,<br/>maraming lamang kayamanan.', 'alkansiya', 'kahoy', 'baul', 'arinola'],
        ['Kapag bago ay mahina,<br/>matibay kapag naluma.', 'semento', 'sapatos', 'orasan', 'kubyertos'],
        ['Lumalakad nang walang paa,<br/>tumatangis nang walang mata.', 'bolpen', 'luha', 'pawis', 'sandok'],
        ['Maliit at malaki,<br/>iisa ang sinasabi.', 'relo', 'kalendaryo', 'libro', 'bibig'],
        ['May bintana man,<br/>nguni\'t walang bubungan,<br/>may pinto nguni\'t walang hagdanan.', 'kumpisalan', 'simbahan', 'airport', 'mall'],
        ['May puno, walang bunga,<br/>may dahon walang sanga.', 'sandok', 'kawali', 'tinidor', 'balde'],
        ['May ulo\'y walang buhok,<br/>may tiyan walang pusod.', 'palaka', 'buwaya', 'butiki', 'daga'],
        ['Munting tampipi,<br/>puno ng salapi.', 'sili', 'luya', 'bawang', 'sibuyas'],
        ['Naabot na ng kamay,<br/>ipinagawa pa sa tulay.', 'kubyertos', 'kawali', 'walis', 'inidoro'],
        ['Nang kainin ay patay,<br/>nang iluwa\'y buhay.', 'bulate', 'ahas', 'gagamba', 'butiki'],
        ['Pagkagat nang madiin,<br/>naiiwan ang mga ngipin.', 'steypler', 'pana', 'pustiso', 'karayom'],
        ['Palda ni Santa Maria,<br/>ang kulay ay iba-iba.', 'bahaghari', 'ulap', 'langit', 'kidlat'],
        ['Panakip sa nakabotelya,<br/>yari sa lata.', 'tansan', 'yero', 'bubong', 'sampayan'],
        ['Panlinis din ito,<br/>iginigilgil sa ngipin mo.', 'sipilyo', 'dila', 'tuwalya', 'toothpick'],
        ['Pinilit na mabili,<br/>saka ipinambigti.', 'kurbata', 'latigo', 'lubid', 'panyo'],
        ['Sa buhatan ay may silbi,<br/>sa igiban ay walang sinabi.', 'basket', 'tubo', 'poso', 'tabo'],
        ['Sa maling kalabit,<br/>may buhay na kapalit.', 'baril', 'pana', 'sibat', 'kwitis'],
        ['Sa umaga ay nagtataboy,<br/>sa gabi ay nag-aampon.', 'bahay', 'kweba', 'bundok', 'langit'],
        ['Sundalong Amerikano,<br/>nakatayo sa kanto.', 'poste', 'pulis', 'pari', 'bumbero'],
        ['Tinuktok ko ang bangka,<br/>naglapitan ang mga isda.', 'kampana', 'sagwan', 'lambat', 'balde'],
        ['Tungkod ni kapitana,<br/>hindi mahawakan.', 'ahas', 'hito', 'kahoy', 'batuta'],
        ['Tunog sa lalamunan,<br/>inumin ang kailangan.', 'sinok', 'bahing', 'ubo', 'sipon'],
        ['Dumaan si Negro,<br/>nangamatay ang tao.', 'gabi', 'digmaan', 'sakit', 'kriminal'],
        ['Nagtanim ako ng isip,<br/>sa gitna ng tubig,<br/>dahon ay makitid,<br/>bunga ay matulis.', 'palay', 'bataw', 'patola', 'kundol'],
        ['Alisto ka pandak,<br/>daraing si pabigat.', 'dikin', 'uling', 'kawali', 'sandok'],
        ['Baboy ko sa pulo,<br/>ang balahibo\'y pako.', 'langka', 'pinya', 'rambutan', 'durian'],
        ['Bahay ni Ka Huli,<br/>haligi\'y bali-bali,<br/>ang bubong ay kawali.', 'alimango', 'hipon', 'pusit', 'isda'],
        ['Berdeng dahon kapag natuyo,<br/>ginagayat, binibilog, at sinusubo.', 'tabako', 'malunggay', 'sibuyas', 'kangkong'],
        ['Dalawang magkapatid,<br/>sa pagdarasal ay namimitig.', 'tuhod', 'kamay', 'paa', 'pilikmata'],
        ['Dahon ng pindapinda,<br/>magsinlapad ang dalawa.', 'tainga', 'kilay', 'kamay', 'paa'],
        ['Dito ko itinanim,<br/>sa malayo\'y lumaki.', 'plaslayt', 'sanga', 'baterya', 'puno'],
        ['Halamang di nalalanta,<br/>kahit natabas na.', 'buhok', 'kawayan', 'ugat', 'talahib'],
        ['Heto na si Buboy,<br/>bubulong-bulong.', 'bubuyog', 'langaw', 'multo', 'bulong'],
        ['Hindi tao, hindi hayop, hindi apoy,<br/>ngunit nagbibigay ng init sa katawan.', 'dyaket', 'kumot', 'araw', 'tuwalya'],
        ['Isang butil ng palay,<br/>sakot ang buong bahay.', 'ilaw', 'kandila', 'hagdan', 'pinto'],
        ['Isda ko sa tabang,<br/>pag nasa lupa ay gumagapang.', 'hito', 'buwaya', 'alimango', 'pagong'],
        ['Kabaligtaran ng kabiguan,<br/> simbulo ng lawrel,<br/>sa labanan damdamin<br/>ay puno ng katuwaan.', 'tagumpay', 'kabiguan', 'pighati', 'kasiyahan'],
        ['Kahit paulit-ulit mong basahin,<br/>mahirap pa rin sagutin.', 'bugtong', 'kasintahan', 'pagsusulit', 'idyoma'],
        ['Kung kailan tahimik,<br/>saka nambubuwisit.', 'lamok', 'ipis', 'langgam', 'tipaklong'],
        ['Kung may ditche at diko<br/>sa sambahayan,<br/>ka-\'partner\' nito ang<br/>sanse sa tahanan.', 'sangko', 'nanay', 'tiyo', 'kapatid'],
        ['Limang puno ng niyog,<br/>isa\'y matayog.', 'daliri', 'kuko', 'palad', 'buhok'],
        ['Nakapaglalakad at nakalilipad,<br/>Minsa\'y parang estatwang panatag,<br/>Negrung-negro sa kaitiman,<br/>Pakpak ay may kakintaban.', 'salagubang', 'paru-paro', 'paniki', 'kalapati'],
        ['Narito na si Katoto,<br/>may dala-dalang kubo.', 'pagong', 'bao', 'sumbrero', 'baso'],
        ['Maitim na puwit,<br/>tangkay ay nakakabit.', 'sungot', 'pangil', 'buhok', 'bibig'],
        ['Mga pangungusap na may kaisahan,<br/>nagpapahayag ng damdamin at kaisipan.', 'talata', 'liham', 'libro', 'mensahe'],
        ['Ang ngalan ko ay iisa,<br/>ang uri ko\'y iba-iba,<br/>gamit ako ng balana,<br/>sa daliri makikita.', 'singsing', 'kuko', 'relo', 'biyaya'],
    ],
];
function kay_question(array $entry, string $tier, string $lvl): array {
    $choices = array_slice($entry, 1);
    shuffle($choices);
    return ['highlight'=>str_replace('&lt;br/&gt;', '<br/>', kay_h($entry[0])), 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
        <strong>Sagot: <span style="color:#CC0066;"><?php echo kay_h(ucfirst($cur['correct'])); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['highlight']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Piliin ang tamang sagot sa bugtong sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
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
