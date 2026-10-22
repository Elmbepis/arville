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

if($i==1){
	$s = rand(11,35);
    $ans=6*$s*$s;
	echo $red."Example #".$i.$black."<br/><br/>Find the surface area of a cube whose each side is ".$vio.$s.$black." $unit long.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "SA = 6 x s<sup>2</sup><br/><br/>";
    echo "SA = 6 x $s $unit x $s $unit<br/><br/>";
    echo "SA = ".$ans." $squnit<br/>";
    echo "<br/>Thus, the surface area of a cube whose each side is ".$s." $unit long is ".$vio.$ans." $squnit$black.";
	}

if($i==2){
	do{
		$l = rand(16,49);
		$w = rand(11,44);
		$h = rand(11,44);
		}
	while ($l<=$w+2 or $l<=$h+2);		
    $ans=2*$l*$w+2*$l*$h+2*$w*$h;
	echo $red."Example #".$i.$black."<br/><br/>Find the surface area of a rectangular prism that is ".$vio.$l.$black." $unit long, ";
	echo $vio.$w.$black." $unit wide, and ".$vio.$h.$black." $unit high.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "SA = 2 x L x W + 2 x L x H +<br/>2 x W x H<br/><br/>";
    echo "SA = 2 x $l $unit x $w $unit +<br/>2 x $l $unit x $h $unit +<br/>2 x $w $unit x $h $unit<br/><br/>";
    echo "SA = ".(2*$l*$w)." $squnit + ".(2*$l*$h)." $squnit + ".(2*$w*$h)." $squnit<br/><br/>";
    echo "SA = ".$ans." $squnit<br/><br/>";
    echo "Thus, the surface area of a rectangular prism that is $l $unit long, $w $unit wide, and $h $unit high is ".$vio.$ans." $squnit$black.";
	}

if($i==3){
	$r = rand(5,19);
	$h = rand(7,24);
    $ans=2*3.14*pow($r,2)+2*3.14*$r*$h;
	echo $red."Example #".$i.$black."<br/><br/>Find the surface area of a cylinder whose radius is ".$vio.$r.$black." $unit and whose height is ".$vio.$h.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "SA = 2 x &pi; x r<sup>2</sup> + 2 x &pi; x r x h<br/><br/>";
    echo "SA = 2 x 3.14 x ($r $unit)<sup>2</sup> +<br/>2 x 3.14 x $r $unit x $h $unit<br/><br/>";
    echo "SA = ".(2*3.14*$r*$r)." $squnit +<br/>".(2*3.14*$r*$h)." $squnit<br/><br/>";
    echo "SA = ".$ans." $squnit<br/>";
    echo "<br/>Thus, the surface area of a cylinder whose radius is ".$vio.$r.$black." $unit and whose height is ".$vio.$h.$black." $unit is ".$vio.$ans." $squnit$black.";
	}

if($i==4){
	$b = rand(5,16);
	do{$h = rand(7,24);}while($h<$b+3);
    $ans=$b*$b+2*$b*$h;
	echo $red."Example #".$i.$black."<br/><br/>Find the surface area of a square pyramid whose base is ".$vio.$b.$black." $unit on each side and whose slant height is ".$vio.$h.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "SA = b<sup>2</sup> + 2 x b x h<br/><br/>";
    echo "SA = ($b $unit)<sup>2</sup> + 2 x $b $unit x $h $unit<br/><br/>";
    echo "SA = ".($b*$b)." $squnit + ".(2*$b*$h)." $squnit<br/><br/>";
    echo "SA = ".$ans." $squnit<br/>";
    echo "<br/>Thus, the surface area of a square pyramid whose base is ".$vio.$b.$black." $unit on each side and whose slant height is ".$vio.$h.$black." $unit is ".$vio.$ans." $squnit$black.";
	}
	
if($i==5){
	$r = rand(7,25);
    $ans=4*3.14*$r*$r;
    $opt=rand(1,2);
	echo $red."Example #".$i.$black."<br/><br/>Find the surface area of a sphere whose radius is ".$vio.$r.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "SA = 4 x &pi; x r<sup>2</sup><br/>";
    echo "SA = 4 x 3.14 x ($r $unit)<sup>2</sup><br/>";
    echo "SA = 12.56 x ".($r*$r)." $squnit<br/>";
    echo "SA = ".$ans." $squnit<br/>";
    echo "<br/>Thus, the surface area of a sphere whose radius is $r $unit is ".$vio.$ans." $squnit$black.";
	}
    
echo "</td></tr></table>";
if ($i<6){echo "<br/>";}
}
	
?>