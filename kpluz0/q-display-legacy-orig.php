<?php
// q-display-legacy.php — displays modules in the OLD question-set format
// Auth: KPLUZ_SESSION
// Theme: shared banner/side/score images; per-subject question-box colors
// Language: English for English/Math/Science/TLE; Filipino for all others
// URL: q-display-legacy.php?m=AP/modules/tiwala-sarili1

session_name('KPLUZ_SESSION');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: $base/login.php");
    exit();
}

// ============================================================
// RESOLVE GRADE — robust fallbacks
//   1. $_SESSION['grade']       (canonical, set by login.php)
//   2. $_SESSION['user_grade']  (legacy key, still respected)
//   3. DB users.grade by user_id (final fallback)
//   4. default 1
// The DB lookup requires the connection below, so $grd stays null
// until resolved; modules that read $grd get the final value.
// ============================================================
$grd = null;
if (isset($_SESSION['grade']) && is_numeric($_SESSION['grade'])) {
    $grd = (int)$_SESSION['grade'];
} elseif (isset($_SESSION['user_grade']) && is_numeric($_SESSION['user_grade'])) {
    $grd = (int)$_SESSION['user_grade'];
}

require_once __DIR__ . '/scorer.php';
require_once __DIR__ . '/q-engine.php';

// ============================================================
// THEME — shared image filenames + per-subject question colors
// ============================================================
function theme_for_subject($subject) {
    $theme = [
        'top'       => 'shs-top.jpg',
        'title'     => 'shs-title.jpg',
        'left'      => 'shs-left.jpg',
        'right'     => 'shs-right.jpg',
        'spacer'    => 'shs-spacer.jpg',
        'bottom'    => 'shs-bottom.jpg',
        'score_top' => 'score-top-wbg.jpg',
        'score_bot' => 'score-bottom-wbg.jpg',
    ];

    $colors = [
        'gmrc'               => ['bg' => '#fdeeef', 'border' => '#fba0a5'],
        'araling-panlipunan' => ['bg' => '#fdeeef', 'border' => '#fba0a5'],
        'ap'                 => ['bg' => '#fdeeef', 'border' => '#fba0a5'],
        'science'            => ['bg' => '#ebfdea', 'border' => '#91faca'],
        'filipino'           => ['bg' => '#FDF0D6', 'border' => '#FBBB91'],
        'mapeh'              => ['bg' => '#f8eefd', 'border' => '#eac5fd'],
        'tle'                => ['bg' => '#e8fefe', 'border' => '#90f1e2'],
        'english'            => ['bg' => '#FFFFF0', 'border' => '#FEDB9A'],
        'math'               => ['bg' => '#EBF4FD', 'border' => '#A8D3FE'],
    ];

    $c = $colors[$subject] ?? ['bg' => '#fdeeef', 'border' => '#fba0a5'];
    $theme['question_bg']     = $c['bg'];
    $theme['question_border'] = $c['border'];
    return $theme;
}

// ============================================================
// RESOLVE MODULE
// ============================================================
$moduleKey = $_GET['m'] ?? '';
if (!preg_match('#^[a-z0-9_\-/]+$#i', $moduleKey)) die("Invalid module.");

$modulePath = __DIR__ . '/' . $moduleKey;
if (!file_exists($modulePath) && file_exists($modulePath . '.php')) {
    $modulePath .= '.php';
}
if (!file_exists($modulePath)) {
    die("Module not found: " . htmlspecialchars($moduleKey));
}

$parts         = explode('/', $moduleKey);
$subjectFolder = $parts[0];
$subject       = strtolower($subjectFolder);

// ============================================================
// LANGUAGE — subject-driven UI strings
// English subjects: english, math, science, tle
// All other subjects (ap, filipino, gmrc, mapeh, …): Filipino
// ============================================================
$englishSubjects = ['english', 'math', 'science', 'tle'];
$uiLang = in_array($subject, $englishSubjects, true) ? 'en' : 'fil';

$uiStrings = [
    'en' => [
        'your_answer'     => 'Your answer is',
        'correct'         => 'That is correct!',
        'incorrect'       => 'That is incorrect.',
        'question_label'  => 'Question:',
        'answer_label'    => 'Answer:',
        'click_to_answer' => 'Click on your answer below.',
        'new_question'    => 'New Question',
    ],
    'fil' => [
        'your_answer'     => 'Ang sagot mo ay',
        'correct'         => 'Ito ay tumpak!',
        'incorrect'       => 'Ito ay hindi tumpak.',
        'question_label'  => 'Tanong:',
        'answer_label'    => 'Sagot:',
        'click_to_answer' => 'Pindutin ang iyong sagot sa ibaba.',
        'new_question'    => 'Bagong Tanong',
    ],
];
$t = $uiStrings[$uiLang];

$_SESSION['last_subject'] = $subject;

$theme         = theme_for_subject($subject);
$subjectImages = $base . '/' . $subjectFolder . '/images';

// ============================================================
// DB CONNECTION — opened BEFORE require $modulePath
// so that we can resolve $grd from the DB if needed,
// and so the module always sees the correct $grd.
// ============================================================
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($grd === null && !empty($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT grade FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $r = $stmt->get_result()->fetch_assoc();
    if ($r && is_numeric($r['grade'])) {
        $grd = (int)$r['grade'];
        $_SESSION['grade'] = $grd; // cache for subsequent requests
    }
    $stmt->close();
}
if ($grd === null) {
    $grd = 1;
}

// ============================================================
// LOAD LEGACY QUESTION SET (buffered, output discarded)
// ============================================================
ob_start();
$questions = [];
unset($_SESSION['title'], $_SESSION['tnum']);
require $modulePath;   // module reads $grd from this scope
ob_end_clean();

header_remove();
header('Content-Type: text/html; charset=UTF-8');

$moduleTitle = $_SESSION['title'] ?? basename($modulePath, '.php');
if (!is_array($questions) || empty($questions)) {
    die("Module did not define a valid \$questions array.");
}

// ============================================================
// BUILD TEMPLATE + RUN ENGINE
// ============================================================
$template = [
    'title'             => $moduleTitle,
    'subject'           => $subject,
    'module_identifier' => basename($modulePath),
    'type'              => 'static',
    'levels'            => ['Easy'],
    'image_base'        => $base . '/' . $subjectFolder . '/modules/qimages/',
    'questions'         => $questions,
];

$engine = new QEngine($template, $template['module_identifier']);
$engine->setLevel('Easy');

$sessionKey = 'mod_' . md5($template['module_identifier']);

$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $q = $_SESSION[$sessionKey]['current'];
    $selected = $_GET['ansclick'];

    $scorer  = new Scorer($conn, $template['module_identifier']);
    $correct = $scorer->processAnswer($selected, $q['answer'], 'Easy');

    $result = [
        'correct'  => $correct,
        'selected' => $selected,
        'answer'   => $q['answer'],
        'image'    => $q['image'],
        'prompt'   => $q['prompt'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null || isset($_POST['Submit2'])) {
    $q = $engine->generate($sessionKey);
    if ($q === null) {
        die("Could not generate question from this module.");
    }
    $_SESSION[$sessionKey]['current'] = $q;
}

$moduleParam = htmlspecialchars($moduleKey);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($moduleTitle); ?> - KPluz.com</title>
<script>
function FP_swapImg(){var doc=document,args=arguments,elm,n;doc.$imgSwaps=new Array();for(n=2;n<args.length;n+=2){elm=FP_getObjectByID(args[n]);if(elm){doc.$imgSwaps[doc.$imgSwaps.length]=elm;elm.$src=elm.src;elm.src=args[n+1];}}}
function FP_preloadImgs(){var d=document,a=arguments;if(!d.FP_imgs)d.FP_imgs=new Array();for(var i=0;i<a.length;i++){d.FP_imgs[i]=new Image();d.FP_imgs[i].src=a[i];}}
function FP_getObjectByID(id,o){var c,el,els,f,m,n;if(!o)o=document;if(o.getElementById)el=o.getElementById(id);else if(o.layers)c=o.layers;else if(o.all)el=o.all[id];if(el)return el;if(o.id==id||o.name==id)return o;if(o.childNodes)c=o.childNodes;if(c)for(n=0;n<c.length;n++){el=FP_getObjectByID(id,c[n]);if(el)return el;}f=o.forms;if(f)for(n=0;n<f.length;n++){els=f[n].elements;for(m=0;m<els.length;m++){el=FP_getObjectByID(id,els[n]);if(el)return el;}}return null;}
window.onload=function(){FP_preloadImgs(
    '<?php echo $base; ?>/images/header1c.jpg','<?php echo $base; ?>/images/header1b.jpg',
    '<?php echo $base; ?>/images/header2c.jpg','<?php echo $base; ?>/images/header2b.jpg',
    '<?php echo $base; ?>/images/header3c.jpg','<?php echo $base; ?>/images/header3b.jpg',
    '<?php echo $base; ?>/images/header4c.jpg','<?php echo $base; ?>/images/header4b.jpg',
    '<?php echo $base; ?>/images/header5c.jpg','<?php echo $base; ?>/images/header5b.jpg',
    '<?php echo $base; ?>/images/header6c.jpg','<?php echo $base; ?>/images/header6b.jpg'
);};
</script>
</head>

<body style="background: url('<?php echo $base; ?>/images/bluetop-bg.jpg') repeat-x top left; padding-top:15px;">
<div align="center">

<table width="900"><tr><td height="100">
    <div align="center">
        <table border="0" width="900" cellspacing="0" cellpadding="0">
            <tr>
                <td width="193" height="100" valign="top">
                    <a href="<?php echo $base; ?>/home-subj.php">
                    <img border="0" src="<?php echo $base; ?>/images/header-logo.jpg"></a></td>
                <td width="133" valign="top"><a href="<?php echo $base; ?>/how-to-use-kpluz.php">
                    <img border="0" id="img1" src="<?php echo $base; ?>/images/header1a.jpg"
                    onmouseover="FP_swapImg(1,0,'img1','<?php echo $base; ?>/images/header1b.jpg')"
                    onmouseout="FP_swapImg(0,0,'img1','<?php echo $base; ?>/images/header1a.jpg')"
                    onmousedown="FP_swapImg(1,0,'img1','<?php echo $base; ?>/images/header1c.jpg')"
                    onmouseup="FP_swapImg(0,0,'img1','<?php echo $base; ?>/images/header1b.jpg')"></a></td>
                <td width="133" valign="top"><a href="<?php echo $base; ?>/bluebars_student.php">
                    <img border="0" id="img2" src="<?php echo $base; ?>/images/header2a.jpg"
                    onmouseover="FP_swapImg(1,0,'img2','<?php echo $base; ?>/images/header2b.jpg')"
                    onmouseout="FP_swapImg(0,0,'img2','<?php echo $base; ?>/images/header2a.jpg')"
                    onmousedown="FP_swapImg(1,0,'img2','<?php echo $base; ?>/images/header2c.jpg')"
                    onmouseup="FP_swapImg(0,0,'img2','<?php echo $base; ?>/images/header2b.jpg')"></a></td>
                <td width="133" valign="top"><a href="<?php echo $base; ?>/programs.php">
                    <img border="0" id="img3" src="<?php echo $base; ?>/images/header3a.jpg"
                    onmouseover="FP_swapImg(1,0,'img3','<?php echo $base; ?>/images/header3b.jpg')"
                    onmouseout="FP_swapImg(0,0,'img3','<?php echo $base; ?>/images/header3a.jpg')"
                    onmousedown="FP_swapImg(1,0,'img3','<?php echo $base; ?>/images/header3c.jpg')"
                    onmouseup="FP_swapImg(0,0,'img3','<?php echo $base; ?>/images/header3b.jpg')"></a></td>
                <td width="134" valign="top"><a href="<?php echo $base; ?>/community.php">
                    <img border="0" id="img4" src="<?php echo $base; ?>/images/header4a.jpg"
                    onmouseover="FP_swapImg(1,0,'img4','<?php echo $base; ?>/images/header4b.jpg')"
                    onmouseout="FP_swapImg(0,0,'img4','<?php echo $base; ?>/images/header4a.jpg')"
                    onmousedown="FP_swapImg(1,0,'img4','<?php echo $base; ?>/images/header4c.jpg')"
                    onmouseup="FP_swapImg(0,0,'img4','<?php echo $base; ?>/images/header4b.jpg')"></a></td>
                <td width="134" valign="top"><a href="<?php echo $base; ?>/contact.php">
                    <img border="0" id="img5" src="<?php echo $base; ?>/images/header5a.jpg"
                    onmouseover="FP_swapImg(1,0,'img5','<?php echo $base; ?>/images/header5b.jpg')"
                    onmouseout="FP_swapImg(0,0,'img5','<?php echo $base; ?>/images/header5a.jpg')"
                    onmousedown="FP_swapImg(1,0,'img5','<?php echo $base; ?>/images/header5c.jpg')"
                    onmouseup="FP_swapImg(0,0,'img5','<?php echo $base; ?>/images/header5b.jpg')"></a></td>
                <td width="134" valign="top"><a href="<?php echo $base; ?>/logout.php">
                    <img border="0" id="img6" src="<?php echo $base; ?>/images/header6a.jpg"
                    onmouseover="FP_swapImg(1,0,'img6','<?php echo $base; ?>/images/header6b.jpg')"
                    onmouseout="FP_swapImg(0,0,'img6','<?php echo $base; ?>/images/header6a.jpg')"
                    onmousedown="FP_swapImg(1,0,'img6','<?php echo $base; ?>/images/header6c.jpg')"
                    onmouseup="FP_swapImg(0,0,'img6','<?php echo $base; ?>/images/header6b.jpg')"></a></td>
            </tr>
        </table>
    </div>
</td></tr></table>

</div>

<div align="center">
    <table border="0" width="800" cellspacing="0" cellpadding="0">
        <tr><td style="font-size:0; line-height:0;"><img border="0" src="<?php echo $subjectImages; ?>/<?php echo $theme['top']; ?>" style="display:block;"></td></tr>
        <tr>
            <td background="<?php echo $subjectImages; ?>/<?php echo $theme['title']; ?>" height="56" width="800" align="center">
                <p style="margin-top: -5px; margin-bottom: 0">
                    <span style="font-weight: 700">
                        <font face="Verdana" style="font-size: 15pt" color="#B9005C">
                            <?php echo nl2br(htmlspecialchars($moduleTitle)); ?>
                        </font>
                    </span>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="90" valign="top" height="34" background="<?php echo $subjectImages; ?>/<?php echo $theme['left']; ?>">&nbsp;</td>
                        <td valign="top">
                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td background="<?php echo $subjectImages; ?>/<?php echo $theme['spacer']; ?>" valign="top" width="620">
                                        <div align="center">
                                            <table border="0" width="760" cellspacing="0" cellpadding="0">
                                                <tr><td>
                                                <p align="center">&nbsp;
<?php
$qstyle = "padding-left:35px; padding-right:35px; padding-top:35px; padding-bottom:40px";

if ($result !== null):
?>
    <table border="0" width="466" cellspacing="0" cellpadding="0" align="center">
        <tr><td>&nbsp;</td></tr>
        <tr><td width="100%" align="center" style="padding-top:15px; padding-bottom:23px; padding-left:38px; padding-right:38px;">
            <font face="Arial" style="font-size:14pt; font-weight:700; color:#330033;">
                <?php echo htmlspecialchars($t['your_answer']); ?>
                <span style="color:#0000BB;">'<?php echo htmlspecialchars($result['selected']); ?>'</span>.
            </font>
            <br>
            <font face="Arial" style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
                <?php echo $result['correct'] ? htmlspecialchars($t['correct']) : htmlspecialchars($t['incorrect']); ?>
            </font>
        </td></tr>
    </table>
    <?php if (!empty($result['image'])): ?>
        <table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
            <tr><td align="center"><br><img border="1" src="<?php echo htmlspecialchars($result['image']); ?>" style="margin-bottom:35px;"></td></tr>
        </table>
    <?php endif; ?>
    <table border="0" width="466" cellspacing="0" cellpadding="0" align="center"
           style="margin:15px auto; background:<?php echo $theme['question_bg']; ?>; border:1px solid <?php echo $theme['question_border']; ?>;">
        <tr><td align="center" style="padding:20px;">
            <font face="Arial" style="font-size:16pt; font-weight:700; color:#330033;">
                <?php echo htmlspecialchars($t['question_label']); ?><br>
                <?php echo htmlspecialchars($result['prompt']); ?><br><br>
                <?php echo htmlspecialchars($t['answer_label']); ?> <span style="color:#CC0066;"><?php echo htmlspecialchars($result['answer']); ?></span>
            </font>
        </td></tr>
    </table>
<?php else: ?>
    <?php if (!empty($q['image'])): ?>
        <table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
            <tr><td align="center"><br><img border="1" src="<?php echo htmlspecialchars($q['image']); ?>" style="margin-bottom:35px;"></td></tr>
        </table>
    <?php endif; ?>
    <table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
        <tr><td align="center">
            <br>
            <table align="center" style="background:<?php echo $theme['question_bg']; ?>; border:1px solid <?php echo $theme['question_border']; ?>;">
                <tr><td style="<?php echo $qstyle; ?>" width="350" height="50" align="center">
                    <font face="Arial" style="font-size:17pt; font-weight:600; color:#800080;">
                        <?php echo htmlspecialchars($q['prompt']); ?>
                    </font>
                </td></tr>
            </table>
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td align="center">
            <font face="Arial" style="font-size:16pt; font-weight:600; color:#444444;">
                <?php echo htmlspecialchars($t['click_to_answer']); ?><br><br><br>
            </font>
<?php
    $maxlen = 0;
    foreach ($q['choices'] as $c) { $maxlen = max($maxlen, strlen($c)); }
    $wt = 300;
    if ($maxlen > 18) $wt = 350;
    if ($maxlen > 22) $wt = 395;
    if ($maxlen > 26) $wt = 440;
    if ($maxlen > 30) $wt = 485;

    $bstyle = "border-style:solid; border-width:1px; border-color:#EEEEEE; padding:20px 25px; background:#DDDDDD;";
?>
            <table align="center" cellspacing="0" cellpadding="0" style="border-collapse:separate; border-spacing:0 8px; margin:30px auto;">
                <?php foreach ($q['choices'] as $c): ?>
                    <tr>
                        <td align="center" style="<?php echo $bstyle; ?> width:<?php echo $wt; ?>px;">
                            <a href="?m=<?php echo $moduleParam; ?>&ansclick=<?php echo urlencode($c); ?>"
                               style="text-decoration:none; display:inline-block; width:100%;">
                                <font face="Arial" style="font-size:16pt; font-weight:500; color:#0000CC;"><?php echo htmlspecialchars($c); ?></font>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </td></tr>
    </table>
<?php endif; ?>
    <?php $newQMargin = ($result !== null) ? '80px' : '40px'; ?>
    <div style="text-align:center; margin:<?php echo $newQMargin; ?> 0;">
        <form method="post" action="?m=<?php echo $moduleParam; ?>" style="display:inline;">
            <input type="submit" name="Submit2" value="<?php echo htmlspecialchars($t['new_question']); ?>">
        </form>
    </div>
    <table align="center" cellspacing="0" cellpadding="0">
        <tr><td align="center" width="114" height="85" background="<?php echo $subjectImages; ?>/<?php echo $theme['score_top']; ?>"></td></tr>
        <tr><td align="center" valign="top" width="114" height="60" background="<?php echo $subjectImages; ?>/<?php echo $theme['score_bot']; ?>">
            <font face="Arial" style="font-size:22pt; font-weight:700; color:#800080;">
                <?php echo $_SESSION['score'] ?? 0; ?>
            </font>
        </td></tr>
    </table>
                                                </p>
                                                </td></tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr><td style="font-size:0; line-height:0;"><img border="0" src="<?php echo $subjectImages; ?>/<?php echo $theme['bottom']; ?>" style="display:block;"></td></tr>
                            </table>
                        </td>
                        <td width="90" valign="top" height="34" background="<?php echo $subjectImages; ?>/<?php echo $theme['right']; ?>">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0086CE">
                <p align="center" style="margin-top:5px; margin-bottom:5px">
                    <font style="font-size:10pt">
                        <font face="Arial" color="#FFFFFF">Copyright&nbsp; 2010</font>
                        <b><font face="Arial" color="#365669"><a href="<?php echo $base; ?>/home-subj.php"><font color="#FFFFFF">KPluz.com</font></a></font></b>
                        <font face="Arial" color="#FFFFFF">. All Rights Reserved.</font>
                    </font>
                </p>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();