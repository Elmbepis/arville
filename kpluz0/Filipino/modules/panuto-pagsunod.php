<?php
// filipino/modules/panuto-pagsunod.php
// Two original instruction banks; single difficulty.

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
$moduleTitle = 'Pagsunod sa Panuto';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
// Grade 1 bank; Grade 2+ bank. Kinder fallback uses Grade 1 bank.
function pps_tier(string $lvl, int $grd): int { return $grd <= 1 ? 1 : 2; }
function pps_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    1 => [
        "1. Isulat ang mga numerong 'isa' at 'dalawa'.<br/>2. Idugtong sa huli ang titik 'X'.=12X[13X+X21]1X2",
        "1. Isulat ang malaking titik na 'B'.<br/>2. Isulat ang sagot sa '5-2'.=B3[B5+B4]b3",
        "1. Gumuhit ng maikling linya gamit ang dalawang underscore (_).<br/>2. Idugtong ang salitang AKO sa dulo nito.=__AKO[__________AKO+__ASO]__________ABO",
        "1. Itala ang limang magkakasunod na titik ng alpabeto simula sa titik 'A'.<br/>2. Lagyan ng kuwit ang bawat pagitan ng mga titik.=A,B,C,D,E[A,B,C,D,E,F+ABCDE]A,B,C,D",
        "1. Isulat ang salitang INA.<br/>2. Dugtungan ito ng tatlong kuwit.=INA,,,[INA...+INA,.,]INA,,,,",
        "1. Piliin ang salitang tumutukoy sa 'school' sa mga sumusunod:<br/>paaralan<br/>tahanan<br/>simbahan<br/>parke<br/><br/>2. Isulat ang unang tatlong titik ng salitang napili mo.=paa[tah+sim]paar",
        "1. Piliin ang ikatlong salita sa mga sumusunod:<br/>talino<br/>katapatan<br/>pagmamahal<br/>katapangan<br/><br/>2. Isulat ang huling limang titik ng salitang napili mo.=mahal[alino+patan]amahal",
        "1. Magsulat ng tatlong maliliit na titik 'r'.<br/>2. Magsingit ng malaking titik 'P' sa bawat pagitan ng mga titik 'r'.=rPrPr[PrPrP+PrrrP]rrrP",
        "1. Isulat ang salitang 'pula'.<br/>2. Isulat ang salitang 'asul'.<br/>3. Magsingit ng simbolong '?' sa pagitan ng mga salita.=pula?asul[?pulaasul+pula???asul]pulaasul?",
        "1. Isulat ang pangalang 'Juan' nang pabaligtad.<br/>2. Dugtungan ito ng apelyidong 'Cruz'.=nauJCruz[anuJCruz+nuaJCruz]nauJCrus",
        "1. Isulat ang salitang 'at' sa pagitan ng mga salitang 'Ikaw' at 'Ako'.<br/>2. Idugtong sa hulihan ang katagang 'ay Tayo'.=Ikaw at Ako ay Tayo[ay Tayo Ikaw at Ako+Ikaw at Ako Tayo]Ikaw ay Ako at Tayo",
        "1. Isulat ang pangalang 'Edward' nang pabaligtad.<br/>2. Burahin ang mga titik na 'a' at 'w'.=drdE[derE+drwE]dradE",
        "1. Piliin sa mga sumusunod ang katagang may mga salitang magkatunog sa hulihan:<br/>pasa-pako<br/>basa-lasa<br/>lima-liko<br/>aso-pusa<br/><br/>2. Palitan ang simbolong '-' ng '>'.=basa>lasa[pasa>pako+lima>liko]basa-lasa",
        "1. Gumuhit ng isang malaking ekis.<br/>2. Gumuhit ng tatlong linyang pahilis pagkatapos nito.=X///[///X+X---]X////",
        "1. Isulat ang salita para sa numerong '20'.<br/>2. Magsingit ng linyang pahilis sa pagitan ng mga titik na 'm' at 'p'.=dalawam/pu[dalawang/pu+dalawam&pu]dalawa/mpu",
        "1. Isulat ang unang pangalan ng pangulong nanungkulan mula 2016 hanggang 2022.<br/>2. Burahin lahat ng titik 'r' sa pangalan.=odigo[Rodigo+odrigo]digo",
        "1. Piliin sa mga sumusunod ang pangalang may limang titik: Dave, Myra, Elmer, Edna, Teresa.<br/>2. Isulat ito nang pabaligtad.=remlE[AryM+andE]asereT",
        "1. Gumuhit ng mahabang linya gamit ang sampung underscore (_).<br/>2. Isulat sa dulo nito ang kulay ng hilaw na mangga.=__________berde[___berde+___dilaw]__________dilaw",
    ],
    2 => [
        "1. Isulat ang mga numerong 'isa' at 'dalawa'.<br/>2. Isulat ang titik 'X'.<br/>3. Isulat ang mga numerong 'apat' at 'lima'.=12X45[12X46+12X35]12Y45",
        "1. Isulat ang titik 'B'.<br/>2. Isulat ang bilang 'walo'.<br/>3. Isulat ang sagot sa '5-2'.=B83[B85+B84]B812",
        "1. Gumuhit ng maikling linya gamit ang dalawang underscore (_).<br/>2. Idugtong ang salitang AKO sa dulo nito.=__AKO[__________AKO+__ASO]__________ABO",
        "1. Itala ang limang magkakasunod na titik ng alpabeto simula sa titik 'A'.<br/>2. Lagyan ng kuwit ang bawat pagitan ng mga titik.=A,B,C,D,E[A,B,C,D,E,F+ABCDE]A,B,C,D",
        "1. Isulat ang salitang INA.<br/>2. Dugtungan ito ng tatlong kuwit.=INA,,,[INA...+INA,.,]INA,,,,",
        "1. Piliin ang salitang tumutukoy sa 'school' sa mga sumusunod:<br/>paaralan<br/>tahanan<br/>simbahan<br/>parke<br/><br/>2. Isulat ang unang tatlong titik ng salitang napili mo.=paa[taha+simb]park",
        "1. Piliin ang ikatlong salita sa mga sumusunod:<br/>talino<br/>katapatan<br/>pagmamahal<br/>katapangan<br/><br/>2. Isulat ang huling limang titik ng salitang napili mo.=mahal[alino+patan]amahal",
        "1. Magsulat ng tatlong maliliit na titik 'r'.<br/>2. Magsingit ng malaking titik 'P' sa bawat pagitan ng mga titik 'r'.=rPrPr[PrPrP+PrrrP]rrrP",
        "1. Isulat ang salitang 'pula'.<br/>2. Isulat ang salitang 'asul'.<br/>3. Magsingit ng simbolong '?' sa pagitan ng mga salita.=pula?asul[?pulaasul+pula???asul]pulaasul?",
        "1. Isulat ang pangalang 'Juan' nang pabaligtad.<br/>2. Dugtungan ito ng apelyidong 'Cruz'.<br/>3. Magsingit ng simbolong '!' sa pagitan nila.<br/>4. Idagdag ang titik 'E' sa huli.=nauJ!CruzE[anuJ!CruzE+nuaJ!CruzE]nauJ&CruzE",
        "1. Isulat ang salitang 'at' sa pagitan ng mga salitang 'Ikaw' at 'Ako'.<br/>2. Idugtong sa hulihan ang katagang 'ay Tayo'.=Ikaw at Ako ay Tayo[ay Tayo Ikaw at Ako+Ikaw at Ako Tayo]Ikaw ay Ako at Tayo",
        "1. Isulat ang pangalang 'Edward' nang pabaligtad.<br/>2. Burahin ang mga titik na 'a' at 'w'.=drdE[derE+drwE]dradE",
        "1. Piliin sa mga sumusunod ang katagang may mga salitang magkatunog sa hulihan:<br/>pasa-pako<br/>basa-lasa<br/>lima-liko<br/>aso-pusa<br/><br/>2. Palitan ang simbolong '-' ng '>'.<br/>3. Dugtungan ng '*' sa huli.=basa>lasa*[pasa>pako*+lima>liko*]basa-lasa*",
        "1. Gumuhit ng isang malaking ekis.<br/>2. Gumuhit ng tatlong linyang pahilis pagkatapos nito.=X///[///X+X---]X////",
        "1. Isulat ang salita para sa numerong '20'.<br/>2. Magsingit ng linyang pahilis sa pagitan ng mga titik na 'm' at 'p'.=dalawam/pu[dalawang/pu+dalawam&pu]dalawa/mpu",
        "1. Isulat ang unang pangalan ng pangulong nanungkulan mula 2016 hanggang 2022.<br/>2. Burahin lahat ng titik 'r' sa pangalan.<br/>3. Dugtungan sa unahan ng simbolong '%'.=%odigo[&odigo+%odrigo]odigo%",
        "1. Piliin sa mga sumusunod ang pangalang may limang titik: Dave, Myra, Elmer, Edna, Teresa.<br/>2. Isulat ito nang pabaligtad.<br/>3. Dagdagan ito ng malaking titik na 'E' sa huli.=remlEE[AryME+andEE]asereTE",
        "1. Gumuhit ng mahabang linya gamit ang sampung underscore (_).<br/>2. Isulat sa dulo nito ang kulay ng hilaw na mangga. <br/>3. Burahin ang titik 'd'.=__________bere[___bere+___ilaw]__________ilaw",
    ],
];
$tier = pps_tier($lvl, $grd);
function pps_question(string $raw, int $tier, string $lvl, int $grd): array {
    [$word, $correct, $a, $b, $c] = preg_split('/[=\[+\]]/', $raw);
    $wrong = [$a, $b, $c];
    shuffle($wrong);
    $choices = array_merge([$correct], $wrong);
    shuffle($choices);
    return ['word'=>$word, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'grade'=>$grd, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && ($_SESSION[$sessionKey]['current']['grade'] ?? null) === $grd
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || ($_SESSION[$sessionKey]['current']['grade'] ?? null) !== $grd || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys(array_unique($banks[$tier])), $used));
    if (!$available) { $used = []; $available = array_keys(array_unique($banks[$tier])); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pps_question($banks[$tier][$i], $tier, $lvl, $grd);
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <span style="color:#800080;font-weight:normal;">'<?php echo htmlspecialchars($result['clicked'], ENT_QUOTES, 'UTF-8'); ?>'</span>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:480px !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:wrap;overflow-wrap:anywhere;text-align:left;">
            <?php echo str_replace('&lt;br/&gt;', '<br/>', pps_h($cur['word'])); ?><br/><span style="display:inline-block;margin-top:12px;font-weight:normal;">Sagot:</span> <strong style="color:#CC0066;"><?php echo pps_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:480px !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:wrap;overflow-wrap:anywhere;text-align:left;">
        <?php echo str_replace('&lt;br/&gt;', '<br/>', pps_h($cur['word'])); ?>
    </span>
</div>
    <p style="max-width:450px;margin:20px auto 28px;font-size:16pt;color:#444;">Sundin ang mga hakbang sa itaas at piliin sa ibaba ang iyong nabuong kataga.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:min(480px,100%);margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
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
