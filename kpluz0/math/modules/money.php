<?php
// math/modules/money.php
// Computed free-text, single input with image grid.
// Dual currency (P/A) preserved per §N.
// Answer canonicalized to integer cents for exact comparison.

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

$moduleTitle = 'Counting Money';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Currency selector (unusual behavior — preserved from legacy)
if (isset($_POST['currency']) && in_array($_POST['currency'], ['P', 'A'])) {
    $_SESSION['currency'] = $_POST['currency'];
}
if (!isset($_SESSION['currency']) || !in_array($_SESSION['currency'], ['P', 'A'])) {
    $_SESSION['currency'] = 'P';
}
$currency = $_SESSION['currency'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(3, max(0, $grd));

// Coins / bills per currency
$coins = [
    'P' => [1 => '001', 2 => '005', 3 => '025', 4 => '100', 5 => '500', 6 => '1000'],
    'A' => [1 => '001', 2 => '005', 3 => '025', 4 => '100', 5 => '500', 6 => '1000'],
];
$bills = [
    'P' => [1 => '20', 2 => '50', 3 => '100', 4 => '200', 5 => '500', 6 => '1000'],
    'A' => [1 => '1',  2 => '5',  3 => '10',  4 => '20',  5 => '50',  6 => '100'],
];

// Grade × level config. Hard = legacy Medium (§E).
// Ranges: [itemCountMin, itemCountMax, coinTypeMax, billTypeMax, unitMode]
//   unitMode: 'small' = centavos/cents (gr 0-1); 'large' = pesos/dollars (gr 2+)
$configs = [
    0 => [
        'Easy' => ['countMin'=>2,  'countMax'=>4,  'coinMax'=>3, 'billMax'=>0, 'small'=>true],
        'Hard' => ['countMin'=>5,  'countMax'=>7,  'coinMax'=>4, 'billMax'=>0, 'small'=>true],
    ],
    1 => [
        'Easy' => ['countMin'=>3,  'countMax'=>7,  'coinMax'=>3, 'billMax'=>0, 'small'=>true],
        'Hard' => ['countMin'=>6,  'countMax'=>9,  'coinMax'=>4, 'billMax'=>0, 'small'=>true],
    ],
    2 => [
        'Easy' => ['countMin'=>6,  'countMax'=>8,  'coinMax'=>4, 'billMax'=>6, 'small'=>false],
        'Hard' => ['countMin'=>8,  'countMax'=>10, 'coinMax'=>5, 'billMax'=>6, 'small'=>false],
    ],
    3 => [
        'Easy' => ['countMin'=>9,  'countMax'=>11, 'coinMax'=>5, 'billMax'=>6, 'small'=>false],
        'Hard' => ['countMin'=>11, 'countMax'=>13, 'coinMax'=>6, 'billMax'=>6, 'small'=>false],
    ],
];

// ============================================================
// HANDLE SUBMIT
// ============================================================

$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    // Canonicalize to integer cents
    $rawInput   = str_replace(',', '', trim((string)($_POST['answer'] ?? '0')));
    $userFloat  = (float)$rawInput;
    $isSmall    = in_array($cur['unit'], ['centavos', 'cents'], true);
    $userCents  = (int)round($userFloat * ($isSmall ? 1 : 100));
    $answerCents = (int)round($cur['answer'] * ($isSmall ? 1 : 100));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer((string)$userCents, (string)$answerCents, $cur['lvl']);

    $result = [
        'correct'   => $isCorrect,
        'userRaw'   => $rawInput,
        'answer'    => $cur['answer'],
        'unit'      => $cur['unit'],
        'images'    => $cur['images'],
        'isSmall'   => $isSmall,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================

if ($result === null || isset($_POST['Submit2'])) {
    $cfg = $configs[$grdKey][$lvl];

    if ($currency === 'P') {
        $unit = $cfg['small'] ? 'centavos' : 'pesos';
        $prefix = 'p';
    } else {
        $unit = $cfg['small'] ? 'cents' : 'dollars';
        $prefix = 'a';
    }

    $count    = rand($cfg['countMin'], $cfg['countMax']);
    $coinList = $coins[$currency];
    $billList = $bills[$currency];

    $images = [];
    $totalCents = 0;

    for ($i = 0; $i < $count; $i++) {
        // Small mode: always coins. Large mode: 50/50 coin or bill.
        $isBill = !$cfg['small'] && (rand(1, 2) === 2);

        if ($isBill) {
            $j      = rand(1, $cfg['billMax']);
            $value  = (int)$billList[$j];            // in pesos/dollars
            $fname  = $prefix . 'b' . $billList[$j] . '.jpg';
            $totalCents += $value * 100;
        } else {
            $j      = rand(1, $cfg['coinMax']);
            $value  = (int)$coinList[$j];            // in cents
            $fname  = $prefix . $coinList[$j] . '.jpg';
            $totalCents += $value;
        }
        $images[] = $fname;
    }

    // Answer in display unit
    $answer = $cfg['small'] ? $totalCents : ($totalCents / 100);

    $_SESSION[$sessionKey]['current'] = [
        'images'  => $images,
        'answer'  => $answer,
        'unit'    => $unit,
        'isSmall' => $cfg['small'],
        'currency'=> $currency,
        'lvl'     => $lvl,
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

// Helper for formatting the answer display
$fmtAnswer = function ($val, $unit) {
    if (in_array($unit, ['pesos', 'dollars'], true)) return number_format($val, 2) . ' ' . $unit;
    return (int)$val . ' ' . $unit;
};

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
    <p style="font-size:14pt; color:#800080; margin:20px 0;">
        The amount shown is
        <strong style="color:#CC0066; font-size:17pt;"><?php echo $fmtAnswer($result['answer'], $result['unit']); ?></strong>.
    </p>
    <?php
    $imgPaths = [];
    foreach ($result['images'] as $f) $imgPaths[] = $base . '/math/images/objects/' . $f;
    render_image_grid($imgPaths, 5);
    ?>
<?php else: ?>
    <br>
    <?php
    $imgPaths = [];
    foreach ($q['images'] as $f) $imgPaths[] = $base . '/math/images/objects/' . $f;
    render_image_grid($imgPaths, 5);
    ?>
    <p style="font-size:16pt; font-weight:700; color:#0000AA; margin:20px 0;">
        How many <?php echo htmlspecialchars($q['unit']); ?> are shown?
    </p>
    <?php
    if ($q['isSmall']) {
        $ansLen = strlen((string)(int)$q['answer']);
    } else {
        $ansLen = strlen(number_format($q['answer'], 2, '.', ''));
    }
    $inputPx = max(110, ($ansLen + 1) * 32 + 24);
    ?>
    <input type="text" name="answer"
           style="width:<?php echo $inputPx; ?>px; height:48px; font-size:24px; text-align:center; border:2px solid #888; border-radius:6px;"
           maxlength="<?php echo $ansLen + 2; ?>"
           autocomplete="off" autofocus>
<?php endif; ?>

    <div style="margin-top:24px;">
        <?php if ($result === null): ?>
            <input type="submit" name="Submit1" value="Submit">
            <span style="display:inline-block; width:20px;"></span>
        <?php endif; ?>
        <input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">
                Select currency:
            </font>
        </p>
        <table border="0" width="60%" cellspacing="0" cellpadding="0"><tr>
            <td align="center">
                <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                    <input type="radio" name="currency" value="P" <?php echo $currency === 'P' ? 'checked' : ''; ?>>
                    <b>&nbsp;Philippine</b>
                </font></font>
            </td>
            <td align="center">
                <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                    <input type="radio" name="currency" value="A" <?php echo $currency === 'A' ? 'checked' : ''; ?>>
                    <b>&nbsp;American</b>
                </font></font>
            </td>
        </tr></table>

        <p style="margin-top:12px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">
                Select difficulty level for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>"
                            <?php echo $lvl === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo $l; ?></b>
                    </font></font>
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