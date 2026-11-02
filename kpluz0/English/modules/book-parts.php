<?php
// english/modules/book-parts.php
// Parts of a Book — click the correct part of a book / identify from image.
// Single level (Easy) — 4 choices at all times. Grade-aware pools:
//   grd 0–4 &#8594; text-based definitions (10 items)
//   grd 5–10 &#8594; full pool including image-recognition questions (23 items)

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
$moduleTitle = 'Parts of a Book';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

// Single level — no selector.
$lvl = 'Easy';

// ---- Tier mapping (grade-aware) ----
function resolve_book_parts_tier(int $grd): int {
    return ($grd <= 4) ? 1 : 2;
}

// ---- Data (§5) — verbatim from legacy ----
$rawQuestions = [
    "The ____ gives people an idea what the book is about.=cover[copyright page+glossary]publisher",
    "The cover usually includes a picture, the title, and the ____.=author[epilogue+glossary]copyright page",
    "The title page repeats the information given on the ____.=cover[foreword+glossary]copyright page",
    "The ____ includes copyright information, such as when the book was published.=copyright page[title page+cover]appendix",
    "The ____ is an alphabetical list of words used in the book and their meanings.=glossary[appendix+foreword]title page",
    "The glossary is usually found ____ of the book.=at the end[at the beginning+in the middle]on the cover",
    "The page that lists the names, places, and topics in the book along with their page numbers is called the ____.=index[glossary+table of contents]appendix",
    "Which of these lists the chapters and sections of a book along with their page numbers?=table of contents[title page+appendix]copyright",
    "The picture is showing an example of which part of a book?**book-cover.jpg=cover[copyright page+glossary]index",
    "The picture is showing an example of which part of a book?**book-copyright.jpg=copyright page[cover+glossary]title page",
    "The picture is showing an example of which part of a book?**book-glossary.jpg=glossary[cover+table of contents]title page",
    "The picture is showing a portion of which part of a book?**book-index.jpg=index[cover+table of contents]title page",
    "The picture is showing an example of which part of a book?**book-title.jpg=title page[copyright page+table of contents]appendix",
    "The picture is showing an example of which part of a book?**book-toc.jpg=table of contents[copyright page+title page]appendix",
    "The picture is showing an example of which part of a book?**book-cover2.jpg=cover[copyright page+glossary]index",
    "The picture is showing an example of which part of a book?**book-copyright2.jpg=copyright page[cover+glossary]title page",
    "The picture is showing an example of which part of a book?**book-glossary2.jpg=glossary[cover+table of contents]title page",
    "The picture is showing a portion of which part of a book?**book-index2.jpg=index[cover+table of contents]title page",
    "The picture is showing an example of which part of a book?**book-title2.jpg=title page[copyright page+table of contents]appendix",
    "The picture is showing an example of which part of a book?**book-toc2.jpg=table of contents[copyright page+title page]appendix",
    "The picture is showing the ____ of several books.**book-spines.jpg=spines[covers+backs]back covers",
    "The person who drew the pictures of a book is called its ____.=illustrator[author+reader]publisher",
    "The person who wrote the book is called its ____.=author[illustrator+reader]publisher",
];

// ---- Pre-parse (§5.1) ----
function parse_book_parts(string $raw): ?array {
    $eq = strpos($raw, '=');
    if ($eq === false) return null;

    $question = substr($raw, 0, $eq);
    $rest     = substr($raw, $eq + 1);

    $image = null;
    if (($imgStart = strpos($question, '**')) !== false) {
        $imgEnd = strpos($question, '.jpg', $imgStart);
        if ($imgEnd !== false) {
            $image = substr($question, $imgStart + 2, $imgEnd - $imgStart - 2);
            $question = trim(substr($question, 0, $imgStart) . substr($question, $imgEnd + 4));
        }
    }

    $b1 = strpos($rest, '[');
    $pl = strpos($rest, '+');
    $b2 = strpos($rest, ']');
    if ($b1 === false || $pl === false || $b2 === false) return null;

    return [
        'question' => trim($question),
        'image'    => $image,
        'correct'  => trim(substr($rest, 0, $b1)),
        'wrong'    => [
            trim(substr($rest, $b1 + 1, $pl - $b1 - 1)),
            trim(substr($rest, $pl + 1, $b2 - $pl - 1)),
            trim(substr($rest, $b2 + 1)),
        ],
    ];
}

$allItems = [];
foreach ($rawQuestions as $rawIdx => $raw) {
    $parsed = parse_book_parts($raw);
    if ($parsed !== null) {
        $parsed['id'] = $rawIdx;
        $allItems[] = $parsed;
    }
}

$itemsByTier = [
    1 => array_merge(
        array_slice($allItems, 0, 8),
        array_slice($allItems, 21, 2)
    ),
    2 => $allItems,
];

// ---- Helpers (§8.4, §8.6 + hugging technique) ----
function book_parts_box(string $html, int $minHeight = 80, int $widthPx = 0): void {
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

function book_parts_compute_width(string $text, int $charPx = 10, int $maxWidthPx = 500, int $minWidthPx = 240): int {
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

function book_parts_explanation(array $item): string {
    if (strpos($item['question'], '____') !== false) {
        return str_replace('____', $item['answer'], $item['question']);
    }
    return 'The image is showing the ' . $item['answer'] . '.';
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
    $tier = resolve_book_parts_tier($grd);
    $pool = $itemsByTier[$tier] ?? $itemsByTier[1];

    $numChoices = 4;

    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        if (!in_array($item['id'], $used, true)) $available[] = $i;
    }
    if (empty($available)) {
        $used = [];
        $available = array_keys($pool);
    }
    $correctIdx = $available[array_rand($available)];
    $correct    = $pool[$correctIdx];
    $used[]     = $correct['id'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $choices = array_merge([$correct['correct']], $correct['wrong']);
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question' => $correct['question'],
        'image'    => $correct['image'],
        'answer'   => $correct['correct'],
        'choices'  => $choices,
        'lvl'      => $lvl,
        'tier'     => $tier,
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
render_header($moduleTitle, $moduleTitle, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $explanation = book_parts_explanation($cur);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:560px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:560px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:13pt;color:#800080;max-width:560px;margin:20px auto;line-height:1.55;">
    <?php echo bind_last_words($explanation); ?>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:45px auto 25px;font-family:Arial,sans-serif;font-size:10pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $questionEsc = htmlspecialchars($q['question']);
    $questionW   = book_parts_compute_width($q['question'], 10, 500, 260);

    $maxLen = 0;
    foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
    $choiceBoxW = max(220, min(460, $maxLen * 11 + 50));
?>
  <?php if (!empty($q['image'])): ?>
  <div style="margin:30px auto 12px;text-align:center;">
    <img src="../images/others/<?php echo htmlspecialchars($q['image']); ?>.jpg"
         style="max-width:360px;height:auto;border:2px solid #DDD;border-radius:8px;">
  </div>
  <?php endif; ?>
  <?php book_parts_box(
      '<div style="font-size:16pt;font-weight:600;color:#0000AA;line-height:1.4;">'
    . $questionEsc
    . '</div>'
  , 80, $questionW); ?>
  <div style="margin:25px auto 25px;font-family:Arial,sans-serif;font-size:14pt;font-weight:700;color:#800080;max-width:500px;text-wrap:balance;">
    Click on the correct answer:
  </div>
  <div style="display:flex;flex-direction:column;align-items:center;gap:12px;width:fit-content;margin:12px auto 20px;padding:0 8px;box-sizing:border-box;">
  <?php foreach ($q['choices'] as $c): ?>
    <a href="?ansclick=<?php echo urlencode($c); ?>"
       style="display:flex;align-items:center;justify-content:center;
              width:<?php echo $choiceBoxW; ?>px;min-height:60px;padding:14px 20px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
              font-size:15pt;font-weight:700;text-align:center;
              word-break:break-word;box-sizing:border-box;line-height:1.4;">
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