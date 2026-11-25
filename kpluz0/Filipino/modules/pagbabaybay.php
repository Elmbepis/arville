<?php
// filipino/modules/pagbabaybay.php
// Five grade-dependent spelling banks.

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
$moduleTitle = 'Pagbabaybay ng mga Salita';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pbb_tier(string $lvl, int $grd): int {
    $tier = $grd <= 1 ? 0 : ($grd <= 3 ? 1 : ($grd <= 5 ? 2 : 3));
    return $tier + ($lvl === 'Hard' ? 1 : 0);
}
function pbb_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "bapor[bapur+bepor]bupor",
        "batok[batuk+betok]butok",
        "bulak[bolak+belak]bilak",
        "bulok[boluk+buluk]bolok",
        "buslo[busla+boslo]boslu",
        "bulsa[bulso+bolsa]bolso",
        "dahon[dahun+dihon]duhon",
        "damit[damet+dumit]domit",
        "gamit[gamet+gumit]gomit",
        "guhit[guhet+gohit]gohet",
        "gupit[gopit+gupet]gopet",
        "kahon[kahun+kohon]kuhon",
        "kilos[kilus+kelus]kelos",
        "kulot[kolut+kulut]kolot",
        "kumot[komut+kumut]komot",
        "lipat[lepat+lupat]lipot",
        "lipad[lepad+lupad]lipod",
        "lupit[lopit+lupet]lopet",
        "lugar[logar+luger]lugor",
        "manok[manuk+minok]menok",
        "pikit[piket+pekit]peket",
        "pilit[pilet+pelit]pelet",
        "pulot[polut+pulut]polot",
        "pusod[posud+pusud]posod",
        "punit[ponit+punet]ponet",
        "sipag[sepag+sipog]supag",
        "sipit[sipet+sepit]sepet",
        "sipol[sipul+sepol]sepul",
        "sukat[sokat+sukit]sukot",
        "sulat[solat+solet]sulak",
    ],
    1 => [
        "anino[aninu+aneno]anenu",
        "aruga[aroga+aruge]arugu",
        "alipin[alipen+alepin]alapin",
        "bahagi[bahage+buhagi]buhage",
        "bakuran[bakoran+bakiran]bakiren",
        "botelya[botalya+butelya]botelyo",
        "bulalo[bulalu+bolalu]bolalo",
        "bumalik[bumalek+bomalik]bomalek",
        "bumili[bumile+bomili]bumeli",
        "bumuga[bumoga+bomuga]bomoga",
        "busina[bosina+busena]bosena",
        "dumalo[dumalu+domalu]domalo",
        "kaldero[kaldiro+kalderu]kaldiru",
        "kamatis[kamates+kumatis]kumates",
        "kawali[kawale+kuwali]kuwale",
        "kumati[kumate+komati]komate",
        "lumiko[lumeko+lomiko]lomeko",
        "kumilos[kumelos+komilos]komelos",
        "kusina[kosina+kusena]kosena",
        "palagi[palage+pulagi]pulage",
        "pugita[pugeta+pogita]pogeta",
        "kumanta[komanta+kuminta]kumunta",
        "kumuha[kumoha+komuha]komoha",
        "lumindol[lumendol+lumindul]lomindol",
        "lumuha[lumoha+lomuha]lomoha",
        "madali[madale+mudali]mudale",
        "sumali[sumale+somali]somale",
        "sumikat[somikat+sumekat]somekat",
        "sumilip[somilip+sumelip]somelip",
        "sumipol[somipol+sumepol]somepol",
        "tumamis[tumames+tomamis]tomames",
        "umasim[umasem+omasim]omasem",
    ],
    2 => [
        "balakid[balaked+bulakid]bulaked",
        "balimbing[balingbing+balimping]balinbing",
        "bibingka[bibinka+bibingga]bibimka",
        "bukirin[bukiren+bukerin]bukeren",
        "bulusok[bulosok+bolusok]bolosok",
        "bumagsak[bumaksak+bumagsag]bumaksag",
        "bumulyaw[bumolyaw+bumilyaw]bomulyaw",
        "busilak[bosilak+buselak]boselak",
        "gumugol[gumogol+gumugul]gumogul",
        "kumidlat[komidlat+kumedlat]komedlat",
        "kumintab[komintab+kumentab]komentab",
        "kumislap[komislap+kumeslap]komeslap",
        "lumagpak[lumakpak+lumakpag]lumagpag",
        "lumagpas[lumakpas+lumigpas]lumogpas",
        "lumusob[lumosub+lumusub]lumosob",
        "lumusong[lumosong+lumosung]lumusung",
        "malinis[malines+malenis]malenes",
        "mapusyaw[mapisyaw+maposyaw]mapasyaw",
        "matiyaga[matiaga+matyaga]matiyagga",
        "nakalikha[nakalukha+nikalikha]nakalekha",
        "nailigtas[nailiktas+nailagtas]naaligtas",
        "namumula[namumola+namomula]namumilu",
        "niluluto[niluloto+niloluto]nilulotu",
        "pumupuna[pumopuna+pumupona]pumopona",
        "punyagi[punyage+ponyagi]ponyage",
        "sukdulan[sukdolan+sokdulan]sokdolan",
        "sumulpot[somulput+sumulput]somolpot",
        "tumalsik[tumalsek+tomalsik]tomalsek",
        "tumutugon[tumutogun+tumotugon]tumutogon",
    ],
    3 => [
        "bilangguan[bilanggoan+bilanguan]bilangoan",
        "binansagan[bininsagan+binunsagan]binansigan",
        "bumalikwas[bomalikwas+bumalekwas]bumalikwos",
        "dumukwang[dumokwang+domukwang]domokwang",
        "ibinalibag[ibanalibag+ibinalabag]ibanalabag",
        "humandusay[humindusay+humandisay]homandusay",
        "humahangos[humahangus+humahingos]humahingus",
        "katinuan[katinoan+katenoan]katenuan",
        "katalinuhan[katalinohan+katalunuhan]katalenuhan",
        "karunungan[karunongan+karonungan]karonongan",
        "katunggali[katunggale+katinggali]katungguli",
        "kinumpuni[kinompuni+kinumponi]kinampuni",
        "kumaripas[komaripas+kumarepas]komarepas",
        "matiwasay[matuwasay+matuwisay]matiwusay",
        "nakabaligtad[nakabalugtad+nakabalegtad]nakabaligtat",
        "nanikluhod[nanekluhod+nanikluhud]nanekluhud",
        "nilampasan[nilimpasan+nilumpasan]nilampisan",
        "palaisdaan[palaesdaan+palaisdian]palaesdian",
        "palikuran[palikoran+palikaran]palakuran",
        "pamunuan[pamunoan+pamonuan]pamonoan",
        "pasintabi[pasuntabi+pasintabe]pasintubi",
        "salamisim[salamasim+salamisem]salamusim",
        "suminghot[sominghot+suminghut]sominghut",
    ],
    4 => [
        "bumubulusok[bumubolusok+bomubulusok]bumubulusuk",
        "dumadagundong[dumadagandong+dumadagindong]dumadugundong",
        "kinasasadlakan[kinasusudlakan+kinasasadlukan]kinasisidlakan",
        "kinasasandigan[kinasisindagan+kinasusundugan]kinasisindigan",
        "nagsipaghandusay[nagsipaghandosay+nagsipaghandusoy]nagsipaghindusay",
        "pagpupunyagi[pagpopunyagi+pagpupunyage]pagpuponyagi",
        "pakikipagkaibigan[pakikipagkaybigan+pakikipagkaebigan]pakikipagkibigan",
        "pamumulitika[pamumulutika+pamumilitika]pamumulotika",
        "pananaliksik[paninaliksik+pananalaksik]pananaliksek",
        "pandarambong[pandarambung+pandirambong]pandarumbong",
        "pinagsisilbihan[pinagsasalbihan+pinagsisilbahan]pinagsusulbihan",
        "pinagsamantalahan[pinagsamantalihan+pinagsamantaluhan]pinagsamantilahan",
        "pinakasukdulan[pinakasukdolan+pinakasokdulan]pinakasukdalan",
        "pinalamutian[pinalamitian+pinalumutian]pinilamutian",
        "pumaimbulog[pumaimbolog+pumainbulog]pumaingbulog",
        "sinapupunan[sinapipunan+sinapopunan]sinapuponan",
        "sumasalamin[sumasalamen+sumusalamin]sumisalamin",
    ],
];
$tier = pbb_tier($lvl, $grd);
function pbb_question(string $raw, int $tier, string $lvl, int $grd): array {
    $choices = preg_split('/[\[+\]]/', $raw);
    $correct = $choices[0];
    shuffle($choices);
    return ['correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'grade'=>$grd, 'qid'=>bin2hex(random_bytes(16))];
}
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

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl || ($_SESSION[$sessionKey]['current']['grade'] ?? -1) !== $grd)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pbb_question($banks[$tier][$i], $tier, $lvl, $grd);
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <span style="color:#800080;font-weight:normal;">'<?php echo pbb_h($result['clicked']); ?>'</span>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang salitang <strong style="color:#CC0066;">'<?php echo pbb_h($cur['correct']); ?>'</strong> ang may wastong pagbabaybay sa mga salitang <?php echo pbb_h(implode(', ', array_map(static function ($w) { return "'".$w."'"; }, array_slice($cur['choices'], 0, -1)))); ?> at '<?php echo pbb_h(end($cur['choices'])); ?>'.</p>
    <div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:480px;padding:24px 30px;background:#FCFBE6;overflow-wrap:anywhere;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;"><?php echo pbb_h($cur['correct']); ?></span></div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang salitang may wastong pagbabaybay.</p>
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
