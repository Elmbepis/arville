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

$vio="<font color='#800080'><b>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'><b>";
$black="</b><font color='#000000'>";

$units=array("inches", "centimeters", "feet","meters", "yards");
$unit=$units[rand(0,2)];

if($i==1){
	$s = rand(11,49);
    $ans=4*$s;
	echo $red."Example #".$i.$black."<br/><br/>Find the perimeter of a square whose each side is ".$vio.$s.$black." $unit long.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "P = 4 x S<br/>";
    echo "P = 4 x ".$s." $unit<br/>";
    echo "P = ".$ans." $unit<br/>";
    echo "<br/>Thus, the perimeter of a square whose each side is ".$s." $unit long is ".$vio.$ans." $unit$black.";
	}

if($i==2){
	do{
		$l = rand(16,49);
		$w = rand(11,44);
		}
	while ($l<=$w+2);		
    $ans=2*($l+$w);
	echo $red."Example #".$i.$black."<br/><br/>Find the perimeter of a rectangle that is ".$vio.$l.$black." $unit long and ".$vio.$w.$black." $unit wide.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "P = 2 x (L + W)<br/>";
    echo "P = 2 x (".$l." + ".$w.") $unit<br/>";
    echo "P = ".$ans." $unit<br/>";
    echo "<br/>Thus, the perimeter of a rectangle that is $l $unit long and $w $unit wide is ".$vio.$ans." $unit$black.";
	}

if($i==3){
	do{
		$a = rand(16,29);
		$b = rand(16,29);
		$c = rand(30,56);
		}
	while ($c>($a+$b-3) or $c<=$a+2 or $c<=$b+2);		
    $ans=$a+$b+$c;
	echo $red."Example #".$i.$black."<br/><br/>Find the perimeter of a triangle whose sides are ".$vio.$a.$black.", ".$vio.$b.$black.", and ".$vio.$c.$black;
	echo " $unit long.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "P = A + B + C<br/>";
    echo "P = ($a + $b + $c) $unit<br/>";
    echo "P = ".$ans." $unit<br/>";
    echo "<br/>Thus, the perimeter of a triangle whose sides are ".$vio.$a.$black.", ".$vio.$b.$black.", and ".$vio.$c.$black." $unit long is ".$vio.$ans." $unit$black.";
	}

if($i==4){
	$d = rand(11,49);
    $ans=3.14*$d;
	echo $red."Example #".$i.$black."<br/><br/>Find the circumference of a circle whose diameter is ".$vio.$d.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "C = 3.14 x D<br/>";
    echo "C = 3.14 x $d $unit<br/>";
    echo "C = ".$ans." $unit<br/>";
    echo "<br/>Thus, the circumference of a circle whose diameter is $d $unit is ".$vio.$ans." $unit$black.";
	}

if($i==5){
	$n = rand(6,15);
	$s = rand(11,49);
    $ans=$n*$s;
	echo $red."Example #".$i.$black."<br/><br/>Find the perimeter of a regular plane figure with ".$vio.$n.$black." straight sides, ";
	echo "each of which is ".$vio.$s.$black." $unit long.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "P = N x S<br/>";
    echo "P = $n x $s $unit<br/>";
    echo "P = ".$ans." $unit<br/>";
    echo "<br/>Thus, the perimeter of a regular plane figure with $n straight sides that are ";
	echo "each $s $unit long is ".$vio.$ans." $unit$black.";
	}
	
    
echo "</td></tr></table>";
if ($i<6){echo "<br/>";}
}
	
?>