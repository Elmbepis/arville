<?php
$grd=$grd;
$title="Inverse Variation";
$img1="images/variation3.jpg";
$img2="images/variation4.jpg";

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

$col="<td align='center' width='36%' style='padding-right:20px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2";
$col2="<td align='center' width='28%' style='padding-right:20px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2";

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

An inverse variation is a function defined by an equation that can be written in the following form:
<br/><br/>$vio
y = k/x
<br/><br/>$black
where k &ne; 0 and x &ne; 0.
<br/><br/>
In the equation above, k is called the constant of variation and we can say that 'y varies inversely as x' or 'y is inversely proportional to x.'
<br/><br/>
Note that in an inverse variation, $vio k = xy$black, so it is the product of the independent and dependent variables that is constant.
<br/><br/>
In a direct variation, a change in the independent variable produces a proportional change in the dependent variable.
As such, an increase in the former also results in an increase in the latter.
<br/><br/>
In an inverse variation, however, the dependent variable decreases as the independent variable increases and vice versa.
<br/><br/>
Consider the table below:
<br/><br/><br/>
<table width='90%' align='left'><tr><td align='left'><b>$tfont3 Table 1. Volume Vs. Pressure </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='left' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>$col$tfont1<b> Volume (V)<br/>(cm<sup>3</sup>)</b></td>$col$tfont1<b> Pressure (P)<br/>(in. Hg)</b></td>$col2 $tfont1<b>V x P</b></td></tr>
<tr>$col 210 </td>$col 30 </td>$col2 6300</td></tr>
<tr>$col 252 </td>$col 25 </td>$col2 6300</td></tr>
<tr>$col 315 </td>$col 20 </td>$col2 6300</td></tr>
<tr>$col 420 </td>$col 15 </td>$col2 6300</td></tr>
</table>
<br clear='all'>
<br clear='all'>
<br clear='all'>
The table above shows the pressure of gas for different volumes. Note that the product of the volume and the pressure is constant at 6300.
The data in the table above may be defined by the following function, which is basically an inverse variation:
<br/><br/>$vio
P = 6300/V
<br/><br/>$black
We can say that the pressure of gas varies inversely as its volume and the constant of variation is 6300.
<br/><br/>
We can see from Table 1 above that any ordered pair (x,y) from an inverse variation should produce the same product xy, which is the constant of variation.
Let's look at how this is applied in the examples below.
<br/><br/><br/>
$red Example # 1$black
<br/><br/>
State whether the function defined by the ordered pairs below is an inverse variation or not.
<br/><br/>
$vio L = {(2,24), (3,16), (4,12), (8,6)}<br/>$black
<br/><br/>
$blue Solution: $black
<br/><br/>
for (2,24): k = (2)(24) = 48<br/>
for (3,16): k = (3)(16) = 48<br/>
for (4,12): k = (4)(12) = 48<br/>
for (8,6): k = (8)(6) = 48<br/>
<br/><br/>
Since all of the ordered pairs produced the same constant of variation, $vio 48$black, the given function is indeed an $vio inverse variation$black.
<br/><br/><br/>
$red Example # 2$black
<br/><br/>
State whether the function defined by the ordered pairs below is an inverse variation or not.
<br/><br/>
$vio L = {(2,25), (3,18), (4,14), (9,8)}<br/>$black
<br/><br/>
$blue Solution: $black
<br/><br/>
for (2,25): k = (2)(25) = 50<br/>
for (3,18): k = (3)(18) = 54<br/>
for (4,14): k = (4)(14) = 56<br/>
for (9,8): k = (9)(8) = 72<br/>
<br/><br/>
Since the products of the ordered pairs in this function are not the same, the given function is NOT an $vio inverse variation$black.
<br/><br/><br/>
@blue
Graphs of<br/>Inverse Variations
@nblue
<br/><br/>
If we graph the data in Table 1 above, we'd get something like this:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
We can see from above that the graph of a function that's an inverse variation is NOT a straight line.
Thus, unlike a direct variation, an inverse variation is NOT a linear function.
<br/><br/>
The higher the constant of variation of an inverse variation, the farther away is its graph from the axes, as shown below.
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/><br/>
@blue
Problems Involving<br/>Inverse Variations
@nblue
<br/><br/>
Let us now look at some problems involving inverse variations. 
<br/><br/><br/>
$red Example # 3$black
<br/><br/>
If y varies inversely as x, find the constant of variation k if y = 4 when x = 3.5 and write the inverse variation equation.
<br/><br/>
$blue Solution: $black
<br/><br/>
k = xy<br/>
k = (3.5)(4) =$vio 14$black<br/>
The equation is therefore $vio y = 14/x$black.<br/>
<br/><br/><br/>
$red Example # 4$black
<br/><br/>
If y varies inversely as x, and y = 3 when x = 8, write the inverse variation equation and find the value of y when x = 15.
<br/><br/>
$blue Solution: $black
<br/><br/>
k = xy<br/>
k = (3)(8) =$vio 24<br/>$black
The equation is therefore $vio y = 24/x$black.<br/>
When x = 15, y = 24/15 = $vio 1.6$black.
<br/><br/><br/>
$red Example # 5$black
<br/><br/>
The illumination, I, from a light source varies inversely as the square of the light source's distance, d.
If the illumination is 10 foot-candles at a distance of 2 meters, find the illumination at a distance of 4 meters. 
<br/><br/>
$blue Solution: $black
<br/><br/>
I = k/d<sup>2</sup><br/>
k = (I)(d<sup>2</sup>)<br/>
k = (10)(2<sup>2</sup>)<br/>
k = (10)(4) = $vio 40<br/>$black
The equation is therefore $vio I = 40/d<sup>2</sup>$black.<br/>
When d = 4, I = 40/(4<sup>2</sup>) = 40/16 = $vio 2.5$black.

"
?>
