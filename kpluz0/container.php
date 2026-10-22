<?php
// container.php – shared layout, no session handling

function render_header($page_title = 'EnglishPluz', $page_heading = '', $theme_images = []) {
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
            background-size: 100% 100%;
            height: 80px;
        }
        .title-area table { width: 100%; height: 100%; }
        .title-area .title-text {
            text-align: center;
            font-size: 17pt;
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

        /* ===== UNIFORM TEXT CHOICE BUTTONS ===== */
        .choices-row {
            --choice-width: 12em;
            display: flex;
            justify-content: center;
            align-items: stretch;
            flex-wrap: wrap;
            gap: 25px;
            margin: 20px 0;
        }
        .choice-btn {
            width: var(--choice-width);
            max-width: 100%;
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f0f0f0;
            border: 2px solid #ccc;
            border-radius: 12px;
            padding: 15px 25px;
            font-size: 1.3rem;
            font-weight: bold;
            color: #0000BB;
            text-decoration: none;
            text-align: center;
            white-space: nowrap;
            box-sizing: border-box;
            transition: background 0.15s, border-color 0.15s;
        }
        .choice-btn:hover {
            background: #f8f8ff;
            border-color: #8080ff;
        }

        /* ===== FREE-TEXT MODULE ANSWER BUTTONS =====
           Vertical spacing around the Submit1/Submit2 button pair.
           Applies ONLY on modules that render both buttons. The ~ selector
           handles an optional spacer element between the two inputs. */
        input[name='Submit1'],
        input[name='Submit1'] ~ input[name='Submit2'] {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* ===== IMAGE CHOICE BUTTONS (visual comparison modules) ===== */
        .image-choices-row {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px 0;
        }
        .image-choice {
            display: inline-block;
            padding: 5px;
            border-radius: 8px;
            transition: background 0.15s;
            text-decoration: none;
        }
        .image-choice:hover {
            background: rgba(0, 0, 0, 0.05);
        }
        .image-choice img {
            display: block;
            border: 0;
            max-width: 100%;
            height: auto;
        }
        .feedback-arrow {
            height: 40px;
            margin-right: 5px;
            vertical-align: middle;
        }

        /* ===== FREE-TEXT ANSWER INPUT ===== */
        .answer-input {
            display: inline-block;
            text-align: center;
            height: 38px;
            font-weight: bold;
            font-size: 24px;
            padding: 2px 10px;
            border: 2px solid #ccc;
            border-radius: 8px;
            background: #fff;
            box-sizing: border-box;
            margin: 10px 0;
        }
        .answer-input:focus {
            outline: none;
            border-color: #8080ff;
            background: #f8f8ff;
        }

        /* ===== ARITHMETIC EQUATION DISPLAY (addition / subtraction) ===== */
        .equation-card {
            display: inline-block;
            background: linear-gradient(135deg, #fafaff 0%, #f0f0ff 100%);
            border: 2px solid #d0d0e8;
            border-radius: 16px;
            padding: 25px 40px;
            margin: 15px auto 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }
        .equation-card.correct {
            border-color: #4caf50;
            background: linear-gradient(135deg, #f4fbf4 0%, #e8f5e9 100%);
        }
        .equation-card.wrong {
            border-color: #e53935;
            background: linear-gradient(135deg, #fdf5f5 0%, #fde8e8 100%);
        }
        .equation-inline {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-family: 'Comic Sans MS', 'Segoe UI', sans-serif;
            font-size: 32pt;
            font-weight: 700;
            color: #800080;
            flex-wrap: wrap;
        }
        .equation-inline .op {
            color: #CC0066;
        }
        .equation-inline input {
            font-family: 'Comic Sans MS', 'Segoe UI', sans-serif;
            font-size: 28pt;
            font-weight: 700;
            text-align: center;
            color: #0000CC;
            height: 62px;
            padding: 0 8px;
            border: 2px solid #b0b0d8;
            border-radius: 10px;
            background: #fff;
            box-sizing: border-box;
            vertical-align: middle;
        }
        .equation-inline input:focus {
            outline: none;
            border-color: #8080ff;
            background: #f8f8ff;
        }
        .equation-vertical {
            border-collapse: collapse;
            margin: 0 auto;
            font-family: 'Comic Sans MS', 'Segoe UI', sans-serif;
            font-size: 28pt;
            font-weight: 700;
            color: #800080;
        }
        .equation-vertical td {
            padding: 3px 8px;
            line-height: 1.15;
            vertical-align: middle;
        }
        .equation-vertical .num {
            text-align: right;
            white-space: nowrap;
        }
        .equation-vertical .op {
            text-align: left;
            color: #CC0066;
            white-space: nowrap;
        }
        .equation-vertical .rule {
            border-top: 3px solid #800080;
            padding: 0;
            height: 0;
            line-height: 0;
        }
        .equation-vertical input {
            font-family: 'Comic Sans MS', 'Segoe UI', sans-serif;
            font-size: 26pt;
            font-weight: 700;
            text-align: right;
            color: #0000CC;
            height: 52px;
            padding: 0 8px;
            border: 2px solid #b0b0d8;
            border-radius: 8px;
            background: #fff;
            box-sizing: border-box;
        }
        .equation-vertical input:focus {
            outline: none;
            border-color: #8080ff;
            background: #f8f8ff;
        }

        /* ===== IMAGE GRID (counting-style displays) ===== */
        .image-grid {
            text-align: center;
            margin: 20px 0;
            line-height: 1.1;
        }
        .image-grid img {
            display: inline-block;
            vertical-align: middle;
            border: 0;
            max-width: 100%;
            height: auto;
            margin: 1px;
        }

        /* ===== PATTERN DISPLAY (inline images within text) ===== */
        .pattern-display {
            text-align: center;
            margin: 15px 0;
            line-height: 1.4;
        }
        .pattern-display img {
            display: inline-block;
            vertical-align: middle;
            margin: 0 2px;
            border: 0;
            max-width: 100%;
            height: auto;
        }

        /* ===== SCORE BOX ===== */
        .score-box {
            text-align: center;
            margin: 0 auto 40px auto;
        }
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
            .title-area .title-text { font-size: 14pt; }
            .score-box .score-top { width: 80px; height: 60px; background-size: contain; }
            .score-box .score-bottom { width: 80px; height: 45px; font-size: 18pt; background-size: contain; }
        }
        ";
        ?>
        </style>
        <script>
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
                    <a href="/arville/kpluz0/math/modules/math-menu.php">
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


function render_choices($choices, $param = 'ansclick', $format = 'ucwords') {
    if (empty($choices) || !is_array($choices)) return;

    $maxLen = 0;
    foreach ($choices as $c) {
        $len = function_exists('mb_strlen')
            ? mb_strlen((string)$c, 'UTF-8')
            : strlen((string)$c);
        if ($len > $maxLen) $maxLen = $len;
    }
    $widthEm = round(0.62 * $maxLen + 3.2, 2);

    echo '<div class="choices-row" style="--choice-width: ' . $widthEm . 'em;">';
    foreach ($choices as $c) {
        $label = ($format === 'ucwords') ? ucwords($c) : $c;
        echo '<a href="?' . htmlspecialchars($param) . '=' . urlencode($c) . '" class="choice-btn">'
           . htmlspecialchars($label)
           . '</a>';
    }
    echo '</div>';
}


function render_image_choices($items, $param = 'ansclick') {
    if (empty($items) || !is_array($items)) return;
    echo '<div class="image-choices-row">';
    foreach ($items as $item) {
        $value = (string)($item['value'] ?? '');
        $image = htmlspecialchars((string)($item['image'] ?? ''));
        $alt   = htmlspecialchars((string)($item['alt'] ?? ''));
        echo '<a href="?' . htmlspecialchars($param) . '=' . urlencode($value) . '" class="image-choice">'
           . '<img src="' . $image . '" alt="' . $alt . '">'
           . '</a>';
    }
    echo '</div>';
}


function render_image_feedback($items, $arrowImage, $correctValue) {
    if (empty($items) || !is_array($items)) return;
    $correctValue = (string)$correctValue;
    echo '<div class="image-choices-row">';
    foreach ($items as $item) {
        $value = (string)($item['value'] ?? '');
        $image = htmlspecialchars((string)($item['image'] ?? ''));
        $alt   = htmlspecialchars((string)($item['alt'] ?? ''));
        if ($value === $correctValue) {
            echo '<img src="' . htmlspecialchars($arrowImage) . '" class="feedback-arrow" alt="correct">';
        }
        echo '<img src="' . $image . '" alt="' . $alt . '">';
    }
    echo '</div>';
}


function render_image_grid($imagePaths, $perRow = 5) {
    if (empty($imagePaths) || !is_array($imagePaths)) return;
    $perRow = max(1, (int)$perRow);
    echo '<div class="image-grid">';
    foreach ($imagePaths as $i => $path) {
        echo '<img src="' . htmlspecialchars($path) . '" alt="">';
        if (($i + 1) % $perRow === 0) echo '<br>';
    }
    echo '</div>';
}