<?php
// container.php – shared layout, no session handling
// VERSION 21 — Sanitize module $theme_images overrides: if the override
//                paths point to math/images/ while the current subject is
//                NOT math, the override is discarded and container's own
//                pool runs instead. Fixes legacy English modules that
//                hardcoded paper-69-* paths (100+ files) without editing
//                each one. Math modules and modules passing their own
//                subject's paths are unaffected.
// VERSION 20 — AP theme pool removed from container. AP modules are now
//                handled exclusively by q-display-legacy.php v22+, which
//                resolves AP theme images internally and passes them to
//                render_header() via $theme_images. Container's remaining
//                per-subject pools: math, english, science.
//                (If a hypothetical AP module calls render_header() directly
//                with empty $theme_images, it gets English ex-23 defaults.)
// VERSION 19 — width standardization complete. All subjects use the same
//                layout widths: left 75px, right 70px, content 655px.
// VERSION 18 — per-subject slot aliases; _theme_pick_score fallback.
// VERSION 17 — per-subject theme pools (math/english/science).
// VERSION 16 — per-subject theme pool scaffold + unified session state.
// VERSION 15 — universal choice hover (blue #d4ecff / #0066cc).
// VERSION 14 — universal choice hover (green) — superseded.
// VERSION 13 — logo anchor routes via home-subj.php?subj=<subject>.
// VERSION 12 — .frac-input.frac-single 52px/30px.

define('KPLUZ_CONTAINER_VERSION', '21');

// ============================================================
// Theme resolution helpers
// ============================================================
function _theme_file_exists($folder, $fileName) {
    $fsPath = __DIR__ . '/' . $folder . $fileName;
    return is_file($fsPath);
}

function _theme_resolve_prefix($prefix, $folder, $slots, $slotAliases = []) {
    $allOk = true;
    foreach ($slots as $slot) {
        $name = $slotAliases[$slot] ?? $slot;
        if (!_theme_file_exists($folder, $prefix . '-' . $name . '.jpg')) { $allOk = false; break; }
    }
    if ($allOk) return $prefix;

    if (preg_match('/^([A-Za-z]+)-(\d+)$/', $prefix, $m)) {
        $nodash = $m[1] . $m[2];
        $allOk = true;
        foreach ($slots as $slot) {
            $name = $slotAliases[$slot] ?? $slot;
            if (!_theme_file_exists($folder, $nodash . '-' . $name . '.jpg')) { $allOk = false; break; }
        }
        if ($allOk) return $nodash;
    }
    return null;
}

function _theme_missing($prefix, $folder, $slots, $slotAliases = []) {
    $missing = [];
    foreach ($slots as $slot) {
        $name = $slotAliases[$slot] ?? $slot;
        $fn = $prefix . '-' . $name . '.jpg';
        if (!_theme_file_exists($folder, $fn)) $missing[] = $fn;
    }
    return $missing;
}

function _theme_build($prefix, $folder, $base, $scoreTop, $scoreBottom, $slotAliases = []) {
    $fn = function ($slot) use ($prefix, $slotAliases) {
        $name = $slotAliases[$slot] ?? $slot;
        return $prefix . '-' . $name . '.jpg';
    };
    return [
        'top_banner'    => $base . '/' . $folder . $fn('top'),
        'title_bg'      => $base . '/' . $folder . $fn('top2'),
        'left_side'     => $base . '/' . $folder . $fn('left'),
        'right_side'    => $base . '/' . $folder . $fn('right'),
        'content_bg'    => $base . '/' . $folder . $fn('content'),
        'bottom_banner' => $base . '/' . $folder . $fn('bottom'),
        'score_top'     => $base . '/' . $scoreTop,
        'score_bottom'  => $base . '/' . $scoreBottom,
    ];
}

function _theme_pick_score($preferredRel, $fallbackRel) {
    return _theme_file_exists('', $preferredRel) ? $preferredRel : $fallbackRel;
}

// ============================================================
// Per-subject theme configuration
// ============================================================
function _subject_theme_configs() {
    static $configs = null;
    if ($configs !== null) return $configs;

    // ---- MATH: 17 prefixes in math/images/images/ ----
    $mathPrefixes = ['paper-69', 'paper-70'];
    for ($i = 1; $i <= 15; $i++) {
        $mathPrefixes[] = 'wquiz-' . str_pad($i, 2, '0', STR_PAD_LEFT);
    }
    $configs['math'] = [
        'prefix_folders' => array_fill_keys($mathPrefixes, 'math/images/images/'),
        'score_top'      => 'math/images/score-top-1.jpg',
        'score_bottom'   => 'math/images/score-bottom-1.jpg',
    ];

    // ---- ENGLISH: ex-23..ex-27 in English/images/ ----
    $configs['english'] = [
        'prefix_folders' => [
            'ex-23' => 'English/images/',
            'ex-24' => 'English/images/',
            'ex-25' => 'English/images/',
            'ex-26' => 'English/images/',
            'ex-27' => 'English/images/',
        ],
        'score_top'      => 'English/images/score-top-3.jpg',
        'score_bottom'   => 'English/images/score-bottom-3.jpg',
    ];

    // ---- SCIENCE: squiz-20..squiz-24 in science/images/images/ ----
    $configs['science'] = [
        'prefix_folders' => [
            'squiz-20' => 'science/images/images/',
            'squiz-21' => 'science/images/images/',
            'squiz-22' => 'science/images/images/',
            'squiz-23' => 'science/images/images/',
            'squiz-24' => 'science/images/images/',
        ],
        'score_top'      => 'science/images/score-top-5.jpg',
        'score_bottom'   => 'science/images/score-bottom-5.jpg',
    ];

    // AP deliberately omitted — handled by q-display-legacy.php v22+.

    return $configs;
}

function _theme_default_theme($base) {
    return [
        'top_banner'    => $base . '/English/images/ex-23-top.jpg',
        'title_bg'      => $base . '/English/images/ex-23-top2.jpg',
        'left_side'     => $base . '/English/images/ex-23-left.jpg',
        'right_side'    => $base . '/English/images/ex-23-right.jpg',
        'content_bg'    => $base . '/English/images/ex-23-content.jpg',
        'bottom_banner' => $base . '/English/images/ex-23-bottom.jpg',
        'score_top'     => $base . '/English/images/score-top-3.jpg',
        'score_bottom'  => $base . '/English/images/score-bottom-3.jpg',
    ];
}

function render_statement($text) {
    $sentinel = "\x01BR\x01";
    $text = str_replace(
        ["\r\n", "\n", '<br/>', '<br />', '<br>', '<BR/>', '<BR />', '<BR>'],
        $sentinel,
        (string)$text
    );
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    return str_replace($sentinel, '<br/>', $text);
}

function render_header($page_title = 'EnglishPluz', $page_heading = '', $theme_images = []) {
    if (isset($_SESSION) && !isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }

    $base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

    $scriptPath = $_SERVER['SCRIPT_NAME'] ?? '';

    $subjectKey = 'gmrc';
    if (preg_match('#/([^/]+)/modules/[^/]+\.php$#i', $scriptPath, $m)) {
        $subjectKey = strtolower($m[1]);
    } elseif (preg_match('#/math/#i', $scriptPath)) {
        $subjectKey = 'math';
    }

    $themeSlots     = ['top', 'top2', 'left', 'right', 'content', 'bottom'];
    $subjectConfigs = _subject_theme_configs();
    $subjectConfig  = $subjectConfigs[$subjectKey] ?? null;

    // ---- theme_probe ----
    if (isset($_GET['theme_probe'])) {
        while (ob_get_level()) ob_end_clean();
        header('Content-Type: text/plain; charset=utf-8');
        echo "=== THEME PROBE v" . KPLUZ_CONTAINER_VERSION . " ===\n\n";
        echo "Container file: " . __FILE__ . "\n";
        echo "Request URI:    " . ($_SERVER['REQUEST_URI'] ?? '?') . "\n";
        echo "Script path:    " . $scriptPath . "\n";
        echo "Subject key:    " . $subjectKey . "\n";
        echo "Base URL:       " . $base . "\n\n";

        $probeSubjects = ($subjectKey === 'math')
            ? ['math']
            : array_keys($subjectConfigs);
        foreach ($probeSubjects as $probeSubject) {
            $cfg = $subjectConfigs[$probeSubject];
            $aliases = $cfg['slot_aliases'] ?? [];
            echo "--- {$probeSubject} ---\n";
            echo "  score  : {$cfg['score_top']} / {$cfg['score_bottom']}\n";
            if (!empty($aliases)) {
                echo "  slot_aliases:\n";
                foreach ($aliases as $from => $to) {
                    echo "    {$from} &#8594; {$to}\n";
                }
            }
            if (empty($cfg['prefix_folders'])) {
                echo "  prefixes: (none — falls back to defaults)\n\n";
                continue;
            }
            echo "  prefixes: " . count($cfg['prefix_folders']) . "\n";
            foreach ($cfg['prefix_folders'] as $prefix => $folder) {
                $resolved = _theme_resolve_prefix($prefix, $folder, $themeSlots, $aliases);
                if ($resolved !== null) {
                    echo sprintf("    %-10s &#8594; %-10s OK  (%s)\n", $prefix, $resolved, $folder);
                } else {
                    $missing = _theme_missing($prefix, $folder, $themeSlots, $aliases);
                    echo sprintf("    %-10s &#8594; MISSING %d: %s  (%s)\n",
                        $prefix, count($missing), implode(',', $missing), $folder);
                }
            }
            echo "\n";
        }

        echo "--- Session state (subject_*) ---\n";
        echo "Version: " . ($_SESSION['subject_theme_version'] ?? 'none') . "\n";
        echo "Themes:  " . json_encode($_SESSION['subject_themes'] ?? []) . "\n";
        echo "History: " . json_encode($_SESSION['subject_theme_history'] ?? []) . "\n";
        echo "Last:    " . json_encode($_SESSION['subject_last_module'] ?? []) . "\n";
        echo "\n=== END PROBE ===\n";
        exit;
    }

    // ---- Sanitize module override ----
    // Some legacy modules in one subject folder hardcode another subject's
    // theme paths (e.g. English modules using math/images/images/paper-69-*
    // as a fallback when the intended English theme wasn't available). If
    // the override's paths point to math while the current subject is NOT
    // math, discard the override so the subject's own pool runs instead.
    if (!empty($theme_images) && $subjectKey !== 'math') {
        $firstPath = (string)reset($theme_images);
        if (stripos($firstPath, '/math/images/') !== false) {
            $theme_images = [];
        }
    }

    // ---- Strategy ----
    $poolIsEmpty    = ($subjectConfig === null) || empty($subjectConfig['prefix_folders']);
    $moduleOverride = !empty($theme_images);
    $useRotation    = ($subjectKey === 'math' && !$poolIsEmpty)
                    || ($subjectKey !== 'math' && !$moduleOverride && !$poolIsEmpty);

    if ($useRotation) {
        if (!headers_sent()) {
            header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
            header('Pragma: no-cache');
            header('Expires: 0');
        }

        $aliases       = $subjectConfig['slot_aliases'] ?? [];
        $validPrefixes = [];
        $prefixFolders = [];
        foreach ($subjectConfig['prefix_folders'] as $orig => $folder) {
            $resolved = _theme_resolve_prefix($orig, $folder, $themeSlots, $aliases);
            if ($resolved !== null) {
                $validPrefixes[]          = $resolved;
                $prefixFolders[$resolved] = $folder;
            }
        }

        if (empty($validPrefixes)) {
            $theme = array_merge(_theme_default_theme($base), $theme_images);
            if (!headers_sent()) {
                header('X-Container-Version: ' . KPLUZ_CONTAINER_VERSION);
                header('X-Subject: ' . $subjectKey);
                header('X-Theme: DEFAULT-EMPTY-POOL');
            }
        } else {
            // Legacy math_* &#8594; subject_* migration
            if (!isset($_SESSION['subject_themes']) && isset($_SESSION['math_themes'])) {
                $_SESSION['subject_themes']        = ['math' => $_SESSION['math_themes']];
                $_SESSION['subject_theme_history'] = ['math' => $_SESSION['math_theme_history'] ?? []];
                $_SESSION['subject_last_module']   = ['math' => $_SESSION['math_last_module'] ?? null];
                $_SESSION['subject_theme_version'] = $_SESSION['math_theme_version'] ?? 9;
                unset($_SESSION['math_themes'], $_SESSION['math_theme_history'],
                      $_SESSION['math_last_module'], $_SESSION['math_theme_version']);
            }

            $currentVersion = 10;
            if (session_status() === PHP_SESSION_ACTIVE) {
                if (($_SESSION['subject_theme_version'] ?? 0) !== $currentVersion) {
                    $_SESSION['subject_themes']        = [];
                    $_SESSION['subject_theme_history'] = [];
                    $_SESSION['subject_last_module']   = [];
                    $_SESSION['subject_theme_version'] = $currentVersion;
                }
            }

            $moduleKey = basename($scriptPath);
            if (!isset($_SESSION['subject_themes'][$subjectKey]))        $_SESSION['subject_themes'][$subjectKey] = [];
            if (!isset($_SESSION['subject_theme_history'][$subjectKey])) $_SESSION['subject_theme_history'][$subjectKey] = [];
            if (!isset($_SESSION['subject_last_module']))                $_SESSION['subject_last_module'] = [];

            $history = $_SESSION['subject_theme_history'][$subjectKey];
            $stored  = $_SESSION['subject_themes'][$subjectKey][$moduleKey] ?? null;

            $refererPath       = $_SERVER['HTTP_REFERER'] ?? '';
            $refererPath       = $refererPath ? (parse_url($refererPath, PHP_URL_PATH) ?? '') : '';
            $refererSelf       = ($refererPath !== '' && basename($refererPath) === $moduleKey);
            $isFreshNavigation = ($refererPath !== '' && !$refererSelf);

            if ($stored !== null && !in_array($stored, $validPrefixes, true)) {
                $stored = null;
            }

            if ($isFreshNavigation || $stored === null) {
                $lastTwo     = array_slice($history, -2);
                $lastTwoSame = (count($lastTwo) === 2 && $lastTwo[0] === $lastTwo[1]);
                $excluded    = $lastTwoSame ? [$lastTwo[0]] : [];
                $available   = array_values(array_diff($validPrefixes, $excluded));
                if (empty($available)) $available = $validPrefixes;
                $pickedPrefix = $available[array_rand($available)];

                $_SESSION['subject_themes'][$subjectKey][$moduleKey] = $pickedPrefix;
                $history[] = $pickedPrefix;
                if (count($history) > 20) $history = array_slice($history, -20);
                $_SESSION['subject_theme_history'][$subjectKey] = $history;
            } else {
                $pickedPrefix = $stored;
            }

            $_SESSION['subject_last_module'][$subjectKey] = $moduleKey;

            $scoreTop    = _theme_pick_score($subjectConfig['score_top'],    'English/images/score-top-3.jpg');
            $scoreBottom = _theme_pick_score($subjectConfig['score_bottom'], 'English/images/score-bottom-3.jpg');

            $theme = _theme_build(
                $pickedPrefix,
                $prefixFolders[$pickedPrefix],
                $base,
                $scoreTop,
                $scoreBottom,
                $aliases
            );

            if (!headers_sent()) {
                header('X-Container-Version: ' . KPLUZ_CONTAINER_VERSION);
                header('X-Subject: ' . $subjectKey);
                header('X-Theme: ' . $pickedPrefix);
                header('X-Theme-Fresh: ' . ($isFreshNavigation ? '1' : '0'));
                header('X-Theme-Pool-Count: ' . count($validPrefixes));
            }
        }
    } else {
        $theme = array_merge(_theme_default_theme($base), $theme_images);
        if (!headers_sent()) {
            header('X-Container-Version: ' . KPLUZ_CONTAINER_VERSION);
            header('X-Subject: ' . $subjectKey);
            header('X-Theme: ' . (!empty($theme_images) ? 'MODULE-OVERRIDE' : 'DEFAULT'));
        }
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

        /* ============================================================
           UNIVERSAL CHOICE HOVER (unchanged from v15-v20)
           ============================================================ */
        a[href*='ansclick']:not(.image-choice) {
            transition: background 0.2s, border-color 0.2s;
        }
        a[href*='ansclick']:not(.image-choice):hover {
            background: #d4ecff !important;
            border-color: #0066cc !important;
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
            background: #d5effb;
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
        .statement {
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 16px;
            padding-right: 16px;
            white-space: pre-line;
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

        .frac-input {
            height: 70px;
            font-size: 40px;
            text-align: center;
            border: 2px solid #888;
            border-radius: 8px;
            font-weight: 700;
            color: #0000CC;
            font-family: inherit;
            box-sizing: border-box;
            padding: 0 6px;
            vertical-align: middle;
            background: #fff;
        }
        .frac-input:focus {
            outline: none;
            border-color: #8080ff;
            box-shadow: 0 0 0 3px rgba(128, 128, 255, 0.25);
            background: #f8f8ff;
        }
        .frac-input.frac-whole  { width: 100px; }
        .frac-input.frac-part   { width: 130px; }
        .frac-input.frac-single {
            height: 52px;
            font-size: 30px;
            width: auto;
            min-width: 140px;
            padding: 0 16px;
        }

        .frac-eq-row {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            margin: 30px auto;
            flex-wrap: wrap;
        }
        .frac-display {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Comic Sans MS', 'Segoe UI', cursive;
            font-weight: 700;
            color: #800080;
            font-size: 40px;
            line-height: 1;
        }
        .frac-display .frac-bar {
            align-self: stretch;
            border-top: 4px solid #800080;
            min-width: 90px;
            margin: 4px 0;
        }
        .frac-op  { font-size: 40pt; color: #444; font-weight: 700; }
        .frac-num { font-size: 40pt; font-weight: 700; color: #CC0066; }
        .frac-of  { font-size: 28pt; font-weight: 700; color: #444; }

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
            .content-wrapper .side-left  { width: 20px; }
            .content-wrapper .side-right { width: 20px; }
            .content-wrapper .content-bg { width: auto; padding: 0; }
            .module-output { padding: 10px; }
            .title-area .title-text { font-size: 14pt; }
            .score-box .score-top { width: 80px; height: 60px; background-size: contain; }
            .score-box .score-bottom { width: 80px; height: 45px; font-size: 18pt; background-size: contain; }
            .frac-input { height: 52px; font-size: 26px; }
            .frac-input.frac-whole  { width: 70px; }
            .frac-input.frac-part   { width: 90px; }
            .frac-input.frac-single {
                height: 42px;
                font-size: 22px;
                min-width: 110px;
                padding: 0 12px;
            }
            .frac-display { font-size: 26px; }
            .frac-display .frac-bar { border-top-width: 3px; min-width: 60px; }
            .frac-op, .frac-num { font-size: 26pt; }
            .frac-of { font-size: 18pt; }
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

            document.addEventListener('DOMContentLoaded', function () {
                var container = document.querySelector('.module-output');
                if (!container) return;
                var walker = document.createTreeWalker(container, NodeFilter.SHOW_TEXT, null, false);
                var nodes = [];
                var node;
                while ((node = walker.nextNode())) nodes.push(node);

                nodes.forEach(function (n) {
                    var t = n.nodeValue;
                    if (!t || !t.trim()) return;
                    var hasBrTag = /<br\s*\/?>/i.test(t);
                    var hasEscN  = t.indexOf('\\n') >= 0;
                    var hasRealN = t.indexOf('\n') >= 0;
                    if (!hasBrTag && !hasEscN && !hasRealN) return;

                    var leftWs  = (t.match(/^\s*/) || [''])[0];
                    var rightWs = (t.match(/\s*$/) || [''])[0];
                    var core    = t.slice(leftWs.length, t.length - rightWs.length);
                    if (!core) return;

                    var parts = core.split(/(<br\s*\/?>|\\n|\n)/i);
                    var frag  = document.createDocumentFragment();
                    if (leftWs) frag.appendChild(document.createTextNode(leftWs));
                    parts.forEach(function (p) {
                        if (!p) return;
                        if (/^<br\s*\/?>$/i.test(p) || p === '\\n' || p === '\n') {
                            frag.appendChild(document.createElement('br'));
                        } else {
                            frag.appendChild(document.createTextNode(p));
                        }
                    });
                    if (rightWs) frag.appendChild(document.createTextNode(rightWs));
                    n.parentNode.replaceChild(frag, n);
                });
            });
        </script>
    </head>
    <body class="subject-<?php echo htmlspecialchars($subjectKey); ?> mod-<?php echo htmlspecialchars(basename($scriptPath, '.php')); ?>">
    <div class="main-wrapper">

        <table class="header-table" cellspacing="0" cellpadding="0">
            <tr>
                <td width="193" height="100" valign="top">
                    <a href="<?php echo $base; ?>/home-subj.php?subj=<?php echo urlencode($subjectKey); ?>">
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