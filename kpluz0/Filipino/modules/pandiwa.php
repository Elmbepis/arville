<?php
// filipino/modules/pandiwa.php
// Eleven grade-dependent noun, verb and adjective banks.

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
$moduleTitle = 'Pagkilala sa Pandiwa';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pdw_tier(string $lvl, int $grd): int {
    return min(8, $grd) + ($lvl === 'Hard' ? 2 : 0);
}
function pdw_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$nouns = [
    0 => ["aso", "ahas", "ate", "bahay", "baso", "bata", "bibi", "bibig", "bote", "ibon", "itik", "daga", "dahon", "damit", "gatas", "guro", "hari", "ilaw", "isda", "kama", "kubo", "kuko", "lapis", "lupa", "manok", "mata", "nanay", "noo", "paa", "papel", "pera", "puno", "pusa", "sako", "siko", "susi", "tao", "tasa", "tatay", "ulan", "ulap", "unan"],
    1 => ["aso", "ahas", "ate", "bahay", "baso", "bata", "bibi", "bibig", "bote", "buhok", "binti", "ibon", "itik", "daga", "dahon", "damit", "gatas", "guro", "hari", "ilaw", "isda", "kahon", "kama", "kamay", "kape", "kubo", "kuko", "lapis", "lupa", "manok", "mata", "nanay", "noo", "paa", "papel", "pera", "puno", "pusa", "sako", "siko", "susi", "tao", "tasa", "tatay", "ulan", "ulap", "unan"],
    2 => ["aklat", "bakya", "balat", "balde", "balsa", "bangka", "barko", "batok", "braso", "bulsa", "butil", "butiki", "ilong", "gunting", "kabayo", "kalye", "kilay", "kotse", "kumot", "liham", "mangga", "medyas", "papaya", "patis", "pulis", "pinsan", "pinya", "sabon", "sahig", "saging", "sando", "silya", "suman", "tigre", "tinik", "tiyan", "tubig", "tuhod", "walis"],
    3 => ["balbas", "balita", "bigote", "barbero", "bayong", "bubuyog", "bumbero", "busal", "buwaya", "daliri", "gagamba", "halaman", "kalabaw", "kaldero", "kambing", "kandila", "kariton", "kusina", "katoto", "kutsara", "lambat", "lubid", "maleta", "mansanas", "ngipin", "pagkain", "palaka", "palakol", "palayok", "pinggan", "pisngi", "pitaka", "salapi", "tinapay", "tinidor", "titik", "tuwalya", "sagwan", "sandata", "sandok", "sapatos", "unggoy", "watawat"],
    4 => ["alahas", "alamat", "asukal", "aspile", "balabal", "balikat", "bandila", "baterya", "binibini", "bisikleta", "bulaklak", "bumbilya", "busina", "gorilya", "elepante", "haligi", "kaibigan", "kalaban", "kalansay", "kamag-anak", "kamag-aral", "karera", "katoto", "kisame", "kurtina", "kuwago", "kutsilyo", "larawan", "martilyo", "minero", "niyebe", "paaralan", "pamaypay", "pantalon", "puwesto", "salamin", "sipilyo", "talino", "tsinelas"],
    5 => ["almusal", "balabal", "balahibo", "bagoong", "basurahan", "binibini", "buhangin", "halimaw", "hapunan", "kahulugan", "kaibigan", "kalaban", "kalansay", "kalawang", "kamag-anak", "kamag-aral", "karayom", "kariton", "kasiyahan", "katuwaan", "mangingisda", "pag-aaral", "pagbati", "pagputok", "palengke", "paliparan", "pampang", "sagisag", "sinturon", "suweldo"],
    6 => ["alakdan", "bangungot", "himpilan", "kababata", "kabanata", "kabutihan", "kagandahan", "kagubatan", "kahulugan", "kalabasa", "kalansing", "kalasag", "kalawakan", "kaligayahan", "karagatan", "karanasan", "kasiyahan", "katibayan", "katotohanan", "mananayaw", "manganganta", "pagamutan", "pagdawit", "pagsusulat", "pagsusulit", "pagsusuri", "pagtututo", "paligsahan", "pakialam", "pakiusap", "tadhana", "talampakan", "tanghalian", "tikbalang"],
    7 => ["bangungot", "burador", "hatinggabi", "kaayusan", "kabiguan", "kahandaan", "kahalagahan", "kalansing", "kalawakan", "kapalaran", "kapangitan", "karagatan", "karangalan", "karapatan", "katapatan", "katibayan", "kaugnayan", "pagdurusa", "pagdiriwang", "paghihiganti", "pagkilala", "paglilitis", "pagsasalita", "pagtanggi", "pakikiisa", "pakikisama", "pananabik", "pangungusap", "panunukso", "pasalubong", "patibong", "saranggola", "tampuhan", "tanikala", "takipsilim"],
    8 => ["bukang-liwayway", "instrumento", "kabaliwan", "kabiguan", "kabuluhan", "kadakilaan", "kaguluhan", "kapaligiran", "karahasan", "kasaganahan", "kasipagan", "katahimikan", "katarungan", "katiyakan", "kaugnayan", "pagdurusa", "paghihiganti", "paggunita", "pagkakaisa", "pagsalubong", "pagsasanay", "pagtataboy", "pakikialam", "pakikiramay", "pakikitungo", "palaisipan", "palaisdaan", "pamamayapa", "pamimilit", "panunukso", "salagubang", "talambuhay"],
    9 => ["alinlangan", "kabagsikan", "kabalintunaan", "kabuktutan", "kalinangan", "kapayapaan", "kapatawaran", "karahasan", "karamdaman", "karangyaan", "paggunita", "pagkasuklam", "pagkukunwari", "pagpapahalaga", "pagsalubong", "pagsang-ayon", "pakikidalamhati", "pakikilahok", "pakikiramay", "pakikitungo", "pakundangan", "palaisdaan", "pamamayapa", "pambubulabog", "pananampalataya", "paninindigan", "sanlibutan"],
    10 => ["kabalintunaan", "kabuktutan", "kalinangan", "kaluguran", "kapayapaan", "kapatawaran", "karamdaman", "karangyaan", "katingkaran", "pagkakalarawan", "pagkamainipin", "pagkamayabang", "pagkukunwari", "pagmamalabis", "pagninilay", "pagpapakumbaba", "pagsusumamo", "pakikidalamhati", "pakikiramay", "pakikitungo", "pakundangan", "pambubulabog", "pangangalikot", "pangungumpisal", "paninibugho", "sangkatauhan"],
];
$verbs = [
    0 => ["bumaba", "bumasa", "bumili", "hinila", "inawit", "inalis", "kumain", "lumiko", "nabago", "nabali", "nabasa", "nahati", "nahuli", "nakita", "nakuha", "naligo", "nasabi", "nawala", "pumila", "pumili", "sumama", "sumara", "sumaya", "sumira", "sumuko", "tumaas", "tumama", "tumawa", "tumayo", "umawit", "umiyak", "uminom"],
    1 => ["bumaba", "bumasa", "bumili", "hinila", "inawit", "inalis", "kumain", "lumiko", "nabago", "nabali", "nabasa", "nahati", "nahuli", "nakita", "nakuha", "naligo", "nasabi", "nawala", "pumila", "pumili", "sumama", "sumara", "sumaya", "sumira", "sumuko", "tumaas", "tumama", "tumawa", "tumayo", "umawit", "umiyak", "uminom"],
    2 => ["binago", "binili", "bumali", "bumasag", "hinigop", "humila", "humina", "humuli", "inaayos", "inabot", "inamoy", "iniinom", "inipon", "isasama", "kinain", "kumibo", "kumuha", "lumago", "luminaw", "nabawi", "nabura", "nagalit", "nagbasa", "nagsulat", "nagtago", "naisip", "natawa", "natulog", "sumagot", "tumawag", "umalis", "umiikot"],
    3 => ["binigyan", "binuhat", "bumago", "ibinalot", "gumamit", "gumasta", "humawak", "inihagis", "ipinasa", "isusuot", "kumanta", "kumilos", "lumakad", "lumipad", "nabigo", "nagalit", "nagbasa", "nagbukas", "nagluto", "nagsara", "nagsulat", "nagtago", "nagulat", "nasunog", "natulog", "natumba", "ngumiti", "pumitas", "pumuna", "sinikap", "sumagip", "sumayaw", "sumigaw", "sumipa", "sumipol", "tumakbo", "tumalon", "tumikim", "umaawit", "umalon", "umandar", "umulit"],
    4 => ["binubuhat", "binabalot", "bumangon", "bumasa", "bumilang", "bumuhos", "bumukas", "dumalaw", "dumamay", "gumuhit", "hahatiin", "humingi", "ibinigay", "iniligtas", "isinara", "isinuot", "itinapon", "kumakain", "kumakanta", "kumaway", "kumidlat", "kumikibo", "lumaban", "lumangoy", "lumayas", "magluluto", "nabuwal", "nagbukas", "nagsunog", "nagtanong", "naitago", "nakisayaw", "nangitlog", "pumalag", "pumukol", "sinagot", "sinanay", "sumaklolo", "tinamaan", "tinikman", "tumakas", "tumatakbo", "tumatalon", "umangat", "umiikot", "yumabong", "yumanig"],
    5 => ["binabago", "binabayo", "binibilang", "binuksan", "dinagit", "dinamihan", "dinayo", "dumadalaw", "dumungaw", "dumadalo", "dumaong", "gumulong", "humiling", "ibinilad", "iginuhit", "ipinakita", "kinahig", "kumalas", "kumindat", "kumikita", "kumislap", "lumilinaw", "minamahal", "nabiktima", "nagbanta", "nagsimula", "naitala", "nagtiklop", "nagbahagi", "nagpatawa", "nagsimula", "nagsunog", "nagtanong", "pinagalitan", "pumipigil", "sinaktan", "sinariwa", "sumiklab", "sumulyap", "tumatakas", "tinamaan", "umaangat", "umuulit"],
    6 => ["binalaan", "babaguhin", "babayuhin", "binagsakan", "binigkas", "dinadagit", "dinamdam", "dinibdib", "dumadayo", "dumagsa", "dumadalo", "dumungaw", "ginantihan", "hinigpitan", "humihingi", "humihiling", "ibinulsa", "ibinalita", "iginuhit", "ipinagtaka", "isinagawa", "kakalasin", "kumalam", "kumislap", "lumiban", "lumikas", "magsasauli", "nabiktima", "nagbabanta", "nagbunyi", "naghimagsik", "nagpatala", "nagbahagi", "nagpabilis", "nagpatawa", "nagtiklop", "naibilad", "naiulat", "nakiramay", "nanuluyan", "pinalipas", "pinayagan", "pumipigil", "sinabitan", "sinimulan", "sinundan", "sinigawan", "tinanong", "tumanggap"],
    7 => ["binabalaan", "binulabog", "binulyawan", "bumabagtas", "bumibigkas", "bumiyahe", "dumarayo", "dumadagsa", "gugunitain", "hahandugan", "ibinabalita", "inaalagaan", "iniulat", "ipinagdasal", "ipinuslit", "kumakalam", "lumulusob", "minamaliit", "naghimagsik", "naglakip", "nagmungkahi", "nagpabilis", "nakapagtala", "nakiraan", "nakiramay", "nakaratay", "nagbubunyi", "nagmatigas", "nagningas", "nagsagawa", "nagtanggol", "naminsala", "nangasiwa", "nanuluyan", "nasigawan", "natanggal", "pinagbigyan", "pinagitnaan", "pinalibutan", "pumaslang", "sinimulan", "sinusuri", "tinitigan", "tumatanggap"],
    8 => ["binalatuhan", "binatikos", "binulabog", "binulyawan", "ginugunita", "hahantungan", "inilarawan", "iniugnay", "ipagdarasal", "ipinagpaliban", "ipinagtanggol", "isiniwalat", "kakalabanin", "kumakayod", "kumaripas", "lumulundo", "magagalusan", "nagmamatigas", "nagniningas", "nagsasagawa", "nagsiyasat", "nakaratay", "mamiminsala", "namimingwit", "nangangasiwa", "napariwara", "pababasahin", "pinabinyagan", "pinaghandaan", "pinakiusapan", "pinaniwalaan", "pumalaot", "pumaslang", "pumupukaw", "pumuslit", "sasariwain", "sinisindak", "sumasambit", "tumatambad", "umalingawngaw"],
    9 => ["babalatuhan", "binabatikos", "binusalan", "ginalugad", "gugunitain", "iminungkahi", "iniuugnay", "ikalulugod", "ipinagpaalam", "ipinangalandakan", "isinisiwalat", "itinatampok", "kumalansing", "kumakaripas", "lumalagda", "nabigwasan", "magagalusan", "mamimintuho", "nagugulumihanan", "namumutawi", "napaririwara", "palalawigin", "paparatangan", "pinaalalahanan", "pinagmalabisan", "pinagsumikapan", "pinasalubungan", "pumalaot", "puminsala", "tinatalakay", "umalingawngaw"],
    10 => ["babatikusin", "binabalatuhan", "binubusalan", "bubusisiin", "gagalugarin", "ikinalulugod", "iminumungkahi", "ipinagpaliban", "ipinagpapaalam", "ipinangalandakan", "isinisiwalat", "itinatampok", "kinakanlong", "kumakalansing", "nabigwasan", "nagugulumihanan", "namimintuho", "namumutawi", "napaririwara", "paparatangan", "pinagmamalabisan", "pinapaalalahanan", "pinagsusumikapan", "pinasalubungan", "pumipinsala", "tatangkilikin", "tumitingala", "umalingawngaw"],
];
$adjectives = [
    0 => ["bago", "bilog", "hilaw", "hinog", "kalbo", "luma", "mababa", "mabaho", "mabait", "mahina", "malayo", "malaki", "maliit", "maputi", "mapula", "masaya", "mataas", "mataba", "payat", "tamad"],
    1 => ["bago", "bilog", "hilaw", "hinog", "kalbo", "luma", "mababa", "mabaho", "mabait", "mahina", "malayo", "malaki", "maliit", "maputi", "mapula", "masaya", "mataas", "mataba", "paos", "payat", "tamad", "unat"],
    2 => ["hilaw", "hinog", "maayos", "mababa", "mabaho", "mabait", "mabuti", "magaan", "mahaba", "mahina", "maitim", "malabo", "malaki", "malapit", "maliit", "maputi", "masaya", "mataas", "mataba", "pangit", "sapat", "tiyak"],
    3 => ["bihasa", "guwapo", "maalat", "maasim", "mabango", "mabilis", "mabigat", "mabuti", "madali", "magaan", "maganda", "mahina", "mahaba", "mahirap", "mahusay", "mainit", "malabo", "malakas", "malamig", "malalim", "malapit", "malawak", "maliit", "maluwag", "mapait", "masama", "masikip", "masipag", "matino", "matamis", "matakaw", "matanda", "matigas", "matibay", "matinik", "mayaman", "sabik", "sarado", "tanyag", "tumpak", "tahimik"],
    4 => ["bantog", "kabado", "kuripot", "maalat", "maasim", "mabigat", "madamot", "madilim", "magalang", "mahirap", "mahusay", "makinis", "makunat", "malakas", "malambot", "malamig", "malansa", "maligaya", "malungkot", "maikli", "maingay", "mainit", "makisig", "malapad", "malapit", "malago", "maliksi", "mapakla", "mapurol", "masama", "masigla", "masikip", "masipag", "matabang", "matalas", "matalino", "matamis", "matangkad", "matayog", "matinik", "mayabang", "mayaman", "tahimik"],
    5 => ["alisto", "baligtad", "barado", "galante", "kabado", "maagap", "maalon", "magalang", "maganit", "magaspang", "magastos", "mahalaga", "mahiwaga", "maikli", "mainam", "makapal", "makisig", "makitid", "malagkit", "malambot", "malapad", "maligaya", "malikot", "malungkot", "mapakla", "maparaan", "maramot", "masinop", "masunurin", "masungit", "matambok", "matangkad", "matarik", "mayabang", "sabik", "tabingi"],
    6 => ["aburido", "baligtad", "barado", "batugan", "bugnutin", "maagap", "maalon", "magaspang", "mahabagin", "mahalaga", "mahiwaga", "makabago", "makaluma", "mapagbigay", "mapusok", "mapusyaw", "maramot", "marangya", "maselan", "masidhi", "masinop", "masugid", "masunurin", "matiisin", "matingkad", "matiyaga", "nerbyoso", "salungat", "seloso", "tabingi"],
    7 => ["abusado", "alanganin", "batugan", "magagalitin", "magugulatin", "mahabagin", "mahinahon", "malamlam", "malumanay", "malungkutin", "mapagbigay", "mapagmalaki", "mapanglaw", "mapusyaw", "marangya", "mareklamo", "masinop", "masugid", "matampuhin", "matapobre", "matumal", "napakaasim", "napakaalat", "napakatamis", "napakatigas"],
    8 => ["adelantado", "agresibo", "arogante", "balingkinitan", "kawili-wili", "mahabagin", "mahinahon", "malikhain", "malungkutin", "mapagkumbaba", "mapagmalabis", "mapanghamon", "mapanghusga", "marubdob", "masigasig", "masikhay", "matampuhin", "matatakutin", "napakanipis", "napakagalang", "napakapakla"],
    9 => ["adelantado", "agresibo", "arogante", "balingkinitan", "kalunus-lunos", "kapita-pitagan", "kahila-hilakbot", "karimarimarim", "karumal-dumal", "kasuklam-suklam", "maalalahanin", "mapagkumbaba", "mapagmalabis", "mapanghamon", "mapanghusga", "mapanlinlang", "maramdamin", "masalimuot", "masikhay", "napakarubdob"],
    10 => ["abandonado", "balingkinitan", "agresibo", "kalunus-lunos", "kapita-pitagan", "kahila-hilakbot", "karimarimarim", "karumal-dumal", "kasuklam-suklam", "maalalahanin", "mapagkawanggawa", "mapagkumbaba", "mapanlinlang", "maramdamin", "masalimuot", "napakarubdob"],
];
$tier = pdw_tier($lvl, $grd);
$banks = array_map('array_unique', $verbs);
function pdw_question(string $correct, array $verbs, array $adjectives, array $nouns, int $tier, string $lvl): array {
    $wrong = array_values(array_diff(array_unique(array_merge($nouns, $adjectives)), $verbs));
    shuffle($wrong);
    $choices = array_merge([$correct], array_slice($wrong, 0, $tier <= 1 ? 1 : 3));
    shuffle($choices);
    return ['correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
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
    $_SESSION[$sessionKey]['current'] = pdw_question($banks[$tier][$i], $verbs[$tier], $adjectives[$tier], $nouns[$tier], $tier, $lvl);
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
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang salitang <strong style="color:#CC0066;">'<?php echo pdw_h($cur['correct']); ?>'</strong> ang pandiwa sa mga salitang <?php echo pdw_h(implode(', ', array_map(static function ($w) { return "'".$w."'"; }, array_slice($cur['choices'], 0, -1)))); ?> at '<?php echo pdw_h(end($cur['choices'])); ?>'.</p>
    <div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;"><?php echo pdw_h($cur['correct']); ?></span></div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang <strong style="color:#CC0066;">pandiwa</strong> sa mga ito:</p>
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
