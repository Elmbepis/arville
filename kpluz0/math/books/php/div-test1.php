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
	
	if ($num%2==0){echo "$num is divisible by 2 because it is an even number.<br/><br/>";}
	else{echo "$num is NOT divisible by 2 because it is an odd number.<br/><br/>";}

	if (substr($num,-1)=="5"){echo "$num is divisible by 5 because its last digit is '5'.<br/><br/>";}
	else{
		if (substr($num,-1)=="0"){echo "$num is divisible by 5 because its last digit is '0'.<br/><br/>";}
		else{echo "$num is NOT divisible by 5 because its last digit is neither '5' nor '0'.<br/><br/>";}
		}

	if (substr($num,-1)=="0"){echo "$num is divisible by 10 because its last digit is '0'.<br/><br/>";}
	else{echo "$num is NOT divisible by 10 because its last digit is not '0'.<br/><br/>";}
		
	
	if ($i<10){echo "<br/>";}
	}
echo "</td></tr></table><br/>";
	
?>