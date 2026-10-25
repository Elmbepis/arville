<?php
// math/modules/factoring.php
// Computed multi-input (2-6 fields). Student lists prime factors of a number.
// Order doesn't matter — canonical form sorts both sides before scoring.
// Easy = legacy Easy; Hard = legacy Medium (§E calibration).

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

$moduleTitle = 'Factoring Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(3, $grd));  // clamp: <3&#8594;3, >6&#8594;6

$primeTable = [2,3,5,7,11,13,17,19,23,29];  // first 10 primes

// Config: [facLimit1, facLimit2, primeLimit1, primeLimit2]
$configs = [
    3 => [
        'Easy' => [2, 2, 1, 5],
        'Hard' => [2, 3, 1, 6],
    ],
    4 => [
        'Easy' => [2, 4, 1, 4],
        'Hard' => [3, 5, 1, 6],
    ],
    5 => [
        'Easy' => [3, 5, 1, 6],
        'Hard' => [4, 6, 1, 7],
    ],
    6 => [
        'Easy' => [3, 5, 1, 6],
        'Hard' => [4, 6, 1, 8],
    ],
];
[$facLo, $facHi, $pLo, $pHi] = $configs[$grdKey][$lvl];

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $factors = $cur['factors'];
    $facnum  = $cur['facnum'];

    // Read student inputs (only facnum fields)
    $studentInputs = [];
    for ($i = 1; $i <= $facnum; $i++) {
        $studentInputs[] = (int)($_POST["answer$i"] ?? 0);
    }

    // Canonical comparison
    $sortedFactors = $factors;
    sort($sortedFactors);
    $correctCanon = implode(',', $sortedFactors);

    $allValid = true;
    $product  = 1;
    foreach ($studentInputs as $v) {
        if (!in_array($v, $factors, true)) {
            $allValid = false;
        }
        $product *= $v;
    }

    if ($allValid && $product === array_product($factors)) {
        sort($studentInputs);
        $studentCanon = implode(',', $studentInputs);
    } else {
        $studentCanon = 'wrong';
    }

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($studentCanon, $correctCanon, $cur['lvl']);

    $result = [
        'correct'      => $isCorrect,
        'studentInputs'=> $studentInputs,
        'factors'      => $factors,
        'facnum'       => $facnum,
        'target'       => array_product($factors),
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $facnum  = rand($facLo, $facHi);
    $factors = [];
    for ($i = 0; $i < $facnum; $i++) {
        $idx = rand($pLo - 1, $pHi - 1);
        $factors[] = $primeTable[$idx];
    }

    $_SESSION[$sessionKey]['current'] = [
        'factors' => $factors,
        'facnum'  => $facnum,
        'target'  => array_product($factors),
        'lvl'     => $lvl,
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

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answers: <strong style="color:#0000BB; font-size:16pt;">[ <?php echo implode(' ', $result['studentInputs']); ?> ]</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, those are not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        The prime factors of <strong><?php echo $result['target']; ?></strong> are:
        <strong style="color:#CC0066;"><?php echo implode(', ', $result['factors']); ?></strong>.
    </p>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;">
        Aside from 1, what are the<br/>other prime factors of
        <strong style="color:#CC0066; font-size:22pt;"><?php echo $q_curr['target']; ?></strong>?
    </p>
    <?php
    $inputStyle = 'width:70px; height:46px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC; margin:6px;';
    ?>
    <div style="margin:20px 0;">
        <?php for ($i = 1; $i <= $q_curr['facnum']; $i++): ?>
            <input type="text" name="answer<?php echo $i; ?>" maxlength="3"
                   style="<?php echo $inputStyle; ?>"
                   autocomplete="off"<?php if ($i === 1) echo ' autofocus'; ?>>
        <?php endfor; ?>
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