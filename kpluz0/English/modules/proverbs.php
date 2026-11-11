<?php
// english/modules/proverbs.php
// Proverbs — click the correct meaning of a proverb.
// Single level (Easy) — 4 choices at all times. Grade-aware pool:
//   grd 0–3  &#8594; simpler proverbs
//   grd 4–10 &#8594; more advanced proverbs
// Legacy had 3 levels, but its $arrnum branch was dead code — the real pool
// split was by grade (<4 vs >=4), preserved here. 4-choice count taken from
// legacy Hard (hardest of legacy's 2/3/4 choice progression) and applied to
// the single-level Easy label per the current request.

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
$moduleTitle = 'Proverbs';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector. Scorer still wants a level string.
$lvl = 'Easy';

// ---- Tier / pool selection (grade-aware) ----
function resolve_proverbs_tier(int $grd): int {
    return ($grd < 4) ? 1 : 2;
}

// ---- Data (§5) — verbatim from legacy, sentence-case definitions ----
$proverbsByTier = [
    1 => [
        "A chain is only as strong as its weakest link:What a team of people can do may be limited by the weakest member of that team",
        "A dog is a man's best friend:A dog always shows unconditional love and utmost loyalty to its master",
        "A drowning man will clutch at a straw:A person in a desperate situation will do even things that are unlikely to succeed to get out of that situation",
        "A friend in need is a friend indeed:A friend who is there to help you when you are in need of him is indeed a true friend of yours",
        "A fool and his money are soon parted:A person who doesn't spend his money wisely will soon lose all his money",
        "A house is not a home:It's the love, warmth, and security that your family gives you that makes your house a home",
        "A journey of a thousand miles begins with a single step:No matter how big an endeavor is, it has to be started for it to be finished",
        "A leopard cannot change its spots:A person can not change his true or innate nature",
        "A little knowledge is a dangerous thing:A small amount of knowledge can mislead people into thinking that they can do things that they really can't",
        "An ounce of prevention is worth a pound of cure:It's easier to prevent a problem from happening than to fix it after it has happened",
        "A stitch in time saves nine:If you address a problem immediately it may save extra work later",
        "A watched pot never boils:Time seems to drag endlessly when you're waiting for something to happen",
        "Absence makes the heart grow fonder:You feel more affection for those you love when parted from them",
        "Accidents will happen:No matter how careful you are, unfortunate or unforeseen events will occur in life",
        "Actions speak louder than words:What someone actually does means more than what they say they will do",
        "All's fair in love and war:In highly charged or demanding situations, any method of achieving your objective is justifiable",
        "Better late than never:Doing something, even if late, is better than not doing it at all",
        "Better safe than sorry:It's wiser to be cautious and careful than to be hasty and then do something you may regret later",
        "Beauty is in the eye of the beholder:What one person finds beautiful or admirable may not appeal to another",
        "Beauty is only skin deep:An attractive appearance does not mean a good character",
        "Birds of the same feather flock together:People with the same traits or interests tend to hang out together",
        "Blood is thicker than water:Family relationships and loyalties are stronger and more important than other kinds of relationships",
        "Boys will be boys:Mischievous or childish behavior is typical of boys or young men and should not cause surprise when it occurs",
        "Business before pleasure:You must first attend to all your responsibilities before engaging in recreational activities or relaxation",
        "Charity begins at home:A person must first provide the needs of his own family before those of other people",
        "Count your blessings:You must be grateful for what you have",
        "Don't put all your eggs in one basket:Don't risk everything you have on a single venture",
        "Easy come, easy go:A relationship or possession acquired without effort may be abandoned or lost quickly and without regret",
        "Enough is enough:No more of the same thing or behavior will be tolerated",
        "Every cloud has a silver lining:Every difficult or sad situation has a comforting or hopeful aspect, even though this may not be immediately apparent",
        "Every man has his price:Everyone can be bribed if the amount offered is large enough",
        "Fight fire with fire:Use the same weapons or tactics as your enemy or opponent, even if you find them distasteful",
        "Finders keepers, losers weepers:Whoever finds something by chance is entitled to keep it",
        "First come, first served:That people will be dealt with strictly in the order in which they arrive or apply",
        "First things first:You must deal with important matters first before dealing with less important ones",
        "Fortune favors the brave:A successful person is often one who is willing to take risks",
        "Great minds think alike:Intelligent people tend to come up with the same ideas, opinions, or choices",
        "Half a loaf is better than no bread:It is better to accept less than what one wants than to have nothing at all",
        "He who hesitates is lost:Delayed action or indecision may have unfortunate or disastrous consequences",
        "Home is where the heart is:Your home will always be the place for which you feel the deepest affection, no matter where you are",
        "Honesty is the best policy:Telling the truth, even if very difficult, is better than lying",
        "If it ain't broke, don't fix it:If something is effective or doing well, there is no need to change or replace it",
        "If you can't stand the heat, get out of the kitchen:If you can't deal with a difficult situation, you should just leave instead of complaining",
        "Imitation is the sincerest form of flattery:Copying someone is an implicit way of paying them a compliment",
        "It's no use crying over spilt milk:There is no point in regretting something that has already happened and cannot be reversed",
        "Jack of all trades, master of none:A person can do many different types of work, but he is not necessarily very competent at any of them",
        "Less is more:A minimalist approach to artistic or aesthetic matters is more effective",
        "Let bygones be bygones:Forget past offenses or conflicts and just be reconciled",
        "Lightning never strikes twice in the same place:An unusual situation or event is unlikely to happen again to the same person",
        "Like father, like son:A son's character or behavior can be expected to resemble that of his father",
        "Look before you leap:Don't act without first considering the possible consequences of your actions",
        "Make hay while the sun shines:Make good use of an opportunity while it's still there",
        "Many hands make light work:If everyone helps with a large task, it will get done easily and quickly",
        "Money is the root of all evil:Avarice or materialism gives rise to wicked actions",
        "Money talks:Wealth gives power and influence to those who possess it",
        "Necessity is the mother of invention:When the need for something becomes essential, you are forced to find ways of getting or achieving it",
        "No news is good news:Without information to the contrary you can assume that all is well",
        "No pain, no gain:Suffering is necessary in order to achieve something",
        "One good turn deserves another:If someone does you a favour, you should take the chance to repay it",
        "One man's meat is another man's poison:Things liked or enjoyed by one person may be distasteful to another",
        "Out of sight, out of mind:You soon forget people or things that are no longer visible or present",
        "Practice makes perfect:Regular exercise of an activity or skill is the way to become proficient in it",
        "Seeing is believing:Sometimes, you need to actually see something before accepting that it exists",
        "Silence is golden:Sometimes, it's best not to say anything at all",
        "Still waters run deep:People who say very little often have very interesting and complicated personalities or thoughts",
        "Spare the rod and spoil the child:If children are not punished when they do wrong, they will not learn obedience and good manners",
        "The early bird catches the worm:The person who takes the earliest opportunity to do something will gain the advantage over others",
        "The apple never falls far from the tree:Important family characteristics are usually inherited",
        "The grass is always greener on the other side of the fence:Other people's lives or situations always seem better than your own",
        "The pen is mightier than sword:Writing is more effective than military power or violence",
        "The proof of the pudding is in the eating:The real value of something can be judged only from practical experience or results and not from appearance or theory",
        "There's more than one way to skin a cat:There's more than one way of achieving one's aim or solving a problem",
    ],
    2 => [
        "A cat may look at a king:Even a person of low status or importance has rights",
        "A change is as good as a rest:A change of job can provide relief or be as refreshing as a period of rest",
        "A golden key can open any door:Money can let you do anything",
        "A nod's as good as a wink to a blind horse:A small hint, even without further explanation, is enough to convey what one means",
        "A new broom sweeps clean:A person who is new to a position of responsibility tends to make more impact by introducing changes or new approaches",
        "A miss is as good as a mile:A failure is still a failure, no matter how narrow the margin is from success",
        "A rolling stone gathers no moss:A person who does not settle in one place will not accumulate wealth or status, or responsibilities or commitments",
        "A trouble shared is a trouble halved:Talking to another person about your problems helps to alleviate them",
        "All roads lead to Rome:There are many different ways of reaching the same goal or conclusion",
        "All's well that ends well:If the outcome of a situation is happy, any previous difficulty or unpleasantness is negated",
        "An Englishman's home is his castle:A person's home is a place where he may do as he pleases and from which he may exclude anyone he chooses",
        "Any port in a storm:Under very adverse circumstances, any source of relief or escape is welcome",
        "Better the devil you know than the devil you don't:It's wiser to deal with an undesirable but familiar situation than to risk a change that might lead to an even worse situation",
        "Brevity is the soul of wit:The essence of a witty statement lies in its concise wording and delivery",
        "Discretion is the better part of valor:It's better to avoid a dangerous situation than to confront it",
        "Distance lends enchantment to the view:Things look better from further away",
        "Don't change horses in midstream:Don't make major changes to an activity that has already begun",
        "Don't look a gift horse in the mouth:It's improper to find fault with something that someone has given to you",
        "Enough is as good as a feast:Moderation is more satisfying than excess",
        "Even a worm will turn:Even a meek person will resist or retaliate if pushed too far",
        "Every dog has its day:Everyone will have good luck or success at some point in their lives",
        "Every man for himself, and the devil take the hindmost:Everyone should look after his own interests rather than those of others",
        "Faint heart never won fair lady:Being timid will prevent you from achieving your objective",
        "Familiarity breeds contempt:Extensive knowledge of or experience with someone's faults can lead to a loss of respect for that person",
        "Fine words butter no parsnips:Nothing is achieved by empty promises or flattery",
        "Fools rush in where angels fear to tread:People without good judgement will tackle a dangerous or difficult situation that even the wisest would avoid",
        "Forewarned is forearmed:Prior knowledge of possible dangers or problems of a situation gives one an advantage in dealing with it",
        "Give a dog a bad name and hang him:Once your good reputation is tainted, it's almost impossible to get it back",
        "Give a man enough rope and he will hang himself:Giving a person enough freedom to do what he wants can lead to actions that will result in his own downfall",
        "Handsome is as handsome does:Character and behaviour are more important than physical attractiveness",
        "He who laughs last laughs longest:A person who does you wrong may rejoice at first, but you'll experience greater joy once you get your revenge",
        "He who pays the piper calls the tune:The person who provides the money for something has the right to determine how it's spent",
        "Hell hath no fury like a woman scorned:A woman who has been rejected by a man can be ferociously angry and vindictive",
        "Hope springs eternal:It is human nature to always find a reason to be optimistic",
        "Horses for courses:Different things suit different people",
        "If the cap fits, wear it:If someone is being criticized, he should accept it if it's the truth",
        "If wishes were horses, beggars would ride:You'll only achieve your objectives by working for them, and not by simply wishing for them",
        "He who sups with the devil should have a long spoon:A person who deals with evil people should be very careful",
        "It takes all sorts to make a world:People vary greatly in character, tastes, and abilities",
        "Keep your powder dry:Always be ready for a possible emergency or crisis",
        "It never rains but it pours:Misfortunes tend to happen in large numbers and at the same time",
        "Least said, soonest mended:A difficult situation will be resolved more quickly if there is no more discussion of it",
        "Let sleeping dogs lie:Leave a peaceful person or situation alone since any agitation might lead to trouble",
        "Many a little makes a mickle:Many small amounts accumulate to make a large amount",
        "Many a true word is spoken in jest:A humorous remark not intended to be taken seriously may turn out to be accurate after all",
        "Marry in haste, repent at leisure:Those who rush impetuously into marriage may spend a long time regretting it",
        "Make haste slowly:Act quickly, but not so quickly that you make careless mistakes",
        "Needs must when the devil drives:Sometimes events force you to do something you would rather not",
        "Ne'er cast a clout till May be out:Do not discard your winter clothes until the end of May",
        "Nothing succeeds like success:Success leads to opportunities for further and greater successes",
        "Once bitten, twice shy:An unpleasant experience makes one more cautious",
        "One swallow does not make a summer:A single fortunate event doesn't mean that what follows will also be good",
        "People who live in glass houses shouldn't throw stones:You shouldn't criticize others when you have similar faults of your own",
        "Pride goes before a fall:If you're too conceited or self-important, something will happen to make you look foolish",
        "Procrastination is the thief of time:If you delay doing something, it will take longer to do later on",
        "Revenge is a dish best served cold:Vengeance is often more satisfying if it is not exacted immediately",
        "The darkest hour is just before the dawn:Expect things to start improving soon when they seem to be at their worst",
        "The devil finds work for idle hands to do:If someone doesn't have enough work to occupy them, they are liable to cause or get into trouble",
        "The devil looks after his own:Success or good fortune often seems to come to those who least deserve it",
        "The road to hell is paved with good intentions:Deeds of people who mean well sometimes result in unforeseen bad consequences",
        "There's honour among thieves:Dishonest people may have certain standards of behaviour which they will respect",
        "There's many a good tune played on an old fiddle:Someone's abilities do not depend on their being young",
        "There's no fool like an old fool:A foolish behavior looks even more foolish if it is done by an older person",
    ],
];

// ---- Pre-parse (§5.1) — normalize trailing period into the definition ----
$itemsByTier = [];
foreach ($proverbsByTier as $tier => $rawList) {
    $itemsByTier[$tier] = [];
    foreach ($rawList as $raw) {
        $pos = strpos($raw, ':');
        if ($pos === false) continue;
        $q   = trim(substr($raw, 0, $pos));
        $def = rtrim(trim(substr($raw, $pos + 1)), '.');
        if ($q === '' || $def === '') continue;
        $itemsByTier[$tier][] = ['q' => $q, 'def' => $def . '.'];
    }
}

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function proverbs_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
    $sizing = ($widthPx > 0)
        ? 'width:' . $widthPx . 'px;max-width:100%;'
        : 'max-width:480px;';
    echo '<div style="' . $sizing
       . 'min-height:' . $minHeight . 'px;margin:16px auto 10px;padding:14px 20px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:inline-flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}

function proverbs_compute_width(string $text, int $charPx = 11, int $maxWidthPx = 460, int $minWidthPx = 240): int {
    $plain = trim($text);
    if ($plain === '') return $minWidthPx;
    $horizontalSpace = 46;
    $longest = strlen($plain);
    return max($minWidthPx, min($maxWidthPx, $longest * $charPx + $horizontalSpace));
}

function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
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
    $tier = resolve_proverbs_tier($grd);
    $pool = $itemsByTier[$tier] ?? $itemsByTier[1];
    if (empty($pool)) $pool = $itemsByTier[1];

    $numChoices = 4;

    // No-repeat pick
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        if (!in_array($i, $used, true)) $available[] = $i;
    }
    if (empty($available)) {
        $used = [];
        $available = array_keys($pool);
    }
    $correctIdx = $available[array_rand($available)];
    $correct    = $pool[$correctIdx];
    $used[]     = $correctIdx;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    // Distractors from the same pool (grade-appropriate)
    $poolIdx = array_keys($pool);
    shuffle($poolIdx);
    $distractorDefs = [];
    foreach ($poolIdx as $di) {
        if ($di === $correctIdx) continue;
        $distractorDefs[] = $pool[$di]['def'];
        if (count($distractorDefs) >= $numChoices - 1) break;
    }

    $choices = array_merge([$correct['def']], $distractorDefs);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'proverb' => $correct['q'],
        'answer'  => $correct['def'],
        'choices' => $choices,
        'lvl'     => $lvl,
        'tier'    => $tier,
    ];
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
render_header($moduleTitle.' - Grade '.$grd, $moduleTitle.' - Grade '.$grd, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $proverbEsc  = htmlspecialchars($cur['proverb']);
    $answerNoDot = rtrim($cur['answer'], '.');
    $meaningLine = "The proverb '{$cur['proverb']}' means '" . $answerNoDot . "'.";
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:500px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:500px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#800080;max-width:560px;margin:20px auto;line-height:1.55;">
    <?php echo bind_last_words($meaningLine); ?>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:45px auto 25px;font-family:Arial,sans-serif;font-size:10pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $proverbEsc = htmlspecialchars($q['proverb']);
    $proverbW   = proverbs_compute_width($q['proverb'], 11, 500, 260);

    // Uniform choice-box width from longest choice, capped at 560
    $maxLen = 0;
    foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
    $choiceBoxW = max(300, min(480, $maxLen * 8 + 50));
?>
  <div style="margin:35px auto 15px;font-family:Arial,sans-serif;font-size:14pt;font-weight:700;color:#800080;max-width:560px;text-wrap:balance;">
    Click on the correct meaning of this proverb:
  </div>
  <?php proverbs_box(
      '<div style="font-size:18pt;font-weight:700;color:#0000AA;line-height:1.3;">'
    . $proverbEsc
    . '</div>'
  , 80, $proverbW); ?>
  <div style="display:flex;flex-direction:column;align-items:center;gap:12px;width:fit-content;margin:20px auto;padding:0 8px;box-sizing:border-box;">
  <?php foreach ($q['choices'] as $c): ?>
    <a href="?ansclick=<?php echo urlencode($c); ?>"
       style="display:flex;align-items:center;justify-content:center;
              width:<?php echo $choiceBoxW; ?>px;min-height:60px;padding:14px 20px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
              font-size:14pt;font-weight:500;text-align:center;
              word-break:break-word;box-sizing:border-box;line-height:1.45;">
      <?php echo htmlspecialchars($c); ?>
    </a>
  <?php endforeach; ?>
  </div>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:55px auto 30px;font-family:Arial,sans-serif;font-size:10pt;">
<?php endif; ?>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>