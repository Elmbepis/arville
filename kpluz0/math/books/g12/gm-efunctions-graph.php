<?php
$grd=$grd;
$title="The Graph of an<br/>Exponential Function";
$img1="images/efunc-graph1.jpg";
$img2="images/efunc-graph2.jpg";
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
In the last lesson, we learned how to represent exponential functions using their tables of values.
In this lesson, we will learn how to represent exponential functions using their graphs.
<br/><br/>
The output of an exponential function f(x) is a positive number that increases or decreases rapidly as x varies. 
As such, the graph of an exponential function is a curve that either rises sharply or falls rapidly as x moves to the left or right.
<br/><br/><br/>
@blue
Steps for Graphing<br/>an Exponential Function
@nblue
<br/><br/>
Below are the basic steps for graphing an exponential function:
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
Examples of Using Graphs to<br/>Represent Exponential Functions
@nblue
<br/><br/>
$vio Example # 1$black
<br/><br/>
Graph the exponential function f(x) = 2<sup>x</sup>-7. 
<br/><br/>
Let's now go through the steps given above to graph the exponential function of f(x) = 2<sup>x</sup>-7.
<br/><br/>$vio<u>
Step 1: Generate coordinates.
</u>$black<br/><br/>
A possible table of values after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x)=2<sup>x</sup>-7</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -10</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -6.99</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -6.75</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -6</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -5</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -3</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 9</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 5</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 25</td>
</tr>
</table>
<br/><br/>$vio<u>
Step 2: Plot the points and<br/>graph the function.
</u>$black<br/><br/>
After plotting the points from the table of values above and graphing the function, you should get something like what's shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graph of f(x)=2<sup>x</sup>-7</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
Notice how the curve rapidly rises after the value of x exceeds 0.
<br/><br/>
$vio Example # 2$black
<br/><br/>
Graph the exponential function f(x) = e<sup>2x</sup>+3. 
<br/><br/>
Let's now go through the steps given above to graph the exponential function of f(x) = e<sup>2x</sup>+3.
<br/><br/>$vio<u>
Step 1: Generate coordinates.
</u>$black<br/><br/>
A possible table of values after substituing several arbitrary values of x into f(x) is shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Table of Values for<br/>f(x)=e<sup>2x</sup>+3</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='600' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -60</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 -2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 3.018</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 0</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 4</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 1</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 10.39</td>
</tr>
<tr>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 2</td>
<td width='33%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 57.6</td>
</tr>
</table>
<br/><br/>$vio<u>
Step 2: Plot the points and<br/>graph the function.
</u>$black<br/><br/>
After plotting the points from the table of values above and graphing the function, you should get something like what's shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graph of f(x)=e<sup>2x</sup>+3</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
Notice how the curve rapidly rises after the value of x exceeds 0.
"
?>
