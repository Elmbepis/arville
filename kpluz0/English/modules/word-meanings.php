<?php
// english/modules/word-meanings.php
// STATIC word-definition bank + choice. Bypass QEngine per §D.
// Shows a word; click the best-fitting definition from 4 options.
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Grade-keyed tier assignment (bank has 7 tiers, 0..6):
//     grd 0-2 &#8594; Easy: 0; Hard: rand(1,2)   [Medium=1, Hard=2]
//     grd 3-4 &#8594; Easy: 1; Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 5-6 &#8594; Easy: 2; Hard: rand(3,4)   [Medium=3, Hard=4]
//     grd 7-8 &#8594; Easy: 3; Hard: rand(4,5)   [Medium=4, Hard=5]
//     grd 9+  &#8594; Easy: 4; Hard: rand(5,6)   [Medium=5, Hard=6]
//   Rationale: modern Hard takes the union of legacy Medium + legacy Hard;
//   per-grade range preserves both difficulty tiers as a random pick.
//
// Part-of-speech mix preserved: noun 5/12, adjective 3/12, verb 4/12.
// Distractors drawn from the SAME part-of-speech pool.
//
// Choice layout: 4 definition cards in 1-col (definitions are prose).
// Click the definition directly — no letter buttons needed.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Theme: ex-*-001 &#8594; not in §8 fit list &#8594; paper-69-*.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'word-meanings.php'

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

$moduleTitle = 'Word Meanings';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 5)));

// ------------------------------------------------------------------
// Data bank: 7 tiers × 3 parts-of-speech
// ------------------------------------------------------------------
$meanings = [];

$meanings[0]['noun'] = [
    "duty:a job that must be done","flock:a group of birds","litter:trash on the ground","manner:a way of doing something","meadow:a grassy land","nectar:the sweet liquid found in flowers","ranch:a farm for raising animals","student:a person who goes to school","tool:an object that makes a job easier","value:what something is worth","village:a group of houses","vine:a plant that crawls or climbs",
];
$meanings[0]['adjective'] = [
    "beautiful:very pretty","dull:not bright or not sharp","glum:sad or gloomy","merry:happy or joyful","simple:easy to do","sparkling:shiny","strong:powerful","tame:gentle or harmless","tender:soft or easy to chew","wild:fierce or savage","weary:tired","wise:smart or clever",
];
$meanings[0]['verb'] = [
    "adore:to love very much","assist:to help someone do a job","cease:to stop","cheer:to make glad","create:to make something","desire:to want very much","embrace:to hug","enjoy:to have a good time","escape:to get away from danger","gather:to bring together","glance:to take a quick look","grow:to become larger","guide:to show others what to do","hatch:to break out of an egg","kneel:to get down on knees","leap:to jump a long way","obey:to follow an order","marvel:to be filled with wonder","peel:to remove the skin of","pretend:to make-believe","protect:to keep safe from harm","receive:to take something given","recite:to say from memory","remove:to take away","return:to go back","soar:to fly high","spoil:to ruin","toil:to work hard","tend:to take care of","worry:to think that bad things may happen",
];

$meanings[1]['noun'] = [
    "amount:the total number of things","boon:a gift or a blessing","burrow:a hole in the ground made by an animal","clerk:a person who keeps records","coast:the shore of a sea","court:a place where crimes are judged","crew:a group of people working together","crane:a machine with long arms for lifting things","despair:a feeling of being hopeless","distance:how far one place is to another","engine:a machine that makes something rotate","famine:a widespread lack of food","feat:an amazing deed","feast:a special celebration","harbor:a place where ships dock","haze:smoky or dusty air","heroine:a woman who has done something very brave or helpful","homework:schoolwork that is done at home","horde:a moving crowd","jet:a plane powered by a very fast stream of fluid","luggage:suitcases or boxes used by travelers","market:a public place where goods are sold","member:one who belongs to a group","minute:a unit of time equal to 60 seconds","nugget:a small chunk","ocean:a very large body of saltwater","orchard:an area of land where fruit trees are grown","plain:a flat, open area of land","rhythm:a regular beat in music, poetry, or dance","route:a road or path from one place to another","salary:money paid at regular times to a worker","skill:an ability that you can learn","stadium:a building for sports and big events","stream:a small river","tractor:a large farm machine for pulling or drawing","tutor:someone who teaches privately","vacation:time off from work or school","victim:a person who suffers from a bad event","wit:the ability to say clever things",
];
$meanings[1]['adjective'] = [
    "alarmed:frightened or distressed","amazing:surprising or fantastic","brittle:easily broken","cozy:snug or comfortable","choosy:picky or hard to please","delighted:very happy","eager:full of energy and desire to do something","enormous:very large","exciting:lively and interesting","faithful:loyal","furious:very angry","graceful:having a lovely way of moving","honorable:respectable","jealous:full of envy","modest:humble or not boastful","pale:light in color","patient:able to wait without complaining","peaceful:calm and quiet","perfect:as good as something can be","rugged:having an uneven or rocky surface","scarce:not enough or lacking in amount","slippery:not sticky so as to cause sliding","snug:tight or cozy","sturdy:strong and made to last","swift:fast or quick","thrifty:careful in spending","uneasy:troubled or worried","wrinkled:having many small folds",
];
$meanings[1]['verb'] = [
    "admire:to look at something with pleasure or respect","aim:to point one thing at another","arrange:to put in a neat order","appear:to come into view","arrive:to reach a place","boast:to brag","cause:to make something happen","clutch:to hold tightly","collect:to gather similar items","comfort:to make one feel better","confuse:to be unclear about something","connect:to attach together","creep:to move slowly","delight:to make someone very happy","earn:to gain money by working","fuss:to complain","mumble:to say something in a quiet, unclear way","notice:to become aware of","relax:to become less tense","roam:to move around without a purpose","settle:to make a home in a new place","skid:to slide or slip","sniff:to smell by taking short breaths through the nose","snuggle:to hug and cuddle","sprout:to emerge and start growing","swoop:to fly downward fast","teem:to be full of things","topple:to fall over","train:to teach a person or animal how to do something",
];

$meanings[2]['noun'] = [
    "advice:opinion about how to solve a problem","assistant:a person who helps someone do a job","attention:thoughtful care or kindness","audience:a group of people watching a performance","banter:a light and playful conversation","buttress:something that gives support","campaign:a race between candidates for elective office","canyon:a narrow valley with steep sides","cartwheel:handspring that turns sideways","celebration:a joyous gathering to mark an important event","ceremony:a formal act performed in honor of an occasion","chemical:a substance with certain properties","collection:a group of similar items saved or kept together","commission:a special group of people with an official function","companion:a person who comes along with someone","conceit:excessive pride in oneself","concept:an abstract or general idea","concern:something that interests you because it affects you","constant:a quantity that does not change","corridor:long and narrow hallway or passageway","council:meeting called to find answers","department:a distinct part of a large organization","detective:a person who solves mysteries","device:an instrument invented for a particular purpose","direction:an instruction on how to do something","edge:the outside limit of an area or object","expression:a way of speaking that shows feeling","feature:a trait or a characteristic","habitat:the natural home of a plant or animal","hospitality:friendly treatment of guests or strangers","imagination:the ability to think of things that are not real","information:facts about a person, place, or thing","language:a system of sounds and symbols used to communicate ideas","luxury:anything of value that gives comfort but is not necessary","mischief:behavior that causes problems for others","mural:a large painting on a wall","novel:a long fictional story","nucleus:the central part of a thing","nutrition:nourishment from food","particle:a tiny piece","pride:a feeling of satisfaction about doing something well","profit:money gained by selling something","program:a structured course of activities or training","pulp:a soft and shapeless mass of material","recipe:a set of instructions for cooking or baking","script:the written text of a play","source:a place from which something comes","sphere:a round object like a ball","temperature:the measure of how hot or cold something is",
];
$meanings[2]['adjective'] = [
    "abundant:in large amounts or numbers","ample:more than enough","ancient:very old","anxious:nervous or excited","average:ordinary, not special","comfortable:at ease in mind or body","confident:sure of oneself, certain","courageous:brave","cunning:clever and able to fool or trick others","curious:eager to know or learn something","plentiful:in great quantity","delicate:easily broken","dreadful:very bad","elegant:tasteful, stylish, and beautiful","enjoyable:providing pleasure and satisfaction","familiar:known well or recognized","fertile:able to support much plant growth","firm:stern or commanding","formal:done in a way that suits an important situation","fortunate:lucky","gaunt:very thin especially from disease, hunger, or age","keen:having a sharp mind and strong perception","marine:of or relating to the sea","miserable:very unhappy","satisfied:fulfilled or contented","specific:exact","stubborn:very difficult to convince or change",
];
$meanings[2]['verb'] = [
    "advise:to give an opinion about how to solve a problem","announce:to make something known to many people","appoint:to assign someone to a job","approach:to come close to","buffet:to strike with force","capture:to catch or take control over","cherish:to care about something deeply","collapse:to fall","compete:to take part in a contest","concentrate:to focus attention on something","converse:to talk to one another","depart:to leave","depend:to rely","develop:to make something better","disappoint:to fail to satisfy an expectation","discover:to find out","drift:to float and be pushed along by moving water","dwell:to remain for a time in a certain place","explode:to burst apart","forecast:to predict","glisten:to shine or sparkle","grumble:to complain silently","host:to provide the place or venue for an event","imitate:to copy something or someone","monitor:to watch over something","muse:to think deeply about something","neglect:to fail to care for or attend to","notice:to see for the first time","perform:to take part in a public show","plead:to make an emotional appeal","prefer:to like better than something else","realize:to finally understand or be aware of","retire:to stop working after reaching a certain age","satisfy:to have your needs or desires fulfilled","shimmer:to shine","shun:to stay away from","startle:to surprise someone","summon:to call to come","support:to carry or bear the weight of","survive:to stay alive","vanish:to go out of sight suddenly",
];

$meanings[3]['noun'] = [
    "acquaintance:someone you know","alcove:a small recess opening off a larger room","alibi:an excuse that shows a person did not commit a crime","appointment:arrangement for a meeting at a specific time","arbor:a shelter of branches or vines","armada:a large fleet of vessels","auctioneer:a person who is hired to run a public sale","brambles:prickly plants or bushes","brigade:a group of people organized to do something","brooch:a decorative pin worn by women","bullion:gold or silver in bars or ingots","carrion:the dead and rotting body of an animal","caucus:a meeting to select a candidate or promote a policy","certainty:the state in which something is sure to happen","certificate:a document that states something as a fact","chagrin:a strong feeling of embarrassment","circumstance:the condition in which something happens","clemency:mercy","confetti:tiny pieces of paper thrown during a celebration","contempt:a lack of respect with a feeling of intense dislike","contract:a binding agreement that is enforceable by law","crevice:a long narrow opening","dearth:an insufficient quantity or number","dedication:the will to keep working hard on a task","disability:a condition that makes doing things more difficult","disappointment:the feeling that comes when hopes are not met","disposition:your usual way of acting","edict:a formal or authoritative proclamation","edifice:a large and imposing building","elation:state of being filled with joy or pride","elevation:the height of something above a given place","enigma:a puzzling mystery","epicenter:the point on Earth just above the origin of an earthquake","equipment:the things needed or used for a particular purpose","exhibition:a show for the public","fissure:a long narrow crack or opening on a surface","flotilla:a fleet of small vessels","ford:a place in a river where it is shallow","fray:a noisy fight","frontier:a border between two countries","furrow:a long, deep groove cut into soil","gale:a very strong wind","generation:people who all grow up at about the same time","gentry:the most powerful members of a society","granary:a storehouse for threshed grain or animal feed","horizon:where the sky seems to meet the earth","immigrants:people who go to a country to live in it","injustice:unfairness","interpreter:a person who translates","irrigation:a system for supplying water to crops","instance:an occurrence of something","issue:some situation or event that is thought about","knack:a natural ability or talent","knoll:a small natural hill","lancet:a surgical knife with a pointed double-edged blade","larder:a small room for storing food or wine","labor:work that is undertaken","level:a relative position or rank on a scale","livelihood:the means by which one earns a living","machete:a heavy knife used as a tool for cutting plants","merit:any admirable quality or attribute","malice:a desire to harm or upset people","maxim:a saying that is widely accepted on its own merits","mettle:the courage to carry on","mode:a manner or way of doing, acting, or existing","objective:the goal intended to be attained","onset:the beginning or early stages","outskirts:outlying areas","parable:a short moral story","passage:a section of text","petitioner:a person officially requesting something","pioneer:one of the first people to settle in a region","policy:a plan of action adopted by an individual or social group","possibility:capability to exist, happen, or become true","premise:a statement from which a conclusion can be drawn","prescription:a written instruction for taking medicine","proceeds:money or income obtained from an event or activity","projection:a prediction based on past observations","project:a planned undertaking","prowess:a skill or expertise in a particular field or activity","privilege:a special benefit enjoyed under special conditions","pundit:an expert in a particular subject or scholarly field","quagmire:a difficult situation","rancor:a deep, bitter resentment","recourse:a source of help in a difficult situation","rehearsal:practice for a play or other performance","resource:an available source of wealth or supply","revelry:unrestrained merrymaking","reverie:a state of daydreaming","ruse:a deceptive maneuver to avoid capture","satire:witty language used to convey insults or scorn","scabbard:a sheath for a sword or dagger or bayonet","scheme:an elaborate and systematic plan of action","semblance:a seeming likeness that may not be real","sentinel:a person employed to guard or watch over something","skillet:a heavy iron pan used for cooking and frying","spangle:a small adornment consisting of shiny material","spat:a quarrel about petty points","spectator:a person watching a show, game, or event","splinter:a sharp, thin piece that has been broken off something","sportsmanship:playing fair and showing respect for opponents","stake:a pointed post that is driven into the ground","stint:an unbroken period of time during which you do something","streak:a quick flash of movement","symmetry:balance among the parts of something","territory:the area under the jurisdiction of a sovereign state","theory:a formal explanation of why something happens","tragedy:a very sad or terrible event","transformation:a great change in form or appearance","tundra:a type of biome where the ground is frozen all year","universe:everything that exists, including all matter and energy","vassal:a person who serves a feudal lord","virtuoso:someone who is dazzlingly skilled in any field",
];
$meanings[3]['adjective'] = [
    "acceptable:capable of meeting approval or being accepted","accidental:by mistake, without meaning to","appetizing:appearing to be good to eat","apt:exactly suitable or appropriate","attentive:in a way that shows complete concentration","august:profoundly respected and honored","bland:uninteresting and lacking stimulating characteristics","brisk:cool and stimulating, as weather can be","callous:emotionally hardened","candid:characterized by openness and sincerity of expression","circular:shaped like a circle","demure:quiet, modest, or reserved","dense:closely compacted in substance","docile:easily handled or managed","dogged:stubbornly unyielding","dutiful:willingly obedient out of a sense of duty and respect","earnest:showing a firm belief or deep sincerity","elated:filled with joy or pride","endangered:in danger of dying out","enthusiastic:eager, in a way that shows strong approval","equivalent:equal in some way","fascinated:amazed and intrigued","feral:wild or savage","fetid:having a foul odor","fitful:occurring in spells and often abruptly","flammable:easily set on fire","florid:flowery or ornate","fluorescent:bright and glowing","generous:liberal in giving or sharing","glib:talking fluently but insincere and shallow","grisly:gruesome or causing horror or dread","hapless:unlucky","harrowing:extremely painful","hysterical:having uncontrolled emotions","illuminated:provided with artificial light","inclined:at an angle to the horizontal or vertical position","indifferent:not caring, unconcerned","insignificant:lacking in importance, meaning, size, or worth","fraught:filled with specified elements","lofty:of majestic or imposing height","logical:reasonable","occasional:only once in a while","outspoken:bold or honest in speech","persistent:refusing to give up","pious:having or showing reverence for a deity","pomp:cheap, pretentious, or vain display","practical:useful or sensible","profitable:bringing advantage or monetary gain","repentant:regretful or sorry for your actions","rife:abundant","roguish:treacherous or dishonest","softhearted:gentle and kind","surly:bad-tempered and unfriendly","sympathetic:showing concern for someone in a bad situation","tacit:expressed without words","tremendous:very large or great","triumphant:having won a battle or victorious","urgent:in need of immediate action or attention","utter:complete and absolute","wry:humorously sarcastic or mocking",
];
$meanings[3]['verb'] = [
    "affect:to have an effect upon","apologize:to say something that means you are sorry","assent:to agree or approve","beckon:to attract or lure by tempting with something desirable","belie:to show something to be false","bellow:to roar loudly","bicker:to disagree over unimportant things","chide:to scold angrily","chortle:to laugh or chuckle loudly","cleave:to separate or cut in half with a sharp tool","convince:to make someone agree or believe","cower:to crouch or curl up","ebb:to fall away or decline","eavesdrop:to listen secretly to a conversation","encircle:to form a circle around something","enrich:to make better by adding something","fascinate:to amaze and intrigue","grant:to allow to have","grapple:to seize in a grip and take hold of","gripe:to complain","grovel:to show submission or fear","harry:to annoy continually or chronically","heed:to pay close attention to","hew:to make or shape as with an axe","hurtle:to cause to move very quickly or violently","illuminate:to provide light","impose:to put an unwanted burden on","inhale:to breathe in","investigate:to look thoroughly into something","kindle:to catch fire","loathe:to dislike immensely","modify:to change","mutter:to complain with words that are hard to hear","obligate:to bind legally or morally","overwhelm:to overpower","parry:to ward off with a countermove","persevere:to continue doing something in spite of difficulties","persist:to continue to exist","plot:to plan in secret to do something","protrude:to stick out","pucker:to gather something into small wrinkles or folds","quail:to lose courage in difficulty or danger","quip:to make jokes or sarcastic remarks","rave:to praise enthusiastically","recognize:to know who someone is or what something is","resound:to echo or fill a place with sound","retort:to answer sharply","scrounge:to look for scraps of food or abandoned materials","smuggle:to take out of a place illegally","strengthen:to make someone or something stronger","stump:to cause to be perplexed or confounded","surrender:to give up","venture:to proceed somewhere despite possible dangers","whittle:to cut small bits or pare shavings from","wreak:to cause something to happen in an uncontrolled way",
];

$meanings[4]['noun'] = [
    "achievement:something accomplished by effort, courage, or skill","ascendancy:a state or position of power or strength","attribute:an inherent feature or characteristic","convention:a large formal assembly","cupidity:greed or strong desire","disposition:the usual mood of a person","distinction:a difference between two similar things","foreboding:a feeling of evil to come","idiosyncrasy:a peculiar habit that is distinct to an individual","institute:an organizational body created for a certain purpose","largess:generous giving of lavish gifts","maelstrom:a destructive whirlpool which rapidly sucks in objects","manifestation:a clear appearance","multitude:a large indefinite number","nadir:the lowest point of something","neophyte:someone who is young or inexperienced","panacea:a remedy for all ills or difficulties","paragon:a model of excellence or perfection","pariah:an outcast","parity:functional equality","partiality:a predisposition to like something","portent:an omen","propriety:correct or appropriate behavior","rationalism:the view that actions should be based on reason","rebuke:an act or expression of criticism and censure","renegade:someone who rebels and becomes an outlaw","rhetoric:the art of persuasive speaking or writing","scrutiny:critical observation or examination","succor:assistance in time of difficulty","stratum:a class of people having the same social status","zenith:the highest or culminating point",
];
$meanings[4]['adjective'] = [
    "adverse:contrary to interests or welfare","affable:easy and pleasant to speak to","amicable:characterized by friendliness and goodwill","apparent:visible, obvious, or easy to understand","blatant:without any attempt at concealment","cavalier:having no concern for something important","conjugal:relating to the marriage of two people","contrite:penitent or eager to be forgiven","craven:extremely cowardly","credible:appearing to merit belief or acceptance","enduring:unceasing and lasting","fervent:characterized by intense emotion","innate:inborn or natural","intimate:marked by close acquaintance or familiarity","jubilant:extremely joyful or happy","mundane:common, unexciting, or ordinary","obtuse:lacking quickness of sensibility or intellect","ominous:suggesting that something unpleasant is about to happen","opulent:lavishly rich and luxurious","palatable:acceptable to the taste or mind","perpetual:continuing forever or indefinitely","replete:full or abundant","sublime:of high moral or intellectual value","substantial:of considerable importance, size, or value","tenable:capable of being maintained or defended","uncouth:lacking refinement, cultivation, or taste","wanton:reckless or without regard for what is right","winsome:charming or pleasing","wistful:longing for something with regret or sadness",
];
$meanings[4]['verb'] = [
    "actuate:to put into motion or action","afflict:to cause pain or suffering in","aggrieve:to give pain or trouble to","allege:to assert that someone has done something wrong","appease:to gain the good will of","approach:to move towards","assert:to state a fact or belief confidently and forcefully","cajole:to urge or persuade by coaxing or flattery","compel:to force somebody to do something","compromise:to reach an agreement after each side gives up something","conduct:to direct the course of","constitute:to compose or represent","contend:to compete for something","decompose:to decay","dissolve:to make something solid become part of a liquid","decry:to criticize openly","deduce:to arrive at a conclusion by reasoning","defile:to make unclean or impure","depose:to force someone to leave an office","derive:to form or develop from something else","dispatch:to send away to a destination or for a purpose","elude:to escape","engage:to participate or become involved in","establish:to set up firmly and permanently","exalt:to praise, glorify, or honor","exploit:to selfishly take advantage of someone","extort:to obtain something by force or threat","fathom:to come to understand","flourish:to grow vigorously","frustrate:to prevent from progressing or succeeding","generate:to produce or bring into existence","humiliate:to cause someone to feel shame","impel:to cause to move forward with force","inculcate:to teach or instill an idea by repetition","infest:to occupy a place or organism in large numbers","insist:to demand something firmly and persistently","intend:to have in mind as a purpose","intrigue:to arouse the curiosity or interest of","justify:to show or prove to be right or reasonable","meander:to wander aimlessly or to follow a winding course","oppress:to keep down by unjust use of authority","pacify:to calm the anger or agitation of","pillage:to rob a place using violence","rebuke:to scold or criticize","restrain:to hold back or keep under control","scrutinize:to inspect or examine thoroughly","subside:to wear off or die down","surmise:to infer with little evidence","vacate:to move out of","vex:to torment or annoy","yield:to give way to",
];

$meanings[5]['noun'] = [
    "absorption:uptake of substances by a tissue","abstinence:the act of restraining oneself from indulging in something","advocate:a person who publicly supports a particular policy or idea","avarice:extreme greed for material wealth","aversion:a feeling of intense dislike","avocation:an auxiliary activity","credence:the mental attitude that something is believable and true","decadence:the state of moral decline or decay","decorum:propriety in manners and conduct","deference:a courteous expression of esteem or regard","diffidence:lack of self-confidence","encroachment:entry into a property without right or permission","exploitation:an act that victimizes or unfairly treats someone","fortitude:mental strength for facing challenges","impetus:a force that moves something along","incongruity:the quality of being unsuitable or in disagreement","indication:something that serves to suggest or give a sign of","latitude:freedom from normal restraints in conduct","levity:a manner lacking seriousness","modicum:a small amount of something","platitude:a trite or obvious remark","plethora:an abundance or excess","propensity:an inclination to do something","remission:an abatement or lessening in intensity or degree","vagary:an odd and unexpected change in something",
];
$meanings[5]['adjective'] = [
    "cogent:intellectually convincing","comprehensive:broad in scope","conscientious:characterized by extreme care and great effort","conspicuous:obvious to the eye or mind","contrived:artificially created rather than arising naturally","diffident:lacking self-confidence","disconsolate:sad beyond comforting","discreet:marked by prudence or modesty and wise self-restraint","diversified:having variety of character, form, or components","elaborate:marked by complexity and richness of detail","exorbitant:greatly exceeding the bounds of reason or moderation","extant:still existing","facile:arrived at without due care or effort","fatuous:silly or devoid of intelligence","fecund:fruitful or fertile","hackneyed:lacking significance because of overuse","ignominious:deserving or bringing disgrace or shame","immutable:unchanging or unable to change over time","importunate:persistent or insistent to the point of annoyance","incorrigible:impervious to correction by punishment","infallible:incapable of failure or error","inimitable:matchless and impossible to copy","inscrutable:of an obscure nature","interminable:tiresomely long or seemingly endless","intrepid:invulnerable to fear or intimidation","irresolute:hesitant or uncertain in decision or action","languid:sluggish or lacking liveliness","limpid:clear or transparent","malevolent:wishing to do evil to others","obdurate:stubbornly persistent in wrongdoing","ostensible:outwardly appearing to be true but not necessarily so","pedantic:excessively concerned with rules and formality","pertinent:relevant or applicable to a particular matter","perturbable:easily agitated, excited, or upset","petulant:easily irritated or annoyed","primeval:original or ancient","querulous:habitually complaining","reticent:temperamentally disinclined to talk","salient:strikingly prominent or important","scrupulous:having a sense of right and wrong","stolid:unemotional or expressing little sensibility","surreptitious:marked by quiet and caution and secrecy","tenacious:stubbornly unyielding","transient:passing through briefly",
];
$meanings[5]['verb'] = [
    "accede:to yield to the wish or opinion of someone else","admonish:to caution, advise, or counsel against something","append:to add to the very end","arbitrate:to settle a dispute between two parties","ascertain:to find out definitely or to make sure of","assail:to attack someone physically or emotionally","assent:to agree or express agreement","beguile:to influence by slyness","beleaguer:to annoy persistently","bequeath:to leave or give by will after death","beseech:to ask for or request earnestly","besiege:to harass, as with questions or requests","blanch:to whiten or turn pale","bluster:to act in an arrogant or conceited manner","buttress:to support or hold up","cajole:to urge or coax","cede:to relinquish possession or control over","chastise:to censure severely","cohere:to come together or be united to form a whole","commiserate:to feel or express sympathy or compassion","conjure:to summon into action or bring into existence by magic","consecrate:to render holy by means of religious rites","construe:to make sense of or assign a meaning to","contrive:to make or work out a plan for","convalesce:to get over an illness or shock","deprave:to corrupt morally or by intemperance or sensuality","deride:to laugh at mockingly or scorn","devolve:to grow worse","disconcert:to cause to lose composure","dissemble:to conceal your true feelings or motives","distend:to swell from internal pressure","dither:to be indecisive","encumber:to hold back","enervate:to weaken mentally or morally","enrapture:to hold spellbound","entreat:to ask for or request earnestly","eschew:to avoid or stay away from something","evince:to show or reveal","explicate:to elaborate, as of theories and hypotheses","indemnify:to make amends or pay compensation for","insinuate:to hint at something bad in an indirect way","mortify:to cause to feel shame","obtrude:to thrust oneself in as if by force","palpitate:to beat rapidly","permeate:to spread or diffuse through","pervade:to spread or diffuse through","purport:to claim or pretend to do or be something","ramify:to have or develop complicating consequences","ratify:to officially approve or give consent to","sanction:to give authority or permission to","stupefy:to astonish or make insensible","venerate:to regard with respect or to honor",
];

$meanings[6]['noun'] = [
    "acrimony:bitterness or discord","alacrity:liveliness and eagerness","anathema:something or someone that one vehemently dislikes","antipathy:a strong dislike or repugnance","apostate:one who is not faithful to a religion or a cause","approbation:praise","aspersion:a curse or an expression of ill will","cacophony:tremendous noise or disharmonious sound","calumny:the making of false and slanderous statements","conundrum:a confusing and difficult problem, puzzle, or question","credulity:readiness to believe","declivity:a downward slope or bend","depredation:a destructive or ravaging action","effrontery:impudence or insolence","grandiloquence:lofty or pompous language","iconoclast:one who attacks common beliefs or institutions","iniquity:wickedness or sin","invective:an angry verbal attack","legerdemain:deception or slight-of-hand","malediction:a curse","munificence:generosity in giving","parsimony:frugality or stinginess","petulance:rudeness or irritability","platitude:an uninspired remark or cliche","proclivity:a strong inclination toward something","propensity:an inclination or preference","pulchritude:physical beauty or comeliness","rectitude:uprightness or extreme morality","sagacity:shrewdness or soundness of perspective","serendipity:finding good things without looking for them","surfeit:an oversupply or excessive amount","sycophant:one who flatters for self-gain","temerity:audacity or recklessness","turpitude:depravity or moral corruption","umbrage:resentment or offense","veracity:truthfulness or accuracy","vicissitude:a change in fortune or circumstance",
];
$meanings[6]['adjective'] = [
    "acerbic:bitter in tone or taste","ascetic:practicing severe self-discipline and abstention from indulgence","assiduous:marked by care and persistent effort","audacious:disposed to venture or take risks","brusque:short, abrupt, or dismissive","capricious:determined by chance, impulse, or whim","clandestine:conducted with or marked by hidden aims or methods","concomitant:accompanying in a subordinate fashion","cursory:brief to the point of being superficial","deleterious:harmful","desiccated:dried up or dehydrated","diaphanous:light, airy, or transparent","diffident:shy, quiet, or modest","discursive:rambling, lacking order","ebullient:extremely lively or enthusiastic","effulgent:radiant or splendorous","egregious:extremely bad","ephemeral:short-lived, fleeting, or evanescent","evanescent:fleeting, momentary, or ephemeral","execrable:loathsome or detestable","exigent:urgent or critical","fallacious:incorrect or misleading","fastidious:having high and often unattainable standards","fractious:troublesome or irritable","garrulous:talkative or wordy","gregarious:sociable or drawn to the company of others","ignominious:humiliating or disgraceful","impassive:not susceptible to suffering","imperious:commanding or domineering","impertinent:rude or insolent","impervious:impenetrable or incapable of being affected","impetuous:rash or hastily done","implacable:incapable of being appeased or mitigated","impudent:casually rude, insolent, or impertinent","inchoate:unformed or formless","incontrovertible:indisputable","indefatigable:incapable of defeat, failure, or decay","ineffable:incapable of being expressed through words","inexorable:incapable of being persuaded or placated","ingenuous:innocent, unsuspecting, and candid","inimical:hostile or tending to obstruct or harm","insidious:appealing but imperceptibly harmful","intransigent:refusing to compromise, often on an extreme opinion","inveterate:stubbornly established by habit","laconic:terse in speech or writing","licentious:displaying a lack of moral or legal restraints","maudlin:weakly sentimental","mendacious:having a lying, false character","mercurial:subject to sudden or unpredictable changes of mood","multifarious:having great diversity or variety","nefarious:heinously villainous","obdurate:unyielding to persuasion or moral influences","obsequious:excessively compliant or submissive","obstreperous:noisy or unruly","odious:instilling hatred or intense displeasure","officious:assertive of authority in an annoyingly domineering way","ostensible:appearing as such","pejorative:derogatory or uncomplimentary","pellucid:easily intelligible or clear","penurious:miserly or stingy","perfidious:disloyal or unfaithful","perfunctory:showing little interest or enthusiasm","pernicious:extremely destructive or harmful","pertinacious:stubbornly persistent","precocious:advanced or developing ahead of time","prescient:to have foreknowledge of events","propitious:favorable","prosaic:plain or lacking liveliness","protean:able to change shape","puerile:juvenile or immature","pugnacious:quarrelsome or combative","punctilious:eager to follow rules or conventions","perspicacious:having keen mental perception and understanding","querulous:whiny or complaining","quixotic:idealistic or impractical","recalcitrant:defiant or unapologetic","reprobate:evil or unprincipled","sacrosanct:holy or something that should not be criticized","salient:significant or conspicuous","sanctimonious:giving a hypocritical appearance of piety","sanguine:optimistic or cheery","scurrilous:vulgar or coarse","solicitous:concerned or attentive","solipsistic:believing that oneself is all that exists","somnolent:sleepy or drowsy","spurious:false but designed to seem plausible","surreptitious:stealthy","taciturn:not inclined to talk","tantamount:equivalent in value or significance","tenuous:having little substance or strength","timorous:timid or fearful","torpid:lethargic or dormant","tractable:easily controlled","trenchant:effective, articulate, or clear-cut","truculent:ready to fight","turgid:excessively embellished in style or language","ubiquitous:existing everywhere or widespread","unctuous:smooth or greasy in texture, appearance, or manner","vacuous:lacking content or ideas","vapid:dull or lacking liveliness","variegated:diversified or distinctly marked","verdant:green in tint or color","vicarious:experiencing through another","vitriolic:having a caustic quality","wizened:dry, shrunken, and wrinkled",
];
$meanings[6]['verb'] = [
    "abjure:to reject or renounce something solemnly","abrogate:to abolish, usually by authority","accentuate:to stress or single out as important","acquiesce:to agree or express agreement","adjure:to urge or command someone earnestly","adumbrate:to sketch out in a vague way","arrogate:to take without justification","blandish:to coax by using flattery","burnish:to polish or shine","capitulate:to surrender under agreed conditions","desecrate:to violate the sacredness of a thing or place","dissemble:to conceal or fake","dissimulate:to hide your feelings from other people","enervate:to weaken or exhaust","eschew:to shun or avoid","exculpate:to free from guilt or blame","execrate:to curse or to declare to be evil","expiate:to make amends or reparations for","extenuate:to lessen the seriousness or extent of","expunge:to obliterate or eradicate","impinge:to impact or affect","ingratiate:to gain favor with somebody by deliberate efforts","inure:to accustom someone to something undesirable","juxtapose:to place two things next to each other for contrast","obfuscate:to render incomprehensible","obviate:to eliminate the need for something","palliate:to lessen the seriousness or extent of","perpetrate:to commit or carry out an action","promulgate:to proclaim or make known","propitiate:to make peace with","proscribe:to forbid or prohibit by law","repudiate:to reject or refuse to accept","rescind:to revoke, cancel, or repeal","subjugate:to make subservient","transmute:to change or alter in form","undulate:to move in waves","upbraid:to criticize or scold severely","usurp:to seize a position of power illegally","vilify:to defame or slander",
];

// ------------------------------------------------------------------
// Level &#8594; tier resolution (§10): Easy = legacy Easy, Hard = union of Med+Hard
// ------------------------------------------------------------------
$grdKey = ($grd <= 2) ? 0 : (($grd <= 4) ? 1 : (($grd <= 6) ? 2 : (($grd <= 8) ? 3 : 4)));
$configs = [
    0 => ['Easy' => 0, 'Hard' => [1, 2]],
    1 => ['Easy' => 1, 'Hard' => [2, 3]],
    2 => ['Easy' => 2, 'Hard' => [3, 4]],
    3 => ['Easy' => 3, 'Hard' => [4, 5]],
    4 => ['Easy' => 4, 'Hard' => [5, 6]],
];
$cfg = $configs[$grdKey][$lvl];
$arrnum = is_array($cfg) ? rand($cfg[0], $cfg[1]) : $cfg;

// ------------------------------------------------------------------
// Data helpers
// ------------------------------------------------------------------
function wm_parse_entry($entry) {
    $p = strpos($entry, ':');
    if ($p === false) return null;
    $w = trim(substr($entry, 0, $p));
    $d = trim(substr($entry, $p + 1));
    if ($w === '' || $d === '') return null;
    return ['word' => $w, 'def' => $d];
}

// ------------------------------------------------------------------
// Score handler (answer is a definition string)
// ------------------------------------------------------------------
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ------------------------------------------------------------------
// Theme (hoisted for reuse)
// ------------------------------------------------------------------
$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];

// ------------------------------------------------------------------
// Generate
// ------------------------------------------------------------------
if ($result === null || isset($_POST['Submit2'])) {
    // Legacy part-of-speech weights: noun 5/12, adjective 3/12, verb 4/12
    $r = rand(1, 12);
    if ($r <= 5)      $pos = 'noun';
    elseif ($r <= 8)  $pos = 'adjective';
    else              $pos = 'verb';

    $pool = $meanings[$arrnum][$pos];

    // Parse all entries once
    $parsed = [];
    foreach ($pool as $entry) {
        $p = wm_parse_entry($entry);
        if ($p !== null) $parsed[] = $p;
    }

    if (count($parsed) < 4) {
        render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
        echo '<p style="text-align:center; font-size:16pt; margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $usedKey = 'used_' . $arrnum . '_' . $pos;
    $used = $_SESSION[$sessionKey][$usedKey] ?? [];

    $safety = 0;
    do {
        $correctIdx = rand(0, count($parsed) - 1);
        $safety++;
    } while (in_array($correctIdx, $used, true) && $safety < 60);
    $used[] = $correctIdx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $correct = $parsed[$correctIdx];

    // Pick 3 distractors from OTHER entries in the same pool
    $otherIdxs = [];
    for ($i = 0; $i < count($parsed); $i++) {
        if ($i !== $correctIdx) $otherIdxs[] = $i;
    }
    shuffle($otherIdxs);
    $distractors = [];
    foreach (array_slice($otherIdxs, 0, 3) as $i) {
        $distractors[] = $parsed[$i]['def'];
    }

    $choices = array_merge([$correct['def']], $distractors);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'word'    => $correct['word'],
        'answer'  => $correct['def'],
        'choices' => $choices,
        'pos'     => $pos,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ------------------------------------------------------------------
// Render
// ------------------------------------------------------------------
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .word-card {
    display: inline-block;
    padding: 18px 40px;
    background: linear-gradient(135deg, #fafaff 0%, #f0f0ff 100%);
    border: 3px solid #d0d0e8;
    border-radius: 18px;
    font-family: 'Arial', 'Segoe UI', sans-serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: #0000BB;
    margin: 20px auto;
    box-shadow: 0 3px 10px rgba(0,0,0,0.06);
  }
  .meaning-prompt {
    font-family: 'Arial', Arial, sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    color: #880088;
    margin: 10px auto 20px;
    text-align: center;
  }
  .meaning-choice {
    display: flex;
    align-items: flex-start;
    max-width: 400px;
    margin: 8px auto;
    padding: 14px 22px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: 'Arial', 'Segoe UI', sans-serif;
    font-size: 1.05rem;
    font-weight: 500;
    color: #444;
    text-decoration: none;
    text-align: left;
    line-height: 1.5;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .meaning-choice:hover { background: #eef; border-color: #8080ff; }
  .meaning-choice .label {
    display: inline-block;
    min-width: 28px;
    font-weight: 700;
    color: #CC0066;
    margin-right: 10px;
    flex-shrink: 0;
  }
  .meaning-feedback {
    max-width: 560px;
    margin: 20px auto;
    font-family: 'Arial', 'Segoe UI', sans-serif;
    font-size: 1.1rem;
    line-height: 1.65;
    text-align: center;
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <div class="meaning-feedback">
        <p style="color:#666; margin-top:20px;">Here's your answer: <strong style="color:#0000CC; font-size:1.15rem;">"<?php echo htmlspecialchars($result['clicked']); ?>"</strong></p>
        <p style="font-size:1.1rem; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
        <p style="color:#800080; margin-top:20px;">The meaning of the word <strong style="color:#0000BB;">'<?php echo htmlspecialchars($cur['word']); ?>'</strong> is:</p>
        <p style="color:#444; font-size:1.05rem;">"<?php echo htmlspecialchars($cur['answer']); ?>."</p>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="word-card"><?php echo htmlspecialchars($q['word']); ?></div>

    <div class="meaning-prompt">Which of the following is the best<br>meaning for the word above?</div>

    <?php
        $labels = ['A', 'B', 'C', 'D'];
        foreach ($q['choices'] as $i => $c):
    ?>
        <a href="?ansclick=<?php echo urlencode($c); ?>" class="meaning-choice">
            <span class="label"><?php echo $labels[$i]; ?>.</span>
            <span><?php echo htmlspecialchars($c); ?></span>
        </a>
    <?php endforeach; ?>

    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">Select difficulty level for next question:</font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo $l; ?></b>
                    </font></font>
                </td>
            <?php endforeach; ?>
        </tr></table>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();