<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 20pt'>";}
else{$font="<span lang='EN-US' style='font-size: 40pt'>";}
$small="<span lang='EN-US' style='font-size: 16pt'>";

$red=$font."<font color='#CC0000'><b>";
$blue=$font."<font color='#0000CC'><b>";
$vio=$font."<font color='#800080'><b>";
$black=$font."<font color='#000000'></b>";

$tw=800;	
for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='850' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'><br/>";
	echo $red."Example #".$i.$small."<br/><br/>".$black;
		
	if ($i==1){$div=10; $dec=rand(2,9)/$div;}
	if ($i==2){$div=100; $dec=rand(11,29)/$div;}
	if ($i==3 or $i==4){$div=100; $dec=rand(30,99)/$div;}
	if ($i>=5){$div=1000; $dec=rand(111,999)/$div;}
 
	$cw=80; $colnum=10; $rownum=1; $pname="tenths";
	if ($div==100){$cw=40; $colnum=20; $rownum=5; $pname="hundredths";}
	if ($div==1000){$cw=16; $colnum=50; $rownum=20; $pname="thousandths";}
	$tw=$cw*$colnum;
	
	echo $black."<b>Visualizing  ".$vio.$dec.$black."</b>$small<br/>";
	echo $black."(".($dec*$div)." ".$pname.")<br/><br/>";

	$x=0;
	echo "<table align='center' width='$tw' cellspacing='0' cellpadding='1' border='1' bordercolor='#777777'><tr>";
	$color="#BBBBBB";
	for($j=1; $j<=$rownum; $j+=1){
		for($k=1; $k<=$colnum; $k+=1){
			$x=$x+1;
			if ($x<=$dec*$div){echo "<td height='$cw' align='center' bgcolor='$color' border='1' >&nbsp;</td>";}
			else{echo "<td height='$cw' align='center' bgcolor='#FFFFFF' border='1'>&nbsp;</td>";}
			}			
		echo "</tr>";	
		}
		echo "</table>$small<br/><br/>";
	echo "</td></tr></table><br/>";
	}
	
	if ($i<5){echo "<br/>";}

?>