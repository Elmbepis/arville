<?php
// math/modules/geom-shapes-solids.php
// PROCEDURAL shape/solid identification + choice. Bypass QEngine per §D.
// Converted from legacy inline-MCQ to standard MCQ template.
//
// Two question forms alternate randomly:
//   Form 1: identify a SHAPE (polygon or circle)
//   Form 2: identify a SOLID (3D shape)
//
// Levels merged per §E:
//   Easy = simple shapes 1-9 (square&#8594;nonagon), solids 1-5 (cube&#8594;square pyramid)
//   Hard = complex shapes 7-15 (heptagon&#8594;pentadecagon), solids 3-6 (cone&#8594;rectangular pyramid)
//
// Layout rule: 4 choices always render ONE PER LINE (4 rows, centered).
//   Shape/solid names are long enough that a 2×2 grid or 4-across row
//   crowds them — the vertical stack reads more clearly for young students
//   and gives each word breathing room.
//
// Feedback layout: image is display:block + margin: 16px auto 48px auto so it
// is horizontally centered and has an explicit 48px gap to the New Question
// button. Combined with the button's 30px top margin, that's 78px of vertical
// space between the image and the button.
//
// Preserved legacy feature: polygon answers show "because it has N equal sides"
// in the feedback (5-15 sides). Squares, rectangles, triangles, circles, and
// all solids do NOT have the side-count explanation.
//
// §H bug fix: legacy distractor loop used $solidcount=5 for a 6-item $solids
// array, so "rectangular pyramid" could never appear as a distractor (only as
// an answer, in Hard mode). Now uses full pool — all 6 solids participate.
//
// Theme: test52-* (136/547/136) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1 default.
// DB row required: modules.url = 'geom-shapes-solids.php'

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

$moduleTitle = 'Geometric Shapes and Solids';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Polygon &#8594; number of equal sides (for feedback explanation)
$polygonSides = [
    'pentagon' => 5, 'hexagon' => 6, 'heptagon' => 7, 'octagon' => 8,
    'nonagon' => 9, 'decagon' => 10, 'hendecagon' => 11, 'dodecagon' => 12,
    'tridecagon' => 13, 'tetradecagon' => 14, 'pentadecagon' => 15,
];

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $shapes = [
        1 => "square", 2 => "rectangle", 3 => "triangle", 4 => "circle",
        5 => "pentagon", 6 => "hexagon", 7 => "heptagon", 8 => "octagon",
        9 => "nonagon", 10 => "decagon", 11 => "hendecagon", 12 => "dodecagon",
        13 => "tridecagon", 14 => "tetradecagon", 15 => "pentadecagon",
    ];
    $solids = [
        1 => "cube", 2 => "sphere", 3 => "cone", 4 => "cylinder",
        5 => "square pyramid", 6 => "rectangular pyramid",
    ];

    $form = rand(1, 2);   // 1 = shape, 2 = solid

    if ($form == 1) {
        if ($lvl === 'Easy') { $ansIdx = rand(1, 9); $poolStart = 1; }
        else                 { $ansIdx = rand(7, 15); $poolStart = 5; }
        $answer   = $shapes[$ansIdx];
        $itemPool = $shapes;
        $s        = 'shape';
        $imgDir   = 'shapes';
    } else {
        if ($lvl === 'Easy') { $ansIdx = rand(1, 5); $poolStart = 1; }
        else                 { $ansIdx = rand(3, 6); $poolStart = 2; }
        $answer   = $solids[$ansIdx];
        $itemPool = $solids;
        $s        = 'solid';
        $imgDir   = 'solids';
    }

    // Build distractor pool: exclude answer, restrict to level's range
    $distractorIdx = [];
    foreach (array_keys($itemPool) as $idx) {
        if ($idx !== $ansIdx && $idx >= $poolStart) $distractorIdx[] = $idx;
    }
    shuffle($distractorIdx);
    $distractors = [];
    foreach ($distractorIdx as $idx) {
        $candidate = $itemPool[$idx];
        if (!in_array($candidate, $distractors, true) && $candidate !== $answer && count($distractors) < 3) {
            $distractors[] = $candidate;
        }
        if (count($distractors) >= 3) break;
    }

    // Safety: pad if short (should not fire)
    $pad = 1;
    while (count($distractors) < 3 && $pad <= 20) {
        $candidate = 'item-' . $pad;
        if (!in_array($candidate, $distractors, true) && $candidate !== $answer) {
            $distractors[] = $candidate;
        }
        $pad++;
    }

    $allChoices = array_merge([$answer], $distractors);
    shuffle($allChoices);

    // Image: 1-3 variants per shape/solid
    $imgVariant = rand(1, 3);
    $imageUrl   = $base . '/math/images/' . $imgDir . '/' . $answer . '-' . $imgVariant . '.jpg';

    $_SESSION[$sessionKey]['current'] = [
        'answer'  => $answer,
        'choices' => $allChoices,
        'image'   => $imageUrl,
        's'       => $s,
        'lvl'     => $lvl,
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
<style>
  /* 4 choices always in a single vertical column (one per line). */
  .choice-grid-1col {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .choice-grid-1col > div { display: contents; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php
        $cur = $result['cur'];
        $explain = '';
        if (isset($polygonSides[$cur['answer']])) {
            $explain = ' because it has ' . $polygonSides[$cur['answer']] . ' equal sides';
        }
    ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#800080; margin-top:24px;">
        The <?php echo htmlspecialchars($cur['s']); ?> shown is a
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong><?php echo $explain; ?>.
    </p>

    <!-- Image: display:block + auto left/right margin centers horizontally;
         48px bottom margin gives explicit vertical space before the button
         (button has 30px top margin &#8594; 78px total gap). -->
    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="<?php echo htmlspecialchars($cur['answer']); ?>"
         style="display: block; margin: 16px auto 48px auto; max-width:280px; border:1px solid #ccc; border-radius:6px;"
         onerror="this.style.display='none';">

    <input type="submit" name="Submit2" value="New Question" style="margin:0 auto 30px auto; display: inline-block;">
<?php else: ?>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin-top:20px;">
        Click on the name of this <?php echo htmlspecialchars($q['s']); ?>:
    </p>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt="<?php echo htmlspecialchars($q['s']); ?>"
         style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:16px 0;"
         onerror="this.style.display='none'; this.nextSibling.style.display='block';">
    <p style="display:none; color:#CC0000; font-size:12pt;">Image not found — check <code>math/images/<?php echo htmlspecialchars($q['s']); ?>s/</code></p>

    <div class="choice-grid-1col">
        <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    </div>

    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
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