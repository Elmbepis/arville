<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}
$small="<span lang='EN-US' style='font-size: 12pt'>";

$red=$font."<font color='#CC0000'><b>";
$blue=$font."<font color='#0000CC'><b>";
$black=$font."<font color='#000000'></b>";
$vio=$font."<font color='#800080'>";

$all="*****"; 
for ($i=1; $i<=10; $i+=1){
	echo "<table align='center' width='80%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	echo $red."Example #".$i.$small."<br/><br/>".$black; 

	$str="";	
	if ($i<5){
		do{$base=rand(2,10); $exp=rand(2,6); $num=pow($base,$exp); $chk=$num."*";}
		while ($num>1000 or strpos($all,$chk)>0);
		$all=$all.$num."*";
		}
 
	if ($i>=5 and $i<=7){
		if (rand(1,4)<4){
			do{$base=rand(2,9); $exp=rand(2,6); $num=pow($base,$exp); $chk=$num."*";}
			while ($num<1000 or $num>10000 or strpos($all,$chk)>0);
			$all=$all.$chk;}
		else{
			$base=10; $exp=rand(2,7); $num=pow(10,$exp);
			$all=$all.$chk;}	
			}
	if ($i>7){
		do{$base=rand(4,19); $exp=rand(2,6); $num=pow($base,$exp); $chk=$num."*";}
		while ($base==10 or $num<5000 or $num>50000 or strpos($all,$chk)>0);
		$all=$all.$chk;
		}
 
	echo "Solve: ".$blue.$base.$vio."<sup>".$exp."</sup>".$black." = ?<br/>";
	echo $blue.$base.$vio."<sup>".$exp."</sup>".$black." = ";
	for ($j=1; $j<=$exp; $j+=1){
		if ($j<$exp){$str=$str.$base." x ";} else {$str=$str.$base;}
		}		
	if (strlen($str)<=16){echo $str;} else{echo $str."<br/>";}
	echo " = ".$blue.$num.$black;	
	
	echo "</td></tr></table><br/>";
	}
	
?>