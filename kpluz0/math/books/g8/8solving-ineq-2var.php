<?php
$grd=$grd;
$title="Solving Two-Variable<br/>Linear Inequalities";
$img1="images/inequality1.jpg";
$img2="images/inequality2.jpg";
$img3="images/inequality3.jpg";

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

In the last lesson, we learned what linear equations are and how to solve them.
In this lesson, we will do the same for linear inequalities.
<br/><br/>
A linear inequality is a statement that compares two linear expressions that are not equal to each other.
It uses any of the following symbols: $blue >$black, $blue <$black, $blue &geq;$black, $blue &leq;$black.
<br/><br/>
Solving a linear equation means finding all the points that satisfy it.
Likewise, solving a linear inequality means finding all the points that satisfy the inequality.
<br/><br/>
$vio<u>Corresponding Equations</u>$black
<br/><br/>
Every inequality has a corresponding equation. 
For example, the equation
<br/><br/>$vio
y = -3x - 7
<br/><br/>$black
is the corresponding equation for each of these inequalities:
<br/><br/>$vio
y < -3x - 7<br/>
y <= -3x -7<br/>
y > -3x - 7<br/>
y >= -3x -7
<br/><br/>$black
Did you notice that the only difference between an inequality and its corresponding equation is the symbol relating the left and right sides?
<br/><br/>
The graph of the corresponding equation of a linear inequality is a straight line.
This line plays an important role when solving a linear inequality graphically - it serves as the boundary of the solution to the inequality.
<br/><br/><br/>
@blue
Solving Linear Inequalities<br/>Using Graphs
@nblue
<br/>
The most common way to solve a linear inequality is by producing a graph that shows all the points that satisfy the inequality.
<br/><br/>
This is done in two steps:
<br/><br/>
1. identify the boundary of the points using the corresponding equation, and
<br/><br/>
2. find all the points lying inside this boundary.
<br/><br/>
If the symbol of the inequality is &geq; or &leq;, the graph of the inequality includes the boundary (the line of the corresponding equation).
Otherwise, the boundary is not included in the solution, and the solution just consists of all the points inside the boundary.
<br/><br/><br/>
$red Example # 1$black
<br/><br/>
Solve the following linear inequality graphically:
<br/><br/>$vio
y - x <= 2
<br/><br/>$black
We can rewrite this inequality into this form:
<br/><br/>$vio
y <= x + 2
<br/><br/>$black
The first step is to graph the line of its corresponding equation
<br/><br/>$vio
y = x + 2
<br/><br/>$black
This line is the boundary of the solution.
<br/><br/>
Since the symbol in the inequality is &leq;, this line should be included in the solution and should therefore be graphed as a solid line.
All values of y that are less than x + 2 satisfy the inequality. These are the points below the boundary.
<br/><br/>
Thus, to show the solution to the inequality graphically, we simply need to shade the area of the graph below the boundary as follows:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
Before we tackle the next example, note that doing any of the following does not affect the symbol of an inequality:
<br/><br/>
1. adding or subtracting a number from both sides
<br/><br/>
2. multiplying or dividing both sides by a positive number
<br/><br/>
However, multiplying or dividing both sides by a negative number reverses the inequality sign.
<br/><br/>
For example, if we multiply both sides of $vio y > x + 1 $black by -2, we'd get $vio -2y < -2x - 2$black.
<br/><br/>
Let's look at more examples of how to simplify linear inequalities.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Solve for $vio i $black in the following linear inequality:
<br/><br/>$vio
-3i - 15j > 21
$black<br/><br/>
As usual, the first step is to isolate the dependent variable on the left side by putting everything else on the right side:
<br/><br/>$vio
-3i > 15j + 21 
$black<br/><br/>
Dividing both sides of the inequality above by -3 would give us what we're looking for:
<br/><br/>$vio
i < -5j - 7
$black<br/><br/>
Note that the inequality symbol was reversed because we divided both sides by a negative number.
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
Solve for $vio s $black in the following linear inequality:
<br/><br/>$vio
-12s + 75t < 15t + 96
$black<br/><br/>$blue Solution: 
<br/><br/>$vio
-12s < -60t + 96
<br/><br/>
s > 5t - 8
<br/><br/>$black
The example below shows how to graphically solve an inequality that involves inequality symbol reversal. 
<br/><br/><br/>
$red Example # 4$black
<br/><br/>
Solve the following linear inequality graphically:
<br/><br/>$vio
-2y < -6x + 2
<br/><br/>$black
We can simplify the inequality $vio -2y < -6x + 2 $black
by dividing both sides by -2 and come up with this form:
<br/><br/>$vio
y > 3x - 1
<br/><br/>$black
The first step is to graph the line of its corresponding equation
<br/><br/>$vio
y = 3x - 1
<br/><br/>$black
Again, this line is the boundary of the solution.
<br/><br/>
Since the symbol in the inequality is &gt;, this line is NOT included in the solution and should therefore be graphed as a dashed line.
<br/><br/>
All values of y that are greater than 3x - 1 compose the solution to the inequality. On the graph, these are the points above the boundary.
<br/><br/>
Thus, to show the solution to the inequality graphically, we simply need to shade the area of the graph above the dashed line boundary as follows:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/><br/>
@blue
Solving Systems of Linear<br/>Inequalities Using Graphs
@nblue
<br/>
We can also solve a linear system of two or more inequalities by graphing.
<br/><br/>
Consider the following system of inequalities:
<br/><br/>$vio
y &leq; x - 3<br/>
-2y &leq; 2x + 4
<br/><br/>$black
Before we proceed, let us first simplify the second inequality to get the following:
<br/><br/>$vio
y &leq; x - 3<br/>
y &geq; -x - 2
<br/><br/>$black
To solve this system of inequalities graphically, we simply need to graph the corresponding solution of each inequality on the same plane and get the region they share in common.
The points in this common region will satisfy BOTH inequalities.
<br/><br/>
The solution to the inequality $vio y &leq; x - 3$black is the yellow shaded region.
<br/><br/>
The solution to the inequality $vio y &geq; -x - 2$black is the blue shaded region.
<br/><br/>
The solution to the system is the region where both solutions overlap or the region that got shaded twice (shown as the GREEN area below): 
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>

"
?>
