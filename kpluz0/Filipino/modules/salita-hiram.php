<?php
// filipino/modules/salita-hiram.php
// Procedural borrowed-word identification; no grade bands.

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
$moduleTitle = 'Mga Hiram na Salita';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$tier = $lvl === 'Easy' ? '1' : '2-3';
function lay_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$hirams = [
    1 => [
        'asul', 'bag', 'basket', 'berde', 'bidyo', 'bolpen', 'dayari', 'drayber', 'dyip', 'gusto', 'iskor', 'keyk', 'ketsap', 'mais', 'mesa', 'misis', 'mister', 'motor', 'nars', 'nota', 'order', 'pansit', 'pitsel', 'pulis', 'radyo', 'sori', 'silya', 'suki', 'susi', 'taksi', 'titser', 'trak',
    ],
    2 => [
        'alkalde', 'alpabeto', 'basketbol', 'bintana', 'biyahe', 'busina', 'dyaket', 'diyanitor', 'elepante', 'eroplano', 'hayskul', 'insenso', 'interbyu', 'kompyuter', 'kutsara', 'lengguwahe', 'litanya', 'manedyer', 'mansanas', 'musika', 'obispo', 'opinyon', 'pasahero', 'pasaporte', 'prinsipal', 'sarbey', 'siyempre', 'sorbetes', 'sorpresa', 'suspek', 'telepono', 'telebisyon', 'trapik', 'traysikel',
    ],
    3 => [
        'anarkiya', 'arkitekto', 'arkidiyosesis', 'arsobispo', 'diksiyonaryo', 'ekonomiya', 'ensiklopedya', 'entrada', 'impormasyon', 'inklinasyon', 'intensiyon', 'komisyoner', 'komunidad', 'kongreso', 'konstelasyon', 'kontinente', 'koordinasyon', 'mikroskopyo', 'periskopyo', 'teleskopyo', 'terminal', 'transistor',
    ],
];
$hhirams = [
    1 => [
        'aso', 'araw', 'banig', 'baon', 'bigas', 'bayong', 'baywang', 'biik', 'bughaw', 'buhok', 'buwan', 'dagat', 'dahon', 'dilaw', 'duyan', 'gabi', 'hayop', 'ilog', 'inahin', 'isda', 'itim', 'itlog', 'kamao', 'kidlat', 'kilay', 'kubo', 'kanin', 'lupa', 'lakas', 'ligaya', 'lungkot', 'mata', 'opo', 'paa', 'paalam', 'palay', 'papag', 'pula', 'pulo', 'puno', 'puti', 'saging', 'salok', 'tala', 'tandang', 'tao', 'taon', 'tayo', 'tubig', 'ubo', 'ulan', 'ulap', 'upuan', 'usa',
    ],
    2 => [
        'alapaap', 'alimango', 'alitaptap', 'anahaw', 'balakang', 'balibag', 'balikat', 'baybayin', 'bituin', 'buhangin', 'bulaklak', 'hagdanan', 'himpilan', 'kaibigan', 'kuyakoy', 'liwayway', 'luntian', 'lungga', 'paaralan', 'pagkain', 'pangkat',
    ],
    3 => [
        'alimpuyo', 'ayungin', 'balikatan', 'bulalakaw', 'bulubundukin', 'kalantas', 'kamuning', 'karagatan', 'karapatan', 'kapuluan', 'kayumanggi', 'madaling-araw', 'paghinuha', 'pagkakaibigan', 'paliparan', 'pamantasan', 'pamilihan', 'panibugho', 'pukyutan', 'salansan', 'silangan', 'takipsilim', 'talampakan', 'talasalitaan',
    ],
];
$banks = [$tier => []];
foreach ($lvl === 'Easy' ? [1] : [2,3] as $n) {
    foreach ($hirams[$n] as $word) $banks[$tier][] = [$word, $n];
}
function lay_question(array $entry, string $tier, string $lvl): array {
    global $hhirams;
    $choices = $hhirams[$entry[1]];
    shuffle($choices);
    $choices = array_slice($choices, 0, 3);
    $choices[] = $entry[0];
    shuffle($choices);
    return ['correct'=>$entry[0], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = lay_question($banks[$tier][$i], $tier, $lvl);
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
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Ang salitang hiram ay <span style="color:#CC0066;"><?php echo lay_h($cur['correct']); ?></span>.</strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang salitang hiram.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo lay_h($choice); ?>
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
