<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";
$green=$font."<font color='#007500'><b>";


$prods="***";
for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
		
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	do{
		$num4=1;
		if ($i<2){$num1=rand(2,6); $num2=rand(2,6); $num3=rand(2,6); $lim=99;} 
		if ($i==2 or $i==3){$num1=rand(4,9); $num2=rand(2,12); $num3=rand(2,12); $lim=200;}
		if ($i>=4){$num1=rand(2,6); $num2=rand(2,12); $num3=rand(2,12); $num4=rand(1,6); $lim=1000;}
		if (rand(1,2)==1){$sign=" + "; $prod[$i]=$num1*($num2+$num3);}
		else{
			$sign=" - "; 
			if ($num2<$num3){$a=$num3; $num3=$num2; $num2=$a;}
			$prod[$i]=$num1*($num2-$num3);
			}
		if ($i>3){$prod[$i]=$prod[$i]+$num1*$num4;}	
		}
	while (strpos($prods,$prod[$i])>0 or $num1==$num2 or $num2==$num3 or $num1==$num3 or $num1==$num4 or $num2==$num4 or $num3==$num4);
	$prods=$prods.$prod[$i];
	
	echo $red."Example #".$i.$black."<br/><br/>";
	
	if ($i<4){
		echo "Solve this using the distributive property of multiplication:<br/><br/>".$vio.$num1.$black." x (".$blue.$num2.$black.$sign.$blue.$num3.$black.") = ?<br/><br/>";
		echo $green."Solution:<br/><br/>".$black;
		echo $vio.$num1.$black." x (".$blue.$num2.$black.$sign.$blue.$num3.$black.")<br/>";
		echo "= (".$vio.$num1.$black." x ".$blue.$num2.$black.")".$sign."(".$vio.$num1.$black." x ".$blue.$num3.$black.")<br/>";	
		echo "= ".$blue.($num1*$num2).$black.$sign.$blue.($num1*$num3).$black."<br/>";	
		echo "= ".$blue.$prod[$i]."$black<br/>";
		}
	else{
		echo "Solve this using the distributive property of multiplication:<br/><br/>".$vio.$num1.$black;
		echo " x (".$blue.$num2.$black.$sign.$blue.$num3.$black." + ".$blue.$num4.$black.") = ?<br/><br/>";
		echo $green."Solution:<br/><br/>".$black;
		echo $vio.$num1.$black." x (".$blue.$num2.$black.$sign.$blue.$num3.$black." + ".$blue.$num4.$black.")<br/>";
		echo "= (".$vio.$num1.$black." x ".$blue.$num2.$black.")".$sign."(".$vio.$num1.$black." x ".$blue.$num3.$black.") + (".$vio.$num1.$black." x ".$blue.$num4.$black.")<br/>";	
		echo "= ".$blue.($num1*$num2).$black.$sign.$blue.($num1*$num3).$black." + ".$blue.($num1*$num4).$black."<br/>";	
		echo "= ".$blue.$prod[$i]."$black<br/>";
		}
 
	echo "</td></tr></table><br/>";
	if ($i==5){echo "<br/><br/>";}
	}
	
?>