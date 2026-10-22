<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

$prod[1]=1; $prod[2]=1; $prod[3]=0;
for ($i=1; $i<=3; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
		
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	do{
		if ($i<2){$num1=rand(2,6); $num2=rand(2,6); $num3=rand(2,6); $lim=99;} 
		else{$num1=rand(4,9); $num2=rand(4,9); $num3=rand(4,9); $lim=200;}
		$prod[$i]=$num1*$num2*$num3;
		}
	while ($prod[$i]>$lim or $num1==$num2 or $num2==$num3 or $num1==$num3 or (isset($prod[2]) and isset($prod[3]) and $prod[2]==$prod[3]));	
	
	echo $red."Example #".$i.$black."<br/><br/>";
	echo "Multiply the following numbers: ".$vio.$num1.$black.", ".$vio.$num2.$black.", and ".$vio.$num3.$black." in different orders.<br/><br/>";
	echo $vio.$num1.$black." x ".$vio.$num2.$black." x ".$vio.$num3.$black." = ".$blue.$prod[$i]."$black<br/>";
	echo $vio.$num1.$black." x ".$vio.$num3.$black." x ".$vio.$num2.$black." = ".$blue.$prod[$i]."$black<br/>";
	echo $vio.$num2.$black." x ".$vio.$num1.$black." x ".$vio.$num3.$black." = ".$blue.$prod[$i]."$black<br/>";
	echo $vio.$num2.$black." x ".$vio.$num3.$black." x ".$vio.$num1.$black." = ".$blue.$prod[$i]."$black<br/>";
	echo $vio.$num3.$black." x ".$vio.$num1.$black." x ".$vio.$num2.$black." = ".$blue.$prod[$i]."$black<br/>";
	echo $vio.$num3.$black." x ".$vio.$num2.$black." x ".$vio.$num1.$black." = ".$blue.$prod[$i]."$black<br/><br/>";
	echo "The order in which the numbers were multiplied did not affect the product.<br/>";
	 
	echo "</td></tr></table><br/>";
	if ($i==3){echo "<br/><br/>";}
	}
	
?>