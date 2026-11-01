<?php
// english/modules/translation.php
// Translating Filipino Words into English — pick the English equivalent of a
// Filipino word. 4 choices (correct + 3 baked-in distractors) in a 2×2 grid.
// Pool gated by (level × grade) via the §4.4 "bridge" pattern:
//   Simple pool = concrete nouns (body parts, animals, places, things)
//   Complex pool = verbs, adjectives, abstract concepts
// Legacy had no level differentiation (level hardcoded) and no grade gating.

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
$moduleTitle = 'Translating Filipino Words into English';
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

// ---- Data (§5) — verbatim from legacy ----
// Format: 'filipino=english[wrong1+wrong2]wrong3'
// Each item has 1 correct English + 3 baked-in distractors.
$rawData = [
    'asal=conduct[bread+annoy]where',
    'balikat=shoulder[elbow+knee]arm',
    'bangketa=sidewalk[street+chair]bank',
    'batok=nape[forehead+neck]back',
    'bundok=mountain[hill+forest]valley',
    'daliri=finger[hand+toe]thumb',
    'gubat=jungle[valley+trees]mountain',
    'halaman=plant[flower+tree]grass',
    'ilog=river[sea+ocean]lake',
    'isaulo=memorize[read+understand]study',
    'kabayo=horse[cow+goat]carabao',
    'kalabaw=carabao[cow+goat]horse',
    'kambing=goat[sheep+deer]cow',
    'karapatan=right[loyalty+honesty]wisdom',
    'katapatan=loyalty[right+wisdom]knowledge',
    'kilay=eyebrow[eyelash+eyelid]eye',
    'larawan=picture[book+letter]toy',
    'lumitaw=appeared[moved+hid]jumped',
    'mag-aral=study[classmate+work]lesson',
    'magkaiba=different[difference+similar]alike',
    'mahalaga=important[little+unusual]favorite',
    'marikit=beautiful[small+thin]smart',
    'matigas=hard[solid+rough]large',
    'nahanap=found[watched+looked]searched',
    'noo=forehead[nape+skull]brow',
    'palad=palm[hand+finger]toe',
    'palagi=always[never+seldom]sometimes',
    'pilik-mata=eyelash[eyebrow+eyelid]eye',
    'sapat=enough[over+scarce]short',
    'simula=beginning[ending+middle]top',
    'sinulid=thread[rope+needle]sew',
    'siko=elbow[shoulder+knee]arm',
    'sikmura=stomach[chest+back]bowel',
    'sumapit=arrived[left+joined]started',
    'tandaan=remember[find+teach]prepare',
    'tanong=question[sentence+command]request',
    'tumakas=escaped[grew+failed]called',
    'tuhod=knee[elbow+shoulder]arm',
    'tupa=sheep[goat+deer]cow',
    'usa=deer[goat+sheep]cow',
];

// ---- Pre-parse (§5.1) ----
$items = [];
foreach ($rawData as $raw) {
    if (!preg_match('/^([^=]+)=([^\[]+)\[([^\+]+)\+([^\]]+)\](.+)$/', $raw, $m)) continue;
    $items[] = [
        'filipino' => $m[1],
        'correct'  => $m[2],
        'wrong'    => [$m[3], $m[4], $m[5]],
    ];
}

// ---- Pool partitioning by difficulty (§4.4 bridge pattern) ----
// Simple indices = concrete nouns (body parts, animals, places, things)
$simpleIdx = [
    1, 2, 3, 4, 5, 6, 7, 8,         // balikat, bangketa, batok, bundok, daliri, gubat, halaman, ilog
    10, 11, 12,                      // kabayo, kalabaw, kambing
    15, 16,                          // kilay, larawan
    24, 25, 27,                      // noo, palad, pilik-mata
    30, 31, 32,                      // sinulid, siko, sikmura
    37, 38, 39,                      // tuhod, tupa, usa
];
// Complex indices = verbs, adjectives, abstract concepts
$complexIdx = [
    0, 9,                            // asal, isaulo
    13, 14,                          // karapatan, katapatan
    17, 18, 19, 20, 21, 22, 23,      // lumitaw, mag-aral, magkaiba, mahalaga, marikit, matigas, nahanap
    26, 28, 29,                      // palagi, sapat, simula
    33, 34, 35, 36,                  // sumapit, tandaan, tanong, tumakas
];

function resolve_translation_pool(string $lvl, int $grd, array $simpleIdx, array $complexIdx): array {
    // Easy grd 0-2: simple only (concrete vocab)
    // Easy grd 3+:  simple + complex
    // Hard grd 0-2: simple + complex (variety for younger students opting in)
    // Hard grd 3+:  complex only (deeper vocabulary focus)
    if ($lvl === 'Easy') {
        if ($grd <= 2) return $simpleIdx;
        return array_merge($simpleIdx, $complexIdx);
    }
    if ($grd <= 2) return array_merge($simpleIdx, $complexIdx);
    return $complexIdx;
}

// ---- Helpers (§8.4, §8.6) ----
function translation_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
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

// ---- No-repeat picker (§6.2) ----
function pick_translation_item(array $allItems, array $poolIdxs, string $sessionKey, string $lvl, int $grd): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($poolIdxs as $idx) {
        if (!in_array($idx, $used, true)) $available[] = $idx;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => !in_array($k, $poolIdxs, true)));
        $available = $poolIdxs;
    }
    $idx = $available[array_rand($available)];
    $used[] = $idx;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return $allItems[$idx];
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
    $poolIdxs = resolve_translation_pool($lvl, $grd, $simpleIdx, $complexIdx);
    $item     = pick_translation_item($items, $poolIdxs, $sessionKey, $lvl, $grd);

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'filipino' => $item['filipino'],
        'correct'  => $item['correct'],
        'choices'  => $choices,
        'lvl'      => $lvl,
        'grd'      => $grd,
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $wordEsc = htmlspecialchars($cur['filipino']);
    $ansEsc  = htmlspecialchars($cur['correct']);
?>
  <!-- Filipino word in a prominent box -->
  <?php translation_box(
      '<div style="font-size:32pt;font-weight:700;color:#0000BB;line-height:1.3;">'
    . $wordEsc
    . '</div>'
  , 110); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:18px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer is '<strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>'.
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;text-wrap:balance;">The English equivalent of the Filipino word '<strong><?php echo $wordEsc; ?></strong>' is '<strong style="color:#CC0066;"><?php echo $ansEsc; ?></strong>'.</p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $wordEsc = htmlspecialchars($q['filipino']);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the English equivalent of the word below.
  </div>
  <!-- Filipino word in a prominent box -->
  <?php translation_box(
      '<div style="font-size:32pt;font-weight:700;color:#0000BB;line-height:1.3;">'
    . $wordEsc
    . '</div>'
  , 110); ?>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:20px auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:150px;max-width:220px;min-height:64px;padding:12px 18px;
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