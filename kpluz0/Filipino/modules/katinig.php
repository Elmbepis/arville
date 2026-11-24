<?php
// filipino/modules/katinig.php
// Mga Katinig sa Loob ng mga Salita — pick the missing consonant of the pictured word.
// Two levels (Easy = Madali / Hard = Mahirap). The legacy page computed a grade-based tier but never used it,
// so grade has no effect on content.
//
// CONVERSION NOTES
//  - Legacy Medium (Katamtaman) folded into Hard; Hard keeps its own 27-word list. The 43 Medium words are
//    not carried over.
//  - Data: the legacy digit markers ("ba1ha2y": each digit sits just before one consonant of the word) are parsed
//    once into [plain word, positions of the marked consonants]. The missing consonant is chosen from those
//    positions with equal chance, as in the legacy page.
//  - Bug fixed: the legacy list of distractor consonants had "k" twice and no "l" (the second "k" was evidently
//    meant to be "l", following the Filipino alphabet order). Because "l" can be the answer (e.g. balde), it
//    appeared only when it was correct, which gave the answer away. "l" is now in the pool and "k" is listed once.
//  - Choices: the answer plus three distinct consonants from the pool, shuffled (4 buttons, as in the legacy page).
//    The tile images (qbg05.jpg) are plain CSS buttons.
//  - The missing consonant is highlighted by its position in the word (legacy replaced a "?" in a string).
//  - No-repeat is per word with a tier-prefixed key (legacy matched the first 4 letters of recent words);
//    it clears only the current level's entries when its list is exhausted.
//  - Dead code removed: mysql_* / FPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $arrnum, $tnum, $blankimg, $qmark image (blank2-qmark.jpg -> CSS box), unused font strings, FrontPage JS,
//    legacy page chrome.

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
$moduleTitle = 'Mga Katinig sa Loob ng mga Salita';
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
// Legacy format: a digit (1, 2 or 3) is written just before each consonant that may be hidden.
$legacyWords = [
    'Easy' => [
        'ba1ka', 'ba1ro', 'ba1sa', 'ba1so', 'ba1ta', 'ba1to',
        'bi1ko', 'bo1la', 'bo1ta', 'bo1te', 'bu1la', 'bu1ra',
        'da1ga', 'da1mo', 'di1la', 'ha1ri', 'hi1la', 'hi1to',
        'ka1ma', 'ku1bo', 'la1bi', 'la1ta', 'lo1ro', 'lu1pa',
        'ma1pa', 'ma1ta', 'no1ta', 'pa1ko', 'pa1na', 'pa1sa',
        'pa1so', 'pi1ko', 'pu1go', 'pu1lo', 'pu1sa', 'pu1so',
        'pu1to', 'si1ko', 'si1pa', 'su1si', 'su1so', 'ta1sa',
        'tu1bo', 'tu1ka', 'tu1ko', 'tu1pa', 'tu1ro', 'tu1ta',
        'ye1lo',
    ],
    'Hard' => [
        'ba1r2be3ro', 'ba1sa2ha3n', 'bu1bu2yo3g', 'bu1n2do3k', 'bu1n2to3t', 'bu1wa2ya',
        'ga1ga2m3ba', 'ga1ra2po3n', 'gu1sa2li', 'ka1ba2yo', 'ka1bu2te', 'ka1de2na',
        'ka1la2ba3w', 'ka1l2de3ro', 'ka1me2ra', 'ka1wa2li', 'ku1ne2ho', 'la1ba2bo',
        'la1la2ki', 'ma1le2ta', 'me1d2yas', 'o1ra2sa3n', 'pa1la2ka', 'pa1ni2ki',
        'pi1n2to3r', 'pu1lu2bi', 'wa1ta2wa3t',
    ],
];

// Letters offered as wrong answers (the answer is always added to these).
$consonants = ['b', 'k', 'd', 'g', 'h', 'l', 'm', 'n', 'p', 'r', 's', 't', 'w', 'y'];

function kt_parse(string $legacy): array {
    $word = ''; $marked = [];
    foreach (str_split($legacy) as $ch) {
        if ($ch === '1' || $ch === '2' || $ch === '3') { $marked[] = strlen($word); continue; }   // next letter is a hideable consonant
        $word .= $ch;
    }
    return ['word' => $word, 'chars' => str_split($word), 'marked' => $marked];
}

$bank = [];
foreach ($legacyWords as $lv => $list) {
    foreach ($list as $e) {
        $p = kt_parse($e);
        $bank[$lv][$p['word']] = $p;          // keyed by word, so a repeated entry cannot double its chance
    }
}

// ---- Helpers ----
function kt_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// The word in large letters. $mode 'blank' = missing consonant as an empty box, 'answer' = missing consonant highlighted.
function kt_word_html(array $chars, int $idx, string $mode): string {
    $pt = (count($chars) <= 7) ? 44 : 36;
    $h = '<div style="width:100%;font-family:Arial,sans-serif;font-size:' . $pt . 'pt;font-weight:600;line-height:1.3;color:#CC0066;">';
    foreach ($chars as $i => $c) {
        if ($i !== $idx) {
            $h .= '<span style="color:#800080;">' . htmlspecialchars($c) . '</span>';
        } elseif ($mode === 'blank') {
            $h .= '<span style="display:inline-block;width:0.95em;height:1.05em;line-height:1.05em;border:3px solid #CC0066;'
                . 'border-radius:6px;vertical-align:middle;margin:0 3px 4px;">?</span>';
        } else {
            $h .= '<span style="color:#CC0066;text-decoration:underline;">' . htmlspecialchars($c) . '</span>';
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
    $w = (string)$avail[array_rand($avail)];
    $used[] = "t$lvl:$w";
    $_SESSION[$sessionKey]['used'] = $used;

    $e   = $bank[$lvl][$w];
    $idx = $e['marked'][array_rand($e['marked'])];          // which consonant is hidden
    $ans = $e['chars'][$idx];
    $others = array_values(array_diff($consonants, [$ans]));
    shuffle($others);
    $choices = array_merge([$ans], array_slice($others, 0, 3));   // the answer + 3 distinct wrong letters
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'lvl'     => $lvl,
        'word'    => $e['word'],
        'chars'   => $e['chars'],
        'idx'     => $idx,
        'img'     => $imgBase . rawurlencode($e['word']) . '.jpg',
        'correct' => $ans,
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
    Pinili mo ang katinig na <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
  </p>
  <?php kt_box(
      $img
    . '<div style="width:100%;font-size:14pt;font-weight:500;color:#800080;line-height:1.55;text-wrap:balance;margin-bottom:12px;">'
    . 'Ang nawawalang katinig sa salitang <span style="color:#CC0066;font-weight:700;">\'' . htmlspecialchars($cur['word']) . '\'</span> ay '
    . '<span style="color:#CC0066;font-weight:700;">\'' . htmlspecialchars($cur['correct']) . '\'</span>.</div>'
    . kt_word_html($cur['chars'], $cur['idx'], 'answer'),
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Tamang sagot: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php kt_box(
      '<img src="' . htmlspecialchars($q['img']) . '" alt="' . htmlspecialchars($q['word']) . '" style="max-width:100%;height:auto;border:1px solid #DDD;margin-bottom:14px;">'
    . kt_word_html($q['chars'], $q['idx'], 'blank')
    . '<div style="width:100%;font-size:14pt;font-weight:600;color:#555555;line-height:1.45;text-wrap:balance;margin-top:14px;">'
    . 'Piliin sa baba ang nawawalang katinig sa salita.</div>',
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