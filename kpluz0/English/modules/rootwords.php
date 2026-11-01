<?php
// english/modules/rootwords.php
// Root Words — text-input: read a word, write its root (English, Latin, or Greek).
// 6 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// Easy: grd<=3&#8594;1, 4-5&#8594;2, 6-7&#8594;3, >=8&#8594;4     (legacy Easy)
// Hard: grd<=3&#8594;3, 4-5&#8594;4, 6-7&#8594;5, >=8&#8594;6     (legacy Hard; legacy Medium folded in)
// Answer box uses prefix-suffix's editable-box style, sized to the root length.
// Hint box has increased padding to give the target word more breathing room.

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
$moduleTitle = 'Root Words';
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
function resolve_root_words_tier(string $lvl, int $grd): int {
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

// ---- Raw data (§5) — verbatim from legacy ----
// Format: '[G|L]root=1word1 2word2 3word3'
//   'G' prefix &#8594; Greek root
//   'L' prefix &#8594; Latin root
//   no prefix  &#8594; English root
$rawByTier = [
    1 => [
        'build=1builder2building3rebuild',
        'care=1careful2caring3careless',
        'catch=1catches2catcher3catching',
        'do=1doer2doing3undo',
        'even=1uneven2evenly3unevenly',
        'fair=1unfair2fairer3fairest',
        'friend=1befriend2friendly3unfriendly',
        'happy=1unhappy2happier3happiest',
        'help=1helper2helping3helped',
        'joy=1joyful2enjoy3joyous',
        'kind=1unkind2kinder3kindest',
        'like=1dislike2liking3unlike',
        'lead=1leader2leading3mislead',
        'lend=1lender2lending3relend',
        'love=1lovely2unloved3lover',
        'luck=1unlucky2lucky3luckier',
        'move=1moving2unmoved3remove',
        'obey=1disobey2obeyed3obeying',
        'paint=1painter2painted3repaint',
        'read=1reader2reading3misread',
        'rest=1rested2resting3unrest',
        'rob=1robber2robbed3robbing',
        'sad=1sadder2saddest3sadly',
        'speak=1speaker2speaking3speaks',
        'teach=1teacher2teaches3reteach',
        'true=1untrue2truth3truest',
        'use=1using2useless3misuse',
        'wash=1washer2washing3washed',
        'wide=1widen2wider3widest',
    ],
    2 => [
        'color=1recolored2discolored3uncolored',
        'come=1become2becoming3unbecoming',
        'count=1uncountable2miscounted3recounting',
        'do=1undoing2outdoing3overdoing',
        'earth=1unearthed2unearthly3unearthing',
        'friend=1friendless2unfriendliest3befriended',
        'guide=1guidance2unguided3misguided',
        'group=1ungrouped2regrouped3regrouping',
        'happy=1happiness2unhappiness3unhappiest',
        'just=1justice2unjustly3injustice',
        'love=1loveliest2unloving3unlovingly',
        'move=1removable2immovable3movements',
        'mount=1unmounted2dismounted3remounting',
        'pack=1unpacked2repacking3unpacking',
        'pure=1purify2purity3impure',
        'use=1usable2unused3reusing',
        'view=1viewers2reviewed3preview',
        'white=1whitened2whitening3whitener',
        'wide=1widened2widening3unwiden',
        'work=1reworked2overworks3nonworking',
        'worth=1unworthy2worthless3worthily',
        'wrap=1unwrapped2rewrapped3unwrapping',
    ],
    3 => [
        'admire=1admiration2admirable3unadmired',
        'base=1abasement2debasement3subbasement',
        'claim=1disclaimer2proclaimed3reclaiming',
        'color=1bicolored2discoloration3decolorizer',
        'deter=1deterrent2deterrence3undeterred',
        'form=1conformity2deformity3reformation',
        'little=1belittled2littlest3belittling',
        'order=1disorderliness2preordering3misordering',
        'pure=1purifying2impurity3purifier',
        'run=1forerunner2forerunning3overruns',
        'sweet=1unsweetened2presweetened3oversweetened',
        'view=1reviewers2unreviewed3previewing',
        'work=1underworking2overworked3reworkable',
        'worth=1unworthiness2unworthily3worthlessly',
        'Gaer=1aerial2aerate3aerator',
        'Gaero=1aerobic2aerospace3aerosol',
        'Gauto=1automatic2automate3autograph',
        'Ggraph=1autograph2photograph3graphics',
        'Ggeo=1geology2geography3geometry',
        'Lact=1active2action3react',
        'Ldict=1diction2edict3dictionary',
        'Ldict=1dictator2contradict3predict',
        'Ldict=1verdict2dictate3dictum',
    ],
    4 => [
        'Gacro=1acrobat2acrophobia3acronym',
        'Gaero=1aeronaut2aerometer3aerology',
        'Gaero=1aeroduct2aerogel3aerodyne',
        'Garch=1archbishop2matriarch3archenemy',
        'Gbio=1biology2biography3biosphere',
        'Gchron=1chronic2chronicle3chronicler',
        'Ldent=1dentures2dentistry3dentition',
        'Ggraph=1biography2photography3graphically',
        'Ghomo=1homosexual2homogeneous3homonyms',
        'Lact=1activate2interaction3actuate',
        'Lact=1inactive2reactive3transacts',
        'Lagri=1agriculture2agribusiness3agriculturist',
        'Lanim=1animal2animate3animation',
        'Laqua=1aquarium2aquatic3aquaculture',
        'Ldict=1interdict2dictation3prediction',
        'Lex=1excavate2exhale3export',
        'Lgran=1granary2granola3granule',
        'Linfra=1infrastructure2infrared3infraction',
    ],
    5 => [
        'Gacro=1acrogen2acrophobia3acrophobic',
        'Gacro=1acrolith2acrobatics3acrogens',
        'Gaero=1aerobiosis2aerobatic3aeronomists',
        'Gaero=1aerodynamics2aeronautics3aerobatic',
        'Gchron=1chronicity2chronically3chronicling',
        'Gchrono=1chronology2chronometer3chronological',
        'Ghetero=1heterosexual2heterogeneous3heteronyms',
        'Ghomo=1homosexuality2homogeneity3homologous',
        'Lact=1inactivity2interactivity3reactivity',
        'Lact=1reactants2proactive3deactivation',
        'Lact=1actuators2enactment3transaction',
        'Lagri=1agricultural2agrichemicals3agriculturally',
        'Lalg=1neuralgia2analgesic3nostalgia',
        'Lambi=1ambidextrous2ambiguous3ambivalence',
        'Lambul=1ambulance2ambulant3ambulatory',
        'Lanim=1inanimate2magnanimity3equanimity',
        'Lanim=1animatronics2animosity3unanimous',
        'Lcumul=1accumulate2cumulative3accumulation',
        'Ldic=1dedicate2indicate3vindicate',
        'Ldict=1contradiction2indictment3predictability',
        'Ldont=1acrodont2mastodont3periodontist',
        'Lex=1excavators2exhalation3exportation',
        'Lextra=1extraterrestrial2extraordinary3extracurricular',
        'Lextra=1extrapolation2extrajudicial3extrasensory',
        'Lextra=1extramarital2extracellular3extravagance',
        'Linfra=1infrastructural2infrasonic3infrahuman',
        'Llingu=1linguistic2multilingual3sublingual',
    ],
    6 => [
        'Lact=1counteractions2reenactments3surfactants',
        'Lagri=1nonagricultural2preagricultural3agribusinessman',
        'Gacro=1acrobatically2acromegaly3acrocephaly',
        'Gaero=1anaerobic2anaerobiosis3aeroembolism',
        'Gaero=1aeroelasticity2aerosolization3aerothermodynamic',
        'Lambi=1ambidexterities2ambiversion3disambiguation',
        'Lambi=1unambiguously2unambivalently3nonambiguous',
        'Lambul=1circumambulate2perambulating3somnambulation',
        'Lambul=1noctambulists2funambulism3nonambulatory',
        'Lanim=1pusillanimity2unanimity3pusillanimous',
        'Gbio=1microbiology2microbiologist3autobiography',
        'Gchron=1diachronic2synchronize3unchronicled',
        'Gchron=1anachronous2asynchronously3isochronism',
        'Ldent=1denturists2dentulous3dentinal',
        'Ldict=1interdictory2malediction3retrodiction',
        'Ldont=1endodontists2orthodontically3periodontology',
        'Ldont=1odontoblasts2prosthodontics3endodontically',
        'Ghetero=1superheterodyne2heterotrophic3heterozygosity',
        'Ghetero=1heterozygous2heterothallism3heterosporous',
        'Llingu=1bilingualism2extralinguistic3metalinguistic',
    ],
];

// ---- Meaning map for Latin/Greek roots ----
function rootword_meaning(string $root): string {
    static $map = [
        'acro'   => "top' or 'tip",
        'act'    => 'do',
        'aer'    => 'air',
        'aero'   => 'air',
        'agri'   => "farm' or 'land",
        'alg'    => 'pain',
        'ambi'   => 'both sides',
        'ambul'  => "walk' or 'move",
        'anim'   => "life' or 'spirit",
        'aqua'   => 'water',
        'arch'   => 'chief',
        'auto'   => 'self',
        'audi'   => 'hear',
        'bio'    => 'life',
        'chron'  => 'time',
        'chrono' => 'time',
        'cumul'  => "mass' or 'heap",
        'dic'    => 'say',
        'dict'   => 'say',
        'dent'   => 'teeth',
        'dont'   => 'teeth',
        'ex'     => 'out',
        'extra'  => 'outside',
        'geo'    => 'earth',
        'gran'   => 'grain',
        'graph'  => 'write',
        'hetero' => "different' or 'other",
        'homo'   => "alike' or 'same",
        'infra'  => 'below',
        'lingu'  => 'tongue',
    ];
    return $map[$root] ?? '';
}

// ---- Pre-parse data (§5.1) ----
function parse_rootword_entry(string $raw): ?array {
    $lang = '';
    if (substr($raw, 0, 1) === 'L') { $lang = 'Latin'; $raw = substr($raw, 1); }
    elseif (substr($raw, 0, 1) === 'G') { $lang = 'Greek'; $raw = substr($raw, 1); }

    $eq = strpos($raw, '=');
    if ($eq === false) return null;
    $root    = substr($raw, 0, $eq);
    $wordstr = substr($raw, $eq + 1);

    if (!preg_match('/^1(.+?)2(.+?)3(.+)$/', $wordstr, $m)) return null;

    return [
        'lang'    => $lang,
        'root'    => $root,
        'words'   => [$m[1], $m[2], $m[3]],
        'meaning' => $lang === '' ? '' : rootword_meaning($root),
    ];
}

$items = [];
foreach ($rawByTier as $tier => $rawList) {
    $items[$tier] = [];
    foreach ($rawList as $raw) {
        $p = parse_rootword_entry($raw);
        if ($p !== null) $items[$tier][] = $p;
    }
}

// ---- Helpers (§8.4, §8.6) ----
function rw_box(string $html, int $minHeight = 150): void {
    // Increased padding around the hint (was 20px/26px in prefix-suffix)
    echo '<div style="max-width:520px;min-height:' . $minHeight . 'px;'
       . 'margin:40px auto 20px;padding:28px 40px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
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

// ---- No-repeat picker (§6.2) ----
function pick_rootword_item(array $pool, string $sessionKey, int $tier): array {
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
    $isCorrect = str_replace(' ', '', $userAns) === str_replace(' ', '', strtolower($cur['root']));

    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer(
        $isCorrect ? $cur['root'] : $userAns,
        $cur['root'],
        $cur['lvl']
    );

    $result = ['correct' => $isCorrect, 'user' => $userAns, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $tier = resolve_root_words_tier($lvl, $grd);
    $pool = $items[$tier] ?? $items[1];
    if (empty($pool)) $pool = $items[1] ?? [];
    $item = pick_rootword_item($pool, $sessionKey, $tier);

    // Pick one of the 3 words
    $word = $item['words'][array_rand($item['words'])];

    $_SESSION[$sessionKey]['current'] = [
        'root'    => $item['root'],
        'word'    => $word,
        'lang'    => $item['lang'],
        'meaning' => $item['meaning'],
        'lvl'     => $lvl,
        'tier'    => $tier,
        'grd'     => $grd,
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
    $cur = $result['cur'];
    $wordEsc = htmlspecialchars($cur['word']);
    $rootEsc = htmlspecialchars($cur['root']);
    if ($cur['lang'] === '') {
        $feedback = "The root word of the word '<strong>{$wordEsc}</strong>' is '<strong style=\"color:#CC0066;\">{$rootEsc}</strong>'.";
    } else {
        $langEsc = htmlspecialchars($cur['lang']);
        $meanEsc = htmlspecialchars($cur['meaning']);
        $feedback = "The {$langEsc} root of the word '<strong>{$wordEsc}</strong>' that means '{$meanEsc}' is '<strong style=\"color:#CC0066;\">{$rootEsc}</strong>'.";
    }
?>  <!-- Hint box (prefix-suffix style) -->
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:18px;max-width:520px;margin-left:auto;margin-right:auto;">
    Your answer is '<strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['user']); ?></strong>'.
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:520px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#800080;max-width:520px;margin:10px auto;line-height:1.55;text-wrap:balance;"><?php echo $feedback; ?></p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $wordEsc = htmlspecialchars($q['word']);
    $ansLen  = strlen($q['root']);
    $maxLen  = $ansLen + 6;
    $inputWidthPx = max(130, $ansLen * 20 + 30);
?>  <!-- Hint box (prefix-suffix style) -->
  <div style="margin:30px auto 18px;display:inline-flex;flex-direction:column;justify-content:center;align-items:center;max-width:480px;min-height:70px;padding:20px 34px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">
    <div style="font-size:26pt;font-weight:700;color:#0000AA;line-height:1.3;">
      <?php echo $wordEsc; ?>
    </div>
  </div>

  <!-- Prompt -->
  <?php if ($q['lang'] === ''): ?>
    <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:600;color:#800080;margin:20px auto 10px;max-width:520px;text-wrap:balance;">
      Write the <strong style="color:#CC0066;">English root word</strong> of the word above.
    </p>
  <?php else: ?>
    <?php $langEsc = htmlspecialchars($q['lang']); $meanEsc = htmlspecialchars($q['meaning']); ?>
    <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:600;color:#800080;margin:20px auto 10px;max-width:520px;text-wrap:balance;">
      Write the <strong style="color:#CC0066;"><?php echo $langEsc; ?> root</strong>
      of the word above that means '<?php echo $meanEsc; ?>'.
    </p>
    <p style="font-family:Arial,sans-serif;font-size:12pt;color:#666;margin:0 auto 10px;max-width:520px;line-height:1.5;">
      (If the root has two forms, write the longest form that has all its letters present in the word above.)
    </p>
  <?php endif; ?>

  <!-- Answer input: prefix-suffix editable-box style, empty, sized to root -->
  <div style="margin:20px 0;">
    <input type="text" name="answer"
           size="<?php echo $ansLen + 2; ?>"
           maxlength="<?php echo $maxLen; ?>"
           autofocus autocomplete="off" autocapitalize="off" autocorrect="off"
           style="display:inline-block;text-align:center;height:52px;font-family:Arial,sans-serif;font-size:26px;font-weight:700;text-transform:lowercase;border:2px solid #888888;border-radius:8px;padding:4px 12px;width:<?php echo $inputWidthPx; ?>px;box-sizing:border-box;">
  </div>
  <div style="margin:0 0 20px;">
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