<?php
// english/modules/prepositions.php
// Prepositions — fill in the blank with the correct preposition.
// 7 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// Easy: grd<=2&#8594;1, 3-4&#8594;2, 5-6&#8594;3, 7-8&#8594;4, >=9&#8594;5     (legacy Easy)
// Hard: grd<=2&#8594;3, 3-4&#8594;4, 5-6&#8594;5, 7-8&#8594;6, >=9&#8594;7     (legacy Hard; legacy Medium folded in)
// 3 choices always (1 correct + 2 baked-in distractors), 1×3 grid.

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
$moduleTitle = 'Prepositions';
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
function resolve_prepositions_tier(string $lvl, int $grd): int {
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

// ---- Raw data (§5) — verbatim from legacy ----
// Format: 'correct*wrong1+wrong2=sentence with ____'
$rawByTier = [
    1 => [
        'on*in+at=My birthday is ____ Monday.',
        'on*in+at=Let\'s meet ____ Friday.',
        'on*in+at=The keys are ____ the table.',
        'on*in+at=They are ____ time.',
        'on*in+at=We will jog ____ that trail.',
        'on*in+at=We live ____ a busy road.',
        'at*in+on=They will arrive ____ 5 p.m.',
        'at*in+on=Lions also hunt ____ night.',
        'at*in+on=Let\'s meet ____ half past ten.',
        'at*in+on=We first met ____ a party.',
        'at*in+on=We got the bag ____ 7 o\'clock.',
        'at*in+on=I will come home ____ 5 o\'clock.',
        'at*in+on=He is ____ work right now.',
        'at*in+on=My plane leaves ____ noon.',
        'at*in+on=The movie starts ____ 6 p.m.',
        'at*in+on=She will see him ____ home.',
        'at*in+on=That man always runs ____ night.',
        'at*in+on=We live ____ 345 Main Street.',
        'in*at+on=My birthday is ____ July.',
        'in*at+on=She graduated ____ 2010.',
        'in*at+on=She was born ____ 2004.',
        'in*at+on=I left my bag ____ a taxi.',
        'in*at+on=The cat is ____ the house.',
        'in*at+on=I\'ll be there ____ one hour.',
        'in*at+on=Monkeys live ____ the jungle.',
        'in*at+on=I live ____ an apartment.',
        'in*at+on=She lives ____ Bangkok.',
        'in*at+on=Tara was born ____ 1977.',
        'in*at+on=Let\'s meet ____ the morning.',
        'for*at+on=I\'m looking ____ my keys.',
        'for*at+on=This sandwich is ____ you.',
        'for*at+on=I\'m saving ____ a new car.',
        'for*at+on=We worked ____ three hours.',
    ],
    2 => [
        'on*in+at=My sister will be here ____ Thursday.',
        'on*in+at=They hung the picture ____ the wall.',
        'on*in+at=His room is ____ the second floor.',
        'on*in+at=He spoke about science ____ TV.',
        'on*in+at=My favorite show is ____ channel 7.',
        'on*in+at=My friend needs a book ____ science.',
        'on*in+at=Thank you for being here ____ time.',
        'on*in+at=Your new pencil is ____ her desk.',
        'on*in+at=My blue ballpen is ____ the bench.',
        'on*in+at=His leather bag is ____ the sofa.',
        'on*in+at=My father does not work ____ Sundays.',
        'on*in+at=Our family will go ____ an airplane.',
        'on*in+at=Our tennis match will be ____ Monday.',
        'on*in+at=We might visit the zoo ____ Sunday.',
        'on*in+at=I left your keys ____ my table.',
        'on*in+at=We rode the boat ____ the river.',
        'on*in+at=Your book is ____ the upper shelf.',
        'at*in+on=His friends met him ____ a concert.',
        'at*in+on=He is twenty years old ____ most.',
        'at*in+on=Let\'s start the meeting ____ 9 o\'clock.',
        'in*at+on=I will be back ____ about three weeks.',
        'in*at+on=The days are really long ____ March.',
        'in*at+on=I found my old book ____ my room.',
        'in*at+on=She said she will retire ____ August.',
        'in*at+on=Some of my cousins live ____ Germany.',
        'in*at+on=There are 60 seconds ____ a minute.',
        'in*at+on=This house was built ____ 1967.',
        'in*at+on=School usually starts ____ June.',
        'in*at+on=The flowers will bloom ____ spring.',
        'in*at+on=The leaves will fall ____ autumn.',
        'in*at+on=There is a wasp ____ that room.',
        'for*at+on=I jog ____ 10 miles every day.',
        'for*at+on=Sleeping late is bad ____ you.',
        'for*at+on=I bought it ____ 10 pesos only.',
        'for*at+on=Keep walking ____ two kilometers.',
        'for*at+on=This birthday gift is ____ you.',
        'for*at+on=I\'m going to Paris ____ two weeks.',
        'from*on+for=Paper comes ____ wood pulp.',
        'from*on+for=My car is different ____ yours.',
        'by*in+since=I\'ll be back ____ Wednesday.',
        'by*in+since=We came to this place ____ car.',
        'by*in+since=They all travelled ____ train.',
    ],
    3 => [
        'on*in+at=That old man always runs ____ the sidewalk.',
        'on*in+at=He will have dinner with her ____ Thursday.',
        'on*in+at=Children get presents ____ Christmas Day.',
        'on*in+at=The picture is ____ page 7 of that book.',
        'on*in+at=I\'ll see you in church ____ Easter Sunday.',
        'on*in+at=There is an apple ____ the teacher\'s desk.',
        'on*in+at=Please don\'t put your shoes ____ the table.',
        'on*in+at=We live ____ a busy street in a large city.',
        'on*in+at=My eldest brother\'s birthday is ____ Monday.',
        'on*in+at=The duplicate keys are ____ the coffee table.',
        'on*in+at=Our conference room is ____ the fourth floor.',
        'at*in+on=We usually visit our grandmother ____ night.',
        'at*in+on=You can buy a chocolate sundae ____ McDonald\'s.',
        'at*in+on=That country is ____ war with its neighbor.',
        'at*in+on=They are expected to arrive ____ 5 p.m.',
        'in*at+on=That history book was published ____ 1999.',
        'in*at+on=Our English class is ____ the morning.',
        'in*at+on=He likes to read a book ____ the afternoon.',
        'in*at+on=I usually have my vacation there ____ March.',
        'in*at+on=We always work in the garden ____ spring.',
        'in*at+on=You can look up the word ____ a dictionary.',
        'for*at+on=They are waiting ____ the bus to arrive.',
        'for*at+on=You use a corkscrew ____ opening bottles.',
        'for*at+on=We did not see each other ____ two years.',
        'for*by+on=I bought this cake ____ his birthday party.',
        'from*on+for=That train goes ____ Manila to Laguna.',
        'from*on+for=These balloons came ____ my friend, Eric.',
        'from*on+for=Our cheerful visitor came ____ Argentina.',
        'from*on+for=This long letter came ____ my wife.',
        'from*on+for=I will try to be good ____ now on.',
        'from*on+for=This package was sent ____ Saudi Arabia.',
        'from*on+for=That toy car came ____ my cousins in China.',
        'by*in+at=My closest friends are standing ____ me.',
        'by*in+since=That song was written ____ Madonna.',
        'by*in+since=Fireworks were invented ____ the Chinese.',
        'by*in+since=The whole thing happened ____ accident.',
        'by*in+since=He lost the race ____ five seconds.',
        'by*in+since=These eggs are sold ____ the dozen.',
        'by*in+since=The shirts will be ready ____ tomorrow.',
        'by*in+since=They are sitting ____ the window right now.',
        'by*in+since=The flowers were delivered ____ a postman.',
        'by*in+since=We must finish this project ____ Friday.',
        'since*for+from=It hasn\'t been this cold ____ January.',
        'since*for+from=I\'ve been awake ____ early this morning.',
        'since*for+from=It has been a week ____ our last quiz.',
        'since*for+from=Gino has been excited ____ yesterday.',
        'since*for+from=Laura has not eaten any pork ____ 2007.',
        'since*for+from=Timmy hasn\'t called ____ the day he left.',
        'until*since+from=The sun didn\'t rise today ____ 6 A.M.',
        'until*since+from=Please stay with me here ____ midnight.',
    ],
    4 => [
        'on*in+at=We can have dinner together ____ Independence Day.',
        'on*in+at=My sister and her classmate will be here ____ Wednesday.',
        'on*in+at=There is a basket of green apples ____ the dining table.',
        'on*in+at=Let\'s have our preliminary business meeting ____ Friday.',
        'on*in+at=The strange photograph is ____ page 34 of that magazine.',
        'on*in+at=The students need an excellent book ____ organic chemistry.',
        'on*in+at=Being always ____ time is one thing I like about you.',
        'on*in+at=Their employees are not required to work ____ Saturday.',
        'on*in+at=For the holidays, we have decided to go ____ a cruise.',
        'on*in+at=My physics professor was interviewed ____ TV about science.',
        'on*in+at=Please don\'t put your muddy sneakers ____ that wooden bench.',
        'on*in+at=She will bring her kids to that amusement park ____ Sunday.',
        'at*in+on=My employees always leave the office ____ 5 o\'clock.',
        'at*in+on=Every week, we visit our grandmother ____ the hospital.',
        'at*in+on=We can not call his phone because he is still ____ work.',
        'at*in+on=The concert starts ____ 7 p.m. and it\'s two hours long.',
        'at*in+on=We conduct our daily business ____ 1320 San Andres St.',
        'at*in+on=Lions and hyenas have been observed to hunt ____ night.',
        'at*in+on=Their consultants are scheduled to arrive ____ 5 p.m.',
        'at*in+on=Let\'s start the conference promptly ____ 9 o\'clock tomorrow.',
        'at*in+on=Believe me, he can not be interrupted if he\'s ____ work.',
        'at*in+on=He was ____ home watching a movie when the earthquake struck.',
        'in*at+on=My chemistry and physics classes are ____ the morning.',
        'in*at+on=He won a championship trophy in billiards ____ 2009.',
        'in*at+on=The construction of this building started ____ 1972.',
        'in*at+on=Those friends of mine graduated from high school ____ 2004.',
        'for*at+on=Charles is going on a vacation ____ three weeks.',
        'for*since+by=We organized this celebration just ____ you.',
        'for*since+by=Korina is going on a vacation in Alaska ____ two months.',
        'for*since+by=I\'m looking ____ my keys, so please help me find them.',
        'from*on+for=He works in that factory ____ Monday to Friday.',
        'from*on+for=We painted that fence ____ Tuesday to Thursday.',
        'from*on+for=Apples and bananas ____ that country are very sweet.',
        'from*on+for=Those fruits came ____ our neighbors next door.',
        'from*on+for=They are expected to arrive ____ Thailand any time now.',
        'from*on+for=I promise to fulfill all my obligations ____ now on.',
        'from*on+for=Our company imports all its raw materials ____ America.',
        'from*on+for=I trained hard for that competition ____ March to June.',
        'by*in+since=He is her strength for he always stands ____ her.',
        'by*in+since=She was taught to sing ____ a professional singer.',
        'by*in+since=The script for that movie was written ____ Mr. Cruz.',
        'by*in+since=These herbal drinks are being sold online ____ the case.',
        'since*for+from=They haven\'t seen each other ____ last year.',
        'since*for+from=We have been waiting for you ____ three o\'clock.',
        'since*for+from=They haven\'t talked to each other ____ last month.',
        'since*for+from=The little baby has been crying ____ six o\'clock.',
        'since*for+from=Our team has not won a game ____ one month ago.',
        'since*for+from=These puppies haven\'t eaten anything ____ early today.',
        'since*for+from=It hasn\'t been this hot in this city ____ April of 1988.',
        'since*for+from=Their dog has not been given a bath ____ last month.',
        'since*for+from=The students have been surfing the web ____ last night.',
        'until*since+from=She\'s in Cebu and will be there ____ next Monday.',
        'until*since+from=I won\'t be back from vacation ____ next Tuesday.',
        'until*since+from=I\'m sleepy so I can only study with you ____ 6 P.M.',
        'until*since+from=They didn\'t finish the project ____ late last night.',
        'until*since+from=Paul didn\'t learn to speak ____ his second birthday.',
    ],
    5 => [
        'on*in+at=We hung that expensive painting ____ a wall in our living room.',
        'on*in+at=That popular Korean TV series will soon be shown ____ channel 2.',
        'on*in+at=Being ____ time is important for academic and professional success.',
        'on*in+at=I was able to purchase two tickets for the big concert ____ Friday.',
        'on*in+at=I found the silver bracelet you\'re looking for ____ that dusty shelf.',
        'on*in+at=The housekeeper placed your car keys ____ top of that marble counter.',
        'on*in+at=That popular American reality show will soon be shown ____ channel 21.',
        'on*in+at=Please don\'t leave those dirty sneakers of yours ____ my office chair.',
        'on*in+at=We can celebrate our silver wedding anniversary ____ Independence Day.',
        'on*in+at=My cousins live ____ a narrow and winding street in a populous village.',
        'on*in+at=Our company will conduct its annual engineering conference ____ Tuesday.',
        'on*in+at=We put what\'s left of the persimmons ____ the large table in the kitchen.',
        'at*in+on=Our corporate headquarters is located ____ 1010 Technology St.',
        'at*in+on=The dreaded criminal stalks his prospective victims ____ night.',
        'at*in+on=The firefighters were able to put out the fire ____ 10 o\'clock.',
        'at*in+on=Let\'s meet ____ half past nine so we can talk about your adventure.',
        'at*in+on=When we first met ____ a party, I couldn\'t look straight into her eyes.',
        'at*in+on=The charity program will commence ____ exactly 8 o\'clock tonight.',
        'at*in+on=The policemen were able to apprehend that fugitive ____ noon today.',
        'at*in+on=The mobile device that you\'re looking for is available ____ Radio Shack.',
        'at*in+on=As long as there are greedy politicians, there will be countries ____ war.',
        'in*at+on=The first transistor was invented at Bell Laboratories ____ 1947.',
        'in*at+on=Tigers live ____ the jungle, so you can\'t keep one in our compound.',
        'in*at+on=If I\'m not mistaken, there are 60,000 milliseconds ____ one minute.',
        'in*at+on=My parents will celebrate their silver wedding anniversary ____ July.',
        'in*at+on=Please don\'t leave yet because I will definitely be there ____ one hour.',
        'in*at+on=Living ____ Germany is something that I would like to experience someday.',
        'in*at+on=Due to lack of time, I had to finish that technical report ____ a taxi.',
        'for*since+by=These marathon enthusiasts can run ____ 20 miles every day.',
        'for*since+by=She said that they\'ve been waiting ____ the bus to arrive since noon.',
        'for*since+by=Johnny has not seen their eccentric professor ____ two years already.',
        'for*since+by=Her father bought her an old but reliable car ____ her birthday.',
        'for*since+by=Cigarettes are bad ____ your health, especially at your age.',
        'for*since+by=She\'s saving fifty pesos a day ____ next semester\'s tuition fee.',
        'for*since+by=Manny purchased this branded sunglasses ____ just one hundred pesos.',
        'for*since+by=The employees worked ____ ten hours and earned a lot of overtime pay.',
        'for*since+by=My son is going on a business trip to Thailand ____ three weeks.',
        'for*since+by=They have been waiting for that package ____ three days already.',
        'for*since+by=That appointment with the cardiologist is actually ____ your father.',
        'for*since+by=Ferdie purchased the software development kit online ____ just $180.',
        'for*since+by=To win that automobile, he had to drive it ____ eleven exhausting hours.',
        'from*on+for=My nephew attended college in our province ____ 2004 to 2008.',
        'from*on+for=Those hungry carnivores hunted for food ____ dawn to dusk.',
        'from*on+for=Sonia received an anniversary gift ____ her thoughtful husband.',
        'from*on+for=The naughty boy received a long scolding ____ his disgusted teacher.',
        'from*on+for=It will take two hours for the plane to fly ____ our city to yours.',
        'from*on+for=Please don\'t ask me to drive this car ____ here to your province.',
        'from*on+for=We definitely can\'t accept anything ____ a person like him.',
        'from*on+for=We have never seen each other ____ the time I left our boarding house.',
        'from*on+for=Let\'s embark on an ambitious expedition ____ Africa to Europe.',
        'from*on+for=Our research team developed this innovative product ____ 1998 to 2010.',
        'from*on+for=Please try to understand the situation ____ my perspective.',
        'from*on+for=We must learn to distinguish the poisonous species ____ the edible ones.',
        'from*on+for=This equipment segregates the defective parts ____ the functional ones.',
        'by*in+since=I\'m glad that you stood ____ me through all the hardships.',
        'by*in+since=They\'ve left already. You missed them ____ just five minutes.',
        'by*in+since=Our family will be back from vacation ____ Thursday next week.',
        'by*in+since=After all these years, our paths crossed again today ____ accident.',
        'by*in+since=According to the mayor, this road will be completed ____ next year.',
        'by*in+since=They say that this polluted river will be clean again ____ 2025.',
        'by*in+since=The students who are under training should be excellent ____ now.',
        'by*in+from=Due to calculation errors, the rocket missed its target ____ five meters.',
        'by*in+since=The scores of the contest participants are being tallied ____ the judges.',
        'by*in+since=These fruits and vegetables will all be gone ____ the time you get here.',
        'by*in+from=The renowned biochemist unearthed his greatest discovery ____ accident.',
        'since*for+from=Mr. Domingo hasn\'t been to a carnival ____ his childhood years.',
        'since*for+from=Karen has not seen that antique statue ____ her ninth birthday.',
        'since*for+from=Mr. Roxas hasn\'t driven a car ____ the day of that tragic accident.',
        'since*for+from=Helen hasn\'t seen her high school classmates ____ two decades ago.',
        'since*for+from=The officials have been waiting for you to arrive ____ four o\'clock.',
        'since*for+from=The two leaders haven\'t negotiated with each other ____ last year.',
        'since*for+from=The old man has been sick in bed ____ his mild stroke last month.',
        'since*for+from=The orphans have been begging for food ____ five o\'clock this morning.',
        'until*since+from=The football players did not start practicing ____ noon today.',
        'until*since+from=Willy needs to take his medicines ____ the end of this month.',
        'until*since+from=I need to go home early so I can only wait for you ____ 4 P.M.',
        'until*since+from=We must keep this business viable ____ the closure of that deal.',
        'until*since+from=Pamela won\'t be able to talk to him ____ his return from abroad.',
        'until*since+from=Please stay and keep me company in this restaurant ____ midnight.',
        'until*since+from=In this part of the world, the sun doesn\'t rise ____ after 6 A.M.',
        'until*since+from=Paulie didn\'t utter his first word ____ after his third birthday.',
        'until*since+from=They have no choice but to perform the procedure ____ the last step.',
        'until*since+from=I\'m on vacation and won\'t be coming to work ____ this coming Tuesday.',
        'until*since+from=She\'s in Cebu right now and will be there ____ Saturday of next week.',
        'until*since+from=Sophia waited for him since morning but they didn\'t meet ____ 5 P.M.',
        'until*since+from=I will ride with them so I can not leave ____ the end of this party.',
        'until*since+from=Sophia waited for the package for hours and didn\'t get it ____ 5 P.M.',
    ],
    6 => [
        'on*in+at=Our most spacious conference room is ____ the seventh floor of this modern tower.',
        'on*in+at=They hung that elaborate Picasso painting ____ a conspicuous wall in the lobby.',
        'on*in+at=The biochemist was interviewed about that strange phenomenon ____ TV last night.',
        'on*in+at=My brother and his schoolmates will be here ____ Wednesday to work on their project.',
        'on*in+at=These college students could certainly use an excellent book ____ quantum physics.',
        'on*in+at=I\'m doubtful that I\'d be able to go to work ____ Saturday because of my circumstances.',
        'at*in+on=I heard that you can buy the best steak sandwich in this city ____ Luigi\'s.',
        'at*in+on=That air-conditioned bus leaves ____ noon so I should be getting ready now.',
        'at*in+on=He couldn\'t believe his eyes when their paths crossed ____ the Mall of Asia.',
        'at*in+on=Her associates were introduced to him ____ a recent concert in that stadium.',
        'at*in+on=That delivery truck makes its rounds ____ night to avoid the daytime traffic.',
        'at*in+on=They finally met their business counterparts ____ a technology seminar abroad.',
        'at*in+on=Every week, we visit some ailing children ____ an orphanage to give them hope.',
        'in*at+on=His pet chimpanzee is ____ the house so try not to agitate it when we get there.',
        'in*at+on=If I had more money, I wouldn\'t choose to live ____ a small residential unit.',
        'in*at+on=These athletes never forget to do their calisthenics routine ____ the morning.',
        'in*at+on=I wrote three scientific papers ____ 2009, so it was a truly productive year.',
        'in*at+on=He resigned from that company ____ 1996 and then went abroad to start a new career.',
        'in*at+on=Don\'t tell me that you still believe in such superstitions ____ this day and age.',
        'for*since+by=The government has been trying to eradicate poverty ____ two decades already.',
        'for*since+by=Their group walked ____ five kilometers on high heels just to get to the soiree.',
        'for*since+by=Walking ____ two kilometers each day will do wonders for your medical condition.',
        'for*since+by=The company is using those robotic arms ____ sealing their products hermetically.',
        'for*since+by=This concert was organized by their foundation ____ the benefit of those orphans.',
        'for*since+by=Their medical mission was funded by the congressman ____ his needy constituents.',
        'from*on+for=The professor purchases all his gadgets ____ a technology company in Europe.',
        'from*on+for=The national government promised that they will free everyone ____ poverty.',
        'by*in+from=The entire script for that fantasy movie was written ____ a famous playwright.',
        'by*in+from=Mrs. Ventura thanked her husband for standing ____ her through thick and thin.',
        'by*in+from=The bemedalled athlete outscored his formidable opponent ____ three points only.',
        'since*for+from=I can\'t believe that it has been a year ____ our last excursion together.',
        'since*for+from=The students have been assembling their science project ____ last month.',
        'since*for+from=Those philosophers have been debating with each other ____ early this week.',
        'since*for+from=The national team has not lost a single game ____ the start of this tournament.',
        'since*for+from=The students have been chatting online with each other ____ early this morning.',
        'since*for+from=There has never been a town celebration as festive as this ____ December of 1994.',
        'since*for+from=Kulas and Pedro have been complaining about that annoying noise ____ it started.',
        'since*for+from=The engineers have been assembling that gigantic robot ____ January of last year.',
        'until*since+from=Harry must wait ____ his eighth birthday before he can have his own bike.',
        'until*since+from=You must leave that device plugged in ____ the end of the charging cycle.',
        'until*since+from=If they want, the football players can practice in our field ____ after dusk.',
        'until*since+from=I have another appointment later so I can only discuss this with you ____ 3 P.M.',
        'until*since+from=They didn\'t stop acquiring new clients ____ the signing of their tenth contract.',
        'until*since+from=Mr. Eleuterio diligently performed his job ____ his retirement three years ago.',
        'until*since+from=Herbert must wait ____ his eighteenth birthday before he can drive this vehicle.',
        'until*since+from=The engineers did not begin the assembly of the electric car ____ late last week.',
        'until*since+from=William needs to take that medicine religiously ____ the last day of his treatment.',
        'until*since+from=Zorayda did not start getting flowers from her husband ____ their tenth anniversary.',
        'until*since+from=The young entrepreneurs didn\'t start making profits ____ the middle part of 2010.',
    ],
    7 => [
        'on*in+at=The amazing photograph I was telling you about is ____ page 57 of that science magazine.',
        'on*in+at=Going ____ a cruise to the Caribbean will give me an opportunity to relax and clear my mind.',
        'on*in+at=Our favorite professor\'s birthday is already ____ Monday, but we don\'t have a gift for him yet.',
        'at*in+on=I don\'t think he was responsible for that prank because he was ____ home at that time.',
        'at*in+on=If these politicians aren\'t careful, we might soon find ourselves ____ war with that country.',
        'at*in+on=I would like to request for a meeting with you ____ 9 A.M. tomorrow so we can discusss our proposal.',
        'in*at+on=If you\'re looking for a different kind of adventure, try going on a safari ____ Africa.',
        'in*at+on=If you find yourself ____ a taxi in this city, you must take extra safety precautions.',
        'in*at+on=If you don\'t know the definition of that word, you can look it up ____ this enormous dictionary.',
        'in*at+on=The annual mathematics olympiad will push through ____ July so you should start training soon.',
        'in*at+on=It\'s impossible to complete all the steps of this experiment ____ one hour, so please give me more time.',
        'in*at+on=That famous naturalist was fortunate enough to survive a jaguar attack ____ the Amazon jungle.',
        'in*at+on=This highly advanced computer can predict regional weather disturbances ____ less than one minute.',
        'for*since+by=I bought this telescope ____ you so you can observe celestial bodies from your room.',
        'for*since+by=Let\'s use this conveyor ____ transporting the packages to the other end of the room.',
        'for*since+by=The astronomer observed the orbits of the planets ____ six months before writing his scientific journal.',
        'for*since+by=If you want to alleviate those symptoms, don\'t drink coffee ____ another two months.',
        'for*since+by=The automotive engineers designed this electric car to run ____ 100 kilometers per recharging.',
        'for*since+by=Due to technical problems and lack of funds, the construction of these buildings will remain on hold ____ another two years.',
        'from*on+for=It\'s difficult to accept those harsh criticisms, especially since they came ____ him.',
        'from*on+for=Their zookeepers are trained to keep the docile animals away ____ the territorial ones.',
        'from*on+for=The players of that losing team vowed to take all their opponents seriously ____ now on.',
        'from*on+for=The hardworking scientists monitored the experiment\'s results ____ morning to midnight.',
        'from*on+for=This large donation of canned goods came ____ a famous company that produces computers.',
        'from*on+for=Public officials are not allowed to accept gifts of any kind ____ companies that seek contracts with the government.',
        'by*in+since=Everyone was disappointed when the visiting team defeated the home team ____ ten points.',
        'by*in+from=According to the governor, this enormous bridge will be fully operational ____ next month.',
        'by*in+from=Scientific experts believe that the effects of that contamination will be gone ____ 2050.',
        'by*in+from=The gymnasts who are being trained by that Olympic medalist should be excellent ____ now.',
        'by*for+from=The data generated by these computers are being analyzed already ____ our statisticians.',
        'by*in+from=These mahogany trees will be large enough to harvest ____ the time you graduate from college.',
        'by*in+from=The biofuel products that their company developed are now being sold in gas stations ____ the gallon.',
        'by*in+from=Our technical report must be complete with all the details ____ Friday or we\'ll be dropped from the group.',
        'by*in+from=Being a staunch supporter of green technology, he will stand ____ our organization no matter what happens.',
        'since*for+from=The event organizers have been working on that conference ____ April of this year.',
        'since*for+from=Phil and James have been excited about their new show ____ their contract signing.',
        'since*for+from=Our statisticians have been painstakingly crunching these numbers ____ two weeks ago.',
        'since*for+from=Bernardo\'s college classmates haven\'t had a grand reunion ____ their graduation day.',
        'since*for+from=The government officials have been awarding contracts to their company ____ late last year.',
        'since*for+from=The obese and lethargic lady has not been able to move around on her own ____ the summer of 2009.',
        'since*for+from=Their researchers have been trying to develop a flagship product ____ the founding of their company.',
        'since*for+from=These basketball players have been practicing very hard ____ their unexpected loss last week.',
        'since*for+from=The chief executive officers of the two companies haven\'t negotiated with each other ____ the start of the global economic crisis.',
        'until*since+from=Melanie didn\'t learn how to play the saxophone ____ her graduation from college in 2009.',
        'until*since+from=We\'re on vacation in Singapore at the moment and won\'t be returning to work ____ March 19.',
        'until*since+from=We are the event managers so we will not leave this place ____ the end of this celebration.',
        'until*since+from=Pamela is afraid that she won\'t be able to talk to her husband ____ his return from abroad.',
        'until*since+from=Most Americans felt safe living in the United States ____ the tragic event of September 11, 2001.',
        'until*since+from=Ernest and his friends are in Thailand since Sunday and will be there ____ the end of next month.',
        'until*since+from=In this amusement park, visitors with no membership pass are not allowed inside ____ after 9 A.M.',
        'until*since+from=Leila\'s officemates stayed and didn\'t leave her alone in the lounge ____ her brother\'s arrival.',
        'until*since+from=Cassandra must wait ____ her twelfth birthday before she\'ll be allowed to ride that roller coaster.',
        'until*since+from=Cynthia patiently waited for the delivery ____ 2 P.M., when she was informed that it won\'t arrive at all.',
        'until*since+from=Of course, your high school students can use our laboratory ____ the completion of their chemistry project.',
        'until*since+from=We needed to settle the dispute so we didn\'t leave ____ after the signing of a memorandum of agreement with him.',
    ],
];

// ---- Pre-parse (§5.1) ----
function parse_prep_item(string $raw): ?array {
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
        $p = parse_prep_item($raw);
        if ($p !== null) $items[$tier][] = $p;
    }
}

// ---- Helpers (§8.4, §8.6) ----
function prep_box(string $html, int $minHeight = 100): void {
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
function prep_render_filled(string $sentence, string $answer): string {
    // Replace ____ with the highlighted correct answer
    $esc = htmlspecialchars($sentence);
    $ans = htmlspecialchars($answer);
    return str_replace(
        '____',
        '<strong style="color:#CC0066;">' . $ans . '</strong>',
        $esc
    );
}

// ---- No-repeat picker (§6.2) ----
function pick_prep_item(array $pool, string $sessionKey, int $tier): array {
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
    $tier = resolve_prepositions_tier($lvl, $grd);
    $pool = $items[$tier] ?? $items[1];
    if (empty($pool)) $pool = $items[1] ?? [];
    $item = pick_prep_item($pool, $sessionKey, $tier);

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'sentence' => $item['sentence'],
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
    $sentenceFilled = prep_render_filled($cur['sentence'], $cur['correct']);
    $correctEsc     = htmlspecialchars($cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php prep_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;">'
    . $sentenceFilled
    . '</div>'
  , 130); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The correct preposition is '<strong style="color:#CC0066;font-size:15pt;"><?php echo $correctEsc; ?></strong>'.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceEsc = htmlspecialchars($q['sentence']);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Fill in the blank with the correct preposition.
  </div>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#800080;max-width:480px;margin:0 auto 15px;">
    Click on your answer.
  </div>
  <?php prep_box(
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
                    min-width:110px;max-width:160px;min-height:64px;padding:12px 16px;
                    border:2px solid #888888;border-radius:8px;background:#fff;
                    text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                    font-size:18pt;font-weight:700;text-align:center;
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