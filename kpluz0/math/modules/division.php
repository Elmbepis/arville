<?php
// math/modules/division.php
//
// COMPUTED-ANSWER / FREE-TEXT module — QEngine not used.
// Answer = quotient (and optionally remainder). Uses container.php + scorer.php only.
//
// Theme test4-* &#8594; paper-69-* (modern 800px container geometry).
//
// GRADE PROGRESSION — $configs table indexed by grade. Each row is:
//   [quotientMin, quotientMax, divisorMin, divisorMax, remainderPct]
// Dividend is derived: quotient × divisor + remainder.
// Grade 9+ clamps to grade 8.
//
// Remainder introduction is progressive:
//   Grades 0-2 : 0%  (no remainder)
//   Grade 3    : 0% Easy, 33% Hard
//   Grade 4    : 33% both
//   Grade 5    : 67% both
//   Grade 6    : 75% both
//   Grade 7-8  : 100% (always remainder)
//
// Show remainder input whenever remainderPct > 0 OR actual remainder > 0.
// This lets grade 4+ students practice "0 remainder" too.
//
// Legacy bugs fixed:
//   - Grade 0 was completely undefined (no ranges) — replaced with table.
//   - `if ($arrnum>8){$arrnum==8;}` (assignment bug) — replaced with
//     grade-keyed table (grade 9+ clamps).
//   - Inconsistent range systems (grades 1-2 hardcoded, grade 3+ tier-based) —
//     unified into one table.
//   - Legacy variable naming inversion ($num1 was quotient, $fac was divisor) —
//     renamed to $quotient / $divisor.
//
// Dual-input scoring — Scorer expects one answer string, so quotient and
// remainder are combined as "{quotient}|{remainder}" on both sides. Both
// canonicalised to ints so "04|0" matches "4|0".
//
// Image asset (optional): math/images/division-symbol.jpg — not used; the
// ÷ character renders natively in the equation card CSS.

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

$moduleTitle = 'Division of Numbers';
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
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];

// Format: [quotientMin, quotientMax, divisorMin, divisorMax, remainderPct]
// Grade N Hard &#8776; Grade N+1 Easy for smooth progression.
$configs = [
    0 => [
        'Easy' => [1, 3,   1, 3,  0],
        'Hard' => [1, 5,   1, 5,  0],
    ],
    1 => [
        'Easy' => [1, 5,   1, 5,  0],
        'Hard' => [2, 12,  2, 10, 0],
    ],
    2 => [
        'Easy' => [2, 12,  2, 10, 0],
        'Hard' => [3, 15,  3, 10, 0],
    ],
    3 => [
        'Easy' => [3, 15,  3, 10, 0],
        'Hard' => [5, 20,  4, 12, 33],
    ],
    4 => [
        'Easy' => [5, 20,  4, 12, 33],
        'Hard' => [10, 30, 5, 15, 33],
    ],
    5 => [
        'Easy' => [10, 30, 5, 15, 67],
        'Hard' => [15, 50, 6, 18, 67],
    ],
    6 => [
        'Easy' => [15, 50, 6, 18, 75],
        'Hard' => [30, 100, 7, 20, 75],
    ],
    7 => [
        'Easy' => [30, 100, 7, 20, 100],
        'Hard' => [50, 200, 8, 25, 100],
    ],
    8 => [
        'Easy' => [50, 200, 8, 25, 100],
        'Hard' => [100, 500, 10, 30, 100],
    ],
];

$gradeKey = min(8, max(0, $grd));
[$qMin, $qMax, $dMin, $dMax, $remPct] = $configs[$gradeKey][$lvl];

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $studentQuotient  = (string)(int)trim((string)($_POST['answer'] ?? '0'));
    $studentRemainder = (string)(int)trim((string)($_POST['ansrem'] ?? '0'));

    $userCombined    = $studentQuotient . '|' . $studentRemainder;
    $correctCombined = (string)$cur['quotient'] . '|' . (string)$cur['remainder'];

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userCombined, $correctCombined, $cur['lvl']);

    $result = [
        'correct'     => $correct,
        'quotient'    => $studentQuotient,
        'remainder'   => $studentRemainder,
        'dividend'    => $cur['dividend'],
        'divisor'     => $cur['divisor'],
        'actualQ'     => $cur['quotient'],
        'actualR'     => $cur['remainder'],
        'showRem'     => $cur['showRem'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $quotient  = rand($qMin, $qMax);
    $divisor   = rand($dMin, $dMax);

    // Remainder: with $remPct% chance non-zero, otherwise 0
    if ($remPct > 0 && $divisor > 1 && rand(1, 100) <= $remPct) {
        $remainder = rand(1, $divisor - 1);
    } else {
        $remainder = 0;
    }

    $dividend = $quotient * $divisor + $remainder;
    $showRem  = ($remPct > 0) || ($remainder > 0);

    $_SESSION[$sessionKey]['current'] = [
        'dividend'  => $dividend,
        'divisor'   => $divisor,
        'quotient'  => $quotient,
        'remainder' => $remainder,
        'showRem'   => $showRem,
        'lvl'       => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render division equation card.
 *   {dividend} ÷ {divisor} = [quotient]  [r  [remainder]]
 * The remainder block is shown only when showRem is true.
 */
function renderDivisionCard($dividend, $divisor, $quotient, $remainder, $showRem, $showInput, $correct = null) {
    $cardClass = 'equation-card';
    if ($correct === true)  $cardClass .= ' correct';
    if ($correct === false) $cardClass .= ' wrong';

    $qDigit = strlen((string)$quotient);
    $rDigit = strlen((string)$remainder);

    $qInputPx = max(70, ($qDigit + 1) * 28 + 20);
    $rInputPx = max(50, ($rDigit + 1) * 24 + 16);
    $qMaxlen  = $qDigit + 1;
    $rMaxlen  = max(2, $rDigit + 1);

    echo '<div class="' . $cardClass . '">';
    echo '<div class="equation-inline" style="flex-wrap: wrap;">';
    echo '<span>' . $dividend . '</span>';
    echo '<span class="op">&divide;</span>';
    echo '<span>' . $divisor . '</span>';
    echo '<span class="op">=</span>';

    if ($showInput) {
        echo '<input type="text" name="answer" maxlength="' . $qMaxlen . '"'
           . ' style="width:' . $qInputPx . 'px;" autocomplete="off" autofocus>';
    } else {
        $ansColor = ($correct === true) ? '#4caf50' : '#e53935';
        echo '<span style="color:' . $ansColor . ';">' . $quotient . '</span>';
    }

    if ($showRem) {
        echo '<span class="op" style="font-size: 22pt; margin-left: 12px;">r</span>';
        if ($showInput) {
            echo '<input type="text" name="ansrem" maxlength="' . $rMaxlen . '"'
               . ' style="width:' . $rInputPx . 'px;" autocomplete="off">';
        } else {
            $remColor = ($correct === true) ? '#4caf50' : '#e53935';
            echo '<span style="color:' . $remColor . ';">' . $remainder . '</span>';
        }
    }

    echo '</div>';
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
            Your answer:
            <strong><?php echo htmlspecialchars($result['quotient']); ?></strong><?php
            if ($result['showRem']) {
                echo ' remainder <strong>' . htmlspecialchars($result['remainder']) . '</strong>';
            }
            ?>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <?php renderDivisionCard(
            $result['dividend'], $result['divisor'],
            $result['actualQ'], $result['actualR'],
            $result['showRem'], false, $result['correct']
        ); ?>
    <?php else: ?>
        <br>
        <?php renderDivisionCard(
            $q['dividend'], $q['divisor'],
            $q['quotient'], $q['remainder'],
            $q['showRem'], true
        ); ?>
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