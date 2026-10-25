<?php
// math/modules/symmetry.php
// Image-based text-choice. Student identifies line of symmetry.
// Levels: Easy (yes/no) and Hard (merged legacy Medium + Hard).
//   Hard randomly picks between:
//     - legacy Medium: red/blue, images 11-17 (2 choices)
//     - legacy Hard:   red/blue/green/black, images 31-34 (4 choices)
// When there are 4 choices, they render as a 2x2 grid instead of a single row.

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

$moduleTitle = 'Understanding Symmetry';
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
    $isCorrect = $scorer->processAnswer($click, $cur['ans'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $click,
        'ans'     => $cur['ans'],
        'anspic'  => $cur['anspic'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if (!isset($_SESSION[$sessionKey]['used'])) $_SESSION[$sessionKey]['used'] = [];
    $used = $_SESSION[$sessionKey]['used'];

    $safety = 0;
    $shape = '';
    $pref = '';
    $shnum = 0;
    $ans = '';
    $choices = [];
    $question = '';

    do {
        if ($lvl === 'Easy') {
            // Legacy Easy: yes/no — is this a line of symmetry?
            $shnum = rand(1, 8);
            $ans   = 'no';
            $pref  = 'symnot';
            if (rand(1, 2) === 1) { $ans = 'yes'; $pref = 'symyes'; }
            $shape = "*$pref" . sprintf('%02d', $shnum);
            $choices = ['yes', 'no'];
            $question = 'Is this a line of symmetry?';
        } else {
            // Hard = merged legacy Medium + Hard
            if (rand(1, 2) === 1) {
                // Legacy Medium style — 2-color question, images 11-17
                $shnum = rand(11, 17);
                $ans   = 'red';
                $pref  = 'red';
                if (rand(1, 2) === 1) { $ans = 'blue'; $pref = 'blu'; }
                $shape = "*$pref$shnum";
                $choices = ['red', 'blue'];
            } else {
                // Legacy Hard style — 4-color question, images 31-34
                $shnum = rand(31, 34);
                $rnum  = rand(1, 4);
                if ($rnum === 1) { $ans = 'red';   $pref = 'red'; }
                if ($rnum === 2) { $ans = 'blue';  $pref = 'blu'; }
                if ($rnum === 3) { $ans = 'green'; $pref = 'gre'; }
                if ($rnum === 4) { $ans = 'black'; $pref = 'bla'; }
                $shape = "*$pref$shnum";
                $choices = ['red', 'blue', 'green', 'black'];
            }
            $question = 'Click on the color of the line of symmetry.';
        }
        $safety++;
    } while (in_array($shape, $used, true) && $safety < 50);

    $used[] = $shape;
    if (count($used) > 30) $used = array_slice($used, -30);
    $_SESSION[$sessionKey]['used'] = $used;

    $anspic = $base . '/math/images/symmetry/' . $pref . $shnum . '.jpg';

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'choices'  => $choices,
        'question' => $question,
        'anspic'   => $anspic,
        'lvl'      => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

/**
 * Render choice buttons.
 *   2 choices &#8594; single flex row (via render_choices).
 *   4 choices &#8594; 2x2 grid.
 */
function renderChoiceButtons($choices, $param = 'ansclick') {
    $count = count($choices);
    if ($count === 4) {
        echo '<div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:14px; max-width:400px; margin:20px auto;">';
        foreach ($choices as $c) {
            echo '<a href="?' . htmlspecialchars($param) . '=' . urlencode($c) . '"';
            echo ' class="choice-btn" style="width:100%; max-width:100%; box-sizing:border-box;">';
            echo htmlspecialchars($c);
            echo '</a>';
        }
        echo '</div>';
    } else {
        render_choices($choices, $param, 'raw');
    }
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
    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php
        if ($result['ans'] === 'yes')      echo 'This is a line of symmetry.';
        elseif ($result['ans'] === 'no')   echo 'This is not a line of symmetry.';
        else                               echo 'The ' . htmlspecialchars($result['ans']) . ' line is the line of symmetry.';
        ?>
    </p>
    <div style="margin:15px 0;">
        <img src="<?php echo htmlspecialchars($result['anspic']); ?>"
             style="border:1px solid #333333; max-width:100%;">
    </div>
<?php else: ?>
    <div style="margin:15px 0;">
        <img src="<?php echo htmlspecialchars($q_curr['anspic']); ?>"
             style="border:1px solid #333333; max-width:100%;">
    </div>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#CC0066; margin-top:15px;">
        <?php echo $q_curr['question']; ?>
    </p>
    <?php renderChoiceButtons($q_curr['choices'], 'ansclick'); ?>
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