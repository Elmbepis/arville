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
	echo $red."Example #".$i.$small."<br/>".$font;
	
	do{
		$num1=rand(2999,7999); 
		$num2=rand(1111,5555);
		if ($i>=3){$num2=rand(101,5555);}
		$ans=$num1-$num2;
		
		$num1dig1=substr($num1,(strlen($num1)-1),1);
		$num1dig2=substr($num1,(strlen($num1)-2),1);
		$num1dig3=substr($num1,(strlen($num1)-3),1);
		if ($num1>999){$num1dig4=substr($num1,(strlen($num1)-4),1);} else{$num1dig4="";}

		$num2dig1=substr($num2,(strlen($num2)-1),1);
		$num2dig2=substr($num2,(strlen($num2)-2),1);
		$num2dig3=substr($num2,(strlen($num2)-3),1);
		if ($num2>999){$num2dig4=substr($num2,(strlen($num2)-4),1);} else{$num2dig4="";}
		}
	while ($ans<1000 or $ans>9999 or ($i<3 and ($num1dig1<$num2dig1 or $num1dig2<$num2dig2 or $num1dig3<$num2dig3 or $num1dig4<$num2dig4)) 
		or ($i>=3 and $num1dig3<$num2dig3+1) or ($i>=3 and ($num1dig1>=$num2dig1 and $num1dig2>=$num2dig2 and $num1dig3>=$num2dig3 and $num1dig4>=$num2dig4)));			
	
	if ($num1dig1>=$num2dig1 and $num1dig2>=$num2dig2 and $num1dig3>=$num2dig3 and $num1dig4>=$num2dig4){echo $red2."(no regrouping)".$small."<br/><br/>".$black;} 
	else{echo $red2."(with regrouping)".$small."<br/><br/>".$black;} 
		
	$num1dig1b=$num1dig1;	
	if ($num1dig1<$num2dig1){$num1dig2b=$num1dig2-1; $num1dig1b=$num1dig1+10;} else{$num1dig2b=$num1dig2;}
	if ($num1dig2b<$num2dig2){$num1dig3b=$num1dig3-1; $num1dig2b=$num1dig2b+10;} else{$num1dig3b=$num1dig3;}
	if ($num1dig3b<$num2dig3){$num1dig4b=$num1dig4-1; $num1dig3b=$num1dig3b+10;} else{$num1dig4b=$num1dig4;}
 
	$ansdig1=substr($ans,0,1);
	$ansdig2=substr($ans,1,1);
	$ansdig3=substr($ans,2,1);
	$ansdig4=substr($ans,3,1);
	
	echo $small."<br/>".$font.$num1." - ".$num2." = ?".$small."<br/><br/>".$font;

	if ($i<3){echo "<table border='0' width='50%' align='center' cellspacing='0' cellpadding='0'>";}
	else{echo "<table border='0' width='50%' align='center' cellspacing='0' cellpadding='0'>";}
	
	if ($num1dig1b!=$num1dig1 or $num1dig2b!=$num1dig2 or $num1dig3b!=$num1dig3 or $num1dig4b!=$num1dig4){
		echo "<tr><td align='right' width='12%'> $gray &nbsp;</td>";
		if ($num1dig4b!=$num1dig4){echo "<td align='right' width='22%'> $gray $num1dig4b</td>";} else{echo "<td align='right' width='22%'> $black </td>";}
		if ($num1dig3b!=$num1dig3){echo "<td align='right' width='22%'> $gray $num1dig3b</td>";} else{echo "<td align='right' width='22%'> $black </td>";}
		if ($num1dig2b!=$num1dig2){echo "<td align='right' width='22%'> $gray $num1dig2b</td>";} else{echo "<td align='right' width='22%'> $black </td>";}
		if ($num1dig1b!=$num1dig1){echo "<td align='right' width='22%'> $gray $num1dig1b</td>";} else{echo "<td align='right' width='22%'> $black </td>";}
	
		echo "</tr>";
		}
		
	echo "<tr><td align='right' width='12%'> $black &nbsp;</td>";
	if($num1dig4b!=$num1dig4){echo "<td align='right' width='22%' background='../../images/books-subt-del.jpg'>$black $num1dig4</td>";} else{echo "<td align='right' width='22%'> $black $num1dig4</td>";}
	if($num1dig3b!=$num1dig3){echo "<td align='right' width='22%' background='../../images/books-subt-del.jpg'>$black $num1dig3</td>";} else{echo "<td align='right' width='22%'> $black $num1dig3</td>";}
	if($num1dig2b!=$num1dig2){echo "<td align='right' width='22%' background='../../images/books-subt-del.jpg'>$black $num1dig2</td>";} else{echo "<td align='right' width='22%'> $black $num1dig2</td>";}
	if($num1dig1b!=$num1dig1){echo "<td align='right' width='22%' background='../../images/books-subt-del.jpg'>$black $num1dig1</td>";} else{echo "<td align='right' width='22%'> $black $num1dig1</td>";}
	
	echo "	
	</tr>
	<tr>
		<td align='left'> $vio <b>-</b></td>
		<td align='right' width='22%'> $black $num2dig4</td>
		<td align='right' width='22%'> $black $num2dig3</td>
		<td align='right' width='22%'> $black $num2dig2</td>
		<td align='right' width='22%'> $black $num2dig1</td>
	</tr>
	<tr>
		<td align='right' colspan='5' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $blue &nbsp;</td>
		<td align='right'> $blue $ansdig1</td>
		<td align='right'> $blue $ansdig2</td>
		<td align='right'> $blue $ansdig3</td>
		<td align='right'> $blue $ansdig4</td>
	</tr>
	</table>";
 
	echo "</td></tr></table><br/>";
	}
	
?>