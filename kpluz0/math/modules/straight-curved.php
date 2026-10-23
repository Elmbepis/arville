<?php
// math/modules/straight-curved.php
// Computed image-choice. Bypasses QEngine; uses render_image_choices.
// Grade × level matrix (Hard = legacy Hard per non-arithmetic calibration):
//   grd=1:  Easy = straight vs curved lines;  Hard = straight-sided vs curved shapes
//   grd>1:  Easy = straight lines by orientation (vertical/horizontal/slanting)
//                  vs curved;  Hard = flat-surface vs curved-surface objects

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

$moduleTitle = 'Straight and Curved Lines';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd    = (int)($_SESSION['grade'] ?? 0);
$grdKey = min(6, max(1, $grd));  // clamp 0&#8594;1

// ============================================================
// CONFIG MATRIX
// ============================================================
$vertical   = ['1','2','3','4','5','6','7','8'];
$horizontal = ['31','32','33','34','35','36','37','38'];
$slanting   = ['61','62','63','64','65','66','67','68'];

$configs = [
    1 => [
        'Easy' => [
            'mode'         => 'basic',
            'figs'         => array_merge($vertical, $horizontal, $slanting),
            'nfigs'        => ['101','102','103','104','105','106','107','108','109','110','111','112'],
            'qStraight'    => 'straight line',
            'qCurved'      => 'curved line',
            'threshold'    => 11,
        ],
        'Hard' => [
            'mode'         => 'shapes',
            'figs'         => ['201','202','203','204','205','206','207','208','209','210','211','212'],
            'nfigs'        => ['241','242','243','244','245','246','247','248','249','250','251','252'],
            'qStraight'    => 'shape with straight sides only',
            'qCurved'      => 'shape with curved sides',
            'threshold'    => 11,
        ],
    ],
    'default' => [
        'Easy' => [
            'mode'         => 'orientation',
            'orientations' => [1 => $vertical, 2 => $horizontal, 3 => $slanting],
            'figs'         => array_merge($vertical, $horizontal, $slanting),
            'nfigs'        => ['101','102','103','104','105','106','107','108','109','110','111','112'],
            'qKind'        => [1 => 'vertical', 2 => 'horizontal', 3 => 'slanting'],
            'threshold'    => 15,
        ],
        'Hard' => [
            'mode'         => 'objects',
            'figs'         => ['301','302','303','304','305','306','307','308'],
            'nfigs'        => ['341','342','343','344','345','346','347','348'],
            'qStraight'    => 'object with flat surfaces only',
            'qCurved'      => 'object with a curved surface',
            'threshold'    => 11,
        ],
    ],
];

$cfg = ($grdKey === 1)
    ? $configs[1][$lvl]
    : $configs['default'][$lvl];

// ============================================================
// HANDLE ANSWER (GET ansclick)
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur   = $_SESSION[$sessionKey]['current'];
    $click = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($click, $cur['ans'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $click,
        'ans'     => $cur['ans'],
        'desc'    => $cur['desc'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if (!isset($_SESSION[$sessionKey]['used'])) $_SESSION[$sessionKey]['used'] = [];
    $used  = $_SESSION[$sessionKey]['used'];
    $limit = 100;

    $safety = 0;
    do {
        $ch    = [];
        $qopt  = rand(1, 20);
        $mode  = $cfg['mode'];

        if ($mode === 'orientation') {
            $knum = rand(1, 3);
            if ($qopt < $cfg['threshold']) {
                $ans        = $cfg['orientations'][$knum][array_rand($cfg['orientations'][$knum])];
                $answerDesc = $cfg['qKind'][$knum] . ' straight line';
                $question   = 'Click on the ' . $answerDesc . '.';
                $other1 = ($knum % 3) + 1;
                $other2 = (($knum + 1) % 3) + 1;
                $ch[]   = $cfg['orientations'][$other1][array_rand($cfg['orientations'][$other1])];
                $ch[]   = $cfg['orientations'][$other2][array_rand($cfg['orientations'][$other2])];
                $ch[]   = $cfg['nfigs'][array_rand($cfg['nfigs'])];
            } else {
                $ans        = $cfg['nfigs'][array_rand($cfg['nfigs'])];
                $answerDesc = 'curved line';
                $question   = 'Click on the ' . $answerDesc . '.';
                $ch[] = $cfg['orientations'][1][array_rand($cfg['orientations'][1])];
                $ch[] = $cfg['orientations'][2][array_rand($cfg['orientations'][2])];
                $ch[] = $cfg['orientations'][3][array_rand($cfg['orientations'][3])];
            }
        } else {
            if ($qopt < $cfg['threshold']) {
                $ans        = $cfg['figs'][array_rand($cfg['figs'])];
                $answerDesc = $cfg['qStraight'];
                $question   = 'Click on the ' . $answerDesc . '.';
                $pool       = $cfg['nfigs'];
            } else {
                $ans        = $cfg['nfigs'][array_rand($cfg['nfigs'])];
                $answerDesc = $cfg['qCurved'];
                $question   = 'Click on the ' . $answerDesc . '.';
                $pool       = $cfg['figs'];
            }
            $tries = 0;
            while (count($ch) < 3 && $tries < 50) {
                $c = $pool[array_rand($pool)];
                if (!in_array($c, $ch, true)) $ch[] = $c;
                $tries++;
            }
        }

        $allChoices = array_merge([$ans], $ch);
        shuffle($allChoices);

        $safety++;
    } while (in_array($ans, $used, true) && $safety < 50);

    $used[] = $ans;
    if (count($used) > $limit) $used = array_slice($used, -$limit);
    $_SESSION[$sessionKey]['used'] = $used;

    $_SESSION[$sessionKey]['current'] = [
        'ans'      => $ans,
        'choices'  => $allChoices,
        'question' => $question,
        'desc'     => $answerDesc,
        'lvl'      => $lvl,
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

$imgPath = function ($code) use ($base) {
    return $base . '/math/images/geom-elem/straight-curved/' . $code . '.jpg';
};
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <br>
    <p style="font-size:14pt; color:#666;">
        You clicked on this image:
    </p>
    <div style="margin:10px 0;">
        <img src="<?php echo $imgPath($result['clicked']); ?>"
             style="border:1px solid #333333; max-width:200px;">
    </div>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <?php if ($result['correct']): ?>
        <p style="font-size:14pt; color:#800080; margin:15px 0;">
            That is the <?php echo htmlspecialchars($result['desc']); ?>.
        </p>
    <?php else: ?>
        <p style="font-size:14pt; color:#800080; margin:15px 0;">
            The correct image — the <?php echo htmlspecialchars($result['desc']); ?> — is:
        </p>
        <div style="margin:10px 0;">
            <img src="<?php echo $imgPath($result['ans']); ?>"
                 style="border:1px solid #333333; max-width:200px;">
        </div>
    <?php endif; ?>
<?php else: ?>
    <br>
    <p style="font-size:17pt; font-weight:600; color:#800080; margin:20px 0 25px;">
        <?php echo htmlspecialchars($q_curr['question']); ?>
    </p>
    <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:20px; max-width:420px; margin:0 auto 20px; justify-items:center;">
        <?php foreach ($q_curr['choices'] as $code): ?>
            <a href="?ansclick=<?php echo urlencode($code); ?>" style="text-decoration:none;">
                <img src="<?php echo $imgPath($code); ?>"
                     style="display:block; border:1px solid #333333;">
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
                elect difficulty level for next question:
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