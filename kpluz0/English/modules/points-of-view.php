<?php
// english/modules/points-of-view.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a sentence or literary excerpt; student clicks its point of view.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// 3 choices per question (always): first person / second person / third
// person — kept in semantic order (matches legacy; no shuffle since these
// are ordered category labels).
//
// Bank format: "<question>=<answer>"
// Some entries are literary excerpts with <br/> and <i> markup — preserved
// via pov_render() which escapes everything, then selectively restores only
// <br>, <br/>, <i>, </i> to prevent XSS while keeping formatting.
//
// Data hygiene: excerpt 5 (Still I Rise) originally mislabeled as "second
// person" — corrected to "first person" (the poem is narrated in first
// person: "I'll rise"). All other labels preserved.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
// (Not used for content selection — kept only for the standard setup block.)
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'points-of-view.php'

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

$moduleTitle = 'Identifying Points of View';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

// ============================================================
// Question bank: "<question>=<answer>"
// ============================================================
$bank = [
    // First person — short sentences
    "I think that we should all work hard as a team if we want to succeed in this project.=first person",
    "I treated myself to a nice seafood lunch this afternoon.=first person",
    "Jake and I enjoy watching animal documentaries on television.=first person",
    "I gave Martha a piece of the carrot cake I baked yesterday.=first person",
    "We are going to the ice rink tomorrow so I need to sleep early tonight.=first person",
    "My dad and I went to the baseball game together last Saturday.=first person",
    "I believe I did a wonderful job fixing my table.=first person",
    "After much thinking, I decided to simply keep the embarrassing secret to myself.=first person",
    "The principal met with Jane and I, so we both know what was said.=first person",
    "I can tell that the tree house is still in good condition.=first person",
    "Sarah and I walked to school together every day when we were little.=first person",
    // Second person — short sentences
    "Listen carefully because I have some very exciting news for you!=second person",
    "You are a good friend, so don't forget to keep in touch.=second person",
    "Oh my, your brother is really a fantastic basketball player!=second person",
    "Did you go to a beauty salon? Your hair looks different today.=second person",
    "Could you please show me the way to the lake, sir?=second person",
    "You are a very supportive friend, so I hope you won't ever change.=second person",
    "Do you know the price of crayons in the mall?=second person",
    "You and Dani make a good team so there's no doubt that your project will succeed.=second person",
    "You are one of the top students this year so keep up the good work!=second person",
    "Did you and Craig go to the movies without me yesterday?=second person",
    "You must learn your mother's recipes because she is such an excellent cook!=second person",
    "If you want to join the team, you need to pass the audition.=second person",
    // Third person — short sentences
    "He ran away as soon as he saw the huge alligator in the swamp.=third person",
    "The coach wouldn't replace Mike because he is one of the best athletes on the team.=third person",
    "She reviewed all of her answers before turning her test paper in.=third person",
    "Anne and James went to high school together so they know each other pretty well.=third person",
    "Pamela plays center because she is one of the tallest girls in the team.=third person",
    "Kristine kept herself in shape all year round for the competitions.=third person",
    "Jane bought assorted fruits from the market then gave them all to street children.=third person",
    "The burglar escaped through a manhole when cornered by the policemen.=third person",
    "They are going to the mall for some early Christmas shopping.=third person",
    // Excerpt 1 — Charlotte's Web (third person)
    "When Mr. Arable returned to the house half an hour later, he carried a carton under his arm. Fern was upstairs changing her sneakers. The kitchen table was set for breakfast, and the room smelled of coffee, bacon, damp plaster, and wood smoke from the stove.<br/><br/>-excerpt from <i>Charlotte's Web</i> by E. B. White=third person",
    // Excerpt 2 — The Cask of Amontillado (first person)
    "I took down from their places on the wall two brightly burning lights. I gave one of these to Fortunato and led him to a wide doorway. There we could see the stone steps going down into the darkness.<br/><br/>-excerpt from <i>The Cask of Amontillado</i> by Edgar Allan Poe=first person",
    // Excerpt 3 — Complicity (second person)
    "You hear the car after an hour and a half. During that time you've been here in the darkness, sitting on the small telephone seat near the front door, waiting. You only moved once, after half an hour, when you went back through the kitchen to check on the maid.<br/><br/>-excerpt from <i>Complicity</i> by Iain Banks=second person",
    // Excerpt 4 — The Road Not Taken (first person)
    "Two roads diverged<br/>in a wood, and I,<br/>I took the one less<br/>traveled by,<br/>And that has made<br/>all the difference.<br/><br/>-excerpt from <i>The Road Not Taken</i> by Robert Frost=first person",
    // Excerpt 5 — Still I Rise (first person — corrected from legacy "second person")
    "You may write me<br/>down in history<br/>With your bitter,<br/>twisted lies,<br/>You may tread me<br/>in the very dirt<br/>But still, like dust,<br/>I'll rise.<br/><br/>-excerpt from <i>Still I Rise</i> by Maya Angelou=first person",
    // Excerpt 6 — Alice in Wonderland (third person)
    "\"Your hair wants cutting,\" said the Hatter. He had been looking at Alice for some time with great curiosity, and this was his first speech.<br/><br/>-excerpt from <i>Alice in Wonderland</i> by Lewis Caroll=third person",
    // Excerpt 7 — Home Burial (third person)
    "He saw her from<br/>the bottom of the stairs<br/>Before she saw him.<br/>She was starting down,<br/>Looking back over her<br/>shoulder at some fear.<br/><br/>-excerpt from <i>Home Burial</i> by Robert Frost=third person",
];

// ============================================================
// Parsers + render helpers
// ============================================================
function pov_parse($entry) {
    $p0 = strpos($entry, '=');
    if ($p0 === false) return null;
    $question = trim(substr($entry, 0, $p0));
    $answer   = trim(substr($entry, $p0 + 1));
    if ($question === '' || $answer === '') return null;
    if (!in_array($answer, ['first person', 'second person', 'third person'], true)) return null;
    return ['question' => $question, 'answer' => $answer];
}

function pov_render($raw) {
    // Escape everything first, then restore ONLY the whitelisted tags
    $safe = htmlspecialchars($raw, ENT_QUOTES, 'UTF-8');
    $safe = preg_replace('/&lt;br\s*\/?&gt;/i', '<br>', $safe);
    $safe = preg_replace('/&lt;i&gt;/i', '<i>', $safe);
    $safe = preg_replace('/&lt;\/i&gt;/i', '</i>', $safe);
    return $safe;
}

// ============================================================
// Handle answer click
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
// Theme
// ============================================================
$theme = [
    'top_banner'    => $base . '/english/images/ex-27-top.jpg',
    'title_bg'      => $base . '/english/images/ex-27-top2.jpg',
    'left_side'     => $base . '/english/images/ex-27-left.jpg',
    'right_side'    => $base . '/english/images/ex-27-right.jpg',
    'content_bg'    => $base . '/english/images/ex-27-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-27-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// Generate
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $avail = [];
    foreach ($bank as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        if (pov_parse($entry) === null) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            if (pov_parse($entry) !== null) $avail[] = $i;
        }
    }
    if (empty($avail)) {
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<p style="text-align:center;font-size:16pt;margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = pov_parse($bank[$idx]);

    $_SESSION[$sessionKey]['current'] = [
        'question' => $parsed['question'],
        'answer'   => $parsed['answer'],
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .pov-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 20px 26px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    line-height: 1.6;
    text-align: center;
    box-sizing: border-box;
  }
  .pov-card i { font-style: italic; }
  .pov-card.pov-feedback { font-size: 1rem; }
  .pov-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 12px;
    line-height: 1.5;
  }
  .pov-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.05rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .pov-grid-3col {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
    max-width: 100%;
    margin: 14px auto;
  }
  .pov-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 60px;
    padding: 10px 8px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.05rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .pov-choice:hover { background: #eef; border-color: #8080ff; }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <div class="pov-card pov-feedback">
        <?php echo pov_render($cur['question']); ?>
        <br><br>
        <span style="color:#CC0066; font-weight:700;">Point of View:</span>
        <strong style="color:#800080; font-weight:700;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="pov-prompt">Identify the point of view used by the text shown.</p>

    <div class="pov-card"><?php echo pov_render($q['question']); ?></div>

    <p class="pov-hint">Click on your answer.</p>

    <div class="pov-grid-3col">
        <?php
            $choices = ['first person', 'second person', 'third person'];
            foreach ($choices as $c):
        ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="pov-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();