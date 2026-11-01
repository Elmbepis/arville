<?php
// english/modules/grammar-adj-degrees.php
// Grammar: Degrees of Adjectives — click the correct form of the adjective
// (positive / comparative / superlative) that fits the blank.
// 12 sentence pools mapped by (level × grade). Legacy had Easy + Medium; modern
// folds legacy Medium into Hard per handover §3.2.
// 3 choices always (correct + 2 wrongs), vertical stack, all buttons share the
// same width — equal to the widest choice's natural pixel width.

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
$moduleTitle = 'Grammar: Degrees of Adjectives';
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
function resolve_gad_pool(string $lvl, int $grd): int {
    if ($grd < 0) $grd = 0;
    if ($grd > 10) $grd = 10;
    if ($lvl === 'Easy') {
        if ($grd <= 2) return 1;
        if ($grd == 3) return 3;
        if ($grd == 4) return 5;
        if ($grd == 5) return 7;
        if ($grd == 6 || $grd == 8 || $grd == 10) return 9;
        return 11; // 7 or 9
    }
    // Hard = legacy Medium
    if ($grd <= 2) return 2;
    if ($grd == 3) return 4;
    if ($grd == 4) return 6;
    if ($grd == 5) return 8;
    if ($grd == 6 || $grd == 8 || $grd == 10) return 10;
    return 12; // 7 or 9
}

// ---- Value pools (§5) ----
$boysPool = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles','Christopher','Daniel',
    'David','Diego','Dominic','Gabriel','Ian','Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan',
    'Joseph','Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver',
    'Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girlsPool = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn',
    'Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria',
    'Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];
$surnamePool = ['Cruz','Chua','de Guzman','Gomez','Padua','Santos','Reyes','Tolentino','Torres'];

// ---- Sentence pools — verbatim from legacy, 2 typos fixed ----
$sentencePools = [
    1 => [
        '{name1} likes to watch ___ movies.=funny>funnier+funniest',
        'The ___ computer is broken.=old>older+oldest',
        'That is a ___ puppy.=cute>cuter+cutest',
        '{name3} is a ___ girl.=nice>nicer+nicest',
        'China is a ___ country.=big>bigger+biggest',
        'An ___ dog chased their cat.=angry>angrier+angriest',
        'China is ___ than India.=bigger>big+biggest',
        'Her mother is a ___ cook.=great>greater+greatest',
        'I have an ___ job.=easy>easier+easiest',
        '{name1} is ___ than {name3}.=older>old+oldest',
        'My laptop is ___ than yours.=faster>fast+fastest',
        'A lake is ___ than a pond.=larger>large+largest',
        'She is ___ than her sister.=prettier>pretty+prettiest',
        'Our house is ___ than their house.=cleaner>clean+cleanest',
        'A swordfish is ___ than a jellyfish.=faster>fast+fastest',
        'My hair is ___ than yours.=longer>long+longest',
        '{name3} is ___ than {name1}.=taller>tall+tallest',
        'Bicycles are ___ than cars.=slower>slow+slowest',
        'That was the ___ movie ever.=best>good+better',
        'She is the ___ girl in our class.=smartest>smart+smarter',
        'He is the ___ man in town.=richest>rich+richer',
        '{name3} is the ___ person I know.=nicest>nice+nicer',
        'I am the ___ person in my family.=shortest>short+shorter',
        '{name4} got the ___ grade in class.=lowest>low+lower',
        'That is the ___ house on this street.=farthest>far+farther',
    ],
    2 => [
        'The science textbook we\'re using is ___.=heavy>heavier+heaviest',
        'My boss invited me to a ___ dinner.=fancy>fancier+fanciest',
        'The ___ dog made the girl sneeze.=furry>furrier+furriest',
        'The ___ girl looked at herself in the mirror.=beautiful>more beautiful+most beautiful',
        'The ___ car in the parking area belongs to {boy}.=shiny>shinier+shiniest',
        'The ___ toddler smiled at her grandmother.=adorable>more adorable+most adorable',
        '{name3} donated a ___ sculpture to the museum.=valuable>more valuable+most valuable',
        'Your red rose is ___ than my white daisy.=prettier>pretty+prettiest',
        'Non-smokers usually live ___ than smokers.=longer>long+longest',
        'My toy truck is ___ than his toy car.=more colorful>colorful+most colorful',
        'My computer is ___ than my smartphone.=cheaper>cheap+cheapest',
        '{name1} is the ___ musician in our province.=most famous>famous+more famous',
        '{name1} is the ___ boy in the whole school.=most handsome>handsome+more handsome',
        'Jupiter is the ___ planet in the Solar System.=biggest>big+bigger',
        'Those are the ___ cakes I\'ve ever tasted.=worst>bad+worse',
        'This lamp is the ___ one in the room.=brightest>bright+brighter',
        'Russia is the ___ country in the world.=largest>large+larger',
        'What is the ___ movie you\'ve seen?=longest>long+longer',
    ],
    3 => [
        '{name1} likes to read ___ stories.=scary>scarier+scariest',
        'Our ___ wooden fence is broken.=old>older+oldest',
        'We have a ___ puppy.=black>blacker+blackest',
        'Mrs. {surname} is a ___ lady.=nice>nicer+nicest',
        'Antipolo is a ___ city.=big>bigger+biggest',
        'A ___ puppy chased their kitten.=naughty>naughtier+naughtiest',
        'Bacolod is ___ than Manila.=bigger>big+biggest',
        'His aunt is a ___ singer.=great>greater+greatest',
        'I have a ___ horse.=fast>faster+fastest',
        '{name1} is ___ than my brother.=older>old+oldest',
        'A river is ___ than a stream.=larger>large+largest',
        '{name3} is ___ than my sister.=prettier>pretty+prettiest',
        'My room is ___ than my brother\'s room.=cleaner>clean+cleanest',
        'A milkfish is ___ than a sailfish.=slower>slow+slowest',
        'Her skirt is ___ than yours.=longer>long+longest',
        'Your brother is ___ than my cousin.=taller>tall+tallest',
        'My task is ___ to do than yours.=easier>easy+easiest',
        'Falcons are ___ than pigeons.=faster>fast+fastest',
        'That was our ___ adventure ever.=best>good+better',
        '{name1} is the ___ boy in our class.=smartest>smart+smarter',
        'Mr. {surname} is the ___ man in our city.=wealthiest>wealthy+wealthier',
        'Miss {surname} is the ___ teacher I know.=kindest>kind+kinder',
        'This is the ___ pencil I\'ve ever seen.=shortest>short+shorter',
        '{name4} got the ___ score in that test.=highest>high+higher',
        'That is the ___ town in this province.=farthest>far+farther',
    ],
    4 => [
        'That crate of canned goods is really ___.=heavy>heavier+heaviest',
        'My parents are celebrating at a ___ restaurant.=fancy>fancier+fanciest',
        'That ___ costume made my classmate cry.=scary>scarier+scariest',
        'The ___ woman bought a new dress at the mall.=beautiful>more beautiful+most beautiful',
        'The knight carried his ___ sword boldly.=shiny>shinier+shiniest',
        'The ___ baby made his grandmother smile.=adorable>more adorable+most adorable',
        'Mr. {surname} donated a ___ painting to our school.=valuable>more valuable+most valuable',
        'Your muddy shirt is ___ than my wet socks.=smellier>smelly+smelliest',
        'They say that women usually live ___ than men.=longer>long+longest',
        'My new shirt is ___ than his new jacket.=more colorful>colorful+most colorful',
        'My rubber shoes are ___ than his leather shoes.=cheaper>cheap+cheapest',
        '{name1} is the ___ actor in that movie.=most famous>famous+more famous',
        '{name1} is the ___ contestant in that show.=most handsome>handsome+more handsome',
        'Asia is the ___ continent on our planet.=biggest>big+bigger',
        'That is the ___ show I\'ve ever watched.=worst>bad+worse',
        'That star is the ___ one in the night sky.=brightest>bright+brighter',
        'What is the ___ snake you\'ve ever seen?=longest>long+longer',
    ],
    5 => [
        '{name1} bought that ___ shirt yesterday for his father.=yellow>yellower+yellowest',
        'The ___ musician brought an electric guitar to the show.=jolly>jollier+jolliest',
        'The ___ elephant enchanted the zoo\'s visitors.=enormous>more enormous+most enormous',
        'The ___ hyenas chased the zebra across the field.=fearsome>more fearsome+most fearsome',
        '{name1} bought that ___ stuffed toy for {name3}.=adorable>more adorable+most adorable',
        'They bought a ___ colt and named it \'Draco.\'=young>younger+youngest',
        'The ___ soldier brought a long rifle and a pistol.=brave>braver+bravest',
        '{name3} gave the ___ beggar some food and water.=feeble>feebler+feeblest',
        'This food shortage crisis is ___ than the last one.=more serious>serious+most serious',
        'I think this angelfish is ___ than that clownfish.=more beautiful>beautiful+most beautiful',
        'I don\'t want to get sick because health is ___ than wealth.=more important>important+most important',
        'I took this route because it is ___ than the other one.=shorter>short+shortest',
        'They say that {name1} is ___ than {name2}.=friendlier>friendly+friendliest',
        'My mother thinks that cats are ___ pets than dogs.=better>good+best',
        'A blue whale is ___ than twenty elephants.=heavier>heavy+heaviest',
        'I chose this drink because it is ___ than soda.=healthier>healthy+healthiest',
        'The contestant with the ___ pumpkin gets the prize money.=largest>large+larger',
        '{name1} is the ___ coach in this basketball tournament.=most worried>worried+more worried',
        'Is Mount Everest the ___ mountain in the world?=highest>high+higher',
        '{name3} is the ___ girl in that science class.=most intelligent>intelligent+more intelligent',
        'You should wear your ___ jeans for tomorrow\'s hike.=most comfortable>comfortable+more comfortable',
        'I think we should buy the ___ car we can afford.=most powerful>powerful+more powerful',
        'The ant is the ___ insect I\'m familiar with.=smallest>small+smaller',
        'This may be the ___ road in the whole village.=narrowest>narrow+narrower',
    ],
    6 => [
        'The ___ driver whose car fell into the ravine was penalized with a hefty fine.=careless>more careless+most careless',
        '{name1} hid behind a tree when he saw their ___ principal approaching.=strict>stricter+strictest',
        '{name3} is ___ when it comes to hosting parties for her friends.=meticulous>more meticulous+most meticulous',
        'The ___ customer was forced by the head waiter to leave the restaurant.=arrogant>more arrogant+most arrogant',
        'That ___ athlete should be competing in track and field events instead of playing golf.=speedy>speedier+speediest',
        'For me, a holiday by the sea is ___ than a holiday in the mountains.=better>good+best',
        'The heat waves this summer are even ___ than those of last summer.=worse>bad+worst',
        'Many college students dread calculus so it is probably ___ than algebra.=more difficult>difficult+most difficult',
        'This house is definitely ___ than the cramped apartment I\'m renting.=more spacious>spacious+most spacious',
        'Now that she has turned eighteen, {name3} wants to be ___ than before.=more independent>independent+most independent',
        'The dream that {name3} had last night is the ___ one she has had so far.=weirdest>weird+weirder',
        'At twenty years old, {name3} is the ___ teacher in our district.=youngest>young+younger',
        'This is undoubtedly the ___ book I have ever read.=most interesting>interesting+more interesting',
        'Among all our native snakes, this species is the ___.=most dangerous>dangerous+more dangerous',
        'We should invest this money in the ___ business we can find.=most profitable>profitable+more profitable',
    ],
    7 => [
        '{name1} bought that ___ jacket last week for his younger brother.=white>whiter+whitest',
        'The ___ comedian brought a strange-looking puppet to his show last night.=funny>funnier+funniest',
        'The ___ truck accidentally hit that electric pole this morning.=enormous>more enormous+most enormous',
        'The ___ T. rex chased the herbivorous dinosaurs into the forest.=fearsome>more fearsome+most fearsome',
        '{name1} let his ___ baby brother play with our nephews last week.=adorable>more adorable+most adorable',
        'The {surname} family bought a ___ poodle puppy and named it \'Curly.\'=young>younger+youngest',
        'The ___ policeman apprehended the daring bank robber yesterday.=brave>braver+bravest',
        'The zookeeper gave the ___ crocodiles chunks of meat to eat.=hungry>hungrier+hungriest',
        'The negative effect of the pandemic was ___ last year than this year.=more serious>serious+most serious',
        'In my opinion, this black gown is ___ than that silver dress.=more elegant>elegant+most elegant',
        'For me, gaining new experiences is ___ than buying material things.=better>good+best',
        'This car is ___ to maintain than the other cars within my budget.=easier>easy+easiest',
        'Aren\'t you surprised that this police dog is ___ than that toy dog?=friendlier>friendly+friendliest',
        'Is it true that a blue whale is ___ than one hundred female giraffes?=heavier>heavy+heaviest',
        'Do you think that killer whales are ___ predators than great white sharks?=fiercer>fierce+fiercest',
        'I chose this vegetable salad because it is ___ than pasta.=healthier>healthy+healthiest',
        'The contestant with the ___ costume was declared the over-all winner.=most authentic>authentic+more authentic',
        'Earth\'s ___ point, which is under the Pacific Ocean, is called the Challenger Deep.=deepest>deep+deeper',
        'This is the ___ food ingredient in the market so let\'s avoid using it.=least available>available+less available',
        'Do you agree that {name1} is the ___ player on their team?=weakest>weak+weaker',
        'You should buy the ___ sneakers you can find at the mall.=most comfortable>comfortable+more comfortable',
        'They decided to build the ___ log cabin they can afford.=largest>large+larger',
        'I\'ve read that the bee hummingbird is the ___ bird in the world.=smallest>small+smaller',
        'This could be the ___ river in the entire province.=most polluted>polluted+more polluted',
    ],
    8 => [
        'The ___ rider whose motorcycle hit the concrete waiting shed was penalized with a hefty fine.=careless>more careless+most careless',
        '{name1} and {name3} hid inside the stockroom when they saw their ___ gym teacher coming.=stern>sterner+sternest',
        'Mr. {surname} is ___ when it comes to building and painting plastic models of airplanes.=meticulous>more meticulous+most meticulous',
        'The aggravated restaurant manager filed a complaint in court against the ___ customer.=arrogant>more arrogant+most arrogant',
        'The ___ predator retreated back to its own nest after it caught its defenseless prey.=cunning>more cunning+most cunning',
        'We need to take time off from our work because being healthy is ___ than being wealthy.=more important>important+most important',
        'The extent of glacial melting this summer is even ___ than what was observed last year.=worse>bad+worst',
        'Many novice gymnasts dread the balance beam so it is probably ___ than vaulting.=more difficult>difficult+most difficult',
        'This new coliseum is definitely ___ than the old gym where our team used to practice.=more spacious>spacious+most spacious',
        'Now that he has graduated from college, {name1} wants to be ___ than before.=more independent>independent+most independent',
        'The prediction that the clairvoyant made last night is the ___ one I\'ve heard from anybody.=most troubling>troubling+more troubling',
        'Known to throw tantrums from time to time, {name1} is the ___ friend I\'ve ever had.=most immature>immature+more immature',
        'Though not perfectly written, this is still the ___ script I have ever read.=most interesting>interesting+more interesting',
        'The ___ criminal in the world is now being pursued by an elite team of FBI agents.=most dangerous>dangerous+more dangerous',
        'Even the ___ business that you can think of will fail if not managed properly.=most profitable>profitable+more profitable',
    ],
    9 => [
        'She is a ___ meteorologist whose dedication has helped a lot of people cope with typhoons.=remarkable>more remarkable+most remarkable',
        'He was able to win most of the races he joined because of his ___ knowledge in racing.=extensive>more extensive+most extensive',
        'The family whose ___ house burned down in the fire was immediately given free accommodation at that hotel.=unpretentious>more unpretentious+most unpretentious',
        'I contacted a number of candidates, none of whom showed any interest in my ___ offer.=generous>more generous+most generous',
        'The hunter followed the ___ creatures for quite a distance before losing sight of them on the hillside.=grotesque>more grotesque+most grotesque',
        'The boy with the shabby clothes and ___ hair quickly gobbled up the piece of cake that the priest gave him.=disheveled>more disheveled+most disheveled',
        '{name1} and {name3} were ___ to make their new food business succeed so they worked twelve hours a day.=determined>more determined+most determined',
        'The knight thrusted his gleaming blade into the stomach of the ___ ogre that terrorized the village.=repulsive>more repulsive+most repulsive',
        'Now that he has won the election, {name1} wants to be ___ than he usually is.=more magnanimous>magnanimous+most magnanimous',
        'The astronomer bought a telescope that is even ___ than what the university owns.=more sophisticated>sophisticated+most sophisticated',
        'The lawyer seated to his right looks sterner and ___ than the lawyer seated to his left.=more intimidating>intimidating+most intimidating',
        'The fierce-looking law enforcer is surprisingly ___ than the gorgeous fashion designer.=more accommodating>accommodating+most accommodating',
        '{name1}, who is now working abroad as a manager, is clearly ___ than his brother in the province.=more ambitious>ambitious+most ambitious',
        'In my opinion, those handmade chocolate-covered muffins are ___ than those colorful cupcakes.=more delectable>delectable+most delectable',
        'The newly hired engineer has proven to be ___ than his supervisor during the management meeting.=more cooperative>cooperative+most cooperative',
        'I can say that {name3}, who is a comedienne, is ___ than her sister {name4}, who is a lawyer.=more vivacious>vivacious+most vivacious',
        'My brother hired the ___ trainer he could find to manage his gym.=most expensive>expensive+more expensive',
        'That robbery incident is the ___ ordeal that {name1} has ever gone through.=most frightening>frightening+more frightening',
        'I won\'t buy her concert tickets even if she becomes the ___ celebrity in the world.=most acclaimed>acclaimed+more acclaimed',
        'This is the ___ tornado ever experienced by their town in recent history.=most destructive>destructive+more destructive',
        'The first three arrows streaked across the sky and hit the back of the ___ monster of them all.=most appalling>appalling+more appalling',
        'That expensive espresso machine is the ___ wedding gift that the newly-wed couple had received.=most extravagant>extravagant+more extravagant',
        'The ___ person in the meeting is a billionaire who made his first million selling computer software.=most eccentric>eccentric+more eccentric',
        'My best friend, {name3}, turned out to be the ___ speaker at the convention I attended last week.=most eloquent>eloquent+more eloquent',
    ],
    10 => [
        '{name1} wondered if this beautiful and ___ wife of his, whom he loved so dearly, was really capable of such a deed.=compassionate>more compassionate+most compassionate',
        '{name1} and {name2} are the owners of the company so the ___ decision whether to downsize or not is theirs to make.=challenging>more challenging+most challenging',
        'When facts fell into place and past events began making sense, a ___ picture arranged itself in his mind.=startling>more startling+most startling',
        'I sent a ___ recommendation to {name1} and {name3}, both of whom decided to wait for a few more days before acting on it.=conscientious>more conscientious+most conscientious',
        'Incorporating this feature into the chips will make them ___ enough for use in battery-powered mobile devices.=efficient>more efficient+most efficient',
        'The hovering alien craft, even ___ than the torch he was holding, suddenly lowered itself to the rocky terrain.=more radiant>radiant+most radiant',
        'Although the methods used in their study are identical to ours, the data generated by our study are more comprehensive and therefore ___ than theirs.=more conclusive>conclusive+most conclusive',
        'In the course of his job hunting, {name1} received two offers, the first of which gives more money and is therefore ___ than the second.=more enticing>enticing+most enticing',
        'The doctor said that the treatment he chose is more aggressive and would produce a quicker and ___ effect than the other options.=more pronounced>pronounced+most pronounced',
        'Despite the fact that {name3} was wearing an old dress that night, she turned out to be ___ than {name4} who wore a new and branded gown.=more glamorous>glamorous+most glamorous',
        '{name1} will release seven different versions of his mobile app, the ___ of which will be sold for under a dollar per download.=most affordable>affordable+more affordable',
        'Climate change effects such as extreme weather patterns already appear unstoppable in the ___ regions of the planet.=most susceptible>susceptible+more susceptible',
        'To prove that I am indeed the ___ investor you\'ll ever find, I will finance half of your entire business.=most committed>committed+more committed',
        'After their heated argument, Mr. {surname} has come to believe that {name1} is the ___ employee he has ever hired.=most obnoxious>obnoxious+more obnoxious',
        'The disappearance of ships in the Bermuda Triangle remains to be the ___ mystery that I\'ve personally studied.=most puzzling>puzzling+more puzzling',
    ],
    11 => [
        '{name1} is a seismologist whose ___ dedication has helped our villagers cope with earthquakes.=remarkable>more remarkable+most remarkable',
        'Mr. {surname} has won many international dog shows because of his ___ knowledge in dog training.=extensive>more extensive+most extensive',
        'The unpretentious dress that {name3} wore to the party showed how humble she is despite her ___ wealth.=immense>more immense+most immense',
        'The job applicant that we interviewed this morning couldn\'t believe our ___ compensation offer.=generous>more generous+most generous',
        'The swordsman stalked the ___ monsters for a few kilometers before launching his surprise attack.=grotesque>more grotesque+most grotesque',
        'That old man with greasy clothes and ___ hair works as a mechanic at that automotive shop.=disheveled>more disheveled+most disheveled',
        '{name1} and {name3} worked very hard because they were ___ to make their sports event successful.=determined>more determined+most determined',
        'The ___ zombies that terrorized our village were all annihilated by that powerful bomb.=repulsive>more repulsive+most repulsive',
        '{name1} has become ___ than he usually is after he was elected as our province\'s new governor.=more magnanimous>magnanimous+most magnanimous',
        'Our company provided the microbiologist with a microscope that is ___ than what she uses at the university.=more sophisticated>sophisticated+most sophisticated',
        'The enormous Siberian tiger in that cage is ___ than the old male lion in the adjacent cage.=more intimidating>intimidating+most intimidating',
        'The shopkeeper manning that corner store is ___ than any of the salespeople at the mall.=more accommodating>accommodating+most accommodating',
        '{name1}, who runs his own business, believes that there is nothing with being ___ than his father.=more ambitious>ambitious+most ambitious',
        'To be honest with you, I find those local rice cakes to be ___ than those imported biscuits.=more delectable>delectable+most delectable',
        'You need to be ___ with the police than those witnesses if you don\'t want to appear suspicious.=more cooperative>cooperative+most cooperative',
        'Rescuing that lady from her kidnappers is ___ than pursuing a group of bank robbers.=more audacious>audacious+most audacious',
        'Our neighbor hired the ___ private investigator he could find to search for his missing puppy.=most competent>competent+more competent',
        'The footage of a ghost walking around our school\'s playground is the ___ video I have ever seen.=most frightening>frightening+more frightening',
        'Our mayor, who went abroad in the middle of a calamity, is the ___ government official I\'ve met.=most thoughtless>thoughtless+more thoughtless',
        'Experts say that the Indian Ocean Tsunami is the ___ natural disaster in recent history.=most destructive>destructive+more destructive',
        'Currently, one of the ___ theories on the origin of the universe is the Big Bang Theory.=most accepted>accepted+more accepted',
        'That powerful sports car is the ___ possession that Mr {surname} has in his garage.=most extravagant>extravagant+more extravagant',
        'Once you meet Dr. {surname}, you\'ll agree with me that he is the ___ professor on campus.=most eccentric>eccentric+more eccentric',
        'I chose Atty. {surname} as my counsel because he was the ___ lawyer I could find.=most eloquent>eloquent+more eloquent',
    ],
    12 => [
        'The astute business owner was able to save his company amidst the ___ business environment created by the pandemic.=challenging>more challenging+most challenging',
        'The archaeologists have made a ___ discovery that confirms the existence of an ancient tribe in that rainforest long ago.=startling>more startling+most startling',
        'It is good to know that our governor only makes ___ decisions and will never tolerate corruption within our province.=conscientious>more conscientious+most conscientious',
        'The production managers redesigned their process flows to make their manufacturing operations ___ and cost-effective.=efficient>more efficient+most efficient',
        '{name1} hadn\'t seen the ___ side of his best friend until they found themselves in the middle of that war-torn city.=compassionate>more compassionate+most compassionate',
        'The alluring beauty pageant winner looked even ___ in that elegant but simple dress than when she wore a glittering gown.=more radiant>radiant+most radiant',
        'The forensic evidence collected by our team is considered to be ___ than the testimonies given by the other team\'s witnesses.=more conclusive>conclusive+most conclusive',
        'To a new college graduate looking for employment, the opportunity to learn high-paying skills should be more ___ than a high salary.=more enticing>enticing+most enticing',
        'The effects of the experimental chemical on the laboratory mice are ___ at a higher temperature than at a lower one.=more pronounced>pronounced+most pronounced',
        'The ornamental flower garden that {name1} maintains is ___ than any garden found around the king\'s palace.=more magnificent>magnificent+most magnificent',
        'If you are someone who\'s not into branded shoes, you might enjoy shopping at that factory outlet where the ___ sneakers in the city are found.=most affordable>affordable+more affordable',
        'Among all people, senior citizens, very young children, and sick persons are said to be ___ to that viral infection.=most susceptible>susceptible+more susceptible',
        'To prove that I am indeed the ___ employee you\'ll ever find, I will work an extra couple of hours per day for free.=most committed>committed+more committed',
        'After he made fun of those typhoon victims, I have come to the conclusion that our barangay chairman is the ___ politician of them all.=most obnoxious>obnoxious+more obnoxious',
        'When {name3} finally told everybody her decision to leave for America, the one who gave her the ___ look was {name1}.=most bewildered>bewildered+more bewildered',
    ],
];

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function gad_compute_width(string $html, int $maxWidthPx = 480, int $minWidthPx = 220): int {
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

function gad_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
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

function gad_apply_placeholders(string $tpl, array $values): string {
    $map = [];
    foreach ($values as $k => $v) $map['{' . $k . '}'] = $v;
    return str_replace(array_keys($map), array_values($map), $tpl);
}

function gad_roll_values(): array {
    global $boysPool, $girlsPool, $surnamePool;

    $name1 = $boysPool[array_rand($boysPool)];
    $name2 = $name1; $guard = 0;
    while ($name2 === $name1 && $guard++ < 20) $name2 = $boysPool[array_rand($boysPool)];

    $name3 = $girlsPool[array_rand($girlsPool)];
    $name4 = $name3; $guard = 0;
    while ($name4 === $name3 && $guard++ < 20) $name4 = $girlsPool[array_rand($girlsPool)];

    return [
        'name1'   => $name1,
        'name2'   => $name2,
        'name3'   => $name3,
        'name4'   => $name4,
        'boy'     => $name1,   // legacy: $boy = $name1
        'girl'    => $name3,   // legacy: $girl = $name3
        'surname' => $surnamePool[array_rand($surnamePool)],
    ];
}

// ---- Parse: 'sentence=correct>wrong1+wrong2' ----
function gad_parse(string $raw): ?array {
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
    $w2 = substr($rest, $plus + 1);

    if ($sentence === '' || $answer === '') return null;
    return [
        'sentence' => $sentence,
        'answer'   => $answer,
        'wrong'    => [$w1, $w2],
    ];
}

function gad_pick_question(array $pool, string $sessionKey, int $poolId): ?array {
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

    $parsed = gad_parse($raw);
    if ($parsed === null) return null;

    $values   = gad_roll_values();
    $sentence = gad_apply_placeholders($parsed['sentence'], $values);
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
    $poolId = resolve_gad_pool($lvl, $grd);
    $pool   = $sentencePools[$poolId] ?? $sentencePools[1];

    $pick = gad_pick_question($pool, $sessionKey, $poolId);
    if ($pick === null) {
        $pick = gad_pick_question($sentencePools[1], $sessionKey, 1);
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
    $boxW = gad_compute_width($filledEsc);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php gad_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $filledEsc
    . '</div>'
  , 80, $boxW); ?>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
    $boxW = gad_compute_width($sentenceEsc);

    // Shared button width = widest choice's natural pixel width
    $maxLen = 0;
    foreach ($q['choices'] as $c) {
        $maxLen = max($maxLen, strlen($c));
    }
    // 17pt Arial Bold &#8776; 12px per char + 60px for padding (40) + border (4) + buffer (16)
    $buttonWidthPx = max(140, min(400, $maxLen * 12 + 60));
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the <span style="color:#CC0066;">correct form</span> of the adjective.
  </div>
  <?php gad_box(
      '<div style="font-size:17pt;color:#333;line-height:1.55;font-weight:600;">'
    . $sentenceEsc
    . '</div>'
  , 80, $boxW); ?>  
  <div style="display:flex;flex-direction:column;align-items:center;gap:10px;width:fit-content;margin:20px auto;padding:0 8px;box-sizing:border-box;">
  
  <?php foreach ($q['choices'] as $c): ?>
    <a href="?ansclick=<?php echo urlencode($c); ?>"
       style="display:flex;align-items:center;justify-content:center;
              width:<?php echo $buttonWidthPx; ?>px;min-height:60px;padding:14px 20px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
              font-size:17pt;font-weight:700;text-align:center;
              word-break:break-word;box-sizing:border-box;line-height:1.3;">
      <?php echo htmlspecialchars($c); ?>
    </a>
  <?php endforeach; ?><br/>
  </div>
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