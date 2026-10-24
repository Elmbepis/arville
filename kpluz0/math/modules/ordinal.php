<?php
// math/modules/ordinal.php
// Computed free-text, single input. Ordinal numbers.

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

$moduleTitle = 'Ordinal Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

$arrnum = ($lvl === 'Easy') ? $grdKey : min(5, $grdKey + 2);
$arrnum = min(5, $arrnum);

// ---- Helpers ----
function ordinalWord($n) {
    $n = (int)$n;
    $direct = [
        1=>'first',2=>'second',3=>'third',4=>'fourth',5=>'fifth',
        6=>'sixth',7=>'seventh',8=>'eighth',9=>'ninth',10=>'tenth',
        11=>'eleventh',12=>'twelfth',13=>'thirteenth',14=>'fourteenth',15=>'fifteenth',
        16=>'sixteenth',17=>'seventeenth',18=>'eighteenth',19=>'nineteenth',20=>'twentieth',
        30=>'thirtieth',40=>'fortieth',50=>'fiftieth',60=>'sixtieth',
        70=>'seventieth',80=>'eightieth',90=>'ninetieth'
    ];
    if (isset($direct[$n])) return $direct[$n];
    $tens  = (int)($n / 10) * 10;
    $ones  = $n % 10;
    $pre   = [20=>'twenty',30=>'thirty',40=>'forty',50=>'fifty',60=>'sixty',70=>'seventy',80=>'eighty',90=>'ninety'];
    $suf   = [1=>'first',2=>'second',3=>'third',4=>'fourth',5=>'fifth',6=>'sixth',7=>'seventh',8=>'eighth',9=>'ninth'];
    if (!isset($pre[$tens]) || !isset($suf[$ones])) return (string)$n;
    return $pre[$tens] . '-' . $suf[$ones];
}

// Strip ALL whitespace (regular, tab, newline, NBSP, figure space, narrow NBSP)
function stripAllWhitespace($s) {
    return preg_replace('/[\s\x{00A0}\x{2007}\x{202F}]+/u', '', (string)$s);
}

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $postans = strtolower(trim((string)($_POST['answer'] ?? '')));
    // Strip ALL whitespace from answer too (in case student pasted spaces)
    $postansClean = stripAllWhitespace($postans);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($postansClean, $cur['ans'], $cur['lvl']);

    $result = [
        'correct'  => $isCorrect,
        'student'  => $postans,
        'ans'      => $cur['ans'],
        'form'     => $cur['form'],
        'chosen'   => $cur['chosenPhrase'] ?? '',
        'qphrase0' => $cur['qphrase0'] ?? '',
        'ordnum0'  => $cur['ordnum0'],
        'ordnum1'  => $cur['ordnum1'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $words  = [];
    $words2 = [];

    if ($arrnum < 3) {
        $words[0]  = ["a box of", "a basket of", "likes", "has some", "gave them"];
        $words2[0] = ["red balls", "small dolls", "big books", "toy cars", "toy trucks", "blue pens", "sweet candies", "toy robots", "white shirts", "black shoes"];
        $words[1]  = ["saw some", "is afraid of", "fed the", "watched the"];
        $words2[1] = ["snakes", "lions", "zebras", "monkeys", "tigers", "spiders", "birds", "bears", "turtles", "foxes", "lizards"];
        $words[2]  = ["talked to", "worked with", "will meet some", "a party for", "met some"];
        $words2[2] = ["lawyers", "teachers", "doctors", "nurses", "mayors", "actors", "priests", "soldiers", "writers", "singers", "cooks", "traders", "artists", "bakers", "drivers"];
        $words[3]  = ["ate lots of", "a plate of", "cooked some", "will buy", "wants some"];
        $words2[3] = ["bread", "chicken", "pork", "salad", "fish", "duck", "corn", "beef"];
    } else {
        $words[0]  = ["a large box of", "a big basket of", "is collecting", "got a gift of", "showed me some"];
        $words2[0] = ["bouncy balls", "walking dolls", "thick books", "action figures", "magic pencils", "toy tractors", "large crayons", "colorful pens", "sweet candies", "sports cards", "magazines", "plastic robots", "fancy shirts", "cool sneakers"];
        $words[1]  = ["is taking care of some", "will be really afraid of", "inside a cage full of", "was watching a bunch of", "in the zoo with lots of"];
        $words2[1] = ["crocodiles", "snakes", "lions", "zebras", "alligators", "giraffes", "monkeys", "iguanas", "tigers", "elephants", "birds", "bears", "turtles", "wild pigs", "wolves"];
        $words[2]  = ["talking to a lot of", "working hard with many", "will meet a group of", "party for a bunch of", "got a big surprise from"];
        $words2[2] = ["lawyers", "teachers", "doctors", "nurses", "mayors", "actors", "priests", "soldiers", "writers", "singers", "cooks", "traders", "artists", "bakers", "drivers"];
        $words[3]  = ["eating lots of", "a plate of", "shared some", "satisfied with", "will cook some"];
        $words2[3] = ["toasted bread", "fried chicken", "baked macaroni", "vegetable soup", "chocolate cake", "spaghetti", "fruit salad", "grilled fish", "roasted duck", "sweet corn", "crispy shrimps", "tender ribs", "chewy cookies", "cold drinks", "juicy steak"];
        $words[4]  = ["am really fond of", "would like to see", "great moments with", "thankful for", "might find some"];
        $words2[4] = ["red roses", "wooden toys", "coloring books", "cute puppies", "big goldfish", "nice paintings", "butterflies", "lollipops", "old photos", "greeting cards", "great movies", "sweet songs", "rare stamps", "little kittens", "ice cream"];
    }

    $form = 1;
    if ($arrnum == 2) $form = rand(1, 2);
    if ($arrnum >= 3) $form = rand(1, 3);

    $gnum   = count($words) - 1;
    $qnum   = [];
    $qnum[1] = rand(0, $gnum);
    do { $qnum[2] = rand(0, $gnum); } while ($qnum[2] == $qnum[1]);
    do { $qnum[3] = rand(0, $gnum); } while ($qnum[3] == $qnum[1] || $qnum[3] == $qnum[2]);

    // Build phrases WITHOUT double spaces — use single space between words
    $phrases = [];
    for ($i = 1; $i <= 3; $i++) {
        $j = rand(0, count($words[$qnum[$i]]) - 1);
        $k = rand(0, count($words2[$qnum[$i]]) - 1);
        do { $m = rand(0, count($words2[$qnum[$i]]) - 1); } while ($m == $k);
        $phrases[$i] = $words[$qnum[$i]][$j] . ' ' . $words2[$qnum[$i]][$k] . ' and ' . $words2[$qnum[$i]][$m];
    }

    $ordnum2raw = rand(1, 3);
    $qphrase    = $phrases[$ordnum2raw];
    $ordnum2    = ($ordnum2raw == 1) ? 'first' : (($ordnum2raw == 2) ? 'second' : 'third');

    // Compute lim from actual letter count of the full phrase
    $qphraseLettersOnly = stripAllWhitespace($qphrase);
    $letterCount        = mb_strlen($qphraseLettersOnly, 'UTF-8');

    if ($form == 3) {
        // For form 3, we don't use qphrase — lim is a raw number limit
        if ($arrnum < 2) $lim = 30;
        elseif ($arrnum == 2) $lim = 65;
        else $lim = 99;
    } else {
        // For forms 1 & 2, lim must be within actual letter count
        $lim = max(3, $letterCount - 3);
        if ($arrnum == 0 && $lim > 20) $lim = 20;
    }

    $ordnum0 = ($arrnum < 3) ? rand(3, $lim) : rand(11, $lim);
    // Clamp
    if ($ordnum0 > $lim) $ordnum0 = $lim;
    $ordnum1 = ordinalWord($ordnum0);

    $ans = ''; $qphrase0 = ''; $question = '';

    if ($form == 1) {
        $phrase = $phrases[$ordnum2raw];
        $phraseNoSpace = stripAllWhitespace($phrase);
        // Final safety clamp
        $letterCount = mb_strlen($phraseNoSpace, 'UTF-8');
        if ($ordnum0 > $letterCount) {
            $ordnum0 = $letterCount;
            $ordnum1 = ordinalWord($ordnum0);
        }
        $ans = mb_substr($phraseNoSpace, $ordnum0 - 1, 1, 'UTF-8');
        $question = "What is the <strong>$ordnum1</strong> letter in the <strong>$ordnum2</strong> phrase below?";
    } elseif ($form == 2) {
        $ans = $ordnum1;
        $charPos = 0; $redIdx = -1;
        $phraseLen = mb_strlen($qphrase, 'UTF-8');
        for ($i = 0; $i < $phraseLen; $i++) {
            $ch = mb_substr($qphrase, $i, 1, 'UTF-8');
            if (preg_match('/[\s\x{00A0}\x{2007}\x{202F}]/u', $ch)) continue;
            $charPos++;
            if ($charPos === $ordnum0) { $redIdx = $i; break; }
        }
        if ($redIdx >= 0) {
            $qphrase0 = htmlspecialchars(mb_substr($qphrase, 0, $redIdx, 'UTF-8'), ENT_QUOTES, 'UTF-8')
                      . '<span style="color:#CC0066;font-weight:700;">'
                      . htmlspecialchars(mb_substr($qphrase, $redIdx, 1, 'UTF-8'), ENT_QUOTES, 'UTF-8')
                      . '</span>'
                      . htmlspecialchars(mb_substr($qphrase, $redIdx + 1, null, 'UTF-8'), ENT_QUOTES, 'UTF-8');
        }
        $question = "The red letter in the phrase below is the ____ letter of that phrase.";
    } else {
        $ans = $ordnum1;
        $question = "Write the ordinal number for <strong>$ordnum0</strong>.";
    }

    $_SESSION[$sessionKey]['current'] = [
        'ans'          => $ans,
        'form'         => $form,
        'phrases'      => $phrases,
        'chosenPhrase' => $phrases[$ordnum2raw],
        'qphrase0'     => $qphrase0,
        'ordnum0'      => $ordnum0,
        'ordnum1'      => $ordnum1,
        'ordnum2'      => $ordnum2,
        'question'     => $question,
        'lvl'          => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-6.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-6.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">Your answer: <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['student']); ?>'</strong></p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
    <?php if ($result['form'] == 1): ?>
        <p class="statement" style="font-size:14pt; color:#800080;">The <strong><?php echo $result['ordnum1']; ?></strong> letter in the phrase '<em><?php echo htmlspecialchars($result['chosen']); ?></em>' is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['ans']); ?>'</strong>.</p>
    <?php elseif ($result['form'] == 2): ?>
        <p class="statement" style="font-size:14pt; color:#800080;">The red letter in the phrase '<?php echo $result['qphrase0']; ?>' is the <strong style="color:#CC0066;"><?php echo htmlspecialchars($result['ans']); ?></strong> letter of that phrase.</p>
    <?php else: ?>
        <p class="statement" style="font-size:14pt; color:#800080;">The ordinal number for <strong><?php echo $result['ordnum0']; ?></strong> is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['ans']); ?>'</strong>.</p>
    <?php endif; ?>
<?php else: ?>
    <?php if ($q_curr['form'] == 1): ?>
        <p class="statement" style="font-size:16pt; font-weight:600; color:#444444; margin-top:24px;">What is the <strong style="color:#CC0066;"><?php echo $q_curr['ordnum1']; ?></strong> letter in the <strong style="color:#CC0066;"><?php echo $q_curr['ordnum2']; ?></strong> phrase below?</p>
        <div style="margin:20px 0; font-size:15pt; font-weight:500; color:#800080; line-height:1.8;">
            <div><?php echo htmlspecialchars($q_curr['phrases'][1]); ?></div>
            <div><?php echo htmlspecialchars($q_curr['phrases'][2]); ?></div>
            <div><?php echo htmlspecialchars($q_curr['phrases'][3]); ?></div>
        </div>
        <p style="font-size:12pt; color:#888; margin:10px 0;">Note: don't count the spaces.</p>
    <?php elseif ($q_curr['form'] == 2): ?>
        <p class="statement" style="font-size:16pt; font-weight:600; color:#444444; margin-top:24px;">The red letter in the following phrase is the <strong style="color:#CC0066;">____ letter</strong> of that phrase.</p>
        <div style="margin:20px 0; font-size:16pt; font-weight:500; color:#800080; line-height:1.6;"><?php echo $q_curr['qphrase0']; ?></div>
        <p style="font-size:12pt; color:#888; margin:10px 0;">Spell out the correct ordinal number.<br>Note: don't count the spaces.</p>
    <?php else: ?>
        <p class="statement" style="font-size:16pt; font-weight:600; color:#444444; margin-top:24px;">Write the ordinal number for <strong style="color:#CC0066; font-size:20pt;"><?php echo $q_curr['ordnum0']; ?></strong>.</p>
        <p style="font-size:12pt; color:#888; margin:10px 0;">Spell out the ordinal number.</p>
    <?php endif; ?>

    <p style="margin:20px 0;"><span style="font-size:15pt; font-weight:700; color:#CC0066;">Answer:&nbsp;&nbsp;</span><?php
        $ansLen = strlen((string)$q_curr['ans']);
        $inputW = max(120, ($ansLen + 3) * 18);
    ?><input type="text" name="answer" size="1" maxlength="<?php echo $ansLen + 3; ?>" style="width:<?php echo $inputW; ?>px; height:44px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC; text-transform:lowercase;" autocomplete="off" autofocus></p>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php endif; ?>

    <?php if ($result !== null): ?>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
    <?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">
                Select difficulty level for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;">
                        <font color="#800080">
                            <input type="radio" name="level" value="<?php echo $l; ?>"
                                <?php echo $lvl === $l ? 'checked' : ''; ?>>
                            <b>&nbsp;<?php echo $l; ?></b>
                        </font>
                    </font>
                </td>
            <?php endforeach; ?>
        </tr></table>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();