<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=7; $i+=1){
echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

$numlimit1=11;
$numlimit2=99;
	
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



switch($i){
    
    case 1:
	echo $red."Example #".$i.$black."<br/><br/>Below is an equation for the addition of three numbers. Find its missing terms:<br/>";
    do {
		$a = rand($numlimit1,$numlimit2);
		$b = rand($numlimit1,$numlimit2);
		$c = rand($numlimit1,$numlimit2);
		}
	while ($a==$b or $a==$c or $b==$c);	
    $opt=rand(1,3);
    if ($opt==1){$qstr="___ + $b + $c = $c + ? + $a"; $ans=$a; $ans2=$b;}
    if ($opt==2){$qstr="$a + ___ + $c = ? + $a + $b"; $ans=$b; $ans2=$c;}
    if ($opt==3){$qstr="$a + $b + ___ = $b + $c + ?"; $ans=$c; $ans2=$a;}
    echo $blue.str_replace("?","___",$qstr).$black."<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "By applying the commutative property of addition, we find the missing terms to be ".$vio.$ans.$black." and ".$vio.$ans2.$black.".<br/><br/>"; 
    $qstr=str_replace("___",$ans,$qstr);
    $qstr=str_replace("?",$ans2,$qstr);
    echo "Thus,<br/>".$qstr;
    break;
    
    case 2:
	echo $red."Example #".$i.$black."<br/><br/>Below is an equation for the multiplication of three numbers. Find its missing terms:<br/>";
    do {
		$a = rand($numlimit1,$numlimit2);
		$b = rand($numlimit1,$numlimit2);
		$c = rand($numlimit1,$numlimit2);
		}
	while ($a==$b or $a==$c or $b==$c);	
    $opt=rand(1,3);
    if ($opt==1){$qstr="___ x $b x $c = $c x ? x $a"; $ans=$a; $ans2=$b;}
    if ($opt==2){$qstr="$a x ___ x $c = ? x $a x $b"; $ans=$b; $ans2=$c;}
    if ($opt==3){$qstr="$a x $b x ___ = $b x $c x ?"; $ans=$c; $ans2=$a;}
    echo $blue.str_replace("?","___",$qstr).$black."<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "By applying the commutative property of multiplication, we find the missing terms to be ".$vio.$ans.$black." and ".$vio.$ans2.$black.".<br/><br/>"; 
    $qstr=str_replace("___",$ans,$qstr);
    $qstr=str_replace("?",$ans2,$qstr);
    echo "Thus,<br/>".$qstr;
    break;
    
    case 3:
	echo $red."Example #".$i.$black."<br/><br/>Below is an equation for the addition of three numbers. Find its missing terms:<br/>";
    do {
		$a = rand($numlimit1,$numlimit2);
		$b = rand($numlimit1,$numlimit2);
		$c = rand($numlimit1,$numlimit2);
		}
	while ($a==$b or $a==$c or $b==$c);	
    $opt=rand(1,3);
    if ($opt==1){$qstr="___ + ($b + $c) = ($a + ?) + $c"; $ans=$a; $ans2=$b;}
    if ($opt==2){$qstr="($a + ___) + $c = $a + ($b + ?)"; $ans=$b; $ans2=$c;}
    if ($opt==3){$qstr="$a + ($b + ___) = (? + $b) + $c"; $ans=$c; $ans2=$a;}
    echo $blue.str_replace("?","___",$qstr).$black."<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "By applying the associative property of addition, we find the missing terms to be ".$vio.$ans.$black." and ".$vio.$ans2.$black.".<br/><br/>"; 
    $qstr=str_replace("___",$ans,$qstr);
    $qstr=str_replace("?",$ans2,$qstr);
    echo "Thus,<br/>".$qstr;
    break;
    
    case 4:
	echo $red."Example #".$i.$black."<br/><br/>Below is an equation for the multiplication of three numbers. Find its missing terms:<br/>";
    do {
		$a = rand($numlimit1,$numlimit2);
		$b = rand($numlimit1,$numlimit2);
		$c = rand($numlimit1,$numlimit2);
		}
	while ($a==$b or $a==$c or $b==$c);	
    $opt=rand(1,3);
    if ($opt==1){$qstr="___ x ($b x $c) = ($a x ?) x $c"; $ans=$a; $ans2=$b;}
    if ($opt==2){$qstr="($a x ___) x $c = $a x ($b x ?)"; $ans=$b; $ans2=$c;}
    if ($opt==3){$qstr="$a x ($b x ___) = (? x $b) x $c"; $ans=$c; $ans2=$a;}
    echo $blue.str_replace("?","___",$qstr).$black."<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "By applying the associative property of multiplication, we find the missing terms to be ".$vio.$ans.$black." and ".$vio.$ans2.$black.".<br/><br/>"; 
    $qstr=str_replace("___",$ans,$qstr);
    $qstr=str_replace("?",$ans2,$qstr);
    echo "Thus,<br/>".$qstr;
    break;
    
    case 5:
	echo $red."Example #".$i.$black."<br/><br/>Below is an equation for the multiplication of a sum by a number. Find its missing terms:<br/>";
    do {
		$a = rand($numlimit1,$numlimit2);
		$b = rand($numlimit1,$numlimit2);
		$c = rand($numlimit1,$numlimit2);
		}
	while ($a==$b or $a==$c or $b==$c);	
    $opt=rand(1,3);
    if ($opt==1){$qstr="___ x ($b + $c) =<br/>$a x ? + $a x $c"; $ans=$a; $ans2=$b;}
    if ($opt==2){$qstr="$a x (___ + $c) =<br/>$a x $b + $a x ?"; $ans=$b; $ans2=$c;}
    if ($opt==3){$qstr="$a x ($b + ___) =<br/>? x $b + $a x $c"; $ans=$c; $ans2=$a;}
    echo $blue.str_replace("?","___",$qstr).$black."<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "By applying the distributive property of multiplication over addition, we find the missing terms to be ".$vio.$ans.$black." and ".$vio.$ans2.$black.".<br/><br/>"; 
    $qstr=str_replace("___",$ans,$qstr);
    $qstr=str_replace("?",$ans2,$qstr);
    echo "Thus,<br/>".$qstr;
    break;
    
    case 6:
	echo $red."Example #".$i.$black."<br/><br/>Below is an equation for the division of a sum by a number. Find its missing terms:<br/>";
    do {
		$a = rand(5,12);
		$b = $a*rand(2,5);
		$c = $a*rand(2,5);
		}
	while ($b==$c);	
    $opt=rand(1,3);
    if ($opt==1){$qstr="($b + $c) / ___ =<br/>? / $a + $c / $a"; $ans=$a; $ans2=$b;}
    if ($opt==2){$qstr="(___ + $c) / $a =<br/>$b / $a + ? / $a"; $ans=$b; $ans2=$c;}
    if ($opt==3){$qstr="($b + ___) / $a =<br/>$b / ? + $c / $a"; $ans=$c; $ans2=$a;}
    echo $blue.str_replace("?","___",$qstr).$black."<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "By applying the distributive property of division over addition, we find the missing terms to be ".$vio.$ans.$black." and ".$vio.$ans2.$black.".<br/><br/>"; 
    $qstr=str_replace("___",$ans,$qstr);
    $qstr=str_replace("?",$ans2,$qstr);
    echo "Thus,<br/>".$qstr;
    break;
    
    case 7:
	echo $red."Example #".$i.$black."<br/><br/>Below is an equation for the multiplication of a sum by a number. Find its missing terms:<br/>";
    do {
		$a = rand($numlimit1,$numlimit2);
		$b = rand($numlimit1,$numlimit2);
		$c = rand($numlimit1,$numlimit2);
		$d = rand($numlimit1,$numlimit2);
		}
	while ($a==$b or $a==$c or $b==$c or $d==$a or $d==$b or $d==$c);	
    $opt=rand(1,4);
    if ($opt==1){$qstr="___ x ($b + $c - $d) =<br/>$a x ? + $a x & - $a x $d"; $ans=$a; $ans2=$b; $ans3=$c;}
    if ($opt==2){$qstr="$a x (___ - $c + $d) =<br/>? x $b - $a x $c + $a x &"; $ans=$b; $ans2=$a; $ans3=$d;}
    if ($opt==3){$qstr="$a x ($b - ___ + $d) =<br/>$a x ? - $a x $c + $a x &"; $ans=$c; $ans2=$b; $ans3=$d;}
    if ($opt==4){$qstr="$a x ($b + $c - ___) =<br/>$a x ? + $a x & - $a x $d"; $ans=$d; $ans2=$b; $ans3=$c;}
    $qstr1=str_replace("?","___",$qstr);
    $qstr1=str_replace("&","___",$qstr1);
    echo $blue.$qstr1.$black."<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "By applying the distributive property of multiplication over addition and subtraction, we find the missing terms to be ";
    echo $vio.$ans.$black.", ".$vio.$ans2.$black." and ".$vio.$ans3.$black.".<br/><br/>"; 
    $qstr=str_replace("___",$ans,$qstr);
    $qstr=str_replace("?",$ans2,$qstr);
    $qstr=str_replace("&",$ans3,$qstr);
    echo "Thus,<br/>".$qstr;
    break;

	}
    
echo "</td></tr></table>";
if ($i<9){echo "<br/>";}
}
	
?>