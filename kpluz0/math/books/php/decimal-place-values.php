<?php

$grd=$grd;
$format=$format;
if ($format==1){$font="<span lang='EN-US' style='font-size: 14pt'>";}
else{$font="<span lang='EN-US' style='font-size: 32pt'>";}

for ($i=1; $i<=10; $i+=1){

	echo "<table align='center' width='60%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";
	$whole=0; $dec=0;
	do{
		if ($grd<=4){		
			if ($i>=4 and $i<=6){$whole=rand(11,99);}
			if ($i==7 or $i==8){$whole=rand(111,999);}
			if ($i>8){$whole=rand(1111,9999);}
			if ($i<5){$dec=rand(11,99);}
			if ($i>=5 and $i<=8){$dec=rand(111,999);}
			if ($i>8){$dec=rand(1111,9999);}
			}
		if ($grd>=5){		
			if ($i==3 or $i==4){$whole=rand(11,99);}
			if ($i==5 or $i==6){$whole=rand(111,999);}
			if ($i==7 or $i==8){$whole=rand(1111,9999);}
			if ($i>8){$whole=rand(11111,99999);}
			if ($i<4){$dec=rand(111,999);}
			if ($i==4 or $i==5){$dec=rand(1111,9999);}
			if ($i==6 or $i==7){$dec=rand(11111,99999);}
			if ($i>7){$dec=rand(111111,999999);}
			}
		}
	while (($whole!=0 and substr($whole,-1)=="0") or ($dec!=0 and substr($dec,-1)=="0") );	

	echo "<table align='center' width='95%'><tr><td height='40'>&nbsp;</td></tr><tr><td align='center'>";
	echo $font."<font color='#CC0000'><b>".$whole.".".$dec."</b><tr><td>&nbsp;</td></tr></td></tr>";	
	$dignum=strlen($whole);
	for ($j=0; $j<=$dignum; $j+=1){
		$pval="";
		echo "<tr><td align='center'>";
		$k=$dignum-$j;
		if ($k==1){$pval="ones";}
		if ($k==2){$pval="tens";}
		if ($k==3){$pval="hundreds";}
		if ($k==4){$pval="thousands";}
		if ($k==5){$pval="ten thousands";}
		if ($k==6){$pval="hundred thousands";}
		$dig[$j]=substr($whole,($j),1);
		if (isset($dig[$j]) and $dig[$j]>0){
			echo $font.$pval.": ";
			echo $font."<font color='#800080'>".$dig[$j];
			}
		echo "</td></tr>";
		}
	$dignum=strlen($dec);
	for ($j=0; $j<=$dignum; $j+=1){
		$pval="";
		echo "<tr><td align='center'>";
		if ($j==0){$pval="tenths";}
		if ($j==1){$pval="hundredths";}
		if ($j==2){$pval="thousandths";}
		if ($j==3){$pval="ten-thousandths";}
		if ($j==4){$pval="hundred-thousandths";}
		if ($j==5){$pval="millionths";}
		$dig[$j]=substr($dec,($j),1);
		if (isset($dig[$j]) and $dig[$j]!=""){
			echo $font.$pval.": ";
			echo $font."<font color='#800080'>".$dig[$j];
			}
		echo "</td></tr>";
		}
	echo "<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr></table>";	
		
	if ($i<10){echo "</td></tr></table><br/>";}
	else{echo "</td></tr></table>";}	
	}
	
?>