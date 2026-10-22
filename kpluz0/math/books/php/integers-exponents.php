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
		$num=rand(2,6); 
		$exp=rand(2,3); 
		$lim1=0;
		$lim2=120;
		
		if ($i>=4 and $i<=7){
			$num=rand(2,15); 
			$exp=rand(2,5); 
			$lim1=120;
			$lim2=1000;
			} 
			
		if ($i>7){
			$num=rand(2,19); 
			$exp=rand(2,9);
			$lim1=500;
			$lim2=10000;
			} 
		$chk=$num."-".$exp."*";	
		}
	while (pow($num,$exp)<$lim1 or pow($num,$exp)>$lim2 or (strpos($all,$chk)>0));	
	$all=$all.$chk;
	if($i>1 and rand(1,4)>1){$num=$num*-1;} 
	
	if ($num>0){$snum1="+".$num;}else{$snum1=$num;}	
	
	echo $red."Example #".$i.$black."<br/><br/>";
	echo "Raise the integer ".$vio.$snum1.$black." to the power of ".$vio.$exp.$black.".<br/><br/>";
 
	echo "Solution:<br/>";
	echo $vio.$snum1.$black.$vio."<sup>".$exp."</sup>".$black." ";
	 
	if($num>0){
		echo "= ".$num."<sup>".$exp."</sup>";
		}
	if($num<0 and $exp%2==0){
		echo " = &#124;".$num."&#124;<sup>".$exp."</sup>";
		echo " = ".abs($num)."<sup>".$exp."</sup>";
		}
	if(($num<0 and $exp%2!=0)){
		echo " = -(&#124;".$num."&#124;<sup>".$exp."</sup>)";
		echo " = -(".abs($num)."<sup>".$exp."</sup>)";
		}
 
	echo " = ".$vio.(pow($num,$exp)).$black."<br/>";
	echo "</td></tr></table><br/>";

	if ($i==10){echo "<br/><br/>";}
	}
	
?>