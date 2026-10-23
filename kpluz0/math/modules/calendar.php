<?php
// math/modules/calendar.php
// Computed text-choice. Single difficulty (Easy). Reference calendar image
// is shown above the question; student reads the calendar to determine the
// weekday. Bypasses QEngine; uses render_choices.

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

$moduleTitle = 'Using a Calendar';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy'];
$lvl         = 'Easy';

// ============================================================
// HANDLE ANSWER (GET ansclick)
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, $cur['ans'], $lvl);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $click,
        'ans'     => $cur['ans'],
        'q'       => $cur['question'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $dayNames = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    $monthNames = ['X','January','February','March','April','May','June',
                   'July','August','September','October','November','December'];

    // Random date in 2020 (matches calendar1.jpg)
    $m = rand(1, 12);
    $d = ($m === 2) ? rand(1, 28) : rand(1, 30);

    $dt  = strtotime("2020-$m-$d");
    $ans = date('l', $dt);   // full weekday name

    $question = 'What day was ' . $monthNames[$m] . ' ' . $d . ', 2020?';

    // 3 distinct distractor day names
    $ch = [$ans];
    $tries = 0;
    while (count($ch) < 4 && $tries < 50) {
        $r = $dayNames[array_rand($dayNames)];
        if (!in_array($r, $ch, true)) $ch[] = $r;
        $tries++;
    }
    shuffle($ch);

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'choices'  => $ch,
        'question' => $question,
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

<div style="margin:15px 0;">
    <img src="<?php echo $base; ?>/math/images/others/calendar1.jpg"
         style="max-width:100%; border:1px solid #ccc; border-radius:6px;">
</div>

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666;">
        Your answer:
        <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin:15px 0;">
        <?php echo htmlspecialchars($result['q']); ?>
        <br>
        Answer: <strong style="color:#CC0066; font-size:16pt;"><?php echo htmlspecialchars($result['ans']); ?></strong>
    </p>
<?php else: ?>
    <p style="font-size:17pt; font-weight:600; color:#333333; margin:20px 0 8px;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin:8px 0 20px;">
        Click on your answer.
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
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();