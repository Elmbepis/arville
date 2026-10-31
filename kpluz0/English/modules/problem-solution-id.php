<?php
// english/modules/problem-solution-id.php
// Identifying Problems and Solutions — MC (2 choices: problem / solution).
// Easy pool: shorter single-clause items. Hard pool: longer multi-actor items.

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleTitle = 'Identifying Problems and Solutions';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade / level ---------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Master item list ------------------------------------------------------
// Each item: [part1_text, part1_kind, part2_text, part2_kind]
//   so-items:      part1 = problem, part2 = solution
//   because-items: part1 = solution, part2 = problem
// Indices 0–13 = so-items (sbs), indices 14–28 = because-items (bss).
$allItems = [
    // ---- so-items (sbs) ----
    0  => ["Dave was hungry",                   'problem',  "so he ate two cookies.",                 'solution'],
    1  => ["Gina was thirsty",                  'problem',  "so she drank a glass of water.",         'solution'],
    2  => ["The room was dark",                 'problem',  "so Tommy turned on the lights.",         'solution'],
    3  => ["The puppy looked hungry",           'problem',  "so Liza gave it some puppy food.",       'solution'],
    4  => ["The plant is turning brown",        'problem',  "so Gary watered it.",                    'solution'],
    5  => ["Harry's bike looked flat",          'problem',  "so he pumped air into it.",              'solution'],
    6  => ["My books got wet",                  'problem',  "so I put them under the sun to dry.",    'solution'],
    7  => ["My rubber shoes were muddy",        'problem',  "so I washed them with soap.",            'solution'],
    8  => ["The cellphone shut down",           'problem',  "so Roy is recharging it.",               'solution'],
    9  => ["The glass broke into tiny pieces",  'problem',  "so my mother swept the floor.",          'solution'],
    10 => ["The bath tub was overflowing",      'problem',  "so she shut off the faucet.",            'solution'],
    11 => ["The floor looked dull",             'problem',  "so Tina waxed and polished it.",         'solution'],
    12 => ["I tracked mud into the house",      'problem',  "so I mopped the floor.",                 'solution'],
    13 => ["My toy soldier's head broke off",   'problem',  "so I glued it back into the body.",      'solution'],
    // ---- because-items (bss) ----
    14 => ["They replaced the toy's battery",       'solution', "because it wouldn't turn on.",              'problem'],
    15 => ["The plumber tightened the pipes",       'solution', "because they were leaking.",                'problem'],
    16 => ["The storekeeper mopped the floor",      'solution', "because it was wet and slippery.",          'problem'],
    17 => ["The mechanic changed the car's battery",'solution', "because the car wouldn't start.",           'problem'],
    18 => ["The man gave his daughter some water",  'solution', "because she said she was thirsty.",         'problem'],
    19 => ["Jeffrey bought a new ballpen",          'solution', "because he lost his old one.",              'problem'],
    20 => ["My teacher used her pencil",            'solution', "when her pen ran out of ink.",              'problem'],
    21 => ["We bought some gas",                    'solution', "when the car's gas tank became empty.",     'problem'],
    22 => ["I changed my shirt",                    'solution', "when I spilled coffee on the one I was wearing.", 'problem'],
    23 => ["My brother shut off the faucet tightly",'solution', "because it was dripping.",                  'problem'],
    24 => ["The carpenter fixed our roof",          'solution', "after it was damaged by a typhoon.",        'problem'],
    25 => ["Their driver waxed and polished their car", 'solution', "because it looked dull.",               'problem'],
    26 => ["Sarah used her sharpener",              'solution', "when the tip of her pencil broke off.",     'problem'],
    27 => ["Kyle used his eraser",                  'solution', "when he made a mistake.",                   'problem'],
    28 => ["I put clear tape on a page of my book", 'solution', "because it was torn.",                      'problem'],
];

// ---- Pool indices by level -------------------------------------------------
$easyIdx = [0,1,2,3,4,5,6,7, 14,15,16,17,18];                                 // 13 items
$hardIdx = [8,9,10,11,12,13, 19,20,21,22,23,24,25,26,27,28];                   // 16 items

// ---- Grade-aware pool resolver ---------------------------------------------
// Easy     : simple items only (any grade).
// Hard 0-2 : both pools merged (29 items) — young kids see breadth, not depth.
// Hard 3+  : harder items only (16 items).
function resolve_ps_pool(string $lvl, int $grd, array $easyIdx, array $hardIdx): array {
    if ($lvl === 'Easy') return $easyIdx;
    if ($grd <= 2)       return array_merge($easyIdx, $hardIdx);
    return $hardIdx;
}

// ---- Anti-orphan helper ----------------------------------------------------
function ps_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// ---- Centered box helper (480 px, both-axis centered) ----------------------
function ps_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $poolIdxs = resolve_ps_pool($lvl, $grd, $easyIdx, $hardIdx);

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($poolIdxs, fn($i) => !in_array($i, $used, true)));
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($i) => !in_array($i, $poolIdxs, true)));
        $available = $poolIdxs;
    }
    $pickIdx = $available[array_rand($available)];
    $used[] = $pickIdx;
    if (count($used) > 200) $used = array_slice($used, -150);
    $_SESSION[$sessionKey]['used'] = $used;

    [$p1, $k1, $p2, $k2] = $allItems[$pickIdx];
    $target = (rand(1, 2) === 1) ? 1 : 2;
    $correct = ($target === 1) ? $k1 : $k2;

    $_SESSION[$sessionKey]['current'] = [
        'p1'      => $p1,
        'p2'      => $p2,
        'target'  => $target,
        'correct' => $correct,
        'lvl'     => $lvl,
        'grd'     => $grd,
        'idx'     => $pickIdx,
    ];
}

// ---- Render ----------------------------------------------------------------
$theme = [
    'top_banner'=>$base.'/math/images/images/paper-69-top.jpg',
    'title_bg'=>$base.'/math/images/images/paper-69-top2.jpg',
    'left_side'=>$base.'/math/images/images/paper-69-left.jpg',
    'right_side'=>$base.'/math/images/images/paper-69-right.jpg',
    'content_bg'=>$base.'/math/images/images/paper-69-content.jpg',
    'bottom_banner'=>$base.'/math/images/images/paper-69-bottom.jpg',
    'score_top'=>$base.'/math/images/score-top-1.jpg',
    'score_bottom'=>$base.'/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $theme);

// Helper: sentence HTML with target half highlighted in pink, other half purple
function ps_sentence_html(array $cur): string {
    $p1 = ps_bind_last_words($cur['p1']);
    $p2 = ps_bind_last_words($cur['p2']);
    $pink   = 'color:#CC0066;font-weight:700;';
    $purple = 'color:#800080;font-weight:700;';
    if ($cur['target'] === 1) {
        return '<span style="' . $pink . '">' . $p1 . '</span> <span style="' . $purple . '">' . $p2 . '</span>';
    }
    return '<span style="' . $purple . '">' . $p1 . '</span> <span style="' . $pink . '">' . $p2 . '</span>';
}
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong></p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#800080;max-width:480px;margin:14px auto 10px;line-height:1.55;">The red part of the given text contains the <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['correct']); ?></strong>.</p>
  <?php ps_box(
      '<div style="width:100%;font-size:19pt;line-height:1.55;text-wrap:balance;">'
    . ps_sentence_html($cur)
    . '</div>',
      160
  ); ?>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else: $q = $_SESSION[$sessionKey]['current']; ?>
  <?php ps_box(
      '<div style="width:100%;font-size:19pt;line-height:1.25;text-wrap:balance;">'
    . ps_sentence_html($q)
    . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:600;color:#800080;max-width:480px;margin:10px auto 14px;line-height:1.25;">Does the red part of the text above contain the problem or the solution?</p>
  <div style="font-family:Arial,sans-serif;font-size:14pt;font-weight:500;color:#777777;margin-bottom:14px;">Click on your answer.</div>
  <table border="0" cellspacing="20" cellpadding="0" style="margin:0 auto;"><tr>
    <td align="center"><a href="?ansclick=problem" style="display:block;min-width:150px;padding:16px 32px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;">problem</a></td>
    <td align="center"><a href="?ansclick=solution" style="display:block;min-width:150px;padding:16px 32px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;">solution</a></td>
  </tr></table>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>