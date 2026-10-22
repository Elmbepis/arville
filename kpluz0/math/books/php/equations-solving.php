<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=6; $i+=1){
echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

if ($grd<=5){
	$numlimit1=5;
	$numlimit2=20;
	}
if ($grd>=6){
	$numlimit1=11;
	$numlimit2=24;
	}
	
$a = rand($numlimit1,$numlimit2);
$b = rand($numlimit1,$numlimit2);	
$c = rand($numlimit1,$numlimit2);	
$d = rand($numlimit1,$numlimit2);	
$e = rand($numlimit1,$numlimit2);	
$f = rand($numlimit1,$numlimit2);	

if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
$vio="<font color='#800080'><b>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'><b>";
$black="</b><font color='#000000'>";


echo $red."Example #".$i.$black."<br/><br/>Solve for x in this equation:<br/>";

switch($i){
    
    case 1:
	$a = rand($numlimit1,$numlimit2);
	$b = rand(7,19);	
	$c = rand($numlimit1,$numlimit2);	
	$ans=($a*$b)+$c;
    echo $blue.$a."x + ".$c." = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo $a."x + ".$c." = ".$ans."<br/>";
    echo $a."x = ".$ans." - ".$c."<br/>";
    echo $a."x = ".($ans-$c)."<br/>";
    echo "x = ".($ans-$c)." / ".$a."<br/>";
    echo "x = ".$vio.(($ans-$c)/$a)."</b><br/><br/>";
    echo $red."</b>Checking:<br/>".$black;
    echo "(".$a.")(".$vio.$b.$black.") + ".$c." = ".$ans.$black."<br/>";
    echo ($a*$b)." + ".$c." = ".$ans.$black."<br/>";
    echo ($a*$b+$c)." = ".$ans.$black."<br/><br/>";
    echo "The answer matches so it is correct.";
    break;
    
    case 2:
	$a = rand($numlimit1,$numlimit2);
	$b = rand(7,19);	
	$c = rand($numlimit1,$numlimit2);	
	$ans=($a*$b)-$c;
    echo $blue.$a."x - ".$c." = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo $a."x - ".$c." = ".$ans."<br/>";
    echo $a."x = ".$ans." + ".$c."<br/>";
    echo $a."x = ".($ans+$c)."<br/>";
    echo "x = ".($ans+$c)." / ".$a."<br/>";
    echo "x = ".$vio.(($ans+$c)/$a)."</b><br/><br/>";
    echo $red."</b>Checking:<br/>".$black;
    echo "(".$a.")(".$vio.$b.$black.") - ".$c." = ".$ans.$black."<br/>";
    echo ($a*$b)." - ".$c." = ".$ans.$black."<br/>";
    echo ($a*$b-$c)." = ".$ans.$black."<br/><br/>";
    echo "The answer matches so it is correct.";
    break;
    
    case 3:
	$fac = rand(2,9);
	$b = rand(7,19);	
	$a = $b*$fac;	
	$c = rand($numlimit1,$numlimit2);	
	$ans=($a/$b)+$c;
    echo $blue.$c." + x/$b"." = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo $c." + x/$b = ".$ans."<br/>";
    echo "x/$b = ".$ans." - ".$c."<br/>";
    echo "x/$b = ".($ans-$c)."<br/>";
    echo "x = (".($ans-$c).")(".$b.")<br/>";
    echo "x = ".$vio.(($ans-$c)*$b)."</b><br/><br/>";
    echo $red."</b>Checking:<br/>".$black;
    echo $c." + ".$vio.$a.$black."/$b"." = ".$ans.$black."<br/>";
    echo $c." + ".($a/$b)." = ".$ans.$black."<br/>";
    echo ($c+$a/$b)." = ".$ans.$black."<br/><br/>";
    echo "The answer matches so it is correct.";
    break;
    
    case 4:
    do{
		$fac = rand(6,15);
		$b = rand(7,12);	
		$a = $b*$fac;	
		$c = rand(2,15);	
		$ans=($a/$b)-$c;
		}
	while ($ans<=1);
    echo $blue."x/$b - ".$c." = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "x/$b - ".$c." = ".$ans."<br/>";
    echo "x/$b = ".$ans." + ".$c."<br/>";
    echo "x/$b = ".($ans+$c)."<br/>";
    echo "x = (".($ans+$c).")(".$b.")<br/>";
    echo "x = ".$vio.(($ans+$c)*$b)."</b><br/><br/>";
    echo $red."</b>Checking:<br/>".$black;
    echo $vio.$a.$black."/".$b." - ".$c." = ".$ans.$black."<br/>";
    echo ($a/$b)." - ".$c." = ".$ans.$black."<br/>";
    echo $a/$b-$c." = ".$ans.$black."<br/><br/>";
    echo "The answer matches so it is correct.";
    break;
         
    case 5:
	$a = rand($numlimit1,$numlimit2);
	$b = rand(3,12);	
	$c = rand($numlimit1,$numlimit2);	
	$ans=($a*$b*$b)+$c;
    echo $blue.$a."x<sup>2</sup> + ".$c." = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo $a."x<sup>2</sup> + ".$c." = ".$ans."<br/>";
    echo $a."x<sup>2</sup> = ".$ans." - ".$c."<br/>";
    echo $a."x<sup>2</sup> = ".($ans-$c)."<br/>";
    echo "x<sup>2</sup> = ".($ans-$c)." / ".$a."<br/>";
    echo "x<sup>2</sup> = ".(($ans-$c)/$a)."<br/>";
    echo "x= ".$vio.$b."</b><br/><br/>";
    echo $red."</b>Checking:<br/>".$black;
    echo "(".$a.")(". $vio.$b.$black."<sup>2</sup>) + ".$c." = ".$ans.$black."<br/>";
    echo "(".$a.")(".($b*$b).") + ".$c." = ".$ans.$black."<br/>";
    echo ($a*$b*$b)." + ".$c." = ".$ans.$black."<br/>";
    echo ($a*$b*$b+$c)." = ".$ans.$black."<br/><br/>";
    echo "The answer matches so it is correct.";
    break;
         
    case 6:
	$a = rand($numlimit1,$numlimit2);
	$b = rand(3,12);	
	$c = rand($numlimit1,$numlimit2);	
	$d = rand(3,12);	
	$ans=$d*(($a+$b)*($a+$b))-$c;
    echo $blue.$d."(".$a." + x)<sup>2</sup> - ".$c." = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo $d."(".$a." + x)<sup>2</sup> - ".$c." = ".$ans."<br/>";
    echo $d."(".$a." + x)<sup>2</sup> = ".$ans." + ".$c."<br/>";
    echo $d."(".$a." + x)<sup>2</sup> = ".($ans+$c)."<br/>";
    echo "(".$a." + x)<sup>2</sup> = ".($ans+$c)." / ".$d."<br/>";
    echo "(".$a." + x)<sup>2</sup> = ".(($ans+$c)/$d)."<br/>";
    echo $a." + x = square root of ".(($ans+$c)/$d)."<br/>";
    echo $a." + x = ".pow((($ans+$c)/$d),0.5)."<br/>";
    echo "x = ".pow((($ans+$c)/$d),0.5)." - ".$a."<br/>";
    echo "x = ".$vio.$b."</b><br/><br/>";
    echo $red."</b>Checking:<br/>".$black;
    echo $d."(".$a." + ".$blue.$b.$black.")<sup>2</sup> - ".$c." = ".$ans."<br/>";
    echo $d."(".($a+$b).")<sup>2</sup> - ".$c." = ".$ans."<br/>";
    echo "(".$d.")(".(($a+$b)*($a+$b)).") - ".$c." = ".$ans."<br/>";
    echo ($d*(($a+$b)*($a+$b)))." - ".$c." = ".$ans."<br/>";
    echo ($d*(($a+$b)*($a+$b))-$c)." = ".$ans.$black."<br/><br/>";
    echo "The answer matches so it is correct.";
    break;
    
	}
    
echo "</td></tr></table>";
if ($i<7){echo "<br/>";}
}
	
?>