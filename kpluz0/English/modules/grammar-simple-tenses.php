<?php
// english/modules/grammar-simple-tenses.php
// Grammar: Simple Tenses — click the verb form that correctly fits the blank.
// 16 sentence pools mapped by (level × grade). Legacy had Easy + Medium; modern
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
$moduleTitle = 'Grammar: Simple Tenses';
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
//   Easy:   grd<=1&#8594;1, 2&#8594;3, 3&#8594;5, 4&#8594;7, 5&#8594;9, 6&#8594;11, 7/9&#8594;13, 8/10&#8594;15
//   Medium: grd<=1&#8594;2, 2&#8594;4, 3&#8594;6, 4&#8594;8, 5&#8594;10, 6&#8594;12, 7/9&#8594;14, 8/10&#8594;16
// Grade 0 had no Hard pool in legacy — clamp to grade 1.
function resolve_gst_pool(string $lvl, int $grd): int {
    if ($grd < 0) $grd = 0;
    if ($grd > 10) $grd = 10;
    if ($lvl === 'Easy') {
        if ($grd <= 1) return 1;
        if ($grd == 2) return 3;
        if ($grd == 3) return 5;
        if ($grd == 4) return 7;
        if ($grd == 5) return 9;
        if ($grd == 6) return 11;
        if ($grd == 7 || $grd == 9) return 13;
        return 15; // 8 or 10
    }
    // Hard = legacy Medium
    if ($grd <= 1) return 2;
    if ($grd == 2) return 4;
    if ($grd == 3) return 6;
    if ($grd == 4) return 8;
    if ($grd == 5) return 10;
    if ($grd == 6) return 12;
    if ($grd == 7 || $grd == 9) return 14;
    return 16; // 8 or 10
}

// ---- Value pools (§5) ----
$namePool = ['Adam','Adrian','Alex','Andrew','Angelo','Carlos','Carson','Chris','Daniel','David','Diego','Domeng','Elijah','Ethan','Gabriel','Hayden',
    'Ian','Isaac','Isaiah','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan','Julian','Justin','Kevin','Lucas',
    'Luis','Luke','Matthew','Max','Michael','Nathan','Noah','Oliver','Robert','Ryan','Samuel','Tristan','William',
    'Alyssa','Amelia','Andrea','Anna','Bella','Chloe','Claire','Eliza','Emma','Eva','Evelyn','Gabriela','Grace','Hannah','Isabel','Jasmine',
    'Jocelyn','Jolina','Julia','Kylie','Lauren','Layla','Leah','Lillian','Lydia','Maria','Melanie','Mia','Naomi','Olivia','Sarah','Sophia',
    'Stella','Tina','Victoria'];
$boyPool = ['Alex','Ben','Carlos','Daniel','Diego','Gabriel','Isaac','Jaime','Jose','Juan','Jonathan','Lucas','Luis','Max','Roberto','Samuel','Tomas'];
$girlPool = ['Annie','Betty','Caring','Elisa','Emma','Eva','Evelyn','Grace','Josie','Julie','Katring','Laura','Lydia','Maring','Olive','Tina','Toyang'];
$surnamePool = ['Cruz','de Guzman','Gomez','Padua','Santos','Reyes','Tolentino','Torres'];
$dayPool = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
$monthPool = ['January','February','March','April','May','June','July','August','September','October','November','December'];

// ---- Sentence pools — verbatim from legacy, markers converted to {placeholders} ----
// Format: 'sentence=answer>wrong1+wrong2<wrong3'
// Typos fixed:
//   - pool 2: 'eat<ate+will eat<eats' &#8594; 'eat>ate+will eat<eats' (first separator)
//   - pool 5: 'baskteball' &#8594; 'basketball'
//   - pool 7: 'will sweeep' &#8594; 'will sweep' (2 occurrences)
//   - pool 14: 'evalutaion' &#8594; 'evaluation'
//   - pool 15: 'suring' &#8594; 'during'
//   - pool 15: 'enginnering' &#8594; 'engineering'
$sentencePools = [
    1 => [
        'His father ___ yesterday.=worked>works+work<will work',
        'We ___ back next week.=will come>came+come<comes',
        'They ___ back yesterday.=came>will come+come<comes',
        '{name1} ___ every day.=visits>will visit+visit<visited',
        '{name1} ___ a while ago.=walked>will walk+walk<walks',
        'The bus ___ here tomorrow.=will get>got+get<gets',
        '{boy} ___ me every {day}.=calls>called+call<will call',
        '{girl} ___ a pie every {day}.=eats>ate+eat<will eat',
        '{name1} ___ every {day}.=swims>swam+swim<will swim',
        'I ___ pasta last night.=cooked>cooks+cook<will cook',
        'I ___ music.=love>loves+loved<will love',
        '{name1} ___ adobo.=likes>like+liked<will like',
        '{name1} and {name2} ___ my cat.=like>likes+liked<will like',
        'Our big tree ___ last year.=died>dies+die<will die',
        'My sisters ___ out tonight.=will go>go+went<goes',
        'Our teacher ___ already.=left>leaves+leave<will leave',
        '{name1} ___ me this toy.=gave>gives+give<will give',
        'We ___ every afternoon.=run>runs+ran<will run',
        'His dog ___ me this morning.=bit>bite+bites<will bite',
        'You always ___ me laugh.=make>made+makes<will make',
        'I always ___ a pen.=carry>carried+carries<will carry',
        'Our roof ___ when it rains.=leaks>leaked+leak<will leak',
        'I ___ that movie last week.=saw>see+sees<will see',
        'My dog always ___.=sleeps>sleep+slept<will sleep',
        'We ___ to church on Sundays.=go>goes+went<will go',
        'He ___ the wall next {day}.=will paint>paints+painted<paint',
    ],
    2 => [
        'Our puppy ___ my notebook yesterday.=chewed>will chew+chews<chew',
        'The kittens ___ with {girl} every morning.=play>will play+plays<played',
        'My cousins ___ our house last night.=left>will leave+leave<leaves',
        'Does {name1} ___ fish and vegetables?=eat>ate+will eat<eats',
        'My math teacher ___ me earlier today.=greeted>will greet+greet<greets',
        'My brother ___ our coach last month.=became>become+becomes<will become',
        'Do your uncles ___ those huge houses?=own>owned+owns<will own',
        'I ___ a glass of milk every night.=drink>drinks+drank<will drink',
        'You ___ me sad each time you say that.=make>makes+made<will make',
        '{boy} and {girl} ___ each other next year.=will marry>marry+marries<married',
        '{girl} ___ her dog every {day} afternoon.=walks>walk+walked<will walk',
        'I ___ money every day for a new toy.=save>saves+saved<will save',
        'My aunt and uncle ___ me a shirt each year.=send>sends+sent<will send',
        'Those chicks ___ that hen all the time.=follow>follows+followed<will follow',
        'I ___ a book from {name1} every {day}.=borrow>borrows+borrowed<will borrow',
    ],
    3 => [
        'His parents ___ there yesterday.=worked>works+work<will work',
        'We ___ fruits in our store next month.=will sell>sold+sell<sells',
        'They ___ a new bicycle last week.=bought>will buy+buy<buys',
        'His black dog ___ my pencil yesterday.=chewed>will chew+chews<chew',
        'My brother ___ out of our house last {day}.=moved>will move+move<moves',
        'My friend ___ something nice next {day}.=will do>did+does<do',
        'Does {name1} ever ___ any pork or beef?=eat>ate+will eat<eats',
        'My English teacher ___ me every morning.=greets>will greet+greet<greeted',
        'My father ___ a fireman just last month.=became>become+becomes<will become',
        'Your aunt ___ those flowers this morning.=arranged>arrange+arranges<will arrange',
        '{name1} ___ a glass of warm milk every morning.=drinks>drink+drank<will drink',
        'You ___ me sad each time you go away.=make>makes+made<will make',
        '{boy} and {girl} ___ a house next year.=will buy>buy+buys<bought',
        'Our neighbor ___ his dog every {day} evening.=walks>walk+walked<will walk',
        'I ___ money every day to buy a new bicycle.=save>saves+saved<will save',
        'My cousins ___ me a pair of shoes each year.=send>sends+sent<will send',
        'I ___ {name1} a book every weekend.=lend>lends+lent<will lend',
        'My classmates ___ that song every afternoon.=sing>sings+sang<will sing',
        'The bakers ___ fifty cupcakes every {day}.=bake>bakes+baked<will bake',
        'You always ___ your promise to me.=break>breaks+broke<will break',
        'My baby brother ___ his toy last {day}.=lost>loses+lose<will lose',
        'Our rooster ___ loudly every morning.=crows>crow+crowed<will crow',
        'Those tiny chicks ___ all the time.=chirp>chirps+chirped<will chirp',
        'The car ___ when it ran out of gas.=stopped>stops+stop<will stop',
    ],
    4 => [
        'Our kittens ___ with that ball of yarn every morning.=play>will play+plays<played',
        'The students ___ their coloring books yesterday.=brought>will bring+brings<bring',
        '{boy} ___ his car with wax every {day} night.=polishes>will polish+polished<polish',
        '{boy} and {girl} ___ their closets every weekend.=clean>will clean+cleans<cleaned',
        'My brothers and sisters ___ gifts every Christmas.=exchange>will exchange+exchanges<exchanged',
        'The fruit farmers ___ mangoes and bananas next month.=will harvest>harvest+harvests<harvested',
        'Her mother ___ up their groceries an hour ago.=picked>pick+picks<will pick',
        '{girl} and her friends ___ to the mall every {day}.=go>goes+went<will go',
        'I ___ my pet turtle to you and your friends later.=will show>shows+showed<show',
        'My pet hamster ___ how to run inside its wheel.=knows>know+knew<will know',
        'My friend ___ my picture just a few minutes ago.=took>take+takes<will take',
        'The mice ___ out when the cat stepped outside.=came>come+comes<will come',
        'The thirsty men ___ me after I gave them some water.=thanked>thank+thanks<will thank',
        'That peddler always ___ a lot of things on his back.=carries>carry+carried<will carry',
        'Bees and butterflies ___ nectar from flowers.=sip>sips+sipped<will sip',
        'Do you know that the sun ___ in the east?=rises>rise+rose<will rise',
    ],
    5 => [
        'Our neighbors ___ basketball in their yard every morning.=play>will play+plays<played',
        'The students ___ their drawing sets to school yesterday.=brought>will bring+brings<bring',
        '{boy} ___ his leather shoes with wax every {day} night.=shines>will shine+shined<shine',
        '{boy} and {girl} ___ their garage every {day} evening.=clean>will clean+cleans<cleaned',
        'My brothers and sisters ___ to charity every Christmas.=donate>will donate+donates<donated',
        'The mother ___ her children to school about an hour ago.=drove>drive+drives<will drive',
        '{boy} and his friends ___ to the movies every {day}.=go>goes+went<will go',
        '{boy} ___ his toy collection to his classmates later.=will show>shows+showed<show',
        'Our large dog ___ their cat up the tree yesterday.=chased>chase+chases<will chase',
        'Their noisy dog always ___ my father and uncle crazy.=drives>drove+drive<will drive',
        'The force that ___ us on the ground is called gravity.=keeps>kept+keep<will keep',
        'My nice aunt ___ two apple pies for us every night.=bakes>baked+bake<will bake',
        'His father ___ to work in that shoe factory every day.=needs>need+needed<will need',
        'Their uncle ___ a garden of petunias many years ago.=tended>tends+tend<will tend',
        'Our store ___ a total of seven bicycles earlier today.=sold>sell+sells<will sell',
        'The mollies in our pond ___ under the plants all the time.=hide>hides+hid<will hide',
        'The fish farmers ___ their milkfish and tilapia next week.=will harvest>harvest+harvests<harvested',
        'My brother {boy} ___ a coin from {girl} every afternoon.=receives>receive+received<will receive',
        'My brothers and I always ___ ourselves in trouble.=get>gets+got<will get',
        'My parents still ___ that I can not take care of myself.=think>thinks+thought<will think',
        '{girl} ___ the beef dish when we had lunch an hour ago.=chose>chooses+choose<will choose',
        '{girl} and her friends ___ a pan of spaghetti last week.=cooked>cooks+cook<will cook',
        'The zoo animals ___ a lot of noise during each mealtime.=make>makes+made<will make',
        'My best friend ___ in a play on this stage next {day}.=will perform>performs+performed<perform',
        'Our math teacher ___ us a short quiz every morning.=gives>gave+give<will give',
        '{boy} or {girl} ___ with the church choir every Sunday.=sings>sing+sang<will sing',
    ],
    6 => [
        'Each of my pet pigeons always ___ its way back home.=finds>find+found<will find',
        'My brother ___ my backpack for his camping trip three days ago.=borrowed>borrow+borrows<will borrow',
        'The hungry firemen ___ my mother after she gave them some bread.=thanked>thank+thanks<will thank',
        'That food vendor always ___ a huge plastic bag of snacks on his back.=carries>carry+carried<will carry',
        'Light ___ at a speed of about 300,000 kilometers per second.=travels>travel+travelled<will travel',
        '{boy} ___ her hand before they both jumped into the water.=held>holds+hold<will hold',
        'I ___ this beautiful ocean once we move to Manila next year.=will miss>misses+miss<missed',
        '{boy} and I ___ a bucket of ice cream to {girl} every weekend.=deliver>delivers+delivered<will deliver',
        '{boy} and his classmates ___ a lot of money each month selling shoes.=earn>earns+earned<will earn',
        '{boy} and his best friend ___ that rocky mountain next year.=will climb>climbs+climb<climbed',
        '{name1} and {name2} ___ in paintings every other month.=invest>invests+will invest<invested',
        'That ticketing booth ___ concert tickets only on Saturdays.=sells>sell+sold<will sell',
        '{boy} ___ nice things about {girl} during last week\'s contest.=said>says+say<will say',
        'The janitors ___ the auditorium after the concert last night.=swept>sweeps+sweep<will sweep',
        'The sheriff and his assistant ___ at least ten crooks every month.=arrest>arrests+arrested<will arrest',
        'The teachers or the librarian ___ this report to the principal daily.=submits>submit+submitted<will submit',
    ],
    7 => [
        'Each of my dogs already ___ how to do several tricks.=knows>know+knew<will know',
        'The brother of my classmate ___ my bicycle four days ago.=borrowed>borrow+borrows<will borrow',
        'The poor beggar ___ us after we gave him a slice of cake.=thanked>thank+thanks<will thank',
        'I ___ all the fun we had this summer many years from now.=will remember>remembers+remember<remembered',
        '{boy} and his classmates ___ a lot each year selling jackets.=earn>earns+earned<will earn',
        '{boy} and his friends ___ that mysterious cave next year.=will explore>explores+explore<explored',
        'Our cafe ___ exotic gourmet coffee only on Sundays.=serves>serve+served<will serve',
        '{boy} ___ his opponent during last month\'s chess tournament.=ridiculed>ridicules+ridicule<will ridicule',
        'The students ___ the gym after their dance practice yesterday.=swept>sweeps+sweep<will sweep',
        'The mayor and his wife ___ money to the orphanage every month.=send>sends+sent<will send',
        'Only a tender steak or a tasty lobster ___ {boy} this hungry.=makes>make+made<will make',
        'The English teacher ___ {boy} before their class started.=scolded>scolds+scold<will scold',
        'My friend {girl} ___ a short love story every summer.=writes>write+wrote<will write',
        'Half of his friends ___ soccer every {day} afternoon.=play>plays+played<will play',
        'Half of his classmates ___ sports on TV every night.=watch>watches+watched<will watch',
        'Half of this apple pie now ___ stale and rancid.=tastes>taste+tasted<will taste',
        '{girl} and her friends ___ three parties last month.=attended>attend+attends<will attend',
        'Our bulldog ___ at every stranger knocking on our door.=barks>barked+bark<will bark',
        'We ___ our chihuahua to a veterinarian one week from now.=will bring>bring+brings<brought',
        '{girl} ___ to that market every now and then.=goes>went+go<will go',
        'The lawyer ___ out hundreds of emails to clients every week.=sends>send+sent<will send',
        'His bodyguards ___ him from his enemies every single day.=protect>protects+protected<will protect',
        'The talented songwriter ___ a new love song regularly.=composes>composed+compose<will compose',
        'The women ___ six lamp posts in that factory every morning.=build>builds+built<will build',
    ],
    8 => [
        'Half of his doctors now ___ that he will get better within a week.=believe>believes+believed<will believe',
        '{name1} and {name2} ___ five additional employees every year.=hire>hires+will hire<hired',
        'That athlete always ___ a huge chunk of steel around his waist.=carries>carry+carried<will carry',
        '{boy} and I ___ products to our clients at the end of every week.=deliver>delivers+delivered<will deliver',
        'Each of my classmates ___ at that Japanese restaurant every day.=eats>eat+ate<will eat',
        'The caretakers of that pond ___ the milkfish and tilapia fry twice a day.=feed>feeds+fed<will feed',
        'The basketball star ___ a lot of his long shots during their last game.=missed>miss+misses<will miss',
        'The coach and the trainer ___ the players to a tough training every {day}.=subject>subjects+subjected<will subject',
        'The boss of the news reporters ___ something positive every night.=announces>announce+announced<will announce',
        '{boy} ___ the photograph close to his heart before he said goodbye.=held>holds+hold<will hold',
        'Eighty percent of his teammates ___ more than him each time they play.=score>scored+scores<will score',
        'A third of the glass jars on the shelf ___ every time the train passes by.=shake>shakes+shook<will shake',
        'The scientists ___ a difficult experiment two months from now.=will conduct>conduct+conducts<conducted',
        'The members of that club ___ their new president two days ago.=elected>elect+elects<will elect',
        'The astronomer ___ details of the orbit of that comet every hour.=records>record+recorded<will record',
    ],
    9 => [
        '{boy} ___ his closely guarded secret to me just a few days ago.=revealed>reveals+reveal<will reveal',
        '{name1} and {name2} ___ a new business venture every other year.=start>starts+will start<started',
        'Atty. {surname} always ___ a briefcase full of legal documents.=carries>carry+carried<will carry',
        '{boy} and I ___ assorted products online every day for our store.=order>orders+ordered<will order',
        'Each of my classmates ___ at that sports complex every week.=swims>swim+swam<will swim',
        'Those zookeepers ___ 100 kilograms of food for their animals every day.=prepare>prepares+prepared<will prepare',
        'The popular archer ___ more than thirty percent of his shots yesterday.=missed>miss+misses<will miss',
        'Their volleyball players ___ a thorough medical checkup every {day}.=undergo>undergoes+underwent<will undergo',
        'The pastor ___ an uplifting message every time he gives a sermon.=shares>share+shared<will share',
        '{boy} ___ the rope around his hands then pulled them all to safety.=wrapped>wraps+wrap<will wrap',
        'Only thirty percent of the applicants ___ that test each year.=pass>passed+passes<will pass',
        'Our P.E. teacher ___ our P.E. uniforms two hours from now.=will inspect>inspect+inspects<inspected',
        'My sisters ___ a tall and elaborate cake for my brother\'s wedding.=selected>select+selects<will select',
        'Half of his officemates ___ videos on their laptops every morning.=watch>watches+watched<will watch',
        'Mr. {surname} ___ in two online conferences last week.=participated>participate+participates<will participate',
        'Our inquisitive puppy ___ every stranger that walks by our house.=approaches>approached+approach<will approach',
        'We ___ our macaw to an avian veterinarian within next month.=will bring>bring+brings<brought',
        '{girl} ___ a bag at that factory outlet every once in a while.=purchases>purchased+purchase<will purchase',
        'The store clerk ___ out hundreds of flyers to passersby every day.=hands>hand+handed<will hand',
        'His police dogs ___ his house from intruders all the time.=protect>protects+protected<will protect',
        'The talented rapper ___ at the amusement park every three days.=performs>performed+perform<will perform',
        'The mechanics at that shop ___ at least two cars every day.=repair>repairs+repaired<will repair',
        'My cousin ___ our small boat two weeks from now for his fishing trip.=will borrow>borrow+borrows<borrowed',
        'I ___ this beautiful ranch when I get back to Manila next week.=will miss>misses+miss<missed',
        '{name1} and {name2} ___ some money in stocks and bonds every payday.=invest>invests+will invest<invested',
    ],
    10 => [
        'The coach and his assistant ___ the athletes to a difficult training twice a week.=subject>subjects+subjected<will subject',
        '{girl} ___ a huge order of seafood pasta to their company about a year ago.=delivered>delivers+deliver<will deliver',
        'Half of her doctors now ___ that she will recover from her illness by next {day}.=believe>believes+believed<will believe',
        'A third of the tiles in the trunk ___ every time they hit a speed bump.=bounce>bounces+bounced<will bounce',
        'The auditors ___ a rigid inspection of our factory two weeks from now.=will conduct>conduct+conducts<conducted',
        'The technician ___ a lot of data regarding his machine\'s performance every hour.=records>record+recorded<will record',
        'Each of the adult elephants at that zoo ___ 150 kilograms of vegetation every day.=consumes>consume+consumed<will consume',
        'The priest ___ many of the churchgoers yesterday by sharing stories before the mass.=inspired>inspires+inspire<will inspire',
        'The janitor ___ the floor of the auditorium thoroughly after the concert last night.=polished>polishes+polish<will polish',
        'The sheriff and his assistant ___ at least two notorious criminals every three months.=apprehend>apprehends+apprehended<will apprehend',
        'Either my brother or my sister ___ me from my soccer practice every afternoon.=fetches>fetch+fetched<will fetch',
        'The fearless judge ___ some or all of those felons within the next few months.=will convict>convict+convicts<convicted',
        'Mrs. {surname} or her pharmacists ___ one case of these vitamins from us every other week.=order>orders+ordered<will order',
        'My secretary and one of my clerks ___ money into our bank every weekend.=deposit>deposits+deposited<will deposit',
        'The store owner, along with his security guard, ___ shoplifters every now and then.=catches>catch+caught<will catch',
    ],
    11 => [
        'The politician ___ his closely guarded secret to the public yesterday.=revealed>reveals+reveal<will reveal',
        'Our construction company ___ at least three houses every year.=builds and sells>build and sell+built and sold<will build and sell',
        'The photographer always ___ two tripods and a bag full of cameras.=carries>carry+carried<will carry',
        '{boy} ___ his lawn with elves and reindeer every Christmas season.=decorates>decorate+decorated<will decorate',
        '{girl}, along with her friends, ___ a costume party from time to time.=organizes>organize+organized<will organize',
        'The marksman ___ more than twenty percent of his pistol shots yesterday.=missed>miss+misses<will miss',
        'Old patients in this hospital ___ a routine medical checkup daily.=undergo>undergoes+underwent<will undergo',
        'The preacher ___ a hopeful message every time he\'s on the pulpit.=imparts>impart+imparted<will impart',
        'The sales clerk ___ the item when the customer requested her to do so.=wrapped>wraps+wrap<will wrap',
        'The colonel or the major regularly ___ the uniforms of the soldiers.=inspects>will inspect+inspect<inspected',
        'The teachers and the principal ___ with the students\' parents every month.=meet>will meet+meets<met',
        'My father recently ___ three large bulls from the dairy farmer.=purchased>purchase+purchases<will purchase',
        'More than half of his children ___ at the gym for one hour every day.=practice>practices+practiced<will practice',
        'Mr. {surname} and his officemates ___ in two online seminars next quarter.=will participate>participate+participates<participated',
        'That little boy ___ every stranger he meets to ask for candy.=approaches>approached+approach<will approach',
        'Mr. {surname} ___ his African lovebirds to an avian veterinarian next {day}.=will bring>bring+brings<brought',
        '{girl} ___ on a new outfit at the mall every once in a while.=tries>tried+try<will try',
        'The coach, as well as his players, ___ around the field every afternoon.=runs>run+ran<will run',
        'His two largest dogs ___ their puppies from other dogs at all times.=protect>protects+protected<will protect',
        'The talented musician ___ in front of thousands of people twice a month.=performs>performed+perform<will perform',
        'The mechanics at that shop ___ at least two jeepneys every day.=assemble>assembles+assembled<will assemble',
        'Our neighbor ___ our van a couple of weeks from now for his vacation.=will borrow>borrow+borrows<borrowed',
        '{name1} and {name2} ___ a lot of money in apartments every year.=invest>invests+will invest<invested',
        'The general ___ a detailed inspection of his soldiers\' camp next month.=will conduct>conduct+conducts<conducted',
    ],
    12 => [
        'Each of my business partners ___ abroad every month to meet international clients.=travels>travel+travelled<will travel',
        'The nuns at the orphanage ___ 30 kilograms of food every day to feed the orphans.=prepare>prepares+prepared<will prepare',
        'Each year, only thirty percent of the auditionees here ___ to move on to the next round.=manage>managed+manages<will manage',
        'The promoter, as well as his secretary, ___ thousands of brochures to prospects every week.=distributes>distribute+distributed<will distribute',
        'I ___ these sparkling blue waters when I get back to city life next week.=will miss>misses+miss<missed',
        'Their hardware store ___ a huge order of sand and gravel to our construction site yesterday.=delivered>delivers+deliver<will deliver',
        'The psychiatrist and his assistant ___ the mental patients to an evaluation weekly.=subject>subjects+subjected<will subject',
        'Half of the consultants now ___ that the new strategy will boost sales and profits.=believe>believes+believed<will believe',
        'A third of the fishes ___ behind that rock each time someone approaches their aquarium.=hide>hides+hid<will hide',
        'The bank teller ___ a lot of information every time someone opens a new account with them.=encodes>encode+encoded<will encode',
        'Each of the adult tigers at that zoo ___ at least 50 kilograms of meat every day.=consumes>consume+consumed<will consume',
        'The general manager ___ many of the employees last night by sharing stories about his own success.=inspired>inspires+inspire<will inspire',
        'The doctor or the nurse ___ at least three COVID patients every four hours.=intubates>intubate+intubated<will intubate',
        'My chihuahua or your Shi Tzu ___ these toys on the floor every time we\'re away.=scatters>scatter+scattered<will scatter',
        'Mrs. {surname} or her storekeepers ___ the food shelves twice a week.=restock>restocks+restocked<will restock',
    ],
    13 => [
        'The manager ___ the new incentive program to the employees yesterday.=revealed>reveals+reveal<will reveal',
        'Our automotive shop fully ___ at least ten vintage cars every year.=restores>restore+restored<will restore',
        'The production assistant always ___ two suitcases of the actor\'s clothes.=carries>carry+carried<will carry',
        'Mr. {surname} continuously ___ his rice field with water from the lake.=irrigates>irrigate+irrigated<will irrigate',
        '{girl}, along with her cousins, ___ a sleepover party every now and then.=organizes>organize+organized<will organize',
        'The schoolchildren ___ their school bus because of the commotion that took place.=missed>miss+misses<will miss',
        'New recruits in that military camp ___ a rigorous physical training daily.=undergo>undergoes+underwent<will undergo',
        'The commodity trader ___ several tons of agricultural products every month.=imports>import+imported<will import',
        'The lioness and her cubs ___ the pride\'s big male lion every once in a while.=annoy>will annoy+annoys<annoyed',
        'My father recently ___ a second-hand tractor for the development of our farm lot.=acquired>acquire+acquires<will acquire',
        'More than half of his teammates ___ in that soccer field two hours a day.=practice>practices+practiced<will practice',
        'Mr. {surname} and his researchers ___ in that huge convention two weeks from now.=will participate>participate+participates<participated',
        'Sometimes, the Department of Environment Protection ___ noncompliant companies.=penalizes>penalize+penalized<will penalize',
        'The employee\'s ineptness and incompetence ___ his supervisor last month.=embarrassed>embarrasses+embarrass<will embarrass',
        'Because of its unbridled charm and beauty, this city ___ anybody who sets foot on it.=enchants>enchanted+enchant<will enchant',
        'My poodle or your bulldog ___ a mess every time we step out of the room.=creates>create+created<will create',
        'The troops, along with their commander, ___ their territory well when enemies attack.=defend>defends+defended<will defend',
        '{girl}, as well as her sister, ___ to be sleeping each time their mother comes in.=pretends>pretend+pretended<will pretend',
        'This coming {day}, {boy} ___ his latest brass sculpture at the city\'s art museum.=will unveil>unveil+unveiled<unveils',
        'Your macaroni and cheese dish ___ my appetite every time I smell it.=whets>whet+whetted<will whet',
        'The scout master, including the cub scouts, always ___ their tent on a flat surface.=pitches>pitch+pitched<will pitch',
        'Only fifty percent of the birds in that swamp ___ frogs or insects for food.=hunt>hunts+hunted<will hunt',
        'Half of the pizza slice I\'m holding ___ nothing but cheese and tomato sauce.=contains>contain+contained<will contain',
        'Each year, one third of the typhoons that visit this place ___ real property.=damage>damages+damaged<will damage',
    ],
    14 => [
        'The unscrupulous social media influencer ___ a lot of fake news to the public each day.=peddles>peddle+peddled<will peddle',
        'My father or my uncle regularly ___ new ways to make our shoe factory more profitable.=discovers>discover+discovered<will discover',
        'My secretary and one of my purchasing clerks ___ with our supplier every time there\'s a price increase.=communicate>communicates+communicated<will communicate',
        'The architect, along with his draftsmen, periodically ___ the progress of the construction.=inspects>inspect+inspected<will inspect',
        'The university professors ___ him in their research and development activities from time to time.=involve>involves+involved<will involve',
        'Each of my construction projects right now ___ a tremendous amount of time, effort, and resources to complete.=requires>require+required<will require',
        'The pediatrician and the nutritionist ___ two liters of sample product every day for evaluation purposes.=concoct>concocts+concocted<will concoct',
        'Each year, only sixteen percent of their interviewees ___ to reach the final round.=manage>managed+manages<will manage',
        'The zoo\'s resident ichthyologists ___ the results of their biological experiments last month.=published>publish+publishes<will publish',
        'Their reputable astrophysicists ___ the new theories on the origin of the universe through a seminar regularly.=elucidate>elucidates+elucidated<will elucidate',
        'The indefatigable charity workers ___ relief goods to residents of the country\'s most impoverished areas last Monday.=distributed>distributes+distribute<will distribute',
        'The highly regarded screenwriter ___ an acting workshop for underprivileged children five weeks from now.=will conduct>conduct+conducts<conducted',
        'The diligent entrepreneur, as well as his partners, regularly ___ strategic business relationships with local companies.=solicits>solicit+solicited<will solicit',
        'Half of the time they spend daily on that research ___ nothing but useless data.=generates>generate+generated<will generate',
        'More than a third of the antelopes in that forest ___ on just three species of the plants there.=survive>survives+survived<will survive',
    ],
    15 => [
        'Either the coach or the trainer ___ with the players at the gym every morning.=practices>practice+practiced<will practice',
        'Their witness ___ to talk every time that policeman enters the room.=hesitates>hesitated+hesitate<will hesitate',
        'Professor {surname} ___ three research papers on genetic engineering annually.=publishes>publish+published<will publish',
        'The guidance counselor ___ no less than three students every afternoon.=advises>advised+advise<will advise',
        'The incumbent mayor, as well as his aides, now ___ around the clock in our city.=campaigns>campaign+campaigned<will campaign',
        'The investigator ___ one or two pieces of new evidence about his case every week.=unearths>unearth+unearthed<will unearth',
        'The guitarists or the lead singer ___ pictures for their fans every night.=autographs>autograph+autographed<will autograph',
        'The teacher, along with her pupils, ___ the goldfish tank every morning.=examines>examine+examined<will examine',
        'The leaders of that non-profit organization ___ a better strategy last {month}.=developed>develops+develop<will develop',
        'My most diligent assistant ___ to various self-enrichment courses next month.=will subscribe>subscribe+subscribes<subscribed',
        'That dishonest peddler of snake oils ___ many unwitting customers each day.=defrauds>defraud+defrauded<will defraud',
        'The professor or the researcher ___ the results of the experiment after each cycle.=evaluates>evaluate+will evaluate<evaluated',
        'The colonel ___ the courageous lieutenant for bravery later tonight.=will commend>commended+commends<commend',
        'Every year, the Bureau of Internal Revenue ___ thousands of tax evaders.=penalizes>penalize+penalized<will penalize',
        'The magician\'s optical illusions ___ the audience of his show next week.=will mesmerize>mesmerize+mesmerizes<mesmerized',
        'Tonight, the safety expert ___ pointers on how to stay safe during an earthquake.=will discuss>discusses+discuss<discussed',
        '{girl}, together with her best friend, ___ to Korea every now and then.=travels>travel+travelled<will travel',
        'The platoon commander, including his soldiers, regularly ___ their battle plan.=reviews>review+reviewed<will review',
        'Your black-and-white attire ___ me and my friends every time we see it.=amuses>amuse+amused<will amuse',
        'The head chef, including his junior cooks, regularly ___ their working area.=sanitizes>sanitize+sanitized<will sanitize',
        'More than half of the officers presently ___ the fifth applicant they interviewed.=favor>favors+favored<will favor',
        'Approximately one third of our roof ___ every time it rains hard.=leaks>leak+leaked<will leak',
        'This coming {day}, {boy} ___ his latest artworks at the mall\'s sunken garden.=will exhibit>exhibit+exhibited<exhibits',
        'Due to unpaid rental fees, the building manager ___ them from their apartment yesterday.=evicted>evict+evicts<will evict',
    ],
    16 => [
        'The hotel\'s culinary artists periodically ___ special dishes for their culinary shows.=concoct>concocts+concocted<will concoct',
        'Each year, only sixteen percent of their interviewees ___ in reaching the final round.=succeed>succeeded+succeeds<will succeed',
        'The governor, as well as the mayors, ___ relief goods to thousands of typhoon victims every year.=distributes>distribute+distributed<will distribute',
        'The owners of that chain of beauty salons ___ one of their branches in last week\'s newspaper.=advertised>advertises+advertise<will advertise',
        'Their clothing store ___ a huge pile of clothes and shoes to the orphanage yesterday.=donated>donates+donate<will donate',
        'The loud noise made by that cutting machine ___ the schoolchildren every once in a while.=frightens>frighten+frightened<will frighten',
        'Half of the bottles on that shelf ___ a toxic chemical that could be lethal if inhaled.=contain>contains+contained<will contain',
        'Half of that antelope\'s body ___ brown every time it walks through that muddy path in the forest.=turns>turn+turned<will turn',
        'The seasoned cosmologist ___ the characteristics of these mysterious galaxies more than a year ago.=analyzed>analyze+analyzes<will analyze',
        'Last week, the disgraced governor finally ___ his controversial statement on the issue of gender equality.=clarified>clarify+clarifies<will clarify',
        'A certain group of dissatisfied clients ___ their customer service office with complaints two days ago.=inundated>inundate+inundates<will inundate',
        'Every evening, the managers ___ the board chairman of the viability of their business model.=reassure>reassures+reassured<will reassure',
        'This outlandish aquatic creature ___ a high level of excitement among the zoo\'s visitors last Tuesday.=generated>generate+generates<will generate',
        'Their projects on artificial intelligence ___ some mind-boggling consumer products next Sunday.=will actualize>actualize+actualizes<actualized',
        'To reduce the cases of this dreaded disease, volunteer doctors occasionally ___ a massive information drive.=initiate>initiates+initiated<will initiate',
    ],
];

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function gst_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 220): int {
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

function gst_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
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

function gst_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function gst_roll_values(): array {
    global $namePool, $boyPool, $girlPool, $surnamePool, $dayPool, $monthPool;

    $name1 = $namePool[array_rand($namePool)];
    $name2 = $name1;
    $guard = 0;
    while ($name2 === $name1 && $guard++ < 20) $name2 = $namePool[array_rand($namePool)];

    return [
        'name1'   => $name1,
        'name2'   => $name2,
        'boy'     => $boyPool[array_rand($boyPool)],
        'girl'    => $girlPool[array_rand($girlPool)],
        'surname' => $surnamePool[array_rand($surnamePool)],
        'day'     => $dayPool[array_rand($dayPool)],
        'month'   => $monthPool[array_rand($monthPool)],
    ];
}

// ---- Parse: 'sentence=answer>w1+w2<w3' ----
function gst_parse(string $raw): ?array {
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

function gst_pick_question(array $pool, string $sessionKey, int $poolId): ?array {
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

    $parsed = gst_parse($raw);
    if ($parsed === null) return null;

    $values   = gst_roll_values();
    $sentence = gst_apply_placeholders($parsed['sentence'], $values);
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
    $poolId = resolve_gst_pool($lvl, $grd);
    $pool   = $sentencePools[$poolId] ?? $sentencePools[1];

    $pick = gst_pick_question($pool, $sessionKey, $poolId);
    // Fallback if parse failed (defensive — shouldn't happen with current data)
    if ($pick === null) {
        $pick = gst_pick_question($sentencePools[1], $sessionKey, 1);
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
    $boxW = gst_compute_width($filledEsc);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php gst_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $filledEsc
    . '</div>'
  , 80, $boxW); ?>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
    $boxW = gst_compute_width($sentenceEsc);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the <span style="color:#CC0066;">simplest correct tense</span> below.
  </div>
  <?php gst_box(
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
                  min-width:170px;max-width:240px;min-height:60px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:17pt;font-weight:700;text-align:center;
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