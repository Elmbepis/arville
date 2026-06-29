<?php

$grd=$grd;
$format=$format;

$words=array(
	"a bit", "a little", "almost", "barely", "deeply", "enough", "fairly", "fully", "hardly", "highly", "just", "nearly", 
	"quite", "rather", "too", "very", "absolutely", "awfully", "completely", "enormously", "entirely", "extremely", 
	"greatly", "intensely", "moderately", "scarcely", "slightly", "somewhat", "strongly", "thoroughly", "totally", "utterly"
	);
	
if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:31pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:31pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	echo $tfont1;}
	
$count=count($words)-1;	
$lim=$count;
if ($lim%3!=0){$lim=(floor($lim/3)+1)*3-1;}
echo "<table align='center' width='900' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'><tr>";
for ($j=0; $j<=$lim; $j+=1){
	echo "<td align='center' width='300'>";	
	echo "<p style='margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 5px;'>"; 
	if(isset($words[$j]) and $j<=$count){echo $tfont1.$words[$j]."</td>";}else{echo "</td>";}
	if (($j+1)%3==0){echo "</tr><tr>";}
	}
echo "</tr></table>";
		
	
?>