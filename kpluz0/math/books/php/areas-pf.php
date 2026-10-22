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

$squnits=array("sq inches","sq feet","sq meters");
$squnit=$squnits[rand(0,2)];
$unit=substr($squnit,3);

if(($i==1 and $grd==4) or ($grd==3 and $i<3)){
	$s = rand(11,35);
	if ($grd==3 and $i==1){$s = rand(2,10);}
	if ($grd==3 and $i==2){$s = rand(11,19);}
    $ans=$s*$s;
	echo $red."Example #".$i.$black."<br/><br/>Find the area of a square whose each side is ".$vio.$s.$black." $unit long.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "A = s<sup>2</sup><br/>";
    echo "A = $s $unit x $s $unit<br/>";
    echo "A = ".$ans." $squnit<br/>";
    echo "<br/>Thus, the area of a square whose each side is ".$s." $unit long is ".$vio.$ans." $squnit$black.";
	}

if(($i==2 and $grd==4) or ($grd==3 and $i>=3)){
	do{
		$l = rand(16,49);
		$w = rand(11,44);
		if ($grd==3 and $i==3){$l = rand(5,9);$w = rand(2,6);}
		if ($grd==3 and $i==4){$l = rand(10,15);$w = rand(7,12);}
		if ($grd==3 and $i==5){$l = rand(16,25);$w = rand(13,22);}
		}
	while ($l<=$w+2);		
    $ans=$l*$w;
	echo $red."Example #".$i.$black."<br/><br/>Find the area of a rectangle that is ".$vio.$l.$black." $unit long and ".$vio.$w.$black." $unit wide.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "A = L x W<br/>";
    echo "A = $l $unit x $w $unit<br/>";
    echo "A = ".$ans." $squnit<br/>";
    echo "<br/>Thus, the area of a rectangle that is $l $unit long and $w $unit wide is ".$vio.$ans." $squnit$black.";
	}

if($i==3 and $grd==4){
	$b = rand(11,49);
	$h = rand(11,49);
	if (rand(1,2)==1){$b=floor($b/2)*2;}
	else{$h=floor($h/2)*2;}
    $ans=($b*$h)/2;
	echo $red."Example #".$i.$black."<br/><br/>Find the area of a triangle whose base is ".$vio.$b.$black." $unit and whose height is ".$vio.$h.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "A = (b x h)/2<br/>";
    echo "A = ($b $unit x $h $unit)/2<br/>";
    echo "A = (".($b*$h)." $squnit)/2<br/>";
    echo "A = ".$ans." $squnit<br/>";
    echo "<br/>Thus, the area of a triangle whose base is ".$vio.$b.$black." $unit and whose height is ".$vio.$h.$black." $unit is ".$vio.$ans." $squnit$black.";
	}
	
if($i==4 and $grd==4){
	do {
		$a = rand(8,24);
		$b = rand(12,29);
		} 
	while ($b<$a+2 or ($a+$b)%2>0);
	$h = rand(11,29);
    $ans=($a+$b)/2*$h;
	echo $red."Example #".$i.$black."<br/><br/>Find the area of a trapezoid with bases of ".$vio.$a.$black." $unit and ".$vio.$b.$black." $unit and a height of ".$vio.$h.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "A = (a + b)/2 x h<br/>";
    echo "A = ($a $unit + $b $unit)/2 x $h $unit<br/>";
    echo "A = ".(($a+$b)/2)." $unit x $h $unit<br/>";
    echo "A = ".$ans." $squnit<br/>";
    echo "<br/>Thus, the area of a trapezoid with bases of ".$vio.$a.$black." $unit and ".$vio.$b.$black." $unit and a height of ".$vio.$h.$black." $unit is ".$vio.$ans." $squnit$black.";
	}
	
if(($i==5 and $grd==4) or $grd==5){
	$r = rand(7,25);
	if ($grd==5 and $i==1){$r = rand(2,7);}
	if ($grd==5 and $i==2){$r = rand(8,13);}
	if ($grd==5 and $i==3){$r = rand(14,19);}
	if ($grd==5 and $i==4){$r = rand(20,25);}
	if ($grd==5 and $i==5){$r = rand(26,31);}
	$d = $r*2;
    $ans=3.14*$r*$r;
    $opt=rand(1,2);
	if ($opt==1){echo $red."Example #".$i.$black."<br/><br/>Find the area of a circle whose radius is ".$vio.$r.$black." $unit.<br/><br/>";}
	else{echo $red."Example #".$i.$black."<br/><br/>Find the area of a circle whose diameter is ".$vio.$d.$black." $unit.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "A = 3.14 x r<sup>2</sup><br/>";
    if ($opt!=1){
    	echo "r = diameter/2<br/><br/>";
    	echo "r = $d $unit / 2 = $r $unit<br/>";
    	}
    echo "A = 3.14 x ($r $unit)<sup>2</sup><br/>";
    echo "A = 3.14 x ".($r*$r)." $squnit<br/>";
    echo "A = ".$ans." $squnit<br/>";
    if ($opt==1){echo "<br/>Thus, the area of a circle whose radius is $r $unit is ".$vio.$ans." $squnit$black.";}
    else{echo "<br/>Thus, the area of a circle whose diameter is $d $unit is ".$vio.$ans." $squnit$black.";}
	}
    
echo "</td></tr></table>";
if ($i<6){echo "<br/>";}
}
	
?>