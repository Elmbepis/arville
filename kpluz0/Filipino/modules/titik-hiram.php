<?php
// filipino/modules/titik-hiram.php
// Mga Hiram na Titik sa mga Salita — find the borrowed letter (C, F, J, Ñ, Q, V, X, Z) used in a word.
// Two levels (Easy = Madali / Hard = Mahirap). The legacy page had no grade logic, so grade has no effect.
//
// CONVERSION NOTES
//  - Legacy Medium (Katamtaman) folded into Hard; Hard keeps its own 31-word list. The 23 Medium words
//    are not carried over.
//  - Data: the legacy "!" marker (= ñ) is converted once, when the lists are parsed. Each word becomes
//    [letters, index and value of the first borrowed letter, pool of distinct non-borrowed letters].
//  - Bugs fixed in the choice builder: the distractor index stopped one short of the pool (the last letter of a
//    word was never used), the "must differ" loop could never finish for some small pools, and a coin flip
//    ($start) randomly left the first letter out of the pool. Distractors are now two distinct non-borrowed
//    letters of the word (case-insensitive), drawn from the whole word.
//  - The picture check (strpos against "*vakulvintaIvatanmosque") matched any word that was a substring of that
//    string; it is now an explicit list: vakul, vinta, Ivatan, mosque.
//  - No-repeat is per word with a tier-prefixed key; clears only the current level when its list is exhausted.
//  - Dead code removed: mysql_* / FPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, unused $qred/$qvio font strings, tile background image (question-paper-15), FrontPage JS, legacy chrome.

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
$moduleTitle = 'Mga Hiram na Titik sa mga Salita';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$imgBase = '../images/bokabularyo/';   // same relative location the legacy page used; adjust if images moved

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy' => 'Madali', 'Hard' => 'Mahirap'];
if (isset($_POST['level']) && isset($levels[$_POST['level']])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!isset($levels[$_SESSION['level']])) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Data (§5) ----
// Legacy format: "!" stands for the letter n-tilde.
$legacyWords = [
    'Easy' => [
        'Alex', 'Cebu', 'Cubao', 'Carla', 'Davao', 'do!a',
        'Jomar', 'Jolo', 'Jacob', 'Jaime', 'Jose', 'Juan',
        'Luzon', 'Qatar', 'Rizal', 'Roxas', 'se!or', 'Texas',
        'Victor', 'vinta', 'Vigan', 'vakul',
    ],
    'Hard' => [
        'Bonifacio', 'Cagayan', 'Camarines Sur', 'Carmelita', 'Carolina',
        'Carvajal', 'Conchita', 'Dasmari!as', 'Davao del Norte', 'Davao del Sur',
        'Ferdinand', 'Francisco', 'Florante', 'Fajardo', 'Flores de Mayo',
        'Juancho', 'Las Pi!as', 'Los Ba!os', 'Malaca!ang', 'Manila Zoo',
        'Nueva Ecija', 'Nueva Vizcaya', 'Para!aque', 'Pe!afrancia', 'Quirino',
        'San Fernando', 'Santo Ni!o', 'Trece Martirez', 'Valenzuela', 'Zambales',
        'Zimbabwe',
    ],
];
$pictureWords = ['vakul', 'vinta', 'Ivatan', 'mosque'];   // words that have a picture (file = lowercase word .jpg)

function ts_is_borrowed(string $ch): bool {
    return in_array(strtolower($ch), ['c', 'f', 'j', "\u{00F1}", 'q', 'v', 'x', 'z'], true);
}

function ts_build_entry(string $legacy): array {
    $word  = str_replace('!', "\u{00F1}", $legacy);
    $chars = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);
    $ul = null; $ans = ''; $seen = []; $pool = [];
    foreach ($chars as $i => $c) {
        if (ts_is_borrowed($c)) {
            if ($ul === null) { $ul = $i; $ans = $c; }          // the first borrowed letter is the answer
        } elseif ($c !== ' ' && $c !== '.') {
            $k = strtolower($c);
            if (!isset($seen[$k])) { $seen[$k] = true; $pool[] = $c; }   // distinct distractor letters
        }
    }
    return ['word' => $word, 'chars' => $chars, 'ul' => $ul, 'ans' => $ans, 'pool' => $pool];
}

$bank = [];
foreach ($legacyWords as $lv => $list) {
    foreach ($list as $w) $bank[$lv][$w] = ts_build_entry($w);
}

// ---- Helpers ----
// Escape for HTML and write n-tilde as an entity so the page works whatever charset the header declares.
function ts_esc(string $s): string {
    return str_replace("\u{00F1}", '&ntilde;', htmlspecialchars($s));
}

function ts_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// The word in large pink letters; optionally underline the answer letter in blue.
function ts_word_html(array $chars, ?int $ul): string {
    $n = count($chars);
    $pt = ($n <= 6) ? 48 : (($n <= 9) ? 42 : (($n <= 12) ? 36 : 30));
    $h = '<div style="width:100%;font-family:Arial,sans-serif;font-size:' . $pt . 'pt;font-weight:600;color:#CC0066;line-height:1.25;letter-spacing:0.04em;">';
    foreach ($chars as $i => $c) {
        if ($ul !== null && $i === $ul) {
            $h .= '<span style="color:#0000CC;text-decoration:underline;">' . ts_esc($c) . '</span>';
        } else {
            $h .= ts_esc($c);
        }
    }
    return $h . '</div>';
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $words = array_keys($bank[$lvl]);
    $avail = array_values(array_filter($words, fn($w) => !in_array("t$lvl:$w", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $words;
    }
    $w = $avail[array_rand($avail)];
    $used[] = "t$lvl:$w";
    if (count($used) > 300) $used = array_slice($used, -150);
    $_SESSION[$sessionKey]['used'] = $used;

    $e = $bank[$lvl][$w];
    $pool = $e['pool'];
    shuffle($pool);
    $choices = array_merge([$e['ans']], array_slice($pool, 0, 2));
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'lvl'     => $lvl,
        'word'    => $e['word'],
        'chars'   => $e['chars'],
        'ul'      => $e['ul'],
        'img'     => in_array($w, $pictureWords, true) ? $imgBase . rawurlencode(strtolower($w)) . '.jpg' : '',
        'correct' => $e['ans'],
        'choices' => $choices,
    ];
}

// ---- Render (§8, §9, §10) ----
$theme = [];   // TODO: replace with the standard theme array used by the other modules
render_header($moduleTitle,
              $moduleTitle,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $sentence = 'Ang hiram na titik sa <span style="color:#CC0066;font-weight:700;">\'' . ts_esc($cur['word']) . '\'</span> ay '
              . '<span style="color:#CC0066;font-weight:700;">\'' . ts_esc($cur['correct']) . '\'</span>.';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Ang pinili mong titik ay <strong style="color:#0000CC;font-size:14pt;">'<?php echo ts_esc($result['clicked']); ?>'</strong>.
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
  </p>
  <?php ts_box(
      '<div style="width:100%;font-size:14pt;font-weight:500;color:#800080;line-height:1.55;text-wrap:balance;margin-bottom:14px;">' . $sentence . '</div>'
    . ts_word_html($cur['chars'], $cur['ul']),
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Tamang sagot: <strong style="color:#CC0066;font-size:15pt;"><?php echo ts_esc($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value="Bagong Tanong" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $pic = ($q['img'] !== '')
        ? '<img src="' . htmlspecialchars($q['img']) . '" alt="" style="max-width:100%;height:auto;border:1px solid #DDD;margin-bottom:14px;">'
        : '';
?>
  <?php ts_box(
      $pic
    . ts_word_html($q['chars'], null)
    . '<div style="width:100%;font-size:14pt;font-weight:600;color:#800080;line-height:1.45;text-wrap:balance;margin-top:14px;">'
    . 'Piliin ang hiram na titik na ginamit sa itaas.</div>',
      160
  ); ?>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:10px auto 0;"><tr>
  <?php foreach ($q['choices'] as $c): ?>
    <td align="center" valign="middle">
      <a href="?ansclick=<?php echo urlencode($c); ?>"
         style="display:flex;align-items:center;justify-content:center;min-width:100px;min-height:90px;padding:10px 16px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:34pt;font-weight:700;text-align:center;box-sizing:border-box;line-height:1.2;">
        <?php echo ts_esc($c); ?>
      </a>
    </td>
  <?php endforeach; ?>
  </tr></table>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit2" value="Bagong Tanong" style="font-family:Arial,sans-serif;">
  </div>
<?php endif; ?>

  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Gaano kahirap ang gusto mong tanong?</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
    <?php foreach ($levels as $key => $label): ?>
      <td align="center">
        <label style="font:9pt Arial,sans-serif;color:#800080;">
          <input type="radio" name="level" value="<?php echo $key; ?>" <?php echo $lvl === $key ? 'checked' : ''; ?>> <b><?php echo $label; ?></b>
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