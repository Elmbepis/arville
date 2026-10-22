<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 20pt'>";}
else{$font="<span lang='EN-US' style='font-size: 40pt'>";}
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
		if ($i==1){$num1=rand(2,3); $num2=rand(4,6);}
		else{$num1=rand(3,5); $num2=rand(7,9);}
		$mult=$num1."x".$num2;
		}
	while (strpos($strchk,$mult)>0);
	$strchk=$strchk."*".$mult;	
	echo $font."<b>".$num1." x ".$num2." = ".($num1*$num2)."</b>$small<br/><br/>";
	
	do{$object[$j]=$objects[rand(0,$count)];}
	while (strpos($strchk,$object[$j])>0);
	$strchk=$strchk.$object[$j];	
	
	$tw=$num2*80;
	echo "<table align='center' width='$tw' cellspacing='0' cellpadding='0'>";	
	$img="images/objects/".$object[$j].".png";		
	
	echo "<tr><td>&nbsp</td>";
	for($k=1; $k<=$num2; $k+=1){echo "<td align='center'>$vio$k</td>";}			
	echo "</tr>";	
	
	for($j=1; $j<=$num1; $j+=1){
		echo "<tr><td>$vio$j&nbsp;</td>";
		for($k=1; $k<=$num2; $k+=1){
			echo "<td align='center'><img border='0' src='$img'></td>";
			}			
		echo "</tr>";	
		}
		echo "</table>$small<br/>";
	echo "</td></tr></table><br/>";
	}
	if ($i<3){echo "<br/>";}
	//echo $small."<br/>".$font;
?>