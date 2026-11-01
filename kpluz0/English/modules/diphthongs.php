<?php
// english/modules/diphthongs.php
// Words with Diphthongs — multiple choice: click the word containing a diphthong.
// 2 tiers via level only (Easy &#8594; pool 1, Hard &#8594; pool 3); grade is displayed
// but does not affect tier selection (matches legacy behavior — $grd was never used).
// 4 choices always (2×2 grid), 1 diphthong + 3 non-diphthong distractors.
// Grade from $_SESSION['user_grade'] (0–10).

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
$moduleTitle = 'Words with Diphthongs';
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

// ---- Tier mapping (§4.3) ----
// Legacy: Easy &#8594; $arrnum=1, Medium &#8594; $arrnum=2, Hard &#8594; $arrnum=3. Grade never used.
// Modern (2 levels): Easy &#8594; 1, Hard &#8594; 3 (harder of legacy Medium/Hard).
function resolve_diphthongs_tier(string $lvl, int $grd): int {
    return ($lvl === 'Easy') ? 1 : 3;
}

// ---- Data (§5) — verbatim from legacy ----
// Pool 2 is preserved from legacy but unreachable under the current 2-level design.
$diphs = [];
$diphs[1] = [
    "aim","about","away","boil","boy","brain","chair","coin","cloud","clown","count","cow","down","drain","fail","found","gown","hair",
    "hour","house","loud","mail","main","mouse","mouth","noise","noun","pound","paint","play","power","raid","rail","rain","sail","soil",
    "shout","sound","stain","train","towel","town","toy","wait"
];
$diphs[2] = [
    "afraid","allow","around","avoid","bare","bounce","broil","brown","care","couch","crown","doubt","faint","flour","fowl","ground","growl","howl",
    "loyal","plow","point","pouch","pound","proud","raise","scout","share","shower","snout","sound","south","spoil","tower","voice","vowel","yellow"
];
$diphs[3] = [
    "amount","announce","blare","blouse","choice","complain","destroy","dowel","eight","explain","flare","flower","follow","forgive","frown","hoist","hound",
    "joint","moist","mountain","playground","poison","railway","rainstorm","rare","remain","royalty","sprout","square","straight","strain","though","trousers"
];

$notdiphs = [];
$notdiphs[1] = [
    "ball","belt","bless","call","clams","club","crabs","duck","fell","fence","glass","gets","hugs","lend","let","luck","plant","rob",
    "rocks","rub","sell","send","sing","socks","step","tell","tent","truck"
];
$notdiphs[2] = [
    "added","banana","basket","blast","block","brand","bring","cactus","chicken","clash","clock","dancing","fasten","glasses","jumped","melted","relax",
    "sadden","scan","shrubs","shrugs","ticket","watch"
];
$notdiphs[3] = [
    "admit","bucket","brass","candid","capital","clapping","elephant","handbag","happen","helpless","kissed","patrolman","quicksand","running","stopping",
    "stuntman","violin","visited","wrench","wrist"
];

// ---- Helpers (§8.4, §8.6) ----
function diph_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- No-repeat picker (§6) ----
function pick_diphthong(array $pool, string $sessionKey, int $tier): array {
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
    $word   = $available[$idx];
    $used[] = "t$tier:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return ['word' => $word, 'index' => $idx];
}

// ---- Question builder ----
function build_diphthong_question(array $diphs, array $notdiphs, int $tier, string $lvl, string $sessionKey): array {
    $dPool = $diphs[$tier]    ?? $diphs[1];
    $nPool = $notdiphs[$tier] ?? $notdiphs[1];

    $picked = pick_diphthong($dPool, $sessionKey, $tier);

    $shuffled = $nPool;
    shuffle($shuffled);
    $wrong = array_slice($shuffled, 0, 3);

    $choices = array_merge([$picked['word']], $wrong);
    shuffle($choices);

    return [
        'choices' => $choices,
        'correct' => $picked['word'],
        'lvl'     => $lvl,
        'tier'    => $tier,
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
    $tier = resolve_diphthongs_tier($lvl, $grd);
    $_SESSION[$sessionKey]['current'] = build_diphthong_question($diphs, $notdiphs, $tier, $lvl, $sessionKey);
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
render_header($moduleTitle.' - '.$lvl, $moduleTitle.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $parts = [];
    foreach ($cur['choices'] as $c) {
        if ($c === $cur['correct']) {
            $parts[] = '<span style="color:#CC0066;font-weight:700;">' . htmlspecialchars($c) . '</span>';
        } else {
            $parts[] = '<span style="color:#888;">' . htmlspecialchars($c) . '</span>';
        }
    }
    $boxHtml = implode(' &nbsp; ', $parts);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php diph_box('<div style="width:100%;font-size:17pt;line-height:1.7;">' . $boxHtml . '</div>'); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The word that contains a diphthong is
    <strong style="color:#CC0066;font-size:15pt;">'<?php echo htmlspecialchars($cur['correct']); ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Which of the following words contains a <span style="color:#CC0066;">diphthong</span>?
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