<?php

$grd=$grd;
$format=$format;


echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='center'>";	
echo "<p style='margin-left: 0px; margin-right: 0px; margin-top: 30px; margin-bottom: 30px;'>"; 
for ($i=1; $i<=10; $i+=1){
	do{
		if ($grd==3){		
			if ($i<=3){$num=rand(111,999);}
			if ($i>=4 and $i<=7){$num=rand(1111,9999);}
			if ($i>7){$num=rand(11111,99999);}
			}
		if ($grd==4){		
			if ($i<=4){$num=rand(1111,9999);}
			if ($i>=5 and $i<=8){$num=rand(11111,99999);}
			if ($i>8){$num=rand(111111,999999);}
			}
		if ($grd==5){		
			if ($i<=2){$num=rand(1111,9999);}
			if ($i>=3and $i<=5){$num=rand(11111,99999);}
			if ($i>=6 and $i<=8){$num=rand(111111,999999);}
			if ($i>8){$num=rand(1111111,9999999);}
			}
		}
	while (substr($num,-1)=="0");	
	
	echo "<table width='95%'>";
	echo "<tr ><td align='center'>";
	if ($format==1){echo "<span lang='EN-US' style='font-size: 14pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 32pt'>";}
	echo "<font color='#CC0000'><b><br/>".$num."</b></td></tr>";
	$dignum=strlen($num);
	$num=$num/(pow(10,$dignum));
	for ($j=$dignum-1; $j>=1; $j+=-1){
		$pval="";
		echo "<tr><td align='center'>";
		if ($format==1){echo "<span lang='EN-US' style='font-size: 14pt'>";}
		else{echo "<span lang='EN-US' style='font-size: 32pt'>";}
		$k=$dignum-$j;
		if ($k==1){$pval="ten";}
		if ($k==2){$pval="hundred";}
		if ($k==3){$pval="thousand";}
		if ($k==4){$pval="ten thousand";}
		if ($k==5){$pval="hundred thousand";}
		if ($k==6){$pval="million";}
		echo "nearest ".$pval.": ";
		if ($format==1){echo "<span lang='EN-US' style='font-size: 14pt'>";}
		else{echo "<span lang='EN-US' style='font-size: 32pt'>";}
		echo "<font color='#800080'>".round($num,$j)*pow(10,$dignum);
		echo "</td></tr>";
		}
	echo "</table><br/>";	
	}
echo "</td></tr></table>";
	
?>