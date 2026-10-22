<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}

$red=$font."<font color='#CC0000'><b>";
$blue=$font."<font color='#0000CC'><b>";
$black=$font."<font color='#000000'></b>";
$vio=$font."<font color='#800080'>";
$green=$font."<font color='#007700'><b>";
$small="<span lang='EN-US' style='font-size: 12pt'>";


for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='85%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	echo $red."Example #".$i.$black."$small <br/><br/>";

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
	
	if ($i<3){$places1=rand(1,2); $places2=rand(1,2);}
	else{do{$places1=rand(1,3); $places2=rand(1,3);}while($places1+$places2<3 or $places1+$places2>5);}

	$dec1=$mult1*(pow(10,(-1*$places1)));
	$dec2=$mult2*(pow(10,(-1*$places2)));		
	$decans=$dec1*$dec2;
	
	echo $font.$vio."<b>".$dec1." x ".$dec2." = ?<br/><br/>".$black;
	echo $green."Step 1. $black Multiply the numbers without their decimal points:<br/><br/>";
	
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
		<td align='right'> $black $num2dig1</td>
		<td align='right'> $black $num2dig2</td>
	</tr>
	<tr>
		<td align='right' colspan='4' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black $prod1dig1</td>
		<td align='right'> $black $prod1dig2</td>
		<td align='right'> $black $prod1dig3</td>
	</tr>
	<tr>
		<td align='right'> $black $prod2dig1</td>
		<td align='right'> $black $prod2dig2</td>
		<td align='right'> $black $prod2dig3</td>
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
		<td align='right'> $black $num2dig1</td>
		<td align='right'> $black $num2dig2</td>
	</tr>
	<tr>
		<td align='right' colspan='5' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'> $black &nbsp;</td>
		<td align='right'> $black $prod1dig1</td>
		<td align='right'> $black $prod1dig2</td>
		<td align='right'> $black $prod1dig3</td>
		<td align='right'> $black $prod1dig4</td>
	</tr>
	<tr>
		<td align='right'> $black $prod2dig1</td>
		<td align='right'> $black $prod2dig2</td>
		<td align='right'> $black $prod2dig3</td>
		<td align='right'> $black $prod2dig4</td>
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
	
	echo $green."<br/>Step 2. $black Add up the decimal places of the factors:<br/><br/>";
	echo "# of decimal places of ".$dec1.": $places1<br/>";
	echo "# of decimal places of ".$dec2.": $places2<br/>";
	echo "total # of decimal places: ".$blue.($places1+$places2)."</b><br/>";
	
	echo $green."<br/>Step 3. $black Put the decimal point of the answer ".($places1+$places2)." decimal places from the right. ";
	echo "The final answer is therefore $decans.<br/><br/>";
	$pos=strpos($decans,".");
	$whole=floor($decans);
	$dec=substr($decans,($pos+1));
	echo "Thus, ".$dec1." x ".$dec2." = ".$blue.$whole.$red.".</b>".$blue."</b>".$dec."<br/>";
	
 
	echo "</td></tr></table><br/>";
	
	}
	
?>