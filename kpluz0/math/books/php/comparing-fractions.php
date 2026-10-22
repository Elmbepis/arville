<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:38pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}

for ($i=1; $i<=10; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo $red."Example #".$i.$black."<br/><br/>";
	
	$numer1=""; $denom1=""; $numer2=""; $denom2=""; $whole1=0; $whole2=0; $exp="";

	if($i<5){
		do{
			if (rand(1,2)==1){$numer1=rand(1,29); $numer2=rand(1,29); $denom1=rand(2,29); $denom2=$denom1;} 
			else{$denom1=rand(2,29); $denom2=rand(2,29); $numer1=rand(1,29); $numer2=$numer1;}
			}
		while ($numer1==$denom1 or $numer2==$denom2 or ($numer1==$numer2 and $denom1==$denom2));
		}
	if($i==5 or $i==6 or $i==7){
		do{
			$numer1=rand(11,49); $denom1=rand(11,49); 
			$numer2=rand(11,49); $denom2=rand(11,49);
			}
		while ($numer1==$denom1 or $numer2==$denom2 or ($numer1==$numer2 and $denom1==$denom2)
			or ($numer1/$denom1<1 and $numer2/$denom2<1) or ($numer1/$denom1>1 and $numer2/$denom2>1));
		}
	if($i>=8){
		do{
			$numer1=rand(11,49); $denom1=rand(11,49); 
			$numer2=rand(11,49); $denom2=rand(11,49);
			}
		while ($numer1%$denom1==0 or $numer2%$denom2==0 or $numer1==$numer2 or $denom1==$denom2 or $numer1/$denom1<1 or $numer2/$denom2<1 
			or (abs($numer1/$denom1-$numer2/$denom2)<=1)              
			);
		}
	
	$frac1=$numer1."/".$denom1;
	$frac2=$numer2."/".$denom2;
	
	if ($numer1/$denom1>1 and $numer2/$denom2>1){
		$frac1b=floor($numer1/$denom1)." remainder ".(($numer1/$denom1-floor($numer1/$denom1))*$denom1);
		$frac2b=floor($numer2/$denom2)." remainder ".(($numer2/$denom2-floor($numer2/$denom2))*$denom2);
		}
	
	echo "Compare ".$vio.$frac1.$black." and ".$vio.$frac2.$black.".<br/><br/>";
	
	if ($numer1/$denom1==$numer2/$denom2){$sign="=";}
	if ($numer1/$denom1>$numer2/$denom2){
		$sign=">";
		if ($whole1==0 and $whole2==0 and $numer1/$denom1>1 and $numer2/$denom2<1){
			$exp=$vio.$frac1.$black." is an improper fraction so it is greater than 1 while ".$vio.$frac2.$black." is a proper fraction so it is less than 1.";
			}
		if ($whole1==0 and $whole2==0 and $numer1>$numer2 and $denom1==$denom2){
			$exp="Both fractions have the same denominator so ".$vio.$frac1.$black." is greater than ".$vio.$frac2.$black." because it has a greater numerator.";
			}
		if ($whole1==0 and $whole2==0 and $numer1==$numer2 and $denom1<$denom2){
			$exp="Both fractions have the same numerator so ".$vio.$frac1.$black." is greater than ".$vio.$frac2.$black." because it has a smaller denominator.";
			}
		if ($whole1==0 and $whole2==0 and $numer1/$denom1>1 and $numer2/$denom2>1 and $numer1!=$numer2 and $denom1!=$denom2){
			$exp="Dividing the numerator of each fraction by its denominator,<br/>".$frac1." equals ".$vio.$frac1b.$black." while ".$frac2." equals ".$vio.$frac2b.$black.".";
			}
		}
	if ($numer1/$denom1<$numer2/$denom2){
		$sign="<";
		if ($whole1==0 and $whole2==0 and $numer1/$denom1<1 and $numer2/$denom2>1){
			$exp=$vio.$frac1.$black." is a proper fraction so it is less than 1 while ".$vio.$frac2.$black." is an improper fraction so it is greater than 1.";
			}
		if ($whole1==0 and $whole2==0 and $numer1<$numer2 and $denom1==$denom2){
			$exp="Both fractions have the same denominator so ".$vio.$frac1.$black." is less than ".$vio.$frac2.$black." because it has a smaller numerator.";
			}
		if ($whole1==0 and $whole2==0 and $numer1==$numer2 and $denom1>$denom2){
			$exp="Both fractions have the same numerator so ".$vio.$frac1.$black." is less than ".$vio.$frac2.$black." because it has a greater denominator.";
			}
		if ($whole1==0 and $whole2==0 and $numer1/$denom1>1 and $numer2/$denom2>1 and $numer1!=$numer2 and $denom1!=$denom2){
			$exp="Dividing the numerator of each fraction by its denominator,<br/>".$frac1." equals ".$vio.$frac1b.$black." while ".$frac2." equals ".$vio.$frac2b.$black.".";
			}
		}
	
	echo"
	<table border='0' width='40%' cellspacing='0' cellpadding='0' style='margin-left: 0'>
	<tr>
		<td align='center' width='35%'>$tfont1 $numer1</td>
		<td align='center' width='30%' height='17' rowspan='3'>$tfont2 <b>$sign</b></td>
		<td align='center' width='35%'>$tfont1 $numer2</td>
	</tr>
	<tr>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='center'>$tfont1 $denom1</td>
		<td align='center'>$tfont1 $denom2</td>
	</tr>
	</table><br/>	
	";
	
	echo $exp."<br/>";
	
	echo "</td></tr></table>";
	
	if ($i<10){echo "<br/>";}
	}
	
?>