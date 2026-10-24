<?php
// math/modules/alphanum-patterns.php
// Computed free-text, single input. Find missing term in alphanumeric pattern.
// Single difficulty (Easy) — legacy forced Easy.
// Grade 2: 4-term pattern (7th displayed value); answer is a single letter OR number.
// Grade 3+: 5-term pattern; answer combines letter + number (e.g. "K7").
// Letter-range validation fixes the legacy bug where positions 1/4 could fall
// outside 'A'-'Z' for negative-step patterns.

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

$moduleTitle = 'Missing Terms in Alphanumeric Patterns';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

// Helper — validate that both endpoints are letters ('A'..'Z')
function lettersValid($a, $b) {
    return $a >= 65 && $a <= 90 && $b >= 65 && $b <= 90;
}

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $studentAns = strtoupper(str_replace(' ', '', trim((string)($_POST['answer'] ?? ''))));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($studentAns, $cur['ans'], $lvl);

    $result = [
        'correct' => $isCorrect,
        'student' => $studentAns,
        'ans'     => $cur['ans'],
        'q'       => $cur['q'],
        'termLabel'=> $cur['termLabel'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $ans = ''; $q = '';

    if ($grdKey == 2) {
        // ---- Grade 2: 4-term pattern (7th displayed value) ----
        $pat = 3;  // legacy only generated pat=3 for grade 2

        // Pattern 3: both number and letter decrease
        $tries = 0;
        do {
            $coeff1 = rand(3, 9) * -1;
            $const1 = rand(25, 49);
            $n1 = $coeff1*1 + $const1;
            $n2 = $coeff1*2 + $const1;
            $n3 = $coeff1*3 + $const1;
            $n4 = $coeff1*4 + $const1;

            $coeff2 = rand(2, 4) * -1;
            $const2 = rand(65, 80);
            $a1 = $coeff2*1 + $const2;
            $a2 = $coeff2*2 + $const2;
            $a3 = $coeff2*3 + $const2;
            $a4 = $coeff2*4 + $const2;
            $tries++;
        } while (($n4 < 2 || !lettersValid($a1, $a4)) && $tries < 100);

        if (rand(1, 2) == 1) {
            // Answer is a single letter (4th letter)
            $ans  = chr($a4);
            $an1  = chr($a1) . ', ' . $n1;
            $an2  = chr($a2) . ', ' . $n2;
            $an3  = chr($a3) . ', ' . $n3;
        } else {
            // Answer is a single number (4th number)
            $ans  = (string)$n4;
            $an1  = $n1 . ', ' . chr($a1);
            $an2  = $n2 . ', ' . chr($a2);
            $an3  = $n3 . ', ' . chr($a3);
        }
        $q = "$an1, $an2, $an3, ____";
        $termLabel = '7th term';

    } else {
        // ---- Grade 3+: 5-term pattern ----
        $pat = rand(1, 3);
        $tries = 0;

        if ($pat == 1) {
            // Both increase
            do {
                $coeff1 = rand(3, 9);
                $const1 = rand(11, 49);
                $n1 = $coeff1*1 + $const1;
                $n2 = $coeff1*2 + $const1;
                $n3 = $coeff1*3 + $const1;
                $n4 = $coeff1*4 + $const1;
                $n5 = $coeff1*5 + $const1;

                $coeff2 = rand(2, 4);
                $const2 = rand(65, 80);
                $a1 = $coeff2*1 + $const2;
                $a2 = $coeff2*2 + $const2;
                $a3 = $coeff2*3 + $const2;
                $a4 = $coeff2*4 + $const2;
                $a5 = $coeff2*5 + $const2;
                $tries++;
            } while (!lettersValid($a1, $a5) && $tries < 100);

            if (rand(1, 2) == 1) {
                $ans  = chr($a5) . $n5;
                $an1  = chr($a1) . $n1;
                $an2  = chr($a2) . $n2;
                $an3  = chr($a3) . $n3;
                $an4  = chr($a4) . $n4;
            } else {
                $ans  = $n5 . chr($a5);
                $an1  = $n1 . chr($a1);
                $an2  = $n2 . chr($a2);
                $an3  = $n3 . chr($a3);
                $an4  = $n4 . chr($a4);
            }
        } elseif ($pat == 2) {
            // Numbers decrease, letters increase
            do {
                $coeff1 = rand(3, 9) * -1;
                $const1 = rand(25, 49);
                $n1 = $coeff1*1 + $const1;
                $n2 = $coeff1*2 + $const1;
                $n3 = $coeff1*3 + $const1;
                $n4 = $coeff1*4 + $const1;
                $n5 = $coeff1*5 + $const1;

                $coeff2 = rand(2, 4);
                $const2 = rand(65, 80);
                $a1 = $coeff2*1 + $const2;
                $a2 = $coeff2*2 + $const2;
                $a3 = $coeff2*3 + $const2;
                $a4 = $coeff2*4 + $const2;
                $a5 = $coeff2*5 + $const2;
                $tries++;
            } while (($n5 < 2 || !lettersValid($a1, $a5)) && $tries < 100);

            if (rand(1, 2) == 1) {
                $ans  = chr($a5) . $n5;
                $an1  = chr($a1) . $n1;
                $an2  = chr($a2) . $n2;
                $an3  = chr($a3) . $n3;
                $an4  = chr($a4) . $n4;
            } else {
                $ans  = $n5 . chr($a5);
                $an1  = $n1 . chr($a1);
                $an2  = $n2 . chr($a2);
                $an3  = $n3 . chr($a3);
                $an4  = $n4 . chr($a4);
            }
        } else {
            // Both decrease
            do {
                $coeff1 = rand(3, 9) * -1;
                $const1 = rand(25, 49);
                $n1 = $coeff1*1 + $const1;
                $n2 = $coeff1*2 + $const1;
                $n3 = $coeff1*3 + $const1;
                $n4 = $coeff1*4 + $const1;
                $n5 = $coeff1*5 + $const1;

                $coeff2 = rand(2, 4) * -1;
                $const2 = rand(65, 80);
                $a1 = $coeff2*1 + $const2;
                $a2 = $coeff2*2 + $const2;
                $a3 = $coeff2*3 + $const2;
                $a4 = $coeff2*4 + $const2;
                $a5 = $coeff2*5 + $const2;
                $tries++;
            } while (($n5 < 2 || !lettersValid($a1, $a5)) && $tries < 100);

            if (rand(1, 2) == 1) {
                $ans  = chr($a5) . $n5;
                $an1  = chr($a1) . $n1;
                $an2  = chr($a2) . $n2;
                $an3  = chr($a3) . $n3;
                $an4  = chr($a4) . $n4;
            } else {
                $ans  = $n5 . chr($a5);
                $an1  = $n1 . chr($a1);
                $an2  = $n2 . chr($a2);
                $an3  = $n3 . chr($a3);
                $an4  = $n4 . chr($a4);
            }
        }
        $q = "$an1, $an2, $an3, $an4, ____";
        $termLabel = '5th term';
    }

    $_SESSION[$sessionKey]['current'] = [
        'ans'       => $ans,
        'q'         => $q,
        'termLabel' => $termLabel,
        'lvl'       => $lvl,
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

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">Your answer: <strong style="color:#CC0066; font-size:16pt;"><?php echo htmlspecialchars($result['student']); ?></strong></p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
    <p class="statement" style="font-size:14pt; color:#800080;">The pattern is: <strong style="color:#0000CC;"><?php echo htmlspecialchars($result['q']); ?></strong></p>
    <p class="statement" style="font-size:14pt; color:#800080;"><?php echo $result['termLabel']; ?>: <strong style="color:#CC0066;"><?php echo htmlspecialchars($result['ans']); ?></strong></p>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#333; margin-top:20px;">Find the <?php echo $q_curr['termLabel']; ?> of this series:</p>
    <p class="statement" style="font-size:20pt; font-weight:700; color:#0000CC; margin:15px 0;"><?php echo htmlspecialchars($q_curr['q']); ?></p>
    <p style="font-size:15pt; font-weight:700; color:#CC0066; margin:20px 0;">
        <?php echo $q_curr['termLabel']; ?>:
        <?php
        $ansLen = strlen((string)$q_curr['ans']);
        $inputW = max(80, ($ansLen + 2) * 30);
        ?>
        <input type="text" name="answer" size="1" maxlength="<?php echo $ansLen + 2; ?>"
               style="width:<?php echo $inputW; ?>px; height:44px; font-size:24px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC; text-transform:uppercase;"
               autocomplete="off" autofocus>
    </p>
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
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();