<?php
// filipino/modules/pagpapantig.php
// Grade-dependent syllabication.

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
$moduleTitle = 'Pagpapantig ng Salita';
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
0 => ['a-ko', 'a-so', 'a-te', 'ba-go', 'ba-sa', 'ba-to', 'bo-ta', 'bo-te', 'da-an', 'du-go', 'ga-ya', 'go-ma', 'ha-ba', 'hi-ya', 'i-sa', 'ka-ba', 'ka-ma', 'ku-ko', 'ku-ya', 'la-ro', 'la-sa', 'la-ta', 'li-ma', 'lu-pa', 'ni-to', 'ma-ni', 'ma-no', 'mu-li', 'pa-to', 'pi-la', 'pi-to', 'pu-sa', 'pu-no', 'sa-bi', 'sa-ko', 'sa-la', 'ta-li', 'ta-sa', 'tu-pa', 'u-na', 'u-po', 'wa-lo', 'wi-ka', 'yo-yo'],
1 => ['a-bang', 'a-lam', 'a-raw', 'a-sim', 'a-tis', 'a-wit', 'ba-lik', 'ba-lot', 'ban-sa', 'ba-tok', 'ba-was', 'ba-yad', 'bi-lang', 'bi-lis', 'bu-long', 'bu-tas', 'da-sal', 'di-law', 'ga-law', 'ha-pon', 'ha-rap', 'ha-rang', 'hi-pon', 'hi-ram', 'hi-ya', 'hu-gas', 'hu-li', 'i-bon', 'i-kot', 'i-lan', 'i-nom', 'is-da', 'i-sip', 'ka-may', 'ku-lay', 'ku-mot', 'li-naw', 'li-nis', 'ma-nok', 'mul-to', 'na-nay', 'ni-nang', 'pa-tong', 'sa-kay', 'sa-kit', 'sa-yaw', 'si-kat', 'si-siw', 'so-pas', 'su-bok', 'su-nod', 'ta-pon', 'ta-tay', 'ti-kim', 'tu-lak', 'tu-long', 'tu-ron', 'ti-ya', 'tu-ngo', 'ya-man'],
2 => ['bag-sik', 'bal-bas', 'ba-li-ta', 'bang-ko', 'bang-git', 'ban-sag', 'ban-tog', 'bar-ko', 'big-kas', 'big-kis', 'bi-ha-sa', 'bi-si-ta', 'bul-sa', 'bu-mi-li', 'bun-dok', 'bun-tot', 'bu-wa-ya', 'du-ma-an', 'du-mu-go', 'gan-da', 'gus-to', 'ha-ngin', 'hi-nu-li', 'i-han-da', 'ka-ba-yo', 'ka-li-wa', 'kam-bal', 'kam-bing', 'lin-dol', 'lung-kot', 'ma-ha-ba', 'pa-bi-li', 'pak-sa', 'pak-siw', 'pet-sa', 'ping-gan', 'pu-ma-sa', 'pu-mu-na', 'sak-si', 'sang-gol', 'sa-ri-wa', 'saw-saw', 'sim-ba', 'sin-di', 'so-bre', 'suk-lay', 'tag-lay', 'tal-sik', 'tang-kad', 'ting-kad', 'tuk-so', 'tum-ba', 'tu-mu-lo', 'u-ma-raw'],
3 => ['a-lam-bre', 'ba-lu-tin', 'bi-bing-ka', 'bi-na-lot', 'bu-ma-lik', 'bu-mi-lis', 'bu-mu-hos', 'du-mag-sa', 'ga-ya-hin', 'gu-ma-law', 'gus-tu-hin', 'han-da-an', 'hu-ma-rap', 'hu-ma-rang', 'hu-mi-ram', 'i-bi-na-on', 'im-bi-ta', 'i-na-wit', 'i-si-pin', 'ka-ba-han', 'ki-nu-rot', 'li-wa-nag', 'lu-mi-bot', 'lu-mi-naw', 'lu-min-dol', 'ma-li-nis', 'ma-lung-kot', 'mag-ma-no', 'nag-ba-go', 'nag-du-lot', 'na-ni-law', 'na-sang-kot', 'pa-ba-lik', 'pa-king-gan', 'pa-ma-lit', 'pam-ban-sa', 'pi-nak-siw', 'pu-mun-ta', 'sak-lo-lo', 'sim-ple', 'sen-tro', 'si-ma-ngot', 'sing-kit', 'si-nu-lid', 'su-mig-la', 'ti-nim-pla', 'ti-nuk-law', 'tu-mam-bad', 'tu-mu-ngo', 'u-mi-nom'],
4 => ['bi-na-wa-san', 'bi-bi-la-ngin', 'bi-ni-bi-li-san', 'bi-ni-si-ta', 'eks-klu-si-bo', 'eks-pre-syon', 'gi-nan-da-han', 'gu-war-di-ya', 'ha-li-mu-yak', 'im-bi-ta-hin', 'i-ni-ha-in', 'ins-tru-men-to', 'i-pi-na-pa-tong', 'i-si-na-kay', 'i-si-nen-tro', 'i-wi-nas-to', 'i-wi-na-si-was', 'ka-ba-ba-i-han', 'ka-bi-has-nan', 'ki-na-bu-ka-san', 'ki-no-kon-tra', 'mag-a-ak-yat', 'ma-hi-ya-in', 'man-di-rig-ma', 'mang-ya-ya-ri', 'ma-si-sing-hot', 'na-a-ag-nas', 'na-ka-i-was', 'na-pa-a-lis', 'na-pa-a-lat', 'nag-li-wa-nag', 'pag-hu-hu-gas', 'pa-la-is-da-an', 'pi-na-bu-long', 'pi-nuk-pok', 'plan-tsa-hin', 'pu-mu-pus-lit'],
5 => ['bi-na-ba-li-ta-an', 'eks-pe-ri-men-to', 'eks-pe-di-syon', 'e-le-men-tar-ya', 'hu-mi-lag-pos', 'i-ki-na-hi-hi-ya', 'i-pi-nag-tim-pla', 'i-si-nu-sup-long', 'ka-ba-lig-ta-ran', 'ki-na-bi-bi-la-ngan', 'ki-na-gi-gi-li-wan', 'ki-na-sang-ku-tan', 'na-ka-pag-pa-a-lis', 'pag-ka-ka-in-tin-di-han', 'pag-pa-pa-li-wa-na-gin', 'pang-ka-pa-ya-pa-an', 'pa-ra-ra-a-nin', 'pi-nag-ba-lu-tan', 'pi-nag-bi-lang-gu-an', 'pi-nag-hu-ga-san', 'pi-nag-ka-ka-i-sa-han', 'pi-nag-pa-plan-tsa', 'pi-nag-pa-tu-ngan', 'pi-nag-si-si-la-ban', 'pi-na-ka-ma-lung-ku-tin', 'pi-na-ka-ma-ka-ta-ru-ngan', 'pi-na-ki-ki-a-la-man', 'pi-na-mi-mil-han', 'ti-nu-tum-ba-san', 'trans-por-ta-syon'],
];

function ppt_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function ppt_tier(string $lvl, int $grd): int {
    $tier = min(4, $grd);
    if ($lvl === 'Hard') {
        $tier += ($grd <= 1 ? 1 : 2);
    }
    return min(5, $tier);
}function ppt_question(string $raw, int $tier, string $lvl, int $grd): array {
    $split = $raw;
    return ['word'=>str_replace('-', '', $split), 'split'=>$split, 'correct'=>$split, 'tier'=>$tier, 'lvl'=>$lvl, 'grade'=>$grd, 'qid'=>bin2hex(random_bytes(16))];
}
$result=null; $scorer=null; $error='';
$cur=$_SESSION[$sessionKey]['current'] ?? null;
if (isset($_POST['Submit1']) && !isset($_POST['Submit2']) && $cur && $cur['grade']===$grd && is_string($_POST['qid'] ?? null) && hash_equals($cur['qid'], $_POST['qid'])) {
    $answer=$_POST['answer'] ?? null;
    if (!is_string($answer) || strlen($answer)>200 || trim($answer)==='') $error='Maglagay ng wastong sagot.';
    else { $answer = strtolower(str_replace(' ', '', $answer)); }
    if ($error==='') {
        $scorer=new Scorer($conn,$moduleId);
        $ok=$scorer->processAnswer($answer,$cur['correct'],$cur['lvl']);
        $result=['answer'=>$answer,'correct'=>$ok];
        unset($_SESSION[$sessionKey]['current']);
    }
}
if ($result===null && $error==='') {
    $tier=ppt_tier($lvl,$grd);
    $indices=array_keys(array_unique($banks[$tier]));
    $used=$_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available=array_values(array_diff($indices,$used));
    if (!$available) { $used=[]; $available=$indices; }
    $i=$available[array_rand($available)]; $used[]=$i;
    $_SESSION[$sessionKey]['used'][$tier]=$used;
    $cur=ppt_question($banks[$tier][$i],$tier,$lvl,$grd);
    $_SESSION[$sessionKey]['current']=$cur;
}
$theme=[]; render_header($moduleTitle,$moduleTitle,$theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo ppt_h($_SERVER['PHP_SELF']); ?>">
<?php if ($result!==null): ?>
<p style="font-size:14pt;color:#800080;font-weight:700;">Ang sagot mo ay <strong style="color:#0000CC;">'<?php echo ppt_h($result['answer']); ?>'</strong>.</p>
<p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct']?'#006600':'#CC0000'; ?>; "><?php echo $result['correct']?'Ito ay tumpak!':'Ito ay hindi tumpak.'; ?></p>
<p style="font-size:14pt;color:#800080;font-weight:700;max-width:450px;margin:20px auto;">Ang tamang pagpapantig ng<br/>salitang '<?php echo ppt_h($cur['word']); ?>' ay <strong style="color:#CC0066;"><?php echo ppt_h($cur['split']); ?></strong>.</p>
<div style="text-align:center;margin:20px auto;"><span style="display:inline-block;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;max-width:100%;box-sizing:border-box;font:700 24pt Arial,sans-serif;color:#CC0066;overflow-wrap:anywhere;"><?php echo ppt_h($cur['split']); ?></span></div>
<?php else: ?>
<p style="font-size:16pt;color:#800080;font-weight:700;max-width:450px;margin:20px auto;">Pantigin ang salitang nakasulat sa ibaba nang naaayon sa bigkas.</p>
<p style="font-size:13pt;color:#444;max-width:450px;margin:10px auto 30px;">Magsingit ng mga '-' sa salita upang paghiwa-hiwalayin ang mga pantig nito.</p>
<?php if ($error!==''): ?><p style="color:#CC0000;"><?php echo ppt_h($error); ?></p><?php endif; ?>
<input type="hidden" name="qid" value="<?php echo ppt_h($cur['qid']); ?>">
<input type="text" name="answer" value="<?php echo ppt_h($cur['word']); ?>" maxlength="100" autocomplete="off" spellcheck="false" aria-label="Pagpapantig" autofocus style="width:<?php echo max(10,strlen($cur['split'])+2); ?>ch;max-width:100%;box-sizing:border-box;height:54px;text-align:center;font:700 24pt Arial,sans-serif;color:#0000CC;border:2px solid #888;border-radius:8px;">
<?php endif; ?>
<div style="display:flex;justify-content:center;align-items:center;gap:20px;margin:<?php echo $result===null?'40px 0 20px':'50px 0 50px'; ?>;">
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
