<?php
// english/modules/story-elements.php
// Elements of a Story — reading comprehension MC (4 choices).
// 4 stories; grade-aware pools per level.

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
$moduleTitle = 'Elements of a Story';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade resolution ------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ---- Level resolution ------------------------------------------------------
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard'; // migrate legacy Medium -> Hard
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Stories + questions ---------------------------------------------------
$stories = [
    0 => [
        'title' => 'The Tortoise and the Bird',
        'paragraphs' => [
            "A tortoise was resting under a tree, on which a bird had built its nest. The tortoise said to the bird, \"What a shabby home you have! It is made of broken twigs, has no roof, and looks crude. I think my house, which is my shell, is much better than your ugly nest.\"",
            "\"Yes, it is made of broken sticks, looks shabby, and is crude. But I built it, and I like it.\"",
            "\"It's just like any other nest. My house is better,\" said the tortoise. \"You must be jealous of my shell.\"",
            "\"No, I'm not,\" the bird replied. \"My home has space for my family and friends. Nobody else can enter your shell but you. Maybe you have a better house, but I have a better home,\" said the bird happily.",
        ],
        'source' => 'momjunction.com',
        'questions' => [
            ['q' => 'How would you describe the tortoise?',                'correct' => 'boastful',           'wrong' => ['humble', 'friendly', 'kind']],
            ['q' => 'Where did the story happen?',                         'correct' => 'at a tree',          'wrong' => ['inside a cave', 'under the sea', 'in the sky']],
            ['q' => 'What was the tortoise bragging about?',               'correct' => 'his shell',          'wrong' => ['his skin', 'his feet', 'his tail']],
            ['q' => "Why is the bird's house better than the turtle's?",   'correct' => 'It has more space.', 'wrong' => ['It is made of sticks.', 'It is on a tree.', 'It is crude and shabby.']],
            ['q' => 'How did the bird feel?',                              'correct' => 'contented',          'wrong' => ['jealous', 'envious', 'unhappy']],
        ],
    ],
    1 => [
        'title' => 'The Boy Who Cried Wolf',
        'paragraphs' => [
            "Once upon a time, there was a boy who was bored watching his flock of sheep on the hill. To have fun, he shouted, \"Wolf! Wolf! The sheep are being chased by the wolf!\" The villagers came running to help the boy and save the sheep but they found nothing.",
            "\"Don't cry 'wolf' when there's no wolf, boy!\", they said angrily and left. The boy just laughed at them.",
            "After a while, he got bored and cried 'wolf!' again, fooling the villagers a second time. The angry villagers warned the boy again and left.",
            "One day, as the boy was watching the flock, he saw a real wolf. He cried loudly, \"Wolf! Please help! The wolf is chasing the sheep. Help!\"",
            "But this time, no one came to help. That evening, the boy didn't return home. He just sat on the hill weeping. \"Why didn't you come when I called out that there was a wolf?\" he asked angrily. \"The flock is gone now,\" he said.",
        ],
        'source' => 'momjunction.com',
        'questions' => [
            ['q' => "Why did the boy cry 'wolf' even when there was no wolf?",              'correct' => 'to have fun',                   'wrong' => ['to practice shouting', 'to annoy the villagers', 'to call the wolf']],
            ['q' => 'How would you describe the boy?',                                     'correct' => 'not honest and foolish',        'wrong' => ['smart and brave', 'obedient', 'lazy and useless']],
            ['q' => "Why didn't the villagers help the boy when a real wolf appeared?",    'correct' => 'They no longer believed him.',  'wrong' => ['They had other things to do.', 'They are mad at the boy.', 'They want the wolf to eat his sheep.']],
            ['q' => 'What did the boy feel at the end of the story?',                      'correct' => 'grief and anger',               'wrong' => ['jealousy or envy', 'fright', 'gladness']],
            ['q' => 'What is the moral lesson of the story?',                              'correct' => 'People do not believe liars.',  'wrong' => ['Working hard is important.', 'We must help other people.', 'Do not make fun of others.']],
        ],
    ],
    2 => [
        'title' => 'The Elephant and his Friends',
        'paragraphs' => [
            "One day an elephant wandered into a forest in search of friends.",
            "He saw a monkey on a tree. \"Will you be my friend?\" asked the elephant. The monkey replied, \"You are too big. You can not swing from trees like me.\"",
            "Next, the elephant met a rabbit. He asked him to be his friend. But the rabbit said, \"You are too big to play in my burrow!\"",
            "Then the elephant met a frog. \"Will you be my friend?\" he asked. \"How can I?\" asked the frog. \"You are too big to leap about like me.\"",
            "The elephant was upset. He met a fox next. \"Will you be my friend?\" he asked the fox. The fox said, \"Sorry, sir, you are too big.\"",
            "The next day, the elephant saw all the animals in the forest running for their lives. The elephant asked them what the matter was. The bear replied, \"There is a tiger in the forest. He's trying to gobble us all up!\"",
            "The animals all ran away to hide. The elephant wondered what he could do to help everyone in the forest. Meanwhile, the tiger kept eating up whoever he could find.",
            "The elephant walked up to the tiger and said, \"Please, Mr. Tiger, do not eat up these poor animals.\" \"Mind your own business!\" growled the tiger. The elephant had no choice but to give the tiger a hefty kick.",
            "The frightened tiger ran for his life. The elephant ambled back into the forest to announce the good news to everyone.",
            "All the animals thanked the elephant. They said, \"You are just the right size to be our friend.\"",
        ],
        'source' => 'english-for-students.com',
        'questions' => [
            ['q' => 'Where did the story take place?',                                                'correct' => 'in a forest',                       'wrong' => ['inside a cave', 'on a beach', 'atop a tree']],
            ['q' => 'Why did the elephant wander into the forest?',                                   'correct' => 'to look for friends',               'wrong' => ['to hurt a tiger', 'to look for food', 'to bother the other animals']],
            ['q' => "Why didn't the other animals want the elephant to be their friend at first?",    'correct' => 'The elephant was too big.',         'wrong' => ['The elephant was scary.', 'The elephant was looking for trouble.', 'The elephant would eat their food.']],
            ['q' => 'Why were the animals running away and hiding in the middle of the story?',      'correct' => 'A tiger would eat them.',           'wrong' => ['They were trying to avoid the elephant.', 'A lion was chasing them.', 'A storm was coming.']],
            ['q' => 'What did the elephant do to help the other animals?',                            'correct' => 'It kicked and drove the tiger away.', 'wrong' => ['It befriended the tiger.', 'It gave the tiger something else to eat.', 'It tricked the tiger into leaving.']],
            ['q' => 'How did the other animals feel towards the elephant in the end?',                'correct' => 'thankful and friendly',             'wrong' => ['angry and hostile', 'frightened', 'confused and puzzled']],
            ['q' => 'What is the moral lesson of the story?',                                          'correct' => 'Friends come in all sizes.',        'wrong' => ['Friends are not important.', 'It is hard to find friends.', 'A tiger can not be your friend.']],
        ],
    ],
    3 => [
        'title' => 'The Crooked Tree',
        'paragraphs' => [
            "There once was a dense forest where all trees were straight and tall. Their trunks were broad and shapely. But, there was one tree with a crooked and shapeless trunk.",
            "The crooked tree was sad. He thought, \"How ugly I am! All others are straight and shapely. I alone have a crooked trunk.\"",
            "One day, a woodcutter came to the forest. He looked around and said, \"I will cut all trees here, except that crooked tree. That is of no use to me.\" He cut away all the straight trees.",
            "Now, the crooked tree no longer complained about being crooked. It just lived happily ever after.",
        ],
        'source' => 'english-for-students.com',
        'questions' => [
            ['q' => 'Where did the story take place?',                    'correct' => 'in a thick forest',                  'wrong' => ['in a bare forest', 'on a grassy field', 'on top of a mountain']],
            ['q' => 'Why was the crooked tree unhappy?',                  'correct' => 'It envied the tall and straight trees.', 'wrong' => ['It was tired and weary.', 'The other trees were unfriendly.', 'It was of no use to the woodcutter.']],
            ["q" => "Why didn't the woodcutter cut the crooked tree?",    'correct' => 'He had no use for a crooked log.',  'wrong' => ['He was already tired.', 'He felt sorry for the crooked tree.', 'Cutting a crooked tree would be hard.']],
            ['q' => 'How did the crooked tree feel in the end?',          'correct' => 'thankful for being alive',           'wrong' => ['thankful for being beautiful', 'thankful for being alone', 'missing the other trees']],
        ],
    ],
];

// ---- (level, grade) -> story indices ---------------------------------------
// With 4 stories, grade progressively includes more / harder stories.
function story_indices_for(string $lvl, int $grd): array {
    if ($lvl === 'Easy') {
        return ($grd <= 2) ? [0] : [0, 1];
    }
    return ($grd <= 2) ? [1, 2] : [2, 3];
}

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $storyIds = story_indices_for($lvl, $grd);

    // Build the full pool for the current tier, keyed by "s<story>-q<idx>"
    $tierKeys = [];
    foreach ($storyIds as $sid) {
        foreach ($stories[$sid]['questions'] as $qidx => $_) {
            $tierKeys[] = "s$sid-q$qidx";
        }
    }

    // No-repeat selection (reset only this tier's keys on exhaustion)
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($tierKeys, fn($k) => !in_array($k, $used, true)));
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => !in_array($k, $tierKeys, true)));
        $available = $tierKeys;
    }
    $pickKey = $available[array_rand($available)];
    $used[] = $pickKey;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    preg_match('/^s(\d+)-q(\d+)$/', $pickKey, $m);
    $sid  = (int)$m[1];
    $qidx = (int)$m[2];
    $story = $stories[$sid];
    $q     = $story['questions'][$qidx];

    $choices = array_merge($q['wrong'], [$q['correct']]);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'title'      => $story['title'],
        'paragraphs' => $story['paragraphs'],
        'source'     => $story['source'],
        'question'   => $q['q'],
        'correct'    => $q['correct'],
        'choices'    => $choices,
        'lvl'        => $lvl,
        'grd'        => $grd,
        'sid'        => $sid,
        'qidx'       => $qidx,
    ];
}

// ---- Render ----------------------------------------------------------------
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);

// Helper to render the story card
function render_story_card(array $story): void {
    echo '<div style="background:#FCFBE6;border:2px solid #DDD;border-radius:12px;padding:20px 28px;margin:10px auto 25px;max-width:480px;text-align:left;font-family:Arial,sans-serif;">';
    echo '<h3 style="text-align:center;color:#CC0066;font-size:18pt;margin:0 0 18px;font-weight:700;">'.htmlspecialchars($story['title']).'</h3>';
    foreach ($story['paragraphs'] as $p) {
        echo '<p style="font-size:12pt;line-height:1.65;color:#333;margin:10px 0;">'.htmlspecialchars($p).'</p>';
    }
    echo '<p style="font-size:9pt;color:#888;font-style:italic;text-align:right;margin:15px 0 0;">source: '.htmlspecialchars($story['source']).'</p>';
    echo '</div>';
}
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;">Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong></p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <?php render_story_card($cur); ?>
  <?php
    $fbQ = htmlspecialchars($cur['question']);
    $fbQ = preg_replace('/\s+(\S+)(\s+\S+)$/u', '&nbsp;$1$2', $fbQ, 1);
  ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;font-weight:700;color:#800080;
            max-width:500px;margin:0 auto 10px;line-height:1.55;
            text-wrap:balance;"><?php echo $fbQ; ?></p>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;">Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong></p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else: $q = $_SESSION[$sessionKey]['current']; ?>
  <?php render_story_card($q); ?>
  <?php
    // Escaping first, then bind the last two words together so the final
    // word can never sit alone on its own line. The regex captures
    // "word<space>word$" and replaces the internal space with &nbsp;.
    $qText = htmlspecialchars($q['question']);
    $qText = preg_replace('/\s+(\S+)(\s+\S+)$/u', '&nbsp;$1$2', $qText, 1);
  ?>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:700;color:#800080;
            max-width:500px;margin:20px auto 15px;line-height:1.55;
            text-wrap:balance;"><?php echo $qText; ?></p>
  <div style="font-family:Arial,sans-serif;font-size:14pt;font-weight:500;color:#777777;margin-bottom:16px;">Click on your answer.</div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:block;min-width:200px;max-width:260px;padding:14px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:14pt;font-weight:600;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>