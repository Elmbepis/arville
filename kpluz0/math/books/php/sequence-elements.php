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
		echo "Find the next term in this number sequence:<br/>";
		do{	
			if ($i==1){$a1=rand(4,9); $d=rand(3,7);}
			if ($i==2){$a1=rand(7,19); $d=rand(6,10);}
			if ($i>=3){$a1=rand(11,29); $d=rand(11,19);}
			}
		while ($d>=$a1);	
		for ($k=0; $k<=4; $k+=1){
			$a[$k]=$a1+$d*$k;
			echo $vio.$a[$k].$black;
			if ($k<4){echo ", ";}
			}
		echo ",".$vio." ...".$black."<br/><br/>";
		echo "Each term is greater than the one before it by ".$vio.$d.$black.".<br/><br/>";	
		echo "The next term therefore equals:<br/>";
		echo $a[4]." + ".$d." = ".$vio.($a[4]+$d).$black;	
		}	
		
	if ($i==4){		
		$a1=rand(3,9); 
		$r=rand(2,3); 
		echo "Find the next term in this number sequence:<br/>";
		for ($k=0; $k<=4; $k+=1){
			$a[$k]=$a1*pow($r,$k);
			echo $vio.$a[$k].$black;
			if ($k<4){echo ", ";}
			}
		echo ",".$vio." ...".$black."<br/><br/>";
		echo "Each terms is ".$vio.$r." times".$black." the one before it.<br/><br/>";	
		echo "The next term therefore equals:<br/>";
		echo $a[4]." x ".$r." = ".$vio.($a[4]*$r).$black;	
		}	
	
	if ($i==5){		
		echo "Find the next term in this sequence:<br/>";
		do{$a1=rand(4,15); $d=rand(3,9);}
		while ($d>=$a1);
		$b1=rand(97,110);
		$d2=rand(1,2);	
		for ($k=0; $k<=4; $k+=1){
			$a[$k]=$a1+$d*$k;
			$b[$k]=$b1+$d2*$k;
			$letter=chr($b[$k]);
			echo $vio.$letter.$a[$k].$black;
			if ($k<4){echo ", ";}
			}
		$last=chr($b[4]+$d2).($a[4]+$d);	
		echo ",".$vio." ...".$black."<br/><br/>";
		if ($d2==1){echo "The letters of the terms follow the alphabet. ";}	
		else{echo "The letters of the terms are two places apart in the alphabet. ";}	
		echo "The letter of the next term is therefore '".$vio.chr($b[4]+$d2)."'".$black.".<br/><br/>";
		echo "The number of each term is greater than the one before it by ".$vio.$d.$black.".<br/>";	
		echo "The number of the next term is therefore: ";
		echo $a[4]." + ".$d." = ".$vio.($a[4]+$d).$black."<br/><br/>";	
		echo "The next term is therefore ".$vio."'".$last."'".$black.".";	
		}	
		
 
	echo "</td></tr></table><br/>";
	
	}
	
?>