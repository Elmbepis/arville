<?php
// english/modules/text-types.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a text passage; student clicks its text type / text structure.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Medium" with no level radios in the
//   HTML. Collapsed to $lvl='Hard' (single-level Medium&#8594;Hard mapping
//   preserves the legacy 2-point value). No selector rendered.
//
// Grade-keyed content (§10) — two distinct banks:
//   grd 0-4 &#8594; 17 questions testing basic text types
//             (descriptive / instructional / argumentative / expository / narrative)
//   grd 5+  &#8594; 16 questions testing text structures
//             (explanation / time order / classification / enumeration)
//   Both banks preserved verbatim from legacy.
//
// Bank format: "<passage>=<answer>[<d1>+<d2>]<d3>"
// Some passages contain <br> markup for structural paragraph breaks;
// preserved in question display via tt_render_passage() which escapes
// everything except <br> tags.
//
// HTML entity in advanced Q11 ("Sergio Osmeña Sr.") converted to UTF-8
// literal ñ for clean htmlspecialchars round-trip.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'text-types.php'

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

$moduleTitle = 'Identifying Text Types';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);

$lvl = 'Hard';   // single-level collapse (§5) — legacy was Medium/2pts

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Bank: Basic (grades 0-4) — text TYPES
// ============================================================
$bankBasic = [
    "Revered in times past as a sign of good fortune, this scarab is beautiful. An inch long and an inch wide, this beetle features a deep cobalt blue body, blue and white Austrian Crystal wings, and golden accents. It would look fabulous on your favorite jacket.=descriptive[argumentative+expository]instructional",
    "To make your homemade slime, start by preparing water, white glue, borax and a few drops of food coloring. In a medium bowl, mix 1/2 cup of glue and 1/2 cup of water. Add food coloring to enhance your slime's appearance. Afterwards, in a small bowl, mix 1 teaspoon of borax with a cup of water. Stir until the borax is dissolved. Lastly, add the glue mixture to the borax solution, stirring slowly. When the slime begins to set, you will need to knead it by hand until it gets less sticky.=instructional[argumentative+narrative]descriptive",
    "Owning a pet from the pound or an animal rescue center has many advantages. First of all, a child feels good about rescuing an abandoned or abused animal and giving it a whole new life. Besides, if the animals from the pound aren't adopted right away, they might be put to sleep. But, having a pet also means lots of responsibilities. A child has to feed, clean up after, brush, and exercise the pet. Therefore, thought should really be given in adopting as there are pros and cons.=argumentative[narrative+descriptive]instructional",
    "The big grey castle stood on the top of the hill. It had a huge wooden door and two towers with red flags flying in the wind. In front of the door was a guard with a sharp sword.=descriptive[argumentative+expository]instructional",
    "In preparing your light berry swirl cheesecake, start by mixing together the crushed shortbread and melted butter and press into the base of a deep sided 20 cm x 30 cm lined baking pan, chill while preparing the filling. Beat together the cream cheese and labneh in a large bowl. Add condensed milk, eggs, corn flour, vanilla and lemon rind and beat until smooth.=instructional[narrative+descriptive]argumentative",
    "The coronavirus disease (COVID-19) is an infectious disease caused by a new strain of coronavirus. This new virus and disease were unknown before the outbreak began in Wuhan, China, in December 2019. On 30 January 2020, the Philippine Department of Health reported the first case of COVID-19 in the country with a 38-year-old female Chinese national. On March 7, the first local transmission of COVID-19 was confirmed. WHO is working closely with the Department of Health in responding to the COVID-19 outbreak. (World Health Organization on COVID-19).=expository[narrative+descriptive]argumentative",
    "Do you prefer chocolate or strawberry milk to regular milk? If so, you need to be aware that some educators and health experts want to stop school cafeterias from providing chocolate or other-flavored milk to students. The article 'Chocolate Milk in School Cafeterias?' explains that this group of people are concerned that the extra sugar added to chocolate milk, or other flavored milk, is unhealthy. While excess sugar is certainly unhealthy, I think it would be unwise to take chocolate milk out of cafeterias. The result of taking chocolate, or other flavored milk, out of the cafeterias would be worse than the little bit of extra sugar kids consume.=argumentative[narrative+descriptive]instructional",
    "Proper washing of hands is necessary. First, you must wet your hands with clean, running water. Then, lather your hands by rubbing them together with soap. Scrub your hands for at least 20 seconds. Then, rinse your hands well under clean, running water. Lastly, dry your hands using a clean, dry towel.=instructional[argumentative+narrative]descriptive",
    "My grandfather is old enough, around 70 years old. He weighs 67 kilos and 168 cms. He has short black hair and brown eyes. He doesn't have any moustache and beard, but he has two mole on his cheek. His skin is dark brown. My grandfather doesn't work anymore. He retired from being a police and now runs a small business at home.=descriptive[argumentative+expository]instructional",
    "To make your own homemade coconut oil lip balm, you only need 1 tbsp. each of coconut oil, carnauba wax, and olive oil. To prepare it, heat the coconut oil, beeswax, and olive oil together in a double boiler over low heat. Afterward, melt oils and wax together. Lastly, mix the mixture well and pour into your storage container.=instructional[narrative+argumentative]descriptive",
    "Just then, Goldilocks woke up. She saw the three bears. She screamed, \"Help!\" And she jumped up and ran out of the room. Goldilocks ran down the stairs, opened the door, and ran away into the forest. She never returned to the home of the three bears.=narrative[instructional+argumentative]expository",
    "Metamorphosis is a process by which animals undergo extreme, rapid physical changes some time after birth. The result of metamorphosis may be change to the organism's entire body plan, such as a change in the animal's number of legs, its means of eating, or its means of breathing. Commonly known examples of metamorphosis include the process undergone by most insects, and the transformation of tadpoles into frogs.=expository[narrative+instructional]argumentative",
    "There seems to be a lot of talk these days about what is fair, and what is not. Some of the 99% seem to believe life has treated them unfairly, and some 1% feel life hasn't treated them fairly enough. In some cases, people have overcome poverty, drug addiction, incarceration, abuse, divorce, mental illness, victimization, and more. But, they chose to overcome the odds. But on the other hand, there are some cases where people are born into rich families but ended up destitute. Maybe, fair is not an objective term, it may be a matter of perspective filtered by a subjective assessment.=argumentative[narrative+descriptive]instructional",
    "To tie a simple tie knot, you must first put the wide end of the tie under the thinner one. Then, pass it over to the right side. Afterwards, pass it through the big loop, and then through the central wrap. Bring it out completely. Lastly, tighten by sliding up the knot to the collar.=instructional[descriptive+narrative]argumentative",
    "Sweating is a bodily function that helps regulate your body temperature. Also called perspiration, sweating is the release of a salt-based fluid from your sweat glands. Changes in your body temperature, the outside temperature, or your emotional state can cause sweating. The most common areas of sweating on the body include: armpits, face, palms of the hands, and soles of the feet. Sweating in normal amounts is an essential bodily process.=expository[narrative+descriptive]argumentative",
    "Ghost stories have long been a popular form of entertainment. But, entertaining as ghost stories are, do ghost themselves really exist? According to a 2001 Gallop poll, 28 percent of Americans would say yes. They believe that the spirits of dead people do indeed walk among the living here on Earth. Others, however, argue that no solid proof of ghosts' existence has ever been found. They support their argument by pointing out that ghosts seldom appear to those who do not already believe in their existence.=argumentative[narrative+descriptive]instructional",
    "To make a pancake, start by sieving some flour into a bowl. Then, crack an egg into it. Add some milk into the mixture, then beat it with a whisk. Afterwards, pour the mixture into a frying pan, and cook the pancake until golden brown.=instructional[narrative+descriptive]argumentative",
];

// ============================================================
// Bank: Advanced (grades 5+) — text STRUCTURES
// ============================================================
$bankAdvanced = [
    "The surface of the Earth is divided into pieces called 'tectonic plates.' These plates move. When the plates rub against each other, they do not move smoothly. When the plates do not move smoothly, earthquakes result. Some parts of the world get more earthquakes than other parts. The parts of the earth that get most earthquakes are near the edges of these plates.=explanation[time order+classification]enumeration",
    "To make your homemade slime, start by preparing water, white glue, borax and a few drops of food coloring. Next, mix 1/2 cup of glue and 1/2 cup of water in a medium bowl. Then, add food coloring to enhance your slime's appearance. Afterwards, in a small bowl, mix 1 teaspoon of borax with a cup of water. Stir until the borax is dissolved. Lastly, add the glue mixture to the borax solution, stirring slowly. When the slime begins to set, you will need to knead it by hand until it gets less sticky.=time order[explanation+classification]enumeration",
    "In the United States, schools may be classified into four types: public, private religious, private non-religious, or alternative. Public schools are funded by the state while private schools aren't. Private religious schools are based around a particular faith, such as Catholicism. Private non-religious schools are private schools that are not organized around a religion. Alternative schools include technical schools and those that have special education programs.=classification[explanation+time order]enumeration",
    "All changes in matter may classified as either chemical or physical.<br><br>Physical changes are those that do not change the identity of the matter. For example, ice melting into liquid water is just a physical change.<br><br>Chemical changes, on the other hand, turn matter into another kind of matter with different properties. The rusting of iron and the cooking of an egg are examples of chemical changes.=classification[explanation+time order]enumeration",
    "The coronavirus disease (COVID-19) is an infectious disease caused by a new strain of coronavirus. This new virus and disease were unknown before the outbreak began in Wuhan, China, in December 2019. On 30 January 2020, the Philippine Department of Health reported the first case of COVID-19 in the country with a 38-year-old female Chinese national. On March 7, the first local transmission of COVID-19 was confirmed. WHO is working closely with the Department of Health in responding to the COVID-19 outbreak. (World Health Organization on COVID-19).=explanation[time order+classification]enumeration",
    "There are five kinds of vertebrates: mammals, birds, fishes, reptiles, and amphibians. Mammals are vertebrates with hair or fur while birds are vertebrates with feathers. Reptiles are vertebrates with dry scales while amphibians are vertebrates with moist skin. Fishes are vertebrates that live wholly in water.=classification[explanation+time order]enumeration",
    "Do you know what causes a volcanic eruption? Beneath a volcano is a large pool of liquid rock called a magma chamber. It is called a magma chamber because the molten rock is called magma. Because a magma chamber is hot and surrounded by rock, it is under great pressure. Given enough time, that pressure can gradually fracture the rock around it, creating a way for the magma to move upward. If magma finds its way to the surface of the earth, then the result will be a volcanic eruption.=explanation[time order+classification]enumeration",
    "Proper washing of hands is necessary. First, you must wet your hands with clean, running water. Then, lather your hands by rubbing them together with soap. Scrub your hands for at least 20 seconds. Then, rinse your hands well under clean, running water. Lastly, dry your hands using a clean, dry towel.=time order[explanation+classification]enumeration",
    "Do you know how to plants seeds? First, prepare the plot for planting. Next, dig holes in it that are one meter apart from each other. Then, drop a seed in each hole and cover it with soil. Lastly, water the seeds every day. Before long, you'll see some plants sprouting.=time order[explanation+classification]enumeration",
    "Water habitats include seas and oceans, lakes and ponds, rivers and streams, marshes, swamps, bogs, brackish water bodies, and wetlands.=enumeration[explanation+classification]time order",
    "The past presidents of the Philippines are Emilio Aguinaldo, Manuel L. Quezon, Jose P. Laurel, Sergio Osmeña Sr., Manuel Roxas, Elpidio Quirino, Ramon Magsaysay, Carlos P. Garcia, Diosdado P. Macapagal, Ferdinand Marcos, Corazon Aquino, Fidel V. Ramos, Joseph Estrada, Gloria Macapagal Arroyo, and Benigno Aquino III.=enumeration[explanation+classification]time order",
    "Metamorphosis is a process by which animals undergo extreme, rapid physical changes some time after birth. The result of metamorphosis may be change to the organism's entire body plan, such as a change in the animal's number of legs, its means of eating, or its means of breathing. Commonly known examples of metamorphosis include the process undergone by most insects, and the transformation of tadpoles into frogs.=explanation[time order+classification]enumeration",
    "Indonesia, Malaysia, Singapore, Thailand, Brunei, Vietnam, Laos, Myanmar, Cambodia, and the Philippines are the member nations of ASEAN.=enumeration[explanation+classification]time order",
    "To tie a simple tie knot, you must first put the wide end of the tie under the thinner one. Then, pass it over to the right side. Afterwards, pass it through the big loop, and then through the central wrap. Bring it out completely. Lastly, tighten by sliding up the knot to the collar.=time order[explanation+classification]enumeration",
    "Sweating is a bodily function that helps regulate your body temperature. Also called perspiration, sweating is the release of a salt-based fluid from your sweat glands. Changes in your body temperature, the outside temperature, or your emotional state can cause sweating. Sweating in normal amounts is an essential bodily process.=explanation[time order+classification]enumeration",
    "To make a pancake, start by sieving some flour into a bowl. Then, crack an egg into it. Add some milk into the mixture, then beat it with a whisk. Afterwards, pour the mixture into a frying pan, and cook the pancake until golden brown.=time order[explanation+classification]enumeration",
];

// ============================================================
// Helpers
// ============================================================
function tt_parse($entry) {
    $p0 = strpos($entry, '=');
    if ($p0 === false) return null;
    $p1 = strpos($entry, '[', $p0);
    $p2 = strpos($entry, '+', $p1 === false ? 0 : $p1);
    $p3 = strpos($entry, ']', $p2 === false ? 0 : $p2);
    if ($p1 === false || $p2 === false || $p3 === false) return null;
    $passage = trim(substr($entry, 0, $p0));
    $answer  = trim(substr($entry, $p0 + 1, $p1 - $p0 - 1));
    $d1      = trim(substr($entry, $p1 + 1, $p2 - $p1 - 1));
    $d2      = trim(substr($entry, $p2 + 1, $p3 - $p2 - 1));
    $d3      = trim(substr($entry, $p3 + 1));
    if ($passage === '' || $answer === '') return null;
    return [
        'passage' => $passage,
        'answer'  => $answer,
        'd1'      => $d1,
        'd2'      => $d2,
        'd3'      => $d3,
    ];
}

function tt_render_passage($raw) {
    // Collapse source-code whitespace, escape everything, then restore <br>
    $s = preg_replace('/\s+/', ' ', trim($raw));
    $s = htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
    return preg_replace('/&lt;br\s*\/?&gt;/i', '<br>', $s);
}

// ============================================================
// Handle answer click
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
// Theme
// ============================================================
$theme = [
    'top_banner'    => $base . '/english/images/ex-27-top.jpg',
    'title_bg'      => $base . '/english/images/ex-27-top2.jpg',
    'left_side'     => $base . '/english/images/ex-27-left.jpg',
    'right_side'    => $base . '/english/images/ex-27-right.jpg',
    'content_bg'    => $base . '/english/images/ex-27-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-27-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// Generate
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $useAdvanced = ($grd >= 5);
    $pool        = $useAdvanced ? $bankAdvanced : $bankBasic;
    $poolKey     = $useAdvanced ? 'used_advanced' : 'used_basic';

    $used = $_SESSION[$sessionKey][$poolKey] ?? [];

    $avail = [];
    foreach ($pool as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        if (tt_parse($entry) === null) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($pool as $i => $entry) {
            if (tt_parse($entry) !== null) $avail[] = $i;
        }
    }
    if (empty($avail)) {
        render_header($moduleTitle, $moduleTitle, $theme);
        echo '<p style="text-align:center;font-size:16pt;margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey][$poolKey] = $used;

    $parsed = tt_parse($pool[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'passage' => $parsed['passage'],
        'answer'  => $parsed['answer'],
        'choices' => $choices,
        'lvl'     => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .tt-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 20px 26px;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.1rem;
    font-weight: 500;
    color: #333;
    line-height: 1.6;
    text-align: center;
    box-sizing: border-box;
  }
  .tt-card.tt-feedback { font-size: 1.1rem; }
  .tt-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 40px auto 22px;
    line-height: 1.5;
  }
  .tt-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.05rem;
    color: #800080;
    text-align: center;
    margin: 24px auto 6px;
  }
  .tt-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .tt-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 60px;
    padding: 12px 16px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .tt-choice:hover { background: #eef; border-color: #8080ff; }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <div class="tt-card tt-feedback">
        <?php echo tt_render_passage($cur['passage']); ?>
        <br><br>
        <span style="color:#800080; font-weight:700;">Text type:</span>
        <strong style="color:#CC0066; font-weight:700;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <div class="tt-card"><?php echo tt_render_passage($q['passage']); ?></div>

    <p class="tt-prompt">Click on the type of text shown above.</p>

    <div class="tt-grid-2x2">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="tt-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();