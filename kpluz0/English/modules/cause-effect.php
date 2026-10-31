<?php
// english/modules/cause-effect.php
// Cause and Effect Relationship — MC (4 choices from same sublist).
// 5 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// All bordered boxes: max-width 480px, both-axis centered content.

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
$moduleTitle = 'Cause and Effect Relationship';
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

// ---- (level, grade) -> tier ------------------------------------------------
function resolve_ce_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 2) return 1;
        if ($grd <= 4) return 2;
        return 3;
    }
    if ($grd <= 2) return 3;
    if ($grd <= 4) return 4;
    return 5;
}

// ---- Name pools (short for grade &#8804; 2, long otherwise) ----------------------
function ce_name_pool(int $grd): array {
    if ($grd <= 2) {
        return [
            'boys'  => ["Adam","Ben","Bert","Carlo","Danny","David","Dino","Isaac","Jack","Jacob","Jason","Jose","John","Juan","Kevin","Luke","Mike","Nick","Noah","Robert","Ryan","Samuel","Tom","Willie"],
            'girls' => ["Amy","Anna","Bella","Beth","Carol","Emma","Eva","Grace","Isabel","Jenny","Jill","Julia","Kathy","Laura","Leila","Leah","Lisa","Mary","Marie","Mina","Nena","Nina","Rita","Sarah","Tina","Vicky"],
        ];
    }
    return [
        'boys'  => ["Adam","Alexander","Andrew","Angelo","Benjamin","Brandon","Carlo","Charlie","Christopher","Daniel","David","Diego","Dominic","Gabriel","Ian","Isaac","Jack","Jacob","Jason","Jose","John","Jonathan","Joseph","Joshua","Juan","Kevin","Luke","Matthew","Michael","Miguel","Nathan","Noah","Oliver","Robert","Romeo","Ryan","Samuel","Sebastian","Tommy","William"],
        'girls' => ["Alyssa","Amelia","Andrea","Anna","Ariana","Bella","Betty","Camille","Caroline","Claire","Elizabeth","Emma","Eva","Evelyn","Gina","Hannah","Isabella","Jasmine","Jocelyn","Jolina","Julia","Katherine","Lauren","Layla","Leah","Lillian","Lydia","Madeline","Maria","Mariah","Melanie","Mia","Naomi","Natalie","Olivia","Samantha","Sarah","Sophia","Stella","Tina","Victoria"],
    ];
}

// ---- Cause-effect pair bank ------------------------------------------------
function ce_pair_bank(int $tier, string $name, string $name1): array {
    switch ($tier) {
        case 1: return [
            [
                ["$name ate too much", "$name felt so full"],
                ["It was a rainy day", "The streets were wet all day"],
                ["Somebody locked the door", "$name couldn't get in"],
                ["The dog bit $name's foot", "$name's foot got hurt"],
                ["$name was feeling cold", "$name had to wear a sweater"],
            ],
            [
                ["$name's watch broke", "$name had to buy a new watch"],
                ["$name touched a hot pan", "$name's hand got burned"],
                ["It was $name's birthday", "$name got to open some presents"],
                ["$name dropped the glass", "$name's glass broke on the floor"],
                ["$name missed the school bus", "$name was late for school"],
            ],
            [
                ["$name ate a stale bread", "$name had a stomach ache"],
                ["It was a hot summer night", "$name had to turn on the fan"],
                ["The cat went away", "$name couldn't find the cat"],
                ["$name put milk in the dish", "The puppy went to the dish"],
                ["$name washed their clothes", "They had clean clothes to wear"],
                ["It was a windy day", "$name saw kids flying their kites"],
            ],
        ];
        case 2: return [
            [
                ["Their dog was barking all night long", "$name didn't get any sleep"],
                ["$name tripped over a rock", "$name fell and got a scraped knee"],
                ["Somebody locked the van's door", "$name couldn't get into the van"],
                ["$name did not eat any breakfast", "$name felt hungry by noontime"],
                ["All of $name's clothes were dirty", "$name had nothing to wear"],
                ["The storm flooded the streets", "There was a huge traffic jam"],
            ],
            [
                ["$name's lawnmower got broken", "$name couldn't cut the grass"],
                ["A stranger came to $name's door", "$name's guard dog began to bark"],
                ["$name studied hard every day", "$name got high grades in all subjects"],
                ["$name practiced shooting the ball", "$name scored many points in their game"],
                ["$name practiced singing different songs", "$name had won singing contests"],
                ["$name fell while playing on a tree", "$name had to have a cast on an arm"],
            ],
            [
                ["$name played in the mud outside", "$name tracked mud into the house"],
                ["$name saw a lightning in the sky", "$name heard a thunder clap soon after"],
                ["The gate of $name's fence was open", "$name's dog ran out of the yard"],
                ["$name had a terrible headache", "$name couldn't work and slept all day"],
                ["$name forgot to feed their puppy", "Their puppy became really hungry"],
                ["$name forgot to do their homework", "The teacher made $name do it at recess"],
                ["Twenty clowns got out of a car", "$name laughed hard upon seeing them"],
            ],
        ];
        case 3: return [
            [
                ["$name went to the grocery store to buy lots of food", "$name was able to fill the refrigerator"],
                ["$name found it difficult to read the blackboard", "$name had to buy a new pair of glasses"],
                ["$name did a lot of reading and experimenting", "$name came up with a very good science project"],
                ["$name got hurt while hiking during a field trip", "$name had to see a doctor to get treated"],
                ["$name perfected some very cool dance steps", "$name was chosen to dance in the school program"],
            ],
            [
                ["$name bought a cat from the pet store", "All the mice in $name's home disappeared"],
                ["$name's father received a large bonus at work", "$name's parents were able to buy a new car"],
                ["A fire alarm sounded in $name's office", "Everyone at $name's office building ran outside"],
                ["$name forgot to put enough gas in the car", "$name had to walk five kilometers to get some help"],
                ["Somebody ate all the food in the refrigerator", "$name had to go to the mall to eat lunch"],
            ],
            [
                ["$name poked the balloon with a pin", "The baby cried because the balloon burst"],
                ["$name's dog gave birth to a large litter", "$name was able to give their neighbor two puppies"],
                ["$name had memorized ten new words every day", "$name won the school's spelling contest"],
                ["$name didn't wear shoes during the game", "$name went home limping due to a twisted ankle"],
                ["$name's sister used their car every Monday", "$name rode the bus to work on Mondays"],
            ],
        ];
        case 4: return [
            [
                ["$name forgot to water the garden plants for several days", "Many of the plants in the garden turned brown"],
                ["$name had a good voice and practiced singing for hours", "$name was chosen to perform a song number in the school program"],
                ["$name modernized their farming techniques and equipment", "$name saw a record-breaking harvest from their farm this year"],
                ["$name invested a lot of money to renovate their home", "$name was able to sell their home at a high price"],
                ["It was the month before the start of winter", "All the trees in $name's neighborhood were losing their leaves"],
            ],
            [
                ["Their band practiced day and night to perfect their music", "They were able to close a deal with a recording studio"],
                ["A thunder boomed loudly as $name was about to fall asleep", "$name's dog got frightened and ran under the bed"],
                ["The school was celebrating its foundation day", "There were booths and carnival rides on the school grounds"],
                ["$name could no longer keep up with orders from their customers", "$name had to hire extra employees for their business"],
                ["$name threw some floating food pellets into the fish pond", "The fishes in the pond swam to the surface of the water"],
            ],
            [
                ["Catsup dripped from $name's mouth when he was eating a sandwich", "$name's shirt got soiled with several red stains"],
                ["$name had been patiently teaching their pets some tricks", "They have a dog that could sit, roll, and play dead"],
                ["$name drank a large amount of avocado shake", "$name had to be brought to a doctor due to a stomach ache"],
                ["$name accidentally put salt instead of sugar in the cake", "$name's kids found the cake disgusting and didn't eat it"],
                ["The killer whale did a giant belly flop during the show", "Everybody on the front row got soaking wet"],
                ["$name's handwriting on the test was very poor", "The teacher marked some of $name's correct answers wrong"],
            ],
        ];
        case 5: return [
            [
                ["$name1 did not see the scattered nails on the road until it was too late", "$name1 didn't arrive for work on time because his car had a flat tire"],
                ["$name1 did not notice that the battery of his alarm clock had run out", "$name1 was late for work because he woke up two hours later than normal"],
                ["$name1 completed a study on the impact of mobile computing on education", "$name1 was able to publish an article of his in a technology magazine"],
                ["$name1's company came up with a product that many people would buy", "$name1 and his officemates got a raise because their company's sales went up"],
                ["$name1 took the batteries of another object and used them for his drone", "$name1's father got mad because the flashlight didn't work when he needed it"],
                ["$name1 realized that his calling was to help orphans find a better future", "$name1 became well-loved by children whose lives he turned around"],
            ],
            [
                ["$name was supposed to measure in inches but did it instead in centimeters", "The teacher asked $name to turn the meter stick around"],
                ["The doctor diagnosed $name's condition to be due to lack of vitamin D", "$name was told to get plenty of sunlight and eat oily fish and eggs"],
                ["$name asked for some volunteers and organized a reforestation project", "A thousand new seedlings were planted in a denuded area in $name's village"],
                ["$name spent many hours talking to the villagers about coastal ecotourism", "People stopped catching endangered marine species and started keeping the beach clean"],
                ["$name did a lot of research on renewable energy and green technologies", "$name was able to install a solar panel that supplied electricity to their farm"],
            ],
            [
                ["$name bought a 3D printer and spent hours learning how to use it", "$name was able to go into business selling unique plastic items"],
                ["$name took a loan from the bank and bought three sewing machines", "$name had made money selling ready-to-wear apparel to mall retailers"],
                ["$name studied how to draw funny pictures and write funny stories", "$name was able to earn a living publishing children's books"],
                ["$name bought and restored an old car to make it run and look almost like new", "$name made a handsome profit at a recent motor trade show"],
                ["$name was able to save enough money to buy the drone that he had always wanted", "$name was able to put up a business that took aerial videos for clients"],
            ],
        ];
    }
    return [];
}

// ---- Anti-orphan helper ----------------------------------------------------
function ce_bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// ---- Centered box helper (max-width 480px, both-axis centered) -------------
// Reusable across modules: caps box width at 480px, vertically centers content
// via flexbox, and horizontally centers text via text-align.
function ce_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
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
    $tier  = resolve_ce_tier($lvl, $grd);
    $names = ce_name_pool($grd);
    $name1 = $names['boys'][array_rand($names['boys'])];
    $name3 = $names['girls'][array_rand($names['girls'])];
    $name  = (rand(1, 2) === 1) ? $name1 : $name3;

    $bank = ce_pair_bank($tier, $name, $name1);

    $allCandidates = [];
    foreach ($bank as $sublistIdx => $sublist) {
        foreach ($sublist as $pairIdx => $_) {
            $allCandidates[] = ['sublist' => $sublistIdx, 'pair' => $pairIdx];
        }
    }

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_filter($allCandidates, function ($c) use ($tier, $used) {
        return !in_array("t$tier-s{$c['sublist']}-p{$c['pair']}", $used, true);
    }));
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier-") !== 0));
        $available = $allCandidates;
    }
    $pick = $available[array_rand($available)];
    $used[] = "t$tier-s{$pick['sublist']}-p{$pick['pair']}";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $sublist = $bank[$pick['sublist']];
    [$correctCause, $correctEffect] = $sublist[$pick['pair']];

    $askEffect = (rand(1, 2) === 1);
    $given     = $askEffect ? $correctCause  : $correctEffect;
    $correct   = $askEffect ? $correctEffect : $correctCause;
    $givenLbl  = $askEffect ? 'Cause'        : 'Effect';
    $askedLbl  = $askEffect ? 'effect'       : 'cause';

    $otherIdx = array_values(array_filter(array_keys($sublist), fn($i) => $i !== $pick['pair']));
    shuffle($otherIdx);
    $wrong = [];
    foreach (array_slice($otherIdx, 0, 3) as $wi) {
        $wrong[] = $askEffect ? $sublist[$wi][1] : $sublist[$wi][0];
    }

    $choices = array_merge($wrong, [$correct]);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'given'      => $given,
        'givenLabel' => $givenLbl,
        'askedLabel' => $askedLbl,
        'correct'    => $correct,
        'cause'      => $correctCause,
        'effect'     => $correctEffect,
        'choices'    => $choices,
        'lvl'        => $lvl,
        'tier'       => $tier,
        'grd'        => $grd,
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur']; ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong></p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <?php ce_box(
      '<div style="width:100%;font-weight:700;color:#800080;margin-bottom:4px;">Cause:</div>'
    . '<div style="width:100%;color:#333;font-size:14pt;line-height:1.55;margin-bottom:16px;text-wrap:balance;">' . ce_bind_last_words($cur['cause']) . '.</div>'
    . '<div style="width:100%;font-weight:700;color:#800080;margin-bottom:4px;">Effect:</div>'
    . '<div style="width:100%;color:#333;font-size:14pt;line-height:1.55;text-wrap:balance;">' . ce_bind_last_words($cur['effect']) . '.</div>'
  ); ?>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;">  <?php else: $q = $_SESSION[$sessionKey]['current']; ?>
  <p style="font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;margin:20px auto;max-width:480px;">What was its <?php echo $q['askedLabel']; ?>?</p>
  <?php ce_box(
      '<div style="width:100%;font-size:16pt;font-weight:700;color:#800080;margin-bottom:8px;">' . $q['givenLabel'] . ':</div>'
    . '<div style="width:100%;color:#333;font-size:18pt;line-height:1.25;text-wrap:balance;">' . ce_bind_last_words($q['given']) . '.</div>',
      160
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:13pt;font-weight:600;color:#800080;margin:15px auto 14px;max-width:480px;">Click on your answer.</div>
  <div style="max-width:480px;margin:0 auto;">
    <?php foreach ($q['choices'] as $c): ?>
      <a href="?ansclick=<?php echo urlencode($c); ?>"
         style="display:block;margin:10px 0;padding:14px 20px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:14pt;font-weight:600;text-align:center;line-height:1.5;box-sizing:border-box;">
        <?php echo htmlspecialchars($c); ?>
      </a>
    <?php endforeach; ?>
  </div>
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