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
	
	// speed
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+1)."</b><br/><br/>";
	$opt=rand(1,2);
	if ($opt==1){
		if ($i<=1){$speed=rand(2,7); $time=rand(3,9);}
		else{
			if (rand(1,2)==1){
				do{$speed=rand(20,70)*.1; $time=rand(3,9);}
				while($speed==floor($speed));
				}
			else{
				do{$speed=rand(2,7); $time=rand(30,90)*.1;}
				while($time==floor($time));
				}
			}
		$distance=$speed*$time;
		if (rand(1,2)==1){
			echo "<font color='#000000'>A man walked <font color='#0000CC'> ".$distance." kilometers <font color='#000000'> ";
			echo "for <font color='#0000CC'>".$time." hours<font color='#000000'>. What was his average speed?";
			}
		else{
			echo "<font color='#000000'>If a hiker walked a distance of <font color='#0000CC'> ".$distance." kilometers <font color='#000000'> ";
			echo "within a period of <font color='#0000CC'>".$time." hours<font color='#000000'>, what was his average speed?";
			}
		}	
	if ($opt==2){
		if ($i<=1){$speed=rand(150,300); $time=rand(3,9);}
		else{
			if (rand(1,2)==1){
				do{$speed=rand(1500,3000)*.1; $time=rand(3,9);}
				while($speed==floor($speed));
				}
			else{
				do{$speed=rand(150,300); $time=rand(30,90)*.1;}
				while($time==floor($time));
				}
			}
		$distance=$speed*$time;
		if (rand(1,2)==1){
			echo "<font color='#000000'>A plane flew for <font color='#0000CC'> ".$time." hours<font color='#000000'>, ";
			echo "travelling a total distance of <font color='#0000CC'>".$distance." kilometers<font color='#000000'>. What was the plane's average speed?";
			}
		else{
			echo "<font color='#000000'>If a train travelled a distance of <font color='#0000CC'> ".$distance." kilometers<font color='#000000'> within ";
			echo "<font color='#0000CC'>".$time." hours<font color='#000000'>, what was its average speed?";
			}
		}	
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Speed = Distance / Time<br/>";
	echo "= ".$distance." kilometers / ".$time." hours<br/>";
	echo "= <font color='#800080'><b>".$speed." kph</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	// time
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+2)."</b><br/><br/>";
	$opt=rand(1,2);
	if ($opt==1){
		if ($i<=1){$speed=rand(2,7); $time=rand(3,9);}
		else{
			if (rand(1,2)==1){
				do{$speed=rand(20,70)*.1; $time=rand(3,9);}
				while($speed==floor($speed));
				}
			else{
				do{$speed=rand(2,7); $time=rand(30,90)*.1;}
				while($time==floor($time));
				}
			}
		$distance=$speed*$time;
		if (rand(1,2)==1){
			echo "<font color='#000000'>A man walked <font color='#0000CC'> ".$distance." kilometers <font color='#000000'> ";
			echo "at an average speed of <font color='#0000CC'>".$speed." kph<font color='#000000'>. How many hours did he walk?";
			}
		else{
			echo "<font color='#000000'>If a hiker walked a distance of <font color='#0000CC'> ".$distance." kilometers <font color='#000000'> ";
			echo "at an average speed of <font color='#0000CC'>".$speed." kph<font color='#000000'>, how much time did he spend walking?";
			}
		}	
	if ($opt==2){
		if ($i<=1){$speed=rand(150,300); $time=rand(3,9);}
		else{
			if (rand(1,2)==1){
				do{$speed=rand(1500,3000)*.1; $time=rand(3,9);}
				while($speed==floor($speed));
				}
			else{
				do{$speed=rand(150,300); $time=rand(30,90)*.1;}
				while($time==floor($time));
				}
			}
		$distance=$speed*$time;
		if (rand(1,2)==1){
			echo "<font color='#000000'>A plane flew at a speed of <font color='#0000CC'> ".$speed." kph<font color='#000000'>, ";
			echo "travelling a total distance of <font color='#0000CC'>".$distance." kilometers<font color='#000000'>. How many hours did the plane fly?";
			}
		else{
			echo "<font color='#000000'>If a train travelled a distance of <font color='#0000CC'> ".$distance." kilometers<font color='#000000'> at a speed of ";
			echo "<font color='#0000CC'>".$speed." kph<font color='#000000'>, how many hours did it spend travelling?";
			}
		}	
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Time = Distance / Speed<br/>";
	echo "= ".$distance." kilometers / ".$speed." kph<br/>";
	echo "= <font color='#800080'><b>".$time." hours</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	// distance
	echo "<font color='#CC0000'><b>Example #".(($i-1)*3+3)."</b><br/><br/>";
	$opt=rand(1,2);
	if ($opt==1){
		if ($i<=1){$speed=rand(2,7); $time=rand(3,9);}
		else{
			if (rand(1,2)==1){
				do{$speed=rand(20,70)*.1; $time=rand(3,9);}
				while($speed==floor($speed));
				}
			else{
				do{$speed=rand(2,7); $time=rand(30,90)*.1;}
				while($time==floor($time));
				}
			}
		$distance=$speed*$time;
		if (rand(1,2)==1){
			echo "<font color='#000000'>A man walked <font color='#0000CC'> at an average speed of ".$speed." kph <font color='#000000'> ";
			echo "for <font color='#0000CC'>".$time." hours<font color='#000000'>. What distance did he travel?";
			}
		else{
			echo "<font color='#000000'>If a hiker walked at an average speed of <font color='#0000CC'> ".$speed." kph <font color='#000000'> ";
			echo "for <font color='#0000CC'>".$time." hours<font color='#000000'>, how many kilometers did he walk?";
			}
		}	
	if ($opt==2){
		if ($i<=1){$speed=rand(150,300); $time=rand(3,9);}
		else{
			if (rand(1,2)==1){
				do{$speed=rand(1500,3000)*.1; $time=rand(3,9);}
				while($speed==floor($speed));
				}
			else{
				do{$speed=rand(150,300); $time=rand(30,90)*.1;}
				while($time==floor($time));
				}
			}
		$distance=$speed*$time;
		if (rand(1,2)==1){
			echo "<font color='#000000'>A plane flew for <font color='#0000CC'> ".$time." hours<font color='#000000'> at ";
			echo "a speed of <font color='#0000CC'>".$speed." kph<font color='#000000'>. How many kilometers did the plane fly?";
			}
		else{
			echo "<font color='#000000'>If a train travelled at an average speed of <font color='#0000CC'> ".$speed." kph<font color='#000000'> for ";
			echo "<font color='#0000CC'>".$time." hours<font color='#000000'>, how many kilometers did it travel?";
			}
		}	
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Distance = Speed x Time<br/>";
	echo "= ".$speed." kph x ".$time." hours<br/>";
	echo "= <font color='#800080'><b>".$distance." kilometers</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
		
	
	}
	
?>