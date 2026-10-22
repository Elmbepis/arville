<?php
$grd=$grd;
$title="Representing a Rational<br/>Function Through Its<br/>Table of Values";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="

In previous lessons, we've learned that a rational function is a function of the form f(x) = (P(x))/(Q(x)), where P(x) and Q(x) are polynomials and Q(x) is not equal to zero. 
<br/><br/>
There are several ways to represent a rational function. This could be done through its table of values, graph, or equation.
<br/><br/>
In this lesson, we will take a look at how to represent a rational function through its table of values. 
<br/><br/>
To create a table of values for a rational function, you can substitute a set of x-values into the function and evaluate it to find the corresponding y-values. 
The table of values can then be plotted to give a visual representation of the function.
<br/><br/><br/>
@blue
Examples of Using Tables to<br/>Represent Rational Functions
@nblue
<br/><br/>
$vio Example # 1$black
<br/><br/>
Consider the rational function f(x) = (3x - 4)/(x + 2). A possible table of values for this function after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x) = (3x - 4)/(x + 2) </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -4</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 8</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 13</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 Undefined</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -7</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1/3</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1/2</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4/3</td>
</tr>
</table>
<br/><br/> 
$vio Example # 2$black
<br/><br/>
Consider the rational function f(x) = (x<sup>2</sup> - 4)/(x + 2). A possible table of values for this function after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x) = (x<sup>2</sup> - 4)/(x + 2) </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='50%' align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont4 x
<td width='50%' align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont4 f(x)
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -5</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 Undefined</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 5</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
</tr>
</table>
<br/><br/>
$vio Example # 3$black
<br/><br/>
Consider the rational function f(x) = (2x<sup>2</sup> - 2)/(x + 4). A possible table of values for this function after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x) = (2x<sup>2</sup> - 2)/(x + 4) </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -4</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 Undefined</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 16</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1/2</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 16/7</td>
</tr>
<tr>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4</td>
<td width='50%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 15/4</td>
</tr>
</table>



"
?>
