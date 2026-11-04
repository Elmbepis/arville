<?php
// english/modules/info-text-elements.php
// Elements of Informational or Factual Text — identify text structures,
// text features, and chart/diagram types from a passage or an image.
// Single level (Easy) — legacy hardcoded $_SESSION['level']="Medium" at the
// top and never varied content by grade or level. Grade displayed but does
// not affect tier.
// 4 M/C choices always (2×2 grid); some questions show an image above the
// question text.
//
// Data format: '<question>**<image>.jpg=<answer>[<w1>+<w2>]<w3>'
//
// Inline tags <i> <u> <b> <br> are preserved through a whitelist because they
// are the text features the module is actually testing (e.g. <i>ante cibum</i>).
//
// Data fix (§5.4): Q6 had an orphan </b> at the start of the string.
//
// LAYOUT:
//   [Image — if present]
//   [Hugging box with question, prompt section in pink]
//   [Click on the correct answer below. — gray]     (question page only)
//   [Choices 2×2]                                   (question page only)
//
// Feedback: replicates the question-page presentation exactly — same yellow
// box, same pink-highlighted prompt, same ____ blank. Below the box:
// "The correct answer is 'X'." then the New Question button.

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
$moduleTitle = 'Elements of Informational<br/>or Factual Text';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Data (§5) — verbatim from legacy (20 items), one typo fix ----
$rawData = [
    "The diagram shown is called what?**txtaid03.jpg=Venn Diagram[Cause and Effect Diagram+Flow Diagram]Concept Map",
    "A ____, which consists of overlapping circles, shows the similarities and differences between two ideas.=Venn Diagram[Cause and Effect Diagram+Flow Chart]Pareto Chart",
    "According to this Venn diagram, whales and fishes have ____.**txtaid03.jpg=three things in common[nothing in common+six things in common]no differences",
    "Three pills are to be administered to the patient <i>ante cibum</i>.<br/><br/>Which of the following is the text feature used above to highlight important words?=italicization[underscoring+bold lettering]text coloring",
    "<u>Wash your hands</u> often with soap and water for at least 20 seconds, especially after you have been in a public place, or after blowing your nose, coughing, or sneezing.<br/><br/>Which of the following is the text feature used above to highlight important words?=underlining[italicization+bold lettering]text coloring",
    "When liquid water dries up, its state changes from <b>liquid to gas</b>. Water that has dried up has turned into <b>water vapor</b>. Water vapor is still water, but it is now in the gas state.<br/><br/>Which of the following is the text feature used above to highlight important words?=bold lettering[underscoring+italicization]text coloring",
    "Some countries, such as Japan, experience a lot of earthquakes. In these places, houses and buildings are designed in a way that will prevent them from collapsing when there is an earthquake. This is called 'earthquake-proofing'.<br/><br/>Which of the following is the informational text structure used above?=problem and solution[instructional+descriptive]cause and effect",
    "The surface of the Earth is divided into pieces called 'tectonic plates.' These plates move. When the plates rub against each other, they do not move smoothly. When the plates do not move smoothly, they cause earthquakes.<br/><br/>Which of the following is the informational text structure used above?=cause and effect[comparison and contrast+descriptive]problem and solution",
    "A mammal is an animal that breathes air, has a backbone, and grows hair at some point during its life. In addition, all female mammals have glands that can produce milk. Mammals, which include humans, are among the most intelligent of all living creatures.<br/><br/>Which of the following is the informational text structure used above?=descriptive[instructional+cause and effect]problem and solution",
    "First, clean the surface of your phone's screen with a soft cloth. Next, remove the paper backing on the screen protector. Then, evenly apply the sticky side of the screen protector to your phone's screen. Lastly, smooth out any air bubble trapped in between the protector and the phone screen.<br/><br/>Which of the following is the informational text structure used above?=instructional[problem and solution+cause and effect]descriptive",
    "Both lions and African wild dogs are pack animals, but they have different hunting styles.<br/><br/>Although lions are very fast, they do not have much stamina. They attack in short, ferocious bursts because they get tired quickly.<br/><br/>On the other hand, African wild dogs are not very fast, but they have incredible stamina. They can run for hours and often chase their prey to exhaustion.<br/><br/>Which of the following is the informational text structure used above?=comparison and contrast[cause and effect+problem and solution]descriptive",
    "The text features that the red arrows are pointing to above are called ____.**txtaid23.jpg=headings[indices+titles]captions",
    "The diagram shown is called what?**txtaid02.jpg=Cause and Effect Diagram[Venn Diagram+flow chart]pie chart",
    "The chart shown is called what?**txtaid10.jpg=pie chart[line chart+flow chart]bar chart",
    "The chart shown is called what?**txtaid12.jpg=bar graph[line chart+flow chart]pie chart",
    "The chart shown is called what?**txtaid24.jpg=line graph[bar chart+flow chart]pie chart",
    "The chart shown is called what?**txtaid25.jpg=flow chart[bar chart+line chart]pie chart",
    "The text feature that the blue arrow is pointing to above is called what?**txtaid26.jpg=caption[index+title]heading",
    "The informational text element shown above is called what?**book-index2.jpg=index[caption+glossary]heading",
    "The informational text element shown above is called what?**book-glossary.jpg=glossary[caption+index]heading",
];

// ---- Parser (§5.1) — run once at definition time ----
function ite_parse(string $raw): ?array {
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
    $parsed = ite_parse($raw);
    if ($parsed !== null) $items[] = $parsed;
}

// ---- Helpers (§8.4, §8.6) ----
// Escape everything, then re-allow <i> <u> <b> <br>. Collapse source-level
// newlines to spaces and any run of 2+ spaces to a single space.
function ite_safe(string $s): string {
    $s = preg_replace('/<br\s*\/?>/i', "\x1FBR\x1F", $s);
    $s = str_replace(["\r\n", "\r"], "\n", $s);
    $s = str_replace("\n", ' ', $s);
    $s = preg_replace('/ +/', ' ', $s);
    $s = htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
    $s = str_replace(
        ['&lt;i&gt;', '&lt;/i&gt;', '&lt;u&gt;', '&lt;/u&gt;', '&lt;b&gt;', '&lt;/b&gt;'],
        ['<i>', '</i>', '<u>', '</u>', '<b>', '</b>'],
        $s
    );
    return str_replace("\x1FBR\x1F", '<br>', $s);
}

// Highlight the specific prompt phrases in pink (#CC0066).
function ite_highlight_prompts(string $html): string {
    $phrases = [
        'Which of the following is the informational text structure used above?',
        'Which of the following is the text feature used above to highlight important words?',
    ];
    foreach ($phrases as $p) {
        $escaped = htmlspecialchars($p, ENT_QUOTES, 'UTF-8');
        $html = str_replace(
            $escaped,
            '<strong style="color:#CC0066;">' . $escaped . '</strong>',
            $html
        );
    }
    return $html;
}

// Hugging box for the question — used on both question and feedback pages so
// the feedback presentation matches the question presentation exactly.
function ite_box(string $html, int $minHeight = 100): void {
    echo '<div style="display:flex;flex-direction:column;justify-content:center;'
       . 'width:fit-content;max-width:480px;'
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto;padding:20px 32px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Image display above the box.
function ite_image(string $path): void {
    if ($path === '') return;
    echo '<div style="margin:24px auto 8px;text-align:center;">'
       . '<img src="' . htmlspecialchars($path) . '" alt="Question image" '
       . 'style="display:inline-block;max-width:100%;max-height:400px;'
       . 'border:2px solid #DDD;border-radius:8px;">'
       . '</div>';
}

// ---- No-repeat picker (§6) ----
function pick_ite(array $pool, string $sessionKey): array {
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

function build_ite_question(array $items, string $lvl, string $sessionKey): array {
    $item    = pick_ite($items, $sessionKey);
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
    $_SESSION[$sessionKey]['current'] = build_ite_question($items, $lvl, $sessionKey);
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
render_header($moduleTitle, $moduleTitle, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur      = $result['cur'];
    $question = ite_highlight_prompts(ite_safe($cur['question']));
    // Question rendered as-is — the ____ blank is NOT filled in, matching
    // exactly how the student saw it on the question page.
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php ite_image($cur['image']); ?>
  <?php ite_box(
      '<div style="font-size:16pt;color:#333;line-height:1.25;text-align:center;">'
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
    $question = ite_highlight_prompts(ite_safe($q['question']));
?>
  <?php ite_image($q['image']); ?>
  <?php ite_box(
      '<div style="font-size:16pt;color:#333;line-height:1.25;text-align:center;">'
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