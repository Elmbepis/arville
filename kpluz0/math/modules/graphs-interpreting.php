<?php
// math/modules/graphs-interpreting.php
// Computed text-choice with visual bar graph display.
// Theme: pets (grade &#8804;2 & not Hard) or sales (else).
// Question types: 1-2 (which max/min), 3-5 (how many).
// Easy: qopt 1-3. Hard: qopt 3-5.
// Bar graph built from icon images stacked vertically + label image below.

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
$imgGraphDir = $base . '/math/images/graphs/pics';

$moduleTitle = 'Interpreting Graphs';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, (string)$cur['ans'], $lvl);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $click,
        'ans'     => $cur['ans'],
        'exp'     => $cur['exp'],
        'graph'   => $cur['graph'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $grd    = (int)($_SESSION['grade'] ?? 0);
    $grdKey = min(6, max(0, $grd));

    $theme = ($grd <= 2 && $lvl !== 'Hard') ? 'pets' : 'sales';

    if ($lvl === 'Easy') {
        if ($grd <= 2)      { $dlim = 6;  $bars = 4; }
        elseif ($grd === 3) { $dlim = 7;  $bars = 4; }
        else                { $dlim = 10; $bars = 5; }
    } else {
        if ($grd <= 2)      { $dlim = 10; $bars = 5; }
        elseif ($grd === 3) { $dlim = 15; $bars = 6; }
        else                { $dlim = 20; $bars = 6; }
    }

    if ($theme === 'pets') {
        $title       = 'Our Favorite Pets';
        $desc        = 'We were asked to vote for our favorite pet. Here are our votes:';
        $iconFiles   = ['dog.jpg', 'cat.jpg', 'bird.jpg', 'fish.jpg', 'frog.jpg'];
        $labelFiles  = ['dogs.jpg', 'cats.jpg', 'birds.jpg', 'fishs.jpg', 'frogs.jpg'];
        $choiceTexts = ['dogs', 'cats', 'birds', 'fishes', 'frogs'];
        $cw          = 100;
        $maxQ        = 'Which pet got the most votes?';
        $minQ        = 'Which pet got the lowest votes?';
        $countXQ     = 'How many votes did {X} get as the favorite pet?';
        $countMaxQ   = 'How many votes did the most popular pet get?';
        $countMinQ   = 'How many votes did the least popular pet get?';
        $expMax      = '{X} got the most votes as the favorite pet, getting a total of {N} votes.';
        $expMin      = '{X} got the lowest votes as the favorite pet, getting only a total of {N} votes.';
        $expCountX   = '{X} got a total of {N} votes as the favorite pet.';
        $expCountMax = '{X} got the most votes as the favorite pet, getting a total of {N} votes.';
        $expCountMin = '{X} got the lowest votes as the favorite pet, getting a total of only {N} votes.';
    } else {
        $title       = 'Sales Report';
        $desc        = 'Study the graph below showing the sales of different products.';
        $iconFiles   = ['bar-red.jpg', 'bar-orange.jpg', 'bar-yellow.jpg', 'bar-green.jpg', 'bar-blue.jpg', 'bar-violet.jpg'];
        $labelFiles  = ['bags.jpg', 'shirts.jpg', 'books.jpg', 'toys.jpg', 'tools.jpg', 'hats.jpg'];
        $choiceTexts = ['bags', 'shirts', 'books', 'toys', 'tools', 'hats'];
        $cw          = 80;
        $maxQ        = 'Which product sold the most?';
        $minQ        = 'Which product sold the least?';
        $countXQ     = 'How many {X} were sold?';
        $countMaxQ   = 'How many items of the most popular product were sold?';
        $countMinQ   = 'How many items of the least popular product were sold?';
        $expMax      = '{X} had the highest sales, with {N} items sold.';
        $expMin      = '{X} had the lowest sales, with {N} items sold.';
        $expCountX   = 'A total of {N} {X} were sold.';
        $expCountMax = '{X} had the highest sales, selling a total of {N} items.';
        $expCountMin = '{X} had the lowest sales, selling only {N} items.';
    }

    $votes = [];
    $tries = 0;
    do {
        $votes = [];
        for ($n = 0; $n < $bars; $n++) {
            $votes[] = rand(2, $dlim);
        }
        $tries++;
    } while (count(array_unique($votes)) < $bars && $tries < 50);

    $maxVal   = max($votes);
    $minVal   = min($votes);
    $maxIdx   = array_search($maxVal, $votes, true);
    $minIdx   = array_search($minVal, $votes, true);
    $maxLabel = $choiceTexts[$maxIdx];
    $minLabel = $choiceTexts[$minIdx];

    $qopt = ($lvl === 'Easy') ? rand(1, 3) : rand(3, 5);
    $randomIdx = rand(0, $bars - 1);

    if ($qopt === 1) {
        $ans      = $maxLabel;
        $question = $maxQ;
        $exp      = str_replace(['{X}', '{N}'], [ucfirst($maxLabel), $maxVal], $expMax);
    } elseif ($qopt === 2) {
        $ans      = $minLabel;
        $question = $minQ;
        $exp      = str_replace(['{X}', '{N}'], [ucfirst($minLabel), $minVal], $expMin);
    } elseif ($qopt === 3) {
        $ans      = $votes[$randomIdx];
        $question = str_replace('{X}', $choiceTexts[$randomIdx], $countXQ);
        $exp      = str_replace(['{X}', '{N}'], [ucfirst($choiceTexts[$randomIdx]), $votes[$randomIdx]], $expCountX);
    } elseif ($qopt === 4) {
        $ans      = $maxVal;
        $question = $countMaxQ;
        $exp      = str_replace(['{X}', '{N}'], [ucfirst($maxLabel), $maxVal], $expCountMax);
    } else {
        $ans      = $minVal;
        $question = $countMinQ;
        $exp      = str_replace(['{X}', '{N}'], [ucfirst($minLabel), $minVal], $expCountMin);
    }

    if ($qopt === 1 || $qopt === 2) {
        $visibleLabels = array_slice($choiceTexts, 0, $bars);
        $pool = array_values(array_diff($visibleLabels, [$ans]));
        shuffle($pool);
        $choices = array_slice($pool, 0, 3);
        $choices[] = $ans;
        shuffle($choices);
    } else {
        $choices = [$ans];
        $tries = 0;
        while (count($choices) < 4 && $tries < 50) {
            $c = rand(2, $dlim);
            if (!in_array($c, $choices, true)) $choices[] = $c;
            $tries++;
        }
        shuffle($choices);
    }

    $graph = [
        'title'      => $title,
        'desc'       => $desc,
        'votes'      => $votes,
        'iconFiles'  => array_slice($iconFiles, 0, $bars),
        'labelFiles' => array_slice($labelFiles, 0, $bars),
        'cw'         => $cw,
        'bars'       => $bars,
    ];

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => (string)$ans,
        'question' => $question,
        'exp'      => $exp,
        'choices'  => $choices,
        'graph'    => $graph,
        'lvl'      => $lvl,
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER HELPERS
// ============================================================
function renderGraph($graph, $imgGraphDir) {
    ?>
    <div style="display:inline-block; background:#ffffff; border:1px solid #cccccc; border-radius:8px; padding:18px 22px; margin:12px auto 6px auto;">
        <div style="font-size:16pt; font-weight:700; color:#800080; text-align:center; margin-bottom:6px;">
            <?php echo htmlspecialchars($graph['title']); ?>
        </div>
        <div style="font-size:12pt; color:#333333; text-align:center; margin-bottom:18px;">
            <?php echo htmlspecialchars($graph['desc']); ?>
        </div>
        <div style="display:flex; justify-content:center; align-items:flex-end; gap:10px;">
            <?php foreach ($graph['votes'] as $i => $v): ?>
                <div style="display:flex; flex-direction:column; align-items:center; width:<?php echo (int)$graph['cw']; ?>px;">
                    <div style="display:flex; flex-direction:column; align-items:center;">
                        <?php for ($k = 0; $k < $v; $k++): ?>
                            <img src="<?php echo htmlspecialchars($imgGraphDir . '/' . $graph['iconFiles'][$i]); ?>"
                                 alt="" style="display:block; padding-bottom:4px;">
                        <?php endfor; ?>
                    </div>
                    <img src="<?php echo htmlspecialchars($imgGraphDir . '/' . $graph['labelFiles'][$i]); ?>"
                         alt="" style="display:block; padding-top:4px;">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
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
    <p style="font-size:14pt; color:#666; text-align:center; margin-top:20px;">
        You clicked on <strong style="color:#0000BB; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>; text-align:center;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p class="statement" style="font-size:14pt; color:#800080;">
        <?php echo htmlspecialchars($result['exp']); ?>
    </p>
    <?php renderGraph($result['graph'], $imgGraphDir); ?>
<?php else: ?>
    <?php renderGraph($q_curr['graph'], $imgGraphDir); ?>
    <p class="statement" style="font-size:17pt; font-weight:600; color:#800080; margin:6px auto 10px auto;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; max-width:440px; margin:0 auto 20px;">
        <?php foreach ($q_curr['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode((string)$c); ?>"
               style="display:block; background:#f0f0f0; border:2px solid #ccc; border-radius:12px; padding:14px 20px; font-size:1.3rem; font-weight:bold; color:#0000BB; text-decoration:none; text-align:center; box-sizing:border-box;">
                <?php echo htmlspecialchars(ucwords((string)$c)); ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <div style="margin-top:<?php echo $result === null ? '50px' : '20px'; ?>;">
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