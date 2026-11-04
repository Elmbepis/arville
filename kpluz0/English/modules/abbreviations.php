<?php
// english/modules/abbreviations.php
// Abbreviations — click the most common abbreviation of the word shown.
// Single level (Easy) — legacy hardcoded $_SESSION['level']="Easy" at the top
// and never varied content by grade or level. Grade displayed but does not
// affect tier (matches cblends/cdigraphs/homographs precedent).
// 4 M/C choices always (2×2 grid).
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the content box.

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
$moduleTitle = 'Abbreviations';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (36 items) ----
// Format: "word=answer[wrong1+wrong2]wrong3"
$rawData = [
    'Doctor=Dr.[Dc.+Dt.]Do.',
    'Mister=Mr.[Mt.+Mrs.]Ms.',
    'Miss=Ms.[Mr.+Mrs.]Mi.',
    'Attorney=Atty.[Atto.+Attr.]Attn.',
    'attention=attn.[atnn.+atty.]atten.',
    'telephone=tel.[tep.+tpn.]tph.',
    'temperature=temp.[tmpr.+temr.]tmpt.',
    'versus=vs.[vr.+vu.]ve.',
    'Avenue=Ave.[Avn.+Avu.]Anu.',
    'Street=St.[Sr.+Se.]S.',
    'Boulevard=Blvd.[Blvr.+Blrd.]Bvrd.',
    'Road=Rd.[Ro.+Ra.]R.',
    'Vice President=VP.[VI.+VC.]Vt.',
    'department=dept.[depr.+depm.]depn.',
    'government=govt.[gvrn.+govm.]gvrm.',
    'institute=inst.[intu.+intt.]insu.',
    'laboratory=lab.[labr.+lbry.]lbty.',
    'professor=prof.[pros.+prfs.]prfr.',
    'January=Jan.[Jau.+Jny.]Jry.',
    'February=Feb.[Fer.+Fbr.]Fby.',
    'March=Mar.[Mrc.+Mch.]Mac.',
    'April=Apr.[Api.+Apl.]Arl.',
    'June=Jun.[J.+Jn.]Jne.',
    'July=Jul.[J.+Jl.]Jly.',
    'August=Aug.[Ags.+Agt.]Aut.',
    'September=Sep.[Spt.+Sptm.]Stm.',
    'October=Oct.[Obr.+Ocb.]Ocr.',
    'November=Nov.[Nvm.+Nom.]Nvr.',
    'December=Dec.[Dcm.+Dbr.]Dem.',
    'Father=Fr.[Fa.+Ft.]Fth.',
    'General=Gen.[Ger.+Genr.]Gnl.',
    'Lieutenant=Lt.[Ln.+Li.]Lu.',
    'Sergeant=Sgt.[Sgn.+Srg.]Snt.',
    'Captain=Capt.[Cpn.+Capn.]Cptn.',
    'Colonel=Col.[Coln.+Cll.]Cnl.',
    'brothers=bros.[brot.+brtr.]brth.',
];

// ---- Pre-parse (§5.1) ----
$items = [];
foreach ($rawData as $raw) {
    $eq = strpos($raw, '=');
    $b1 = strpos($raw, '[');
    $pl = strpos($raw, '+');
    $b2 = strpos($raw, ']');
    if ($eq === false || $b1 === false || $pl === false || $b2 === false) continue;
    $word    = trim(substr($raw, 0, $eq));
    $correct = trim(substr($raw, $eq + 1, $b1 - $eq - 1));
    $w1      = trim(substr($raw, $b1 + 1, $pl - $b1 - 1));
    $w2      = trim(substr($raw, $pl + 1, $b2 - $pl - 1));
    $w3      = trim(substr($raw, $b2 + 1));
    if ($word === '' || $correct === '') continue;
    $items[] = [
        'word'    => $word,
        'correct' => $correct,
        'wrong'   => [$w1, $w2, $w3],
    ];
}

// ---- Helpers (§8.4) ----
// Hugging word box — display:block + width:fit-content so vertical margins
// apply reliably and the short word hugs inside the box.
function abbr_box(string $html, int $minHeight = 80): void {
    echo '<div style="display:block;width:fit-content;max-width:480px;'
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto;padding:20px 40px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- No-repeat picker (§6) ----
function pick_abbr(array $pool, string $sessionKey): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        if (!in_array($i, $used, true)) $available[] = $i;
    }
    if (empty($available)) {
        $used = [];
        $available = array_keys($pool);
    }
    $idx    = $available[array_rand($available)];
    $item   = $pool[$idx];
    $used[] = $idx;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return $item;
}

function build_abbr_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_abbr($items, $sessionKey);
    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);
    return [
        'word'    => $item['word'],
        'correct' => $item['correct'],
        'choices' => $choices,
        'lvl'     => $lvl,
    ];
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
    $_SESSION[$sessionKey]['current'] = build_abbr_question($items, $lvl, $sessionKey);
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
render_header($moduleTitle.' - Grade '.$grd, $moduleTitle.' - Grade '.$grd, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur     = $result['cur'];
    $wordEsc = htmlspecialchars($cur['word']);
    $ansEsc  = '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['correct']) . '\'</strong>';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php abbr_box(
      '<span style="font-size:24pt;font-weight:700;color:#0000CC;line-height:1.3;">' . $wordEsc . '</span>',
      80
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The most common abbreviation for '<?php echo $wordEsc; ?>' is <?php echo $ansEsc; ?>.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q       = $_SESSION[$sessionKey]['current'];
    $wordEsc = htmlspecialchars($q['word']);
?>
  <div style="margin:35px auto 8px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    What is the most common <span style="color:#CC0066;">abbreviation</span> for this word?
  </div>
  <?php abbr_box(
      '<span style="font-size:24pt;font-weight:700;color:#0000CC;line-height:1.3;">' . $wordEsc . '</span>',
      80
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:240px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:22pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>