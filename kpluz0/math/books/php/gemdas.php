<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=5; $i+=1){
echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

if ($grd<=4){
	$numlimit1=4;
	$numlimit2=15;
	}
if ($grd==5){
	$numlimit1=7;
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

$step1="Step 1. Grouped Operations $vio(G)$black:<br/>";
$step2="Step 2. Exponents $vio(E)$black:<br/>";
$step3="Step 3. Multiplication and Division $vio(MD)$black:<br/>";
$step4="Step 4. Addition and Subtraction $vio(AS)$black:<br/>";

echo $red."Example #".$i.$black."<br/>";

switch($i){
    
    case 1:
    do{
		$a = rand($numlimit1,$numlimit2);
		$b = rand(2,5);	
		$c = rand($numlimit1,$numlimit2);	
		$d = rand($numlimit1,$numlimit2);
		}
    while ($c<=$d);
	$ans=($a*(pow($b,2)))+(($c-$d)*$e);
    echo $red.$a." x ".$b."<sup>2</sup> + (".$c." - ".$d.") x ".$e.$black."<br/><br/>";
    echo $step1;
    echo $a." x ".$b."<sup>2</sup> + (".$c." - ".$d.") x ".$e.$black;
    echo "<br/>= ".$a." x ".$b."<sup>2</sup> + ".$blue.($c-$d).$black." x ".$e.$black."<br/><br/>";
    echo $step2;
    echo $a." x ".$b."<sup>2</sup> + ".($c-$d)." x ".$e;
    echo "<br/>= ".$a." x ".$blue.pow($b,2).$black." + ".($c-$d)." x ".$e.$black."<br/><br/>";
    echo $step3;
    echo $a." x ".pow($b,2)." + ".($c-$d)." x ".$e;
    echo "<br/>= ".$blue.($a*(pow($b,2))).$black." + ".$blue.(($c-$d)*$e).$black."<br/><br/>";
    echo $step4;
    echo ($a*(pow($b,2)))." + ".(($c-$d)*$e)." = ".$blue.$ans.$black;
    break;
    
    case 2:
    do{
		$a = rand($numlimit1,$numlimit2);
		$b = rand($numlimit1,$numlimit2);
		$e = rand(2,5);	
		}
    while ($a<=$b);
	$ans=($a-$b)+($e*$e*($c+$d));
    echo $red."(".$a." - ".$b.") + ".$e."<sup>2</sup> x (".$c." + ".$d.")".$black."<br/><br/>";
    echo $step1;
    echo "(".$a." - ".$b.") + ".$e."<sup>2</sup> x (".$c." + ".$d.")";
    echo "<br/>= ".$blue.($a-$b).$black." + ".$e."<sup>2</sup> x ".$blue.($c+$d).$black."<br/><br/>";
    echo $step2;
    echo ($a-$b)." + ".$e."<sup>2</sup> x ".($c+$d);
    echo "<br/>= ".($a-$b)." + ".$blue.($e*$e).$black." x ".($c+$d)."<br/><br/>";
    echo $step3;
    echo ($a-$b)." + ".($e*$e)." x ".($c+$d);
    echo "<br/>= ".($a-$b)." + ".$blue.($e*$e*($c+$d)).$black."<br/><br/>";
    echo $step4;
    echo ($a-$b)." + ".($e*$e*($c+$d))." = ".$blue.$ans.$black;
    break;
    
    case 3:
    do{
		$c = rand($numlimit1,$numlimit2);	
		$d = rand($numlimit1,$numlimit2);
		$e = rand(2,5);	
		}
    while ($c-$d<3);
	$ans=$a+$b+($e*$e*$f);
    echo $red.$a." + ".$b*($c-$d)." / (".$c." - ".$d.") + ".$e."<sup>2</sup> x ".$f.$black."<br/><br/>";
    echo $step1;
    echo $a." + ".$b*($c-$d)." / (".$c." - ".$d.") + ".$e."<sup>2</sup> x ".$f;
    echo "<br/>= ".$a." + ".$b*($c-$d)." / ".$blue.($c-$d).$black." + ".$e."<sup>2</sup> x ".$f."<br/><br/>";
    echo $step2;
    echo $a." + ".$b*($c-$d)." / ".($c-$d)." + ".$e."<sup>2</sup> x ".$f;
    echo "<br/>= ".$a." + ".$b*($c-$d)." / ".($c-$d)." + ".$blue.($e*$e).$black." x ".$f."<br/><br/>";
    echo $step3;
    echo $a." + ".$b*($c-$d)." / ".($c-$d)." + ".($e*$e)." x ".$f;
    echo "<br/>= ".$a." + ".$blue.($b*($c-$d)/($c-$d)).$black." + ".$blue.($e*$e*$f).$black."<br/><br/>";
    echo $step4;
    echo $a." + ".($b*($c-$d)/($c-$d))." + ".($e*$e*$f)." = ".$blue.$ans.$black;
    break;
    
    case 4:
	$c = rand(2,9);	
	$d = rand(2,9);
	$e = rand(2,9);
	$f = rand(2,5);	
	$ans=$b+($c*$c*($e+$f*$f))-$a;
    echo $red.$b*($c+$d)." / (".$c." + ".$d.") + (".$e." + ".$f."<sup>2</sup>) x ".$c."<sup>2</sup> - ".$a.$black."<br/><br/>";
    echo $step1;
    echo $b*($c+$d)." / (".$c." + ".$d.") + (".$e." + ".$f."<sup>2</sup>) x ".$c."<sup>2</sup> - ".$a;
    echo "<br/>= ".$b*($c+$d)." / ".$blue.($c+$d).$black." + (".$e." + ".$blue.($f*$f).$black.") x ".$c."<sup>2</sup> - ".$a;
    echo "<br/>= ".$b*($c+$d)." / ".$blue.($c+$d).$black." + ".$blue.($e+$f*$f).$black." x ".$c."<sup>2</sup> - ".$a."<br/><br/>";
    echo $step2;
    echo $b*($c+$d)." / ".($c+$d)." + ".($e+$f*$f)." x ".$c."<sup>2</sup> - ".$a;
    echo "<br/>= ".$b*($c+$d)." / ".($c+$d)." + ".($e+$f*$f)." x ".$blue.($c*$c).$black." - ".$a."<br/><br/>";
    echo $step3;
    echo $b*($c+$d)." / ".($c+$d)." + ".($e+$f*$f)." x ".($c*$c)." - ".$a;
    echo "<br/>= ".$blue.$b.$black." + ".$blue.(($e+$f*$f)*$c*$c).$black." - ".$a."<br/><br/>";
    echo $step4;
    echo $b." + ".(($e+$f*$f)*$c*$c)." - ".$a." = ".$blue.$ans.$black;
    break;
    
    case 5:
    $b=rand(2,5);
    $e=rand(2,5);
	do{$d = rand($numlimit1,$numlimit2); $a = rand($numlimit1,$numlimit2);}
    while ($d<=($a+1));
	$ans=($a+$b*$c)+($c*$e*$e)+$f-$d+$b;
    echo $red."($a + ".$b." x $c) + ".$c." x ".$e."<sup>2</sup> + ".$f." - ".$d*$a." / ".$a." + ".$b.$black."<br/><br/>";
    echo $step1;
    echo "($a + ".$b." x $c) + ".$c." x ".$e."<sup>2</sup> + ".$f." - ".$d*$a." / ".$a." + ".$b;
    echo "<br/>= ($a + ".$blue.($b*$c).$black.") + ".$c." x ".$e."<sup>2</sup> + ".$f." - ".$d*$a." / ".$a." + ".$b;
    echo "<br/>= ".$blue.($a+$b*$c).$black." + ".$c." x ".$e."<sup>2</sup> + ".$f." - ".$d*$a." / ".$a." + ".$b."<br/><br/>";
    echo $step2;
    echo ($a+$b*$c)." + ".$c." x ".$e."<sup>2</sup> + ".$f." - ".$d*$a." / ".$a." + ".$b;
    echo "<br/>= ".($a+$b*$c)." + ".$c." x ".$blue.($e*$e).$black." + ".$f." - ".$d*$a." / ".$a." + ".$b."<br/><br/>";
    echo $step3;
    echo ($a+$b*$c)." + ".$c." x ".($e*$e)." + ".$f." - ".$d*$a." / ".$a." + ".$b;
    echo "<br/>= ".($a+$b*$c)." + ".$blue.($c*$e*$e).$black." + ".$f." - ".$blue.$d.$black." + ".$b."<br/><br/>";
    echo $step4;
    echo ($a+$b*$c)." + ".($c*$e*$e)." + ".$f." - ".$d." + ".$b." = ".$blue.$ans.$black;
    break;
    
	}
    
echo "</td></tr></table>";
if ($i<5){echo "<br/>";}
}
	
?>