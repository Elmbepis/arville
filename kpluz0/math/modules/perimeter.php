<?php
// math/modules/perimeter.php
// Computed free-text, single input. Perimeters of shapes.
// Feedback uses HTML entities &times; for encoding safety.
// $exp echoed raw (server-generated, safe) so entities render properly.
// Easy = legacy Easy; Hard = legacy Hard.
// All shapes now compute correct answers — circle (2&#960;r, 2-decimals),
// polygons (n × a), trapezoid (a+b+f+g).

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

$moduleTitle = 'Perimeters of Triangles,<br/>Squares, and Rectangles';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(2, $grd));  // clamp: <2&#8594;2, >6&#8594;6

// ============================================================
// CONFIG — Grade × Level
// ============================================================
$configs = [
    2 => [
        'Easy' => ['n1lo'=>2, 'n1hi'=>7,  'n2lo'=>1, 'n2hi'=>8,  'shlim'=>3],
        'Hard' => ['n1lo'=>9, 'n1hi'=>35, 'n2lo'=>2, 'n2hi'=>10, 'shlim'=>3],
    ],
    3 => [
        'Easy' => ['n1lo'=>3, 'n1hi'=>16, 'n2lo'=>1, 'n2hi'=>10, 'shlim'=>3],
        'Hard' => ['n1lo'=>20,'n1hi'=>75, 'n2lo'=>2, 'n2hi'=>20, 'shlim'=>11],
    ],
    4 => [
        'Easy' => ['n1lo'=>5, 'n1hi'=>25, 'n2lo'=>3, 'n2hi'=>20, 'shlim'=>3],
        'Hard' => ['n1lo'=>39,'n1hi'=>129,'n2lo'=>8, 'n2hi'=>50, 'shlim'=>13],
    ],
    5 => [
        'Easy' => ['n1lo'=>7, 'n1hi'=>49, 'n2lo'=>5, 'n2hi'=>25, 'shlim'=>8],
        'Hard' => ['n1lo'=>79,'n1hi'=>299,'n2lo'=>20,'n2hi'=>70, 'shlim'=>13],
    ],
    6 => [
        'Easy' => ['n1lo'=>21,'n1hi'=>199,'n2lo'=>10,'n2hi'=>50, 'shlim'=>10],
        'Hard' => ['n1lo'=>149,'n1hi'=>499,'n2lo'=>31,'n2hi'=>129,'shlim'=>13],
    ],
];
$cfg = $configs[$grdKey][$lvl];

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $studentInput = trim((string)($_POST['answer'] ?? '0'));

    $studentCanon = (string)round((float)$studentInput, 2);
    $correctCanon = (string)round((float)$cur['ans'], 2);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($studentCanon, $correctCanon, $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'student' => $studentInput,
        'ans'     => $cur['ans'],
        'exp'     => $cur['exp'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $sh = rand(1, $cfg['shlim']);

    $a = rand($cfg['n1lo'], $cfg['n1hi']);
    do { $b = rand($cfg['n1lo'], $cfg['n1hi']); } while ($b === $a);
    $c = rand($cfg['n1lo'], $cfg['n1hi']);
    $f = 0; $g = 0; $r = 0;

    if ($sh === 3) {
        // Ensure triangle inequality
        $tries = 0;
        while (($a >= $b + $c || $b >= $a + $c || $c >= $a + $b) && $tries < 100) {
            $a = rand($cfg['n1lo'], $cfg['n1hi']);
            $b = rand($cfg['n1lo'], $cfg['n1hi']);
            $c = rand($cfg['n1lo'], $cfg['n1hi']);
            $tries++;
        }
    }

    if ($sh === 4) {
        $r = rand($cfg['n2lo'], $cfg['n2hi']);
    }

    if ($sh === 13) {
        $f = rand($cfg['n1lo'], $cfg['n1hi']);
        $g = rand($cfg['n1lo'], $cfg['n1hi']);
    }

    $polygonNames = [5=>'pentagon', 6=>'hexagon', 7=>'heptagon', 8=>'octagon', 9=>'nonagon', 10=>'decagon', 11=>'hendecagon', 12=>'dodecagon'];

    switch ($sh) {
        case 1:
            $ans  = $a * 4;
            $qDisplay = "What is the perimeter of a <strong>square</strong> if each of its sides is <strong style=\"color:#CC0066;\">$a cm</strong>?";
            $exp  = "Perimeter = 4 &times; $a = $ans cm";
            break;
        case 2:
            $ans  = 2 * ($a + $b);
            $qDisplay = "What is the perimeter of a <strong>rectangle</strong> if one side is <strong style=\"color:#CC0066;\">$a cm</strong> and the other side is <strong style=\"color:#CC0066;\">$b cm</strong>?";
            $exp  = "Perimeter = 2 &times; ($a + $b) = $ans cm";
            break;
        case 3:
            $ans  = $a + $b + $c;
            $qDisplay = "What is the perimeter of a <strong>triangle</strong> if its sides are <strong style=\"color:#CC0066;\">$a cm</strong>, <strong style=\"color:#CC0066;\">$b cm</strong>, and <strong style=\"color:#CC0066;\">$c cm</strong>?";
            $exp  = "Perimeter = $a + $b + $c = $ans cm";
            break;
        case 4:
            $ans  = round(2 * 3.14 * $r, 2);
            $qDisplay = "What is the circumference of a <strong>circle</strong> if its radius is <strong style=\"color:#CC0066;\">$r cm</strong>? <em>(Use &pi; = 3.14.)</em>";
            $exp  = "Circumference = 2 &times; 3.14 &times; $r = $ans cm";
            break;
        case 13:
            $ans  = $a + $b + $f + $g;
            $qDisplay = "What is the perimeter of a <strong>trapezoid</strong> if the lengths of its sides are <strong style=\"color:#CC0066;\">$a cm</strong>, <strong style=\"color:#CC0066;\">$b cm</strong>, <strong style=\"color:#CC0066;\">$f cm</strong>, and <strong style=\"color:#CC0066;\">$g cm</strong>?";
            $exp  = "Perimeter = $a + $b + $f + $g = $ans cm";
            break;
        default:
            // Polygons 5-12
            $n = $sh;
            $name = $polygonNames[$n] ?? 'polygon';
            $ans  = $n * $a;
            $qDisplay = "What is the perimeter of a <strong>$name</strong> if each of its sides is <strong style=\"color:#CC0066;\">$a cm</strong>?";
            $exp  = "Perimeter = $n &times; $a = $ans cm";
            break;
    }

    $_SESSION[$sessionKey]['current'] = [
        'sh' => $sh, 'a' => $a, 'b' => $b, 'c' => $c, 'f' => $f, 'g' => $g, 'r' => $r,
        'ans' => $ans, 'qDisplay' => $qDisplay, 'exp' => $exp, 'lvl' => $lvl,
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
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answer:
        <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['student']); ?> cm</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php echo $result['exp']; ?>.
    </p>
<?php else: ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#800080; margin-top:24px;">
        <?php echo $q_curr['qDisplay']; ?>
    </p>
    <p style="font-size:16pt; font-weight:700; color:#CC0066; margin:20px 0;">
        Perimeter:
        <input type="text" name="answer" size="1" maxlength="8"
               style="width:120px; height:44px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px; font-weight:700; color:#0000CC;"
               autocomplete="off" autofocus>
        cm
    </p>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit1" value="Submit">
        <span style="display:inline-block; width:20px;"></span>
        <input type="submit" name="Submit2" value="New Question">
    </div>
<?php endif; ?>

    <?php if ($result !== null): ?>
    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
    <?php endif; ?>

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