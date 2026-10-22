<?php
$grd=$grd;
$title="Linear Inequalities<br/>in One Variable";
$img1="images/linear-ineq1.jpg";
$img2="images/linear-ineq2.jpg";
$img3="images/linear-ineq3.jpg";

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

A linear inequality is a statement that compares two linear expressions that are not equal to each other.
It uses any of the following symbols: $blue >$black, $blue <$black, $blue &geq;$black, $blue &leq;$black.
<br/><br/>
In this lesson, we will only deal with linear inequalities in one variable.
Here are examples of single-variable linear inequalities:
<br/><br/>
1. 7x + 1 > 582
<br/><br/>
2. r + 13 &geq; 37
<br/><br/>
3. -2/5 y + 1/3 &leq; 3/8
<br/><br/>
4. 2(7 + 3k) &geq; 86
<br/><br/>
5. 3(s - 11) &leq; 59 + 5s
<br/><br/><br/>
@blue
Solving Linear Inequalities
@nblue
<br/>
Solving a linear equation means finding all the points that satisfy it.
Likewise, solving a linear inequality means finding all the points that satisfy the inequality.
<br/><br/>
Solving linear inequalities is very similar to solving linear equations, except that multiplying or dividing both sides of an inequality by a negative factor reverses the inequality sign.
Let's now look at some examples of how to solve linear inequalities.
<br/><br/>
$red Example # 1$black
<br/><br/>
Solve and graph the following linear inequality:
<br/><br/>$vio
3x -12 < 15
<br/><br/>
$blue Solution:$black
<br/><br/>
3x -12 < 15
<br/><br/>
3x < 15 + 12
<br/><br/>
3x < 27
<br/><br/>
x < 9
<br/><br/>
Thus, the solution set to this inequality includes all real numbers less than 9.
<br/><br/>
The graph of this inequality is as follows:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
The open circle at 9 indicates that 9 is not included in the solution set.
<br/><br/>
$red Example # 2$black
<br/><br/>
Solve and graph the following linear inequality:
<br/><br/>$vio
6 + 5(2-x) < 41
<br/><br/>
$blue Solution:$black
<br/><br/>
6 + 5(2-x) < 41
<br/><br/>
6 + 10 - 5x < 41
<br/><br/>
-5x < 41 - 6 - 10
<br/><br/>
-5x < 25
<br/><br/>
x > -5
<br/><br/>
Note that the last step in the solution above involves multiplying both sides by a negative number, -5.
This step reversed the inequality sign from '<' to '>'.
<br/><br/>
The graph of this inequality is as follows:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
Again, the open circle at -5 indicates that -5 is not included in the solution set.
<br/><br/>
$red Example # 3$black
<br/><br/>
Solve and graph the following linear inequality:
<br/><br/>$vio
4(5-3x) &geq; 8x + 60
<br/><br/>
$blue Solution:$black
<br/><br/>
4(5-3x) &geq; 8x + 60
<br/><br/>
20 - 12x &geq; 8x + 60
<br/><br/>
-12x - 8x &geq; 60 - 20 
<br/><br/>
-20x &geq; 40 
<br/><br/>
x &leq; -2
<br/><br/>
Note that the last step in the solution above involves multiplying both sides by a negative number, -20.
This step reversed the inequality sign from '&geq;' to '&leq;'.
<br/><br/>
The graph of this inequality is as follows:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
The shaded circle at -2 indicates that -2 is included in the solution set.

"
?>
