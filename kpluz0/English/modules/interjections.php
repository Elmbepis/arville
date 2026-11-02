<?php
// english/modules/interjections.php
// Interjections — identify which word in a sentence is the interjection.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 4 M/C choices (2×2 grid).
//
// Distractor strategy (§ user request): all 3 distractors are drawn from the
// SAME sentence as the interjection. Priority filter:
//   1. Content words (length &#8805; 3, not a stop word)
//   2. Remaining words (length &#8805; 3)
//   3. Short words (length &#8805; 2)
//   4. Whatever remains (guarantees 3 choices, never fails)
// This makes the task "recognize which word functions as an interjection
// among ordinary sentence words" rather than "pick the most emotional word".
//
// Data markers: *... +   surround the interjection in the source sentence.
// Placeholders: {boy}, {girl}, {name}, {surname} — rolled once per question.
//
// Display vs answer forms:
//   • Choice buttons show the clean form (ucfirst, trailing punctuation stripped)
//   • The scorer/URL uses the same clean form for consistent comparison
//   • The feedback sentence preserves the interjection's original sentence case
//     via the *... + marker callback (so "argh" in the sentence stays "argh")

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
$moduleTitle = 'Interjections';
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
function resolve_inter_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// ---- Data (§5) — verbatim from legacy, with name placeholders ----
// `*... +` markers around the interjection. {boy}/{girl}/{name}/{surname}
// placeholders replace the legacy interpolated variables.
$dataByTier = [
    1 => [
        'This ring is no longer in excellent condition, *argh+.',
        '*My+, {girl} looks marvelous in that magnificent outfit!',
        "*Aw+, this bracelet doesn't fit my wrist anymore.",
        "*Alas+, there's no longer enough time for us to win this game.",
        "It's really cold in here, *brrr+. Turn on the heater!",
        'What is this? *Mmm+, this apple is very sweet and tasty!',
        "*Yikes+, I didn't know that we have an English test today!",
        "*Sweet!+ I didn't expect to get this cool bike for my birthday!",
        'Did you see that? *Wow+, that sports car was really fast!',
        "Let's check your answers. *Aha+, one of them is wrong!",
        '*Hey!+ Stop teasing those children and get back to work!',
        "Have you seen this cartoon? *Haha!+ It's really funny.",
        'That was a useless meeting. *Bah+, we wasted half of our day.',
        "I think I saw a ghost. *Eek!+ It's still here with us!",
        "*Hurrah!+ Miss Philippines is this year's Miss Universe!",
        "Is that your puppy? She's cute. *Ouch!+ She just bit me!",
        "Can you hold this for me? *Oops!+ I didn't mean to drop it.",
        "*Yay+, we're going to Batangas tomorrow for our vacation!",
    ],
    2 => [
        "*Oh dear!+ There's an enormous mouse in your room and it's hideous!",
        "*Aha+, that's exactly how Sam explained the matter to me this afternoon!",
        '*Yes!+ Our calculus project won first prize at the academic olympiad!',
        'I blundered during our chess match and consequently lost, *humph+.',
        '*Hooray!+ We just closed an important business deal in North America!',
        'Your dog just knocked down and shattered my expensive vase, *aargh+.',
        "Look at this picture. *Eww!+ I've never seen that many snakes before.",
        "I wonder what's in this box. *Holy cow!+ It's a white baby rabbit!",
        'Look at this menu. *Yummy+, that steak in the picture is making me hungry!',
        "Let me scan this book quickly. *Meh+, there's nothing interesting inside.",
        "*Eh+? Did I hear you correctly when you said that you're getting married?",
        '{boy}, can you please scratch my back? *Ahhh+, that feels wonderful.',
        'Is there still a chance for us to win? *Well+, I certainly hope so.',
        "Are you willing to be my business partner? *Oh+, please say 'yes'!",
        'The giant shark is turning around. *Yikes!+ It is coming back for us!',
        "*Shh+, there are three zombies nearby. We don't want them to hear us.",
        'Let me show you how to fix it. *Oops!+ I dropped the wrench in the water.',
        '*Pssst+. Do you want to buy this smartphone for just a thousand pesos?',
    ],
    3 => [
        'Many years ago, when I was a young...*Eek!+ A bloody man is staggering this way!',
        'Do you see what I see? *Ugh+, that large, shaggy dog is very filthy and grimy!',
        'Let me check the scores online. *Hooray!+ We are winning the game by a wide margin!',
        '*Ahem+, I think we should start this meeting now so we can cover many topics.',
        'May I taste it? *Mmmm+, this chicken pie is heavenly. Where did you buy it?',
        "We must hide from those robbers. *Uh-oh+, I think they've already spotted us!",
        'Turn to the right! Turn to the left! *Whew!+ We almost fell off the ravine!',
        "Are you asking me to invest money in your new business? *Um+, I don't think so.",
        "I really don't know how we ended up this way. *Oh well+, what's done is done.",
        "This is the pasta dish that {girl} made for us. *Yum+, I can't wait to taste it.",
        "You're getting better at it, {boy}. That last round was really perfect. *Attaboy!+",
        'Did {boy} just put ketchup on his ice cream and chocolate syrup on his burger? *Yuck!+',
        '{boy}, come here at once! *Jeepers!+ This is the largest beetle I have ever seen.',
        "You've talked to our neighbor already, haven't you? *Well+, what did he have to say?",
        "That big bully just took my lunch money. *Grrr+, someday I'll find a way to get even.",
        'Our humanoid robot is starting to move. *My goodness+, this is all very exciting!',
    ],
    4 => [
        "Let's see what's inside this store. *Meh+, there's nothing but boring shirts and shoes in here.",
        'This is distressing. *Grrr+, my watch was stolen when our apartment was burglarized last night.',
        'These fruits no longer look fresh and...*eww+, this overripe pear already tastes rancid.',
        "What's that noise? *Good grief!+ The zombies have found us and are surrounding the house!",
        "I didn't realize that it's almost ten already. *Pip pip!+ It's time to get moving, boys.",
        'I heard that their gang tried to rob a police station. *Duh!+ That was a stupid thing to do!',
        "Is that what you'll be wearing to the party tonight? *Yowza!+ That is one beautiful ball gown.",
        "*Gesundheit!+ That was your third sneeze this afternoon. I think you're about to get a cold.",
        "You finally got your master's degree. *Congrats!+ I'm really proud to be your best friend.",
        'The doctor has confirmed that you have been cured. *Hallelujah!+ Our prayers have been answered.',
        "Nobody can sing like you. *Bravo!+ If you don't mind, can you sing one more song for them?",
        "These data confirm our initial findings. *Eureka!+ I think we've discovered a cure for cancer!",
        "Are secret agents monitoring his every move right now? *Well+, I don't know the answer to that.",
        "Are you telling me that we're wrong? *Phooey!+ We have huge amounts of data proving our claim.",
        '{girl} has just lost her bag to a snatcher. *Gosh+, will we ever feel safe in this city again?',
        "I'll scare the dog away with this rock. *Shucks!+ I accidentally hit the hornets' nest instead!",
    ],
    5 => [
        "Do you hear the clunking noises that our engine is making? *Uh-oh!+ I think we're in serious trouble.",
        'Is that the roasted goose that you ordered from their Chinese restaurant? *Mmm+, it is very mouthwatering!',
        'I heard that our rival company got the project. *Humph+, they probably told a few lies to win that contract.',
        "All you have to do is mix these two chemicals and *voila!+ That's a bottle of perfect perfume for you!",
        'Are you sure? *Darn+, how could a young challenger like him defeat a seasoned fighter like {boy} in taekwondo?',
        'Do you really expect me to believe his conspiracy theory? *Fiddlesticks+, nobody can set up a scheme like that.',
        'Our sales are going down and the banks are after us. *Er+, I think we need a miracle to get out of this mess.',
        "It's great to see you and your friends again, {girl}. *Goodness gracious+, we didn't know that all of you were coming!",
        'The government is planning to spend more on that dead project. *Boo+, that will be a waste of taxpayers\' money.',
        "We were able to submit the requirements on time and seal the deal. *Bless you+, we couldn't have done it without you.",
        "I can't believe that the two leaders are threatening each other publicly. *Crikey!+ Do they ever think before they speak?",
        "{girl}, wait for me! Do you know that you mustn't go there by yourself? *Geez!+ There are many dangerous criminals out there!",
        '{girl}, come here quickly and look at this! *Jeepers+, this is the longest python that I\'ve ever seen in my life!',
        'Are you saying that their witness is not lying? *Phooey!+ There are many inconsistencies in his testimony!',
        'Our engineers have just perfected our newest product. *Holy macaroni!+ Imagine what its sales would be like.',
        "Let me take a look at this car's latest model. *Meh+, last year's model looks more stylish and elegant.",
        'Have you heard that {boy} had barely survived an alligator attack? *Gosh+, that must be traumatic for him!',
    ],
];

// ---- Name pools (§5.2) — verbatim from legacy ----
$boys = [
    'Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles',
    'Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac','Jack',
    'Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan',
    'Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas',
    'Noah','Oliver','Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William',
];
$girls = [
    'Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline',
    'Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah','Isabella','Jasmine',
    'Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia',
    'Madeline','Maria','Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha',
    'Sarah','Sophia','Stella','Tina','Victoria',
];
$surnames = [
    'Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales','Martinez',
    'Mendez','Paredes','Revilla','Santos','Tolentino',
];

// Stop words — deprioritized when picking distractors.
$stopWords = [
    'the','a','an','and','or','but','so','if','as','at','by','for','in','of','on',
    'to','up','is','are','was','were','be','been','being','have','has','had','do',
    'does','did','will','would','can','could','may','might','must','shall','should',
    'i','me','my','we','us','our','you','your','he','him','his','she','her','it',
    'its','they','them','their','this','that','these','those','with','from','about',
    'into','over','under','not','no','yes','yeah','ok','okay',
];

// ---- Helpers (§8.2 target #CC0066, §8.4) ----
function inter_extract_marker(string $raw): string {
    if (preg_match('/\*([^+]+)\+/u', $raw, $m)) return $m[1];
    return '';
}

function inter_strip_markers(string $raw): string {
    return preg_replace('/\*[^+]+\+/u', '', $raw);
}

// Feedback: highlight the interjection in pink, preserving its original case.
function inter_render_highlighted(string $raw): string {
    return preg_replace_callback('/\*([^+]+)\+/u', function ($m) {
        return '<strong style="color:#CC0066;">' . $m[1] . '</strong>';
    }, htmlspecialchars($raw));
}

// Question: plain sentence, markers removed, interjection visible but not styled.
function inter_render_plain(string $raw): string {
    return htmlspecialchars(str_replace(['*', '+'], '', $raw));
}

// Canonical display form for choices / URL / scorer.
function inter_clean_form(string $s): string {
    return ucfirst(rtrim($s, '.,!?;:'));
}

function inter_box(string $html, int $minHeight = 120): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Tokenize the sentence (with markers stripped) into candidate words.
function inter_tokenize(string $sentence): array {
    $stripped = inter_strip_markers($sentence);
    $raw_tokens = preg_split('/\s+/u', trim($stripped)) ?: [];
    $tokens = [];
    foreach ($raw_tokens as $t) {
        $t = preg_replace("/^[^\\w']+|[^\\w']+$/u", '', $t);
        if ($t !== '') $tokens[] = $t;
    }
    return $tokens;
}

// Pick 3 distinct distractors from $tokens, excluding $correct (case-insensitive).
function inter_pick_distractors(array $tokens, string $correct, array $stopWords): array {
    $shuffled = $tokens;
    shuffle($shuffled);
    $out = [];

    // Priority 1: content words, length >= 3, not stop word.
    foreach ($shuffled as $t) {
        if (count($out) >= 3) break;
        if (strlen($t) >= 3
            && !in_array(strtolower($t), $stopWords, true)
            && strcasecmp($t, $correct) !== 0
            && !in_array($t, $out, true)) {
            $out[] = $t;
        }
    }
    // Priority 2: any word length >= 3.
    foreach ($shuffled as $t) {
        if (count($out) >= 3) break;
        if (strlen($t) >= 3
            && strcasecmp($t, $correct) !== 0
            && !in_array($t, $out, true)) {
            $out[] = $t;
        }
    }
    // Priority 3: words length >= 2.
    foreach ($shuffled as $t) {
        if (count($out) >= 3) break;
        if (strlen($t) >= 2
            && strcasecmp($t, $correct) !== 0
            && !in_array($t, $out, true)) {
            $out[] = $t;
        }
    }
    // Priority 4: anything (guarantees 3 if sentence has >= 4 tokens).
    foreach ($shuffled as $t) {
        if (count($out) >= 3) break;
        if (!in_array($t, $out, true)) $out[] = $t;
    }
    return $out;
}

// ---- Question generation (§6) ----
function build_inter_question(array $dataByTier, string $lvl, int $grd,
                              string $sessionKey, array $boys, array $girls,
                              array $surnames, array $stopWords): ?array {
    $tier = resolve_inter_tier($lvl, $grd);
    $pool = $dataByTier[$tier] ?? [];
    if (empty($pool)) return null;

    // No-repeat keyed per (tier, index).
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

    $template = $pool[$pick['idx']];

    // Roll names once per question.
    $boy  = $boys[array_rand($boys)];
    $girl = $girls[array_rand($girls)];
    $name = (rand(1, 2) === 1) ? $boy : $girl;
    $surname = $surnames[array_rand($surnames)];
    $sentence = str_replace(
        ['{boy}', '{girl}', '{name}', '{surname}'],
        [$boy, $girl, $name, $surname],
        $template
    );

    // Extract interjection.
    $marker = inter_extract_marker($sentence);
    if ($marker === '') return null;
    $correct = inter_clean_form($marker);

    // Tokenize remaining words and pick 3 distractors from the same sentence.
    $tokens = inter_tokenize($sentence);
    $distractors = inter_pick_distractors($tokens, $correct, $stopWords);

    // Build the 4-choice list.
    $choicesRaw = [$correct];
    foreach ($distractors as $d) {
        if (count($choicesRaw) >= 4) break;
        $choicesRaw[] = inter_clean_form($d);
    }
    // Dedupe case-insensitively in case a distractor equals the correct.
    $seen = [];
    $choices = [];
    foreach ($choicesRaw as $c) {
        $lc = strtolower($c);
        if (!isset($seen[$lc])) {
            $seen[$lc] = true;
            $choices[] = $c;
        }
    }
    if (count($choices) < 4) return null;   // should never happen given data length

    shuffle($choices);

    return [
        'sentence' => $sentence,   // raw, with *... + markers for feedback
        'correct'  => $correct,
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

// ---- Question generation (§6) — with tier-1 fallback if generation fails ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_inter_question($dataByTier, $lvl, $grd, $sessionKey,
                                 $boys, $girls, $surnames, $stopWords);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_inter_question($dataByTier, 'Easy', 0, $sessionKey,
                                         $boys, $girls, $surnames, $stopWords);
        if ($fallback !== null) $_SESSION[$sessionKey]['current'] = $fallback;
    }
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
    $cur       = $result['cur'];
    $sentenceHtml = inter_render_highlighted($cur['sentence']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php inter_box('<div style="width:100%;font-size:17pt;color:#333;line-height:1.65;text-wrap:balance;">' . $sentenceHtml . '</div>', 120); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;">
    The interjection is <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['correct']); ?>'</strong>.
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
    $sentenceHtml = inter_render_plain($q['sentence']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Which word in this sentence is the <span style="color:#CC0066;">interjection</span>?
  </div>
  <?php inter_box('<div style="width:100%;font-size:17pt;color:#333;line-height:1.65;text-wrap:balance;">' . $sentenceHtml . '</div>', 120); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:260px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
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