<?php
// filipino/modules/salita-3-pantig.php
// Pagbasa ng mga Salitang May Tatlong Pantig — fill in the missing syllable of a three-syllable word.
// Single level (Easy). The legacy page had no grade logic, so grade appears nowhere in the content.
//
// CONVERSION NOTES
//  - Legacy forced $_SESSION['level']="Easy" for the whole site on every load; this version keeps its level
//    local ($lvl) and never touches the shared session level. No difficulty radios: only Easy content exists.
//  - Three question modes, as in the legacy page (it re-rolled $opt for every question): the FIRST, SECOND or
//    THIRD syllable is missing ("? + li + kat", "ba + ? + kat", "ba + li + ?"). Each mode has its own list
//    (24 / 32 / 32 entries) because each entry carries its own two distractor syllables.
//  - Data: the legacy "ba2li3kat=da-pa" strings are parsed once into [word, three syllables, answer, two
//    distractors]. The picture is the whole word (e.g. balikat -> balikat.jpg).
//  - The feedback used str_replace() to highlight the answer inside the word, which also highlighted every other
//    place the same letters occurred (e.g. "a" in "alakdan"). The missing syllable is now highlighted by position.
//  - No-repeat keeps the legacy rule that a word is not asked again in any mode until all 32 words have been used
//    (key "t<level>:<word>"); it clears only this level's entries.
//  - Dead code removed: mysql_* / FPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, unused $vio/$red font strings, tile background images (qbg07 / qbg09b -> CSS boxes), FrontPage JS,
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
$moduleTitle = 'Pagbasa ng mga Salitang May Tatlong Pantig';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$imgBase = '../images/bokabularyo/';   // same relative location the legacy page used; adjust if images moved

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';   // only level this module has

// ---- Data (§5) ----
// Legacy format: "syl1" + "2" + "syl2" + "3" + "syl3" + "=" + "distractor1-distractor2".
// The key is the position of the missing syllable (1, 2 or 3).
$legacyLists = [
    1 => [
        'bas2ket3bol=pas-tas', 'ba2li3kat=da-pa', 'ba2luk3tot=da-pa', 'bal2ye3na=dal-gal',
        'bar2be3ro=dar-kar', 'ba2sa3han=da-ta', 'bi2sag3ra=di-mi', 'bum2be3ro=dum-tum',
        'bu2wa3ya=du-mu', 'den2tis3ta=ben-men', 'ga2ra3pon=ka-ta', 'go2ril3ya=do-ho',
        'gu2sa3li=bu-pu', 'hun2ya3ngo=dun-tun', 'ka2ba3yo=ha-ta', 'ka2de3na=ha-pa',
        'ka2la3baw=ha-pa', 'ka2nar3yo=ga-ha', 'ka2wa3li=ga-sa', 'ma2ga3an=na-sa',
        'ma2le3ta=ba-na', 'mar2til3yo=nar-par', 'pa2la3ka=ba-ta', 'pam2bu3ra=dam-tam',
    ],
    2 => [
        'a2gi3la=bi-di', 'a2la3has=na-ra', 'a2lak3dan=nak-tak', 'a2lam3bre=dam-sam',
        'a2na3haw=ma-pa', 'a2ni3no=mi-si', 'ba2la3bal=na-sa', 'ba2li3kat=ni-si',
        'ba2luk3tot=nuk-suk', 'bal2ye3na=de-he', 'bar2be3ro=de-te', 'ba2sa3han=da-ka',
        'bas2ket3bol=pet-tet', 'bi2sag3ra=nag-tag', 'bum2be3ro=pe-se', 'bu2wa3ya=ha-sa',
        'den2tis3ta=pis-sis', 'ga2ra3pon=la-sa', 'go2ril3ya=mil-sil', 'gu2sa3li=da-ta',
        'hun2ya3ngo=ma-sa', 'i2ni3haw=mi-si', 'ka2ba3yo=da-pa', 'ka2de3na=be-pe',
        'ka2la3baw=na-sa', 'ka2nar3yo=bar-mar', 'ka2wa3li=da-pa', 'ma2ga3an=ba-da',
        'ma2le3ta=de-ne', 'mar2til3yo=kil-pil', 'pa2la3ka=na-ra', 'pam2bu3ra=du-gu',
    ],
    3 => [
        'a2gi3la=na-ra', 'a2la3has=gas-pas', 'a2lak3dan=ban-san', 'a2lam3bre=dre-pre',
        'a2na3haw=baw-saw', 'a2ni3no=mo-to', 'bas2ket3bol=dol-pol', 'ba2la3bal=dal-pal',
        'ba2li3kat=gat-pat', 'ba2luk3tot=dot-pot', 'bal2ye3na=ma-ta', 'bar2be3ro=do-no',
        'ba2sa3han=kan-man', 'bi2sag3ra=la-ta', 'bum2be3ro=lo-so', 'bu2wa3ya=ha-sa',
        'den2tis3ta=da-pa', 'ga2ra3pon=mon-ton', 'go2ril3ya=da-ta', 'gu2sa3li=mi-ni',
        'hun2ya3ngo=nga-ngi', 'i2ni3haw=law-paw', 'ka2ba3yo=da-ro', 'ka2de3na=ma-sa',
        'ka2la3baw=maw-paw', 'ka2nar3yo=do-mo', 'ka2wa3li=ni-si', 'ma2ga3an=am-at',
        'ma2le3ta=da-pa', 'mar2til3yo=ko-to', 'pa2la3ka=ga-pa', 'pam2bu3ra=ga-sa',
    ],
];

function sp_build_bank(array $lists): array {
    $bank = [];
    foreach ($lists as $missing => $entries) {
        foreach ($entries as $e) {
            [$left, $d] = explode('=', $e);
            $syl = preg_split('/[23]/', $left);               // "bas2ket3bol" -> bas, ket, bol
            [$d1, $d2] = explode('-', $d);
            $word = implode('', $syl);
            $bank[$missing][$word] = [
                'word'        => $word,
                'syl'         => $syl,
                'missing'     => $missing - 1,                // index of the missing syllable
                'ans'         => $syl[$missing - 1],
                'distractors' => [$d1, $d2],
            ];
        }
    }
    return $bank;
}
$bank = sp_build_bank($legacyLists);

// ---- Helpers ----
function sp_box(string $html, int $minHeight = 140): void {
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
            foreach (array_keys($entries) as $w) {
                if (!in_array("t$lvl:$w", $used, true)) $out[$mode][] = $w;   // key shared across modes
            }
        }
        return $out;
    };
    $avail = $unused($used);
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $unused($used);
    }
    $mode = array_rand($avail);                       // equal chance per mode while each still has unused words
    $w    = $avail[$mode][array_rand($avail[$mode])];
    $used[] = "t$lvl:$w";
    $_SESSION[$sessionKey]['used'] = $used;

    $e = $bank[$mode][$w];
    $choices = array_merge([$e['ans']], $e['distractors']);
    shuffle($choices);
    $_SESSION[$sessionKey]['current'] = [
        'lvl'     => $lvl,
        'word'    => $e['word'],
        'syl'     => $e['syl'],
        'missing' => $e['missing'],
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
    $wordHtml = '';
    foreach ($cur['syl'] as $i => $s) {
        $wordHtml .= ($i === $cur['missing'])
            ? '<span style="color:#CC0066;">' . htmlspecialchars($s) . '</span>'
            : '<span style="color:#800080;">' . htmlspecialchars($s) . '</span>';
    }
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Ang sagot mo ay <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
  </p>
  <?php sp_box(
      $img
    . '<div style="width:100%;font-size:14pt;font-weight:500;color:#800080;line-height:1.55;text-wrap:balance;">'
    . 'Ang nawawalang pantig ay <span style="color:#CC0066;font-weight:700;">\'' . htmlspecialchars($cur['correct']) . '\'</span>.</div>'
    . '<div style="width:100%;font-size:30pt;font-weight:600;margin-top:14px;">' . $wordHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Tamang sagot: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $pt = (strlen($q['word']) <= 7) ? 36 : 30;
    $parts = [];
    foreach ($q['syl'] as $i => $s) {
        $parts[] = ($i === $q['missing'])
            ? '<span style="color:#CC0066;">?</span>'
            : '<span style="color:#800080;">' . htmlspecialchars($s) . '</span>';
    }
    $equation = implode('<span style="color:#333;"> + </span>', $parts);
?>
  <?php sp_box(
      '<img src="' . htmlspecialchars($q['img']) . '" alt="' . htmlspecialchars($q['word']) . '" style="max-width:100%;height:auto;border:1px solid #DDD;margin-bottom:14px;">'
    . '<div style="width:100%;font-size:' . $pt . 'pt;font-weight:600;line-height:1.25;">' . $equation . '</div>',
      160
  ); ?>
  <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:14px;margin:10px auto 0;max-width:480px;">
  <?php foreach ($q['choices'] as $c): ?>
    <a href="?ansclick=<?php echo urlencode($c); ?>"
       style="display:flex;align-items:center;justify-content:center;min-width:110px;min-height:84px;padding:12px 16px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:26pt;font-weight:700;text-align:center;box-sizing:border-box;line-height:1.2;">
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