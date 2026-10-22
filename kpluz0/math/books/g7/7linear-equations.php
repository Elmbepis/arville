<?php
$grd=$grd;
$title="Linear Equations<br/>in One Variable";
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
1. $vio 3x = 7$black<br/>
2. $vio 2/3p - 15 = 0$black<br/>
3. $vio 17x - 2.56 = 11.47$black<br/>
4. $vio 3x - 2y = 9$black<br/>
5. $vio 11s + 13t - 45 = 12$black<br/>
6. $vio 3(2g + 3h) = 36$black<br/>
7. $vio -5a - 7b + 2c = 24$black
8. $vio y = 4x - 7z + 29$black<br/>
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
The simplest linear equations are those with just a single variable.
The general form of a linear equation in one variable is $vio Ax + B = 0 $black where A is the numerical coefficient of the variable, x is the variable, and B is the constant. 
<br/><br/>
Here are examples of single-variable linear equations in this form:
<br/><br/>
1. $vio 4x - 23 = 0$black<br/>
2. $vio 19p + 4/3 = 0$black<br/>
3. $vio 3.28z - 2.33 = 0$black<br/>
<br/><br/><br/>
@blue
Solving Linear Equations<br/>in One Variable
@nblue
<br/><br/>
To find the final solution of a linear equation, the variables and constants must be segregated from each other by regrouping the terms of the equation. 
Here are the basic steps for solving a linear equation in one variable:
<br/><br/>
1. Put all terms with variables on the left side of the equality sign.
<br/><br/>
2. Put all the constant terms on the right side of the equality sign.
<br/><br/>
3. Add up all the terms with variables on the left side.
<br/><br/>
4. Add up all the constant terms on the right side.
<br/><br/>
5. Divide both sides of the equation by the numerical coefficient of the variable.
<br/><br/>
For steps 1 and 2, don't forget to negate the sign of any term that you transfer to the other side.
Let us now look at some examples of how to apply these steps.
<br/><br/>
$red<u> Example # 1</u>$black
<br/><br/>
Solve the linear equation below:
<br/><br/>
3x + 4x - 16 = 8 - x
<br/><br/>
$blue Solution:$black
<br/><br/>
3x + 4x - 16 = 8 - x
<br/><br/>
Do steps 1 and 2:
<br/><br/>
7x + x = 8 + 16
<br/><br/>
Do steps 3 and 4:
<br/><br/>
8x = 24
<br/><br/>
Do step 5:
<br/><br/>
x = $vio 3 $black
<br/><br/>
Thus, x = 3. We can check this answer by substituting it into the original equation and see if the equation will be true:
<br/><br/>
3x + 4x - 16 = 8 - x
<br/><br/>
3(3) + 4(3) - 16 = 8 - 3
<br/><br/>
9 + 12 - 16 = 5
<br/><br/>
5 = 5 $red <b>&check;</b>
<br/><br/>
$red<u> Example # 2</u>$black
<br/><br/>
Solve the linear equation below:
<br/><br/>
4p - 11 - p = 4 + 2p - 22
<br/><br/>
$blue Solution:$black
<br/><br/>
4p - 11 - p = 4 + 2p - 22
<br/><br/>
Do steps 1 and 2:
<br/><br/>
3p - 2p = -18 + 11 
<br/><br/>
Do steps 3 and 4:
<br/><br/>
p = $vio -7 $black
<br/><br/>
There is no more need for step 5.
<br/><br/>
Thus, x = -7. We can check this answer by substituting it into the original equation and see if the equation will be true:
<br/><br/>
4p - 11 - p = 4 + 2p - 22
<br/><br/>
4(-7) - 11 - (-7) = 4 + 2(-7) - 22
<br/><br/>
-28 - 11 + 7 = 4 - 14 - 22
<br/><br/>
-32 = -32 $red <b>&check;</b>
<br/><br/>
$red<u> Example # 3</u>$black
<br/><br/>
Solve the linear equation below:
<br/><br/>
12x + 30 - 2x - 6 = 10 - 10x
<br/><br/>
$blue Solution:$black
<br/><br/>
12x + 30 - 2x - 6 = 10 - 10x
<br/><br/>
Do steps 1 and 2:
<br/><br/>
10x + 10x = 10 + 6 - 30
<br/><br/>
Do steps 3 and 4:
<br/><br/>
20x = -14
<br/><br/>
Do step 5:
<br/><br/>
x = -14/20 = $vio -7/10 $black
<br/><br/>
Thus, x = -7/10. We can check this answer by substituting it into the original equation and see if the equation will be true:
<br/><br/>
12x + 30 - 2x - 6 = 10 - 10x
<br/><br/>
12(-7/10) + 30 - 2(-7/10) - 6 = 10 - 10(-7/10)
<br/><br/>
-84/10 + 300/10 + 14/10 - 60/10 = 100/10 + 70/10
<br/><br/>
170/10 = 170/10 $red <b>&check;</b>






"
?>
