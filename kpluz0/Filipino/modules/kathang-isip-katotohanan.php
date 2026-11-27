<?php
// filipino/modules/kathang-isip-katotohanan.php
// Single legacy statement bank.

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
$moduleTitle = 'Kathang-isip at Katotohanan';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
$tier = 'all';
function ki_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = ['all' => [
    ['Bumisita sa Pilipinas si Pope Francis noong Enero 2015.', 'katotohanan'],
    ['Ang Pasko ay ipinagdiriwang natin tuwing ika-25 ng Disyembre.', 'katotohanan'],
    ['Nang minsan akong namasyal ay napagtanto kong mas maraming gusali sa pamayanang urban kaysa sa pamayanang rural.', 'katotohanan'],
    ['Mainam kumain ng mga prutas dahil ang mga ito ay may iba\'t ibang bitamina at mineral na mabuti para sa ating katawan.', 'katotohanan'],
    ['Hindi maaaring pagbilhan ng alak ang mga menor de edad dahil labag ito sa ating batas.', 'katotohanan'],
    ['Ang mga kulay ng pambansang watawat ng Pilipinas ay bughaw, pula, puti, at dilaw.', 'katotohanan'],
    ['Tuwing unang araw ng Enero ay nagsisindi ng mga paputok ang karamihan bilang pagsalubong sa Bagong Taon.', 'katotohanan'],
    ['Maraming dayuhan ang nagbabakasyon sa Pilipinas tuwing tag-init sapagkat marami tayong magagandang tanawin at baybayin.', 'katotohanan'],
    ['Naapektuhan ng matinding bagyong Yolanda ang maraming lugar sa Tacloban.', 'katotohanan'],
    ['Si Jose Rizal ay naging pambansang bayani ng Pilipinas sapagkat napukaw niya ang damdaming nasyonalismo ng mga Filipino laban sa mga Espanyol.', 'katotohanan'],
    ['Maraming impluwensiyang banyaga ang makikita sa Pilipinas sa kasalukuyan sapagkat tayo ay sinakop ng iba\'t ibang bansa.', 'katotohanan'],
    ['Ako ay pahihintulutan nang lumahok sa halalan pagtuntong ko ng edad na 18.', 'katotohanan'],
    ['Bumibigat ang daloy ng trapiko sa ilang lugar tuwing unang araw ng Nobyembre sapagkat nagkakasabay-sabay ang mga tao sa pagdalaw sa kanilang mga yumaong mahal sa buhay.', 'katotohanan'],
    ['Maraming aklat na ang naisulat at nailathala tungkol sa mga bampira, manananggal, at aswang.', 'katotohanan'],
    ['Maraming tao ang nalilibang sa panonood ng mga pelikulang tungkol sa mga \'zombies\'.', 'katotohanan'],
    ['Mapapanood na ngayon ang mga pelikulang \'Star Wars\' at \'Spider-Man\' sa pamamagitan ng internet.', 'katotohanan'],
    ['Tuwing gabi ay may naririnig kaming mga alulong ng isang taong lobo sa aming bakuran.', 'kathang-isip'],
    ['Kung matiyaga kang maghanap, marami kang makikitang sirena sa isla ng Romblon.', 'kathang-isip'],
    ['Isang hating-gabi noong huli naming uwi sa lalawigan ay nakakita kami ng mga aswang na nagpapagala-gala sa kalye.', 'kathang-isip'],
    ['Nawala ang sanggol ng aming kapitbahay sapagkat ito ay dinukot daw ng isang manananggal.', 'kathang-isip'],
    ['Tuwing sasapit ang kabilugan ng buwan ay nagkakaroon ng mga pakpak at pangil ang ilang kababaihan sa aming nayon.', 'kathang-isip'],
    ['Ang mga bampira ay matatagpuan lamang sa bansang Switzerland sapagkat malamig ang klima doon at kakaunti ang tao.', 'kathang-isip'],
    ['Ang ibong Adarna ang siyang nakapagpagaling sa hari ng Berbanya.', 'kathang-isip'],
    ['Si Pina ay palaging walang makita sa tuwing inuutusan ng kanyang nanay kaya siya ay isinumpang magkaroon ng maraming mata.', 'kathang-isip'],
    ['Ang mga sirena ay mga mababait na nilalang na namumuhay nang payapa sa bansang Atlantis.', 'kathang-isip'],
    ['Ang mga bampira ay mga natural na kaaway ng mga taong lobo.', 'kathang-isip'],
    ['Ayon sa aking lola, may ikinakasal na tikbalang tuwing umuulan habang umaaraw.', 'kathang-isip'],
    ['Matatagpuan sa dulo ng bahaghari ang mga gintong ibinaon ng mga duwende.', 'kathang-isip'],
    ['Huwag kang lalapit sa ibong Adarna dahil magiging bato ka kapag naiputan ka nito.', 'kathang-isip'],
    ['Lumihis tayo ng daan dahil mayroon akong naaninag na kapreng nakabantay sa punong manggang iyon.', 'kathang-isip'],
    ['Noong bata pa ako ay may mga duwende akong nakakalaro tuwing alas-kuwatro ng hapon.', 'kathang-isip'],
    ['Iniligtas ako ni Superman sa mga masasamang-loob kahapon.', 'kathang-isip'],
    ['Hindi gumagaling ang mga sugat ni Ambo dahil nagalit sa kanya ang nuno sa punso.', 'kathang-isip'],
    ['Sumakay si Harry Potter sa kanyang walis at mabilis siyang lumipad nang papalayo.', 'kathang-isip'],
]];
function ki_question(array $entry, string $tier, string $lvl): array {
    return ['word'=>strip_tags($entry[0], '<i>'), 'correct'=>$entry[1], 'choices'=>['kathang-isip','katotohanan'], 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && ($_SESSION[$sessionKey]['current']['lvl'] ?? null) === $lvl
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
    foreach ($available as $idx) $byCategory[$banks[$tier][$idx][1]][] = $idx;
    $category = array_rand($byCategory);
    $i = $byCategory[$category][array_rand($byCategory[$category])];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = ki_question($banks[$tier][$i], $tier, $lvl);
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
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        Ang pangungusap na ibinigay ay nagpapahayag ng <strong><span style="color:#CC0066;"><?php echo ki_h($cur['correct']); ?></span></strong>.
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Sabihin kung ang pangungusap sa itaas ay nagpapahayag ng kathang-isip o katotohanan.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 2;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo ki_h(ucfirst($choice)); ?>
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
