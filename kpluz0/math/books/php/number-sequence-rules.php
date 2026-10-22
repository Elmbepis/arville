<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><u>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

		
function getord($num){		
	if ($num==1){$ordnum="1st";}
	if ($num==2){$ordnum="2nd";}
	if ($num==3){$ordnum="3rd";}
	if ($num>3){$ordnum=$num."th";}
	return $ordnum;
	}	

for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

		
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	echo $red."Example #".$i.$black."<br/><br/>";
	
	$allstr="***a0b2c1 ";
	if ($i<=5){		
		echo "Find the rule and the next term for this number sequence:<br/>";
		do{	
			if ($i==1){$a=rand(0,3); $b=rand(2,3); $c=rand(1,2);}
			if ($i==2 or $i==3){$a=rand(1,4); $b=rand(2,4); $c=rand(1,3);}
			if ($i>=4){$a=rand(3,6); $b=rand(3,6); $c=rand(2,5);}
			$strchk="a".$a."b".$b."c".$c." ";
			}
		while (strpos($allstr,$strchk)>0);
		$allstr=$allstr.$strchk;
		$t[0]=$a;	
		$t[1]=$t[0]*$b+$c;	
		$t[2]=$t[1]*$b+$c;	
		$t[3]=$t[2]*$b+$c;	
		echo $vio.$t[0].", ".$t[1].", ".$t[2].", ".$t[3].", ";
		echo "...".$black."<br/><br/>";
		echo $blue."Solution 1:</u><br/><br/>".$black;
		echo "By trial and error, we realize that the next term is always ".$b." times the last term plus ".$c.".<br/><br/>";
		echo "Our Rule:<br/>".$vio."</b>next term = (last term x $b) + $c<br/><br/>".$black;  
		echo "Applying this rule, we get:<br/>";
		echo "next term = (".$t[3]." x ".$b.") + ".$c." = ".$vio.($t[3]*$b+$c).$black."<br/><br/>";	
		echo $blue."Solution 2:</u><br/><br/>".$black;
		echo "List down the differences between consecutive terms:<br/>";
		echo $t[1]." - ".$t[0]." = ".$vio."</b>".($t[1]-$t[0]).$black."<br/>";
		echo $t[2]." - ".$t[1]." = ".$vio."</b>".($t[2]-$t[1]).$black."<br/>";
		echo $t[3]." - ".$t[2]." = ".$vio."</b>".($t[3]-$t[2]).$black."<br/><br/>";
		$dfac=($t[2]-$t[1])/($t[1]-$t[0]);
		echo "The next difference is always ".$vio."</b>".$dfac." times ".$black."the last difference.<br/><br/>";
		echo "Difference between the next term and ".$t[3]." = ".($t[3]-$t[2])." x ".$dfac." = ".$vio."</b>".(($t[3]-$t[2])*$dfac).$black."<br/><br/>";
		echo "next term = ".$t[3]." + ".(($t[3]-$t[2])*$dfac)." = ".$vio.($t[3]+(($t[3]-$t[2])*$dfac)).$black;	
		}	
 
	echo "</td></tr></table><br/>";
	
	}
	
?>