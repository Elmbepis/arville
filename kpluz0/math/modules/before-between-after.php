<?php
// math/modules/before-between-after.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used.
// Uses container.php + scorer.php only.
//
// THEME — paper-70-* series. Side widths (75/655/70) match container exactly,
// so we keep the module's own frame. Per recent "use own theme if fits" rule.
//
// QUESTION TYPES (equally weighted):
//   before  &#8594; 3 boxes [?][n+1][n+2], answer = n
//   between &#8594; 3 boxes [n][?][n+2],   answer = n+1
//   after   &#8594; 3 boxes [n][n+1][?],   answer = n+2
//
// GRADE PROGRESSION — grade-keyed table. Hard &#8776; next grade's Easy.
// Grade 7+ clamps to grade 6.

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

$moduleTitle = 'Numbers Before, Between, & After';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

// Theme: paper-70-* fits container exactly (75/655/70)
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

// Number ranges per grade — starting number n for a before/between/after
// triplet [n, n+1, n+2]. Hard &#8776; next grade Easy.
$configs = [
    0 => ['Easy' => [1, 10],    'Hard' => [11, 30]],
    1 => ['Easy' => [1, 20],    'Hard' => [11, 50]],
    2 => ['Easy' => [10, 50],   'Hard' => [20, 100]],
    3 => ['Easy' => [20, 100],  'Hard' => [50, 500]],
    4 => ['Easy' => [50, 500],  'Hard' => [100, 1000]],
    5 => ['Easy' => [100, 1000],'Hard' => [500, 5000]],
    6 => ['Easy' => [500, 5000],'Hard' => [1000, 10000]],
];
$gradeKey = min(6, max(0, $grd));
[$nMin, $nMax] = $configs[$gradeKey][$lvl];

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userInput = (string)(int)trim((string)($_POST['answer'] ?? '0'));

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userInput, (string)$cur['ans'], $cur['lvl']);

    $result = [
        'correct' => $correct,
        'answer'  => $userInput,
        'ans'     => $cur['ans'],
        'triplet' => $cur['triplet'],
        'missing' => $cur['missing'], // 0, 1, or 2 — which of triplet is "?"
        'type'    => $cur['type'],    // 'before' | 'between' | 'after'
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $n = rand($nMin, $nMax);
    $triplet = [$n, $n + 1, $n + 2];

    $type = ['before', 'between', 'after'][rand(0, 2)];
    switch ($type) {
        case 'before':  $missing = 0; break; // ?  n+1  n+2 &#8594; answer n
        case 'between': $missing = 1; break; // n  ?    n+2 &#8594; answer n+1
        default:        $missing = 2; break; // n  n+1  ?   &#8594; answer n+2
    }

    $_SESSION[$sessionKey]['current'] = [
        'triplet' => $triplet,
        'missing' => $missing,
        'type'    => $type,
        'ans'     => $triplet[$missing],
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render a row of 3 number boxes. $missing index renders "?" in accent.
 * Font-size scales down with digit count so 5-digit numbers fit.
 */
function renderTripletRow($triplet, $missing) {
    $maxDigits = 1;
    foreach ($triplet as $t) {
        $maxDigits = max($maxDigits, strlen((string)$t));
    }
    $fontPt = 42;
    if ($maxDigits >= 4) $fontPt = 34;
    if ($maxDigits >= 5) $fontPt = 28;
    if ($maxDigits >= 6) $fontPt = 24;

    echo '<div style="display:flex; justify-content:center; gap:20px;'
       . ' flex-wrap:wrap; margin:20px 0;">';
    foreach ($triplet as $i => $v) {
        $isMissing = ($i === $missing);
        $bg     = $isMissing ? '#fff3f8' : '#f8f8ff';
        $border = $isMissing ? '#CC0066' : '#b0b0d8';
        $color  = $isMissing ? '#CC0066' : '#800080';
        echo '<div style="min-width:130px; min-height:130px; display:inline-flex;'
           . ' align-items:center; justify-content:center;'
           . ' background:' . $bg . '; border:3px solid ' . $border . ';'
           . ' border-radius:16px; padding:15px 20px; box-sizing:border-box;'
           . ' font-family:\'Comic Sans MS\',sans-serif;'
           . ' font-size:' . $fontPt . 'pt; font-weight:700; color:' . $color . ';">'
           . ($isMissing ? '?' : $v)
           . '</div>';
    }
    echo '</div>';
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <?php if ($result !== null): ?>
        <br>
        <p style="font-size:14pt; color:#666;">
            Your answer: <strong><?php echo htmlspecialchars($result['answer']); ?></strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <?php
        // Feedback text differs by type
        $t = $result['triplet'];
        $ans = $result['ans'];
        switch ($result['type']) {
            case 'before':
                $feedback = "The number <strong>$ans</strong> comes before {$t[1]}.";
                break;
            case 'between':
                $feedback = "The number <strong>$ans</strong> is between {$t[0]} and {$t[2]}.";
                break;
            default:
                $feedback = "The number <strong>$ans</strong> comes after {$t[1]}.";
        }
        ?>
        <p style="font-size:15pt; font-weight:700; color:#800080;">
            <?php echo $feedback; ?>
        </p>
        <?php
        // Show full triplet with missing position filled in
        $filled = $result['triplet'];
        renderTripletRow($filled, -1);
        ?>
    <?php else: ?>
        <br>
        <?php renderTripletRow($q['triplet'], $q['missing']); ?>

        <p style="font-size:16pt; font-weight:700; color:#800080; margin:20px 0;">
            <?php
            $t = $q['triplet'];
            switch ($q['type']) {
                case 'before':
                    echo "What number comes before " . $t[1] . "?";
                    break;
                case 'between':
                    echo "What number is between " . $t[0] . " and " . $t[2] . "?";
                    break;
                default:
                    echo "What number comes after " . $t[1] . "?";
            }
            ?>
        </p>

        <p style="font-size:15pt; font-weight:700; color:#0000AA;">
            Answer:
            <input type="text" name="answer" class="answer-input"
                   style="width:100px; height:44px; font-size:28px;" maxlength="6"
                   autocomplete="off" autofocus>
        </p>
    <?php endif; ?>

    <div>
        <?php if ($result === null): ?>
            <input type="submit" name="Submit1" value="Submit">
            <span style="display:inline-block; width: 20px;"></span>
        <?php endif; ?>
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin: 30px 0;"<?php endif; ?>>
    </div>

    <div align="center" style="margin-top: 20px;">
        <p style="margin-top: 5px; margin-bottom: 0">
            <font face="Verdana" style="font-size: 10pt;" color="#000080">
                Select difficulty level for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size: 9pt;">
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