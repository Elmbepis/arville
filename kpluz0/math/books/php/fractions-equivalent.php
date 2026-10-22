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
	
$all="***";
for ($i=1; $i<=10; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo $red."Example #".$i.$black."<br/><br/>";
	
	$numer1=""; $denom1=""; $numer2=""; $denom2=""; $fac=""; $ans=""; $exp="";

	if($i<4){$numlim1=1; $numlim2=11; $denlim1=2; $denlim2=12; $flim1=2; $flim2=4;}
	if($i>=4 and $i<=7){$numlim1=4; $numlim2=19; $denlim1=5; $denlim2=21; $flim1=3; $flim2=5;}
	if($i>7){$numlim1=11; $numlim2=25; $denlim1=12; $denlim2=26; $flim1=5; $flim2=9;}
		
	do {
		$numer1=rand($numlim1,$numlim2); 
		$denom1=rand($denlim1,$denlim2);
		$chk=round(($numer1/$denom1),5)."*";
		} 
	while ($numer1==$denom1 or strpos($all,$chk)>0); 
	$all=$all.$chk;
	
	do {$fac=rand($flim1,$flim2);}while($fac==$numer1 or $fac==$denom1);
	$numer2=$numer1*$fac; $denom2=$denom1*$fac;
	
	if($i>2 and rand(1,2)==1){
		$n=$numer2;
		$numer2=$numer1;
		$numer1=$n;
		$d=$denom2;
		$denom2=$denom1;
		$denom1=$d;
		}
	
	$frac1=$numer1."/".$denom1;
	$frac2=$numer2."/".$denom3;
	
	$opt=rand(1,2);
	if ($opt==1){
		$ans=$numer2; $numer2="?";
		echo "Find the equivalent fraction of ".$vio.$frac1.$black." that has a denominator of  ".$vio.$denom2.$black.".<br/><br/>";
		if ($denom2>$denom1){
			$exp="Since ".$denom2." > ".$denom1.", we can find the factor relating them by dividing ".$denom2." by ".$denom1.":<br/><br/>";
			$exp=$exp.$denom2." &divide; ".$denom1." = ".$fac."<br/><br/>";
			$exp=$exp."Thus, the numerator we're looking for is also ".$fac." times the first numerator, ".$numer1.".<br/><br/>";
			$exp=$exp.$numer1." x ".$fac." = ".$ans.".<br/>";
			}
		else{
			$exp="Since ".$denom1." > ".$denom2.", we can find the factor relating them by dividing ".$denom1." by ".$denom2.":<br/><br/>";
			$exp=$exp.$denom1." &divide; ".$denom2." = ".$fac."<br/><br/>";
			$exp=$exp."Thus, we can find the numerator we're looking for by dividing the first numerator, ".$numer1.", by ".$fac.".<br/><br/>";
			$exp=$exp.$numer1." &divide; ".$fac." = ".$ans.".<br/>";
			}
		}
	if ($opt==2){
		$ans=$denom2; $denom2="?";
		echo "Find the equivalent fraction of ".$vio.$frac1.$black." that has a numerator of  ".$vio.$numer2.$black.".<br/><br/>";
		if ($numer2>$numer1){
			$exp="Since ".$numer2." > ".$numer1.", we can find the factor relating them by dividing ".$numer2." by ".$numer1.":<br/><br/>";
			$exp=$exp.$numer2." &divide; ".$numer1." = ".$fac."<br/><br/>";
			$exp=$exp."Thus, the denominator we're looking for is also ".$fac." times the first denominator, ".$denom1.".<br/><br/>";
			$exp=$exp.$denom1." x ".$fac." = ".$ans.".<br/>";
			}
		else{
			$exp="Since ".$numer1." > ".$numer2.", we can find the factor relating them by dividing ".$numer1." by ".$numer2.":<br/><br/>";
			$exp=$exp.$numer1." &divide; ".$numer2." = ".$fac."<br/><br/>";
			$exp=$exp."Thus, we can find the denominator we're looking for by dividing the first denominator, ".$denom1.", by ".$fac.".<br/><br/>";
			$exp=$exp.$denom1." &divide; ".$fac." = ".$ans.".<br/>";
			}
		}
	
	echo"
	<table border='0' width='40%' cellspacing='0' cellpadding='0' style='margin-left: 0'>
	<tr>
		<td align='center' width='35%'>$tfont1 $numer1</td>
		<td align='center' width='30%' height='17' rowspan='3'>$tfont2<b> = </b></td>
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
	
	if($numer2=="?"){$numer2=$ans;}
	if($denom2=="?"){$denom2=$ans;}
	
	echo"
	<table border='0' width='40%' cellspacing='0' cellpadding='0' style='margin-left: 0'>
	<tr>
		<td align='center' width='35%'>$tfont1 $numer1</td>
		<td align='center' width='30%' height='17' rowspan='3'>$tfont2<b> = </b></td>
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
	
	echo "</td></tr></table>";
	
	if ($i<10){echo "<br/>";}
	}
	
?>