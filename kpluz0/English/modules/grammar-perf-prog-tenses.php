<?php
// english/modules/grammar-perf-prog-tenses.php
// Grammar: Perfect Progressive Tenses — click the verb form that correctly
// fits the blank. 10 sentence pools mapped by (grade × level).
//
// Legacy Easy + Medium folded into modern Easy / Hard (§5.3 Medium&#8594;Hard).
// Legacy Hard was forced to Medium at file top (dead path), so modern Hard
// = legacy Medium content.
//
// Grade mapping (legacy had no pools below grade 4 &#8594; clamp up to 4):
//   grd 4        &#8594; "4_*"
//   grd 5        &#8594; "5_*"
//   grd 6        &#8594; "6_*"
//   grd 7 or 9   &#8594; "7_9_*"
//   grd 8 or 10  &#8594; "8_10_*"
//   (* = Easy or Hard)
//
// Placeholders: {boy}, {girl}, {surname}, {day}, {month} — freshly rolled
// per question from the same pools legacy used (names, surnames, days,
// months).
//
// Data fixes (§5.4):
//   • grd 4 Easy item 24 — "for a year already.==" (double =) &#8594; single =
//   • grd 5 Easy item 24 — "for a year already.==" (double =) &#8594; single =
//   • grd 8/10 Hard — 8 instances of "____" (four underscores) &#8594; "___" (three)
//   • grd 4 Hard item 10 — extra space "stars  ___" &#8594; "stars ___"
//   • grd 4 Easy item 6 — "My little brother ___ for his lost toy since yesterday." preserved
//   • grd 8/10 Hard item 3 — "governor ____ zero-interest loans" &#8594; "___" (three underscores)
//
// Correct answer is guaranteed to appear exactly once per question — the
// distractor list is de-duped against the correct form. If the pick
// resolver fails (malformed entry), falls back to the first entry of the
// first pool.
//
// $grd defensive default (§11): $_SESSION['grade'] / user_grade fallback.
//
// Theme: ex-23-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'grammar-perf-prog-tenses.php'

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
$moduleTitle = 'Grammar: Perfect Progressive Tenses';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Pool resolver (§4) ----
function resolve_gpp_pool(string $lvl, int $grd): string {
    if ($grd < 4) $grd = 4;
    if ($grd > 10) $grd = 10;
    if ($grd == 7 || $grd == 9)      $gradeKey = '7_9';
    elseif ($grd == 8 || $grd == 10) $gradeKey = '8_10';
    else                             $gradeKey = (string)$grd;
    return $gradeKey . '_' . $lvl;
}

// ---- Value pools ----
$boyPool     = ['Alex','Ben','Carlos','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lucas','Luis','Max','Roberto','Samuel','Tomas'];
$girlPool    = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];
$surnamePool = ['Cruz','de Guzman','Gomez','Padua','Santos','Reyes','Tolentino','Torres'];
$dayPool     = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
$monthPool   = ['January','February','March','April','May','June','July','August','September','October','November','December'];

// ---- Sentence pools — format: 'sentence=answer>wrong1+wrong2<wrong3' ----
$sentencePools = [
    '4_Easy' => [
        'Mr. {surname} ___ me that question for the past six weeks.=has been asking>have been asking+had been asking<will have been asking',
        'The heir ___ his money since the start of this year.=has been spending>have been spending+had been spending<will have been spending',
        'The artist ___ portraits for the last three years.=has been painting>have been painting+had been painting<will have been painting',
        'The street vendor ___ those umbrellas since this morning.=has been peddling>have been peddling+had been peddling<will have been peddling',
        'Mrs. {surname} ___ science for the past two months.=has been teaching>have been teaching+had been teaching<will have been teaching',
        'My little brother ___ for his lost toy since yesterday.=has been looking>have been looking+had been looking<will have been looking',
        'The carpenters ___ that house for months before it was completed.=had been building>has been building+have been building<will have been building',
        'The car ___ strange noises for many weeks until it was fixed.=had been making>has been making+have been making<will have been making',
        'She ___ that book for months until she grew tired of it.=had been reading>has been reading+have been reading<will have been reading',
        'My cousins ___ in that lake for years until they sold their boat.=had been fishing>has been fishing+have been fishing<will have been fishing',
        'Two owls ___ in that tree for a year before they left for good.=had been staying>has been staying+have been staying<will have been staying',
        'That ship ___ in those rough seas for months before it sank.=had been sailing>has been sailing+have been sailing<will have been sailing',
        'The workers ___ for higher wages for months now.=have been requesting>has been requesting+had been requesting<will have been requesting',
        'Their pets ___ in that cage for several years now.=have been living>has been living+had been living<will have been living',
        'Those farmers ___ rice these past three weeks.=have been planting>has been planting+had been planting<will have been planting',
        '{boy} and {girl} ___ that television series since last {month}.=have been watching>has been watching+had been watching<will have been watching',
        'Those men ___ that entrance for the past four hours.=have been guarding>has been guarding+had been guarding<will have been guarding',
        'The orphans ___ clothes from that church for a year now.=have been receiving>has been receiving+had been receiving<will have been receiving',
        'My friends ___ to that mall for seven weeks by next {day}.=will have been going>has been going+have been going<had been going',
        '{boy} ___ toys for ten months by monthend.=will have been collecting>has been collecting+have been collecting<had been collecting',
        'Mr. {surname} ___ pictures of birds for three years by next {month}.=will have been taking>has been taking+have been taking<had been taking',
        'My sisters ___ in that show for eight months by yearend.=will have been performing>has been performing+have been performing<had been performing',
        'The zookeeper ___ for that lion for two years already by tomorrow.=will have been caring>has been caring+have been caring<had been caring',
        'By next week, my father ___ money to my sister for a year already.=will have been sending>has been sending+have been sending<had been sending',
    ],
    '4_Hard' => [
        'Their hardworking gardener ___ care of those flowering plants for the last seven months.=has been taking>have been taking+had been taking<will have been taking',
        'That researcher ___ this scientific study since he was hired by our company a year ago.=has been doing>have been doing+had been doing<will have been doing',
        'The motivated soccer player ___ his kicking techniques for the past eight weeks.=has been practicing>have been practicing+had been practicing<will have been practicing',
        'The choir members ___ that old song for quite a long time until they switched to a new one.=had been singing>has been singing+have been singing<will have been singing',
        'The students ___ that exhibit for several months before they started their new project.=had been staging>has been staging+have been staging<will have been staging',
        'His coworker ___ to their boss for quite some time before he was fired last {day}.=had been complaining>has been complaining+have been complaining<will have been complaining',
        'Mr. {surname} and his wife ___ money diligently before they moved to America last year.=had been saving>has been saving+have been saving<will have been saving',
        'The brave soldiers ___ that eastern camp since their arrival about three months ago.=have been defending>has been defending+had been defending<will have been defending',
        'The retirees from Manila ___ a peaceful life here in the province for two months now.=have been enjoying>has been enjoying+had been enjoying<will have been enjoying',
        'Those basketball stars ___ together for the same team since their graduation a year ago.=have been playing>has been playing+had been playing<will have been playing',
        'Those goats and horses ___ nothing but dry grass since Mr. {surname} brought them here.=have been eating>has been eating+had been eating<will have been eating',
        '{boy} and {girl} ___ meals to our office for three years already by next {month}.=will have been delivering>has been delivering+have been delivering<had been delivering',
        'My friends ___ to that science magazine for six months already by next {day}.=will have been subscribing>has been subscribing+have been subscribing<had been subscribing',
        'The writers ___ on that comedy show for five years already by the end of next month.=will have been working>has been working+have been working<had been working',
        'That music student ___ original songs for seven years already by next {month}.=will have been composing>has been composing+have been composing<had been composing',
    ],
    '5_Easy' => [
        'The news reporter ___ the mayor that question since last month.=has been asking>have been asking+had been asking<will have been asking',
        'Their driver ___ for a higher salary since two months ago.=has been requesting>have been requesting+had been requesting<will have been requesting',
        'Mr. {surname} ___ their wooden fence for the last three days.=has been painting>have been painting+had been painting<will have been painting',
        'The old woman ___ those rice cakes since early this morning.=has been peddling>have been peddling+had been peddling<will have been peddling',
        '{girl} ___ ballet to young girls for the past four months.=has been teaching>have been teaching+had been teaching<will have been teaching',
        'My older sister ___ for her missing jacket since last night.=has been looking>have been looking+had been looking<will have been looking',
        'The construction workers ___ that bridge for months before it was completed.=had been building>has been building+have been building<will have been building',
        'The machine ___ whirring sounds for several days until it was repaired.=had been producing>has been producing+have been producing<will have been producing',
        '{girl} ___ that novel for weeks until she lost interest in it.=had been reading>has been reading+have been reading<will have been reading',
        'Our neighbors ___ in that river for years until they moved abroad.=had been fishing>has been fishing+have been fishing<will have been fishing',
        'The bats ___ into that cave for a year before they mysteriously disappeared.=had been flying>has been flying+have been flying<will have been flying',
        'The submarine ___ those deep waters for months before it was destroyed.=had been plying>has been plying+have been plying<will have been plying',
        'His children ___ their time on pointless activities for the past few years.=have been wasting>has been wasting+had been wasting<will have been wasting',
        'Those zoo animals ___ in cramped cages for several years now.=have been living>has been living+had been living<will have been living',
        'Those fish farmers ___ catfish and tilapia for two quarters now.=have been culturing>has been culturing+had been culturing<will have been culturing',
        '{boy} and {girl} ___ the babies play with their toys since this morning.=have been watching>has been watching+had been watching<will have been watching',
        'Those swordsmen ___ that ancient tomb for as long as I can remember.=have been guarding>has been guarding+had been guarding<will have been guarding',
        'Their waiters ___ generous tips from wealthy tourists for a year now.=have been receiving>has been receiving+had been receiving<will have been receiving',
        'My classmates ___ to that public library for seven months by next {day}.=will have been going>has been going+have been going<had been going',
        'By this weekend, my best friend ___ coins and stamps for five months already.=will have been collecting>has been collecting+have been collecting<had been collecting',
        'Mr. {surname} ___ pet snakes for three years already by monthend.=will have been keeping>has been keeping+have been keeping<had been keeping',
        'The talented actresses ___ in that theater for four months by yearend.=will have been performing>has been performing+have been performing<had been performing',
        '{boy} ___ that cellphone for twelve hours already by 7 o\'clock tonight.=will have been charging>has been charging+have been charging<had been charging',
        'By next week, my mother ___ postcards to my father for a year already.=will have been sending>has been sending+have been sending<had been sending',
    ],
    '5_Hard' => [
        'For the past seven months, the radio commentator ___ about the government\'s plan to raise taxes.=has been talking>have been talking+had been talking<will have been talking',
        'Dr. {surname} ___ those genetic experiments since he was hired by our university a year ago.=has been conducting>have been conducting+had been conducting<will have been conducting',
        'The taekwondo student ___ his kicking and punching skills for the past three months.=has been practicing>have been practicing+had been practicing<will have been practicing',
        '{girl} and her best friend ___ that lovely song as a duet for years until they parted ways.=had been singing>has been singing+have been singing<will have been singing',
        'The teenagers ___ the annoyed monkeys at the zoo until they were asked to leave at once.=had been taunting>has been taunting+have been taunting<will have been taunting',
        'The lieutenant ___ to the general for quite a while before he was sent to Sulu last {day}.=had been complaining>has been complaining+have been complaining<will have been complaining',
        '{boy} and {girl} ___ abandoned cats in our village before they moved to the next town last month.=had been rescuing>has been rescuing+have been rescuing<will have been rescuing',
        'The engineers ___ the design of that vehicle ever since they arrived about six months ago.=have been improving>has been improving+had been improving<will have been improving',
        'The new owners of the beach house ___ the sea breeze and lovely sunset there for two months now.=have been enjoying>has been enjoying+had been enjoying<will have been enjoying',
        '{girl} and {boy} ___ the new chapel with colorful peony and dahlia flowers since yesterday.=have been decorating>has been decorating+had been decorating<will have been decorating',
        'For several days now, the lionesses ___ prey in an area where a large herd of zebras is roaming.=have been hunting>has been hunting+had been hunting<will have been hunting',
        'That funny mailman ___ parcels to our office for two years already by next {month}.=will have been delivering>has been delivering+have been delivering<had been delivering',
        'Our customers ___ to our internet services for five months already by next {day}.=will have been subscribing>has been subscribing+have been subscribing<had been subscribing',
        'The painter ___ on that ceiling mural for five weeks already by the end of next month.=will have been working>has been working+have been working<had been working',
        'By next {day}, the new law graduate ___ for the bar examinations for three months already.=will have been reviewing>has been reviewing+have been reviewing<had been reviewing',
    ],
    '6_Easy' => [
        'The news correspondent ___ the disgraced celebrity the same question since two months ago.=has been asking>have been asking+had been asking<will have been asking',
        'The troubled businessman ___ for police protection for the past three weeks.=has been requesting>have been requesting+had been requesting<will have been requesting',
        'Mr. {surname} ___ the walls of all their bedrooms for the last three days.=has been painting>have been painting+had been painting<will have been painting',
        'The shabby-looking man ___ those wooden toys in that corner since the start of this week.=has been peddling>have been peddling+had been peddling<will have been peddling',
        '{boy}, along with his friend, ___ karate to those young boys for over two hours already.=has been teaching>have been teaching+had been teaching<will have been teaching',
        'My father, as well as my mother, ___ for our missing puppy since three nights ago.=has been looking>have been looking+had been looking<will have been looking',
        'The architect, together with his workers, ___ that factory for months before it was finished.=had been building>has been building+have been building<will have been building',
        'The motorcycle ___ that strange buzzing sound for two weeks until we had it fixed.=had been producing>has been producing+have been producing<will have been producing',
        '{girl} ___ egg-laying aquarium fishes for months until she switched to livebearers.=had been breeding>has been breeding+have been breeding<will have been breeding',
        '{boy} and his classmates ___ in that tilapia pond for months until the pond dried up.=had been fishing>has been fishing+have been fishing<will have been fishing',
        'Migratory birds ___ into that swamp for years before the swamp was turned into a park.=had been flying>has been flying+have been flying<will have been flying',
        'Jeepneys and buses ___ that route for many years before that bridge was closed.=had been plying>has been plying+have been plying<will have been plying',
        'Those employees ___ the company\'s valuable resources on useless projects for the past two years.=have been wasting>has been wasting+had been wasting<will have been wasting',
        'Those desert arachnids ___ under the harshest conditions for millions of years.=have been thriving>has been thriving+had been thriving<will have been thriving',
        'For many decades, fish farmers in that community ___ milkfish for their livelihood.=have been culturing>has been culturing+had been culturing<will have been culturing',
        '{boy} and {girl} ___ the movement of the stars in the night sky since the beginning of {month}.=have been observing>has been observing+had been observing<will have been observing',
        'Those soldiers ___ under the hot sun in that field for at least three hours already.=have been marching>has been marching+had been marching<will have been marching',
        'The policemen ___ information about that controversial case from someone for a year now.=have been receiving>has been receiving+had been receiving<will have been receiving',
        '{girl} and her classmates ___ in that fashion webinar for six months by next {day}.=will have been participating>has been participating+have been participating<had been participating',
        'By this weekend, my art teacher ___ miniature dioramas for seven months already.=will have been assembling>has been assembling+have been assembling<had been assembling',
        'Mr. {surname} ___ those exotic ornamental plants for two years already by the end of the month.=will have been cultivating>has been cultivating+have been cultivating<had been cultivating',
        'The famous magician ___ his amazing illusions in that theater for three months by yearend.=will have been performing>has been performing+have been performing<had been performing',
        'By the end of today, Miss {surname} ___ the progress of my projects for two months already.=will have been monitoring>has been monitoring+have been monitoring<had been monitoring',
        'The journalists ___ the twists and turns of that unusual story for a year by the middle of next month.=will have been following>has been following+have been following<had been following',
    ],
    '6_Hard' => [
        'The relentless policewoman ___ that notorious criminal for at least eleven months already.=has been pursuing>have been pursuing+had been pursuing<will have been pursuing',
        'For the past several months, the radio commentator ___ the mayor\'s white elephant project.=has been criticizing>have been criticizing+had been criticizing<will have been criticizing',
        'Mr. {surname} ___ the city\'s philharmonic orchestra ever since he became a music professor.=has been conducting>have been conducting+had been conducting<will have been conducting',
        'That football player from Cebu ___ his kicking and passing techniques for five months now.=has been polishing>have been polishing+had been polishing<will have been polishing',
        'The unpopular politician ___ his controversial decision for weeks until the court ruled against him.=had been defending>has been defending+have been defending<will have been defending',
        'The rowdy men ___ the poor orangutan at the zoo until the manager forced them to leave at once.=had been taunting>has been taunting+have been taunting<will have been taunting',
        'The patient ___ of severe back pain to the surgeon for weeks until he underwent surgery last {day}.=had been complaining>has been complaining+have been complaining<will have been complaining',
        '{boy} and {girl} ___ funds for homeless people in our neighborhood before they went back to Manila.=had been raising>has been raising+have been raising<will have been raising',
        'The programmers ___ the source code of that application ever since they joined our company.=have been improving>has been improving+had been improving<will have been improving',
        'For several days now, the great white sharks ___ prey in an area where a large school of sardines is staying.=have been hunting>has been hunting+had been hunting<will have been hunting',
        'The groom and his friends ___ the bridal car with white tulips and daisies since this morning.=have been decorating>has been decorating+had been decorating<will have been decorating',
        'The new owners of the condominium unit ___ the evening view of the city\'s skyline for three weeks now.=have been enjoying>has been enjoying+had been enjoying<will have been enjoying',
        'Our messenger ___ documents to and from your office for six months already by next weekend.=will have been delivering>has been delivering+have been delivering<had been delivering',
        'Our clients ___ to our online applications for a year already by the middle of next month.=will have been subscribing>has been subscribing+have been subscribing<had been subscribing',
        'By next {day}, the new medicine graduate ___ for the physician licensure examination for five weeks.=will have been reviewing>has been reviewing+have been reviewing<had been reviewing',
    ],
    '7_9_Easy' => [
        'The arresting police officer ___ the uncooperative pickpocket for at least two hours already.=has been interrogating>have been interrogating+had been interrogating<will have been interrogating',
        'The exhausted employee ___ her supervisor for one week of vacation leave since the start of the month.=has been requesting>have been requesting+had been requesting<will have been requesting',
        'Mr. {surname} ___ the wooden pieces of furniture in their living room for the past eight hours.=has been varnishing>have been varnishing+had been varnishing<will have been varnishing',
        'The industrious entrepreneur ___ his plastic products to passersby since very early this morning.=has been peddling>have been peddling+had been peddling<will have been peddling',
        '{boy}, along with some classmates, ___ inside that abandoned gym for three weeks already.=has been exercising>have been exercising+had been exercising<will have been exercising',
        'The patrolman, as well as several volunteers, ___ for the stolen bicycle since lunchtime.=has been searching>have been searching+had been searching<will have been searching',
        'The car enthusiast ___ those vintage cars for several days until he ran out of parts to use.=had been restoring>has been restoring+have been restoring<will have been restoring',
        'Their old pickup truck ___ a thick black smoke for weeks before they brought it to a mechanic.=had been emitting>has been emitting+have been emitting<will have been emitting',
        'The farmers ___ all kinds of livestock animals for years until a typhoon destroyed their facility.=had been breeding>has been breeding+have been breeding<will have been breeding',
        '{girl} and her close friends ___ in that small town for years until the place was ruined by a big earthquake.=had been excursioning>has been excursioning+have been excursioning<will have been excursioning',
        'That invasive fish ___ its territory in that lake for years before it became the dominant species there.=had been expanding>has been expanding+have been expanding<will have been expanding',
        'The stock brokers ___ shares of that company for months until the stock market collapsed.=had been trading>has been trading+have been trading<will have been trading',
        'Those hardy grassland mammals ___ with their predators for thousands of years.=have been coexisting>has been coexisting+had been coexisting<will have been coexisting',
        'Since time immemorial, people living in that old village ___ goats and sheep for their livelihood.=have been rearing>has been rearing+had been rearing<will have been rearing',
        '{boy} and {girl} ___ the interactions of species living in that ecosystem since the month of {month}.=have been observing>has been observing+had been observing<will have been observing',
        'Those worn-out army trainees ___ up and down that steel tower for at least three hours already.=have been rappelling>has been rappelling+had been rappelling<will have been rappelling',
        'At least three unidentified objects in outer space ___ strange radio signals for over a year now.=have been transmitting>has been transmitting+had been transmitting<will have been transmitting',
        'The volunteers from that organization ___ that polluted and stagnant canal since over a month ago.=have been declogging>has been declogging+had been declogging<will have been declogging',
        'The master chef ___ special dishes for us for three years already by the end of this month.=will have been preparing>has been preparing+have been preparing<had been preparing',
        'The {surname} twins ___ in that children nourishment program for six months by next {day}.=will have been participating>has been participating+have been participating<had been participating',
        'By this weekend, my elder brother ___ his artworks at the mall for seven months already.=will have been exhibiting>has been exhibiting+have been exhibiting<had been exhibiting',
        'The sputtering water pump ___ those young children with its loud noise for two weeks by tomorrow.=will have been terrifying>has been terrifying+have been terrifying<had been terrifying',
        'By the end of today, the astronomer ___ the orbit of the approaching comet for two months already.=will have been monitoring>has been monitoring+have been monitoring<had been monitoring',
        'The pride of hungry lions ___ the large herd of elephants for exactly one week by tomorrow.=will have been following>has been following+have been following<had been following',
    ],
    '7_9_Hard' => [
        'The small pack of starving wild dogs ___ the powerful and aggressive wildebeest for at least thirty minutes already.=has been pursuing>have been pursuing+had been pursuing<will have been pursuing',
        'For the past several weeks, the newspaper editor ___ the governor\'s decision to build a highway that it could not afford.=has been criticizing>have been criticizing+had been criticizing<will have been criticizing',
        'For several days already, Mr. {surname} ___ the issue on textbook overpricing that victimized the parents of many schoolchildren.=has been investigating>have been investigating+had been investigating<will have been investigating',
        'For the past two weeks, that jackal ___ carrion in an area where left-over lion prey is easy to find.=has been scavenging>have been scavenging+had been scavenging<will have been scavenging',
        'The contractor, together with his laborers, ___ that monument for many days before it was finally unveiled to the public.=had been constructing>has been constructing+have been constructing<will have been constructing',
        'The despised actor ___ his controversial decision to abandon his family for weeks until a court case was filed against him.=had been defending>has been defending+have been defending<will have been defending',
        'The abusive jail officers ___ the hapless inmate until the senior superintendent warned them to stop at once.=had been taunting>has been taunting+have been taunting<will have been taunting',
        'For days, the customers of that restaurant ___ of too much heat until the owners installed an air conditioning unit in the dining area last {day}.=had been complaining>has been complaining+have been complaining<will have been complaining',
        'Those software developers ___ the programming of that humanoid robot ever since they were hired by our technology company.=have been improving>has been improving+had been improving<will have been improving',
        'For the past three months, our company\'s experts ___ all available in-house resources to come up with an innovative product.=have been utilizing>has been utilizing+had been utilizing<will have been utilizing',
        '{boy} and his business partners ___ an online training system for corporations ever since they received a huge funding from an investor.=have been developing>has been developing+had been developing<will have been developing',
        'The owners of that fast food company ___ their best-performing branches in Metro Manila for the past two months.=have been renovating>has been renovating+had been renovating<will have been renovating',
        'Their retired neighbor ___ in various online livelihood courses for seven months already by next {month}.=will have been enrolling>has been enrolling+have been enrolling<had been enrolling',
        'The man with a yellow motorcycle ___ packages around our neighborhood for two weeks already by this {day}.=will have been delivering>has been delivering+have been delivering<had been delivering',
        'Those gifted students ___ to our online science fiction comic books for a year already by the middle of next month.=will have been subscribing>has been subscribing+have been subscribing<had been subscribing',
        'By the 15th of next month, the new civil engineering graduate ___ for the board examinations for five weeks.=will have been reviewing>has been reviewing+have been reviewing<had been reviewing',
    ],
    '8_10_Easy' => [
        'The guidance counselor ___ the high school students responsible for a commotion for at least thirty minutes already.=has been interrogating>have been interrogating+had been interrogating<will have been interrogating',
        '{girl}, along with her younger brother, ___ their father for an increase in their allowance since two weeks ago.=has been requesting>have been requesting+had been requesting<will have been requesting',
        'Mr. {surname}, with the help of his assistant, ___ the leather sofa in their living room for the past four hours.=has been reupholstering>have been reupholstering+had been reupholstering<will have been reupholstering',
        'Since early this week, a group of students ___ food items to commuters to raise funds for a classmate in need.=has been peddling>have been peddling+had been peddling<will have been peddling',
        '{boy}, as well as some friends, ___ on the rooftop of that abandoned factory for two weeks already.=has been exercising>have been exercising+had been exercising<will have been exercising',
        'Since lunchtime, the coastguard ___ for the missing speedboat that called for emergency help this morning.=has been searching>have been searching+had been searching<will have been searching',
        'The sailing enthusiast ___ his vintage sailboat for several days until he injured his hand with a power saw.=had been restoring>has been restoring+have been restoring<will have been restoring',
        'Their rickety jeepney ___ a choking gray smoke for several days before a mechanic overhauled its engine.=had been emitting>has been emitting+have been emitting<will have been emitting',
        'The veterinarian ___ lovebirds and finches for years until a storm surge destroyed his backyard aviary.=had been breeding>has been breeding+have been breeding<will have been breeding',
        'For years, a lot of college students ___ to that beach until the shore was completely destroyed by a tsunami.=had been excursioning>has been excursioning+have been excursioning<will have been excursioning',
        'The aggressive invaders ___ their territory on that island for months until they finally conquered it completely.=had been expanding>has been expanding+have been expanding<will have been expanding',
        'Our company ___ our products to the country for months until the tariffs became unaffordable for us.=had been exporting>has been exporting+have been exporting<will have been exporting',
        'For millions of years, those coral reef fishes ___ with the large sharks that prey on them.=have been coexisting>has been coexisting+had been coexisting<will have been coexisting',
        'For as long as I remember, people living in this neighborhood ___ ducks and chickens in their backyards for extra income.=have been rearing>has been rearing+had been rearing<will have been rearing',
        'The corporate auditors ___ the actions of the operators in that factory since early this morning.=have been observing>has been observing+had been observing<will have been observing',
        'Those weary firefighting trainees ___ up and down that steep ravine for at least two hours already.=have been rappelling>has been rappelling+had been rappelling<will have been rappelling',
        'The trapped and beleaguered soldiers ___ their location to their senior officers for over an hour now.=have been transmitting>has been transmitting+had been transmitting<will have been transmitting',
        'Environment management employees ___ that polluted and stagnant estero since yesterday afternoon.=have been declogging>has been declogging+had been declogging<will have been declogging',
        'The Italian chef ___ special dishes for the visitors for six hours already by the end of this hour.=will have been concocting>has been concocting+have been concocting<had been concocting',
        'The {surname} sisters, along with their brother, ___ for that medical mission for seven months by next {day}.=will have been volunteering>has been volunteering+have been volunteering<had been volunteering',
        'By this weekend, my favorite cousin ___ his metal sculptures at their university for eight weeks already.=will have been exhibiting>has been exhibiting+have been exhibiting<had been exhibiting',
        'The riotous group of teenagers ___ those young schoolchildren with their disorderly behavior for two weeks by tomorrow.=will have been terrifying>has been terrifying+have been terrifying<had been terrifying',
        'The team of investigators ___ that notorious gang of hoodlums for exactly one week by tomorrow.=will have been following>has been following+have been following<had been following',
        'By the end of today, the diligent nurse ___ the vital signs of her senior patient for two months already.=will have been monitoring>has been monitoring+have been monitoring<had been monitoring',
    ],
    '8_10_Hard' => [
        'For the past several weeks, the tenacious activist ___ the incumbent mayor\'s lack of political will to solve the transportation crisis.=has been criticizing>have been criticizing+had been criticizing<will have been criticizing',
        'The elite team of government investigators ___ the country\'s most wanted money launderer for at least three months already.=has been pursuing>have been pursuing+had been pursuing<will have been pursuing',
        'To boost the local economy, the good governor ___ zero-interest loans to qualified business owners for three years already.=has been providing>have been providing+had been providing<will have been providing',
        'That group of ardent environmentalists ___ the operation of that coal-fed power plant since it was inaugurated three years ago.=has been opposing>have been opposing+had been opposing<will have been opposing',
        'Those government employees ___ higher wages and better benefits for many years before the mayor finally caved in.=had been demanding>has been demanding+have been demanding<will have been demanding',
        'Our company\'s human resource manager ___ job applicants incessantly until Mr. Simpson was hired for the open position.=had been interviewing>has been interviewing+have been interviewing<will have been interviewing',
        'The wayward celebrity, who used to be a multimillionaire, ___ his nest egg until his sister intervened for his own good.=had been depleting>has been depleting+have been depleting<will have been depleting',
        'The abusive drill sergeant ___ the exhausted army trainees for weeks until the colonel reassigned him somewhere far away.=had been tormenting>has been tormenting+have been tormenting<will have been tormenting',
        'For the past two weeks, their marketing employees ___ a special training program to improve their English communication skills.=have been undergoing>has been undergoing+had been undergoing<will have been undergoing',
        'Mr. {surname} and his engineers ___ a compact electric vehicle for common people ever since the electric vehicle law was approved.=have been developing>has been developing+had been developing<will have been developing',
        'The owners of that premier university ___ their engineering building ever since an alumnus complained about its shabby state.=have been renovating>has been renovating+had been renovating<will have been renovating',
        'The starving farm workers ___ on nothing but sweet potatoes ever since an extremely long dry season annihilated their crops.=have been surviving>has been surviving+had been surviving<will have been surviving',
        'By the end of next month, that group of paleontologists ___ every nook and cranny of that dinosaur bone for two hundred days.=will have been scrutinizing>has been scrutinizing+have been scrutinizing<had been scrutinizing',
        'The masterful ballerinas from Russia ___ the city\'s devoted theater-goers for two months already by the end of this week.=will have been mesmerizing>has been mesmerizing+have been mesmerizing<had been mesmerizing',
        'The group of carpenters hired by the contractor ___ the houses in that gloomy area for two years already by the end of this month.=will have been rehabilitating>has been rehabilitating+have been rehabilitating<had been rehabilitating',
    ],
];

// ---- Helpers ----
function gpp_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 220): int {
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

function gpp_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
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

function gpp_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function gpp_roll_values(): array {
    global $boyPool, $girlPool, $surnamePool, $dayPool, $monthPool;
    return [
        'boy'     => $boyPool[array_rand($boyPool)],
        'girl'    => $girlPool[array_rand($girlPool)],
        'surname' => $surnamePool[array_rand($surnamePool)],
        'day'     => $dayPool[array_rand($dayPool)],
        'month'   => $monthPool[array_rand($monthPool)],
    ];
}

function gpp_parse(string $raw): ?array {
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

function gpp_pick_question(array $pool, string $sessionKey, string $poolId): ?array {
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

    $parsed = gpp_parse($raw);
    if ($parsed === null) return null;

    $values   = gpp_roll_values();
    $sentence = gpp_apply_placeholders($parsed['sentence'], $values);
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
    $poolId = resolve_gpp_pool($lvl, $grd);
    $pool   = $sentencePools[$poolId] ?? $sentencePools['4_Easy'];

    $pick = gpp_pick_question($pool, $sessionKey, $poolId);
    if ($pick === null) {
        $pick = gpp_pick_question($sentencePools['4_Easy'], $sessionKey, '4_Easy');
    }

    $answer   = $pick['answer'];
    $sentence = $pick['sentence'];
    $wrongs   = $pick['wrong'];

    // De-dupe: never allow a distractor that matches the correct answer.
    $wrongs = array_values(array_filter($wrongs, fn($w) => $w !== $answer));

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
    'top_banner'    => $base . '/english/images/ex-23-top.jpg',
    'title_bg'      => $base . '/english/images/ex-23-top2.jpg',
    'left_side'     => $base . '/english/images/ex-23-left.jpg',
    'right_side'    => $base . '/english/images/ex-23-right.jpg',
    'content_bg'    => $base . '/english/images/ex-23-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-23-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];
render_header($moduleTitle . '<br/>Grade ' . $grd . ' - ' . $lvl, $moduleTitle . '<br/>Grade ' . $grd . ' - ' . $lvl, $theme);
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
    $boxW = gpp_compute_width($filledEsc);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php gpp_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $filledEsc
    . '</div>'
  , 80, $boxW); ?>
  <input type="submit" name="Submit2" value=" New Question " style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
    $boxW = gpp_compute_width($sentenceEsc);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the <span style="color:#CC0066;">simplest correct tense</span> below.
  </div>
  <?php gpp_box(
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

  <!-- Difficulty radios (§10.4 — Easy / Hard only, inside form so they POST) -->
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