<?php
// math/modules/venn.php
// MULTIPLE CHOICE (4 choices). Venn diagrams — identify the missing element.
// Uses ?ansclick=X + 2x2 grid (matches shape-area/perimeter/volume layout).
//
// Distractor logic: choices are actual elements from the Venn diagram itself —
// preferred from inside the circles (setA &#8746; setB &#8746; setC), falling back to
// outside elements (setX) only if not enough in-circle candidates.
//
// FIX: feedback now shows set declarations + specific region description
//      ("The missing element in the intersection of sets A and B is 5")
//      so students can review their reasoning against the shown sets.
//
// Levels: Easy = legacy Easy, Hard = legacy Medium (§E).
// Theme: paper74-* is 110/582/108 — does not fit §C &#8594; paper-69-*.
// DB row required: modules.url = 'venn.php'

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

$moduleTitle = 'Venn Diagrams';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(7, max(3, (int)($_SESSION['grade'] ?? 3)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// Distractor builder: prefer in-circle elements, fall back to outside.
function make_venn_distractors($correct, $inCircles, $outside, $n = 3) {
    $seen = [(int)$correct => true];
    $out  = [];

    $pool = array_values(array_unique($inCircles));
    shuffle($pool);
    foreach ($pool as $c) {
        if (isset($seen[(int)$c])) continue;
        $seen[(int)$c] = true;
        $out[] = (string)(int)$c;
        if (count($out) >= $n) break;
    }

    if (count($out) < $n) {
        $pool = array_values(array_unique($outside));
        shuffle($pool);
        foreach ($pool as $c) {
            if (isset($seen[(int)$c])) continue;
            $seen[(int)$c] = true;
            $out[] = (string)(int)$c;
            if (count($out) >= $n) break;
        }
    }

    return $out;
}

// ============================================================
// HANDLE ANSWER CLICK  (GET ?ansclick=X)
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['ans_str'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $clicked,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // ---- Venn data bank (preserved from legacy) ----
    $venn = [];

    $venn['2a01'] = ['A'=>[1,2,3,4],   'B'=>[3,4,5,6],       'X'=>[7,8,9]];
    $venn['2a02'] = ['A'=>[4,5,6],     'B'=>[1,2,3,6],       'X'=>[7,8,9]];
    $venn['2a03'] = ['A'=>[1,2,4,6],   'B'=>[1,3,5],         'X'=>[7,8,9]];
    $venn['2a04'] = ['A'=>[2,5,6,7],   'B'=>[1,2,8],         'X'=>[3,4,9]];
    $venn['2a05'] = ['A'=>[2,3,4,9],   'B'=>[1,3,4,7],       'X'=>[5,6,8]];
    $venn['2a06'] = ['A'=>[1,5,6,8],   'B'=>[2,3,5],         'X'=>[4,7,9]];
    $venn['2a07'] = ['A'=>[1,2,3,5],   'B'=>[2,5,6,8],       'X'=>[4,7,9]];
    $venn['2a08'] = ['A'=>[3,5,6,9],   'B'=>[1,2,6],         'X'=>[4,7,8]];

    $venn['2b01'] = ['A'=>[1,3,5,6,8,9],      'B'=>[2,4,7,8,9],            'X'=>[10,11,12]];
    $venn['2b02'] = ['A'=>[2,3,4,5,8],        'B'=>[1,4,5,6,7,9],          'X'=>[10,11,12]];
    $venn['2b03'] = ['A'=>[1,3,6,7,8,9],      'B'=>[1,2,4,5,6],            'X'=>[10,11,12]];
    $venn['2b04'] = ['A'=>[1,3,6,7,9,11],     'B'=>[3,5,7,8,10],           'X'=>[2,4,12]];
    $venn['2b05'] = ['A'=>[1,2,4,5,6,12],     'B'=>[5,6,8,9,11],           'X'=>[3,7,10]];
    $venn['2b06'] = ['A'=>[2,3,4,5,8,10],     'B'=>[2,5,6,7,11],           'X'=>[1,9,12]];
    $venn['2b07'] = ['A'=>[2,3,4,5,10],       'B'=>[4,5,6,7,8,9],          'X'=>[1,11,12]];
    $venn['2b08'] = ['A'=>[1,2,6,8,10],       'B'=>[1,3,5,7,8,9],          'X'=>[4,11,12]];
    $venn['2b09'] = ['A'=>[1,2,6,7,8,9],      'B'=>[1,2,3,4,5],            'X'=>[10,11,12]];

    $venn['2c01'] = ['A'=>[1,3,4,5,6,7,11,18],     'B'=>[4,9,10,11,12,20],      'X'=>[8,13,14,15,16,17,19]];
    $venn['2c02'] = ['A'=>[2,3,4,7,8,11,12,21],    'B'=>[2,5,6,7,10,11,19],     'X'=>[9,13,14,15,16,17,18,20]];
    $venn['2c03'] = ['A'=>[1,5,6,7,8,10,12,20],    'B'=>[3,4,6,8,9,12,21],      'X'=>[11,13,14,15,16,17,18,19]];
    $venn['2c04'] = ['A'=>[3,4,6,9,10,11,12],      'B'=>[4,5,7,8,10,11,19,21],  'X'=>[13,14,15,16,17,18,20]];
    $venn['2c05'] = ['A'=>[4,5,7,8,9,11,12,20],    'B'=>[3,5,6,7,9,10,12,19],   'X'=>[13,14,15,16,17,18]];
    $venn['2c06'] = ['A'=>[2,3,6,7,8,9,10,21],     'B'=>[1,2,4,5,9,10,12,13],   'X'=>[11,14,15,16,17,18,19,20]];
    $venn['2c07'] = ['A'=>[3,4,8,10,12,17,19,21],  'B'=>[1,4,5,6,8,13,14,20,21],'X'=>[7,9,11,15,16,18]];
    $venn['2c08'] = ['A'=>[5,6,7,10,11,14,17,18,20],'B'=>[1,3,9,10,12,13,14,17],'X'=>[8,15,16,19,21]];

    $venn['2d01'] = ['A'=>[1,5,6,8,11,14,19,20,22,23],     'B'=>[2,8,9,10,12,15,17,18,19,20,21],  'X'=>[3,4,7,13,16,24]];
    $venn['2d02'] = ['A'=>[5,8,10,11,12,14,16,18,19,20,23],'B'=>[3,4,7,10,12,13,15,18,21,22,23],  'X'=>[1,2,6,9,17,24]];
    $venn['2d03'] = ['A'=>[4,7,11,12,13,14,16,17,19,22,23],'B'=>[1,4,5,6,7,8,14,16,18,20,21,22],  'X'=>[2,3,9,10,15,24]];
    $venn['2d04'] = ['A'=>[1,2,4,6,8,9,11,13,19,20,22],    'B'=>[3,5,7,9,10,12,13,19,20,21,23],   'X'=>[14,15,16,17,18,24]];
    $venn['2d05'] = ['A'=>[7,9,10,12,14,16,17,18,20,21,23],'B'=>[6,8,9,11,12,13,15,17,19,20,22],  'X'=>[1,2,3,4,5,24]];
    $venn['2d06'] = ['A'=>[1,5,11,12,16,17,18,19,20,21,22],'B'=>[1,3,5,7,9,12,13,14,15,21,23],    'X'=>[2,4,6,8,10,24]];
    $venn['2d07'] = ['A'=>[1,2,3,10,13,14,17,19,20,22,24], 'B'=>[2,4,6,8,14,15,16,18,19,20,23],   'X'=>[5,7,9,11,12,21]];
    $venn['2d08'] = ['A'=>[4,5,6,8,12,15,17,19,21,22,23],  'B'=>[3,4,7,9,10,11,13,15,17,20,23],   'X'=>[1,2,14,16,18,24]];
    $venn['2d09'] = ['A'=>[1,5,6,8,11,13,16,18,19,21,24],  'B'=>[2,3,6,8,9,10,15,16,17,18,20],    'X'=>[4,7,12,14,22,23]];
    $venn['2d10'] = ['A'=>[2,6,7,8,11,12,13,16,18,20,23],  'B'=>[1,2,3,4,10,12,13,15,17,18,22],   'X'=>[5,9,14,19,21,24]];
    $venn['2d11'] = ['A'=>[1,3,5,6,9,10,13,15,16,17,19],   'B'=>[4,5,6,7,8,12,15,16,18,20,21],    'X'=>[2,11,14,22,23,24]];

    $venn['3a01'] = ['A'=>[4,10,12,13,16,19,24,26],   'B'=>[4,5,8,12,21,22,23,24],   'C'=>[4,9,10,12,20,23,25,26],   'X'=>[1,2,3,6,7,11,14,15,17,18,27]];
    $venn['3a02'] = ['A'=>[1,2,4,6,7,12,15,21,24],    'B'=>[4,7,11,12,15,20,22,23],  'C'=>[4,6,10,11,12,19,21,26],   'X'=>[3,5,8,9,13,14,16,17,18,25,27]];
    $venn['3a03'] = ['A'=>[2,5,8,9,11,20,21,22,26],   'B'=>[2,3,5,10,11,19,22,27],   'C'=>[1,2,5,10,20,22,23,24,26], 'X'=>[4,6,7,12,13,14,15,16,17,18,25]];
    $venn['3a04'] = ['A'=>[6,7,8,12,13,19,20,23,25],  'B'=>[8,10,11,13,16,20,22,23,27],'C'=>[6,9,10,13,14,19,21,23], 'X'=>[1,2,3,4,5,15,17,18,24,26]];
    $venn['3a05'] = ['A'=>[1,2,4,8,11,12,16,23,24,27],'B'=>[2,4,5,10,11,13,16,17,21,27],'C'=>[1,2,10,15,16,19,24,26,27],'X'=>[3,6,7,9,14,18,20,22,25]];
    $venn['3a06'] = ['A'=>[1,7,8,9,17,21,22,23,25,26],'B'=>[1,9,11,12,13,17,20,21,24,26],'C'=>[4,6,7,9,10,12,15,17,21,25],'X'=>[2,3,5,14,16,18,19,27,28]];
    $venn['3a07'] = ['A'=>[2,3,8,13,17,20,21,23,24,26],'B'=>[2,5,12,18,20,21,22,23,25,26],'C'=>[1,2,7,10,12,13,15,20,24,26],'X'=>[4,6,9,11,14,16,19,27,28]];
    $venn['3a08'] = ['A'=>[2,3,4,9,10,18,22,23,26],   'B'=>[7,9,10,14,16,18,21,25,26],'C'=>[1,3,9,10,11,20,21,22,24,26],'X'=>[5,6,8,12,13,15,17,19,27]];

    if ($grd < 4) {
        if ($lvl == 'Easy') { $setPrefix='2a'; $imgnum=rand(1,8);  $form=rand(1,3); }
        else                { $setPrefix='2b'; $imgnum=rand(1,9);  $form=rand(1,3); }
    } elseif ($grd == 4) {
        if ($lvl == 'Easy') { $setPrefix='2b'; $imgnum=rand(1,9);  $form=rand(1,3); }
        else                { $setPrefix='2c'; $imgnum=rand(1,8);  $form=rand(1,3); }
    } elseif ($grd == 5 || $grd == 6) {
        if ($lvl == 'Easy') { $setPrefix='2c'; $imgnum=rand(1,8);  $form=rand(1,3); }
        else                { $setPrefix='2d'; $imgnum=rand(1,11); $form=rand(1,3); }
    } else {
        if ($lvl == 'Easy') { $setPrefix='2d'; $imgnum=rand(1,11); $form=rand(1,3); }
        else                { $setPrefix='3a'; $imgnum=rand(1,8);  $form=rand(4,10); }
    }

    $set = $setPrefix . str_pad($imgnum, 2, '0', STR_PAD_LEFT);
    $imgvenn = $base . '/math/images/sets/venn/' . $set . '.jpg';

    $setX = $venn[$set]['X'];

    if ($form < 4) {
        $eA = $setX[array_rand($setX)];
        $s = 0;
        do { $eB = $setX[array_rand($setX)]; $s++; } while ($eB === $eA && $s < 20);
        $s = 0;
        do { $eAB = $setX[array_rand($setX)]; $s++; } while (($eAB === $eA || $eAB === $eB) && $s < 20);

        $setA = $venn[$set]['A']; $setA[] = $eA; $setA[] = $eAB; shuffle($setA);
        $setB = $venn[$set]['B']; $setB[] = $eB; $setB[] = $eAB; shuffle($setB);
    } else {
        $picked = [];
        for ($k = 0; $k < 5; $k++) {
            $s = 0;
            do { $cand = $setX[array_rand($setX)]; $s++; }
            while (in_array($cand, $picked, true) && $s < 20);
            $picked[] = $cand;
        }
        $eA = $picked[0]; $eB = $picked[1]; $eC = $picked[2]; $eABC = $picked[3]; $eZ = $picked[4];

        $setA = $venn[$set]['A']; $setA[] = $eA; $setA[] = $eABC;
        $setB = $venn[$set]['B']; $setB[] = $eB; $setB[] = $eABC;
        $setC = $venn[$set]['C']; $setC[] = $eC; $setC[] = $eABC;

        if ($form == 5) { $eAB = $eZ; $setA[] = $eAB; $setB[] = $eAB; }
        if ($form == 6) { $eAC = $eZ; $setA[] = $eAC; $setC[] = $eAC; }
        if ($form == 7) { $eBC = $eZ; $setB[] = $eBC; $setC[] = $eBC; }

        shuffle($setA); shuffle($setB); shuffle($setC);
    }

    // ---- Build set declarations (used on both play and feedback) ----
    $qParts = [];
    $qParts[] = "Set A = [ " . implode(' ', $setA) . " ]";
    $qParts[] = "Set B = [ " . implode(' ', $setB) . " ]";
    if ($form >= 4) $qParts[] = "Set C = [ " . implode(' ', $setC) . " ]";
    $setList = implode(', ', $qParts);

    // ---- Build question prompt and answer-region description ----
    if ($form == 1) {
        $prompt  = "What is missing in the intersection of sets A and B in the Venn diagram above?";
        $ansDesc = "in the intersection of sets A and B";
        $ans = $eAB;
    } elseif ($form == 2) {
        $prompt  = "What is missing in set A in the Venn diagram above that's not an element of set B?";
        $ansDesc = "in set A that is not in set B";
        $ans = $eA;
    } elseif ($form == 3) {
        $prompt  = "What is missing in set B in the Venn diagram above that's not an element of set A?";
        $ansDesc = "in set B that is not in set A";
        $ans = $eB;
    } elseif ($form == 4) {
        $prompt  = "What is missing in the intersection of sets A, B, and C in the Venn diagram above?";
        $ansDesc = "in the intersection of sets A, B, and C";
        $ans = $eABC;
    } elseif ($form == 5) {
        $prompt  = "What is missing in the intersection of sets A and B in the Venn diagram above that's not in set C?";
        $ansDesc = "in the intersection of sets A and B that is not in set C";
        $ans = $eAB;
    } elseif ($form == 6) {
        $prompt  = "What is missing in the intersection of sets A and C in the Venn diagram above that's not in set B?";
        $ansDesc = "in the intersection of sets A and C that is not in set B";
        $ans = $eAC;
    } elseif ($form == 7) {
        $prompt  = "What is missing in the intersection of sets B and C in the Venn diagram above that's not in set A?";
        $ansDesc = "in the intersection of sets B and C that is not in set A";
        $ans = $eBC;
    } elseif ($form == 8) {
        $prompt  = "What is missing in set A in the Venn diagram above that's not an element of sets B and C?";
        $ansDesc = "in set A that is not in sets B and C";
        $ans = $eA;
    } elseif ($form == 9) {
        $prompt  = "What is missing in set B in the Venn diagram above that's not an element of sets A and C?";
        $ansDesc = "in set B that is not in sets A and C";
        $ans = $eB;
    } else {  // form 10
        $prompt  = "What is missing in set C in the Venn diagram above that's not an element of sets A and B?";
        $ansDesc = "in set C that is not in sets A and B";
        $ans = $eC;
    }

    $question = "$setList. $prompt";
    $ansStr   = (string)(int)$ans;

    $inCircles = array_merge($setA, $setB, isset($setC) ? $setC : []);
    $inCircles = array_values(array_diff(array_unique($inCircles), [$ans]));
    $outside   = array_values(array_diff(array_unique($setX), [(int)$ans]));

    $distractors = make_venn_distractors($ans, $inCircles, $outside, 3);

    $choices = array_merge([$ansStr], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'image'    => $imgvenn,
        'question' => $question,
        'setList'  => $setList,
        'prompt'   => $prompt,
        'ansDesc'  => $ansDesc,
        'ans'      => (int)$ans,
        'ans_str'  => $ansStr,
        'choices'  => $choices,
        'lvl'      => $lvl,
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
    'score_top'     => $base . '/math/images/score-top-1b.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1b.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <!-- Set declarations for review -->
    <div style="font-size:13pt; color:#333; background:#f8f8f8; border:1px solid #ddd; border-radius:6px; padding:12px 18px; margin:18px auto; max-width:520px; text-align:center; line-height:1.6;">
        <?php echo htmlspecialchars($result['cur']['setList']); ?>
    </div>

    <p style="margin-top:15px;">
        <img src="<?php echo htmlspecialchars($result['cur']['image']); ?>" style="border:1px solid #ccc; border-radius:6px; max-width:420px;">
    </p>

    <p style="font-size:14pt; color:#800080; margin-top:15px;">
        The missing element
        <strong style="color:#800080;"><?php echo htmlspecialchars($result['cur']['ansDesc']); ?></strong>
        is
        <strong style="color:#CC0066; font-size:16pt;"><?php echo $result['cur']['ans']; ?></strong>.
    </p>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="margin-top:20px;">
        <img src="<?php echo htmlspecialchars($q['image']); ?>" style="border:1px solid #ccc; border-radius:6px; max-width:420px;">
    </p>

    <p style="font-size:14pt; font-weight:700; color:#800080; margin-top:20px;">
        The Venn diagram above has missing elements.<br>
        <?php echo $q['question']; ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444444;">
        <br/>Click on your answer.<br/>
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:320px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">Select difficulty level for next question:</font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>>
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