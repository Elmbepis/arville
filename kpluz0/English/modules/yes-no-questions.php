<?php
// english/modules/yes-no-questions.php
// Forming Yes/No Questions — click the verb form that correctly completes the
// yes/no question.
// 6 sentence pools mapped by (level × grade). Legacy Easy + Hard (no forced
// Hard&#8594;Medium conversion in this file, unlike grammar-perfect-tenses.php).
// Modern preserves legacy Easy and legacy Hard as-is.
// 4 choices always in a 2×2 grid; correct answer guaranteed to appear.
//
// Data format: 'sentence_with____+correct?wrong1=wrong2=wrong3'
// The '?' at the end of the sentence is appended at build time (data does not
// include it — matches legacy render behaviour).
//
// Data fix (§5.4):
//   • pool 1 item 9 (chase) — wrong3 duplicated the correct answer; changed
//     to 'chasing'.

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
$moduleTitle = 'Forming Yes/No Questions';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

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
// Legacy pools:
//   Easy:  grd &#8804;4 &#8594; 1, 5-6 &#8594; 2, 7-8 &#8594; 3, &#8805;9 &#8594; 4
//   Hard:  grd &#8804;4 &#8594; 3, 5-6 &#8594; 4, 7-8 &#8594; 5, &#8805;9 &#8594; 6  (no forced Hard&#8594;Medium here)
function resolve_ynq_pool(string $lvl, int $grd): int {
    if ($grd < 0) $grd = 0;
    if ($grd > 10) $grd = 10;
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        if ($grd <= 8) return 3;
        return 4;
    }
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    if ($grd <= 8) return 5;
    return 6;
}

// ---- Value pools (§5) ----
$namePool = [
    'John','Peter','Paul','George','Waldo','Andrew','Jeffrey','Simon','Randy','Leo',
    'Tom','David','Sam','Barry','Danny','Henry','Alex','Bernie','Dustin','Donald',
    'Tony','Bruce','Roberto','Ernesto','Mr. Smith','Mr. Goldman','Mr. Jones',
    'Mr. Davis','Mr. Jackson','Mr. Lewis','Mr. Walker','Mr. Lee','Mr. Santos',
    'Mr. Simpson','Mr. Wong','Mr. Mendoza','Mr. Perez','Mr. Tan','Mr. Sy',
    'Maria','Gina','Betty','Linda','Dinah','Ellen','Leah','Beth','Dana','Sandy',
    'Hilda','Henrietta','Alexa','Carol','Emily','Ann','Bernadette','Tonia','Marge',
    'Lois','Ryzza','Kathryn','Angelica','Susan','Carla','Nelia','Mina','Kylah',
    'Paula','Tessie','Mrs. Smith','Miss Goldman','Mrs. Brown','Miss Taylor',
    'Mrs. Jones','Mrs. Williams','Mrs. Davis','Mrs. Moore','Miss Jackson',
    'Mrs. Clark','Mrs. Lewis','Mrs. Hall','Miss Walker','Mrs. Lee','Mrs. Cruz',
    'Mrs. Santos','Miss Torres','Mrs. Simpson','Miss Wong','Mrs. Perez',
    'Miss Mendoza','Mrs. Martin',
];
$animalPool = ['lion','tiger','alligator','crocodile','shark','bear','hyena','jaguar','panther','leopard','cheetah'];
$pastPool = ['yesterday','last night','last week','last month','last year','last Monday','last Wednesday','last Saturday'];
$futurePool = ['tomorrow','tonight','next week','tomorrow night','tomorrow morning','next month','next Monday','next Wednesday','next Saturday'];

// ---- Sentence pools — format: 'sentence____+correct?w1=w2=w3' ----
$sentencePools = [
    1 => [
        'Are you ____ to the zoo+going?went=go=goes',
        'Are the children ____ a new song+singing?sing=sang=sung',
        'Are ducks ____ in our pond+swimming?swim=swam=swims',
        'Can {name} ____ German+speak?speaking=spoke=spoken',
        'Did you ____ your homework last night+do?did=does=doing',
        'Did you ____ on your project today+work?worked=works=working',
        'Did {name} ____ these cupcakes+make?made=makes=making',
        'Did {name} ____ the door+lock?locked=locks=locking',
        'Did the cat ____ the mouse+chase?chased=chases=chasing',
        'Does {name} ____ every day+pray?prayed=prays=praying',
        'Does {name} ____ you\'re funny+think?thought=thinks=thinking',
        'Does your daddy ____ with you+play?played=plays=playing',
        'Does your dog ____ to chew on things+like?likes=liked=liking',
        'Have you ____ your lunch+eaten?ate=eat=eating',
        'Have the clowns ____ air into the balloons+blown?blow=blows=blew',
        'Have I ____ you where my keys are+asked?ask=asks=asking',
        'Has the bird ____ away+flown?fly=flew=flies',
        'Has your dog ____ anybody before+bitten?bit=bites=biting',
        'Has {name} ____ the {animal} at the zoo+seen?saw=see=sees',
        'Is your dog ____ its tail+wagging?wagged=wags=wag',
        'Is {name} ____ from us again+hiding?hid=hide=hides',
    ],
    2 => [
        'Are you and your friends ____ to the zoo+going?went=go=goes',
        'Aren\'t your visitors ____ bored+becoming?became=become=becomes',
        'Can your car ____ a hundred kilometers per hour+run?ran=runs=running',
        'Can {name} really ____ anything with crayons+draw?drawn=drew=draws',
        'Did I ____ you with my singing+annoy?annoyed=annoys=annoying',
        'Did you ____ your project {past}+submit?submitted=submits=submitting',
        'Did you ____ these delicious waffles+make?made=makes=making',
        'Did {name} ____ all its pieces together+connect?connected=connects=connecting',
        'Did {name} ____ her the good news+tell?told=tells=telling',
        'Did that {animal} ____ you a while ago+frighten?frightened=frightens=frightening',
        'Do you ____ it is a smart idea+think?thought=thinks=thinking',
        'Does your dog ____ at strangers all the time+bark?barked=barks=barking',
        'Has your pigeon ____ with other pigeons+flown?fly=flew=flies',
        'Has {name} ____ with the principal lately+spoken?spoke=speaks=speak',
        'Has {name} ____ the ducks and chickens in the yard+fed?feed=feeds=feeding',
        'Has your team ____ on this court before+played?plays=play=playing',
        'Have you ____ your cake already+eaten?ate=eat=eating',
        'Have you ____ this orange candy+tasted?taste=tastes=tasting',
        'Have your friends ____ this place before+visited?visit=visits=visiting',
        'Is {name} ____ these lessons every night+studying?studies=studied=study',
        'Is the {animal} in that zoo ____ a good life+living?lived=lives=live',
    ],
    3 => [
        'Are you and your friends ____ to the zoo+going?went=go=goes',
        'Are you ____ to be a ghost to scare him+pretending?pretend=pretends=pretended',
        'Can {name} ____ to me why this is so expensive+explain?explained=explains=explaining',
        'Did you ____ your project to the teacher {past}+submit?submitted=submits=submitting',
        'Did you ____ these delicious waffles+make?made=makes=making',
        'Did {name} ____ the ceramic statue {past}+paint?painted=paints=painting',
        'Did {name} ____ the cabinet correctly+assemble?assembled=assembles=assembling',
        'Did the {animal} ____ its prey before chasing it+stalk?stalked=stalks=stalking',
        'Does {name} ____ it is a good idea+think?thought=thinks=thinking',
        'Has {name} ____ that world record yet+broken?break=broke=breaks',
        'Have you ____ your breakfast already+eaten?ate=eat=eating',
        'Have you ____ this new kind of drink+tasted?taste=tastes=tasting',
        'Have you been ____ my emails this week+receiving?receive=received=receives',
        'Have they been ____ junk food again+eating?eat=ate=eaten',
        'Has {name} been ____ any sleep lately+getting?gotten=got=get',
        'Had {name} ____ dinner when the earthquake happened+eaten?ate=eat=eats',
        'Has the package been ____ to {name} already+delivered?deliver=delivers=delivering',
        'Is that {animal} ____ to conceal itself from us+trying?tried=try=tries',
        'Was the clown able to make the people ____ during the show+laugh?laughed=laughs=laughing',
        'Was the basketball player ____ the ball a while ago+shooting?shot=shoot=shoots',
        'Will fireworks be ____ at the theme park tonight+shown?showed=shows=show',
        'Will a concert be ____ at the mall later this afternoon+held?holds=hold=holding',
        'Will the gifts be ____ in colorful paper+wrapped?wrap=wraps=wrapping',
        'Will we be ____ the news on TV tonight+watching?watch=watches=watched',
    ],
    4 => [
        'Are you and your teammates ____ at the gym {future}+playing?played=plays=play',
        'Can {name} really ____ care of the patient+take?took=takes=taken',
        'Did {name} ____ the children to the movies {past}+take?took=takes=taking',
        'Did {name} ____ the kids how to make these lanterns+teach?taught=teaches=teaching',
        'Did {name} and my teacher ____ your laboratory {past}+visit?visits=visited=visiting',
        'Did {name} ____ the students to the art museum {past}+take?took=takes=taking',
        'Does {name} ____ that there\'s a new {animal} at the zoo+know?knew=known=knows',
        'Does {name} ____ that this is a good idea+think?thought=thinks=thinking',
        'Have you ____ our anniversary gift to John+given?gave=giving=give',
        'Have you ____ your project to the teacher already+submitted?submit=submits=submitting',
        'Have you ____ your award for your great achievement+accepted?accept=accepts=accepting',
        'Have you been ____ our secret ideas with John+discussing?discusses=discussed=discuss',
        'Have you been ____ on this project all along+working?worked=works=work',
        'Have you ever ____ an exotic dish like this+eaten?ate=eat=eating',
        'Had you ____ when {name} arrived+left?leave=leaves=leaving',
        'Has the {animal} ____ the hunter\'s bait yet+bitten?bite=bit=biting',
        'Has {name} ____ the professor about that discovery+informed?inform=informs=informing',
        'Has {name} ____ the goals written in that business plan+attained?attain=attains=attaining',
        'Was the dog ____ its back on this spot minutes ago+scratching?scratch=scratched=scratches',
        'Were you ____ the report when {name} called+writing?writes=wrote=written',
        'Will you help {name} ____ this event a success+make?made=makes=making',
        'Will the movie stars be ____ the parade this evening+gracing?grace=graces=graced',
    ],
    5 => [
        'Are {name} and the kids ____ at the amusement park {future}+performing?performed=performs=perform',
        'Aren\'t you ____ that technical training {future}+attending?attended=attend=attends',
        'Can {name} really ____ good care of this exotic reptile+take?took=takes=taken',
        'Can {name} really ____ responsible for such an important project+be?is=was=been',
        'Did {name} really ____ the orphans how to assemble these complex toys+teach?taught=teaches=teaching',
        'Did you ____ to the mayor after making that rude comment+apologize?apologized=apologizes=apologizing',
        'Did the store ____ a free battery charger with your new tablet+include?included=includes=including',
        'Didn\'t I ____ the audience with my sophisticated magic tricks+mesmerize?mesmerized=mesmerizes=mesmerizing',
        'Did {name} really ____ the trainees how to concoct new recipes+teach?taught=teaches=teaching',
        'Does {name} ____ that the new {animal} at the zoo is difficult to feed+know?knew=known=knows',
        'Does {name} ____ that engaging in this activity is quite risky+think?thought=thinks=thinking',
        'Have they ____ their science project to the professor already+submitted?submit=submits=submitting',
        'Have you ever ____ sashimi in this restaurant before+eaten?ate=eat=eating',
        'Have you been ____ on the restoration of this car all week long+working?worked=works=work',
        'Have you ____ our unsolicited advice to {name} already+given?gave=giving=give',
        'Had {name} ____ when I announced the raffle winner {past}+left?leave=leaves=leaving',
        'Has the {animal} ever ____ anybody in this facility yet+bitten?bite=bit=biting',
        'Has this {animal} ever ____ any live prey since its arrival at this zoo+eaten?ate=eat=eating',
        'Has {name} ____ this strange dilemma already+analyzed?analyze=analyzes=analyzing',
        'Was the professor ____ to his students in this hall this morning+lecturing?lectured=lecture=lectures',
        'Were you ____ the report when {name} released the new data+writing?writes=wrote=written',
        'Will you help {name} ____ this fund-raising activity a financial success+make?made=makes=making',
        'Will an experiment be ____ to find out what\'s causing this problem+conducted?conduct=conducts=conducting',
    ],
    6 => [
        'Are {name} and the contestants ____ at the auditorium {future}+practicing?practiced=practice=practices',
        'Are the injured athletes ____ treatment at this hospital+undergoing?underwent=undergo=undergone',
        'Are you and your friends always ____ about where to go next+quibbling?quibbled=quibble=quibbles',
        'Can {name} ____ the capability and effectiveness of this new equipment+demonstrate?demonstrated=demonstrates=demonstrating',
        'Can you ____ a new system for recovering recyclable materials from the garbage collected+implement?implemented=implements=implementing',
        'Did {name} ____ the students to the excavation site {past}+accompany?accompanied=accompanies=accompanying',
        'Did you ____ to the governor for coming late to the meeting+apologize?apologized=apologizes=apologizing',
        'Did the nocturnal rodents ____ from their burrows last night+emerge?emerged=emerges=emerging',
        'Did the investigators ____ all the pieces of evidence thoroughly+scrutinize?scrutinized=scrutinizes=scrutinizing',
        'Did the citizens ____ to the mayor\'s unreasonable proposal+acquiesce?acquiesced=acquiesces=acquiescing',
        'Didn\'t I ____ to you the reason for that decision+explain?explained=explains=explaining',
        'Didn\'t the chemist ____ a substance that protects this material from fire+formulate?formulated=formulates=formulating',
        'Didn\'t {name} ____ what the other witnesses said+corroborate?corroborates=corroborated=corroborating',
        'Didn\'t you ____ the idea to invest the cooperative\'s money in that business+conceive?conceives=conceived=conceiving',
        'Does {name} even ____ how expensive it is to maintain that {animal} at the zoo+realize?realized=realizes=realizing',
        'Does {name} ____ that investing in my new business is not a good idea+think?thought=thinks=thinking',
        'Do you and your business partners always ____ on what strategy to take next+deliberate?deliberated=deliberates=deliberating',
        'Have you ____ of a way to solve this complicated problem by {future}+thought?think=thinks=thinking',
        'Have they ____ their goal of launching their own business yet+accomplished?accomplish=accomplishes=accomplishing',
        'Have you been ____ this machine in this condition since {past}+operating?operated=operates=operate',
        'Have you ____ any advice from the resident experts to solve this problem+solicited?solicit=solicits=soliciting',
        'Have these fortune tellers ____ where we\'ll be next year+foreseen?foresaw=foresee=foresees',
        'Had {name} ____ at the scene when the commotion started {past}+arrived?arrive=arrives=arriving',
        'Had the student ____ his homework when the TV show started+completed?complete=completes=completing',
        'Had the scientist ____ more volunteers to join when the project was expanded+persuaded?persuade=persuades=persuading',
        'Has {name} ____ to tell the truth and nothing but the truth+sworn?swore=swears=swear',
        'Has the mechanic ____ the car to ensure that it\'s safe and reliable+test-driven?test-drive=test-drove=test-drives',
        'Was the ballerina ____ when she slipped and fell down+pirouetting?pirouette=pirouettes=pirouetted',
        'Was {name} ____ when the lead performer smiled at them+applauding?applaud=applauds=applauded',
        'Wasn\'t I ____ that scenario when we were together just the other day+imagining?imagined=imagine=imagines',
        'Weren\'t you ____ to be supervising those engineers that day+supposed?suppose=supposedly=supposes',
        'Were you ____ relief goods when the mayor and his entourage arrived+distributing?distributes=distributed=distribute',
        'Will you help {name} ____ the entrepreneurial skills needed for that+develop?developed=develops=developing',
    ],
];

// ---- Helpers (§8.4, §8.6 + hugging technique, mirrors grammar-progressive) ----
function ynq_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 220): int {
    $charPx          = 11;
    $horizontalSpace = 40;
    $plain           = trim(strip_tags($html));
    if ($plain === '') return $minWidthPx;

    $charsPerLine = max(1, (int)floor(($maxWidthPx - $horizontalSpace) / $charPx));
    $words   = preg_split('/\s+/', $plain);
    $lines   = [];
    $current = '';
    foreach ($words as $w) {
        $candidate = $current === '' ? $w : "$current $w";
        if (strlen($candidate) > $charsPerLine && $current !== '') {
            $lines[] = $current;
            $current = $w;
        } else {
            $current = $candidate;
        }
    }
    if ($current !== '') $lines[] = $current;
    $longest = max(array_map('strlen', $lines));
    return max($minWidthPx, min($maxWidthPx, $longest * $charPx + $horizontalSpace));
}

function ynq_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
    $sizing = ($widthPx > 0)
        ? 'width:' . $widthPx . 'px;max-width:100%;'
        : 'max-width:480px;';
    echo '<div style="' . $sizing
       . 'min-height:' . $minHeight . 'px;margin:16px auto 10px;padding:12px 20px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function ynq_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function ynq_roll_values(): array {
    global $namePool, $animalPool, $pastPool, $futurePool;
    return [
        'name'   => $namePool[array_rand($namePool)],
        'animal' => $animalPool[array_rand($animalPool)],
        'past'   => $pastPool[array_rand($pastPool)],
        'future' => $futurePool[array_rand($futurePool)],
    ];
}

// ---- Parse: 'sentence____+correct?w1=w2=w3' ----
function ynq_parse(string $raw): ?array {
    $plus = strpos($raw, '+');
    if ($plus === false) return null;
    $sentence = substr($raw, 0, $plus) . '?';

    $rest = substr($raw, $plus + 1);
    $q = strpos($rest, '?');
    if ($q === false) return null;
    $answer = substr($rest, 0, $q);
    $rest = substr($rest, $q + 1);

    $eq1 = strpos($rest, '=');
    if ($eq1 === false) return null;
    $w1 = substr($rest, 0, $eq1);
    $rest = substr($rest, $eq1 + 1);

    $eq2 = strpos($rest, '=');
    if ($eq2 === false) return null;
    $w2 = substr($rest, 0, $eq2);
    $w3 = substr($rest, $eq2 + 1);

    if ($sentence === '' || $answer === '') return null;
    return [
        'sentence' => $sentence,
        'answer'   => $answer,
        'wrong'    => [$w1, $w2, $w3],
    ];
}

function ynq_pick_question(array $pool, string $sessionKey, int $poolId): ?array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $raw) {
        if (!in_array("p$poolId:$i", $used, true)) $available[$i] = $raw;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "p$poolId:") !== 0));
        foreach ($pool as $i => $raw) $available[$i] = $raw;
    }
    $idx = array_rand($available);
    $raw = $available[$idx];
    $used[] = "p$poolId:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = ynq_parse($raw);
    if ($parsed === null) return null;

    $values   = ynq_roll_values();
    $sentence = ynq_apply_placeholders($parsed['sentence'], $values);
    return ['answer' => $parsed['answer'], 'sentence' => $sentence, 'wrong' => $parsed['wrong']];
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $poolId = resolve_ynq_pool($lvl, $grd);
    $pool   = $sentencePools[$poolId] ?? $sentencePools[1];

    $pick = ynq_pick_question($pool, $sessionKey, $poolId);
    if ($pick === null) {
        $pick = ynq_pick_question($sentencePools[1], $sessionKey, 1);
    }

    $answer   = $pick['answer'];
    $sentence = $pick['sentence'];
    $wrongs   = $pick['wrong'];

    $choices = array_merge([$answer], $wrongs);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'sentence' => $sentence,
        'answer'   => $answer,
        'choices'  => $choices,
        'lvl'      => $lvl,
        'pool'     => $poolId,
    ];
}

// ---- Render (§8, §9, §10) ----
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
<?php if ($result !== null):
    $cur = $result['cur'];
    $answerEsc = htmlspecialchars($cur['answer']);
    $filledEsc = str_replace(
        '____',
        '<strong style="color:#CC0066;">' . $answerEsc . '</strong>',
        htmlspecialchars($cur['sentence'])
    );
    $boxW = ynq_compute_width($filledEsc);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php ynq_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $filledEsc
    . '</div>'
  , 80, $boxW); ?>
  <input type="submit" name="Submit2" value=" New Question " style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
    $boxW = ynq_compute_width($sentenceEsc);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Fill in the blank with the <span style="color:#CC0066;">correct verb</span>.
  </div>
  <?php ynq_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $sentenceEsc
    . '</div>'
  , 80, $boxW); ?>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:20px auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:180px;max-width:250px;min-height:60px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:16pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="display:block;margin:25px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>

  <!-- Difficulty radios (§10.4 — Easy / Hard only, 12pt label) -->
  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:12pt Arial,sans-serif;">Select difficulty level for next question:</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0" style="margin:0 auto;"><tr>
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