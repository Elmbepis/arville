<?php
// english/modules/pictographs.php
// Interpreting Graphs, Tables, and Pictographs — read a graph, table, or
// pictograph and click the correct answer.
// Single level (Easy) — legacy hardcoded $_SESSION['level']="Easy" at the top
// and never varied content by grade or level. Grade displayed but does not
// affect tier (matches cblends/cdigraphs/homographs/abbreviations/
// info-text-elements/maps-simple).
// 4 M/C choices always (2×2 grid); every question shows a graph image above
// the question box.
//
// Data format: '<question>**<image>.jpg=<answer>[<w1>+<w2>]<w3>'
//   The **<image>.jpg marker is extracted at definition time; the image is
//   served from ../images/others/.
//
// LAYOUT (mirrors maps-simple.php):
//   [Image — always present]
//   [Hugging box with question, vertically centered]
//   [Click on the correct answer below. — gray]
//   [Choices 2×2]
//
// Feedback: replicates the question-page presentation — same image, same
// yellow box, question shown as-is. Below the box: "The correct answer is 'X'."
//
// Data fix (§5.4): Q8 distractor "March 10" &#8594; "March, 10" (missing comma
// consistent with every other Month,Number pair in the data).

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
$moduleTitle = 'Interpreting Graphs, Tables,<br/>and Pictographs';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (32 items), one typo fix ----
$rawData = [
    "Which animal got the highest number of votes as the students' favorite pet and how many votes did it get?**graph1.jpg=dog, 9[bird, 8+dog, 10]bird, 9",
    "Which animal got the lowest number of votes as the students' favorite pet and how many votes did it get?**graph1.jpg=turtle, 5[fish, 6+turtle, 4]turtle, 6",
    "All in all, how many students voted for the TOP three favorite pets in the graph?**graph1.jpg=24[26+25]23",
    "Which subject got the highest number of votes as the students' favorite and how many votes did it get?**graph2.jpg=English, 10[English, 9+math, 9]math, 10",
    "Which subject got the lowest number of votes as the students' favorite and how many votes did it get?**graph2.jpg=AP, 4[AP, 5+Filipino, 5]Filipino, 6",
    "All in all, how many students voted for the three LEAST favorite subjects in the graph?**graph2.jpg=18[16+17]19",
    "During which month did Harry sell the highest number of cakes and how many cakes did he sell that month?**graph3.jpg=May, 22[January, 20+May, 25]January, 22",
    "During which month did Harry sell the lowest number of cakes and how many cakes did he sell that month?**graph3.jpg=February, 11[March, 12+February, 15]March, 10",
    "All in all, how many cakes did Harry sell from January to June?**graph3.jpg=96[86+76]106",
    "Which two components cost the most in the construction of a house and how many percent of the total cost do they account for?**txtaid11.jpg=labor, cement: 45%[labor, cement: 50%+labor, steel: 45%]labor, steel: 40%",
    "Timber, steel, and bricks account for how many percent of the total cost of constructing a house?**txtaid11.jpg=40%[45%+50%]55%",
    "Which two pets are owned by the most number of people and how many percent of the total number of pets do they account for?**graph4.jpg=dogs, cats: 85%[dogs, cats: 55%+dogs, cats: 65%]dogs, cats: 75%",
    "Which two pets are owned by the least number of people and how many percent of the total number of pets do they account for?**graph4.jpg=birds, rodents: 9%[birds, rodents: 5%+fishes, rodents: 8%]birds, fishes: 7%",
    "Which two zoo animals are the most popular and how many percent of the votes did they get?**graph5.jpg=lion, tiger: 60%[lion, tiger: 64%+lion, elephant: 46%]lion, hippo: 47%",
    "Which two zoo animals are the least popular and how many percent of the votes did they get?**graph5.jpg=giraffe, elephant: 25%[giraffe, elephant: 24%+giraffe, hippo: 26%]giraffe, hippo: 25%",
    "How many percent of the votes did the zoo carnivores get?**graph5.jpg=60%[64%+68%]72%",
    "How many percent of the votes did the zoo herbivores get?**graph5.jpg=40%[44%+32%]36%",
    "During which month did Acme Company earn the most in 2017 and how many thousands of pesos, more or less, did it earn that month?**graph6.jpg=January, 165[January, 180+October, 150]November, 160",
    "During which month did Acme Company earn the most in 2018 and how many thousands of pesos, more or less, did it earn that month?**graph6.jpg=November, 160[November, 180+October, 140]January, 165",
    "During which month did Acme Company earn the least in 2017 and how many thousands of pesos, more or less, did it earn that month?**graph6.jpg=July, 28[July, 15+September, 30]September, 40",
    "During which month did Acme Company earn the least in 2018 and how many thousands of pesos, more or less, did it earn that month?**graph6.jpg=July, 43[July, 60+April, 55]September, 60",
    "Which teacher teaches the class with the most number of students and how many students are in that class?**table1.jpg=Ms. Williams, 37[Ms. Williams, 39+Ms. Melton, 28]Mr. Jones, 37",
    "Which teacher teaches the class with the least number of students and how many students are in that class?**table1.jpg=Ms. Smith, 20[Ms. Smith, 18+Ms. Melton, 18]Mr. Jones, 27",
    "Which kind of tree does Gina have the most number of in her garden and how many such trees does she have?**pictograph1.jpg=grape, 8[grape, 9+mango, 7]coconut, 8",
    "Which kind of tree does Gina have the least number of in her garden and how many such trees does she have?**pictograph1.jpg=rose, 4[rose, 5+banana, 4]banana, 5",
    "How many trees does Gina have in her garden all in all?**pictograph1.jpg=29[27+28]30",
    "How many toys did Mr. Cruz sell all in all?**pictograph2.jpg=17[18+19]20",
    "Which TWO toys did Mr. Cruz sell the most number of and how many such toys did he sell in total?**pictograph2.jpg=motorbikes and dolls: 12[motorbikes and cars: 13+motorbikes and dolls: 11]dolls and cars: 13",
    "Which TWO toys did Mr. Cruz sell the least number of and how many such toys did he sell in total?**pictograph2.jpg=ducks and cars: 7[ducks and cars: 6+ducks and dolls: 9]cars and dolls: 5",
    "How many fruits are in my basket all in all?**pictograph3.jpg=20[19+21]22",
    "Which TWO fruits do I have the most number of in my basket and how many such fruits do I have in total?**pictograph3.jpg=apples and oranges: 13[apples and oranges: 14+apples and bananas: 13]apples and bananas: 11",
    "Which TWO fruits do I have the least number of in my basket and how many such fruits do I have in total?**pictograph3.jpg=bananas and grapes: 7[bananas and grapes: 6+oranges and grapes: 9]oranges and bananas: 6",
];

// ---- Parser (§5.1) — run once at definition time ----
function pg_parse(string $raw): ?array {
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
    $parsed = pg_parse($raw);
    if ($parsed !== null) $items[] = $parsed;
}

// ---- Helpers (§8.4, §8.6) ----
// Hugging box — display:flex (block-level) with vertical centering so short
// questions don't float at the top of a tall 100px box.
function pg_box(string $html, int $minHeight = 100): void {
    echo '<div style="display:flex;flex-direction:column;justify-content:center;'
       . 'width:fit-content;max-width:480px;'
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto;padding:20px 32px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Image display above the box.
function pg_image(string $path): void {
    if ($path === '') return;
    echo '<div style="margin:24px auto 8px;text-align:center;">'
       . '<img src="' . htmlspecialchars($path) . '" alt="Graph" '
       . 'style="display:inline-block;max-width:100%;max-height:400px;'
       . 'border:2px solid #DDD;border-radius:8px;">'
       . '</div>';
}

// ---- No-repeat picker (§6) ----
function pick_pg(array $pool, string $sessionKey): array {
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

function build_pg_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_pg($items, $sessionKey);
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
    $_SESSION[$sessionKey]['current'] = build_pg_question($items, $lvl, $sessionKey);
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
// Title is 42 characters (>35) so drop the - Grade / - Level suffix per §3.3.
render_header($moduleTitle, $moduleTitle, $theme);
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
  <?php pg_image($cur['image']); ?>
  <?php pg_box(
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
  <?php pg_image($q['image']); ?>
  <?php pg_box(
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