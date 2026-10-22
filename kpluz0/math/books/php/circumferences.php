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

$units=array("inches", "centimeters", "feet","meters", "yards");
$unit=$units[rand(0,2)];

if($i%2!=0 and $i<5){
	$d=rand(25,99);
    $ans=3.14*$d;
	echo $red."Example #".$i.$black."<br/><br/>Find the circumference of a circle whose diameter is ".$vio.$d.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "C = 3.14 x D<br/>";
    echo "C = 3.14 x $d $unit<br/>";
    echo "C = ".$ans." $unit<br/>";
    echo "<br/>Thus, the circumference of a circle whose diameter is $d $unit is ".$vio.$ans." $unit$black.";
	}	
    
if($i%2==0 and $i<5){
	$r=rand(11,49);
    $ans=6.28*$r;
	echo $red."Example #".$i.$black."<br/><br/>Find the circumference of a circle whose radius is ".$vio.$r.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "C = 6.28 x r<br/>";
    echo "C = 6.28 x $r $unit<br/>";
    echo "C = ".$ans." $unit<br/>";
    echo "<br/>Thus, the circumference of a circle whose radius is $r $unit is ".$vio.$ans." $unit$black.";
	}	
	
if($i==5){
	$d=rand(25,99);
    $c=3.14*$d;
	echo $red."Example #".$i.$black."<br/><br/>Find the diameter of a circle whose circumference is ".$vio.$c.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "D = C / 3.14<br/>";
    echo "D = $c $unit / 3.14<br/>";
    echo "D = ".$d." $unit<br/>";
    echo "<br/>Thus, the diameter of a circle whose circumference is $c $unit is ".$vio.$d." $unit$black.";
	}	
	
if($i==6){
	$r=rand(11,49);
    $c=6.28*$r;
	echo $red."Example #".$i.$black."<br/><br/>Find the radius of a circle whose circumference is ".$vio.$c.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "r = C / 6.28<br/>";
    echo "r = $c $unit / 6.28<br/>";
    echo "r = ".$r." $unit<br/>";
    echo "<br/>Thus, the radius of a circle whose circumference is $c $unit is ".$vio.$r." $unit$black.";
	}	
    
    
echo "</td></tr></table>";
if ($i<6){echo "<br/>";}
}
	
?>