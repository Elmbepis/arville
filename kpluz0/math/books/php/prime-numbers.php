<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

$primes = array(2,3,5,7,11,13,17,19,23);
$pcount=count($primes)-1;
$primes2 = array(149,151,157,162,167,173,179,181,191,193,197,199,211,223,227,229,233,239,241,251,257,263,269,271,277,
	281,283,293,307,311,313,317,331,337,347,349,353,359,367,373,379,383,389,397,401,409,419,421,431,433,439,443,449,457,461,
	463,467,479,487,491,499,503,509,521,523,541,547,557,563,569,571,577,587,593,599);
$pcount2=count($primes2)-1;

for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	if ($i==1){$lim1=149; $lim2=230; $pfacs=3;}
	if ($i==2){$lim1=231; $lim2=320; $pfacs=4;}
	if ($i==3){$lim1=321; $lim2=410; $pfacs=4;}
	if ($i==4){$lim1=411; $lim2=500; $pfacs=5;}
	if ($i>=5){$lim1=501; $lim2=599; $pfacs=6;}
	
	do {
		if (rand(1,7)<5){$num=$primes2[(rand(0,$pcount2))];}
		else{$num=rand(152,598);}
		}
	while ($num<$lim1 or $num>$lim2 or $num%2==0);	

	$sqrt=round((pow($num, 0.5)),2);
	
	echo $red."Example #".$i.$black."<br/><br/>";
	echo "Determine if ".$blue.$num.$black." is prime or not.<br/><br/>";
	echo $vio."Solution:".$black."<br/><br/>";
	echo "The square root of ".$num." is ".$sqrt.", ";
	echo "so let's check if ".$num." is divisible by any prime number below ".$sqrt.".<br/><br/>";
	
	$facs="";
	$num1=$num;
	$ans="prime";
	for ($k=0; $k<=$pcount; $k+=1){
		$pfac=$primes[$k];
		if ($ans!="composite" and $pfac<=$sqrt){
			if ($num1%$pfac==0){
				echo $num1." divided by ".$blue.$pfac.$black." = ".($num1/$pfac)."<br/>";
				$ans="composite";
				$dfac=$pfac;
				}
			else{echo $num1." divided by ".$blue.$pfac.$black." = ".(round(($num1/$pfac),2))."<br/>";}
			}
		}	
	
	$facs=substr($facs,0,(strlen($facs)-2));
	
	if ($ans=="prime"){echo "<br/>Since ".$vio.$num.$black." is not divisible by any prime number smaller than its square root, then it is ";}
	else{echo "<br/>Since ".$vio.$num.$black." is divisible by ".$blue.$dfac.$black.", then it is ";}
	echo $blue.$ans.$black.".<br/>";
 
	echo "</td></tr></table><br/>";
	
	}
	
	
?>