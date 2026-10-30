<?php
// english/modules/rhymes-songs-poems.php
// STATIC bank of 18 poem / song excerpts + 4-choice. Bypass QEngine per §3.
// Question: show a poem (rhyming words not highlighted); user clicks the pair
//   of words from the poem that rhyme with each other.
//
// Single-level module — §5 collapse. Legacy hardcoded $_SESSION['level']="Medium"
//   and had no level selector; all questions are equally difficulty. Dropped
//   $levels, no selector, $lvl fixed to 'Easy' (Scorer point value will be 1;
//   legacy gave 2 points per correct — flag for review if you want 2).
//   Preserved as single-level per §5 to match English module conventions.
//
// Question format in bank:
//   'poem'       — poem text with `1`/`2` markers around the rhyming words
//   'answer'     — "word1, word2" (comma-separated pair, the correct answer)
//   'distractors' — 3 alternative "word1, word2" pairs (words pulled from
//                   the poem that do NOT rhyme with each other)
//
// Prompt shows poem with markers stripped; feedback shows poem with markers
//   converted to highlighted spans.
//
// Choice layout (§14): answer/distractors are ~8-18 char strings &#8594; 2×2 grid.
//
// $grd not used (single-level).
// Theme: ex-*-27 (75/655/70) &#8594; fits §8 &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'rhymes-songs-poems.php'

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

$moduleTitle = 'Rhymes in Songs and Poems';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level (§5)

// ============================================================
// BANK
// ============================================================
$bank = [
    [
        'poem' => "Five little monkeys jumping on the 1bed2,<br>\nOne fell down and bumped his 1head2.",
        'answer' => 'bed, head',
        'distractors' => ['bed, fell', 'on, one', 'bed, bumped'],
    ],
    [
        'poem' => "Incy Wincy spider climbing up the 1spout2.<br>\nDown came the rain, and washed poor Incy 1out2.",
        'answer' => 'spout, out',
        'distractors' => ['up, out', 'climbing, came', 'spout, down'],
    ],
    [
        'poem' => "Twinkle, twinkle, little 1star2,<br>\nHow I wonder what you 1are2.<br>\nUp above the world so high,<br>\nLike a diamond in the sky.",
        'answer' => 'star, are',
        'distractors' => ['star, what', 'little, wonder', 'star, wonder'],
    ],
    [
        'poem' => "Twinkle, twinkle, little star,<br>\nHow I wonder what you are.<br>\nUp above the world so 1high2,<br>\nLike a diamond in the 1sky2.",
        'answer' => 'high, sky',
        'distractors' => ['star, you', 'high, like', 'world, diamond'],
    ],
    [
        'poem' => "Mary had a little lamb,<br>\nwhose fleece was white as 1snow2.<br>\nAnd everywhere that Mary went,<br>\nthe lamb was sure to 1go2.",
        'answer' => 'snow, go',
        'distractors' => ['lamb, snow', 'snow, went', 'white, went'],
    ],
    [
        'poem' => "It followed her to school one 1day2<br>\nwhich was against the rules.<br>\nIt made the children laugh and 1play2,<br>\nto see a lamb at school.",
        'answer' => 'day, play',
        'distractors' => ['day, rules', 'rules, school', 'play, school'],
    ],
    [
        'poem' => "Hickory, dickory, 1dock2,<br>\nThe mouse ran up the 1clock2.<br>\nThe clock struck one,<br>\nThe mouse ran down,<br>\nHickory, dickory, dock",
        'answer' => 'dock, clock',
        'distractors' => ['dock, mouse', 'down, dock', 'one, down'],
    ],
    [
        'poem' => "Eeny, meeny, miny, 1moe2<br>\nCatch a tiger by the 1toe2<br>\nIf he hollers let him go,<br>\nEeny, meeny, miny, moe",
        'answer' => 'moe, toe',
        'distractors' => ['meeny, moe', 'tiger, toe', 'miny, go'],
    ],
    [
        'poem' => "Eeny, meeny, miny, moe<br>\nCatch a tiger by the toe<br>\nIf he hollers let him 1go2,<br>\nEeny, meeny, miny, 1moe2",
        'answer' => 'go, moe',
        'distractors' => ['eeny, toe', 'tiger, hollers', 'miny, moe'],
    ],
    [
        'poem' => "Baa, baa, black sheep,<br>\nHave you any 1wool2?<br>\nYes sir, yes sir,<br>\nThree bags 1full2.",
        'answer' => 'wool, full',
        'distractors' => ['sheep, wool', 'black, bags', 'baa, bags'],
    ],
    [
        'poem' => "Once I saw a little bird<br>\nCome hop, hop, 1hop2;<br>\nSo I cried, \"Little bird,<br>\nWill you stop, stop, 1stop2?\"",
        'answer' => 'hop, stop',
        'distractors' => ['bird, hop', 'little, bird', 'saw, stop'],
    ],
    [
        'poem' => "Cackle, cackle, Mother 1Goose2,<br>\nHave you any feathers 1loose2?<br>\nTruly have I, pretty fellow,<br>\nHalf enough to fill a pillow.",
        'answer' => 'goose, loose',
        'distractors' => ['mother, feathers', 'fellow, fill', 'loose, pillow'],
    ],
    [
        'poem' => "Cackle, cackle, Mother Goose,<br>\nHave you any feathers loose?<br>\nTruly have I, pretty 1fellow2,<br>\nHalf enough to fill a 1pillow2.",
        'answer' => 'fellow, pillow',
        'distractors' => ['mother, loose', 'feathers, fellow', 'pretty, pillow'],
    ],
    [
        'poem' => "Zoom, Zoom, Zoom<br>\nWe're going to the moon.<br>\nIf you want to take a 1trip2,<br>\nClimb aboard my rocket 1ship2.",
        'answer' => 'trip, ship',
        'distractors' => ['zoom, moon', 'moon, trip', 'rocket, ship'],
    ],
    [
        'poem' => "Roses are red<br>\nViolets are 1blue2<br>\nSugar is sweet<br>\nAnd so are 1you2.",
        'answer' => 'blue, you',
        'distractors' => ['roses, red', 'red, blue', 'sugar, sweet'],
    ],
    [
        'poem' => "No one can tell me,<br>\nNobody 1knows2,<br>\nWhere the wind comes from,<br>\nWhere the wind 1goes2.",
        'answer' => 'knows, goes',
        'distractors' => ['tell, nobody', 'wind, from', 'where, wind'],
    ],
    [
        'poem' => "I think that I shall never 1see2<br>\nA poem lovely as a 1tree2.<br>\nA tree whose hungry mouth is prest<br>\nAgainst the earth's sweet flowing breast;<br>\nA tree that looks at God all day,<br>\nAnd lifts her leafy arms to pray;",
        'answer' => 'see, tree',
        'distractors' => ['never, hungry', 'mouth, sweet', 'day, leafy'],
    ],
    [
        'poem' => "I think that I shall never see<br>\nA poem lovely as a tree.<br>\nA tree whose hungry mouth is prest<br>\nAgainst the earth's sweet flowing breast;<br>\nA tree that looks at God all 1day2,<br>\nAnd lifts her leafy arms to 1pray2;",
        'answer' => 'day, pray',
        'distractors' => ['never, lovely', 'mouth, flowing', 'looks, leafy'],
    ],
];

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $bankCount = count($bank);

    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $safety = 0;
    do {
        $idx = rand(0, $bankCount - 1);
        $safety++;
    } while (in_array($idx, $used, true) && $safety < 100);

    $used[] = $idx;
    if (count($used) > $bankCount * 2) $used = array_slice($used, -$bankCount);
    $_SESSION[$sessionKey]['used'] = $used;

    $entry = $bank[$idx];
    $choices = array_merge([$entry['answer']], $entry['distractors']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'poem'    => $entry['poem'],
        'answer'  => $entry['answer'],
        'choices' => $choices,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// HELPERS
// ============================================================
function rsp_render_poem($poem, $highlight)
{
    if ($highlight) {
        $poem = str_replace('1', '<span class="rsp-highlight">', $poem);
        $poem = str_replace('2', '</span>', $poem);
    } else {
        $poem = str_replace('1', '', $poem);
        $poem = str_replace('2', '', $poem);
    }
    return $poem;
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-3.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-3.jpg',
];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .rsp-poem {
    display: inline-block;
    background: #fefbde;
    border: 2px solid #9f2601;
    border-radius: 10px;
    padding: 20px 30px;
    margin: 18px auto;
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    line-height: 1.9;
    color: #333;
    text-align: center;
    max-width: 600px;
  }
  .rsp-highlight {
    color: #CC0066;
    font-weight: 700;
    padding: 0 2px;
  }
  .rsp-grid-2x2 {
    --choice-width: 11em;
    display: grid;
    grid-template-columns: auto auto;
    gap: 14px 22px;
    justify-content: center;
    margin: 20px auto;
  }
  .rsp-grid-1col {
    --choice-width: 16em;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .rsp-choice {
    width: var(--choice-width);
    max-width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 10px;
    padding: 12px 16px;
    font-family: 'ArialMS', Arial, sans-serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .rsp-choice:hover { background: #f8f8ff; border-color: #8080ff; }
  .rsp-instruction {
    display: block;
    color: #800080;
    font-size: 1.3rem;
    font-weight: 700;
    line-height: 1.5;
    margin: 20px auto 8px;
  }
  .rsp-click-prompt {
    display: block;
    color: #666;
    font-size: 1.15rem;
    font-weight: 500;
    margin-bottom: 12px;
  }
  @media (max-width: 600px) {
    .rsp-grid-2x2 { grid-template-columns: 1fr 1fr; gap: 10px 14px; }
    .rsp-grid-2x2 .rsp-choice { width: 100%; }
    .rsp-choice { font-size: 0.95rem; padding: 10px 12px; }
    .rsp-poem { font-size: 1rem; padding: 15px 20px; }
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:15pt; color:#800080; margin-top:20px; line-height:1.7;">
        The two rhyming words in the poem are:
        <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <div class="rsp-poem"><?php echo rsp_render_poem($cur['poem'], true); ?></div>
    <br>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="rsp-poem"><?php echo rsp_render_poem($q['poem'], false); ?></div>
    <span class="rsp-instruction">
        Click on the two words in the poem<br>that rhyme with each other.
    </span>
    <span class="rsp-click-prompt">Choose from the pairs below.</span>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
        if ($maxLen > 20)      $containerClass = 'rsp-grid-1col';
        else                   $containerClass = 'rsp-grid-2x2';
    ?>
    <div class="<?php echo $containerClass; ?>" style="--choice-width: <?php echo $choiceWidthEm; ?>em;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="rsp-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();