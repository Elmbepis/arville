<?php
// filipino/modules/magkasingkahulugan.php
// Seven grade-dependent synonym banks.

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
$moduleTitle = 'Mga Salitang Magkasingkahulugan';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function mks_tier(string $lvl, int $grd): int {
    $tier = $grd === 0 ? 0 : ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4)));
    return min(6, $tier + ($lvl === 'Hard' ? 2 : 0));
}
function mks_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "alam1batid2mata3sayaw4pula",
        "asal1ugali2kubo3itik4bola",
        "bagal1kupad2daga3dahon4buto",
        "bigay1alay2pusa3ibon4mata",
        "bilis1tulin2kape3buko4tasa",
        "boses1tinig2kubo3bote4tao",
        "bughaw1asul2bahay3manok4itik",
        "dala1hatid2bahay3lola4buko",
        "dami1bilang2tubig3pako4kulay",
        "edad1gulang2kanin3puto4kamay",
        "galak1saya2bola3pako4tuta",
        "gaya1tulad2unan3tuta4ilong",
        "giba1wasak2paa3kotse4damit",
        "gusto1nais2ayaw3awit4baso",
        "hampas1palo2bata3leeg4ibon",
        "hinto1tigil2araw3bato4sako",
        "kalye1daan2tabo3buwan4walis",
        "kirot1sakit2sayaw3mata4bibig",
        "liham1sulat2damit3lapis4susi",
        "likha1gawa2manok3niyog4papel",
        "lugar1pook2sisiw3tubig4balon",
        "mesa1hapag2kotse3batok4dahon",
        "pera1salapi2damit3sando4sipag",
        "pila1hanay2gatas3keso4itlog",
        "pinggan1plato2kumot3bundok4dagat",
        "sagot1tugon2kumot3bayan4hita",
        "sakay1lulan2tulog3pikit4tawa",
        "saya1ligaya2unan3tupa4goma",
        "taas1tangkad2tinapay3taba4magaan",
        "tuwa1galak2kabayo3sopas4pera",
        "upuan1silya2bubong3aklat4kuting",
    ],
    1 => [
        "alam1batid2ayaw3gusto4asam",
        "asal1ugali2alam3talino4gusto",
        "bagsak1lagpak2akyat3lipad4angat",
        "bigat1timbang2lakas3lapad4hugis",
        "boses1tinig2salita3bigkas4sigaw",
        "bughaw1asul2pula3dilaw4itim",
        "dami1bilang2hugis3anyo4kulay",
        "edad1gulang2timbang3anyo4taas",
        "giba1wasak2maayos3bago4buo",
        "gusto1nais2ayaw3inis4takot",
        "hampas1palo2tulak3hila4sipa",
        "harang1hadlang2kalat3bakas4tugon",
        "hatol1husga2takbo3galit4balita",
        "hinto1tigil2andar3takbo4galaw",
        "hugis1korte2sukat3kulay4timbang",
        "hurno1pugon2bahay3bintana4tubig",
        "ihandog1ialay2agawin3kunin4itago",
        "kama1higaan2mesa3kumot4upuan",
        "kirot1hapdi2sarap3kiliti4saya",
        "kulang1kapos2sobra3marami4maayos",
        "kupad1bagal2lakas3bilis4ganda",
        "landas1daan2bahay3butas4bakod",
        "liham1sulat2papel3lapis4selyo",
        "mabuti1mainam2mahina3malaki4mabigat",
        "magaling1mahusay2maliit3malakas4matibay",
        "makipot1makitid2maluwang3malawak4madalas",
        "masikip1makipot2maluwag3malaki4malinaw",
        "mataas1matangkad2maliit3payat4magaan",
        "mundo1daigdig2halaman3hayop4bituin",
        "pera1salapi2damit3talino4sipag",
        "simot1said2kotse3baboy4tuhod",
        "timbang1bigat2haba3taas4lawak",
    ],
    2 => [
        "alaala1gunita2damdamin3pag-iisip4paniniwala",
        "alapaap1ulap2lupa3ulan4hangin",
        "asal1ugali2damdamin3pag-iisip4paniniwala",
        "angal1reklamo2pagsasaad3pananalita4mungkahi",
        "anyo1itsura2sukat3bunga4epekto",
        "aralin1leksiyon2tungkulin3kaalaman4talino",
        "bahagi1parte2kabuuan3dagdag4anyo",
        "bandila1watawat2simbolo3sagisag4bantayog",
        "basahan1trapo2pangwalis3buslo4punda",
        "bata1musmos2alaga3kalaro4kamag-aral",
        "berde1luntian2bughaw3kayumanggi4naninilaw",
        "bilanggo1preso2alalay3kalaban4malaya",
        "bisig1braso2dibdib3batok4kilay",
        "bisita1panauhin2kasapi3kasama4miyembro",
        "boses1tinig2salita3bigkas4sigaw",
        "bihasa1sanay2baguhan3baliw4mabagal",
        "bulok1panis2hinog3malasa4masarap",
        "bumagsak1lumagpak2umakyat3lumipad4umangat",
        "daigdig1mundo2bituin3buwan4araw",
        "dasal1dalangin2tula3awit4kuwento",
        "digmaan1giyera2kapayapaan3katahimikan4pagkakaisa",
        "gitna1sentro2gilid3ibabaw4ilalim",
        "grupo1pangkat2teritoryo3kasapi4kasama",
        "kamukha1kahawig2kasundo3kasapi4katoto",
        "kapos1kulang2sapat3labis4sobra",
        "katas1dagta2tangkay3putik4buhok",
        "lagda1pirma2aklat3balita4sobre",
        "lihim1sikreto2balita3kaalaman4pangako",
        "lungkot1lumbay2ligaya3takot4galak",
        "maalaga1maaruga2matalino3masipag4makatuwiran",
        "mabagal1makupad2mabilis3maliksi4malikot",
        "madalas1malimit2bihira3malapit4mabilis",
        "mahusay1magaling2makupad3malakas4matibay",
        "malamig1maginaw2maulan3maaraw4madilim",
        "natanaw1nakita2naisip3naalala4naamoy",
        "simula1umpisa2hulihan3gitna4gilid",
        "tala1bituin2planeta3bulalakaw4buwan",
        "tumugon1sumagot2tumingin3nagtanong4nagsabi",
        "uri1klase2bahagi3sanhi4kasama",
    ],
    3 => [
        "aksidente1sakuna2pangyayari3kaganapan4kalungkutan",
        "angkop1akma2salungat3angkin4sakop",
        "bintang1paratang2saksi3patotoo4pananalig",
        "balat-sibuyas1maramdamin2magagalitin3malungkutin4masayahin",
        "baligtad1tiwarik2nakaayon3pahalang4nakahiga",
        "bantog1tanyag2nakabibighani3maaasahan4huwaran",
        "batayan1basehan2kahulugan3epekto4layunin",
        "bihira1madalang2madalas3karaniwan4naglipana",
        "bunga1resulta2sanhi3dahilan4pinagmulan",
        "dahilan1sanhi2epekto3layunin4resulta",
        "gayahin1tularan2himukin3hamakin4turuan",
        "gumaling1naghilom2nagbalik3gumana4guminhawa",
        "hanapbuhay1trabaho2kawanggawa3libangan4proyekto",
        "humadlang1humarang2umakyat3tumabi4gumilid",
        "ibinoto1inihalal2ipiniit3iginapos4itinulak",
        "iniatas1iniutos2ibinalita3inihatid4inilipat",
        "idalangin1ipagdasal2ihalal3ipagpaalam4ipakiusap",
        "kalihim1sekretarya2ahente3manunulat4konsehal",
        "karaniwan1ordinaryo2kakaiba3pambihira4madalang",
        "katulad1kawangis2kadugo3kasama4katunggali",
        "salaysay1kuwento2pangako3kaisipan4mungkahi",
        "likas1natural2artipisyal3huwad4peke",
        "maawain1mahabagin2malikhain3mapagmataas4malungkutin",
        "madaldal1masalita2makatuwiran3mapagmalaki4mahinahon",
        "magmula1magbuhat2maghapon3magdamag4magtagpo",
        "magtatag1magbuo2magpalit3maglipat4magtago",
        "nagtagumpay1nagwagi2nagapi3nagsikap4nabigo",
        "nakadilat1nakamulat2nakapikit3nakapiring4nakayuko",
        "nalulukot1nagugusot2nauunat3napuputol4nahahatak",
        "natatangi1naiiba2karaniwan3nagagaya4nawawangis",
        "nilalayon1hinahangad2niluluto3binibili4ginagamit",
        "suwail1sutil2dakila3dukha4huwaran",
    ],
    4 => [
        "bantayog1monumento2sagisag3pagdakila4templo",
        "damdamin1saloobin2kaalaman3paniniwala4kaisipan",
        "desisyon1pasiya2panunungkulan3paniniwala4pananalig",
        "gobyerno1pamahalaan2institusyon3diktadura4oligarkiya",
        "haka-haka1hinala2mungkahi3katibayan4pagnanasa",
        "idinamay1isinangkot2inihabilin3ibinukod4ipinaubaya",
        "ikinukubli1itinatago2inilalantad3ipinasisilip4ibinabalita",
        "kababalaghan1himala2sakripisyo3kabanalan4sapantaha",
        "katarungan1hustisya2paninindigan3pamantayan4panunuri",
        "katibayan1ebidensya2sapantaha3hinuha4panunuri",
        "magsinggulang1magsintanda2magkapatid3magkawangis4magsinlaki",
        "magkalaban1magkatunggali2magkasangga3magkahanay4magkakosa",
        "mapagbigay1bukas-palad2makasarili3makatarungan4mapagmalaki",
        "minimithi1pinapangarap2pinapansin3inuunawa4tinatanaw",
        "mungkahi1suhestiyon2pahintulot3paninindigan4sapantaha",
        "naghimagsik1nag-alsa2nagpasakop3naminsala4nanghimok",
        "nakalilibang1kawili-wili2nakababagot3nakakatamad4nakakainis",
        "nauunawaan1naiintindihan2natatamasa3nasisiyasat4nasusuri",
        "nasiyasat1nasuri2natanto3nakamit4nasundan",
        "paanyaya1imbitasyon2pahintulot3mungkahi4suhestiyon",
        "pananalig1pananampalataya2pagsasakripisyo3pakikihamok4pagmamalasakit",
        "paligsahan1timpalak2pagdiriwang3pakikihamok4pagkakasundo",
        "pinupuna1pinapansin2pinipili3pinalilipas4pinipigil",
        "pinatalas1pinatalim2pinanipis3pinakinis4pinatibay",
        "pumipintig1tumitibok2lumalabas3kumikinang4pumupunta",
        "sapin-sapin1patung-patong2kalat-kalat3tabi-tabi4watak-watak",
        "saysay1kabuluhan2paliwanag3damdamin4kasabihan",
        "sumasagisag1sumisimbolo2bumubuo3gumaganap4namamahala",
        "opinyon1palagay2suhestiyon3desisyon4layunin",
    ],
    5 => [
        "binalaan1binantaan2pinaunlakan3pinaanyayahan4pinagsilbihan",
        "dalampasigan1baybayin2talampas3tangway4lambak",
        "dekorasyon1palamuti2halimuyak3dekalidad4dambana",
        "gramatika1balarila2panitikan3baybayin4talasalitaan",
        "kabuluhan1kahalagahan2kabuktutan3karangyaan4katarungan",
        "kahali-halina1maalindog2kahindik-hindik3nakasusuklam4mahiwaga",
        "karalitaan1karukhaan2karangyaan3kadakilaan4katapatan",
        "kumikinang1kumikislap2lumilisan3kumukupas4lumalabo",
        "maiwawaglit1maiwawala2maisasaisip3maibibigay4maipapasa",
        "magmukmok1magmaktol2magmuni-muni3magkubli4magmithi",
        "nakabubulahaw1nakaiistorbo2nakakatakot3nakasisikil4nakabubugnot",
        "nakapagsasaad1nakapaglalahad2nakapagpapatupad3nakapagtatanong4nakapag-aatas",
        "nakayayamot1nakakainis2nakalulugod3nakagiginhawa4nakalilibang",
        "nangangatal1nanginginig2nagagalit3naninibago4nanganganib",
        "pasikut-sikot1paliguy-ligoy2padaan-daan3pasabi-sabi4palingon-lingon",
        "pagpapaunlak1pagpayag2pagmamalabis3pagpapaliwanag4pagtanggi",
        "palingun-lingon1palinga-linga2paikot-ikot3palipat-lipat4patangu-tango",
        "panibugho1pagseselos2pagtataka3pagmamalabis4pananabik",
        "porsyento1bahagdan2pamamahagi3pangangalahati4sangkapat",
        "tumatalima1sumusunod2dumudungaw3tumitindi4tumatakas",
    ],
    6 => [
        "balikukuin1baluktutin2patuwirin3paikliin4baligtarin",
        "dinaluhong1sinugod2dinamayan3tinulungan4dinakila",
        "kahangalan1kabaliwan2kahiwagaan3katarungan4karangyaan",
        "kahindik-hindik1nakakatakot2nakaiistorbo3nakasisikil4nakababaliw",
        "kalunos-lunos1kahabag-habag2kalugod-lugod3kataka-taka4katawa-tawa",
        "karimarimarim1nakasusuklam2kabigha-bighani3nakababagot4nakababaliw",
        "nagsasaliksik1nagsisiyasat2nagpapairal3nagsusumiksik4nagpapalaganap",
        "nagugulumihanan1naguguluhan2nasisikil3nabubugnot4naninibago",
        "nakapanlinlang1nakapanloko2nakapanugod3nakapanlait4nakapanakit",
        "nakatanikala1nakakadena2nakakwintas3nakaratay4nakatingala",
        "lapastangan1walang-galang2mapanlustay3bugnutin4mapitagan",
        "pagkamisteryoso1pagkamahiwaga2pagkamapusok3pagkamasidhi4pagkamapanganib",
        "paninikil1pang-aapi2pambubulahaw3pagpaparaya4panghihimasok",
        "pinagtatalaan1pinaglilistahan2pinagkukunan3pinagsisisihan4pinagpapaguran",
        "pinarurubdob1pinasisidhi2pinatatamlay3pinagmamaliw4pinalalampas",
        "pinaunlakan1pinahintulutan2pinagmalabisan3pinabulaanan4pinasaringan",
        "umalimusom1humalimuyak2lumiwanag3umalinsangan4kumulimlim",
    ],
 ];
$tier = mks_tier($lvl, $grd);
function mks_question(string $raw, int $tier, string $lvl): array {
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
    $_SESSION[$sessionKey]['current'] = mks_question($banks[$tier][$i], $tier, $lvl);
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
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang kasingkahulugan ng salitang '<?php echo mks_h($cur['word']); ?>' ay ang salitang <strong style="color:#CC0066;">'<?php echo mks_h($cur['correct']); ?>'</strong>.</p>
<div style="display:inline-flex;width:auto;max-width:100%;margin:20px auto;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;flex-direction:column;justify-content:center;align-items:center;overflow-wrap:anywhere;">
        <strong style="color:#CC0066;font-size:14pt;">MAGKASINGKAHULUGAN:</strong>
        <strong style="color:#800080;font-size:24pt;"> <?php echo mks_h($cur['word'].' : '.$cur['correct']); ?></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;">
        <?php echo mks_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang kasingkahulugan ng salita sa itaas.</p>
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
