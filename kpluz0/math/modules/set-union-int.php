<?php
// math/modules/set-union-int.php
// Computed image-choice, 6 fixed choices. Student identifies which
// union/intersection relationship Set D represents.
//
// SINGLE difficulty (Easy) — legacy forced this.
// Choices fixed (same 6 images every question). Now laid out in ONE row.

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

$moduleTitle = 'Union and Intersection of Sets';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';

$descriptions = [
    'AunionB'        => 'D is the union of A and B',
    'AintersectionB' => 'D is the intersection of A and B',
    'AunionC'        => 'D is the union of A and C',
    'AintersectionC' => 'D is the intersection of A and C',
    'BunionC'        => 'D is the union of B and C',
    'BintersectionC' => 'D is the intersection of B and C',
];

$allChoices = [
    ['value' => 'AunionB',        'image' => 'AunionB.jpg',        'alt' => 'A union B'],
    ['value' => 'AintersectionB', 'image' => 'AintersectionB.jpg', 'alt' => 'A intersection B'],
    ['value' => 'AunionC',        'image' => 'AunionC.jpg',        'alt' => 'A union C'],
    ['value' => 'AintersectionC', 'image' => 'AintersectionC.jpg', 'alt' => 'A intersection C'],
    ['value' => 'BunionC',        'image' => 'BunionC.jpg',        'alt' => 'B union C'],
    ['value' => 'BintersectionC', 'image' => 'BintersectionC.jpg', 'alt' => 'B intersection C'],
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
        'C'           => $cur['C'],
        'D'           => $cur['D'],
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

    if ($grdKey <= 2)      { [$elemLo,$elemHi,$n1Lo,$n1Hi,$n2Lo,$n2Hi] = [3, 5, 4, 10, 6, 13]; }
    elseif ($grdKey === 3) { [$elemLo,$elemHi,$n1Lo,$n1Hi,$n2Lo,$n2Hi] = [3, 5, 4, 11, 6, 14]; }
    else                   { [$elemLo,$elemHi,$n1Lo,$n1Hi,$n2Lo,$n2Hi] = [5, 7, 4, 13, 9, 18]; }

    $safety = 0;
    $A = $B = $C = $D = [];
    $canonical = '';
    $dummyTargets = [];

    do {
        $elemA = rand($elemLo, $elemHi);
        do { $elemB = rand($elemLo, $elemHi); } while ($elemB === $elemA);
        do { $elemC = rand($elemLo, $elemHi); } while ($elemC === $elemA || $elemC === $elemB);

        $A = $B = $C = [];
        for ($i = 0; $i < $elemA; $i++) {
            $tries = 0;
            do {
                $useR34 = (rand(1, 2) === 1);
                $lo = $useR34 ? $n2Lo : $n1Lo;
                $hi = $useR34 ? $n2Hi : $n1Hi;
                $v = rand($lo, $hi);
                $tries++;
            } while (in_array($v, $A, true) && $tries < 30);
            $A[] = $v;
        }
        for ($i = 0; $i < $elemB; $i++) {
            $tries = 0;
            do {
                $useR34 = (rand(1, 2) === 1);
                $lo = $useR34 ? $n2Lo : $n1Lo;
                $hi = $useR34 ? $n2Hi : $n1Hi;
                $v = rand($lo, $hi);
                $tries++;
            } while (in_array($v, $B, true) && $tries < 30);
            $B[] = $v;
        }
        for ($i = 0; $i < $elemC; $i++) {
            $tries = 0;
            do {
                $useR34 = (rand(1, 2) === 1);
                $lo = $useR34 ? $n2Lo : $n1Lo;
                $hi = $useR34 ? $n2Hi : $n1Hi;
                $v = rand($lo, $hi);
                $tries++;
            } while (in_array($v, $C, true) && $tries < 30);
            $C[] = $v;
        }

        $form = rand(1, 6);

        if ($form === 1) {
            $D = array_values(array_unique(array_merge($A, $B)));
            $canonical = 'AunionB';
            $dummyTargets = ['C'];
        } elseif ($form === 2) {
            $D = array_values(array_intersect($A, $B));
            $canonical = 'AintersectionB';
            $dummyTargets = ['A', 'B', 'D'];
        } elseif ($form === 3) {
            $D = array_values(array_unique(array_merge($A, $C)));
            $canonical = 'AunionC';
            $dummyTargets = ['B'];
        } elseif ($form === 4) {
            $D = array_values(array_intersect($A, $C));
            $canonical = 'AintersectionC';
            $dummyTargets = ['A', 'C', 'D'];
        } elseif ($form === 5) {
            $D = array_values(array_unique(array_merge($B, $C)));
            $canonical = 'BunionC';
            $dummyTargets = ['A'];
        } else {
            $D = array_values(array_intersect($B, $C));
            $canonical = 'BintersectionC';
            $dummyTargets = ['B', 'C', 'D'];
        }

        $dummy = rand($n2Hi + 1, $n2Hi + 5);
        foreach ($dummyTargets as $t) {
            if ($t === 'A') $A[] = $dummy;
            if ($t === 'B') $B[] = $dummy;
            if ($t === 'C') $C[] = $dummy;
            if ($t === 'D') $D[] = $dummy;
        }

        $safety++;
    } while (count($D) < 2 && $safety < 50);

    shuffle($A); shuffle($B); shuffle($C); shuffle($D);

    $_SESSION[$sessionKey]['current'] = [
        'A' => $A, 'B' => $B, 'C' => $C, 'D' => $D,
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
    'score_top'     => $base . '/math/images/score-top-2.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-2.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);

// Sets display — tightened margins
$renderSets = function ($data) {
    ?>
    <div style="display:inline-block; text-align:left; margin:8px 0 4px 0; font-size:14pt; font-weight:700;">
        <div style="margin:4px 0;"><span style="color:#CC0066;">Set A</span> = { <span style="color:#800080;"><?php echo implode(', ', $data['A']); ?></span> }</div>
        <div style="margin:4px 0;"><span style="color:#CC0066;">Set B</span> = { <span style="color:#800080;"><?php echo implode(', ', $data['B']); ?></span> }</div>
        <div style="margin:4px 0;"><span style="color:#CC0066;">Set C</span> = { <span style="color:#800080;"><?php echo implode(', ', $data['C']); ?></span> }</div>
        <div style="margin:4px 0;"><span style="color:#CC0066;">Set D</span> = { <span style="color:#800080;"><?php echo implode(', ', $data['D']); ?></span> }</div>
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
    <?php $renderSets($result); ?>
    <p class="statement" style="font-size:16pt; font-weight:700; color:#0000CC;">
        <?php echo htmlspecialchars($result['description']); ?>.
    </p>
<?php else: ?>
    <?php $renderSets($q_curr); ?>
    <p class="statement" style="font-size:15pt; font-weight:600; color:#494949; margin:4px auto 10px auto;">
        Click on the best description for set D.
    </p>
    <div style="display:flex; justify-content:center; align-items:center; gap:6px; flex-wrap:nowrap; max-width:100%; margin:8px auto;">
        <?php foreach ($allChoices as $c): ?>
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