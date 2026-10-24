<?php
// math/modules/fractions-rank.php
// Computed free-text, triple-input. Student ranks three fractions highest&#8594;lowest.
// Bypasses QEngine; uses Scorer with compound "r1|r2|r3" scoring.

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

$moduleTitle = 'Ranking Fractions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(1, $grd));  // clamp 0&#8594;1, 7+&#8594;6

// ============================================================
// HANDLE SUBMIT1
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $r1 = (int)($_POST['rank1'] ?? 0);
    $r2 = (int)($_POST['rank2'] ?? 0);
    $r3 = (int)($_POST['rank3'] ?? 0);
    $studentCombined = "$r1|$r2|$r3";

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($studentCombined, $cur['correctAnswer'], $cur['lvl']);

    $result = [
        'correct'        => $isCorrect,
        'student'        => $studentCombined,
        'fractions'      => $cur['fractions'],
        'sortedPairs'    => $cur['sortedPairs'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $configs = [
        1 => [
            'Easy' => ['mode' => 'A', 'range' => [1, 9]],
            'Hard' => ['mode' => 'A', 'range' => [11, 99]],
        ],
        2 => [
            'Easy' => ['mode' => 'A', 'range' => [1, 15]],
            'Hard' => ['mode' => 'B', 'range' => [1, 9]],
        ],
        3 => [
            'Easy' => ['mode' => 'A', 'range' => [11, 199]],
            'Hard' => ['mode' => 'C', 'range' => [1, 12]],
        ],
        4 => [
            'Easy' => ['mode' => 'C', 'range' => [1, 12]],
            'Hard' => ['mode' => 'C', 'range' => [11, 50]],
        ],
        5 => [
            'Easy' => ['mode' => 'C', 'range' => [2, 18]],
            'Hard' => ['mode' => 'C', 'range' => [15, 99]],
        ],
        6 => [
            'Easy' => ['mode' => 'C', 'range' => [5, 21]],
            'Hard' => ['mode' => 'C', 'range' => [21, 129]],
        ],
    ];
    $cfg   = $configs[$grdKey][$lvl];
    $mode  = $cfg['mode'];
    [$lim1, $lim2] = $cfg['range'];

    $n1 = $n2 = $n3 = 0;
    $d1 = $d2 = $d3 = 0;
    $safety = 0;

    do {
        if ($mode === 'A') {
            if (rand(1, 2) === 1) {
                $tries = 0;
                do {
                    $n1 = rand($lim1, $lim2);
                    $n2 = rand($lim1, $lim2);
                    $n3 = rand($lim1, $lim2);
                    $tries++;
                } while (($n1 === $n2 || $n1 === $n3 || $n2 === $n3) && $tries < 50);
                $d1 = $d2 = $d3 = rand($lim1, $lim2);
            } else {
                $tries = 0;
                do {
                    $d1 = rand($lim1, $lim2);
                    $d2 = rand($lim1, $lim2);
                    $d3 = rand($lim1, $lim2);
                    $tries++;
                } while (($d1 === $d2 || $d1 === $d3 || $d2 === $d3) && $tries < 50);
                $n1 = $n2 = $n3 = rand($lim1, $lim2);
            }
        } elseif ($mode === 'B') {
            $tries = 0;
            do {
                $n1 = rand($lim1, $lim2); $d1 = rand($lim1, $lim2);
                $n2 = rand($lim1, $lim2); $d2 = rand($lim1, $lim2);
                $n3 = rand($lim1, $lim2); $d3 = rand($lim1, $lim2);
                $opt = rand(1, 4);
                if ($opt === 1) $d3 = $d1;
                if ($opt === 2) $d2 = $d1;
                if ($opt === 3) $d2 = $d3;
                $tries++;
            } while ($tries < 50 && (
                abs($n1/$d1 - $n2/$d2) < 0.00001 ||
                abs($n1/$d1 - $n3/$d3) < 0.00001 ||
                abs($n2/$d2 - $n3/$d3) < 0.00001
            ));
        } else {
            $tries = 0;
            do {
                $n1 = rand($lim1, $lim2); $d1 = rand($lim1, $lim2);
                $n2 = rand($lim1, $lim2); $d2 = rand($lim1, $lim2);
                $n3 = rand($lim1, $lim2); $d3 = rand($lim1, $lim2);
                $tries++;
            } while ($tries < 50 && (
                abs($n1/$d1 - $n2/$d2) < 0.00001 ||
                abs($n1/$d1 - $n3/$d3) < 0.00001 ||
                abs($n2/$d2 - $n3/$d3) < 0.00001
            ));
        }

        $fractions = ["$n1/$d1", "$n2/$d2", "$n3/$d3"];
        $values    = [$n1/$d1, $n2/$d2, $n3/$d3];
        $safety++;
    } while (count(array_unique($values)) < 3 && $safety < 30);

    $ranked = [1 => $values[0], 2 => $values[1], 3 => $values[2]];
    arsort($ranked);
    $correctRanks = [];
    $rank = 1;
    $sortedPairs  = [];
    foreach ($ranked as $pos => $v) {
        $correctRanks[$pos] = $rank++;
        $sortedPairs[] = ['frac' => $fractions[$pos - 1], 'value' => $v];
    }
    ksort($correctRanks);
    $correctAnswer = implode('|', $correctRanks);

    $_SESSION[$sessionKey]['current'] = [
        'fractions'     => $fractions,
        'correctAnswer' => $correctAnswer,
        'sortedPairs'   => $sortedPairs,
        'lvl'           => $lvl,
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
    <p style="font-size:14pt; color:#666; margin-top:20px; text-align:center;">
        Your ranking:
        <strong style="color:#0000CC; font-size:18pt;">
            <?php echo str_replace('|', ' &middot; ', htmlspecialchars($result['student'])); ?>
        </strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php
    $studentRanks = array_map('intval', explode('|', $result['student']));
    $correctRanks = [];
    foreach ($result['sortedPairs'] as $sortedIdx => $pair) {
        foreach ($result['fractions'] as $origIdx => $frac) {
            if ($frac === $pair['frac']) {
                $correctRanks[$origIdx] = $sortedIdx + 1;
                break;
            }
        }
    }
    ?>
    <p style="font-size:14pt; font-weight:600; color:#800080; margin:20px 0 10px; text-align:center;">
        Check your answer position by position:
    </p>
    <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:12px; max-width:480px; margin:0 auto;">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <?php
            $studentRank = $studentRanks[$i] ?? 0;
            $correctRank = $correctRanks[$i] ?? 0;
            $match       = ($studentRank === $correctRank && $studentRank !== 0);
            $borderColor = $match ? '#66aa66' : '#cc6666';
            $bgColor     = $match ? '#f0faf0' : '#fff5f5';
            $badge       = $match ? '&#9989;' : '&#10060;';
            ?>
            <div style="background:<?php echo $bgColor; ?>; border:2px solid <?php echo $borderColor; ?>; border-radius:10px; padding:12px 10px; text-align:center;">
                <div style="font-size:10pt; color:#888; font-weight:600; margin-bottom:6px;">
                    Position <?php echo $i + 1; ?>
                </div>
                <div style="font-size:16pt; font-weight:700; color:#CC0066; min-height:36px;">
                    <?php echo htmlspecialchars($result['fractions'][$i]); ?>
                </div>
                <div style="margin-top:10px; padding-top:8px; border-top:1px dashed #ccc; font-size:11pt; color:#555;">
                    You: <strong style="color:<?php echo $match ? '#006600' : '#CC0000'; ?>;">
                        <?php echo $studentRank ?: '—'; ?>
                    </strong>
                    &nbsp;&nbsp;Correct: <strong style="color:#006600;"><?php echo $correctRank; ?></strong>
                    <div style="font-size:14pt; margin-top:4px;"><?php echo $badge; ?></div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <p style="font-size:12pt; color:#555; margin:18px 0 0; text-align:center;">
        Correct order (highest &#8594; lowest):
        <strong style="color:#800080;">
            <?php
            $orderBits = [];
            foreach ($result['sortedPairs'] as $p) $orderBits[] = htmlspecialchars($p['frac']);
            echo implode(' &nbsp;&gt;&nbsp; ', $orderBits);
            ?>
        </strong>
    </p>
<?php else: ?>
<p class="statement" style="font-size:17pt; font-weight:600; color:#0000AA;">
    Rank the following fractions.<br/><span style="font-size:15pt; font-weight:400; color:#444444;">Put '1' under the highest, '2' under the next highest, and '3' under the lowest.</span>
</p>
    <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; max-width:420px; margin:25px auto;">
        <?php foreach ($q_curr['fractions'] as $i => $frac): ?>
            <div style="background:#f8f8ff; border:2px solid #b8b8d8; border-radius:10px; padding:16px 10px; text-align:center;">
                <div style="font-size:22pt; font-weight:700; color:#CC0066; min-height:44px;">
                    <?php echo htmlspecialchars($frac); ?>
                </div>
                <div style="margin-top:12px;">
                    <input type="text" name="rank<?php echo $i+1; ?>" maxlength="1"
                           style="width:56px; height:40px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px;"
                           autocomplete="off"<?php if ($i === 0) echo ' autofocus'; ?>>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
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