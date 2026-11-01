<?php
// english/modules/context-clues.php
// Context Clues — read a sentence with a highlighted target word; pick its meaning.
// 6 tiers via (level × grade); module targets grades 2–10 (0–1 clamped to 2).
// Easy &#8594; legacy Easy formula, Hard &#8594; legacy Hard formula (harder of Medium/Hard).
// 3 choices always (correct meaning + 2 distractors), vertical stack.

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
$moduleTitle = 'Context Clues';
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
// Legacy:
//   Easy:   grd 2-3&#8594;1, 4-5&#8594;2, 6-7&#8594;3, &#8805;8&#8594;4
//   Medium: grd 2-3&#8594;2, 4-5&#8594;3, 6-7&#8594;4, &#8805;8&#8594;5
//   Hard:   grd 2-3&#8594;3, 4-5&#8594;4, 6-7&#8594;5, &#8805;8&#8594;6
// Module is for grades 2–10; treat grades 0-1 as grade 2.
function resolve_context_clues_tier(string $lvl, int $grd): int {
    if ($grd < 2) $grd = 2;
    if ($lvl === 'Easy') {
        if ($grd <= 3) return 1;
        if ($grd <= 5) return 2;
        if ($grd <= 7) return 3;
        return 4;
    }
    if ($grd <= 3) return 3;
    if ($grd <= 5) return 4;
    if ($grd <= 7) return 5;
    return 6;
}

// ---- Legacy markers ($redq/$grayq) become {v}...{/v} highlight ----
// Legacy data embedded these as PHP variables that expanded to <font> tags.
// Define them here so the strings below bake in {v} / {/v}, then the parser
// extracts and re-renders the target word.
$redq  = '{v}';
$grayq = '{/v}';

// ---- Raw data (§5) — verbatim from legacy, two typo fixes noted below ----
$rawData = [];

$rawData[1] = [
    // nouns
    "edifice=a large building+a small church/a massive vehicle>Kyla got lost inside the magnificent $redq edifice$grayq.",
    "enigma=a puzzling mystery+a joyful event/a bad habit>Even scientists couldn't explain the $redq enigma $grayq of the missing ship.",
    "famine=a widespread lack of food+a noisy fight/a serious illness>Many people starved because of the $redq famine$grayq.",
    "knack=a natural ability or talent+a loud noise/a sad feeling>Minda has a $redq knack $grayq for making people laugh.",
    "malice=a desire to harm or upset people+a good deed/an honest remark>Bernie showed $redq malice $grayq when he tripped Paula.",
    "particle=a tiny piece+a large rock/a heap of mud>A sand $redq particle $grayq entered his eye.",
    "prowess=a special skill or ability+a talented person/luck or good fortune>They need Jason's $redq prowess $grayq on the basketball court to win the title.",
    "spectator=a person who watches something+an actor or performer/a member of a group>Charlie was just a $redq spectator $grayq of the play so he was not part of it.",
    "splinter=a small and sharp fragment+a large, round object/a piece of cloth>Lito's mother removed the wood $redq splinter $grayq from his thumb.",
    "tragedy=a sad or terrible event+a fortunate occurrence/a cherished memory>The sinking of that ship was indeed a great $redq tragedy$grayq.",
    // adjectives
    "amazing=causing great wonder+causing deep sadness/causing boredom>Everyone enjoyed the $redq amazing $grayq acrobatic act at the circus.",
    "ample=more than enough+very scarce/less than what is needed>The typhoon victims thanked the mayor for sending them $redq ample $grayq food.",
    "anxious=uneasy or nervous+eager and ready/very cheerful>My seatmate looked $redq anxious $grayq before our math test because he forgot to study.",
    "constant=not changing+always moving/never at rest>The car's speed is $redq constant $grayq so it is neither increasing nor decreasing.",
    "demure=quiet, modest, and shy+always seeking attention/loud and rowdy>The $redq demure $grayq lady just sat in one corner during the party.",
    "furious=very angry+quite pleased/a bit confused>Glenda got $redq furious $grayq at the security guard when he did not let her into the building.",
    "grisly=causing horror or dread+very pleasant/large and powerful>The princess shrieked in fear when the $redq grisly $grayq monster appeared.",
    "hapless=unlucky+fortunate/fearless>The hungry lion caught the $redq hapless $grayq zebra after a long chase.",
    "lofty=very high+really low/plain or simple>My ambitious brother has set $redq lofty $grayq goals for himself.",
    "modest=humble+boastful/smart>Our $redq modest $grayq neighbor doesn't brag about his successful business.",
    // verbs
    "chide=to scold or criticize+to praise/to congratulate>The teacher might $redq chide $grayq you if you forget to do your homework.",
    "cleave=to split or break+to bend/to stretch>The lumberjack used a sharp ax to $redq cleave $grayq the logs.",
    "creep=to move slowly+to jump up and down/to talk aloud>We just $redq creep $grayq to the kitchen quietly if we want to get cookies.",
    "flourish=to grow vigorously+to wither and die/to weaken>With proper care, you can make these plants $redq flourish$grayq.",
    "forecast=to predict+to stop/to control>We need some instruments to $redq forecast $grayq the weather.",
    "fuss=to complain+to jump with joy/to run away>The boy wanted to $redq fuss $grayq when he got a low grade in the math quiz.",
    "glisten=to shine or sparkle+to pay attention to/to make smoother>Roy made the car $redq glisten $grayq by polishing it with wax.",
    "hurtle=to move very fast+to destroy/to speak loudly>If you don't step on the brakes, we'll $redq hurtle $grayq through that fence!",
    "loathe=to dislike greatly+to disturb/to complain>People $redq loathe $grayq him for burning down his neighbor's house.",
    "raving=speaking wildly+whispering softly/explaining cheerfully>The frightened hikers were $redq raving $grayq about a crocodile that attacked them.",
    "shun=to stay away from+to get close to/to look for>Small fishes usually $redq shun $grayq large predators like sharks.",
    "summon=to call to come+to give something to/to scold>The dog trainer whistled to $redq summon $grayq the puppies to his side.",
];

$rawData[2] = [
    // nouns
    "alcove=a space built into a wall+a small pouch/a lighting fixture>The little boy hides in the $redq alcove $grayq of his bedroom to read comic books.",
    "alibi=an excuse to show innocence+an official pardon or forgiveness/a solid proof of guilt>The man's $redq alibi $grayq shows that he was at work when the burglary happened.",
    "chagrin=disappointment or embarrassment+joy or happiness/pride or satisfaction>My brother didn't pass the driving test, much to his $redq chagrin$grayq.",
    "dearth=scarcity or lack of something+abundance or oversupply/destruction>The rapid spread of the infectious disease has resulted in a $redq dearth $grayq of hospital beds.",
    "mettle=strength of spirit+lack of self-confidence/inability to complete a task>The soldiers showed their $redq mettle$grayq by defending the city despite being outnumbered.",
    "perseverance=persistence to achieve something+lack of respect/inherited wealth>They didn't have a lot of money but Hilda had the $redq perseverance $grayq to succeed.",
    "quagmire=a difficult situation+an enjoyable activity/a festive occasion>It would be hard to recover from the $redq quagmire $grayq they're in right now.",
    "pundit=an expert in a field+a person who breaks rules/someone who's not sincere>The show featured a $redq pundit $grayq of medicine who explained how to avoid a pandemic.",
    "reverie=a daydream+a celebration/a secret>I often have a $redq reverie $grayq about having my own castle in Europe.",
    "revelry=a loud merrymaking+a daydream/an uprising>The birthday $redq revelry $grayq next door kept us awake all night.",
    // adjectives
    "docile=easy to handle or control+wild or savage/fearful or frightened>The $redq docile $grayq lion cub loves to play with visitors at the zoo.",
    "elated=filled with joy+disappointed/horrified>The student was $redq elated $grayq when she got an academic award she didn't expect.",
    "feral=wild or savage+sociable/easy to handle or control>Their lost cat has become $redq feral $grayq and now survives by hunting mice and birds.",
    "fervent=showing strong passion+calm and peaceful/marked by sincerity>The $redq fervent $grayq debate between the two candidates almost turned into a fistfight.",
    "harrowing=extremely distressing or painful+rare or uncommon/very exciting>My uncle's $redq harrowing $grayq experience ten years ago still haunts him today.",
    "innate=inborn or natural+acquired by working/learned from experience>The musical talent of the four-year-old boy playing the piano must be $redq innate$grayq.",
    "logical=based on good reasoning+unforgettable/filled with emotions>Dr. Tan's $redq logical $grayq mind allowed him to come up with the right decision quickly.",
    "mundane=common or ordinary+special and exciting/unfair or unreasonable>Jerome's $redq mundane $grayq daily routine changed when his lottery ticket won first prize.",
    "persistent=refusing to give up+easy to convince/temporary>The $redq persistent $grayq guitarist didn't stop practicing until he mastered his part.",
    "tacit=expressed without words+deceptive/spoken loudly>A firm handshake represents a $redq tacit $grayq agreement between two businessmen.",
    "urgent=needing immediate attention+not important/unplanned or unexpected>The doctors had an $redq urgent $grayq meeting on how to stop the disease from spreading.",
    // verbs
    "bicker=argue about unimportant things+discuss ideas intelligently/wait for something to happen>The twins $redq bicker $grayq all the time over who gets to use the bicycle.",
    "derive=to obtain or form from something else+to create from nothing/to imagine>My aunt knows how to $redq derive $grayq certain medicines from exotic leaves.",
    "imbibe=to drink or take in+to set in a place/to refuse something>He is not supposed to $redq imbibe $grayq sugary drinks because of his medical problem.",
    "impel=to urge or force forward+to stop or prevent/to destroy>Politicians are now using social media to $redq impel $grayq people to vote for them.",
    "modify=to change+to understand/to destroy>Brando wanted to make his car more powerful so he hired a mechanic to $redq modify $grayq its engine.",
    "pacify=to calm down a person+to praise oneself/to annoy or irritate someone>The policemen came to $redq pacify $grayq the angry citizens.",
    "pillage=to rob with violence+to make someone ill/to deceive>Centuries ago, foreign invaders $redq pillaged $grayq the cities they conquered.",
    "subside=to wear off or die down+to become stronger/to change into something else>You should wait for your father's anger to $redq subside $grayq before asking him for money.",
    "surmise=to suppose or guess+to establish as truth/to be pleased with>Laura doesn't know what her sickness is but it's fair to $redq surmise $grayq that it isn't serious.",
];

$rawData[3] = [
    // nouns
    "disposition=usual mood or general attitude+skillfulness or expertise/health condition>Mr. Castro always has a pleasant $redq disposition $grayq so don't be afraid to approach him.",
    "foreboding=a feeling that something bad will happen+a good feeling about oneself/something that brings luck>Yolly had an eerie sense of $redq foreboding $grayq that made her leave the haunted house at once.",
    "idiosyncrasy=an unusual characteristic or habit+something that we see in most people/the ability to think fast>My brother's $redq idiosyncrasy $grayq of always picking his nose in public has made him unpopular in school.",
    "imposition=an unwelcome demand or burden+an unexpected reward or benefit/a solution to a problem>The mayor's $redq imposition $grayq would make it harder for jobless people to find employment.",
    "parity=the state of being equal or equivalent+unfair or uneven distribution/an imbalance between two things>The feminist senator wants $redq parity $grayq in the wages and benefits received by male and female workers.",
    "pariah=someone who is avoided or rejected+someone who is popular/a leader in society>He has become a $redq pariah $grayq even in his own village because of his unforgivable evil deeds.",
    "partiality=a bias in favor of something+fair treatment for all/the state of not being full>Because of our coach's $redq partiality $grayq towards taller players, everyone on our team is at least six feet tall.",
    "portent=an indication that something will happen+a memory of an important event/a deep-seated wish or desire>Many people believe that encountering a black cat is a $redq portent $grayq of bad luck.",
    "precept=a rule for action or behavior+the art of persuasive speaking/a judgment about a person>To make things better between them, they both agreed to use the Golden Rule as a $redq precept$grayq.",
    "propriety=appropriate behavior+bad conduct/lack of interest>The teacher was pleased when her students behaved with $redq propriety $grayq inside the museum.",
    "rhetoric=the art of persuasive speaking or writing+a sarcastic comment/a rule for action or behavior>The speaker's powerful $redq rhetoric $grayq convinced the audience to join his marketing network.",
    "renegade=someone who rebels or becomes an outlaw+a heroic law enforcer/a deceitful person>The colonel used to follow all rules but he is now a $redq renegade $grayq doing things his own way.",
    "rudiments=the basic principles of a subject+advanced theories or concepts/lessons learned later in life>Peter got the $redq rudiments $grayq of arithmetic from his father before he turned six.",
    "scrutiny=a careful examination+a guess with no basis/inappropriate behavior>The smuggler got caught because he wasn't able to pass the inspectors' $redq scrutiny $grayq of his belongings.",
    "semblance=a seeming likeness that is not real+a genuine and exact copy/an identical substitute>Tom was not happy so his lips just showed a $redq semblance $grayq of a smile.",
    // adjectives
    "austere=stern and serious in manner+easy to approach and talk to/outgoing and adventurous>The $redq austere $grayq mayor makes people uncomfortable but he is actually helpful to the needy.",
    "contrite=remorseful or repentant+feeling neither guilt nor regret/causing anxiety or distress>The man caught stealing from the store seemed $redq contrite$grayq, breaking down in tears and apologizing endlessly.",
    "craven=very cowardly+annoying or vexing/diligent and hardworking>The $redq craven $grayq man refused to save the crying baby from the burning building.",
    "languid=sluggish or unenergetic+uneasy or restless/lively and vigorous>The $redq languid $grayq animal didn't move an inch the whole time I was at the zoo.",
    "latent=hidden or dormant but ready to manifest+visible and active/non-existent>The jar with a $redq latent $grayq crack simply broke apart for no apparent reason when it was picked up.",
    "primeval=ancient or relating to the earliest ages+most important/impossible to understand>We went to a museum that exhibits $redq primeval $grayq tools used by prehistoric humans.",
    "transient=passing through briefly+stable or permanent/vibrating or oscillating>The computer glitch was caused by a $redq transient $grayq voltage disturbance that didn't even last for one second.",
    "viscous=not flowing easily+very fast-moving/thin to the touch>Motor oil and honey are examples of liquids that are more $redq viscous $grayq than water.",
    // verbs
    "cajole=to urge or persuade by coaxing or flattery+to harass with accusing questions/to mock or ridicule>The coach uses inspiring words to $redq cajole $grayq his players into more hours of practice.",
    "chastise=to scold or reprimand severely+to give consent to/to motivate or inspire>The department secretary should $redq chastise $grayq his officials for not following the official plan of action.",
    "inculcate=to teach an idea through repetition+to scold harshly/to learn concepts from>The sergeant's goal is to $redq inculcate $grayq the new recruits with patriotism and unquestioning obedience to authority.",
    "provoke=to cause someone to react negatively+to convince in a nice manner/to express an emotion>The naughty boy tried to $redq provoke $grayq the young girl by snatching her bag.",
    "protrude=to stick out from something+to destroy or damage/to enter without permission>We can only start painting this wall after we've removed all the nails that $redq protrude $grayq from it.",
    "rebuke=to scold or criticize+to express approval for/to give support to>The teacher did not $redq rebuke $grayq the students but she explained to them the consequences of their bad deed.",
    "vilify=to defame or speak ill of+to seek approval from/to write pleasant things about>Many politicians would do anything to get a chance to $redq vilify $grayq their rivals in broadcast media.",
];

$rawData[4] = [
    // nouns
    "acumen=the ability to make good decisions quickly+a lack of deep understanding/a tendency to make poor judgments>Their impressive business $redq acumen $grayq has made their company very big and profitable.",
    "advocate=a person who publicly supports a cause or idea+someone who can't convince people/a person who has no regard for others>The founder of that animal rescue center is a strong $redq advocate $grayq of animal rights.",
    "ascendancy=a position of power or strength+quest for fame and success/search for wisdom and knowledge>Their boss thinks that he has the $redq ascendancy $grayq to order his employees around in a disrespectful manner.",
    "caprice=a sudden desire or impulsive action+a deliberate and careful decision/a wish that hasn't become a reality yet>Their on-the-spot decision to buy a new car last month was a $redq caprice $grayq they now regret.",
    "collation=an ordered collection of written information+a complaint against another person/a gathering of people for a cause>Gertrude turned a $redq collation $grayq of his grandfather's essays into a book.",
    "conundrum=a confusing and difficult problem+lack of interest/a sudden desire or impulsive action>The students realized that even their teachers couldn't solve their $redq conundrum$grayq.",
    "credence=the belief that something is true+the ability to make good decisions quickly/a hastily formed opinion>His brilliant theory is starting to gain $redq credence $grayq among other scientists.",
    "cupidity=greed for money or possessions+hunger for new knowledge/concern for fellow human beings>The businessman's $redq cupidity $grayq led him to pursue illegal activities that landed him in jail.",
    "decadence=moral decline or decay+a cultural change/extreme poverty>The $redq decadence $grayq of the rich city has led to a steady increase in crime rate.",
    "encroachment=intrusion into a property+an assigned place for a special event/a fight for freedom and justice>They are seeking legal help to address the homeless people's $redq encroachment $grayq on their vacant lot.",
    "impetus=a force that makes something happen+a model of excellence or perfection/a controversial decision>Romy's desire to a buy his own car is his $redq impetus $grayq for taking on two jobs.",
    "largess=generous giving of gifts or money+greed for money or possessions/a sudden desire or impulsive action>His siblings in the province are so poor that they probably wouldn't survive without his $redq largesse$grayq.",
    "levity=lack of seriousness+a tense situation/audacity or recklessness>My carefree brother always treats our anxious moments with $redq levity $grayq to calm us down.",
    "modicum=a small amount of something+truthfulness or accuracy/a bias in favor of something>The rowdy gangsters in our neighborhood don't have a $redq modicum $grayq of decency.",
    "panacea=a remedy for all ills or difficulties+moral decline or decay/moral uprightness or integrity>Money is not a $redq panacea $grayq for all the world's problems and diseases.",
    // adjectives
    "conscientious=doing things diligently and responsibly+doing things hastily/doing things without thinking>The $redq conscientious $grayq employee performed each step of the process with extreme care.",
    "cursory=hasty with no attention to details+very focused and thorough/efficient and effective>The policeman only gave the woman a $redq cursory $grayq glance so he didn't notice the baby in her backpack.",
    "ephemeral=short-lived or fleeting+perpetual or permanent/extremely beautiful>The sandcastle that the students built was magnificent, but it was also just $redq ephemeral$grayq.",
    "fastidious=demanding very high standards+always conscious about time/easy to satisfy>Thomas is so $redq fastidious $grayq that he refuses to eat in a fast food restaurant.",
    "fecund=fruitful or productive+overly concerned with details/lacking in self-motivation>The $redq fecund $grayq engineer worked on several projects last month and finished all of them on time.",
    "infallible=incapable of error or failure+prone to make mistakes/too trusting in others>Our manager may look $redq infallible$grayq, but he's just a human being who also makes mistakes.",
    "querulous=habitually complaining+without conviction/lacking self-respect>Whenever my father feels unwell, he becomes $redq querulous $grayq and grumbles about everything.",
    "reticent=unwilling to communicate+adventurous and outgoing/tending to remind one of something>My $redq reticent $grayq cousin keeps everything to himself and never talks about his thoughts and feelings.",
    "sanguine=optimistic or hopeful+always worrying about the future/strange or unfamiliar>Joey's illness doesn't prevent him from counting his blessings and being $redq sanguine $grayq all the time.",
    // verbs
    "admonish=to warn or scold firmly+to frighten away/to ask for payment>The mischievous boys were $redq admonished $grayq by their father when they broke some merchandise at the store.",
    "beguile=to influence by deceit+to convince in an honest way/to give a detailed explanation>The investment scammers $redq beguile $grayq their clueless victims by using flattery and making promises of easy money.",
    "capitulate=to surrender under certain terms+to evade arrest/to wait for help>The escaped prisoner decided to $redq capitulate $grayq after realizing that the entire police force is after him.",
    "eschew=to avoid or stay away from+to distort or deform/to eagerly accept>I know some priests who $redq eschew $grayq all material things and simply focus on helping others strengthen their faith.",
    "insinuate=to suggest or hint indirectly+to explain clearly/to doubt or suspect>Rhodora got mad when her classmate tried to $redq insinuate $grayq that she cheated in the test.",
    "pervade=to spread throughout+to be under control/to diminish in strength>Medical experts predict that the highly contagious disease will $redq pervade $grayq every part of the country if no actions are taken.",
];

$rawData[5] = [
    // nouns
    "affability=the quality of being friendly and easy to talk to+a feeling of intense dislike/uprightness or extreme morality>The soldiers enjoy spending time with the general because of his $redq affability$grayq.",
    "avarice=extreme greed for material wealth+lack of self-confidence/an angry verbal attack>The employee's $redq avarice $grayq led him to steal millions of pesos from the company.",
    "depredation=a destructive action+a state of extreme anger/moral decline or decay>The $redq depredation $grayq of that dam will cause a severe water shortage in this town.",
    "diffidence=lack of self-confidence+an assertive personality/arrogance or conceit>Your $redq diffidence $grayq is preventing you from letting the world know what you have achieved.",
    "fortitude=mental strength for facing challenges+a large building with thick walls/great physical strength>Successful businessmen often have the $redq fortitude $grayq to deal with severe economic downturns.",
    "harangue=a lengthy and aggressive speech+a short congratulatory remark/a religious ceremony>The new mayor delivered an hour-long $redq harangue $grayq about the corruption of some city hall employees.",
    "incongruity=unsuitability or incompatibility+symmetry or balance/a shared purpose>I can't repair this machine because of the $redq incongruity $grayq between its broken part and the one you bought as replacement.",
    "malediction=a curse+an uncontrollable habit/an angry verbal attack>Before the witch was captured, she was able to invoke a $redq malediction $grayq that turned the queen into an ogre.",
    "parsimony=frugality or stinginess+extravagant spending/love for your own country>The charity event did not reach its target funding because of its sponsors' $redq parsimony$grayq.",
    "proclivity=a strong tendency to do something+a feeling of intense dislike/the ability to create new things>Our professor's $redq proclivity $grayq for math is shown by the many hours he spends on solving difficult math problems.",
    "serendipity=the occurrence of an unplanned fortunate event+a series of misfortunes/a well-planned event>It was $redq serendipity $grayq when the man unexpectedly ran into his missing son at the crowded market.",
    // adjectives
    "clandestine=done in secret+performed in public/conducted in a lavish manner>Nobody knew about the group's $redq clandestine $grayq activities until a reporter discovered what they were up to.",
    "deleterious=harmful or damaging+without negative effects/highly beneficial>The introduction of invasive species into Laguna Lake is $redq deleterious $grayq to the local fishes living there.",
    "egregious=extremely bad+very friendly and sociable/stylish and fashionable>Plagiarism is an $redq egregious $grayq academic offense that all students must avoid committing.",
    "sagacious=wise and showing good judgment+foolish or senseless/evil or unprincipled>The $redq sagacious $grayq leader brought progress to the village by solving many of its challenging difficulties.",
    "inscrutable=difficult to investigate or understand+confirmed or undeniable/extremely idealistic>Not even the seasoned scholars could determine the true meaning of the $redq inscrutable $grayq writings.",
    "penurious=miserly or unwilling to spend money+incapable of being persuaded/stubbornly persistent>The $redq penurious $grayq millionaire would rather ask for food from relatives and friends than buy his own food.",
    "surreptitious=marked by secrecy and caution+lacking in subtlety/arrogant and overconfident>The soldiers carefully deployed their new weapons in a $redq surreptitious $grayq manner so as not to alert their enemy.",
    // verbs
    "acquiesce=to agree or to give in+to vehemently object/to claim to be innocent>The business owner simply decided to $redq acquiesce $grayq to the employees' demands than to confront them in court.",
    "enervate=to weaken or to lessen the vitality of+to infuse more energy to/to rise to a new level>The zookeeper used a tranquilizer gun to $redq enervate $grayq the escaped lion before capturing it.",
    "expunge=to erase or remove completely+to pardon or forgive/to increase the volume of>The president agreed to $redq expunge $grayq my cousin's criminal records so he can now have a fresh start in life.",
    "repudiate=to reject or to deny the truth of+to provide evidence for/to investigate thoroughly>The famous actor did his best to $redq repudiate $grayq the allegations that he is back to his gambling habit.",
];

$rawData[6] = [
    // nouns
    "acrimony=bitterness or ill feelings+perfect harmony/lack of initiative>Luis shows his $redq acrimony $grayq for his new stepmother by ignoring her presence and disobeying her orders.",
    "alacrity=cheerful eagerness+lack of excitement/a strong dislike for something>Given the ongoing economic recession, the new graduate accepted his first job offer with $redq alacrity$grayq.",
    "calumny=a false and defamatory statement+a flattering comment/an honest review or feedback>The $redq calumny $grayq hurled against the businessman will certainly hurt his reputation, so he's planning to pursue some legal actions.",
    "declivity=a downward slope+an upward push/fatigue or exhaustion>Fred's injured knees couldn't handle the sudden $redq declivity $grayq of the pathway, so he stumbled and rolled down the hill.",
    "effrontery=insolence or disrespectful behavior+offensive language/readiness to help>The burglar had the $redq effrontery $grayq to also vandalize the victims' house after taking all their valuables.",
    "impudent=rude or insolent+unable to think clearly/difficult to understand>The rich lady felt disrespected by the $redq impudent $grayq salesman, so she bought the expensive bag from the store manager instead.",
    "munificent=extremely generous+unwilling to spend money/lively or enthusiastic>The funding that the ecstatic inventor received from his $redq munificent $grayq investors exceeded his wildest expectations.",
    "pulchritudinous=physically attractive or beautiful+vexing or annoying/exuding an unpleasant smell>The men couldn't help being mesmerized by the stunning looks of the $redq pulchritudinous $grayq actress.",
    "vicissitudes=changes in fortune or circumstance+spiritual endeavors/charitable activities>Sickness, job loss, and divorce are just some of the $redq vicissitudes $grayq that people go through in their lives.",
    // adjectives
    "asinine=extremely stupid or foolish+bitter in tone or taste/rational or sensible>The official's decision to let the typhoon victims starve instead of releasing the emergency fund is $redq asinine$grayq.",
    "assiduous=diligent and persistent+rude and irritable/disorderly or unruly>Our $redq assiduous $grayq supervisor verifies our experimental results twice before collating them in a detailed report.",
    "ebullient=extremely lively and energetic+uninteresting or easy to forget/too complex to appreciate>The songs played at the party were so $redq ebullient $grayq that people stayed on the dance floor for hours.",
    "execrable=loathsome or detestable+forgivable or excusable/full of life>The situation of the emaciated animals in that utterly neglected zoo is truly $redq execrable$grayq.",
    "mendacious=habitually lying or untruthful+stubbornly persistent/momentary or ephemeral>Being aware of biased writing techniques would help one detect $redq mendacious $grayq advertising.",
    "obsequious=excessively compliant or submissive+commanding or domineering/disloyal or unfaithful>The corrupt politician's $redq obsequious $grayq henchmen would do anything for him with no questions asked.",
    "pejorative=derogatory or uncomplimentary+flattering or gratifying/sincere and heartfelt>The lawyer's $redq pejorative $grayq remark about the aggrieved party infuriated even the barangay officials.",
    // verbs
    "adjudicate=to settle judicially+to punish or penalize/to make a new law>The new law was challenged by human rights groups so there's now a need for courts to $redq adjudicate$grayq its legal merits.",
    "adumbrate=to sketch out faintly or vaguely+to provide detailed information/to indicate in a bold manner>The forensic artist didn't have enough time so all he could do was to $redq adumbrate $grayq a likeness of the criminal.",
    "arrogate=to take without justification+to yield or give in/to condemn vehemently>The informal settlers decided to $redq arrogate $grayq the vacant lot despite the warnings of the barangay officials.",
    "obfuscate=to render unclear or incomprehensible+to clarify or elucidate/to make uninteresting>This wordy contract was written to $redq obfuscate $grayq the reader so be sure you understand it completely before affixing your signature.",
    "propitiate=to win the favor or goodwill of+to make a lot of money from/to rebuke or reprimand>The wealthy criminal thought that he could $redq propitiate $grayq his disillusioned men by giving them more money.",
    "vacillate=to sway or fluctuate/to take a firm position+to guarantee>The people of that province now regret voting for the indecisive governor whose opinions and decisions $redq vacillate $grayq from time to time.",
    "vituperate=to berate or insult+to exalt or dignify/to invigorate or energize>The disheartened basketball players don't have the confidence to win anymore because their coach $redq vituperate $grayq them all the time.",
];

// ---- Pre-parse data (§5.1) ----
function parse_context_entry(string $raw): ?array {
    $eq    = strpos($raw, '=');
    $plus  = strpos($raw, '+');
    $slash = strpos($raw, '/');
    $gt    = strpos($raw, '>');
    if ($eq === false || $plus === false || $slash === false || $gt === false) return null;
    if (!($eq < $plus && $plus < $slash && $slash < $gt)) return null;

    $word     = substr($raw, 0, $eq);
    $correct  = substr($raw, $eq + 1, $plus - $eq - 1);
    $wrong1   = substr($raw, $plus + 1, $slash - $plus - 1);
    $wrong2   = substr($raw, $slash + 1, $gt - $slash - 1);
    $sentence = substr($raw, $gt + 1);
    if ($word === '' || $correct === '' || $sentence === '') return null;

    return [
        'word'     => $word,
        'correct'  => $correct,
        'wrong'    => [$wrong1, $wrong2],
        'sentence' => $sentence,
    ];
}

$items = [];
foreach ($rawData as $tier => $rawList) {
    $items[$tier] = [];
    foreach ($rawList as $raw) {
        $parsed = parse_context_entry($raw);
        if ($parsed !== null) $items[$tier][] = $parsed;
    }
}

// ---- Helpers (§8.4, §8.6) ----
function clues_box(string $html, int $minHeight = 140): void {
    echo '<div style="max-width:520px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
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
function render_context_sentence(string $sentence): string {
    $out = '';
    $pos = 0;
    while (($start = strpos($sentence, '{v}', $pos)) !== false) {
        $out .= htmlspecialchars(substr($sentence, $pos, $start - $pos));
        $end = strpos($sentence, '{/v}', $start + 3);
        if ($end === false) {
            $out .= htmlspecialchars(substr($sentence, $start));
            return $out;
        }
        $word = substr($sentence, $start + 3, $end - $start - 3);
        $out .= '<strong style="color:#CC0066;">' . htmlspecialchars(trim($word)) . '</strong>';
        $pos = $end + 4;
    }
    $out .= htmlspecialchars(substr($sentence, $pos));
    return $out;
}

// ---- No-repeat picker (§6.2) ----
function pick_clues_item(array $pool, string $sessionKey, int $tier): array {
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
    $tier = resolve_context_clues_tier($lvl, $grd);
    $pool = $items[$tier] ?? $items[1];
    if (empty($pool)) $pool = $items[1] ?? [];
    $item = pick_clues_item($pool, $sessionKey, $tier);

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'word'     => $item['word'],
        'sentence' => $item['sentence'],
        'choices'  => $choices,
        'correct'  => $item['correct'],
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
    $sentenceHtml = render_context_sentence($cur['sentence']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:520px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:520px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php clues_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;">'
    . $sentenceHtml
    . '</div>'
  , 160); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:520px;margin:10px auto;">
    Based on the context, the word
    <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['word']); ?>'</strong>
    means
    <strong style="color:#CC0066;font-size:15pt;">'<?php echo htmlspecialchars($cur['correct']); ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $sentenceHtml = render_context_sentence($q['sentence']);
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:520px;text-wrap:balance;">
    Based on the context of the sentence, what is the meaning of the red word?
  </div>
  <?php clues_box(
      '<div style="width:100%;font-size:16pt;color:#333;line-height:1.55;">'
    . $sentenceHtml
    . '</div>'
  , 160); ?>  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#800080;max-width:520px;margin:0 auto 15px;">
    Click on your answer.
  </div>
  <?php
    // Uniform box width derived from the longest choice.
    // ~9px per char at 14pt Arial Bold, plus 60px for padding + border.
    // Clamped to [260, 480] so short-answer pools don't look cramped
    // and long-answer pools don't overflow the 520px content column.
    $maxLen = 0;
    foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
    $boxW = max(260, min(480, $maxLen * 9 + 60));
  ?>
  <div style="margin:0 auto;">
    <?php foreach ($q['choices'] as $c): ?>
      <a href="?ansclick=<?php echo urlencode($c); ?>"
         style="display:block;
                width:<?php echo $boxW; ?>px;max-width:100%;
                margin:10px auto;padding:14px 18px;
                border:2px solid #888888;border-radius:8px;background:#fff;
                color:#0000CC;font-family:Arial,sans-serif;
                font-size:14pt;font-weight:600;text-align:center;
                line-height:1.5;text-decoration:none;box-sizing:border-box;">
        <?php echo htmlspecialchars($c); ?>
      </a>
    <?php endforeach; ?>
  </div>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
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