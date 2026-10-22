<?php
$grd=$grd;
$title="Representing a Rational Function Through Its Graph";
$img1="images/rfunc-graph1.jpg";
$img2="images/rfunc-graph2.jpg";
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
In the last lesson, we learned how to represent rational functions using their tables of values.
In this lesson, we will learn how to represent rational functions using their graphs.
<br/><br/><br/>
@blue
Steps for Graphing<br/>a Rational Function
@nblue
<br/><br/>
Graphing a rational function is an important skill in mathematics, particularly in calculus and algebra. A rational function is a function that can be defined as the quotient of two polynomials, where the numerator and denominator are both polynomials.
<br/><br/>
Below are the steps for graphing a rational function.
<br/><br/>
$vio<u>
1. Identify the x-intercepts of the function.
$black</u>
<br/><br/> 
The x-intercepts of a function are the points at which the function crosses the x-axis. To find the x-intercepts of a rational function, set the numerator equal to zero and solve for x.
<br/><br/>
$vio<u>
2. Identify the y-intercept of the function.
$black</u>
<br/><br/> 
The y-intercept of a function is the point at which the function crosses the y-axis. To find the y-intercept of a rational function, substitute x = 0 into the function and evaluate the expression.
<br/><br/>
$vio<u>
3. Identify the vertical asymptotes.
$black</u>
<br/><br/> 
A vertical asymptote is a vertical line that the graph of the function approaches, but never crosses. 
<br/><br/>
To find the vertical asymptotes, set the denominator equal to zero and solve for x. Any value of x that makes the denominator equal to zero is a vertical asymptote of the function.
<br/><br/>
$vio<u>
4. Identify the horizontal asymptotes.
$black</u>
<br/><br/> 
A horizontal asymptote is a horizontal line that the graph of the function approaches as x approaches positive or negative infinity. 
<br/><br/>
To find the horizontal asymptote, divide the leading coefficients of the numerator and denominator. If the numerator and denominator have the same degree, then the horizontal asymptote is the line y = the leading coefficient of the numerator divided by the leading coefficient of the denominator. If the numerator has a higher degree than the denominator, then the function has no horizontal asymptote.
<br/><br/>
$vio<u>
5. Plot the points.
$black</u>
<br/><br/> 
Using the information found in steps 1-4, plot the x-intercepts, y-intercept, and asymptotes on the graph. Also, plot a few points between the asymptotes to get an idea of what the graph looks like.
<br/><br/>
$vio<u>
6. Draw the graph.
$black</u>
<br/><br/> 
Draw a smooth curve that goes through the plotted points and approaches the asymptotes.
<br/><br/> 
By following these steps, you can easily graph a rational function and visualize its behavior. Graphing rational functions can help you understand the relationship between the numerator and denominator, and how they determine the shape of the graph.
<br/><br/><br/>
@blue
Examples of Using Graphs to<br/>Represent Rational Functions
@nblue
<br/><br/>
$vio Example # 1$black
<br/><br/>
Graph the rational function<br/>f(x) = (x + 5)/(x - 1). 
<br/><br/>
Let's now go through the steps given above to graph the rational function f(x) = (x + 5)/(x - 1).
<br/><br/>
1. Identify the x-intercepts
<br/><br/>
To find the x-intercepts of the function, we set the numerator equal to zero and solve for x:
<br/><br/>
x + 5 = 0<br/>
x = -5
<br/><br/>
So the only x-intercept of the function is at (-5, 0).
<br/><br/>
2. Identify the y-intercept
<br/><br/>
To find the y-intercept of the function, we substitute x = 0 into the function:
<br/><br/>
f(0) = (0 + 5)/(0 - 1) = -5
<br/><br/>
So the y-intercept of the function is at (0, -5).
<br/><br/>
3. Identify the vertical asymptotes
<br/><br/>
To find the vertical asymptotes of the function, we set the denominator equal to zero and solve for x:
<br/><br/>
x - 1 = 0
x = 1
<br/><br/>
So there is a vertical asymptote at x = 1.
<br/><br/>
4. Identify the horizontal asymptotes
<br/><br/>
To find the horizontal asymptote of the function, we divide the leading coefficients of the numerator and denominator:
<br/><br/>
y = (leading coefficient of the numerator) / (leading coefficient of the denominator)
= 1 / 1
= 1
So there is a horizontal asymptote at y =1
<br/><br/>
We can now plot the intercepts and asymptotes and draw the final graph.
The graph you'd get for this function would look something like the shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graph of<br/>f(x) = (x + 5)/(x - 1)</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
$vio Example # 2$black
<br/><br/>
Graph the rational function<br/>f(x) = (x<sup>2</sup> + 2)/(x - 2). 
<br/><br/>
To graph this function, we can again apply the steps above.
<br/><br/>
1. There are no real x-intercepts.
<br/><br/>
2. The y-intercept is (0, -1).
<br/><br/>
3. There is a vertical asymptote at x = 2.
<br/><br/>
4. Since the degree of the numerator is greater than the degree of the denominator, there is no horizontal asymptote.
<br/><br/>
We can now plot the intercepts and asymptotes and draw the final graph.
The graph you'd get for this function would look something like the shown below.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graph of<br/>f(x) = (x<sup>2</sup> +2)/(x - 2)</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>

"
?>
