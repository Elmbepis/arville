<?php
// math/modules/months-of-the-year.php
// Image-free redesign matching days-of-the-week format.
// Six question types: qopt 1-2 (Easy), qopt 3-5 (Hard), qopt 10 (grade 1+).
// Four choices, laid out 2 x 2. Standard container format.

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

$moduleTitle = 'Months of the Year';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Grade from session — legacy never set this, so qopt=10 branch was dead code.
$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

// ============================================================
// HANDLE ANSWER (GET ansclick)
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
        'exp'     => $cur['exp'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION — always 4 choices
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $monthList = ['January','February','March','April','May','June',
                  'July','August','September','October','November','December'];

    if ($grdKey > 0) {
        $qopt = 10;
    } else {
        $qopt = ($lvl === 'Easy') ? rand(1, 2) : rand(3, 5);
    }

    // Repeat prevention — track last 4 answers
    if (!isset($_SESSION[$sessionKey]['last'])) $_SESSION[$sessionKey]['last'] = [];
    $last4 = $_SESSION[$sessionKey]['last'];

    $safety = 0;
    do {
        $ans = $monthList[rand(0, 11)];
        $safety++;
    } while (in_array($ans, $last4, true) && $safety < 50);

    $idx       = array_search($ans, $monthList, true);
    $lastmonth = $monthList[($idx + 11) % 12];
    $nextmonth = $monthList[($idx + 1) % 12];
    $llmonth   = $monthList[($idx + 10) % 12];
    $nnmonth   = $monthList[($idx + 2) % 12];

    $cards = [];   // sequence of ['label' => '…', 'text' => '…']
    $q = '';

    if ($qopt === 1) {
        $q = 'Next month is ____.';
        $exp = "If this month is <strong>$lastmonth</strong>, then next month is <strong>$ans</strong>.";
        $cards = [['label' => 'This month', 'text' => $lastmonth]];
        $shown = [$lastmonth];
    } elseif ($qopt === 2) {
        $q = 'Last month was ____.';
        $exp = "If this month is <strong>$nextmonth</strong>, then last month was <strong>$ans</strong>.";
        $cards = [['label' => 'This month', 'text' => $nextmonth]];
        $shown = [$nextmonth];
    } elseif ($qopt === 3) {
        $q = 'Which month comes next?';
        $exp = "The month after <strong>$llmonth</strong> and <strong>$lastmonth</strong> is <strong>$ans</strong>.";
        $cards = [
            ['label' => 'Month 1', 'text' => $llmonth],
            ['label' => 'Month 2', 'text' => $lastmonth],
            ['label' => 'Month 3', 'text' => '?'],
        ];
        $shown = [$llmonth, $lastmonth];
    } elseif ($qopt === 4) {
        $q = 'What month is in between?';
        $exp = "The month after <strong>$lastmonth</strong> and before <strong>$nextmonth</strong> is <strong>$ans</strong>.";
        $cards = [
            ['label' => 'Month 1', 'text' => $lastmonth],
            ['label' => 'Month 2', 'text' => '?'],
            ['label' => 'Month 3', 'text' => $nextmonth],
        ];
        $shown = [$lastmonth, $nextmonth];
    } elseif ($qopt === 5) {
        $q = 'What month comes before them?';
        $exp = "The month before <strong>$nextmonth</strong> and <strong>$nnmonth</strong> is <strong>$ans</strong>.";
        $cards = [
            ['label' => 'Month 1', 'text' => '?'],
            ['label' => 'Month 2', 'text' => $nextmonth],
            ['label' => 'Month 3', 'text' => $nnmonth],
        ];
        $shown = [$nextmonth, $nnmonth];
    } else {  // qopt 10
        $monthsLong = array_merge($monthList, $monthList, $monthList);
        // Hard = legacy Medium per §E
        $nmonths = ($lvl === 'Easy') ? rand(1, 4) : rand(5, 9);
        $monthWord = ($nmonths === 1) ? 'month' : 'months';
        $dir = rand(1, 2);

        if ($dir === 1) {
            $nmonth1 = rand(4, 10);
            $month1  = $monthsLong[$nmonth1];
            $ans     = $monthsLong[$nmonth1 + $nmonths];
            if ($nmonths > 1) {
                $q   = "What month will it be <strong style=\"color:#CC0066\">$nmonths</strong> $monthWord from now?";
                $exp = "If this month is <strong>$month1</strong>, then it will be <strong>$ans</strong> $nmonths $monthWord from now.";
            } else {
                $q   = 'What month is next month?';
                $exp = "If this month is <strong>$month1</strong>, then next month is <strong>$ans</strong>.";
            }
        } else {
            $nmonth1 = rand(18, 24);
            $month1  = $monthsLong[$nmonth1];
            $ans     = $monthsLong[$nmonth1 - $nmonths];
            if ($nmonths > 1) {
                $q   = "What month was it <strong style=\"color:#CC0066\">$nmonths</strong> $monthWord ago?";
                $exp = "If this month is <strong>$month1</strong>, then $nmonths $monthWord ago it was <strong>$ans</strong>.";
            } else {
                $q   = 'What month was last month?';
                $exp = "If this month is <strong>$month1</strong>, then last month was <strong>$ans</strong>.";
            }
        }
        $cards = [['label' => 'This month', 'text' => $month1]];
        $shown = [$month1];
    }

    // Build 4 distinct choices: answer + 3 distractors
    $ch = [$ans];
    $safety = 0;
    while (count($ch) < 4 && $safety < 100) {
        $r = $monthList[rand(0, 11)];
        if (!in_array($r, $ch, true) && !in_array($r, $shown, true)) {
            $ch[] = $r;
        }
        $safety++;
    }
    shuffle($ch);

    // Update repeat-prevention history (last 4)
    $last4[] = $ans;
    if (count($last4) > 4) $last4 = array_slice($last4, -4);
    $_SESSION[$sessionKey]['last'] = $last4;

    $_SESSION[$sessionKey]['current'] = [
        'cards'   => $cards,
        'q'       => $q,
        'exp'     => $exp,
        'ans'     => $ans,
        'choices' => $ch,
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
    <br>
    <p style="font-size:14pt; color:#666;">
        You clicked on
        <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <div style="max-width:75%; margin:15px auto; font-size:14pt; color:#800080; padding:12px 20px;">
        <?php echo $result['exp']; ?>
    </div>
<?php else: ?>
    <?php
    // Month cards — single or three across
    $cardCount = count($q_curr['cards']);
    $cardW     = $cardCount === 1 ? 400 : 200;
    $cardH     = 110;
    $daySize   = $cardCount === 1 ? '20pt' : '13pt';   // month name
    $labSize   = $cardCount === 1 ? '22pt' : '15pt';   // "This month is …" — bigger
    ?>
    <div style="display:flex; justify-content:center; gap:8px; flex-wrap:wrap; margin:20px 0 25px;">
        <?php foreach ($q_curr['cards'] as $card): ?>
            <div style="width:<?php echo $cardW; ?>px; height:<?php echo $cardH; ?>px; background:#f8f8ff; border:2px solid #b8b8d8; border-radius:10px; display:flex; align-items:center; justify-content:center; box-sizing:border-box; padding:8px; gap:6px; white-space:nowrap;">
                <span style="font-family:Arial,sans-serif; font-size:<?php echo $labSize; ?>; font-weight:700; color:#444444;">
                    <?php echo htmlspecialchars($card['label']); ?> is
                </span>
                <span style="font-family:Arial,sans-serif; font-size:<?php echo $daySize; ?>; font-weight:700; color:<?php echo $card['text'] === '?' ? '#CC0066' : '#222222'; ?>;">
                    <?php echo htmlspecialchars($card['text']); ?>.
                </span>
            </div>
        <?php endforeach; ?>
    </div>

    <p style="font-size:17pt; font-weight:600; color:#800080; margin:20px 0 25px;">
        <?php echo $q_curr['q']; ?>
    </p>

    <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; max-width:440px; margin:0 auto 20px;">
        <?php foreach ($q_curr['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               style="display:block; background:#f0f0f0; border:2px solid #ccc; border-radius:12px; padding:14px 20px; font-size:1.3rem; font-weight:bold; color:#0000BB; text-decoration:none; text-align:center; box-sizing:border-box;">
                <?php echo htmlspecialchars($c); ?>
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