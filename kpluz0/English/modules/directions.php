<?php
// english/modules/directions.php
// Following Simple Directions — MC (4 choices).
// Easy pool: 15 one-step items. Hard pool: 15 multi-step items.
// Grade-aware: Easy &#8594; Easy pool. Hard @ 0-2 &#8594; merged. Hard @ 3+ &#8594; Hard only.

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
$moduleTitle = 'Following Simple Directions';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade / level ---------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Item bank -------------------------------------------------------------
// Each item: [question, correct, [wrong1, wrong2, wrong3]]
$allItems = [
    // ---- Easy pool (indices 0..6, 10..11, 13, 16, 20..23) ----
    0  => ["Write the word 'dog' in big letters. Add a small letter 's' at the end.", "DOGs", ["DOGS", "dogs", "dogS"]],
    1  => ["Write the word 'bird' in small letters. Add a big letter 's' at the end.", "birdS", ["BIRDS", "birds", "BIRDs"]],
    2  => ["Write the numbers from 1 to 5. Erase the number '4'.", "1235", ["1234", "1256", "1236"]],
    3  => ["Write 'ABC' then add '123' after the 'C'.", "ABC123", ["123ABC", "abc123", "AB123C"]],
    4  => ["Write the word 'yes' in big letters. Punctuate it with a question mark.", "YES?", ["?YES", "yes?", "?yes"]],
    5  => ["Write the word 'cane' in small letters. Erase the letter 'e'.", "can", ["canE", "CAN", "Can"]],
    6  => ["Write the word 'dime' in big letters. Erase the letter 'E'.", "DIM", ["DIMe", "dim", "Dim"]],
    10 => ["Write the big letter 'X' three times. Replace the first one with a 'Y'.", "YXX", ["YXXX", "XXXY", "XXY"]],
    11 => ["Write the big letter 'S' three times. Replace the last one with a 'T'.", "SST", ["SSST", "TSS", "TSSS"]],
    13 => ["Write in small letters the word for a baby dog. Erase the last two letters.", "pup", ["pupp", "ppy", "upp"]],
    16 => ["Write the big letter 'M' thrice. Replace the second 'M' with the big letter 'N'.", "MNM", ["mNm", "MN", "MNm"]],
    20 => ["Write the number '9' four times then write the number '7' twice.", "999977", ["99977", "999777", "9999777"]],
    21 => ["Write the number '>' thrice then write the number '<' four times.", ">>><<<<", [">>><<<", ">>><<<", ">><<<<"]],
    22 => ["Draw a heart twice then draw a diamond thrice.", "heartheartdiamonddiamonddiamond", ["heartheartheartdiamonddiamond", "diamonddiamonddiamondheartheart", "heartheartheartdiamonddiamonddiamond"]],
    23 => ["Draw a heart three times then draw a diamond once.", "heartheartheartdiamond", ["heartheartdiamond", "heartheartheartdiamonddiamond", "heartheartheartstar"]],
    // ---- Hard pool (indices 7..9, 12, 14..15, 17..19, 24..29) ----
    7  => ["Write 'two hundred eleven' as a number. Replace the number '2' with the number '3'.", "311", ["231", "213", "113"]],
    8  => ["Write in big letters the word for the color of grass. Replace the letter 'G' with the big letter 'P'.", "PREEN", ["preen", "Preen", "pREEN"]],
    9  => ["Write three question marks. Add a period at the end.", "???.", [".???", "??.", "????."]],
    12 => ["Write in big letters the word for a baby cat. Erase one 'T' and the 'N'.", "KITE", ["kite", "KITT", "KIE"]],
    14 => ["Write in small letters the word for a baby chicken. Replace the last two letters with the small letter 'n'.", "chin", ["chicn", "CHIn", "chn"]],
    15 => ["Write the word 'math' in small letters. Replace the first letter with the big letter 'P'.", "Path", ["PATH", "pATH", "matP"]],
    17 => ["Write in big letters the name of the month after April. Replace the last letter with the big letter 'N'.", "MAN", ["MAYN", "maN", "APRIN"]],
    18 => ["Write in small letters the name of the month before July. Replace the first letter with the big letter 'D'.", "Dune", ["DUNE", "junD", "Dugust"]],
    19 => ["Write in big letters the name of the color you'd get if you mix black with white. Replace its last letter with the big letter 'B'.", "GRAB", ["BRAY", "graB", "GRAb"]],
    24 => ["Draw a heart. Write the word 'love' in big letters. Draw another heart.", "heartLOVEheart", ["heartloveheart", "heartheartLOVE", "heartLOVEstar"]],
    25 => ["Draw a star thrice. Write the word 'heaven' in small letters.", "starstarstarheaven", ["starstarstarHEAVEN", "starstarheaven", "diamonddiamonddiamondheaven"]],
    26 => ["Draw a star on the left and a diamond on the right. Write the word 'joy' in big letters between them.", "starJOYdiamond", ["diamondJOYstar", "starJOYheart", "heartJOYdiamond"]],
    27 => ["Draw two diamonds on the left and two hearts on the right.", "diamonddiamondheartheart", ["diamondheartheart", "heartheartdiamonddiamond", "diamonddiamond heart"]],
    28 => ["Write the word 'twinkle' in big letters. Draw a star twice on the right.", "TWINKLEstarstar", ["TWINKLEstarstarstar", "starstarTWINKLE", "twinklestarstar"]],
    29 => ["Write 'I'. Draw a heart. Write the word 'you' in big letters.", "IheartYOU", ["IheartheartYOU", "YOUheartI", "Iheartyou"]],
];

$easyIdx = [0,1,2,3,4,5,6,10,11,13,16,20,21,22,23];
$hardIdx = [7,8,9,12,14,15,17,18,19,24,25,26,27,28,29];

// ---- Grade-aware pool resolver ---------------------------------------------
function resolve_dir_pool(string $lvl, int $grd, array $easyIdx, array $hardIdx): array {
    if ($lvl === 'Easy') return $easyIdx;
    if ($grd <= 2)       return array_merge($easyIdx, $hardIdx);
    return $hardIdx;
}

// ---- Visual rendering: heart/diamond/star &#8594; HTML entities ------------------
function dir_visual(string $raw): string {
    $esc = htmlspecialchars($raw);
    return str_replace(
        ['heart', 'diamond', 'star'],
        ['&#10084;', '&#9830;', '&#9733;'],
        $esc
    );
}

// ---- Anti-orphan + 480 px centered box helpers -----------------------------
function dir_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function dir_box(string $html, int $minHeight = 160): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:22px 28px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $poolIdxs = resolve_dir_pool($lvl, $grd, $easyIdx, $hardIdx);

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($poolIdxs, fn($i) => !in_array($i, $used, true)));
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($i) => !in_array($i, $poolIdxs, true)));
        $available = $poolIdxs;
    }
    $pickIdx = $available[array_rand($available)];
    $used[] = $pickIdx;
    if (count($used) > 200) $used = array_slice($used, -150);
    $_SESSION[$sessionKey]['used'] = $used;

    [$question, $correct, $wrong] = $allItems[$pickIdx];
    $choices = array_merge($wrong, [$correct]);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question' => $question,
        'correct'  => $correct,
        'choices'  => $choices,
        'lvl'      => $lvl,
        'grd'      => $grd,
        'idx'      => $pickIdx,
    ];
}

// ---- Render ----------------------------------------------------------------
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
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo dir_visual($result['clicked']); ?>'</strong></p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <?php dir_box(
      '<div style="width:100%;font-weight:700;color:#800080;margin-bottom:6px;font-size:15pt;">Directions:</div>'
    . '<div style="width:100%;color:#333;font-size:16pt;line-height:1.25;margin-bottom:18px;text-wrap:balance;">' . dir_bind_last_words($cur['question']) . '</div>'
    . '<div style="width:100%;font-weight:700;color:#800080;margin-bottom:6px;font-size:15pt;">Result:</div>'
    . '<div style="width:100%;color:#CC0066;font-size:22pt;line-height:1.4;font-weight:700;word-break:break-word;">' . dir_visual($cur['correct']) . '</div>'
  ); ?>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else: $q = $_SESSION[$sessionKey]['current']; ?>
  <?php dir_box(
      '<div style="width:100%;font-weight:700;color:#800080;margin-bottom:6px;font-size:15pt;">Directions:</div>'
    . '<div style="width:100%;color:#333;font-size:16pt;line-height:1.25;text-wrap:balance;">' . dir_bind_last_words($q['question']) . '</div>'
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:600;color:#800080;max-width:480px;margin:10px auto 14px;">What did you come up with? Click on your answer.</p>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;min-width:160px;min-height:64px;max-width:260px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;text-align:center;word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo dir_visual($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>