<?php
// math/modules/fractions-lowest.php
// Dual-input computed free-text (whole + numerator/denominator).
// Student reduces the shown fraction to lowest terms.
// Bypass pattern §D category 2 + §F.2 compound scoring.
//
// Legacy: grades 3-6, 3 levels (Easy/Medium/Hard), factor-based generation
// with optional whole-number on Hard.
// New: grades 3-6, 2 levels.
//   Easy = legacy Easy (1-2 factors, small primes, no whole).
//   Hard = legacy Medium ranges (§E calibration) + whole-number trigger
//          preserved from legacy Hard — the mixed-number variant is the
//          pedagogical differentiator of this module.
// Theme: legacy test2-* is 136/547/136 — does not fit §C standard &#8594; paper-69-*.

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

$moduleTitle = 'Fractions in Lowest Terms';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(3, (int)($_SESSION['grade'] ?? 3)));   // clamp — module is grades 3-6

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function fl_gcd($a, $b) {
    $a = abs((int)$a); $b = abs((int)$b);
    while ($b) { $t = $b; $b = $a % $b; $a = $t; }
    return $a ?: 1;
}

// Canonical fraction string:  whole|0  (pure integer) or whole|numer|denom.
// Legacy treats numer==0 as "whole number only" regardless of denom.
function canon_fraction($whole, $numer, $denom) {
    $whole = (int)$whole; $numer = (int)$numer; $denom = (int)$denom;
    if ($numer == 0) return $whole . '|0';
    if ($denom == 0) return 'invalid';
    return $whole . '|' . $numer . '|' . $denom;
}

// ============================================================
// HANDLE SUBMIT1  (dual input, §F.2 compound scoring)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $sWhole = (int)($_POST['whole'] ?? 0);
    $sNumer = (int)($_POST['numer'] ?? 0);
    $sDenom = (int)($_POST['denom'] ?? 0);

    $sCombined = canon_fraction($sWhole, $sNumer, $sDenom);
    $cCombined = ($cur['ansnum'] == 0)
        ? $cur['whole2'] . '|0'
        : $cur['whole2'] . '|' . $cur['ansnum'] . '|' . $cur['ansden'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($sCombined, $cCombined, $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'sWhole'  => $sWhole,
        'sNumer'  => $sNumer,
        'sDenom'  => $sDenom,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // ---- Params by grade + level (Hard = legacy Medium, §E) ----
    if ($grd == 3) {
        if ($lvl == 'Easy') {
            $numlimit1=2; $numlimit2=9;
            if (rand(1,2) == 1) { $factors=1; $primelimit1=1; $primelimit2=3; }
            else                { $factors=2; $primelimit1=1; $primelimit2=2; }
        } else {
            $numlimit1=4; $numlimit2=10; $opt=rand(1,4);
            if ($opt==1) { $factors=1; $primelimit1=3; $primelimit2=5; }
            if ($opt==2) { $factors=2; $primelimit1=2; $primelimit2=4; }
            if ($opt==3) { $factors=2; $primelimit1=2; $primelimit2=4; }
            if ($opt==4) { $factors=3; $primelimit1=1; $primelimit2=3; }
        }
    } elseif ($grd == 4) {
        if ($lvl == 'Easy') {
            $numlimit1=2; $numlimit2=9;
            if (rand(1,2) == 1) { $factors=1; $primelimit1=1; $primelimit2=3; }
            else                { $factors=2; $primelimit1=1; $primelimit2=2; }
        } else {
            $numlimit1=5; $numlimit2=12; $opt=rand(1,4);
            if ($opt==1) { $factors=1; $primelimit1=3; $primelimit2=6; }
            if ($opt==2) { $factors=2; $primelimit1=2; $primelimit2=4; }
            if ($opt==3) { $factors=3; $primelimit1=1; $primelimit2=3; }
            if ($opt==4) { $factors=4; $primelimit1=1; $primelimit2=2; }
        }
    } elseif ($grd == 5) {
        if ($lvl == 'Easy') {
            $numlimit1=2; $numlimit2=9;
            if (rand(1,2) == 1) { $factors=1; $primelimit1=2; $primelimit2=4; }
            else                { $factors=2; $primelimit1=1; $primelimit2=3; }
        } else {
            $numlimit1=5; $numlimit2=12; $opt=rand(1,4);
            if ($opt==1) { $factors=1; $primelimit1=5; $primelimit2=7; }
            if ($opt==2) { $factors=2; $primelimit1=2; $primelimit2=4; }
            if ($opt==3) { $factors=3; $primelimit1=1; $primelimit2=3; }
            if ($opt==4) { $factors=4; $primelimit1=1; $primelimit2=2; }
        }
    } else {  // grd 6
        if ($lvl == 'Easy') {
            $numlimit1=2; $numlimit2=9;
            if (rand(1,2) == 1) { $factors=1; $primelimit1=2; $primelimit2=5; }
            else                { $factors=2; $primelimit1=1; $primelimit2=3; }
        } else {
            $numlimit1=5; $numlimit2=12; $opt=rand(1,4);
            if ($opt==1) { $factors=1; $primelimit1=6; $primelimit2=9; }
            if ($opt==2) { $factors=2; $primelimit1=2; $primelimit2=4; }
            if ($opt==3) { $factors=3; $primelimit1=1; $primelimit2=3; }
            if ($opt==4) { $factors=4; $primelimit1=1; $primelimit2=2; }
        }
    }

    $primes = [1=>2, 2=>3, 3=>5, 4=>7, 5=>11, 6=>13, 7=>17, 8=>19, 9=>23];

    // ---- Pick numer1, denom1 (must differ; not same as last question's denom) ----
    $safety = 0;
    $numer1 = rand($numlimit1, $numlimit2);
    $lastdenom = $_SESSION[$sessionKey]['lastdenom'] ?? 9;
    do {
        $denom1 = rand($numlimit1, $numlimit2);
        $safety++;
    } while (($denom1 == $numer1 || $denom1 == $lastdenom) && $safety < 100);   // §I
    $_SESSION[$sessionKey]['lastdenom'] = $denom1;

    // ---- Multiply both by prime factors ----
    for ($i = 1; $i <= $factors; $i++) {
        $pf = $primes[rand($primelimit1, $primelimit2)];
        $numer1 *= $pf;
        $denom1 *= $pf;
    }

    // ---- Hard: sometimes add a whole part (legacy Hard feature) ----
    $whole1 = 0;
    if ($lvl == 'Hard' && $numer1 < $denom1 && rand(2,3) == 3) {   // 50%, matches legacy
        $whole1 = rand(1, 15);
    }

    // ---- Reduced answer (exact legacy structure) ----
    $whole2 = $whole1 + intdiv($numer1, $denom1);
    $ansnum = $numer1 % $denom1;
    $ansden = $denom1;
    $g = fl_gcd($ansnum, $ansden);
    $ansnum = intdiv($ansnum, $g);
    $ansden = intdiv($ansden, $g);

    $_SESSION[$sessionKey]['current'] = [
        'numer1' => $numer1,
        'denom1' => $denom1,
        'whole1' => $whole1,
        'whole2' => $whole2,
        'ansnum' => $ansnum,
        'ansden' => $ansden,
        'lvl'    => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' : Level ' . $grd . ' - ' . $lvl, $theme);

?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php
    $cur = $result['cur'];
    // Build student answer display
    if ($result['sNumer'] == 0) {
        $studentStr = (string)$result['sWhole'];
    } else {
        $studentStr = ($result['sWhole'] > 0 ? $result['sWhole'] . ' ' : '')
                    . $result['sNumer'] . '/' . $result['sDenom'];
    }
    // Build correct answer display
    if ($cur['ansnum'] == 0) {
        $correctStr = (string)$cur['whole2'];
    } else {
        $correctStr = ($cur['whole2'] > 0 ? $cur['whole2'] . ' ' : '')
                    . $cur['ansnum'] . '/' . $cur['ansden'];
    }
    $origStr = ($cur['whole1'] > 0 ? $cur['whole1'] . ' ' : '')
             . $cur['numer1'] . '/' . $cur['denom1'];
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($studentStr); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        In lowest terms,
        <strong style="color:#800080; font-size:16pt;"><?php echo htmlspecialchars($origStr); ?></strong>
        =
        <strong style="color:#CC0066; font-size:16pt;"><?php echo htmlspecialchars($correctStr); ?></strong>.
    </p>
<?php else: ?>
    <?php $showWhole = ($q['whole1'] > 0); $needWholeInput = ($q['whole1'] > 0 || $q['numer1'] >= $q['denom1']);
?>
    <div style="display:inline-flex; align-items:center; justify-content:center; gap:20px; margin:30px auto; flex-wrap:wrap;">
        <!-- Shown fraction -->
        <div style="display:inline-flex; align-items:center; gap:12px; font-size:28pt; font-weight:700; color:#800080; font-family:'Comic Sans MS', cursive;">
            <?php if ($showWhole): ?>
                <span><?php echo $q['whole1']; ?></span>
            <?php endif; ?>
            <div style="display:inline-flex; flex-direction:column; align-items:center; line-height:1;">
                <span><?php echo $q['numer1']; ?></span>
                <div style="border-top:4px solid #800080; width:100%; min-width:80px;"></div>
                <span><?php echo $q['denom1']; ?></span>
            </div>
        </div>
        <div style="font-size:32pt; color:#444;">=</div>
        <!-- Answer input -->
        <div style="display:inline-flex; align-items:center; gap:12px;">
            <?php if ($needWholeInput): ?>
                <input type="text" name="whole" maxlength="3" autocomplete="off"
                       style="width:70px; height:50px; font-size:26px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;">
            <?php endif; ?>
            <div style="display:inline-flex; flex-direction:column; align-items:center; gap:4px;">
                <input type="text" name="numer" maxlength="6" autocomplete="off"
                       style="width:90px; height:50px; font-size:26px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;">
                <div style="border-top:3px solid #333; width:100%;"></div>
                <input type="text" name="denom" maxlength="6" autocomplete="off"
                       style="width:90px; height:50px; font-size:26px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;">
            </div>
        </div>
    </div>
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