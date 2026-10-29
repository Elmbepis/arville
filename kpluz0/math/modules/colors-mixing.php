<?php
// math/modules/colors-mixing.php
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

$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
if (!in_array($lvl, ['Easy', 'Hard'])) $lvl = 'Easy';

// ============================================================
// MODULE TEMPLATE
// ============================================================
// Legacy extraction (colors-mixing.php):
//   Easy -> secondary colors only (gre/ora/vio), 2 choices
//   Hard -> all 9 colors, 4 choices
// Legacy Medium merged into Hard.
//
// NOTE: `answer` = {ans} is a LOOKUP-derived value. Reference modules only
// use `choice` in `answer`; lookups there are untested. If a correct answer
// does not increment score, this is the cause.

$color0Pool = ($lvl === 'Easy')
    ? ['gre', 'ora', 'vio']
    : ['gre', 'ora', 'vio', 'bv', 'rv', 'yg', 'bg', 'yo', 'ro'];

$ansPool = ($lvl === 'Easy')
    ? ['yellow + blue', 'yellow + red', 'red + blue']
    : ['yellow + blue', 'yellow + red', 'red + blue',
       'blue + violet', 'red + violet', 'yellow + green',
       'blue + green', 'yellow + orange', 'red + orange'];

$moduleKey = 'math/g1/colors-mixing';

$template = [
    'title'   => 'Mixing Colors',
    'subject' => 'math',
    'grade'   => 1,
    'module_identifier' => basename(__FILE__),
    'levels'  => ['Easy', 'Hard'],

    'theme' => [
        'top_banner'    => $base . '/math/modules/images/bg01-top.jpg',
        'title_bg'      => $base . '/math/modules/images/bg01-top2.jpg',
        'left_side'     => $base . '/math/modules/images/bg01-left.jpg',
        'right_side'    => $base . '/math/modules/images/bg01-right.jpg',
        'content_bg'    => $base . '/math/modules/images/bg01-content.jpg',
        'bottom_banner' => $base . '/math/modules/images/bg01-bottom.jpg',
        'score_top'     => $base . '/math/images/score-top-1.jpg',
        'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
    ],

    'template' => [
        'params' => [
            'color0' => ['type' => 'choice', 'from' => $color0Pool],
            'num'    => ['type' => 'int', 'min' => 1, 'max' => 7],
            'type'   => ['type' => 'lookup', 'source' => 'color0', 'map' => [
                'gre' => 'secondary', 'ora' => 'secondary', 'vio' => 'secondary',
                'bv'  => 'tertiary',  'rv'  => 'tertiary',  'yg'  => 'tertiary',
                'bg'  => 'tertiary',  'yo'  => 'tertiary',  'ro'  => 'tertiary',
            ]],
            'ans'    => ['type' => 'lookup', 'source' => 'color0', 'map' => [
                'gre' => 'yellow + blue',   'ora' => 'yellow + red',
                'vio' => 'red + blue',      'bv'  => 'blue + violet',
                'rv'  => 'red + violet',    'yg'  => 'yellow + green',
                'bg'  => 'blue + green',    'yo'  => 'yellow + orange',
                'ro'  => 'red + orange',
            ]],
        ],
        'unique_key' => '{color0}{num:02}',
        'image'      => $base . '/math/images/colors/{type}/{color0}{num:02}.jpg',
        'prompt'     => 'What colors would you mix to<br/>get the color that you see?',
        'answer'     => '{ans}',
        'distractors' => [
            'type'  => 'sample',
            'from'  => $ansPool,
            'count' => ($lvl === 'Easy') ? 1 : 3,
        ],
    ],
];

// ============================================================
// SETUP + GENERATION + RENDER (verbatim from colors.php)
// ============================================================
$engine = new QEngine($template, $template['module_identifier']);
if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
$engine->setLevel($_SESSION['level']);

$sessionKey = 'mod_' . md5($template['module_identifier']);

$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $q = $_SESSION[$sessionKey]['current'];
    $scorer  = new Scorer($conn, $template['module_identifier']);
    $correct = $scorer->processAnswer($_GET['ansclick'], $q['answer'], $engine->getLevel());
    $result = ['correct' => $correct, 'selected' => $_GET['ansclick'],
               'answer' => $q['answer'], 'image' => $q['image']];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null || isset($_POST['Submit2'])) {
    $q = $engine->generate($sessionKey);
    $_SESSION[$sessionKey]['current'] = $q;
}

render_header($template['title'], $template['title'], $template['theme']);
?>
<div style="padding: 0 10px; text-align: center;">
<?php if ($result !== null): ?>
    <br><br>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#800080;">
        The correct answer is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['answer']); ?>'</strong>.
    </p>
    <img src="<?php echo htmlspecialchars($result['image']); ?>"
         style="max-width:300px; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
<?php else: ?>
    <br><br>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         style="max-width:300px; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
    <br>
    <p style="font-size:17pt; font-weight:600; color:#800080;"><?php echo htmlspecialchars($q['prompt']); ?></p>
    <br>
    <?php render_choices($q['choices']); ?>
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
                <?php foreach ($template['levels'] as $l): ?>
                    <td align="center">
                        <font face="Verdana" style="font-size: 9pt;">
                            <font color="#800080">
                                <input type="radio" name="level" value="<?php echo $l; ?>"
                                    <?php echo $engine->getLevel() === $l ? 'checked' : ''; ?>>
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