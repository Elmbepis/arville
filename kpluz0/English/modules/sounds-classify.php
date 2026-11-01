<?php
// english/modules/sounds-classify.php
// Classifying Sounds — listen to an audio clip, then pick the sound's category.
// Single-tier pool: both Easy and Hard share the same 40-item pool. Grade is
// displayed in the header but does not gate content (module is designed for
// grades 0–4). 4 choices always (2×2 grid); choices are baked into each
// pool item (correct + 3 distractors), not generated.
//
// Legacy note: `$_SESSION['level']` was hardcoded to "Easy" and `$grd` was
// never used for gating — the module was effectively single-tier in production.

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
$moduleTitle = 'Classifying Sounds';
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

// ---- Pool selection (§4.3) ----
// Single flat pool. Legacy had no level or grade differentiation
// (level hardcoded, $grd unused for gating). Both levels and all grades use
// the same 40-item pool.
function resolve_sounds_tier(string $lvl, int $grd): int {
    return 1;
}

// ---- Data (§5) — verbatim from legacy ----
// Format: 'sound=correct1wrong12wrong23wrong3'
// Choices are baked in: 1 correct + 3 distractors per item.
$rawData = [
    'airplane=machine1animal2instrument3human',
    'bear=animal1machine2instrument3human',
    'bird=animal1machine2instrument3human',
    'burp=human1machine2instrument3animal',
    'bus=machine1animal2instrument3human',
    'camera=object1animal2nature3human',
    'car=machine1animal2instrument3human',
    'cat=animal1machine2instrument3human',
    'cello=instrument1animal2nature3human',
    'clarinet=instrument1animal2nature3human',
    'clock=object1animal2nature3human',
    'cow=animal1machine2instrument3human',
    'doorbell=object1animal2nature3human',
    'drum=instrument1animal2nature3human',
    'duck=animal1machine2instrument3human',
    'elephant=animal1machine2instrument3human',
    'flute=instrument1animal2nature3human',
    'goat=animal1machine2instrument3human',
    'guitar=instrument1animal2nature3human',
    'harmonica=instrument1animal2nature3human',
    'harp=instrument1animal2nature3human',
    'helicopter=machine1animal2instrument3human',
    'horse=animal1machine2instrument3human',
    'lion=animal1machine2instrument3human',
    'piano=instrument1animal2nature3human',
    'pig=animal1machine2instrument3human',
    'rooster=animal1machine2instrument3human',
    'saxophone=instrument1animal2nature3human',
    'sheep=animal1machine2instrument3human',
    'ship=machine1animal2nature3human',
    'sneeze=human1machine2instrument3animal',
    'telephone=object1animal2nature3human',
    'thunder=nature1animal2instrument3human',
    'trumpet=instrument1animal2nature3human',
    'tuba=instrument1animal2machine3human',
    'turkey=animal1machine2instrument3human',
    'ukulele=instrument1animal2nature3human',
    'violin=instrument1animal2nature3human',
    'whistle=object1animal2nature3human',
    'xylophone=instrument1animal2nature3human',
];

// ---- Pre-parse (§5.1) ----
$items = [];
foreach ($rawData as $raw) {
    $eq = strpos($raw, '=');
    if ($eq === false) continue;
    $sound = substr($raw, 0, $eq);
    $rest  = substr($raw, $eq + 1);
    if (!preg_match('/^(\w+)1(\w+)2(\w+)3(\w+)$/', $rest, $m)) continue;
    $items[] = [
        'sound'   => strtolower($sound),
        'correct' => strtolower($m[1]),
        'wrong'   => [strtolower($m[2]), strtolower($m[3]), strtolower($m[4])],
    ];
}

// ---- Helpers (§8.4, §8.6) ----
function sounds_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
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
function sounds_article(string $word): string {
    if ($word === '') return 'a';
    return in_array(strtolower($word[0]), ['a','e','i','o','u'], true) ? 'an' : 'a';
}
function sounds_type_phrase(string $type): string {
    return [
        'animal'     => 'an animal sound',
        'instrument' => "a musical instrument's sound",
        'machine'    => "a machine's sound",
        'object'     => "just an ordinary object's sound",
        'nature'     => 'a sound from nature',
        'human'      => 'a human sound',
    ][$type] ?? "a {$type} sound";
}

// ---- No-repeat picker (§6.2) ----
function pick_sounds_item(array $pool, string $sessionKey, int $tier): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        if (!in_array("t$tier:$i", $used, true)) $available[$i] = $item;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        foreach ($pool as $i => $item) $available[$i] = $item;
    }
    $idx    = array_rand($available);
    $item   = $available[$idx];
    $used[] = "t$tier:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
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
    $tier = resolve_sounds_tier($lvl, $grd);
    $pool = $items;
    if (empty($pool)) $pool = [];
    $item = pick_sounds_item($pool, $sessionKey, $tier);

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'sound'   => $item['sound'],
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
    $soundEsc   = htmlspecialchars($cur['sound']);
    $audioSrc   = 'sounds/effects/' . urlencode($cur['sound']) . '.mp3';
    $typePhrase = sounds_type_phrase($cur['correct']);
    $sArt       = ($cur['sound'] === 'thunder') ? '' : sounds_article($cur['sound']) . ' ';
    $leadIn     = ($cur['correct'] === 'human' || $cur['sound'] === 'thunder')
                  ? 'This is the sound of '
                  : 'The sound was made by ';
    $feedback   = $leadIn . $sArt . '<strong>' . $soundEsc . '</strong>, so it is '
                . '<strong style="color:#CC0066;">' . htmlspecialchars($typePhrase) . '</strong>.';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#333;max-width:480px;margin:10px auto;line-height:1.55;text-wrap:balance;"><?php echo $feedback; ?></p>
  <div style="margin:20px auto;">
    <audio controls preload="auto" style="max-width:100%;">
      <source src="<?php echo htmlspecialchars($audioSrc); ?>" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
  </div>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $audioSrc = 'sounds/effects/' . urlencode($q['sound']) . '.mp3';
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Listen to the audio clip, then click the type of sound you hear.
  </div>
  <div style="margin:20px auto;">
    <audio controls preload="auto" style="max-width:100%;">
      <source src="<?php echo htmlspecialchars($audioSrc); ?>" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
  </div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:20px auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:220px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
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