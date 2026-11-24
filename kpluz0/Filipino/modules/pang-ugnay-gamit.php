<?php
// filipino/modules/pang-ugnay-gamit.php
// Difficulty-based sentence completion; Medium merged into Hard.

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
$moduleTitle = 'Paggamit ng Tamang Pang-ugnay';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pug_tier(string $lvl, int $grd): int { return $lvl === 'Easy' ? 0 : 1; }
function pug_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        'at>Mainit ____ matamis itong kape.+ni*ng',
        'at>Hinalo ni $name1 ang kape ____ gatas.+o*kay',
        'at>Pahiram ng lapis ____ papel.+ni*kay',
        'at>Magdala ka ng pagkain ____ tubig.+kay*ni',
        'at>Sasama sina Nanay ____ Tatay.+o*ni',
        'kay>Ako ay tatawag ____ $name1.+ni*ng',
        'kay>Ang bolang ito ay ____ $name1.+ni*ng',
        'kay>Ako ay nagpaturo ____ $name1.+ni*ng',
        'kay>Si $name1 ay nagtanong ____ $name2.+ni*ng',
        'kay>Sasama ka ba ____ $name1?+ni*ng',
        'ng>Manonood kami ____ sine bukas.+ni*at',
        'ng>Si $name1 ay bumili ____ gulay.+ni*sa',
        'ng>Nagdala si $name1 ____ suman.+ni*sa',
        'ng>Ang sako ay puno ____ bigas.+ni*at',
        'ng>Kakain ako ____ pansit.+ni*sa',
        'ng>Malakas ang tahol ____ aso ko.+ni*sa',
        'ni>Ang aso ____ $name1 ay mataba.+at*ng',
        'ni>Siya ay kapatid ____ $name1.+at*ng',
        'kay>Magkikita kami ____ $name1.+sa*ng',
        'ni>Ang lapis ____ $name1 ay nabali.+sa*ng',
        'ni>Matalino ang pinsan ____ $name1.+sa*ng',
        'ni>Kinain ____ $name1 ang tinapay.+sa*ng',
        'o>Gusto mo pa ba ____ ayaw mo na?+at*kung',
        'o>Masarap ba ito ____ hindi?+at*kung',
        'o>Siya ba si $name1 ____ hindi?+at*para',
        'o>Aalis ka ba ____ hindi?+at*kung',
        'o>Lagyan mo ito ng patis ____ toyo.+ng*ni',
        'sa>Si $name1 ay pumunta ____ bukid.+ni*at',
        'sa>Kami ay nakikinig ____ radyo.+ni*at',
        'sa>Dadalaw ____ kanila si $name1.+ni*at',
        'sa>Mabait si $name1 ____ akin.+ni*at',
        'sa>Namasyal sila ____ palaruan.+ni*at',
        'sa>Sasali sila ____ laro ninyo.+ni*at',
    ],
    1 => [
        'at>Sasama raw sina $name1 ____ $name2.+o*kasi',
        'at>Kapatid ko sina $name1 ____ $name2.+o*kung',
        'at>Dati ay mahaba ____ kulot ang kanyang buhok.+o*dahil',
        'nang>Nasa bahay ka ba ____ lumindol?+sa*para',
        'nang>Kalalabas niya pa lang ____ biglang umulan.+sa*para',
        'nang>Ang sanggol ay umiyak ____ kumulog.+sa*para',
        'ni>Ang basura ay itinapon ____ $name1.+sa*ng',
        'ni>Ang magnanakaw ay nakita ____ $name1.+sa*ng',
        'ni>Matalino ang pinsan ____ $name1.+sa*ng',
        'ni>Maganda ang proyekto ____ $name1.+sa*ng',
        'ni>Malaki na ang alagang kambing ____ $name1.+sa*ng',
        'ni>Mahaba at malambot ang buhok ____ $name1.+sa*ng',
        'ng>Pahihiramin ako ni $name1 ____ $item.+sa*ni',
        'ng>Bibili si $name1 ____ $item mamaya.+sa*para',
        'ng>Si $name1 ay nagluluto ____ almusal.+sa*para',
        'ng>Si $name1 ay nag-alaga ____ manok.+kay*ni',
        'ng>Nagluto ____ tanghalian si Inay.+sa*ni',
        'ng>Siya ay marunong tumugtog ____ gitara.+sa*kay',
        'ng>Si $name1 ay naghahanap ____ trabaho.+sa*kay',
        'ng>Humingi ____ pagkain ang matandang pulubi.+sa*kay',
        'ng>Nagbago ang presyo ____ mga bilihin.+para*kay',
        'o>Maliligo ka na ba ____ magsisipilyo ka muna?+at*kung',
        'o>Aalis ka na ba ____ kakain ka muna?+at*kung',
        'sa>Nagulat kami ____ malakas na ingay.+ni*kay',
        'sa>Naglalaro ____ bakuran ang magkakapatid.+ni*at',
        'sa>Magluluto siya ng adobo ____ kusina.+ni*ng',
        'sa>Nakapatong ____ mesa ang mga aklat.+ni*at',
        'sa>Masama ____ katawan ang pagpupuyat.+ni*kay',
        'dahil>Tayo nang bumisita kay $name1 ____ kaarawan niya ngayon.+pero*subalit',
        'dahil>Binigyan ni $name1 ng pera ang pulubi ____ naawa siya rito.+kaya*upang',
        'dahil>Mag-aral kang mabuti ____ may pagsusulit kayo bukas.+upang*ngunit',
        'habang>Si $name1 ay kumakanta ____ si $name2 ay sumasayaw.+upang*para',
        'habang>Si $name1 ay nagluluto ____ si $name2 ay nagwawalis.+upang*para',
        'habang>Si $name1 ay naglalaro ____ si $name2 ay natutulog.+upang*para',
        'kung>Sasama ako sa inyong mamasyal ____ maaga tayong makakauwi.+habang*ngunit',
        'kung>Bibili ako ng bagong sapatos ____ kasya ang pera ko.+upang*ngunit',
        'mula kay>Nakabili si $name1 ng $item ____ $name2 kanina.+mula sa*tungkol kay',
        'mula sa>Bumangon ____ kanyang kama si $name1.+dahil sa*para sa',
        'mula sa>Ang mga aning ito ay nanggaling ____ palengke.+dahil sa*para sa',
        'mula sa>Si $name1 ay darating sa $araw ____ Cavite.+dahil sa*para sa',
        'nang>Nagising si $name1 ____ tumilaok nang malakas ang tandang.+kaya*para',
        'nang>Kumain agad ang mag-anak ____ maluto ang kanilang almusal.+kaya*para',
        'nang>Umakyat sila sa punong iyon ____ dumaan ang malaking aso.+sa*para',
        'ngunit>Pupunta sana ako sa palengke ____ biglang umulan.+kaya*dahil',
        'ngunit>Bibili sana ako ng bigas ____ wala pala akong pera.+kaya*dahil',
        'ngunit>Sasama sana ako sa lakbay-aral ____ nagkasakit ako.+kaya*dahil',
        'para>Nag-iipon si $name1 ng pera ____ makabili siya ng $item.+dahil*ngunit',
        'para>Nagsisikap si $name1 ____ makatapos siya ng pag-aaral.+dahil*ngunit',
        'para>Binigyan ko si $name1 ng bola ____ makapaglaro siya.+pero*ngunit',
        'pero>Magluluto sana ako ng pansit ____ kulang ang aking sahog.+kaya*dahil',
        'pero>Bibili sana ako ng ulam ____ kulang ang aking pera.+kaya*dahil',
        'pero>Mabait naman si $name1 ____ madali siyang magalit.+kaya*dahil',
        'upang>Tumigil ang mga sasakyan ____ makatawid ang mga tao.+dahil*pero',
        'upang>Dinala ko si $name1 sa klinika ____ masuri siya ng doktor.+ngunit*kung',
    ],
];
$names = ['Adam', 'Alex', 'Angel', 'Ben', 'Carlos', 'Chris', 'Danilo', 'David', 'Diego', 'Ian', 'Isaac', 'Jack', 'Jason', 'Jose', 'Jimmy', 'Juan', 'Jose', 'Kevin', 'Lucas', 'Luis', 'Max', 'Nick', 'Robert', 'Sam', 'Tomas', 'Willie', 'Alice', 'Amy', 'Anna', 'Bella', 'Beth', 'Carol', 'Elisa', 'Emma', 'Eva', 'Grace', 'Joy', 'Julia', 'Kathy', 'Leah', 'Lina', 'Lydia', 'Maria', 'Mely', 'Mia', 'Naty', 'Sarah', 'Sofia', 'Tina', 'Vicky'];
$items = ['aklat', 'baso', 'lapis', 'tasa'];
$tier = pug_tier($lvl, $grd);
function pug_question(string $raw, int $tier, string $lvl, array $names, array $items): array {
    [$correct, $word, $a, $b] = preg_split('/[>+*]/', $raw);
    $ns = array_values(array_unique($names)); shuffle($ns);
    $days = ['Lunes','Martes','Miyerkules','Huwebes','Biyernes','Sabado','Linggo'];
    $word = strtr($word, ['$name1'=>$ns[0], '$name2'=>$ns[1], '$item'=>$items[array_rand($items)], '$araw'=>$days[array_rand($days)]]);
    $wrong = [$a, $b]; shuffle($wrong);
    $choices = array_merge([$correct], array_slice($wrong, 0, $tier === 0 ? 1 : 2)); shuffle($choices);
    return ['word'=>$word, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
function pug_completed(array $cur): string {
    $parts = explode('____', $cur['word'], 2);
    $answer = $parts[0] === '' ? ucfirst($cur['correct']) : $cur['correct'];
    return pug_h($parts[0]).'<strong style="color:#CC0066;">'.pug_h($answer).'</strong>'.pug_h($parts[1]);
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
    $_SESSION[$sessionKey]['current'] = pug_question($banks[$tier][$i], $tier, $lvl, $names, $items);
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
            <?php echo pug_completed($cur); ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo pug_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo pug_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang tamang pang-ugnay para mabuo ang pangungusap sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? count($cur['choices']) : 1;
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
