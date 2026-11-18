<?php
// science/modules/animal-classifications.php
// Classifying Animals — identify an animal from its picture (kind, class or phylum).
// 11 tiers (0–10) via (level × grade); grade from $_SESSION['user_grade'] (0–10).
//
// CONVERSION NOTES
//  - Legacy Medium folded into Hard (Hard uses the harder of the Medium/Hard rules; see resolve_animal_range()).
//  - Typos/data fixes: crustaceans listed "crab-1" five times -> listed once;
//    "ray-3" and "ray-6" omitted (legacy strlen<10 filter silently skipped them);
//    phylum questions now draw distractors from all 8 phyla (legacy x-offset left the answer as the odd one out).
//  - Dead code removed: score/points session handling, SPluz_accounts string-grade updates, $tnum, note-fur-mc.jpg
//    button backgrounds, FrontPage image-swap JS, legacy page chrome, $y mutation bug in the phylum branch.

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
$moduleTitle = 'Classifying Animals';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$imgBase = '../images/animals/';   // same relative location the legacy page used; adjust if images moved

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Tier mapping (§4) ----
// Tier = legacy $arrnum (0–10). Easy: grade (max 8). Hard: grade + 2 (max 10).
function resolve_animal_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') return min(8, $grd);
    return min(10, $grd + 2);
}

// Range of group indexes [x, y] used for a tier and question kind (1 = "what kind", 2 = class/phylum).
function resolve_animal_range(string $lvl, int $tier, int $qkind): array {
    $k1 = [0 => [0, 3], 1 => [0, 3], 2 => [0, 4], 3 => [0, 6], 4 => [0, 8], 5 => [0, 9],
           6 => [0, 11], 7 => [0, 13], 8 => [0, 15], 9 => [6, 15], 10 => [8, 15]];
    $k2 = [7 => [0, 13], 8 => [0, 15], 9 => [3, 15], 10 => [3, 15]];
    [$x, $y] = ($qkind === 1) ? $k1[$tier] : $k2[$tier];
    // Hard drops mammals/birds/fish from "what kind" questions above tier 3 (never lowers a higher start)
    if ($qkind === 1 && $lvl === 'Hard' && $tier > 3) $x = max($x, 3);
    return [$x, $y];
}

// ---- Data (§5) ----
function ac_seq(string $stem, int $from, int $to): array {
    $o = [];
    for ($i = $from; $i <= $to; $i++) $o[] = $stem . $i;
    return $o;
}

// Index order matters: it drives the tier ranges above.
$groups = [
    0  => ['kind' => 'mammal',         'class' => 'Mammalia',       'phylum' => 'Chordata',      'folder' => 'ab',
           'files' => ['aardvark-','bear-sknz','cougar-ffp','cow-sknz','dolphin-1','dolphin-2','elephant-ffp','giraffe-ffp','gorilla-',
                       'hedgehog-sknz','hippopotamus-ffp','jaguar-ffp','kangaroo-sknz','panda-ffp','rabbit-ep','rhinoceros-ffp','squirrel-sknz','zebra-ffp']],
    1  => ['kind' => 'bird',           'class' => 'Aves',           'phylum' => 'Chordata',      'folder' => 'bc',
           'files' => ['blackbird-bf','duck-sknz','eagle-ffp','falcon-ffp','hawk-ffp','kiwi-sknz','macaw-bf','owl-bf','peacock-bf','penguin-ffp',
                       'pigeon-bf','rooster-bf','seagull-bf','seagull-sknz','stork-bf']],
    2  => ['kind' => 'fish',           'class' => 'Osteichthyes',   'phylum' => 'Chordata',      'folder' => 'cd',
           'files' => ['arowana-','barracuda-','catfish-','clownfish-','goldfish-','lionfish-','mackerel-','piranha-','triggerfish-sknz']],
    3  => ['kind' => 'insect',         'class' => 'Insecta',        'phylum' => 'Arthropoda',    'folder' => 'de',
           'files' => ['ant-ccc','bee-01','bee-sknz','butterfly-bf','dragonfly-bf','dragonfly-sknz','fly-sknz','grasshopper-bf','ladybug-sknz','louse-1','louse-2']],
    4  => ['kind' => 'reptile',        'class' => 'Reptilia',       'phylum' => 'Chordata',      'folder' => 'ef',
           'files' => ['alligator-','alligator-2','anaconda-snake1','cobra-snake1','cobra-snake2','crocodile-1','crocodile-2','iguana-ffp',
                       'rattlesnake-1','rattlesnake-2','sea turtle-1','sea turtle-2','tortoise-ffp','turtle-1','turtle-2','turtle-3','viper-snake1']],
    5  => ['kind' => 'amphibian',      'class' => 'Amphibia',       'phylum' => 'Chordata',      'folder' => 'fg',
           'files' => array_merge(ac_seq('caecilian-', 1, 5),
                                  ['frog-01','frog-02','frog-03','frog-04','frog-05','frog-bf'],
                                  ac_seq('salamander-', 1, 5))],
    6  => ['kind' => 'arachnid',       'class' => 'Arachnida',      'phylum' => 'Arthropoda',    'folder' => 'gh',
           'files' => array_merge(ac_seq('mite-', 1, 5), ac_seq('scorpion-', 1, 5), ac_seq('spider-', 1, 5),
                                  ['spider-bf','spider-ffp','spider-sknz'], ac_seq('tick-', 1, 5))],
    7  => ['kind' => 'chondrichthyan', 'class' => 'Chondrichthyes', 'phylum' => 'Chordata',      'folder' => 'hi',
           'files' => array_merge(['ray-01','ray-02','ray-04','ray-05'], ac_seq('shark-', 1, 6), ['shark-ffp'])],
    8  => ['kind' => 'crustacean',     'class' => 'Crustacea',      'phylum' => 'Arthropoda',    'folder' => 'ij',
           'files' => array_merge(['crab-1'], ac_seq('crayfish-', 1, 5), ac_seq('lobster-', 1, 5), ac_seq('shrimp-', 1, 5))],
    9  => ['kind' => 'cephalopod',     'class' => 'Cephalopoda',    'phylum' => 'Mollusca',      'folder' => 'jk',
           'files' => ['cuttlefish-1','nautilus-1','octopus-1','squid-1']],
    10 => ['kind' => 'gastropod',      'class' => 'Gastropoda',     'phylum' => 'Mollusca',      'folder' => 'kl',
           'files' => array_merge(ac_seq('slug-', 1, 5), ac_seq('snail-', 1, 5))],
    11 => ['kind' => 'bivalve',        'class' => 'Bivalvia',       'phylum' => 'Mollusca',      'folder' => 'lm',
           'files' => ['clam-1','clam-2','mussel-1','oyster-1','scallop-1','scallop-2']],
    12 => ['kind' => 'asteroid',       'class' => 'Asteroidea',     'phylum' => 'Echinodermata', 'folder' => 'mn',
           'files' => ac_seq('sea star-', 1, 7)],
    13 => ['kind' => 'echinoid',       'class' => 'Echinoidea',     'phylum' => 'Echinodermata', 'folder' => 'no',
           'files' => ac_seq('sea urchin-', 1, 8)],
    14 => ['kind' => 'holothuroid',    'class' => 'Holothuroidea',  'phylum' => 'Echinodermata', 'folder' => 'op',
           'files' => ac_seq('sea cucumber-', 1, 10)],
    15 => ['kind' => 'ophiuroid',      'class' => 'Ophiuroidea',    'phylum' => 'Echinodermata', 'folder' => 'pq',
           'files' => array_merge(ac_seq('brittle star-', 1, 4), ac_seq('basket star-', 1, 2))],
];
$phyla = ['Chordata', 'Arthropoda', 'Mollusca', 'Echinodermata', 'Annelida', 'Nematoda', 'Platyhelminthes', 'Cnidaria'];

// Parse once: bank[group][animal name] = [file stems]. Name = filename up to the first "-".
function ac_build_bank(array $groups): array {
    $bank = [];
    foreach ($groups as $gi => $g) {
        foreach ($g['files'] as $f) {
            $bank[$gi][substr($f, 0, strpos($f, '-'))][] = $f;
        }
    }
    return $bank;
}
$bank = ac_build_bank($groups);

// ---- Helpers (§8.6, §8.4) ----
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

function ac_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

// Animals not yet used in this tier, grouped by group index.
function ac_available(array $bank, int $x, int $y, int $tier, array $used): array {
    $out = [];
    for ($gi = $x; $gi <= $y; $gi++) {
        foreach (array_keys($bank[$gi]) as $name) {
            if (!in_array("t$tier:g$gi:$name", $used, true)) $out[$gi][] = $name;
        }
    }
    return $out;
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $tier  = resolve_animal_tier($lvl, $grd);
    $qkind = ($tier <= 6) ? 1 : mt_rand(1, 2);
    [$x, $y] = resolve_animal_range($lvl, $tier, $qkind);

    // No-repeat (by animal, per tier). Pick a group evenly, then an unused animal in it (legacy balance).
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $avail = ac_available($bank, $x, $y, $tier, $used);
    if (empty($avail)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        $avail = ac_available($bank, $x, $y, $tier, $used);
    }
    $gi   = array_rand($avail);
    $name = $avail[$gi][array_rand($avail[$gi])];
    $file = $bank[$gi][$name][array_rand($bank[$gi][$name])];
    $used[] = "t$tier:g$gi:$name";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    // Question + choices
    $g = $groups[$gi];
    $pool = [];
    if ($qkind === 1) {
        $skind  = '';
        $prompt = 'What kind of animal is this?';
        $correct = $g['kind'];
        for ($i = $x; $i <= $y; $i++) $pool[] = $groups[$i]['kind'];
    } else {
        $skind  = (mt_rand(1, 2) === 1) ? 'class' : 'phylum';
        $prompt = 'To which ' . $skind . ' does this animal belong?';
        $correct = $g[$skind];
        if ($skind === 'class') {
            for ($i = $x; $i <= $y; $i++) $pool[] = $groups[$i]['class'];
        } else {
            $pool = $phyla;
        }
    }
    $wrong = array_values(array_diff(array_unique($pool), [$correct]));
    shuffle($wrong);
    $choices = array_merge(array_slice($wrong, 0, 3), [$correct]);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'lvl'     => $lvl,
        'qkind'   => $qkind,
        'skind'   => $skind,
        'prompt'  => $prompt,
        'img'     => $imgBase . $g['folder'] . '/' . rawurlencode($file) . '.jpg',
        'name'    => $name,
        'snake'   => (strpos($file, 'snake') !== false),
        'correct' => $correct,
        'choices' => $choices,
    ];
}

// ---- Render (§8, §9, §10) ----
$theme = [];   // TODO: replace with the standard theme array used by the other modules
render_header($moduleTitle . ' - Grade ' . $grd . ' - ' . $lvl,
              $moduleTitle . ' - Grade ' . $grd . ' - ' . $lvl,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $article = preg_match('/^[aeiou]/i', $cur['name']) ? 'an' : 'a';
    $isSnake = ($cur['qkind'] === 1 && $cur['snake']);
    $s1 = 'This animal is ' . $article . ' ' . $cur['name'];
    if ($isSnake && stripos($cur['name'], 'snake') === false) $s1 .= ', a kind of snake';
    $s1 .= '.';
    $ansSpan = '<span style="color:#CC0066;font-weight:700;">\'' . htmlspecialchars($cur['correct']) . '\'</span>';
    if ($cur['qkind'] === 1) {
        $s2 = ($isSnake ? 'It is a&nbsp;' : 'It is a kind&nbsp;of&nbsp;') . $ansSpan . '.';
    } else {
        $s2 = 'It belongs to ' . $cur['skind'] . '&nbsp;' . $ansSpan . '.';
    }
    $fbImg = '<img src="' . htmlspecialchars($cur['img']) . '" alt="' . htmlspecialchars($cur['name']) . '" style="max-width:100%;height:auto;border-radius:6px;margin-bottom:14px;">';
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php ac_box(
      $fbImg
    . '<div style="width:100%;font-size:15pt;color:#800080;line-height:1.55;text-wrap:balance;">'
    . bind_last_words($s1) . '<br>' . $s2
    . '</div>',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;text-wrap:balance;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['correct']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <?php ac_box(
      '<img src="' . htmlspecialchars($q['img']) . '" alt="Animal to classify" style="max-width:100%;height:auto;border-radius:6px;">',
      160
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;margin:20px auto 0;line-height:1.55;text-wrap:balance;">
    <?php echo bind_last_words($q['prompt']); ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#800080;max-width:480px;margin:14px auto 20px;">
    Click on your answer.
  </p>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;min-width:180px;min-height:64px;max-width:260px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit2" value="New Question" style="font-family:Arial,sans-serif;">
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