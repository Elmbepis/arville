<?php
// filipino/modules/tambalan-kahulugan.php
// Compound words with classification and feedback.

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
$moduleTitle = 'Kahulugan ng mga Tambalang Salita';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
$tier = "all";
function pua_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, "UTF-8"); }
$banks = [$tier => [
    ["araw-gabi", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["bahay-ampunan", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["bahay-kubo", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["buhay-mayaman", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["hatid-sundo", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["ingat-yaman", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["pamatid-uhaw", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["silid-aklatan", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["silid-aralan", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["silid-kainan", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["silid-tulugan", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["tabing-dagat", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["tabing-ilog", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["tabing-riles", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["tubig-alat", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["tubig-dagat", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["tubig-tabang", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["tubig-ulan", "Nananatili", "Nananatili ang kahulugan ng bawat salitang bumubuo nito.", 0],
    ["alilang-kanin", "Di-nananatili", "utusang pagkain lamang ang kabayaran.", 1],
    ["anak-pawis", "Di-nananatili", "manggagawa o magsasaka na nabubuhay sa sariling paggawa.", 1],
    ["bahaghari", "Di-nananatili", "makulay na arko sa kalangitan.", 1],
    ["balat-sibuyas", "Di-nananatili", "madaling masaktan ang damdamin.", 1],
    ["basag-ulo", "Di-nananatili", "pisikal na away.", 1],
    ["boses-palaka", "Di-nananatili", "taong may hindi magandang tinig sa pag-awit.", 1],
    ["bukas-palad", "Di-nananatili", "mapagbigay sa kapwa.", 1],
    ["dugong-bughaw", "Di-nananatili", "taong nagmula sa maharlikang angkan.", 1],
    ["hampas-lupa", "Di-nananatili", "taong lubhang mahirap.", 1],
    ["hanapbuhay", "Di-nananatili", "trabaho.", 1],
    ["kapitbahay", "Di-nananatili", "taong nakatira malapit sa iyong bahay.", 1],
    ["kapit-tuko", "Di-nananatili", "ayaw umalis o magpaubaya.", 1],
    ["lakad-pagong", "Di-nananatili", "mabagal maglakad.", 1],
    ["matang-lawin", "Di-nananatili", "taong matalas ang paningin.", 1],
    ["matang-baka", "Di-nananatili", "isang uri ng isda.", 1],
    ["matapobre", "Di-nananatili", "taong nangmamaliit sa mahihirap.", 1],
    ["nakaw-tingin", "Di-nananatili", "sulyap na palihim.", 1],
    ["ningas-kugon", "Di-nananatili", "siglang panandalian lamang.", 1],
    ["patay-gutom", "Di-nananatili", "walang makain.", 1],
    ["sunog-kilay", "Di-nananatili", "masipag at matiyagang mag-aral.", 1],
    ["taingang-kawali", "Di-nananatili", "nagbibingi-bingihan.", 1],
]];
function pua_question(array $entry, string $tier, string $lvl): array {
    [$word, $correct, $meaning, $category] = $entry;
    return ['word'=>pua_h($word), 'correct'=>$correct, 'meaning'=>$meaning, 'choices'=>['Nananatili','Di-nananatili'], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    foreach ($available as $idx) $byCategory[$banks[$tier][$idx][3]][] = $idx;
    $category = array_rand($byCategory);
    $i = $byCategory[$category][array_rand($byCategory[$category])];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pua_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo pua_h($cur['correct']); ?></span></strong>
        <p style="font-weight:400;"><?php echo $cur['correct'] === 'Di-nananatili' ? 'Bagong kahulugan: ' : ''; echo pua_h($cur['meaning']); ?></p>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Sabihin kung ang kahulugan ng bawat salitang bumubuo ng tambalang salita sa itaas ay nananatili o di-nananatili.</p>
    <?php
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pua_h($choice); ?>
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
