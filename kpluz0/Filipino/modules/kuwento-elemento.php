<?php
// filipino/modules/kuwento-elemento.php
// Reading comprehension: two transcribed passages.

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
$moduleTitle = 'Mga Elemento ng Isang Kuwento';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
function kuw_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$stories = [
    ['Ang Gintong Palayan', '', '<br/>Sa isang malayong baryo nakatira ang mag-asawang Guring at Amado. May tatlo silang anak: sina Mario, Tessa, at Cherry. Si Mario ay edad 19, si Tessa ay edad 15, at ang bunsong si Cherry ay edad 10. Simple lamang ang buhay ng pamilya. Mayroon silang mga alagang hayop tulad ng baboy, kambing, kalabaw at mga manok. Nag-aaral ang magkakapatid sa nag-iisang paaralan sa kanilang baryo. Mahirap lamang ang kanilang buhay subalit nakakaraos naman sila kahit papaano. Masisipag ang mga anak ng mag-asawa dahil pinalaki silang may disiplina at takot sa Diyos.<br/><br/>Isang araw, nagtungo sa palayan ang amang si Amado. Nagsabog siya ng punla bilang paghahanda sa darating na taniman. Tinulungan siya ng kanyang anak na si Mario.<br/><br/>Araw-araw binibisita ni Amado ang kanyang mga tanim sa palayan. Unti-unti nang lumalaki ang kanyang mga tanim na palay. Tuwang-tuwa ang buong mag-anak dahil malulusog ang kanilang mga pananim.<br/><br/>Isang Sabado, biglang dumating nang humahangos si Amado sa kanilang tahanan. “Guring ... mga anak? Guring?” sigaw niya. Sabay-sabay na lumabas ang mag-iinang nag-aalala. Ano kaya ang nangyari?<br/><br/>“Ginto na ang mga halaman, ginto na ang palayan!” tuwang-tuwang sabi ni Amado.<br/><br/>“Itay, ano po ang may ginto sa palayan?” tanong ni Mario.<br/><br/>“Mga anak, ang ibig sabihin ng inyong ama ay hinog na ang mga butil ng palay at maaari na itong anihin. Kulay ginto na ang palayan.”', [
        ['Saan ang tagpuan ng kuwento?', 'sa isang malayong baryo', 'sa kabilang bayan', 'sa Maynila', 'sa isang iskinita'],
        ['Saan nag-aaral ang mga magkakapatid sa kuwento?', 'sa nag-iisang paaralan sa baryo', 'sa paaralan ng kabilang bayan', 'sa Maynila', 'sa ibang bansa'],
        ['Saan nila nakita ang tinatawag na \'ginto\'?', 'sa palayan', 'sa kulungan ng baboy', 'sa loob ng bahay', 'sa kapitbahay'],
        ['Sino ang ama sa kuwento?', 'Amado', 'Guring', 'Tessa', 'Mario'],
        ['Sino ang ina sa kuwento?', 'Guring', 'Maria', 'Cherry', 'Tessa'],
        ['Ano ang pangalan ng pinakamatandang anak ng mag-asawa?', 'Mario', 'Amado', 'Tessa', 'Cherry'],
        ['Ano ang pangalan ng pinakabatang anak sa kuwento?', 'Cherry', 'Tessa', 'Amado', 'Guring'],
        ['Sino ang edad labing-lima sa magkakapatid?', 'Tessa', 'Cherry', 'Mario', 'Guring'],
        ['Sino ang edad sampu sa magkakapatid?', 'Cherry', 'Mario', 'Tessa', 'Guring'],
        ['Sino ang madalas magtungo sa bukid upang bisitahin ang mga halaman?', 'Amado', 'Guring', 'Mario', 'Tessa'],
        ['Sino ang nakatulong ni Amado sa pagpupunla sa palayan?', 'Mario', 'Tessa', 'Cherry', 'Guring'],
        ['Sino ang nagdisiplina sa mga magkakapatid?', 'ang mga magulang', 'ang mga kapitbahay', 'ang mga kalaro', 'ang mga kaklase'],
        ['Alin sa mga pangyayari sa ibaba ang nasa unang bahagi ng kuwento?', 'May isang simpleng pamilya sa baryo.', 'Nagpunla ang mag-ama.', 'Nag-aalalang lumabas sina Aling Guring.', 'Nagkulay ginto ang mga butil ng palay.'],
        ['Alin sa mga ito ang wakas ng kuwento?', 'Maaari nang anihin ang palay.', 'May isang simpleng pamilya sa baryo.', 'Binibisita ni Amado ang mga pananim.', 'Dinidisiplina ang magkakapatid.'],
        ['Ano ang aral na matututunan sa kuwentong binasa?', 'Dapat magsipag at magtulungan.', 'Dapat mag-aral sa kabilang baryo.', 'Dapat palaging mag-alala.', 'Dapat maglaro sa bukid.'],
        ['Ano ang pangunahing paksa ng kuwentong binasa?', 'masipag at masayang pamilya', 'nag-aaral na magkakapatid', 'pagiging tamad', 'pag-aalaga ng mga hayop'],
        ['Alin ang kapana-panabik na pangyayari sa kuwento?', 'pagbabalita ni Amado ng gintong palayan', 'pag-aaral ng magkakapatid', 'pag-aalaga ng mga hayop', 'pagpupunla sa palayan'],
        ['Ano ang pamagat ng kuwento?', 'Ang Gintong Palayan', 'Ang Ginto sa Palayan', 'Palayang Ginto', 'Ang Ginintuang Palayan'],
        ['Paano mo ilalarawan ang buhay ng mag-anak sa kuwento?', 'simple ngunit masaya', 'mayaman pero malungkot', 'marangya at sagana', 'mahirap at malungkot'],
    ]],
    ['Ang Alamat ng Ampalaya', 'https://gabay.ph/banghay/', '<br/>Noong unang panahon, sa bayan ng Sariwa, naninirahan ang lahat ng uri ng gulay na may kanya-kanyang kagandahang taglay. Si Kalabasa ay may kakaibang tamis. Si Kamatis ay may asim at malasutlang kutis. Si Luya ay may anghang. Si Labanos ay sobra ang kaputian. Si Talong ay may lilang balat. Si Mustasa ay may luntiang pisngi. Naroon din si Singkamas na may kakaibang lutong, si Sibuyas na may manipis na balat, at si Patola na may gaspang na kaakit-akit.<br/><br/>Subalit may gulay na kakaiba ang anyo, si Ampalaya. Siya ay may maputlang kulay at ang kanyang lasa ay di maipaliwanag. Araw-araw naiinggit si ampalaya sa hitsura, kulay, at lasa ng kanyang mga kasamang gulay kaya nagbalak siya ng masama. Isang gabi kinuha ni Ampalaya ang lahat ng mga magagandang katangian.<br/><br/>Tuwang-tuwa si Ampalaya dahil ang dating hindi pinapansin ay pinagkakaguluhan na ngayon. Nalaman ng mga gulay ang nangyari at sila ay nagalit kay Ampalaya. Iniharap siya sa diwata ng lupain at ito ay nagalit.<br/><br/>Bilang parusa kay Ampalaya, ang lahat ng mga magagandang katangian ng mga gulay ay ibinigay sa kanya. Natuwa si Ampalaya sa kanyang parusa. Subalit di nagtagal, ang balat niya ay unti-unting kumulubot dahil ang kinis ni Kamatis at ang gaspang ni Patola ay naglaban sa loob ng kanyang katawan. Naging mapait din ang kanyang lasa dulot ng pagkahalu-halo ng sari-saring lasa ng mga gulay sa loob ng kanyang katawan.', [
        ['Sino ang pangunahing tauhan sa kuwento?', 'Ampalaya', 'Diwata', 'Patola', 'Kamatis'],
        ['Sino ang nagkaroon ng inggit sa mga tauhan sa kuwento?', 'Ampalaya', 'Sibuyas', 'Kamatis', 'Singkamas'],
        ['Sino ang gulay na may kakaibang tamis?', 'Kalabasa', 'Patola', 'Sibuyas', 'Kamatis'],
        ['Sino ang nagalit kay Ampalaya dahil sa kanyang ginawa?', 'ang diwata ng lupain', 'ang diwata ng kagubatan', 'ang diwata ng kabundukan', 'ang diwata ng mga puno'],
        ['Sino ang gulay na may asim at malasutlang kutis?', 'Kamatis', 'Patola', 'Mustasa', 'Ampalaya'],
        ['Sino sa mga gulay ang may taglay na anghang?', 'Luya', 'Labanos', 'Patola', 'Kamatis'],
        ['Sino sa mga ito ang may taglay na kaputian?', 'Labanos', 'Ampalaya', 'Luya', 'Kamatis'],
        ['Ayon sa kuwento, sino sa mga ito ang may lilang balat?', 'Talong', 'Patola', 'Singkamas', 'Kamatis'],
        ['Sino sa mga ito ang may luntiang pisngi?', 'Mustasa', 'Kalabasa', 'Singkamas', 'Kamatis'],
        ['Ayon sa kuwento, sino sa mga ito ang may manipis na balat?', 'Sibuyas', 'Ampalaya', 'Kamatis', 'Patola'],
        ['Sino sa mga ito ang may gaspang na kaakit-akit?', 'Patola', 'Kamatis', 'Kalabasa', 'Singkamas'],
        ['Ayon sa kuwento, sino sa mga ito ang may kakaibang lutong?', 'Singkamas', 'Patola', 'Kamatis', 'Sibuyas'],
        ['Saan ang tagpuan ng kuwento?', 'sa bayan ng Sariwa', 'sa bayan ng Marikit', 'sa bayan ng Masipag', 'sa bayan ng Maganda'],
        ['Ano ang paksa ng kuwento?', 'ang alamat ng gulay na ampalaya', 'ang alamat ng lahat ng mga gulay', 'kung bakit sariwa ang mga gulay', 'ang alamat ng inggit'],
        ['Ano ang aral sa kuwento?', 'Huwag mainggit.', 'Maging madamot.', 'Huwag makuntento.', 'Huwag maging tamad.'],
        ['Paano nagwakas ang kuwento?', 'naging kulubot at mapait si Ampalaya', 'naging maganda si Ampalaya', 'pinatawad si Ampalaya', 'pinalayas si Ampalaya'],
        ['Alin sa mga ito ang simula ng kuwento?', 'May mga nakatirang gulay sa bayan ng Sariwa.', 'Nagalit ang Diwata ng lupain.', 'Ninakaw ni Ampalaya ang mga katangian.', 'Naging kulubot ang balat ni Ampalaya.'],
        ['Ano ang kasukdulan sa kuwento?', 'nang kumulubot at pumait si Ampalaya', 'nang nagnakaw si Ampalaya', 'nang mainggit si Ampalaya', 'nang magalit ang mga gulay'],
    ]],
];
$banks = [];
foreach ($stories as $si => $story) foreach ($story[3] as $qi => $entry) $banks[] = [$si, $qi];
$tier = 'all';
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
    $available = array_values(array_diff(array_keys($banks), $used));
    if (!$available) { $used = []; $available = array_keys($banks); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    [$si, $qi] = $banks[$i];
    $entry = $stories[$si][3][$qi];
    $choices = array_slice($entry, 1);
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = ['story'=>$si, 'word'=>kuw_h($entry[0]), 'correct'=>$entry[1], 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    <?php $passage = $stories[$cur['story']]; ?>
    <div style="max-width:500px;margin:20px auto;padding:20px;box-sizing:border-box;border:1px solid #AAA;border-radius:8px;background:white;">
        <div style="font-size:16pt;font-weight:700;color:#0000BB;"><?php echo kuw_h($passage[0]); ?></div>
        <?php if ($passage[1] !== ''): ?><p style="font-size:10pt;overflow-wrap:anywhere;color:#555;">Pinagkunan: <?php echo kuw_h($passage[1]); ?></p><?php endif; ?>
        <div style="text-align:justify;font-size:13pt;line-height:1.6;color:#800080;"><?php echo str_replace('&lt;br/&gt;', '<br/>', kuw_h($passage[2])); ?></div>
    </div>
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Sagot: <span style="color:#CC0066;"><?php echo kuw_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <?php $passage = $stories[$cur['story']]; ?>
    <div style="max-width:500px;margin:20px auto;padding:20px;box-sizing:border-box;border:1px solid #AAA;border-radius:8px;background:white;">
        <div style="font-size:16pt;font-weight:700;color:#0000BB;"><?php echo kuw_h($passage[0]); ?></div>
        <?php if ($passage[1] !== ''): ?><p style="font-size:10pt;overflow-wrap:anywhere;color:#555;">Pinagkunan: <?php echo kuw_h($passage[1]); ?></p><?php endif; ?>
        <div style="text-align:justify;font-size:13pt;line-height:1.6;color:#800080;"><?php echo str_replace('&lt;br/&gt;', '<br/>', kuw_h($passage[2])); ?></div>
    </div>

    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:17pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Pindutin ang iyong sagot sa ibaba.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;max-width:480px;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo kuw_h($choice); ?>
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
