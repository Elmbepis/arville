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

	$nlim1=1; $nlim2=9;
	if ($i>6){$nlim1=6; $nlim2=20;}

	$whole=rand($nlim1,$nlim2);
	$numer=rand($nlim1,$nlim2);
	$denom=$numer+rand(1,($numer+2));

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."<font color='#000000'></b><br/><br/>";

	if ($i%2!=0){
		echo"Convert <font color='#800080'><b>$whole $numer"."/"."$denom</b><font color='#000000'> into an improper fraction.<br/><br/>";
		echo "Step 1. Numerator of Improper Fraction = ($denom x $whole) + $numer = <font color='#800080'><b>".($denom*$whole+$numer)."</b><font color='#000000'><br/><br/>";
		echo "Step 2. Denominator of Improper Fraction = <font color='#800080'><b>".$denom."</b><font color='#000000'><br/><br/>";
		echo "Thus, $whole $numer"."/"."$denom = <font color='#800080'><b>".($denom*$whole+$numer)."/".$denom."</b><font color='#000000'><br/><br/>";
		}
	else{
		echo"Convert <font color='#800080'><b>".($whole*$denom+$numer)."/"."$denom</b><font color='#000000'> into a mixed fraction.<br/><br/>";
		echo "Step 1. Divide the numerator by the denominator: ";
		echo ($denom*$whole+$numer)." divided by $denom = <font color='#800080'><b>".$whole."</b><font color='#000000'> remainder <font color='#800080'><b>".$numer."</b><font color='#000000'><br/><br/>";
		echo "Step 2. Whole Number of Mixed Fraction = <font color='#800080'><b>".$whole."</b><font color='#000000'><br/><br/>";
		echo "Step 3. Numerator of Mixed Fraction = <font color='#800080'><b>".$numer."</b><font color='#000000'><br/><br/>";
		echo "Step 4. Denominator of Mixed Fraction = <font color='#800080'><b>".$denom."</b><font color='#000000'><br/><br/>";
		$frac0=$numer."/".$denom;
		echo "Thus, ".($denom*$whole+$numer)."/".$denom." = ";
		$frac=lowestfrac($numer,$denom);
		$frac=lowestfrac($numer,$denom);
		echo "<font color='#800080'><b>".$whole." ".$frac0."</b><font color='#000000'>";
		if ($frac!=$frac0){
			echo "<br/><br/>This mixed fraction is not yet in lowest terms. In the next lesson, we will learn how to reduce fractions in lowest terms.";
			}
		echo "<br/><br/>";
		}
			
	echo "</td></tr></table><br/>";
	}
	
?>