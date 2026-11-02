<?php
// english/modules/verbs-reg-irreg.php
// Regular and Irregular Verbs — given a verb in base form, identify whether it
// is a regular or an irregular verb.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 5 content tiers via (level × grade); 2 M/C choices (1×2 grid).
//
// Data convention: entries are '<base>-<pastOrParticiple>' with an optional
// trailing '*' marking that the shown form is a past participle (not past
// tense) — e.g. 'mow-mown*'. The asterisk is stripped at definition time.
//
// LAYOUT RULE (permanent): "Click on the correct answer below." ALWAYS sits
// immediately above the choice buttons — never above the verb box.

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
$moduleTitle = 'Regular and Irregular Verbs';
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
function resolve_vri_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    // Hard — legacy Hard formula
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// ---- Data (§5) — verbatim from legacy, pre-parsed at definition time ----
$rawIrreg = [
    1 => [
        'be-was','bend-bent','come-came','dig-dug','do-did','eat-ate','fall-fell',
        'feed-fed','feel-felt','find-found','fly-flew','get-got','give-gave','go-went',
        'grow-grew','have-had','hear-heard','hide-hid','hold-held','keep-kept',
        'know-knew','lay-laid','make-made','meet-met','mow-mown*','pay-paid','put-put',
        'read-read','ride-rode','ring-rang','rise-rose','run-ran','say-said','see-saw',
        'send-sent','sell-sold','sing-sang','sit-sat','swim-swam','take-took',
        'tell-told','wake-woke','win-won','weep-wept',
    ],
    2 => [
        'bear-bore','beat-beat','begin-began','bind-bound','bite-bit','blow-blew',
        'break-broke','build-built','buy-bought','catch-caught','choose-chose',
        'draw-drew','drink-drank','drive-drove','fight-fought','hang-hung',
        'kneel-knelt','lead-led','leave-left','lend-lent','lose-lost','mean-meant',
        'quit-quit','saw-sawn*','sew-sewn*','shine-shone','shoot-shot','seek-sought',
        'sink-sank','sleep-slept','sow-sown*','spend-spent','spin-spun','stand-stood',
        'stick-stuck','sting-stung','tear-tore','wear-wore','weave-wove','teach-taught',
        'write-wrote',
    ],
    3 => [
        'awake-awoke','breed-bred','bring-brought','cling-clung','deal-dealt',
        'dream-dreamt','forget-forgot','forgive-forgave','flee-fled','fling-flung',
        'freeze-froze','prove-proven*','redraw-redrew','shake-shook','slay-slew',
        'slide-slid','sling-slung','speak-spoke','steal-stole','strike-struck',
        'string-strung','swear-swore','sweep-swept','swell-swollen*','swing-swung',
        'think-thought','wind-wound',
    ],
    4 => [
        'bleed-bled','creep-crept','forbid-forbade','foretell-foretold','foresee-foresaw',
        'grind-ground','handhold-handheld','misbind-misbound','mislead-misled',
        'mismake-mismade','mistake-mistook','overcome-overcame','oversee-oversaw',
        'rebind-rebound','rewind-rewound','shrink-shrank','slink-slunk','spring-sprang',
        'stink-stank','strew-strewn*','stride-strode','strive-strove','unbind-unbound',
        'understand-understood','unwind-unwound','wring-wrung',
    ],
    5 => [
        'caretake-caretook','forsake-forsook','handshake-handshook',
        'misunderstand-misunderstood','overdraw-overdrew','outdraw-outdrew',
        'overhang-overhung','overhear-overheard','overtake-overtook','overwind-overwound',
        'preshrink-preshrank','undertake-undertook','withdraw-withdrew',
        'withhold-withheld','withstand-withstood',
    ],
];

$rawReg = [
    1 => [
        'add-added','ask-asked','bake-baked','beg-begged','boil-boiled','bury-buried',
        'call-called','chew-chewed','clap-clapped','copy-copied','cry-cried','dance-danced',
        'earn-earned','fry-fried','hate-hated','help-helped','hope-hoped','joke-joked',
        'jump-jumped','kick-kicked','kill-killed','kiss-kissed','like-liked','love-loved',
        'move-moved','need-needed','obey-obeyed','open-opened','paint-painted','park-parked',
        'pick-picked','play-played','pray-prayed','pull-pulled','push-pushed','race-raced',
        'rub-rubbed','talk-talked','type-typed','use-used','wait-waited','walk-walked',
        'want-wanted','warn-warned','wink-winked','yell-yelled',
    ],
    2 => [
        'admire-admired','agree-agreed','allow-allowed','argue-argued','behave-behaved',
        'borrow-borrowed','brush-brushed','change-changed','chase-chased','cheat-cheated',
        'cheer-cheered','clean-cleaned','count-counted','create-created','cycle-cycled',
        'drag-dragged','enjoy-enjoyed','gather-gathered','greet-greeted','guess-guessed',
        'laugh-laughed','listen-listened','marry-married','offer-offered','print-printed',
        'punch-punched','relax-relaxed','reply-replied','scold-scolded','snore-snored',
        'stare-stared','start-started','study-studied','thank-thanked','visit-visited',
        'worry-worried',
    ],
    3 => [
        'accept-accepted','adopt-adopted','admire-admired','admit-admitted','advise-advised',
        'arrive-arrived','assist-assisted','attack-attacked','collect-collected',
        'compare-compared','complain-complained','confess-confessed','control-controlled',
        'damage-damaged','destroy-destroyed','disband-disbanded','divide-divided',
        'employ-employed','explain-explained','harass-harassed','offend-offended',
        'punish-punished','retire-retired','select-selected','travel-travelled',
        'trouble-troubled',
    ],
    4 => [
        'achieve-achieved','approve-approved','assemble-assembled','classify-classified',
        'confess-confessed','deliver-delivered','discover-discovered','exercise-exercised',
        'expand-expanded','explain-explained','fabricate-fabricated','finalize-finalized',
        'generate-generated','identify-identified','instruct-instructed','measure-measured',
        'minimize-minimized','navigate-navigated','operate-operated','originate-originated',
        'prescribe-prescribed','purchase-purchased','purify-purified','quantify-quantified',
        'question-questioned','radiate-radiated','rebound-rebounded','recognize-recognized',
        'remember-remembered','respond-responded','simplify-simplified','subtract-subtracted',
        'utilize-utilized',
    ],
    5 => [
        'announce-announced','appreciate-appreciated','challenge-challenged',
        'construct-constructed','contrive-contrived','depreciate-depreciated',
        'dissipate-dissipated','distinguish-distinguished','encourage-encouraged',
        'establish-established','estimate-estimated','expedite-expedited',
        'grandstand-grandstanded','innovate-innovated','integrate-integrated',
        'interrupt-interrupted','introduce-introduced','initiate-initiated',
        'irritate-irritated','litigate-litigated','liquidate-liquidated',
        'mechanize-mechanized','misalign-misaligned','negotiate-negotiated',
        'neutralize-neutralized','officiate-officiated','prioritize-prioritized',
        'publicize-publicized','recommend-recommended','reconcile-reconciled',
        'scrutinize-scrutinized','simulate-simulated','socialize-socialized',
        'specialize-specialized','visualize-visualized',
    ],
];

// Parse into ['base', 'form', 'is_pp'] at definition time (§5.1).
function vri_parse(string $raw): array {
    $pos = strpos($raw, '-');
    if ($pos === false) return ['base' => $raw, 'form' => '', 'is_pp' => false];
    $base = substr($raw, 0, $pos);
    $form = substr($raw, $pos + 1);
    $is_pp = false;
    if (substr($form, -1) === '*') {
        $is_pp = true;
        $form = substr($form, 0, -1);
    }
    return ['base' => $base, 'form' => $form, 'is_pp' => $is_pp];
}

$dataByTier = [];
foreach ($rawIrreg as $tier => $list) {
    $dataByTier[$tier]['irregular'] = array_map('vri_parse', $list);
}
foreach ($rawReg as $tier => $list) {
    $dataByTier[$tier]['regular'] = array_map('vri_parse', $list);
}

// ---- Helpers (§8.4) ----
// Hugging box: fits the verb (base) or base-past pair with ample padding.
function vri_word_box(string $html, int $minHeight = 100): void {
    echo '<div style="width:fit-content;max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:28px 48px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function vri_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// ---- Question generation (§6) ----
function build_vri_question(array $dataByTier, string $lvl, int $grd, string $sessionKey): ?array {
    $tier = resolve_vri_tier($lvl, $grd);
    $tierData = $dataByTier[$tier] ?? null;
    if (!$tierData) return null;

    // 1 = irregular question, 2 = regular question (legacy 50/50 roll).
    $form = rand(1, 2);
    if ($form === 1) {
        $pool    = $tierData['irregular'];
        $correct = 'irregular';
    } else {
        $pool    = $tierData['regular'];
        $correct = 'regular';
    }
    if (empty($pool)) return null;

    // No-repeat keyed per (tier, form, index).
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        $key = "t$tier:f$form:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:f$form:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($pool as $i => $item) $available[] = ['key' => "t$tier:f$form:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $item = $pool[$pick['idx']];

    $choices = ['regular', 'irregular'];
    shuffle($choices);

    return [
        'base'    => $item['base'],
        'form'    => $item['form'],
        'is_pp'   => $item['is_pp'],
        'correct' => $correct,
        'choices' => $choices,
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
    $newQ = build_vri_question($dataByTier, $lvl, $grd, $sessionKey);
    if ($newQ !== null) $_SESSION[$sessionKey]['current'] = $newQ;
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $isRegular = ($cur['correct'] === 'regular');
    if ($isRegular) {
        $explain = "The word '" . htmlspecialchars($cur['base'])
                 . "' is a <strong style=\"color:#CC0066;\">regular verb</strong> "
                 . "because its past tense and past participle are formed in the "
                 . "regular manner, i.e., by adding -d or -ed to its end.";
    } else {
        $formKind = $cur['is_pp'] ? 'past participle' : 'past tense';
        $explain  = "The word '" . htmlspecialchars($cur['base'])
                  . "' is an <strong style=\"color:#CC0066;\">irregular verb</strong> "
                  . "because its " . $formKind . ", <strong style=\"color:#CC0066;\">'"
                  . htmlspecialchars($cur['form'])
                  . "'</strong>, is not formed by adding -d or -ed to its end.";
    }
    $baseLen = strlen($cur['base']);
    $pairLen = $baseLen + 1 + strlen($cur['form']);
    $pairFont = ($pairLen > 20) ? '16pt' : ($pairLen > 14 ? '18pt' : '22pt');
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php vri_word_box(
      '<span style="font-size:' . $pairFont . ';font-weight:700;color:#333;line-height:1.4;">'
    . htmlspecialchars($cur['base'])
    . '<span style="color:#888;">-</span>'
    . '<span style="color:#CC0066;">' . htmlspecialchars($cur['form']) . '</span>'
    . '</span>', 100
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    <?php echo $explain; ?>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null) {
        echo '<p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto;">No question could be generated. Please try again.</p>';
    } else {
        $baseLen = strlen($q['base']);
        $baseFont = ($baseLen > 14) ? '18pt' : ($baseLen > 10 ? '20pt' : '24pt');
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Is this verb <span style="color:#0000CC;">regular</span> or <span style="color:#0000CC;">irregular</span>?
  </div>
  <?php vri_word_box(
      '<span style="font-size:' . $baseFont . ';font-weight:700;color:#333;line-height:1.4;">'
    . htmlspecialchars($q['base'])
    . '</span>', 100
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:14pt;color:#666;max-width:480px;margin:0 auto 22px;">
    Click on the correct answer below.
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
    <tr>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode('regular'); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:180px;max-width:240px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          Regular
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode('irregular'); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:180px;max-width:240px;min-height:64px;padding:12px 22px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          Irregular
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