<?php
// filipino/modules/tahas-basal.php
// Procedural concrete and abstract noun identification.

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
$moduleTitle = 'Pangngalang Tahas at Basal';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 3) {
    http_response_code(403);
    exit('Ang modyul na ito ay para sa Baitang 3 pataas.');
}
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$tier = ($grd <= 4 ? 'lower' : 'upper') . ':' . $lvl;
function lay_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
if ($grd <= 4) {
$tnouns = [
    1 => ['bayong', 'buwaya', 'daliri', 'gagamba', 'halaman', 'kalabaw', 'kaldero', 'kamatis', 'kambing', 'kandila', 'kusina', 'kutsara', 'lambat', 'lubid', 'maleta', 'ngipin', 'pagkain', 'palaka', 'palakol', 'palayok', 'pinggan', 'pisngi', 'pitaka', 'salapi', 'tinapay', 'tinidor', 'tuwalya', 'sagwan', 'sandata', 'sandok', 'sapatos', 'unggoy', 'watawat'],
    2 => ['alahas', 'asukal', 'aspile', 'bagoong', 'balabal', 'balbas', 'balikat', 'bandila', 'barbero', 'baterya', 'bigote', 'bisikleta', 'bulaklak', 'bumbero', 'bumbilya', 'gorilya', 'elepante', 'hagdanan', 'haligi', 'kaibigan', 'kalansay', 'kamag-anak', 'kamag-aral', 'karayom', 'kariton', 'kastilyo', 'katoto', 'kisame', 'klinika', 'kometa', 'kurtina', 'kusinera', 'kuwago', 'kutsilyo', 'mansanas', 'martilyo', 'minero', 'niyebe', 'paaralan', 'palengke', 'pamaypay', 'paminta', 'pantalon', 'salamin', 'sinturon', 'sipilyo', 'tsinelas', 'yungib'],
    3 => ['abaniko', 'alupihan', 'alakdan', 'alapaap', 'alimasag', 'alulod', 'ambulansiya', 'ardilya', 'balahibo', 'balkonahe', 'basurahan', 'batingaw', 'binibini', 'buhangin', 'himpilan', 'kagubatan', 'kalabasa', 'kalasag', 'kalawang', 'kalendaryo', 'karagatan', 'kasangkapan', 'kompyuter', 'mananayaw', 'mangingisda', 'pagamutan', 'paliparan', 'sirkero', 'talampakan', 'tapete'],
];
$bnouns = [
    1 => ['asal', 'awa', 'buhay', 'edad', 'gulat', 'gutom', 'inip', 'isip', 'lakas', 'linggo', 'luho', 'mangha', 'mithi', 'nais', 'oras', 'pag-asa', 'pag-ibig', 'pagod', 'pangako', 'galit', 'respeto', 'sanhi', 'selos', 'sisi', 'suwerte', 'tagal', 'taon', 'tiyaga', 'takot', 'talino', 'tiwala', 'tulog', 'tuwa', 'ugali'],
    2 => ['alaala', 'alitan', 'anihan', 'bakasyon', 'bisa', 'budhi', 'dahilan', 'dangal', 'digmaan', 'diwa', 'duda', 'gana', 'gawi', 'grasya', 'halalan', 'hatol', 'himala', 'hinala', 'husay', 'inggit', 'kaarawan', 'kabaitan', 'kabutihan', 'kagandahan', 'kahinaan', 'kahulugan', 'kalayaan', 'kalidad', 'kalusugan', 'kasiyahan', 'katapatan', 'kultura', 'layon', 'pagkatao', 'panaginip', 'relihiyon', 'serbisyo', 'tagumpay'],
    3 => ['edukasyon', 'kahihiyan', 'kakayahan', 'kamatayan', 'kapalaran', 'kapayapaan', 'karamdaman', 'karanasan', 'karapatan', 'karukhaan', 'karunungan', 'kasaysayan', 'katahimikan', 'katapangan', 'katarungan', 'katauhan', 'layunin', 'lohika', 'luwalhati', 'misteryo', 'paghanga', 'paghihiganti', 'pagkabaliw', 'pagkatalo', 'pamahiin', 'pangamba', 'pasensiya', 'politika', 'prinsipyo', 'sakripisyo', 'saloobin', 'tadhana', 'tungkulin'],
];
}
elseif ($grd >= 5) {
$tnouns = [
    1 => ['alakdan', 'bagoong', 'bakulaw', 'balabal', 'balahibo', 'balkonahe', 'basurahan', 'binibini', 'buhangin', 'hagdanan', 'hurno', 'insekto', 'kalabasa', 'kalawang', 'karagatan', 'karayom', 'kastilyo', 'klinika', 'kometa', 'kusinera', 'liyabe', 'mananayaw', 'niyebe', 'ospital', 'pagamutan', 'paliparan', 'pantalon', 'payaso', 'sinturon', 'sirkero', 'tahanan', 'tahong', 'talaba', 'tapete', 'templo'],
    2 => ['abaniko', 'alupihan', 'alapaap', 'alimasag', 'alulod', 'ambulansiya', 'ardilya', 'batingaw', 'bisagra', 'burador', 'garapon', 'himpilan', 'kagubatan', 'kalasag', 'kaldero', 'kalendaryo', 'kasangkapan', 'katig', 'kompyuter', 'kumunoy', 'kuwerdas', 'metronom', 'modista', 'pahayagan', 'piramide', 'punong-kahoy', 'puswelo', 'saranggola', 'silindro', 'simboryo', 'talampas', 'talangka', 'tanikala'],
    3 => ['amatista', 'araknida', 'balintataw', 'bulalakaw', 'bukung-bukong', 'estalagmita', 'estalaktita', 'hiringgilya', 'hunyango', 'kapaligiran', 'kapatagan', 'kapuluan', 'katakumba', 'kubyertos', 'labirint', 'largabista', 'manananggol', 'mandirigma', 'mangangaso', 'megalit', 'mikroskopyo', 'palaisdaan', 'periskop', 'salagubang', 'sekretarya', 'sinapupunan', 'sinigwelas', 'talampakan', 'talulot', 'teleskopyo', 'termometro'],
];
$bnouns = [
    1 => ['alaala', 'alitan', 'anihan', 'bakasyon', 'budhi', 'dahilan', 'damdamin', 'dangal', 'digmaan', 'edukasyon', 'ginhawa', 'grasya', 'halalan', 'hatinggabi', 'hatol', 'himala', 'hinala', 'husay', 'inggit', 'kaarawan', 'kabaitan', 'kabutihan', 'kagandahan', 'kahihiyan', 'kahinaan', 'kahulugan', 'kakayahan', 'kamatayan', 'kapalaran', 'kapayapaan', 'karamdaman', 'karanasan', 'karapatan', 'karunungan', 'kasaysayan', 'katahimikan', 'kalayaan', 'kalidad', 'kalusugan', 'kasiyahan', 'kultura', 'layon', 'layunin', 'lohika', 'luwalhati', 'misteryo', 'mungkahi', 'paghanga', 'pagkabaliw', 'pagkatalo', 'pagkatao', 'pamahiin', 'panaginip', 'pangamba', 'pasensiya', 'politika', 'relihiyon', 'serbisyo', 'tadhana', 'tagumpay', 'tungkulin'],
    2 => ['abilidad', 'anibersaryo', 'disiplina', 'hanapbuhay', 'hangarin', 'kaalaman', 'kaayusan', 'kabiguan', 'kabuluhan', 'kadalisayan', 'kagandahang-loob', 'kaginhawaan', 'kagitingan', 'kahalagahan', 'kaligayahan', 'kaligtasan', 'kalungkutan', 'kalupitan', 'kapatawaran', 'karangyaan', 'karukhaan', 'katapangan', 'katapatan', 'katarungan', 'katatagan', 'katauhan', 'katiyakan', 'kaugnayan', 'katotohanan', 'kaunlaran', 'lakas-loob', 'moralidad', 'pagbubuntis', 'paghihiganti', 'paggunita', 'pagkakaibigan', 'pagkasuklam', 'pagkukunwari', 'pagmamalabis', 'pagpapahalaga', 'pagsalubong', 'pagsang-ayon', 'pagtanggap', 'pagtanggi', 'pagtatapos', 'pakikilahok', 'pakikiramay', 'pakikitungo', 'pamumuno', 'paniniwala', 'pighati', 'prinsipyo', 'sakripisyo', 'saloobin', 'sigasig'],
    3 => ['alinlangan', 'arkeolohiya', 'astrolohiya', 'astronomiya', 'dedikasyon', 'demokrasya', 'diktadura', 'gramatika', 'heograpiya', 'imahinasyon', 'impluwensiya', 'inspirasyon', 'integridad', 'interpretasyon', 'kabalintunaan', 'kabanalan', 'kabayanihan', 'kabihasnan', 'kakisigan', 'kalinawan', 'kalinangan', 'kamangmangan', 'kapakumbabaan', 'kapanahunan', 'kapanatagan', 'kapangyarihan', 'kapatawaran', 'kapayakan', 'kasaganaan', 'kasakiman', 'kasarinlan', 'katiwalian', 'kinahinatnan', 'komunikasyon', 'komunismo', 'nasyonalismo', 'obligasyon', 'pag-aalinlangan', 'pagkamalikhain', 'pagninilay', 'pagpapakumbaba', 'pagsusumamo', 'pakikidalamhati', 'pakundangan', 'pananampalataya', 'personalidad', 'reputasyon', 'sentimyento', 'sikolohiya', 'simpatiya'],
];
}
$tiers = $lvl === 'Easy' ? [1] : [2,3];
$banks = [$tier => []];
$seen = [];
foreach ($tiers as $n) {
    foreach (['tahas'=>$tnouns[$n], 'basal'=>$bnouns[$n]] as $kind=>$words) {
        foreach ($words as $word) {
            if (isset($seen[$kind][$word])) continue;
            $seen[$kind][$word] = true;
            $banks[$tier][] = [$word, $n, $kind];
        }
    }
}
function lay_question(array $entry, string $tier, string $lvl): array {
    global $tnouns, $bnouns;
    $choices = $entry[2] === 'tahas' ? $bnouns[$entry[1]] : $tnouns[$entry[1]];
    $choices = array_values(array_diff(array_unique($choices), [$entry[0]]));
    shuffle($choices);
    $wrong = array_slice($choices, 0, 3);
    $choices = array_merge($wrong, [$entry[0]]);
    shuffle($choices);
    return ['correct'=>$entry[0], 'choices'=>$choices, 'wrong'=>$wrong, 'kind'=>$entry[2], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $byKind = [];
    foreach ($available as $index) $byKind[$banks[$tier][$index][2]][] = $index;
    $kind = array_rand($byKind);
    $i = $byKind[$kind][array_rand($byKind[$kind])];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = lay_question($banks[$tier][$i], $tier, $lvl);
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
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Ang salitang <span style="color:#CC0066;"><?php echo lay_h($cur['correct']); ?></span> ay pangngalang <?php echo lay_h($cur['kind']); ?>.</strong>
        <p>Ang mga salitang <?php echo lay_h(implode(', ', $cur['wrong'])); ?> ay mga pangngalang <?php echo $cur['kind'] === 'tahas' ? 'basal' : 'tahas'; ?>.</p>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang pangngalang <span style="color:#CC0066;"><?php echo lay_h($cur['kind']); ?></span> sa mga ito:</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo lay_h($choice); ?>
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
