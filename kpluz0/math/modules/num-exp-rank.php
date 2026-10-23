<?php
// math/modules/num-exp-rank.php
// Computed free-text, triple-input module.
// Student ranks three numerical expressions highest&#8594;lowest (1, 2, 3).
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

$moduleTitle = 'Ranking Numerical Expressions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(0, $grd));

// Grade &#8594; config. Hard = legacy Medium ranges (calibration rule §E).
// int mode: [numlim1..numlim6]
// pct mode: [pctLo, pctHi, fracDenLo, fracDenHi, decLo, decHi, targetLo, targetHi, pctfac, decfac]
$configs = [
    0 => ['mode'=>'int', 'Easy'=>[12,20,2,9,3,6],           'Hard'=>[19,39,6,15,4,8]],
    1 => ['mode'=>'int', 'Easy'=>[12,20,2,9,3,6],           'Hard'=>[19,39,6,15,4,8]],
    2 => ['mode'=>'int', 'Easy'=>[24,49,7,20,4,8],          'Hard'=>[54,119,19,39,5,12]],
    3 => ['mode'=>'int', 'Easy'=>[169,349,79,129,12,20],    'Hard'=>[349,999,149,299,16,35]],
    4 => ['mode'=>'pct', 'Easy'=>[1,9,6,9,1,6,5,45,10,0.1], 'Hard'=>[1,25,4,9,1,9,15,49,1,0.1]],
    5 => ['mode'=>'pct', 'Easy'=>[1,9,6,9,1,6,5,45,10,0.1], 'Hard'=>[1,25,4,9,1,9,15,49,1,0.1]],
    6 => ['mode'=>'pct', 'Easy'=>[1,9,6,9,1,6,5,45,10,0.1], 'Hard'=>[1,25,4,9,1,9,15,49,1,0.1]],
];
$mode = $configs[$grdKey]['mode'];
$cfg  = $configs[$grdKey][$lvl];

// ---- Handle Submit1 ----
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
        'correct'     => $isCorrect,
        'student'     => $studentCombined,
        'exps'        => $cur['exps'],
        'sortedPairs' => $cur['sortedPairs'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Generate new question ----
if ($result === null || isset($_POST['Submit2'])) {
    $maxOpt = ($lvl === 'Hard') ? 4 : 3;
    $exps = []; $values = [];

    for ($attempt = 0; $attempt < 30; $attempt++) {
        $exps = []; $values = [];

        if ($mode === 'int') {
            [$nl1,$nl2,$nl3,$nl4,$nl5,$nl6] = $cfg;

            // 3 distinct numbers
            $tries = 0;
            do {
                $n0 = rand($nl1, $nl2);
                $n1 = rand($nl1, $nl2);
                $n2 = rand($nl1, $nl2);
                $tries++;
            } while (($n0 === $n1 || $n0 === $n2 || $n1 === $n2) && $tries < 100);
            $nums = [$n0, $n1, $n2];

            $add = [rand($nl3,$nl4), rand($nl3,$nl4), rand($nl3,$nl4)];

            $mults = [];
            for ($i = 0; $i < 3; $i++) {
                $tries = 0;
                do {
                    $ma = rand($nl5, $nl6);
                    $mb = rand($nl5, $nl6);
                    $tries++;
                } while ($ma === $mb && $tries < 20);
                $mults[$i] = [$ma, $mb];
            }

            for ($i = 0; $i < 3; $i++) {
                $a  = $add[$i];
                $ma = $mults[$i][0];
                $mb = $mults[$i][1];
                $o  = rand(1, $maxOpt);
                switch ($o) {
                    case 1:
                        $exps[$i]   = "$a + " . ($nums[$i] - $a);
                        $values[$i] = $nums[$i];
                        break;
                    case 2:
                        $exps[$i]   = ($nums[$i] + $a) . " - $a";
                        $values[$i] = $nums[$i];
                        break;
                    case 3:
                        $exps[$i]   = "$ma x $mb";
                        $values[$i] = $ma * $mb;
                        break;
                    case 4:
                        $exps[$i]   = ($nums[$i] * $ma) . " / $ma";
                        $values[$i] = $nums[$i];
                        break;
                }
            }
        } else {
            [$p1,$p2,$d1,$d2,$d3,$d4,$n1,$n2,$pctfac,$decfac] = $cfg;

            $tries = 0;
            do {
                $t0 = rand($n1, $n2);
                $t1 = rand($n1, $n2);
                $t2 = rand($n1, $n2);
                $tries++;
            } while (($t0 === $t1 || $t0 === $t2 || $t1 === $t2) && $tries < 100);
            $targets = [$t0, $t1, $t2];

            for ($i = 0; $i < 3; $i++) {
                $opt = rand(1, 3);
                $t = $targets[$i];
                if ($opt === 1) {
                    $pct = rand($p1, $p2) * $pctfac;
                    $x   = round($t / ($pct * 0.01), 2);
                    $exps[$i] = "$pct% of $x";
                } elseif ($opt === 2) {
                    $tries = 0;
                    do {
                        $num = rand(1, $d2);
                        $den = rand($d1, $d2);
                        $tries++;
                    } while ($den <= $num && $tries < 20);
                    $x = round($t * $den / $num, 2);
                    $exps[$i] = "$num/$den of $x";
                } else {
                    $dec = rand($d3, $d4) * $decfac;
                    $x   = round($t / $dec, 2);
                    $exps[$i] = "$dec of $x";
                }
                $values[$i] = $t;
            }
        }

        if (count(array_unique($values)) === 3) break;
    }

    // Rank (highest value &#8594; rank 1)
    arsort($values);
    $ranks = [];
    $sortedPairs = [];
    $pos = 1;
    foreach ($values as $i => $v) {
        $ranks[$i] = $pos++;
        $sortedPairs[] = ['exp' => $exps[$i], 'value' => $v];
    }
    ksort($ranks);                              // order by expression index 0,1,2
    $correctAnswer = implode('|', $ranks);      // e.g. "3|1|2" — rank per position

    $_SESSION[$sessionKey]['current'] = [
        'exps'          => $exps,
        'values'        => $values,
        'correctAnswer' => $correctAnswer,
        'sortedPairs'   => $sortedPairs,
        'lvl'           => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ---- Render ----
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
        Your ranking:
        <strong style="color:#0000CC; font-size:18pt;">
            <?php echo str_replace('|', ' &middot; ', htmlspecialchars($result['student'])); ?>
        </strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php
    // Value lookup per expression (sortedPairs has values attached)
    $expValues = [];
    foreach ($result['sortedPairs'] as $pair) {
        $expValues[$pair['exp']] = $pair['value'];
    }
    // Student's per-position ranks: "3|1|2" &#8594; [3, 1, 2]
    $studentRanks = array_map('intval', explode('|', $result['student']));
    // Correct rank per original position: derive from sortedPairs
    $correctRanks = [];
    foreach ($result['sortedPairs'] as $sortedIdx => $pair) {
        foreach ($result['exps'] as $origIdx => $exp) {
            if ($exp === $pair['exp']) {
                $correctRanks[$origIdx] = $sortedIdx + 1;
                break;
            }
        }
    }
    ?>
    <p style="font-size:14pt; font-weight:600; color:#800080; margin:20px 0 10px;">
        Check your answer position by position:
    </p>
    <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:12px; max-width:660px; margin:0 auto;">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <?php
            $exp         = $result['exps'][$i];
            $val         = $expValues[$exp] ?? null;
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
                <div style="font-size:14pt; font-weight:700; color:#CC0000; min-height:36px;">
                    <?php echo htmlspecialchars($exp); ?>
                </div>
                <?php if ($val !== null): ?>
                    <div style="font-size:11pt; color:#0000CC; font-weight:600; margin-top:2px;">
                        = <?php echo htmlspecialchars((string)$val); ?>
                    </div>
                <?php endif; ?>
                <div style="margin-top:10px; padding-top:8px; border-top:1px dashed #ccc; font-size:11pt; color:#555;">
                    <div>
                        You: <strong style="color:<?php echo $match ? '#006600' : '#CC0000'; ?>;">
                            <?php echo $studentRank ?: '—'; ?>
                        </strong>
                        &nbsp;&nbsp;Correct: <strong style="color:#006600;"><?php echo $correctRank; ?></strong>
                    </div>
                    <div style="font-size:14pt; margin-top:4px;"><?php echo $badge; ?></div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <p style="font-size:12pt; color:#555; margin:18px 0 0;">
        Correct order (highest &#8594; lowest):
        <strong style="color:#800080;">
            <?php
            $orderBits = [];
            foreach ($result['sortedPairs'] as $p) {
                $orderBits[] = htmlspecialchars($p['exp']);
            }
            echo implode(' &nbsp;&gt;&nbsp; ', $orderBits);
            ?>
        </strong>
    </p>
<?php else: ?>
    <br>
    <p style="font-size:15pt; font-weight:700; color:#0000AA; margin:15px 0;">
        Rank the numerical expressions below.<br>
        <span style="font-size:13pt; font-weight:500; color:#333;">
            Put '1' under the highest, '2' under the next,<br>and '3' under the lowest.
        </span>
    </p>
    <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap; margin:25px 0;">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div style="background:#fafafa; border:2px solid #ccc; border-radius:10px; padding:16px; min-width:150px;">
                <div style="font-size:16pt; font-weight:700; color:#CC0000; min-height:36px;">
                    <?php echo htmlspecialchars($q['exps'][$i]); ?>
                </div>
                <div style="margin-top:14px;">
                    <input type="text" name="rank<?php echo $i+1; ?>" maxlength="1"
                           style="width:60px; height:44px; font-size:22px; text-align:center; border:2px solid #888; border-radius:6px;"
                           autocomplete="off"<?php if ($i === 0) echo ' autofocus'; ?>>
                </div>
            </div>
        <?php endfor; ?>
    </div>
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