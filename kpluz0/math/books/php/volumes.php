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

$cuunits=array("cu inches","cu feet","cu meters");
$cuunit=$cuunits[rand(0,2)];
$unit=substr($cuunit,3);

if($i==1 or ($grd<6 and $i%2>0)){
	$s = rand(5,20);
	if ($i==1 and $grd<6){$s = rand(2,7);}
	if ($i==3){$s = rand(8,14);}
	if ($i==5){$s = rand(15,20);}
    $ans=$s*$s*$s;
	echo $red."Example #".$i.$black."<br/><br/>Find the volume of a cube with an edge that's ".$vio.$s.$black." $unit long.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "V = s<sup>3</sup> = ($s $unit)<sup>3</sup><br/>";
    echo "V = ".$ans." $cuunit<br/>";
    echo "<br/>Thus, the volume of a cube with an edge that's ".$s." $unit long is ".$vio.$ans." $cuunit$black.";
	}

if($i==2 or ($grd<6 and $i%2==0)){
	do{
		$l = rand(11,29);
		$w = rand(7,24);
		$h = rand(7,24);
		if ($i==2 and $grd<6){
			$l = rand(5,10);
			$w = rand(2,7);
			$h = rand(2,7);
			}
		if ($i==4){
			$l = rand(11,19);
			$w = rand(8,16);
			$h = rand(8,16);
			}
		if ($i==6){
			$l = rand(15,29);
			$w = rand(12,24);
			$h = rand(12,24);
			}
		}
	while ($l<=$w+2 or $l<=$h+2);		
    $ans=$l*$w*$h;
	echo $red."Example #".$i.$black."<br/><br/>Find the volume of a rectangular prism that is ".$vio.$l.$black." $unit long, ";
	echo $vio.$w.$black." $unit wide, and ".$vio.$h.$black." $unit high.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "V = L x W x H<br/>";
    echo "V = $l $unit x $w $unit x $h $unit<br/>";
    echo "V = ".$ans." $cuunit<br/><br/>";
    echo "Thus, the volume of a rectangular prism that is $l $unit long, $w $unit wide, and $h $unit high is ".$vio.$ans." $cuunit$black.";
	}

if($i==3 and $grd==6){
	$r = rand(3,15);
	$h = rand(7,19);
    $ans=3.14*pow($r,2)*$h;
	echo $red."Example #".$i.$black."<br/><br/>Find the volume of a cylinder whose radius is ".$vio.$r.$black." $unit and whose height is ".$vio.$h.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "V = &pi; x r<sup>2</sup> x h<br/>";
    echo "V = 3.14 x ($r $unit)<sup>2</sup> x $h $unit<br/>";
    echo "V = ".$ans." $cuunit<br/>";
    echo "<br/>Thus, the volume of a cylinder whose radius is ".$vio.$r.$black." $unit and whose height is ".$vio.$h.$black." $unit is ".$vio.$ans." $cuunit$black.";
	}

if($i==4 and $grd==6){
	$b = rand(4,15);
	do{$h = rand(5,19);}while($h<$b+3);
    $ans=1/3*$b*$b*$h;
    $ans=round($ans,2);
	echo $red."Example #".$i.$black."<br/><br/>Find the volume of a square pyramid whose base is ".$vio.$b.$black." $unit on each side and whose height is ".$vio.$h.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "V = 1/3 x b<sup>2</sup> x h<br/>";
    echo "V = 1/3 x ($b $unit)<sup>2</sup> x $h $unit<br/>";
    echo "V = ".$ans." $cuunit<br/>";
    echo "<br/>Thus, the volume of a square pyramid whose base is ".$vio.$b.$black." $unit on each side and whose height is ".$vio.$h.$black." $unit is ".$vio.$ans." $cuunit$black.";
	}
	
if($i==5 and $grd==6){
	$r = rand(3,15);
	do{$h = rand(5,19);}while($h==$r);
    $ans=1/3*3.14*$r*$r*$h;
    $ans=round($ans,2);
	echo $red."Example #".$i.$black."<br/><br/>Find the volume of a cone whose radius is ".$vio.$r.$black." $unit and whose height is ".$vio.$h.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "V = 1/3 x &pi; x r<sup>2</sup> x h<br/>";
    echo "V = 1/3 x 3.14 x ($r $unit)<sup>2</sup> x $h $unit<br/>";
    echo "V = ".$ans." $cuunit<br/>";
    echo "<br/>Thus, the volume of a cone whose radius is ".$vio.$r.$black." $unit and whose height is ".$vio.$h.$black." $unit is ".$vio.$ans." $cuunit$black.";
	}
	
if($i==6 and $grd==6){
	$r = rand(3,19);
    $ans=4.1867*$r*$r*$r;
    $ans=round($ans,2);
	echo $red."Example #".$i.$black."<br/><br/>Find the volume of a sphere whose radius is ".$vio.$r.$black." $unit.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "A = 4/3 x &pi; x r<sup>3</sup><br/>";
    echo "A = 4/3 x 3.14 x ($r $unit)<sup>3</sup><br/>";
    echo "A = 4.1867 x ".($r*$r*$r)." $cuunit<br/>";
    echo "A = ".$ans." $cuunit<br/>";
    echo "<br/>Thus, the volume of a sphere whose radius is $r $unit is ".$vio.$ans." $cuunit$black.";
	}
    
echo "</td></tr></table>";
if ($i<7){echo "<br/>";}
}
	
?>