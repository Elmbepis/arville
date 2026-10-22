<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 14pt'>";}
else{$font="<span lang='EN-US' style='font-size: 34pt'>";}
$small="<span lang='EN-US' style='font-size: 14pt'>";

$red=$font."<font color='#CC0000'><b>";
$blue=$font."<font color='#0000BB'><b>";
$vio=$font."<font color='#800080'><b>";
$black=$font."<font color='#000000'></b>";

$bills=array("20","50","100","200","500","1000");
$coins=array("1c","5c","10c","25c","1p","5p","10p");
$bcount=count($bills)-1;
$ccount=count($coins)-1;

for ($i=1; $i<=5; $i+=1){
	echo "<table align='center' width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>";	
	echo "<tr><td colspan='3' align='center'>&nbsp;</td></tr>";
	echo "<tr><td colspan='3' align='center'>&nbsp;</td></tr>";
	echo "<tr><td colspan='3' align='center'>&nbsp;</td></tr>";
	echo "<tr><td colspan='3' align='center'>".$red."Example #".$i.$small."<br/><br/>".$black."</td></tr>";
	echo "<tr><td width='46%' align='center'>";	
		
	do{	
		$numlim=5;
		if ($i==1){$numb=rand(3,5); $numc=0;}
		if ($i==2){$numc=rand(4,6); $numb=0;}
		if ($i==3 or $i==4){$numc=rand(3,5); $numb=rand(2,4); $numlim=6;}
		if ($i==5){$numc=rand(4,6); $numb=rand(3,5); $numlim=8;}
 		}
 	while ($numb+$numc>$numlim);
 
	echo "<table align='center' width='100%' cellspacing='0' cellpadding='0'><tr>";
	
	echo "<td align='center'><br/>";

	$sumstr="";
	$sum=0;
	$sumb=0;
	$sumc=0;
	for($j=1; $j<=$numb; $j+=1){
		$bill[$j]=$bills[rand(0,$bcount)];
		$img="images/money-bsm-".$bill[$j]."p.jpg";	
		echo "<img border='0' src='$img'> ";
		$sum=$sum+$bill[$j];
		$sumb=$sumb+$bill[$j];
		$sumstr=$sumstr."&#8369;".$bill[$j];
		if ($j<$numb or $i>2){$sumstr=$sumstr." + ";}
		}	
	for($j=1; $j<=$numc; $j+=1){
		$coin[$j]=$coins[rand(0,$bcount)];
		$img="images/money-csm-".$coin[$j].".jpg";		
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
		
		echo $font."<br/><br/>".$sumstr." = &#8369;".$sumb;
		if ($sumc>0){echo " + ".$sumc."&cent; = &#8369;".number_format($sum,2);}	
		$csum1=$sum;
		
	echo "</td></tr></table>";
			
	echo "$small<br/>";

	echo "</td><td width='8%'>&nbsp;</td><td width='46%' align='center'>";	
		
	do{	
		$numlim=5;
		if ($i==1){$numb=rand(3,5); $numc=0;}
		if ($i==2){$numc=rand(3,5); $numb=0;}
		if ($i==3 or $i==4){$numc=rand(3,5); $numb=rand(2,4); $numlim=6;}
		if ($i==5){$numc=rand(4,6); $numb=rand(3,5); $numlim=8;}
 		}
 	while ($numb+$numc>$numlim);
 
	echo "<table align='center' width='100%' cellspacing='0' cellpadding='0'><tr>";
		
	echo "<td align='center'><br/>";

	$sumstr="";
	$sum=0;
	$sumb=0;
	$sumc=0;

	for($j=1; $j<=$numb; $j+=1){
		$bill[$j]=$bills[rand(0,$bcount)];
		$img="images/money-bsm-".$bill[$j]."p.jpg";		
		echo "<img border='0' src='$img'> ";
		$sum=$sum+$bill[$j];
		$sumb=$sumb+$bill[$j];
		$sumstr=$sumstr."&#8369;".$bill[$j];
		if ($j<$numb or $i>2){$sumstr=$sumstr." + ";}
		}	
	for($j=1; $j<=$numc; $j+=1){
		$coin[$j]=$coins[rand(0,$bcount)];
		$img="images/money-csm-".$coin[$j].".jpg";
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
		
	echo $font."<br/><br/>".$sumstr." = &#8369;".$sumb;
	if ($sumc>0){echo " + ".$sumc."&cent; = &#8369;".number_format($sum,2);}	
	$csum2=$sum;

	echo "</td>";
	echo "</tr></table>$small<br/>";
	
	echo "</td></tr><tr><td colspan='3' align='center'>";
	if ($csum1>$csum2){$sign=" > ";}
	if ($csum1==$csum2){$sign=" = ";}
	if ($csum1<$csum2){$sign=" < ";}
	echo $font.$vio."&#8369;".number_format($csum1,2).$sign."&#8369;".number_format($csum2,2).$black;
	echo "</td></tr></table>";
			
	echo "$small<br/>";
		
	}
		

	if ($i<5){echo "<br/>";}
	
	if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
	else{$font="<span lang='EN-US' style='font-size: 36pt'>";}

	echo $small."<br/>".$font;
?>