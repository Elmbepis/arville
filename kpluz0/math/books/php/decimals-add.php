<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}
$small="<span lang='EN-US' style='font-size: 12pt'>";

$red=$font."<font color='#CC0000'><b>";
$red2=$font."<font color='#CC0000'></b>";
$blue=$font."<font color='#0000CC'><b>";
$black=$font."<font color='#000000'></b>";
$vio=$font."<font color='#800080'>";
$gray=$font."<font color='#999999'></b>";


for ($i=1; $i<=4; $i+=1){
	echo "<table align='center' width='80%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	echo $red."Example #".$i.$small."<br/>".$black; 
	
	$num1=0;
	$num2=0;
	do{	
		if ($i==1){$base1=rand(19,999); $base2=rand(19,999); $exp1=rand(1,2); $exp2=rand(1,3);}
		if ($i==2 or $i==3){$base1=rand(199,9999); $base2=rand(199,9999); $exp1=rand(1,4); $exp2=rand(2,4);}
		if ($i==4){$base1=rand(1999,99999); $base2=rand(1999,99999); $exp1=rand(1,5); $exp2=rand(1,5);}
		$num1=$base1*pow(10,(-1*$exp1));
		$num2=$base2*pow(10,(-1*$exp2));
		$ans=$num1+$num2;	
		}
	while (strlen(floor($num1))==strlen(floor($num2)) or $num1-floor($num1)<0.00000001 or $num2-floor($num2)<0.00000001 or $ans-floor($ans)<0.00000001);	

	$pos1=strpos($num1,".");
	$whole1=substr($num1,0,$pos1);
	$dec1=substr($num1,($pos1+1));
	
	$pos2=strpos($num2,".");
	$whole2=substr($num2,0,$pos2);
	$dec2=substr($num2,($pos2+1));
	
	$pos3=strpos($ans,".");
	$whole3=substr($ans,0,$pos3);
	$dec3=substr($ans,($pos3+1));
	
	while (strlen($dec3)<strlen($dec1) or strlen($dec3)<strlen($dec2)){$dec3=$dec3."0";}
	echo $small."<br/>".$font.$vio." ".$num1." + ".$num2." = ?".$small."<br/><br/> ".$font.$black;
	echo "Align the decimal points<br/>then add the numbers:".$small."<br/><br/>".$font;
	
	$charwid=30;
	$wwid=(strlen($whole3))*$charwid;
	$dwid=(strlen($dec3))*$charwid;
	$pwid=$charwid;
	$pluswid=2*$charwid;
	$tw=$pluswid+$wwid+$dwid+$pwid;
	
	echo"
	<table border='0' width='$tw' cellspacing='0' cellpadding='0'>
	<tr>
		<td width='$pluswid'>&nbsp;</td>
		<td align='right' width='$wwid'>$font $vio $whole1</td>
		<td align='center' width='$pwid'>$font $red .</td>
		<td align='left' width='$dwid'>$font $vio $dec1</td>
	</tr>
	<tr>
		<td>
		<p align='left'>$font +</td>
		<td align='right'>$font $vio $whole2</td>
		<td align='center'>$font $red .</td>
		<td align='left'>$font $vio $dec2</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align='center' colspan='3' background='../../images/books-frac-line1.jpg' height='17'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align='right'>$font $vio $whole3</td>
		<td align='center'>$font $red .</td>
		<td align='left'>$font $vio $dec3</td>
	</tr>
	</table>
	";

	echo "</td></tr></table><br/>";
	}
	
	
for ($i=5; $i<=5; $i+=1){

	echo "<table align='center' width='80%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	echo $red."Example #".$i.$small."<br/>".$black; 
	
	$num1=0;
	$num2=0;
	$num3=0;
	do{	
		$base1=rand(199,9999); $base2=rand(199,9999); $base3=rand(199,9999); $exp1=rand(1,4); $exp2=rand(1,4); $exp3=rand(1,4);
		$num1=$base1*pow(10,(-1*$exp1));
		$num2=$base2*pow(10,(-1*$exp2));
		$num3=$base3*pow(10,(-1*$exp3));
		$ans=$num1+$num2+$num3;	
		}
	while (strlen(floor($num1))==strlen(floor($num2)) or $num1-floor($num1)<0.00000001 or $num2-floor($num2)<0.00000001 or $num3-floor($num3)<0.00000001 or $ans-floor($ans)<0.00000001);	

	$pos1=strpos($num1,".");
	$whole1=substr($num1,0,$pos1);
	$dec1=substr($num1,($pos1+1));
	
	$pos2=strpos($num2,".");
	$whole2=substr($num2,0,$pos2);
	$dec2=substr($num2,($pos2+1));
	
	$pos3=strpos($num3,".");
	$whole3=substr($num3,0,$pos3);
	$dec3=substr($num3,($pos3+1));
	
	$pos4=strpos($ans,".");
	$whole4=substr($ans,0,$pos4);
	$dec4=substr($ans,($pos4+1));
	
	while (strlen($dec3)<strlen($dec1) or strlen($dec3)<strlen($dec2)){$dec3=$dec3."0";}
	
	echo $small."<br/>".$font.$vio." ".$num1." + ".$num2." + ".$num3." = ?".$small."<br/><br/> ".$font.$black;
	echo "Align the decimal points<br/>then add the numbers:".$small."<br/><br/>".$font;
	
	$charwid=30;
	$wwid=(strlen($whole4))*$charwid;
	$dwid=(strlen($dec4))*$charwid;
	$pwid=$charwid;
	$pluswid=2*$charwid;
	$tw=$pluswid+$wwid+$dwid+$pwid;
	
	echo"
	<table border='0' width='$tw' cellspacing='0' cellpadding='0'>
	<tr>
		<td width='$pluswid'>&nbsp;</td>
		<td align='right' width='$wwid'>$font $vio $whole1</td>
		<td align='center' width='$pwid'>$font $red .</td>
		<td align='left' width='$dwid'>$font $vio $dec1</td>
	</tr>
	<tr>
		<td><p align='left'>$font +</td>
		<td align='right'>$font $vio $whole2</td>
		<td align='center'>$font $red .</td>
		<td align='left'>$font $vio $dec2</td>
	</tr>
	<tr>
		<td><p align='left'>$font +</td>
		<td align='right'>$font $vio $whole3</td>
		<td align='center'>$font $red .</td>
		<td align='left'>$font $vio $dec3</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align='center' colspan='3' background='../../images/books-frac-line1.jpg' height='17'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align='right'>$font $vio $whole4</td>
		<td align='center'>$font $red .</td>
		<td align='left'>$font $vio $dec4</td>
	</tr>
	</table>
	";

	echo "</td></tr></table><br/>";
	}
	
?>