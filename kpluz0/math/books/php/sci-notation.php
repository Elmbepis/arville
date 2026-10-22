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
		$real=rand(19,199);
		$exp=rand(2,4); 
		if ($i>=4 and $i<=7){$real=rand(199,19999); $exp=rand(5,7);}
		if ($i>7){$real=rand(19999,999999);$exp=rand(8,9);}
		
		$real=substr($real,0,1).".".substr($real,1);
		
		$num=$real*pow(10,$exp);
		//echo $real." ".$exp." ".$num;

		$chk=$real."-".$exp."*";	
		}
	while (strpos($all,$chk)>0);	
	$all=$all.$chk;
	
	if ($i%2!=0){
		echo $red."Example #".$i.$black."<br/><br/>";
		echo "Express the number ".$vio.$num.$black." in scientific notation.<br/><br/>"; 	
		echo "Answer:<br/>";
		echo $vio.$num.$black." = ".$vio.$real." x 10<sup>$exp</sup>".$black." ";
		}
	else{
		echo $red."Example #".$i.$black."<br/><br/>";
		echo "Express the scientific notation ".$vio.$real." x 10<sup>$exp</sup>".$black." in standard notation.<br/><br/>"; 	
		echo "Answer:<br/>";
		echo $vio.$real." x 10<sup>$exp</sup>".$black." = ".$vio.$num.$black." ";
		}
			 
	echo "</td></tr></table><br/>";

	if ($i==10){echo "<br/><br/>";}
	}
	
?>