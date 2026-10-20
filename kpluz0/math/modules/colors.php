<?php
// colors.php — template-driven version of colors.php
// Uses q-engine to generate questions from a declarative template.

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
// MODULE TEMPLATE — this is the only module-specific part
// ============================================================
$moduleKey = 'math/g1/colors';

$template = [
    'title'   => 'Learning the Different Colors',
    'subject' => 'math',
    'grade'   => 1,
    'levels'  => ['Easy', 'Hard'],

    'theme' => [
        'top_banner'    => '/arville/kpluz0/math/modules/images/bg01-top.jpg',
        'title_bg'      => '/arville/kpluz0/math/modules/images/bg01-top2.jpg',
        'left_side'     => '/arville/kpluz0/math/modules/images/bg01-left.jpg',
        'right_side'    => '/arville/kpluz0/math/modules/images/bg01-right.jpg',
        'content_bg'    => '/arville/kpluz0/math/modules/images/bg01-content.jpg',
        'bottom_banner' => '/arville/kpluz0/math/modules/images/bg01-bottom.jpg',
        'score_top'     => '/arville/kpluz0/math/images/score-top-1.jpg',
        'score_bottom'  => '/arville/kpluz0/math/images/score-bottom-1.jpg',
    ],

    'template' => [
        'params' => [
            'color' => [
                'type' => 'choice',
                'from' => ['red', 'orange', 'yellow', 'green', 'blue',
                           'violet', 'brown', 'black', 'white'],
            ],
            'num' => [
                'type' => 'int',
                'min'  => 1,
                'max'  => ['by_param' => 'color', 'map' => [
                    'red'    => 22, 'orange' => 21, 'yellow' => 21,
                    'green'  => 24, 'blue'   => 21, 'violet' => 10,
                    'brown'  => 10, 'black'  => 10, 'white'  => 10,
                ]],
            ],
        ],
        'unique_key' => '{color:3}{num:02}',
        'image' => '../kpluz0/math/images/colors/{color:3}{num:02}.jpg',
        'prompt'     => 'Click on the color of what\'s in the picture.',
        'answer'     => '{color}',
        'distractors' => [
            'type'  => 'sample',
            'from'  => ['red', 'orange', 'yellow', 'green', 'blue',
                        'violet', 'brown', 'black', 'white'],
            'count' => ['Easy' => 1, 'Hard' => 3],
        ],
    ],
];

// ============================================================
// SETUP
// ============================================================
$engine = new QEngine($template, $moduleKey);

// Level: from POST, else session, else default
if (isset($_POST['level'])) {
    $_SESSION['level'] = $_POST['level'];
}
if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 'Easy';
}
$engine->setLevel($_SESSION['level']);

$sessionKey = 'mod_' . md5($moduleKey);

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $q = $_SESSION[$sessionKey]['current'];
    $selected = $_GET['ansclick'];

    $scorer = new Scorer($conn, basename(__FILE__));
    $correct = $scorer->processAnswer($selected, $q['answer'], $engine->getLevel());

    $result = [
        'correct'  => $correct,
        'selected' => $selected,
        'answer'   => $q['answer'],
        'image'    => $q['image'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION IF NEEDED
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $q = $engine->generate($sessionKey);
    $_SESSION[$sessionKey]['current'] = $q;
}

// ============================================================
// RENDER
// ============================================================
render_header($template['title'], $template['title'], $template['theme']);

// Difficulty status
$Easy_status = ($engine->getLevel() === 'Easy') ? 'checked' : '';
$Hard_status = ($engine->getLevel() === 'Hard') ? 'checked' : '';
?>
<div style="padding: 0 10px;">

    <?php if ($result !== null): ?>
        <!-- ===== RESULT ===== -->
        <div style="text-align:center;">
            <br><br>
            <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; margin:0;">
                <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
            </p>
            <br>
            <p style="font-size:14pt; color:#800080; margin:0;">
                The color of what's in the picture is <strong style="color:#CC0066;">'<?php echo $result['answer']; ?>'</strong>.
            </p>
            <img src="../../<?php echo $result['image']; ?>" alt="<?php echo $result['answer']; ?>" style="max-width:300px; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
            <p style="font-size:14pt; color:#800080;">The picture shows the color <?php echo $result['answer']; ?>.</p>
        </div>
    <?php else: ?>
        <!-- ===== QUESTION ===== -->
        <div style="text-align:center;">
            <br><br>
            <img src="../../<?php echo $q['image']; ?>" alt="Color image" style="max-width:300px; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
            <br>
            <p style="font-size:17pt; font-weight:600; color:#800080; margin:0;"><?php echo $q['prompt']; ?></p>
            <br>
            <div style="display:flex; justify-content:center; gap:30px; flex-wrap:wrap; margin:20px 0;">
                <?php foreach ($q['choices'] as $color): ?>
                    <a href="?ansclick=<?php echo $color; ?>" style="display:inline-block; background:#f0f0f0; border:2px solid #ccc; border-radius:12px; padding:15px 0; font-size:1.5rem; font-weight:bold; color:#0000BB; text-decoration:none; width:120px; text-align:center; transition:0.2s;" onmouseover="this.style.background='#e0e0ff'; this.style.borderColor='#0000CC';" onmouseout="this.style.background='#f0f0f0'; this.style.borderColor='#ccc';"><?php echo ucfirst($color); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- ===== NEW QUESTION + DIFFICULTY ===== -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br/><br/>
        <p align="center">
            <input type="submit" name="Submit2" value="New Question">
        </p><br/>

        <div align="center">
            <p style="margin-top: 5px; margin-bottom: 0">
                <font face="Verdana" style="font-size: 10pt;" color="#000080">
                    Select difficulty level for next question:
                </font>
            </p>
            <table border="0" width="80%" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
                        <p style="margin-bottom: 4px">
                            <font face="Verdana">
                                <span style="font-size: 9pt">
                                    <font color="#800080">
                                        <input type="radio" name="level" value="Easy" style="font-weight: 700" <?php echo $Easy_status; ?>>
                                        <b>&nbsp;Easy</b>
                                    </font>
                                </span>
                            </font>
                        </p>
                    </td>
                    <td align="center">
                        <p style="margin-bottom: 4px">
                            <font face="Verdana">
                                <span style="font-size: 9pt">
                                    <font color="#800080">
                                        <input type="radio" name="level" value="Hard" style="font-weight: 700" <?php echo $Hard_status; ?>>
                                        <b>&nbsp;Hard</b>
                                    </font>
                                </span>
                            </font>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <br>

    <?php render_score_box(); ?>

</div>

<?php
if ($scorer !== null) {
    $scorer->outputConsoleDebug();
}
$conn->close();
render_footer();