<?php
$grd=$grd;
$title="Graphs of<br/>Polynomial Functions";
$img1="images/lineq1.jpg";
$img3="images/quadfunc1.jpg";
$img4="images/quadfunc2.jpg";
$img5="images/quadfunc3.jpg";
$img6="images/quadfunc4.jpg";
$img7="images/quadfunc5.jpg";
$img8="images/cubicfunc1.jpg";

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

In an earlier lesson, we learned what polynomial functions are.
In this lesson, we will take a look at the graphs of some polynomial functions
<br/><br/><br/>
@blue
Graphs of First-Degree<br/>Polynomial Functions
@nblue
<br/><br/>
A polynomial function is said to be a linear or first-degree function if it can be written in the form $vio f(x) = mx + b$black where m &ne; 0.
A linear function gives a straight line when plotted on a graph.
<br/><br/>
$red<u>Example # 1</u>$black<br/><br/>
Consider the linear function below:<br/>
$vio f(x) = 2x + 3$black
<br/><br/>
For convenience, let's rewrite this function using the variable y for f(x) in this manner:<br/>
$vio f(x) = 2x + 3$black
<br/><br/>
To graph this equation, we can randomly choose a few values for x and then compute for their corresponding values of y to satisfy the equation.
<br/><br/>
If we tabulate the pairs of x and y values, we'll get a table like this:
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Tabulated (x,y) Values<br/>of the Function <i>y = 2x+3</i></b></td></tr><tr><td>&nbsp;</td></tr></table>
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
As you can see, the graph of the linear function $vio y = 2x + 3 $black is a straight line.
<br/><br/><br/>
@blue
Graphs of Second-Degree<br/>Polynomial Functions
@nblue
<br/><br/>
In the last lesson, we learned that a quadratic or second-degree function is a function that is defined by an equation of the form
<br/><br/>
$vio<b>f(x) = ax<sup>2</sup> + bx + c</b>$black or<br/>
$vio<b>y = ax<sup>2</sup> + bx + c</b>$black 
<br/><br/>
where a, b, and c are real numbers and a is not equal to zero. 
This is the standard form of a quadratic function.
<br/><br/>
The graph of the function $vio<b>y = ax<sup>2</sup></b>$black is the basic parabola, as shown below where a=1.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
The vertical line that divides the parabola into two congruent halves is called the $vio axis of symmetry $black of the parabola. 
For each point on the graph, there is a corresponding point on the other side of this axis.
<br/><br/>
The $vio vertex $black of a parabola is the point of intersection of the parabola itself and its axis of symmetry. 
Thus, the axis of symmetry of a parabola always passes through the vertex, so the x -coordinate of the vertex is the equation of the axis of symmetry.
<br/><br/>
For a quadratic function in standard form, $vio<b>y = ax<sup>2</sup> + bx + c</b>$black, the axis of symmetry is the vertical line x=-b/2a.
The x-coordinate of the vertex of a parabola is therefore equal to -b/2a.
You may then plug this value of x into the function to get the y-coordinate of the vertex.
<br/><br/>
In the graph of the function y = x<sup>2</sup> above, the vertex is at (0,0) and the axis of symmetry is the y-axis itself (x=0).
It opens upward, so the vertex is also its minimum point.
<br/><br/>
The graph of the function y = -x<sup>2</sup> is shown below. It is congruent to the graph above because they have the same size and shape.
However, it opens downward, so the vertex is also its maximum point.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/><br/>
Let's look at some more examples of quadratic functions.
<br/><br/>
$red<u>Example # 2</u>$black 
<br/><br/>
Consider the quadratic function below.
<br/><br/>$vio
y = x<sup>2</sup> - 4x + 3$black
<br/><br/>
Because a>0, the parabola opens upward.
<br/><br/>
We can get the coordinates of the vertex as follows:
<br/><br/>
x = -b/2a = 4/2 = 2<br/>
y = 4 - 8 + 3 = -1
<br/><br/>
The vertex is therefore at $blue(2,-1)$black.
<br/><br/>
Now that we know the location of the vertex and axis of symmetry, we can generate the coordinates of other points on the parabola.
We can use the symmetry of the parabola along x=-b/2a to generate the coordinates of pairs of mirror-image points.
<br/><br/>
Each pair of mirror-image points will have x-coordinates that are equidistant from the vertex.
They will also have the same value of y-coordinate, which will be obtained by plugging the x-coordinate into the function.
<br/><br/>
Here are the coordinates (shown in blue) of two of the mirror-image pairs of points on the parabola:
<br/><br/>
For x=2-1=$vio 1$black and x=2+1=$vio 3$black:<br/>
If x =$vio 1$black, then y = (1)<sup>2</sup> - 4 + 3 = $vio 0$black: $blue (1,0)$black.
<br/>
If x =$vio 3$black, then y = (3)<sup>2</sup> - 12 + 3 = $vio 0$black: $blue (3,0)$black.
<br/><br/>
For x=2-2=$vio 0$black and x=2+2=$vio 4$black:<br/>
If x =$vio 0$black, then y = (0)<sup>2</sup> - 0 + 3 = $vio 6$black: $blue (0,3)$black.
<br/>
If x =$vio 4$black, then y = (4)<sup>2</sup> - 16 + 3 = $vio 6$black: $blue (4,3)$black.
<br/><br/>
The graph of the function y = x<sup>2</sup> - 4x + 3, which corresponds to the coordinates above, is shown below. 
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img5'>
</td></tr></table>
<br/><br/>
$red<u>Example # 3</u>$black 
<br/><br/>
Consider the quadratic function below.
<br/><br/>$vio
y = x<sup>2</sup> - 6x + 11$black
<br/><br/>
Because a>0, the parabola opens upward.
<br/><br/>
We can get the coordinates of the vertex as follows:
<br/><br/>
x = -b/2a = 6/2 = 3<br/>
y = 9 -18 + 11 = 2
<br/><br/>
The vertex is therefore at $blue(3,2)$black.
<br/><br/>
Here are the coordinates (shown in blue) of two of the mirror-image (relative to the axis of symmetry) pairs of points on the parabola:
<br/><br/>
For x=3-1=$vio 2$black and x=3+1=$vio 4$black:<br/>
If x =$vio 2$black, then y = (2)<sup>2</sup> - 12 + 11 = $vio 3$black: $blue (2,3)$black.
<br/>
If x =$vio 4$black, then y = (4)<sup>2</sup> - 24 + 11 = $vio 3$black: $blue (4,3)$black.
<br/><br/>
For x=3-2=$vio 1$black and x=3+2=$vio 5$black:<br/>
If x =$vio 1$black, then y = (1)<sup>2</sup> - 6 + 11 = $vio 6$black: $blue (1,6)$black.
<br/>
If x =$vio 5$black, then y = (5)<sup>2</sup> - 30 + 11 = $vio 6$black: $blue (5,6)$black.
<br/><br/>
The graph of the function y = x<sup>2</sup> - 6x + 11, which corresponds to the coordinates above, is shown below. 
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img6'>
</td></tr></table>
<br/><br/>
A quadratic function may also be written in its vertex form:
<br/><br/>
$vio<b>y = a(x-h)<sup>2</sup> + k</b>$black 
<br/><br/>
where h and k are the x- and y-coordinates of the vertex of the parabola. 
<br/><br/>
$red<u>Example # 4</u>$black 
<br/><br/>
Consider the quadratic function below.
<br/><br/>$vio
y = -(x-3)<sup>2</sup> + 2$black
<br/><br/>
Because a<0, the parabola opens downward.
<br/><br/>
Based on the function's vertex form, the vertex is at $blue(3,2)$black.
The axis of symmetry is therefore the line x=3.
<br/><br/>
Here are the coordinates (shown in blue) of two of the mirror-image (relative to the axis of symmetry) pairs of points on the parabola:
<br/><br/>
For x=3-1=$vio 2$black and x=3+1=$vio 4$black:<br/>
If x =$vio 2$black, then y = -(2-3)<sup>2</sup> + 2 = $vio 1$black: $blue (2,1)$black.
<br/>
If x =$vio 4$black, then y = -(4-3)<sup>2</sup> + 2 = $vio 1$black: $blue (4,1)$black.
<br/><br/>
For x=3-2=$vio 1$black and x=3+2=$vio 5$black:<br/>
If x =$vio 1$black, then y = -(1-3)<sup>2</sup> + 2 = $vio 1$black: $blue (1,-2)$black.
<br/>
If x =$vio 5$black, then y = -(5-3)<sup>2</sup> + 2 = $vio 1$black: $blue (5,-2)$black.
<br/><br/>
The graph of the function y = -(x-3)<sup>2</sup> + 2, which corresponds to the coordinates above, is shown below. 
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img7'>
</td></tr></table>
<br/><br/><br/>
@blue
Graphs of Third-Degree<br/>Polynomial Functions
@nblue
<br/><br/>
A polynomial function is said to be a cubic or third-degree polynomial function if it can be written in the following form:
<br/><br/>
$vio y = ax<sup>3</sup> + bx<sup>2</sup> + cx + d = 0 $black wherein a &ne; 0.
<br/><br/>
The graph of a typical cubic polynomial function is a curved line that changes direction twice and crosses the x-axis three times.
The three x-intercepts of a cubic polynomial function are the points where y = 0, so they represent the zeros of the function.
<br/><br/>
To graph, the cubic polynomial function, you therefore need to find its zeros to determine the x-intercepts.
You also need additional points, which would normally include the y-intercepts.
<br/><br/>
$red<u>Example # 3</u>$black 
<br/><br/>
Let's try to graph the cubic function below.
<br/><br/>$vio
$vio y = x<sup>3</sup> - 7x + 6$black
<br/><br/>
The first step is to factor the polynomial function as follows:<br/>
$vio y = (x+3)(x-2)(x-1)$black
<br/><br/>
Each factor is then equated to 0 to find the zeros:<br/>
x + 3 = 0 or x = -3<br/>
x - 2 = 0 or x = 2<br/>
x - 1 = 0 or x = 1
<br/><br/>
The zeros are therefore $vio -3$black, $vio 2$black, and $vio 1$black and
the x-intercepts are $vio (-3,0)$black, $vio (2,0)$black, and $vio (1,0)$black.
<br/><br/>
To find the y-intercept, we simply need to substitute 0 for x in the function:<br/>
y = (3)(-2)(-1) = $vio 6$black
<br/><br/>
The y-intercept is therefore $vio (0,6)$black.
<br/><br/>
The more (x,y) ordered pairs you use, the more accurate the appearance of your graph will be.
Below's a rough approximation of the graph of $vio y = x<sup>3</sup> - 7x + 6 $black based on the points we have.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img8'>
</td></tr></table>


"
?>
