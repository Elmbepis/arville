<?php
// q-display-legacy.php — displays legacy question-set modules
// v22: q-display owns theme selection. Resolves per-subject theme pools
//      internally and passes the resolved array to render_header() via
//      its $theme_images parameter. Container stays untouched — when
//      $theme_images is non-empty, container just uses it.
//
// Pools (editable at top of qdl_resolve_theme):
//   math    — paper-69, paper-70, wquiz-01..15     (math/images/images/)
//   english — ex-23..ex-27                          (English/images/)
//   ap      — testap01                              (AP/modules/images/, -title/-spacer)
//   science — squiz-20..squiz-24                    (science/images/images/)
//   other   — English ex-23 defaults
//
// DEBUG (remove before production — see DEBUG START/END markers):
//   ?debug_read=1   — plaintext dump of debug-ap.log
//   ?debug_early=1  — minimal early check
//   ?debug_theme=1  — legacy theme diagnostic

ob_start();

// ============================================================
// === DEBUG START ===
// ============================================================
$__logFile = __DIR__ . '/debug-ap.log';

function dbg($msg, $level = 'log') {
    global $__logFile;
    static $t0 = null;
    if ($t0 === null) $t0 = microtime(true);
    $ms   = number_format((microtime(true) - $t0) * 1000, 1);
    $safe = str_replace(['\\', '`', '$', '</'], ['\\\\', '\\`', '\\$', '<\\/'], (string)$msg);
    @file_put_contents($__logFile, date('H:i:s') . ".{$ms} [{$level}] {$msg}\n", FILE_APPEND);
    echo "<script>console.{$level}(`[KPLUZ +{$ms}ms] {$safe}`);</script>\n";
}

function step($s) {
    $GLOBALS['__step'] = $s;
    dbg("STEP: {$s}");
}

if (isset($_GET['debug_read'])) {
    header('Content-Type: text/plain; charset=utf-8');
    if (!is_file($__logFile)) {
        echo "No debug-ap.log yet. Load any page first.\n";
        exit;
    }
    $lines = file($__logFile, FILE_IGNORE_NEW_LINES);
    $show  = array_slice($lines, -500);
    echo "=== debug-ap.log (last " . count($show) . " of " . count($lines) . " lines) ===\n\n";
    echo implode("\n", $show) . "\n";
    exit;
}

@ini_set('display_errors', '1');
@ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

register_shutdown_function(function () {
    $err = error_get_last();
    $fatalTypes = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR];
    if ($err !== null && in_array($err['type'], $fatalTypes, true)) {
        while (ob_get_level() > 0) ob_end_flush();
        $curStep = $GLOBALS['__step'] ?? '(none)';
        dbg("FATAL: {$err['message']} at " . basename($err['file']) . ":{$err['line']} | last step: {$curStep}", 'error');
        echo '<div style="background:#fee;border:3px solid #c00;padding:16px;margin:20px auto;max-width:800px;font-family:Arial;text-align:left;">';
        echo '<strong style="color:#900;font-size:14pt;">FATAL ERROR</strong><br>';
        echo htmlspecialchars($err['message']);
        echo '<br><small style="color:#666;">' . htmlspecialchars($err['file']) . ':' . $err['line'] . '</small>';
        echo '<br><small style="color:#666;">Last step: <strong>' . htmlspecialchars($curStep) . '</strong></small>';
        echo '<br><small><a href="?debug_read=1">Read full log</a></small>';
        echo '</div>';
    }
});

$__dbgStart = date('Y-m-d H:i:s');
@file_put_contents($__logFile, "\n\n==== {$__dbgStart} ====\n", FILE_APPEND);
// ============================================================
// === DEBUG END ===
// ============================================================

// ============================================================
// THEME RESOLUTION — q-display owns theme selection
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

/**
 * Resolves a theme array for the given subject + module.
 * Falls back to qdl_default_theme() (English ex-23) if no pool config
 * exists or every prefix in the pool is missing slot files.
 */
function qdl_resolve_theme($subject, $base, $moduleId) {
    $slots = ['top', 'top2', 'left', 'right', 'content', 'bottom'];

    // ============================================================
    // EDIT POOLS HERE — add new subjects by adding config entries
    // ============================================================
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
            'score_top'    => 'AP/modules/images/score-top-1.jpg',
            'score_bottom' => 'AP/modules/images/score-bottom-1.jpg',
        ],
        'science' => [
            'prefixes'     => ['squiz-20', 'squiz-21', 'squiz-22', 'squiz-23', 'squiz-24'],
            'folder'       => 'science/images/images/',
            'score_top'    => 'science/images/score-top-5.jpg',
            'score_bottom' => 'science/images/score-bottom-5.jpg',
        ],
    ];

    if (!isset($configs[$subject])) {
        dbg("theme: no pool for subject='{$subject}', using English defaults");
        return qdl_default_theme($base);
    }

    $cfg     = $configs[$subject];
    $aliases = $cfg['aliases'] ?? [];

    // Find all prefixes whose 6 slot files all exist on disk
    $valid = [];
    foreach ($cfg['prefixes'] as $p) {
        if (qdl_resolve_prefix($p, $cfg['folder'], $slots, $aliases) !== null) {
            $valid[] = $p;
        }
    }

    if (empty($valid)) {
        dbg("theme: subject='{$subject}' pool has no valid prefixes on disk, using English defaults", 'warn');
        return qdl_default_theme($base);
    }

    dbg("theme: subject='{$subject}' valid prefixes=" . implode(',', $valid));

    // Session-stable rotation per module
    $rotKey = 'qdl_theme_' . $subject;
    if (!isset($_SESSION[$rotKey])) $_SESSION[$rotKey] = [];

    $picked = $_SESSION[$rotKey][$moduleId] ?? null;
    if ($picked === null || !in_array($picked, $valid, true)) {
        $picked = $valid[array_rand($valid)];
        $_SESSION[$rotKey][$moduleId] = $picked;
        dbg("theme: picked NEW prefix='{$picked}' for module='{$moduleId}'");
    } else {
        dbg("theme: reused prefix='{$picked}' for module='{$moduleId}'");
    }

    $scoreTop    = qdl_pick_score($cfg['score_top'],    'English/images/score-top-3.jpg');
    $scoreBottom = qdl_pick_score($cfg['score_bottom'], 'English/images/score-bottom-3.jpg');

    return qdl_build_theme($picked, $cfg['folder'], $base, $scoreTop, $scoreBottom, $aliases);
}

// ============================================================
// BOOT
// ============================================================
step('boot');
dbg('PHP ' . PHP_VERSION . ' | SAPI=' . PHP_SAPI);
dbg('GET: ' . json_encode($_GET));
dbg('REQUEST_URI: ' . ($_SERVER['REQUEST_URI'] ?? '?'));
dbg('SCRIPT_NAME: ' . ($_SERVER['SCRIPT_NAME'] ?? '?'));

session_name('KPLUZ_SESSION');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
dbg('session status: ' . session_status() . ' | id=' . session_id());

if (!is_array($_SESSION)) {
    dbg('$_SESSION is not an array — session_start failed', 'error');
    $_SESSION = [];
}
dbg('session keys: ' . json_encode(array_keys($_SESSION)));
dbg('logged_in: ' . (($_SESSION['logged_in'] ?? false) ? 'yes' : 'no'));

$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
dbg('base: ' . $base);

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    dbg('NOT logged in — redirecting', 'warn');
    header("Location: $base/login.php");
    exit();
}

if (isset($_GET['debug_early'])) {
    while (ob_get_level() > 0) ob_end_clean();
    header('Content-Type: text/plain; charset=utf-8');
    echo "=== EARLY DEBUG ===\n";
    echo "REACHED q-display-legacy.php\n";
    echo "PHP: " . PHP_VERSION . "\n";
    echo "Base: $base\n";
    echo "GET: " . json_encode($_GET) . "\n";
    echo "SESSION keys: " . json_encode(array_keys($_SESSION)) . "\n";
    echo "Logged in: " . (($_SESSION['logged_in'] ?? false) ? 'yes' : 'no') . "\n";
    exit;
}

// ============================================================
// GRADE
// ============================================================
step('grade');
$grd = null;
if (isset($_SESSION['grade']) && is_numeric($_SESSION['grade'])) {
    $grd = (int)$_SESSION['grade'];
} elseif (isset($_SESSION['user_grade']) && is_numeric($_SESSION['user_grade'])) {
    $grd = (int)$_SESSION['user_grade'];
}
dbg('grd from session: ' . var_export($grd, true));

// ============================================================
// REQUIRES
// ============================================================
step('requires');
dbg('requiring scorer.php');
require_once __DIR__ . '/scorer.php';
dbg('requiring q-engine.php');
require_once __DIR__ . '/q-engine.php';
dbg('requiring container.php');
require_once __DIR__ . '/container.php';
dbg('container version: ' . (defined('KPLUZ_CONTAINER_VERSION') ? KPLUZ_CONTAINER_VERSION : 'UNDEFINED'));

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
step('module-resolution');
$moduleKey = $_GET['m'] ?? '';
dbg('moduleKey: ' . $moduleKey);

if (!preg_match('#^[a-z0-9_\-/]+$#i', $moduleKey)) {
    dbg('INVALID module key format', 'error');
    die("Invalid module.");
}

$modulePath = __DIR__ . '/' . $moduleKey;
if (!file_exists($modulePath) && file_exists($modulePath . '.php')) {
    $modulePath .= '.php';
}
dbg('modulePath: ' . $modulePath . ' | exists: ' . (file_exists($modulePath) ? 'yes' : 'no'));

if (!file_exists($modulePath)) {
    dbg('MODULE NOT FOUND', 'error');
    die("Module not found: " . htmlspecialchars($moduleKey));
}

$parts         = explode('/', $moduleKey);
$subjectFolder = $parts[0];
$subject       = strtolower($subjectFolder);
dbg('subjectFolder: ' . $subjectFolder . ' | subject: ' . $subject);

// ============================================================
// LANGUAGE
// ============================================================
step('language');
$englishSubjects = ['english', 'math', 'science', 'tle'];
$uiLang = in_array($subject, $englishSubjects, true) ? 'en' : 'fil';
dbg('uiLang: ' . $uiLang);

$uiStrings = [
    'en' => [
        'your_answer'     => 'Your answer is',
        'correct'         => 'That is correct!',
        'incorrect'       => 'That is incorrect.',
        'question_label'  => 'Question:',
        'answer_label'    => 'Answer:',
        'click_to_answer' => 'Click on your answer below.',
        'new_question'    => 'New Question',
    ],
    'fil' => [
        'your_answer'     => 'Ang sagot mo ay',
        'correct'         => 'Ito ay tumpak!',
        'incorrect'       => 'Ito ay hindi tumpak.',
        'question_label'  => 'Tanong:',
        'answer_label'    => 'Sagot:',
        'click_to_answer' => 'Pindutin ang iyong sagot sa ibaba.',
        'new_question'    => 'Bagong Tanong',
    ],
];
$t = $uiStrings[$uiLang];
$_SESSION['last_subject'] = $subject;

// ============================================================
// DB
// ============================================================
step('db-connect');
dbg('connecting to DB...');
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) {
    dbg('DB connect error: ' . $conn->connect_error, 'error');
    die("Connection failed: " . $conn->connect_error);
}
dbg('DB connected');

if ($grd === null && !empty($_SESSION['user_id'])) {
    dbg('grd null — querying users.grade for user_id=' . $_SESSION['user_id']);
    $stmt = $conn->prepare("SELECT grade FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $r = $stmt->get_result()->fetch_assoc();
    if ($r && is_numeric($r['grade'])) {
        $grd = (int)$r['grade'];
        $_SESSION['grade'] = $grd;
        dbg('grd from DB: ' . $grd);
    }
    $stmt->close();
}
if ($grd === null) { $grd = 1; dbg('grd defaulted to 1', 'warn'); }

// ============================================================
// LOAD MODULE
// ============================================================
step('module-load');
dbg('loading ' . basename($modulePath));
$questions = [];
unset($_SESSION['title'], $_SESSION['tnum']);

try {
    ob_start();
    require $modulePath;
    $__modBuf = ob_get_clean();
    dbg('module loaded. output buffer=' . strlen($__modBuf) . ' bytes');
} catch (\Throwable $e) {
    while (ob_get_level() > 0) ob_end_clean();
    dbg('MODULE EXCEPTION: ' . get_class($e) . ': ' . $e->getMessage() . ' at ' . basename($e->getFile()) . ':' . $e->getLine(), 'error');
    dbg('  trace: ' . $e->getTraceAsString());
    die('<pre style="background:#fee;padding:16px;color:#900;font-family:monospace;text-align:left;max-width:900px;margin:20px auto;white-space:pre-wrap;">' .
        "Module load threw " . get_class($e) . ":\n" . htmlspecialchars($e->getMessage()) . "\n\nAt: " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "\n\n" .
        htmlspecialchars($e->getTraceAsString()) . '</pre>');
}

dbg('questions: type=' . gettype($questions) . ' count=' . (is_array($questions) ? count($questions) : 'N/A'));
dbg('session title: ' . ($_SESSION['title'] ?? '(none)'));

header_remove();
header('Content-Type: text/html; charset=UTF-8');

$moduleTitle = $_SESSION['title'] ?? basename($modulePath, '.php');
dbg('moduleTitle: ' . $moduleTitle);

if (!is_array($questions) || empty($questions)) {
    dbg('$questions is empty or not array', 'error');
    die("Module did not define a valid \$questions array.");
}

if (!empty($questions)) {
    $fk = array_key_first($questions);
    $fv = $questions[$fk];
    dbg('first question key=' . var_export($fk, true) . ' type=' . gettype($fv));
    dbg('first question value=' . (is_string($fv) ? htmlspecialchars($fv) : json_encode($fv)));
}

// ============================================================
// ENGINE
// ============================================================
step('template-engine');
$template = [
    'title'             => $moduleTitle,
    'subject'           => $subject,
    'module_identifier' => basename($modulePath),
    'type'              => 'static',
    'levels'            => ['Easy'],
    'image_base'        => $base . '/' . $subjectFolder . '/modules/qimages/',
    'questions'         => $questions,
];
dbg('template built');

try {
    $engine = new QEngine($template, $template['module_identifier']);
    $engine->setLevel('Easy');
    dbg('QEngine ready. level=' . $engine->getLevel());
} catch (\Throwable $e) {
    dbg('QENGINE EXCEPTION: ' . $e->getMessage(), 'error');
    die("QEngine construction failed.");
}

$sessionKey = 'mod_' . md5($template['module_identifier']);
dbg('sessionKey: ' . $sessionKey);

$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current'])) {
    step('answer-click');
    dbg('ANSWER CLICK. selected=' . $_GET['ansclick']);
    $q = $_SESSION[$sessionKey]['current'];
    $selected = $_GET['ansclick'];

    $scorer  = new Scorer($conn, $template['module_identifier']);
    $correct = $scorer->processAnswer($selected, $q['answer'], 'Easy');
    dbg('scorer result: ' . ($correct ? 'correct' : 'wrong'));

    $result = [
        'correct'  => $correct,
        'selected' => $selected,
        'answer'   => $q['answer'],
        'image'    => $q['image'],
        'prompt'   => $q['prompt'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null || isset($_POST['Submit2'])) {
    step('generate-question');
    try {
        $q = $engine->generate($sessionKey);
    } catch (\Throwable $e) {
        dbg('GENERATE EXCEPTION: ' . $e->getMessage() . ' at ' . basename($e->getFile()) . ':' . $e->getLine(), 'error');
        dbg('  trace: ' . $e->getTraceAsString());
        die("Question generation threw an exception. See ?debug_read=1.");
    }
    if ($q === null) {
        dbg('generate() returned NULL — parseMCQ format mismatch likely', 'error');
        dbg('QEngine debug: ' . json_encode($engine->getDebug()), 'error');
        die("Could not generate question from this module. Format may be incompatible with parseMCQ. See ?debug_read=1.");
    }
    dbg('question: "' . htmlspecialchars(substr($q['prompt'], 0, 60)) . '..." answer="' . htmlspecialchars($q['answer']) . '" choices=' . count($q['choices']));
    $_SESSION[$sessionKey]['current'] = $q;
}

$moduleParam = htmlspecialchars($moduleKey);
$qColors     = legacy_question_colors($subject);
dbg('qColors: bg=' . $qColors['bg'] . ' border=' . $qColors['border']);

if (isset($_GET['debug_theme'])) {
    while (ob_get_level() > 0) ob_end_clean();
    header('Content-Type: text/plain; charset=utf-8');
    echo "=== THEME DEBUG ===\n";
    echo "moduleKey: $moduleKey\n";
    echo "modulePath: $modulePath\n";
    echo "subjectFolder: $subjectFolder\n";
    echo "subject: $subject\n";
    echo "grd: $grd\n";
    echo "moduleTitle: " . htmlspecialchars($moduleTitle) . "\n";
    echo "questions: " . count($questions) . "\n";
    if (!empty($questions)) echo "first: " . htmlspecialchars((string)(reset($questions) ?: '')) . "\n";
    echo "sessionKey: $sessionKey\n";
    echo "qColors: bg={$qColors['bg']} border={$qColors['border']}\n\n";
    echo "--- qdl_resolve_theme result ---\n";
    $dbgTheme = qdl_resolve_theme($subject, $base, $template['module_identifier']);
    foreach ($dbgTheme as $k => $v) {
        echo "  $k: $v\n";
    }
    exit;
}

// ============================================================
// RESOLVE THEME + RENDER HEADER
// ============================================================
step('render-header:pre');

// q-display owns theme selection — container just renders it
$themeImages = qdl_resolve_theme($subject, $base, $template['module_identifier']);
dbg('theme resolved. top_banner=' . $themeImages['top_banner']);

// Fake SCRIPT_NAME so container:
//   1. computes $base correctly (three dirnames from depth-3 path)
//   2. emits <body class="subject-ap"> for CSS targeting
//   3. builds logo link with correct ?subj=
$__origScriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$_SERVER['SCRIPT_NAME'] = $base . '/' . $subject . '/modules/' . basename($modulePath);
dbg('SCRIPT_NAME swapped to: ' . $_SERVER['SCRIPT_NAME']);

$headerHtml = '';
try {
    ob_start();
    render_header(
        $moduleTitle . ' - KPluz.com',
        nl2br(htmlspecialchars($moduleTitle)),
        $themeImages   // <-- non-empty: container uses these, skips its own logic
    );
    $headerHtml = ob_get_clean();
    dbg('render_header OK. header size=' . strlen($headerHtml) . ' bytes');
} catch (\Throwable $e) {
    while (ob_get_level() > 0) ob_end_clean();
    dbg('RENDER_HEADER EXCEPTION: ' . get_class($e) . ': ' . $e->getMessage() . ' at ' . basename($e->getFile()) . ':' . $e->getLine(), 'error');
    dbg('  trace: ' . $e->getTraceAsString());
    $_SERVER['SCRIPT_NAME'] = $__origScriptName;
    die('<pre style="background:#fee;padding:16px;color:#900;font-family:monospace;text-align:left;max-width:900px;margin:20px auto;white-space:pre-wrap;">' .
        "render_header threw " . get_class($e) . ":\n" . htmlspecialchars($e->getMessage()) . "\n\nAt: " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "\n\n" .
        htmlspecialchars($e->getTraceAsString()) . '</pre>');
}

step('render-header:post');
$_SERVER['SCRIPT_NAME'] = $__origScriptName;
dbg('SCRIPT_NAME restored');

echo $headerHtml;
dbg('header echoed to page');
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

</form>
<br>
<?php
step('render-score-box');
render_score_box();
dbg('score box rendered');
?>

</div>

<?php
step('render-footer');
render_footer();
dbg('footer rendered');

if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
step('done');
dbg('=== END ===');

while (ob_get_level() > 0) ob_end_flush();