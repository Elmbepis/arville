<?php
// container.php – shared layout, no session handling

function render_header($page_title = 'EnglishPluz', $page_heading = '', $theme_images = []) {
    // Session must be started by the caller – we just ensure score exists
    if (isset($_SESSION) && !isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }

    $defaults = [
        'top_banner'    => '/arville/kpluz0/English/images/ex-23-top.jpg',
        'title_bg'      => '/arville/kpluz0/English/images/ex-23-top2.jpg',
        'left_side'     => '/arville/kpluz0/English/images/ex-23-left.jpg',
        'right_side'    => '/arville/kpluz0/English/images/ex-23-right.jpg',
        'content_bg'    => '/arville/kpluz0/English/images/ex-23-content.jpg',
        'bottom_banner' => '/arville/kpluz0/English/images/ex-23-bottom.jpg',
        'score_top'     => '/arville/kpluz0/English/images/score-top-3.jpg',
        'score_bottom'  => '/arville/kpluz0/English/images/score-bottom-3.jpg',
    ];
    $theme = array_merge($defaults, $theme_images);
    $GLOBALS['_theme'] = $theme;

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($page_title); ?></title>
        <style>
        <?php
        // ===== CSS as a double&#8209;quoted string (no heredoc) =====
        echo "
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: url('/arville/kpluz0/images/bluetop-bg.jpg') repeat-x top left !important;
            padding-top: 15px;
            line-height: 1.4;
        }
        .main-wrapper { max-width: 900px; margin: 0 auto; padding: 0 10px; }
        .header-table {
            width: 900px;
            margin: 0 auto;
            border-collapse: collapse;
            background: transparent !important;
        }
        .header-table td {
            padding: 0;
            vertical-align: top;
            background: transparent !important;
        }
        .header-table img { display: block; border: 0; }
        .module-theme { width: 800px; margin: 0 auto; border-collapse: collapse; }
        .module-theme td { padding: 0; vertical-align: top; }
        .top-banner { padding: 0; line-height: 0; }
        .top-banner img { display: block; margin: 0; border: 0; }
        .title-area {
            background: url('{$theme['title_bg']}') repeat-x top;
            height: 80px;
        }
        .title-area table { width: 100%; height: 100%; }
        .title-area .title-text {
            text-align: center;
            font-size: 22pt;
            font-weight: 700;
            color: #CC0066;
            font-family: Verdana;
            vertical-align: middle;
        }
        .title-area .title-text .blue { color: #0000CC; }
        .title-area .title-text .red { color: #CC0066; }
        .content-wrapper {
            width: 800px;
            border-collapse: collapse;
            table-layout: fixed;
        }
        .content-wrapper .side-left {
            width: 75px;
            background: url('{$theme['left_side']}') repeat-y top left;
            min-height: 34px;
            height: 100%;
            overflow: hidden;
        }
        .content-wrapper .side-right {
            width: 70px;
            background: url('{$theme['right_side']}') repeat-y top right;
            min-height: 34px;
            height: 100%;
            overflow: hidden;
        }
        .content-wrapper .content-bg {
            width: 655px;
            background: url('{$theme['content_bg']}') repeat-y top left;
            overflow: hidden;
        }
        .module-output { width: 100%; padding: 15px 20px; }
        .difficulty { text-align: center; margin: 15px 0; }
        .difficulty label { margin: 0 10px; font-weight: bold; cursor: pointer; font-size: 10pt; color: #000080; }
        .difficulty input[type='radio'] { margin-right: 4px; }
        .score-box { text-align: center; margin: 0 auto; }
        .score-box table { margin: 0 auto; border-collapse: collapse; }
        .score-box .score-top {
            background: url('{$theme['score_top']}') no-repeat center;
            width: 114px;
            height: 85px;
        }
        .score-box .score-bottom {
            background: url('{$theme['score_bottom']}') no-repeat center;
            width: 114px;
            height: 60px;
            font-size: 22pt;
            font-weight: 700;
            color: #800080;
            text-align: center;
            vertical-align: middle;
            font-family: 'Comic Sans MS', sans-serif;
        }
        .footer { background: #0086CE; text-align: center; padding: 5px 0; width: 800px; margin: 10px auto 0; }
        .footer font { font-size: 10pt; color: #FFFFFF; font-family: Arial; }
        .footer a { color: #FFFFFF; text-decoration: none; }
        .bottom-banner {
            padding: 0;
            line-height: 0;
            margin-top: 15px;
        }
        .bottom-banner img {
            display: block;
            margin: 0 auto;
            border: 0;
            max-width: 100%;
            height: auto;
        }
        @media (max-width: 820px) {
            .header-table { width: 100%; }
            .module-theme, .content-wrapper, .footer { width: 100%; }
            .top-banner img, .bottom-banner img { max-width: 100%; height: auto; }
            .content-wrapper .side-left { width: 20px; }
            .content-wrapper .side-right { width: 20px; }
            .content-wrapper .content-bg { width: auto; padding: 0; }
            .module-output { padding: 10px; }
            .title-area .title-text { font-size: 18pt; }
            .score-box .score-top { width: 80px; height: 60px; background-size: contain; }
            .score-box .score-bottom { width: 80px; height: 45px; font-size: 18pt; background-size: contain; }
        }
        ";
        ?>
        </style>
        <script>
            // FP_* functions (identical to original)
            function FP_swapImg() {
                var doc = document, args = arguments, elm, n;
                doc.$imgSwaps = new Array();
                for (n = 2; n < args.length; n += 2) {
                    elm = FP_getObjectByID(args[n]);
                    if (elm) {
                        doc.$imgSwaps[doc.$imgSwaps.length] = elm;
                        elm.$src = elm.src;
                        elm.src = args[n + 1];
                    }
                }
            }
            function FP_preloadImgs() {
                var d = document, a = arguments;
                if (!d.FP_imgs) d.FP_imgs = new Array();
                for (var i = 0; i < a.length; i++) {
                    d.FP_imgs[i] = new Image();
                    d.FP_imgs[i].src = a[i];
                }
            }
            function FP_getObjectByID(id, o) {
                var c, el, els, f, m, n;
                if (!o) o = document;
                if (o.getElementById) el = o.getElementById(id);
                else if (o.layers) c = o.layers;
                else if (o.all) el = o.all[id];
                if (el) return el;
                if (o.id == id || o.name == id) return o;
                if (o.childNodes) c = o.childNodes;
                if (c)
                    for (n = 0; n < c.length; n++) {
                        el = FP_getObjectByID(id, c[n]);
                        if (el) return el;
                    }
                f = o.forms;
                if (f)
                    for (n = 0; n < f.length; n++) {
                        els = f[n].elements;
                        for (m = 0; m < els.length; m++) {
                            el = FP_getObjectByID(id, els[n]);
                            if (el) return el;
                        }
                    }
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
            };
        </script>
    </head>
    <body>
    <div class="main-wrapper">

        <!-- ===== HEADER ===== -->
        <table class="header-table" cellspacing="0" cellpadding="0">
            <tr>
                <td width="193" height="100" valign="top">
                    <a href="/arville/kpluz0/app/menu.php">
                        <img src="/arville/kpluz0/images/header-logo.jpg" alt="KPluz Logo">
                    </a>
                </td>
                <td width="133" valign="top">
                    <a href="/arville/kpluz0/how-to-use-kpluz.php">
                        <img id="img1" src="/arville/kpluz0/images/header1a.jpg"
                             onmouseover="FP_swapImg(1,0,'img1','/arville/kpluz0/images/header1b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img1','/arville/kpluz0/images/header1a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img1','/arville/kpluz0/images/header1c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img1','/arville/kpluz0/images/header1b.jpg')">
                    </a>
                </td>
                <td width="133" valign="top">
                    <a href="/arville/kpluz0/bluebars_student.php">
                        <img id="img2" src="/arville/kpluz0/images/header2a.jpg"
                             onmouseover="FP_swapImg(1,0,'img2','/arville/kpluz0/images/header2b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img2','/arville/kpluz0/images/header2a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img2','/arville/kpluz0/images/header2c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img2','/arville/kpluz0/images/header2b.jpg')">
                    </a>
                </td>
                <td width="133" valign="top">
                    <a href="/arville/kpluz0/programs.php">
                        <img id="img3" src="/arville/kpluz0/images/header3a.jpg"
                             onmouseover="FP_swapImg(1,0,'img3','/arville/kpluz0/images/header3b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img3','/arville/kpluz0/images/header3a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img3','/arville/kpluz0/images/header3c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img3','/arville/kpluz0/images/header3b.jpg')">
                    </a>
                </td>
                <td width="134" valign="top">
                    <a href="/arville/kpluz0/community.php">
                        <img id="img4" src="/arville/kpluz0/images/header4a.jpg"
                             onmouseover="FP_swapImg(1,0,'img4','/arville/kpluz0/images/header4b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img4','/arville/kpluz0/images/header4a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img4','/arville/kpluz0/images/header4c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img4','/arville/kpluz0/images/header4b.jpg')">
                    </a>
                </td>
                <td width="134" valign="top">
                    <a href="/arville/kpluz0/contact.php">
                        <img id="img5" src="/arville/kpluz0/images/header5a.jpg"
                             onmouseover="FP_swapImg(1,0,'img5','/arville/kpluz0/images/header5b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img5','/arville/kpluz0/images/header5a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img5','/arville/kpluz0/images/header5c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img5','/arville/kpluz0/images/header5b.jpg')">
                    </a>
                </td>
                <td width="134" valign="top">
                    <a href="/arville/kpluz0/logout.php">
                        <img id="img6" src="/arville/kpluz0/images/header6a.jpg"
                             onmouseover="FP_swapImg(1,0,'img6','/arville/kpluz0/images/header6b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img6','/arville/kpluz0/images/header6a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img6','/arville/kpluz0/images/header6c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img6','/arville/kpluz0/images/header6b.jpg')">
                    </a>
                </td>
            </tr>
        </table>

        <!-- ===== MODULE THEME ===== -->
        <table class="module-theme" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table class="module-theme" cellspacing="0" cellpadding="0">
                        <tr><td class="top-banner">
                            <img src="<?php echo $theme['top_banner']; ?>" alt="">
                        </td></tr>
                        <tr><td class="title-area">
                            <table cellspacing="0" cellpadding="0" style="width:100%; height:100%;">
                                <tr>
                                    <td style="width:111px;">&nbsp;</td>
                                    <td class="title-text"><?php echo $page_heading; ?></td>
                                    <td style="width:103px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="content-wrapper" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="side-left" valign="top">&nbsp;</td>
                            <td class="content-bg" valign="top">
                                <div class="module-output">
    <?php
    // Module content goes here
}
// =========== END OF render_header() ===========


function render_footer() {
    ?>
                                </div> <!-- /.module-output -->

                                <div class="bottom-banner">
                                    <img src="<?php echo $GLOBALS['_theme']['bottom_banner']; ?>" alt="">
                                </div>

                            </td> <!-- /.content-bg -->
                            <td class="side-right" valign="top">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="footer">
            <font style="font-size:10pt; color:#FFFFFF; font-family:Arial;">
                Copyright&nbsp; 2010
                <b><a href="/arville/kpluz0/home-english.php" style="color:#FFFFFF; text-decoration:none;">KPluz.com</a></b>
                . All Rights Reserved.
            </font>
        </div>

    </div>
    </body>
    </html>
    <?php
}


function render_score_box($score_top_img = null, $score_bottom_img = null) {
    $theme = $GLOBALS['_theme'] ?? [];
    $top = $score_top_img ?? ($theme['score_top'] ?? '/arville/kpluz0/English/images/score-top-3.jpg');
    $bottom = $score_bottom_img ?? ($theme['score_bottom'] ?? '/arville/kpluz0/English/images/score-bottom-3.jpg');
    ?>
    <div class="score-box">
        <table cellspacing="0" cellpadding="0">
            <tr><td class="score-top" style="background-image: url('<?php echo $top; ?>');">&nbsp;</td></tr>
            <tr><td class="score-bottom" style="background-image: url('<?php echo $bottom; ?>');">
                <span style="position:relative; top:-10px;"><?php echo $_SESSION['score'] ?? 0; ?></span>
            </td></tr>
        </table>
    </div>
    <?php
}