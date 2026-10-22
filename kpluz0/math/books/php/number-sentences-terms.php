<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=8; $i+=1){
echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
$vio="<font color='#800080'><b>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'><b>";
$black="</b><font color='#000000'>";


echo $red."Example #".$i.$black."<br/><br/>Find the missing term below.<br/>";

switch($i){
    
    case 1:
	$a = rand(111,999);
	$b = rand(111,999);	
	$ans=$a+$b;
    echo $blue."___ + $b = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "___ + $b = ".$ans."<br/>";
    echo "___ = ".$ans." - ".$b."<br/>";
    echo "___ = ".($ans-$b)."<br/><br/>";
    echo "Thus, the missing term is ".$blue.($ans-$b).$black."</b>.<br/><br/>";
    echo "This is the complete number sentence:<br/><br/>";
    echo $blue."$a + $b = ".$ans.$black;;
    break;
    
    case 2:
    do{
		$a = rand(111,999);
		$b = rand(111,999);	
		}
	while ($a<=$b+11);	
	$ans=$a-$b;
    echo $blue."___ - $b = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "___ - $b = ".$ans."<br/>";
    echo "___ = ".$ans." + ".$b."<br/>";
    echo "___ = ".($ans+$b)."<br/><br/>";
    echo "Thus, the missing term is ".$blue.($ans+$b).$black."</b>.<br/><br/>";
    echo "This is the complete number sentence:<br/><br/>";
    echo $blue."$a - $b = ".$ans.$black;;
    break;
    
    case 3:
	$a = rand(111,999);
	$b = rand(111,999);	
	$ans=$a+$b;
    echo $blue."$a + ___ = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "$a + ___ = ".$ans."<br/>";
    echo "___ = ".$ans." - ".$a."<br/>";
    echo "___ = ".($ans-$a)."<br/><br/>";
    echo "Thus, the missing term is ".$blue.($ans-$a).$black."</b>.<br/><br/>";
    echo "This is the complete number sentence:<br/><br/>";
    echo $blue."$a + $b = ".$ans.$black;;
    break;
    
    case 4:
    do{
		$a = rand(111,999);
		$b = rand(111,999);	
		}
	while ($a<=$b+11);	
	$ans=$a-$b;
    echo $blue."$a - ___ = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "$a - ___ = ".$ans."<br/>";
    echo "___ = ".$a." - ".$ans."<br/>";
    echo "___ = ".($a-$ans)."<br/><br/>";
    echo "Thus, the missing term is ".$blue.($a-$ans).$black."</b>.<br/><br/>";
    echo "This is the complete number sentence:<br/><br/>";
    echo $blue."$a - $b = ".$ans.$black;;
    break;
    
    case 5:
	$a = rand(11,99);
	$b = rand(5,12);	
	$ans=$a*$b;
    echo $blue."___ x $b = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "___ x $b = ".$ans."<br/>";
    echo "___ = ".$ans." &div; ".$b."<br/>";
    echo "___ = ".($ans/$b)."<br/><br/>";
    echo "Thus, the missing term is ".$blue.($ans/$b).$black."</b>.<br/><br/>";
    echo "This is the complete number sentence:<br/><br/>";
    echo $blue."$a x $b = ".$ans.$black;
    break;
    
    case 6:
	$a = rand(11,99);
	$b = rand(5,12);	
	$ab=$a*$b;
    echo $blue."___ &div; $b = ".$a.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "___ &div; $b = ".$a."<br/>";
    echo "___ = ".$a." x ".$b."<br/>";
    echo "___ = ".($a*$b)."<br/><br/>";
    echo "Thus, the missing term is ".$blue.$ab.$black."</b>.<br/><br/>";
    echo "This is the complete number sentence:<br/><br/>";
    echo $blue."$ab &div; $b = ".$a.$black;
    break;
    
    case 7:
	$a = rand(5,12);	
	$b = rand(11,99);
	$ans=$a*$b;
    echo $blue."$a x ___ = ".$ans.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "$a x ___ = ".$ans."<br/>";
    echo "___ = ".$ans." &div; ".$a."<br/>";
    echo "___ = ".($ans/$a)."<br/><br/>";
    echo "Thus, the missing term is ".$blue.($ans/$a).$black."</b>.<br/><br/>";
    echo "This is the complete number sentence:<br/><br/>";
    echo $blue."$a x $b = ".$ans.$black;
    break;
    
    case 8:
	$a = rand(5,12);	
	$b = rand(11,99);
	$ab=$a*$b;
    echo $blue."$ab &div; ___ = ".$a.$black."<br/><br/>";
    echo $red."</b>Solution:<br/>".$black;
    echo "$ab &div; ___ = ".$a."<br/>";
    echo "___ = ".$ab." &div; ".$a."<br/>";
    echo "___ = ".$b."<br/><br/>";
    echo "Thus, the missing term is ".$blue.$b.$black."</b>.<br/><br/>";
    echo "This is the complete number sentence:<br/><br/>";
    echo $blue."$ab &div; $b = ".$a.$black;
    break;
    
	}
    
echo "</td></tr></table>";
if ($i<9){echo "<br/>";}
}
	
?>