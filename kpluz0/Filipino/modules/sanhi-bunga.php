<?php
// filipino/modules/sanhi-bunga.php
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
$moduleTitle = 'Pagtukoy sa Sanhi at Bunga';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
$tier = $grd < 3 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4));
function pua_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
4 => [
    ['Pinag-aralan niyang mabuti ang kanyang aralin kagabi.','Bunga nito, siya ay nakakuha ng mataas na marka sa pagsusulit kanina.','sanhi'],
    ['Dahil hindi niya tinitingnan ang kanyang dinaraanan,','natisod si Pedro at nahulog sa kanal.','sanhi'],
    ['Dahil sa walang habas na pagtatapon ng basura ng mga tao kung saan-saan,','nalalason ang mga isda sa mga anyong tubig at nakararanas tayo ng mga baha.','sanhi'],
    ['Sapagkat siya ay disiplinado at masipag sa pag-aaral,','nagkamit siya ng iba’t ibang karangalan sa kanyang paaralan.','sanhi'],
    ['Labis ang pagputol ng mga puno sa mga kabundukan','kung kaya\'t wala nang humahawak at sumisipsip sa tubig-ulan at nagkakaroon ng labis na pagbaha.','sanhi'],
    ['Dahil sa pagpanaw ng kanyang alagang aso,','hindi makakain si Joshua sa labis na kalungkutan at pagdaramdam.','sanhi'],
    ['Magdamag na umiiyak ang sanggol sa loob ng bahay.','Bunga nito\'y hindi nakatulog nang maayos si Aling Ella.','sanhi'],
    ['Dahil sa kakulangan sa pagpaplano at pag-aksyon ng aming mga pinuno,','madalas malubog ang aming bayan sa baha.','sanhi'],
    ['Sapagkat mahusay at masipag mag-alaga ng kanyang mga puno si Mang Jose,','hindi siya nawawalan ng prutas sa kanyang hapag-kainan.','sanhi'],
    ['Dahil sa pagpupuyat ni Jenny sa panonood ng telebisyon,','hindi siya nakapasok sa paaralan at napagalitan siya ng kanyang nanay.','sanhi'],
    ['Ang paninigarilyo ng isang babaeng buntis','ay nagdudulot ng maagang panganganak o mga abnormalidad sa sanggol.','sanhi'],
    ['Malakas ang bugso ng hanging dala ng bagyo kagabi','kaya nasira ang bubong ng aming kapitbahay.','sanhi'],
    ['Sapagkat maingay silang naghaharutan sa pasilyo,','napagalitan sila ng kanilang punong-guro.','sanhi'],
    ['Dahil sa itinapong balat ng saging sa sahig,','nadulas at nagkabukol si Miguel kaninang umaga.','sanhi'],
    ['Kapag hindi ka nagsuot ng \'face mask\' at \'face shield\',','malaki ang posibilidad na mahahawahan ka ng COVID-19.','sanhi'],
    ['Kung hindi ka susunod sa mga patakaran ng ating kumpanya,','mapipilitan kaming tanggalin ka sa trabaho.','sanhi'],
    ['Kung gagamit ang inyong pabrika ng mga makabagong makinarya,','bibilis ang inyong produksyon at lalaki ang inyong kita.','sanhi'],
    ['Sa pamamagitan ng paraan ng pag-aalagang ipinakita ko sa iyo,','agad mong mapaparami ang iyong mga alagang itik.','sanhi'],
    ['Nasira ang bahay nilang katatayo pa lamang','dahil sa malakas na hagupit ng bagyo.','bunga'],
    ['Nadapa ako at nagkaroon ng mga sugat sa tuhod','dahil nasira ang suwelas ng aking sapatos.','bunga'],
    ['Kaya siya nakakuha ng mataas na marka','ay dahil pinag-aralan niyang mabuti ang kanyang leksiyon kagabi.','bunga'],
    ['Nalulugod ang mga magulang ni Luis sa kanya','dahil lagi siyang tumutulong sa kanilang tindahan.','bunga'],
    ['Walang humpay ang malakas na pagngawa ng sanggol','sapagkat kanina pa pala ito nagugutom.','bunga'],
    ['Gumaling sa paglalaro ng basketbol at itinanghal na MVP ng liga si Dave','dahil sa araw-araw niyang pag-eensayo.','bunga'],
    ['Nabulok ang mga ngipin ni Anne','bunga ng palagi niyang pagnguya ng matatamis na kendi.','bunga'],
    ['Kaya pala naging mababa ang iskor ni Lorna sa pagsusulit','ay dahil sa kanyang pagkakaroon ng \'migraine\' noong kunin niya ito.','bunga'],
    ['Hindi nahuhuli si Glory sa pagpasok sa paaralan','dahil palagi siyang maagang gumising sa umaga.','bunga'],
    ['Madaling nauubos ang pera ni Marina','dahil mahilig siyang bumili ng mga magagarang damit.','bunga'],
    ['Kaya nakabili si Christian ng bagong kotse','ay dahil sa husay niyang mag-ipon at humawak ng pera.','bunga'],
    ['Bihirang magkasakit si Erin','dahil mahilig siyang kumain ng mga masusustansiyang pagkain.','bunga'],
    ['Lumaking magalang at mabait sina Jane at Kristin','sapagkat naging mabuting magulang sina Maria at Manuel.','bunga'],
    ['Marunong maglakad ang asong si Bantay sa dalawang paa lamang','sapagkat matiyaga itong tinuruan ni Tommy.','bunga'],
    ['Magiging eksperto ka sa mga bagong teorya ng pisika','kung pag-aaralan at mauunawaan mo ang aklat na ito.','bunga'],
    ['Malamang na mag-aaway kayo ni Kulas','kapag ginamit mo ang paborito niyang dyaket nang walang paalam.','bunga'],
],
3 => [
    ['Pinag-aralan niyang mabuti ang kanyang aralin kagabi.','Bunga nito, siya ay nakakuha ng mataas na marka sa pagsusulit kanina.','sanhi'],
    ['Dahil hindi niya tinitingnan ang kanyang dinaraanan,','nahulog si Pedro sa kanal.','sanhi'],
    ['Dahil sa walang tigil na pagtatapon ng basura ng mga tao kung saan-saan,','nagbabara ang mga estero at nakararanas tayo ng mga baha.','sanhi'],
    ['Sapagkat siya ay masipag sa pag-aaral,','nagkamit siya ng iba’t ibang karangalan sa kanyang paaralan.','sanhi'],
    ['Labis ang pagputol ng mga puno','kung kaya\'t wala nang humahawak at sumisipsip sa tubig-ulan at umaagos ito bilang baha.','sanhi'],
    ['Dahil sa pagpanaw ng kanyang alagang aso,','hindi makakain si Joshua sa labis na kalungkutan at pagdaramdam.','sanhi'],
    ['Magdamag na umiiyak ang sanggol sa loob ng bahay.','Bunga nito\'y hindi nakatulog nang maayos si Aling Ella.','sanhi'],
    ['Dahil sa kakulangan sa pagpaplano at pag-aksyon ng aming mga pinuno,','madalas malubog ang aming bayan sa baha.','sanhi'],
    ['Sapagkat mahusay at masipag mag-alaga ng kanyang mga puno si Mang Jose,','hindi siya nawawalan ng prutas sa kanyang hapag-kainan.','sanhi'],
    ['Dahil sa pagpupuyat ni Jenny sa panonood ng telebisyon,','hindi siya nakapasok sa paaralan at napagalitan siya ng kanyang nanay.','sanhi'],
    ['Ang paninigarilyo ng isang babaeng buntis','ay nagdudulot ng maagang panganganak o mga abnormalidad sa sanggol.','sanhi'],
    ['Malakas ang hangin kagabi','kaya nasira ang bubong ng aming kapitbahay.','sanhi'],
    ['Sapagkat maingay silang naghaharutan sa pasilyo,','napagalitan sila ng kanilang punong-guro.','sanhi'],
    ['Dahil sa balat ng saging sa sahig,','nadulas at nagkabukol si Miguel kaninang umaga.','sanhi'],
    ['Kapag hindi ka nagsuot ng \'face mask\',','baka mahawahan ka ng COVID-19.','sanhi'],
    ['Kung hindi ka susunod sa patakaran ng ating kumpanya,','baka matanggal ka sa trabaho.','sanhi'],
    ['Nasira ang bahay nilang katatayo pa lamang','dahil sa malakas na hagupit ng bagyo.','bunga'],
    ['Nadapa ako at nagkaroon ng mga sugat','dahil nasira ang aking sapatos.','bunga'],
    ['Kaya siya nakakuha ng mataas na marka','ay dahil pinag-aralan niyang mabuti ang kanyang leksiyon kagabi.','bunga'],
    ['Nalulugod ang mga magulang ni Luis sa kanya','dahil lagi siyang tumutulong sa kanilang tindahan.','bunga'],
    ['Umiiyak nang malakas ang sanggol','sapagkat gutom na ito.','bunga'],
    ['Gumaling sa paglalaro ng basketbol at itinanghal na MVP ng liga si Dave','dahil sa araw-araw niyang pag-eensayo.','bunga'],
    ['Nabulok ang mga ngipin ni Anne','bunga ng palagi niyang pagnguya ng matatamis na kendi.','bunga'],
    ['Kaya pala naging mababa ang iskor ni Lorna sa pagsusulit','ay dahil sa kanyang pagkakaroon ng \'migraine\' noong kunin niya ito.','bunga'],
    ['Hindi nahuhuli si Glory sa pagpasok sa paaralan','dahil palagi siyang maagang gumising sa umaga.','bunga'],
    ['Madaling nauubos ang pera ni Marina','dahil mahilig siyang bumili ng mga magagarang damit.','bunga'],
    ['Kaya nakabili si Christian ng bagong kotse','ay dahil sa husay niyang mag-ipon at humawak ng pera.','bunga'],
    ['Bihirang magkasakit si Erin','dahil mahilig siyang kumain ng mga masusustansiyang pagkain.','bunga'],
    ['Lumaking magalang at mabait sina Jane at Kristin','sapagkat naging mabuting magulang sina Maria at Manuel.','bunga'],
    ['Marunong maglakad ang asong si Bantay sa dalawang paa lamang','sapagkat matiyaga itong tinuruan ni Tommy.','bunga'],
    ['Magiging eksperto ka sa mga bagong teorya ng pisika','kung pag-aaralan at mauunawaan mo ang aklat na ito.','bunga'],
    ['Baka mag-away kayo ni Kulas','kapag kinuha mo ang paborito niyang laruan.','bunga'],
],
2 => [
    ['Nag-aral siyang mabuti kagabi.','Bunga nito, siya ay nakakuha ng mataas na marka sa pagsusulit.','sanhi'],
    ['Dahil hindi siya nag-ingat,','nahulog si Pablo sa kanal.','sanhi'],
    ['Dahil sa pagtatapon ng basura ng mga tao sa ilog,','nalalason ang mga isda at madalas silang binabaha.','sanhi'],
    ['Sapagkat siya ay masipag sa pag-aaral,','nagkamit siya ng iba’t ibang karangalan sa kanyang paaralan.','sanhi'],
    ['Labis ang pagputol ng mga puno','kaya laganap na ang erosyon ng mga lupain.','sanhi'],
    ['Dahil sa pagpanaw ng kanyang alagang aso,','naging malungkutin si Joshua.','sanhi'],
    ['Magdamag na umiiyak ang sanggol sa loob ng bahay.','Bunga nito\'y hindi nakatulog si Aling Celia.','sanhi'],
    ['Dahil sa kakulangan sa pag-aksyon ng aming mga pinuno,','madalas malubog ang aming bayan sa baha.','sanhi'],
    ['Sapagkat mahusay mag-alaga ng kanyang mga puno si Mang Jose,','palagi silang may prutas sa kusina.','sanhi'],
    ['Dahil sa pagpupuyat ni Jenny sa panonood ng telebisyon,','hindi niya nagawa ang kanyang takdang-aralin.','sanhi'],
    ['Ang paninigarilyo ng isang babaeng buntis','ay nagdudulot ng masasamang epekto sa kanyang sanggol.','sanhi'],
    ['Malakas ang hangin kagabi','kaya nasira ang bubong ng aming kapitbahay.','sanhi'],
    ['Sapagkat maingay silang naglalaro sa pasilyo,','napagalitan sila ng kanilang punong-guro.','sanhi'],
    ['Dahil sa balat ng saging sa sahig,','nadulas at nagkabukol si Miguel kaninang umaga.','sanhi'],
    ['Kapag hindi ka nagsuot ng \'face mask\',','baka mahawahan ka ng COVID-19.','sanhi'],
    ['Kung hindi ka susunod sa patakaran ng ating kumpanya,','baka matanggal ka sa trabaho.','sanhi'],
    ['Nasira ang bahay nila','dahil sa malakas na hagupit ng bagyo.','bunga'],
    ['Nadapa ako at nagkaroon ng mga sugat','dahil nadulas ako sa basang lansangan.','bunga'],
    ['Kaya siya nakakuha ng mataas na marka','ay dahil sa sipag niyang mag-aral.','bunga'],
    ['Nalulugod ang mga magulang ni Luis sa kanya','dahil matataas ang kanyang mga grado.','bunga'],
    ['Umiiyak nang malakas ang sanggol','sapagkat gutom na ito.','bunga'],
    ['Gumaling sa paglalaro ng basketbol si Dave','dahil sa araw-araw niyang pag-eensayo.','bunga'],
    ['Nabulok ang mga ngipin ni Anne','bunga ng palagi niyang pagnguya ng matatamis na kendi.','bunga'],
    ['Kaya pala naging mababa ang iskor ni Lorna sa pagsusulit','ay dahil hindi siya nakapag-aral.','bunga'],
    ['Hindi nahuhuli si Glory sa pagpasok sa paaralan','dahil palagi siyang maagang gumising sa umaga.','bunga'],
    ['Madaling nauubos ang pera ni Marina','dahil mahilig siyang bumili ng mga magagarang damit.','bunga'],
    ['Kaya nakabili si Christian ng bagong kotse','ay dahil sa husay niyang mag-ipon ng pera.','bunga'],
    ['Bihirang magkasakit si Erin','dahil mahilig siyang kumain ng mga masusustansiyang pagkain.','bunga'],
    ['Lumaking magalang at mabait sina Jane at Kristin','sapagkat naging mabuting magulang sina Maria at Manuel.','bunga'],
    ['Marunong sumayaw ang asong si Bantay','sapagkat matiyaga itong tinuruan ni Tommy.','bunga'],
    ['Magiging eksperto ka sa mga bagong teorya ng pisika','kung mauunawaan mo ang aklat na ito.','bunga'],
    ['Baka mag-away kayo ni Kulas','kapag kinuha mo ang paborito niyang laruan.','bunga'],
],
1 => [
    ['Nag-aral siyang mabuti','kaya mataas ang nakuha niyang marka.','sanhi'],
    ['Dahil hindi siya nag-ingat,','nahulog si Pablo sa kanal.','sanhi'],
    ['Dahil sa dami ng basura sa ilog,','madalas kaming bahain.','sanhi'],
    ['Sapagkat siya ay masipag mag-aral,','nagkamit siya ng karangalan.','sanhi'],
    ['Labis ang pagputol ng mga puno','kaya nawawala na ang mga ibon.','sanhi'],
    ['Dahil sa pagkawala ng kanyang tuta,','naging malungkutin si Joshua.','sanhi'],
    ['Magdamag umiyak ang sanggol','kaya hindi nakatulog ang mag-ina.','sanhi'],
    ['Dahil sa malakas na pag-ulan,','bumaha sa aming nayon.','sanhi'],
    ['Sapagkat maraming alagang puno si Mang Jose,','palagi silang may prutas.','sanhi'],
    ['Dahil sa pagpupuyat ni Jenny,','hindi siya nagising nang maaga.','sanhi'],
    ['Ang paninigarilyo','ay nagdudulot ng sakit sa baga.','sanhi'],
    ['Malakas ang hangin kagabi','kaya nasira ang bubong ng aming bahay.','sanhi'],
    ['Sapagkat maingay silang maglaro,','napagalitan sila ng kanilang guro.','sanhi'],
    ['Dahil sa balat ng saging sa sahig,','nadulas si Mang Miguel.','sanhi'],
    ['Kapag hindi ka nagsapatos,','hindi ka papapasukin sa restoran.','sanhi'],
    ['Kung hindi ka susunod sa iyong amo,','matatanggal ka sa trabaho.','sanhi'],
    ['Nasira ang bahay nila','dahil sa malakas na bagyo.','bunga'],
    ['Umiiyak ang sanggol','sapagkat gutom na ito.','bunga'],
    ['Nadulas ako','dahil basa ang lansangan.','bunga'],
    ['Siya ang pinakamataas sa pagsusulit','dahil nag-aral siyang mabuti.','bunga'],
    ['Nalulugod ang mga magulang ni Luis','dahil siya ay masunurin.','bunga'],
    ['Gumaling si Dave sa basketbol','dahil araw-araw siyang nag-eensayo.','bunga'],
    ['Nabulok ang mga ngipin ni Anne','sapagkat hindi siya nagsisipilyo.','bunga'],
    ['Mababa ang iskor ni Lorna sa pagsusulit','dahil hindi siya nakapag-aral.','bunga'],
    ['Hindi nahuhuli si Glory sa pagpasok','dahil maaga siyang gumising.','bunga'],
    ['Madaling nauubos ang pera ni Marina','dahil masyado siyang magastos.','bunga'],
    ['Nakabili si Christian ng kotse','dahil maganda ang kanyang trabaho.','bunga'],
    ['Bihirang magkasakit si Erin','dahil masustansiya ang kanyang kinakain.','bunga'],
    ['Lumaking masaya si Jane','sapagkat maaruga ang kanyang mga magulang.','bunga'],
    ['Marunong sumayaw ang asong si Bantay','sapagkat tinuruan ito ni Tommy.','bunga'],
    ['Magiging eksperto ka sa agham','kung mauunawaan mo ang aklat na ito.','bunga'],
    ['Mag-aaway kayo ni Kulas','kapag kinuha mo ang paborito niyang laruan.','bunga'],
],
 ];
$banks = [$tier => $sourceBanks[$tier]];
function pua_question(array $entry, string $tier, string $lvl): array {
    [$a, $b, $first] = $entry;
    $pick = random_int(0, 1);
    $second = $first === 'sanhi' ? 'bunga' : 'sanhi';
    $parts = [pua_h($a), pua_h($b)];
    $parts[$pick] = '<strong style="color:#CC0066;">' . $parts[$pick] . '</strong>';
    return ['word'=>implode(' ', $parts), 'correct'=>$pick === 0 ? $first : $second, 'choices'=>['sanhi','bunga'], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$tier = (string)$tier;
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
    foreach ($available as $idx) $byCategory[$banks[$tier][$idx][2]][] = $idx;
    $category = array_rand($byCategory);
    $i = $byCategory[$category][array_rand($byCategory[$category])];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pua_question($banks[$tier][$i], $tier, $lvl);
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
        <strong>Sagot: <span style="color:#CC0066;"><?php echo pua_h(ucfirst($cur['correct'])); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Sabihin kung ang pulang bahagi ng teksto ay nagpapahayag ng sanhi o bunga.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pua_h(ucfirst($choice)); ?>
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
