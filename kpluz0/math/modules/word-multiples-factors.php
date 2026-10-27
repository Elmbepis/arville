<?php
// math/modules/word-multiples-factors.php
// PROCEDURAL LCM/GCF WORD PROBLEMS + choice. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels:
//   Easy = legacy Easy pool (arrnum=1)
//   Hard = legacy Medium + Hard pools merged (arrnum=2 + 3) — preserves variety
//
// Legacy pools are curated (fixed-list), so merging Medium+Hard avoids dropping
// content; this is a conscious deviation from §E's "drop legacy Hard" guidance,
// appropriate for fixed-pool modules where Hard items are simply "larger numbers".
//
// Theme: wquiz-15-* (75/655/70). Score box: score-*-1.
// DB row required: modules.url = 'word-multiples-factors.php'

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

$moduleTitle = 'Word Problems Involving<br/>Multiples and Factors';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function hl($text) {
    return '<span class="hl-num">' . htmlspecialchars((string)$text) . '</span>';
}

function make_mf_distractors($ans, $candidates, $n = 3) {
    $seen = [(string)(int)$ans => true];
    $out = [];
    $clean = [];
    foreach ($candidates as $c) {
        $c = (int)round($c);
        if ($c > 0) $clean[] = $c;
    }
    $clean = array_values(array_unique($clean));
    shuffle($clean);
    foreach ($clean as $c) {
        if (!isset($seen[(string)$c]) && count($out) < $n) {
            $seen[(string)$c] = true;
            $out[] = $c;
        }
    }
    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            if ($c > 0 && !isset($seen[(string)$c]) && count($out) < $n) {
                $seen[(string)$c] = true;
                $out[] = $c;
            }
        }
        $d++;
    }
    return $out;
}

// Prime factorisation for solution display
function prime_factors_str($n) {
    $out = [];
    $d = 2;
    while ($d * $d <= $n) {
        while ($n % $d === 0) { $out[] = $d; $n /= $d; }
        $d += ($d == 2) ? 1 : 2;
    }
    if ($n > 1) $out[] = $n;
    return implode(' x ', $out);
}

// ============================================================
// LCM/GCF pools (from legacy)
// ============================================================
$lcms = [
    1 => ["2-3+5=30","3-2+6=6","2-3+4=12","7-3+2=42","2-3+8=24","2-5+6=30","2-5+7=70","5-4+3=60","3-4+7=84","3-4+8=24","9-4+3=36","3-5+6=30","3-7+5=105","3-5+8=120","3-5+9=45","4-5+7=140","5-8+4=40","4-5+9=180","9-6+12=36"],
    2 => ["5-3+9=45","5-3+8=120","4-5+7=140","9-5+4=180","5-6+7=210","5-6+8=120","9-7+5=315","7-5+11=385","8-5+9=360","5-8+12=120","12-9+5=180","5-7+14=70","6-9+8=72","6-9+11=198","8-12+10=120"],
    3 => ["7-8+9=504","7-8+10=280","7-8+14=56","9-7+12=252","10-7+12=420","8-9+12=72","8-11+12=264","8-12+14=168","9-11+12=180","9-12+13=468","9-12+15=180","9-12+16=144"],
];
$gcfs = [
    1 => ["108-117+126=9","117-135+144=9","55-121+132=11","24-48+60=12","36-60+108=12","48-72+132=12","52-117+143=13","65-91+130=13","56-112+126=14","84-126+154=14","45-60+75=15","60-105+135=15","48-80+96=16","51-85+102=17","57-133+152=19","76-114+171=19"],
    2 => ["84-112+154=14","98-112+126=14","75-90+120=15","90-120+165=15","90-165+195=15","105-165+180=15","48-112+176=16","80-96+144=16","64-96+112=16","85-102+119=17","102-68+136=17","54-126+144=18","90-108+162=18","175-150+125=25"],
    3 => ["231-126+105=21","147-168+189=21","147-231+105=21","154-66+198=22","88-132+154=22","96-120+168=24","120-144+192=24","96-144+216=24","104-156+182=26","104-130+208=26","108-162+189=27","108-135+216=27","112-140+168=28"],
];

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $boys = ["Alex","Ben","Carlos","Daniel","Diego","Gabriel","Isaac","Jaime","Jose","Juan","Jonathan","Lucas","Luis","Max","Roberto","Samuel","Tomas"];
    $girls = ["Annie","Betty","Caring","Elisa","Emma","Eva","Evelyn","Grace","Josie","Julie","Katring","Laura","Lydia","Maring","Olive","Tina","Toyang"];
    $boy = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];

    $randques = rand(1, 2);  // 1=LCM, 2=GCF

    if ($lvl === 'Easy') { $poolIdx = 1; }
    else {
        // Hard = Medium + Hard merged
        $mergedLcm = array_merge($lcms[2], $lcms[3]);
        $mergedGcf = array_merge($gcfs[2], $gcfs[3]);
    }

    if ($randques == 1) {
        $pool = ($lvl === 'Easy') ? $lcms[1] : $mergedLcm;
        $entry = $pool[array_rand($pool)];
        $p1 = strpos($entry, '-'); $p2 = strpos($entry, '+'); $p3 = strpos($entry, '=');
        $a = (int)substr($entry, 0, $p1);
        $b = (int)substr($entry, $p1 + 1, $p2 - $p1 - 1);
        $c = (int)substr($entry, $p2 + 1, $p3 - $p2 - 1);
        $ans = (int)substr($entry, $p3 + 1);
    } else {
        $pool = ($lvl === 'Easy') ? $gcfs[1] : $mergedGcf;
        $entry = $pool[array_rand($pool)];
        $p1 = strpos($entry, '-'); $p2 = strpos($entry, '+'); $p3 = strpos($entry, '=');
        $a = (int)substr($entry, 0, $p1);
        $b = (int)substr($entry, $p1 + 1, $p2 - $p1 - 1);
        $c = (int)substr($entry, $p2 + 1, $p3 - $p2 - 1);
        $ans = (int)substr($entry, $p3 + 1);
    }

    $fa = prime_factors_str($a);
    $fb = prime_factors_str($b);
    $fc = prime_factors_str($c);

    if ($randques == 1) {
        // LCM template variants
        $actions = [
            ["eats", "ice cream", "cake", "pizza", "ate"],
            ["calls", "boy", "girl", "boy2", "called"],
            ["cooks", "sinigang", "adobo", "tinola", "cooked"],
            ["buys", "soap", "shampoo", "toothpaste", "bought"],
        ];
        $act = $actions[array_rand($actions)];
        $verb1 = $act[0]; $obj1 = $act[1]; $obj2 = $act[2]; $obj3 = $act[3]; $verb2 = $act[4];
        $verb3 = preg_replace('/s$/', '', $verb1);
        if ($obj1 === 'boy') {
            $obj1 = $boy; $obj2 = $girl; $obj3 = "the same friend";
        }
        $prompt = "$girl $verb1 $obj1 every " . hl($a) . " days, $obj2 every " . hl($b) . " days, and $obj3 every " . hl($c) . " days. If she $verb2 all of them today, in how many days will she $verb3 all of them again on the same day?";
        $soln  = "The answer is the least common multiple (LCM) of $a, $b, and $c.<br><br>";
        $soln .= "prime factors of $a: $fa<br>";
        $soln .= "prime factors of $b: $fb<br>";
        $soln .= "prime factors of $c: $fc<br>";
        $soln .= "LCM = product of all prime factors, each used once at its highest power.<br><br>";
        $soln .= "<strong>LCM = $ans</strong><br><br>";
        $soln .= "Thus, $girl $verb1 all of them every <strong>$ans days</strong>.";

        $candidates = [$a * $b * $c, $a + $b + $c, $a, $b, $c, $ans * 2, $ans + 1];
    } else {
        // GCF template variants
        $actions = [
            ["put", "apples", "oranges", "bananas", "fruit", "crate"],
            ["plant", "tomato", "eggplant", "okra plants", "plant", "garden plot"],
            ["display", "figurines", "toys", "trophies", "object", "glass cabinet"],
        ];
        $act = $actions[array_rand($actions)];
        $verb = $act[0]; $o1 = $act[1]; $o2 = $act[2]; $o3 = $act[3]; $product = $act[4]; $container = $act[5];
        $pw = (rand(1, 2) == 1) ? 'wants' : 'plans';
        $prompt = "$girl $pw to $verb " . hl($a) . " $o1, " . hl($b) . " $o2, and " . hl($c) . " $o3 in several {$container}s. If she can only put one type of $product in each $container, and each $container must contain the same number of {$product}s, what is the greatest number of {$product}s that she can put in each $container?";
        $soln  = "The answer is the greatest common factor (GCF) of $a, $b, and $c.<br><br>";
        $soln .= "prime factors of $a: $fa<br>";
        $soln .= "prime factors of $b: $fb<br>";
        $soln .= "prime factors of $c: $fc<br>";
        $soln .= "GCF = product of common factors, each used at its lowest power.<br><br>";
        $soln .= "<strong>GCF = $ans</strong><br><br>";
        $soln .= "Thus, $girl can $verb a maximum of <strong>$ans {$product}s</strong> in each $container.";

        $candidates = [$a * $b * $c, $a + $b + $c, $a, $b, $c, $ans * 2, $ans * 3, $ans + 1];
    }

    $answerStr = (string)(int)$ans;
    $distractors = make_mf_distractors($ans, $candidates, 3);
    $allChoices = array_map(function($c) { return (string)(int)$c; }, array_merge([$ans], $distractors));
    $allChoices = array_values(array_unique($allChoices));
    $d = 1;
    while (count($allChoices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            $c = (int)$c;
            if ($c > 0 && !in_array((string)$c, $allChoices, true)) {
                $allChoices[] = (string)$c;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'prompt'   => $prompt,
        'answer'   => $answerStr,
        'choices'  => $allChoices,
        'solution' => $soln,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/wquiz-15-top.jpg',
    'title_bg'      => $base . '/math/images/images/wquiz-15-top2.jpg',
    'left_side'     => $base . '/math/images/images/wquiz-15-left.jpg',
    'right_side'    => $base . '/math/images/images/wquiz-15-right.jpg',
    'content_bg'    => $base . '/math/images/images/wquiz-15-content.jpg',
    'bottom_banner' => $base . '/math/images/images/wquiz-15-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .hl-num { color:#CC0066; font-weight:700; }
  .choice-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .choice-grid-2x2 > div { display: contents; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.5;">
        <?php echo $cur['prompt']; ?>
    </p>
    <p style="font-size:16pt; color:#800080; margin-top:28px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <div style="background:#f8f8ff; border:1px solid #dcdcf0; border-radius:8px; padding:14px 20px; max-width:500px; margin:20px auto; text-align:left; font-size:13pt; color:#333; line-height:1.7;">
        <strong style="color:#007700;">Solution:</strong><br>
        <?php echo $cur['solution']; ?>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:600; color:#800080; max-width:660px; margin:30px auto; line-height:1.5;">
        <?php echo $q['prompt']; ?>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:10px;">Click on your answer.</p>
    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
        $use2x2 = ($maxLen >= 5 && $maxLen <= 20);
    ?>
    <?php if ($use2x2): ?>
        <div class="choice-grid-2x2">
            <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
        </div>
    <?php else: ?>
        <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    <?php endif; ?>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">Select difficulty level for next question:</font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo $l; ?></b>
                    </font></font>
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