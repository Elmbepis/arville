<?php
// english/modules/word-clines.php
// Word Clines — pick the word that best completes a 5-word ordered sequence.
// 2 levels × grade-aware pool breadth (see resolve_word_clines_pool).
// 3 choices always: correct word + 2 distractors, laid out 1×3.

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
$moduleTitle = 'Word Clines';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Pool selection (§4.4 — grade widens breadth) ----
// Legacy: session level was hardcoded "Easy" and $grd was never assigned, so
// the full 37-item pool was always used regardless of level/grade.
// Modern: Easy grows with grade; Hard uses the full pool.
function resolve_word_clines_pool(string $lvl, int $grd): array {
    if ($lvl === 'Easy') {
        if ($grd <= 2) return range(0, 14);   // 15 items: frequency + speech + temperature
        if ($grd <= 4) return range(0, 19);   // 20 items: + size
        if ($grd <= 7) return range(0, 23);   // 24 items: + speed
        return range(0, 28);                   // 29 items: + emotion
    }
    return range(0, 36);                       // 37 items: all
}

// ---- Data (§5.1) — pre-parsed; typos fixed ----
$items = [
    // 0-4  frequency (never &#8596; always)
    ['seq' => 'never, occasionally, ____, frequently, always',      'correct' => 'usually',      'wrong' => ['rarely',      'seldom']],
    ['seq' => '____, seldom, occasionally, frequently, always',     'correct' => 'never',        'wrong' => ['usually',     'regularly']],
    ['seq' => 'rarely, occasionally, usually, frequently, ____',    'correct' => 'always',       'wrong' => ['regularly',   'seldom']],
    ['seq' => 'rarely, ____, occasionally, regularly, frequently',  'correct' => 'seldom',       'wrong' => ['never',       'always']],
    ['seq' => 'never, rarely, seldom, ____, frequently',            'correct' => 'occasionally', 'wrong' => ['usually',     'always']],
    // 5-9  speech (whispered &#8596; shouted)
    ['seq' => '____, murmured, muttered, said, exclaimed',          'correct' => 'whispered',    'wrong' => ['muttered',    'shouted']],
    ['seq' => 'whispered, murmured, said, exclaimed, ____',         'correct' => 'shouted',      'wrong' => ['muttered',    'uttered']],
    ['seq' => 'whispered, ____, said, exclaimed, yelled',           'correct' => 'murmured',     'wrong' => ['roared',      'shouted']],
    ['seq' => 'murmured, ____, said, exclaimed, shouted',           'correct' => 'muttered',     'wrong' => ['yelled',      'whispered']],
    ['seq' => 'murmured, muttered, ____, exclaimed, yelled',        'correct' => 'said',         'wrong' => ['shouted',     'whispered']],
    // 10-14  temperature (freezing &#8596; scorching)
    ['seq' => '____, chilly, cold, warm, hot',                      'correct' => 'freezing',     'wrong' => ['tepid',       'scorching']],
    ['seq' => 'cold, ____, tepid, warm, scorching',                 'correct' => 'chilly',       'wrong' => ['freezing',    'hot']],
    ['seq' => 'cold, chilly, ____, hot, sweltering',                'correct' => 'warm',         'wrong' => ['burning',     'freezing']],
    ['seq' => 'freezing, cold, warm, hot, ____',                    'correct' => 'scorching',    'wrong' => ['chilly',      'tepid']],
    ['seq' => 'freezing, chilly, ____, warm, hot',                  'correct' => 'tepid',        'wrong' => ['cold',        'scorching']],
    // 15-19  size (microscopic &#8596; enormous)
    ['seq' => 'microscopic, tiny, ____, big, enormous',             'correct' => 'small',        'wrong' => ['huge',        'immense']],
    ['seq' => '____, tiny, midsize, big, enormous',                 'correct' => 'microscopic',  'wrong' => ['small',       'huge']],
    ['seq' => 'microscopic, ____, small, midsize, huge',            'correct' => 'tiny',         'wrong' => ['big',         'jumbo']],
    ['seq' => 'tiny, small, big, huge, ____',                       'correct' => 'immense',      'wrong' => ['minuscule',   'midsize']],
    ['seq' => 'minute, big, ____, enormous, gigantic',              'correct' => 'huge',         'wrong' => ['titanic',     'immense']],
    // 20-23  speed (slow &#8596; supersonic)
    ['seq' => '____, sluggish, quick, rapid, supersonic',           'correct' => 'slow',         'wrong' => ['speedy',      'blistering']],
    ['seq' => 'creeping, slow, swift, ____, supersonic',            'correct' => 'rapid',        'wrong' => ['sluggish',    'quick']],
    ['seq' => 'slow, fast, rapid, blistering, ____',                'correct' => 'supersonic',   'wrong' => ['quick',       'swift']],
    ['seq' => 'creeping, slow, sluggish, ____, swift',              'correct' => 'quick',        'wrong' => ['rapid',       'supersonic']],
    // 24-28  emotion (heartbroken &#8596; ecstatic)
    ['seq' => '____, miserable, gloomy, unemotional, cheerful',     'correct' => 'heartbroken',  'wrong' => ['sad',         'sorry']],
    ['seq' => 'heartbroken, ____, sad, happy, delighted',           'correct' => 'mournful',     'wrong' => ['unemotional', 'cheery']],
    ['seq' => 'gloomy, ____, happy, joyful, ecstatic',              'correct' => 'contented',    'wrong' => ['jubilant',    'delighted']],
    ['seq' => 'sad, contented, happy, joyful, ____',                'correct' => 'ecstatic',     'wrong' => ['unemotional', 'cheerful']],
    ['seq' => 'miserable, sad, happy, ____, overjoyed',             'correct' => 'delighted',    'wrong' => ['unemotional', 'contented']],
    // 29-32  movement (crept &#8596; sprinted)
    ['seq' => '____, walked, loped, jogged, ran',                   'correct' => 'crept',        'wrong' => ['darted',      'sprinted']],
    ['seq' => 'walked, jogged, darted, ____, sprinted',             'correct' => 'ran',          'wrong' => ['strode',      'crept']],
    ['seq' => 'walked, strode, ____, darted, sprinted',             'correct' => 'jogged',       'wrong' => ['ran',         'crept']],
    ['seq' => 'crept, loped, jogged, ran, ____',                    'correct' => 'sprinted',     'wrong' => ['strode',      'walked']],
    // 33-36  intelligence (idiot &#8596; genius)
    ['seq' => 'idiot, ____, moron, average, brilliant',             'correct' => 'imbecile',     'wrong' => ['dull',        'clever']],
    ['seq' => '____, imbecile, average, bright, genius',            'correct' => 'idiot',        'wrong' => ['average',     'dull']],
    ['seq' => 'imbecile, moron, smart, ____, genius',               'correct' => 'brilliant',    'wrong' => ['dull',        'average']],
    ['seq' => 'dull, average, smart, brilliant, ____',              'correct' => 'genius',       'wrong' => ['bright',      'clever']],
];

// ---- Helpers (§8.4, §8.6) ----
function word_clines_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:520px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}
function render_word_clines_seq(string $seq, string $answer = ''): string {
    if ($answer === '') {
        return htmlspecialchars($seq);
    }
    $parts = explode('____', $seq);
    if (count($parts) === 2) {
        return htmlspecialchars($parts[0])
             . '<strong style="color:#CC0066;">' . htmlspecialchars($answer) . '</strong>'
             . htmlspecialchars($parts[1]);
    }
    return htmlspecialchars($seq);
}

// ---- No-repeat picker (§6.2) ----
function pick_word_clines_item(array $items, array $poolIdxs, string $sessionKey, string $lvl): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($poolIdxs as $idx) {
        if (!in_array("$lvl:$idx", $used, true)) $available[$idx] = $items[$idx];
    }
    if (empty($available)) {
        // Pool exhausted — clear only this level's entries, preserving the other
        $used = array_values(array_filter($used, fn($k) => strpos($k, "$lvl:") !== 0));
        foreach ($poolIdxs as $idx) $available[$idx] = $items[$idx];
    }
    $idx = array_rand($available);
    $item = $available[$idx];
    $used[] = "$lvl:$idx";
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;
    return $item;
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $poolIdxs = resolve_word_clines_pool($lvl, $grd);
    $item     = pick_word_clines_item($items, $poolIdxs, $sessionKey, $lvl);

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'seq'     => $item['seq'],
        'choices' => $choices,
        'correct' => $item['correct'],
        'lvl'     => $lvl,
    ];
}

// ---- Render (§8, §9, §10) ----
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $seqFilled = render_word_clines_seq($cur['seq'], $cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:520px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:520px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php word_clines_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.7;">'
    . $seqFilled
    . '</div>'
  , 130); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:520px;margin:10px auto;">
    Best Answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:520px;text-wrap:balance;">
    Click on the word that best completes this word cline.
  </div>
  <?php word_clines_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.7;">'
    . htmlspecialchars($q['seq'])
    . '</div>'
  , 130); ?>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
    <tr>
    <?php foreach ($q['choices'] as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:200px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0" style="margin:0 auto;"><tr>
    <?php foreach ($levels as $l): ?>
      <td align="center">
        <label style="font:9pt Arial,sans-serif;color:#800080;">
          <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b>
        </label>
      </td>
    <?php endforeach; ?>
    </tr></table>
  </div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>