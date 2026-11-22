<?php
// science/modules/wp-mvds.php
// WP: Mass, Volume, and Density — numeric word problems with worked solutions.
// Two levels (Easy / Hard). In the legacy page the question form depended on level only
// (the grade-based $arrnum was computed but never used), so grade appears only in the title.
//
// CONVERSION NOTES
//  - Legacy Medium folded into Hard; Hard keeps its own forms (21, 22). Medium forms 11–14 are not carried over.
//  - Fixes: "a baggage" -> "a suitcase"; answer box no longer sized to the answer (legacy leaked its length);
//    empty submissions re-show the question instead of being scored; weight/volume values are rounded once
//    and reused so the displayed numbers and the worked solution always agree.
//  - Dead code removed: mysql_* / SPluz_accounts grade strings, $_SESSION['points'|'score'|'curpage'|'pageload'],
//    $tnum, $thetapic, unused $blue/$vio/... font strings, qform=rand(1,1)/opt=rand(1,1) no-ops, FrontPage JS,
//    legacy page chrome and background images.

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
$moduleTitle = 'Mass, Volume, and Density';
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

// ---- Question pool per level (legacy form numbers kept for traceability) ----
function resolve_wp_forms(string $lvl): array {
    return ($lvl === 'Easy') ? [1, 2, 3, 4] : [21, 22];
}

// ---- Helpers ----
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function wp_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Number -> string without trailing zeros (what PHP's echo showed in the legacy page).
function wp_fmt(float $x, int $dec = 5): string {
    $s = number_format($x, $dec, '.', '');
    return (strpos($s, '.') !== false) ? rtrim(rtrim($s, '0'), '.') : $s;
}

// Plain text -> HTML. [[x]] = highlighted value, ^n = superscript, newline = <br>.
function wp_html(string $s, bool $bind = false): string {
    $e = $bind ? bind_last_words($s) : htmlspecialchars($s);
    $e = preg_replace('/\[\[(.*?)\]\]/s', '<span style="color:#CC0066;">$1</span>', $e);
    $e = preg_replace('/\^(\d)/', '<sup>$1</sup>', $e);
    return nl2br($e, false);
}

// ---- Problem generators ----
function wp_build(int $form): array {
    $hl = fn(string $s): string => '[[' . $s . ']]';
    $pic = '';
    $massSteps = function (float $weight, float $mass) use ($hl): array {
        return ['mass = weight / acceleration due to gravity',
                'mass = (' . wp_fmt($weight) . ' N) / (9.8 m/s^2)',
                'mass = ' . $hl(wp_fmt($mass)) . ' kg'];
    };
    $densitySteps = function (float $mass, float $vol, float $ans) use ($hl): array {
        return ['density = mass / volume',
                'density = (' . wp_fmt($mass) . ' kg) / (' . wp_fmt($vol) . ' m^3)',
                'density = ' . $hl(wp_fmt($ans)) . ' kg/m^3'];
    };

    switch ($form) {
    case 1:
        $mass   = mt_rand(111, 999) / 10;
        $weight = round($mass * 9.8, 2);
        $objs = ['a crate', 'a package', 'a barrel', 'a container', 'a block', 'a rock',
                 'an object', 'a suitcase', 'an animal', 'a machine', 'a person'];
        $obj = $objs[array_rand($objs)];
        $W = $hl(wp_fmt($weight) . ' N');
        switch (mt_rand(1, 4)) {
            case 1:  $text = 'The weight of ' . $obj . ' is ' . $W . '. How much mass in kilograms does it have?'; break;
            case 2:  $text = 'Find the mass (in kilograms) of ' . $obj . ' that weighs ' . $W . '.'; break;
            case 3:  $text = 'If the weight of ' . $obj . ' is ' . $W . ', what is its mass in kilograms?'; break;
            default: $text = ucfirst($obj) . ' weighs ' . $W . '. Find its mass in kilograms.';
        }
        $ans  = $mass;
        $soln = $massSteps($weight, $mass);
        break;

    case 2:
        $unit = (mt_rand(1, 2) === 1) ? 'cm' : 'm';
        if (mt_rand(1, 2) === 1) {
            $s   = mt_rand(111, 349) / 10;
            $ans = round($s * $s * $s, 3);
            $text = 'Find the volume of a cube whose sides have a length of ' . $hl(wp_fmt($s) . ' ' . $unit) . ' each.';
            $soln = ['Volume = s^3',
                     'Volume = (' . wp_fmt($s) . ' ' . $unit . ')^3',
                     'Volume = ' . $hl(wp_fmt($ans)) . ' ' . $unit . '^3'];
        } else {
            $Li = mt_rand(249, 599);
            $Wi = mt_rand(119, 349);
            while ($Wi >= $Li) $Wi = mt_rand(199, 999);
            $Hi = mt_rand(199, 999);
            while ($Hi >= $Li) $Hi = mt_rand(199, 999);
            [$L, $Wd, $H] = [$Li / 10, $Wi / 10, $Hi / 10];
            $ans = round($L * $Wd * $H, 3);
            $pic = 'wp-022.jpg';
            $text = "Find the volume of the rectangular box above if\n"
                  . 'L = ' . $hl(wp_fmt($L) . ' ' . $unit) . ', W = ' . $hl(wp_fmt($Wd) . ' ' . $unit)
                  . ', and H = ' . $hl(wp_fmt($H) . ' ' . $unit) . '.';
            $soln = ['volume = L x W x H',
                     'volume = (' . wp_fmt($L) . ' ' . $unit . ')(' . wp_fmt($Wd) . ' ' . $unit . ')(' . wp_fmt($H) . ' ' . $unit . ')',
                     'volume = ' . $hl(wp_fmt($ans)) . ' ' . $unit . '^3'];
        }
        break;

    case 3:
        $mass   = mt_rand(1499, 14999) / 10;
        $weight = round($mass * 9.8, 2);
        $s      = mt_rand(11, 59) / 10;
        $vol    = round($s ** 3, 5);
        $ans    = round($mass / $vol, 3);
        $text = 'Find the density of an object with a volume of ' . $hl(wp_fmt($vol) . ' m^3')
              . ' and a weight of ' . $hl(wp_fmt($weight) . ' N') . '.';
        $soln = array_merge($massSteps($weight, $mass), [''], $densitySteps($mass, $vol, $ans));
        break;

    case 4:
        $mass = mt_rand(1499, 14999) / 10;
        $s    = mt_rand(11, 59) / 10;
        $vol  = round($s ** 3, 5);
        $ans  = round($mass / $vol, 3);
        $text = 'What is the density of an object with a volume of ' . $hl(wp_fmt($vol) . ' m^3')
              . ' and a mass of ' . $hl(wp_fmt($mass) . ' kg') . '?';
        $soln = $densitySteps($mass, $vol, $ans);
        break;

    case 21:
        $mass   = mt_rand(1499, 14999) / 10;
        $weight = round($mass * 9.8, 2);
        $r      = mt_rand(11, 49) / 10;
        $vol    = round(3.14 * ($r ** 3) * 4 / 3, 5);
        $ans    = round($mass / $vol, 3);
        $text = 'Using pi=3.14, find the density of a sphere with a radius of ' . $hl(wp_fmt($r) . ' m')
              . ' and a weight of ' . $hl(wp_fmt($weight) . ' N') . '.';
        $soln = array_merge(
            $massSteps($weight, $mass), [''],
            ['volume = (4/3)(pi)(r^3)',
             'volume = (4/3)(3.14)(' . wp_fmt($r) . ' m)^3',
             'volume = ' . $hl(wp_fmt($vol)) . ' m^3', ''],
            $densitySteps($mass, $vol, $ans)
        );
        break;

    case 22:
        $mass   = mt_rand(1499, 14999) / 10;
        $weight = round($mass * 9.8, 2);
        $r      = mt_rand(30, 129) / 10;
        $h      = mt_rand(30, 129) / 10;
        $vol    = round(3.14 * ($r ** 2) * $h, 5);
        $ans    = round($mass / $vol, 3);
        $text = 'Using pi=3.14, find the density of a cylinder with a radius of ' . $hl(wp_fmt($r) . ' m')
              . ', a height of ' . $hl(wp_fmt($h) . ' m') . ', and a weight of ' . $hl(wp_fmt($weight) . ' N') . '.';
        $soln = array_merge(
            $massSteps($weight, $mass), [''],
            ['volume = (pi)(r^2)(h)',
             'volume = (3.14)(' . wp_fmt($r) . ' m)^2(' . wp_fmt($h) . ' m)',
             'volume = ' . $hl(wp_fmt($vol)) . ' m^3', ''],
            $densitySteps($mass, $vol, $ans)
        );
        break;

    default:
        return wp_build(1);
    }
    return ['form' => $form, 'text' => $text, 'soln' => $soln, 'ans' => $ans, 'pic' => $pic];
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
        $canonical = wp_fmt((float)$cur['answer']);
        $within    = is_numeric($clean) && abs((float)$cur['answer'] - (float)$clean) <= $tol + 1e-9;
        $scorer    = new Scorer($conn, $moduleId);
        $isCorrect = $scorer->processAnswer($within ? $canonical : $clean, $canonical, $cur['lvl']);
        $result    = ['correct' => $isCorrect, 'raw' => $raw, 'cur' => $cur];
        unset($_SESSION[$sessionKey]['current']);
    }
}

// ---- Question generation (§6) ----
if (isset($_POST['Submit2']) || ($result === null && !$emptyAnswer)) {
    // No-repeat by form, per level; clear only the current level when the pool is exhausted
    $pool = resolve_wp_forms($lvl);
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = array_values(array_filter($pool, fn($f) => !in_array("t$lvl:f$f", $used, true)));
    if (empty($avail)) {
        $used  = array_values(array_filter($used, fn($k) => strpos($k, "t$lvl:") !== 0));
        $avail = $pool;
    }
    $form = $avail[array_rand($avail)];
    $used[] = "t$lvl:f$form";
    $_SESSION[$sessionKey]['used'] = $used;

    $p = wp_build($form);
    $_SESSION[$sessionKey]['current'] = [
        'lvl'    => $lvl,
        'form'   => $form,
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
        '<img src="' . htmlspecialchars($imgBase . $pic) . '" alt="Rectangular box with length L, width W and height H" '
      . 'style="max-width:100%;height:auto;margin-bottom:12px;">';
};
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $solnHtml = implode('<br>', array_map('wp_html', $cur['soln']));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['raw']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php wp_box(
      '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin-bottom:10px;">Let\'s recall the problem:</div>'
    . $imgTag($cur['pic'])
    . '<div style="width:100%;color:#800080;font-size:14pt;font-weight:500;line-height:1.55;text-wrap:balance;">'
    . wp_html($cur['text'], true) . '</div>'
    . '<div style="width:100%;color:#CC0066;font-size:13pt;font-weight:600;margin:18px 0 10px;">Now, let\'s see the solution:</div>'
    . '<div style="width:100%;color:#000080;font-size:13pt;font-weight:500;line-height:1.7;">' . $solnHtml . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars(wp_fmt((float)$cur['answer'])); ?></strong>
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php wp_box(
      $imgTag($q['pic'])
    . '<div style="width:100%;color:#800080;font-size:15pt;font-weight:700;line-height:1.55;text-wrap:balance;">'
    . wp_html($q['text'], true) . '</div>',
      140
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#454545;max-width:480px;margin:6px auto 0;line-height:1.55;">
    (Your margin of error for this question is <?php echo wp_fmt($tol); ?>.)
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
    <input type="submit" name="Submit1" value=" Submit " style="font-family:Arial,sans-serif;">&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Submit2" value=" New Question " style="font-family:Arial,sans-serif;">
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