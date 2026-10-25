<?php
// math/modules/primes.php
// Text-choice (2 options). Student determines if a number is prime or not.
// Easy = legacy Easy; Hard = legacy Medium (§E calibration).
// Filter: skip multiples of 2 or 5 unless grade 3 + Easy (trivially answerable otherwise).

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

$moduleTitle = 'Prime Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(3, $grd));  // clamp: <3&#8594;3, >6&#8594;6

$primeTable = [2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97,
    101,103,107,109,113,127,131,137,139,149,151,157,163,167,173,179,181,191,193,197,199,
    211,223,227,229,233,239,241,251,257,263,269,271,277,281,283,293,307,311,313,317,331,
    337,347,349,353,359,367,373,379,383,389,397,401,409,419,421,431,433,439,443,449,457,
    461,463,467,479,487,491,499,503];

function isPrime($n) {
    $n = (int)$n;
    if ($n < 2) return false;
    if ($n < 4) return true;
    if ($n % 2 === 0) return false;
    if ($n < 9) return true;
    if ($n % 3 === 0) return false;
    $r = (int)floor(sqrt($n));
    for ($f = 5; $f <= $r; $f += 6) {
        if ($n % $f === 0) return false;
        if ($n % ($f + 2) === 0) return false;
    }
    return true;
}

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
        'correct'    => $isCorrect,
        'clicked'    => $click,
        'ans'        => $cur['ans'],
        'num'        => $cur['num'],
        'factorList' => $cur['factorList'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Range per grade × level
    if ($grdKey == 3) {
        if ($lvl === 'Easy') { $numLo = 3;   $numHi = 89;  }
        else                 { $numLo = 69;  $numHi = 169; }
    } else {
        if ($lvl === 'Easy') { $numLo = 17;  $numHi = 99;  }
        else                 { $numLo = 89;  $numHi = 199; }
    }

    // Skip trivially-answerable multiples of 2 or 5 unless grade 3 Easy
    $skipMultiples = !($grdKey == 3 && $lvl === 'Easy');

    $safety = 0;
    do {
        $num = rand($numLo, $numHi);
        $safety++;
    } while ($skipMultiples && ($num % 5 === 0 || $num % 2 === 0) && $safety < 200);

    $isPrime = isPrime($num);
    $ans = $isPrime ? 'prime' : 'not prime';

    // Prime factor list (for feedback if not prime)
    $factorList = [];
    if (!$isPrime) {
        $tmp = $num;
        foreach ($primeTable as $p) {
            while ($tmp > 1 && $tmp % $p === 0) {
                $factorList[] = $p;
                $tmp = intdiv($tmp, $p);
            }
            if ($tmp <= 1) break;
        }
    }

    $_SESSION[$sessionKey]['current'] = [
        'num'        => $num,
        'ans'        => $ans,
        'factorList' => $factorList,
        'lvl'        => $lvl,
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
        Your answer: <strong style="color:#0000BB; font-size:16pt;">'<?php echo strtoupper(htmlspecialchars($result['clicked'])); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        The number <strong><?php echo $result['num']; ?></strong> is <strong style="color:#CC0066;"><?php echo $result['ans']; ?></strong>
        <?php if ($result['ans'] === 'prime'): ?>
            because it cannot be divided by any number other than itself and 1.
        <?php else: ?>
            because it has the following prime factors: [ <?php echo implode(' ', $result['factorList']); ?> ].
        <?php endif; ?>
    </p>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:5px;">
        Is the number <strong style="color:#CC0066; font-size:22pt;"><?php echo $q_curr['num']; ?></strong>
        a PRIME number or not?<br/>
    </p>

    <div class="choices-row" style="--choice-width: 9em;">
        <a href="?ansclick=<?php echo urlencode('prime'); ?>" class="choice-btn">PRIME</a>
        <a href="?ansclick=<?php echo urlencode('not prime'); ?>" class="choice-btn">NOT PRIME</a>
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