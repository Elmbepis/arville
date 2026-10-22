<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";



$prod[1]=1; $prod[2]=1; $prod[3]=0;
for ($i=1; $i<=4; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
		
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	do{
		$num4=1;
		if ($i<2){$num1=rand(2,6); $num2=rand(2,6); $num3=rand(2,6); $lim=99;} 
		if ($i==2 or $i==3){$num1=rand(4,9); $num2=rand(4,9); $num3=rand(4,9); $lim=200;}
		if ($i==4){$num1=rand(2,6); $num2=rand(2,6); $num3=rand(4,9); $num4=rand(1,6); $lim=1000;}
		$prod[$i]=$num1*$num2*$num3*$num4;
		}
	while ($prod[$i]>$lim or $num1==$num2 or $num2==$num3 or $num1==$num3 or $num1==$num4 or $num2==$num4 or $num3==$num4 or
		(isset($prod[2]) and isset($prod[3]) and $prod[2]==$prod[3]));	
	
	echo $red."Example #".$i.$black."<br/><br/>";
	
	if ($i<4){
		echo "Multiply the following numbers: ".$vio.$num1.$black.", ".$vio.$num2.$black.", and ".$vio.$num3.$black." using two different groupings.<br/><br/>";
		echo $vio.$num1.$black." x (".$blue.$num2.$black." x ".$blue.$num3.$black.") = ";
		echo $vio.$num1.$black." x ".$blue.($num2*$num3).$black." = ";	
		echo $blue.$prod[$i]."$black<br/>";
		echo "(".$blue.$num1.$black." x ".$blue.$num2.$black.") x ".$vio.$num3.$black." = ";
		echo $blue.($num1*$num2).$black." x ".$vio.$num3.$black." = ";
		echo $blue.$prod[$i]."$black<br/><br/>";
		echo "The grouping of the numbers during multiplication did not affect the product.<br/>";
		}
	else{
		echo "Multiply the following numbers: ".$vio.$num1.$black.", ".$vio.$num2.$black.", ".$vio.$num3.$black.", and ".$vio.$num4.$black." using two different groupings.<br/><br/>";
		echo "(".$vio.$num1.$black." x ".$vio.$num2.$black.") x (".$blue.$num3.$black." x ".$blue.$num4.$black.") = ";
		echo $vio.($num1*$num2).$black." x ".$blue.($num3*$num4).$black." = ";	
		echo $blue.$prod[$i]."$black<br/>";
		echo $vio.$num1.$black." x (".$blue.$num2.$black." x ".$blue.$num3.$black.") x ".$vio.$num4.$black." = ";
		echo $vio.$num1.$black." x ".$blue.($num2*$num3).$black." x ".$vio.$num4.$black." = ";
		echo $blue.$prod[$i]."$black<br/><br/>";
		echo "The grouping of the numbers during multiplication did not affect the product.<br/>";
		}
 
	echo "</td></tr></table><br/>";
	if ($i==4){echo "<br/><br/>";}
	}
	
?>