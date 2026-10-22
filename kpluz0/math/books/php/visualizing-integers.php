<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 20pt'>"; $font2="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 40pt'>"; $font2="<span lang='EN-US' style='font-size: 36pt'>";}
$small="<span lang='EN-US' style='font-size: 14pt'>";
$small2="<span lang='EN-US' style='font-size: 24pt'>";

$red=$font."<font color='#CC0000'>";
$vio="<font color='#800080'>";
$blue="<font color='#0000CC'>";
$black="<font color='#000000'>";
			
$tw=800;	
$all="***";
$zero="";
for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='880' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'><br/>";
	echo $red."<b>Example #".$i.$small."<br/><br/>".$black;
	
	do{
		if ($i<=2){$pos=rand(5,9); $neg=rand(5,9); $lim=18;}
		if ($i>=3){$pos=rand(8,12); $neg=rand(8,12); $lim=24;}
		$chk=$pos."-".$neg;
		}
	while (strpos($all,$chk)>0 or ($pos==$neg and ($zero=="yes" or $i>2)));
	
	if ($pos==$neg){$zero="yes";}
	$all=$all."*".$chk;	
	
	echo $font."</b>Visualize: <b>".$blue.$pos.$black." + ".$vio."-".$neg.$black.$small."<br/><br/>";
	
	$tdw=floor(850/$lim);
	$tw=$tdw*$lim;
	$color1="FFFFFF";
	$color2="DDDDDD";
	
	echo $small2."This is ".$blue."+".$pos.$black.":<br/>";
	echo "<table align='center' width='$tw' cellspacing='0' cellpadding='0' border='1' bordercolor='#999999'><tr>";
	for($j=1; $j<=$lim+1; $j+=1){
		if ($j==$lim/2+1){echo "<td align='center'  width='$tdw' height='$tdw' bgcolor='$color1' border='1'>$small $black<b>0</td>";}
		else{
			if ($j<$lim/2+1 or $j>($lim/2+$pos+1)){echo "<td align='center' width='$tdw' height='$tdw' bgcolor='$color1' border='1' >$small &nbsp;</td>";}
			else{echo "<td align='center'  width='$tdw' height='$tdw' bgcolor='$color2' border='1'>".$small.$blue.($j-($lim/2)-1)."</td>";}
			}			
		}	
	echo "</tr></table>$small<br/><br/>";
	
	echo $small2."This is ".$vio."-".$neg.$black.":<br/>";
	echo "<table align='center' width='$tw' cellspacing='0' cellpadding='0' border='1' bordercolor='#999999'><tr>";
	for($j=1; $j<=$lim+1; $j+=1){
		if ($j==$lim/2+1){echo "<td align='center'  width='$tdw' height='$tdw' bgcolor='$color1' border='1'>$small $black<b>0</td>";}
		else{
			if ($j<=($lim/2-$neg) or $j>$lim/2+1){echo "<td align='center' width='$tdw' height='$tdw' bgcolor='$color1' border='1' >$small &nbsp;</td>";}
			else{echo "<td align='center'  width='$tdw' height='$tdw' bgcolor='$color2' border='1'>$small $vio-".($lim/2-$j+1)."</td>";}
			}			
		}	
	echo "</tr></table>$small<br/><br/>";
	
	echo $small2."This is ".$blue.$pos.$black." + ".$vio."-".$neg.$black.":<br/>";
	echo "<table align='center' width='$tw' cellspacing='0' cellpadding='0' border='1' bordercolor='#999999'><tr>";
	for($j=1; $j<=$lim+1; $j+=1){
		$x=$j-($lim/2)-1;
		if ($j==$lim/2+1){echo "<td align='center'  width='$tdw' height='$tdw' bgcolor='$color1' border='1'>$small $black<b>0</td>";}
		else{
			if ( ($j<$lim/2+1 and $x>=0) or $j>($lim/2+$pos+1)   or ($j<$lim/2+1 and $x<($pos-$neg))           ){echo "<td align='center' width='$tdw' height='$tdw' bgcolor='$color1' border='1' >$small &nbsp;</td>";}
			else{echo "<td align='center'  width='$tdw' height='$tdw' bgcolor='$color2' border='1'>".$small.$blue.($j-($lim/2)-1)."</td>";}
			}
		}				
	echo "</tr><tr>";
	for($j=1; $j<=$lim+1; $j+=1){
		if ($j<=($lim/2-$neg+$pos) or $j>$lim/2+$pos){echo "<td align='center' width='$tdw' height='$tdw' bgcolor='$color1' border='1' >$small &nbsp;</td>";}
		else{echo "<td align='center'  width='$tdw' height='$tdw' bgcolor='$color2' border='1'>$small $vio-".($lim/2+$pos-$j+1)."</td>";}
		}			
	echo "</tr></table>$small<br/><br/>";
	
	echo $font.$blue.$pos.$black." + ".$vio."-".$neg.$black." = ".$blue.$pos.$black." - ".$vio.$neg.$black." = ".($pos-$neg).$small."<br/><br/>";
	
	echo "</td></tr></table>$font<br/>";
	}	
	echo $small."<br/>".$font;

?>