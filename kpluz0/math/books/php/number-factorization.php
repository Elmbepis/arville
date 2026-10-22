<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

$primes = array(2,3,5);
$pcount=count($primes)-1;

for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	if ($i==1){$lim1=30; $lim2=100; $pfacs=2;}
	if ($i==2){$lim1=102; $lim2=220; $pfacs=2;}
	if ($i==3){$lim1=222; $lim2=400; $pfacs=3;}
	if ($i==4){$lim1=402; $lim2=1000; $pfacs=3;}
	if ($i>=5){$lim1=1002; $lim2=2000; $pfacs=4;}
	
	do{
		$num=1;
		$facs="";
		for ($j=1; $j<=$pfacs; $j+=1){
			$pfac=$primes[rand(0,$pcount)];
			$num=$num*$pfac;
			}
		$fac=rand(2,29);
		$num=$num*$fac;	
		}
	while ($num<$lim1 or $num>$lim2);	
	
	$facs="";
	for ($k=1; $k<=$num/2+1; $k+=1){
		if ($num%$k==0){$facs=$facs.$blue.$k.$black.", ";}
		}
	$facs=$facs." and ".$blue.$num.$black.".";
	
	echo $red."Example #".$i.$black."<br/><br/>";
	echo "Find the factors of ".$vio.$num.$black.".<br/><br/>";
	echo "The individual factors of ".$vio.$num.$black." are:<br/>";
	//$facs=substr($facs,0,(strlen($facs)-2));
	echo $facs;
	
	echo "<br/><br/>The paired factors of ".$vio.$num.$black." are:<br/>";
	
	$last=$num;
	for ($k=1; $k<=$num/2+1; $k+=1){
		if ($num%$k==0 and $k<$last){
			echo $blue.$k.$black." x ".$blue.($num/$k).$black."<br/>";
			$last=$num/$k;
			}
		}
 
	echo "</td></tr></table><br/>";
	
	}
	
	
?>