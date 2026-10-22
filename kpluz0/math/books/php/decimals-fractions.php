<?php

$grd=$grd;
$format=$format;

$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
if ($format==1){
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
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

for ($i=1; $i<=10; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."<font color='#000000'></b><br/><br/>";

	$opt=rand(1,3);	
			
	if ($opt==1){
		if ($i==1){
			do {$numer=rand(1,9); $exp=rand(1,2); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		if ($i==2 or $i==3){
			do {$numer=rand(1,99); $exp=rand(1,2); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		if ($i>=4){
			do {$numer=rand(11,99); $exp=rand(2,3); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		if (rand(1,2)==1){$whole=rand(1,3); $numer=$whole*$denom+$numer;}
		$dec=$numer/$denom;
		echo"Convert <font color='#800080'><b>$numer"."/"."$denom</b><font color='#000000'> into a decimal number.<br/><br/>";
		echo "<font color='#0000CC'><b>Solution:</b><font color='#000000'><br/><br/>";
		echo "Divide the numerator by the denominator.<br/><br/>";
		echo "Since the denominator is ".$denom.", the answer is just the numerator, <font color='#800080'><b>".$numer."</b><font color='#000000'>";
		echo ", with a decimal point ".$exp." ";
		if($exp>1){echo "places";} else{echo "place";} 
		echo " from the right.<br/><br/>";
		echo $numer." divided by ".$denom." = <font color='#800080'><b>".$dec."</b><font color='#000000'><br/>";
		}
		
	if ($opt==2){
		if ($i==1){
			do {$numer=rand(1,9); $exp=rand(1,2); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		if ($i==2 or $i==3){
			do {$numer=rand(1,99); $exp=rand(1,2); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		if ($i>=4){
			do {$numer=rand(11,99); $exp=rand(2,3); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		$whole=rand(1,3);
		$dec=$numer/$denom;
		echo"Convert <font color='#800080'><b>$whole $numer"."/"."$denom</b><font color='#000000'> into a decimal number.<br/><br/>";
		echo "<font color='#0000CC'><b>Solution:</b><font color='#000000'><br/><br/>";
		echo "Step 1. The whole number of the decimal number is also <font color='#800080'><b>".$whole."</b><font color='#000000'>.<br/><br/>";
		echo "Step 2. Divide the numerator by the denominator.<br/><br/>";
		echo "Since the denominator is ".$denom.", the answer is just the numerator, <font color='#800080'><b>".$numer."</b><font color='#000000'>";
		echo ", with a decimal point ".$exp." ";
		if($exp>1){echo "places";} else{echo "place";} 
		echo " from the right, or ";
		echo $numer."/".$denom." = <font color='#800080'><b>".$dec."</b><font color='#000000'>.<br/><br/>";
		echo "Thus, ".$whole." ".$numer."/".$denom." = <font color='#800080'><b>".($whole+$dec)."</b><font color='#000000'><br/>";
		}
		
	if ($opt>=3){
		if ($i==1){
			do {$numer=rand(1,9); $exp=rand(1,2); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		if ($i==2 or $i==3){
			do {$numer=rand(1,99); $exp=rand(1,2); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		if ($i>=4){
			do {$numer=rand(11,99); $exp=rand(2,3); $denom=pow(10,$exp);}
			while ($numer>=$denom);
			}
		$whole=rand(1,9); 
		$dec=$whole+$numer/$denom;
		echo"Convert <font color='#800080'><b>$dec</b><font color='#000000'> into a mixed fraction.<br/><br/>";
		echo "Step 1. The whole number of the mixed fraction is also <font color='#800080'><b>".$whole."</b><font color='#000000'>.<br/><br/>";
		echo "Step 2. The decimal number has ".$exp." decimal ";
		if($exp>1){echo "places";} else{echo "place";} 
		echo ". The denominator is therefore <font color='#800080'><b>1";
		for ($d=1; $d<=$exp; $d+=1){echo "0";}
		echo "</b><font color='#000000'>.<br/><br/>";
		echo "Step 3. The decimal part (without the decimal point) is the numerator. That's <font color='#800080'><b>".$numer."</b><font color='#000000'>.<br/><br/>";
		$frac0=$numer."/".$denom;
		$frac=lowestfrac($numer,$denom);
		if ($frac0==$frac){echo "Thus, ".$dec." = <font color='#800080'><b>".$whole." ".$frac;}
		else{echo "Thus, ".$dec." = ".$whole." ".$frac0." = <font color='#800080'><b>".$whole." ".$frac;}
		echo "</b><font color='#000000'><br/>";
		}		
			
	echo "</td></tr></table>";
	if ($i<10){echo "<br/>";}
	}
	
?>