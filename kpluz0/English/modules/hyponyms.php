<?php
// english/modules/hyponyms.php
// Hyponyms — identify which of four words is NOT a hyponym of the given
// category (hypernym). The category word inside <i>…</i> in the question is
// highlighted pink at render.
// Single level (Easy) — legacy forced $_SESSION['level']="Easy" at the top and
// level never affected content (only which legacy EPluz_accounts column was
// updated, now handled by Scorer). Grade displayed but does not affect tier.
// 4 choices, "hugging" layout — all buttons match the widest choice's width
// via a width:fit-content wrapper (see conversion notes).

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
$moduleTitle = 'Hyponyms';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector (legacy forced Easy and content never varied by level).
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (30 items) ----
// Format: "<question>=<correct>[<w1>+<w2>]<w3>"
// Questions carry <i>…</i> around the hypernym; rendered as pink italic.
$rawQuestions = [
    "All of the following are hyponyms of <i>flower</i> except ____.=ostrich[rose+daisy]chrysanthemum",
    "All of the following are hyponyms of <i>bird</i> except ____.=trout[owl+eagle]pigeon",
    "All of the following are hyponyms of <i>fish</i> except ____.=turtle[guppy+tilapia]koi",
    "All of the following are hyponyms of <i>mammal</i> except ____.=crocodile[tiger+elephant]giraffe",
    "All of the following are hyponyms of <i>reptile</i> except ____.=frog[snake+turtle]alligator",
    "All of the following are hyponyms of <i>sport</i> except ____.=math[basketball+volleyball]swimming",
    "All of the following are hyponyms of <i>martial art</i> except ____.=marathon[karate+taekwondo]judo",
    "All of the following are hyponyms of <i>subject</i> except ____.=recess[math+science]English",
    "All of the following are hyponyms of <i>insect</i> except ____.=earthworm[butterfly+ant]cockroach",
    "All of the following are hyponyms of <i>arachnid</i> except ____.=termite[spider+mite]scorpion",
    "All of the following are hyponyms of <i>cartoon character</i> except ____.=Star Wars[Superman+Bugs Bunny]Mickey Mouse",
    "All of the following are hyponyms of <i>gadget</i> except ____.=handkerchief[cellphone+tablet]camera",
    "All of the following are hyponyms of <i>machine</i> except ____.=garage[car+tractor]airplane",
    "All of the following are hyponyms of <i>job</i> except ____.=office[doctor+teacher]pilot",
    "All of the following are hyponyms of <i>city</i> except ____.=Philippines[Manila+Pasig]Makati",
    "All of the following are hyponyms of <i>country</i> except ____.=Tokyo[Japan+China]Vietnam",
    "All of the following are hyponyms of <i>number</i> except ____.=vowel[three+seven]thirteen",
    "All of the following are hyponyms of <i>landform</i> except ____.=ocean[mountain+valley]plain",
    "All of the following are hyponyms of <i>water body</i> except ____.=plateau[river+brook]lake",
    "All of the following are hyponyms of <i>energy</i> except ____.=steel[light+heat]sound",
    "All of the following are hyponyms of <i>matter</i> except ____.=light[air+wood]oil",
    "All of the following are hyponyms of <i>body covering</i> except ____.=gills[scales+fur]feathers",
    "All of the following are hyponyms of <i>body part</i> except ____.=mind[brain+chest]forehead",
    "All of the following are hyponyms of <i>clothing</i> except ____.=wallet[pants+shirt]skirt",
    "All of the following are hyponyms of <i>wind instrument</i> except ____.=cello[horn+trombone]oboe",
    "All of the following are hyponyms of <i>string instrument</i> except ____.=clarinet[guitar+ukulele]violin",
    "All of the following are hyponyms of <i>fruit</i> except ____.=lilac[banana+pear]peach",
    "All of the following are hyponyms of <i>language</i> except ____.=London[English+French]German",
    "All of the following are hyponyms of <i>heavenly body</i> except ____.=atmosphere[planet+moon]comet",
    "All of the following are hyponyms of <i>vehicle</i> except ____.=suitcase[yacht+motorcycle]dump truck",
];

// ---- Pre-parse (§5.1) ----
$items = [];
foreach ($rawQuestions as $raw) {
    $eq = strpos($raw, '=');
    $b1 = strpos($raw, '[');
    $pl = strpos($raw, '+');
    $b2 = strpos($raw, ']');
    if ($eq === false || $b1 === false || $pl === false || $b2 === false) continue;
    $question = trim(substr($raw, 0, $eq));
    $correct  = trim(substr($raw, $eq + 1, $b1 - $eq - 1));
    $w1 = trim(substr($raw, $b1 + 1, $pl - $b1 - 1));
    $w2 = trim(substr($raw, $pl + 1, $b2 - $pl - 1));
    $w3 = trim(substr($raw, $b2 + 1));
    if ($question === '' || $correct === '') continue;
    $items[] = [
        'question' => $question,
        'correct'  => $correct,
        'wrong'    => [$w1, $w2, $w3],
    ];
}

// ---- Helpers (§8.4, §8.6) ----
function hy_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Escape everything EXCEPT the specific <i>…</i> pair, which is re-emitted as
// a styled italic (color #CC0066) around the hypernym.
function hy_render_question(string $q): string {
    $esc = htmlspecialchars($q);
    $esc = str_replace('&lt;i&gt;',
        '<i style="color:#CC0066;font-style:italic;">', $esc);
    $esc = str_replace('&lt;/i&gt;', '</i>', $esc);
    return $esc;
}

// ---- No-repeat picker (§6) ----
function pick_hy(array $pool, string $sessionKey): array {
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

function build_hy_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_hy($items, $sessionKey);
    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);
    return [
        'question' => $item['question'],
        'correct'  => $item['correct'],
        'choices'  => $choices,
        'lvl'      => $lvl,
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
    $_SESSION[$sessionKey]['current'] = build_hy_question($items, $lvl, $sessionKey);
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
    $fbQ = hy_render_question($cur['question']);
    $fbA = htmlspecialchars($cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php hy_box('<div style="width:100%;font-size:16pt;color:#333;line-height:1.6;text-wrap:balance;">' . $fbQ . '</div>', 120); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;">'<?php echo $fbA; ?>'</strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $qHtml = hy_render_question($q['question']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Which word does <span style="color:#CC0066;">not</span> belong?
  </div>
  <?php hy_box('<div style="width:100%;font-size:16pt;color:#333;line-height:1.6;text-wrap:balance;">' . $qHtml . '</div>', 120); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <div style="width:fit-content;max-width:480px;margin:0 auto;">
  <?php foreach ($q['choices'] as $c): ?>
    <a href="?ansclick=<?php echo urlencode($c); ?>"
       style="display:block;margin:10px 0;padding:14px 28px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
              font-size:18pt;font-weight:700;text-align:center;
              line-height:1.5;box-sizing:border-box;word-break:break-word;">
      <?php echo htmlspecialchars($c); ?>
    </a>
  <?php endforeach; ?>
  </div>
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