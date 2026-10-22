<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}

$red=$font."<font color='#CC0000'><b>";
$blue=$font."<font color='#0000CC'><b>";
$black=$font."<font color='#000000'></b>";
$vio=$font."<font color='#800080'>";
$green=$font."<font color='#008000'>";
$vio2=$font."<font color='#ddaadd'>";
$green2=$font."<font color='#aaddaa'>";
$gray=$font."<font color='#999999'></b>";

if ($grd>=4){
for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='80%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	echo $red."Example #".$i.$black."<br/><br/>";

	if ($i==1){
		do{
			$num2dig1=rand(1,4); $num2dig2=rand(1,4);
			
			if ($num2dig1==1 and $num2dig2==1){$num1dig1=rand(3,9); $num1dig2=rand(3,9); $num1dig3=rand(3,9);}
			else{$num1dig1=rand(1,4); $num1dig2=rand(1,4); $num1dig3=rand(1,4);}
			
			$mult1=$num1dig1*100+$num1dig2*10+$num1dig3;		
			$mult2=$num2dig1*10+$num2dig2;
			$prod1=$mult1*$num2dig2;
			$prod2=$mult1*$num2dig1;
			$ans=$mult1*$mult2;	
			}
		while ($num2dig1*$num1dig1>9 or $num2dig1*$num1dig2>9 or $num2dig1*$num1dig3>9 or
			$num2dig2*$num1dig1>9 or $num2dig2*$num1dig2>9 or $num2dig2*$num1dig3>9 or $ans<1111 or $ans>9999);			
		}	
	else{
		do{
			$num2dig1=rand(3,9); $num2dig2=rand(3,9);
			$num1dig1=rand(1,9); $num1dig2=rand(1,9); $num1dig3=rand(1,9);
			$mult1=$num1dig1*100+$num1dig2*10+$num1dig3;		
			$mult2=$num2dig1*10+$num2dig2;
			$prod1=$mult1*$num2dig2;
			$prod2=$mult1*$num2dig1;
			$ans=$mult1*$mult2;	
			}
		while ($prod1<1001 or $prod2<1001 or $ans<11111 or $ans>99999);			
		}
	$prod1dig1=substr($prod1,0,1);
	$prod1dig2=substr($prod1,1,1);
	$prod1dig3=substr($prod1,2,1);
	$prod1dig4=substr($prod1,3,1);
	$prod2dig1=substr($prod2,0,1);
	$prod2dig2=substr($prod2,1,1);
	$prod2dig3=substr($prod2,2,1);
	$prod2dig4=substr($prod2,3,1);
	$ansdig1=substr($ans,0,1);
	$ansdig2=substr($ans,1,1);
	$ansdig3=substr($ans,2,1);
	$ansdig4=substr($ans,3,1);
	$ansdig5=substr($ans,4,1);
	
	if ($i==1){
	echo "<table border='0' width='45%' align='center' cellspacing='0' cellpadding='0'>";
	echo "
	<tr>
		<td align='right' width='7%'> $black &nbsp;</td>
		<td align='right' width='31%'> $black $num1dig1</td>
		<td align='right' width='31%'> $black $num1dig2</td>
		<td align='right' width='31%'> $black $num1dig3</td>
	</tr>
	<tr>
		<td align='right'> $black x</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $green $num2dig1</td>
		<td align='right'> $vio $num2dig2</td>
	</tr>
	<tr>
		<td align='right' colspan='4' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $vio $prod1dig1</td>
		<td align='right'> $vio $prod1dig2</td>
		<td align='right'> $vio $prod1dig3</td>
	</tr>
	<tr>
		<td align='right'> $green $prod2dig1</td>
		<td align='right'> $green $prod2dig2</td>
		<td align='right'> $green $prod2dig3</td>
		<td align='right'> $black &nbsp;</td>
	</tr>
	<tr>
		<td align='right' colspan='4' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $blue $ansdig1</td>
		<td align='right'> $blue $ansdig2</td>
		<td align='right'> $blue $ansdig3</td>
		<td align='right'> $blue $ansdig4</td>
	</tr>
	</table>";
	}
	
	
	else{
	echo "<table border='0' width='55%' align='center' cellspacing='0' cellpadding='0'>";
	echo "
	<tr>
		<td align='right' width='8%'> $black &nbsp;</td>
		<td align='right' width='24%'> $black &nbsp;</td>
		<td align='right' width='24%'> $black $num1dig1</td>
		<td align='right' width='24%'> $black $num1dig2</td>
		<td align='right' width='24%'> $black $num1dig3</td>
	</tr>
	<tr>
		<td align='right'> $black x</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $green $num2dig1</td>
		<td align='right'> $vio $num2dig2</td>
	</tr>
	<tr>
		<td align='right' colspan='5' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $vio $prod1dig1</td>
		<td align='right'> $vio $prod1dig2</td>
		<td align='right'> $vio $prod1dig3</td>
		<td align='right'> $vio $prod1dig4</td>
	</tr>
	<tr>
		<td align='right'> $green $prod2dig1</td>
		<td align='right'> $green $prod2dig2</td>
		<td align='right'> $green $prod2dig3</td>
		<td align='right'> $green $prod2dig4</td>
		<td align='right'> $black &nbsp;</td>
	</tr>
	<tr>
		<td align='right' colspan='5' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $blue $ansdig1</td>
		<td align='right'> $blue $ansdig2</td>
		<td align='right'> $blue $ansdig3</td>
		<td align='right'> $blue $ansdig4</td>
		<td align='right'> $blue $ansdig5</td>
	</tr>
	</table>";
	}
 
	echo "</td></tr></table><br/>";
	
	}
}	


if ($grd<=3){
for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='80%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	echo $red."Example #".$i.$black."<br/><br/>";

	if ($i==1){
		$num1=rand(1111,3999);
		$num2=rand(2,4);	
		}
	if ($i==2){
		$num1=rand(2222,5999);
		$num2=rand(3,6);	
		}
	if ($i==3){
		$num1=rand(3333,7999);
		$num2=rand(3,7);	
		}
	if ($i==4){
		$num1=rand(5555,8999);
		$num2=rand(3,7);	
		}
	if ($i>=5){
		$num1=rand(7777,9999);
		$num2=rand(4,9);	
		}
	$ans=$num1*$num2;	
		
	$num1dig1=substr($num1,0,1);
	$num1dig2=substr($num1,1,1);
	$num1dig3=substr($num1,2,1);
	$num1dig4=substr($num1,3,1);
	
	$carry4=$num1dig4*$num2;
	if ($carry4<10){$carry4="";}else{$carry4=substr($carry4,0,1);}
	$carry3=$num1dig3*$num2+$carry4;
	if ($carry3<10){$carry3="";}else{$carry3=substr($carry3,0,1);}
	$carry2=$num1dig2*$num2+$carry3;
	if ($carry2<10){$carry2="";}else{$carry2=substr($carry2,0,1);}
	
	if ($ans>9999){
		$ansdig1=substr($ans,0,1);
		$ansdig2=substr($ans,1,1);
		$ansdig3=substr($ans,2,1);
		$ansdig4=substr($ans,3,1);
		$ansdig5=substr($ans,4,1);
		}
	else{
		$ansdig1="";
		$ansdig2=substr($ans,0,1);
		$ansdig3=substr($ans,1,1);
		$ansdig4=substr($ans,2,1);
		$ansdig5=substr($ans,3,1);
		}
	
	echo "<table border='0' width='50%' align='center' cellspacing='0' cellpadding='0'>";
	echo "
	<tr>
		<td align='right' width='10%'> $black &nbsp;</td>
		<td align='right' width='18%'> $black &nbsp;</td>
		<td align='right' width='18%'> $gray $carry2</td>
		<td align='right' width='18%'> $gray $carry3</td>
		<td align='right' width='18%'> $gray $carry4</td>
		<td align='right' width='18%'> $gray &nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black $num1dig1</td>
		<td align='right'> $black $num1dig2</td>
		<td align='right'> $black $num1dig3</td>
		<td align='right'> $black $num1dig4</td>
	</tr>
	<tr>
		<td align='right'> $black x</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $vio $num2</td>
	</tr>
	<tr>
		<td align='right'> $black</td>
		<td align='right'> $black</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		<td align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $blue $ansdig1</td>
		<td align='right'> $blue $ansdig2</td>
		<td align='right'> $blue $ansdig3</td>
		<td align='right'> $blue $ansdig4</td>
		<td align='right'> $blue $ansdig5</td>
	</tr>
	</table>";
 
	echo "</td></tr></table><br/>";
	
	}
}	

	
?>