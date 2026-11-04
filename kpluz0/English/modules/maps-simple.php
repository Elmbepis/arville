<?php
// english/modules/maps-simple.php
// Interpreting Simple Maps — read a map, street sign, or directional diagram
// and click the correct answer.
// Single level (Easy) — legacy hardcoded $_SESSION['level']="Easy" at the top
// and never varied content by grade or level. Grade displayed but does not
// affect tier (matches cblends/cdigraphs/homographs/abbreviations/info-text).
// 4 M/C choices always (2×2 grid); every question shows a map/symbol image
// above the question box.
//
// Data format: '<question>**<image>.jpg=<answer>[<w1>+<w2>]<w3>'
//   The **<image>.jpg marker is extracted at definition time; the image is
//   served from ../images/others/.
//
// LAYOUT (mirrors info-text-elements.php):
//   [Image — always present]
//   [Hugging box with question, vertically centered]
//   [Click on the correct answer below. — gray]
//   [Choices 2×2]
//
// Feedback: replicates the question-page presentation — same image, same
// yellow box, question shown as-is. Below the box: "The correct answer is 'X'."

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
$moduleTitle = 'Interpreting Simple Maps';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (28 items) ----
$rawData = [
    "The front of the school is on which street?**map1.jpg=Bonifacio St.[Rizal St.+Luna St.]Jacinto St.",
    "The front of the bakery is on which street?**map1.jpg=Bonifacio St.[Rizal St.+Luna St.]Jacinto St.",
    "The bakery is at the corner of Bonifacio St. and ____.**map1.jpg=Luna St.[Rizal St.+Quezon St.]Jacinto St.",
    "The front of the red hospital is on which street?**map1.jpg=Bonifacio St.[Rizal St.+Luna St.]Jacinto St.",
    "The front of the city hall is on which street?**map1.jpg=Rizal St.[Bonifacio St.+Luna St.]Jacinto St.",
    "The front of the white hospital is on which street?**map1.jpg=Rizal St.[Bonifacio St.+Luna St.]Jacinto St.",
    "The front of the arena is on which street?**map1.jpg=Jacinto St.[Bonifacio St.+Luna St.]Rizal St.",
    "The BACK of the mall is on which street?**map1.jpg=Jacinto St.[Bonifacio St.+Luna St.]Rizal St.",
    "You'll find the BACK of the mall at the corner of Jacinto St. and ____.**map1.jpg=Luna St.[Bonifacio St.+Quezon St.]Rizal St.",
    "The red arrow is pointing to which of these?**map1.jpg=hills[river+playground]sea",
    "The blue arrow is pointing to which of these?**map1.jpg=river[hills+playground]farm",
    "The purple arrow is pointing to which of these?**map1.jpg=playground[hills+river]sea",
    "Which street crosses ALL the other streets?**map1.jpg=Luna St.[Bonifacio St.+Jacinto St.]Rizal St.",
    "If you are at point A, then you need to go ____ and then ____ to reach the blue house.**map2.jpg=north, west[north, east+south, west]south, east",
    "If you are at point A, then you need to go north and turn ____ at ____ to reach the bakery.**map2.jpg=left, Mangga St.[right, Mangga St.+left, Saging St.]right, Saging St.",
    "If you are at point A, then you need to go north and turn ____ at ____ to reach the hospital.**map2.jpg=left, Saging St.[right, Mangga St.+left, Mangga St.]right, Saging St.",
    "If you are at point B, then you need to go east and turn ____ at ____ to reach the church.**map2.jpg=right, Duhat St.[right, Buko St.+left, Buko St.]left, Duhat St.",
    "If you are at point B, then you need to go east and turn ____ at ____ to reach the bank.**map2.jpg=right, Duhat St.[right, Buko St.+left, Buko St.]left, Duhat St.",
    "If you are at point B, then you need to go ____ to reach the hospital.**map2.jpg=south[north+east]west",
    "The picture is showing the map or street sign symbol for which of these?**map3.jpg=hospital[church+airport]bank",
    "The map or street sign symbol shown represents which of these?**map4.jpg=church[hospital+school]bank",
    "The map or street sign symbol shown represents which of these?**map5.jpg=bank[hospital+school]church",
    "The map or street sign symbol shown represents which of these?**map6.jpg=school[hospital+bank]church",
    "The map or street sign symbol shown represents which of these?**map7.jpg=airport[railroad+tunnel]garage",
    "The map or street sign symbol shown represents which of these?**map8.jpg=restaurant[hospital+school]church",
    "The map or street sign symbol shown represents which of these?**map9.jpg=railroad[tunnel+airport]garage",
    "The map or street sign symbol shown represents which of these?**map10.jpg=tunnel[railroad+airport]garage",
    "The map or street sign symbol shown represents which of these?**map11.jpg=hotel[church+hospital]garage",
];

// ---- Parser (§5.1) — run once at definition time ----
function ms_parse(string $raw): ?array {
    $image = '';
    if (preg_match('/\*\*([^.]+)\.jpg/', $raw, $m)) {
        $image = '../images/others/' . $m[1] . '.jpg';
        $raw = str_replace($m[0], '', $raw);
    }

    $eq = strpos($raw, '=');
    if ($eq === false) return null;
    $question = trim(substr($raw, 0, $eq));
    $rest = substr($raw, $eq + 1);

    $b1 = strpos($rest, '[');
    if ($b1 === false) return null;
    $answer = trim(substr($rest, 0, $b1));
    $rest = substr($rest, $b1 + 1);

    $pl = strpos($rest, '+');
    if ($pl === false) return null;
    $w1 = trim(substr($rest, 0, $pl));
    $rest = substr($rest, $pl + 1);

    $b2 = strpos($rest, ']');
    if ($b2 === false) return null;
    $w2 = trim(substr($rest, 0, $b2));
    $w3 = trim(substr($rest, $b2 + 1));

    if ($question === '' || $answer === '') return null;
    return [
        'question' => $question,
        'image'    => $image,
        'answer'   => $answer,
        'wrong'    => [$w1, $w2, $w3],
    ];
}

$items = [];
foreach ($rawData as $raw) {
    $parsed = ms_parse($raw);
    if ($parsed !== null) $items[] = $parsed;
}

// ---- Helpers (§8.4, §8.6) ----
// Hugging box — display:flex (block-level) with vertical centering so short
// questions like "The chart shown is called what?" don't float at the top of
// a tall 100px box.
function ms_box(string $html, int $minHeight = 100): void {
    echo '<div style="display:flex;flex-direction:column;justify-content:center;'
       . 'width:fit-content;max-width:480px;'
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto;padding:20px 32px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Image display above the box.
function ms_image(string $path): void {
    if ($path === '') return;
    echo '<div style="margin:24px auto 8px;text-align:center;">'
       . '<img src="' . htmlspecialchars($path) . '" alt="Map" '
       . 'style="display:inline-block;max-width:100%;max-height:400px;'
       . 'border:2px solid #DDD;border-radius:8px;">'
       . '</div>';
}

// ---- No-repeat picker (§6) ----
function pick_ms(array $pool, string $sessionKey): array {
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

function build_ms_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_ms($items, $sessionKey);
    $choices = array_merge([$item['answer']], $item['wrong']);
    shuffle($choices);
    return [
        'question' => $item['question'],
        'image'    => $item['image'],
        'answer'   => $item['answer'],
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
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $_SESSION[$sessionKey]['current'] = build_ms_question($items, $lvl, $sessionKey);
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
    $cur      = $result['cur'];
    $question = htmlspecialchars($cur['question']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php ms_image($cur['image']); ?>
  <?php ms_box(
      '<div style="font-size:16pt;color:#333;line-height:1.55;text-align:center;">'
    . $question
    . '</div>', 100
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The correct answer is
    <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q        = $_SESSION[$sessionKey]['current'];
    $question = htmlspecialchars($q['question']);
?>
  <?php ms_image($q['image']); ?>
  <?php ms_box(
      '<div style="font-size:16pt;color:#333;line-height:1.55;text-align:center;">'
    . $question
    . '</div>', 100
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:280px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:16pt;font-weight:700;text-align:center;
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