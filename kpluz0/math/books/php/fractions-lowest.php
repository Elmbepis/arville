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
	
$numer="";
$denom="";
$whole="";	
$fac="";

function lowestfrac($numer,$denom) {
	$primes = array(2,3,5,7,11,13,17,19,23,29); 	
	$gcf=1;
	for ($i=0; $i<=(count($primes)-1); $i+=1){
		$fac=$primes[$i];
		while ($numer%$fac==0 and $denom%$fac==0){$numer=$numer/$fac; $denom=$denom/$fac; $gcf=$gcf*$fac;}
		} 
	$frac=$numer."/".$denom."=".$gcf;
	return $frac;
	}	
	
for ($i=1; $i<=10; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."<font color='#000000'></b><br/><br/>";
	$primes = array(2,3,5,7); 	
	
	if ($i%2!=0){
		$nlim1=8; $nlim2=20;
		if ($i==5){$nlim1=17; $nlim2=35;}
		if ($i>6){$nlim1=26; $nlim2=60;}
		do {
			$numer=rand($nlim1,$nlim2);
			$denom=rand($nlim1,$nlim2);
			}
		while ($denom<=$numer);
		if($i==1){$fac1=$primes[rand(0,2)];}else{$fac1=$primes[rand(0,3)];}
		$numer=$numer*$fac1;	
		$denom=$denom*$fac1;	
		if ($i>6){
			$fac2=$primes[rand(0,2)];
			$numer=$numer*$fac2;	
			$denom=$denom*$fac2;	
			}
		echo"Reduce <font color='#800080'><b>".$numer."/"."$denom</b><font color='#000000'> into lowest terms.<br/><br/>";
		$frac=lowestfrac($numer,$denom);
		$pos=strpos($frac,"=");
		$fraclowest=substr($frac,0,$pos);
		$gcf=substr($frac,($pos+1));
		echo "The GCF of $numer and $denom is ".$gcf.".<br/><br/>";
		echo "Dividing both the numerator and the denominator by ".$gcf.", we get: <br/><br/>";
		echo $numer."/".$denom." = <font color='#800080'><b>".$fraclowest."</b><font color='#000000'>";
		}
	else{
		$nlim1=1; $nlim2=9;
		if ($i>6){$nlim1=6; $nlim2=20;}
		$whole=rand($nlim1,$nlim2);
		$numer=rand($nlim1,$nlim2);
		$denom=$numer+rand(1,($numer+2));
		echo"Reduce <font color='#800080'><b>".($whole*$denom+$numer)."/"."$denom</b><font color='#000000'> into lowest terms.<br/><br/>";
		echo "Convert the improper fraction into a mixed fraction:<br/><br/>";
		echo "Step 1. ".($denom*$whole+$numer)." divided by $denom = <font color='#800080'><b>".$whole."</b><font color='#000000'> remainder <font color='#800080'><b>".$numer."</b><font color='#000000'><br/><br/>";
		echo "Step 2. Whole Number of Mixed Fraction = <font color='#800080'><b>".$whole."</b><font color='#000000'><br/><br/>";
		echo "Step 3. Numerator of Mixed Fraction = <font color='#800080'><b>".$numer."</b><font color='#000000'><br/><br/>";
		echo "Step 4. Denominator of Mixed Fraction = <font color='#800080'><b>".$denom."</b><font color='#000000'><br/><br/>";
		$frac0=$numer."/".$denom;
		echo "Thus, ".($denom*$whole+$numer)."/".$denom." = ";
		$frac=lowestfrac($numer,$denom);
		$pos=strpos($frac,"=");
		$fraclowest=substr($frac,0,$pos);
		$gcf=substr($frac,($pos+1));
		if ($gcf>1){
			echo $whole." ".$frac0;
			echo "<br/><br/>The GCF of $numer and $denom is ".$gcf.".<br/><br/>";
			echo "Dividing both the numerator and the denominator by ".$gcf.", we get: <br/><br/>";
			echo ($whole*$denom+$numer)."/".$denom." = ".$whole." ".$frac0." = <font color='#800080'><b>".$whole." ".$fraclowest."</b><font color='#000000'>";
			}
		else{
			echo "<font color='#800080'><b>".$whole." ".$frac0."</b><font color='#000000'>";
			}
		echo "<br/><br/>";
		}
			
	echo "</td></tr></table><br/>";
	}
	
?>