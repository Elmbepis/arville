<?php
// filipino/modules/pagpapantig.php
// Grade-dependent capitalization.

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
$moduleTitle = 'Paggamit ng mga Malalaking Titik';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$names = [
"Adam", "Alex","Angel","Ben","Carlos","Chris","Danilo","David","Diego","Ian","Isaac","Jack","Jason","Jose","Jimmy","Juan","Jose","Kevin","Lucas","Luis","Max", 
"Nick","Robert","Sam","Tomas","Willie",
"Alice", "Amy","Anna","Bella","Beth","Carol","Elisa","Emma","Eva","Grace","Joy","Julia","Kathy","Leah", "Lina","Lydia","Maria","Mely","Mia","Naty","Sarah","Sofia",
"Tina", "Vicky"
];
$banks = [
0 => [
'Ang pangalan ko ay $name1.',
'Magluluto na pala si $name1.',
'Dito maglalaro si $name1 bukas.',
'Mahilig si $name1 sa gulay.',
'Ako si $name1 Tolentino.',
'Darating sa Lunes si $name1.',
'Kitty ang pangalan ng pusa namin.',
'Sasama ka ba sa amin sa Sabado?',
'Sa Navotas ako ipinanganak.',
'Pupunta kami sa Laguna mamaya.',
'Buwan ng Abril kami nagkita.',
'Sasama ako sa Tondo.',
'Nabili ko ito sa Cavite.',
'Maraming tindahan sa Pasay.',
'Kiko ang pangalan ng tuta niya.',
'Dumaan kami sa Maynila kagabi.', 
'Huwag kang lalapit kay $name1.', 
'Sa Batangas tayo bumili ng isda.',
'Kakain ba tayo sa Jollibee?',
'Mamimili ba tayo sa Glorietta?', 
],
1 => [
'Ang tatak ng telebisyon ni $name1 ay Sony.',
'Buwan ng Hulyo kami nagkakilala ni $name1.',
'Nabili ko ito sa Cavite noong Biyernes.',
'Mabait si $name1 sa kanyang mga kaibigan.',
'Ang pangalan ng aking alagang aso ay Kulas.',
'Ang pangalan ng aking guro ay $name1 Gonzales.',
'Sina $name1 at $name2 ang aking mga kapatid.',
'Ang aking mga pinsan ay sina $name1 at $name2.',
'Karamihan sa mga Pilipino ay Katoliko.',
'Nais kang makausap nina $name1 at $name2.',
'Magkikita kami ni $name1 sa darating na Biyernes.',
'Marumi pa rin ba hanggang ngayon ang Ilog Pasig?',
'Si Jose Rizal ang ating pambansang bayani.',
'Ako ay magiging walong taong gulang na sa Agosto.',
'Dito ako ibinili ni $name1 ng Pepsi.',
'Hindi ako papasok mula Lunes hanggang Huwebes.',
'Doon ako nakatira sa 2418 Daffodil Street.',
'Bumili ka ng mantika kina Aling Paz.',
],
2 => [
'Bibili ba si $name1 ng damit sa Mall of Asia mamaya?', 
'Kina $name1 siya tumira mula Agosto hanggang Setyembre.',
'Sa Jollibee sa Pasay ka ba kumain noong Miyerkules?', 
'May dalawang pares ng sapatos na Adidas si $name1.',
'Pumapasok ako sa Mababang Paaralan ng San Rafael.',
'Galing pa sa Korea ang mga darating na bisita sa Huwebes.',
'Nag-aaral si $name1 sa Unibersidad ng Pilipinas.',
'Sina $name1, $name2, at $name3 ay magkakapatid pala.',
'Magbabakasyon kami sa Tagaytay sa darating na Mayo.',
'Ang kapatid ni $name1 ay nanalo sa paligsahan kanina.',
'Sina $name1 at $name2 ang napiling kinatawan ng paaralan.',
'Sina $name1 at $name2 ay dumalo sa kaarawan ni $name3.',
'Sina $name1 at $name2 ay namili ng mga prutas sa Laguna.',
'Kakausapin nina $name1 at $name2 si $name3 mamayang gabi.',
'Tuwing Linggo, kami ay nagsisimba sa Sacred Heart Parish.',
'Tuwing Abril at Mayo, umuuwi kami sa lalawigan ng Quezon.',
'Pupuntahan namin si Dr. Gamboa sa St. John Hospital.',
'Namasyal ang buong pamilya sa Manila Zoo noong Sabado.',
'Kitang-kita ang Bundok Apo mula sa bahay ni Mang Juan.',
'Gumagamit ba si $name1 ng Google sa kanyang pag-aaral?',
],
3 => [
'Pumapasok si $name1 sa Mataas na Paaralan ng San Isidro.',
'Sasayaw kami sa darating na pagdiriwang ng Linggo ng Wika.',
'Sina $name1, $name2, at $name3 ay ipinanganak sa Maynila.',
'Nakatira kami sa Better Living Subdivision sa Barangay Don Bosco.',
'Mamamasyal sa Rizal Park si $name1 pagkatapos niyang magsimba.',
'Ang Laguna de Bay ang pinakamalaking lawa sa Pilipinas.',
'Sina $name1 at $name2 ang susundo kay $name3 sa Huwebes.',
'Si $name1 ay isang empleyado ng Philippine National Bank.',
'Nakapunta na si $name1 sa Estados Unidos, Hapon, at Tsina.',
'Pinakamataas ang populasyon ng Lungsod ng Quezon sa Metro Manila.',
'Ipinanganak si $name1 sa Laguna noong ikatlo ng Enero, 1991.',
'Pumunta sina $name1 at $name2 sa Avilon Zoo noong Martes.',
'Noong Hunyo huling nakita ni $name1 sina Mang Jose at Aling Tess.',
'Ililibre ni $name1 sina $name2 at $name3 sa Jollibee sa Paco.', 
'Toyota Corolla Altis ang sinakyan nina $name1 at $name2 kanina.', 
'Gumagamit ba sina $name1 at $name2 ng mga produkto ng Apple?',
'Sa Facebook ko natunton sina $name1 at $name2 noong Pebrero.',
],
];

function tm_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function tm_tier(string $lvl, int $grd): int {
    $tier = $grd <= 1 ? 0 : ($grd == 2 ? 1 : 2);
    return $tier + ($lvl === 'Hard' ? 1 : 0);
}
function tm_question(string $raw, int $tier, string $lvl, int $grd, array $names): array {
    $names = array_values(array_unique($names));
    shuffle($names);
    $correct = strtr($raw, ['$name1'=>$names[0], '$name2'=>$names[1], '$name3'=>$names[2]]);
    return ['word'=>strtolower($correct), 'correct'=>$correct, 'tier'=>$tier, 'lvl'=>$lvl, 'grade'=>$grd, 'qid'=>bin2hex(random_bytes(16))];
}
$result=null; $scorer=null; $error='';
$cur=$_SESSION[$sessionKey]['current'] ?? null;
if (isset($_POST['Submit1']) && !isset($_POST['Submit2']) && $cur && $cur['grade']===$grd && is_string($_POST['qid'] ?? null) && hash_equals($cur['qid'], $_POST['qid'])) {
    $answer=$_POST['answer'] ?? null;
    if (!is_string($answer) || strlen($answer)>200 || trim($answer)==='') $error='Maglagay ng wastong sagot.';
    else { $answer = trim($answer); }
    if ($error==='') {
        $scorer=new Scorer($conn,$moduleId);
        $ok=$scorer->processAnswer($answer,$cur['correct'],$cur['lvl']);
        $result=['answer'=>$answer,'correct'=>$ok];
        unset($_SESSION[$sessionKey]['current']);
    }
}
if ($result===null && $error==='') {
    $tier=tm_tier($lvl,$grd);
    $indices=array_keys(array_unique($banks[$tier]));
    $used=$_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available=array_values(array_diff($indices,$used));
    if (!$available) { $used=[]; $available=$indices; }
    $i=$available[array_rand($available)]; $used[]=$i;
    $_SESSION[$sessionKey]['used'][$tier]=$used;
    $cur=tm_question($banks[$tier][$i],$tier,$lvl,$grd,$names);
    $_SESSION[$sessionKey]['current']=$cur;
}
$theme=[]; render_header($moduleTitle,$moduleTitle,$theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo tm_h($_SERVER['PHP_SELF']); ?>">
<?php if ($result!==null): ?>
<p style="font-size:14pt;color:#800080;font-weight:700;">Ito ang sagot mo:<br/><span style="color:#800080;font-weight:normal;">'<?php echo tm_h($result['answer']); ?>'</span></p>
<p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct']?'#006600':'#CC0000'; ?>; "><?php echo $result['correct']?'Ito ay tumpak!':'Ito ay hindi tumpak.'; ?></p>
<p style="font-size:14pt;color:#800080;font-weight:700;max-width:450px;margin:20px auto;">Ang tamang paggamit ng malalaking titik sa pangungusap na ito ay ganito:</p>
<div style="text-align:center;margin:20px auto;"><span style="display:inline-block;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;max-width:450px;width:auto;box-sizing:border-box;font:700 16pt/1.5 Arial,sans-serif;color:#CC0066;overflow-wrap:anywhere;"><?php echo tm_h($cur['correct']); ?></span></div>
<?php else: ?>
<p style="font-size:16pt;color:#800080;font-weight:700;max-width:450px;margin:20px auto;">Ipakita ang tamang paggamit ng malalaking titik sa pangungusap sa ibaba.</p>
<p style="font-size:13pt;color:#444;max-width:450px;margin:10px auto 30px;">Palitan ng malalaking titik ang mga titik na dapat palitan sa pangungusap.</p>
<?php if ($error!==''): ?><p style="color:#CC0000;"><?php echo tm_h($error); ?></p><?php endif; ?>
<input type="hidden" name="qid" value="<?php echo tm_h($cur['qid']); ?>">
<textarea name="answer" maxlength="200" rows="1" required autocomplete="off" autocapitalize="off" spellcheck="false" aria-label="Paggamit ng malalaking titik" autofocus oninput="this.style.height='auto';this.style.height=(this.scrollHeight+4)+'px';" style="display:block;width:100%;max-width:480px;box-sizing:border-box;margin:20px auto;padding:24px 30px;text-align:center;font:700 20pt/1.5 Arial,sans-serif;color:#0000CC;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;resize:none;overflow:hidden;"><?php echo tm_h($cur['word']); ?></textarea>

<script>
const answerBox = document.querySelector('textarea[name="answer"]');
answerBox.style.height = 'auto';
answerBox.style.height = (answerBox.scrollHeight + 4) + 'px';
</script>
<?php endif; ?>
<div style="display:flex;justify-content:center;align-items:center;gap:20px;margin:<?php echo $result===null?'30px 0 20px':'50px 0 50px'; ?>;">
<?php if ($result===null): ?><input type="submit" name="Submit1" value=" Submit " style="font-family:Arial,sans-serif;"><?php endif; ?>
<input type="submit" name="Submit2" value=" Bagong Tanong " formnovalidate style="font-family:Arial,sans-serif;">
</div>
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
