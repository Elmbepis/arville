<?php
// english/modules/two-syllable-words.php
// Understanding Texts with Two-syllable Words — read short passages or stories
// and identify 2-syllable words by their grammatical function / meaning.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 4 choices always in a 2×2 grid.
//
// Layout (question page):
//   [Box with passage]                          &#8592; hugging cream box
//   [Prompt below box]                          &#8592; purple, bold, tight gap
//   [Click on the correct answer below.]        &#8592; gray #666
//   [Choices — 2×2]
//
// Data format: 'passage\n\nprompt=answer>wrong1+wrong2<wrong3'
//   Last \n\n splits passage (box) from prompt (below box).

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
$moduleTitle = 'Understanding Texts with Two-syllable Words';
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

// ---- Tier mapping (§4 — bridge pattern for grade-awareness) ----
function resolve_tsw_pool(string $lvl, int $grd): int {
    if ($lvl === 'Easy') return 1;
    if ($grd <= 4) return 1;
    return 2;
}

// ---- Stories (§5) — plain text with \n preserved ----
$story1 = rtrim(<<<'EOT'
The Spotted Cow
by Enid Blyton

There was once rather a vain cow. She was plain white with two nice curly horns. She thought she looked rather nice, but she did wish she could have some nice black spots over her back. There were no spotted cows in the field at all, and the white cow thought it would be grand to be the only spotted cow.

Now one day, when she was munching long, juicy grass that she grew in the hedge, she came across a small pixie mixing black paint in a pot.

"What are you doing?" asked the cow.

"I'm mixing my black paint", said the little fellow. "I'm the pixie that paints the spots on the ladybirds, you know."

"Oh," said the cow. "Well, will you paint some on me?"

"Yes, if you give me a nice drink of milk," said the pixie.

In a long line stood about twenty ladybirds with bright red backs and no spots. The pixie neatly painted seven black spots on each red back, and the ladybirds flew off in delight.

"I don't mind doing that," said the cow. "You can find a tin mug and milk some of my creamy milk into it for yourself."

"I'll just finish these ladybirds first," said the pixie, and he turned back to his work. In a long line stood about twenty ladybirds with brightened backs and no spots. The pixie neatly painted seven black spots on each red back, and the ladybirds flew off happily...
EOT
);

$story3 = rtrim(<<<'EOT'
Next morning the woman said, "The little men have made us rich, and we really must show that we are grateful for it. They run about so, and have nothing on, and must be cold. This is what I'll do: I will make them little shirts, coats, vests, and trousers, and knit both of them a pair of stockings. You, too, should make them two little pairs of shoes."

The man said, "I shall be very glad to do it."

And one night, when everything was ready, they laid their presents all together on the table, and then concealed themselves to see how the little men would behave.
EOT
);

$story4 = rtrim(<<<'EOT'
The Boys and the Frogs
by Aesop

Some boys were playing one day at the edge of a pond in which lived a family of frogs. The boys amused themselves by throwing stones into the pond so as to make them skip on top of the water.

The stones were flying thick and fast and the boys were enjoying themselves very much; but the poor frogs in the pond were trembling with fear.

At last one of the frogs, the oldest and bravest, put his head out of the water, and said, "Oh, please, dear children, stop your cruel play! Though it may be fun for you, it means death to us!"
EOT
);

$story5 = rtrim(<<<'EOT'
He obliged Cinderella to sit down, and, putting the slipper to her foot, he found it went on very easily, and fitted her as if it had been made of wax. The astonishment her two sisters were in was excessively great, but still abundantly greater when Cinderella pulled out of her pocket the other slipper, and put it on her foot. Thereupon, in came her godmother, who, having touched with her wand Cinderella's clothes, made them richer and more magnificent than any of those she had before.
EOT
);

$story6 = rtrim(<<<'EOT'
The Fox and the Lion
by Aesop

A very young fox, who had never before seen a lion, happened to meet one in the forest. A single look was enough to send the fox off at top speed for the nearest hiding place.

The second time the fox saw the lion, he stopped behind a tree to look at him a moment before slinking away.

But the third time, the fox went boldly up to the lion and, without turning a hair, said, "Hello, there, old top."
EOT
);

$story7 = rtrim(<<<'EOT'
The Mischievous Dog
by Aesop

There was once a dog who was so ill-natured and mischievous that his master had to fasten a heavy wooden clog about his neck to keep him from annoying visitors and neighbors. But the dog seemed to be very proud of the clog and dragged it about noisily as if he wished to attract everybody's attention. He was not able to impress anyone.

"You would be wiser," said an old acquaintance, "to keep quietly out of sight with that clog. Do you want everybody to know what a disgraceful and ill-natured dog you are?"
EOT
);

$stories = [
    1 => $story1,
    3 => $story3,
    4 => $story4,
    5 => $story5,
    6 => $story6,
    7 => $story7,
];

// ---- Sentence pools — format: 'passage\n\nprompt=answer>wrong1+wrong2<wrong3' ----
$sentencePools = [
    1 => [
        "There is a red apple and a yellow banana on the table.\n\nWhat is the color of the fruit with two syllables?=yellow>red+apple<banana",
        "Bernie has two rabbits at home. They are cute, white, and furry.\n\nWhich 2-syllable word above is a common noun?=rabbits>furry+home<Bernie",
        "Soon, I will have my own cuddly puppy. I will play with it every single day.\n\nWhich 2-syllable word above is a noun?=puppy>single+every<cuddly",
        "My favorite ice cream flavors are mango, chocolate, and strawberry.\n\nWhich 2-syllable word above refers to a fruit?=mango>flavors+strawberry<chocolate",
        "Yesterday, my brother and I ate some donuts and spaghetti.\n\nWhich 2-syllable word above is a plural noun?=donuts>yesterday+spaghetti<brother",
        "My name is Mark and I am 5 years old. I love drawing pictures and playing dodgeball.\n\nWhich 2-syllable word above refers to a game?=dodgeball>drawing+pictures<playing",
        "I am Rolly and I am from Manila. My favorite cousins are Jake, Linda, and Sarah.\n\nWhich 2-syllable noun above is proper and male?=Rolly>Jake+Sarah<Linda",
        "The big grey castle stood on the top of a hill. It had a huge wooden door and two towers with red banners flying in the wind. In front of the door was a guard with a sharp sword.\n\nWhich 2-syllable word is found above and refers to a large structure with towers?=castle>wooden+mansion<banners",
    ],
    2 => [
        "{story1}\n\nWhich 2-syllable word above refers to a fictional creature?=pixie>ladybirds+cow<fellow",
        "{story1}\n\nWhich 2-syllable word above refers to what the cow wants to be?=spotted>black+pixie<ladybird",
        "{story1}\n\nWhat does the pixie want in return for painting spots on the cow?=milk>black paint+juicy grass<a tin mug",
        "{story1}\n\nA compound word in the story refers to a small, red beetle with spots. What is the first word in this compound word?=lady>bird+bug<pixie",
        "Just then, Goldilocks woke up. She saw the three bears. She screamed, \"Help!\" And she jumped up and ran out of the bedroom. Goldilocks ran down the stairs, opened the door, and ran away into the forest. She never returned to the home of the three bears.\n\nWhich of these two-syllable words is found in the story above and refers to a place with many big trees?=forest>garden+jungle<mountain",
        "The first little pig was very lazy. He didn't want to work at all and he built his house out of straw. The second little pig worked a little bit harder but he was somewhat lazy too and he built his house out of sticks.\n\nWhich of these two-syllable adjectives is found in the story above and refers to something that students shouldn't be?=lazy>piggish+ugly<little",
        "{story3}\n\nWhich of these words describes the two men as well as the gifts they were given?=little>rich+grateful<glad",
        "{story3}\n\nWhat do you think are the 'little men' in the story?=elves>children+fairies<ghosts",
        "{story3}\n\nWhat do you think is the job of the woman's husband in the story?=shoemaker>tailor+cook<doctor",
        "{story3}\n\nThe couple repaid the little men by giving them gifts that will ____.=keep them warm>nourish them+amuse them<make them rich",
        "{story4}\n\nHow did the frogs feel when the boys started playing at the edge of the pond?=frightened>amazed+surprised<confused",
        "{story4}\n\nThe boys made the stones skip on the surface of the pond to ____.=entertain themselves>frighten the frogs+hurt the frogs<amuse the frogs",
        "{story4}\n\nThe lesson we can learn from the story is to ____.=be considerate of others>do whatever pleases you+live a life of fun<pay no attention to frogs",
        "{story4}\n\nWhich of these is the two-syllable word in the story that means wicked?=cruel>brutal+nasty<evil",
        "{story5}\n\nWhich of these is the word in the story that means 'made someone do something'?=obliged>fitted+compelled<required",
        "{story5}\n\nAccording to the passage, how did Cinderella's sisters feel when she put on both shoes?=surprised>angry+frightened<confused",
        "{story6}\n\nWhat lesson can we learn from the story?=Familiarity breeds contempt.>Common sense beats cunning.+Do not imitate others.<Might makes right.",
        "{story6}\n\nWhich of these is the word in the story that means 'moving quietly'?=slinking>sneaking+hiding<sidling",
        "{story7}\n\nWhat lesson can we learn from the story?=Notoriety is not fame.>An act of kindness is well repaid.+Greediness leads to misfortune.<Do not try to do the impossible.",
        "{story7}\n\nWhich of these is the word in the story that means 'to gain the admiration of'?=impress>inspire+attention<excite",
    ],
];

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function tsw_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 220): int {
    $charPx          = 11;
    $horizontalSpace = 40;
    $plain           = trim(strip_tags($html));
    if ($plain === '') return $minWidthPx;

    $charsPerLine = max(1, (int)floor(($maxWidthPx - $horizontalSpace) / $charPx));
    $words   = preg_split('/\s+/', $plain);
    $lines   = [];
    $current = '';
    foreach ($words as $w) {
        $candidate = $current === '' ? $w : "$current $w";
        if (strlen($candidate) > $charsPerLine && $current !== '') {
            $lines[] = $current;
            $current = $w;
        } else {
            $current = $candidate;
        }
    }
    if ($current !== '') $lines[] = $current;
    $longest = max(array_map('strlen', $lines));
    return max($minWidthPx, min($maxWidthPx, $longest * $charPx + $horizontalSpace));
}

// Hugging box — display:block + width:fit-content so vertical margins are
// honored (inline-flex ignores vertical margins, causing the strut issue).
function tsw_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
    $sizing = ($widthPx > 0)
        ? 'width:' . $widthPx . 'px;max-width:100%;'
        : 'width:fit-content;max-width:480px;';
    echo '<div style="display:block;' . $sizing
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto 8px;padding:12px 20px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function tsw_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function tsw_roll_values(array $stories): array {
    $values = [];
    foreach ($stories as $n => $text) {
        $values['story' . $n] = $text;
    }
    return $values;
}

function tsw_parse(string $raw): ?array {
    $eq = strpos($raw, '=');
    if ($eq === false) return null;
    $fullText = rtrim(substr($raw, 0, $eq));
    $rest = substr($raw, $eq + 1);

    $gt = strpos($rest, '>');
    if ($gt === false) return null;
    $answer = substr($rest, 0, $gt);
    $rest = substr($rest, $gt + 1);

    $plus = strpos($rest, '+');
    if ($plus === false) return null;
    $w1 = substr($rest, 0, $plus);
    $rest = substr($rest, $plus + 1);

    $lt = strpos($rest, '<');
    if ($lt === false) return null;
    $w2 = substr($rest, 0, $lt);
    $w3 = substr($rest, $lt + 1);

    $parts  = explode("\n\n", $fullText);
    $prompt = trim(array_pop($parts));
    $passage = trim(implode("\n\n", $parts));

    if ($passage === '' || $prompt === '' || $answer === '') return null;
    return [
        'passage' => $passage,
        'prompt'  => $prompt,
        'answer'  => $answer,
        'wrong'   => [$w1, $w2, $w3],
    ];
}

function tsw_pick_question(array $pool, string $sessionKey, int $poolId, array $stories): ?array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $raw) {
        if (!in_array("p$poolId:$i", $used, true)) $available[$i] = $raw;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "p$poolId:") !== 0));
        foreach ($pool as $i => $raw) $available[$i] = $raw;
    }
    $idx = array_rand($available);
    $raw = $available[$idx];
    $used[] = "p$poolId:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = tsw_parse($raw);
    if ($parsed === null) return null;

    $values   = tsw_roll_values($stories);
    $passage  = tsw_apply_placeholders($parsed['passage'], $values);
    $prompt   = tsw_apply_placeholders($parsed['prompt'],  $values);

    return [
        'passage' => $passage,
        'prompt'  => $prompt,
        'answer'  => $parsed['answer'],
        'wrong'   => $parsed['wrong'],
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
    $poolId = resolve_tsw_pool($lvl, $grd);
    $pool   = $sentencePools[$poolId] ?? $sentencePools[1];

    $pick = tsw_pick_question($pool, $sessionKey, $poolId, $stories);
    if ($pick === null) {
        $pick = tsw_pick_question($sentencePools[1], $sessionKey, 1, $stories);
    }

    $answer = $pick['answer'];
    $choices = array_merge([$answer], $pick['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'passage' => $pick['passage'],
        'prompt'  => $pick['prompt'],
        'answer'  => $answer,
        'choices' => $choices,
        'lvl'     => $lvl,
        'pool'    => $poolId,
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl,
              $moduleTitle.' - Grade '.$grd.' - '.$lvl,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur         = $result['cur'];
    $promptEsc   = htmlspecialchars($cur['prompt']);
    $passageEsc  = nl2br(htmlspecialchars($cur['passage']));
    $answerEsc   = '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['answer']) . '\'</strong>';
    $boxW        = tsw_compute_width($passageEsc);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php tsw_box(
      '<div style="font-size:15pt;color:#333;line-height:1.6;font-weight:500;text-align:center;">'
    . $passageEsc
    . '</div>'
  , 80, $boxW); ?>
  <div style="margin:30px auto 10px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    <?php echo $promptEsc; ?>
  </div>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The correct answer is <?php echo $answerEsc; ?>.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q           = $_SESSION[$sessionKey]['current'];
    $promptEsc   = htmlspecialchars($q['prompt']);
    $passageEsc  = nl2br(htmlspecialchars($q['passage']));
    $boxW        = tsw_compute_width($passageEsc);
?>
  <?php tsw_box(
      '<div style="font-size:15pt;color:#333;line-height:1.6;font-weight:500;text-align:center;">'
    . $passageEsc
    . '</div>'
  , 80, $boxW); ?>
  <div style="margin:30px auto 10px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    <?php echo $promptEsc; ?>
  </div>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:20px auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:250px;min-height:60px;padding:12px 18px;
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
  <input type="submit" name="Submit2" value=" New Question " style="display:block;margin:25px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>

  <!-- Difficulty radios (§10.4 — Easy / Hard only, 12pt label) -->
  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:12pt Arial,sans-serif;">Select difficulty level for next question:</p>
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