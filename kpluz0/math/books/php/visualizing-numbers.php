<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}
$small="<span lang='EN-US' style='font-size: 16pt'>";

for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='100%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	if ($grd==3){
		do{
			if ($i<3){$ones=rand(1,9); $tens=rand(1,9); $hundreds=rand(1,2); $thousands=rand(1,2);}
			if ($i==3 or $i==4){$ones=rand(5,9); $tens=rand(3,9); $hundreds=rand(3,6); $thousands=rand(3,6);}
			if ($i==5){$ones=rand(3,9); $tens=rand(3,9); $hundreds=rand(5,9); $thousands=rand(7,11);}
			}
		while (abs($thousands-$hundreds)>2);

		
		if ($thousands>1 and $hundreds>1){$tw='96%';$tdw1='36%'; $tdw2='36%'; $tdw3='14%'; $tdw4='14%';}
		if ($thousands>1 and $hundreds<=1){$tw='90%'; $tdw1='44%'; $tdw2='24%'; $tdw3='16%'; $tdw4='16%';}
		if ($thousands<=1 and $hundreds>1){$tw='90%'; $tdw1='24%'; $tdw2='44%'; $tdw3='16%'; $tdw4='16%';}
		if ($thousands==1 and $hundreds==1){$tw='85%'; $tdw1='28%'; $tdw2='28%'; $tdw3='22%'; $tdw4='22%';}
	
		echo "<br/>".$font."<font color='#800080'><b>".$thousands.",".$hundreds.$tens.$ones;
		
		echo "<table align='center' width='$tw' cellspacing='0' cellpadding='0'>";
		echo "<tr><td><tr><td>&nbsp;</td></tr><tr><td align='center' width='$tdw1'>";	
		
			echo "<table align='center' cellspacing='0' cellpadding='0'>";
			echo "<tr>";	
			for ($m=1; $m<=$thousands; $m+=1){
				$img="../books/images/vis-num-1000-yellow.jpg";
				echo "<td align='center' align='center'><img border='0' src='$img'>&nbsp;&nbsp;</td>";
				if ($m%2==0 and $m<$thousands) {echo "</tr><tr>";}
				}	
			echo "</td></tr></table><br/>".$small.$thousands.",000 squares<br/>";			
		
			echo "</td><td align='center' width='$tdw2'>";	
			echo "<table align='center' cellspacing='0' cellpadding='0'>";
			echo "<tr>";	
			for ($m=1; $m<=$hundreds; $m+=1){
				$img="../books/images/vis-num-100.jpg";
				echo "<td align='center' align='center'><img border='0' src='$img'>&nbsp;&nbsp;</td>";
				if ($m%2==0 and $m<$hundreds) {echo "</tr><tr>";}
				}	
			echo "</tr></td></table><br/>".$small.$hundreds."00 squares<br/>";			
				
			echo "</td><td align='center' width='$tdw3' >";	
			echo "<table align='center' cellspacing='0' cellpadding='0'>";
			echo "<tr>";	
			for ($m=1; $m<=$tens; $m+=1){
				$img="../books/images/vis-num-10.jpg";
				echo "<td align='center' align='center'><img border='0' src='$img'>&nbsp;&nbsp;</td>";
				if ($m%5==0 and $m<$tens) {echo "</tr><tr>";}
				}	
			echo "</tr></td></table><br/>".$small.($tens*10)." squares<br/>";			
				
			echo "</td><td align='center' width='$tdw4' >";	
			echo "<table align='center' cellspacing='0' cellpadding='0'>";
			echo "<tr>";	
			for ($m=1; $m<=$ones; $m+=1){
				$img="../books/images/vis-num-1.jpg";
				echo "<td align='center' align='center'><img border='0' src='$img'>&nbsp;&nbsp;</td>";
				if ($m%5==0 and $m<$ones) {echo "</tr><tr>";}
				}	
			echo "</tr></td></table><br/>".$small.$ones;
			if ($ones==1){echo " square<br/>";} else {echo " squares<br/>";}			
				
				
		echo "</td></tr></table>$small<br/>";
		}
	
	echo "</td></tr></table>";
	if ($i<5){echo "<br/>";}
	}
	echo $small."<br/>".$font;
?>