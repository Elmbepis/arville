<?php
// filipino/modules/salawikain.php
// Proverbs with dynamically generated choices.

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
$moduleTitle = 'Mga Salawikain';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
$tier = "all";
function pua_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, "UTF-8"); }
$groups = [
    [
        ["Ang bayaning nasusugatan, nag-iibayo ang tapang.", "Ang tao ay dapat lalong magsikap at magpakatatag sa harap ng mga pagsubok."],
        ["Aanhin pa ang bahay na bato kung ang nakatira ay kuwago.", "Hindi basehan ang bahay o yaman ng isang tao para husgahan ang kanyang pagkatao."],
        ["Aanhin pa ang damo kung patay na ang kabayo.", "Ipaabot kaagad ang anumang tulong dahil wala na itong silbi kung wala na rin ang nangangailangan."],
        ["Ang buhay ay parang gulong - minsan nasa ibabaw, minsan nasa ilalim.", "Sa ating buhay, pareho nating mararanasan ang lungkot at ligaya."],
        ["Ang hindi lumingon sa pinanggalingan ay hindi makararating sa paroroonan.", "Mahalagang tumanaw ng utang na loob sa mga dating nakatulong sa atin."],
        ["Ang hindi magmahal sa sariling wika, higit pa ang amoy sa malansang isda.", "Dapat nating mahalin at gamitin ang ating sariling wika."],
        ["Ang palay ay parisan, habang nagkakalaman ay lalong nagpupugay.", "Ang taong lalong nagtatagumpay ay dapat na lalong nagpapakumbaba."],
        ["Ang puri at ang dangal, mahalaga kaysa buhay.", "Dapat pangalagaan ng tao ang kanyang katauhan."],
        ["Ang taong nagigipit, sa patalim man ay kumakapit.", "Ang taong nagigipit ay nakakagawa ng mga bagay na lalong magpapahamak sa kanya."],
        ["Huli man daw at magaling, naihahabol din.", "Ang mabuting gawa o tulong, kahit huli, ay maaari pa ring maging kapaki-pakinabang."],
        ["Kung ano ang puno, siya ang bunga.", "Napupulot ng anak ang pag-uugali ng kanyang mga magulang."],
        ["Kung ano ang itinanim ay siyang aanihin.", "Ang ginagawa mo sa iyong kapwa ay siya ring gagawin sa iyo ng iba."],
        ["Kung hindi ukol, hindi bubukol.", "Hindi mo makakamtan ang iyong hinahangad kung hindi ito nakalaan para sa iyo."],
        ["Kung may isinuksok, may madudukot.", "Matutong magtipid upang sa oras ng pangangailangan ay may perang magagamit."],
        ["Kung sino ang pumutak, siya ang nanganak.", "Minsan, kung sino ang mali ay siya pa ang unang nangangatuwiran."],
        ["Lahat ng gubat ay may ahas.", "Sa alinmang lipunan ay may mga taong di matapat."],
        ["Mabuti at masamang ginto, sa urian natatanto.", "Makikilatis lang ang ganda ng isang tao kung siya ay iyong susubukin."],
        ["Magandang pamintana, masamang pangkusina.", "Hindi dapat ibatay sa pisikal na ganda ang kakayahan ng isang tao."],
        ["May tainga ang lupa, may pakpak ang balita.", "Mag-ingat sa iyong sinasabi dahil mabilis itong kakalat kapag may nakarinig."],
        ["Nasa Diyos ang awa, nasa tao ang gawa.", "Hindi sapat na humingi lang tayo ng biyaya sa Diyos; dapat din tayong magsikap."],
        ["Pagkahaba-haba man ng prusisyon, sa simbahan din ang tuloy.", "Matagal man ang paghihintay, sa huli ay sa kasal din nauuwi ang magkasintahan."],
        ["Pag maikli ang kumot, matutong mamaluktot.", "Ang tao ay dapat mamuhay lamang nang ayon sa kanyang kakayahan."],
        ["Sa maliliit na dampa nagmumula ang dakila.", "Maraming tao ang isinisilang na dukha pero nagiging huwaran at matagumpay."],
        ["Daig ng maagap ang masipag.", "Mahalaga ang pagkilos sa tamang oras at maagang paghahanda."],
        ["Ang taong walang kibo, nasa loob ang kulo.", "Maaaring may matinding damdaming ikinukubli ang isang tahimik na tao."],
        ["Ang sakit ng kalingkingan ay dama ng buong katawan.", "Ang suliranin ng isang kasapi ay nakaaapekto sa buong pangkat."],
        ["Walang matimtimang birhen sa matiyagang manalangin.", "Ang matiyagang panliligaw ay maaaring magbunga ng pag-ibig."],
        ["Madali ang maging tao, mahirap magpakatao.", "Hindi madaling mamuhay nang may mabuting asal at pananagutan."],
        ["Habang may buhay, may pag-asa.", "Hindi dapat mawalan ng pag-asa habang nabubuhay."],
        ["Ang tunay na kaibigan, nakikilala sa kagipitan.", "Sa panahon ng problema nasusubok ang katapatan ng kaibigan."],
    ],
];
$banks = [$tier => []];
foreach ($groups as $g => $entries) {
    foreach ($entries as $entry) $banks[$tier][] = [$entry[0], $entry[1], $g];
}
function pua_question(array $entry, string $tier, string $lvl): array {
    global $groups;
    [$word, $correct, $g] = $entry;
    $wrong = [];
    foreach ($groups[$g] as [$other, $meaning]) {
        if ($other === $word || $meaning === $correct) continue;
        $ambiguous = [[0, 6, 28], [2, 9], [1, 5, 7, 16, 17, 27], [8, 12, 23], [15, 18]];
        foreach ($ambiguous as $set) {
            $words = array_map(static function ($i) { return $GLOBALS['groups'][0][$i][0]; }, $set);
            if (in_array($word, $words, true) && in_array($other, $words, true)) continue 2;
        }
        $wrong[] = $meaning;
    }
    $wrong = array_values(array_unique($wrong));
    shuffle($wrong);
    $choices = array_merge([$correct], array_slice($wrong, 0, 3));
    shuffle($choices);
    return ['word'=>pua_h($word), 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    foreach ($available as $idx) $byCategory[$banks[$tier][$idx][2]][] = $idx;
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
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:19pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong>Kahulugan:</strong> <span style="color:#CC0066;"><?php echo pua_h($cur['correct']); ?></span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:19pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:40px auto;max-width:450px;">Piliin ang ibig sabihin ng salawikain sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:500px;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
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
