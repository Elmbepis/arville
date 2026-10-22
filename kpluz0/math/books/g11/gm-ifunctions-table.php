<?php
$grd=$grd;
$title="Representing an Inverse<br/>Function Through Its<br/>Table of Values";
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

An inverse function can be represented in a few different ways, including a table of values and a graph. 
In this lesson, we will take a look at how to represent an inverse function using its table of values.
<br/><br/>
Recall that a table of values is a way to show the input and output values of a function in a tabular format. 
Representing an inverse function through its table of values is just like representing a rational function through its table of values, which we've already learned to do in the past.
<br/><br/>
To create a table of values for an inverse function, we can plug in a set of arbitrary input values, calculate the corresponding output values, and then organize the results in a table. 
<br/><br/><br/>
@blue
Examples of Using Tables to<br/>Represent Inverse Functions
@nblue
<br/><br/>
$red<u> Example # 1</u>$black
<br/><br/>
Consider the rational function<br/>$vio f(x) = (x-3)/2$black.<br/> 
We can apply the steps we learned in the last lesson to determine that<br/>$vio f<sup>-1</sup>(x)=2x+3$black.
<br/><br/>
A possible table of values after substituing several arbitrary values of x into f(x) and<br/>f<sup>-1</sup>(x) is shown below.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x)=(x-3)/2 and f<sup>-1</sup>(x)=2x+3 </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 x</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 f(x)</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 f<sup>-1</sup>(x)</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 9</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 21</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 7</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 17</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 5</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 13</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 9</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1/2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 7</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 5</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1.5</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -5</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -4</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -7</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -7</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -5</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -11</td>
</tr>
</table>
<br/><br/>
We can actually glean from the table above how an inverse function works:
<br/><br/>
f(9) = 3 while f<sup>-1</sup>(3) = 9<br/>
f(7) = 2 while f<sup>-1</sup>(2) = 7<br/>
f(5) = 1 while f<sup>-1</sup>(1) = 5<br/>
f(1) = -1 while f<sup>-1</sup>(-1) = 1
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Consider the rational function<br/>$vio f(x) = 3x-1 $black.<br/> 
We can apply the steps we learned in the last lesson to determine that<br/>$vio f<sup>-1</sup>(x)=(x+1)/3$black.
<br/><br/>
A possible table of values after substituing several arbitrary values of x into f(x) and<br/>f<sup>-1</sup>(x) is shown below.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x)=3x-1 and f<sup>-1</sup>(x)=(x+1)/3 </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 x</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 f(x)</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 f<sup>-1</sup>(x)</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 8</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 23</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 5</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 14</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 8</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4/3</td>
</tr>
<tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 5</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1/3</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -4</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -7</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1/3</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -7</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -22</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
</tr>
</table>
<br/><br/>
Again, we can glean from the table above how an inverse function works:
<br/><br/>
f(3) = 8 while f<sup>-1</sup>(8) = 3<br/>
f(2) = 5 while f<sup>-1</sup>(5) = 2<br/>
f(0) = -1 while f<sup>-1</sup>(-1) = 0<br/>
f(-2) = -7 while f<sup>-7</sup>(-1) = -2
<br/><br/>
When creating a table of values for an inverse function, it's important to remember that the input values of the original function become the output values of the inverse function, and vice versa.

"
?>
