<?php
// filipino/modules/diptonggo.php
// Mga Diptonggo sa mga Salita — pick the missing diphthong (ay, aw, ey, iw, oy, uy) of the pictured word.
// Two levels (Easy = Madali / Hard = Mahirap). The legacy page computed a grade-based tier but never used it,
// so grade has no effect on content.
//
// CONVERSION NOTES
//  - Legacy Medium (Katamtaman) folded into Hard; Hard keeps its own 11-word list. The 14 Medium words are
//    not carried over.
//  - Data: each plain word is parsed once into [word, position and value of its first diphthong]. The first
//    diphthong from the left is the answer, as in the legacy page (pamaypay hides the first "ay"; the second one
//    stays visible). I checked every word: each has at least one diphthong.
//  - Choices: the answer plus two distinct diphthongs from ay, aw, ey, iw, oy, uy, shuffled (3 buttons, as in
//    the legacy page). The tile images (question-paper-15.jpg) are plain CSS buttons.
//  - The missing diphthong is highlighted by its position in the word (legacy rebuilt the word letter by letter).
//  - No-repeat is per word with a tier-prefixed key (legacy matched the first 5 letters of recent words);
//    it clears only the current level's entries when its list is exhausted.
//  - Dead code removed: mysql_* / FPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'|
//    'qopt'|'question'], $arrnum, $tnum, $blankimg, $qmark image (blank2-qmark2.jpg -> CSS box), the fixed-width
//    letter table, unused font strings, FrontPage JS, legacy page chrome.

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
$moduleTitle = 'Mga Diptonggo sa mga Salita';
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
$wordLists = [
    'Easy' => [
        'apoy', 'apaw', 'araw', 'baboy', 'bahay', 'gulay',
        'ilaw', 'kahoy', 'kamay', 'keyk', 'kulay', 'lugaw',
        'reyna', 'sabaw', 'sakay', 'sisiw', 'sigaw', 'sitaw',
        'tulay',
    ],
    'Hard' => [
        'anahaw', 'batingaw', 'galamay', 'inihaw', 'kalabaw', 'kalamay',
        'kumunoy', 'pamaypay', 'tanglaw', 'tangkay', 'tinapay',
    ],
];

// The six Filipino diphthongs; the answer and the wrong choices come from this list.
$diphthongs = ['ay', 'aw', 'ey', 'iw', 'oy', 'uy'];

// Find the first diphthong in a word (scanning left to right) -> position of its first letter and its value.
function dp_parse(string $word, array $diphthongs): array {
    for ($i = 0, $n = strlen($word) - 1; $i < $n; $i++) {
        $pair = substr($word, $i, 2);
        if (in_array($pair, $diphthongs, true)) return ['word' => $word, 'pos' => $i, 'ans' => $pair];
    }
    return ['word' => $word, 'pos' => -1, 'ans' => ''];
}

$bank = [];
foreach ($wordLists as $lv => $list) {
    foreach ($list as $w) {
        $p = dp_parse($w, $diphthongs);
        if ($p['pos'] >= 0) $bank[$lv][$w] = $p;       // keyed by word, so a repeated entry cannot double its chance
    }
}

// ---- Helpers ----
function dp_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// The word in large letters. $mode 'blank' = missing diphthong as an empty box, 'answer' = diphthong highlighted.
function dp_word_html(string $word, int $pos, string $mode): string {
    $pt = (strlen($word) <= 7) ? 44 : 36;
    $given = fn(string $t): string => ($t === '') ? '' : '<span style="color:#800080;">' . htmlspecialchars($t) . '</span>';
    $h = '<div style="width:100%;font-family:Arial,sans-serif;font-size:' . $pt . 'pt;font-weight:600;line-height:1.3;color:#CC0066;">';
    $h .= $given(substr($word, 0, $pos));
    if ($mode === 'blank') {
        $h .= '<span style="display:inline-block;width:1.7em;height:1.05em;line-height:1.05em;border:3px solid #CC0066;'
            . 'border-radius:6px;vertical-align:middle;margin:0 3px 4px;">?</span>';
    } else {
        $h .= '<span style="color:#CC0066;text-decoration:underline;">' . htmlspecialchars(substr($word, $pos, 2)) . '</span>';
    }
    $h .= $given(substr($word, $pos + 2));
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
    $w = (string)$avail[array_rand($avail)];
    $used[] = "t$lvl:$w";
    $_SESSION[$sessionKey]['used'] = $used;

    $e = $bank[$lvl][$w];
    $others = array_values(array_diff($diphthongs, [$e['ans']]));
    shuffle($others);
    $choices = array_merge([$e['ans']], array_slice($others, 0, 2));   // the answer + 2 distinct wrong diphthongs
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'lvl'     => $lvl,
        'word'    => $e['word'],
        'pos'     => $e['pos'],
        'img'     => $imgBase . rawurlencode($e['word']) . '.jpg',
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
    $img = '<img src="' . htmlspecialchars($cur['img']) . '" alt="' . htmlspecialchars($cur['word']) . '" style="max-width:100%;height:auto;border:1px solid #DDD;margin-bottom:14px;">';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Ang pinili mong diptonggo ay <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
  </p>
  <?php dp_box(
      $img
    . '<div style="width:100%;font-size:14pt;font-weight:500;color:#800080;line-height:1.55;text-wrap:balance;margin-bottom:12px;">'
    . 'Ang diptonggo sa salitang <span style="color:#CC0066;font-weight:700;">\'' . htmlspecialchars($cur['word']) . '\'</span> ay '
    . '<span style="color:#CC0066;font-weight:700;">\'' . htmlspecialchars($cur['correct']) . '\'</span>.</div>'
    . dp_word_html($cur['word'], $cur['pos'], 'answer'),
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Tamang sagot: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php dp_box(
      '<img src="' . htmlspecialchars($q['img']) . '" alt="' . htmlspecialchars($q['word']) . '" style="max-width:100%;height:auto;border:1px solid #DDD;margin-bottom:14px;">'
    . dp_word_html($q['word'], $q['pos'], 'blank')
    . '<div style="width:100%;font-size:14pt;font-weight:600;color:#555555;line-height:1.45;text-wrap:balance;margin-top:14px;">'
    . 'Piliin ang tamang diptonggo para sa salita sa itaas.</div>',
      160
  ); ?>
  <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:12px;margin:10px auto 0;max-width:480px;">
  <?php foreach ($q['choices'] as $v): ?>
    <a href="?ansclick=<?php echo urlencode($v); ?>"
       style="display:flex;align-items:center;justify-content:center;min-width:70px;min-height:76px;padding:8px 14px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:30pt;font-weight:700;text-align:center;box-sizing:border-box;line-height:1.2;">
      <?php echo htmlspecialchars($v); ?>
    </a>
  <?php endforeach; ?>
  </div>
  <div style="margin:20px 0;">
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="font-family:Arial,sans-serif;">
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