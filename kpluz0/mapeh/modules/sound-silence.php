<?php
// mapeh/modules/sound-silence.php
// Procedural four-image sound and silence patterns.

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
$moduleTitle = 'Visualizing Sound and Silence Patterns';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Easy';
$_SESSION['level'] = $lvl;
function ss_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$tier = $grd <= 1 ? 'k1' : ($grd === 2 ? 'g2' : 'g3plus');
function ss_generate(int $grd): array {
if ($grd<=1){
	$snum=rand(1,5);
	$sound="qimages/music/sound".$snum.".jpg";
	$silence="qimages/music/silence".$snum.".jpg";
	}
if ($grd==2){
	$snum=rand(1,2);
	$p=rand(1,2);
	if ($p==1){$pref="noteq";}
	if ($p==2){$pref="notebe";}
	
	$sound="qimages/music/".$pref.$snum.".jpg";
	$silence="qimages/music/rest".$snum.".jpg";
	}
 
$ans="";
$note="";
$rest="";

if ($grd<3){
	for ($i=0; $i<=3; $i++){
		if (rand(1,2)==1){
			$s[$i]=$sound;
			if ($grd<=1){$anstr="sound";}
			if ($grd==2 and $pref=="noteq"){$anstr="beat";}
			if ($grd==2 and $pref=="notebe"){$anstr="2 half-beats";}
			$ans=$ans.$anstr;
			if ($i<3){$ans=$ans.", ";}
			}
		else{
			$s[$i]=$silence;
			$ans=$ans."silence";
			if ($i<3){$ans=$ans.", ";}
			}
		}
	}	
 
else{
		$ans="";
		for ($i=0; $i<=3; $i++){
			if (rand(1,2)==1){
				$p=rand(1,4);
				if ($p==1){$note="noteq";}
				if ($p==2){$note="notebe";}
				if ($p==3){$note="notee";}
				if ($p==4){$note="noteh";}
				$sound="qimages/music/".$note.".jpg";
				$s[$i]=$sound;
				if ($grd>=3 and $note=="noteq"){$anstr="1 beat";}
				if ($grd>=3 and $note=="notebe"){$anstr="2 half-beats";}
				if ($grd>=3 and $note=="notee"){$anstr="half-beat";}
				if ($grd>=3 and $note=="noteh"){$anstr="2 beats";}
				$ans=$ans.$anstr;
				if ($i<3){$ans=$ans.", ";}
				}
			else{
				$p=rand(1,2);
				if ($p==1){$rest="restq";}
				if ($p==2){$rest="resth";}
				$silence="qimages/music/".$rest.".jpg";
				$s[$i]=$silence;
				if ($grd>=3 and $rest=="restq"){$anstr="1-beat silence";}
				if ($grd>=3 and $rest=="resth"){$anstr="2-beat silence";}
				$ans=$ans.$anstr;
				if ($i<3){$ans=$ans.", ";}
				}
			}
		
			
	}	
$choice[0]=$ans;
if ($grd<=1){
	$wrongs=array("sound, sound, sound, silence","sound, silence, sound, silence","silence, sound, sound, silence","silence, sound, sound, sound","sound, sound, silence, silence",
		"silence, sound, silence, silence");
	}
if ($grd==2){
	$wrongs=array("beat, silence, 2 half-beats, silence","2 half-beats, silence, beat, silence","silence, beat, beat, silence","silence, 2 half-beats, 2 half-beats, silence",
		"silence, beat, 2 half-beats, beat","silence, 2 half-beats, beat, 2 half-beats","beat, beat, silence, silence","2 half-beats, 2 half-beats, silence, silence",
		"silence, beat, silence, beat","silence, 2 half-beats, silence, 2 half-beats");
	}
if ($grd>=3){
	$wrongs=array("1 beat, 1-beat silence, 2 half-beats, 1-beat silence","2 half-beats, 1-beat silence, 1 beat, 1-beat silence","1-beat silence, 1 beat, 1 beat, 1-beat silence","1-beat silence, 2 half-beats, 2 half-beats, 1-beat silence",
		"2-beat silence, 1 beat, 2 half-beats, 1 beat","2-beat silence, 2 half-beats, 1 beat, 2 half-beats","1 beat, 1 beat, 1-beat silence, 1-beat silence","2 half-beats, 2 half-beats, 1-beat silence, 1-beat silence",
		"1-beat silence, 1 beat, 1-beat silence, 1 beat","1-beat silence, 2 half-beats, 1-beat silence, 2 half-beats");
	}
 
do{$choice[1]=$wrongs[rand(0,(count($wrongs))-1)];} while ($choice[1]==$ans);	
do{$choice[2]=$wrongs[rand(0,(count($wrongs))-1)];} while ($choice[2]==$choice[1] or $choice[2]==$ans);	
do{$choice[3]=$wrongs[rand(0,(count($wrongs))-1)];} while ($choice[3]==$choice[2] or $choice[3]==$choice[1] or $choice[3]==$ans);	
 
shuffle($choice);
    return ['images'=>$s, 'correct'=>$ans, 'choices'=>$choice];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = $_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct'=>$isCorrect, 'clicked'=>$clicked, 'cur'=>$cur];
    unset($_SESSION[$sessionKey]['current']);
}
if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    // Avoid repeating an identical image sequence; bounded retries for small pools.
    for ($attempt = 0; $attempt < 100; $attempt++) {
        $entry = ss_generate($grd);
        $key = implode('|', $entry['images']);
        if (!in_array($key, $used, true)) break;
    }
    if ($attempt === 100) $used = [];
    $used[] = $key;
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = $entry + ['tier'=>$tier, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$cur = $result !== null ? $result['cur'] : $_SESSION[$sessionKey]['current'];
$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo ss_h($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null): ?>
<p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:450px;">Your answer is: <strong style="color:#0000CC;"><?php echo ss_h($result['clicked']); ?></strong>.</p>
<p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;"><?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?></p>
<?php endif; ?>
<div style="display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:3px;max-width:450px;margin:30px auto 20px;align-items:center;">
<?php foreach ($cur['images'] as $i => $img): ?>
<img src="<?php echo ss_h($img); ?>" alt="Pattern image <?php echo $i+1; ?>" style="display:block;width:100%;height:auto;box-sizing:border-box;border:1px solid #888;">
<?php endforeach; ?>
</div>
<?php if ($result !== null): ?>
<div style="max-width:450px;margin:20px auto;font-size:16pt;color:#800080;line-height:1.5;">The sound/silence pattern shown by the images is <strong style="color:#CC0066;"><?php echo ss_h($cur['correct']); ?></strong>.</div>
<?php else: ?>
<p style="font-size:15pt;color:#800080;font-weight:600;line-height:1.3;text-wrap:balance;margin:40px auto;max-width:450px;">Click on the sound/silence pattern shown by the images above.</p>
<div style="display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:max-content;max-width:100%;margin:0 auto;">
<?php foreach ($cur['choices'] as $choice): ?>
<a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;max-width:450px;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:500;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;"><?php echo ss_h($choice); ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>
<input type="submit" name="Submit2" value="New Question" style="margin:40px 0 20px;font-family:Arial,sans-serif;">
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
