<?php
// english/modules/words-self-family.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Word bank with fill-in-the-blank questions about self, family, community.
// Click the correct word that completes the sentence.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" and had no level radios.
//   Collapsed to single level with $lvl='Easy' as local. No selector rendered.
//
// No images. Bank of 37 static questions.
// Repeat prevention: $_SESSION[used] array of indices; resets at exhaustion.
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'words-self-family.php'

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

$moduleTitle = "Words About One's Self, Family,<br/>and Community";
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single level (§5)

// Static question bank: "question=answer[d1+d2]d3"
$bank = [
    "I go to my ____ to learn how to read and write.=school[store+church]park",
    "My parents, brothers, and sisters are members of our ____.=family[school+church]park",
    "Our family and our neighbors live in the same ____.=community[school+church]house",
    "Doctors, policemen, firemen, teachers, bakers, and barbers are all ____ helpers.=community[school+church]house",
    "I have a younger ____. She loves the doll our mother gave her.=sister[brother+uncle]aunt",
    "I have an older ____. He helps me carry my bags to school.=brother[sister+mother]aunt",
    "My ____ has a job. He gives us everything we need.=father[sister+brother]mother",
    "My ____ takes care of us. She also keeps our house in order.=mother[sister+brother]father",
    "My father and mother are my ____.=parents[siblings+children]cousins",
    "I, my brothers, and my sisters are my parents' ____.=children[siblings+parents]cousins",
    "My brothers and sisters are my ____.=siblings[uncles+aunts]cousins",
    "Greg is my uncle's son. He is my ____.=cousin[sister+brother]uncle",
    "Gina is my aunt's daughter. She is my father's ____.=niece[nephew+aunt]cousin",
    "Dave is my aunt's son. He is my mother's ____.=nephew[niece+uncle]cousin",
    "My mother's brother is my ____.=uncle[aunt+nephew]niece",
    "My father's sister is my ____.=aunt[uncle+nephew]niece",
    "My parents' nephews and nieces are my ____.=cousins[uncles+aunts]siblings",
    "The parents of my parents are my ____.=grandparents[godparents+great-grandparents]siblings",
    "I go to the ____ to have my teeth checked.=dentist[doctor+barber]nurse",
    "I go to the ____ when I'm not feeling well.=doctor[dentist+barber]nurse",
    "I go to the ____ when I need a haircut.=barber[dentist+baker]doctor",
    "I go to the ____ to buy bread.=bakery[barbershop+hospital]park",
    "People go to the ____ when they're sick.=hospital[barbershop+bakery]park",
    "People go to the ____ to see jungle animals.=zoo[farm+market]playground",
    "We bring our pets to a ____ to keep them healthy.=veterinarian[doctor+dentist]nurse",
    "Who keep our community peaceful and safe?=police officers[doctors+firefighters]teachers",
    "Who put out fires in burning buildings?=firefighters[doctors+police officers]teachers",
    "Who helps the doctor take care of sick people?=nurse[dentist+barber]teacher",
    "Who fixes broken pipes in our homes?=plumber[electrician+cook]teacher",
    "Where do we go to borrow books?=library[canteen+clinic]classroom",
    "Where do we go to listen to our teachers?=classroom[canteen+clinic]library",
    "Where do we go to eat our lunch?=canteen[classroom+clinic]library",
    "Where do we go when we're sick at school?=clinic[classroom+canteen]library",
    "Who is the head of our school?=principal[teacher+doctor]dentist",
    "Who keeps our school clean and shiny?=janitor[teacher+principal]nurse",
    "Where do people in a community go to pray together?=church[park+hospital]bank",
    "Where do people in a community buy food and other things?=market[church+hospital]bank",
];

function parse_wsf($entry) {
    $pe = strpos($entry, '=');
    $pl = strpos($entry, '[');
    $pp = strpos($entry, '+');
    $pr = strpos($entry, ']');
    if ($pe === false || $pl === false || $pp === false || $pr === false) return null;
    return [
        'question' => substr($entry, 0, $pe),
        'answer'   => substr($entry, $pe + 1, $pl - $pe - 1),
        'd1'       => substr($entry, $pl + 1, $pp - $pl - 1),
        'd2'       => substr($entry, $pp + 1, $pr - $pp - 1),
        'd3'       => substr($entry, $pr + 1),
    ];
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
// THEME
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
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $total = count($bank);

    $avail = [];
    for ($i = 0; $i < $total; $i++) {
        if (!in_array($i, $used, true)) $avail[] = $i;
    }
    if (empty($avail)) {
        $avail = range(0, $total - 1);
        $used = [];
    }
    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    $_SESSION[$sessionKey]['used'] = $used;

    $parsed = parse_wsf($bank[$idx]);
    if ($parsed === null) $parsed = parse_wsf($bank[0]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
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
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle, $theme);
?>
<style>
  .wsf-question-card {
    background: #fff;
    border: 2px solid #d0d0e8;
    border-radius: 16px;
    padding: 22px 30px;
    max-width: 560px;
    margin: 20px auto;
    font-family: 'Arial', 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
  }
  .wsf-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
    max-width: 620px;
  }
  .wsf-grid-1col {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    margin: 20px auto;
  }
  .wsf-row {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    gap: 16px;
    margin: 20px auto;
  }
  @media (max-width: 820px) {
    .wsf-question-card { padding: 16px 20px; font-size: 1rem; }
    .wsf-grid-2x2 { gap: 10px 14px; }
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
    <div class="wsf-question-card">
        <?php echo htmlspecialchars($cur['question']); ?>
    </div>
    <p style="font-size:16pt; color:#800080; margin-top:15px;">
        Answer: <strong style="color:#CC0066;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <div class="wsf-question-card">
        <?php echo htmlspecialchars($q['question']); ?>
    </div>
    <p style="font-size:14pt; color:#800080; margin-top:10px;">Click on your answer.</p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        if ($maxLen > 20)      $wrapClass = 'wsf-grid-1col';
        elseif ($maxLen >= 5)  $wrapClass = 'wsf-grid-2x2';
        else                   $wrapClass = 'wsf-row';
    ?>
    <div class="<?php echo $wrapClass; ?>">
        <?php
            $choiceWidthEm = round(0.62 * $maxLen + 3.2, 2);
            if ($wrapClass === 'wsf-row') $choiceWidthEm = max($choiceWidthEm, 6);
        ?>
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width: <?php echo $choiceWidthEm; ?>em;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php endif; ?>

</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();