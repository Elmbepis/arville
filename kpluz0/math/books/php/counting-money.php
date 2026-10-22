<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}
$small="<span lang='EN-US' style='font-size: 16pt'>";

$red=$font."<font color='#CC0000'><b>";
$black=$font."<font color='#000000'></b>";

$bills=array("20","50","100","200","500","1000");
$coins=array("1c","5c","10c","25c","1p","5p","10p");
$bcount=count($bills)-1;
$ccount=count($coins)-1;

for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>";
	echo "<tr><td align='center'>";	
	
	if ($grd==3){
	
		do{	
			$numlim=7;
			if ($i==1){$numb=rand(3,5); $numc=0;}
			if ($i==2){$numc=rand(5,7); $numb=0;}
			if ($i==3 or $i==4){$numc=rand(3,5); $numb=rand(3,6); $numlim=8;}
			if ($i==5){$numc=rand(5,7); $numb=rand(5,8); $numlim=10;}
 			}
 		while ($numb+$numc>$numlim);
 
		echo "<table align='center' width='900' cellspacing='0' cellpadding='0'><tr>";
		
		echo "<td align='center'><br/>";
		echo $red."Example #".$i.$small."<br/><br/>".$black;
		$sumstr="";
		$sum=0;
		$sumb=0;
		$sumc=0;
		for($j=1; $j<=$numb; $j+=1){
			$bill[$j]=$bills[rand(0,$bcount)];
			$img="images/money-b-".$bill[$j]."p.jpg";		
			echo "<img border='0' src='$img'> ";
			$sum=$sum+$bill[$j];
			$sumb=$sumb+$bill[$j];
			$sumstr=$sumstr."&#8369;".$bill[$j];
			if ($j<$numb or $i>2){$sumstr=$sumstr." + ";}
			}	
		for($j=1; $j<=$numc; $j+=1){
			$coin[$j]=$coins[rand(0,$bcount)];
			$img="images/money-c-".$coin[$j].".jpg";		
			echo "<img border='0' src='$img'> ";
			$scoin=substr($coin[$j],0,(strlen($coin[$j])-1));
			if (substr($coin[$j],-1)=="c"){
				$sumstr=$sumstr.$scoin."&cent;";
				$sum=$sum+$scoin*.01;
				$sumc=$sumc+$scoin;
				}
			else{
				$sumstr=$sumstr."&#8369;".$scoin;
				$sumb=$sumb+$scoin;
				$sum=$sum+$scoin;
				}
			if ($j<$numc){$sumstr=$sumstr." + ";}
			} 
		
		echo "<br/><br/>".$sumstr." = &#8369;".$sumb;
		if ($sumc>0){echo " + ".$sumc."&cent; = &#8369;".number_format($sum,2);}	
			
		echo "</td>";
				
		echo "</tr></table>$small<br/>";
		}
	
	echo "</td></tr></table>";
	if ($i<5){echo "<br/>";}
	}
	echo $small."<br/>".$font;
?>