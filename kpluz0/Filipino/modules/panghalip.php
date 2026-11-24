<?php
// filipino/modules/panghalip.php
// Six grade-dependent sentence-template banks.

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
$moduleTitle = 'Paggamit ng Panghalip';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function ph_tier(string $lvl, int $grd): int {
    return ($grd <= 3 ? 1 : ($grd <= 5 ? 2 : ($grd <= 7 ? 3 : 4))) + ($lvl === 'Hard' ? 2 : 0);
}
function ph_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
1 => ['*Si $name1+ ay $adj1.=Siya7Ako8Ikaw9Sila', 'Malakas ang boses *ni $name1+.=niya7ko8mo9ninyo', 'Si $name2 ay kalaro *ni $name1+.=niya7ko8mo9ninyo', '*Si $name1+ ay mabuting tao.=Siya7Ako8Ikaw9Sila', 'Tinawagan ko *si $name1+ kanina.=siya7sila8kayo9ikaw', '*Si $name1+ ay malusog na bata.=Siya7Ako8Ikaw9Sila', '*Si $name1+ ay mabait na bata.=Siya7Ako8Ikaw9Sila', '*Sina $name1 at $name2+ ay kumakain na.=Sila7Kami8Tayo9Kayo', '*Ako at si $name2+ ang dadalaw sa kanila.=Kami7Sila8Tayo9Kayo', '*Ako at si $name2+ ang kumain ng keyk.=Kami7Sila8Tayo9Kayo', '*Ikaw at ako+ ay magkaibigan.=Tayo7Sila8Kayo9Kami', '*Ikaw at ako+ ang aawit mamaya.=Tayo7Sila8Kayo9Kami', '*Ikaw at si $name1+ ay magkakilala.=Kayo7Sila8Tayo9Kami', '*Ang bolang hawak ko+ ay akin.=Ito7Nito8Iyon9Dito', '*Ang supot na dala ko+ ay mabigat.=Ito7Nito8Iyon9Dito', '*Ang aklat na dala mo+ ay kay $name1.=Iyan7Ito8Diyan9Niyan', 'Matutulog ako *sa kamang inuupuan ko+.=rito7roon8riyan9ito', 'Tatawagan *ko ikaw+ bukas.=kita7kami8ka9ako', 'Bibigyan *ko ikaw+ ng tinapay.=kita7kami8ka9ako', 'Bibilhan *ko ikaw+ ng kendi.=kita7kami8ka9ako'],
2 => ['*Sina $name1 at $name2+ ay naghahanda ng hapunan.=Sila7Kami8Tayo9Kayo', '*Sina $name1 at $name2+ ang maghuhugas ng pinggan.=Sila7Kami8Tayo9Kayo', '*Si $name1+ ay may bagong sapatos.=Siya7Ako8Ikaw9Sila', 'Ang tatay *ni $name1+ ay isang pulis.=niya7ko8mo9ninyo', '*Si $name1+ ay apat na taong gulang na.=Siya7Ako8Ikaw9Sila', '*Ako at si $name1+ ay magbibisikleta.=Kami7Tayo8Sila9Kayo', '*Ako at si $name1+ ang kukuha ng panggatong.=Kami7Tayo8Sila9Kayo', 'Saan mo inilagay ang sintas *ng sapatos na ito+?=nito7niyan8niyon9niya', '*Si $name1+ ay isang masipag na manggagawa.=Siya7Ako8Ikaw9Sila', 'Bawal po manigarilyo *sa loob ng sinehang ito+.=rito7roon8kayo9tayo', 'Bago at mamahalin *ang kamerang hawak ko+.=ito7iyan8iyon9nito', 'Paborito ko *ang kompyuter na ginagamit mo+.=iyan7iyon8doon9dito', 'Malinis at mabango *ang hawak kong unan+.=ito7iyon8iyan9nito', '*Ang aklat na hawak mo+ ang ginamit ko kanina.=Iyan7Iyon8Ito9Ayun', 'Binisita nila ako noon *sa ospital na ito+.=dito7doon8nito9niyan'],
3 => ['Pumunta na tayong dalawa sa mall at bilhin na *____+ ang regalo ni $name1.=natin7namin8tayo9ninyo', '*Sina $name1 at $name2+ ay magbabakasyon nang matagal sa Laguna.=Sila7Kami8Tayo9Kayo', 'Sasabay *sina $name1 at $name2+ sa sasakyan mamayang pauwi.=sila7kami8tayo9kayo', '*Sina G. at Gng. Javier+ ang mga magulang ni $name1.=Sila7Kami8Tayo9Kayo', 'Naglaro *ako at ang aking mga pinsan+ sa bukid kanina.=kami7kayo8tayo9sila', '*Ikaw at ako+ ay maaaring manalo sa laro kung magtutulong tayo.=Tayo7Sila8Kayo9Kami', '*Ikaw at si $name1+ ay kailangan ni Mayor Santos sa munisipyo bukas.=Kayo7Sila8Tayo9Kami', 'Hindi ka ba maiinggit kung kakainin ko na *ang hawak kong biskwit+?=ito7iyon8iyan9ayun', 'Magkano po ba ang isang kilo *ng bigas na nasa tabi ninyo+?=niyan7nito8niyon9rito', '*Sa bag na ito+ ko itinago ang hinahanap mong panyo.=Dito7Doon8Ganito9Ganoon', '*Si $name1+ ay nahalal bilang pangulo ng samahan.=Siya7Ako8Ikaw9Sila', 'Naghihintay *si $name1+ sa labas ng silid-aralan.=siya7sila8kayo9ako', '*Ako at ang aking mga magulang+ ay magsisimba mamaya.=Kami7Tayo8Sila9Kayo', '*Sina $name1 at $name2+ ay may alagang kakaibang $animal.=Sila7Siya8Sina9Kayo', 'Kailanman ay talagang mapagbigay si $name1 sa *iyo at sa akin+.=atin7amin8kanila9inyo'],
4 => ['Kung ikaw at si $name1 ay magkasintanda, bakit hindi *____+ magkasinlaki?=kayo7tayo8ninyo9sila', '*Sina $name1 at $name2+ ay mahuhusay na manunulat ng maiikling kuwento.=Sila7Kami8Tayo9Kayo', 'Humingi *si $name1+ ng $itemA sa kaibigan niyang $job1.=siya7ako8sila9niya', '*Ang singsing na suot ko+ ay regalo sa akin ng aking mahal na lola.=Ito7Iyan8Iyon9Dito', 'Kasama niya *sa Rizal Park+ sina $name1 at $name2 kanina.=roon7rito8ganito9ganoon', '*Sa ibabaw ng mesang ito+ ko iniwan ang iyong diksiyonaryo.=Dito7Doon8Ganito9Ganoon', '*Si $name1+ ay nagsasaliksik tungkol sa buhay ni Jose Rizal.=Siya7Ako8Ikaw9Sila', 'Sinubukan *nina $name1 at $name2 na+ iligtas ang mga tuta.=nilang7silang8naming9ninyong', 'Pupunta *sina nanay at tatay+ sa palengke bukas ng umaga.=sila7kami8tayo9kayo', '*Ako, si $name1, at si $name2+ ay may maliit na negosyong pinagkakakitaan.=Kami7Tayo8Sila9Kayo', '*Ang pagbabayad ng tamang buwis+ ay tungkulin ng sinumang mamamayan.=Ito7Dito8Doon9Ganito', 'Ipinagbawal *ni G. Santos+ ang pagbili ng pagkain nang wala sa oras.=niya7ninyo8namin9nito', 'Kakailanganin pa ba nina $name1 at $name2 ang tulong ko sa *____+ pananaliksik?=kanilang7iyong8ating9aming', 'Marami pala kayong ipinangako sa mga tao. Sana ay tuparin *____+ ang lahat ng mga ito.=ninyo7kayo8namin9nila', 'Ibibigay nga ba ni $name1 sa *iyo at sa akin+ ang napanalunan niyang gantimpala kagabi?=atin7amin8kanila9inyo'],
5 => ['Bata pa lang *si $boy+ ay pangarap na niyang maging isang mahusay na $job1.=siya7ako8sila9niya', '*Sina $name1 at $name2+ ay napakaripas ng takbo nang biglang makakita ng isang $animal.=Sila7Siya8Sina9Kayo', '*Sina $name1 at $name2+ ay nagpasyang pakawalan ang nahuli nilang $animal.=Sila7Siya8Sina9Kayo', 'Ibinigay ko kina $name1 at $name2 ang nahuli naming $animal upang dalhin *sa Manila Zoo+.=doon7dito8nila9namin', 'Baka magalit si $name1 sa *____+ kapag nalaman niyang nawala nating dalawa ang mamahaling relo niya.=atin7amin8kanila9inyo', 'Hindi mo na kailangang magpaalam pa sa mga kapatid mo para gamitin iyan dahil sa *____+ lahat naman iyan.=inyo7amin8kanila9iyo', 'Magagalit ka ba sa *akin at kay $name1+ kung malalaman mong nawala namin ang sukli mo?=amin7atin8kanila9inyo', 'Ang tagal na nating hindi nakapunta sa lugar na ito. Natatandaan mo bang *____+ tayo unang nagkakilala?=dito7doon8riyan9ganito', 'Hindi ko alam kung bakit wala rito ang proyekto natin ngayon dahil *____+ lang iyon kanina.=nandito7doon8nariyan9nandoon', 'Nakakatakot ang naging karanasan *ko at ni $name1+ kanina nang maligaw kami sa isang liblib at madilim na pook.=namin7nila8ninyo9natin', 'Pumunta na tayong dalawa sa munisipyo upang maayos na *____+ ang mga papeles para sa ating negosyo.=natin7namin8tayo9ninyo', 'Kanina pa natin sila hinihintay rito pero *____+ na pala sila sa pupuntahan nating pasyalan sa Batangas.=naroon7narito8nariyan9ganito', 'Bakit *ako at si $name1+ ang sinisisi mo kung ang nakawala ng iyong selepono ay si $name2?=kami7kayo8tayo9sila', 'Bukas na pala ang isasagawang \'medical mission\' ng inyong organisasyon. Sana ay maraming mahihirap na pamilya ang matulungan *____+.=ninyo7kayo8namin9nila', 'Inanyayahan ng mahal na hari ang bawat mamamayan sa kanyang kaharian dahil nais niyang marinig ng *____+ ang kanyang sasabihin.=lahat7ilan8anuman9kaunti'],
6 => ['Bata pa lang *si $boy+ ay pangarap na niyang makapagpatakbo ng sarili niyang talyer ng mga mamahaling sasakyan.=siya7ako8sila9niya', '*Sina $name1 at $name2+ ay biglang tumakbo at nagtago nang matanaw nila ang mga kriminal na naghahanap sa kanila.=Sila7Siya8Sina9Kayo', '*Sina $name1 at $name2+ ay nagkasundong ipaampon na lamang sa Manila Zoo ang nabili nilang $animal.=Sila7Siya8Sina9Kayo', 'Ibinigay ko kina $name1 at $name2 ang nahanap naming mga lumang aklat upang madala nila *sa silid-aklatan ng aming barangay+.=roon7rito8riyan9ganito', 'Baka magalit si $name1 sa *____+ kapag nalaman niyang nakalimutan nating pakainin ang mga alagang hayop niya.=atin7amin8kanila9inyo', 'Magagalit kaya si $name2 sa *akin at kay $name1+ kung matutuklasan niyang kami ang dahilan sa pagkakatanggal niya sa trabaho?=amin7atin8kanila9inyo', 'Kailan ba tayo huling kumain sa restawrang ito? Kung natatandaan mo, *____+ tayo unang kumain ng piniritong palaka.=dito7doon8riyan9ganito', 'Nagtataka talaga ako kung bakit wala na ngayon dito ang ating sinakyang kalesa dahil *____+ lang iyon kanina.=nandito7doon8nariyan9nandoon', 'Hindi ako makapaniwala sa naging karanasan *ko at ni $name1+ kahapon nang mapagbintangan kami ng isang kasalanang hindi namin ginawa.=namin7nila8ninyo9natin', 'Pumunta na tayo agad sa sentrong pangkalusugan upang mapatingnan na *____+ si $name1 sa mga manggagamot doon.=natin7namin8tayo9ninyo', 'Ang akala ko ay matatagpuan natin sila rito ngunit isang oras na pala silang *____+ sa dadayuhin nating handaan sa Pasay.=naroon7narito8nariyan9ganito', 'Bakit *ako at si $name1+ ang pinagbabayad mo kung ang nakasira naman pala ng iyong kompyuter ay si $name2?=kami7kayo8tayo9sila', 'Sa isang buwan na pala gaganapin ang inyong \'job fair\'. Marami akong isasamang kaibigan doon upang mabigyan *____+ ng trabaho.=ninyo7kayo8namin9nila', 'Ipalalabas sa telebisyon ang pagtalakay sa panukalang batas na ito upang marinig ng *____+ ang sasabihin ng mga senador.=lahat7wala8anuman9kaunti', 'Ang pabrika ng sardinas na pinagtatrabahuhan ko ay *kina $name1 at $name2+ kaya sila ang dapat kong pasalamatan.=kanila7kanya8inyo9atin']
];
$vocab = [
'jobs' => [['abogado', 'barbero', 'bumbero', 'guro', 'kusinero', 'panadero', 'pulis'], ['abogado', 'barbero', 'bumbero', 'guro', 'kusinero', 'panadero', 'pulis', 'mananayaw']],
'adjs' => [['mabait', 'mahina', 'mahusay', 'malakas', 'malusog', 'masaya', 'matalino', 'matapang', 'matapat', 'matipid', 'mayaman', 'payat', 'tahimik'], ['alisto', 'mabait', 'magalang', 'magaling', 'mahinahon', 'mahusay', 'malakas', 'malamya', 'malungkot', 'malusog', 'mapagkaibigan', 'masakitin', 'masaya', 'masayahin', 'masuwerte', 'mataba', 'matalino', 'matangkad', 'matapang', 'matapat', 'matipid', 'matulungin', 'mautak', 'mayaman', 'nakakatawa', 'payat', 'tahimik']],
'boys' => ['Adam', 'Adrian', 'Alex', 'Alexander', 'Andrew', 'Angelo', 'Austin', 'Benjamin', 'Brandon', 'Caleb', 'Cameron', 'Carlos', 'Carson', 'Carter', 'Charles', 'Christopher', 'Daniel', 'David', 'Diego', 'Dominic', 'Dylan', 'Elijah', 'Ethan', 'Gabriel', 'Hayden', 'Ian', 'Isaac', 'Isaiah', 'Jack', 'Jacob', 'Jaden', 'James', 'Jason', 'Jose', 'John', 'Jonathan', 'Joseph', 'Joshua', 'Juan', 'Julian', 'Justin', 'Kevin', 'Logan', 'Lucas', 'Luis', 'Luke', 'Matthew', 'Max', 'Michael', 'Nathan', 'Nicholas', 'Noah', 'Oliver', 'Owen', 'Parker', 'Robert', 'Ryan', 'Samuel', 'Sebastian', 'Thomas', 'Tristan', 'William'],
'girls' => ['Alexandra', 'Alyssa', 'Amelia', 'Andrea', 'Anna', 'Ariana', 'Arianna', 'Bella', 'Brooke', 'Camille', 'Caroline', 'Chloe', 'Claire', 'Elizabeth', 'Emma', 'Eva', 'Evelyn', 'Gabriela', 'Grace', 'Hannah', 'Isabella', 'Jasmine', 'Jocelyn', 'Jolina', 'Julia', 'Katherine', 'Kylie', 'Lauren', 'Layla', 'Leah', 'Lillian', 'Lydia', 'Madeline', 'Maria', 'Mariah', 'Melanie', 'Mia', 'Naomi', 'Natalie', 'Olivia', 'Samantha', 'Sarah', 'Sofia', 'Sophia', 'Sophie', 'Stella', 'Tina', 'Victoria'],
'animals' => [['aso', 'baka', 'ibon', 'isda', 'itik', 'kabayo', 'manok', 'pagong', 'pusa', 'tuta'], ['alakdan', 'bayawak', 'bubuli', 'buwaya', 'gagamba']],
'items' => [['asin', 'bigas', 'pera', 'ulam'], ['saklolo', 'asukal', 'bigas', 'payo', 'pera', 'tulong', 'ulam']]
];
$tier = ph_tier($lvl, $grd);
function ph_question(string $raw, int $tier, string $lvl, array $vocab): array {
    $g = $tier <= 3 ? 0 : 1;
    $boy = $vocab['boys'][array_rand($vocab['boys'])];
    $n1 = random_int(0,1) ? $boy : $vocab['girls'][array_rand($vocab['girls'])];
    $pool = random_int(0,1) ? $vocab['boys'] : $vocab['girls'];
    $pool = array_values(array_diff($pool, [$n1]));
    $n2 = $pool[array_rand($pool)];
    $jobs = $vocab['jobs'][$g]; shuffle($jobs);
    $adjs = $vocab['adjs'][$g]; shuffle($adjs);
    $animals = $vocab['animals'][$g]; $items = $vocab['items'][$g];
    [$sentence, $correct, $a, $b, $c] = preg_split('/[=789]/', $raw);
    $sentence = strtr($sentence, ['$name1'=>$n1, '$name2'=>$n2, '$boy'=>$boy, '$job1'=>$jobs[0], '$job2'=>$jobs[1], '$adj1'=>$adjs[0], '$adj2'=>$adjs[1], '$animal'=>$animals[array_rand($animals)], '$itemA'=>$items[array_rand($items)]]);
    if (!preg_match('/^(.*?)\*(.*?)\+(.*)$/s', $sentence, $m)) throw new RuntimeException('Invalid sentence template');
    $original = ph_h($m[1]).'<strong style="color:#CC0066;">'.ph_h($m[2]).'</strong>'.ph_h($m[3]);
    $blank = ph_h($m[1].'____'.$m[3]);
    $completed = ph_h($m[1]).'<strong style="color:#CC0066;">'.ph_h($correct).'</strong>'.ph_h($m[3]);
    $prefix = $m[2] === '____' ? '' : $original.'<br/><br/>';
    $choices = $tier === 1 ? [$correct,$a] : [$correct,$a,$b,$c]; shuffle($choices);
    return ['word'=>$prefix.$blank, 'feedback'=>$prefix.$completed, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
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
    $_SESSION[$sessionKey]['current'] = ph_question($banks[$tier][$i], $tier, $lvl, $vocab);
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
            <?php echo $cur['feedback']; ?><br/><br/>Sagot: <strong style="color:#CC0066;"><?php echo ph_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Piliin ang tamang panghalip.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo ph_h($choice); ?>
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
