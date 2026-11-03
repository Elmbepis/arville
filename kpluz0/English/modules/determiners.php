<?php
// english/modules/determiners.php
// Correct Usage of Determiners — fill in the blank with the correct determiner.
// Two levels (Easy/Hard); grade from $_SESSION['user_grade'] (0-10).
// 6 content tiers via (level × grade); 3 M/C choices (1×3 grid).
//
// Data markers per sentence: *correct1wrong12wrong2+
//   • *            opens the marker
//   • "1"          separates correct from first distractor
//   • "2"          separates first distractor from second
//   • +            closes the marker
//   Example: "saw *a1an2any+ tortoise" &#8594; correct "a", wrong ["an","any"]
//
// Legacy preserved the whole marker replaced by a 4-underscore blank (____)
// on the question page, and the answer filled in (highlighted) on feedback.
//
// Data fix (§5.4): tier 6 "…*the1each2any+  given instructions…" had a double
// space after the marker; normalized to single space.
//
// LAYOUT RULE (mirrors objects.php / pronouns-subj-obj.php):
//   • Sentence box hugs its content (inline-flex wrapper) with ample padding.
//   • text-wrap:pretty (not balance) inside the box content.
//   • "Click on the correct answer below." sits immediately above buttons.

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
$moduleTitle = 'Correct Usage of Determiners';
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

// ---- Tier mapping (§4) — legacy Easy / legacy Hard; Medium folded into Hard ----
function resolve_det_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') {
        if ($grd <= 4) return 1;
        if ($grd <= 6) return 2;
        if ($grd <= 8) return 3;
        return 4;
    }
    if ($grd <= 4) return 3;
    if ($grd <= 6) return 4;
    if ($grd <= 8) return 5;
    return 6;
}

// ---- Name pools (§5.2) — verbatim from legacy ----
$boys = ['Adam','Alexander','Andrew','Angelo','Benjamin','Brandon','Carlos',
    'Charles','Christopher','Daniel','David','Diego','Dominic','Gabriel','Ian',
    'Isaac','Jack','Jacob','James','Jason','Jose','John','Jonathan','Joseph',
    'Joshua','Juan','Kevin','Lucas','Luis','Luke','Matthew','Max','Michael',
    'Nathan','Nicholas','Noah','Oliver','Robert','Romeo','Ryan','Samuel',
    'Sebastian','Thomas','William'];
$girls = ['Alyssa','Amelia','Andrea','Anna','Ariana','Bella','Betty','Camille',
    'Caroline','Claire','Elizabeth','Emma','Eva','Evelyn','Grace','Hannah',
    'Isabella','Jasmine','Jocelyn','Jolina','Julia','Katherine','Lauren','Layla',
    'Leah','Lillian','Lydia','Madeline','Maria','Mariah','Melanie','Mia','Naomi',
    'Natalie','Olivia','Samantha','Sarah','Sophia','Stella','Tina','Victoria'];
$surnames = ['Aquino','Castro','Cruz','Dantes','Fajardo','Gascon','Gonzales',
    'Martinez','Mendez','Paredes','Revilla','Santos','Tolentino'];

// ---- Data (§5) — verbatim from legacy, with placeholders + 1 spacing fix ----
$rawByTier = [
    1 => [
        "{name} saw *a1an2any+ tortoise in their backyard.",
        "There is *a1an2any+ wonderful exhibit at the mall.",
        "*Each1All2Some+ employee in that office has a laptop.",
        "Is that *the1some2each+ shortest route to the market?",
        "{girl} wrote the script for *that1those2these+ video.",
        "*The1Any2All+ mountainside has been completely denuded.",
        "They have launched *a1all2any+ reforestation project.",
        "{boy} narrated the story in *that1those2these+ play.",
        "{name} prepared enough food for *the1any2all+ crew.",
        "He is very fond of *his1her2its+ new motorcycle.",
        "{boy} spent *much1many2a few+ money for groceries today.",
        "{girl} is playing with *her1his2its+ new doll now.",
        "I want to go to *that1those2these+ party tonight.",
        "{name} ran to *the1a2each+ nearest basement to hide.",
        "We bought twelve tickets for *the1all2a few+ opera.",
        "*The1Any2Each+ restless kids went hiking and swimming.",
        "{boy} can't play the guitar nor *the1all2each+ piano.",
        "*All1Each2Every+ cakes in their bakeshop are expensive.",
    ],
    2 => [
        "Leopards usually hunt in *the1many2some+ jungle alone.",
        "Not *a1any2the+ single person in the room congratulated him.",
        "You must exercise daily and eat *a1each2the+ balanced diet.",
        "{boy} is *the1a2any+ best player on our ice hockey team.",
        "We must make *the1some2each+ right decision this time.",
        "The pet shop is selling *a1an2any+ funny-looking bulldog.",
        "Her brother met *a1an2any+ numerologist this afternoon.",
        "*Each1All2Any+ kid at that event received a toy robot.",
        "*Each1All2Any+ puppy at the dog show got a chewable toy.",
        "Mr. {surname} peddles snacks in *those1this2that+ schools.",
        "The company decided to hire *the1an2any+ oldest engineer.",
        "{girl} went to the beach with *her1his2its+ new classmates.",
        "She performed dismally in *her1his2its+ test and cried.",
        "{boy} spent *some1many2a few+ time with his friends yesterday.",
        "{boy} will donate *his1her2its+ truck to the volunteers.",
        "{name} is dealing with *some1every2any+ financial problems.",
        "He pacified *the1every2any+ people and earned their respect.",
        "{name} knows each and *every1all2a+ student in their school.",
        "*All1Each2Every+ children must obey and respect their parents.",
    ],
    3 => [
        "*Those1This2That+ young men speak neither Filipino nor English.",
        "He wasn't able to make *the1all2some+ electronic circuit work.",
        "The biologist tranquilized *the1some2any+ agitated rhinoceros.",
        "Is it true that *those1this2that+ investors have backed out?",
        "They proceeded with *the1all2any+ construction of our building.",
        "{name} wants to impress *that1those2these+ new client of theirs.",
        "We already sent them *a1all2any+ copy of our proof of purchase.",
        "The radio reported that *a1each2any+ thunderstorm was coming.",
        "Are you sure that we are doing *the1some2each+ right thing?",
        "We need to find *the1some2each+ best solution to this problem.",
        "{girl} gave *each1all2any+ child at that orphanage a plastic toy.",
        "The pet store owner gave *each1all2any+ dog in the pen a bone.",
        "Let's hire *the1some2each+ best applicant for this new position.",
        "I took a photo of *the1some2any+ largest peacock at the city zoo.",
        "My friend gave *each1all2any+ kitten in the room a ball of yarn.",
        "{name} has reviewed *every1all2any+ single ordinance in that city.",
        "You must not allow *the1a2all+ use of these electronic gadgets.",
        "Mr. {surname} promised to pay for *that1those2these+ damaged fence.",
    ],
    4 => [
        "*All1Each2Every+ employees in our company undergo intensive job training.",
        "The organization was able to complete *that1these2those+ project on time.",
        "The old innkeeper froze in his tracks when he saw *a1any2many+ ghost.",
        "Nearly *every1the2this+ detail in that chemistry book is known to {name}.",
        "The villagers had encountered *many1any2every+ obstacles along the way.",
        "Their department is expediting *all1each2every+ deliveries of that commodity.",
        "To make ends meet, Mrs. {surname} worked as *a1the2each+ parking attendant.",
        "The rural doctors are doing their best to serve *the1all2any+ community.",
        "The student remembers each and *every1all2a+ question in that science quiz.",
        "{name} inspects each and *every1all2a+ product that they manufacture and sell.",
        "*Each1All2Some+ student present today will receive a book from the mayor.",
        "The handsome actor handed a rose to *each1all2any+ lady in attendance.",
        "The author gave *each1all2any+ student in the classroom a copy of his book.",
        "*Each1All2Any+ winner on the podium received a medal from the organizers.",
        "The mayor gave *each1all2any+ outstanding pupil in our school a scholarship.",
        "The ornithologist feeds *each1all2any+ bird in this cage a banana each day.",
        "You shouldn't waste even *a1the2any+ single drop of that expensive chemical.",
        "This is *the1a2any+ most sophisticated product to ever come out of our factory.",
        "{boy} was picked as a prime candidate for *the1each2any+ next batch of scholars.",
    ],
    5 => [
        "The store manager doesn't want to honor *the1some2each+ warranty for our television.",
        "Do you have *any1every2each+ documents proving that this product is safe for public use?",
        "The mayor and *the1all2any+ city council appreciated the efforts of those volunteers.",
        "*Each1All2Some+ basketball player on that team played at least thirty games last season.",
        "The activists were allowed to stage *a1every2any+ demonstration and talk to the mayor.",
        "{boy} and {girl} arrived at *the1each2any+ restaurant before noon and had their lunch there.",
        "The publishing company donated some science books to *every1all2any+ school in that town.",
        "The mayor should distribute scholarships to *all1every2each+ poor but deserving students.",
        "The students are diligently studying because they will soon have *a1all2any+ periodical test.",
        "The boys took off *their1that2any+ shoes to avoid scratching the newly varnished floors.",
        "Manila is a highly populated city and suffers from *many1any2each+ symptoms of urban blight.",
        "All he needed for his impromptu concert was *an1each2every+ electric guitar and an amplifier.",
        "I tried to correspond with *the1each2a few+ politician and convince him to support our scholars.",
        "{boy} and {girl} arrived at the train station and immediately bought *some1any2every+ tickets.",
        "The dedicated employee completed *the1any2each+ business plan and submitted it to the manager.",
        "His uncle was able to restore that antique car without spending *much1many2no+ money.",
        "{boy} should apply *this1these2those+ medicated cream to his face every night for one month.",
        "*All1Each2Every+ companies inside that export processing zone must adhere to certain rules.",
    ],
    6 => [
        "Superman simply puts on *a1the2each+ pair of eyeglasses and hunches his back to conceal his identity.",
        "They had *the1a2any+ mental toughness to finish the adventure, but they were too exhausted to go on.",
        "We were able to secure *a1every2any+ loan to buy the property, but someone else had bought it already.",
        "The company can either buy the software for this project or just develop *a1the2every+ similar one.",
        "The institution doesn't have *the1this2each+ financial capability nor political will to pursue this project.",
        "The physicist tried to finish his experiment before *that1each2any+ conference, but he ran out of time and resources.",
        "The problem of climate change is now upon us, but nobody seems to know *the1a2any+ best way to address it.",
        "Mankind's technology has advanced tremendously over *the1each2any+ years, but world peace is as elusive as ever.",
        "{boy} followed *the1each2any+ given instructions step by step, but he wasn't able to make the mechanism work.",
        "*That1Those2These+ pharmaceutical company registered record-breaking profits, so its investors are all ecstatic.",
        "You must not invest your money in *that1those2these+ business unless you have proof that it's legitimate.",
        "Please refrain from using *this1those2these+ tranquilizer gun on that animal unless your life is put in danger.",
        "Imelda consistently won *those1this2that+ spelling championships until Zenaida wrested the title from her.",
        "I think you should have your car's air conditioning unit fixed first before you embark on *that1those2these+ long drive.",
        "Our manager wants you to spearhead this campaign because you have *an1all2any+ impressive track record.",
        "Investments in *those1this2that+ companies immediately plummeted when news of their declining sales broke out.",
    ],
];

// ---- Parser (§5.1) — run once at definition time ----
function det_parse(string $raw): ?array {
    if (!preg_match('/\*([^+]+)\+/u', $raw, $m)) return null;
    $marker = $m[1];
    $parts = explode('1', $marker, 2);
    if (count($parts) !== 2) return null;
    $correct = $parts[0];
    $rest = explode('2', $parts[1], 2);
    if (count($rest) !== 2) return null;
    $wrong1 = $rest[0];
    $wrong2 = $rest[1];
    $sentence = preg_replace('/\*[^+]+\+/u', '____', $raw, 1);
    return [
        'sentence' => $sentence,
        'correct'  => $correct,
        'wrong'    => [$wrong1, $wrong2],
    ];
}

$dataByTier = [];
foreach ($rawByTier as $tier => $list) {
    $dataByTier[$tier] = [];
    foreach ($list as $raw) {
        $parsed = det_parse($raw);
        if ($parsed !== null) $dataByTier[$tier][] = $parsed;
    }
}

// ---- Helpers (§8.4, §8.6) ----
// Hugging sentence box — outer text-align:center wrapper + inner inline-flex
// that shrink-wraps content (inline-flex avoids width:fit-content + flex
// conflict; vertical-align:middle prevents baseline gap).
function det_box(string $html, int $minHeight = 100): void {
    echo '<div style="text-align:center;">'
       . '<div style="display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'vertical-align:middle;'
       . 'min-height:' . $minHeight . 'px;max-width:480px;'
       . 'margin:20px 0;padding:28px 40px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html
       . '</div>'
       . '</div>';
}

// Feedback sentence — replace the ____ blank with the answer in pink.
function det_fill_blank(string $sentence, string $answer): string {
    $esc = htmlspecialchars($sentence);
    $ans = '<strong style="color:#CC0066;">' . htmlspecialchars($answer) . '</strong>';
    return str_replace('____', $ans, $esc);
}

// ---- Question generation (§6) ----
function build_det_question(array $dataByTier, string $lvl, int $grd,
                            string $sessionKey, array $boys, array $girls,
                            array $surnames): ?array {
    $tier = resolve_det_tier($lvl, $grd);
    $pool = $dataByTier[$tier] ?? [];
    if (empty($pool)) return null;

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        $key = "t$tier:$i";
        if (!in_array($key, $used, true)) $available[] = ['key' => $key, 'idx' => $i];
    }
    if (empty($available)) {
        $prefix = "t$tier:";
        $used = array_values(array_filter($used, fn($k) => strpos($k, $prefix) !== 0));
        foreach ($pool as $i => $item) $available[] = ['key' => "t$tier:$i", 'idx' => $i];
    }
    $pick = $available[array_rand($available)];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $item = $pool[$pick['idx']];

    $name    = (rand(1, 2) === 1) ? $boys[array_rand($boys)] : $girls[array_rand($girls)];
    $boy     = $boys[array_rand($boys)];
    $girl    = $girls[array_rand($girls)];
    $surname = $surnames[array_rand($surnames)];

    $sentence = str_replace(
        ['{name}', '{boy}', '{girl}', '{surname}'],
        [$name, $boy, $girl, $surname],
        $item['sentence']
    );

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    return [
        'sentence' => $sentence,
        'correct'  => $item['correct'],
        'choices'  => $choices,
        'lvl'      => $lvl,
    ];
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = (strtolower($clicked) === strtolower($cur['correct']));
    $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) — with tier-1 fallback ----
if ($result === null || isset($_POST['Submit2'])) {
    $newQ = build_det_question($dataByTier, $lvl, $grd, $sessionKey, $boys, $girls, $surnames);
    if ($newQ !== null) {
        $_SESSION[$sessionKey]['current'] = $newQ;
    } elseif (!isset($_SESSION[$sessionKey]['current'])) {
        $fallback = build_det_question($dataByTier, 'Easy', 0, $sessionKey, $boys, $girls, $surnames);
        if ($fallback !== null) $_SESSION[$sessionKey]['current'] = $fallback;
    }
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
render_header($moduleTitle.'<br/>Grade '.$grd.' - '.$lvl,
              $moduleTitle.'<br/>Grade '.$grd.' - '.$lvl,
              $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $sentenceHtml = det_fill_blank($cur['sentence'], $cur['correct']);
    $ansEsc       = '<strong style="color:#CC0066;">\'' . htmlspecialchars($cur['correct']) . '\'</strong>';
    $sentenceLen  = strlen(strip_tags($sentenceHtml));
    $sentenceFont = ($sentenceLen > 150) ? '14pt' : ($sentenceLen > 100 ? '15pt' : ($sentenceLen > 60 ? '16pt' : '17pt'));
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php det_box(
      '<div style="font-size:' . $sentenceFont . ';color:#333;line-height:1.6;text-wrap:pretty;">'
    . $sentenceHtml
    . '</div>', 100
  ); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto 20px;line-height:1.55;text-wrap:balance;">
    The correct determiner is <?php echo $ansEsc; ?>.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'] ?? null;
    if ($q === null):
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#CC0000;margin:40px auto 20px;max-width:480px;">
    No question could be generated. Please try again.
  </p>
  <input type="submit" name="Submit2" value=" New Question " style="margin:20px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $sentenceEsc  = htmlspecialchars($q['sentence']);
    $sentenceLen  = strlen($sentenceEsc);
    $sentenceFont = ($sentenceLen > 150) ? '14pt' : ($sentenceLen > 100 ? '15pt' : ($sentenceLen > 60 ? '16pt' : '17pt'));
?>
  <div style="margin:35px auto 8px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Fill in the blank with the correct determiner.
  </div>
  <?php det_box(
      '<div style="font-size:' . $sentenceFont . ';color:#333;line-height:1.6;text-wrap:pretty;">'
    . $sentenceEsc
    . '</div>', 100
  ); ?>
  <div style="font-family:Arial,sans-serif;font-size:14pt;color:#666;max-width:480px;margin:0 auto 22px;">
    <br/>Click on the correct answer below.
  </div>
  <table border="0" cellspacing="14" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 3) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:130px;max-width:180px;min-height:64px;padding:12px 16px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif;
endif;
?>

<!-- Difficulty radios (§10.4 — Easy / Hard only, 12pt label) -->
<div align="center" style="margin-top:20px;">
  <p style="margin-bottom:0;color:#000080;font:12pt Arial,sans-serif;">Select difficulty level for next question:</p>
  <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
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