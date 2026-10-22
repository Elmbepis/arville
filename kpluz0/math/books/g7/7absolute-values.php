<?php

$grd=$grd;
$title="Absolute Values<br/>of Numbers";
$img1="images/absolute1.jpg";
$red="<font color='#CC0000'>";
$vio="<font color='#800080'>";
$blue="<font color='#0000BB'>";
$black="<font color='#000000'>";
if (!isset($format)){$format=0;}
if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}
$article="
Distance is always expressed as a nonnegative number.
The $vio absolute value $black of any real number $vio<i>a</i>$black is simply the distance between $vio<i>a</i>$black and zero on the number line.
The absolute value of $vio<i>a</i>$black is written as $vio&vert;a&vert;$black.
<br/><br/>
Let's look at the number line below.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
The distance between -3 and 0 on the number line is 3.
The distance between +3 and 0 on the number line is also 3.
The absolute value of both -3 and +3 is therefore 3.
<br/><br/>
Thus, $vio&vert;-3&vert;$black = $vio&vert;3&vert;$black = $vio 3$black.
<br/><br/>
$red<u>Rule-based Definition<br/>of Absolute Value</u>$black
<br/><br/>
We can define the absolute value of a number $vio<i>a</i>$black as follows:
<br/><br/>
$vio&vert;a&vert;$black = $vio a $black if a &GreaterEqual; 0<br/> 
and<br/>
$vio&vert;a&vert;$black = $vio -a $black if a &leq; 0 
<br/><br/>
Note that based on the definition above, the absolute value of any negative number is positive since the negative of any negative number is positive.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Exercise</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#E6FEED' bordercolor='#D2FBD8'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1
Evaluate the following expressions using the definition of absolute value:<br/><br/>$tfont1
1. &vert;11-17&vert;<br/><br/>
2. &vert;7x&vert; if x = -4<br/><br/>
3. &vert;21&vert; - &vert;-42&vert;<br/><br/>
4. &vert;-72&vert; + &vert;-36&vert;<br/><br/>
5. &vert;127-230&vert; - &vert;-214&vert;
</td>
</tr></table>
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont4 Answers to the Exercise </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#EEEEEE' bordercolor='#DDDDDD'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2
1. &vert;11-17&vert; = &vert;-6&vert; = $vio<b>6</b>$black<br/><br/>
2. &vert;7x&vert; if x = -4 = &vert;-28&vert; = $vio <b>28</b>$black<br/><br/>
3. &vert;21&vert; - &vert;-42&vert; = 21 - 42 = $vio <b>-21</b>$black<br/><br/>
4. &vert;-72&vert; + &vert;-36&vert; = 72 + 36 = $vio <b>108</b>$black<br/><br/>
5. &vert;127-230&vert; - &vert;-214&vert; = &vert;-103&vert; - 214 = 103 - 214 = $vio <b>-111</b>$black

</tr></table>



"
?>




















