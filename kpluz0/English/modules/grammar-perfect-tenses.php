<?php
// english/modules/grammar-perfect-tenses.php
// Grammar: Perfect Tenses — click the verb form that correctly fits the blank.
// 12 sentence pools mapped by (level × grade). Legacy Easy + Medium; modern
// folds legacy Medium into Hard per handover §3.2.
// 4 choices always in a 2×2 grid; correct answer guaranteed to appear.
//
// Legacy quirk: legacy had a forced Hard&#8594;Medium conversion at the top of the
// file, so legacy Hard was never actually used. Modern Hard = legacy Medium.
//
// Legacy had no pools for grades 0–2 — clamped to grade 3 (pool 1/2).
//
// Data fixes (§5.4):
//   • pool 3 "florists" — wrong3 duplicated correct; fixed to <will have arranged
//   • pool 4 "tenors" — has&#8594;have (plural subject) + distractor order fixed
//   • pool 4 "merhcant" &#8594; "merchant"
//   • pool 5 "bicuits" &#8594; "biscuits"
//   • pool 5 "managers" — wrong3 duplicated correct; fixed to <has selected
//   • pool 7 "solutiom" &#8594; "solution"
//   • pool 7 "army officers" — wrong3 duplicated correct; fixed to <has directed

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
$moduleTitle = 'Grammar: Perfect Tenses';
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
function resolve_gft_pool(string $lvl, int $grd): int {
    if ($grd < 0) $grd = 0;
    if ($grd > 10) $grd = 10;
    if ($lvl === 'Easy') {
        if ($grd <= 3) return 1;
        if ($grd == 4) return 3;
        if ($grd == 5) return 5;
        if ($grd == 6) return 7;
        if ($grd == 7 || $grd == 9) return 9;
        return 11; // 8 or 10
    }
    if ($grd <= 3) return 2;
    if ($grd == 4) return 4;
    if ($grd == 5) return 6;
    if ($grd == 6) return 8;
    if ($grd == 7 || $grd == 9) return 10;
    return 12; // 8 or 10
}

// ---- Value pools (§5) ----
$boyPool     = ['Alex','Ben','Carlos','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lucas','Luis','Max','Roberto','Samuel','Tomas'];
$girlPool    = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];
$surnamePool = ['Cruz','de Guzman','Gomez','Padua','Santos','Reyes','Tolentino','Torres'];
$dayPool     = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

// ---- Sentence pools — format: 'sentence=answer>wrong1+wrong2<wrong3' ----
$sentencePools = [
    1 => [
        'The gardener ___ the flowers just a moment ago.=has picked>had picked+will have picked<have picked',
        'A policeman ___ the crook just minutes ago.=has arrested>had arrested+will have arrested<have arrested',
        'The lady ___ her plants just this minute.=has watered>had watered+will have watered<have watered',
        'That cat ___ on the sofa a short while ago.=has rested>had rested+will have rested<have rested',
        'The choir ___ that beautiful song just now.=has sung>had sung+will have sung<have sung',
        'Mr. {surname} ___ away the letter when we arrived.=had thrown>has thrown+will have thrown<have thrown',
        'He ___ the tree when the gardener showed up.=had planted>has planted+will have planted<have planted',
        'The nurse ___ him the medicine before he fell asleep.=had given>has given+will have given<have given',
        '{boy} ___ the gum when {girl} asked for it.=had chewed>has chewed+will have chewed<have chewed',
        'The baker ___ the cake before I reached his bakery.=had sold>has sold+will have sold<have sold',
        'My ancestors ___ that house before the war.=had built>has built+will have built<have built',
        '{boy} ___ the doorbell when the dogs barked.=had rung>has rung+will have rung<have rung',
        'Their pet goats ___ the pumpkin a minute ago.=have eaten>had eaten+will have eaten<has eaten',
        'We ___ all our money just a while ago.=have spent>had spent+will have spent<has spent',
        '{boy} and {girl} ___ the pictures only moments ago.=have taken>had taken+will have taken<has taken',
        'My aunts ___ the dishes just now.=have washed>had washed+will have washed<has washed',
        'The girls ___ their dogs just about now.=have walked>had walked+will have walked<has walked',
        'The fans ___ the stadium just moments ago.=have left>had left+will have left<has left',
        'The students ___ the exhibit only minutes ago.=have opened>had opened+will have opened<has opened',
        'Mrs. {surname} ___ to him by this May.=will have written>has written+had written<have written',
        'The dancers ___ in that show by next {day}.=will have performed>has performed+had performed<have performed',
        'Your nephew ___ them a text message by tomorrow.=will have sent>has sent+had sent<have sent',
        'His sister ___ her song by next week.=will have recorded>has recorded+had recorded<have recorded',
        'Those artists ___ that mural by yearend.=will have painted>has painted+had painted<have painted',
    ],
    2 => [
        'The tourist ___ his coins into that wishing well just now.=has tossed>had tossed+will have tossed<have tossed',
        'My mother ___ for the market just minutes ago to buy some eggs.=has left>had left+will have left<have left',
        'The zookeeper ___ the new panda to the visitors just a while back.=has shown>had shown+will have shown<have shown',
        'The plumber ___ the faucet from leaking just about now.=has stopped>had stopped+will have stopped<have stopped',
        'Her large white dog ___ the missing ball just a moment ago.=has found>had found+will have found<have found',
        'The scientist ___ his experiment already when his colleague called.=had completed>has completed+will have completed<have completed',
        '{boy} ___ the books to the library before 5 o\'clock that afternoon.=had returned>has returned+will have returned<have returned',
        'The animal trainers ___ that monkey to dance before they quit.=had taught>has taught+will have taught<have taught',
        'My classmates ___ the new math lesson to me just a while back.=have explained>had explained+will have explained<has explained',
        'The adult eagles ___ back to their nest seconds ago to feed their chicks.=have flown>had flown+will have flown<has flown',
        'My groupmates ___ their own ideas about our project just a moment earlier.=have shared>had shared+will have shared<has shared',
        'The young artist ___ his abstract painting by the end of this month.=will have finished>has finished+had finished<have finished',
        'My female African lovebird ___ four eggs by the end of summer.=will have hatched>has hatched+had hatched<have hatched',
        'Our farm workers ___ down that old barn by the end of this year.=will have torn>has torn+had torn<have torn',
        'Our mayor ___ our business permit by the start of next month.=will have granted>has granted+had granted<have granted',
    ],
    3 => [
        'The homeless man ___ the clothes from the church just now.=has received>had received+will have received<have received',
        'My aunt ___ for the church just minutes ago to pray for my uncle.=has left>had left+will have left<have left',
        'The zookeeper ___ the baby elephant to the children just about now.=has shown>had shown+will have shown<have shown',
        'The plumber ___ the leaking faucet just a while back.=has replaced>had replaced+will have replaced<have replaced',
        'Her little brother ___ the missing book just a moment ago.=has found>had found+will have found<have found',
        'The athlete ___ his opponent\'s hand just this minute.=has shaken>had shaken+will have shaken<have shaken',
        '{boy} ___ that original poem long before we had met him.=had composed>has composed+will have composed<have composed',
        '{boy} ___ the toys to the wooden chest before sunset that day.=had returned>has returned+will have returned<have returned',
        'The jeweler ___ the necklace before I reached the jewelry store.=had sold>has sold+will have sold<have sold',
        'My father ___ my mother that ring long before I was born.=had bought>has bought+will have bought<have bought',
        'Their dog ___ his slipper already when he started looking for it.=had chewed>has chewed+will have chewed<have chewed',
        'His colleague ___ to their boss before lunchtime yesterday.=had spoken>has spoken+will have spoken<have spoken',
        'Just this minute, my friends ___ to me why they can\'t play with me.=have explained>had explained+will have explained<has explained',
        'The creepy bats ___ back into that dark cave only seconds ago.=have flown>had flown+will have flown<has flown',
        'My sisters ___ me money for new shoes just a moment earlier.=have given>had given+will have given<has given',
        'The cooks ___ the can of sliced fruits just a minute ago.=have opened>had opened+will have opened<has opened',
        'The florists ___ the flowers around the church just now.=have arranged>had arranged+will have arranged<has arranged',
        'The young writer ___ his short story by the end of this week.=will have finished>has finished+had finished<have finished',
        'Our French bulldog ___ birth already by the 15th of next month.=will have given>has given+had given<have given',
        'My cousin ___ my room before the start of next summer.=will have repainted>has repainted+had repainted<have repainted',
        'My father ___ my sister some money by tomorrow afternoon.=will have sent>has sent+had sent<have sent',
        'The singer ___ her own version of that song by next week.=will have recorded>has recorded+had recorded<have recorded',
        'The barber ___ the young lad\'s hair by next month.=will have cut>has cut+had cut<have cut',
        'The soldiers ___ their camp from their enemy by tomorrow afternoon.=will have defended>has defended+had defended<have defended',
    ],
    4 => [
        'The spy ___ the colonel\'s photograph in secret just a while ago.=has taken>had taken+will have taken<have taken',
        'The shoemaker at the mall ___ my torn slipper just a few minutes ago.=has repaired>had repaired+will have repaired<have repaired',
        'That group of tricycle drivers ___ a new leader only a moment ago.=has chosen>had chosen+will have chosen<have chosen',
        'The famous tenors ___ that old opera song just a little while back.=have sung>had sung+will have sung<has sung',
        'The drama group ___ that production before the theater was closed.=had staged>has staged+will have staged<have staged',
        'The police officials ___ them to leave before the investigation started.=had convinced>has convinced+will have convinced<have convinced',
        'Those circus trainers ___ that ape to dance before the parade last month.=had taught>has taught+will have taught<have taught',
        'The crook ___ their bicycle already when they noticed that it was missing.=had stolen>has stolen+will have stolen<have stolen',
        'The mechanics ___ to me what\'s wrong with my car just a while back.=have explained>had explained+will have explained<has explained',
        'The hungry lionesses ___ an injured hippopotamus just a moment ago.=have killed>had killed+will have killed<has killed',
        'The astronomer and the physicist ___ their observations just now.=have analyzed>had analyzed+will have analyzed<has analyzed',
        'Only a while ago, my coworkers ___ a secret birthday party for our boss.=have organized>had organized+will have organized<has organized',
        'The construction workers ___ that old building by the end of this year.=will have demolished>has demolished+had demolished<have demolished',
        'The movie star ___ a new contract before he returns from abroad.=will have signed>has signed+had signed<have signed',
        'Mr. {surname} ___ a business deal with the rich merchant by next {day}.=will have closed>has closed+had closed<have closed',
    ],
    5 => [
        'The orphanage ___ the children\'s clothes and books from the church just now.=has received>had received+will have received<have received',
        'My best friend ___ for the mall just about now to try on some new dresses.=has left>had left+will have left<have left',
        'The zookeeper ___ the lion cubs to the schoolchildren just minutes ago.=has shown>had shown+will have shown<have shown',
        'The plumber ___ the leaking pipe under our kitchen sink a while ago.=has replaced>had replaced+will have replaced<have replaced',
        'Her new classmate ___ his missing notebook just a moment ago.=has found>had found+will have found<have found',
        'The governor ___ his political rival\'s hand just this minute.=has shaken>had shaken+will have shaken<have shaken',
        '{boy} ___ that original song before he joined the singing contest last year.=had composed>has composed+will have composed<have composed',
        '{boy} ___ the carpentry tools to the tool shed before noontime that day.=had returned>has returned+will have returned<have returned',
        'The car salesman ___ the car I wanted to buy by the time I reached their showroom.=had sold>has sold+will have sold<have sold',
        'My brother and his wife ___ that house even before they had any children.=had bought>has bought+will have bought<have bought',
        '{girl} ___ the doll in her room before her sister realized it was missing.=had hidden>has hidden+will have hidden<have hidden',
        'The crocodile ___ the buffalo carcass long before the lion showed up.=had swallowed>has swallowed+will have swallowed<have swallowed',
        'The referees ___ to the coach minutes ago why {boy} was disqualified.=have explained>had explained+will have explained<has explained',
        'Our relatives who visited us ___ back to America just a short while ago.=have returned>had returned+will have returned<has returned',
        'My parents ___ me some cash just a moment earlier for my schoolbooks.=have given>had given+will have given<has given',
        'The children ___ the can of assorted biscuits just a minute ago.=have opened>had opened+will have opened<has opened',
        'Just now, the managers ___ the applicant that they\'d hire for that job.=have selected>had selected+will have selected<has selected',
        'The journalist ___ his documentary on poverty by the end of this week.=will have finished>has finished+had finished<have finished',
        'Our grandmother ___ from her illness by the 15th of next month.=will have recovered>has recovered+had recovered<have recovered',
        '{boy} and {girl} ___ that course on digital marketing two weeks from now.=will have completed>has completed+had completed<have completed',
        'The construction workers ___ that dilapidated house by tomorrow afternoon.=will have demolished>has demolished+had demolished<have demolished',
        'The {surname} family ___ out of that old house three months from now.=will have moved>has moved+had moved<have moved',
        'The brilliant mathematician ___ that secret message by next {day}.=will have decoded>has decoded+had decoded<have decoded',
        'One of the scammer\'s victims ___ a case in court by next week.=will have filed>has filed+had filed<have filed',
    ],
    6 => [
        'The mechanic at the automotive shop ___ my car\'s engine just a few minutes ago.=has repaired>had repaired+will have repaired<have repaired',
        'The laundrywoman ___ the newly washed clothes outside just a little while back.=has hung>had hung+will have hung<have hung',
        'Only a moment ago, my mother ___ the dress that she\'ll wear to my sister\'s wedding.=has chosen>had chosen+will have chosen<have chosen',
        'A group of construction workers ___ that steel tower just a couple of hours ago.=has erected>had erected+will have erected<have erected',
        'Those high school students ___ a concert before their graduation last April.=had staged>has staged+will have staged<have staged',
        'The guidance counselor ___ {boy} to apologize to {girl} a day after the trouble started.=had convinced>has convinced+will have convinced<have convinced',
        'Those aquatic mammal trainers ___ that dolphin to flip balls before they named it \'Flipper\'.=had taught>has taught+will have taught<have taught',
        'The art burglar ___ the painting already when the curator noticed that it was missing.=had stolen>has stolen+will have stolen<have stolen',
        'The film enthusiasts ___ the classic horror movie at the mall just an hour ago.=have seen>had seen+will have seen<has seen',
        'The game master ___ the game\'s rules to the contestants just fifteen minutes ago.=have explained>had explained+will have explained<has explained',
        'The vicious army ants ___ the hapless cockroach on the floor just a moment ago.=have overwhelmed>had overwhelmed+will have overwhelmed<has overwhelmed',
        'The bank manager and the teller ___ the cause of the cash discrepancy just now.=have determined>had determined+will have determined<has determined',
        'Only a while ago, the event planners ___ a prenuptial photoshoot for the couple.=have organized>had organized+will have organized<has organized',
        'The astronomer ___ the trajectory of the meteor before he goes home later tonight.=will have calculated>has calculated+had calculated<have calculated',
        'Mr. {surname} and his partners ___ for a business loan by next {day}.=will have qualified>has qualified+had qualified<have qualified',
        'The network technician ___ a new router for our house by the end of next week.=will have installed>has installed+had installed<have installed',
    ],
    7 => [
        'Mr. {surname} ___ the responsibility of looking after our small chapel just now.=has accepted>had accepted+will have accepted<have accepted',
        'The coward soldier ___ his post just about now to run away from their invading enemies.=has deserted>had deserted+will have deserted<have deserted',
        'The museum curator ___ their newly acquired paintings just minutes ago.=has displayed>had displayed+will have displayed<have displayed',
        'The basketball player ___ shooting a while ago to prepare for their next game.=has practiced>had practiced+will have practiced<have practiced',
        'Just an hour earlier, the council ___ to promote tourism in their city.=has decided>had decided+will have decided<have decided',
        'The tailor at the corner shop ___ my torn jacket just moments ago.=has repaired>had repaired+will have repaired<have repaired',
        'The job applicant ___ all the application requirements when he was called for an interview.=had completed>has completed+will have completed<have completed',
        'Mr. {surname} ___ his desire to work abroad even before he lost his job last year.=had expressed>has expressed+will have expressed<have expressed',
        'The ice plant ___ more than a thousand blocks of ice just before noontime that day.=had frozen>has frozen+will have frozen<have frozen',
        'The novice driver ___ his car into a ditch after he misjudged that sharp turn.=had driven>has driven+will have driven<have driven',
        '{girl} ___ all the money in her piggy bank when the typhoon damaged their house.=had spent>has spent+will have spent<have spent',
        '{boy} and his wife ___ that farm lot when it was offered to them a decade ago.=had purchased>has purchased+will have purchased<have purchased',
        'The tiger ___ the chicken carcass from the zookeeper before the zebra was fed.=had swallowed>has swallowed+will have swallowed<have swallowed',
        'The students ___ some points about their presentation to their professor minutes ago.=have explained>had explained+will have explained<has explained',
        'The lawyers ___ the issue to the attention of their client just a short while ago.=have brought>had brought+will have brought<has brought',
        'My toes ___ just this past hour because of the snakebite to my foot.=have swollen>had swollen+will have swollen<has swollen',
        'The young children ___ what their parents taught them just a minute ago.=have understood>had understood+will have understood<has understood',
        'Just now, the army officers ___ their men to find the best solution to their problem.=have directed>had directed+will have directed<has directed',
        'The famous director ___ his romantic comedy movie three months from now.=will have finished>has finished+had finished<have finished',
        'The brave policeman ___ from his injuries by the middle of next month.=will have recovered>has recovered+had recovered<have recovered',
        '{boy} and {girl} ___ in a vocational course by the end of next week.=will have enrolled>has enrolled+had enrolled<have enrolled',
        'The construction workers we hired ___ that rickety house of ours by next year.=will have refurbished>has refurbished+had refurbished<have refurbished',
        'The {surname} family ___ that large sack of rice two months from now.=will have consumed>has consumed+had consumed<have consumed',
        'The biologist ___ the anatomy of that new bird species by next {day}.=will have examined>has examined+had examined<have examined',
        'The hot rays of the sun ___ those wet clothes on the fence by sunset today.=will have dried>has dried+had dried<have dried',
    ],
    8 => [
        'A platoon of boy scouts ___ a large termite hill in the playground just a moment ago.=has discovered>had discovered+will have discovered<have discovered',
        'A very large yellowjacket ___ that little toddler\'s forearm just a little while back.=has stung>had stung+will have stung<have stung',
        'Only a moment ago, my mother ___ me and my brother about being truthful at all times.=has lectured>had lectured+will have lectured<have lectured',
        'A group of salesmen from that company ___ to their competitor just a couple of hours ago.=has defected>had defected+will have defected<have defected',
        'That instrument ___ strange signals from outer space just before man\'s first moon landing.=had detected>has detected+will have detected<have detected',
        'The team of doctors ___ the drowning victim by the time the investigator arrived.=had revived>has revived+will have revived<have revived',
        'Mr. {surname} ___ his horse to rescue people before the volcano in their province erupted.=had trained>has trained+will have trained<have trained',
        'I ___ that carabao to different places before it became hostile to people last year.=had ridden>has ridden+will have ridden<have ridden',
        'The residents of our community ___ an audience with our barangay captain just thirty minutes ago.=have sought>had sought+will have sought<has sought',
        'Three television stations ___ the live coverage of the celebrity wedding just a while ago.=have broadcasted>had broadcasted+will have broadcasted<has broadcasted',
        'The angry people ___ the security guards of the closing bank just a moment ago.=have overwhelmed>had overwhelmed+will have overwhelmed<has overwhelmed',
        'The data analysts ___ the reason for the discrepancy between the two databases just now.=have determined>had determined+will have determined<has determined',
        'The climate change activists ___ a rally at that botanical park about an hour ago.=have organized>had organized+will have organized<has organized',
        'Mr. {surname} and his son ___ for the second round of that golfing tournament by next {day}.=will have qualified>has qualified+had qualified<have qualified',
        'The computer technician ___ an operating system on my new laptop before the day ends.=will have installed>has installed+had installed<have installed',
        'That herd of thirsty desert elephants ___ some spring water to drink by tomorrow morning.=will have found>has found+had found<have found',
    ],
    9 => [
        'The new tennis champion ___ his trophy and cash prize on that platform just now.=has accepted>had accepted+will have accepted<have accepted',
        'Having lost a fight with an intruder, the injured male lion ___ its pride hours earlier.=has deserted>had deserted+will have deserted<have deserted',
        'The avid toy collector ___ his action figure museum at the mall just minutes ago.=has inaugurated>had inaugurated+will have inaugurated<have inaugurated',
        'My new shirt ___ to half its normal size in that washing machine just minutes ago.=has shrunk>had shrunk+will have shrunk<have shrunk',
        'Our neighbor ___ compensation from the government a while ago for damage to his property.=has sought>had sought+will have sought<have sought',
        'A radio station ___ an interview with that controversial senator just a while ago.=has broadcasted>had broadcasted+will have broadcasted<have broadcasted',
        'Mr. {surname} ___ his plan to join the police force even before he became a crime victim last year.=had expressed>has expressed+will have expressed<have expressed',
        'The sheriff ___ the bank accounts of her parents by noontime of her birthday last month.=had frozen>has frozen+will have frozen<have frozen',
        '{girl} ___ all her free time at the mall when she remembered that she needed to finish a project.=had spent>has spent+will have spent<have spent',
        'Those directors ___ their film-making seminar months before that new theater had opened.=had launched>has launched+will have launched<have launched',
        'The {surname} family ___ their house by the time the floods had reached the second floor.=had evacuated>has evacuated+will have evacuated<have evacuated',
        'The police officers, just minutes ago, ___ the charges clearly to the person they arrested.=have explained>had explained+will have explained<has explained',
        'Various workers\' associations ___ labor strikes in several cities just several hours ago.=have organized>had organized+will have organized<has organized',
        'The man\'s fingers ___ just these past two hours because of the severe injury to his hand.=have swollen>had swollen+will have swollen<has swollen',
        'The young pupils ___ what their teacher has explained to them just a while ago.=have misunderstood>had misunderstood+will have misunderstood<has misunderstood',
        'This morning, the environmentalists ___ against the opening of that coal power plant.=have protested>had protested+will have protested<has protested',
        'Those environmentalists ___ that polluted and stagnant river no more than an hour ago.=have dredged>had dredged+will have dredged<has dredged',
        'The famous director ___ his romantic comedy movie three months from now.=will have finished>has finished+had finished<have finished',
        'The brave policeman ___ from his injuries by the middle of next month.=will have recovered>has recovered+had recovered<have recovered',
        '{boy} and {girl} ___ in a vocational course by the end of next week.=will have enrolled>has enrolled+had enrolled<have enrolled',
        'The construction workers we hired ___ that rickety house of ours by next year.=will have refurbished>has refurbished+had refurbished<have refurbished',
        'The {surname} family ___ that large sack of rice two months from now.=will have consumed>has consumed+had consumed<have consumed',
        'The biologist ___ the anatomy of that new bird species by next {day}.=will have examined>has examined+had examined<have examined',
        'The hot rays of the sun ___ those wet clothes on the fence by sunset today.=will have dried>has dried+had dried<have dried',
    ],
    10 => [
        'The famous gymnast ___ some difficult floor exercises a while ago to prepare for her next tournament.=has practiced>had practiced+will have practiced<have practiced',
        'Just an hour earlier, the senate ___ to investigate an anomaly involving certain government officials.=has decided>had decided+will have decided<have decided',
        'The meticulous hobbyist ___ the broken wing of one of his plastic airplane models just moments ago.=has repaired>had repaired+will have repaired<have repaired',
        'The seasoned entomologist ___ two new insect species in that dense rainforest just a moment ago.=has discovered>had discovered+will have discovered<have discovered',
        'The {surname} couple ___ all the requirements for a building permit when the city hall\'s closing bell rang.=had completed>has completed+will have completed<have completed',
        'That cardiologist ___ faint abnormalities in my uncle\'s heartbeat during my uncle\'s checkup last March.=had detected>has detected+will have detected<have detected',
        'That group of patients ___ their deadly illnesses even before the hospital had invested in modern equipment.=had survived>has survived+will have survived<have survived',
        'The rebellious teenager ___ his exasperated father crazy when he was apprehended for driving without a license.=had driven>has driven+will have driven<have driven',
        'Just a little while back, the technicians ___ to the engineer what went wrong with their equipment.=have explained>had explained+will have explained<has explained',
        'The junior officers ___ to the colonel\'s attention the problem with their battle plan just a short while ago.=have brought>had brought+will have brought<has brought',
        'The angry protesters ___ the helpless mayor to come out and listen to their grievances just a moment ago.=have compelled>had compelled+will have compelled<has compelled',
        'The wrong policies adopted by the government very recently ___ their efforts to connect with the masses.=have undermined>had undermined+will have undermined<has undermined',
        'The technology company ___ its earnings for this quarter by the end of the television program they\'re on.=will have announced>has announced+had announced<have announced',
        'The criminal sentenced to life imprisonment yesterday ___ his grievous sins to a priest by the end of this month.=will have confessed>has confessed+had confessed<have confessed',
        'The Commission on Elections ___ that corrupt mayoral candidate from running for office by next weekend.=will have disqualified>has disqualified+had disqualified<have disqualified',
        'The new library clerk ___ that messy filing cabinet by the time her immediate supervisor arrives.=will have decluttered>has decluttered+had decluttered<have decluttered',
    ],
    11 => [
        'The soldier who is being punished by his superiors for his insubordination ___ his fate now.=has accepted>had accepted+will have accepted<have accepted',
        'According to some websites, an irresponsible actor ___ his wife and two children just hours ago.=has deserted>had deserted+will have deserted<have deserted',
        'The billionaire ___ the headquarters of his new company just three hours ago.=has inaugurated>had inaugurated+will have inaugurated<have inaugurated',
        'The young basketball player ___ his dribbling skills a while ago to prepare for his try-out.=has practiced>had practiced+will have practiced<have practiced',
        'Just an hour earlier, the shopkeeper ___ to fire an employee with unacceptable attendance.=has decided>had decided+will have decided<have decided',
        'The welder ___ the broken steel bars of the lions\' cage at the zoo just moments ago.=has repaired>had repaired+will have repaired<have repaired',
        'The physician ___ his internship at that hospital by the time his parents left for America.=had completed>has completed+will have completed<have completed',
        'Mr. {surname} ___ his apprehension to join the rally when he was pulled by his friend into the crowd.=had expressed>has expressed+will have expressed<have expressed',
        'The large lake ___ over when children from all over our town showed up with their ice skates.=had frozen>has frozen+will have frozen<have frozen',
        'The entrepreneurs ___ their beauty products online months before they opened their mall store.=had launched>has launched+will have launched<have launched',
        '{girl} ___ a housing loan from the bank before the agent offered her that house.=had secured>has secured+will have secured<have secured',
        'Those stock brokers ___ our company to investors when they were interviewed on radio last week.=had recommended>has recommended+will have recommended<have recommended',
        'Those batteries ___ just a minute earlier after being plugged into that defective charger.=have exploded>had exploded+will have exploded<has exploded',
        'Just minutes ago, the investigators ___ the corrupt practices of the officials at the bureau.=have exposed>had exposed+will have exposed<has exposed',
        'Those companies ___ bankruptcy just a short while ago to get protection from their creditors.=have declared>had declared+will have declared<has declared',
        'The exhausted climber\'s limbs ___ at this moment because of the extremely cold weather.=have stiffened>had stiffened+will have stiffened<has stiffened',
        'Those art collectors ___ just about now and will no longer purchase our abstract paintings.=have backpedalled>had backpedalled+will have backpedalled<has backpedalled',
        'Their best hardware engineers ___ the root cause of that technical problem just a moment ago.=have pinpointed>had pinpointed+will have pinpointed<has pinpointed',
        'The television writer ___ the script for the show\'s final episode by next {day}.=will have finalized>has finalized+had finalized<have finalized',
        'The ocean divers ___ the plane\'s missing flight recorder by the middle of next week.=will have recovered>has recovered+had recovered<have recovered',
        '{boy} and {girl} ___ another batch of their handicrafts by the end of next month.=will have exported>has exported+had exported<have exported',
        'The hardworking aquaculturist ___ a ton of tilapia by the time his client arrives.=will have harvested>has harvested+had harvested<have harvested',
        'The brilliant specialist ___ the famous celebrity\'s lingering illness by this weekend.=will have diagnosed>has diagnosed+had diagnosed<have diagnosed',
        'The wealthy venture capitalist ___ another start-up company by the end of this quarter.=will have financed>has financed+had financed<have financed',
    ],
    12 => [
        'The new graduate ___ for an engineering job at a prestigious semiconductor company a while ago.=has applied>had applied+will have applied<have applied',
        'Just an hour earlier, the blue ribbon committee ___ to postpone their hearing on that plunder case.=has decided>had decided+will have decided<have decided',
        'The experienced mechanic ___ the automatic transmission system of my car just hours earlier.=has overhauled>had overhauled+will have overhauled<have overhauled',
        'Just a moment ago, the renowned cosmologist ___ another Earth-like planet in the Andromeda Galaxy.=has discovered>had discovered+will have discovered<have discovered',
        'Local doctors ___ three more cases of the new Omicron coronavirus variant after more tests were done.=had detected>has detected+will have detected<have detected',
        'The loan officer ___ the couple\'s housing loan application before she received the recommendation letter.=had disapproved>has disapproved+will have disapproved<have disapproved',
        'The defense lawyer ___ that they will not get a fair trial when he found out who the judge would be.=had surmised>has surmised+will have surmised<have surmised',
        'Those environmentalists ___ a certain portion of that denuded area with mahogany trees just hours ago.=have reforested>had reforested+will have reforested<has reforested',
        'The dishonest tactics currently employed by their negotiators ___ their ability to obtain a better partnership deal.=have undermined>had undermined+will have undermined<has undermined',
        'Just a little while back, several doctors and nurses ___ a medical mission to that isolated province.=have organized>had organized+will have organized<has organized',
        'The company\'s creditors ___ the board of directors to commit to a loan payment scheme just a moment ago.=have compelled>had compelled+will have compelled<has compelled',
        'Their innovative computer programmers ___ the problematic portions of the complex source code by next {day}.=will have rewritten>has rewritten+had rewritten<have rewritten',
        'A competent surgeon from that hospital ___ the benign tumor from his chest by the end of this month.=will have extracted>has extracted+had extracted<have extracted',
        '{boy} and his siblings ___ their father\'s farm lot in Tanay before the second quarter of next year.=will have partitioned>has partitioned+had partitioned<have partitioned',
        'Our furniture factory ___ a hundred pieces of that rocking chair by the time our buyer from abroad arrives.=will have manufactured>has manufactured+had manufactured<have manufactured',
    ],
];

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function gft_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 220): int {
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

function gft_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
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

function gft_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function gft_roll_values(): array {
    global $boyPool, $girlPool, $surnamePool, $dayPool;
    return [
        'boy'     => $boyPool[array_rand($boyPool)],
        'girl'    => $girlPool[array_rand($girlPool)],
        'surname' => $surnamePool[array_rand($surnamePool)],
        'day'     => $dayPool[array_rand($dayPool)],
    ];
}

function gft_parse(string $raw): ?array {
    $eq = strpos($raw, '=');
    if ($eq === false) return null;
    $sentence = substr($raw, 0, $eq);
    $rest = substr($raw, $eq + 1);

    $gt = strpos($rest, '>');
    if ($gt === false) return null;
    $answer = substr($rest, 0, $gt);
    $rest = substr($rest, $gt + 1);

    $plus = strpos($rest, '+');
    if ($plus === false) return null;
    $w1 = substr($rest, 0, $plus);
    $rest = substr($rest, $plus + 1);

    $lt = strpos($rest, '<');
    if ($lt === false) return null;
    $w2 = substr($rest, 0, $lt);
    $w3 = substr($rest, $lt + 1);

    if ($sentence === '' || $answer === '') return null;
    return [
        'sentence' => $sentence,
        'answer'   => $answer,
        'wrong'    => [$w1, $w2, $w3],
    ];
}

function gft_pick_question(array $pool, string $sessionKey, int $poolId): ?array {
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

    $parsed = gft_parse($raw);
    if ($parsed === null) return null;

    $values   = gft_roll_values();
    $sentence = gft_apply_placeholders($parsed['sentence'], $values);
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
    $poolId = resolve_gft_pool($lvl, $grd);
    $pool   = $sentencePools[$poolId] ?? $sentencePools[1];

    $pick = gft_pick_question($pool, $sessionKey, $poolId);
    if ($pick === null) {
        $pick = gft_pick_question($sentencePools[1], $sessionKey, 1);
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
        '___',
        '<strong style="color:#CC0066;">' . $answerEsc . '</strong>',
        htmlspecialchars($cur['sentence'])
    );
    $boxW = gft_compute_width($filledEsc);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php gft_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $filledEsc
    . '</div>'
  , 80, $boxW); ?>
  <input type="submit" name="Submit2" value=" New Question " style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
    $boxW = gft_compute_width($sentenceEsc);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the <span style="color:#CC0066;">simplest correct tense</span> below.
  </div>
  <?php gft_box(
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