<?php
// english/modules/syllable-division.php
// Syllable Division — divide a word into its syllables using hyphens.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 6 content tiers via (level × grade); text-input answer.
//
// Text-input mechanics (preserved from legacy):
//   • Input is prefilled with the word (no hyphens); student inserts hyphens.
//   • Comparison ignores spaces and case — matches legacy behavior.
//   • Correct feedback reads: "The <N> syllables of the word '<word>' are
//     divided this way: '<syl-la-ble>'."
//
// Word box uses width:fit-content so the box "hugs" the word (with ample
// padding) instead of occupying the full 480px column.

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
$moduleTitle = 'Syllable Division';
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
function resolve_sd_tier(string $lvl, int $grd): int {
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
// Format: "<syllableCount><syl-la-ble>"
$dataByTier = [
    1 => [
        "2an-gry","2an-swer","2ar-rive","2ba-sic","2be-came","2be-fore","2but-ter",
        "2cap-tain","2cave-man","2cor-rect","2coun-try","2day-dream","2de-cide",
        "2de-fine","2di-et","2dis-count","2dis-miss","2dis-play","2ear-ly","2ea-ten",
        "2e-ven","2ex-hale","2faith-ful","2fan-cy","2fol-low","2foot-ball","2fund-ed",
        "2gi-ant","2gram-mar","2grant-ed","2hack-er","2hap-py","2hun-dred","2hun-gry",
        "2in-side","2kick-ing","2kind-ness","2lad-der","2land-ed","2lit-tle","2lo-tion",
        "2lov-ing","2ma-jor","2mar-ket","2mend-ed","2na-tion","2na-ture","2non-sense",
        "2mis-take","2mo-ney","2out-doors","2play-er","2pos-ture","2pro-ject","2pur-ple",
        "2re-main","2rest-ing","2sis-ter","2tax-es","2thank-ful","2tooth-brush",
        "2tum-ble","2un-der","2un-tie","2un-true","2un-til","2wo-men",
    ],
    2 => [
        "2a-gainst","3af-ter-noon","3al-pha-bet","2be-tween","2black-est","2broth-er",
        "2bush-es","2cab-in","3cou-ra-geous","3di-rec-tion","2dis-ease","3e-nor-mous",
        "2e-nough","2ex-ist","3ex-pen-sive","3fol-low-ing","3for-get-ful","2hint-ed",
        "2home-work","3im-por-tant","2la-bel","2lack-ing","2lev-el","3mer-ci-ful",
        "2moth-er","3mo-tion-less","2mount-ed","2nev-er","2nick-el","2noth-ing",
        "3nu-tri-tious","2paint-ed","2peo-ple","2pow-er","2reach-ing","3ro-man-tic",
        "2round-ed","2sci-ence","2scold-ed","2scout-ed","2self-ish","2sen-tence",
        "2spe-cial","2spot-less","3sud-den-ly","2taunt-ed","3ter-ri-ble","3to-mor-row",
        "3won-der-ful",
    ],
    3 => [
        "3ad-van-tage","3ag-gres-sive","3an-i-mal","3an-i-mate","3as-sign-ment",
        "3at-trac-tive","4com-mu-ni-ty","3com-plete-ly","3con-fi-dent","3dan-ger-ous",
        "3deaf-en-ing","3de-liv-er","3de-mand-ed","4des-ti-na-tion","3di-a-mond",
        "3em-pha-size","3en-clo-sure","3e-quip-ment","3ex-am-ple","3ex-cel-lent",
        "3ex-clud-ed","3eye-lash-es","3fluo-res-cent","3for-mal-ize","3for-mu-late",
        "3gal-va-nized","3grad-u-ate","3guar-an-tee","3how-ev-er","3hyp-no-tize",
        "3in-clud-ed","4in-for-ma-tion","3op-po-site","3per-ma-nent","4per-mis-si-ble",
        "3pos-si-ble","3pro-ce-dure","3prop-er-ty","3re-mem-ber","3skill-ful-ly",
        "3suc-cess-ful","4su-per-mar-ket","3syn-the-size","3to-geth-er","3trou-ble-shoot",
        "3un-cer-tain","3won-der-ful","3var-i-ous","3vid-e-o",
    ],
    4 => [
        "4ac-tu-al-ly","4am-bi-dex-trous","4a-nal-o-gous","4an-i-ma-tion",
        "4ap-pro-pri-ate","4co-in-ci-dence","4con-sci-en-tious","4con-spic-u-ous",
        "3dan-ger-ous","3de-port-ed","3de-vel-op","3dis-as-ter","3dis-cov-er",
        "3dis-tin-guished","4di-ver-si-ty","4e-rad-i-cate","4e-the-re-al","3gov-ern-ment",
        "4her-ni-at-ed","4in-cred-u-lous","4in-vin-ci-ble","4lit-i-gat-ed",
        "4lo-cal-iz-ing","4lu-bri-ca-tion","4lux-u-ri-ant","4ma-lef-i-cent",
        "4ma-lev-o-lent","4ma-te-ri-al","3neb-u-lous","4ne-ces-si-tate","3par-a-graph",
        "4par-tic-i-pate","4pe-ri-od-ic","3pet-u-lant","4re-la-tion-ship","3rem-i-nisce",
        "3sep-a-rate","3sim-i-lar","4sim-u-la-tion","3stan-dard-ize","4su-per-fi-cial",
        "4var-i-a-tion",
    ],
    5 => [
        "5ab-bre-vi-a-tion","4ac-tiv-i-ty","5al-le-vi-at-ed","5an-tic-i-pat-ing",
        "5as-tro-nom-i-cal","6au-to-bi-og-ra-phy","4cal-i-bra-tion","4car-i-ca-ture",
        "4char-ac-ter-ized","4com-mer-cial-ized","5con-cep-tu-al-ized",
        "5con-sol-i-da-tion","4de-hy-drat-ed","5de-pre-ci-a-tion","5de-te-ri-o-rate",
        "5dis-crim-i-na-tion","5dis-sem-i-nat-ed","5e-lec-tric-i-ty","4e-val-u-ate",
        "4ex-pe-ri-ence","5fa-cil-i-tat-ed","4fa-mil-iar-ized","4gran-u-lat-ed",
        "5hu-mil-i-at-ed","5im-me-di-ate-ly","5in-cor-po-rat-ed","6in-di-vid-u-al-ize",
        "5in-oc-u-la-tion","4liq-ui-dat-ing","5mar-gin-al-iz-ing","4no-men-cla-ture",
        "4par-tic-u-lar","5pas-teur-i-za-tion","5phil-o-soph-i-cal","4pop-u-la-tion",
        "4rec-om-mend-ed","4rem-i-nis-cent","4rep-ri-mand-ed","4tem-per-a-ture",
        "4va-ri-e-ty",
    ],
    6 => [
        "6ac-cli-ma-ti-za-tion","5al-le-vi-a-tion","5at-ten-u-a-tion",
        "6cat-e-gor-i-cal-ly","6char-ac-ter-i-za-tion","6com-mer-cial-i-za-tion",
        "7con-cep-tu-al-i-za-tion","6de-te-ri-o-ra-tion","6dif-fer-en-ti-a-tion",
        "5dis-sem-i-na-tion","6di-ver-si-fi-ca-tion","6e-lec-tri-fi-ca-tion",
        "6e-mul-si-fi-ca-tion","5e-val-u-a-tion","5fa-cil-i-ta-tion",
        "6fa-mil-iar-i-za-tion","5hu-mil-i-a-tion","7in-sur-mount-a-bil-i-ty",
        "6mar-gin-al-i-za-tion","5par-a-pher-na-lia","5pre-cip-i-ta-tion",
        "6on-o-mat-o-poe-ia","5re-ac-tiv-i-ty","5rec-om-men-da-tion",
        "6ex-po-nen-ti-a-tion","6dis-com-bob-u-la-tion","6il-le-git-i-ma-cy",
    ],
];

// ---- Helpers (§8.4) ----
// Standard box — used on the feedback page (contains a full sentence).
function sd_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Word box — hugs the word (width:fit-content), capped at 480px, with ample
// padding so short words like "an" or "day" don't render as a skinny capsule.
function sd_word_box(string $html, int $minHeight = 100): void {
    echo '<div style="width:fit-content;max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:28px 52px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- Question generation (§6) ----
function build_sd_question(array $dataByTier, string $lvl, int $grd, string $sessionKey): array {
    $tier = resolve_sd_tier($lvl, $grd);
    $pool = $dataByTier[$tier];

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $entry) {
        $key = "t$tier:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        foreach ($pool as $i => $entry) $available[] = ['key' => "t$tier:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $entry = $pool[$pick['idx']];
    $num   = substr($entry, 0, 1);
    $ans   = substr($entry, 1);
    $word  = str_replace('-', '', $ans);

    return [
        'correct' => $ans,
        'word'    => $word,
        'num'     => $num,
        'lvl'     => $lvl,
    ];
}

// ---- Answer processing (§7 — text input) ----
$result = null; $scorer = null;
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $userRaw = strtolower(trim((string)($_POST['answer'] ?? '')));
    $normUser    = str_replace(' ', '', $userRaw);
    $normCorrect = str_replace(' ', '', strtolower($cur['correct']));
    $isCorrect = ($normUser === $normCorrect);

    $scorer = new Scorer($conn, $moduleId);
    // Pass the canonical answer when correct (registers a hit even if
    // the user's spacing/case differed), otherwise the user's input.
    $scorer->processAnswer(
        $isCorrect ? $cur['correct'] : $userRaw,
        $cur['correct'],
        $cur['lvl']
    );

    $result = ['correct' => $isCorrect, 'clicked' => $userRaw, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $_SESSION[$sessionKey]['current'] = build_sd_question($dataByTier, $lvl, $grd, $sessionKey);
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
render_header($moduleTitle.' - '.$lvl, $moduleTitle.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $snumMap = ['1'=>'one','2'=>'two','3'=>'three','4'=>'four','5'=>'five','6'=>'six','7'=>'seven'];
    $snum = $snumMap[$cur['num']] ?? $cur['num'];
    $boxHtml = 'The ' . $snum . ' syllables of the word '
             . '<strong style="color:#333;">\'' . htmlspecialchars($cur['word']) . '\'</strong> '
             . 'are divided this way: '
             . '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['correct']) . '\'</strong>.';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php sd_box('<div style="width:100%;font-size:16pt;line-height:1.65;text-wrap:balance;">' . $boxHtml . '</div>', 120); ?>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $wordLen  = strlen($q['word']);
    $wordFont = ($wordLen > 16) ? '16pt' : '19pt';
    // Legacy sized the input to the answer's length (with hyphens) plus slack;
    // cap at 22 chars to keep the input within the 480px column.
    $anslen = min(22, strlen($q['correct']) + 3);
    $maxlen = $anslen + 3;
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Divide the word below into its <span style="color:#CC0066;">syllables</span>.
  </div>
  <?php sd_word_box('<span style="font-size:20pt;font-weight:700;color:#333;line-height:1.5;">' . htmlspecialchars($q['word']) . '</span>', 100); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 6px;">
    Use a hyphen (-) to separate adjacent syllables.
  </div>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#666;max-width:480px;margin:0 auto 18px;">
    Type your answer in the box below.
  </div>
  <div style="margin:0 auto 20px;">
    <input type="text" name="answer"
           size="<?php echo $anslen; ?>" maxlength="<?php echo $maxlen; ?>"
           value="<?php echo htmlspecialchars($q['word']); ?>"
           style="font-family:Arial,sans-serif;font-size:24pt;font-weight:700;
                  color:#0000CC;text-align:center;padding:8px 12px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  box-sizing:border-box;max-width:100%;">
  </div>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit1" value=" Submit " style="margin-right:12px;font-family:Arial,sans-serif;font-size:11pt;">
    <input type="submit" name="Submit2" value=" New Question " style="margin-left:12px;font-family:Arial,sans-serif;font-size:11pt;">
  </div>
<?php endif; ?>

<!-- Difficulty radios (§10.4 — Easy / Hard only) -->
<div align="center" style="margin-top:20px;">
  <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
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