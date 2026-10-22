<?php

$grd=$grd;
$format=$format;

function getlcm($level) {
	if ($level==1){$primes = array(2,3,5,7,11); $num1=rand(1,2); $num2=1; $numlim1=10; $numlim2=200;}
	if ($level==2){$primes = array(2,3,5,7,11,13); $num1=rand(1,3); $num2=2; $numlim1=50; $numlim2=500;}
	if ($level==3){$primes = array(2,3,5,7,11,13,17); $num1=rand(2,3); $num2=3; $numlim1=100; $numlim2=3000;}
	do{
	$lcm=1;
	$sallfacs="";
	$spfmult="";
	$sfacs1="";
	$sfacs2="";
	$sfacs3="";
	$fcomb="";
	for ($j=1; $j<=$num1; $j+=1){
		$fac=$primes[rand(0,(count($primes)-1))];
		$lcm=$lcm*$fac;			
		$sfacs1=$sfacs1.$fac.", ";
		$fcomb=$fcomb.$fac.", ";
		$spfmult=$spfmult.$fac." x ";
		}
	$number1=$lcm;
	$number2=$lcm;
	$num2a=rand(1,$num2);
	$num2b=rand(1,$num2);	
	for ($k=1; $k<=$num2a; $k+=1){
		do {
			$fac=$primes[rand(0,(count($primes)-1))]; 
			}
		while ($number1%$fac==0);
		$number1=$number1*$fac;	
		$sfacs2=$sfacs2.$fac.", ";		
		$fcomb=$fcomb.$fac.", ";
		$spfmult=$spfmult.$fac." x ";
		$lcm=$lcm*$fac;			
		}
	for ($k=1; $k<=$num2b; $k+=1){
		do {$fac=$primes[rand(0,(count($primes)-1))];}
		while ($number1%$fac==0);
		$number2=$number2*$fac;	
		$sfacs3=$sfacs3.$fac.", ";	
		$fcomb=$fcomb.$fac.", ";
		$spfmult=$spfmult.$fac." x ";
		$lcm=$lcm*$fac;			
		}
	}
	while ($number1<$numlim1 or $number1>$numlim2 or $number2<$numlim1 or $number2>$numlim2);	
	$sallfacs=$number1."*".$number2."=".$spfmult.">".$fcomb."+".$lcm."-".$sfacs1."&".$sfacs2."%".$sfacs3;
	return $sallfacs;
	}	
	
for ($i=1; $i<=3; $i+=1){
	$sfacs=getlcm($i);
	$pos1=strpos($sfacs,"*");
	$pos2=strpos($sfacs,"=");
	$pos3=strpos($sfacs,">");
	$pos4=strpos($sfacs,"+");
	$pos5=strpos($sfacs,"-");
 	$number1=substr($sfacs,0,$pos1);
 	$number2=substr($sfacs,($pos1+1),($pos2-$pos1-1));
 	$spfmult=substr($sfacs,($pos2+1),($pos3-$pos2-1));
 	$fcomb=substr($sfacs,($pos3+1),($pos4-$pos3-1));
 	$lcm=substr($sfacs,($pos4+1),($pos5-$pos4-1));
 	$sfacs=substr($sfacs,($pos5+1));
	do {
		$pos1=strpos($sfacs,"&");
		$pos2=strpos($sfacs,"%");
		$scomfacs=substr($sfacs,0,$pos1);
		$sfacs1=substr($sfacs,($pos1+1),($pos2-$pos1-1));
		$sfacs2=substr($sfacs,($pos2+1));
		$m+=1;
		} 
	while (strpos($sfacs,"&")>0 and $m<5);

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."</b><br/><br/>";
	echo "<font color='#000000'>Let's find the LCM of the numbers ".$number1." and ".$number2.".";
	echo "<font color='#800080'><br/><br/>Step 1<font color='#000000'>";
	$sfacs1=substr($sfacs1,0,(strlen($sfacs1)-2));	
	$sfacs2=substr($sfacs2,0,(strlen($sfacs2)-2));	
	echo "<br/>The prime factors of ".$number1." are ".$scomfacs." ".$sfacs1.".";
	echo " The prime factors of ".$number2." are ".$scomfacs." ".$sfacs2."."; 
	echo "<font color='#800080'><br/><br/>Step 2<font color='#000000'>";
	$scomfacs=substr($scomfacs,0,(strlen($scomfacs)-2));
	$pos=strpos($scomfacs,",",3);
	if ($pos<1){$scomfacs=str_replace(", "," and ",$scomfacs);}
	else{
		$pos1=strpos($scomfacs,",");
		$pos2=strpos($scomfacs,",",($pos1+2));
		$old=substr($scomfacs,($pos2-1));
		$new=str_replace(", ",", and ",$old);
		$scomfacs=substr($scomfacs,0,($pos2-1)).$new;
		}
	echo "<br/>After combining the prime factors of the two numbers (listing common prime factors only once), we get this final combination of factors: ";
    $fcomb=substr($fcomb,0,(strlen($fcomb)-2));	
	echo $fcomb.".";
    echo "<font color='#800080'><br/><br/>Step 3<font color='#000000'>";
    $spfmult=substr($spfmult,0,(strlen($spfmult)-3));	
    echo "<br/>Multiplying them together, we get ".$spfmult." = ".$lcm.".";
    echo "<br/><br/>Thus, the LCM of ".$number1." and ".$number2." is <font color='#CC0000'><b>".$lcm."</b><font color='#000000'>.";  
	echo "</td></tr></table><br/>";
	}
	
?>