<?php
// Unified Math menu for grades 0-10 – built from database
session_name('KPLUZ_SESSION');
session_start();

$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

// Check login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: $base/login.php");
    exit();
}

$grade = (int)($_SESSION['user_grade'] ?? 0);
if ($grade < 0 || $grade > 10) $grade = 0;

$isHS = ($grade >= 7);

$db = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($db->connect_error) die("Database connection failed: " . $db->connect_error);

$subject = 'math';
$sql = "SELECT * FROM modules WHERE subject = ? AND grade = ? AND is_active = 1 ORDER BY section_order ASC, module_order ASC";
$stmt = $db->prepare($sql);
$stmt->bind_param("si", $subject, $grade);
$stmt->execute();
$result = $stmt->get_result();

$sections = [];
while ($row = $result->fetch_assoc()) {
    $sectionName = $row['section'];
    if (!isset($sections[$sectionName])) {
        $sections[$sectionName] = ['section_order' => $row['section_order'], 'modules' => []];
    }
    $sections[$sectionName]['modules'][] = $row;
}
$db->close();

$sectionHeaders = [
    'cognitive' => $base . '/math/images/images/topics-cognitive.jpg',
    'counting-arithmetic' => $base . '/math/images/images/topics-counting-arithmetic.jpg',
    'arithmetic' => $base . '/math/images/images/topics-arithmetic.jpg',
    'number-relationships' => $base . '/math/images/images/topics-number-relationships.jpg',
    'fractions' => $base . '/math/images/images/topics-fractions.jpg',
    'decimals' => $base . '/math/images/images/topics-decimals.jpg',
    'number-conversions' => $base . '/math/images/images/topics-number-conv.jpg',
    'time-money' => $base . '/math/images/images/topics-time-money.jpg',
    'geometry-measurement' => $base . '/math/images/images/topics-geometry-measurement.jpg',
    'sets' => $base . '/math/images/images/topics-sets.jpg',
    'statistics' => $base . '/math/images/topics-stat-prob-elem.jpg',
    'algebra' => $base . '/math/images/images/topics-algebra.jpg',
    'problem-solving' => $base . '/math/images/images/topics-problem-solving.jpg',
    'number-sense' => $base . '/math/images/topics-number-sense.jpg',
    'measurement' => $base . '/math/images/topics-measurement.jpg',
    'algebraic-expressions'=> $base . '/math/images/topics-alg-exp.jpg',
    'polynomials' => $base . '/math/images/topics-polynomials.jpg',
    'solving-equations' => $base . '/math/images/topics-solving-equations.jpg',
    'solving-equations-ineq' => $base . '/math/images/topics-solving-eq-ineq.jpg',
    'equations-functions' => $base . '/math/images/topics-equations-functions.jpg',
    'progression' => $base . '/math/images/topics-progression.jpg',
    'alg-special' => $base . '/math/images/topics-alg-special.jpg',
    'lines' => $base . '/math/images/topics-lines.jpg',
    'functions' => $base . '/math/images/topics-functions.jpg',
    'intro-geometry' => $base . '/math/images/topics-intro-geom.jpg',
    'angles' => $base . '/math/images/topics-angles.jpg',
    'shapes-solids' => $base . '/math/images/topics-shapes-solids.jpg',
    'axiomatic-geometry' => $base . '/math/images/topics-ax-an-geom.jpg',
    'triangle-congruence' => $base . '/math/images/topics-triangle-congruence.jpg',
    'tri-quad' => $base . '/math/images/topics-tri-quad.jpg',
    'circles-conics' => $base . '/math/images/topics-circles.jpg',
    'trig-functions' => $base . '/math/images/topics-trigo-functions.jpg',
    'trig-identities' => $base . '/math/images/topics-trigo-identities.jpg',
    'trigo' => $base . '/math/images/topics-trigo.jpg',
    'logarithms' => $base . '/math/images/topics-log.jpg',
    'calculus' => $base . '/math/images/topics-calculus.jpg',
    'stat-prob' => $base . '/math/images/topics-stat-prob.jpg',
    'logic' => $base . '/math/images/topics-logic.jpg',
    'word-problems' => $base . '/math/images/topics-word-problems1.jpg',
];

if ($isHS) {
    $topBanner = $base . '/math/images/math-menu-hs-' . $grade . '-top.jpg';
    $leftBg    = $base . '/math/images/math-menu-hs-left.jpg';
    $contentBg = $base . '/math/images/math-menu-hs-content.jpg';
    $rightBg   = $base . '/math/images/math-menu-hs-right.jpg';
    $bottomImg = $base . '/math/images/math-menu-hs-bottom.jpg';
    $reportCard = $base . '/math/modules/images/report-cardha.jpg';
    $reportCardHover = $base . '/math/modules/images/report-cardhb.jpg';
    $solvers = $base . '/math/modules/images/solversha.jpg';
    $solversHover = $base . '/math/modules/images/solvershb.jpg';
    $book = $base . '/math/images/bookhsa.jpg';
    $bookHover = $base . '/math/images/bookhsb.jpg';
    $videos = $base . '/math/images/videoshsa.jpg';
    $videosHover = $base . '/math/images/videoshsb.jpg';
    $trivia = $base . '/math/images/triviaa.jpg';
    $triviaHover = $base . '/math/images/triviab.jpg';
    $games = $base . '/math/images/gamesa.jpg';
    $gamesHover = $base . '/math/images/gamesb.jpg';
} else {
    $topBanner = $base . '/math/images/math-menu-' . $grade . '-top.jpg';
    $leftBg    = $base . '/math/images/math-menu-left.jpg';
    $contentBg = $base . '/math/images/math-menu-content.jpg';
    $rightBg   = $base . '/math/images/math-menu-right.jpg';
    $bottomImg = $base . '/math/images/math-menu-bottom.jpg';
    $reportCard = $base . '/math/modules/images/report-carda.jpg';
    $reportCardHover = $base . '/math/modules/images/report-cardb.jpg';
    $solvers = $base . '/math/modules/images/solversa.jpg';
    $solversHover = $base . '/math/modules/images/solversb.jpg';
    $book = $base . '/math/images/booka.jpg';
    $bookHover = $base . '/math/images/bookb.jpg';
    $videos = $base . '/math/images/videosa.jpg';
    $videosHover = $base . '/math/images/videosb.jpg';
    $trivia = $base . '/math/images/triviaa.jpg';
    $triviaHover = $base . '/math/images/triviab.jpg';
    $games = $base . '/math/images/gamesa.jpg';
    $gamesHover = $base . '/math/images/gamesb.jpg';
}

if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $topBanner)) {
    $topBanner = $isHS ? $base . '/math/images/math-menu-hs-top.jpg' : $base . '/math/images/math-menu-top.jpg';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Grade <?= $grade ?> Math Skills Excellence Program - MathPluz.com</title>
    <link rel="stylesheet" href="<?= $base ?>/app/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/app/css/app.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { margin: 0; padding: 0; padding-top: 20px; line-height: 1; background: url('<?= $base ?>/images/bluetop-bg.jpg') repeat-x top left; }
        table, tr, td, div { margin: 0; padding: 0; line-height: 0; border-spacing: 0; border-collapse: collapse; }
        img { display: block; border: 0; }
        .content-table td { line-height: normal; padding: 0 5px; }
        .content-table p { line-height: normal; margin: 0; padding: 0; }
        .content-table img { display: inline-block; }
    </style>
    <script>
        function FP_swapImg() { var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length; n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm; elm.$src=elm.src; elm.src=args[n+1]; } } }
        function FP_preloadImgs() { var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array(); for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; } }
        function FP_getObjectByID(id,o) { var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id); else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el; if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c) for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; } f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements; for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } } return null; }
        window.onload = function() {
            FP_preloadImgs(
                '<?= $base ?>/images/header1c.jpg','<?= $base ?>/images/header1b.jpg',
                '<?= $base ?>/images/header2c.jpg','<?= $base ?>/images/header2b.jpg',
                '<?= $base ?>/images/header3c.jpg','<?= $base ?>/images/header3b.jpg',
                '<?= $base ?>/images/header4c.jpg','<?= $base ?>/images/header4b.jpg',
                '<?= $base ?>/images/header5c.jpg','<?= $base ?>/images/header5b.jpg',
                '<?= $base ?>/images/header6c.jpg','<?= $base ?>/images/header6b.jpg'
            );
            <?php
            echo "FP_preloadImgs('$reportCardHover','$solversHover','$bookHover','$videosHover'";
            if (!$isHS) echo ",'$triviaHover','$gamesHover'";
            echo ");";
            $hoverImages = [];
            foreach ($sections as $section) foreach ($section['modules'] as $mod) $hoverImages[] = $mod['image_hover'];
            if (!empty($hoverImages)) {
                echo 'FP_preloadImgs(';
                $first = true;
                foreach ($hoverImages as $img) { if (!$first) echo ','; echo "'" . addslashes($img) . "'"; $first = false; }
                echo ');';
            }
            ?>
        };
    </script>
</head>
<body>
<div align="center" style="margin:0; padding:0; line-height:0;">
    <table width="900" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
        <tr><td style="padding:0; margin:0; line-height:0;">
            <div align="center" style="margin:0; padding:0; line-height:0;">
                <table border="0" width="900" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                    <tr>
                        <td width="193" valign="top" style="padding:0; margin:0; line-height:0;"><a href="<?= $base ?>/app/menu.php"><img border="0" src="<?= $base ?>/images/header-logo.jpg" style="display:block;"></a></td>
                        <td width="133" valign="top" style="padding:0; margin:0; line-height:0;"><a href="<?= $base ?>/how-to-use-kpluz.php"><img border="0" id="img1" src="<?= $base ?>/images/header1a.jpg" style="display:block;" onmouseover="FP_swapImg(1,0,'img1','<?= $base ?>/images/header1b.jpg')" onmouseout="FP_swapImg(0,0,'img1','<?= $base ?>/images/header1a.jpg')" onmousedown="FP_swapImg(1,0,'img1','<?= $base ?>/images/header1c.jpg')" onmouseup="FP_swapImg(0,0,'img1','<?= $base ?>/images/header1b.jpg')"></a></td>
                        <td width="133" valign="top" style="padding:0; margin:0; line-height:0;"><a href="<?= $base ?>/bluebars_student.php"><img border="0" id="img2" src="<?= $base ?>/images/header2a.jpg" style="display:block;" onmouseover="FP_swapImg(1,0,'img2','<?= $base ?>/images/header2b.jpg')" onmouseout="FP_swapImg(0,0,'img2','<?= $base ?>/images/header2a.jpg')" onmousedown="FP_swapImg(1,0,'img2','<?= $base ?>/images/header2c.jpg')" onmouseup="FP_swapImg(0,0,'img2','<?= $base ?>/images/header2b.jpg')"></a></td>
                        <td width="133" valign="top" style="padding:0; margin:0; line-height:0;"><a href="<?= $base ?>/programs.php"><img border="0" id="img3" src="<?= $base ?>/images/header3a.jpg" style="display:block;" onmouseover="FP_swapImg(1,0,'img3','<?= $base ?>/images/header3b.jpg')" onmouseout="FP_swapImg(0,0,'img3','<?= $base ?>/images/header3a.jpg')" onmousedown="FP_swapImg(1,0,'img3','<?= $base ?>/images/header3c.jpg')" onmouseup="FP_swapImg(0,0,'img3','<?= $base ?>/images/header3b.jpg')"></a></td>
                        <td width="134" valign="top" style="padding:0; margin:0; line-height:0;"><a href="<?= $base ?>/community.php"><img border="0" id="img4" src="<?= $base ?>/images/header4a.jpg" style="display:block;" onmouseover="FP_swapImg(1,0,'img4','<?= $base ?>/images/header4b.jpg')" onmouseout="FP_swapImg(0,0,'img4','<?= $base ?>/images/header4a.jpg')" onmousedown="FP_swapImg(1,0,'img4','<?= $base ?>/images/header4c.jpg')" onmouseup="FP_swapImg(0,0,'img4','<?= $base ?>/images/header4b.jpg')"></a></td>
                        <td width="134" valign="top" style="padding:0; margin:0; line-height:0;"><a href="<?= $base ?>/contact.php"><img border="0" id="img5" src="<?= $base ?>/images/header5a.jpg" style="display:block;" onmouseover="FP_swapImg(1,0,'img5','<?= $base ?>/images/header5b.jpg')" onmouseout="FP_swapImg(0,0,'img5','<?= $base ?>/images/header5a.jpg')" onmousedown="FP_swapImg(1,0,'img5','<?= $base ?>/images/header5c.jpg')" onmouseup="FP_swapImg(0,0,'img5','<?= $base ?>/images/header5b.jpg')"></a></td>
                        <td width="134" valign="top" style="padding:0; margin:0; line-height:0;"><a href="<?= $base ?>/logout.php"><img border="0" id="img6" src="<?= $base ?>/images/header6a.jpg" style="display:block;" onmouseover="FP_swapImg(1,0,'img6','<?= $base ?>/images/header6b.jpg')" onmouseout="FP_swapImg(0,0,'img6','<?= $base ?>/images/header6a.jpg')" onmousedown="FP_swapImg(1,0,'img6','<?= $base ?>/images/header6c.jpg')" onmouseup="FP_swapImg(0,0,'img6','<?= $base ?>/images/header6b.jpg')"></a></td>
                    </tr>
                </table>
            </div>
        </td></tr>
    </table>
</div>

<div style="height:20px; line-height:25px; font-size:0;">&nbsp;</div>

<div align="center" style="margin:0; padding:0; line-height:0;">
    <table border="0" width="800" cellspacing="0" cellpadding="0" id="table7" style="margin:0; padding:0; border-collapse:collapse;">
        <tr><td style="padding:0; margin:0;">
            <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table61" style="margin:0; padding:0; border-collapse:collapse;">
                <tr><td valign="top" style="line-height:0; font-size:0; padding-top:10px; padding-left:0; padding-right:0; padding-bottom:0; margin:0;"><img border="0" src="<?= $topBanner ?>" alt="Grade <?= $grade ?> Math" style="display:block; width:100%;"></td></tr>
                <tr><td style="padding:0; margin:0;">
                    <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table62" style="margin:0; padding:0; border-collapse:collapse;">
                        <tr>
                            <td width="72" background="<?= $leftBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0;">&nbsp;</td>
                            <td background="<?= $contentBg ?>" valign="top" width="656" style="padding-top:20px; padding-left:0; padding-right:0; padding-bottom:0; margin:0; line-height:normal;" class="content-table">
                                <div align="center" style="padding:0; margin:0;">
                                    <table border="0" width="585" cellspacing="0" cellpadding="0" id="table114" style="margin:0; padding:0; border-collapse:collapse;">
                                        <tr><td colspan="3" style="padding:0; margin:0;">&nbsp;</td></tr>
                                        <tr><td colspan="3" style="padding:0; margin:0;">&nbsp;</td></tr>
                                        <tr><td colspan="3" style="padding:0; margin:0;">
                                            <div align="center" style="padding:0; margin:0;">
                                                <?php if ($isHS): ?>
                                                    <table border="0" width="500" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                                                        <tr>
                                                            <td width="25%" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/math/MP-report-card.php"><img border="0" id="reportcard-home1" src="<?= $reportCard ?>" onmouseover="FP_swapImg(1,0,'reportcard-home1','<?= $reportCardHover ?>')" onmouseout="FP_swapImg(0,0,'reportcard-home1','<?= $reportCard ?>')" style="display:inline-block;"></a></p></td>
                                                            <td width="25%" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/math/solvers/solvers.php"><img border="0" id="solvers-home4" src="<?= $solvers ?>" onmouseover="FP_swapImg(1,0,'solvers-home4','<?= $solversHover ?>')" onmouseout="FP_swapImg(0,0,'solvers-home4','<?= $solvers ?>')" style="display:inline-block;"></a></p></td>
                                                            <td width="25%" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/math/books/g<?= $grade ?>/<?= $grade ?>toc.php"><img border="0" id="book-home7" src="<?= $book ?>" onmouseover="FP_swapImg(1,0,'book-home7','<?= $bookHover ?>')" onmouseout="FP_swapImg(0,0,'book-home7','<?= $book ?>')" style="display:inline-block;"></a></p></td>
                                                            <td width="25%" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/videos/kpluz-vids-math-7-10.php"><img border="0" id="videos-home7" src="<?= $videos ?>" onmouseover="FP_swapImg(1,0,'videos-home7','<?= $videosHover ?>')" onmouseout="FP_swapImg(0,0,'videos-home7','<?= $videos ?>')" style="display:inline-block;"></a></p></td>
                                                        </tr>
                                                    </table>
                                                <?php else: ?>
                                                    <table border="0" width="500" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                                                        <tr>
                                                            <td width="166" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/math/MP-report-card.php"><img border="0" id="reportcard-home1" src="<?= $reportCard ?>" onmouseover="FP_swapImg(1,0,'reportcard-home1','<?= $reportCardHover ?>')" onmouseout="FP_swapImg(0,0,'reportcard-home1','<?= $reportCard ?>')" style="display:inline-block;"></a></p></td>
                                                            <td width="167" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/math/solvers/solvers.php"><img border="0" id="solvers-home4" src="<?= $solvers ?>" onmouseover="FP_swapImg(1,0,'solvers-home4','<?= $solversHover ?>')" onmouseout="FP_swapImg(0,0,'solvers-home4','<?= $solvers ?>')" style="display:inline-block;"></a></p></td>
                                                            <td width="167" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/math/books/g<?= $grade ?>/<?= $grade ?>toc.php"><img border="0" id="book-home7" src="<?= $book ?>" onmouseover="FP_swapImg(1,0,'book-home7','<?= $bookHover ?>')" onmouseout="FP_swapImg(0,0,'book-home7','<?= $book ?>')" style="display:inline-block;"></a></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="166" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/math/trivia/trivia.php"><img border="0" id="trivia-home5" src="<?= $trivia ?>" onmouseover="FP_swapImg(1,0,'trivia-home5','<?= $triviaHover ?>')" onmouseout="FP_swapImg(0,0,'trivia-home5','<?= $trivia ?>')" style="display:inline-block;"></a></p></td>
                                                            <td width="167" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/math/games/games-elem.php"><img border="0" id="games-home6" src="<?= $games ?>" onmouseover="FP_swapImg(1,0,'games-home6','<?= $gamesHover ?>')" onmouseout="FP_swapImg(0,0,'games-home6','<?= $games ?>')" style="display:inline-block;"></a></p></td>
                                                            <td width="167" align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal;"><a href="<?= $base ?>/videos/kpluz-vids-math-3-6.php"><img border="0" id="videos-home7" src="<?= $videos ?>" onmouseover="FP_swapImg(1,0,'videos-home7','<?= $videosHover ?>')" onmouseout="FP_swapImg(0,0,'videos-home7','<?= $videos ?>')" style="display:inline-block;"></a></p></td>
                                                        </tr>
                                                    </table>
                                                <?php endif; ?>
                                            </div>
                                        </td></tr>
                                        <tr><td colspan="3" style="height:20px; line-height:0;">&nbsp;</td></tr>

                                        <?php foreach ($sections as $sectionName => $sectionData):
                                            $modules = $sectionData['modules'];
                                            $headerImg = $sectionHeaders[$sectionName] ?? $base . '/math/images/topics-generic.jpg';
                                        ?>
                                            <tr><td colspan="3" style="padding:0; margin:0;"><p align="center" style="margin:30px 0 30px 0; padding:0; line-height:normal;"><img border="0" src="<?= $headerImg ?>" style="display:inline-block;"></p></td></tr>
                                            <?php $total = count($modules); for ($i = 0; $i < $total; $i += 3): ?>
                                            <tr>
                                                <?php for ($j = 0; $j < 3; $j++):
                                                    $idx = $i + $j;
                                                    if ($idx < $total):
                                                        $mod = $modules[$idx];
                                                        $imgId = 'mod-' . $mod['id'];
                                                ?>
                                                    <td width="208" align="center" valign="top" style="padding:0; margin:0;"><p style="margin:0 0 25px 0; padding:0; line-height:normal;"><a href="<?= htmlspecialchars($mod['url']) ?>"><img border="0" id="<?= $imgId ?>" src="<?= htmlspecialchars($mod['image_normal']) ?>" onmouseover="FP_swapImg(1,0,'<?= $imgId ?>','<?= htmlspecialchars($mod['image_hover']) ?>')" onmouseout="FP_swapImg(0,0,'<?= $imgId ?>','<?= htmlspecialchars($mod['image_normal']) ?>')" style="display:inline-block;"></a></p></td>
                                                <?php else: ?>
                                                    <td width="208" align="center" valign="top" style="padding:0; margin:0;">&nbsp;</td>
                                                <?php endif; endfor; ?>
                                            </tr>
                                            <?php endfor; endforeach; ?>

                                        <tr><td colspan="3" align="center" style="padding:15px 0 5px 0; margin:0;"><a href="<?= $base ?>/matatag-mapping.php?subject=math&grade=<?= $grade ?>"><img border="0" src="<?= $base ?>/images/matatag.jpg" style="display:inline-block;"></a></td></tr>
                                    </table>
                                </div>
                            </td>
                            <td width="72" background="<?= $rightBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0;">&nbsp;</td>
                        </tr>
                        <tr><td background="<?= $contentBg ?>" valign="top" width="656" style="padding:0; margin:0; line-height:0;"><img border="0" src="<?= $bottomImg ?>" style="display:block; width:100%;"></td></tr>
                    </table>
                </td></tr>
            </table>
        </td></tr>
        <tr><td bgcolor="#0086CE" style="padding:5px 0; margin:0;"><p align="center" style="margin:0; padding:0; line-height:normal;"><font style="font-size:10pt"><span style="mso-spacerun:yes"><font face="Arial" color="#FFFFFF">Copyright&nbsp; 2010</font> <b><font face="Arial" color="#365669"><a href="<?= $base ?>/home-math.php"><font color="#FFFFFF">KPluz.com</font></a></font></b><font face="Arial" color="#FFFFFF">. All Rights Reserved.</font></span></font></p></td></tr>
    </table>
</div>
</body>
</html>