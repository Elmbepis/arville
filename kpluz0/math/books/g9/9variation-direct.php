<?php
$grd=$grd;
$title="Direct Variation";
$img1="images/variation1.jpg";
$img2="images/variation2.jpg";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:20pt;color:#0000BB'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:32pt;color:#0000BB'>"; 
	}

$col="<td align='center' width='32%' style='padding-right:20px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2";
$col2="<td align='center' width='36%' style='padding-right:20px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2";

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

A direct variation is a linear function defined by an equation that can be written in the following form:
<br/><br/>$vio
y = kx
<br/><br/>$black
where k &ne; 0.
<br/><br/>
In the equation above, k is called the constant of variation and we can say that 'y varies directly as x.'
<br/><br/>
Consider the table below:
<br/><br/><br/>
<table width='90%' align='left'><tr><td align='left'><b>$tfont3 Table 1. Beef Weight Vs. Price </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='left' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>$col$tfont1<b> Weight (W)<br/>(kilos)</b></td>$col$tfont1<b> Price (P)<br/>(pesos)</b></td>$col2 $tfont1<b> Ratio<br/>(pesos/kilo)</b></td></tr>
<tr>$col 1 </td>$col 300 </td>$col2 300</td></tr>
<tr>$col 2 </td>$col 600 </td>$col2 300</td></tr>
<tr>$col 4 </td>$col 1200 </td>$col2 300</td></tr>
<tr>$col 6 </td>$col 1800 </td>$col2 300</td></tr>
</table>
<br clear='all'>
<br clear='all'>
<br clear='all'>
The table above shows the prices of beef for different weights. Note that the ratio of the price to the weight is constant at 300 pesos/kilo.
The data in the table above may be defined by the following linear function, which is basically a direct variation:
<br/><br/>$vio
P = 300 W
<br/><br/>$black
We can say that the price of beef varies directly as its weight and the constant of variation is the beef's price per kilo, or 300 pesos/kilo.
<br/><br/>
We can see from Table 1 above that any ordered pair (x,y) from a direct variation should produce the same y/x ratio, which is the constant of variation.
Let's look at how this is applied in the examples below.
<br/><br/><br/>
$red Example # 1$black
<br/><br/>
State whether the function defined by the ordered pairs below is a direct variation or not.
<br/><br/>
$vio L = {(2,8), (5,20), (12,48)}<br/>$black
<br/><br/>
$blue Solution: $black
<br/><br/>
for (2,8): k = 8/2 = 4<br/>
for (5,20): k = 20/5 = 4<br/>
for (12,48): k = 48/12 = 4<br/>
<br/><br/>
Since all of the ordered pairs produced the same y/x ratio, $vio 4$black, the given function is a $vio direct variation$black.
<br/><br/><br/>
$red Example # 2$black
<br/><br/>
State whether the function defined by the ordered pairs below is a direct variation or not.
<br/><br/>
$vio L = {(3,4.5), (5,7.5), (7,11.5)}<br/>$black
<br/><br/>
$blue Solution: $black
<br/><br/>
for (3,4.5): k = 4.5/3 = 1.5<br/>
for (5,7.5): k = 7.5/5 = 1.5<br/>
for (7,11.5): k = 48/12 = 1.64<br/>
<br/><br/>
Since the y/x ratio of the third ordered pair is not the same as that of the first two ordered pairs, the given function is $vio NOT a direct variation$black.
<br/><br/><br/>
@blue
Graphs of<br/>Direct Variations
@nblue
<br/><br/>
If we graph the data in Table 1 above, we'd get something like this:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
We can see from above that the graph of a function that's a direct variation is a straight line whose slope equals the constant of variation.
<br/><br/>
The higher the constant of variation of a direct variation, the steeper its graph will be, as shown below.
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/><br/>
@blue
Problems Involving<br/>Direct Variations
@nblue
<br/><br/>
Before we look at some problems involving direct variations, note that k is also referred to as the constant of proportionality, since the ratio of the dependent variable to the independent variable is constant.
The variation $vio y=kx $black is then read as 'y is directly proportional to x' or 'y varies proportionally as x.' 
<br/><br/><br/>
$red Example # 3$black
<br/><br/>
Given that y is directly proportional to x with a constant of proportionality equal to 2.5, write the direct variation equation and find y when x = 12.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kx<br/>
k = 2.5<br/>
The equation is therefore $vio y = 2.5 x$black.<br/>
When x = 12, y = (2.5)(12) = $vio 30$black.
<br/><br/><br/>
$red Example # 4$black
<br/><br/>
Given that y varies directly as x, find the constant of variation k if y = 12 when x = 36 and write the direct variation equation.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kx<br/>
k = y/x<br/>
k = 12/36 = $vio 1/3$black<br/>
The equation is therefore $vio y = x/3$black.
<br/><br/><br/>
$red Example # 5$black
<br/><br/>
Given that y varies proportionally as x, and y = 3.9 when x = 1.2, write the direct variation equation and find y when x = 2.8.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kx<br/>
k = y/x<br/>
k = 3.9/1.2 = $vio 3.25$black<br/>
The equation is therefore $vio y = 3.25 x$black.
When x = 2.8, y = (3.25)(2.8) = $vio 9.1$black.

"
?>
