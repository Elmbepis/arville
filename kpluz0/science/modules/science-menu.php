<?php
// Unified Science menu for grades 0-10 – built from database
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

// Fetch modules for this grade and subject (Science)
$subject = 'science';
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

// Science-specific section header images (ALL ABSOLUTE)
$sectionHeaders = [
    'life-living'         => '/arville/kpluz0/science/images/topics-life-living.jpg',
    'human-body'          => '/arville/kpluz0/science/images/topics-human-body.jpg',
    'matter'              => '/arville/kpluz0/science/images/topics-matter.jpg',
    'force-motion'        => '/arville/kpluz0/science/images/topics-force-motion.jpg',
    'energy-work-power'   => '/arville/kpluz0/science/images/topics-energy-work-power.jpg',
    'earth-space'         => '/arville/kpluz0/science/images/topics-earth-space.jpg',
    'environment'         => '/arville/kpluz0/science/images/topics-environment.jpg',
    'others'              => '/arville/kpluz0/science/images/topics-others.jpg',
    'problems-science'    => '/arville/kpluz0/science/images/topics-problems-science.jpg',
    'problems-chem'       => '/arville/kpluz0/science/images/topics-problems-chem.jpg',
    'problems-physics'    => '/arville/kpluz0/science/images/topics-problems-physics.jpg',
];

// Top banner – grade-specific: grdX-top.jpg (ALL ABSOLUTE)
$topBanner = '/arville/kpluz0/science/images/grd' . $grade . '-top.jpg';
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $topBanner)) {
    $topBanner = '/arville/kpluz0/science/images/grd-top.jpg'; // fallback
}

// Background and layout images (ALL ABSOLUTE)
$leftBg    = '/arville/kpluz0/science/images/main-left.jpg';
$contentBg = '/arville/kpluz0/science/images/main-content.jpg';
$rightBg   = '/arville/kpluz0/science/images/main-right.jpg';
$bottomImg = '/arville/kpluz0/science/images/main-bottom.jpg';

// Top row icons (ALL ABSOLUTE)
$reportCard = '/arville/kpluz0/science/images/report-carda.jpg';
$reportCardHover = '/arville/kpluz0/science/images/report-cardb.jpg';
$tutorials = '/arville/kpluz0/science/images/tutorialsa.jpg';
$tutorialsHover = '/arville/kpluz0/science/images/tutorialsb.jpg';
$experiments = '/arville/kpluz0/science/images/exptsa.jpg';
$experimentsHover = '/arville/kpluz0/science/images/exptsb.jpg';
$videos = '/arville/kpluz0/science/images/videosa.jpg';
$videosHover = '/arville/kpluz0/science/images/videosb.jpg';

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Grade <?= $grade ?> Science Excellence Program - SciencePluz.com</title>
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
    </style>
    <script>
        // FP_* functions for rollover images
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
                '<?= $tutorialsHover ?>',
                '<?= $experimentsHover ?>',
                '<?= $videosHover ?>'
            );
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
                    <!-- Top banner – no bottom padding to avoid white gap -->
                    <tr>
                        <td valign="top" style="line-height:0; font-size:0; padding-top:10px; padding-left:0; padding-right:0; padding-bottom:0; margin:0;">
                            <img border="0" src="<?= $topBanner ?>" alt="Grade <?= $grade ?> Science" style="display:block; width:100%;">
                        </td>
                    </tr>
                    <!-- Main menu -->
                    <tr>
                        <td style="padding:0; margin:0;">
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table62" style="margin:0; padding:0; border-collapse:collapse;">
                                <tr>
                                    <td width="74" background="<?= $leftBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0;">&nbsp;</td>
                                    <!-- Content background – now with top padding -->
                                    <td background="<?= $contentBg ?>" valign="top" width="656" style="padding-top:40px; padding-left:0; padding-right:0; padding-bottom:0; margin:0; line-height:normal;" class="content-table">
                                        <div align="center" style="padding:0; margin:0;">
                                            <table border="0" width="585" cellspacing="0" cellpadding="0" id="table114" style="margin:0; padding:0; border-collapse:collapse;">
                                                <!-- Empty row (kept for layout consistency) -->
                                                <tr><td colspan="3" style="padding:0; margin:0;">&nbsp;</td></tr>
                                                <!-- Top icons row -->
                                                <tr>
                                                    <td colspan="3" style="padding:0; margin:0;">
                                                        <div align="center" style="padding:0; margin:0;">
                                                            <table border="0" width="585" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                                                                <tr>
                                                                    <td width="146" align="center" style="padding:0; margin:0;">
                                                                        <p style="margin:0; padding:0; line-height:normal;">
                                                                            <a href="/arville/kpluz0/science/SP-report-card.php">
                                                                                <img border="0" id="reportcard-home1" src="<?= $reportCard ?>" 
                                                                                     onmouseover="FP_swapImg(1,0,'reportcard-home1','<?= $reportCardHover ?>')" 
                                                                                     onmouseout="FP_swapImg(0,0,'reportcard-home1','<?= $reportCard ?>')" style="display:inline-block;">
                                                                            </a>
                                                                        </p>
                                                                    </td>
                                                                    <td width="146" align="center" style="padding:0; margin:0;">
                                                                        <p style="margin:0; padding:0; line-height:normal;">
                                                                            <a href="/arville/kpluz0/science/tutorials/tutorials0.php">
                                                                                <img border="0" id="tutorials-home3" src="<?= $tutorials ?>" 
                                                                                     onmouseover="FP_swapImg(1,0,'tutorials-home3','<?= $tutorialsHover ?>')" 
                                                                                     onmouseout="FP_swapImg(0,0,'tutorials-home3','<?= $tutorials ?>')" style="display:inline-block;">
                                                                            </a>
                                                                        </p>
                                                                    </td>
                                                                    <td width="146" align="center" style="padding:0; margin:0;">
                                                                        <p style="margin:0; padding:0; line-height:normal;">
                                                                            <a href="/arville/kpluz0/science/experiments/experiments.php">
                                                                                <img border="0" id="expts-home3" src="<?= $experiments ?>" 
                                                                                     onmouseover="FP_swapImg(1,0,'expts-home3','<?= $experimentsHover ?>')" 
                                                                                     onmouseout="FP_swapImg(0,0,'expts-home3','<?= $experiments ?>')" style="display:inline-block;">
                                                                            </a>
                                                                        </p>
                                                                    </td>
                                                                    <td width="147" align="center" style="padding:0; margin:0;">
                                                                        <p style="margin:0; padding:0; line-height:normal;">
                                                                            <a href="/arville/kpluz0/videos/kpluz-vids-science-0-2.php">
                                                                                <img border="0" id="videos-home4" src="<?= $videos ?>" 
                                                                                     onmouseover="FP_swapImg(1,0,'videos-home4','<?= $videosHover ?>')" 
                                                                                     onmouseout="FP_swapImg(0,0,'videos-home4','<?= $videos ?>')" style="display:inline-block;">
                                                                            </a>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Spacer row below icons -->
                                                <tr>
                                                    <td colspan="3" style="height:20px; line-height:0;">&nbsp;</td>
                                                </tr>

                                                <?php
                                                foreach ($sections as $sectionName => $sectionData):
                                                    $modules = $sectionData['modules'];
                                                    $headerImg = $sectionHeaders[$sectionName] ?? '/arville/kpluz0/science/images/topics-generic.jpg';
                                                ?>
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
                                                            <td width="208" align="center" valign="top" style="padding:0; margin:0;">
                                                                <p style="margin:0 0 25px 0; padding:0; line-height:normal;">
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
                                                            <td width="208" align="center" valign="top" style="padding:0; margin:0;">&nbsp;</td>
                                                        <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </tr>
                                                    <?php endfor; ?>
                                                <?php endforeach; ?>

                                                <!-- Matatag mapping -->
                                                <tr>
                                                    <td colspan="3" align="center" style="padding:15px 0 5px 0; margin:0;">
                                                        <a href="/arville/kpluz0/matatag-mapping.php?subject=science&grade=<?= $grade ?>">
                                                            <img border="0" src="/arville/kpluz0/images/matatag.jpg" style="display:inline-block;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td width="70" background="<?= $rightBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0;">&nbsp;</td>
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
                                <a href="/arville/kpluz0/home-science.php"><font color="#FFFFFF">KPluz.com</font></a>
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