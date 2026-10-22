<?php

$grd=$grd;
$format=$format;


echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
for ($i=1; $i<=10; $i+=1){
	if ($i<=3){$num=rand(111,999);}
	if ($i>=4 and $i<=7){$num=rand(1111,9999);}
	if ($i>=8){$num=rand(11111,99999);}
	
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo "<font color='#800080'><b><u>".$num."</u></b><font color='#000000'><br/><br/>";
	
	$digsum=0;
	$sdigsum="";
	$slen=strlen($num);
	for ($k=1; $k<=$slen; $k+=1){
		$digit=substr($num,($k-1),1);
		$digsum=$digsum+$digit;
		$sdigsum=$sdigsum.$digit."+";
		}
    $sdigsum=substr($sdigsum,0,(strlen($sdigsum)-1));	
	if ($num%3==0){echo "$num is divisible by 3 because the sum of its digits is $sdigsum = $digsum, which is divisible by 3.<br/><br/>";}
	else{echo "$num is NOT divisible by 3 because the sum of its digits is $sdigsum = $digsum, which is not divisible by 3.<br/><br/>";}
	
	$last2dig=substr($num,-2);
	if ($num%4==0){echo "$num is divisible by 4 because its last two digits, ".$last2dig.", is divisible by 4.<br/><br/>";}
	else{echo "$num is NOT divisible by 4 because its last two digits, ".$last2dig.", is not divisible by 4.<br/><br/>";}
 
	if ($num%6==0){echo "$num is divisible by 6 because it is an even number and it is divisible by 3.<br/><br/>";}
	else{
		if ($num%2!=0 and $num%3!=0){echo "$num is NOT divisible by 6 because it is neither even nor divisible by 3.<br/><br/>";}
		else {if ($num%2!=0) {echo "Although $num is divisible by 3, it is NOT divisible by 6 because it is not an even number.<br/><br/>";}
			else{echo "$num is NOT divisible by 6 even though it's even because it is not divisible by 3.<br/><br/>";}
			}
		}
		
	if ($num>999){	
		$last3dig=substr($num,-3);
		if ($num%8==0){echo "$num is divisible by 8 because its last three digits, ".$last3dig.", is divisible by 8.<br/><br/>";}
		else{echo "$num is NOT divisible by 8 because its last three digits, ".$last3dig.", is not divisible by 8.<br/><br/>";}
		}
	
	if ($num%9==0){echo "$num is divisible by 9 because the sum of its digits is $sdigsum = $digsum, which is divisible by 9.<br/><br/>";}
	else{echo "$num is NOT divisible by 9 because the sum of its digits is $sdigsum = $digsum, which is not divisible by 9.<br/><br/>";}
 
	if ($i<10){echo "<br/>";}
	}
echo "</td></tr></table><br/>";
	
?>