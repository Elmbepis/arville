<?php
// filipino/modules/pang-angkop.php
// Six grade-dependent sentence banks.

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
$moduleTitle = 'Paggamit ng Tamang Pang-angkop';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pakop_tier(string $lvl, int $grd): int { return $lvl === 'Hard' ? 2 : 1; }
function pakop_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

$legacyBanks = [
1 => ['bago na damit>bago + damit<bagong damit*damit na bago', 'bali na lapis>bali + lapis<baling lapis*lapis na bali', 'basa na sisiw>sisiw + basa<basang sisiw*sisiw na basa', 'bata na malikot>bata + malikot<batang malikot*malikot na bata', 'bota na basa>bota + basa<basang bota*botang basa', 'bote na basag>bote + basag<basag na bote*boteng basag', 'bato na matigas>bato + matigas<matigas na bato*batong matigas', 'daan na makipot>daan + makipot<makipot na daan*daang makipot', 'dahon na mahaba>dahon + mahaba<mahabang dahon*dahong mahaba', 'kape na matamis>kape + matamis<kapeng matamis*matamis na kape', 'kahon na maliit>kahon + maliit<maliit na kahon*kahong maliit', 'kotse na asul>kotse + asul<asul na kotse*kotseng asul', 'kubo na madilim>madilim + kubo<madilim na kubo*kubong madilim', 'luma na aklat>luma + aklat<lumang aklat*aklat na luma', 'lupa na basa>lupa + basa<lupang basa*basang lupa', 'ibon na itim>ibon + itim<ibong itim*itim na ibon', 'isda na inihaw>isda + inihaw<inihaw na isda*isdang inihaw', 'matanda na tao>matanda + tao<matandang tao*taong matanda', 'prito na manok>prito + manok<pritong manok*manok na prito', 'pula na damit>pula + damit<pulang damit*damit na pula', 'pusa na maliksi>pusa + maliksi<pusang maliksi*maliksing pusa', 'puti na bahay>bahay + puti<bahay na puti*puting bahay', 'puno na mataas>puno + mataas<punong mataas*mataas na puno', 'relo na makintab>relo + makintab<relong makintab*makintab na relo', 'suman na masarap>suman + masarap<sumang masarap*masarap na suman', 'tabo na butas>tabo + butas<tabong butas*butas na tabo', 'tasa na bago>tasa + bago<tasang bago*bagong tasa', 'tawa na malakas>tawa + malakas<tawang malakas*malakas na tawa', 'tuta na masaya>tuta + masaya<tutang masaya*masayang tuta', 'yupi na lata>lata + yupi<yuping lata*latang yupi'],
2 => ['balita na kumalat>balita + kumalat<balitang kumalat*kumalat na balita', 'buwaya na mabangis>mabangis + buwaya<mabangis na buwaya*buwayang mabangis', 'dalaga na marikit>dalaga + marikit<dalagang marikit*marikit na dalaga', 'dayuhan na palaboy>dayuhan + palaboy<dayuhang palaboy*palaboy na dayuhan', 'gusali na matatag>gusali + matatag<gusaling matatag*matatag na gusali', 'hagdanan na matarik>hagdanan + matarik<hagdanang matarik*matarik na hagdanan', 'huwaran na mamamayan>huwaran + mamamayan<huwarang mamamayan*mamamayang huwaran', 'labanan na madugo>labanan + madugo<madugong labanan*labanang madugo', 'laruan na makulay>laruan + makulay<laruang makulay*makulay na laruan', 'kabundukan na kalbo>kabundukan + kalbo<kabundukang kalbo*kalbong kabundukan', 'kalaban na mahigpit>kalaban + mahigpit<kalabang mahigpit*mahigpit na kalaban', 'kalabasa na malasa>kalabasa + malasa<kalabasang malasa*malasang kalabasa', 'kalsada na malubak>kalsada + malubak<kalsadang malubak*malubak na kalsada', 'maganda na damit>damit + maganda<damit na maganda*magandang damit', 'mamahalin na maleta>mamahalin + maleta<mamahaling maleta*maletang mamahalin', 'mamahalin na singsing>singsing + mamahalin<mamahaling singsing*singsing na mamahalin', 'masusi na pag-aaral>masusi + pag-aaral<masusing pag-aaral*pag-aaral na masusi', 'pag-aaruga na kulang>pag-aaruga + kulang<pag-aarugang kulang*kulang na pag-aaruga', 'pagbaha na madalas>pagbaha + madalas<pagbahang madalas*madalas na pagbaha', 'paliparan na malawak>malawak + paliparan<paliparang malawak*malawak na paliparan', 'pamayanan na matao>matao + pamayanan<mataong pamayanan*pamayanang matao', 'pantalon na maong>pantalon + maong<pantalong maong*maong na pantalon', 'proyekto na mainam>proyekto + mainam<proyektong mainam*mainam na proyekto', 'salamin na malabo>salamin + malabo<salaming malabo*malabong salamin', 'tuwalya na makapal>makapal + tuwalya<makapal na tuwalya*tuwalyang makapal'],
3 => ['digmaan na walang humpay>digmaan + walang humpay<digmaang walang humpay*walang humpay na digmaan', 'imbestigasyon na masusi>imbestigasyon + masusi<masusing imbestigasyon*imbestigasyong masusi', 'ipinaglaban na katotohanan>katotohanan + ipinaglaban<ipinaglabang katotohanan*katotohanang ipinaglaban', 'kalagayan na maselan>kalagayan + maselan<maselang kalagayan*kalagayang maselan', 'kaparusahan na itinakda>kaparusahan + itinakda<kaparusahang itinakda*itinakdang kaparusahan', 'katwiran na depektibo>katwiran + depektibo<katwirang depektibo*depektibong katwiran', 'kinagisnan na kabuhayan>kinagisnan + kabuhayan<kinagisnang kabuhayan*kabuhayang kinagisnan', 'layunin na ibinunyag>ibinunyag + layunin<layuning ibinunyag*ibinunyag na layunin', 'libangan na kawili-wili>libangan + kawili-wili<kawili-wiling libangan*libangang kawili-wili', 'makabuluhan na batas>batas + makabuluhan<batas na makabuluhan*makabuluhang batas', 'mariwasa na pamumuhay>mariwasa + pamumuhay<mariwasang pamumuhay*pamumuhay na mariwasa', 'pag-aani na masagana>pag-aani + masagana<pag-aaning masagana*masaganang pag-aani', 'maalalahanin na kaopisina>maalalahanin + kaopisina<maalalahaning kaopisina*kaopisinang maalalahanin', 'matiyaga na paghihintay>paghihintay + matiyaga<matiyagang paghihintay*paghihintay na matiyaga', 'nalimutan na pangako>nalimutan + pangako<nalimutang pangako*pangakong nalimutan', 'paliparan na makabago>paliparan + makabago<paliparang makabago*makabagong paliparan', 'pamahalaan na mapagmalabis>pamahalaan + mapagmalabis<pamahalaang mapagmalabis*mapagmalabis na pamahalaan', 'pamilihan na pampubliko>pamilihan + pampubliko<pamilihang pampubliko*pampublikong pamilihan', 'proyekto na pambansa>proyekto + pambansa<pambansang proyekto*proyektong pambansa', 'patakaran na hindi tama>patakaran + hindi tama<patakarang hindi tama*hindi tamang patakaran', 'rebulto na nakakatakot>nakakatakot + rebulto<nakakatakot na rebulto*rebultong nakakatakot', 'sarado na pag-iisip>pag-iisip + sarado<saradong pag-iisip*pag-iisip na sarado', 'suliranin na napakabigat>suliranin + napakabigat<suliraning napakabigat*napakabigat na suliranin', 'telebisyon na makabago>makabago + telebisyon<makabagong telebisyon*telebisyong makabago', 'walang hanggan na pag-ibig>pag-ibig + walang hanggan<pag-ibig na walang hanggan*walang hanggang pag-ibig'],
];
$banks = [1 => $legacyBanks[1], 2 => array_merge($legacyBanks[2], $legacyBanks[3])];
$tier = pakop_tier($lvl, $grd);
function pakop_question(string $raw, int $tier, string $lvl): array {
    [$correct, $word, $a, $b] = preg_split('/[><*]/', $raw);
    $choices = [$correct, $a, $b]; shuffle($choices);
    return ['word'=>$word, 'correct'=>$correct, 'choices'=>$choices, 'valid'=>[$a,$b], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = pakop_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo pakop_h($cur['word']); ?><br/><br/>May mali sa paggamit ng pang-angkop sa pariralang <strong style="color:#CC0066;">'<?php echo pakop_h($cur['correct']); ?>'</strong>.<br/><br/>Ang paggamit ng pang-angkop ay tama sa mga pariralang '<?php echo pakop_h($cur['valid'][0]); ?>' at '<?php echo pakop_h($cur['valid'][1]); ?>'.
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:20pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo pakop_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang pariralang may <strong style="color:#CC0066;">MALING</strong> paggamit ng pang-angkop.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 1;
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
