<?php
// english/modules/spelling-irreg.php
// Identifying Words with Irregular Spelling — click the word with the most
// irregular spelling from a set of 4 (1 irregular + 3 regular spellings).
// Single level (Easy) — legacy forced $_SESSION['level']="Easy" at the top and
// the level never affected content (only which legacy DB column was updated,
// now handled by Scorer). Grade displayed but does not affect tier.
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons. No content box on the question page
// because the module has no sentence/content to display — the words ARE the
// choices (matches cblends layout when no separate sentence exists).

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
$moduleTitle = 'Identifying Words with<br/>Irregular Spelling';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector (legacy forced Easy and did not vary by level).
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy ----
// Two separate pools: one irregular word (correct) + 3 regular words (distractors).
$irregsList = [
    'again', 'answer', 'any', 'are', 'bear', 'beautiful', 'beauty', 'because',
    'bind', 'blind', 'both', 'bough', 'bright', 'brought', 'choir', 'come',
    'could', 'cycle', 'do', 'door', 'earth', 'eight', 'enough', 'example',
    'eyes', 'fasten', 'father', 'find', 'four', 'friend', 'give', 'great',
    'hasten', 'have', 'kind', 'knight', 'know', 'laugh', 'league', 'learn',
    'light', 'listen', 'might', 'mind', 'most', 'mother', 'move', 'night',
    'often', 'one', 'once', 'other', 'people', 'plaid', 'receipt', 'right',
    'rough', 'said', 'should', 'sight', 'slight', 'some', 'stalk', 'straight',
    'the', 'they', 'their', 'though', 'thorough', 'there', 'through', 'to',
    'tough', 'two', 'walk', 'were', 'water', 'where', 'who', 'whose', 'would', 'you',
];

$regsList = [
    'basket', 'beach', 'better', 'black', 'blame', 'bleed', 'blow', 'boast',
    'brain', 'brake', 'branch', 'breed', 'chain', 'cheek', 'cherry', 'chime',
    'choose', 'class', 'coach', 'coast', 'craft', 'crash', 'cream', 'cried',
    'crime', 'draft', 'dream', 'faint', 'ferry', 'float', 'gland', 'glass',
    'glide', 'glow', 'grant', 'gray', 'greed', 'green', 'jelly', 'mail',
    'number', 'paint', 'peak', 'person', 'pillow', 'place', 'plead', 'poach',
    'preach', 'prime', 'queen', 'rabbit', 'rain', 'reach', 'roam', 'saint',
    'sheet', 'shell', 'shine', 'sing', 'slash', 'slide', 'slime', 'small',
    'snail', 'snow', 'soak', 'sport', 'spray', 'spring', 'stall', 'stood',
    'stray', 'stripe', 'sweet', 'street', 'teach', 'toast', 'trade', 'trail', 'train', 'tried',
];

// ---- Helpers (§8.4, §8.6) ----
function sp_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- No-repeat picker (§6) — keyed by index into $irregsList ----
function pick_sp_index(array $pool, string $sessionKey): int {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $w) {
        if (!in_array($i, $used, true)) $available[] = $i;
    }
    if (empty($available)) {
        $used = [];
        $available = array_keys($pool);
    }
    $idx = $available[array_rand($available)];
    $used[] = $idx;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return $idx;
}

function build_sp_question(array $irregs, array $regs, string $lvl, string $sessionKey): array {
    $idx     = pick_sp_index($irregs, $sessionKey);
    $correct = $irregs[$idx];

    // 3 distinct regular-word distractors (never equal to the correct word,
    // never equal to each other)
    $wrong = [];
    $guard = 0;
    while (count($wrong) < 3 && $guard < 200) {
        $w = $regs[array_rand($regs)];
        if ($w !== $correct && !in_array($w, $wrong, true)) {
            $wrong[] = $w;
        }
        $guard++;
    }

    $choices = array_merge([$correct], $wrong);
    shuffle($choices);

    return [
        'correct' => $correct,
        'wrong'   => $wrong,
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
    $_SESSION[$sessionKey]['current'] = build_sp_question($irregsList, $regsList, $lvl, $sessionKey);
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
    $cur = $result['cur'];
    // Build a highlighted four-word listing for the feedback box:
    // "'again', 'basket', 'beach', and 'better'" with the answer in pink.
    $quoted = [];
    foreach ($cur['choices'] as $c) {
        $esc = htmlspecialchars($c);
        if ($c === $cur['correct']) {
            $esc = '<strong style="color:#CC0066;">' . $esc . '</strong>';
        }
        $quoted[] = "'" . $esc . "'";
    }
    $last = array_pop($quoted);
    $boxContent = implode(', ', $quoted) . ', and ' . $last;
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    You clicked on: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The word with the most irregular spelling is
    <strong style="color:#CC0066;font-size:15pt;">'<?php echo htmlspecialchars($cur['correct']); ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Which word has the most <span style="color:#CC0066;">irregular spelling</span>?
  </div>
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
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>