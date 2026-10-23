<?php
// math/modules/roman.php
// Computed free-text, single input.
// Bidirectional: Arabic &#8594; Roman (opt=1) and Roman &#8594; Arabic (opt=2).
// Bypasses QEngine; free-text scoring with case/space/format canonicalisation.
//
// Level calibration: Hard = legacy Medium (§E).
// Parenthesized overline notation for values &#8805; 4000.
// Grade 5+ Hard adds ten-thousands and hundred-thousands digits (legacy Medium
// behavior — legacy Hard's millions digit dropped by the level merge).
//
// Note: opt=2 renders the Roman numeral as styled text rather than images.

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

$moduleTitle = 'Roman Numerals';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(1, $grd));  // clamp 0&#8594;1, 7+&#8594;6

// Grade × level base ranges. Hard = legacy Medium (§E).
$configs = [
    1 => ['Easy' => [1,   10],  'Hard' => [11,  35]],
    2 => ['Easy' => [5,   40],  'Hard' => [30,  120]],
    3 => ['Easy' => [11,  150], 'Hard' => [125, 499]],
    4 => ['Easy' => [119, 999], 'Hard' => [799, 3999]],
    5 => ['Easy' => [119, 999], 'Hard' => [799, 3999]],
    6 => ['Easy' => [119, 999], 'Hard' => [799, 3999]],
];

// ============================================================
// ROMAN NUMERAL HELPERS
// ============================================================

// Standard Roman for 1..3999
function romanSmall(int $n): string {
    $map = [1000=>'M', 900=>'CM', 500=>'D', 400=>'CD',
            100=>'C', 90=>'XC', 50=>'L', 40=>'XL',
            10=>'X', 9=>'IX', 5=>'V', 4=>'IV', 1=>'I'];
    $out = '';
    foreach ($map as $v => $s) {
        while ($n >= $v) { $out .= $s; $n -= $v; }
    }
    return $out;
}

// Full Roman, with parenthesized notation for &#8805; 4000.
// Format matches legacy:
//   thousands 1-3 &#8594; M/MM/MMM outside parens
//   thousands 4-9 &#8594; IV/V/VI/VII/VIII/IX inside parens
//   higher places &#8594; always inside parens
function toRoman(int $n): string {
    if ($n < 4000) return romanSmall($n);

    $millions = intdiv($n, 1000000);
    $ht       = intdiv($n, 100000) % 10;
    $tt       = intdiv($n, 10000) % 10;
    $th       = intdiv($n, 1000) % 10;
    $rest     = $n % 1000;

    $innerHigh = romanSmall($millions * 1000 + $ht * 100 + $tt * 10);

    if ($th >= 4) {
        return '(' . $innerHigh . romanSmall($th) . ')' . romanSmall($rest);
    }
    return '(' . $innerHigh . ')' . romanSmall($th * 1000) . romanSmall($rest);
}

// ============================================================
// HANDLE SUBMIT
// ============================================================

$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $raw = trim((string)($_POST['answer'] ?? ''));
    $raw = str_replace([',', ' '], '', $raw);
    $raw = strtoupper($raw);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($raw, $cur['answer'], $cur['lvl']);

    $result = [
        'correct'  => $isCorrect,
        'userRaw'  => $raw,
        'num'      => $cur['num'],
        'opt'      => $cur['opt'],
        'answer'   => $cur['answer'],
        'roman'    => $cur['roman'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================

if ($result === null || isset($_POST['Submit2'])) {
    $cfg = $configs[$grdKey][$lvl];
    $num = rand($cfg[0], $cfg[1]);

    // Legacy: push 3xxx &#8594; 4xxx to force parenthesized notation practice.
    // Bug-fixed: only fires for 4+ digit numbers (legacy fired on leading digit for shorter).
    if ($num >= 1000 && intdiv($num, 1000) % 10 === 3) {
        $num += 1000;
    }

    // Grade 5+ Hard: add ten-thousands and hundred-thousands (legacy Medium behavior)
    if ($grdKey >= 5 && $lvl === 'Hard') {
        $tt = rand(1, 9);
        $ht = (rand(1, 2) === 1) ? rand(1, 9) : 0;
        $num = $ht * 100000 + $tt * 10000 + $num;
    }

    $opt = rand(1, 2);
    if ($opt === 1) {
        // Arabic &#8594; Roman
        $answer = toRoman($num);
    } else {
        // Roman &#8594; Arabic
        $answer = (string)$num;
    }

    $_SESSION[$sessionKey]['current'] = [
        'num'    => $num,
        'opt'    => $opt,
        'answer' => $answer,
        'roman'  => toRoman($num),
        'lvl'    => $lvl,
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
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <br>
    <p style="font-size:14pt; color:#666;">
        Your answer:
        <strong style="color:#0000CC; font-size:18pt;"><?php echo htmlspecialchars($result['userRaw'] ?: '(blank)'); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php if ($result['opt'] === 1): ?>
        <p style="font-size:14pt; color:#800080; margin:20px 0;">
            The Roman numeral for <strong style="color:#CC0066;"><?php echo $result['num']; ?></strong> is
            <strong style="color:#CC0066; font-size:17pt;"><?php echo htmlspecialchars($result['roman']); ?></strong>.
        </p>
        <?php if ($grdKey >= 5 && $lvl === 'Hard' && !$result['correct']): ?>
            <p style="font-size:12pt; color:#666;">
                Your input should have been
                <strong style="color:#006600;"><?php echo htmlspecialchars($result['answer']); ?></strong>.
            </p>
        <?php endif; ?>
    <?php else: ?>
        <p style="font-size:14pt; color:#800080; margin:20px 0 10px;">
            The Roman numeral shown
        </p>
        <div style="margin:8px auto 14px;">
            <span style="font-family:'Times New Roman', Georgia, serif; font-size:28pt; font-weight:700; color:#B00058; letter-spacing:3px;">
                <?php echo htmlspecialchars($result['roman']); ?>
            </span>
        </div>
        <p style="font-size:14pt; color:#800080; margin:12px 0;">
            stands for the number
            <strong style="color:#CC0066; font-size:17pt;"><?php echo $result['num']; ?></strong>.
        </p>
    <?php endif; ?>
<?php else: ?>
    <br>
    <?php if ($q['opt'] === 1): ?>
        <p style="font-size:15pt; font-weight:700; color:#0000AA; margin:20px 0;">
            Write the Roman numeral for<br/>the Arabic number
            <strong style="color:#CC0066; font-size:20pt;"><?php echo $q['num']; ?></strong>
        </p>
        <?php if ($q['num'] >= 4000): ?>
            <p style="font-size:12pt; color:#444; margin:10px 0;">
                Use a single parenthesis to enclose all digits to be multiplied by 1000.
            </p>
        <?php endif; ?>
    <?php else: ?>
        <p style="font-size:15pt; font-weight:700; color:#0000AA; margin:20px 0 10px;">
            Write the Arabic number for the<br/>Roman numeral shown below
        </p>
        <div style="margin:10px auto 20px;">
            <span style="font-family:'Times New Roman', Georgia, serif; font-size:36pt; font-weight:700; color:#B00058; letter-spacing:3px;">
                <?php echo htmlspecialchars($q['roman']); ?>
            </span>
        </div>
    <?php endif; ?>
    <?php
    $ansLen  = strlen((string)$q['answer']);
    $inputPx = max(120, ($ansLen + 1) * 16 + 4);
    ?>
    <p style="font-size:15pt; font-weight:700; color:#0000AA; margin:15px 0;">
        Answer:
        <input type="text" name="answer"
               style="width:<?php echo $inputPx; ?>px; height:48px; font-size:24px; text-align:center; text-transform:uppercase; border:2px solid #888; border-radius:6px;"
               maxlength="<?php echo max(20, $ansLen + 5); ?>"
               autocomplete="off" autofocus>
    </p>
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