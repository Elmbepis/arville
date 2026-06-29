<?php
// Unified MAPEH menu for grades 0-10 – built from database
session_name('KPLUZ_SESSION');
session_start();

// Check login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}

$grade = (int)($_SESSION['user_grade'] ?? 0);
if ($grade < 0 || $grade > 10) $grade = 0;

// Database connection
$db = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

// Fetch modules for this grade and subject (MAPEH)
$subject = 'mapeh';
$sql = "SELECT * FROM modules 
        WHERE subject = ? AND grade = ? AND is_active = 1 
        ORDER BY section_order ASC, module_order ASC";
$stmt = $db->prepare($sql);
$stmt->bind_param("si", $subject, $grade);
$stmt->execute();
$result = $stmt->get_result();

// Group modules by section
$sections = [];
while ($row = $result->fetch_assoc()) {
    $sectionName = $row['section'];
    if (!isset($sections[$sectionName])) {
        $sections[$sectionName] = [
            'section_order' => $row['section_order'],
            'modules' => []
        ];
    }
    $sections[$sectionName]['modules'][] = $row;
}
$db->close();

// ============================================================
// IMAGE PATHS – SEPARATED BY LOCATION
// ============================================================

// MAPEH theme images (backgrounds, top banner) – in /MAPEH/images/
$imageBase = '/arville/kpluz0/MAPEH/images/';
$topBanner = $imageBase . 'grd' . $grade . '-top.jpg';
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $topBanner)) {
    $topBanner = $imageBase . 'grd-top.jpg'; // fallback
}
$leftBg    = $imageBase . 'grd-left.jpg';
$contentBg = $imageBase . 'grd-content.jpg';
$rightBg   = $imageBase . 'grd-right.jpg';
$bottomImg = $imageBase . 'grd-bottom.jpg';

// All other MAPEH images (section headers, top-row icons, module icons) – in /MAPEH/modules/icons/
$iconBase = '/arville/kpluz0/MAPEH/modules/icons/';

// Section headers – map section names to header images
$sectionHeaders = [
    'music'  => $iconBase . 'note-music.jpg',
    'arts'   => $iconBase . 'note-arts.jpg',
    'pe'     => $iconBase . 'note-pe.jpg',
    'health' => $iconBase . 'note-health.jpg',
];

// Top row icons (Report Card, Videos)
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
    <link rel="stylesheet" href="/arville/kpluz0/app/css/style.css">
    <link rel="stylesheet" href="/arville/kpluz0/app/css/app.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { margin: 0; padding: 0; line-height: 1; }
        table, tr, td, div { margin: 0; padding: 0; line-height: 0; border-spacing: 0; border-collapse: collapse; }
        img { display: block; border: 0; }
        .content-table td { line-height: normal; padding: 0 5px; }
        .content-table p { line-height: normal; margin: 0; padding: 0; }
        .content-table img { display: inline-block; }
    </style>
    <script>
        function FP_swapImg() {
            var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length; n+=2) {
                elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
                elm.$src=elm.src; elm.src=args[n+1]; }
            }
        }
        function FP_preloadImgs() {
            var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
            for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
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

        window.onload = function() {
            // Preload header images (global)
            FP_preloadImgs(
                '/arville/kpluz0/images/header1c.jpg',
                '/arville/kpluz0/images/header1b.jpg',
                '/arville/kpluz0/images/header2c.jpg',
                '/arville/kpluz0/images/header2b.jpg',
                '/arville/kpluz0/images/header3c.jpg',
                '/arville/kpluz0/images/header3b.jpg',
                '/arville/kpluz0/images/header4c.jpg',
                '/arville/kpluz0/images/header4b.jpg',
                '/arville/kpluz0/images/header5c.jpg',
                '/arville/kpluz0/images/header5b.jpg',
                '/arville/kpluz0/images/header6c.jpg',
                '/arville/kpluz0/images/header6b.jpg'
            );
            // Preload top row hover images (from MAPEH/modules/icons/)
            FP_preloadImgs(
                '<?= $reportCardHover ?>',
                '<?= $videosHover ?>'
            );
            // Preload module hover images from database
            <?php
            $hoverImages = [];
            foreach ($sections as $section) {
                foreach ($section['modules'] as $mod) {
                    $hoverImages[] = $mod['image_hover'];
                }
            }
            if (!empty($hoverImages)) {
                echo 'FP_preloadImgs(';
                $first = true;
                foreach ($hoverImages as $img) {
                    if (!$first) echo ',';
                    echo "'" . addslashes($img) . "'";
                    $first = false;
                }
                echo ');';
            }
            ?>
        };
    </script>
</head>
<body background="/arville/kpluz0/images/bluetop-bg.jpg">

<!-- HEADER (global) -->
<div align="center" style="margin:0; padding:0; line-height:0;">
    <table width="900" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
        <tr>
            <td style="padding:0; margin:0; line-height:0;">
                <div align="center" style="margin:0; padding:0; line-height:0;">
                    <table border="0" width="900" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                        <tr>
                            <td width="193" valign="top" style="padding:0; margin:0; line-height:0;">
                                <a href="/arville/kpluz0/app/menu.php">
                                    <img border="0" src="/arville/kpluz0/images/header-logo.jpg" style="display:block;">
                                </a>
                            </td>
                            <td width="133" valign="top" style="padding:0; margin:0; line-height:0;">
                                <a href="/arville/kpluz0/how-to-use-kpluz.php">
                                    <img border="0" id="img1" src="/arville/kpluz0/images/header1a.jpg" style="display:block;" 
                                         onmouseover="FP_swapImg(1,0,'img1','/arville/kpluz0/images/header1b.jpg')" 
                                         onmouseout="FP_swapImg(0,0,'img1','/arville/kpluz0/images/header1a.jpg')" 
                                         onmousedown="FP_swapImg(1,0,'img1','/arville/kpluz0/images/header1c.jpg')" 
                                         onmouseup="FP_swapImg(0,0,'img1','/arville/kpluz0/images/header1b.jpg')">
                                </a>
                            </td>
                            <td width="133" valign="top" style="padding:0; margin:0; line-height:0;">
                                <a href="/arville/kpluz0/bluebars_student.php">
                                    <img border="0" id="img2" src="/arville/kpluz0/images/header2a.jpg" style="display:block;" 
                                         onmouseover="FP_swapImg(1,0,'img2','/arville/kpluz0/images/header2b.jpg')" 
                                         onmouseout="FP_swapImg(0,0,'img2','/arville/kpluz0/images/header2a.jpg')" 
                                         onmousedown="FP_swapImg(1,0,'img2','/arville/kpluz0/images/header2c.jpg')" 
                                         onmouseup="FP_swapImg(0,0,'img2','/arville/kpluz0/images/header2b.jpg')">
                                </a>
                            </td>
                            <td width="133" valign="top" style="padding:0; margin:0; line-height:0;">
                                <a href="/arville/kpluz0/programs.php">
                                    <img border="0" id="img3" src="/arville/kpluz0/images/header3a.jpg" style="display:block;" 
                                         onmouseover="FP_swapImg(1,0,'img3','/arville/kpluz0/images/header3b.jpg')" 
                                         onmouseout="FP_swapImg(0,0,'img3','/arville/kpluz0/images/header3a.jpg')" 
                                         onmousedown="FP_swapImg(1,0,'img3','/arville/kpluz0/images/header3c.jpg')" 
                                         onmouseup="FP_swapImg(0,0,'img3','/arville/kpluz0/images/header3b.jpg')">
                                </a>
                            </td>
                            <td width="134" valign="top" style="padding:0; margin:0; line-height:0;">
                                <a href="/arville/kpluz0/community.php">
                                    <img border="0" id="img4" src="/arville/kpluz0/images/header4a.jpg" style="display:block;" 
                                         onmouseover="FP_swapImg(1,0,'img4','/arville/kpluz0/images/header4b.jpg')" 
                                         onmouseout="FP_swapImg(0,0,'img4','/arville/kpluz0/images/header4a.jpg')" 
                                         onmousedown="FP_swapImg(1,0,'img4','/arville/kpluz0/images/header4c.jpg')" 
                                         onmouseup="FP_swapImg(0,0,'img4','/arville/kpluz0/images/header4b.jpg')">
                                </a>
                            </td>
                            <td width="134" valign="top" style="padding:0; margin:0; line-height:0;">
                                <a href="/arville/kpluz0/contact.php">
                                    <img border="0" id="img5" src="/arville/kpluz0/images/header5a.jpg" style="display:block;" 
                                         onmouseover="FP_swapImg(1,0,'img5','/arville/kpluz0/images/header5b.jpg')" 
                                         onmouseout="FP_swapImg(0,0,'img5','/arville/kpluz0/images/header5a.jpg')" 
                                         onmousedown="FP_swapImg(1,0,'img5','/arville/kpluz0/images/header5c.jpg')" 
                                         onmouseup="FP_swapImg(0,0,'img5','/arville/kpluz0/images/header5b.jpg')">
                                </a>
                            </td>
                            <td width="134" valign="top" style="padding:0; margin:0; line-height:0;">
                                <a href="/arville/kpluz0/logout.php">
                                    <img border="0" id="img6" src="/arville/kpluz0/images/header6a.jpg" style="display:block;" 
                                         onmouseover="FP_swapImg(1,0,'img6','/arville/kpluz0/images/header6b.jpg')" 
                                         onmouseout="FP_swapImg(0,0,'img6','/arville/kpluz0/images/header6a.jpg')" 
                                         onmousedown="FP_swapImg(1,0,'img6','/arville/kpluz0/images/header6c.jpg')" 
                                         onmouseup="FP_swapImg(0,0,'img6','/arville/kpluz0/images/header6b.jpg')">
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>

<!-- MAIN CONTENT -->
<div align="center" style="margin:0; padding:0; line-height:0;">
    <table border="0" width="800" cellspacing="0" cellpadding="0" id="table7" style="margin:0; padding:0; border-collapse:collapse;">
        <tr>
            <td style="padding:0; margin:0;">
                <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table61" style="margin:0; padding:0; border-collapse:collapse;">
                    <!-- Top banner (from /MAPEH/images/) – no padding-bottom to avoid white gap -->
                    <tr>
                        <td valign="top" style="line-height:0; font-size:0; padding-top:10px; padding-left:0; padding-right:0; padding-bottom:0; margin:0;">
                            <img border="0" src="<?= $topBanner ?>" alt="Grade <?= $grade ?> MAPEH" style="display:block; width:100%;">
                        </td>
                    </tr>
                    <!-- Main menu -->
                    <tr>
                        <td style="padding:0; margin:0;">
                            <table border="0" width="800" cellspacing="0" cellpadding="0" id="table62" style="margin:0; padding:0; border-collapse:collapse;">
                                <tr>
                                    <!-- Left background (from /MAPEH/images/) -->
                                    <td width="72" background="<?= $leftBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0; background-repeat: repeat-y;">&nbsp;</td>
                                    <!-- Content background (from /MAPEH/images/) – padding-top creates space above icons without white gap -->
                                    <td background="<?= $contentBg ?>" valign="top" width="656" style="padding-top:40px; padding-left:0; padding-right:0; padding-bottom:0px; margin:0; line-height:normal;" class="content-table">
                                        <div align="center" style="padding:0; margin:0;">
                                            <table border="0" width="100%" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                                                <tr>
                                                    <td colspan="3" style="padding:0; margin:0;">
                                                        <div align="center" style="padding:0; margin:0;">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="margin:0 auto; padding:0; border-collapse:collapse;">
                                                                <tr>
                                                                    <td align="center" style="padding:0; margin:0;">
                                                                        <p style="margin:0; padding:0; line-height:normal; display:inline-block;">
                                                                            <a href="/arville/kpluz0/MAPEH/MAPEH-report-card.php">
                                                                                <img border="0" id="reportcardh-home1" src="<?= $reportCard ?>" 
                                                                                     onmouseover="FP_swapImg(1,0,'reportcardh-home1','<?= $reportCardHover ?>')" 
                                                                                     onmouseout="FP_swapImg(0,0,'reportcardh-home1','<?= $reportCard ?>')" style="display:inline-block; margin-right:30px;">
                                                                            </a>
                                                                            <a href="/arville/kpluz0/videos/kpluz-vids-mapeh-<?= $grade >= 3 ? '3-10' : '1-2' ?>.php">
                                                                                <img border="0" id="videos-home3" src="<?= $videos ?>" 
                                                                                     onmouseover="FP_swapImg(1,0,'videos-home3','<?= $videosHover ?>')" 
                                                                                     onmouseout="FP_swapImg(0,0,'videos-home3','<?= $videos ?>')" style="display:inline-block; margin-left:30px;">
                                                                            </a>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr><td>&nbsp;</td></tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                foreach ($sections as $sectionName => $sectionData):
                                                    $modules = $sectionData['modules'];
                                                    $headerImg = $sectionHeaders[$sectionName] ?? $iconBase . 'note-others.jpg';
                                                ?>
                                                    <!-- Section header (from /MAPEH/modules/icons/) -->
                                                    <tr>
                                                        <td colspan="3" style="padding:0; margin:0;">
                                                            <p align="center" style="margin:30px 0 30px 0; padding:0; line-height:normal;">
                                                                <img border="0" src="<?= $headerImg ?>" style="display:inline-block;">
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $total = count($modules);
                                                    for ($i = 0; $i < $total; $i += 3):
                                                    ?>
                                                    <tr>
                                                        <?php for ($j = 0; $j < 3; $j++):
                                                            $idx = $i + $j;
                                                            if ($idx < $total):
                                                                $mod = $modules[$idx];
                                                                $imgId = 'mod-' . $mod['id'];
                                                        ?>
                                                            <td width="221" align="center" valign="top" style="padding:0; margin:0;">
                                                                <p style="margin:0 0 40px 0; padding:0; line-height:normal;">
                                                                    <a href="<?= htmlspecialchars($mod['url']) ?>">
                                                                        <img border="0" id="<?= $imgId ?>" 
                                                                             src="<?= htmlspecialchars($mod['image_normal']) ?>" 
                                                                             onmouseover="FP_swapImg(1,0,'<?= $imgId ?>','<?= htmlspecialchars($mod['image_hover']) ?>')" 
                                                                             onmouseout="FP_swapImg(0,0,'<?= $imgId ?>','<?= htmlspecialchars($mod['image_normal']) ?>')" 
                                                                             style="display:inline-block;">
                                                                    </a>
                                                                </p>
                                                            </td>
                                                        <?php else: ?>
                                                            <td width="221" align="center" valign="top" style="padding:0; margin:0;">&nbsp;</td>
                                                        <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </tr>
                                                    <?php endfor; ?>
                                                <?php endforeach; ?>
                                                <!-- Matatag mapping -->
                                                <tr>
                                                    <td colspan="3" align="center" style="padding:15px 0 5px 0; margin:0;">
                                                        <a href="/arville/kpluz0/matatag-mapping.php?subject=mapeh&grade=<?= $grade ?>">
                                                            <img border="0" src="/arville/kpluz0/images/matatag.jpg" style="display:inline-block;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <!-- Right background (from /MAPEH/images/) -->
                                    <td width="72" background="<?= $rightBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0; background-repeat: repeat-y;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td background="<?= $contentBg ?>" valign="top" width="656" style="padding:0; margin:0; line-height:0;">
                                        <img border="0" src="<?= $bottomImg ?>" style="display:block; width:100%;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0086CE" style="padding:5px 0; margin:0;">
                <p align="center" style="margin:0; padding:0; line-height:normal;">
                    <font style="font-size:10pt">
                        <span style="mso-spacerun:yes">
                            <font face="Arial" color="#FFFFFF">Copyright&nbsp; 2010</font>
                            <b><font face="Arial" color="#365669">
                                <a href="/arville/kpluz0/home-mapeh.php"><font color="#FFFFFF">KPluz.com</font></a>
                            </font></b>
                            <font face="Arial" color="#FFFFFF">. All Rights Reserved.</font>
                        </span>
                    </font>
                </p>
            </td>
        </tr>
    </table>
</div>

</body>
</html>