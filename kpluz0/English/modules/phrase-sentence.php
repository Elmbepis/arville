<?php
// english/modules/phrase-sentence.php
// Phrases and Sentences — shown text, pick "phrase" or "sentence".
// Modernised to the container.php / scorer.php pattern used by plural.php.
// Two choices rendered side-by-side on one line with a space between them.

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
$moduleTitle = 'Phrases and Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$boysEasy  = ['Adam','Ben','Bert','Carlo','Chris','Danny','David','Dino','Isaac','Jack','Jacob','James','Jason','Jose','John','Juan','Kevin','Lucas','Luis','Luke','Max','Mike','Nick','Noah','Robert','Ryan','Samuel','Tom','Willie'];
$girlsEasy = ['Amy','Anna','Bella','Beth','Carol','Emma','Eva','Grace','Isabel','Jenny','Jill','Julia','Kathy','Laura','Leila','Leah','Lisa','Mary','Marie','Mina','Nena','Nina','Rita','Sarah','Tina','Vicky'];
$boysHard  = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girlsHard = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];

// Templates use {name1}/{name2}/{name3} placeholders; phrase portion is wrapped in *...+
$bankEasy = [
    '{name1} is *here now+.',
    'It is *Mary\'s new book+.',
    'I will give it *to {name1}+.',
    '{name1} will call *the boys+.',
    '*My brother+ went to school.',
    '{name1} drove *his new car+.',
    '*My father+ has many shoes.',
    'It is *a cold night+.',
    'I\'ll send her *a long letter+.',
    '{name3} wears *a nice dress+.',
    'Is it *a sunny day+?',
    'Who gave *my kite+ away?',
    '*This book+ is old and dusty.',
    'Look at *that fishing boat+.',
    'Are *the boys and girls+ sleeping?',
    'Is he *your brother+?',
    'Is she *a good student+?',
    'Is that *your rubber ball+?',
    'Am I *your favorite uncle+?',
    'Go play with *your classmate+.',
    'Walk to the park *with me+.',
    'Send her *some flowers+.',
    'Drink *your apple juice+.',
    'Please sing *one more song+.',
    'Let\'s visit *our neighbors+.',
    'Please dance *with {name3}+.',
    'Give {name1} *three cookies+.',
    'Please wash *the clothes+.',
    'Don\'t wear *those shoes+.',
    '*These bees+ are noisy.',
    '*That red car+ is very fast!',
    '*The big dog+ is chasing us!',
    'The car hit *the old barn+!',
    'That man took *all our money+!',
    'Yipee, we\'re going *to the zoo+!',
    'Yay, you won *first prize+!',
    'Go *inside the tent+.',
];

$bankHard = [
    // old tier 2
    '{name1} likes *to watch movies with me+.',
    'We will go there today *to thank them+.',
    '{name3} doesn\'t want *to go with you+.',
    '{name1} and I go *to the same school+.',
    '*{name1} and {name3}+ dance well together.',
    'He knows *the title of that new movie+.',
    'Do you know *where the cats are hiding+?',
    'Why did you buy *a car that doesn\'t run+?',
    'Did you hear *us singing inside our room+?',
    '{name3} has been *my neighbor since 2007+.',
    'Is *that old computer+ broken again?',
    'Is {name3} *already taller than you+?',
    'Please help me *with my science project+.',
    'Are they going *to build a new fence+?',
    'Just stay *in this house for two minutes+.',
    'Kindly deliver *this package to {name1}+.',
    'He went upstairs *to look for your uncle+.',
    'Please recite *another poem for us+.',
    'Replace *the battery of your camera+ now.',
    'Transfer *the wooden chairs+ to his room.',
    'Please work on *your math assignment+.',
    'Look at *the oven in the kitchen+.',
    'Yipee, {name1} brought us *ice cream+!',
    'Ouch, *your noisy monkey+ pulled my hair!',
    'Yikes, *the grumpy old man+ has found us!',
    'Oh, no! *That wooden bed+ is on fire!',
    'Yay, I passed *that difficult test+!',
    'Awesome, I earned *a lot of cash+ today!',
    'Who would like *to go there+ with us?',
    '{name3} watches *cartoons every day+.',
    'We bought *a nice present+ for {name3}.',
    '*My friend+ went to the market today.',
    '{name3} always listens *to that song+.',
    'Do you know that he\'s *from Manila+?',
    // old tier 3
    'Wow, your dog can walk *on its two front legs+!',
    'Hurray, we won *another championship this year+!',
    'My, that dog is *even smaller than a mouse+!',
    'Don\'t you get *tired playing soccer each day+?',
    '*The skinny puppy+ followed us home yesterday.',
    'Did {name3} buy *these concert tickets for us+?',
    'He was able *to win several races this year+.',
    'The girl glanced *at herself in the shiny mirror+.',
    'I will try to call *her closest friends+ later.',
    'The girl asked for *some candy from my mother+.',
    '{name1} likes *to watch scary movies at night+.',
    'The plumber is here *to check our faucets+.',
    'They are going *to give these clothes+ to the orphans.',
    'Talk to *those children playing in the streets+.',
    'My old phone is better than *your new phone+.',
    'Did you really build *this wooden table we\'re using+?',
    'Why did you hide *my toy car under the bed+?',
    'Who was with {name3} at *the birthday party+?',
    'Would you like *to have some popcorn while waiting+?',
    'Are you afraid of *that haunted house on the hill+?',
    'Did you find *the pencils in that box on his table+?',
    'Go visit {name1} and {name2} *this summer to cheer them up+.',
    'Make *a nice dinner for your parents+ tonight.',
    'I saw *your brother at the concert+ last night.',
    'Have *some mango ice cream+ after you finish your dinner.',
    'Please perform *another dance number for us tonight+.',
    'Start preparing *the seafood fried rice for our dinner+.',
    'Yikes, that tree is *about to fall on the parked car+!',
    'Grrr, *our neighbor\'s truck+ is very noisy!',
    'Ouch, *your naughty puppy+ just bit my finger!',
    'Yipee, I sold *a hundred boxes of cookies+ today!',
    'Wow, you found *the toy that I lost yesterday+!',
    '*That lady in the red dress+ is a math teacher here.',
    '{name1} bought *that funny-looking shirt+ for himself.',
];

function parse_sentence($tpl) {
    $p1 = strpos($tpl, '*');
    $p2 = strpos($tpl, '+');
    if ($p1 === false || $p2 === false || $p2 < $p1) {
        return ['phrase' => '', 'sentence' => str_replace(['*','+'], '', $tpl)];
    }
    return [
        'phrase'   => substr($tpl, $p1 + 1, $p2 - $p1 - 1),
        'sentence' => str_replace(['*','+'], '', $tpl),
    ];
}

function pick_phrase_item($bank, $sessionKey, $lvl) {
    global $boysEasy, $girlsEasy, $boysHard, $girlsHard;
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($bank as $i => $tpl) if (!in_array($i, $used, true)) $available[$i] = $tpl;
    if (!$available) { $used = []; $available = $bank; }
    if (!$available) return null;
    $keys = array_keys($available);
    $index = $keys[array_rand($keys)];
    $used[] = $index;
    if (count($used) > 200) $used = array_slice($used, -100);
    $_SESSION[$sessionKey]['used'] = $used;

    $boys  = ($lvl === 'Hard') ? $boysHard  : $boysEasy;
    $girls = ($lvl === 'Hard') ? $girlsHard : $girlsEasy;

    $name1 = $boys[array_rand($boys)];
    $name2 = $name1;
    $guard = 0;
    while ($name2 === $name1 && $guard++ < 20) $name2 = $boys[array_rand($boys)];
    $name3 = $girls[array_rand($girls)];

    $rendered = str_replace(
        ['{name1}', '{name2}', '{name3}'],
        [$name1, $name2, $name3],
        $available[$index]
    );

    $parsed   = parse_sentence($rendered);
    $phrase   = $parsed['phrase'];
    $sentence = $parsed['sentence'];

    // Hard tier: strip capitalization/punctuation cues, mirroring grd >= 3 in the old file
    if ($lvl === 'Hard') {
        $sentence = rtrim(strtolower($sentence), ".!?");
        $phrase   = strtolower($phrase);
    }

    return (mt_rand(1, 2) === 1)
        ? ['shown' => $phrase,   'answer' => 'phrase']
        : ['shown' => $sentence, 'answer' => 'sentence'];
}

$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);
    $result  = ['correct'=>$isCorrect, 'clicked'=>$clicked, 'cur'=>$cur];
    unset($_SESSION[$sessionKey]['current']);
}
if ($result === null || isset($_POST['Submit2'])) {
    $bank = ($lvl === 'Hard') ? $bankHard : $bankEasy;
    $item = pick_phrase_item($bank, $sessionKey, $lvl);
    if ($item === null) $item = ['shown'=>'here now', 'answer'=>'phrase'];
    $_SESSION[$sessionKey]['current'] = [
        'shown'  => $item['shown'],
        'answer' => $item['answer'],
        'lvl'    => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

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
  <p style="font-size:14pt;color:#666;margin-top:20px;">Your answer: <strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong></p>
  <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <p style="font-size:14pt;color:#555;"><br/>What was shown: <strong><?php echo htmlspecialchars($cur['shown']); ?></strong></p>
  <p style="font-size:16pt;color:#800080;">
<?php if ($cur['lvl'] === 'Hard' && $cur['answer'] === 'sentence'): ?>
  It is a <strong style="color:#CC0066;">sentence</strong> if given proper<br/>capitalization and punctuation.
<?php else: ?>
  It is a <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>.
<?php endif; ?>
</p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
  <div style="margin:45px auto 15px;font-family:Arial,sans-serif;font-size:17pt;font-weight:600;color:#800080;">
    <?php echo $lvl === 'Hard'
        ? 'With proper capitalization and punctuation,<br>will this be a phrase or a sentence?'
        : 'Is this a phrase or a sentence?'; ?>
  </div>
  <div style="margin:25px auto;max-width:460px;padding:22px 30px;
              background:#FFFDF3;border:2px solid #C8B070;border-radius:10px;
              font-family:Arial,sans-serif;font-size:20pt;font-weight:700;color:#333;">
    <?php echo htmlspecialchars($q['shown']); ?>
  </div>
  <div style="font-size:13pt;color:#555;margin-bottom:14px;">Click on your answer.</div>
  <div style="margin:20px auto;white-space:nowrap;">
    <a href="?ansclick=phrase"
       style="display:inline-block;min-width:170px;padding:14px 24px;margin:0 22px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-size:18pt;font-weight:700;">
      Phrase
    </a>
    <a href="?ansclick=sentence"
       style="display:inline-block;min-width:170px;padding:14px 24px;margin:0 22px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-size:18pt;font-weight:700;">
      Sentence
    </a>
  </div>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;"><p style="margin-bottom:0;color:#000080;font:10pt Verdana,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr><?php foreach ($levels as $l): ?><td align="center"><label style="font:9pt Verdana,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b></label></td><?php endforeach; ?></tr></table></div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>