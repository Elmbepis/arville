<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

for ($i=1; $i<=10; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
		
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
		
	echo $red."Example #".$i.$black."<br/><br/>";
	
	$type="odd"; $all=""; $list=""; 
	if (rand(1,2)==1){$type="even";}
	
	echo "Find the ".$type." numbers among these numbers:<br/><br/>";
	
	$lim=10+(($i-1)*2);
	do{
		for ($j=1; $j<=$lim; $j+=1){
			do{$num=rand(11,(50+$i*100));} while(strpos($all,$num)>0);
			if ($type=="even"){
				if ($num%2==0){$list=$list.$vio.$num.$black.", ";}
				}
			else{
				if ($num%2!=0){$list=$list.$vio.$num.$black.", ";}
				}
			$all=$all.$num."*";	
			echo $vio.$num.$black;
			if ($j<$lim){echo ", ";}
			}
		}	
	while (strlen($list)<5);	
	echo "<br/><br/>The ".$type." numbers in this list are those that end in an ".$type." number. They are:<br/><br/>";
	echo substr($list,0,(strlen($list)-3));	
	echo ".";
	 
	echo "</td></tr></table><br/>";
	if ($i==3){echo "<br/><br/>";}
	}
	
?>