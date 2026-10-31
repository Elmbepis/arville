<?php
// english/modules/fact-opinion.php
// Fact and Opinion — MC (fact / opinion). 5 tiers via (level × grade).
// Grade from $_SESSION['user_grade'] (0–10).

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
$moduleTitle = 'Fact and Opinion';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade resolution ------------------------------------------------------
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// ---- Level resolution ------------------------------------------------------
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard'; // migrate legacy Medium -> Hard
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- (level, grade) -> tier mapping ----------------------------------------
// Legacy tiers available: 3, 4, 5, 6, 7 (3 is the minimum).
//   Easy:   $arrnum = $grd,     capped at 5
//   Hard:   $arrnum = $grd + 2, capped at 7  (harder of Medium/Hard wins)
function resolve_fo_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        return min(5, max(3, $grd));
    }
    return min(7, max(3, $grd + 2));
}

// ---- Data banks (static; no random substitutions in this module) ----------
$dataByTier = [
    3 => [
        'facts' => [
            "The day after Thursday is Friday.",
            "There are 24 hours in a day.",
            "A decade is a period of 10 years.",
            "There are seven days in a week.",
            "All animals need food to live.",
            "All insects have six legs.",
            "Not all birds can fly.",
            "There are twelve months in a year.",
            "April is a month with 30 days.",
            "All dinosaurs are extinct.",
            "Bats are nocturnal mammals.",
            "Japan and China are in Asia.",
            "Fishes breathe through gills.",
            "Elephants eat grass and leaves.",
            "Most adults have 32 teeth.",
        ],
        'opinions' => [
            "Turtles are the best pets.",
            "Earthworms are very scary.",
            "Summer is better than winter.",
            "Weekends are better than holidays.",
            "Roses are prettier than daisies.",
            "Dogs are better than cats.",
            "Winter is a beautiful season.",
            "Snakes do not make good pets.",
            "That smell is unbearable.",
            "Purple is a nice color.",
            "Her book is interesting.",
            "She's not a good actress.",
            "Ice cream is the best dessert.",
        ],
    ],
    4 => [
        'facts' => [
            "Arachnids such as spiders have eight legs.",
            "Tigers are the largest members of the cat family.",
            "Gorillas live in tropical and subtropical forests.",
            "Venus is the hottest planet in our solar system.",
            "Saturn is not the only ringed planet.",
            "Helium is lighter than the air around us.",
            "Humans breathe out carbon dioxide.",
            "Pure water has no smell and no taste.",
            "Forest fires can be extremely destructive.",
            "Earth's largest ocean is the Pacific Ocean.",
            "The season between summer and winter is autumn.",
        ],
        'opinions' => [
            "The lion is the scariest animal on earth.",
            "Everyone should study astronomy.",
            "Saturday is a good day for shopping.",
            "Dancing is not a good pastime.",
            "Golf is the best form of exercise.",
            "Rintintin is the best dog of all.",
            "Sunday is the best day of the week.",
            "The ostrich is a beautiful bird.",
            "Being a basketball player is easy.",
            "Hippos are exciting animals to watch.",
            "The iguana in the cage is very scary.",
            "Leftover spaghetti is delicious.",
            "Our school is the best school ever.",
            "I believe I'm a pretty good swimmer.",
            "My mother makes the best pancakes.",
            "Sunflowers are the prettiest flowers.",
        ],
    ],
    5 => [
        'facts' => [
            "The fastest land-dwelling creature is the cheetah.",
            "A giant tortoise can live to be over 150 years old.",
            "Bald eagles usually lay one or two eggs at a time.",
            "Blue whales are the largest animals in the world.",
            "A calculator is a tool for performing math functions.",
            "Helsinki is the capital and largest city of Finland.",
            "Brazil is on the continent of South America.",
            "The Philippines is found north of the equator.",
            "Hydrogen is the first element on the periodic table.",
            "Red blood cells carry oxygen around the body.",
        ],
        'opinions' => [
            "The ugliest sea creature is the manatee.",
            "Deserts are not as beautiful as forests.",
            "Roses have the nicest smell among flowers.",
            "Summer is the best season of the year.",
            "Math is the most fun subject in school.",
            "Hamsters make better pets than goldfish.",
            "Dancing is the best exercise for anybody.",
            "Everyone likes to look at pictures from space.",
            "Paris is the most exciting European city.",
            "Fall is the most beautiful season in America.",
            "Christmas is everyone's favorite holiday.",
            "Eagles are more interesting than vultures.",
            "Abraham Lincoln was the greatest president.",
        ],
    ],
    6 => [
        'facts' => [
            "The Titanic was a British ship that sank in 1912.",
            "The saltwater crocodile is the largest of all living reptiles.",
            "The Komodo dragon is a large reptile found in Indonesia.",
            "The Mariana Trench is the deepest place in the ocean.",
            "Hummingbirds are the only birds known to fly backwards.",
            "Canada is closer to the North Pole than the South Pole.",
            "Smartphones may be used to control certain electronic toys.",
            "Infrared light is invisible to the human eye.",
            "Tsunamis and storm surges can decimate entire villages.",
            "Certain insects can see ultraviolet light.",
        ],
        'opinions' => [
            "Strawberry should be everyone's favorite ice cream flavor.",
            "The hardest science subject to learn in school is chemistry.",
            "The color of your office building is very unappealing.",
            "It is always a pleasure to observe a hunting polar bear.",
            "Baseball is much more interesting than football.",
            "Jaguars are the most beautiful animals in the world.",
            "Everybody will enjoy a safari adventure in Africa.",
            "Harvard is the best university in the world.",
        ],
    ],
    7 => [
        'facts' => [
            "Advances in nanotechnology have given us new materials with amazing properties.",
            "Lightning is a discharge of electricity in the atmosphere.",
            "Electric eels can produce strong electric shocks of around 500 volts.",
            "Helicopters use spinning rotors to provide lift and thrust.",
            "North America is a continent entirely within the Northern Hemisphere.",
            "Lebron James passed Michael Jordan as the NBA's all-time playoff scoring leader.",
            "Donald Trump won the 2016 election despite losing the popular vote to Hillary Clinton.",
        ],
        'opinions' => [
            "Some objects in that museum have spirits that can bring good luck to people.",
            "World leaders must seriously prepare against an invasion of aliens from outer space.",
            "Fortune tellers and astrologers can help you plan your life for the next ten years.",
            "Everyone must carry an amulet to keep away evil spirits and ill fortune.",
            "In twenty years, intelligent robots will become ambitious enough to enslave humans.",
            "Michael Jordan is a much better basketball player than Lebron James.",
            "Indie films are more interesting to watch than Hollywood blockbusters.",
            "The 1995-96 Chicago Bulls would never be dethroned as the best NBA team of all time.",
        ],
    ],
];

// ---- Answer processing -----------------------------------------------------
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation ---------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    $tier = resolve_fo_tier($lvl, $grd);
    $bank = $dataByTier[$tier];

    $candidates = [];
    foreach ($bank['facts'] as $i => $f)    $candidates[] = ['type' => 'fact',    'text' => $f, 'key' => "t$tier-f$i"];
    foreach ($bank['opinions'] as $i => $o) $candidates[] = ['type' => 'opinion', 'text' => $o, 'key' => "t$tier-o$i"];

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($candidates, fn($c) => !in_array($c['key'], $used, true)));
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier-") !== 0));
        $available = $candidates;
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $_SESSION[$sessionKey]['current'] = [
        'question' => $pick['text'],
        'answer'   => $pick['type'],
        'lvl'      => $lvl,
        'tier'     => $tier,
        'grd'      => $grd,
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;">You clicked on <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.</p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;"><?php echo $cur['answer'] === 'opinion' ? '<br/>This is just an opinion.' : '<br/>This is a fact.'; ?></p>
  <div style="margin:30px auto;display:inline-block;padding:25px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#333333;max-width:480px;"><?php echo htmlspecialchars($cur['question']); ?></div>
  <br><input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else: $q = $_SESSION[$sessionKey]['current']; ?>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:600;color:#800080;margin:30px 0 20px;">Is this a fact or an opinion?</p>
  <div style="margin:0 auto 30px;display:inline-block;max-width:480px;padding:25px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:8px;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;color:#333333;"><?php echo htmlspecialchars($q['question']); ?></div>
  <div style="font-family:Arial,sans-serif;font-size:14pt;font-weight:600;color:#800080;margin-bottom:20px;">Click on your answer.</div>
  <table border="0" cellspacing="20" cellpadding="0" style="margin:0 auto;"><tr>
    <td align="center"><a href="?ansclick=fact" style="display:block;min-width:160px;padding:16px 32px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;">fact</a></td>
    <td align="center"><a href="?ansclick=opinion" style="display:block;min-width:160px;padding:16px 32px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:18pt;font-weight:700;">opinion</a></td>
  </tr></table>
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