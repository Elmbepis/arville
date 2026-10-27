<?php
// math/modules/polygons.php
// MULTIPLE CHOICE (4 choices). Question bank per grade (4, 5) — no procedural
// generation; ?ansclick + custom 2x2 grid.
//
// Content: quadrilaterals + polygons. Grade 4 bank and Grade 5 bank preserved
// verbatim from legacy. Grade >= 6 clamps to 5.
// Single-level (Easy) — legacy forced $_SESSION['level'] = "Easy".
//
// Legacy `**image.jpg` inline reference: extracted as image path, removed from
// question text.
//
// Theme: test67-* (110/582/108) &#8594; paper-69-*.
// DB row required: modules.url = 'polygons.php'

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

$moduleTitle = 'Understanding Polygons';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';
$grd         = min(5, max(4, (int)($_SESSION['grade'] ?? 4)));

// ============================================================
// QUESTION BANK (per grade)
// ============================================================
if ($grd == 4) {
    $questions = [
        "In the picture shown, the colors of the quadrilaterals that are NOT parallelograms are ____.**quads1.jpg=blue and green[orange and green+orange and blue]purple and blue",
        "In the picture shown, the color of the quadrilateral that has two pairs of congruent adjacent sides is ____.**quads1.jpg=green[orange+blue]purple",
        "In the picture shown, the color of one quadrilateral whose diagonals bisect each other at right angles is ____.**quads1.jpg=red[green+blue]purple",
        "In the picture shown, the color of one quadrilateral that is NOT made up of two isosceles triangles is ____.**quads1.jpg=blue[red+orange]green",
        "In the picture shown, the color of one quadrilateral whose diagonals are NOT perpendicular is ____.**quads1.jpg=purple[red+orange]green",
        "If you split a quadrilateral along a diagonal, what would you get?=two triangles[three triangles+two quadrilaterals]a triangle and a quadrilateral",
        "If you split a square along a diagonal, what would you get?=two isosceles right triangles[two scalene right triangles+two isosceles acute triangles]two scalene acute triangles",
        "If you split a non-square rectangle along a diagonal, what would you get?=two scalene right triangles[two isosceles right triangles+two isosceles acute triangles]two scalene acute triangles",
        "If a quadrilateral can be split into two identical isosceles triangles, then it is a ____.=rhombus[square+rectangle]trapezoid",
        "If a quadrilateral can be split into two equilateral triangles, then its two obtuse angles are both ____ degrees.=120[60+150]135",
        "If two equiangular triangles make up a quadrilateral, then the two acute angles of the quadrilateral are both ____ degrees.=60[120+75]45",
        "If you split a kite along its shorter diagonal, what you would get are two ____.=incongruent isosceles triangles[congruent isosceles triangles+incongruent scalene triangles]congruent scalene triangles",
        "If you split a kite along its longer diagonal, what you would get are two ____.=congruent scalene triangles[congruent isosceles triangles+incongruent scalene triangles]incongruent isosceles triangles",
        "In any ____, the diagonals bisect each other at right angles.=rhombus[rectangle+trapezoid]parallelogram",
        "The diagonals of any ____ bisect its angles.=square[rectangle+trapezoid]parallelogram",
        "Any square is all of the following except ____.=trapezoid[rectangle+rhombus]parallelogram",
        "Any rhombus is all of the following except ____.=rectangle[quadrilateral+kite]parallelogram",
        "All of the following are parallelograms except ____.=trapezoid[rhombus+square]rectangle",
        "The diagonals of ALL of the following bisect each other except ____.=trapezoid[rhombus+square]rectangle",
        "The diagonals of ALL of the following are NOT congruent except ____.=rectangle[rhombus+kite]trapezoid",
        "Any two consecutive angles of ALL of the following are supplementary except ____.=kite[rhombus+rectangle]square",
        "Which of the following is NOT a parallelogram?=kite[rhombus+square]rectangle",
        "Which of the following is NOT a quadrilateral?=triangle[rhombus+trapezoid]kite",
        "Which of the following quadrilaterals has sides that are ALL congruent?=rhombus[rectangle+trapezoid]kite",
        "Which of the following quadrilaterals has angles that are ALL right?=rectangle[rhombus+trapezoid]kite",
        "The sum of the internal angles of any quadrilateral is always ____ degrees.=360[320+180]420",
    ];
} else {  // grd 5+
    $questions = [
        "In the picture shown, the colors of the quadrilaterals that are NOT parallelograms are ____.**quads1.jpg=blue and green[orange and green+orange and blue]purple and blue",
        "In the picture shown, the color of the quadrilateral that has two pairs of congruent adjacent sides is ____.**quads1.jpg=green[orange+blue]purple",
        "In the picture shown, the color of one quadrilateral whose diagonals bisect each other at right angles is ____.**quads1.jpg=red[green+blue]purple",
        "In the picture shown, the color of one quadrilateral that is NOT made up of two isosceles triangles is ____.**quads1.jpg=blue[red+orange]green",
        "In the picture shown, the color of one quadrilateral whose diagonals are NOT perpendicular is ____.**quads1.jpg=purple[red+orange]green",
        "If you split a quadrilateral along a diagonal, what would you get?=two triangles[three triangles+two quadrilaterals]a triangle and a quadrilateral",
        "If you split a square along a diagonal, what would you get?=two isosceles right triangles[two scalene right triangles+two isosceles acute triangles]two scalene acute triangles",
        "If you split a non-square rectangle along a diagonal, what would you get?=two scalene right triangles[two isosceles right triangles+two isosceles acute triangles]two scalene acute triangles",
        "If a quadrilateral can be split into two isosceles triangles, then it is a ____.=rhombus[square+rectangle]trapezoid",
        "If a quadrilateral can be split into two equilateral triangles, then its two obtuse angles are both ____ degrees.=120[60+150]135",
        "If two equiangular triangles make up a quadrilateral, then the two acute angles of the quadrilateral are both ____ degrees.=60[120+75]45",
        "If you split a kite along its shorter diagonal, what you would get are two ____.=incongruent isosceles triangles[congruent isosceles triangles+incongruent scalene triangles]congruent scalene triangles",
        "If you split a kite along its longer diagonal, what you would get are two ____.=congruent scalene triangles[congruent isosceles triangles+incongruent scalene triangles]incongruent isosceles triangles",
        "In any ____, the diagonals bisect each other at right angles.=rhombus[rectangle+trapezoid]parallelogram",
        "The diagonals of any ____ bisect its angles.=square[rectangle+trapezoid]parallelogram",
        "Any square is all of the following except ____.=trapezoid[rectangle+rhombus]parallelogram",
        "Any rhombus is all of the following except ____.=rectangle[quadrilateral+kite]parallelogram",
        "All of the following are parallelograms except ____.=trapezoid[rhombus+square]rectangle",
        "The diagonals of ALL of the following bisect each other except ____.=trapezoid[rhombus+square]rectangle",
        "The diagonals of ALL of the following are NOT congruent except ____.=rectangle[rhombus+kite]trapezoid",
        "Any two consecutive angles of ALL of the following are supplementary except ____.=kite[rhombus+rectangle]square",
        "Which of the following is NOT a parallelogram?=kite[rhombus+square]rectangle",
        "Which of the following is NOT a quadrilateral?=triangle[rhombus+trapezoid]kite",
        "Which of the following quadrilaterals has sides that are ALL congruent?=rhombus[rectangle+trapezoid]kite",
        "Which of the following quadrilaterals has angles that are ALL right?=rectangle[rhombus+trapezoid]kite",
        "The sum of the internal angles of any quadrilateral is always ____ degrees.=360[320+180]420",
        "If each of the internal angles of a polygon is greater than 90 degrees, then the polygon has ____.=more than 4 sides[less than 4 sides+exactly 4 sides]exactly 5 sides",
        "If n is the number of sides of a regular polygon, what is the formula for the measurement of each of its internal angles?=180(n-2)/n[90(n-2)/n+180n/(n-2)]90n/(n-2)",
        "The sum of the number of sides of a triangle and the number of sides of a quadrilateral is the number of sides of a ____.=heptagon[hexagon+octagon]nonagon",
        "The sum of the number of sides of a triangle and the number of sides of a pentagon is the number of sides of which polygon?=octagon[decagon+heptagon]nonagon",
        "The sum of the number of sides of a pentagon and the number of sides of a quadrilateral is the number of sides of a ____.=nonagon[octagon+heptagon]decagon",
        "The sum of the number of sides of a triangle and the number of sides of a heptagon is the number of sides of a ____.=decagon[hendecagon+octagon]nonagon",
        "The sum of the number of sides of a hexagon and the number of sides of a pentagon is the number of sides of a ____.=hendecagon[nonagon+dodecagon]decagon",
        "The sum of the number of sides of a pentagon and the number of sides of a heptagon is the number of sides of a ____.=dodecagon[nonagon+hendecagon]decagon",
        "The color of the polygon that's congruent to the red polygon is ____.**polygons1.jpg=purple[blue+orange]brown",
        "The color of the polygon that's congruent to the blue polygon is ____.**polygons1.jpg=orange[blue+purple]green",
        "The colors of the polygons that are NOT congruent with any other polygon are ____.**polygons1.jpg=green and brown[green and orange+blue and brown]green and red",
    ];
}

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $clicked,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null) {
    $last4 = $_SESSION[$sessionKey]['last4'] ?? [];
    $rcount = count($questions) - 1;

    $safety = 0;
    do {
        $idx = rand(0, $rcount);
        $safety++;
    } while (in_array($idx, $last4, true) && $safety < 60);
    $last4[] = $idx;
    if (count($last4) > 4) $last4 = array_slice($last4, -4);
    $_SESSION[$sessionKey]['last4'] = $last4;

    $qstr = $questions[$idx];

    $pos0 = strpos($qstr, '=');
    $question = substr($qstr, 0, $pos0);

    $pos1 = strpos($qstr, '[');
    $pos2 = strpos($qstr, '+');
    $pos3 = strpos($qstr, ']');

    $ans     = substr($qstr, $pos0 + 1, $pos1 - $pos0 - 1);
    $choice  = [$ans];
    $choice[] = substr($qstr, $pos1 + 1, $pos2 - $pos1 - 1);
    $choice[] = substr($qstr, $pos2 + 1, $pos3 - $pos2 - 1);
    $choice[] = substr($qstr, $pos3 + 1);

    $picfile = '';
    if (strpos($qstr, '.jpg') !== false) {
        $picpos1 = strpos($qstr, '**');
        $picpos2 = strpos($qstr, '.jpg');
        $picname = substr($qstr, $picpos1 + 2, $picpos2 - $picpos1 - 2);
        $picfile = $base . '/math/images/geom-elem/' . $picname . '.jpg';
        $picToken = substr($qstr, $picpos1, $picpos2 - $picpos1 + 4);
        $question = str_replace($picToken, '', $question);
    }

    shuffle($choice);

    $_SESSION[$sessionKey]['current'] = [
        'answer'   => $ans,
        'choices'  => $choice,
        'question' => $question,
        'image'    => $picfile,
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
    'score_top'     => $base . '/math/images/score-top-2.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-2.jpg',
];
$subtitle = ($grd == 4) ? ' :<br/>Triangles and Quadrilaterals' : '';
render_header($moduleTitle, $moduleTitle . $subtitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <?php if (!empty($result['cur']['image'])): ?>
        <p style="margin-top:15px;"><img src="<?php echo htmlspecialchars($result['cur']['image']); ?>" style="border:1px solid #ccc; border-radius:6px; max-width:400px;"></p>
    <?php endif; ?>

    <p style="font-size:14pt; color:#333; margin-top:15px;">
        <?php echo htmlspecialchars($result['cur']['question']); ?>
    </p>
    <p style="font-size:16pt; font-weight:700; color:#800080; margin-top:10px;">
        Answer: <span style="color:#CC0066;"><?php echo htmlspecialchars($result['cur']['answer']); ?></span>
    </p>

    <div style="margin:30px 0;">
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php else: ?>
    <?php if (!empty($q['image'])): ?>
        <p style="margin-top:20px;"><img src="<?php echo htmlspecialchars($q['image']); ?>" style="border:1px solid #ccc; border-radius:6px; max-width:400px;"></p>
    <?php endif; ?>

    <p style="font-size:16pt; font-weight:700; color:#333; margin:20px 40px;">
        <?php echo htmlspecialchars($q['question']); ?>
    </p>
    <p style="font-size:14pt; font-weight:600; color:#800080;">
        Click on your answer.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:500px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div style="margin:30px 0;">
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php endif; ?>

    <?php render_score_box(); ?>
</form>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();