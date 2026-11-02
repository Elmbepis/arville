<?php
// english/modules/verbs-dyn-stat.php
// Action and Non-Action Verbs — identify whether the highlighted verb in a
// phrase is dynamic (action) or stative (non-action).
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 2 M/C choices (1×2 grid).
//
// Naming: tiers 1–2 label the categories "action verb" / "non-action verb";
// tiers 3–5 label them "dynamic verb" / "stative verb". The canonical answer
// carried in ?ansclick= is always 'action verb' / 'non-action verb' — display
// labels switch by tier at render time (legacy did the same via $ansclicked0).
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the phrase box.

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
$moduleTitle = 'Action and Non-Action Verbs';
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
function resolve_vds_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    // Hard — legacy Hard formula (harder of Medium/Hard)
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// Tier-aware labels — canonical answers always 'action verb' / 'non-action verb'.
function vds_labels(int $tier): array {
    if ($tier <= 2) {
        return [
            'action_display'    => 'Action Verb',
            'nonaction_display' => 'Non-Action Verb',
            'action_lower'      => 'action verb',
            'nonaction_lower'   => 'non-action verb',
            'because_action'    => 'it is used to denote the action of the subject',
            'because_state'     => 'it is used to denote the state of the subject',
        ];
    }
    return [
        'action_display'    => 'Dynamic Verb',
        'nonaction_display' => 'Stative Verb',
        'action_lower'      => 'dynamic verb',
        'nonaction_lower'   => 'stative verb',
        'because_action'    => 'it is used to denote the action of the subject',
        'because_state'     => 'it is used to denote the state of the subject',
    ];
}

// ---- Data (§5) — verbatim from legacy (first word of each phrase = the verb) ----
$dataByTier = [
    1 => [
        'action' => [
            'waxes the car','bakes that cake','rolls on the floor','playing with toys',
            'carries the basket','moving very fast','laughs at the joke','spins like a top',
            'cleans the garden','checks the wheels','plays loud music','passes balls',
            'chases mice','reads aloud','sings at the party','plays games','eats fruits',
            'plants vegetables','asked to be left alone','runs to the park',
            'walks without shoes','shouted the words',
        ],
        'state' => [
            'is really beautiful','looks very friendly','looked confused','was quite unhappy',
            'is a bit surprised','agrees with him','agrees with that','believes him',
            'believes the myth','have a black car','have a new pet','has three books',
            'belonged to him','belongs to the church','consists of water and','contains toys',
            'disagrees with her','dislikes snakes','doubts his story','doubts himself',
            'costs a lot of money','smells delicious','feels very smooth','feels a bit slimy',
            'sounds great to me','fears spiders','smells really awful','hates noisy pets',
            'loves funny movies','likes cute puppies',
        ],
    ],
    2 => [
        'action' => [
            'restores the car','bakes that wedding cake','wears goggles while','flies away from',
            'donates to charity','gives an anniversary gift','transports those','flies in a pattern',
            'races to get home','looks at the tornado','teaches patiently','watches the movie',
            'composes songs for her','writes about his life','lands swiftly',
            'fills it with antique ornaments','inspects the metal canister','storing solar energy',
            'meets with the senator','rotating fast','hides behind the curtains',
            'solves her problems','reviews for a test','taking difficult tests',
            'rescuing old ladies','taking photographs of','performs a magic trick',
            'does more harm than good',
        ],
        'state' => [
            'is quite attractive','looks very reasonable','looked somewhat perplexed',
            'was indeed excited','is a bit annoying','agrees with the group',
            'believe the amazing story','has a housekeeper','belonged to their neighbor',
            'belongs to that association','concerns all of us','consists of gravel and sand',
            'contains all his clothes','depends on many factors','deserves to win the award',
            'deserves to be punished','disagrees with the decision','dislikes being teased',
            'doubts that statement','depends on the weather','deserves to win',
            'exists deep in the forest','cost thousands of dollars','possess vital secrets',
            'remembers everything',
        ],
    ],
    3 => [
        'action' => [
            'restored the vintage car','decorates that wedding cake',
            'enforces the laws of the city','upgrades the technological features',
            'demanded unreasonable changes','modifies these mechanisms','reasons without logic',
            'appeases the irate citizens','operates with inadequate knowledge',
            'threatens the townspeople','preparing lunch that smells delicious',
            'convicts many criminals','analyzes the existing data',
            'traversed the dark tunnel','accumulated enough evidence',
            'vandalized the colorful mural',
        ],
        'state' => [
            'is quite obnoxious','looks very appealing','looked too exhausted',
            'was really inconsiderate','is extremely repulsive','appears to be reluctant',
            'seem to lack some discipline','appear to be headed to victory',
            'seemed incompetent and irresponsible','agrees with their suggestion',
            'believe the incredible report','believes in paranormal entities',
            'has an elegant mansion','belongs to the local government',
            'concerns the entire department','consists of sweeteners and carbohydrates',
            'contains nothing but acrylic paint','depends on the situation',
            'deserves that recognition','disagrees with the consensus',
            'dislikes corrupt government officials',
            'doubts that the prediction will come true',
            'deems the action to be necessary','expected a better offer from',
            'possesses valuable knowledge','exists independently of',
            'cost a million dollars more','loathes foul-smelling places',
        ],
    ],
    4 => [
        'action' => [
            'communicates using pricey digital gadgets','downloads videos via the internet',
            'develops ideas for economic progress','analyzed the published technical report',
            'distills the saline solution','rehabilitated the misguided youth',
            'arbitrate in such legal disputes','calibrates the digital thermometer',
            'tranquilized the agitated rhinoceros','scampered like an overgrown donkey',
            'burglarized the abandoned mansion','cauterized the infected wound',
            'concatenated the words together','miniaturized the power module',
            'deoxygenates the smallest chamber','assimilate the new immigrants',
        ],
        'state' => [
            'is very belligerent towards us','are circumspect and meticulous',
            'looking totally calamitous','was avaricious in every manner',
            'is utterly insensitive and repugnant','appear to lack conscientiousness',
            'seems refreshing yet unorthodox','appears to be disintegrating quickly',
            'understands the gravity of the situation',
            'conceive the meaning of his explanation',
            'suspects that something horrible is','realizes how vulnerable they are',
            'expects the negotiation to be easy',
            'deems the compromise to be fair to',
            'presumes that the project is still ongoing',
            'imagines a utopic future for their city',
            'considers his suggestion preposterous',
            'perceives their opponents to be undefeatable',
            'abhors dealing with corrupt politicians',
        ],
    ],
    5 => [
        'action' => [
            'accentuated the product\'s salient features',
            'attenuated the transmitter\'s output signals',
            'elucidates the complex concept',
            'obfuscate the major issues being discussed',
            'exacerbates the problematic situation',
            'embellished his earlier statements with',
            'bifurcated into two narrower channels',
            'synthesizes those inorganic chemicals',
            'oscillates between the opposite peaks',
            'interpellating the neophyte senator',
            'bureaucratize the nation\'s health system',
            'transmogrified into a grotesque flying creature',
            'gesticulated to get the guard\'s attention',
            'extrapolate their total sales for next year',
            'demodulates the upstream frequencies',
        ],
        'state' => [
            'is both omnipresent and omniscient','were either petrified or ossified',
            'looked ludicrous wearing that attire',
            'are reminiscent of the city\'s glory days',
            'seemed extremely cantankerous that moment',
            'appears extemporaneous yet purposeful',
            'envisions a prosperous future for all of them',
            'expected the judge\'s ruling to be unprejudiced',
            'perceived their efforts to be lackadaisical',
            'comprehends the implications of that decision',
            'deems the concession to be justifiable',
            'apprehended the confusing details of the theory',
            'concedes that your new hypothesis is better',
            'embodies the true meaning of patriotism',
            'considers him to be their best paleontologist',
        ],
    ],
];

// ---- Helpers (§8.4, §8.6) ----
function vds_phrase_box(string $html, int $minHeight = 120): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function vds_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// Render a phrase with the leading verb highlighted pink; rest normal.
function vds_render_phrase(string $phrase): string {
    $parts = explode(' ', $phrase, 2);
    $verb = $parts[0];
    $rest = $parts[1] ?? '';
    $html = '<strong style="color:#CC0066;">' . htmlspecialchars($verb) . '</strong>';
    if ($rest !== '') $html .= ' ' . vds_bind_last_words($rest);
    return $html;
}

// ---- Question generation (§6) ----
function build_vds_question(array $dataByTier, string $lvl, int $grd, string $sessionKey): ?array {
    $tier = resolve_vds_tier($lvl, $grd);
    $tierData = $dataByTier[$tier] ?? null;
    if (!$tierData) return null;

    // Roll question form: 1 = action-verb phrase (correct = action verb),
    //                     2 = state-verb phrase  (correct = non-action verb).
    $form = rand(1, 2);
    if ($form === 1) {
        $pool    = $tierData['action'];
        $correct = 'action verb';
    } else {
        $pool    = $tierData['state'];
        $correct = 'non-action verb';
    }

    // No-repeat keyed per (tier, form, index)
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $phrase) {
        $key = "t$tier:f$form:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:f$form:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($pool as $i => $phrase) $available[] = ['key' => "t$tier:f$form:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $phrase = $pool[$pick['idx']];

    // Canonical choices — always 'action verb' / 'non-action verb' (URL params).
    $choices = ['action verb', 'non-action verb'];
    shuffle($choices);

    return [
        'phrase'  => $phrase,
        'correct' => $correct,
        'choices' => $choices,
        'tier'    => $tier,
        'lvl'     => $lvl,
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

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_vds_question($dataByTier, $lvl, $grd, $sessionKey);
    if ($newQ !== null) $_SESSION[$sessionKey]['current'] = $newQ;
}

// ---- Render (§8, §9, §10) ----
$headerTier = resolve_vds_tier($lvl, $grd);
$moduleTitleResolved = ($headerTier <= 2)
    ? 'Action and Non-Action<br/>Verbs'
    : 'Dynamic (Action) and Stative<br/>(Non-Action) Verbs';

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
render_header($moduleTitleResolved.' - Grade '.$grd.' - '.$lvl,
              $moduleTitleResolved.' - Grade '.$grd.' - '.$lvl,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $labels = vds_labels($cur['tier']);
    // Map canonical answer to tier-appropriate display form.
    $displayClicked = $result['clicked'];
    if ($cur['tier'] > 2) {
        if ($displayClicked === 'action verb')      $displayClicked = 'dynamic verb';
        elseif ($displayClicked === 'non-action verb') $displayClicked = 'stative verb';
    }
    $isAction = ($cur['correct'] === 'action verb');
    $labelVerb  = $isAction ? $labels['action_lower'] : $labels['nonaction_lower'];
    $because    = $isAction ? $labels['because_action'] : $labels['because_state'];
    $article    = (strtolower(substr($labelVerb, 0, 1)) === 'a') ? 'an' : 'a';

    $fbText  = 'The highlighted verb is ' . $article . ' ';
    $fbHtml  = vds_bind_last_words($fbText)
             . '<strong style="color:#CC0066;font-size:15pt;">' . htmlspecialchars($labelVerb) . '</strong>'
             . ' because ' . htmlspecialchars($because) . '.';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($displayClicked); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php vds_phrase_box('<div style="width:100%;font-size:20pt;color:#333;line-height:1.55;">' . vds_render_phrase($cur['phrase']) . '</div>', 120); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    <?php echo $fbHtml; ?>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null) {
        echo '<p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto;">No question could be generated. Please try again.</p>';
    } else {
        $labels = vds_labels($q['tier']);
        $isActionVerb  = ($q['correct'] === 'action verb');
        $isNonAction   = ($q['correct'] === 'non-action verb');
        // Prompt names both categories with the tier-appropriate labels.
        $promptLeft  = $isActionVerb  ? $labels['action_lower']    : $labels['nonaction_lower'];
        $promptRight = $isActionVerb  ? $labels['nonaction_lower'] : $labels['action_lower'];
        // But legacy prompt always asks the two categories; derive from the
        // tier's canonical pair (not from the current question).
        $tierActionLabel    = ($q['tier'] <= 2) ? 'action verb'    : 'dynamic verb';
        $tierNonactionLabel = ($q['tier'] <= 2) ? 'non-action verb' : 'stative verb';
        $promptArt1 = (strtolower(substr($tierActionLabel, 0, 1)) === 'a') ? 'an' : 'a';
        $promptArt2 = (strtolower(substr($tierNonactionLabel, 0, 1)) === 'a') ? 'an' : 'a';
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Is the <span style="color:#CC0066;">highlighted</span> part of this phrase
    <?php echo $promptArt1; ?> <span style="color:#0000CC;"><?php echo htmlspecialchars($tierActionLabel); ?></span>
    or <?php echo $promptArt2; ?> <span style="color:#0000CC;"><?php echo htmlspecialchars($tierNonactionLabel); ?></span>?
  </div>
  <?php vds_phrase_box('<div style="width:100%;font-size:22pt;color:#333;line-height:1.25;">' . vds_render_phrase($q['phrase']) . '</div>', 120); ?>
  <div style="font-family:Arial,sans-serif;font-size:14pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
    <tr>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode('action verb'); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:190px;max-width:260px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:17pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($labels['action_display']); ?>
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode('non-action verb'); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:190px;max-width:260px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:17pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($labels['nonaction_display']); ?>
        </a>
      </td>
    </tr>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php
    }
endif;
?>

<!-- Difficulty radios (§10.4 — Easy / Hard only) -->
<div align="center" style="margin-top:20px;">
  <p style="margin-bottom:0;color:#000080;font:12pt Arial,sans-serif;">Select difficulty level for next question:</p><table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
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