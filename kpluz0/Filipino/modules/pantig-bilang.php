<?php
// filipino/modules/pantig-bilang.php
// Grade-dependent syllable counting.

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
$moduleTitle = 'Pagbibilang ng Pantig';
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
0 => ['1ang', '1at', '1daw', '1din', '1kay', '1ko', '1kung', '1na', '1ng', '1nang', '1ni', '1rin', '1raw', '1sa', '1si', '2a-ko', '2a-lam', '2a-pa', '2a-raw', '2a-sim', '2a-tis', '2a-wit', '2a-so', '2a-te', '2ba-go', '2ba-sa', '2ba-to', '2bi-ik', '2bo-te', '2bu-tas', '2da-an', '2du-go', '2ga-ya', '2go-ma', '2ha-ba', '2hi-ya', '2hu-li', '2i-bon', '2i-kot', '2i-lan', '2i-nom', '2i-sa', '2is-da', '2i-sip', '2ka-ba', '2ka-ma', '2ku-ko', '2ku-ya', '2la-ro', '2la-sa', '2la-ta', '2li-ma', '2lu-pa', '2na-nay', '2ma-ni', '2ma-no', '2mu-li', '2pa-to', '2pi-la', '2pi-to', '2pu-sa', '2pu-no', '2sa-bi', '2sa-ko', '2sa-la', '2ta-li', '2ta-sa', '2ta-tay', '2ti-ya', '2tu-pa', '2u-na', '2u-po', '2wa-lo', '2wi-ka', '2yo-yo', '3a-a-sa', '3a-a-yaw', '3a-a-lis', '3a-ba-ka', '3a-la-ga', '3a-li-la', '3a-sa-wa', '3i-ba-on', '3i-bi-li', '3i-i-nom', '3i-i-big', '3i-na-ko', '3u-ma-ga'],
1 => ['2a-bang', '2ba-lik', '2ba-lot', '2ban-sa', '2bar-ko', '2ba-tok', '2ba-was', '2ba-yad', '2bi-lis', '2bul-sa', '2da-sal', '2di-law', '2ga-law', '2ha-pon', '2ha-rap', '2hi-pon', '2hi-ram', '2hi-ya', '2hu-gas', '2ka-may', '2ku-lay', '2ku-mot', '2li-naw', '2li-nis', '2ma-nok', '2mul-to', '2sa-kay', '2sa-kit', '2sa-yaw', '2si-kat', '2sim-ba', '2sin-di', '2si-siw', '2so-bre', '2so-pas', '2su-bok', '2su-nod', '2ta-pon', '2ti-kim', '2tuk-so', '2tu-lak', '2tum-ba', '2tu-ron', '2tu-ngo', '2ya-man', '3a-ba-ka', '3a-la-ga', '3a-yu-da', '3ba-ba-e', '3ka-ba-yo', '3u-ma-raw', '3u-ma-ray', '3u-mi-kot', '3u-mi-was', '3u-mi-nom'],
2 => ['2bag-sik', '2bal-bas', '2bang-ko', '2bang-git', '2ban-sag', '2ban-tog', '2big-kas', '2big-kis', '2bi-lang', '2bu-long', '2bun-dok', '2bun-tot', '2ha-rang', '2ni-nang', '2pa-tong', '2tu-long', '2gan-da', '2gus-to', '2ha-ngin', '2kam-bal', '2lin-dol', '2pak-siw', '2saw-saw', '2suk-lay', '2tag-lay', '2tal-sik', '3ba-li-ta', '3bi-ha-sa', '3bi-si-ta', '3bu-mi-li', '3bu-wa-ya', '3du-ma-an', '3du-mu-go', '3gu-mu-ho', '3han-da-an', '3hi-nu-li', '3i-ba-hin', '3i-bi-gay', '3i-han-da', '3i-na-wit', '3i-si-pin', '3ka-bu-te', '3ka-li-wa', '3ma-ha-ba', '3pa-bi-li', '3pu-ma-sa', '3pu-mu-na', '3sa-ri-wa', '3su-mi-pa', '3tu-mu-lo', '4i-na-ba-la', '4i-ni-ha-in', '4i-ni-i-haw', '4i-ni-i-wan', '4i-ni-a-sa', '4ka-ka-i-ba', '4u-ma-ak-to', '4u-ma-a-yaw', '4u-mi-i-was', '4u-mi-i-yak', '4u-mu-u-lan'],
3 => ['2kam-bing', '2lung-kot', '2ping-gan', '2sang-gol', '2sing-kit', '2tang-kad', '2ting-kad', '2sim-ple', '2sen-tro', '3a-lam-bre', '3ba-lu-tin', '3bi-bing-ka', '3bi-na-lot', '3bi-ni-lang', '3bu-ma-lik', '3bu-mi-lis', '3bu-mu-hos', '3du-mag-sa', '3ga-ya-hin', '3gu-ma-law', '3gus-tu-hin', '3hu-ma-rap', '3hu-ma-rang', '3hu-mi-ram', '3ka-ba-han', '3ki-nu-rot', '3li-wa-nag', '3lu-mi-bot', '3lu-mi-naw', '3lu-min-dol', '3ma-li-nis', '3ma-lung-kot', '3mag-ma-no', '3nag-ba-go', '3nag-du-lot', '3na-lung-kot', '3na-ni-law', '3pa-ba-lik', '3pa-king-gan', '3pa-ma-lit', '3pam-ban-sa', '3pi-nak-siw', '3plan-tsa-hin', '3pu-mun-ta', '3sak-lo-lo', '3si-ma-ngot', '3si-nu-lid', '3su-mig-la', '3ti-nim-pla', '3ti-nuk-law', '3tu-mam-bad', '3tu-mu-ngo', '4bi-ni-bi-ni', '4bi-ni-si-ta', '4gi-na-na-han', '4i-bi-na-on', '4i-bi-na-was', '4i-nu-na-han', '4i-si-na-bit', '4i-si-na-kay', '4i-wi-nas-to', '4ma-hi-ya-in', '4na-a-ag-nas', '4na-ka-i-was', '4na-pa-a-lat', '4na-pa-a-lis', '4pa-an-ya-ya', '4u-ma-ak-yat', '5ka-a-wa-a-wa', '5ka-ba-ba-i-han', '5ka-i-sa-i-sa'],
];

function ptb_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function ptb_tier(string $lvl, int $grd): int {
    $tier = $grd === 0 ? 0 : 2;
    return $tier + ($lvl === 'Hard' ? 1 : 0);
}function ptb_question(string $raw, int $tier, string $lvl, int $grd): array {
    $split = substr($raw, 1);
    return ['word'=>str_replace('-', '', $split), 'split'=>$split, 'correct'=>$raw[0], 'tier'=>$tier, 'lvl'=>$lvl, 'grade'=>$grd, 'qid'=>bin2hex(random_bytes(16))];
}
$result=null; $scorer=null; $error='';
$cur=$_SESSION[$sessionKey]['current'] ?? null;
if (isset($_POST['Submit1']) && !isset($_POST['Submit2']) && $cur && $cur['grade']===$grd && is_string($_POST['qid'] ?? null) && hash_equals($cur['qid'], $_POST['qid'])) {
    $answer=$_POST['answer'] ?? null;
    if (!is_string($answer) || !preg_match('/^[1-9]$/D', $answer)) $error='Maglagay ng wastong bilang.';
    else {
        $scorer=new Scorer($conn,$moduleId);
        $ok=$scorer->processAnswer($answer,$cur['correct'],$cur['lvl']);
        $result=['answer'=>$answer,'correct'=>$ok];
        unset($_SESSION[$sessionKey]['current']);
    }
}
if ($result===null && $error==='') {
    $tier=ptb_tier($lvl,$grd);
    $indices=array_keys(array_unique($banks[$tier]));
    $used=$_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available=array_values(array_diff($indices,$used));
    if (!$available) { $used=[]; $available=$indices; }
    $i=$available[array_rand($available)]; $used[]=$i;
    $_SESSION[$sessionKey]['used'][$tier]=$used;
    $cur=ptb_question($banks[$tier][$i],$tier,$lvl,$grd);
    $_SESSION[$sessionKey]['current']=$cur;
}
$theme=[]; render_header($moduleTitle,$moduleTitle,$theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo ptb_h($_SERVER['PHP_SELF']); ?>">
<?php if ($result!==null): ?>
<p style="font-size:14pt;color:#800080;font-weight:700;">Ang sagot mo ay <strong style="color:#0000CC;">'<?php echo ptb_h($result['answer']); ?>'</strong>.</p>
<p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct']?'#006600':'#CC0000'; ?>; "><?php echo $result['correct']?'Ito ay tumpak!':'Ito ay hindi tumpak.'; ?></p>
<p style="font-size:14pt;color:#800080;font-weight:700;max-width:450px;margin:20px auto;">Ang salitang '<?php echo ptb_h($cur['word']); ?>' ay may <strong style="color:#CC0066;"><?php echo ['1'=>'isang','2'=>'dalawang','3'=>'tatlong','4'=>'apat na','5'=>'limang'][$cur['correct']]; ?></strong> pantig.</p>
<?php endif; ?>
<div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:<?php echo $result===null?'#800080':'#CC0066'; ?>;overflow-wrap:anywhere;"><?php echo ptb_h($result===null?$cur['word']:$cur['split']); ?></span></div>
<?php if ($result===null): ?>
<p style="font-size:16pt;color:#800080;font-weight:700;max-width:450px;margin:20px auto;">Bilangin ang pantig ng salita sa itaas.</p>
<?php if ($error!==''): ?><p style="color:#CC0000;"><?php echo ptb_h($error); ?></p><?php endif; ?>
<input type="hidden" name="qid" value="<?php echo ptb_h($cur['qid']); ?>">
<input type="text" name="answer" inputmode="numeric" maxlength="1" pattern="[1-9]" aria-label="Bilang ng pantig" autofocus style="width:58px;height:52px;text-align:center;font:700 24pt Arial,sans-serif;color:#0000CC;border:2px solid #888;border-radius:8px;">
<?php endif; ?>

<div style="display:flex;justify-content:center;align-items:center;gap:20px;margin:<?php echo $result === null ? '20px 0 20px' : '40px 0 40px'; ?>;">
    <?php if ($result === null): ?>
        <input type="submit" name="Submit1" value=" Submit " style="font-family:Arial,sans-serif;">
    <?php endif; ?>

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
