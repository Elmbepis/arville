<?php
// science/modules/wp-work-energy.php
// WP: Work and Energy — numeric word problems with worked solutions.
// Two levels (Easy / Hard). In the legacy page the question form depended on level only
// (the grade-based $arrnum was computed but never used), so grade has no effect on content.
//
// CONVERSION NOTES
//  - Legacy Medium folded into Hard; Hard keeps its own form (21, work from change in kinetic energy).
//    Medium form 11 (kinetic energy with velocity given in km/h) is not carried over.
//  - Fixes: legacy Hard text printed "m/skm/h" (a stray $vunit appended to the unit) -> "m/s";
//    double spaces in problem text removed; the final answer line is highlighted in every solution;
//    values are rounded once so displayed numbers match the worked solution (no float noise); subscripts
//    on vf/vi; answer box no longer sized to the answer (legacy leaked its length); empty submissions
//    re-show the question instead of being scored.
//  - Dead code removed: mysql_* / SPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, $thetapic, $vunit, $prob3a, no-op rand(1,1) calls, unused font strings, FrontPage JS, legacy page chrome.

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
$moduleTitle = 'Work and Energy';
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
//  Easy: form 1  -> kinetic energy
//        form 2  -> potential energy / work to raise an object (with figure)
//  Hard: form 21 -> work done from a change in velocity (with figure)
function resolve_we_variants(string $lvl): array {
    return ($lvl === 'Easy') ? [[1, 1], [2, 1]] : [[21, 1]];
}

// ---- Helpers ----
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function we_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Number -> string without trailing zeros.
function we_fmt(float $x, int $dec = 5): string {
    $s = number_format($x, $dec, '.', '');
    return (strpos($s, '.') !== false) ? rtrim(rtrim($s, '0'), '.') : $s;
}

// Plain text -> HTML. [[x]] = highlighted value, ^n = superscript, _{x} = subscript, newline = <br>.
function we_html(string $s, bool $bind = false): string {
    $e = $bind ? bind_last_words($s) : htmlspecialchars($s);
    $e = preg_replace('/\[\[(.*?)\]\]/s', '<span style="color:#CC0066;">$1</span>', $e);
    $e = preg_replace('/\^(\d)/', '<sup>$1</sup>', $e);
    $e = preg_replace('/_\{(\w+)\}/', '<sub>$1</sub>', $e);
    return nl2br($e, false);
}

// ---- Problem generator ----
function we_build(int $form, int $qform): array {
    $hl = fn(string $s): string => '[[' . $s . ']]';
    $f  = 'we_fmt';
    $pic = '';

    if ($form === 1) {                                   // kinetic energy
        $obj      = ['cart', 'bicycle', 'robot'][mt_rand(0, 2)];
        $mass     = mt_rand(11, 49);                     // kg
        $velocity = mt_rand(11, 199) / 10;               // m/s
        $ans      = round($mass * $velocity * $velocity / 2, 3);
        $M = $hl($mass . ' kilograms');
        $V = $hl($f($velocity) . ' m/s');
        if (mt_rand(1, 2) === 1) $text = 'How much kinetic energy does a ' . $obj . ' have if its mass is ' . $M . ' and its velocity is ' . $V . '?';
        else                     $text = 'A ' . $obj . ', which has a mass of ' . $M . ', is travelling with a velocity of ' . $V . '. What is its kinetic energy?';
        $soln = ['K.E. = (mv^2)/2',
                 'K.E. = ((' . $mass . ')(' . $f($velocity) . ')^2)/2',
                 'K.E. = ' . $hl($f($ans)) . ' joules'];

    } elseif ($form === 2) {                             // potential energy / work to raise
        if (mt_rand(1, 2) === 1) {
            $obj    = ['crate', 'container', 'wooden block', 'box', 'bag'][mt_rand(0, 4)];
            $mass   = mt_rand(11, 79);
            $height = mt_rand(11, 199) / 10;
        } else {
            $obj    = ['car', 'van', 'pickup truck', 'minibus', 'minivan', 'sports car'][mt_rand(0, 5)];
            $mass   = mt_rand(1750, 2499);
            $height = mt_rand(11, 129) / 10;
        }
        $ans = round($mass * 9.8 * $height, 2);
        $pic = 'wp-004.jpg';
        $M = $hl($mass . ' kilograms');
        $H = $hl($f($height) . ' meters');
        $opt = mt_rand(1, 3);
        if ($opt === 1)     $text = 'How much potential energy will a ' . $obj . ' have if its mass is ' . $M . ' and it is hoisted from the ground to a height of ' . $H . '?';
        elseif ($opt === 2) $text = 'A ' . $obj . ', which has a mass of ' . $M . ', was raised from the floor to a height of ' . $H . '. How much potential energy did it gain?';
        else                $text = 'A ' . $obj . ' has a mass of ' . $M . '. How much work must be done in order to raise it from the ground to a height of ' . $H . '?';
        if ($opt < 3) {
            $soln = ['P.E. = mgh',
                     'P.E. = (' . $mass . ' kg)(9.8 m/s^2)(' . $f($height) . ' m)',
                     'P.E. = ' . $hl($f($ans)) . ' joules'];
        } else {
            $soln = ['Work = Final P.E. - Initial P.E.',
                     'Work = mgh - 0 = mgh',
                     'Work = (' . $mass . ' kg)(9.8 m/s^2)(' . $f($height) . ' m)',
                     'Work = ' . $hl($f($ans)) . ' joules'];
        }

    } else {                                             // form 21: work from change in kinetic energy
        $obj   = ['crate', 'container', 'wooden block', 'box', 'rock', 'toy car', 'toy truck', 'cart'][mt_rand(0, 7)];
        $mass  = mt_rand(11, 49);
        $v1    = mt_rand(11, 110) / 10;
        $v2    = round($v1 + mt_rand(5, 55) / 10, 1);
        $vs1   = round($v1 * $v1, 2);
        $vs2   = round($v2 * $v2, 2);
        $ans   = round($mass / 2 * ($vs2 - $vs1), 3);
        $pic   = 'wp-003.jpg';
        $M = $hl($mass . ' kilograms');
        $V1 = $hl($f($v1) . ' m/s');
        $V2 = $hl($f($v2) . ' m/s');
        if (mt_rand(1, 2) === 1) {
            $text = 'A ' . $obj . ' has a mass of ' . $M . ' and is travelling on a frictionless surface at ' . $V1
                  . '. A force was applied to it, increasing its velocity to ' . $V2
                  . '. What was the work done by the force on the ' . $obj . '?';
        } else {
            $text = 'A ' . $obj . ' travelling on a frictionless surface accelerated from a velocity of ' . $V1 . ' to ' . $V2
                  . ' when a force acted on it. If its mass is ' . $M . ', what was the work done by the force on the ' . $obj . '?';
        }
        $soln = ['Work = Final K.E. - Initial K.E.',
                 'Work = (m/2)(v_{f}^2 - v_{i}^2)',
                 'Work = (' . $mass . '/2)(' . $f($vs2) . ' - ' . $f($vs1) . ')',
                 'Work = ' . $hl($f($ans)) . ' joules'];
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
        $canonical = we_fmt((float)$cur['answer']);
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
    $pool  = resolve_we_variants($lvl);
    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter($pool, fn($v) => !in_array("t$lvl:f{$v[0]}q{$v[1]}", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $pool;
    }
    [$form, $qform] = $avail[array_rand($avail)];
    $used[] = "t$lvl:f{$form}q{$qform}";
    $_SESSION[$sessionKey]['used'] = $used;

    $p = we_build($form, $qform);
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
        '<img src="' . htmlspecialchars($imgBase . $pic) . '" alt="Illustration for the problem" '
      . 'style="max-width:100%;height:auto;margin-bottom:12px;">';
};
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $solnHtml = implode('<br>', array_map('we_html', $cur['soln']));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php we_box(
      '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin-bottom:10px;">Let\'s recall the problem:</div>'
    . $imgTag($cur['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:500;line-height:1.55;text-wrap:balance;">'
    . we_html($cur['text'], true) . '</div>'
    . '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin:18px 0 10px;">Now, let\'s see the solution:</div>'
    . '<div style="width:100%;color:#000080;font-size:13pt;font-weight:500;line-height:1.7;">' . $solnHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars(we_fmt((float)$cur['answer'])); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php we_box(
      $imgTag($q['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:600;line-height:1.45;text-wrap:balance;">'
    . we_html($q['text'], true) . '</div>',
      140
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#454545;max-width:480px;margin:6px auto 0;line-height:1.55;">
    (Your margin of error for this question is <?php echo we_fmt($tol); ?>.)
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