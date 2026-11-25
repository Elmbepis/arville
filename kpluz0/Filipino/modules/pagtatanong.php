<?php
// filipino/modules/pagtatanong.php
// Three grade-dependent banks; single difficulty.

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
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$tier = $grd <= 2 ? 0 : ($grd <= 4 ? 1 : 2);
$moduleTitle = ['Pagtatanong Tungkol sa Isang Bagay', 'Pagtatanong Tungkol sa Nabasang Teksto', 'Pagtatanong Tungkol sa mga Dayagram, Tsart, o Mapa'][$tier];
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$lvl = 'Easy';
$bagay = ['ipinapakita ng larawan', 'ipinapakitang teksto', 'impormasyong ibinibigay ng larawan'][$tier];
$banks = [
    [
        ['images/pagtatanong/pic1.jpg', 'Bakit dumapo ang paru-paro sa bulaklak?', 'Ano ang laman ng dala niyang sisidlan?', 'Sino ang naliligo sa ilog?', 'Paano tumakbo ang kuneho?'],
        ['images/pagtatanong/pic1.jpg', 'Ilan ang bulaklak ng halaman?', 'Ano ang kinakain ng tigre?', 'Bakit nasira ang bakod?', 'Sino ang naglalaba sa ilog?'],
        ['images/pagtatanong/pic2.jpg', 'Ilan lahat ang mga lobo?', 'Bakit umalis ang pusa?', 'Ano ang kulay ng suot niyang damit?', 'Kailan ang kanyang kaarawan?'],
        ['images/pagtatanong/pic2.jpg', 'Kanino ang mga lobo?', 'Saan pumunta ang daga?', 'Gaano kataas ang puno?', 'Bakit ka umiiyak?'],
        ['images/pagtatanong/pic3.jpg', 'Ano ang pangalan ng aso?', 'Saan nagtago ang mga alitaptap?', 'Ilan ang laruan ng batang babae?', 'Bakit kinain ng bata ang tinapay?'],
        ['images/pagtatanong/pic3.jpg', 'Kanino nakatingin ang tuta?', 'Bakit nabuwal ang puno?', 'Sino ang kumain ng mansanas?', 'Bakit lumipad ang ibon?'],
        ['images/pagtatanong/pic4.jpg', 'Ano ang kulay ng laso?', 'Kaninong lapis ito?', 'Sino ang naglilinis ng silid-aralan?', 'Bakit asul ang bola?'],
        ['images/pagtatanong/pic4.jpg', 'Kanino ang lasong iyan?', 'Bakit kulay itim ang sapatos?', 'Paano ka nadapa?', 'Sino ang kumuha ng aklat?'],
        ['images/pagtatanong/pic5.jpg', 'Sino ang nagbibisikleta?', 'Ano ang binili ng Ale sa palengke?', 'Bakit lumipad ang ibon?', 'Saan nagtungo ang mga bibe?'],
        ['images/pagtatanong/pic5.jpg', 'Ano ang kulay ng bisikleta?', 'Saan mo nabili ang kariton?', 'Kanino ka humiram ng walis?', 'Saan mo napulot ang laruan?'],
        ['images/pagtatanong/pic6.jpg', 'Bakit mukhang galit ang leon?', 'Sino ang nakapulot ng prutas sa daan?', 'Paano tumakbo ang usa?', 'Ano ang kulay ng ulap?'],
        ['images/pagtatanong/pic6.jpg', 'Ano ang kulay ng leon?', 'Bakit humiyaw ang tigre?', 'Saan nagtungo ang pulis?', 'Paano nawala ang relo?'],
        ['images/pagtatanong/pic7.jpg', 'Kanino ang mga aklat?', 'Saan nakalagay ang kanyang payong?', 'Kailan ang iyong kaarawan?', 'Ano ang kulay ng paborito mong laruan?'],
        ['images/pagtatanong/pic7.jpg', 'Bakit maraming mga aklat diyan?', 'Sino ang bumili ng mantika?', 'Bakit maputik ang kalye?', 'Saan nagtago ang kuting?'],
        ['images/pagtatanong/pic8.jpg', 'Bakit kulay asul ang yoyo?', 'Sino ang kasama mo sa pamamasyal?', 'Nakita mo ba ang hinahanap mong pambura?', 'Saan dapat inilalagay ang mga basura?'],
        ['images/pagtatanong/pic8.jpg', 'Kanino ba iyang yoyo?', 'Kanino mo ibinigay ang pera?', 'Masarap ba ang tinapay?', 'Matamis ba iyang mansanas?'],
        ['images/pagtatanong/pic9.jpg', 'Bakit masaya ang bata habang naglalakad?', 'Bakit siya may dalang halaman?', 'Sino ang nagbigay ng lobo?', 'Bakit asul ang damit ng bata?'],
        ['images/pagtatanong/pic9.jpg', 'Ano ang pangalan ng batang babae?', 'Sino ang kasama niyang naglalaba?', 'Bakit nabasag ang plorera?', 'Saan nakapatong ang baso?'],
        ['images/pagtatanong/pic10.jpg', 'Ilan ang pangkulay sa lalagyan?', 'Bakit mo siya iniwan sa daan?', 'Alin sa mga damit na ito ang nais mong isuot?', 'Saan mo ilalagay ang iyong sapatos?'],
        ['images/pagtatanong/pic10.jpg', 'Kanino ang mga pangkulay na iyan?', 'Saan mo nakuha ang bolang iyan?', 'Bakit nalanta ang mga bulaklak?', 'Kailan nakawala ang tandang?'],
        ['images/pagtatanong/pic11.jpg', 'Bakit umiiyak ang bata?', 'Saan ka pupunta?', 'Nasaan ang lapis ko?', 'Sino ang kasama mo?'],
        ['images/pagtatanong/pic11.jpg', 'Ano ang pangalan ng bata?', 'Bakit sumisigaw ang babae?', 'Dumating na ba ang ating bisita?', 'Saan ka nakabili ng bigas?'],
        ['images/pagtatanong/pic12.jpg', 'Bakit bilog ang bola?', 'Sino ang kasama ni Tatay?', 'Saan galing si Ate?', 'Saan pupunta si Nanay?'],
        ['images/pagtatanong/pic12.jpg', 'Kanino ang bolang iyan?', 'Sino ang gumamit ng lapis ko?', 'Sino ang nagbigay ng mga pagkain?', 'Masarap ba iyang bibingka?'],
        ['images/pagtatanong/pic13.jpg', 'Sino ang nakabasag ng plorera?', 'Ano ang kinakain mo?', 'Alin ang magandang kulay ng lobo?', 'Saan mo dadalhin ang mga prutas?'],
        ['images/pagtatanong/pic13.jpg', 'Kanino ang plorerang nabasag?', 'Ano ang palaman ng tinapay?', 'Saan galing ang mga bubuyog?', 'Bakit nasira ang bubong?'],
        ['images/pagtatanong/pic14.jpg', 'Sino ang may-ari ng loro?', 'Bakit nabasag ang bote?', 'Saan tayo mamamasyal?', 'Sino sa kanila ang kamag-aral mo?'],
        ['images/pagtatanong/pic14.jpg', 'Nakapagsasalita ba ang loro?', 'Kailan natumba ang poste?', 'Bakit nabali ang patpat?', 'Kanino iyang saranggola?'],
        ['images/pagtatanong/pic15.jpg', 'Bakit mataba ang aso?', 'Saan nahanap ang sisiw?', 'Paano gumawa ng bangkang papel?', 'Saan nanggaling si kuya?'],
        ['images/pagtatanong/pic15.jpg', 'Anong uri ng aso iyan?', 'Bakit mataba ang kambing?', 'Ano ang kulay ng kotse?', 'Sino ang may-ari ng bahay?'],
    ],
    [
        ['images/pagtatanong/pic99.jpg', 'Paano nagigising si bunso tuwing umaga?', 'Sino ang nagpinta ng bakod?', 'Bakit nagalit ang kapitbahay?', 'Kanino ang mga prutas?'],
        ['images/pagtatanong/pic99.jpg', 'Ano ang sinasabi ng tula tungkol sa pamilyang nagmamahalan?', 'Ano ang kinain ng tuta?', 'Bakit nawala ang pera?', 'Paano tumahol ang aso?'],
        ['images/pagtatanong/pic99.jpg', 'Ano ang mga ingay na ginagawa nina ate at kuya tuwing umaga?', 'Sino ang nakakita ng higante?', 'Bakit lumipad ang kuwago?', 'Ano ang ginawa ng mga duwende?'],
        ['images/pagtatanong/pic99.jpg', 'Saan nagtatrabaho si Itay?', 'Bakit sila bumili ng kuneho?', 'Bakit umiyak ang kamag-aral niya?', 'Ano ang kulay ng bulaklak sa hardin?'],
        ['images/pagtatanong/pic99.jpg', 'Ano ang hanapbuhay ng Inay?', 'Sino ang bumili ng bisikleta?', 'Saan nanggaling ang tigre?', 'Bakit natalo sa karera ang pagong?'],
        ['images/pagtatanong/pic99.jpg', 'Ano ang ipinagpapasalamat ng may-akda?', 'Sino ang bumili ng bisikleta?', 'Saan nanggaling ang tigre?', 'Bakit natalo sa karera ang pagong?'],
        ['images/pagtatanong/pic98.jpg', 'Ano ba ang mikrobyo?', 'Sino ang bumili ng tsokolate?', 'Saan nanggaling ang bangka?', 'Sinu-sino ang kumain ng pansit?'],
        ['images/pagtatanong/pic98.jpg', 'Ano ang kahulugan ng bakuna?', 'Sinu-sino ang nakakita sa aswang?', 'Bakit sila naligo sa dagat?', 'Kailan sila maglalaro ng basketbol?'],
        ['images/pagtatanong/pic98.jpg', 'Ano ang mga edad ng mga batang babakunahan?', 'Sino ang guro mo sa matematika?', 'Paano nila nahuli ang elepante?', 'Nakasakay ka na ba sa eroplano?'],
        ['images/pagtatanong/pic98.jpg', 'Ano ang tunay na pangalan ni Kapitan Celso?', 'Ilan ang mga hayop sa gubat?', 'Paano nalipol ang mga dinosaur?', 'Bakit sila bumili ng tolda?'],
        ['images/pagtatanong/pic98.jpg', 'Saan gaganapin ang programang pagbabakuna?', 'Anu-ano ang laman ng kahon?', 'Sino ang artistang darating?', 'Bakit maraming tao sa sementeryo?'],
        ['images/pagtatanong/story1.jpg', 'Ano ang ibig sabihin ng \'gintong palayan\'?', 'Paano nahuli ang malaking balyena?', 'Bakit nag-away-away ang magkakapitbahay?', 'Ano ang naging bunga ng pagputok ng bulkan?'],
        ['images/pagtatanong/story1.jpg', 'Masasabi mo bang masipag si Amado?', 'Paanong nalugi ang negosyo ni Berting?', 'Saan gagamitin ni Andres ang binili niyang itak?', 'Bakit nagulantang ang mga hayop sa gubat?'],
        ['images/pagtatanong/story1.jpg', 'Ano ang itinanim at inalagaan ni Amado?', 'Saan nahukay ng mga duwende ang kayamanan?', 'Bakit pinarusahan ng diwata si Ester?', 'Ano ang sanhi ng pag-usbong ng digmaan?'],
        ['images/pagtatanong/story1.jpg', 'Ilan ang mga anak nina Guring at Amado?', 'Anu-ano ang mga dalang regalo ng mga mago?', 'Saan madalas makita ang kapre?', 'Paano nasawi ang manananggal?'],
        ['images/pagtatanong/story2.jpg', 'Sino ang nagkaroon ng inggit sa mga tauhan sa kuwento?', 'Anu-ano ang mga hiniling ng mga tao sa higante?', 'Bakit nagalit si Bathala sa mga taganayon?', 'Saan dinala ni Kulas ang mga perlas?'],
        ['images/pagtatanong/story2.jpg', 'Sino ang nagalit kay Ampalaya?', 'Bakit nagalit ang nuno sa punso?', 'Sino ang kaaway ng tikbalang?', 'Paano nakatakas ang mga bihag?'],
        ['images/pagtatanong/story2.jpg', 'Sino ang gulay na may asim at malasutlang kutis?', 'Sino ang nagnakaw ng mga alahas?', 'Paano nakaligtas ang bida sa sakuna?', 'Kanino ang mahiwagang kuwintas?'],
        ['images/pagtatanong/story2.jpg', 'Ano ang katangiang taglay ni Luya?', 'Ano ang ikinamatay ng mangkukulam?', 'Bakit nananakot sa mga tao ang tiyanak?', 'Sino ang nautakan ng matsing?'],
        ['images/pagtatanong/story2.jpg', 'Bakit may gaspang na kaakit-akit si Patola?', 'Sinu-sino ang pinagpakitaan ng multo?', 'Anu-ano ang mga sandatang dala ni Diego?', 'Saan-saan itinago ang mga ginto?'],
    ],
    [
        ['images/pagtatanong/dayagram01.jpg', 'Anu-ano ang mga salik sa pag-aaral ng etimolohiya ng mga nauusong salita sa Facebook?', 'Bakit kailangan natin ang Facebook?', 'Paano maghanap ng mga kaibigan sa Facebook?', 'Paano gumawa ng account sa Facebook?'],
        ['images/pagtatanong/dayagram01.jpg', 'Bakit mahalagang pag-aralan ang etimolohiya ng mga nauusong salita sa Facebook?', 'Bakit nawiwili ang maraming tao sa paggamit ng Facebook?', 'Paano magnegosyo gamit ang Facebook?', 'Paano maglagay ng mga larawan sa Facebook?'],
        ['images/pagtatanong/grapik3.jpg', 'Saan iginugugol ng karaniwang mag-aaral ang pinakamaraming oras sa bawat araw?', 'Paano makakakuha ng mataas na marka ang mga mag-aaral sa pagsusulit?', 'Magkano ang karaniwang baon ng mga mag-aaral araw-araw?', 'Anu-ano ang mga karaniwang suliranin ng isang mag-aaral?'],
        ['images/pagtatanong/grapik3.jpg', 'Ilang oras ang nauubos ng karaniwang mag-aaral sa kanyang pagtulog at paglalaro?', 'Ano ang paboritong laro ng mga mag-aaral?', 'Ano ang paboritong gawaing bahay ng mga mag-aaral?', 'Ano ang karaniwang sinasakyan ng mga mag-aaral sa kanilang pagpasok sa paaralan?'],
        ['images/pagtatanong/grapik3.jpg', 'Ilang porsiyento ng kanyang araw ang inilalaan ng isang mag-aaral sa paggawa ng mga takdang-aralin at gawaing bahay?', 'Paano nakatutulong ang mga mag-aaral sa kanilang mga magulang?', 'Sino ang paboritong guro ng mga mag-aaral?', 'Ano ang paboritong libangan ng mga mag-aaral?'],
        ['images/pagtatanong/grapik4.jpg', 'Aling materyal na sangkap ang may pinakamataas na bahagdan sa gastusin sa paggawa ng bahay?', 'Anong uri ng kahoy ang madalas gamitin sa paggawa ng bahay?', 'Anong tatak ng semento ang pinakamainam gamitin sa pagtatayo ng bahay?', 'Paano mapapatibay ang isang bahay?'],
        ['images/pagtatanong/grapik4.jpg', 'Ilang porsyento ng gastusin sa paggawa ng bahay ang dapat ilaan para sa lakas-tao?', 'Anong uri ng pintura ang dapat gamitin sa bubong ng bahay?', 'Paano mapapabilis ang pagtatayo ng isang bahay?', 'Saan maaaring kumuha ng lakas-tao para sa pagtatayo ng isang bahay?'],
        ['images/pagtatanong/grapik4.jpg', 'Ilang porsyento ng gastusin sa paggawa ng bahay ang dapat ilaan para sa semento at bakal?', 'Paano maiiwasan ang pagkaanay ng mga kahoy sa isang bahay?', 'Paano magagawang ligtas ang pagtatayo ng isang bahay?', 'Ano sa kasalukuyan ang pinakausong istilo o disenyo ng isang bahay?'],
        ['images/pagtatanong/grapik1.jpg', 'Ilan sa mga artista ang politiko na rin ngayon?', 'Bakit may mga artistang nais pumasok sa politika?', 'Anu-ano ang mga programang naipatupad ng mga artistang naging politiko?', 'Dapat bang maging politiko ang isang artista?'],
        ['images/pagtatanong/grapik1.jpg', 'Sino sa mga artista sa dayagram ang hindi pumasok sa politika?', 'Sinong artista ang nakakuha ng pinakamataas na boto sa isang halalan?', 'Mahusay bang magsilbi sa bayan ang mga artistang naging politiko?', 'Ano ang pinakamagandang proyektong naipatupad ng isang artistang naging politiko?'],
        ['images/pagtatanong/grapik1.jpg', 'Sino sa mga politiko sa dayagram ang hindi pumasok sa pag-aartista?', 'Sinong politiko ang nakakuha ng pinakamataas na boto sa isang halalan?', 'Mas mahusay bang magsilbi sa bayan ang mga politiko kaysa sa mga artista?', 'Anu-ano ang mga pelikula ng mga artistang naging politiko?'],
        ['images/pagtatanong/grapik2.jpg', 'Ilang pagkakapareho sa pagitan ng ibon at isda ang ipinakikita sa dayagram?', 'Mas marami ba ang mga isda kaysa sa mga ibon sa mundo?', 'Alin ang mas mahalaga sa tao - ibon o isda?', 'Ilang uri ng ibon ang nabubuhay sa mundo?'],
        ['images/pagtatanong/grapik2.jpg', 'Ilang pagkakaiba sa pagitan ng ibon at isda ang ipinakikita sa dayagram?', 'Ilang uri ng isda ang nabubuhay sa mundo?', 'Mas maganda ba ang mga isda kaysa sa mga ibon?', 'Alin ang mas magandang alagaan - ibon o isda?'],
        ['images/pagtatanong/grapik14.jpg', 'Gaano kalaki ang ibinaba ng bilang ng mga lalaking naninigarilyo sa aming lungsod mula 1965 hanggang 2000?', 'Anu-ano ang dahilan kung bakit naninigarilyo ang mga tao kahit ito ay masama?', 'Ano ang paboritong tatak ng sigarilyo ng mga kalalakihan?', 'Anu-ano ang mga masasamang epekto ng paninigarilyo?'],
        ['images/pagtatanong/grapik14.jpg', 'Gaano kalaki ang itinaas ng bilang ng mga babaeng naninigarilyo sa aming lungsod mula 1965 hanggang 1985?', 'Anu-anong uri ng sakit ang maaari mong makuha sa paninigarilyo?', 'Anu-ano ang mga masasamang epekto ng paninigarilyo sa lipunan?', 'Ano ang pinakamabisang paraan upang mapababa ang dami ng mga naninigarilyo sa aming lungsod?'],
        ['images/pagtatanong/grapik14.jpg', 'Ano ang iyong masasabi tungkol sa kalakaran ng bilang ng mga naninigarilyong lalaki at babae sa aming lungsod?', 'Ano ang karaniwang dahilan kung bakit nagsisimulang manigarilyo ang isang babae?', 'Ano ang pinakamabisang paraan upang makatigil sa paninigarilyo ang isang tao?', 'Gaano kalaki ang nagagastos ng mga naninigarilyo sa kanilang bisyo?'],
        ['images/pagtatanong/map-ncr.jpg', 'Anu-anong mga lungsod ang nasa hilaga ng Lungsod ng Maynila?', 'Aling lungsod ang may pinakamaraming restawran?', 'Aling lungsod ang may pinakamalaking kita?', 'Aling lungsod ang may pinakamahusay na alkalde?'],
        ['images/pagtatanong/map-ncr.jpg', 'Anu-anong mga lungsod ang nasa timog ng Lungsod ng Quezon?', 'Aling lungsod ang may pinakamataas na badyet para sa mga serbisyo?', 'Aling lungsod ang may pinakamaraming \'mall\'?', 'Anu-anong lungsod ang may ipinagdiriwang na kapistahan taun-taon?'],
        ['images/pagtatanong/map-ncr.jpg', 'Aling lungsod ang may pinakamalawak na lupain?', 'Aling lungsod ang may pinakamataas na badyet para sa mga edukasyon?', 'Aling lungsod ang may pinakamabilis na pag-unlad mula taong 2000?', 'Aling lungsod ang may pinakamataas na populasyon?'],
    ],
];
$bank = $banks[$tier];
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['grade'] ?? -1) === $grd
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($bank), $used));
    if (!$available) { $used = []; $available = array_keys($bank); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    [$image, $correct, $w1, $w2, $w3] = $bank[$i];
    $choices = [$correct, $w1, $w2, $w3];
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'qid' => bin2hex(random_bytes(16)), 'correct' => $correct,
        'choices' => $choices, 'image' => $image, 'question' => 'Alin ang maaaring itanong tungkol sa ' . $bagay . '?', 'lvl' => $lvl, 'grade' => $grd,
    ];
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
    <?php ob_start(); ?>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:100%;width:auto;height:auto;border:1px solid #888;object-fit:contain;">
        <p style="font-size:16pt;color:#800080;margin:16px auto 8px;max-width:450px;text-align:center;text-wrap:balance;"> <?php echo htmlspecialchars($cur['question'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p style="font-size:16pt;color:#CC0066;font-weight:700;margin:0px 0 0;">Sagot: <?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php echo ob_get_clean(); ?>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current'];
    ob_start(); ?>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Larawan para sa tanong" style="max-width:100%;width:auto;height:auto;border:1px solid #888;object-fit:contain;margin:0 auto 16px;">
        <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:0 auto;max-width:450px;text-align:center;"><?php echo htmlspecialchars($cur['question'], ENT_QUOTES, 'UTF-8'); ?></p><br/>
    <?php echo ob_get_clean(); ?>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:min(100%, 480px);margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
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
