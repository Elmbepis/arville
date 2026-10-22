<?php

$grd=$grd;
$format=$format;


echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='center'>";	
echo "<p style='margin-left: 0px; margin-right: 0px; margin-top: 30px; margin-bottom: 30px;'>"; 
$whole=0;
for ($i=1; $i<=10; $i+=1){
	$whole=round(0,9);
	do{
		if ($grd<=4){		
			if ($i<=4){$num=$whole+(rand(1111,9999)*.0001);}
			if ($i>=5 and $i<=8){$num=$whole+(rand(11111,99999)*0.00001);}
			if ($i>8){$num=$whole+(rand(111111,999999)*0.000001);}		
			}
		if ($grd>=5){		
			if ($i<=2){$num=$whole+(rand(1111,9999)*.0001);}
			if ($i>=3 and $i<=5){$num=$whole+(rand(11111,99999)*0.00001);}
			if ($i>=6 and $i<=8){$num=$whole+(rand(111111,999999)*0.000001);}
			if ($i>9){$num=$whole+(rand(1111111,9999999)*0.0000001);}		
			}
		}
	while (substr($num,-1)=="0");	
	
	echo "<table width='95%'>";
	echo "<tr ><td align='center'>";
	if ($format==1){echo "<span lang='EN-US' style='font-size: 14pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 32pt'>";}
	echo "<font color='#CC0000'><b><br/>".$num."</b></td></tr>";
	$len=strlen($num)-2;
	for ($j=$len-1; $j>=1; $j+=-1){
		$pval="";
		echo "<tr><td align='center'>";
		if ($format==1){echo "<span lang='EN-US' style='font-size: 14pt'>";}
		else{echo "<span lang='EN-US' style='font-size: 30pt'>";}
		if ($j==1){$pval="tenth";}
		if ($j==2){$pval="hundredth";}
		if ($j==3){$pval="thousandth";}
		if ($j==4){$pval="ten thousandth";}
		if ($j==5){$pval="hundred thousandth";}
		if ($j==6){$pval="millionth";}
		echo "nearest ".$pval.": ";
		if ($format==1){echo "<span lang='EN-US' style='font-size: 14pt'>";}
		else{echo "<span lang='EN-US' style='font-size: 32pt'>";}
		echo "<font color='#800080'>".round($num,$j);
		echo "</td></tr>";
		}
	echo "</table><br/>";	
	}
echo "</td></tr></table>";
	
?>