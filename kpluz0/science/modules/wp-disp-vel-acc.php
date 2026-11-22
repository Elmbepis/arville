<?php
// science/modules/wp-disp-vel-acc.php
// WP: Displacement, Velocity, & Acceleration — numeric word problems with worked solutions.
// Two levels (Easy / Hard). In the legacy page the question form depended on level only
// (the grade-based $arrnum was computed but never used), so grade has no effect on content.
//
// CONVERSION NOTES
//  - Legacy Medium folded into Hard; Hard keeps its own form (21, free fall). Medium form 11
//    (final velocity from initial velocity + acceleration) is not carried over.
//  - Fixes: values are rounded once so displayed numbers match the worked solution (no float noise);
//    answer box no longer sized to the answer (legacy leaked its length); empty submissions re-show the
//    question instead of being scored; "m/sec^2" normalised to "m/s^2".
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
$moduleTitle = 'Displacement, Velocity, & Acceleration';
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
//  Easy: form 1 -> qform 1 average velocity, 2 displacement from two legs, 3 displacement from speed and times
//  Hard: form 21 -> free-fall displacement
function resolve_dva_variants(string $lvl): array {
    return ($lvl === 'Easy') ? [[1, 1], [1, 2], [1, 3]] : [[21, 1]];
}

// ---- Helpers ----
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function dva_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Number -> string without trailing zeros.
function dva_fmt(float $x, int $dec = 5): string {
    $s = number_format($x, $dec, '.', '');
    return (strpos($s, '.') !== false) ? rtrim(rtrim($s, '0'), '.') : $s;
}

// Plain text -> HTML. [[x]] = highlighted value, ^n = superscript, _{x} = subscript, newline = <br>.
function dva_html(string $s, bool $bind = false): string {
    $e = $bind ? bind_last_words($s) : htmlspecialchars($s);
    $e = preg_replace('/\[\[(.*?)\]\]/s', '<span style="color:#CC0066;">$1</span>', $e);
    $e = preg_replace('/\^(\d)/', '<sup>$1</sup>', $e);
    $e = preg_replace('/_\{(\w+)\}/', '<sub>$1</sub>', $e);
    return nl2br($e, false);
}

// ---- Problem generator ----
function dva_build(int $form, int $qform): array {
    $hl = fn(string $s): string => '[[' . $s . ']]';
    $f  = 'dva_fmt';
    $pic = '';

    $vehicle = ['train', 'car', 'boat', 'jeep', 'truck', 'van', 'motorcycle'][mt_rand(0, 6)];
    $place   = ['town', 'church', 'resort', 'mall', 'house', 'museum'][mt_rand(0, 5)];
    $dirs = ['north', 'south', 'east', 'west'];
    $j    = mt_rand(0, 3);
    $dir  = $dirs[$j];
    $dir2 = ($j < 2) ? $dirs[mt_rand(2, 3)] : $dirs[mt_rand(0, 1)];   // always perpendicular to $dir

    if ($form === 1 && $qform === 1) {
        $velo  = mt_rand(6, 26);                         // m/s
        $velo2 = round($velo * 3.6, 1);                  // km/h
        $time  = mt_rand(11, 99) / 10;                   // hours
        $disp2 = round($velo2 * $time, 2);               // km
        $disp0 = mt_rand(10, 125);                       // km
        $ans   = $velo2;
        $text  = 'A ' . $vehicle . ', which started ' . $hl($disp0 . ' kilometers') . ' ' . $dir . ' of a certain ' . $place
               . ', ended up at a place that\'s ' . $hl($f($disp0 + $disp2) . ' kilometers') . ' ' . $dir . ' of the same ' . $place
               . ' after travelling for ' . $hl($f($time) . ' hours') . '. What was its average velocity in kilometers per hour?';
        $soln = ['Velocity = Displacement / Time',
                 'v = d / t',
                 'v = (' . $f($disp0 + $disp2) . ' - ' . $disp0 . ') / ' . $f($time),
                 'v = ' . $f($disp2) . ' / ' . $f($time),
                 'v = ' . $hl($f($ans)) . ' kilometers per hour'];

    } elseif ($form === 1 && $qform === 2) {
        $d1 = mt_rand(29, 99);
        $d2 = mt_rand(29, 99);
        $sum = $d1 * $d1 + $d2 * $d2;
        $ans = round(sqrt($sum), 3);
        $text = 'A ' . $vehicle . ' travelled ' . $hl($d1 . ' kilometers') . ' to the ' . $dir . ' and then '
              . $hl($d2 . ' kilometers') . ' to the ' . $dir2 . '. What was its displacement in kilometers?';
        $soln = ['displacement = shortest distance between',
                 'the initial and final positions',
                 '',
                 'Using the Pythagorean Theorem,',
                 'd = sqrt(' . $d1 . '^2 + ' . $d2 . '^2)',
                 'd = sqrt(' . ($d1 * $d1) . ' + ' . ($d2 * $d2) . ')',
                 'd = sqrt(' . $sum . ')',
                 'd = ' . $hl($f($ans)) . ' kilometers'];

    } elseif ($form === 1 && $qform === 3) {
        $speed = mt_rand(15, 75);                        // km/h
        $t1 = mt_rand(11, 45) / 10;
        $t2 = mt_rand(11, 45) / 10;
        $d1 = round($speed * $t1, 1);
        $d2 = round($speed * $t2, 1);
        $sq1 = round($d1 * $d1, 2);
        $sq2 = round($d2 * $d2, 2);
        $sum = round($sq1 + $sq2, 2);
        $ans = round(sqrt($sum), 3);
        $text = 'A ' . $vehicle . ' is travelling at a constant speed of ' . $hl($speed . ' kilometers per hour')
              . '. If it travels for ' . $hl($f($t1) . ' hours') . ' to the ' . $dir . ' and then for '
              . $hl($f($t2) . ' hours') . ' to the ' . $dir2 . ', what will its displacement be in kilometers?';
        $soln = ["Let 'd1' be the distance travelled to the " . $dir,
                 "Let 'd2' be the distance travelled to the " . $dir2,
                 "Let 'd' be the total displacement",
                 'd1 = (' . $speed . ')(' . $f($t1) . ') = ' . $f($d1),
                 'd2 = (' . $speed . ')(' . $f($t2) . ') = ' . $f($d2),
                 'Using the Pythagorean Theorem,',
                 'd = sqrt(d1^2 + d2^2)',
                 'd = sqrt(' . $f($d1) . '^2 + ' . $f($d2) . '^2)',
                 'd = sqrt(' . $f($sq1) . ' + ' . $f($sq2) . ')',
                 'd = sqrt(' . $f($sum) . ')',
                 'd = ' . $hl($f($ans)) . ' kilometers'];

    } else {                                             // form 21: free fall
        $time  = mt_rand(15, 75) / 10;                   // s
        $velo1 = mt_rand(5, 25) / 10;                    // m/s
        $velo2 = round($velo1 + 9.8 * $time, 2);
        $ans   = round($velo1 * $time + 0.5 * 9.8 * $time * $time, 3);
        $pic   = 'wp-005.jpg';
        $text  = 'A freely falling body has an initial velocity of ' . $hl($f($velo1) . ' m/s')
               . '. After falling for a certain amount of time, its final velocity reaches ' . $hl($f($velo2) . ' m/s')
               . '. What is the total displacement of the body in meters during this amount of time?';
        $soln = ["Let 'v_{f}' be the final velocity",
                 "Let 'v_{i}' be the initial velocity",
                 't = (v_{f} - v_{i}) / a',
                 't = (' . $f($velo2) . ' m/s - ' . $f($velo1) . ' m/s) / (9.8 m/s^2)',
                 't = (' . $f(round($velo2 - $velo1, 2)) . ' m/s) / (9.8 m/s^2)',
                 't = ' . $f($time) . ' seconds',
                 'd = (v_{i})(t) + (g)(t^2)/2',
                 'd = (' . $f($velo1) . ')(' . $f($time) . ') + (9.8)(' . $f($time) . '^2)/2',
                 'd = ' . $hl($f($ans)) . ' meters'];
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
        $canonical = dva_fmt((float)$cur['answer']);
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
    $pool  = resolve_dva_variants($lvl);
    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter($pool, fn($v) => !in_array("t$lvl:f{$v[0]}q{$v[1]}", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $pool;
    }
    [$form, $qform] = $avail[array_rand($avail)];
    $used[] = "t$lvl:f{$form}q{$qform}";
    $_SESSION[$sessionKey]['used'] = $used;

    $p = dva_build($form, $qform);
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
        '<img src="' . htmlspecialchars($imgBase . $pic) . '" alt="Freely falling body" '
      . 'style="max-width:100%;height:auto;margin-bottom:12px;">';
};
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $solnHtml = implode('<br>', array_map('dva_html', $cur['soln']));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php dva_box(
      '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin-bottom:10px;">Let\'s recall the problem:</div>'
    . $imgTag($cur['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:500;line-height:1.55;text-wrap:balance;">'
    . dva_html($cur['text'], true) . '</div>'
    . '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin:18px 0 10px;">Now, let\'s see the solution:</div>'
    . '<div style="width:100%;color:#000080;font-size:13pt;font-weight:500;line-height:1.7;">' . $solnHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars(dva_fmt((float)$cur['answer'])); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php dva_box(
      $imgTag($q['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:600;line-height:1.45;text-wrap:balance;">'
    . dva_html($q['text'], true) . '</div>',
      140
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#454545;max-width:480px;margin:6px auto 0;line-height:1.55;">
    (Your margin of error for this question is <?php echo dva_fmt($tol); ?>.)
  </p>
<?php if ($emptyAnswer): ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;font-weight:700;color:#CC0066;margin:12px auto 0;">Please type your answer first.</p>
<?php endif; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;font-weight:700;color:#CC0066;margin:18px auto 0;">
    Answer:
    <input type="text" name="answer" size="14" maxlength="20" inputmode="decimal" autocomplete="off" autofocus
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