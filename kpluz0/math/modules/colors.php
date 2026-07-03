<?php
// math/modules/colors.php – Learning Colors

// ===== START SESSION AND CHECK LOGIN =====
session_name('KPLUZ_SESSION');
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}

// ===== INCLUDE SHARED FILES =====
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

// ===== DATABASE CONNECTION =====
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ===== PAGE TITLE & HEADING =====
$page_title = "Learning Colors";
$page_heading = "Learning Colors";

// ===== SUBJECT&#8209;SPECIFIC THEME IMAGES (Math) =====
$theme_images = [
    'top_banner'    => '/arville/kpluz0/math/modules/images/bg01-top.jpg',
    'title_bg'      => '/arville/kpluz0/math/modules/images/bg01-top2.jpg',
    'left_side'     => '/arville/kpluz0/math/modules/images/bg01-left.jpg',
    'right_side'    => '/arville/kpluz0/math/modules/images/bg01-right.jpg',
    'content_bg'    => '/arville/kpluz0/math/modules/images/bg01-content.jpg',
    'bottom_banner' => '/arville/kpluz0/math/modules/images/bg01-bottom.jpg',
    'score_top'     => '/arville/kpluz0/math/images/score-top-1.jpg',
    'score_bottom'  => '/arville/kpluz0/math/images/score-bottom-1.jpg',
];

render_header($page_title, $page_heading, $theme_images);

// ============================================================
// MODULE LOGIC
// ============================================================

// Only two difficulty levels: Easy and Hard
if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 'Easy';
}
if (isset($_POST['level'])) {
    $_SESSION['level'] = $_POST['level'];
}

$result = null;
$wordData = null;
$scorer = null;

// ----- Helper: get a question (color identification) -----
function getQuestion(&$usedColors) {
    // List of colors with their image ranges
    $colors = [
        'red'    => ['max' => 22],
        'orange' => ['max' => 21],
        'yellow' => ['max' => 21],
        'green'  => ['max' => 24],
        'blue'   => ['max' => 21],
        'violet' => ['max' => 10],
        'brown'  => ['max' => 10],
        'black'  => ['max' => 10],
        'white'  => ['max' => 10],
    ];

    $answer = null;
    $imagePath = null;
    $attempts = 0;
    $maxAttempts = 100;

    while ($attempts < $maxAttempts && $answer === null) {
        // Pick a random color
        $colorName = array_rand($colors);
        $maxNum = $colors[$colorName]['max'];
        $num = rand(1, $maxNum);
        $numStr = str_pad($num, 2, '0', STR_PAD_LEFT);
        $colorCode = substr($colorName, 0, 3) . $numStr;

        // Check if this color has been used recently (session tracking)
        if (isset($usedColors) && strpos($usedColors, $colorCode) !== false) {
            $attempts++;
            continue;
        }

        // Build image path
        $imagePath = "/arville/kpluz0/math/images/colors/" . $colorCode . ".jpg";
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
            $attempts++;
            continue;
        }

        $answer = $colorName;
        // Track used colors
        $usedColors .= $colorCode . ',';
        $_SESSION['used_colors'] = $usedColors;
        break;
    }

    // Fallback if no image found (should not happen)
    if ($answer === null) {
        $answer = 'red';
        $imagePath = "/arville/kpluz0/math/images/colors/red01.jpg";
    }

    // Build choices based on difficulty
    $level = $_SESSION['level'] ?? 'Easy';
    $numChoices = ($level === 'Easy') ? 2 : 4;

    // Get all color names
    $allColors = array_keys($colors);
    $choices = [];
    // Add the correct answer
    $choices[] = $answer;
    // Add random distinct wrong answers
    $wrong = array_diff($allColors, [$answer]);
    shuffle($wrong);
    $needed = $numChoices - 1;
    for ($i = 0; $i < $needed; $i++) {
        if (isset($wrong[$i])) {
            $choices[] = $wrong[$i];
        } else {
            // If not enough wrong colors, duplicate a wrong one (unlikely)
            $choices[] = $wrong[0];
        }
    }
    shuffle($choices);

    return [
        'answer' => $answer,
        'image' => $imagePath,
        'choices' => $choices
    ];
}

// ----- Process answer if clicked -----
if (isset($_GET['ansclick'])) {
    $selected = $_GET['ansclick'];
    $wordData = $_SESSION['current_question'] ?? null;
    if ($wordData) {
        // Pass only the filename to the scorer
        $moduleUrl = basename(__FILE__); // "colors.php"
        $scorer = new Scorer($conn, $moduleUrl);
        $correct = $scorer->processAnswer($selected, $wordData['answer'], $_SESSION['level']);
        $result = [
            'correct' => $correct,
            'selected' => $selected,
            'answer' => $wordData['answer'],
            'image' => $wordData['image']
        ];
        unset($_SESSION['current_question']);
    }
}

// ----- Generate new question if needed -----
if (!isset($result) || isset($_POST['Submit2'])) {
    $usedColors = $_SESSION['used_colors'] ?? '';
    $wordData = getQuestion($usedColors);
    $_SESSION['current_question'] = $wordData;
}

// ----- Radio button checked status (only Easy and Hard) -----
$Easy_status = ($_SESSION['level'] == 'Easy') ? 'checked' : '';
$Hard_status = ($_SESSION['level'] == 'Hard') ? 'checked' : '';

// ============================================================
// OUTPUT
// ============================================================
?>
<div style="padding: 0 10px;">

    <?php if (isset($result)): ?>
        <!-- ===== RESULT DISPLAY ===== -->
        <div style="text-align:center;">
            <br><br>
            <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; margin:0;">
                <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
            </p>
            <br>
            <p style="font-size:14pt; color:#800080; margin:0;">
                The color of what's in the picture is <strong style="color:#CC0066;">'<?php echo $result['answer']; ?>'</strong>.
            </p>
            <img src="<?php echo $result['image']; ?>" alt="<?php echo $result['answer']; ?>" style="max-width:300px; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
            <p style="font-size:14pt; color:#800080;">The picture shows the color <?php echo $result['answer']; ?>.</p>
        </div>
    <?php else: ?>
        <!-- ===== QUESTION DISPLAY ===== -->
        <div style="text-align:center;">
            <br><br>
            <img src="<?php echo $wordData['image']; ?>" alt="Color image" style="max-width:300px; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
            <br>
            <p style="font-size:17pt; font-weight:600; color:#800080; margin:0;">Click on the color of what's in the picture.</p>
            <br>
            <div style="display:flex; justify-content:center; gap:30px; flex-wrap:wrap; margin:20px 0;">
                <?php foreach ($wordData['choices'] as $color): ?>
                    <a href="?ansclick=<?php echo $color; ?>" style="display:inline-block; background:#f0f0f0; border:2px solid #ccc; border-radius:12px; padding:15px 0; font-size:1.5rem; font-weight:bold; color:#0000BB; text-decoration:none; width:120px; text-align:center; transition:0.2s;" onmouseover="this.style.background='#e0e0ff'; this.style.borderColor='#0000CC';" onmouseout="this.style.background='#f0f0f0'; this.style.borderColor='#ccc';"><?php echo ucfirst($color); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- ===== NEW QUESTION & DIFFICULTY SELECTION ===== -->
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

    <!-- ===== SCORE BOX (rendered by container) ===== -->
    <?php render_score_box(); ?>

</div> <!-- end padding -->

<?php
// ===== OUTPUT CONSOLE DEBUG FROM SCORER =====
if ($scorer !== null) {
    $scorer->outputConsoleDebug();
}

$conn->close();
render_footer();