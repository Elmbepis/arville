<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=6; $i+=1){
echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:20pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:40pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}

$vio="<font color='#800080'><b>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'><b>";
$black="</b><font color='#000000'>";


if($i<=2){
    
    do {
		$min1 = rand(1,47);
		$min2 = rand(16,59);
		$hr1 = rand(1,10);
		$hr2 = rand(2,11);
		}
	while ($min2<=$min1+2 or $hr2<=$hr1);	
	if ($min1<10){$smin1="0".$min1;}else{$smin1=$min1;}
	if ($min2<10){$smin2="0".$min2;}else{$smin2=$min2;}
	if (rand(1,2)==1){$t="am";}else{$t="pm";}
	$dmin=$min2-$min1;
	if ($dmin<10){$sdmin="0".$dmin;}else{$sdmin=$dmin;}
	$dhr=$hr2-$hr1;
	echo $red."Example #".$i.$black."<br/><br/>An event started at ".$vio.$hr1.":".$smin1." ".$t.$black." and ended at ".$vio.$hr2.":".$smin2." ".$t.$black;
	echo ". Find the elapsed time.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
	echo "
	<table border='0' width='300' cellspacing='0' cellpadding='0'>
	<tr>
		<td align='right' width='125'>$tfont2<b>$hr2</b></td>
		<td align='center' width='50'>$tfont2<b> : </b></td>
		<td align='left' width='125'>$tfont2<b>$smin2</b></td>
	</tr>
	<tr>
		<td align='right'>$tfont2<b> -&nbsp;&nbsp;&nbsp; $hr1</b></td>
		<td align='center'>$tfont2<b> : </b></td>
		<td align='left' width='129'>$tfont2<b>$smin1</b></td>
	</tr>
	<tr>
		<td colspan='3' background='../../images/books-time-bar.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'>$tfont2<b>$dhr</b></td>
		<td align='center'>$tfont2<b> : </b></td>
		<td align='left' width='129'>$tfont2<b>$sdmin</b></td>
	</tr>
	</table>";
    echo "<br/>Thus, the elapsed time is ".$vio.$dhr." hours ".$black." and ".$vio.$dmin." minutes".$black.".";
	}

if($i==3 or $i==4){
    
    do {
		$min1 = rand(1,47);
		$min2 = rand(16,59);
		$hr1 = rand(1,10);
		$hr2 = rand(2,11);
		}
	while ($min1<=$min2+2 or $hr2<=$hr1+2);	
	if ($min1<10){$smin1="0".$min1;}else{$smin1=$min1;}
	if ($min2<10){$smin2="0".$min2;}else{$smin2=$min2;}
	if (rand(1,2)==1){$t="am";}else{$t="pm";}
	$dmin=($min2+60)-$min1;
	if ($dmin<10){$sdmin="0".$dmin;}else{$sdmin=$dmin;}
	$dhr=$hr2-$hr1-1;
	echo $red."Example #".$i.$black."<br/><br/>An event started at ".$vio.$hr1.":".$smin1." ".$t.$black." and ended at ".$vio.$hr2.":".$smin2." ".$t.$black;
	echo ". Find the elapsed time.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Regroup ".$hr2.":".$smin2." into ".($hr2-1).":".($smin2+60).".<br/><br/>";
    echo "Subtract after regrouping:<br/><br/>";
    $hr2b=$hr2-1;
    $smin2b=$smin2+60;
	echo "
	<table border='0' width='300' cellspacing='0' cellpadding='0'>
	<tr>
		<td align='right' width='125'>$tfont2<b>$hr2b</b></td>
		<td align='center' width='50'>$tfont2<b> : </b></td>
		<td align='left' width='125'>$tfont2<b>$smin2b</b></td>
	</tr>
	<tr>
		<td align='right'>$tfont2<b> -&nbsp;&nbsp;&nbsp; $hr1</b></td>
		<td align='center'>$tfont2<b> : </b></td>
		<td align='left' width='129'>$tfont2<b>$smin1</b></td>
	</tr>
	<tr>
		<td colspan='3' background='../../images/books-time-bar.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'>$tfont2<b>$dhr</b></td>
		<td align='center'>$tfont2<b> : </b></td>
		<td align='left' width='129'>$tfont2<b>$sdmin</b></td>
	</tr>
	</table>";
    echo "<br/>Thus, the elapsed time is ".$vio.$dhr." hours ".$black." and ".$vio.$dmin." minutes".$black.".";
	}

if($i==5 or $i==6){
    
    do {
		$min1 = rand(1,47);
		$min2 = rand(16,59);
		$hr1 = rand(1,10);
		$hr2 = rand(2,11);
		}
	while ($min1<=$min2+2);	
	if ($min1<10){$smin1="0".$min1;}else{$smin1=$min1;}
	if ($min2<10){$smin2="0".$min2;}else{$smin2=$min2;}
	$dmin=($min2+60)-$min1;
	if ($dmin<10){$sdmin="0".$dmin;}else{$sdmin=$dmin;}
	$dhr=$hr2+12-$hr1-1;
	echo $red."Example #".$i.$black."<br/><br/>An event started at ".$vio.$hr1.":".$smin1." am ".$black." and ended at ".$vio.$hr2.":".$smin2." pm".$black;
	echo ". Find the elapsed time.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    $mth=$hr2+12;
    echo "Convert ".$hr2.":".$smin2." pm into ".$mth.":".$smin2." hours.<br/><br/>";
    echo "Regroup ".$mth.":".$smin2." into ".($mth-1).":".($smin2+60).".<br/><br/>";
    echo "Subtract after regrouping:<br/><br/>";
    $hr2b=$mth-1;
    $smin2b=$smin2+60;
	echo "
	<table border='0' width='320' cellspacing='0' cellpadding='0'>
	<tr>
		<td align='right' width='140'>$tfont2<b>$hr2b</b></td>
		<td align='center' width='50'>$tfont2<b> : </b></td>
		<td align='left' width='130'>$tfont2<b>$smin2b</b></td>
	</tr>
	<tr>
		<td align='right'>$tfont2<b> -&nbsp;&nbsp; $hr1</b></td>
		<td align='center'>$tfont2<b> : </b></td>
		<td align='left' width='129'>$tfont2<b>$smin1</b></td>
	</tr>
	<tr>
		<td colspan='3' background='../../images/books-time-bar.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='right'>$tfont2<b>$dhr</b></td>
		<td align='center'>$tfont2<b> : </b></td>
		<td align='left' width='129'>$tfont2<b>$sdmin</b></td>
	</tr>
	</table>";
    echo "<br/>Thus, the elapsed time is ".$vio.$dhr." hours ".$black." and ".$vio.$dmin." minutes".$black.".";
	}
	
    
echo "</td></tr></table>";
if ($i<7){echo "<br/>";}
}
	
?>