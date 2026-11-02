<?php
// english/modules/verbs-basic-forms.php
// Basic Forms of Verbs — given a verb in its base form, type the requested
// tense/form (simple past, simple present singular, present participle, or
// past participle).
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 6 content tiers via (level × grade); text-input answer.

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
$moduleTitle = 'Basic Forms of Verbs';
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
function resolve_vb_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        if ($grd <= 8) return 3;
        return 4;
    }
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    if ($grd <= 8) return 5;
    return 6;
}

// ---- Data (§5) — verbatim from legacy, with 4 data fixes ----
// Fixes:
//   * tier 1 "feel-feels-felt"              &#8594; "feel-feels-felt-felt-feeling"  (truncated)
//   * tier 1 "send-send-sent-sent-sending"  &#8594; "send-sends-sent-sent-sending"  (wrong present)
//   * tier 3 "punish-punished-..."          &#8594; "punish-punishes-punished-punished-punishing"
//   * tier 5 "diversifiying"                &#8594; "diversifying" (typo in present participle)
$dataByTier = [
    1 => [
        'be-is-was-been-being','ask-asks-asked-asked-asking','beg-begs-begged-begged-begging',
        'bind-binds-bound-bound-binding','build-builds-built-built-building','bury-buries-buried-buried-burying',
        'buy-buys-bought-bought-buying','chew-chews-chewed-chewed-chewing','clean-cleans-cleaned-cleaned-cleaning',
        'cook-cooks-cooked-cooked-cooking','come-comes-came-come-coming','cry-cries-cried-cried-crying',
        'cut-cuts-cut-cut-cutting','dig-digs-dug-dug-digging','do-does-did-done-doing',
        'drive-drives-drove-driven-driving','earn-earns-earned-earned-earning','eat-eats-ate-eaten-eating',
        'enjoy-enjoys-enjoyed-enjoyed-enjoying','feel-feels-felt-felt-feeling','flee-flees-fled-fled-fleeing',
        'fly-flies-flew-flown-flying','get-gets-got-gotten-getting','give-gives-gave-given-giving',
        'go-goes-went-gone-going','grind-grinds-ground-ground-grinding','grow-grows-grew-grown-growing',
        'heal-heals-healed-healed-healing','hear-hears-heard-heard-hearing','hop-hops-hopped-hopped-hopping',
        'hope-hopes-hoped-hoped-hoping','jog-jogs-jogged-jogged-jogging','join-joins-joined-joined-joining',
        'jump-jumps-jumped-jumped-jumping','keep-keeps-kept-kept-keeping','know-knows-knew-known-knowing',
        'lead-leads-led-led-leading','lend-lends-lent-lent-lending','let-lets-let-let-letting',
        'lick-licks-licked-licked-licking','lose-loses-lost-lost-losing','mail-mails-mailed-mailed-mailing',
        'make-makes-made-made-making','mark-marks-marked-marked-marking','mean-means-meant-meant-meaning',
        'meet-meets-met-met-meeting','move-moves-moved-moved-moving','nail-nails-nailed-nailed-nailing',
        'obey-obeys-obeyed-obeyed-obeying','owe-owes-owed-owed-owing','pick-picks-picked-picked-picking',
        'pour-pours-poured-poured-pouring','pray-prays-prayed-prayed-praying','rain-rains-rained-rained-raining',
        'read-reads-read-read-reading','ride-rides-rode-ridden-riding','ruin-ruins-ruined-ruined-ruining',
        'run-runs-ran-run-running','sail-sails-sailed-sailed-sailing','saw-saws-sawed-sawn-sawing',
        'say-says-said-said-saying','see-sees-saw-seen-seeing','seek-seeks-sought-sought-seeking',
        'seem-seems-seemed-seemed-seeming','sell-sells-sold-sold-selling','send-sends-sent-sent-sending',
        'serve-serves-served-served-serving','sew-sews-sewed-sewn-sewing','shout-shouts-shouted-shouted-shouting',
        'show-shows-showed-shown-showing','shoot-shoots-shot-shot-shooting','sing-sings-sang-sung-singing',
        'sleep-sleeps-slept-slept-sleeping','slide-slides-slid-slid-sliding','spend-spends-spent-spent-spending',
        'sweep-sweeps-swept-swept-sweeping','smile-smiles-smiled-smiled-smiling','speak-speaks-spoke-spoken-speaking',
        'stand-stands-stood-stood-standing','tag-tags-tagged-tagged-tagging','tell-tells-told-told-telling',
        'walk-walks-walked-walked-walking','warn-warns-warned-warned-warning','weep-weeps-wept-wept-weeping',
        'wind-winds-wound-wound-winding','write-writes-wrote-written-writing',
    ],
    2 => [
        'admire-admires-admired-admired-admiring','admit-admits-admitted-admitted-admitting',
        'adopt-adopts-adopted-adopted-adopting','afford-affords-afforded-afforded-affording',
        'agree-agrees-agreed-agreed-agreeing','allow-allows-allowed-allowed-allowing',
        'alter-alters-altered-altered-altering','amuse-amuses-amused-amused-amusing',
        'annoy-annoys-annoyed-annoyed-annoying','appear-appears-appeared-appeared-appearing',
        'apply-applies-applied-applied-applying','arrange-arranges-arranged-arranged-arranging',
        'argue-argues-argued-argued-arguing','arrive-arrives-arrived-arrived-arriving',
        'arise-arises-arose-arisen-arising','attach-attaches-attached-attached-attaching',
        'attend-attends-attended-attended-attending','avoid-avoids-avoided-avoided-avoiding',
        'awake-awakes-awoke-awaken-awaking','bathe-bathes-bathed-bathed-bathing',
        'become-becomes-became-become-becoming','begin-begins-began-begun-beginning',
        'behave-behaves-behaved-behaved-behaving','belong-belongs-belonged-belonged-belonging',
        'bleed-bleeds-bled-bled-bleeding','bless-blesses-blessed-blessed-blessing',
        'borrow-borrows-borrowed-borrowed-borrowing','breathe-breathes-breathed-breathed-breathing',
        'breed-breeds-bred-bred-breeding','bring-brings-brought-brought-bringing',
        'build-builds-built-built-building','carry-carries-carried-carried-carrying',
        'catch-catches-caught-caught-catching','choose-chooses-chose-chosen-choosing',
        'climb-climbs-climbed-climbed-climbing','cling-clings-clung-clung-clinging',
        'clothe-clothes-clothed-clothed-clothing','collect-collects-collected-collected-collecting',
        'crawl-crawls-crawled-crawled-crawling','create-creates-created-created-creating',
        'creep-creeps-crept-crept-creeping','draw-draws-drew-drawn-drawing',
        'deal-deals-dealt-dealt-dealing','decide-decides-decided-decided-deciding',
        'deserve-deserves-deserved-deserved-deserving','destroy-destroys-destroyed-destroyed-destroying',
        'drink-drinks-drank-drunk-drinking','enjoy-enjoys-enjoyed-enjoyed-enjoying',
        'enter-enters-entered-entered-entering','excite-excites-excited-excited-exciting',
        'fade-fades-faded-faded-fading','fail-fails-failed-failed-failing',
        'fasten-fastens-fastened-fastened-fastening','fight-fights-fought-fought-fighting',
        'fling-flings-flung-flung-flinging','follow-follows-followed-followed-following',
        'forget-forgets-forgot-forgotten-forgetting','forgive-forgives-forgave-forgiven-forgiving',
        'freeze-freezes-froze-frozen-freezing','gather-gathers-gathered-gathered-gathering',
        'greet-greets-greeted-greeted-greeting','happen-happens-happened-happened-happening',
        'hover-hovers-hovered-hovered-hovering','ignore-ignores-ignored-ignored-ignoring',
        'juggle-juggles-juggled-juggled-juggling','learn-learns-learned-learned-learning',
        'leave-leaves-left-left-leaving','listen-listens-listened-listened-listening',
        'locate-locates-located-located-locating','mistake-mistakes-mistook-mistaken-mistaking',
        'obtain-obtains-obtained-obtained-obtaining','offend-offends-offended-offended-offending',
        'receive-receives-received-received-receiving','reduce-reduces-reduced-reduced-reducing',
        'refer-refers-referred-referred-referring','relax-relaxes-relaxed-relaxed-relaxing',
        'remain-remains-remained-remained-remaining','remind-reminds-reminded-reminded-reminding',
        'remove-removes-removed-removed-removing','replace-replaces-replaced-replaced-replacing',
        'scold-scolds-scolded-scolded-scolding','search-searches-searched-searched-searching',
        'serve-serves-served-served-serving','settle-settles-settled-settled-settling',
        'sling-slings-slung-slung-slinging','solve-solves-solved-solved-solving',
        'steal-steals-stole-stolen-stealing','stick-sticks-stuck-stuck-sticking',
        'sting-stings-stung-stung-stinging','string-strings-strung-strung-stringing',
        'suffer-suffers-suffered-suffered-suffering','swear-swears-swore-sworn-swearing',
        'swing-swings-swung-swung-swinging','teach-teaches-taught-taught-teaching',
        'tease-teases-teased-teased-teasing','thank-thanks-thanked-thanked-thanking',
        'think-thinks-thought-thought-thinking','throw-throws-threw-thrown-throwing',
        'unify-unifies-unified-unified-unifying','unite-unites-united-united-uniting',
        'unlock-unlocks-unlocked-unlocked-unlocking','unpack-unpacks-unpacked-unpacked-unpacking',
        'wonder-wonders-wondered-wondered-wondering','wring-wrings-wrung-wrung-wringing',
    ],
    3 => [
        'appoint-appoints-appointed-appointed-appointing','approve-approves-approved-approved-approving',
        'compare-compares-compared-compared-comparing','confess-confesses-confessed-confessed-confessing',
        'confuse-confuses-confused-confused-confusing','connect-connects-connected-connected-connecting',
        'deceive-deceives-deceived-deceived-deceiving','deliver-delivers-delivered-delivered-delivering',
        'describe-describes-described-described-describing','detect-detects-detected-detected-detecting',
        'develop-develops-developed-developed-developing','exist-exists-existed-existed-existing',
        'expand-expands-expanded-expanded-expanding','expect-expects-expected-expected-expecting',
        'explain-explains-explained-explained-explaining','explode-explodes-exploded-exploded-exploding',
        'extend-extends-extended-extended-extending','finalize-finalizes-finalized-finalized-finalizing',
        'foresee-foresees-foresaw-foreseen-foreseeing','foretell-foretells-foretold-foretold-foretelling',
        'forsake-forsakes-forsook-forsaken-forsaking','frighten-frightens-frightened-frightened-frightening',
        'govern-governs-governed-governed-governing','imagine-imagines-imagined-imagined-imagining',
        'impress-impresses-impressed-impressed-impressing','include-includes-included-included-including',
        'inject-injects-injected-injected-injecting','inspect-inspects-inspected-inspected-inspecting',
        'inspire-inspires-inspired-inspired-inspiring','install-installs-installed-installed-installing',
        'invent-invents-invented-invented-inventing','manage-manages-managed-managed-managing',
        'memorize-memorizes-memorized-memorized-memorizing','mislead-misleads-misled-misled-misleading',
        'multiply-multiplies-multiplied-multiplied-multiplying','observe-observes-observed-observed-observing',
        'operate-operates-operated-operated-operating','overcome-overcomes-overcame-overcome-overcoming',
        'overdraw-overdraws-overdrew-overdrawn-overdrawing','overhear-overhears-overheard-overheard-overhearing',
        'overtake-overtakes-overtook-overtaken-overtaking','perceive-perceives-perceived-perceived-perceiving',
        'perform-performs-performed-performed-performing','possess-possesses-possessed-possessed-possessing',
        'predict-predicts-predicted-predicted-predicting','prefer-prefers-preferred-preferred-preferring',
        'prepare-prepares-prepared-prepared-preparing','pretend-pretends-pretended-pretended-pretending',
        'prevent-prevents-prevented-prevented-preventing','promote-promotes-promoted-promoted-promoting',
        'propose-proposes-proposed-proposed-proposing','protect-protects-protected-protected-protecting',
        'provide-provides-provided-provided-providing','punish-punishes-punished-punished-punishing',
        'qualify-qualifies-qualified-qualified-qualifying','realize-realizes-realized-realized-realizing',
        'rejoice-rejoices-rejoiced-rejoiced-rejoicing','relate-relates-related-related-relating',
        'remember-remembers-remembered-remembered-remembering','restore-restores-restored-restored-restoring',
        'satisfy-satisfies-satisfied-satisfied-satisfying','scatter-scatters-scattered-scattered-scattering',
        'secure-secures-secured-secured-securing','stride-strides-strode-stridden-striding',
        'subtract-subtracts-subtracted-subtracted-subtracting','succeed-succeeds-succeeded-succeeded-succeeding',
        'suggest-suggests-suggested-suggested-suggesting','suppose-supposes-supposed-supposed-supposing',
        'suspend-suspends-suspended-suspended-suspending','terrify-terrifies-terrified-terrified-terrifying',
        'undergo-undergoes-underwent-undergone-undergoing','understand-understands-understood-understood-understanding',
        'undertake-undertakes-undertook-undertaken-undertaking','utilize-utilizes-utilized-utilized-utilizing',
        'vanish-vanishes-vanished-vanished-vanishing','verify-verifies-verified-verified-verifying',
        'withdraw-withdraws-withdrew-withdrawn-withdrawing',
    ],
    4 => [
        'activate-activates-activated-activated-activating','advertise-advertises-advertised-advertised-advertising',
        'analyze-analyzes-analyzed-analyzed-analyzing','announce-announces-announced-announced-announcing',
        'commence-commences-commenced-commenced-commencing','compete-competes-competed-competed-competing',
        'compile-compiles-compiled-compiled-compiling','complain-complains-complained-complained-complaining',
        'compose-composes-composed-composed-composing','compute-computes-computed-computed-computing',
        'conceive-conceives-conceived-conceived-conceiving','conclude-concludes-concluded-concluded-concluding',
        'condense-condenses-condensed-condensed-condensing','conserve-conserves-conserved-conserved-conserving',
        'consider-considers-considered-considered-considering','construct-constructs-constructed-constructed-constructing',
        'continue-continues-continued-continued-continuing','contract-contracts-contracted-contracted-contracting',
        'contribute-contributes-contributed-contributed-contributing','convince-convinces-convinced-convinced-convincing',
        'cooperate-cooperates-cooperated-cooperated-cooperating','criticize-criticizes-criticized-criticized-criticizing',
        'cultivate-cultivates-cultivated-cultivated-cultivating','customize-customizes-customized-customized-customizing',
        'decorate-decorates-decorated-decorated-decorating','dedicate-dedicates-dedicated-dedicated-dedicating',
        'determine-determines-determined-determined-determining','disappear-disappears-disappeared-disappeared-disappearing',
        'discharge-discharges-discharged-discharged-discharging','discover-discovers-discovered-discovered-discovering',
        'educate-educates-educated-educated-educating','embarrass-embarrasses-embarrassed-embarrassed-embarrassing',
        'emphasize-emphasizes-emphasized-emphasized-emphasizing','encourage-encourages-encouraged-encouraged-encouraging',
        'enforce-enforces-enforced-enforced-enforcing','enhance-enhances-enhanced-enhanced-enhancing',
        'entertain-entertains-entertained-entertained-entertaining','enumerate-enumerates-enumerated-enumerated-enumerating',
        'establish-establishes-established-established-establishing','estimate-estimates-estimated-estimated-estimating',
        'evaluate-evaluates-evaluated-evaluated-evaluating','examine-examines-examined-examined-examining',
        'fabricate-fabricates-fabricated-fabricated-fabricating','familiarize-familiarizes-familiarized-familiarized-familiarizing',
        'identify-identifies-identified-identified-identifying','illustrate-illustrates-illustrated-illustrated-illustrating',
        'instruct-instructs-instructed-instructed-instructing','interpret-interprets-interpreted-interpreted-interpreting',
        'introduce-introduces-introduced-introduced-introducing','maintain-maintains-maintained-maintained-maintaining',
        'maximize-maximizes-maximized-maximized-maximizing','mechanize-mechanizes-mechanized-mechanized-mechanizing',
        'modernize-modernizes-modernized-modernized-modernizing','minimize-minimizes-minimized-minimized-minimizing',
        'nominate-nominates-nominated-nominated-nominating','participate-participates-participated-participated-participating',
        'recognize-recognizes-recognized-recognized-recognizing','strengthen-strengthens-strengthened-strengthened-strengthening',
        'summarize-summarizes-summarized-summarized-summarizing','supervise-supervises-supervised-supervised-supervising',
        'symbolize-symbolizes-symbolized-symbolized-symbolizing','tabulate-tabulates-tabulated-tabulated-tabulating',
        'terminate-terminates-terminated-terminated-terminating','transcribe-transcribes-transcribed-transcribed-transcribing',
        'translate-translates-translated-translated-translating','withstand-withstands-withstood-withstood-withstanding',
        'withhold-withholds-withheld-withheld-withholding',
    ],
    5 => [
        'administer-administers-administered-administered-administering','allocate-allocates-allocated-allocated-allocating',
        'anticipate-anticipates-anticipated-anticipated-anticipating','assemble-assembles-assembled-assembled-assembling',
        'authorize-authorizes-authorized-authorized-authorizing','calculate-calculates-calculated-calculated-calculating',
        'categorize-categorizes-categorized-categorized-categorizing','classify-classifies-classified-classified-classifying',
        'communicate-communicates-communicated-communicated-communicating','coordinate-coordinates-coordinated-coordinated-coordinating',
        'correspond-corresponds-corresponded-corresponded-corresponding','demonstrate-demonstrates-demonstrated-demonstrated-demonstrating',
        'diagnose-diagnoses-diagnosed-diagnosed-diagnosing','distinguish-distinguishes-distinguished-distinguished-distinguishing',
        'distribute-distributes-distributed-distributed-distributing','diversify-diversifies-diversified-diversified-diversifying',
        'eliminate-eliminates-eliminated-eliminated-eliminating','enlighten-enlightens-enlightened-enlightened-enlightening',
        'facilitate-facilitates-facilitated-facilitated-facilitating','formulate-formulates-formulated-formulated-formulating',
        'implement-implements-implemented-implemented-implementing','improvise-improvises-improvised-improvised-improvising',
        'incorporate-incorporates-incorporated-incorporated-incorporating','integrate-integrates-integrated-integrated-integrating',
        'intervene-intervenes-intervened-intervened-intervening','liquidate-liquidates-liquidated-liquidated-liquidating',
        'methodize-methodizes-methodized-methodized-methodizing','negotiate-negotiates-negotiated-negotiated-negotiating',
        'officiate-officiates-officiated-officiated-officiating','originate-originates-originated-originated-originating',
        'participate-participates-participated-participated-participating','prescribe-prescribes-prescribed-prescribed-prescribing',
        'prioritize-prioritizes-prioritized-prioritized-prioritizing','recommend-recommends-recommended-recommended-recommending',
        'reconcile-reconciles-reconciled-reconciled-reconciling','regulate-regulates-regulated-regulated-regulating',
        'represent-represents-represented-represented-representing','specialize-specializes-specialized-specialized-specializing',
        'stimulate-stimulates-stimulated-stimulated-stimulating','straighten-straightens-straightened-straightened-straightening',
        'transcribe-transcribes-transcribed-transcribed-transcribing','transmit-transmits-transmitted-transmitted-transmitting',
        'troubleshoot-troubleshoots-troubleshot-troubleshot-troubleshooting','visualize-visualizes-visualized-visualized-visualizing',
    ],
    6 => [
        'arbitrate-arbitrates-arbitrated-arbitrated-arbitrating','articulate-articulates-articulated-articulated-articulating',
        'ascertain-ascertains-ascertained-ascertained-ascertaining','collaborate-collaborates-collaborated-collaborated-collaborating',
        'conceptualize-conceptualizes-conceptualized-conceptualized-conceptualizing','consolidate-consolidates-consolidated-consolidated-consolidating',
        'correlate-correlates-correlated-correlated-correlating','differentiate-differentiates-differentiated-differentiated-differentiating',
        'discriminate-discriminates-discriminated-discriminated-discriminating','disseminate-disseminates-disseminated-disseminated-disseminating',
        'extrapolate-extrapolates-extrapolated-extrapolated-extrapolating','individualize-individualizes-individualized-individualized-individualizing',
        'investigate-investigates-investigated-investigated-investigating','orchestrate-orchestrates-orchestrated-orchestrated-orchestrating',
        'publicize-publicizes-publicized-publicized-publicizing','rehabilitate-rehabilitates-rehabilitated-rehabilitated-rehabilitating',
        'reinforce-reinforces-reinforced-reinforced-reinforcing','reorganize-reorganizes-reorganized-reorganized-reorganizing',
        'revitalize-revitalizes-revitalized-revitalized-revitalizing','scrutinize-scrutinizes-scrutinized-scrutinized-scrutinizing',
        'standardize-standardizes-standardized-standardized-standardizing','strategize-strategizes-strategized-strategized-strategizing',
        'substantiate-substantiates-substantiated-substantiated-substantiating','synthesize-synthesizes-synthesized-synthesized-synthesizing',
        'systematize-systematizes-systematized-systematized-systematizing',
    ],
];

// ---- Helpers (§8.4) ----
function vb_prompt_box(string $html, int $minHeight = 100): void {
    echo '<div style="width:fit-content;max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:24px 40px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function vb_fb_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function vb_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// ---- Question generation (§6) ----
function build_vb_question(array $dataByTier, string $lvl, int $grd, string $sessionKey): ?array {
    $tier = resolve_vb_tier($lvl, $grd);
    $pool = $dataByTier[$tier] ?? [];
    if (empty($pool)) return null;

    $parsed = [];
    foreach ($pool as $entry) {
        $parts = explode('-', $entry);
        if (count($parts) !== 5) continue;
        $parsed[] = [
            'base'    => $parts[0],
            'present' => $parts[1],
            'past'    => $parts[2],
            'pp'      => $parts[3],
            'ing'     => $parts[4],
        ];
    }
    if (empty($parsed)) return null;

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($parsed as $i => $v) {
        $key = "t$tier:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        foreach ($parsed as $i => $v) $available[] = ['key' => "t$tier:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $verb = $parsed[$pick['idx']];

    $last1 = (int)($_SESSION[$sessionKey]['lastopt1'] ?? 0);
    $last2 = (int)($_SESSION[$sessionKey]['lastopt2'] ?? 0);
    $tries = 0;
    do {
        $opt = rand(1, 4);
        $tries++;
    } while (($opt === $last1 || $opt === $last2) && $tries < 20);
    $_SESSION[$sessionKey]['lastopt2'] = $last1;
    $_SESSION[$sessionKey]['lastopt1'] = $opt;

    switch ($opt) {
        case 1: $formName = 'simple past';             $answer = $verb['past'];    break;
        case 2: $formName = 'simple present singular'; $answer = $verb['present']; break;
        case 3: $formName = 'present participle';      $answer = $verb['ing'];     break;
        default:$formName = 'past participle';         $answer = $verb['pp'];      break;
    }

    return [
        'verb'     => $verb['base'],
        'formname' => $formName,
        'answer'   => $answer,
        'phinf'    => ($grd < 4) ? '' : 'the infinitive ',
        'lvl'      => $lvl,
    ];
}

// ---- Answer processing (§7 — text input) ----
$result = null; $scorer = null;
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $userRaw = (string)($_POST['answer'] ?? '');
    $userNorm = strtolower(trim($userRaw));
    $correctNorm = strtolower(trim($cur['answer']));
    $isCorrect = ($userNorm === $correctNorm);

    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer(
        $isCorrect ? $cur['answer'] : $userNorm,
        $cur['answer'],
        $cur['lvl']
    );

    $result = ['correct' => $isCorrect, 'clicked' => $userRaw, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_vb_question($dataByTier, $lvl, $grd, $sessionKey);
    if ($newQ !== null) $_SESSION[$sessionKey]['current'] = $newQ;
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $prefix    = 'The ' . $cur['formname'] . ' form of ' . $cur['phinf']
               . "'to " . $cur['verb'] . "' is ";
    $prefixEsc = vb_bind_last_words($prefix);
    $ansHtml   = '<strong style="color:#CC0066;font-size:15pt;">\''
               . htmlspecialchars($cur['answer']) . '\'</strong>';
    $fbHtml    = $prefixEsc . $ansHtml . '.';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php vb_fb_box('<div style="width:100%;font-size:16pt;color:#333;line-height:1.65;text-wrap:balance;">' . $fbHtml . '</div>', 130); ?>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null) {
        echo '<p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto;">No question could be generated. Please try again.</p>';
    } else {
        $anslen = strlen($q['answer']) + 2;
        $maxlen = $anslen + 2;
?>
  <?php vb_prompt_box(
      '<span style="font-size:17pt;font-weight:700;color:#800080;line-height:1.35;">'
    . "What's the "
    . '<span style="color:#CC0066;">' . htmlspecialchars($q['formname']) . '</span>'
    . ' form of ' . htmlspecialchars($q['phinf'])
    . '<span style="color:#CC0066;">\'to ' . htmlspecialchars($q['verb']) . '\'</span>?'
    . '</span>', 100
  ); ?>
  <div style="margin:24px auto 20px;">
    <input type="text" name="answer" size="<?php echo $anslen; ?>" maxlength="<?php echo $maxlen; ?>"
           autocomplete="off"
           style="font-family:Arial,sans-serif;font-size:24pt;font-weight:700;
                  color:#0000CC;text-align:center;padding:8px 12px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  box-sizing:border-box;max-width:100%;">
  </div>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit1" value=" Submit " style="margin-right:12px;font-family:Arial,sans-serif;font-size:11pt;">
    <input type="submit" name="Submit2" value=" New Question " style="margin-left:12px;font-family:Arial,sans-serif;font-size:11pt;">
  </div>
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