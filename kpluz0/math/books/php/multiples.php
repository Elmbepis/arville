<?php

$grd=$grd;
$format=$format;

$blue="<font face='Arial' style='font-size: 20pt; font-weight: 700' color='#000080'>";
$vio="<font face='Arial' style='font-size: 20pt; font-weight: 700' color='#800080'>";
$red="<font face='Arial' style='font-size: 20pt; font-weight: 700' color='#CC0000'>";
$black="<font face='Arial' style='font-size: 18pt; font-weight: 700' color='#000000'>";

$primes = array(2,3,5);
$pcount=count($primes)-1;


echo "<table align='center' width='100%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";

for ($i=1; $i<=100; $i+=1){

	echo "<tr>";	
	
	echo "<td align='center' width='10%' height='50'>".$red.$i.$black."</td>";
	
	for ($j=2; $j<=10; $j+=1){	
		echo "<td align='center' width='10%' height='50'>".$black.($j*$i)."</td>";		
		}
		
	echo "</tr>";	
	
	}
	
echo "</table><br/>";
	
	
?>