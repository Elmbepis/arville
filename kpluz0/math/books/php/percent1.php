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
	
	
for ($i=1; $i<=4; $i+=1){

	if ($i==1){do {$lim1=1; $lim2=9; $rate=rand($lim1,$lim2)*10; $base=rand(3,30)*10; $pct=$base*$rate/100;} while (($pct-floor($pct))!=0);}
	if ($i==2){do {$lim1=1; $lim2=19; $rate=rand($lim1,$lim2)*5; $base=rand(3,30)*10; $pct=$base*$rate/100;} while (($pct-floor($pct))!=0);}
	if ($i==3){$lim1=1; $lim2=19; $rate=rand($lim1,$lim2)*5; $base=rand(3,30)*10; $pct=$base*$rate/100;}
	if ($i==4){$lim1=1; $lim2=100; $rate=rand($lim1,$lim2); $base=rand(40,500); $pct=$base*$rate/100;}
	//if ($i==5){$lim1=111; $lim2=999; $rate=rand($lim1,$lim2)*.1; $base=rand(111,999); $pct=$base*$rate/100;}

	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+1)."</b><br/><br/>";
	echo "<font color='#000000'>Find the percentage if the base is <font color='#0000CC'><b>".$base."</b><font color='#000000'> ";
	echo "and the rate is <font color='#0000CC'><b>".$rate."%</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><b><font color='#0000CC'>P = B x R</b><font color='#000000'><br/>";
	echo "P = ".$base." x ".$rate."%<br/>";
	echo "P = ".$base." x ".($rate/100)."<br/>";
	echo "P = <font color='#800080'><b>".($base*$rate/100)."</b><font color='#000000'>";
	
	echo "</td></tr></table><br/>";
	
	if ($i==1){do {$lim1=1; $lim2=9; $rate=rand($lim1,$lim2)*10; $base=rand(3,30)*10; $pct=$base*$rate/100;} while (($pct-floor($pct))!=0);}
	if ($i==2){do {$lim1=1; $lim2=19; $rate=rand($lim1,$lim2)*5; $base=rand(3,30)*10; $pct=$base*$rate/100;} while (($pct-floor($pct))!=0);}
	if ($i==3){$lim1=1; $lim2=19; $rate=rand($lim1,$lim2)*5; $base=rand(3,30)*10; $pct=$base*$rate/100;}
	if ($i==4){$lim1=1; $lim2=100; $rate=rand($lim1,$lim2); $base=rand(40,500); $pct=$base*$rate/100;}
	//if ($i==5){$lim1=111; $lim2=999; $rate=rand($lim1,$lim2)*.1; $base=rand(111,999); $pct=$base*$rate/100;}
	
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+2)."</b><br/><br/>";
	echo "<font color='#000000'>Find the rate if the base is <font color='#0000CC'><b>".$base."</b><font color='#000000'> ";
	echo "and the percentage is <font color='#0000CC'><b>".$pct."</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><b><font color='#0000CC'>R = P / B</b><font color='#000000'><br/>";
	echo "R = ".$pct." / ".$base."<br/>";
	echo "R = ".($pct/$base)." = <font color='#800080'><b>".$rate."%</b><font color='#000000'>";

	echo "</td></tr></table><br/>";
	
	if ($i==1){do {$lim1=1; $lim2=9; $rate=rand($lim1,$lim2)*10; $base=rand(3,30)*10; $pct=$base*$rate/100;} while (($pct-floor($pct))!=0);}
	if ($i==2){do {$lim1=1; $lim2=19; $rate=rand($lim1,$lim2)*5; $base=rand(3,30)*10; $pct=$base*$rate/100;} while (($pct-floor($pct))!=0);}
	if ($i==3){$lim1=1; $lim2=19; $rate=rand($lim1,$lim2)*5; $base=rand(3,30)*10; $pct=$base*$rate/100;}
	if ($i==4){$lim1=1; $lim2=100; $rate=rand($lim1,$lim2); $base=rand(40,500); $pct=$base*$rate/100;}
	//if ($i==5){$lim1=111; $lim2=999; $rate=rand($lim1,$lim2)*.1; $base=rand(111,999); $pct=$base*$rate/100;}
	
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+3)."</b><br/><br/>";
	echo "<font color='#000000'>Find the base if the rate is <font color='#0000CC'><b>".$rate."%</b><font color='#000000'> ";
	echo "and the percentage is <font color='#0000CC'><b>".$pct."</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><b><font color='#0000CC'>B = P / R</b><font color='#000000'><br/>";
	echo "B = ".$pct." / ".$rate."%<br/>";
	echo "B = ".$pct." / ".($rate/100)."<br/>";
	echo "B = <font color='#800080'><b>".($pct/$rate*100)."</b><font color='#000000'>";

	echo "</td></tr></table><br/>";
	
	
	
	
	//if ($i<5){echo "<br/>";}
	
	}
	
?>