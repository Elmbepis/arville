<?php
// english/modules/reading-comp.php
// Story and Article Comprehension — multi-question quiz with 4-choice M/C per question.
// A story/article image is shown; the student answers 4–7 questions with radio buttons
// and must get a PERFECT score to earn a point (legacy behaviour preserved).
// 2 levels (Easy, Hard) via legacy tier mapping; Hard uses the harder of legacy Medium/Hard.
// Grade-aware: Easy grd 0&#8594;tier 0 … Easy grd 8+&#8594;tier 8; Hard grd 0&#8594;tier 2 … Hard grd 8+&#8594;tier 10.

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
$moduleTitle = 'Story and Article Comprehension';
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
function resolve_rcomp_arrnum(string $lvl, int $grd): int {
    if ($lvl === 'Easy') return min(8, $grd);
    return min(10, $grd + 2);
}

// ---- Data (§5) — verbatim from legacy ----
$articles = [];
$imgs     = [];
$qs       = [];
$chs      = [];

// Grade 0
$articles[0] = ['0001','0002','0003','0004','0005'];
$imgs[0]     = ['0001-park','0002-movies','0003-beach','0004-sam','0005-fun-ball'];
$qs[0]['0001'] = [1=>'Who went with Jimmy to the park?',2=>'What do they like doing in the park?',3=>'They love to ____.',4=>'When do they usually stop playing?'];
$chs[0]['0001'] = [1=>'his brother+his sister=his mom+his dad',2=>'play with other children+play with dogs=feed birds+climb trees',3=>'play basketball and chase each other+play soccer and chase each other=play basketball and go swimming+play baseball and jump over each other',4=>'when they are already too tired+when there is no more sun=when their mom calls them+when all the other children have gone home'];
$qs[0]['0002'] = [1=>'Who went to the movies with Carlos?',2=>'What did they buy?',3=>'Which of these happened when they went inside the theater?',4=>'What was the movie about?'];
$chs[0]['0002'] = [1=>'his father and mother+his sister and brother=his mother and sister+his father and brother',2=>'tickets, popcorn, and drinks+tickets, popcorn, and shirts=popcorn, drinks, and posters+tickets, shirts, and posters',3=>'Carlos could not see because it was so dark+Carlos felt very cold=Carlos fell asleep because it was so quiet+Carlos found the movie to be very loud',4=>'heroes with superpowers+aliens=scary ghosts+very funny people'];
$qs[0]['0003'] = [1=>'Where did our family go?',2=>'What did we do there?',3=>'What kind of contest did we have?',4=>'What is my wish?'];
$chs[0]['0003'] = [1=>'to the beach+to the lake=to the park+to the zoo',2=>'have fun in the sand and water+sing and dance=watch other people play+just lie under the sun',3=>'finding the best-looking seashell+finding the largest rock=building the nicest sand castle+catching the biggest fish',4=>'to go to the beach more often+to find the largest seashell=to have a beach of my own+to live on the beach'];
$qs[0]['0004'] = [1=>'Who is Sam?',2=>'What can Sam do?',3=>'What did I ask Sam to do for me?',4=>'To be able to draw like Sam, I now ____.'];
$chs[0]['0004'] = [1=>'my art class seatmate+my second grade classmate=my first grade teacher+my art class teacher',2=>'draw really nice pictures+sing and dance=play the piano+swim really well',3=>'teach me how to draw+draw a picture of my favorite superhero=help me with my homework+help me draw a picture',4=>'practice drawing each day+look at plenty of drawings=talk to Sam more often+read books about art'];
$qs[0]['0005'] = [1=>'What can a ball give you?',2=>'Which of these is NOT something fun to do with a ball?',3=>'In what way is a ball like a top?',4=>'What can you say about the person who wrote the article?'];
$chs[0]['0005'] = [1=>'lots of fun+lots of money=lots of things+lots of time',2=>'throw it through a glass window+pass it to a friend=make it bounce up and down+make it roll on the grass',3=>'It can spin like a top.+It is shaped like a top.=It needs a string like a top.+It has a pointed part like a top.',4=>'He does not own a ball.+He does not like balls.=He has a ball at home.+He wants other people to stay away from balls.'];

// Grade 1
$articles[1] = ['1001','1002','1003','1004','1005'];
$imgs[1]     = ['1001-dinosaur','1002-tommy','1003-leo','1004-really-windy','1005-lester-fish'];
$qs[1]['1001'] = [1=>'What did Joey see in the park?',2=>'Which of these does NOT describe what Joey saw?',3=>'Why don\'t we see real dinosaurs?',4=>'Which of these is not true?'];
$chs[1]['1001'] = [1=>'a statue of a dinosaur+a real dinosaur=a movie about dinosaurs+a picture of a dinosaur',2=>'It is small.+It has a large mouth with sharp teeth.=It stands on two hind legs.+It has two short arms.',3=>'They lived long ago and are all gone now.+They never really existed.=They are imaginary creatures.+They are now hiding in thick forests.',4=>'We can watch real dinosaurs in zoos.+We can watch movies about dinosaurs.=There are now fake dinosaurs that we can see.+We can learn about dinosaurs by reading books.'];
$qs[1]['1002'] = [1=>'Who is named \'Tommy\'?',2=>'Which of these does NOT describe Tommy?',3=>'What did Harold see that excited him?',4=>'When did Tommy hear Harold roar?'];
$chs[1]['1002'] = [1=>'the tiger at the zoo+the boy who went to the zoo=the zookeeper+a visitor at the zoo',2=>'He is a lion.+He is a tiger.=He is a large animal.+His roar is loud and scary.',3=>'Tommy being fed with meat+Tommy being fed with fruits=Tommy chasing another animal+Tommy playing with the zookeeper',4=>'when he was about to go somewhere else+when he was eating meat=never+when Harold visited his cage'];
$qs[1]['1003'] = [1=>'What does Leo like to do?',2=>'Where does Leo go to fish?',3=>'How does Leo fish?',4=>'What happens to the fishes that Leo brings home?'];
$chs[1]['1003'] = [1=>'catching fish+keeping fish=watching fish+feeding fish',2=>'a pond near their house+a pond in the market=a pond near his school+a pond near a church',3=>'using a rod and some worms+using a large net=using a spear+with his bare hands',4=>'His mother cooks them for dinner.+His brother puts them in a fish tank.=His mother gives them to their neighbors.+His father gives them to his friends.'];
$qs[1]['1004'] = [1=>'Why did Rico smile when he looked out the window?',2=>'Which of these did NOT make Rico think it was a windy day?',3=>'Which of these did NOT show it was too windy for Rico to be outside?',4=>'Which of these is NOT a reason why Rico was not able to fly his kite?'];
$chs[1]['1004'] = [1=>'It was windy so he could fly his kite.+It was windy so he can swim in the lake.=It was windy so he can play in the park.+It was windy so he can go fishing.',2=>'the sun shining brightly+branches of trees swaying=leaves dancing in the air+pieces of paper dancing in the air',3=>'The wind felt warm and nice.+The wind pushed him to one side.=The wind almost made him fall.+The wind took the kite out of his hand.',4=>'He wanted to fly his kite so much.+It was not safe to be outside.=He lost his kite.+His mother made him go inside the house.'];
$qs[1]['1005'] = [1=>'What was Lester planning to do that day?',2=>'What did Lester see at the store they went to?',3=>'What kind of fish did Lester choose?',4=>'Which of these does NOT describe Doro?'];
$chs[1]['1005'] = [1=>'buy a new fish+buy a new fish tank=go fishing in the lake+eat some fish',2=>'lots of colorful fishes+lots of talking birds=lots of cute puppies+lots of playful kittens',3=>'goldfish+angelfish=catfish+milkfish',4=>'thin and silver+fat and orange=has large eyes+looks funny'];

// Grade 2
$articles[2] = ['2001','2002','2003','2004','2005'];
$imgs[2]     = ['2001-crow-pitcher','2002-fox-grapes','2003-sticks','2004-dog-shadow','2005-favorite-teacher'];
$qs[2]['2001'] = [1=>'Which is the main character of this story?',2=>'All of these are reasons why the crow was not able to drink except for one. Which is it?',3=>'How would you describe the crow?',4=>'What is the moral lesson of this story?'];
$chs[2]['2001'] = [1=>'the crow+the pitcher=the water+each of the pebbles',2=>'Its thirst was too great.+The pitcher was too tall.=There was too little water.+Its beak was not long enough.',3=>'smart and willing to work+smart but lazy to do work=willing to work but not smart+not smart nor willing to work',4=>'If you really want something, there is always a way to get it.+Crows are very smart and hardworking.=If you are really smart, there is no need to work.+Thirst makes you work harder.'];
$qs[2]['2002'] = [1=>'What caught the attention of the fox in the story?',2=>'How did the fox try to get the grapes?',3=>'Why was the fox not able to get the bunch of grapes?',4=>'What is the moral lesson of this story?'];
$chs[2]['2002'] = [1=>'a bunch of grapes hanging from a vine+pieces of grapes on the ground=a tree branch+a vine hanging from a branch',2=>'by trying to grab it with its mouth+by using a long stick=by throwing stones at it+by trying to hit it with its tail',3=>'it was too high+it was too sour=it was too heavy+it was too big',4=>'If we can not have something we want, we sometimes pretend we do not want it.+If we want something, we must work for it.=If we want something, we must think of a way to get it.+We do not have to get the things that we do not want.'];
$qs[2]['2003'] = [1=>'Who are the characters in this story?',2=>'What objects were used to give the lesson in the story?',3=>'The son learned that it is harder to break ____.',4=>'What was the moral lesson of the story?'];
$chs[2]['2003'] = [1=>'a man and his son+a man and his brother=a woman and her son+a son and his mother',2=>'sticks+stones=blocks+bones',3=>'a bundle of sticks than just one stick+a fat stick than a thin stick=a single stick than a bundle of sticks+stones than sticks',4=>'People are stronger if they are united.+People are stronger if they are not united.=Sticks must always be in bundles.+You are strong if you can break many sticks.'];
$qs[2]['2004'] = [1=>'What did the dog find and carry in his mouth?',2=>'When the dog saw his shadow in the stream, he wanted to ____.',3=>'What happened to the meat when the dog opened his mouth?',4=>'What was the moral lesson of the story?'];
$chs[2]['2004'] = [1=>'a piece of meat+a piece of bread=a bone+a fruit',2=>'take the meat from the other dog+chase the other dog=hide his own meat from the other dog+talk to the other dog',3=>'it fell into the water+it fell to the ground=it was taken by another dog+it stayed in his mouth',4=>'Greedy people who want to have it all will lose it all.+It is easy to lose a piece of meat.=Do not look down when crossing a bridge.+Be good to everyone you meet.'];
$qs[2]['2005'] = [1=>'Which of these does not describe Mrs. Castro?',2=>'Mrs. Castro believes that one needs to ____ to be good in math.',3=>'Right now, we are mastering how to ____ numbers.',4=>'Mrs. Castro does all of these except for one. Which is it?'];
$chs[2]['2005'] = [1=>'She will be my teacher next year.+She is my favorite teacher.=She is my math teacher.+She is a good teacher.',2=>'do a lot of practice+to sleep early=watch a lot of videos+read newspapers every day',3=>'multiply+add=subtract+divide',4=>'teaches us how to dance and sing+encourages us to always do our best=makes us feel good by telling us we are smart+gives us exercises so we can practice'];

// Grade 3
$articles[3] = ['3001','3002','3003','3004','3005'];
$imgs[3]     = ['3001-bear','3002-wolf-crane','3003-lion-mouse','3004-wright','3005-apollo-11'];
$qs[3]['3001'] = [1=>'How did the two men feel when they met the bear?',2=>'What did the two men do to avoid being attacked by the bear?',3=>'Why did the bear leave the man on the ground alone?',4=>'What\'s the moral lesson of this fable?'];
$chs[3]['3001'] = [1=>'terrified+sorrowful=surprised+confused',2=>'climbing up a tree and playing dead+climbing up a tree and running=playing dead and climbing up a rock+running and climbing up a rock',3=>'it thought the man was already dead+it took pity on the man=it went for the other man+it was also scared of humans',4=>'True friendship is tested during an emergency.+It is better to be safe than sorry.=Think of your own safety first.+Animals must be treated with respect.'];
$qs[3]['3002'] = [1=>'What problem did the wolf have?',2=>'From whom did the wolf try to ask for help?',3=>'What did he promise to give anybody who would help him?',4=>'What\'s the moral lesson of this fable?'];
$chs[3]['3002'] = [1=>'A bone got stuck in its throat.+A bone upset its stomach.=A bone got stuck in its teeth.+A bone cracked its tooth.',2=>'everyone it met+a crane=nobody+a stork',3=>'a reward+safety=the meat it was eating+protection',4=>'A greedy person is never grateful.+Be careful when eating.=Only you can help yourself.+No man is an island.'];
$qs[3]['3003'] = [1=>'At the start of the story, who became indebted to whom?',2=>'Why did the lion let the mouse go?',3=>'How did the mouse repay the lion?',4=>'What\'s the moral lesson of this fable?'];
$chs[3]['3003'] = [1=>'the mouse to the lion+the lion to the mouse=both the mouse and the lion to each other+none',2=>'He was amused by the idea that the mouse could repay him someday.+He lost his appetite.=He lost his temper and wanted the mouse to go away.+He was annoyed and could not stand the mouse.',3=>'by chewing on the ropes until the lion was freed+by untying the ropes to free the lion=by keeping the lion company+by scaring away the hunters',4=>'Anybody, no matter how small or weak, can help someone more powerful.+Lions must not eat mice.=Anybody, no matter how small or weak, can annoy someone more powerful.+Never wake up a sleeping lion.'];
$qs[3]['3004'] = [1=>'The Wright brothers are ____.',2=>'Why are the Wright brothers famous?',3=>'Which of these does not describe the Wright brothers\' airplane?',4=>'Which of these is not true about the Wright brothers?'];
$chs[3]['3004'] = [1=>'Orville and Wilbur+Oliver and Wilbur=Orville and William+Oliver and William',2=>'They built and flew the first powered and controlled airplane.+They built the first machine that could fly.=They experimented with gliders.+They built and flew the first powered and controlled balloon.',3=>'It could only fly for five seconds.+It had a propeller.=It had an engine.+It could be controlled by the pilot.',4=>'The world watched their first flight in 1903.+They did not show their discovery to the world at once.=They had a very good plane by 1905.+They did many experiments before they made a successful flight.'];
$qs[3]['3005'] = [1=>'Which of these describes Apollo 11?',2=>'Who were the first humans to land on the moon?',3=>'Who was the person who set the goal to put a man on the moon and bring him back safely before 1970?',4=>'What is the meaning of the message that Neil Armstrong delivered upon landing on the moon?'];
$chs[3]['3005'] = [1=>'It was the first spaceflight that landed humans on the moon.+It was the first mission to put humans in space.=It was the first space mission of NASA.+It was the first spaceflight in the history of man.',2=>'Neil Armstrong and Buzz Aldrin+Neil Armstrong and Michael Collins=Buzz Aldrin and Michael Collins+Neil Armstrong and Buzz Collins',3=>'John F. Kennedy+Richard Nixon=Neil Armstrong+Buzz Aldrin',4=>'that his stepping on the moon represented a great achievement of mankind+that the step he took was not big enough=that while he was making a step on the moon, the people on Earth were leaping with joy+that small steps are equal to a big leap'];

// Grade 4
$articles[4] = ['4001','4002','4003','4004','4005'];
$imgs[4]     = ['4001-oak-tree','4002-fox-crow','4003-hares-frogs','4004-helen-hank','4005-sheila'];
$qs[4]['4001'] = [1=>'Where did this story happen?',2=>'Which of the characters in the fable is thin?',3=>'Which of the characters in the fable doesn\'t yield to a storm wind?',4=>'How did the reed survive the hurricane?',5=>'What\'s the moral lesson of this fable?'];
$chs[4]['4001'] = [1=>'beside a river+beside a sea=in the forest+under a river',2=>'reed+oak tree=bird+wind',3=>'oak tree+reed=hurricane+river',4=>'by swaying with the wind+by resisting the wind=by hiding behind the oak tree+by holding onto the oak tree',5=>'It is better to be flexible than unyielding.+Size is might.=Think of your own safety first.+Fearing danger is important.'];
$qs[4]['4002'] = [1=>'Which of the characters in the fable saw an opportunity?',2=>'Which of the characters in the fable showed deceit?',3=>'How would you describe the crow?',4=>'What\'s the moral lesson of this fable?'];
$chs[4]['4002'] = [1=>'fox+crow=none+both the fox and the crow',2=>'fox+crow=none+both the fox and the crow',3=>'gullible+greedy=hungry+proud',4=>'Never believe the sugary words of a stranger.+Eat your food before doing anything else.=Do not sing with your mouth full.+Trusting anybody is never good.'];
$qs[4]['4003'] = [1=>'How did the hares feel at the start of the story?',2=>'Why did the hares go to the lake when the horses arrived?',3=>'What made the hares feel better about themselves?',4=>'What\'s the moral lesson of this fable?'];
$chs[4]['4003'] = [1=>'unhappy with their lives+quite satisfied=quite optimistic+proud of themselves',2=>'to end their lives+to hide under the water=to cool down+to confuse the horses',3=>'the frogs being afraid of them+the lake being full of happy frogs=being safe from the horses+the frogs being friendly to them',4=>'Never complain because there are people in worse situations compared to you.+Stay away from trouble at all times.=Make other people feel worse about themselves.+Go to a place where you are the most powerful.'];
$qs[4]['4004'] = [1=>'Where did this story happen?',2=>'Hercules is ____.',3=>'Hercules did all of these at the beach except for one. Which is it?',4=>'Why did Hercules stop fetching sticks?',5=>'What was the last thing they did before going home?',6=>'How did Hank and Helen go to and from the beach?',7=>'In the end, Hercules was too tired to do what?'];
$chs[4]['4004'] = [1=>'at a beach+by a river=at a farm+under the sea',2=>'a pet dog+a wild dog=a stray dog+a lost dog',3=>'chase a cat+swim=fetch a stick+eat lunch',4=>'the water was too cold+the water was too warm=the water was too itchy+the water was too dirty',5=>'eat their lunch+play one more game=chase a cat+sleep under a tree',6=>'by riding a bicycle+by walking=by driving a car+by rowing a boat',7=>'chase the cat+walk home=fetch a stick+play with the cat'];
$qs[4]['4005'] = [1=>'Which of these does not describe Sheila?',2=>'How does Sheila sometimes feel when her sisters tease her?',3=>'What punishment did Sheila\'s sisters get the last time they teased her?',4=>'What was Sheila\'s mom\'s surprise for her?',5=>'How did Sheila\'s sisters feel about the present that she got?'];
$chs[4]['4005'] = [1=>'She has two younger sisters.+She is the youngest in their family.=She is charming.+She is very nice.',2=>'jealous+angry=depressed+jovial',3=>'They were not allowed to go to the mall with them.+They were made to go to their rooms.=They were not given dessert after lunch.+They did not get a present.',4=>'a scrapbook of her own+a photo album=a great book+a nice dress',5=>'happy for her+jealous of her=angry at her+confused and puzzled'];

// Grade 5
$articles[5] = ['5001','5002','5003','5004','5005'];
$imgs[5]     = ['5001-fossils','5002-mice','5003-buffalo-nickel','5004-chimera','5005-pinatubo'];
$qs[5]['5001'] = [1=>'The petrified remains of long-dead creatures are called what?',2=>'Which of these is most likely to fossilize?',3=>'Which of these have fossils that interest the most people?',4=>'Which of these is the least related to the actual scientific study of fossils?'];
$chs[5]['5001'] = [1=>'fossils+sediments=rocks+bones',2=>'mussel+algae=insect+worm',3=>'dinosaurs+clams=snails+plants',4=>'general public+remains of prehistoric creatures=layers of sedimentary rocks+paleontologists'];
$qs[5]['5002'] = [1=>'Who visited his cousin at the start of the story?',2=>'How did the city mouse react in the story?',3=>'Why did the country mouse leave at once?',4=>'What\'s the moral lesson of this fable?'];
$chs[5]['5002'] = [1=>'city mouse+country mouse=city cat+country cat',2=>'disbelief at how his cousin lives+happy for his cousin=proud of his cousin+fearful for his life',3=>'He feels unsafe.+He already got full.=He does not like his cousin.+He is not fond of living in luxury.',4=>'Better poor but living in peace than rich but living in fear+Better poor but honest than rich but dishonest=Better poor than rich+Better poor in the country than rich in the city'];
$qs[5]['5003'] = [1=>'Which of these does not describe the Buffalo nickel?',2=>'Why was the Buffalo nickel\'s minting delayed after the design was approved?',3=>'For how long was the Buffalo nickel minted by the United States?',4=>'Which of these became a problem with the Buffalo nickel?'];
$chs[5]['5003'] = [1=>'It was minted by the U.S. from 1913 to 1928.+It is a 5-cent coin.=It is composed of 75% copper.+It is composed of 25% nickel.',2=>'A company that made mechanisms for coin-operated machines objected.+The U.S. Mint wanted to improve the design.=The U.S. Congress stopped the minting.+The people objected to its minting.',3=>'25 years+38 months=38 years+13 years',4=>'It wears out easily in circulation.+It was too big and heavy.=It easily breaks into two.+The design became controversial.'];
$qs[5]['5004'] = [1=>'Which of these does not describe the usual depiction of the Chimera?',2=>'Based on the article, which of these is not true about the Chimera?',3=>'Which of these is not something that the term \'chimera\' refers to?',4=>'In genetics, which of these does not refer to a chimera?'];
$chs[5]['5004'] = [1=>'a lion with a tail that has a goat head at its end+a lion with a goat head coming out of its back=a lion whose tail ends with the head of a snake+an animal with the head of a lion',2=>'It has the same parents as Typhon.+It is a sibling of Cerberus.=Echidna is one of its parents.+It is not a parent of the Lernaean Hydra.',3=>'something that is highly functional+a creature with parts taken from various animals=something made up of unrelated parts+something perceived as extremely unthinkable',4=>'a person with two heads+a person with cells that are genetically different from each other=a person with two sets of DNA+a person with two blood types'];
$qs[5]['5005'] = [1=>'Which of these made the greatest volcanic eruption in the 20th century?',2=>'In the 20th century, ____ the eruption of Novarupta in 1912.',3=>'Which of these saved many lives from Mt. Pinatubo\'s eruption?',4=>'Which of these best describes lahar?'];
$chs[5]['5005'] = [1=>'a volcano in the Alaska Peninsula+Mt. Pinatubo=a volcano in Luzon+Krakatoa',2=>'no volcanic eruption exceeded+no other volcanic eruption followed=only the eruption of Mt. Pinatubo exceeded+only the eruption of Mt. Pinatubo followed',3=>'correct prediction of the eruption and evacuation+rainwaters that stopped the eruption=rainwaters that helped people escape and survive+people staying safely in their homes',4=>'a mudflow down the slopes of a volcano+magma that was cooled down by rainwater=solid volcanic deposits+a flash flood brought about by heavy rains'];

// Grade 6
$articles[6] = ['6001','6002','6003','6004','6005'];
$imgs[6]     = ['6001-unfruitful','6002-woodpecker','6003-androcles','6004-999','6005-badjao'];
$qs[6]['6001'] = [1=>'What do the main characters do for a living?',2=>'What did the main character get from his brother?',3=>'The man pondered ____ the gift that he got from his brother.',4=>'What happened to the gift?',5=>'What is the moral lesson of this story?'];
$chs[6]['6001'] = [1=>'farming and gardening+farming and fishing=gardening and framing+farming and guarding',2=>'an apple tree+an apple seedling=a young apple plant+an apple seed',3=>'where to plant+how to plant=who should plant+when to plant',4=>'it did not bear fruits nor flowers+it died=it got sick+it became productive',5=>'Never expect rewards from things that you do with greed and mistrust.+Never give up until you succeed.=Greedy people are not good farmers.+Always choose the best spot for planting.'];
$qs[6]['6002'] = [1=>'How would you describe the saint when he first saw the woman?',2=>'Why did the woman keep on baking another cake for the saint?',3=>'The saint became angry because ____.',4=>'How did the woman live the rest of her life?'];
$chs[6]['6002'] = [1=>'famished+satiated=mirthful+vigorous',2=>'to make a smaller cake+to make a bigger cake=to make a less delicious cake+to make a more delicious cake',3=>'the woman was so greedy+the woman was so slow=the woman did not know how to bake+the woman burned his cake',4=>'making holes in trees+baking cakes=trapped alone in a chimney+chased by animals in the woods'];
$qs[6]['6003'] = [1=>'How did Androcles help the lion?',2=>'What was the king\'s original plan with them?',3=>'When did the king free them?',4=>'What\'s the moral lesson of this fable?'];
$chs[6]['6003'] = [1=>'by taking out a thorn from its paw+by feeding it with meat=by letting it escape from its captors+by convincing the king to free them',2=>'to watch the lion eat Androcles+to watch them escape=to set them free+to bring them to the forest',3=>'upon hearing the story of their extraordinary friendship+when Androcles apologized=when Androcles survived the attack of the lion+upon orders of the court',4=>'Noble people always show their gratitude.+It is good to have a powerful friend.=Help powerful people, just in case you would need their help later on.+A king can get anything he wants.'];
$qs[6]['6004'] = [1=>'What point is the article trying to make?',2=>'In the number 0.999..., what do the three dots after the last \'9\' mean?',3=>'Which of these corresponds to the word \'infinitesimal\'?',4=>'Based on this article, which of these is not true?'];
$chs[6]['6004'] = [1=>'that 0.999... is equal to 1+that 0.999... is not equal to 1=that nobody can say if 0.999... is equal to 1+that 0.999... can be equal or not equal to 1',2=>'that infinite 9s follow the last digit+that nothing follows the last digit=that three more 9s follow the last digit+that nine more 9s follow the last digit',3=>'an extremely small number+zero=infinite+an unknown number',4=>'A non-zero terminating number can not be equal to a non-terminating number.+14.73 is equal to 14.72999....=1.6754 is equal to 1.6753999....+Every non-zero terminating number has a twin non-terminating number.'];
$qs[6]['6005'] = [1=>'Which of these does not describe the Badjao?',2=>'Many Badjao people have migrated to the north and to nearby countries because ____.',3=>'Which of these is not one of the ways Badjao live?',4=>'Which of these is not part of any legend about the origin of the Badjao?'];
$chs[6]['6005'] = [1=>'They live in the forests of Sulu.+They are a Moro ethnic group.=Fishing and sailing are a big part of their lives.+They are traditionally found in the southern parts of the Philippines.',2=>'of lack of peace in the region where they live+they want to get better education=of lack of food+they want to earn more money',3=>'waging wars against rival tribes+moving from place to place=dwelling in boats or houses on stilts+living off sea resources',4=>'that they came from people looking for their sultan who was lost in the sea+that they came from the people looking for a Johorean princess lost in a flood=that they were descended from members of the royal guard of the Johor Sultanate+that they came from people sent out to the sea by a grief-stricken father'];

// Grade 7
$articles[7] = ['7001','7002','7003','7004','7005'];
$imgs[7]     = ['7001-elves','7002-everest','7003-aswang','7004-renaissance','7005-black-death'];
$qs[7]['7001'] = [1=>'All the shoemaker had left before his luck changed for the better was ____.',2=>'What did the shoemaker do before going to bed each night?',3=>'Which of these has nothing to do with whatever changed the shoemaker\'s life forever?',4=>'The shoemaker\'s wife said all of these to the shoemaker except for one. Which is it?',5=>'How would you describe the elves\' response to the shoemaker and his wife\'s gesture?'];
$chs[7]['7001'] = [1=>'enough leather to make just one pair of shoes+enough leather to make two pairs of shoes=two pairs of shoes to sell+a pair of shoes to sell',2=>'cut out the leather for the new shoes+bring out the leather for the new shoes=shine the shoes he will sell the next day+hide and watch how the shoes are made',3=>'his financial difficulties in the past+perfect shoes being made secretly for him=having more and more customers+being able to buy more leather for new shoes',4=>'the shoemaker must sew clothes for the elves+the elves have made them rich=the elves do not have enough clothes to keep them warm+they should make some things for the elves to wear',5=>'elated+perturbed=bewildered+perplexed'];
$qs[7]['7002'] = [1=>'Which of these describes the peak of Mt. Everest?',2=>'Why is the Death Zone a dangerous place?',3=>'How many years passed before Mallory\'s body was found after he disappeared?',4=>'How many years passed from the first failed attempt to reach the summit of Mt. Everest to the first successful one?',5=>'Which of these does not describe Sherpas?'];
$chs[7]['7002'] = [1=>'bordering Nepal and Tibet at a height of more than 25,000 feet above sea level+between Nepal and Tibet at a height of less than 25,000 feet above sea level=at the center of Nepal at a height of more than 25,000 feet above sea level+at the center of Tibet at a height of more than 25,000 feet above sea level',2=>'the air is very thin there+the air is very dense there=the air is very humid there+the air is very polluted there',3=>'75+29=53+31',4=>'31+75=53+29',5=>'All of them are porters that carry the luggage of climbers.+They live at the foot of Mt. Everest.=They treat Mt. Everest as sacred.+Some of them have reached the peak of Mt. Everest.'];
$qs[7]['7003'] = [1=>'Which of these was not mentioned by the article about the \'Aswang\'?',2=>'The name \'Aswang\' came from a phrase that refers to ____.',3=>'Based on the article, which of these does not describe an \'Aswang\'?',4=>'Based on the article, a human marrying an aswang will ____.',5=>'What is one reason why married Aswangs don\'t hunt together?'];
$chs[7]['7003'] = [1=>'It has the ability to become invisible.+It is a mythical creature in Filipino folklore.=There is no fixed and specific definition of what it really is.+It has the ability to change its shape.',2=>'a dog+shape-shifters=all kinds of animals+a monster',3=>'It is always seeking attention when it is in human form.+It can transform into a bat, boar, or dog.=Depending on its type, it may make certain noises.+It is a combination of a vampire and a werewolf.',4=>'also turn into an Aswang+turn the Aswang into a human permanently=be devoured by other Aswangs+suffer sudden death',5=>'to lessen the chances of being seen and caught+because they tend to get distracted by each other=because someone has to look after their home+because other Aswangs will not allow it'];
$qs[7]['7004'] = [1=>'Which of these does not describe what the Renaissance was?',2=>'Where and when did the Renaissance most probably begin?',3=>'In what way did science advance during the Renaissance?',4=>'The Renaissance is best known for ____.',5=>'The term \'Renaissance Man\' basically means what?'];
$chs[7]['7004'] = [1=>'It was a cultural movement that had nothing to do with politics.+It was a cultural movement that inspired scholars and artists.=It was an era of educational transformation.+It was a time when many people achieved greatness in arts and literature.',2=>'Florence, Italy in the 14th century+Rome, Italy in the 14th century=Europe in the 16th century+Europe, but outside of Italy, before the 14th century',3=>'Scientific observation was given more importance.+Science did not advance during that era.=Speculative processes were enhanced.+It became more reliant on the opinions of past scientists.',4=>'artistic developments and contributions+social and political upheavals=scientific advancements+great kings and rulers',5=>'a person with many talents or areas of knowledge+a great painter=a person willing to die for knowledge+a person who lived during the Renaissance'];
$qs[7]['7005'] = [1=>'The \'Black Death\' refers to which of these?',2=>'Which of these describes a pandemic least accurately?',3=>'Based on the article, which of these is the most likely meaning of the word \'etiology\'?',4=>'Which of these describes the Black Death least accurately?',5=>'Which of these is not true about the Black Death?'];
$chs[7]['7005'] = [1=>'an outbreak of a deadly disease+a long and horrific war=a murderous rampage by a cult+a heinous crime with many victims',2=>'It is a very trivial medical phenomenon.+It involves the spreading of a disease.=It covers a very vast area, such as several countries.+It is very difficult to control.',3=>'the cause of a disease+where a disease originated=how a disease may be cured+the symptoms of a disease',4=>'DNA analyses have shown that it was most probably caused by a deadly virus.+It spread to Europe from Central Asia.=It was most likely carried by fleas living on rats that travelled on ships.+It is estimated to have killed at least 75 million people.',5=>'The same disease was never seen again after the 14th century.+It led to a series of religious, economic, and social upheavals.=It took a century and a half for the population of Europe to recover from its occurrence.+It affected the course of European history.'];

// Grade 8
$articles[8] = ['8001','8002','8003','8004','8005'];
$imgs[8]     = ['8001-ufo','8002-tulip-mania','8003-air-force-one','8004-great-wall-china','8005-venus-transit'];
$qs[8]['8001'] = [1=>'Which of these will not be considered as a \'UFO\'?',2=>'Which of these describes a \'UFO\'?',3=>'Which of these least associates UFOs with pop culture?',4=>'Which of these does not describe the UFOs reported by Kenneth Arnold in 1947?',5=>'Which of these was not mentioned by the article as being associated with UFOs?',6=>'According to scientists, which of these is the least common verified explanation for reported UFOs?'];
$chs[8]['8001'] = [1=>'explainable apparitions in the sky+unidentified objects in the sky=unexplainable display of lights in the sky+observable but unidentifiable atmospheric phenomena',2=>'observable+explainable=identifiable+mundane',3=>'weather balloons+flying saucers=alien spacecraft+extraterrestrial life',4=>'conventional+saucer-shaped=very fast+coordinated',5=>'acceptance by the general public+conspiracy theories=national security concerns+public and media ridicule',6=>'hoaxes+misidentified objects=aircraft and balloons+natural astronomical or atmospheric phenomena'];
$qs[8]['8002'] = [1=>'Which of these best describes the topic of this article?',2=>'Which of these usually triggers and sustains an economic bubble?',3=>'In March of 1637, which of these would Dutch investors not be willing to do?',4=>'All of these happen when an economic bubble collapses except for which?',5=>'The Tulip Mania led to all of these, except for one. Which is it?'];
$chs[8]['8002'] = [1=>'one of the first documented economic bubbles in history+the last economic bubble in history=the first economic bubble in human history+the only documented economic bubble in human history',2=>'speculations of investors that they could make money off it+the real value of the commodity=laws that require people to make it happen+financial common sense',3=>'sell a tulip bulb at a price lower than when they bought it+trade a large piece of land for a single flowering plant=spend a very large sum of money for a single tulip bulb+take a huge financial risk for a chance to make high profits',4=>'the price of the commodity suddenly skyrockets+prices suddenly plummet=investors unload the commodity at lower and lower prices+less and less people want to invest',5=>'people wanting to make more investments+local commerce being shocked=financial ruin of many people+people losing confidence in the market'];
$qs[8]['8003'] = [1=>'Which of these does not refer to \'Air Force One\'?',2=>'Which of these triggered the move to build specific aircraft for exclusive use by the U.S. president?',3=>'Which of these is not true about the call sign \'Air Force One\'?',4=>'Which of these is the type of plane using the \'Air Force One\' call sign today?',5=>'Which of these U.S. presidents was not part of the early history of \'Air Force One\'?'];
$chs[8]['8003'] = [1=>'It is a special military base for aircraft carrying U.S. officials.+It is an airspace call sign for aircraft carrying the U.S. president.=It is a name used for aircraft carrying the U.S. president.+It is a symbol of the power of U.S. presidency.',2=>'concerns with the president being dependent on commercial airlines+ballooning costs of commercial flights=the need to make flights more convenient for the president+the need to enhance the image of the president',3=>'It is being used exclusively by only one specific plane in the world.+It was only created years after the U.S. president was first given his own aircraft to use.=It was created so the plane carrying the U.S. president will not have the same call sign as other planes.+It is used by any of the aircraft designated to carry the U.S. president.',4=>'Boeing VC-25A+Boeing 707=C-87 Liberator Express+C-54 Skymaster',5=>'Herbert Hoover+Franklin Roosevelt=Harry Truman+Dwight Eisenhower'];
$qs[8]['8004'] = [1=>'Which of these best describes the topic of this article?',2=>'Most of what remains today of the Great Wall of China is associated with what?',3=>'Which of these was not mentioned by the article as a purpose for the Great Wall?',4=>'Which of these was not mentioned by the article in describing how the Great Wall enhances the military defense of China?',5=>'Based on the article, which of these is not true about the Great Wall of China?'];
$chs[8]['8004'] = [1=>'a series of fortifying walls built in stages over time+a single fortifying wall built by a Chinese emperor=a grand temple surrounded by a high wall+an enormous wall built in the past that no longer exists',2=>'the Ming Dynasty+Qin Shi Huang=220 to 206 BC+the modern era',3=>'to be used as a venue for grand cultural rituals and events+to protect the Chinese Empire against intrusions=to facilitate the imposition of duties on imported goods+to control the entry and exit of people',4=>'It was equipped with powerful cannons.+It had watch towers, troop barracks, and garrison stations.=It had fire and smoke signal capabilities.+Its path served as a transportation corridor.',5=>'It protects the eastern and western borders of China.+It is located somewhere along the southern border of Mongolia.=The entire wall, including all its branches, has a total length of more than 20,000 kilometers.+The total length of the walls built during the Ming Dynasty is about 8,850 kilometers.'];
$qs[8]['8005'] = [1=>'Which of these is true when a transit of Venus occurs?',2=>'Which of these does not describe the occurrence of a transit of Venus?',3=>'Which of these is not true about the comparison between a solar eclipse and a transit of Venus?',4=>'Which of these is not true about the observed periodicity of the transits of Venus?',5=>'Which of these was not mentioned by the article in describing the scientific significance of Venus transits?'];
$chs[8]['8005'] = [1=>'The sun and Earth are on opposite sides of Venus.+Earth is passing between Venus and the sun.=The sun is between Venus and Earth.+Venus and Earth are on opposite sides of the sun.',2=>'It is visible for several months.+Venus appears as a black disk travelling in front of the sun.=It occurs very rarely but predictably.+It is similar to a solar eclipse.',3=>'The moon is farther from Earth during a solar eclipse than Venus is during its transit.+Venus during its transit looks smaller than the moon during a solar eclipse.=A transit of Venus takes longer than a solar eclipse.+They are similar phenomena in the sense that an object is passing between Earth and the sun.',4=>'Venus passes between Earth and the sun once every 243 years.+Transits come in pairs, wherein the transits in each pair are 8 years apart.=The pairs of transits within a cycle are separated by more than 100 years.+It depends on the ratio of the orbital periods of Earth and Venus around the sun.',5=>'It was used in the study of solar eclipses.+It was used in the refinement of techniques aimed at searching for exoplanets.=It was used to get a realistic estimate of the size of the solar system.+It was used to get an accurate measurement of the distance between Earth and the sun.'];

// Grade 9
$articles[9] = ['9001','9002','9003','9004'];
$imgs[9]     = ['9001-loch-ness','9002-apple','9003-action-comics','9004-thatcher'];
$qs[9]['9001'] = [1=>'The Loch Ness monster is a cryptid. Which of these creatures is not a cryptid?',2=>'Loch Ness is a ____ in Scotland.',3=>'According to scientists, which of these would not explain the reported sightings of the Loch Ness Monster?',4=>'People that look for creatures such as the Loch Ness Monster and Bigfoot are called ____.',5=>'If the reported sightings in the article are to be believed, then the Loch Ness Monster can ____.',6=>'Which of these does not describe the available evidence on the existence of the Loch Ness Monster?'];
$chs[9]['9001'] = [1=>'Okapi+Yeti=Abominable Snowman+Bigfoot',2=>'lake+river=sea+monster',3=>'scientifically verified evidence+hoaxes=misidentified common objects or animals+wishful thinking',4=>'cryptozoologists+cryptids=cryptodologists+cryptologists',5=>'move on land+be domesticated=live permanently on land+attack cars',6=>'recent+minimal=disputed+unverified'];
$qs[9]['9002'] = [1=>'Who among these is the technical wizard and computer genius behind Apple\'s first product?',2=>'Which of these does not describe Apple\'s first product?',3=>'Who among these missed a golden opportunity to make many millions from Apple\'s success?',4=>'Which of these put Apple on top of the PC market in the late 70\'s?',5=>'Which of these triggered Steve Jobs to develop a graphical user interface (which uses a mouse) for Apple computers?'];
$chs[9]['9002'] = [1=>'Steve Wozniak+Steve Jobs=Ronald Wayne+Mike Markkula',2=>'It came with a floppy disk drive for storing data.+It was called Apple I.=It was sold as a kit (motherboard and chips), not as a complete computer.+It was first sold in 1976 at less than 700 dollars.',3=>'Ronald Wayne+Steve Jobs=Steve Wozniak+Mike Markkula',4=>'having VisiCalc as an application+the use of floppy disk drives=the use of color graphics+its open architecture',5=>'a visit to Xerox Parc+an exhibit at the West Coast Computer Faire=an advice from Markkula+the need for more money from investors'];
$qs[9]['9003'] = [1=>'Which of these does not describe Action Comics 1?',2=>'Which of these generally determines the price of an original copy of Action Comics 1 today?',3=>'Which of these does not describe CGC?',4=>'Which of this is not an anecdote about Action Comics 1?',5=>'Based on the article, which of these is not true about Action Comics 1?'];
$chs[9]['9003'] = [1=>'It was published by Jerry Siegel and Joe Shuster.+It is where Superman first appeared.=It ushered in the genre of superheroes in comic books.+It is now the most valuable comic book of all time.',2=>'the grading of its actual condition+the identity of its previous owner=how or where it was found+how or where it was sold',3=>'It only grades copies of Action Comics 1.+It grades comic books using numbers.=It will give a higher numerical grade to a VF comic book than a VG comic book.+It will give a grade of CGC 9 or higher to a comic book that looks new.',4=>'Marvel Comics had the initial rights to it.+A mid-grade copy of it once saved a home from foreclosure.=At one point, William Gaines had dozens of it lying in his home but did not give due importance to them.+A copy of it was once stolen from actor Nicolas Cage.',5=>'The highest grade for an existing copy of it is for a VF (very fine) comic book.+Its most expensive copy today is believed to be the one stolen from Nicolas Cage.=The highest amount ever paid for one is more than 2 million dollars.+There are probably 50 to 100 original copies of it left.'];
$qs[9]['9004'] = [1=>'Which of these does not describe Margaret Thatcher?',2=>'The nickname \'Iron Lady\' was deemed to be appropriate for Margaret Thatcher because of her ____.',3=>'The term \'Thatcherism\' refers to which of these?',4=>'Based on the article, which of these was not emphasized by her economic policies?',5=>'Based on the article, which of these was not a factor in her waning popularity and eventual resignation after being elected to a third term?'];
$chs[9]['9004'] = [1=>'She became a research chemist after being a barrister.+She used to be the prime minister of the United Kingdom.=She used to be the leader of the Conservative Party.+She once held a position responsible for science and education.',2=>'uncompromising leadership+passion for metal objects=manner of walking+ruthlessness in punishing criminals',3=>'policies that she implemented+sayings that she once made=memorable anecdotes+lessons that she imparted',4=>'stricter government regulation of the financial sector+privatization of state-owned companies=making trade unions less powerful and less influential+making labor markets more flexible',5=>'some health problems+her support for a poll tax being unpopular=her views that differ from those of other cabinet members+a challenge to her leadership by Michael Heseltine'];

// Grade 10
$articles[10] = ['a001','a002','a003','a004'];
$imgs[10]     = ['a001-waterloo','a002-shuttle','a003-mauna-kea','a004-humanzee'];
$qs[10]['a001'] = [1=>'In the Battle of Waterloo, the army under Napoleon Bonaparte was defeated by the combined armies under the commanders of which countries?',2=>'Which of these is not something you would surmise from the article?',3=>'Which of these caused Napoleon to delay the start of the battle?',4=>'How did Wellington describe the Battle of Waterloo?',5=>'Which of these did not happen after the Prussians arrived?'];
$chs[10]['a001'] = [1=>'Britain and Prussia+Russia and Britain=Britain and France+France and Prussia',2=>'Napoleon had never ever lost control of France before the battle+Napoleon somehow lost power before the battle=Napoleon was recently able to regain control of his army+Many countries did not want Napoleon to be back in power',3=>'rainy weather+lack of food and water=an unexpected illness+miscommunication',4=>'very closely fought that either side could have won+lopsided in favor of the Seventh Coalition=lopsided in favor of the army led by Bonaparte+lopsided, but who had the upper hand was not mentioned',5=>'Napoleon fled to America.+King Louis XVIII was restored to the French throne.=Napoleon surrendered and was exiled.+The Seventh Coalition won the battle.'];
$qs[10]['a002'] = [1=>'Which of these is not true about the disaster discussed in the article?',2=>'Which environmental factor is being blamed for the malfunction of the shuttle?',3=>'The crew of Space Shuttle Challenger included someone who would have been the first ____ in space.',4=>'Which of these was not mentioned by the article in relation to the deaths of the crew members?',5=>'Which of these did not happen after the disaster?'];
$chs[10]['a002'] = [1=>'it involves a commercial airline flight+it was seen by the public on live TV=it resulted in several deaths+it was caused by the failure of a simple component, i.e., an O-ring',2=>'very low temperature+very high temperature=very low air pressure+very high air pressure',3=>'teacher+doctor=lawyer+engineer',4=>'the entire crew perished at the very instant the initial explosion occurred+some crew members survived the initial breakup=the exact timing of the deaths could not be determined+the crew could not have survived their impact with the ocean surface',5=>'The Air Force used the Shuttle for classified military satellite launches only.+The shuttle program was suspended temporarily.=The disaster has been used in many engineering case studies.+A special investigative commission was formed.'];
$qs[10]['a003'] = [1=>'Which of these does not describe Mauna Kea?',2=>'Why does it have a steeper profile today than when it was in its earlier years?',3=>'Which of these did not result from the Europeans arrival in the late 18th century?',4=>'Which of these was not given as a reason why Mauna Kea is a good place to study astronomy?',5=>'Which of these is not a reason why the building of a large telescope on Mauna Kea is controversial?'];
$chs[10]['a003'] = [1=>'It has been dormant for one million years.+It is taller than Mt. Everest from its base to peak.=Its peak is considered sacred in Hawaii.+Most of it is found below sea level.',2=>'Its lava decreased its ability to flow in later years.+Its lava increased its ability to flow in later years.=Its lava had a lower tendency to flow in earlier years.+Its lava flowed more easily in later years.',3=>'The native species eliminated the animals that they brought with them.+The ecology of the mountain was ruined.=The animals that they brought became a threat to the native species.+The government was forced to eliminate all feral species in the mountain.',4=>'high humidity+high elevation=low humidity+stable airflow',5=>'It will not provide earnings for the government.+It is a sacred place.=There are endangered species there.+It might affect some cultural practices there.'];
$qs[10]['a004'] = [1=>'What is the article about?',2=>'Why is the comparison of human DNA to chimpanzee DNA interesting?',3=>'Which of these is not supported by the article?',4=>'Which of these was not shown by nor can be concluded from J. Michael Bedford\'s experiments?',5=>'Which of these is certain as of the article\'s writing?'];
$chs[10]['a004'] = [1=>'the possibility of producing a human/chimpanzee hybrid+the possibility of cloning a chimpanzee from human DNA=how scientists were able to produce a human/chimpanzee hybrid+how alteration of chimpanzee DNA can produce a human-like chimpanzee',2=>'Human DNA is very similar to chimpanzee DNA.+Human DNA is identical to chimpanzee DNA.=Some humans have chimpanzee DNA.+Some chimpanzees have human DNA.',3=>'Species with different numbers of chromosomes can never produce a hybrid.+Some chromosomes in humans and apes match.=Horses and donkeys can breed with each other to produce mules.+Attempts to produce a humanzee have been happening since the 1920s.',4=>'that a human can produce a hybrid with a baboon+that human sperm could penetrate the outer membranes of a gibbon egg=that human sperm would not attach to an ovum of a non-hominoid primate+that humans can possibly produce hybrids with hominoid primates',5=>'A humanzee has never been actually seen nor produced.+A human/primate hybrid already exists.=All scientists agree that a humanzee can be produced.+All scientists agree that a humanzee can never be produced.'];

// ---- Helpers ----
function rcomp_parse_choices(string $line): ?array {
    // Format: "correct+w1=w2+w3"
    $eq = strpos($line, '=');
    if ($eq === false) return null;
    $ab = substr($line, 0, $eq);
    $cd = substr($line, $eq + 1);
    $p1 = strpos($ab, '+');
    $p2 = strpos($cd, '+');
    if ($p1 === false || $p2 === false) return null;
    return [
        'correct' => substr($ab, 0, $p1),
        'wrong'   => [substr($ab, $p1 + 1), substr($cd, 0, $p2), substr($cd, $p2 + 1)],
    ];
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $postans = $_POST['postans'] ?? [];
    $tscore  = 0;
    $total   = count($cur['questions']);

    foreach ($cur['questions'] as $i => $q) {
        if (isset($postans[$i]) && $postans[$i] === $q['correct']) {
            $tscore++;
        }
    }
    $isPerfect = ($tscore === $total);

    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer($isPerfect ? 'perfect' : 'imperfect', 'perfect', $cur['lvl']);

    $result = [
        'perfect' => $isPerfect,
        'tscore'  => $tscore,
        'total'   => $total,
        'postans' => $postans,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $arrnum = resolve_rcomp_arrnum($lvl, $grd);

    $artPool = $articles[$arrnum] ?? $articles[0];
    $imgPool = $imgs[$arrnum]     ?? $imgs[0];

    // No-repeat tracking
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($artPool as $i => $artId) {
        if (!in_array($artId, $used, true)) $available[] = $i;
    }
    if (empty($available)) {
        $used = [];
        $available = array_keys($artPool);
    }
    $pickIdx = $available[array_rand($available)];
    $artId   = $artPool[$pickIdx];
    $imgName = $imgPool[$pickIdx];
    $used[]  = $artId;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $qbank = $qs[$arrnum][$artId]   ?? [];
    $cbank = $chs[$arrnum][$artId]  ?? [];

    $questions = [];
    foreach ($qbank as $i => $qtext) {
        $parsed = rcomp_parse_choices($cbank[$i] ?? '');
        if ($parsed === null) continue;

        $choices = array_merge([$parsed['correct']], $parsed['wrong']);
        shuffle($choices);

        $questions[$i] = [
            'q'       => $qtext,
            'correct' => $parsed['correct'],
            'choices' => $choices,
        ];
    }

    $_SESSION[$sessionKey]['current'] = [
        'article'   => $artId,
        'img'       => 'articles/' . $imgName . '.jpg',
        'arrnum'    => $arrnum,
        'lvl'       => $lvl,
        'questions' => $questions,
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
    $cur     = $result['cur'];
    $postans = $result['postans'];
?>
  <div style="margin:20px auto 15px;max-width:800px;">
    <img src="<?php echo htmlspecialchars($cur['img']); ?>" style="max-width:100%;height:auto;border:2px solid #DDD;border-radius:8px;">
  </div>

  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['perfect'] ? '#006600' : '#CC0000'; ?>;margin:15px auto;">
    Your score: <?php echo (int)$result['tscore']; ?>/<?php echo (int)$result['total']; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:700;color:<?php echo $result['perfect'] ? '#CC0066' : '#800080'; ?>;margin:5px auto 20px;">
    <?php echo $result['perfect'] ? 'All your answers are correct!' : 'Sorry, you didn\'t get a perfect score.'; ?>
  </p>

  <?php foreach ($cur['questions'] as $i => $q):
      $userAns = $postans[$i] ?? '';
  ?>
    <div style="max-width:500px;margin:20px auto;padding:16px 22px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;text-align:left;font-family:Arial,sans-serif;box-sizing:border-box;">
      <p style="font-size:14pt;font-weight:700;color:#800080;margin:0 0 10px;">
        <?php echo (int)$i; ?>. <?php echo htmlspecialchars($q['q']); ?>
      </p>
      <?php foreach ($q['choices'] as $c): ?>
        <p style="font-size:13pt;margin:4px 0;<?php
          if ($c === $q['correct']) echo 'color:#CC0066;font-weight:700;';
          elseif ($c === $userAns) echo 'color:#CC0000;font-weight:700;';
          else echo 'color:#333;';
        ?>">
          <?php if ($c === $q['correct']): ?>
            &#9989; <?php echo htmlspecialchars($c); ?>
            <?php if ($c === $userAns): ?><em style="color:#006600;"> (your answer - correct)</em><?php endif; ?>
          <?php elseif ($c === $userAns): ?>
            &#10060; <?php echo htmlspecialchars($c); ?> <em>(your answer)</em>
          <?php else: ?>
            <?php echo htmlspecialchars($c); ?>
          <?php endif; ?>
        </p>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>

  <input type="submit" name="Submit2" value="Another One" style="display:block;margin:30px auto 20px;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:700;color:#800080;margin:20px auto;">
    Read the story or article below,<br/>then answer the following questions.
  </p>
  <div style="margin:20px auto 15px;max-width:800px;">
    <img src="<?php echo htmlspecialchars($q['img']); ?>" style="max-width:100%;height:auto;border:2px solid #DDD;border-radius:8px;">
  </div>

  <?php foreach ($q['questions'] as $i => $question): ?>
    <div style="max-width:500px;margin:20px auto;padding:16px 22px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;text-align:left;font-family:Arial,sans-serif;box-sizing:border-box;">
      <p style="font-size:14pt;font-weight:700;color:#800080;margin:0 0 10px;">
        <?php echo (int)$i; ?>. <?php echo htmlspecialchars($question['q']); ?>
      </p>
      <?php foreach ($question['choices'] as $c): ?>
        <label style="display:block;font-size:13pt;color:#333;margin:4px 0;cursor:pointer;">
          <input type="radio" name="postans[<?php echo (int)$i; ?>]" value="<?php echo htmlspecialchars($c); ?>">
          <?php echo htmlspecialchars($c); ?>
        </label>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>

  <p style="font-family:Arial,sans-serif;font-size:12pt;color:#666;margin:20px auto 10px;max-width:520px;">
    Be careful. You need to get a perfect score in order to get a point.
  </p>
  <div style="margin:20px 0;">
    <input type="submit" name="Submit1" value=" Submit " style="margin-right:12px;font-family:Arial,sans-serif;font-size:11pt;">
    <input type="submit" name="Submit2" value=" Another One " style="margin-left:12px;font-family:Arial,sans-serif;font-size:11pt;">
  </div>
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