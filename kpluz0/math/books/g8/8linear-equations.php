<?php
$grd=$grd;
$title="Linear Equations<br/>and their Graphs";
$img1="images/lineq1.jpg";
$img2="images/lineq2.jpg";

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

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="
A linear equation is a first-order equation with two or more variables.
As an equation of the first order, each of its variables has an exponent of one.
<br/><br/>
These are examples of linear equations:
<br/><br/>
1. $vio 3x - 2y = 9$black<br/>
2. $vio 11s + 13t - 45 = 12$black<br/>
3. $vio 3(2g + 3h) = 36$black<br/>
4. $vio -5a - 7b + 2c = 24$black
5. $vio y = 4x - 7z + 29$black<br/>
<br/><br/>
The variables of the equations above all have an exponent of 1.
<br/><br/>
The following, on the other hand, are not linear equations:
<br/><br/>
1. $vio 5x<sup>2</sup> - 4y = 11$black<br/>
2. $vio 11j + 13k<sup>3</sup> = 121$black<br/>
3. $vio 7(4m<sup>2</sup> + 9n<sup>2</sup>) = 450$black<br/>
4. $vio x<sup>4</sup> + 6y - 8z = 220$black<br/>
5. $vio -15b - 4c<sup>1/2</sup> + 5d = 47$black
<br/><br/>
At least one variable in each of the equations above has an exponent that's not equal to 1.
<br/><br/>
$blue<u>Standard Form of Two-<br/>Variable Linear Equations</u>$black
<br/><br/>
A linear equation in two variables gives a straight line when plotted on a graph.
The standard form of a linear equation in two variables is as follows:
<br/><br/>
$vio Ax + By = C$black
<br/><br/>
where A, B, and C are integers and A and B are not both zero.
<br/><br/>
Thus, the following linear equations are in standard form:
<br/><br/>
1. $vio 7x + 5y = 12$black<br/>
2. $vio 11s - 13t = 49$black<br/>
3. $vio v - 3w = 5$black
<br/><br/>
$blue<u>Graphing Two-Variable<br/>Linear Equations</u>$black
<br/><br/>
Consider the linear equation in two variables below:<br/>
$vio 2x - y = -3$black
<br/><br/>
To graph this equation, we can randomly choose a few values for x and then compute for their corresponding values of y to satisfy the equation.
To make it easier to calculate the values of y, we can rewrite the equation into the non-standard form<br/>$vio y = 2x + 3$black.
<br/><br/>
If we tabulate the pairs of x and y values, we'll get a table like this:
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Tabulated (x,y) Values<br/>of <i>y = 2x+3</i></b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center'>$tfont4 x<td align='center'>$tfont4 y<td align='center'>$tfont4 (x,y)</tr>
<tr><td align='center'>$tfont1 -3<td align='center'>$tfont1 2(-3)+3 = -3<td align='center'>$tfont1 (-3,-3)</tr>
<tr><td align='center'>$tfont1 -2<td align='center'>$tfont1 2(-2)+3 = -1<td align='center'>$tfont1 (-2,-1)</tr>
<tr><td align='center'>$tfont1 -1<td align='center'>$tfont1 2(-1)+3 = 1<td align='center'>$tfont1 (-1,1)</tr>
<tr><td align='center'>$tfont1 0<td align='center'>$tfont1 2(0)+3 = 3<td align='center'>$tfont1 (0,3)</tr>
<tr><td align='center'>$tfont1 1<td align='center'>$tfont1 2(1)+3 = 5<td align='center'>$tfont1 (1,5)</tr>
</td></tr></table>
<br/><br/>
We can plot each ordered pair of x and y values in the table above on a graph.
If we connect the points on the graph together, it would look like this:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
As you can see, the graph of the linear equation $vio 2x - y = -3 $black is a straight line.
<br/><br/>
Let's look at another example.
Let's try to graph the linear equation below:<br/>
$vio 2x + 3y = 6$black
<br/><br/>
Again, we can randomly choose a few values for x and then compute for their corresponding values of y to satisfy the equation.
To make it easier to calculate the values of y, we can rewrite the equation into the non-standard form<br/>$vio y = (6-2x)/3$black or $vio y = -&#8532;x+2$black.
<br/><br/>
Note that we only need two points to graph a straight line, but let's generate three pairs of x and y values so the third point can confirm that the line is straight.
This is now our table:
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Tabulated (x,y) Values<br/>of <i>y = (-2/3)x+2</i></b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center'>$tfont4 x<td align='center'>$tfont4 y<td align='center'>$tfont4 (x,y)</tr>
<tr><td align='center'>$tfont1 -3<td align='center'>$tfont1 (-2/3)(-3)+2 = 4<td align='center'>$tfont1 (-3,4)</tr>
<tr><td align='center'>$tfont1 0<td align='center'>$tfont1 (-2/3)(0)+2 = 2<td align='center'>$tfont1 (0,2)</tr>
<tr><td align='center'>$tfont1 3<td align='center'>$tfont1 (-2/3)(3)+2 = 0<td align='center'>$tfont1 (3,0)</tr>
</td></tr></table>
<br/><br/>
If we plot the tabulated values above, the graph would look like this:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
As you can see, the graph of the linear equation $vio 2x + 3y = 6$black is also a straight line. 
However, the direction of this graph differs from that of the first example.
We will learn in the next lesson why this is so.
"
?>
