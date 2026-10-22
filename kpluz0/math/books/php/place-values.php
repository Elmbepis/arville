<?php

$grd=$grd;
$format=$format;
if ($format==1){$font="<span lang='EN-US' style='font-size: 14pt'>";}
else{$font="<span lang='EN-US' style='font-size: 32pt'>";}

for ($i=1; $i<=10; $i+=1){

	echo "<table align='center' width='60%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";
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

	echo "<table align='center' width='95%'><tr><td height='40'>&nbsp;</td></tr><tr><td align='center'>";
	echo $font."<font color='#CC0000'><b>".$num."</b><tr><td>&nbsp;</td></tr></td></tr>";	
	$dignum=strlen($num);
	for ($j=$dignum-1; $j>=0; $j+=-1){
		$pval="";
		echo "<tr><td align='center'>";
		$k=$dignum-$j;
		if ($k==1){$pval="ones";}
		if ($k==2){$pval="tens";}
		if ($k==3){$pval="hundreds";}
		if ($k==4){$pval="thousands";}
		if ($k==5){$pval="ten thousands";}
		if ($k==6){$pval="hundred thousands";}
		echo $font.$pval.": ";
		$dig[$j]=substr($num,($j),1);
		echo $font."<font color='#800080'>".$dig[$j];
		echo "</td></tr>";
		}
	echo "</table>";	
	
	echo "<table align='center'><tr><td>&nbsp;</td></tr><tr>";
	$dignum=strlen($num);
	for ($j=5; $j>=0; $j+=-1){
		$k=$dignum-$j-1;
		echo "<td width='56' align='center'>";
		if (isset($dig[$k])){echo $font."<font color='#0000CC'>".$dig[$k];}
		echo "</td>";
		}		
	echo "</tr><tr>";
	for ($k=5; $k<=10; $k+=1){
		{$j=$k;}
		echo "<td width='56' height='211' align='center'>";
		$pvimg="../modules/images/pvc-images/".$j."-pvc.jpg";
		echo "<img border='0' src='$pvimg'>";
		echo "</td>";
		}		
	echo "</tr><tr><td height='50'>&nbsp;</td></tr></table>";	
	
	if ($i<10){echo "</td></tr></table><br/>";}
	else{echo "</td></tr></table>";}	
	}
	
?>