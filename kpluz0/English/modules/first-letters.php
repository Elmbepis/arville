<?php
// modules/first-letters.php – the module that uses the shared container

require_once __DIR__ . '/../container.php';
require_once __DIR__ . '/../scorer.php';

// ===== DATABASE CONNECTION =====
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$page_title = "What's the First Letter?";
$page_heading = "What's the <span class='blue'>First</span> <span class='red'>Letter</span>?";

render_header($page_title, $page_heading);

// ============================================================
// WORD LISTS – only Easy and Hard
// ============================================================
$wordLists = [
    'Easy' => [
        "bag", "bat", "bed", "bee", "boy", "bug", "bun", "bus", "cake", "cap", "car", "cat", "cup", "doe", "dog", "ear", "fan", "fox", "gum", "ham", "hat", "hen",
        "hog", "hug", "hut", "jam", "jar", "leg", "man", "mop", "mug", "net", "nut", "pan", "pen", "pie", "pig", "pot", "rag", "rat", "sun", "ten", "tin", "top", "toy",
        "bell", "boat", "bone", "coat", "cone", "cop", "cot", "deer", "doll", "duck", "eat", "eel", "elf", "fat", "feet", "fish", "five", "goat", "gem", "hip", "hoe",
        "ice", "jeep", "jet", "jug", "keg", "kite", "lamb", "log", "mail", "map", "mat", "meat", "nail", "nun", "pail", "peas", "pen", "pet", "pie", "pin", "ram",
        "rose", "rug", "sea", "seal", "seed", "sock", "star", "tail", "tie", "toad", "toes", "van", "web"
    ],
    'Hard' => [
        "apple", "bake", "banana", "band", "barn", "beads", "beak", "beans", "bird", "bowl", "card", "cart", "cube", "date", "desk", "dike", "dish", "farm",
        "flag", "fork", "frog", "gate", "hand", "hear", "heel", "hill", "hump", "jail", "king", "kitten", "lamp", "lips", "lock", "mask", "meal", "nest",
        "orange", "pencil", "pond", "puppy", "quail", "queen", "read", "rice", "road", "rock", "sail", "sleep", "snail", "snake", "spoon", "table", "tank",
        "tiger", "train", "tree", "well", "whale", "wheel",
        "apple", "bake", "banana", "band", "barn", "beads", "beak", "beans", "bell", "bike", "bird", "boat", "bone", "bowl", "cake", "card", "cart", "coat", "cone",
        "cube", "date", "deer", "desk", "dike", "dish", "duck", "farm", "feet", "five", "flag", "fork", "frog", "gate", "goat", "hand", "hear", "heel", "hill", "hump",
        "jail", "jeep", "king", "kite", "kitten", "lamb", "lamp", "lips", "lock", "mail", "mask", "meal", "meat", "nail", "nest", "orange", "pail", "peas", "pencil",
        "pond", "puppy", "quail", "queen", "read", "rice", "road", "rock", "rose", "sail", "seal", "seed", "sleep", "snail", "snake", "sock", "spoon", "star", "table",
        "tail", "tank", "tiger", "toad", "toes", "train", "tree", "well", "whale", "wheel"
    ]
];

// ============================================================
// MODULE LOGIC
// ============================================================
if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 'Easy';
}

if (isset($_POST['level'])) {
    $_SESSION['level'] = $_POST['level'];
}

$result = null;
$wordData = null;

// ----- Helper: get a question (with image existence check) -----
function getQuestion($wordList, &$usedWords) {
    // Get available words (excluding already used ones)
    $available = array_diff($wordList, $usedWords);
    if (empty($available)) {
        // Reset used words if we've gone through all of them
        $usedWords = [];
        $available = $wordList;
    }

    // We'll search for a word with an existing image
    $word = null;
    $imagePath = null;
    $maxAttempts = 100;
    $attempts = 0;

    // Make a copy of available to iterate safely
    $tempAvailable = $available;

    while ($attempts < $maxAttempts && !empty($tempAvailable)) {
        // Pick a random word from the temporary list
        $index = array_rand($tempAvailable);
        $candidate = $tempAvailable[$index];
        $testPath = $_SERVER['DOCUMENT_ROOT'] . "/arville/kpluz0/English/images/nouns/" . $candidate . ".jpg";

        if (file_exists($testPath)) {
            // Found a valid word with an image
            $word = $candidate;
            $imagePath = "/arville/kpluz0/English/images/nouns/" . $word . ".jpg";
            // Remove it from the temporary list so it's not used again in this session
            unset($tempAvailable[$index]);
            // Also, we should update $usedWords to include this word
            $usedWords[] = $word;
            $_SESSION['used_words'] = $usedWords;
            break;
        } else {
            // Image missing – remove this word from the temporary list and try again
            unset($tempAvailable[$index]);
        }
        $attempts++;
    }

    // If no word found (all images missing), fallback to the first word in the list
    if ($word === null) {
        $word = reset($wordList);
        $imagePath = "/arville/kpluz0/English/images/nouns/" . $word . ".jpg";
        // If even that fails, use default.jpg
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
            $imagePath = "/arville/kpluz0/English/images/nouns/default.jpg";
        }
        // Add to used words
        $usedWords[] = $word;
        $_SESSION['used_words'] = $usedWords;
    }

    // Prepare the answer and choices
    $answer = strtolower($word[0]);
    $choices = [$answer];
    while (count($choices) < 3) {
        $letter = chr(rand(97, 122));
        if (!in_array($letter, $choices)) {
            $choices[] = $letter;
        }
    }
    shuffle($choices);

    return [
        'word' => $word,
        'image' => $imagePath,
        'answer' => $answer,
        'choices' => $choices
    ];
}

// ----- Process answer if clicked -----
if (isset($_GET['ansclick'])) {
    $selected = $_GET['ansclick'];
    $wordData = $_SESSION['current_question'] ?? null;
    if ($wordData) {
        $scorer = new Scorer($conn);
        $correct = $scorer->processAnswer($selected, $wordData['answer'], $_SESSION['level']);
        $result = [
            'correct' => $correct,
            'selected' => $selected,
            'answer' => $wordData['answer'],
            'word' => $wordData['word'],
            'image' => $wordData['image']
        ];
        unset($_SESSION['current_question']);
    }
}

// ----- Generate new question if needed -----
if (!isset($result) || isset($_POST['Submit2'])) {
    $usedWords = $_SESSION['used_words'] ?? [];
    $wordData = getQuestion($wordLists[$_SESSION['level']], $usedWords);
    $_SESSION['current_question'] = $wordData;
}

// ----- Determine radio button checked status -----
$Easy_status = ($_SESSION['level'] == 'Easy') ? 'checked' : '';
$Hard_status = ($_SESSION['level'] == 'Hard') ? 'checked' : '';

// ============================================================
// OUTPUT
// ============================================================
?>
<div style="padding: 0 10px;">

    <?php if (isset($result)): ?>
        <!-- ===== RESULT DISPLAY ===== -->
        <div style="text-align:center;">
            <br><br>
            <p style="font-size:16pt; font-weight:700; color:<?= $result['correct'] ? '#006600' : '#CC0000' ?>; margin:0;">
                <?= $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.' ?>
            </p>
            <br>
            <p style="font-size:14pt; color:#800080; margin:0;">
                This is a picture for the word <strong style="color:#CC0066;"><?= $result['word'] ?></strong>, so the first letter is <strong style="color:#CC0066;">'<?= $result['answer'] ?>'</strong>.
            </p>
            <img src="<?= $result['image'] ?>" alt="<?= $result['word'] ?>" style="max-width:300px; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
            <p style="font-size:14pt; color:#800080;">Read it aloud and listen to the sound of the first letter.</p>
        </div>
    <?php else: ?>
        <!-- ===== QUESTION DISPLAY ===== -->
        <div style="text-align:center;">
            <img src="<?= $wordData['image'] ?>" alt="<?= $wordData['word'] ?>" style="max-width:300px; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
            <div style="font-size:2.5rem; letter-spacing:10px; color:#0000BB; font-weight:bold;">
                <?php for ($i = 0; $i < strlen($wordData['word']); $i++): ?>
                    <?php if ($i == 0): ?>
                        <span style="background: url('/arville/kpluz0/English/images/blank-qmark.jpg') no-repeat center; display:inline-block; width:60px; height:60px; background-size:contain;"></span>
                    <?php else: ?>
                        <span style="font-size:3rem; color:#0000BB;"><?= $wordData['word'][$i] ?></span>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <p style="font-size:17pt; font-weight:600; color:#800080;">Click on the first letter of this word.</p>
            <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap; margin:20px 0;">
                <?php foreach ($wordData['choices'] as $letter): ?>
                    <a href="?ansclick=<?= $letter ?>" style="display:inline-block; background:#f0f0f0; border:2px solid #ccc; border-radius:12px; padding:20px 30px; font-size:3rem; font-weight:bold; color:#0000BB; text-decoration:none; min-width:80px; transition:0.2s;" onmouseover="this.style.background='#e0e0ff'; this.style.borderColor='#0000CC';" onmouseout="this.style.background='#f0f0f0'; this.style.borderColor='#ccc';"><?= $letter ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- ===== NEW QUESTION & DIFFICULTY SELECTION ===== -->
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <br/><br/>
        <p align="center">
            <input type="submit" name="Submit2" value="New Question">
        </p><br/>

        <div align="center">
            <p style="margin-top: 5px; margin-bottom: 0">
                <font face="Verdana" style="font-size: 10pt;" color="#000080">
                    Select difficulty level for next question:
                </font>
            </p>
            <table border="0" width="80%" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
                        <p style="margin-bottom: 4px">
                            <font face="Verdana">
                                <span style="font-size: 9pt">
                                    <font color="#800080">
                                        <input type="radio" name="level" value="Easy" style="font-weight: 700" <?= $Easy_status ?>>
                                        <b>&nbsp;Easy</b>
                                    </font>
                                </span>
                            </font>
                        </p>
                    </td>
                    <td align="center">
                        <p style="margin-bottom: 4px">
                            <font face="Verdana">
                                <span style="font-size: 9pt">
                                    <font color="#800080">
                                        <input type="radio" name="level" value="Hard" style="font-weight: 700" <?= $Hard_status ?>>
                                        <b>&nbsp;Hard</b>
                                    </font>
                                </span>
                            </font>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <!-- ===== SCORE BOX – centralized renderer ===== -->
    <?php render_score_box(); ?>

</div> <!-- end padding -->

<?php
$conn->close();
render_footer();