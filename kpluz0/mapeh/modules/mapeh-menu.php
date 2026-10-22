<?php
session_name('KPLUZ_SESSION');
session_start();

$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: $base/login.php");
    exit();
}

$grade = (int)($_SESSION['user_grade'] ?? 0);
if ($grade < 0 || $grade > 10) $grade = 0;

$db = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($db->connect_error) die("Database connection failed: " . $db->connect_error);

$subject = 'mapeh';
$sql = "SELECT * FROM modules WHERE subject = ? AND grade = ? AND is_active = 1 ORDER BY section_order ASC, module_order ASC";
$stmt = $db->prepare($sql);
$stmt->bind_param("si", $subject, $grade);
$stmt->execute();
$result = $stmt->get_result();

$sections = [];
while ($row = $result->fetch_assoc()) {
    $sectionName = $row['section'];
    if (!isset($sections[$sectionName])) $sections[$sectionName] = ['section_order' => $row['section_order'], 'modules' => []];
    $sections[$sectionName]['modules'][] = $row;
}
$db->close();

$imageBase = $base . '/MAPEH/images/';
$topBanner = $imageBase . 'grd' . $grade . '-top.jpg';
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $topBanner)) {
    $topBanner = $imageBase . 'grd-top.jpg';
}
$leftBg    = $imageBase . 'grd-left.jpg';
$contentBg = $imageBase . 'grd-content.jpg';
$rightBg   = $imageBase . 'grd-right.jpg';
$bottomImg = $imageBase . 'grd-bottom.jpg';

$iconBase = $base . '/MAPEH/modules/icons/';

$sectionHeaders = [
    'music'  => $iconBase . 'note-music.jpg',
    'arts'   => $iconBase . 'note-arts.jpg',
    'pe'     => $iconBase . 'note-pe.jpg',
    'health' => $iconBase . 'note-health.jpg',
];

$reportCard = $iconBase . 'report-cardha.jpg';
$reportCardHover = $iconBase . 'report-cardhb.jpg';
$videos = $iconBase . 'videosa.jpg';
$videosHover = $iconBase . 'videosb.jpg';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>MAPEH Online Program for Grade <?= $grade ?> - KPluz.com</title>
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
            FP_preloadImgs('<?= $reportCardHover ?>','<?= $videosHover ?>');
            <?php
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
                <tr><td valign="top" style="line-height:0; font-size:0; padding-top:10px; padding-left:0; padding-right:0; padding-bottom:0; margin:0;"><img border="0" src="<?= $topBanner ?>" alt="Grade <?= $grade ?> MAPEH" style="display:block; width:100%;"></td></tr>
                <tr><td style="padding:0; margin:0;">
                    <table border="0" width="800" cellspacing="0" cellpadding="0" id="table62" style="margin:0; padding:0; border-collapse:collapse;">
                        <tr>
                            <td width="72" background="<?= $leftBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0; background-repeat: repeat-y;">&nbsp;</td>
                            <td background="<?= $contentBg ?>" valign="top" width="656" style="padding-top:40px; padding-left:0; padding-right:0; padding-bottom:0; margin:0; line-height:normal;" class="content-table">
                                <div align="center" style="padding:0; margin:0;">
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                                        <tr><td colspan="3" style="padding:0; margin:0;">
                                            <div align="center" style="padding:0; margin:0;">
                                                <table border="0" cellspacing="0" cellpadding="0" style="margin:0 auto; padding:0; border-collapse:collapse;">
                                                    <tr><td align="center" style="padding:0; margin:0;"><p style="margin:0; padding:0; line-height:normal; display:inline-block;"><a href="<?= $base ?>/MAPEH/MAPEH-report-card.php"><img border="0" id="reportcardh-home1" src="<?= $reportCard ?>" onmouseover="FP_swapImg(1,0,'reportcardh-home1','<?= $reportCardHover ?>')" onmouseout="FP_swapImg(0,0,'reportcardh-home1','<?= $reportCard ?>')" style="display:inline-block; margin-right:30px;"></a><a href="<?= $base ?>/videos/kpluz-vids-mapeh-<?= $grade >= 3 ? '3-10' : '1-2' ?>.php"><img border="0" id="videos-home3" src="<?= $videos ?>" onmouseover="FP_swapImg(1,0,'videos-home3','<?= $videosHover ?>')" onmouseout="FP_swapImg(0,0,'videos-home3','<?= $videos ?>')" style="display:inline-block; margin-left:30px;"></a></p></td></tr>
                                                    <tr><td>&nbsp;</td></tr>
                                                </table>
                                            </div>
                                        </td></tr>

                                        <?php foreach ($sections as $sectionName => $sectionData):
                                            $modules = $sectionData['modules'];
                                            $headerImg = $sectionHeaders[$sectionName] ?? $iconBase . 'note-others.jpg';
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
                                                    <td width="221" align="center" valign="top" style="padding:0; margin:0;"><p style="margin:0 0 40px 0; padding:0; line-height:normal;"><a href="<?= htmlspecialchars($mod['url']) ?>"><img border="0" id="<?= $imgId ?>" src="<?= htmlspecialchars($mod['image_normal']) ?>" onmouseover="FP_swapImg(1,0,'<?= $imgId ?>','<?= htmlspecialchars($mod['image_hover']) ?>')" onmouseout="FP_swapImg(0,0,'<?= $imgId ?>','<?= htmlspecialchars($mod['image_normal']) ?>')" style="display:inline-block;"></a></p></td>
                                                <?php else: ?>
                                                    <td width="221" align="center" valign="top" style="padding:0; margin:0;">&nbsp;</td>
                                                <?php endif; endfor; ?>
                                            </tr>
                                            <?php endfor; endforeach; ?>

                                        <tr><td colspan="3" align="center" style="padding:15px 0 5px 0; margin:0;"><a href="<?= $base ?>/matatag-mapping.php?subject=mapeh&grade=<?= $grade ?>"><img border="0" src="<?= $base ?>/images/matatag.jpg" style="display:inline-block;"></a></td></tr>
                                    </table>
                                </div>
                            </td>
                            <td width="72" background="<?= $rightBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0; background-repeat: repeat-y;">&nbsp;</td>
                        </tr>
                        <tr><td background="<?= $contentBg ?>" valign="top" width="656" style="padding:0; margin:0; line-height:0;"><img border="0" src="<?= $bottomImg ?>" style="display:block; width:100%;"></td></tr>
                    </table>
                </td></tr>
            </table>
        </td></tr>
        <tr><td bgcolor="#0086CE" style="padding:5px 0; margin:0;"><p align="center" style="margin:0; padding:0; line-height:normal;"><font style="font-size:10pt"><span style="mso-spacerun:yes"><font face="Arial" color="#FFFFFF">Copyright&nbsp; 2010</font> <b><font face="Arial" color="#365669"><a href="<?= $base ?>/home-mapeh.php"><font color="#FFFFFF">KPluz.com</font></a></font></b><font face="Arial" color="#FFFFFF">. All Rights Reserved.</font></span></font></p></td></tr>
    </table>
</div>
</body>
</html>