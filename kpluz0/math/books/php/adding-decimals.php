<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}
$small="<span lang='EN-US' style='font-size: 12pt'>";

$red=$font."<font color='#CC0000'><b>";
$red2=$font."<font color='#CC0000'></b>";
$blue=$font."<font color='#0000CC'><b>";
$black=$font."<font color='#000000'></b>";
$vio=$font."<font color='#800080'>";
$gray=$font."<font color='#999999'></b>";


for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='80%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	echo $red."Example #".$i.$small."<br/>".$black;

	if ($i<3){
		
		do{
			if ($i==1){
				// no regrouping
				do {$num1=rand(1001,7777); $num2=rand(1001,7777);}
				while (substr($num1,0,1)+substr($num2,0,1)>9 or substr($num1,1,1)+substr($num2,1,1)>9 or substr($num1,2,1)+substr($num2,2,1)>9 or substr($num1,3,1)+substr($num2,3,1)>9);
				}
			else{
				if (rand(1,3)>1){$num1=rand(1111,7999);} else{$num1=rand(333,999);} 
				$num2=rand(555,999);
				}	
			$ans=$num1+$num2;
			}
		while ($ans>9999);	
		}	
	else{
		do{
			$num1=rand(111,4999); 
			$num2=rand(111,4999);
			$num3=rand(111,4999);
			$ans=$num1+$num2+$num3;
			}
		while ($ans<4999 or $ans>9999);			
		}
		
	$num1dig1=substr($num1,(strlen($num1)-1),1);
	$num1dig2=substr($num1,(strlen($num1)-2),1);
	$num1dig3=substr($num1,(strlen($num1)-3),1);
	if ($num1>999){$num1dig4=substr($num1,(strlen($num1)-4),1);} else{$num1dig4="";}

	$num2dig1=substr($num2,(strlen($num2)-1),1);
	$num2dig2=substr($num2,(strlen($num2)-2),1);
	$num2dig3=substr($num2,(strlen($num2)-3),1);
	if ($num2>999){$num2dig4=substr($num2,(strlen($num2)-4),1);} else{$num2dig4="";}

	$num3dig1=substr($num3,(strlen($num3)-1),1);
	$num3dig2=substr($num3,(strlen($num3)-2),1);
	$num3dig3=substr($num3,(strlen($num3)-3),1);
	if ($num3>999){$num3dig4=substr($num3,(strlen($num3)-4),1);} else{$num3dig4="";}

	if(($num1dig1+$num2dig1+$num3dig1)>9){$cdig1=substr(($num1dig1+$num2dig1+$num3dig1),0,1);} else{$cdig1="";}
	if (($num1dig2+$num2dig2+$num3dig2+$cdig1)>9){$cdig2=substr(($num1dig2+$num2dig2+$num3dig2+$cdig1),0,1);} else{$cdig2="";}
	if (($num1dig3+$num2dig3+$num3dig3+$cdig2)>9){$cdig3=substr(($num1dig3+$num2dig3+$num3dig3+$cdig2),0,1);} else{$cdig3="";}
 
	$ansdig1=substr($ans,0,1);
	$ansdig2=substr($ans,1,1);
	$ansdig3=substr($ans,2,1);
	$ansdig4=substr($ans,3,1);
	
	if ($cdig1=="" and $cdig2=="" and $cdig3==""){echo $red2."(no regrouping)".$small."<br/><br/>".$black;} 
	else{echo $red2."(with regrouping)".$small."<br/><br/>".$black;} 
	
	if ($num3<1){echo $small."<br/>".$font.$num1." + ".$num2." = ?".$small."<br/><br/>".$font;}
	else{echo $small."<br/>".$font.$num1." + ".$num2." + ".$num3." = ?".$small."<br/><br/>".$font;}
	
	if ($i<3){
	echo "<table border='0' width='45%' align='center' cellspacing='0' cellpadding='0'>";
	if ($cdig1>0 or $cdig2>0 or $cdig3>0){
		echo "
		<tr>
			<td align='right' width='12%'> $gray &nbsp;</td>
			<td align='right' width='22%'> $gray $cdig3</td>
			<td align='right' width='22%'> $gray $cdig2</td>
			<td align='right' width='22%'> $gray $cdig1</td>
			<td align='right' width='22%'> $gray &nbsp;</td>
		</tr>";
		}
	echo "
	<tr>
		<td align='right' width='12%'> $black &nbsp;</td>
		<td align='right' width='22%'> $black $num1dig4</td>
		<td align='right' width='22%'> $black $num1dig3</td>
		<td align='right' width='22%'> $black $num1dig2</td>
		<td align='right' width='22%'> $black $num1dig1</td>
	</tr>
	<tr>
		<td align='left'> $vio <b>&plus;</b></td>
		<td align='right' width='22%'> $black $num2dig4</td>
		<td align='right' width='22%'> $black $num2dig3</td>
		<td align='right' width='22%'> $black $num2dig2</td>
		<td align='right' width='22%'> $black $num2dig1</td>
	</tr>
	<tr>
		<td align='right'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $blue &nbsp;</td>
		<td align='right'> $blue $ansdig1</td>
		<td align='right'> $blue $ansdig2</td>
		<td align='right'> $blue $ansdig3</td>
		<td align='right'> $blue $ansdig4</td>
	</tr>
	</table>";
	}
	
	
	else{
	echo "<table border='0' width='45%' align='center' cellspacing='0' cellpadding='0'>";
	if ($cdig1>0 or $cdig2>0 or $cdig3>0){
		echo "
		<tr>
			<td align='right' width='12%'> $gray &nbsp;</td>
			<td align='right' width='22%'> $gray $cdig3</td>
			<td align='right' width='22%'> $gray $cdig2</td>
			<td align='right' width='22%'> $gray $cdig1</td>
			<td align='right' width='22%'> $gray &nbsp;</td>
		</tr>";
		}
	echo "
	<tr>
		<td align='right' width='12%'> $black &nbsp;</td>
		<td align='right' width='22%'> $black $num1dig4</td>
		<td align='right' width='22%'> $black $num1dig3</td>
		<td align='right' width='22%'> $black $num1dig2</td>
		<td align='right' width='22%'> $black $num1dig1</td>
	</tr>
	<tr>
		<td align='left'> $vio <b>&plus;</b></td>
		<td align='right' width='22%'> $black $num2dig4</td>
		<td align='right' width='22%'> $black $num2dig3</td>
		<td align='right' width='22%'> $black $num2dig2</td>
		<td align='right' width='22%'> $black $num2dig1</td>
	</tr>
	<tr>
		<td align='left'> $vio <b>&plus;</b></td>
		<td align='right' width='22%'> $black $num3dig4</td>
		<td align='right' width='22%'> $black $num3dig3</td>
		<td align='right' width='22%'> $black $num3dig2</td>
		<td align='right' width='22%'> $black $num3dig1</td>
	</tr>
	<tr>
		<td align='right'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $blue &nbsp;</td>
		<td align='right'> $blue $ansdig1</td>
		<td align='right'> $blue $ansdig2</td>
		<td align='right'> $blue $ansdig3</td>
		<td align='right'> $blue $ansdig4</td>
	</tr>
	</table>";
	}
 
	echo "</td></tr></table><br/>";
	}
	
?>