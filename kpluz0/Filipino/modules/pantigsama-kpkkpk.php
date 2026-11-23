<?php
// filipino/modules/pantigsama-kpkkpk.php
// Una o Huling Pantig ng Salita (KPK-KPK) — pick the first OR the last syllable of the pictured word
// (three-letter syllables such as ban-tay, sak-lay).
// Single level (Easy). The legacy page had no grade logic, so grade appears nowhere in the content.
//
// CONVERSION NOTES
//  - Legacy forced $_SESSION['level']="Easy" for the whole site on every load; this version keeps its level
//    local ($lvl) and never touches the shared session level. No difficulty radios: only Easy content exists.
//  - Two question modes, as in the legacy page (it re-rolled $opt for every question):
//      last  (26 words): picture of the 2-syllable word, "first syllable + ?"  -> pick the LAST syllable
//      first  (7 words): picture of the 2-syllable word, "? + second syllable" -> pick the FIRST syllable
//    The 12-letter strings are parsed once into [picture word, answer syllable, shown syllable, two distractors];
//    the picture word is the first 6 letters (e.g. bagsaksiknet -> "bagsak"). There are 3 choices, as in the legacy page.
//  - Mode is chosen 50/50 each question (as in the legacy page), then an unused word of that mode, so the 7
//    first-syllable words repeat sooner than the 26 last-syllable words (same as legacy).
//  - The legacy special case for the picture of "saklay" (file saklay2.jpg) is kept as an explicit alias.
//  - Eight words that were commented out in the legacy list (kumpaspolpil, kumpolpaspil, lambakbatpin,
//    pantaysitsin, sandaldoktan, paslityaltol, pastollityal, bagnetsaksik) are not carried over.
//  - No-repeat is per mode and pictured word with a tier-prefixed key (legacy used list positions); it clears only
//    this level's entries when all 33 have been used.
//  - Dead code removed: mysql_* / FPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'|'opt'],
//    $tnum, unused $qred/$qvio/$qred2/$qcol2 font strings, the empty width tables, tile background images
//    (qbg07/qbg09 -> CSS boxes), FrontPage JS, legacy page chrome.

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
$moduleTitle = 'Una o Huling Pantig ng Salita (KPK-KPK)';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$imgBase = '../images/bokabularyo/';   // same relative location the legacy page used; adjust if images moved
$imgAlias = ['saklay' => 'saklay2'];     // picture word -> file name, where they differ

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';   // only level this module has

// ---- Data (§5) ----
// Each string = 4 three-letter syllables. Letters 1-6 spell the pictured word; syllables 3-4 are the distractors.
//   'last'  mode: syllable 1 is shown, the answer is syllable 2.
//   'first' mode: syllable 2 is shown, the answer is syllable 1.
$wordStrings = [
    'last' => [
        'bagsaksiknet', 'bantaysagtog', 'bundokdoltis', 'buntisdoldok', 'kambalponbas',
        'lagnatlagyan', 'lambatbakbot', 'lampinbakbat', 'paksiwwanyaw', 'pakwanyawsiw',
        'pandandaysit', 'pandaydansit', 'pansitsintay', 'pasyallittol', 'pindotsantig',
        'saklayyandal', 'sandokdaltan', 'santandokdal', 'santoldoktan', 'sindaktassil',
        'sintasdaksil', 'suklaybitdol', 'tambakbolpok', 'tambolbakpok', 'tumpokpakpik',
        'tumpakpokpik',
    ],
    'first' => [
        'bantayhindan', 'bundollinkun', 'dantaybanhin', 'gimbaltamkam', 'hintaypandan',
        'kundollinbun', 'lindolkunbun',
    ],
];

function ps_build_bank(array $byMode): array {
    $bank = [];
    foreach ($byMode as $mode => $strings) {
        foreach ($strings as $w) {
            $q  = substr($w, 0, 6);
            $s1 = substr($w, 0, 3);
            $s2 = substr($w, 3, 3);
            $bank[$mode][$q] = [
                'mode'        => $mode,
                'word'        => $q,
                'ans'         => ($mode === 'last') ? $s2 : $s1,
                'shown'       => ($mode === 'last') ? $s1 : $s2,
                'distractors' => [substr($w, 6, 3), substr($w, 9, 3)],
            ];
        }
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
    $unused = function (array $used) use ($bank, $lvl): array {
        $out = [];
        foreach ($bank as $mode => $entries) {
            foreach (array_keys($entries) as $q) {
                if (!in_array("t$lvl:$mode:$q", $used, true)) $out[$mode][] = $q;
            }
        }
        return $out;
    };
    $avail = $unused($used);
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $unused($used);
    }
    $mode = array_rand($avail);                       // 50/50 while both modes still have unused words
    $q    = $avail[$mode][array_rand($avail[$mode])];
    $used[] = "t$lvl:$mode:$q";
    $_SESSION[$sessionKey]['used'] = $used;

    $e = $bank[$mode][$q];
    $choices = array_merge([$e['ans']], $e['distractors']);
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'lvl'     => $lvl,
        'mode'    => $mode,
        'word'    => $e['word'],
        'shown'   => $e['shown'],
        'img'     => $imgBase . rawurlencode($imgAlias[$e['word']] ?? $e['word']) . '.jpg',
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
    $isLast   = ($cur['mode'] === 'last');
    $sentence = 'Ang ' . ($isLast ? 'huling' : 'unang') . ' pantig ng \'' . htmlspecialchars($cur['word']) . '\' ay '
              . '<span style="color:#CC0066;font-weight:700;">\'' . htmlspecialchars($cur['correct']) . '\'</span>.';
    $ansSpan   = '<span style="color:#CC0066;">' . htmlspecialchars($cur['correct']) . '</span>';
    $shownSpan = '<span style="color:#800080;">' . htmlspecialchars($cur['shown']) . '</span>';
    $equation = ($isLast ? $shownSpan . '<span style="color:#333;"> + </span>' . $ansSpan
                         : $ansSpan . '<span style="color:#333;"> + </span>' . $shownSpan)
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
    . '<div style="width:100%;font-size:28pt;font-weight:600;margin-top:14px;">' . $equation . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Tamang sagot: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php ps_box(
      '<img src="' . htmlspecialchars($q['img']) . '" alt="' . htmlspecialchars($q['word']) . '" style="max-width:100%;height:auto;border:1px solid #DDD;margin-bottom:14px;">'
    . '<div style="width:100%;font-size:36pt;font-weight:600;line-height:1.2;">'
    . (($q['mode'] === 'last')
        ? '<span style="color:#800080;">' . htmlspecialchars($q['shown']) . '</span><span style="color:#333;"> + </span><span style="color:#CC0066;">?</span>'
        : '<span style="color:#CC0066;">?</span><span style="color:#333;"> + </span><span style="color:#800080;">' . htmlspecialchars($q['shown']) . '</span>')
    . '</div>',
      160
  ); ?>
  <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:14px;margin:10px auto 0;max-width:480px;">
  <?php foreach ($q['choices'] as $c): ?>
    <a href="?ansclick=<?php echo urlencode($c); ?>"
       style="display:flex;align-items:center;justify-content:center;min-width:120px;min-height:84px;padding:12px 16px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:26pt;font-weight:700;text-align:center;box-sizing:border-box;line-height:1.2;">
      <?php echo htmlspecialchars($c); ?>
    </a>
  <?php endforeach; ?>
  </div>
  <div style="margin:40px 0;">
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="font-family:Arial,sans-serif;">
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