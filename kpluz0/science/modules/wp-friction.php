<?php
// science/modules/wp-friction.php
// WP: Frictional Forces — numeric word problems with worked solutions.
// Two levels (Easy / Hard). In the legacy page the question form depended on level only
// (the grade-based $arrnum was computed but never used), so grade has no effect on content.
//
// CONVERSION NOTES
//  - Legacy Medium folded into Hard; Hard keeps its own form (21, acceleration of a moving object).
//    Medium form 11 (drop in friction once the object starts moving) is not carried over.
//  - Fixes: the friction coefficient is written as the Greek letter mu (legacy used a plain "u");
//    the final answer line is highlighted in every solution; values are rounded once so displayed
//    numbers match the worked solution (no float noise); answer box no longer sized to the answer
//    (legacy leaked its length); empty submissions re-show the question instead of being scored.
//  - Dead code removed: mysql_* / SPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, $thetapic, $prob3a, the unused $coeffk in form 1, no-op rand(1,1) calls, unused font strings,
//    FrontPage JS, legacy page chrome.

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
$moduleTitle = 'Frictional Forces';
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
//  Easy: form 1  -> qform 1 force needed to start moving, 2 mass from that force (with figure)
//  Hard: form 21 -> acceleration once moving under a constant push
function resolve_fr_variants(string $lvl): array {
    return ($lvl === 'Easy') ? [[1, 1], [1, 2]] : [[21, 1]];
}

// ---- Helpers ----
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function fr_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Number -> string without trailing zeros.
function fr_fmt(float $x, int $dec = 5): string {
    $s = number_format($x, $dec, '.', '');
    return (strpos($s, '.') !== false) ? rtrim(rtrim($s, '0'), '.') : $s;
}

// Plain text -> HTML. [[x]] = highlighted value, ^n = superscript, _{x} = subscript, {mu} = μ, newline = <br>.
function fr_html(string $s, bool $bind = false): string {
    $e = $bind ? bind_last_words($s) : htmlspecialchars($s);
    $e = preg_replace('/\[\[(.*?)\]\]/s', '<span style="color:#CC0066;">$1</span>', $e);
    $e = preg_replace('/\^(\d)/', '<sup>$1</sup>', $e);
    $e = preg_replace('/_\{(\w+)\}/', '<sub>$1</sub>', $e);
    $e = str_replace('{mu}', '&mu;', $e);
    return nl2br($e, false);
}

// ---- Problem generator ----
function fr_build(int $form, int $qform): array {
    $hl = fn(string $s): string => '[[' . $s . ']]';
    $f  = 'fr_fmt';
    $pic = '';

    $obj    = ['crate', 'package', 'box', 'container', 'wooden block', 'concrete block'][mt_rand(0, 5)];
    $fobj   = ['worker', 'man', 'machine operator', 'forklift driver'][mt_rand(0, 3)];
    $mass   = mt_rand(15, 80);                           // kg
    $coeffs = mt_rand(25, 50) / 100;                     // static coefficient
    $M  = $hl($mass . ' kilograms');
    $CS = $hl($f($coeffs));

    if ($form === 1) {
        $force = round($mass * 9.8 * $coeffs, 3);        // N needed to start the object moving
        $pic   = 'wp-007.jpg';
        $opt   = mt_rand(1, 2);
        if ($qform === 1) {
            $ans = $force;
            if ($opt === 1) {
                $text = 'A ' . $fobj . ' decides to push a ' . $obj . ' resting on a level surface. If the mass of the ' . $obj
                      . ' is ' . $M . ' and the static coefficient of friction between the ' . $obj . ' and the surface is ' . $CS
                      . ', how much force is needed to make the ' . $obj . ' move?';
            } else {
                $text = 'The mass of a ' . $obj . ' resting on a level floor is ' . $M . '. The static coefficient of friction between the '
                      . $obj . ' and the floor is ' . $CS . '. With how much force must a ' . $fobj . ' push the ' . $obj
                      . ' to make the ' . $obj . ' move?';
            }
            $soln = ['F = {mu}_{s} x N',
                     'F = ({mu}_{s})(m)(g)',
                     'F = (' . $f($coeffs) . ')(' . $mass . ' kg)(9.8 m/s^2)',
                     'F = ' . $hl($f($ans)) . ' N'];
        } else {
            $ans = $mass;
            $FF  = $hl($f($force) . ' N');
            if ($opt === 1) {
                $text = 'A ' . $obj . ' is resting on a level surface. The coefficient of static friction between the ' . $obj
                      . ' and the surface is ' . $CS . '. If the force needed to make the ' . $obj . ' move is ' . $FF
                      . ', what is the mass of the ' . $obj . '?';
            } else {
                $text = 'The coefficient of static friction between a surface and a ' . $obj . ' resting on it is ' . $CS
                      . '. To make the ' . $obj . ' move, a force of ' . $FF . ' must be applied to it. How much mass does the '
                      . $obj . ' have?';
            }
            $soln = ['F = {mu}_{s} x N',
                     'F = ({mu}_{s})(m)(g)',
                     'm = F/[({mu}_{s})(g)]',
                     'm = ' . $f($force) . ' N/[(' . $f($coeffs) . ')(9.8 m/s^2)]',
                     'm = ' . $hl($f($ans)) . ' kg'];
        }

    } else {                                             // form 21: acceleration once moving
        $coeffk = round($coeffs * (mt_rand(65, 90) / 100), 2);
        $nforce = round($mass * 9.8 * ($coeffs - $coeffk), 3);
        $ans    = round($nforce / $mass, 3);
        $CK = $hl($f($coeffk));
        if (mt_rand(1, 2) === 1) {
            $text = 'A ' . $obj . ' with a mass of ' . $M . ' is resting on a level surface. The static and kinetic coefficients of friction between the '
                  . $obj . ' and the surface are ' . $CS . ' and ' . $CK . ', respectively.';
        } else {
            $text = 'The mass of a ' . $obj . ' resting on a level floor is ' . $M . '. The static and kinetic coefficients of friction between the '
                  . $obj . ' and the floor are ' . $CS . ' and ' . $CK . ', respectively.';
        }
        $text .= "\n\nIf a " . $fobj . ' pushes the ' . $obj . ' with a constant force to make it move, and continues pushing the object with the same constant force as it moves, what will the acceleration of the '
               . $obj . ' be?';
        $soln = ["Let 'f_{s}' be the static friction",
                 "Let 'f_{k}' be the kinetic friction",
                 "Let 'F_{net}' be the net force on the moving object",
                 'F_{net} = f_{s} - f_{k}',
                 'F_{net} = ({mu}_{s} - {mu}_{k})(N)',
                 'F_{net} = ({mu}_{s} - {mu}_{k})(m)(g)',
                 'F_{net} = (' . $f($coeffs) . ' - ' . $f($coeffk) . ')(' . $mass . ' kg)(9.8 m/s^2)',
                 'F_{net} = ' . $hl($f($nforce)) . ' N',
                 'a = F_{net}/m',
                 'a = ' . $f($nforce) . ' N/' . $mass . ' kg',
                 'a = ' . $hl($f($ans)) . ' m/s^2'];
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
        $canonical = fr_fmt((float)$cur['answer']);
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
    $pool  = resolve_fr_variants($lvl);
    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter($pool, fn($v) => !in_array("t$lvl:f{$v[0]}q{$v[1]}", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $pool;
    }
    [$form, $qform] = $avail[array_rand($avail)];
    $used[] = "t$lvl:f{$form}q{$qform}";
    $_SESSION[$sessionKey]['used'] = $used;

    $p = fr_build($form, $qform);
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
        '<img src="' . htmlspecialchars($imgBase . $pic) . '" alt="Person pushing an object on a level surface" '
      . 'style="max-width:100%;height:auto;margin-bottom:12px;">';
};
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $solnHtml = implode('<br>', array_map('fr_html', $cur['soln']));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php fr_box(
      '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin-bottom:10px;">Let\'s recall the problem:</div>'
    . $imgTag($cur['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:500;line-height:1.55;text-wrap:balance;">'
    . fr_html($cur['text'], true) . '</div>'
    . '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin:18px 0 10px;">Now, let\'s see the solution:</div>'
    . '<div style="width:100%;color:#000080;font-size:13pt;font-weight:500;line-height:1.7;">' . $solnHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars(fr_fmt((float)$cur['answer'])); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php fr_box(
      $imgTag($q['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:600;line-height:1.45;text-wrap:balance;">'
    . fr_html($q['text'], true) . '</div>',
      140
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#454545;max-width:480px;margin:6px auto 0;line-height:1.55;">
    (Your margin of error for this question is <?php echo fr_fmt($tol); ?>.)
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