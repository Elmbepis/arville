<?php
// filipino/modules/pang-uri-gamit.php
// Two grade-dependent sentence-completion banks; single difficulty.

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
$moduleTitle = 'Wastong Paggamit ng Pang-uri';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
// Legacy banks cover grades 0–3 and 4–10.
function purg_tier(string $lvl, int $grd): int { return $grd <= 3 ? 0 : 1; }
function purg_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "Gumugulong ang bola dahil ito ay ____.=bilog[kuwadrado+parisukat]patag",
        "Madulas ang sahig dahil ito ay ____.=basa[tuyo+mainit]maitim",
        "Nagsuot ako ng balabal dahil ____ ang panahon.=malamig[mainit+maaraw]mabuti",
        "Naubos ang dala kong pera dahil ____ ang aking binili.=mahal[mura+magaan]maliit",
        "Marami kang nagagawa dahil ikaw ay ____.=masipag[tamad+maysakit]antukin",
        "Marami ang bumibili ng pansit na ito dahil ito ay ____.=masarap[mapait+mabait]malamig",
        "Siya ay ____ kaya mabilis siyang makaipon.=matipid[gastador+tamad]maluho",
        "Bagong luto ang kanin kaya ito ay ____.=mainit[malamig+matigas]marami",
        "Maraming galit kay Pedro dahil ____ ang kanyang ugali.=masama[mabuti+maayos]maganda",
        "Maraming humahanga kay Sophia dahil siya ay ____.=maganda[pangit+tamad]masungit",
        "Huwag kang lalapit kay Diego dahil siya ay ____.=galit[masaya+mabait]magiliw",
        "Kumain na tayo dahil ako ay ____ na.=gutom[busog+inaantok]pagod",
        "Magpahinga ka muna kung ____ ka na.=pagod[galit+sabik]busog",
        "Nilinis niya ang kotse kaya ito ay ____.=makintab[marumi+maputik]sira",
        "Matamis ang mangga kung ito ay ____ na.=hinog[hilaw+bubot]berde",
        "Hindi ako makakain dahil ____ ang aking ngipin.=masakit[masarap+matibay]malinis",
        "Gusto kong amuyin ang rosas dahil ito ay ____.=mabango[mabaho+masakit]matinik",
        "Ayaw kong kumain ng bangus dahil ito ay ____.=matinik[malaki+masarap]malasa",
        "Huwag kang tatapak diyan dahil iyan ay ____.=marupok[matibay+malinis]mabango",
        "Masaya ang mga magsasaka dahil ____ ang kanilang ani.=masagana[kakaunti+kapos]kulang",
        "Kaya nating maglakad papuntang parke dahil ito ay ____ lamang.=malapit[malayo+matagal]malawak",
        "Gawa sa semento ang aming bahay kaya ito ay ____.=matibay[marupok+malapit]malayo",
        "Nagalit ang matandang natutulog dahil ____ ang mga bata.=maingay[tahimik+mabait]payapa",
        "Si Nadine ay ____ kaysa kay Kathy.=mas maganda[maganda+pinakamaganda]napakaganda",
        "Si Robert ay ____ kaysa kay Johnny.=mas mabait[mabait+pinakamabait]napakabait",
        "Si Manuel ang ____ sa aming klase.=pinakamatalino[matalino+mas matalino]napakatalino",
        "Ang kotse ay ____ kaysa sa kabayo.=mas mabilis[mabilis+pinakamabilis]napakabilis",
        "Basketbol ang ____ kong laro sa lahat.=pinakagusto[gusto+mas gusto]napakagusto",
        "Aba, ____ mo palang umawit!=napakagaling[magaling+mas magaling]pinakamagaling",
        "Aba, ____ mo palang magluto ng adobo!=napakahusay[mahusay+mas mahusay]pinakamahusay",
    ],
    1 => [
        "Kung hitsura ang pag-uusapan, sino ang ____ kina Kathryn at Nadine?=mas maganda[pinakamaganda+mas mayaman]pinakamarikit",
        "Pantay ang iskor nila kaya masasabi kong ____ sa agham ang magkaibigang Rene at Joy.=magsindunong[pinakamadunong+madunong]mas madunong",
        "Wala itong masyadong amoy kaya ____ ang bulaklak na ito kumpara sa bulaklak na iyon.=di-gaanong mabango[pinakamabango+mas mabango]higit na mabango",
        "____ ngayong hapon kumpara kahapon. Napakaalinsangan kahapon eh.=Di-gaanong maalinsangan[Mas maalinsangan+Higit na maalinsangan]Pinakamaalinsangan",
        "Alam mo bang napakaraming negosyo ni Don Pablo? ____ si Don Juan kung ihahambing kay Don Pablo.=Di-gasinong mayaman[Mas mayaman+Higit na mayaman]Pinakamayaman",
        "Ang magkakambal na kapatid ni Loida ay parehong 5' ang taas kaya sila ay ____.=magsintangkad[mas matangkad+pinakamatangkad]higit na matangkad",
        "Mas maraming kinasasangkutang gulo si Aris kaysa kay Billy kaya ____ si Billy kaysa sa kanya.=higit na mabait[magsimbait+pinakamabait]mas masama",
        "Hindi tayo magkakasya rito dahil ____ ang mesang ito kaysa sa mesang iyon.=higit na maliit[higit na malaki+pinakamaliit]pinakamalaki",
        "Tila ____ ng kalabaw ang atletang iyon. Sa tingin ko'y mananalo siya ng gintong medalya sa 'weightlifting'.=sinlakas[mas malakas+mas mahina]singganda",
        "Kung utak ang pag-uusapan, sino ang ____ sa pagitan nina Albert Einstein at Stephen Hawking?=mas matalino[pinakamatalino+mas matangkad]magsintalino",
        "Magsindami ang mga ari-arian nila kaya masasabi kong ____ lamang ang aking dalawang tiyo.=magkasingyaman[pinakamayaman+mayaman]mas mayaman",
        "Wala itong masyadong lasa kaya ____ ang saging na ito kumpara sa saging na iyon.=di-gaanong matamis[pinakamatamis+mas matamis]higit na matamis",
        "____ ngayong araw kumpara noong Sabado dahil bumabagyo noong Sabado.=Di-gaanong maulan[Mas maulan+Higit na maulan]Pinakamaulan",
        "Pareho ang timbang ng magkaklaseng sina Gino at Luis kaya sila ay ____.=magsimbigat[mas mabigat+pinakamabigat]higit na mabigat",
        "Mas madalas mapagalitan ng kanilang ina si Dondon kaysa kay Joel kaya si Dondon marahil ang ____.=mas salbahe[di-gasinong salbahe+pinakasalbahe]mas mabait",
        "Lima lamang sa atin ang makasasakay sa kotseng ito dahil ____ ito kumpara sa kotseng iyon.=di-gaanong malaki[higit na malaki+pinakamalaki]mas malaki",
        "Tila ____ ng kidlat ang kabayong iyon. Iyon na marahil ang mananalo sa karerang gaganapin.=simbilis[mas mabilis+mas mabagal]kasintalino",
        "Alam mo bang napakaraming bata ang pinag-aaral ni Don Felix? Sa tingin ko'y ____ si Don Miguel kumpara kay Don Felix.=di-gasinong matulungin[mas matulungin+higit na matulungin]pinakamatulungin",
        "Wala itong masyadong amoy kaya ____ ang bulaklak na ito kumpara sa bulaklak na iyon.=di-gaanong mabango[pinakamabango+mas mabango]higit na mabango",
        "Si Lope ang nagkampeon sa patimpalak dahil siya ang ____ sa lahat ng mga sumali rito.=pinakamahusay[mahusay+higit na mahusay]mas mahusay",
        "Naging Binibining Pilipinas si Shirley dahil bukod sa matalino ay siya rin ang ____ sa mga naging kalahok.=pinakamaganda[maganda+higit na maganda]mas maganda",
        "Dapat unahin ng alkalde ang pagtulong sa ating nayon dahil tayo ang nakaranas ng ____ pinsala mula sa bagyo.=pinakagrabeng[grabeng+higit na grabeng]mas grabeng",
        "Si Don Teodoro ang ____ sa lahat ng mga mamamayan sa lungsod na ito. Pag-aari niya ang lahat ng mga lupaing natatanaw mo mula rito.=pinakamayaman[mayaman+higit na mayaman]mas mayaman",
        "Nagkakahalaga pala ito ng sampung libong piso. Ito na ang ____ na relong natanggap ko kaninuman.=pinakamahal[mahal+higit na mahal]mas mahal",
        "Bumagsak ang tulay nang daanan ng trak. ____ talaga ang trak na iyon!=Napakabigat[Di-gaanong mabigat+Mas mabigat]Higit na mabigat",
        "Hmmm, napakasarap namang amuyin ng bulaklak na ito. Bukod sa maganda, ____ din ito.=mahalimuyak[maalingasaw+masangsang]walang amoy",
        "Ang tutang ito ay ____ kaya hindi mo ito maaaring iduyan nang malakas o yakapin nang mahigpit.=maselan[mas maselan+higit na maselan]pinakamaselan",
        "____ at ligtas ang aming nayon dahil ang lahat ng mga naninirahan dito ay may malaking takot sa Diyos.=Mapayapa[mas mapayapa+higit na mapayapa]pinakamapayapa",
        "Kung nais mo ang ____ pamumuhay balang araw, kailangan mong makatapos ng pag-aaral at magsikap nang mabuti.=marangyang[maralitang+dukhang]kapus-palad na",
        "Maaari mo bang laruin at aliwin ang bunso mong kapatid? Napapansin ko kasing ____ siya ngayon.=maligalig[malugod+masaya]kuntento",
    ],
];
$tier = purg_tier($lvl, $grd);
function purg_question(string $raw, int $tier, string $lvl): array {
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
    $_SESSION[$sessionKey]['current'] = purg_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo purg_h($cur['word']); ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo purg_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo purg_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang pinakaakmang pang-uri para sa pangungusap sa itaas.</p>
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
