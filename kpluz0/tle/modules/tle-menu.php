<?php
// Unified TLE menu for grades 0-10 – built from database
session_name('KPLUZ_SESSION');
session_start();

// Check login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}

$displayGrade = (int)($_SESSION['user_grade'] ?? 0);
if ($displayGrade < 0 || $displayGrade > 10) $displayGrade = 0;

// Grade 10 uses Grade 9 content (modules and top banner)
$queryGrade = ($displayGrade == 10) ? 9 : $displayGrade;

// Database connection
$db = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

// Fetch modules for the query grade (9 for grade 10, otherwise display grade)
$subject = 'tle';
$sql = "SELECT * FROM modules 
        WHERE subject = ? AND grade = ? AND is_active = 1 
        ORDER BY section_order ASC, module_order ASC";
$stmt = $db->prepare($sql);
$stmt->bind_param("si", $subject, $queryGrade);
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

// TLE theme images (backgrounds, top banner) – in /TLE/images/
// Top banner uses the query grade (grade 9 for grade 10) to show "Grade 9/10" header
$imageBase = '/arville/kpluz0/TLE/images/';
$topBanner = $imageBase . 'grd' . $queryGrade . '-top.jpg';
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $topBanner)) {
    $topBanner = $imageBase . 'grd-top.jpg'; // fallback
}
$leftBg    = $imageBase . 'grd-left.jpg';
$contentBg = $imageBase . 'grd-content.jpg';
$rightBg   = $imageBase . 'grd-right.jpg';
$bottomImg = $imageBase . 'grd-bottom.jpg';

// All other TLE images (section headers, top-row icons, module icons) – in /TLE/modules/icons/
$iconBase = '/arville/kpluz0/TLE/modules/icons/';

// Section headers – map section names to header images
$sectionHeaders = [
    // ===== ELEMENTARY (Grades 4–6) =====
    'ict-entrep'  => $iconBase . 'note-ict-ent.jpg',
    'agriculture' => $iconBase . 'note-agriculture.jpg',
    'home-econ'   => $iconBase . 'note-home-econ.jpg',
    'ind-arts'    => $iconBase . 'note-ind-arts.jpg',

    // ===== HIGH SCHOOL (Grades 7–10) =====
    'ict'                 => $iconBase . 'note-ict.jpg',
    'cookery'             => $iconBase . 'note-cookery.jpg',
    'household-services'  => $iconBase . 'note-household-services.jpg',
    'handicraft'          => $iconBase . 'note-handicraft.jpg',
    'caregiving'          => $iconBase . 'note-caregiving.jpg',
    'aquaculture'         => $iconBase . 'note-aquaculture.jpg',
    'other-industries'    => $iconBase . 'note-other-ind.jpg',
    'food-processing'     => $iconBase . 'note-food-proc.jpg',
    'beauty-care'         => $iconBase . 'note-beauty-care.jpg',
    'general'             => $iconBase . 'note-general.jpg',
    'cookery2'            => $iconBase . 'note-cookery2.jpg',
    'needlecraft'         => $iconBase . 'note-needlecraft.jpg',
    'cookery3'            => $iconBase . 'note-cookery3.jpg',
    'plant-production'    => $iconBase . 'note-plant-prod.jpg',
    'food-preservation'   => $iconBase . 'note-food-pres.jpg',
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
    <title>TLE Online Program for Grade <?= $displayGrade ?> - KPluz.com</title>
    <link rel="stylesheet" href="/arville/kpluz0/app/css/style.css">
    <link rel="stylesheet" href="/arville/kpluz0/app/css/app.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            padding-top: 20px; /* shift page down */
            line-height: 1;
            background: url('/arville/kpluz0/images/bluetop-bg.jpg') repeat-x top left; /* horizontal only */
        }
        table, tr, td, div { margin: 0; padding: 0; line-height: 0; border-spacing: 0; border-collapse: collapse; }
        img { display: block; border: 0; }
        .content-table td { line-height: normal; padding: 0 5px; }
        .content-table p { line-height: normal; margin: 0; padding: 0; }
        .content-table img { display: inline-block; }
        .module-cell { width: 33%; padding: 0 4px; vertical-align: top; text-align: center; }
        .module-cell p { margin: 0 0 25px 0; }
        .module-cell img { max-width: 100%; height: auto; }
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
            FP_preloadImgs(
                '<?= $reportCardHover ?>',
                '<?= $videosHover ?>'
            );
            <?php
            $hoverImages = [];
            foreach ($sections as $section) {
                foreach ($section['modules'] as $mod) {
                    $hoverImages[] = $iconBase . $mod['image_hover'];
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
<body>
<!-- HTML background attribute removed – CSS handles it now -->

<!-- ===== HEADER TABLE ===== -->
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

<!-- ===== 25px SPACER (correct spacing) ===== -->
<div style="height:20px; line-height:25px; font-size:0;">&nbsp;</div>

<!-- ===== MAIN CONTENT ===== -->
<div align="center" style="margin:0; padding:0; line-height:0;">
    <table border="0" width="800" cellspacing="0" cellpadding="0" id="table7" style="margin:0; padding:0; border-collapse:collapse;">
        <tr>
            <td style="padding:0; margin:0;">
                <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table61" style="margin:0; padding:0; border-collapse:collapse;">
                    <!-- Top banner uses the query grade (grade 9 for grade 10) to show the correct "Grade 9/10" header -->
                    <tr>
                        <td valign="top" style="line-height:0; font-size:0; padding-top:10px; padding-left:0; padding-right:0; padding-bottom:0; margin:0;">
                            <img border="0" src="<?= $topBanner ?>" alt="TLE Program" style="display:block; width:100%;">
                        </td>
                    </tr>
                    <!-- Main menu -->
                    <tr>
                        <td style="padding:0; margin:0;">
                            <table border="0" width="800" cellspacing="0" cellpadding="0" id="table62" style="margin:0; padding:0; border-collapse:collapse;">
                                <tr>
                                    <td width="72" background="<?= $leftBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0; background-repeat: repeat-y;">&nbsp;</td>
                                    <td background="<?= $contentBg ?>" valign="top" width="656" style="padding-top:40px; padding-left:0; padding-right:0; padding-bottom:0; margin:0; line-height:normal;" class="content-table">
                                        <div align="center" style="padding:0; margin:0;">
                                            <table border="0" width="100%" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                                                <tr>
                                                    <td colspan="3" style="padding:0; margin:0;">
                                                        <div align="center" style="padding:0; margin:0;">
                                                            <p style="margin:0; padding:0; line-height:normal; display:inline-block;">
                                                                <a href="/arville/kpluz0/TLE/TLE-report-card.php">
                                                                    <img border="0" id="reportcardh-home1" src="<?= $reportCard ?>" 
                                                                         onmouseover="FP_swapImg(1,0,'reportcardh-home1','<?= $reportCardHover ?>')" 
                                                                         onmouseout="FP_swapImg(0,0,'reportcardh-home1','<?= $reportCard ?>')" style="display:inline-block; margin-right:30px;">
                                                                </a>
                                                                <a href="/arville/kpluz0/videos/kpluz-vids-epp.php">
                                                                    <img border="0" id="videos-home4" src="<?= $videos ?>" 
                                                                         onmouseover="FP_swapImg(1,0,'videos-home4','<?= $videosHover ?>')" 
                                                                         onmouseout="FP_swapImg(0,0,'videos-home4','<?= $videos ?>')" style="display:inline-block; margin-left:30px;">
                                                                </a>
                                                            </p>
                                                            <div style="height:20px;"></div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php
                                                foreach ($sections as $sectionName => $sectionData):
                                                    $modules = $sectionData['modules'];
                                                    $headerImg = $sectionHeaders[$sectionName] ?? $iconBase . 'note-others.jpg';
                                                ?>
                                                    <tr>
                                                        <td colspan="3" style="padding:0; margin:0;">
                                                            <p align="center" style="margin:30px 0 30px 0; padding:0; line-height:normal;">
                                                                <img border="0" src="<?= $headerImg ?>" style="display:inline-block;">
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="padding:0; margin:0;">
                                                            <table class="module-table" cellspacing="0" cellpadding="0" style="width:96%; margin:0 auto; border-collapse:collapse;">
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
                                                                            $imgNormal = $iconBase . $mod['image_normal'];
                                                                            $imgHover = $iconBase . $mod['image_hover'];
                                                                    ?>
                                                                        <td class="module-cell">
                                                                            <p>
                                                                                <a href="<?= htmlspecialchars($mod['url']) ?>">
                                                                                    <img border="0" id="<?= $imgId ?>" 
                                                                                         src="<?= htmlspecialchars($imgNormal) ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'<?= $imgId ?>','<?= htmlspecialchars($imgHover) ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'<?= $imgId ?>','<?= htmlspecialchars($imgNormal) ?>')" 
                                                                                         style="display:inline-block; max-width:100%;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td class="module-cell">&nbsp;</td>
                                                                    <?php endif; ?>
                                                                    <?php endfor; ?>
                                                                </tr>
                                                                <?php endfor; ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                                <tr>
                                                    <td colspan="3" align="center" style="padding:15px 0 5px 0; margin:0;">
                                                        <a href="/arville/kpluz0/matatag-mapping.php?subject=tle&grade=<?= $displayGrade ?>">
                                                            <img border="0" src="/arville/kpluz0/images/matatag.jpg" style="display:inline-block;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
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
                                <a href="/arville/kpluz0/home-tle.php"><font color="#FFFFFF">KPluz.com</font></a>
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