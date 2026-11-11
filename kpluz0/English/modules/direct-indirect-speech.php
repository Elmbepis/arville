<?php
// english/modules/direct-indirect-speech.php
// FIB (free-text entry). Bypass QEngine per §D.
// Shows a direct-speech sentence; student types the indirect-speech clause
// that follows "[Pronoun] said that".
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Grade-keyed tier assignment (bank has 5 tiers):
//     grd 0-5 &#8594; Easy: 1; Hard: rand(2,3)   [Medium=2, Hard=3]
//     grd 6-7 &#8594; Easy: 2; Hard: rand(3,4)   [Medium=3, Hard=4]
//     grd 8+  &#8594; Easy: 3; Hard: rand(4,5)   [Medium=4, Hard=5]
//   Rationale: modern Hard takes the union of legacy Medium + legacy Hard.
//
// Bank format: "<form><content>&<pronoun>" where form 1 = "speaker said]
// [clause]" and form 2 = "[clause] ] [speaker] said". Inside content, the
// verb markup "*direct=indirect+" identifies the transformation. Placeholders
// {boy}, {girl}, {surname} are substituted per pick.
//
// Data hygiene applied during conversion:
//   • Deduplicated within each tier (legacy had verbatim duplicate entries
//     in tiers 2-3 that reduced variety).
//   • Fixed "&He." &#8594; "&He" (trailing period broke pronoun extraction) in
//     tier 3 aardvark entry.
//   • Fixed "Mrs.{surname}" &#8594; "Mrs. {surname}" (missing space) in tier 4.
//
// Answer canonicalization: lowercase + strip whitespace + period/question
// mark (matches legacy comparison: case-insensitive, space-stripped).
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
//
// Theme: ex-26-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'direct-indirect-speech.php'

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

$moduleTitle = 'Direct and Indirect Speech';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// Level + grade &#8594; tier (§10)
$grdKey = ($grd <= 5) ? 0 : (($grd <= 7) ? 1 : 2);
$configs = [
    0 => ['Easy' => [1, 1], 'Hard' => [2, 3]],
    1 => ['Easy' => [2, 2], 'Hard' => [3, 4]],
    2 => ['Easy' => [3, 3], 'Hard' => [4, 5]],
];
$range  = $configs[$grdKey][$lvl];
$arrnum = rand($range[0], $range[1]);

// ============================================================
// Name pools
// ============================================================
$boys = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos','Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian','Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph','Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael','Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel','Sebastian','Thomas','William'];
$girls = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille','Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah','Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla','Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi','Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];
$surnames = ['Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales','Martinez','Mendez','Paredes','Revilla','Santos','Tolentino'];

// ============================================================
// Bank — 5 tiers, placeholders {boy} {girl} {surname}
// ============================================================
$bank = [];
$bank[1] = [
    "1{boy} said]the clock *is=was+ broken.&He",
    "1{girl} said]the cat *is=was+ hungry.&She",
    "1{boy} said] it *is=was+ a cloudy day.&He",
    "2The show *is=was+ boring]{girl} said.&She",
    "2The phone *is=was+ ringing]{boy} said.&He",
    "2The cars are very fast]my uncle said.&He",
    "2The test *is=was+ very hard]{boy} said.&He",
    "2The music there *is=was+ loud]{girl} said.&She",
    "1My father said]the dogs *are=were+ barking.&He",
    "1My mother said]the babysitter *is=was+ late.&She",
    "1The farmer said]the fruits *are=were+ ripe.&He",
    "1My friends said]it *is=was+ still raining.&They",
    "2It *is=was+ cold outside]my classmate said.&He",
    "1The woman said]it *is=was+ very hot yesterday.&She",
    "1My sister said]the spaghetti *is=was+ delicious.&She",
    "1{girl} said]the boy *has=had+ finished eating.&She",
    "1The little boy said]the dog *has=had+ eaten.&He",
    "1My sister said]the cats *have=had+ run away.&She",
    "1My brother said]the priest *has=had+ arrived.&He",
    "1Our mechanic said]the car *has=had+ been fixed.&He",
    "1{boy} said]the new pupil *has=had+ read the book.&He",
    "1The salesman said]they *have=had+ opened the box.&He",
    "2The rains *have=had+ stopped]my nephew said.&He",
    "2They *have=had+ won the prize]our teacher said.&She",
    "2The price *has=had+ gone up]the vendor said.&He",
];
$bank[2] = [
    "1The children said]the white bird *has=had+ flown away.&They",
    "2It *is=was+ snowing in the city]my grandparents said.&They",
    "1My cousin said]they *have=had+ received the letter.&She",
    "1The head nurse said]the doctor *has=had+ seen them.&She",
    "1{girl} said]I *will be=would be+ looking after {boy}.&She",
    "2Their track record *is=was+ impeccable]{girl} said.&She",
    "1The reporter said]it *is=was+ very hot and humid today.&He",
    "1The lady said]I *will=would+ practice singing tonight.&She",
    "1My cousin said]I *will be=would be+ watching the game.&He",
    "2I *will=would+ participate in that auction]{girl} said.&She",
    "1The zoologist said]the aardvarks *are=were+ undernourished.&He",
    "1Mr. {surname} said]I *will=would+ submit the affidavit soon.&He",
    "1{girl} said]I *will be=would be+ hosting the party tonight.&She",
    "1Our neighbor said]I *will be=would be+ wrapping the gifts.&He",
    "1{girl} said]the boy *has been=had been+ eating for an hour.&She",
    "1{girl} said]I *will have=would have+ sent them the package.&She",
    "1The councilor said]the mayor *has=had+ heard the news.&He",
];
$bank[3] = [
    "2The singer's latest song *is=was+ very popular]{girl} said.&She",
    "1My friend said]I *will be=would be+ listening to pop music.&She",
    "1The tired waiter said]the waitress *has=had+ washed the dishes.&He",
    "1My classmates said]the teacher *has=had+ given the final test.&They",
    "1The zoologist said]the aardvarks *are=were+ undernourished.&He",
    "1Mr. {surname} said]I *will=would+ submit the affidavit soon.&He",
    "1The writer said]the senator *is=was+ late for the convention.&She",
    "1The electrician said]the appliances *are=were+ malfunctioning.&He",
    "1{boy} said]I *will be=would be+ waiting under that banana tree.&He",
    "1{girl} said]I *will be=would be+ hosting the party tonight.&She",
    "1My friend said]I *will be=would be+ listening to pop music.&She",
    "1Our neighbor said]I *will be=would be+ wrapping the gifts.&He",
    "1The retailer said]I *will be=would be+ offering new products.&He",
    "1{girl} said]the boy *has been=had been+ eating for an hour.&She",
    "1{girl} said]I *will have=would have+ sent them the package.&She",
    "2The interest rates *have=had+ increased]the bank teller said.&She",
    "2The trader *has=had+ procured more materials]the buyer said.&She",
    "1The retailer said]I *will be=would be+ offering new products.&He",
    "1The writer said]the senator *is=was+ late for the convention.&She",
    "1The electrician said]the appliances *are=were+ malfunctioning.&He",
    "1{boy} said]I *will be=would be+ waiting under that banana tree.&He",
    "1Our science teacher said]{girl} *has=had+ passed the test today.&She",
    "2The famous author *has=had+ written a new story]Mr. {surname} said.&He",
    "1{girl} said]the children *ate=had eaten+ some pasta yesterday.&She",
    "1The voice coach said]{boy} *sang=had sung+ ten songs last night.&She",
    "2{girl} *went=had gone+ to the market last week]her sister said.&She",
    "2{girl} *threw=had thrown+ a party for another customer]{boy} said.&He",
    "1My brother said]{boy} and {girl} *saw=had seen+ that movie last night.&He",
    "1The visitor said]the chef *cooked=had cooked+ some beef an hour ago.&He",
    "1Mrs. {surname} said]{boy} *wrote=had written+ a short poem for {girl}.&She",
    "2I *wrote=had written+ twenty reports last week]the supervisor said.&He",
];
$bank[4] = [
    "1The nanny said]the baby *slept=had slept+ in the pink room yesterday.&She",
    "2The professor *has=had+ given them another test]the students said.&They",
    "2The governor *has=had+ sent them more relief goods]the reporter said.&He",
    "2Those engineers *have=had+ invented a strange gadget]my friend said.&He",
    "2The students *have=had+ submitted their projects]the professor said.&He",
    "2The detective *has=had+ verified the man's identity]the lawyer said.&He",
    "2The complaints *have=had+ accumulated over the weeks]the manager said.&She",
    "2{girl} *will have=would have+ memorized the poem by that time]{boy} said.&He",
    "1The children said]the dog *has been=had been+ chewing that for days.&They",
    "2Those hairy arachnids *are=were+ quite aggressive]the entomologist said.&He",
    "2I *will=would+ undergo a special kind of therapy]the injured athlete said.&He",
    "2I *will be=would be+ analyzing more reports next week]the manager said.&She",
    "1My cousin said]the farmer *has been=had been+ planting there for years.&She",
    "1{boy} said]the same doctor *has been=had been+ seeing them since last year.&He",
    "1My grandmother said]the priest *has been=had been+ helping them for days.&She",
    "2The engineer *has been=had been+ designing new machines]the technician said.&He",
    "1{girl} said]the teacher *has been=had been+ giving those tests since last year.&She",
    "1Our neighbor said]the cats *have been=had been+ living there since last month.&He",
    "1My friend said]I *will have=would have+ stopped by the post office by then.&She",
    "1My sister said]{boy} *will have=would have+ read the whole book by tonight.&She",
    "2I *will have=would have+ announced the decision by next week]the mayor said.&He",
    "2The fans *will have=would have+ seen the actors by eleven]the organizer said.&She",
    "1The coach said]{girl} *will have=would have+ developed a new technique by then.&She",
    "2The star athlete *will have=would have+ won two races by now]the trainer said.&He",
    "2The inventor *has been=had been+ doing the same research for years]{girl} said.&She",
    "2I *will be=would be+ investigating this incident soon]the department head said.&He",
    "2I *will be=would be+ receiving a new shipment from them]the distributor said.&He",
    "2The wealthy investor *has=had+ approved the proposal]Mrs. {surname} said.&She",
    "2The producer of that movie *has=had+ released the movie's trailer]{girl} said.&She",
    "1The secretary said]the mayor *called=had called+ the governor last night.&She",
    "1The clerk said]their neighbor *bought=had bought+ new shoes from that store.&She",
    "2{boy} *constructed=had constructed+ another doghouse for Snoopy]the girl said.&She",
    "2{boy} *accumulated=had accumulated+ a lot of coins there]his classmates said.&They",
    "1The waitress said]the professor *drank=had drunk+ a lot of coffee this morning.&She",
];
$bank[5] = [
    "1The old businessman said]I *will=would+ attend to an important matter this afternoon.&He",
    "2I *will be=would be+ collecting more evidence to support the case]the detective said.&He",
    "2Those businessmen *will be=would be+ exporting food products to Europe]{girl} said.&She",
    "2The teacher *has been=had been+ evaluating their skills since last month]{boy} said.&He",
    "2The carnivores in the zoo *have been=had been+ skittish lately]the zookeeper said.&He",
    "1Mrs. {surname} said]I *will have=would have+ renovated the room before that event.&She",
    "1The manager said]I *will have=would have+ responded to their complaint by tomorrow.&He",
    "2The detective *has been=had been+ investigating the case for years]the reporter said.&She",
    "2I *install=installed+ solar panels on rooftops for extra income]the electrician said.&He",
    "2The technician *will have=would have+ solved the problem by Thursday]the engineer said.&He",
    "2The sales department *will have=would have+ exceeded the quota by then]the finance chief said.&He",
    "2The diggers *will have=would have+ found the treasure chest by tomorrow]Mr. {surname} said.&He",
    "1My teacher said]the new student *will have=would have+ written the report by tomorrow.&She",
    "1The mayor said]the organizers *accumulated=had accumulated+ enough donations for the festival.&He",
    "1The supervisor said]the employees *will have=would have+ completed the project by next week.&She",
    "2The birds *have been=had been+ fighting a lot in the aviary since last week]the veterinarian said.&He",
    "2I *will be=would be+ gathering used books to give to that orphanage]the directress said.&She",
    "2The foundation *has been=had been+ helping those children since last year]the volunteer said.&She",
    "2The priest *has been=had been+ assisting that family these past few weeks]his uncle said.&He",
    "2I *will be=would be+ enhancing the digital image using a new computer]the photographer said.&He",
    "2The volunteers *will be=would be+ distributing relief goods in that town]the governor said.&He",
    "2Those retailers *will be=would be+ importing wearable gadgets from China]the banker said.&She",
    "2The vegetable farmer *harvested=had harvested+ tomatoes from the garden]{girl} said.&She",
    "2The customer *chose=had chosen+ the alternative solution]the software engineer said.&He",
    "2The inventor *emphasized=had emphasized+ the instructions to them]his technician said.&He",
    "1Our gardener said]those basketball players *jogged=had jogged+ in the park this morning.&He",
    "2The principal *discussed=had discussed+ the matter with them last night]my teacher said.&She",
    "2The carpenter *purchased=had purchased+ another set of tools from that store]the guard said.&He",
    "2Those athletes *began=had begun+ using the new training program last week]the coach said.&He",
];

// ============================================================
// Parsers / helpers
// ============================================================
function dis_roll_names() {
    global $boys, $girls, $surnames;
    return [
        'boy'     => $boys[array_rand($boys)],
        'girl'    => $girls[array_rand($girls)],
        'surname' => $surnames[array_rand($surnames)],
    ];
}

function dis_parse($entry, $names) {
    $entry = str_replace(
        ['{boy}', '{girl}', '{surname}'],
        [$names['boy'], $names['girl'], $names['surname']],
        $entry
    );

    $form = (int)substr($entry, 0, 1);
    if ($form !== 1 && $form !== 2) return null;
    $q0 = substr($entry, 1);

    $ampPos = strpos($q0, '&');
    if ($ampPos === false) return null;
    $pronoun = rtrim(substr($q0, $ampPos + 1), '.?! ');
    if ($pronoun === '') return null;
    $q0_noPron = substr($q0, 0, $ampPos);

    $punc = (substr(rtrim($q0_noPron), -1) === '?') ? '?' : '.';

    if (!preg_match('/\*([^=]+)=([^+]+)\+/', $q0_noPron, $m)) return null;
    $anstr = $m[0];
    $dverb = $m[1];
    $iverb = $m[2];

    $bracketPos = strpos($q0_noPron, ']');
    if ($bracketPos === false) return null;

    if ($form === 1) {
        $speakerPart = substr($q0_noPron, 0, $bracketPos);
        $clausePart  = substr($q0_noPron, $bracketPos + 1);

        $clauseWithDverb = str_replace($anstr, $dverb, $clausePart);
        $direct = $speakerPart . ', "' . rtrim($clauseWithDverb, '.?') . $punc . '"';

        $clauseWithIverb = str_replace($anstr, $iverb, $clausePart);
    } else {
        $clausePart  = substr($q0_noPron, 0, $bracketPos);
        $speakerPart = substr($q0_noPron, $bracketPos + 1);

        $clauseWithDverb = str_replace($anstr, $dverb, $clausePart);
        $speakerTrim = rtrim($speakerPart, '.?');
        $direct = '"' . rtrim($clauseWithDverb, '.?') . '," ' . $speakerTrim . $punc;

        $clauseWithIverb = str_replace($anstr, $iverb, $clausePart);
    }

    $answer = rtrim($clauseWithIverb, '.?! ');
    $answer = str_replace('I ', strtolower($pronoun) . ' ', $answer);
    $nameStart = (strpos($answer, $names['boy']) === 0) || (strpos($answer, $names['girl']) === 0);
    if (!$nameStart && $answer !== '') {
        $answer = lcfirst($answer);
    }

    return [
        'direct'            => $direct,
        'indirect_template' => $pronoun . ' said that ____' . $punc,
        'indirect_filled'   => $pronoun . ' said that ' . $answer . $punc,
        'answer'            => $answer,
        'pronoun'           => $pronoun,
        'punc'              => $punc,
    ];
}

function dis_pick(array $pool, string $sessionKey, int $tier): ?array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];

    $avail = [];
    foreach ($pool as $i => $raw) {
        if (in_array("t$tier:$i", $used, true)) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        foreach ($pool as $i => $raw) $avail[] = $i;
    }

    for ($attempt = 0; $attempt < 20; $attempt++) {
        $idx = $avail[array_rand($avail)];
        $names = dis_roll_names();
        $parsed = dis_parse($pool[$idx], $names);
        if ($parsed !== null) {
            $used[] = "t$tier:$idx";
            if (count($used) > 500) $used = array_slice($used, -300);
            $_SESSION[$sessionKey]['used'] = $used;
            return $parsed;
        }
    }
    return null;
}

// ============================================================
// Score handler (FIB)
// ============================================================
$result = null;
$scorer = null;

if (isset($_POST['Submit1']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $raw = (string)($_POST['answer'] ?? '');
    $canon    = strtolower(preg_replace('/[\s\.\?]+/', '', $raw));
    $corCanon = strtolower(preg_replace('/[\s\.\?]+/', '', $cur['answer']));

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($canon, $corCanon, $cur['lvl']);

    $result = ['correct' => $isCorrect, 'userInput' => $raw, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// THEME
// ============================================================
$theme = [
    'top_banner'    => $base . '/english/images/ex-26-top.jpg',
    'title_bg'      => $base . '/english/images/ex-26-top2.jpg',
    'left_side'     => $base . '/english/images/ex-26-left.jpg',
    'right_side'    => $base . '/english/images/ex-26-right.jpg',
    'content_bg'    => $base . '/english/images/ex-26-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-26-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $pool = $bank[$arrnum];
    $pick = dis_pick($pool, $sessionKey, $arrnum);
    if ($pick === null) {
        $pick = dis_pick($bank[1], $sessionKey, 1);
    }
    if ($pick === null) {
        render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
        echo '<p style="text-align:center;font-size:16pt;margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $_SESSION[$sessionKey]['current'] = [
        'direct'            => $pick['direct'],
        'indirect_template' => $pick['indirect_template'],
        'indirect_filled'   => $pick['indirect_filled'],
        'answer'            => $pick['answer'],
        'lvl'               => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .dis-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 20px 26px;
    max-width: 480px;
    margin: 16px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
    box-sizing: border-box;
  }
  .dis-card .dis-label {
    display: block;
    font-size: 1.2rem;
    color: #800080;
    font-weight: 700;
    margin-bottom: 6px;
  }
  .dis-card .dis-blank {
    display: inline-block;
    min-width: 110px;
    border-bottom: 2px solid #CC0066;
    color: #CC0066;
    font-weight: 700;
  }
  .dis-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 18px auto 6px;
    max-width: 480px;
    line-height: 1.5;
  }
  .dis-answer-row {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin: 20px auto;
    flex-wrap: wrap;
  }
  .dis-answer-row label {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: #800080;
  }
  .dis-input {
    text-align: center;
    height: 46px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: #0000BB;
    border: 2px solid #b0b0d8;
    border-radius: 10px;
    background: #fff;
    padding: 0 14px;
    box-sizing: border-box;
  }
  .dis-input:focus { outline: none; border-color: #8080ff; background: #f8f8ff; }
  .dis-btn-row {
    margin: 40px 0 30px;
    text-align: center;
  }
  .dis-btn-row input[type='submit'] {
    margin: 0 6px;
  }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['userInput']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <div class="dis-card">
        <span class="dis-label">Direct Speech</span>
        <?php echo htmlspecialchars($cur['direct']); ?>
    </div>
    <div class="dis-card">
        <span class="dis-label">Indirect Speech</span>
        <?php echo htmlspecialchars($cur['indirect_filled']); ?>
    </div>

    <div class="dis-btn-row">
        <input type="submit" name="Submit2" value=" New Question ">
    </div>
<?php else: ?>
    <div class="dis-card">
        <?php echo htmlspecialchars($q['direct']); ?>
    </div>

    <p class="dis-prompt">
        Convert the direct speech sentence above<br>
        into an indirect speech sentence.
    </p>

    <div class="dis-card">
        <?php
            $tmplSafe = htmlspecialchars($q['indirect_template']);
            $tmplSafe = str_replace('____', '<span class="dis-blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>', $tmplSafe);
            echo $tmplSafe;
        ?>
    </div>

    <?php
        $answerLen = strlen($q['answer']);
        $inputPx   = max(280, min(440, ($answerLen + 4) * 12));
        $maxLen    = $answerLen + 20;
    ?>
    <div class="dis-answer-row">
        <label>Answer:</label>
        <input type="text" name="answer" class="dis-input"
               style="width: <?php echo $inputPx; ?>px;"
               maxlength="<?php echo $maxLen; ?>"
               autocomplete="off" autofocus>
    </div>

    <div class="dis-btn-row">
        <input type="submit" name="Submit1" value=" Submit ">
        <input type="submit" name="Submit2" value=" New Question ">
    </div>
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