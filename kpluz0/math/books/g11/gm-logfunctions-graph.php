<?php
$grd=$grd;
$title="Graph of a<br/>Logarithmic Function";
$img1="images/logfunc-graph1.jpg";
$img2="images/logfunc-graph2.jpg";
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
In the last lesson, we learned how to represent logarithmic functions using their tables of values.
In this lesson, we will learn how to represent logarithmic functions using their graphs.
<br/><br/>
Logarithmic functions can be represented in the form $blue y = log<sub>a</sub>(x)$black, where a is the base of the logarithm and x is the variable.
<br/><br/>
The most important characteristic of the graph of a logarithmic function is that it is asymptotic to the x-axis as x approaches 0. This means that the graph gets closer and closer to the x-axis, but never touches it, as x gets smaller. The graph of a logarithmic function also has a y-intercept of (0,1) because when x = a^1 = a, the function is equal to 1.
<br/><br/>
The graph of a natural logarithmic function is similar to the graph of a logarithmic function, since they are based on the same concept of inverse exponential functions. 
<br/><br/>
The main difference is that a natural logarithm has the base e and it is denoted by log(x) or ln(x). The graph of a natural logarithmic function is also asymptotic to the x-axis as x approaches 0, and it has a y-intercept of (0,1)
<br/><br/><br/>
@blue
Steps for Graphing<br/>a Logarithmic Function
@nblue
<br/><br/>
Below are the basic steps for graphing a logarithmic function:
<br/><br/>$vio<u>
Step 1: Generate coordinates.
</u>$black<br/><br/>
The first step is to generate ordered pairs (coordinates) for f(x) in preparation for the graphing. This involves creating a table of values with many points.
<br/><br/>$vio<u>
Step 2: Plot the points and<br/>graph the function.
</u>$black<br/><br/>
The next step is to plot the points from the table of values and then connect these points to form a smooth curve. 
<br/><br/><br/>
@blue
Examples of Using Graphs to<br/>Represent Logarithmic Functions
@nblue
<br/><br/>
$vio Example # 1$black
<br/><br/>
Graph the logarithmic function f(x) = 2log(x)-10. 
<br/><br/>
Let's now go through the steps given above to graph the logarithmic function of f(x) = 2log(x)-10.
<br/><br/>$vio<u>
Step 1: Generate coordinates.
</u>$black<br/><br/>
A possible table of values after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>2log(x)-10</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.10</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -12</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -10</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 10</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -8</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 30</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -7.046</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 60</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -6.44</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 90</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -6.09</td>
</tr>
</table>
<br/><br/>$vio<u>
Step 2: Plot the points and<br/>graph the function.
</u>$black<br/><br/>
After plotting the points from the table of values above and graphing the function, you should get something like what's shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graph of f(x)=2log(x)-5</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
$vio Example # 2$black
<br/><br/>
Graph the logarithmic function f(x) = ln(x<sup>2</sup>)-5. 
<br/><br/>
Let's now go through the steps given above to graph the logarithmic function of f(x) = ln(x<sup>2</sup>)-5.
<br/><br/>$vio<u>
Step 1: Generate coordinates.
</u>$black<br/><br/>
A possible table of values after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>ln(x<sup>2</sup>)-5</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -40</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2.378</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -20</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.991</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -5</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -5</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 20</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0.991</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 40</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2.378</td>
</tr>
</table>
<br/><br/>$vio<u>
Step 2: Plot the points and<br/>graph the function.
</u>$black<br/><br/>
After plotting the points from the table of values above and graphing the function, you should get something like what's shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graph of f(x)=ln(x<sup>2</sup>)-5</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
Note that because x is squared in the function, the graph has 2 mirror-image curves - one on each side of x=0. The domain of this function is all real numbers except zero.

"
?>
