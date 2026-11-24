<?php
// filipino/modules/pang-abay-gamit.php
// Three grade-dependent sentence-completion banks; single difficulty.

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
$moduleTitle = 'Wastong Paggamit ng Pang-abay';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
// Legacy banks cover grades 1, 2–3 and 4–10; Kindergarten uses Grade 1.
function pabg_tier(string $lvl, int $grd): int { return $grd <= 1 ? 0 : ($grd <= 3 ? 1 : 2); }
function pabg_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "Pupunta ako kina Jimmy ____.=mamaya[kahapon+dito]kanina",
        "Bibili ako ng kendi ____.=sa tindahan[sa ospital+sa barberya]sa bangko",
        "Bumili kami ng bisikleta ____.=kahapon[bukas+mamaya]sa Sabado",
        "Dadalhan kita ng ulam ____.=mamayang gabi[kahapon+kanina]noon",
        "Pumapasok ako ____ upang matuto.=sa paaralan[sa simbahan+sa ospital]sa palengke",
        "Nagluluto si Inay ____.=sa kusina[sa banyo+sa silid-tulugan]sa sala",
        "Madali akong mauhaw kaya ____ akong uminom ng tubig.=madalas[madalang+bawal]bihira",
        "Gusto kong matuto kaya ____ akong mag-aral.=masipag[tamad+madalang]bihira",
        "Ayaw kong pumayat kaya ____ akong kumain.=magana[kaunti+madalang]bihira",
        "Ayaw kong madulas kaya ____ akong naglalakad.=maingat[matulin+magulo]patakbo",
        "Maglilinis ako ng bahay ____.=mamaya[kahapon+noon]kanina",
        "Nagtanim ako ng mga gulay sa hardin ____.=kahapon[bukas+mamaya]sa Lunes",
        "Manghuhuli ako ng isda sa ilog ____.=bukas[kahapon+kanina]noong Huwebes",
        "Sumakay ako sa isang balsa ____.=noong Biyernes[bukas+mamaya]sa Lunes",
        "Nahilo siya nang sumayaw siya nang ____.=paikot-ikot[mabagal+maingat]dahan-dahan",
        "Ayaw kong magising ang aso kaya ____ akong naglakad.=dahan-dahan[biglaan+maingay]nakagugulat",
        "Maysakit si Jose kaya ____ siyang kumain.=mahina[magana+masarap]malakas",
        "May sira ang kotse kaya ____ itong tumakbo.=maingay[maayos+mabilis]malakas",
        "Nahihilo si Lydia kaya ____ siyang maglakad.=mabagal[matulin+mabilis]maliksi",
        "Gutom na gutom si Rene kaya ____ niyang naubos ang tinapay.=mabilis[matagal+mabagal]bihira",
        "Mapag-isa si Belen kaya ____ siyang lumabas ng bahay.=bihira[madalas+palagi]malimit",
        "Pupunta ka ba kina Dustin ____?=mamaya[kahapon+kanina]noon",
        "Makabibili ka ng sari-saring gulay at prutas ____.=sa palengke[sa ospital+sa simbahan]sa barberya",
        "Maraming kumakain sa restawrang ito dahil masarap at mura ang pagkain ____.=dito[doon+diyan]noon",
        "Sariwa ang hangin sa lalawigan kaya makapagbibisikleta ka ____.=roon[rito+riyan]rine",
        "Masarap pakinggan si Bayani dahil ____ siyang magsalita.=malambing[maingay+malabo]magulo",
        "Sumikat si Regine dahil ____ siyang kumanta.=mahusay[pangit+malabo]magulo",
        "Natapos agad ni Diego ang kanyang trabaho dahil ____ siyang kumilos.=mabilis[mabagal+dahan-dahan]paunti-unti",
        "Mabilis lumipad ang ibong iyon kaya ____ itong hulihin.=mahirap[madali+mabilis]saglit lamang",
        "Magpapatahi tayo ng mga damit ____.=sa Lunes[noong Lunes+kahapon]noong Abril",
    ],
    1 => [
        "Nahilo ang bata dahil ____ itong nagsayaw.=paikot-ikot[malumanay+dahan-dahan]taun-taon",
        "Kinilala si Ronnie dahil ____ siyang magpinta.=mahusay[mabagal+patigil-tigil]bihira",
        "Nadulas si Larry dahil ____ siyang bumaba ng dyip.=nagmamadali[maingat+bihira]dahan-dahan",
        "Masakit ang ngipin ni Buloy kaya ____ siyang kumain.=mabagal[magana+madalas]masaya",
        "Gustong makaipon ni Greg kaya ____ siyang naghahanapbuhay.=matiyaga[hindi+naiinis]bihira",
        "Nakita niya ang nalulunod na bata kaya ____ niya itong sinagip.=agad[matagal+bihira]madalang",
        "Hindi niya maintindihan ang kuwento kaya ____ niya itong binasa.=paulit-ulit[mabilis+saglit]bihira",
        "Dahil hindi kumakain si Manny, ____ siyang nawalan ng lakas.=unti-unti[masaya+masigla]bihira",
        "Si Pinky ang nanguna sa kanilang klase dahil ____ siyang mag-aral.=masipag[tamad+bihira]madalang",
        "Hindi ko na sila nakakausap dahil ____ ko na silang makita.=madalang[madalas+mabilis]palagi",
        "Wala na siyang pera dahil ____ siyang gumastos.=madalas[madalang+matagal]bihira",
        "Magpasalamat dapat tayo sa Diyos dahil ____ tayong magkasakit.=bihira[madalas+araw-araw]madali",
        "Nagsusumikap si Mang Delfin kaya ____ siyang nag-aararo.=matiyaga[pabiro+bihira]madalang",
        "Madaling mauhaw ang kanyang mga alaga kaya ____ uminom ang mga ito.=maraming beses[kaunting beses+bihira]madalang",
        "Si Darlene ay nagtitinda ng saging ____ para sa kanilang ikabubuhay.=araw-araw[bukas+kahapon]mamaya",
        "Nagalit si Mang Pedring sa mga bata dahil ____ nilang maglaro.=napakaingay[napakatahimik+napakabait]napakaayos",
        "Maraming palaro sa kanilang nayon noong pista kaya ____ nilang naipagdiwang ito.=masaya[malungkot+mabagal]magulo",
        "Dating kusinera si Aling Luming kaya ____ siyang magluto ng adobo.=masarap[mabagal+magulo]pabaya",
        "Matangkad si Lauro kaya ____ siyang natanggap sa koponan ng basketbol.=madali[hindi+madalang]araw-araw",
        "Pahingi ng maraming asukal dahil ____ akong magtimpla ng kape.=matamis[matabang+madalang]tinatamad",
        "Gabayan mo ang iyong kapatid dahil ____ siyang magpasya.=mahina[magaling+mahusay]matiyaga",
        "Nakakatakot ang madilim na lansangan kaya ____ silang dumaraan dito.=bihira[madalas+palagi]paulit-ulit",
        "Malaki siyang magbigay ng tip kaya ____ siyang pinagsilbihan ng weyter.=nakangiti[nakasimangot+naiinis]tinatamad",
        "Marupok na ang tulay na kahoy kaya ____ silang naglakad sa ibabaw nito.=maingat[magulo+patalun-talon]masaya",
        "Ayaw niyang magalit ang aso kaya ____ niya itong nilapitan.=dahan-dahan[biglaan+magulo]pabugso",
        "Nawala ang galit ng kanyang kausap dahil ____ siyang nagpaliwanag dito.=mahinahon[pagalit+palaban]marahas",
        "Alam kong ____ mag-aral kung malakas magpatugtog ng bidyoke ang iyong kapitbahay.=mahirap[madaling+masarap]mainam",
        "Bumalik ____ si Mang Delfin kanina upang humiram ng batya.=dito[kahapon+noon]bukas",
        "Lumuwas ka sa Maynila dahil maraming oportunidad ____.=doon[dito+kahapon]kagabi",
        "Maraming humahanga kay Ruben dahil ____ magaling siya sa agham.=talagang[bihirang+malabong]kahapon",
        "Maraming nabibighani kay Edna dahil ____ niyang magsalita.=napakalambing[napakasama+napakasungit]napakalupit",
    ],
    2 => [
        "Nahilo ang bata dahil ____ itong nagsayaw.=paikot-ikot[malumanay+dahan-dahan]taun-taon",
        "Nakatanggap si Ronnie ng parangal dahil ____ siyang magpinta.=mahusay[mabagal+patigil-tigil]bihira",
        "Nadulas si Larry dahil ____ siyang bumaba ng dyip.=nagmamadali[maingat+bihira]dahan-dahan",
        "Masakit ang ngipin ni Buloy kaya ____ siyang kumain.=mabagal[magana+madalas]masaya",
        "Gustong makaipon ni Greg kaya ____ siyang naghahanapbuhay.=matiyaga[hindi+naiinis]bihira",
        "Nakita ng masigasig na 'lifeguard' ang nalulunod na bata kaya ____ itong tumalon sa tubig.=agad[matagal+bihira]madalang",
        "Hindi niya maintindihan ang kontrata kaya ____ niya itong binasa.=paulit-ulit[mabilis+saglit]bihira",
        "Dahil hindi kumakain si Manny, ____ siyang nawalan ng lakas.=unti-unti[masaya+masigla]bihira",
        "Si Pinky ang nakakuha ng pinakamataas na iskor sa pagsusulit dahil ____ siyang mag-aral.=masipag[tamad+bihira]madalang",
        "Hindi ko na sila nakakausap dahil ____ na akong bumisita sa kanila.=madalang[madalas+mabilis]palagi",
        "Hindi siya nakakaipon ng pera dahil ____ siyang bumili ng mga bagong damit.=madalas[madalang+matagal]bihira",
        "Magpasalamat dapat tayo sa Diyos dahil ____ tayong magkasakit.=bihira[madalas+araw-araw]madali",
        "Nagsusumikap si Mang Delfin kaya ____ niyang inaararo ang kanyang palayan.=matiyaga[pabiro+bihira]madalang",
        "Madaling mauhaw ang kanyang mga alagang hayop kaya ____ uminom ang mga ito.=maraming beses[kaunting beses+bihira]madalang",
        "Si Darlene ay nagtitinda ng saging ____ para sa kanilang ikabubuhay.=araw-araw[bukas+kahapon]mamaya",
        "Nagalit si Mang Pedring sa mga bata dahil ____ nilang maglaro.=napakaingay[napakatahimik+napakabait]napakaayos",
        "Maraming handa at palaro sa kanilang nayon noong pista kaya ____ nilang naipagdiwang ito.=masaya[malungkot+mabagal]magulo",
        "Dating kusinera si Aling Luming kaya ____ siyang magluto ng adobo.=masarap[mabagal+magulo]pabaya",
        "Matangkad si Lauro kaya ____ siyang natanggap sa binuong koponan ng basketbol.=madali[hindi+madalang]araw-araw",
        "Pahingi ng maraming asukal dahil ____ akong magtimpla ng kape.=matamis[matabang+madalang]tinatamad",
        "Bigyan mo ng gabay ang iyong kapatid dahil ____ siyang mag-isip nitong mga huling araw.=magulo[magaling+mahusay]matiyaga",
        "Nakakatakot ang madilim na lansangan kaya ____ silang dumaraan dito.=bihira[madalas+palagi]paulit-ulit",
        "Malaki siyang magbigay ng tip kaya ____ siyang pinagsilbihan ng serbidora.=nakangiti[nakasimangot+naiinis]tinatamad",
        "Marupok na ang tulay na kawayan kaya ____ silang naglakad sa ibabaw nito.=maingat[magulo+nasasabik]masaya",
        "Tutol ang mga magulang ni Laura kay Ronnie kaya ____ lamang silang nagkikita.=palihim[lantaran+madalas]hayagan",
        "Ayaw niyang magulantang ang mabangis na aso kaya ____ niya itong nilapitan.=dahan-dahan[biglaan+magulo]pabugso",
        "Kumalma ang kanyang galit na kausap dahil ____ siyang nagpaliwanag dito.=mahinahon[pagalit+palaban]marahas",
        "Alam kong ____ mag-aral kung malakas magpatugtog ng bidyoke ang iyong kapitbahay.=mahirap[madaling+masarap]mainam",
        "Bumalik ____ si Mang Delfin kanina upang hiramin ang batyang nakasabit sa sangang ito.=dito[kahapon+doon]bukas",
        "Lumuwas ka sa Maynila dahil maraming oportunidad ang naghihintay sa iyo ____.=roon[rito+kahapon]kagabi",
        "Maraming humahanga kay Ruben dahil ____ magaling siya sa pagpipinta.=talagang[bihirang+malabong]kahapon",
        "Maraming nabibighani kay Edna dahil ____ niyang magsalita.=napakalambing[napakasama+napakasungit]napakalupit",
    ],
];
$tier = pabg_tier($lvl, $grd);
function pabg_question(string $raw, int $tier, string $lvl): array {
    [$word, $correct, $a, $b, $c] = preg_split('/[=\[+\]]/', $raw);
    $wrong = [$a, $b, $c];
    shuffle($wrong);
    $choices = array_merge([$correct], $wrong);
    shuffle($choices);
    return ['word'=>$word, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $available = array_values(array_diff(array_keys(array_unique($banks[$tier])), $used));
    if (!$available) { $used = []; $available = array_keys(array_unique($banks[$tier])); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pabg_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo pabg_h($cur['word']); ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo pabg_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo pabg_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang pinakaakmang pang-abay para sa pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
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
