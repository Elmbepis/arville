<?php
// filipino/modules/pandiwa-layon.php
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
$moduleTitle = 'Layon ng Pandiwa';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0) $grd = 0;
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$baseTier = $grd <= 3 ? 1 : ($grd <= 5 ? 2 : ($grd <= 7 ? 3 : 4));
$tiers = $lvl === 'Easy' ? [$baseTier] : ($grd <= 1 ? [2] : [$baseTier+1, $baseTier+2]);
$tier = implode('-', $tiers);
function lay_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$sourceBanks = [
1 => [
    ['Si &$name1= ay bumili ng *$fruit+ %kanina#.', 1],
    ['Ang &mga bata= ay naglaro ng *bola+ %sa labas#.', 1],
    ['Naglako si &$name1= ng *$fruit+ %sa bayan#.', 1],
    ['%Nagbayad# na si &$name1= ng *$number piso+.', 1],
    ['%Naghulog# si &$name1= ng *sulat+ doon.', 1],
    ['%Nagtinda# dati si &$name1= ng *$item+.', 1],
    ['%Nagluto# si &Aling $girl= ng *$food+.', 1],
    ['%Naghain# &siya= ng *$food+ sa mesa.', 1],
    ['%Nagdala# si &$name1= ng *$number $item+.', 1],
    ['%Naglinis# si &Mang $boy= ng *$number kotse+.', 1],
    ['%Nagpinta# si &$name1= ng *$number larawan+.', 1],
    ['%Nakahuli# si &Mang $boy= ng *$number hito+.', 1],
    ['Si &$name1= ay %nakakita# ng *$number ibon+.', 1],
    ['Si &$name1= ang %gumamit# ng *bolpen+.', 1],
    ['Si &$name1= ang %bumuhat# ng *kahon+.', 1],
],
2 => [
    ['Si &$name1= ay bumili ng *$fruit+ %kanina#.', 2],
    ['Ang &mga bata= ay naglaro ng *bola+ %sa labas#.', 2],
    ['Naglako si &$name1= ng *$fruit+ %sa bayan#.', 2],
    ['%Nagbayad# na si &$name1= ng *$number piso+.', 2],
    ['%Naghulog# si &$name1= ng *sulat+ doon.', 2],
    ['%Nagtinda# dati si &$name1= ng *$item+.', 2],
    ['%Nagluto# si &Aling $girl= ng *$food+.', 2],
    ['%Naghain# &siya= ng *$food+ sa mesa.', 2],
    ['%Nagdala# si &$name1= ng *$number $item+.', 2],
    ['%Naglinis# si &Mang $boy= ng *$number kotse+.', 2],
    ['%Nagpinta# si &$name1= ng *$number larawan+.', 2],
    ['%Nakahuli# si &Mang $boy= ng *$number hito+.', 2],
    ['Si &$name1= ay %nakakita# ng *$number ibon+.', 2],
    ['Si &$name1= ang %gumamit# ng *bolpen+.', 2],
    ['Si &$name1= ang %bumuhat# ng *kahon+.', 2],
],
3 => [
    ['Si %$name2# ay binigyan ni &$name1= ng *$fruit+ kahapon.', 3],
    ['Si %$name2# ay pinadalhan ni &$name1= ng *mga $item+.', 3],
    ['Si &Aling $girl= ang naghatid ng *$food+ kay %$name2#.', 3],
    ['Pinadalhan ni &$name1= ng *$food+ si %$name2# noong $araw.', 3],
    ['Binigyan ni &$name1= ng *$item+ si %$name2# kahapon.', 3],
    ['Binilhan ni &Mang $boy= ng *regalo+ si %Aling $girl#.', 3],
    ['Si %$name2# ay binigyan ni &$name1= ng *$item+ kagabi.', 3],
    ['Si %$name2# ay pinabaunan ni &$name1= ng *$number piso+.', 3],
    ['Pinahiram &niya= %ako# ng *$item+ noong $araw.', 3],
    ['Ipinanghuli ni &$name1= si %$name2# ng *$number hito+.', 3],
    ['Nagdala si &$name1= ng *$number $item+ kay %$name2#.', 3],
    ['Niregaluhan ni &$girl= ng *isang aklat+ si %$boy#.', 3],
    ['Nagpadala si &$boy= ng *sari-saring kendi+ kay %$girl#.', 3],
    ['Nagbayad daw si &$name1= ng *$number piso+ kay %$girl#.', 3],
    ['Binibigyan &niya= %ako# ng *$food+ tuwing $araw.', 3],
],
4 => [
    ['Binilhan ni &Mang $boy= ng *mga $item+ si %Aling $girl# noong $araw.', 4],
    ['Niregaluhan ni &Mang $boy= ng *mamahaling kotse+ si %Aling $girl#.', 4],
    ['Si %$name2# ay binilhan ni &$name1= ng *sari-saring gamit+.', 4],
    ['Pinahiram &niya= ulit %ako# ng *$item+ nitong nakaraang linggo.', 4],
    ['Si %$name2# ay pinahiram ni &$name1= ng *$item+ noong $araw.', 4],
    ['Magpapadala raw si &$name1= ng *$item+ kay %$name2# bukas nang umaga.', 4],
    ['Nagregalo &kami= kay %$name1# ng *laruan+ noong kaarawan niya.', 4],
    ['Binibigyan &niya= %ako# ng *$food+ tuwing kami ay nagkikita.', 4],
    ['Ipinadala na ni &$name1= ang *$number aklat+ sa %mga bata#.', 4],
    ['Nagpaabot si &$name1= ng *isang mungkahi+ kay %Mayor Santos#.', 4],
    ['Nagbigay si &$name1= ng *$number libong piso+ kay %$name2#.', 4],
    ['Dinadalhan &niya= %ako# ng *pasalubong+ tuwing siya ay dumadalaw.', 4],
    ['Binasa ni &Aling $girl= sa %mga kabataan# ang *Banal na Bibliya+.', 4],
    ['Ipinaalam na sa %amin# ng &aming amo= ang *kanyang desisyon+.', 4],
    ['Luhaang ipinaliwanag ni &$boy= kay %$girl# ang *buong pangyayari+.', 4],
],
5 => [
    ['Binayaran ni &$name1= ng *limandaang piso+ si %$name2# noong $araw.', 5],
    ['Nag-alok si &$name1= ng *bagong produkto+ kay %$name2# noong $buwan.', 5],
    ['Naghandog si &Prinsipe $boy= ng *maraming pagkain+ sa %mahal na hari#.', 5],
    ['Ipinamingwit ni &Mang $boy= ang %mga bisita# ng *sari-saring isda+.', 5],
    ['Si %$name2# ay pahihiramin ni &$name1= ng *$item+ sa darating na $araw.', 5],
    ['Pinahiram ni &$name1= si %$name2# ng *magandang $item+ noong $buwan.', 5],
    ['Si %$name2# ay pahihiramin ni &$name1= ng *mga $item+ sa darating na $araw.', 5],
    ['Magpapadala ng *tulong+ si &$name1= kay %$name2# sa lalong madaling panahon.', 5],
    ['Dinadalhan &niya= %ako# ng *bagong lutong $food+ tuwing siya ay dumadalaw.', 5],
    ['Nangako si &$name1= sa %kanyang mga pamangkin# ng *mga gamit sa pag-aaral+.', 5],
    ['Nagpaabot si &$name1= ng *isang malugod na pagbati+ sa %nanalong konsehal#.', 5],
    ['Nagbigay si &$name1= ng *malaking puhunan+ kay %$name2# para sa bagong negosyo.', 5],
],
6 => [
    ['Binilhan ni &Mang $boy= ng *mga $item+ si %Aling $girl# nang lumuwas siya sa Maynila.', 6],
    ['Inalok na ni &$boy= ng *kasal+ si %$girl# nang makaipon siya ng sapat na pera.', 6],
    ['Binibigyan ni &Mang $boy= ng *mamahaling regalo+ si %Aling $girl# tuwing Pasko.', 6],
    ['Nagregalo kay %$name1# ng *mamahaling relo+ ang &mga kaibigan niya= sa $province.', 6],
    ['Nagpadala kay %$name1# ng *mga damit at pabango+ ang &kanyang kaibigan= sa Paris.', 6],
    ['Pinahiram ni &$name1= si %$name2# ng *kaunting halaga+ para makabili siya ng $item.', 6],
    ['Nagpaabot si &$name1= ng *isang madamdaming pasasalamat+ sa %mga taong tumulong sa kanya#.', 6],
    ['Ipinanguha ni &Mang $boy= ng *sari-saring gulay at prutas+ ang %kanilang mga bisita#.', 6],
    ['Ipinaghanda %sila# ni &Mang $boy= ng *isang engrandeng hapunan+ noong umuwi sila sa lalawigan.', 6],
    ['Dinadalhan ni &$name1= ang %kanyang mga kapatid# ng *pasalubong na $food2+ tuwing siya ay dumadalaw.', 6],
    ['Nangako si &Propesor $boy Santos= sa %kanyang mga estudyante# ng *mga araling kapana-panabik+.', 6],
    ['Babayaran na sana ni &$name1= ng *mataas na halaga+ si %$name2# kung nagkasundo sila sa kontrata.', 6],
    ['Inabutan ni &$name1= si %$name2# ng *isang panungkit+ upang makapamitas siya ng bayabas.', 6],
    ['Ipinamili %sila# ni &Aling $girl= ng *mga sapatos na yari sa balat+ noong nakaraang buwan.', 6],
    ['Pinagsabihan ni &Mang $boy= si %Aling $girl# ng *masasakit na salita+ kaya hindi na sila nag-iimikan.', 6],
],
];
$banks = [$tier => []];
foreach ($tiers as $t) foreach ($sourceBanks[$t] as $entry) $banks[$tier][] = $entry;
function lay_question(array $entry, string $tier, string $lvl): array {
$names=array(
"Adam", "Adrian", "Alex", "Andrew", "Angelo", "Carlos", "Carson", "Chris", "Daniel", "David", "Diego", "Domeng", "Elijah", "Ethan", "Gabriel", "Hayden", 
"Ian", "Isaac", "Isaiah", "Jack", "Jacob", "James", "Jason", "Jose", "John", "Jonathan", "Joseph", "Joshua", "Juan", "Julian", "Justin", "Kevin", "Lucas", 
"Luis", "Luke", "Matthew", "Max", "Michael", "Nathan", "Noah", "Oliver", "Robert", "Ryan", "Samuel", "Tristan", "William",
"Alyssa", "Amelia", "Andrea", "Anna", "Bella", "Chloe", "Claire", "Eliza", "Emma", "Eva", "Evelyn", "Gabriela", "Grace", "Hannah", "Isabel", "Jasmine", 
"Jocelyn", "Jolina", "Julia", "Kylie", "Lauren", "Layla", "Leah", "Lillian", "Lydia", "Maria", "Melanie", "Mia", "Naomi", "Olivia", "Sarah", "Sophia", 
"Stella", "Tina", "Victoria"
);
$namecount=count($names)-1;
$name1=$names[array_rand($names)];
do {$name2=$names[array_rand($names)];} while ($name1===$name2); 


$boys=array("Alex", "Ben", "Carlos", "Daniel", "Diego", "Gabriel", "Isaac", "Jaime", "Jose", "Juan", "Jonathan", "Lucas", "Luis", "Max", "Roberto", "Samuel", "Tomas",);
$namecount=count($boys)-1;
$boy=$boys[(rand(0,$namecount))]; 


$girls=array("Annie", "Betty", "Caring", "Elisa", "Emma", "Eva", "Evelyn", "Grace", "Josie", "Julie", "Katring", "Laura", "Lydia", "Maring", "Olive", "Tina", "Toyang");
$namecount=count($girls)-1;
$girl=$girls[(rand(0,$namecount))]; 



$items=array(
"aklat","basahan","baso","kaldero","kawali","kulambo","lapis","maleta","martilyo","palanggana","pamaypay","payong","platito","tasa"
);
$item=$items[(rand(0,(count($items)-1)))]; 
$itemb=$item." na"; 
if (substr($item,-1)=="a" or substr($item,-1)=="e" or substr($item,-1)=="i" or substr($item,-1)=="o" or substr($item,-1)=="u"){$itemb=$item."ng";}
if (substr($item,-1)=="n"){$itemb=$item."g";}

$places=array(
"aplaya","bahay","bukid","hardin","palengke","simbahan","paaralan","palaisdaan","palaruan",
);
$place=$places[(rand(0,(count($places)-1)))]; 


$araws=array("Lunes","Martes","Miyerkules","Huwebes","Biyernes","Sabado","Linggo");
$araw=$araws[(rand(0,(count($araws)-1)))]; 

$buwans=array("Enero","Pebrero","Marso","Abril","Mayo","Hunyo","Hulyo","Agosto","Setyembre","Oktubre","Nobyembre","Disyembre");
$buwan=$buwans[(rand(0,(count($buwans)-1)))]; 

$provinces=array("Laguna","Cavite","Pampanga","Pangasinan","La Union","Batanes","Palawan","Batangas");
$province=$provinces[(rand(0,(count($provinces)-1)))]; 

$fruits=array("atis","bayabas","duhat","langka","lansones","mangga","papaya","saging","santol",);
$fruit=$fruits[(rand(0,(count($fruits)-1)))]; 

$foods=array("kare-kare","pansit","litson","menudo","adobo","sinigang");
$food=$foods[(rand(0,(count($foods)-1)))]; 

$food2s=array("keyk","kakanin","kendi","sitsirya","kornik","tinapay");
$food2=$food2s[(rand(0,(count($food2s)-1)))]; 

$numbers=array("dalawang","tatlong","limang","anim na","pitong","walong","siyam na","sampung",);
$number=$numbers[(rand(0,(count($numbers)-1)))]; 

$games=array("taguan","habulan","piko","trumpo",);
$game=$games[(rand(0,(count($games)-1)))]; 




$sentence = strtr($entry[0], ['$name1'=>$name1,'$name2'=>$name2,'$boy'=>$boy,'$girl'=>$girl,'$item'=>$item,'$fruit'=>$fruit,'$food'=>$food,'$food2'=>$food2,'$number'=>$number,'$araw'=>$araw,'$buwan'=>$buwan,'$province'=>$province]);
preg_match('/&([^=]+)=/', $sentence, $a);
preg_match('/\*([^+]+)\+/', $sentence, $b);
preg_match('/%([^#]+)#/', $sentence, $c);
$choices = [$a[1], $b[1], $c[1]];
$indirect = $entry[1] > 2 && random_int(0,1) === 1;
$correct = $indirect ? $c[1] : $b[1];
$qword = $entry[1] <= 2 ? 'layon' : ($indirect ? 'di-tuwirang layon' : 'tuwirang layon');
shuffle($choices);
return ['word'=>lay_h(str_replace(['&','=','*','+','%','#'], '', $sentence)), 'correct'=>$correct,'choices'=>$choices,'qword'=>$qword,'tier'=>$tier,'lvl'=>$lvl,'qid'=>bin2hex(random_bytes(16))];
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
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
            <?php echo $cur['word']; ?>
        </span>
    </div>
    <div style="text-align:center;max-width:450px;margin:20px auto;color:#800080;font-size:16pt;">
        <strong><?php echo lay_h(ucfirst($cur['qword'])); ?>: <span style="color:#CC0066;"><?php echo lay_h($cur['correct']); ?></span></strong>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:450px;padding:24px 30px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:700;color:#800080;line-height:1.5;text-wrap:balance;overflow-wrap:anywhere;">
        <?php echo $cur['word']; ?>
    </span>
</div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:40px auto;max-width:450px;">Alin sa mga sumusunod ang <span style="color:#CC0066;"><?php echo lay_h($cur['qword']); ?></span> ng pandiwa sa pangungusap?</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = 1;
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
