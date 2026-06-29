<?php
// Unified Math menu for grades 0-10 – built from database
session_name('KPLUZ_SESSION');
session_start();

// Check login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}

$grade = (int)($_SESSION['user_grade'] ?? 0);
if ($grade < 0 || $grade > 10) $grade = 0;

// Determine if we use high school (grades 7-10) or elementary (0-6) images
$isHS = ($grade >= 7);

// Database connection
$db = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

// Fetch modules for this grade and subject (Math)
$subject = 'math';
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
// SECTION HEADER MAPPINGS (both elementary and high school)
// ============================================================
$sectionHeaders = [
    // ========== ELEMENTARY SECTIONS (Grades 0–6) ==========
    'cognitive'            => '/arville/kpluz0/math/images/images/topics-cognitive.jpg',       // ADDED
    'counting-arithmetic'  => '/arville/kpluz0/math/images/images/topics-counting-arithmetic.jpg', // ADDED
    'arithmetic'           => '/arville/kpluz0/math/images/images/topics-arithmetic.jpg',
    'number-relationships' => '/arville/kpluz0/math/images/images/topics-number-relationships.jpg',
    'fractions'            => '/arville/kpluz0/math/images/images/topics-fractions.jpg',
    'decimals'             => '/arville/kpluz0/math/images/images/topics-decimals.jpg',
    'number-conversions'   => '/arville/kpluz0/math/images/images/topics-number-conv.jpg',
    'time-money'           => '/arville/kpluz0/math/images/images/topics-time-money.jpg',
    'geometry-measurement' => '/arville/kpluz0/math/images/images/topics-geometry-measurement.jpg',
    'sets'                 => '/arville/kpluz0/math/images/images/topics-sets.jpg',
    'statistics'           => '/arville/kpluz0/math/images/topics-stat-prob-elem.jpg',
    'algebra'              => '/arville/kpluz0/math/images/images/topics-algebra.jpg',
    'problem-solving'      => '/arville/kpluz0/math/images/images/topics-problem-solving.jpg',

    // ========== HIGH SCHOOL SECTIONS (Grades 7–10) ==========
    // Number Sense & Measurement
    'number-sense'         => '/arville/kpluz0/math/images/topics-number-sense.jpg',
    'measurement'          => '/arville/kpluz0/math/images/topics-measurement.jpg',

    // Algebra & Expressions
    'algebraic-expressions'=> '/arville/kpluz0/math/images/topics-alg-exp.jpg',
    'polynomials'          => '/arville/kpluz0/math/images/topics-polynomials.jpg',
    'solving-equations'    => '/arville/kpluz0/math/images/topics-solving-equations.jpg',
    'solving-equations-ineq' => '/arville/kpluz0/math/images/topics-solving-eq-ineq.jpg',
    'equations-functions'  => '/arville/kpluz0/math/images/topics-equations-functions.jpg',
    'progression'          => '/arville/kpluz0/math/images/topics-progression.jpg',
    'alg-special'          => '/arville/kpluz0/math/images/topics-alg-special.jpg',
    
    // Lines & Functions (Grade 10)
    'lines'                => '/arville/kpluz0/math/images/topics-lines.jpg',
    'functions'            => '/arville/kpluz0/math/images/topics-functions.jpg',

    // Geometry
    'intro-geometry'       => '/arville/kpluz0/math/images/topics-intro-geom.jpg',
    'angles'               => '/arville/kpluz0/math/images/topics-angles.jpg',
    'shapes-solids'        => '/arville/kpluz0/math/images/topics-shapes-solids.jpg',
    'axiomatic-geometry'   => '/arville/kpluz0/math/images/topics-ax-an-geom.jpg',
    'triangle-congruence'  => '/arville/kpluz0/math/images/topics-triangle-congruence.jpg',
    'tri-quad'             => '/arville/kpluz0/math/images/topics-tri-quad.jpg',
    'circles-conics'       => '/arville/kpluz0/math/images/topics-circles.jpg',

    // Trigonometry
    'trig-functions'       => '/arville/kpluz0/math/images/topics-trigo-functions.jpg',
    'trig-identities'      => '/arville/kpluz0/math/images/topics-trigo-identities.jpg',
    'trigo'                => '/arville/kpluz0/math/images/topics-trigo.jpg',

    // Logarithms & Calculus (Grade 10)
    'logarithms'           => '/arville/kpluz0/math/images/topics-log.jpg',
    'calculus'             => '/arville/kpluz0/math/images/topics-calculus.jpg',

    // Statistics, Probability & Logic
    'stat-prob'            => '/arville/kpluz0/math/images/topics-stat-prob.jpg',
    'logic'                => '/arville/kpluz0/math/images/topics-logic.jpg',

    // Word Problems
    'word-problems'        => '/arville/kpluz0/math/images/topics-word-problems1.jpg',
];

// ============================================================
// IMAGE PATHS (conditional for elementary vs high school)
// ============================================================
if ($isHS) {
    // High school image paths (grades 7-10)
    $topBanner = '/arville/kpluz0/math/images/math-menu-hs-' . $grade . '-top.jpg';
    $leftBg    = '/arville/kpluz0/math/images/math-menu-hs-left.jpg';
    $contentBg = '/arville/kpluz0/math/images/math-menu-hs-content.jpg';
    $rightBg   = '/arville/kpluz0/math/images/math-menu-hs-right.jpg';
    $bottomImg = '/arville/kpluz0/math/images/math-menu-hs-bottom.jpg';
    $reportCard = '/arville/kpluz0/math/modules/images/report-cardha.jpg';
    $reportCardHover = '/arville/kpluz0/math/modules/images/report-cardhb.jpg';
    $solvers = '/arville/kpluz0/math/modules/images/solversha.jpg';
    $solversHover = '/arville/kpluz0/math/modules/images/solvershb.jpg';
    $book = '/arville/kpluz0/math/images/bookhsa.jpg';
    $bookHover = '/arville/kpluz0/math/images/bookhsb.jpg';
    $videos = '/arville/kpluz0/math/images/videoshsa.jpg';
    $videosHover = '/arville/kpluz0/math/images/videoshsb.jpg';
    // Trivia and Games are NOT used for high school, but we keep the variables for preload (they won't be displayed)
    $trivia = '/arville/kpluz0/math/images/triviaa.jpg';
    $triviaHover = '/arville/kpluz0/math/images/triviab.jpg';
    $games = '/arville/kpluz0/math/images/gamesa.jpg';
    $gamesHover = '/arville/kpluz0/math/images/gamesb.jpg';
} else {
    // Elementary image paths (grades 0-6)
    $topBanner = '/arville/kpluz0/math/images/math-menu-' . $grade . '-top.jpg';
    $leftBg    = '/arville/kpluz0/math/images/math-menu-left.jpg';
    $contentBg = '/arville/kpluz0/math/images/math-menu-content.jpg';
    $rightBg   = '/arville/kpluz0/math/images/math-menu-right.jpg';
    $bottomImg = '/arville/kpluz0/math/images/math-menu-bottom.jpg';
    $reportCard = '/arville/kpluz0/math/modules/images/report-carda.jpg';
    $reportCardHover = '/arville/kpluz0/math/modules/images/report-cardb.jpg';
    $solvers = '/arville/kpluz0/math/modules/images/solversa.jpg';
    $solversHover = '/arville/kpluz0/math/modules/images/solversb.jpg';
    $book = '/arville/kpluz0/math/images/booka.jpg';
    $bookHover = '/arville/kpluz0/math/images/bookb.jpg';
    $videos = '/arville/kpluz0/math/images/videosa.jpg';
    $videosHover = '/arville/kpluz0/math/images/videosb.jpg';
    $trivia = '/arville/kpluz0/math/images/triviaa.jpg';
    $triviaHover = '/arville/kpluz0/math/images/triviab.jpg';
    $games = '/arville/kpluz0/math/images/gamesa.jpg';
    $gamesHover = '/arville/kpluz0/math/images/gamesb.jpg';
}

// Fallback for top banner if grade-specific not found
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $topBanner)) {
    $topBanner = $isHS ? '/arville/kpluz0/math/images/math-menu-hs-top.jpg' : '/arville/kpluz0/math/images/math-menu-top.jpg';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Grade <?= $grade ?> Math Skills Excellence Program - MathPluz.com</title>
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
            // Preload top row hover images
            <?php
            // Only preload the icons that are actually used
            echo "FP_preloadImgs('$reportCardHover','$solversHover','$bookHover','$videosHover'";
            if (!$isHS) {
                // For elementary, also preload trivia and games
                echo ",'$triviaHover','$gamesHover'";
            }
            echo ");";
            // Preload module hover images
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

<!-- HEADER (same for all grades) -->
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
                    <!-- Top banner – no bottom padding to avoid white gap -->
                    <tr>
                        <td valign="top" style="line-height:0; font-size:0; padding-top:10px; padding-left:0; padding-right:0; padding-bottom:0; margin:0;">
                            <img border="0" src="<?= $topBanner ?>" alt="Grade <?= $grade ?> Math" style="display:block; width:100%;">
                        </td>
                    </tr>
                    <!-- Main menu -->
                    <tr>
                        <td style="padding:0; margin:0;">
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table62" style="margin:0; padding:0; border-collapse:collapse;">
                                <tr>
                                    <td width="72" background="<?= $leftBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0;">&nbsp;</td>
                                    <!-- Content background – now with top padding -->
                                    <td background="<?= $contentBg ?>" valign="top" width="656" style="padding-top:20px; padding-left:0; padding-right:0; padding-bottom:0; margin:0; line-height:normal;" class="content-table">
                                        <div align="center" style="padding:0; margin:0;">
                                            <table border="0" width="585" cellspacing="0" cellpadding="0" id="table114" style="margin:0; padding:0; border-collapse:collapse;">
                                                <!-- Empty rows (kept for layout) -->
                                                <tr><td colspan="3" style="padding:0; margin:0;">&nbsp;</td></tr>
                                                <tr><td colspan="3" style="padding:0; margin:0;">&nbsp;</td></tr>
                                                <!-- Top icons row -->
                                                <tr>
                                                    <td colspan="3" style="padding:0; margin:0;">
                                                        <div align="center" style="padding:0; margin:0;">
                                                            <?php if ($isHS): ?>
                                                                <!-- HIGH SCHOOL: 4 icons in one row -->
                                                                <table border="0" width="500" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                                                                    <tr>
                                                                        <td width="25%" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/math/MP-report-card.php">
                                                                                    <img border="0" id="reportcard-home1" src="<?= $reportCard ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'reportcard-home1','<?= $reportCardHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'reportcard-home1','<?= $reportCard ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                        <td width="25%" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/math/solvers/solvers.php">
                                                                                    <img border="0" id="solvers-home4" src="<?= $solvers ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'solvers-home4','<?= $solversHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'solvers-home4','<?= $solvers ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                        <td width="25%" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/math/books/g<?= $grade ?>/<?= $grade ?>toc.php">
                                                                                    <img border="0" id="book-home7" src="<?= $book ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'book-home7','<?= $bookHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'book-home7','<?= $book ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                        <td width="25%" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/videos/kpluz-vids-math-7-10.php">
                                                                                    <img border="0" id="videos-home7" src="<?= $videos ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'videos-home7','<?= $videosHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'videos-home7','<?= $videos ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            <?php else: ?>
                                                                <!-- ELEMENTARY: 6 icons in two rows (3+3) -->
                                                                <table border="0" width="500" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border-collapse:collapse;">
                                                                    <tr>
                                                                        <td width="166" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/math/MP-report-card.php">
                                                                                    <img border="0" id="reportcard-home1" src="<?= $reportCard ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'reportcard-home1','<?= $reportCardHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'reportcard-home1','<?= $reportCard ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                        <td width="167" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/math/solvers/solvers.php">
                                                                                    <img border="0" id="solvers-home4" src="<?= $solvers ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'solvers-home4','<?= $solversHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'solvers-home4','<?= $solvers ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                        <td width="167" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/math/books/g<?= $grade ?>/<?= $grade ?>toc.php">
                                                                                    <img border="0" id="book-home7" src="<?= $book ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'book-home7','<?= $bookHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'book-home7','<?= $book ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="166" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/math/trivia/trivia.php">
                                                                                    <img border="0" id="trivia-home5" src="<?= $trivia ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'trivia-home5','<?= $triviaHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'trivia-home5','<?= $trivia ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                        <td width="167" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/math/games/games-elem.php">
                                                                                    <img border="0" id="games-home6" src="<?= $games ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'games-home6','<?= $gamesHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'games-home6','<?= $games ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                        <td width="167" align="center" style="padding:0; margin:0;">
                                                                            <p style="margin:0; padding:0; line-height:normal;">
                                                                                <a href="/arville/kpluz0/videos/kpluz-vids-math-3-6.php">
                                                                                    <img border="0" id="videos-home7" src="<?= $videos ?>" 
                                                                                         onmouseover="FP_swapImg(1,0,'videos-home7','<?= $videosHover ?>')" 
                                                                                         onmouseout="FP_swapImg(0,0,'videos-home7','<?= $videos ?>')" style="display:inline-block;">
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Spacer row below icons -->
                                                <tr>
                                                    <td colspan="3" style="height:20px; line-height:0;">&nbsp;</td>
                                                </tr>

                                                <?php
                                                // ============================================================
                                                // DYNAMIC MODULE SECTIONS
                                                // ============================================================
                                                foreach ($sections as $sectionName => $sectionData):
                                                    $modules = $sectionData['modules'];
                                                    $headerImg = $sectionHeaders[$sectionName] ?? '/arville/kpluz0/math/images/topics-generic.jpg';
                                                ?>
                                                    <!-- Section Header -->
                                                    <tr>
                                                        <td colspan="3" style="padding:0; margin:0;">
                                                            <p align="center" style="margin:30px 0 30px 0; padding:0; line-height:normal;">
                                                                <img border="0" src="<?= $headerImg ?>" style="display:inline-block;">
                                                            </p>
                                                        </td>
                                                    </tr>

                                                    <!-- Module rows (3 per row) -->
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
                                                        <a href="/arville/kpluz0/matatag-mapping.php?subject=math&grade=<?= $grade ?>">
                                                            <img border="0" src="/arville/kpluz0/images/matatag.jpg" style="display:inline-block;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td width="72" background="<?= $rightBg ?>" rowspan="2" style="padding:0; margin:0; line-height:0;">&nbsp;</td>
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
                                <a href="/arville/kpluz0/home-math.php"><font color="#FFFFFF">KPluz.com</font></a>
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