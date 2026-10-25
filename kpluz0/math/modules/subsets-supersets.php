<?php
// math/modules/subsets-supersets.php
// Computed image-choice, 4 choices. Student identifies which
// set relationship between A and B is true.
//
// SINGLE difficulty (Easy) — legacy forced this.
// Choices in ONE row. Reduced vertical spacing. Centered prompt text.

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

$moduleTitle = 'Subsets and Supersets';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

$descriptions = [
    'AsubsetB'    => 'A is a subset of B',
    'BsupersetA'  => 'B is a superset of A',
    'AsupersetB'  => 'A is a superset of B',
    'BsubsetA'    => 'B is a subset of A',
    'AequalsB'    => 'A equals B',
    'AnotsubsetB' => 'A is not a subset of B',
    'BnotsubsetA' => 'B is not a subset of A',
];

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, $cur['canonical'], $lvl);

    $result = [
        'correct'     => $isCorrect,
        'clicked'     => $click,
        'A'           => $cur['A'],
        'B'           => $cur['B'],
        'canonical'   => $cur['canonical'],
        'description' => $cur['description'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $grd    = (int)($_SESSION['grade'] ?? 0);
    $grdKey = min(6, max(2, $grd));

    if ($grdKey === 2)      { [$elemLo,$elemHi,$nLo,$nHi] = [2, 4, 1, 15]; }
    elseif ($grdKey === 3)  { [$elemLo,$elemHi,$nLo,$nHi] = [3, 5, 1, 15]; }
    elseif ($grdKey === 4)  { [$elemLo,$elemHi,$nLo,$nHi] = [4, 6, 1, 15]; }
    else                    { [$elemLo,$elemHi,$nLo,$nHi] = [6, 8, 1, 30]; }

    $elemCount = rand($elemLo, $elemHi);
    $A = [];
    for ($i = 0; $i < $elemCount; $i++) {
        $tries = 0;
        do {
            $v = rand($nLo, $nHi);
            $tries++;
        } while (in_array($v, $A, true) && $tries < 30);
        $A[] = $v;
    }
    $B = $A;

    $form = rand(1, 7);

    if ($form === 1 || $form === 5) {
        $B[] = rand($nHi + 1, $nHi + 5);
    } elseif ($form === 2 || $form === 6) {
        $A[] = rand($nHi + 1, $nHi + 5);
    } elseif ($form === 4 || $form === 7) {
        $extraA = rand($nHi + 1, $nHi + 5);
        $A[] = $extraA;
        $tries = 0;
        do {
            $extraB = rand($nHi + 1, $nHi + 5);
            $tries++;
        } while ($extraB === $extraA && $tries < 20);
        $B[] = $extraB;
    }

    shuffle($A);
    shuffle($B);

    $choices = [];

    if (rand(1, 2) === 1) {
        $choices[] = ['value' => 'AsubsetB',   'image' => 'ApropersubsetB.jpg',   'alt' => 'A subset of B'];
    } else {
        $choices[] = ['value' => 'BsupersetA', 'image' => 'BpropersupersetA.jpg', 'alt' => 'B superset of A'];
    }

    if (rand(1, 2) === 1) {
        $choices[] = ['value' => 'AsupersetB', 'image' => 'ApropersupersetB.jpg', 'alt' => 'A superset of B'];
    } else {
        $choices[] = ['value' => 'BsubsetA',   'image' => 'BpropersubsetA.jpg',   'alt' => 'B subset of A'];
    }

    $choices[] = ['value' => 'AequalsB', 'image' => 'AequalsB.jpg', 'alt' => 'A equals B'];

    if (rand(1, 2) === 1) {
        $choices[] = ['value' => 'AnotsubsetB', 'image' => 'AnotsubsetB.jpg', 'alt' => 'A not subset of B'];
    } else {
        $choices[] = ['value' => 'BnotsubsetA', 'image' => 'BnotsubsetA.jpg', 'alt' => 'B not subset of A'];
    }

    if ($form === 1 || $form === 5) {
        $canonical = $choices[0]['value'];
    } elseif ($form === 2 || $form === 6) {
        $canonical = $choices[1]['value'];
    } elseif ($form === 3) {
        $canonical = 'AequalsB';
    } else {
        $canonical = $choices[3]['value'];
    }

    $_SESSION[$sessionKey]['current'] = [
        'A' => $A, 'B' => $B,
        'choices'     => $choices,
        'canonical'   => $canonical,
        'description' => $descriptions[$canonical],
        'lvl' => $lvl,
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

// Sets display — tightened margins
$renderSets = function ($A, $B) {
    ?>
    <div style="display:inline-block; text-align:left; margin:8px 0 4px 0; font-size:14pt; font-weight:700;">
        <div style="margin:4px 0;"><span style="color:#CC0066;">Set A</span> = { <span style="color:#800080;"><?php echo implode(', ', $A); ?></span> }</div>
        <div style="margin:4px 0;"><span style="color:#CC0066;">Set B</span> = { <span style="color:#800080;"><?php echo implode(', ', $B); ?></span> }</div>
    </div>
    <?php
};
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        Your answer: <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['description']); ?>'</strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php $renderSets($result['A'], $result['B']); ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#0000CC;">
        <?php echo htmlspecialchars($result['description']); ?>.
    </p>
<?php else: ?>
    <?php $renderSets($q_curr['A'], $q_curr['B']); ?>
    <p class="statement" style="font-size:15pt; font-weight:600; color:#494949; margin:4px auto 10px auto;">
        Click on the relationship that is true.
    </p>
    <div style="display:flex; justify-content:center; align-items:center; gap:16px; flex-wrap:nowrap; max-width:100%; margin:8px auto;">
        <?php foreach ($q_curr['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c['value']); ?>"
               style="display:block; flex:0 1 auto; min-width:0; padding:2px;">
                <img src="<?php echo $base . '/math/images/sets/' . htmlspecialchars($c['image']); ?>"
                     alt="<?php echo htmlspecialchars($c['alt']); ?>"
                     style="border:1px solid #ddd; border-radius:6px; max-width:100%; height:auto; display:block;">
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <div style="margin-top:20px;">
        <br/><input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin:30px 0;"<?php endif; ?>>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();