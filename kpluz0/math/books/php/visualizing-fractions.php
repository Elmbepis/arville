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

for ($i=1; $i<=5; $i+=1){

	$tw=600;	
	echo "<table align='center' width='800' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'><br/>";
	echo $red."Example #".$i.$small."<br/><br/>".$black;
 
	$cw=80; $colnum=10; $rownum=1; $pname="tenths";
	
	if ($i==1){$rownum=rand(3,5); $colnum=rand(6,7); $denom=$rownum*$colnum; $numer=rand(2,($denom-1)); $tw=450;}
	if ($i==2){$rownum=rand(3,5); $colnum=rand(8,10); $denom=$rownum*$colnum; $numer=rand(2,($denom-1)); $tw=500;}
	if ($i==3){$rownum=rand(4,6); $colnum=rand(7,10); $denom=$rownum*$colnum; $numer=rand(2,($denom-1)); $tw=575;}
	if ($i==4){$rownum=rand(6,9); $colnum=rand(8,12); $denom=$rownum*$colnum; $numer=rand(2,($denom-1));}
	if ($i==5){$rownum=rand(8,12); $colnum=rand(10,15); $denom=$rownum*$colnum; $numer=rand(2,($denom-1));}
 
	$cw=floor($tw/$colnum);
	
	echo $black."<b>Visualizing  ".$vio.$numer."/".$denom.$black."</b>$small<br/><br/>";

	$x=0;
	echo "<table align='center' width='$tw' cellspacing='0' cellpadding='1' border='1' bordercolor='#777777'><tr>";
	$color="#BBBBBB";
	for($j=1; $j<=$rownum; $j+=1){
		for($k=1; $k<=$colnum; $k+=1){
			$x=$x+1;
			if ($x<=$numer){echo "<td height='$cw' align='center' bgcolor='$color' border='1' >&nbsp;</td>";}
			else{echo "<td height='$cw' align='center' bgcolor='#FFFFFF' border='1'>&nbsp;</td>";}
			}			
		echo "</tr>";	
		}
		echo "</table>$small<br/><br/>";
	echo "</td></tr></table><br/>";
	}
	
	if ($i<5){echo "<br/>";}

?>