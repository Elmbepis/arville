<?php
// english/modules/conjunctions.php
// Conjunctions — fill in the blank with the most suitable conjunction.
// 7 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// Easy: grd<=2&#8594;1, 3-4&#8594;2, 5-6&#8594;3, 7-8&#8594;4, >=9&#8594;5     (legacy Easy)
// Hard: grd<=2&#8594;3, 3-4&#8594;4, 5-6&#8594;5, 7-8&#8594;6, >=9&#8594;7     (legacy Hard; legacy Medium folded in)
// 3 choices always (1 correct + 2 baked-in distractors), 1×3 grid.
// Name placeholders {boy}, {girl}, {name}, {surname} rolled fresh per question.

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
$moduleTitle = 'Conjunctions';
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
function resolve_conjunctions_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 2) return 1;
        if ($grd <= 4) return 2;
        if ($grd <= 6) return 3;
        if ($grd <= 8) return 4;
        return 5;
    }
    if ($grd <= 2) return 3;
    if ($grd <= 4) return 4;
    if ($grd <= 6) return 5;
    if ($grd <= 8) return 6;
    return 7;
}

// ---- Raw data (§5) — verbatim from legacy; typos fixed ----
// Format: 'correct*wrong1+wrong2=sentence with ____'
// Name placeholders: {boy}, {girl}, {name}, {surname}
$rawByTier = [
    1 => [
        'for*but+so=I like cakes, ____ they taste good.',
        'for*or+so=I washed the shirt, ____ it was dirty.',
        'and*nor+but=He ate eggs ____ drank coffee.',
        'and*nor+but=Most children like cookies ____ milk.',
        'and*nor+but=He was tired, ____ he had a headache.',
        'and*so+but=She likes apples, pears, ____ bananas.',
        'and*nor+but=My aunt ____ uncle live in California.',
        'and*so+but=They like Batman ____ Superman.',
        'nor*and+yet=She is neither rich ____ poor.',
        'nor*and+yet=I can neither whistle ____ sing.',
        'but*so+for=I want to eat, ____ there\'s no food.',
        'but*so+for=He is small ____ he is very strong.',
        'or*nor+and=Which is better, this ____ that?',
        'or*and+so=I want either a puppy ____ a fish tank.',
        'or*and+so=We saw either a whale ____ a shark.',
        'or*and+yet=I\'ll buy either this toy ____ that one.',
        'or*nor+but=Let\'s order a pizza ____ some noodles.',
        'yet*for+so=The sun is warm, ____ the air is cool.',
        'so*nor+but=I want to be smart, ____ I read a lot.',
        'so*nor+for=I was hungry, ____ I ate the bread.',
    ],
    2 => [
        'for*yet+but=He fell asleep at once, ____ he\'s very tired.',
        'for*so+or=We cleaned the house ____ it was quite messy.',
        'and*nor+but=My friend ____ I will attend the meeting.',
        'and*nor+but=Both the shoes ____ the dress were on sale.',
        'and*nor+but=You ____ I will ride together in that bus.',
        'and*nor+but=Their large dog was very hungry ____ thirsty.',
        'and*nor+so={boy} is an actor ____ {girl} is a teacher.',
        'nor*and+yet={boy} can\'t play the guitar ____ the violin.',
        'nor*but+yet=I will neither play the harp ____ the trumpet.',
        'nor*and+yet=Those men speak neither French ____ Spanish.',
        'nor*and+yet=My cousin {boy} can not dance, ____ can he act.',
        'but*or+for=I like him, ____ I don\'t like his friends.',
        'but*or+for=You can take the toys ____ not the books.',
        'but*so+for=The job is difficult, ____ the pay is low.',
        'but*so+for=He\'s a bit abrasive, ____ I still like him.',
        'but*so+for=The quiz was hard, ____ I got a high grade.',
        'nor*and+or={name} wants neither peas ____ carrots for supper.',
        'yet*for+so=He ran for two hours, ____ he didn\'t get tired.',
        'so*for+but=It was cold outside, ____ she put on her jacket.',
        'so*for+but={boy} wants to win, ____ he practices daily.',
    ],
    3 => [
        'for*yet+but=The small puppy drank some water, ____ it was thirsty.',
        'for*yet+but=Fans love to watch Karen, ____ she\'s a great actress.',
        'for*yet+but=History will be kind to me, ____ I intend to write it.',
        'for*yet+but={boy} can now buy a new car, ____ he had won the lottery.',
        'and*nor+but=I want to go to the movies ____ then to her party.',
        'and*nor+but={boy} works as a teacher ____ {girl} works as a nurse.',
        'and*nor+but={name} saw the storm coming ____ ran to the basement.',
        'and*nor+but={name} can design websites ____ write computer programs.',
        'and*nor+but=We have tickets for the symphony ____ the opera.',
        'and*nor+but=You must exercise daily ____ eat a balanced diet.',
        'nor*and+yet={girl} couldn\'t eat ____ sleep when she was sick.',
        'nor*and+yet={boy} can\'t drive a car, ____ can he ride a motorcycle.',
        'nor*and+yet=His sister can neither play the piano ____ the drums.',
        'nor*and+yet=She doesn\'t drink milk ____ does she eat butter.',
        'nor*and+yet=She hasn\'t taken dance lessons, ____ does she need to.',
        'but*so+for=It may be an old car, ____ it\'s still very useful.',
        'but*so+for={boy} studied hard, ____ he didn\'t pass the test.',
        'but*so+for=I wanted to ride my bike, ____ the tire was flat.',
        'but*so+for=I want to go to the mall, ____ my sister has my car.',
        'but*so+for=My brother is young ____ he knows a lot of things.',
        'but*so+for=We bathed the dog ____ couldn\'t remove the odor.',
        'or*and+so=Bring either a potato salad ____ some baked macaroni.',
        'or*and+so=You can give him a fish ____ you can teach him to fish.',
        'yet*for+so=He is very bright, ____ he failed that short quiz.',
        'yet*for+so=I smell the skunk, ____ I can\'t see where it is.',
        'yet*for+so=I love chocolate, ____ I do not eat chocolate cake.',
        'so*for+but={boy} was very tired, ____ he did not go diving with them.',
        'so*for+yet={girl} stubbed her toe, ____ she was limping for two days.',
        'so*nor+but=She studies every day ____ she\'ll get high grades.',
        'so*for+but=He has a broken leg, ____ he couldn\'t run that fast.',
        'so*for+but=It was raining, ____ they brought umbrellas with them.',
        'after*because+until=Let\'s go for a snack ____ we watch this movie.',
        'after*because+until=Call me ____ you arrive from work.',
        'because*unless+so=The kids stopped playing ____ it started to rain.',
        'before*unless+until=Comb your hair ____ showing yourself to them.',
        'unless*because+while=They should go on a picnic ____ it rains.',
        'until*because+unless=Just do your best ____ they notice you.',
        'while*after+unless=I can play the piano ____ you\'re dancing.',
    ],
    4 => [
        'for*yet+but={name} put on a sweater, ____ it was cold inside the theater.',
        'for*yet+but=I will be late to the party, ____ I am working until 7 p.m.',
        'for*yet+but={boy} prepared some hot soup for him, ____ he is feeling cold.',
        'and*nor+but=What you say ____ what you do are two different things.',
        'and*nor+but=My mother asked us to clean our rooms ____ wash the dishes.',
        'and*nor+but=Both my grandfather ____ my father worked in that steel plant.',
        'and*nor+but=She can draw cartoon characters ____ make abstract paintings.',
        'nor*and+yet={boy} is not the founder of this company, ____ is {girl}.',
        'nor*and+yet=He does not help around the house, ____ does he look for a job.',
        'but*so+for=This is a useful rule, ____ it\'s quite difficult to remember.',
        'but*so+for={boy} seemed lazy, ____ he finished his task on time.',
        'but*so+for=No one ____ Bert remembered to bring a notebook to class.',
        'but*so+for={boy} has a great jump shot ____ he isn\'t quick on his feet.',
        'but*so+for=It\'s definitely not spacious, ____ it is a practical kitchen.',
        'or*and+so=You can give her some money ____ you can buy her some food.',
        'or*and+so=You need to finish that project ____ you\'ll get a failing grade.',
        'or*and+so={girl} can buy the book, ____ she can borrow it from the library.',
        'or*and+so=They hid the gold either at the beach ____ by the riverbank.',
        'or*and+so=You can eat dinner early, ____ you can eat with us at midnight.',
        'yet*for+so=She is a great singer, ____ nobody has ever asked her to sing.',
        'yet*for+so=They have tried to sing like her, ____ none of them could.',
        'so*for+but={girl} forgot her shoes, ____ she wasn\'t able to hike with them.',
        'so*for+but={girl} wanted to succeed ____ she studied very hard in college.',
        'so*for+but={boy} ate all the peanuts, ____ {girl} just ate the cookies.',
        'so*for+yet=I wanted to get a nice seat, ____ I ordered my tickets early.',
        'after*while+until=Just show the painting to them ____ you\'ve finished it.',
        'unless*after+while=You shouldn\'t join that group ____ you really have to.',
        'until*because+unless={girl} continued eating ____ she was very full.',
        'while*after+unless=Let\'s listen to the radio ____ we\'re waiting for them.',
        'unless*so+after=Please don\'t call me ____ there\'s a real emergency.',
        'rather than*despite+so as to=The kids went hiking ____ swimming.',
    ],
    5 => [
        'for*yet+but={boy} brought his rubber shoes, ____ he has plans to run tonight.',
        'for*yet+but=He is putting his health at risk, ____ he has been smoking for years.',
        'for*yet+but=The coach took us out after the game ____ some pizza and ice cream.',
        'for*yet+but=We couldn\'t see the lunar eclipse, ____ the clouds blocked the moon.',
        'for*yet+but=He takes care of her very much, ____ she means everything to him.',
        'and*nor+but=His son enjoys watching fantasy movies ____ writing science fiction novels.',
        'and*nor+but={name} heard the weather report ____ became worried about the coming storm.',
        'and*nor+but={boy} drove to the golf course ____ played nine holes before lunch.',
        'and*nor+but=The authorities apprehended the criminal ____ put him behind bars.',
        'and*nor+but={girl} sent in her application ____ waited by the phone for a response.',
        'nor*and+yet={boy} didn\'t do math exercises last night, ____ did he read his book.',
        'nor*and+yet=They were not wearing raincoats, ____ were they carrying umbrellas.',
        'nor*and+yet={girl} does not like mountain climbing, ____ does she like scuba diving.',
        'nor*and+yet=I don\'t like animated movies, ____ am I a fan of movies about World War II.',
        'nor*and+yet=Our cat doesn\'t like dry cat food, ____ does it like a saucer of clam stew.',
        'but*yet+nor=Everyone ____ Dominic is interested to join our school\'s basketball team.',
        'but*so+for={girl} doesn\'t care for the beach, ____ she enjoys camping in the mountains.',
        'but*so+for={boy} had thick, curly hair years ago, ____ he is getting bald now.',
        'but*so+for=It\'s hard to believe that Clark Kent is Superman, ____ they say he really is.',
        'but*so+for=I would love to try the green mangoes, ____ they might upset my stomach.',
        'but*so+for=The timid employee wanted to impress his boss, ____ he didn\'t know what to do.',
        'but*so+for=Lions are ferocious carnivores, ____ they can be very caring towards their young.',
        'but*so+for=The people were hysterical and unrestrained, ____ he managed to pacify them.',
        'or*and+so=We can grill some chicken tonight, ____ we can just eat leftovers.',
        'or*and+so={girl} can fill an audience with joy, ____ she can make them cry a river.',
        'or*and+so=You could cry like a baby, ____ you can clean your room like an adult.',
        'or*and+so=There are no cobras in this rice field, ____ so our farm guide tells us.',
        'or*and+so=They should either change their strategy ____ just forfeit the game.',
        'yet*for+so=I like music very much, ____ I don\'t want to spend any money for that concert.',
        'yet*for+so={girl} is my smartest classmate, ____ she got a low score in the test.',
        'so*for+yet={boy} is very shy, ____ he always avoids being caught on camera.',
        'so*for+yet=My son barely touched his meal, ____ I took a spoon and finished it.',
        'so*for+yet=The dog chased the mailman, ____ the mailman ran as fast as he could.',
        'so*for+but={girl} arrived late in the office, ____ her boss made her stay after five.',
        'so*for+but={girl} wants to become famous, ____ she auditions for a part every day.',
        'so*nor+but=The food in this place is horrible ____ I will never eat here again.',
        'so*for+but=I enjoy taking photographs of animals, ____ I go to the zoo frequently.',
        'because*unless+after=Please stop blowing that horn ____ it is really annoying.',
        'before*unless+until={name} prepared the materials ____ working on the project.',
        'because*unless+until={girl} is a good daughter ____ she always obeys her parents.',
        'unless*because+after={boy} shouldn\'t go near that river ____ he\'s a good swimmer.',
        'until*because+while=The machine didn\'t stop making noise ____ they turned it off.',
        'until*because+after=Don\'t stop eating ____ there\'s nothing left on your plate.',
        'before*unless+until={boy} put on his life vest ____ he left on that small boat.',
        'until*because+so=The store is refusing to deliver the package ____ it\'s fully paid.',
        'before*unless+while=It\'s not advisable to eat a heavy or spicy meal ____ you go to bed.',
        'after*while+until=You can only watch TV ____ you finish all your assignments.',
        'while*after+unless=I can just watch a movie ____ you\'re shopping for clothes.',
        'rather than*even though+so as to={girl} chose to walk away ____ argue with Roger.',
        'even though*rather than+so as to=The woman drove the car ____ it had a flat tire.',
        'despite*rather than+so as to={name} refused to eat the cake ____ being so hungry.',
        'despite*even though+so as to=Their best player continued playing ____ being injured.',
        'rather than*despite+so as to={girl} chose to sing on the stage ____ dance with him.',
        'rather than*despite+so as to={name} opted to stay home ____ go to the playground.',
        'even though*rather than+so as to=The men worked ____ they were tired and hungry.',
        'even though*rather than+so as to={name} did not bring an umbrella ____ it was raining.',
        'as though*rather than+despite={girl} got mad at Peter, ____ he had done something wrong.',
        'despite*rather than+even though={boy} can still make a living ____ his unusual illness.',
    ],
    6 => [
        'for*yet+but=This is a good school to study in, ____ the teachers here are all competent.',
        'for*yet+but=That is one of the best schools around, ____ they have an excellent facility.',
        'for*yet+but=I go to the park every weekend, ____ I enjoy watching the ducks on the lake.',
        'for*yet+but={girl} provides scholarships to many children, ____ she is a genuinely good person.',
        'for*yet+but=The biologist handled the snake very carefully, ____ he didn\'t want to be bitten.',
        'for*yet+but=The old professor admires his top student, ____ he is very studious and intelligent.',
        'and*nor+but=Manila is a highly populated city ____ suffers from many symptoms of urban blight.',
        'and*nor+but=Use your credit cards irresponsibly ____ you\'ll soon find yourself immersed in debt.',
        'and*nor+but={boy} designed the computer hardware ____ {girl} developed the corresponding software.',
        'and*nor+but=I will be responsible for security, ____ you will take care of the entertainment.',
        'and*nor+but=All he needed for his impromptu concert is an electric guitar ____ an amplifier.',
        'nor*and+yet=We don\'t have the resources to correct this problem, ____ is it practical to do so.',
        'nor*and+yet=I am not capable of modifying this machine, ____ do I have the permission to do so.',
        'nor*and+yet=We can no longer distribute the brochures, ____ can we give the product presentation.',
        'nor*and+yet=The physicist could neither defend his theory ____ show experimental results to prove it.',
        'nor*and+yet=The doctors couldn\'t find a cure for the illness, ____ do they have a clue about its cause.',
        'but*so+for=I always bring these magazines with me, ____ I never get the chance to read them.',
        'but*so+for=Her technique is not yet well-developed, ____ she exudes unwavering self-confidence.',
        'but*so+for=They were practically penniless from the start, ____ their business still succeeded.',
        'but*so+for=The mathematician couldn\'t solve the equation at first, ____ he did not get discouraged.',
        'but*so+for={boy} lost a fortune in the stock market, ____ he still seems to be living in comfort.',
        'but*so+for=Our labrador puppy loves having his head scratched ____ hates getting his claws trimmed.',
        'but*so+for={boy} intended to go to the ball game, ____ his wife made him go to the opera instead.',
        'but*so+for=The policemen interrogated the captured fugitive, ____ he refused to say a single word.',
        'but*so+for=I tried to correspond with the politician, ____ he is not receiving my email messages.',
        'or*and+so=We didn\'t know if we should wait to be rescued, ____ just get out and swim to safety.',
        'or*and+so=I could buy an expensive coat, ____ I could buy several other things that are cheaper.',
        'or*and+so=The finance manager ____ his new deputy will notify you when the report is ready.',
        'or*and+so=The perpetrator of this scam must pay restitution, ____ face the wrath of his victims.',
        'or*and+so=Our engineer can rehabilitate this old machine, ____ we can just buy a new one.',
        'or*and+so=The student can buy the hardware for his project, ____ he can just assemble it himself.',
        'or*and+so=Mr. {surname} must hire better lawyers immediately, ____ he\'ll lose the case and go to jail.',
        'yet*for+so=The ballerina was nursing a sore foot, ____ she still executed her number flawlessly.',
        'yet*for+so=The typhoon uprooted all the trees in that village, ____ their house remained standing.',
        'yet*for+so=The tourists complained loudly about the heat, ____ they continued to play golf every day.',
        'so*for+but=I want to be a psychiatrist someday, ____ I am studying hard to get into that university.',
        'so*for+but=The citizens demanded drastic changes in government, ____ the president took swift actions.',
        'so*for+but=She is still a young professor, ____ it surprised me a bit when she won that prestigious award.',
        'so*for+or=The governor wanted to impress his constituents, ____ he spent a lot of money on infrastructure.',
        'so*for+yet=My uncle was able to raise the required capital, ____ he can now start his trading business.',
        'until*because+unless=Please stay here and keep me company ____ my brother arrives to fetch me.',
        'until*because+unless={girl} didn\'t learn to play the guitar ____ she reached the age of fifteen.',
        'unless*because+after=You can\'t submit the application form ____ all the blanks are filled in.',
        'while*after+unless=The famous singer performed magnificently ____ his audience watched him in awe.',
        'after*unless+until={boy} felt sick immediately ____ he drank that cleaning solution by accident.',
        'after*unless+but={boy} drank more than a liter of iced tea ____ he ran for two hours in that marathon.',
        'until*because+yet=The cheerleaders should continue practicing in this gym ____ they perfect their routine.',
        'because*unless+so=You will represent our school in that contest ____ you topped all the evaluation tests.',
        'after*because+until=We can only go on vacation ____ we complete and submit all these business proposals.',
        'until*because+unless=Please help me choreograph this dance number ____ our dance instructor arrives.',
        'because*unless+so=Their negotiation ended on a stalemate ____ neither side would make amends.',
        'unless*because+after=The neurosurgeons won\'t operate on him ____ his relatives agree to sign the waiver.',
        'before*unless+yet={boy} and {girl} had an intense argument ____ they finally decided to part ways.',
        'until*because+so={name} should continue applying this medicated cream ____ all the symptoms are gone.',
        'despite*rather than+so as to={name} won the race ____ being much older than the other runners.',
        'rather than*as though+so as to=Their teacher will assign them a project ____ give them a quiz.',
        'so as to*even though+despite=The seller simply repainted the bicycle ____ make it look new.',
        'despite*because+even though=His uncle was able to restore that antique car ____ being handicapped.',
        'even though*rather than+so as to=Mr. {surname} lives in a small and old house ____ he is a millionaire.',
        'rather than*so as to+despite=Their company decided to pay the licensing fees ____ face their rival in court.',
        'rather than*because+so as to=The mechanic opted to refurbish the engine ____ replace it with a new one.',
        'even though*because+despite=We can still solve this predicament ____ we lack the necessary resources.',
        'rather than*despite+so as to=His mother asked him to eat first ____ go to the picnic on an empty stomach.',
        'as though*rather than+so as to=The lion greedily gorged on the antelope, ____ it hadn\'t eaten in months.',
    ],
    7 => [
        'for*yet+but=We will make a huge fortune soon, ____ this is the coolest product to ever come out of our factory.',
        'for*yet+but={boy} thought he had a good chance to get the job, ____ his father was on the company\'s board of trustees.',
        'for*yet+but=You shouldn\'t waste a single drop of that bird\'s nest soup, ____ it is expensive and time-consuming to prepare.',
        'for*yet+but={boy} was picked as a prime candidate for the next batch of astronauts, ____ he was physically and mentally fit for the job.',
        'and*nor+but=His uncle mentioned to us that he used to collect rubber sneakers ____ build model airplanes.',
        'and*nor+but=Manufacturing companies must be allowed to develop new products ____ market them their own way.',
        'and*nor+but={boy} and {girl} arrived at the bus station before noon ____ had lunch before leaving for Batangas.',
        'nor*and+yet=You should not tolerate their incessant complaining, ____ should you extend their lease on this facility.',
        'nor*and+yet=The activists were not allowed to stage a demonstration, ____ were they given a chance to talk to the mayor.',
        'nor*and+yet=The institution doesn\'t have the financial capability to pursue this project, ____ does it have the political will to do so.',
        'but*so+for={boy} is the best player on our team ____ you scored twelve points more than him in that championship game.',
        'but*so+for=They had the mental toughness to finish the adventure, ____ they were too exhausted to go on.',
        'but*so+for=We were able to secure the loan to buy the property, ____ someone else had bought it already.',
        'but*so+for=The physicist tried to finish his experiment before the conference, ____ he ran out of time and resources.',
        'but*so+for=Mr. {surname} tutored his daughter on algebra for many hours, ____ she still performed dismally in her test.',
        'or*and+so=We can start convincing people to support us, ____ we can just sit here and wait for something to happen.',
        'or*and+so={girl} must really like to surf the web, ____ she wouldn\'t tolerate this bad connection to stay online.',
        'or*and+so=The company can just buy the software, ____ it can hire a team of programmers to develop a similar one.',
        'or*and+so=The mayor can either set up livelihood programs ____ distribute scholarships to deserving students.',
        'yet*for+so=The laws in that country are very strict, ____ there are many crime syndicates thriving there.',
        'yet*for+so=The problem of climate change is now upon us, ____ nobody seems to know the best way to address it.',
        'yet*for+so=All his businesses are booming, ____ you can never convince him to spend for a well-deserved vacation.',
        'yet*for+so=Mankind\'s technology has advanced tremendously over the years, ____ world peace is as elusive as ever.',
        'yet*for+so={boy} followed the given instructions step by step, ____ he wasn\'t able to make the mechanism work.',
        'yet*for+so=Superman is just using a pair of eyeglasses to conceal his identity, ____ not a single person can recognize him as Clark Kent.',
        'yet*for+so=The organization did its best to serve the community, ____ the mayor and the city council did not appreciate their efforts.',
        'so*for+but=That pharmaceutical company registered record-breaking profits, ____ its investors are all ecstatic.',
        'so*for+yet=The mountainside has been completely denuded, ____ various organizations launched a reforestation project.',
        'so*for+but=Captain America couldn\'t handle the dire situation by himself, ____ he called in the rest of the Avengers.',
        'so*for+yet=The radio reported that a thunderstorm was coming, ____ {name} prepared enough food and water for five days.',
        'unless*because+after=You must not invest your money in that business ____ you have proof that it\'s legitimate.',
        'because*unless+after=The students have started studying diligently ____ they will soon have their periodical tests.',
        'after*unless+until=Eliza\'s lawyer filed for a restraining order ____ her stalker intruded into their home.',
        'because*unless+so=Our manager wants you to spearhead this campaign ____ you have an impressive track record.',
        'unless*while+after=Please refrain from using this tranquilizer gun on that animal ____ your life is put in danger.',
        'until*because+unless=Imelda consistently won those spelling championships ____ Zenaida wrested the title from her.',
        'while*after+unless={girl} wrote the script for that documentary video ____ {boy} was the one who narrated it.',
        'before*unless+until=I think you should have your car\'s air conditioning unit fixed first ____ you embark on that long drive.',
        'while*because+unless=To make ends meet, Mr. {surname} peddled snacks in schools ____ Mrs. {surname} worked as a parking attendant.',
        'after*unless+until=The share price of their company immediately plummeted ____ news of their declining sales broke out.',
        'until*because+while=The quality manager doesn\'t want to honor the warranty ____ she receives a copy of the proof of purchase.',
        'unless*because+after=You must not distribute these electronic gadgets ____ you have documents proving that they are safe for public use.',
        'because*unless+so=Their department is expediting the production of the ordered goods ____ they want to make a good first impression on the buyer.',
        'even though*rather than+so as to=The company decided to hire the engineer ____ they knew nothing about him.',
        'so as to*even though+rather than=The boys took off their shoes ____ avoid scratching the newly varnished floors.',
        'rather than*as though+so as to={girl} decided to stay home and study for her test ____ spend time with her friends at the mall.',
        'even though*rather than+so as to={boy} will donate his truck to the orphanage ____ he is very attached to it.',
        'even though*because+despite=They proceeded with the construction of the building ____ some of their investors backed out.',
        'so as to*despite+as though=The biologist tranquilized the agitated rhinoceros ____ prevent it from hurting itself.',
        'as though*despite+rather than=The innkeeper froze in his tracks when he saw the stranger, ____ he had seen a ghost.',
        'despite*because+until=Mr. {surname} promised to pay for their tuition fees ____ having some financial problems of his own.',
        'despite*because+unless=Their organization was able to complete the project on time ____ encountering so many obstacles along the way.',
    ],
];

// ---- Name pools ----
$boysNames = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles','Christopher','Daniel',
    'David','Diego','Dominic','Gabriel','Ian','Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan',
    'Joseph','Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver',
    'Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girlsNames = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn',
    'Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria',
    'Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];
$surnames = ['Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales','Martinez','Mendez','Paredes','Revilla','Santos','Tolentino'];

// ---- Pre-parse (§5.1) ----
function parse_conj_item(string $raw): ?array {
    $eq = strpos($raw, '=');
    if ($eq === false) return null;
    $left     = substr($raw, 0, $eq);
    $sentence = substr($raw, $eq + 1);
    $star = strpos($left, '*');
    $plus = strpos($left, '+');
    if ($star === false || $plus === false || $star > $plus) return null;
    $correct = substr($left, 0, $star);
    $wrong1  = substr($left, $star + 1, $plus - $star - 1);
    $wrong2  = substr($left, $plus + 1);
    if ($correct === '' || $wrong1 === '' || $wrong2 === '' || $sentence === '') return null;
    return [
        'sentence' => $sentence,
        'correct'  => $correct,
        'wrong'    => [$wrong1, $wrong2],
    ];
}

$items = [];
foreach ($rawByTier as $tier => $rawList) {
    $items[$tier] = [];
    foreach ($rawList as $raw) {
        $p = parse_conj_item($raw);
        if ($p !== null) $items[$tier][] = $p;
    }
}

// ---- Helpers (§8.4, §8.6) ----
function conj_box(string $html, int $minHeight = 100): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}
function conj_render_filled(string $sentence, string $answer): string {
    $esc = htmlspecialchars($sentence);
    $ans = htmlspecialchars($answer);
    return str_replace(
        '____',
        '<strong style="color:#CC0066;">' . $ans . '</strong>',
        $esc
    );
}
function conj_apply_names(string $template, array $names): string {
    return str_replace(
        ['{boy}', '{girl}', '{name}', '{surname}'],
        [$names['boy'], $names['girl'], $names['name'], $names['surname']],
        $template
    );
}

// ---- No-repeat picker (§6.2) ----
function pick_conj_item(array $pool, string $sessionKey, int $tier): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        if (!in_array("t$tier:$i", $used, true)) $available[$i] = $item;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        foreach ($pool as $i => $item) $available[$i] = $item;
    }
    $idx    = array_rand($available);
    $item   = $available[$idx];
    $used[] = "t$tier:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return $item;
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $tier = resolve_conjunctions_tier($lvl, $grd);
    $pool = $items[$tier] ?? $items[1];
    if (empty($pool)) $pool = $items[1] ?? [];
    $item = pick_conj_item($pool, $sessionKey, $tier);

    // Roll names fresh for this question
    $names = [
        'boy'     => $boysNames[array_rand($boysNames)],
        'girl'    => $girlsNames[array_rand($girlsNames)],
        'surname' => $surnames[array_rand($surnames)],
    ];
    $names['name'] = (rand(1, 2) === 1) ? $names['boy'] : $names['girl'];

    $sentence = conj_apply_names($item['sentence'], $names);

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'sentence' => $sentence,
        'correct'  => $item['correct'],
        'choices'  => $choices,
        'lvl'      => $lvl,
        'tier'     => $tier,
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
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $sentenceFilled = conj_render_filled($cur['sentence'], $cur['correct']);
    $correctEsc     = htmlspecialchars($cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php conj_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;">'
    . $sentenceFilled
    . '</div>'
  , 130); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The correct conjunction is '<strong style="color:#CC0066;font-size:15pt;"><?php echo $correctEsc; ?></strong>'.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Fill in the blank with the most suitable conjunction.
  </div>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#800080;max-width:480px;margin:0 auto 15px;">
    Click on your answer.
  </div>
  <?php conj_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;">'
    . $sentenceEsc
    . '</div>'
  , 130); ?>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:20px auto;">
    <tr>
    <?php foreach (array_chunk($q['choices'], 3) as $row): ?>
      <?php foreach ($row as $c): ?>
        <td align="center" valign="middle">
          <a href="?ansclick=<?php echo urlencode($c); ?>"
             style="display:flex;align-items:center;justify-content:center;
                    min-width:120px;max-width:180px;min-height:64px;padding:12px 16px;
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
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
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