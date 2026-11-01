<?php
// english/modules/prefix-suffix.php
// Prefixes and Suffixes — text-input: the root word is pre-filled in an
// editable box; the student types just the prefix (before the root) or
// the suffix (after the root) to build the target word.
// 5 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// Easy: grd<=3&#8594;1, grd 4-6&#8594;2, grd>=7&#8594;3   (legacy Easy)
// Hard: grd<=3&#8594;3, grd 4-6&#8594;4, grd>=7&#8594;5   (legacy Hard; legacy Medium folded in)

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
$moduleTitle = 'Prefixes and Suffixes';
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
function resolve_prefix_suffix_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 3) return 1;
        if ($grd <= 6) return 2;
        return 3;
    }
    if ($grd <= 3) return 3;
    if ($grd <= 6) return 4;
    return 5;
}

// ---- Raw data (§5) — verbatim from legacy, typos fixed ----
// Format: 'affix+root=hint'  (prefix items)
//         'root+affix=hint'  (suffix items — root may end in 'e', '%', 'te', 'de', 'se', 'e%')
$rawByTier = [
    1 => [
        'prefix' => [
            'dis+like=to not like',
            'dis+obey=to not obey',
            'un+true=not true',
            'un+happy=not happy',
            'un+lucky=not lucky',
            'un+fair=not fair',
            'un+kind=not kind',
            'un+even=not even',
        ],
        'suffix' => [
            'build+er=a person who builds',
            'help+er=a person who helps',
            'lead+er=a person who leads',
            'lend+er=a person who lends',
            'read+er=a person who reads',
            'teach+er=a person who teaches',
            'catch+er=one that catches something',
            'paint+er=one who paints',
            'speak+er=one who speaks',
            'wash+er=one who washes something',
            'joy+ful=very happy',
            'care+ful=does something with care',
            'care+less=not careful',
            'help+less=weak or without power',
        ],
    ],
    2 => [
        'prefix' => [
            'dis+like=to not like',
            'dis+honest=not honest',
            'dis+obey=to not obey',
            'im+polite=not polite',
            'in+complete=not complete',
            'in+correct=wrong',
            'mis+lead=to cause someone to have a wrong idea',
            'mis+place=to put in a wrong place',
            'mis+read=to read wrongly',
            'mis+spell=to incorrectly spell a word',
            're+arrange=to arrange again',
            're+count=to count again',
            're+enter=to enter again',
            're+fill=to fill again',
            're+grow=to grow again',
            're+heat=to heat again',
            're+load=to load again',
            're+move=to take away or take off',
            're+name=to change something\'s name',
            're+paint=to paint again',
            're+pay=to pay back',
            're+play=to play again',
            're+read=to read again',
            're+sell=to sell again',
            're+think=to think about again',
            're+write=to write again',
            'un+able=not able to do something',
            'un+afraid=not afraid',
            'un+broken=not broken',
            'un+common=not common',
            'un+cooked=not cooked',
            'un+equal=not equal',
            'un+familiar=not familiar',
            'un+fasten=to remove from being fastened',
            'un+known=not known or familiar',
            'un+like=not similar to',
            'un+lock=to undo a lock using a key',
            'un+necessary=not essential',
            'un+pack=to remove from a package',
            'un+selfish=not selfish',
            'un+tied=not fastened or knotted',
            'un+usual=not usual',
            'un+wrap=to remove the wrapper of something',
            'un+healthy=not healthy',
        ],
        'suffix' => [
            'avoid+able=can be avoided or prevented',
            'break+able=possible to break',
            'enjoy+able=giving delight or pleasure',
            'read+able=can be read or deciphered',
            'teach+able=can learn by being taught',
            'wash+able=can be washed without damage',
            'wear+able=can be worn',
            'work+able=can be worked or manipulated',
            'cure+able=can be cured',
            'desire+able=wanted or wished for',
            'excuse+able=can be justified or forgiven',
            'black+en=to make black',
            'bright+en=to make brighter',
            'cheap+en=to make cheaper',
            'damp+en=to make slightly wet',
            'dark+en=to make darker',
            'fresh+en=to make fresher',
            'gold+en=colored like gold',
            'hard+en=to make harder',
            'sharp+en=to make sharper',
            'short+en=to make shorter',
            'sweet+en=to make sweeter',
            'thick+en=to make thicker',
            'wood+en=made of wood',
            'loose+en=to make less tight',
            'ripe+en=to make ripe',
            'white+en=to make whiter',
            'wide+en=to make wider',
            'fat%+en=to make fatter',
            'flat%+en=to make flatter',
            'glad%+en=to make glad',
            'sad%+en=to make unhappy',
            'dry+er=a machine used for drying',
            'follow+er=one who follows',
            'golf+er=one who plays golf',
            'point+er=something that shows direction',
            'ranch+er=one who owns or runs a ranch',
            'dance+er=one who dances',
            'drive+er=one who drives something',
            'gamble+er=one who gambles',
            'invade+er=one who invades',
            'juggle+er=one who juggles things',
            'manage+er=one who manages',
            'rule+er=one who rules',
            'scrape+er=a tool or device used for scraping',
            'settle+er=one who settles in an area',
            'rob%+er=one who robs',
            'shop%+er=one who shops',
            'trap%+er=one who traps wild animals',
            'care+ful=full of care',
            'cheer+ful=happy',
            'color+ful=full of color',
            'fear+ful=full of fear',
            'forget+ful=forgets things easily',
            'help+ful=ready to give help',
            'hope+ful=full of hope',
            'joy+ful=full of joy',
            'pain+ful=full of pain',
            'peace+ful=free from disturbance',
            'play+ful=fond of games',
            'act+ion=a thing done',
            'inspect+ion=careful examination',
            'invent+ion=the action of inventing something',
            'protect+ion=the action of protecting someone or something',
            'decorate+ion=the art of decorating',
            'locate+ion=a particular place or position',
            'age+less=never appearing to grow old',
            'care+less=not giving sufficient attention',
            'fear+less=lacking fear',
            'harm+less=not able or likely to cause harm',
            'home+less=without a home',
            'hope+less=feeling or causing despair about something',
            'job+less=unemployed',
            'pain+less=not causing any physical pain',
            'worth+less=having no real value or use',
            'clever+ness=the quality of being clever',
            'dark+ness=the partial or total absence of light',
            'fair+ness=the quality of being fair',
            'foolish+ness=lack of good sense or judgment',
            'good+ness=the quality of being good',
            'great+ness=the quality of being great',
            'kind+ness=the quality of being friendly, generous, and considerate',
            'like+ness=the fact or quality of being alike',
            'loud+ness=the quality of being loud',
            'mean+ness=the quality of being mean',
            'nervous+ness=the quality or state of being nervous',
            'polite+ness=the practical application of good manners',
            'sad+ness=the condition of being sad',
            'sick+ness=the state of being ill',
            'smooth+ness=the quality or state of being smooth',
            'sweet+ness=the quality of being sweet',
            'swift+ness=the quality of being quick',
            'thick+ness=the state or quality of being thick',
        ],
    ],
    3 => [
        'prefix' => [
            'be+little=to make someone seem unimportant',
            'dis+honest=intending to cheat or mislead',
            'dis+order=a disturbance or ailment',
            'im+polite=not having polished manners',
            'in+complete=not having all the necessary parts',
            'in+correct=not factual',
            'in+credible=impossible or not easy to believe',
            'in+convenient=not easy to use or go to',
            'mis+lead=to cause someone to have a wrong idea',
            'mis+place=to lose temporarily',
            'mis+read=to read or interpret incorrectly',
            'mis+spell=to incorrectly spell a word',
            'mis+use=to use incorrectly or for a wrong purpose',
            'pre+school=relating to the early years of childhood',
            're+appear=to return after a period of time',
            're+arm=to provide with new weapons',
            're+fresh=to provide new vigor',
            're+group=to form into a new group',
            're+number=to change the number assigned to something',
            're+pack=to pack in a different manner',
            're+place=to take the place of',
            're+shape=to give something a new shape',
            're+trace=to go back over something',
            're+word=to state or express in different words',
            'un+able=lacking the skill or means to do something',
            'un+broken=not interrupted',
            'un+certain=not known or definite',
            'un+common=unusual or abnormal',
            'un+cover=to remove a cover or covering from',
            'un+decided=not having made a decision',
            'un+expected=not regarded as likely to happen',
            'un+familiar=not acquainted with',
            'un+fasten=to remove from being fastened',
            'un+necessary=not essential',
            'un+pack=to remove from a package',
            'un+schooled=not educated',
            'un+selfish=not selfish',
            'un+tangle=to free from a twisted state',
            'un+usual=not typical',
            'un+wrap=to remove the wrapper of something',
        ],
        'suffix' => [
            'contest+ant=a person who takes part in a contest',
            'approach+able=friendly and easy to talk to',
            'avoid+able=can be avoided or prevented',
            'break+able=possible to break',
            'comfort+able=providing physical ease and relaxation',
            'enjoy+able=giving delight or pleasure',
            'laugh+able=easily made fun of',
            'read+able=can be read or deciphered',
            'respect+able=regarded by society to be good, proper, or correct',
            'teach+able=can learn by being taught',
            'understand+able=can be understood',
            'wash+able=can be washed without shrinkage or other damage',
            'wear+able=can be worn',
            'work+able=can be worked or manipulated',
            'admire+able=held in great respect',
            'believe+able=can be believed',
            'cure+able=can be cured',
            'desire+able=wanted or wished for',
            'excite+able=easily upset or inspired',
            'excuse+able=can be justified or forgiven',
            'imagine+able=possible to be thought of or believed',
            'observe+able=can be noticed or perceived',
            'manage%+able=can be managed',
            'notice%+able=easily seen or noticed',
            'strength+en=to make stronger',
            'tough+en=to make tougher',
            'loose+en=to make less tight',
            'flat%+en=to make flatter',
            'command+er=one who gives commands',
            'defend+er=one who defends',
            'design+er=one who designs',
            'dry+er=a machine used for drying something',
            'perform+er=one who performs',
            'point+er=something that moves to show direction',
            'ranch+er=one who owns or runs a ranch',
            'sharpen+er=a tool for making something sharper',
            'explore+er=one who explores',
            'invade+er=one who invades',
            'juggle+er=one who juggles things',
            'manage+er=one who manages',
            'scrub%+er=one who cleans something',
            'respect+ful=showing respect',
            'rest+ful=having a quiet and soothing quality',
            'success+ful=having achieved something',
            'thank+ful=expressing gratitude and relief',
            'use+ful=can be used for a practical purpose or in several ways',
            'waste+ful=using something of value carelessly',
            'wonder+ful=extremely good',
            'youth+ful=young or seeming young',
            'attract+ion=ability to draw attention',
            'collect+ion=the action or process of collecting someone or something',
            'correct+ion=the action of correcting something',
            'direct+ion=a course along which someone or something moves',
            'elect+ion=the act or an instance of electing',
            'inspect+ion=careful examination',
            'invent+ion=the action of inventing something',
            'object+ion=the action of challenging or disagreeing with something',
            'protect+ion=the action of protecting someone or something',
            'select+ion=the action of carefully choosing someone or something',
            'celebrate+ion=commemoration of an occasion or achievement',
            'decorate+ion=the process or art of decorating',
            'graduate+ion=the receiving of an academic degree or diploma',
            'locate+ion=a particular place or position',
            'operate+ion=an act of surgery performed on a patient',
            'pollute+ion=contamination',
            'rotate+ion=the action of rotating around an axis or center',
            'collide+sion=an instance of one moving object or person striking violently against another',
            'confuse+sion=uncertainty',
            'decide+sion=the action of deciding something',
            'divide+sion=the action of separating something into parts',
            'erode+sion=the process of eroding',
            'explode+sion=eruption',
            'breath+less=short of breath',
            'rest+less=unable to rest or relax as a result of anxiety or boredom',
            'use+less=having no ability or skill in a specified activity or area',
            'worth+less=having no real value or use',
            'clever+ness=the quality of being clever',
            'foolish+ness=lack of good sense or judgment',
            'mean+ness=the quality of being mean',
            'nervous+ness=the quality or state of being nervous',
            'polite+ness=the practical application of good manners',
            'smooth+ness=the quality or state of being smooth',
            'swift+ness=the quality of being quick',
            'convert+ible=can be changed in form, function, or character',
            'digest+ible=can be digested',
            'collapse+ible=can be folded into a small space',
            'defense+ible=can be protected',
            'force+ible=forceful or done with force',
            'reverse+ible=able to be reversed',
        ],
    ],
    4 => [
        'prefix' => [
            'anti+climax=a disappointing decline after a previous rise',
            'anti+social=shunning contact with others',
            'con+current=happening at the same time',
            'con+duct=to direct the course of',
            'be+little=to make someone seem unimportant',
            'de+base=to reduce something in quality or value',
            'de+bug=to remove errors from a computer program',
            'de+bunk=to expose the falseness of an idea',
            'de+value=to lower the value of a country\'s money',
            'de+port=to expel an alien from a country',
            'dis+agree=have or express a different opinion',
            'dis+appear=cease to be visible',
            'dis+arm=take a weapon or weapons away from a person, force, or country',
            'dis+connect=break the connection of or between',
            'dis+loyal=unfaithful',
            'dis+mount=to get off something higher',
            'dis+own=refuse to acknowledge',
            'dis+trust=lack of faith in something',
            'fore+cast=predict in advance',
            'fore+ground=the part of a scene that is near the viewer',
            'fore+runner=something that precedes something else',
            'fore+see=realize beforehand',
            'im+patient=having or showing a tendency to be quickly irritated or provoked',
            'im+perfect=not perfect',
            'im+possible=not able to occur, exist, or be done',
            'im+probable=not likely to happen',
            'im+pure=unclean or tainted',
            'in+advertent=unintentional or unintended',
            'in+active=not engaged in action',
            'in+complete=unfinished or lacking all the necessary parts',
            'in+convenient=not easily accessible',
            'in+credible=impossible or not easy to believe',
            'in+definite=not clearly expressed or defined',
            'in+dispensable=absolutely necessary',
            'in+nocuous=not harmful or offensive',
            'inter+change=to put each in the place of the other',
            'inter+atomic=existing or acting between atoms',
            'inter+national=existing or occurring between two or more nations',
            'intra+day=occurring within one day',
            'intra+mural=taking place within a single institution',
            'intra+state=existing or occurring within the boundaries of a state',
            'mis+behave=act in an inappropriate manner',
            'mis+handle=to manage something wrongly',
            'mis+pronounce=pronounce a word incorrectly',
            'mis+trial=a trial rendered invalid through an error in the proceedings',
            'pre+arrange=arrange or agree upon in advance',
            'pre+cook=cook in advance',
            'pre+paid=paid in advance',
            'pre+view=showing in advance',
            'sub+conscious=just below the level of awareness',
            'sub+marine=used under the surface of the sea',
            'sub+merge=cause to be under water',
            'super+impose=to place on top of',
            'trans+form=to change in shape or appearance',
            'un+certain=not known or definite',
            'un+decided=not having made a decision',
            'un+expected=not regarded as likely to happen',
            'un+familiar=not acquainted with',
            'un+necessary=not essential',
            'un+tangle=to free from a twisted state',
            'uni+cycle=a vehicle with a single wheel',
            'uni+form=not changing in style or manner',
        ],
        'suffix' => [
            'demonstrate+ion=the action of showing proof',
            'hibernate+ion=the act of passing the winter in an inactive condition',
            'collapse+ible=can be folded into a small space',
            'convert+ible=can be changed in form, function, or character',
            'defense+ible=can be protected',
            'digest+ible=can be digested',
            'reverse+ible=able to be reversed',
            'collect+ion=the action or process of collecting someone or something',
            'construct+ion=the building of something, typically a large structure',
            'destruct+ion=the action of causing so much damage to something',
            'digest+ion=the process of digesting',
            'direct+ion=a course along which someone or something moves',
            'infect+ion=the process of infecting or the state of being infected',
            'inject+ion=an instance of injecting or being injected',
            'inspect+ion=careful examination',
            'invent+ion=the action of inventing something',
            'object+ion=the action of challenging or disagreeing with something',
            'protect+ion=the action of protecting someone or something',
            'suggest+ion=a thought or plan that is offered or proposed',
            'communicate+ion=exchanging of information',
            'migrate+ion=movement from one part of something to another',
            'operate+ion=an act of surgery performed on a patient',
            'pollute+ion=contamination',
            'rotate+ion=the action of rotating around an axis or center',
            'collide+sion=an instance of one moving object or person striking violently against another',
            'divide+sion=the action of separating something into parts',
            'erode+sion=the process of eroding',
            'explode+sion=eruption',
        ],
    ],
    5 => [
        'prefix' => [
            'anti+climax=a disappointing decline after a previous rise',
            'anti+hero=a protagonist who does not act brave or morally good',
            'anti+septic=scrupulously clean or pure',
            'anti+social=shunning contact with others',
            'anti+thesis=the exact opposite',
            'con+current=happening at the same time',
            'con+figure=to put together in a particular form',
            'de+certify=to revoke the certification of something',
            'de+classify=to officially declare that something is no longer secret',
            'de+monetize=to deprive a coin or precious metal of its status as money',
            'de+pose=to remove from office suddenly and forcefully',
            'dis+figure=to mar the appearance or beauty of',
            'dis+mount=to get off something higher',
            'fore+boding=a notion that something bad will happen',
            'hyper+acidity=a condition in which the level of acid in the gastric juices is excessive',
            'hyper+inflation=monetary inflation occurring at a very high rate',
            'hyper+ventilate=to breathe at an abnormally rapid rate',
            'hypo+calcemia=an abnormally low level of calcium in the body',
            'im+probable=not likely to occur',
            'im+pure=mixed with foreign matter',
            'in+advertent=unintentional or unintended',
            'in+definite=not clearly expressed or defined',
            'in+dispensable=absolutely necessary',
            'in+domitable=impossible to subdue or defeat',
            'in+nocuous=not harmful or offensive',
            'in+surmountable=too great to overcome',
            'inter+cellular=located or occurring between cells',
            'inter+cession=the action of intervening on behalf of another',
            'inter+chromosomal=occurring between chromosomes',
            'inter+galactic=existing or occurring between galaxies',
            'intra+cellular=located or occurring within a cell',
            'intra+cranial=existing or occurring within the skull',
            'intra+dermal=existing or occurring within the layers of the skin',
            'intra+galactic=existing or occurring within a single galaxy',
            'intra+species=arising or occurring within a single species',
            'mis+aligned=having an incorrect position or placement',
            'mis+attribution=the act of attributing incorrectly',
            'mis+demeanor=a criminal offense that is less serious than a felony',
            'pre+conception=an idea or opinion formed beforehand',
            'pre+decease=to die before another person',
            'pre+define=to establish the meaning of something in advance',
            'pre+dispose=to bring about susceptibility to a condition',
            'pre+screen=to examine or interview before further selection processes occur',
            'sub+liminal=below the threshold of sensation or consciousness',
            'sub+jugate=bring under domination or control',
            'sub+terranean=existing or operating below the surface of the earth',
            'sub+sonic=denoting a speed less than that of sound',
            'super+cede=to displace in favor of another',
            'super+sonic=denoting a speed greater than that of sound',
            'trans+figure=to transform into something more beautiful',
            'trans+fix=to cause someone to become motionless with horror or wonder',
            'un+abated=without any reduction in intensity',
            'un+aesthetic=not visually pleasing',
            'uni+cameral=composed of one legislative body',
            'uni+lateral=involving only one side',
        ],
        'suffix' => [
            'construct+ion=the building of something, typically a large structure',
            'destruct+ion=the action of causing so much damage to something',
            'direct+ion=a course along which someone or something moves',
            'inflect+ion=the modulation of intonation or pitch in the voice',
            'inspect+ion=a careful examination',
            'suggest+ion=a thought or plan that is offered or proposed',
            'abdicate+ion=the act of relinquishing a throne',
            'ameliorate+ion=the act of making something better',
            'agitate+ion=a state of anxiety or nervous excitement',
            'agglomerate+ion=the action or process of collecting in a mass',
            'assimilate+ion=the process of taking in and incorporating as one\'s own',
            'castigate+ion=a harsh verbal reprimand',
            'demonstrate+ion=the action of showing proof',
            'denigrate+ion=the act of criticizing in a derogatory manner',
            'hibernate+ion=the act of passing the winter in an inactive condition',
            'migrate+ion=movement from one part of something to another',
            'abrade+sion=the process of scraping or wearing away',
            'allude+sion=an indirect or passing reference',
            'collide+sion=an instance of one moving object or person striking violently against another',
            'deride+sion=contemptuous ridicule or mockery',
            'delude+sion=a belief that is not true',
            'exclude+sion=the process or state of excluding or being excluded',
            'extrude+sion=a process used to create objects of a fixed cross-sectional profile',
        ],
    ],
];

// ---- Helpers: root display + affix application ----
function clean_root_display(string $root): string {
    if (substr($root, -2) === 'e%') return substr($root, 0, -1);
    if (substr($root, -1) === '%') return substr($root, 0, -1);
    return $root;
}

function apply_affix(string $root, string $affix, string $type): array {
    if ($type === 'prefix') {
        return [$affix . $root, ''];
    }
    if ($affix === 'er' || $affix === 'en') {
        if (substr($root, -1) === '%') {
            $r = substr($root, 0, -1);
            return [$r . substr($r, -1) . $affix,
                    " (but the last letter of '{$r}' must be repeated)"];
        }
        if (substr($root, -1) === 'e') {
            return [substr($root, 0, -1) . $affix,
                    " (but the 'e' ending of '{$root}' must be dropped)"];
        }
    }
    if ($affix === 'able') {
        if (substr($root, -2) === 'e%') {
            return [substr($root, 0, -1) . 'able', ''];
        }
        if (substr($root, -1) === 'e') {
            return [substr($root, 0, -1) . 'able',
                    " (but the 'e' ending of '{$root}' must be dropped)"];
        }
    }
    if ($affix === 'ible' && substr($root, -1) === 'e') {
        return [substr($root, 0, -1) . 'ible',
                " (but the 'e' ending of '{$root}' must be dropped)"];
    }
    if ($affix === 'ion' && substr($root, -2) === 'te') {
        return [substr($root, 0, -1) . 'ion',
                " (but the 'e' ending of '{$root}' must be dropped)"];
    }
    if ($affix === 'sion' && (substr($root, -2) === 'de' || substr($root, -2) === 'se')) {
        return [substr($root, 0, -2) . 'sion',
                " (but the last two letters of '{$root}' must be dropped)"];
    }
    return [$root . $affix, ''];
}

function prefix_suffix_parse(string $raw, string $type): ?array {
    $eq = strpos($raw, '=');
    if ($eq === false) return null;
    $left = substr($raw, 0, $eq);
    $hint = substr($raw, $eq + 1);
    $plus = strpos($left, '+');
    if ($plus === false) return null;
    if ($type === 'prefix') {
        $affix = substr($left, 0, $plus);
        $root  = substr($left, $plus + 1);
    } else {
        $root  = substr($left, 0, $plus);
        $affix = substr($left, $plus + 1);
    }
    if ($affix === '' || $root === '' || $hint === '') return null;
    [$word, $exp] = apply_affix($root, $affix, $type);
    return [
        'type'         => $type,
        'affix'        => $affix,
        'root'         => $root,
        'root_display' => clean_root_display($root),
        'hint'         => $hint,
        'word'         => $word,
        'exp'          => $exp,
    ];
}

// ---- Pre-parse data (§5.1) ----
$items = [];
foreach ($rawByTier as $tier => $raw) {
    $items[$tier] = [];
    foreach ($raw['prefix'] as $entry) {
        $p = prefix_suffix_parse($entry, 'prefix');
        if ($p) $items[$tier][] = $p;
    }
    foreach ($raw['suffix'] as $entry) {
        $s = prefix_suffix_parse($entry, 'suffix');
        if ($s) $items[$tier][] = $s;
    }
    $seen = []; $dedup = [];
    foreach ($items[$tier] as $it) {
        if (!in_array($it['word'], $seen, true)) {
            $dedup[] = $it;
            $seen[]  = $it['word'];
        }
    }
    $items[$tier] = $dedup;
}

function normalize_ps_answer(string $s): string {
    return str_replace(' ', '', strtolower(trim($s)));
}

// ---- No-repeat picker (§6.2) ----
function pick_ps_item(array $pool, string $sessionKey, int $tier): array {
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
if (isset($_POST['Submit1'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $userRaw = (string)($_POST['answer'] ?? '');
    $userAns = strtolower(trim($userRaw));
    $isCorrect = normalize_ps_answer($userAns) === normalize_ps_answer($cur['word']);

    $scorer = new Scorer($conn, $moduleId);
    $scorer->processAnswer(
        $isCorrect ? $cur['word'] : $userAns,
        $cur['word'],
        $cur['lvl']
    );

    $result = ['correct' => $isCorrect, 'user' => $userAns, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $tier = resolve_prefix_suffix_tier($lvl, $grd);
    $pool = $items[$tier] ?? $items[1];
    if (empty($pool)) $pool = $items[1] ?? [];
    $item = pick_ps_item($pool, $sessionKey, $tier);
    $item['lvl']  = $lvl;
    $item['tier'] = $tier;
    $item['grd']  = $grd;
    $_SESSION[$sessionKey]['current'] = $item;
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

<script>
// Position the cursor inside the pre-filled answer box:
//   prefix questions &#8594; cursor at position 0 (so typed letters go BEFORE the root)
//   suffix questions &#8594; cursor at the end   (so typed letters go AFTER the root)
// Runs once on page load. Afterwards the student can click anywhere to edit.
document.addEventListener('DOMContentLoaded', function () {
    var inp = document.querySelector('input[name="answer"]');
    if (!inp) return;
    var pos = inp.getAttribute('data-pos');
    setTimeout(function () {
        inp.focus();
        if (pos === 'start') {
            inp.setSelectionRange(0, 0);
        } else if (pos === 'end') {
            var len = inp.value.length;
            inp.setSelectionRange(len, len);
        }
    }, 0);
});
</script>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $hintEsc  = htmlspecialchars($cur['hint']);
    $rootEsc  = htmlspecialchars($cur['root_display']);
    $expEsc   = htmlspecialchars($cur['exp']);
    $affixEsc = htmlspecialchars($cur['affix']);
    $wordEsc  = htmlspecialchars($cur['word']);
?>
  <!-- Feedback: root word in adj-degrees-style box -->
  <!-- Feedback: hint box (matches question page) -->
<div style="margin:16px auto 10px;display:inline-flex;flex-direction:column;justify-content:center;align-items:center;max-width:480px;min-height:70px;padding:20px 34px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">    <div style="font-size:17pt;font-weight:600;color:#333;line-height:1.55;text-wrap:balance;">
      <?php echo $hintEsc; ?>
    </div>
  </div>  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:18px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer is '<strong style="color:#0000CC;font-size:16pt;"><?php echo htmlspecialchars($result['user']); ?></strong>'.
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:520px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php
    $feedbackLine =
        'The correct ' . htmlspecialchars($cur['type']) . ' is '
        . '<strong style="color:#CC0066;">' . $affixEsc . '</strong>'
        . $expEsc
        . ' because the word we\'re looking for is '
        . '<strong style="color:#CC0066;">' . $wordEsc . '</strong>.';
  ?>
  <p style="font-family:Arial,sans-serif;font-size:15pt;color:#800080;max-width:520px;margin:10px auto;line-height:1.55;text-wrap:balance;"><?php echo $feedbackLine; ?></p>  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $hintEsc = htmlspecialchars($q['hint']);
    $rootEsc = htmlspecialchars($q['root_display']);
    $typeEsc = htmlspecialchars($q['type']);
    $posAttr = ($q['type'] === 'prefix') ? 'start' : 'end';
    $ansLen    = strlen($q['word']);
    $inputSize = $ansLen + 3;
    $maxLen    = $ansLen + 6;
?>  <!-- Hint box -->
<div style="margin:30px auto 18px;display:inline-flex;flex-direction:column;justify-content:center;align-items:center;max-width:480px;min-height:70px;padding:20px 34px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">    <div style="font-size:18pt;font-weight:600;color:#333;line-height:1.55;text-wrap:balance;">
      <?php echo $hintEsc; ?>
    </div>
  </div>
  <!-- Instruction -->
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:600;color:#800080;margin:20px auto 10px;max-width:520px;text-wrap:balance;">
    Type the <strong style="color:#CC0066;"><?php echo $typeEsc; ?></strong>
    <?php echo $q['type'] === 'prefix' ? 'before' : 'after'; ?> the word in the box below.<br/><br/>
  </p>
  <!-- Pre-filled editable input, adj-degrees style, sized to the full answer -->
  <div style="margin:20px 0;">
    <input type="text" name="answer"
           value="<?php echo $rootEsc; ?>"
           size="<?php echo $inputSize; ?>"
           maxlength="<?php echo $maxLen; ?>"
           data-pos="<?php echo $posAttr; ?>"
           autofocus autocomplete="off" autocapitalize="off" autocorrect="off"
style="color:#0000CC;display:inline-block;text-align:center;height:52px;font-family:Arial,sans-serif;font-size:26px;font-weight:700;text-transform:lowercase;border:2px solid #aaaaaa;border-radius:8px;padding:4px 12px;"
  </div>
  <div style="margin:0 0 20px;">
    <br/><input type="submit" name="Submit1" value=" Submit " style="margin-right:12px;font-family:Arial,sans-serif;font-size:11pt;">
    <input type="submit" name="Submit2" value=" New Question " style="margin-left:12px;font-family:Arial,sans-serif;font-size:11pt;">
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