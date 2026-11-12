<?php
// english/modules/text-types-factual.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a factual text passage; student clicks its text structure.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// 33 questions preserved verbatim. Each passage demonstrates one of five
// text structures: descriptive, cause and effect, comparison and contrast,
// sequential, problem and solution.
//
// Data hygiene: legacy bank entries ended with a trailing newline before
// the closing quote; the last distractor (choice[3]) carried "\n" into the
// rendered href — harmless in legacy (only affected a wrong-answer button)
// but sloppy. Modern parser trims every component.
//
// Paragraph breaks (<br/><br/>) inside some passages (Q13, Q18, Q19, Q21,
// Q23, Q24, Q26, Q27, Q29, Q30, Q31, Q33) preserved via whitelist render —
// everything escaped, then only <br>, <br/>, <br /> restored.
//
// Font sizing matches journalistic-writing.php reference:
//   prompt 1.35rem · question card 1.35rem · feedback card 1.25rem
//   hint 1.2rem · choice buttons 1.25rem
//   "Your answer is" 14pt · verdict 16pt (inline, unchanged)
//
// Choice layout (§14): maxLen &#8804; 17 &#8594; 2×2 grid; else 1-col hug.
// All 33 questions route to 1-col since "comparison and contrast" (23) or
// "problem and solution" (20) appears in every choice set.
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
// (Not used for content selection — single-pool module.)
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'text-types-factual.php'

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

$moduleTitle = 'Identifying Factual Text Types';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Question bank: "passage=answer[d1+d2]d3"
// Entries end with a trailing newline before the closing quote — trimmed
// by the parser.
// ============================================================
$bank = [
    "A mammal is an animal that breathes air, has a backbone, and grows hair at some point during its life. In addition, all female mammals have glands that can produce milk. Mammals are among the most intelligent of all living creatures. Mammals include a wide variety of animals, from cats to humans to whales. There are more than 5,000 species, or kinds, of living mammal.=descriptive[sequential+cause and effect]problem and solution",
    "The surface of the Earth is divided into pieces called 'tectonic plates.' These plates move. When the plates rub against each other, they do not move smoothly. When the plates do not move smoothly, earthquakes result. Some parts of the world get more earthquakes than other parts. The parts of the earth that get most earthquakes are near the edges of these plates.=cause and effect[comparison and contrast+descriptive]problem and solution",
    "All matter can be changed in two ways: chemically and physically. Physical changes are those that do not change the identity of the matter. For example, ice melting into liquid water is just a physical change. Chemical changes, on the other hand, turn matter into another kind of matter with different properties. The rusting of iron and the cooking of an egg are examples of chemical changes.=comparison and contrast[descriptive+problem and solution]sequential",
    "Before applying the screen protector, clean the surface of your phone's screen with a soft cloth. Once the surface of your screen is clean, remove the paper backing on the screen protector. Evenly apply the sticky side of the screen protector to your phone's screen. Smooth out any air bubble trapped in between the protector and the phone screen. Enjoy the added protection.=sequential[problem and solution+cause and effect]descriptive",
    "Some countries, such as Japan, experience a lot of earthquakes. In these places, it is good practice to design and build houses and buildings in a way that will prevent them from collapsing when there is an earthquake. This is called seismic design or 'earthquake-proofing'.=problem and solution[sequential+descriptive]cause and effect",
    "Dinosaurs existed during the Mesozoic Era, about 250 million years ago to 65 million years ago. This era consists of three periods known as the Triassic, Jurassic, and Cretaceous periods. During the Triassic period, all the continents were united to form one huge land mass known as Pangaea. After this came the Jurassic period where the continents began shifting apart. The Cretaceous period was the last period in which dinosaurs lived. During this period, the continents fully separated except for Australia and Antarctica.=sequential[comparison and contrast+problem and solution]cause and effect",
    "When I got home from school after a long boring day, I took out the peanut butter, jelly, and bread. After taking the lid off of the jars, I spread the peanut butter on one side of the bread and the jelly on the other, and then I put the two pieces of bread together. After that, I enjoyed it while watching 'Cops' on the TV. I swear, that was the best peanut butter and jelly sandwich I ever ate.=sequential[problem and solution+descriptive]comparison and contrast",
    "Avalanches occur when a lot of snow falls from a mountain. They are dangerous because they may bury people under them. If the people are not found rapidly enough by rescue teams, they will die of suffocation, which is a condition of not getting enough air. They may also die of hypothermia, or freezing from extreme cold.=cause and effect[descriptive+problem and solution]sequential",
    "Lightning and thunder are two different things but they are related. Lightning is a sudden, violent flash of electricity that occurs between a cloud and the ground or between two clouds in the sky. A lightning bolt can be several miles long and is very hot, causing the air around it to expand. The rapid expansion of air produces lots of sound energy, which is what we hear as thunder. Lightning and thunder are caused by the same event, but lightning is light energy whereas thunder is sound energy.=comparison and contrast[sequential+descriptive]cause and effect",
    "When a river receives a lot of extra water, it may flood. Flood waters are mostly polluted and not safe to drink. Some people suffer from illnesses or diseases such as typhoid. You can prepare for flooding by filling many containers with fresh, clean drinking water. You can also use sandbags to protect your house and to soak up the water. Be prepared and be safe.=problem and solution[sequential+cause and effect]descriptive",
    "Do you know what causes a volcanic eruption? Beneath a volcano is a large pool of liquid rock called a magma chamber. It is called a magma chamber because the molten rock is called magma. Because a magma chamber is hot and surrounded by rock, it is under great pressure. Given enough time, that pressure can gradually fracture the rock around it, creating a way for the magma to move upward. If magma finds its way to the surface of the earth, then the result will be a volcanic eruption.=cause and effect[problem and solution+comparison and contrast]descriptive",
    "There are many reasons why people dance. Some people dance for fun, just because they enjoy dancing. At other times, people dance for exercise or for weight loss, because dancing can really get your heart beating. Also, some people dance to try to get boyfriends or girlfriends, because they think that good dancing is attractive. Can you think of other reasons why people dance?=cause and effect[comparison and contrast+sequential]descriptive",
    "There are two types of people in this world: cat people and dog people. Which type are you?<br><br>Well, if you like a pet that is low maintenance, you might be a cat person. Cats are easier to take care of than dogs because cats are very independent. Since they use litter boxes, they do not have to be taken outside to go potty like dogs. Also, cats clean themselves while dogs need occasional baths.<br><br>If you prefer a pet that requires more attention, you may be a dog person. Most dogs are very loyal and obedient. You can play games like fetch or tug of war with a dog. Dogs will also alert you when someone is outside of your home, whereas cats will usually just stay quiet.<br><br>Both cats and dogs like to be petted, and they both make excellent pets, but it takes a certain kind of person to own them. Which kind of person are you?=comparison and contrast[descriptive+problem and solution]cause and effect",
    "Hurricane Katrina began as Tropical Depression Twelve over the southeastern Bahamas on August 23, 2005. The depression later strengthened into a tropical storm on the morning of August 24 where the storm was also named Katrina. Katrina then continued to move into Florida, and became a Category 1 hurricane only two hours before it made landfall around Hallandale Beach on the morning of August 25. The storm weakened over land, but became a hurricane again while entering the Gulf of Mexico.=sequential[comparison and contrast+problem and solution]cause and effect",
    "Sparklers and smoke bombs are my favorite kinds of fireworks. They are both safe and fun but they are also quite different. After you light a smoke bomb, you should put it on the ground and run. Stand back and watch it go! When you light a sparkler, however, you continue to hold it until it is done sparkling. You're your hand around and have an awesome time! They also burn differently. Sparklers create bright lights and sparks when you light them, but smoke bombs create smoke in different colors. Remember, kids: smoke bombs and sparklers are both extremely dangerous and should only be used by responsible adults.=comparison and contrast[descriptive+cause and effect]sequential",
    "If you ask me, the perfect pizza has a thin crust, but not too thin. Even though I'm from Chicago, I prefer the New York style crust. Your perfect pizza might have tomato sauce on it, but mine has pesto on top of the crust. On the pesto I'd like to see lots of cheese: a full layer of shredded mozzarella and Romano cheese, and on top of the shredded mozzarella, I'd like to see some slices of fresh mozzarella. Now you might think I'm crazy for this one, but I'd really like to see some goat cheese in the crust. To top it all off, I'd like to see it polka-dotted with pepperoni slices. Now that's what I call a pizza pie.=descriptive[comparison and contrast+sequential]problem and solution",
    "Tsunamis are very long waves in the ocean that usually start suddenly. They may begin as normal waves and change to big waves very quickly. These big tsunami waves will then travel at great speed across the ocean with little energy loss. Just before they hit land, the water will draw back off of the coast. If the slope of the coast is shallow, the water may pull back for many hundreds of feet. When the tsunami finally hits, it may remove sand from beaches, destroy trees, damage houses and even destroy whole towns.=sequential[problem and solution+cause and effect]comparison and contrast",
    "Working on a computer may be easier and safer than working in a mine, but it doesn't come without risks. Using a computer for a long time can lead to poor eyesight, muscle loosening, back pain, and injuries to the hands and wrists. If you find yourself working or playing on a computer quite regularly, you need to do a few things in order to prevent these problems.<br><br>When you are computing for a long time, take frequent breaks. Get up and walk around every once and while. Exercise a little bit. Take your eyes off of the computer screen. Stretch your hands and wrists. Straighten your back. It can be hard to pull yourself away from your computer once you get into a zone, but your body will thank you later if you do. Make your health a priority and don't worry so much about what's happening on that little screen.=problem and solution[sequential+descriptive]comparison and contrast",
    "Computers are very complex machines, but everything that they do can be put into two basic categories: inputting and outputting.<br><br>Inputting is when the computer accepts information entered by the user. Outputting is when the computer returns information to the user. When you press a key on your keyboard, you input information. When the letter that you pressed appears on your monitor, your computer is outputting.<br><br>Both inputting and outputting require the computer to process information, but input is controlled by the user and output is controlled by the computer. Without inputting and outputting, there would be no computing.=comparison and contrast[cause and effect+descriptive]sequential",
    "Cooking the perfect pizza at home can be quite a challenge. You may find that it's difficult to get your oven to the right temperature. If the oven is too hot, the crust will burn, become hard, and taste bad. If your oven isn't hot enough, the crust may get soggy. Even at the perfect temperature, extra moisture from your ingredients may prevent the bottom of the crust from fully cooking.<br><br>But don't let oven temperature stop you from creating the pizza of your dreams. Get yourself a pizza stone. A pizza stone will get very hot when preheated and will allow your crust to fully cook without burning it. Then you can pile the ingredients on your pizza and have a crispy crust that isn't burned. That's the way to go.=problem and solution[comparison and contrast+sequential]descriptive",
    "\"Fool's gold\" is a common nickname for pyrite, a brass-yellow mineral with a bright metallic luster. Pyrite received that nickname because it is worth virtually nothing, but has an appearance that 'fools' people into believing that it is gold. With a little practice, there are many easy tests that anyone can use to quickly tell the difference between pyrite and gold.<br><br>The nickname \"fool's gold\" has long been used by gold buyers and prospectors, who were amused by excited people who thought they had found gold. These people did not know how to tell the difference between pyrite and gold, and their ignorance caused them to look foolish.=descriptive[instruction+comparison and contrast]process",
    "The foundation of every pizza is the crust, and good crust comes from good dough. You might be surprised to learn that pizza dough is made from nothing more than flour, water, yeast, olive oil, salt, and sometimes sugar. Start by adding your yeast packet to a cup of warm water. Let the yeast activate, and then add two cups of flour, two tablespoons of olive oil, two teaspoons of sugar, and a teaspoon of salt. Mix all of that together and wait half an hour for the dough to rise. Now you're ready to roll it out!=sequential[comparison and contrast+descriptive]problem and solution",
    "For better or worse, mobile phones are changing the world; however, one place where phones are definitely making things worse is on the road.<br><br>Today, it is common for motorists to play with their mobile phones while driving. Drivers may get bored or impatient while waiting in traffic and use their smart phones to pass the time by checking sports scores, stock numbers, or news stories. Worse still, they may engage in text messaging. Some drivers are so used to receiving and responding to communications immediately that it does not occur to them to wait until an appropriate time to respond. As soon as they get a message, these drivers will try to read and respond to it.<br><br>There are many reasons why people use cell phones while driving, but none of them are good reasons.=cause and effect[sequential+problem and solution]descriptive",
    "When playing some sports, athletes are required to wear special shoes. Two such sports are golf and bowling.<br><br>Golf shoes have sharp metal spikes called cleats. These cleats help golfers keep their footing while swinging the club. On the other end of the spectrum are bowling shoes, which are very smooth and have almost no traction at all. Bowling shoes help bowlers slide down the lane while throwing the ball.<br><br>While both of these types of shoes help athletes perform, I wouldn't wear either of them outside of games. Aside from looking ridiculous, golf shoes and bowling shoes do not have soles that are fit for street use.=comparison and contrast[problem and solution+sequential]descriptive",
    "Having good attendance is important for any school. A school experiencing poor attendance among some of its students should try different things to address this problem. For example, teachers may talk to the parents of students with poor attendance, either personally or over the phone. The school may also try mailing letters or sending emails to them. The school may also schedule a conference among teachers, school officers, habitually absent students, and their parents. In all of these, communication is the key.=problem and solution[descriptive+comparison and contrast]sequential",
    "Due to their bright colors and visits to flowers, butterflies are the most familiar of insects to humans. There are about 17,500 species of butterflies in the world, with 927 species in the Philippines.<br><br>Butterflies (and moths) are the only group of insects that have scales covering their wings, although some butterflies have reduced scales. They also have taste receptors on their feet to help them find their host plants and locate food. They can only feed on liquids-usually nectar. Their mouthparts are modified to enable them to drink, but they can't chew solids. To supplement its diet of nectar, a butterfly will occasionally sip from mud puddles, which are rich in minerals and salts.<br><br>Butterflies are indeed one of the most interesting insects to study.=descriptive[problem and solution+sequential]comparison and contrast",
    "Christmas in the Philippines is celebrated not like any other countries. Christmas season starts in the beginning of the '-ber' months, specifically the first of September. This is evident with the ever-famous Jose Mari Chan Christmas album playing in malls as soon as the first of September rolls in. Filipinos also attend Misa de Gallo, also called 'Simbang Gabi', a nine-day series of masses starts from the 16th of December until Christmas Eve meant to honor the Blessed Virgin Mary.<br><br>Outside the church during Simbang Gabi, puto bumbong and bibingka vendors are eagerly waiting to serve hungry church-goers with their rice delicacies. Finally, Christmas is celebrated in the Philippines right after the Christmas Midnight Mass. Called Noche Buena, this celebration usually doubles up as a reunion with everyone decked in their finest clothes and party favorites like lechon, queso de bola, ham, and family heirloom recipes are prepared.<br><br>Indeed, the Philippines is rich in its Christmas culture and tradition!=descriptive[sequential+comparison and contrast]problem and solution",
    "The twist is a dance inspired by rock and roll music. To do the Twist, first stand with your feet approximately shoulder width apart. The torso may be squared to the knees and hips, or turned at an angle so one foot is farther forward than the other. Then, hold your arms out from your body, bent at your elbow. Next, rotate your hips, torso, and legs as a single unit with your arms staying more or less stationary. Every so often lift one leg off of the floor for styling. Now you're doing the twist!=sequential[comparison and contrast+problem and solution]descriptive",
    "There is a reason why dogs are called \"man's best friend.\" The good friendship that we have with dogs is thousands of years old and, as with most good friendships, was formed by mutual benefit.<br><br>Dogs are of great value to people because they use their keen senses to detect threats and alert their owners by barking. You may find your dog's yapping to be quite annoying, but under some circumstances it can be quite helpful.<br><br>People are of great value to dogs too. Dogs who live with people usually have easier access to food and a safer place to stay than they would on their own, and that truly is what friends are for.=cause and effect[comparison and contrast+sequential]problem and solution",
    "The lion is often thought of as the king of the jungle, but the African wild dog may be a better hunter. Both lions and African wild dogs are pack animals and have females lead their hunts, but they have different hunting styles.<br><br>Although lions are very fast, they do not have much stamina. They attack in short, ferocious bursts because they get tired quickly.<br><br>On the other hand, African wild dogs are not very fast, but they have incredible stamina. They can run for hours and often chase their prey to exhaustion.<br><br>Dr. George Schaller studied African wild dogs in the Serengeti and found that 9 out of 10 of their hunts ended in kills, while lions are only successful in 3 out of 10 hunts. So you see, the king is not always the best.=comparison and contrast[cause and effect+problem and solution]descriptive",
    "Cats can be great pets but they are not perfect. Some cats destroy household items with their claws. Or they may use their claws to scratch people's faces if they feel threatened. Small children are the ones most often attacked by cats. These attacks can leave lasting scars. Don't worry though: you don't have to get rid of your cat just because she can't keep her claws to herself. You can get your cat an onychectomy.<br><br>An onychectomy is when a cat's claws are surgically removed. This is commonly called declawing the cat. If you get your cat declawed, he or she will still continue to swipe its paws at people and things, but the attacks will be harmless. Some people worry that declawed cats are vulnerable against attacks by raccoons and other animals that the cats might encounter outdoors. People with these concerns should only have their cat's front claws removed, which leaves the cat with a defense if he or she is seriously attacked but also protects people and household items.=problem and solution[cause and effect+descriptive]sequential",
    "If you're planning on dressing up for a wedding, dance, or other formal event, you'll need to wear some dress shoes. While your feet may look great in dress shoes, they will probably feel horrible. Wearing dress shoes for more than a few minutes can be extremely painful. This pain may prevent you from having a good time.<br><br>One thing that you can do to protect yourself is to bring a box of band-aids with you. As the dress shoes tear up the skin on your feet, put those band-aids on the wounds to ease the pain and prevent further damage. The band-aids will create a protective layer that will reduce the amount of pain that your dress shoes may inflict. Don't let foot pain ruin your fun; come to the party prepared.=problem and solution[sequential+descriptive]comparison and contrast",
    "Cats were believed to represent the Egyptian war goddess Bastet, and that's why the ancient Egyptians worshipped cats. Their admiration was expressed in ways that we might find funny or shocking today. They liked cats so much that killing a cat in ancient Egypt, even on accident, was punishable by death.<br><br>The Greek historian Herodotus wrote that when a cat passed away, the household would go into mourning as though a member of the family had died. Family members would even shave off their eyebrows to show their loss.<br><br>Another way in which ancient Egyptians showed love and respect for cats was through mummification. Cats were often mummified after dying, a process normally reserved for kings and nobles. Hundreds of thousands of cat mummies have been found preserved in and around Egypt.=cause and effect[process+instruction]comparison and contrast",
];

// ============================================================
// Parse helper
// ============================================================
function ttf_parse($entry) {
    $p0 = strpos($entry, '=');
    if ($p0 === false) return null;
    $p1 = strpos($entry, '[', $p0);
    $p2 = strpos($entry, '+', $p1 === false ? 0 : $p1);
    $p3 = strpos($entry, ']', $p2 === false ? 0 : $p2);
    if ($p1 === false || $p2 === false || $p3 === false) return null;

    $question = trim(substr($entry, 0, $p0));
    $answer   = trim(substr($entry, $p0 + 1, $p1 - $p0 - 1));
    $d1       = trim(substr($entry, $p1 + 1, $p2 - $p1 - 1));
    $d2       = trim(substr($entry, $p2 + 1, $p3 - $p2 - 1));
    $d3       = trim(substr($entry, $p3 + 1));

    if ($question === '' || $answer === '') return null;

    return [
        'question' => $question,
        'answer'   => $answer,
        'd1'       => $d1,
        'd2'       => $d2,
        'd3'       => $d3,
    ];
}

function ttf_render_passage($raw) {
    // Escape everything, then restore only <br> variants (paragraph breaks)
    $safe = htmlspecialchars($raw, ENT_QUOTES, 'UTF-8');
    return preg_replace('/&lt;br\s*\/?&gt;/i', '<br>', $safe);
}

// ============================================================
// Handle answer click
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    // Anti-tamper: only accept clicks that match a rendered choice
    if (!in_array($clicked, $cur['choices'], true)) {
        $clicked = $cur['choices'][0];
    }

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
    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $avail = [];
    foreach ($bank as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        if (ttf_parse($entry) === null) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($bank as $i => $entry) {
            if (ttf_parse($entry) !== null) $avail[] = $i;
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
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = ttf_parse($bank[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    $choices = array_values(array_unique($choices));
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question' => $parsed['question'],
        'answer'   => $parsed['answer'],
        'choices'  => $choices,
        'lvl'      => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .ttf-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 22px 28px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.15rem;
    font-weight: 500;
    color: #333;
    line-height: 1.6;
    text-align: center;
    box-sizing: border-box;
  }
  .ttf-card.ttf-feedback { font-size: 1.2rem; }
  .ttf-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 40px auto 40px;
    line-height: 1.3;
  }
  .ttf-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .ttf-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .ttf-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 100%;
    margin: 14px auto;
  }
  .ttf-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 64px;
    padding: 14px 20px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    max-width: 100%;
    transition: background 0.15s, border-color 0.15s;
  }
  .ttf-choice:hover { background: #eef; border-color: #8080ff; }
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

    <div class="ttf-card ttf-feedback">
        <?php echo ttf_render_passage($cur['question']); ?>
        <br><br>
        <span style="color:#CC0066; font-weight:700;">Text type:</span>
        <strong style="color:#800080; font-weight:700;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <div class="ttf-card"><?php echo ttf_render_passage($q['question']); ?></div>

    <p class="ttf-prompt">Click on the type of<br/>factual text shown above.</p>


    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 17);
        $containerClass = $use2x2 ? 'ttf-grid-2x2' : 'ttf-grid-1col';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="ttf-choice">
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