<?php
// math/modules/geom-terms.php
// MCQ with image + text choices from a fixed per-grade question bank.
// Bypass §D category 2 (question bank is already curated; no procedural params).
//
// FIX #1: grade 6 has no bank in legacy &#8594; clamp grade to 3-5.
// FIX #2: replace <sup>2</sup> with ² so any HTML-escaping doesn't strip it.
// FIX #3: choices rendered as a fixed 2x2 grid (was flex-wrap, could land
//         on 1 row or 3+1 depending on viewport width).
// FIX #4: removed invalid nested <form> wrappers around Submit2 — outer
//         form already handles the POST; "New Question" button now gets
//         equal vertical margin above AND below.
// Theme: test67-* is 110/582/108 — does not fit §C &#8594; paper-69-*.
//
// DB row required: modules.url = 'geom-terms.php'

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

$moduleTitle = 'Terms in Geometry';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';
$grd         = min(5, max(3, (int)($_SESSION['grade'] ?? 3)));

// ============================================================
// QUESTION BANK (per grade) — <sup>2</sup> replaced with ²
// ============================================================
if ($grd == 3) {
    $questions = [
        "The blue object labelled as 'A' in the picture is called a ____.**point-line1.jpg=point[line+line segment]ray",
        "The red object in the picture is called a ____.**point-line1.jpg=line[point+line segment]ray",
        "The orange line is parallel to the ____ line in the picture.**point-line1.jpg=purple[red+green]brown",
        "The green line is parallel to the ____ line in the picture.**point-line1.jpg=brown[red+purple]orange",
        "The yellow orange line is perpendicular to the ____ line in the picture.**point-line1.jpg=brown[red+black]purple",
        "The green line is perpendicular to the ____ line in the picture.**point-line1.jpg=purple[red+brown]black",
        "In this picture, only the ____ line will intersect ALL the other lines.**point-line1.jpg=red[purple+green]orange",
        "The part of the red line in the picture from point A to point B is called a ____.**point-line2.jpg=line segment[angle+plane]ray",
        "The green objects labelled as 'A' and 'B' in the picture are called ____.**point-line2.jpg=points[lines+line segments]rays",
        "In this picture, the line segment EF is congruent to the line segment ____.**point-line2.jpg=GH[EH+FG]BF",
        "In this picture, the line segment GF is congruent to the line segment ____.**point-line2.jpg=EH[HG+EF]GD",
        "The purple object labelled as 'AB' in the picture is called a ____.**point-line3.jpg=ray[line+line segment]plane",
        "The red and orange objects in the picture are called ____.**point-line3.jpg=lines[rays+line segments]planes",
        "The orange line is parallel to the ____ line in the picture.**point-line3.jpg=red[purple+green]brown",
        "The brown line is parallel to the ____ line in the picture.**point-line3.jpg=green[purple+red]orange",
        "In this picture, the line segment BC is congruent to the line segment ____.**point-line3.jpg=DE[BD+CE]AC",
        "In this picture, the line segment BD is congruent to the line segment ____.**point-line3.jpg=CE[BC+DE]AB",
        "The color of the ray in the picture is ____.**point-line4.jpg=pink[orange+blue]green",
        "The color of the object in the picture that has a single point of origin and extends infinitely in one direction is ____.**point-line4.jpg=pink[orange+blue]green",
        "Which of the following refers to a part of a line that has a single point of origin and extends infinitely in one direction?=ray[line+line segment]plane",
        "The color of the line in the picture is ____.**point-line4.jpg=orange[pink+blue]green",
        "Which of the following refers to a straight object that has no thickness and extends infinitely in both directions?=line[ray+line segment]plane",
        "The color of the line segment in the picture is ____.**point-line4.jpg=blue[pink+orange]green",
        "The green object labelled as 'P' in the picture is called a ____.**point-line4.jpg=point[line+line segment]ray",
        "The color of the object in the picture that is bounded by two distinct end points and contains every point between its endpoints is ____.**point-line4.jpg=blue[pink+orange]green",
        "Which of the following refers to a part of a line that is bounded by two distinct end points and contains every point between its endpoints?=line segment[angle+plane]ray",
        "How many points does a ray contain?=infinite[several+two]one",
        "Which of the following does not extend infinitely in any direction?=line segment[ray+line]plane",
        "The color of the line that's parallel to the green line is ____.**point-line5.jpg=purple[blue+brown]red",
        "The color of the line that's parallel to the red line is ____.**point-line5.jpg=blue[purple+orange]red",
        "The color of the line that's perpendicular to the orange line is ____.**point-line5.jpg=brown[purple+green]red",
        "The only line that will never intersect the blue line is the ____ line.**point-line5.jpg=red[purple+orange]brown",
        "Line segments that are equal in length are ____ line segments.=congruent[parallel+perpendicular]intersecting",
        "Lines on the same plane that will NEVER ever intersect are ____.=parallel[congruent+perpendicular]intersecting",
        "Lines that are at right angles to each other are ____.=perpendicular[parallel+congruent]oblique",
    ];
} elseif ($grd == 4) {
    $questions = [
        "The angle shown in the picture is ____.**angle01.jpg=acute[obtuse+right]straight",
        "The angle shown in the picture is ____.**angle02.jpg=acute[obtuse+right]complete",
        "The angle shown in the picture is ____.**angle03.jpg=acute[obtuse+right]reflex",
        "The angle shown in the picture is ____.**angle04.jpg=obtuse[acute+right]straight",
        "The angle shown in the picture is ____.**angle05.jpg=obtuse[acute+right]complete",
        "The angle shown in the picture is ____.**angle06.jpg=obtuse[acute+right]reflex",
        "The angle shown in the picture is ____.**angle07.jpg=right[acute+obtuse]straight",
        "The angle shown in the picture is ____.**angle08.jpg=right[acute+obtuse]complete",
        "The angle shown in the picture is ____.**angle09.jpg=right[acute+obtuse]reflex",
        "The angle shown in the picture is ____.**angle10.jpg=reflex[acute+obtuse]straight",
        "The angle shown in the picture is ____.**angle11.jpg=reflex[acute+obtuse]complete",
        "The angle shown in the picture is ____.**angle12.jpg=reflex[acute+obtuse]right",
        "The angle shown in the picture is ____.**angle13.jpg=straight[acute+obtuse]reflex",
        "The angle shown in the picture is ____.**angle14.jpg=straight[complete+right]reflex",
        "The angle shown in the picture is ____.**angle15.jpg=complete[straight+obtuse]right",
        "The triangle shown in the picture is ____.**triangle01.jpg=acute[obtuse+right]equiangular",
        "The triangle shown in the picture is ____.**triangle02.jpg=acute[obtuse+right]equiangular",
        "The triangle shown in the picture is ____.**triangle03.jpg=acute[obtuse+right]equiangular",
        "The triangle shown in the picture is ____.**triangle04.jpg=obtuse[acute+right]equiangular",
        "The triangle shown in the picture is ____.**triangle05.jpg=obtuse[acute+right]equiangular",
        "The triangle shown in the picture is ____.**triangle06.jpg=obtuse[acute+right]equiangular",
        "The triangle shown in the picture is ____.**triangle07.jpg=right[acute+obtuse]equiangular",
        "The triangle shown in the picture is ____.**triangle08.jpg=right[acute+obtuse]equiangular",
        "The triangle shown in the picture is ____.**triangle09.jpg=right[acute+obtuse]equiangular",
        "The triangle shown in the picture is ____.**triangle10.jpg=equiangular[obtuse+right]scalene",
        "The triangle shown in the picture is ____.**triangle11.jpg=equiangular[obtuse+right]scalene",
        "The triangle shown in the picture is ____.**triangle12.jpg=equilateral[isosceles+right]scalene",
        "The triangle shown in the picture is ____.**triangle13.jpg=scalene[isosceles+right]equilateral",
        "The triangle shown in the picture is ____.**triangle14.jpg=scalene[isosceles+right]equilateral",
        "The triangle shown in the picture is ____.**triangle15.jpg=scalene[isosceles+right]equilateral",
        "The triangle shown in the picture is ____.**triangle16.jpg=isosceles[scalene+right]equilateral",
        "The triangle shown in the picture is ____.**triangle17.jpg=isosceles[scalene+right]equilateral",
        "The triangle shown in the picture is ____.**triangle18.jpg=isosceles[scalene+right]equilateral",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad01.jpg=square[rhombus+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad02.jpg=square[rhombus+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad03.jpg=square[rhombus+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad04.jpg=rectangle[rhombus+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad05.jpg=rectangle[rhombus+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad06.jpg=rectangle[rhombus+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad07.jpg=rhombus[square+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad08.jpg=rhombus[square+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad09.jpg=rhombus[square+trapezoid]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad10.jpg=trapezoid[rhombus+rectangle]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad11.jpg=trapezoid[rhombus+rectangle]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad12.jpg=trapezoid[rhombus+rectangle]kite",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad13.jpg=kite[rhombus+trapezoid]rectangle",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad14.jpg=kite[rhombus+trapezoid]rectangle",
        "The quadrilateral shown in the picture is most specifically called a ____.**quad15.jpg=kite[rhombus+trapezoid]rectangle",
    ];
} else {  // grd == 5
    $questions = [
        "The blue segment in the picture is a ____ of the circle.**circ-terms1.jpg=diameter[radius+chord]sector",
        "The green segment in the picture is a ____ of the circle.**circ-terms1.jpg=radius[diameter+chord]sector",
        "The violet segment in the picture is a ____ of the circle.**circ-terms1.jpg=chord[radius+diameter]sector",
        "What is the red part of the circle in the picture called?**circ-terms1.jpg=circumference[radius+diameter]sector",
        "What is the blue part of the circle in the picture called?**circ-terms2.jpg=sector[radius+chord]segment",
        "What is the violet part of the circle in the picture called?**circ-terms2.jpg=arc[sector+chord]tangent",
        "The formula for the yellow part of the circle in the picture shown is ____.**circ-terms3.jpg=pi x r²[2 x pi x r+2 x pi x r²]r x (pi)²",
        "The formula for the red part of the circle in the picture shown is ____.**circ-terms3.jpg=2 x pi x r[pi x r²+2 x pi x r²]r x (pi)²",
        "What is the red part of the circle in the picture called?**circ-terms4.jpg=center[radius+diameter]vertex",
        "What is the green part of the circle in the picture called?**circ-terms4.jpg=point of tangency[tangent+circumference]vertex",
        "What is the violet line in the picture shown called?**circ-terms4.jpg=tangent[secant+diagonal]diameter",
        "What is the orange line in the picture shown called?**circ-terms4.jpg=secant[tangent+chord]diameter",
        "What is the yellow portion of the circle in the picture shown called?**circ-terms4.jpg=quadrant[secant+sector]tangent",
        "A ____ is a line that intersects a circle at exactly one point.=tangent[radius+diameter]chord",
        "A tangent is ____ to the radius that intersects the point of tangency.=perpendicular[parallel+oblique]unrelated",
        "The point at which a tangent touches a circle is called what?=point of tangency[center+arc]vertex",
        "A ____ is the region bounded by a chord of the circle and its intercepted arc.=segment[sector+tangent]circumference",
        "A ____ is the region bounded by two radii of the circle and their intercepted arc.=sector[segment+tangent]circumference",
        "What is the green part of the circle in the picture called?**circ-terms5.jpg=sector[radius+chord]segment",
        "What is the orange part of the circle in the picture called?**circ-terms5.jpg=segment[radius+chord]sector",
        "The green part of the circle in the picture is bounded by ____.**circ-terms5.jpg=two radii and an arc[two radii and a chord+a chord and an arc]two diameters and an arc",
        "The orange part of the circle in the picture is bounded by ____.**circ-terms5.jpg=a chord and an arc[two radii and a chord+two radii and an arc]two diameters and an arc",
        "In a circle, a ____ is any of the line segments that connect the center to the circumference.=radius[sector+diameter]chord",
        "A ____ is any of the chords passing through the center of the circle.=diameter[sector+radius]chord",
        "The diameter of a circle is twice its ____.=radius[segment+tangent]chord",
        "Which of the following is NOT found inside the circle?=tangent[sector+radius]chord",
        "The infinite line extension of a chord is called what?=secant[sector+tangent]cosecant",
        "A ____ is the region bounded by two perpendicular radii of the circle and their intercepted arc.=quadrant[segment+sector]tangent",
        "Which of the following refers to 1/4 of a circle?=quadrant[segment+sector]tangent",
        "All the points on the ____ of a circle are equidistant to the center of the circle.=circumference[diameter+radius]tangent",
    ];
}

// ============================================================
// HANDLE ANSWER CLICK  (render_choices emits ?ansclick=X)
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
    } while (in_array($idx, $last4, true) && $safety < 60);   // §I

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
render_header($moduleTitle, $moduleTitle . ' : Level ' . $grd, $theme);
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