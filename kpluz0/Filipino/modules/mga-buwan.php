<?php
// filipino/modules/mga-buwan.php
// Five question patterns, twelve starting months each.

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /arville/kpluz0/login.php');
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli('localhost', 'root', 'AcadeV25!', 'kpluz0');
if ($conn->connect_error) die('Connection failed: ' . $conn->connect_error);
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleTitle = 'Mga Buwan ng Taon';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$lvl = 'Easy';
function buwan_question(int $i): array {
    $months = ['Enero','Pebrero','Marso','Abril','Mayo','Hunyo','Hulyo','Agosto','Setyembre','Oktubre','Nobyembre','Disyembre'];
    $type = intdiv($i, 12) + 1;
    $n = $i % 12;
    $a = $months[$n]; $b = $months[($n+1)%12]; $c = $months[($n+2)%12];
    $prev = $months[($n+11)%12];
    switch ($type) {
        case 1: $q = 'Ano ang susunod na buwan?'; $correct = $b; $labels = [$a]; $before = "Kung ngayon ay $a, "; $after = ' ang susunod na buwan.'; break;
        case 2: $q = 'Ano ang nakaraang buwan?'; $correct = $prev; $labels = [$a]; $before = "Kung ngayon ay $a, "; $after = ' noong nakaraang buwan.'; break;
        case 3: $q = 'Ano ang ikatlong buwan?'; $correct = $c; $labels = [$a,$b,'?']; $before = "Ang buwan pagkatapos ng $a at $b ay "; $after = '.'; break;
        case 4: $q = 'Anong buwan ang nasa gitna?'; $correct = $b; $labels = [$a,'?',$c]; $before = "Ang buwan sa pagitan ng $a at $c ay "; $after = '.'; break;
        case 5: $q = 'Ano ang unang buwan?'; $correct = $a; $labels = ['?',$b,$c]; $before = "Ang buwan bago sa $b at $c ay "; $after = '.'; break;
    }
    $wrong = $type <= 2
        ? array_values(array_diff($months, [$a,$correct]))
        : array_map(static function ($offset) use ($months, $n) { return $months[($n+$offset)%12]; }, range(3,6));
    shuffle($wrong);
    $choices = array_merge([$correct], array_slice($wrong,0,3));
    shuffle($choices);
    return ['qid'=>bin2hex(random_bytes(16)), 'correct'=>$correct, 'choices'=>$choices,
        'question'=>$q, 'labels'=>$labels, 'type'=>$type, 'before'=>$before, 'after'=>$after, 'lvl'=>'Easy'];
}
function buwan_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function buwan_visual(array $cur): void {
    $single = $cur['type'] <= 2;
    $sign = $single ? '../images/mga-buwan-bottom.jpg' : '../images/mga-buwan-sign.jpg';
    $pic = $single ? '../images/mga-buwan-top.jpg' : '../images/mga-buwan-bigfoot.jpg';
    echo '<div style="display:flex;gap:3px;justify-content:center;margin:16px auto;max-width:'.($single ? '300' : '579').'px;width:100%;">';
    foreach ($cur['labels'] as $label) {
        echo '<div style="flex:1;min-width:0;border:3px solid #DCE8A6;border-radius:8px;overflow:hidden;box-sizing:border-box;">';
        $image = '<img src="'.buwan_h($pic).'" alt="" style="display:block;width:100%;height:auto;border:0;">';
        $labelHtml = '<div style="background:url('.buwan_h($sign).') center/100% 100% no-repeat;aspect-ratio:'.($single?'300/71':'193/71').';display:flex;align-items:'.($single?'flex-start':'center').';justify-content:center;box-sizing:border-box;padding-bottom:'.($single?'0':'5px').';font-size:clamp(10px,3.2vw,'.($single?'32':'26').'px);font-weight:700;color:'.($label==='?'?'#CC0066':'#222222').';">'.buwan_h($label).($single?'.':'').'</div>';
        echo $single ? $image.$labelHtml : $labelHtml.$image;
        echo '</div>';
    }
    echo '</div>';
}

$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']))) {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = array_values(array_diff(range(0, 59), $used));
    if (!$available) { $used = []; $available = range(0, 59); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'] = $used;
    $_SESSION[$sessionKey]['current'] = buwan_question($i);
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <strong style="color:#0000CC;">'<?php echo htmlspecialchars($result['clicked'], ENT_QUOTES, 'UTF-8'); ?>'</strong>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <?php ob_start(); ?>
        <?php buwan_visual($cur); ?>
        <p style="font-size:16pt;color:#800080;margin:16px auto 8px;max-width:450px;text-align:center;text-wrap:balance;"> <?php echo htmlspecialchars($cur['question'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p style="font-size:16pt;color:#800080;max-width:450px;margin:12px auto;text-wrap:balance;"><?php echo buwan_h($cur['before']); ?><strong style="color:#CC0066;"><?php echo buwan_h($cur['correct']); ?></strong><?php echo buwan_h($cur['after']); ?></p>
    <?php echo ob_get_clean(); ?>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current'];
    ob_start(); ?>
        <?php buwan_visual($cur); ?>
        <br/><br/><p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:0 auto;max-width:450px;text-align:center;"><?php echo htmlspecialchars($cur['question'], ENT_QUOTES, 'UTF-8'); ?></p><br/>
    <?php echo ob_get_clean(); ?>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php endif; ?>

</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
