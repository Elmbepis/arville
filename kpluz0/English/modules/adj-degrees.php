<?php
// english/modules/adj-degrees.php
// Degrees of Adjectives — text-input exercise with derived answer checks.
// 6 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleTitle = 'Degrees of Adjectives';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade resolution ------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ---- Level resolution ------------------------------------------------------
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard'; // migrate legacy Medium -> Hard
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Adjective tiers (1-6, from legacy) ------------------------------------
// Style keys: 'r' = +r/+st, 'er' = +er/+est, 'double' = double final + er/est,
//             'y2ier' = -y -> -ier/-iest, 'more' = more/most (also less/least)
$adjsByTier = [
    1 => [
        'r'      => ["blue","brave","fine","large","late","nice","safe","true","white","wide","wise"],
        'er'     => ["bold","calm","cheap","clean","clear","cold","cool","dark","deaf","dear","deep","dull","fair","fast","few","hard","high","kind","long","loud","low","near","neat","new","poor","rich","sick","slow","short","small","smart","soft","tall","warm","weak","wild"],
        'double' => ["dim","fat","fit","hot","mad","red","sad","wet"],
        'y2ier'  => ["angry","bony","bumpy","busy","crazy","curly","dry","easy","funny","deadly","dirty","dusty","early","happy","hairy","holy","heavy","hungry","itchy","jolly","lazy","leafy","lonely","lovely","lucky","merry","messy","muddy","needy","noisy","nosy","nutty","pretty","ready","rocky","rosy","salty","sandy","scary","shiny","silly","sleepy","sunny","tasty","tidy","tiny","ugly","weary","windy","woody"],
        'more'   => ["ahead","alike","alive","awake","eager","loyal","royal","silent","useful","upset","wicked"],
    ],
    2 => [
        'r'      => ["cute","lame","pure","rare","ripe","rude","sure","tame","untrue","unwise"],
        'er'     => ["alert","black","bright","broad","brown","blind","dumb","fresh","full","grand","great","green","light","mean","odd","quick","raw","rough","round","sharp","mild","proud","quiet","soon","sour","strong","sweet","thick","vast","weird","yellow","young"],
        'double' => ["flat","glad","slim","thin"],
        'y2ier'  => ["baggy","bloody","beefy","bossy","brainy","bulky","bushy","chubby","cloudy","clumsy","corny","cozy","daffy","dizzy","drowsy","empty","fancy","foggy","fatty","fishy","friendly","furry","fuzzy","goofy","greedy","handy","hazy","healthy","icy","juicy","jumpy","likely","lively","lumpy","meaty","mighty","moody","nasty","oily","risky","roomy","rusty","showy","silky","skinny","snowy","sorry","spicy","sticky","stony","wacky","wary","waxy","wealthy","witty","wooly","unhappy"],
        'more'   => ["afraid","aware","colorful","crooked","famous","fearful","helpful","rural","selfish","serious","sudden","uneven","useless"],
    ],
    3 => [
        'r'      => ["dense","free","gentle","humble","loose","pale","simple","sore"],
        'er'     => ["brief","clever","cruel","firm","fond","foul","gray","keen","meek","narrow","plain","smooth","sound","steep","tight","tough","unkind"],
        'double' => ["grim","trim"],
        'y2ier'  => ["ashy","breezy","buggy","cheery","cheesy","chewy","chilly","cocky","cranky","creepy","crunchy","cuddly","dandy","filthy","fluffy","foxy","fussy","gassy","godly","grassy","greasy","groovy","grumpy","guilty","gusty","hardy","hasty","hefty","hearty","homely","husky","leaky","lofty","lowly","loony","lousy","misty","moldy","mossy","murky","naughty","nifty","perky","petty","puffy","rowdy","shady","shaky","slimy","smoky","sneaky","soapy","spiky","spiny","steady","stormy","tardy","thirsty","thorny","wordy","worthy","zesty"],
        'more'   => ["adorable","agile","aloof","awful","awesome","bashful","beautiful","bizarre","cautious","cheerful","elite","faithful","familiar","fearsome","graceful","grateful","legal","lethal","magical","modern","nervous","painful","peaceful","pleasant","precious","skillful","special","superb","thankful","tiresome","truthful","unique","unusual","valuable","wasteful"],
    ],
    4 => [
        'r'      => ["fierce","grave","idle","noble","polite","purple","square","stale","strange"],
        'er'     => ["faint","bland","blond","blunt","prompt","queer","sleek","slight","still","stout","strict","straight"],
        'double' => ["hip","snug"],
        'y2ier'  => ["batty","briny","burly","curvy","dewy","dusky","edgy","fiery","flaky","flashy","foamy","giddy","gory","gutsy","grubby","heady","flimsy","gabby","gaudy","gawky","jazzy","lacy","lossy","mucky","mushy","musky","nervy","puny","pushy","racy","raspy","ratty","ritzy","shaggy","shifty","soggy","steamy","sulky","tacky","testy","tinny","touchy","tricky","wiry","zany"],
        'more'   => ["abundant","acceptable","anxious","attractive","available","courageous","delicious","difficult","doubtful","dramatic","elegant","enormous","forgetful","frequent","gigantic","gorgeous","gullible","hardworking","honorable","horrible","important","intelligent","likeable","merciful","numerous","obedient","obese","opposite","periodic","petite","powerful","probable","rabid","regular","righteous","rightful","romantic","tacit","terrible","terrific","thoughtful","tremendous","violent","wonderful","youthful"],
    ],
    5 => [
        'r'      => ["able","ample","crude","dire","feeble","impolite","nimble","remote","sane","spare","sparse","tense"],
        'er'     => ["curious","fleet","frail","frank","stern","stiff","stupid","swift"],
        'double' => ["drab","glum","grum"],
        'y2ier'  => ["balky","balmy","bawdy","beady","blotchy","canny","catty","dingy","gamy","gushy","haughty","hoary","hooky","hoppy","icky","pithy","quaky","ropy","scanty","skimpy","sloppy","smoggy","sooty","springy","stuffy","wily","wrinkly"],
        'more'   => ["accidental","accurate","adventurous","ambitious","arrogant","changeable","confident","conscious","decisive","defective","delicate","delightful","diligent","energetic","excellent","exclusive","expensive","fantastic","fortunate","functional","glamorous","habitual","hospitable","humorous","ignorant","impossible","incredible","innocent","kindhearted","laughable","majestic","marvelous","mysterious","nutritious","parallel","political","productive","protective","quarrelsome","remarkable","respectable","responsible","successful","vigorous"],
    ],
    6 => [
        'r'      => ["astute","coarse","severe","subtle","supple","trite","vague"],
        'er'     => ["shrewd","staunch"],
        'double' => ["glib","prim","squat"],
        'y2ier'  => ["flighty","finicky","nitpicky","prickly","scrawny","stringy","slippery","stealthy","unsightly"],
        'more'   => ["beneficial","efficient","elfin","enthusiastic","extravagant","fabulous","hesitant","hilarious","industrious","knowledgeable","magnificent","observant","panicky","panoramic","questionable","repulsive","scientific","spectacular","unthinkable"],
    ],
];

// ---- (level, grade) -> tier mapping ----------------------------------------
function resolve_adj_tier(string $lvl, int $grd): int {
    if ($grd <= 2)      $band = 1;
    elseif ($grd <= 4)  $band = 2;
    elseif ($grd <= 6)  $band = 3;
    else                $band = 4;
    return ($lvl === 'Easy') ? $band : $band + 2;
}

// ---- Answer derivation -----------------------------------------------------
function derive_adj_answer($adj, $styleKey, $degree) {
    $comp = $sup = $comp2 = $sup2 = '';
    switch ($styleKey) {
        case 'r':      $comp = $adj . 'r';                     $sup = $adj . 'st';                     break;
        case 'er':     $comp = $adj . 'er';                    $sup = $adj . 'est';                    break;
        case 'double': $comp = $adj . substr($adj, -1) . 'er'; $sup = $adj . substr($adj, -1) . 'est'; break;
        case 'y2ier':  $comp = substr($adj, 0, -1) . 'ier';    $sup = substr($adj, 0, -1) . 'iest';    break;
        case 'more':   $comp = 'more ' . $adj;  $sup = 'most ' . $adj;
                       $comp2 = 'less ' . $adj; $sup2 = 'least ' . $adj;                               break;
    }
    if ($degree === 2) {
        return ['adj' => $adj, 'degree' => 'comparative', 'answer' => $comp, 'answer2' => $comp2];
    }
    return ['adj' => $adj, 'degree' => 'superlative', 'answer' => $sup, 'answer2' => $sup2];
}

// ---- Question builder ------------------------------------------------------
function make_adj_question(int $tier, array $pool, string $sessionKey): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $build = function () use ($tier, $pool) {
        $out = [];
        foreach ($pool as $styleKey => $list) {
            foreach ($list as $adj) {
                foreach ([2, 3] as $degree) {
                    $out[] = ['style' => $styleKey, 'adj' => $adj, 'degree' => $degree,
                              'key' => "t$tier:$styleKey:$adj:$degree"];
                }
            }
        }
        return $out;
    };
    $candidates = array_values(array_filter($build(), fn($c) => !in_array($c['key'], $used, true)));
    if (empty($candidates)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        $candidates = $build();
    }
    $pick = $candidates[array_rand($candidates)];
    $used[] = $pick['key'];
    if (count($used) > 800) $used = array_slice($used, -400);
    $_SESSION[$sessionKey]['used'] = $used;
    return derive_adj_answer($pick['adj'], $pick['style'], $pick['degree']);
}

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $userAns = strtolower(trim((string)($_POST['answer'] ?? '')));
    $isCorrect = ($userAns === $cur['answer']) ||
                 ($cur['answer2'] !== '' && $userAns === $cur['answer2']);
    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer($isCorrect ? $cur['answer'] : $userAns, $cur['answer'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'user' => $userAns, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $tier = resolve_adj_tier($lvl, $grd);
    $pool = $adjsByTier[$tier];
    $gen  = make_adj_question($tier, $pool, $sessionKey);
    $_SESSION[$sessionKey]['current'] = array_merge($gen, ['lvl' => $lvl, 'tier' => $tier, 'grd' => $grd]);
    $q = $_SESSION[$sessionKey]['current'];
}

// ---- Render ----------------------------------------------------------------
$theme = [
    'top_banner'=>$base.'/math/images/images/paper-69-top.jpg',
    'title_bg'=>$base.'/math/images/images/paper-69-top2.jpg',
    'left_side'=>$base.'/math/images/images/paper-69-left.jpg',
    'right_side'=>$base.'/math/images/images/paper-69-right.jpg',
    'content_bg'=>$base.'/math/images/images/paper-69-content.jpg',
    'bottom_banner'=>$base.'/math/images/images/paper-69-bottom.jpg',
    'score_top'=>$base.'/math/images/score-top-1.jpg',
    'score_bottom'=>$base.'/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $altNote = '';
    if ($cur['answer2'] !== '') {
        $altNote = " or '<strong style=\"color:#CC0066;\">".htmlspecialchars($cur['answer2'])."</strong>'";
        if (strpos($cur['answer2'], 'le') === 0) {
            $altNote .= ", depending on the context of the sentence";
        }
    }
?>
  <div style="margin:50px auto 30px;display:inline-block;padding:18px 44px;background:#FFFBCC;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:30pt;font-weight:700;color:#0000AA;"><?php echo htmlspecialchars($cur['adj']); ?></div>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:18px;">Your answer is '<strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['user']); ?></strong>'.</p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#800080;"><br/>The simplest acceptable <strong><?php echo $cur['degree']; ?></strong> degree of the adjective<br/>'<strong><?php echo htmlspecialchars($cur['adj']); ?></strong>' is '<strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>'<?php echo $altNote; ?>.</p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;">
<?php else:
    $inputSize = max(strlen($q['answer']), strlen($q['answer2'])) + 5;
    $maxLen    = $inputSize + 2;
?>
  <div style="margin:50px auto 30px;display:inline-block;padding:18px 44px;background:#FFFBCC;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:30pt;font-weight:700;color:#0000AA;"><?php echo htmlspecialchars($q['adj']); ?></div>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:600;color:#800080;margin:20px 0 0;">Write the simplest acceptable <strong style="color:#CC0066;"><?php echo $q['degree']; ?></strong> degree<br/>of this adjective in the blank below.</p>
  <div style="margin:50px 0;">
    <input type="text" name="answer" size="<?php echo $inputSize; ?>" maxlength="<?php echo $maxLen; ?>" value="<?php echo htmlspecialchars($q['adj']); ?>" autocomplete="off" autocapitalize="off" autocorrect="off" style="display:inline-block;text-align:center;height:52px;font-family:Arial,sans-serif;font-size:26px;font-weight:700;text-transform:lowercase;border:2px solid #888888;border-radius:8px;padding:4px 12px;">
  </div>
  <div style="margin:0 0 20px;">
    <input type="submit" name="Submit1" value="Submit" style="margin-right:12px;font-family:Arial,sans-serif;">
    <input type="submit" name="Submit2" value="New Question" style="margin-left:12px;font-family:Arial,sans-serif;">
  </div>
<?php endif; ?>  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>