<?php
// filipino/modules/salita-bilang.php
// One original Grade 1 word-count bank; single difficulty.

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
$moduleTitle = 'Pagbibilang ng Salita sa Pangungusap';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
// Legacy bank is intended for Grade 1; safe fallback for other grades.
function slb_tier(string $lvl, int $grd): int { return 0; }
function slb_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "Talon!=1[2+3]4",
        "Takbo!=1[2+3]4",
        "Umuulan na!=2[3+4]5",
        "Buhatin mo.=2[3+4]1",
        "Maalat ang adobo.=3[2+4]5",
        "Mapanganib ang lindol.=3[4+5]6",
        "Mamasyal na tayo.=3[2+4]5",
        "Bibisitahin namin sina Lola.=4[3+5]6",
        "Abutin ninyo ang payong.=4[5+6]7",
        "Kumain ba sila kanina?=4[3+5]6",
        "Bumili ka ng tinapay.=4[5+6]7",
        "Pumunta kami sa dagat kahapon.=5[4+6]7",
        "Mahilig ka ba sa kutsinta?=5[3+4]6",
        "Kami ay nakatira sa Makati.=5[4+6]7",
        "Ako ay may alagang tuta.=5[4+6]7",
        "Lima ang dala kong mansanas.=5[6+7]8",
        "Tinuklaw ng ahas ang kawawang daga.=6[4+5]7",
        "Si Mang Tino ay isang barbero.=6[4+5]7",
        "Isa-isa lamang ang maaaring pumasok doon.=6[5+7]8",
        "Gumawa ang mag-anak ng malaking parol.=6[5+7]8",
        "Nagtitinda si Aling Mameng ng mga bulaklak.=7[6+8]9",
        "Lumipad ang ibon nang dumating ang pusa.=7[4+5]6",
        "Saan kaya nila nahanap ang nawawalang tuta?=7[5+6]8",
        "Maglalaro raw ang mga bata ng piko.=7[6+8]9",
        "Nalito si Henry nang umatungal ang bata.=7[5+6]8",
        "Ihahanda ko na ang mga dadalhing gamit.=7[6+8]9",
        "Nag-aaral ako nang biglang lumindol nang malakas.=7[6+8]9",
        "Bibili na ba tayo ng ulam sa palengke?=8[6+7]9",
        "Nasaktan si Pedro nang mahulog siya sa sahig.=8[5+6]7",
        "Kailangan nating magdala ng tubig sa ating paglalakbay.=8[7+9]10",
        "Isinama ni Loida ang kanyang mga kamag-aral sa bukid.=9[6+7]8",
        "Nagalit si Hilda dahil nagsinungaling sa kanya si Betty.=9[8+10]11",
        "Magagalit ka ba kung hindi kami dadalo sa inyong pagdiriwang?=10[8+9]11",
    ],
];
$tier = slb_tier($lvl, $grd);
function slb_question(string $raw, int $tier, string $lvl): array {
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
    $_SESSION[$sessionKey]['current'] = slb_question($banks[$tier][$i], $tier, $lvl);
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
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:480px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo slb_h($cur['word']); ?><br/>
<span style="font-weight:normal;">Bilang ng Salita:</span>
<strong style="color:#CC0066;"><?php echo slb_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:480px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo slb_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Ilan ang mga salita sa pangungusap sa itaas?</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 4;
    ?>
<div style="display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px;width:100%;max-width:360px;margin:0 auto;">
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
