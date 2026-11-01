<?php
// english/modules/adverbs.php
// Identifying Adverbs — pick the word that's exclusively or mainly used as an adverb.
// 6 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// Easy: grd<=3&#8594;1, 4-5&#8594;2, 6-7&#8594;3, >=8&#8594;4     (legacy Easy)
// Hard: grd<=3&#8594;3, 4-5&#8594;4, 6-7&#8594;5, >=8&#8594;6     (legacy Hard; legacy Medium folded in)
// 4 choices always in a 2×2 grid: 1 adverb + 2 "-y non-adverbs" + 1 "-ly non-adverb".
// No-repeat tracked independently for the adverb and the "-ly" distractor.

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
$moduleTitle = 'Identifying Adverbs';
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
function resolve_adverbs_tier(string $lvl, int $grd): int {
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

// ---- Data (§5) — verbatim from legacy ----
// Each tier has three pools:
//   nonadvs   — "-y"-looking words that aren't adverbs (e.g. "angry", "army")
//   nonadvs2  — "-ly"-looking words that aren't adverbs (e.g. "ally", "daily")
//   adverbs   — actual adverbs (the correct answers)
$pools = [
    1 => [
        'nonadvs' => [
            "angry","army","berry","bumpy","bury","busy","battery","candy","carry","cheeky","cherry","city","cloudy","clumsy",
            "crazy","creepy","daisy","diary","dirty","dizzy","dusty","enjoy","fairy","foamy","funny","furry","fuzzy","handy","heavy",
            "husky","lumpy","itchy","juicy","jumpy","misty","moldy","lucky","meaty","messy","milky","money","nasty","needy","noisy",
            "nosy","nutty","penny","puffy","puny","pushy","rainy","roomy","salty","saucer","scary","shaky","shiny","silky","sleepy",
            "soggy","spicy","spiky","sulky","tacky","testy","tangy","tasty","weary","windy",
        ],
        'nonadvs2' => [
            "ally","apply","belly","billy","bully","burly","cuddly","curly","daily","dally","early","filly","folly","godly",
            "hilly","holly","holy","homely","hourly","imply","jelly","jolly","lily","lively","lonely","lovely","lowly","kingly",
            "manly","mealy","scaly","sickly","silly","sully","surly","rally","rely","reply","tally","timely","ugly",
            "wily","yearly",
        ],
        'adverbs' => [
            "badly","boldly","busily","calmly","dearly","deeply","dimly","easily","evenly","fairly","fondly","freely","gladly","happily",
            "kindly","lazily","loudly","madly","mostly","nearly","neatly","nicely","oddly","poorly","really","rudely","sadly","safely",
            "slowly","softly","soon","surely","truly","warmly","weakly","wisely",
        ],
    ],
    2 => [
        'nonadvs' => [
            "annoy","brainy","bravery","bouncy","boundary","breezy","canary","celery","chubby","chunky","classy","country","county",
            "destroy","donkey","earthy","eatery","employ","enemy","faulty","filthy","gaudy","grocery","gusty","healthy","laundry",
            "memory","murky","nappy","holiday","naughty","pantry","pastry","poultry","pottery","railway","robbery","rosary","salary",
            "savory","skinny","turkey","valley","volley","wealthy",
        ],
        'nonadvs2' => [
            "blowfly","bodily","bubbly","butterfly","chilly","comely","costly","cuddly","deadly","doily","dolly","dragonfly",
            "elderly","family","firefly","friendly","gadfly","grisly","grizzly","gully","homily","horsefly","housefly","lordly","mayfly",
            "measly","monthly","nightly","oily","pearly","pebbly","pimply","portly","sally","smelly","supply","unfriendly","ungodly",
            "unholy","unlikely","unmanly","unruly","weekly","wifely","wobbly","womanly","woolly",
        ],
        'adverbs' => [
            "almost","always","angrily","bitterly","blindly","boldly","bravely","briefly","brightly","broadly","clearly","cleverly",
            "closely","frankly","foolishly","greatly","greedily","happily","heavily","highly","honestly","hungrily","joyously",
            "justly","keenly","lightly","loosely","lovingly","luckily","merrily","needily","never","noisily","openly","plainly",
            "politely","quickly","quietly","rarely","roughly","sharply","silently","sleepily","soon","sweetly","tightly","vainly",
            "vastly","wearily","wildly","wrongly",
        ],
    ],
    3 => [
        'nonadvs' => [
            "archery","bribery","cannery","clarify","classify","cemetery","drapery","factory","finicky","flowery","gallery","granary",
            "history","jittery","library","panicky","galley","century","colony","company","destiny","jewelry","lottery","masonry",
            "mastery","mimicry","mockery","modify","mystery","nursery","powdery","primary","purify","qualify","rivalry","satisfy",
            "scenery","scrawny","secrecy","sensory","slippery","sorcery","summary","surgery","terrify","unwieldy","victory",
        ],
        'nonadvs2' => [
            "beastly","beggarly","bristly","brotherly","comply","courtly","cowardly","crinkly","crumbly","earthly","heavenly",
            "deathly","fatherly","frilly","frizzly","ghastly","ghostly","gravelly","knobbly","knurly","misapply","miserly",
            "motherly","multiply","orderly","potbelly","prickly","priestly","princely","saintly","shapely","stately","steely",
            "stubbly","uncomely","underbelly","ungainly","unlively","unlovely","unstately","unsaintly","worldly","wrinkly",
        ],
        'adverbs' => [
            "almost","always","bleakly","briskly","broadly","certainly","cheerily","commonly","correctly","daintily","exactly","famously",
            "fiercely","hastily","healthily","inwardly","jealously","kiddingly","knowingly","linearly","miserably","mockingly","nervously",
            "obediently","patiently","perfectly","promptly","properly","rapidly","rarely","readily","rigidly","scarcely","scarily","seldom",
            "selfishly","seriously","shakily","smoothly","solemnly","solidly","sometimes","speedily","sternly","strictly","suddenly","swiftly",
            "tenderly","terribly","unbearably","unluckily","upwardly","urgently","usually","utterly","vaguely","worriedly",
        ],
    ],
    4 => [
        'nonadvs' => [
            "activity","accessory","adversary","artillery","bigotry","capillary","chemistry","citizenry","cursory","delivery","democracy",
            "diplomacy","directory","discovery","dormitory","ecstasy","electricity","emergency","forgery","gallantry","husbandry","identify",
            "imaginary","infirmary","immediacy","inquiry","judiciary","legendary","machinery","migratory","monastery","momentary","necessary",
            "occupancy","offertory","optometry","oratory","pageantry","perjury","philosophy","photography","planetary","quandary","quantify",
            "revelry","secondary","signatory","simplify","supremacy","temporary","territory","treachery","vanity","voluntary",
        ],
        'nonadvs2' => [
            "anomaly","assembly","dastardly","dilly-dally","disorderly","gentlemanly","hurly-burly","leisurely","masterly","matronly","neighborly",
            "plug-ugly","quarterly","uncowardly","unsightly","unearthly","unneighborly","unshapely","unwomanly","unworldly",
        ],
        'adverbs' => [
            "afterwards","backwards","anxiously","awkwardly","brilliantly","coaxingly","cautiously","courageously","curiously","deceivingly",
            "devotedly","diligently","dreamily","excitedly","earnestly","eastwards","elegantly","fervently","fortunately","furiously","gallantly",
            "generously","laughingly","immediately","innocently","instantly","intently","irritably","jubilantly","knowledgeably","longingly",
            "northwards","owlishly","positively","probably","quaintly","queasily","quirkily","regularly","reluctantly","repeatedly",
            "righteously","separately","southwards","surprisingly","suspiciously","thoroughly","tremendously","valiantly","violently","voluntarily",
            "westwards","yearningly","zestily",
        ],
    ],
    5 => [
        'nonadvs' => [
            "accountancy","arbitrary","archaeology","autocracy","auxiliary","centenary","circuitry","consistency","constancy","contingency",
            "corollary","customary","dignitary","divinity","diversify","diversity","distillery","elasticity","excellency","exemplary",
            "fiduciary","indecency","insufficiency","inventory","itinerary","mandatory","mercenary","militancy","olfactory","periphery",
            "pituitary","pulmonary","predatory","repertory","residency","sanctuary","satisfactory","sedentary","statutory","telemetry",
            "tributary","visionary",
        ],
        'nonadvs2' => [
            "bibliopoly","bibliophily","disassembly","easterly","homophily","melancholy","monopoly","northerly","oversupply","oxyphily",
            "panoply","scholarly","sedately","slovenly","shilly-shally","southerly","spindly","sprightly","squally","squiggly","technophily",
            "toxophily","treacly","undersupply","xerophily","zoophily",
        ],
        'adverbs' => [
            "absentmindedly","adventurously","arrogantly","attentively","charitably","defiantly","deliberately","dependably","deplorably",
            "discreetly","distressingly","disturbingly","erroneously","ferociously","grievously","grotesquely","grudgingly","gruelingly",
            "haphazardly","harmoniously","incompetently","hesitantly","industriously","interestingly","negligently","mysteriously",
            "obnoxiously","offensively","passionately","productively","prudently","pungently","questionably","questioningly",
            "reassuringly","rigorously","stealthily","stingingly","spiritedly","staggeringly","strenuously","tolerantly","triumphantly",
            "ultimately","unabashedly","viciously","victoriously","vigilantly","vivaciously","wholeheartedly","yieldingly","zealously",
        ],
    ],
    6 => [
        'nonadvs' => [
            "accretionary","ancillary","ascendency","belligerency","biochemistry","cardiopulmonary","chicanery","complementary","concessionary",
            "contemporary","contradictory","corpulency","congratulatory","devolutionary","discretionary","discriminatory","diversionary",
            "flamboyancy","illegitimacy","impudency","incessancy","incipiency","inconsistency","indeterminacy","interdependency","intermittency",
            "inflammatory","inflationary","intermediary","interplanetary","mendicancy","microcircuitry","obstinacy","parliamentary","participatory",
            "pecuniary","penitentiary","preponderancy","probationary","recalcitrancy","recommendatory","reconciliatory","reticency","revolutionary",
            "seismography","sophistry","sovereignity","stagflationary","stoichiometry","supplementary","transcendency","transiency","trenchancy",
            "vehemency",
        ],
        'nonadvs2' => [
            "ailurophily","antimonopoly","antioligopoly","electrophily","entomophily","heterophily","myrmecophily","niggardly","northeasterly",
            "northwesterly","otherworldly","oligopoly","slatternly","southeasterly","southwesterly","thermophily",
        ],
        'adverbs' => [
            "abominably","agonizingly","arduously","assiduously","audaciously","auspiciously","beneficently","benevolently","blunderingly",
            "chivalrously","circumspectly","clandestinely","copiously","conscientiously","cumbersomely","decorously","dexterously","discerningly",
            "efficaciously","equitably","evenhandedly","exhaustingly","exhaustively","exquisitely","extravagantly","fastidiously","felicitously",
            "flamboyantly","furtively","inconveniently","indiscreetly","ineffectively","injudiciously","insidiously","insipidly","intensively",
            "laboriously","legitimately","magnanimously","maladroitly","meticulously","mordantly","notoriously","obscurely","opportunely","perilously",
            "persistently","perspicaciously","persuasively","ponderously","precariously","propitiously","providently","punctiliously","sagaciously",
            "scrupulously","solicitously","surreptitiously","trenchantly","valorously",
        ],
    ],
];

// ---- Helpers (§8.4, §8.6) ----
function adverbs_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
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

// ---- No-repeat pickers (§6.2) — separate keys for adverb vs -ly distractor ----
function pick_adverb_answer(array $pool, string $sessionKey, int $tier): string {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $w) {
        if (!in_array("t$tier:adv:$i", $used, true)) $available[$i] = $w;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:adv:") !== 0));
        foreach ($pool as $i => $w) $available[$i] = $w;
    }
    $idx    = array_rand($available);
    $word   = $available[$idx];
    $used[] = "t$tier:adv:$idx";
    if (count($used) > 800) $used = array_slice($used, -400);
    $_SESSION[$sessionKey]['used'] = $used;
    return $word;
}
function pick_ly_distractor(array $pool, string $sessionKey, int $tier): string {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $w) {
        if (!in_array("t$tier:ly:$i", $used, true)) $available[$i] = $w;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:ly:") !== 0));
        foreach ($pool as $i => $w) $available[$i] = $w;
    }
    $idx    = array_rand($available);
    $word   = $available[$idx];
    $used[] = "t$tier:ly:$idx";
    if (count($used) > 800) $used = array_slice($used, -400);
    $_SESSION[$sessionKey]['used'] = $used;
    return $word;
}
function pick_two_y_distractors(array $pool, string $exclude = ''): array {
    // Preserve legacy behaviour: 2 distinct -y non-adverbs, both distinct from
    // any other choice (so they never collide with the answer which won't be
    // in this pool anyway, but we still exclude defensively).
    $filtered = array_values(array_filter($pool, fn($w) => $w !== $exclude));
    if (count($filtered) < 2) return $filtered;
    $keys = array_rand($filtered, 2);
    return [$filtered[$keys[0]], $filtered[$keys[1]]];
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
    $tier = resolve_adverbs_tier($lvl, $grd);
    $pool = $pools[$tier] ?? $pools[1];

    $answer    = pick_adverb_answer($pool['adverbs'],   $sessionKey, $tier);
    $ly        = pick_ly_distractor($pool['nonadvs2'], $sessionKey, $tier);
    $yChoices  = pick_two_y_distractors($pool['nonadvs'], $answer);

    $choices = array_merge([$answer, $ly], $yChoices);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'choices' => $choices,
        'correct' => $answer,
        'lvl'     => $lvl,
        'tier'    => $tier,
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
    $cur       = $result['cur'];
    $correctEsc = htmlspecialchars($cur['correct']);
    $choicesList = [];
    foreach ($cur['choices'] as $c) {
        $choicesList[] = "'" . htmlspecialchars($c) . "'";
    }
    $choicesStr = implode(', ', $choicesList);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php adverbs_box(
      '<div style="font-size:16pt;color:#333;line-height:1.55;text-wrap:balance;">'
    . 'Among the words ' . $choicesStr . ', the word used exclusively or mainly as an '
    . '<strong style="color:#CC0066;">adverb</strong> is '
    . '<strong style="color:#CC0066;">' . $correctEsc . '</strong>.'
    . '</div>'
  , 160); ?>  
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
  
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the word that's exclusively or mainly used as an <span style="color:#CC0066;">adverb</span>.
  </div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:20px auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:220px;min-height:64px;padding:12px 18px;
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
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
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