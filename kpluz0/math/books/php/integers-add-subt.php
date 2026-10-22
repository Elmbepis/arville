<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

$all="*****";
for ($i=1; $i<=10; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
		
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	do{
		$num1=rand(2,9); 
		$num2=rand(2,9); 
		
		if ($i>=4 and $i<=7){
			$num1=rand(10,99); 
			$num2=rand(10,99); 
			} 
			
		if ($i>7){
			$num1=rand(101,999); 
			$num2=rand(101,999); 
			} 
		$chk=$num1."-".$num2."*";	
		}
	while ($num1==$num2 or (strpos($all,$chk)>0));	
	$all=$all.$chk;
	if(rand(1,2)==1){$num1=$num1*-1;} 
	if(rand(1,2)==1){$num2=$num2*-1;}
	
	if ($num1>0){$snum1="+".$num1;}else{$snum1=$num1;}	
	if ($num2>0){$snum2="+".$num2;}else{$snum2=$num2;}	
	
	echo $red."Example #".$i.$black."<br/><br/>";
	echo "Perform addition and subtraction on the integers ".$vio.$snum1.$black." and ".$vio.$snum2.$black.".<br/><br/>";
 
	echo "Addition:<br/>";
	echo $vio.$snum1.$black." + ".$vio.$snum2.$black." ";
	if($num1>0 and $num2>0){
		echo "= $num1 + $num2";
		echo " = ".$vio.($num1+$num2).$black."<br/>";
		}
	if($num1>0 and $num2<0){
		echo "= $num1 - ".abs($num2);
		echo " = ".$vio.($num1-abs($num2)).$black."<br/>";
		}
	if($num1<0 and $num2>0){
		echo "= $num1 + ".$num2;
		echo " = ".$vio.($num1+$num2).$black."<br/>";
		}
	if($num1<0 and $num2<0){
		echo "= $num1 - ".abs($num2);
		echo " = ".$vio.($num1+$num2).$black."<br/>";
		}
	
	echo "<br/>Subtraction:<br/>";
	echo $vio.$snum1.$black." - ".$vio.$snum2.$black." ";
	if($num1>$num2 and $num2>0){
		echo "= $num1 - $num2";
		echo " = ".$vio.($num1-$num2).$black."<br/>";
		}
	if($num1>0 and $num2>0 and $num1<$num2){
		echo "= $num1 - $num2";
		echo " = ".$vio.($num1-$num2).$black."<br/>";
		}
	if($num1>0 and $num2<0){
		echo "= $num1 + ".abs($num2);
		echo " = ".$vio.($num1+abs($num2)).$black."<br/>";
		}
	if($num1<0 and $num2>0){
		echo "= $num1 - ".$num2;
		echo " = ".$vio.($num1-$num2).$black."<br/>";
		}
	if($num1<0 and $num2<0){
		echo "= $num1 + ".abs($num2);
		echo " = ".$vio.($num1-$num2).$black."<br/>";
		}
 
	 
	echo "</td></tr></table><br/>";
	if ($i==10){echo "<br/><br/>";}
	}
	
?>