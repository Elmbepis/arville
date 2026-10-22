<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
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
	
	if ($i<=3){		
		$nth0=rand(1,9);
		$nth=$i*10+$nth0;
		if($i>1){$snth0=getord($nth0);} else {$snth0=$nth0."th";}
		$snth=$i.$snth0;
		echo "Find the $snth term in this number sequence:<br/>";
		do{	
			if ($i==1){$a1=rand(4,9); $d=rand(3,9);}
			if ($i==2){$a1=rand(7,19); $d=rand(6,12);}
			if ($i>=3){$a1=rand(11,29); $d=rand(11,19);}
			}
		while ($d>=$a1);	
		for ($k=0; $k<=4; $k+=1){
			$a[$k]=$a1+$d*$k;
			echo $vio.$a[$k].$black;
			if ($k<4){echo ", ";}
			}
		echo ",".$vio." ...".$black."<br/><br/>";
		echo "This is an arithmetic series.<br/>";
		echo "The first term is ".$vio.$a1.$black.".<br/>";
		echo "The common difference is ".$vio.$d.$black.".<br/><br/>";	
		echo "The formula is therefore:<br/>";
		echo "a<sub>n</sub> = ".$a1." + ".$d." x (n-1) or<br/>";	
		echo "a<sub>n</sub> = ".$d."n + ".($a1-$d)."<br/><br/>";
		echo "Applying this formula, we get:<br/>";
		echo "$snth term = (".$d." x ".$nth.") + ".($a1-$d)." = ".$vio.($d*$nth+($a1-$d)).$black;	
		}	
		
	if ($i==4){		
		$a1=rand(3,15); 
		$r=rand(2,4); 
		if ($r==2){$n=rand(5,9);}
		if ($r==3){$n=rand(5,7);}
		if ($r>=4){$n=rand(5,6);}
		echo "Find the ".$n."th term in this number sequence:<br/>";
		for ($k=0; $k<=4; $k+=1){
			$a[$k]=$a1*pow($r,$k);
			echo $vio.$a[$k].$black;
			if ($k<4){echo ", ";}
			}
		echo ",".$vio." ...".$black."<br/><br/>";
		echo "This is a geometric series.<br/>";
		echo "The first term is ".$vio.$a1.$black.".<br/>";
		echo "The common ratio is ".$vio.$r.$black.".<br/><br/>";	
		echo "The formula is therefore:<br/>";
		echo "a<sub>n</sub> = ".$a1." x ".$r."<sup>(n-1)</sup><br/><br/>";
		echo "Applying this formula, we get:<br/>";
		echo $n."th term = ".$a1." x ".$r."<sup>".($n-1)."</sup> = ".$vio.($a1*pow($r,($n-1))).$black;
		}	
		
	if ($i==5){		
		$fac=rand(2,3);
		$d=rand(1,9); 
		echo "Find the sixth term in this number sequence:<br/>";
		for ($k=1; $k<=5; $k+=1){
			$a[$k]=$fac*pow($k,2)+$d;
			echo $vio.$a[$k].$black;
			if ($k<5){echo ", ";}
			}
		echo ",".$vio." ?".$black."<br/><br/>";
		echo "Guesswork and trial and error would reveal that the formula for the nth term is:<br/>";
		echo "a<sub>n</sub> = ".$fac."n<sup>2</sup> + ".$d."<br/><br/>";
		echo "Applying this rule, we get:<br/>";
		echo "sixth term = ".$fac." x 6<sup>2</sup> + ".$d." = ".$vio.($fac*pow(6,2)+$d).$black;
		}	
 
	echo "</td></tr></table><br/>";
	
	}
	
?>