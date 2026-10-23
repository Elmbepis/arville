<?php
// math/modules/place-value-charts.php
//
// COMPUTED-ANSWER module — fill in place value chart columns.
// Free-text numeric input per column, POST Submit1.
//
// THEME: standard Math rotation (paper/wquiz pool via container.php).
// The pvc-images chart, input row, and feedback tables are all part of
// the module's own content area — they don't change with the frame theme.
//
// LEVEL: Easy = legacy Easy, Hard = legacy Medium (standard calibration).
//
// PLACE-VALUE MODEL:
//   $pvstart   = index of the leftmost column image (0 = "ten billions")
//   $placenum  = number of columns to display
//   Input j  &#8594;  weight 10^(11-j)   where j runs from pvstart+1 to pvstart+placenum
//   Image at pvstart+i  &#8594;  place name placeNames[pvstart+i]
//
// LEGACY FIX: added grade-0 handling (legacy left grd=0 undefined &#8594; PHP warnings).
// Grade 0 clamps to grade-1 ranges.
//
// FEEDBACK tables preserved verbatim from legacy:
//   Student's entered digits: shown for ALL placenum places (including zeros).
//   Correct placements: shown for ansLen places (minimal representation, no leading zeros).

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

$moduleTitle = 'Place Value Charts';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);
$grdKey = max(1, min(5, $grd)); // clamp: grd<1 &#8594; 1, grd>5 &#8594; 5

// Place value names, 0-indexed from highest to ones
$placeNames = [
    'ten billions', 'billions', 'hundred millions', 'ten millions',
    'millions', 'hundred thousands', 'ten thousands', 'thousands',
    'hundreds', 'tens', 'ones', 'tenths', 'hundredths', 'thousandths',
    'ten thousandths', 'hundred thousandths', 'millionths',
    'ten millionths', 'hundred millionths', 'billionths',
];

// ============================================================
// HANDLE ANSWER (Submit1)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur      = $_SESSION[$sessionKey]['current'];
    $pvstart  = $cur['pvstart'];
    $placenum = $cur['placenum'];
    $correctAns = (int)$cur['ans'];

    // Compute the numeric value the student entered
    $postansval = 0;
    $studentRows = [];
    for ($j = $pvstart + 1; $j <= $pvstart + $placenum; $j++) {
        $digit = (int)($_POST['answer'][$j] ?? 0);
        if ($digit < 0) $digit = 0;
        if ($digit > 9) $digit = 9;
        $postansval += $digit * (int)pow(10, 11 - $j);
        $studentRows[] = [
            'place' => $placeNames[$j - 1] ?? '',
            'digit' => $digit,
        ];
    }

    $isCorrect = ($postansval === $correctAns);

    // Score via Scorer — pass canonical integer strings
    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer((string)$postansval, (string)$correctAns, $cur['lvl']);

    $result = [
        'correct'     => $isCorrect,
        'studentRows' => $studentRows,
        'ans'         => $correctAns,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $pvstart  = 7;
    $placenum = 4;
    $ans      = 123;

    if ($lvl === 'Easy') {
        if ($grdKey === 1) {
            $placenum = 4; $pvstart = 7; $ans = rand(111, 999);
        } elseif ($grdKey === 2) {
            $placenum = 5; $pvstart = 6;
            $opt = rand(1, 2);
            $ans = ($opt === 1) ? rand(111, 999) : rand(1111, 9999);
        } elseif ($grdKey === 3 || $grdKey === 4) {
            $placenum = 6;
            $opt = rand(1, 6);
            switch ($opt) {
                case 1: $ans = rand(1111, 9999);     $pvstart = 5; break;
                case 2: $ans = rand(111, 999) * 10;  $pvstart = 5; break;
                case 3: $ans = rand(11111, 99999);   $pvstart = 5; break;
                case 4: $ans = rand(1111, 9999) * 10; $pvstart = 5; break;
                case 5: $ans = rand(1111, 9999) * 10; $pvstart = 4; break;
                case 6: $ans = rand(111, 999) * 100;  $pvstart = 3; break;
            }
        } else { // 5+
            $placenum = 7;
            $opt = rand(1, 7);
            switch ($opt) {
                case 1: $ans = rand(11111, 99999);      $pvstart = 4; break;
                case 2: $ans = rand(1111, 9999) * 10;   $pvstart = 4; break;
                case 3: $ans = rand(1111, 9999) * 10;   $pvstart = 3; break;
                case 4: $ans = rand(11111, 99999) * 10; $pvstart = 4; break;
                case 5: $ans = rand(11111, 99999) * 10; $pvstart = 3; break;
                case 6: $ans = rand(111111, 999999) * 10; $pvstart = 3; break;
                case 7: $ans = rand(11111, 99999) * 100; $pvstart = 3; break;
            }
        }
    } else { // Hard = legacy Medium
        if ($grdKey === 1) {
            $placenum = 5; $pvstart = 6; $ans = rand(1111, 9999);
        } elseif ($grdKey === 2) {
            $placenum = 6; $pvstart = 5;
            $opt = rand(1, 2);
            $ans = ($opt === 1) ? rand(1111, 9999) : rand(11111, 99999);
            if (rand(1, 2) === 1) {
                $ans = (int)(substr($ans, 0, strlen($ans) - 1) * 10);
                if (rand(1, 2) === 1) $pvstart = 4;
            }
        } elseif ($grdKey === 3 || $grdKey === 4) {
            $placenum = 7;
            $opt = rand(1, 12);
            switch ($opt) {
                case 1:  $ans = rand(11111, 99999);        $pvstart = 4; break;
                case 2:  $ans = rand(1111, 9999) * 10;     $pvstart = 4; break;
                case 3:  $ans = rand(1111, 9999) * 10;     $pvstart = 3; break;
                case 4:  $ans = rand(111, 999) * 100;      $pvstart = 4; break;
                case 5:  $ans = rand(111, 999) * 100;      $pvstart = 3; break;
                case 6:  $ans = rand(111111, 999999);      $pvstart = 4; break;
                case 7:  $ans = rand(11111, 99999) * 10;   $pvstart = 4; break;
                case 8:  $ans = rand(11111, 99999) * 10;   $pvstart = 3; break;
                case 9:  $ans = rand(111, 999) * 1000;     $pvstart = 4; break;
                case 10: $ans = rand(1111, 9999) * 100;    $pvstart = 4; break;
                case 11: $ans = rand(1111, 9999) * 1000;   $pvstart = 3; break;
                case 12: $ans = rand(1111, 9999) * 1000;   $pvstart = 2; break;
            }
        } else { // 5+
            $placenum = 8;
            $opt = rand(1, 10);
            switch ($opt) {
                case 1:  $ans = rand(111111, 999999) * 10;   $pvstart = 3; break;
                case 2:  $ans = rand(111111, 999999) * 10;   $pvstart = 2; break;
                case 3:  $ans = rand(11111, 99999) * 100;    $pvstart = 3; break;
                case 4:  $ans = rand(11111, 99999) * 100;    $pvstart = 2; break;
                case 5:  $ans = rand(1111, 9999) * 1000;     $pvstart = 1; break;
                case 6:  $ans = rand(1111111, 9999999) * 10; $pvstart = 2; break;
                case 7:  $ans = rand(1111111, 9999999) * 10; $pvstart = 1; break;
                case 8:  $ans = rand(111111, 999999) * 100;  $pvstart = 2; break;
                case 9:  $ans = rand(111111, 999999) * 100;  $pvstart = 1; break;
                case 10: $ans = rand(1111, 9999) * 10000;    $pvstart = 0; break;
            }
        }
    }

    $_SESSION[$sessionKey]['current'] = [
        'pvstart'  => $pvstart,
        'placenum' => $placenum,
        'ans'      => $ans,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
// Note: no $theme argument — container rotates a Math theme.
// Content area (below) stays identical regardless of which theme is picked.
render_header($moduleTitle, $moduleTitle);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <?php if ($result !== null): ?>
        <br>
        <p style="font-family:'Comic Sans MS',sans-serif; font-size:14pt; font-weight:700; color:#800080; margin:15px 0;">
            You placed the digits of
            <span style="color:#CC0066;"><?php echo $result['ans']; ?></span>
            in this manner:
        </p>
        <table align="center" style="margin:0 auto; border-collapse:collapse;">
            <?php foreach ($result['studentRows'] as $row): ?>
                <tr>
                    <td style="text-align:left; font-family:'Comic Sans MS',sans-serif;
                               font-size:14pt; font-weight:500; color:#454545; padding:4px 10px;">
                        <?php echo htmlspecialchars($row['place']); ?>:
                    </td>
                    <td style="width:20px;">&nbsp;</td>
                    <td style="text-align:left; font-family:'Comic Sans MS',sans-serif;
                               font-size:14pt; font-weight:700; color:#CC0066; padding:4px 10px;">
                        <?php echo $row['digit']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>

        <?php if (!$result['correct']):
            $ansStr = (string)$result['ans'];
            $ansLen = strlen($ansStr);
            $pos    = 10 - $ansLen;
        ?>
            <p style="font-family:'Comic Sans MS',sans-serif; font-size:14pt; font-weight:700;
                      color:#800080; margin-top:15px;">
                The correct placements are:
            </p>
            <table align="center" style="margin:0 auto; border-collapse:collapse;">
                <?php for ($j = $pos; $j <= $ansLen + $pos - 1; $j++):
                    $placeName = $placeNames[$j + 1] ?? '';
                    $digit = substr($ansStr, $j - $pos, 1);
                    if ($digit === '') $digit = '0';
                ?>
                    <tr>
                        <td style="text-align:left; font-family:'Comic Sans MS',sans-serif;
                                   font-size:14pt; font-weight:500; color:#454545; padding:4px 10px;">
                            <?php echo htmlspecialchars($placeName); ?>:
                        </td>
                        <td style="width:20px;">&nbsp;</td>
                        <td style="text-align:left; font-family:'Comic Sans MS',sans-serif;
                                   font-size:14pt; font-weight:700; color:#CC0066; padding:4px 10px;">
                            <?php echo $digit; ?>
                        </td>
                    </tr>
                <?php endfor; ?>
            </table>
        <?php endif; ?>

    <?php else: ?>
        <br>
        <p style="font-family:'Comic Sans MS',sans-serif; font-size:16pt; font-weight:700;
                  color:#800080; margin:15px 0;">
            Place the digits of the following<br>number in the place value chart.
        </p>
        <p style="font-family:Verdana,sans-serif; font-size:24pt; font-weight:700;
                  color:#222222; margin:15px 0;">
            <?php echo $q['ans']; ?>
        </p>

        <table border="0" align="center" cellspacing="0" cellpadding="0" style="margin:20px auto;">
            <tr>
                <?php for ($i = 0; $i < $q['placenum']; $i++):
                    $j = $q['pvstart'] + $i;
                    $pvimg = $base . '/math/modules/images/pvc-images/' . $j . '-pvc.jpg';
                ?>
                    <td width="56" height="211" align="center">
                        <img border="0" src="<?php echo $pvimg; ?>">
                    </td>
                <?php endfor; ?>
            </tr>
            <tr>
                <?php for ($i = 1; $i <= $q['placenum']; $i++):
                    $j = $q['pvstart'] + $i;
                ?>
                    <td width="56" height="50" align="center">
                        <input type="text" name="answer[<?php echo $j; ?>]"
                               size="1" maxlength="1"
                               style="text-align:center; height:28px; width:40px;
                                      font-weight:bold; font-size:22px; outline:none;"
                               autocomplete="off"
                               <?php if ($i === 1) echo 'autofocus'; ?>>
                    </td>
                <?php endfor; ?>
            </tr>
        </table>
    <?php endif; ?>

    <div>
        <?php if ($result === null): ?>
            <input type="submit" name="Submit1" value="Submit">
            <span style="display:inline-block; width:20px;"></span>
        <?php endif; ?>
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>

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