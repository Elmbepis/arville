<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=4; $i+=1){
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
	$t1 = rand(2,7);
	$t2 = rand(8,15);
	$t3 = rand(16,25);
	$a1=$t1*1000;
	$a2=$t2*1000;
	$a3=$t3*1000;
	echo $red."Example # $i :<br/></b>Liters into Milliliters$black<br/><br/>Convert $t1 liters, $t2 liters, and $t3 liters into milliliters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 milliliters in one liter, we simply need to multiply the number of liters by 1000 to get the number of milliliters. Thus:<br/><br/>";
    echo "$t1 L = ($t1 x 1000) ml = $vio $a1 ml$black<br/>";
    echo "$t2 L = ($t2 x 1000) ml = $vio $a2 ml$black<br/>";
    echo "$t3 L = ($t3 x 1000) ml = $vio $a3 ml$black<br/>";
	}

if($i==2){
	$a1 = rand(2,7);
	$a2 = rand(8,15);
	$a3 = rand(16,25);
	$t1=$a1*1000;
	$t2=$a2*1000;
	$t3=$a3*1000;
	echo $red."Example # $i :<br/></b>Milliliters into Liters$black<br/><br/>Convert $t1 milliliters, $t2 milliliters, and $t3 milliliters into liters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 milliliters in one liter, we simply need to divide the number of milliliters by 1000 to get the number of liters. Thus:<br/><br/>";
    echo "$t1 ml = ($t1 &div; 1000) L<br/>= $vio $a1 L$black<br/><br/>";
    echo "$t2 ml = ($t2 &div; 1000) L<br/>= $vio $a2 L$black<br/><br/>";
    echo "$t3 ml = ($t3 &div; 1000) L<br/>= $vio $a3 L$black<br/>";
	}
    
if($i==3){
	$t1 = rand(5,12);
	$t2 = rand(13,25);
	$t3 = rand(26,50);
	$a1=$t1*1000;
	$a2=$t2*1000;
	$a3=$t3*1000;
	echo $red."Example # $i :<br/></b>Liters into Milliliters$black<br/><br/>Convert $t1 liters, $t2 liters, and $t3 liters into milliliters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 milliliters in one liter, we simply need to multiply the number of liters by 1000 to get the number of milliliters. Thus:<br/><br/>";
    echo "$t1 L = ($t1 x 1000) ml = $vio $a1 ml$black<br/>";
    echo "$t2 L = ($t2 x 1000) ml = $vio $a2 ml$black<br/>";
    echo "$t3 L = ($t3 x 1000) ml = $vio $a3 ml$black<br/>";
	}

if($i==4){
	$a1 = rand(5,12);
	$a2 = rand(13,25);
	$a3 = rand(26,50);
	$t1=$a1*1000;
	$t2=$a2*1000;
	$t3=$a3*1000;
	echo $red."Example # $i :<br/></b>Milliliters into Liters$black<br/><br/>Convert $t1 milliliters, $t2 milliliters, and $t3 milliliters into liters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 milliliters in one liter, we simply need to divide the number of milliliters by 1000 to get the number of liters. Thus:<br/><br/>";
    echo "$t1 ml = ($t1 &div; 1000) L<br/>= $vio $a1 L$black<br/><br/>";
    echo "$t2 ml = ($t2 &div; 1000) L<br/>= $vio $a2 L$black<br/><br/>";
    echo "$t3 ml = ($t3 &div; 1000) L<br/>= $vio $a3 L$black<br/>";
	}
    
echo "</td></tr></table>";
if ($i<5){echo "<br/>";}
}
	
?>