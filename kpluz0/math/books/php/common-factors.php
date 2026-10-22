<?php

$grd=$grd;
$format=$format;

function getcf($level) {
	if ($level==1){$primes = array(2,3,5,7,11); $num1=2; $num2=1; $numlim1=50; $numlim2=300;}
	if ($level==2){$primes = array(2,3,5,7,11,13); $num1=2; $num2=2; $numlim1=300; $numlim2=700;}
	if ($level==3){$primes = array(3,5,7,11,13,17,19); $num1=3; $num2=3; $numlim1=700; $numlim2=2000;}
	do{
	$comnum=1;
	for ($j=1; $j<=$num1; $j+=1){
		$fac=$primes[rand(0,(count($primes)-1))];
		$comnum=$comnum*$fac;			
		}
	$number1=$comnum;
	$number2=$comnum;
	$num2a=rand(1,$num2);
	$num2b=rand(1,$num2);	
	for ($k=1; $k<=$num2a; $k+=1){
		do {
			$fac=$primes[rand(0,(count($primes)-1))]; 
			}
		while ($number1%$fac==0);
		$number1=$number1*$fac;	
		}
	for ($k=1; $k<=$num2b; $k+=1){
		do {$fac=$primes[rand(0,(count($primes)-1))];}
		while ($number1%$fac==0);
		$number2=$number2*$fac;	
		}
	}
	while ($number1<$numlim1 or $number1>$numlim2 or $number2<$numlim1 or $number2>$numlim2);	
	$sallfacs=$number1."-".$number2;
	return $sallfacs;
	}	
	
for ($m=1; $m<=3; $m+=1){
	$sfacs=getcf($m);
	$pos1=strpos($sfacs,"-");
 	$number1=substr($sfacs,0,$pos1);
 	$number2=substr($sfacs,($pos1+1));
 	$factors1="";
 	$factors2="";
 	$scomfacs="";
	
	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$m."</b><br/><br/>";
	echo "<font color='#000000'>Let's find the common factors of ".$number1." and ".$number2.".";
	//Step 1
	echo "<font color='#800080'><br/><br/>Step 1<font color='#000000'>";
	echo "<br/><br/>Here are the paired factors of ".$number1.":<br/><br/>";
	for ($i=1; $i<=($number1/2+1); $i+=1){
		$i2=$i.", ";
		if ($number1%$i==0 and strpos($factors1,$i2)<1){
			$fac1=$i; 
			$fac2=$number1/$i; 
			echo $fac1." x ".$fac2." = ".$number1."<br/>";
			$factors1=$factors1.$fac1.", ".$fac2.", ";
			}
		} 
	$factors1=substr($factors1,0,(strlen($factors1)-2));	
	echo "<br/>The factors of ".$number1." are therefore: ".$factors1.".";	
	//Step 2
	echo "<font color='#800080'><br/><br/>Step 2<font color='#000000'>";
	echo "<br/><br/>Here are the paired factors of ".$number2.":<br/><br/>";
	for ($i=1; $i<=$number2/2+1; $i+=1){
		$i2=$i.", ";
		if ($number2%$i==0 and strpos($factors2,$i2)<1){
			$fac1=$i; 
			$fac2=$number2/$i; 
			echo $fac1." x ".$fac2." = ".$number2."<br/>";
			$factors2=$factors2.$fac1.", ".$fac2.", ";
			if ($number1%$fac1==0){$scomfacs=$scomfacs.$fac1.", ";}
			if ($number1%$fac2==0){$scomfacs=$scomfacs.$fac2.", ";}
			}
		} 
	$factors2=substr($factors2,0,(strlen($factors2)-2));	
	echo "<br/>The factors of ".$number2." are therefore: ".$factors2.".";	
	//Step 3
	echo "<font color='#800080'><br/><br/>Step 3<font color='#000000'>";
	$scomfacs=substr($scomfacs,0,(strlen($scomfacs)-2));	
	echo "<br/><br/>Thus, the common factors of ".$number1." and ".$number2." are ".$scomfacs.".<br/>";
	
	echo "</td></tr></table><br/>";
	}
	
?>