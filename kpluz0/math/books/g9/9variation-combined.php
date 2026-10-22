<?php
$grd=$grd;
$title="Combined Variation";
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

A combined variation is a function defined by an equation that can be written in the following form:
<br/><br/>$vio
y = kx/z
<br/><br/>$black
where k &ne; 0 and z &ne; 0.
<br/><br/>
In the equation above, k is called the constant of variation and we can say that 'y varies directly as x and inversely as z' or 'y is directly proportional to x and inversely proportional to z.'
<br/><br/>
Consider the table below:
<br/><br/><br/>
<table width='90%' align='left'><tr><td align='left'><b>$tfont3 Table 1. Example of Combined Variation </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='left' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>$col$tfont1<b> x </b></td>$col$tfont1<b> z </b></td>$col $tfont1<b> y </b></td>$col2 $tfont1<b> yz/x </b></td></tr>
<tr>$col 16 </td>$col 8 </td>$col 18</td>$col2 9</td></tr>
<tr>$col 18 </td>$col 6 </td>$col 27</td>$col2 9</td></tr>
<tr>$col 21 </td>$col 3 </td>$col 63</td>$col2 9</td></tr>
<tr>$col 24 </td>$col 2 </td>$col 108</td>$col2 9</td></tr>
</table>
<br clear='all'>
<br clear='all'>
<br clear='all'>
The data in the table above may be defined by the following function, which is basically a combined variation:
<br/><br/>$vio
y = 9x/z
<br/><br/>$black
We can see from Table 1 above that any ordered triple (x,y,z) from a combined variation produces the same yz/x ratio, which is the constant of variation.
Let's look at how this is applied in the examples below.
<br/><br/><br/>
$red Example # 1$black
<br/><br/>
State whether the function defined by the ordered triples (x,y,z) below is a combined variation with the equation y=kx/z or not.
<br/><br/>
$vio L = {(2,4,8), (7,28,4), (9,72,2)}<br/>$black
<br/><br/>
$blue Solution: $black
<br/><br/>
for (2,4,8): k = (4)(8)/2 = 16<br/>
for (7,28,4): k = (28)(4)/7 = 16<br/>
for (9,72,2): k = (72)(2)/9 = 16<br/>
<br/><br/>
Since all of the ordered triples produced the same yz/x ratio, $vio 16$black, the given function is a $vio combined variation$black.
<br/><br/><br/>
$red Example # 2$black
<br/><br/>
State whether the function defined by the ordered triples (x,y,z) below is a combined variation with the equation y=kx/z or not.
<br/><br/>
$vio L = {(9,18,1.2), (5,15,0.6), (6,8,2.4)}<br/>$black
<br/><br/>
$blue Solution: $black
<br/><br/>
for (9,18,1.2): k = (18)(1.2)/9 = 2.4<br/>
for (5,15,0.6): k = (15)(0.6)/5 = 1.8<br/>
for (6,8,2.4): k = (8)(2.4)/6 = 3.2<br/>
<br/><br/>
Since the yz/x ratios produced by the ordered triples are different from each other, the given function is $vio NOT a combined variation$black.
<br/><br/><br/>
@blue
Problems Involving<br/>Combined Variations
@nblue
<br/><br/><br/>
$red Example # 3$black
<br/><br/>
If y is directly proportional to x and inversely proportional to z with a constant of proportionality equal to 9, write the combined variation equation and find y if x = 7 and z = 3.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kx/z<br/>
k = 9<br/>
The equation is therefore $vio y = 9x/z$black.<br/>
If x = 7 and z = 3,<br/>y = 9(7)(3) = $vio 21$black.
<br/><br/><br/>
$red Example # 4$black
<br/><br/>
If y is directly proportional to x and inversely proportional to z, find the constant of variation k if y = 40 when x = 8 and z = 5 and write the combined variation equation.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kx/z<br/>
k = yz/x<br/>
k = (40)(5)/8 = 200/8 = $vio 25$black<br/>
The equation is therefore $vio y = 25x/z$black.
<br/><br/><br/>
$red Example # 5$black
<br/><br/>
If y varies directly as x and inversely as z, and y = 38 when x = 19 and z = 7, write the combined variation equation and find y when x = 2.4 and z = 1.3.
<br/><br/>
$blue Solution: $black
<br/><br/>
y = kx/z<br/>
k = yz/x<br/>
k = (38)(7)/19 = 266/19 = $vio 14$black<br/>
The equation is therefore $vio y = 14x/z$black.
When x = 2.4 and z = 1.3,<br/>y = (14)(2.4)/1.3 = $vio 25.85$black.

"
?>
