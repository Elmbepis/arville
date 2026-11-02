<?php
// english/modules/verbs-link-aux.php
// Linking and Helping/Auxiliary Verbs — identify whether the highlighted verb
// in a phrase is a linking verb or a helping/auxiliary verb.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 2 M/C choices (1×2 grid).

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
function resolve_vla_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

function vla_labels(int $tier): array {
    if ($tier <= 2) {
        return [
            'aux_display' => 'Helping Verb',
            'aux_lower'   => 'helping verb',
            'aux_article' => 'a',
            'prompt_aux'  => 'a helping verb',
        ];
    }
    return [
        'aux_display' => 'Auxiliary Verb',
        'aux_lower'   => 'auxiliary verb',
        'aux_article' => 'an',
        'prompt_aux'  => 'an auxiliary verb',
    ];
}

// ---- Data (§5) — verbatim from legacy, 1 typo fix, {name} placeholders ----
$rawDataByTier = [
    1 => [
        'auxs' => [
            "*am+ [baking] a cake","*am+ [playing] games","*am+ [planting] vegetables",
            "*are+ [moving] very fast","*are+ [playing] loud music","*are+ [cleaning] the garden",
            "*is+ [waxing] the car","*is+ [chasing] mice","*is+ [reading] aloud",
            "*is+ [eating] fruits","*is+ [carrying] the basket","*was+ [playing] with toys",
            "*was+ [spinning] like a top","*was+ [singing] at the party","*was+ [asking] a question",
            "*were+ [rolling] on the floor","*were+ [laughing] at the joke","*were+ [passing] balls",
            "*were+ [checking] the wheels",
        ],
        'links' => [
            "*am not+ a nerd","*am+ a cashier there","*am+ their math teacher",
            "*is+ a good student of","*is+ her new pupil in","*is+ an old fisherman who",
            "*is+ a hardworking janitor","*is+ a charming waitress at","*isn't+ a real magician",
            "*are+ really brave firemen","*are+ very skillful jugglers","*are+ two seafarers with",
            "*are+ our new housekeepers","*was+ my favorite chef","*was+ a great movie director",
            "*was+ a dedicated policeman","*was+ his weight trainer","*wasn't+ the welder who",
            "*were+ basketball players","*were+ the musicians who","*were+ brilliant lawyers too",
            "*were+ licensed plumbers","*were+ very loyal soldiers","*will be+ a good librarian",
            "*will be+ a famous actress","*seems+ very friendly too","*looks+ familiar to us",
            "*smells+ delicious and",
        ],
    ],
    2 => [
        'auxs' => [
            "*am+ [feeding] the hungry chickens","*am+ [teaching] them patiently",
            "*am+ [watching] that new movie","*are+ [wearing] goggles while",
            "*are+ [restoring] the vintage car","*are+ [transporting] the parts",
            "*are+ [racing] to get back home","*didn't+ [come] to his party",
            "*is+ [baking] that wedding cake","*is+ [donating] money to the",
            "*is+ [writing] about his life","*is+ [composing] songs for her",
            "*is+ [taking] them to the airport","*was+ [looking] at the tornado",
            "*was+ [lying] on my wooden desk","*were+ [flying] away from the",
            "*were+ [rotating] very fast with",
        ],
        'links' => [
            "*became+ his best friend when they","*is+ definitely a pet lover who",
            "*is+ an impressive bartender here","*is+ the most diligent student in",
            "*isn't+ an ordinary hairstylist","*could be+ the main reason for the",
            "*looked+ hilarious in that garb","*seemed+ so relaxed when the melee",
            "*tastes+ awful when mixed with","*was+ their best carpenter then",
            "*was+ an honor student years ago","*was+ the private detective who",
            "*were+ very industrious draftsmen","*were+ major sponsors of that event",
            "*will be+ a famous comedian someday",
        ],
    ],
    3 => [
        'auxs' => [
            "*am+ [giving] this anniversary gift","*am+ [performing] a magic trick for",
            "*are+ [landing] perfectly on the","*are+ [meeting] with the new senator",
            "*are+ [taking] difficult tests on","*are+ [keeping] photographs of the",
            "*didn't+ [appreciate] his corny jokes","*doesn't+ [go] to the movies if he",
            "*has+ [convicted] many hardened criminals","*is+ [running] on gas or electricity",
            "*is+ [inspecting] the metal canister","*is+ [doing] more harm than good",
            "*is+ carefully [analyzing] this issue","*is+ [going] to be upset when she",
            "*was+ [hiding] behind the curtains","*were+ [flying] in a strange pattern",
            "*were+ [rescuing] old people from",
        ],
        'links' => [
            "*am not+ the right person to manage the","*became+ the fearless leader of their",
            "*couldn't have been+ responsible for the","*hasn't been+ as enthusiastic as their",
            "*is+ one of the designated areas for","*is+ a place where athletes can try to",
            "*isn't+ a popular celebrity anymore","*looked+ terrible after going through a",
            "*must be+ present at the coliseum when","*seems+ uninterested in what I'm doing",
            "*seemed+ strange for someone like {name}","*smelled+ fantastic even without perfume",
            "*was+ a film director and screenwriter","*was+ the rhythm guitarist of their",
            "*wasn't+ the real reason why they had a","*weren't+ acceptable to the citizens of",
            "*won't be+ the only option available to",
        ],
    ],
    4 => [
        'auxs' => [
            "*am+ now [calibrating] that measuring equipment",
            "*am+ [addressing] a few problems with her",
            "*are+ [rehabilitating] the misguided minors",
            "*are+ strictly [enforcing] the laws of the city",
            "*is+ [preparing] lunch that smells delicious",
            "*has+ always [wanted] to try skydiving and",
            "*has been+ [making] unreasonable judgments",
            "*had been+ [appeasing] the irate citizens",
            "*was+ [filling] the room with antique ornaments",
            "*was+ [arguing] with those security officers",
            "*was+ [downloading] videos via the internet",
            "*was+ [threatening] the townspeople during",
            "*were+ [operating] with inadequate training",
            "*were+ [distilling] the unidentified solution",
            "*will be+ [decorating] their own wedding cake",
            "*will be+ [upgrading] its technological features",
        ],
        'links' => [
            "*is+ very belligerent towards his critics",
            "*is+ a world-renowned theoretical physicist",
            "*are+ truly circumspect and meticulous in",
            "*could have been+ the best president in their",
            "*had been+ such a passionate conservationist",
            "*has been+ a geophysicist in that oil company",
            "*had become+ his protege as soon as they met",
            "*looked+ hideous and repulsive according to",
            "*seemed+ reluctant to cooperate with the mayor",
            "*wasn't+ just a bartender, but also a chef",
            "*wasn't+ the firefighter who responded to her",
            "*will be+ their company's resident veterinarian",
            "*weren't+ the security guards assigned to the",
            "*would have been+ a great airplane pilot if",
            "*shouldn't have been+ the designated playmaker",
        ],
    ],
    5 => [
        'auxs' => [
            "*are+ currently [developing] strategies for economic progress",
            "*could have+ easily [jeopardized] the platoon's mission in the",
            "*doesn't+ actually [encourage] the victims to violate the",
            "*has+ just [confirmed] the veracity of their technical report",
            "*has been+ [making] many irrational business decisions lately",
            "*have not+ [accomplished] any of their goals this month due to",
            "*have+ eventually [converged] into a single distinct species",
            "*might be+ secretly [interfering] with the output signals of",
            "*shall not+ [institutionalize] systems that corrupt the",
            "*should have+ [modified] those interlocking mechanisms and",
            "*were being+ [persecuted] for their beliefs during that period",
            "*will be+ [communicating] with high-end digital gadgets to",
            "*would not+ [alleviate] the discomfort of arthritis and",
        ],
        'links' => [
            "*appeared+ inconsolable and overcome with grief when she",
            "*became+ adamant in his belief that violence must not",
            "*can become+ a real threat to the economy of the emerging",
            "*could have been+ our representative in that competition",
            "*has been+ their magazine's sports editor since their",
            "*has become+ the latest craze among millenials like {name}",
            "*have been+ their only remaining source of revenue since they",
            "*might have been+ an astute mathematician like his father",
            "*might seem+ very unusual under the existing circumstances",
            "*should have been+ the hospital's chief neurologist because",
            "*will have been+ an engineering graduate already by the time he",
            "*will become+ their province's primary commercial hub if",
            "*wouldn't be+ a political activist if it were not for the",
        ],
    ],
];

$boys  = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles',
    'Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac','Jack',
    'Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan','Kevin',
    'Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver',
    'Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girls = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline',
    'Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah','Isabella','Jasmine',
    'Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia',
    'Madeline','Maria','Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha',
    'Sarah','Sophia','Stella','Tina','Victoria'];

// ---- Parsers (§5.1) ----
function vla_parse_aux(string $raw): array {
    $star  = strpos($raw, '*');
    $plus  = strpos($raw, '+');
    $open  = strpos($raw, '[');
    $close = strpos($raw, ']');
    if ($star === false || $plus === false || $open === false || $close === false) {
        return ['aux' => $raw, 'middle' => '', 'mainverb' => '', 'after' => ''];
    }
    return [
        'aux'      => substr($raw, $star + 1, $plus - $star - 1),
        'middle'   => trim(substr($raw, $plus + 1, $open - $plus - 1)),
        'mainverb' => substr($raw, $open + 1, $close - $open - 1),
        'after'    => trim(substr($raw, $close + 1)),
    ];
}

function vla_parse_link(string $raw): array {
    $star = strpos($raw, '*');
    $plus = strpos($raw, '+');
    if ($star === false || $plus === false) {
        return ['link' => $raw, 'rest' => ''];
    }
    return [
        'link' => substr($raw, $star + 1, $plus - $star - 1),
        'rest' => trim(substr($raw, $plus + 1)),
    ];
}

// ---- Render helpers (§8.2 target = #CC0066) ----
function vla_render_aux(array $p): string {
    $html = '<strong style="color:#CC0066;">' . htmlspecialchars($p['aux']) . '</strong>';
    $parts = [];
    if (($p['middle'] ?? '')   !== '') $parts[] = htmlspecialchars($p['middle']);
    if (($p['mainverb'] ?? '') !== '') $parts[] = htmlspecialchars($p['mainverb']);
    if (($p['after'] ?? '')    !== '') $parts[] = htmlspecialchars($p['after']);
    return $html . (count($parts) ? ' ' . implode(' ', $parts) : '');
}

function vla_render_link(array $p): string {
    $html = '<strong style="color:#CC0066;">' . htmlspecialchars($p['link']) . '</strong>';
    $rest = $p['rest'] ?? '';
    return $html . ($rest !== '' ? ' ' . htmlspecialchars($rest) : '');
}

function vla_box(string $html, int $minHeight = 120): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- Question generation (§6) ----
function build_vla_question(array $rawDataByTier, string $lvl, int $grd,
                            string $sessionKey, array $boys, array $girls): ?array {
    $tier = resolve_vla_tier($lvl, $grd);
    $tierData = $rawDataByTier[$tier] ?? null;
    if (!$tierData) return null;

    $form = rand(1, 2);
    if ($form === 1) { $pool = $tierData['auxs'];  $correct = 'auxiliary verb'; }
    else             { $pool = $tierData['links']; $correct = 'linking verb';   }
    if (empty($pool)) return null;

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $raw) {
        $key = "t$tier:f$form:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:f$form:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($pool as $i => $raw) $available[] = ['key' => "t$tier:f$form:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $name  = (rand(1, 2) === 1) ? $boys[array_rand($boys)] : $girls[array_rand($girls)];
    $raw   = str_replace('{name}', $name, $pool[$pick['idx']]);

    if ($form === 1) {
        $parsed   = vla_parse_aux($raw);
        $mainverb = $parsed['mainverb'];
    } else {
        $parsed   = vla_parse_link($raw);
        $mainverb = '';
    }

    return [
        'form'     => ($form === 1) ? 'aux' : 'link',
        'parsed'   => $parsed,
        'mainverb' => $mainverb,
        'correct'  => $correct,
        'choices'  => ['linking verb', 'auxiliary verb'],
        'tier'     => $tier,
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

// ---- Question generation (§6) — retry if generation ever fails ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_vla_question($rawDataByTier, $lvl, $grd, $sessionKey, $boys, $girls);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        // Fallback to tier 1 if the current tier somehow fails — keeps user unstuck.
        $fallback = build_vla_question($rawDataByTier, 'Easy', 0, $sessionKey, $boys, $girls);
        if ($fallback !== null) $_SESSION[$sessionKey]['current'] = $fallback;
    }
}

// ---- Header / title (tier-driven) ----
$headerTier  = resolve_vla_tier($lvl, $grd);
$moduleTitle = ($headerTier <= 2) ? 'Linking and Helping Verbs' : 'Linking and Auxiliary Verbs';

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
    $labels = vla_labels($cur['tier']);
    $isAux  = ($cur['correct'] === 'auxiliary verb');

    $displayClicked = $result['clicked'];
    if ($cur['tier'] <= 2 && $displayClicked === 'auxiliary verb') {
        $displayClicked = 'helping verb';
    }

    $phraseHtml = ($cur['form'] === 'aux')
        ? vla_render_aux($cur['parsed'])
        : vla_render_link($cur['parsed']);

    // FIXED: '<strong style="color:#CC0066;">\'' is a well-formed opening tag
    // followed by an escaped single quote. The previous '<strong style="...
    // ;\'>\'' inserted a stray quote inside the style attribute, leaving the
    // '"' unterminated and causing the browser to swallow the following
    // <input type="submit" name="Submit2" ...> element.
    if ($isAux) {
        $explain = 'The highlighted part of this phrase is '
                 . $labels['aux_article'] . ' '
                 . '<strong style="color:#CC0066;">' . $labels['aux_lower'] . '</strong>'
                 . ' because it is used to indicate the tense (and other properties) '
                 . 'of the main verb, '
                 . '<strong style="color:#CC0066;">\''
                 . htmlspecialchars($cur['mainverb'])
                 . '\'</strong>.';
    } else {
        $explain = 'The highlighted part of this phrase is a '
                 . '<strong style="color:#CC0066;">linking verb</strong> '
                 . 'because it is used to \'link\' the subject to a word or phrase '
                 . 'that describes or provides information about the subject.';
    }
    $phraseLen  = strlen(strip_tags($phraseHtml));
    $phraseFont = ($phraseLen > 45) ? '18pt' : ($phraseLen > 30 ? '20pt' : '22pt');
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($displayClicked); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php vla_box(
      '<div style="width:100%;font-size:' . $phraseFont . ';color:#333;line-height:1.55;">'
    . $phraseHtml
    . '</div>', 120
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    <?php echo $explain; ?>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null) {
        // Defensive: even with no question, render New Question so user can retry.
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto 20px;max-width:480px;">
    No question could be generated. Please try again.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php
    } else {
        $labels = vla_labels($q['tier']);
        $phraseHtml = ($q['form'] === 'aux')
            ? vla_render_aux($q['parsed'])
            : vla_render_link($q['parsed']);
        $phraseLen  = strlen(strip_tags($phraseHtml));
        $phraseFont = ($phraseLen > 45) ? '18pt' : ($phraseLen > 30 ? '20pt' : '22pt');
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Is the <span style="color:#CC0066;">highlighted</span> part of this phrase
    a <span style="color:#0000CC;">linking verb</span> or
    <span style="color:#0000CC;"><?php echo htmlspecialchars($labels['prompt_aux']); ?></span>?
  </div>
  <?php vla_box(
      '<div style="width:100%;font-size:' . $phraseFont . ';color:#333;line-height:1.55;">'
    . $phraseHtml
    . '</div>', 120
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
    <tr>
    <?php foreach ($q['choices'] as $c):
        $displayLabel = ($c === 'auxiliary verb') ? $labels['aux_display'] : 'Linking Verb';
    ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:190px;max-width:260px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:17pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($displayLabel); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php
    }
endif;
?>

<!-- Difficulty radios (§10.4 — Easy / Hard only) -->
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