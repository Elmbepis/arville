<?php
$grd=$grd;
$title="Table of Values of a<br/>Logarithmic Function";
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

A logarithmic function can be represented in a few different ways, including a table of values and a graph. 
In this lesson, we will take a look at how to represent aa logarithmic function using its table of values.
<br/><br/>
Representing a logarithmic function through its table of values is just like representing rational, inverse, and exponential functions through their tables of values, which we've already learned to do in the past.
<br/><br/>
To create a table of values for a logarithmic function, we can plug in a set of arbitrary input values, calculate the corresponding output values, and then organize the results in a table. 
<br/><br/><br/>
@blue
Examples of Using Tables to<br/>Represent Logarithmic Functions
@nblue
<br/><br/>
$red<u> Example # 1</u>$black
<br/><br/>
Consider the logarithmic function<br/>$vio f(x)=log(x+2)$black. 
<br/><br/>
A possible table of values after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x)=log(x+2)</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 x</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 f(x)</td>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.301</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.4771</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.6021</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.6989</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.7782</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 5</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.845</td>
</tr>
</table>
<br/><br/>
The table above shows that, unlike an exponential function, the increase in the output value of a logarithmic function becomes slower as the value of x increases.
<br/><br/>
$red<u> Example # 2</u>$black
<br/><br/>
Consider the logarithmic function<br/>$vio f(x)=2ln(x+5)$black. 
<br/><br/>
A possible table of values after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x)=2ln(x+5)</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 x</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 f(x)</td>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1.38629</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2.19722</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2.77259</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3.21888</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3.58352</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3.89182</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4.15888</td>
</tr>
</table>
<br/><br/>
Again, the table above shows that, unlike an exponential function, the increase in the output value of a logarithmic function becomes slower as the value of x increases.
"
?>
