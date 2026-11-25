<?php
// filipino/modules/pag-aalpabeto.php
// Grade-dependent alphabetical ordering.

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
$moduleTitle = 'Pag-aalpabeto ng mga Salita';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$banks = [
1 => ['ako', 'aso', 'baba', 'bata', 'biik', 'bota', 'bula', 'daga', 'dumi', 'gata', 'goma', 'hari', 'hika', 'huli', 'ilaw', 'isda', 'kayo', 'keso', 'kubo', 'lata', 'leeg', 'lobo', 'lupa', 'mata', 'mina', 'mula', 'noo', 'oso', 'paa', 'pako', 'puro', 'sabi', 'sako', 'siko', 'subo', 'tali', 'tren', 'tuta', 'ugat', 'ulan', 'upo'],
2 => ['ahas', 'araw', 'asal', 'babae', 'baboy', 'bahay', 'balde', 'bangka', 'bakod', 'binti', 'bulsa', 'damit', 'gamit', 'gatas', 'halik', 'himig', 'hugis', 'ipis', 'kalan', 'kahoy', 'karne', 'kabayo', 'kuting', 'lalaki', 'loro', 'limot', 'lukso', 'manok', 'mapa', 'medyas', 'ngiti', 'payong', 'pugad', 'pulis', 'saging', 'sayaw', 'siyam', 'sulat', 'tatlo', 'unggoy', 'yakap'],
3 => ['alahas', 'anghel', 'anino', 'balon', 'baril', 'boses', 'bundok', 'bunga', 'buntot', 'buslo', 'buwan', 'gagamba', 'gulong', 'hangin', 'kalye', 'kamay', 'kawali', 'kidlat', 'kuneho', 'kutsara', 'kutsilyo', 'langis', 'lawin', 'madre', 'maleta', 'maskara', 'medalya', 'musmos', 'oras', 'pagong', 'palaka', 'paniki', 'payong', 'peras', 'posporo', 'piloto', 'pulubi', 'punda', 'salamin', 'salita', 'sapatos', 'saranggola', 'sigaw', 'sinulid', 'sirena', 'sukat', 'talon', 'tandang', 'tinig', 'trumpo', 'ugali', 'unggoy', 'trono'],
4 => ['alaga', 'alahas', 'alalay', 'alapaap', 'anino', 'aralin', 'bahagi', 'bandila', 'barbero', 'basahan', 'bigkas', 'bisita', 'bubuyog', 'bughaw', 'buwaya', 'dagdag', 'damdamin', 'digmaan', 'epekto', 'eroplano', 'gagamba', 'gulong', 'hangin', 'kalaro', 'kamukha', 'kandado', 'kasama', 'kasapi', 'kawali', 'kidlat', 'kuneho', 'kutsara', 'kutsilyo', 'labanos', 'langis', 'lawin', 'madre', 'malaya', 'maleta', 'mansanas', 'maskara', 'medalya', 'pagong', 'pangkat', 'payong', 'pandikit', 'posporo', 'palaka', 'paniki', 'piloto', 'pulubi', 'sagisag', 'salamin', 'sapatos', 'saranggola', 'simbolo', 'sinulid', 'sirena', 'talino', 'tandang', 'trumpo', 'umakyat', 'unggoy', 'watawat'],
5 => ['alaala', 'alapaap', 'bahagi', 'bantayog', 'basahan', 'bilanggo', 'bumagsak', 'damdamin', 'dikya', 'garapon', 'gunita', 'hagdanan', 'kaalaman', 'kabute', 'kabuuan', 'kahawig', 'kalaban', 'kalapati', 'kalawang', 'kamukha', 'kandado', 'kapayapaan', 'kasundo', 'katahimikan', 'kayumanggi', 'kuliglig', 'kuwago', 'labanos', 'lumagpak', 'lumipad', 'luntian', 'mungkahi', 'nakadilat', 'nakamulat', 'nakapikit', 'nakapiring', 'nakatitig', 'naninilaw', 'niyebe', 'pagkakaisa', 'pagsasaad', 'pananalita', 'panauhin', 'paniniwala', 'planeta', 'reklamo', 'sagisag', 'simbolo', 'teritoryo', 'tsinelas', 'umakyat', 'umangat', 'tungkulin'],
6 => ['alapaap', 'ambulansya', 'bantayog', 'bilanggo', 'bumagsak', 'buhawi', 'bulalakaw', 'damdamin', 'garapon', 'gunita', 'hagdanan', 'kaalaman', 'kabute', 'kabuuan', 'kahawig', 'kalaban', 'kalapati', 'kalasag', 'kalawang', 'kamukha', 'kandado', 'kapayapaan', 'kasundo', 'katahimikan', 'kayumanggi', 'koponan', 'kuliglig', 'kumunoy', 'kuwago', 'labanos', 'lumagpak', 'lumipad', 'luntian', 'mananayaw', 'mungkahi', 'nakadilat', 'nakamulat', 'nakapikit', 'nakapiring', 'nakatitig', 'naninilaw', 'niyebe', 'pagkakaisa', 'pagsasaad', 'pananalita', 'panauhin', 'paniniwala', 'planeta', 'polusyon', 'reklamo', 'sagisag', 'simbolo', 'teritoryo', 'tsinelas', 'umakyat', 'umangat', 'tinulungan', 'tsinelas', 'tungkulin'],
7 => ['alapaap', 'ambulansya', 'balarila', 'bantayog', 'baybayin', 'bilanggo', 'binalaan', 'binantaan', 'bumagsak', 'bulalakaw', 'bumighani', 'damdamin', 'dinakila', 'dinaluyan', 'dinamayan', 'garapon', 'gunitain', 'hagdanan', 'kaalaman', 'kabuktutan', 'kabuluhan', 'kabuuan', 'kahalagahan', 'kahawig', 'kalaban', 'kalapati', 'kalasag', 'kalawang', 'kamukha', 'kandado', 'kapayapaan', 'karangyaan', 'kasundo', 'katahimikan', 'katarungan', 'kayumanggi', 'koponan', 'kuliglig', 'kumunoy', 'lumagpak', 'lumipad', 'luntian', 'magmukmok', 'magmaktol', 'magmungkahi', 'magkubli', 'mananayaw', 'mungkahi', 'nabubugnot', 'nagugulumihanan', 'naguguluhan', 'nakababagot', 'nakababaliw', 'nakabubulahaw', 'nakadilat', 'nakakatakot', 'nakamulat', 'nakapikit', 'nakapiring', 'nakaratay', 'nakasusuklam', 'nakatingala', 'nanganganib', 'nangangatal', 'nanginginig', 'naninibago', 'nakatitig', 'naninilaw', 'niyebe', 'pagkakaisa', 'pagpapaunlak', 'pagmamalabis', 'pagpapaliwanag', 'pagpaparaya', 'pagsasaad', 'pagtanggi', 'pananabik', 'pananalita', 'panauhin', 'panghihimasok', 'paniniwala', 'panitikan', 'pinaanyayahan', 'pinagsilbihan', 'pinahintulutan', 'polusyon', 'talasalitaan', 'tanikala', 'teritoryo', 'tinulungan', 'tsinelas', 'tungkulin'],
];

function alp_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function alp_tier(string $lvl, int $grd): int {
    $tier = $grd <= 1 ? 1 : ($grd <= 3 ? 2 : ($grd <= 5 ? 3 : 4));

    if ($lvl === 'Hard') {
        return $tier + ($grd <= 1 ? 1 : 2);
    }

    return $tier;
}function alp_question(array $bank, string $lvl, int $grd): array {
    $n = $lvl === 'Hard'
    ? ($grd <= 1 ? 4 : 5)
    : ($grd >= 4 ? 5 : 3);
    $min = $lvl === 'Hard' ? ($grd > 5 ? 6 : ($grd > 3 ? 5 : ($grd > 1 ? 4 : 0))) : 0;
    $max = $lvl === 'Easy' && $grd < 3 ? 7 : 15;
    $pool = array_values(array_unique(array_filter($bank, static function($w) use ($min,$max) { return strlen($w) >= $min && strlen($w) <= $max; })));
    if ($lvl === 'Hard' && $grd >= 4) {
        // Preserve the legacy challenge of neighboring vocabulary entries.
        $windows = [];
        for ($i=0; $i <= count($pool)-5; $i++) $windows[] = array_slice($pool,$i,5);
        $words = $windows[array_rand($windows)];
    } else { shuffle($pool); $words = array_slice($pool,0,$n); }
    shuffle($words);
    $correct = $words; sort($correct,SORT_STRING);
    return ['words'=>$words,'correct'=>$correct,'lvl'=>$lvl,'grade'=>$grd,'qid'=>bin2hex(random_bytes(16))];
}
function alp_order(array $words, $ranks): ?array {
    if (!is_array($ranks) || count($ranks)!==count($words)) return null;
    $ordered=[];
    foreach ($words as $i=>$word) {
        $rank=$ranks[$i] ?? null;
        if (!is_string($rank) || !preg_match('/^[1-5]$/D',$rank) || (int)$rank>count($words) || isset($ordered[(int)$rank])) return null;
        $ordered[(int)$rank]=$word;
    }
    ksort($ordered); return array_values($ordered);
}
$result=null; $scorer=null; $error='';
$cur=$_SESSION[$sessionKey]['current'] ?? null;
if (isset($_POST['Submit1']) && !isset($_POST['Submit2']) && $cur && $cur['grade']===$grd && is_string($_POST['qid'] ?? null) && hash_equals($cur['qid'],$_POST['qid'])) {
    $ordered=alp_order($cur['words'],$_POST['ranks'] ?? null);
    if ($ordered===null) { $error='Gamitin ang bawat bilang nang isang beses lamang.'; }
    else {
        $scorer=new Scorer($conn,$moduleId);
        $ok=$scorer->processAnswer(implode('|',$ordered),implode('|',$cur['correct']),$cur['lvl']);
        $result=['ordered'=>$ordered,'correct'=>$ok];
        unset($_SESSION[$sessionKey]['current']);
    }
}
if ($result===null && $error==='') {
    $cur=alp_question($banks[alp_tier($lvl,$grd)],$lvl,$grd);
    $_SESSION[$sessionKey]['current']=$cur;
}
$theme=[]; render_header($moduleTitle,$moduleTitle,$theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo alp_h($_SERVER['PHP_SELF']); ?>">
<?php if ($result!==null): ?>
<p style="font-size:14pt;color:#800080;max-width:450px;margin:20px auto;">Inalpabeto mo ang mga salita sa ganitong paraan:<br/><strong style="color:#0000CC;"><?php echo alp_h(implode(', ',$result['ordered'])); ?></strong></p>
<p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct']?'#006600':'#CC0000'; ?>;"><?php echo $result['correct']?'Ito ay tumpak!':'Hindi ito tumpak.'; ?></p>
<div style="text-align:center;margin:20px auto;"><span style="display:inline-block;width:auto;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;color:#800080;font-weight:700;line-height:1.5;">Ang tamang pag-aalpabeto ng mga salita ay ganito:<br/><strong style="color:#CC0066;"><?php echo alp_h(implode(', ',$cur['correct'])); ?></strong></span></div>
<?php else: $n=count($cur['words']); ?>
<p style="font-size:16pt;color:#800080;font-weight:700;max-width:450px;margin:20px auto;">I-alpabeto ang mga sumusunod na salita.</p>
<p style="font-size:13pt;color:#333;max-width:450px;margin:10px auto 20px;">Isulat ang '1' sa tabi ng unang salita, '2' sa tabi ng pangalawa, at ituloy ito hanggang sa huling salita.</p>
<?php if ($error!==''): ?><p style="color:#CC0000;"><?php echo alp_h($error); ?></p><?php endif; ?>
<input type="hidden" name="qid" value="<?php echo alp_h($cur['qid']); ?>">
<div style="display:grid;grid-template-columns:auto 52px;gap:12px 20px;align-items:center;width:max-content;max-width:100%;margin:0 auto;">
<?php foreach ($cur['words'] as $i=>$word): ?>
<label for="rank<?php echo $i; ?>" style="font-size:18pt;font-weight:700;color:#800080;text-align:right;overflow-wrap:anywhere;"><?php echo alp_h($word); ?></label>
<input id="rank<?php echo $i; ?>" name="ranks[<?php echo $i; ?>]" type="text" inputmode="numeric" maxlength="1" pattern="[1-<?php echo $n; ?>]" aria-label="Posisyon ng <?php echo alp_h($word); ?>" style="width:52px;height:42px;box-sizing:border-box;text-align:center;font:bold 18pt Arial;color:#0000CC;border:2px solid #888;border-radius:8px;">
<?php endforeach; ?></div>
<?php endif; ?>
<div>
    <?php if ($result === null): ?>
        <input type="submit" name="Submit1" value=" Submit " style="margin:20px 0 0;font-family:Arial,sans-serif;">
        &nbsp;&nbsp;&nbsp;
    <?php endif; ?>

    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
</div><div align="center" style="margin-top:20px;">
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
