<?php
// english/modules/bias-text.php
// STATIC passage-interpretation + choice. Bypass QEngine per §D.
// Shows a persuasive passage; student clicks the bias technique it uses.
//
// Levels (§E — single-level collapse §5):
//   Legacy hardcoded $_SESSION['level']="Easy" with no level radios in the
//   HTML. Collapsed to $lvl='Easy' (preserves legacy 1-point value). No
//   selector rendered.
//
// Grade-keyed content (§10 — legacy quirk preserved):
//   Legacy used `if ($grd==8)` to swap in a much harder bank with LONG
//   descriptions ("to relate and appeal to the masses or common people")
//   instead of short technique names ("plain folks appeal"). All other
//   grades got the short-name bank. Grades 9-10 fell through to the short
//   version (likely legacy oversight but preserved per §5).
//
//   Preserved exactly:
//     $grd == 8  &#8594; $bankLong (34 questions, long descriptions)
//     all others &#8594; $bankShort (34 questions, short technique names)
//
// Prompt also differs by bank:
//     $grd == 8  &#8594; "What is the intention of the words used above?"
//     otherwise &#8594; "Click on the bias technique used above."
//
// 34 active questions per bank preserved verbatim. Legacy Q13 was empty
// (only a `//13` comment, no content) in both banks — skip preserved.
//
// Paragraph breaks: some passages have `<br/><br/>` before an attribution
// line (Q6, Q11, Q17, Q33, Q35). Rendered via bt_render_passage() which
// collapses all whitespace (so real newlines become spaces, matching
// browser text flow) then whitelists <br> tags back in.
//
// Font sizing matches journalistic-writing.php reference:
//   prompt 1.35rem · card 1.35rem · feedback card 1.25rem
//   hint 1.2rem · choice buttons 1.25rem
//   "Your answer is" 14pt · verdict 16pt (inline, unchanged)
//
// Choice layout (§14): maxLen &#8804; 17 &#8594; 2×2 grid; else 1-col hug.
// All grade-8 questions use 1-col (descriptions 30-50 chars).
// Non-grade-8 short bank: mostly 1-col (due to "glittering generality"
// 21 chars as a common distractor), 5 questions use 2×2 (Q7, Q12, Q16,
// Q26, Q29 — no "glittering generality" distractor).
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
//
// Theme: ex-27-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'bias-text.php'

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

$moduleTitle = 'Bias Techniques in Text';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$lvl         = 'Easy';   // single-level collapse (§5)

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Bank: default (short technique names) — 34 questions
// Legacy Q13 empty — skipped.
// ============================================================
$bankShort = [
    "I'm just an average person, who doesn't have money to throw away on a pair of athletic shoes that won't last as long as it takes to run around the block. GymFans athletic shoes combine quality and style with a price I can afford.=plain folks appeal[name-calling+fear]glittering generality",
    "Let's end the rule of the brain dead. Register now. Vote Martin on November.=name-calling[fear+bandwagon]glittering generality",
    "The whole world uses Fresh Mouth Wash. Don't miss out!=bandwagon[stereotyping+glittering generality]plain folks appeal",
    "Nothing compares to families. Skechers footwear is for families - buy your pairs at department stores nationwide.=plain folks appeal[name-calling+fear]glittering generality",
    "Don't allow the cowardly party ruin what we started in this regime. Re-elect the Nationalist Team and see the progress continue!=name-calling[fear+bandwagon]glittering generality",
    "\"Proactiv is a game changer. It's not just treating your acne, you're taking care of your skin at the same time.\"<br><br>- Adam Levine, singer-songwriter=testimonial[name-calling+glittering generality]bandwagon",
    "Approximately 1.35 million people die in road crashes each year, on average 3,700 people lose their lives every day on the roads. Be safe, drive a Trident now with triple security system.=fear[name-calling+bandwagon]stereotyping",
    "Being a girl, it's second-nature to be dependent on, submissive and passive to men. But it's a high time to switch roles. Take short courses on www.riverdalecolleges.com, and watch your career flourish after.=stereotyping[glittering generality+bandwagon]testimonial",
    "This man is your friend. He fights for freedom. Vote Ryan Levine for 2020 senate.=glittering generality[name-calling+bandwagon]testimonial",
    "Vote me, James Carter, man of the mass! Do we want another lazy politician to represent us?=name-calling[fear+bandwagon]glittering generality",
    "\"I finally found the coffee that goes well with my busy schedule!\"<br><br>- Kris Aquino, actress-host=testimonial[name-calling+glittering generality]bandwagon",
    "AIDS makes us equal. Protect yourself. Use Trustex brand. Available everywhere.=fear[name-calling+bandwagon]stereotyping",
    "Don't vote for a 'tree-hugger.' Protect our nation. Vote Davis.=name-calling[fear+bandwagon]glittering generality",
    "Don't be the dumb blond in your class. Avail our online tutoring services for only 10 dollars a month. Hassle-free registration, cancel anytime.=stereotyping[glittering generality+bandwagon]testimonial",
    "\"I won't wear a helmet. It makes me look uncool.\" These are the last words of a teenager who lost his life in a motor crash. Be safe, choose from a variety of Shield helmets now.=fear[name-calling+bandwagon]stereotyping",
    "\"I'm a professional basketball player. You have probably seen me grabbing rebounds and blocking the shots of the best players in the league. I couldn't perform like that on the court without the bounce I get from Nike athletic shoes.\"<br><br>- Lebron James=testimonial[name-calling+glittering generality]bandwagon",
    "Kelly Richards for a stronger America. Let's win this fight!=glittering generality[name-calling+bandwagon]testimonial",
    "Living in multi-cultural community? Be vigilant! Avail of our world-class quality lock systems and never be paranoid again.=stereotyping[glittering generality+bandwagon]testimonial",
    "Mike is your typical next-door big guy, but he made the shift. He traded his fat burgers to Subway sandwiches. From wearing a size 38 jeans to a size 31. If Mike can do it, so can you.=plain folks appeal[name-calling+fear]glittering generality",
    "This Mother's Day, get back to the job that really matters - cleaning the house. Use Mr. Clean for optimum cleaning power.=stereotyping[glittering generality+bandwagon]testimonial",
    "Use Crafter's Oils. Don't be the last one to use our products.=bandwagon[stereotyping+glittering generality]plain folks appeal",
    "Reeboks are outdated and for old folks. Come over to Nike, where the shoes teach you to fly while being fly.=name-calling[fear+bandwagon]glittering generality",
    "Trust the brand families have been using since 1950.=bandwagon[stereotyping+glittering generality]testimonial",
    "Make Manila great again. Vote for Andew Ilagan for 2020.=glittering generality[name-calling+bandwagon]testimonial",
    "Hit at 40 mph, there's a 70% chance I'll die. Hit at 30 mph, there's an 80% chance of I'll live. That's why it's speed limit 30. Follow the limit. Save your life.=fear[name-calling+bandwagon]stereotyping",
    "The Nationalist is for hope, progress, and change. Vote the Nationalist party list in the elections.=glittering generality[name-calling+bandwagon]testimonial",
    "Nine out of ten kids love Happy Hotdogs. Try it now!=bandwagon[testimonial+glittering generality]plain folks appeal",
    "She has nice hair, nice eyes, and nice teeth. But, these charms are wasted if she uses the wrong deodorant. Buy Wizard's Spell deodorant at 50% off in selected Aim malls nationwide.=fear[testimonial+bandwagon]stereotyping",
    "Maybelline, America's favorite mascara.=bandwagon[fear+glittering generality]plain folks appeal",
    "McDo mochas. Icy. Creamy. Dreamy. Chocolatey. Now available.=glittering generality[name-calling+bandwagon]testimonial",
    "Si Villar ang tunay na mahirap, si Villar ang tunay na may malasakit. Si Manny Villar ang magtatapos ng ating kahirapan.=plain folks appeal[name-calling+fear]testimonial",
    "\"I've shopped at Wally's for ten years now and I have never been disappointed.\"<br><br>-Mayor Sally McKinley=testimonial[name-calling+glittering generality]bandwagon",
    "Are you man enough to be a soldier? Register now and serve the country like a man.=stereotyping[glittering generality+bandwagon]testimonial",
    "\"Swift pick. In this business, you've got to be decisive. So I choose milk. Some studies suggest that teens who choose milk instead of sugary drinks tend to be leaner, and the protein helps build muscle. So eat right, exercise, drink 3 glasses of low-fat or fat-free milk a day. Music to my ears.\"<br><br>- Taylor Swift, artist, singer=testimonial[name-calling+glittering generality]bandwagon",
];

// ============================================================
// Bank: grade-8 (long descriptions) — 34 questions
// Legacy Q13 empty — skipped.
// ============================================================
$bankLong = [
    "I'm just an average person, who doesn't have money to throw away on a pair of athletic shoes that won't last as long as it takes to run around the block. GymFans athletic shoes combine quality and style with a price I can afford.=to relate and appeal to the masses or common people[to give the alternative a bad label or connotation+to scare one into agreeing with the message]to promise something wonderful or of extraordinary value",
    "Let's end the rule of the brain dead. Register now. Vote Martin on November.=to give the alternative a bad label or connotation[to scare one into agreeing with the message+to create a feeling of not wanting to be left behind]to promise something wonderful or of extraordinary value",
    "The whole world uses Fresh Mouth Wash. Don't miss out!=to create a feeling of not wanting to be left behind[to create a feeling of not wanting to be typecast+to promise something wonderful or of extraordinary value]to relate and appeal to the masses or common people",
    "Nothing compares to families. Skechers footwear is for families - buy your pairs at department stores nationwide.=to relate and appeal to the masses or common people[to give the alternative a bad label or connotation+to scare one into agreeing with the message]to promise something wonderful or of extraordinary value",
    "Don't allow the cowardly party ruin what we started in this regime. Re-elect the Nationalist Team and see the progress continue!=to give the alternative a bad label or connotation[to scare one into agreeing with the message+to create a feeling of not wanting to be left behind]to promise something wonderful or of extraordinary value",
    "\"Proactiv is a game changer. It's not just treating your acne, you're taking care of your skin at the same time.\"<br><br>- Adam Levine, singer-songwriter=to project the trustworthiness and credibility of a celebrity[to give the alternative a bad label or connotation+to promise something wonderful or of extraordinary value]to create a feeling of not wanting to be left behind",
    "Approximately 1.35 million people die in road crashes each year, on average 3,700 people lose their lives every day on the roads. Be safe, drive a Trident now with triple security system.=to scare one into agreeing with the message[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to create a feeling of not wanting to be typecast",
    "Being a girl, it's second-nature to be dependent on, submissive and passive to men. But it's a high time to switch roles. Take short courses on www.riverdalecolleges.com, and watch your career flourish after.=to create a feeling of not wanting to be typecast[to promise something wonderful or of extraordinary value+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "This man is your friend. He fights for freedom. Vote Ryan Levine for 2020 senate.=to promise something wonderful or of extraordinary value[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "Vote me, James Carter, man of the mass! Do we want another lazy politician to represent us?=to give the alternative a bad label or connotation[to scare one into agreeing with the message+to create a feeling of not wanting to be left behind]to promise something wonderful or of extraordinary value",
    "\"I finally found the coffee that goes well with my busy schedule!\"<br><br>- Kris Aquino, actress-host=to project the trustworthiness and credibility of a celebrity[to give the alternative a bad label or connotation+to promise something wonderful or of extraordinary value]to create a feeling of not wanting to be left behind",
    "AIDS makes us equal. Protect yourself. Use Trustex brand. Available everywhere.=to scare one into agreeing with the message[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to create a feeling of not wanting to be typecast",
    "Don't vote for a 'tree-hugger.' Protect our nation. Vote Davis.=to give the alternative a bad label or connotation[to scare one into agreeing with the message+to create a feeling of not wanting to be left behind]to promise something wonderful or of extraordinary value",
    "Don't be the dumb blond in your class. Avail our online tutoring services for only 10 dollars a month. Hassle-free registration, cancel anytime.=to create a feeling of not wanting to be typecast[to promise something wonderful or of extraordinary value+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "\"I won't wear a helmet. It makes me look uncool.\" These are the last words of a teenager who lost his life in a motor crash. Be safe, choose from a variety of Shield helmets now.=to scare one into agreeing with the message[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to create a feeling of not wanting to be typecast",
    "\"I'm a professional basketball player. You have probably seen me grabbing rebounds and blocking the shots of the best players in the league. I couldn't perform like that on the court without the bounce I get from Nike athletic shoes.\"<br><br>- Lebron James=to project the trustworthiness and credibility of a celebrity[to give the alternative a bad label or connotation+to promise something wonderful or of extraordinary value]to create a feeling of not wanting to be left behind",
    "Kelly Richards for a stronger America. Let's win this fight!=to promise something wonderful or of extraordinary value[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "Living in multi-cultural community? Be vigilant! Avail of our world-class quality lock systems and never be paranoid again.=to create a feeling of not wanting to be typecast[to promise something wonderful or of extraordinary value+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "Mike is your typical next-door big guy, but he made the shift. He traded his fat burgers to Subway sandwiches. From wearing a size 38 jeans to a size 31. If Mike can do it, so can you.=to relate and appeal to the masses or common people[to give the alternative a bad label or connotation+to scare one into agreeing with the message]to promise something wonderful or of extraordinary value",
    "This Mother's Day, get back to the job that really matters - cleaning the house. Use Mr. Clean for optimum cleaning power.=to create a feeling of wanting to be typecast[to promise something wonderful or of extraordinary value+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "Use Crafter's Oils. Don't be the last one to use our products.=to create a feeling of not wanting to be left behind[to create a feeling of not wanting to be typecast+to promise something wonderful or of extraordinary value]to relate and appeal to the masses or common people",
    "Reeboks are outdated and for old folks. Come over to Nike, where the shoes teach you to fly while being fly.=to give the alternative a bad label or connotation[to scare one into agreeing with the message+to create a feeling of not wanting to be left behind]to promise something wonderful or of extraordinary value",
    "Trust the brand families have been using since 1950.=to create a feeling of not wanting to be left behind[to create a feeling of not wanting to be typecast+to promise something wonderful or of extraordinary value]to project the trustworthiness and credibility of a celebrity",
    "Make Manila great again. Vote for Andew Ilagan for 2020.=to promise something wonderful or of extraordinary value[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "Hit at 40 mph, there's a 70% chance I'll die. Hit at 30 mph, there's an 80% chance of I'll live. That's why it's speed limit 30. Follow the limit. Save your life.=to scare one into agreeing with the message[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to create a feeling of not wanting to be typecast",
    "The Nationalist is for hope, progress, and change. Vote the Nationalist party list in the elections.=to promise something wonderful or of extraordinary value[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "Nine out of ten kids love Happy Hotdogs. Try it now!=to create a feeling of not wanting to be left behind[to project the trustworthiness and credibility of a celebrity+to promise something wonderful or of extraordinary value]to relate and appeal to the masses or common people",
    "She has nice hair, nice eyes, and nice teeth. But, these charms are wasted if she uses the wrong deodorant. Buy Wizard's Spell deodorant at 50% off in selected Aim malls nationwide.=to scare one into agreeing with the message[to project the trustworthiness and credibility of a celebrity+to create a feeling of not wanting to be left behind]to create a feeling of not wanting to be typecast",
    "Maybelline, America's favorite mascara.=to create a feeling of not wanting to be left behind[to scare one into agreeing with the message+to promise something wonderful or of extraordinary value]to relate and appeal to the masses or common people",
    "McDo mochas. Icy. Creamy. Dreamy. Chocolatey. Now available.=to promise something wonderful or of extraordinary value[to give the alternative a bad label or connotation+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "Si Villar ang tunay na mahirap, si Villar ang tunay na may malasakit. Si Manny Villar ang magtatapos ng ating kahirapan.=to relate and appeal to the masses or common people[to give the alternative a bad label or connotation+to scare one into agreeing with the message]to project the trustworthiness and credibility of a celebrity",
    "\"I've shopped at Wally's for ten years now and I have never been disappointed.\"<br><br>-Mayor Sally McKinley=to project the trustworthiness and credibility of a celebrity[to give the alternative a bad label or connotation+to promise something wonderful or of extraordinary value]to create a feeling of not wanting to be left behind",
    "Are you man enough to be a soldier? Register now and serve the country like a man.=to create a feeling of wanting to be typecast[to promise something wonderful or of extraordinary value+to create a feeling of not wanting to be left behind]to project the trustworthiness and credibility of a celebrity",
    "\"Swift pick. In this business, you've got to be decisive. So I choose milk. Some studies suggest that teens who choose milk instead of sugary drinks tend to be leaner, and the protein helps build muscle. So eat right, exercise, drink 3 glasses of low-fat or fat-free milk a day. Music to my ears.\"<br><br>- Taylor Swift, artist, singer=to project the trustworthiness and credibility of a celebrity[to give the alternative a bad label or connotation+to promise something wonderful or of extraordinary value]to create a feeling of not wanting to be left behind",
];

// ============================================================
// Parse + render helpers
// ============================================================
function bt_parse($entry) {
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

function bt_render_passage($raw) {
    // Collapse all whitespace (including real \n) to single spaces so the
    // container's <br>-injection JS doesn't fire on stray newlines. Then
    // escape, then restore only <br> tags.
    $s = preg_replace('/\s+/', ' ', $raw);
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
    $useLong   = ($grd == 8);
    $pool      = $useLong ? $bankLong : $bankShort;
    $poolKey   = $useLong ? 'used_long' : 'used_short';
    $used      = $_SESSION[$sessionKey][$poolKey] ?? [];

    $avail = [];
    foreach ($pool as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        if (bt_parse($entry) === null) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($pool as $i => $entry) {
            if (bt_parse($entry) !== null) $avail[] = $i;
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

    $parsed = bt_parse($pool[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    $choices = array_values(array_unique($choices));
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question' => $parsed['question'],
        'answer'   => $parsed['answer'],
        'choices'  => $choices,
        'long'     => $useLong,
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
  .bt-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 22px 28px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 500;
    color: #333;
    line-height: 1.3;
    text-align: center;
    box-sizing: border-box;
  }
  .bt-card.bt-feedback { font-size: 1.25rem; }
  .bt-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 40px auto 40px;
    line-height: 1.5;
  }
  .bt-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .bt-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .bt-grid-1col {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    gap: 12px;
    max-width: 100%;
    margin: 14px auto;
  }
  .bt-choice {
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
  .bt-choice:hover { background: #eef; border-color: #8080ff; }
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

    <div class="bt-card bt-feedback">
        <?php echo bt_render_passage($cur['question']); ?>
        <br><br>
        <span style="color:#CC0066; font-weight:700;">Bias technique:</span>
        <strong style="color:#800080; font-weight:700;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <div class="bt-card"><?php echo bt_render_passage($q['question']); ?></div>

    <p class="bt-prompt">
        <?php if ($q['long']): ?>
            What is the intention of the words used above?
        <?php else: ?>
            Click on the bias technique used above.
        <?php endif; ?>
    </p>

    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen((string)$c));
        $use2x2 = ($maxLen <= 17);
        $containerClass = $use2x2 ? 'bt-grid-2x2' : 'bt-grid-1col';
    ?>
    <div class="<?php echo $containerClass; ?>">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="bt-choice">
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