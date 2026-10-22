<?php
// math/modules/visualizing-numbers.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used.
// Answer = thousands*1000 + hundreds*100 + tens*10 + ones (total square count).
// Uses container.php + scorer.php only.
//
// Theme paper74-* &#8594; paper-69-* (modern 800px container geometry).
// Score box uses the module's OWN score-*-1b images — drop-in compatible
// with the container's 114×85 / 114×60 widget dimensions.
//
// DIFFICULTY — Hard uses legacy Medium ranges (matching the recent
// addition/subtraction/multiplication calibration). Numbers progress
// gently with grade. See $configs for the table.
//
// Blocks shown (matching legacy layout):
//   thousands  &#8594; 1000-value blocks, 3 per row
//   hundreds   &#8594; 100-value blocks, 4 per row
//   tens       &#8594; 10-value blocks, single row
//   ones       &#8594; 1-value blocks, 5 per row
//
// Image assets: math/books/images/vis-num-{1000,100,10,1}.jpg
// (This is the "books" subdir — unusual path, preserved from legacy.)

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

$moduleTitle = 'Visualizing Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    // Module's own score-box images — drop-in compatible
    'score_top'     => $base . '/math/images/score-top-1b.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1b.jpg',
];

$blockBase = $base . '/math/books/images';

// Each config: thousands range, hundreds range, min for filtering.
// Tens and ones are always 1-9 (preserved from legacy — never 0).
// Hard = legacy Medium ranges.
$configs = [
    0 => [ // grades 0-1
        'Easy' => ['thousands' => [0, 0], 'hundreds' => [0, 0], 'min' => 11],
        'Hard' => ['thousands' => [0, 0], 'hundreds' => [0, 1], 'min' => 101],
    ],
    2 => [
        'Easy' => ['thousands' => [0, 0], 'hundreds' => [0, 3], 'min' => 50],
        'Hard' => ['thousands' => [0, 0], 'hundreds' => [1, 6], 'min' => 201],
    ],
    3 => [
        'Easy' => ['thousands' => [0, 1], 'hundreds' => [0, 6], 'min' => 201],
        'Hard' => ['thousands' => [1, 3], 'hundreds' => [4, 9], 'min' => 601],
    ],
    4 => [ // grades 4+
        'Easy' => ['thousands' => [1, 3], 'hundreds' => [0, 6], 'min' => 1001],
        'Hard' => ['thousands' => [2, 6], 'hundreds' => [4, 9], 'min' => 2501],
    ],
];

// Grade 0,1 &#8594; 0; grade 2 &#8594; 2; grade 3 &#8594; 3; grade 4+ &#8594; 4.
$gradeKey = $grd <= 1 ? 0 : min(4, $grd);
$cfg      = $configs[$gradeKey][$lvl];

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
        'correct'   => $correct,
        'answer'    => $userInput,
        'ans'       => $cur['ans'],
        'thousands' => $cur['thousands'],
        'hundreds'  => $cur['hundreds'],
        'tens'      => $cur['tens'],
        'ones'      => $cur['ones'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Retry until total >= min (matters mostly at grades 2-3)
    do {
        $thousands = rand($cfg['thousands'][0], $cfg['thousands'][1]);
        $hundreds  = rand($cfg['hundreds'][0],  $cfg['hundreds'][1]);
        $tens      = rand(1, 9);
        $ones      = rand(1, 9);
        $ans       = $thousands * 1000 + $hundreds * 100 + $tens * 10 + $ones;
    } while ($ans < $cfg['min']);

    $_SESSION[$sessionKey]['current'] = [
        'thousands' => $thousands,
        'hundreds'  => $hundreds,
        'tens'      => $tens,
        'ones'      => $ones,
        'ans'       => $ans,
        'lvl'       => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render the block display for a given place-value decomposition.
 * Layout: thousands 3-per-row, hundreds 4-per-row, tens+ones side-by-side
 * (tens unbroken, ones 5-per-row). Matches legacy structure.
 */
function renderVisBlocks($thousands, $hundreds, $tens, $ones, $blockBase) {
    $imgStyle = 'display:inline-block; margin:3px; vertical-align:middle;';
    $out  = '<div style="text-align:center; margin: 20px auto; padding: 20px;'
          . ' background:#fafaff; border:2px solid #d0d0e8; border-radius:16px;'
          . ' display:inline-block; max-width:100%;">';

    if ($thousands > 0) {
        $out .= '<div style="margin-bottom:12px;">';
        for ($i = 1; $i <= $thousands; $i++) {
            $out .= '<img src="' . htmlspecialchars($blockBase . '/vis-num-1000.jpg') . '" alt="" style="' . $imgStyle . '">';
            if ($i % 3 === 0 && $i < $thousands) $out .= '<br>';
        }
        $out .= '</div>';
    }

    if ($hundreds > 0) {
        $out .= '<div style="margin-bottom:12px;">';
        for ($i = 1; $i <= $hundreds; $i++) {
            $out .= '<img src="' . htmlspecialchars($blockBase . '/vis-num-100.jpg') . '" alt="" style="' . $imgStyle . '">';
            if ($i % 4 === 0 && $i < $hundreds) $out .= '<br>';
        }
        $out .= '</div>';
    }

    if ($tens > 0 || $ones > 0) {
        $out .= '<div style="display:flex; justify-content:center; gap:30px; flex-wrap:wrap; align-items:flex-start;">';
        if ($tens > 0) {
            $out .= '<div>';
            for ($i = 1; $i <= $tens; $i++) {
                $out .= '<img src="' . htmlspecialchars($blockBase . '/vis-num-10.jpg') . '" alt="" style="' . $imgStyle . '">';
            }
            $out .= '</div>';
        }
        if ($ones > 0) {
            $out .= '<div>';
            for ($i = 1; $i <= $ones; $i++) {
                $out .= '<img src="' . htmlspecialchars($blockBase . '/vis-num-1.jpg') . '" alt="" style="' . $imgStyle . '">';
                if ($i % 5 === 0 && $i < $ones) $out .= '<br>';
            }
            $out .= '</div>';
        }
        $out .= '</div>';
    }

    $out .= '</div>';
    return $out;
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
        <?php if (!$result['correct']): ?>
            <p style="font-size:15pt; font-weight:700; color:#800080;">
                The correct answer is <strong><?php echo $result['ans']; ?></strong>.
            </p>
        <?php endif; ?>
        <?php echo renderVisBlocks($result['thousands'], $result['hundreds'], $result['tens'], $result['ones'], $blockBase); ?>
    <?php else: ?>
        <br>
        <?php echo renderVisBlocks($q['thousands'], $q['hundreds'], $q['tens'], $q['ones'], $blockBase); ?>
        <br>
        <p style="font-size:16pt; font-weight:700; color:#800080; margin:15px 0;">
            How many squares are there?
        </p>
        <?php
        $ansDigits = max(2, strlen((string)$q['ans']));
        $inputPx   = $ansDigits * 28 + 50;
        ?>
        <input type="text" name="answer" class="answer-input"
               style="width:<?php echo $inputPx; ?>px; height:42px; font-size:26px;"
               maxlength="<?php echo $ansDigits + 1; ?>"
               autocomplete="off" autofocus>
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