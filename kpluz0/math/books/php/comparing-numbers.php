<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";


echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
for ($i=1; $i<=10; $i+=1){

	if ($grd==3){
		if ($i<=5){$num1=rand(1000,9000); if (rand(1,2)==1){$num2=$num1+rand(10,499);} else{$num2=$num1-rand(10,499);}}
		else{$num1=rand(10000,90000); if (rand(1,2)==1){$num2=$num1+rand(10,4999);}else{$num2=$num1-rand(10,4999);}}
		}

	if ($grd>=4){
		if ($i<=4){$num1=rand(11111,99999);}
		if ($i==5 or $i==6){$num1=rand(11111,111111);}
		if ($i>=7){$num1=rand(111111,999999);}	
		$digrep=rand(2,(strlen($num1)-1));
		$ndig=substr($num1,($digrep-1),1);
		do{if (rand(1,2)==1){$ndigrep=$ndig+1;} else{$ndigrep=$ndig-1;}} while ($ndigrep<0 or $ndigrep>9);
		$num2=substr($num1,0,($digrep-1)).$ndigrep.substr($num1,$digrep);
		$diff=rand(1,29);
		if (rand(1,2)==1){$num2=$num2+$diff;}
		else {$num2=$num2-$diff;}
		if ($num1>999999){$num1=990000+rand(11,499);}
		if ($num2>999999){$num2=990000+rand(11,499);}
		if ($num2==$num1){$num2=$num1+rand(1,9);}
		}
	
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo $red."Example #".$i.$black."<br/><br/>";
	
	//echo "Compare ".$vio.$num1.$black." and ".$vio.$num2.$black.".<br/><br/>";
	
	if ($num1>$num2){echo $vio."$num1 > $num2<br/><br/>".$black;}
	else{echo $vio."$num1 < $num2<br/><br/>".$black;}
	
	if (strlen($num1)>strlen($num2)){echo "$num1 is greater than $num2 because it has more digits.<br/>";}
	
	if (strlen($num1)<strlen($num2)){echo "$num1 is less than $num2 because it has less digits.<br/>";}
	
	if (strlen($num1)==strlen($num2)){
		$lim=strlen($num1)-1;
		for ($k=0; $k<=$lim; $k+=1){
			$kdig1=substr($num1,$k,1);
			$kdig2=substr($num2,$k,1);
			if ($kdig1!=$kdig2){
				$m=strlen($num1)-$k;
				if ($m==6){$pv='hundred thousands';}
				if ($m==5){$pv='ten thousands';}
				if ($m==4){$pv='thousands';}
				if ($m==3){$pv='hundreds';}
				if ($m==2){$pv='tens';}
				if ($m==1){$pv='ones';}
				$num1=substr($num1,0,$k).$blue.substr($num1,$k,1).$black.substr($num1,$k+1);
				$num2=substr($num2,0,$k).$blue.substr($num2,$k,1).$black.substr($num2,$k+1);
				if ($num1>$num2){echo "The '".$pv."' digit of $num1 is greater than that of $num2.";}
				else{echo "The '".$pv."' digit of $num1 is less than that of $num2.";}
				$k=$lim+1;
				}
			}	
		}
	
	
	if ($i<10){echo "<br/><br/><br/>";}
	}
echo "</td></tr></table>";
	
?>