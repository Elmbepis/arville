<?php
// english/modules/common-proper-nouns.php
// Common and Proper Nouns — click the common noun or the proper noun among N choices.
// 9 tiers via (level × grade); 2 choices only for Easy at grades 0–1, else 4 choices.
// Choices display in UPPERCASE for Hard (or grade &#8805; 6) so students can't lean on
// capitalisation as the giveaway; original case is preserved for the answer key,
// feedback message, and href.
// Grade from $_SESSION['user_grade'] (0–10).

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
$moduleTitle = 'Common and Proper Nouns';
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
// Legacy Easy:   $arrnum = $grd;      if ($grd>=6) $arrnum=6;   &#8594;  min(6, grd)
// Legacy Hard:   $arrnum = $grd+2;    if ($grd>=6) $arrnum=8;   &#8594;  min(8, grd+2)
// (Medium folded into Hard; Hard is the harder of the two formulas.)
function resolve_cpn_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') return min(6, $grd);
    return min(8, $grd + 2);
}

// ---- Data (§5) ----
$nouns = [];
$nouns[0] = [
    "ant","arms","apple","aunt","ball","barn","bead","bean","bear","bed","bell","bird","berry","bone","boat","boy","book","boot","boss","bread",
    "bun","bus","candy","car","card","camp","cat","cent","chick","coin","corn","crib","cup","chair","dog","deer","desk",
    "drum","dish","door","ears","eyes","elf","farm","father","feet","fox","frog","fun","gas","girl","gum",
    "hats","head","hen","ice","jar","jug","keys","king","kite","lamp","luck","lady","lion","meal","man","mat",
    "mother","nose","owl","pail","paper","pear","pencil","pen","pig","pillow","puppy","rabbit","roof",
    "sand","sea","singer","sister","song","shoes","sun","sugar","toy","tree","tiger","tray","trip","truck","twig","uncle",
    "vase","wall","woman","wig","wolf","yard"
];
$nouns[1] = [
    "ant","ash","army","arms","actor","apple","aunt","ball","barn","bead","bean","bear","bed","bell","bird","berry","bone","boat","boy","book","boot","boss","bread","brick",
    "brother","bun","bus","bush","calf","candy","car","card","camp","cat","cave","cent","chick","coins","corn","crane","crib","cup","chair","dancer","dog","deer","desk",
    "duty","drum","dishes","door","doves","ears","eyes","elf","eraser","farmer","father","feet","flea","fox","frog","fruit","fun","gas","girl","gym","gum",
    "hats","head","hen","hoof","hoop","hero","ice","jar","jug","keys","king","kite","lamp","luck","lady","lily","loss","lion","meal","man","mat",
    "mother","nose","owl","pail","paper","pear","pearl","pencil","pen","people","pig","pillow","poem","puppy","rabbit","rod","ruby","roof","ribs",
    "sand","sea","singer","sister","song","snake","shoes","sun","sugar","toy","tree","tiger","toad","town","tray","trip","truck","twig","uncle",
    "vase","wall","wallet","web","week","wheel","wife","woman","wig","wolf","wood","yard"
];
$nouns[2] = [
    "actor","animal","airport","atlas","battery","beard","bedroom","brain","brick","brother","brook","beach","brass","beast","beetle","batch","bread",
    "beggar","berry","bottle","bunny","bucket","camera","cannon","cattle","cellar","candy","class","cliff","cracker","crate","crime","crutch","cheeks",
    "castle","chicken","crook","county","country","cherry","city","child","cobweb","coffee","cutter","daisy","diary","diaper","donkey","doctor","enemy",
    "entry","fairy","family","faucet","feather","ground","goose","glass","glove","grape","grain","ghost","goldfish","horse","haircut","holiday","icicle",
    "island","kitten","knife","ladybug","lizard","louse","lunch","locket","lumber","mallet","mailman","memory","marble","month","mitten","money",
    "music","napkin","needle","notebook","ocean","parent","peach","potato","pastry","pantry","penny","planet","people","pillow","prince","princess","printer","queen",
    "ranch","roach","rabbit","robins","rifle","recess","reward","saucer","stove","sheet","shoes","seaman","street","sailboat","slipper","soldier","snack",
    "skill","sea","sister","sofa","song","space","spoon","speech","stork","thumb","trunk","tractor","throne","trial","teacher","tooth","tomato","thief","uncle",
    "umbrella","wallet","waiter","wheel","wrist","writer","zebra"
];
$nouns[3] = [
    "airplane","airport","appliance","army","barber","baseball","beef","bicycle","birthday","breakfast","brush","buildings","bushes","butter",
    "butterfly","cabbage","cable","calculator","calendar","canary","carpenter","cave","caveman","cemetery","cent","century","cereal","chairman","channel","cherries",
    "cherry","cobweb","colony","company","cracker","creator","creature","daughter","dinner","discovery","earthquake","eatery","eggnog","elbow",
    "elephant","eyeglasses","eyelash","faucet","feather","firefly","fireman","fisherman","freezer","gate","glove","glue","godchild",
    "goldfish","goose","grain","grandchild","grandfather","grandmother","hair","haircut","handbag","hobbies","holiday","hot","housefly","instrument",
    "jellyfish","juggler","laborer","ladybug","lawyer","library","lizards","locket","lumber","lungs","machine","mailbox","minister","mountain","nation",
    "needle","nursery","oatmeal","pail","pancake","passenger","patrolman","pear","pest","photograph","pickles","planet","playground",
    "pleasure","policeman","policewoman","popcorn","princess","queen","quicksand","quilt","railway","rainstorm","refrigerator","restaurant","rosary",
    "salary","saucer","scarecrow","scarf","scissors","secretary","shrubs","sidewalk","spiders","sponge","squirrel","stepchild","stranger","strawberry","stream",
    "street","stuntman","sugar","suitcase","sunglasses","superhero","sweater","telephone","television","territory","throne","tomatoes","toothbrush","toothpaste",
    "treatment","trousers","twig","vacation","vegetable","veil","vein","visitor","volcano","volleyball","waiter","weather","whisker","wilderness",
    "wrench","wrist"
];
$nouns[4] = [
    "appliance","basket","basketball","battle","beetle","beggar","bicycle","birthday","breakfast","bubblegum","bucket","buildings","butterfly",
    "cabbage","cactus","calculator","calendar","canary","cannon","carpenter","cattle","celery","cellar","cemetery","century","chairman","channel","colony",
    "company","condensation","creator","creature","daughter","discovery","donkey","earthquake","eatery","elephant","evaporation","eyeglasses","eyelash","feather",
    "finger","firefly","fireman","fisherman","freezer","furniture","giraffe","godchild","governor","grandchild","grandfather","grandmother","handbag","hobbies","holiday",
    "housefly","hydrant","icicle","income","instrument","island","jellyfish","juggler","laborer","lawyer","lettuce","library","lizards","locket","lumber","kingdom","machine","marble",
    "minister","mountain","mystery","nation","needle","nursery","oatmeal","pancake","passenger","patrolman","photograph","pickles","playground","pleasure","poison","policeman",
    "policewoman","precipitation","princess","quicksand","railway","refrigerator","restaurant","riddle","rosary","salary","saucer","scarecrow","scissors","seashore","secretary",
    "shrubs","sidewalk","spiders","sponge","squirrel","station","stepchild","stranger","strawberry","stuntman","suitcase","sunglasses","superhero","sweater","telephone",
    "television","territory","throat","throne","tomatoes","toothbrush","toothpaste","treatment","triangle","trousers","underwear","vacation",
    "vegetable","visitor","vision","volcano","volleyball","voyage","weather","whisker","wilderness","wrench"
];
$nouns[5] = [
    "achievement","activity","aftermath","afternoon","afterthought","apparel","appliance","artifacts","basketball","beginner","beliefs","bicycle","birthday",
    "boundary","breakfast","bubblegum","buildings","butterfly","calculator","calendar","caption","carpenter","cemeteries","century","chairman","company","condensation",
    "creatures","daughter","delivery","denial","destiny","discovery","earthquake","education","elephant","evaporation","evidence","eyeglasses","eyelashes","feather","fireflies",
    "fireman","fisherman","freezer","friction","furniture","giraffe","godchild","governor","grandchild","grandfather","grandmother","handbag","hobbies","holidays",
    "houseflies","hydrant","instrument","jellyfish","kingdom","language","lettuce","library","machine","minister","mountain","mystery","nursery","oatmeal","pancake",
    "partner","passenger","patrolman","photographs","pickles","plantation","playground","pleasure","policeman","policewoman","pollution","precipitation",
    "princess","quicksand","railway","refrigerator","restaurant","scarecrow","scissors","seashore","secretary","sidewalk","spiders","squirrel","station","stepchild",
    "stranger","strawberry","stuntman","suitcase","sunglasses","superhero","sweater","telephone","television","territory","textures","tomatoes","toothbrush","toothpaste",
    "treatment","triangle","trousers","underwear","vacation","vegetable","vision","visitor","volcano","volleyball","weather","whisker","wilderness"
];
$nouns[6] = [
    "achievement","acoustics","acquisition","activities","aftermath","afternoons","afterthought","apparel","appliance","artifacts","aviaries","basketball","beginner",
    "beliefs","bicycle","birthday","boundary","breakfast","bubblegum","buildings","butterfly","calculator","calendar","caption","carpenter","cemeteries",
    "century","chairman","company","condensation","connection","creatures","daughter","delivery","denial","destiny","discovery","earthquake","education",
    "enclosure","evaporation","evidence","eyeglasses","eyelashes","fireflies","fireman","fisherman","freezer","friction","furniture","giraffe","godchild",
    "governor","grandchild","grandfather","grandmother","handbag","hobbies","holidays","houseflies","hydrant","hubris","instrument","jellyfish","kingdom","language","lettuce",
    "library","machine","minister","mountain","mystery","nuisance","nursery","oatmeal","pancake","partner","passenger","patrolman","photographs","pickles",
    "plantation","playground","pleasure","policeman","policewoman","pollution","precipitation","presentation","princess","quicksand","railway","refrigerator","relief",
    "restaurant","scarecrow","scissors","seashore","secretary","sidewalk","spiders","squirrel","station","stepchild","stranger","strawberry","stuntman","suitcase",
    "sunglasses","superhero","sweater","telephone","television","territory","textures","tomatoes","toothbrush","toothpaste","treatment","trousers","underwear",
    "vacation","vanity","vegetable","visitor","volcano","volleyball","weather","whisker","wilderness"
];
$nouns[7] = [
    "achievement","acoustics","acquisition","acquittal","activities","acumen","aftermath","afterthought","allotment","amendment","amusement","apparel","appearance",
    "appendix","appliance","artifacts","assembly","assessment","assignment","attendant","basketball","beginner","bewilderment","boundary","caprice","caption",
    "cemeteries","century","clearance","colon","commitment","company","compensation","conceit","condensation","connection","consideration","consistency","contents",
    "contingent","credence","czar","deacon","deceiver","deception","defendant","deflection","delivery","demise","demolition","denial","deportation",
    "deprivation","description","destiny","detachment","digestion","dilemma","discovery","dismissal","distemper","distillery","distress","earthquake","eclipse","ecstasy",
    "education","elasticity","elopement","embodiment","enclosure","enigma","establishment","evaporation","exponent","eyeglasses","eyelashes","freshener","friction","furniture",
    "giraffe","godchildren","governor","hubris","ignition","impeachment","inhabitant","instrument","language","legion","measles","mutton","mystery","nostalgia","nursery",
    "nuisance","omen","passenger","patrolman","perusal","photographs","pickles","plantation","pleasure","policeman","policewoman","pollution","postponement",
    "precipitation","prescription","presentation","prevention","profession","quicksand","reflection","refreshment","refrigerator","refusal","relief","reliever",
    "replenishment","reputation","resentment","restaurant","retrieval","scaffold","seashore","secretary","sidewalk","sparrow","steeple","stepchild","stranger",
    "stuntman","suitcase","sunglasses","superhero","sweetener","territory","textures","transcript","treason","treaties","treatment","trousers","tweezers",
    "underwear","vacation","vanity","weasel","wilderness"
];
$nouns[8] = [
    "absorption","abstinence","achievement","acoustics","acquisition","acquittal","activities","acumen","aftermath","afterthought","allotment","amendment","amusement","apparel",
    "appearance","appendix","appliance","archaeology","artifacts","assembly","assessment","assignment","attendant","bewilderment","caprice","chauvinism","commitment","compensation",
    "conceit","condensation","connection","consideration","consistency","contingent","credence","deceiver","deception","defendant","deflection","demarcation","demise","demolition",
    "denouement","deportation","deprivation","description","destiny","detachment","digestion","dilemma","discovery","dismissal","distemper","distillery","distress","divinity",
    "eclipse","ecstasy","education","elasticity","elopement","embodiment","enclosure","enigma","entrepreneur","establishment","evaporation","exponent","hubris","ignition",
    "impeachment","inhabitant","instrument","legitimacy","leprechaun","lingerie","maelstrom","mausoleum","meringue","millennium","mystique","naivete","nostalgia","nuance",
    "nuisance","omniscience","onomatopoeia","paranoia","paraphernalia","parliament","philosophy","plagiarism","pneumonia","postponement","precipitation","prescription","prerogative",
    "presentation","prevention","profession","pseudonym","quandary","receptacle","reconnaissance","recurrence","refraction","reflection","refreshment","refrigeration",
    "repertoire","replenishment","reputation","requiem","resentment","retrieval","seismology","subpoena","subterfuge","surveillance","sovereignity","transcript","treason",
    "troubadour","verification","vaudeville","vengeance","verbiage","vinaigrette"
];

// -- Proper-noun list banks --
// [1]=people  [2]=days/months  [3]=countries  [4..7]=places/planets/companies/etc.
$pnouns = [];

$pnouns[0][1] = ["Adam","Alex","Alice","Alvin","Anna","Ben","Bill","Carlo","Clara","David","Dora","Edwin","Elena","Elise","Emily","Emma",
    "Eva","Grace","Helen","Henry","Jack","James","Jason","Jill","Joan","Joey","John","Julia","Kate","Kathy","Kiko","Leo",
    "Lina","Lisa","Lita","Lucas","Lucy","Luis","Luke","Maria","Max","Maya","Mia","Mike","Mila","Nick","Nora","Owen",
    "Pablo","Pedro","Pia","Raiza","Ramon","Rey","Ryan","Sarah","Sonia","Terry","Timmy","Tom","Wally"];
$pnouns[0][2] = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday","Christmas",
    "January","February","March","April","May","June","July","August","September","October","November","December"];
$pnouns[0][3] = ["Philippines","United States","Brazil","Canada","China","Denmark","Finland","France","Germany","Greece","Iceland","India","Iran","Iraq","Ireland","Israel","Italy",
    "Japan","Jordan","Kenya","Korea","Malaysia","Mexico","Nepal","Norway","Panama","Peru","Poland","Spain","Sweden","Thailand","Vietnam"];
$pnouns[0][4] = ["Manila","Boston","Paris","London","New York","Tokyo","Cebu","Laguna","Cavite","Batangas","Bulacan","Pasig City","Pasay City","Tarlac","Makati City",
    "Palawan","Bohol","Luzon","Visayas","Mindanao","Samar","Davao","Metro Manila"];

$pnouns[1][1] = ["Aaron","Adam","Adrian","Alex","Alice","Anna","Barney","Bella","Ben","Benny","Bill","Calvin","Carlo","Charlie","Chloe","Clara","Colin","Daniel","David",
    "Dory","Dylan","Edwin","Elena","Elise","Emily","Emma","Ethan","Eva","Gabriel","Grace","Helen","Henry","Ian","Isaac","Jack","Jacob","Jake","James","Jason",
    "Jill","Joan","Joey","John","Joseph","Julia","Kate","Kathy","Kennedy","Kiko","Kylie","Layla","Leah","Leila","Leo","Lita","Lucas","Lucy","Luis","Luke",
    "Marian","Max","Maya","Mia","Micah","Michael","Mike","Mila","Nick","Noah","Nora","Owen","Pablo","Pedro","Pia","Raiza","Ryan","Sarah","Sean","Steve","Terry",
    "Timmy","Tom","Thomas","Tristan","Victoria","Wally","William","Zoe"];
$pnouns[1][2] = $pnouns[0][2];
$pnouns[1][3] = ["Philippines","United States","Australia","Austria","Bahamas","Bahrain","Bangladesh","Belgium","Bolivia","Brazil","Canada","China","Costa Rica","Cuba",
    "Denmark","Ecuador","Egypt","Finland","France","Germany","Greece","Haiti","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan",
    "Jordan","Kenya","Korea","Kuwait","Lebanon","Liberia","Luxembourg","Malaysia","Mexico","Mongolia","Myanmar","Nepal","Netherlands","New Zealand","Nigeria","Norway","Pakistan",
    "Panama","Paraguay","Peru","Poland","Portugal","Qatar","Saudi Arabia","Singapore","Somalia","Spain","Sri Lanka","Sudan","Swaziland","Sweden","Switzerland","Thailand","United Kingdom",
    "Uruguay","Venezuela","Vietnam","Yemen"];
$pnouns[1][4] = ["Mercury","Venus","Mars","Jupiter","Saturn","Uranus","Neptune","Pluto","Asia","North America","South America","Australia","Europe","Africa","Antarctica"];
$pnouns[1][5] = ["Manila","Boston","Paris","London","New York","Tokyo","Beijing","Bangkok","Athens","Seoul","Osaka","Mumbai","Jakarta","Cairo","Moscow","Shanghai",
    "Nagoya","Denver","Dallas","Miami","Tehran","Atlanta","Detroit","Sydney","Cebu","Laguna","Cavite","Batangas","Bulacan","Pasig City","Pasay City","Tarlac","Makati City",
    "Palawan","Bohol","Luzon","Visayas","Mindanao","Samar","Davao","Metro Manila"];

$pnouns[2][1] = ["Abigail","Addison","Adrian","Alexander","Alexandra","Alexis","Allison","Alyssa","Amelia","Andrew","Annabelle","Anthony","Arianna","Aubrey","Audrey",
    "Austin","Bailey","Barney","Benjamin","Bentley","Brandon","Brooklyn","Calvin","Cameron","Carmen","Caroline","Carson","Charlie","Charlotte","Christopher",
    "Claire","Colton","Connor","Daniel","Declan","Domeng","Dominic","Dwayne","Easton","Eleanor","Eliana","Elijah","Elizabeth","Evelyn","Gabriel","Gabriela",
    "George","Girlie","Grayson","Hailey","Hannah","Harper","Harrison","Hayden","Hudson","Hunter","Isabelle","Isaiah","Jackson","Jasmine","Jayden","Jeremiah",
    "Jolina","Jonathan","Jordan","Joseph","Joshua","Julian","Kaitlyn","Kaylee","Kendall","Kennedy","Landon","Lauren","Lilian","Lincoln","Madison","Marian",
    "Matthew","Michael","Morgan","Natalie","Nathan","Nathaniel","Nevaeh","Nicholas","Oliver","Olivia","Peyton","Reagan","Samantha","Samuel","Savannah",
    "Scarlett","Sebastian","Sophie","Stella","Sydney","Taylor","Thomas","Tristan","Victoria","William","Xavier","Zachary"];
$pnouns[2][2] = $pnouns[0][2];
$pnouns[2][3] = ["Albania","Algeria","Angola","Argentina","Australia","Austria","Bahamas","Bahrain","Bangladesh","Belgium","Bolivia","Brazil","Brunei","Bulgaria",
    "Cambodia","Canada","Costa Rica","Denmark","Ecuador","Ethiopia","Finland","France","Germany","Greece","Hungary","Iceland","Indonesia","Ireland","Israel","Jamaica",
    "Jordan","Kuwait","Lebanon","Liberia","Luxembourg","Malaysia","Mexico","Mongolia","Myanmar","Netherlands","New Zealand","Nicaragua","Nigeria","Norway","Pakistan",
    "Panama","Paraguay","Philippines","Poland","Portugal","Saudi Arabia","Singapore","Somalia","Sri Lanka","Swaziland","Sweden","Switzerland","Thailand","Tunisia","Uganda",
    "Ukraine","United Kingdom","United States","Uruguay","Venezuela","Vietnam","Zambia","Zimbabwe"];
$pnouns[2][4] = $pnouns[1][4];
$pnouns[2][5] = ["Manila","Boston","Paris","London","Chicago","Tokyo","Beijing","Seattle","Taipei","Bangkok","Madrid","Osaka","Mumbai","Jakarta","Cairo","Moscow","Shanghai",
    "Nagoya","Istanbul","Houston","Denver","Dallas","Miami","Orlando","Tehran","Atlanta","Detroit","Sydney","Cebu","Laguna","Cavite","Batangas","Bulacan","Pasig City","Pasay City",
    "Tarlac","Makati City","Palawan","Bohol","Luzon","Visayas","Mindanao","Samar","Davao","Metro Manila","Pangasinan","Ilocos Norte","Ilocos Sur","Pampanga"];

$pnouns[3][1] = $pnouns[2][1];
$pnouns[3][2] = $pnouns[0][2];
$pnouns[3][3] = $pnouns[2][3];
$pnouns[3][4] = $pnouns[1][4];
$pnouns[3][5] = ["Intel","Microsoft","Ford","Facebook","Google","Samsung","Sony","Cisco","Hyundai","Toyota","Honda","Mitsubishi","Kia","Philips","Sanyo","Toshiba",
    "Jollibee","Nikon","Boeing","Kodak","Burger King","Pizza Hut"];
$pnouns[3][6] = ["Atlanta","Bangkok","Batangas","Beijing","Bogota","Boston","Bulacan","Cavite","Chicago","Dallas","Denver","Detroit","Houston","Ilocos Norte","Ilocos Sur","Istanbul",
    "Jakarta","Karachi","Kuala Lumpur","Laguna","London","Los Angeles","Madrid","Makati City","Manila","Melbourne","Metro Manila","Mindanao","Montreal","Moscow","Mumbai",
    "Nagoya","New Delhi","Orlando","Palawan","Pampanga","Pangasinan","Pasay City","Pasig City","Phoenix","San Diego","Seattle","Shanghai","Sydney","Taipei","Tarlac","Tehran",
    "Visayas"];
$pnouns[3][7] = ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa",
    "Kansas","Kentucky","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey",
    "New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah",
    "Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"];

$pnouns[4][1] = ["Abraham Lincoln","Albert Einstein","Alexander Graham Bell","Alfred Hitchcock","Andres Bonfiacio","Archimedes","Aristotle","Babe Ruth","Barack Obama","Beethoven","Benjamin Franklin",
    "Beyonce","Bill Clinton","Bill Cosby","Bill Gates","Bob Dylan","Bob Hope","Britney Spears","Carl Sagan","Charles Darwin","Charles Dickens","Charlie Brown","Christopher Columbus",
    "Cleopatra","Clint Eastwood","Cory Aquino","Dan Aykroyd","David Letterman","Denzel Washington","Dwight D. Eisenhower","Eddie Murphy","Edgar Allen Poe","Elizabeth Taylor","Elvis Presley",
    "Emilio Aguinaldo","Ernest Hemingway","Fidel Ramos","Galileo Galilei","Gandhi","George W. Bush","George Washington","Harrison Ford","Helen Keller","Henry Ford","Hillary Clinton",
    "Houdini","Isaac Newton","Jack Nicholson","James Dean","Jim Carrey","Johannes Kepler","John F. Kennedy","John Lennon","John Travolta","Jose Rizal","Joseph Estrada","Juan Luna",
    "Julia Roberts","Kareem Abdul-Jabbar","Lebron James","Leonardo Da Vinci","Lewis Carrol","Louis Pasteur","Lucille Ball","Manny Pacquiao","Margaret Thatcher","Marie Curie","Marilyn Monroe",
    "Mark Twain","Martin Luther King","Meryl Streep","Michael J. Fox","Michael Jackson","Michael Jordan","Michelangelo","Mick Jagger","Mother Teresa","Mozart","Muhammad Ali","Napoleon",
    "Neil Armstrong","Nicholas Copernicus","Norman Rockwell","Oprah Winfrey","Pablo Piccaso","Paul McCartney","Paul Newman","Pete Sampras","Rene Descartes","Robert De Niro","Robin Williams",
    "Roger Federer","Ronald Reagan","Sean Connery","Sigmund Freud","Stephen Hawking","Steve Jobs","Steve Martin","Thomas Edison","Thomas Jefferson","Tiger Woods","Tom Cruise",
    "Tom Hanks","Vincent Van Gogh","Walt Disney","William Shakespeare"];
$pnouns[4][2] = $pnouns[0][2];
$pnouns[4][3] = $pnouns[2][3];
$pnouns[4][4] = ["Mercury","Venus","Mars","Jupiter","Saturn","Uranus","Neptune","Pluto","Asia","North America","South America","Australia","Europe","Africa","Antarctica",
    "Phobos","Milky Way","Andromeda Galaxy","Ganymede"];
$pnouns[4][5] = $pnouns[3][5];
$pnouns[4][6] = ["Atlanta","Bangkok","Beijing","Bogota","Boston","Buenos Aires","Charlotte","Chicago","Cincinnati","Cleveland","Dallas","Denver","Detroit","Houston","Indianapolis","Istanbul",
    "Jakarta","Karachi","Kuala Lumpur","London","Los Angeles","Madrid","Manila","Melbourne","Mexico City","Minneapolis","Montreal","Moscow","Mumbai","Nagoya","New Delhi","Orlando",
    "Philadelphia","Phoenix","Pittsburgh","Quebec","Rio de Janeiro","Sacramento","San Antonio","San Diego","Sao Paulo","Seattle","Shanghai","Shenzhen","Sydney","Taipei","Tehran",
    "Vancouver"];
$pnouns[4][7] = $pnouns[3][7];

$pnouns[5][1] = $pnouns[4][1];
$pnouns[5][2] = $pnouns[0][2];
$pnouns[5][3] = $pnouns[2][3];
$pnouns[5][4] = $pnouns[4][4];
$pnouns[5][5] = $pnouns[3][5];
$pnouns[5][6] = $pnouns[4][6];
$pnouns[5][7] = ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa",
    "Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey",
    "New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah",
    "Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"];

$pnouns[6][1] = $pnouns[4][1];
$pnouns[6][2] = $pnouns[0][2];
$pnouns[6][3] = $pnouns[2][3];
$pnouns[6][4] = $pnouns[4][4];
$pnouns[6][5] = $pnouns[3][5];
$pnouns[6][6] = $pnouns[4][6];
$pnouns[6][7] = $pnouns[5][7];

// Tiers 7 and 8 (Hard at higher grades) reuse tier 6 (legacy alias).
$pnouns[7] = $pnouns[6];
$pnouns[8] = $pnouns[6];

// ---- Helpers (§8.4, §8.6) ----
function cpn_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
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
function cpn_pick_common(array $pool, array $exclude = []): string {
    for ($i = 0; $i < 40; $i++) {
        $w = $pool[array_rand($pool)];
        if (!in_array($w, $exclude, true)) return $w;
    }
    foreach ($pool as $w) if (!in_array($w, $exclude, true)) return $w;
    return $pool[0];
}
function cpn_pick_proper(array $pnounsTier, int $listlim, array $exclude = []): string {
    $avail = [];
    foreach ($pnounsTier as $k => $list) {
        if ($k >= 1 && $k <= $listlim) $avail = array_merge($avail, $list);
    }
    if (empty($avail)) return $exclude[0] ?? 'Manila';
    return cpn_pick_common($avail, $exclude);
}

// ---- Question builder ----
function build_cpn_question(array $nouns, array $pnouns, int $grd, string $lvl): array {
    $tier = resolve_cpn_tier($lvl, $grd);

    // Number of choices: 2 only when Easy + grade <= 1; else 4.
    $numChoices = ($lvl === 'Easy' && $grd <= 1) ? 2 : 4;

    // Which proper-noun lists are in scope at this grade (drives difficulty breadth).
    $listlim = ($grd >= 3) ? 7 : (($grd >= 1) ? 5 : 4);
    $availKeys = array_keys($pnouns[$tier] ?? []);
    if (!empty($availKeys)) $listlim = min($listlim, max($availKeys));

    // Uppercase display when Hard (any grade), or Easy at grade >= 3.
$applyUpper = ($lvl === 'Hard') || ($grd >= 3);

    // Target type
    $targetProper = (rand(1, 2) === 2);

    if ($targetProper) {
        // Answer is a proper noun; distractors are common nouns.
        $answer = cpn_pick_proper($pnouns[$tier] ?? [], $listlim);
        $distractors = [];
        for ($i = 0; $i < $numChoices - 1; $i++) {
            $distractors[] = cpn_pick_common($nouns[$tier] ?? [], array_merge([$answer], $distractors));
        }
        $qword = 'proper noun';
    } else {
        // Answer is a common noun; distractors are proper nouns.
        $answer = cpn_pick_common($nouns[$tier] ?? []);
        $distractors = [];
        for ($i = 0; $i < $numChoices - 1; $i++) {
            $distractors[] = cpn_pick_proper($pnouns[$tier] ?? [], $listlim, array_merge([$answer], $distractors));
        }
        $qword = 'common noun';
    }

    $choices = array_merge([$answer], $distractors);
    shuffle($choices);

    return [
        'choices'     => $choices,
        'answer'      => $answer,
        'qword'       => $qword,
        'numChoices'  => $numChoices,
        'applyUpper'  => $applyUpper,
        'lvl'         => $lvl,
        'tier'        => $tier,
    ];
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
    $_SESSION[$sessionKey]['current'] = build_cpn_question($nouns, $pnouns, $grd, $lvl);
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
render_header($moduleTitle.' - '.$lvl, $moduleTitle.' - '.$lvl, $theme);

$btnStyle = 'font-family:Arial,sans-serif;font-size:11pt;';
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $qwordDisp = $cur['qword'];
    if ($cur['numChoices'] == 2) {
        $nounList = "'" . $cur['choices'][0] . "' and '" . $cur['choices'][1] . "'";
        $prep = 'between the nouns';
    } else {
        $nounList = "'" . $cur['choices'][0] . "', '" . $cur['choices'][1] . "', '"
                  . $cur['choices'][2] . "', and '" . $cur['choices'][3] . "'";
        $prep = 'among the nouns';
    }
    $explanation = "The noun '" . $cur['answer'] . "' is the " . $qwordDisp . " "
                 . $prep . " " . $nounList . ".";
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php cpn_box(
      '<div style="width:100%;font-size:15pt;color:#333;line-height:1.55;">'
    . bind_last_words($explanation)
    . '</div>'
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;<?php echo $btnStyle; ?>">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Click on the <span style="color:#CC0000;text-transform:uppercase;"><?php echo htmlspecialchars($q['qword']); ?></span>.
  </div>
  <div style="font-family:Arial,sans-serif;font-size:13pt;color:#800080;max-width:480px;margin:0 auto 20px;">
    <?php echo $q['numChoices'] == 2 ? 'Pick one of the two nouns below.' : 'Pick one of the four nouns below.'; ?>
  </div>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c):
      $display = $q['applyUpper'] ? strtoupper($c) : $c;
    ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:150px;max-width:240px;min-height:64px;padding:12px 16px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($display); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;<?php echo $btnStyle; ?>">
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