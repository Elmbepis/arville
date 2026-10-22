<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 20pt'>"; $font2="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 40pt'>"; $font2="<span lang='EN-US' style='font-size: 36pt'>";}
$small="<span lang='EN-US' style='font-size: 16pt'>";

$red=$font."<font color='#CC0000'><b>";
$blue=$font."<font color='#0000CC'><b>";
$vio=$font."<font color='#800080'><b>";
$black=$font."<font color='#000000'></b>";

$objects=array("ball","bag","puppy","clock","flower","apple","butterfly","toy","cupcake");
$count=count($objects)-1;
			
$tw=800;	
$strchk="**";
for ($i=1; $i<=3; $i+=1){

	echo "<table align='center' width='850' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'><br/>";
	echo $red."Example #".$i.$small."<br/><br/>".$black;
		
	do{
		if ($i==1){$quot=rand(4,5); $divis=rand(2,3);}
		if ($i==2){$quot=rand(5,8); $divis=rand(4,6);}
		if ($i==3){$quot=rand(6,8); $divis=rand(5,7);}
		$div=$quot;
		}
	while (strpos($strchk,$div)>0);
	$strchk=$strchk."*".$div;	
	echo $font."<b>".($quot*$divis)." &divide; ".$divis." = ?</b>$small<br/><br/>";
	
	do{$object[$j]=$objects[rand(0,$count)];}
	while (strpos($strchk,$object[$j])>0);
	$strchk=$strchk.$object[$j];	
	
	$img="images/objects/".$object[$j].".png";		
	
	echo "<table align='center' width='800' cellspacing='0' cellpadding='0'><tr><td align='center'>";	
	for($k=1; $k<=$quot*$divis; $k+=1){
		echo "<img border='0' src='$img'>";
		if ($k%10==0){echo "<br/>";}
		}			
	echo "</td></tr></table>$small<br/><br/>";
	
	echo "<table align='center' width='800' cellspacing='0' cellpadding='0'><tr><td align='center'>";	
	for($m=1; $m<=$divis; $m+=1){
		echo $font2."Group ".$m.": ".$blue.$quot.$black." ".$object[$j]."s<br/>";
		for($n=1; $n<=$quot; $n+=1){
			echo "<img border='0' src='$img'>";
			}	
		echo "<br/><br/>";			
		}
	echo $font."<b>".($quot*$divis)." &divide; ".$divis." = </b>".$blue.$quot.$black."$small<br/><br/>";
	echo "</td></tr></table>$small<br/>";
	
	echo "</td></tr></table><br/>";
	}
	if ($i<3){echo "<br/>";}
	//echo $small."<br/>".$font;
?>