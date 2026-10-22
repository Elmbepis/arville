<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><u>";
$red="<font color='#CC0000'><b>";
$red2="<font color='#CC0000'>";
$black="<font color='#000000'></b>";

		
function getord($num){		
	if ($num==1){$ordnum="1st";}
	if ($num==2){$ordnum="2nd";}
	if ($num==3){$ordnum="3rd";}
	if ($num>3){$ordnum=$num."th";}
	return $ordnum;
	}	

for ($i=1; $i<=7; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

		
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	echo $red."Example #".$i.$black."<br/><br/>";
	
	echo "Find the missing term in this number sequence:<br/>";
	
	if ($i<=4){		
		if ($i==1){$a=rand(1,9); $b=rand(3,9);}
		if ($i==2){$b=rand(3,9); $a=rand(($b*6+1),($b*8+9)); $b=$b*-1;}
		if ($i==3){$a=rand(15,49); $b=rand(10,16);}
		if ($i==4){$b=rand(10,16); $a=rand(($b*6+1),($b*8+9)); $b=$b*-1;}
		$t[0]=$a;	
		$t[1]=$t[0]+$b;	
		$t[2]=$t[1]+$b;	
		$t[3]=$t[2]+$b;	
		$t[4]=$t[3]+$b;	
		$series=$vio.$t[0].", ".$t[1].", ".$t[2].", ".$t[3].", ".$t[4].", ...".$black;
		$pos=rand(2,4);
		$missing=$t[$pos];
		$t[$pos]="___";
		echo $vio.$t[0].", ".$t[1].", ".$t[2].", ".$t[3].", ".$t[4].", ";
		echo "...".$black."<br/><br/>";
		echo $blue."Solution:</u><br/><br/>".$black;
		if ($i==1 or $i==3){
			echo "By inspection and trial and error, we realize that each term is always ".$red2.$b.$black." more than the term before it.<br/><br/>";
			echo "We must add ".$b." to ".$t[$pos-1]." to get the missing term. ";
			echo "Thus, the missing term is ".$vio.$missing.$black.".";				
			}
		if ($i==2 or $i==4){
			echo "By inspection and trial and error, we realize that each term is always ".$red2.($b*-1).$black." less than the term before it.<br/><br/>";
			echo "We must subtract ".($b*-1)." from ".$t[$pos-1]." to get the missing term. ";
			echo "Thus, the missing term is ".$vio.$missing.$black.".";				
			}
		echo "<br/><br/>This is the number sequence:<br/>".$series;	
		}	
	
	if ($i==5 or $i==6){		
		if ($i==5){
			$a=rand(3,9); $b=rand(2,7);
			$t[0]=$a;	
			$t[1]=$t[0]*$b;	
			$t[2]=$t[1]*$b;	
			$t[3]=$t[2]*$b;	
			$t[4]=$t[3]*$b;
			}
		if ($i==6){
			$b=rand(2,6); $a=rand(2,5)*pow($b,4);
			$t[0]=$a;	
			$t[1]=$t[0]/$b;	
			$t[2]=$t[1]/$b;	
			$t[3]=$t[2]/$b;	
			$t[4]=$t[3]/$b;
			}
		$series=$vio.$t[0].", ".$t[1].", ".$t[2].", ".$t[3].", ".$t[4].", ...".$black;
		$pos=rand(1,3);
		$missing=$t[$pos];
		$t[$pos]="___";
		echo $vio.$t[0].", ".$t[1].", ".$t[2].", ".$t[3].", ".$t[4].", ";
		echo "...".$black."<br/><br/>";
		echo $blue."Solution:</u><br/><br/>".$black;
		if ($i==5){
			echo "By inspection and trial and error, we realize that each term is always ".$red2.$b.$black." times the term before it.<br/><br/>";
			echo "We must multiply ".$t[$pos-1]." by ".$b." to get the missing term. ";
			echo "Thus, the missing term is ".$vio.$missing.$black.".";				
			}
		if ($i==6){
			echo "By inspection and trial and error, we realize that each term is always ".$red2."1/".$b.$black." the term before it.<br/><br/>";
			echo "We must divide ".$t[$pos-1]." by ".$b." to get the missing term. ";
			echo "Thus, the missing term is ".$vio.$missing.$black.".";				
			}
		echo "<br/><br/>This is the number sequence:<br/>".$series;	
		}	
	
	if ($i==7){		
		$a=rand(3,9); $b=rand(2,7); $c=rand(1,4);
		$t[0]=$a;	
		$t[1]=$t[0]+$b;	
		$t[2]=$t[1]+$b+$c;	
		$t[3]=$t[2]+$b+$c+$c;	
		$t[4]=$t[3]+$b+$c+$c+$c;
		$series=$vio.$t[0].", ".$t[1].", ".$t[2].", ".$t[3].", ".$t[4].", ...".$black;
		$pos=rand(3,4);
		$missing=$t[$pos];
		$t[$pos]="___";
		echo $vio.$t[0].", ".$t[1].", ".$t[2].", ".$t[3].", ".$t[4].", ";
		echo "...".$black."<br/><br/>";
		echo $blue."Solution:</u><br/><br/>".$black;
		echo "By inspection and trial and error, we realize that the difference between consecutive terms is always increasing by ".$red2.$c.$black.".<br/><br/>";
		echo "The difference between ".$t[$pos-2]." and ".$t[$pos-1]." is ".($t[$pos-1]-$t[$pos-2]).". ";
		echo "The difference between ".$t[$pos-1]." and the missing term must be ".($t[$pos-1]-$t[$pos-2])." + ".$red2.$c.$black." = ".($missing-$t[$pos-1]).". ";
		echo "Thus, the missing term is ".$vio.$missing.$black.".";				
		echo "<br/><br/>This is the number sequence:<br/>".$series;	
		}	
 
	echo "</td></tr></table><br/>";
	
	}
	
?>