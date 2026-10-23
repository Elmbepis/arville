<?php
// math/modules/tell-time.php
//
// EXCEPTION MODULE — does NOT use container.php.
// The clock-* image set is a contiguous frame; replicating the legacy tables
// verbatim is the only way to render it correctly. Only the scoring is modern.

session_name('KPLUZ_SESSION');
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}

require_once __DIR__ . '/../../scorer.php';
// NOTE: no container.php — custom layout below

$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$base       = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleId   = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

$grd = (int)($_SESSION['grade'] ?? 0);

// ============================================================
// HANDLE SUBMIT1 (scoring)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $userH   = (int)($_POST['hours']   ?? -1);
    $userM   = (int)($_POST['minutes'] ?? -1);
    $postans = sprintf('%02d:%02d', max(0, $userH), max(0, $userM));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($postans, $cur['answer'], 'Easy');

    if ($isCorrect) {
        $_SESSION[$sessionKey]['score'] = ($_SESSION[$sessionKey]['score'] ?? 0) + 1;
    }

    $result = [
        'correct' => $isCorrect,
        'postans' => $postans,
        'answer'  => $cur['answer'],
        'q1' => $cur['q1'], 'q2' => $cur['q2'],
        'q3' => $cur['q3'], 'q4' => $cur['q4'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE QUESTION (fresh load or Submit2)
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $page = basename(__FILE__);
    if (!isset($_SESSION['curpage']) || $_SESSION['curpage'] !== $page) {
        $_SESSION['curpage'] = $page;
        $_SESSION[$sessionKey]['score'] = 0;
    }
    $score = $_SESSION[$sessionKey]['score'] ?? 0;

    // Minute selection — legacy grade/score progression preserved
    if ($grd === 0) {
        if ($score > 7) {
            $m = 15;
        } elseif ($score > 3) {
            $m = (rand(1, 2) === 1) ? 30 : 0;
        } else {
            $m = 0;
        }
    } elseif ($grd === 1) {
        $m = ($score > 5) ? rand(0, 11) * 5 : rand(0, 3) * 15;
    } else {
        $m = rand(0, 11) * 5;
    }

    // Default blanks
    $q1 = $base . '/math/images/clock-face-q1.jpg';
    $q2 = $base . '/math/images/clock-face-q2.jpg';
    $q3 = $base . '/math/images/clock-face-q3.jpg';
    $q4 = $base . '/math/images/clock-face-q4.jpg';

    $mPad = sprintf('%02d', $m);
    $mPic = $base . '/math/images/clock/m-' . $mPad . '.jpg';

    // Minute quadrant (mq) — 1=top-right, 2=top-left, 3=bottom-left, 4=bottom-right
    if ($m === 0) {
        $mq = 12;
    } elseif ($m === 15) {
        $mq = 14;
    } elseif ($m === 30) {
        $mq = 43;
    } elseif ($m === 45) {
        $mq = 32;
    } elseif ($m > 0 && $m < 15) {
        $mq = 1;  $q1 = $mPic;
    } elseif ($m > 15 && $m < 30) {
        $mq = 4;  $q4 = $mPic;
    } elseif ($m > 30 && $m < 45) {
        $mq = 3;  $q3 = $mPic;
    } else {
        $mq = 2;  $q2 = $mPic;
    }

    // Hour quadrant selection — legacy logic (h=12 excluded from general branch)
    if ($mq === 14) {
        // m=15: composite arc in q1/q4, hour in q2 or q3
        $q1 = $base . '/math/images/clock/m-15-a.jpg';
        $q4 = $base . '/math/images/clock/m-15-b.jpg';
        $h  = [7, 8, 10, 11][rand(0, 3)];
        $hPic = $base . '/math/images/clock/h-' . sprintf('%02d', $h) . '-2.jpg';
        if ($h >= 7 && $h <= 8)  $q3 = $hPic;
        if ($h >= 10 && $h <= 11) $q2 = $hPic;
    } elseif ($mq === 43) {
        // m=30: composite arc in q3/q4, hour in q1 or q2
        $q3 = $base . '/math/images/clock/m-30-a.jpg';
        $q4 = $base . '/math/images/clock/m-30-b.jpg';
        $h1 = rand(10, 11);
        $h2 = rand(1, 2);
        $h  = (rand(1, 2) === 1) ? $h1 : $h2;
        $hPic = $base . '/math/images/clock/h-' . sprintf('%02d', $h) . '-3.jpg';
        if ($h === $h1) $q2 = $hPic;
        if ($h === $h2) $q1 = $hPic;
    } elseif ($mq === 32) {
        // m=45: composite arc in q2/q3, hour in q1 or q4
        $q2 = $base . '/math/images/clock/m-45-a.jpg';
        $q3 = $base . '/math/images/clock/m-45-b.jpg';
        $h  = [1, 2, 4, 5][rand(0, 3)];
        $hPic = $base . '/math/images/clock/h-' . sprintf('%02d', $h) . '-4.jpg';
        if ($h >= 1 && $h <= 2) $q1 = $hPic;
        if ($h >= 4 && $h <= 5) $q4 = $hPic;
    } elseif ($mq === 12) {
        // m=0: pre-built hour composites
        $h    = rand(1, 12);
        $hPad = sprintf('%02d', $h);
        if ($h === 1 || $h === 2) {
            $q1 = $base . "/math/images/clock/h-$hPad-00-a.jpg";
            $q2 = $base . "/math/images/clock/h-$hPad-00-d.jpg";
        } elseif ($h === 3 || $h === 4 || $h === 5) {
            $q1 = $base . "/math/images/clock/h-$hPad-00-a.jpg";
            $q4 = $base . "/math/images/clock/h-$hPad-00-b.jpg";
            $q2 = $base . "/math/images/clock/h-$hPad-00-d.jpg";
        } elseif ($h === 6) {
            $q1 = $base . "/math/images/clock/h-$hPad-00-a.jpg";
            $q4 = $base . "/math/images/clock/h-$hPad-00-b.jpg";
            $q3 = $base . "/math/images/clock/h-$hPad-00-c.jpg";
            $q2 = $base . "/math/images/clock/h-$hPad-00-d.jpg";
        } elseif ($h >= 7 && $h <= 11) {
            $q1 = $base . "/math/images/clock/h-$hPad-00-a.jpg";
            $q3 = $base . "/math/images/clock/h-$hPad-00-c.jpg";
            $q2 = $base . "/math/images/clock/h-$hPad-00-d.jpg";
        } else {  // h === 12
            $q1 = $base . "/math/images/clock/h-$hPad-00-a.jpg";
            $q2 = $base . "/math/images/clock/h-$hPad-00-d.jpg";
        }
    } else {
        // General overlay: mq already chosen; pick hq !== mq, h=12 excluded
        $hq    = 0;
        $tries = 0;
        while ($hq === 0 || $hq === $mq) {
            $h = rand(1, 11);  // h=12 excluded — no h-12-suf.jpg exists
            if ($h >= 1 && $h <= 2)  $hq = 1;
            if ($h >= 3 && $h <= 5)  $hq = 4;
            if ($h >= 6 && $h <= 8)  $hq = 3;
            if ($h >= 9 && $h <= 11) $hq = 2;
            $tries++;
            if ($tries > 100) { $h = 1; $hq = 1; break; }
        }

        if      ($m > 0  && $m <= 5)  $suf = '-1.jpg';
        elseif  ($m > 5  && $m <= 20) $suf = '-2.jpg';
        elseif  ($m > 20 && $m <= 40) $suf = '-3.jpg';
        else                          $suf = '-4.jpg';

        $hPic = $base . '/math/images/clock/h-' . sprintf('%02d', $h) . $suf;

        if ($hq === 1) $q1 = $hPic;
        if ($hq === 2) $q2 = $hPic;
        if ($hq === 3) $q3 = $hPic;
        if ($hq === 4) $q4 = $hPic;
    }

    $_SESSION[$sessionKey]['current'] = [
        'h' => $h, 'm' => $m,
        'q1' => $q1, 'q2' => $q2, 'q3' => $q3, 'q4' => $q4,
        'answer' => sprintf('%02d:%02d', $h, $m),
    ];
    $q_curr = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// DISPLAY STATE
// ============================================================
$answering = ($result !== null);
$display   = $answering ? $result : $q_curr;
$score     = $_SESSION[$sessionKey]['score'] ?? 0;
$topBg     = $answering ? 'clock-top-2.jpg'   : 'clock-top-1.jpg';
$ansBg     = $answering ? 'clock-answer2.jpg' : 'clock-answer.jpg';
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Telling Time - KPluz.com</title>
<script language="JavaScript">
<!--
function FP_swapImg() {
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}
function FP_getObjectByID(id,o) {
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
// -->
</script>
</head>
<body style="background: url('<?php echo $base; ?>/images/bluetop-bg.jpg') repeat-x top left;">

<!-- HEADER NAV -->
<div align="center">
<table width="900"><tr><td height="100" valign="middle">
    <div align="center">
        <table border="0" width="900" cellspacing="0" cellpadding="0">
            <tr>
                <td width="193" height="100" valign="top">
                    <a href="math-menu.php"><img border="0" src="<?php echo $base; ?>/images/header-logo.jpg"></a>
                </td>
                <?php
                $navLinks = [
                    1 => '/how-to-use-kpluz.php',
                    2 => '/bluebars_student.php',
                    3 => '/programs.php',
                    4 => '/community.php',
                    5 => '/contact.php',
                    6 => '/logout.php',
                ];
                $navW = [1=>133, 2=>133, 3=>133, 4=>134, 5=>134, 6=>134];
                foreach ($navLinks as $i => $href):
                ?>
                    <td width="<?php echo $navW[$i]; ?>" valign="top">
                        <a href="<?php echo $href; ?>">
                            <img border="0" id="img<?php echo $i; ?>"
                                 src="<?php echo $base; ?>/images/header<?php echo $i; ?>a.jpg"
                                 alt="Button Text"
                                 onmouseover="FP_swapImg(1,0,'img<?php echo $i; ?>','<?php echo $base; ?>/images/header<?php echo $i; ?>b.jpg')"
                                 onmouseout="FP_swapImg(0,0,'img<?php echo $i; ?>','<?php echo $base; ?>/images/header<?php echo $i; ?>a.jpg')"
                                 onmousedown="FP_swapImg(1,0,'img<?php echo $i; ?>','<?php echo $base; ?>/images/header<?php echo $i; ?>c.jpg')"
                                 onmouseup="FP_swapImg(0,0,'img<?php echo $i; ?>','<?php echo $base; ?>/images/header<?php echo $i; ?>b.jpg')">
                        </a>
                    </td>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>
</td></tr></table>
</div>

<!-- CLOCK FRAME -->
<div align="center">
<table border="0" width="800" cellspacing="0" cellpadding="0" id="table7">
    <tr><td>
        <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table32">
            <!-- TOP ROW: top-left | top-N | top-right -->
            <tr>
                <td>
                    <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table33">
                        <tr>
                            <td width="213">
                                <img border="0" src="<?php echo $base; ?>/math/images/clock-top-left.jpg" width="213" height="224">
                            </td>
                            <td background="<?php echo $base; ?>/math/images/<?php echo $topBg; ?>" valign="top">
                                <?php if ($answering): ?>
                                    <p align="center" style="margin: 35px 10px 0; font-family: 'Comic Sans MS', sans-serif; font-size: 13pt; font-weight: 700; color: #800080;">
                                        Your answer is <span style="color: #CC0066;"><?php echo htmlspecialchars($result['postans']); ?></span>.
                                    </p>
                                    <p align="center" style="margin: 6px 10px 0; font-family: 'Comic Sans MS', sans-serif; font-size: 15pt; font-weight: 700; color: <?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
                                        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
                                    </p>
                                    <p align="center" style="margin: 6px 10px 0; font-family: 'Comic Sans MS', sans-serif; font-size: 12pt; font-weight: 600; color: #800080;">
                                        The time shown is <span style="color: #CC0066;"><?php echo $result['answer']; ?></span>.
                                    </p>
                                <?php else: ?>
                                    &nbsp;
                                <?php endif; ?>
                            </td>
                            <td width="213">
                                <img border="0" src="<?php echo $base; ?>/math/images/clock-top-right.jpg" width="213" height="224">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- MIDDLE ROW: clock-left | quadrants | clock-right | score -->
            <tr>
                <td>
                    <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table34">
                        <tr>
                            <td width="280">
                                <img border="0" src="<?php echo $base; ?>/math/images/clock-left.jpg" width="280" height="250">
                            </td>
                            <td>
                                <table border="0" width="240" cellspacing="0" cellpadding="0" id="table51">
                                    <tr>
                                        <td background="<?php echo $display['q2']; ?>" width="120" height="128"></td>
                                        <td background="<?php echo $display['q1']; ?>" width="120" height="128"></td>
                                    </tr>
                                    <tr>
                                        <td background="<?php echo $display['q3']; ?>" width="120" height="122"></td>
                                        <td background="<?php echo $display['q4']; ?>" width="120" height="122"></td>
                                    </tr>
                                </table>
                            </td>
                            <td width="92">
                                <img border="0" src="<?php echo $base; ?>/math/images/clock-right.jpg" width="92" height="250">
                            </td>
                            <td width="188" background="<?php echo $base; ?>/math/images/clock-score.jpg" valign="bottom" align="center">
                                <p align="center" style="margin: 0 0 0px 0;">
                                    <font face="Comic Sans MS" style="font-size: 22pt; font-weight: 700" color="#800080">
                                        <?php echo $score; ?>
                                    </font>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- CLOCK BOTTOM BANNER -->
            <tr>
                <td>
                    <img border="0" src="<?php echo $base; ?>/math/images/clock-bottom.jpg" width="800" height="93">
                </td>
            </tr>

            <!-- ANSWER ROW: bottom-left | answer area | bottom-right -->
            <tr>
                <td>
                    <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table41">
                        <tr>
                            <td width="280">
                                <img border="0" src="<?php echo $base; ?>/math/images/clock-bottom-left.jpg">
                            </td>
                            <td background="<?php echo $base; ?>/math/images/<?php echo $ansBg; ?>" height="192" width="240" valign="top" align="center">
                                <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="margin-top: 35px;">
                                        <?php if (!$answering): ?>
                                            <tr>
                                                <td width="46%" height="10">
                                                    <p align="right">
                                                        <input type="text" name="hours" size="1" maxlength="2"
                                                               style="text-align: center; height: 34px; font-weight: 700; font-size: 30px;"
                                                               autocomplete="off" autofocus>
                                                    </p>
                                                </td>
                                                <td width="8%" align="center" height="10">
                                                    <font face="Comic Sans MS" style="font-size: 24pt; font-weight: 700" color="#800080">:</font>
                                                </td>
                                                <td width="45%" height="10">
                                                    <p align="left">
                                                        <input type="text" name="minutes" size="1" maxlength="2"
                                                               style="text-align: center; height: 34px; font-weight: 700; font-size: 30px;"
                                                               autocomplete="off">
                                                    </p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td align="center" colspan="3">
                                                <?php if (!$answering): ?>
                                                    <br/><input type="submit" name="Submit1" value="Submit">
                                                    <br/><br/><input type="submit" name="Submit2" value="New Question">
                                                <?php else: ?>
                                                    <br/><br/><input type="submit" name="Submit2" value="New Question">
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                            <td width="280">
                                <img border="0" src="<?php echo $base; ?>/math/images/clock-bottom-right.jpg">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td></tr>

    <!-- FOOTER -->
    <tr>
        <td bgcolor="#0086CE">
            <p align="center" style="margin-top: 5px; margin-bottom: 5px">
                <font style="font-size: 10pt"><span style="mso-spacerun: yes">
                    <font face="Arial" color="#FFFFFF">Copyright&nbsp; 2010 </font>
                    <b><font face="Arial" color="#365669"><a href="/home-math.php"><font color="#FFFFFF">KPluz.com</font></a></font></b>
                    <font face="Arial" color="#FFFFFF">. All Rights Reserved.</font>
                </span></font>
            </p>
        </td>
    </tr>
</table>
</div>

<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
?>
</body>
</html>