<?php
// science/modules/wp-impulse-momentum.php
// WP: Impulse and Momentum — numeric word problems with worked solutions.
// Two levels (Easy / Hard). In the legacy page the question form depended on level only
// (the grade-based $arrnum was computed but never used), so grade has no effect on content.
//
// CONVERSION NOTES
//  - Legacy Medium folded into Hard; Hard keeps its own form (21, stopping time). Medium form 11
//    (equal momentum of two objects) is not carried over.
//  - Fixes: the final answer line is highlighted in every solution; values are rounded once so displayed
//    numbers match the worked solution (no float noise); double spaces in problem text removed; the
//    stopping-time solution uses real subscripts (p2 -> p<sub>2</sub>) and spaces before "N"; answer box no longer
//    sized to the answer (legacy leaked its length); empty submissions re-show the question instead of being scored.
//  - Dead code removed: mysql_* / SPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, $thetapic, $prob3a, no-op rand(1,1) calls, unused font strings, FrontPage JS, legacy page chrome.

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
$moduleTitle = 'Impulse and Momentum';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$imgBase = $base . '/science/modules/images/wp-images/';   // legacy: ../modules/images/wp-images/

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Question variants per level: [form, qform] (legacy form numbers kept for traceability) ----
//  Easy: form 1 (momentum)  -> qform 1 momentum, 2 velocity, 3 mass
//        form 2 (impulse)   -> qform 1 impulse, 2 force, 3 time
//  Hard: form 21            -> stopping time for a moving object (with figure)
function resolve_im_variants(string $lvl): array {
    return ($lvl === 'Easy')
        ? [[1, 1], [1, 2], [1, 3], [2, 1], [2, 2], [2, 3]]
        : [[21, 1]];
}

// ---- Helpers ----
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function im_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Number -> string without trailing zeros.
function im_fmt(float $x, int $dec = 5): string {
    $s = number_format($x, $dec, '.', '');
    return (strpos($s, '.') !== false) ? rtrim(rtrim($s, '0'), '.') : $s;
}

// Plain text -> HTML. [[x]] = highlighted value, ^n = superscript, _{x} = subscript, newline = <br>.
function im_html(string $s, bool $bind = false): string {
    $e = $bind ? bind_last_words($s) : htmlspecialchars($s);
    $e = preg_replace('/\[\[(.*?)\]\]/s', '<span style="color:#CC0066;">$1</span>', $e);
    $e = preg_replace('/\^(\d)/', '<sup>$1</sup>', $e);
    $e = preg_replace('/_\{(\w+)\}/', '<sub>$1</sub>', $e);
    return nl2br($e, false);
}

// ---- Problem generator ----
function im_build(int $form, int $qform): array {
    $hl = fn(string $s): string => '[[' . $s . ']]';
    $f  = 'im_fmt';
    $pic = '';
    $small  = ['cart', 'bicycle', 'machine', 'trolley'];
    $big    = ['car', 'van', 'pickup truck', 'minibus', 'minivan', 'sports car', 'jeepney', 'boat'];
    $things = ['box', 'crate', 'rock', 'block of wood', 'toy truck', 'bag', 'desk', 'chair'];
    $objopt = mt_rand(1, 2);

    if ($form === 1) {                                   // momentum
        if ($objopt === 1) {
            $obj = $small[mt_rand(0, 3)];  $mass = mt_rand(21, 79);     $velo = mt_rand(11, 45);
        } else {
            $obj = $big[mt_rand(0, 7)];    $mass = mt_rand(1750, 2499); $velo = mt_rand(25, 90);
        }
        $momentum = $mass * $velo;
        $M = $hl($mass . ' kilograms');
        $V = $hl($velo . ' m/s');
        $P = $hl($momentum . ' kg m/s');
        $opt = mt_rand(1, 3);

        if ($qform === 1) {
            $ans = $momentum;
            if ($opt === 1)     $text = 'A ' . $obj . ' is moving at ' . $V . '. If its mass is ' . $M . ', what is its momentum in kg m/s?';
            elseif ($opt === 2) $text = 'What is the momentum of a ' . $obj . ' in kg m/s if its mass is ' . $M . ' and its velocity is ' . $V . '?';
            else                $text = 'A ' . $obj . ', which has a mass of ' . $M . ', is travelling at ' . $V . '. How much momentum in kg m/s does it have?';
            $soln = ['momentum = mass x velocity',
                     'p = mv',
                     'p = (' . $mass . ' kg)(' . $velo . ' m/s)',
                     'p = ' . $hl((string)$ans) . ' kg m/s'];
        } elseif ($qform === 2) {
            $ans = $velo;
            if ($opt === 1)     $text = 'A ' . $obj . ' has a momentum of ' . $P . '. If its mass is ' . $M . ', what is its velocity in meters per second?';
            elseif ($opt === 2) $text = 'What is the velocity of a ' . $obj . ' in meters per second if its mass is ' . $M . ' and its momentum is ' . $P . '?';
            else                $text = 'A ' . $obj . ', which has a mass of ' . $M . ', has a momentum of ' . $P . '. At what velocity (in meters per second) is it moving?';
            $soln = ['momentum = mass x velocity',
                     'p = mv',
                     'v = p/m',
                     'v = (' . $momentum . ' kg m/s)/(' . $mass . ' kg)',
                     'v = ' . $hl((string)$ans) . ' m/s'];
        } else {
            $ans = $mass;
            if ($opt === 1)     $text = 'A ' . $obj . ' has a momentum of ' . $P . '. If its velocity is ' . $V . ', what is its mass?';
            elseif ($opt === 2) $text = 'What is the mass of a ' . $obj . ' if its velocity is ' . $V . ' and its momentum is ' . $P . '?';
            else                $text = 'A ' . $obj . ', which has a velocity of ' . $V . ', has a momentum of ' . $P . '. How much mass does it have?';
            $soln = ['momentum = mass x velocity',
                     'p = mv',
                     'm = p/v',
                     'm = (' . $momentum . ' kg m/s)/(' . $velo . ' m/s)',
                     'm = ' . $hl((string)$ans) . ' kg'];
        }

    } elseif ($form === 2) {                             // impulse
        if ($objopt === 1) {
            $obj = $small[mt_rand(0, 3)];  $force = mt_rand(110, 999) / 10; $time = mt_rand(25, 220) / 10;
        } else {
            $obj = $things[mt_rand(0, 7)]; $force = mt_rand(50, 200) / 10;  $time = mt_rand(25, 110) / 10;
        }
        $impulse = round($force * $time, 2);
        $FF = $hl($f($force) . ' N');
        $T  = $hl($f($time) . ' seconds');
        $J  = $hl($f($impulse) . ' kg m/s');

        if ($qform === 1) {
            $ans = $impulse;
            $opt = mt_rand(1, 3);
            if ($opt === 1)     $text = 'A force of ' . $FF . ' was applied to a ' . $obj . ' for ' . $T . '. Compute for the impulse that acted on the ' . $obj . '.';
            elseif ($opt === 2) $text = 'What is the impulse felt by a ' . $obj . ' if a force of ' . $FF . ' was applied to it for ' . $T . '?';
            else                $text = 'A ' . $obj . ' was pushed by a force of ' . $FF . ' for ' . $T . '. How much impulse acted on the ' . $obj . '?';
            $soln = ['impulse = force x time',
                     'J = Ft',
                     'J = (' . $f($force) . ' N)(' . $f($time) . ' s)',
                     'J = ' . $hl($f($ans)) . ' kg m/s'];
        } elseif ($qform === 2) {
            $ans = $force;
            $opt = mt_rand(1, 2);
            if ($opt === 1) $text = 'A ' . $obj . ' was acted upon by an impulse of ' . $J . ' when a force was applied on it for ' . $T . '. How much force was applied on it?';
            else            $text = 'A force was applied on a ' . $obj . ' for ' . $T . '. If the impulse it felt was ' . $J . ', how much force was exerted on the ' . $obj . '?';
            $soln = ['impulse = force x time',
                     'J = Ft',
                     'F = J/t',
                     'F = (' . $f($impulse) . ' kg m/s)/(' . $f($time) . ' s)',
                     'F = ' . $hl($f($ans)) . ' N'];
        } else {
            $ans = $time;
            $opt = mt_rand(1, 2);
            if ($opt === 1) $text = 'A ' . $obj . ' was acted upon by an impulse of ' . $J . ' when a force of ' . $FF . ' was applied on it. For how long (in seconds) was the force applied on the ' . $obj . '?';
            else            $text = 'A force of ' . $FF . ' was applied on a ' . $obj . '. If the impulse felt by the ' . $obj . ' was ' . $J . ', for how many seconds was the force applied on the ' . $obj . '?';
            $soln = ['impulse = force x time',
                     'J = Ft',
                     't = J/F',
                     't = (' . $f($impulse) . ' kg m/s)/(' . $f($force) . ' N)',
                     't = ' . $hl($f($ans)) . ' s'];
        }

    } else {                                             // form 21: stopping time
        if ($objopt === 1) {
            $obj = $small[mt_rand(0, 3)];  $mass = mt_rand(21, 79);     $velo = mt_rand(11, 45); $force = mt_rand(180, 480);
        } else {
            $obj = $big[mt_rand(0, 7)];    $mass = mt_rand(1750, 2499); $velo = mt_rand(25, 90); $force = mt_rand(15000, 40000);
        }
        $ans = round($mass * $velo / $force, 3);
        $pic = 'wp-006.jpg';
        $text = 'A ' . $obj . ' with a mass of ' . $hl($mass . ' kilograms') . ' is moving at ' . $hl($velo . ' m/s')
              . '. If it needs to be stopped using a force of ' . $hl($force . ' N')
              . ', how many seconds should the force be applied on the ' . $obj . '?';
        $soln = ['impulse = change in momentum',
                 'impulse = p_{2} - p_{1}',
                 'impulse = (m)(v_{2}) - (m)(v_{1}) = -(m)(v_{1})',
                 'Ft = -(m)(v_{1})',
                 'Since F is opposite in direction to v_{1},',
                 't = -(' . $mass . ' kg)(' . $velo . ' m/s)/(-' . $force . ' N)',
                 't = ' . $hl($f($ans)) . ' s'];
    }
    return ['text' => $text, 'soln' => $soln, 'ans' => $ans, 'pic' => $pic];
}

// ---- Answer processing (§7) ----
$tol = 0.01;
$result = null; $scorer = null; $emptyAnswer = false;
if (isset($_POST['Submit1']) && !isset($_POST['Submit2']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = trim((string)($_POST['answer'] ?? ''));
    if ($raw === '') {
        $emptyAnswer = true;                       // keep the same question; nothing scored
    } else {
        $clean     = str_replace([',', ' '], '', $raw);
        $canonical = im_fmt((float)$cur['answer']);
        $within    = is_numeric($clean) && abs((float)$cur['answer'] - (float)$clean) <= $tol + 1e-9;
        $scorer    = new Scorer($conn, $moduleId);
        $isCorrect = $scorer->processAnswer($within ? $canonical : $clean, $canonical, $cur['lvl']);
        $result    = ['correct' => $isCorrect, 'raw' => $raw, 'cur' => $cur];
        unset($_SESSION[$sessionKey]['current']);
    }
}

// ---- Question generation (§6) ----
if (isset($_POST['Submit2']) || ($result === null && !$emptyAnswer)) {
    // No-repeat by variant, per level; clear only the current level when its variants are exhausted
    $pool  = resolve_im_variants($lvl);
    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter($pool, fn($v) => !in_array("t$lvl:f{$v[0]}q{$v[1]}", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $pool;
    }
    [$form, $qform] = $avail[array_rand($avail)];
    $used[] = "t$lvl:f{$form}q{$qform}";
    $_SESSION[$sessionKey]['used'] = $used;

    $p = im_build($form, $qform);
    $_SESSION[$sessionKey]['current'] = [
        'lvl'    => $lvl,
        'text'   => $p['text'],
        'soln'   => $p['soln'],
        'answer' => $p['ans'],
        'pic'    => $p['pic'],
    ];
}

// ---- Render (§8, §9, §10) ----
$theme = [];   // TODO: replace with the standard theme array used by the other modules
render_header($moduleTitle,
              $moduleTitle,
              $theme);

$imgTag = function (string $pic) use ($imgBase): string {
    return ($pic === '') ? '' :
        '<img src="' . htmlspecialchars($imgBase . $pic) . '" alt="Moving object being stopped by a force" '
      . 'style="max-width:100%;height:auto;margin-bottom:12px;">';
};
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $solnHtml = implode('<br>', array_map('im_html', $cur['soln']));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php im_box(
      '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin-bottom:10px;">Let\'s recall the problem:</div>'
    . $imgTag($cur['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:500;line-height:1.55;text-wrap:balance;">'
    . im_html($cur['text'], true) . '</div>'
    . '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin:18px 0 10px;">Now, let\'s see the solution:</div>'
    . '<div style="width:100%;color:#000080;font-size:13pt;font-weight:500;line-height:1.7;">' . $solnHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars(im_fmt((float)$cur['answer'])); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php im_box(
      $imgTag($q['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:600;line-height:1.45;text-wrap:balance;">'
    . im_html($q['text'], true) . '</div>',
      140
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#454545;max-width:480px;margin:6px auto 0;line-height:1.55;">
    (Your margin of error for this question is <?php echo im_fmt($tol); ?>.)
  </p>
<?php if ($emptyAnswer): ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;font-weight:700;color:#CC0066;margin:12px auto 0;">Please type your answer first.</p>
<?php endif; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;font-weight:700;color:#CC0066;margin:18px auto 0;">
    Answer:
    <input type="text" name="answer" size="10" maxlength="20" inputmode="decimal" autocomplete="off" autofocus
           style="text-align:center;height:34px;font-family:Arial,sans-serif;font-size:18pt;font-weight:500;border:2px solid #888888;border-radius:6px;">
  </p>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit1" value=" Submit " style="font-family:Arial,sans-serif;">&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit2" value=" New Question " style="font-family:Arial,sans-serif;">
  </div>
<?php endif; ?>

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