<?php
// math/modules/visual-patterns.php
//
// Converts legacy visual-patterns.php to the modern layout/scorer flow.
//
// COMPUTED-ANSWER module — QEngine not used. The pattern display is inline
// HTML (mixed <img> tags and template characters like "ABABABA"), which
// QEngine's text-only prompt can't express. Uses container.php + scorer.php.
//
// Level merge: Easy = legacy Easy, Hard = legacy Hard. Medium dropped —
// but no loss, because Medium's pools overlap Easy (grade>=1) and Hard
// (grade<1), which are still reachable.
//
// Legacy bugs fixed:
//   1. $grd was never set &#8594; always 0 &#8594; grade-2+ students never reached
//      higher pattern pools. Now reads $_SESSION['grade'] ?? 0 (matches
//      shapes.php convention). Behaviour change: grade-2+ students now
//      get grade-appropriate patterns and the correct Hard-mode prompt.
//   2. The "next" vs "completion" prompt style formula
//        (($grd<1 && lvl!='Hard') || lvl=='Easy')
//      simplifies to (lvl=='Easy' || ($grd<1 && lvl=='Hard')). Preserved.
//
// Legacy flow preserved:
//   - pattern picked from pool based on level × grade
//   - answer position: last char for "next" style; random non-last for
//     "completion" style
//   - 3 choice images: A, B, C — sent as indices 1, 2, 3 (order shuffled)
//   - correct image = img[answer_index]; on result, shown as the "correct"
//     reference image

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

$moduleTitle = 'Analyzing Visual Patterns';
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

$patternImgDir = $base . '/math/images/objects/patterns';
$qmark         = $patternImgDir . '/qmark.jpg';

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $selected = (string)$_GET['ansclick'];

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($selected, (string)$cur['answer'], $cur['lvl']);

    $result = [
        'correct'      => $correct,
        'selected'     => $selected,
        'answer'       => $cur['answer'],
        'patternHTML'  => $cur['patternHTML'],
        'correctImage' => $cur['img'][(int)$cur['answer']],
        'isNextStyle'  => $cur['isNextStyle'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // Pattern pool by level × grade (matches legacy structure)
    if ($lvl === 'Easy') {
        $patterns = ($grd < 1) ? ['ABABABA'] : ['AABAABA', 'ABBABBA', 'AABBAAB'];
    } else {
        $patterns = ($grd < 1) ? ['ABCABCABC', 'AABBCCAAB'] : ['ABACABACA', 'AABCAABCA'];
    }
    $pattern = $patterns[array_rand($patterns)];

    // Prompt style — legacy formula reduced to:
    //   Easy: always "next" style
    //   Hard: "next" if grade<1, "completion" otherwise
    $isNextStyle = ($lvl === 'Easy') || ($grd < 1 && $lvl === 'Hard');

    if ($isNextStyle) {
        $ans      = substr($pattern, -1, 1);
        $qpattern = substr_replace($pattern, 'X', -1, 1);
    } else {
        $pos      = rand(0, strlen($pattern) - 2);
        $ans      = substr($pattern, $pos, 1);
        $qpattern = substr_replace($pattern, 'X', $pos, 1);
    }

    // Image selection — 3 distinct images; obj3 comes from a narrower range
    // (11-16) per legacy so the third image is more likely similar to the
    // first two at a glance (harder distractor).
    $obj1 = rand(11, 26);
    do { $obj2 = rand(11, 26); } while ($obj2 === $obj1);
    do { $obj3 = rand(11, 16); } while ($obj3 === $obj1 || $obj3 === $obj2);

    $img = [
        1 => $patternImgDir . '/' . $obj1 . '.jpg',
        2 => $patternImgDir . '/' . $obj2 . '.jpg',
        3 => $patternImgDir . '/' . $obj3 . '.jpg',
    ];

    // Build pattern HTML (A/B/C &#8594; images; X &#8594; question mark)
    $patternHTML = str_replace('A', '<img src="' . htmlspecialchars($img[1]) . '" alt="A">', $qpattern);
    $patternHTML = str_replace('B', '<img src="' . htmlspecialchars($img[2]) . '" alt="B">', $patternHTML);
    $patternHTML = str_replace('C', '<img src="' . htmlspecialchars($img[3]) . '" alt="C">', $patternHTML);
    $patternHTML = str_replace('X', '<img src="' . htmlspecialchars($qmark)  . '" alt="?">', $patternHTML);

    $ansIndex = ($ans === 'A') ? 1 : (($ans === 'B') ? 2 : 3);

    $_SESSION[$sessionKey]['current'] = [
        'answer'      => (string)$ansIndex,
        'img'         => $img,
        'patternHTML' => $patternHTML,
        'isNextStyle' => $isNextStyle,
        'lvl'         => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">

    <?php if ($result !== null): ?>
        <br><br>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <p style="font-size:14pt; color:#800080;">
            <?php echo $result['isNextStyle']
                ? 'The next image in this pattern:'
                : 'The missing image in this pattern:'; ?>
        </p>
        <div class="pattern-display"><?php echo $result['patternHTML']; ?></div>
        <p style="font-size:14pt; color:#800080;">is this:</p>
        <img src="<?php echo htmlspecialchars($result['correctImage']); ?>" alt="correct"
             style="border:2px solid #ccc; border-radius:8px; margin:10px 0;">
    <?php else: ?>
        <br><br>
        <p style="font-size:16pt; font-weight:700; color:#800080;">Look at this pattern:</p>
        <div class="pattern-display"><?php echo $q['patternHTML']; ?></div>
        <br>
        <p style="font-size:16pt; font-weight:700; color:#800080;">
            <?php echo $q['isNextStyle'] ? 'Which comes next?' : 'Which of these completes it?'; ?>
        </p>
        <p style="font-size:14pt; color:#444;">Click on your answer below:</p>
        <?php
        $items = [
            ['value' => '1', 'image' => $q['img'][1], 'alt' => 'Choice 1'],
            ['value' => '2', 'image' => $q['img'][2], 'alt' => 'Choice 2'],
            ['value' => '3', 'image' => $q['img'][3], 'alt' => 'Choice 3'],
        ];
        // Visual shuffle — 'value' stays attached to its image, only display order changes
        shuffle($items);
        render_image_choices($items);
        ?>
    <?php endif; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br><br>
        <p align="center"><input type="submit" name="Submit2" value="New Question"></p><br>
        <div align="center">
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