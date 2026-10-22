<?php

$grd=$grd;
$title="Finding Missing Terms<br/>in Simple Equations";
$red=$font."<font color='#BB0000'><b>";
$vio=$font."<font color='#800080'><b>";
$blue=$font."<font color='#0000CC'><b>";
$black=$font."<font color='#000000'></b>";

$article=" 

An equation is a statement that two mathematical expressions are equal.
The two expressions are connected by the equality symbol, '='.
<br/><br/>
Here are examples of equations:<br/>
3 x 4 + 6 = 18<br/>
5 + 7 - 2 = 12 + 2 - 4<br/>
(8 - 3) x 2 = 3 x (9 - 6) + 1
<br/><br/>
In each of the equations above, the value of the expression on the left equals the value of the expression on the right.
<br/><br/>
Now consider the following equation with a missing term:<br/>
( ___ + 2) x 9 + 3 = 75
<br/><br/>
Is there an easy way to find the missing term?
Fortunately, there is.
<br/><br/>
$vio<u></b>Finding Missing Terms</u>$black
<br/><br/>
When looking for a missing term in an equation, our goal is to isolate the missing term on one side of the equation and its value on the other side.
<br/><br/>
To achieve this, we need to eliminate terms from the equation one at a time.
We do this by doing the inverse of each of the operations in the equation.
<br/><br/>
Below are the pairs of math operations that invert each other.
<br/><br/>
Addition <---> Subtraction<br/>
Multiplication <---> Division<br/>
Exponentiation <---> Getting a Root
<br/><br/>
When perfoming the inverse of an operation, it must be done to both sides of the equation. 
Also, we need to follow the rules of GEMDAS in reverse when we're inverting the operations of an equation.
<br/><br/>
GEMDAS in reverse is SADMEG.
We must therefore invert the operations of an equation in this order: subtraction and addition first, then division and multiplication, then exponentiation and roots.
<br/><br/>
We invert grouped operations last by ungrouping them and then inverting the individual operations again in SADMEG order. 
<br/><br/>
$vio<u></b>Example # 1</u>$black
<br/><br/>
Let's apply these rules to find the missing term of the equation above:<br/>
( ___ + 2) x 9 + 3 = 75
<br/><br/>
We must first invert all additions/subtractions.
We see the operation '+ 3' in the equation, so we must invert this.
The inverse of this operation is '- 3', which must be done to both sides:
<br/><br/>
( ___ + 2) x 9 + 3 - 3 = 75 - 3 or<br/>
( ___ + 2) x 9 = 72
<br/><br/>
Next, we must invert all multiplications and divisions.
We see the operation 'x 9' in the equation, so we must invert this.
The inverse of this operation is '&div; 9', which must be done to both sides:
<br/><br/>
( ___ + 2) x 9 = 72<br/>
( ___ + 2) x 9 &div; 9 = 72 &div; 9 or<br/>
( ___ + 2) x 1 = 72 &div; 9 or<br/>
( ___ + 2) = 8
<br/><br/>
Lastly, we ungroup grouped operations and do each operation in SADMEG order:
<br/><br/>
( ___ + 2) = 8<br/>
 ___ + 2 = 8<br/>
 ___ + 2 - 2 = 8 - 2<br/>
 ___ = 6
<br/><br/>
Thus, the missing term of our equation is 6.
<br/><br/>
$vio<u></b>Checking our Answer</u>$black
<br/><br/>
To check if our answer is correct, let's plug 6 into the blank and follow the GEMDAS order:
<br/><br/>
(6 + 2) x 9 + 3 = 75<br/>
8 x 9 + 3 = 75<br/>
72 + 3 = 75<br/>
75 = 75
<br/><br/>
Our answer is correct because both sides of the equation matched.
<br/><br/>
Finding a missing term in an equation by inverting its operations in SADMEG order is commonly called 'working backwards'.
<br/><br/>
$vio<u></b>Shortcuts for Working Backwards</u>$black
<br/><br/>
There are three useful shortcuts that make working backwards quicker.
<br/><br/>
$red </b>Shortcut # 1: $black To invert addition or subtraction, we can just transfer the term being added or subtracted to the other side of the equation and invert the operation.
<br/><br/>
$red </b>Shortcut # 2: $black To invert multiplication, we can just transfer the term being multiplied to the other side of the equation as a divisor of that side's expression.
<br/><br/>
$red </b>Shortcut # 3: $black To invert division, we can just transfer the divisor to the other side of the equation as a multiplier of that side's expression.
<br/><br/>
Let us now apply these three shortcuts to find the missing term of an equation quickly.
<br/><br/>
$vio<u></b>Example # 2</u>$black
<br/><br/>
Let's find the missing term in:<br/>
( ___ + 7) x 11 + 12 = 188
<br/><br/>
Applying shortcut # 1,<br/>
( ___ + 7) x 11 = 188 - 12 or<br/> 
( ___ + 7) x 11 = 176 
<br/><br/>
Applying shortcut # 2,<br/>
___ + 7 = 176 / 11 or<br/> 
___ + 7 = 16 
<br/><br/>
Applying shortcut # 1 again,<br/>
___ = 16 - 7 or<br/> 
___ = 9
<br/><br/>
Thus, the missing term is 9.
<br/><br/>
Below are more examples of how to find missing terms in equations by working backwards. 
<br/><br/><br/>
@blue
More Examples of Finding<br/>Missing Terms in Equations
@nblue
<br/>
@php1equations-missing-terms.php@
<br/>
If you refresh this page, it will give new examples of how to find missing terms in equations. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice finding missing terms in equations. 
";

?>




















