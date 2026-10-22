<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=5; $i+=1){
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

$vio="<font color='#800080'>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'>";
$black="</b><font color='#000000'>";

$wests=array("04Caracas","05Lima","05New York","05Havana","06Chicago","06Dallas","06Mexico City","07Phoenix","07Denver","07Calgary","08Los Angeles",
	"08Vancouver","09Anchorage","10Honolulu");
$easts=array("02Cairo","02Beirut","02Athens","03Baghdad","03Doha","03Moscow","04Dubai","04Abu Dhabi", "05Karachi",
	"06Dhaka","07Bangkok","07Jakarta","07Hanoi","08Taipei","08Singapore","09Seoul","09Tokyo","10Melbourne","10Sydney");

$wcount=count($wests)-1;
$ecount=count($easts)-1;

if($i==1){
	$min = rand(1,59);
	do {$hr24 = rand(1,16);} while($hr24==12);
	if ($min<10){$smin="0".$min;} else{$smin=$min;}
	if ($hr24<12){$hr=$hr24; $t="am";} else{$hr=$hr24-12; $t="pm";}
	do{
		$east=$easts[rand(0,$ecount)];
		$hr242=$hr24+substr($east,0,2);
		}
	while($hr242>23 or $hr242==12);	
	$place=substr($east,2);
	$hrs=intval(substr($east,0,2));
	echo $red."Example #".$i.$black."<br/><br/>If the time in London is ".$vio.$hr.":".$smin." ".$t.$black.", what time is it in ".$place."?<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "From the table above, the time in $blue $place $black is $blue UTC+".$hrs.".$black";
    echo "The time in $place is therefore ".$hr.":".$smin." ".$t." plus ".$hrs." hours.<br/><br/>";
    $hr2=$hr24+$hrs;
	if ($hr2<12){$t2="am";} else{$hr2=$hr2-12; $t2="pm";}
    echo "Thus, the time in $place is ".$vio.$hr2.":".$smin." ".$t2.$black." if the time in London is ".$vio.$hr.":".$smin." ".$t.$black.".";
	}

if($i==2){
	$min = rand(1,59);
	do {$hr24 = rand(8,23);} while($hr24==12);
	if ($min<10){$smin="0".$min;} else{$smin=$min;}
	if ($hr24<12){$hr=$hr24; $t="am";} else{$hr=$hr24-12; $t="pm";}
	do{
		$west=$wests[rand(0,$wcount)];
		$hr242=$hr24-substr($west,0,2);
		}
	while($hr242>23 or $hr242==12 or $hr242<2);	
	$place=substr($west,2);
	$hrs=intval(substr($west,0,2));
	echo $red."Example #".$i.$black."<br/><br/>If the time in London is ".$vio.$hr.":".$smin." ".$t.$black.", what time is it in ".$place."?<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "From the table above, the time in $blue $place $black is $blue UTC-".$hrs."$black. ";
    echo "The time in $place is therefore ".$hr.":".$smin." ".$t." minus ".$hrs." hours.<br/><br/>";
    $hr2=$hr24-$hrs;
	if ($hr2<12){$t2="am";} else{$hr2=$hr2-12; $t2="pm";}
    echo "Thus, the time in $place is ".$vio.$hr2.":".$smin." ".$t2.$black." if the time in London is ".$vio.$hr.":".$smin." ".$t.$black.".";
	}
	
if($i==3){
	$min = rand(1,59);
	$hr24 = rand(1,20);
	if ($min<10){$smin="0".$min;} else{$smin=$min;}
	if ($hr24<12){$hr=$hr24; $t="am";} else{$hr=$hr24-12; $t="pm";}
	do{
		$east=$easts[rand(15,$ecount)];
		$hr242=$hr24+((substr($east,0,2))-8);
		}
	while($hr242>23 or $hr242==12);	
	$place=substr($east,2);
	$hrs=intval(substr($east,0,2));
	echo $red."Example #".$i.$black."<br/><br/>If the time in Manila is ".$vio.$hr.":".$smin." ".$t.$black.", what time is it in ".$place."?<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "From the table above, the time in $blue $place $black is $blue UTC+".$hrs."$black. ";
    echo "The time in $blue Manila $black is $blue UTC+8$black.<br/><br/>";
    echo "$place is therefore ahead of Manila by ".($hrs-8);
    if ($hrs-8>1){echo " hours.<br/><br/>";} else{echo " hour.<br/><br/>";}
    echo "The time in $place is therefore ".$hr.":".$smin." ".$t." plus ".($hrs-8);
    if ($hrs-8>1){echo " hours.<br/><br/>";} else{echo " hour.<br/><br/>";}
    $hr2=$hr24+$hrs-8;
	if ($hr2<12){$t2="am";} else{$hr2=$hr2-12; $t2="pm";}
    echo "Thus, the time in $place is ".$vio.$hr2.":".$smin." ".$t2.$black." if the time in Manila is ".$vio.$hr.":".$smin." ".$t.$black.".";
	}

if($i==4){
	$min = rand(1,59);
	do {$hr24 = rand(8,23);} while($hr24==12);
	if ($min<10){$smin="0".$min;} else{$smin=$min;}
	if ($hr24<12){$hr=$hr24; $t="am";} else{$hr=$hr24-12; $t="pm";}
	do{
		$east=$easts[rand(0,12)];
		$hr242=$hr24+((substr($east,0,2))-8);
		}
	while($hr242>23 or $hr242==12 or $hr242<2);	
	$place=substr($east,2);
	$hrs=intval(substr($east,0,2));
	echo $red."Example #".$i.$black."<br/><br/>If the time in Manila is ".$vio.$hr.":".$smin." ".$t.$black.", what time is it in ".$place."?<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "From the table above, the time in $blue $place $black is $blue UTC+".$hrs."$black. ";
    echo "The time in $blue Manila $black is $blue UTC+8$black.<br/><br/>";
    echo "$place is therefore behind Manila by ".(8-$hrs);
    if (8-$hrs>1){echo " hours.<br/><br/>";} else{echo " hour.<br/><br/>";}
    echo "The time in $place is therefore ".$hr.":".$smin." ".$t." minus ".(8-$hrs);
    if (8-$hrs>1){echo " hours.<br/><br/>";} else{echo " hour.<br/><br/>";}
    $hr2=$hr24-(8-$hrs);
	if ($hr2<12){$t2="am";} else{$hr2=$hr2-12; $t2="pm";}
    echo "Thus, the time in $place is ".$vio.$hr2.":".$smin." ".$t2.$black." if the time in Manila is ".$vio.$hr.":".$smin." ".$t.$black.".";
	}

if($i==5){
	$min = rand(1,59);
	$hr24 = rand(15,23);
	if ($min<10){$smin="0".$min;} else{$smin=$min;}
	if ($hr24<12){$hr=$hr24; $t="am";} else{$hr=$hr24-12; $t="pm";}
	do{
		$west=$wests[rand(0,$wcount)];
		$hr242=$hr24-(substr($west,0,2)+8);
		}
	while($hr242==12 or $hr242<2);	
	$place=substr($west,2);
	$hrs=intval(substr($west,0,2));
	echo $red."Example #".$i.$black."<br/><br/>If the time in Manila is ".$vio.$hr.":".$smin." ".$t.$black.", what time is it in ".$place."?<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "From the table above, the time in $blue $place $black is $blue UTC-".$hrs."$black. ";
    echo "The time in $blue Manila $black is $blue UTC+8$black.<br/><br/>";
    echo "$place is therefore behind Manila by ".(8+$hrs);
    if (8+$hrs>1){echo " hours.<br/><br/>";} else{echo " hour.<br/><br/>";}
    echo "The time in $place is therefore ".$hr.":".$smin." ".$t." minus ".(8+$hrs);
    if (8+$hrs>1){echo " hours.<br/><br/>";} else{echo " hour.<br/><br/>";}
    $hr2=$hr24-(8+$hrs);
	if ($hr2<12){$t2="am";} else{$hr2=$hr2-12; $t2="pm";}
    echo "Thus, the time in $place is ".$vio.$hr2.":".$smin." ".$t2.$black." if the time in Manila is ".$vio.$hr.":".$smin." ".$t.$black.".";
	}

    
echo "</td></tr></table>";
if ($i<6){echo "<br/>";}
}
	
?>