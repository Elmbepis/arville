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
	$primes = array(2,3,5,7,11,13,17,19); 	
	for ($i=0; $i<=(count($primes)-1); $i+=1){
		$fac=$primes[$i];
		while ($numer%$fac==0 and $denom%$fac==0){$numer=$numer/$fac; $denom=$denom/$fac;}
		} 
	$frac=$numer."/".$denom;
	return $frac;
	}	
	
for ($i=1; $i<=5; $i+=1){

	$lim1=2; $lim2=14; $fac=rand(2,9);
	if ($i==2 or $i==3){$lim1=12; $lim2=24; $fac=rand(3,12);}
	if ($i>3){$lim1=25; $lim2=45; $fac=rand(5,20);}

	do {
		$numer1=rand($lim1,$lim2);
		$denom1=rand($lim1,$lim2);
		}
	while ($denom1==$numer1);
	$frac=lowestfrac($numer1,$denom1);
	$pos=strpos($frac,"/");
	$numer1=substr($frac,0,$pos);
	$denom1=substr($frac,($pos+1));
	
	
	$numer2=$numer1*$fac;
	$denom2=$denom1*$fac; 

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."</b><br/><br/>";
	
	if ($i>1){$opt=rand(1,2);}else{$opt=1;}
	if ($opt==1){$snumer1="X"; $snumer2=$numer2; $sdenom1=$denom1; $sdenom2=$denom2;}
	if ($opt==2){$snumer1=$numer1; $snumer2=$numer2; $sdenom1="X"; $sdenom2=$denom2;}
	
	echo "<font color='#000000'>Find the value of 'X' in the proportion <font color='#0000CC'><b>".$snumer1.":".$sdenom1." = ".$snumer2.":".$sdenom2."</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Step 1. Transform the proportion into fraction form.<font color='#000000'><br/><br/>";
	echo"
	<table border='0' width='30%' cellspacing='0' cellpadding='0'>
	<tr>
		<td align='center' width='13%'>$tfont1 $snumer1</td>
		<td align='center' width='97' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
		<td align='center' width='13%'>$tfont1".$snumer2."</td>
	</tr>
	<tr>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='center'>$tfont1 $sdenom1</td>
		<td align='center'>$tfont1 $sdenom2</td>
	</tr>
	</table>	
	";
	
	if ($opt==1){
		echo "<font color='#800080'><br/>Step 2. Perform cross multiplication.<font color='#000000'><br/><br/>";
		echo"
		<table border='0' width='30%' cellspacing='0' cellpadding='0'>
		<tr>
			<td align='center' width='13%' rowspan='3'>$tfont1 $snumer1</td>
			<td align='center' width='97' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
			<td align='center' width='13%'>$tfont1(".$snumer2.")(".$denom1.")</td>
		</tr>
		<tr>
			<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		</tr>
		<tr>
			<td align='center'>$tfont1 $sdenom2</td>
		</tr>
		</table>	
		";
		
		echo "<font color='#800080'><br/>Step 3. Solve for the value of 'X'.<font color='#000000'><br/><br/>";
		echo"X = ".($numer2*$denom1)."/".$denom2." = ".$numer1;
		
		echo "<font color='#800080'><br/><br/>Step 4. Write the complete proportion.<font color='#000000'><br/><br/>";
		echo "<font color='#0000CC'><b>".$numer1.":".$denom1." = ".$numer2.":".$denom2."</b><font color='#000000'>";
		
		echo "</td></tr></table><br/>";
		}
		
	if ($opt==2){
		echo "<font color='#800080'><br/>Step 2. Since 'X' is in a denominator, turn the fractions into their reciprocals.<font color='#000000'><br/><br/>";
		echo"
		<table border='0' width='30%' cellspacing='0' cellpadding='0'>
		<tr>
			<td align='center' width='13%'>$tfont1 $sdenom1</td>
			<td align='center' width='97' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
			<td align='center' width='13%'>$tfont1".$denom2."</td>
		</tr>
		<tr>
			<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
			<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		</tr>
		<tr>
			<td align='center'>$tfont1 $snumer1</td>
			<td align='center'>$tfont1 $snumer2</td>
		</tr>
		</table>	
		";
		echo "<font color='#800080'><br/>Step 3. Perform cross multiplication.<font color='#000000'><br/><br/>";
		echo"
		<table border='0' width='30%' cellspacing='0' cellpadding='0'>
		<tr>
			<td align='center' width='13%' rowspan='3'>$tfont1 $sdenom1</td>
			<td align='center' width='97' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
			<td align='center' width='13%'>$tfont1(".$sdenom2.")(".$numer1.")</td>
		</tr>
		<tr>
			<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		</tr>
		<tr>
			<td align='center'>$tfont1 $snumer2</td>
		</tr>
		</table>	
		";
		
		echo "<font color='#800080'><br/>Step 4. Solve for the value of 'X'.<font color='#000000'><br/><br/>";
		echo"X = ".($denom2*$numer1)."/".$numer2." = ".$denom1;
		
		echo "<font color='#800080'><br/><br/>Step 5. Write the complete proportion.<font color='#000000'><br/><br/>";
		echo "<font color='#0000CC'><b>".$numer1.":".$denom1." = ".$numer2.":".$denom2."</b><font color='#000000'>";
		
		echo "</td></tr></table><br/>";
		//if ($i<5){echo "<br/>";}
		}
	}
	
?>