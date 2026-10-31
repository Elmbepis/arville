<?php
// english/modules/speaker-id.php
// Identifying the Speaker in a Story — reading comprehension MC (4 choices).
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
$moduleTitle = 'Identifying the Speaker in a Story';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade resolution ------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ---- Level resolution ------------------------------------------------------
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Stories + questions ---------------------------------------------------
$stories = [
    0 => [
        'title'   => 'The Ant and the Grasshopper',
        'author'  => 'by Aesop',
        'source'  => 'taleswithmorals.com',
        'paragraphs' => [
            "One summer's day, a grasshopper was hopping about, chirping and singing with crickets and cicadas. An ant passed by, carrying a grain of corn he was taking to the nest.",
            "\"Why not come and chat with me,\" said the grasshopper, \"instead of working hard?\"",
            "\"I am helping to collect food for the winter,\" said the ant. \"You should do the same.\"",
            "\"Why bother about winter?\" said the grasshopper. \"We have plenty of food at present.\"",
            "But the ant went on its way and continued to work.",
            "When the winter came the grasshopper had no food and found itself dying of hunger. It saw the ants eating the corn and grain they had collected in the summer.",
            "Then the grasshopper said to himself, \"They're right. One should always be prepared.\"",
        ],
        'questions' => [
            ['q' => 'Who asked someone to stop working and chat with him instead?',                          'correct' => 'grasshopper', 'wrong' => ['ant', 'crickets', 'cicadas']],
            ['q' => 'Who told someone that he must also collect food for the winter?',                       'correct' => 'ant',         'wrong' => ['grasshopper', 'crickets', 'cicadas']],
            ['q' => "Who said that there is no need to collect food because there's plenty of it?",         'correct' => 'grasshopper', 'wrong' => ['ant', 'crickets', 'cicadas']],
            ['q' => 'Who admitted in the end that he was wrong, and that one must prepare for hard times?', 'correct' => 'grasshopper', 'wrong' => ['ant', 'crickets', 'cicadas']],
        ],
    ],
    1 => [
        'title'   => 'The Dog and the Wolf',
        'author'  => 'by Aesop',
        'source'  => 'taleswithmorals.com',
        'paragraphs' => [
            "A wolf that was dying of hunger met a dog who was passing by.",
            "\"Ah, wolf,\" said the dog. \"I see that you have nothing to eat. Why don't you work for a human master as I do? He will always give food to you!\"",
            "\"But I don't know any human,\" said the wolf.",
            "\"I will help you,\" said the dog. \"Come with me to my master and we can work together.\"",
            "So the wolf and the dog went towards the town together.",
            "On the way there, the wolf noticed that the hair on the dog's neck was very much worn away. The wolf asked, \"What happened to the hair on your neck?\"",
            "\"Oh, it is nothing,\" said the dog. \"My master puts a collar around my neck to keep me chained up at night. You'll get used to it.\"",
            "\"You mean, I will be chained up in exchange for food?\" said the wolf. \"Then good-bye to you, dog. I'd rather be hungry but free.\"",
        ],
        'questions' => [
            ['q' => 'Who said that if one works for a human master, he will always have something to eat?',  'correct' => 'dog',    'wrong' => ['wolf', 'master', 'human']],
            ['q' => "Who said that he didn't know any human person who could be his master?",                'correct' => 'wolf',   'wrong' => ['dog', 'master', 'human']],
            ['q' => 'Who said that he can be of help because he can share his work and his master?',          'correct' => 'dog',    'wrong' => ['wolf', 'master', 'human']],
            ['q' => 'Who said that one can get used to wearing a collar and being chained up?',              'correct' => 'dog',    'wrong' => ['wolf', 'master', 'human']],
            ['q' => "Who said that he would rather have nothing to eat as long as he's always free?",         'correct' => 'wolf',   'wrong' => ['dog', 'master', 'human']],
        ],
    ],
    2 => [
        'title'   => 'The Farmer and the Well',
        'author'  => '',
        'source'  => 'momjunction.com',
        'paragraphs' => [
            "A farmer looking for a source of water for his farm bought a well from his neighbor. The neighbor was tricky, though, and refused to let the farmer take water from the well. The farmer asked why. The neighbor replied, \"I sold the well to you, not the water,\" and walked away.",
            "The upset farmer didn't know what to do. So he went to Birbal, a clever man working for the emperor, and said, \"Please help me with my problem.\"",
            "The emperor called the farmer and his neighbor to his court. He asked the neighbor, \"Why aren't you letting the farmer draw water from the well?\" The tricky man said the same thing again, \"I sold the well, not the water. So he cannot take my water.\"",
            "To this, Birbal replied, \"OK, but if the water is yours, then you can not keep your water in his well. Remove the water from the well at once. If not, the water will belong to the owner of the well.\"",
            "Realizing that he's been taught his lesson, the neighbor apologized to the farmer and left.",
        ],
        'questions' => [
            ['q' => 'Who said that he only sold his well, not the water in it?',                                          'correct' => 'the neighbor',  'wrong' => ['the farmer', 'Birbal', 'the emperor']],
            ['q' => 'Who asked for help from a clever man?',                                                              'correct' => 'the farmer',    'wrong' => ['the neighbor', 'Birbal', 'the emperor']],
            ['q' => "In the emperor's court, who asked someone why he is not letting water be drawn from the well?",      'correct' => 'the emperor',   'wrong' => ['the farmer', 'Birbal', 'the neighbor']],
            ['q' => 'Who said that the water must belong to the owner of the well?',                                      'correct' => 'Birbal',        'wrong' => ['the farmer', 'the neighbor', 'the emperor']],
            ['q' => 'Who learned his lesson and apologized in the end?',                                                  'correct' => 'the neighbor',  'wrong' => ['the farmer', 'Birbal', 'the emperor']],
        ],
    ],
    3 => [
        'title'   => 'Two Friends and Two Bears',
        'author'  => '',
        'source'  => 'wealthygorilla.com',
        'paragraphs' => [
            "Jay and Roy were friends. One holiday, Jay said to Roy, \"Why don't we stroll into the forest?\" Roy agreed.",
            "They went walking into the forest, enjoying the beauty of nature. Suddenly they saw a bear and her cub coming their way. They became frightened.",
            "The bear spotted them and said to her cub, \"We'll have a big breakfast today!\"",
            "Roy, who knew all about climbing trees, ran up to a tree and climbed up quickly. He didn't think of Jay. Jay didn't know how to climb a tree.",
            "Jay screamed, \"Roy, help me get up your tree!\" Roy replied, \"I can't! You're on your own!\"",
            "Then Jay remembered that animals don't like dead bodies, so he fell to the ground and played dead. The bear sniffed him and thought he was dead. So, it went on its way.",
            "Roy asked Jay, \"What did the bear whisper into your ears?\"",
            "Jay replied, \"The bear told me to keep away from friends that don't help friends — friends like you.\"",
        ],
        'questions' => [
            ['q' => 'Who brought up the idea of walking into the forest?',                                    'correct' => 'Jay',                'wrong' => ['Roy', 'the bear', 'the cub']],
            ['q' => "Who said to whom that they'll have much to eat for breakfast?",                          'correct' => 'the bear to her cub', 'wrong' => ['the cub to the bear', 'Jay to Roy', 'Roy to Jay']],
            ['q' => 'Who asked for help to get up a tree?',                                                   'correct' => 'Jay',                'wrong' => ['Roy', 'the bear', 'the cub']],
            ['q' => "Who said that he can't help someone get up his tree?",                                   'correct' => 'Roy',                'wrong' => ['Jay', 'the bear', 'the cub']],
            ['q' => "Who asked what was whispered to the other person's ear?",                                'correct' => 'Roy',                'wrong' => ['Jay', 'the bear', 'the cub']],
            ['q' => "Who said that the bear told him to keep away from friends he can't rely on?",            'correct' => 'Jay',                'wrong' => ['Roy', 'the bear', 'the cub']],
        ],
    ],
];

// ---- (level, grade) -> story indices ---------------------------------------
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

    $tierKeys = [];
    foreach ($storyIds as $sid) {
        foreach ($stories[$sid]['questions'] as $qidx => $_) {
            $tierKeys[] = "s$sid-q$qidx";
        }
    }

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
    $sid   = (int)$m[1];
    $qidx  = (int)$m[2];
    $story = $stories[$sid];
    $q     = $story['questions'][$qidx];

    $choices = array_merge($q['wrong'], [$q['correct']]);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'title'      => $story['title'],
        'author'     => $story['author'],
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $theme);

// Helper: story card with optional author line
function render_story_card(array $story): void {
    echo '<div style="background:#FCFBE6;border:2px solid #DDD;border-radius:12px;padding:20px 28px;margin:10px auto 25px;max-width:480px;text-align:left;font-family:Arial,sans-serif;">';
    echo '<h3 style="text-align:center;color:#CC0066;font-size:18pt;margin:0 0 4px;font-weight:700;">'.htmlspecialchars($story['title']).'</h3>';
    if (!empty($story['author'])) {
        echo '<p style="text-align:center;font-size:10pt;color:#666;font-style:italic;margin:0 0 18px;">'.htmlspecialchars($story['author']).'</p>';
    } else {
        echo '<div style="height:10px;"></div>';
    }
    foreach ($story['paragraphs'] as $p) {
        echo '<p style="font-size:12pt;line-height:1.65;color:#333;margin:10px 0;">'.htmlspecialchars($p).'</p>';
    }
    echo '<p style="font-size:9pt;color:#888;font-style:italic;text-align:right;margin:15px 0 0;">source: '.htmlspecialchars($story['source']).'</p>';
    echo '</div>';
}
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    // Escape + bind last two words so the final word can never orphan on its own line
    $fbQ = htmlspecialchars($cur['question']);
    $fbQ = preg_replace('/\s+(\S+)(\s+\S+)$/u', '&nbsp;$1$2', $fbQ, 1);
    $fbA = htmlspecialchars($cur['correct']);
    $fbA = preg_replace('/\s+(\S+)(\s+\S+)$/u', '&nbsp;$1$2', $fbA, 1);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;">Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong></p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <?php render_story_card($cur); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;font-weight:700;color:#800080;max-width:500px;margin:0 auto 10px;line-height:1.55;text-wrap:balance;"><?php echo $fbQ; ?></p>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:500px;margin:0 auto;line-height:1.55;text-wrap:balance;">Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo $fbA; ?></strong></p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $qText = htmlspecialchars($q['question']);
    $qText = preg_replace('/\s+(\S+)(\s+\S+)$/u', '&nbsp;$1$2', $qText, 1);
?>
  <?php render_story_card($q); ?>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:700;color:#800080;max-width:500px;margin:20px auto 15px;line-height:1.55;text-wrap:balance;"><?php echo $qText; ?></p>
  <div style="font-family:Arial,sans-serif;font-size:13pt;font-weight:600;color:#800080;margin-bottom:16px;">Click on your answer.</div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:block;min-width:180px;max-width:250px;padding:14px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:14pt;font-weight:600;">
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