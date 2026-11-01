<?php
// english/modules/adjectives-adverbs.php
// Adjectives and Adverbs — text-input: type either the adjective or the adverb
// from a sentence that contains one of each.
// 5 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// Easy: grd<=3&#8594;1, 4-6&#8594;2, >=7&#8594;3     (legacy Easy)
// Hard: grd<=3&#8594;3, 4-6&#8594;4, >=7&#8594;5     (legacy Hard; legacy Medium folded in)
// The target (adjective or adverb) is rolled fresh per question.
// Multi-word adverbs trigger the "isn't part of any adverb" clarification
// when the target is the adjective — matches legacy behaviour.
//
// Sentence box width: computed from a greedy word-wrap simulation so the box
// hugs the longest wrapped line rather than always expanding to 480px.

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
$moduleTitle = 'Adjectives and Adverbs';
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

// ---- Tier mapping (§4) ----
function resolve_adjectives_adverbs_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 3) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    if ($grd <= 3) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// ---- Data (§5) — verbatim from legacy; one typo fixed ----
// Format: 'sentence with [adjective] and (adverb)'
// Legacy bug: last tier-5 item used [already] instead of (already) — fixed.
$rawByTier = [
    1 => [
        'I watch [funny] movies (often).',
        'The [fat] boy runs (fast).',
        'The [sick] girl slept (here).',
        'The [big] fish swam (away).',
        'The [new] car runs (smoothly).',
        'The [long] snake hissed (twice).',
        'The [chubby] puppy snores (loudly).',
        '{name} (rarely) eats [fresh] fruits.',
        'Lassie has (never) chased [our] cat.',
        '{girl} (quickly) finished [her] test.',
        'The boy (meekly) obeyed [his] sister.',
        'I found the [dirty] shoes (there).',
        'He will (soon) be [their] king.',
        '{girl} (sometimes) thinks I\'m [funny].',
        '{boy} (really) believes he\'s [smart].',
        'She (often) buys [that] cake.',
        '[My] phone costs (more) than hers.',
        'The [white] bunny hopped (quietly).',
        'The [brown] snail crawled (slowly).',
        'The [happy] crowd cheered (wildly).',
        'The [tall] player can play (well).',
        '[My] dog bit the robber (hard).',
        'I earned [some] cash (today).',
        '[Our] food is (almost) gone.',
        'I will use [my] gadget (here).',
    ],
    2 => [
        '{name} kicked the [yellow] ball (upwards).',
        'I (sometimes) show her [my] paintings.',
        'We (often) go to [that] history museum.',
        'They (never) talk about [that] incident.',
        'She should wash the [dirty] bottles (well).',
        'Please recite a [longer] poem (tomorrow).',
        'Please deliver [these] products (there).',
        'Replace the battery of [your] camera (now).',
        'They can clean [their] house (together).',
        'The [naughty] monkey threw the toy (outside)!',
        'The [nasty] dog chased the cat (again).',
        'The [large] turkey is sitting (there).',
        '{name} watches [two] movies (every day).',
        'The [old] car will be repaired (soon).',
        '{name} will buy a [new] car (next year).',
        'The [hardy] weeds will survive (anywhere).',
        '[Their] shoe factory was built (overseas).',
        '[This] water plant can thrive (indoors).',
        '{name} watched [ten] concerts (last year).',
        'She drank [four] cups of coffee (today).',
        '{name} (really) thinks that I am [correct].',
        '[Our] teacher explained the lesson (clearly).',
        'I have been on a [special] diet (since 2009).',
        'The [energetic] toddler is walking (forward).',
        '{name} (eagerly) told us the [good] news.',
    ],
    3 => [
        'They (often) go to [that] theater to watch a movie.',
        'We (usually) bring [some] food when we visit her.',
        '{name} would (never) eat anything that is [peppery].',
        'The ducklings followed [their] mother (closely).',
        '{boy} is [healthy] because he exercises (daily).',
        '{girl} ate [several] slices of pizza (yesterday).',
        '{name} will watch a [frightening] movie (tonight).',
        'The athletes who visited us are (very) [tall].',
        'The [young] boy won the marathon race (this year).',
        'The children asked for [some] candy (yesterday).',
        '{name} (already) knows the title of [that] movie.',
        '[Which] library do the students (usually) go to?',
        '(Just) watch the baby so I can do [more] chores.',
        'We would love to visit [our] relatives (one day).',
        'The audience (soon) gave her a [thundering] applause.',
        'The men rowed (backwards) to make an [immediate] turn.',
        '{boy} and {girl} (just) announced the [delightful] news.',
        'She might like [some] popcorn while waiting (inside).',
        'Do you know that [our] principal has (just) retired?',
        'The [talented] performer sang the song (flawlessly).',
        '{name} (easily) answered the [difficult] questions.',
        'Hang the [flashy] clock (up there) so we can see it.',
    ],
    4 => [
        'The yacht sailed (homewards) after the [sumptuous] feast.',
        'Are [those] laptops and tablets being repaired (again)?',
        '[Which] motorcycle did {boy} and {girl} use (last night)?',
        'The children (gleefully) watched the [playful] lion cubs.',
        '{girl} (reluctantly) handed the [old] photographs to {boy}.',
        'My uncle is planning to buy [more] farmlands (this year).',
        'The anaconda (eventually) caught its [unsuspecting] prey.',
        'The [appreciative] citizens thanked the leader (profusely).',
        'I would (never) send them a gift that they might find [offensive].',
        'Let\'s transfer the [wooden] desks and cabinets (upstairs).',
        'The repairman should inspect [this] refrigerator (carefully).',
        '[Those] children peddle snacks and beverages (every day).',
        'The secretary bought a bag and [three] umbrellas (this afternoon).',
        'The hunter (cautiously) approached the [unpredictable] predator.',
        'The television that we\'ve (always) wanted to buy is [gone].',
        'You and {name} must spearhead [this] marketing campaign (over there).',
        'My friends saw the [gigantic] gorilla sleeping (peacefully).',
        'The policemen (subsequently) apprehended the [despicable] fugitive.',
        'The [clueless] victims (suddenly) found themselves in a quagmire.',
    ],
    5 => [
        'Are you saying that Mr. {surname} conducted [his] experiments (in here)?',
        'The name of the archaeologist who\'ll visit us (next week) is [familiar].',
        'The engineer in their department has a (far) [better] solution to offer.',
        'You should (thoroughly) wash [these] vegetables before you consume them.',
        'The restaurant\'s chef concocted an [alternative] recipe (effortlessly).',
        'The [undernourished] schoolgirl ate the chicken and spaghetti (quickly).',
        '{boy} (immediately) reported the disturbance to [their] barangay captain.',
        '[Which] waiter is assigned to serve the wedding cake to the guests (tonight)?',
        'You must submit [your] report to the engineering manager (this afternoon).',
        'The engineer (enthusiastically) explained the [promising] results of the project.',
        'The [eccentric] engineer submits a patent application (every thirty days).',
        'The construction company demolished the [dilapidated] huts and shanties (there).',
        'The philanthropist will donate [more] clothes and shoes to orphans (tomorrow).',
        'The officers have been harboring doubts about [his] competence (since last month).',
        'The [soft-spoken] congresswoman was (utterly) flabbergasted when he threw a tantrum.',
        'The chief executive officer is (heavily) involved in that [unusual] experiment.',
        'The lawyer found [several] loopholes in the law that he can (certainly) exploit.',
        'The [inexperienced] industrial engineers summarized the technical reports (haphazardly).',
        '[That] group of environmentalists is planning to launch a reforestation project (somewhere).',
        'The physicist\'s [controversial] theory has (already) been confirmed by scientists in Asia.',
    ],
];

// ---- Name pools ----
$boysNames = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles','Christopher','Daniel',
    'David','Diego','Dominic','Gabriel','Ian','Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan',
    'Joseph','Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver',
    'Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girlsNames = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn',
    'Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria',
    'Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];
$surnames = ['Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales','Martinez','Mendez','Paredes','Revilla','Santos','Tolentino'];

// ---- Pre-parse (§5.1) ----
function parse_aa_item(string $raw): ?array {
    if (!preg_match('/\[([^\]]+)\]/u', $raw, $adjMatch)) return null;
    if (!preg_match('/\(([^)]+)\)/u', $raw, $advMatch)) return null;
    $sentence = str_replace(['[', ']', '(', ')'], '', $raw);
    if ($sentence === '') return null;
    return [
        'sentence'  => $sentence,
        'adjective' => $adjMatch[1],
        'adverb'    => $advMatch[1],
    ];
}

$items = [];
foreach ($rawByTier as $tier => $rawList) {
    $items[$tier] = [];
    foreach ($rawList as $raw) {
        $p = parse_aa_item($raw);
        if ($p !== null) $items[$tier][] = $p;
    }
}

// ---- Helpers (§8.4, §8.6) ----
// Compute a snug box width by simulating where the browser would wrap the
// text at maxWidthPx, then sizing to the longest resulting line. Falls back
// to minWidthPx for very short content.
function aa_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 200): int {
    // Arial 16pt &#8776; 10px per average character (mixed-case English with spaces)
    $charPx          = 10;
    $horizontalSpace = 40;  // 2 * padding 16 + 2 * border 2
    $plain           = trim(strip_tags($html));
    if ($plain === '') return $minWidthPx;

    $availablePx  = $maxWidthPx - $horizontalSpace;
    $charsPerLine = max(1, (int)floor($availablePx / $charPx));

    // Greedy word-wrap simulation — mirrors how the browser fills a line
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

function aa_box(string $html, int $minHeight = 60, int $widthPx = 0): void {
    $sizing = ($widthPx > 0)
        ? 'width:' . $widthPx . 'px;max-width:100%;'
        : 'max-width:480px;';
    echo '<div style="' . $sizing
       . 'min-height:' . $minHeight . 'px;'
       . 'margin:16px auto 10px;padding:10px 16px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function aa_apply_names(string $template, array $names): string {
    return str_replace(
        ['{boy}', '{girl}', '{name}', '{surname}'],
        [$names['boy'], $names['girl'], $names['name'], $names['surname']],
        $template
    );
}

function aa_highlight_answer(string $sentence, string $answer): string {
    $esc    = htmlspecialchars($sentence);
    $ansEsc = preg_quote(htmlspecialchars($answer), '/');
    return preg_replace(
        '/\b' . $ansEsc . '\b/iu',
        '<strong style="color:#CC0066;">$0</strong>',
        $esc,
        1
    );
}

// ---- No-repeat picker (§6.2) ----
function pick_aa_item(array $pool, string $sessionKey, int $tier): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        if (!in_array("t$tier:$i", $used, true)) $available[$i] = $item;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        foreach ($pool as $i => $item) $available[$i] = $item;
    }
    $idx    = array_rand($available);
    $item   = $available[$idx];
    $used[] = "t$tier:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return $item;
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $userRaw = (string)($_POST['answer'] ?? '');
    $userAns = strtolower(trim($userRaw));
    $isCorrect = ($userAns === strtolower($cur['answer']));

    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer(
        $isCorrect ? $cur['answer'] : $userAns,
        $cur['answer'],
        $cur['lvl']
    );

    $result = ['correct' => $isCorrect, 'user' => $userAns, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $tier = resolve_adjectives_adverbs_tier($lvl, $grd);
    $pool = $items[$tier] ?? $items[1];
    if (empty($pool)) $pool = $items[1] ?? [];
    $item = pick_aa_item($pool, $sessionKey, $tier);

    // Roll fresh names per question
    $names = [
        'boy'     => $boysNames[array_rand($boysNames)],
        'girl'    => $girlsNames[array_rand($girlsNames)],
        'surname' => $surnames[array_rand($surnames)],
    ];
    $names['name'] = (rand(1, 2) === 1) ? $names['boy'] : $names['girl'];

    $sentence = aa_apply_names($item['sentence'], $names);

    // Roll target: adjective or adverb
    $target = (rand(1, 2) === 1) ? 'adjective' : 'adverb';
    $answer = ($target === 'adjective') ? $item['adjective'] : $item['adverb'];

    // Special case: multi-word adverb when target is adjective
    $multiWordAdv = (strpos($item['adverb'], ' ') !== false);
    $disambiguation = ($target === 'adjective' && $multiWordAdv);

    $_SESSION[$sessionKey]['current'] = [
        'sentence'       => $sentence,
        'target'         => $target,
        'answer'         => $answer,
        'disambiguation' => $disambiguation,
        'lvl'            => $lvl,
        'tier'           => $tier,
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur        = $result['cur'];
    $targetEsc  = htmlspecialchars($cur['target']);
    $answerEsc  = htmlspecialchars($cur['answer']);
    $sentenceHi = aa_highlight_answer($cur['sentence'], $cur['answer']);
    $explanation = $cur['disambiguation']
        ? "The adjective in this sentence that isn't part of any adverb is '<strong style=\"color:#CC0066;\">{$answerEsc}</strong>'."
        : "The {$targetEsc} in this sentence is '<strong style=\"color:#CC0066;\">{$answerEsc}</strong>'.";

    $sentenceHtmlF = '<div style="font-size:16pt;color:#333;line-height:1.55;">'
                   . $sentenceHi
                   . '</div>';
    $boxWF = aa_compute_width($sentenceHi);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['user']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php aa_box($sentenceHtmlF, 60, $boxWF); ?>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;text-wrap:balance;">
    <?php echo $explanation; ?>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
    $targetEsc   = htmlspecialchars($q['target']);
    $prompt      = $q['disambiguation']
        ? "The adjective in this sentence that isn't part of any adverb is:"
        : "The {$targetEsc} in this sentence is:";
    $ansLen       = strlen($q['answer']);
    $maxLen       = $ansLen + 6;
    $inputWidthPx = max(180, $ansLen * 16 + 24);

    $sentenceHtmlQ = '<div style="font-size:16pt;color:#333;line-height:1.55;">'
                   . $sentenceEsc
                   . '</div>';
    $boxWQ = aa_compute_width($sentenceEsc);
?>
  <div style="margin:20px auto 10px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:520px;text-wrap:balance;">
    Read the sentence, then type the <span style="color:#CC0066;"><?php echo $targetEsc; ?></span> below.
  </div>
  <?php aa_box($sentenceHtmlQ, 60, $boxWQ); ?>
  <div style="margin:20px auto 10px;font-family:Arial,sans-serif;font-size:14pt;font-weight:600;color:#333;max-width:480px;text-wrap:balance;">
    <?php echo htmlspecialchars($prompt); ?>
  </div>
  <div style="margin:14px 0 8px;">
    <input type="text" name="answer"
           size="<?php echo $ansLen + 2; ?>"
           maxlength="<?php echo $maxLen; ?>"
           autofocus autocomplete="off" autocapitalize="off" autocorrect="off"
           style="display:inline-block;text-align:center;height:52px;font-family:Arial,sans-serif;font-size:26px;font-weight:700;text-transform:lowercase;border:2px solid #888888;border-radius:8px;padding:4px 12px;width:<?php echo $inputWidthPx; ?>px;box-sizing:border-box;">
  </div>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit1" value=" Submit " style="margin-right:12px;font-family:Arial,sans-serif;font-size:11pt;">
    <input type="submit" name="Submit2" value=" New Question " style="margin-left:12px;font-family:Arial,sans-serif;font-size:11pt;">
  </div>
<?php endif; ?>
  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
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