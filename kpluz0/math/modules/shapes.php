<?php
// shapes.php — template-driven shapes module (two levels: Easy, Hard)

session_name('KPLUZ_SESSION');
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}

require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';
require_once __DIR__ . '/../../q-engine.php';

$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ============================================================
// BASE URL — computed from SCRIPT_NAME so paths work in dev and prod
// Example: "/arville/kpluz0/math/modules/shapes.php" &#8594; "/arville/kpluz0"
// ============================================================
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

// ============================================================
// MODULE TEMPLATE
// ============================================================
$grd = $_SESSION['grade'] ?? 0;

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
if (!in_array($lvl, ['Easy', 'Hard'])) $lvl = 'Easy';

$shapes = ['square', 'circle', 'triangle', 'rectangle', 'oval'];
if ($grd >= 2) {
    $shapes[] = 'half circle';
    $shapes[] = 'quarter circle';
}

$shlimMap = [
    'square' => 10, 'circle' => 10, 'triangle' => 10,
    'rectangle' => 10, 'oval' => 10,
    'half circle' => 5, 'quarter circle' => 5,
];

if ($lvl === 'Hard') {
    $numSpec = ($grd == 0)
        ? ['type' => 'int', 'min' => 21, 'max' => 26]
        : ['type' => 'int', 'min' => 41, 'max' => 46];
} else {
    $numSpec = ['type' => 'int', 'min' => 1, 'max' => ['by_param' => 'shape', 'map' => $shlimMap]];
}

$template = [
    'title'             => 'Learning the Different Shapes',
    'subject'           => 'math',
    'grade'             => $grd,
    'module_identifier' => basename(__FILE__),
    'levels'            => ['Easy', 'Hard'],

    'theme' => [
        'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
        'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
        'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
        'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
        'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
        'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
        'score_top'     => $base . '/math/images/score-top-1.jpg',
        'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
    ],

    'template' => [
        'params' => [
            'shape' => ['type' => 'choice', 'from' => $shapes],
            'imgcode' => [
                'type' => 'lookup', 'source' => 'shape',
                'map' => [
                    'square' => 'squ', 'circle' => 'cir', 'triangle' => 'tri',
                    'rectangle' => 'rec', 'oval' => 'obl',
                    'half circle' => 'hal', 'quarter circle' => 'qua',
                ],
            ],
            'num' => $numSpec,
        ],

        'unique_key' => '{imgcode}{num:02}',
        'image'      => $base . '/math/images/shapes/{imgcode}{num:02}.jpg',

        'prompt' => [
            ['when' => ['num', '>',  19], 'value' => 'Click on the shape of the object shown.'],
            ['when' => ['num', '<=', 19], 'value' => 'Click on the name of the shape shown.'],
        ],

        'answer' => '{shape}',

        'distractors' => [
            'type' => 'sample',
            'from' => ['square', 'circle', 'triangle', 'rectangle', 'oval'],
            'from_if_answer_in' => [
                'half circle'    => ['circle', 'half circle', 'quarter circle', 'oval'],
                'quarter circle' => ['circle', 'half circle', 'quarter circle', 'oval'],
            ],
            'count' => 3,
        ],
    ],
];

// ============================================================
// SETUP
// ============================================================
$engine = new QEngine($template, $template['module_identifier']);
$engine->setLevel($lvl);

$sessionKey = 'mod_' . md5($template['module_identifier']);

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $q = $_SESSION[$sessionKey]['current'];
    $selected = $_GET['ansclick'];

    $scorer = new Scorer($conn, $template['module_identifier']);
    $correct = $scorer->processAnswer($selected, $q['answer'], $engine->getLevel());

    $result = [
        'correct'  => $correct,
        'selected' => $selected,
        'answer'   => $q['answer'],
        'image'    => $q['image'],
        'num'      => $q['params']['num'] ?? 0,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null || isset($_POST['Submit2'])) {
    $q = $engine->generate($sessionKey);
    $_SESSION[$sessionKey]['current'] = $q;
}

// ============================================================
// RENDER
// ============================================================
render_header($template['title'], $template['title'], $template['theme']);
?>
<div style="padding: 0 10px; text-align: center;">

    <?php if ($result !== null): ?>
        <br><br>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; margin:0;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <br>
        <p style="font-size:14pt; color:#800080;">
            <?php
            $article = ($result['answer'] === 'oval') ? 'an' : 'a';
            echo "The shape shown is $article <strong style=\"color:#CC0066;\">"
               . htmlspecialchars($result['answer']) . "</strong>.";
            ?>
        </p>
        <img src="<?php echo htmlspecialchars($result['image']); ?>"
             style="<?php echo $result['num'] <= 10 ? '' : 'border:1px solid #000;'; ?> max-width:300px; margin:10px 0;">
    <?php else: ?>
        <br><br>
        <img src="<?php echo htmlspecialchars($q['image']); ?>"
             style="<?php echo ($q['params']['num'] ?? 0) <= 10 ? '' : 'border:1px solid #000;'; ?> max-width:300px; margin:10px 0;">
        <br>
        <p style="font-size:17pt; font-weight:600; color:#800080; margin:0;">
            <?php echo htmlspecialchars($q['prompt']); ?>
        </p>
        <br>
        <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    <?php endif; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br><br>
        <p align="center">
            <input type="submit" name="Submit2" value="New Question">
        </p><br>

        <div align="center">
            <p style="margin-top: 5px; margin-bottom: 0">
                <font face="Verdana" style="font-size: 10pt;" color="#000080">
                    Select difficulty level for next question:
                </font>
            </p>
            <table border="0" width="80%" cellspacing="0" cellpadding="0">
                <tr>
                    <?php foreach ($template['levels'] as $lvlOption): ?>
                        <td align="center">
                            <p style="margin-bottom: 4px">
                                <font face="Verdana">
                                    <span style="font-size: 9pt">
                                        <font color="#800080">
                                            <input type="radio" name="level" value="<?php echo $lvlOption; ?>"
                                                <?php echo $engine->getLevel() === $lvlOption ? 'checked' : ''; ?>>
                                            <b>&nbsp;<?php echo $lvlOption; ?></b>
                                        </font>
                                    </span>
                                </font>
                            </p>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
    </form>

    <br>
    <?php render_score_box(); ?>
</div>

<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();