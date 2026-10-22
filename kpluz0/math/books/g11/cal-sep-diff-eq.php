<?php
$grd=$grd;
$title="Solving Separable<br/>Differential Equations";
$img1="images/evt.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";

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

A differential equation is a mathematical equation that involves one or more derivatives of an unknown function with respect to one or more independent variables. In simpler terms, it is an equation that relates a function to its rate of change. 
<br/><br/>
These equations are commonly used in various scientific and engineering fields to model dynamic systems and describe how functions evolve over time or in response to changes in one or more variables.
<br/><br/>
A separable differential equation is a specific type of ordinary differential equation (ODE) that can be written in a form where the variables can be separated on either side of the equation, making it possible to solve the equation 
by integrating both sides separately. In essence, a separable differential equation is one that can be separated into two parts, each of which depends on a single variable. 
<br/><br/>
The general form of a separable ODE is:
<br/><br/>
$pink dy/dx = g(x) &middot; h(y)$black
<br/><br/>
where dy/dx is the derivative of the dependent variable y with respect to the independent variable x, g(x) is a function of x only, and h(y) is a function of y only.
<br/><br/>
The key characteristic of a separable differential equation is that it can be manipulated to isolate x and y on opposite sides of the equation, which allows for integration to find the general solution. 
The process typically involves integrating both sides separately with respect to their respective variables. 
<br/><br/>
Solving separable differential equations is a common technique in calculus and differential equations. These equations can be separated into two parts, each involving only one variable. The process for solving them typically involves integrating both sides to 
find the general solution. 
<br/><br/><br/>
@blue
Steps Used in<br/>Solving Separable<br/>Differential Equations
@nblue
<br/><br/>
Below are the steps used in solving separable differential equations.
<br/><br/>$vio<u> 
1. Identify a separable<br/>differential equation.
</u>$black<br/><br/>
A separable differential equation is one that can be written in the form 
<br/><br/>
$pink dy/dx = g(x) &middot; h(y)$black
<br/><br/>
where g(x) is a function of x only, and h(y) is a function of y only.
<br/><br/>
The goal is to separate the variables x and y on each side of the equation.
<br/><br/>$vio<u> 
2. Rearrange the equation.
</u>$black<br/><br/>
If necessary, rearrange the equation to isolate dy/dx on one side and g(x) &middot; h(y) on the other side. It should look like this:
<br/><br/>
$pink dy/dx = g(x) &middot; h(y)$black
<br/><br/>$vio<u> 
3. Separate the variables.
</u>$black<br/><br/>
Divide both sides of the equation to separate the variables x and y as follows:
<br/><br/>
$pink dy/h(y) = g(x)dx$black
<br/><br/>$vio<u> 
4. Integrate both sides.
</u>$black<br/><br/>
Integrate both sides with respect to their respective variables:
<br/><br/>
$pink &#8747; dy/h(y) = &#8747; g(x)dx + C$black
<br/><br/>
where C represents the constant of integration.
<br/><br/>$vio<u> 
5. Get and simplify the general solution.
</u>$black<br/><br/>
After solving both integrals, you'll get an expression that relates y and x. Simplify this expression to express y in terms of x. The expression of y in terms of x is the general solution to the separable differential equation.
<br/><br/>$vio<u> 
6. Include the constant of integration.
</u>$black<br/><br/>
Remember to include the constant of integration, C, when solving both integrals. This constant accounts for variations in the solution and can be determined by initial conditions if provided.
<br/><br/>$vio<u> 
7. Consider initial conditions (optional)
</u>$black<br/><br/>
If you have initial conditions, you can use them to find the particular solution that satisfies those conditions.
<br/><br/><br/>
@blue
Example of<br/>Solving Separable<br/>Differential Equations
@nblue
<br/><br/>
Solve the following separable differential equation for y.
<br/><br/>
$pink dy/dx = 2xy$black
<br/><br/>$vio<u> 
1-2. Identify and rearrange the<br/>separable differential equation.
</u>$black<br/><br/>
$pink dy/dx = 2xy$black
<br/><br/>$vio<u> 
3. Separate the variables.
</u>$black<br/><br/>
dy/y = 2xdx
<br/><br/>$vio<u> 
4. Integrate both sides.
</u>$black<br/><br/>
&#8747; dy/y = &#8747; 2xdx $black
<br/><br/>
$pink ln|y| + C<sub>1</sub> = x<sup>2</sup> + C<sub>2</sub> $black
<br/><br/>$vio<u> 
5-6. Get and simplify the general solution, including the constant of integration.
</u>$black<br/><br/>
ln|y| = x<sup>2</sup> + C
<br/><br/>
y = e<sup>x<sup>2</sup> + C</sup>
<br/><br/>
$pink y = &plusmn; Ce<sup>x<sup>2</sup></sup>$black
 
"
?>
