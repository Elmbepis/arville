<?php

$grd=$grd;
$format=$format;


echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
for ($i=1; $i<=10; $i+=1){
	if ($i<=5){$num=rand(111,999);}
	if ($i>=6 and $i<=7){$num=rand(1111,9999);}
	if ($i>=8){$num=rand(11111,99999);}
	
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo "<font color='#800080'><b><u>".$num."</u></b><font color='#000000'><br/><br/>";
	
	$sdigs=substr($num,0,(strlen($num)-1));
	$lastdig=substr($num,-1);
	$res=$sdigs-2*$lastdig;
	if ($num%7==0){echo "$num is divisible by 7 because $sdigs - ($lastdig"." x 2) = ".$res.", which is divisible by 7.<br/><br/>";}
	else{echo "$num is NOT divisible by 7 because $sdigs - ($lastdig"." x 2) = ".$res.", which is not divisible by 7.<br/><br/>";}
		
	$digsum1=0;
	$sdigsum1="";
	$digsum2=0;
	$sdigsum2="";
	$slen=strlen($num);
	for ($k=1; $k<=$slen; $k+=1){
		$digit=substr($num,($k-1),1);
		if ($k%2==0){
			$digsum2=$digsum2+$digit;
			$sdigsum2=$sdigsum2.$digit."+";
			}
		else{
			$digsum1=$digsum1+$digit;
			$sdigsum1=$sdigsum1.$digit."-";
			}
		}
    $sdigsum1=substr($sdigsum1,0,(strlen($sdigsum1)-1));	
    $sdigsum2=substr($sdigsum2,0,(strlen($sdigsum2)-1));	
	if ($num%11==0){echo "$num is divisible by 11 because $sdigsum2-$sdigsum1 = ".($digsum2-$digsum1).", which is divisible by 11.<br/><br/>";}
	else{echo "$num is NOT divisible by 11 because $sdigsum2-$sdigsum1 = ".($digsum2-$digsum1).", which is not divisible by 11.<br/><br/>";}
	
	if ($num%12==0){echo "$num is divisible by 12 because it is divisible by 3 (the sum of its digits is divisible by 3) and 4 (its last 2 digits are divisible by 4).<br/><br/>";}
	else{
		if ($num%3!=0 and $num%4!=0){echo "$num is NOT divisible by 12 because it is neither divisible by 3 nor 4.<br/><br/>";}
		else {if ($num%4!=0) {echo "Although $num is divisible by 3, it is NOT divisible by 12 because it is not divisible by 4 (its last 2 digits are not divisible by 4).<br/><br/>";}
			else{echo "Although $num is divisible by 4, it is NOT divisible by 12 because it is not divisible by 3 (the sum of its digits is not divisible by 3).<br/><br/>";}
			}
		}

	if ($i<10){echo "<br/>";}
	}
echo "</td></tr></table><br/>";
	
?>