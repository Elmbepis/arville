<?php
$grd=$grd;
$title="Solving Systems of<br/>Nonlinear Equations";
$img1="images/nonlin-eqgra1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

Solving systems of nonlinear equations refers to finding the values of the variables that satisfy a set of equations that cannot be solved using linear methods. These equations may include polynomials with a degree of 2 or more, logarithms, exponentials, or other nonlinear functions. 
<br/><br/>
There are several methods available for solving systems of nonlinear equations, including graphing, substitution, and elimination.
<br/><br/><br/>
@blue
Graphing Method
@nblue
<br/><br/>
One common method for solving systems of nonlinear equations is graphing. This method involves creating a graph of each equation in the system and visually identifying the points of intersection, 
which correspond to the solutions of the system. 
<br/><br/>
Graphing is a useful method when the equations in the system can be easily plotted and the solutions are easily recognizable. 
However, it is not always practical or possible to graph a nonlinear equation, especially if the equations are complex or in a high-dimensional space.
<br/><br/>$red<u>
Example # 1
</u>$black<br/><br/>
Solve this system of nonlinear equations: 
<br/><br/>
$blue y = x<sup>2</sup> + 3<br/>
y = -x<sup>2</sup> + 9 $black
<br/><br/>
using the graphing method. 
<br/><br/>
$vio Solution:$black
<br/><br/>
Graph both equations together as follows: 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
The solutions to this system of nonlinear equations are their points of intersection: $vio (-sqrt(3), 6)$black and $vio (sqrt(3),6)$black.
<br/><br/><br/>
@blue
Substitution Method
@nblue
<br/><br/>
Another method for solving systems of nonlinear equations is substitution. This method involves solving one of the equations in the system for one variable in terms of the other variables, 
and then substituting this expression into the other equations in the system. 
<br/><br/>
After this substitution, the new equation will only contain a single variable, the value(s) of which can now be solved for.
The value(s) of the remaining variable can then be plugged back into the original equations to get the value(s) of the second variable.
<br/><br/>
This method can be useful when one of the equations in the system is simpler than the others and can be easily solved for one variable. However, substitution can be difficult if the equations are highly nonlinear and cannot be easily solved for one variable.
<br/><br/>$red<u>
Example # 1
</u>$black<br/><br/>
Solve this system of nonlinear equations: 
<br/><br/>
$blue y = 3 - x<sup>2</sup><br/>
y = x + 1 $black
<br/><br/>
using the substitution method. 
<br/><br/>
$vio Solution:$black
<br/><br/>
Substitute the value of y in the first equation into the second equation: 
<br/><br/>
3 - x<sup>2</sup> = x + 1 <br/>
x<sup>2</sup> + x - 2 = 0 <br/>
(x + 2)(x - 1) = 0 <br/>
x = -2 and x = 1 <br/>
y = 3 - (-2)<sup>2</sup> = -1 <br/>
y = 3 - (1)<sup>2</sup> = 2
<br/><br/>
Thus, the solutions to the equations are $vio (-2, -1)$black and $vio (1,2)$black.
<br/><br/>$red<u>
Example # 2
</u>$black<br/><br/>
Solve this system of nonlinear equations: 
<br/><br/>
$blue y = x + 3<br/>
x<sup>2</sup> + y<sup>2</sup> = 9 $black
<br/><br/>
using the substitution method. 
<br/><br/>
$vio Solution:$black
<br/><br/>
Substitute the value of y in the first equation into the second equation: 
<br/><br/>
x<sup>2</sup> + (x + 3)<sup>2</sup> = 9<br/>
x<sup>2</sup> + x<sup>2</sup> + 6x + 9 = 9<br/>
2x<sup>2</sup> + 6x = 0<br/>
x(2x + 6) = 0<br/>
x = 0 and x = -3<br/>
y = 0 + 3 = 3<br/>
y = -3 + 3 = 0
<br/><br/>
Thus, the solutions to the equations are<br/>$vio (0, 3)$black and $vio (-3,0)$black.
<br/><br/>$red<u>
Example # 3
</u>$black<br/><br/>
Solve this system of nonlinear equations: 
<br/><br/>
$blue y = -x - 1<br/>
x<sup>2</sup> + y<sup>2</sup> = 13 $black
<br/><br/>
using the substitution method. 
<br/><br/>
$vio Solution:$black
<br/><br/>
Substitute the value of y in the first equation into the second equation: 
<br/><br/>
x<sup>2</sup> + (-x - 1)<sup>2</sup> = 13<br/>
x<sup>2</sup> + x<sup>2</sup> + 2x + 1 = 13<br/>
2x<sup>2</sup> + 2x - 12 = 0<br/>
x<sup>2</sup> + x - 6 = 0<br/>
(x + 3)(x - 2) = 0<br/>
x = -3 and x = 2<br/>
y = -(-3) - 1 = 2<br/>
y = -2 - 1 = -3
<br/><br/>
Thus, the solutions to the equations are<br/>$vio (-3, 2)$black and $vio (2,-3)$black.
<br/><br/><br/>
@blue
Elimination Method
@nblue
<br/><br/>
A third method for solving systems of nonlinear equations is elimination. 
<br/><br/>
This method involves manipulating the equations in the system in order to make one of the terms of the equations identical to each other, such that subtracting one equation from the other would eliminate this term and produce
an equation with only one variable. 
<br/><br/>
This equation can then be solved for the remaining variable.  The value(s) of the remaining variable may then be plugged back into the original equations to get the value(s) of the other variable. 
<br/><br/>
This method can be useful when two equations in the system are relatively simple and can be easily manipulated to eliminate one of the variables. 
However, elimination can be difficult if the equations are highly nonlinear and cannot be easily manipulated to eliminate one of the variables.
<br/><br/>$red<u>
Example # 1
</u>$black<br/><br/>
Solve this system of nonlinear equations: 
<br/><br/>
$blue x<sup>2</sup> + 5y<sup>2</sup> = 25<br/>
x<sup>2</sup> + 4y<sup>2</sup> = 24 $black
<br/><br/>
using the elimination method. 
<br/><br/>
$vio Solution:$black
<br/><br/>
Since the first terms of the equations are already identical, we can just subtract the second equation from the first equation to get this:
<br/><br/>
5y<sup>2</sup> - 4y<sup>2</sup> = 1<br/>
y<sup>2</sup> = 1<br/>
y = 1 and y = -1<br/>
x<sup>2</sup> + 5 = 25<br/>
x<sup>2</sup> = 20<br/>
x<sup>2</sup> = sqrt(20)<br/>
x = sqrt(20) and x = -sqrt(20)<br/>
<br/><br/>
Thus, the solutions to the equations are<br/>$vio (sqrt(20), 1)$black, $vio (-sqrt(20),1)$black, $vio (sqrt(20), -1)$black and $vio (-sqrt(20),-1)$black.
<br/><br/>$red<u>
Example # 2
</u>$black<br/><br/>
Solve this system of nonlinear equations: 
<br/><br/>
$blue 4x<sup>2</sup> - 2y = 4<br/>
2x<sup>2</sup> + y = 6 $black
<br/><br/>
using the elimination method. 
<br/><br/>
$vio Solution:$black
<br/><br/>
Multiply the second equation by 2 to make its first term the same as the first term of the first equation:
<br/><br/>
4x<sup>2</sup> + 2y = 12 $black
<br/><br/>
Subtract the first equation from the modified second equation to eliminate their first terms:
<br/><br/>
2y - (-2y) = 12 - 4<br/>
4y = 8<br/>
y = 2
<br/><br/>
Plug this value for y back into the original second equation to get x:
<br/><br/>
2x<sup>2</sup> + 2 = 6<br/>
2x<sup>2</sup> = 4<br/>
x<sup>2</sup> = 2<br/>
x = sqrt(2) and x = -sqrt(2)
<br/><br/>
Thus, the solutions to the equations are<br/>$vio (sqrt(2), 2)$black and $vio (-sqrt(2),2)$black.
<br/><br/>$red<u>
Example # 3
</u>$black<br/><br/>
Solve this system of nonlinear equations: 
<br/><br/>
$blue y - x<sup>2</sup> = - 4<br/>
x<sup>2</sup> + y<sup>2</sup> = 6 $black
<br/><br/>
using the elimination method. 
<br/><br/>
$vio Solution:$black
<br/><br/>
Add the two equations then solve for y:
<br/><br/>
y + y<sup>2</sup> = 2<br/>
y<sup>2</sup> + y - 2 = 0<br/>
(y + 2)(y - 1) = 0<br/>
y = -2 and y = 1<br/>
-2 - x<sup>2</sup> = - 4<br/>
x<sup>2</sup> = 2<br/>
x = sqrt(2) or x = -sqrt(2) if y = -2<br/>
1 - x<sup>2</sup>= - 4<br/>
x<sup>2</sup>= 5<br/>
x = sqrt(5) or x = -sqrt(5) if y = 1
<br/><br/>
Thus, the solutions to the equations are<br/>$vio (sqrt(2), -2)$black, $vio (-sqrt(2), -2)$black, $vio (sqrt(5), 1)$black and $vio (-sqrt(5),1)$black.



"
?>
