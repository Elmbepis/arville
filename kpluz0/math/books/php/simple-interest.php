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
	
	
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	$principal=rand(120,1500)*100;
	$rate=rand(4,25);
	$time=rand(2,5);
	$interest=$principal*$rate/100*$time;
	echo "<font color='#CC0000'><b>Example # 1</b><br/><br/>";
	echo "<font color='#000000'>Find the interest due if <font color='#0000CC'><b> &#8369; ".$principal."</b><font color='#000000'> was borrowed for ";
	echo "<font color='#0000CC'><b>".$time."</b><font color='#000000'> years at an interest rate of <font color='#0000CC'><b>".$rate."%</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>I = P x R x T<br/>";
	echo "= &#8369; ".$principal." x ".$rate."% x ".$time."<br/>";
	echo "= &#8369; ".$principal." x ".($rate/100)." x ".$time."<br/>";
	echo "= <font color='#800080'><b>&#8369; ".($principal*$rate/100*$time)."</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
		
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	$principal=rand(120,990)*100;
	$rate=rand(4,25);
	$time=rand(2,5);
	$interest=$principal*$rate/100*$time;
	echo "<font color='#CC0000'><b>Example # 2</b><br/><br/>";
	echo "<font color='#000000'>Find the interest rate if the simple interest amounted to <font color='#0000CC'><b>&#8369; ".$interest."</b><font color='#000000'> ";
	echo "for a principal of <font color='#0000CC'><b>&#8369; ".$principal."</b><font color='#000000'> borrowed for <font color='#0000CC'><b>".$time."</b><font color='#000000'> years.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>R = I / (P x T)<br/>";
	echo "= &#8369; ".$interest." / (&#8369; ".$principal." x ".$time.")<br/>";
	echo "= ".($interest/($principal*$time))." = <font color='#800080'><b>".$rate."%</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
	
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	$principal=rand(120,1500)*100;
	$rate=rand(4,25);
	$time=rand(2,5);
	$interest=$principal*$rate/100*$time;
	echo "<font color='#CC0000'><b>Example # 3</b><br/><br/>";
	echo "<font color='#000000'>Find the principal that was borrowed for <font color='#0000CC'><b>".$time."</b><font color='#000000'> years ";
	echo "at an interest rate of <font color='#0000CC'><b>".$rate."%</b><font color='#000000'> ";
	echo "if the simple interest reached <font color='#0000CC'><b> &#8369; ".$interest."</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>P = I / (R x T)<br/>";
	echo "= &#8369; ".$interest." / (".$rate."% x ".$time.")<br/>";
	echo "= &#8369; ".$interest." / (".($rate/100)." x ".$time.")<br/>";
	echo "= <font color='#800080'><b>&#8369; ".($interest/($rate/100*$time))."</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
	
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	$principal=rand(120,1500)*100;
	$rate=rand(4,25);
	$time=rand(2,5);
	$interest=$principal*$rate/100*$time;
	echo "<font color='#CC0000'><b>Example # 4</b><br/><br/>";
	echo "<font color='#000000'>If the simple interest for a loan amounted to <font color='#0000CC'><b> &#8369; ".$interest."</b><font color='#000000'>, ";
	echo "for how long was the principal of <font color='#0000CC'><b>&#8369; ".$principal."</b><font color='#000000'> borrowed ";
	echo "if the interest rate was <font color='#0000CC'><b>".$rate."%</b><font color='#000000'>?";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>T = I / (P x R)<br/>";
	echo "= &#8369; ".$interest." / (&#8369; ".$principal." x ".$rate."%/year)<br/>";
	echo "= &#8369; ".$interest." / (&#8369; ".$principal." x ".($rate/100)."/year)<br/>";
	echo "= <font color='#800080'><b>".($interest/($principal*($rate/100)))." years</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
		
	
	
?>