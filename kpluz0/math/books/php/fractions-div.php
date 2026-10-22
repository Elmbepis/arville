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

	
for ($i=1; $i<=5; $i+=1){

	$lim1=2; $lim2=12;
	if ($i>1){$lim1=5; $lim2=15;}
	if ($i>3){$lim1=11; $lim2=29;}

	do {
	$numer1=rand($lim1,$lim2);
	$numer2=rand($lim1,$lim2);
	$denom1=rand($lim1,$lim2);
	$denom2=rand($lim1,$lim2);} 
	while ($denom1==$numer1 or $denom2==$numer2 or ($numer1*$denom2)%($denom1*$numer2)==0 or ($i<3 and ($numer1*$denom2)>($denom1*$numer2)));

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."</b><br/><br/>";

	$numer=$numer1*$denom2;
	$denom=$denom1*$numer2;
	
	echo"
	<table align='center' border='0' width='100%' cellspacing='0' cellpadding='0'>
	<tr>
		<td align='center' width='13%'>$tfont1".$numer1."</td>
		<td align='center' width='80'></td>
		<td align='center' width='13%'>$tfont1".$numer2."</td>
		<td align='center' width='97'></td>
		<td align='center' width='22%'>$tfont1".$numer1." ".$tfont3."x".$tfont1." ".$denom2."</td>
		<td align='center' width='97'></td>
		<td align='center' width='13%'>$tfont1".$numer."</td>

	</tr>
	<tr>
		<td align='center' background='../../images/books-frac-line1.jpg'></td>
		<td align='center' width='80' height='18'><img border='0' src='../../images/books-frac-div1.jpg'></td>
		<td align='center' background='../../images/books-frac-line1.jpg'></td>
		<td align='center' width='97' height='17'><img border='0' src='../../images/books-frac-equal1.jpg'></td>
		<td align='center' background='../../images/books-frac-line1.jpg'></td>
		<td align='center' width='97' height='17'><img border='0' src='../../images/books-frac-equal1.jpg'></td>
		<td align='center' background='../../images/books-frac-line1.jpg'></td>
	</tr>
	<tr>
		<td align='center'>$tfont1".$denom1."</td>
		<td align='center' width='80'></td>
		<td align='center'>$tfont1".$denom2."</td>
		<td align='center' width='97'></td>
		<td align='center' width='22%'>$tfont1".$denom1." ".$tfont3."x".$tfont1." ".$numer2."</td>
		<td align='center' width='97'></td>
		<td align='center'>$tfont1".$denom."</td>
	</tr>
	</table>
	";
	 
	$frac=lowestfrac($numer,$denom);
	$pos=strpos($frac,"/");
	$numernew=substr($frac,0,$pos);
	$denomnew=substr($frac,($pos+1));
	
	if ($numernew!=$numer and $numer<$denom){
		echo"
		<br/>
		$tfont1 In lowest terms,<br/><br/>
		<table border='0' width='297' cellspacing='0' cellpadding='0'>
		<tr>
			<td align='center' width='100'>$tfont1".$numer."</td>
			<td></td>
			<td align='center' width='100'>$tfont1".$numernew."</td>
		</tr>
		<tr>
			<td align='center' background='../../images/books-frac-line1.jpg'></td>
			<td align='center' width='97' height='17'><img border='0' src='../../images/books-frac-equal1.jpg'></td>
			<td align='center' background='../../images/books-frac-line1.jpg'></td>
		</tr>
		<tr>
			<td align='center' width='100'>$tfont1".$denom."</td>
			<td></td>
			<td align='center' width='100'>$tfont1".$denomnew."</td>
		</tr>
		</table>
		"; 
		}
	
	if ($numer>$denom){
		$whole=floor($numer/$denom);
		$numernew=$numernew-($whole*$denomnew);
		echo"
		<br/>
		$tfont1 In lowest terms,<br/><br/>
	<table border='0' width='350' cellspacing='0' cellpadding='0'>
	<tr>
		<td align='center' width='40%'>$tfont1".$numer."</td>
		<td align='center' width='20%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg'></td>
		<td rowspan='3' width='20%'>$tfont1 $whole</td>
		<td align='center' width='20%'>$tfont1".$numernew."</td>
	</tr>
	<tr>
		<td align='center' background='../../images/books-frac-line1.jpg' height='17'></td>
		<td align='center' background='../../images/books-frac-line1.jpg' height='17'></td>
	</tr>
	<tr>
		<td align='center' width='100'>$tfont1".$denom."</td>
		<td align='center' width='100'>$tfont1".$denomnew."</td>
	</tr>
	</table>";
		}
		
	echo "</td></tr></table><br/>";
	}
	
?>