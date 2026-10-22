<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

$primes1 = array(2,3,5);
$primes2 = array(2,3,5,7,11);
$primes3 = array(2,3,5,7,11,13,17,19);

for ($i=1; $i<=5; $i+=1){

	if ($i<=2){$primes=$primes1;}
	if ($i==3){$primes=$primes2;}
	if ($i==4){$primes=$primes3;}
	if ($i==5){$primes=$primes3;}
	$pcount=count($primes)-1;

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	if ($i==1){$lim1=40; $lim2=160; $pfacs=3;}
	if ($i==2){$lim1=162; $lim2=360; $pfacs=4;}
	if ($i==3){$lim1=362; $lim2=800; $pfacs=4;}
	if ($i==4){$lim1=802; $lim2=1600; $pfacs=5;}
	if ($i>=5){$lim1=1602; $lim2=9000; $pfacs=6;}
	
	do{
		$num=1;
		for ($j=1; $j<=$pfacs; $j+=1){
			$pfac=$primes[rand(0,$pcount)];
			$num=$num*$pfac;
			$facs=$facs.$blue.$pfac.$black.", ";
			}
		}
	while ($num<$lim1 or $num>$lim2);	
	
	echo $red."Example #".$i.$black."<br/><br/>";
	echo "Find the prime factors of ".$vio.$num.$black.".<br/><br/>";
	
	$facs="";
	$num1=$num;
	for ($k=2; $k<=$num1; $k+=1){
		do {
			if ($num1%$k==0){
				$facs=$facs.$blue.$k.$black." x ";
				echo $num1." divided by ".$blue.$k.$black." = ".($num1/$k)."<br/>";
				$num1=$num1/$k;
				}
			}
		while ($num1%$k==0);	
		}
	
	$facs=substr($facs,0,(strlen($facs)-2));
	
	echo "<br/>The prime factorization of ".$vio.$num.$black." is:<br/>";
	echo $facs.".";
 
	echo "</td></tr></table><br/>";
	
	}
	
	
?>