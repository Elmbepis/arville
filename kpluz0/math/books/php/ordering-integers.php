<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";



for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

	if ($i<=3){$jlim=5; $addlim1=10; $addlim2=10000; $num[0]=rand(11111,99999);} 
	else {$jlim=5+$i-5; $addlim1=10; $addlim2=100000; $num[0]=rand(111111,999999);}
	
	for ($j=1; $j<=$jlim; $j+=1){$num[$j]=$num[0]+rand($addlim1,$addlim2); if (rand(1,2)==1){$num[$j]=$num[$j]*-1;}}
		
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	if (rand(1,2)==1){$order="increasing";}
	else{$order="decreasing";}
	
	echo $red."Example #".$i.$black."<br/><br/>";
	echo "Arrange these integers in $order order:<br/>";
	$klim=count($num)-1;
	for ($k=0; $k<=$klim; $k+=1){
		echo $vio.$num[$k].$black;
		if ($k<$klim){echo ", ";}
		}
	echo "<br/><br/>";
	
	if ($order=="increasing"){
		echo "The integers in increasing order are:<br/>";
		sort($num);
		$klim=count($num)-1;
		for ($k=0; $k<=$klim; $k+=1){
			echo $vio.$num[$k].$black;
			if ($k<$klim){echo ", ";}
			}
		}

	else{	
		echo "The integers in decreasing order are:<br/>";
		rsort($num);
		$klim=count($num)-1;
		for ($k=0; $k<=$klim; $k+=1){
			echo $vio.$num[$k].$black;
			if ($k<$klim){echo ", ";}
			}
		}
 
	echo "</td></tr></table><br/>";
	
	}
	
?>