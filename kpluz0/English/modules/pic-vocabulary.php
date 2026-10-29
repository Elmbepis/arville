<?php
// english/modules/pic-vocabulary.php
// STATIC image-choice + choice. Bypass QEngine per §D.
// Shows a noun image; click the word that matches. 4 choices.
//
// Levels (§E — 2-level scheme): Easy / Hard
//   Easy = legacy Easy pool per grade.
//   Hard = legacy Medium + legacy Hard merged per grade.
//   Grades: 0-1 shared, 2, 3, 4, 5, 6, 7+ shared (per legacy thresholds).
//   Structured entries (grades 3+): "answer>distractor1+distractor2<distractor3"
//   carry pre-baked distractors; grades 0-2 pick 3 random others from pool.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? 5.
// Image validation (§21): file_exists at pick-time; fallback exit if none.
//
// Theme: ex-24-* &#8594; paper-69-* per §8 fit test.
// Score box: score-*-3 (English default).
// DB row required: modules.url = 'pic-vocabulary.php'

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

$moduleTitle = 'Vocabulary Building Using Pictures';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(7, max(0, (int)($_SESSION['grade'] ?? 5)));

// Flat pools (grades 0-2): plain word arrays
$pv_flat = [
    'g01_Easy'   => ["apple","arm","ball","barn","beads","beans","bed","beef","bell","bird","boat","bone","book","boot","boy","bread","bun","bus","bush","candy","car","card","cart","cave","chair","coin","corn","crib","cup","desk","dish","door","drum","ear","elf","eye","farm","fly","foot","gate","girl","glue","gum","hat","head","hoof","hoop","ice","jar","jug","key","king","kite","lamp","mat","meat","nail","nose","nest","owl","pail","pear","roof","shoe","snake","sofa","sock","soup","sun","toad","toys","tray","twig","vase","wood","yard"],
    'g01_Hard'   => ["banana","bottle","brick","brush","bucket","butter","camera","cheek","cherry","coffee","daisy","elbow","eraser","fairy","faucet","ghost","glove","grape","ground","hammer","knife","ladder","magnet","mirror","mitten","napkin","needle","notebook","pajamas","pancake","peach","pencil","piano","pillow","potato","puppy","puppets","slipper","snail","spoon","stove","teeth","thumb","tomato","truck","wheel","beach","beard","beggar","berries","brain","cabbage","cannon","castle","caveman","cereal","cobweb","cracker","feather","guitar","handbag","kettle","lantern","mallet","mountain","noodles","prince","princess","pumpkin","rocket","scissors","shadow"],
    'g2_Easy'    => ["cobweb","crutch","hammer","island","lettuce","mailbox","mallet","manhole","muffins","necktie","pearl","pebbles","pellets","pillar","planets","popcorn","printer","roach","sailboat","sandals","scarf","shrub"],
    'g2_Hard'    => ["airplane","battery","bicycle","building","calendar","crate","handkerchiefs","jewelry","jumpsuit","kennel","keypad","laughter","lockers","magician","mermaid","nuggets","orchids","oysters","rosary","sausage","suitcase","telephone","tractor","ukulele","umbrella","violin","volcano","whiskers","wrench","wrist",
                     "anchor","astronaut","balcony","bulldozer","bullhorn","bungalow","detergent","dumplings","dumptruck","earphones","escalator","eyelashes","halloween","handcuffs","horseshoe","hourglass","landslide","lasagna","lighter","lightning","magnifier","matchsticks","mousetrap","mushrooms","mussels","newsstand","opossum","orchestra","parcel","parsley","pulley","ripples","scarecrow","serpent","shrew","weasel"],
];

// Structured pools (grades 3+): "answer>d1+d2<d3"
$pv_struct = [
    'g3_Easy' => ["alcohol>juice+vinegar<oil","allergy>fracture+sprain<bruise","billboard>lamppost+flyer<brochure","billiards>soccer+golf<ping-pong","bullhorn>alarm+whistle<shoehorn","cornhusk>coconut+abaca<corncob","daffodils>mosses+cycads<algae","furniture>vehicles+gadgets<shelter","gemstones>fossils+pebbles<marbles","gondola>sailboat+yacht<raft","grassland>desert+glacier<forest","honeycomb>nectar+anthill<cobweb","horseshoe>stirrup+buckle<saddle","hourglass>kettle+airpot<pendulum","hydrant>faucet+firehose<mailbox","hyena>lion+leopard<cheetah","junkyard>desert+jungle<backyard","landslide>typhoon+tsunami<tornado","margarine>cheese+jam<jelly","missile>bullet+engine<rifle","motorbike>motorboat+motorhome<tricycle","motorboat>motorbike+motorhome<motorcycle","orchard>orchid+orphan<orchestra","palette>pellet+fillet<parcel","pendant>earring+watch<bracelet","skink>skunk+skull<skin","telescope>telephone+periscope<television"],
    'g3_Hard' => ["ambulance>firetruck+motorhome<shuttle","amphibian>reptile+newt<salamander","antennae>horns+mandibles<antlers","appliances>applicants+applications<apprentices","boomerang>bungalow+bullhorn<binocular","calculator>computer+router<abacus","carnivore>herbivore+invertebrate<canine","cathedral>catacomb+catapult<coliseum","cauldron>chauffeur+cesspool<colander","chimney>fireplace+catacomb<catapult","corkscrew>screwdriver+drill<wrench","cosmetics>confection+jewelry<cosmonauts","detergent>alcohol+sanitizer<shampoo","earphones>megaphones+telephones<cellphones","eyelashes>eyebrows+eyelids<eyeliners","figurines>monuments+gemstones<murals","handcuffs>handkerchiefs+handsets<handlebars","handkerchiefs>towels+potholders<blankets","herbivore>carnivore+invertebrate<feline","matchsticks>matchbox+matchboard<mallet","mummified>mannequin+cremation<catacomb","quicksand>sandstorm+tsunami<lava","quintet>quintuplet+quartet<quantum","tornado>earthquake+tsunami<typhoon",
                     "acrobat>acronym+accordion<activist","apparel>parallel+carousel<minstrel","appetizer>apparition+apparel<beverage","aviary>drapery+cutlery<scenery","banister>balcony+canister<bassinet","beverages>appetizers+relishes<purees","bungalow>cardigan+flotilla<lighthouse","cardigan>cardinal+carnation<clarinet","cardinal>cardigan+clarinet<carillon","carnation>cardinal+cardigan<chameleon","coastline>peninsula+alpine<channel","drapery>aviary+cutlery<scenery","documents>diagrams+diaries<drapery","greyhound>poodle+bulldog<dalmatian","ripples>cripples+ruffles<trifles"],
    'g4_Easy' => ["airstrip>airline+airlift<airborne","announcer>magician+performer<athlete","asparagus>anchovies+coriander<artichoke","astronaut>astronomer+cosmologist<astrologer","baboon>gorilla+chimpanzee<orangutan","balcony>banister+patio<roofdeck","binocular>telescope+periscope<microscope","blowtorch>blowhorn+lighter<stove","cesspool>whirlpool+carpool<manhole","chauffeur>pilot+bodyguard<captain","chemist>botanist+zoologist<physicist","chipmunk>hedgehog+hamster<civet","crayfish>shrimp+prawn<jellyfish","crevice>mound+overhang<projection","crochet>stencil+embroidery<silkscreen","delivery>decision+delicacy<direction","dolphin>whale+shark<seal","education>employment+recreation<entertainment","escalator>elevator+stairs<conveyor","esophagus>intestine+trachea<stomach","feline>canine+bovine<avian","festivity>facility+ferocity<fallacy","hailstones>gemstones+gallstones<tombstones","hippopotamus>rhinoceros+buffao<wildebeest","jaguar>tiger+cougar<jackal","jellyfish>starfish+crayfish<moonfish","knapsack>ransack+mudpack<humpback","lasagna>spaghetti+macaroni<ravioli","locksmith>tinsmith+gunsmith<blacksmith","mannequins>manatees+manicure<ballerinas","microscope>telescope+periscope<horoscope","mushrooms>mosses+ferns<cycads","mussels>oysters+clams<lobsters","orchids>herbs+shrubs<ferns","referee>prisoner+warden<arbiter","scooter>bicycle+pedicab<tricycle","sheriff>firefighter+general<admiral","syringe>dropper+thermometer<pipette","tsunami>tornado+avalanche<cyclone"],
    'g4_Hard' => ["aardvark>armadillo+platypus<pangolin","adhesives>abrasives+explosives<sedatives","avalanche>tsunami+cyclone<tornado","barbarian>knight+crusader<caveman","collision>combustion+explosion<congestion","explosion>excursion+expansion<expression","gargoyles>dragons+satyrs<cyclopes","garland>pendant+drapery<medallion","gearbox>engine+motor<generator","generator>motor+engine<transformer","hitchhiker>vagrant+commuter<sprinter","incubator>intubator+ventilator<defibrillator","lubricant>mendicant+supplicant<applicant","magnifier>amplifier+quantifier<intensifier","microchip>battery+microcomputer<conductor","millstone>milestone+lodestone<headstone","mollusks>arachnids+crustaceans<echinoderms","mosaic>origami+collage<montage","motorcade>flotilla+cavalry<cavalcade","opossum>skunk+raccoon<badger","oregano>basil+rosemary<lemongrass","outrigger>anchor+rafter<caravel","periscope>telescope+microscope<endoscope","pollution>pollination+population<polarization","vagrant>flagrant+migrant<hydrant","weasel>opposum+badger<raccoon",
                     "anchovies>groupers+tunas<mackerels","arachnid>insect+crustacean<mollusc","bassinet>barricade+canister<conveyor","bistro>cauldron+vestry<podium","budgerigar>canary+sparrow<macaw","civet>ferret+otter<opposum","coriander>colander+cauldron<coleslaw","coronation>domination+nomination<divination","dandelion>carnation+cycad<daffodil","hedgehog>lemming+hamster<chipmunk","hexagonal>pentagonal+heptagonal<octagonal","hyacinth>labyrinth+amethyst<coriander","impala>elk+moose<wildebeest","irrigator>navigator+litigator<irritator","labyrinth>hyacinth+megalith<catacomb","mandrill>baboon+chimpanzee<orangutan","marigold>marmoset+marmalade<marionette","marionette>marmoset+marmalade<marigold","marsupial>ruminant+monotreme<marmoset","mongoose>marmoset+badger<weasel","octagonal>hexagonal+heptagonal<pentagonal","odometer>hydrometer+thermometer<speedometer","wildebeest>peccary+oryx<bison"],
    'g5_Easy' => ["adhesives>abrasives+explosives<sedatives","aerobics>aerobatics+acrobatics<aeronautics","aerosol>aerolith+aerofoil<aeronaut","ammunition>admonition+premonition<ignition","anchovies>groupers+tunas<mackerels","artillery>distillery+artery<amiability","avalanche>tsunami+cyclone<tornado","barricade>barrister+ambuscade<cavalcade","canister>canistel+banister<sinister","chandelier>chandelle+chandler<sommelier","collision>combustion+explosion<congestion","coronation>domination+nomination<divination","excursion>exclusion+exertion<expulsion","explosion>excursion+expansion<expression","fledgling>hatchling+fingerling<cageling","gluttony>felony+acrimony<alimony","hypnotist>thespian+alchemist<sorcerer","infirmary>apothecary+commissary<sanctuary","irrigator>navigator+litigator<irritator","lubricant>mendicant+supplicant<applicant","metronome>oscilloscope+aerodrome<pendulum","pollution>pollination+population<polarization","sasquatch>orangutan+centaur<werewolf","scaffolding>manifolding+upholding<withholding","spectacles>receptacles+debacles<pinnacles","vagrant>flagrant+migrant<hydrant","wildebeest>peccary+oryx<bison"],
    'g5_Hard' => ["abalone>scallop+nudibranch<isopod","aborigine>neanderthal+immigrant<mendicant","antarctic>pacific+equatorial<tropical","apparition>apparatus+apparel<attrition","bacterium>virus+amoeba<plankton","barnacles>scallops+anemones<oysters","buttress>fortress+louver<corrugation","cataract>gingivitis+myopia<vitiligo","contortionist>acrobat+anorexic<anatomist","fuselage>cockpit+fusillade<chassis","glacier>tundra+estuary<fjord","mausoleum>catacomb+columbarium<mortuary","peccary>antelope+aardvark<pangolin","precipice>carapace+abyss<canyon","precipitation>condensation+sublimation<deposition","presentation>presumption+preservation<prescription","promenade>precipice+marinade<sommelier","recreation>reception+resolution<reclamation","stalactites>stalagmites+staurolites<scolecites","stalagmites>stalactites+staurolites<scolecites",
                     "abrasive>adhesive+abusive<obtrusive","aqueduct>aquifer+aquacade<viaduct","capybara>chinchilla+hedgehog<peccary","catacomb>catapult+catalyst<cataract","catapult>catacomb+catalyst<cataract","chinchilla>capybara+hedgehog<shrew","corrugated>dessicated+coagulated<delaminated","filament>resistor+louver<fuselage","louver>dowel+fuselage<corrugation","megaliths>paleoliths+microliths<neoliths","ocelot>jaguar+lynx<civet","procession>concession+recession<intercession","viaduct>aeroduct+aqueduct<oviduct"],
    'g6_Easy' => ["abalone>scallop+nudibranch<isopod","aborigine>neanderthal+immigrant<mendicant","abrasive>adhesive+abusive<obtrusive","antarctic>pacific+equatorial<tropical","apparition>apparatus+apparel<attrition","aqueduct>aquifer+aquacade<viaduct","artichoke>asparagus+chamomile<ginseng","bacterium>virus+amoeba<plankton","barnacles>scallops+anemones<oysters","buttress>fortress+louver<corrugation","capybara>chinchilla+hedgehog<peccary","catacomb>catapult+catalyst<cataract","catapult>catacomb+catalyst<cataract","cataract>gingivitis+myopia<vitiligo","chinchilla>squirrel+hedgehog<shrew","contortionist>acrobat+anorexic<anatomist","corrugated>dessicated+coagulated<delaminated","filament>resistor+louver<fuselage","fuselage>cockpit+fusillade<chassis","glacier>tundra+estuary<fjord","louver>dowel+fuselage<corrugation","megaliths>paleoliths+microliths<neoliths","ocelot>jaguar+lynx<civet","peccary>antelope+aardvark<pangolin","precipice>carapace+abyss<canyon","precipitation>condensation+sublimation<deposition","presentation>presumption+preservation<prescription","procession>concession+recession<intercession","promenade>precipice+marinade<sommelier","recreation>reception+resolution<reclamation","refrigeration>refraction+reflection<reformation","stalactites>stalagmites+staurolites<scolecites","stalagmites>stalactites+staurolites<scolecites","viaduct>aeroduct+aqueduct<oviduct"],
    'g6_Hard' => ["anorexic>dyslexic+lethargic<diabetic","arboreal>alpine+estuarine<arctic","arboretum>aviary+marshland<savanna","armadillo>aardvark+platypus<anteater","bobolink>raven+roadrunner<cassowary","cockatoo>macaw+hornbill<flamingo","conveyor>escalator+converter<surveyor","corpulent>corporal+opulent<turbulent","distortion>extortion+apportion<assertion","flamingo>cassowary+cockatoo<hornbill","flotilla>cavalcade+flotsam<caravan","marmoset>mandrill+sloth<koala","mendicant>mentalist+supplicant<predicant","nocturnal>arboreal+diurnal<alpine","pelican>heron+hornbill<flamingo","predation>probation+gestation<deflation","ungulate>marsupial+monotreme<arboreal",
                     "aeration>gyration+hydration<filtration","amethyst>sapphire+ruby<emerald","annelid>crustacean+echinoderm<mollusk","basilisk>iguana+gecko<monitor","cassowary>kiwi+flamingo<cockatoo","estuary>fjord+butte<peninsula","fjord>butte+peninsula<tundra","herpetologist>entomologist+ichthyologist<archaeologist","ichthyologist>entomologist+herpetologist<archaeologist","hydraulic>pneumatic+metabolic<parabolic","savanna>tundra+arboretum<estuary","thespians>morticians+utopians<arcadians","transformer>transistor+conformer<transporter","transpiration>hydration+saturation<respiration","tundra>savanna+estuary<glacier"],
    'g7_Easy' => ["aeration>gyration+hydration<filtration","amethyst>sapphire+ruby<emerald","annelid>crustacean+echinoderm<mollusk","anorexic>dyslexic+lethargic<diabetic","arboreal>alpine+estuarine<arctic","arboretum>aviary+marshland<savanna","armadillo>aardvark+platypus<anteater","basilisk>iguana+gecko<monitor","bobolink>raven+roadrunner<cassowary","cassowary>kiwi+flamingo<cockatoo","cockatoo>macaw+hornbill<flamingo","conveyor>escalator+converter<surveyor","corpulent>corporal+opulent<turbulent","demarcation>altercation+unification<truncation","demolition>decomposition+demarcation<ramification","distortion>extortion+apportion<assertion","erosion>aeration+corrosion<implosion","estuary>fjord+butte<peninsula","flamingo>cassowary+cockatoo<hornbill","herpetologist>entomologist+ichthyologist<archaeologist","hydraulic>pneumatic+metabolic<parabolic","insulation>instigation+insinuation<insolation","meditation>medication+salutation<exultation","mendicant>mentalist+supplicant<predicant","nocturnal>arboreal+diurnal<alpine","paleontology>entomology+ichthyology<herpetology","parliament>atonement+endowment<tenement","pelican>heron+hornbill<flamingo","predation>probation+gestation<deflation","propulsion>proportion+profusion<projection","receptacle>spectacle+obstacle<pinnacle","refraction>reflection+diffraction<absorption","submersion>conversion+aversion<subversion","refrigeration>refraction+reflection<reformation","retrieval>reprieval+deprival<revival","savanna>tundra+arboretum<estuary","swashbuckler>cavalier+crusader<straggler","thespians>morticians+utopians<arcadians","transformer>transistor+conformer<transporter","transpiration>hydration+saturation<respiration","troubadour>knight+serf<friar","tundra>savanna+estuary<glacier","ungulate>marsupial+monotreme<arboreal"],
    'g7_Hard' => ["acoustics>aesthetics+kinematics<semantics","appendage>appendix+cartilage<plumage","archaeologist>etymologist+seismologist<morphologist","archaeology>gerontology+histology<chronology","automation>specialization+augmentation<restoration","biodegradation>stratification+segregation<transfiguration","condensation>evaporation+precipitation<sublimation","confection>convection+conflation<confliction","congestion>ingestion+convention<combustion","convention>convection+circumvention<contravention","corrosion>infection+corrasion<abrasion","crystallization>nebulization+polymerization<quantization","deflection>deflation+defamation<deflagration","disembarkation>disenchantment+disintegration<disorientation","denudation>sedimentation+implantation<contamination","distillery>drysaltery+creamery<stationery","entanglement>abutment+encasement<attachment","exhumation>cremation+reclamation<decimation","oscillation>attenuation+modulation<amplification","pasteurization>inoculation+vacillation<sanitization","percussion>concussion+occlusion<percolation","reconnaissance>obeisance+complaisance<connivance","seismology>hydrology+volcanology<archaeology",
                     "atomization>ionization+anodization<fluidization","attenuation>oscillation+modulation<amplification","bifurcation>brachiation+brecciation<blastulation","brachiation>bifurcation+brecciation<blastulation","cavitation>coagulation+compaction<conflagration","coagulation>cavitation+compaction<conflagration","compaction>cavitation+coagulation<conflagration","conflagration>cavitation+implosion<coagulation","cormorant>pelican+osprey<egret","decrepit>ostentatious+exorbitant<humongous","defoliation>delamination+desiccation<petrification","delamination>defoliation+desiccation<petrification","desiccant>emulsifier+catalyst<solute","desiccation>defoliation+delamination<petrification","diffraction>refraction+reflection<absorption","elasticity>spasticity+plasticity<viscosity","emaciated>annunciated+emancipated<enunciated","emulsifier>catalyst+enzyme<dessicant","gastropod>diplopod+cephalopod<monopod","mitochondrion>centriole+nucleolus<vacuole","oscilloscope>electroscope+spectroscope<iconoscope","petrification>defoliation+desiccation<delamination","stoichiometry>calorimetry+gravimetry<actinometry","stratification>delamination+desiccation<emulsification","thermodynamics>chromodynamics+electrodynamics<hemodynamics"],
];

// Resolve pool for current (gradeKey, level)
if ($grd <= 1) $gradeKey = 0;
elseif ($grd >= 7) $gradeKey = 7;
else $gradeKey = $grd;

$useStructured = ($gradeKey >= 3);

if ($gradeKey === 0) {
    $rawPool = $pv_flat['g01_' . $lvl];
} elseif ($gradeKey === 2) {
    $rawPool = $pv_flat['g2_' . $lvl];
} else {
    $rawPool = $pv_struct['g' . $gradeKey . '_' . $lvl];
}

// Parse structured entries
function pv_parse_entry($entry) {
    $p1 = strpos($entry, '>');
    $p2 = strpos($entry, '+');
    $p3 = strpos($entry, '<');
    if ($p1 === false || $p2 === false || $p3 === false) return null;
    $ans = substr($entry, 0, $p1);
    $d1  = substr($entry, $p1 + 1, $p2 - $p1 - 1);
    $d2  = substr($entry, $p2 + 1, $p3 - $p2 - 1);
    $d3  = substr($entry, $p3 + 1);
    if ($ans === '' || $d1 === '' || $d2 === '' || $d3 === '') return null;
    return ['answer' => $ans, 'd1' => $d1, 'd2' => $d2, 'd3' => $d3];
}

$imgDirFs = __DIR__ . '/../../english/images/nouns/';

function pv_pick($rawPool, $useStructured, $imgDirFs) {
    $candidates = [];
    if ($useStructured) {
        foreach ($rawPool as $entry) {
            $parsed = pv_parse_entry($entry);
            if ($parsed === null) continue;
            if (!file_exists($imgDirFs . $parsed['answer'] . '.jpg')) continue;
            $candidates[] = $parsed;
        }
    } else {
        foreach ($rawPool as $w) {
            if (file_exists($imgDirFs . $w . '.jpg')) {
                $candidates[] = $w;
            }
        }
    }
    if (empty($candidates)) return null;
    return $candidates[array_rand($candidates)];
}

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
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

// ============================================================
// THEME (hoisted for "Temporarily unavailable" path)
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

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $pick = pv_pick($rawPool, $useStructured, $imgDirFs);
    if ($pick === null) {
        render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
        echo '<p style="text-align:center; font-size:16pt; margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    if ($useStructured) {
        $answer = $pick['answer'];
        $choices = [$pick['answer'], $pick['d1'], $pick['d2'], $pick['d3']];
    } else {
        $answer = $pick;
        // 3 random other words from the pool (validated for file_exists)
        $valid = [];
        foreach ($rawPool as $w) {
            if ($w !== $answer && file_exists($imgDirFs . $w . '.jpg')) $valid[] = $w;
        }
        $valid = array_values(array_unique($valid));
        shuffle($valid);
        $distractors = array_slice($valid, 0, 3);
        // Pad if pool too small
        while (count($distractors) < 3 && count($valid) > 0) {
            $distractors[] = $valid[array_rand($valid)];
        }
        $distractors = array_values(array_unique($distractors));
        while (count($distractors) < 3) $distractors[] = $answer . 'z' . count($distractors);
        $choices = array_merge([$answer], array_slice($distractors, 0, 3));
    }

    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'image'   => $base . '/english/images/nouns/' . $answer . '.jpg',
        'answer'  => $answer,
        'choices' => $choices,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .pv-word-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 200px;
    min-height: 56px;
    padding: 12px 20px;
    background: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: 'Comic Sans MS', Arial, sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .pv-word-btn:hover { background: #f8f8ff; border-color: #8080ff; }
  .pv-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
    max-width: 620px;
  }
  .pv-grid-1col {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  @media (max-width: 820px) {
    .pv-word-btn { min-width: 140px; min-height: 48px; font-size: 1rem; padding: 10px 14px; }
    .pv-grid-2x2 { gap: 10px 14px; }
  }
</style>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>
    <p style="font-size:14pt; color:#800080; margin-top:15px;">
        The picture shown corresponds to the word <strong style="color:#CC0066;">'<?php echo htmlspecialchars($cur['answer']); ?>'</strong>.
    </p>
    <img src="<?php echo htmlspecialchars($cur['image']); ?>"
         alt="<?php echo htmlspecialchars($cur['answer']); ?>"
         style="display:block; max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px auto 40px;"
         onerror="this.style.display='none';">
    <input type="submit" name="Submit2" value="New Question" style="margin:0 0 30px;">
<?php else: ?>
    <img src="<?php echo htmlspecialchars($q['image']); ?>"
         alt=""
         style="max-width:280px; border:1px solid #ccc; border-radius:6px; margin:15px 0;"
         onerror="this.style.display='none';">
    <p style="font-size:16pt; color:#800080; margin-top:15px;">
        Click on the word that corresponds to the picture shown.
    </p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use1col = ($maxLen > 20);
        $use2x2  = (!$use1col && $maxLen >= 5);
        $containerClass = $use1col ? 'pv-grid-1col' : 'pv-grid-2x2';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="pv-word-btn">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <br/><input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
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