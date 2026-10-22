<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=18; $i+=1){
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

if($i==1){
	$t1 = rand(2,10);
	$t2 = rand(11,20);
	$t3 = rand(21,30);
	$a1=$t1*60;
	$a2=$t2*60;
	$a3=$t3*60;
	echo $red."Example # $i :<br/></b>Minutes into Seconds$black<br/><br/>Convert $t1 minutes, $t2 minutes, and $t3 minutes into seconds.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 60 seconds in one minute, we simply need to multiply the number of minutes by 60 to get the number of seconds. Thus:<br/><br/>";
    echo "$t1 min = ($t1 x 60) s = $vio $a1 s$black<br/>";
    echo "$t2 min = ($t2 x 60) s = $vio $a2 s$black<br/>";
    echo "$t3 min = ($t3 x 60) s = $vio $a3 s$black<br/>";
	}

if($i==2){
	$a1 = rand(2,10);
	$a2 = rand(11,20);
	$a3 = rand(21,30);
	$t1=$a1*60;
	$t2=$a2*60;
	$t3=$a3*60;
	echo $red."Example # $i :<br/></b>Seconds into Minutes$black<br/><br/>Convert $t1 seconds, $t2 seconds, and $t3 seconds into minutes.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 60 seconds in one minute, we simply need to divide the number of seconds by 60 to get the number of minutes. Thus:<br/><br/>";
    echo "$t1 s = ($t1 &div; 60) min = $vio $a1 min$black<br/>";
    echo "$t2 s = ($t2 &div; 60) min = $vio $a2 min$black<br/>";
    echo "$t3 s = ($t3 &div; 60) min = $vio $a3 min$black<br/>";
	}

if($i==3){
	$t1 = rand(2,10);
	$t2 = rand(11,20);
	$t3 = rand(21,30);
	$a1=$t1*60;
	$a2=$t2*60;
	$a3=$t3*60;
	echo $red."Example # $i :<br/></b>Hours into Minutes$black<br/><br/>Convert $t1 hours, $t2 hours, and $t3 hours into minutes.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 60 minutes in one hour, we simply need to multiply the number of hours by 60 to get the number of minutes. Thus:<br/><br/>";
    echo "$t1 h = ($t1 x 60) min = $vio $a1 min$black<br/>";
    echo "$t2 h = ($t2 x 60) min = $vio $a2 min$black<br/>";
    echo "$t3 h = ($t3 x 60) min = $vio $a3 min$black<br/>";
	}

if($i==4){
	$a1 = rand(2,10);
	$a2 = rand(11,20);
	$a3 = rand(21,30);
	$t1=$a1*60;
	$t2=$a2*60;
	$t3=$a3*60;
	echo $red."Example # $i :<br/></b>Minutes into Hours$black<br/><br/>Convert $t1 minutes, $t2 minutes, and $t3 minutes into hours.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 60 minutes in one hour, we simply need to divide the number of minutes by 60 to get the number of hours. Thus:<br/><br/>";
    echo "$t1 min = ($t1 &div; 60) h = $vio $a1 h$black<br/>";
    echo "$t2 min = ($t2 &div; 60) h = $vio $a2 h$black<br/>";
    echo "$t3 min = ($t3 &div; 60) h = $vio $a3 h$black<br/>";
	}

if($i==5){
	$t1 = rand(2,7);
	$t2 = rand(8,15);
	$t3 = rand(16,25);
	$a1=$t1*24;
	$a2=$t2*24;
	$a3=$t3*24;
	echo $red."Example # $i :<br/></b>Days into Hours$black<br/><br/>Convert $t1 days, $t2 days, and $t3 days into hours.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 24 hours in one day, we simply need to multiply the number of days by 24 to get the number of hours. Thus:<br/><br/>";
    echo "$t1 d = ($t1 x 24) h = $vio $a1 h$black<br/>";
    echo "$t2 d = ($t2 x 24) h = $vio $a2 h$black<br/>";
    echo "$t3 d = ($t3 x 24) h = $vio $a3 h$black<br/>";
	}

if($i==6){
	$a1 = rand(2,7);
	$a2 = rand(8,15);
	$a3 = rand(16,25);
	$t1=$a1*24;
	$t2=$a2*24;
	$t3=$a3*24;
	echo $red."Example # $i :<br/></b>Hours into Days$black<br/><br/>Convert $t1 hours, $t2 hours, and $t3 hours into days.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 24 hours in one day, we simply need to divide the number of hours by 24 to get the number of days. Thus:<br/><br/>";
    echo "$t1 h = ($t1 &div; 24) d = $vio $a1 d$black<br/>";
    echo "$t2 h = ($t2 &div; 24) d = $vio $a2 d$black<br/>";
    echo "$t3 h = ($t3 &div; 24) d = $vio $a3 d$black<br/>";
	}

if($i==7){
	$t1 = rand(3,19);
	$t2 = rand(20,50);
	$t3 = rand(51,99);
	$a1=$t1*7;
	$a2=$t2*7;
	$a3=$t3*7;
	echo $red."Example # $i :<br/></b>Weeks into Days$black<br/><br/>Convert $t1 weeks, $t2 weeks, and $t3 weeks into days.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 7 days in one week, we simply need to multiply the number of weeks by 7 to get the number of days. Thus:<br/><br/>";
    echo "$t1 wks = ($t1 x 7) d = $vio $a1 d$black<br/>";
    echo "$t2 wks = ($t2 x 7) d = $vio $a2 d$black<br/>";
    echo "$t3 wks = ($t3 x 7) d = $vio $a3 d$black<br/>";
	}

if($i==8){
	$a1 = rand(3,19);
	$a2 = rand(20,50);
	$a3 = rand(51,99);
	$t1=$a1*7;
	$t2=$a2*7;
	$t3=$a3*7;
	echo $red."Example # $i :<br/></b>Days into Weeks$black<br/><br/>Convert $t1 days, $t2 days, and $t3 days into weeks.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 7 days in one week, we simply need to divide the number of days by 7 to get the number of weeks. Thus:<br/><br/>";
    echo "$t1 d = ($t1 &div; 7) wks = $vio $a1 wks$black<br/>";
    echo "$t2 d = ($t2 &div; 7) wks = $vio $a2 wks$black<br/>";
    echo "$t3 d = ($t3 &div; 7) wks = $vio $a3 wks$black<br/>";
	}

if($i==9){
	$t1 = rand(2,6);
	$t2 = rand(7,15);
	$t3 = rand(16,25);
	$a1=$t1*30;
	$a2=$t2*30;
	$a3=$t3*30;
	echo $red."Example # $i :<br/></b>Months into Days$black<br/><br/>Convert $t1 months, $t2 months, and $t3 months into days.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are about 30 days in one month, we simply need to multiply the number of months by 30 to estimate the number of days. Thus:<br/><br/>";
    echo "$t1 mos = ($t1 x 30) d = $vio $a1 d$black<br/>";
    echo "$t2 mos = ($t2 x 30) d = $vio $a2 d$black<br/>";
    echo "$t3 mos = ($t3 x 30) d = $vio $a3 d$black<br/>";
	}

if($i==10){
	$a1 = rand(2,6);
	$a2 = rand(7,15);
	$a3 = rand(16,25);
	$t1=$a1*30;
	$t2=$a2*30;
	$t3=$a3*30;
	echo $red."Example # $i :<br/></b>Days into Months$black<br/><br/>Convert $t1 days, $t2 days, and $t3 days into months.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are about 30 days in one month, we simply need to divide the number of days by 30 to estimate the number of months. Thus:<br/><br/>";
    echo "$t1 d = ($t1 &div; 30) mos= $vio $a1 mos$black<br/>";
    echo "$t2 d = ($t2 &div; 30) mos= $vio $a2 mos$black<br/>";
    echo "$t3 d = ($t3 &div; 30) mos= $vio $a3 mos$black<br/>";
	}

if($i==11){
	$t1 = rand(2,6);
	$t2 = rand(7,15);
	$t3 = rand(16,25);
	$a1=$t1*365;
	$a2=$t2*365;
	$a3=$t3*365;
	echo $red."Example # $i :<br/></b>Years into Days$black<br/><br/>Convert $t1 years, $t2 years, and $t3 years into days.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 365 days in one year, we simply need to multiply the number of years by 365 to get the number of days. Thus:<br/><br/>";
    echo "$t1 yrs = ($t1 x 365) d = $vio $a1 d$black<br/>";
    echo "$t2 yrs = ($t2 x 365) d = $vio $a2 d$black<br/>";
    echo "$t3 yrs = ($t3 x 365) d = $vio $a3 d$black<br/>";
	}

if($i==12){
	$a1 = rand(2,6);
	$a2 = rand(7,15);
	$a3 = rand(16,25);
	$t1=$a1*365;
	$t2=$a2*365;
	$t3=$a3*365;
	echo $red."Example # $i :<br/></b>Days into Years$black<br/><br/>Convert $t1 days, $t2 days, and $t3 days into years.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 365 days in one year, we simply need to divide the number of days by 365 to get the number of years. Thus:<br/><br/>";
    echo "$t1 d = ($t1 &div; 365) yrs = $vio $a1 yrs$black<br/>";
    echo "$t2 d = ($t2 &div; 365) yrs = $vio $a2 yrs$black<br/>";
    echo "$t3 d = ($t3 &div; 365) yrs = $vio $a3 yrs$black<br/>";
	}

if($i==13){
	$t1 = rand(2,6);
	$t2 = rand(7,15);
	$t3 = rand(16,25);
	$a1=$t1*4;
	$a2=$t2*4;
	$a3=$t3*4;
	echo $red."Example # $i :<br/></b>Months into Weeks$black<br/><br/>Convert $t1 months, $t2 months, and $t3 months into weeks.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "There are actually about 4 1/3 weeks in one month.<br/><br/>";
    echo "Let's just multiply the number of months by 4 to estimate the number of weeks. Thus:<br/><br/>";
    echo "$t1 mos = ($t1 x 4) wks = $vio $a1 wks$black<br/>";
    echo "$t2 mos = ($t2 x 4) wks = $vio $a2 wks$black<br/>";
    echo "$t3 mos = ($t3 x 4) wks = $vio $a3 wks$black<br/>";
	}

if($i==14){
	$a1 = rand(2,6);
	$a2 = rand(7,15);
	$a3 = rand(16,25);
	$t1=$a1*4;
	$t2=$a2*4;
	$t3=$a3*4;
	echo $red."Example # $i :<br/></b>Weeks into Months$black<br/><br/>Convert $t1 weeks, $t2 weeks, and $t3 weeks into months.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "There are actually about 4 1/3 weeks in one month.<br/><br/>";
    echo "Let's just divide the number of weeks by 4 to estimate the number of months. Thus:<br/><br/>";
    echo "$t1 wks = ($t1 &div; 4) mos = $vio $a1 mos$black<br/>";
    echo "$t2 wks = ($t2 &div; 4) mos = $vio $a2 mos$black<br/>";
    echo "$t3 wks = ($t3 &div; 4) mos = $vio $a3 mos$black<br/>";
	}
	
if($i==15){
	$t1 = rand(2,6);
	$t2 = rand(7,15);
	$t3 = rand(16,25);
	$a1=$t1*52;
	$a2=$t2*52;
	$a3=$t3*52;
	echo $red."Example # $i :<br/></b>Years into Weeks$black<br/><br/>Convert $t1 years, $t2 years, and $t3 years into weeks.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are about 52 weeks in one year, we simply need to multiply the number of years by 52 to estimate the number of weeks. Thus:<br/><br/>";
    echo "$t1 yrs = ($t1 x 52) wks = $vio $a1 wks$black<br/>";
    echo "$t2 yrs = ($t2 x 52) wks = $vio $a2 wks$black<br/>";
    echo "$t3 yrs = ($t3 x 52) wks = $vio $a3 wks$black<br/>";
	}

if($i==16){
	$a1 = rand(2,6);
	$a2 = rand(7,15);
	$a3 = rand(16,25);
	$t1=$a1*52;
	$t2=$a2*52;
	$t3=$a3*52;
	echo $red."Example # $i :<br/></b>Weeks into Years$black<br/><br/>Convert $t1 weeks, $t2 weeks, and $t3 weeks into years.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are about 52 weeks in one year, we simply need to divide the number of weeks by 52 to estimate the number of years. Thus:<br/><br/>";
    echo "$t1 wks = ($t1 &div; 52) yrs = $vio $a1 yrs$black<br/>";
    echo "$t2 wks = ($t2 &div; 52) yrs = $vio $a2 yrs$black<br/>";
    echo "$t3 wks = ($t3 &div; 52) yrs = $vio $a3 yrs$black<br/>";
	}
	
if($i==17){
	$t1 = rand(2,6);
	$t2 = rand(7,15);
	$t3 = rand(16,25);
	$a1=$t1*12;
	$a2=$t2*12;
	$a3=$t3*12;
	echo $red."Example # $i :<br/></b>Years into Months$black<br/><br/>Convert $t1 years, $t2 years, and $t3 years into months.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 12 months in one year, we simply need to multiply the number of years by 12 to get the number of months. Thus:<br/><br/>";
    echo "$t1 yrs = ($t1 x 12) mos = $vio $a1 mos$black<br/>";
    echo "$t2 yrs = ($t2 x 12) mos = $vio $a2 mos$black<br/>";
    echo "$t3 yrs = ($t3 x 12) mos = $vio $a3 mos$black<br/>";
	}

if($i==18){
	$a1 = rand(2,6);
	$a2 = rand(7,15);
	$a3 = rand(16,25);
	$t1=$a1*12;
	$t2=$a2*12;
	$t3=$a3*12;
	echo $red."Example # $i :<br/></b>Months into Years$black<br/><br/>Convert $t1 months, $t2 months, and $t3 months into years.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 12 months in one year, we simply need to divide the number of months by 12 to get the number of years. Thus:<br/><br/>";
    echo "$t1 mos = ($t1 &div; 12) yrs = $vio $a1 yrs$black<br/>";
    echo "$t2 mos = ($t2 &div; 12) yrs = $vio $a2 yrs$black<br/>";
    echo "$t3 mos = ($t3 &div; 12) yrs = $vio $a3 yrs$black<br/>";
	}
    
echo "</td></tr></table>";
if ($i<19){echo "<br/>";}
}
	
?>