<?php
// math/modules/decimals-words.php
// FILL-IN-THE-BLANKS. Type the word form of a decimal (0.XXXX).
// Adaptive input box sized to expected answer length.
//
// Levels: Easy = legacy Easy (2-digit, hundredths).
//         Hard = legacy Medium (3-digit, thousandths) per §E.
// Legacy Hard (4-digit ten thousandths) dropped for smoother curve.
//
// Word generation preserved exactly from legacy (with trim fix).
// Comparison: case-insensitive with whitespace collapsed.
// Theme: test24-* (117/547/108) &#8594; paper-69-*.
// DB row required: modules.url = 'decimals-words.php'

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

$moduleTitle = 'Decimal Numbers in Words';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function normalize_word($s) {
    $s = strtolower(trim((string)$s));
    $s = preg_replace('/\s+/', ' ', $s);
    return $s;
}

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $userRaw = trim((string)($_POST['answer'] ?? ''));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer(
        normalize_word($userRaw),
        normalize_word($cur['ans']),
        $cur['lvl']
    );

    $result = [
        'correct'    => $isCorrect,
        'userAnswer' => $userRaw,
        'cur'        => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($lvl === 'Easy') {
        $num = rand(11, 99);   $decplace = 'hundredths';
    } else {
        $num = rand(111, 999); $decplace = 'thousandths';
    }

    // Avoid trailing zero (would break hundreds/tens/ones logic)
    $safety = 0;
    while (substr((string)$num, -1) === '0' && $safety < 50) {
        $num = ($lvl === 'Easy') ? rand(11, 99) : rand(111, 999);
        $safety++;
    }

    // ---- Legacy word generation (verbatim, with pre-init of all vars) ----
    $numa   = substr((string)$num, -2);
    $dig10  = substr($numa, 0, 1);
    $dig1   = substr($numa, 1, 1);
    $dig100 = substr((substr((string)$num, -3)), 0, 1);
    if ($dig100 == 0) { $num += 100; $dig100 = 1; }
    $digs1000 = substr((string)$num, 0, (strlen((string)$num) - 3));

    $wone = ''; $wten = ''; $worda = ''; $whun = ''; $wthou1 = ''; $wthou = '';

    if ($dig1 == '1') $wone = 'ONE';
    if ($dig1 == '2') $wone = 'TWO';
    if ($dig1 == '3') $wone = 'THREE';
    if ($dig1 == '4') $wone = 'FOUR';
    if ($dig1 == '5') $wone = 'FIVE';
    if ($dig1 == '6') $wone = 'SIX';
    if ($dig1 == '7') $wone = 'SEVEN';
    if ($dig1 == '8') $wone = 'EIGHT';
    if ($dig1 == '9') $wone = 'NINE';

    if ($dig10 == '2') $wten = 'TWENTY';
    if ($dig10 == '3') $wten = 'THIRTY';
    if ($dig10 == '4') $wten = 'FORTY';
    if ($dig10 == '5') $wten = 'FIFTY';
    if ($dig10 == '6') $wten = 'SIXTY';
    if ($dig10 == '7') $wten = 'SEVENTY';
    if ($dig10 == '8') $wten = 'EIGHTY';
    if ($dig10 == '9') $wten = 'NINETY';

    if ($numa == '10') $worda = 'TEN';
    if ($numa == '11') $worda = 'ELEVEN';
    if ($numa == '12') $worda = 'TWELVE';
    if ($numa == '13') $worda = 'THIRTEEN';
    if ($numa == '14') $worda = 'FOURTEEN';
    if ($numa == '15') $worda = 'FIFTEEN';
    if ($numa == '16') $worda = 'SIXTEEN';
    if ($numa == '17') $worda = 'SEVENTEEN';
    if ($numa == '18') $worda = 'EIGHTEEN';
    if ($numa == '19') $worda = 'NINETEEN';

    if ($dig100 == '1') $whun = 'ONE HUNDRED';
    if ($dig100 == '2') $whun = 'TWO HUNDRED';
    if ($dig100 == '3') $whun = 'THREE HUNDRED';
    if ($dig100 == '4') $whun = 'FOUR HUNDRED';
    if ($dig100 == '5') $whun = 'FIVE HUNDRED';
    if ($dig100 == '6') $whun = 'SIX HUNDRED';
    if ($dig100 == '7') $whun = 'SEVEN HUNDRED';
    if ($dig100 == '8') $whun = 'EIGHT HUNDRED';
    if ($dig100 == '9') $whun = 'NINE HUNDRED';

    if ($digs1000 == '1') $wthou1 = 'ONE THOUSAND';
    if ($digs1000 == '2') $wthou1 = 'TWO THOUSAND';
    if ($digs1000 == '3') $wthou1 = 'THREE THOUSAND';
    if ($digs1000 == '4') $wthou1 = 'FOUR THOUSAND';
    if ($digs1000 == '5') $wthou1 = 'FIVE THOUSAND';
    if ($digs1000 == '6') $wthou1 = 'SIX THOUSAND';
    if ($digs1000 == '7') $wthou1 = 'SEVEN THOUSAND';
    if ($digs1000 == '8') $wthou1 = 'EIGHT THOUSAND';
    if ($digs1000 == '9') $wthou1 = 'NINE THOUSAND';

    $wthou = '';
    if ($num > 1000 && (int)$digs1000 < 20) $wthou = $wthou1;

    if ((int)$numa < 10) $worda = $wone;
    if ((int)$numa >= 20 && (int)$dig1 > 0) $worda = $wten . '-' . $wone;
    if ((int)$numa >= 20 && (int)$dig1 == 0) $worda = $wten;

    if ((int)$num < 1000) $word = $whun . ' ' . $worda;
    if ((int)$num < 100)  $word = $worda;
    else                  $word = $wthou . ' ' . $whun . ' ' . $worda;

    // Clean: collapse spaces, lowercase, trim, append place
    $word = preg_replace('/\s+/', ' ', $word);
    $word = trim(strtolower(trim($word)) . ' ' . $decplace);
    $word = preg_replace('/\s+/', ' ', $word);

    // ---- Adaptive box sizing based on answer length ----
    $ansLen = strlen($word);
    if ($ansLen < 12)      { $boxWidth = 220; $boxFont = 22; }
    elseif ($ansLen < 25)  { $boxWidth = 340; $boxFont = 20; }
    elseif ($ansLen < 40)  { $boxWidth = 460; $boxFont = 17; }
    else                   { $boxWidth = 580; $boxFont = 14; }

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $word,
        'qnum'     => $num,
        'boxWidth' => $boxWidth,
        'boxFont'  => $boxFont,
        'lvl'      => $lvl,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#CC0066; font-size:16pt;">'<?php echo htmlspecialchars($result['userAnswer']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:14pt; color:#800080; margin-top:20px;">
        The word for <strong style="color:#CC0066;">0.<?php echo $cur['qnum']; ?></strong> is
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['ans']); ?>'</strong>.
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:24pt; font-weight:700; color:#CC0066; margin:25px 0;">
        0.<?php echo $q['qnum']; ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin-bottom:15px;">
        Type the word for the number above:
    </p>
    <p>
        <input type="text" name="answer"
               maxlength="<?php echo strlen($q['ans']) + 5; ?>"
               style="width:<?php echo $q['boxWidth']; ?>px; height:52px; font-size:<?php echo $q['boxFont']; ?>px; text-align:center; border:2px solid #888; border-radius:8px; color:#0000CC; font-weight:700; padding:0 8px; box-sizing:border-box;"
               spellcheck="false" autocomplete="off" autofocus>
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
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