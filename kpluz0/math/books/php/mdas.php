<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=5; $i+=1){
echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

if ($i<=2){
	$numlimit1=2;
	$numlimit2=10;
	}
if ($i>2){
	$numlimit1=4;
	$numlimit2=12;
	}
	
$a = rand($numlimit1,$numlimit2);
$b = rand($numlimit1,$numlimit2);	
$c = rand($numlimit1,$numlimit2);	
$d = rand($numlimit1,$numlimit2);	
$e = rand($numlimit1,$numlimit2);	

if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
$vio="<font color='#800080'><b>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'><b>";
$black="</b><font color='#000000'>";

$step1="Step 1. Do all the multiplication and division $vio $black:<br/>";
$step2="Step 2. Do all the addition and subtraction $vio $black:<br/>";

echo $red."Example #".$i.$black."<br/>";

switch($i){
    
    case 1:
	$ans=($a*$b)+($c*$d)-$e;
    echo $red.$a." x ".$b." + ".$c." x ".$d." - ".$e.$black."<br/><br/>";
    echo $step1;
    echo $a." x ".$b." + ".$c." x ".$d." - ".$e;
    echo "<br/>= ".$blue.($a*$b).$black." + ".$blue.($c*$d).$black." - ".$e."<br/><br/>";
    echo $step2;
    echo ($a*$b)." + ".($c*$d)." - ".$e." = ".$blue.$ans.$black;
    break;
    
    case 2:
    do {
		$d=rand(2,9);	
		$ans=$a+($b*$c)-($d*$e/$e);
    	}
    while ($ans<=2);	
    echo $red.$a." + ".$b." x ".$c." - ".($d*$e)." / ".$e.$black."<br/><br/>";
    echo $step1;
    echo $a." + ".$b." x ".$c." - ".($d*$e)." / ".$e;
    echo "<br/>= ".$a." + ".$blue.($b*$c).$black." - ".$blue.$d.$black."<br/><br/>";
    echo $step2;
    echo $a." + ".($b*$c)." - ".$d." = ".$blue.$ans.$black;
    break;
    
    case 3:
    do {
		$a = rand($numlimit1,$numlimit2);
		$d = rand($numlimit1,$numlimit2);
		$e = rand($numlimit1,$numlimit2);
		$f = rand($numlimit1,$numlimit2);	
		$ans=$a+$c-($d*$e)+$f;
    	}
    while ($ans<=2);	
    echo $red.($a*$b)." / ".$b." + ".$c." - ".$d." x ".$e." + ".$f.$black."<br/><br/>";
    echo $step1;
    echo ($a*$b)." / ".$b." + ".$c." - ".$d." x ".$e." + ".$f;
    echo "<br/>= ".$blue.$a.$black." + ".$c." - ".$blue.($d*$e).$black." + ".$f."<br/><br/>";
    echo $step2;
    echo $a." + ".$c." - ".($d*$e)." + ".$f." = ".$blue.$ans.$black;
    break;
    
    case 4:
    do {
		$a = rand(2,9);
		$b = rand(2,9);
		$c = rand($numlimit1,$numlimit2);	
		$d = rand(2,9);
		$e = rand(9,9);
		$f = rand($numlimit1,$numlimit2);	
		$g = rand($numlimit1,$numlimit2);	
		$ans=$a*$c-$d*$f+$g;
    	}
    while ($ans<=2 or $b==$c or $e==$f);	
    echo $red.($a*$b)." / $b x $c - ".($d*$e)." / $e x $f + $g".$black."<br/><br/>";
    echo $step1;
    echo ($a*$b)." / $b x $c - ".($d*$e)." / $e x $f + $g";
    echo "<br/>= ".$blue.($a*$c).$black." - ".$blue.($d*$f).$black." + ".$g."<br/><br/>";
    echo $step2;
    echo ($a*$c)." - ".($d*$f)." + ".$g." = ".$blue.$ans.$black;
    break;
    
    case 5:
    do {
		$a = rand($numlimit1,$numlimit2);	
		$b = rand($numlimit1,$numlimit2);	
		$c = rand($numlimit1,$numlimit2);	
		$d = rand($numlimit1,$numlimit2);	
		$h = rand($numlimit1,$numlimit2);	
		$ans=$a-($c*$d)+($e*$f)+$g;
    	}
    while ($ans<=2 or $b==$d or $f==$h);	
    echo $red.$a." - ".($b*$c)." x $d / $b + ".($h*$e)." x $f / $h + $g".$black."<br/><br/>";
    echo $step1;
    echo $a." - ".($b*$c)." x $d / $b + ".($h*$e)." x $f / $h + $g";
    echo "<br/>= ".$a." - ".$blue.($c*$d).$black." + ".$blue.($e*$f).$black." + ".$g."<br/><br/>";
    echo $step2;
    echo $a." - ".($c*$d)." + ".($e*$f)." + ".$g." = ".$blue.$ans.$black;
    break;
    
    
	}
    
echo "</td></tr></table>";
if ($i<5){echo "<br/>";}
}
	
?>