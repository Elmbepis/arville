<?php
// math/modules/probability-pics.php
// Computed text-choice with visual box-of-items display.
// Answer categories: likely / less likely / unlikely / certain / impossible / equally likely.
//
// "less likely" vs "unlikely" — mutually exclusive, chosen by ratio:
//   ratio = picked_count / more_numerous_count
//     ratio < 0.5  &#8594; unlikely   (picked item has less than half the other's count)
//     ratio >= 0.5 &#8594; less likely (slim gap — substantial probability, not rare)
//
// Only ONE of {less likely, unlikely} ever appears in a given choice set.

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
$imgProbDir = $base . '/math/images/objects/probability';

$moduleTitle = 'Probability';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

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
        'sobj'     => $cur['sobj'],
        'exp'      => $cur['exp'],
        'box'      => $cur['box'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($lvl === 'Easy') {
        $cont = 'box-bg1.jpg'; $bht = 220; $nlim = 20; $clim = 2;
    } else {
        $cont = 'box-bg3.jpg'; $bht = 310; $nlim = 34; $clim = 3;
    }

    if (rand(1, 2) === 1) {
        $objs  = ['blue marble', 'red marble', 'green marble'];
        $imgs  = ['blue-marble.jpg', 'red-marble.jpg', 'green-marble.jpg'];
        $iobjs = ['yellow marble', 'violet marble', 'black marble'];
    } else {
        $objs  = ['apple', 'orange', 'pear'];
        $imgs  = ['apple.jpg', 'orange.jpg', 'pear.jpg'];
        $iobjs = ['banana', 'lemon', 'papaya'];
    }

    $lnum = rand(0, 2); $lobj = $objs[$lnum]; $limg = $imgs[$lnum];
    do { $unum = rand(0, 2); } while ($unum === $lnum);
    $uobj = $objs[$unum]; $uimg = $imgs[$unum];
    do { $onum = rand(0, 2); } while ($onum === $lnum || $onum === $unum);
    $oobj = $objs[$onum]; $oimg = $imgs[$onum];
    $iobj = $iobjs[array_rand($iobjs)];

    $ansopt = ($lvl === 'Easy') ? rand(1, 24) : rand(1, 25);

    $answerItems = [];
    $ans = ''; $sobj = ''; $exp = '';

    if ($ansopt >= 1 && $ansopt <= 23) {
        if ($lvl === 'Easy') {
            $llim = (int)floor(rand(55, 80) / 100 * $nlim);
            $ulim = $nlim - $llim;
            for ($m = 0; $m < $llim; $m++) $answerItems[] = $limg;
            for ($m = 0; $m < $ulim; $m++) $answerItems[] = $uimg;
            shuffle($answerItems);

            if ($ansopt <= 22) {
                if (rand(1, 2) === 1) {
                    $ans  = 'likely';
                    $sobj = $lobj;
                    $exp  = '# of ' . $lobj . 's = ' . $llim . '. # of ' . $uobj . 's = ' . $ulim . '. There are more ' . $lobj . 's than ' . $uobj . 's.';
                } else {
                    $ratio = ($llim > 0) ? ($ulim / $llim) : 0;
                    if ($ratio < 0.5) {
                        $ans = 'unlikely';
                        $exp = '# of ' . $lobj . 's = ' . $llim . '. # of ' . $uobj . 's = ' . $ulim . '. There are far fewer ' . $uobj . 's than ' . $lobj . 's.';
                    } else {
                        $ans = 'less likely';
                        $exp = '# of ' . $lobj . 's = ' . $llim . '. # of ' . $uobj . 's = ' . $ulim . '. There are fewer ' . $uobj . 's than ' . $lobj . 's, but not by much.';
                    }
                    $sobj = $uobj;
                }
            } else {
                $ans  = 'impossible';
                $sobj = $iobj;
                $exp  = '# of ' . $lobj . 's = ' . $llim . '. # of ' . $uobj . 's = ' . $ulim . '. There are no ' . $iobj . 's in the box.';
            }
        } else {
            // Hard — 3 object types
            $llim = (int)floor(rand(45, 70) / 100 * $nlim);
            $ulim = (int)floor(rand(11, 49) / 100 * ($nlim - $llim));
            $olim = $nlim - $llim - $ulim;
            for ($m = 0; $m < $llim; $m++) $answerItems[] = $limg;
            for ($m = 0; $m < $olim; $m++) $answerItems[] = $oimg;
            for ($m = 0; $m < $ulim; $m++) $answerItems[] = $uimg;
            shuffle($answerItems);

            if ($ansopt <= 22) {
                if (rand(1, 2) === 1) {
                    $ans  = 'likely';
                    $sobj = $lobj;
                    $exp  = '# of ' . $lobj . 's = ' . $llim . '. # of ' . $oobj . 's = ' . $olim . '. # of ' . $uobj . 's = ' . $ulim . '. ' . ucfirst($lobj) . 's are the greatest in number.';
                } else {
                    $ratio = ($llim > 0) ? ($ulim / $llim) : 0;
                    if ($ratio < 0.5) {
                        $ans = 'unlikely';
                        $exp = '# of ' . $lobj . 's = ' . $llim . '. # of ' . $oobj . 's = ' . $olim . '. # of ' . $uobj . 's = ' . $ulim . '. ' . ucfirst($uobj) . 's are the least in number, much fewer than ' . $lobj . 's.';
                    } else {
                        $ans = 'less likely';
                        $exp = '# of ' . $lobj . 's = ' . $llim . '. # of ' . $oobj . 's = ' . $olim . '. # of ' . $uobj . 's = ' . $ulim . '. ' . ucfirst($uobj) . 's are the least in number, but not by much.';
                    }
                    $sobj = $uobj;
                }
            } else {
                $ans  = 'impossible';
                $sobj = $iobj;
                $exp  = '# of ' . $lobj . 's = ' . $llim . '. # of ' . $oobj . 's = ' . $olim . '. # of ' . $uobj . 's = ' . $ulim . '. There are no ' . $iobj . 's in the box.';
            }
        }
    } elseif ($ansopt === 24) {
        $ans = 'certain';
        $obj = $objs[rand(0, 2)];
        $img = $imgs[array_search($obj, $objs, true)];
        $sobj = $obj;
        for ($m = 0; $m <= $nlim; $m++) $answerItems[] = $img;
        $exp = '# of ' . $obj . 's = ' . ($nlim + 1) . '. Only ' . $obj . 's are in the box.';
    } else {
        $ans = 'equally likely';
        $sobj = (rand(1, 2) === 1) ? $lobj : $uobj;
        $halfCount = (int)floor($nlim / 2);
        for ($m = 0; $m < $halfCount; $m++) $answerItems[] = $limg;
        for ($m = 0; $m < $halfCount; $m++) $answerItems[] = $uimg;
        shuffle($answerItems);
        $exp = '# of ' . $lobj . 's = ' . $halfCount . '. # of ' . $uobj . 's = ' . $halfCount
             . '. There are as many ' . $lobj . 's as ' . $uobj . 's in the box.';
    }

    // ---- Build 4 choices with mutual-exclusion of the pair ----
    $allChoices = ['likely', 'less likely', 'unlikely', 'certain', 'impossible', 'equally likely'];

    if ($ans === 'less likely') {
        $allChoices = array_values(array_diff($allChoices, ['unlikely']));
    } elseif ($ans === 'unlikely') {
        $allChoices = array_values(array_diff($allChoices, ['less likely']));
    } else {
        // Answer is one of the other 4 — include exactly one of the pair
        if (rand(1, 2) === 1) {
            $allChoices = array_values(array_diff($allChoices, ['unlikely']));
        } else {
            $allChoices = array_values(array_diff($allChoices, ['less likely']));
        }
    }

    $distractorPool = array_values(array_diff($allChoices, [$ans]));
    shuffle($distractorPool);
    $distractors = array_slice($distractorPool, 0, 3);
    $choices = array_merge($distractors, [$ans]);
    shuffle($choices);

    $box = ['cont' => $cont, 'bht' => $bht, 'items' => $answerItems];

    $det = preg_match('/^[aeiou]/i', $sobj) ? 'an' : 'a';
    $question = 'What is the probability of picking ' . $det . ' ' . $sobj . ' from the box?';

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'sobj'     => $sobj,
        'question' => $question,
        'exp'      => $exp,
        'choices'  => $choices,
        'box'      => $box,
        'lvl'      => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER HELPERS
// ============================================================
function renderProbabilityBox($box, $imgProbDir) {
    ?>
    <div style="width:450px; max-width:100%; height:<?php echo (int)$box['bht']; ?>px; margin:15px auto; background:url('%3C?php echo htmlspecialchars($imgProbDir .') no-repeat center; background-size:cover; border-radius:8px; border:1px solid #cccccc; position:relative; overflow:hidden">
        <div style="position:absolute; inset:0; display:flex; flex-wrap:wrap; justify-content:center; align-content:center; gap:3px; padding:18px; box-sizing:border-box;">
            <?php foreach ($box['items'] as $fname): ?>
                <img src="<?php echo htmlspecialchars($imgProbDir . '/' . $fname); ?>"
                     alt="" style="display:block; max-width:42px; height:auto;">
            <?php endforeach; ?>
        </div>
    </div>
    <?php
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

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        You clicked on <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php $det = preg_match('/^[aeiou]/i', $result['sobj']) ? 'an' : 'a'; ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080;">
        Picking <?php echo $det . ' ' . htmlspecialchars($result['sobj']); ?> from the box is
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($result['ans']); ?></strong>.
    </p>
    <p class="statement" style="font-size:13pt; color:#555;">
        <?php echo htmlspecialchars($result['exp']); ?>
    </p>
    <?php renderProbabilityBox($result['box'], $imgProbDir); ?>
<?php else: ?>
    <?php renderProbabilityBox($q_curr['box'], $imgProbDir); ?>
    <p class="statement" style="font-size:17pt; font-weight:600; color:#800080; margin:15px auto 10px auto;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; max-width:440px; margin:0 auto 20px;">
        <?php foreach ($q_curr['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               style="display:block; background:#f0f0f0; border:2px solid #ccc; border-radius:12px; padding:14px 20px; font-size:1.3rem; font-weight:bold; color:#0000BB; text-decoration:none; text-align:center; box-sizing:border-box;">
                <?php echo htmlspecialchars(ucwords($c)); ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <div style="margin-top:20px;">
        <br/><input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>

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