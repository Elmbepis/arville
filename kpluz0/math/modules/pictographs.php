<?php
// math/modules/pictographs.php
// Text-choice. Pictograph image shown above prompt; student interprets data.
// Single difficulty (Easy). Grade &#8804;1 vs grade >1 use different question pools.
// Bypasses QEngine; uses render_choices.

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

$moduleTitle = 'Interpreting Pictographs';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));
$isEarly = ($grdKey <= 1);

// ============================================================
// HANDLE ANSWER (GET ansclick)
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, $cur['ans'], $lvl);

    $result = [
        'correct'  => $isCorrect,
        'clicked'  => $click,
        'ans'      => $cur['ans'],
        'question' => $cur['question'],
        'picfile'  => $cur['picfile'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Question pools — same as legacy
    if ($isEarly) {
        $questions = [
            'Which fruit did I buy the MOST of and how many of this fruit did I buy?**picto-01.jpg=banana: 5[apple: 4+cherry: 4]banana: 6',
            'Which fruit did I buy the LEAST of and how many of this fruit did I buy?**picto-01.jpg=apple: 3[banana: 5+cherry: 4]apple: 2',
            'How many cherries did I buy?**picto-01.jpg=4[3+5]6',
            'If I ate 2 bananas and 1 apple, how many fruits would I have left?**picto-01.jpg=9[8+7]10',
            'Which street has the MOST children and how many children does it have?**picto-02.jpg=Midway: 7[Marengo: 4+Melrose: 5]Parral: 3',
            'Which street has the LEAST children and how many children does it have?**picto-02.jpg=Rushville: 2[Marengo: 4+Melrose: 5]Parral: 3',
            'How many children in total are in Marengo and Parral Streets?**picto-02.jpg=7[6+5]8',
            'How many MORE children does Midway St. have THAN Melrose St.?**picto-02.jpg=2[3+4]5',
            'How many MORE children does Melrose St. have THAN Rushville St.?**picto-02.jpg=3[2+4]1',
            'If three children left Midway St., how many children would it have?**picto-02.jpg=4[3+2]1',
            'If two children in Marengo St. transferred to Midway St., how many MORE children would Midway St. have THAN Marengo St.?**picto-02.jpg=7[6+5]8',
            'On which day was the MOST number of red boxes sold and how many red boxes were sold that day?**picto-03.jpg=Friday: 6[Thursday: 5+Monday: 4]Friday: 7',
            'On which day was the LEAST number of red boxes sold and how many red boxes were sold that day?**picto-03.jpg=Saturday: 2[Tuesday: 3+Wednesday: 3]Saturday: 1',
            'How many MORE red boxes were sold on Friday THAN on Tuesday?**picto-03.jpg=3[5+4]6',
            'How many MORE red boxes were sold on Thursday THAN on Saturday?**picto-03.jpg=3[5+4]6',
            'How many red boxes were sold in total on Tuesday and Thursday?**picto-03.jpg=8[6+7]9',
            'How many red boxes were sold in total on the FIRST TWO days of the week?**picto-03.jpg=7[8+10]9',
            'How many red boxes were sold in total on the LAST TWO days of the week?**picto-03.jpg=8[10+7]9',
            'Which animal does our pet shop have the MOST of and how many such animals are in our pet shop?**picto-04.jpg=dogs: 5[cats: 4+fishes: 4]dogs: 6',
            'Which animal does our pet shop have the LEAST of and how many such animals are in our pet shop?**picto-04.jpg=birds: 3[cats: 4+fishes: 4]birds: 2',
            'How many dogs and fishes in total does our pet shop have?**picto-04.jpg=9[6+7]8',
            'How many cats and birds in total does our pet shop have?**picto-04.jpg=7[6+5]8',
            'How many MORE dogs are in our pet shop THAN birds?**picto-04.jpg=2[1+3]4',
            'If our pet shop sold 2 dogs and a cat, how many animals would it have left?**picto-04.jpg=13[12+11]14',
            'Who read the MOST books and how many books did he or she read?**picto-05.jpg=Zane: 9[Yoshi: 8+Darren: 6]Zane: 10',
            'Who read the LEAST books and how many books did he or she read?**picto-05.jpg=Seth: 1[Josh: 2+Seth: 2]Josh: 1',
            'In total, how many books did Darren and Haley read?**picto-05.jpg=12[10+11]13',
            'How many MORE books did Zane read THAN Josh?**picto-05.jpg=7[8+9]10',
            'How many books LESS did HALEY read THAN Yoshi?**picto-05.jpg=2[1+3]4',
            'How many books LESS did Seth read THAN Darren?**picto-05.jpg=5[4+3]2',
        ];
    } else {
        $questions = [
            'Which street has the MOST children and how many children does it have?**picto-02.jpg=Midway: 7[Marengo: 4+Melrose: 5]Parral: 3',
            'Which street has the LEAST children and how many children does it have?**picto-02.jpg=Rushville: 2[Marengo: 4+Melrose: 5]Parral: 3',
            'How many LESS children are in Marengo and Parral Streets THAN in Midway and Rushville Streets?**picto-02.jpg=2[3+4]5',
            'How many MORE children are in Midway and Melrose Streets THAN in Rushville and Parral Streets?**picto-02.jpg=7[6+8]9',
            'If two children in Marengo St. transferred to Midway St., how many MORE children would Midway St. have THAN Marengo St.?**picto-02.jpg=7[6+5]8',
            'On which day was the MOST number of red boxes sold and how many red boxes were sold that day?**picto-03.jpg=Friday: 6[Thursday: 5+Monday: 4]Friday: 7',
            'On which day was the LEAST number of red boxes sold and how many red boxes were sold that day?**picto-03.jpg=Saturday: 2[Tuesday: 3+Wednesday: 3]Saturday: 1',
            'How many MORE red boxes were sold in total on Friday and Monday THAN on Tuesday and Wednesday?**picto-03.jpg=4[5+6]7',
            'How many MORE red boxes were sold in total on Thursday and Friday THAN on Monday alone?**picto-03.jpg=7[5+8]6',
            'How many red boxes were sold in total on the FIRST TWO days of the week?**picto-03.jpg=7[8+10]9',
            'How many red boxes were sold in total on the LAST TWO days of the week?**picto-03.jpg=8[10+7]9',
            'Who read the MOST books and how many books did he or she read?**picto-05.jpg=Zane: 9[Yoshi: 8+Darren: 6]Zane: 10',
            'Who read the LEAST books and how many books did he or she read?**picto-05.jpg=Seth: 1[Josh: 2+Seth: 2]Josh: 1',
            'How many MORE books did Zane and Yoshi read in total THAN Haley and Darren?**picto-05.jpg=5[4+6]7',
            'How many books LESS did HALEY and Seth read in total THAN Yoshi and Darren?**picto-05.jpg=7[4+5]6',
            'How many cupcakes were sold during the FIRST 3 days of the week?**picto-06.jpg=115[120+125]130',
            'How many cupcakes were sold during the LAST 2 days of the week?**picto-06.jpg=195[190+200]205',
            'How many cupcakes were sold from Tuesday to Friday?**picto-06.jpg=170[175+180]185',
            'How many MORE cupcakes were sold on Saturday THAN on Tuesday?**picto-06.jpg=75[65+70]80',
            'How many MORE cupcakes were sold on Sunday THAN on Thursday?**picto-06.jpg=60[45+50]55',
            'How many LESS cupcakes were sold on Tuesday THAN on Friday?**picto-06.jpg=45[40+50]55',
            'How many LESS cupcakes were sold on Thursday THAN on Saturday?**picto-06.jpg=65[55+60]70',
            'How many cars were in our city in 2006?**picto-07.jpg=450[500+550]600',
            'How many MORE cars were in our city in 2007 THAN in 2003?**picto-07.jpg=200[100+150]250',
            'How many MORE cars were in our city in 2007 THAN in 2004?**picto-07.jpg=250[100+150]200',
            'How many LESS cars were in our city in 2004 THAN in 2005?**picto-07.jpg=150[100+200]250',
            'Which year experienced the greatest increase in the number of cars in our city from the year before and how many cars were added that year?**picto-07.jpg=2005: 150[2004: 100+2007: 150]2005: 100',
            'Which year experienced a decrease in the number of cars in our city from the year before and how many cars were lost that year?**picto-07.jpg=2004: 50[2003: 50+2005: 150]2004: 100',
        ];
    }

    // Repeat prevention
    if (!isset($_SESSION[$sessionKey]['used'])) $_SESSION[$sessionKey]['used'] = [];
    $used = $_SESSION[$sessionKey]['used'];
    $safety = 0;
    do {
        $idx = rand(0, count($questions) - 1);
        $qstr = $questions[$idx];
        $safety++;
    } while (in_array($idx, $used, true) && $safety < 50);
    $used[] = $idx;
    if (count($used) > 15) $used = array_slice($used, -15);
    $_SESSION[$sessionKey]['used'] = $used;

    // Parse question string
    $posEq  = strpos($qstr, '=');
    $posBr  = strpos($qstr, '[');
    $posPl  = strpos($qstr, '+');
    $posCl  = strpos($qstr, ']');

    $question = substr($qstr, 0, $posEq);
    $ans      = substr($qstr, $posEq + 1, $posBr - $posEq - 1);
    $c1       = substr($qstr, $posBr + 1, $posPl - $posBr - 1);
    $c2       = substr($qstr, $posPl + 1, $posCl - $posPl - 1);
    $c3       = substr($qstr, $posCl + 1);

    $choices = [$ans, $c1, $c2, $c3];
    shuffle($choices);

    // Extract pictograph filename
    $picfile = '';
    if (strpos($qstr, '.jpg') > 0) {
        $p1 = strpos($qstr, '**');
        $p2 = strpos($qstr, '.jpg');
        $img = substr($qstr, $p1 + 2, $p2 - $p1 - 2);
        $picfile = $base . '/math/images/graphs/' . $img . '.jpg';
        $picfile0 = substr($qstr, $p1, $p2 - $p1 + 4);
        $question = str_replace($picfile0, '', $question);
    }

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'choices'  => $choices,
        'question' => $question,
        'picfile'  => $picfile,
        'lvl'      => $lvl,
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
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
$showPic = ($result !== null) ? $result['picfile'] : $q_curr['picfile'];
if ($showPic):
?>
<div style="margin:15px 0;">
    <img src="<?php echo htmlspecialchars($showPic); ?>"
         style="border:1px solid #cccccc; border-radius:6px; max-width:100%;">
</div>
<?php endif; ?>

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center;">
        Your answer:
        <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#333333;">
        <?php echo htmlspecialchars($result['question']); ?>
    </p>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($result['ans']); ?></strong>
    </p>
<?php else: ?>
    <p class="statement" style="font-size:17pt; font-weight:600; color:#333333; margin-top:24px;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin:10px 0 15px;">
        Click on your answer.
    </p>
    <?php render_choices($q_curr['choices'], 'ansclick', 'raw'); ?>
<?php endif; ?>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();