<?php
// english/modules/objects.php
// Direct and Indirect Objects — given a sentence, type the complete direct
// object or the complete indirect object.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 6 content tiers via (level × grade); text-input answer.
//
// Data markers per sentence:
//   (verb)        &#8594; the verb
//   *direct+      &#8594; the complete direct object (marker pair)
//   [indirect]    &#8594; the complete indirect object (optional; absent when the
//                   sentence has no indirect object)
//
// Question mechanics (preserved from legacy):
//   • Default target = direct object.
//   • If the sentence has an indirect object, 50/50 the target switches to
//     indirect object.
//   • Comparison is case-insensitive and ignores spaces.
//   • A trailing period on the user's input is stripped before comparison.
//
// Data fix (§5.4): tier 6 "products*" &#8594; "products+" (typo in the closing
// marker; legacy code would not have extracted the direct object correctly).
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the sentence box.
// (Not applicable here — text-input module; the Submit button is the affordance.)

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
$moduleTitle = 'Direct and Indirect Objects';
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

// ---- Tier mapping (§4) — legacy Easy / legacy Hard; Medium folded into Hard ----
function resolve_obj_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 3) return 1;
        if ($grd <= 5) return 2;
        if ($grd <= 7) return 3;
        return 4;
    }
    if ($grd <= 3) return 3;
    if ($grd <= 5) return 4;
    if ($grd <= 7) return 5;
    return 6;
}

// ---- Name pools (§5.2) — verbatim from legacy ----
$boys = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos',
    'Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian',
    'Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph',
    'Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael',
    'Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel',
    'Sebastian','Thomas','William'];
$girls = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille',
    'Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah',
    'Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla',
    'Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi',
    'Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];

// ---- Data (§5) — verbatim from legacy, with placeholders + 1 typo fix ----
$rawByTier = [
    1 => [
        "Our teacher is (reading) *a book+.",
        "We (boarded) *our plane+ at once.",
        "Please (drink) *your milk+.",
        "Have you (eaten) *your sandwich+?",
        "You must (comb) *your hair+.",
        "I (showed) her *my drawing+.",
        "{name3} (sent) him *a long letter+.",
        "{name1} (threw) *a rock+ at that tree.",
        "She (baked) *two cakes+ for us.",
        "Please (tell) him *one more joke+.",
        "I (used) *her spoon+ to eat.",
        "{name3} (brought) him *ice cream+.",
        "{name1} (licked) *the stamps+ again.",
        "The dog (chased) *the noisy cat+.",
        "The car (bumped) *the fence+ twice.",
        "Did you (give) her *my pen+?",
        "Can you (bring) him *some lunch+?",
        "He will (repair) *the broken chair+.",
        "The singer (sang) *a song+ for her.",
        "The naughty cat (stole) *their food+.",
        "{name3} (gave) her baby *a rattle+.",
        "{name1} (handed) {name2} *a hammer+.",
        "Quick, (throw) her *the ball+!",
        "Did you (mop) *the floor+ well?",
        "I will (miss) *your funny jokes+.",
        "The agent (sold) {name1} *an old car+.",
        "Will you (lend) her *ten pesos+?",
    ],
    2 => [
        "Can you (draw) *another picture+ on this page?",
        "Our workers will (paint) *these chairs+.",
        "The pencil sharpener (broke) *her pencil+.",
        "The soldier (fired) *a gun+ at the enemy.",
        "The fire (destroyed) *a house and a car+.",
        "Thomas Edison (invented) *the light bulb+.",
        "{name1} (saved) *the kitten+ from that dog.",
        "I will (tell) [you] *another story+.",
        "She will (give) [{name1}] *her pencil+.",
        "{name1} will (send) [{name3}] *a letter+.",
        "Let me (throw) [them] *this ball+.",
        "He will (show) [me] *his pet turtles+ later.",
        "The strong winds (scattered) *the comic books+.",
        "{name3} (gave) [{name1} and me] *apples+ for lunch.",
        "{name3} will (lend) [them] *her bicycle+ today.",
        "Our aunt (gave) [{name3}] *that antique cello+.",
        "{name3} (handed) [{name1}] *two shiny coins+.",
        "You must never (tell) [anybody] *this lie+.",
        "{name1} (gave) [his poodle] *a large bone+.",
        "{name1} (bought) [{name3}] *a dozen roses+.",
        "You should (get) [yourself] *a steady job+.",
    ],
    3 => [
        "Our company (supplies) *clean water+ to their village.",
        "{name3} (broke) *her arm+ when she fell from the roof.",
        "The teacher (stopped) *the fight+ as soon as she saw it.",
        "{name1} (bought) *his fancy sports car+ just last week.",
        "The kitten (moved) *the ball of yarn+ around the room.",
        "{name1} (sang) *a beautiful song+ in the class program.",
        "Our bodies (produce) *vitamin D+ when exposed to sunlight.",
        "{name1} (joins) *the basketball tournament+ every summer.",
        "{name1} (lent) [{name2}] *his favorite book+ yesterday.",
        "We (gave) [{name3}] *a box of special condiments+ today.",
        "The waitress (served) [the guests] *soup and sandwiches+.",
        "The mailman (handed) [{name1}] *a bunch of letters+.",
        "I'm still waiting because she (made) [me] *a promise+.",
        "The music teacher (taught) [her students] *a new song+.",
        "Please (show) [the teacher] *your work+ before you leave.",
        "{name1} (built) [his little brother] *a model of a spaceship+.",
        "We (sent) [you] *some scientific articles+ last week.",
        "{name3} (assigned) [the class] *ten math problems+.",
        "The chef (baked) [the children] *some cookies+.",
        "I will (pour) [his guest] *another cup of coffee+.",
    ],
    4 => [
        "The paleontologist (found) *the dinosaur bones+ in this remote area.",
        "When the chair overturned, it (crushed) *the rickety table+ behind it.",
        "{name1}, {name3}, and I (ate) *lunch+ at the new Chinese restaurant.",
        "{name3} (handed) [{name1}] *an umbrella+ when it started to rain.",
        "{name1} (bought) [{name3}] *a pack of spaghetti+ a while ago.",
        "{name1} and {name2} (offered) [{name3}] *a detailed explanation+.",
        "Can you (tell) [my best friend] *your outlandish story+?",
        "{name3} (sold) [{name1}] *a cup of coffee+ for just five pesos.",
        "{name3} (gave) [{name1}] *an invitation to her show+ so he thanked her.",
        "This hospital should (offer) [the doctors] *better compensation+.",
        "It is better to (serve) [our grandmother] *her dinner+ now.",
        "Could you (show) [{name3} and her friends] *our new pavilion+?",
        "{name3} should (find) [{name1}] *a new data analyst+ within this week.",
        "It was Roosevelt indeed who (approved) *that atomic program+.",
        "The marching band (entertained) *the crowd+ until the speaker arrived.",
        "The judge will (assign) [them] *several hours of community service+.",
        "{name3} (sold) [the art dealer] *many of her wood carvings+.",
        "The volunteers (immersed) *the left hand of the child+ in cold water.",
    ],
    5 => [
        "{name3} (emphasized) *the importance of individuality+ in her speech about fashion.",
        "{name3} (taught) [her students] *some safety rules+ before starting the experiment.",
        "Computers (consume) *electrical energy+ even if they are in hibernation mode.",
        "{name1} (revealed) *a tightly guarded secret+ to his colleague when they met.",
        "Before our dinner, I will (pour) [each one of you] *a glass of vintage wine+.",
        "{name1} (promised) [his children] *a new puppy+, but only if they'll get good grades.",
        "{name3} will (bake) [these poor orphans] *a large caramel cake+ this Saturday.",
        "The college professor (bought) [his biology students] *a new microscope+.",
        "Kindly (show) [{name3} and her officemates] *our new computer laboratory+.",
        "Those social workers must (find) [these starving people] *more food donors+ soon.",
        "Is it already time to (serve) [our distinguished guests] *their sumptuous dinner+?",
        "Is it true that {name1} (sold) [{name2}] *a house and lot+ for just one million pesos?",
        "The training department (lent) [me] *this powerful projector+ for my presentation.",
        "The statisticians (performed) *the correlation test+ after no outliers were found.",
        "The emergency operation (eliminated) *the source of the bleeding+ successfully.",
        "Your innovation will (expedite) *our gene identification process+.",
        "The assistant director will (assign) [the actors] *random roles+ during the audition.",
    ],
    6 => [
        "The president's wise decision and swift action will (alleviate) *this humanitarian crisis+ in due time.",
        "The gigantic asteroid (agitated) *great amounts of dust+ when it hit, leading to the mass extinctions.",
        "Our doctors should (find) [the poisoned man] *an effective antidote+ as soon as possible.",
        "The tired and weary social workers (distributed) *food and medical supplies+ to the typhoon victims.",
        "Their high-end drones can now (deliver) *any of their products+ to their customers more efficiently.",
        "When will the professor (teach) [his engineering students] *the concepts of thermodynamics+?",
        "Why would our chief engineer (build) [the new engineers] *a research laboratory+?",
        "Your engineering team should (find) [our discontented client] *a more effective solution+ soon.",
        "The literary editor will (teach) [her staff] *modern writing techniques+ this afternoon.",
        "{name1} and I (promised) [the young students] *a theme park adventure+ when the wet season is over.",
        "Nowadays, even young children can (teach) [themselves and other kids] *new programming languages+.",
        "The entrepreneur (bought) [each of his product designers] *a digital oscilloscope+.",
        "The zookeeper (brought) [the lionesses and their cubs] *a huge heap of meat+ to feast on.",
        "If matter and antimatter had originally existed in equal quantities, they would have (annihilated) *each other+ completely by now.",
        "The destructive power of the tsunami (demolished) *their sleepy town+ in a matter of minutes.",
    ],
];

// ---- Parser (§5.1 — run after name substitution, before question assembly) ----
function obj_parse(string $raw): ?array {
    $verb = null; $dobj = null; $iobj = null;
    if (preg_match('/\(([^)]+)\)/u', $raw, $m)) {
        $verb = $m[1];
        $raw = preg_replace('/\([^)]+\)/u', '{VERB}', $raw, 1);
    }
    if (preg_match('/\*([^+]+)\+/u', $raw, $m)) {
        $dobj = $m[1];
        $raw = preg_replace('/\*[^+]+\+/u', '{DOBJ}', $raw, 1);
    }
    if (preg_match('/\[([^\]]+)\]/u', $raw, $m)) {
        $iobj = $m[1];
        $raw = preg_replace('/\[[^\]]+\]/u', '{IOBJ}', $raw, 1);
    }
    if ($verb === null || $dobj === null) return null;
    return [
        'template' => $raw,
        'verb'     => $verb,
        'dobj'     => $dobj,
        'iobj'     => $iobj,
    ];
}

// ---- Render helpers (§8.2 target #CC0066) ----
function obj_render(array $p, string $highlight = ''): string {
    $verbEsc = htmlspecialchars($p['verb']);
    $dobjEsc = htmlspecialchars($p['dobj']);
    $iobjEsc = $p['iobj'] !== null ? htmlspecialchars($p['iobj']) : '';

    if ($highlight === 'dobj') {
        $dobjEsc = '<strong style="color:#CC0066;">' . $dobjEsc . '</strong>';
    } elseif ($highlight === 'iobj') {
        $iobjEsc = '<strong style="color:#CC0066;">' . $iobjEsc . '</strong>';
    }

    $html = htmlspecialchars($p['template']);
    $html = str_replace('{VERB}', $verbEsc, $html);
    $html = str_replace('{DOBJ}', $dobjEsc, $html);
    if ($p['iobj'] !== null) {
        $html = str_replace('{IOBJ}', $iobjEsc, $html);
    }
    return $html;
}

// Hugging box: fits its content (max 480px), ample padding so short sentences
// don't render as skinny capsules. Used for both question and feedback
// sentence displays.
function obj_box(string $html, int $minHeight = 100): void {
    echo '<div style="text-align:center;">'
       . '<div style="display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'vertical-align:middle;'
       . 'min-height:' . $minHeight . 'px;max-width:480px;'
       . 'margin:20px 0;padding:28px 40px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html
       . '</div>'
       . '</div>';
}

// ---- Question generation (§6) ----
function build_obj_question(array $rawByTier, string $lvl, int $grd,
                            string $sessionKey, array $boys, array $girls): ?array {
    $tier = resolve_obj_tier($lvl, $grd);
    $pool = $rawByTier[$tier] ?? [];
    if (empty($pool)) return null;

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        $key = "t$tier:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($pool as $i => $item) $available[] = ['key' => "t$tier:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $name1 = $boys[array_rand($boys)];
    do { $name2 = $boys[array_rand($boys)]; } while ($name2 === $name1);
    $name3 = $girls[array_rand($girls)];
    do { $name4 = $girls[array_rand($girls)]; } while ($name4 === $name3);

    $raw = str_replace(
        ['{name1}', '{name2}', '{name3}', '{name4}'],
        [$name1, $name2, $name3, $name4],
        $pool[$pick['idx']]
    );

    $parsed = obj_parse($raw);
    if ($parsed === null) return null;

    $asked  = 'direct object';
    $answer = $parsed['dobj'];
    if ($parsed['iobj'] !== null && rand(1, 2) === 1) {
        $asked  = 'indirect object';
        $answer = $parsed['iobj'];
    }

    return [
        'parsed' => $parsed,
        'asked'  => $asked,
        'answer' => $answer,
        'lvl'    => $lvl,
    ];
}

// ---- Answer processing (§7 — text input) ----
$result = null; $scorer = null;
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $userRaw = rtrim(trim((string)($_POST['answer'] ?? '')), '.');

    $userNorm    = str_replace(' ', '', strtolower($userRaw));
    $correctNorm = str_replace(' ', '', strtolower($cur['answer']));
    $isCorrect   = ($userNorm === $correctNorm);

    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer(
        $isCorrect ? $cur['answer'] : $userRaw,
        $cur['answer'],
        $cur['lvl']
    );

    $result = ['correct' => $isCorrect, 'clicked' => $userRaw, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) — with tier-1 fallback if generation fails ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_obj_question($rawByTier, $lvl, $grd, $sessionKey, $boys, $girls);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_obj_question($rawByTier, 'Easy', 0, $sessionKey, $boys, $girls);
        if ($fallback !== null) $_SESSION[$sessionKey]['current'] = $fallback;
    }
}

// ---- Render (§8, §10) ----
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl,
              $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur    = $result['cur'];
    $p      = $cur['parsed'];
    $target = ($cur['asked'] === 'direct object') ? 'dobj' : 'iobj';
    $sentenceHtml = obj_render($p, $target);

    $verbEsc = '<strong style="color:#CC0066;">\'' . htmlspecialchars($p['verb']) . '\'</strong>';
    $ansEsc  = '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['answer']) . '\'</strong>';
    $dobjEsc = '<strong style="color:#CC0066;">\'' . htmlspecialchars($p['dobj']) . '\'</strong>';
    $iobjEsc = $p['iobj'] !== null
        ? '<strong style="color:#CC0066;">\'' . htmlspecialchars($p['iobj']) . '\'</strong>'
        : null;

    if ($cur['asked'] === 'direct object') {
        $explain = 'The verb in this sentence is ' . $verbEsc . '. Its complete '
                 . 'direct object is ' . $ansEsc;
        if ($iobjEsc !== null) {
            $explain .= ' while its complete indirect object is ' . $iobjEsc;
        }
        $explain .= '.';
    } else {
        $explain = 'The verb in this sentence is ' . $verbEsc . '. Its complete '
                 . 'indirect object is ' . $ansEsc . ' while its complete direct '
                 . 'object is ' . $dobjEsc . '.';
    }

    $sentenceLen  = strlen(strip_tags($sentenceHtml));
    $sentenceFont = ($sentenceLen > 150) ? '14pt' : ($sentenceLen > 100 ? '15pt' : ($sentenceLen > 60 ? '16pt' : '17pt'));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php obj_box(
      '<div style="font-size:' . $sentenceFont . ';color:#333;line-height:1.6;text-wrap:pretty;">'
    . $sentenceHtml
    . '</div>', 100
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:pretty;">
    <?php echo $explain; ?>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null):
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto 20px;max-width:480px;">
    No question could be generated. Please try again.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $p            = $q['parsed'];
    $sentenceHtml = obj_render($p, '');
    $sentenceLen  = strlen(strip_tags($sentenceHtml));
    $sentenceFont = ($sentenceLen > 150) ? '14pt' : ($sentenceLen > 100 ? '15pt' : ($sentenceLen > 60 ? '16pt' : '17pt'));
    $askedLabel   = ($q['asked'] === 'direct object')
        ? '<span style="color:#CC0066;">direct object</span>'
        : '<span style="color:#CC0066;">indirect object</span>';

    $anslen    = strlen($q['answer']);
    $inputSize = max(12, min(50, $anslen + 3));
    $inputMax  = max(30, $anslen + 15);
    $inputFont = ($anslen > 30) ? '20px' : '24px';
?>
  <div style="margin:35px auto 8px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:pretty;">
    Find the complete <?php echo $askedLabel; ?> in this sentence.
  </div>
  <div style="font-family:Arial,sans-serif;font-size:12pt;color:#666;max-width:480px;margin:0 auto 14px;line-height:1.4;">
    Include the article and all modifiers (e.g., <em>"her arm"</em>, not just <em>"arm"</em>).<br/>
  </div>
  <?php obj_box(
      '<div style="font-size:' . $sentenceFont . ';color:#333;line-height:1.6;text-wrap:pretty;">'
    . $sentenceHtml
    . '</div>', 100
  ); ?>
  <div style="margin:24px auto;font-family:Arial,sans-serif;">
    <label style="font-size:14pt;color:#800080;font-weight:700;">Answer:
      <input type="text" name="answer"
             size="<?php echo $inputSize; ?>" maxlength="<?php echo $inputMax; ?>"
             autocomplete="off"
             style="font-family:Arial,sans-serif;font-size:<?php echo $inputFont; ?>;font-weight:700;
                    color:#0000CC;text-align:center;padding:8px 12px;
                    border:2px solid #888888;border-radius:8px;background:#fff;
                    box-sizing:border-box;max-width:100%;">
    </label>
  </div>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit1" value=" Submit " style="margin-right:12px;font-family:Arial,sans-serif;font-size:11pt;">
    <input type="submit" name="Submit2" value=" New Question " style="margin-left:12px;font-family:Arial,sans-serif;font-size:11pt;">
  </div>
<?php endif;
endif;
?>

<!-- Difficulty radios (§10.4 — Easy / Hard only, 12pt label) -->
<div align="center" style="margin-top:20px;">
  <p style="margin-bottom:0;color:#000080;font:12pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
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