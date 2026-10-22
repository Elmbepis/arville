<?php
$grd=$grd;
$title="Joint Variation";
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

$col="<td align='center' width='26%' style='padding-right:20px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2";
$col2="<td align='center' width='22%' style='padding-right:20px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2";

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

A joint variation is a function defined by an equation that can be written in the following form:
<br/><br/>$vio
y = kxz
<br/><br/>$black
where k &ne; 0.
<br/><br/>
In the equation above, k is called the constant of variation and we can say that 'y varies jointly as x and z' or 'y is jointly proportional to x and z.'
<br/><br/>
Consider the table below:
<br/><br/><br/>
<table width='90%' align='left'><tr><td align='left'><b>$tfont3 Table 1. Box Dimensions and Volumes </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='left' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>$col$tfont1<b> Width (W)<br/>(meters)</b></td>$col$tfont1<b> Height (H)<br/>(meters)</b></td>$col $tfont1<b> Volume (V)<br/>(cu. m.)</b></td>$col2 $tfont1<b> V/WH<br/>(meters)</b></td></tr>
<tr>$col 4 </td>$col 10 </td>$col 480</td>$col2 12</td></tr>
<tr>$col 5 </td>$col 8 </td>$col 480</td>$col2 12</td></tr>
<tr>$col 8 </td>$col 5 </td>$col 480</td>$col2 12</td></tr>
<tr>$col 10 </td>$col 4 </td>$col 480</td>$col2 12</td></tr>
</table>
<br clear='all'>
<br clear='all'>
<br clear='all'>
The table above shows the corresponding volumes for different widths and heights of boxes. You may have guessed already that the constant of variation here is the length of the boxes.
This means that the lengths of all the boxes are the same.
<br/><br/>
The data in the table above may be defined by the following function, which is basically a joint variation:
<br/><br/>$vio
V = 12WH
<br/><br/>$black
We can say that the volume of a box varies jointly as its width and height and the constant of variation is the ratio of the volume to the product of the width and height, or k = V/WH = length = 12 meters.
<br/><br/>
We can see from Table 1 above that any ordered triple (x,y,z) from a joint variation produces the same y/xz ratio, which is the constant of variation.
Let's look at how this is applied in the examples below.
<br/><br/><br/>
$red Example # 1$black
<br/><br/>
State whether the function defined by the ordered triples below is a joint variation or not.
<br/><br/>
$vio L = {(3,6,90), (5,9,225), (4,7,140)}<br/>$black
<br/><br/>
$blue Solution: $black
<br/><br/>
for (3,6,90): k = 90/18 = 5<br/>
for (5,9,225): k = 225/45 = 5<br/>
for (4,7,140): k = 140/28 = 5<br/>
<br/><br/>
Since all of the ordered triples produced the same y/xz ratio, $vio 5$black, the given function is a $vio joint variation$black.
<br/><br/><br/>
$red Example # 2$black
<br/><br/>
State whether the function defined by the ordered triples below is a joint variation or not.
<br/><br/>
$vio L = {(2,5,80), (7,3,189), (9,12,756)}<br/>$black
<br/><br/>
$blue Solution: $black
<br/><br/>
for (2,5,80): k = 80/10 = 10<br/>
for (7,3,189): k = 189/21 = 9<br/>
for (9,12,756): k = 756/108 = 7<br/>
<br/><br/>
Since the y/xz ratios produced by the ordered triples are different from each other, the given function is $vio NOT a joint variation$black.
<br/><br/><br/>
@blue
Problems Involving<br/>Joint Variations
@nblue
<br/><br/><br/>
$red Example # 3$black
<br/><br/>
Given that y is jointly proportional to x and z with a constant of proportionality equal to 3.6, write the joint variation equation and find y when x = 5 and z = 7.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kxz<br/>
k = 3.6<br/>
The equation is therefore $vio y = 3.6 xz$black.<br/>
When x = 5 and z = 7,<br/>y = (3.6)(5)(7) = $vio 126$black.
<br/><br/><br/>
$red Example # 4$black
<br/><br/>
Given that y varies jointly as x and z, find the constant of variation k if y = 1683 when x = 11 and z = 17 and write the joint variation equation.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kxz<br/>
k = y/xz<br/>
k = 1683/[(11)(17)] = 1683/187 = $vio 9$black<br/>
The equation is therefore $vio y = 9xz$black.
<br/><br/><br/>
$red Example # 5$black
<br/><br/>
Given that y varies jointly as x and z, and y = 0.336 when x = 1.2 and z = 0.7, write the joint variation equation and find y when x = 5.7 and z = 3.2.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kxz<br/>
k = y/xz<br/>
k = 0.336/[(1.2)(0.7)] = 0.336/0.84 = $vio 0.4$black<br/>
The equation is therefore $vio y = 0.4 xz$black.
When x = 5.7 and z = 3.2,<br/>y = (0.4)(5.7)(3.2) = $vio 7.296$black.

"
?>
