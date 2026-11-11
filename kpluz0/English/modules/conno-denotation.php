<?php
// english/modules/conno-denotation.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a sentence with the target word/phrase highlighted red; student
// clicks its connotation or denotation based on context.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Medium" with no level radios in
//   the HTML. Content bank is identical regardless of level. Collapsed to
//   $lvl='Hard' (legacy Medium 2-pt &#8594; modern Hard 2-pt; preserves the
//   score value while honouring the 2-level scheme).
//
// Bank format: "<code><sentence with (target)>=<answer>[<d1>+<d2>]<d3>"
// where code "c" = connotation, "d" = denotation. The (target) parenthetical
// is highlighted red in both question and feedback views.
//
// Choice layout (§14):
//   2×2 grid  &#8594; when all choices fit comfortably per cell (maxLen &#8804; 14)
//   1-col hug &#8594; otherwise (grid auto column, boxes hug longest choice)
//
// 22 questions preserved. Legacy had an empty /* */ comment block between
// the last question and the closing bracket — no content lost.
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'conno-denotation.php'

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

$moduleTitle = 'Denotation and Connotation';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Hard';   // single-level collapse (§5) — legacy was Medium/2pts

// ============================================================
// Question bank: "<code><sentence>=<answer>[<d1>+<d2>]<d3>"
// ============================================================
$bank = [
    "dThe (smell) of the flowers remind me of my grandmother.=scent[neatness+colors]beauty",
    "dThe two clowns at the funhouse were really (comical).=funny[unreal+fake]annoying",
    "cSteve's (overconfidence) is undermining the team's unity and cooperation.=conceit[dishonesty+laziness]incompetence",
    "cThe ongoing pandemic has put their family in a very (challenging) situation.=difficult[rewarding+competitive]exciting",
    "cLeila is so (shy) about her achievements that you wouldn't know she's a genius.=modest[honest+dull]fearful",
    "cThe student replied to the teacher with a (witty) answer and everyone laughed.=amusing[intelligent+serious]deep",
    "cShe could (smell something fishy) about that business transaction.=sense or suspect something bad[smell a foul odor+smell like fish]unable to breathe",
    "cThe jury's very unfavorable verdict made the courthouse proceedings (comical).=outrageous[just+logical]acceptable",
    "cThe (mole) at the FBI contributed enough information to bring down the international drug syndicate.=a spy[a small mammal+someone very powerful]someone in high position",
    "dA (mole) has dark velvety fur, a long muzzle, and very small eyes.=a small mammal[an informant+a spy]a unit of measurement",
    "dThe newly married couple bought (cheap) furniture for their apartment.=inexpensive[stingy+compact]ungenerous",
    "cMauro is so (cheap) that he never leaves a tip no matter how good the service is.=stingy[inexpensive+low-cost]tacky",
    "cInez is so (conversational) about others' lives, that she's been causing fights among her friends already.=gossipy[chatty+friendly]expressive",
    "cMr. Chua is (very generous) when it comes to his favorite charities.=donates large amounts of money[asks for a lot of money+donates very little money]promises to donate money",
    "cThe (snake) in their group divulged a lot of secrets to their rival gang.=a traitor[a long, legless reptile+a stranger]a group's oldest member",
    "cCriminals avoid being identified as a (rat) because other criminals might try to harm them.=someone who helps the police[a long-tailed rodent+a pest in society]a group's oldest member",
    "dBall pythons kept as pets should be fed a (rat) at least once per week.=a long-tailed rodent[a police informant+a pest in society]a traitor",
    "dThe (snake) escaped its cage and slithered across the room.=a long, legless reptile[a traitor+a sneaky person]an impostor",
    "cHelen's new diet might be working because she now looks a bit (anorexic).=very thin[refusing to eat+on a hunger strike]suffering from anorexia",
    "cThe mother (brainwashed) her son into hating his estranged father.=manipulated someone into believing something[taught someone something new+gave someone peace of mind]made someone more aware",
    "cRoland didn't (sugarcoat) his words when he spoke about injustice in his town.=to make something bad seem more acceptable[to cover something with sugar+to tell the absolute truth]to make the truth hurt",
    "dThe chef (sugarcoated) the pastries to make them more appealing to children.=to cover something with sugar[to make something bad seem more acceptable+to tell the absolute truth]to make the truth hurt",
];

// ============================================================
// Parse helper
// ============================================================
function cn_parse($entry) {
    if (strlen($entry) < 2) return null;
    $code = substr($entry, 0, 1);
    if ($code !== 'c' && $code !== 'd') return null;
    $rest = substr($entry, 1);
    $p0 = strpos($rest, '=');
    $p1 = strpos($rest, '[');
    $p2 = strpos($rest, '+');
    $p3 = strpos($rest, ']');
    if ($p0 === false || $p1 === false || $p2 === false || $p3 === false) return null;
    $question = substr($rest, 0, $p0);
    $answer   = substr($rest, $p0 + 1, $p1 - $p0 - 1);
    $d1       = substr($rest, $p1 + 1, $p2 - $p1 - 1);
    $d2       = substr($rest, $p2 + 1, $p3 - $p2 - 1);
    $d3       = substr($rest, $p3 + 1);
    if ($question === '' || $answer === '') return null;
    return [
        'question' => $question,
        'answer'   => $answer,
        'd1'       => $d1,
        'd2'       => $d2,
        'd3'       => $d3,
        'type'     => ($code === 'c') ? 'connotation' : 'denotation',
    ];
}

function cn_render_question($raw) {
    $safe = htmlspecialchars($raw);
    $safe = str_replace('(', '<strong style="color:#CC0066;">', $safe);
    $safe = str_replace(')', '</strong>', $safe);
    return $safe;
}

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
// THEME
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
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $avail = [];
    foreach ($bank as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        if (cn_parse($entry) === null) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            if (cn_parse($entry) !== null) $avail[] = $i;
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
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = cn_parse($bank[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question' => $parsed['question'],
        'answer'   => $parsed['answer'],
        'type'     => $parsed['type'],
        'choices'  => $choices,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .cn-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 20px 26px;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
    box-sizing: border-box;
  }
  .cn-card.cn-feedback { font-size: 1.25rem; }
  .cn-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 16px auto 8px;
    max-width: 100%;
    line-height: 1.4;
  }
  .cn-prompt strong { color: #CC0066; }
  .cn-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.15rem;
    color: #555555;
    text-align: center;
    margin: 30px auto 0;
  }

  /* 2×2 grid — equal halves, used when all choices fit per cell */
  .cn-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 18px auto;
  }
  /* 1-col hugging grid — column width = max-content of widest choice;
     every choice stretches to that width, column centered. */
  .cn-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 100%;
    margin: 18px auto;
  }
  .cn-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 64px;
    padding: 14px 20px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    max-width: 100%;
    transition: background 0.15s, border-color 0.15s;
  }
  .cn-choice:hover { background: #eef; border-color: #8080ff; }
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

    <div class="cn-card cn-feedback">
        <?php echo cn_render_question($cur['question']); ?>
        <br><br>
        <span style="color:#800080;"><?php echo $cur['type']; ?>:</span>
        <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <div class="cn-card"><?php echo cn_render_question($q['question']); ?></div>

    <p class="cn-prompt">
        What's the <strong><?php echo $q['type']; ?></strong> of the<br>
        red word or phrase in the sentence<br>
        above based on the given context?
    </p>

    <p class="cn-hint">Click on your answer.</p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 14);
        $containerClass = $use2x2 ? 'cn-grid-2x2' : 'cn-grid-1col';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="cn-choice">
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