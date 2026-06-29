<?php

$grd=$grd;
$format=$format;

$words=array(
	"about", "above", "abroad", "anywhere", "away", "back", "backwards", "behind", "below", "down", "downhill", "downstairs", "downwards", "east", 
	"elsewhere", "everywhere", "far", "here", "in", "indoors", "inside", "inwards", "near", "nearby", "north", "nowhere", "off", "on", 
	"out", "outside", "over", "sideways", "somewhere", "south", "there", "under", "up", "upstairs", "upwards", "west", 
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
if ($lim%4!=0){$lim=(floor($lim/4)+1)*4-1;}
echo "<table align='center' width='900' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'><tr>";
for ($j=0; $j<=$lim; $j+=1){
	echo "<td align='center' width='225'>";	
	echo "<p style='margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 5px;'>"; 
	if(isset($words[$j]) and $j<=$count){echo $tfont1.$words[$j]."</td>";}else{echo "</td>";}
	if (($j+1)%4==0){echo "</tr><tr>";}
	}
echo "</tr></table>";
		
	
?>