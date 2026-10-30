<?php
// english/modules/sentence-parts.php
// Parts of a Sentence — highlighted region, pick "Subject" or "Predicate".
// Two choices rendered side-by-side on one line with a space between them.
// Tiers 1-2 &#8594; Easy; tiers 3-7 &#8594; Hard (grade-shifted like plural.php).

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
$moduleTitle = 'Parts of a Sentence';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 5);

// Grade &#8594; tier, shifted by level. Easy: 1..2. Hard: 3..7.
$legacyTier = ($grd <= 1) ? 1 : (($grd <= 3) ? 2 : (($grd <= 5) ? 3 : (($grd <= 7) ? 4 : 5)));
if ($lvl === 'Hard') $legacyTier += 2;
$tier = min(7, max(1, $legacyTier));

$boysEasy  = ['Adam','Ben','Bert','Carlo','Chris','Danny','David','Dino','Isaac','Jack','Jacob','James','Jason','Jose','John','Juan','Kevin','Lucas','Luis','Luke','Max','Mike','Nick','Noah','Robert','Ryan','Samuel','Tom','Willie'];
$girlsEasy = ['Amy','Anna','Bella','Beth','Carol','Emma','Eva','Grace','Isabel','Jenny','Jill','Julia','Kathy','Laura','Leila','Leah','Lisa','Mary','Marie','Mina','Nena','Nina','Rita','Sarah','Tina','Vicky'];
$boysHard  = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girlsHard = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];

$tier1 = [
    '1*{name1}+ [is here now].',
    '1*I+ [will give it to {name1}].',
    '1*It+ [is Mary\'s book].',
    '1*{name1}+ [will call the boys].',
    '1*My brother+ [went to school].',
    '1*{name1}+ [drove his new car].',
    '1*My father+ [has many shoes].',
    '1*It+ [is a cold night].',
    '1*I+ [will send her a letter].',
    '1*{name3}+ [wears a nice dress].',
    '1*It+ [is a sunny day].',
    '1*I+ [gave my kite to {name1}].',
    '1*This book+ [is mine].',
    '1*{name3}+ [will come home today].',
    '1*We+ [want to go fishing].',
    '1*The boys+ [are sleeping].',
    '1*{name1}+ [is my brother].',
    '1*She+ [is a good student].',
    '1*Music+ [makes her happy].',
    '1*Your sister+ [is baking a cake].',
    '1*He+ [is my favorite uncle].',
    '1*She+ [is my only aunt].',
    '1*I+ [will send her some flowers].',
    '1*Your apple juice+ [is too sweet].',
    '1*They+ [walked to the park].',
    '1*{name3}+ [passed the ball to him].',
    '1*{name1}+ [handed me a cookie].',
    '1*I+ [will sing one more song].',
    '1*He and I+ [are from Manila].',
    '1*{name3}+ [is good to him].',
    '1*That song+ [makes me sad].',
    '1*We+ [will wash our clothes].',
    '1*The teacher+ [danced for us].',
    '1*These shoes+ [don\'t fit me].',
    '1*A bee+ [just stung me]!',
    '1*That red car+ [is very fast]!',
    '1*The big dog+ [is chasing us]!',
    '1*We+ [are going to the zoo]!',
    '1*The stores+ [is just nearby].',
];

$tier2 = [
    '1*Our old computer+ [is broken again].',
    '1*{name1}+ [likes to watch funny movies with me].',
    '1*We+ [will go there today to thank them].',
    '1*{name1} and I+ [go to the same school].',
    '1*{name3}+ [always listens to her favorite song].',
    '1*He+ [knows the title of her favorite movie].',
    '1*You+ [bought a car that doesn\'t run].',
    '1*He and I+ [have run three marathons].',
    '1*She and I+ [went to church together].',
    '1*They+ [know that {name3} is my neighbor].',
    '1*The young kids+ [will stay in this room].',
    '1*{name1}+ [was the one who scared the cat away].',
    '1*Her classmate+ [sold ten boxes of cookies today].',
    '1*{name1} and I+ [have just finished our homework].',
    '1*The tired pupils+ [are just sitting there].',
    '1*The new stove+ [has one oven and four burners].',
    '1*Our good neighbor+ [brought us some ice cream].',
    '2*My friend+ and I [went to the market] today.',
    '2{name1} *and {name3}+ [dance well] together.',
    '2Do your *friends+ know where [the cat] is hiding?',
    '2His *classmates+ will now go [to the library].',
    '2*His older+ brother helped me [with my homework].',
    '2Did your *mother+ hear [us] sing yesterday?',
    '2He *and I+ are now [the very best] of friends.',
    '2Don\'t these *boys+ [get tired] swimming each day?',
    '2Did your *uncle+ [buy these tickets] for us?',
    '2Are *these+ men [going to] build a new fence?',
    '2This *heavy+ package [will be sent] to {name1}.',
    '2Your *flower garden+ [is very] relaxing.',
    '2The *young+ girls recited [the poem] together.',
    '2Our neighbor\'s *noisy+ truck woke [me] up.',
    '2The *biggest+ player [kicked the ball] very hard.',
    '2The battery *of his camera+ [must be] replaced.',
    '2The *metal+ cabinet will be [moved to] his room.',
    '2Ouch, your *rowdy+ monkey pulled [my hair]!',
    '2Wow, *your+ dog can walk [on its] front legs!',
    '2Yikes, the *grumpy old+ man [has found] us!',
    '2Hurray, our *team+ won [the championship] again!',
];

$tier3 = [
    '2The workers *in our farm+ will harvest [these vegetables] tomorrow.',
    '2Since when has *your friend+ {name3} become [taller than you]?',
    '2The *white puppy+ followed us home [and never left].',
    '2Only you *yourself+ can make [your dreams] come true.',
    '2Our *blue+ car is parked on the other side of [the street].',
    '2The *attractive+ girl looked at [herself] in the mirror.',
    '2Yes, {name1} *and {name3}+ are famous [doctors] in our town.',
    '2Their *favorite+ basketball players have [a game] tonight.',
    '2The *mysterious girl+ asked for some candy [before she left].',
    '2My *cousin {name1}+ likes [to watch] scary vampire movies at night.',
    '2The *repairmen+ are going to inspect [the lighting system].',
    '2My *old smartphone+ is even better [than this new one].',
    '2Aren\'t *those+ children [begging in the streets] every day?',
    '2Did you *and {name1}+ [really invent] this new gadget?',
    '2Why did *you and my+ brother [hide my toy] under the bed?',
    '2When did our *cousin {name1}+ graduate [from that school]?',
    '2Why did your *brothers+ say [that your house] is haunted?',
    '2*{name3} and her+ friends [were with {name1}] last Saturday.',
    '2She *and her sister+ [ate popcorn while waiting] for him.',
    '2{name1}, *who is a postman+, [always carries] a mailbag.',
    '2My classmates *and I+ are learning [to play the violin].',
    '2Ouch, *your naughty+ poodle [just bit my] index finger!',
    '2Our *high school+ teachers will visit {name1} [this weekend].',
    '2Those *pens and pencils+ [must be returned] to that brown box.',
    '2His *successful+ business has made him [very wealthy and famous].',
    '2This business *website+ requires [all users] to register.',
    '2Your *older brother+ was seen [with {name3}] at last night\'s concert.',
    '2Good students *like you+ [are often] blessed with a bright future.',
    '2The *celebrity couple+ [performed] a dance number in their show.',
    '2*Putting+ that smelly jacket on his chair [will make him] mad.',
    '2*Having mango ice cream+ after our dinner is [a great idea].',
    '2Yikes, *that acacia+ tree is about to fall [on his motorcycle]!',
    '2In that small house *a family+ [lives] with ten noisy children.',
    '2Around the peach trees [are] several *buzzing bumblebees+.',
    '2{name1} *and {name3}+ are famous [doctors] in our town.',
];

$tier4 = [
    '2*The officers+ [are going to donate] these clothes to the orphanage.',
    '2*Preparing this+ special seafood fried rice [is not] that difficult.',
    '2Drinking lots of water *from time to time+ will keep [you] hydrated.',
    '2Does *the other+ team know that [{name1}] is a good basketball player?',
    '2Last week\'s training *on accounting+ made {name1} [more competent].',
    '2The entrepreneur, *who\'s very young+, [bought each of them] a new computer.',
    '2Our mayor, *whom we truly respect+, visited the poor [after the storm].',
    '2*My friend+ {name1} was congratulated [by the governor] when they met.',
    '2Do *some foreign+ tourists already [consider this town] their second home?',
    '2Do *all of his+ friends consider him to be [an exceptional student]?',
    '2You and *your strange hobby+ are beginning to drive [our neighbors] insane.',
    '2The first aid kits *under the rubble+ [must be found] as soon as possible.',
    '2The *two families+ want to get {name1} [a computer] for his tenth birthday.',
    '2How can an expert tailor *like {name3}+ make such [a shoddy pair] of pants?',
    '2That the lady *in the red dress+ is actually [a physics professor] here.',
    '2Why would a man *like {name1}+ buy [that strange-looking hat] for himself?',
    '2The *two+ brothers [have finally] published their first suspense novel.',
    '2This *sweet-smelling+ Chinese dish is making [all of us] excited to eat.',
    '2*Teaching+ this boy math and science every day [will make his grades] higher.',
    '2The most reliable pick-up truck *in that ranch+ is also [the oldest].',
    '2That *tall and shiny+ trophy will only [be yours] if you\'ll win tomorrow.',
    '2Yikes, *the ferocious+ stray dogs are attacking [our turkeys] again!',
    '2Yuck, *this smelly+ chicken broth is [the worst soup] I\'ve ever tasted!',
    '2My friend, *who was very weak+, really hurt [himself] when he tripped.',
    '2Hurray, the *board+ of judges declared [our team] the champion instead!',
    '2Terrific, *our new+ company sold [a million books] in just one month!',
    '2Many *young+ boys will listen [with interest] to facts about dinosaurs.',
];

$tier5 = [
    '2That vintage motorcycle *of his+ was used [as a prop] in that science fiction movie.',
    '2The *brave+ soldiers [have finally proven] themselves to be worthy of our trust.',
    '2Their *young children+ enjoyed [watching the playful lion cubs] at the zoo.',
    '2The careless carpenter *who lost the toolbox+ was scolded by [his foreman].',
    '2Their principal, *whom I greatly respect+, recently [received a prestigious award].',
    '2The old letters *from her husband+ were all lost [during the big flood] last year.',
    '2These *ten crystal bowls+ got broken when [{name3} dropped them] to the floor.',
    '2The dog *sitting beside you+ looks more menacing than [the lion in the cage].',
    '2The food, which *is fast getting cold+, should be served to [the guests] already.',
    '2Her brother, *who is ten years old+, loves watching [basketball games] on television.',
    '2The name of the biologist *who\'ll be here next week+ is hard [for me to pronounce].',
    '2Our old friends *from high school+ have expressed [their interest] to join our project.',
    '2Did *your friend+ {name1} tell you that there\'s [a cougar] living in that rickety house?',
    '2Their offer *to name you+ the new research director would be [difficult to refuse].',
    '2Do *our actors+ and actresses also think that [this movie script] needs to be revised?',
    '2The city\'s biggest mall, *which is fifty years old+, will close [its doors] for good.',
    '2Your team, which *will be led by you+, must present the data to [the manager] tomorrow.',
    '2Can *all of our+ carpenters work together harmoniously and finish [this house] on time?',
    '2A chord progression *that\'s easy to master+ is what you need to compose [your melody].',
    '2The stern judge *from Cebu+ ruled her [out of order], making her calm down immediately.',
    '2Wow, *my friends+ and I have never seen such an incredible [skateboard stunt] before!',
    '2Whoopee, this amazing mobile app *of ours+ will make us [millionaires] very soon!',
    '2The investigator *of the case+ presented his findings to [the relatives] of the victim.',
    '2Between two very [rich and famous celebrities] sits *my clueless friend+ {name1}.',
];

$tier6 = [
    '2Those shoes, which *look really frail+, will not last long if worn to [the farm] each day.',
    '2A fox *that seems very hungry+ is now looking for a way to break into [the chicken coop].',
    '2The hunter, who *had doubts in himself+, approached the grizzly bear with extreme caution.',
    '2The program installation file, *which can be downloaded+, must be run to install [your app].',
    '2The zookeeper, who *is very hardworking+, fed [the tigresses and their cubs] this morning.',
    '2The social workers, who *are tired and weary+, distributed [medical supplies] to the typhoon victims.',
    '2He *and his+ friends won [most of the tournaments] they joined because of their expertise.',
    '2{name1}, who *is a close friend of ours+, wants to join [this institution] to help the poor.',
    '2{name3}, who *used to be our teacher+, confirmed that [{name1}] has been ill since last month.',
    '2The family *whose house burnt+ in the fire is now under [the care of] those social workers.',
    '2The editor *of this magazine+ will teach her staff [modern writing techniques] this afternoon.',
    '2Children who *are barely in their teens+ can now teach themselves [new programming] languages.',
    '2{name3}, who *is our manager+, deemed [our project] outdated and unprofitable and cancelled it.',
    '2Our van\'s door, which *was hit by another car+, will be replaced by [our insurance] company.',
    '2The professor\'s *engineering+ students will learn [the basic concepts] of thermodynamics soon.',
    '2Unfortunately, the opportunity to *talk to our investors+ didn\'t present [itself] to us yesterday.',
    '2Have the owners *of that garment factory+ already reached [a decision] on whether to downsize or not?',
    '2Our mobile app, which *is now running+, [must be released] in the App Store by the end of this week.',
    '2These design features, which *are all patented+ under my name, [can\'t be used] in their products.',
    '2The president of the most powerful country *in the world+ [regards] climate change as a hoax.',
    '2The manager who *is in charge+ of hiring people contacted at least [ten candidates] for the job.',
    '2The assistant that *sterilized the laboratory glassware+ [was also] the one who prepared the samples.',
    '2The pork, soy sauce, and garlic that {name3} *combined together+ [underwent marination] for an hour.',
    '2A report that *identified the contaminant+ to be mercury was presented to the health officials.',
    '2The first time I *rode a ferris wheel+ [was a] frightening experience I won\'t ever forget!',
    '2*Acquiring a beachfront property+ for half its true price [will leave you] feeling ecstatic.',
    '2The hairy tarantula that *concealed itself+ inside the pocket of his jacket [will surely] terrify him.',
    '2The destructive power of the tsunami that *left them with nothing+ [would haunt] them for many years.',
];

$tier7 = [
    '2A more effective solution *to this problem+ can only be found by assembling [our best team] of engineers immediately.',
    '2The *courageous+ general ordered [an air assault] when he saw that the formidable fortress was impregnable.',
    '2Their high-end drones, which *are very sophisticated+, can now deliver products to [their customers] more efficiently.',
    '2After a long debate, *all the senators+ have finally agreed to consider [the existing laws] sufficient.',
    '2The *ornithologist+ [followed the rare birds] for quite some time before losing sight of them by the river.',
    '2Our university, which *is investing+ in new equipment right now, has bought a [sophisticated telescope].',
    '2Students *in diverse classrooms+ benefit from collaboration and teamwork with [those whose family backgrounds are different] from theirs.',
    '2Was this beautiful and compassionate wife of his, *whom he loved so dearly+, really capable of [such a deed]?',
    '2Several members *of that criminal syndicate+ have already gone into hiding to elude [the police teams] going after them.',
    '2My business partners *and I+ have already sent our project proposal to [your marketing director] yesterday.',
    '2The ability of children *to have+ a positive view of themselves is impacted by [the way] they are treated by their parents.',
    '2The radiant *flying+ object sped away and disappeared [when a frightened soldier] fired two shots in the air.',
    '2The three arrows that *streaked across the sky+ [implanted] themselves in the menacing dragon\'s chest.',
    '2The idea that he\'s probably *doomed to be alone+ on the desolate island for the rest of his life dawned [on him].',
    '2Climate change, which *is making+ weather patterns more erratic and unpredictable, is [something that] we must all take seriously.',
    '2The climate change issues that *confront us today+ already appear unstoppable in the most [vulnerable regions] of the world.',
    '2The methods used in their study, which *were different from what we used+, resulted in [the same conclusion] as ours.',
    '2Ten *batches of+ products [need to be] successfully manufactured to prove that the entire process is working.',
    '2The chief scientist who *is in charge of the experiment+ [explained to the subjects] what they need to do.',
    '2Convincing {name1} that all equities *are simply too risky+ [is now of paramount importance] given the ongoing financial crisis.',
    '2*Incorporating this feature+ into our microprocessor [will make our computers] more efficient without lowering their performance.',
    '2Improving the software *that drives the motors+ of the new drone [is our best option] for achieving stability and efficiency.',
    '2The mixture, which now *contained a few drops+ of banana extract, [was then stirred] until it became light and fluffy.',
    '2A comprehensive report on the reliability of the *shipped+ products was submitted [to the] technical review board.',
    '2Yikes, the enormous anaconda, which *has just escaped+ from its enclosure, [is now headed] in our direction!',
    '2A huge and heavy acrobat *pedalling a unicycle+ across a wire [is something] that people don\'t see everyday.',
    '2Their dog, which *fell off+ the boat, [is now struggling] to swim away from the jaws of that menacing shark!',
    '2Corrupt politicians who *take advantage of poor families+ in a despicable manner [must be] exposed and made answerable for their deeds.',
    '2Hurray, the coordinated efforts *of medical experts+ [have finally] eradicated malaria in our country once and for all!',
];

$banks = [1 => $tier1, 2 => $tier2, 3 => $tier3, 4 => $tier4, 5 => $tier5, 6 => $tier6, 7 => $tier7];

/* ---------- helpers ---------- */

function apply_names($tpl, $boys, $girls) {
    $name1 = $boys[array_rand($boys)];
    $name2 = $name1;
    $guard = 0;
    while ($name2 === $name1 && $guard++ < 20) $name2 = $boys[array_rand($boys)];
    $name3 = $girls[array_rand($girls)];
    return str_replace(['{name1}', '{name2}', '{name3}'], [$name1, $name2, $name3], $tpl);
}

function extract_marks($tpl_with_digit) {
    $qform = substr($tpl_with_digit, 0, 1);
    $tpl   = substr($tpl_with_digit, 1);
    $subject = '';
    $predicate = '';
    if (preg_match('/\*([^*+]+)\+/', $tpl, $m)) {
        $subject = $m[1];
    } elseif (preg_match('/\+([^+*]+)\*/', $tpl, $m)) {
        $subject = $m[1];
    }
    if (preg_match('/\[([^\]]+)\]/', $tpl, $m)) {
        $predicate = $m[1];
    }
    return ['qform' => $qform, 'subject' => $subject, 'predicate' => $predicate];
}

function render_marked($tpl_with_digit, $highlight) {
    $tpl = substr($tpl_with_digit, 1);

    // Convert both possible subject-marker orders into a placeholder.
    $tpl = preg_replace_callback('/\*([^*+]+)\+/', function ($m) {
        return '{{SUBJ}}' . $m[1] . '{{/SUBJ}}';
    }, $tpl);
    $tpl = preg_replace_callback('/\+([^+*]+)\*/', function ($m) {
        return '{{SUBJ}}' . $m[1] . '{{/SUBJ}}';
    }, $tpl);
    $tpl = preg_replace_callback('/\[([^\]]+)\]/', function ($m) {
        return '{{PRED}}' . $m[1] . '{{/PRED}}';
    }, $tpl);

    $blue  = '<span style="color:#0000CC;font-weight:700">';
    $gray  = '<span style="color:#555555;font-weight:700">';
    $close = '</span>';

    if ($highlight === 'subject') {
        $tpl = str_replace('{{SUBJ}}',  $blue, $tpl);
        $tpl = str_replace('{{/SUBJ}}', $close, $tpl);
        $tpl = str_replace('{{PRED}}',  $gray, $tpl);
        $tpl = str_replace('{{/PRED}}', $close, $tpl);
    } else {
        $tpl = str_replace('{{SUBJ}}',  $gray, $tpl);
        $tpl = str_replace('{{/SUBJ}}', $close, $tpl);
        $tpl = str_replace('{{PRED}}',  $blue, $tpl);
        $tpl = str_replace('{{/PRED}}', $close, $tpl);
    }
    return $tpl;
}

function pick_sentence($pool, $sessionKey) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $tpl) if (!in_array($i, $used, true)) $available[$i] = $tpl;
    if (!$available) { $used = []; $available = $pool; }
    if (!$available) return null;
    $keys  = array_keys($available);
    $index = $keys[array_rand($keys)];
    $used[] = $index;
    if (count($used) > 300) $used = array_slice($used, -150);
    $_SESSION[$sessionKey]['used'] = $used;
    return $available[$index];
}

/* ---------- flow ---------- */

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
    $pool = $banks[$tier] ?? $banks[1];
    $tpl  = pick_sentence($pool, $sessionKey);
    if ($tpl === null) $tpl = $pool[0];

    $boys  = ($lvl === 'Hard') ? $boysHard  : $boysEasy;
    $girls = ($lvl === 'Hard') ? $girlsHard : $girlsEasy;
    $tpl   = apply_names($tpl, $boys, $girls);

    $parsed = extract_marks($tpl);
    $answer = (mt_rand(0, 1) === 0) ? 'subject' : 'predicate';
    $marked = ($answer === 'subject') ? $parsed['subject'] : $parsed['predicate'];

    $_SESSION[$sessionKey]['current'] = [
        'qform'       => $parsed['qform'],
        'sentence'    => $tpl,
        'answer'      => $answer,
        'marked_text' => $marked,
        'lvl'         => $lvl,
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

$is_phrase = (strpos($q['marked_text'] ?? ' ', ' ') !== false) ? 'phrase' : 'word';
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): $cur = $result['cur'];
    $cur_phrase = (strpos($cur['marked_text'], ' ') !== false) ? 'phrase' : 'word';
?>
  <p style="font-size:14pt;color:#666;margin-top:20px;">Your answer: <strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong></p>
  <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
  <div style="margin:20px auto;max-width:450px;padding:18px 26px;
              background:#FFFDF3;border:2px solid #C8B070;border-radius:10px;
              font-family:Arial,sans-serif;font-size:17pt;color:#333;">
    <?php echo render_marked($cur['sentence'], $cur['answer']); ?>
  </div>
  <p style="font-size:16pt;color:#800080;">
    <?php if ($cur['qform'] === '1'): ?>
      The blue <?php echo $cur_phrase; ?> is the <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>.
    <?php else: ?>
      The blue <?php echo $cur_phrase; ?> is part of the complete<br/><strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong> of the entire sentence.
    <?php endif; ?>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
  <div style="margin:45px auto 15px;font-family:Arial,sans-serif;font-size:17pt;font-weight:600;color:#800080;">
    <?php if ($q['qform'] === '1'): ?>
      Is the blue <?php echo $is_phrase; ?> the subject or the predicate?
    <?php else: ?>
      The blue <?php echo $is_phrase; ?> is in which<br/>part of the entire sentence?
    <?php endif; ?>
  </div>
  <div style="margin:20px auto;max-width:450px;padding:22px 30px;
              background:#FFFDF3;border:2px solid #C8B070;border-radius:10px;
              font-family:Arial,sans-serif;font-size:19pt;font-weight:700;color:#333;">
    <?php echo render_marked($q['sentence'], $q['answer']); ?>
  </div>
  <div style="font-size:13pt;color:#555;margin-bottom:14px;">Click on your answer.</div>
  <div style="margin:20px auto;white-space:nowrap;">
    <a href="?ansclick=subject"
       style="display:inline-block;min-width:170px;padding:14px 24px;margin:0 22px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-size:18pt;font-weight:700;">
      Subject
    </a>
    <a href="?ansclick=predicate"
       style="display:inline-block;min-width:170px;padding:14px 24px;margin:0 22px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-size:18pt;font-weight:700;">
      Predicate
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