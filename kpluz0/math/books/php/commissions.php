<?php

$grd=$grd;
$format=$format;

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:36pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}
	
	
for ($i=1; $i<=2; $i+=1){

	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	$sale=rand(120,1500)*100;
	$rate=rand(4,35);
	$comm=$sale*$rate/100;
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+1)."</b><br/><br/>";
	echo "<font color='#000000'>How much commission would a person earn if he or she makes a sale amounting to <font color='#0000CC'><b> &#8369; ".$sale."</b><font color='#000000'> ";
	echo " at a commission rate of <font color='#0000CC'><b>".$rate."%</b><font color='#000000'>?";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Commission = Sales x Commission Rate<br/>";
	echo "= &#8369; ".$sale." x ".$rate."%<br/>";
	echo "= &#8369; ".$sale." x ".($rate/100)."<br/>";
	echo "= <font color='#800080'><b>&#8369; ".($sale*$rate/100)."</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
		
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	$sale=rand(120,1500)*100;
	$rate=rand(4,35);
	$comm=$sale*$rate/100;
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+2)."</b><br/><br/>";
	echo "<font color='#000000'>Find the commission rate if the total sale amounted to <font color='#0000CC'><b>&#8369; ".$sale."</b><font color='#000000'> ";
	echo "and the commission earned was <font color='#0000CC'><b>&#8369; ".$comm."</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Commission Rate = Commission / Sales<br/>";
	echo "= &#8369; ".$comm." / &#8369; ".$sale."<br/>";
	echo "= ".($comm/$sale)." = <font color='#800080'><b>".$rate."%</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
	
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	$sale=rand(120,1500)*100;
	$rate=rand(4,35);
	$comm=$sale*$rate/100;
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+3)."</b><br/><br/>";
	echo "<font color='#000000'>Find the total sales made by a salesperson who earned a commission of <font color='#0000CC'><b> &#8369; ".$comm."</b><font color='#000000'> ";
	echo "if the commission rate was <font color='#0000CC'><b>".$rate."%</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Total Sales = Commission / Commission Rate<br/>";
	echo "= &#8369; ".$comm." &divide; ".$rate."%<br/>";
	echo "= &#8369; ".$comm." &divide; ".($rate/100)."<br/>";
	echo "= <font color='#800080'><b>&#8369; ".(($comm/$rate)*100)."</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
		
	
	//if ($i<5){echo "<br/>";}
	
	}
	
?>