<?php
// filipino/modules/magkasalungat.php
// Seven grade-dependent antonym banks.

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
$moduleTitle = 'Mga Salitang Magkasalungat';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function mga_tier(string $lvl, int $grd): int {
    $tier = $grd === 0 ? 0 : ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4)));
    return min(6, $tier + ($lvl === 'Hard' ? 2 : 0));
}
function mga_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "ayaw1nais2mata3ibon4buwan",
        "babae1lalaki2bato3bahay4damit",
        "bago1luma2bibi3aso4lapis",
        "basa1tuyo2bata3manok4kuko",
        "bata1matanda2tubig3kamay4pera",
        "bilis1bagal2yelo3apoy4ulan",
        "buhay1patay2tasa3bola4susi",
        "dumi1linis2kama3tao4tupa",
        "gising1tulog2ulap3ilaw4isda",
        "gusto1ayaw2tao3awit4baso",
        "gutom1busog2ulo3sako4baso",
        "harap1likod2dahon3asin4usa",
        "hina1lakas2kahoy3bula4tabo",
        "hinog1hilaw2kahon3buto4lobo",
        "init1lamig2kulay3sako4bola",
        "luma1bago2bote3isda4bata",
        "lungkot1saya2lata3gatas4damo",
        "mahal1mura2ipis3tasa4damit",
        "mura1mahal2paa3goma4lupa",
        "maayos1magulo2bahay3mata4dilaw",
        "malaki1maliit2pulis3buhok4pako",
        "mataba1payat2siko3sando4lapis",
        "matanda1bata2patis3tasa4dila",
        "sobra1kulang2bibi3kubo4pula",
        "tama1mali2manok3kahoy4mata",
        "tuwa1lungkot2sisiw3sopas4pera",
        "tuyo1basa2isda3barko4susi",
        "una1huli2tubig3ulam4bato",
    ],
    1 => [
        "babae1lalaki2bata3matanda4tao",
        "bago1luma2maayos3maganda4sira",
        "basa1tuyo2mainit3malamig4sunog",
        "bata1matanda2lalaki3babae4masigla",
        "buhay1patay2gutom3gising4tulog",
        "gutom1busog2uhaw3pagod4inaantok",
        "hinog1hilaw2matamis3bulok4luma",
        "itim1puti2pula3asul4dilaw",
        "magulo1maayos2marumi3makalat4malawak",
        "mabango1mabaho2makinis3mainit4mahaba",
        "mabuti1masama2maliit3malaki4magaan",
        "maganda1pangit2masaya3mataas4mabigat",
        "mahal1mura2bago3luma4maganda",
        "mahaba1maiksi2makapal3manipis4malapad",
        "mahina1malakas2masaya3malapad4malayo",
        "mainam1masama2masaya3maliit4mabigat",
        "mainit1malamig2makinis3marumi4magaan",
        "malakas1mahina2maganda3malawak4malayo",
        "malinaw1malabo2maganda3malapad4malapit",
        "marumi1malinis2mainit3makinis4mahaba",
        "mataas1mababa2masaya3mabigat4magaan",
        "pikit1dilat2ngiti3tawa4iyak",
        "sobra1kulang2sira3bago4luma",
        "tama1mali2pangit3malayo4mahaba",
        "una1huli2bago3luma4mahal",
    ],
    2 => [
        "abante1atras2liko3akyat4diretso",
        "akyat1baba2abante3liko4atras",
        "araw1gabi2buwan3taon4tanghali",
        "ayusin1sirain2itago3alisin4palitan",
        "baliw1matino2mabagal3magulo4masaya",
        "balisa1panatag2magulo3mautak4malinis",
        "dumating1umalis2nawala3naiwan4umiwas",
        "harapan1likuran2kalagitnaan3ibabaw4ilalim",
        "ilalim1ibabaw2gilid3harap4likod",
        "ipasok1ilabas2itanim3ipitin4isabit",
        "itago1ilabas2ibigay3iakyat4isama",
        "labas1loob2ibabaw3ilalim4gilid",
        "laos1sikat2mabait3tamad4magulo",
        "loob1labas2gitna3dulo4tabi",
        "mabagal1matulin2matibay3maitim4malaki",
        "mabilis1mabagal2masipag3magulo4masinop",
        "maingay1tahimik2malinis3malabo4magaling",
        "makapal1manipis2mahaba3masikip4malawak",
        "malambot1matigas2magaspang3makinis4magaan",
        "masaya1malungkot2matapang3matino4malikot",
        "masikip1maluwag2mataas3mahaba4magaspang",
        "masipag1tamad2dukha3maliksi4mabait",
        "matabang1malasa2sariwa3mabango4mainit",
        "matipid1magastos2mabait3masaya4malaki",
        "patas1madaya2matibay3mapalad4tamad",
        "sakitin1malusog2malikot3mabait4masipag",
        "tahimik1maingay2malikot3malupit4masaya",
        "tamad1masipag2matalino3maawain4mabilis",
        "tanong1sagot2salita3tunog4isip",
        "tulak1hila2angat3bitaw4hawak",
    ],
    3 => [
        "baguhan1beterano2masipag3huwaran4matanda",
        "bakante1okupado2nakabukas3masikip4marami",
        "dagdagan1bawasan2sobrahan3punuin4ubusin",
        "nakabukas1sarado2nakalitaw3nakatago4natatakpan",
        "hawakan1bitawan2itulak3hilahin4buhatin",
        "hulihin1pakawalan2tawagin3kausapin4isama",
        "kabiguan1tagumpay2pagbabago3kakapusan4pagsisikap",
        "kalupitan1kabaitan2kalungkutan3kasipagan4kamalian",
        "kaligayahan1kalungkutan2kabuktutan3kasipagan4kamalian",
        "katamaran1kasipagan2kabuktutan3kabiguan4karapatan",
        "lulubog1lulutang2lalangoy3lilipad4lilisan",
        "lawakan1sikipan2habaan3luwagan4ilipat",
        "ligtas1mapanganib2marangya3maingay4malinis",
        "madilim1maliwanag2maingay3malamig4makinis",
        "magaslaw1mahinhin2masipag3mainipin4maingay",
        "maliwanag1madilim2makintab3makinis4malamig",
        "mapagbigay1madamot2masinop3mahabagin4mainipin",
        "matalino1mangmang2matiyaga3mapagbigay4masayahin",
        "matamlay1masigla2maingat3mabagal4matibay",
        "matapang1duwag2matiyaga3mapagbigay4malupit",
        "matiyaga1mainipin2maalalahanin3mahabagin4masayahin",
        "pakawalan1ikulong2palayain3paalisin4isama",
        "palayain1bihagin2palapitin3pabalikin4pakawalan",
        "pumasok1lumabas2tumulo3bumitin4kumuha",
        "samahan1iwanan2aliwin3kausapin4akbayan",
        "sintu-sinto1matino2magiliw3matiyaga4aburido",
        "sumugod1umatras2lumiko3sumabay4bumangon",
        "tuwid1baluktot2maiksi3magaspang4putol",
    ],
    4 => [
        "batikan1baguhan2matalino3mahinahon4mapagmalaki",
        "kalabisan1kasalatan2katakawan3karapatan4kasapatan",
        "katapangan1karuwagan2kaluwagan3katarungan4katapatan",
        "katapatan1pagtataksil2karuwagan3katarungan4katapangan",
        "katatagan1karupukan2katotohanan3katarungan4kakapusan",
        "kasaganahan1kakulangan2katalinuhan3katarungan4kabiguan",
        "ibinabawas1idinadagdag2itinatago3itinatapon4idinidiin",
        "ibinibihag1pinalalaya2pinakikilos3sinisikil4ipinapain",
        "ginabayan1iniligaw2pinayagan3tinuruan4itinama",
        "inokupa1binakante2pinasobra3pinasikip4binawasan",
        "magkalaban1magkakampi2magkaibigan3magkakilala4magkapitbahay",
        "magkakampi1magkatunggali2magkamag-anak3magkakilala4magkasosyo",
        "magsisimula1magtatapos2magtutuloy3maglilipat4magpapalit",
        "magwawakas1magsisimula2magtitimpi3magsisikap4magpapasok",
        "mahinahon1magagalitin2matiyaga3marangya4maalalahanin",
        "masigasig1tinatamad2matampuhin3marangya4maalalahanin",
        "masidhi1matabang2mapagkumbaba3marangya4nakalilito",
        "nakalilibang1nakayayamot2nakakatakot3nakapipinsala4nakasasama",
        "nagagalak1nalulungkot2natatakot3nagtataka4naguguluhan",
        "nakatitiyak1nagdududa2nagagalak3nagtitimpi4nagtatampo",
        "pagpapahalaga1pagbabalewala2pagpapaliwanag3paglilihim4pagsasanib",
        "pagsasanib1paghihiwalay2pagdiriwang3paglilihim4pagsisikap",
        "pinagbawalan1pinayagan2pinayuhan3pinaalis4pinagbilinan",
        "tagumpay1kasawian2karanasan3kadakilaan4katapatan",
    ],
    5 => [
        "alinlangan1katiyakan2katarungan3kabagsikan4katapatan",
        "bulagsak1masinop2mainipin3mapagpakumbaba4maalalahanin",
        "bukang-liwayway1takipsilim2katanghalian3hatinggabi4bisperas",
        "kabutihan1kabuktutan2kamalasan3kasinungalingan4karangyaan",
        "kabuktutan1kagandahang-loob2kalabisan3katotohanan4kaunlaran",
        "kagalakan1paninimdim2kamalian3panibugho4karangyaan",
        "karalitaan1kasaganahan2kabuluhan3kadakilaan4katapatan",
        "karumal-dumal1dalisay2nakabubulahaw3marangya4mapanganib",
        "katinuan1kabaliwan2kasakiman3karangyaan4karukhaan",
        "maalinsangan1maaliwalas2umaalingasaw3nakabubulahaw4makulimlim",
        "mahalimuyak1umaalingasaw2maalinsangan3nakabubulahaw4makulimlim",
        "umalingasaw1humalimuyak2lumiwanag3dumungaw4kumulimlim",
        "naipagpatuloy1napigilan2naisakatuparan3naibaling4nasimulan",
        "nakabubulahaw1mapayapa2umaalingasaw3nakasisindak4nakagagalak",
        "nakayayamot1kinagigiliwan2nakaiinip3palabati4nakaririwasa",
        "napakarupok1napakatibay2napakakapal3napakalambot4napakagaspang",
        "pagtataksil1katapatan2pagmamalabis3katarungan4katinuan",
        "pinahintulutan1pinagbawalan2pinangaralan3pinayagan4pinasaringan",
        "sawimpalad1matagumpay2mapagmalabis3makatarungan4makabuluhan",
        "tumatalima1sumusuway2tumutulong3sumasabay4dumidilim",
        "tumitingkad1kumukupas2lumilisan3kumikinang4tumitindi",
    ],
    6 => [
        "balikukuin1tuwirin2palutangin3palaganapin4parubdubin",
        "kahali-halina1kahindik-hindik2kahabag-habag3kapita-pitagan4mahiwaga",
        "kahangalan1katalinuhan2kahiwagaan3katarungan4karangyaan",
        "kalamlaman1katingkaran2katalinuhan3kabaitan4katapatan",
        "kalunos-lunos1kalugod-lugod2kahindik-hindik3kataka-taka4kapita-pitagan",
        "karimarimarim1kabigha-bighani2nakapipinsala3nakababagot4nakababaliw",
        "kinamumuhian1kinahahangaan2kinabibilangan3kinayayamutan4kinasasadlakan",
        "masiyasip1padalus-dalos2bugnutin3mapamighani4mapaniil",
        "parubdubin1patamlayin2paalabin3patibayin4pakislapin",
        "magmamaliw1mag-aalab2malilimutan3mamimighani4maninibago",
        "mapanlinlang1mapagkakatiwalaan2makabuluhan3mapagtimpi4masigasig",
        "nagulumihanan1naliwanagan2naguluhan3nabugnot4nanibago",
        "pagkalapastangan1pagkamapitagan2pagkamariwasa3pagkabugnutin4pagkawalang-galang",
        "pagkawatak-watak1pagkakaisa2pagkamahinahon3pagkamatapat4pagkamagiting",
        "pamumuksa1pagpapalaganap2pagmamalabis3pamiminsala4paninikil",
        "pinaunlakan1tinanggihan2pinagmalabisan3pinanindigan4pinasaringan",
        "pinahindian1pinahintulutan2pinangaralan3tinanggihan4pinasaringan",
    ],
];
$tier = mga_tier($lvl, $grd);
function mga_question(string $raw, int $tier, string $lvl): array {
    [$word, $correct, $a, $b, $c] = preg_split('/[1234]/', $raw);
    $wrong = [$a, $b, $c];
    shuffle($wrong);
    $choices = array_merge([$correct], array_slice($wrong, 0, $tier <= 1 ? 1 : 3));
    shuffle($choices);
    return ['word'=>$word, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = mga_question($banks[$tier][$i], $tier, $lvl);
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
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang kasalungat ng salitang '<?php echo mga_h($cur['word']); ?>' ay ang salitang <strong style="color:#CC0066;">'<?php echo mga_h($cur['correct']); ?>'</strong>.</p>
<div style="display:inline-flex;width:auto;max-width:100%;margin:20px auto;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;flex-direction:column;justify-content:center;align-items:center;overflow-wrap:anywhere;">
        <strong style="color:#CC0066;font-size:14pt;">MAGKASALUNGAT:</strong>
        <strong style="color:#800080;font-size:24pt;"> <?php echo mga_h($cur['word'].' / '.$cur['correct']); ?></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;">
        <?php echo mga_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang kasalungat ng salita sa itaas.</p>
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
