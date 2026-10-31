<?php
// english/modules/nouns-gender.php
// Genders of Nouns — 5 vocabulary tiers; 2 or 4 choice buttons by (level, grade).
// Grade sourced from $_SESSION['user_grade'] (0-10), same as english-menu.php.

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
$moduleTitle = 'Genders of Nouns';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade resolution ------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ---- Level resolution ------------------------------------------------------
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard'; // legacy migrate
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Vocabulary tiers (1-5, from legacy) -----------------------------------
$nounsByTier = [
    1 => [
        'masculine' => ["boy","boar","brother","bull","cock","father","godfather","grandfather","husband","king","lad","man","men","nephew","postman","priest","prince","ram","sir","son","uncle","waiter"],
        'feminine'  => ["aunt","cow","daughter","doe","duck","girl","godmother","grandmother","hen","lady","lass","madam","mother","niece","nun","princess","queen","sister","sow","waitress","wife","woman","women"],
        'common'    => [],
        'neuter'    => [],
    ],
    2 => [
        'masculine' => ["actor","boar","buck","bull","cock","colt","count","drake","duke","father-in-law","gentleman","godfather","grandfather","groom","hero","host","husband","lad","landlord","lion","mayor","nephew","postman","priest","prince","ram","shepherd","sire","son-in-law","stag","stepfather","stepson","sultan","tiger","uncle","waiter"],
        'feminine'  => ["actress","aunt","bride","countess","cow","daughter","daughter-in-law","doe","duchess","duck","ewe","filly","girl","goddess","goose","grandmother","hen","heroine","hostess","lady","landlady","lass","lioness","madam","mare","mother","mother-in-law","niece","nun","postwoman","priestess","princess","queen","sister","sow","stepdaughter","stepmother","tigress","waitress","widow","wife","witch","woman","women"],
        'common'    => ["artist","baby","bird","child","clown","deer","dentist","doctor","farmer","friend","horse","human","leader","lover","neighbor","officer","parent","partner","person","pilot","rider","ruler","teacher","visitor","worker","writer"],
        'neuter'    => ["anger","balloon","basket","battery","bedroom","bicycle","birthday","bubble","bucket","building","butter","camera","castle","cloth","coffee","country","cracker","diaper","diary","dinner","eraser","faucet","feather","holiday","kingdom","library","lumber","mallet","machine","marble","mitten","month","music","napkin","mountain","needle","notebook","oatmeal","ocean","pancake","pillow","poem","popcorn","rake","ranch","sadness","sailboat","saucer","scissors","slipper","sweater","tales","throne","toothbrush","toothpaste","tractor","trail","trick","trunk","umbrella","wallet","winter"],
    ],
    3 => [
        'masculine' => ["actor","bachelor","baron","beau","boar","buck","bull","cock","colt","count","drake","duke","earl","emperor","friar","gander","gentleman","godfather","groom","heir","hero","host","husband","king","lad","landlord","lion","mayor","monk","nephew","postman","priest","prince","ram","shepherd","sire","son-in-law","stag","stallion","steer","stepfather","stepson","sultan","stuntman","tiger","tutor","uncle","waiter"],
        'feminine'  => ["actress","baroness","belle","bride","countess","daughter-in-law","duchess","empress","ewe","filly","giantess","goddess","goose","governess","headmistress","heiress","heroine","hostess","landlady","lioness","maidservant","mare","mayoress","mother-in-law","postwoman","priestess","shepherdess","songstress","stepdaughter","stepmother","stewardess","sultana","tigress","widow","witch"],
        'common'    => ["acrobat","artist","beggar","beginner","cattle","character","clown","criminal","customer","dean","deer","dentist","doctor","farmer","icon","judge","juggler","juror","laborer","lawyer","leader","life guard","lover","merchant","miner","minor","neighbor","officer","offspring","passenger","pilot","rancher","rider","secretary","senator","sibling","slave","stepchild","stranger","teller","tourist","victor","villain"],
        'neuter'    => ["airplane","airport","appliance","afternoon","arithmetic","basketball","beliefs","breakfast","bubblegum","calculator","calendar","cemetery","discovery","earthquake","eclipse","eyeglasses","freezer","furniture","hobbies","hydrant","income","instrument","memory","mystery","nursery","photograph","playground","pleasure","quicksand","restaurant","riddle","rosary","salary","station","steeple","suitcase","sunglasses","telephone","television","thoughts","triangle","vacation","volcano","volleyball","voyage","weather","wrench"],
    ],
    4 => [
        'masculine' => ["abbot","bachelor","baron","beau","bridegroom","conductor","czar","earl","emperor","fiance","friar","gander","headmaster","heir","manservant","masseur","monk","postmaster","sorcerer","stallion","steer","steward","stuntman","tutor","widower","wizard"],
        'feminine'  => ["alumna","baroness","belle","empress","chambermaid","conductress","directress","fiancee","governess","headmistress","heiress","instructress","maidservant","masseuse","mayoress","postmistress","shepherdess","sorceress","spinster","stewardess","sultana"],
        'common'    => ["acrobat","bartender","beggar","beginner","cattle","character","criminal","customer","dean","designer","editor","educator","engineer","European","journalist","judge","juggler","juror","laborer","lawyer","lecturer","life guard","merchant","miner","minor","missionary","offspring","passenger","physician","rancher","researcher","secretary","senator","sibling","slave","stepchild","stranger","teller","tourist","undertaker","victor","villain","yodeler","youngster","zoologist"],
        'neuter'    => ["activity","amusement","apparel","appearance","appendix","artifact","assembly","assignment","aviary","boundary","century","clearance","conceit","consideration","contents","deception","delivery","demise","demolition","denial","description","destiny","digestion","dilemma","distress","ecstasy","education","enclosure","enigma","freshener","friction","knowledge","language","nostalgia","nuisance","plantation","pollution","presentation","prevention","reflection","refreshment","refrigerator","refusal","relief","reputation","retrieval","scaffold","sweetener","territory","vanity","wilderness"],
    ],
    5 => [
        'masculine' => ["abbot","alumnus","archduke","bridegroom","bullock","deacon","enchanter","fiance","gaffer","hart","headmaster","instructor","manservant","marquis","masseur","monsieur","sorcerer","steward","widower","wizard"],
        'feminine'  => ["abbess","administratrix","alumna","arbitress","archduchess","archeress","authoress","brach","czarina","deaconess","enchantress","fiancee","gammer","heifer","hind","instructress","marchioness","masseuse","murderess","prioress","prophetess","sorceress","spinster","tutoress"],
        'common'    => ["anthropologist","apprentice","atheist","attendant","bartender","connoisseur","designer","editor","educator","engineer","entrepreneur","equestrian","journalist","kleptomaniac","lecturer","life guard","missionary","narcissist","pharmacist","physician","raconteur","rallyist","researcher","restaurateur","saboteur","subscriber","therapist","transcriber","zealot","zoologist"],
        'neuter'    => ["acquittal","acumen","aftermath","allotment","amendment","appendix","archaeology","caprice","chauvinism","commitment","compressor","connection","condenser","consistency","distillery","embodiment","evaporator","hubris","ignition","impeachment","legitimacy","lingerie","maelstrom","mausoleum","meringue","millennium","mystique","naivete","nuance","paranoia","paraphernalia","parliament","philosophy","plagiarism","pneumonia","prescription","prerogative","pseudonym","quandary","receptacle","recurrence","repertoire","requiem","seismology","subterfuge","surveillance","sovereignity","transcript","treason","vaudeville","vengeance","veracity","verbiage","vinaigrette","visualization"],
    ],
];

// ---- (level, grade) -> tier mapping ----------------------------------------
function resolve_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 2) return 1;
        if ($grd <= 5) return 2;
        return 3;
    }
    // Hard = the harder of the legacy Medium/Hard paths for that grade band
    if ($grd <= 2) return 3;
    if ($grd <= 5) return 4;
    return 5;
}

// ---- Tier -> which buttons appear (only tier 1 uses 2 choices) -------------
function gender_choices_for_tier(int $tier): array {
    return ($tier === 1)
        ? ['masculine', 'feminine']
        : ['masculine', 'feminine', 'common', 'neuter'];
}

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $tier    = resolve_tier($lvl, $grd);
    $genders = gender_choices_for_tier($tier);
    $pool    = $nounsByTier[$tier];

    $candidates = [];
    foreach ($genders as $g) {
        foreach ($pool[$g] as $i => $noun) {
            $candidates[] = ['noun' => $noun, 'answer' => $g, 'key' => "t$tier:$g:$i"];
        }
    }

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($candidates, fn($c) => !in_array($c['key'], $used, true)));
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        $available = $candidates;
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 600) $used = array_slice($used, -400);
    $_SESSION[$sessionKey]['used'] = $used;

    $_SESSION[$sessionKey]['current'] = [
        'noun'    => $pick['noun'],
        'answer'  => $pick['answer'],
        'choices' => $genders,
        'lvl'     => $lvl,
        'tier'    => $tier,
        'grd'     => $grd,
    ];
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
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;">Your answer is <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.</p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;color:#800080;"><br/>The gender of this noun is '<strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>'.</p>
  <div style="margin:30px auto;display:inline-block;padding:25px 60px;background:#FFFBCC;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:26pt;font-weight:700;color:#333333;"><?php echo htmlspecialchars($cur['noun']); ?></div>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else: $q = $_SESSION[$sessionKey]['current']; ?>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:600;color:#800080;margin:30px 0 20px;">What is the gender of this noun?</p>
  <div style="margin:0 auto 30px;display:inline-block;padding:25px 60px;background:#FFFBCC;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:26pt;font-weight:700;color:#333333;"><?php echo htmlspecialchars($q['noun']); ?></div>
  <div style="font-family:Arial,sans-serif;font-size:14pt;font-weight:600;color:#800080;margin-bottom:20px;">Click on your answer.</div>  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $g): ?>
      <td align="center" width="50%">
        <a href="?ansclick=<?php echo urlencode($g); ?>"
           style="display:block;min-width:150px;padding:16px 28px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;">
          <?php echo htmlspecialchars($g); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>