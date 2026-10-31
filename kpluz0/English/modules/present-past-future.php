<?php
// english/modules/present-past-future.php
// Simple Past, Present, Future Tenses — MC (4 or 3 options).
// 4 verb tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).

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
$moduleTitle = 'Simple Past, Present, and Future Tenses';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade resolution ------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ---- Level resolution ------------------------------------------------------
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard'; // migrate legacy Medium -> Hard
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- (level, grade) -> tier mapping ----------------------------------------
// Legacy:
//   Easy:   $grd<=1 -> 1 ; $grd>=2 -> 2
//   Hard:   $grd<=1 -> 3 ; $grd>=2 -> 4   (harder of legacy Medium/Hard)
function resolve_ppf_tier(string $lvl, int $grd): int {
    $band = ($grd <= 1) ? 0 : 1;
    if ($lvl === 'Easy') return 1 + $band;
    return 3 + $band;
}

// ---- Verb banks (base-present-past) ----------------------------------------
$verbsByTier = [
    1 => [
        "ask-asks-asked","beg-begs-begged","bury-buries-buried","chew-chews-chewed","close-closes-closed",
        "cook-cooks-cooked","come-comes-came","cry-cries-cried","cut-cuts-cut","dig-digs-dug",
        "do-does-did","earn-earns-earned","eat-eats-ate","flee-flees-fled","fly-flies-flew",
        "get-gets-got","give-gives-gave","go-goes-went","grow-grows-grew","heal-heals-healed",
        "hear-hears-heard","hop-hops-hopped","hope-hopes-hoped","jog-jogs-jogged","join-joins-joined",
        "jump-jumps-jumped","keep-keeps-kept","know-knows-knew","lead-leads-led","lend-lends-lent",
        "let-lets-let","lick-licks-licked","lose-loses-lost","mail-mails-mailed","make-makes-made",
        "mark-marks-marked","meet-meets-met","move-moves-moved","nail-nails-nailed","obey-obeys-obeyed",
        "owe-owes-owed","pick-picks-picked","pour-pours-poured","pray-prays-prayed","rain-rains-rained",
        "read-reads-read","ruin-ruins-ruined","run-runs-ran","sail-sails-sailed","saw-saws-sawed",
        "say-says-said","see-sees-saw","seem-seems-seemed","sell-sells-sold","send-sends-sent",
        "serve-serves-served","sew-sews-sewed","show-shows-showed","sing-sings-sang","smile-smiles-smiled",
        "tag-tags-tagged","tell-tells-told","walk-walks-walked",
    ],
    2 => [
        "add-adds-added","admire-admires-admired","admit-admits-admitted","agree-agrees-agreed",
        "allow-allows-allowed","amuse-amuses-amused","arise-arises-arose","argue-argues-argued",
        "avoid-avoids-avoided","bathe-bathes-bathed","beg-begs-begged","begin-begins-began",
        "bless-blesses-blessed","build-builds-built","carry-carries-carried","choose-chooses-chose",
        "clean-cleans-cleaned","climb-climbs-climbed","clothe-clothes-clothed","crawl-crawls-crawled",
        "create-creates-created","drink-drinks-drank","enjoy-enjoys-enjoyed","enter-enters-entered",
        "fade-fades-faded","fail-fails-failed","feel-feels-felt","follow-follows-followed",
        "greet-greets-greeted","happen-happens-happened","hover-hovers-hovered","juggle-juggles-juggled",
        "learn-learns-learned","leave-leaves-left","listen-listens-listened","prove-proves-proved",
        "quit-quits-quit","relax-relaxes-relaxed","remain-remains-remained","scold-scolds-scolded",
        "serve-serves-served","shout-shouts-shouted","solve-solves-solved","speak-speaks-spoke",
        "teach-teaches-taught","tease-teases-teased","thank-thanks-thanked","think-thinks-thought",
        "throw-throws-threw","unlock-unlocks-unlocked","unpack-unpacks-unpacked","write-writes-wrote",
    ],
    3 => [
        "adopt-adopts-adopted","alter-alters-altered","annoy-annoys-annoyed","apply-applies-applied",
        "arrange-arranges-arranged","arrive-arrives-arrived","attend-attends-attended","become-becomes-became",
        "behave-behaves-behaved","belong-belongs-belonged","bleed-bleeds-bled","borrow-borrows-borrowed",
        "breathe-breathes-breathed","collect-collects-collected","compare-compares-compared",
        "compete-competes-competed","complain-complains-complained","compose-composes-composed",
        "compute-computes-computed","confess-confesses-confessed","confuse-confuses-confused",
        "connect-connects-connected","deceive-deceives-deceived","decide-decides-decided",
        "describe-describes-described","deserve-deserves-deserved","destroy-destroys-destroyed",
        "detect-detects-detected","direct-directs-directed","employ-employs-employed","exceed-exceeds-exceeded",
        "excite-excites-excited","exist-exists-existed","expand-expands-expanded","expect-expects-expected",
        "explain-explains-explained","extend-extends-extended","fasten-fastens-fastened","forbid-forbids-forbade",
        "forego-foregoes-forewent","foresee-foresees-foresaw","foretell-foretells-foretold","forget-forgets-forgot",
        "forgive-forgives-forgave","gather-gathers-gathered","govern-governs-governed","ignore-ignores-ignored",
        "include-includes-included","inject-injects-injected","inspect-inspects-inspected","inspire-inspires-inspired",
        "invent-invents-invented","locate-locates-located","meddle-meddles-meddled","obtain-obtains-obtained",
        "offend-offends-offended","perform-performs-performed","provide-provides-provided","punish-punishes-punished",
        "realize-realizes-realized","receive-receives-received","reduce-reduces-reduced","refer-refers-referred",
        "relate-relates-related","remind-reminds-reminded","remove-removes-removed","replace-replaces-replaced",
        "seek-seeks-sought","search-searches-searched","secure-secures-secured","settle-settles-settled",
        "suffer-suffers-suffered","unify-unifies-unified","unite-unites-united","vanish-vanishes-vanished",
        "wander-wanders-wandered","wonder-wonders-wondered",
    ],
    4 => [
        "acquire-acquires-acquired","advance-advances-advanced","afford-affords-afforded",
        "analyze-analyzes-analyzed","announce-announces-announced","appear-appears-appeared",
        "appoint-appoints-appointed","approve-approves-approved","assemble-assembles-assembled",
        "attach-attaches-attached","calculate-calculates-calculated","classify-classifies-classified",
        "compile-compiles-compiled","conceive-conceives-conceived","conclude-concludes-concluded",
        "condense-condenses-condensed","conserve-conserves-conserved","consider-considers-considered",
        "construct-constructs-constructed","continue-continues-continued","control-controls-controlled",
        "contribute-contributes-contributed","convince-convinces-convinced","cooperate-cooperates-cooperated",
        "decorate-decorates-decorated","dedicate-dedicates-dedicated","define-defines-defined",
        "deliver-delivers-delivered","determine-determines-determined","develop-develops-developed",
        "diagnose-diagnoses-diagnosed","disappear-disappears-disappeared","discover-discovers-discovered",
        "distribute-distributes-distributed","educate-educates-educated","embarrass-embarrasses-embarrassed",
        "encourage-encourages-encouraged","enlarge-enlarges-enlarged","enlist-enlists-enlisted",
        "entertain-entertains-entertained","enumerate-enumerates-enumerated","establish-establishes-established",
        "evaluate-evaluates-evaluated","examine-examines-examined","explode-explodes-exploded",
        "finalize-finalizes-finalized","frighten-frightens-frightened","identify-identifies-identified",
        "illustrate-illustrates-illustrated","imagine-imagines-imagined","impress-impresses-impressed",
        "install-installs-installed","instruct-instructs-instructed","introduce-introduces-introduced",
        "invest-invests-invested","maintain-maintains-maintained","manage-manages-managed",
        "memorize-memorizes-memorized","multiply-multiplies-multiplied","nominate-nominates-nominated",
        "observe-observes-observed","operate-operates-operated","overcome-overcomes-overcame",
        "overhear-overhears-overheard","perceive-perceives-perceived","possess-possesses-possessed",
        "predict-predicts-predicted","prefer-prefers-preferred","prepare-prepares-prepared",
        "pretend-pretends-pretended","prevent-prevents-prevented","promote-promotes-promoted",
        "propose-proposes-proposed","protect-protects-protected","purify-purifies-purified",
        "qualify-qualifies-qualified","recognize-recognizes-recognized","rejoice-rejoices-rejoiced",
        "remember-remembers-remembered","restore-restores-restored","satisfy-satisfies-satisfied",
        "scatter-scatters-scattered","subtract-subtracts-subtracted","succeed-succeeds-succeeded",
        "suggest-suggests-suggested","summarize-summarizes-summarized","suspend-suspends-suspended",
        "terrify-terrifies-terrified","understand-understands-understood","withdraw-withdraws-withdrew",
    ],
];

// ---- Verb string parser ("base-present-past") ------------------------------
function parse_verb(string $s): array {
    $parts = explode('-', $s, 3);
    return ['base' => $parts[0], 'present' => $parts[1], 'past' => $parts[2]];
}

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $tier = resolve_ppf_tier($lvl, $grd);
    $pool = $verbsByTier[$tier];

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $verbStr) {
        if (!in_array("t$tier:$i", $used, true)) $available[$i] = $verbStr;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        $available = $pool;
    }
    $idx = array_rand($available);
    $verbStr = $available[$idx];
    $used[] = "t$tier:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $forms = parse_verb($verbStr);
    $opt = rand(1, 3);
    $tense = ($opt === 1) ? 'past' : (($opt === 2) ? 'present' : 'future');
    $correct = ($tense === 'past')    ? $forms['past']
             : (($tense === 'present') ? $forms['present']
             : 'will ' . $forms['base']);

    // Choices = {base, present, past, future}, deduplicated.
    // Regular verbs -> 4 unique choices; verbs where base==past (cut, let, read, quit)
    // give 3 unique choices. Correct is always in the set.
    $allForms = [
        $forms['base'],
        $forms['present'],
        $forms['past'],
        'will ' . $forms['base'],
    ];
    $choices = array_values(array_unique($allForms));
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'verb'    => $forms['base'],
        'tense'   => $tense,
        'correct' => $correct,
        'choices' => $choices,
        'lvl'     => $lvl,
        'tier'    => $tier,
        'grd'     => $grd,
        'idx'     => $idx,
    ];
}

// ---- Render ----------------------------------------------------------------
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;">You clicked on <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.</p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#800080;">
    <?php if ($cur['tense'] === 'present'): ?>
      <br/>The singular, third-person, simple <strong>present</strong> tense<br/>of the verb '<strong style="color:#0000CC;"><?php echo htmlspecialchars($cur['verb']); ?></strong>' is '<strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['correct']); ?></strong>'.<br/><br/>
    <?php else: ?>
      <br/>The simple <strong><?php echo $cur['tense']; ?></strong> tense of the verb<br/>'<strong style="color:#0000CC;"><?php echo htmlspecialchars($cur['verb']); ?></strong>' is '<strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['correct']); ?></strong>'.<br/><br/>
    <?php endif; ?>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else: $q = $_SESSION[$sessionKey]['current']; ?>
  <div style="margin:30px auto 20px;font-family:Arial,sans-serif;font-size:16pt;font-weight:600;color:#800080;">
    <?php if ($q['tense'] === 'present'): ?>
      What's the singular, third-person,<br/>simple <strong style="color:#CC0066;">present</strong> tense of the verb '<strong style="color:#0000CC;"><?php echo htmlspecialchars($q['verb']); ?></strong>'?
    <?php else: ?>
      What's the simple <strong style="color:#CC0066;"><?php echo $q['tense']; ?></strong> tense of the verb<br/>'<strong style="color:#0000CC;"><?php echo htmlspecialchars($q['verb']); ?></strong>'?
    <?php endif; ?>
  </div>
  <div style="font-family:Arial,sans-serif;font-size:14pt;font-weight:600;color:#800080;margin-bottom:20px;">Click on your answer.</div>
  <?php
    $cols = (count($q['choices']) <= 3) ? count($q['choices']) : 2;
    // single row for &#8804;3 choices; 2-per-row otherwise
    $rows = (count($q['choices']) <= 3) ? [$q['choices']] : array_chunk($q['choices'], 2);
  ?>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach ($rows as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:block;min-width:140px;padding:16px 24px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>