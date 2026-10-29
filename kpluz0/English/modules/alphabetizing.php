<?php
// english/modules/alphabetizing.php
// MULTI-FIB rank-assignment. Bypass QEngine per §D.
// Shows N words in random order; student types a rank number (1..N) beside each.
// Scored as a single concatenated string in alphabetical order.
//
// Levels (§E — 2-level scheme): Easy / Hard
//   Easy = legacy Easy. 3 words (grd<4) / 5 words (grd>=4).
//         Length cap maxlen=7 at grd<3.
//   Hard = legacy Medium + legacy Hard merged.
//         4 words (grd<4) / 5 words (grd>=4) / 5 consecutive sorted (grd>7).
//         Minlen grows: 4 at grd>1, 5 at grd>3, 6 at grd>5.
//   Rationale: merged Hard = legacy Medium behavior, which subsumes the
//   legacy Hard "consecutive" branch at grd>7.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
//
// Theme: ex-*-001 (136/547/117, not in §8 fit list) &#8594; paper-69-*.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'alphabetizing.php'

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

$moduleTitle = 'Alphabetization';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? 5)));

// Grade-keyed pools (0..10). Indexed by min(10, max(0, grd)).
$allwords = [];
$allwords[0] = [
    "all","am","an","and","ant","are","arm","as","ask","at","back","bad","bag","ball","bar","bat","be","bear","bed","bee","beg","bid","big","bit","black","blue","book","box","brown","bug","bun","bus","by","bye","can","cap","car","cat","cow","cub","cup","cut","dad","dam","day","den","did","dig","dip","dog","dot","dry","duck","dug","ears","egg","eight","eyes","face","fan","far","feet","fig","fin","fingers","fish","fit","five","foot","four","fox","frog","fun","gag","get","go","goat","gold","got","gray","green","gut","had","hair","ham","hands","happy","hat","he","head","hen","her","hi","hid","hip","his","hit","hop","hot","how","hug","hut","if","in","is","it","jam","jar","jet","job","keg","kit","knees","lake","leaf","led","leg","legs","let","lion","lip","mad","man","map","mat","me","men","met","mit","mob","mom","moon","mop","mouth","mug","my","nap","neck","nest","net","nine","nose","not","now","nut","one","or","orange","ox","pad","pan","pat","peg","pen","pet","pie","pig","pin","pink","pit","pop","pot","pox","pup","purple","rag","ram","ran","rat","red","rid","rob","robot","rot","rub","rug","run","rut","sad","sap","sat","seal","see","set","seven","she","ship","shoulders","sip","sit","six","skin","sky","so","sob","stomach","stop","sun","tag","tan","tank","tap","tar","teeth","ten","three","thumbs","tip","toes","tongue","tooth","top","tree","truck","tub","tug","two","up","us","van","wag","we","wet","white","wig","win","worm","yam","yellow"
];
$allwords[1] = [
    "again","along","ant","are","ask","ate","back","bad","bag","basket","bat","bath","because","bed","been","before","best","big","bike","bird","bit","black","blue","both","bottom","boy","brown","bus","but","buy","by","cake","came","car","child","clean","coin","cold","color","come","could","cup","dad","dark","day","dear","did","dig","dish","do","dog","done","down","drank","drink","drop","easy","eat","eight","end","far","fast","fat","father","fed","feel","feet","first","fish","five","flag","flat","for","fox","friend","frog","from","fun","game","gave","get","girl","give","given","giving","goes","gone","got","gray","green","hand","has","hat","have","head","hello","help","hen","her","here","hill","him","his","hit","hold","home","hop","hot","house","how","inch","into","its","jet","job","joy","keep","kick","kind","know","last","laugh","lay","leave","left","leg","less","let","lie","like","lip","little","long","low","mad","made","make","man","map","may","meet","men","milk","mix","more","most","mother","my","myself","name","near","neck","need","never","next","nine","not","now","odd","off","often","old","on","once","one","or","orange","our","out","pan","pat","pet","pick","pink","play","pretty","quick","rain","ran","read","red","ride","road","rock","round","run","sad","same","sang","sat","saw","say","says","second","see","seen","seven","she","should","sick","side","sister","sit","six","sleep","slow","some","son","still","stop","street","sun","take","tell","ten","than","thank","that","their","them","then","there","they","think","this","three","time","today","together","told","tomorrow","top","toy","tree","truck","try","turn","twenty","two","up","us","use","very","want","was","way","week","well","went","were","wet","what","when","which","while","white","who","why","will","win","wish","with","would","write","wrong","year","yellow","yes","you","your"
];
$allwords[2] = [
    "airplane","anchor","ant","ape","apple","arm","artist","aunt","baby","baker","ball","banana","bank","bat","beak","bear","bed","bee","bell","big","bird","birthday","bitter","blanket","blouse","blue","boat","bowl","box","boy","bread","breakfast","brother","bump","bunny","cabbage","calf","camp","cap","captain","car","carrot","carry","cartwheel","case","cat","cave","cereal","chair","cheerful","cherry","chick","child","clean","clothes","coat","coin","color","compass","cone","cool","corn","country","cousin","cricket","crystal","cub","cup","dance","day","deep","deer","desk","dirty","doctor","donkey","door","dream","duckling","eaglet","eat","eggs","elbow","elf","face","fall","falls","fantastic","far","farmer","fast","fat","father","fawn","feather","feet","fell","fence","few","fight","finger","flower","fly","foal","food","foot","fresh","friend","friendly","front","fruit","future","game","gate","gelatin","glad","gold","gosling","got","grass","hand","hat","help","hope","horse","hot","ice","island","jacket","jockey","jolly","juice","jump","king","kitchen","kite","kitten","knee","lamb","large","laugh","leaves","left","leg","lemon","light","liquid","listen","little","loaf","love","lunch","magic","mailbox","man","meat","milk","money","monkey","moon","mother","mountain","mouse","mouth","mud","museum","mushroom","music","neck","nest","niece","night","nose","ocean","onion","open","oxygen","paint","pants","paper","park","party","past","peace","pear","pen","pencil","pet","picnic","picture","pies","pillow","pilot","plant","plate","play","playful","pocket","polite","pretty","pupil","queen","race","raining","rat","recess","red","rich","ride","right","ripe","river","room","root","round","ruler","sail","school","seed","ship","shirt","shoe","shorts","sing","sister","skate","skirt","sleep","small","smile","soil","solid","son","space","spell","spinach","spoon","stem","stone","stop","store","story","strong","student","summer","sun","sunlight","sweet","swim","swimming","teacher","teeth","tent","thin","thoughtful","tiger","toaster","toe","toes","tomato","top","toys","train","travel","tree","trip","turkey","umbrella","uncle","under","vacation","wagon","walk","wall","warm","wash","watch","water","waves","weak","week","went","wheels","when","whistle","win","wire","wish","won","wonder","wood","word","work","worm","wrist","write","yellow","yelp"
];
$allwords[3] = [
    "ability","absorb","abuse","accuse","active","actual","acute","adopt","advantage","advice","afford","alone","ambition","ancient","approach","arctic","arrange","attend","attitude","attract","average","avoid","awake","became","behave","behest","behind","berate","beset","beside","border","brief","brilliant","brutal","burden","butter","cable","cadet","cajole","capture","certain","chill","churn","clever","climate","cling","coast","collate","comma","compel","compete","compose","concede","concrete","confess","confide","confine","confuse","connive","consent","consider","conspire","contain","continent","convene","convince","copper","corn","cornet","coward","create","crew","crumple","curl","curly","custom","debate","decay","deck","deduce","deed","deface","defame","defend","delicate","delude","depend","depose","derive","desk","device","diagram","digest","disease","distant","doctor","dogged","doze","drift","drill","droop","dupe","elate","elegant","enable","enforce","engage","enrage","entwine","estate","examine","excite","expire","explore","expose","fan","fatal","fierce","flute","flutter","fodder","fork","form","forsake","fortunate","forty","foster","frail","frill","from","frugal","furl","furnish","furry","gasp","glide","globe","gloom","glue","grace","gradual","grasp","gruel","habit","halt","harsh","hoof","humor","hurl","hurt","husk","imitate","impede","import","individual","intelligent","intend","journey","june","juror","launch","limit","locate","long","loop","loyal","lucid","lunar","magnificent","malt","marsh","mature","method","misery","moisture","morning","mummy","mural","murder","murmur","musk","musket","mutter","mystify","nation","neck","nectar","nest","next","number","nursery","observe","opponent","opposite","ordeal","organ","origin","outcome","passage","pastime","pause","perform","pervade","pluck","plume","plunge","polite","pollute","ponder","predator","predict","prevent","primary","privilege","process","procure","proof","prudent","quill","rare","rate","rebate","rebuke","recall","recede","recite","recline","reduce","refine","regale","relate","release","rely","remark","repel","require","resident","respect","respire","responsible","retire","reverse","revile","revive","risk","romp","roof","ruby","rudder","ruin","rusk","salt","scatter","schedule","seclude","secure","sedate","sensitive","sheath","shell","short","shout","shrub","shrug","shutter","signal","skill","solution","song","sort","spill","spoil","starve","steer","strong","struggled","student","stung","stupid","stupor","stutter","suffer","suitable","supper","supreme","survey","swan","swift","symbol","talent","text","theory","thrill","torch","treasure","triumph","truant","truly","tumor","tune","turban","turkey","turn","turnip","tutor","unite","unseen","value","vision","volunteer","waltz","wander","wasp","wisdom"
];
$allwords[4] = [
    "address","adult","afford","alert","analyze","ancestor","annual","apparent","appropriate","arena","arrest","ascend","assist","attempt","attentive","attractive","aunt","awkward","basic","benefit","blend","blossom","burrow","calculate","capable","captivity","carefree","century","chamber","circular","citizen","coax","column","communicate","competition","complete","concentrate","concern","conclude","confuse","congratulate","considerable","content","contribute","crafty","create","demonstrate","descend","desire","destructive","develop","disaster","disclose","distract","distress","dusk","eager","ease","energetic","entertain","entire","entrance","envy","essential","extraordinary","flexible","focus","fragile","frantic","frequent","frontier","furious","generosity","hail","hardship","heroic","host","human","humble","impact","increase","indicate","inspire","instant","invisible","jagged","keen","lack","limb","limp","manufacture","master","mature","meadow","mistrust","mock","modest","neighbor","noble","orchard","outgoing","outstanding","partner","patrol","peculiar","peer","permit","plead","plentiful","pointless","portion","practice","precious","prefer","prepare","proceed","pupil","queasy","recent","recognize","reduce","release","represent","request","resist","response","reveal","routine","sense","severe","shabby","shallow","shy","sole","source","sturdy","surface","survive","terror","threat","tidy","tour","tradition","tragic","typical","vacant","valiant","variety","vast","venture","volunteer","weary","withdrawn"
];
$allwords[5] = [
    "abuse","access","accomplish","achievement","aggressive","alternate","altitude","antagonist","antonym","anxious","apparent","approximate","aroma","assume","astound","available","avalanche","banquet","beverage","bland","blizzard","budge","bungle","cautiously","challenge","character","combine","companion","compassion","compensate","comply","compose","concept","confident","convert","course","courteous","crave","debate","decline","dedicate","deprive","detect","dictate","document","duplicate","edible","endanger","escalate","evade","exasperate","excavate","exert","exhibit","exult","feeble","frigid","gigantic","gorge","guardian","hazy","hearty","homonym","identical","illuminate","immense","impressive","independent","industrious","intense","intercept","jubilation","kin","luxurious","major","miniature","minor","mischief","monarch","moral","myth","narrator","navigate","negative","nonchalant","numerous","oasis","obsolete","occasion","overthrow","pardon","pasture","pedestrian","perish","petrify","portable","prefix","preserve","protagonist","provide","purchase","realistic","reassure","reign","reliable","require","resemble","retain","retire","revert","route","saunter","seldom","senseless","sever","slither","sluggish","soar","solitary","solo","sparse","spurt","strategy","suffix","suffocate","summit","suspend","synonym","talon","taunt","thrifty","translate","tropical","visible","visual","vivid","wilderness","withdraw"
];
$allwords[6] = [
    "access","accommodate","accumulate","adapt","adhere","agony","allegiance","ambition","ample","anguish","anticipate","anxious","apparel","appeal","apprehensive","arid","arrogant","awe","barren","beacon","beneficial","blunder","boisterous","boycott","burden","campaign","capacity","capital","chronological","civic","clarity","collaborate","collide","commend","commentary","compact","composure","concise","consent","consequence","conserve","conspicuous","constant","contaminate","context","continuous","controversy","convenient","cope","cordial","cultivate","cumulative","declare","deluge","dense","deplete","deposit","designate","desperate","deteriorate","dialogue","diligent","diminish","discretion","dissent","dissolve","distinct","diversity","domestic","dominate","drastic","duration","dwell","eclipse","economy","eerie","effect","efficient","elaborate","eligible","elude","encounter","equivalent","erupt","esteem","evolve","exaggerate","excel","exclude","expanse","exploit","extinct","extract","factor","former","formulate","fuse","futile","generate","genre","habitat","hazardous","hoax","hostile","idiom","ignite","immense","improvises","inept","inevitable","influence","ingenious","innovation","intimidate","jovial","knack","leeway","legislation","leisure","liberate","likeness","linger","literal","loathe","lure","majority","makeshift","manipulate","marvel","massive","maximum","meager","mere","migration","mimic","minute","monotonous","negotiate","objective","obstacle","omniscient","onset","optimist","originate","painstaking","paraphrase","parody","persecute","plummet","possess","poverty","precise","predicament","predict","prejudice","preliminary","primitive","priority","prominent","propel","prosecute","prosper","provoke","pursue","quest","recount","refuge","reinforce","reluctant","remorse","remote","resolute","restrain","retaliate","retrieve","rigorous","rural","salvage","sanctuary","siege","significant","solar","soothe","stationary","stifle","strive","subordinate","subsequent","superior","supplement","swarm","tangible","terminate","terrain","trait","transform","transport","treacherous","unanimous","unique","unruly","urban","vacate","verdict","verge","vibrant","vital"
];
$allwords[7] = [
    "abrupt","accelerate","access","acclaim","accommodate","accumulate","acknowledge","acquire","addict","adhere","adjacent","admonish","affliction","agitate","allege","allegiance","ambition","anguish","annihilate","anonymous","antagonize","anticipate","anxious","apathy","apparel","appeal","apprehensive","arbitrate","arrogant","aspire","astute","authentic","barren","beacon","bellow","beneficial","beseech","bestow","bewilder","blatant","blunder","boisterous","boycott","braggart","browse","burden","bystander","campaign","candid","canine","capacity","capital","capricious","capsize","casual","casualty","catastrophe","chorus","chronological","citrus","clamber","clarity","climax","collaborate","collide","commend","commentary","compact","composure","compromise","concise","concur","confront","congested","conjure","consent","consequence","conserve","conspicuous","constant","consult","contaminate","context","continuous","controversy","convenient","cordial","corrupt","counterfeit","cultivate","cumulative","customary","deceased","declare","deluge","dependent","deplete","deposit","designate","desperate","despondent","detach","deteriorate","devour","dialogue","diligent","diminish","discretion","dishearten","dismal","dismantle","dissent","dissolve","distinct","distraught","diversity","docile","domestic","dominate","downright","drastic","dumbfound","duration","eclipse","economy","effect","efficient","elaborate","eligible","emblem","encounter","endure","enthrall","epidemic","equivalent","esteem","evolve","exaggerate","exclude","expanse","exploit","extinct","extract","exuberant","factor","fathom","figment","firebrand","flabbergast","flagrant","former","formulate","fruitless","futile","generate","geography","gratify","gravity","grueling","gruesome","habitat","haggle","hazardous","headlong","hilarious","homage","homicide","hospitable","hostile","hurtle","hybrid","ignite","illiterate","immense","impede","implore","improvises","incident","incredulous","inevitable","infamous","influence","infuriate","ingenious","innovation","insinuate","intensified","intimidate","inundate","jovial","lavish","leeway","legacy","legislation","legitimate","leisure","lethal","liberate","likeness","linger","literal","loathe","magnetic","magnitude","majority","makeshift","manipulate","marvel","massive","maternal","maximum","meager","melancholy","mellow","migration","minute","momentum","monotonous","mortify","narrative","negligent","negotiate","nimble","nomadic","noteworthy","notify","notorious","nurture","objective","obnoxious","obstacle","omniscient","optimist","oration","originate","orthodox","overwhelm","painstaking","pamper","paraphrase","parody","patronize","peevish","pending","perceived","perjury","permanent","persecute","persist","perturb","plummet","poised","ponder","possess","potential","poverty","precise","predatory","predicament","predict","prejudice","preliminary","presume","preview","primitive","priority","prominent","propel","prosecute","prosper","provoke","prowess","pursue","quench","radiant","random","recede","recount","refuge","reinforce","reluctant","remorse","remote","reprimand","resolute","restrain","retaliate","retort","retrieve","rigorous","robust","rupture","salvage","sanctuary","sequel","significant","simultaneously","soothe","species","stationary","status","stifle","stodgy","strive","subordinate","subsequent","substantial","subtle","sullen","superior","supervise","supplement","tamper","tangible","terminate","terrain","tragedy","transform","transport","treacherous","trickle","trivial","unanimous","uncertainty","unique","unruly","unscathed","upright","urgent","utmost","vacate","vengeance","verdict","vibrant","vicious","vindictive","vocation"
];
$allwords[8] = [
    "abrupt","accelerate","access","acclaim","accommodate","accumulate","acknowledge","acquire","adhere","adjacent","admonish","affliction","agitate","allege","allegiance","ambition","anguish","annihilate","anonymous","antagonize","anticipate","anxious","apathy","apparel","appeal","apprehensive","arbitrate","arrogant","aspire","astute","authentic","barren","beacon","bellow","beneficial","beseech","bestow","bewilder","blatant","blunder","boisterous","boycott","braggart","bystander","campaign","candid","canine","capacity","capital","capricious","capsize","casualty","catastrophe","chronological","clamber","clarity","climax","collaborate","collide","commend","commentary","composure","compromise","concise","concur","confront","congested","conjure","consequence","conserve","conspicuous","constant","consult","contaminate","context","continuous","controversy","convenient","cordial","corrupt","counterfeit","cultivate","cumulative","customary","deceased","declare","deluge","dependent","deplete","designate","desperate","despondent","deteriorate","devour","dialogue","diligent","diminish","discretion","dishearten","dismantle","dissent","dissolve","distinct","distraught","diversity","docile","domestic","dominate","downright","drastic","dumbfound","duration","eclipse","economy","efficient","elaborate","eligible","emblem","encounter","endure","enthrall","epidemic","equivalent","esteem","evolve","exaggerate","exclude","expanse","exploit","extinct","extract","exuberant","fathom","figment","firebrand","flabbergast","flagrant","formulate","fruitless","futile","generate","geography","gratify","gravity","grueling","gruesome","habitat","haggle","hazardous","headlong","hilarious","homage","homicide","hospitable","hostile","hurtle","hybrid","ignite","illiterate","immense","impede","implore","improvises","incident","incredulous","inevitable","infamous","influence","infuriate","ingenious","innovation","insinuate","intensified","intimidate","inundate","jovial","lavish","leeway","legacy","legislation","legitimate","leisure","lethal","liberate","linger","literal","loathe","magnetic","magnitude","majority","makeshift","manipulate","maternal","maximum","meager","melancholy","migration","momentum","monotonous","mortify","narrative","negligent","negotiate","nomadic","noteworthy","notify","notorious","objective","obnoxious","obstacle","omniscient","optimist","oration","originate","orthodox","overwhelm","painstaking","paraphrase","parody","patronize","peevish","perceived","perjury","permanent","persecute","persist","perturb","plummet","potential","poverty","precise","predatory","predicament","predict","prejudice","preliminary","primitive","priority","prominent","propel","prosecute","provoke","prowess","pursue","quench","radiant","random","recede","recount","refuge","reinforce","reluctant","remorse","reprimand","resolute","restrain","retaliate","retort","retrieve","rigorous","rupture","salvage","sanctuary","significant","simultaneously","species","stationary","stifle","stodgy","subordinate","subsequent","substantial","subtle","sullen","superior","supervise","supplement","tangible","terminate","terrain","tragedy","transform","transport","treacherous","trickle","trivial","unanimous","uncertainty","unscathed","upright","vengeance","verdict","vibrant","vicious","vindictive","vocation"
];
$allwords[9] = [
    "aberration","accelerate","accolade","acknowledge","acrimony","adjacent","adjudicate","admonish","affliction","aftermath","agrarian","altercation","ambivalent","ameliorate","annihilate","anonymous","antagonize","antiquated","aphorism","arbitrate","assiduous","authentic","bewilder","braggart","bystander","capricious","castigate","casualty","cataclysm","catastrophe","catharsis","cautionary","celestial","centennial","certitude","cessation","churlish","circuitous","circumvent","colloquial","compromise","compunction","congested","constrain","constraint","countenance","counterfeit","culpable","customary","deceased","decrepit","denigrate","dependent","derivative","despondent","desultory","diabolical","differentiate","diminutive","disburse","discriminate","disgruntle","dishearten","dismantle","disparage","dissipate","distraught","diversity","emaciated","endowment","engender","enormity","enthrall","ephemeral","epidemic","equilibrium","eradicate","esoteric","espionage","euphemism","exacerbate","expedite","expendable","exuberant","firebrand","flabbergast","flagrant","flotilla","galvanize","geography","gossamer","grandiloquent","gratuitous","hilarious","homicide","hospitable","ignominious","illiterate","illusory","implacable","implement","inalienable","incarcerate","incident","inconsequential","incredulous","indigenous","indignity","indiscriminate","inexorable","infatuated","infirmity","infuriate","ingratiate","innocuous","insatiable","insinuate","instigate","insurrection","intensified","intercede","intractable","inundate","juncture","juxtapose","juxtaposition","lacerate","largesse","legitimate","liquidate","luminary","maelstrom","magnitude","mandatory","manifesto","manifold","materialize","maternal","melancholy","mesmerize","misnomer","mitigate","momentum","narrative","necessitate","negligent","noteworthy","notorious","obituary","obnoxious","olfactory","omnivorous","orthodox","overwhelm","palatable","pandemonium","pantheon","partisan","patronize","penchant","perceived","permanent","permeate","perpetrate","perverse","plebeian","plethora","poignant","posterity","potential","precedent","predatory","premeditated","prohibitive","proliferate","proselytize","quixotic","rambunctious","recompense","refurbish","reminisce","reminiscence","reminiscent","rendition","reparation","repertoire","reprimand","resurgence","rudiment","scurrilous","servitude","simultaneously","singular","smattering","somnolent","spurious","stalemate","stalwart","stereotype","subservient","substantial","supervise","temperate","tenacious","tutelage","uncertainty","undermine","unremitting","unscathed","vanguard","vengeance","vindictive","visionary","vocation","volatile"
];
$allwords[10] = $allwords[9];

$words = $allwords[$grd];

// Level config (§10 shape: simple ranges with $grd-keyed thresholds)
if ($lvl === 'Easy') {
    $numWords = ($grd >= 4) ? 5 : 3;
    $useConsecutive = false;
} else {
    $numWords = ($grd >= 4) ? 5 : 4;
    $useConsecutive = ($grd > 7);
}

$minlen = 0;
$maxlen = 15;
if ($lvl === 'Easy' && $grd < 3) $maxlen = 7;
if ($lvl === 'Hard' && $grd > 1) $minlen = 4;
if ($lvl === 'Hard' && $grd > 3) $minlen = 5;
if ($lvl === 'Hard' && $grd > 5) $minlen = 6;

$sessionLevelKey = $sessionKey . '_' . $lvl . '_' . $grd;

function pick_word_alpha($words, $minlen, $maxlen, $exclude = []) {
    $safety = 0;
    do {
        $w = $words[array_rand($words)];
        $safety++;
    } while ((strlen($w) < $minlen || strlen($w) > $maxlen || in_array($w, $exclude, true)) && $safety < 100);
    return $w;
}

// ============================================================
// HANDLE SUBMIT1 (SCORE)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    // Map user's rank -> word
    $userWords = [];
    foreach ($cur['words'] as $i => $w) {
        $rank = (int)($_POST['answer' . $i] ?? 0);
        $userWords[$rank] = $w;
    }
    ksort($userWords);
    $userArranged = array_values($userWords);
    $userConcat   = implode('', $userArranged);

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($userConcat, $cur['answer'], $cur['lvl']);

    $result = [
        'correct'      => $isCorrect,
        'userArranged' => $userArranged,
        'cur'          => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $qwords = [];

    if ($useConsecutive && count($words) >= $numWords + 3) {
        $start = rand(0, count($words) - $numWords - 1);
        for ($i = 0; $i < $numWords; $i++) {
            $qwords[] = $words[$start + $i];
        }
        shuffle($qwords);
    } else {
        $safety = 0;
        while (count($qwords) < $numWords && $safety < 200) {
            $w = pick_word_alpha($words, $minlen, $maxlen, $qwords);
            if (!in_array($w, $qwords, true)) $qwords[] = $w;
            $safety++;
        }
        // Absolute fallback: if we couldn't fill (pool too narrow), relax constraints
        while (count($qwords) < $numWords) {
            $w = $words[array_rand($words)];
            if (!in_array($w, $qwords, true)) $qwords[] = $w;
        }
    }

    $sorted = $qwords;
    sort($sorted);

    $_SESSION[$sessionKey]['current'] = [
        'words'       => $qwords,
        'answer'      => implode('', $sorted),
        'sorted'      => $sorted,
        'lvl'         => $lvl,
        'numWords'    => $numWords,
        'grd'         => $grd,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// THEME
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-3.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-3.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .alpha-table { border-collapse: separate; border-spacing: 0 8px; margin: 20px auto; }
  .alpha-table td { padding: 4px 12px; font-size: 1.4rem; }
  .alpha-word { text-align: right; font-family: 'Comic Sans MS', Arial, sans-serif;
                font-size: 1.6rem; font-weight: 600; color: #880088; }
  .alpha-rank { width: 60px; height: 42px; text-align: center; font-size: 1.4rem;
                font-weight: 700; color: #0000BB; border: 2px solid #ccc;
                border-radius: 8px; box-sizing: border-box; }
  .alpha-rank:focus { outline: none; border-color: #8080ff; background: #f8f8ff; }
  .alpha-feedback { max-width: 600px; margin: 20px auto; font-size: 1.1rem; line-height: 1.6; }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <div class="alpha-feedback">
        <p style="font-size:14pt; color:#666;">
            You arranged the words in this order:<br>
            <strong style="color:#0000CC; font-size:16pt;">
                <?php echo htmlspecialchars(implode(', ', $result['userArranged'])); ?>
            </strong>
        </p>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>
        <p style="font-size:14pt; color:#800080; margin-top:20px;">
            The words
            <em><?php echo htmlspecialchars(implode(', ', $cur['words'])); ?></em>
            are<br/>alphabetically arranged in this order:
        </p>
        <p style="font-size:16pt; font-weight:700; color:#CC0066;">
            <?php echo htmlspecialchars(implode(', ', $cur['sorted'])); ?>
        </p>
    </div>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:15pt; color:#0000CC; font-weight:600; margin-top:20px;">
        Alphabetize the following words.
    </p>
    <p style="font-size:13pt; color:#333;">
        Put '1' beside the first word, '2' beside the second<?php
            $n = $q['numWords'];
            if ($n == 3) echo ",<br/>and '3' beside the last word.";
            elseif ($n == 4) echo ",<br/>'3' beside the third, and '4' beside the last word.";
            else echo ", and so on,<br/>until you put '5' beside the last word.";
        ?>
    </p>

    <table class="alpha-table">
        <?php for ($i = 0; $i < $q['numWords']; $i++): ?>
            <tr>
                <td class="alpha-word"><?php echo htmlspecialchars($q['words'][$i]); ?></td>
                <td><input type="text" name="answer<?php echo $i; ?>"
                           class="alpha-rank" maxlength="1" inputmode="numeric" pattern="[0-9]"></td>
            </tr>
        <?php endfor; ?>
    </table>

    <input type="submit" name="Submit1" value="Submit"       style="margin:20px 10px;">
    <input type="submit" name="Submit2" value="New Question" style="margin:20px 10px;">
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