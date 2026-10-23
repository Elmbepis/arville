<?php
// math/modules/ordinal0.php
//
// MULTI-MODE module:
//
//   EASY — two variants, randomly chosen per question:
//     (a) Ordinal: "What is the ordinal position of letter 'C'?"
//     (b) Letter:  "Which letter is in the 3rd position?"
//     Both variants: 10 unique letters split 2 rows of 5, right arrows at
//     each wrap edge (no vertical arrow), no highlight, 4 unique choices.
//
//   HARD — Sentence from word banks; student types the Nth non-space letter.
//
// Answer path:
//   Easy  &#8594; GET ?ansclick=<value>  (render_choices)
//   Hard  &#8594; POST Submit1 (free-text)

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

$moduleTitle = 'Ordinal Numbers';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
$grd = (int)($_SESSION['grade'] ?? 0);

// &#9472;&#9472; Hard-mode phrase templates &#9472;&#9472;
$phraseTemplates = [
    1 => [
        'prefixes' => ['a large box of','a big basket of','is collecting','got a gift of','showed me some'],
        'items' => ['bouncy balls','walking dolls','thick books','action figures','magic pencils',
                    'toy cars','toy trucks','nice crayons','color pens','sweet candies',
                    'sports cards','magazines','toy robots','fancy shirts','cool shoes'],
    ],
    2 => [
        'prefixes' => ['is taking care of some','will be really afraid of','inside a cage full of',
                       'was watching a bunch of','in the zoo with lots of'],
        'items' => ['crocodiles','snakes','lions','zebras','alligators','giraffes','monkeys',
                    'iguanas','tigers','elephants','birds','bears','turtles','wild pigs','wolves'],
    ],
    3 => [
        'prefixes' => ['talking to a lot of','working hard with many','will meet a group of',
                       'party for a bunch of','got a big surprise from'],
        'items' => ['lawyers','teachers','doctors','nurses','mayors','actors','priests','soldiers',
                    'writers','singers','cooks','traders','artists','bakers','drivers'],
    ],
    4 => [
        'prefixes' => ['eating lots of','a plate of','shared some','satisfied with','will cook some'],
        'items' => ['toasted bread','fried chicken','baked macaroni','vegetable soup',
                    'chocolate cake','spaghetti','fruit salad','grilled fish','roasted duck',
                    'sweet corn','crispy shrimps','tender ribs','chewy cookies',
                    'cold drinks','juicy steak'],
    ],
    5 => [
        'prefixes' => ['am really fond of','would like to see','great moments with',
                       'thankful for','might find some'],
        'items' => ['red roses','wooden toys','coloring books','cute puppies','big goldfish',
                    'nice paintings','butterflies','lollipops','old photos','greeting cards',
                    'great movies','sweet songs','rare stamps','little kittens','ice cream'],
    ],
];

$phraseTemplatesSimple = [
    1 => ['a box of','a basket of','collecting','a gift of','showed me some'],
    2 => ['taking care of','really afraid of','a cage full of','a bunch of','in the zoo with'],
    3 => ['talking to some','working hard with','will meet more','party for a bunch of','got a big surprise from'],
    4 => ['eating lots of','a plate of','shared some','pleased with','will cook some'],
    5 => ['am fond of','like to see','great moments with','thankful for','might find'],
];

/** 1 &#8594; "1st", 22 &#8594; "22nd", etc. */
function ordinalSuffix($n) {
    $n = (int)$n;
    $mod100 = $n % 100;
    if ($mod100 >= 11 && $mod100 <= 13) return $n . 'th';
    switch ($n % 10) {
        case 1: return $n . 'st';
        case 2: return $n . 'nd';
        case 3: return $n . 'rd';
        default: return $n . 'th';
    }
}

// ============================================================
// HANDLE ANSWER
// ============================================================
$result = null;
$scorer = null;

$curMode = $_SESSION[$sessionKey]['current']['mode'] ?? null;

if ($curMode === 'letters' && isset($_GET['ansclick'])) {
    $cur      = $_SESSION[$sessionKey]['current'];
    $selected = (string)$_GET['ansclick'];

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($selected, $cur['answer'], $cur['lvl']);

    $result = [
        'correct'      => $correct,
        'selected'     => $selected,
        'mode'         => 'letters',
        'variant'      => $cur['variant'],
        'answer'       => $cur['answer'],
        'targetPos'    => $cur['targetPos'],
        'targetIdx'    => $cur['targetIdx'],
        'targetLetter' => $cur['targetLetter'],
        'letters'      => $cur['letters'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}
elseif ($curMode === 'phrase' && isset($_POST['Submit1'])) {
    $cur = $_SESSION[$sessionKey]['current'];

    $raw = trim((string)($_POST['answer'] ?? ''));
    $userInput = strtolower($raw);

    $scorer  = new Scorer($conn, $moduleId);
    $correct = $scorer->processAnswer($userInput, $cur['answer'], $cur['lvl']);

    $result = [
        'correct'   => $correct,
        'userInput' => $raw,
        'mode'      => 'phrase',
        'answer'    => $cur['answer'],
        'targetPos' => $cur['targetPos'],
        'phrase'    => $cur['phrase'],
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE NEW QUESTION
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($lvl === 'Easy') {
        $letters = [];
        $tries = 0;
        while (count($letters) < 10 && $tries < 100) {
            $c = chr(rand(65, 90));
            if (!in_array($c, $letters, true)) $letters[] = $c;
            $tries++;
        }
        while (count($letters) < 10) $letters[] = chr(rand(65, 90));

        $targetPos    = rand(1, 10);
        $targetIdx    = $targetPos - 1;
        $targetLetter = $letters[$targetIdx];

        $variant = (rand(0, 1) === 0) ? 'ordinal' : 'letter';

        if ($variant === 'ordinal') {
            // Pool of 9 wrong positions — array_diff compares by VALUE
            $otherPositions = array_values(array_diff(range(1, 10), [$targetPos]));
            shuffle($otherPositions);
            $choiceNums = array_slice($otherPositions, 0, 3);
            $choiceNums[] = $targetPos;
            shuffle($choiceNums);
            $choices = array_map('ordinalSuffix', $choiceNums);
            $answer  = ordinalSuffix($targetPos);
        } else {
            // Pool of 9 wrong letters from the same row
            $otherLetters = array_values(array_diff($letters, [$targetLetter]));
            shuffle($otherLetters);
            $choiceLetters = array_slice($otherLetters, 0, 3);
            $choiceLetters[] = $targetLetter;
            shuffle($choiceLetters);
            $choices = $choiceLetters;
            $answer  = $targetLetter;
        }

        $_SESSION[$sessionKey]['current'] = [
            'mode'         => 'letters',
            'variant'      => $variant,
            'letters'      => $letters,
            'targetIdx'    => $targetIdx,
            'targetPos'    => $targetPos,
            'targetLetter' => $targetLetter,
            'answer'       => $answer,
            'choices'      => $choices,
            'lvl'          => $lvl,
        ];
    } else {
        $simple = ($grd < 1);
        $group  = rand(1, 5);

        if ($simple) {
            $prefix = $phraseTemplatesSimple[$group][rand(0, 4)];
        } else {
            $pfx = $phraseTemplates[$group]['prefixes'];
            $prefix = $pfx[rand(0, count($pfx) - 1)];
        }
        $items = $phraseTemplates[$group]['items'];
        $i1 = rand(0, count($items) - 1);
        do { $i2 = rand(0, count($items) - 1); } while ($i2 === $i1);

        $phrase     = $prefix . ' ' . $items[$i1] . ' and ' . $items[$i2];
        $phraseNoSp = preg_replace('/\s+/', '', $phrase);
        $maxPos     = min(30, strlen($phraseNoSp));
        $targetPos  = rand(1, $maxPos);
        $answer     = strtolower($phraseNoSp[$targetPos - 1]);

        $_SESSION[$sessionKey]['current'] = [
            'mode'      => 'phrase',
            'phrase'    => $phrase,
            'targetPos' => $targetPos,
            'answer'    => $answer,
            'lvl'       => $lvl,
        ];
    }
    $q = $_SESSION[$sessionKey]['current'];
}

/**
 * Render 10 letters in 2 rows of 5.
 * Row 1 ends with a right arrow; row 2 starts with a right arrow.
 * No vertical/down arrow between rows.
 */
function renderLettersRow($letters) {
    $perRow    = 5;
    $rows      = array_chunk($letters, $perRow);
    $totalRows = count($rows);

    $arrowStyle = "color:#CC0066; font-size:25pt; font-weight:900;"
                . " line-height:1; padding:0 4px;"
                . " -webkit-text-stroke:1px #CC0066;"
                . " text-shadow:0 0 1px #CC0066, 0 0 1px #CC0066;";

    echo '<div style="text-align:center; margin:20px auto;">';

    foreach ($rows as $rowIdx => $rowLetters) {
        echo '<div style="display:inline-flex; justify-content:center; align-items:center;'
           . ' gap:2px; margin:4px 0; flex-wrap:nowrap;">';

        if ($rowIdx > 0) {
            echo '<span style="' . $arrowStyle . '">&rarr;</span>';
        }

        foreach ($rowLetters as $i => $letter) {
            if ($i > 0) {
                echo '<span style="' . $arrowStyle . '">&rarr;</span>';
            }
            echo '<div style="width:60px; height:74px; display:inline-flex;'
               . ' align-items:center; justify-content:center; background:#f8f8ff;'
               . ' border:3px solid #b0b0d8; border-radius:12px;'
               . ' font-family:\'Comic Sans MS\',sans-serif;'
               . ' font-size:25pt; font-weight:700; color:#800080;'
               . ' box-sizing:border-box;">'
               . htmlspecialchars($letter)
               . '</div>';
        }

        if ($rowIdx < $totalRows - 1) {
            echo '<span style="' . $arrowStyle . '">&rarr;</span>';
        }

        echo '</div>';
    }

    echo '</div>';
}

/**
 * Render the phrase. $highlight=true highlights the target character.
 */
function renderPhrase($phrase, $targetPos, $highlight) {
    $out = '<p style="font-family:\'Comic Sans MS\',sans-serif;'
         . ' font-size:16pt; font-weight:500; color:#800080;'
         . ' text-align:center; line-height:1.6; margin:15px auto; max-width:600px;">';
    if (!$highlight) {
        $out .= htmlspecialchars($phrase);
    } else {
        $nonSpaceCount = 0;
        foreach (preg_split('//u', $phrase, -1, PREG_SPLIT_NO_EMPTY) as $c) {
            if ($c !== ' ') {
                $nonSpaceCount++;
                if ($nonSpaceCount === $targetPos) {
                    $out .= '<strong style="color:#CC0066; background:#fff3f8;'
                          . ' padding:2px 6px; border-radius:6px;">'
                          . htmlspecialchars($c) . '</strong>';
                    continue;
                }
            }
            $out .= htmlspecialchars($c);
        }
    }
    $out .= '</p>';
    return $out;
}

// ============================================================
// RENDER
// ============================================================
render_header($moduleTitle, $moduleTitle);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <?php if ($result !== null): ?>
        <br>
        <?php if ($result['mode'] === 'letters'): ?>
            <p style="font-size:14pt; color:#666;">
                Your answer:
                <strong style="color:#0000CC; font-size:18pt;">'<?php echo htmlspecialchars($result['selected']); ?>'</strong>
            </p>
        <?php else: ?>
            <p style="font-size:14pt; color:#666;">
                Your answer:
                <strong style="color:#0000CC;">'<?php echo htmlspecialchars($result['userInput']); ?>'</strong>
            </p>
        <?php endif; ?>
        <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
            <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
        </p>

        <?php if ($result['mode'] === 'letters'): ?>
            <p style="font-size:15pt; font-weight:700; color:#800080;">
                Counting from the left, the letter
                <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['targetLetter']); ?>'</strong>
                is at the
                <strong style="color:#CC0066;"><?php echo htmlspecialchars(ordinalSuffix($result['targetPos'])); ?></strong>
                position.
            </p>
            <?php renderLettersRow($result['letters']); ?>
        <?php else: ?>
            <p style="font-size:15pt; font-weight:700; color:#800080;">
                The <?php echo ordinalSuffix($result['targetPos']); ?>
                letter in the phrase is
                <strong style="color:#CC0066;">'<?php echo htmlspecialchars($result['answer']); ?>'</strong>.
            </p>
            <?php echo renderPhrase($result['phrase'], $result['targetPos'], true); ?>
        <?php endif; ?>

    <?php else: ?>
        <br>
        <?php if ($q['mode'] === 'letters'): ?>

            <?php if ($q['variant'] === 'ordinal'): ?>
                <p style="font-size:15pt; font-weight:700; color:#CC0066; line-height:1.5;">
                    Counting from the left, what is the<br>
                    ordinal position of the letter
                    <span style="color:#CC0066; font-size:20pt;">'<?php echo htmlspecialchars($q['targetLetter']); ?>'</span>?
                </p>
            <?php else: ?>
                <p style="font-size:15pt; font-weight:700; color:#CC0066;">
                    Counting from the left, which letter<br/>is in the
                    <span style="color:#CC0066; font-size:20pt;"><?php echo ordinalSuffix($q['targetPos']); ?></span>
                    position?
                </p>
            <?php endif; ?>

            <?php renderLettersRow($q['letters']); ?>
            <p style="font-size:13pt; color:#666; margin-top:10px;">
                Follow the arrows: left-to-right, then continue on the next row.
            </p>
            <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>

        <?php else: ?>
            <p style="font-size:15pt; font-weight:700; color:#CC0066;">
                What is the <?php echo ordinalSuffix($q['targetPos']); ?> letter in the phrase below?
            </p>
            <?php echo renderPhrase($q['phrase'], $q['targetPos'], false); ?>
            <p style="font-size:12pt; color:#666;">Note: don't count the spaces.</p>
            <p style="font-size:15pt; font-weight:700; color:#0000AA; margin:15px 0;">
                Answer:
                <input type="text" name="answer" class="answer-input"
                       style="width:70px; height:44px; font-size:26px; text-transform:lowercase;"
                       maxlength="1" autocomplete="off" autofocus>
            </p>
        <?php endif; ?>
    <?php endif; ?>

    <div>
        <?php if ($result === null && $q['mode'] === 'phrase'): ?>
            <input type="submit" name="Submit1" value="Submit">
            <span style="display:inline-block; width: 20px;"></span>
        <?php endif; ?>
        <br/><input type="submit" name="Submit2" value="New Question"<?php if ($result !== null): ?> style="margin: 30px 0;"<?php endif; ?>>
    </div>

    <div align="center" style="margin-top: 20px;">
        <p style="margin-top: 5px; margin-bottom: 0">
            <font face="Verdana" style="font-size: 10pt;" color="#000080">
                Select difficulty level for next question:
            </font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size: 9pt;">
                        <font color="#800080">
                            <input type="radio" name="level" value="<?php echo $l; ?>"
                                <?php echo $lvl === $l ? 'checked' : ''; ?>>
                            <b>&nbsp;<?php echo $l; ?></b>
                        </font>
                    </font>
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