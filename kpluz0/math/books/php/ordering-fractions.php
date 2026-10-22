<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";



for ($i=0; $i<=4; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	
	$all="***"; $pos=0;
	
	for ($j=0; $j<=$i+4; $j+=1){
		do{
			$numer=rand(1,15); 
			$denom=rand(2,16);
			$frac[$j]=round(($numer/$denom),4)."*".$numer."/".$denom;
			$pos=strpos($frac[$j],"*");
			$chk=substr($frac[$j],0,($pos+1));
			} 
		while ($numer==$denom or strpos($all,$chk)>0);
		$all=$all.$chk;
		}
	
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	if (rand(1,2)==1){$order="increasing";}
	else{$order="decreasing";}
	
	echo $red."Example #".($i+1).$black."<br/><br/>";
	echo "Arrange these fractions in $order order:<br/>";
	$klim=count($frac)-1;
	for ($k=0; $k<=$klim; $k+=1){
		$pos=strpos($frac[$k],"*");
		echo $vio.(substr($frac[$k],($pos+1))).$black;
		if ($k<$klim){echo ", ";}
		}
	echo "<br/><br/>";
	
	if ($order=="increasing"){
		echo "The fractions in increasing order are:<br/>";
		sort( $frac);
		$klim=count( $frac)-1;
		for ($k=0; $k<=$klim; $k+=1){
			$pos=strpos($frac[$k],"*");
			echo $vio.(substr($frac[$k],($pos+1))).$black;
			if ($k<$klim){echo ", ";}
			}
		}

	else{	
		echo "The fractions in decreasing order are:<br/>";
		rsort( $frac);
		$klim=count( $frac)-1;
		for ($k=0; $k<=$klim; $k+=1){
			$pos=strpos($frac[$k],"*");
			echo $vio.(substr($frac[$k],($pos+1))).$black;
			if ($k<$klim){echo ", ";}
			}
		}
 
	echo "</td></tr></table><br/>";
	
	}
	
?>