<?php
// filipino/modules/ekspresyon-salita.php
// Single bank; original image paths and questions retained.

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
$moduleTitle = 'Kahulugan ng Iba\'t Ibang<br/>Ekspresyon at Kumpas';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$lvl = 'Easy';
$bank = [
    ['images/ekspresyon/exp1.jpg', 'Ano ang ipinahihiwatig na mensahe ng nasa larawan?', 'Sang-ayon ako diyan!', 'Mali yan.', 'Hindi maganda yan.', 'Hindi ako sang-ayon sa iyo.'],
    ['images/ekspresyon/exp2.jpg', 'Ano sa tingin mo ang iniisip ng nasa larawan?', 'Nakakainip naman.', 'Galit na galit ako.', 'Nakakatakot naman!', 'Nakakaiyak naman.'],
    ['images/ekspresyon/exp3.jpg', 'Ano sa tingin mo ang sinasabi ng nasa larawan?', 'Galit na galit ako!', 'Nalulugod ako.', 'Nakakainip naman.', 'Inaantok na ako.'],
    ['images/ekspresyon/exp4.jpg', 'Ano sa tingin mo ang iniisip ng nasa larawan?', 'Sabik na sabik na ako.', 'Galit na galit ako.', 'Nakakatakot naman!', 'Nalulungkot ako.'],
    ['images/ekspresyon/exp5.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'takot', 'galit', 'lungkot', 'galak'],
    ['../images/bokabularyo/hikab.jpg', 'Ano sa tingin mo ang iniisip ng nasa larawan?', 'Inaantok na ako.', 'Galit na galit ako.', 'Nakakatakot naman!', 'Nakakatawa ka!'],
    ['../images/bokabularyo/hintay.jpg', 'Ano sa tingin mo ang iniisip ng nasa larawan?', 'Nakakainip naman.', 'Nakakainis ka.', 'Nakakaiyak yan.', 'Nakakatawa ka!'],
    ['../images/bokabularyo/malungkot.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'lungkot', 'galit', 'takot', 'galak'],
    ['../images/bokabularyo/masaya.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'tuwa', 'galit', 'takot', 'lungkot'],
    ['../images/bokabularyo/masaya2.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'saya', 'galit', 'takot', 'inis'],
    ['../images/bokabularyo/nagagalit.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'galit', 'tuwa', 'takot', 'inip'],
    ['../images/bokabularyo/panggagalaiti.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'sobrang galit', 'sobrang tuwa', 'sobrang takot', 'sobrang lungkot'],
    ['../images/bokabularyo/panghihilakbot.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'takot', 'tuwa', 'galit', 'lungkot'],
    ['../images/bokabularyo/ako.jpg', 'Ano sa tingin mo ang sinasabi ng nasa larawan?', 'Ako ang bahala.', 'Lumayo kayo!', 'Huwag po.', 'Ayaw ko!'],
    ['../images/bokabularyo/meditasyon.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'kapayapaan', 'pagkabigla', 'pagkainis', 'kalungkutan'],
    ['../images/bokabularyo/nanunukso.jpg', 'Ano sa tingin mo ang iniisip ng batang nakadilaw sa larawan?', 'Nakakainis siya.', 'Nakakainis ako.', 'Nagpapasalamat ako.', 'Nakakatawa ka!'],
    ['../images/bokabularyo/sindak.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'sindak', 'saya', 'lungkot', 'tuwa'],
    ['../images/bokabularyo/takot.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'takot', 'galak', 'lungkot', 'tuwa'],
    ['../images/bokabularyo/talon.jpg', 'Ano sa tingin mo ang nararamdaman ng nasa larawan?', 'tuwa', 'takot', 'lungkot', 'inip'],
    ['../images/bokabularyo/tawa.jpg', 'Ano sa tingin mo ang sinasabi ng nasa larawan?', 'Nakakatawa ka!', 'Nakakainis ka.', 'Nakakagulat ka!', 'Nagsisisi ako.'],
    ['images/ekspresyon/exp6.jpg', 'Ano sa tingin mo ang sinasabi ng nasa larawan?', 'Ayoko. Hindi puwede.', 'Pumapayag ako.', 'Sige, gawin mo.', 'Puwede yan.'],
    ['images/ekspresyon/exp7.jpg', 'Ano sa tingin mo ang sinasabi ng nasa larawan?', 'Tigil! Hindi yan puwede.', 'Pumapayag ako.', 'Sige, ituloy mo.', 'Bilisan mo.'],
    ['images/ekspresyon/exp8.jpg', 'Ano sa tingin mo ang sinasabi ng nasa larawan?', 'Maganda yan.', 'Bawal yan.', 'Huwag mong gawin yan.', 'Pangit yan.'],
    ['images/ekspresyon/exp9.jpg', 'Ano malamang ang saloobin ng nasa larawan?', 'hindi pumapayag', 'pumapayag', 'nagpapahintulot', 'umaayon'],
    ['images/ekspresyon/expa.jpg', 'Ano ang malamang na sinasabi ng nasa larawan?', 'Aprubado!', 'Bagsak yan.', 'Walang kuwenta!', 'Pangit yan.'],
    ['images/ekspresyon/expb.jpg', 'Ano ang ibig sabihin ng pagsenyas ng tao sa larawan?', 'Perpekto!', 'Pangit!', 'Bagsak!', 'Walang kuwenta!'],
    ['images/ekspresyon/expc.jpg', 'Ano ang ibig sabihin ng pagsenyas ng tao sa larawan?', 'Hindi yan pasado.', 'Perpekto!', 'Aprubado!', 'Mahusay!'],
    ['images/ekspresyon/expd.jpg', 'Ano ang ibig sabihin ng pagsenyas ng tao sa larawan?', 'Hindi aprubado!', 'Magaling!', 'Aprubado!', 'Kalugod-lugod!'],
    ['images/ekspresyon/expe.jpg', 'Ano ang malamang na sinasabi ng nasa larawan?', 'Wala akong kinalaman dyan.', 'Ako ang may kasalanan.', 'Ako ang pasimuno.', 'Kami ang gumawa niyan.'],
    ['images/ekspresyon/expf.jpg', 'Ano ang ginagawa ng mga nasa larawan?', 'nagsisisihan', 'nagpapatawad', 'umaako ng kasalanan', 'nagtutulungan'],
    ['images/ekspresyon/expg.jpg', 'Ano ang malamang na sinasabi ng lalaking nasa kaliwa?', 'Ikaw ang may kasalanan!', 'Wala kang kasalanan.', 'Wala akong kasalanan.', 'Hindi kita masisisi.'],
    ['images/ekspresyon/exph.jpg', 'Ano ang malamang na sinasabi ng nasa larawan?', 'Halika.', 'Lumayo ka.', 'Huwag kang lalapit.', 'Lumabas ka.'],
    ['images/ekspresyon/expi.jpg', 'Ano ang malamang na sinasabi ng nasa larawan?', 'Tuloy po kayo.', 'Lumayo po kayo.', 'Huwag po kayong lalapit.', 'Umalis na po kayo.'],
];

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

if ($result === null) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_diff(array_keys($bank), $used));
    if (!$available) { $used = []; $available = array_keys($bank); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'] = $used;
    [$image, $question, $correct, $w1, $w2, $w3] = $bank[$i];
    $choices = [$correct, $w1, $w2, $w3];
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'qid' => bin2hex(random_bytes(16)), 'correct' => $correct,
        'choices' => $choices, 'image' => $image, 'question' => $question, 'lvl' => $lvl,
    ];
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
    <?php ob_start(); ?>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:100%;max-height:250px;width:auto;height:auto;border:1px solid #888;object-fit:contain;">
        <p style="font-size:16pt;color:#800080;margin:16px auto 8px;max-width:450px;text-align:center;text-wrap:balance;"> <?php echo htmlspecialchars($cur['question'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p style="font-size:16pt;color:#CC0066;font-weight:700;margin:0px 0 0;">Sagot: <?php echo htmlspecialchars($cur['correct'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php echo ob_get_clean(); ?>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current'];
    ob_start(); ?>
        <img src="<?php echo htmlspecialchars($cur['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Larawan para sa tanong" style="max-width:100%;max-height:250px;width:auto;height:auto;border:1px solid #888;object-fit:contain;margin:0 auto 16px;">
        <br/><br/><p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:0 auto;max-width:450px;text-align:center;"><?php echo htmlspecialchars($cur['question'], ENT_QUOTES, 'UTF-8'); ?></p><br/>
    <?php echo ob_get_clean(); ?>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>

</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
