<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=4; $i+=1){
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

$vio="<font color='#800080'>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'>";
$black="</b><font color='#000000'>";

if($i<3){
	if ($i==1){$prev1=rand(51,125); $prev2=rand(10,999); $wc=rand(11000,15000)/1000; $cur=$prev1+$prev2/1000+$wc;}
	if ($i==2){$prev1=rand(126,799); $prev2=rand(10,999); $wc=rand(15000,19999)/1000; $cur=$prev1+$prev2/1000+$wc;}
	echo $red."Example #".$i.$vio."</b><br/><br/>Given the following:$black<br/><br/>";
	echo "Previous Reading: ";
	if ($prev1<100){echo "00".$prev1;}else{echo "0".$prev1;}
	echo $red."</b>";
	if ($prev2<100){echo "0".$prev2;}else{echo $prev2;}
	echo "$black<br/>Current Reading: ";
	if ($cur<100){echo "00".(floor($cur));}else{echo "0".(floor($cur));}
	echo $red."</b>";
	$fc=($cur-floor($cur))*1000; $fc=round($fc,0);
	if ($fc<100){echo "0".$fc;}else{echo $fc;}
	echo "$black<br/>Cost of Consumed Water:<br/>";
	echo "First 10 cu m: &#8369;160.00 (flat rate)<br/>"; 
	echo "Next 10 cu m: &#8369;20.00/cu m<br/>";
	echo "Next 20 cu m: &#8369;40.00/cu m<br/><br/>";
	echo $vio."What is your water consumption (WC) and how much does it cost?$black<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "WC = (".$cur." - ".($prev1+$prev2/1000).") cu m<br/>";
    echo "WC = ".$wc." cu m<br/><br/>";
    echo "Cost = &#8369;160.00 +<br/>(".($wc-10)." cu m x &#8369;20/cu m)<br/>";
    echo "= &#8369;160.00 + &#8369;".(($wc-10)*20);
    $cost=160+($wc-10)*20;
    echo "<br/>= &#8369;$cost";
    echo "<br/><br/>Thus, your water consumption is $blue $wc cu m $black and it costs $blue&#8369;$cost$black.";
	}

if($i>=3){
	if ($i==3){$prev1=rand(1111,4999); $prev2=rand(111,999); $wc=rand(20010,29999)/1000; $cur=$prev1+$prev2/1000+$wc;}
	if ($i>=4){$prev1=rand(5001,9599); $prev2=rand(111,999); $wc=rand(30001,39999)/1000; $cur=$prev1+$prev2/1000+$wc;}
	echo $red."Example #".$i.$vio."</b><br/><br/>Given the following:$black<br/><br/>";
	echo "Previous Reading: ".$prev1;
	echo $red."</b>".$prev2;
	echo "$black<br/>Current Reading: ";
	echo (floor($cur));
	echo $red."</b>";
	$fc=($cur-floor($cur))*1000; $fc=round($fc,0);
	if ($fc<10){echo "00".$fc;}
	if ($fc>9 and $fc<100){echo "0".$fc;}
	if ($fc>99){echo $fc;}
	echo "$black<br/>Cost of Consumed Water:<br/>";
	echo "First 10 cu m: &#8369;160.00 (flat rate)<br/>"; 
	echo "Next 10 cu m: &#8369;20.00/cu m<br/>";
	echo "Next 20 cu m: &#8369;40.00/cu m<br/><br/>";
	echo $vio."What is your water consumption (WC) and how much does it cost?$black<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "WC = (".$cur." - ".($prev1+$prev2/1000).") cu m<br/>";
    echo "WC = ".$wc." cu m<br/><br/>";
    echo "Cost = &#8369;160.00 +<br/>("."10 cu m x &#8369;20/cu m) +<br/>(".($wc-20)." cu m x &#8369;40/cu m)<br/>";
    echo "= &#8369;160.00 + &#8369;200 + &#8369;".(($wc-20)*40);
    $cost=360+($wc-20)*40;
    echo "<br/>= &#8369;$cost";
    echo "<br/><br/>Thus, your water consumption is $blue $wc cu m $black and it costs $blue&#8369;$cost$black.";
	}
    
echo "</td></tr></table>";
if ($i<5){echo "<br/>";}
}
	
?>