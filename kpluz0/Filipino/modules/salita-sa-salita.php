<?php
// filipino/modules/salita-sa-salita.php
// Single legacy word bank; single difficulty.

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
$moduleTitle = 'Paghahanap ng Salita sa<br/>Loob ng Mahabang Salita';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
// Legacy bank covers grades 0–3; reuse it for older grades if enabled.
function sss_tier(string $lvl, int $grd): int { return 0; }
function sss_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        "ibinabalita=balita[banat+iniba]alitan",
        "ikinakahon=kahon[kahol+nakaon]naahon",
        "ikinagagalit=galit[ginalit+nagalit]galitin",
        "ipinaluto=luto[tuto+lito]palit",
        "ipinagpilitan=pilit[palit+pilat]pinilit",
        "kababawan=babaw[babad+ibabaw]bawang",
        "kabaitan=bait[bati+bitak]bata",
        "kadiliman=dilim[dilig+ama]dila",
        "kagandahan=ganda[gana+gansa]dahon",
        "kalupitan=lupit[lubid+kalap]lapit",
        "kasaganahan=sagana[gandahan+sagasa]agahan",
        "kasamahan=sama[kama+kaha]isama",
        "nabalian=bali[bala+laba]banli",
        "nabulyawan=bulyaw[bula+balya]balaan",
        "nagpapalipas=lipas[lapis+pala]sapin",
        "nagsiksikan=siksik[saksak+saksi]sinsin",
        "nasugatan=sugat[sukat+sagutan]sumugat",
        "pagmamalabis=labis[mali+malas]lapis",
        "pagpapalitan=palit[pilit+galit]pala",
        "pagsasaulo=ulo[salo+sala]pasa",
        "pagtatalian=tali[tili+pagtali]itali",
        "pasisikatin=sikat[sakit+itakin]siksik",
        "pakikisama=sama[kisame+kisap]kama",
        "pinagdasalan=dasal[dalas+dasalin]dalasan",
        "pinagkaabalahan=abala[alala+balaan]labahan",
        "pinagkabitan=kabitan[tabihan+nakabig]sabitan",
        "pinaglabahan=labahan[labahin+paglalaba]labanan",
        "pinaglabanan=laban[labas+paglaban]ilaban",
        "pinagpasahan=pasahan[pasanin+ipasa]pasahe",
        "pinagsabihan=sabi[sabit+siba]sabihin",
        "pinagsabitan=sabit[kabit+sibat]sabat",
        "pinagsampayan=sampayan[sampahan+samahan]nagsama",
        "pinagsilbihan=silbi[bilib+bihis]sabi",
        "pinakawalan=wala[pawala+nawala]kawan",
        "pinapalitan=palit[pala+paitan]pilit",
    ],
];
$tier = sss_tier($lvl, $grd);
function sss_question(string $raw, int $tier, string $lvl): array {
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
    $_SESSION[$sessionKey]['current'] = sss_question($banks[$tier][$i], $tier, $lvl);
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
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang salitang nakapaloob sa salitang '<?php echo sss_h($cur['word']); ?>' ay <strong style="color:#CC0066;">'<?php echo sss_h($cur['correct']); ?>'</strong>.</p>
<div style="display:inline-flex;width:auto;max-width:100%;margin:20px auto;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;flex-direction:column;justify-content:center;align-items:center;overflow-wrap:anywhere;">
        <strong style="color:#CC0066;font-size:14pt;">Salitang Nakapaloob:</strong>
        <strong style="color:#800080;font-size:18pt;"> <?php echo sss_h($cur['word'].' > '.$cur['correct']); ?></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;">
        <?php echo sss_h($cur['word']); ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang salitang nakapaloob sa salita sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
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
