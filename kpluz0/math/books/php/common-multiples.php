<?php

$grd=$grd;
$format=$format;


for ($m=1; $m<=3; $m+=1){
	$cmults="";
	$mults1="";
	$mults2="";
	$k=0;
	if ($m==1){$nums = array(2,3,4,5,6,8,9,10);}
	if ($m==2){$nums = array(4,6,7,8,9,11,12,15);}
	if ($m==3){$nums = array(7,8,9,11,12,13,14,15,16);}
	$count=count($nums)-1;
	$number1=$nums[rand(0,$count)];
	do{$number2=$nums[rand(0,$count)];}while($number2%$number1==0 or $number1%$number2==0);
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; $tfont2="<span lang='EN-US' style='font-size:16pt;color:#C00000'>"; echo $tfont1;}
	else{$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; $tfont2="<span lang='EN-US' style='font-size:36pt;color:#C00000'>"; echo $tfont1;}
	echo "<font color='#CC0000'><b>Example #".$m."</b><br/><br/>";
	echo "<font color='#000000'>Let's find the common multiples of ".$number1." and ".$number2.".";
	//Step 1
	echo "<font color='#800080'><br/><br/>Step 1<font color='#000000'>";
	echo "<br/><br/>Here are the multiples of ".$number1." and ".$number2.":<br/>";
	echo "<table width='100%'>";
	for ($i=1; $i<=200; $i+=1){
		$mult1=$number1*$i;
		$mult2=$number2*$i;
		if ($mult1%$number2==0){echo "<tr><td align='left' width='50%'>".$tfont1.$number1." x ".$i." = <b>".$tfont2.$mult1.$tfont1."</b></td>";}
		else{echo "<tr><td align='left' width='50%'>".$tfont1.$number1." x ".$i." = ".$mult1."</td>";}
		if ($mult2%$number1==0){echo "<td align='left' width='50%'>".$tfont1.$number2." x ".$i." = <b>".$tfont2.$mult2.$tfont1."</b></td></tr>";}
		else{echo "<td align='left' width='50%'>".$tfont1.$number2." x ".$i." = ".$mult2."</td></tr>";}
		$mult1b=$mult1." ";
		$mult2b=$mult2." ";
		$mults1=$mults1.$mult1b;
		$mults2=$mults2.$mult2b;
		if (strpos($mults1,$mult2b)>0 and $mult2%$number1==0){$cmults=$cmults.$mult2.", "; $k=$k+1;}
		if (strpos($mults2,$mult1b)>0 and $mult1%$number2==0){$cmults=$cmults.$mult1.", "; $k=$k+1;}
		if ($k>=3){$i=201;}
		}
	echo "</table>";	
	//Step 2
	echo "<font color='#800080'><br/>Step 2<font color='#000000'>";
	echo "<br/><br/>From the lists above, the first 3 common multiples of ".$number1." and ".$number2." are: ";
	$cmults=substr($cmults,0,(strlen($cmults)-2));	
	echo $cmults.".<br/>";
	
	echo "</td></tr></table><br/>";

	}
?>