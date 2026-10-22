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
	
	if($i%2==1){
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
	echo "Multiply the integers ".$vio.$snum1.$black." and ".$vio.$snum2.$black.".<br/><br/>";
 
	echo "Solution:<br/>";
	echo $vio.$snum1.$black." x ".$vio.$snum2.$black." ";
	if($num1>0 and $num2>0){
		echo "= $num1 x $num2<br/>";
		}
	if(($num1<0 and $num2>0) or ($num2<0 and $num1>0)){
		echo " = -(&#124;".$num1."&#124; x &#124;".$num2."&#124;)<br/>";
	 	echo " = -(".abs($num1)." x ".abs($num2).")".$black."<br/>";
		}
	if(($num1<0 and $num2<0)){
		echo " =  &#124;".$num1."&#124; x &#124;".$num2."&#124;".$black."<br/>";
	 	echo " = ".abs($num1)." x ".abs($num2).$black."<br/>";
		}
	echo " = ".$vio.($num1*$num2).$black."<br/>";
	echo "</td></tr></table><br/>";
	}
	
	else{
	do{
		$num1=rand(2,9); 
		$num2=rand(2,9); 
		
		if ($i>=4 and $i<=7){
			$num1=rand(10,40); 
			$num2=rand(10,40); 
			} 
			
		if ($i>7){
			$num1=rand(41,129); 
			$num2=rand(41,129); 
			} 
		$chk=$num1."-".$num2."*";	
		}
	while ($num1==$num2 or (strpos($all,$chk)>0));	
	$all=$all.$chk;
	if(rand(1,2)==1){$num1=$num1*-1;} 
	if(rand(1,2)==1){$num2=$num2*-1;}
	
	$quot=$num1*$num2;
	if ($num1>0){$snum1="+".$num1;}else{$snum1=$num1;}	
	if ($num2>0){$snum2="+".$num2;}else{$snum2=$num2;}	
	if ($quot>0){$squot="+".$quot;}else{$squot=$quot;}	
	
	echo $red."Example #".$i.$black."<br/><br/>";
	echo "Divide ".$vio.$squot.$black." by ".$vio.$snum1.$black.".<br/><br/>";
 
	echo "Solution:<br/>";
	echo $vio.$squot.$black." &divide; ".$vio.$snum1.$black." ";
	if($quot>0 and $num1>0){
		echo "= $quot &divide; $num1<br/>";
		}
	if(($quot<0 and $num1>0) or ($num1<0 and $quot>0)){
		echo " = -(&#124;".$quot."&#124; &divide; &#124;".$num1."&#124;)<br/>";
	 	echo " = -(".abs($quot)." &divide; ".abs($num1).")".$black."<br/>";
		}
	if(($quot<0 and $num1<0)){
		echo " =  &#124;".$quot."&#124; &divide; &#124;".$num1."&#124;".$black."<br/>";
	 	echo " = ".abs($quot)." &divide; ".abs($num1).$black."<br/>";
		}
	echo " = ".$vio.($num2).$black."<br/>";
	echo "</td></tr></table><br/>";
	}
	
	if ($i==10){echo "<br/><br/>";}
	}
	
?>