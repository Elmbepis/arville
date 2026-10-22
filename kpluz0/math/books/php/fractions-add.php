<?php

$grd=$grd;
$format=$format;

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:36pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}
	
function lowestfrac($numer,$denom) {
	$primes = array(2,3,5,7,11,13,17,19,23,29); 	
	for ($i=0; $i<=(count($primes)-1); $i+=1){
		$fac=$primes[$i];
		while ($numer%$fac==0 and $denom%$fac==0){$numer=$numer/$fac; $denom=$denom/$fac;}
		} 
	$frac=$numer."/".$denom;
	return $frac;
	}	

function lcd($denom1,$denom2) {
	if ($denom1%$denom2==0){$lcd=$denom1;}
	else{
		if ($denom2%$denom1==0){$lcd=$denom2;}
		else{		
			if ($denom1>$denom2){$num1=$denom1; $num2=$denom2;} else {$num1=$denom2; $num2=$denom1;} 
			for ($i=1; $i<=($num1*$num2); $i+=1){
				if (($num1*$i)%$num2==0){$lcd=$num1*$i; $i=$num1*$num2+1;}
				} 
			}
		}	
	return $lcd;
	}
	
for ($i=1; $i<=4; $i+=1){

	$lim1=2; $lim2=9;
	if ($i==2 or $i==3){$lim1=5; $lim2=12;}
	if ($i>3){$lim1=8; $lim2=25;}

	do {
	$numer1=rand($lim1,$lim2);
	$numer2=rand($lim1,$lim2);
	$denom1=rand($lim1,$lim2);
	$denom2=rand($lim1,$lim2);} 
	while ($denom1==$numer1 or $denom2==$numer2 or $denom1==$denom2 or ($i<3 and $numer1/$denom1+$numer2/$denom2>=1) or ($i>3 and ($denom1%$denom2==0 or $denom2%$denom1==0)));

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."</b><br/><br/>";

	$numer=$numer1*$denom2;
	$denom=$denom1*$numer2;
	$lcd=lcd($denom1,$denom2);
	$numer1new=$lcd/$denom1*$numer1;
	$numer2new=$lcd/$denom2*$numer2;
	$numernew=$numer1new+$numer2new;
	
	echo"
	<table border='0' width='80%' cellspacing='0' cellpadding='0'>
	<tr>
		<td align='center' width='13%'>$tfont1 $numer1</td>
		<td align='center' width='13%' rowspan='3'><img border='0' src='../../images/books-frac-add1.jpg' width='80' height='18'></td>
		<td align='center' width='13%'>$tfont1 $numer2</td>
		<td align='center' width='97' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
		<td align='center' width='13%'>$tfont1".$numer1new."</td>
		<td align='center' width='13%' rowspan='3'><img border='0' src='../../images/books-frac-add1.jpg' width='80' height='18'></td>
		<td align='center' width='13%'>$tfont1".$numer2new."</td>
	</tr>
	<tr>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='center'>$tfont1 $denom1</td>
		<td align='center'>$tfont1 $denom2</td>
		<td align='center'>$tfont1 $lcd</td>
		<td align='center'>$tfont1 $lcd</td>
	</tr>
	</table>	
	";
	 
	$frac=lowestfrac($numernew,$lcd);
	$pos=strpos($frac,"/");
	$numernew2=substr($frac,0,$pos);
	$denomnew=substr($frac,($pos+1));
	
	if ($numernew<$lcd){
		$tw=380;
		if ($numernew==$numernew2){$tw=160;}
		echo"
		<br/>
		<table border='0' width='$tw' cellspacing='0' cellpadding='0' style='margin-left: -25'>
		<tr>
			<td></td>
			<td align='center' width='25%'>$tfont1".$numernew."</td>";
			if ($numernew!=$numernew2){echo"<td></td>";}
			if ($numernew!=$numernew2){echo"<td align='center' width='25%'>$tfont1".$numernew2."</td>";}
		echo"
		</tr>
		<tr>
			<td align='center' width='97' height='17'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
			<td align='center' background='../../images/books-frac-line1.jpg'></td>";
			if ($numernew!=$numernew2){
				echo "<td align='center' width='97' height='17'><img border='0' src='../../images/books-frac-equal1.jpg'></td>
				<td align='center' background='../../images/books-frac-line1.jpg'></td>";
				}
		echo"	
		</tr>
		<tr>
			<td></td>
			<td align='center' width='25%'>$tfont1".$lcd."</td>";
			if ($numernew!=$numernew2){echo "<td></td>";}
			if ($numernew!=$numernew2){echo "<td align='center' width='25%'>$tfont1".$denomnew."</td>";}
		echo"
		</tr>
		</table>
		"; 
		}
	
	if ($numernew>$lcd){
		$whole=floor($numernew/$lcd);
		$numernew3=$numernew2-($whole*$denomnew);
		echo"
		<br/>
		<table border='0' width='400' cellspacing='0' cellpadding='0' align='left' style='margin-left: -25'>
		<tr>
			<td align='center' width='8%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg'></td>
			<td align='center' width='40%'>$tfont1".$numernew."</td>
			<td align='center' width='8%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg'></td>
			<td rowspan='3' width='22%'>$tfont1 $whole</td>
			<td align='center' width='22%'>$tfont1".$numernew3."</td>
		</tr>
		<tr>
			<td align='center' background='../../images/books-frac-line1.jpg' height='17'></td>
			<td align='center' background='../../images/books-frac-line1.jpg' height='17'></td>
		</tr>
		<tr>
			<td align='center' width='100'>$tfont1".$lcd."</td>
			<td align='center' width='100'>$tfont1".$denomnew."</td>
		</tr>
		<tr colspan='5'><td height='30'>&nbsp;</td></tr>
		</table>
		"; 
		}
		
	echo "</td></tr></table><br/>";
	}
	
//mixed fractions	
for ($i=5; $i<=5; $i+=1){

	$lim1=2; $lim2=9;

	do {
	$numer1=rand($lim1,$lim2);
	$numer2=rand($lim1,$lim2);
	$denom1=rand($lim1,$lim2);
	$denom2=rand($lim1,$lim2);} 
	while ($denom1<=$numer1 or $denom2<=$numer2 or $denom1==$denom2 or $denom1%$denom2==0 or $denom2%$denom1==0 or ($numer1*$denom2+$numer2*$denom1)<=($denom1*$denom2));
	$whole1=rand(1,5);
	$whole2=rand(1,5);

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."</b><br/><br/>";

	$numer=$numer1*$denom2;
	$denom=$denom1*$numer2;
	$lcd=lcd($denom1,$denom2);
	$numer1new=$lcd/$denom1*$numer1;
	$numer2new=$lcd/$denom2*$numer2;
	$numernew=$numer1new+$numer2new;
	
	echo"
	<table border='0' width='90%' cellspacing='0' cellpadding='0' >
	<tr>
		<td align='center' width='9%' rowspan='3'>$tfont1 $whole1</td>
		<td align='center' width='9%'>$tfont1 $numer1</td>
		<td align='center' width='9%' rowspan='3'><img border='0' src='../../images/books-frac-add1.jpg' width='80' height='18'></td>
		<td align='center' width='9%' rowspan='3'>$tfont1 $whole2</td>
		<td align='center' width='9%'>$tfont1 $numer2</td>
		<td align='center' width='10%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
		<td align='center' width='9%' rowspan='3'>$tfont1 $whole1</td>
		<td align='center' width='9%'>$tfont1".$numer1new."</td>
		<td align='center' width='9%' rowspan='3'><img border='0' src='../../images/books-frac-add1.jpg' width='80' height='18'></td>
		<td align='center' width='9%' rowspan='3'>$tfont1 $whole2</td>
		<td align='center' width='9%'>$tfont1".$numer2new."</td>
	</tr>
	<tr>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='center'>$tfont1 $denom1</td>
		<td align='center'>$tfont1 $denom2</td>
		<td align='center'>$tfont1 $lcd</td>
		<td align='center'>$tfont1 $lcd</td>
	</tr>
	</table><br/>	
	";
	 
	$whole=floor($numernew/$lcd);
	$numernew3=$numernew-($whole*$lcd);
	$newfrac=$numernew3."/".$lcd;
	$lowestfrac=lowestfrac($numernew3,$lcd);
	$pos=strpos($lowestfrac,"/");
	$numerfin=substr($lowestfrac,0,$pos);
	$denomfin=substr($lowestfrac,($pos+1));

	echo"
	<table border='0' width='70%' cellspacing='0' cellpadding='0' style='margin-left: -25'>
	<tr>
		<td align='center' width='8%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
		<td align='center' width='9%' rowspan='3'>$tfont1 ".($whole1+$whole2)."</td>
		<td align='center' width='9%' rowspan='3'><img border='0' src='../../images/books-frac-add1.jpg' width='80' height='18'></td>
		<td align='center' width='10%'>$tfont1 $numernew</td>
		<td align='center' width='8%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
		<td align='center' width='10%' rowspan='3'>$tfont1 ".($whole1+$whole2)."</td>
		<td align='center' width='9%' rowspan='3'><img border='0' src='../../images/books-frac-add1.jpg' width='80' height='18'></td>
		<td align='center' width='11%' rowspan='3'>$tfont1 ".$whole."&nbsp;</td>
		<td align='center' width='11%'>$tfont1 $numernew3</td>
	</tr>
	<tr>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='center'>$tfont1 $lcd</td>
		<td align='center'>$tfont1 $lcd</td>
	</tr>
	</table><br/>	
	";
		
	echo "
	<table border='0' width='40%' cellspacing='0' cellpadding='0' style='margin-left: -25'>
	<tr>
		<td align='center' width='10%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
		<td align='center' width='15%' rowspan='3'>$tfont1 ".($whole1+$whole2+$whole)."&nbsp;</td>
		<td align='center' width='25%'>$tfont1 $numernew3</td>";
	
	if ($lowestfrac!=$newfrac){
		echo "
			<td align='center' width='8%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
			<td align='center' width='9%' rowspan='3'>$tfont1 ".($whole1+$whole2+$whole)."&nbsp;</td>
			<td align='center' width='15%'>$tfont1 $numerfin</td>
			";}
	echo "<td rowspan='3'></td>
	</tr>
	<tr>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>";
		if ($lowestfrac!=$newfrac){echo "<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>";}
	echo "	
	</tr>
	<tr>
		<td align='center'>$tfont1 $lcd</td>";
		if ($lowestfrac!=$newfrac){echo "<td align='center'>$tfont1 $denomfin</td>";}
	echo "
	</tr>
	</table>";	
			
	echo "</td></tr></table><br/>";
	}
	
?>