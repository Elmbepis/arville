<?php
// math/modules/days-of-the-week.php
// Image-free redesign. Six question types: qopt 1-2 (Easy), qopt 3-5 (Hard),
// qopt 10 (grade 1+). Four choices, laid out 2 x 2. Standard container format.

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

$moduleTitle = 'Days of the Week';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

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
        'exp'     => $cur['exp'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION — always 4 choices
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $dayNames = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

    if ($grdKey > 0) {
        $qopt = 10;
    } else {
        $qopt = ($lvl === 'Easy') ? rand(1, 2) : rand(3, 5);
    }

    $ans = $dayNames[rand(0, 6)];
    $idx = array_search($ans, $dayNames, true);
    $yday  = $dayNames[($idx + 6) % 7];
    $tom   = $dayNames[($idx + 1) % 7];
    $yyday = $dayNames[($idx + 5) % 7];
    $ttom  = $dayNames[($idx + 2) % 7];

    $cards = [];   // sequence of ['label' => '…', 'text' => '…']
    $q = '';

    if ($qopt === 1) {
        $q = 'What day is tomorrow?';
        $exp = "If today is <strong>$yday</strong>, then tomorrow is <strong>$ans</strong>.";
        $cards = [['label' => 'Today', 'text' => $yday]];
        $ch = [$ans, $yyday, $ttom];
        $tries = 0;
        do { $r = $dayNames[rand(0, 6)]; $tries++; }
        while (in_array($r, [$ans, $yday, $yyday, $ttom], true) && $tries < 50);
        $ch[] = $r;
        shuffle($ch);
    } elseif ($qopt === 2) {
        $q = 'What day was yesterday?';
        $exp = "If today is <strong>$tom</strong>, then yesterday was <strong>$ans</strong>.";
        $cards = [['label' => 'Today', 'text' => $tom]];
        $ch = [$ans, $ttom, $yday];
        $tries = 0;
        do { $r = $dayNames[rand(0, 6)]; $tries++; }
        while (in_array($r, [$ans, $tom, $ttom, $yday], true) && $tries < 50);
        $ch[] = $r;
        shuffle($ch);
    } elseif ($qopt === 3) {
        $q = 'What is the third day?';
        $exp = "The day after <strong>$yyday</strong> and <strong>$yday</strong> is <strong>$ans</strong>.";
        $cards = [
            ['label' => 'Day 1', 'text' => $yyday],
            ['label' => 'Day 2', 'text' => $yday],
            ['label' => 'Day 3', 'text' => '?'],
        ];
        $ch = [$ans, $tom, $ttom];
        $tries = 0;
        do { $r = $dayNames[rand(0, 6)]; $tries++; }
        while (in_array($r, [$ans, $yyday, $yday, $tom, $ttom], true) && $tries < 50);
        $ch[] = $r;
        shuffle($ch);
    } elseif ($qopt === 4) {
        $q = 'What day is in between?';
        $exp = "The day after <strong>$yday</strong> and before <strong>$tom</strong> is <strong>$ans</strong>.";
        $cards = [
            ['label' => 'Day 1', 'text' => $yday],
            ['label' => 'Day 2', 'text' => '?'],
            ['label' => 'Day 3', 'text' => $tom],
        ];
        $ch = [$ans, $yyday, $ttom];
        $tries = 0;
        do { $r = $dayNames[rand(0, 6)]; $tries++; }
        while (in_array($r, [$ans, $yday, $tom, $yyday, $ttom], true) && $tries < 50);
        $ch[] = $r;
        shuffle($ch);
    } elseif ($qopt === 5) {
        $q = 'What is the first day?';
        $exp = "The day before <strong>$tom</strong> and <strong>$ttom</strong> is <strong>$ans</strong>.";
        $cards = [
            ['label' => 'Day 1', 'text' => '?'],
            ['label' => 'Day 2', 'text' => $tom],
            ['label' => 'Day 3', 'text' => $ttom],
        ];
        $ch = [$ans, $yday, $yyday];
        $tries = 0;
        do { $r = $dayNames[rand(0, 6)]; $tries++; }
        while (in_array($r, [$ans, $tom, $ttom, $yday, $yyday], true) && $tries < 50);
        $ch[] = $r;
        shuffle($ch);
    } else {  // qopt 10
        $days28  = array_merge($dayNames, $dayNames, $dayNames, $dayNames);
        $ndays   = ($lvl === 'Easy') ? rand(1, 4) : rand(5, 8);
        $dayWord = ($ndays === 1) ? 'day' : 'days';
        $dir     = rand(1, 2);
        if ($dir === 1) {
            $nday1 = rand(0, 6);
            $day1  = $days28[$nday1];
            $ans   = $days28[$nday1 + $ndays];
            $q     = "What day will it be <strong style=\"color:#CC0066\">$ndays</strong> $dayWord from now?";
            $exp   = "If today is <strong>$day1</strong>, then it will be <strong>$ans</strong> $ndays $dayWord from now.";
            $cards = [['label' => 'Today', 'text' => $day1]];
        } else {
            $nday1 = rand(18, 24);
            $day1  = $days28[$nday1];
            $ans   = $days28[$nday1 - $ndays];
            $q     = "What day was it <strong style=\"color:#CC0066\">$ndays</strong> $dayWord ago?";
            $exp   = "If today is <strong>$day1</strong>, then it was <strong>$ans</strong> $ndays $dayWord ago.";
            $cards = [['label' => 'Today', 'text' => $day1]];
        }
        $ch = [$ans];
        $tries = 0;
        while (count($ch) < 4 && $tries < 50) {
            $r = $dayNames[rand(0, 6)];
            if (!in_array($r, $ch, true)) $ch[] = $r;
            $tries++;
        }
        shuffle($ch);
    }

    $_SESSION[$sessionKey]['current'] = [
        'cards' => $cards,
        'q'     => $q,
        'exp'   => $exp,
        'ans'   => $ans,
        'choices' => $ch,
        'lvl'   => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/paper-70-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-70-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-70-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-70-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-70-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-70-bottom.jpg',
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
    // Day cards — single line: "Today is Tuesday." / "Day 2 is Wednesday."
    $cardCount = count($q_curr['cards']);
    $cardW     = $cardCount === 1 ? 320 : 200;
    $cardH     = 110;
    $daySize   = $cardCount === 1 ? '20pt' : '14pt';   // day name — unchanged from prior
    $labSize   = $cardCount === 1 ? '20pt' : '14pt';   // "Today is …" — a bit bigger
    ?>
    <div style="display:flex; justify-content:center; gap:8px; flex-wrap:wrap; margin:20px 0 25px;">
        <?php foreach ($q_curr['cards'] as $card): ?>
            <div style="width:<?php echo $cardW; ?>px; height:<?php echo $cardH; ?>px; background:#f8f8ff; border:2px solid #b8b8d8; border-radius:10px; display:flex; align-items:center; justify-content:center; box-sizing:border-box; padding:8px; gap:6px; white-space:nowrap;">
                <span style="font-family:Arial,sans-serif; font-size:<?php echo $labSize ?>; font-weight:700; color:#444444;">
                    <?php echo htmlspecialchars($card['label']); ?> is<br/>
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