<?php
// container.php – shared layout, no session handling
// VERSION 9 — pick theme on menu-entry; keep for same-module requests

define('KPLUZ_CONTAINER_VERSION', '9');

function _math_theme_file_exists($fileName) {
    $fsPath = __DIR__ . '/math/images/images/' . $fileName;
    return is_file($fsPath) || file_exists($fsPath);
}

/**
 * Resolve a theme prefix to the actual filename prefix on disk.
 * Tries the dashed form (paper-69, wquiz-03) first, then the no-dash form
 * (paper69, wquiz03) as a fallback for themes that were uploaded without
 * the separator.
 */
function _math_theme_resolve_prefix($prefix, $slots) {
    $allOk = true;
    foreach ($slots as $slot) {
        if (!_math_theme_file_exists($prefix . '-' . $slot . '.jpg')) { $allOk = false; break; }
    }
    if ($allOk) return $prefix;

    if (preg_match('/^([A-Za-z]+)-(\d+)$/', $prefix, $m)) {
        $nodash = $m[1] . $m[2];
        $allOk = true;
        foreach ($slots as $slot) {
            if (!_math_theme_file_exists($nodash . '-' . $slot . '.jpg')) { $allOk = false; break; }
        }
        if ($allOk) return $nodash;
    }

    return null;
}

function _math_theme_missing($prefix, $slots) {
    $missing = [];
    foreach ($slots as $slot) {
        $fn = $prefix . '-' . $slot . '.jpg';
        if (!_math_theme_file_exists($fn)) $missing[] = $fn;
    }
    return $missing;
}

function _math_theme_build($prefix, $base) {
    return [
        'top_banner'    => $base . '/math/images/images/' . $prefix . '-top.jpg',
        'title_bg'      => $base . '/math/images/images/' . $prefix . '-top2.jpg',
        'left_side'     => $base . '/math/images/images/' . $prefix . '-left.jpg',
        'right_side'    => $base . '/math/images/images/' . $prefix . '-right.jpg',
        'content_bg'    => $base . '/math/images/images/' . $prefix . '-content.jpg',
        'bottom_banner' => $base . '/math/images/images/' . $prefix . '-bottom.jpg',
        'score_top'     => $base . '/math/images/score-top-1.jpg',
        'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
    ];
}

function _math_theme_pool() {
    $prefixes = ['paper-69', 'paper-70'];
    for ($i = 1; $i <= 15; $i++) {
        $prefixes[] = 'wquiz-' . str_pad($i, 2, '0', STR_PAD_LEFT);
    }
    return $prefixes;
}

function render_header($page_title = 'EnglishPluz', $page_heading = '', $theme_images = []) {
    if (isset($_SESSION) && !isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }

    // &#9472;&#9472; Dynamic base path — works in dev (/arville/kpluz0) and prod (/kpluz0) &#9472;&#9472;
    $base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

    // &#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;
    // SUBJECT-AWARE THEME RESOLUTION
    // &#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;
    // Math modules: theme picked when navigating from the menu (or any page
    // other than the current module). F5, Submit, New Question, and choice
    // clicks keep the theme because their referer points back to this module.
    //
    //   - Max 2 consecutive same-theme appearances across fresh picks.
    //   - Themes with missing files are excluded from the pool.
    //   - Version marker forces existing sessions to re-pick when logic changes.
    //
    // Non-Math: existing behaviour — passed $theme_images merged over defaults.
    // &#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;
    $scriptPath = $_SERVER['SCRIPT_NAME'] ?? '';
    $isMath     = (bool)preg_match('#/math/#i', $scriptPath);

    if ($isMath) {
        if (!headers_sent()) {
            header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
            header('Pragma: no-cache');
            header('Expires: 0');
        }

        $themeSlots = ['top', 'top2', 'left', 'right', 'content', 'bottom'];
        $themePool  = _math_theme_pool();

        // &#9472;&#9472; ?theme_probe=1 — plain-text diagnostic dump, exits early &#9472;&#9472;
        if (isset($_GET['theme_probe'])) {
            while (ob_get_level()) ob_end_clean();
            header('Content-Type: text/plain; charset=utf-8');
            echo "=== THEME PROBE v" . KPLUZ_CONTAINER_VERSION . " ===\n\n";
            echo "Container file:  " . __FILE__ . "\n";
            echo "Request URI:     " . ($_SERVER['REQUEST_URI'] ?? '?') . "\n";
            echo "Referer:         " . ($_SERVER['HTTP_REFERER'] ?? '(none)') . "\n";
            echo "Base URL:        " . $base . "\n\n";
            echo "--- Pool (" . count($themePool) . " prefixes) ---\n";
            foreach ($themePool as $prefix) {
                $resolved = _math_theme_resolve_prefix($prefix, $themeSlots);
                if ($resolved !== null) {
                    echo sprintf("  %-12s &#8594; %-12s OK\n", $prefix, $resolved);
                } else {
                    $missing = _math_theme_missing($prefix, $themeSlots);
                    echo sprintf("  %-12s &#8594; MISSING %d: %s\n",
                        $prefix, count($missing), implode(',', $missing));
                }
            }
            echo "\n--- Session state ---\n";
            echo "Version:    " . ($_SESSION['math_theme_version'] ?? 'none') . "\n";
            echo "Themes:     " . json_encode($_SESSION['math_themes'] ?? []) . "\n";
            echo "History:    " . json_encode($_SESSION['math_theme_history'] ?? []) . "\n";
            echo "LastModule: " . ($_SESSION['math_last_module'] ?? 'none') . "\n";
            echo "\n=== END PROBE ===\n";
            exit;
        }

        // &#9472;&#9472; Resolve the pool to valid, usable prefixes &#9472;&#9472;
        $validPrefixes = [];
        $debugProbes   = [];
        foreach ($themePool as $orig) {
            $resolved = _math_theme_resolve_prefix($orig, $themeSlots);
            if ($resolved !== null) {
                $validPrefixes[]    = $resolved;
                $debugProbes[$orig] = $resolved;
            } else {
                $debugProbes[$orig] = 'MISSING';
            }
        }

        // &#9472;&#9472; English fallback if nothing is usable &#9472;&#9472;
        if (empty($validPrefixes)) {
            $theme = [
                'top_banner'    => $base . '/English/images/ex-23-top.jpg',
                'title_bg'      => $base . '/English/images/ex-23-top2.jpg',
                'left_side'     => $base . '/English/images/ex-23-left.jpg',
                'right_side'    => $base . '/English/images/ex-23-right.jpg',
                'content_bg'    => $base . '/English/images/ex-23-content.jpg',
                'bottom_banner' => $base . '/English/images/ex-23-bottom.jpg',
                'score_top'     => $base . '/English/images/score-top-3.jpg',
                'score_bottom'  => $base . '/English/images/score-bottom-3.jpg',
            ];
            if (!headers_sent()) {
                header('X-Container-Version: ' . KPLUZ_CONTAINER_VERSION);
                header('X-Theme: ENGLISH-FALLBACK');
            }
            error_log(sprintf(
                '[KPLUZ THEME v%s] %s | FALLBACK | pool empty',
                KPLUZ_CONTAINER_VERSION, $_SERVER['REQUEST_URI'] ?? '?'
            ));
        } else {
            // &#9472;&#9472; Version marker — clears stale picks on first request &#9472;&#9472;
            $currentVersion = 9;
            if (session_status() === PHP_SESSION_ACTIVE) {
                if (($_SESSION['math_theme_version'] ?? 0) !== $currentVersion) {
                    $_SESSION['math_themes']        = [];
                    $_SESSION['math_theme_history'] = [];
                    $_SESSION['math_last_module']   = null;
                    $_SESSION['math_theme_version'] = $currentVersion;
                }
            }

            $moduleKey = basename($scriptPath);
            $history   = $_SESSION['math_theme_history'] ?? [];
            $stored    = $_SESSION['math_themes'][$moduleKey] ?? null;

            // &#9472;&#9472; Fresh-navigation detection via HTTP_REFERER &#9472;&#9472;
            // Arriving from ANY page whose basename != this module (e.g. the
            // menu) &#8594; fresh navigation. Same-module reloads (F5, Submit,
            // ?ansclick=) keep their theme because the referer is this module.
            $refererPath       = $_SERVER['HTTP_REFERER'] ?? '';
            $refererPath       = $refererPath ? (parse_url($refererPath, PHP_URL_PATH) ?? '') : '';
            $refererSelf       = ($refererPath !== '' && basename($refererPath) === $moduleKey);
            $isFreshNavigation = ($refererPath !== '' && !$refererSelf);

            // Drop stored theme if it's no longer valid
            if ($stored !== null && !in_array($stored, $validPrefixes, true)) {
                $stored = null;
            }

            if ($isFreshNavigation || $stored === null) {
                // &#9472;&#9472; Fresh pick &#9472;&#9472;
                // Max-2-consecutive rule: if the last two history entries are
                // the same theme, exclude it from this pick.
                $lastTwo     = array_slice($history, -2);
                $lastTwoSame = (count($lastTwo) === 2 && $lastTwo[0] === $lastTwo[1]);
                $excluded    = $lastTwoSame ? [$lastTwo[0]] : [];
                $available   = array_values(array_diff($validPrefixes, $excluded));
                if (empty($available)) $available = $validPrefixes;

                $pickedPrefix = $available[array_rand($available)];

                $_SESSION['math_themes'][$moduleKey] = $pickedPrefix;

                $history[] = $pickedPrefix;
                if (count($history) > 20) $history = array_slice($history, -20);
                $_SESSION['math_theme_history'] = $history;
            } else {
                // &#9472;&#9472; Same-module reload — keep stored theme &#9472;&#9472;
                $pickedPrefix = $stored;
            }

            $_SESSION['math_last_module'] = $moduleKey;

            $theme = _math_theme_build($pickedPrefix, $base);

            // &#9472;&#9472; Response headers (visible in DevTools Network tab) &#9472;&#9472;
            if (!headers_sent()) {
                header('X-Container-Version: ' . KPLUZ_CONTAINER_VERSION);
                header('X-Theme: ' . $pickedPrefix);
                header('X-Theme-Fresh: ' . ($isFreshNavigation ? '1' : '0'));
                header('X-Theme-Pool-Count: ' . count($validPrefixes));
            }

            // &#9472;&#9472; Server log &#9472;&#9472;
            error_log(sprintf(
                '[KPLUZ THEME v%s] %s | picked=%s | fresh=%s | pool=%d',
                KPLUZ_CONTAINER_VERSION,
                $_SERVER['REQUEST_URI'] ?? '?',
                $pickedPrefix,
                $isFreshNavigation ? 'yes' : 'no',
                count($validPrefixes)
            ));

            // &#9472;&#9472; HTML comment debug (?theme_debug=1) &#9472;&#9472;
            if (isset($_GET['theme_debug'])) {
                echo "\n<!-- THEME DEBUG v" . KPLUZ_CONTAINER_VERSION . ":"
                   . "\n  picked=" . $pickedPrefix
                   . "\n  fresh=" . ($isFreshNavigation ? 'yes' : 'no')
                   . "\n  referer=" . ($refererPath !== '' ? $refererPath : '(none)')
                   . "\n  valid=[" . implode(',', $validPrefixes) . "]"
                   . "\n  stored=" . ($stored ?? 'none')
                   . "\n  history=[" . implode(',', $history) . "]"
                   . "\n-->\n";
            }
        }
    } else {
        $defaults = [
            'top_banner'    => $base . '/English/images/ex-23-top.jpg',
            'title_bg'      => $base . '/English/images/ex-23-top2.jpg',
            'left_side'     => $base . '/English/images/ex-23-left.jpg',
            'right_side'    => $base . '/English/images/ex-23-right.jpg',
            'content_bg'    => $base . '/English/images/ex-23-content.jpg',
            'bottom_banner' => $base . '/English/images/ex-23-bottom.jpg',
            'score_top'     => $base . '/English/images/score-top-3.jpg',
            'score_bottom'  => $base . '/English/images/score-bottom-3.jpg',
        ];
        $theme = array_merge($defaults, $theme_images);
    }
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
            background: url('{$base}/images/bluetop-bg.jpg') repeat-x top left !important;
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

        input[name='Submit1'],
        input[name='Submit1'] ~ input[name='Submit2'] {
            margin-top: 30px;
            margin-bottom: 30px;
        }

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
        .equation-inline .op { color: #CC0066; }
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
        .equation-vertical td { padding: 3px 8px; line-height: 1.15; vertical-align: middle; }
        .equation-vertical .num { text-align: right; white-space: nowrap; }
        .equation-vertical .op { text-align: left; color: #CC0066; white-space: nowrap; }
        .equation-vertical .rule { border-top: 3px solid #800080; padding: 0; height: 0; line-height: 0; }
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

        .image-grid { text-align: center; margin: 20px 0; line-height: 1.1; }
        .image-grid img {
            display: inline-block;
            vertical-align: middle;
            border: 0;
            max-width: 100%;
            height: auto;
            margin: 1px;
        }

        .pattern-display { text-align: center; margin: 15px 0; line-height: 1.4; }
        .pattern-display img {
            display: inline-block;
            vertical-align: middle;
            margin: 0 2px;
            border: 0;
            max-width: 100%;
            height: auto;
        }

        .score-box { text-align: center; margin: 0 auto 40px auto; }
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
                    '<?php echo $base; ?>/images/header1c.jpg',
                    '<?php echo $base; ?>/images/header1b.jpg',
                    '<?php echo $base; ?>/images/header2c.jpg',
                    '<?php echo $base; ?>/images/header2b.jpg',
                    '<?php echo $base; ?>/images/header3c.jpg',
                    '<?php echo $base; ?>/images/header3b.jpg',
                    '<?php echo $base; ?>/images/header4c.jpg',
                    '<?php echo $base; ?>/images/header4b.jpg',
                    '<?php echo $base; ?>/images/header5c.jpg',
                    '<?php echo $base; ?>/images/header5b.jpg',
                    '<?php echo $base; ?>/images/header6c.jpg',
                    '<?php echo $base; ?>/images/header6b.jpg'
                );
            };
        </script>
    </head>
    <body>
    <div class="main-wrapper">

        <table class="header-table" cellspacing="0" cellpadding="0">
            <tr>
                <td width="193" height="100" valign="top">
                    <a href="<?php echo $base; ?>/math/modules/math-menu.php">
                        <img src="<?php echo $base; ?>/images/header-logo.jpg" alt="KPluz Logo">
                    </a>
                </td>
                <td width="133" valign="top">
                    <a href="<?php echo $base; ?>/how-to-use-kpluz.php">
                        <img id="img1" src="<?php echo $base; ?>/images/header1a.jpg"
                             onmouseover="FP_swapImg(1,0,'img1','<?php echo $base; ?>/images/header1b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img1','<?php echo $base; ?>/images/header1a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img1','<?php echo $base; ?>/images/header1c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img1','<?php echo $base; ?>/images/header1b.jpg')">
                    </a>
                </td>
                <td width="133" valign="top">
                    <a href="<?php echo $base; ?>/bluebars_student.php">
                        <img id="img2" src="<?php echo $base; ?>/images/header2a.jpg"
                             onmouseover="FP_swapImg(1,0,'img2','<?php echo $base; ?>/images/header2b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img2','<?php echo $base; ?>/images/header2a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img2','<?php echo $base; ?>/images/header2c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img2','<?php echo $base; ?>/images/header2b.jpg')">
                    </a>
                </td>
                <td width="133" valign="top">
                    <a href="<?php echo $base; ?>/programs.php">
                        <img id="img3" src="<?php echo $base; ?>/images/header3a.jpg"
                             onmouseover="FP_swapImg(1,0,'img3','<?php echo $base; ?>/images/header3b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img3','<?php echo $base; ?>/images/header3a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img3','<?php echo $base; ?>/images/header3c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img3','<?php echo $base; ?>/images/header3b.jpg')">
                    </a>
                </td>
                <td width="134" valign="top">
                    <a href="<?php echo $base; ?>/community.php">
                        <img id="img4" src="<?php echo $base; ?>/images/header4a.jpg"
                             onmouseover="FP_swapImg(1,0,'img4','<?php echo $base; ?>/images/header4b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img4','<?php echo $base; ?>/images/header4a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img4','<?php echo $base; ?>/images/header4c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img4','<?php echo $base; ?>/images/header4b.jpg')">
                    </a>
                </td>
                <td width="134" valign="top">
                    <a href="<?php echo $base; ?>/contact.php">
                        <img id="img5" src="<?php echo $base; ?>/images/header5a.jpg"
                             onmouseover="FP_swapImg(1,0,'img5','<?php echo $base; ?>/images/header5b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img5','<?php echo $base; ?>/images/header5a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img5','<?php echo $base; ?>/images/header5c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img5','<?php echo $base; ?>/images/header5b.jpg')">
                    </a>
                </td>
                <td width="134" valign="top">
                    <a href="<?php echo $base; ?>/logout.php">
                        <img id="img6" src="<?php echo $base; ?>/images/header6a.jpg"
                             onmouseover="FP_swapImg(1,0,'img6','<?php echo $base; ?>/images/header6b.jpg')"
                             onmouseout="FP_swapImg(0,0,'img6','<?php echo $base; ?>/images/header6a.jpg')"
                             onmousedown="FP_swapImg(1,0,'img6','<?php echo $base; ?>/images/header6c.jpg')"
                             onmouseup="FP_swapImg(0,0,'img6','<?php echo $base; ?>/images/header6b.jpg')">
                    </a>
                </td>
            </tr>
        </table>

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
    $base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
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
                <b><a href="<?php echo $base; ?>/home-english.php" style="color:#FFFFFF; text-decoration:none;">KPluz.com</a></b>
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
    $base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
    $top = $score_top_img ?? ($theme['score_top'] ?? $base . '/English/images/score-top-3.jpg');
    $bottom = $score_bottom_img ?? ($theme['score_bottom'] ?? $base . '/English/images/score-bottom-3.jpg');
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
        $len = function_exists('mb_strlen') ? mb_strlen((string)$c, 'UTF-8') : strlen((string)$c);
        if ($len > $maxLen) $maxLen = $len;
    }
    $widthEm = round(0.62 * $maxLen + 3.2, 2);
    echo '<div class="choices-row" style="--choice-width: ' . $widthEm . 'em;">';
    foreach ($choices as $c) {
        $label = ($format === 'ucwords') ? ucwords($c) : $c;
        echo '<a href="?' . htmlspecialchars($param) . '=' . urlencode($c) . '" class="choice-btn">'
           . htmlspecialchars($label) . '</a>';
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
           . '<img src="' . $image . '" alt="' . $alt . '"></a>';
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