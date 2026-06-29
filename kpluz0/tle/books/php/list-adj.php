<?php

$grd=$grd;
$format=$format;

$words=array(
	"afraid", "alive", "angry", "awake", "aware", "awful", "bashful", "beautiful", "bitter", "black", "brave", "brief", "broad", "brown", "bumpy", "burly", "busy", 
	"cheap", "cheerful", "chilly", "chubby", "clever", "cloudy", "crazy", "creepy", "cruel", "curly", "damp", "daily", "dirty", "dizzy", "drab", "dusty", "eager", 
	"early", "eight", "false", "famous", "female", "fierce", "first", "foolish", "fresh", "funny", "furry", "great", "half", "handy", "harsh", "healthy", "helpful", 
	"heavy", "itchy", "jolly", "juicy", "jumpy", "keen", "lame", "large", "late", "lively", "lonely", "loose", "lowly", "lucky", "meaty", "meek", "messy", "milky", 
	"minor", "misty", "moldy", "naive", "nasty", "near", "neat", "needy", "nervous", "new", "next", "nice", "nine", "noisy", "normal", "nosy", "nutty", "odd", "pale", 
	"polite", "proud", "quick", "quiet", "rabid", "rainy", "rapid", "rare", "real", "red", "rigid", "roomy", "rough", "rude", "rural", "salty", "scary", "shaky", 
	"shiny", "sickly", "silky", "silly", "small", "smart", "spicy", "stale", "steep", "sulky", "super", "tasty", "thick", "tight", "tired", "tough", "vast"
	);
	
if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:14pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:36pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}
	
$count=count($words)-1;	
$lim=$count;
if ($lim%5!=0){$lim=(floor($lim/5)+1)*5-1;}
echo "<table align='center' width='900' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'><tr>";
for ($j=0; $j<=$lim; $j+=1){
	echo "<td align='center' width='180'>";	
	echo "<p style='margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 5px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 32pt'>";}
	if(isset($words[$j]) and $j<=$count){echo $words[$j]."</td>";}else{echo "</td>";}
	if (($j+1)%5==0){echo "</tr><tr>";}
	}
echo "</tr></table>";
		
	
?>