<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=3; $i+=1){
echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:20pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:40pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}

$vio="<font color='#800080'>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'>";
$black="</b><font color='#000000'>";

if ($i==1){$prev=rand(1001,1299); $ec=rand(40,99);}
if ($i==2){$prev=rand(1301,3499); $ec=rand(101,275);}
if ($i==3){$prev=rand(3501,7999); $ec=rand(276,699);}
$cur=$prev+$ec;
if ($i==1){$cost=rand(9,12);}
else{$cost=rand(105,150)/10;}
$cost=number_format($cost,2);
echo $red."Example #".$i.$vio."</b><br/><br/>Given the following:$black<br/><br/>";
echo "Previous Reading:<br/>";
$imgp1="images/dials/1-".(substr($prev,0,1)).".jpg";
$imgp2="images/dials/2-".(substr($prev,1,1)).".jpg";
$imgp3="images/dials/1-".(substr($prev,2,1)).".jpg";
$imgp4="images/dials/2-".(substr($prev,3,1)).".jpg";
echo "<img border='0' src='$imgp1'> ";
echo "<img border='0' src='$imgp2'> ";
echo "<img border='0' src='$imgp3'> ";
echo "<img border='0' src='$imgp4'> ";
echo "$black<br/><br/>Current Reading:<br/>";
$imgc1="images/dials/1-".(substr($cur,0,1)).".jpg";
$imgc2="images/dials/2-".(substr($cur,1,1)).".jpg";
$imgc3="images/dials/1-".(substr($cur,2,1)).".jpg";
$imgc4="images/dials/2-".(substr($cur,3,1)).".jpg";
echo "<img border='0' src='$imgc1'> ";
echo "<img border='0' src='$imgc2'> ";
echo "<img border='0' src='$imgc3'> ";
echo "<img border='0' src='$imgc4'> ";
echo "$black<br/><br/>Cost per kWh: &#8369;$cost<br/><br/>";
echo $vio."What is your electric energy consumption (EC) and how much does it cost?$black<br/><br/>";
echo $red."</b>Solution:<br/><br/>".$black;
echo "Previous Reading: $prev<br/>";
echo "Current Reading: $cur<br/>";
echo "EC = $cur kWh - $prev kWh<br/>";
echo "EC = ".$ec." kWh<br/><br/>";
echo "Cost = $ec kWh x &#8369;$cost/kWh<br/>";
$cost=$ec*$cost;
echo "= &#8369;$cost";
echo "<br/><br/>Thus, your electric energy consumption is $blue $ec kWh $black and it costs $blue&#8369;$cost$black.";
    
echo "</td></tr></table>";
if ($i<4){echo "<br/>";}
}
	
?>