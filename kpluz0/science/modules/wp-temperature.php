<?php
// science/modules/wp-temperature.php
// WP: Temperature Conversion — Celsius / Fahrenheit / Kelvin conversions with worked solutions.
// Single level (Easy). The legacy page ignored grade for content ($arrnum was never used), so grade
// appears only in the title.
//
// CONVERSION NOTES
//  - Legacy forced $_SESSION['level']="Easy" for the whole site on every load; this version keeps its level
//    local ($lvl) and never touches the shared session level. No difficulty radios: only Easy content exists.
//  - Fixes: "1 deg Celsius" style singular/plural ("1 degree"), "Kelvins" -> "kelvins", plain "deg" -> degree sign,
//    answers are rounded once (no float noise like 26.850000000000023), the answer box no longer reveals the
//    answer's length, empty submissions re-show the question instead of being scored.
//  - Dead code removed: mysql_* / SPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, $thetapic, $qpic, $prob3a, unused $c re-rolls in the F->K and K->F branches, unused font strings,
//    FrontPage JS, legacy page chrome and background images.

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
$moduleTitle = 'Temperature Conversion';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';   // only level this module has

// ---- Question variants: [form, qform]  (form: 1 = from °C, 2 = from °F, 3 = from K; qform: which target) ----
function resolve_wt_variants(): array {
    return [[1, 1], [1, 2], [2, 1], [2, 2], [3, 1], [3, 2]];
}

// ---- Helpers ----
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function wt_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Number -> string without trailing zeros.
function wt_fmt(float $x, int $dec = 5): string {
    $s = number_format($x, $dec, '.', '');
    return (strpos($s, '.') !== false) ? rtrim(rtrim($s, '0'), '.') : $s;
}

// Plain text -> HTML. [[x]] = highlighted value, {deg} = degree sign, newline = <br>.
function wt_html(string $s, bool $bind = false): string {
    $e = $bind ? bind_last_words($s) : htmlspecialchars($s);
    $e = preg_replace('/\[\[(.*?)\]\]/s', '<span style="color:#CC0066;">$1</span>', $e);
    $e = str_replace('{deg}', '&deg;', $e);
    return nl2br($e, false);
}

// ---- Problem generator ----
function wt_build(int $form, int $qform): array {
    $hl  = fn(string $s): string => '[[' . $s . ']]';
    $deg = fn(int $n, string $scale): string => $n . ' degree' . (abs($n) === 1 ? '' : 's') . ' ' . $scale;
    $ask = function (string $from, string $to) use ($hl): string {
        return (mt_rand(1, 2) === 1)
            ? 'Convert ' . $hl($from) . ' into ' . $to . '.'
            : 'What is ' . $hl($from) . ' in ' . $to . '?';
    };
    $range = mt_rand(1, 4);

    if ($form === 1) {                                   // from Celsius
        if ($range < 3)         $c = mt_rand(0, 100);
        elseif ($range === 3)   $c = mt_rand(101, 450);
        else                    $c = mt_rand(-100, -1);
        if ($qform === 1) {                              // -> Fahrenheit
            $ans  = round(9 / 5 * $c + 32, 3);
            $text = $ask($deg($c, 'Celsius'), 'degrees Fahrenheit');
            $soln = ['T in {deg}F = (9/5)(T in {deg}C) + 32',
                     'T in {deg}F = (9/5)(' . $c . ') + 32',
                     'T in {deg}F = ' . wt_fmt(9 / 5 * $c) . ' + 32',
                     'T = ' . wt_fmt($ans) . ' {deg}F',
                     'Thus, ' . $c . ' {deg}C = ' . $hl(wt_fmt($ans)) . ' {deg}F'];
        } else {                                         // -> Kelvin
            if ($range === 4) $c = mt_rand(-200, -1);
            $ans  = round($c + 273.15, 3);
            $text = $ask($deg($c, 'Celsius'), 'degrees Kelvin');
            $soln = ['T in K = T in {deg}C + 273.15',
                     'T in K = ' . $c . ' + 273.15',
                     'T = ' . wt_fmt($ans) . ' K',
                     'Thus, ' . $c . ' {deg}C = ' . $hl(wt_fmt($ans)) . ' K'];
        }
    } elseif ($form === 2) {                             // from Fahrenheit
        if ($range < 3)         $f = mt_rand(-32, 212);
        elseif ($range === 3)   $f = mt_rand(213, 650);
        else                    $f = mt_rand(-150, -1);
        $r = round(5 / 9 * ($f - 32), 3);
        if ($qform === 1) {                              // -> Celsius
            $ans  = $r;
            $text = $ask($deg($f, 'Fahrenheit'), 'degrees Celsius');
            $soln = ['T in {deg}C = (5/9)(T in {deg}F - 32)',
                     'T in {deg}C = (5/9)(' . $f . ' - 32)',
                     'T in {deg}C = (5/9)(' . ($f - 32) . ')',
                     'T = ' . wt_fmt($ans) . ' {deg}C',
                     'Thus, ' . $f . ' {deg}F = ' . $hl(wt_fmt($ans)) . ' {deg}C'];
        } else {                                         // -> Kelvin
            $ans  = round($r + 273.15, 3);
            $text = $ask($deg($f, 'Fahrenheit'), 'degrees Kelvin');
            $soln = ['T in K = (5/9)(T in {deg}F - 32) + 273.15',
                     'T in K = (5/9)(' . $f . ' - 32) + 273.15',
                     'T in K = (5/9)(' . ($f - 32) . ') + 273.15',
                     'T in K = ' . wt_fmt($r) . ' + 273.15',
                     'T = ' . wt_fmt($ans) . ' K',
                     'Thus, ' . $f . ' {deg}F = ' . $hl(wt_fmt($ans)) . ' K'];
        }
    } else {                                             // from Kelvin
        if ($range < 3)         $k = mt_rand(273, 373);
        elseif ($range === 3)   $k = mt_rand(373, 700);
        else                    $k = mt_rand(2, 273);
        $d = round($k - 273.15, 2);
        if ($qform === 1) {                              // -> Celsius
            $ans  = $d;
            $text = $ask($k . ' degrees Kelvin', 'degrees Celsius');
            $soln = ['T in {deg}C = T in K - 273.15',
                     'T in {deg}C = ' . $k . ' - 273.15',
                     'T = ' . wt_fmt($ans) . ' {deg}C',
                     'Thus, ' . $k . ' K = ' . $hl(wt_fmt($ans)) . ' {deg}C'];
        } else {                                         // -> Fahrenheit
            $e    = round(9 / 5 * $d, 3);
            $ans  = round($e + 32, 3);
            $text = $ask($k . ' degrees Kelvin', 'degrees Fahrenheit');
            $soln = ['T in {deg}F = (9/5)(T in K - 273.15) + 32',
                     'T in {deg}F = (9/5)(' . $k . ' - 273.15) + 32',
                     'T in {deg}F = (9/5)(' . wt_fmt($d) . ') + 32',
                     'T in {deg}F = ' . wt_fmt($e) . ' + 32',
                     'T = ' . wt_fmt($ans) . ' {deg}F',
                     'Thus, ' . $k . ' K = ' . $hl(wt_fmt($ans)) . ' {deg}F'];
        }
    }
    return ['text' => $text, 'soln' => $soln, 'ans' => $ans];
}

// ---- Answer processing (§7) ----
$tol = 0.1;
$result = null; $scorer = null; $emptyAnswer = false;
if (isset($_POST['Submit1']) && !isset($_POST['Submit2']) && isset($_SESSION[$sessionKey]['current'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = trim((string)($_POST['answer'] ?? ''));
    if ($raw === '') {
        $emptyAnswer = true;                       // keep the same question; nothing scored
    } else {
        $clean     = str_replace([',', ' '], '', $raw);
        $canonical = wt_fmt((float)$cur['answer']);
        $within    = is_numeric($clean) && abs((float)$cur['answer'] - (float)$clean) <= $tol + 1e-9;
        $scorer    = new Scorer($conn, $moduleId);
        $isCorrect = $scorer->processAnswer($within ? $canonical : $clean, $canonical, $cur['lvl']);
        $result    = ['correct' => $isCorrect, 'raw' => $raw, 'cur' => $cur];
        unset($_SESSION[$sessionKey]['current']);
    }
}

// ---- Question generation (§6) ----
if (isset($_POST['Submit2']) || ($result === null && !$emptyAnswer)) {
    // No-repeat by variant; clear only this level's entries when all six have been used
    $pool  = resolve_wt_variants();
    $used  = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter($pool, fn($v) => !in_array("t$lvl:f{$v[0]}q{$v[1]}", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $pool;
    }
    [$form, $qform] = $avail[array_rand($avail)];
    $used[] = "t$lvl:f{$form}q{$qform}";
    $_SESSION[$sessionKey]['used'] = $used;

    $p = wt_build($form, $qform);
    $_SESSION[$sessionKey]['current'] = [
        'lvl'    => $lvl,
        'text'   => $p['text'],
        'soln'   => $p['soln'],
        'answer' => $p['ans'],
    ];
}

// ---- Render (§8, §9, §10) ----
$theme = [];   // TODO: replace with the standard theme array used by the other modules
render_header($moduleTitle,
              $moduleTitle,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $solnHtml = implode('<br>', array_map('wt_html', $cur['soln']));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php wt_box(
      '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin-bottom:10px;">Let\'s recall the problem:</div>'
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:500;line-height:1.55;text-wrap:balance;">'
    . wt_html($cur['text'], true) . '</div>'
    . '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin:18px 0 10px;">Now, let\'s see the solution:</div>'
    . '<div style="width:100%;color:#000080;font-size:13pt;font-weight:500;line-height:1.7;">' . $solnHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars(wt_fmt((float)$cur['answer'])); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php wt_box(
      '<div style="width:100%;color:#800080;font-size:15pt;font-weight:700;line-height:1.55;text-wrap:balance;">'
    . wt_html($q['text'], true) . '</div>',
      140
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#454545;max-width:480px;margin:6px auto 0;line-height:1.55;">
    (Your margin of error for this question is <?php echo wt_fmt($tol); ?>.)
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
    <input type="submit" name="Submit1" value=" Submit " style="font-family:Arial,sans-serif;">&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Submit2" value=" New Question " style="font-family:Arial,sans-serif;">
  </div>
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>