<?php
// science/modules/wp-torque.php
// WP: Torque and Stability — numeric word problems with worked solutions.
// Two levels (Easy / Hard). In the legacy page the question form depended on level only
// (the grade-based $arrnum was computed but never used), so grade has no effect on content.
//
// CONVERSION NOTES
//  - Legacy Medium folded into Hard; Hard keeps its own form (21, position of a third block).
//    Medium forms 11 and 12 (see-saw balance: unknown mass / unknown distance) are not carried over.
//  - Fixes: equality checks that keep two random values distinct now compare integers (tenths) instead of
//    floats; values are rounded once so displayed numbers match the worked solution (no float noise);
//    the final answer line is highlighted in every solution; answer box no longer sized to the answer
//    (legacy leaked its length); empty submissions re-show the question instead of being scored.
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
$moduleTitle = 'Torque and Stability';
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
//  Easy: form 1  -> torque from a force and distance (figure wp-008a)
//        form 2  -> torque from a hanging mass and distance (figure wp-008b)
//  Hard: form 21 -> position of a third block that balances two others (figure wp-010)
function resolve_tq_variants(string $lvl): array {
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

function tq_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Number -> string without trailing zeros.
function tq_fmt(float $x, int $dec = 5): string {
    $s = number_format($x, $dec, '.', '');
    return (strpos($s, '.') !== false) ? rtrim(rtrim($s, '0'), '.') : $s;
}

// Plain text -> HTML. [[x]] = highlighted value, ^n = superscript, _{x} = subscript, newline = <br>.
function tq_html(string $s, bool $bind = false): string {
    $e = $bind ? bind_last_words($s) : htmlspecialchars($s);
    $e = preg_replace('/\[\[(.*?)\]\]/s', '<span style="color:#CC0066;">$1</span>', $e);
    $e = preg_replace('/\^(\d)/', '<sup>$1</sup>', $e);
    $e = preg_replace('/_\{(\w+)\}/', '<sub>$1</sub>', $e);
    return nl2br($e, false);
}

// ---- Problem generator ----
function tq_build(int $form, int $qform): array {
    $hl = fn(string $s): string => '[[' . $s . ']]';
    $f  = 'tq_fmt';
    $pic = '';
    $lead = 'Consider the diagram above in which the weight of the bar is negligible. ';

    if ($form === 1) {                                   // torque = F x r
        $force = mt_rand(110, 499) / 10;                 // N
        $r     = mt_rand(11, 30) / 10;                   // m
        $ans   = round($force * $r, 2);
        $pic   = 'wp-008a.jpg';
        $text  = $lead . 'If r is equal to ' . $hl($f($r) . ' meters') . ' and F is equal to ' . $hl($f($force) . ' N')
               . ', what is the torque about point A?';
        $soln  = ['T = F x r',
                  'T = (' . $f($force) . ' N)(' . $f($r) . ' m)',
                  'T = ' . $hl($f($ans)) . ' N-m'];

    } elseif ($form === 2) {                             // torque = W x r
        $mass = mt_rand(55, 249) / 10;                   // kg
        $r    = mt_rand(11, 30) / 10;                    // m
        $ans  = round($mass * 9.8 * $r, 3);
        $pic  = 'wp-008b.jpg';
        $text = $lead . 'A block with a mass of ' . $hl($f($mass) . ' kilograms') . ' hangs at the end of the bar. If r is equal to '
              . $hl($f($r) . ' meters') . ', what is the torque about point A?';
        $soln = ['T = W x r',
                 'T = (m)(g) x r',
                 'T = (' . $f($mass) . ' kg)(9.8 m/s^2)(' . $f($r) . ' m)',
                 'T = ' . $hl($f($ans)) . ' N-m'];

    } else {                                             // form 21: third block position
        $m1 = mt_rand(55, 249);
        $m2 = mt_rand(55, 249);
        while ($m2 === $m1) $m2 = mt_rand(55, 249);
        $a1 = mt_rand(11, 30);
        $a2 = mt_rand(11, 30);
        while ($m1 * $a1 === $m2 * $a2) $a2 = mt_rand(11, 30);   // keep the two torques unequal
        [$mass1, $mass2, $r1, $r2] = [$m1 / 10, $m2 / 10, $a1 / 10, $a2 / 10];
        $mass3 = mt_rand(55, 249) / 10;
        $t1    = round($mass1 * $r1 * 9.8, 3);
        $t2    = round($mass2 * $r2 * 9.8, 3);
        $tdiff = round($t1 - $t2, 3);
        $ans   = round($tdiff / (9.8 * $mass3), 4);
        $pic   = 'wp-010.jpg';
        $text  = 'The masses of blocks A and B above are ' . $hl($f($mass1) . ' kilograms') . ' and ' . $hl($f($mass2) . ' kilograms')
               . ', respectively. Also, the distances of blocks A and B from point P are ' . $hl($f($r1) . ' meters') . ' and '
               . $hl($f($r2) . ' meters') . ", respectively.\n\n"
               . 'How far from point P should you hang a third block, which has a mass of ' . $hl($f($mass3) . ' kilograms')
               . ', if you want to put the bar in equilibrium? Make your answer negative if you are hanging it to the left of P.';
        $side = ($ans < 0) ? 'left' : 'right';
        $soln = ['For the see-saw to be in equilibrium,',
                 'the torque to the left of P must',
                 'equal the torque to the right of P.',
                 '',
                 'T_{A} = (F_{A})(a)',
                 'T_{A} = (m_{A})(g)(a)',
                 'T_{A} = (' . $f($mass1) . ' kg)(9.8 m/s^2)(' . $f($r1) . ' m)',
                 'T_{A} = ' . $hl($f($t1)) . ' N-m',
                 'T_{B} = (F_{B})(b)',
                 'T_{B} = (m_{B})(g)(b)',
                 'T_{B} = (' . $f($mass2) . ' kg)(9.8 m/s^2)(' . $f($r2) . ' m)',
                 'T_{B} = ' . $hl($f($t2)) . ' N-m',
                 'T_{diff} = T_{A} - T_{B}',
                 'T_{diff} = ' . $f($t1) . ' N-m - ' . $f($t2) . ' N-m = ' . $f($tdiff) . ' N-m',
                 'c = (' . $f($tdiff) . ' N-m)/[(9.8 m/s^2)(' . $f($mass3) . ' kg)]',
                 'c = ' . $hl($f($ans)) . ' m',
                 '',
                 'Thus, the third block must be hung',
                 $hl($f(abs($ans))) . ' meters to the ' . $side . ' of P.'];
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
        $canonical = tq_fmt((float)$cur['answer']);
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
    $pool  = resolve_tq_variants($lvl);
    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter($pool, fn($v) => !in_array("t$lvl:f{$v[0]}q{$v[1]}", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $pool;
    }
    [$form, $qform] = $avail[array_rand($avail)];
    $used[] = "t$lvl:f{$form}q{$qform}";
    $_SESSION[$sessionKey]['used'] = $used;

    $p = tq_build($form, $qform);
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
        '<img src="' . htmlspecialchars($imgBase . $pic) . '" alt="Diagram for the torque problem" '
      . 'style="max-width:100%;height:auto;margin-bottom:12px;">';
};
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $solnHtml = implode('<br>', array_map('tq_html', $cur['soln']));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php tq_box(
      '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin-bottom:10px;">Let\'s recall the problem:</div>'
    . $imgTag($cur['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:500;line-height:1.55;text-wrap:balance;">'
    . tq_html($cur['text'], true) . '</div>'
    . '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin:18px 0 10px;">Now, let\'s see the solution:</div>'
    . '<div style="width:100%;color:#000080;font-size:13pt;font-weight:500;line-height:1.7;">' . $solnHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars(tq_fmt((float)$cur['answer'])); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php tq_box(
      $imgTag($q['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:600;line-height:1.45;text-wrap:balance;">'
    . tq_html($q['text'], true) . '</div>',
      140
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#454545;max-width:480px;margin:6px auto 0;line-height:1.55;">
    (Your margin of error for this question is <?php echo tq_fmt($tol); ?>.)
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