<?php
$grd=$grd;
$title="Solving Two-Variable<br/>Linear Equations";
$img1="images/lineq6.jpg";
$img2="images/lineq7.jpg";

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

A system of equations is a set of two or more equations.
A system consisting of linear equations is called a linear system.
<br/><br/>
To solve some mathematical problems involving two variables, it it necessary to find a common solution for two equations with these two variables.
Finding a common solution means finding the pair of values for the two variables that satisfies both equations.
<br/><br/>
There are three common ways to solve two-variable linear systems: 
<br/><br/>
1. by using graphs<br/>
2. by addition<br/>
3. by substitution
<br/><br/>
We will take a look at each of these methods in this lesson.
<br/><br/><br/>
@blue
Solving Linear Equations<br/>Using Graphs
@nblue
<br/>
One way to find a common solution for two linear equations is to graph them both on one set of axes and find their point of intersection, if it exists.
<br/><br/>
As an example, let's solve the following linear system graphically:
<br/><br/>$vio
y - x = 3<br/>
y + 2x = -3
$black<br/><br/>
The slope-intercept forms of these equations are as follows:
<br/><br/>$vio
y = x + 3<br/>
y = -2x - 3
$black<br/><br/>
We can now graph these two equations on a single set of axes and come up with something like this: 
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
Based on the graphs above, the point of intersection of the two lines is at (-2,1).
This is the common solution for both equations, which means that substituting -2 for x and 1 for y would satisfy both equations.
<br/><br/><br/>
@blue
Solving Linear Equations<br/>Using Addition
@nblue
<br/>
Another way to find a common solution for two linear equations is by using the addition method.
<br/><br/>
If the coefficients of one variable of two given linear equations are additive inverses of each other, adding the two equations would produce a new equation with only one variable.
One can get the value of this variable from this equation.
<br/><br/>
By the same token, if one variable of two given linear equations are equal to each other, subtracting the two equations would produce a new equation with only one variable, from which the value of the variable may be obtained.
<br/><br/>
Let's again consider the equations given above:
<br/><br/>$vio
y - x = 3<br/>
y + 2x = -3
$black<br/><br/>
The coefficients of the variable y in both equations are equal to 1.
As such, these two equations may simply be subtracted to remove the variable y.
<br/><br/>
Adding two equations simply means adding their terms on the left side and adding terms on their right side.
The same is done for the subtraction of two equations.
<br/><br/>
Here's the result when the two equations above are subtracted:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
As can be seen above, the subtraction of the two equations showed that x = -2 in the common solution.
Substituting -2 for x in either equation would show that y = 1.
The common solution is therefore (-2,1), which is the same result we got above using the graphical solution.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
Find the common solution for the following linear system using the addition method:
<br/><br/>$vio
x + y = 7<br/>
2x - y = 5
$black<br/><br/>
The coefficients of y in the equations above are additive inverses of each other, so the two equations simply need to be added as follows:
<br/><br/>$vio
x + y = 7<br/>
+<br/>
2x - y = 5<br/>
-------------<br/>
3x = 12<br/>
or x = 4$black
<br/><br/>
Substituting 4 for x in the first equation,<br/>
y = 7 - x = 7 - 4 = 3.
<br/><br/>
The common solution for this linear system is therefore $vio(4,3)$black. 
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Find the common solution for the following linear system using the addition method:
<br/><br/>$vio
3x + 4y = -10<br/>
5x - 2y = 18
$black<br/><br/>
None of the variables in the linear system above have coefficients that are additive inverses of each other.
<br/><br/>
Whenever this is a case, we simply need to multiply one of the equations by a factor to make the coefficients of one of the variables equal in absolute value.
The equations may then be added or subtracted to remove this variable.
<br/><br/>
Multiplying an equation by a number simply means multiplying all of its terms on both sides by that number.
The resulting equation is still equivalent to the original equation.
<br/><br/>
In this particular example, we can multiply the second equation by 2, giving us this new equation:
<br/><br/>$vio
10x - 4y = 36.
$black<br/><br/>
This new equation is equivalent to the original second equation, so it may be added to the first equation to find the common solution as follows:
<br/><br/>$vio
3x + 4y = -10<br/>
+<br/>
10x - 4y = 36<br/>
-------------<br/>
13x = 26<br/>
or x = 2$black
<br/><br/>
Substituting 2 for x in the first equation,<br/>
6 + 4y = -10<br/>
4y = -10 - 6 = -16<br/>
y = -4
<br/><br/>
The common solution for this linear system is therefore $vio(2,-4)$black. 
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
Find the common solution for the following linear system using the addition method:
<br/><br/>$vio
5x + 3y = -2<br/>
3x + 2y = -1
$black<br/><br/>
Again, none of the variables in the linear system above have coefficients that are additive inverses of each other.
In fact, all the coefficients are prime, so multiplying only one equation by a factor won't be enough to eliminate one of the variables. 
<br/><br/>
The solution to a problem like this is to multiply the first equation by a certain factor, and then multiply the second equation by another factor, to make the coefficients of one of the variables equal in absolute value.
The equations may then be added or subtracted to remove this variable.
<br/><br/>
In this particular example, we can multiply the first equation by 2 and the second equation by -3, giving us these two equivalent equations:
<br/><br/>$vio
10x + 6y = -4<br/>
-9x - 6y = 3
$black<br/><br/>
We can now add the equations to find the common solution as follows:
<br/><br/>$vio
10x + 6y = -4<br/>
+<br/>
-9x - 6y = 3<br/>
-------------<br/>
x = -1$black
<br/><br/>
Substituting -1 for x in the first equation,<br/>
-5 + 3y = -2<br/>
3y = -2 + 5 = 3<br/>
y = 3/3 = 1
<br/><br/>
The common solution for this linear system is therefore $vio(-1,1)$black. 
<br/><br/><br/>
@blue
Solving Linear Equations<br/>Using Substitution
@nblue
<br/>
The third way to find a common solution for two linear equations is by using the substitution method.
<br/><br/>
To solve a system of equations using the substitution method, use one equation to express one variable in terms of the other.
You may then substitute the newly expressed variable for its corresponding variable in the second equation, producing a new equation that only has one variable.
<br/><br/>
To see what this means, consider the two linear equations below:
<br/><br/>$vio
-x + y = 1<br/>
2x + y = 7
$black<br/><br/>
We can express y in terms of x using the first equation as follows:
<br/><br/>$vio
y = x + 1
$black<br/><br/>
We can now substitute this for y in the second equation as follows:
<br/><br/>$vio
2x + x + 1 = 7
$black<br/><br/>
Let's now solve for x:
<br/><br/>
3x + 1 = 7<br/>
3x = 7 - 1 = 6<br/>
x = 6/3 = 2
<br/><br/>
Let's now get the value of y:
<br/><br/>
y = x + 1 = 2 + 1 = 3
<br/><br/>
The common solution for this linear system is therefore $vio(2,3)$black. 
<br/><br/>
$red<u>Example # 4</u>$black
<br/><br/>
Find the common solution for the following linear system using the substitution method:
<br/><br/>$vio
2x + 3y = -7<br/>
x - 4y = 13
$black<br/><br/>
We can express x in terms of y using the second equation as follows:
<br/><br/>$vio
x = 4y + 13
$black<br/><br/>
We can now substitute this for x in the first equation as follows:
<br/><br/>$vio
2(4y +13) + 3y = -7
$black<br/><br/>
Let's now solve for y:
<br/><br/>
8y + 26 + 3y = -7<br/>
11y = -7 - 26 = -33<br/>
y = -33/11 = -3
<br/><br/>
Let's now get the value of x:
<br/><br/>
x = 4y + 13 = 4(-3) + 13 = 1
<br/><br/>
The common solution for this linear system is therefore $vio(1,-3)$black. 
"
?>
