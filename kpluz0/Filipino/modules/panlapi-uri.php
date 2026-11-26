<?php
// filipino/modules/panlapi-uri.php
// Static word banks; legacy Medium and Hard combined.

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
$moduleTitle = 'Mga Uri ng Panlapi';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$tier = $lvl;
function pg_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    'Easy' => [
        ["*ka+sabay", "Unlapi"],
        ["*i+boto", "Unlapi"],
        ["*in+angkin", "Unlapi"],
        ["*ipa+labas", "Unlapi"],
        ["*ka+kain", "Unlapi"],
        ["*ka+klase", "Unlapi"],
        ["*ka+tumbas", "Unlapi"],
        ["*ma+bait", "Unlapi"],
        ["*ma+ganda", "Unlapi"],
        ["*mag+linis", "Unlapi"],
        ["*mag+pakita", "Unlapi"],
        ["*mag+luto", "Unlapi"],
        ["*mag+tapon", "Unlapi"],
        ["*ma+husay", "Unlapi"],
        ["*ma+lakas", "Unlapi"],
        ["*ma+sakit", "Unlapi"],
        ["*ma+tapat", "Unlapi"],
        ["*ma+yari", "Unlapi"],
        ["*nag+tungo", "Unlapi"],
        ["*pam+bahay", "Unlapi"],
        ["*pam+bata", "Unlapi"],
        ["*nag+laro", "Unlapi"],
        ["*pa+bulong", "Unlapi"],
        ["*pag+dami", "Unlapi"],
        ["*tag+lamig", "Unlapi"],
        ["*um+alis", "Unlapi"],
        ["*um+andar", "Unlapi"],
        ["*um+asa", "Unlapi"],
        ["*um+inom", "Unlapi"],
        ["b*in+alot", "Gitlapi"],
        ["b*in+asa", "Gitlapi"],
        ["b*in+uo", "Gitlapi"],
        ["b*um+ati", "Gitlapi"],
        ["g*in+amit", "Gitlapi"],
        ["h*in+arap", "Gitlapi"],
        ["h*in+iram", "Gitlapi"],
        ["h*um+alik", "Gitlapi"],
        ["k*um+ain", "Gitlapi"],
        ["k*um+intab", "Gitlapi"],
        ["l*um+akad", "Gitlapi"],
        ["l*um+akas", "Gitlapi"],
        ["l*um+ipad", "Gitlapi"],
        ["l*um+ipat", "Gitlapi"],
        ["l*um+ukso", "Gitlapi"],
        ["p*um+unta", "Gitlapi"],
        ["p*um+asok", "Gitlapi"],
        ["p*um+ayat", "Gitlapi"],
        ["s*in+ampal", "Gitlapi"],
        ["s*um+akay", "Gitlapi"],
        ["s*um+ikat", "Gitlapi"],
        ["s*um+imba", "Gitlapi"],
        ["t*in+ahi", "Gitlapi"],
        ["t*in+alon", "Gitlapi"],
        ["t*um+ukso", "Gitlapi"],
        ["s*in+agot", "Gitlapi"],
        ["s*um+igaw", "Gitlapi"],
        ["y*um+aman", "Gitlapi"],
        ["aral*in+", "Hulapi"],
        ["bagu*han+", "Hulapi"],
        ["balat*an+", "Hulapi"],
        ["batu*han+", "Hulapi"],
        ["bilang*in+", "Hulapi"],
        ["bunggu*an+", "Hulapi"],
        ["dilig*an+", "Hulapi"],
        ["ganda*han+", "Hulapi"],
        ["gustu*hin+", "Hulapi"],
        ["habul*in+", "Hulapi"],
        ["handa*an+", "Hulapi"],
        ["harap*in+", "Hulapi"],
        ["isip*in+", "Hulapi"],
        ["lubus*an+", "Hulapi"],
        ["pigil*an+", "Hulapi"],
        ["pirma*han+", "Hulapi"],
        ["puna*hin+", "Hulapi"],
        ["sagut*an+", "Hulapi"],
        ["saksi*han+", "Hulapi"],
        ["sambit*in+", "Hulapi"],
        ["siksik*in+", "Hulapi"],
        ["simba*han+", "Hulapi"],
        ["sindi*han+", "Hulapi"],
        ["sulat*an+", "Hulapi"],
        ["tala*an+", "Hulapi"],
        ["tapus*in+", "Hulapi"],
        ["tira*hin+", "Hulapi"],
        ["una*han+", "Hulapi"],
        ["*ka+bunduk*an+", "Kabilaan"],
        ["*ka+pulu*an+", "Kabilaan"],
        ["*ka+sabi*han+", "Kabilaan"],
        ["*ma+aasa*han+", "Kabilaan"],
        ["*ma+handug*an+", "Kabilaan"],
        ["*ma+hiya*in+", "Kabilaan"],
        ["*ma+saksi*han+", "Kabilaan"],
        ["*ma+sunur*in+", "Kabilaan"],
        ["*ma+tampu*hin+", "Kabilaan"],
        ["*ma+tular*an+", "Kabilaan"],
        ["*ma+tulung*in+", "Kabilaan"],
        ["*na+isip*an+", "Kabilaan"],
        ["*pag+sawa*an+", "Kabilaan"],
        ["*pa+rami*han+", "Kabilaan"],
        ["*pa+saya*hin+", "Kabilaan"],
    ],
    'Hard' => [
        ["*ipam+bili", "Unlapi"],
        ["*kasim+bigat", "Unlapi"],
        ["*kasin+dami", "Unlapi"],
        ["*kasing+hirap", "Unlapi"],
        ["*magka+problema", "Unlapi"],
        ["*magpa+araw", "Unlapi"],
        ["*magpa+hangin", "Unlapi"],
        ["*magpa+kilala", "Unlapi"],
        ["*mai+wasto", "Unlapi"],
        ["*maka+tao", "Unlapi"],
        ["*mang+hiram", "Unlapi"],
        ["*mang+hula", "Unlapi"],
        ["*naka+bili", "Unlapi"],
        ["*naka+sakay", "Unlapi"],
        ["*naki+salo", "Unlapi"],
        ["*napaka+lungkot", "Unlapi"],
        ["*napaka+mura", "Unlapi"],
        ["*napaka+saya", "Unlapi"],
        ["*pagka+bata", "Unlapi"],
        ["*pagka+musmos", "Unlapi"],
        ["*paki+sabi", "Unlapi"],
        ["*pala+biro", "Unlapi"],
        ["*pinaka+luma", "Unlapi"],
        ["s*um+asagisag", "Gitlapi"],
        ["b*in+aligtad", "Gitlapi"],
        ["b*in+isita", "Gitlapi"],
        ["b*in+usisi", "Gitlapi"],
        ["b*in+igkas", "Gitlapi"],
        ["b*um+usina", "Gitlapi"],
        ["g*um+aling", "Gitlapi"],
        ["g*um+apang", "Gitlapi"],
        ["g*in+ising", "Gitlapi"],
        ["h*um+akbang", "Gitlapi"],
        ["h*um+arang", "Gitlapi"],
        ["h*um+iling", "Gitlapi"],
        ["h*in+ingi", "Gitlapi"],
        ["k*um+islap", "Gitlapi"],
        ["l*um+angoy", "Gitlapi"],
        ["p*in+aksiw", "Gitlapi"],
        ["s*in+aksak", "Gitlapi"],
        ["t*um+alsik", "Gitlapi"],
        ["t*in+anggap", "Gitlapi"],
        ["t*um+ulong", "Gitlapi"],
        ["bakbak*in+", "Hulapi"],
        ["balatu*han+", "Hulapi"],
        ["basura*han+", "Hulapi"],
        ["bigkas*in+", "Hulapi"],
        ["damdam*in+", "Hulapi"],
        ["hampas*in+", "Hulapi"],
        ["hintay*in+", "Hulapi"],
        ["halaman*an+", "Hulapi"],
        ["imbita*hin+", "Hulapi"],
        ["kuwentu*han+", "Hulapi"],
        ["plantsa*hin+", "Hulapi"],
        ["tanggap*an+", "Hulapi"],
        ["umpisa*han+", "Hulapi"],
        ["*ka+bayani*han+", "Kabilaan"],
        ["*ka+hirap*an+", "Kabilaan"],
        ["*ka+lalaki*han+", "Kabilaan"],
        ["*ka+lungkut*an+", "Kabilaan"],
        ["*mala+lampas*an+", "Kabilaan"],
        ["*nag+kuwentu*han+", "Kabilaan"],
        ["*na+hadlang*an+", "Kabilaan"],
        ["*pala+isda*an+", "Kabilaan"],
        ["*pala+isip*an+", "Kabilaan"],
        ["*pala+lakar*in+", "Kabilaan"],
        ["*pinag+batay*an+", "Kabilaan"],
        ["*pinag+nakaw*an+", "Kabilaan"],
        ["p*um+aimbulog", "Gitlapi"],
        ["p*um+ahimpapawid", "Gitlapi"],
        ["b*um+alangkas", "Gitlapi"],
        ["b*um+atikos", "Gitlapi"],
        ["g*um+inhawa", "Gitlapi"],
        ["h*um+agupit", "Gitlapi"],
        ["h*um+alakhak", "Gitlapi"],
        ["h*um+antong", "Gitlapi"],
        ["h*um+atsing", "Gitlapi"],
        ["h*um+iwalay", "Gitlapi"],
        ["k*um+alansing", "Gitlapi"],
        ["l*um+iwanag", "Gitlapi"],
        ["s*in+amantala", "Gitlapi"],
        ["s*um+alubong", "Gitlapi"],
        ["balasubas*in+", "Hulapi"],
        ["baligtar*in+", "Hulapi"],
        ["barikada*han+", "Hulapi"],
        ["balangkas*in+", "Hulapi"],
        ["bilanggu*an+", "Hulapi"],
        ["galugar*in+", "Hulapi"],
        ["gambala*in+", "Hulapi"],
        ["gunting*in+", "Hulapi"],
        ["halungkat*in+", "Hulapi"],
        ["insultu*hin+", "Hulapi"],
        ["intindi*hin+", "Hulapi"],
        ["samantala*hin+", "Hulapi"],
        ["suwerte*hin+", "Hulapi"],
        ["tangkilik*in+", "Hulapi"],
        ["*makikipag+daldal*an+", "Kabilaan"],
        ["*pala+singsing*an+", "Kabilaan"],
        ["*pinag+paumanhin*an+", "Kabilaan"],
        ["*san+daigdig*an+", "Kabilaan"],
        ["*san+libut*an+", "Kabilaan"],
    ],
];
function pg_question(array $entry, string $tier, string $lvl): array {
    $word = pg_h(str_replace(['*','+'], '', $entry[0]));
    $filled = preg_replace('/\*([^*+]+)\+/', '<span style="color:#CC0066;">$1</span>', pg_h($entry[0]));
    $choices = ['Unlapi','Gitlapi','Hulapi','Kabilaan'];
    shuffle($choices);
    return ['word'=>$word, 'filled'=>$filled, 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $byCategory = [];
    foreach ($available as $index) $byCategory[$banks[$tier][$index][1]][] = $index;
    $group = $byCategory[array_rand($byCategory)];
    $i = $group[array_rand($group)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pg_question($banks[$tier][$i], $tier, $lvl);
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
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['filled']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo pg_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang uri ng panlapi ng salita sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pg_h($choice); ?>
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
