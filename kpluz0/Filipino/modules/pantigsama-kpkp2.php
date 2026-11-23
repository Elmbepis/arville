<?php
// filipino/modules/pantigsama-kpkp2.php
// Unang Pantig ng Salita (KP-KP) — pick the first syllable of the pictured word.
// Single level (Easy). The legacy page had no grade logic, so grade appears nowhere in the content.
//
// CONVERSION NOTES
//  - Legacy forced $_SESSION['level']="Easy" for the whole site on every load; this version keeps its level
//    local ($lvl) and never touches the shared session level. No difficulty radios: only Easy content exists.
//  - Data: the 37 ten-letter strings are parsed once into [picture word, answer syllable, shown syllable,
//    three distractor syllables]. The pictured word is the first 4 letters (e.g. babalataka -> "baba");
//    the answer is its FIRST syllable and the second syllable is shown ("? + ba").
//  - No-repeat is now per pictured word with a tier-prefixed key (legacy matched substrings of one growing
//    string); it clears only this level's entries when all 37 have been used.
//  - Dead code removed: mysql_* / FPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, unused $qred/$qvio/$qred2/$qcol2 font strings, the empty width table, tile background images
//    (qbg05/qbg06 -> CSS boxes), FrontPage JS, legacy page chrome.

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
$moduleTitle = 'Unang Pantig ng Salita (KP-KP)';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$imgBase = '../images/bokabularyo/';   // same relative location the legacy page used; adjust if images moved

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';   // only level this module has

// ---- Data (§5) ----
// Each string = 5 two-letter syllables. Letters 1-4 spell the pictured word; the answer is its 1st syllable,
// its 2nd syllable is shown, and syllables 3-5 are the distractors.
$wordStrings = [
    'babalataka', 'batalamaga', 'basolapama', 'basalapata', 'balitadasa', 'bukotukusu',
    'bulatukudu', 'butolutuku', 'hatidakaba', 'kamasadata', 'kawasatala', 'kukobusutu',
    'kutolutubu', 'labatakaba', 'labitasaha', 'lasobapama', 'latabamaga', 'lawasataka',
    'matabalaga', 'mapasataka', 'masobalapa', 'pabotalaka', 'pakobalasa', 'pasatalaba',
    'pasobalama', 'pulotusuku', 'putolukubu', 'sakopabala', 'sapatakama', 'sawakatala',
    'tabopalaka', 'taladasawa', 'talibasada', 'tasabalapa', 'tawasalaka', 'tukokubusu',
    'walosapaba',
];

function ps_build_bank(array $strings): array {
    $bank = [];
    foreach ($strings as $w) {
        $q = substr($w, 0, 4);
        $bank[$q] = [
            'word'        => $q,
            'ans'         => substr($w, 0, 2),
            'shown'       => substr($w, 2, 2),
            'distractors' => [substr($w, 4, 2), substr($w, 6, 2), substr($w, 8, 2)],
        ];
    }
    return $bank;
}
$bank = ps_build_bank($wordStrings);

// ---- Helpers ----
function ps_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
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
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter(array_keys($bank), fn($q) => !in_array("t$lvl:$q", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = array_keys($bank);
    }
    $q = $avail[array_rand($avail)];
    $used[] = "t$lvl:$q";
    $_SESSION[$sessionKey]['used'] = $used;

    $e = $bank[$q];
    $choices = array_merge([$e['ans']], $e['distractors']);
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'lvl'     => $lvl,
        'word'    => $e['word'],
        'shown'   => $e['shown'],
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
    $sentence = 'Ang unang pantig ng \'' . htmlspecialchars($cur['word']) . '\' ay '
              . '<span style="color:#CC0066;font-weight:700;">\'' . htmlspecialchars($cur['correct']) . '\'</span>.';
    $equation = '<span style="color:#CC0066;">' . htmlspecialchars($cur['correct']) . '</span>'
              . '<span style="color:#333;"> + </span>'
              . '<span style="color:#800080;">' . htmlspecialchars($cur['shown']) . '</span>'
              . '<span style="color:#333;"> = </span>'
              . '<span style="color:#800080;">' . htmlspecialchars($cur['word']) . '</span>';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Ang sagot mo ay <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
  </p>
  <?php ps_box(
      $img
    . '<div style="width:100%;font-size:15pt;color:#800080;line-height:1.55;text-wrap:balance;">' . $sentence . '</div>'
    . '<div style="width:100%;font-size:30pt;font-weight:600;margin-top:14px;">' . $equation . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Tamang sagot: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value="Bagong Tanong" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php ps_box(
      '<img src="' . htmlspecialchars($q['img']) . '" alt="' . htmlspecialchars($q['word']) . '" style="max-width:100%;height:auto;border:1px solid #DDD;margin-bottom:14px;">'
    . '<div style="width:100%;font-size:40pt;font-weight:600;line-height:1.2;">'
    . '<span style="color:#CC0066;">?</span>'
    . '<span style="color:#333;"> + </span>'
    . '<span style="color:#800080;">' . htmlspecialchars($q['shown']) . '</span></div>',
      160
  ); ?>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:10px auto 0;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;min-width:140px;min-height:84px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:30pt;font-weight:700;text-align:center;box-sizing:border-box;line-height:1.2;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit2" value="Bagong Tanong" style="font-family:Arial,sans-serif;">
  </div>
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>