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
$step2="Step 2. Multiplication and Division $vio(MD)$black:<br/>";
$step3="Step 3. Addition and Subtraction $vio(AS)$black:<br/>";

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
	$ans=$b+(($c-$d)*$e);
    echo $red.($a*$b)." / ".$a." + (".$c." - ".$d.") x ".$e.$black."<br/><br/>";
    echo $step1;
    echo ($a*$b)." / ".$a." + (".$c." - ".$d.") x ".$e.$black;
    echo "<br/>= ".($a*$b)." / ".$a." + ".$blue.($c-$d).$black." x ".$e.$black."<br/><br/>";
    echo $step2;
    echo ($a*$b)." / ".$a." + ".($c-$d)." x ".$e;
    echo "<br/>= ".$blue.$b.$black." + ".$blue.(($c-$d)*$e).$black."<br/><br/>";
    echo $step3;
    echo $b." + ".(($c-$d)*$e)." = ".$blue.$ans.$black;
    break;
    
    case 2:
    do{
		$a = rand($numlimit1,$numlimit2);
		$b = rand($numlimit1,$numlimit2);
		$e = rand(2,5);	
		}
    while ($a<=$b);
	$ans=($a-$b)+($e*($c+$d));
    echo $red."(".$a." - ".$b.") + ".$e." x (".$c." + ".$d.")".$black."<br/><br/>";
    echo $step1;
    echo "(".$a." - ".$b.") + ".$e." x (".$c." + ".$d.")";
    echo "<br/>= ".$blue.($a-$b).$black." + ".$e." x ".$blue.($c+$d).$black."<br/><br/>";
    echo $step2;
    echo ($a-$b)." + ".$e." x ".($c+$d);
    echo "<br/>= ".($a-$b)." + ".$blue.($e*($c+$d)).$black."<br/><br/>";
    echo $step3;
    echo ($a-$b)." + ".($e*($c+$d))." = ".$blue.$ans.$black;
    break;
    
    case 3:
    do{
		$c = rand($numlimit1,$numlimit2);	
		$d = rand($numlimit1,$numlimit2);
		$e = rand(2,5);	
		}
    while ($c-$d<3);
	$ans=$a+$b+($e*$f);
    echo $red.$a." + ".$b*($c-$d)." / (".$c." - ".$d.") + ".$e." x ".$f.$black."<br/><br/>";
    echo $step1;
    echo $a." + ".$b*($c-$d)." / (".$c." - ".$d.") + ".$e." x ".$f;
    echo "<br/>= ".$a." + ".$b*($c-$d)." / ".$blue.($c-$d).$black." + ".$e." x ".$f."<br/><br/>";
    echo $step2;
    echo $a." + ".$b*($c-$d)." / ".($c-$d)." + ".$e." x ".$f;
    echo "<br/>= ".$a." + ".$blue.$b.$black." + ".$blue.($e*$f).$black."<br/><br/>";
    echo $step3;
    echo $a." + ".($b*($c-$d)/($c-$d))." + ".($e*$f)." = ".$blue.$ans.$black;
    break;
    
    case 4:
	$c = rand(2,9);	
	$d = rand(2,9);
	$e = rand(2,9);
	$f = rand(2,5);	
	$ans=$b+($c*($e+$f))-$a;
    echo $red.$b*($c+$d)." / (".$c." + ".$d.") + (".$e." + ".$f.") x ".$c." - ".$a.$black."<br/><br/>";
    echo $step1;
    echo $b*($c+$d)." / (".$c." + ".$d.") + (".$e." + ".$f.") x ".$c." - ".$a;
    echo "<br/>= ".$b*($c+$d)." / ".$blue.($c+$d).$black." + ".$blue.($e+$f).$black." x ".$c." - ".$a."<br/><br/>";
    echo $step2;
    echo $b*($c+$d)." / ".($c+$d)." + ".($e+$f)." x ".$c." - ".$a;
    echo "<br/>= ".$blue.$b.$black." + ".$blue.(($e+$f)*$c).$black." - ".$a."<br/><br/>";
    echo $step3;
    echo $b." + ".(($e+$f)*$c)." - ".$a." = ".$blue.$ans.$black;
    break;
    
    case 5:
    $b=rand(2,5);
    $e=rand(2,5);
	do{$d = rand($numlimit1,$numlimit2); $a = rand($numlimit1,$numlimit2);}
    while ($d<=($a+1));
	$ans=($a+$b*$c)+($c*$e)+$f-$d+$b;
    echo $red."($a + ".$b." x $c) + ".$c." x ".$e." + ".$f." - ".$d*$a." / ".$a." + ".$b.$black."<br/><br/>";
    echo $step1;
    echo "($a + ".$b." x $c) + ".$c." x ".$e." + ".$f." - ".$d*$a." / ".$a." + ".$b;
    echo "<br/>= ($a + ".$blue.($b*$c).$black.") + ".$c." x ".$e." + ".$f." - ".$d*$a." / ".$a." + ".$b;
    echo "<br/>= ".$blue.($a+$b*$c).$black." + ".$c." x ".$e." + ".$f." - ".$d*$a." / ".$a." + ".$b."<br/><br/>";
    echo $step2;
    echo ($a+$b*$c)." + ".$c." x ".$e." + ".$f." - ".$d*$a." / ".$a." + ".$b;
    echo "<br/>= ".($a+$b*$c)." + ".$blue.($c*$e).$black." + ".$f." - ".$blue.$d.$black." + ".$b."<br/><br/>";
    echo $step3;
    echo ($a+$b*$c)." + ".($c*$e)." + ".$f." - ".$d." + ".$b." = ".$blue.$ans.$black;
    break;
    
	}
    
echo "</td></tr></table>";
if ($i<5){echo "<br/>";}
}
	
?>