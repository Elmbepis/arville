<?php
// q-display-legacy.php — displays legacy question-set modules
// v6: theme resets to a new random pick on fresh arrival from the menu;
//     stays fixed within the module (answers, New Question, level change).
// v5: difficulty widget at bottom (synonyms.php pattern); level radio
//     posts together with Submit2 — one click changes level AND generates
//     the next question.
// v4: multi-level support. Modules that declare $module_levels = ['Easy','Hard']
//     get a difficulty selector and per-level scoring.
// v3: renders optional [explanation] text on the feedback panel.
// Modules that don't declare $module_levels (e.g. AP) stay single-level 'Easy'.
// URL: q-display-legacy.php?m=AP/modules/sarili-pagkilala

ob_start();

session_name('KPLUZ_SESSION');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: $base/login.php");
    exit();
}

// Resolve grade
$grd = null;
if (isset($_SESSION['grade']) && is_numeric($_SESSION['grade'])) {
    $grd = (int)$_SESSION['grade'];
} elseif (isset($_SESSION['user_grade']) && is_numeric($_SESSION['user_grade'])) {
    $grd = (int)$_SESSION['user_grade'];
}

require_once __DIR__ . '/scorer.php';
require_once __DIR__ . '/q-engine.php';
require_once __DIR__ . '/container.php';

// ============================================================
// THEME RESOLUTION
// ============================================================
function qdl_file_exists($folder, $file) {
    return is_file(__DIR__ . '/' . $folder . $file);
}

function qdl_resolve_prefix($prefix, $folder, $slots, $aliases = []) {
    foreach ($slots as $slot) {
        $name = $aliases[$slot] ?? $slot;
        if (!qdl_file_exists($folder, $prefix . '-' . $name . '.jpg')) return null;
    }
    return $prefix;
}

function qdl_build_theme($prefix, $folder, $base, $scoreTop, $scoreBottom, $aliases = []) {
    $fn = function ($slot) use ($prefix, $aliases) {
        return $prefix . '-' . ($aliases[$slot] ?? $slot) . '.jpg';
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

function qdl_default_theme($base) {
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

function qdl_pick_score($rel, $fallbackRel) {
    return qdl_file_exists('', $rel) ? $rel : $fallbackRel;
}

function qdl_resolve_theme($subject, $base, $moduleId, $isFreshNavigation = true) {
    $slots = ['top', 'top2', 'left', 'right', 'content', 'bottom'];

    $configs = [
        'math' => [
            'prefixes' => array_merge(
                ['paper-69', 'paper-70'],
                array_map(fn($i) => 'wquiz-' . str_pad($i, 2, '0', STR_PAD_LEFT), range(1, 15))
            ),
            'folder'       => 'math/images/images/',
            'score_top'    => 'math/images/score-top-1.jpg',
            'score_bottom' => 'math/images/score-bottom-1.jpg',
        ],
        'english' => [
            'prefixes'     => ['ex-23', 'ex-24', 'ex-25', 'ex-26', 'ex-27'],
            'folder'       => 'English/images/',
            'score_top'    => 'English/images/score-top-3.jpg',
            'score_bottom' => 'English/images/score-bottom-3.jpg',
        ],
        'ap' => [
            'prefixes'     => ['testap01', 'testap02', 'testap03', 'testap04'],
            'folder'       => 'AP/modules/images/',
            'aliases'      => ['top2' => 'title', 'content' => 'spacer'],
            'score_top'    => 'AP/modules/images/score-top-1.png',
            'score_bottom' => 'AP/modules/images/score-bottom-1.png',
        ],
        'science' => [
            'prefixes'     => ['squiz-19', 'squiz-20', 'squiz-21', 'squiz-22', 'squiz-24'],
            'folder'       => 'science/images/images/',
            'score_top'    => 'science/images/score-top-5.jpg',
            'score_bottom' => 'science/images/score-bottom-5.jpg',
        ],
    ];

    if (!isset($configs[$subject])) {
        return qdl_default_theme($base);
    }

    $cfg     = $configs[$subject];
    $aliases = $cfg['aliases'] ?? [];

    $valid = [];
    foreach ($cfg['prefixes'] as $p) {
        if (qdl_resolve_prefix($p, $cfg['folder'], $slots, $aliases) !== null) {
            $valid[] = $p;
        }
    }

    if (empty($valid)) {
        return qdl_default_theme($base);
    }

    $rotKey = 'qdl_theme_' . $subject;
    if (!isset($_SESSION[$rotKey])) $_SESSION[$rotKey] = [];

    if ($isFreshNavigation) {
        // Fresh arrival from the menu — always pick a new random theme,
        // overwriting whatever this module used in a prior session.
        $picked = $valid[array_rand($valid)];
        $_SESSION[$rotKey][$moduleId] = $picked;
    } else {
        // Within-module navigation (answered a question, requested a new
        // one, changed difficulty) — reuse the theme chosen on arrival.
        $picked = $_SESSION[$rotKey][$moduleId] ?? null;
        if ($picked === null || !in_array($picked, $valid, true)) {
            // Fallback: no stored theme (e.g. user deep-linked straight to
            // an answer URL). Pick one and store it so subsequent in-module
            // requests stay consistent.
            $picked = $valid[array_rand($valid)];
            $_SESSION[$rotKey][$moduleId] = $picked;
        }
    }

    $scoreTop    = qdl_pick_score($cfg['score_top'],    'English/images/score-top-3.jpg');
    $scoreBottom = qdl_pick_score($cfg['score_bottom'], 'English/images/score-bottom-3.jpg');

    return qdl_build_theme($picked, $cfg['folder'], $base, $scoreTop, $scoreBottom, $aliases);
}

// ============================================================
// LEGACY QUESTION COLORS
// ============================================================
function legacy_question_colors($subject) {
    $colors = [
        'gmrc'               => ['bg' => '#fdeeef', 'border' => '#fba0a5'],
        'araling-panlipunan' => ['bg' => '#fdeeef', 'border' => '#fba0a5'],
        'ap'                 => ['bg' => '#fdeeef', 'border' => '#fba0a5'],
        'science'            => ['bg' => '#ebfdea', 'border' => '#91faca'],
        'filipino'           => ['bg' => '#FDF0D6', 'border' => '#FBBB91'],
        'mapeh'              => ['bg' => '#f8eefd', 'border' => '#eac5fd'],
        'tle'                => ['bg' => '#e8fefe', 'border' => '#90f1e2'],
        'english'            => ['bg' => '#FFFFF0', 'border' => '#FEDB9A'],
        'math'               => ['bg' => '#EBF4FD', 'border' => '#A8D3FE'],
    ];
    return $colors[$subject] ?? ['bg' => '#fdeeef', 'border' => '#fba0a5'];
}

// ============================================================
// MODULE RESOLUTION
// ============================================================
$moduleKey = $_GET['m'] ?? '';
if (!preg_match('#^[a-z0-9_\-/]+$#i', $moduleKey)) die("Invalid module.");

$modulePath = __DIR__ . '/' . $moduleKey;
if (!file_exists($modulePath) && file_exists($modulePath . '.php')) {
    $modulePath .= '.php';
}
if (!file_exists($modulePath)) {
    die("Module not found: " . htmlspecialchars($moduleKey));
}

$parts         = explode('/', $moduleKey);
$subjectFolder = $parts[0];
$subject       = strtolower($subjectFolder);

$sessionKey  = 'mod_' . md5(basename($modulePath));
$moduleParam = htmlspecialchars($moduleKey);

// ============================================================
// LEVEL CHANGE
// Runs BEFORE require so the module rebuilds its bank for the new level.
// Clears per-session question state on actual level change so the engine
// starts fresh from the new pool.
// ============================================================
if (isset($_POST['level']) && in_array($_POST['level'], ['Easy', 'Hard'], true)) {
    $prevLevel = $_SESSION['level'] ?? null;
    if ($prevLevel !== $_POST['level']) {
        $_SESSION['level'] = $_POST['level'];
        unset($_SESSION[$sessionKey]);
    }
}

// ============================================================
// LANGUAGE
// ============================================================
$englishSubjects = ['english', 'math', 'science', 'tle'];
$uiLang = in_array($subject, $englishSubjects, true) ? 'en' : 'fil';

$uiStrings = [
    'en' => [
        'your_answer'       => 'Your answer is',
        'correct'           => 'That is correct!',
        'incorrect'         => 'That is incorrect.',
        'question_label'    => 'Question:',
        'answer_label'      => 'Answer:',
        'explanation_label' => 'Explanation:',
        'click_to_answer'   => 'Click on your answer below.',
        'new_question'      => 'New Question',
        'difficulty_prompt' => 'Select difficulty level for next question:',
    ],
    'fil' => [
        'your_answer'       => 'Ang sagot mo ay',
        'correct'           => 'Ito ay tumpak!',
        'incorrect'         => 'Ito ay hindi tumpak.',
        'question_label'    => 'Tanong:',
        'answer_label'      => 'Sagot:',
        'explanation_label' => 'Paliwanag:',
        'click_to_answer'   => 'Pindutin ang iyong sagot sa ibaba.',
        'new_question'      => 'Bagong Tanong',
        'difficulty_prompt' => 'Piliin ang antas ng kahirapan para sa susunod na tanong:',
    ],
];
$t = $uiStrings[$uiLang];

$_SESSION['last_subject'] = $subject;

// ============================================================
// DB CONNECTION
// ============================================================
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($grd === null && !empty($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT grade FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $r = $stmt->get_result()->fetch_assoc();
    if ($r && is_numeric($r['grade'])) {
        $grd = (int)$r['grade'];
        $_SESSION['grade'] = $grd;
    }
    $stmt->close();
}
if ($grd === null) $grd = 1;

// ============================================================
// LOAD MODULE
// Default $module_levels = ['Easy']; a module that supports more
// levels overrides it by assigning $module_levels = [...] at top scope.
// Modules that don't declare it (AP, etc.) stay single-level.
// ============================================================
$questions = [];
$module_levels = ['Easy'];
unset($_SESSION['title'], $_SESSION['tnum']);

try {
    ob_start();
    require $modulePath;
    ob_end_clean();
} catch (\Throwable $e) {
    while (ob_get_level() > 0) ob_end_clean();
    die('<pre style="background:#fee;padding:16px;color:#900;font-family:monospace;text-align:left;max-width:900px;margin:20px auto;white-space:pre-wrap;">' .
        "Module load threw " . get_class($e) . ":\n" . htmlspecialchars($e->getMessage()) . "\n\nAt: " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "\n\n" .
        htmlspecialchars($e->getTraceAsString()) . '</pre>');
}

// ============================================================
// RESOLVE LEVELS
// ============================================================
$module_levels = (isset($module_levels) && is_array($module_levels)) ? $module_levels : [];
$module_levels = array_values(array_filter(
    $module_levels,
    fn($l) => in_array($l, ['Easy', 'Hard'], true)
));
if (empty($module_levels)) $module_levels = ['Easy'];
$isMultiLevel = count($module_levels) > 1;

$currentLevel = $_SESSION['level'] ?? $module_levels[0];
if (!in_array($currentLevel, $module_levels, true)) {
    $currentLevel = $module_levels[0];
}

header_remove();
header('Content-Type: text/html; charset=UTF-8');

$moduleTitle = $_SESSION['title'] ?? basename($modulePath, '.php');
if (!is_array($questions) || empty($questions)) {
    die("Module did not define a valid \$questions array.");
}

// ============================================================
// TEMPLATE + ENGINE
// ============================================================
$template = [
    'title'             => $moduleTitle,
    'subject'           => $subject,
    'module_identifier' => basename($modulePath),
    'type'              => 'static',
    'levels'            => $module_levels,
    'image_base'        => $base . '/' . $subjectFolder . '/modules/qimages/',
    'questions'         => $questions,
];

try {
    $engine = new QEngine($template, $template['module_identifier']);
    $engine->setLevel($currentLevel);
} catch (\Throwable $e) {
    die("QEngine construction failed.");
}

$result = null;
$scorer = null;

// ---- Answer click ----
if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    $q = $_SESSION[$sessionKey]['current'];
    $selected = $_GET['ansclick'];

    $scorer  = new Scorer($conn, $template['module_identifier']);
    $correct = $scorer->processAnswer($selected, $q['answer'], $currentLevel);

    $result = [
        'correct'     => $correct,
        'selected'    => $selected,
        'answer'      => $q['answer'],
        'image'       => $q['image'],
        'prompt'      => $q['prompt'],
        'explanation' => $q['explanation'] ?? null,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Generate new question ----
if ($result === null || isset($_POST['Submit2'])) {
    try {
        $q = $engine->generate($sessionKey);
    } catch (\Throwable $e) {
        die("Question generation threw an exception.");
    }
    if ($q === null) {
        die("Could not generate question from this module. Format may be incompatible with parseMCQ.");
    }
    $_SESSION[$sessionKey]['current'] = $q;
}

$qColors = legacy_question_colors($subject);

// ============================================================
// RENDER HEADER
// Fresh = user clicked a module from the menu (or any clean URL entry).
// In-module = clicked an answer (ansclick) or submitted a form (POST).
// Fresh arrivals pick a new random theme; in-module requests keep it.
// ============================================================
$isFreshNavigation = ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['ansclick']));

$themeImages = qdl_resolve_theme($subject, $base, $template['module_identifier'], $isFreshNavigation);

$__origScriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$_SERVER['SCRIPT_NAME'] = $base . '/' . $subject . '/modules/' . basename($modulePath);

$headerHtml = '';
try {
    ob_start();
    render_header(
        $moduleTitle . ' - KPluz.com',
        nl2br(htmlspecialchars($moduleTitle)),
        $themeImages
    );
    $headerHtml = ob_get_clean();
} catch (\Throwable $e) {
    while (ob_get_level() > 0) ob_end_clean();
    $_SERVER['SCRIPT_NAME'] = $__origScriptName;
    die('<pre style="background:#fee;padding:16px;color:#900;font-family:monospace;text-align:left;max-width:900px;margin:20px auto;white-space:pre-wrap;">' .
        "render_header threw " . get_class($e) . ":\n" . htmlspecialchars($e->getMessage()) . "\n\nAt: " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "\n\n" .
        htmlspecialchars($e->getTraceAsString()) . '</pre>');
}

$_SERVER['SCRIPT_NAME'] = $__origScriptName;

echo $headerHtml;
?>

<div style="padding:0 10px; text-align:center;">
<form method="post" action="?m=<?php echo $moduleParam; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result; ?>
    <p style="font-family:Arial,sans-serif; font-size:14pt; color:#666; margin-top:20px; max-width:480px; margin-left:auto; margin-right:auto;">
        <?php echo htmlspecialchars($t['your_answer']); ?>
        <strong style="color:#0000CC; font-size:14pt;">'<?php echo htmlspecialchars($cur['selected']); ?>'</strong>.
    </p>
    <p style="font-family:Arial,sans-serif; font-size:16pt; font-weight:700; color:<?php echo $cur['correct'] ? '#006600' : '#CC0000'; ?>; max-width:480px; margin:10px auto;">
        <?php echo $cur['correct'] ? '&#9989; ' : '&#10060; '; ?><?php echo htmlspecialchars($cur['correct'] ? $t['correct'] : $t['incorrect']); ?>
    </p>

    <?php if (!empty($cur['image'])): ?>
    <div style="max-width:480px; margin:10px auto 0; text-align:center;">
        <img src="<?php echo htmlspecialchars($cur['image']); ?>" alt=""
             onerror="this.style.display='none';"
             style="max-width:100%; max-height:280px; height:auto; border:1px solid #DDD; border-radius:8px; background:#fff;">
    </div>
    <?php endif; ?>

    <div style="max-width:480px; min-height:130px; margin:20px auto; padding:20px 26px; background:<?php echo htmlspecialchars($qColors['bg']); ?>; border:2px solid <?php echo htmlspecialchars($qColors['border']); ?>; border-radius:10px; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-family:Arial,sans-serif; box-sizing:border-box;">
        <div style="width:100%; font-size:15pt; color:#333; line-height:1.55;">
            <strong style="color:#800080;"><?php echo htmlspecialchars($t['question_label']); ?></strong><br>
            <?php echo htmlspecialchars($cur['prompt']); ?>
        </div>
    </div>

    <p style="font-family:Arial,sans-serif; font-size:14pt; color:#800080; max-width:480px; margin:10px auto;">
        <?php echo htmlspecialchars($t['answer_label']); ?>
        <strong style="color:#CC0066; font-size:15pt;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>

    <?php if (!empty($cur['explanation'])): ?>
    <div style="max-width:480px; margin:10px auto; padding:14px 20px; background:#FFFDF0; border:1px solid <?php echo htmlspecialchars($qColors['border']); ?>; border-radius:10px; font-family:Arial,sans-serif; font-size:13pt; color:#333; text-align:left; line-height:1.5; box-sizing:border-box;">
        <strong style="color:#800080;"><?php echo htmlspecialchars($t['explanation_label']); ?></strong>
        <?php echo htmlspecialchars($cur['explanation']); ?>
    </div>
    <?php endif; ?>

    <input type="submit" name="Submit2" value="<?php echo htmlspecialchars(' ' . $t['new_question'] . ' '); ?>" style="margin:30px 0; font-family:Arial,sans-serif;">
<?php else: ?>
    <?php if (!empty($q['image'])): ?>
    <div style="max-width:480px; margin:10px auto 0; text-align:center;">
        <img src="<?php echo htmlspecialchars($q['image']); ?>" alt=""
             onerror="this.style.display='none';"
             style="max-width:100%; max-height:280px; height:auto; border:1px solid #DDD; border-radius:8px; background:#fff;">
    </div>
    <?php endif; ?>

    <div style="max-width:480px; min-height:130px; margin:20px auto; padding:20px 26px; background:<?php echo htmlspecialchars($qColors['bg']); ?>; border:2px solid <?php echo htmlspecialchars($qColors['border']); ?>; border-radius:10px; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-family:Arial,sans-serif; box-sizing:border-box;">
        <div style="width:100%; font-size:15pt; color:#333; line-height:1.55;">
            <?php echo htmlspecialchars($q['prompt']); ?>
        </div>
    </div>

    <p style="font-family:Arial,sans-serif; font-size:14pt; color:#800080; margin:10px auto; max-width:480px;">
        <?php echo htmlspecialchars($t['click_to_answer']); ?>
    </p>

    <?php
    $choices = $q['choices'];
    $rows = (count($choices) <= 3) ? [$choices] : array_chunk($choices, 2);
    ?>
    <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
        <?php foreach ($rows as $row): ?>
        <tr>
            <?php foreach ($row as $c): ?>
            <td align="center" valign="middle">
                <a href="?m=<?php echo $moduleParam; ?>&amp;ansclick=<?php echo urlencode($c); ?>"
                   style="display:flex; align-items:center; justify-content:center; min-width:170px; min-height:64px; max-width:280px; padding:12px 18px; border:2px solid #888888; border-radius:8px; background:#fff; text-decoration:none; color:#0000CC; font-family:Arial,sans-serif; font-size:16pt; font-weight:700; text-align:center; word-break:break-word; box-sizing:border-box; line-height:1.3;">
                    <?php echo htmlspecialchars($c); ?>
                </a>
            </td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>

    <input type="submit" name="Submit2" value="<?php echo htmlspecialchars(' ' . $t['new_question'] . ' '); ?>" style="margin:30px 0; font-family:Arial,sans-serif;">
<?php endif; ?>

<?php if ($isMultiLevel): ?>
    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080"><?php echo htmlspecialchars($t['difficulty_prompt']); ?></font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($module_levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo htmlspecialchars($l); ?>" <?php echo $currentLevel === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo htmlspecialchars($l); ?></b>
                    </font></font>
                </td>
            <?php endforeach; ?>
        </tr></table>
    </div>
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>

<?php
render_footer();

if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();

while (ob_get_level() > 0) ob_end_flush();