<?php
// science/modules/wp-force.php
// WP: Applied Force and Gravitation — numeric word problems with worked solutions.
// Two levels (Easy / Hard). In the legacy page the question form depended on level only
// (the grade-based $arrnum was computed but never used), so grade has no effect on content.
//
// CONVERSION NOTES
//  - Legacy Medium folded into Hard; Hard keeps its own form (21, force at an angle). Medium form 11
//    (net force of two opposing horizontal forces) is not carried over.
//  - Fixes: solution now writes "F = ..." (legacy mixed "F" and "f") and highlights the final answer in
//    Easy too; values are rounded once so displayed numbers match the worked solution (no float noise);
//    the theta image (theta.jpg) is replaced by the θ character; answer box no longer sized to the
//    answer (legacy leaked its length); empty submissions re-show the question instead of being scored.
//  - Dead code removed: mysql_* / SPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, $thetapic, $prob3a, the overwritten $normal at the top of form 21, no-op rand(1,1) calls,
//    unused font strings, FrontPage JS, legacy page chrome.

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
$moduleTitle = 'Applied Force and Gravitation';
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
//  Easy: form 1  -> qform 1 force from mass and acceleration, 2 mass from force and acceleration
//  Hard: form 21 -> qform 1 horizontal acceleration, 2 normal force (force applied at an angle)
function resolve_wf_variants(string $lvl): array {
    return ($lvl === 'Easy') ? [[1, 1], [1, 2]] : [[21, 1], [21, 2]];
}

// ---- Helpers ----
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function wf_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Number -> string without trailing zeros.
function wf_fmt(float $x, int $dec = 8): string {
    $s = number_format($x, $dec, '.', '');
    return (strpos($s, '.') !== false) ? rtrim(rtrim($s, '0'), '.') : $s;
}

// Plain text -> HTML. [[x]] = highlighted value, ^n = superscript, _{x} = subscript, {theta} = θ, newline = <br>.
function wf_html(string $s, bool $bind = false): string {
    $e = $bind ? bind_last_words($s) : htmlspecialchars($s);
    $e = preg_replace('/\[\[(.*?)\]\]/s', '<span style="color:#CC0066;">$1</span>', $e);
    $e = preg_replace('/\^(\d)/', '<sup>$1</sup>', $e);
    $e = preg_replace('/_\{(\w+)\}/', '<sub>$1</sub>', $e);
    $e = str_replace('{theta}', '&theta;', $e);
    return nl2br($e, false);
}

// ---- Problem generator ----
function wf_build(int $form, int $qform): array {
    $hl = fn(string $s): string => '[[' . $s . ']]';
    $f  = 'wf_fmt';
    $pic = '';

    if ($form === 1) {
        $obj   = ['crate', 'package', 'barrel', 'container', 'wooden block', 'rock'][mt_rand(0, 5)];
        $mass  = mt_rand(11, 49);                        // kg
        $accel = mt_rand(15, 199) / 10;                  // m/s^2
        $force = round($mass * $accel, 1);               // N
        $opt   = mt_rand(1, 3);
        $A = $hl($f($accel) . ' m/s^2');
        $M = $hl($mass . ' kilograms');
        $F = $hl($f($force) . ' newtons');

        if ($qform === 1) {
            $ans = $force;
            if ($opt === 1)     $text = 'A force was applied to a ' . $obj . ' to give it an acceleration of ' . $A . '. If its mass is ' . $M . ', how much force was applied?';
            elseif ($opt === 2) $text = 'How much force would you apply to a ' . $obj . ' if its mass is ' . $M . ' and you want to accelerate it by ' . $A . '?';
            else                $text = 'A ' . $obj . ', which has a mass of ' . $M . ', was accelerated by ' . $A . '. How much force was applied to it?';
            $soln = ['F = ma',
                     'F = (' . $mass . ' kg)(' . $f($accel) . ' m/s^2)',
                     'F = ' . $hl($f($ans)) . ' N'];
        } else {
            $ans = $mass;
            if ($opt === 1)     $text = 'A force of ' . $F . ' was applied to a ' . $obj . ' to give it an acceleration of ' . $A . '. What is the mass of the ' . $obj . '?';
            elseif ($opt === 2) $text = 'What is the mass of a ' . $obj . ' if it was accelerated by ' . $A . ' when it was pushed by a force of ' . $F . '?';
            else                $text = 'When a force of ' . $F . ' was applied to a ' . $obj . ', it was accelerated by ' . $A . '. What is its mass?';
            $soln = ['F = ma',
                     'm = F/a',
                     'm = ' . $f($force) . ' N / ' . $f($accel) . ' m/s^2',
                     'm = ' . $hl($f($ans)) . ' kg'];
        }
    } else {                                             // form 21: force applied at an angle
        $obj   = ['crate', 'container', 'wooden block', 'box'][mt_rand(0, 3)];
        $mass  = mt_rand(11, 49);                        // kg
        $force = mt_rand(20, 125);                       // N
        $angle = mt_rand(20, 42);                        // degrees
        $pic   = 'wp-001.jpg';
        $head  = 'A ' . $obj . ' was dragged along a frictionless horizontal floor by a force of ' . $hl($force . ' newtons')
               . ' acting at an angle of ' . $hl($angle . ' degrees') . ' with respect to the floor. If the mass of the '
               . $obj . ' is ' . $hl($mass . ' kilograms') . ', ';

        if ($qform === 1) {                              // horizontal acceleration
            $cos    = round(cos(deg2rad($angle)), 8);
            $forceh = round($force * $cos, 8);
            $ans    = round($forceh / $mass, 3);
            $text   = $head . 'what is the horizontal acceleration of the ' . $obj . '?';
            $soln   = ["Let 'F_{h}' be the horizontal component of F",
                       'F_{h} = F cos({theta})',
                       'F_{h} = (' . $force . ')(cos(' . $angle . '))',
                       'F_{h} = (' . $force . ')(' . $f($cos) . ')',
                       'F_{h} = ' . $f($forceh),
                       'a = F_{h} / m',
                       'a = ' . $f($forceh) . ' / ' . $mass,
                       'a = ' . $hl($f($ans)) . ' m/s^2'];
        } else {                                         // normal force
            $sin    = round(sin(deg2rad($angle)), 8);
            $forcev = round($force * $sin, 8);
            $weight = round($mass * 9.8, 1);
            $ans    = round($weight - $forcev, 3);
            $text   = $head . 'what is the normal force N exerted by the floor on the ' . $obj . '?';
            $soln   = ["Let 'F_{v}' be the vertical component of F",
                       "Let 'W' be the weight of the " . $obj,
                       'F_{v} = F sin({theta})',
                       'F_{v} = (' . $force . ')(sin(' . $angle . '))',
                       'F_{v} = (' . $force . ')(' . $f($sin) . ')',
                       'F_{v} = ' . $f($forcev),
                       'N = W - F_{v}',
                       'N = mg - F_{v}',
                       'N = (' . $mass . ')(9.8 m/s^2) - ' . $f($forcev),
                       'N = ' . $f($weight) . ' - ' . $f($forcev),
                       'N = ' . $hl($f($ans)) . ' N'];
        }
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
        $canonical = wf_fmt((float)$cur['answer']);
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
    $pool  = resolve_wf_variants($lvl);
    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter($pool, fn($v) => !in_array("t$lvl:f{$v[0]}q{$v[1]}", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $pool;
    }
    [$form, $qform] = $avail[array_rand($avail)];
    $used[] = "t$lvl:f{$form}q{$qform}";
    $_SESSION[$sessionKey]['used'] = $used;

    $p = wf_build($form, $qform);
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
        '<img src="' . htmlspecialchars($imgBase . $pic) . '" alt="Force applied at an angle to an object on the floor" '
      . 'style="max-width:100%;height:auto;margin-bottom:12px;">';
};
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $solnHtml = implode('<br>', array_map('wf_html', $cur['soln']));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php wf_box(
      '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin-bottom:10px;">Let\'s recall the problem:</div>'
    . $imgTag($cur['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:500;line-height:1.55;text-wrap:balance;">'
    . wf_html($cur['text'], true) . '</div>'
    . '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin:18px 0 10px;">Now, let\'s see the solution:</div>'
    . '<div style="width:100%;color:#000080;font-size:13pt;font-weight:500;line-height:1.7;">' . $solnHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars(wf_fmt((float)$cur['answer'])); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php wf_box(
      $imgTag($q['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:600;line-height:1.45;text-wrap:balance;">'
    . wf_html($q['text'], true) . '</div>',
      140
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#454545;max-width:480px;margin:6px auto 0;line-height:1.55;">
    (Your margin of error for this question is <?php echo wf_fmt($tol); ?>.)
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