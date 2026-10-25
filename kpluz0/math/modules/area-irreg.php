<?php
// math/modules/area-irreg.php
// Text-choice with image. Student counts "by how many tiles" or "how many
// tiles to add" from a picture of irregular shapes.
// Single difficulty (Easy) — legacy forced this.
// Theme: paper-69 fallback (legacy test67 doesn't fit 75/655/70).
// Score box: score-top-2 / score-bottom-2 (preserved from legacy).

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

$moduleTitle = 'Areas of Irregular Shapes';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

// ============================================================
// HANDLE ANSWER
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
    $questions = [
        "By how many square tiles is the red shape bigger than the blue shape?**tiles-1.jpg=10[11+12]13",
        "By how many square tiles is the red shape bigger than the green shape?**tiles-1.jpg=12[11+10]13",
        "By how many square tiles is the blue shape bigger than the green shape?**tiles-1.jpg=2[1+3]4",
        "How many square tiles should you add to the green shape to make it a square that measures 6 tiles on each side?**tiles-1.jpg=24[23+22]21",
        "How many square tiles should you add to the blue shape to make it a rectangle that measures 3 tiles by 8 tiles?**tiles-1.jpg=10[11+12]13",
        "How many square tiles should you add to the red shape to make it a rectangle that measures 6 tiles by 8 tiles?**tiles-1.jpg=24[23+25]26",
        "By how many square tiles is the orange shape bigger than the blue shape?**tiles-2.jpg=1[2+3]4",
        "By how many square tiles is the orange shape bigger than the pink shape?**tiles-2.jpg=4[2+3]5",
        "By how many square tiles is the blue shape bigger than the pink shape?**tiles-2.jpg=3[2+4]5",
        "How many square tiles should you add to the blue shape to make it a square that measures 5 tiles on each side?**tiles-2.jpg=10[9+8]7",
        "How many square tiles should you add to the orange shape to make it a square that measures 6 tiles on each side?**tiles-2.jpg=20[19+21]22",
        "How many square tiles should you add to the pink shape to make it a rectangle that measures 4 tiles by 6 tiles?**tiles-2.jpg=12[13+14]15",
        "By how many square tiles is the green shape bigger than the yellow shape?**tiles-3.jpg=9[8+10]11",
        "By how many square tiles is the green shape bigger than the violet shape?**tiles-3.jpg=7[5+6]8",
        "By how many square tiles is the violet shape bigger than the yellow shape?**tiles-3.jpg=2[3+4]5",
        "How many square tiles should you add to the yellow shape to make it a rectangle that measures 3 tiles by 6 tiles?**tiles-3.jpg=8[7+6]5",
        "How many square tiles should you add to the violet shape to make it a rectangle that measures 6 tiles by 4 tiles?**tiles-3.jpg=12[13+14]15",
        "How many square tiles should you add to the green shape to make it a rectangle that measures 9 tiles by 4 tiles?**tiles-3.jpg=17[16+18]15",
        "By how many square tiles is the green shape bigger than the blue shape?**tiles-4.jpg=6[7+8]9",
        "By how many square tiles is the green shape bigger than the red shape?**tiles-4.jpg=3[2+4]5",
        "By how many square tiles is the red shape bigger than the blue shape?**tiles-4.jpg=3[1+2]4",
        "How many square tiles should you add to the blue shape to make it a rectangle that measures 3 tiles by 6 tiles?**tiles-4.jpg=8[7+6]5",
        "How many square tiles should you add to the red shape to make it a square that measures 5 tiles on each side?**tiles-4.jpg=12[13+14]15",
        "How many square tiles should you add to the green shape to make it a rectangle that measures 9 tiles by 3 tiles?**tiles-4.jpg=11[10+12]13",
        "By how many square tiles is the violet shape bigger than the orange shape?**tiles-5.jpg=5[4+3]6",
        "By how many square tiles is the violet shape bigger than the red shape?**tiles-5.jpg=3[2+4]5",
        "By how many square tiles is the red shape bigger than the orange shape?**tiles-5.jpg=2[3+4]5",
        "How many square tiles should you add to the orange shape to make it a rectangle that measures 4 tiles by 5 tiles?**tiles-5.jpg=10[9+11]12",
        "How many square tiles should you add to the red shape to make it a square that measures 6 tiles on each side?**tiles-5.jpg=24[23+22]21",
        "How many square tiles should you add to the violet shape to make it a rectangle that measures 7 tiles by 3 tiles?**tiles-5.jpg=6[4+5]7",
    ];

    if (!isset($_SESSION[$sessionKey]['used'])) $_SESSION[$sessionKey]['used'] = [];
    $used = $_SESSION[$sessionKey]['used'];

    $safety = 0;
    do {
        $idx = rand(0, count($questions) - 1);
        $safety++;
    } while (in_array($idx, $used, true) && $safety < 50);
    $used[] = $idx;
    if (count($used) > 25) $used = array_slice($used, -25);
    $_SESSION[$sessionKey]['used'] = $used;

    $qstr = $questions[$idx];

    $posEq = strpos($qstr, '=');
    $posBr = strpos($qstr, '[');
    $posPl = strpos($qstr, '+');
    $posCl = strpos($qstr, ']');

    $question = substr($qstr, 0, $posEq);
    $ans      = substr($qstr, $posEq + 1, $posBr - $posEq - 1);
    $c1       = substr($qstr, $posBr + 1, $posPl - $posBr - 1);
    $c2       = substr($qstr, $posPl + 1, $posCl - $posPl - 1);
    $c3       = substr($qstr, $posCl + 1);

    $choices = [$ans, $c1, $c2, $c3];
    shuffle($choices);

    $picfile = '';
    if (strpos($qstr, '.jpg') > 0) {
        $p1 = strpos($qstr, '**');
        $p2 = strpos($qstr, '.jpg');
        $img = substr($qstr, $p1 + 2, $p2 - $p1 - 2);
        $picfile = $base . '/math/images/geom-elem/' . $img . '.jpg';
        $picfile0 = substr($qstr, $p1, $p2 - $p1 + 4);
        $question = str_replace($picfile0, '', $question);
    }

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'choices'  => $choices,
        'question' => $question,
        'picfile'  => $picfile,
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
    'score_top'     => $base . '/math/images/score-top-2.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-2.jpg',
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
         style="border:1px solid #333333; max-width:100%;">
</div>
<?php endif; ?>

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center;">
        Your answer: <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php echo htmlspecialchars($result['question']); ?>
        <br>Answer: <strong style="color:#CC0066;"><?php echo $result['ans']; ?></strong>
    </p>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#333333; margin-top:20px;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin:10px 0 15px;">
        Click on the best answer.
    </p>
    <?php render_choices($q_curr['choices'], 'ansclick', 'raw'); ?>
<?php endif; ?>

    <div style="margin-top:20px;">
        <br/><input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();