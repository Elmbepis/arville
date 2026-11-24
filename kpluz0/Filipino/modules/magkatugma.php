<?php
// filipino/modules/magkatugma.php
// Two grade-dependent rhyming-word banks; single difficulty.

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
$moduleTitle = 'Mga Salitang Magkatugma';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
// Legacy banks cover grades 0–2 and 3–4; older grades use the upper bank.
function mkt_tier(string $lvl, int $grd): int { return $grd <= 2 ? 0 : 1; }
function mkt_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "daga=taga[dapo+tago]pugo",
        "pusa=kusa[puso+puto]paso",
        "dila=tila[dulo+dalo]dito",
        "baso=laso[bata+baka]bati",
        "asin=akin[araw+isip]asal",
        "puso=bugso[pusa+pula]susi",
        "kuto=puto[puti+kuta]muta",
        "puso=bugso[pusa+pula]susi",
        "araw=ikaw[apoy+aray]akay",
        "daan=saan[pana+dala]baon",
        "dapa=lupa[kape+dapo]dami",
        "mapa=kapa[maso+mani]mali",
        "pako=lako[pasa+saka]laki",
        "bala=dala[bato+balo]bali",
        "kama=dama[kami+damo]dami",
        "patis=batis[palit+batik]patak",
        "liko=suko[lupa+tuka]lima",
        "salo=balo[suka+sali]sala",
        "tulo=kulo[tuka+tula]tali",
        "bara=sara[baro+karo]pari",
        "kubo=tubo[kuba+kaba]taba",
        "laba=kaba[laso+labo]labi",
        "kahon=dahon[kahel+kahit]dahil",
        "sabon=tapon[sabog+sibak]sapin",
        "sakit=palit[sikat+sukat]sakim",
        "hapon=balon[hapag+hamog]hilot",
        "supot=lusot[sunog+sipat]sipon",
        "manok=katok[sabik+balik]danak",
        "sagot=pulot[bigat+sikat]sakop",
        "kulot=lukot[sugod+kalat]pilit",
        "kapit=lapit[kapos+sapin]balik",
        "bulak=tulak[balat+bulok]halik",
        "hamon=lason[hamak+hamig]lamog",
        "pison=turon[pasan+pista]pisil",
        "sapin=ngipin[sabon+tapik]lapit",
    ],
    1 => [
        "bakas=lakas[takam+balon]kapos",
        "balita=nakita[balato+nalito]balisa",
        "bumukas=kinalas[bumuhos+bumungad]kumagat",
        "bunyag=lundag[bunyi+tindig]bantog",
        "dalaga=banyaga[nabago+palagi]dumito",
        "dumikit=naipit[dumukot+nahakot]tumakip",
        "dumilat=nabanat[dumikit+nahilot]umilag",
        "hinimok=natupok[hinamak+hinatak]nilimot",
        "humigop=sinakop[humugot+humigit]sumubok",
        "kapit=gamit[sapot+kapis]kamot",
        "katabi=nasabi[lababo+kabaro]kasama",
        "kinalmot=pumulot[nakamit+hinimok]humamon",
        "lapis=hapis[lapit+lapad]lupit",
        "lukso=tukso[luksa+likha]lanta",
        "lumipat=makunat[lumapit+lumapag]makipot",
        "malagim=pagdilim[natakam+nalikom]palagi",
        "manas=kalas[manok+panis]tamis",
        "nabasa=panlasa[nabago+nabati]nabigo",
        "natukoy=dumaloy[lumanay+nahukay]tumulay",
        "nilikha=lumuha[humalik+lumiko]lakihan",
        "piging=sining[pagong+bagang]lagim",
        "pintig=nagdilig[pindot+pantog]lumapag",
        "pumatak=hinamak[pumutok+pumitik]nilatag",
        "pumuslit=sumakit[dumilat+pumulot]bumalik",
        "sambit=pamalit[lambat+sambot]sampid",
        "sinibak=tinahak[sinibat+sinubok]nasabik",
        "suklay=talakay[siklab+suklam]tumukoy",
        "sumikat=dumilat[sinikap+sumimot]sumakit",
        "sumipot=dinakot[sinapit+lumapat]sumipol",
        "sumuko=lumiko[tumuka+humiga]sumuka",
        "sunog=tunog[tinig+sinag]lunod",
        "tubig=hilig[dalag+tubog]tunog",
        "tumawa=ginhawa[tumalo+bumawi]tinawag",
        "umikot=idulot[pumihit+sumakit]pumikit",
    ],
];
$tier = mkt_tier($lvl, $grd);
function mkt_question(string $raw, int $tier, string $lvl): array {
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
    $_SESSION[$sessionKey]['current'] = mkt_question($banks[$tier][$i], $tier, $lvl);
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
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang katugma ng salitang '<?php echo mkt_h($cur['word']); ?>' ay ang salitang <strong style="color:#CC0066;">'<?php echo mkt_h($cur['correct']); ?>'</strong>.</p>
<div style="display:inline-flex;width:auto;max-width:100%;margin:20px auto;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;flex-direction:column;justify-content:center;align-items:center;overflow-wrap:anywhere;">
        <strong style="color:#CC0066;font-size:14pt;">MAGKATUGMA:</strong>
        <strong style="color:#800080;font-size:24pt;"> <?php echo mkt_h($cur['word'].' : '.$cur['correct']); ?></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;">
        <?php echo mkt_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang pinakatugma sa salita sa itaas.</p>
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
