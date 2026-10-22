<?php
$grd=$grd;
$title="Finding the<br/>Equation of a Line";
$img1="images/lineq3.jpg";
$img2="images/lineq4.jpg";
$img3="images/lineq5.jpg";

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
In the last lesson we learned that the graph of a two-variable linear equation is a straight line.
We also learned how to produce this graph from its given equation.
<br/><br/>
In this lesson, we will learn the reverse process: finding the equation of a given straight line.
<br/><br/>
Let us recall the definitions of some terms before we start with the lesson:
<br/><br/>
The $vio x-intercept $black of a line is the point where the line crosses the x-axis.
The $vio y-intercept $black of a line, on the other hand, is the point where the line crosses the y-axis.
<br/><br/>
The $vio slope $black of a line, often denoted as $vio<i>m</i>$black, is a number that decribes both the direction and steepness of the line.
<br/><br/>
$blue<u>The Slope-<br/>Intercept Form</u>$black
<br/><br/>
If the slope and y-intercept of a line are known, then its equation can be written using the slope-intercept form.
The slope-intercept form of a line equation is written as follows:
<br/><br/>
$vio y = $red<i>m$vio</i>x + $blue <i>b</i>$black
<br/><br/>
where $red<i>m</i>$black is the slope of the line and $blue<i>b</i>$black is the y-intercept of the line.
<br/><br/>
Consider the line equations below:<br/>
$vio y = $red<i>2$vio</i>x + $blue<i>5</i>$black<br/>
$vio y = $red<i>2$vio</i>x - $blue<i>2</i>$black
<br/><br/>
The line defined by the first equation above has a slope equal to $red<i>2$black</i> and it crosses the y-axis at (0,$blue<i>5</i>$black).
We already know the y-intercept of this line, so we just need one more point to be able to graph this line.
<br/><br/>
We can get the x-intercept by substituting 0 for y in the equation: 0 = 2x + 5 or x = -2.5. 
The line therefore crosses the x-axis at (-2.5,0). 
<br/><br/>
The line defined by the second equation above also has a slope equal to $red<i>2$black</i> but it crosses the y-axis at (0,$blue<i>-2</i>$black).
Again, we can get the x-intercept by substituting 0 for y in the second equation: 0 = 2x - 2 or x = 1. 
The second line therefore crosses the x-axis at (1,0). 
<br/><br/>
The graphs for the two line equations given above look like this:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
As you can see, they have the same slope $red<i>m</i>$black=2, so they are parallel. However, they cross the x- and y- axes at different points.
<br/><br/>
$blue<u>The Point-Slope Form</u>$black
<br/><br/>
The slope $red<i>m</i>$black of a line $red<i>m</i>$black is given by:
<br/><br/><br/>
<table width='900' align='left'><tr><td align='left'>
<img border='0' src='$img2'>
</td></tr></table>
<br clear=left>
<br clear=left>
In the formula above, the line with slope $red<i>m</i>$black passes through the points P(x,y) and P(x<sub>1</sub>,y<sub>1</sub>). 
<br/><br/>
We can derive the point-slope form of a line equation from the slope formula given above.
It is written as follows:
<br/><br/>
$vio y - y<sub>1</sub> = $red<i>m</i>$vio(x - x<sub>1</sub>)$black
<br/><br/>
where m is the slope of the line and (x<sub>1</sub>,y<sub>1</sub>) are the coordinates of a given point on the line.
<br/><br/>
Now, let's try to graph a line with a slope of 1.5 that passes through (3,1).
<br/><br/>
We can use the point-slope form to find another point on the line as follows:
<br/><br/>$vio
y - 1 = 1.5(x - 3)<br/>
y = 1.5x - 4.5 + 1$black
<br/><br/>
This may be simplified into the slope-intercept form: 
<br/><br/>
$vio y = 1.5x - 3.5$black
<br/><br/>
which gives the y-intercept of the line at (0,-3.5).
<br/><br/>
Thus, the graph of this line looks like this:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
A line passes through the points (2,1) and (3,4).
Write its equation in point-slope form, slope-intercept form, and standard form.
<br/><br/>
$blue<u>Solution:</u>$black
<br/><br/>
First, let's find the slope:
<br/><br/>
m = (y - y<sub>1</sub>)/(x - x<sub>1</sub>)<br/>
= (4-1)/(3-2) = 3
<br/><br/>
We can now write the point-slope form as follows:
<br/><br/>
$vio y-1 = 3(x-2)$black or<br/>
$vio y-4 = 3(x-3)$black
<br/><br/>
We can simplify the point-slope form into the slope-intercept form:
<br/><br/>
y-1 = 3(x-2) = 3x - 6 <br/>
$vio y = 3x - 5$black
<br/><br/>
Simplifying the second equation would yield the same result:
<br/><br/>
y-4 = 3(x-3) = 3x-9 <br/> 
$vio y = 3x - 5$black
<br/><br/>
Finally, we can rewrite the slope-intercept form into the standard form as follows:
<br/><br/>
$vio -3x + y = -5
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
A line passes through the points (-2,4) and (-6,1).
Write its equation in point-slope form, slope-intercept form, and standard form.
<br/><br/>
$blue<u>Solution:</u>$black
<br/><br/>
First, let's find the slope:
<br/><br/>
m = (y - y<sub>1</sub>)/(x - x<sub>1</sub>)<br/>
= (1-4)/(-6-(-2)) = -3/-4 = 3/4
<br/><br/>
We can now write the point-slope form as follows:
<br/><br/>
$vio y-1 = 3/4(x+6)$black or<br/>
$vio y-4 = 3/4(x+2)$black
<br/><br/>
We can simplify the point-slope form into the slope-intercept form:
<br/><br/>
y-1 = 3/4(x+6) = 3/4x + 9/2 <br/>
$vio y = 3/4x + 11/2$black
<br/><br/>
Simplifying the second equation would yield the same result:
<br/><br/>
y-4 = 3/4(x+2) = 3/4x + 3/2 <br/> 
$vio y = 3/4x + 11/2$black
<br/><br/>
We can then rearrange the terms to get:<br/>
-3/4x + y = 11/2
<br/><br/>
Finally, we can write the line equation in standard form as follows:
<br/><br/>
$vio -3x + 4y = 22
"
?>
