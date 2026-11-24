<?php
// filipino/modules/pangngalan-gamit.php
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
$moduleTitle = 'Wastong Paggamit ng Pangngalan';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
// Legacy banks cover grades 0–2 and 3–10.
function pngg_tier(string $lvl, int $grd): int { return $grd <= 2 ? 0 : 1; }
function pngg_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "Ang pangalan ko ay ____.=Jose Santos[jose santos+7 taong gulang]San Andres St.",
        "Ang ____ ko ay Jose Santos.=pangalan[edad+paaralan]tahanan",
        "Ang ____ ko ay Jose Santos.=pangalan[edad+paaralan]tahanan",
        "Ang aking ____ ay 7 taon.=edad[pangalan+paaralan]tahanan",
        "Nakatira ako sa ____.=123 Taal St.[123 taal st.+8 taong gulang]Juan Santos",
        "Nakatira ako sa isang ____ na katamtaman ang laki.=bahay[Bahay+Maynila]Jose Santos",
        "May alaga akong puting ____.=tuta[tirahan+Makati]tao",
        "Ang pangalan ng aking alagang puting tuta ay ____.=Kulas[8 taong gulang+lalaki]kulas",
        "Mayroon akong ateng nagngangalang ____.=Sarah[sarah+babae]5 talampakan",
        "Ang aking kuya ay may ____ na 5 talampakan.=taas[bigat+pangalan]Taas",
        "Ako ay nag-aaral sa ____.=Pasay Elementary School[5 talampakan+8 taong gulang]maynila",
        "Ako ay nag-aaral sa isang maliit na ____ sa aming nayon.=paaralan[Paaralan+Juan Santos]maynila",
        "Mayroon akong dalawang ____.=kapatid[Sarah+Robert]Kapatid",
        "Ang pangalan ng aking kuya ay ____.=Robert[robert+Sarah]lalaki",
        "Ang pangalan ng aking ate ay ____.=Sarah[Robert+sarah]babae",
        "Ang aming apelyido ay ____.=Santos[santos+maynila]123 Taal St.",
        "Ang aking kasarian ay ____.=lalaki[Lalaki+jose]tirahan",
        "Mahilig akong mag-alaga ng mga ____.=hayop[Hayop+ulap]8 taong gulang",
        "Ang ____ ng aming lote ay 100 metro kuwadrado.=lawak[taas+bigat]haba",
        "Ang aking ama ay nagtatrabaho sa isang ____ ng mga sapatos.=pagawaan[Pagawaan+Maynila]paaralan",
        "Ang aking ama ay nagtatrabaho sa ____.=XYZ Shoe Company[xyz shoe company+7 taong gulang]kasarian",
        "Si ____ ang aking paboritong manlalaro ng basketbol.=Michael Jordan[michael jordan+123 Taal St.]Maynila",
        "Ang paborito kong pelikula ay ____.=Star Wars[star wars+Jose Santos]simbahan",
        "Ako ay may ____ na 30 kilo.=bigat[Bigat+edad]taas",
        "Lumipad ang ____ nang habulin ito ng pusa.=ibon[aso+bata]Ibon",
        "Umakyat sa Bundok Makiling ang dalawang ____.=magpinsan[magpipinsan+nagpipinsan]nagpinsan",
        "Nakakita ako ng isang elepante sa ____ kahapon.=Manila Zoo[Manila zoo+manila Zoo]manila zoo",
        "Ang ____ ang pinakamatandang simbahan sa Pilipinas.=Simbahan ng San Agustin[Simbahan ng san agustin+simbahan ng San agustin]simbahan ng san agustin",
    ],
    1 => [
        "Ang aming ____ ay yari sa bato at may dalawang palapag.=bahay[Bahay+kotse]pagkain",
        "Ang sasakyan ng aming pamilya ay ____.=Toyota Vios[toyota vios+kuting]paaralan",
        "Ang aking nakatatandang kapatid ay may ____ na 16 taong gulang.=edad[Edad+taas]bigat",
        "Ang aking pinsang lalaki ay may ____ na 6 na talampakan.=taas[Taas+edad]bigat",
        "Ang kasarian ng aming alagang aso ay ____.=lalaki[5 kilo+2 taong gulang]Rintintin",
        "Ang pangalan ng aming alagang aso ay ____.=Rintintin[rintintin+babae]5 kilo",
        "Ang tatak ng paborito kong gomang sapatos ay ____.=Adidas[adidas+anim na pulgada]puti",
        "Ang ____ ng paborito kong gomang sapatos ay puti.=kulay[tatak+sukat]bigat",
        "Ang ____ ng suot kong balat na sapatos ay '9'.=sukat[tatak+kulay]presyo",
        "Bumili ako ng mga kakanin, gulay, at prutas sa ____.=palengke[simbahan+munisipyo]paliparan",
        "Lima kaming ____ kaya maingay sa aming tahanan.=magkakapatid[magkapatid+kapatid]mga kapatid",
        "Ang ____ Mario at Bitoy ay namasyal sa palaruan kanina.=mag-amang[mag-aamang+pamilyang]mag-anak na",
        "Ang buong ____ Santos ay sama-samang lumipad patungong Amerika.=mag-anak na[mag-amang+mag-inang]magkapatid na",
        "Binisita namin ang mga batang ulilang nakatira sa isang ____.=bahay-ampunan[bahay-kainan+bahay-bahayan]Bahay-ampunan",
        "Magkakasundo kaming mga ____ kaya maganda ang samahan sa aming komunidad.=magkakapitbahay[kapitbahay+magkapitbahay]magkakabahay",
        "Totoo nga kayang may nakabaon na ginto sa dulo ng makulay na ____?=bahaghari[bihaghari+Bahaghari]balaghari",
        "Nakahuli ng isang usa at limang ____ ang mangangaso sa gubat.=baboy-ramo[Baboy-ramo+babuyang-ramo]magbababoy-ramo",
        "Matatagpuan sa Timog-silangang Asya ang ____, isa sa mga pinakamaliit na isda sa buong mundo.=Pandaka pygmaea[pandaka Pygmaea+pandaka pygmaea]Pandaka Pygmaea",
        "Sina ____ at Stephen Hawking ang mga paborito kong pisiko.=Albert Einstein[Albert einstein+albert einstein]albert Einstein",
        "Ang ____ ay naganap noong ika-23 ng Agosto, 1896.=Sigaw ng Pugad Lawin[Sigaw ng pugad lawin+sigaw ng pugad lawin]sigaw ng Pugad lawin",
        "Nakakita ako ng isang ____ nagngangalang Mali sa Manila Zoo kahapon.=elepanteng[Elepanteng+elephanteng]Elephanteng",
        "Ang ____ ang pinakamatandang simbahan sa Pilipinas.=Simbahan ng San Agustin[Simbahan ng san agustin+simbahan ng San agustin]simbahan ng san agustin",
        "Ang ____ ang bumubuo ng Rehiyon II ng Pilipinas.=Lambak ng Cagayan[Lambak ng cagayan+lambak ng Cagayan]lambak ng cagayan",
        "Ako ay nag-aaral sa isang ____ sa aming barangay.=mababang paaralan[Mababang Paaralan+mababang Paaralan]Mababang paaralan",
        "Naglaro ang mga batang paslit ng ____ gamit ang isang malaking karton.=bahay-bahayan[bahay-bahay+bahayan]babahayan",
        "Mayaman pala at maraming ____ ang mga magulang ni Dennis.=ari-arian[arian+ari-ari]Ari-arian",
        "Marami ang nawalan ng ____ sa buong mundo nang magkaroon ng pandemya.=hanapbuhay[Hanapbuhay+hanap buhay]hanap-buhay",
        "Sumakit ang ulo ko sa ____ ng mahabang daanang iyon.=pagliku-liko[Pagliku-liko+paliku-liko]Paliku-liko",
    ],
];
$tier = pngg_tier($lvl, $grd);
function pngg_question(string $raw, int $tier, string $lvl): array {
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
    $_SESSION[$sessionKey]['current'] = pngg_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo pngg_h($cur['word']); ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo pngg_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo pngg_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang wastong pangngalan para sa pangungusap sa itaas.</p>
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
