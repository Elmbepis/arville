<?php
// english/modules/grammar-progressive-tenses.php
// Grammar: Progressive Tenses — click the verb form that correctly fits the blank.
// 14 sentence pools mapped by (level × grade). Legacy had Easy + Medium; modern
// folds legacy Medium into Hard per handover §3.2.
// 4 choices always in a 2×2 grid; correct answer guaranteed to appear.

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
$moduleTitle = 'Grammar: Progressive Tenses';
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
// Legacy pool selection:
//   Easy:   grd 2&#8594;1, 3&#8594;3, 4&#8594;5, 5&#8594;7, 6&#8594;9, 7/9&#8594;11, 8/10&#8594;13
//   Medium: grd 2&#8594;2, 3&#8594;4, 4&#8594;6, 5&#8594;8, 6&#8594;10, 7/9&#8594;12, 8/10&#8594;14
// Legacy had no pools for grades 0 or 1 — clamp to grade 2 (pool 1/2).
function resolve_gpt_pool(string $lvl, int $grd): int {
    if ($grd < 0) $grd = 0;
    if ($grd > 10) $grd = 10;
    if ($lvl === 'Easy') {
        if ($grd <= 2) return 1;
        if ($grd == 3) return 3;
        if ($grd == 4) return 5;
        if ($grd == 5) return 7;
        if ($grd == 6) return 9;
        if ($grd == 7 || $grd == 9) return 11;
        return 13; // 8 or 10
    }
    // Hard = legacy Medium
    if ($grd <= 2) return 2;
    if ($grd == 3) return 4;
    if ($grd == 4) return 6;
    if ($grd == 5) return 8;
    if ($grd == 6) return 10;
    if ($grd == 7 || $grd == 9) return 12;
    return 14; // 8 or 10
}

// ---- Value pools (§5) ----
$boyPool = ['Alex','Ben','Carlos','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lucas','Luis','Max','Roberto','Samuel','Tomas'];
$girlPool = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];
$surnamePool = ['Cruz','de Guzman','Gomez','Padua','Santos','Reyes','Tolentino','Torres'];
$dayPool = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

// ---- Sentence pools — verbatim from legacy, with one typo fixed ----
// Format: 'sentence=answer>wrong1+wrong2<wrong3'
$sentencePools = [
    1 => [
        '{girl} ___ at his jokes later.=will be laughing>is laughing+are laughing<was laughing',
        'That lady ___ her plants tomorrow.=will be watering>is watering+are watering<was watering',
        'That cat ___ here now.=is resting>will be resting+are resting<was resting',
        'We ___ shirts when David left.=were selling>will be selling+are selling<was selling',
        'Our puppies ___ milk right now.=are drinking>will be drinking+were drinking<was drinking',
        'The boys ___ when the show began.=were singing>will be singing+are singing<was singing',
        'Right now, the women ___ the Bible.=are reading>will be reading+were reading<is reading',
        'My dog ___ there later tonight.=will be sleeping>is sleeping+are sleeping<was sleeping',
        'They ___ hard for that test now.=are studying>will be studying+were studying<is studying',
        'Their priest ___ for him last night.=was praying>will be praying+is praying<were praying',
        'My brother ___ when we arrived.=was running>will be running+is running<were running',
        'Her parents ___ in that store later.=will be working>are working+were working<was working',
        'The girls ___ the kittens when I left.=were feeding>will be feeding+are feeding<was feeding',
        '{girl} ___ her dog when the cars came.=was walking>will be walking+is walking<were walking',
        'The old man ___ his car this minute.=is waxing>will be waxing+are waxing<was waxing',
        'My friends ___ at this moment.=are swimming>will be swimming+were swimming<is swimming',
        'My mother ___ at this time.=is cooking>will be cooking+are cooking<was cooking',
        'He ___ trees there next week.=will be planting>is planting+are planting<was planting',
        'The baker ___ his oven a while ago.=was cleaning>will be cleaning+is cleaning<were cleaning',
        '{girl} ___ cupcakes an hour from now.=will be buying>is buying+are buying<was buying',
        'Mr. {surname} ___ steaks when you called.=was grilling>will be grilling+is grilling<were grilling',
        'The farmers ___ fruits when it rained.=were picking>will be picking+are picking<was picking',
        'The children ___ at the moment.=are dancing>will be dancing+were dancing<is dancing',
        '{boy} ___ at the present time.=is driving>will be driving+are driving<was driving',
    ],
    2 => [
        '{boy} ___ ice cream when he heard the good news.=was eating>will be eating+is eating<were eating',
        'His brothers ___ with him when the lights went out.=were playing>will be playing+are playing<was playing',
        '{girl} and {boy} ___ some rolls when the alarm sounded.=were baking>will be baking+are baking<was baking',
        'The singer ___ a new song at the studio tomorrow.=will be recording>is recording+are recording<was recording',
        'The drivers ___ in that garage when it started to rain.=were parking>will be parking+are parking<was parking',
        'His daughter ___ that TV show at this very moment.=is watching>will be watching+are watching<was watching',
        '{girl} and her best friend ___ on their dresses right now.=are trying>will be trying+were trying<is trying',
        'The gardeners ___ the plants when the train passed by.=were potting>will be potting+are potting<was potting',
        'The barber ___ my hair when my tooth started to ache.=was trimming>will be trimming+is trimming<were trimming',
        'Right now, the lioness ___ her cubs how to hunt.=is teaching>will be teaching+are teaching<was teaching',
        '{girl} and {boy} ___ some shoes when the doorbell rang.=were polishing>will be polishing+are polishing<was polishing',
        'Our neighbors ___ a party in their yard at the present time.=are hosting>will be hosting+were hosting<is hosting',
        'The old tailor ___ my pants right this very minute.=is sewing>will be sewing+are sewing<was sewing',
        'The carpenter ___ our door when his hammer broke.=was fixing>will be fixing+is fixing<were fixing',
        'At this moment, I ___ a book about cats and dogs.=am writing>will be writing+is writing<are writing',
    ],
    3 => [
        '{girl} ___ her new teacher later.=will be meeting>is meeting+are meeting<was meeting',
        'The gardener ___ the lawn tomorrow.=will be watering>is watering+are watering<was watering',
        'My uncle ___ on the bench now.=is resting>will be resting+are resting<was resting',
        'My friends ___ shirts when the earthquake happened.=were selling>will be selling+are selling<was selling',
        'The cows ___ from that river right now.=are drinking>will be drinking+were drinking<was drinking',
        'The singers ___ when the spotlight went on.=were performing>will be performing+are performing<was performing',
        'Right now, the worshippers ___ the Bible.=are reading>will be reading+were reading<is reading',
        'The security guard ___ there later tonight.=will be staying>is staying+are staying<was staying',
        'The children ___ hard for that quiz now.=are studying>will be studying+were studying<is studying',
        'Last night, his mother ___ for his success.=was praying>will be praying+is praying<were praying',
        'The athlete ___ when his coach arrived.=was running>will be running+is running<were running',
        'Our employees ___ on that project later.=will be working>are working+were working<was working',
        '{boy} and {girl} ___ the chicks when I left.=were feeding>will be feeding+are feeding<was feeding',
        '{boy} ___ his poodle here two hours ago.=was walking>will be walking+is walking<were walking',
        'The mechanic ___ my car this minute.=is fixing>will be fixing+are fixing<was fixing',
        'I ___ to the radio at this moment.=am listening>will be listening+was listening<is listening',
        'The chef ___ adobo at this time.=is cooking>will be cooking+are cooking<was cooking',
        'He ___ shrubs and herbs here next {day}.=will be planting>is planting+are planting<was planting',
        'The cook ___ his pots and pans a while ago.=was cleaning>will be cleaning+is cleaning<were cleaning',
        '{girl} ___ more pasta an hour from now.=will be buying>is buying+are buying<was buying',
        'Mr. {surname} ___ tuna slices when I called.=was grilling>will be grilling+is grilling<were grilling',
        'The women ___ mangoes when it rained.=were picking>will be picking+are picking<was picking',
        'The policemen ___ at the moment.=are patrolling>will be patrolling+were patrolling<is patrolling',
        'The mayor ___ at the present time.=is campaigning>will be campaigning+are campaigning<was campaigning',
    ],
    4 => [
        'The enemy\'s spies ___ behind those thick bushes right now.=are hiding>will be hiding+were hiding<is hiding',
        '{boy} ___ a hamburger when he heard the loud music.=was eating>will be eating+is eating<were eating',
        'The music lovers ___ an old song when the lights went out.=were playing>will be playing+are playing<was playing',
        '{girl} and {boy} ___ a pie when their oven stopped working.=were baking>will be baking+are baking<was baking',
        'The band ___ their latest song at the studio next {day}.=will be recording>is recording+are recording<was recording',
        'The carpenter ___ our door when he hit his finger with a hammer.=was repairing>will be repairing+is repairing<were repairing',
        '{boy} and his friend ___ their car when they saw the comet.=were parking>will be parking+are parking<was parking',
        'His student ___ a science video at this very moment.=is watching>will be watching+are watching<was watching',
        '{boy} and his best friend ___ on some leather boots right now.=are trying>will be trying+were trying<is trying',
        'His barber ___ his hair when his friends came in.=was trimming>will be trimming+is trimming<were trimming',
        'Right now, the magician ___ his assistant a new trick.=is teaching>will be teaching+are teaching<was teaching',
        'The pupils ___ at the fishes when they saw a snake.=were staring>will be staring+are staring<was staring',
        'The helpers ___ the floor when {boy} spilled his milk.=were polishing>will be polishing+are polishing<was polishing',
        'The restaurant owners ___ a pig at the present time.=are roasting>will be roasting+were roasting<is roasting',
        'The dentist ___ his teeth right this very minute.=is checking>will be checking+are checking<was checking',
        'At this moment, I ___ a story about dwarfs and dragons.=am writing>will be writing+is writing<are writing',
    ],
    5 => [
        'Our neighbor ___ his two dogs when we heard a siren.=was walking>will be walking+is walking<were walking',
        'The lionesses ___ behind those tall grasses right now.=are hiding>will be hiding+were hiding<is hiding',
        'This very minute, the news reporter ___ the famous movie star.=is interviewing>will be interviewing+are interviewing<was interviewing',
        '{girl} ___ an ice cream cone when she saw a dog chasing a cat.=was eating>will be eating+is eating<were eating',
        'The former chess champions ___ against each other here last night.=were playing>will be playing+are playing<was playing',
        '{girl} and {boy} ___ a chicken when their stove stopped working.=were frying>will be frying+are frying<was frying',
        'The scientists ___ a video of the anticipated eclipse next {day}.=will be recording>is recording+are recording<was recording',
        'Mr. {surname} ___ their window when he wounded his hand with a chisel.=was repairing>will be repairing+is repairing<were repairing',
        'The garbage collectors ___ a trash bin when a car hit their truck.=were unloading>will be unloading+are unloading<was unloading',
        '{girl} ___ her friend perform in a play at this very moment.=is watching>will be watching+are watching<was watching',
        'The television actors ___ on some funny costumes right now.=are trying>will be trying+were trying<is trying',
        'The veterinarian ___ his dog\'s nails when his cat started meowing.=was trimming>will be trimming+is trimming<were trimming',
        'Right now, the stuntman ___ the action star how to use a sword.=is teaching>will be teaching+are teaching<was teaching',
        'The choir members ___ their new song on that stage just a week ago.=were rehearsing>will be rehearsing+are rehearsing<was rehearsing',
        'The jewelers ___ the precious gems when the robbers broke in.=were polishing>will be polishing+are polishing<was polishing',
        'The famous boxers ___ in a press conference at the present time.=are participating>will be participating+were participating<is participating',
        'The doctor ___ his sprained ankle right this very minute.=is checking>will be checking+are checking<was checking',
        'The mechanics ___ my cars\' tires within an hour.=will be changing>is changing+are changing<was changing',
        'My piano teacher ___ me new techniques after today.=will be showing>is showing+are showing<was showing',
        'The city councilors ___ a new ordinance at this moment.=are discussing>will be discussing+were discussing<is discussing',
        'At the present moment, the fisherman ___ his catch for the day.=is weighing>will be weighing+are weighing<was weighing',
        'My childhood friends and I ___ again in the near future.=will be meeting>is meeting+are meeting<was meeting',
        '{boy} and I ___ those packages at this exact time tomorrow.=will be sealing>are sealing+am sealing<were sealing',
        'That popular athlete ___ autographs at our gym yesterday.=was signing>will be signing+is signing<were signing',
    ],
    6 => [
        'The zoo visitors ___ at the baby panda when they heard a tiger roaring.=were staring>will be staring+are staring<was staring',
        'At this very moment, I ___ a few dance steps for my performance next week.=am practicing>will be practicing+is practicing<are practicing',
        'Their neighbor ___ to be a policeman when a real police officer showed up.=was pretending>will be pretending+is pretending<were pretending',
        'The scientists ___ the results of their experiment at this very moment.=are recording>will be recording+were recording<is recording',
        'At the present moment, the male lion ___ its territory to keep intruders away.=is guarding>will be guarding+are guarding<was guarding',
        'The hardworking firemen ___ out a huge fire in our community right now.=are putting>will be putting+were putting<is putting',
        'Our messenger ___ a large package to your office about two hours from now.=will be delivering>is delivering+are delivering<was delivering',
        'Presently, the leaders of the two warring countries ___ each other.=are ignoring>will be ignoring+were ignoring<is ignoring',
        'By this time tomorrow, my friends ___ the new video games I sent them.=will be enjoying>is enjoying+are enjoying<were enjoying',
        'Those lean trees ___ a couple of days ago because of very strong winds.=were swaying>will be swaying+are swaying<was swaying',
        'The woodsmen ___ down those pine trees when the Christmas season begins.=will be chopping>is chopping+are chopping<were chopping',
        'Mr. {surname} ___ a white silk suit when he boarded that plane to London.=was donning>will be donning+is donning<were donning',
        'Right this minute, those diggers ___ the remains of an adult woolly mammoth.=are excavating>will be excavating+were excavating<is excavating',
        'The scuba diver ___ an underwater cave when he found the sunken pirate ship.=was exploring>will be exploring+is exploring<were exploring',
        'Exactly two weeks ago, the two businessmen ___ their first store at that mall.=were launching>will be launching+are launching<was launching',
    ],
    7 => [
        'The dog groomer ___ my poodle when the cat escaped from its cage.=was shampooing>will be shampooing+is shampooing<were shampooing',
        'The killer whales ___ those clueless fur seals right this minute.=are stalking>will be stalking+were stalking<is stalking',
        'Right now, the news editor ___ the notorious politician from our province.=is interviewing>will be interviewing+are interviewing<was interviewing',
        'The museum visitors ___ at that eerie painting when they heard a creepy sound.=were staring>will be staring+are staring<was staring',
        'Mrs. {surname} and her daughter ___ some fish when the power outage happened.=were frying>will be frying+are frying<was frying',
        'The zoologists ___ the daily life of some predators in Africa starting next {day}.=will be recording>is recording+are recording<was recording',
        'Mr. {surname} ___ their wooden fence when a large post fell and injured his foot.=was repairing>will be repairing+is repairing<were repairing',
        'The pier workers ___ a shipping container when some of them fell into the water.=were unloading>will be unloading+are unloading<was unloading',
        '{girl} ___ her cousin perform a magic show in the park at this very moment.=is watching>will be watching+are watching<was watching',
        'The choir members ___ their new song in that theater two days ago.=were harmonizing>will be harmonizing+are harmonizing<was harmonizing',
        'At this very moment, the television actors ___ the lines of the script.=are rehearsing>will be rehearsing+were rehearsing<is rehearsing',
        'The veterinarian ___ the macaw when an African lovebird flew into the room.=was examining>will be examining+is examining<were examining',
        'Right now, the stunt director ___ the actress how to jump off a truck safely.=is instructing>will be instructing+are instructing<was instructing',
        'The gemologists ___ the diamonds when the burglar alarm suddenly sounded.=were polishing>will be polishing+are polishing<was polishing',
        'The two television stations ___ a joint press conference at the present time.=are conducting>will be conducting+were conducting<is conducting',
        'The surgeon ___ the progress of his recovery right this very minute.=is evaluating>will be evaluating+are evaluating<was evaluating',
        '{boy} and his assistant ___ up the car\'s engine later this afternoon.=will be tuning>is tuning+are tuning<was tuning',
        'Our taekwondo instructor ___ new teaching techniques starting next {day}.=will be using>is using+are using<was using',
        'The government officials ___ the impact of the calamity at this moment.=are analyzing>will be analyzing+were analyzing<is analyzing',
        'At the present moment, the social worker ___ relief goods to the flood victims.=is distributing>will be distributing+are distributing<was distributing',
        'By the time I graduate, my eldest brother ___ his own catering business.=will be managing>is managing+are managing<was managing',
        '{boy} and I ___ our findings to our boss at this exact time tomorrow.=will be presenting>are presenting+am presenting<were presenting',
        'Just a week ago, that comedian ___ the children at the orphanage.=was entertaining>will be entertaining+is entertaining<were entertaining',
        'Several spider monkeys ___ in that large tree several days ago.=were swinging>will be swinging+are swinging<was swinging',
    ],
    8 => [
        '{girl} ___ a cup of hot noodle soup when {boy} accidentally spilled some cold water on her.=was sipping>will be sipping+is sipping<were sipping',
        'I ___ my archery skills at this very moment for the international competition next month.=am practicing>will be practicing+is practicing<are practicing',
        'Their neighbor ___ a concrete fence when a lightning struck a nearby tree.=was erecting>will be erecting+is erecting<were erecting',
        'At this very moment, the oceanographers ___ the various sounds being made by different whale species.=are recording>will be recording+were recording<is recording',
        'At the present moment, the female cheetah ___ the area where its cubs are sleeping.=is guarding>will be guarding+are guarding<was guarding',
        'The mailman ___ a huge parcel of documents to your house within the next three hours.=will be delivering>is delivering+are delivering<was delivering',
        'Several construction workers ___ a small chapel in our community right now.=are building>will be building+were building<is building',
        '{girl} and {boy} ___ the old church with colorful peony and dahlia flowers at this moment.=are decorating>will be decorating+were decorating<is decorating',
        'Mr. {surname} ___ concert tickets for his family when the fire at the mall broke out.=was purchasing>will be purchasing+is purchasing<were purchasing',
        'Presently, I ___ the technical papers submitted to me by my engineering students.=am reviewing>will be reviewing+is reviewing<are reviewing',
        'About thirty hours from now, my siblings ___ the assorted magazines I sent them.=will be enjoying>is enjoying+are enjoying<were enjoying',
        'Those two former boxing champions ___ it out on television just a few nights ago.=were slugging>will be slugging+are slugging<was slugging',
        'Our company\'s miners ___ iron ore from that mine as soon as we finalize the contract.=will be extracting>is extracting+are extracting<were extracting',
        'Right this minute, those paleontologists ___ fossils of two different dinosaur species.=are excavating>will be excavating+were excavating<is excavating',
        'The mountain climber ___ an underground cave when he found that antique chest of treasures.=was exploring>will be exploring+is exploring<were exploring',
        'Exactly five days ago, the two cardiologists ___ on a patient with a rare heart illness.=were operating>will be operating+are operating<was operating',
    ],
    9 => [
        'The veterinarian ___ surgery on my dog when another customer with a sick dog walked in.=was performing>will be performing+is performing<were performing',
        'Seven great white sharks ___ those clueless divers right this very minute.=are stalking>will be stalking+were stalking<is stalking',
        'Right now, the magazine editor ___ the popular governor who just won by a landslide.=is interviewing>will be interviewing+are interviewing<was interviewing',
        '{girl} and I ___ at a Van Gogh painting when a new batch of tourists arrived.=were staring>will be staring+are staring<was staring',
        'Mrs. {surname} and her cook ___ breaded chicken wings when the stove ran out of fuel.=were frying>will be frying+are frying<was frying',
        'Those marine biologists ___ videos of rare dolphin and porpoise species next week.=will be recording>is recording+are recording<was recording',
        'Mr. {surname} ___ their steel gate when a pointed rod of metal wounded his thigh.=was repairing>will be repairing+is repairing<were repairing',
        'The port\'s laborers ___ wooden crates of meat products when the crane\'s hoist broke.=were unloading>will be unloading+are unloading<was unloading',
        'Our science teacher ___ modern gadget-based teaching techniques starting next {day}.=will be employing>is employing+are employing<was employing',
        'The government scientists ___ the overall impact of climate change at this moment.=are analyzing>will be analyzing+were analyzing<is analyzing',
        'At this moment, {girl} ___ the delivery of the products that she ordered online.=is expecting>will be expecting+are expecting<was expecting',
        'This very minute, the movie stuntmen ___ the fight scenes that will be shot later.=are rehearsing>will be rehearsing+were rehearsing<is rehearsing',
        'The bakers or the chef ___ their wedding cake with white and gold icing at this point in time.=is embellishing>will be embellishing+are embellishing<was embellishing',
        'Presently, the two media companies ___ a public rescreening of some classic Filipino movies.=are sponsoring>will be sponsoring+were sponsoring<is sponsoring',
        'The seasoned psychiatrist ___ the state of the patient\'s mind right this very minute.=is evaluating>will be evaluating+are evaluating<was evaluating',
        '{boy} and his mechanic ___ another electric vehicle later this afternoon.=will be assembling>is assembling+are assembling<was assembling',
        'At the present moment, the social media influencer ___ her review of a new smartphone.=is streaming>will be streaming+are streaming<was streaming',
        'By the time I finish school, my youngest brother ___ architecture in this university.=will be studying>is studying+are studying<was studying',
        'Dr. {surname} ___ the new vaccine to children at this time next {day}.=will be administering>is administering+are administering<was administering',
        'Just a week ago, our primary investor ___ the thought of infusing more money.=was entertaining>will be entertaining+is entertaining<were entertaining',
        'The landscape artists that we hired ___ those leafy shrubs a few hours ago.=were pruning>will be pruning+are pruning<was pruning',
        'The elegant scarlet macaws ___ their colorful feathers at this exact moment.=are preening>will be preening+were preening<is preening',
        'The electrician ___ the bulb of the truck\'s headlight when the driver arrived.=was replacing>will be replacing+is replacing<were replacing',
        'The carpenter, along with his assistant, ___ this wooden cabinet three days ago.=was varnishing>will be varnishing+is varnishing<were varnishing',
    ],
    10 => [
        'I ___ my guitar playing skills at this very moment to prepare for our concert next month.=am practicing>will be practicing+is practicing<are practicing',
        'At this moment, two television crews ___ how the typhoon is wreaking havoc in our province.=are recording>will be recording+were recording<is recording',
        'Their company ___ a cellphone tower in that lot next month to improve their internet service.=will be erecting>was erecting+is erecting<were erecting',
        'At the present moment, a security guard ___ the entrance to our compound to keep out burglars.=is guarding>will be guarding+are guarding<was guarding',
        'The carpenters that we hired yesterday ___ a large barn in our farm lot right now.=are constructing>will be constructing+were constructing<is constructing',
        'That delivery truck ___ this shipment of electronic products to our client within the next couple of hours.=will be transporting>is transporting+are transporting<was transporting',
        'Our architect or his interior designer ___ the building\'s lobby with artificial plants at this moment.=is decorating>will be decorating+was decorating<are decorating',
        'The store manager ___ clothing products online when he suddenly lost access to the internet.=was sourcing>will be sourcing+is sourcing<were sourcing',
        'Presently, I ___ the possibility of retiring early to set up my own contracting business.=am contemplating>will be contemplating+is contemplating<are contemplating',
        'About four hours from now, my clients ___ the important business documents that I just sent them.=will be perusing>is perusing+are perusing<were perusing',
        'Just two days ago, conservationists ___ a few birds that they raised in captivity into that dense forest.=were releasing>will be releasing+are releasing<was releasing',
        'Our company\'s geologists ___ minerals from that mountain as soon as the necessary equipment is put in place.=will be extracting>is extracting+are extracting<were extracting',
        'Right this minute, those pest control workers ___ disease-carrying insects that have infested that building.=are exterminating>will be exterminating+were exterminating<is exterminating',
        'The spelunker ___ that mysterious cave when he was suddenly attacked by wolf-like creatures.=was exploring>will be exploring+is exploring<were exploring',
        'Exactly five days ago, the two investigators ___ together all the pieces of evidence recovered from the crime scene.=were scrutinizing>will be scrutinizing+are scrutinizing<was scrutinizing',
    ],
    11 => [
        'The resident doctor ___ surgery on my foot when another patient with a broken arm walked in.=was performing>will be performing+is performing<were performing',
        'Right now, the news anchor ___ the unpopular governor who has been accused of corruption.=is interviewing>will be interviewing+are interviewing<was interviewing',
        'The rock music enthusiasts ___ at an antique guitar once used by the Beatles when the fire alarm sounded.=were gawking>will be gawking+are gawking<was gawking',
        'Mrs. {surname} and her cook ___ some chicken meat and vegetables when the kitchen telephone rang.=were sauteing>will be sauteing+are sauteing<was sauteing',
        'Those astrophysicists ___ videos of what they believe are black holes next week.=will be recording>is recording+are recording<was recording',
        'Mr. {surname} ___ the sink in one of their bathrooms when he dropped a wrench on his toe.=was repairing>will be repairing+is repairing<were repairing',
        'The crane operator ___ a freight container when a platform nearby collapsed.=was hoisting>will be hoisting+is hoisting<were hoisting',
        'All of our instructors ___ a unique computer-based teaching approach starting next {day}.=will be employing>were employing+are employing<was employing',
        'Hundreds of climatologists from around the world ___ the overall impact of glacial melting at this moment.=are assessing>will be assessing+were assessing<is assessing',
        'At this moment, the engineer ___ the results of the experiment that they completed two days before.=is analyzing>will be analyzing+are analyzing<was analyzing',
        'This very minute, {boy} or {girl} ___ their youngest brother in a special computer course.=is enrolling>will be enrolling+are enrolling<was enrolling',
        'Mrs. {surname} or her clerks ___ their work schedule at this point in time.=are reorganizing>will be reorganizing+are reorganizing<was reorganizing',
        'Presently, the two beverage companies ___ an information campaign on consumer safety.=are sponsoring>will be sponsoring+were sponsoring<is sponsoring',
        'The project engineer ___ their new welding equipment right this very minute.=is evaluating>will be evaluating+are evaluating<was evaluating',
        '{boy} or his mechanic ___ the battery of that electric vehicle just three hours ago.=was recharging>are recharging+is recharging<were recharging',
        'At the present moment, the website developer or his supervisor ___ the company\'s new website.=is deploying>will be deploying+are deploying<was deploying',
        'By the year 2050, sophisticated robots with artificial intelligence ___ like real humans.=will be behaving>is behaving+are behaving<was behaving',
        'Dr. {surname} or his nurse ___ the new vaccine to senior citizens at this time last {day}.=was administering>is administering+are administering<were administering',
        'I ___ my karate skills at this very moment to prepare for the tournament next {day}.=am honing>will be honing+is honing<are honing',
        'The street artists that we hired ___ those kinetic sculptures just four hours ago.=were installing>will be installing+are installing<was installing',
        'Right this moment, Mr. {surname} ___ the shrewd investors with his boring monologue.=is alienating>will be alienating+are alienating<was alienating',
        'Currently, the local government officials ___ a livelihood project for our village.=are conceptualizing>will be conceptualizing+were conceptualizing<is conceptualizing',
        'Sometime soon, our mayor ___ a suspension bridge that was designed by my own uncle.=will be inaugurating>were inaugurating+are inaugurating<was inaugurating',
        'The architect or the contractor ___ the renovation of this business lounge two weeks ago.=was supervising>is supervising+are supervising<were supervising',
    ],
    12 => [
        'Just a week ago, our general manager, as well as my supervisor, ___ the thought of hiring ten more employees.=was entertaining>will be entertaining+is entertaining<were entertaining',
        'At this moment, two giant media outlets ___ the ongoing debate on climate change between scientists and politicians.=are broadcasting>will be broadcasting+were broadcasting<is broadcasting',
        'Their construction company ___ all the rooms of that hotel starting next week to boost the hotel\'s occupancy rate.=will be renovating>was renovating+is renovating<were renovating',
        'At the present moment, his father or his brother ___ his youngest sister to and from school to make sure she\'s safe.=is chauffeuring>will be chauffeuring+are chauffeuring<was chauffeuring',
        'The product promoters that we hired yesterday ___ a large quantity of brochures and flyers right now.=are distributing>will be distributing+were distributing<is distributing',
        'The human resource manager ___ a bunch of job applications when a rowdy stranger entered her room.=was processing>will be processing+is processing<were processing',
        'Our own cargo plane ___ your company\'s valuable assets next week to ensure they won\'t get lost.=will be transporting>is transporting+are transporting<was transporting',
        'Our daughter or her best friend in college ___ the windows of our vacation house with capiz shells at this moment.=is decorating>will be decorating+was decorating<are decorating',
        'The purchasing manager ___ mobile gadget accessories online when her overworked desktop computer crashed.=was sourcing>will be sourcing+is sourcing<were sourcing',
        'Presently, I ___ the notion that simply being happy is much better than being wealthy or successful.=am contemplating>will be contemplating+is contemplating<are contemplating',
        'The singer and the comedienne ___ with the enchanted audience when their microphones stopped working.=were interacting>will be interacting+are interacting<was interacting',
        'The courageous law enforcers ___ a famous fugitive when some armed men suddenly appeared and intervened.=were apprehending>will be apprehending+are apprehending<was apprehending',
        'The hardworking botanists ___ exotic perfume oils from that rare plant several hours from now.=will be extracting>is extracting+are extracting<were extracting',
        'Right this minute, the carpenter or the upholsterer ___ the antique tufted futon in our living room.=is refurbishing>will be refurbishing+was refurbishing<are refurbishing',
        'The spelunker ___ down the underground tunnel when he lost his grip and fell into the water.=was descending>will be descending+is descending<were descending',
    ],
    13 => [
        'Just a week ago, the talented singer, along with a funny comedian, ___ the typhoon victims in our town.=was entertaining>will be entertaining+is entertaining<were entertaining',
        'Right now, the tabloid writer ___ the famous psychic who once correctly predicted a volcanic eruption.=is interviewing>will be interviewing+are interviewing<was interviewing',
        'The museum curator and his assistant ___ a lunar rock specimen when the lights went out.=were scrutinizing>will be scrutinizing+are scrutinizing<was scrutinizing',
        'Mrs. {surname} and her gardener ___ some repotted plants when their vehicle suffered a flat tire.=were transporting>will be transporting+are transporting<was transporting',
        'Those seismologists ___ every single tremor in this place starting an hour from now.=will be recording>is recording+are recording<was recording',
        'Mr. {surname} ___ a faucet handle in one of their bathrooms when he slipped and hurt his knee.=was tightening>will be tightening+is tightening<were tightening',
        'Presently, hundreds of biologists from around the world ___ the overall impact of global warming on species extinction.=are assessing>will be assessing+were assessing<is assessing',
        'At this moment, a team of experts ___ the results of the national elections held two days earlier.=is validating>will be validating+are validating<was validating',
        'This very minute, {boy} or {girl} ___ in an online conference on social media marketing.=is participating>will be participating+are participating<was participating',
        'Mrs. {surname} or her secretary ___ the requirements for a building permit at this time yesterday.=was submitting>will be submitting+is submitting<were submitting',
        'At the present time, those two software companies ___ their joint venture in telecommunications.=are launching>will be launching+were launching<is launching',
        'The hiring supervisor ___ the aptitude test results of the applicants a couple of hours ago.=was evaluating>will be evaluating+were evaluating<is evaluating',
        '{boy} or his technician ___ the motor of that electric motorcycle about three hours ago.=was rewinding>are rewinding+is rewinding<were rewinding',
        'At the present moment, the software developer or his manager ___ the company\'s new mobile application.=is debugging>will be debugging+are debugging<was debugging',
        'The electricians that the barangay captain hired ___ those solar panels earlier this morning.=were installing>will be installing+are installing<was installing',
        'Dr. {surname} or his nurse ___ the new medicine into those patients at this time last {day}.=was injecting>is injecting+are injecting<were injecting',
        '{boy} ___ his badminton skills at this very moment to prepare for his match later this week.=is honing>will be honing+was honing<are honing',
        'Right this moment, Dr. {surname} ___ his medical students with his boring lecture and grumpy mood.=is alienating>will be alienating+are alienating<was alienating',
        'Currently, the young engineers ___ a unique design for a solar-powered electric vehicle.=are conceptualizing>will be conceptualizing+were conceptualizing<is conceptualizing',
        'Sometime soon, our mayor ___ a public market that\'s expected to boost the local economy.=will be inaugurating>were inaugurating+are inaugurating<was inaugurating',
        'The architect or the contractor ___ that old building\'s rehabilitation three months ago.=was supervising>is supervising+are supervising<were supervising',
        'Presently, I ___ the possibility of using my life savings to set up my own restaurant business.=am considering>will be considering+is considering<are considering',
        'Their automotive shop ___ our vintage sports car starting next month to increase its value.=will be restoring>was restoring+is restoring<were restoring',
        'Three days ago, that businessman and his partner ___ some capitalists to fund their new company.=were persuading>will be persuading+are persuading<was persuading',
    ],
    14 => [
        'By the time I turn 80, mini space shuttles that can autopilot themselves ___ humans to and from the moon.=will be transporting>is transporting+are transporting<was transporting',
        'The paramedic ___ cardiopulmonary resuscitation on a patient when his attention was caught by a fire victim.=was performing>will be performing+is performing<were performing',
        'That new hydroelectric power plant ___ more than enough energy for the entire community once it starts operating.=will be generating>were generating+are generating<was generating',
        'At this moment, the country\'s top two restaurant companies ___ their advertising campaigns to gain more market share.=are intensifying>will be intensifying+were intensifying<is intensifying',
        'The inspirational speaker, along with his daughter, ___ a seminar right now that aims to promote social responsibility.=is conducting>will be conducting+are conducting<was conducting',
        'The online sellers that we hired yesterday ___ our profits for now through their innovative persuasion skills.=are maximizing>will be maximizing+were maximizing<is maximizing',
        'The human resource supervisor ___ the resumes of their new employees when an earthquake knocked down her bookshelves.=was collating>will be collating+is collating<were collating',
        'The national government ___ the economy at the present time by embarking on a massive infrastructure building program.=is stimulating>will be stimulating+are stimulating<was stimulating',
        'My son and his best friend in high school ___ the front grill of my car right now to make it look more stylish.=are modifying>will be modifying+were modifying<is modifying',
        'The purchasing manager ___ the internet for new products to sell when her outdated laptop computer crashed.=was scouring>will be scouring+is scouring<were scouring',
        'Currently, I ___ a concrete plan to fully pay off my debts and finally achieve absolute financial freedom.=am devising>will be devising+is devising<are devising',
        'The life coach and the pastor ___ rapport with their dazzled audience when something accidentally triggered the fire alarm.=were establishing>will be establishing+are establishing<was establishing',
        'The highly respected colonel and his subordinates ___ that notorious fugitive in Cavite within the next four hours.=will be apprehending>were apprehending+are apprehending<was apprehending',
        'The innovative botanist, as well as her colleague, ___ edible oils from that unique ornamental plant several hours ago.=was extracting>will be extracting+are extracting<is extracting',
        'Right this minute, the mechanic or the machinist ___ the front suspension system of my dilapidated car.=is reassembling>will be reassembling+was reassembling<are reassembling',
        'The military trainee ___ down the steep ravine when he lost his grip and fell into the muddy river.=was rappelling>will be rappelling+is rappelling<were rappelling',
    ],
];

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function gpt_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 220): int {
    $charPx          = 11; // Arial 17pt &#8776; 11px/char
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

function gpt_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
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

function gpt_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function gpt_roll_values(): array {
    global $boyPool, $girlPool, $surnamePool, $dayPool;
    return [
        'boy'     => $boyPool[array_rand($boyPool)],
        'girl'    => $girlPool[array_rand($girlPool)],
        'surname' => $surnamePool[array_rand($surnamePool)],
        'day'     => $dayPool[array_rand($dayPool)],
    ];
}

// ---- Parse: 'sentence=answer>w1+w2<w3' ----
function gpt_parse(string $raw): ?array {
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

function gpt_pick_question(array $pool, string $sessionKey, int $poolId): ?array {
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

    $parsed = gpt_parse($raw);
    if ($parsed === null) return null;

    $values   = gpt_roll_values();
    $sentence = gpt_apply_placeholders($parsed['sentence'], $values);
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
    $poolId = resolve_gpt_pool($lvl, $grd);
    $pool   = $sentencePools[$poolId] ?? $sentencePools[1];

    $pick = gpt_pick_question($pool, $sessionKey, $poolId);
    if ($pick === null) {
        $pick = gpt_pick_question($sentencePools[1], $sessionKey, 1);
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
    $boxW = gpt_compute_width($filledEsc);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php gpt_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $filledEsc
    . '</div>'
  , 80, $boxW); ?>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
    $boxW = gpt_compute_width($sentenceEsc);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the <span style="color:#CC0066;">simplest correct tense</span> below.
  </div>
  <?php gpt_box(
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
  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
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