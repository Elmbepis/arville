<?php
// english/modules/homographs.php
// Homographs — identify an alternative meaning of a homograph.
// Single level (Easy) — legacy forced $_SESSION['level']="Easy" at the top and
// the level never affected content (only which legacy DB column was updated,
// now handled by Scorer). Grade displayed but does not affect tier.
// 4 choices always. Choices are phrases (15–30 chars), so the layout uses a
// vertical stack (one per row) per §9.1 "4 (long sentences)" — a 2×2 grid
// would wrap awkwardly for 4–6-word answers.
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the question box.

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
$moduleTitle = 'Homographs';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector (legacy forced Easy and content never varied by level).
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (28 items) ----
// Format: "<question>=<correct>[<w1>+<w2>]<w3>"
$rawQuestions = [
    "The word 'does' is the present, third-party, singular form of 'do'. It may also mean what?=female deer[an amount of medicine+to sleep lightly]the number '2'",
    "The word 'entrance' refers to something that you enter. It may also mean what?=to enchant[to arrive+an opportunity]a special event",
    "The word 'evening' refers to what takes place after late afternoon. It may also mean what?=making something more even[to attend a party+the day before]making an excuse",
    "The word 'bass' refers to a kind of fish. It may also mean what?=a low voice or sound[to support+the bottom of anything]a platform",
    "Which of the following is the meaning of the homograph of the word for a winged mammal?=what you hit a baseball with[other than+the part behind something]to strike with one's head",
    "Which of the following is the meaning of the homograph of the word for the green, flat parts of a plant?=goes away from[resides in a place+survives or thrives]the cover of a book",
    "Which of the following is the meaning of the homograph of the word for 60 seconds?=very small[very large+a kind of dance]a kind of herb",
    "Which of the following is the meaning of the homograph of the word for 1/60th of a minute?=what comes after first[to send or deliver+to guess]to wait longer",
    "The word 'moped' refers to a small motorcycle. It may also mean what?=felt and acted miserable[became enthusiastic+cleaned the floor]having thick hair",
    "The word 'object' refers to something we can see or touch. It may also mean what?=to oppose or disagree[a topic taught in school+not proud]to throw out by force",
    "The word 'seal' refers to a mammal with flippers. It may also mean what?=to close something tightly[a body of salt water+the basic unit of life]to burn the surface of",
    "The word 'page' refers to a part of the book where text is printed. It may also mean what?=a young person serving a knight[a kind of sea animal+to trim]light in color",
    "The word 'wind' refers to moving air. It may also mean what?=to turn or twist repeatedly[a complaining cry+to be successful]not tame",
    "The word 'bow' means to bend at the waist. It may also mean what?=the front of a boat[a sharp weapon+to travel on water]to cry noisily",
    "Which of the following is the meaning of the homograph of the word for a large carnivorous mammal, one type of which is the Grizzly?=to carry the weight of[naked or unclothed+a long piece of wood]a kind of drink",
    "Which of the following is the meaning of the homograph of the word for a bird's beak?=an amount of money to be paid[a kind of meat+to construct]a kind of toy",
    "The word 'desert' refers to a hot, sandy place. It may also mean what?=to abandon[a sweet dish such as cake+to cut up]to want something very much",
    "The word 'drive' means to operate and control a vehicle. It may also mean what?=an urge to attain a goal[to let something fall+something serious or extreme]nonsense",
    "The word 'fine' refers to a payment of money serving as penalty. It may also mean what?=of high quality[to know where something is+a body part used for swimming]the end of something",
    "The word 'point' refers to an idea that you want other people to understand. It may also mean what?=the sharp end of a tool[an amount of liquid+to color something]a quick, short breath",
    "The phrase 'shore up' means to support or prop up. The word 'shore' also means what?=land along the edge of a sea[to divide among people+a sound sleeping people make]to cut or clip",
    "The word 'tick' refers to the sound made by a clock. It may also mean what?=a dog parasite[to get something+to push under]a thin piece of wood",
    "The word 'coil' refers to a wire wound in a spiral. It may also mean what?=to curl around something[to lower the temperature of+to summon someone]a flat piece of metal",
    "The word 'fire' refers to the hot and bright thing that makes things burn. It may also mean what?=to remove a person from a job[a kind of tree+to be afraid of something]a kind of tool",
    "The word 'stalk' refers to the main stem of a plant or flower. It may also mean what?=to follow prey without being seen[to communicate by words+to be trapped in something]to fasten up",
    "The word 'stream' refers to a small, flowing body of water. It may also mean what?=to run or flow continuously[vapor produced by boiling water+to leap or jump]to fall sharply",
    "The word 'trail' means to be pulled behind someone or something. It may also mean what?=an unpaved track or path made by passage[to aim a gun at something+to teach a particular skill]a series of railroad cars",
    "The word 'built' is the past tense of 'build'. It may also mean what?=the size and shape of a body[a feeling of regret or remorse+a structure with a roof and walls]an animal sound",
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
function hg_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function hg_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// ---- No-repeat picker (§6) ----
function pick_hg(array $pool, string $sessionKey): array {
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

function build_hg_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_hg($items, $sessionKey);
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
    $_SESSION[$sessionKey]['current'] = build_hg_question($items, $lvl, $sessionKey);
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
    $fbQ = hg_bind_last_words($cur['question']);
    $fbA = htmlspecialchars($cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php hg_box('<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;text-wrap:balance;">' . $fbQ . '</div>', 120); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;text-wrap:balance;">
    The correct answer is <strong style="color:#CC0066;font-size:15pt;">'<?php echo $fbA; ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $qText = hg_bind_last_words($q['question']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Choose the meaning of the <span style="color:#CC0066;">homograph</span>:
  </div>
  <?php hg_box('<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;text-wrap:balance;">' . $qText . '</div>', 120); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>  <div style="width:fit-content;max-width:480px;margin:0 auto;">
  <?php foreach ($q['choices'] as $c): ?>
    <a href="?ansclick=<?php echo urlencode($c); ?>"
       style="display:block;margin:10px 0;padding:14px 20px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
              font-size:16pt;font-weight:600;text-align:center;
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