<?php
// filipino/modules/tauhan-katangian.php
// Character traits: original and restored literary excerpts.

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
$moduleTitle = 'Pagtukoy sa mga Katangian ng mga Tauhan';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
function tau_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$stories = [
    ['Ang Palaka at ang Kalabaw', 'https://pinoycollection.com/ang-palaka-at-ang-kalabaw/', '"A, hindi! Ako ang pinakamalaking palaka. Tingnan ninyo ako", wika ng Inang Palaka at ubos-lakas siyang huminga nang huminga.<br/><br/>Bog! narinig na putok ng mga anak ng palaka. At nakita nilang pumutok ang tiyan ng mahal nilang ina.<br/><br/>"Kaawa-awa naman si Inang Palaka!" wika ng mga anak na palaka. "Ayaw niyang mahigitan ng iba kaya siya nagdusa."', [
        ['Alin sa mga sumusunod ang naglalarawan sa Inang Palaka?', 'hambog', 'mapagkumbaba', 'maingat', 'matiisin'],
    ]],
    ['Ang Uwak at ang Gansa', 'https://pinoycollection.com/ang-uwak-at-ang-gansa/', '"Masasaya na sila, magaganda pa! Pagkapuputi ng mga balahibo nila. Maitim na maitim ako. Pagkapangit-pangit ko. Siguro nakapagpapaputi, nakapagpapaganda, at nakapagpapaligaya ang batis na pinaglalanguyan nila."', [
        ['Alin sa mga sumusunod ang nararamdaman ng uwak?', 'pagkainggit', 'pagkagalak', 'pagkatakot', 'kapayapaan'],
        ['Ano sa tingin mo ang minimithi ng uwak?', 'ganda at kaputian', 'talino at kaputian', 'talino at tapang', 'ganda at tapang'],
    ]],
    ['Ang Agila at ang Maya', 'https://pinoycollection.com/ang-agila-at-ang-maya/', '"Hoy Maya, baka gusto mong subukan kung sino sa ating dalawa ang mabilis lumipad?" tanong ni Agila. Tinanggap ni Maya ang hamon nito para maturuan niya ito ng leksyon.<br/><br/>"Sige! Tinatanggap ko ang hamon mo. Kailan mo gustong magsimula tayo?"...', [
        ['Alin sa mga sumusunod ang naglalarawan kay Agila?', 'mayabang', 'mapagkumbaba', 'maingat', 'mahinahon'],
        ['Alin sa mga sumusunod ang naglalarawan kay Maya?', 'may tiwala sa sarili', 'matatakutin', 'mahina ang loob', 'madaling malinlang'],
    ]],
    ['Ang Buwaya at ang Pabo', 'https://pinoycollection.com/ang-buwaya-at-ang-pabo', '"Pakakasalan ko ang buwayang ito. Mayaman siya. Naku! Kung mapapasaakin lamang ang lahat ng mga perlas at diyamante, ako ang magiging pinakamasayang asawa sa buong mundo.", wika ni Pabo sa sarili.', [
        ['Alin sa mga sumusunod ang naglalarawan kay Pabo?', 'mukhang pera', 'maalalahanin', 'mapagmahal', 'masayahin'],
    ]],
    ['Ang Gorilya at ang Alitaptap', 'https://pinoycollection.com/ang-gorilya-at-ang-alitaptap/', '"Magsama ka ng mga kakampi mo dahil magsasama ako ng libu-libong gorilya na mas malalaki pa sa akin."<br/><br/>Sinabi ito ni Amomongo upang takutin ang alitaptap, na sa pakiwari niya ay nasisiraan ng ulo.<br/><br/>Ngunit sumagot si Iput-Iput, "Hindi ko kailangan ng kakampi. Darating akong mag-isa! Paalam!"', [
        ['Alin sa mga sumusunod ang naglalarawan kay Iput-Iput?', 'may tiwala sa sarili', 'madaling matakot', 'mahina ang loob', 'mapagkumbaba'],
        ['Ano sa tingin mo ang nararamdaman ni Amomongo kay Iput-Iput?', 'inis o galit', 'galak o tuwa', 'habag o awa', 'inggit o selos'],
    ]],
    ['Ang Pamilyang Mahirap', 'https://callmeyhuki.weebly.com/ang-pamilyang-mahirap.html', 'Itay: May lagnat ka. Tsk, tsk. Wag ka muna pumasok sa trabaho. Magpahinga ka muna sa ngayon at baka lumala pa yan. Eto, gamot para sa lagnat mo, inumin mo ya--<br/><br/>Inay: Hindi.<br/><br/>Itay: Ha? Anong hindi? Kailangan mo uminom ng gamot at magpahinga.<br/><br/>Inay: Ayoko. Kailangan ko magtrabaho.', [
        ['Alin sa mga sumusunod ang naglalarawan kay Itay?', 'maalalahaning asawa', 'pabayang asawa', 'madaling nerbyusin', 'mayaman o maykaya'],
        ['Ano sa tingin mo ang dahilan kung bakit nagpupumilit magtrabaho si Inay kahit maysakit siya?', 'Kailangan niyang kumita.', 'Kailangan niyang malibang.', 'Baka mapagalitan siya.', 'Ayaw niyang mainip sa bahay.'],
    ]],
    ['Ang Pamilyang Mahirap', 'https://callmeyhuki.weebly.com/ang-pamilyang-mahirap.html', 'Inay: Oh, bakit ngayon ka lang dumating?<br/><br/>Ivan: Inay, pasensya na po kung late na akong nakauwi. Eto po ang gamot oh.<br/><br/>Inay: Para saan yan?<br/><br/>Ivan: Inay, alam ko pong kahapon pa kayo may sakit. Hindi mo lang pinahahalata. Kaso kaninang umaga po, di na kinaya ng katawan nyo. Tapos, nagtrabaho pa kayo. Malala na ang sakit nyo. Kaya eto po, inumin nyo nang maagapan agad yan.', [
        ['Alin sa mga sumusunod ang naglalarawan kay Ivan?', 'maalalahaning anak', 'tamad o batugan', 'walang galang', 'kuntento sa buhay'],
        ['Alin sa mga sumusunod ang naglalarawan sa inay ni Ivan?', 'matiisin at masikap', 'iresponsable', 'magagalitin', 'mapanlinlang'],
    ]],
    ['Sa Bagong Paraiso, Efren Reyes Abueg', 'https://teksbok.blogspot.com/2011/03/sa-bagong-paraiso.html', '"Ang ganda, ano?" naibulalas ng batang lalaki. "Parang may pintang dugo ang langit."<br/><br/>"Oo nga, ano? Bakit kaya kulay dugo ang araw kapag palubog na?" sagot naman ng batang babae.<br/><br/>Hindi sumagot ang batang lalaki. Nakatanaw ito sa mapulang latay ng liwanag ng araw sa kanluran.', [
        ['Alin sa mga sumusunod ang pinakamaaaring damdamin ng mga bata sa tagpong ito?', 'pagkapayapa', 'pagkagalak', 'pagkagalit', 'pagkasindak'],
    ]],
    ['Sa Bagong Paraiso, Efren Reyes Abueg', 'https://teksbok.blogspot.com/2011/03/sa-bagong-paraiso.html', 'Maliwanag ang naririnig na salita ng dalagita: Kung gusto mong makatapos ng karera, huwag muna kayong magkita ni Ariel. Naunawan niya ang ibig sabihin niyon, nguni\'t ang pagtutol ay hindi niya maluom sa kanyang kalooban.<br/><br/>"Pero, Inay ... Kaibigan ko si Ariel." May himagsik sa kanyang tinig.<br/><br/>"Kahit na ... kayo\'y dalaga at binata na. Alam mo na siguro ang ibig kong sabihin." May langkap na tigas ang sagot na iyon.', [
        ['Alin sa mga sumusunod ang pinakamaaaring damdamin ng dalagita sa tagpong ito?', 'pagkainis', 'pagkagalak', 'pagkainggit', 'pagkasindak'],
        ['Alin sa mga sumusunod ang ginagawa ng inay ng dalagita sa tagpong ito?', 'pagtutol', 'pagsang-ayon', 'pagpapahintulot', 'pagpapaubaya'],
    ]],
    ['Tata Selo, Rogelio Sikat', 'http://kadipanvalsci.blogspot.com/2010/07/tata-selo-ni-regilio-sikat.html', '"Bakit niya babawiin ang aking saka?" tanong ni Tata Selo. "Dinaya ko na ba siya sa partihan? Tinuso ko na ba siya? Siya ang may-ari ng lupa at kasama lang niya ako. Hindi ba\'t kaya maraming nagagalit sa akin ay dahil sa ayaw kong magpamigay ng kahit isang pinangko kung anihan?"<br/><br/>Hindi pa rin umaalis sa harap ng istaked si Tata Selo. Nakahawak pa rin siya sa rehas. Nakatingin siya sa labas ngunit wala siyang sino mang tinitingnan.', [
        ['Alin sa mga sumusunod ang pinakamaaaring damdamin ni Tata Selo sa tagpong ito?', 'pagkagalit', 'pagkagalak', 'pagkainggit', 'pagkasindak'],
    ]],
    ['Ang Kalupi, Benjamin P. Pascual', 'http://markjan-markjan.blogspot.com/2009/03/ang-kalupi-maikling-kwento-ni-benjamin.html', 'Ang bata ay nakapantalon ng maruming maong na sa kahabaan ay pinag-ilang-lilis ang laylayan. Nakasuot ito ng libaging kamiseta, punit mula sa balikat hanggang pusod, na ikinalitaw ng kanyang butuhan at maruming dibdib. Natiyak ni Aling Marta na ang bata ay anak-mahirap.<br/><br/>"Pasensya na kayo, Ale" ang sabi ng bata. Hawak nito ang isang maliit na bangos. Tigbebente, sa loob-loob ni Aling Marta. Ang bata ay takot na nakatingin sa kanya, "Hindi ko ho kayo sinasadya. Nagmamadali ho ako e."<br/><br/>"Pasensya!" - sabi ni Aling Marta. "Kung lahat ng kawalang-ingat mo\'y pagpapasensiyahan nang pagpapasensiyahan ay makakapatay ka ng tao."', [
        ['Alin sa mga sumusunod ang pinakamaaaring damdamin ni Aling Marta sa tagpong ito?', 'inis o galit', 'tuwa o galak', 'inggit o selos', 'takot o sindak'],
    ]],
    ['Ang Kalupi, Benjamin P. Pascual', 'http://markjan-markjan.blogspot.com/2009/03/ang-kalupi-maikling-kwento-ni-benjamin.html', 'Maliksi siyang lumapit at binatak ang bata sa liig. "Nakita rin kita!" ang sabi niyang humihingal. "Ikaw ang dumukot sa pitaka ko, ano? Huwag kang magkakaila!"<br/><br/>Tiyakan ang kanyang pagsasalita; ibig niyang sa pagkalito ng bata sa pag-aapuhap ng isasagot ay masukol niyang buong-buo. Ngunit ang bata ay mahinang sumagot:<br/><br/>"Ano hong pitaka?" ang sabi. "Wala ho akong kinukuha sa inyong pitaka."<br/><br/>"Anong wala!" pasinghal na sabi ni Aling Marta. "Ikaw nga ang dumukot ng pitaka ko at wala nang iba. Kunwa pa\'y binangga mo \'ko, ano ha? Magaling, magaling ang sistema ninyong iyan! Kikita nga kayo rito sa palengke!"', [
        ['Alin sa mga sumusunod ang pinakamaaaring damdamin ni Aling Marta sa tagpong ito?', 'galit', 'galak', 'inggit', 'takot'],
    ]],
    ['Ang Inahing Manok at ang kanyang mga Sisiw', 'https://pinoycollection.com/ang-inahing-manok-at-ang-kanyang-mga-sisiw/', 'Agad iminungkahi ng mga sisiw sa kanilang ina, "Kailangang lumikas na tayo rito at humanap ng ibang matitirahan, Inang! Kung hindi, matatagpuan tayo rito ng mga magsisipag-ani bukas at huhulihin upang patayin!"<br/><br/>"Huwag kayong mabahala mga anak," ang wika ng inahing manok. "Kung mga kapitbahay lamang ang aasahan niya, hindi agad magsisipagkilos ang mga iyon! May panahon pa tayo upang manirahan dito."', [
        ['Alin sa mga sumusunod ang nararamdaman ng mga sisiw sa tagpong ito?', 'takot at kaba', 'galak o tuwa', 'inggit at inis', 'lumbay'],
    ]],
    ['Ang Kabayo at ang Kalabaw', 'https://pinoycollection.com/ang-kabayo-at-ang-kalabaw/', '\'Kaibigang kabayo, di hamak na mas mabigat ang pasan kong gamit keysa sa iyo. Maaari bang tulungan mo ako at pasanin mo yung iba?\' pakiusap ng kalabaw.<br/><br/>\'Aba, yan ang ipinataw sa iyong balikat ng ating amo kaya pagtiisan mo,\' anang kabayo na lalo pang binilisan ang paglalakad.<br/><br/>\'Parang awa mo na tulungan mo ako. Di ko na kakayanin ang bigat ng dala ko. Nanghihina ako. Alam mo namang kailangan kong magpalamig sa ilog kapag ganito katindi ang init ng araw dahil madaling mag-init ang katawan ko,\' pakiusap pa rin ng kalabaw.<br/><br/>\'Bahala ka sa buhay mo,\' naiinis na sagot ng kabayo.', [
        ['Alin sa mga sumusunod ang naglalarawan sa kabayo?', 'madamot', 'matulungin', 'maawain', 'mapagbigay'],
        ['Ano ang nararamdaman ng kalabaw sa tagpong ito?', 'panghihina', 'pagkagalak', 'pagkainggit', 'pagmamalaki'],
    ]],
    ['Si Mario, si Ana, at ang Isda', 'https://pinoycollection.com/si-mario-si-ana-at-ang-isda/', '\'Balikan mo uli ang isda. Humingi ka naman ngayon ng magagarang alahas at magagandang kasuotan. Nais kong makita ng lahat dito sa bayan natin na tayo ang pinakamayaman dito,\' utos ng babae sa asawa, na alam niyang hindi kayang sumuway sa bawa\'t sabihin niya.', [
        ['Alin sa mga sumusunod ang naglalarawan kay Ana?', 'materyalistiko', 'mapagpakumbaba', 'mapagbigay', 'matipid'],
        ['Ano ang nais mangyari ni Ana?', 'maging pinakamayaman sa bayan', 'makatulong sa mahihirap', 'mamuhay nang simple', 'makapaglakbay sa ibang bayan'],
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
    $_SESSION[$sessionKey]['current'] = ['story'=>$si, 'word'=>tau_h($entry[0]), 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
        <div style="font-size:16pt;font-weight:700;color:#0000BB;"><?php echo tau_h($passage[0]); ?></div>
        <?php if ($passage[1] !== ''): ?><p style="font-size:10pt;overflow-wrap:anywhere;color:#555;">Pinagkunan: <?php echo tau_h($passage[1]); ?></p><?php endif; ?>
        <div style="text-align:justify;font-size:13pt;line-height:1.6;color:#800080;white-space:normal !important;"><?php echo '<br/>' . str_replace('&lt;br/&gt;', '<br/>', tau_h(preg_replace('/\s+/', ' ', trim($passage[2])))); ?></div>
    </div>
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo tau_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <?php $passage = $stories[$cur['story']]; ?>
    <div style="max-width:500px;margin:20px auto;padding:20px;box-sizing:border-box;border:1px solid #AAA;border-radius:8px;background:white;">
        <div style="font-size:16pt;font-weight:700;color:#0000BB;"><?php echo tau_h($passage[0]); ?></div>
        <?php if ($passage[1] !== ''): ?><p style="font-size:10pt;overflow-wrap:anywhere;color:#555;margin-bottom:25px !important;">Pinagkunan: <?php echo tau_h($passage[1]); ?></p><?php endif; ?>
        <div style="text-align:justify;font-size:13pt;line-height:1.6;color:#800080;"><?php echo str_replace('&lt;br/&gt;', '<br/>', tau_h(preg_replace('/\s+/', ' ', trim($passage[2])))); ?></div>
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
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;max-width:480px;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo tau_h($choice); ?>
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
